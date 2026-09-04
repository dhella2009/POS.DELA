@extends('layouts.app')

@section('title', 'Edit Jenis Produk')

@section('content')

@include('layouts.navbar')

<h1>Edit Jenis Produk</h1>

<div class="card mb-4" style="max-width: 500px;">
    <div class="card-body">
        <form action="{{ route('jenis.update', $jenis) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Jenis</label>
                <input type="text" name="nama" id="nama"
                    class="form-control @error('nama') is-invalid @enderror"
                    value="{{ old('nama', $jenis->nama) }}">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-pink">Update</button>
            <a href="{{ route('jenis.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>

@endsection