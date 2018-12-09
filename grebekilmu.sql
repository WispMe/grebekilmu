-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 09, 2018 at 09:00 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grebekilmu`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(255) NOT NULL,
  `nama_buku` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun_terbit` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `nama_buku`, `penerbit`, `tahun_terbit`, `jenis`, `quantity`) VALUES
(1, 'Kumpulan Soal SBMPTN 500 Miliar', 'The Jukutz', '2077', 'SBMPTN', 3),
(2, 'THE KING SBMPTN SAINTEK', 'Forum Tentor Indonesia', '2018', 'SBMPTN', 2),
(5, 'Panduan SBMPTN Soal dan Pembahasan 2019', 'THE KING EDUKA', '2018', 'Soshum', 22),
(6, 'MEGA BANK SBMPTN SOSHUM 2019', 'Pustaka Setia', '2018', 'Soshum', 10),
(10, 'Lolos SBMPTN IPS', 'Panji Su', '2018', 'SBMPTN', 4);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `ID` int(20) NOT NULL,
  `level` int(255) DEFAULT NULL,
  `namabelakang` varchar(255) DEFAULT NULL,
  `namadepan` varchar(255) DEFAULT NULL,
  `peminatan` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(20) NOT NULL,
  `nohp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`ID`, `level`, `namabelakang`, `namadepan`, `peminatan`, `password`, `email`, `nohp`) VALUES
(22, 1, NULL, NULL, '', '$2y$10$prmzIYYo7Aw6m66eidFaYOw0tazA9eEKivbDz/Kwznvqlh7FLRyXi', 'admin', ''),
(33, 0, 'Yusrin', 'Hakim', 'Saintek', '$2y$10$BVm4KMG8967yPlbOHmgvd./eQn/7hGDGVMwTpSFV0ZCqeEZ4w5qZe', 'yusrin@gmail.com', '0987665423'),
(34, 0, 'Panji', 'Wiratama', 'Saintek', '$2y$10$81FXdj/p2AdI4mlGUuOm8uKdjoTMedNoCGWglc.Roq2GZiS8HnPcG', 'panji@gmail.com', '0815362942');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `order_nama` varchar(255) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `order_nama`, `id_buku`, `tanggal`, `status`) VALUES
(35, 'Faiz Khatami', 2, '2018-12-04', 0),
(36, 'Faiz Khatami', 5, '2018-12-04', 1),
(37, 'Faiz Khatami', 6, '2018-12-04', 0),
(38, 'Faiz Khatami', 6, '2018-12-04', 0),
(39, 'Faiz Khatami', 6, '2018-12-04', 0),
(40, 'Faiz Khatami', 2, '2018-12-04', 0),
(41, 'Faiz Khatami', 6, '2018-12-04', 1),
(43, 'Faiz Khatami', 5, '2018-12-04', 0),
(44, 'Faiz Khatami', 6, '2018-12-04', 1),
(45, 'Faiz Khatami', 2, '2018-12-04', 0),
(46, 'Hanizar Rachman', 1, '2018-12-04', 1),
(47, 'Hanizar Rachman', 2, '2018-12-04', 0),
(48, 'Yusrin Hakim', 2, '2018-12-04', 0),
(49, 'Yusrin Hakim', 6, '2018-12-04', 1),
(50, 'Faiz Adil Khatami', 2, '2018-12-05', 0),
(51, 'Faiz Adil Khatami', 5, '2018-12-05', 0),
(52, 'Faiz Adil Khatami', 10, '2018-12-05', 0),
(53, 'Panji Wiratama', 6, '2018-12-05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id_file` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id_file`, `nama`, `keterangan`) VALUES
(8, 'Membuat_Toko_Buku_Sederhana_dengan_PHP_-.pdf', 'Pelajaran tentang PHP'),
(9, '111030257_bab3.pdf', 'Latihan Soal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `INDEX` (`email`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id_file`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
