-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2020 at 02:42 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uas`
--
CREATE DATABASE IF NOT EXISTS `db_uas` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_uas`;

-- --------------------------------------------------------

--
-- Table structure for table `detail_jadwal`
--

CREATE TABLE `detail_jadwal` (
  `id_pelajaran` char(11) DEFAULT NULL,
  `ruangan` varchar(50) DEFAULT NULL,
  `mulai` varchar(10) DEFAULT NULL,
  `selesai` varchar(10) DEFAULT NULL,
  `id_jadwal` char(11) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` char(11) NOT NULL,
  `hari` varchar(10) DEFAULT NULL,
  `urutan` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `hari`, `urutan`) VALUES
('Fri', 'jumat', '5'),
('Mon', 'senin', '1'),
('Sat', 'sabtu', '6'),
('Sun', 'minggu', '7'),
('Thu', 'kamis', '4'),
('Tue', 'selasa', '2'),
('Wed', 'rabu', '3');

-- --------------------------------------------------------

--
-- Table structure for table `pelajaran`
--

CREATE TABLE `pelajaran` (
  `id_pelajaran` char(11) NOT NULL,
  `nama_pelajaran` varchar(100) DEFAULT NULL,
  `pengajar` varchar(100) DEFAULT NULL,
  `kontak_pengajar` varchar(50) DEFAULT NULL,
  `semester` varchar(3) DEFAULT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `pelajaran`
--
DELIMITER $$
CREATE TRIGGER `hapus_pelajaran` BEFORE DELETE ON `pelajaran` FOR EACH ROW begin
delete from detail_jadwal where detail_jadwal.id_pelajaran = old.id_pelajaran and old.username = detail_jadwal.username;
delete from tugas where tugas.id_pelajaran = old.id_pelajaran and old.username = tugas.username;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `username` varchar(30) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `telegram` varchar(50) DEFAULT NULL,
  `notiftele` varchar(5) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `notifemail` varchar(5) DEFAULT NULL,
  `foto` varchar(100) DEFAULT 'avatar.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id_pelajaran` char(11) DEFAULT NULL,
  `nama_tugas` varchar(100) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `waktu` varchar(10) DEFAULT NULL,
  `status` varchar(15) DEFAULT 'belum selesai',
  `username` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_jadwal`
--
ALTER TABLE `detail_jadwal`
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `detail_jadwal_ibfk_4` (`username`),
  ADD KEY `detail_jadwal_ibfk_3` (`id_pelajaran`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`id_pelajaran`,`username`),
  ADD KEY `pelajaran_ibfk_1` (`username`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD KEY `tugas_ibfk_2` (`username`),
  ADD KEY `tugas_ibfk_1` (`id_pelajaran`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_jadwal`
--
ALTER TABLE `detail_jadwal`
  ADD CONSTRAINT `detail_jadwal_ibfk_3` FOREIGN KEY (`id_pelajaran`) REFERENCES `pelajaran` (`id_pelajaran`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_jadwal_ibfk_4` FOREIGN KEY (`username`) REFERENCES `pengguna` (`username`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_jadwal_ibfk_5` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`);

--
-- Constraints for table `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD CONSTRAINT `pelajaran_ibfk_1` FOREIGN KEY (`username`) REFERENCES `pengguna` (`username`) ON DELETE CASCADE;

--
-- Constraints for table `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `tugas_ibfk_1` FOREIGN KEY (`id_pelajaran`) REFERENCES `pelajaran` (`id_pelajaran`) ON DELETE CASCADE,
  ADD CONSTRAINT `tugas_ibfk_2` FOREIGN KEY (`username`) REFERENCES `pengguna` (`username`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
