<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $r, $service_id)
    {
        $service = Service::findOrFail($service_id);
        $r->validate(['quantity'=>'required|integer|min:1']);

        $order = Order::create([
            'buyer_id'=>auth()->id(),
            'service_id'=>$service->id,
            'quantity'=>$r->quantity,
            'total_price'=>$service->price * $r->quantity,
        ]);

        return redirect('/orders')->with('success','Order created');
    }

    public function index()
    {
        $orders = Order::with('service','buyer')
            ->when(auth()->user()->role=='artist', fn($q)=>$q->whereHas('service', fn($s)=>$s->where('artist_id',auth()->id())))
            ->when(auth()->user()->role=='buyer', fn($q)=>$q->where('buyer_id',auth()->id()))
            ->paginate(6);

        return view('orders.index', compact('orders'));
    }

    public function updateStatus(Request $r, Order $order)
    {
        $order->update(['status'=>$r->status]);
        return back()->with('success','Status updated');
    }
}

