<table class="table table-responsive-lg table-bordered table-sm datatable">
    <thead>
        <tr>
            <th>#</th>
            <th>Jenis Pakaian</th>
            <th>Harga Satuan</th>
            <th class="text-center">Jumlah Pakaian</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php
            session_start();
            require '../koneksi.php';

            $username = $_SESSION['username'];
            $get_data_user = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
            $data_user = mysqli_fetch_object($get_data_user);

            $no = 1;
            $username = $data_user->username;
            $os = mysqli_query($koneksi, "SELECT * FROM order_satuan WHERE username='$username'");
            while($satuan = mysqli_fetch_object($os)):
        ?>
            <tr>
                <td><button class="btn btn-danger hapus" id="<?= $satuan->id;?>"><em class="fas fa-trash"></em></button></td>
                <td><?= $satuan->nama_pakaian; ?></td>
                <td><?= "Rp ".number_format($satuan->harga_satuan,0,',','.'); ?></td>
                <td class="text-center"><?= $satuan->jumlah; ?></td>
                <td><?= "Rp ".number_format($satuan->total,0,',','.'); ?></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>