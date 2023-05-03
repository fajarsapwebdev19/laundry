<div class="form-block">
    <div class="text-center">
        <img src="assets/Logo.png" width="150" alt="">
    </div>
    <div class="mb-4">
        <h3 class="text-center">Registrasi Akun <strong>Aplikasi Loundry</strong></h3>
    </div>
    <?php
        if(isset($_SESSION['message']) && $_SESSION['message'])
        {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
    ?>
    <form action="proses_registrasi.php" class="needs-validation" method="post" autocomplete="off" novalidate>
        <div class="form-group first">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
            <div class="invalid-feedback">Nama Harus Di Isi</div>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <div class="mb-4"></div>
            <select name="jenis_kelamin" class="form-control" required>
                <option value=""></option>
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>
        <div class="form-group first">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" required>
            <div class="invalid-feedback">Alamat Harus Di Isi</div>
        </div>
        <div class="form-group first">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
            <div class="invalid-feedback">Email Harus Di Isi</div>
        </div>
        <div class="form-group first">
            <label>No Telp</label>
            <input type="text" name="no_telp" class="form-control" required>
            <div class="invalid-feedback">No Telp Harus Di Isi</div>
        </div>
        <div class="form-group first">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
            <div class="invalid-feedback">Username Harus Di Isi</div>
        </div>
        <div class="form-group last mb-4">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" required>
            <div class="invalid-feedback">Password Harus Di Isi</div>
        </div>
        <div class="form-group">
            <label>Registrasi Sebagai</label>
            <div class="mb-4"></div>
            <select name="level" class="form-control" required>
                <option value=""></option>
                <option>Admin</option>
                <option>User</option>
            </select>
        </div>

        <button type="submit" name="create" class="btn btn-pill text-white btn-block btn-primary">
            Buat Akun
        </button>
    </form>
    <div class="text-center mt-4">
        <a href="./" class="link">
            Login
        </a>
    </div>
</div>