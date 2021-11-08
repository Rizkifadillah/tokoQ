
<div class="modal fade" id="modal-member">
    <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pilih Member</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover table-member">
                        <thead>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Telepon</th>
                            <th>Alamat</th>
                            <th><i class="fa fa-cog"></i></th>
                        </thead>
                        <tbody>
                            @foreach ($member as $key => $item)
                            <tr>
                                <td>{{ $key+1}}</td>
                                <td>{{ $item->nama}}</td>
                                <td>{{ $item->telepon}}</td>
                                <td>{{ $item->alamat}}</td>
                                <td>
                                    <a href="#" onclick="pilihMember('{{ $item->id_member}}', '{{$item->kode_member}}')" class="btn btn-primary">
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
