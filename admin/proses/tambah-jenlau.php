<?php
    session_start();
    require '../../koneksi.php';
    
    if(isset($_POST['tambah']))
    {
        $jenis_laundry = $_POST['jenis_laundry'];
        $harga_perkilo = $_POST['harga_perkilo'];

        $tambah = mysqli_query($koneksi, "INSERT INTO jenis_loundry VALUES(NULL, '$jenis_laundry','$harga_perkilo')");

        if($tambah)
        {
            $_SESSION['message'] = '<div class="alert alert-success bg-success text-white">
                <em class="fas fa-check"></em> Tambah Data Berhasil
            </div>';
            header('location: ../?page=add_jenlau');
        }
    }
?>