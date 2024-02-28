-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2024 at 05:06 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kasir`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `tampil_produk` ()   SELECT 	tbl_produk.id_produk,
		tbl_produk.kode_produk,
        tbl_produk.nama_produk,
        tbl_produk.harga_beli,
        tbl_produk.harga_jual,
        tbl_produk.diskon,
        tbl_satuan.id_satuan,
        tbl_kategori.id_kategori,
        tbl_produk.stok
FROM tbl_produk
JOIN tbl_satuan ON
tbl_satuan.id_satuan=tbl_produk.id_satuan
JOIN tbl_kategori ON
tbl_kategori.id_kategori=tbl_produk.id_kategori$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `kode_pelanggan` varchar(25) NOT NULL,
  `nama_pelanggan` varchar(225) NOT NULL,
  `alamat` text NOT NULL,
  `nomor_telpon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `kode_pelanggan`, `nama_pelanggan`, `alamat`, `nomor_telpon`) VALUES
(13, 'PLGN1', 'sifa', 'kuningan', '08997658987'),
(14, 'PLGN2', 'meli', 'ancaran', '089877658776'),
(15, 'PLGN3', 'yayang', 'sagarahiang', '08231440561');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detailpenjualan`
--

CREATE TABLE `tbl_detailpenjualan` (
  `id_detail` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `kode_produk` varchar(25) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjualan`
--

CREATE TABLE `tbl_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `no_faktur` varchar(50) NOT NULL,
  `tgl_penjualan` datetime DEFAULT NULL,
  `total_harga` decimal(10,2) DEFAULT NULL,
  `cash` int(11) DEFAULT NULL,
  `kembalian` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_penjualan`
--

INSERT INTO `tbl_penjualan` (`id_penjualan`, `no_faktur`, `tgl_penjualan`, `total_harga`, `cash`, `kembalian`, `id_user`) VALUES
(1, '202208130001', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(11) NOT NULL,
  `kode_produk` varchar(25) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `jumlah_produk` decimal(10,2) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `kode_produk`, `nama_produk`, `harga_beli`, `harga_jual`, `jumlah_produk`, `stok`) VALUES
(9, 'PRD01', 'Tas Ransel', 80000, 240000, 0.00, 10),
(10, 'PRD02', 'Tas Selempang', 50000, 150000, 0.00, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `kode_user` varchar(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `kode_user`, `nama`, `email`, `password`, `level`) VALUES
(8, 'USR03', 'tika', 'yustika02@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1),
(9, 'USR04', 'meli', 'kamilaeni@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tbl_detailpenjualan`
--
ALTER TABLE `tbl_detailpenjualan`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_penjualan` (`id_penjualan`),
  ADD KEY `id_produk` (`kode_produk`);

--
-- Indexes for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_detailpenjualan`
--
ALTER TABLE `tbl_detailpenjualan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
