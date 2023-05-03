<?php
    session_start();
    require '../../koneksi.php';

    if(isset($_POST['pesan']))
    {
        $kode_order = "SFR".rand(0,99999).date('dmY');
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $berat = "";
        $jenis = $_POST['jenis_laundry'];
        $harga_perkilo = $_POST['harga_perkilo'];
        $status_pengerjaan = "Menunggu";
        $tanggal_pesan = date('Y-m-d');
        $tanggal_selesai = "";
        $username = $_POST['username'];

        $pesan = mysqli_query($koneksi, "INSERT INTO transaksi_kiloan VALUES('$kode_order','$nama','$alamat','$berat','$jenis','$harga_perkilo','$status_pengerjaan','$tanggal_pesan','$tanggal_selesai','$username')");

        if($pesan)
        {
            $_SESSION['message'] = '<div class="alert alert-success bg-success text-white">
                <em class="fas fa-check"></em> Berhasil Pesan Laundry Kiloan
            </div>';
            header('location: ../?page=order_kiloan');
        }

    }
?>