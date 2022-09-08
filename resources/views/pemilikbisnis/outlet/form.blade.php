<div class="modal inmodal" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" class="form-horizontal" method="post">
            @csrf
            @method('post')
            <div class="modal-content animated fadeIn">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-newspaper-o modal-icon"></i>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_outlet">Nama Outlet :</label>
                            <input type="text" name="nama_outlet" class="form-control" id="nama_outlet"  placeholder="Masukan Nama Outlet">
                    </div>
                    <div class="form-group">
                        <label for="telepon">Telepon Outlet:</label>
                            <input type="text" name="telepon" class="form-control" id="telepon"  placeholder="Masukan Telepon Outlet">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat :</label>
                            <input type="text" name="alamat" class="form-control" id="alamat"  placeholder="Masukan Alamat Outlet">
                    </div>
                    <div class="form-group">
                        <label for="kelurahan">Kelurahan :</label>
                        <select id="kelurahan" data-cache="true" tabindex="-1" class="livesearch form-control" name="kelurahan">
                            <option value=""></option> 
                        </select>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>


