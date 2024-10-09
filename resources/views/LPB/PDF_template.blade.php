</html>
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
            background-color: white;
            margin: 0;
        }

        td {
            border: 1px solid black;
            text-align: center;
            padding: 3mm;
            vertical-align: top;
        }

        .rinso {
            height: 500px;
        }

        .rinso th {
            font-weight: normal;
            border-right: 1px solid black;
            border-left: 1px solid black;
            text-align: center;
            padding: 3mm;
            vertical-align: top;
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
            margin-top: 0;
            border: 1px solid black;
            width: 100%;
            border-top: 0;
        }

        .supplier-table td {
            border: 1px black;
            text-align: left;
            padding: 2mm 3mm;
            font-size: 11pt;
        }

        .header {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            margin: 0;
            font-size: 11pt;
        }

        .header tr th {
            text-align: center;
            padding: 2mm 3mm;
            font-size: 11pt;
        }

        .keterangan-table {
            width: 100%;
           /* border: 1px black solid; */
        }

        .keterangan-table td {
             border: none;
            text-align: left;
            vertical-align: top;
            padding: 0;
        }

        .description-item {
            margin-bottom: 5px;
            display: block;
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
                <td class="label">Rekanan</td>
                <td class="colon">:</td>
                <td class="info">{{ $lpb->supplier->kode_supplier }},{{ $lpb->supplier->nama_supplier }}</td>
                <td class="label">Nomor OP</td>
                <td class="colon">:</td>
                <td class="info">{{$lpb->nomor_op}}</td>
            </tr>
            <tr>
                <td class="label">Unit / Proyek</td>
                <td class="colon">:</td>
                <td class="info" colspan="4">
                    {{ $lpb->administrasi->kode_proyek }},{{ $lpb->administrasi->nama_proyek }}</td>
            </tr>
        </table>
        <table class="header">
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Kode Barang</td>
                    <td>Nama Barang</td>
                    <td>Satuan</td>
                    <td>Kuantitas</td>
                    <td>Harga Satuan</td>
                    <td>Jumlah Harga</td>
                    @foreach ($sublpb as $item)
                        <tr class="rinso">
                            <th> {{ $loop->iteration }}</th>
                            <th> {{ $item->product->kode_produk }}</th>
                            <th> {{ $item->product->nama_produk }}</th>
                            <th> {{ $item->product->satuan->nama_satuan }}</th>
                            <th> Rp. {{ number_format($item->kuantitas) }}</th>
                            <th> Rp. {{ number_format($item->harga_satuan) }}</th>
                            <th> Rp. {{ number_format($item->jumlah_harga) }}</th>

                        </tr>
                    @endforeach
                </tr>

            </thead>
            <tfoot class="foot">
                <tr>
                    <td colspan="5" style="padding: 0;">
                        <table class="keterangan-table">
                            <tr>
                                <td style="padding-left:20px;">Keterangan :</td>
                                <td style="width: 82%; margin:3px;">
                                    @foreach ($sublpb as $item)
                                        <span class="description-item">- {{$item->deskripsi}}</span>
                                    @endforeach
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td class="deskripsi">Total :</td>
                    <td class="deskripsi">Rp. {{ number_format($total_jumlah_harga) }}</td>
                </tr>
            </tfoot>
        </table>
        <table class="supplier-table">
            <tr>
                <td style="border-top: 0;" class="label"></td>
                <td style="border-top: 0;" class="colon"></td>
                <td style="border-top: 0;" class="info"></td>
                <td style="border-top: 0;" class="label"></td>
                <td style="border-top: 0;" class="colon"></td>
                <td style="border-top: 0;" class="info"></td>
            </tr>
            <tr>
                <td style="border-top: 0;" class="label"></td>
                <td style="border-top: 0;" class="colon"></td>
                <td style="border-top: 0;" class="info"></td>
                <td style="border-top: 0;" class="label"></td>
                <td style="border-top: 0;" class="colon"></td>
                <td style="border-top: 0;" class="info"></td>
            </tr>
            <tr>
                <td style="border-top: 0;" class="label"></td>
                <td style="border-top: 0;" class="colon"></td>
                <td style="border-top: 0;" class="info"></td>
                <td style="border-top: 0;" class="label"></td>
                <td style="border-top: 0;" class="colon"></td>
                <td style="border-top: 0;" class="info"></td>
            </tr>
            <tr>
                <td style="border-top: 0;" class="label"></td>
                <td style="border-top: 0;" class="colon"></td>
                <td style="border-top: 0;" class="info"></td>
                <td style="border-top: 0;" class="label"></td>
                <td style="border-top: 0;" class="colon"></td>
                <td style="border-top: 0;" class="info"></td>
            </tr>
            <tr>
                <td style="border-top: 0;" class="label"></td>
                <td style="border-top: 0;" class="colon"></td>
                <td style="border-top: 0;" class="info"></td>
                <td style="border-top: 0;" class="label"></td>
                <td style="border-top: 0;" class="colon"></td>
                <td style="border-top: 0;" class="info"></td>
            </tr>

            <tr>
                <td class="label"></td>
                <td class="colon"></td>
                <td class="info" colspan="4">
                    Tanda Tangan:
                    @if(is_array($lpb->tanda_tangan) && count($lpb->tanda_tangan) > 0)
                        @foreach($lpb->tanda_tangan as $tanda_tangan)
                            {{ $tanda_tangan }}@if (!$loop->last), @endif
                        @endforeach
                    @else
                        Tidak ada tanda tangan.
                    @endif
                </td>
            </tr>


        </table>
    </div>
</body>

</html>
