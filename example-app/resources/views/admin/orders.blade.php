@extends('layouts.app')

@section('content')
<h3 class="mb-4">All Orders (Admin)</h3>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Buyer</th>
            <th>Artist</th>
            <th>Service</th>
            <th>Price</th>
            <th>Status</th>
            <th>Date</th>
        </tr>
    </thead>

    <tbody>
    @foreach($orders as $o)
        <tr>
            <td>{{ $o->buyer->name }}</td>
            <td>{{ $o->service->artist->name }}</td>
            <td>{{ $o->service->title }}</td>
            <td>Rp{{ number_format($o->service->price) }}</td>
            <td>{{ ucfirst($o->status) }}</td>
            <td>{{ $o->created_at->format('d M Y') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
