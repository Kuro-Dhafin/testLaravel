@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h3>Artist Dashboard</h3>
    <hr>

    <p>Total Services: {{ $services->count() }}</p>
    <p>Total Orders: {{ $orders->count() }}</p>

    <h4 class="mt-4">Your Services</h4>
    <ul>
        @foreach($services as $s)
        <li>{{ $s->title }} — ${{ $s->price }}</li>
        @endforeach
    </ul>

</div>
@endsection
