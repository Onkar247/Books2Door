-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2019 at 07:31 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b2d`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `product` varchar(20) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`name`, `username`, `product`, `quantity`) VALUES
('Omkar', 'omi121', 'null', 0),
('raja', 'rajaaa', 'null', 0);

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `Name` varchar(20) NOT NULL,
  `Book` varchar(50) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Date` date NOT NULL,
  `Phone` int(10) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Address` varchar(25) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pwd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`Name`, `Book`, `Gender`, `Date`, `Phone`, `Email`, `Address`, `username`, `pwd`) VALUES
('Omkar', ',Educational', 'Male', '2019-10-08', 1111111111, 'o.bhosale@somaiya.ed', 'Powai', 'omi121', '$2y$10$xzm9MinTHdU/brDhPSu4Fez4UNFzBJn4Wv/3tpeu.T3XaRHcIwbr.'),
('raja', ',Educational', 'Female', '2019-09-30', 1111111111, 'o.bhosale@somaiya.ed', 'Powai', 'rajaaa', '$2y$10$wGd2BCEAiHf5P.UqIrsWa.FJjln.Z4AitXFpOMP2H2B1dY9tipiJi');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `price` double(9,2) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `price`, `image`) VALUES
(1, 'Harry Potter', 'B101', 500.00, 'book2.jpg'),
(2, 'Famous Last Words', 'B102', 400.00, 'book3.jpg'),
(3, 'War And Peace', 'B103', 600.00, 'book4.jpg'),
(4, 'The 3 Mistakes Of My Life', 'B104', 500.00, 'book5.jpg'),
(9, 'The Time Machine', 'B105', 450.00, 'book6.jpg'),
(10, 'The Hunger Games', 'B106', 800.00, 'book7.jpg'),
(11, 'Divergent', 'B107', 700.00, 'book8.jpg'),
(12, 'Haddix', 'B108', 700.00, 'book9.jpg'),
(13, 'Silent Scream', 'B109', 500.00, 'book10.jpg'),
(14, 'Stephen King', 'B110', 500.00, 'book11.jpg'),
(15, 'Lethal White', 'B111', 400.00, 'book12.jpg'),
(16, 'Honour Among Thieves', 'B112', 600.00, 'book13.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
