@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h3>Your Orders</h3>
    <hr>

    @if($orders->isEmpty())
        <p>No orders yet.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Service</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Artist</th>
                </tr>
            </thead>

            <tbody>
                @foreach($orders as $o)
                <tr>
                    <td>{{ $o->service->title }}</td>
                    <td>${{ $o->price }}</td>
                    <td>{{ ucfirst($o->status) }}</td>
                    <td>{{ $o->service->artist->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
