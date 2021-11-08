@extends('layouts.master')

@section('title')
    Profil Setting
@endsection

@section('content')

    <section class="content">
        <div class="">
            <div class="row ">

                <!-- /.col -->
                <div class="col-md-12">
                    <div class="card ">
                        <form action="{{ route('user.update_profil') }}" method="post" enctype="multipart/form-data"
                            class="form-profil">
                            @csrf
                            {{-- @method('post') --}}
                            <div class="card-body">
                                <div class="alert alert-primary alert-dismissible" style="display: none;">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                    <i class="icon fa fa-check"></i>Perubahan berhasil disimpan
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group row">
                                            <label for="name" class="col-lg-3 control-label float-center">Nama</label>
                                            <div class="col-lg-9 float-left">
                                                <input type="text" name="name" class="form-control" id="name" required
                                                    autofocus value="{{ $profil->name}}">
                                                <span class="help-block with-errors"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="foto" class="col-lg-3 control-label float-center">Profil</label>
                                            <div class="col-lg-6 float-left">
                                                <input type="file" name="foto" class="form-control" id="foto"
                                                    onchange="preview('.tampil-foto', this.files[0], 100)">
                                                <span class="help-block with-errors"></span>
                                                <br>
                                                <div class="tampil-foto">
                                                    <img src="{{ asset($profil->foto ?? '/')}}" width="200">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="old_password" class="col-lg-3">Password Lama</label>
                                            <div class="col-md-9">
                                                <input type="password" name="old_password" id="old_password" class="form-control"
                                                    minlength="8">
                                                <span class="help-block with-errors"></span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password" class="col-lg-3">Password</label>
                                            <div class="col-md-9">
                                                <input type="password" name="password" id="password" class="form-control"
                                                    minlength="8">
                                                <span class="help-block with-errors"></span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password_confirmation" class="col-lg-3">Konfirmasi
                                                Password</label>
                                            <div class="col-md-9">
                                                <input type="password" name="password_confirmation"
                                                    id="password_confirmation" data-match="#password"
                                                    class="form-control">
                                                <span class="help-block with-errors"></span>
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
        $(function() {
            $('#old_password').on('keyup', function (){
                if($(this).val() != ""){
                    $('#password').attr('required', true);
                }else{
                    $('#password').attr('required', false);
                }
            })
            // showData();
            $('.form-profil').validator().on('submit', function(e) {
                if (!e.preventDefault()) {
                    $.ajax({
                            url: $('.form-profil').attr('action'),
                            type: $('.form-profil').attr('method'),
                            data: new FormData($('.form-profil')[0]),
                            async: false,
                            processData: false,
                            contentType: false
                        })
                        .done(response => {
                            
                            $('[name=name]').val(response.name);
                            $('.tampil-foto').html(`<img src="{{ url('/') }}${response.foto}" width="100">`);
                            $('.img-foto-profil').attr('src', `{{ url('/')}}${response.foto}`);
                            $('.alert').fadeIn();
                            setTimeout(() => {
                                $('.alert').fadeOut();
                            }, 2000);
                        })
                        .fail(errors => {
                            if (errors.status == 422) {
                                alert(errors.responseJSON);                                ;
                            }else{
                                alert('Tidak dapat menyimpan data');
                            }
                            return;
                        })
                }
            })
        });

        // function showData() {
        //     $.get('{{ route('setting.show') }}')
        //         .done(response => {
        //             console.log(response);
        //             $('[name=name]').val(response.name);

        //             $('.tampil-foto').html(`<img src="{{ url('/') }}${response.foto}" width="200">`);

        //         })
        //         .fail(errors => {
        //             alert('Tidak dapat menampilkan data');
        //             return;
        //         })
        // }
    </script>

@endpush
