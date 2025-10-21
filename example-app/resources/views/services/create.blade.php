@extends('layouts.app')
@section('content')
<h2>Tambah Jasa</h2>
<form method="POST" action="/services">@csrf
    <input type="text" name="title" class="form-control mb-2" placeholder="Judul">
    <select name="category_id" class="form-control mb-2">
        @foreach($categories as $c)
        <option value="{{ $c->id }}">{{ $c->name }}</option>
        @endforeach
    </select>
    <input type="text" name="price" class="form-control mb-2" placeholder="Harga">
    <form method="POST" action="/services" enctype="multipart/form-data">@csrf
        <input type="file" name="image" class="form-control mb-2">...</form>

    <select name="pricing_unit" class="form-control mb-2">
        <option>per unit</option><option>per panel</option><option>per detik</option>
    </select>
    <textarea name="description" class="form-control mb-2" placeholder="Deskripsi"></textarea>
    <button class="btn btn-success">Simpan</button>
</form>

<div class="mt-3">
    {{ $services->links('pagination::bootstrap-5') }}
</div>

@endsection
