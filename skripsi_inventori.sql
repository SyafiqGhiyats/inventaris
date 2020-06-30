-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2020 at 04:36 AM
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
-- Database: `skripsi_inventori`
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
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `id_rak`, `nama`, `keterangan`, `gambar`, `harga`, `stok`, `tanggal`) VALUES
('BRG00001', 2, 'barang a', 'asdasd', 'Screenshot_(7).png', 1232, 102, '2020-06-29 13:01:45'),
('BRG00002', 2, 'barang b', 'sad', 'Screenshot_(12).png', 123, 100, '2020-06-29 03:59:30');

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

CREATE TABLE `gudang` (
  `id_gudang` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gudang`
--

INSERT INTO `gudang` (`id_gudang`, `nama`, `tanggal`) VALUES
(2, 'gudang a', '2020-06-27 16:48:06'),
(3, 'gudang b', '2020-06-27 16:48:16');

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
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `nip`, `keterangan`, `status`, `tanggal`) VALUES
(3, '12', 'Beli', 'accepted', '2020-06-29 13:01:45'),
(5, '12', 'belibeli                                        ', 'rejected', '2020-06-29 13:41:03'),
(6, '12345', 'assadds                                        ', 'rejected', '2020-06-29 13:51:24');

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
  `manajer_status` varchar(20) DEFAULT NULL,
  `kepala_gudang2` varchar(20) DEFAULT NULL,
  `kepala_gudang2_status` varchar(20) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian_detail`
--

INSERT INTO `pembelian_detail` (`id_pembelian_detail`, `id_pembelian`, `kode_barang`, `jumlah`, `total_harga`, `kepala_gudang`, `kepala_gudang_status`, `manajer`, `manajer_status`, `kepala_gudang2`, `kepala_gudang2_status`, `tanggal`) VALUES
(3, 3, 'BRG00001', 4, 4928, '12345', 'rejected', '1234', 'accepted', '12345', 'accepted', '2020-06-29 13:04:53'),
(5, 5, 'BRG00002', 10, 1230, '12345', 'rejected', NULL, 'Pending..', '12345', 'rejected', '2020-06-29 13:41:03'),
(6, 6, 'BRG00002', 12, 1476, '12345', 'rejected', '1234', 'rejected', '12345', 'rejected', '2020-06-29 13:51:24');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `nip`, `keterangan`, `status`, `tanggal`) VALUES
(1, '123', 'pinjam                                        ', 'accepted', '2020-06-29 04:20:19'),
(5, '123', '                                       sad', 'Pending..', '2020-06-29 04:15:32'),
(6, '123', 'haha                                        ', 'Pending..', '2020-06-29 04:15:22'),
(7, '123', 'sdjmj                                        ', 'Pending..', '2020-06-29 04:16:16'),
(8, '123', 'asdasd                                                                                ', 'Pending..', '2020-06-29 04:15:17'),
(9, '12', 'BELI                                                                                ', 'Pending..', '2020-06-29 09:09:00'),
(10, '12', 'BELI                                                                                ', 'Pending..', '2020-06-29 09:10:45'),
(11, '123', 'pinjam                                                                                ', 'Pending..', '2020-06-29 09:24:06');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_detail`
--

CREATE TABLE `peminjaman_detail` (
  `id_peminjaman_detail` int(11) NOT NULL,
  `id_peminjaman` int(11) DEFAULT NULL,
  `kode_barang` varchar(20) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `kepala_gudang` varchar(20) DEFAULT NULL,
  `kepala_gudang_status` varchar(20) DEFAULT NULL,
  `manajer` varchar(20) DEFAULT NULL,
  `manajer_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman_detail`
--

INSERT INTO `peminjaman_detail` (`id_peminjaman_detail`, `id_peminjaman`, `kode_barang`, `jumlah`, `kepala_gudang`, `kepala_gudang_status`, `manajer`, `manajer_status`) VALUES
(1, 1, 'BRG00001', 10, '12345', 'accepted', '1234', 'accepted'),
(6, 6, 'BRG00001', 2, NULL, 'Pending..', NULL, 'Pending..'),
(7, 7, 'BRG00002', 12, NULL, 'Pending..', NULL, 'Pending..'),
(8, 8, 'BRG00001', 6, NULL, 'Pending..', NULL, 'Pending..'),
(9, 9, 'BRG00002', 4, NULL, 'Pending..', NULL, 'Pending..'),
(10, 10, 'BRG00002', 4, NULL, 'Pending..', NULL, 'Pending..'),
(11, 11, 'BRG00001', 5, NULL, 'Pending..', NULL, 'Pending..');

-- --------------------------------------------------------

--
-- Table structure for table `rak`
--

CREATE TABLE `rak` (
  `id_rak` int(11) NOT NULL,
  `id_gudang` int(11) DEFAULT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rak`
--

INSERT INTO `rak` (`id_rak`, `id_gudang`, `nama`, `tanggal`) VALUES
(2, 3, 'rak a', '2020-06-28 02:49:15');

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
('12', '$2y$10$CbpkTbX4KUDeFHSPxqdeVeoPL6ABh2S9ua.6gc70GQJt1hrpvfQIe', 'pgudang', '098798', 2, '2020-06-29 07:15:48'),
('123', '$2y$10$0LSJWPOCZCI4vaM20AR0i.QXlfUI2f7kDUrmGpjWPcif6LeXdt9UC', 'syafiq', '0898989', 1, '2020-06-27 16:19:55'),
('1234', '$2y$10$/eZ9XaaFbanmxf4eE6R/euBwFP5mdAVODBUR26Ea5X7CdPXIZ5faW', 'user', '0898768678', 4, '2020-06-28 07:27:10'),
('12345', '$2y$10$ueIktHAxigUW7YE1qb4znOFaBQEDC6IdUkN9SjB.xnzbYZcjrxO2e', 'kepgudang', '123', 3, '2020-06-29 01:12:47');

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
-- Indexes for table `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`id_gudang`);

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
  ADD KEY `pembelian_detail_ibfk_4` (`manajer`),
  ADD KEY `pembelian_detail_ibfk_5` (`kepala_gudang2`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `peminjaman_ibfk_1` (`nip`);

--
-- Indexes for table `peminjaman_detail`
--
ALTER TABLE `peminjaman_detail`
  ADD PRIMARY KEY (`id_peminjaman_detail`),
  ADD KEY `peminjaman_detail_ibfk_1` (`id_peminjaman`),
  ADD KEY `peminjaman_detail_ibfk_2` (`kode_barang`),
  ADD KEY `peminjaman_detail_ibfk_3` (`kepala_gudang`),
  ADD KEY `peminjaman_detail_ibfk_4` (`manajer`);

--
-- Indexes for table `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`id_rak`),
  ADD KEY `rak_ibfk_1` (`id_gudang`);

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
-- AUTO_INCREMENT for table `gudang`
--
ALTER TABLE `gudang`
  MODIFY `id_gudang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  MODIFY `id_pembelian_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `peminjaman_detail`
--
ALTER TABLE `peminjaman_detail`
  MODIFY `id_peminjaman_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rak`
--
ALTER TABLE `rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `pembelian_detail_ibfk_4` FOREIGN KEY (`manajer`) REFERENCES `users` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembelian_detail_ibfk_5` FOREIGN KEY (`kepala_gudang2`) REFERENCES `users` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `users` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman_detail`
--
ALTER TABLE `peminjaman_detail`
  ADD CONSTRAINT `peminjaman_detail_ibfk_1` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_detail_ibfk_2` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_detail_ibfk_3` FOREIGN KEY (`kepala_gudang`) REFERENCES `users` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_detail_ibfk_4` FOREIGN KEY (`manajer`) REFERENCES `users` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rak`
--
ALTER TABLE `rak`
  ADD CONSTRAINT `rak_ibfk_1` FOREIGN KEY (`id_gudang`) REFERENCES `gudang` (`id_gudang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
