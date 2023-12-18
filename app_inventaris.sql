-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 18, 2023 at 02:37 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int NOT NULL,
  `id_user` int NOT NULL,
  `jenis` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(99) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kondisi` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_barang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `barimage` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_regis` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_user`, `jenis`, `image`, `kondisi`, `nama_barang`, `barimage`, `tgl_regis`) VALUES
(207778943, 2, 'Properti', '76e27bfb15f908ee4636183fcf9513c9.jpeg', 'Baik', 'DVR Dauha', '1697847675.png', '2023-10-21 00:21:16'),
(432531042, 2, 'Perkakas', '7b93547324d430289ae4fbb8f3cf4d61.jpg', 'Baik', 'Kunci Ring', '1697854655.png', '2023-10-21 02:17:35'),
(596461775, 2, 'Properti', 'c4da4c363da65559789bf8517ca0e57b.jpeg', 'Baik', 'Mikrotik', '1697771841.png', '2023-10-20 03:17:21'),
(789222808, 2, 'Properti', '712a5cbd9fdd2fce8afa6c3293ae372b.jpg', 'Baik', 'CCTV Analog', '1697783551.png', '2023-10-20 06:32:31'),
(838939841, 2, 'Properti', '25a5a5d7424c92bfa910178afedbe2ed.jpg', 'Baik', 'Konektor BNC', '1697850811.png', '2023-10-21 01:13:31'),
(871018998, 2, 'Properti', 'c8c2c8d722713c35eae250bb76bb9185.jpg', 'Baik', 'Monitor', '1697853460.png', '2023-10-21 01:57:40'),
(874722487, 2, 'Properti', '168423427cb7304b31b51a0d2154ffb1.jpeg', 'Baik', 'Tenda F3', '1697774924.png', '2023-10-20 04:08:45'),
(959639710, 2, 'Properti', '285bdfd7c6b407fb0fc50ec98c9ffd98.jpg', 'Baik', 'Kabel RG9', '1697771588.png', '2023-10-20 03:13:08'),
(990436833, 1, 'Properti', 'e16ee38a46f6e9be0f1835005d731af2.jpeg', 'Baik', 'Tenda 01', '1697860669.png', '2023-10-21 03:57:49');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pinjam`
--

CREATE TABLE `detail_pinjam` (
  `id_detail` int NOT NULL,
  `id_barang` int NOT NULL,
  `id_peminjaman` int NOT NULL,
  `tgl_kembali` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_pinjam`
--

INSERT INTO `detail_pinjam` (`id_detail`, `id_barang`, `id_peminjaman`, `tgl_kembali`) VALUES
(1, 596461775, 1, '2023-10-20'),
(2, 959639710, 1, '2023-10-20'),
(3, 874722487, 2, '2023-10-20'),
(4, 48300589, 3, '2023-10-21'),
(5, 874722487, 3, '2023-10-21'),
(6, 959639710, 3, '2023-10-21'),
(7, 207778943, 4, '2023-10-21'),
(8, 596461775, 4, '2023-10-21'),
(9, 959639710, 4, '2023-10-21'),
(10, 874722487, 5, '2023-10-21'),
(11, 207778943, 6, '2023-10-21'),
(12, 432531042, 6, '2023-10-21'),
(13, 596461775, 7, NULL),
(14, 959639710, 7, '2023-10-21'),
(15, 959639710, 8, NULL),
(16, 432531042, 9, NULL),
(17, 207778943, 9, '2023-11-16');

-- --------------------------------------------------------

--
-- Table structure for table `input`
--

CREATE TABLE `input` (
  `id` int NOT NULL,
  `nama` varchar(10) NOT NULL,
  `id_barang` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int NOT NULL,
  `peminjam` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `id_user` int NOT NULL,
  `tgl_pinjam` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `peminjam`, `id_user`, `tgl_pinjam`) VALUES
(1, 'audy', 2, '2023-10-20'),
(2, 'nikita', 2, '2023-10-20'),
(3, 'audy', 2, '2023-10-20'),
(4, 'audy', 2, '2023-10-21'),
(5, 'zidan', 2, '2023-10-21'),
(6, 'audy', 2, '2023-10-21'),
(7, 'nikita', 2, '2023-10-21'),
(8, 'audy', 2, '2023-10-21'),
(9, 'audy', 2, '2023-11-16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_level` enum('1','2') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`, `id_level`) VALUES
(1, 'audy - admin', 'admin', 'allaudya', '1'),
(2, 'audy - operator', 'operator', 'allaudya', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `input`
--
ALTER TABLE `input`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  MODIFY `id_detail` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `input`
--
ALTER TABLE `input`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
