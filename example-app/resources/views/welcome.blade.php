@extends('layouts.app')

@section('content')
<section class="bg-light py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="fw-bold">Marketplace Jasa Digital Art</h1>
                <p class="lead">Temukan artist profesional untuk komisi gambar 2D, 3D, manga, animasi, ilustrasi, dan lainnya</p>
                <a href="/services" class="btn btn-primary btn-lg">Jelajahi Artist</a>
                <a href="/register" class="btn btn-outline-dark btn-lg">Gabung sebagai Artist</a>
            </div>
            <div class="col-md-6 text-center">
                <img src="https://via.placeholder.com/500x300?text=Dummy+Artwork" class="img-fluid" alt="hero-art">
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container text-center">
        <h2 class="fw-bold mb-4">Kategori Populer</h2>
        <div class="row">
            <div class="col-md-3">
                <div class="p-3 border rounded">2D Illustration</div>
            </div>
            <div class="col-md-3">
                <div class="p-3 border rounded">3D Modeling</div>
            </div>
            <div class="col-md-3">
                <div class="p-3 border rounded">Manga / Webtoon</div>
            </div>
            <div class="col-md-3">
                <div class="p-3 border rounded">Animation</div>
            </div>
        </div>
    </div>
</section>

<section class="bg-light py-5">
    <div class="container text-center">
        <h2 class="fw-bold mb-4">Kenapa Memilih Kami</h2>
        <div class="row">
            <div class="col-md-4">
                <h5>Aman & Terpercaya</h5>
                <p>Pemesanan transparan, komunikasi langsung dengan artist</p>
            </div>
            <div class="col-md-4">
                <h5>Harga Kompetitif</h5>
                <p>Sistem harga berdasarkan satuan: panel, detik, atau per artwork</p>
            </div>
            <div class="col-md-4">
                <h5>Artist Berkualitas</h5>
                <p>Kumpulkan portfolio, review, dan penilaian</p>
            </div>
        </div>
    </div>
</section>
@endsection
