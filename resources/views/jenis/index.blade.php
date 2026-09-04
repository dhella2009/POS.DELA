@extends('layouts.app')

@section('title', 'Jenis Produk')

@section('content')

@include('layouts.navbar')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<h1>Halaman Jenis Produk</h1>

<a href="{{ route('jenis.create') }}" class="btn btn-primary mb-3">Create</a>

<form action="{{ route('jenis.index') }}" method="GET" class="mb-3">
    <div class="input-group">
        <input
            type="text"
            name="search"
            value="{{ request()->search }}"
            class="form-control"
            placeholder="Search jenis produk">
        <button class="btn btn-outline-secondary" type="submit">
            Search
        </button>
    </div>
</form>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Jenis</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($jenis as $index => $item)
        <tr>
            <th scope="row">{{ $jenis->firstItem() + $index }}</th>
            <td>{{ $item->nama }}</td>
            <td class="d-flex gap-1">
                <a href="{{ route('jenis.edit', $item) }}" class="btn btn-warning">Edit</a>

                <form action="{{ route('jenis.destroy', $item) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"
                        onclick="return confirm('Apakah anda yakin akan menghapus jenis ini?')">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3" class="text-center text-muted">Data Tidak Ditemukan</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $jenis->links() }}

@endsection