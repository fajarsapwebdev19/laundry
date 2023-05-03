<?php
    require '../koneksi.php';
    $jenis_pakaian = $_GET['nama_pakaian'];

    $sql = mysqli_query($koneksi, "SELECT * FROM jenis_pakaian WHERE nama_pakaian='$jenis_pakaian'");

    $data = mysqli_fetch_array($sql);

    $json = array(
        'id' => $data['id'],
        'nama_pakaian' => $data['nama_pakaian'],
        'harga_satuan' => $data['harga_satuan']
    );

    echo json_encode($json);
?>