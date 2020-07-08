-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jul 2020 pada 12.06
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

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
-- Struktur dari tabel `barang`
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
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode_barang`, `id_rak`, `nama`, `keterangan`, `gambar`, `harga`, `stok`, `tanggal`) VALUES
('BRG00001', 2, 'barang a', 'asdasd', 'Screenshot_(7).png', 1232, 93, '2020-07-08 06:13:06'),
('BRG00002', 2, 'barang b', 'sad', 'Screenshot_(12).png', 123, 90, '2020-07-08 06:12:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama`, `tanggal`) VALUES
(1, 'teknisi', '2020-06-27 16:37:19'),
(2, 'petugas gudang', '2020-06-27 15:21:13'),
(3, 'kepala gudang', '2020-06-27 15:58:55'),
(4, 'manajer', '2020-06-27 15:59:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
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
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `nip`, `keterangan`, `status`, `tanggal`, `sort`) VALUES
(3, '12', 'Beli', 'accepted', '2020-07-08 05:19:35', 1),
(5, '12', 'belibeli                                        ', 'rejected', '2020-07-08 05:20:25', 1),
(6, '12345', 'assadds                                        ', 'rejected', '2020-07-08 05:16:15', 1),
(7, '123456782', 'sdaasd                                        ', 'accepted', '2020-07-08 05:46:58', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_detail`
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
-- Dumping data untuk tabel `pembelian_detail`
--

INSERT INTO `pembelian_detail` (`id_pembelian_detail`, `id_pembelian`, `kode_barang`, `jumlah`, `total_harga`, `kepala_gudang`, `kepala_gudang_status`, `manajer`, `manajer_status`) VALUES
(3, 3, 'BRG00001', 4, 4928, '123456785', 'rejected', '123456783', 'accepted'),
(5, 5, 'BRG00002', 10, 1230, '123456785', 'rejected', '123456783', 'rejected'),
(6, 6, 'BRG00002', 13, 1476, '123456785', 'rejected', '123456783', 'rejected'),
(7, 7, 'BRG00002', 10, 1230, '123456785', 'accepted', '123456783', 'accepted');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaan`
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
-- Dumping data untuk tabel `permintaan`
--

INSERT INTO `permintaan` (`id_permintaan`, `nip`, `keterangan`, `status`, `tanggal`, `sort`) VALUES
(5, '123456782', '                                       sad', 'Pending..', '2020-06-29 04:15:32', 0),
(6, '123456782', 'haha                                        ', 'accepted', '2020-07-08 04:57:12', 1),
(7, '123456782', 'sdjmj                                        ', 'rejected', '2020-07-08 04:57:50', 1),
(8, '123456782', 'asdasd                                                                                ', 'Pending..', '2020-06-29 04:15:17', 0),
(11, '123456782', 'pinjam                                                                                ', 'accepted', '2020-07-08 06:11:28', 1),
(13, '123456781', 'pegnigeads                                        ', 'accepted', '2020-07-08 06:12:36', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaan_detail`
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
-- Dumping data untuk tabel `permintaan_detail`
--

INSERT INTO `permintaan_detail` (`id_permintaan_detail`, `id_permintaan`, `kode_barang`, `jumlah`, `kepala_gudang`, `kepala_gudang_status`, `manajer`, `manajer_status`) VALUES
(6, 6, 'BRG00001', 2, '123456785', 'accepted', '123456783', 'accepted'),
(7, 7, 'BRG00002', 12, '123456785', 'rejected', '123456783', 'rejected'),
(11, 11, 'BRG00001', 5, '123456785', 'accepted', '123456783', 'accepted'),
(13, 13, 'BRG00002', 20, '123456785', 'accepted', '123456783', 'accepted');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rak`
--

CREATE TABLE `rak` (
  `id_rak` int(11) NOT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rak`
--

INSERT INTO `rak` (`id_rak`, `nama`, `tanggal`) VALUES
(2, 'rak a', '2020-06-28 02:49:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`nip`, `password`, `nama`, `nomer_hp`, `id_level`, `tanggal`) VALUES
('123456781', '$2y$10$h2CPL4oHcg7XHFcQCD5ex.NBGWP7vUprmQi7qco33APefcWTiaTba', 'asdsad', '089878767867', 1, '2020-07-03 13:25:30'),
('123456782', '$2y$10$0LSJWPOCZCI4vaM20AR0i.QXlfUI2f7kDUrmGpjWPcif6LeXdt9UC', 'syafiq', '0898989', 2, '2020-07-05 00:05:24'),
('123456783', '$2y$10$/eZ9XaaFbanmxf4eE6R/euBwFP5mdAVODBUR26Ea5X7CdPXIZ5faW', 'user', '0898768678', 4, '2020-07-04 02:18:49'),
('123456785', '$2y$10$ueIktHAxigUW7YE1qb4znOFaBQEDC6IdUkN9SjB.xnzbYZcjrxO2e', 'kepgudang', '123', 3, '2020-07-04 02:18:29');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`),
  ADD KEY `id_rak` (`id_rak`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  ADD PRIMARY KEY (`id_pembelian_detail`),
  ADD KEY `pembelian_detail_ibfk_1` (`id_pembelian`),
  ADD KEY `pembelian_detail_ibfk_2` (`kode_barang`),
  ADD KEY `pembelian_detail_ibfk_3` (`kepala_gudang`),
  ADD KEY `pembelian_detail_ibfk_4` (`manajer`);

--
-- Indeks untuk tabel `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`id_permintaan`),
  ADD KEY `peminjaman_ibfk_1` (`nip`);

--
-- Indeks untuk tabel `permintaan_detail`
--
ALTER TABLE `permintaan_detail`
  ADD PRIMARY KEY (`id_permintaan_detail`),
  ADD KEY `peminjaman_detail_ibfk_1` (`id_permintaan`),
  ADD KEY `peminjaman_detail_ibfk_2` (`kode_barang`),
  ADD KEY `peminjaman_detail_ibfk_3` (`kepala_gudang`),
  ADD KEY `peminjaman_detail_ibfk_4` (`manajer`);

--
-- Indeks untuk tabel `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `users_ibfk_1` (`id_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  MODIFY `id_pembelian_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `permintaan`
--
ALTER TABLE `permintaan`
  MODIFY `id_permintaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `permintaan_detail`
--
ALTER TABLE `permintaan_detail`
  MODIFY `id_permintaan_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `rak`
--
ALTER TABLE `rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_rak`) REFERENCES `rak` (`id_rak`);

--
-- Ketidakleluasaan untuk tabel `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  ADD CONSTRAINT `pembelian_detail_ibfk_1` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembelian_detail_ibfk_2` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembelian_detail_ibfk_3` FOREIGN KEY (`kepala_gudang`) REFERENCES `users` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembelian_detail_ibfk_4` FOREIGN KEY (`manajer`) REFERENCES `users` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `permintaan`
--
ALTER TABLE `permintaan`
  ADD CONSTRAINT `permintaan_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `users` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `permintaan_detail`
--
ALTER TABLE `permintaan_detail`
  ADD CONSTRAINT `permintaan_detail_ibfk_1` FOREIGN KEY (`id_permintaan`) REFERENCES `permintaan` (`id_permintaan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permintaan_detail_ibfk_2` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permintaan_detail_ibfk_3` FOREIGN KEY (`kepala_gudang`) REFERENCES `users` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permintaan_detail_ibfk_4` FOREIGN KEY (`manajer`) REFERENCES `users` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
