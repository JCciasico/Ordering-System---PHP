-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2022 at 07:33 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `burger_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `chicken_list`
--

CREATE TABLE `chicken_list` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chicken_list`
--

INSERT INTO `chicken_list` (`id`, `name`, `image`, `price`) VALUES
(1, 'Ch\'Queen', '../images/chicken/Ch\'Queen.webp', 100.25),
(2, 'Spicy Ch\'Queen', '../images/chicken/SpicyCh\'Queen.webp', 105.75),
(3, 'Ch\'Queen Deluxe', '../images/chicken/Ch\'QueenDeluxe.webp', 90.45),
(4, 'Original Chicken', '../images/chicken/OriginalChicken.webp', 85.55),
(5, 'Chicken Jr.', '../images/chicken/ChickenJR.webp', 65.25),
(6, 'Spicy Chicken Jr.', '../images/chicken/SpicyChickenJR.webp', 70.25),
(7, '4pcs. Chicken Nuggets', '../images/chicken/ChickenNuggets.webp', 50.25),
(8, 'Chicken Fries', '../images/chicken/chickenfries.webp', 55.25);

-- --------------------------------------------------------

--
-- Table structure for table `food_list`
--

CREATE TABLE `food_list` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_list`
--

INSERT INTO `food_list` (`id`, `name`, `image`, `price`) VALUES
(1, 'Lhooper Melt', '../images/lhopper.webp', 125.25),
(2, 'Lhooper', '../images/lhooper1.webp', 110.55),
(3, 'Big Queen', '../images/big queen.webp', 95.35),
(4, 'Bacon Queen', '../images/baconqueen.webp', 85.55),
(5, 'Double Lhooper', '../images/doublelhooper.webp', 135.75),
(6, 'Lhooper Jr.', '../images/lhooperJR.webp', 80.75),
(7, 'Double Cheese', '../images/doublecheese.webp', 85.15),
(8, 'Hamburger', '../images/hamburger.webp', 65.25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chicken_list`
--
ALTER TABLE `chicken_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_list`
--
ALTER TABLE `food_list`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
