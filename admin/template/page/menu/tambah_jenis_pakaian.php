<div class="batas">
    <div class="card">
        <div class="card-header">
            <b>Jenis Pakaian</b>
        </div>
        <div class="card-body">
            <button type="button" data-target="#tambah_jp" data-toggle="modal" class="btn btn-success mb-4">
                <em class="fas fa-plus"></em> Tambah
            </button>

            <?php require 'btn/jenpak.php'; ?>

            <?php
                if(isset($_SESSION['message']) && $_SESSION['message'] !='')
                {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }
            ?>
            <table class="table table-responsive-lg datatable">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Jenis Pakaian</th>
                        <th class="text-center">Harga Satuan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        $get_data_jenlau = mysqli_query($koneksi, "SELECT * FROM jenis_pakaian");
                        while($data = mysqli_fetch_object($get_data_jenlau)){
                            ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td><?= $data->nama_pakaian; ?></td>
                                    <td class="text-center"><?= "Rp. ".number_format($data->harga_satuan, 0,',','.');?></td>
                                    <td class="text-center">
                                        <a href="#!" data-target="#edit<?= $data->id; ?>" data-toggle="modal" class="btn btn-info mb-2">
                                            <em class="fas fa-edit"></em>
                                        </a>
                                        <a href="#!" data-target="#hapus<?= $data->id; ?>" data-toggle="modal" class="btn btn-danger mb-2">
                                            <em class="fas fa-trash-alt"></em>
                                        </a>
                                    </td>
                                </tr>
                                
                            <?php
                            require 'btn/jenpak.php';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>