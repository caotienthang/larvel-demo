<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\PaypalPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function show(Service $service)
    {
        $user = Auth::user();
        return view('checkout.checkout', compact('service', 'user'));
    }

    /**
     * User bấm "Continue to PayPal":
     * - Create Invoice + InvoiceDetail
     * - Create PayPal Order
     * - Save paypal_payments
     * - Redirect to PayPal approve url
     */
    public function payWithPaypal(Request $request, Service $service)
    {
        $request->validate([
            'address' => 'required|string|max:255',
        ]);

        $user = Auth::user();

        // Tạo invoice trong transaction
        [$invoice, $detailPrice] = DB::transaction(function () use ($user, $service, $request) {
            $invoice = Invoice::create([
                'user_id' => $user->id,
                'address' => $request->address,
                'total'   => $service->price,
                // nếu invoices có status:
                // 'status'  => 'unpaid',
            ]);

            $detail = InvoiceDetail::create([
                'invoice_id' => $invoice->id,
                'service_id' => $service->id,
                'quantity'   => 1,
                'price'      => $service->price,
            ]);

            return [$invoice, $detail->price];
        });

        // Gọi PayPal tạo order và redirect
        // => Dùng service PayPalService hoặc gọi trực tiếp PayPalController logic tạo order.
        // Ở đây tôi dùng helper method static để bạn dễ áp dụng: tạo order ngay trong controller này.
        return app(\App\Services\PayPalService::class)->createOrderAndRedirect(
            invoice: $invoice,
            service: $service,
            amount: $detailPrice,
            userId: $user->id
        );
    }
}
