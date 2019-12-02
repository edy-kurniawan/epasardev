-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2019 at 07:30 AM
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
  `Status` varchar(2) NOT NULL,
  `Ket` char(25) DEFAULT NULL,
  `Datei` datetime DEFAULT NULL,
  `Dateu` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(3, 'KAT01', 'Blablaa', '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` int(6) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Pass` varchar(20) NOT NULL,
  `Refuser` varchar(15) NOT NULL,
  `Status` varchar(2) NOT NULL,
  `Refcart` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `Username`, `Pass`, `Refuser`, `Status`, `Refcart`) VALUES
(1, 'root', 'root', '000', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `ID` int(6) NOT NULL,
  `Kode` varchar(5) NOT NULL,
  `Nama` text NOT NULL,
  `Lokasi` text NOT NULL,
  `Telp` varchar(14) NOT NULL,
  `Status` varchar(2) NOT NULL,
  `Jambuka` time NOT NULL,
  `Jamtutup` time NOT NULL,
  `Ket` char(25) DEFAULT NULL,
  `Datei` datetime DEFAULT NULL,
  `Dateu` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(6) NOT NULL,
  `Kode` varchar(15) NOT NULL,
  `Nama` char(25) NOT NULL,
  `Jeniskelamin` char(10) NOT NULL,
  `Alamat` char(30) NOT NULL,
  `Tgllahir` date NOT NULL,
  `Telp` varchar(13) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Datei` datetime DEFAULT NULL,
  `Dateu` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Kode`, `Nama`, `Jeniskelamin`, `Alamat`, `Tgllahir`, `Telp`, `Email`, `Datei`, `Dateu`) VALUES
(1, '000', 'root', '', '', '0000-00-00', '', '', NULL, NULL);

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
  ADD UNIQUE KEY `Refbarang` (`Refbarang`),
  ADD KEY `Refcart` (`Kode`),
  ADD KEY `ID` (`ID`);

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
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
