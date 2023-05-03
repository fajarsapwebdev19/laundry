<?php
    session_start();
    require '../../koneksi.php';
    
    if(isset($_POST['ubah']))
    {
        if(isset($_POST['id']))
        {
            $id = $_POST['id'];
            $jenis_loundry = $_POST['jenis_laundry'];
            $harga_perkilo = $_POST['harga_perkilo'];

            $ubah = mysqli_query($koneksi, "UPDATE jenis_loundry SET jenis='$jenis_loundry', harga_perkilo='$harga_perkilo' WHERE id='$id'");

            if($ubah)
            {
                $_SESSION['message'] = '<div class="alert alert-success bg-success text-white">
                    <em class="fas fa-check"></em> Berhasil Ubah Data
                </div>';
                header('location: ../?page=add_jenlau');
            }
        }
    }
?>