-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2020 at 04:39 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kendaraan`
--

-- --------------------------------------------------------

--
-- Table structure for table `bengkel`
--

CREATE TABLE `bengkel` (
  `id` int(11) NOT NULL,
  `nama_bengkel` varchar(64) DEFAULT NULL,
  `alamat` text,
  `no_hp` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bengkel`
--

INSERT INTO `bengkel` (`id`, `nama_bengkel`, `alamat`, `no_hp`) VALUES
(1, 'Jaya Motor', 'Undaan Kidul', '087999007700'),
(2, 'Satu Hati', 'Mejobo Kidul', '082770880990'),
(3, 'Jaya Motor Abadi', 'Undaan Kidul', '087831911448'),
(4, 'Loka Jaya', 'Prambatan Lor', '087766565557'),
(6, 'Sekawan Jaya', 'Kudus', '0908987888');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id` int(11) NOT NULL,
  `nama_pemilik` varchar(64) DEFAULT NULL,
  `merk` varchar(64) DEFAULT NULL,
  `jenis_kendaraan` varchar(64) DEFAULT NULL,
  `tahun_pembuatan` char(10) DEFAULT NULL,
  `no_plat` varchar(16) DEFAULT NULL,
  `no_rangka` varchar(64) DEFAULT NULL,
  `no_mesin` varchar(64) DEFAULT NULL,
  `no_bpkb` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `nama_pemilik`, `merk`, `jenis_kendaraan`, `tahun_pembuatan`, `no_plat`, `no_rangka`, `no_mesin`, `no_bpkb`) VALUES
(2, 'Dinas', 'Yamaha', 'Sepeda Motor', '2014', 'K3901KP', 'q', '1', '1'),
(3, 'Dinas', 'Yamaha', 'Sepeda Motor', '2014', 'K3902KP', 'q', '1', '2'),
(4, 'Dinas', 'Honda', 'Sepeda Motor', '2013', 'K3801KP', '879797', '1', '1'),
(5, 'Dinas', 'Mitsubishi', 'Mobil', '2015', 'K5902KP', 'wwewe', '121', '6565');

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `id` int(11) NOT NULL,
  `id_service` int(11) NOT NULL,
  `nama_barang` varchar(64) DEFAULT NULL,
  `harga_satuan` int(11) DEFAULT NULL,
  `banyak_barang` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nota`
--

INSERT INTO `nota` (`id`, `id_service`, `nama_barang`, `harga_satuan`, `banyak_barang`, `jumlah`) VALUES
(1, 3, 'service ringan', 80000, 1, 80000),
(2, 3, 'Rem depan, belakang', 50000, 2, 100000),
(3, 4, 'Oli', 500000, 2, 1000000),
(4, 4, 'Ban', 300000, 2, 600000);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `id_pengemudi` int(11) NOT NULL,
  `jenis_order` enum('Ringan','Sedang','Berat') DEFAULT NULL,
  `ket_rusak` varchar(64) DEFAULT NULL,
  `tgl_order` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `status` enum('Menunggu verifikasi','Ditolak','Disetujui') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `id_pengemudi`, `jenis_order`, `ket_rusak`, `tgl_order`, `tgl_selesai`, `status`) VALUES
(1, 1, 'Ringan', 'Service, Perbaikan rem', '2020-06-18', '2020-06-20', 'Disetujui'),
(3, 1, 'Ringan', 'Ganti Oli', '2020-06-19', '2020-06-19', 'Disetujui'),
(4, 2, 'Ringan', 'Service Bulanan', '2020-06-19', NULL, 'Disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `pengemudi`
--

CREATE TABLE `pengemudi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_kendaraan` int(11) DEFAULT NULL,
  `status` enum('Aktif','Tidak aktif') DEFAULT NULL,
  `tgl_aktif` date DEFAULT NULL,
  `tgl_nonaktif` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengemudi`
--

INSERT INTO `pengemudi` (`id`, `id_user`, `id_kendaraan`, `status`, `tgl_aktif`, `tgl_nonaktif`) VALUES
(1, 5, 5, 'Aktif', '2020-06-18', NULL),
(2, 2, 2, 'Aktif', '2020-06-19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_bengkel` int(11) NOT NULL,
  `total` int(11) DEFAULT NULL,
  `tgl_service` date DEFAULT NULL,
  `foto_service` text,
  `foto_nota` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `id_order`, `id_bengkel`, `total`, `tgl_service`, `foto_service`, `foto_nota`) VALUES
(3, 1, 1, 180000, '2020-06-20', '3_service.jpg', '3_nota.jpg'),
(4, 3, 2, 1600000, '2020-06-10', '4_service.jpg', '4_nota.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nip` int(18) DEFAULT NULL,
  `nama` varchar(64) DEFAULT NULL,
  `tempat_lahir` varchar(64) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `no_hp` char(20) DEFAULT NULL,
  `alamat` text,
  `username` varchar(64) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` enum('Admin','Pengemudi') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nip`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `no_hp`, `alamat`, `username`, `password`, `level`) VALUES
(1, 2147483647, 'Admin', 'Jepara', '1999-01-03', 'Laki-laki', '087831911448', 'Jepara Kota', 'admin', '$2y$10$mD7FAuviTUtU4PkgGiB9OeOlN.hzi2Vt7MUlxwBT3f9GqOgBji3ym', 'Admin'),
(2, 22222, 'Pengemudi', 'Kudus', '1998-06-23', 'Laki-laki', '8989893737', 'Kudus', 'pengemudi', '$2y$10$loQkCB11wxCDVyIYYGWY0.NqB4V867s88D0Ayuo0pw/3taNDjznAW', 'Pengemudi'),
(3, 33333, 'Choirul Anam', 'Jepara', '1999-01-03', 'Laki-laki', '85875427578', 'Jepara', 'anam', '$2y$10$yPCoZ3Uz8jCcl3cn.JNNbud85Ce7pxBc7n1NSqhgwA.A3QNw9Rt82', 'Admin'),
(4, 44444, 'Andrew Anto', 'Jepara', '1998-06-10', 'Laki-laki', '87887788788', 'Jepara', 'andrew', '$2y$10$pxw32QPfl0Fcf99GeADosuWnVPuLkBMPA8aC5CRwudZDOxd/Q.BhW', 'Pengemudi'),
(5, 55555, 'Adip Safiudin', 'Solo', '1999-04-24', 'Laki-laki', '98767676788', 'Jepara', 'adip', '$2y$10$iSDDDteEGGvOJRYfI8O2euTlIE3Yi6xQJUJFbdpnrXU.KXUEOk1tG', 'Pengemudi'),
(6, 6666, 'Andika Prabowo', 'Kudus', '1998-01-03', 'Laki-laki', '085878787787', 'Kudus Kota', 'dika', '$2y$10$Xaab4N33Pz8A.H1NIbrtj.gFkSF0ED2R7WsVYiuEyZwTI4Q3/EJz6', 'Pengemudi'),
(7, 77777, 'Udin Jous', 'Kudus', '1998-03-06', 'Laki-laki', '085875427478', 'Pati', 'udin', 'udin', 'Pengemudi'),
(8, 8888, 'Nita', 'Semarang', '2001-11-28', 'Perempuan', '2147483647', 'Kudus', 'nita', 'nita', 'Pengemudi'),
(9, 9999, 'mbuh', 'mbuh', '1998-06-22', 'Laki-laki', '02147483647', 'Kudus', 'mbuh', 'mbuh', 'Pengemudi'),
(10, 10101010, 'Bos', 'Semarang', '2000-06-06', 'Laki-laki', '085875427478', 'Kudus', 'bos', '$2y$10$uYvVEHEs56jYrpysONvSbuLJlv5KP.2MxcPt7E5YpL9v9QY7NaomS', 'Pengemudi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bengkel`
--
ALTER TABLE `bengkel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service` (`id_service`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengemudi` (`id_pengemudi`);

--
-- Indexes for table `pengemudi`
--
ALTER TABLE `pengemudi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`id_user`),
  ADD KEY `kendaraan` (`id_kendaraan`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bengkel` (`id_bengkel`),
  ADD KEY `order` (`id_order`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bengkel`
--
ALTER TABLE `bengkel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengemudi`
--
ALTER TABLE `pengemudi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `service` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `pengemudi` FOREIGN KEY (`id_pengemudi`) REFERENCES `pengemudi` (`id`);

--
-- Constraints for table `pengemudi`
--
ALTER TABLE `pengemudi`
  ADD CONSTRAINT `kendaraan` FOREIGN KEY (`id_kendaraan`) REFERENCES `kendaraan` (`id`),
  ADD CONSTRAINT `user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `bengkel` FOREIGN KEY (`id_bengkel`) REFERENCES `bengkel` (`id`),
  ADD CONSTRAINT `order` FOREIGN KEY (`id_order`) REFERENCES `order` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
