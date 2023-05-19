-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2023 at 06:50 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `searchbuy`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `psno` varchar(100) NOT NULL,
  `check` int(11) DEFAULT NULL,
  `qty` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `uid`, `psno`, `check`, `qty`) VALUES
(2, '1', 'NX64-JI39-81XL', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(30) NOT NULL,
  `category` varchar(250) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `description`, `status`, `date_created`) VALUES
(1, 'Smart Phone', 'Smart Phone Products', 1, '2021-08-30 10:52:25'),
(2, 'Accessories', 'Phone Accessories', 1, '2021-08-30 10:52:49'),
(3, 'Mobile Hardware', 'Mobile Hardware products', 1, '2021-08-30 10:53:31'),
(4, 'External Storage', 'External Storage Products', 1, '2021-08-30 10:54:34');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(100) NOT NULL,
  `sno` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(500) DEFAULT NULL,
  `price` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `details` text NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `scharge` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `sno`, `name`, `slug`, `price`, `category`, `details`, `quantity`, `discount`, `scharge`, `image`) VALUES
(24, 'KA04-WI08-08JL', 'Panasonic Split Wall Premium Inverter Air Conditioner 1.5 Ton - CS-WU18YKYW', NULL, '43534', '1', '4545', '43', '454', '1', '[\"KA04-WI08-08JL0.png\",\"KA04-WI08-08JL1.jpg\"]'),
(25, 'AM68-AB76-29JK', 'Joker 1', NULL, '232', '1', '23232', '232', '22', '4', '[\"AM68-AB76-29JK0.jpg\"]'),
(26, 'RV03-DG30-17GS', 'Joker 2', NULL, '435', '2', '4545', '54', '45', '2', '[\"RV03-DG30-17GS0.jpg\"]'),
(27, 'FZ85-FQ90-64YI', 'Joker 4', NULL, '56', '3', '565', '65', '56', '1', '[\"FZ85-FQ90-64YI0.jpg\",\"FZ85-FQ90-64YI1.jpg\"]'),
(28, 'FZ85-FQ90-64YI', 'Joker 4', 'joker-4', '56', '3', '565', '65', '56', '1', '[\"FZ85-FQ90-64YI0.jpg\",\"FZ85-FQ90-64YI1.jpg\"]');

-- --------------------------------------------------------

--
-- Table structure for table `search`
--

CREATE TABLE `search` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `search`
--

INSERT INTO `search` (`id`, `name`, `image`) VALUES
(1, 'Fish', 'https://static-01.daraz.com.bd/p/1e618e41d2e672ffc8a23b6cf14a429c.jpg'),
(2, 'food', 'https://static-01.daraz.com.bd/p/f98e7599308ee0a442b0706805506691.jpg_400x400q75-product.jpg_.webp'),
(3, 'Fish', 'https://static-01.daraz.com.bd/p/1e618e41d2e672ffc8a23b6cf14a429c.jpg'),
(4, 'food', 'https://static-01.daraz.com.bd/p/f98e7599308ee0a442b0706805506691.jpg_400x400q75-product.jpg_.webp'),
(5, 'Fish', 'https://static-01.daraz.com.bd/p/1e618e41d2e672ffc8a23b6cf14a429c.jpg'),
(6, 'food', 'https://static-01.daraz.com.bd/p/f98e7599308ee0a442b0706805506691.jpg_400x400q75-product.jpg_.webp'),
(7, 'Fish', 'https://static-01.daraz.com.bd/p/1e618e41d2e672ffc8a23b6cf14a429c.jpg'),
(8, 'food', 'https://static-01.daraz.com.bd/p/f98e7599308ee0a442b0706805506691.jpg_400x400q75-product.jpg_.webp');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`id`, `email`, `name`, `phone`, `photo`) VALUES
(1, 'admin@gmail.com', 'Shishir', '014034867210', '1.jpg'),
(2, 's@gmail.com', '', '01403487219', '2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pass` varchar(100) NOT NULL,
  `role` varchar(500) NOT NULL,
  `token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `email`, `pass`, `role`, `token`) VALUES
(1, 'admin@gmail.com', '1234', 'admin', NULL),
(2, 's@gmail.com', 'pass', 'user', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `search`
--
ALTER TABLE `search`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `email_2` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `search`
--
ALTER TABLE `search`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
