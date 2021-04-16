-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2021 at 05:55 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `antrian`
--

-- --------------------------------------------------------

--
-- Table structure for table `loket`
--

CREATE TABLE `loket` (
  `id` int(11) NOT NULL,
  `nama_loket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loket`
--

INSERT INTO `loket` (`id`, `nama_loket`) VALUES
(5, 'Pembayaran SPP'),
(6, 'PMB');

-- --------------------------------------------------------

--
-- Table structure for table `loket_antrian`
--

CREATE TABLE `loket_antrian` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `nomor` int(11) NOT NULL,
  `waktu` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `nama_loket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loket_antrian`
--

INSERT INTO `loket_antrian` (`id`, `id_user`, `tanggal`, `nomor`, `waktu`, `status`, `nama_loket`) VALUES
(5, 3, '03-03-2021', 1, '20:43:33', 'belum', ''),
(6, 4, '03-03-2021', 2, '20:43:57', 'belum', ''),
(7, 3, '04-03-2021', 1, '20:09:02', 'belum', ''),
(8, 4, '04-03-2021', 2, '20:11:23', 'belum', ''),
(9, 3, '08-03-2021', 1, '19:50:55', 'belum', ''),
(10, 4, '08-03-2021', 2, '19:54:33', 'belum', ''),
(11, 3, '17-03-2021', 1, '19:01:37', 'sudah', ''),
(12, 5, '17-03-2021', 2, '19:05:17', 'sudah', ''),
(13, 4, '17-03-2021', 3, '19:05:37', 'sudah', ''),
(19, 3, '21-03-2021', 1, '20:54:39', 'belum', 'Pembayaran SPP'),
(20, 3, '24-03-2021', 1, '19:56:45', 'belum', 'Pembayaran SPP'),
(21, 3, '24-03-2021', 2, '19:57:38', 'belum', 'Keuangan'),
(29, 4, '27-03-2021', 1, '19:48:32', 'sudah', 'Pembayaran SPP'),
(30, 4, '27-03-2021', 1, '19:49:20', 'belum', 'Keuangan'),
(31, 3, '27-03-2021', 2, '19:49:42', 'belum', 'Pembayaran SPP'),
(32, 5, '27-03-2021', 3, '19:49:57', 'belum', 'Pembayaran SPP'),
(33, 5, '27-03-2021', 2, '20:22:10', 'belum', 'Keuangan'),
(34, 3, '28-03-2021', 1, '16:56:12', 'sudah', 'Pembayaran SPP'),
(35, 4, '28-03-2021', 2, '16:56:26', 'sudah', 'Pembayaran SPP'),
(36, 4, '28-03-2021', 1, '16:56:29', 'sudah', 'Keuangan'),
(37, 5, '28-03-2021', 3, '16:56:37', 'sudah', 'Pembayaran SPP'),
(38, 5, '28-03-2021', 2, '16:59:20', 'sudah', 'Keuangan'),
(40, 3, '28-03-2021', 3, '17:12:59', 'sudah', 'Keuangan'),
(41, 3, '02-04-2021', 1, '08:44:09', 'sudah', 'Pembayaran SPP'),
(42, 3, '02-04-2021', 1, '08:44:13', 'belum', 'Keuangan'),
(43, 4, '02-04-2021', 2, '08:44:26', 'belum', 'Pembayaran SPP'),
(44, 3, '06-04-2021', 1, '05:16:22', 'belum', 'Pembayaran SPP'),
(52, 5, '06-04-2021', 1, '05:34:06', 'belum', 'PMB'),
(54, 5, '06-04-2021', 2, '05:46:22', 'belum', 'Pembayaran SPP'),
(55, 3, '07-04-2021', 1, '10:28:27', 'belum', 'Pembayaran SPP'),
(56, 4, '07-04-2021', 1, '10:29:11', 'belum', 'PMB'),
(57, 4, '07-04-2021', 2, '10:29:13', 'belum', 'Pembayaran SPP'),
(58, 3, '13-04-2021', 1, '15:03:59', 'belum', 'Pembayaran SPP'),
(59, 3, '14-04-2021', 1, '16:46:37', 'belum', 'Pembayaran SPP'),
(60, 3, '15-04-2021', 1, '15:40:22', 'belum', 'Pembayaran SPP'),
(61, 3, '16-04-2021', 1, '08:57:31', 'sudah', 'Pembayaran SPP'),
(62, 4, '16-04-2021', 1, '08:57:46', 'belum', 'PMB'),
(63, 4, '16-04-2021', 2, '08:57:47', 'belum', 'Pembayaran SPP');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `noktp` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `noktp`, `jenis_kelamin`, `alamat`, `no_telp`, `level`) VALUES
(2, 'Admin', '$2y$10$vP57HpxuGx2nMBnHWy/koe.eO4aNdunf9x5F3x2/m2gtHZoBXUQyO', '3374062110000006', 'Pria', 'Jl. Sidoasih XI Tlogosari Semarang', '085641532396', 'admin'),
(3, 'Nina', '$2y$10$gxIs2KNV1zpHAvW3N9c.Uu7J46iMgzGRnOMK38MLvXztiAWM7pJTG', '3374062110000006', 'Wanita', 'Karanganyar Salatiga', '085641532396', 'user'),
(4, 'Baron', '$2y$10$Pf/mJ8XowQF/nQt8ztztS.H43OZoPWz8m/zEgh9TZNvwBto5KnzpK', '3374062110000007', 'Pria', 'Jl. Tlogomulyo Semarang', '088857322115', 'user'),
(5, 'tukijan', '$2y$10$F6ARgGlURH4of65uXUusn.rwL4GTWHUlD7NzenjaHyoGtQ384Qd0C', '3374062394121417', 'Pria', 'Parang Pekalongan', '087222687202', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loket`
--
ALTER TABLE `loket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loket_antrian`
--
ALTER TABLE `loket_antrian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loket`
--
ALTER TABLE `loket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `loket_antrian`
--
ALTER TABLE `loket_antrian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
