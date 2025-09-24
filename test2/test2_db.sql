-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2025 at 02:18 PM
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
-- Database: `test2_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_ms_produk`
--

CREATE TABLE `tb_ms_produk` (
  `PLU` int(11) NOT NULL,
  `DESCP` varchar(50) DEFAULT NULL,
  `STOK` int(11) DEFAULT NULL,
  `HARGA_BELI` int(11) DEFAULT NULL,
  `HARGA_JUAL` int(11) DEFAULT NULL,
  `MIN_ORDER` int(11) DEFAULT NULL,
  `MIN_STOK` int(11) DEFAULT NULL,
  `MAX_STOK` int(11) DEFAULT NULL,
  `TAG_PRODUK` varchar(2) DEFAULT NULL,
  `TANGGAL_BUAT` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_ms_produk`
--

INSERT INTO `tb_ms_produk` (`PLU`, `DESCP`, `STOK`, `HARGA_BELI`, `HARGA_JUAL`, `MIN_ORDER`, `MIN_STOK`, `MAX_STOK`, `TAG_PRODUK`, `TANGGAL_BUAT`) VALUES
(10000001, 'Beras 5kg', 17, 50, 60, 20, 50, 200, 'F', '2025-09-24');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tr_koreksi`
--

CREATE TABLE `tb_tr_koreksi` (
  `PLU` int(11) NOT NULL,
  `QTY` int(11) DEFAULT NULL,
  `TGL_KOREKSI` date DEFAULT NULL,
  `TANGGAL_BUAT` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_tr_koreksi`
--

INSERT INTO `tb_tr_koreksi` (`PLU`, `QTY`, `TGL_KOREKSI`, `TANGGAL_BUAT`) VALUES
(10000001, 17, '2025-09-24', '2025-09-24');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tr_order`
--

CREATE TABLE `tb_tr_order` (
  `NO_FAKTUR` varchar(20) DEFAULT NULL,
  `TGL_ORDER` date DEFAULT NULL,
  `PLU` int(11) DEFAULT NULL,
  `QTY` int(11) DEFAULT NULL,
  `HARGA` int(11) DEFAULT NULL,
  `STATUS_REC` varchar(2) DEFAULT 'F',
  `TANGGAL_BUAT` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_tr_order`
--

INSERT INTO `tb_tr_order` (`NO_FAKTUR`, `TGL_ORDER`, `PLU`, `QTY`, `HARGA`, `STATUS_REC`, `TANGGAL_BUAT`) VALUES
('ORD1758698740', '2025-09-24', 10000001, 20, 50, 'F', '2025-09-24');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tr_receive`
--

CREATE TABLE `tb_tr_receive` (
  `NO_FAKTUR` varchar(20) DEFAULT NULL,
  `TGL_RECEIVE` date DEFAULT NULL,
  `PLU` int(11) DEFAULT NULL,
  `QTY` int(11) DEFAULT NULL,
  `HARGA_BELI` int(11) DEFAULT NULL,
  `TANGGAL_BUAT` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_tr_receive`
--

INSERT INTO `tb_tr_receive` (`NO_FAKTUR`, `TGL_RECEIVE`, `PLU`, `QTY`, `HARGA_BELI`, `TANGGAL_BUAT`) VALUES
('ORD1758698740', '2025-09-24', 10000001, 20, 50, '2025-09-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_ms_produk`
--
ALTER TABLE `tb_ms_produk`
  ADD PRIMARY KEY (`PLU`);

--
-- Indexes for table `tb_tr_koreksi`
--
ALTER TABLE `tb_tr_koreksi`
  ADD PRIMARY KEY (`PLU`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
