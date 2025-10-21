@extends('layouts.app')
@section('content')
<h2>Login</h2>
<form method="POST" action="/login">@csrf
    <input type="email" name="email" class="form-control mb-2" placeholder="Email">
    <input type="password" name="password" class="form-control mb-2" placeholder="Password">
    <button class="btn btn-primary">Login</button>
</form>
@endsection
