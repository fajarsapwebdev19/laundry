<div class="mt-4">
    <button type="button" class="btn btn-success" data-target="#tambah_order" data-toggle="modal">
        <em class="fas fa-plus"></em> Tambah Pesan Loundry Kiloan
    </button>

    <?php require 'btn/order.php'; ?>

    <div class="mt-2">
        <?php
            if(isset($_SESSION['message']) && $_SESSION['message'] !='')
            {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
        ?>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <em class="fas fa-user-plus"></em> Data Pesanan Loundry Kiloan
        </div>
        <div class="card-body">
            <div class="order-kiloan">
                <table class="table table-responsive-lg datatable">
                    <thead>
                        <tr>
                            <th>Kode Pesanan</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jenis Laundry</th>
                            <th>Harga Perkilo</th>
                            <th>Tanggal Pesan</th>
                            <th>Status Pengerjaan</th>
                            <th>Batal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $username = $data_user->username;
                            $kilo = mysqli_query($koneksi, "SELECT * FROM transaksi_kiloan WHERE username='$username'");
                            while ($data = mysqli_fetch_object($kilo)) :
                        ?>
                            <tr>
                                <td><?= $data->kode_order; ?></td>
                                <td><?= $data->nama; ?></td>
                                <td><?= $data->alamat; ?></td>
                                <td><?= $data->jenis_laundry; ?></td>
                                <td><?= "Rp " . number_format($data->harga_perkilo, 0, ',', '.'); ?></td>
                                <td><?= date('d-m-Y', strtotime($data->tanggal_pesan)); ?></td>
                                <td><?php
                                    if ($data->status_pengerjaan == "Menunggu") {
                                        echo '<p class="badge bg-warning">
                                                            Menunggu
                                                        </p>';
                                    } elseif ($data->status_pengerjaan == "Proses") {
                                        echo '<p class="badge bg-info">
                                                            Proses
                                                        </p>';
                                    } elseif ($data->status_pengerjaan == "Selesai") {
                                        echo '<p class="badge bg-success">
                                                            Selesai
                                                        </p>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="#!" class="btn btn-danger" data-target="#hapus<?= $data->kode_order; ?>" data-toggle="modal"><em class="fas fa-times"></em></a>
                                </td>
                            </tr>
                            <?php require 'btn/order.php'; ?>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>