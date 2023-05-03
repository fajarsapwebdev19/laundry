<?php
    session_start();

    unset($_SESSION['username']);
    unset($_SESSION['log_status']);
    $_SESSION['message'] = '<div class="alert alert-success bg-success text-white">
        Berhasil Keluar Aplikasi
    </div>';
    header('location: ./');

    
?>