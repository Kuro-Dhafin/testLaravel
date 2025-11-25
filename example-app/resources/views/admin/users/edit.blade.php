@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit User</h3>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="mt-3">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name"
                   value="{{ old('name', $user->name) }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email"
                   value="{{ old('email', $user->email) }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Role</label>
            <select name="role" class="form-select">
                <option value="buyer"  {{ $user->role === 'buyer'  ? 'selected' : '' }}>Buyer</option>
                <option value="artist" {{ $user->role === 'artist' ? 'selected' : '' }}>Artist</option>
                <option value="admin"  {{ $user->role === 'admin'  ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
