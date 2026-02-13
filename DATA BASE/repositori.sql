-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2026 at 03:56 PM
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
-- Database: `repositori`
--

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `kode_jurnal` char(11) NOT NULL,
  `judul` varchar(150) DEFAULT NULL,
  `kata_kunci` varchar(50) DEFAULT NULL,
  `abstrak` text DEFAULT NULL,
  `kode_program_studi` char(20) DEFAULT NULL,
  `kode_topik` char(30) DEFAULT NULL,
  `periode` enum('I','II') DEFAULT NULL,
  `tahun` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`kode_jurnal`, `judul`, `kata_kunci`, `abstrak`, `kode_program_studi`, `kode_topik`, `periode`, `tahun`) VALUES
('JRTK001', 'SPK KEPUTUSAN DAN KERANGKA MANUSIA', 'kisah sang kancil', 'hidup iini penuh beermaknai', 'ti', '0012', '', 2020);

-- --------------------------------------------------------

--
-- Table structure for table `program_studi`
--

CREATE TABLE `program_studi` (
  `kode_program_studi` char(2) NOT NULL,
  `nama_program_studi` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program_studi`
--

INSERT INTO `program_studi` (`kode_program_studi`, `nama_program_studi`) VALUES
('TB', 'TEKNIK BAGUNAN'),
('ti', 'TEKNIK INFORMATIKA'),
('TK', 'TEKNIK KOMPUTER');

-- --------------------------------------------------------

--
-- Table structure for table `topik`
--

CREATE TABLE `topik` (
  `kode_topik` char(20) NOT NULL,
  `nama_topik` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topik`
--

INSERT INTO `topik` (`kode_topik`, `nama_topik`) VALUES
('0012', 'REKAYASA WEB');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`kode_jurnal`);

--
-- Indexes for table `program_studi`
--
ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`kode_program_studi`);

--
-- Indexes for table `topik`
--
ALTER TABLE `topik`
  ADD PRIMARY KEY (`kode_topik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
