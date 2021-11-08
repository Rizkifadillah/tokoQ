
<div class="modal fade" id="modal-form">
    <div class="modal-dialog">
        <form action="" method="post">
            @csrf
            @method('post')

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <div class="form-group">
                        <label for="name" class="">Nama</label>
                        <div class="col-md-12">
                            <input type="text" name="name" id="name" class="form-control"  >
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="">Email</label>
                        <div class="col-md-12">
                            <input type="email" name="email" id="email" class="form-control"  >
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="">Password</label>
                        <div class="col-md-12">
                            <input type="password" name="password" id="password" class="form-control" minlength="8" >
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation" class="">Konfirmasi Password</label>
                        <div class="col-md-12">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                data-match="#password" class="form-control"  >
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                   
                    
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
