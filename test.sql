-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2019 at 02:34 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_order`
--

CREATE TABLE `detail_order` (
  `id_detail_order` int(11) NOT NULL,
  `id_order` int(5) NOT NULL,
  `id_masakan` int(5) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `qty` int(5) NOT NULL,
  `status_detail_order` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_order`
--

INSERT INTO `detail_order` (`id_detail_order`, `id_order`, `id_masakan`, `keterangan`, `qty`, `status_detail_order`) VALUES
(1, 1, 1, 'Pedas', 0, ''),
(2, 0, 1, '', 0, ''),
(3, 0, 1, '', 0, ''),
(4, 0, 1, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `masakan`
--

CREATE TABLE `masakan` (
  `id_masakan` int(11) NOT NULL,
  `nama_masakan` varchar(20) NOT NULL,
  `harga` int(10) NOT NULL,
  `status_masakan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masakan`
--

INSERT INTO `masakan` (`id_masakan`, `nama_masakan`, `harga`, `status_masakan`) VALUES
(1, 'Mie Goreng', 988, '1'),
(2, 'Mie Rebus', 989, '1');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_order` int(11) NOT NULL,
  `no_meja` varchar(5) NOT NULL,
  `tanggal` date NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_masakan` int(10) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `status_order` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_order`, `no_meja`, `tanggal`, `id_user`, `id_masakan`, `keterangan`, `status_order`) VALUES
(1, 'M01', '2019-02-14', 1, 1, 'Pedasss', '0'),
(2, 'M015', '2019-02-14', 1, 1, 'Oedas', '1'),
(3, '', '0000-00-00', 0, 0, '', '1'),
(4, '', '2019-02-14', 1, 0, '', '1'),
(5, '', '2019-02-15', 1, 0, '', '1'),
(6, '', '2019-02-15', 1, 0, '', '1'),
(7, '', '2019-02-15', 1, 0, '', '1'),
(8, '', '2019-02-15', 1, 0, '', '1'),
(9, '', '2019-02-15', 1, 1, '', '1'),
(10, '', '2019-02-15', 1, 1, '', '1'),
(11, '', '2019-02-15', 1, 1, '', '1'),
(12, '', '2019-02-15', 1, 1, 'Pedasss', '1'),
(13, '', '2019-02-15', 1, 1, 'Pedasss', '1'),
(14, 'M001', '2019-02-15', 1, 1, '', '0'),
(15, 'M001', '2019-02-15', 1, 1, '', '1'),
(16, 'M001', '2019-02-15', 1, 1, 'Digidaw', '1'),
(17, 'M001', '2019-02-15', 1, 1, '', '1'),
(18, 'M001', '2019-02-15', 1, 2, 'Pedasss', '1'),
(19, 'M016', '2019-02-15', 1, 1, '', '1'),
(20, 'M017', '2019-02-15', 1, 1, '', '1'),
(21, 'M018', '2019-02-15', 1, 1, '', '1'),
(22, 'M019', '2019-02-15', 1, 1, '', '1'),
(23, 'M020', '2019-02-15', 1, 1, '', '1'),
(24, 'M021', '2019-02-15', 1, 1, '', '1'),
(25, '', '2019-02-15', 1, 1, '', '1'),
(26, '', '2019-02-15', 3, 2, '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `temp_transaksi`
--

CREATE TABLE `temp_transaksi` (
  `id_temp` int(11) NOT NULL,
  `id_user` varchar(5) NOT NULL,
  `id_masakan` int(5) NOT NULL,
  `id_order` int(5) NOT NULL,
  `jml` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tingkat`
--

CREATE TABLE `tingkat` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tingkat`
--

INSERT INTO `tingkat` (`id_level`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Operator'),
(4, 'Proktor');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_order` int(5) NOT NULL,
  `tanggal` date NOT NULL,
  `total_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_order`, `tanggal`, `total_bayar`) VALUES
(1, 1, 1, '2019-02-11', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `id_level` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `id_level`) VALUES
(1, 'root', '1', 'Raihan Alwi', 1),
(2, 'admin', 'admin', 'alwi', 1),
(3, 'Proktor1', '1', 'Budi', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id_detail_order`);

--
-- Indexes for table `masakan`
--
ALTER TABLE `masakan`
  ADD PRIMARY KEY (`id_masakan`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `temp_transaksi`
--
ALTER TABLE `temp_transaksi`
  ADD PRIMARY KEY (`id_temp`);

--
-- Indexes for table `tingkat`
--
ALTER TABLE `tingkat`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id_detail_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `masakan`
--
ALTER TABLE `masakan`
  MODIFY `id_masakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `temp_transaksi`
--
ALTER TABLE `temp_transaksi`
  MODIFY `id_temp` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tingkat`
--
ALTER TABLE `tingkat`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
