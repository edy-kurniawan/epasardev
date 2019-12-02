-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2019 at 06:10 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epasar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `Username` varchar(35) NOT NULL,
  `Pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Username`, `Pass`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `ID` int(6) NOT NULL,
  `Kode` varchar(15) NOT NULL,
  `Reftoko` varchar(5) NOT NULL,
  `Nama` char(25) NOT NULL,
  `Stok` int(255) NOT NULL,
  `Harga` int(255) NOT NULL,
  `Refkategori` varchar(5) NOT NULL,
  `Satuan` text NOT NULL,
  `Status` varchar(2) NOT NULL,
  `Ket` char(25) DEFAULT NULL,
  `Img` varchar(50) NOT NULL,
  `Datei` timestamp NULL DEFAULT NULL,
  `Dateu` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`ID`, `Kode`, `Reftoko`, `Nama`, `Stok`, `Harga`, `Refkategori`, `Satuan`, `Status`, `Ket`, `Img`, `Datei`, `Dateu`) VALUES
(8, '19291', 'C1', 'Telur', 2, 8000, 'KAT1', 'Kg', 'T', '', 'default.jpg', '0000-00-00 00:00:00', '2019-11-25 02:29:03'),
(9, '30120', 'T01', 'Cabai', 2, 6000, 'KAT1', 'KG', 'T', '', '', '2019-11-26 12:01:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` int(6) NOT NULL,
  `Kode` varchar(15) NOT NULL,
  `Refbarang` varchar(15) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Subtotal` int(11) NOT NULL,
  `Datei` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`ID`, `Kode`, `Refbarang`, `Jumlah`, `Subtotal`, `Datei`) VALUES
(1, 'cart0', '19291', 2, 10000, '2019-11-26 19:23:31'),
(2, 'cart0', '30120', 1, 20000, '2019-11-26 19:23:53'),
(3, 'cart1', '30120', 1, 20000, '2019-11-26 19:24:16');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `ID` int(6) NOT NULL,
  `Kode` varchar(5) NOT NULL,
  `Nama` char(25) NOT NULL,
  `Ket` char(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`ID`, `Kode`, `Nama`, `Ket`) VALUES
(4, 'KAT1', 'Sembako', 'Bahan-bahan sembako'),
(5, 'KAT2', 'Daging', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` int(6) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Pass` varchar(50) NOT NULL,
  `Refuser` varchar(15) NOT NULL,
  `Status` varchar(2) NOT NULL,
  `Refcart` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `Username`, `Pass`, `Refuser`, `Status`, `Refcart`) VALUES
(1, 'root', 'd033e22ae348aeb5660fc2140aec35850c4da997', '000', 'T', 'cart0'),
(5, 'trial', 'd033e22ae348aeb5660fc2140aec35850c4da997', '111', 'T', 'cart1');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `ID` int(6) NOT NULL,
  `Kode` varchar(5) NOT NULL,
  `Nama` text NOT NULL,
  `Pemilik` text NOT NULL,
  `Lokasi` text NOT NULL,
  `Telp` varchar(14) NOT NULL,
  `Status` varchar(2) NOT NULL,
  `Jambuka` time NOT NULL,
  `Jamtutup` time NOT NULL,
  `Ket` char(25) DEFAULT NULL,
  `Datei` datetime DEFAULT NULL,
  `Dateu` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`ID`, `Kode`, `Nama`, `Pemilik`, `Lokasi`, `Telp`, `Status`, `Jambuka`, `Jamtutup`, `Ket`, `Datei`, `Dateu`) VALUES
(6, 'C1', 'Toko C', 'Bp. ', 'Blok A', '0878812', 'T', '10:26:00', '10:26:00', '', '2019-11-25 09:31:32', '2019-11-26 08:20:55'),
(4, 'T01', 'Toko A', 'Ibu. ', 'B12A1', '0899212', 'T', '09:17:00', '11:17:00', '', '0000-00-00 00:00:00', NULL),
(29, 'T03', 'Toko 3', 'Edy kurniawan', 'Ruko A No 23', '98767712', 'T', '04:49:00', '16:49:00', '', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(6) NOT NULL,
  `Kode` varchar(15) NOT NULL,
  `Nama` char(25) NOT NULL,
  `Jenis` char(10) NOT NULL,
  `Alamat` char(30) NOT NULL,
  `Tgllahir` date NOT NULL,
  `Telp` varchar(13) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Datei` timestamp NULL DEFAULT NULL,
  `Dateu` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Kode`, `Nama`, `Jenis`, `Alamat`, `Tgllahir`, `Telp`, `Email`, `Datei`, `Dateu`) VALUES
(1, '000', 'root', '', '', '0000-00-00', '', '', '2019-11-25 03:10:38', '2019-11-25 03:11:03'),
(2, '111', 'trial', '', '', '0000-00-00', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `xpembayaran`
--

CREATE TABLE `xpembayaran` (
  `ID` int(6) NOT NULL,
  `Kode` varchar(15) NOT NULL,
  `Rektujuan` varchar(20) NOT NULL,
  `Rekasal` varchar(20) NOT NULL,
  `Total` int(11) NOT NULL,
  `Datei` datetime NOT NULL,
  `Status` varchar(10) NOT NULL,
  `Ket` char(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `xpenjualan`
--

CREATE TABLE `xpenjualan` (
  `ID` int(6) NOT NULL,
  `Kode` varchar(15) NOT NULL,
  `Refdetail` varchar(10) NOT NULL,
  `Total` int(11) NOT NULL,
  `Refbayar` varchar(10) NOT NULL,
  `Ket` char(25) DEFAULT NULL,
  `Datei` datetime NOT NULL,
  `Refuser` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `xpenjualand`
--

CREATE TABLE `xpenjualand` (
  `ID` int(6) NOT NULL,
  `Kode` varchar(15) NOT NULL,
  `Refbarang` varchar(10) NOT NULL,
  `Nama` char(25) NOT NULL,
  `Harga` int(11) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Username`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`Kode`),
  ADD KEY `Refkategori` (`Refkategori`),
  ADD KEY `Reftoko` (`Reftoko`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Refcart` (`Kode`),
  ADD KEY `ID` (`ID`),
  ADD KEY `Refbarang` (`Refbarang`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD UNIQUE KEY `Kode` (`Kode`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Username`),
  ADD KEY `Refuser` (`Refuser`),
  ADD KEY `ID` (`ID`),
  ADD KEY `Refcart` (`Refcart`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`Kode`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Kode`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `xpembayaran`
--
ALTER TABLE `xpembayaran`
  ADD PRIMARY KEY (`Kode`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `xpenjualan`
--
ALTER TABLE `xpenjualan`
  ADD PRIMARY KEY (`Kode`),
  ADD UNIQUE KEY `Refdetail` (`Refdetail`),
  ADD KEY `Refbayar` (`Refbayar`),
  ADD KEY `ID` (`ID`),
  ADD KEY `Refuser` (`Refuser`);

--
-- Indexes for table `xpenjualand`
--
ALTER TABLE `xpenjualand`
  ADD UNIQUE KEY `Refbarang` (`Refbarang`),
  ADD UNIQUE KEY `Kode` (`Kode`),
  ADD KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `xpembayaran`
--
ALTER TABLE `xpembayaran`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `xpenjualan`
--
ALTER TABLE `xpenjualan`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `xpenjualand`
--
ALTER TABLE `xpenjualand`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`Refkategori`) REFERENCES `kategori` (`Kode`),
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`Reftoko`) REFERENCES `toko` (`Kode`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `Refcart` FOREIGN KEY (`Kode`) REFERENCES `login` (`Refcart`),
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`Refbarang`) REFERENCES `barang` (`Kode`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `Refuser` FOREIGN KEY (`Refuser`) REFERENCES `user` (`Kode`);

--
-- Constraints for table `xpenjualan`
--
ALTER TABLE `xpenjualan`
  ADD CONSTRAINT `xpenjualan_ibfk_1` FOREIGN KEY (`Refbayar`) REFERENCES `xpembayaran` (`Kode`),
  ADD CONSTRAINT `xpenjualan_ibfk_2` FOREIGN KEY (`Refuser`) REFERENCES `user` (`Kode`);

--
-- Constraints for table `xpenjualand`
--
ALTER TABLE `xpenjualand`
  ADD CONSTRAINT `xpenjualand_ibfk_1` FOREIGN KEY (`Refbarang`) REFERENCES `barang` (`Kode`),
  ADD CONSTRAINT `xpenjualand_ibfk_2` FOREIGN KEY (`Kode`) REFERENCES `xpenjualan` (`Refdetail`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
