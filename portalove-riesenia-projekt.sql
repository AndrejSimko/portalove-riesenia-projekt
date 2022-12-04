-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2022 at 10:23 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portalove-riesenia-projekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Apartments', '2022-11-28 18:53:20', NULL),
(2, 'Cars', '2022-12-02 22:28:09', NULL),
(3, 'Tools', '2022-12-04 20:28:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `alt_name` varchar(50) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `alt_name`, `path`, `created_at`, `updated_at`) VALUES
(1, 'apartments-01', '\"assets/images/listing-01.jpg\"', '2022-11-28 19:01:12', NULL),
(2, 'apartments-02', '\"assets/images/listing-02.jpg\"', '2022-12-02 22:38:49', NULL),
(3, 'apartments-03', '\"assets/images/listing-03.jpg\"', '2022-12-02 22:40:14', NULL),
(4, 'apartments-04', '\"assets/images/listing-04.jpg\"', '2022-12-02 22:40:14', NULL),
(5, 'apartments-05', '\"assets/images/listing-05.jpg\"', '2022-12-02 22:40:14', NULL),
(6, 'apartments-06', '\"assets/images/listing-06.jpg\"', '2022-12-02 22:40:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `listing`
--

CREATE TABLE `listing` (
  `id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `price` double NOT NULL,
  `details` varchar(255) NOT NULL,
  `detail1` varchar(125) NOT NULL,
  `detail2` varchar(125) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `User_id` int(11) NOT NULL,
  `Category_id` int(11) NOT NULL,
  `Image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `listing`
--

INSERT INTO `listing` (`id`, `name`, `price`, `details`, `detail1`, `detail2`, `created_at`, `updated_at`, `User_id`, `Category_id`, `Image_id`) VALUES
(15, 'Sunshine Paradise Apartment', 600, '860 sq ft', '2 Bedrooms', '3 Bathrooms', '2022-11-28 20:55:40', '2022-12-04 14:04:40', 2, 1, 1),
(29, 'Amazing Dj Party House', 950, '920 sq ft', '4 Bedrooms', '3 Bathrooms', '2022-12-03 00:32:34', NULL, 7, 1, 2),
(30, 'Seat Lion', 800, '155 000 km', '1.4 TSI', '110kW', '2022-12-03 15:41:09', '2022-12-04 20:41:37', 7, 2, 6),
(41, 'Audi A6 Avant', 1200, '36 000 km', '3.0 TDI', '210kW', '2022-12-04 20:40:25', NULL, 2, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(125) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `first_name`, `last_name`, `email`, `message`, `created_at`) VALUES
(1, 'asd', 'asd', 'asd@asd.asd', 'asd', '2022-11-27 20:37:09'),
(2, 'asd', 'asdas', 'dasd@asd.asd', 'asd', '2022-11-27 20:37:16'),
(3, 'test', 'test', 'test@rwar', 'test', '2022-11-27 20:38:02');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  `is_admin` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `is_admin`, `created_at`, `updated_at`) VALUES
(2, 'peter.deer@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 0, '2022-11-28 20:43:26', NULL),
(7, 'john.doe@gmail.com', '7dde9c8b93d8e93f5afa65080ae94b402b5484f0', 0, '2022-11-29 20:21:49', NULL),
(8, 'admin@plotlist.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, '2022-12-04 13:59:11', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listing`
--
ALTER TABLE `listing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Listing_User_idx` (`User_id`),
  ADD KEY `fk_Listing_Category1_idx` (`Category_id`),
  ADD KEY `fk_Listing_Image1_idx` (`Image_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `listing`
--
ALTER TABLE `listing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
