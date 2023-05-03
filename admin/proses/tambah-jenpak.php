<?php
    session_start();
    require '../../koneksi.php';

    if(isset($_POST['tambah']))
    {
        $jenis_pakaian = $_POST['jenis_pakaian'];
        $harga_satuan = $_POST['harga_satuan'];

        $tambah = mysqli_query($koneksi, "INSERT INTO jenis_pakaian VALUES(NULL,'$jenis_pakaian','$harga_satuan')");

        if($tambah)
        {
            $_SESSION['message'] = '<div class="alert alert-succes bg-success text-white">
                <em class="fas fa-check"></em> Tambah Data Berhasil
            </div>';
            header('location: ../?page=add_jenpak');
        }
    }
?>