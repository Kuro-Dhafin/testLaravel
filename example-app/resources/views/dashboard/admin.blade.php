@extends('layouts.app')

@section('content')
<h2>Admin Dashboard</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Service</th>
            <th>Artist</th>
            <th>Buyer</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>{{ $order->service->title }}</td>
            <td>{{ $order->service->artist->name }}</td>
            <td>{{ $order->buyer->name }}</td>
            <td>{{ $order->quantity }}</td>
            <td>{{ number_format($order->total_price,0,',','.') }} IDR</td>
            <td>{{ ucfirst($order->status) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $orders->links() }}
@endsection
