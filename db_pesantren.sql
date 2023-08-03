-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2023 at 11:39 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pesantren`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_santri`
--

CREATE TABLE `tb_santri` (
  `id_santri` int(10) NOT NULL,
  `nama_santri` varchar(50) NOT NULL,
  `tahun_mondok` varchar(50) NOT NULL,
  `asrama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_santri`
--

INSERT INTO `tb_santri` (`id_santri`, `nama_santri`, `tahun_mondok`, `asrama`, `alamat`, `foto`, `jenis_kelamin`) VALUES
(1, 'wildan', '2018', 'A.26', 'singaraja', 'logo.jpg.jpg', 'laki-laki'),
(2, 'nasrul', '2018', 'A.26', 'jember', 'linkar.png', 'laki-laki');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_santri`
--
ALTER TABLE `tb_santri`
  ADD PRIMARY KEY (`id_santri`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
