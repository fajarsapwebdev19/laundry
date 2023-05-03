<?php
    require '../koneksi.php';

    $jenis_pakaian = $_POST['jenis_pakaian'];
    $harga_satuan = $_POST['harga_satuan'];
    $jumlah = $_POST['jumlah'];
    $total = $_POST['total'];
    $username = $_POST['username'];

    $add = mysqli_query($koneksi, "INSERT INTO order_satuan VALUES(NULL, '$jenis_pakaian','$harga_satuan','$jumlah','$total','$username')");

    return $add;
?>