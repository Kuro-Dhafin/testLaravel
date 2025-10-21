<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; // Keep this if you call external APIs

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::with('category', 'artist')->latest()->paginate(12);
        return view('services.index', compact('services'));
    }

    /**
     * Contains the core search logic.
     */
    private function executeSearchQuery(Request $request)
    {
        $query = Service::query()->with('category', 'artist'); // Eager load relationships

        // Keyword search
        if ($request->filled('keyword')) {
            $query->where('title', 'like', '%' . $request->keyword . '%');
        }

        // Category filter
        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('name', $request->category);
            });
        }

        // Price range filter
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        return $query->paginate(12)->withQueryString();
    }

    /**
     * Web search method - returns a view.
     */
    public function search(Request $request)
    {
        $services = $this->executeSearchQuery($request);
        return view('services.search', compact('services'));
    }

    /**
     * API search method - returns JSON.
     */
    public function apiSearch(Request $request)
    {
        $services = $this->executeSearchQuery($request);
        return response()->json($services);
    }

    public function create() {
        $categories = Category::all();
        $priceRefs = PriceReference::all();
        return view('services.create', compact('categories','priceRefs'));
    }

   public function store(Request $r) {
    $r->validate([
        'title'=>'required',
        'category_id'=>'required',
        'price'=>'required|numeric',
        'pricing_unit'=>'required',
        'image'=>'nullable|image|max:2048'
    ]);

    $path = $r->file('image') ? $r->file('image')->store('services','public') : 'services/default.png';

    Service::create([
        'artist_id'=>auth()->id(),
        'category_id'=>$r->category_id,
        'title'=>$r->title,
        'description'=>$r->description,
        'price'=>$r->price,
        'pricing_unit'=>$r->pricing_unit,
        'image_path'=>"/storage/".$path
    ]);
    return redirect('/services');
}



    public function show($id) {
        $s = Service::findOrFail($id);
        return view('services.show', compact('s'));
    }

    public function edit(Service $service)
{
    $this->authorize('update', $service);
    return view('services.edit', compact('service'));
}

public function update(Request $request, Service $service)
{
    $this->authorize('update', $service);

    $request->validate([
        'title' => 'required',
        'category' => 'required',
        'price' => 'required|integer',
        'description' => 'required',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $data = $request->only(['title', 'category', 'price', 'description']);

    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/services'), $imageName);
        $data['image'] = $imageName;
    }

    $service->update($data);
    return redirect()->route('services.index')->with('success', 'Service updated');
}

public function destroy(Service $service)
{
    $this->authorize('delete', $service);
    $service->delete();
    return redirect()->route('services.index')->with('success', 'Service deleted');
}
}
