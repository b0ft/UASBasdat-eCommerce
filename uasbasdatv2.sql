-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2023 at 05:24 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uasbasdatv2`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(50) NOT NULL,
  `product_id` int(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(50) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile_number` varchar(25) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `total_price` int(50) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(50) NOT NULL,
  `order_id` int(50) NOT NULL,
  `product_id` int(50) NOT NULL,
  `quantity` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(50) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `image`) VALUES
(1, 'GALAX XANOVA Ocala / XH200 Gaming Headset', 454000, 'Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Earum Excepturi Omnis Eligendi, Aspernatur Quia Voluptate Minus Recusandae Iste Ipsum Distinctio Vel Illo? Mollitia Tenetur Reiciendis Ullam Officia Qui, Neque Aperiam.', 'pic1.webp'),
(2, 'ADATA XPG PRECOG - HI RES AUDIO - 7.1 SURROUND SOUND', 750000, 'Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Earum Excepturi Omnis Eligendi, Aspernatur Quia Voluptate Minus Recusandae Iste Ipsum Distinctio Vel Illo? Mollitia Tenetur Reiciendis Ullam Officia Qui, Neque Aperiam.', 'pic2.png'),
(3, 'Razer BlackShark V2 Pro - Six Siege Special Edition', 933000, 'Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Earum Excepturi Omnis Eligendi, Aspernatur Quia Voluptate Minus Recusandae Iste Ipsum Distinctio Vel Illo? Mollitia Tenetur Reiciendis Ullam Officia Qui, Neque Aperiam.', 'pic3.png'),
(4, 'Steelseries Arctis 3 With 7.1 DTS Headphone', 784000, 'Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Earum Excepturi Omnis Eligendi, Aspernatur Quia Voluptate Minus Recusandae Iste Ipsum Distinctio Vel Illo? Mollitia Tenetur Reiciendis Ullam Officia Qui, Neque Aperiam.', 'pic4.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
