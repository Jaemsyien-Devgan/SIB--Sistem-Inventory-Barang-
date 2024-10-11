<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header Laporan Penerimaan Barang</title>
    <style>
        @page {
            size: A4 landscape;
            margin: 0;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            width: 297mm;
            height: 210mm;
        }

        .container {
            width: calc(100% - 2cm);
            margin: 1cm;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td,
        th {
            border: 1px solid black;
            text-align: center;
            padding: 3mm;
            vertical-align: top;
            font-weight: normal;
        }

        .company-name,
        .report-title {
            font-weight: bold;
            font-size: 12pt;
        }

        .center-text {
            text-align: center;
        }

        .company-address,
        .report-number,
        .date {
            font-size: 10pt;
        }

        .supplier-table {
            margin-top: -1px;
            width: 100%;
            border: none;
        }

        .supplier-table td {
            text-align: left;
            padding: 2mm 3mm;
            font-size: 11pt;
            border: none;
        }

        .supplier-table .left-border {
            border-left: 1px solid black;
        }

        .supplier-table .right-border {
            border-right: 1px solid black;
        }

        .header  {

        }

        .header th td {
            padding: 2mm 3mm;
            height: 10mm;
        }

        .header td {
            font-size: 10pt;
            border-top: none;
            border-bottom: none;
        }

        .keterangan-table {
            width: 100%;
            border-top: 1px solid black;
            border-bottom: :none !important;
            text-align: center;
        }

        .keterangan-table td {
            text-align: center;
            width: 20%;
            vertical-align: top;
            padding: 3mm 0 0 0;
            font-size: 11pt !important;
        }

        .description-item {
            margin-bottom: 5px;
            display: block;
            text-align: left !important;
        }

        .signature-table {
            width: 100%;
            font-size: 11pt;
            border: 1px solid black;
            border-top: none;
            margin-top: -1px;
        }

        .signature-table td {
            text-align: center;
            padding: 10mm;
            border-top: none;
            border-bottom: none;
        }

        .signature-line {
            border: none;
            width: 50mm;
            margin-top: 15mm;
        }

        .no-border-right {
            border-right: none;
            font-weight: bold;
        }

        .no-border-left {
            border-left: none;
            font-weight: bold;
        }

        .yesbro {
            border-top: black;
            margin-top: -1px;
        }

        .yesbro td {
            border-top: 1px black;
        }
    </style>
</head>

<body>
    <div class="container">
        <table>
            <tr>
                <td style="width: 33.33%;">
                    <div class="company-name">PT. SWADAYA GRAHA</div>
                    <div class="company-address">JL. RA Kartini 25 Gresik</div>
                </td>
                <td style="width: 33.33%;" class="center-text">
                    <div class="report-title">LAPORAN PENERIMAAN BARANG</div>
                    <div class="report-number">{{ $lpb->nomor_op }}</div>
                </td>
                <td style="width: 33.33%;">
                    <div class="date">Tanggal : {{ $lpb->tanggal_lpb }}</div>
                </td>
            </tr>
        </table>

        <table class="supplier-table">
            <tr>
                <td class="label left-border">Rekanan</td>
                <td class="colon">:</td>
                <td class="info">{{ $lpb->supplier->kode_supplier }},{{ $lpb->supplier->nama_supplier }}</td>
                <td class="label">Nomor OP</td>
                <td class="colon">:</td>
                <td class="info right-border">{{ $lpb->nomor_op }}</td>
            </tr>
            <tr>
                <td class="label left-border">Unit / Proyek</td>
                <td class="colon">:</td>
                <td class="info" colspan="3">
                    {{ $lpb->administrasi->kode_proyek }},{{ $lpb->administrasi->nama_proyek }}</td>
                <td class="right-border"></td>
            </tr>
        </table>

        <table class="header">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Satuan</th>
                    <th>Kuantitas</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah Harga</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sublpb as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->product->kode_produk }}</td>
                        <td>{{ $item->product->nama_produk }}</td>
                        <td>{{ $item->product->satuan->nama_satuan }}</td>
                        <td>Rp. {{ number_format($item->kuantitas) }}</td>
                        <td>Rp. {{ number_format($item->harga_satuan) }}</td>
                        <td>Rp. {{ number_format($item->jumlah_harga) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align: center;">Data tidak ada</td>
                    </tr>
                @endforelse

            </tbody>
        </table>

        <table class="yesbro">
            <tfoot>
                <tr>
                    <td colspan="5" style="padding: 0;">
                        <table class="keterangan-table">
                            <tr>
                                <td style="width: 65px; border:none"></td>
                                <td style="width: 160px; border:none;">Keterangan :</td>
                                <td style="width: 225px; border:none;">
                                    @foreach ($sublpb as $item)
                                        <span class="description-item">- {{ $item->deskripsi }}</span>
                                    @endforeach
                                </td>
                                <td style="width: 131px; border:none;"></td>
                                <td style="width: 126px; border:none;"></td>
                                <td style="width: 168px; border-right:none; border-bottom:none;">Total :</td>
                                <td style="border-bottom:none; border-right:none;">Rp. {{ number_format($total_jumlah_harga) }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tfoot>
        </table>

        <!-- Tabel untuk tanda tangan -->
        <table class="signature-table">
            <tr>
                <td class="no-border-right">
                    <div class="signature-line"></div>
                    <div>{{ $lpb->tanda_tangan[0] ?? 'Tanda tangan tidak ditemukan' }}</div>
                    <!-- Tanda tangan pertama -->
                </td>
                <td class="no-border-left">
                    <div class="signature-line"></div>
                    <div>{{ $lpb->tanda_tangan[1] ?? 'Tanda tangan tidak ditemukan' }}</div>
                    <!-- Tanda tangan kedua -->
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
