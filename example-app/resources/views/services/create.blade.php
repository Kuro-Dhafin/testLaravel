@extends('layouts.app')

@section('content')
<h3>Create Service</h3>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form method="POST" action="{{ route('services.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control">
    </div>

    <div class="mb-3">
        <label>Price Unit</label>
        <select name="price_unit" class="form-control">
            <option value="panel">Per Panel</option>
            <option value="second_2d">Per Second (2D)</option>
            <option value="second_3d">Per Second (3D)</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Price</label>
        <input type="number" name="price" class="form-control">
    </div>

    <div class="mb-3">
        <label>Thumbnail</label>
        <input type="file" name="thumbnail" class="form-control">
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control" rows="4"></textarea>
    </div>

    <button class="btn btn-primary">Save</button>
</form>
@endsection
