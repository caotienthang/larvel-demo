<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Invoice;
use App\Models\InvoiceDetail;

class CheckoutController extends Controller
{
    public function show(Service $service)
    {
        // Nếu bạn không dùng middleware auth, vẫn có thể chặn thủ công như dưới:
        // if (!Auth::check()) return redirect()->route('login');

        $user = Auth::user();

        return view('checkout.checkout', compact('service', 'user'));
    }
    public function fakeCheckout(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
        ]);

        $user = Auth::user();

        // Giả lập service (thường bạn truyền service_id thật)
        $service = \App\Models\Service::first();

        DB::transaction(function () use ($user, $service, $request) {

            // 1. Tạo invoice
            $invoice = Invoice::create([
                'user_id' => $user->id,
                'address' => $request->address,
                'total'   => $service->price,
            ]);

            // 2. Tạo invoice detail (quantity luôn = 1)
            InvoiceDetail::create([
                'invoice_id' => $invoice->id,
                'service_id' => $service->id,
                'quantity'   => 1,
                'price'      => $service->price,
            ]);
        });

        // Fake thành công
        return redirect()
            ->route('home')
            ->with('success', 'Invoice created successfully (FAKE PAYMENT)');
    }
}
