<!-- Modal -->
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form action="" class='form-horizontal' method="POST">
        @csrf
        @method('post')
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="deskripsi" class="col-sm-2 control-label">Deskripsi</label>
                    <div class="col-sm-12">
                      <select name="deskripsi_pemasukan_id" id="deskripsi_pemasukan_id" class="form-control" required>
                            <option value="">Pilih Salah Satu</option>
                            @foreach ($deskripsi as $key=>$item)
                        <option value="{{$item->id}}">{{$item->kode_transaksi}} || {{$item->deskripsi_pemasukan}}</option>
                    @endforeach
                        </select><span class="help-block with-errors"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nominal" class="col-sm-2 control-label">Nominal</label>
                    <div class="col-sm-12">
                        <input type="number" name="nominal" id="nominal" class="form-control" required autofocus>
                        <span class="help-block with-errors"></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
            </div>
          </div>

      </form>
    </div>
  </div>
