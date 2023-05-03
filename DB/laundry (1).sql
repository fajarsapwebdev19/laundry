-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2022 at 12:54 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_loundry`
--

CREATE TABLE `jenis_loundry` (
  `id` int(11) NOT NULL,
  `jenis` varchar(200) NOT NULL,
  `harga_perkilo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_loundry`
--

INSERT INTO `jenis_loundry` (`id`, `jenis`, `harga_perkilo`) VALUES
(8, 'Cuci Kering', 5000),
(9, 'Cuci Setrika', 7000),
(10, 'Cuci Kering Dan Setrika', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pakaian`
--

CREATE TABLE `jenis_pakaian` (
  `id` int(11) NOT NULL,
  `nama_pakaian` varchar(200) NOT NULL,
  `harga_satuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_pakaian`
--

INSERT INTO `jenis_pakaian` (`id`, `nama_pakaian`, `harga_satuan`) VALUES
(1, 'Jas', 17000),
(2, 'Kemeja', 13000),
(3, 'Baju Kaos', 12000),
(4, 'Celana Panjang', 13000),
(5, 'Celana Panjang Jeans', 14000),
(6, 'Celana Pendek', 12000),
(7, 'Dasi', 9000),
(8, 'Rompi', 11000),
(9, 'Jacket', 16000),
(10, 'Rok', 13000),
(11, 'Sarung', 11000),
(12, 'Baju Anak', 10000),
(13, 'Gaun Pengantin', 100000),
(14, 'Gaun Pesta', 50000),
(15, 'Selimut', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `laporan_satuan`
--

CREATE TABLE `laporan_satuan` (
  `kode_order` varchar(100) NOT NULL,
  `nama` char(50) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_laundry` char(55) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `status_pengerjaan` enum('Menunggu','Proses','Selesai') NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_satuan`
--

INSERT INTO `laporan_satuan` (`kode_order`, `nama`, `alamat`, `jenis_laundry`, `total_bayar`, `status_pengerjaan`, `tanggal_pesan`, `tanggal_selesai`, `username`) VALUES
('SFR98106818082022', 'Juminten', 'Jl dadap utara no 100', 'Laundry Satuan', 104000, 'Menunggu', '2022-08-18', '0000-00-00', 'jumin');

-- --------------------------------------------------------

--
-- Table structure for table `order_satuan`
--

CREATE TABLE `order_satuan` (
  `id` int(11) NOT NULL,
  `nama_pakaian` varchar(200) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `kode_order` varchar(100) NOT NULL,
  `nama` char(50) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_laundry` char(55) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `metode_bayar` enum('Tunai','Transfer','Qris') NOT NULL,
  `bukti_transfer` text NOT NULL,
  `status` enum('Menunggu','Terima','Tolak') NOT NULL,
  `status_bayar` enum('Paid','Unpaid') NOT NULL DEFAULT 'Unpaid',
  `username` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`kode_order`, `nama`, `alamat`, `jenis_laundry`, `total_bayar`, `metode_bayar`, `bukti_transfer`, `status`, `status_bayar`, `username`) VALUES
('SFR98106818082022', 'Juminten', 'Jl dadap utara no 100', 'Laundry Satuan', 104000, 'Tunai', '', 'Terima', 'Paid', 'jumin');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_kiloan`
--

CREATE TABLE `pembayaran_kiloan` (
  `kode_order` char(55) NOT NULL,
  `nama` char(50) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_laundry` varchar(55) NOT NULL,
  `berat` int(11) NOT NULL,
  `harga_perkilo` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `metode_bayar` enum('Qris','Tunai') NOT NULL,
  `status` enum('Menunggu','Terima','Tolak') NOT NULL,
  `status_bayar` enum('Paid','Unpaid') NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `kode_order` char(50) NOT NULL,
  `nama` char(50) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_laundry` char(50) NOT NULL,
  `kd_pengirim` char(100) NOT NULL,
  `status` enum('Pengambilan','Sampai_Ditempat_Loundry','Pengiriman','Sampai_Ditujuan') NOT NULL,
  `username` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`kode_order`, `nama`, `alamat`, `jenis_laundry`, `kd_pengirim`, `status`, `username`) VALUES
('SFR98106818082022', 'Juminten', 'Jl dadap utara no 100', 'Laundry Satuan', 'SFR-D76896528', 'Pengambilan', 'jumin');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_kiloan`
--

CREATE TABLE `transaksi_kiloan` (
  `kode_order` char(200) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `berat` int(11) NOT NULL,
  `jenis_laundry` varchar(55) NOT NULL,
  `harga_perkilo` int(11) NOT NULL,
  `status_pengerjaan` enum('Menunggu','Proses','Selesai') NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `username` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_satuan`
--

CREATE TABLE `transaksi_satuan` (
  `id_transaksi` int(11) NOT NULL,
  `nama_pakaian` char(50) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `kode_order` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_satuan`
--

INSERT INTO `transaksi_satuan` (`id_transaksi`, `nama_pakaian`, `harga_satuan`, `jumlah`, `total`, `kode_order`) VALUES
(11162, 'Baju Kaos', 12000, 5, 60000, 'SFR98106818082022'),
(91285, 'Sarung', 11000, 4, 44000, 'SFR98106818082022');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` char(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `no_telpon` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` char(200) NOT NULL,
  `password` char(200) NOT NULL,
  `status_akun` enum('Aktif','Tidak Aktif') NOT NULL,
  `level` enum('Admin','User') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `jenis_kelamin`, `alamat`, `no_telpon`, `email`, `username`, `password`, `status_akun`, `level`) VALUES
(1, 'Arif', 'L', '', '', '', 'admin', 'admin', 'Aktif', 'Admin'),
(2, 'Fajar Saputra', 'L', 'Kedaung Wetan RT 02 / RW 04', '081254199564', 'fajarsaputratkj3@gmail.com', 'fajarsaputra_19dev', 'neglasari1207', 'Aktif', 'User'),
(4, 'Juminten', 'P', 'Jl dadap utara no 100', '089644354843', 'juminten1121@gmail.com', 'jumin', 'jumin', 'Aktif', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_loundry`
--
ALTER TABLE `jenis_loundry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_pakaian`
--
ALTER TABLE `jenis_pakaian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_satuan`
--
ALTER TABLE `laporan_satuan`
  ADD PRIMARY KEY (`kode_order`);

--
-- Indexes for table `order_satuan`
--
ALTER TABLE `order_satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`kode_order`);

--
-- Indexes for table `pembayaran_kiloan`
--
ALTER TABLE `pembayaran_kiloan`
  ADD PRIMARY KEY (`kode_order`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`kode_order`);

--
-- Indexes for table `transaksi_kiloan`
--
ALTER TABLE `transaksi_kiloan`
  ADD PRIMARY KEY (`kode_order`);

--
-- Indexes for table `transaksi_satuan`
--
ALTER TABLE `transaksi_satuan`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_loundry`
--
ALTER TABLE `jenis_loundry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jenis_pakaian`
--
ALTER TABLE `jenis_pakaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order_satuan`
--
ALTER TABLE `order_satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
