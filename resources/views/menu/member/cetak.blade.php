<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Barcode</title>

    <style>
        .box {
            position: relative;
            /* width: 50%; */
        }
        .card{
            width: 85.60mm;
            /* height: 90%; */
        }
        .logo{
            position: absolute;
            top: 3pt;
            right: 0pt;
            font-size: 16pt;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            color: #fff !important;
        }
        .logo p {
            text-align: right;
            margin-right: 16pt;
        }
        .logo img{
            position: absolute;
            margin-top: -5pt;
            width: 40px;
            height: 40px;
            right: 16px;
        }
        .nama {
            position: absolute;
            top: 100pt;
            right: 16pt;
            font-size: 12pt;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            color: #fff !important;
        }
        .telepon{
            position: absolute;
            margin-top: 160px;
            right: 16pt;
            color: #fff;
        }
        .barcode{
            position: absolute;
            top: 105pt;
            /* right: 16pt; */
            left: .860rem;
            border: 1px solid #fff;
            padding: .5px;
            background: #fff;
        }
        .text-left{
            text-align: left !important;
        }
        .text-right{
            text-align: right;
        }
        .text-center{
            text-align: center;
            /* width: 50%; */
        }
    </style>
</head>
<body>
    <table width="100%">
        <tr>
            {{-- dd($datamember) --}}
            @foreach ($datamember as $key => $member)
                <td class="text-center" with="50%" >
                    <div class="box">
                        {{-- <img src="{{ asset('images/member.jpg')}}" alt="card"> --}}
                        <img src="{{ public_path().$setting->path_kartu_member}}" alt="card" width="49.5%">
                        <div class="logo">
                            <p>{{ $setting->nama_toko }} </p>
                            <img src="{{ public_path().$setting->path_logo}}" alt="logo">
                            {{-- <img src="{{ asset('images/logo.png')}}" alt="logo"> --}}
                        </div>
                        <div class="nama">{{$member->nama}}</div>
                        <div class="telepon">{{ $member->telepon}}</div>
                        <div class="barcode text-left">
                            <img src="data:image/png;base64, {{ DNS2D::getBarcodePNG("$member->kode_member",
                            'QRCODE') }}" alt="qrcode"
                            height="45" 
                            width="45">
                        </div>
                    </div>
                </td>
                @if (count($datamember) == 1)
                    <td class="text-center" style="width: 50%;"></td>                    
                @endif
                @if ($no++ % 2 == 0)
                    </tr>
                    <tr>
                @endif
            @endforeach
        </tr>
    </table>
    
</body>
</html>