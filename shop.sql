-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2022 at 01:19 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `username` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `text` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`username`, `email`, `text`) VALUES
('justy', 'justy@gmail.com', 'why the hell are u doin\r\n'),
('justy', 'justy@gmail.com', 'why the hell are u doin\r\n'),
('justy', 'justy@gmail.com', 'f'),
('justy', 'justy@gmail.com', 'f'),
('justy', 'justy@gmail.com', 'f'),
('justy', 'justy@gmail.com', 'Hey there this is justy');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `orderdate` date NOT NULL,
  `pro_code` int(10) NOT NULL,
  `pro_qty` int(10) NOT NULL,
  `pro_price` float NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `address` varchar(400) NOT NULL,
  `trackcode` varchar(24) NOT NULL,
  `state` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `username`, `orderdate`, `pro_code`, `pro_qty`, `pro_price`, `mobile`, `address`, `trackcode`, `state`) VALUES
(29, 'unix', '2022-05-13', 5, 1, 23, '09375182442', 'vvvvvvvvvvvvvvvvvvvvvvvv', '000000', 2),
(31, 'unix', '2022-05-17', 4, 2, 4, '09375182442', 'nothin but you are mother', '000000', 3),
(32, 'unix', '2022-05-17', 1, 21, 45, '09375182442', 'u can be in here for a long amount of hero', '000000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_code` int(10) NOT NULL,
  `pro_name` varchar(200) NOT NULL,
  `pro_qty` int(10) NOT NULL,
  `pro_price` float NOT NULL,
  `pro_image` varchar(80) NOT NULL,
  `pro_detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_code`, `pro_name`, `pro_qty`, `pro_price`, `pro_image`, `pro_detail`) VALUES
(1, '1', 15, 10, 'artworks-qLE9OtkM5ynzMazi-QDEuJg-t500x500.jpg', 'but not here'),
(2, '2', 2, 2, 'artworks-gtgwD11yCQ7qMrlu-eXTfqw-t500x500.jpg', '2            '),
(3, '3', 3, 3, 'avatars-t5VAR5zMANuptLPP-dVMpXw-t500x500.jpg', '3            '),
(5, '5', 5, 5, 'ab6761610000e5eba832e736e92814c03257dc28.jpg', '5            ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `realname` varchar(80) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`realname`, `username`, `password`, `email`, `type`) VALUES
('just', 'justy', '1234', 'justy@gmail.com', 0),
('', 'lolyla', 'me123', 'loly@yahoo.com', 0),
('weare', 'notthem', 'butme', 'but@hotmail.com', 0),
('adon', 'unix', '1122', 'unix@yahoo.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
