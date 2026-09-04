@extends('layouts.app')

@section('title', 'Tambah Jenis Produk')

@section('content')

@include('layouts.navbar')

<h1>Tambah Jenis Produk</h1>

<div class="card mb-4" style="max-width: 500px;">
    <div class="card-body">
        <form action="{{ route('jenis.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Jenis</label>
                <input type="text" name="nama" id="nama"
                    class="form-control @error('nama') is-invalid @enderror"
                    value="{{ old('nama') }}"
                    placeholder="Misal: Sepatu, Baju, Makanan, Minuman">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-pink">Simpan</button>
            <a href="{{ route('jenis.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>

@endsection