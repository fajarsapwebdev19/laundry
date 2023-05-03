<div class="mt-4">
    <div class="mt-2">
        <?php
            if(isset($_SESSION['message']) && $_SESSION['message'])
            {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
        ?>
    </div>
    <div class="card">
        <div class="card-header">
            <em class="fas fa-credit-card"></em> Pembayaran Laundry Satuan
        </div>
        <div class="card-body">
            <table class="table table-responsive-lg table-striped datatable">
                <thead>
                    <tr>
                        <th class="text-center">Kode Pesanan</th>
                        <th>Nama</th>
                        <th>Pembayaran</th>
                        <th>Total Bayar</th>
                        <th class="text-center">Metode Pembayaran</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Status Bayar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $username = $data_user->username;
                        $payment_satuan = mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE jenis_laundry='Laundry Satuan' AND username='$username'");
                        while($data = mysqli_fetch_object($payment_satuan)):
                    ?>
                        <tr>
                            <td class="text-center"><?= $data->kode_order; ?></td>
                            <td><?= $data->nama; ?></td>
                            <td><?= $data->jenis_laundry; ?></td>
                            <td><?= "Rp".number_format($data->total_bayar,0,',','.'); ?></td>
                            <td class="text-center"><?= $data->metode_bayar; ?></td>
                            <td class="text-center"><?php 
                                    if(empty($data->status))
                                    {
                                        echo '<p class="badge badge-danger">belum upload</p>';
                                    }
                                    if($data->status == "Menunggu")
                                    {
                                        echo '<p class="badge badge-warning">Menunggu</p>';
                                    }
                                    elseif($data->status == "Terima")
                                    {
                                        echo '<p class="badge badge-success">Terima</p>';
                                    }
                                    elseif($data->status == "Tolak")
                                    {
                                        echo '<p class="badge badge-success">Tolak</p>';
                                    }
                                ?>
                            </td>
                            <td class="text-center"><?php 
                                    if($data->status_bayar == "Unpaid")
                                    {
                                        echo '<p class="badge badge-danger">Unpaid</p>';
                                    }
                                    elseif($data->status_bayar == "Paid")
                                    {
                                        echo '<p class="badge badge-success">Paid</p>';
                                    }
                                ?>
                            </td>
                            <td>
                                <?php
                                    if($data->status == "Terima")
                                    {
                                        ?>
                                            <button type="submit" class="btn btn-info mb-2" onclick="JavaScript:window.location.href='proses/cetak_bukti.php?kode_order=<?= $data->kode_order; ?>';" style="background-color: #1CD6CE; border: 1px solid #1CD6CE;"><em class="fas fa-print"></em></button>
                                            <button type="submit" class="btn btn-info mb-2" disabled><em class="fas fa-money-check"></em></button>
                                        <?php
                                    }
                                    else{
                                        ?>
                                            <button type="button" class="btn btn-info mb-2" disabled style="background-color: #1CD6CE; border: 1px solid #1CD6CE;"><em class="fas fa-print"></em></button>
                                            <a href="#!" class="btn btn-info mb-2" data-target="#bayar<?= $data->kode_order; ?>" data-toggle="modal"><em class="fas fa-money-check"></em></a>
                                        <?php
                                    }
                                ?>
                            </td>
                        </tr>
                        <?php require 'btn/payment.php'; ?>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>