<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Rekap Produk Teratas ({{ ucfirst($recapType) }})</title>
    <style>
        /* Simplified CSS */
        body { font-family: Arial, sans-serif; margin: 20mm; color: #333; font-size: 12pt; }
        .header { text-align: center; margin-bottom: 20mm; }
        .header h1 { font-size: 18pt; }
        .header p { font-size: 10pt; color: #666; }
        .instructions { text-align: center; font-style: italic; color: #555; margin-bottom: 10mm; font-size: 10pt; }
        .summary { display: flex; gap: 10mm; margin-bottom: 20mm; flex-wrap: wrap; }
        .summary-card { border: 1px solid #ccc; padding: 10mm; flex: 1; min-width: 100mm; }
        .batik-types { margin-bottom: 20mm; }
        .batik-types span { padding: 5mm; background: #f4f4f4; margin-right: 5mm; border-radius: 5mm; }
        table { width: 100%; border-collapse: collapse; margin-top: 20mm; }
        th, td { border: 1px solid #ccc; padding: 8mm; text-align: left; }
        th { background: #f4f4f4; font-weight: bold; }
        .no-data { text-align: center; font-style: italic; color: #666; }
        .back-btn { display: inline-block; margin-top: 20mm; padding: 8mm 16mm; background: #007bff; color: white; text-decoration: none; }
        @media print {
            .instructions, .back-btn { display: none; }
            body { margin: 0; }
            @page { margin: 10mm; }
        }
    </style>
</head>
<body onload="window.print()">
    <div class="header">
        <h1>Rekap Produk Teratas {{ ucfirst($recapType) }}</h1>
        <p>Dibuat pada {{ now()->format('d-m-Y H:i') }}</p>
    </div>
    <div class="instructions">
        Pilih 'Simpan sebagai PDF' dalam dialog cetak untuk mengunduh file.
    </div>
    <div class="summary">
        <div class="summary-card">
            <p><strong>{{ $recapType === 'all' ? 'Jumlah Produk' : 'Total Produk Terjual' }}</strong></p>
            <p>{{ $recapType === 'all' ? ($data['total_products'] ?? 0) : ($data['total_products_sold'] ?? 0) }}</p>
        </div>
        <div class="summary-card">
            <p><strong>Stok Tertinggi</strong></p>
            <p>{{ $data['highest_stock'] ?? 0 }}</p>
        </div>
        <div class="summary-card">
            <p><strong>Stok Terendah</strong></p>
            <p>{{ $data['lowest_stock'] ?? 0 }}</p>
        </div>
        <div class="summary-card">
            <p><strong>Harga Rata-rata</strong></p>
            <p>Rp {{ $data['average_price'] ?? '0,00' }}</p>
        </div>
    </div>
    <div class="batik-types">
        <p>Jenis Batik</p>
        @if (!empty($data['batik_types']) && is_array($data['batik_types']))
            @foreach ($data['batik_types'] as $type)
                <span>{{ $type }}</span>
            @endforeach
        @else
            <span>Tidak ada jenis batik tersedia</span>
        @endif
    </div>
    @if (!empty($data['products']) && is_array($data['products']))
        <table>
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Jenis</th>
                    <th>Harga</th>
                    <th>{{ $recapType === 'all' ? 'Stok' : 'Jumlah Terjual' }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['products'] as $product)
                    <tr>
                        <td>{{ $product['name'] ?? '-' }}</td>
                        <td>{{ $product['batik_type'] ?? '-' }}</td>
                        <td>Rp {{ $product['price'] ?? '0,00' }}</td>
                        <td>{{ $recapType === 'all' ? ($product['stock'] ?? 0) : ($product['quantity_sold'] ?? 0) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="no-data">Tidak ada data penjualan tersedia untuk periode ini.</p>
    @endif
    <a href="{{ route('home') }}" class="back-btn no-print">Kembali ke Dashboard</a>
</body>
</html>
