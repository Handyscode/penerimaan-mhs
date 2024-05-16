-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2024 at 01:29 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penerimaanmhs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `nama`, `password`) VALUES
(1, 'admin@gmail.com', 'admin', '$2y$10$sy4PKZFaEQpBddswJ26wX.Uucp/DQsgZCU1zYwAoA3T4elWfl/l8S');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar`
--

CREATE TABLE `pendaftar` (
  `pendaftar_id` int(11) NOT NULL,
  `nmlengkap` varchar(50) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `email` varchar(30) NOT NULL,
  `notelp` char(14) NOT NULL,
  `tglahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `transkrip_nilai` varchar(255) DEFAULT NULL,
  `surat_rekomendasi` varchar(255) DEFAULT NULL,
  `sertifikat_lomba` varchar(255) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `verified` char(1) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendaftar`
--

INSERT INTO `pendaftar` (`pendaftar_id`, `nmlengkap`, `jenis_kelamin`, `email`, `notelp`, `tglahir`, `alamat`, `foto`, `transkrip_nilai`, `surat_rekomendasi`, `sertifikat_lomba`, `status`, `verified`, `password`) VALUES
(1, 'Farhan Sabil Jihadi', 'L', 'farhansabil12@gmail.com', '089652606942', '2012-03-01', 'Jl. Ciherang Hegarsari RT/05 RW/08 Perumahan Ciherang Asri', 'foto-703081.png', 'nilai-815698.png', '', '', 'diterima', 'Y', '$2y$10$i6TKl.sM6AFOYtDVFby7V.O83LP7yObh3R.2k.a7IvCqKv0UO2tRm'),
(2, 'Enri Permana', 'L', 'enripermana@gmail.com', '086557284965', '2005-03-04', 'Serang raya', NULL, NULL, NULL, NULL, NULL, 'Y', '$2y$10$Pa2srT./Pt.yM7dvQRZn6OrjN/r3X8Wokfij70uE3bMc01Aup0pyW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`pendaftar_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `pendaftar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
