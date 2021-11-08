@extends('layouts.master')

@section('title')
    Penjualan Detail
@endsection

@push('css-internal')
    <style>
      .table-penjualan tbody tr:last-child{
        display: none;
      }
    </style>
@endpush

@section('content')
<section class="content ">
    <div class="container-fluid ">
      <div class="row ">
       
        <!-- /.col -->
        <div class="col-md-12">
          <div class="card bg-dark">
            {{-- <div class="card-header p-2">
             <table>
                <tr>
                  <td>Supplier</td>
                  <td>: {{ $supplier->nama}}</td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td>: {{ $supplier->alamat}}</td>
                </tr>
                <tr>
                  <td>Supplier</td>
                  <td>: {{ $supplier->telepon}}</td>
                </tr>
             </table>
            </div><!-- /.card-header --> --}}
            {{-- penjualan --}}

            <div class="row">
              <div class="col-md-7">
                <form class="form-produk">
                  @csrf
                  <div class="box-body mt-2 ml-3 mr-3">
                    <div class="form-group row align-self-center">
                      <label for="kode" class="col-lg-3">Kode Produk</label>
                      <div class="col-lg-8">
                        <div class="input-group">
                          <input type="hidden" name="id_produk" id="id_produk">
                          <input type="hidden" name="id_penjualan" id="id_penjualan" value="{{ $id_penjualan }}">
                          <input type="text" class="form-control" name="kode" id="kode">
                          <span class="input-group-btn">
                            <a href="#" onclick="tampilProduk()" class="btn btn-info btn-flat"><i class="fa fa-arrow-right"></i></a href="#">
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
              </form>
              </div>
              <div class="col-md-5">
                <div class="card-header float-left pl-2">
                 
                 </div>
              </div>
            </div>

            {{-- <form class="form-produk">
                @csrf
                <div class="box-body mt-2 ml-3 mr-3 mb--5">
                  <div class="form-group row">
                    <label for="kode" class="col-lg-2">Kode Produk</label>
                    <div class="col-lg-5">
                      <div class="input-group">
                        <input type="hidden" name="id_produk" id="id_produk">
                        <input type="hidden" name="id_penjualan" id="id_penjualan" value="{{ $id_penjualan }}">
                        <input type="text" class="form-control" name="kode" id="kode">
                        <span class="input-group-btn">
                          <a href="#" onclick="tampilProduk()" class="btn btn-info btn-flat"><i class="fa fa-arrow-right"></i></a href="#">
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
            </form> --}}
           

            <div class="card-body">
                <div class="card bg-teal">
                    <div class="card-body">
                      <table class="table table-hover table-sm table-dark p-1 table-penjualan rounded" id="table-data">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Diskon</th>
                            <th>SubTotal</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                         
                        </tbody>
                      </table>

                      <div class="row">
                          <div class="col-lg-7">
                            <div class="small-box bg-danger">
                              <div class="inner float-center">
                                <h1 align="center" class="tampil-bayar"></h1>
                
                              </div>
                              <p class="ml-5 tampil-terbilang"></p>
                              <div class="icon">
                                <i class="fas fa-shopping-cart"></i>
                              </div>
                              <a href="#" class="small-box-footer btn-simpan">
                                Simpan Transaksi <i class="fas fa-arrow-circle-right"></i>
                              </a>
                            </div>
                            {{-- <div class="tampil-bayar bg-warning"></div>
                            <div class="tampil-terbilang"></div> --}}
                          </div>
                          <div class="col-lg-5">
                            <form action="{{ route('transaksi.simpan')}}" class="form-penjualan" method="post">
                              @csrf
                              <input type="hidden" name="id_penjualan" value="{{ $id_penjualan}}">
                              <input type="hidden" name="total" id="total">
                              <input type="hidden" name="total_item" id="total_item">
                              <input type="hidden" name="bayar" id="bayar">
                              <input type="hidden" name="id_member" id="id_member" value="{{ $memberTerpilih->id_member }}">

                              <div class="form-group row">
                                <label for="total" class="col-lg-4">Total</label>
                                <div class="col-lg-8">
                                  <input type="text" id="totalrp" class="form-control" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="kode_member" class="col-lg-4">Member</label>
                                <div class="col-lg-8">
                                  <div class="input-group">
                                    <input type="text" class="form-control" id="kode_member" value="{{ $memberTerpilih->kode_member ?? '-'}}">
                                    <span class="input-group-btn">
                                      <a href="#" onclick="tampilMember()" class="btn btn-danger rounded btn-flat"><i class="fa fa-arrow-right"></i></a href="#">
                                    </span>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="diskon" class="col-lg-4">Diskon</label>
                                <div class="col-lg-8">
                                  <input type="number" name="diskon" id="diskon" readonly  class="form-control" 
                                          value="{{ ! empty($memberTerpilih->id_member) ? $diskon : 0}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="bayar" class="col-lg-4">Bayar</label>
                                <div class="col-lg-8">
                                  <input type="text" id="bayarrp" class="form-control" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="diterima" class="col-lg-4">Diterima</label>
                                <div class="col-lg-8">
                                  <input type="text" name="diterima" id="diterima" class="form-control" value="{{ $penjualan->diterima ?? 0}}" >
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="kembali" class="col-lg-4">Kembali</label>
                                <div class="col-lg-8">
                                  <input type="text" name="kembali" id="kembali" readonly class="form-control" >
                                </div>
                              </div>
                            </form>
                          </div>
                      </div>
                    </div>
                    {{-- <div class="box-footer">
                      <button class="btn btn-primary btn-sm btn-flat float-right m-4 btn-simpan"><i class="fa fa-floppy-o">Simpan Transaksi</i></button>
                    </div> --}}
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

  @include('menu.penjualan_detail.modal_produk')
  @include('menu.penjualan_detail.modal_member')
@endsection

@push('script')

<script>
    let table;

    $(function () {
      $('body').addClass('sidebar-collapse');

        table = $('.table-penjualan').DataTable({
            processing: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('transaksi.data', $id_penjualan)}}',
            },
            columns: [
              // {data: 'select_all'},
                {data: 'DT_RowIndex', searchable:false, sortable:false},
                {data: 'kode'},
                {data: 'nama_produk'},
                {data: 'harga_jual'},
                {data: 'jumlah'},
                {data: 'diskon'},
                {data: 'subtotal'},
                { data: 'aksi' , name: 'aksi' , orderable:true},
            ],
            dom: 'Brt',
            bSort: false,
        })
        .on('draw.dt', function (){
          loadForm($('#diskon').val());
          setTimeout(() => {
            $('#diterima').trigger('mouseout');
          }, 300);
        });

        $(document).on('input', '.qty', function(){
          let id = $(this).data('id');
          let jumlah = $(this).val();

          if (jumlah < 1) {
            $(this).val(1);
            alert('Jumlah tidak boleh kurang dari 1');
            return;
          }

          if(jumlah > 10000){
            $(this).val(10000);
            alert('Jumlah tidak boleh lebih dari 10000');
            return;
          }

          $.post(`{{ url('/transaksi') }}/${id}`,{
            jumlah,
            '_token': $('[name=csrf-token]').attr('content'),
            '_method': 'put'
          })
              .done(response => {
                // $(this).on('mouseout', function(){
                    // table.ajax.reload();
                    table.ajax.reload(() => loadForm($('#diskon').val()));
                // })
              })
              .fail(errors => {
                alert('Data Tidak bisa di update');
                return;
              })
        });


        $(document).on('input', '#diskon', function(){
          if ($(this).val() == 0) {
            $(this).val(0).select();
          }
          loadForm($(this).val());
        });

        $('#diterima').on('mouseout', function(){
          if ($(this).val() == "") {
            $(this).val(0).select();
          }
          console.log($(this).val(), 'OK');
          loadForm($('#diskon').val(), $(this).val());
        }).focus(function () {
          $(this).select();
        });

        $('.btn-simpan').on('click', function (){
          $('.form-penjualan').submit();
        });
    });

    function tampilProduk(){
        $('#modal-produk').modal('show');
        conso
    }

    function hideProduk(){
        $('#modal-produk').modal('hide');
    }

    function pilihProduk(id, kode){
      $('#id_produk').val(id);
      $('#kode').val(kode);
      hideProduk();
      tambahProduk();
      table.ajax.reload();
      console.log(id);
    }

    function tambahProduk(){
      $.post('{{ route('transaksi.store')}}', $('.form-produk').serialize())
      .done(response => {
        $('#kode').focus();
        table.ajax.reload(() => loadForm($('#diskon').val()));
      })
      .fail(errors => {
        alert('Tidak dapat menyimpan data');
        return;
      })
    }

    function tampilMember(){
      $('#modal-member').modal('show');
    }

    function pilihMember(id, kode){
      $('#id_member').val(id);
      $('#kode_member').val(kode);
      $('#diskon').val('{{ $diskon }}');
      loadForm($('#diskon').val());
      $('#diterima').val(0).focus().select();
      hideMember();
    }

    function hideMember(){
      $('#modal-member').modal('hide');
    }
    
    function editForm(url){
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit Supplier');

        //reset form
        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put');
        //triger
        $('#modal-form [name=nama]').focus();

        $.get(url)
          .done((response) => {
            $('#modal-form [name=nama]').val(response.nama);
            $('#modal-form [name=telepon]').val(response.telepon);
            $('#modal-form [name=alamat]').val(response.alamat);
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
          table.ajax.reload(() => loadForm($('#diskon').val()));
        })
        .fail((errors) => {
            alert('Tidak dapat menghapus data');
            return;
        })
      }
    }

    function loadForm(diskon = 0, diterima = 0){
      $('#total').val($('.total').text());
      $('#total_item').val($('.total_item').text());

      $.get(`{{ url('/transaksi/loadform')}}/${diskon}/${$('.total').text()}/${diterima}`)
      .done((response) => {
        $('#totalrp').val('Rp. '+ response.totalrp);
        $('#bayarrp').val('Rp. '+ response.bayarrp);
        $('#bayar').val(response.bayar);
        $('.tampil-bayar').text('Bayar : Rp. '+response.bayarrp);
        $('.tampil-terbilang').text(response.terbilang);

        $('#kembali').val('Rp.'+response.kembalirp);
        if ($('#diterima').val() != 0) {
          $('.tampil-bayar').text('Kembali: Rp. '+response.kembalirp);
          $('.tampil-terbilang').text(response.kembaliterbilang);
        }
          // table.ajax.reload();
        })
        .fail((errors) => {
            alert('Tidak dapat menampilkan data');
            return;
        })    }
</script>
    
@endpush