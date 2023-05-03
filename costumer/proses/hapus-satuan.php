<?php
    session_start();
    require '../../koneksi.php';

    if(isset($_POST['hapus'])){
        $kode_order = $_POST['kode_order'];

        $hapus = mysqli_query($koneksi, "DELETE FROM laporan_satuan WHERE kode_order='$kode_order'");

        $hapus .= mysqli_query($koneksi, "DELETE FROM transaksi_satuan WHERE kode_order='$kode_order'");

        $hapus .= mysqli_query($koneksi, "DELETE FROM pembayaran WHERE kode_order='$kode_order'");

        $hapus .= mysqli_query($koneksi, "DELETE FROM pengiriman WHERE kode_order='$kode_order'");

        if($hapus)
        {
            $_SESSION['message'] = "<div class='alert alert-success bg-success text-white'>
                <em class='fas fa-check'></em> Berhasil Batal Laundry Satuan
            </div>";
            header('location: ../?page=order_satuan');
        }
    }
?>