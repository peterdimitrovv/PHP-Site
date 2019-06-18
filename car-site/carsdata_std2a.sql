-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 21, 2019 at 03:46 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carsdata_std2a`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cars`
--

DROP TABLE IF EXISTS `tbl_cars`;
CREATE TABLE IF NOT EXISTS `tbl_cars` (
  `id_car` int(10) NOT NULL AUTO_INCREMENT,
  `id_make` int(10) NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `moreinfo` text NOT NULL,
  `picture` varchar(15) NOT NULL,
  PRIMARY KEY (`id_car`),
  KEY `id_make` (`id_make`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cars`
--

INSERT INTO `tbl_cars` (`id_car`, `id_make`, `price`, `moreinfo`, `picture`) VALUES
(1, 1, 2800, 'Инфо...', ''),
(2, 2, 280000, 'Инфо....', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_makes`
--

DROP TABLE IF EXISTS `tbl_makes`;
CREATE TABLE IF NOT EXISTS `tbl_makes` (
  `id_make` int(10) NOT NULL AUTO_INCREMENT,
  `make` varchar(15) NOT NULL,
  PRIMARY KEY (`id_make`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_makes`
--

INSERT INTO `tbl_makes` (`id_make`, `make`) VALUES
(1, 'Трабант'),
(2, 'Мерцедес');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `passwd` varchar(15) NOT NULL,
  `usertype` tinyint(4) NOT NULL,
  `personname` varchar(15) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `username`, `passwd`, `usertype`, `personname`) VALUES
(1, 'admin', 'admin', 1, 'Администратор');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_cars`
--
ALTER TABLE `tbl_cars`
  ADD CONSTRAINT `tbl_cars_ibfk_1` FOREIGN KEY (`id_make`) REFERENCES `tbl_makes` (`id_make`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
