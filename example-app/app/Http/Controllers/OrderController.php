<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['service', 'buyer'])
            ->where('buyer_id', Auth::id())
            ->latest()
            ->get();

        return view('orders.index', compact('orders'));
    }

    public function store(Request $request, $service_id)
    {
        $service = Service::findOrFail($service_id);

        $order = Order::create([
            'buyer_id' => auth()->id(),
            'service_id' => $service->id,
            'quantity' => 1,
            'total_price' => $service->price,
            'status' => 'pending'
        ]);

    return redirect()->back()->with('success', 'Order placed.');
    }

}
