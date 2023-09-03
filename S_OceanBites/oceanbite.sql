-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2023 at 05:45 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oceanbite`
--

-- --------------------------------------------------------

--
-- Table structure for table `foodie`
--

CREATE TABLE `foodie` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `food_name` varchar(100) NOT NULL,
  `food_price` int(40) NOT NULL,
  `description` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foodie`
--

INSERT INTO `foodie` (`id`, `image`, `food_name`, `food_price`, `description`) VALUES
(3, '1692934407_shrimp.jpeg', 'Garlic Shrimp', 5400, 'Serve the hunger'),
(4, '1692934426_img1.jpeg', 'Jumbo Beef Burger', 1200, 'Avail this offer to get free fries'),
(6, '1692933938_dish.jpeg', 'Spaghetti', 34565, 'Avail this offer now');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foodie`
--
ALTER TABLE `foodie`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foodie`
--
ALTER TABLE `foodie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
