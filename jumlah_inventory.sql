-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2021 at 05:54 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `jumlah_inventory`
--

CREATE TABLE `jumlah_inventory` (
  `id` int(20) NOT NULL,
  `kode_rfid` int(20) NOT NULL,
  `nama_aset` varchar(50) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `tempat` varchar(20) NOT NULL,
  `terpakai` int(20) NOT NULL,
  `tersedia` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jumlah_inventory`
--

INSERT INTO `jumlah_inventory` (`id`, `kode_rfid`, `nama_aset`, `jumlah`, `tempat`, `terpakai`, `tersedia`) VALUES
(1, 741852963, 'Stetoskop', 1, 'Rak Atas ', 2, 20),
(2, 852963741, 'Sepatu ', 3, 'Rak Bawah ', 2, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jumlah_inventory`
--
ALTER TABLE `jumlah_inventory`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
