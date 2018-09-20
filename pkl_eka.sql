-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2018 at 01:32 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkl_eka`
--

-- --------------------------------------------------------

--
-- Table structure for table `kunjungan`
--

CREATE TABLE `kunjungan` (
  `id_kunjungan` int(11) NOT NULL,
  `perusahaan` varchar(255) NOT NULL,
  `pembimbing` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kunjungan`
--

INSERT INTO `kunjungan` (`id_kunjungan`, `perusahaan`, `pembimbing`) VALUES
(1, '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pembimbing`
--

CREATE TABLE `pembimbing` (
  `id_pembimbing` int(11) NOT NULL,
  `nama_pembimbing` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembimbing`
--

INSERT INTO `pembimbing` (`id_pembimbing`, `nama_pembimbing`, `username`, `password`, `foto`) VALUES
(1, 'Ridwan', 'ridwan', '6a050273963a48d1fca66b1e2cc60bdfaaa4660d', '6puhvcx47qckkg8.png');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_siswa` varchar(255) NOT NULL,
  `id_perusahaan` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `status` enum('menunggu','setujui','tidak setujui') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `id_siswa`, `id_perusahaan`, `keterangan`, `status`) VALUES
(4, '1', '2', '', 'menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `pengawas`
--

CREATE TABLE `pengawas` (
  `id_pengawas` int(11) NOT NULL,
  `nama_pengawas` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengawas`
--

INSERT INTO `pengawas` (`id_pengawas`, `nama_pengawas`, `no_hp`, `username`, `password`, `foto`) VALUES
(1, 'Rudi Irawan', '08566451231', 'rudi', '1f53d03209ef868737b2f546e002198b2b4875ac', '2f2d0j9pea4g4c4.png');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `id_pengawas` varchar(255) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `telp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `id_pengawas`, `nama_perusahaan`, `alamat`, `kapasitas`, `telp`, `email`, `cost`) VALUES
(1, '1', 'PT. AMERTA INDONESIA', 'jl Raya Cicurug', 5, '085232156', 'amerta@gmail.com', '1000000'),
(2, '1', 'PT. KUKUR INDONESIA', 'jl Raya Cicurug', 5, '085232156', 'amerta@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `nama_website` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `theme` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `nama_website`, `logo`, `alamat`, `deskripsi`, `theme`) VALUES
(1, 'PKL EKA', '1dwfpj3bkwdcks.png', 'Jl Raya Ciboalang No 21', 'Sistem Informasi IRO', 'skin-blue');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(255) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `id_pembimbing` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nilai_pkl` int(11) NOT NULL,
  `nilai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama_siswa`, `jenis_kelamin`, `jurusan`, `id_pembimbing`, `foto`, `tanggal_lahir`, `nilai_pkl`, `nilai`) VALUES
(1, '123456', 'Reza Abdullah', 'L', 'Perkantoran', '1', '1bcae7zomm800ks.png', '2018-08-12', 0, '30');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `akses_level` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `no_hp`, `email`, `username`, `password`, `akses_level`, `foto`) VALUES
(1, 'Ikhsan Thohir', '081615399070', 'ikhsan.thohir@gmail.com', 'ikhsan', '67a7872c5aeb341d482f955cd8ff9b951a26e74e', 'admin', 'df5aw362z5wgc88.png'),
(2, 'Deuis Nurjana', '08217965569', 'deuis@gmail.com', 'deuis', '6ce9c0ecfec8733a28654807176460ae4db37fd1', 'admin', 'vkamlaj9o288cg.png'),
(3, 'ADMIN', '0852132156456', 'admin@admin.com', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', '1bjnp8akwmzowg4.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD PRIMARY KEY (`id_kunjungan`);

--
-- Indexes for table `pembimbing`
--
ALTER TABLE `pembimbing`
  ADD PRIMARY KEY (`id_pembimbing`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `pengawas`
--
ALTER TABLE `pengawas`
  ADD PRIMARY KEY (`id_pengawas`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kunjungan`
--
ALTER TABLE `kunjungan`
  MODIFY `id_kunjungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pembimbing`
--
ALTER TABLE `pembimbing`
  MODIFY `id_pembimbing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengawas`
--
ALTER TABLE `pengawas`
  MODIFY `id_pengawas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
