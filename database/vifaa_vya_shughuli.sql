-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 06, 2021 at 02:06 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vifaa_vya_shughuli`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad_log`
--

CREATE TABLE `ad_log` (
  `id` int(11) NOT NULL,
  `aname` varchar(20) DEFAULT NULL,
  `apwd` varchar(50) DEFAULT NULL,
  `secques` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ad_log`
--

INSERT INTO `ad_log` (`id`, `aname`, `apwd`, `secques`) VALUES
(1, 'admin', 'admin', 'programming');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Cello'),
(2, 'Simba'),
(3, 'Lodhia'),
(4, 'Jambo'),
(5, 'Plasco'),
(6, 'Motisun'),
(7, 'Silafrica');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_title` varchar(200) NOT NULL,
  `product_image` varchar(200) NOT NULL,
  `qty` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `total_amt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Meza'),
(2, 'Viti'),
(3, 'Vyombo'),
(4, 'Mapambo'),
(5, 'Turubai');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(152, 5, 7, 'Turubai Nyumba', 5000, 'Rangi nyeupe\r\nNafasi kubwa ya mpaka watu watano\r\nMwanga wa kutosha', '3m-lightweight-canvas-bell-tent-sandstone-p1423-10164_image.jpg', 'turubai nyumba camp picnic likizo'),
(153, 5, 3, 'Turubai Wazi', 4000, 'Rangi ya kijani\r\nnafasi kubwa mpaka watu ishirini', 'shade-01.jpg', 'turubai nyumba camp picnic likizo'),
(154, 1, 1, 'Senator Meza', 1500, 'Imara', 'cello senator table.png', 'meza cello nyekundu'),
(155, 2, 2, 'Kiti Imara', 1200, 'Miguu ya chuma', 'Xylo-600x650.jpg', 'cello plastiki kijani'),
(156, 2, 1, 'KIti Fahari', 1500, 'Kina mto', 'cushioned-fix-type-chair-500x500.png', 'kiti cello fahari'),
(157, 5, 6, 'Turubai Simple', 5000, 'Rangi ya blue\r\nImara ', '61knKOx6y9L._AC_SX466_.jpg', 'turubai nyumba camp picnic likizo'),
(158, 1, 1, 'Meza Ndefu', 4500, 'Nyekundu\r\nNdefu', 'cello-eden-dining-table-500x500.png', 'meza cello nyekundu'),
(159, 3, 4, 'Chombo Mtori', 4000, 'Imara\r\nHaipati kutu', 'equipment-chafing-dish-rectangle-roll-top-stainless-steel.jpg', 'Chafing dish vyombo chombo sufuria'),
(160, 4, 7, 'Mapambo', 20000, 'Rangi ya dhahabu', 'mapambo2.JPG', 'maua mapambo sherehe ukumbi'),
(161, 3, 1, 'Chombo Supu', 4500, 'Hakipati kutu\r\nChakula cha moto', 'PU2638FS008FRO_260326_2018-05-25_12-25-03.jpeg', 'vyombo sahani sufuria'),
(162, 2, 7, 'Kiti VIP', 4000, 'Kiti simple', 'pari-500x500.png', 'Kiti nyekundu mto vip sherehe'),
(163, 1, 4, 'Senator Meza', 1500, 'Imara sana', 'wynell-plastic-dining-table.jpg', 'meza cello kijani');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(3, 'Zuwena', 'Hamoud', 'zuwena@gmail.com', '98fde98d7a4936a5cffe1e72514ebade', '0772769499', 'Makumbusho', 'Mwenge');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad_log`
--
ALTER TABLE `ad_log`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `aname` (`aname`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ad_log`
--
ALTER TABLE `ad_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
