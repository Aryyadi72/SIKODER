-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2023 at 08:30 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daftarbeasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `nama_pengguna` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `kata_sandi` varchar(256) NOT NULL,
  `foto_profil` varchar(256) NOT NULL,
  `telpon` varchar(15) NOT NULL,
  `level` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `nama_pengguna`, `email`, `kata_sandi`, `foto_profil`, `telpon`, `level`) VALUES
(1, 'Administrator', 'admin@gmail.com', '$2y$10$A9cPJr57tiEbxtoTGTiBw.IkmT2UlqSa9nBdkZoAfc2keWXr9Aha2', 'c4b205ddfc8fcf4c1e838a6b725c6f53.jpg', '082312569856', 'Administrator'),
(10, 'Staff', 'staff@gmail.com', '$2y$10$o3RL/naW6lJi9w16R39PcuuCiqezWiSIlbYuVvsVHJD3VlR4JMrAi', 'default-foto.png', '082353156432', 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `beasiswa`
--

CREATE TABLE `beasiswa` (
  `id_beasiswa` int(11) NOT NULL,
  `nama_beasiswa` varchar(128) NOT NULL,
  `deskripsi_beasiswa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `beasiswa`
--

INSERT INTO `beasiswa` (`id_beasiswa`, `nama_beasiswa`, `deskripsi_beasiswa`) VALUES
(1, 'Kartu Indonesia Pintar', 'Tidak ada deskripsi'),
(3, 'Bidikmisi', 'Tidak ada deskrispi');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `nik` varchar(24) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `telepon` varchar(16) NOT NULL,
  `semester` int(11) NOT NULL,
  `ipk` float NOT NULL,
  `id_beasiswa` int(11) NOT NULL,
  `berkas` varchar(256) NOT NULL,
  `status` int(11) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `input` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `nik`, `nama`, `email`, `telepon`, `semester`, `ipk`, `id_beasiswa`, `berkas`, `status`, `tgl_daftar`, `input`) VALUES
(3, '6371031605000012', 'Nurmayanti', 'nurma@gmail.com', '082353142941', 6, 3.4, 1, 'soal IA 02.pdf', 1, '2023-03-10', '2023-03-10 07:13:55'),
(4, '6371031605000012', 'Nurmayanti', 'nurma@gmail.com', '08080808080', 6, 0, 1, 'soal IA 02.pdf', 1, '2023-03-10', '2023-03-10 07:14:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD PRIMARY KEY (`id_beasiswa`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `beasiswa`
--
ALTER TABLE `beasiswa`
  MODIFY `id_beasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
