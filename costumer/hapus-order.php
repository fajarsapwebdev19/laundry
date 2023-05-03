<?php
    require '../koneksi.php';

    $id = $_POST['id'];

    mysqli_query($koneksi, "DELETE FROM order_satuan WHERE id='$id'");
?>