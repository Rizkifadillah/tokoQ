@extends('layouts.master')

@section('title')
    Laporan 
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row ">
       
        <!-- /.col -->
        <div class="col-md-12">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item">
                    <button  onclick="updatePeriode('{{ route('pengeluaran.store')}}')" class="btn btn-warning" >
                        Ubah Periode
                    </button>
                    <a href="{{ route('laporan.export_pdf', [$tanggalAwal, $tanggalAkhir])}}" target="_blank" class="btn btn-info mr-4">Cetak PDF</a>
                        <b>Periode: <u>{{ tanggal_indonesia($tanggalAwal,  false)}} s/d {{ tanggal_indonesia($tanggalAkhir,  false)}}</u></b>
                </li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="card">
                    <div class="card-body table-responsive">
                      <table class="table table-hover ">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Tanggal</th>
                            <th>Pembelian</th>
                            <th>Penjualan</th>
                            <th>Pengeluaran</th>
                            <th>Pendapatan</th>
                          </tr>
                        </thead>
                        <tbody>
                         
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  @include('menu.laporan.form')
@endsection

@push('script')

<script>
    let table;

    $(function () {
        table = $('.table').DataTable({
            processing: true,
            autoWidth: true,
            ajax: {
                url: '{{ route('laporan.data', [$tanggalAwal, $tanggalAkhir])}}',
            },
            columns: [
              // {data: 'select_all'},
                {data: 'DT_RowIndex', searchable:false, sortable:false},
                {data: 'tanggal'},
                {data: 'pembelian'},
                {data: 'penjualan'},
                {data: 'pengeluaran'},
                {data: 'pendapatan'},
            ],
            dom: 'Brt',
            bSort: false,
            bPaginate: false,
        });

        
        

        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
        })

        $('#modal-form').validator().on('submit', function(e){
            if (! e.preventDefault()) {
                $('#modal-form form').submit();
            }
        })
    });

    function updatePeriode(url){
        $('#modal-form').modal('show');
    }
    
</script>
    
@endpush