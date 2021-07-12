-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2021 at 07:06 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `servis`
--

-- --------------------------------------------------------

--
-- Table structure for table `jasa`
--

CREATE TABLE `jasa` (
  `no` int(10) NOT NULL,
  `kd_jasa` varchar(15) NOT NULL,
  `kerusakan` varchar(100) NOT NULL,
  `harga` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jasa`
--

INSERT INTO `jasa` (`no`, `kd_jasa`, `kerusakan`, `harga`) VALUES
(1, 'KJ001', 'Ganti LCD9', 350000),
(2, 'KJ002', 'Stuck Windows', 150000),
(3, 'KJ003', 'Blue screen', 200000),
(5, 'KJ004', 'Mati Total', 250000);

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE `konsumen` (
  `id_konsumen` int(10) NOT NULL,
  `kd_konsumen` varchar(10) NOT NULL,
  `nm_konsumen` varchar(100) NOT NULL,
  `telepon` varchar(16) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`id_konsumen`, `kd_konsumen`, `nm_konsumen`, `telepon`, `alamat`) VALUES
(1, 'KS001', 'Livio Tri Gieraldo', '0982312312', 'Ujung Aspal'),
(2, 'KS002', 'Bpk Rafli', '02199999', 'Jatiasih\r\n'),
(11, 'KS003', 'ALDOW', '021989898', 'jatimurni'),
(13, 'KS007', 'DO', '089738383', 'asda');

-- --------------------------------------------------------

--
-- Table structure for table `servis_detail`
--

CREATE TABLE `servis_detail` (
  `servisdetail_id` int(11) NOT NULL,
  `no_servis` int(11) NOT NULL,
  `id_jasa` char(5) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_ambil` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `servis_detail`
--

INSERT INTO `servis_detail` (`servisdetail_id`, `no_servis`, `id_jasa`, `jumlah`, `tgl_ambil`) VALUES
(16, 8, 'KJ004', 250000, '0000-00-00'),
(17, 8, 'KJ003', 200000, '0000-00-00'),
(18, 9, 'KJ004', 250000, '0000-00-00'),
(19, 9, 'KJ003', 200000, '0000-00-00'),
(20, 10, 'KJ004', 250000, '0000-00-00'),
(21, 10, 'KJ003', 200000, '0000-00-00'),
(22, 11, 'KJ004', 250000, '0000-00-00'),
(23, 11, 'KJ003', 200000, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `servis_header`
--

CREATE TABLE `servis_header` (
  `no_servis` int(45) NOT NULL,
  `nm_teknisi` varchar(50) NOT NULL,
  `nm_konsumen` varchar(50) NOT NULL,
  `nm_barang` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(15) NOT NULL,
  `qty` int(11) NOT NULL,
  `tgl_terima` date NOT NULL,
  `tgl_ambil` date DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `servis_header`
--

INSERT INTO `servis_header` (`no_servis`, `nm_teknisi`, `nm_konsumen`, `nm_barang`, `alamat`, `telp`, `qty`, `tgl_terima`, `tgl_ambil`, `harga`, `status`) VALUES
(8, '0', 'Livio Tri Gieraldo', 'Lenovo', 'Bekasi', '08127318', 2, '2021-05-18', '2021-05-18', 0, 'Y'),
(9, '0', 'Livio Tri Gieraldo', 'ASUS', 'Depok', '081273', 1, '2021-05-18', '2021-05-18', 0, 'Y'),
(10, '0', 'DO', 'TES', 'JAkarta', '012837', 2, '2021-05-18', NULL, 450000, 'N'),
(11, 'Bpk Bambang', 'ALDOW', 'ACER', 'Bekasi', '0128371', 2, '2021-05-19', '2021-05-19', 450000, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `teknisi`
--

CREATE TABLE `teknisi` (
  `no` int(10) NOT NULL,
  `kd_teknisi` varchar(20) NOT NULL,
  `nm_teknisi` varchar(100) NOT NULL,
  `telepon` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teknisi`
--

INSERT INTO `teknisi` (`no`, `kd_teknisi`, `nm_teknisi`, `telepon`) VALUES
(1, 'KT001', 'Bpk Bambang', '9629292'),
(2, 'KT002', 'Aldoe', '2134343'),
(4, 'KT003', 'Livio Tri Gieraldo', '0987654321');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Admin','Teknisi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`) VALUES
(5, 'Livio Tri Gieraldo', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(6, 'Aldoee', 'teknisi', 'e21394aaeee10f917f581054d24b031f', 'Teknisi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`id_konsumen`);

--
-- Indexes for table `servis_detail`
--
ALTER TABLE `servis_detail`
  ADD PRIMARY KEY (`servisdetail_id`);

--
-- Indexes for table `servis_header`
--
ALTER TABLE `servis_header`
  ADD PRIMARY KEY (`no_servis`);

--
-- Indexes for table `teknisi`
--
ALTER TABLE `teknisi`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jasa`
--
ALTER TABLE `jasa`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id_konsumen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `servis_detail`
--
ALTER TABLE `servis_detail`
  MODIFY `servisdetail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `servis_header`
--
ALTER TABLE `servis_header`
  MODIFY `no_servis` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teknisi`
--
ALTER TABLE `teknisi`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
