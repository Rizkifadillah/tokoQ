@extends('layouts.master')

@section('title')
    Pembelian
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
                      <button  onclick="addForm()" class="btn btn-info" >
                          Transaksi Baru
                      </button>
                    @empty(! session('id_pembelian'))
                      <a href="{{ route('pembelian-detail.index')}}" class="btn btn-info" >
                          Transaksi Aktif
                      </a>
                    @endempty
                </li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="card">
                    <div class="card-body table-responsive">
                      <table class="table table-striped table-sm bg-dark table-pembelian rounded">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Tanggal</th>
                            <th>Supplier</th>
                            <th>Total Item</th>
                            <th>Total Harga</th>
                            <th>Diskon</th>
                            <th>Total Bayar</th>
                            <th>Aksi</th>
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

  @include('menu.pembelian.form_supplier')
  @include('menu.pembelian.detail')
@endsection

@push('script')

<script>
    let tablesupplier;
    let table, table1; 
    // let table1; 

    $(function () {
        table = $('.table-pembelian').DataTable({
            processing: true,
            autoWidth: true,
            ajax: {
                url: '{{ route('pembelian.data')}}',
            },
            columns: [
              // {data: 'select_all'},
                {data: 'DT_RowIndex', searchable:false, sortable:false},
                {data: 'tanggal'},
                {data: 'supplier'},
                {data: 'total_item'},
                {data: 'total_harga'},
                {data: 'diskon'},
                {data: 'bayar'},
                // {data: 'alamat'},
                { data: 'aksi' , name: 'aksi' , orderable:true},
            ]
        });

        tablesupplier =  $('.table-supplier').DataTable();

        table1 = $('.table-detail').DataTable({
          processing: true,
          dom: 'Brt',
          bSort: false,
          columns : [
            {data: 'DT_RowIndex', searchable:false, sortable:false},
            {data: 'kode_produk'},
            {data: 'nama_produk'},
            {data: 'harga_beli'},
            {data: 'jumlah'},
            {data: 'subtotal'},
          ]
        })

        
    });

    

    function detail(url){
      $('#modal-detail').modal('show');
      // $('#modal-detail')[0].reset();
      
      console.log(table1);

      table1.ajax.url(url);
      table1.ajax.reload();
    }

    function addForm(){
        $('#modal-supplier').modal('show');
    }
    
    

    function deleteForm(url){
      if (confirm('Yakin ingin menghapus data?')) {
        $.post(url, {
          '_token': $('[name=csrf-token]').attr('content'),
          '_method': 'delete'
        })
        .done((response) => {
          table.ajax.reload();
        })
        .fail((errors) => {
            alert('Tidak dapat menghapus data');
            return;
        })
      }
    }
</script>
    
@endpush