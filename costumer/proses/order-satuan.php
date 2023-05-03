<?php
    session_start();
    require '../../koneksi.php';

    if(isset($_POST['pesan']))
    {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $nama_pakaian = $_POST['nama_pakaian'];
        $total_bayar = $_POST['total_bayar'];
        $jenis_laundry = "Laundry Satuan";
        $status_pengerjaan = "Menunggu";
        $tanggal_pesan = date('Y-m-d');
        $tanggal_selesai = "";
        $metode = "";
        $bukti = "";
        $status = "Pengambilan";
        $kode_pengirim = "SFR-D".mt_rand(0,99999999);

        // $data = $_POST['data'];
        $total_data = count($nama_pakaian);
        $id_transaksi = mt_rand(0,99999);
        $kode_order = "SFR".mt_rand(0,999999).date('dmY');
        $username = $_POST['username'];

        $order = mysqli_query($koneksi, "INSERT INTO laporan_satuan VALUES('$kode_order','$nama','$alamat','$jenis_laundry','$total_bayar','$status_pengerjaan','$tanggal_pesan','$tanggal_selesai','$username')");

        $order .= mysqli_query($koneksi, "INSERT INTO pembayaran VALUES('$kode_order','$nama','$alamat','$jenis_laundry','$total_bayar','$metode','$bukti','$status','$username')");

        $order .= mysqli_query($koneksi, "INSERT INTO pengiriman VALUES('$kode_order','$nama','$alamat','$jenis_laundry','$kode_pengirim','$status','$username')");

       

        for($x=0; $x<$total_data; $x++)
        {
            $id_transaksi = mt_rand(0,99999);
            $nama_pakaian = $_POST['nama_pakaian'];
            $harga_satuan = $_POST['harga_satuan'];
            $jumlah = $_POST['jumlah'];
            $total = $_POST['total'];

            $order .= mysqli_query($koneksi, "INSERT INTO transaksi_satuan VALUES('$id_transaksi','$nama_pakaian[$x]','$harga_satuan[$x]','$jumlah[$x]','$total[$x]','$kode_order')");

            $order .= mysqli_query($koneksi, "DELETE FROM order_satuan WHERE username='$username'");
        }

        if($order)
        {
            $_SESSION['message'] = "<div class='alert alert-success bg-success text-white'>
                <em class='fas fa-check'></em> Berhasil Pesan Laundry Satuan
            </div>";
            header('location: ../?page=order_satuan');
        }

       
    }
?>