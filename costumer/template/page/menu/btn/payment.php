<div class="modal fade" id="bayar<?= $data->kode_order; ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><em class="fas fa-cash-register"></em> Bayar Loundry Satuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="proses/pay-satuan.php" class="needs-validation" method="post" enctype="multipart/form-data" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-group">
                <label for="">Kode Pesanan</label>
                <input type="text" class="form-control" value="<?= $data->kode_order; ?>" onkeydown="return false;" style="caret-color: transparent !important;">
            </div>
            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" class="form-control" value="<?= $data->nama; ?>" onkeydown="return false;" style="caret-color: transparent !important;">
            </div>
            <div class="form-group">
                <label for="">Pembayaran</label>
                <input type="text" class="form-control" value="<?= $data->jenis_laundry; ?>" onkeydown="return false;" style="caret-color: transparent !important;">
            </div>
            <div class="form-group">
                <label for="">Total Bayar</label>
                <input type="text" class="form-control" value="<?= $data->total_bayar; ?>" onkeydown="return false;" style="caret-color: transparent !important;">
            </div>
            <div class="form-group">
                <label for="">Methode Pembayaran</label>
                <div class="mt-1">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="metode_bayar" id="inlineRadio1" value="Qris" onclick="payment_method(0)" required>
                        <label class="form-check-label" for="inlineRadio1">Qris</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="metode_bayar" id="inlineRadio2" value="Tunai" onclick="payment_method(1)" required>
                        <label class="form-check-label" for="inlineRadio2">Tunai</label>
                    </div>
                </div>
            </div>
            <div id="payment-qris" style="display:none;">
                <div class="form-group">
                    <label for="">Qris</label>
                    <div class="mt-2">
                        <img src="../assets/qris.png" width="230" height="250" alt="">
                    </div>
                    <div class="mt-2">
                    <button type="button" class="btn btn-info col-md-6 col-9" onclick="JavaScript:window.location.href='download.php?file=qris.png';"> <em class="fas fa-download"></em> Download</button>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Bukti Bayar</label>
                    <input type="file" name="bukti_bayar" id="bukti" class="form-control">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <input type="hidden" name="kode_order" value="<?= $data->kode_order; ?>">
            <button type="submit" name="kirim" class="btn btn-success">Kirim</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>