-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 28, 2022 at 01:29 PM
-- Server version: 8.0.28
-- PHP Version: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(24) NOT NULL,
  `password` varchar(191) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'Admin', 'admin', NULL, NULL),
(2, 'test', 'test', 'test', NULL, NULL),
(3, 'Test user', 'testuser', 'testuser', '2022-11-28 20:46:11', '2022-11-28 20:46:11'),
(4, 'test2', 'test2', 'test2', '2022-11-28 21:26:36', '2022-11-28 21:26:36'),
(5, 'test3', 'test3', 'test3', '2022-11-28 21:27:07', '2022-11-28 21:27:07');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `id` int NOT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `address` varchar(191) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `contactno` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`id`, `uuid`, `firstname`, `middlename`, `lastname`, `address`, `contactno`, `created_at`, `updated_at`) VALUES
(1, '22471643-b18c-4a35-a8a9-1c25189a680a', 'Karl', 'Angelo', 'Oriel', NULL, '09511658756', '2022-11-26 11:33:08', '2022-11-26 11:33:08'),
(2, 'dc5896c5-56b7-476b-944d-94e57134e725', 'sd', 'd', 'dddd', NULL, '32321', '2022-11-26 12:33:30', '2022-11-26 12:33:30'),
(3, '9cbf3c78-4577-4b3e-a188-788f6aaa550e', 'Karl', 'Angelo', 'Oriel', NULL, '21313123', '2022-11-27 12:37:52', '2022-11-27 12:37:52'),
(4, '5377b7f0-32a7-4934-b83b-0a2f4da6518b', 'Karl', 'Angelo', 'B', NULL, '12312312', '2022-11-28 15:09:09', '2022-11-28 15:09:09'),
(5, 'd123ad39-fd22-4d89-a69e-38a0b35b2750', 'Karl', 'Angelo', 'B', NULL, '123213123123123', '2022-11-28 15:50:48', '2022-11-28 15:50:48');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `price` varchar(11) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `room_type`, `price`, `photo`) VALUES
(1, 'Standard', '2000', '1.jpg'),
(2, 'Superior', '2400', '3.jpg'),
(3, 'Super Deluxe', '2800', '4.jpg'),
(4, 'Jr. Suite', '3800', '5.jpg'),
(5, 'Executive Suite', '4000', '6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int NOT NULL,
  `guest_id` int NOT NULL,
  `room_id` int NOT NULL,
  `room_no` int NOT NULL,
  `extra_bed` int NOT NULL,
  `status` varchar(20) NOT NULL,
  `days` int NOT NULL,
  `checkin` date NOT NULL,
  `checkin_time` time NOT NULL,
  `checkout` date NOT NULL,
  `checkout_time` time NOT NULL,
  `bill` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int NOT NULL,
  `guest_id` int NOT NULL,
  `room_id` int NOT NULL,
  `room_no` int DEFAULT NULL,
  `extra_bed` tinyint NOT NULL DEFAULT '0',
  `status` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `days` int DEFAULT NULL,
  `checkin` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checkin_time` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checkout` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checkout_time` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` int NOT NULL DEFAULT '0',
  `payment` int NOT NULL DEFAULT '0',
  `is_payment_full` tinyint NOT NULL DEFAULT '0',
  `payment_at` datetime DEFAULT NULL,
  `valid_until` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_unread` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `guest_id`, `room_id`, `room_no`, `extra_bed`, `status`, `days`, `checkin`, `checkin_time`, `checkout`, `checkout_time`, `bill`, `balance`, `payment`, `is_payment_full`, `payment_at`, `valid_until`, `is_unread`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, 0, 'Expired', 1, '11/26/2022', NULL, '11/27/2022', NULL, '2000', 0, 0, 0, NULL, '2022-11-26 15:33:08', 1, '2022-11-26 11:33:08', '2022-11-26 11:33:08'),
(2, 2, 2, NULL, 0, 'Expired', 1, '11/28/2022', NULL, '11/29/2022', NULL, '2000', 0, 0, 0, NULL, '2022-11-26 13:33:30', 1, '2022-11-26 12:33:30', '2022-11-26 12:33:30'),
(3, 3, 1, NULL, 0, 'Check Out', 1, '11/29/2022', NULL, '11/30/2022', NULL, '2000', 1000, 1000, 0, '2022-11-27 13:23:37', '2022-11-27 13:37:52', 1, '2022-11-27 12:37:52', '2022-11-28 15:48:18'),
(4, 4, 1, NULL, 0, 'Check Out', 1, '12/14/2022', NULL, '12/15/2022', NULL, '2000', 800, 1200, 0, '2022-11-28 15:09:36', '2022-11-28 16:09:09', 1, '2022-11-28 15:09:09', '2022-11-28 15:48:39'),
(5, 5, 1, NULL, 0, 'Check Out', 2, '12/13/2022', NULL, '12/15/2022', NULL, '4000', 3000, 1000, 0, '2022-11-28 15:52:11', '2022-11-28 16:50:48', 1, '2022-11-28 15:50:48', '2022-11-28 15:52:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
