@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Search Results</h2>

    <form action="{{ route('services.search') }}" method="GET" class="row g-3 mb-5">
        <div class="col-md-4">
            <input type="text" name="keyword" class="form-control" placeholder="Keyword" value="{{ request('keyword') }}">
        </div>
        <div class="col-md-3">
            <select name="category" class="form-select">
                <option value="">All Categories</option>
                <option value="comic" @selected(request('category') == 'comic')>Comic</option>
                <option value="illustration" @selected(request('category') == 'illustration')>Illustration</option>
                <option value="2d animation" @selected(request('category') == '2d animation')>2D Animation</option>
                <option value="3d animation" @selected(request('category') == '3d animation')>3D Animation</option>
            </select>
        </div>
        <div class="col-md-2">
            <input type="number" name="min_price" class="form-control" placeholder="Min Price" value="{{ request('min_price') }}">
        </div>
        <div class="col-md-2">
            <input type="number" name="max_price" class="form-control" placeholder="Max Price" value="{{ request('max_price') }}">
        </div>
        <div class="col-md-1">
            <button class="btn btn-primary w-100">Filter</button>
        </div>
    </form>

    @if($services->count() > 0)
        <div class="row">
            @foreach($services as $service)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ $service->image ? asset('storage/' . $service->image) : 'https://via.placeholder.com/300x200?text=No+Image' }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $service->title }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $service->title }}</h5>
                            <p class="card-text text-muted">{{ $service->category->name ?? 'Uncategorized' }}</p>
                            <p class="card-text fw-bold">Rp {{ number_format($service->price, 0, ',', '.') }}</p>

                            <div class="mt-auto d-grid gap-2">
                                @auth
                                    <form action="{{ route('orders.store', $service->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" class="btn btn-success w-100">Order Now</button>
                                    </form>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-success w-100">Login to Order</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $services->withQueryString()->links() }}
        </div>
    @else
        <div class="text-center py-5">
            <p>No services found matching your criteria.</p>
        </div>
    @endif
</div>
@endsection
