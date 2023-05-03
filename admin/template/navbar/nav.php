<?php
    if(empty($_GET['page']))
    {
        require 'menu/home.php';
    }
    elseif($_GET['page'] == "data_akun")
    {
        require 'menu/data_akun.php';
    }
    elseif($_GET['page'] == "add_jenlau")
    {
        require 'menu/tambah_jenis_laundry.php';
    }
    elseif($_GET['page'] == "add_jenpak")
    {
        require 'menu/tambah_jenis_pakaian.php';
    }
    elseif($_GET['page'] == "report_satuan")
    {
        require 'menu/laporan_satuan.php';
    }
    elseif($_GET['page'] == "report_kiloan")
    {
        require 'menu/laporan_kiloan.php';
    }
    elseif($_GET['page'] == "data_order")
    {
        require 'menu/data_order.php';
    }
    elseif($_GET['page'] == "kon_transfer")
    {
        require 'menu/konfirmasi_transfer.php';
    }
    elseif($_GET['page'] == "profile")
    {
        require 'menu/profile.php';
    }
?>