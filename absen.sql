-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 25, 2024 at 03:30 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absen`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `idabsen` int(11) NOT NULL,
  `id_guru` varchar(100) NOT NULL,
  `tgl_absen` date NOT NULL,
  `jam_datang` time NOT NULL,
  `jam_pulang` time NOT NULL,
  `ket` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`idabsen`, `id_guru`, `tgl_absen`, `jam_datang`, `jam_pulang`, `ket`) VALUES
(4, '2', '2023-11-01', '09:34:23', '20:25:40', 'Hadir'),
(5, '2', '2023-10-31', '06:42:45', '11:42:45', 'Hadir'),
(6, '2', '2024-01-30', '00:00:00', '15:43:39', ''),
(7, '2', '2024-04-30', '00:00:00', '11:41:31', '');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `departemen` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id`, `nama`, `departemen`, `tanggal`, `status`, `jam_masuk`, `jam_keluar`) VALUES
(796, 'Dio', 'Guru', '2024-05-01', 'Hadir', '08:00:00', '17:00:00'),
(797, 'Jakfar', 'TU', '2024-05-01', 'Hadir', '08:00:00', '17:00:00'),
(798, 'Eka', 'TU', '2024-05-01', 'Hadir', '08:00:00', '17:00:00'),
(799, 'Ghafur', 'Guru', '2024-05-01', 'Hadir', '08:00:00', '17:00:00'),
(800, 'Nadhif', 'TU', '2024-05-01', 'Hadir', '08:00:00', '17:00:00'),
(801, 'Rohma', 'TU', '2024-05-01', 'Hadir', '08:00:00', '17:00:00'),
(802, 'Anas', 'TU', '2024-05-01', 'Hadir', '08:00:00', '17:00:00'),
(803, 'Admin', 'TU', '2024-05-01', 'Hadir', '08:00:00', '17:00:00'),
(804, '', '', '2024-05-01', 'Tidak Hadir', '00:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_user` int(11) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `tmp_lahir` varchar(100) NOT NULL,
  `tgl_lahir` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jk` varchar(200) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `nuptk` varchar(225) NOT NULL,
  `tlp` varchar(20) NOT NULL,
  `status_guru` varchar(100) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_user`, `nik`, `username`, `password`, `nama_guru`, `tmp_lahir`, `tgl_lahir`, `alamat`, `jk`, `agama`, `nuptk`, `tlp`, `status_guru`, `role`) VALUES
(1, '', 'admin', '7bc6c31880aeda581aa34e218af25753', 'Administrator', '', '', '', '', '', '', '', '', 1),
(2, '3527031204870001', 'busadin', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Busadin', 'Sampang', '2023-11-01', 'Jl. Syamsul', 'L', 'Islam', '1234567890', '082135446417', 'Guru Mapel', 0),
(6, '3527030709860008', 'aminulloh', 'a86edc04ae4356c1d35daa19e688e1f0', 'Ahmad Hadi Amrulloh', '1986-09-07', 'sampang', 'jln samsul arifin', 'P', 'Islam', '9239764665130233', '0876654781235', 'Guru Mapel', 0),
(7, '3527032410870007', 'Baihaki', '8f3c224de4183e87c11959f74bfac3fd', 'Ahmad baihaki', '1986-10-24', 'sampang', 'jln manggis', 'L', 'Islam', '1356764667120003', '085259881335', 'Kepala Sekolah', 0),
(8, '3527032510940003', 'Lukman', 'a86edc04ae4356c1d35daa19e688e1f0', 'Lukmanol Hakim', '1994-10-25', 'sampang', 'sampang', 'L', 'Islam', '2357772673130063', '08756243', 'Guru Mapel', 0),
(9, '3527045408920008', 'Maimuna', 'a86edc04ae4356c1d35daa19e688e1f0', 'Siti Maimuna', '1992-08-14', 'sampang', 'sampang', 'P', 'Islam', '0146770671230193', '087607871', 'Guru Mapel', 0),
(10, '3527036408930002', 'Holiyatul Jannah', 'a86edc04ae4356c1d35daa19e688e1f0', 'ST. Holiyatul Jannah', '1993-08-24', 'sampang', 'sampang', 'P', 'Islam', '5156771672230093', '04787467', 'Guru Mapel', 0),
(11, '3527051111960002', 'Sukron Ali', 'a86edc04ae4356c1d35daa19e688e1f0', 'Sukron Ali', '1998-11-11', 'sampang', 'camplong', 'L', 'Islam', '0', '05487844', 'Guru Mapel', 0),
(12, '3527035807960002', 'Wardatun Nafisah', 'a86edc04ae4356c1d35daa19e688e1f0', 'Wardatun Nafisah', '1996-07-18', 'sampang', 'sampang', 'P', 'Islam', '0', '0547878', 'Guru Mapel', 0),
(13, '1623675735154675615', 'dapriansyah', '$2y$10$emf14.6ASaGmDj1sHXKnIeI.Jv8mei8.E/O4QMv2gpXWq2EOabhRm', 'Dio Apriansyah', '2024-06-06', 'Sampang', 'Sampang', 'L', 'Islam', '1652652', '0827736761387', 'Kepala Sekolah', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`idabsen`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `idabsen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=805;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
