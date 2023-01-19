-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2023 at 04:26 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbperbaikan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `nik` int(12) NOT NULL,
  `nm_user` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `nik`, `nm_user`, `username`, `password`, `role`) VALUES
(1, 2147483646, 'rangga', 'rangga', '863c2a4b6bff5e22294081e376fc1f51', 'maintenance'),
(2, 982139182, 'fadli', 'fadli', '0a539e9da09b0ab58fd282832c07b6ab', 'manager'),
(3, 2147483642, 'Albert', 'albert', '6c5bc43b443975b806740d8e41146479', 'chief');

-- --------------------------------------------------------

--
-- Table structure for table `tb_alat`
--

CREATE TABLE `tb_alat` (
  `id_alat` int(11) NOT NULL,
  `nama_alat` varchar(20) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_alat`
--

INSERT INTO `tb_alat` (`id_alat`, `nama_alat`, `merk`, `jumlah`, `satuan`) VALUES
(1, 'Fire Blanket', 'Torabika', 3, 'Buah'),
(2, 'Foldable Earmuff', 'Torabika', 4, 'Buah'),
(3, 'Tabung OFI Resuscita', 'Lion', 1, 'Tabung'),
(4, 'Action Cam', 'GoPro', 1, 'Set'),
(5, 'Skop', 'Tesla', 1, 'Buah'),
(6, 'Tas P3K ', 'PMI', 2, 'Set'),
(7, 'Tandu Lipat', 'PMI', 3, 'Buah'),
(8, 'Binocullar', 'BNC', 2, 'Buah'),
(9, 'Sarung Tangan Ammex', 'Ammex', 1, 'Box'),
(10, 'Proximity Suit', 'PUBG', 3, 'Set'),
(11, 'Rescue Knife', 'Point Blank', 2, 'Buah'),
(15, 'Mobil Damkar', 'Damkar', 1, 'Unit');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategorikerusakan`
--

CREATE TABLE `tb_kategorikerusakan` (
  `id_kategori` int(11) NOT NULL,
  `tingkatkerusakan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategorikerusakan`
--

INSERT INTO `tb_kategorikerusakan` (`id_kategori`, `tingkatkerusakan`) VALUES
(1, 'Mudah'),
(2, 'Sedang'),
(3, 'Susah');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kendaraan`
--

CREATE TABLE `tb_kendaraan` (
  `id_kendaraan` int(11) NOT NULL,
  `nama_kendaraan` varchar(20) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `jenis_kendaraan` varchar(20) NOT NULL,
  `satuan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kendaraan`
--

INSERT INTO `tb_kendaraan` (`id_kendaraan`, `nama_kendaraan`, `merk`, `jenis_kendaraan`, `satuan`) VALUES
(1, 'Inova', 'Kijang', 'Utility Car', 'Unit');

-- --------------------------------------------------------

--
-- Table structure for table `tb_perbaikan`
--

CREATE TABLE `tb_perbaikan` (
  `id_perbaikan` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `nm_user` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `lokasi` varchar(10) NOT NULL,
  `pleton` varchar(10) NOT NULL,
  `nama_alat` varchar(20) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `satuan` varchar(4) NOT NULL,
  `kerusakan` int(11) NOT NULL,
  `bagiankomponenrusak` varchar(20) NOT NULL,
  `uraiankerusakan` varchar(255) NOT NULL,
  `tindakan` varchar(100) NOT NULL,
  `penyebabkerusakan` varchar(100) NOT NULL,
  `tgl_kerusakan` date NOT NULL,
  `tgl_selesai` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_perbaikan`
--

INSERT INTO `tb_perbaikan` (`id_perbaikan`, `iduser`, `nm_user`, `tanggal`, `lokasi`, `pleton`, `nama_alat`, `merk`, `satuan`, `kerusakan`, `bagiankomponenrusak`, `uraiankerusakan`, `tindakan`, `penyebabkerusakan`, `tgl_kerusakan`, `tgl_selesai`, `status`) VALUES
(1, 1, 'fervian', '2022-12-28', 'United Sta', 'Pleton', 'Foldable Earmuff', 'Lion', 'Buah', 1, 'Tabung', 'Foldable Rusak', 'Benerin Bang', 'Tiba tiba rusak', '2022-12-27', '2023-01-09', 'Selesai'),
(2, 1, 'fervian', '2023-01-07', 'Bandara 2', 'Pleton', 'Tabung OFI Resuscita', 'BNC', 'Tabu', 1, 'Tabung', 'Tabung Mengalami Kebocoran karena terbentur benda ', 'Mengganti Tabung', 'Bocorny Tabung OFI', '2023-01-06', '0000-00-00', 'Proses');

-- --------------------------------------------------------

--
-- Table structure for table `tb_progress`
--

CREATE TABLE `tb_progress` (
  `id_progres` int(11) NOT NULL,
  `id_perbaikan` int(11) NOT NULL,
  `statusproses` varchar(25) NOT NULL,
  `proses` varchar(255) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_progress`
--

INSERT INTO `tb_progress` (`id_progres`, `id_perbaikan`, `statusproses`, `proses`, `tgl`) VALUES
(1, 2, 'Proses Perbaikan', 'Melakukan Penambalan Pada Tabung Gas', '2023-01-09');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `iduser` int(11) NOT NULL,
  `nik` int(12) NOT NULL,
  `nm_user` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`iduser`, `nik`, `nm_user`, `username`, `password`) VALUES
(1, 2147483641, 'Fervian', 'fervian', '3076b2dd83f8e906fd83717a8775512e'),
(3, 2147483647, 'Fikri Fahrurozi', 'fikri', '5d4864249b21de08642aa6ff4178b346');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_alat`
--
ALTER TABLE `tb_alat`
  ADD PRIMARY KEY (`id_alat`);

--
-- Indexes for table `tb_kategorikerusakan`
--
ALTER TABLE `tb_kategorikerusakan`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `tb_perbaikan`
--
ALTER TABLE `tb_perbaikan`
  ADD PRIMARY KEY (`id_perbaikan`);

--
-- Indexes for table `tb_progress`
--
ALTER TABLE `tb_progress`
  ADD PRIMARY KEY (`id_progres`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_alat`
--
ALTER TABLE `tb_alat`
  MODIFY `id_alat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_kategorikerusakan`
--
ALTER TABLE `tb_kategorikerusakan`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_perbaikan`
--
ALTER TABLE `tb_perbaikan`
  MODIFY `id_perbaikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_progress`
--
ALTER TABLE `tb_progress`
  MODIFY `id_progres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
