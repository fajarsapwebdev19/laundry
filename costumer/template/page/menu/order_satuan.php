<div class="mt-4">
    <button type="button" class="btn btn-success" data-target="#tambah_order" data-toggle="modal">
        <em class="fas fa-plus"></em> Tambah Pesan Loundry Satuan
    </button>

    <?php require 'btn/order_satuan.php'; ?>

    <div class="mt-2">
        <?php
            if(isset($_SESSION['message']) && $_SESSION['message'] !='')
            {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
        ?>
    </div>

    <div class="mt-4">
        <div class="card">
            <div class="card-header">
                <em class="fas fa-tshirt"></em> Data Pesanan Loundry Satuan
            </div>
            <div class="card-body">
                <table class="table table-responsive-lg datatable">
                    <thead>
                        <tr>
                            <th>Kode Pesanan</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jenis Laundry</th>
                            <th>Total Bayar</th>
                            <th>Tanggal Pesan</th>
                            <th>Status Pengerjaan</th>
                            <th>Batal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $username = $data_user->username;
                            $satuan = mysqli_query($koneksi, "SELECT * FROM laporan_satuan WHERE username='$username'");
                            while($data = mysqli_fetch_object($satuan)):
                        ?>
                            <tr>
                                <td><?= $data->kode_order; ?></td>
                                <td><?= $data->nama; ?></td>
                                <td><?= $data->alamat; ?></td>
                                <td><?= $data->jenis_laundry; ?></td>
                                <td><?= $data->total_bayar; ?></td>
                                <td><?= date('d-m-Y', strtotime($data->tanggal_pesan)); ?></td>
                                <td>
                                    <?php
                                        if($data->status_pengerjaan == "Menunggu")
                                        {
                                            echo "<p class='badge badge-warning'>Menunggu</p>";
                                        }elseif($data->status_pengerjaan == "Proses")
                                        {
                                            echo '<p class="badge badge-info">Proses</p>';
                                        }
                                        elseif($data->status_pengerjaan == "Selesai")
                                        {
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
                            <?php require 'btn/order_satuan.php'; ?>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>