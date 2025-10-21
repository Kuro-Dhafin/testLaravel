<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function edit() {
        $profile = auth()->user()->profile;
        return view('profile.edit', compact('profile'));
    }

    public function update(Request $r) {
        $r->validate(['bio'=>'required']);
        auth()->user()->profile()->updateOrCreate(
            ['user_id'=>auth()->id()],
            [
                'bio'=>$r->bio,
                'speciality'=>$r->speciality,
                'portfolio_link'=>$r->portfolio_link,
                'instagram'=>$r->instagram,
                'twitter'=>$r->twitter,
                'artstation'=>$r->artstation
            ]
        );
        return back()->with('success','Profile updated');
    }

    public function public($id) {
        $artist = User::where('role','artist')->with('profile','services')->findOrFail($id);
        return view('profile.public',compact('artist'));
    }
}
