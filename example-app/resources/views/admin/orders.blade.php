@extends('layouts.app')
@section('content')
<h2>Manage Orders</h2>
<table class="table">
<tr><th>Service</th><th>Buyer</th><th>Status</th><th>Aksi</th></tr>
@foreach($orders as $o)
<tr>
    <td>{{ $o->service->title }}</td>
    <td>{{ $o->buyer->name }}</td>
    <td>{{ $o->status }}</td>
    <td>
        <form method="POST" action="/admin/orders/{{ $o->id }}">
            @csrf
            <select name="status">
                <option>pending</option>
                <option>approved</option>
                <option>rejected</option>
            </select>
            <button class="btn btn-sm btn-primary">Update</button>
        </form>
    </td>
</tr>
@endforeach
</table>
{{ $orders->links() }}
@endsection
