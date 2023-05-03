<?php
    session_start();
    $dir = "../assets/";
    $filename = $_GET['file'];
    $file_path = $dir.$filename;
    $ctype = "application/octet-stream";

    if(!empty($file_path) && file_exists($file_path))
    {
        header("Pragma:public");
        header("Expired: 0");
        header("Cache-Control: must-revalidate");
        header("Content-Control:public");
        header("Content-Deskription:File Transfer");
        header("Content-Type: $ctype");
        header("Content-Disposition: attachment; filename=\"".basename($file_path)."\"");
        header("Content-Transfer-Encoding: binary");
        header("Content-Length:".filesize($file_path));
        flush();
        readfile($file_path);
        exit();
    }else{
        $_SESSION['message'] = '<div class="alert alert-danger bg-danger text-white">
            The file does not exist
        </div>';
        header('location: ../?page=?page=pay_satuan');
    }
?>