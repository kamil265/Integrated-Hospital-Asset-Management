-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2021 at 05:53 AM
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
-- Table structure for table `view_peminjaman`
--

CREATE TABLE `view_peminjaman` (
  `nama_karyawan` varchar(50) NOT NULL,
  `kode_rfid` varchar(20) NOT NULL,
  `nama_aset` varchar(20) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `tgl_pinjam` datetime NOT NULL,
  `status` varchar(20) NOT NULL,
  `id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `view_peminjaman`
--

INSERT INTO `view_peminjaman` (`nama_karyawan`, `kode_rfid`, `nama_aset`, `kategori`, `tgl_pinjam`, `status`, `id`) VALUES
('diaaaaaa', '741852963', 'Stetoskop ', '2', '2021-11-26 12:00:00', 'Sudah Dikembalikan ', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `view_peminjaman`
--
ALTER TABLE `view_peminjaman`
  ADD PRIMARY KEY (`nama_karyawan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
