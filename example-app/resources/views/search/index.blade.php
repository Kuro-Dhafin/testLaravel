@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Search Result</h2>

    @if($q)
        <p>Query: {{ $q }}</p>
    @endif

    <div class="row">
        @forelse($results as $artist)
            <div class="col-md-3">
                <div class="card mb-3">
                    <img src="{{ asset($artist->preview_image) }}" class="card-img-top" alt="image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $artist->display_name }}</h5>
                        <p>{{ $artist->category }}</p>
                        <p>Rp {{ $artist->price_rate }} / {{ $artist->price_unit }}</p>
                        <a href="{{ route('artist.show', $artist->id) }}" class="btn btn-dark">View</a>
                    </div>
                </div>
            </div>
        @empty
            <p>No results.</p>
        @endforelse
    </div>
</div>
@endsection
