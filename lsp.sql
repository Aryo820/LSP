-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2025 at 07:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lsp`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=dec8 COLLATE=dec8_bin;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(46, 'Muhammad Siddiq', 'admin@gmail.com', 'Saya ingin berkomentar bossss', 'qqqqqqqqqqqqqqqq', '2025-10-15 12:11:32', '2025-10-15 12:11:32'),
(47, 'Nasi Goreng ', 'agra@gmail.com', 'Saya ingin berkomentar bossss', 'duarrr', '2025-10-15 12:14:19', '2025-10-15 12:14:19'),
(48, 'Nasi Goreng ', 'agra@gmail.com', 'Saya ingin berkomentar bossss', 'duarrr', '2025-10-15 12:14:49', '2025-10-15 12:14:49'),
(49, 'Muhammad Siddiq', 'sidiksadar11@gmail.com', 'keluh kesah', 'qqqqqqqqqqqq', '2025-10-15 12:17:35', '2025-10-15 12:17:35'),
(50, 'Muhammad Siddiq', 'sidiksadar11@gmail.com', 'keluh kesah', 'qqqqqqqqqqqq', '2025-10-15 12:18:04', '2025-10-15 12:18:04'),
(51, 'Muhammad Siddiq', 'sidiksadar11@gmail.com', 'keluh kesah', 'qqqqqqqqqqqq', '2025-10-15 12:18:23', '2025-10-15 12:18:23');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `level_name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `level_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Administrator', '2025-07-22 08:51:42', '2025-07-22 09:24:32', NULL),
(5, 'Operator', '2025-07-22 08:54:00', '2025-07-22 08:54:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `kebangsaan` varchar(50) DEFAULT 'Indonesia',
  `provinsi` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `no_telp_rumah` varchar(20) DEFAULT NULL,
  `no_telp_kantor` varchar(20) DEFAULT NULL,
  `no_hp` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `nama`, `no_ktp`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `kebangsaan`, `provinsi`, `kota`, `kode_pos`, `no_telp_rumah`, `no_telp_kantor`, `no_hp`, `created_at`, `updated_at`) VALUES
(20, 'Muhammad Siddiq', '3175050505050505', 'Laki-Laki', 'Jakarta', '2025-11-04', 'Rusun BLK Ps Rebo', 'Indonesia', 'ACEH', 'KABUPATEN ACEH JAYA', '13750', '-', '-', '08129467849', '2025-11-04 15:26:39', '2025-11-04 15:26:39'),
(21, 'Muhammad Siddiq', '3175050505050505', 'Laki-Laki', 'Jakarta', '2025-11-04', 'Rusun BLK Ps Rebo', 'Indonesia', 'DKI JAKARTA', 'KOTA JAKARTA TIMUR', '13750', '-', '-', '08129467849', '2025-11-04 15:29:02', '2025-11-04 15:29:02');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_level`, `username`, `email`, `address`, `password`, `profile_picture`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 1, 'Muhammad Siddiq', 'admin@gmail.com', '', '123', NULL, '2025-07-22 08:52:21', '2025-07-22 08:52:21', NULL),
(20, 5, 'Agra Saputra', 'operator@gmail.com', 'Rusun BLK Ps Rebo', '123', 'Gambar20.png', '2025-07-22 09:44:32', '2025-11-04 16:32:10', NULL),
(22, 1, 'sodok', 'sodok@gmail.com', '', '1234', NULL, '2025-08-08 08:29:59', '2025-08-08 08:29:59', NULL),
(23, 0, 'farhman budi', 'budi@gmail.com', '', '123', NULL, '2025-10-15 12:38:19', '2025-10-15 12:38:19', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `level_name` (`level_name`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `user_ibfk_1` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
