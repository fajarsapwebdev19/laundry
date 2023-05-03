<?php
    require '../koneksi.php';
    
    $jenis = $_GET['jenis'];

    $jenis = mysqli_query($koneksi, "SELECT * FROM jenis_loundry WHERE jenis='$jenis'");

    $data = mysqli_fetch_array($jenis);

    $jenlau = array(
        'id' => $data['id'],
        'jenis' => $data['jenis'],
        'harga_perkilo' => $data['harga_perkilo']
    );

    echo json_encode($jenlau);
?>