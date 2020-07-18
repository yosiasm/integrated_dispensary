-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 18, 2020 at 11:40 PM
-- Server version: 5.7.30-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotik_terintegrasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminOnApotik`
--

CREATE TABLE `adminOnApotik` (
  `id_adminOnApotik` int(11) NOT NULL,
  `id_apotik` int(11) NOT NULL,
  `id_admin_apotik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminOnApotik`
--

INSERT INTO `adminOnApotik` (`id_adminOnApotik`, `id_apotik`, `id_admin_apotik`) VALUES
(1, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `adminOnklinik`
--

CREATE TABLE `adminOnklinik` (
  `id_adminOnklinik` int(11) NOT NULL,
  `id_admin_klinik` int(11) NOT NULL,
  `id_klinik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminOnklinik`
--

INSERT INTO `adminOnklinik` (`id_adminOnklinik`, `id_admin_klinik`, `id_klinik`) VALUES
(1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `apotik`
--

CREATE TABLE `apotik` (
  `id_apotik` int(11) NOT NULL,
  `nama_apotik` varchar(150) NOT NULL,
  `alamat_apotik` varchar(250) NOT NULL,
  `kontak_apotik` varchar(100) NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apotik`
--

INSERT INTO `apotik` (`id_apotik`, `nama_apotik`, `alamat_apotik`, `kontak_apotik`, `longitude`, `latitude`) VALUES
(1, 'Sinar Lengkuas', 'Jl. Badak Yang Ada Nyanya', '+62 89678311394 (Rizky)', 112.6323037, -7.9879964),
(2, 'Cahaya  Kunyit', 'Jl Hydro Coco no.12', '+6284937282019  (kabur)', -8.0023618, 112.6280122),
(3, 'Pancaran Ketumbar', 'Jl. Pantene no. 11', '+62878374932', -8.0286957, 112.6364445);

-- --------------------------------------------------------

--
-- Table structure for table `credential`
--

CREATE TABLE `credential` (
  `id_credential` int(11) NOT NULL,
  `id_person_credential` int(11) NOT NULL,
  `id_role_credential` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `temp_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credential`
--

INSERT INTO `credential` (`id_credential`, `id_person_credential`, `id_role_credential`, `password`, `username`, `temp_id`) VALUES
(1, 1, 1, 'password', 'werkudara', NULL),
(2, 2, 2, 'password', 'indra', NULL),
(3, 3, 3, 'password', 'bima', NULL),
(4, 4, 4, 'password', 'sancaka', NULL),
(6, 5, 5, 'password', 'gundala', NULL),
(7, 13, 3, '', '', NULL),
(8, 14, 3, 'f', 'f', '5f104e4da8de3'),
(9, 15, 5, 'password', 'Naruto', '5f1232b85165e');

-- --------------------------------------------------------

--
-- Table structure for table `detail_resep`
--

CREATE TABLE `detail_resep` (
  `id_detail_resep` int(11) NOT NULL,
  `id_resep_` int(11) NOT NULL,
  `id_obat_` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_resep`
--

INSERT INTO `detail_resep` (`id_detail_resep`, `id_resep_`, `id_obat_`, `jumlah`, `keterangan`) VALUES
(1, 1, 1, 1, ''),
(2, 1, 3, 2, ''),
(3, 1, 4, 2, 'f'),
(4, 7, 5, 3, '33'),
(5, 7, 5, 3, '33'),
(6, 7, 5, 3, '33'),
(7, 7, 5, 3, '33'),
(8, 9, 3, 2, '2'),
(9, 10, 6, 23, 'ldslkf'),
(10, 10, 5, 88, 'skjdf'),
(11, 11, 2, 3, '3'),
(12, 11, 2, 3, '3'),
(13, 11, 3, 33, '33'),
(14, 11, 2, 3, '3');

-- --------------------------------------------------------

--
-- Table structure for table `dokterOnklinik`
--

CREATE TABLE `dokterOnklinik` (
  `id_dokterOnklinik` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_klinik` int(11) NOT NULL,
  `temp_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokterOnklinik`
--

INSERT INTO `dokterOnklinik` (`id_dokterOnklinik`, `id_dokter`, `id_klinik`, `temp_id`) VALUES
(1, 3, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `klinik`
--

CREATE TABLE `klinik` (
  `id_klinik` int(11) NOT NULL,
  `nama_klinik` varchar(150) NOT NULL,
  `alamat_klinik` varchar(250) NOT NULL,
  `kontak_klinik` varchar(100) NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klinik`
--

INSERT INTO `klinik` (`id_klinik`, `nama_klinik`, `alamat_klinik`, `kontak_klinik`, `longitude`, `latitude`) VALUES
(1, 'Sembuh Kutilang', 'Jl Papua Nugreentea no 122', '+62 88920948291', -8.0084804, 112.6186566),
(2, 'Sehat Parkit', 'Jl Sulairon Bajakumbuh no 19', '+62 85930199384 (Asep)', -7.9948656, 112.6239605);

-- --------------------------------------------------------

--
-- Table structure for table `kurirOnApotik`
--

CREATE TABLE `kurirOnApotik` (
  `id_kurirOnApotik` int(11) NOT NULL,
  `id_kurir` int(11) NOT NULL,
  `id_apotik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kurirOnApotik`
--

INSERT INTO `kurirOnApotik` (`id_kurirOnApotik`, `id_kurir`, `id_apotik`) VALUES
(1, 6, 1),
(3, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(200) NOT NULL,
  `stok` int(11) NOT NULL,
  `id_apotik_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `stok`, `id_apotik_obat`) VALUES
(1, 'Bodrexin', 22, 1),
(2, 'Bodrex', 9, 2),
(3, 'Promag', 2, 1),
(4, 'Milanta', 22, 2),
(5, 'Salepp', 88, 1),
(6, 'oskadonn', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan`
--

CREATE TABLE `pemeriksaan` (
  `id_pemeriksaan` int(11) NOT NULL,
  `detail_pemeriksaan` varchar(300) NOT NULL,
  `tanggal_pemeriksaan` datetime NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `tambahan` varchar(50) NOT NULL,
  `status_pemeriksaan` varchar(20) NOT NULL,
  `temp_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeriksaan`
--

INSERT INTO `pemeriksaan` (`id_pemeriksaan`, `detail_pemeriksaan`, `tanggal_pemeriksaan`, `id_pasien`, `id_dokter`, `tambahan`, `status_pemeriksaan`, `temp_id`) VALUES
(1, 'kena maag', '2020-07-14 00:00:00', 6, 3, '', '0', ''),
(2, 'kena maag akut', '2020-07-29 00:00:00', 6, 3, '', '0', ''),
(3, 'Detail Pemeriksaan', '2020-07-18 15:10:39', 6, 3, '', 'Sudah Diperiksa', ''),
(4, 'Detail Pemeriksaan', '2020-07-18 15:13:18', 6, 3, '', 'Sudah Diperiksa', '5f12af1e0e749'),
(5, 'Detail Pemeriksaan', '2020-07-18 17:53:08', 6, 3, '', 'Sudah Diperiksa', '5f12d4940f788'),
(6, 'Detail Pemeriksaand', '2020-07-18 17:53:57', 6, 3, '', 'Sudah Diperiksa', '5f12d4c584014'),
(7, 'Detail Pemeriksaann', '2020-07-18 17:54:45', 6, 3, '', 'Sudah Diperiksa', '5f12d4f5a435f'),
(8, 'Detail Pemeriksaann', '2020-07-18 17:56:59', 6, 3, '', 'Sudah Diperiksa', '5f12d57bb7700'),
(9, 'Detail Pemeriksaanm', '2020-07-18 17:58:19', 6, 3, '', 'Sudah Diperiksa', '5f12d5cbd167a'),
(10, 'Detail Pemeriksaanv', '2020-07-18 18:29:21', 6, 3, '', 'Sudah Diperiksa', '5f12dd11765ad'),
(11, 'Detail Pemeriksaan', '2020-07-18 19:05:22', 19, 3, '', 'Sudah Diperiksa', '5f12e582ed3bd'),
(12, 'Detail Pemeriksaan', '2020-07-18 19:10:24', 20, 3, '', 'Sudah Diperiksa', '5f12e6b01db38'),
(13, 'Detail Pemeriksaan', '2020-07-18 19:12:48', 21, 3, '', 'Sudah Diperiksa', '5f12e74037324'),
(14, 'Detail Pemeriksaan', '2020-07-18 19:14:40', 21, 3, '', 'Sudah Diperiksa', '5f12e74037324'),
(15, 'Detail Pemeriksaan', '2020-07-18 19:17:01', 23, 3, '', 'Sudah Diperiksa', '5f12e83da74d5'),
(16, '2Detail Pemeriksaan', '2020-07-18 19:18:05', 24, 3, '', 'Sudah Diperiksa', '5f12e87d2275b'),
(17, '2Detail Pemeriksaan', '2020-07-18 19:19:48', 25, 3, '', 'Sudah Diperiksa', '5f12e8e40ba90'),
(18, '2Detail Pemeriksaan', '2020-07-18 19:20:45', 26, 3, '', 'Sudah Diperiksa', '5f12e91dd59c9'),
(19, '2Detail Pemeriksaan', '2020-07-18 19:21:18', 27, 3, '', 'Sudah Diperiksa', '5f12e93e485e1'),
(20, 'Detail Pemeriksaan', '2020-07-18 21:59:40', 19, 3, '', 'Sudah Diperiksa', '5f130e5cb2bf5'),
(21, 'Detail Pemeriksaan', '2020-07-18 22:13:44', 6, 3, '', 'Sudah Diperiksa', '5f1311a87bf05');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id_person` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alergi_obat` varchar(200) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `berat_badan` float DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  `kontak_person` varchar(100) NOT NULL,
  `temp_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id_person`, `nama`, `alergi_obat`, `tanggal_lahir`, `berat_badan`, `alamat`, `longitude`, `latitude`, `kontak_person`, `temp_id`) VALUES
(1, 'Werkudara', 'betadine', '1997-09-17', 57, 'Jl Kita no 14', -8.0025288, 112.6377993, '+6287382944738', NULL),
(2, 'Indra', 'Hot Cream', '1997-07-14', 89, 'Jl Kamu no 11', -8.003793, 112.6247716, '+62938471982', NULL),
(3, 'Bimaa', 'Ekstrak Eucaliptuss', '1997-01-02', 45, 'Jl. Akoeh', -8.01309981, 112.63708831, '+62839829304819', NULL),
(4, 'Sancaka', 'Garam Himalaya', '1999-07-08', 25, 'Jl. Dia no 32', -8.0118249, 112.6188063, '+6293u023943', NULL),
(5, 'Gundala', 'Bye Bye Fever', '2000-01-22', 90, 'Jl. Mereka no 76', -8.0196442, 112.6250291, '+6202930923', NULL),
(6, 'George', 'Bodrexin', '1993-07-22', 78, 'Jl. Engkau no 66', 112.6364445, -8.0286957, '+62019238139', '5f1311a87bf05'),
(13, 'd', 'd', '2020-07-30', 21, '2', 2, 2, '2', NULL),
(14, 'fg', 'gf', '2020-07-13', 232, 'gf', 2, 3, 'ge', '5f104e4da8de3'),
(15, 'naruto', 'naruto', '2020-07-21', 13, 'naruto', 112.6602196, -7.9971209, 'naruto', '5f1232b85165e'),
(16, 'v', 'v', '2020-07-13', 3, 'v', 2, 2, 'v', NULL),
(17, 'ff', 'cnac', '2020-02-12', 1, 'ds', 23, 223, '23', '5f12e501cb40f'),
(18, 'ff', 'cnac', '2020-02-12', 1, 'ds', 23, 223, '23', '5f12e5229f087'),
(19, 'ff', 'cnac', '2020-02-12', 1, 'ds', 23, 223, '23', '5f130e5cb2bf5'),
(20, 'fas', 'sd', '2323-03-02', 323, 'lfkm', 232, 23, 'sdf', '5f12e6b01db38'),
(21, 'asdk', 'skjdf', '2233-12-03', 12, '232', 32, 32, '32', '5f12e74037324'),
(22, 'asdk', 'skjdf', '2233-12-03', 12, '232', 32, 32, '32', '5f12e74037324'),
(23, 'lsdf', 'sdjf', '2122-12-31', 1, '213', 123, 12, '12', '5f12e83da74d5'),
(24, 'lakd', 'ad', '2222-02-22', 22, '2', 2, 2, '2', '5f12e87d2275b'),
(25, 'alskd', 'alk', '2222-12-22', 22, '22', 2, 2, '2', '5f12e8e40ba90'),
(26, 'alskd', 'alk', '2222-12-22', 22, '22', 2, 2, '2', '5f12e91dd59c9'),
(27, 'alskd', 'alkd', '2222-02-22', 2, '2', 2, 2, '2', '5f12e93e485e1');

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `id_resep` int(11) NOT NULL,
  `tanggal_resep` datetime NOT NULL,
  `keterangan` varchar(250) DEFAULT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_klinik_terkait` int(11) NOT NULL,
  `id_status_resep` int(11) NOT NULL,
  `id_apotik_resep` int(11) DEFAULT NULL,
  `temp_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resep`
--

INSERT INTO `resep` (`id_resep`, `tanggal_resep`, `keterangan`, `id_pasien`, `id_dokter`, `id_klinik_terkait`, `id_status_resep`, `id_apotik_resep`, `temp_id`) VALUES
(1, '2020-07-15 00:00:00', 'ini keterangan resep', 6, 3, 1, 4, 1, '0'),
(2, '2020-07-08 00:00:00', NULL, 6, 3, 1, 1, 2, '0'),
(5, '2020-07-18 17:56:59', NULL, 6, 3, 1, 1, NULL, '5f12d57bb7700'),
(6, '2020-07-18 17:58:19', NULL, 6, 3, 1, 1, NULL, '5f12d5cbd167a'),
(7, '2020-07-18 18:29:21', NULL, 6, 3, 1, 1, NULL, '5f12dd11765ad'),
(8, '2020-07-18 19:20:45', NULL, 26, 3, 1, 1, NULL, '5f12e91dd59c9'),
(9, '2020-07-18 19:21:18', NULL, 27, 3, 1, 1, NULL, '5f12e93e485e1'),
(10, '2020-07-18 21:59:40', NULL, 19, 3, 1, 1, NULL, '5f130e5cb2bf5'),
(11, '2020-07-18 22:13:44', NULL, 6, 3, 1, 1, 2, '5f1311a87bf05');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `jenis_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `jenis_role`) VALUES
(1, 'Super Admin'),
(2, 'Admin Klinik'),
(3, 'Dokter'),
(4, 'Admin Apotik'),
(5, 'Kurir');

-- --------------------------------------------------------

--
-- Table structure for table `status_pengiriman`
--

CREATE TABLE `status_pengiriman` (
  `id_status` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_pengiriman`
--

INSERT INTO `status_pengiriman` (`id_status`, `keterangan`) VALUES
(1, 'Resep Baru'),
(2, 'Resep Diterima Apotik'),
(3, 'Menunggu Kurir'),
(4, 'Pengiriman Obat'),
(5, 'Obat Ada Yang Kosong'),
(6, 'Obat Telah Diterima');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminOnApotik`
--
ALTER TABLE `adminOnApotik`
  ADD PRIMARY KEY (`id_adminOnApotik`),
  ADD KEY `id_apotik` (`id_apotik`),
  ADD KEY `id_admin_apotik` (`id_admin_apotik`);

--
-- Indexes for table `adminOnklinik`
--
ALTER TABLE `adminOnklinik`
  ADD PRIMARY KEY (`id_adminOnklinik`),
  ADD KEY `id_admin_klinik` (`id_admin_klinik`),
  ADD KEY `id_klinik` (`id_klinik`);

--
-- Indexes for table `apotik`
--
ALTER TABLE `apotik`
  ADD PRIMARY KEY (`id_apotik`);

--
-- Indexes for table `credential`
--
ALTER TABLE `credential`
  ADD PRIMARY KEY (`id_credential`),
  ADD KEY `id_person_credential` (`id_person_credential`),
  ADD KEY `credential_ibfk_2` (`id_role_credential`);

--
-- Indexes for table `detail_resep`
--
ALTER TABLE `detail_resep`
  ADD PRIMARY KEY (`id_detail_resep`),
  ADD KEY `id_resep_` (`id_resep_`),
  ADD KEY `id_obat_` (`id_obat_`);

--
-- Indexes for table `dokterOnklinik`
--
ALTER TABLE `dokterOnklinik`
  ADD PRIMARY KEY (`id_dokterOnklinik`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_klinik` (`id_klinik`);

--
-- Indexes for table `klinik`
--
ALTER TABLE `klinik`
  ADD PRIMARY KEY (`id_klinik`);

--
-- Indexes for table `kurirOnApotik`
--
ALTER TABLE `kurirOnApotik`
  ADD PRIMARY KEY (`id_kurirOnApotik`),
  ADD KEY `id_apotik` (`id_apotik`),
  ADD KEY `kurirOnApotik_ibfk_1` (`id_kurir`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD KEY `id_apotek_obat` (`id_apotik_obat`);

--
-- Indexes for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD PRIMARY KEY (`id_pemeriksaan`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id_person`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id_resep`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_klinik_terkait` (`id_klinik_terkait`),
  ADD KEY `id_status_resep` (`id_status_resep`),
  ADD KEY `id_apotik_resep` (`id_apotik_resep`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `status_pengiriman`
--
ALTER TABLE `status_pengiriman`
  ADD PRIMARY KEY (`id_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminOnApotik`
--
ALTER TABLE `adminOnApotik`
  MODIFY `id_adminOnApotik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `adminOnklinik`
--
ALTER TABLE `adminOnklinik`
  MODIFY `id_adminOnklinik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `apotik`
--
ALTER TABLE `apotik`
  MODIFY `id_apotik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `credential`
--
ALTER TABLE `credential`
  MODIFY `id_credential` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `detail_resep`
--
ALTER TABLE `detail_resep`
  MODIFY `id_detail_resep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `dokterOnklinik`
--
ALTER TABLE `dokterOnklinik`
  MODIFY `id_dokterOnklinik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `klinik`
--
ALTER TABLE `klinik`
  MODIFY `id_klinik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kurirOnApotik`
--
ALTER TABLE `kurirOnApotik`
  MODIFY `id_kurirOnApotik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  MODIFY `id_pemeriksaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id_person` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `resep`
--
ALTER TABLE `resep`
  MODIFY `id_resep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `status_pengiriman`
--
ALTER TABLE `status_pengiriman`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `adminOnApotik`
--
ALTER TABLE `adminOnApotik`
  ADD CONSTRAINT `adminOnApotik_ibfk_1` FOREIGN KEY (`id_apotik`) REFERENCES `apotik` (`id_apotik`),
  ADD CONSTRAINT `adminOnApotik_ibfk_2` FOREIGN KEY (`id_admin_apotik`) REFERENCES `credential` (`id_credential`);

--
-- Constraints for table `adminOnklinik`
--
ALTER TABLE `adminOnklinik`
  ADD CONSTRAINT `adminOnklinik_ibfk_1` FOREIGN KEY (`id_admin_klinik`) REFERENCES `credential` (`id_credential`),
  ADD CONSTRAINT `adminOnklinik_ibfk_2` FOREIGN KEY (`id_klinik`) REFERENCES `klinik` (`id_klinik`);

--
-- Constraints for table `credential`
--
ALTER TABLE `credential`
  ADD CONSTRAINT `credential_ibfk_1` FOREIGN KEY (`id_person_credential`) REFERENCES `person` (`id_person`),
  ADD CONSTRAINT `credential_ibfk_2` FOREIGN KEY (`id_role_credential`) REFERENCES `role` (`id_role`);

--
-- Constraints for table `detail_resep`
--
ALTER TABLE `detail_resep`
  ADD CONSTRAINT `detail_resep_ibfk_1` FOREIGN KEY (`id_resep_`) REFERENCES `resep` (`id_resep`),
  ADD CONSTRAINT `detail_resep_ibfk_2` FOREIGN KEY (`id_obat_`) REFERENCES `obat` (`id_obat`);

--
-- Constraints for table `dokterOnklinik`
--
ALTER TABLE `dokterOnklinik`
  ADD CONSTRAINT `dokterOnklinik_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `credential` (`id_credential`),
  ADD CONSTRAINT `dokterOnklinik_ibfk_2` FOREIGN KEY (`id_klinik`) REFERENCES `klinik` (`id_klinik`);

--
-- Constraints for table `kurirOnApotik`
--
ALTER TABLE `kurirOnApotik`
  ADD CONSTRAINT `kurirOnApotik_ibfk_1` FOREIGN KEY (`id_kurir`) REFERENCES `person` (`id_person`),
  ADD CONSTRAINT `kurirOnApotik_ibfk_2` FOREIGN KEY (`id_apotik`) REFERENCES `apotik` (`id_apotik`);

--
-- Constraints for table `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`id_apotik_obat`) REFERENCES `apotik` (`id_apotik`);

--
-- Constraints for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD CONSTRAINT `pemeriksaan_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `person` (`id_person`),
  ADD CONSTRAINT `pemeriksaan_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `person` (`id_person`);

--
-- Constraints for table `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `resep_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `person` (`id_person`),
  ADD CONSTRAINT `resep_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `person` (`id_person`),
  ADD CONSTRAINT `resep_ibfk_3` FOREIGN KEY (`id_klinik_terkait`) REFERENCES `klinik` (`id_klinik`),
  ADD CONSTRAINT `resep_ibfk_4` FOREIGN KEY (`id_status_resep`) REFERENCES `status_pengiriman` (`id_status`),
  ADD CONSTRAINT `resep_ibfk_5` FOREIGN KEY (`id_apotik_resep`) REFERENCES `apotik` (`id_apotik`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
