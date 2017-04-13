-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 13, 2017 at 08:50 PM
-- Server version: 5.6.31-0ubuntu0.15.10.1
-- PHP Version: 5.6.11-1ubuntu3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prinpreajma`
--

-- --------------------------------------------------------

--
-- Table structure for table `prg_program`
--

CREATE TABLE IF NOT EXISTS `prg_program` (
  `prg_id` bigint(20) NOT NULL,
  `loc_id` int(11) NOT NULL,
  `prg_day` varchar(255) NOT NULL,
  `prg_day_short` varchar(255) NOT NULL,
  `prg_open_at` int(11) NOT NULL,
  `prg_close_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prg_program`
--

INSERT INTO `prg_program` (`prg_id`, `loc_id`, `prg_day`, `prg_day_short`, `prg_open_at`, `prg_close_at`) VALUES
(1, 3, 'Luni', 'i', 1, 2),
(2, 3, 'Marti', 'i', 3, 4),
(3, 3, 'Miercuri', 'i', 5, 6),
(4, 3, 'Joi', 'i', 7, 8),
(5, 3, 'Vineri', 'i', 9, 10),
(6, 3, 'Sambata', 'a', 11, 12),
(7, 3, 'Duminica', 'a', 13, 14),
(8, 4, 'Luni', 'i', 10, 11),
(9, 4, 'Marti', 'i', 10, 11),
(10, 4, 'Miercuri', 'i', 10, 11),
(11, 4, 'Joi', 'i', 10, 11),
(12, 4, 'Vineri', 'i', 10, 11),
(13, 4, 'Sambata', 'a', 12, 13),
(14, 4, 'Duminica', 'a', 12, 13),
(15, 5, 'Luni', 'i', 10, 11),
(16, 5, 'Marti', 'i', 10, 11),
(17, 5, 'Miercuri', 'i', 10, 11),
(18, 5, 'Joi', 'i', 10, 11),
(19, 5, 'Vineri', 'i', 10, 11),
(20, 5, 'Sambata', 'a', 12, 13),
(21, 5, 'Duminica', 'a', 12, 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prg_program`
--
ALTER TABLE `prg_program`
  ADD PRIMARY KEY (`prg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prg_program`
--
ALTER TABLE `prg_program`
  MODIFY `prg_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
