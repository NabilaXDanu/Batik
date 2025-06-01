<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Rekap Pesanan ({{ ucfirst($recapType) }})</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20mm;
            color: #333;
            font-size: 12pt;
        }
        .header {
            text-align: center;
            margin-bottom: 20mm;
        }
        .header h1 {
            font-size: 18pt;
            margin-bottom: 5mm;
        }
        .header p {
            font-size: 10pt;
            color: #666;
        }
        .instructions {
            text-align: center;
            font-style: italic;
            color: #555;
            margin-bottom: 10mm;
            font-size: 10pt;
        }
        .summary {
            display: flex;
            gap: 20mm;
            margin-bottom: 20mm;
            flex-wrap: wrap;
            page-break-inside: avoid;
        }
        .summary-card {
            border: 1px solid #ddd;
            padding: 10mm;
            flex: 1;
            min-width: 100mm;
            page-break-inside: avoid;
        }
        .summary-card p {
            margin: 5mm 0;
            line-height: 1.5;
        }
        .summary-card strong {
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20mm;
            page-break-inside: auto;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8mm;
            text-align: left;
            font-size: 11pt;
        }
        th {
            background-color: #f4f4f4;
            font-weight: bold;
            text-transform: uppercase;
        }
        tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }
        .no-data {
            text-align: center;
            font-style: italic;
            color: #666;
            margin-top: 20mm;
            font-size: 11pt;
        }
        .back-btn {
            display: inline-block;
            text-align: center;
            margin-top: 20mm;
            padding: 8mm 16mm;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4mm;
            font-size: 10pt;
        }
        .back-btn:hover {
            background-color: #0056b3;
        }
        @media print {
            body {
                margin: 0;
                font-size: 10pt;
            }
            .header h1 {
                font-size: 16pt;
            }
            .instructions, .back-btn {
                display: none;
            }
            .summary-card {
                min-width: 80mm;
            }
            th, td {
                padding: 5mm;
            }
            @page {
                margin: 10mm;
            }
        }
    </style>
</head>
<body onload="window.print()">
    <div class="header">
        <h1>Rekap Pesanan {{ ucfirst($recapType) }}</h1>
        <p>Dibuat pada {{ now()->format('d-m-Y H:i') }}</p>
    </div>
    <div class="instructions">
        Pilih 'Simpan sebagai PDF' dalam dialog cetak untuk mengunduh file.
    </div>
    <div class="summary">
        <div class="summary-card">
            <p><strong>Jumlah Pesanan</strong></p>
            <p>{{ $data['total_orders'] ?? 0 }}</p>
        </div>
        <div class="summary-card">
            <p><strong>Total Pendapatan</strong></p>
            <p>Rp {{ $data['total_amount'] ?? '0,00' }}</p>
        </div>
        <div class="summary-card">
            <p><strong>Rincian Status</strong></p>
            @if (!empty($data['status_counts']) && is_array($data['status_counts']))
                @foreach ($data['status_counts'] as $status => $count)
                    <p>{{ ucfirst($status) }}: {{ $count }}</p>
                @endforeach
            @else
                <p>Tidak ada data status tersedia.</p>
            @endif
        </div>
    </div>
    @if (!empty($data['orders']) && is_array($data['orders']))
        <table>
            <thead>
                <tr>
                    <th>Pelanggan</th>
                    <th>Total Jumlah</th>
                    <th>Status</th>
                    <th>Dibuat Pada</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['orders'] as $order)
                    <tr>
                        <td>{{ $order['user_name'] ?? '-' }}</td>
                        <td>Rp {{ $order['total_amount'] ?? '0,00' }}</td>
                        <td>{{ ucfirst($order['status'] ?? '-') }}</td>
                        <td>{{ $order['created_at'] ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="no-data">Tidak ada pesanan tersedia untuk periode ini.</p>
    @endif
    <a href="{{ route('home') }}" class="back-btn no-print">Kembali ke Dashboard</a>
</body>
</html>
