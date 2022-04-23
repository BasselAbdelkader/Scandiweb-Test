-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 12, 2022 at 02:20 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scandiweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(20) NOT NULL,
  `SKU` varchar(20) NOT NULL,
  `Name` text NOT NULL,
  `Price` decimal(20,2) NOT NULL,
  `Size` varchar(20) DEFAULT NULL,
  `Weight` varchar(20) DEFAULT NULL,
  `Dimensions` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `SKU`, `Name`, `Price`, `Size`, `Weight`, `Dimensions`) VALUES
(1, 'nas', 'fdgfdgfd', '2.00', '12', NULL, NULL),
(2, 'gfhgfh', 'fdgfdgfd', '2.00', NULL, '12', NULL),
(3, 'nas', 'fdgfdgfd', '1.98', NULL, '12', NULL),
(4, 'nas', 'fdgfdgfd', '12.00', '12', NULL, NULL),
(5, 'cdsds', 'cdscsd', '12.32', NULL, '12', NULL),
(6, 'gfhgfh', 'aaaa', '12.00', NULL, '12', NULL),
(7, 'dffdfd', 'fdfdfds', '12.00', NULL, '12', NULL),
(8, 'hhgfhgf', 'gfhhggfhh', '23.55', NULL, NULL, '12x12x12'),
(9, 'ggfxgfxbh', 'gfhghf', '12.00', '12', NULL, NULL),
(10, 'fdfddfsdfsa', 'dsfdf', '12.00', NULL, '12', NULL),
(11, 'sdadas', 'sad', '12.00', NULL, '12', NULL),
(12, 'fdgdf', 'dsfdf', '12.00', NULL, '12', NULL),
(13, '1281111111', 'dfgsdfg', '12.00', NULL, '12', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
