-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2021 at 03:29 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(10) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username_admin` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `username_admin`, `password`, `gambar`) VALUES
(1, 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin.jpg'),
(2, 'admin2', 'admin2', '315f166c5aca63a157f7d41007675cb44a948b33', 'admin2.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_asetdesa`
--

CREATE TABLE `tb_asetdesa` (
  `id_asetdesa` int(11) NOT NULL,
  `nama_asetdesa` varchar(120) NOT NULL,
  `jumlah_asetdesa` varchar(15) NOT NULL,
  `tanggal_asetdesa` date NOT NULL,
  `tahun_asetdesa` year(4) NOT NULL,
  `kondisi_asetdesa` varchar(15) NOT NULL,
  `harga_asetdesa` varchar(15) NOT NULL,
  `gambar` varchar(225) NOT NULL,
  `lokasi_asetdesa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_asetdesa`
--

INSERT INTO `tb_asetdesa` (`id_asetdesa`, `nama_asetdesa`, `jumlah_asetdesa`, `tanggal_asetdesa`, `tahun_asetdesa`, `kondisi_asetdesa`, `harga_asetdesa`, `gambar`, `lokasi_asetdesa`) VALUES
(13, 'SDN BERINGIN JAYA', '1000 M', '2021-02-17', 1985, 'BAIK', '2000000', 'admin.jpeg', 'RT 4'),
(14, 'Jalan Lingkungan Permukiman / Gang Fahmi', 'p73 m x L1,5 m ', '2021-02-18', 2015, 'BAIK', '7610000', 'batola.png', 'RT 2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_asetkantor`
--

CREATE TABLE `tb_asetkantor` (
  `id_asetkantor` int(11) NOT NULL,
  `nama_asetkantor` varchar(120) NOT NULL,
  `jumlah_asetkantor` varchar(15) NOT NULL,
  `tanggal_asetkantor` date NOT NULL,
  `tahun_asetkantor` year(4) NOT NULL,
  `kondisi_asetkantor` varchar(15) NOT NULL,
  `harga_asetkantor` varchar(15) NOT NULL,
  `gambar` varchar(225) NOT NULL,
  `nama_bagian` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_asetkantor`
--

INSERT INTO `tb_asetkantor` (`id_asetkantor`, `nama_asetkantor`, `jumlah_asetkantor`, `tanggal_asetkantor`, `tahun_asetkantor`, `kondisi_asetkantor`, `harga_asetkantor`, `gambar`, `nama_bagian`) VALUES
(12, 'Laptop Acer ROG', '1', '2021-02-16', 2020, 'BAIK', '15000000', '', 'SEKRETARIS DESA'),
(13, 'Komputer acer', '1', '2021-02-17', 2018, 'BAIK', '20000000', '', 'KAUR KEUANGAN'),
(14, 'Laptop Asus', '1', '2021-02-18', 2015, 'BAIK', '7500000', '', 'KASI KESEJAHTERAAN DAN PELAYANAN'),
(15, 'Tv Akari', '1 Buah', '2021-02-21', 2018, 'BAIK', '10000000', 'Tv Akari', 'KAUR UMUM DAN PERENCANAAN');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bagian`
--

CREATE TABLE `tb_bagian` (
  `id_bagian` int(11) NOT NULL,
  `nama_bagian` varchar(120) NOT NULL,
  `username_admin_bagian` varchar(50) NOT NULL,
  `password_bagian` varchar(50) NOT NULL,
  `nama_lengkap` varchar(70) NOT NULL,
  `tanggal_lahir_bagian` date NOT NULL,
  `alamat` text NOT NULL,
  `nik_bagian` varchar(16) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bagian`
--

INSERT INTO `tb_bagian` (`id_bagian`, `nama_bagian`, `username_admin_bagian`, `password_bagian`, `nama_lengkap`, `tanggal_lahir_bagian`, `alamat`, `nik_bagian`, `gambar`) VALUES
(29, 'KEPALA DESA', 'kepaladesa', '505f08d16e422bd07f153ef32a1794e6a9e0842a', 'Lajuardi', '2021-02-07', 'Anjir', '6304041234787890', 'kepaladesa.jpg'),
(30, 'SEKRETARIS DESA', 'sekdes', '08201f55c8beaf21825d072dcf6aa374c57a6073', 'Muhammad Sarwani Abdan S.pd', '1994-02-13', 'Beringin Jaya RT 04', '1256787890907863', 'sekdes.jpg'),
(31, 'KAUR UMUM DAN PERENCANAAN', 'kaur_umumperencanaan', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Maulida Agustina', '1995-02-13', 'ANJIR', '6325137131983826', 'kaur_umumperencanaan.jpg'),
(32, 'KAUR KEUANGAN', 'kaur_keuangan', 'bb4867a90647318a17bff2390fde98f9968a1011', 'Nurul Hidayati', '1994-02-18', 'RT 3', '0', 'kaur_keuangan.jpg'),
(34, 'KASI KESEJAHTERAAN DAN PELAYANAN', 'kasi_kesejahteraanpelayanan', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Muhammad Fajerin Syahbana', '1994-02-16', 'RT 4', '6325137131983826', 'kasi_kesejahteraanpelayanan.jpg'),
(35, 'KASI PEMERINTAHAN', 'kasi_pemerintahan', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Mahrita', '2021-02-16', 'RT 4', '6325137131983826', 'kasi_pemerintahan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_suratkeluar`
--

CREATE TABLE `tb_suratkeluar` (
  `id_suratkeluar` int(11) NOT NULL,
  `tanggalkeluar_suratkeluar` datetime NOT NULL,
  `kode_suratkeluar` varchar(10) NOT NULL,
  `nomor_suratkeluar` varchar(45) NOT NULL,
  `nama_bagian` varchar(70) NOT NULL,
  `tanggalsurat_suratkeluar` date NOT NULL,
  `kepada_suratkeluar` varchar(255) NOT NULL,
  `perihal_suratkeluar` text NOT NULL,
  `file_suratkeluar` varchar(255) NOT NULL,
  `operator` varchar(50) NOT NULL,
  `tanggal_entry` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_suratkeluar`
--

INSERT INTO `tb_suratkeluar` (`id_suratkeluar`, `tanggalkeluar_suratkeluar`, `kode_suratkeluar`, `nomor_suratkeluar`, `nama_bagian`, `tanggalsurat_suratkeluar`, `kepada_suratkeluar`, `perihal_suratkeluar`, `file_suratkeluar`, `operator`, `tanggal_entry`) VALUES
(94, '2021-02-16 16:02:00', '005', '3460', 'SEKRETARIS DESA', '2021-02-16', 'cbfd', 'mauiiii', '2021-3460.pdf', 'admin', '2021-02-16 16:02:59'),
(95, '2021-02-17 16:40:00', '002', '3461', 'SEKRETARIS DESA', '2021-02-17', 'ketua bpk', 'RAPAT', '2021-3461.pdf', 'admin', '2021-02-17 16:43:19');

-- --------------------------------------------------------

--
-- Table structure for table `tb_suratmasuk`
--

CREATE TABLE `tb_suratmasuk` (
  `id_suratmasuk` int(11) NOT NULL,
  `tanggalmasuk_suratmasuk` datetime NOT NULL DEFAULT current_timestamp(),
  `kode_suratmasuk` varchar(10) NOT NULL,
  `nomorurut_suratmasuk` varchar(7) NOT NULL,
  `nomor_suratmasuk` varchar(25) NOT NULL,
  `tanggalsurat_suratmasuk` date NOT NULL,
  `pengirim` varchar(255) NOT NULL,
  `kepada_suratmasuk` varchar(255) NOT NULL,
  `perihal_suratmasuk` text NOT NULL,
  `file_suratmasuk` varchar(255) NOT NULL,
  `operator` varchar(50) NOT NULL,
  `tanggal_entry` datetime NOT NULL DEFAULT current_timestamp(),
  `disposisi1` varchar(50) NOT NULL,
  `tanggal_disposisi1` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_suratmasuk`
--

INSERT INTO `tb_suratmasuk` (`id_suratmasuk`, `tanggalmasuk_suratmasuk`, `kode_suratmasuk`, `nomorurut_suratmasuk`, `nomor_suratmasuk`, `tanggalsurat_suratmasuk`, `pengirim`, `kepada_suratmasuk`, `perihal_suratmasuk`, `file_suratmasuk`, `operator`, `tanggal_entry`, `disposisi1`, `tanggal_disposisi1`) VALUES
(11, '2021-02-02 19:19:00', '122', '1 ', 'SURAT UNDANGAN/033/VI/202', '2021-02-02', 'UKM MAPALA', 'KEPALA DESA', 'undangan', '2021-1.pdf', 'admin', '2021-02-02 19:19:53', 'KEPALA DESA', '2021-02-02 13:23:00'),
(12, '2021-02-08 08:02:00', '0019', '2 ', '0019/SEKRETARIATAN/SP/I/2', '2021-02-08', 'MPM', 'ketua rt 3', 'SDFSDF', '2021-2.pdf', 'admin', '2021-02-08 08:03:30', 'KEPALA DESA', '2021-02-02 13:23:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username_admin` (`username_admin`);

--
-- Indexes for table `tb_asetdesa`
--
ALTER TABLE `tb_asetdesa`
  ADD PRIMARY KEY (`id_asetdesa`);

--
-- Indexes for table `tb_asetkantor`
--
ALTER TABLE `tb_asetkantor`
  ADD PRIMARY KEY (`id_asetkantor`);

--
-- Indexes for table `tb_bagian`
--
ALTER TABLE `tb_bagian`
  ADD PRIMARY KEY (`id_bagian`),
  ADD UNIQUE KEY `username_admin_bagian` (`username_admin_bagian`);

--
-- Indexes for table `tb_suratkeluar`
--
ALTER TABLE `tb_suratkeluar`
  ADD PRIMARY KEY (`id_suratkeluar`),
  ADD UNIQUE KEY `nomor_suratkeluar` (`nomor_suratkeluar`);

--
-- Indexes for table `tb_suratmasuk`
--
ALTER TABLE `tb_suratmasuk`
  ADD PRIMARY KEY (`id_suratmasuk`),
  ADD UNIQUE KEY `nomorurut_suratmasuk` (`nomorurut_suratmasuk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_asetdesa`
--
ALTER TABLE `tb_asetdesa`
  MODIFY `id_asetdesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_asetkantor`
--
ALTER TABLE `tb_asetkantor`
  MODIFY `id_asetkantor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_bagian`
--
ALTER TABLE `tb_bagian`
  MODIFY `id_bagian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tb_suratkeluar`
--
ALTER TABLE `tb_suratkeluar`
  MODIFY `id_suratkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `tb_suratmasuk`
--
ALTER TABLE `tb_suratmasuk`
  MODIFY `id_suratmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
