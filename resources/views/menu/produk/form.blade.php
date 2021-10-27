
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
                        <label for="nama" class="">Nama</label>
                        <div class="col-md-12">
                            <input type="text" name="nama" id="nama" class="form-control" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="id_kategori" class="">Kategori</label>
                        <div class="col-md-12">
                            <select name="id_kategori" id="id_kategori" class="form-control" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategori as $key =>$item)
                                    <option value="{{ $key}}">{{$item}}</option>
                                @endforeach
                            </select>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="merk" class="">Merk</label>
                        <div class="col-md-12">
                            <input type="text" name="merk" id="merk" class="form-control" required >
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="harga_beli" class="">Harga Beli</label>
                                <div class="col-md-12">
                                    <input type="number" name="harga_beli" id="harga_beli" class="form-control" required >
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="harga_jual" class="">Harga Jual</label>
                                <div class="col-md-12">
                                    <input type="number" name="harga_jual" id="harga_jual" class="form-control" required >
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="diskon" class="">Diskon</label>
                                <div class="col-md-12">
                                    <input type="number" name="diskon" id="diskon" class="form-control" required value="0">
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="stok" class="">Stok</label>
                                <div class="col-md-12">
                                    <input type="text" name="stok" id="stok" class="form-control" required value="0">
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
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
