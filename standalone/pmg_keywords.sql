-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2016 at 01:58 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `progressive-media`
--

-- --------------------------------------------------------

--
-- Table structure for table `pmg_keywords`
--

CREATE TABLE IF NOT EXISTS `pmg_keywords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `A` varchar(32) NOT NULL,
  `B` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `pmg_keywords`
--

INSERT INTO `pmg_keywords` (`id`, `A`, `B`) VALUES
(1, 'random', 'exact'),
(2, 'happy', 'sad'),
(3, 'young', 'mature'),
(4, 'fast', 'slow'),
(5, 'colour', 'dull'),
(6, 'football', 'basketball'),
(7, 'ugly', 'beautiful'),
(8, 'sweet', 'sour'),
(9, 'sharp', 'blunt'),
(10, 'loud', 'quiet');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
