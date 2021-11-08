@extends('layouts.master')

@section('title')
    Setting Management
@endsection

@section('content')

<section class="content">
    <div class="">
      <div class="row ">
       
        <!-- /.col -->
        <div class="col-md-12">
          <div class="card ">
                <form action="{{route('setting.update')}}" method="post" enctype="multipart/form-data" class="form-setting" >
                    @csrf
                    {{-- @method('post') --}}
                    <div class="card-body">
                      <div class="alert alert-primary alert-dismissible" style="display: none;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="icon fa fa-check"></i>Perubahan berhasil disimpan
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                              <label for="nama_toko" class="col-lg-3 control-label float-center">Nama Toko</label>
                              <div class="col-lg-9 float-left">
                                  <input type="text" name="nama_toko" class="form-control" id="nama_toko" required autofocus>
                                  <span class="help-block with-errors"></span>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="telepon" class="col-lg-3 control-label float-center">Telepon</label>
                              <div class="col-lg-9 float-left">
                                  <input type="text" name="telepon" class="form-control" id="telepon" required>
                                  <span class="help-block with-errors"></span>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="alamat" class="col-lg-3 control-label float-center">Alamat</label>
                              <div class="col-lg-9 float-left">
                                  <textarea name="alamat" id="alamat" rows="2" class="form-control"></textarea>
                                  <span class="help-block with-errors"></span>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="path_logo" class="col-lg-3 control-label float-center">Logo Toko</label>
                              <div class="col-lg-6 float-left">
                                  <input type="file" name="path_logo" class="form-control" id="path_logo"
                                  onchange="preview('.tampil-logo', this.files[0], 200)" >
                                  <span class="help-block with-errors"></span>
                                  <br>
                                  <div class="tampil-logo"></div>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="path_kartu_member" class="col-lg-3 control-label float-center">Kartu Member Toko</label>
                              <div class="col-lg-6 float-left">
                                  <input type="file" name="path_kartu_member" class="form-control" id="path_kartu_member"
                                         onchange="preview('.tampil-kartu-member', this.files[0], 300)" >
                                  <span class="help-block with-errors"></span>
                                  <br>
                                  <div class="tampil-kartu-member"></div>

                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="tipe_nota" class="col-lg-3 control-label float-center">Tipe Nota</label>
                              <div class="col-lg-4 float-left">
                                  <select name="tipe_nota" id="tipe-nota" class="form-control">
                                    <option value="1">Nota Kecil</option>
                                    <option value="2">Nota Besar</option>
                                  </select>
                                  <span class="help-block with-errors"></span>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="diskon" class="col-lg-3 control-label float-center">Diskon</label>
                              <div class="col-lg-3 float-left">
                                  <input type="number" name="diskon" class="form-control" id="diskon" required>
                                  <span class="help-block with-errors"></span>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-4 text-center   ">
                            <div class="card card-widget widget-user">
                              <div class="widget-user-header text-white" 
                              style="background:url({{ asset('assets/dist/img/photo1.png')}}) 
                              center center; object-fit: contain; ">
                                <h3 class="widget-user-username text-right" id="nama-toko">Elizabeth Pierce</h3>
                              </div>
                              <div class="widget-user-image">
                              </div>
                              
                              <div class="card-footer">
                                  <div class="">
                                    <strong><i class="fas fa-map-marker "></i> Lokasi</strong>
                                    <p class="text-muted" id="text-alamat">
                                      -
                                    </p>
                                    <p>
                                      Phone: <i class="text-muted" id="text-telepon"></i>
                                    </p>
                                  </div>
                                {{-- </div> --}}
                                <div class="row">
                                  <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                      <h5 class="description-header">3,200</h5>
                                      <span class="description-text">MEMBERS</span>
                                    </div>
                                    <!-- /.description-block -->
                                  </div>
                                  <!-- /.col -->
                                  <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                      <h5 class="description-header">13,000</h5>
                                      <span class="description-text">SUPPLIERS</span>
                                    </div>
                                    <!-- /.description-block -->
                                  </div>
                                  <!-- /.col -->
                                  <div class="col-sm-4">
                                    <div class="description-block">
                                      <h5 class="description-header">35</h5>
                                      <span class="description-text">PRODUCTS</span>
                                    </div>
                                    <!-- /.description-block -->
                                  </div>
                                  <!-- /.col -->
                                </div>
                                <!-- /.row -->
                              </div>
                            </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Simpan</button>

                    </div>

                </form>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  @include('menu.user.form')
@endsection

@push('script')

<script>
  $(function (){
    showData();
    $('.form-setting').validator().on('submit', function(e){
      if(! e.preventDefault()){
        $.ajax({
          url: $('.form-setting').attr('action'),
          type: $('.form-setting').attr('method'),
          data: new FormData($('.form-setting')[0]),
          async: false,
          processData: false,
          contentType: false
        })
        .done(response => {
          console.log('.form-setting');
          showData();
          $('.alert').fadeIn();
          setTimeout(() => {
            $('.alert').fadeOut();
          }, 2000);
        })
        .fail(errors => {
          alert('Tidak dapat menyimpan data');
          return;
        })
      }
    })
  });

  function showData(){
    $.get('{{ route('setting.show')}}')
          .done(response => {
            console.log(response);
            $('[name=nama_toko]').val(response.nama_toko);
            $('[name=telepon]').val(response.telpon);
            $('[name=alamat]').val(response.alamat);
            $('[name=diskon]').val(response.diskon);
            $('[name=tipe_nota]').val(response.tipe_nota);

            $('title').text(response.nama_toko + ` | @yield('title')`);
            $('.nama-toko').text(response.nama_toko);
            $('.widget-user-username').text(response.nama_toko);
            $('#text-alamat').text(response.alamat);
            $('#text-telepon').text(response.telpon);

            $('.tampil-logo').html(`<img src="{{ url('/')}}${response.path_logo}" width="200">`);
            $('.tampil-kartu-member').html(`<img src="{{ url('/')}}${response.path_kartu_member}" width="200">`);
            $('.widget-user-image').html(`<img class="img-circle" src="{{ url('/')}}${response.path_logo}" style="width:100px; height:100px;" alt="User Avatar">`);
            $('.widget-user-header').css(`background`,`url({{ url('/')}}${response.path_kartu_member})`);

            $('[rel=icon]').attr('href',`{{ url('/')}}${response.path_logo}`);

          })
          .fail(errors => {
            alert('Tidak dapat menampilkan data');
            return ;
          })
  }
</script>
    
@endpush