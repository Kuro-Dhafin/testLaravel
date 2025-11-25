@extends('layouts.app')

@section('content')
<h3>Edit Service</h3>

<form method="POST" action="{{ route('services.update', $service->id) }}" enctype="multipart/form-data">
@csrf @method('PUT')

<div class="mb-3">
    <label>Title</label>
    <input type="text" name="title" class="form-control" value="{{ $service->title }}">
</div>

<div class="mb-3">
    <label>Price Unit</label>
    <select name="price_unit" class="form-control">
        <option value="panel"        @selected($service->price_unit==='panel')>Per Panel</option>
        <option value="second_2d"    @selected($service->price_unit==='second_2d')>Per Second (2D)</option>
        <option value="second_3d"    @selected($service->price_unit==='second_3d')>Per Second (3D)</option>
    </select>
</div>

<div class="mb-3">
    <label>Price</label>
    <input type="number" name="price" class="form-control" value="{{ $service->price }}">
</div>

<div class="mb-3">
    <label>Thumbnail</label>
    <input type="file" name="thumbnail" class="form-control">
    @if($service->thumbnail)
        <img src="{{ asset('storage/'.$service->thumbnail) }}" class="mt-2" style="width:150px;">
    @endif
</div>

<div class="mb-3">
    <label>Description</label>
    <textarea name="description" class="form-control" rows="4">{{ $service->description }}</textarea>
</div>

<button class="btn btn-primary">Update</button>
</form>
@endsection
