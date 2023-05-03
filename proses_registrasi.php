<?php
    session_start();
    require_once('koneksi.php');

    if(isset($_POST['create']))
    {
        $nama = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['nama']));
        $jenis_kelamin = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['jenis_kelamin']));
        $alamat = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['alamat']));
        $no_telp = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['no_telp']));
        $email = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['email']));
        $username = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['username']));
        $password = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['password']));
        $status_akun = "Tidak Aktif";
        $level = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['level']));

        $get_user_in_db = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");

        $cek = mysqli_num_rows($get_user_in_db);

        if($cek > 0)
        {
            $_SESSION['message'] = '<div class="alert alert-warning bg-warning text-black">
                Gagal Regis! Username Sudah Pernah Digunakan
            </div>';
            header('location: ./?page=registrasi');
        }else{
            $regis = mysqli_query($koneksi, "INSERT INTO user VALUES (NULL, '$nama','$jenis_kelamin','$alamat','$no_telp','$email','$username','$password','$status_akun','$level')");

            if($regis)
            {
                $_SESSION['message'] = '<div class="alert alert-success bg-success text-white">
                    Berhasil Buat Akun
                </div>';
                header('location: ./?page=registrasi');
            }
        }
    }
?>