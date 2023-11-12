-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2023 at 07:09 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_racing`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` int(6) NOT NULL,
  `nama_event` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `gambar` varchar(30) NOT NULL,
  `status` enum('menunggu','berlangsung','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `nama_event`, `tanggal`, `gambar`, `status`) VALUES
(1, 'Paris Dakar FR', '2023-08-15', '', 'menunggu'),
(2, 'Off Road 4X4', '2023-08-16', '', 'menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `finish`
--

CREATE TABLE `finish` (
  `id_event` int(6) NOT NULL,
  `nama_trek` varchar(8) NOT NULL,
  `lap` int(6) NOT NULL DEFAULT 0,
  `id_card` varchar(15) NOT NULL,
  `no_lambung` int(6) NOT NULL,
  `start_time` varchar(6) NOT NULL,
  `cek_point` varchar(6) NOT NULL,
  `pinalty_scs` int(4) NOT NULL DEFAULT 0,
  `finish` varchar(15) NOT NULL,
  `fastest` varchar(15) NOT NULL,
  `pinalty_ptc` int(4) NOT NULL DEFAULT 0,
  `point` int(6) NOT NULL,
  `jam` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kelas_id` int(1) NOT NULL,
  `kelas_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kelas_id`, `kelas_name`) VALUES
(1, 'FFA'),
(2, 'UPPER'),
(3, 'LOWER');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `prov_id` int(2) NOT NULL,
  `prov_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`prov_id`, `prov_name`) VALUES
(1, 'ACEH'),
(2, 'SUMATERA UTARA'),
(3, 'SUMATERA BARAT'),
(4, 'RIAU'),
(5, 'JAMBI'),
(6, 'SUMATERA SELATAN'),
(7, 'BENGKULU'),
(8, 'LAMPUNG'),
(9, 'KEPULAUAN BANGKA BELITUNG'),
(10, 'KEPULAUAN RIAU'),
(11, 'DKI JAKARTA'),
(12, 'JAWA BARAT'),
(13, 'JAWA TENGAH'),
(14, 'DI YOGYAKARTA'),
(15, 'JAWA TIMUR'),
(16, 'BANTEN'),
(17, 'BALI'),
(18, 'NUSA TENGGARA BARAT'),
(19, 'NUSA TENGGARA TIMUR'),
(20, 'KALIMANTAN BARAT'),
(21, 'KALIMANTAN TENGAH'),
(22, 'KALIMANTAN SELATAN'),
(23, 'KALIMANTAN TIMUR'),
(24, 'KALIMANTAN UTARA'),
(25, 'SULAWESI UTARA'),
(26, 'SULAWESI TENGAH'),
(27, 'SULAWESI SELATAN'),
(28, 'SULAWESI TENGGARA'),
(29, 'GORONTALO'),
(30, 'SULAWESI BARAT'),
(31, 'MALUKU'),
(32, 'MALUKU UTARA'),
(33, 'PAPUA'),
(34, 'PAPUA BARAT');

-- --------------------------------------------------------

--
-- Table structure for table `start`
--

CREATE TABLE `start` (
  `id_event` int(6) NOT NULL,
  `nama_trek` varchar(8) NOT NULL,
  `lap` int(6) NOT NULL DEFAULT 0,
  `id_card` varchar(15) NOT NULL,
  `no_lambung` int(6) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `start_time` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `timing`
--

CREATE TABLE `timing` (
  `id_event` int(6) NOT NULL,
  `nama_trek` varchar(15) NOT NULL,
  `no_lambung` int(6) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `finish` varchar(15) NOT NULL,
  `total_point` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_tabel`
--

CREATE TABLE `tmp_tabel` (
  `id_event` int(6) NOT NULL,
  `id_card` varchar(15) NOT NULL,
  `nama_trek` varchar(15) NOT NULL,
  `lap` int(6) NOT NULL DEFAULT 0,
  `no_lambung` int(6) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `start_time` varchar(15) NOT NULL,
  `cek_point` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_event` int(6) NOT NULL,
  `id_card` varchar(20) NOT NULL DEFAULT current_timestamp(),
  `no_lambung` int(6) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `jenis_mobil` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('user','admin') NOT NULL,
  `status` enum('kadaluarsa','proses','aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_event`, `id_card`, `no_lambung`, `nama`, `alamat`, `no_hp`, `jenis_mobil`, `password`, `level`, `status`) VALUES
(0, '', 0, 'Lamban', 'Bantul', '0854622', '', 'lamban', 'admin', 'aktif'),
(2, '2023-08-18 23:56:48', 554, 'Rudy', 'Boyolali', '085454', 'Avansa', 'rudy', 'user', 'proses'),
(1, '2023-08-18 23:57:30', 669, 'Ngatno', 'Wonogiri', '087454', 'Carry', 'sambel', 'user', 'proses');

-- --------------------------------------------------------

--
-- Table structure for table `validasi`
--

CREATE TABLE `validasi` (
  `no_lambung` int(11) NOT NULL,
  `id_event` int(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_card` varchar(20) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `no_start` varchar(4) NOT NULL,
  `navigator` varchar(50) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `domisili` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `validasi`
--

INSERT INTO `validasi` (`no_lambung`, `id_event`, `nama`, `id_card`, `tanggal`, `no_start`, `navigator`, `kelas`, `domisili`) VALUES
(554, 2, 'Rudy', '', '2023-08-18 16:56:48', '', 'Sony', 'FFA', 'JAWA TENGAH'),
(646, 1, 'Rudy', '', '2023-08-18 16:51:25', '', 'Sony', 'FFA', 'JAWA TENGAH'),
(669, 1, 'Ngatno', '', '2023-08-18 16:57:30', '', 'Yogi', 'UPPER', 'JAWA TIMUR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `finish`
--
ALTER TABLE `finish`
  ADD KEY `id_card` (`id_card`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kelas_id`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`prov_id`);

--
-- Indexes for table `start`
--
ALTER TABLE `start`
  ADD KEY `id_card` (`id_card`);

--
-- Indexes for table `timing`
--
ALTER TABLE `timing`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_card`),
  ADD KEY `no_lambung` (`no_lambung`);

--
-- Indexes for table `validasi`
--
ALTER TABLE `validasi`
  ADD UNIQUE KEY `no_lambung` (`no_lambung`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `kelas_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `prov_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `finish`
--
ALTER TABLE `finish`
  ADD CONSTRAINT `finish_ibfk_1` FOREIGN KEY (`id_card`) REFERENCES `user` (`id_card`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `start`
--
ALTER TABLE `start`
  ADD CONSTRAINT `start_ibfk_1` FOREIGN KEY (`id_card`) REFERENCES `user` (`id_card`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `timing`
--
ALTER TABLE `timing`
  ADD CONSTRAINT `timing_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
