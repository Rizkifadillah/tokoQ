@extends('layouts.master')

@section('title')
    Produk
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
                    <button  onclick="addForm('{{ route('product.store')}}')" class="btn btn-sm btn-info" ><i class="fa fa-plus-circle"></i>
                        Tambah Produk
                    </button>

                    <button  onclick="deleteSelected('{{ route('product.delete_selected')}}')" class="btn btn-sm btn-danger" ><i class="fa fa-trash"></i>
                        Hapus
                    </button>
                    <button  onclick="cetakBarcode('{{ route('product.cetak_barcode')}}')" class="btn btn-sm btn-warning" ><i class="fa fa-print"></i>
                        Cetak Barcode
                    </button>
                </li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="card">
                    <div class="card-body table-responsive">
                      <form action="" method="post" class="form-produk">
                        @csrf
                        <table class="table table-hover ">
                          <thead>
                            <tr>
                              <th>
                                <input type="checkbox" name="select_all" id="select_all">
                              </th>
                              <th>No</th>
                              <th>Kode</th>
                              <th>Nama</th>
                              <th>Kategori</th>
                              <th>Merk</th>
                              <th>Harga Beli</th>
                              <th>Harga Jual</th>
                              <th>Diskon</th>
                              <th>Stok</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                           
                          </tbody>
                        </table>
                      </form>
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

  @include('menu.produk.form')
@endsection

@push('script')

<script>
    let table;

    $(function () {
        table = $('.table').DataTable({
            processing: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('product.data')}}',
            },
            columns: [
                {data: 'select_all'},
                {data: 'DT_RowIndex', searchable:false, sortable:false},
                {data: 'kode'},
                {data: 'nama'},
                {data: 'kategori'},
                {data: 'merk'},
                {data: 'harga_beli'},
                {data: 'harga_jual'},
                {data: 'diskon'},
                {data: 'stok'},
                { data: 'aksi' , name: 'aksi' , orderable:true},
            ]
        });

        $('#modal-form').validator().on('submit', function(e){
            if (! e.preventDefault()) {
                $.ajax({
                    url: $('#modal-form form').attr('action'),
                    type: 'post',
                    data: $('#modal-form form').serialize()
                })
                .done((response) => {
                    $('#modal-form').modal('hide');
                    table.ajax.reload();
                })
                .fail((errors) => {
                    alert('Tidak dapat menyimpan data');
                    return;
                })
            }
        });

        $('[name=select_all]').on('click', function(){
          $(':checkbox').prop('checked', this.checked);
        });
    });

    function addForm(url){
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Tambah Produk');

        //reset form
        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        //triger
        $('#modal-form [name=nama]').focus();
    }
    
    function editForm(url){
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit Produk');

        //reset form
        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put');
        //triger
        $('#modal-form [name=nama]').focus();

        $.get(url)
          .done((response) => {
            $('#modal-form [name=nama]').val(response.nama);
            // $('#modal-form [name=kode]').val(response.kode);
            $('#modal-form [name=id_kategori]').val(response.id_kategori);
            $('#modal-form [name=merk]').val(response.merk);
            $('#modal-form [name=harga_beli]').val(response.harga_beli);
            $('#modal-form [name=harga_jual]').val(response.harga_jual);
            $('#modal-form [name=diskon]').val(response.diskon);
            $('#modal-form [name=stok]').val(response.stok);
          })
          .fail((errors) => {
              alert('Tidak dapat mengedit data');
              return;
          })
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

    function deleteSelected(url){
      if ($('input:checked').length > 1) {
        if (confirm('Yakin ingin menghapus data?')) {
          $.post(url, $('.form-produk').serialize())
          .done((response) => {
            table.ajax.reload();
          })
          .fail((errors) => {
              alert('Tidak dapat menghapus data');
              return;
          })
        }
      }else{
        alert('pilih data yang akan di hapus')
        return;
      }
    }

    function cetakBarcode(url) {
      if($('input:checked').length < 1){
        alert('Pilih data yang ingin di cetak barcode');
        return;
      }else if($('input:checked').length < 3){
        alert('Pilih minimal 3 data yang ingin di cetak');
        return;
      }else{
        $('.form-produk')
            .attr('action', url)
            .attr('target', '_blank')
            .submit();
      }
    }
</script>
    
@endpush