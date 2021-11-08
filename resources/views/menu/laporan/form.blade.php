
<div class="modal fade" id="modal-form">
    <div class="modal-dialog">
        <form action="{{ route('laporan.index')}}" method="get">
            @csrf
            {{-- @method('post') --}}

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    
                    
                    <div class="form-group">
                        <label for="tanggal_awal" class="">Tanggal Awal</label>
                        <div class="col-md-12">
                            <input type="date" name="tanggal_awal" id="tanggal_awal" value="{{ request('tanggal_awal')}}" class="form-control datepicker" required >
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_akhir" class="">Tanggal Akhir</label>
                        <div class="col-md-12">
                            <input type="date" name="tanggal_akhir" id="tanggal_akhir" value="{{ request('tanggal_akhir')}}" class="form-control datepicker" required >
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
