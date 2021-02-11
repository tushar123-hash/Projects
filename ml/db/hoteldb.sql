-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2021 at 02:30 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hoteldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookedtable`
--

CREATE TABLE IF NOT EXISTS `bookedtable` (
`table_ID` int(6) NOT NULL,
  `book_date_time` datetime NOT NULL,
  `customer_userID` int(6) DEFAULT NULL,
  `verified` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nop` int(2) NOT NULL,
  `regis_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE IF NOT EXISTS `holidays` (
`id` int(2) NOT NULL,
  `reason` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datefrom` date NOT NULL,
  `dateto` date NOT NULL,
  `tablebooking` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL,
  `roombooking` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullhotel` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`Item_ID` int(5) NOT NULL,
  `i_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(2) NOT NULL,
  `price` int(5) NOT NULL,
  `category` enum('dinner','lunch','starter','sweets','special') COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_type` enum('veg','nveg') COLLATE utf8mb4_unicode_ci NOT NULL,
  `avail_stat` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Item_ID`, `i_name`, `qty`, `price`, `category`, `f_type`, `avail_stat`, `update_date`) VALUES
(1, 'Parisian Hamburger', 5, 20, 'dinner', 'veg', 'yes', '2021-01-29 18:12:05'),
(2, 'Minced meat steak', 5, 22, 'dinner', 'veg', 'yes', '2021-01-29 18:16:38'),
(3, 'Lagune Platte', 5, 16, 'lunch', 'veg', 'yes', '2021-01-30 00:55:48'),
(4, 'Breaded fish', 5, 24, 'lunch', 'veg', 'yes', '2021-01-30 01:57:26'),
(5, 'Roasted steak rollade', 5, 30, 'starter', 'veg', 'yes', '2021-01-30 02:01:06'),
(6, 'Pancakes', 5, 10, 'sweets', 'veg', 'yes', '2021-01-30 02:03:27'),
(7, 'Warm apple pie', 5, 26, 'sweets', 'veg', 'yes', '2021-01-30 02:04:08'),
(8, 'Seasonal soup', 5, 15, 'special', 'veg', 'yes', '2021-01-30 02:05:08');

-- --------------------------------------------------------

--
-- Table structure for table `roomavail`
--

CREATE TABLE IF NOT EXISTS `roomavail` (
`room_id` int(2) NOT NULL,
  `singlecapacity` int(3) NOT NULL,
  `doublecapacity` int(6) NOT NULL,
  `triplecapacity` int(9) NOT NULL,
  `singleqty` int(2) NOT NULL,
  `doubleqty` int(2) NOT NULL,
  `tripleqty` int(2) NOT NULL,
  `single_price` int(6) NOT NULL DEFAULT '1000',
  `double_price` int(6) NOT NULL DEFAULT '1500',
  `triple_price` int(6) NOT NULL DEFAULT '2200',
  `min_date` date NOT NULL,
  `max_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roomavail`
--

INSERT INTO `roomavail` (`room_id`, `singlecapacity`, `doublecapacity`, `triplecapacity`, `singleqty`, `doubleqty`, `tripleqty`, `single_price`, `double_price`, `triple_price`, `min_date`, `max_date`) VALUES
(1, 3, 6, 9, 6, 4, 4, 1000, 1500, 2200, '2021-01-29', '2021-02-10');

-- --------------------------------------------------------

--
-- Table structure for table `roombooked`
--

CREATE TABLE IF NOT EXISTS `roombooked` (
`room_id` int(6) NOT NULL,
  `customer_userid` int(6) DEFAULT NULL,
  `check_in` date DEFAULT NULL,
  `check_out` date DEFAULT NULL,
  `num_of_pr` int(2) DEFAULT NULL,
  `num_of_r` int(2) NOT NULL,
  `children` char(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `meal` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified` char(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `regis_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tableavail`
--

CREATE TABLE IF NOT EXISTS `tableavail` (
`table_num` mediumint(2) unsigned NOT NULL,
  `avail_date_time` datetime NOT NULL,
  `table_status` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tableavail`
--

INSERT INTO `tableavail` (`table_num`, `avail_date_time`, `table_status`) VALUES
(1, '2021-01-29 12:00:00', 'yes'),
(2, '2021-01-29 15:00:00', 'yes'),
(3, '2021-01-30 13:00:00', 'yes'),
(4, '2021-01-30 16:00:00', 'yes'),
(5, '2021-01-31 15:00:00', 'yes'),
(6, '2021-01-31 17:00:00', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`userid` int(6) NOT NULL,
  `first_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` char(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_level` int(1) NOT NULL DEFAULT '0',
  `registration_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `first_name`, `last_name`, `email`, `password`, `user_level`, `registration_date`) VALUES
(1, 'a', 'b', 'a@a.a', '$2y$10$3arf86Inls1F2gM4JhjvS.Z6FZsy4O.abmQkgQ3dUHR9LxxLL4I/u', 0, '2021-01-25 06:23:47'),
(2, 'u', 'u', 'v@v.v', '$2y$10$AlCDIM6nkYifrSPe0bdAie3Z.5WQ.92X6vyPM0SpQXDD2z4u8MMCK', 0, '2021-01-29 17:20:50');

-- --------------------------------------------------------

--
-- Table structure for table `verify`
--

CREATE TABLE IF NOT EXISTS `verify` (
`v_id` int(2) NOT NULL,
  `code` int(6) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `verify`
--

INSERT INTO `verify` (`v_id`, `code`, `time_stamp`) VALUES
(1, 519449, '2021-01-30 21:30:39'),
(2, 519019, '2021-01-31 01:44:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookedtable`
--
ALTER TABLE `bookedtable`
 ADD PRIMARY KEY (`table_ID`), ADD KEY `customer_userID` (`customer_userID`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`Item_ID`);

--
-- Indexes for table `roomavail`
--
ALTER TABLE `roomavail`
 ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `roombooked`
--
ALTER TABLE `roombooked`
 ADD PRIMARY KEY (`room_id`), ADD KEY `customer_userid` (`customer_userid`);

--
-- Indexes for table `tableavail`
--
ALTER TABLE `tableavail`
 ADD PRIMARY KEY (`table_num`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`userid`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `verify`
--
ALTER TABLE `verify`
 ADD PRIMARY KEY (`v_id`), ADD UNIQUE KEY `code` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookedtable`
--
ALTER TABLE `bookedtable`
MODIFY `table_ID` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `Item_ID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `roomavail`
--
ALTER TABLE `roomavail`
MODIFY `room_id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `roombooked`
--
ALTER TABLE `roombooked`
MODIFY `room_id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tableavail`
--
ALTER TABLE `tableavail`
MODIFY `table_num` mediumint(2) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `userid` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `verify`
--
ALTER TABLE `verify`
MODIFY `v_id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookedtable`
--
ALTER TABLE `bookedtable`
ADD CONSTRAINT `bookedtable_ibfk_1` FOREIGN KEY (`customer_userID`) REFERENCES `user` (`userid`);

--
-- Constraints for table `roombooked`
--
ALTER TABLE `roombooked`
ADD CONSTRAINT `roombooked_ibfk_1` FOREIGN KEY (`customer_userid`) REFERENCES `user` (`userid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
