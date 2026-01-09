<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller {
    public function index(){
        $services = Service::all();
        $products = Product::query()
        ->latest()
        ->limit(5)
        ->get();
        return view('home',compact('services', 'products'));
    }

    public function showAll(){
        $services = Service::all();
        return view('services.index',compact('services'));
    }

    public function show($id){
        $service = Service::with('products')->findOrFail($id);
        return view('services.detail', compact('service'));
    }

    public function buy(Request $request,$id){
        $service = Service::findOrFail($id);
        $invoice = Invoice::create(['user_id'=>Auth::id(),'total'=>$service->price]);
        InvoiceDetail::create(['invoice_id'=>$invoice->id,'service_id'=>$service->id,'quantity'=>1,'price'=>$service->price]);
        return redirect()->route('home')->with('success','Mua dịch vụ thành công');
    }
}
