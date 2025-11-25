@extends('layouts.app')

@section('content')
<h3>Your Orders</h3>

<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>Buyer</th>
            <th>Service</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>
        @foreach($orders as $o)
        <tr>
            <td>{{ $o->buyer->name }}</td>
            <td>{{ $o->service->title }}</td>
            <td>{{ $o->quantity }}</td>
            <td>{{ $o->total_price }}</td>
            <td>{{ $o->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $orders->links() }}
@endsection
