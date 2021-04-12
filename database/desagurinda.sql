-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 12, 2021 at 09:50 AM
-- Server version: 8.0.23-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `alamat` text NOT NULL,
  `id_admin` varchar(6) NOT NULL,
  `update_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datang`
--

INSERT INTO `datang` (`kode_datang`, `no_kk`, `nama_kk`, `nik_kk`, `stat_pindah`, `tanggal_datang`, `alamat`, `id_admin`, `update_at`) VALUES
('DTG0001', '757100232000', 'Muhammad Ghafur', '757100232323', 'Menumpang KK', '2020-12-28', 'Kota Gorontalo', 'adm1', ''),
('DTG0002', '1234', '', '', 'Membuat KK Baru', '2020-04-01', 'oke', 'dsn1', '12-Apr-2021'),
('DTG0003', '757100232000', '', '', 'Menumpang KK', '2021-04-08', 'is', 'dsn1', '12-Apr-2021'),
('DTG0004', '12324', '', '', 'Membuat KK Baru', '2021-04-01', 'sorong', 'dsn1', '12-Apr-2021');

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
  `nik_pelapor` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nik_saksi1` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nik_saksi2` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_pengguna` varchar(6) NOT NULL,
  `update_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelahiran`
--

INSERT INTO `kelahiran` (`kode_kelahiran`, `no_kk`, `nama`, `jenis_kelamin`, `tempat_dilahirkan`, `tempat_lahir`, `hari_lahir`, `tanggal_lahir`, `jam_lahir`, `kelahiran_ke`, `jenis_kelahiran`, `penolong`, `berat`, `panjang`, `nik_ibu`, `nik_ayah`, `nik_pelapor`, `nik_saksi1`, `nik_saksi2`, `id_pengguna`, `update_at`) VALUES
('LHR0001', '098765', 'salman', 'l', 'Puskesmas', 'Gorontalo', 'SENIN', '2010-02-22', '03:35:00', '2', 'Tunggal', 'Dokter', '9', '9', '09876', '09876', '09876', '098765', '09876', 'dsn1', '12-Apr-2021');

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
('KEL0006', '757100232000', '757100232323', '757100232125'),
('KEL0008', '1234154123', '12345', '12345'),
('KEL0010', '12345324', '1234523402', '1234523402'),
('KEL0012', '1234', '123455', '12345'),
('KEL0014', '1234', '123455', '123455'),
('KEL0016', '757100232000', '757100232323', '231323'),
('KEL0018', '12324', '1239434', '1239434');

-- --------------------------------------------------------

--
-- Table structure for table `kematian`
--

CREATE TABLE `kematian` (
  `kode_kematian` int NOT NULL,
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
  `nik_pelapor` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nik_saksi1` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nik_saksi2` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_admin` varchar(6) NOT NULL,
  `update_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kematian`
--

INSERT INTO `kematian` (`kode_kematian`, `nik`, `no_kk`, `anak_ke`, `tanggal_kematian`, `jam_kematian`, `sebab`, `tempat_kematian`, `menerangkan`, `nik_ayah`, `nik_ibu`, `nik_pelapor`, `nik_saksi1`, `nik_saksi2`, `id_admin`, `update_at`) VALUES
(1, '757100232353', '757100232000', '2', '2020-03-11', '01:49:00', 'Sakit Keras / Tua', 'Rumah', 'Dokter', '5678', '789', '09876', '098765', '09876', 'dsn1', '12-Apr-2021');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int NOT NULL,
  `nama_kota` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`) VALUES
(1, 'Kepanjen'),
(2, 'Malang'),
(3, 'Ngawi'),
(4, 'Yogyakarta'),
(5, 'Jakarta'),
(1, 'Kepanjen'),
(2, 'Malang'),
(3, 'Ngawi'),
(4, 'Yogyakarta'),
(5, 'Jakarta'),
(1, 'Kepanjen'),
(2, 'Malang'),
(3, 'Ngawi'),
(4, 'Yogyakarta'),
(5, 'Jakarta');

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
  `kewarganegaraan` varchar(30) NOT NULL,
  `nik_ayah` varchar(30) NOT NULL,
  `nik_ibu` varchar(30) NOT NULL,
  `id_admin` varchar(6) NOT NULL,
  `update_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`nik`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `goldar`, `agama`, `hubungan`, `status`, `dusun`, `alamat`, `pendidikan`, `pekerjaan`, `kewarganegaraan`, `nik_ayah`, `nik_ibu`, `id_admin`, `update_at`) VALUES
('12345', 'okea', 'l', 'grout', '2020-04-01', 'A', '1', 'kepala_keluarga', '0', '1', 'okesip', 'Belum Tamat SD/Sederajat', 'Tidak Bekerja', 'Warga Negara Indonesia', '', '', 'dsn1', '12-Apr-2021'),
('123455', 'simon', 'l', 'gorut', '2020-04-01', 'A', '1', 'kepala_keluarga', '0', '1', 'okea', 'Belum Tamat SD/Sederajat', 'Tidak Bekerja', 'Warga Negara Indonesia', '', '', 'dsn1', '12-Apr-2021'),
('1239434', 'sin', 'p', 'singo', '2021-01-06', 'A', '1', 'kepala_keluarga', '0', '1', 'sin', 'Belum Tamat SD/Sederajat', 'Tidak Bekerja', 'Warga Negara Indonesia', '', '', 'dsn1', '12-Apr-2021'),
('231323', 'sd', 'l', 'gorut', '2021-04-06', 'A', '1', 'famili_lain', '0', '1', 'i', 'Belum Tamat SD/Sederajat', 'Tidak Bekerja', 'Warga Negara Indonesia', '', '', 'dsn1', '12-Apr-2021'),
('757100232123', 'Muhmmad Doni', '', '', '2021-04-01', '', '', 'suami', '2', '', '', '', '', '', '', '', 'adm1', ''),
('757100232124', 'Intan Permata', '', '', '2021-04-01', '', '', 'suami', '2', '', '', '', '', '', '', '', 'adm1', ''),
('757100232125', 'Rudi Pratama', '', '', '2021-04-08', '', '', 'suami', '2', '', '', '', '', '', '', '', 'adm1', ''),
('757100232323', 'Muhammad Ghafur', 'l', 'MEPANGA', '2019-11-24', 'AB', '2', 'kepala_keluarga', '1', '2', 'DESA GURINDA', 'Belum Tamat SD/Sederajat', 'Mengurus Rumah Tangga', 'Warga Negara Indonesia', '78', '789', 'adm1', ''),
('757100232353', 'Sari Roti', 'p', 'kaliyoso', '1990-11-24', 'A', '2', 'istri', '3', '3', 'DESA GURINDA', 'Belum Tamat SD/Sederajat', 'Tidak Bekerja', 'Warga Negara Indonesia', '5678', '789', 'adm1', '');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk_datang`
--

CREATE TABLE `penduduk_datang` (
  `kode_pdatang` int NOT NULL,
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
(3, 'DTG0001', '757100232125', 'Rudi Pratama'),
(7, 'DTG0002', '123455', ''),
(8, 'DTG0003', '231323', '');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk_pindah`
--

CREATE TABLE `penduduk_pindah` (
  `kode_ppindah` int NOT NULL,
  `kode_pindah` varchar(8) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penduduk_pindah`
--

INSERT INTO `penduduk_pindah` (`kode_ppindah`, `kode_pindah`, `nik`, `nama`) VALUES
(1, 'PDH0001', '1234', ''),
(2, 'PDH0001', '1234', ''),
(3, 'PDH0001', '1234', ''),
(4, 'PDH0001', '1234', ''),
(5, 'PDH0001', '1234', ''),
(6, 'PDH0001', '1234', ''),
(7, 'PDH0001', '1234', ''),
(8, 'PDH0001', '1234', ''),
(9, 'PDH0001', '1234', ''),
(10, 'PDH0001', '1234', ''),
(11, 'PDH0001', '1234', ''),
(12, 'PDH0001', '1234', ''),
(13, 'PDH0002', '9876', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_admin` varchar(6) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `kata_sandi` varchar(50) NOT NULL,
  `peran` enum('admin','pimpinan','dusun') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_admin`, `nama_lengkap`, `nama_pengguna`, `kata_sandi`, `peran`) VALUES
('adm1', 'Yazni', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
('dsn1', 'dusun duren', 'duren1', 'a0e8c16046a96f8586b034c988f26226', 'dusun'),
('pmp1', 'Pimpinan', 'pimpinan', '90973652b88fe07d05a4304f0a945de8', 'pimpinan');

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
  `tanggal_pindah` date NOT NULL,
  `id_admin` varchar(6) NOT NULL,
  `update_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pindah`
--

INSERT INTO `pindah` (`kode_pindah`, `no_kk`, `nama_kk`, `alamat`, `alasan`, `alamat_tujuan`, `klasifikasi`, `jenis_pindah`, `stat_tidak_pindah`, `stat_pindah`, `tanggal_pindah`, `id_admin`, `update_at`) VALUES
('PDH0001', '757100232323', '', 'Desa Gurinda', 'Keamanan', 'Surga', 'Antar Desa', 'Kepala Keluarga dan Seluruh An', 'Membuat KK Baru', 'Membuat KK Baru', '2021-04-21', 'dsn1', '12-Apr-2021'),
('PDH0002', '09', '', '987', 'Keamanan', 'Surga', 'Antar Desa', 'Kep. Keluarga dan Sbg. Anggota', 'Membuat KK Baru', 'Membuat KK Baru', '2020-03-11', 'dsn1', '12-Apr-2021');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datang`
--
ALTER TABLE `datang`
  ADD PRIMARY KEY (`kode_datang`),
  ADD KEY `admina` (`id_admin`);

--
-- Indexes for table `kelahiran`
--
ALTER TABLE `kelahiran`
  ADD PRIMARY KEY (`kode_kelahiran`),
  ADD KEY `nik_ibu` (`nik_ibu`,`nik_ayah`,`nik_pelapor`,`nik_saksi1`,`nik_saksi2`),
  ADD KEY `tb_admin` (`id_pengguna`);

--
-- Indexes for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`kode_keluarga`);

--
-- Indexes for table `kematian`
--
ALTER TABLE `kematian`
  ADD PRIMARY KEY (`kode_kematian`),
  ADD KEY `kematian_user` (`id_admin`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `id_admin` (`id_admin`);

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
  ADD PRIMARY KEY (`kode_pindah`),
  ADD KEY `admin_id` (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kematian`
--
ALTER TABLE `kematian`
  MODIFY `kode_kematian` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penduduk_datang`
--
ALTER TABLE `penduduk_datang`
  MODIFY `kode_pdatang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penduduk_pindah`
--
ALTER TABLE `penduduk_pindah`
  MODIFY `kode_ppindah` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `datang`
--
ALTER TABLE `datang`
  ADD CONSTRAINT `admina` FOREIGN KEY (`id_admin`) REFERENCES `pengguna` (`id_admin`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `kelahiran`
--
ALTER TABLE `kelahiran`
  ADD CONSTRAINT `tb_admin` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_admin`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `kematian`
--
ALTER TABLE `kematian`
  ADD CONSTRAINT `kematian_user` FOREIGN KEY (`id_admin`) REFERENCES `pengguna` (`id_admin`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD CONSTRAINT `id_admin` FOREIGN KEY (`id_admin`) REFERENCES `pengguna` (`id_admin`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `pindah`
--
ALTER TABLE `pindah`
  ADD CONSTRAINT `admin_id` FOREIGN KEY (`id_admin`) REFERENCES `pengguna` (`id_admin`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
