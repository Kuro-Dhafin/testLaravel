@extends('layouts.app')
@section('content')
<h2>Register</h2>
<form method="POST" action="/register">@csrf
    <input type="text" name="name" class="form-control mb-2" placeholder="Nama">
    <input type="email" name="email" class="form-control mb-2" placeholder="Email">
    <input type="password" name="password" class="form-control mb-2" placeholder="Password">
    <button class="btn btn-success">Register</button>
</form>
@endsection
