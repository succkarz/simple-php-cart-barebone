-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 29, 2018 at 08:14 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date_added` date NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `titleIndex` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `description`, `date_added`, `image`) VALUES
(9, 'iPhone X', '999.00', 'The latest new iPhone X.', '2018-09-15', 'iphonex.png'),
(10, 'iPad', '1270.00', 'The new iPad Pro', '2018-09-15', 'ipadpro.png'),
(11, 'iMac', '6000.00', 'A desktop experience that draws you in and keeps you there.', '2018-09-15', 'imac.png'),
(12, 'Pixel 2 XL', '899.00', 'Pixel 2 XL provides a clean, bloat-free experience with no unwanted apps, one of the highest rated smartphone cameras', '2018-09-17', 'pixel2xl.png'),
(33, 'One Plus 6', '699.00', 'Fast and Smooth, Get the The Speed You Need with OnePlus 6', '2018-09-18', '1537265357-oneplus_6_64gb_mirror_black_header.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
