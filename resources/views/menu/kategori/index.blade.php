@extends('layouts.master')

@section('title')
    Kategori
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
                    <button  onclick="addForm('{{ route('kategori.store')}}')" class="btn btn-info" >
                        Tambah Kategori
                    </button>
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
                            <th>User</th>
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

  @include('menu.kategori.form')
@endsection

@push('script')

<script>
    let table;

    $(function () {
        table = $('.table').DataTable({
            processing: true,
            autoWidth: true,
            ajax: {
                url: '{{ route('kategori.data')}}',
            },
            columns: [
                {data: 'DT_RowIndex', searchable:false, sortable:false},
                {data: 'nama_kategori'},
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
        })
    });

    function addForm(url){
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Tambah Kategori');

        //reset form
        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        //triger
        $('#modal-form [name=nama]').focus();
    }
    
    function editForm(url){
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit Kategori');

        //reset form
        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put');
        //triger
        $('#modal-form [name=nama_kategori]').focus();

        $.get(url)
          .done((response) => {
            $('#modal-form [name=nama_kategori]').val(response.nama_kategori);
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
</script>
    
@endpush