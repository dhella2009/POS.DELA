@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')

    @include('layouts.navbar')

    <div class="container py-4">

        <h1 class="mb-3">Tentang Kami</h1>
        <p class="text-muted mb-4">Mengenal lebih dekat Fashion dan sistem kasir yang kami gunakan.</p>

        {{-- ================ PROFIL PERUSAHAAN ================ --}}
        <div class="card mb-4">
            <div class="card-body">
                <h4 class="card-title">Fashion</h4>
                <p class="card-text">
                    <strong>Fashion</strong> adalah toko yang bergerak di bidang penjualan pakaian dan sepatu
                    dengan berbagai model dan gaya untuk memenuhi kebutuhan fashion pelanggan sehari-hari.
                    Kami berkomitmen untuk menghadirkan produk berkualitas dengan harga yang terjangkau,
                    serta pelayanan yang cepat dan ramah bagi setiap pelanggan yang berbelanja di toko kami.
                </p>
                <p class="card-text mb-0">
                    Untuk mendukung operasional toko, kami menggunakan sistem <strong>Point of Sale (POS)</strong>
                    berbasis web yang memudahkan proses transaksi, pengelolaan produk, dan pencatatan penjualan
                    secara digital dan efisien.
                </p>
            </div>
        </div>

        <div class="row">

            {{-- ================ PRODUK YANG DIJUAL ================ --}}
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Produk Kami</h5>
                        <ul class="mb-0">
                            <li>Pakaian pria & wanita berbagai model</li>
                            <li>Sepatu casual, formal, dan olahraga</li>
                            <li>Pakaian adat & tradisional</li>
                            <li>Aksesoris pelengkap penampilan</li>
                            <li>Koleksi terbaru mengikuti tren fashion</li>
                        </ul>
                    </div>
                </div>
            </div>


        </div>

    @endsection
