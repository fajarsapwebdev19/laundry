<div class="form-block">
    <div class="text-center">
        <img src="assets/Logo.png" width="150" alt="">
    </div>
    <div class="mb-4">
        <h3 class="text-center">Login <strong>Aplikasi Loundry</strong></h3>
    </div>
    <?php
        if(isset($_SESSION['message']) && $_SESSION['message'])
        {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
    ?>
    <form action="proses_login.php" class="needs-validation" method="post" autocomplete="off" novalidate>
        <div class="form-group first">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
            <div class="invalid-feedback">Username Kosong</div>
        </div>
        <div class="form-group last mb-4">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
            <div class="invalid-feedback">Password Kosong</div>
        </div>

        <button type="submit" name="login" class="btn btn-pill text-white btn-block btn-primary">
            Login
        </button>
    </form>
    <div class="text-center mt-4">
        <a href="?page=registrasi" class="link">
            Buat Akun
        </a>
    </div>
</div>