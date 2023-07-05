-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 05, 2023 at 02:50 PM
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
-- Database: `ptsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int NOT NULL,
  `nama_pengguna` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `kata_sandi` varchar(256) NOT NULL,
  `foto_profil` varchar(256) NOT NULL,
  `telepon` varchar(16) NOT NULL,
  `level` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `nama_pengguna`, `email`, `kata_sandi`, `foto_profil`, `telepon`, `level`) VALUES
(1, 'Administrator', 'admin@gmail.com', '$2y$10$A9cPJr57tiEbxtoTGTiBw.IkmT2UlqSa9nBdkZoAfc2keWXr9Aha2', 'default-foto.png', '082354321787', 'Administrator'),
(4, 'Pelanggan 1', 'pelanggan@gmail.com', '$2y$10$d9pbO46Y2euy/tw0zjBZdeM6.9WGBrsLCoHs3zzIukq5.IgmNUOWq', 'default-foto.png', '082353471263', 'Pelanggan'),
(5, 'Admin Lapangan', 'adminlapangan1@gmail.com', '$2y$10$XiEaBC1AUrVPsWRRWb7dK.y4PVsLO89dH48NxrskeN/vDR455/VhC', 'default-foto.png', '08981239829381', 'Admin Lapangan');

-- --------------------------------------------------------

--
-- Table structure for table `alat`
--

CREATE TABLE `alat` (
  `id_alat` int NOT NULL,
  `id_kategori` int NOT NULL,
  `nama_alat` varchar(128) NOT NULL,
  `tipe` varchar(128) NOT NULL,
  `merek` varchar(128) NOT NULL,
  `nomor` varchar(64) NOT NULL,
  `status_alat` varchar(64) NOT NULL,
  `foto_alat` varchar(256) NOT NULL,
  `deskripsi_alat` text NOT NULL,
  `pembaruan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alat`
--

INSERT INTO `alat` (`id_alat`, `id_kategori`, `nama_alat`, `tipe`, `merek`, `nomor`, `status_alat`, `foto_alat`, `deskripsi_alat`, `pembaruan`) VALUES
(1, 2, 'Truck Barang', 'H3', 'Hino', '001', 'Digunakan', 'f6ca424dd8b3706afb0fbe5e6dd2004c..jpg', 'Truck untuk mengantarkan bahan tambang ke luar tambang', '2023-04-10 17:23:09'),
(2, 1, 'Exca 003', 'A2', 'Hitachi', '002', 'Rusak', '20160124202247.jpg', 'Alat berat untuk mengeruk tanah', '2023-04-10 17:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id_detail_pembelian` int NOT NULL,
  `id_invoice` int NOT NULL,
  `id_produk` int NOT NULL,
  `nama_produk` varchar(128) NOT NULL,
  `harga` int NOT NULL,
  `jumlah` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id_detail_pembelian`, `id_invoice`, `id_produk`, `nama_produk`, `harga`, `jumlah`) VALUES
(1, 1, 1, 'Batu Gunung 1', 700000, 1),
(2, 2, 1, 'Batu Gunung 1', 700000, 1),
(3, 3, 2, 'Pasir Putih', 300000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengeluaran`
--

CREATE TABLE `detail_pengeluaran` (
  `id_detail_pengeluaran` int NOT NULL,
  `nomor_pengeluaran` varchar(32) NOT NULL,
  `pengeluaran_untuk` text NOT NULL,
  `jumlah_pengeluaran` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_pengeluaran`
--

INSERT INTO `detail_pengeluaran` (`id_detail_pengeluaran`, `nomor_pengeluaran`, `pengeluaran_untuk`, `jumlah_pengeluaran`) VALUES
(3, '20230623100304', 'Nasi 15bks', 150000),
(4, '20230623100304', 'Rokok', 40000),
(5, '20230623100304', 'Es teh', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_produksi`
--

CREATE TABLE `detail_produksi` (
  `id_detail_produksi` int NOT NULL,
  `nomor_produksi` varchar(32) NOT NULL,
  `bahan_produksi` varchar(128) NOT NULL,
  `jumlah` int NOT NULL,
  `id_satuan` int NOT NULL,
  `catatan_bahan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_produksi`
--

INSERT INTO `detail_produksi` (`id_detail_produksi`, `nomor_produksi`, `bahan_produksi`, `jumlah`, `id_satuan`, `catatan_bahan`) VALUES
(1, '20230624104327', 'Batu A', 12, 1, 'Bahan oke'),
(2, '20230624104327', 'Pasir', 15, 1, '15');

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` int NOT NULL,
  `nik` bigint NOT NULL,
  `pokok` int NOT NULL,
  `bon` int NOT NULL,
  `persen` int NOT NULL,
  `jumlah_jam` int NOT NULL,
  `tahun` int NOT NULL,
  `bulan` varchar(16) NOT NULL,
  `pembaruan_gaji` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`id_gaji`, `nik`, `pokok`, `bon`, `persen`, `jumlah_jam`, `tahun`, `bulan`, `pembaruan_gaji`) VALUES
(1, 6301030702020008, 30000, 200000, 2, 120, 2023, 'Januari', '2023-07-05 13:47:46');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id_invoice` int NOT NULL,
  `id_akun` int NOT NULL,
  `id_ongkos_kirim` int NOT NULL,
  `resi` varchar(64) NOT NULL,
  `tgl_beli` date NOT NULL,
  `jam_beli` time NOT NULL,
  `metode` varchar(64) NOT NULL,
  `bukti` varchar(256) NOT NULL,
  `status_pembelian` int NOT NULL,
  `alamat` text NOT NULL,
  `catatan_pembelian` text NOT NULL,
  `pembaruan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id_invoice`, `id_akun`, `id_ongkos_kirim`, `resi`, `tgl_beli`, `jam_beli`, `metode`, `bukti`, `status_pembelian`, `alamat`, `catatan_pembelian`, `pembaruan`) VALUES
(1, 4, 2, '0620231903534942', '2023-06-19', '00:00:00', 'Bayar di Tempat', '', 3, 'Jl. A. Yani, Kel. Angsau, Kec .Pelaihari', 'Oke', '2023-06-24 08:18:45'),
(2, 4, 1, '0620232221425042', '2023-06-22', '00:00:00', 'Transfer ke Bank', '68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f776174747061642d6d656469612d736572766963652f53746f7279496d6167652f36595f69557331564d42446642513d3d2d3737323637373239372e31356337363131326633303262393963.jpeg', 2, 'Pelaihari', 'Oke', '2023-06-24 08:12:06'),
(3, 4, 2, '2023240616160442', '2023-06-24', '16:16:04', 'Transfer ke Bank', '', 1, 'Pelaihari', 'Oke', '2023-06-24 08:16:04');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int NOT NULL,
  `nama_jabatan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Direktur'),
(3, 'Teknisi'),
(4, 'Sopir'),
(5, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nik` bigint NOT NULL,
  `id_jabatan` int NOT NULL,
  `nama_karyawan` varchar(128) NOT NULL,
  `tempat_lahir` varchar(128) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `foto_karyawan` varchar(256) NOT NULL,
  `status_karyawan` varchar(64) NOT NULL,
  `kegiatan` varchar(64) NOT NULL,
  `pembaruan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nik`, `id_jabatan`, `nama_karyawan`, `tempat_lahir`, `tgl_lahir`, `alamat`, `foto_karyawan`, `status_karyawan`, `kegiatan`, `pembaruan`) VALUES
(6301030702020008, 3, 'Rudy', 'Tanah Laut', '2023-07-05', 'Angsau, Kec. Pelaihari, Kabupaten Tanah Laut, Kalimantan Selatan 70812', 'rudy.jpg', 'Aktif', 'Senam', '2023-07-05 14:34:31'),
(6301030702020012, 1, 'Ridu', 'Tanah Laut', '2023-07-05', 'Angsau, Kec. Pelaihari, Kabupaten Tanah Laut, Kalimantan Selatan 70812', '334399169_576164487871985_7966346556442396400_n.jpg', 'Non-Aktif', '0', '2023-07-05 14:38:26'),
(630107202305143504, 1, 'Ridu', 'Karawaci', '2023-07-05', 'Tambang Ulang', '334399169_576164487871985_7966346556442396400_n.jpg', 'Non-Aktif', '0', '2023-07-05 14:35:04');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(128) NOT NULL,
  `jenis_kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `jenis_kategori`) VALUES
(1, 'Excavator', 'Alat Berat'),
(2, 'Truck', 'Alat Berat'),
(3, 'Pick Up', 'Transportasi'),
(4, 'Jack Hammer', 'Mesin');

-- --------------------------------------------------------

--
-- Table structure for table `lembur`
--

CREATE TABLE `lembur` (
  `id_lembur` int NOT NULL,
  `id_presensi` int NOT NULL,
  `nik` bigint NOT NULL,
  `bayaran` int NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `catatan_lembur` text NOT NULL,
  `pembaruan_lembur` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lembur`
--

INSERT INTO `lembur` (`id_lembur`, `id_presensi`, `nik`, `bayaran`, `jam_mulai`, `jam_selesai`, `catatan_lembur`, `pembaruan_lembur`) VALUES
(2, 17, 6301030702020008, 6450, '12:04:57', '16:00:00', 'Kerja', '2023-07-05 14:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `monitoring`
--

CREATE TABLE `monitoring` (
  `id_monitoring` int NOT NULL,
  `id_alat` int NOT NULL,
  `tgl_monitoring` date NOT NULL,
  `penanggung_jawab` text NOT NULL,
  `tgl_terakhir_digunakan` date NOT NULL,
  `catatan_kondisi` text NOT NULL,
  `status_monitoring` varchar(64) NOT NULL,
  `pembaruan_monitoring` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monitoring`
--

INSERT INTO `monitoring` (`id_monitoring`, `id_alat`, `tgl_monitoring`, `penanggung_jawab`, `tgl_terakhir_digunakan`, `catatan_kondisi`, `status_monitoring`, `pembaruan_monitoring`) VALUES
(1, 2, '2023-06-19', 'Mekanik A dan Mekanik Bc', '2023-06-19', 'Alat aman dan masih bagus. Masih bisa digunakan', 'Bagus', '2023-06-18 18:47:37');

-- --------------------------------------------------------

--
-- Table structure for table `ongkos_kirim`
--

CREATE TABLE `ongkos_kirim` (
  `id_ongkos_kirim` int NOT NULL,
  `kecamatan` varchar(128) NOT NULL,
  `kelurahan` varchar(128) NOT NULL,
  `biaya` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ongkos_kirim`
--

INSERT INTO `ongkos_kirim` (`id_ongkos_kirim`, `kecamatan`, `kelurahan`, `biaya`) VALUES
(1, 'Ambil di Tempat', 'Ambil di Tempat', 0),
(2, 'Pelaihari', 'Angsau', 20000),
(3, 'Panyipatan', 'Batakan', 45000);

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id_pemasukan` int NOT NULL,
  `nama_pemasukan` varchar(128) NOT NULL,
  `asal_pemasukan` varchar(256) NOT NULL,
  `jumlah_pemasukan` int NOT NULL,
  `tgl_pemasukan` date NOT NULL,
  `catatan_pemasukan` text NOT NULL,
  `id_akun` int NOT NULL,
  `pembaruan_pemasukan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemasukan`
--

INSERT INTO `pemasukan` (`id_pemasukan`, `nama_pemasukan`, `asal_pemasukan`, `jumlah_pemasukan`, `tgl_pemasukan`, `catatan_pemasukan`, `id_akun`, `pembaruan_pemasukan`) VALUES
(1, 'Penjualan', 'Hasil penjualan bahan/produk', 15000000, '2023-06-19', 'Oke', 1, '2023-06-19 00:13:49');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int NOT NULL,
  `nomor_pengeluaran` varchar(32) NOT NULL,
  `tgl_pengeluaran` date NOT NULL,
  `catatan_pengeluaran` text NOT NULL,
  `id_akun` int NOT NULL,
  `pembaruan_pengeluaran` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `nomor_pengeluaran`, `tgl_pengeluaran`, `catatan_pengeluaran`, `id_akun`, `pembaruan_pengeluaran`) VALUES
(3, '20230623100304', '2023-06-23', 'konsumsi karyawan 15 orang (makan siang)', 1, '2023-06-23 08:03:04');

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id_presensi` int NOT NULL,
  `nik` bigint NOT NULL,
  `tgl_presensi` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `pembaruan_presensi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id_presensi`, `nik`, `tgl_presensi`, `jam_masuk`, `jam_keluar`, `pembaruan_presensi`) VALUES
(17, 6301030702020008, '2023-06-30', '12:04:47', '12:04:57', '2023-07-05 14:43:49'),
(18, 6301030702020012, '2023-06-30', '12:06:53', '12:06:56', '2023-07-05 14:43:49');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int NOT NULL,
  `jenis_produk` varchar(128) NOT NULL,
  `nama_produk` varchar(256) NOT NULL,
  `harga` int NOT NULL,
  `neto` int NOT NULL,
  `id_satuan` int NOT NULL,
  `stok` int NOT NULL,
  `thumbnail` varchar(256) NOT NULL,
  `deskripsi_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `jenis_produk`, `nama_produk`, `harga`, `neto`, `id_satuan`, `stok`, `thumbnail`, `deskripsi_produk`) VALUES
(1, 'Batu', 'Batu Gunung 1', 700000, 20, 1, 100, 'default.png', 'Batu oke'),
(2, 'Pasir', 'Pasir Putih', 300000, 20, 1, 200, 'default.png', 'Pasir oke');

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
  `id_produksi` int NOT NULL,
  `nomor_produksi` varchar(32) NOT NULL,
  `tgl_produksi` date NOT NULL,
  `id_akun` int NOT NULL,
  `catatan_produksi` text NOT NULL,
  `pembaruan_produksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`id_produksi`, `nomor_produksi`, `tgl_produksi`, `id_akun`, `catatan_produksi`, `pembaruan_produksi`) VALUES
(1, '20230624104327', '2023-06-24', 1, 'Oke', '2023-06-24 08:43:27');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int NOT NULL,
  `nama_satuan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`) VALUES
(1, 'm3'),
(2, 'Ton'),
(3, 'Kg'),
(4, 'm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`),
  ADD KEY `id_level` (`level`);

--
-- Indexes for table `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id_alat`);

--
-- Indexes for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`id_detail_pembelian`);

--
-- Indexes for table `detail_pengeluaran`
--
ALTER TABLE `detail_pengeluaran`
  ADD PRIMARY KEY (`id_detail_pengeluaran`);

--
-- Indexes for table `detail_produksi`
--
ALTER TABLE `detail_produksi`
  ADD PRIMARY KEY (`id_detail_produksi`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`),
  ADD KEY `fk_gaji_nik` (`nik`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `fk_jabatan_karyawan` (`id_jabatan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `lembur`
--
ALTER TABLE `lembur`
  ADD PRIMARY KEY (`id_lembur`),
  ADD KEY `fk_lembur_karyawan` (`nik`);

--
-- Indexes for table `monitoring`
--
ALTER TABLE `monitoring`
  ADD PRIMARY KEY (`id_monitoring`);

--
-- Indexes for table `ongkos_kirim`
--
ALTER TABLE `ongkos_kirim`
  ADD PRIMARY KEY (`id_ongkos_kirim`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id_pemasukan`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id_presensi`),
  ADD KEY `fk_presensi_nik` (`nik`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id_produksi`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `alat`
--
ALTER TABLE `alat`
  MODIFY `id_alat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `id_detail_pembelian` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detail_pengeluaran`
--
ALTER TABLE `detail_pengeluaran`
  MODIFY `id_detail_pengeluaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail_produksi`
--
ALTER TABLE `detail_produksi`
  MODIFY `id_detail_produksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id_gaji` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id_invoice` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lembur`
--
ALTER TABLE `lembur`
  MODIFY `id_lembur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `monitoring`
--
ALTER TABLE `monitoring`
  MODIFY `id_monitoring` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ongkos_kirim`
--
ALTER TABLE `ongkos_kirim`
  MODIFY `id_ongkos_kirim` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id_pemasukan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id_presensi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id_produksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gaji`
--
ALTER TABLE `gaji`
  ADD CONSTRAINT `fk_gaji_nik` FOREIGN KEY (`nik`) REFERENCES `karyawan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `fk_jabatan_karyawan` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lembur`
--
ALTER TABLE `lembur`
  ADD CONSTRAINT `fk_lembur_karyawan` FOREIGN KEY (`nik`) REFERENCES `karyawan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `presensi`
--
ALTER TABLE `presensi`
  ADD CONSTRAINT `fk_presensi_nik` FOREIGN KEY (`nik`) REFERENCES `karyawan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
