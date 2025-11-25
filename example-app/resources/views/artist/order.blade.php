@extends('layouts.app')

@section('content')
<h3 class="mb-4">Orders Received</h3>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Buyer</th>
            <th>Service</th>
            <th>Price</th>
            <th>Status</th>
            <th>Update</th>
        </tr>
    </thead>

    <tbody>
    @foreach($orders as $o)
        <tr>
            <td>{{ $o->buyer->name }}</td>
            <td>{{ $o->service->title }}</td>
            <td>Rp{{ number_format($o->service->price) }}</td>
            <td>{{ ucfirst($o->status) }}</td>
            <td>
                <form method="POST" action="{{ route('artist.orders.update', $o->id) }}">
                    @csrf @method('PUT')
                    <select name="status" class="form-control form-control-sm">
                        <option value="pending"  @selected($o->status==='pending')>Pending</option>
                        <option value="accepted" @selected($o->status==='accepted')>Accepted</option>
                        <option value="done"     @selected($o->status==='done')>Done</option>
                    </select>
                    <button class="btn btn-sm btn-primary mt-1">Save</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
