-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 05, 2020 at 05:43 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admint`
--

DROP TABLE IF EXISTS `admint`;
CREATE TABLE IF NOT EXISTS `admint` (
  `admin` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admint`
--

INSERT INTO `admint` (`admin`, `password`) VALUES
('', 'abf8412b7c606f8acd8b58968e9b4733'),
('uoc', 'abf8412b7c606f8acd8b58968e9b4733');

-- --------------------------------------------------------

--
-- Table structure for table `uinfo`
--

DROP TABLE IF EXISTS `uinfo`;
CREATE TABLE IF NOT EXISTS `uinfo` (
  `regno` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(60) NOT NULL,
  `lname` varchar(60) NOT NULL,
  `gen` varchar(10) NOT NULL,
  `email` varchar(60) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(1000) NOT NULL,
  PRIMARY KEY (`regno`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uinfo`
--

INSERT INTO `uinfo` (`regno`, `fname`, `lname`, `gen`, `email`, `username`, `password`) VALUES
(2, 'Pasindu', 'Maduranga1', 'Male', 'ywpmaduranga97@gmail.com', 'pasindu', 'b1b9b6bbb3a176dde42602fa155c1b7c');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
