-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2020 at 03:09 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurants`
--

-- --------------------------------------------------------

--
-- Table structure for table `cur_order`
--

CREATE TABLE `cur_order` (
  `id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `restaurant` varchar(255) NOT NULL,
  `nvorv` varchar(255) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cur_order`
--

INSERT INTO `cur_order` (`id`, `item`, `restaurant`, `nvorv`, `customer`, `price`) VALUES
(26, 'Parotta', 'hot chips', 'V', 'gayaprashad', 80),
(27, 'Dosa', 'saravana bhavan', 'V', 'gayaprashad', 100),
(28, 'Mutton Khema', 'hot chips', 'NV', 'gayaprashad', 150),
(29, 'Mutton Khema', 'hot chips', 'NV', 'indira', 150),
(30, 'chichen biriyani', 'bowl company', 'NV', 'gayaprashad', 250);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phoneno` bigint(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nvorv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `phoneno`, `password`, `nvorv`) VALUES
(14, 'Gayaprashad', 'RAB- 711 , Purva Fountain', 9911223377, 'gayapwd', 'NV'),
(15, 'Sangeetha', 'No.10, shanthi colony, Anna nagar', 9455124411, 'sangeepwd', 'V'),
(16, 'indira', '711', 9892309002, '4evr', 'NV');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `nvorv` varchar(255) NOT NULL,
  `restaurant` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `item`, `nvorv`, `restaurant`, `price`) VALUES
(7, 'Idle', 'V', 'saravana bhavan', 60),
(8, 'Dosa', 'V', 'saravana bhavan', 100),
(9, 'Poori', 'V', 'saravana bhavan', 69),
(10, 'Parotta', 'V', 'hot chips', 80),
(11, 'Chicken 65', 'NV', 'hot chips', 90),
(12, 'Mutton Khema', 'NV', 'hot chips', 150),
(13, 'chichen biriyani', 'NV', 'bowl company', 250);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Address` text NOT NULL,
  `phoneno` bigint(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `Name`, `Address`, `phoneno`, `password`) VALUES
(6, 'Saravana bhavan', 'No.20,Anna nagar west', 9577001278, 'saravanapwd'),
(7, 'Hot Chips', '677, Anna salai', 8867121276, 'hotchipspwd'),
(9, 'bowl company', 'marathahalli', 9223372036, 'pwd');

-- --------------------------------------------------------

--
-- Table structure for table `temp_order`
--

CREATE TABLE `temp_order` (
  `id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `restaurant` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `nvorv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cur_order`
--
ALTER TABLE `cur_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_order`
--
ALTER TABLE `temp_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cur_order`
--
ALTER TABLE `cur_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `temp_order`
--
ALTER TABLE `temp_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
