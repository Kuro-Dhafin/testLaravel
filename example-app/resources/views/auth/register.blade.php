@extends('layouts.app')

@section('content')
<div class="container" style="max-width:500px;">
    <h2 class="mb-4 text-center">Register</h2>
    <form method="POST" action="/register">
        @csrf
        <div class="mb-3">
            <label for="name">Name</label>
            <input name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input name="email" id="email" type="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password">Password</label>
            <input name="password" id="password" type="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="role">Role</label>
            <select name="role" id="role" class="form-select">
                <option value="buyer">Buyer</option>
                <option value="artist">Artist</option>
            </select>
        </div>
        <button class="btn btn-primary w-100">Register</button>
    </form>
</div>
@endsection
