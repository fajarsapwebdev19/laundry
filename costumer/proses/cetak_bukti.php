<?php
    require '../../koneksi.php';
    require '../../dompdf/autoload.inc.php';

    ob_start();
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();

    $kode_order = $_GET['kode_order'];

    $get_data_laporan = mysqli_query($koneksi, "SELECT * FROM laporan_satuan WHERE kode_order='$kode_order'");
    $data_order = mysqli_fetch_object($get_data_laporan);

    $get_data_pembayaran = mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE kode_order='$kode_order'");
    $data_bayar = mysqli_fetch_object($get_data_pembayaran);
?>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Invoice - <?= $_GET['kode_order'] ?></title>
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    </head>
    <body>
        <div class="mt-3">

            <div>
                <img src="../../assets/Logo.png" width="200" alt="">
            </div>
           
                <table width="100%" height="30%">
                    <tr>
                        <th width="50%"></th>
                        <th width="50%">Invoice</th>
                    </tr>
                    <tr>
                        <!-- kiri -->
                        <th width="50%">Nama : <?= $data_order->nama; ?></th>
                        
                        <!-- kanan -->
                        <th width="50%">Kode Pesanan : <?= $data_order->kode_order; ?></th>
                        
                    </tr>
                    <tr>
                        <!-- kiri -->
                        <th width="50%">Alamat : <?= $data_order->alamat; ?></th>
                        
                        <!-- kanan -->
                        <th width="50%">Status Pembayaran : <span class="mb-2 mt-1 badge bg-success text-white"><?= $data_bayar->status_bayar; ?></span></th>
                        
                    </tr>
                    <tr>
                        <!-- kiri -->
                        <th width="50%">Jenis Laundry : <?= $data_order->jenis_laundry; ?></th>

                        <?php
                            $date = date('d-m-Y');

                            $day = date('D', strtotime($date));

                            $day_list = array(
                                'Sun' => 'Minggu',
                                'Mon' => 'Senin',
                                'Tue' => 'Selasa',
                                'Wed' => 'Rabu',
                                'Thu' => 'Kamis',
                                'Fri' => 'Jumat',
                                'Sat' => 'Sabtu'
                            );
                        ?>
                        
                        <!-- kanan -->
                        <th width="50%">Hari, Tanggal: <?= $day_list[$day] ?>, <?= date('d-m-Y'); ?></th>
                        
                    </tr>
                    <tr>
                        <!-- kiri -->
                        <th width="50%">Metode Bayar : <?= $data_bayar->metode_bayar; ?></th>
                        
                        <!-- kanan -->
                        <th width="50%">Waktu: <?= date('H:i:s')?></th>
                        
                    </tr>
                </table>
            
            <table class="table mt-3" border="1">
                <tr class="table-info table-bordered">
                    <th width="5%" class="text-center">#</th>
                    <th width="35%">Nama Pakaian</th>
                    <th class="text-center" width="15%">Jumlah Pakaian</th>
                    <th class="text-center" width="15%">Harga Satuan</th>
                    <th width="20%" class="text-center">Total</th>
                </tr>
               <?php
                    $no = 1;
                    $data_transaksi = mysqli_query($koneksi, "SELECT * FROM transaksi_satuan WHERE kode_order='$kode_order'");
                    while($data = mysqli_fetch_object($data_transaksi)):
               ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td><?= $data->nama_pakaian; ?></td>
                        <td class="text-center"><?= $data->jumlah; ?></td>
                        <td>Rp <?= number_format($data->harga_satuan,0,',','.'); ?></td>
                        <td>Rp <?= number_format($data->total,0,',','.'); ?></td>
                    </tr>
               <?php endwhile; ?>
                <tr class="table-borderd">
                    <th colspan="4">
                        Sub Total
                    </th>
                    <th>
                        <?php
                            $sum_data = mysqli_query($koneksi, "SELECT SUM(total) AS total FROM transaksi_satuan WHERE kode_order='$kode_order'");
                            $sum = mysqli_fetch_object($sum_data);

                            echo "Rp ".number_format($sum->total,0,',','.');
                        ?>
                    </th>
                </tr>
            </table>

            <div class="mt-2">
                <div class="text-center">
                    <p><b>"Terima Kasih Sudah Mempecayai Kami"</b></p>
                </div>
            </div>
        </div>
    </body>
    </html>
<?php
$html = ob_get_contents();
ob_end_clean();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$invoice_code = $_GET['kode_order'];
$title = 'Invoice - '."$invoice_code";
$dompdf->stream($title.'.pdf', array("Attachment"=>0));
?>