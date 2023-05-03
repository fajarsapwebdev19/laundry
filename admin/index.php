<?php
    session_start();

    require '../koneksi.php';

    if(empty($_SESSION['log_status'] == "Oke"))
    {
        $_SESSION['message'] = '<div class="alert alert-danger bg-danger text-white">
            Anda Belum Melakukan Login
        </div>';
        header('location: .././');
    }

    if($_SESSION['level'] != "Admin")
    {
        ?>
            <script>
                alert('Anda Tidak Memiliki Akses Ke Halaman Admin');
                window.location.href='../costumer/';
            </script>
        <?php
    }

    $username = $_SESSION['username'];
    $get_data_user = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
    $data_user = mysqli_fetch_object($get_data_user);

    if($data_user->status_akun == "Tidak Aktif")
    {
        $_SESSION['message'] = '<div class="alert alert-danger bg-danger text-white">
            Akun Anda Tidak Aktif
        </div>';
        header('location: .././');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data_user->level; ?></title>
    <!-- bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="../assets/fontawesome-free/css/all.min.css">
    <!-- datatable bs 4 CSS -->
    <link rel="stylesheet" href="../assets/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <!-- datepicker CSS -->
    <link rel="stylesheet" href="../assets/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

    <style>
        .content{
            margin-top: 10em;
        }

        .batas{
            padding: 10px 0;
        }
        
    </style>
</head>
<body>
    <?php require 'template/navbar/nav.php'; ?>
    <div class="mt-2">
        <div class="container-fluid">
            <!-- konfirmasi keluar aplikasi -->
            <div class="modal fade" id="konfirmasi_logout" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"><em class="fas fa-power-off"></em> Konfirmasi Logout</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda Yakin Ingin Keluar Dari Aplikasi ?
                    </div>
                    <div class="modal-footer">
                        <form action="../logout.php" method="post">
                            <button type="submit" class="btn btn-success">Ya</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
            <!-- end konfirmasi keluar aplikasi -->
            <?php require 'template/page/page.php';?>
        </div>
    </div>
    <script src="../assets/js/jquery-3.3.1.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../assets/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

    <script>
        $(document).ready( function () {
            $('.datatable').DataTable();
        } );
    </script>
</body>
</html>