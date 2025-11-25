@extends('layouts.app')

@section('content')
<h3>Admin Dashboard</h3>

<table class="table table-striped mt-3">
    <thead>
        <tr>
            <th>Service</th>
            <th>Artist</th>
            <th>Buyer</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>
        @foreach($orders as $o)
        <tr>
            <td>{{ $o->service->title }}</td>
            <td>{{ $o->service->artist->name }}</td>
            <td>{{ $o->buyer->name }}</td>
            <td>{{ $o->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $orders->links() }}
@endsection
