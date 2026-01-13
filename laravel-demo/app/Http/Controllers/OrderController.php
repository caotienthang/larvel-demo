<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $invoices = Invoice::query()
            ->where('user_id', $request->user()->id)
            ->orderByDesc('id')
            ->paginate(10);

        return view('orders.index', compact('invoices'));
    }

    public function show(Request $request, Invoice $invoice)
    {
        abort_unless($invoice->user_id === $request->user()->id, 403);

        $invoice->loadMissing(['details.service']);

        // Nếu invoice không có detail -> không có service để hiển thị
        if ($invoice->details->isEmpty()) {
            abort(404, 'Invoice has no details.');
        }

        // Nếu có detail nhưng service null -> service_id sai hoặc record service không tồn tại
        if ($invoice->details->first()->service === null) {
            abort(404, 'Service not found for invoice detail.');
        }

        return view('orders.show', compact('invoice'));
    }


    public function cancel(Request $request, Invoice $invoice)
    {
        abort_unless($invoice->user_id === $request->user()->id, 403);

        if ($invoice->status === 'canceled') {
            return back()->with('success', 'This order has already been canceled.');
        }

        $data = $request->validate([
            'reason' => ['nullable', 'string', 'max:100'],
            'note'   => ['nullable', 'string', 'max:500'],
        ]);

        $invoice->status = 'canceled';
        // Nếu bạn có cột lưu reason/note thì lưu; nếu chưa có thì bỏ 2 dòng dưới
        // $invoice->cancel_reason = $data['reason'] ?? null;
        // $invoice->cancel_note   = $data['note'] ?? null;
        $invoice->save();

        return back()->with('success', 'Your order has been canceled.');
    }

}
