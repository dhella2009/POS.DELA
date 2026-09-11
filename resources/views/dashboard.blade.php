@extends('layouts.app')

@section('title', 'Login')

@section('content')

@include('layouts.navbar')

<div class="text-center">
    <h1>
        Ringkasan Hari Ini
        <small class="text-muted">
            ({{ $tanggalHariIni->translatedFormat('l, d F Y') }})
        </small>
    </h1>

    @can('viewAny', App\Models\User::class)
    <div class="row mb-4">
        <div class="col-md-12">
            <h1>Today's Sales</h1>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Total Nilai Penjualan Hari Ini
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        Rp {{ number_format($ringkasan['total_penjualan']) }}
                    </h5>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Jumlah Transaksi Hari Ini
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $ringkasan['total_transaksi'] }}</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Cash Payment -->
    <div class="row mb-4">
        <div class="col-md-12">
            <h1>Cash Payment & Status</h1>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Total pembayaran tunai
                </div>
                <div class="card-body">
                    <h5 class="card-title">Rp {{ number_format($ringkasan['total_pembayaran_tunai'] ?? 0) }}</h5>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Total pembayaran non-tunai
                </div>
                <div class="card-body">
                    <h5 class="card-title">Rp {{ number_format($ringkasan['total_pembayaran_non_tunai'] ?? 0) }}</h5>
                </div>
            </div>
        </div>
    </div>
    @endcan

    <!-- Inventory -->
    <div class="row">
        <div class="col-md-12">
            <h1>Critical Inventory Status</h1>
        </div>

        <div class="col-md-6">
            <h3>Daftar produk stok rendah</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Stok</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($produkStokRendah as $index => $produk)
                    <tr>
                        <td>{{ $produkStokRendah->firstItem() + $index }}</td>
                        <td>{{ $produk->nama }}</td>
                        <td>{{ $produk->stok }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-muted text-center">
                            Seluruh produk berada dalam kondisi stok aman.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $produkStokRendah->links() }}
        </div>

        <div class="col-md-6">
            <h3>Produk habis stok</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Stok</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($produkStokHabis as $index => $produk)
                    <tr>
                        <td>{{ $produkStokHabis->firstItem() + $index }}</td>
                        <td>{{ $produk->nama }}</td>
                        <td>{{ $produk->stok }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-muted text-center">
                            Tidak ada produk yang habis stok.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $produkStokHabis->links() }}
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h1>Best Seller Products</h1>
        </div>
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Unit Terjual</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($produkTerlaris as $produk)
                    <tr>
                        <td>{{ $produk->nama }}</td>
                        <td>{{ $produk->stok }}</td>
                        <td>{{ $produk->total_terjual }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-muted text-center">
                            Belum ada produk yang terjual hari ini.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection