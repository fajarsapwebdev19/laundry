<div class="modal fade" id="tambah_order" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-tambah" autocomplete="off">
            <div class="form-group">
                <label>Jenis Pakaian</label>
                <select name="jenis_pakaian" class="form-control" id="jenpak" onchange="seljp()">
                    <option value="">Pilih</option>
                    <?php
                        $jp = mysqli_query($koneksi, "SELECT * FROM jenis_pakaian");
                        while($pk = mysqli_fetch_object($jp)):
                    ?>
                        <option value="<?= $pk->nama_pakaian?>"><?= $pk->nama_pakaian; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Harga Satuan</label>
                <input type="text" name="harga_satuan" id="harga_satuan" class="form-control" onkeydown="return false;" style="caret-color: transparent !important;">
            </div>
            <div class="form-group">
                <label>Jumlah Pakaian</label>
                <input type="text" name="jumlah" id="jumlah" class="form-control">
            </div>
            <div class="form-group">
                <label>Total</label>
                <input type="text" name="total" id="total" class="form-control" onkeydown="return false;" style="caret-color: transparent !important;">
                <input type="hidden" name="username" value="<?= $data_user->username; ?>">
            </div>
            <div class="form-group">
                <button type="submit" id="tombol-simpan" class="btn btn-success">Tambah</button>
            </div>
        </form>

        <div class="view">
        </div>
        <form action="proses/order-satuan.php" method="post" class="needs-validation" autocomplete="off" novalidate>
            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="nama" class="form-control" value="<?= $data_user->nama; ?>" onkeydown="return false;" style="caret-color: transparent !important;">
            </div>
            <div class="form-group">
                <label for="">Alamat</label>
                <textarea type="text" name="alamat" class="form-control" onkeydown="return false;" style="caret-color: transparent !important;"><?= $data_user->alamat; ?></textarea>
            </div>
            <div class="get_order">

            </div>
            
            <div class="modal-footer">
                <button type="submit" name="pesan" class="btn btn-success">Pesan</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>


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
      <form action="proses/hapus-satuan.php" method="post">
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