-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2019 at 02:57 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sthcab`
--

-- --------------------------------------------------------

--
-- Table structure for table `indivdual`
--

CREATE TABLE `indivdual` (
  `individual_id` varchar(16) NOT NULL,
  `individual_title` text NOT NULL,
  `individual_fullname` text NOT NULL,
  `individual_country` text NOT NULL,
  `individual_state` text NOT NULL,
  `individual_lga` text NOT NULL,
  `individual_dob` varchar(19) NOT NULL,
  `individual_gender` text NOT NULL,
  `individual_address` varchar(200) NOT NULL,
  `individual_city` text NOT NULL,
  `individual_phone` int(11) NOT NULL,
  `individual_email` varchar(200) NOT NULL,
  `individual_password` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
