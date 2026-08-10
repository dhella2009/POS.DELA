@extends('layouts.app')

@section('title', 'Detail Penjualan')

@section('content')

@include('layouts.navbar')

<h1>Detail Penjualan #{{ $sale->id }}</h1>

<a href="{{ route('penjualan.index') }}" class="btn btn-secondary mb-3">&larr; Kembali</a>

<div class="card mb-4">
    <div class="card-header">
        Informasi Transaksi
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p class="mb-1"><strong>Tanggal Transaksi:</strong> {{ $sale->created_at->translatedFormat('d-m-Y - H:i:s') }}</p>
                <p class="mb-1"><strong>Kasir:</strong> {{ $sale->user->name }}</p>
            </div>
            <div class="col-md-6">
                <p class="mb-1"><strong>Metode Pembayaran:</strong> {{ $sale->metode_pembayaran }}</p>
                <p class="mb-1"><strong>Status:</strong> {{ $sale->status }}</p>
            </div>
        </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        Produk yang Dibeli
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th class="text-center">Qty</th>
                    <th class="text-end">Harga Satuan</th>
                    <th class="text-end">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                {{-- relasi & nama field disesuaikan dengan model Penjualan kamu --}}
                @forelse ($sale->itemPenjualan as $item)
                <tr>
                    <td>{{ $item->produk->nama }}</td>
                    <td class="text-center">{{ $item->kuantitas }}</td>
                    <td class="text-end">Rp. {{ number_format($item->subtotal / $item->kuantitas) }}</td>
                    <td class="text-end">Rp. {{ number_format($item->subtotal) }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">Tidak ada detail produk.</td>
                </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-end"><strong>Total Pembayaran</strong></td>
                    <td class="text-end"><strong>Rp. {{ number_format($sale->total_pembayaran) }}</strong></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@endsection