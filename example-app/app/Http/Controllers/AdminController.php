<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Service;

class AdminController extends Controller
{
    public function dashboard() {
        $users = User::count();
        $services = Service::count();
        return view('admin.dashboard', compact('users','services'));
    }

    public function users() {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function services() {
        $services = Service::with('artist')->get();
        return view('admin.services', compact('services'));
    }
}
