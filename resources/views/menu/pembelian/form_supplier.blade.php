
<div class="modal fade" id="modal-supplier">
    <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pilih Supplier</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover table-supplier">
                        <thead>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Telepon</th>
                            <th>Alamat</th>
                            <th><i class="fa fa-cog"></i></th>
                        </thead>
                        <tbody>
                            @foreach ($supplier as $key => $item)
                            <tr>
                                <td>{{ $key+1}}</td>
                                <td>{{ $item->nama}}</td>
                                <td>{{ $item->telepon}}</td>
                                <td>{{ $item->alamat}}</td>
                                <td>
                                    <a href="{{ route('pembelian.create',$item->id_supplier)}}" class="btn btn-primary">
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
