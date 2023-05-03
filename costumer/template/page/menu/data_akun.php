<div class="batas">
    <div class="card">
        <div class="card-header">
            <b>Data Akun</b>
        </div>
        <div class="card-body">
            <table class="table datatable table-responsive-sm table-responsive-lg table-hover">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Nama</th>
                        <th>JK</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>No Telp</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th class="text-center">Status Akun</th>
                        <th class="text-center">Level</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        $get_data_user = mysqli_query($koneksi, "SELECT * FROM user");
                        while($data = mysqli_fetch_object($get_data_user)):
                    ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= $data->nama; ?></td>
                            <td><?= $data->jenis_kelamin; ?></td>
                            <td><?= $data->alamat; ?></td>
                            <td><?= $data->email; ?></td>
                            <td><?= $data->no_telpon; ?></td>
                            <td><?= $data->username; ?></td>
                            <td><?= $data->password; ?></td>
                            <td class="text-center">
                                <?php
                                    if($data->status_akun == "Aktif")
                                    {
                                        echo '<em class="fas fa-check-circle text-success"></em>';
                                    }
                                    elseif($data->status_akun == "Tidak Aktif")
                                    {
                                        echo '<em class="fas fa-times-circle text-danger"></em>';
                                    }
                                ?>
                            </td>
                            <td class="text-center"><?= $data->level; ?></td>
                            <td class="text-center">
                                <a href="" class="btn btn-danger btn-sm mb-2">
                                    <em class="fas fa-trash-alt"></em>
                                </a>
                                <a href="" class="btn btn-danger btn-sm mb-2">
                                    <em class="fas fa-user-times"></em>
                                </a>
                            </td>
                        </tr>
                        <?php include 'btn/akun.php'; ?>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>