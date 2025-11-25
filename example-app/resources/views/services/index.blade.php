@extends('layouts.app')

@section('content')
<h3 class="mb-4">Services</h3>

<div class="row">
@foreach($services as $s)
    <div class="col-md-3 mb-3">
        <div class="card h-100">
            @if($s->thumbnail)
                <img src="{{ asset('storage/'.$s->thumbnail) }}" class="card-img-top">
            @endif
            <div class="card-body">
                <h5>{{ $s->title }}</h5>
                <p class="text-muted">{{ $s->price_unit }} — Rp{{ number_format($s->price) }}</p>
            </div>

            @if(auth()->check() && $s->artist_id === auth()->id())
            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('services.edit', $s->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form method="POST" action="{{ route('services.destroy', $s->id) }}">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </div>
            @endif
        </div>
    </div>
@endforeach
</div>

{{ $services->links() }}
@endsection
