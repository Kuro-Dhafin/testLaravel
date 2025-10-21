@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Service</h2>
    <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" value="{{ $service->title }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Category</label>
            <select name="category" class="form-control">
                <option value="comic" {{ $service->category=='comic'?'selected':'' }}>Comic</option>
                <option value="illustration" {{ $service->category=='illustration'?'selected':'' }}>Illustration</option>
                <option value="2d animation" {{ $service->category=='2d animation'?'selected':'' }}>2D Animation</option>
                <option value="3d animation" {{ $service->category=='3d animation'?'selected':'' }}>3D Animation</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Price (Rp)</label>
            <input type="number" name="price" value="{{ $service->price }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" rows="4" class="form-control">{{ $service->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Current Image</label><br>
            @if($service->image)
                <img src="{{ asset('uploads/services/'.$service->image) }}" width="200">
            @else
                <span>No image</span>
            @endif
        </div>

        <div class="mb-3">
            <label>New Image (optional)</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
<div class="mt-3">
    {{ $services->links('pagination::bootstrap-5') }}
</div>
@endsection
