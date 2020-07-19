-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2019 at 01:57 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

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
  `products` varchar(100) NOT NULL,
  `amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`name`, `username`, `products`, `amount`) VALUES
('Kunal', 'kunal121', 'Harry Potter,Famous Last Words,War And Peace', 1500),
('Omkar Bhosale', 'omi121', 'The 3 Mistakes Of My Life', 2000),
('Rohit', 'roh121', 'War And Peace,Divergent', 1300),
('Sammy', 'sam121', 'War And Peace', 1200);

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
('Kunal', 'Motivational,Comic', 'Male', '2019-11-05', 1234567890, 'hrishikeshbhosale777', 'Goa', 'kunal121', '$2y$10$Kt.YcoHv4B0fta9xuYrNJezjKX8TkxRWX/w92OYsJNs5rshyldmvC'),
('Omkar Bhosale', 'Educational,Spiritual', 'Male', '1999-11-07', 1234567890, 'om@gmail.com', 'Mumbai', 'omi121', '$2y$10$DVrijkjUUpfZqUwYJFehdelO3QcQEx/7pViMoZ9qDq1mbob9m71rG'),
('Rohit', 'Comic', 'Male', '2019-11-06', 1234567876, 'roh@gmail.com', 'NYC', 'roh121', '$2y$10$Jo6BWb7qCStDRz5aGhtxUuuET.xpcfHm4yFjAi8hMWuOyLE5o2UYS'),
('Sammy', 'Comic', 'Male', '2019-10-28', 1234321233, 'roh@gm.cm', 'parel', 'sam121', '$2y$10$rQTVWIBzeGGufEYEgVHH2u0hdnwMx4Pg7K/caY5pSWO9druu.SaUa');

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
(5, 'The Time Machine', 'B105', 450.00, 'book6.jpg'),
(6, 'The Hunger Games', 'B106', 800.00, 'book7.jpg'),
(7, 'Divergent', 'B107', 700.00, 'book8.jpg'),
(8, 'Haddix', 'B108', 700.00, 'book9.jpg'),
(9, 'Silent Scream', 'B109', 500.00, 'book10.jpg'),
(10, 'Stephen King', 'B110', 500.00, 'book11.jpg'),
(11, 'Lethal White', 'B111', 400.00, 'book12.jpg'),
(12, 'Honour Among Thieves', 'B112', 600.00, 'book13.jpg'),
(13, 'Bahubali', 'B113', 500.00, 'book14.jpg'),
(14, 'Veronica Decides To Die', 'B114', 550.00, 'book15.jpg'),
(15, 'Origin', 'B115', 800.00, 'book16.jpg'),
(16, 'The Codex', 'B116', 750.00, 'book17.jpg'),
(17, 'Red Planet', 'B117', 500.00, 'book18.jpg'),
(18, 'Every Thing', 'B118', 400.00, 'book19.jpg'),
(19, 'The Blue Beast', 'B119', 400.00, 'book20.jpg'),
(20, 'Lee Child', 'B120', 450.00, 'book21.jpg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
