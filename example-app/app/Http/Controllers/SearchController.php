<?php

namespace App\Http\Controllers;

use App\Models\ArtistProfile;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');

        $results = ArtistProfile::query()
            ->when($q, function ($query) use ($q) {
                $query->where('display_name', 'like', "%$q%")
                      ->orWhere('category', 'like', "%$q%")
                      ->orWhere('price_unit', 'like', "%$q%");
            })
            ->orderBy('display_name')
            ->get();

        return view('search.index', compact('q', 'results'));
    }
}
