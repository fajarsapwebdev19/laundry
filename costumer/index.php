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

    if($_SESSION['level'] != "User")
    {
        ?>
            <script>
                alert('Anda Bukan Customer');
                window.location.href='../admin/';
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

        label.error{
            color: red;
            font-size: 12px;
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
    <script src="../assets/js/jquery-1.12.4.min.js"></script>
    <script src="../assets/js/jquery.validate.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../assets/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

    <script>
        $(document).ready( function () {
            $('.datatable').DataTable();
        } );

        function jenlau(){
            var jenis = $("#id").val();

            $.ajax({
                url: 'jenis-laundry.php',
                type: 'GET',
                data: "jenis="+jenis,
            }).success(function(data){
                var json = data,
                obj = JSON.parse(json);
                $('#harga').val(obj.harga_perkilo);
            })
        }

        function seljp(){
            var jenis_pak = $("#jenpak").val();
            
            $("#harga_satuan").val(null);
            $("#jumlah").val(null);
            $("#total").val(null);

            $.ajax({
                url: 'jenis-pakaian.php',
                type: 'GET',
                data: "nama_pakaian="+jenis_pak,
            }).success(function(data){
                var json = data,
                obj = JSON.parse(json);
                $("#harga_satuan").val(obj.harga_satuan);
            })
        }

        //hitung jumlah satuan
        $(document).ready(function(){
            $("#harga_satuan,#jumlah").keyup(function() {
                var harga_satuan = $('#harga_satuan').val();
                var jumlah = $('#jumlah').val();

                var total = parseFloat(harga_satuan) * parseFloat(jumlah);

                if(isNaN(total)) {
                    $("#total").val(0);
                }else{
                    $("#total").val(total);
                }
            });
        });

        

        $(document).on('click', '.hapus', function(){
            var id = $(this).attr('id');

            $.ajax({
                type: 'POST',
                url: "hapus-order.php",
                data: {id:id},
                success: function() {
                    $('.view').load("order_satuan.php");
                    $('.get_order').load("get_order.php");
                }, error: function(response){
                    console.log(response.responseText);
                }
            });
        });

        $(document).ready(function(){
            $('.view').load("order_satuan.php");
            $('.get_order').load("get_order.php");
        });

        $('#tombol-simpan').click(function() {
            $('#form-tambah').validate({
                rules: {
                    jenis_pakaian: {
                        required: true,
                    },
                    jumlah:{
                        required: true
                    }
                },
                messages:{
                    jenis_pakaian: 'Pilih Jenis Pakaian Terlebih dahulu',
                    jumlah: 'Masukan Jumlah Pakaian Anda'
                },
                submitHandler:function(form){
                    $.ajax({
                        type: 'POST',
                        url: 'tambah.php',
                        data: $('#form-tambah').serialize(),
                        success: function(){
                            $('.view').load("order_satuan.php");
                            $('.get_order').load("get_order.php");

                            $('#jenpak').val(null);
                            $('#harga_satuan').val(null);
                            $('#jumlah').val(null);
                            $('#total').val(null);
                        }
                    });
                }
            });
        });

        //form hidden and show

        function payment_method(pay){
            if(pay == 1)
            {
                document.getElementById('payment-qris').style.display="none";
                document.getElementById('bukti').required= false;
            }else{
                document.getElementById('payment-qris').style.display="block";
                document.getElementById('bukti').required= true;
            }
        }

        
        
    </script>
</body>
</html>