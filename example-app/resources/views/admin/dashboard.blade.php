@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h3>Admin Dashboard</h3>
    <hr>

    <p>Total Users: {{ $users }}</p>
    <p>Total Services: {{ $services }}</p>
    <p>Total Orders: {{ $orders }}</p>

</div>
@endsection
