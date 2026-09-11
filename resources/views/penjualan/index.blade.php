@extends('layouts.app')

@section('title', 'penjualan')

@section('content')

@include('layouts.navbar')

@if (session('errors'))
    <div class="alert alert-danger">
        {{ session('errors') }}
    </div>
@endif

<h1>Halaman penjualan</h1>

<a href="{{ route('penjualan.create') }}" class="btn btn-primary mb-3">Create</a>

<form action="{{ route('penjualan.index')}}" method="GET" class="mb-3">
    <div class="input-group">

        <input
            type="text"
            name="search"
            value="{{ request()->search }}"
            class="form-control"
            placeholder="Search penjualan">

        <button class="btn btn-outline-secondary" type="submit">
            Search
        </button>

    </div>
</form>

<table class="table">

    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tanggal Transaksi</th>
            <th scope="col">Kasir</th>
            <th scope="col">Total Pembayaran</th>
            <th scope="col">Metode Pembayaran</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>

    <tbody>

        @forelse($sales as $sale)

        <tr>
            <th scope="row">{{ ($sales->firstItem() + $loop->index) }}</th>
            <td>{{$sale->created_at->translatedFormat('d-m-Y- H:i:s')}}</td>
            <td>{{ $sale->user->name }}</td>
            <td>Rp. {{number_format ($sale->total_pembayaran) }}</td>
            <td>{{ $sale->metode_pembayaran }}</td>
            <td>{{ $sale->status }}</td>
            <td class="d-flex gap-1">
                <button
                    type="button"
                    class="btn btn-primary btn-detail"
                    data-url="{{ route('penjualan.show', $sale) }}">
                    Detail
                </button>
                @can('delete', $sale)
                ||
                <a href="{{ route('penjualan.edit', $sale) }}" class="btn btn-warning">Edit</a>
                @endcan
                @can('delete', $sale)
                ||

                <form action="{{ route('penjualan.destroy', $sale) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger"
                        onclick="return confirm('Apakah anda yakin akan menghapus penjualan ini?')">

                        Hapus

                    </button>
                </form>
                @endcan
            </td>
        </tr>

        @empty

        <tr>
            <td colspan="6">Data Tidak Ditemukan</td>
        </tr>

        @endforelse

    </tbody>

</table>

{{ $sales->links() }}

<!-- Modal Detail Struk -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Struk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="detailModalBody">
                <div class="text-center py-4">
                    <div class="spinner-border" role="status"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="printReceipt()">🖨️ Cetak</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.btn-detail').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const url = btn.getAttribute('data-url');
            const modalBody = document.getElementById('detailModalBody');
            const modal = new bootstrap.Modal(document.getElementById('detailModal'));

            modalBody.innerHTML = '<div class="text-center py-4"><div class="spinner-border" role="status"></div></div>';
            modal.show();

            fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => response.text())
                .then(html => {
                    modalBody.innerHTML = html;
                })
                .catch(() => {
                    modalBody.innerHTML = '<p class="text-danger text-center">Gagal memuat detail transaksi.</p>';
                });
        });
    });

    function printReceipt() {
        const content = document.getElementById('detailModalBody').innerHTML;
        const printWindow = window.open('', '_blank');
        printWindow.document.write('<html><head><title>Struk</title></head><body>' + content + '</body></html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>

@endsection