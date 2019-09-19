-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2018 at 04:58 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unit`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_unit`
--

CREATE TABLE `tabel_unit` (
  `id_unit` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `shift` enum('Pagi','Malam') NOT NULL,
  `waktu_awal` varchar(100) NOT NULL,
  `waktu_akhir` varchar(100) NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `unit` enum('AMC','PKPPK','AVSEC') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_unit`
--

INSERT INTO `tabel_unit` (`id_unit`, `tanggal`, `shift`, `waktu_awal`, `waktu_akhir`, `kegiatan`, `unit`) VALUES
(4, '2018-08-25', 'Pagi', '12:00', '', 'test', 'PKPPK'),
(9, '2018-08-25', 'Pagi', '12:00', '', 'abcd', 'AVSEC'),
(10, '2018-08-26', 'Malam', '18:20', '20:00', 'qwq', 'AMC'),
(11, '2018-08-26', 'Malam', '20:12', '21:00', 'dasda', 'PKPPK'),
(12, '2018-08-28', 'Pagi', '12:00', '14:00', 'ewqeq', 'AVSEC'),
(13, '2018-08-28', 'Pagi', '12:00', '12:30', 'asd', 'AMC'),
(14, '2018-08-29', 'Pagi', '12:00', '14:00', 'dasdas', 'AVSEC'),
(15, '2018-08-29', 'Pagi', '10:00', '12:00', 'sadasdas', 'PKPPK'),
(16, '2018-01-29', 'Pagi', '08:00', '10:00', '2121', 'AMC'),
(17, '2018-08-29', 'Malam', '17:13', '21:15', 'ewqeqw', 'PKPPK'),
(18, '2018-08-30', 'Pagi', '10:12', '15:12', 'asd', 'AMC'),
(19, '2018-08-30', 'Pagi', '12:00', '', 'asas', 'AMC'),
(20, '2018-08-30', 'Pagi', '12:00', '', 'sas', 'AMC'),
(21, '2018-08-30', 'Pagi', '18:30', '', 'sdad', 'AMC'),
(22, '2018-08-29', 'Pagi', '13:19', '', 'as', 'AMC');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Admin','AMC','PKPPK','AVSEC') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(2, 'Andi', 'amc', '3654b34017508a963ccce2426e91e4cd', 'AMC'),
(3, 'Tono', 'pkppk', '14bd03d5c054c381a481d0b3dbe6dcff', 'PKPPK'),
(5, 'Amir', 'avsec', 'a73b3a47c2b8a2cc9cf2bf8c7db4e62b', 'AVSEC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_unit`
--
ALTER TABLE `tabel_unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_unit`
--
ALTER TABLE `tabel_unit`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
