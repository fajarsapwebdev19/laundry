<?php
    session_start();

    require_once('koneksi.php');

    if(isset($_POST['login']))
    {
        $username = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['username']));
        $password = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['password']));

        $get_data_user = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");

        $cek = mysqli_num_rows($get_data_user);

        if($cek > 0)
        {
            $data = mysqli_fetch_object($get_data_user);

            $_SESSION['level'] = $data->level;
            
            if($_SESSION['level'] == "Admin")
            {
                $_SESSION['log_status'] = "Oke";
                $_SESSION['username'] = $data->username;

                header('location: admin/');
            }
            elseif($_SESSION['level'] == "User")
            {
                $_SESSION['log_status'] = "Oke";
                $_SESSION['username'] = $data->username;
                header('location: costumer/');
            }
        }else{
            $_SESSION['message'] = '<div class="alert alert-danger bg-danger text-white">
                Username Atau Password Anda Salah
            </div>';
            header('location: ./');
        }
    }
?>