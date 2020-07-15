-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 14, 2020 at 10:03 PM
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
-- Table structure for table `apotik`
--

CREATE TABLE `apotik` (
  `id_apotik` varchar(50) NOT NULL,
  `nama_apotik` varchar(150) NOT NULL,
  `alamat_apotik` varchar(250) NOT NULL,
  `kontak_apotik` varchar(100) NOT NULL,
  `longitude` float NOT NULL,
  `latitude` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `credential`
--

CREATE TABLE `credential` (
  `id_credential` int(11) NOT NULL,
  `id_person_credential` int(11) NOT NULL,
  `id_role_credential` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `klinik`
--

CREATE TABLE `klinik` (
  `id_klinik` varchar(50) NOT NULL,
  `nama_klinik` varchar(150) NOT NULL,
  `alamat_klinik` varchar(250) NOT NULL,
  `kontak_klinik` varchar(100) NOT NULL,
  `longitude` float NOT NULL,
  `latitude` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(200) NOT NULL,
  `stok` int(11) NOT NULL,
  `id_apotek_obat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `longitude` float NOT NULL,
  `latitude` float NOT NULL,
  `kontak_person` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `id_resep` varchar(100) NOT NULL,
  `tanggal_resep` datetime NOT NULL,
  `keterangan` varchar(250) DEFAULT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_klinik_terkait` varchar(50) NOT NULL,
  `id_status_resep` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` varchar(10) NOT NULL,
  `jenis_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status_pengiriman`
--

CREATE TABLE `status_pengiriman` (
  `id_status` varchar(10) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

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
  ADD KEY `id_role_credential` (`id_role_credential`);

--
-- Indexes for table `klinik`
--
ALTER TABLE `klinik`
  ADD PRIMARY KEY (`id_klinik`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD KEY `id_apotek_obat` (`id_apotek_obat`);

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
  ADD KEY `id_status_resep` (`id_status_resep`);

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
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id_person` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `credential`
--
ALTER TABLE `credential`
  ADD CONSTRAINT `credential_ibfk_1` FOREIGN KEY (`id_person_credential`) REFERENCES `person` (`id_person`),
  ADD CONSTRAINT `credential_ibfk_2` FOREIGN KEY (`id_role_credential`) REFERENCES `role` (`id_role`);

--
-- Constraints for table `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`id_apotek_obat`) REFERENCES `apotik` (`id_apotik`);

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
  ADD CONSTRAINT `resep_ibfk_4` FOREIGN KEY (`id_status_resep`) REFERENCES `status_pengiriman` (`id_status`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
