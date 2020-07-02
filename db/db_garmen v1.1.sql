-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2020 at 04:22 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_garmen`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`id`, `kode`, `nama`, `stok`, `harga`) VALUES
(1, '001-KSLI', 'Kain Spandek Licra', 20, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penesanan`
--

CREATE TABLE `detail_penesanan` (
  `id` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `kode_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nik`, `nama`, `alamat`, `tanggal_lahir`) VALUES
(1, '111', 'Bagian HRD', 'bandung', '2020-06-06');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `kode` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `tipe` int(11) NOT NULL,
  `tanggal_pemesanan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `akses`) VALUES
(2, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0),
(4, 'haha', '637d1f5c6e6d1be22ed907eb3d223d858ca396d8', 0);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kode`, `nama`, `stok`, `harga`, `kategori`) VALUES
(1, '001-DRSS-TNID', 'Tanisha Inner Dress', 200, 0, ''),
(2, '002-DRSS-MIND', 'Maida Inner Dress', 0, 0, ''),
(3, '003-DRSS-QIED', 'Qaira Dress', 0, 0, ''),
(4, '004-DRSS-AADD', 'Atahiya Dress', 0, 0, ''),
(5, '005-DRSS-OIDD', 'Orianna Dress', 0, 0, ''),
(6, '006-DRSS-SFRD', 'Safara Dress', 0, 0, ''),
(7, '007-DRSS-SAED', 'Stacy Dress', 0, 0, ''),
(8, '008-DRSS-MDDD', 'Madhuma Dress', 0, 0, ''),
(9, '009-DRSS-VN D', 'Vanvania Dress', 0, 0, ''),
(10, '0010-DRSS-AMRD', 'Armela Dress', 0, 0, ''),
(11, '0011-DRSS-MLED', 'Malla Dress', 0, 0, ''),
(12, '0012-DRSS-RNDD', 'Ranisha Dress', 0, 0, ''),
(13, '0013-DRSS-SVRD', 'Savara Dress', 0, 0, ''),
(14, '0014-DRSS-INED', 'Inner Dress Shaquila', 0, 0, ''),
(15, '0015-DRSS-INMD', 'Inner Ummi', 0, 0, ''),
(16, '0016-DRSS-INDD', 'Inner Ardicia', 0, 0, ''),
(17, '0017-TNIC-ANTU', 'Anindra Tunic', 0, 0, ''),
(18, '0018-TNIC-MOTU', 'Mohaza Tunic', 0, 0, ''),
(19, '0019-TNIC-HATU', 'Hayva Tunic', 0, 0, ''),
(20, '0020-TNIC-AKTU', 'Akshara Tunic', 0, 0, ''),
(21, '0021-TNIC-ASTU', 'Ashana Tunic', 0, 0, ''),
(22, '0022-TNIC-AMTU', 'Ambar tunic black', 0, 0, ''),
(23, '0023-TNIC-AMTU', 'Ambar Tunic Maroon', 0, 0, ''),
(24, '0024-TNIC-BATU', 'Badzila Tunic Navy', 0, 0, ''),
(25, '0025-TNIC-BATU', 'Badzila Tunic Grey', 0, 0, ''),
(26, '0026-TNIC-METU', 'Menah Tunic', 0, 0, ''),
(27, '0027-TNIC-NATU', 'Naruna Tunic', 0, 0, ''),
(28, '0028-TNIC-HATU', 'Hazka Tunic', 0, 0, ''),
(29, '0029-TNIC-CHTU', 'Chavia Tunic White', 0, 0, ''),
(30, '0030-TNIC-CHTU', 'Chavia Tunic Brown', 0, 0, ''),
(31, '0031-TNIC-RATU', 'Ramita Tunic', 0, 0, ''),
(32, '0032-TNIC-RATU', 'Ravina Tunic', 0, 0, ''),
(33, '0033-TNIC-YUTU', 'Yupita Tunic', 0, 0, ''),
(34, '0034-TNIC-ESTU', 'Eshal Tunic', 0, 0, ''),
(35, '0035-TNIC-ANTU', 'Anggun Tunic', 0, 0, ''),
(36, '0036-TNIC-ARTU', 'Ardeen Tunic', 0, 0, ''),
(37, '0037-OTER-VAOU', 'Valerrma Outer', 0, 0, ''),
(38, '0038-OTER-RUOU', 'Rubina Outer Brown', 0, 0, ''),
(39, '0039-OTER-RUOU', 'Rubina Outer Black', 0, 0, ''),
(40, '0040-OTER-DIOU', 'Diorama Outer ', 0, 0, ''),
(41, '0041-OTER-GWOU', 'Gwen Outer', 0, 0, ''),
(42, '0042-OTER-ADOU', 'Adena Outer', 0, 0, ''),
(43, '0043-OTER-WEOU', 'Westi Outer', 0, 0, ''),
(44, '0044-OTER-GOOU', 'Google Outer', 0, 0, ''),
(45, '0045-OTER-ZEOU', 'Zea Outer', 0, 0, ''),
(46, '0047-MUKN-SOBL', 'Mukena Soraya Black', 0, 0, ''),
(47, '0048-MUKN-SOWH', 'Mukena Soraya White', 0, 0, ''),
(48, '0049-INNR-MIDA', 'Inner Maida', 0, 0, ''),
(49, '0050-INNR-AGVE', 'Inner Agave', 0, 0, ''),
(50, '0051-INNR-OXBL', 'Oxa Inner Blouse', 0, 0, ''),
(51, '0052-CPTF-LIWH', 'Ciput Face Lift White', 0, 0, ''),
(52, '0053-CPTF-LIDB', 'Ciput Face Lift Dark Brown', 0, 0, ''),
(53, '0054-CPTF-LIRS', 'Ciput Face Lift Rose', 0, 0, ''),
(54, '0055-CPTF-LIBR', 'Ciput Face Lift Amber', 0, 0, ''),
(55, '0056-CPTF-LIMB', 'Ciput Face Lift Monocron Blue', 0, 0, ''),
(56, '0057-CPTF-LIOR', 'Ciput Face Lift Orchid', 0, 0, ''),
(57, '0058-CPTF-LIMN', 'Ciput Face Lift Mint', 0, 0, ''),
(58, '0058-KRDN-MHBH', 'Marsha HB casual HeiQ', 0, 0, ''),
(59, '0059-KRDN-MHLH', 'Marsha HL casual HeiQ', 0, 0, ''),
(60, '0060-KRDN-MHusnaH', 'Bergo Husna Casual', 0, 0, ''),
(61, '0061-KRDN-MHusnaH', 'Berfo Husna Casual HeiQ', 0, 0, ''),
(62, '0062-KRDN-MHBH', 'Marsha HB Casua', 0, 0, ''),
(63, '0063-KRDN-MLongH', 'Binar Long Bergo', 0, 0, ''),
(64, '0064-KRDN-MBergoH', 'Set Bergo & Manset Umroh Zora White', 0, 0, ''),
(65, '0065-KRDN-MBergoH', 'Set Bergo & Manset Umroh Hawwa lyora Black', 0, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_penesanan`
--
ALTER TABLE `detail_penesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_penesanan_ibfk_1` (`id_pemesanan`),
  ADD KEY `detail_penesanan_ibfk_2` (`kode_barang`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_penesanan`
--
ALTER TABLE `detail_penesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_penesanan`
--
ALTER TABLE `detail_penesanan`
  ADD CONSTRAINT `detail_penesanan_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_penesanan_ibfk_2` FOREIGN KEY (`kode_barang`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
