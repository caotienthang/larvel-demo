<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\PaypalPayment;
use App\Services\PayPalService;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\RequestException;

class PayPalController extends Controller
{
    public function return(Request $request, PayPalService $paypal)
    {
        $orderId = $request->query('token') ?? session('paypal_order_id');
        if (!$orderId) abort(400, 'Missing PayPal token');

        $payment = PaypalPayment::where('paypal_order_id', $orderId)->firstOrFail();
        $invoice = Invoice::findOrFail($payment->invoice_id);

        // chống chạy lại
        if ($payment->status === 'COMPLETED' || ($invoice->status ?? null) === 'paid') {
            return redirect()->route('orders.success')->with('success', 'Payment already completed.');
        }

        try {
            $data = $paypal->capture($orderId);
        } catch (RequestException $e) {
            $payment->update([
                'status' => 'FAILED',
                'raw_response' => ['error' => $e->getMessage()],
            ]);

            return redirect()->route('checkout.show', ['service' => $payment->service_id])
                ->with('error', 'PayPal capture failed.');
        }

        if (($data['status'] ?? null) !== 'COMPLETED') {
            $payment->update(['status' => 'FAILED', 'raw_response' => $data]);
            return redirect()->route('checkout.show', ['service' => $payment->service_id])
                ->with('error', 'Payment not completed.');
        }

        $captureId  = data_get($data, 'purchase_units.0.payments.captures.0.id');
        $payerEmail = data_get($data, 'payer.email_address');
        $payerId    = data_get($data, 'payer.payer_id');

        $payment->update([
            'paypal_capture_id' => $captureId,
            'status' => 'COMPLETED',
            'payer_email' => $payerEmail,
            'payer_id' => $payerId,
            'raw_response' => $data,
        ]);

        // update invoice
        $invoice->update([
            'status' => 'paid', // đổi theo schema của bạn
            // 'paid_at' => now(), nếu có
        ]);

        session()->forget(['paypal_order_id', 'paypal_invoice_id']);

        return redirect()->route('orders.success')
            ->with('success', 'Payment successful. Capture ID: ' . ($captureId ?? 'N/A'));
    }

    public function cancel()
    {
        $orderId = session('paypal_order_id');
        if ($orderId) {
            PaypalPayment::where('paypal_order_id', $orderId)->update(['status' => 'CANCELED']);
        }

        session()->forget(['paypal_order_id', 'paypal_invoice_id']);

        return redirect()->route('home')->with('error', 'Payment canceled.');
    }
}
