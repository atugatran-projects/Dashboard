-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 11, 2023 at 07:48 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;

--
-- Database: `ebalafpv_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `customerId` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `customerType` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `salutation` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `firstName` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `lastName` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `customerPhone` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `customerEmail` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `companyName` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `Website` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `Creation_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Modified_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`customerId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerId`, `user_id`, `customerType`, `salutation`, `firstName`, `lastName`, `customerPhone`, `customerEmail`, `companyName`, `Website`, `Creation_Date`, `Modified_Date`) VALUES
(1, 1, 'Business', 'Ms.', 'Bogota', 'Bogota', '62356', 'atul22g2468@gmail.com', 'mws', 'zxc', '2023-06-10 03:51:27', '2023-06-10 07:48:32'),
(2, 2, 'Business', 'Salutation', 'Atul', 'Goyal', '1234', 'atul22g22468@gmail.com', 'mws', 'atul', '2023-06-10 04:00:52', '2023-06-10 04:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
CREATE TABLE IF NOT EXISTS `invoices` (
  `invoice_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `customerName` varchar(255) NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `orderNumber` varchar(255) NOT NULL,
  `InvoiceDate` date NOT NULL,
  `Terms` varchar(255) NOT NULL,
  `expireyDate` date NOT NULL,
  `salesperson` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `subTotal` varchar(255) NOT NULL,
  `Discount` varchar(255) NOT NULL,
  `discount2` varchar(255) NOT NULL,
  `Adjustment` varchar(255) NOT NULL,
  `TCS` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `termsAndConditions` varchar(255) NOT NULL,
  `items` json NOT NULL,
  `creation_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `files` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`invoice_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`invoice_id`, `user_id`, `customerName`, `invoice`, `orderNumber`, `InvoiceDate`, `Terms`, `expireyDate`, `salesperson`, `subject`, `subTotal`, `Discount`, `discount2`, `Adjustment`, `TCS`, `total`, `termsAndConditions`, `items`, `creation_Date`, `files`) VALUES
(1, 1, 'Bogota Bogota', '101', '101', '2023-06-30', 'NET 30', '2023-06-29', '2', 'subject223', '2908795', '201', '%', '301', 'hardware tax', '2908795', 'tcs224', '{\"qty\": [\"23\", \"3343\", \"4235\"], \"name\": [\"pc\", \"pc2\", \"laptop\"], \"rate\": [\"123\", \"322\", \"432\"], \"unit\": [\"box\", \"box\", \"box\"], \"amount\": [\"2829.00\", \"1076446.00\", \"1829520.00\"]}', '2023-06-11 11:23:48', '');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `itemId` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `type` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `unit` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `sellingPrice` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `description` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `qty` int NOT NULL,
  `amount` int NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modification_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`itemId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemId`, `user_id`, `type`, `name`, `unit`, `sellingPrice`, `description`, `qty`, `amount`, `creation_date`, `modification_date`) VALUES
(1, 1, 'Good', 'pc', 'box', '123', 'zxc', 1, 0, '2023-06-10 05:49:15', '2023-06-10 05:49:15'),
(2, 1, 'Good', 'pc2', 'box', '322', 'qaz', 1, 0, '2023-06-10 05:49:26', '2023-06-10 05:49:26'),
(3, 1, 'Good', 'laptop', 'box', '432', 'asd', 1, 0, '2023-06-10 05:49:33', '2023-06-10 05:49:33');

-- --------------------------------------------------------

--
-- Table structure for table `quote`
--

DROP TABLE IF EXISTS `quote`;
CREATE TABLE IF NOT EXISTS `quote` (
  `quote_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `customerName` varchar(255) NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `orderNumber` varchar(255) NOT NULL,
  `quoteDate` date NOT NULL,
  `expireyDate` date NOT NULL,
  `salesperson` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `subTotal` varchar(255) NOT NULL,
  `Discount` varchar(255) NOT NULL,
  `discount2` varchar(255) NOT NULL,
  `Adjustment` varchar(255) NOT NULL,
  `TCS` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `termsAndConditions` varchar(255) NOT NULL,
  `items` json NOT NULL,
  `creation_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `files` varchar(255) NOT NULL,
  PRIMARY KEY (`quote_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `sno` int NOT NULL AUTO_INCREMENT,
  `userName` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `country` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `role` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `userName`, `email`, `country`, `password`, `role`, `register_date`) VALUES
(1, 'admin', 'admin@gmaill.com', 'India', '$2y$10$GSyJRzk89J9NrCmql2HqnOrB8b.DaLo/oJLJJjxFCFWJpII5DKetW', 'customers', '2023-06-09 11:06:46'),
(2, 'Atul', 'atul@gmail.com', 'India', '$2y$10$oWMHoZ1kWxBjSZAN19NmDu7E0Qbv8bDZVUHmp8KRsGRxCEltvNs76', 'customers', '2023-06-09 11:17:56');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
