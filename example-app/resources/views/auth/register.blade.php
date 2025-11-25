@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">Register</div>

            <div class="card-body">
                <form method="POST" action="/register">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input name="name" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input name="email" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input name="password" type="password" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <select name="role" class="form-control">
                            <option value="buyer">Buyer</option>
                            <option value="artist">Artist</option>
                        </select>
                    </div>

                    <button class="btn btn-primary w-100">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
