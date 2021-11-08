
<div class="modal fade" id="modal-produk">
    <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pilih Produk</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-sm table-hover">
                        <thead>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Merk</th>
                            <th>Harga Jual</th>
                            <th><i class="fa fa-cog"></i></th>
                        </thead>
                        <tbody>
                            @foreach ($produk as $key => $item)
                            <tr>
                                <td>{{ $key+1}}</td>
                                <td>
                                    <span class="badge badge-primary">{{ $item->kode}}</span>    
                                </td>
                                <td>{{ $item->nama}}</td>
                                <td>{{ $item->merk}}</td>
                                <td>{{ $item->harga_jual}}</td>
                                <td>
                                    <a href="#" onclick="pilihProduk({{ $item->id_produk }}, '{{ $item->kode}}')" class="btn btn-primary">
                                        <i class="fa fa-check-circle"><small>Pilih</small></i>
                                    </a>
                                </td>
                            </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
