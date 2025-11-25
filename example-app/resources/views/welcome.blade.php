@extends('layouts.app')

@section('content')
<div class="text-center mb-5">
    <h1 class="display-4 fw-bold">Discover Artist Services</h1>
    <p class="lead text-muted">Find talented artists for 2D, 3D, Webtoon, and Anime projects.</p>

    <form method="GET" action="{{ route('services.search') }}" class="d-flex justify-content-center mt-3">
        <input name="keyword" class="form-control w-50 me-2" placeholder="Search services...">
        <button class="btn btn-primary">Search</button>
    </form>
</div>

<div class="row g-4">
    @foreach($services as $srv)
        <div class="col-md-3">
            <div class="card h-100 shadow-sm border-0 hover-scale">
                <img src="{{ $srv->image ? asset('storage/'.$srv->image) : 'https://via.placeholder.com/300' }}" class="card-img-top" style="height:200px; object-fit:cover;">

                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $srv->title }}</h5>
                    <p class="text-muted mb-2">{{ $srv->price }} / {{ $srv->price_unit ?? 'per artwork' }}</p>
                    <p class="card-text small flex-grow-1">{{ Str::limit($srv->description, 80) }}</p>
                    <div class="mt-2">
                        <span class="badge bg-info text-dark">{{ $srv->category->name ?? 'Uncategorized' }}</span>
                    </div>
                </div>

                <div class="card-footer bg-white text-center">
                    @auth
                        <form method="POST" action="{{ route('orders.store', $srv->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-success w-100">Order Now</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-success w-100">Login to Order</a>
                    @endauth
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="mt-4 d-flex justify-content-center">
    {{ $services->links() }}
</div>

<style>
.hover-scale:hover {
    transform: scale(1.05);
    transition: transform 0.3s;
}
</style>
@endsection
