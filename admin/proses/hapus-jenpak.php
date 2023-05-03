<?php
    session_start();
    require '../../koneksi.php';

    if(isset($_POST['hapus']))
    {
        $id = $_POST['id'];

        $hapus = mysqli_query($koneksi, "DELETE FROM jenis_pakaian WHERE id='$id'");

        if($hapus)
        {
            $_SESSION['message'] = '<div class="alert alert-success bg-success text-white">
                <em class="fas fa-check"></em> Berhasil Hapus Data
            </div>';
            header('location: ../?page=add_jenpak');
        }
    }
?>