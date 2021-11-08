@extends('layouts.master')

@section('title')
    Transaksi Penjualan
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row ">
       
        <!-- /.col -->
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="alert alert-success alert-dismissible">
                        <i class="fa fa-check"></i>
                        Data Transaksi Telah Selesai
                    </div>
                </div>
                <div class="box-footer">
                    @if ($setting->tipe_nota == 1)
                        <button class="btn btn-warning" onclick="notaKecil('{{ route('transaksi.nota_kecil')}}', 'Nota Transaksi Kecil')"> Cetak Nota Transaksi </button>
                    @elseif ($setting->tipe_nota = 2)
                        <button class="btn btn-warning" onclick="notaBesar('{{ route('transaksi.nota_besar')}}', 'Nota Transaksi Besar')"> Cetak Nota Transaksi </button>
                    @endif
                    <a href="{{ route('transaksi.baru')}}" class="btn btn-info"> Transaksi Baru </a>
                </div>
            </div>
       
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

@endsection

@push('script')

<script>

    function notaKecil(url,title){
        popupCenter(url,title,520,500);
    }

    function notaBesar(url,title){
        popupCenter(url,title,720,675);
    }

    function popupCenter(url, title, w, h){
        const dualScreenLeft = window.screenLeft !== undefined ? window.screenLeft : window.screenX;
        const dualScreenTop  = window.screenTop  !== undefined ? window.screenTop  : window.screenY;

        const width     = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
        const height    = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

        const systemZoom    = width / window.screen.availWidth;
        const left          = (width - w) / 2 / systemZoom + dualScreenLeft
        const top           = (height - h) /2 / systemZoom + dualScreenTop
        const newWindow     = window.open(url, title,
            `
                scrollbars=yes,
                width       = ${w / systemZoom},
                height      = ${h / systemZoom},
                top         = ${top},
                left        = ${left}
            `
        )

        if (window.focus) newWindow.focus();
    }

</script>
    
@endpush