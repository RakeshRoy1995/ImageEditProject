-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2020 at 09:07 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imageproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `image_datas`
--

CREATE TABLE `image_datas` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `new_image` text DEFAULT NULL,
  `image_width` int(11) NOT NULL DEFAULT 150,
  `image_height` int(11) NOT NULL DEFAULT 100,
  `new_width` int(11) DEFAULT NULL,
  `new_height` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image_datas`
--

INSERT INTO `image_datas` (`id`, `image`, `new_image`, `image_width`, `image_height`, `new_width`, `new_height`) VALUES
(1, 'assest/images/15974977431597406889chadengle.jpg', NULL, 128, 128, NULL, NULL),
(2, 'assest/images/15974977501597406312arashmil.jpg', 'assest/images/copyImg/1597497824example-cropped.jpg', 128, 128, 128, 128),
(3, 'assest/images/159749775815974818491597399104heading_logo.png', NULL, 58, 74, NULL, NULL),
(8, 'assest/images/1597508673profile2.jpg', 'assest/images/copyImg/1597517935example-cropped.jpg', 150, 150, 150, 150);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `image_datas`
--
ALTER TABLE `image_datas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image_datas`
--
ALTER TABLE `image_datas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
