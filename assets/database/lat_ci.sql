-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2017 at 09:13 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lat_ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblteman`
--

CREATE TABLE `tblteman` (
  `noteman` int(11) NOT NULL COMMENT 'No teman',
  `namateman` varchar(50) DEFAULT NULL COMMENT 'Nama Teman',
  `notelp` varchar(15) DEFAULT NULL COMMENT 'No Telp',
  `email` varchar(30) DEFAULT NULL COMMENT 'Email'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table Daftar Teman';

--
-- Dumping data for table `tblteman`
--

INSERT INTO `tblteman` (`noteman`, `namateman`, `notelp`, `email`) VALUES
(1, 'Ilham', '0856122211', 'ilham@yahoo.com'),
(2, 'Sulton Tegal', '0857122233', 'sulton@webgis.com'),
(3, 'Rathomi', '085666666', 'thomi@gmail.com'),
(4, 'Unieee', '081333333', 'unie@webgis.com'),
(5, 'Parjoko', '081222788', 'parjoko@yahoo.com'),
(6, 'Wardoyo', '081888887', 'doyo@webgis.com'),
(7, 'Indra Arianggi', '085641014662', 'indraatmadja71@gmail.com'),
(8, 'Imran Suryaatmaja', '087653920992', 'imrannasa@gmail.com'),
(9, 'Esa Kurnia', '087362893872', 'esakurnia@gmail.com'),
(10, 'Nur Azizah', '087683928761', 'azizahnur@gmail.com'),
(11, 'Bayu Tri', '087293874292', 'bayu3@gmail.com'),
(12, 'Ryan Ragil', '089287384761', 'Ryanrgl@gmail.com'),
(13, 'Candra Kusuma', '086273717281', 'candrak@gmail.com'),
(14, 'Tata Yulita', '087283726371', 'tatayulita@gmail.com'),
(15, 'Valandro', '087261726532', 'valandro@gmail.com'),
(16, 'Firdaus Sigma', '086736251662', 'diasigma@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblteman`
--
ALTER TABLE `tblteman`
  ADD PRIMARY KEY (`noteman`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
