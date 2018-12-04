-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 04, 2018 at 02:45 PM
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
(6, 'MEGA BANK SBMPTN SOSHUM 2019', 'Pustaka Setia', '2018', 'Soshum', 10);

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
(27, 0, 'Faiz', 'Khatami', 'Saintek', '$2y$10$a0KXUugIbavhV7IXo79m7uLCtFOZ1g7nCgcudLVzJjCwl6KI5nv4O', 'faizfak@gmail.com', '08992233101'),
(32, 0, 'Hanizar', 'Rachman', 'Saintek', '$2y$10$9MDfDrizArY9ncY1b93RZO5ace.4QFvlQVEZ8tX/tl1TQsDE73WwO', 'hanizar@gmail.com', '0813378234');

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
(41, 'Faiz Khatami', 6, '2018-12-04', 0),
(43, 'Faiz Khatami', 5, '2018-12-04', 0),
(44, 'Faiz Khatami', 6, '2018-12-04', 1),
(45, 'Faiz Khatami', 2, '2018-12-04', 0),
(46, 'Hanizar Rachman', 1, '2018-12-04', 0),
(47, 'Hanizar Rachman', 2, '2018-12-04', 0);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
