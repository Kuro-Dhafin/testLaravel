<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerForm() { return view('auth.register'); }
    public function loginForm() { return view('auth.login'); }

    public function register(Request $r) {
        $r->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
            'role'=>'required|in:buyer,artist'
        ]);

        $user = User::create([
            'name'=>$r->name,
            'email'=>$r->email,
            'password'=>Hash::make($r->password),
            'role'=>$r->role
        ]);

        Auth::login($user);
        return $this->redirectByRole($user);
    }

    public function login(Request $r) {
        if(Auth::attempt($r->only('email','password'))) {
            return $this->redirectByRole(Auth::user());
        }
        return back()->with('error', 'Invalid login');
    }

    private function redirectByRole($user)
    {
        if ($user->role === 'admin') {
            return redirect('/admin/dashboard');
        } elseif ($user->role === 'artist') {
            return redirect('/artist/dashboard');
        }
        return redirect('/'); // buyer
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}
