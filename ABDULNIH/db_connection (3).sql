-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2025 at 09:54 PM
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
-- Database: `db_connection`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi_mhs`
--

CREATE TABLE `absensi_mhs` (
  `id` int(11) NOT NULL,
  `mhs_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `hari` varchar(10) DEFAULT NULL,
  `status` enum('Hadir','Alpha','Izin','Sakit') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `absensi_mhs`
--
DELIMITER $$
CREATE TRIGGER `set_hari_absensi` BEFORE INSERT ON `absensi_mhs` FOR EACH ROW BEGIN
    SET NEW.hari = DAYNAME(NEW.tanggal);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `mhs`
--

CREATE TABLE `mhs` (
  `id` int(11) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `prodi_id` int(11) NOT NULL,
  `fakultas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mhs`
--

INSERT INTO `mhs` (`id`, `nim`, `username`, `password`, `nama`, `prodi_id`, `fakultas_id`) VALUES
(1, '242302007', 'abdul', 'mahasiswa123', 'Abdul Muhamad Nasir', 1, 1),
(2, '242302015', 'fadhlan', 'mahasiswa123', 'fadhlan', 2, 1),
(3, '242302021', 'budi', 'mahasiswa123', 'Budi Santoso', 3, 2),
(4, '242302034', 'cici', 'mahasiswa123', 'Cici Kartika', 4, 2),
(5, '242302042', 'dini', 'mahasiswa123', 'Dini Rahmawati', 5, 3),
(6, '242302057', 'erwin', 'mahasiswa123', 'Erwin Pratama', 6, 3),
(7, '242302064', 'fajar', 'mahasiswa123', 'Fajar Nugraha', 7, 4),
(8, '242302078', 'gina', 'mahasiswa123', 'Gina Maharani', 8, 4),
(9, '242302091', 'sholihin', 'mahasiswa123', 'Abu Sholihin', 9, 5),
(10, '242302106', 'vina', 'mahasiswa123', 'Vina Rahmanda', 10, 5),
(11, '242302117', 'siti', 'mahasiswa123', 'Siti Nurjanah', 1, 1),
(12, '242302129', 'fatimah', 'mahasiswa123', 'Ummu Fatimah', 2, 1),
(13, '242302140', 'rezqina', 'mahasiswa123', 'Rezqina Andari', 3, 2),
(14, '242302152', 'naura', 'mahasiswa123', 'Naura Syifa', 4, 2),
(15, '242302167', 'titania', 'mahasiswa123', 'Titania Putri', 5, 3),
(16, '242302179', 'mirna', 'mahasiswa123', 'Mirna Anjani', 6, 3),
(17, '242302185', 'farhan', 'mahasiswa123', 'Farhan Rohman', 7, 4),
(18, '242302193', 'husnul', 'mahasiswa123', 'Husnul Hapidah', 8, 4),
(19, '242302204', 'rendi', 'mahasiswa123', 'Rendi Maryandi', 9, 5),
(20, '242302216', 'widayanti', 'mahasiswa123', 'Widayanti Rahayu', 10, 5),
(21, '242302227', 'sabila', 'mahasiswa123', 'Sabila Nadjah', 1, 1),
(22, '242302239', 'ujang', 'mahasiswa123', 'Ujang Hendrik', 2, 1),
(23, '242302244', 'lutfi', 'mahasiswa123', 'Muhammad Lutfi', 3, 2),
(24, '242302256', 'arie', 'mahasiswa123', 'Arie Nurhikmat', 4, 2),
(25, '242302269', 'icha', 'mahasiswa123', 'Icha Nabila', 5, 3),
(26, '242302273', 'akmal', 'mahasiswa123', 'Muhammad Akmal', 6, 3),
(27, '242302281', 'tria', 'mahasiswa123', 'Tria Alma Dewi', 7, 4),
(28, '242302295', 'ayu', 'mahasiswa123', 'Ayu Fatimah', 8, 4),
(29, '242302307', 'dea', 'mahasiswa123', 'Dea Pradestiawati', 9, 5),
(30, '242302318', 'suherman', 'mahasiswa123', 'Suherman Dermawan', 10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `mhs_id` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `mhs_id`, `nilai`) VALUES
(1, 1, 100),
(2, 1, 100);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `soal_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `matematika` int(11) DEFAULT 0,
  `fisika` int(11) DEFAULT 0,
  `kimia` int(11) DEFAULT 0,
  `biologi` int(11) DEFAULT 0,
  `sejarah` int(11) DEFAULT 0,
  `ekonomi` int(11) DEFAULT 0,
  `seni` int(11) DEFAULT 0,
  `olahraga` int(11) DEFAULT 0,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `soal_id`, `username`, `matematika`, `fisika`, `kimia`, `biologi`, `sejarah`, `ekonomi`, `seni`, `olahraga`, `submitted_at`) VALUES
(1, 0, 'fadhlan', 0, 0, 0, 0, 0, 0, 0, 0, '2025-06-01 19:28:53'),
(2, 0, 'abdul', 100, 0, 0, 0, 0, 0, 0, 0, '2025-06-01 19:39:28');

-- --------------------------------------------------------

--
-- Table structure for table `tb_fakultas`
--

CREATE TABLE `tb_fakultas` (
  `id` int(11) NOT NULL,
  `nama_fakultas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_fakultas`
--

INSERT INTO `tb_fakultas` (`id`, `nama_fakultas`) VALUES
(1, 'Fakultas Komputer'),
(2, 'Fakultas Ekonomi'),
(3, 'Fakultas Kesehatan'),
(4, 'Fakultas Hukum'),
(5, 'Fakultas Sosial'),
(6, 'Fakultas Sains');

-- --------------------------------------------------------

--
-- Table structure for table `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `id` int(11) NOT NULL,
  `nama_prodi` varchar(255) NOT NULL,
  `fakultas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_prodi`
--

INSERT INTO `tb_prodi` (`id`, `nama_prodi`, `fakultas_id`) VALUES
(1, 'Komputerisasi Akuntansi', 1),
(2, 'Sistem Informasi', 1),
(3, 'Manajemen', 2),
(4, 'Akuntansi', 2),
(5, 'Keperawatan', 3),
(6, 'Farmasi', 3),
(7, 'Ilmu Hukum', 4),
(8, 'Administrasi Publik', 5),
(9, 'Statistika', 6),
(10, 'Biologi', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','dosen','mahasiswa') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'dosen', 'dosen123', 'dosen'),
(2, 'mahasiswa', 'mahasiswa123', 'mahasiswa'),
(3, 'admin', 'admin123', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi_mhs`
--
ALTER TABLE `absensi_mhs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mhs_id` (`mhs_id`);

--
-- Indexes for table `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD KEY `prodi_id` (`prodi_id`),
  ADD KEY `fakultas_id` (`fakultas_id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mhs_id` (`mhs_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tb_fakultas`
--
ALTER TABLE `tb_fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fakultas_id` (`fakultas_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi_mhs`
--
ALTER TABLE `absensi_mhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mhs`
--
ALTER TABLE `mhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_fakultas`
--
ALTER TABLE `tb_fakultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi_mhs`
--
ALTER TABLE `absensi_mhs`
  ADD CONSTRAINT `absensi_mhs_ibfk_1` FOREIGN KEY (`mhs_id`) REFERENCES `mhs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mhs`
--
ALTER TABLE `mhs`
  ADD CONSTRAINT `mhs_ibfk_1` FOREIGN KEY (`prodi_id`) REFERENCES `tb_prodi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mhs_ibfk_2` FOREIGN KEY (`fakultas_id`) REFERENCES `tb_fakultas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`mhs_id`) REFERENCES `mhs` (`id`);

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`username`) REFERENCES `tb_mhs` (`username`);

--
-- Constraints for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD CONSTRAINT `tb_prodi_ibfk_1` FOREIGN KEY (`fakultas_id`) REFERENCES `tb_fakultas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
