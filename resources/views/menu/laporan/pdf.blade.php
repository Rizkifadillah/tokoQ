<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pendapatan</title>
    {{-- bootstrap internal --}}
    <link rel="stylesheet" href="{{ public_path().'/assets/bootstrap.min.css'}}">
    {{-- bootstrap external --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



</head>
<body>
    <h3 class="text-center">Laporan Pendapatan</h3>
    <h4 class="text-center">
        Tanggal {{ tanggal_indonesia($awal, false)}}
        s/d
        Tanggal {{ tanggal_indonesia($akhir, false)}}
    </h4>

    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Tanggal</th>
                <th>Penjualan</th>
                <th>Pembelian</th>
                <th>Pengeluaran</th>
                <th>Pendapatan</th>

            </tr>
        </thead>

        <tbody>
            @foreach ($data as $row)
                <tr>
                    @foreach ($row as $col)
                        <td>{{ $col }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

    <script src="{{ public_path().'assets/plugins/bootstrap/js/bootstrap.bundle.min.js'}}"></script>

</body>
</html>

{{-- 
<html>
<head>

 <!-- Required meta tags -->
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"> -->
    <!-- Custom Style -->
    <!-- <link rel="stylesheet" href="style.css"> -->
    
    <title>LabQ :: Nota</title>
    <style>
        #invoice{
            padding: 0;
        }

        .invoice {
            position: relative;
            background-color: #FFF;
            min-height: 680px;
            padding: 15px
        }

        .invoice header {
            /* margin-top: -140px; */
            padding: 0px;
            /* padding-bottom: -90px; */
            margin-bottom: -75px;
            border-bottom: 1px #3989c6
        }

        .invoice .company-details {
            text-align: right
        }

        .invoice .company-details .name {
            margin: 0;
            font-size: 20px
        }

        .invoice .contacts {
            margin-bottom: 2px
        }

        .invoice .invoice-to {
            text-align: left
        }

        .invoice .invoice-to .to {
            margin-top: 0;
            margin-bottom: 0
        }

        .invoice .invoice-details {
            text-align: right
        }

        .invoice .invoice-details .invoice-id {
            margin-top: 0;
            color: #3989c6
        }

        .invoice main {
            padding-bottom: 5px
        }

        .invoice main .thanks {
            margin-top: -10px;
            /* font-size: 2em; */
            margin-bottom: 5px
        }

        .invoice main .notices {
            padding-left: 6px;
            border-left: 6px solid #3989c6
        }

        .invoice main .notices .notice {
            font-size: 1.2em
        }

        .invoice table {
            margin-top: -180px;
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px
        }

        .invoice table td,.invoice table th {
            padding: 1px;
            background: #eee;
            border-bottom: 1px solid #fff
        }

        /* .invoice table th {
            white-space: nowrap;
            font-weight: 40;
            font-size: 10px
        }

        .invoice table td h3 {
            margin: 0;
            font-weight: 40;
            color: #3989c6;
            font-size: 10px
        } */

        /* .invoice table .qty text-right,.invoice table .total,.invoice table .unit text-right {
            text-align: right;
            font-size: 1.2em
        }

        .invoice table .no {
            color: #fff;
            font-size: 1.6em;
            background: #3989c6
        }

        .invoice table .unit text-right {
            background: #ddd
        } */

        .invoice table .total {
            background: #3989c6;
            color: #fff
        }

        .invoice table tbody tr:last-child td {
            border: none
        }

        .invoice table tfoot td {
            background: 0 0;
            border-bottom: none;
            white-space: nowrap;
            text-align: right;
            padding: 10px 2px;
            /* font-size: 10px; */
            border-top: 1px solid #aaa
        }

        .invoice table tfoot tr:first-child td {
            border-top: none
        }

        .invoice table tfoot tr:last-child td {
            color: #3989c6;
            font-size: 10px;
            border-top: 1px solid #3989c6
        }

        .invoice table tfoot tr td:first-child {
            border: none
        }

        .invoice footer {
            width: 100%;
            text-align: center;
            color: #777;
            border-top: 1px solid #aaa;
            padding: 8px 0;
            bottom: 10px;
            position: fixed;
        }

        @media print {
            .invoice {
                font-size: 11px!important;
                overflow: hidden!important
            }

            .invoice footer {
                position: fixed;
                bottom: 10px;
                page-break-after: always
            }

            .invoice>div:last-child {
                page-break-before: always
            }
        }

    </style>
</head>

<body>
<div id="invoice">

    <!-- <div class="toolbar hidden-print">
        <div class="text-right">
            <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
            <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
        </div>
        <hr>
    </div> -->
    <div class="invoice overflow-auto">
        <div >
            <header>
                <div class="row">
                    <div class="col">
                        <!-- <a target="_blank" href="https://lobianijs.com">
                            <img src="http://lobianijs.com/lobiadmin/version/1.0/ajax/img/logo/lobiadmin-logo-text-64.png" data-holder-rendered="true" />
                            </a> -->
                            <h1 class="invoice-id" style="color: #3989c6;"> labQ</h1>
                            <div style="color: #3989c6; line-height: 8px;">Sistem Laboratorium</div>

                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            <a target="_blank" href="https://lobianijs.com">
                            {{ $CurrClientId->name ?? 'null'}}
                            </a>
                        </h2>
                        <div>{{ $CurrClientId->name ?? 'null'}}</div>
                        <div>{{ $CurrClientId->alamat ?? 'null'}}</div>
                        <div>{{ $CurrClientId->no_handphone ?? 'null'}}</div>
                        <div>{{ $CurrClientId->email ?? 'null'}}</div>
                    </div>
                </div>
            </header>
                    <hr style="background-color: #3989c6;">
            <main style="margin-top: -20px;">
                <div class="row contacts" >
                    <div class="col invoice-to">
                        <div class="text-gray-light">INVOICE TO:</div>
                        <h2 class="to">{{ $dataPasien->pasiens->name ?? 'null' }}</h2> 
                        <div class="address"><strong>No. ID :</strong> {{ $dataPasien->id ?? 'null' }}</div>
                        <div class="address"><strong>Nama Pasien:</strong> {{ $dataPasien->pasiens->name ?? 'null' }}</div>
                        <div class="address"><strong>Umur :</strong> {{ $dataPasien->pasiens->tanggal_lahir ?? 'null' }}</div>
                        <div class="address"><strong>Telepon :</strong> {{ $dataPasien->pasiens->no_handphone ?? 'null' }}</div>
                        <div class="address"><strong>Pengirim :</strong> {{ $dataPasien->perusahaans->nama ?? 'null' }}</div>
                        <div class="address"><strong>Dokter :</strong> {{ $dataPasien->dokters->name ?? 'null' }}</div>
                        <div class="email"><a href="mailto:{{ $dataPasien->pasiens->email }}">{{ $dataPasien->pasiens->email ?? 'null' }}</a></div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">INVOICE {{ $dataPasien->id ?? 'null' }}</h1> 
                        <div class="date"><strong>No.Lab :</strong> {{ $dataPasien->no_lab ?? 'null' }}</div>
                        <div class="date"><strong>Tanggal :</strong> {{ $dataPasien->created_at ?? 'null' }}</div>
                        <div class="date"><strong>Alamat :</strong> {{ $dataPasien->pasiens->alamat ?? 'null' }}</div>
                        <div class="date"><strong>Hasil :</strong> Kirim ke Kontraktor</div>
                        <div class="date"><strong>Selesai :</strong> {{ $dataPasien->updated_at ?? 'null' }}</div>
                        <div class="date"><strong>Metode Pembayaran:</strong> Cash</div>
                        <div class="date"><strong>Status Bayar :</strong> Lunas</div>
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-left">PEMERIKSAAN</th>
                            <th class="text-right">HARGA</th>
                            <th class="text-right">DISKON</th>
                            <th class="text-right">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $tot_harga=0;
                            $tot_diskon=0;
                            $tot_grand_total=0;
                        ?>
                    @foreach($dataPrint as $dp)
                        <tr>
                            <td class="text-center">{{ $dp->id }}</td>
                            <td class="text-left"> {{ $dp->pemeriksaans->nama ?? '-' }}</td>
                            <td class="unit text-right">Rp {{ number_format($dp->harga,2,',','.')  }}</td>
                            <td class="qty text-right">{{ $dp->diskon  }} %</td>
                            <td class="total text-right">Rp {{ number_format($dp->total,2,',','.')  }}</td>
                        </tr>
                        <?php
                            $tot_harga+= $dp->harga;
                            $tot_diskon+= $dp->diskon;
                            $tot_grand_total += $dp->total;
                        ?>
                    @endforeach    
                       
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">SUBTOTAL</td>
                            <td>Rp {{ number_format($tot_harga,2,',','.') }}</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">DISKON</td>
                            <td>{{$tot_diskon}}</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">GRAND TOTAL</td>
                            <td>Rp {{ number_format($tot_grand_total,2,',','.') }}</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">STATUS BAYAR</td>
                            <td>LUNAS</td>
                        </tr>
                    </tfoot>
                </table>
                <div class="thanks">Terima Kasih</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">Total bayar seratus lima puluh ribu rupiah</div>
                </div>
            </main>
            <footer>
                @labqu.id www.labqu.id Sistem Laboratorium 
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>
</body>
</html> --}}