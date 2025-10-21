@extends('layouts.app')
@section('content')
<h2>List Jasa Art</h2>
<form method="GET" action="/services" class="mb-3">
<input name="q" value="{{ $q ?? '' }}" class="form-control" placeholder="Cari jasa...">
</form>
<div class="row">
@foreach($services as $s)
<div class="col-md-4 mb-3">
    <div class="card p-2">
        <img src="{{ $s->image_path }}" class="card-img-top" alt="image">
        <div class="card-body">
            <h5>{{ $s->title }}</h5>
            <p>{{ $s->category->name }}</p>
            <p>Rp {{ number_format($s->price) }} / {{ $s->pricing_unit }}</p>
            <a href="/services/{{ $s->id }}" class="btn btn-primary">Detail</a>

            @can('update', $s)
                <a href="{{ route('services.edit', $s->id) }}" class="btn btn-warning btn-sm">Edit</a>
            @endcan

            @can('delete', $s)
                <form action="{{ route('services.destroy', $s->id) }}" method="POST" style="display:inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete service?')">Delete</button>
                </form>
            @endcan

            <img src="{{ $s->image_path }}" style="height:200px;object-fit:cover">
        </div>
    </div>
</div>
@endforeach
</div>
<div class="mt-3">
    {{ $services->links('pagination::bootstrap-5') }}
</div>
@endsection
