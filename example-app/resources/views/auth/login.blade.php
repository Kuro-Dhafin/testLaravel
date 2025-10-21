@extends('layouts.app')

@section('content')
<div class="container" style="max-width:500px;">
    <h2 class="mb-4 text-center">Login</h2>
    <form method="POST" action="/login">
        @csrf
        <div class="mb-3">
            <label>Email</label>
            <input name="email" type="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input name="password" type="password" class="form-control" required>
        </div>
        <button class="btn btn-primary w-100">Login</button>
    </form>
</div>
@endsection
