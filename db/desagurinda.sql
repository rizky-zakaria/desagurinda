-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2020 at 01:35 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desagurinda`
--

-- --------------------------------------------------------

--
-- Table structure for table `datang`
--

CREATE TABLE `datang` (
  `kode_datang` varchar(8) NOT NULL,
  `no_kk` varchar(30) NOT NULL,
  `nama_kk` varchar(30) NOT NULL,
  `nik_kk` varchar(30) NOT NULL,
  `stat_pindah` varchar(30) NOT NULL,
  `tanggal_datang` date NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datang`
--

INSERT INTO `datang` (`kode_datang`, `no_kk`, `nama_kk`, `nik_kk`, `stat_pindah`, `tanggal_datang`, `alamat`) VALUES
('DTG0001', '757100232000', 'Muhammad Ghafur', '757100232323', 'Menumpang KK', '2020-12-28', 'Kota Gorontalo');

-- --------------------------------------------------------

--
-- Table structure for table `kelahiran`
--

CREATE TABLE `kelahiran` (
  `kode_kelahiran` varchar(8) NOT NULL,
  `no_kk` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `tempat_dilahirkan` varchar(30) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `hari_lahir` varchar(10) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jam_lahir` time NOT NULL,
  `kelahiran_ke` varchar(30) NOT NULL,
  `jenis_kelahiran` varchar(30) NOT NULL,
  `penolong` varchar(30) NOT NULL,
  `berat` varchar(10) NOT NULL,
  `panjang` varchar(10) NOT NULL,
  `nik_ibu` varchar(30) NOT NULL,
  `nik_ayah` varchar(30) NOT NULL,
  `nama_pelapor` varchar(30) NOT NULL,
  `nama_saksi1` varchar(30) NOT NULL,
  `nama_saksi2` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keluarga`
--

CREATE TABLE `keluarga` (
  `kode_keluarga` varchar(8) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `nik_kk` varchar(16) NOT NULL,
  `nik` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluarga`
--

INSERT INTO `keluarga` (`kode_keluarga`, `no_kk`, `nik_kk`, `nik`) VALUES
('KEL0001', '757100232000', '757100232323', '757100232323'),
('KEL0002', '757100232000', '757100232323', '757100232353'),
('KEL0004', '757100232000', '757100232323', '757100232123'),
('KEL0005', '757100232000', '757100232323', '757100232124'),
('KEL0006', '757100232000', '757100232323', '757100232125');

-- --------------------------------------------------------

--
-- Table structure for table `kematian`
--

CREATE TABLE `kematian` (
  `kode_kematian` varchar(8) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `no_kk` varchar(30) NOT NULL,
  `anak_ke` varchar(2) NOT NULL,
  `tanggal_kematian` date NOT NULL,
  `jam_kematian` time NOT NULL,
  `sebab` varchar(30) NOT NULL,
  `tempat_kematian` varchar(30) NOT NULL,
  `menerangkan` varchar(30) NOT NULL,
  `nik_ayah` varchar(30) NOT NULL,
  `nik_ibu` varchar(30) NOT NULL,
  `nama_pelapor` varchar(30) NOT NULL,
  `nama_saksi1` varchar(30) NOT NULL,
  `nama_saksi2` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `nik` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `goldar` varchar(2) NOT NULL,
  `agama` varchar(1) NOT NULL,
  `hubungan` enum('suami','istri','anak_kandung','orang_tua','famili_lain','kepala_keluarga') NOT NULL,
  `status` varchar(1) NOT NULL,
  `dusun` varchar(1) NOT NULL,
  `alamat` text NOT NULL,
  `pendidikan` varchar(30) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `kewarganegaraan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`nik`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `goldar`, `agama`, `hubungan`, `status`, `dusun`, `alamat`, `pendidikan`, `pekerjaan`, `kewarganegaraan`) VALUES
('757100232123', 'Muhmmad Doni', '', '', '0000-00-00', '', '', 'suami', '2', '', '', '', '', ''),
('757100232124', 'Intan Permata', '', '', '0000-00-00', '', '', 'suami', '2', '', '', '', '', ''),
('757100232125', 'Rudi Pratama', '', '', '0000-00-00', '', '', 'suami', '2', '', '', '', '', ''),
('757100232323', 'Muhammad Ghafur', 'l', 'MEPANGA', '2019-11-24', 'AB', '2', 'kepala_keluarga', '1', '2', 'DESA GURINDA', 'Belum Tamat SD/Sederajat', 'Mengurus Rumah Tangga', 'Warga Negara Indonesia'),
('757100232353', 'Sari Roti', 'p', 'kaliyoso', '1990-11-24', 'A', '2', 'istri', '1', '3', 'DESA GURINDA', 'Belum Tamat SD/Sederajat', 'Tidak Bekerja', 'Warga Negara Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk_datang`
--

CREATE TABLE `penduduk_datang` (
  `kode_pdatang` int(11) NOT NULL,
  `kode_datang` varchar(8) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penduduk_datang`
--

INSERT INTO `penduduk_datang` (`kode_pdatang`, `kode_datang`, `nik`, `nama`) VALUES
(1, 'DTG0001', '757100232123', 'Muhmmad Doni'),
(2, 'DTG0001', '757100232124', 'Intan Permata'),
(3, 'DTG0001', '757100232125', 'Rudi Pratama');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk_pindah`
--

CREATE TABLE `penduduk_pindah` (
  `kode_ppindah` int(11) NOT NULL,
  `kode_pindah` varchar(8) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_admin` varchar(6) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `kata_sandi` varchar(50) NOT NULL,
  `peran` enum('admin','pimpinan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_admin`, `nama_lengkap`, `nama_pengguna`, `kata_sandi`, `peran`) VALUES
('adm1', 'Yazni', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
('pmp1', 'Pimpinan', 'pimpinan', '21232f297a57a5a743894a0e4a801fc3', 'pimpinan');

-- --------------------------------------------------------

--
-- Table structure for table `pindah`
--

CREATE TABLE `pindah` (
  `kode_pindah` varchar(8) NOT NULL,
  `no_kk` varchar(30) NOT NULL,
  `nama_kk` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `alasan` varchar(30) NOT NULL,
  `alamat_tujuan` text NOT NULL,
  `klasifikasi` varchar(30) NOT NULL,
  `jenis_pindah` varchar(30) NOT NULL,
  `stat_tidak_pindah` varchar(70) NOT NULL,
  `stat_pindah` varchar(70) NOT NULL,
  `tanggal_pindah` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datang`
--
ALTER TABLE `datang`
  ADD PRIMARY KEY (`kode_datang`);

--
-- Indexes for table `kelahiran`
--
ALTER TABLE `kelahiran`
  ADD PRIMARY KEY (`kode_kelahiran`),
  ADD KEY `nik_ibu` (`nik_ibu`,`nik_ayah`,`nama_pelapor`,`nama_saksi1`,`nama_saksi2`);

--
-- Indexes for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`kode_keluarga`);

--
-- Indexes for table `kematian`
--
ALTER TABLE `kematian`
  ADD PRIMARY KEY (`kode_kematian`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `penduduk_datang`
--
ALTER TABLE `penduduk_datang`
  ADD PRIMARY KEY (`kode_pdatang`);

--
-- Indexes for table `penduduk_pindah`
--
ALTER TABLE `penduduk_pindah`
  ADD PRIMARY KEY (`kode_ppindah`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `pindah`
--
ALTER TABLE `pindah`
  ADD PRIMARY KEY (`kode_pindah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `penduduk_datang`
--
ALTER TABLE `penduduk_datang`
  MODIFY `kode_pdatang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penduduk_pindah`
--
ALTER TABLE `penduduk_pindah`
  MODIFY `kode_ppindah` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
