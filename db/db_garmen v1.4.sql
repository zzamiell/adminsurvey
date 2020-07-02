-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21 Jun 2020 pada 14.50
-- Versi Server: 10.1.29-MariaDB
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
-- Struktur dari tabel `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bahan_baku`
--

INSERT INTO `bahan_baku` (`id`, `kode`, `nama`, `stok`, `harga`) VALUES
(1, '001-KSLI', 'Kain Spandek Licra', 20, 200000),
(4, '004-KSLI', 'Kain Spandek Licra', 20, 5000),
(5, '005-KCG', 'Kancing', 0, 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `id` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`id`, `id_pemesanan`, `id_produk`, `jumlah`, `total`) VALUES
(8, 7, 1, 3, 90000),
(9, 8, 1, 30, 900000),
(10, 8, 1, 30, 900000),
(11, 9, 1, 1, 30000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `nik`, `nama`, `alamat`, `tanggal_lahir`) VALUES
(1, '', 'Kain Spandek Licra', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `kode_pemesanan` varchar(20) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `tanggal_pemesanan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `kode_pemesanan`, `nama`, `total_bayar`, `tipe`, `tanggal_pemesanan`, `created_by`) VALUES
(7, '110620202116581', 'TEST', 90000, 'pembeli', '2020-06-11 21:19:43', 2),
(8, '110620202120162', 'ASDF', 1340000, 'pebisnis', '2020-06-11 21:20:33', 2),
(9, '110620202316251', 'TEST', 30000, 'pembeli', '2020-06-11 23:16:34', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `akses`) VALUES
(2, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0),
(4, 'haha', '637d1f5c6e6d1be22ed907eb3d223d858ca396d8', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaan_bahanbaku`
--

CREATE TABLE `permintaan_bahanbaku` (
  `id_permintaan` int(11) NOT NULL,
  `no` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_bahanbaku` int(11) DEFAULT NULL,
  `satuan` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `permintaan_bahanbaku`
--

INSERT INTO `permintaan_bahanbaku` (`id_permintaan`, `no`, `tanggal`, `id_bahanbaku`, `satuan`, `jumlah`, `keterangan`) VALUES
(7, 4, '2020-06-21', 1, '3', 3, 'ket'),
(8, 33, '2020-06-21', 1, '4', 4, 'ket'),
(9, 33, '2020-06-21', 4, '3', 3, 'ket');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaan_belanja`
--

CREATE TABLE `permintaan_belanja` (
  `id_permintaan` int(11) NOT NULL,
  `no` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_bahanbaku` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `permintaan_belanja`
--

INSERT INTO `permintaan_belanja` (`id_permintaan`, `no`, `tanggal`, `id_bahanbaku`, `satuan`, `jumlah`) VALUES
(4, 4, '2020-06-21', 1, '4', 4),
(5, 5, '2020-06-21', 1, '5', 5),
(6, 4, '2020-06-21', 1, '4', 4),
(7, 4, '2020-06-21', 1, '4', 4),
(8, 0, '2020-06-21', 1, '', 0),
(9, 0, '2020-06-21', 1, '', 0),
(10, 3, '2020-06-21', 1, '4', 4),
(11, 0, '2020-06-21', 1, '', 0),
(12, 3, '2020-06-21', 1, '5', 5),
(13, 3, '2020-06-21', 1, '4', 4),
(14, 4, '2020-06-21', 1, '3', 3),
(15, 4, '2020-06-21', 1, '2', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaan_produksi`
--

CREATE TABLE `permintaan_produksi` (
  `id_permintaan` int(11) NOT NULL,
  `no` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `satuan` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `permintaan_produksi`
--

INSERT INTO `permintaan_produksi` (`id_permintaan`, `no`, `tanggal`, `id_produk`, `satuan`, `jumlah`) VALUES
(1, 3, '2020-06-21', 6, '3', 3),
(2, 3, '2020-06-21', 2, '3', 4),
(3, 0, '2020-06-21', 8, '2', 2),
(4, 44, '2020-06-21', 2, '3', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `kode`, `nama`, `stok`, `harga`) VALUES
(1, '001-DRSS-TNID', 'Tanisha Inner Dress', 200, 30000),
(2, '002-DRSS-MIND', 'Maida Inner Dress', 0, 20000),
(3, '003-DRSS-QIED', 'Qaira Dress', 0, 10000),
(4, '004-DRSS-AADD', 'Atahiya Dress', 0, 10000),
(5, '005-DRSS-OIDD', 'Orianna Dress', 0, 0),
(6, '006-DRSS-SFRD', 'Safara Dress', 0, 0),
(7, '007-DRSS-SAED', 'Stacy Dress', 0, 0),
(8, '008-DRSS-MDDD', 'Madhuma Dress', 0, 0),
(9, '009-DRSS-VN D', 'Vanvania Dress', 0, 0),
(10, '0010-DRSS-AMRD', 'Armela Dress', 0, 0),
(11, '0011-DRSS-MLED', 'Malla Dress', 0, 0),
(12, '0012-DRSS-RNDD', 'Ranisha Dress', 0, 0),
(13, '0013-DRSS-SVRD', 'Savara Dress', 0, 0),
(14, '0014-DRSS-INED', 'Inner Dress Shaquila', 0, 0),
(15, '0015-DRSS-INMD', 'Inner Ummi', 0, 0),
(16, '0016-DRSS-INDD', 'Inner Ardicia', 0, 0),
(17, '0017-TNIC-ANTU', 'Anindra Tunic', 0, 0),
(18, '0018-TNIC-MOTU', 'Mohaza Tunic', 0, 0),
(19, '0019-TNIC-HATU', 'Hayva Tunic', 0, 0),
(20, '0020-TNIC-AKTU', 'Akshara Tunic', 0, 0),
(21, '0021-TNIC-ASTU', 'Ashana Tunic', 0, 0),
(22, '0022-TNIC-AMTU', 'Ambar tunic black', 0, 0),
(23, '0023-TNIC-AMTU', 'Ambar Tunic Maroon', 0, 0),
(24, '0024-TNIC-BATU', 'Badzila Tunic Navy', 0, 0),
(25, '0025-TNIC-BATU', 'Badzila Tunic Grey', 0, 0),
(26, '0026-TNIC-METU', 'Menah Tunic', 0, 0),
(27, '0027-TNIC-NATU', 'Naruna Tunic', 0, 0),
(28, '0028-TNIC-HATU', 'Hazka Tunic', 0, 0),
(29, '0029-TNIC-CHTU', 'Chavia Tunic White', 0, 0),
(30, '0030-TNIC-CHTU', 'Chavia Tunic Brown', 0, 0),
(31, '0031-TNIC-RATU', 'Ramita Tunic', 0, 0),
(32, '0032-TNIC-RATU', 'Ravina Tunic', 0, 0),
(33, '0033-TNIC-YUTU', 'Yupita Tunic', 0, 0),
(34, '0034-TNIC-ESTU', 'Eshal Tunic', 0, 0),
(35, '0035-TNIC-ANTU', 'Anggun Tunic', 0, 0),
(36, '0036-TNIC-ARTU', 'Ardeen Tunic', 0, 0),
(37, '0037-OTER-VAOU', 'Valerrma Outer', 0, 0),
(38, '0038-OTER-RUOU', 'Rubina Outer Brown', 0, 0),
(39, '0039-OTER-RUOU', 'Rubina Outer Black', 0, 0),
(40, '0040-OTER-DIOU', 'Diorama Outer ', 0, 0),
(41, '0041-OTER-GWOU', 'Gwen Outer', 0, 0),
(42, '0042-OTER-ADOU', 'Adena Outer', 0, 0),
(43, '0043-OTER-WEOU', 'Westi Outer', 0, 0),
(44, '0044-OTER-GOOU', 'Google Outer', 0, 0),
(45, '0045-OTER-ZEOU', 'Zea Outer', 0, 0),
(46, '0047-MUKN-SOBL', 'Mukena Soraya Black', 0, 0),
(47, '0048-MUKN-SOWH', 'Mukena Soraya White', 0, 0),
(48, '0049-INNR-MIDA', 'Inner Maida', 0, 0),
(49, '0050-INNR-AGVE', 'Inner Agave', 0, 0),
(50, '0051-INNR-OXBL', 'Oxa Inner Blouse', 0, 0),
(51, '0052-CPTF-LIWH', 'Ciput Face Lift White', 0, 0),
(52, '0053-CPTF-LIDB', 'Ciput Face Lift Dark Brown', 0, 0),
(53, '0054-CPTF-LIRS', 'Ciput Face Lift Rose', 0, 0),
(54, '0055-CPTF-LIBR', 'Ciput Face Lift Amber', 0, 0),
(55, '0056-CPTF-LIMB', 'Ciput Face Lift Monocron Blue', 0, 0),
(56, '0057-CPTF-LIOR', 'Ciput Face Lift Orchid', 0, 0),
(57, '0058-CPTF-LIMN', 'Ciput Face Lift Mint', 0, 0),
(58, '0058-KRDN-MHBH', 'Marsha HB casual HeiQ', 0, 0),
(59, '0059-KRDN-MHLH', 'Marsha HL casual HeiQ', 0, 0),
(60, '0060-KRDN-MHusnaH', 'Bergo Husna Casual', 0, 0),
(61, '0061-KRDN-MHusnaH', 'Berfo Husna Casual HeiQ', 0, 0),
(62, '0062-KRDN-MHBH', 'Marsha HB Casua', 0, 0),
(63, '0063-KRDN-MLongH', 'Binar Long Bergo', 0, 0),
(64, '0064-KRDN-MBergoH', 'Set Bergo & Manset Umroh Zora White', 0, 0),
(65, '0065-KRDN-MBergoH', 'Set Bergo & Manset Umroh Hawwa lyora Black', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_penesanan_ibfk_1` (`id_pemesanan`),
  ADD KEY `detail_penesanan_ibfk_2` (`id_produk`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permintaan_bahanbaku`
--
ALTER TABLE `permintaan_bahanbaku`
  ADD PRIMARY KEY (`id_permintaan`),
  ADD KEY `id_bahanbaku` (`id_bahanbaku`);

--
-- Indexes for table `permintaan_belanja`
--
ALTER TABLE `permintaan_belanja`
  ADD PRIMARY KEY (`id_permintaan`),
  ADD KEY `id_bahanbaku` (`id_bahanbaku`);

--
-- Indexes for table `permintaan_produksi`
--
ALTER TABLE `permintaan_produksi`
  ADD PRIMARY KEY (`id_permintaan`),
  ADD KEY `id_produk` (`id_produk`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permintaan_bahanbaku`
--
ALTER TABLE `permintaan_bahanbaku`
  MODIFY `id_permintaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permintaan_belanja`
--
ALTER TABLE `permintaan_belanja`
  MODIFY `id_permintaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `permintaan_produksi`
--
ALTER TABLE `permintaan_produksi`
  MODIFY `id_permintaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD CONSTRAINT `detail_pemesanan_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pemesanan_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `pengguna` (`id`);

--
-- Ketidakleluasaan untuk tabel `permintaan_bahanbaku`
--
ALTER TABLE `permintaan_bahanbaku`
  ADD CONSTRAINT `permintaan_bahanbaku_ibfk_1` FOREIGN KEY (`id_bahanbaku`) REFERENCES `bahan_baku` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `permintaan_belanja`
--
ALTER TABLE `permintaan_belanja`
  ADD CONSTRAINT `permintaan_belanja_ibfk_1` FOREIGN KEY (`id_bahanbaku`) REFERENCES `bahan_baku` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `permintaan_produksi`
--
ALTER TABLE `permintaan_produksi`
  ADD CONSTRAINT `permintaan_produksi_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
