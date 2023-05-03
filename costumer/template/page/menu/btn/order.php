<!-- tambah pesan loundry kiloan -->
<div class="modal fade" id="tambah_order" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><em class="fas fa-balance-scale"></em> Tambah Loundry Kiloan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="proses/pesan_kiloan.php" method="post" class="needs-validation" autocomplete="off" novalidate>
        <div class="modal-body">
            <div class="form-group">
                <label>
                    Nama
                </label>
                <input type="text" name="nama" class="form-control" value="<?= $data_user->nama; ?>" onkeydown="return false;" style="caret-color: transparent !important;">
            </div>
            <div class="form-group">
                <label>
                    Alamat
                </label>
                <textarea name="alamat" class="form-control" rows="5" onkeydown="return false;" style="caret-color: transparent !important;"><?= $data_user->alamat; ?></textarea>
                <div class="text-red" style="font-size: 12px; color: red;">Jika Anda Ingin Merubah Sebuah Alamat Rubahlah Di Profile Anda</div>
            </div>
            <div class="form-group">
                <label>
                    Jenis Laundry
                </label>
                <select name="jenis_laundry" onchange="jenlau()" class="form-control" id="id" required>
                    <option value="">Pilih</option>
                    <?php
                        $jl = mysqli_query($koneksi, "SELECT * FROM jenis_loundry");
                        foreach ($jl as $sjl):
                    ?>
                        <option value="<?= $sjl['jenis'] ?>"><?= $sjl['jenis'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>
                    Harga Perkilo
                </label>
                <input type="text" id="harga" name="harga_perkilo" class="form-control" onkeydown="return false;" style="caret-color: transparent !important;" required>
                <input type="hidden" name="username" value="<?= $data_user->username; ?>">
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" name="pesan" class="btn btn-success">Pesan</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- end tambah pesan loundry kiloan -->

<!-- batal -->
<div class="modal fade" id="hapus<?= $data->kode_order; ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><em class="fas fa-user-times"></em> Konfirmasi Batal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="proses/hapus-kiloan.php" method="post">
        <div class="modal-body">
            <p>Apakah Anda Yakin Mau Batal Pesan Dengan Kode Order : <?= $data->kode_order; ?></p>
        </div>
        <div class="text-center mb-2">
            <input type="hidden" name="kode_order" value="<?= $data->kode_order; ?>">
            <button type="submit" name="hapus" class="btn btn-success">Ya</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- end batal -->