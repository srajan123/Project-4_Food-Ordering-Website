-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2019 at 07:34 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodshala`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `fooditem` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `type` text NOT NULL,
  `category` text NOT NULL,
  `name` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `fooditem`, `price`, `type`, `category`, `name`, `image`, `time`) VALUES
(84, 'IDLI SHAMBHAR', 200, 'Vegetarian', 'Continental', 'BMB', 'idli.jpg', '2019-04-19 10:29:40'),
(85, 'BURGER', 70, 'Non-vegetarian', 'Continental', 'BMB', 'burger.jpg', '2019-04-19 10:29:40'),
(86, ' CHICKEN THIKAA', 200, 'Non-vegetarian', 'Staters', 'BMB', 'panner.JPG', '2019-04-19 10:43:42'),
(87, 'RAJMA', 180, 'Vegetarian', 'Main course', 'BMB', 'rajma.jpg', '2019-04-19 10:39:54'),
(88, 'MOMOS', 200, 'Non-vegetarian', 'Staters', 'BMB', 'momo.jpg', '2019-04-19 10:39:54'),
(89, 'ICE-CREAM', 80, 'Vegetarian', 'Dessert', 'BMB', 'cream.jpg', '2019-04-19 10:39:55'),
(90, 'CHEESE PIZZA', 950, 'Non-vegetarian', 'Continental', 'BMB', 'pizza.jpg', '2019-04-19 10:39:55'),
(91, 'NOODLES', 200, 'Vegetarian', 'Continental', 'BMB', 'bowl.jpg', '2019-04-19 17:23:01'),
(92, 'CAKE', 220, 'Non-vegetarian', 'Dessert', 'BMB', 'ice.jpg', '2019-04-19 11:04:23'),
(93, 'GREEN SALAD', 50, 'Vegetarian', 'Continental', 'BMB', 'raj1.jpg', '2019-04-19 17:23:12'),
(94, 'VEG MOMOS', 80, 'Vegetarian', 'Staters', 'BMB', 'momo.jpg', '2019-04-19 17:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `restaurant_name` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `quantity` int(20) NOT NULL,
  `price` int(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `restaurant_name`, `user_name`, `item_name`, `quantity`, `price`, `time`, `type`) VALUES
(23, 'BMB', 'srajan jain', 'ICE-CREAM', 3, 80, '2019-04-19 17:25:24', 'Vegetarian'),
(24, 'BMB', 'srajan jain', 'IDLI SHAMBHAR', 3, 200, '2019-04-19 17:26:32', 'Vegetarian');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `password` varchar(50) NOT NULL,
  `numbers` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `name`, `password`, `numbers`, `email`, `type`) VALUES
(18, 'BMB', '7694f4a66316e53c8cdd9d9954bd611d', '7389004740', 'jaimsrajan@gmail.com', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `prefer` text NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `prefer`, `password`) VALUES
(21, 'jaimsrajan@gmail.com', 'srajan jain', 'Vegetarian', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(22, 'ajan@gmail.com', 'srajan jain', 'Vegetarian', '7694f4a66316e53c8cdd9d9954bd611d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
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
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
