<?php
    session_start();
    require '../koneksi.php';

    $username = $_SESSION['username'];
    $get_data_user = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
    $data_user = mysqli_fetch_object($get_data_user);

    $username = $data_user->username;
    $get_order = mysqli_query($koneksi, "SELECT * FROM order_satuan WHERE username='$username'");
    while($order = mysqli_fetch_object($get_order)):
?>
    <input type="hidden" name="nama_pakaian[]" value="<?= $order->nama_pakaian; ?>">
    <input type="hidden" name="harga_satuan[]" value="<?= $order->harga_satuan; ?>">
    <input type="hidden" name="jumlah[]" value="<?= $order->jumlah; ?>">
    <input type="hidden" name="total[]" value="<?= $order->total; ?>">
<?php endwhile; ?>
<?php
    $username = $data_user->username;
    $sum_order = mysqli_query($koneksi, "SELECT sum(total) AS jumlah_bayar FROM order_satuan WHERE username='$username'");
    $money = mysqli_fetch_object($sum_order);
?>
<div class="form-group">
    <label for="">Total Bayar</label>
    <input type="text" class="form-control" name="total_bayar" value="<?php if(empty($money->jumlah_bayar)){echo "";}else{echo $money->jumlah_bayar; }?>" onkeydown="return false;" style="caret-color: transparent !important;" required>
    <div class="invalid-feedback">Silahkan Tambah Pesanan Terlebih Dahulu</div>
    <input type="hidden" name="username" value="<?= $data_user->username; ?>">
</div>