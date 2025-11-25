<?php

namespace App\Http\Controllers;

use App\Models\ArtistProfile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function upgradeArtist()
    {
        $user = auth()->user();
        if ($user->role !== 'buyer') abort(403);

        $user->update(['role' => 'artist']);

        ArtistProfile::create([
            'user_id' => $user->id,
            'display_name' => $user->name
        ]);

        return redirect('/artist/dashboard');
    }
}
