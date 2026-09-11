<style>
    .receipt-wrapper {
        display: flex;
        justify-content: center;
    }

    .receipt {
        width: 100%;
        max-width: 380px;
        background: #fff;
        padding: 24px 20px;
        font-family: 'Courier New', Courier, monospace;
        font-size: 14px;
        color: #212529;
    }

    .receipt-header {
        text-align: center;
        margin-bottom: 12px;
    }

    .receipt-header h4 {
        margin: 0;
        font-weight: bold;
        letter-spacing: 1px;
    }

    .receipt-header small {
        color: #6c757d;
    }

    .receipt-divider {
        border-top: 1px dashed #999;
        margin: 12px 0;
    }

    .receipt-info p {
        display: flex;
        justify-content: space-between;
        margin: 2px 0;
    }

    .receipt-item {
        margin-bottom: 8px;
    }

    .receipt-item .item-name {
        font-weight: bold;
    }

    .receipt-item .item-detail {
        display: flex;
        justify-content: space-between;
        color: #495057;
    }

    .receipt-total {
        display: flex;
        justify-content: space-between;
        font-weight: bold;
        font-size: 15px;
        margin-top: 8px;
    }

    .receipt-footer {
        text-align: center;
        margin-top: 16px;
        color: #6c757d;
        font-size: 12px;
    }
</style>

<div class="receipt-wrapper">
    <div class="receipt">

        <div class="receipt-header">
            <h4>POINF OF SALE</h4>
            <small>Struk Pembelanjaan</small>
        </div>

        <div class="receipt-divider"></div>

        <div class="receipt-info">
            <p><span>No. Transaksi</span><span>#{{ $sale->id }}</span></p>
            <p><span>Tanggal</span><span>{{ $sale->created_at->translatedFormat('d-m-Y H:i:s') }}</span></p>
            <p><span>Kasir</span><span>{{ $sale->user->name }}</span></p>
            <p><span>Metode Bayar</span><span>{{ $sale->metode_pembayaran }}</span></p>
            <p><span>Status</span><span>{{ $sale->status }}</span></p>
        </div>

        <div class="receipt-divider"></div>

        @forelse ($sale->itemPenjualan as $item)
            <div class="receipt-item">
                <div class="item-name">{{ $item->produk->nama }}</div>
                <div class="item-detail">
                    <span>{{ $item->kuantitas }} x Rp. {{ number_format($item->subtotal / $item->kuantitas) }}</span>
                    <span>Rp. {{ number_format($item->subtotal) }}</span>
                </div>
            </div>
        @empty
            <p class="text-center text-muted">Tidak ada detail produk.</p>
        @endforelse

        <div class="receipt-divider"></div>

        <div class="receipt-total">
            <span>TOTAL</span>
            <span>Rp. {{ number_format($sale->total_pembayaran) }}</span>
        </div>

        <div class="receipt-divider"></div>

        <div class="receipt-footer">
            Terima kasih telah berbelanja!
        </div>

    </div>
</div>