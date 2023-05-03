<?php
    session_start();
    require '../../koneksi.php';

    if(isset($_POST['kirim']))
    {
        if(isset($_POST['kode_order']))
        {
            $kode_order = $_POST['kode_order'];

            $metode_bayar = $_POST['metode_bayar'];

            if($metode_bayar == "Tunai")
            {
                $bukti_transfer = "";
                $status = "Terima";
                $status_bayar = "Paid";
            }
            elseif($metode_bayar == "Qris")
            {
                $bukti_transfer = $_FILES['bukti_bayar']['name'];
                $tmp_name = $_FILES['bukti_bayar']['tmp_name'];
                $size = $_FILES['bukti_bayar']['size'];
                $ex = pathinfo($bukti_transfer, PATHINFO_EXTENSION);
                $x = array('png','jpg','jpeg');
                $status = "Menunggu";
                $status_bayar = "Unpaid";

                if(empty($_FILES['bukti_bayar']['name']))
                {
                    $_SESSION['message'] = '<div class="alert alert-danger bg-danger text-white">
                        Bukti Bayar Tidak Ada
                    </div>';
                    header('location: ../?page=pay_satuan');
                }else{
                    if($size >= 3000000)
                    {
                        $_SESSION['message'] = '<div class="alert alert-danger bg-danger text-white">
                            Batas Ukuran File Melebihi 3mb
                        </div>';
                        header('location: ../?page=pay_satuan');
                    }else{
                        if(!in_array($ex, $x))
                        {
                            $_SESSION['message'] = '<div class="alert alert-warning bg-warning text-black">
                                Format File Tidak Sesuai
                            </div>';
                            header('location: ../?page=pay_satuan');
                        }else{
                            $dir = "../../assets/".$bukti_transfer;
                            move_uploaded_file($tmp_name, $dir);
                        }
                    }
                }
            }

            $bayar = mysqli_query($koneksi, "UPDATE pembayaran SET metode_bayar='$metode_bayar', bukti_transfer='$bukti_transfer', status='$status', status_bayar='$status_bayar' WHERE kode_order='$kode_order'");
        }

        if($bayar)
        {
            $_SESSION['message'] = '<div class="alert alert-warning bg-warning text-black">
                <em class="fas fa-check"></em> Pembayaran Berhasil
            </div>';
            header('location: ../?page=pay_satuan');
        }


    }
?>