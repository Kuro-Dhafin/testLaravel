<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class DashboardController extends Controller
{
    public function artist()
    {
        $orders = Order::with('service','buyer')->paginate(12);

        return view('dashboard.artist', compact('orders'));
    }

    public function admin()
    {
        $orders = Order::with('service','buyer')->paginate(12);
        return view('dashboard.admin', compact('orders'));
    }
}
