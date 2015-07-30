-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2015 at 04:05 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crtv_keuangan`
--
CREATE DATABASE IF NOT EXISTS `crtv_keuangan` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `crtv_keuangan`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kas`
--

CREATE TABLE IF NOT EXISTS `tbl_kas` (
  `no_bukit` int(5) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `id_perkiraan` int(5) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `jumlah` int(9) NOT NULL,
  PRIMARY KEY (`no_bukit`),
  KEY `id_perkiraan` (`id_perkiraan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_perkiraan`
--

CREATE TABLE IF NOT EXISTS `tbl_perkiraan` (
  `id_perkiraan` int(5) NOT NULL AUTO_INCREMENT,
  `kode_perkiraan` varchar(8) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_perkiraan`),
  UNIQUE KEY `kode_perkiraan` (`kode_perkiraan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_user` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` varchar(1) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_kas`
--
ALTER TABLE `tbl_kas`
  ADD CONSTRAINT `tbl_kas_ibfk_1` FOREIGN KEY (`id_perkiraan`) REFERENCES `tbl_perkiraan` (`id_perkiraan`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
