-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2026 at 02:06 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `nilai_mhsw`
--

CREATE TABLE `nilai_mhsw` (
  `NIM` varchar(10) NOT NULL,
  `nama mahasiswa` varchar(30) NOT NULL,
  `nilai akhir` float NOT NULL,
  `nilai huruf` varchar(5) DEFAULT NULL,
  `predikat` varchar(20) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `Tanggal DIbuat` timestamp NULL DEFAULT NULL,
  `Tanggal Diubah` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai_mhsw`
--

INSERT INTO `nilai_mhsw` (`NIM`, `nama mahasiswa`, `nilai akhir`, `nilai huruf`, `predikat`, `foto`, `Tanggal DIbuat`, `Tanggal Diubah`) VALUES
('3202416001', 'muhammad aqil', 20, 'E', 'Tidak Lulus', 'uploads/foto_3202416001.jpeg', '0000-00-00 00:00:00', '2026-10-16 02:07:59'),
('3202416002', 'nandus', 80, 'B', 'Sangat Memuaskan', NULL, '0000-00-00 00:00:00', NULL),
('3202416004', 'alaw', 100, 'A', 'Sangat Memuaskan', NULL, '2026-10-16 01:55:09', NULL),
('3202416006', 'nandus', 97.76, 'A', 'Sangat Memuaskan', NULL, '2026-10-16 03:32:21', NULL),
('3202416031', 'angga', 77.82, 'B', 'Memuaskan', NULL, '2026-10-16 03:35:17', NULL),
('3202416090', 'habil', 80, 'B', 'Memuaskan', '', '2026-10-26 00:17:38', NULL),
('3202416091', 'rizqi ariq pratama', 90, 'A', 'Sangat Memuaskan', '', '2026-10-26 00:18:12', NULL),
('3202416092', 'ahmad ardian mulyadi', 85, 'A', 'Sangat Memuaskan', '', '2026-10-26 00:18:39', NULL),
('3202416101', 'naufal auliya lestari', 97, 'A', 'Sangat Memuaskan', '', '2026-10-26 00:19:12', NULL),
('3230484', 'gebi', 60, 'C', 'Cukup', NULL, '2026-10-16 03:36:07', NULL),
('3242985375', 'dadang', 50, 'D', 'Kurang', NULL, '2026-10-16 03:34:02', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nilai_mhsw`
--
ALTER TABLE `nilai_mhsw`
  ADD PRIMARY KEY (`NIM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
