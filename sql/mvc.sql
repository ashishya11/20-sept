-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2018 at 09:07 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_img` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '1-Active,0-InActive',
  `delete_status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '1-Deleted,0-NotDeleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand_name`, `brand_img`, `created_by`, `created_on`, `modified_by`, `modified_on`, `status`, `delete_status`) VALUES
(1, 'addias', 'addidas.jpeg', 1, '2018-09-27 10:03:49', 2, '2018-09-28 03:21:11', '1', '0'),
(2, 'nike', 'nike.jpg', 1, '2018-09-27 10:05:24', 0, '0000-00-00 00:00:00', '1', '0'),
(3, 'apple', 'apple.png', 1, '2018-09-27 10:06:03', 0, '0000-00-00 00:00:00', '1', '0'),
(4, 'hotWheels', 'Hot-Wheels-Logo.jpg', 1, '2018-09-27 10:06:18', 2, '2018-09-28 03:11:56', '1', '0'),
(5, 'samsung', 'samsung-logo.jpeg', 1, '2018-09-27 10:06:46', 0, '0000-00-00 00:00:00', '1', '0'),
(6, 'books', 'book.png', 1, '2018-09-27 10:07:00', 0, '0000-00-00 00:00:00', '1', '0'),
(13, 'aaaa', '1538057152.jpg', 1, '2018-09-27 14:05:51', 0, '0000-00-00 00:00:00', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1' COMMENT '1-Active,0-InActive',
  `delete_status` enum('1','0') NOT NULL DEFAULT '0' COMMENT '1-Deleted,0-NotDeleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `created_on`, `created_by`, `modified_on`, `modified_by`, `status`, `delete_status`) VALUES
(1, 'stationary', '2018-09-26 11:50:06', 1, '2018-09-28 03:20:53', 2, '1', '0'),
(2, 'toy', '2018-09-26 11:50:28', 1, '2018-09-28 03:20:55', 2, '1', '0'),
(3, 'vehicles', '2018-09-26 11:51:24', 1, '2018-09-28 03:20:56', 2, '1', '0'),
(4, 'electronics', '2018-09-26 11:51:42', 1, '2018-09-28 03:20:58', 2, '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('1','0') NOT NULL DEFAULT '1' COMMENT '1-Active,0-InActive',
  `delete_status` enum('1','0') NOT NULL DEFAULT '0' COMMENT '1-Deleted,0-NotDeleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_name` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '1-Active,0-InActive',
  `delete_status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '1-Deleted,0-NotDeleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `category_id`, `sub_category_name`, `created_by`, `created_on`, `modified_by`, `modified_on`, `status`, `delete_status`) VALUES
(1, 1, 'book', 1, '2018-09-26 11:53:04', 2, '2018-09-28 03:30:23', '1', '1'),
(2, 1, 'pen', 1, '2018-09-26 11:53:14', 2, '2018-09-28 03:30:24', '1', '0'),
(3, 1, 'paper', 1, '2018-09-26 11:53:26', 0, '0000-00-00 00:00:00', '1', '0'),
(4, 2, 'car', 1, '2018-09-26 11:53:33', 2, '2018-09-26 10:14:07', '1', '0'),
(5, 2, 'bikes', 1, '2018-09-26 11:53:41', 0, '0000-00-00 00:00:00', '1', '0'),
(6, 2, 'dolls', 1, '2018-09-26 11:53:58', 0, '0000-00-00 00:00:00', '1', '0'),
(7, 3, 'cars', 1, '2018-09-26 11:54:10', 2, '2018-09-26 10:14:35', '1', '0'),
(8, 3, 'sedan', 1, '2018-09-26 11:54:19', 0, '0000-00-00 00:00:00', '1', '0'),
(9, 4, 'mobiles', 1, '2018-09-26 11:54:32', 0, '0000-00-00 00:00:00', '1', '0'),
(10, 4, 'laptops', 1, '2018-09-26 11:54:41', 0, '0000-00-00 00:00:00', '1', '0'),
(11, 4, 'kitchen item', 1, '2018-09-26 11:55:13', 0, '0000-00-00 00:00:00', '1', '0'),
(12, 4, 'led', 1, '2018-09-26 11:55:45', 0, '0000-00-00 00:00:00', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `passcode`) VALUES
(1, 'Ashish Kumar Singh', 'ashishk@qexon.com', 'Ashishya@11'),
(2, 'Testo Test', 'hi.testotest11@gmail.com', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
