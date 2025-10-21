@extends('layouts.app')

@section('content')
<h2>Artist Dashboard</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Service</th>
            <th>Buyer</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>{{ $order->service->title }}</td>
            <td>{{ $order->buyer->name }}</td>
            <td>{{ $order->quantity }}</td>
            <td>{{ number_format($order->total_price,0,',','.') }} IDR</td>
            <td>{{ ucfirst($order->status) }}</td>
            <td>
                <form action="/orders/status/{{ $order->id }}" method="POST" class="d-flex gap-1">
                    @csrf
                    <select name="status" class="form-select form-select-sm">
                        <option value="pending" @selected($order->status=='pending')>Pending</option>
                        <option value="accepted" @selected($order->status=='accepted')>Accepted</option>
                        <option value="completed" @selected($order->status=='completed')>Completed</option>
                    </select>
                    <button class="btn btn-sm btn-primary">Update</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $orders->links() }}
@endsection
