@extends('layouts.app')
@section('content')
<h2>Order Saya</h2>
<table class="table">
    <tr><th>Service</th><th>Status</th></tr>
    @foreach($orders as $o)
    <tr>
        <td>{{ $o->service->title }}</td>
        <td>{{ $o->status }}</td>
    </tr>
    @endforeach
</table>
{{ $orders->links() }}
@endsection
