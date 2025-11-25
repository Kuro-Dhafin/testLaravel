<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    // List services
    public function index()
    {
        $services = Service::with('artist')->latest()->paginate(12);
        return view('services.index', compact('services'));
    }

    // Show create form
    public function create()
    {
        return view('services.create');
    }

    // Store service
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image|max:2048',
            'category' => 'required|string|max:255'
        ]);

        if ($request->hasFile('thumbnail')) {
            $data['image'] = $request->file('thumbnail')->store('services', 'public');
        }

        $data['user_id'] = Auth::id();

        Service::create($data);

        return redirect()->route('services.index')->with('success', 'Service successfully created!');
    }

    // Show edit form
    public function edit(Service $service)
    {
        if ($service->user_id !== Auth::id()) abort(403);
        return view('services.edit', compact('service'));
    }

    // Update service
    public function update(Request $request, Service $service)
    {
        if ($service->user_id !== Auth::id()) abort(403);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image|max:2048',
            'category' => 'required|string|max:255'
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($service->image) Storage::disk('public')->delete($service->image);
            $data['image'] = $request->file('thumbnail')->store('services', 'public');
        }

        $service->update($data);

        return redirect()->route('services.index')->with('success', 'Service updated.');
    }

    // Delete service
    public function destroy(Service $service)
    {
        if ($service->user_id !== Auth::id()) abort(403);

        if ($service->image) Storage::disk('public')->delete($service->image);

        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service deleted.');
    }

    // Search services
    public function search(Request $request)
    {
        $query = Service::query();

        if ($request->filled('keyword')) {
            $query->where('title', 'like', '%' . $request->keyword . '%')
                  ->orWhere('description', 'like', '%' . $request->keyword . '%');
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        $services = $query->latest()->paginate(12)->withQueryString();

        return view('services.search', compact('services'));
    }

    // Optional show method if you want service detail page
    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }
}
