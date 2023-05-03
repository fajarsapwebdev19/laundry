<!-- tambah -->
<div class="modal fade" id="tambah_jenlau" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><em class="fas fa-plus"></em> Tambah Jenis Laundry</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="proses/tambah-jenlau.php" method="post">
        <div class="modal-body">
            <div class="form-group row">
                <div class="col-md-2">
                    <label>Jenis Laundry</label>
                </div>
                <div class="col-md-10">
                    <input type="text" name="jenis_laundry" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label>Harga Perkilo</label>
                </div>
                <div class="col-md-10">
                    <input type="text" name="harga_perkilo" class="form-control">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" name="tambah" class="btn btn-success">Tambah</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- end tambah -->

<!-- hapus -->
<div class="modal fade" id="hapus<?= $data->id; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><em class="fas fa-trash-alt"></em> Konfirmasi Hapus Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <form action="proses/hapus-jenlau.php" method="post">
        <div class="modal-body">
            <input type="hidden" name="id" value="<?= $data->id; ?>">
            <p>Apakah Anda Yakin Mau Hapus Data ? <?= $data->jenis; ?></p>
        </div>
        <div class="modal-footer">
            <button type="submit" name="hapus" class="btn btn-success">Ya</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
        </div>
     </form>
    </div>
  </div>
</div>
<!-- end hapus -->

<!-- edit -->
<div class="modal fade" id="edit<?= $data->id; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><em class="fas fa-edit"></em> Ubah Data Jenis Loundry</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="proses/ubah-jenlau.php" method="post">
        <div class="modal-body">
            <div class="form-group row">
                <div class="col-md-2">
                    <label>Jenis Laundry</label>
                </div>
                <div class="col-md-10">
                    <input type="hidden" name="id" value="<?= $data->id; ?>">
                    <input type="text" name="jenis_laundry" class="form-control" value="<?= $data->jenis; ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label>Harga Perkilo</label>
                </div>
                <div class="col-md-10">
                    <input type="text" name="harga_perkilo" class="form-control" value="<?= $data->harga_perkilo; ?>">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" name="ubah" class="btn btn-info">Ubah</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- end edit -->