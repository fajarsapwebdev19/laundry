-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2022 at 05:18 AM
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
-- Database: `loundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `bukti_bayar`
--

CREATE TABLE `bukti_bayar` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `pembayaran` varchar(200) NOT NULL,
  `jenis_pembayaran` varchar(55) NOT NULL,
  `nominal` int(11) NOT NULL,
  `bukti` varchar(300) NOT NULL,
  `status` enum('Terima','Tolak') NOT NULL,
  `keterangan` text NOT NULL,
  `username` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `transaksi_kiloan`
--

CREATE TABLE `transaksi_kiloan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `berat` int(11) NOT NULL,
  `jenis_loundry` varchar(55) NOT NULL,
  `total` int(11) NOT NULL,
  `jenis_pembayaran` enum('Qris','Tunai','Transfer') NOT NULL,
  `status_pembayaran` enum('Paid','Unpaid') NOT NULL,
  `status_pengerjaan` enum('Menunggu','Proses','Selesai','Tolak') NOT NULL,
  `username` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 'Fajar Saputra', 'L', 'Kedaung Wetan RT 02 / RW 04', '081254199564', 'fajarsaputratkj3@gmail.com', 'fajarsaputra_19dev', 'neglasari1207', 'Aktif', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bukti_bayar`
--
ALTER TABLE `bukti_bayar`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `transaksi_kiloan`
--
ALTER TABLE `transaksi_kiloan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bukti_bayar`
--
ALTER TABLE `bukti_bayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `transaksi_kiloan`
--
ALTER TABLE `transaksi_kiloan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
