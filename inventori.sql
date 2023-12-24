-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2020 at 06:47 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventori`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(20) NOT NULL,
  `id_rak` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `gambar` varchar(250) DEFAULT NULL,
  `stok_min` int(11) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `id_rak`, `nama`, `keterangan`, `gambar`, `stok_min`, `stok`, `tanggal`) VALUES
('BRG00001', 2, 'BRG001', 'AIR CLEANER ELEMENTMD 620721NA\r\n', '81X95mcIZNL__AC_SX466_.jpg', 30, 99, '2020-07-25 03:28:45'),
('BRG00002', 2, 'ARM STABILIZER BELAKANG46200 - 54G10 / 20NA', 'ARM STABILIZER', '43933303_99f313bc-7162-4c68-839f-6284808622d2_1548_1548.jpg', 0, 100, '2020-07-22 11:21:28'),
('BRG00003', 2, 'BALL JOINT ATAASNAL 300 [ L300 ]', 'Ball Joint', '2030483_22764c70-02f2-4adb-9ea3-1dda6c103065_1152_1152.jpg', 0, 100, '2020-07-22 12:43:46'),
('BRG00004', 2, 'BEARING DG6 2 RSH', 'Bearing', 'images.jpg', 0, 110, '2020-07-23 04:34:19'),
('BRG00005', 2, 'BOLTT SWING ARM 90121 - KEV - 901', 'BOLTT SWING', '0421070a467e0b4f41c6f0bfb21c2a07_tn.jpg', 0, 99, '2020-07-22 13:40:49'),
('BRG00006', 2, 'barang c', 'good', 'photo-sky.jpg', 10, 20, '2020-07-25 03:26:30');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama`, `tanggal`) VALUES
(1, 'teknisi', '2020-06-27 16:37:19'),
(2, 'petugas gudang', '2020-06-27 15:21:13'),
(3, 'kepala gudang', '2020-06-27 15:58:55'),
(4, 'manajer', '2020-06-27 15:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `nip`, `keterangan`, `status`, `tanggal`, `sort`) VALUES
(3, '12', 'Beli', 'accepted', '2020-07-08 05:19:35', 1),
(5, '12', 'belibeli                                        ', 'rejected', '2020-07-08 05:20:25', 1),
(6, '12345', 'assadds                                        ', 'rejected', '2020-07-08 05:16:15', 1),
(7, '123456782', 'sdaasd                                        ', 'accepted', '2020-07-08 05:46:58', 1),
(8, '123456782', '                                        stok hampir habs', 'Pending..', '2020-07-14 04:28:36', 0),
(9, '123456782', '                                        stok hampir habs', 'accepted', '2020-07-14 04:41:56', 1),
(10, '123456782', '                                        hampir abis brow', 'accepted', '2020-07-20 06:31:57', 1),
(11, '123456782', 'mesin abis \r\n', 'accepted', '2020-07-20 06:40:50', 1),
(12, '123456782', 'stok sudah menipis', 'accepted', '2020-07-22 11:23:10', 1),
(13, '123456782', 'untuk nambah                          ', 'accepted', '2020-07-23 04:34:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_detail`
--

CREATE TABLE `pembelian_detail` (
  `id_pembelian_detail` int(11) NOT NULL,
  `id_pembelian` int(11) DEFAULT NULL,
  `kode_barang` varchar(20) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `kepala_gudang` varchar(20) DEFAULT NULL,
  `kepala_gudang_status` varchar(20) DEFAULT NULL,
  `manajer` varchar(20) DEFAULT NULL,
  `manajer_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian_detail`
--

INSERT INTO `pembelian_detail` (`id_pembelian_detail`, `id_pembelian`, `kode_barang`, `jumlah`, `total_harga`, `kepala_gudang`, `kepala_gudang_status`, `manajer`, `manajer_status`) VALUES
(11, 12, 'BRG00001', 99, 0, '123456785', 'accepted', '123456783', 'accepted'),
(12, 13, 'BRG00004', 10, 0, '123456785', 'accepted', '123456783', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `permintaan`
--

CREATE TABLE `permintaan` (
  `id_permintaan` int(11) NOT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permintaan`
--

INSERT INTO `permintaan` (`id_permintaan`, `nip`, `keterangan`, `status`, `tanggal`, `sort`) VALUES
(5, '123456782', '                                       sad', 'Pending..', '2020-06-29 04:15:32', 0),
(6, '123456782', 'haha                                        ', 'accepted', '2020-07-08 04:57:12', 1),
(7, '123456782', 'sdjmj                                        ', 'rejected', '2020-07-08 04:57:50', 1),
(8, '123456782', 'asdasd                                                                                ', 'Pending..', '2020-06-29 04:15:17', 0),
(11, '123456782', 'pinjam                                                                                ', 'accepted', '2020-07-08 06:11:28', 1),
(13, '123456781', 'pegnigeads                                        ', 'accepted', '2020-07-08 06:12:36', 1),
(14, '123456781', 'baju', 'accepted', '2020-07-14 03:44:24', 1),
(15, '123456781', 'sda', 'accepted', '2020-07-14 04:26:28', 1),
(17, '123456781', 'minta', 'accepted', '2020-07-22 06:11:12', 1),
(18, '999999991', 'minta buat mesin', 'accepted', '2020-07-22 13:40:49', 1),
(19, '999999991', 'untuk mesin', 'accepted', '2020-07-23 04:25:26', 1),
(20, '123456781', 'dsad', 'Pending..', '2020-07-24 07:32:27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_detail`
--

CREATE TABLE `permintaan_detail` (
  `id_permintaan_detail` int(11) NOT NULL,
  `id_permintaan` int(11) DEFAULT NULL,
  `kode_barang` varchar(20) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `kepala_gudang` varchar(20) DEFAULT NULL,
  `kepala_gudang_status` varchar(20) DEFAULT NULL,
  `manajer` varchar(20) DEFAULT NULL,
  `manajer_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permintaan_detail`
--

INSERT INTO `permintaan_detail` (`id_permintaan_detail`, `id_permintaan`, `kode_barang`, `jumlah`, `kepala_gudang`, `kepala_gudang_status`, `manajer`, `manajer_status`) VALUES
(17, 17, 'BRG00001', 99, '123456785', 'accepted', '123456783', 'accepted'),
(18, 18, 'BRG00005', 1, '123456785', 'accepted', '123456783', 'accepted'),
(19, 19, 'BRG00001', 1, '123456785', 'accepted', '123456783', 'accepted'),
(20, 20, 'BRG00002', 21, NULL, 'Pending..', NULL, 'Pending..');

-- --------------------------------------------------------

--
-- Table structure for table `rak`
--

CREATE TABLE `rak` (
  `id_rak` int(11) NOT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rak`
--

INSERT INTO `rak` (`id_rak`, `nama`, `tanggal`) VALUES
(2, 'rak a', '2020-06-28 02:49:15'),
(3, 'rak b', '2020-07-24 16:10:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `nip` varchar(20) NOT NULL,
  `password` varchar(250) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `nomer_hp` varchar(20) DEFAULT NULL,
  `id_level` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`nip`, `password`, `nama`, `nomer_hp`, `id_level`, `tanggal`) VALUES
('123456781', '$2y$10$h2CPL4oHcg7XHFcQCD5ex.NBGWP7vUprmQi7qco33APefcWTiaTba', 'asdsad', '089878767867', 1, '2020-07-03 13:25:30'),
('123456782', '$2y$10$0LSJWPOCZCI4vaM20AR0i.QXlfUI2f7kDUrmGpjWPcif6LeXdt9UC', 'syafiq', '0898989', 2, '2020-07-05 00:05:24'),
('123456783', '$2y$10$/eZ9XaaFbanmxf4eE6R/euBwFP5mdAVODBUR26Ea5X7CdPXIZ5faW', 'user', '0898768678', 4, '2020-07-04 02:18:49'),
('123456785', '$2y$10$ueIktHAxigUW7YE1qb4znOFaBQEDC6IdUkN9SjB.xnzbYZcjrxO2e', 'Asep', '123', 3, '2020-07-22 08:42:27'),
('999999991', '$2y$10$0D5M67Kogt9NedkBTldA4ut1M9XknN6zjZPzG.EEAQMTuU5EKcNiW', 'Luthfi', '089213211211', 1, '2020-07-22 13:38:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`),
  ADD KEY `id_rak` (`id_rak`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  ADD PRIMARY KEY (`id_pembelian_detail`),
  ADD KEY `pembelian_detail_ibfk_1` (`id_pembelian`),
  ADD KEY `pembelian_detail_ibfk_2` (`kode_barang`),
  ADD KEY `pembelian_detail_ibfk_3` (`kepala_gudang`),
  ADD KEY `pembelian_detail_ibfk_4` (`manajer`);

--
-- Indexes for table `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`id_permintaan`),
  ADD KEY `peminjaman_ibfk_1` (`nip`);

--
-- Indexes for table `permintaan_detail`
--
ALTER TABLE `permintaan_detail`
  ADD PRIMARY KEY (`id_permintaan_detail`),
  ADD KEY `peminjaman_detail_ibfk_1` (`id_permintaan`),
  ADD KEY `peminjaman_detail_ibfk_2` (`kode_barang`),
  ADD KEY `peminjaman_detail_ibfk_3` (`kepala_gudang`),
  ADD KEY `peminjaman_detail_ibfk_4` (`manajer`);

--
-- Indexes for table `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `users_ibfk_1` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  MODIFY `id_pembelian_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `permintaan`
--
ALTER TABLE `permintaan`
  MODIFY `id_permintaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `permintaan_detail`
--
ALTER TABLE `permintaan_detail`
  MODIFY `id_permintaan_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `rak`
--
ALTER TABLE `rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_rak`) REFERENCES `rak` (`id_rak`);

--
-- Constraints for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  ADD CONSTRAINT `pembelian_detail_ibfk_1` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembelian_detail_ibfk_2` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembelian_detail_ibfk_3` FOREIGN KEY (`kepala_gudang`) REFERENCES `users` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembelian_detail_ibfk_4` FOREIGN KEY (`manajer`) REFERENCES `users` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permintaan`
--
ALTER TABLE `permintaan`
  ADD CONSTRAINT `permintaan_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `users` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permintaan_detail`
--
ALTER TABLE `permintaan_detail`
  ADD CONSTRAINT `permintaan_detail_ibfk_1` FOREIGN KEY (`id_permintaan`) REFERENCES `permintaan` (`id_permintaan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permintaan_detail_ibfk_2` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permintaan_detail_ibfk_3` FOREIGN KEY (`kepala_gudang`) REFERENCES `users` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permintaan_detail_ibfk_4` FOREIGN KEY (`manajer`) REFERENCES `users` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
