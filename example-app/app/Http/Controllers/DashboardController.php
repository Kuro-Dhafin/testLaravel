<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Order;
use App\Models\User;

class DashboardController extends Controller
{
    public function artist()
    {
        $services = Service::where('user_id', auth()->id())->get();

        $orders = Order::whereHas('service', function ($q) {
            $q->where('user_id', auth()->id());
        })->get();

        return view('artist.dashboard', compact('services', 'orders'));
    }

    public function admin()
    {
        $users = User::count();
        $services = Service::count();
        $orders = Order::count();

        return view('admin.dashboard', compact('users', 'services', 'orders'));
    }
}
