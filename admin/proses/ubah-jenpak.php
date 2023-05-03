<?php
    session_start();
    require '../../koneksi.php';

    if(isset($_POST['ubah']))
    {
        if(isset($_POST['id']))
        {
            $id = $_POST['id'];
            $jenis_pakaian = $_POST['jenis_pakaian'];
            $harga_satuan = $_POST['harga_satuan'];
            

            $ubah = mysqli_query($koneksi, "UPDATE jenis_pakaian SET nama_pakaian='$jenis_pakaian', harga_satuan='$harga_satuan' WHERE id='$id'");

            if($ubah)
            {
                $_SESSION['message'] = '<div class="alert alert-success bg-success text-white">
                    <em class="fas fa-check"></em> Berhasil Ubah Data
                </div>';
                header('location: ../?page=add_jenpak');
            }
        }
    }
?>