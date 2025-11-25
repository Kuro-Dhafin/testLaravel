@extends('layouts.app')

@section('content')
<h3>User Management</h3>

<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
    @foreach($data as $u)
        <tr>
            <td>{{ $u->name }}</td>
            <td>{{ $u->email }}</td>
            <td>{{ $u->role }}</td>
            <td>
                <a href="{{ route('admin.user.edit',$u->id) }}" class="btn btn-sm btn-primary">Edit</a>

                <form method="POST" action="{{ route('admin.user.delete',$u->id) }}" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
