-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 07, 2022 at 08:01 AM
-- Server version: 8.0.17
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(24) NOT NULL,
  `password` varchar(191) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `restriction` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `restriction`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'Admin', 'admin', 'admin', NULL, '2022-12-01 10:16:37'),
(6, 'Admin 2', 'Admin2', 'admin2', 'admin', '2022-12-01 10:01:49', '2022-12-01 10:16:28'),
(9, 'test', 'test', 'test', 'user', '2022-12-02 14:39:34', '2022-12-02 14:39:34');

-- --------------------------------------------------------

--
-- Table structure for table `chatbot`
--

CREATE TABLE `chatbot` (
  `id` int(11) NOT NULL,
  `messages` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `response` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chatbot`
--

INSERT INTO `chatbot` (`id`, `messages`, `response`) VALUES
(2, 'Hello', 'Hey There, How can I help you?'),
(3, 'Hi/Hello/Hy/Hey There', 'Good Day how can we help you?'),
(5, 'location / where is your location / where is the location / where / location? / where is your location? / where is the location? / where?', 'We are located @ Lian, Batangas, Calabarzon, Philippines'),
(6, 'cancel / cancel reservation / reservation cancel / how to cancel reservation', 'Cancellation: 3-4 days before check in');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `id` int(11) NOT NULL,
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
(1, '55b4ecb0-bd81-479c-9057-7f319fd47b67', 'Karl Angelo', 'qwe', 'Oriel', NULL, '09511658756', '2022-12-05 15:14:41', '2022-12-05 15:14:41'),
(2, 'b84bcecd-e791-4085-8d22-996c0c78bad3', 'Karl Angelo', 'qwe', 'Oriel', NULL, '09511658756', '2022-12-05 15:41:06', '2022-12-05 15:41:06'),
(3, '2597ec28-9e39-4934-8d4c-395b1b00b1ca', 'Karl', 'Angelo', 'B', NULL, '09511658756', '2022-12-05 15:44:44', '2022-12-05 15:44:44'),
(4, 'e07a1699-a844-452a-b369-6dfbb92992b8', 'wqeqwe', 'qeqweq', 'weqwe', NULL, '09511658756', '2022-12-05 15:46:19', '2022-12-05 15:46:19'),
(5, 'cffd6efa-da81-49f5-aeb1-b604260cb968', 'wqeqwe', 'qeqweq', 'weqwe', NULL, '09511658756', '2022-12-05 15:49:28', '2022-12-05 15:49:28'),
(6, 'ba3b2c40-32de-419f-9b8c-78bbb1144044', 'Karl', 'Angelo', 'Oriel', NULL, '09511658756', '2022-12-07 08:58:51', '2022-12-07 08:58:51'),
(7, '755d9914-b3c7-4f9c-935a-19ed3d78d68f', 'Karl', 'Angelo', 'Oriel', NULL, '09511658756', '2022-12-07 08:59:31', '2022-12-07 08:59:31'),
(8, '9a10777f-89c4-4717-a551-c891759647d7', 'Karl', 'Karl', 'Karl', NULL, '09656565456', '2022-12-07 11:14:43', '2022-12-07 11:14:43'),
(9, '7d1a07d2-18f7-46e6-9897-b686f480e86f', 'Karl', 'Karl', 'Karl', NULL, '09511658756', '2022-12-07 11:25:36', '2022-12-07 11:25:36');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `price` varchar(11) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `room_type`, `price`, `photo`, `description`, `created_at`, `updated_at`) VALUES
(5, 'Standard', '2000', 'img/rooms/4.jpg', 'This place has a maximum of 4 guests, not including infants. Pets aren&#039;t allowed.', '2022-12-01 15:31:31', '2022-12-02 15:58:05'),
(6, 'Superior', '2400', 'img/rooms/a.jpg', 'This place has a maximum of 4 guests, not including infants. Pets aren&#039;t allowed.', '2022-12-01 15:31:46', '2022-12-02 16:00:58'),
(7, 'test', '2500', 'img/rooms/111.PNG', 'This place has a maximum of 4 guests, not including infants. Pets are not allowed.', '2022-12-02 12:49:03', '2022-12-02 16:01:05');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `room_no` int(11) DEFAULT NULL,
  `extra_bed` tinyint(4) NOT NULL DEFAULT '0',
  `extra_pax` int(11) DEFAULT NULL,
  `status` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `days` int(11) DEFAULT NULL,
  `checkin` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checkin_time` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checkout` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checkout_time` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` int(11) NOT NULL DEFAULT '0',
  `payment` int(11) NOT NULL DEFAULT '0',
  `is_payment_full` tinyint(4) NOT NULL DEFAULT '0',
  `payment_at` datetime DEFAULT NULL,
  `valid_until` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_unread` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `remarks` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `guest_id`, `room_id`, `room_no`, `extra_bed`, `extra_pax`, `status`, `days`, `checkin`, `checkin_time`, `checkout`, `checkout_time`, `bill`, `balance`, `payment`, `is_payment_full`, `payment_at`, `valid_until`, `is_unread`, `created_at`, `updated_at`, `remarks`) VALUES
(1, 1, 5, NULL, 2, 2, 'Check Out', 1, '12/05/2022', NULL, '12/06/2022', NULL, '3700', 0, 1900, 0, '2022-12-05 15:14:49', '2022-12-05 16:14:41', 0, '2022-12-05 15:14:41', '2022-12-05 15:40:40', NULL),
(2, 2, 5, NULL, 3, 2, 'Check Out', 1, '12/05/2022', NULL, '12/06/2022', NULL, '4200', 0, 2200, 0, '2022-12-05 15:41:23', '2022-12-05 16:41:06', 0, '2022-12-05 15:41:06', '2022-12-05 15:41:38', NULL),
(3, 3, 6, NULL, 0, 0, 'Check Out', 1, '12/07/2022', NULL, '12/08/2022', NULL, '2400', 0, 1500, 0, '2022-12-05 15:45:43', '2022-12-05 16:44:44', 0, '2022-12-05 15:44:44', '2022-12-05 15:47:31', NULL),
(4, 4, 5, NULL, 0, 0, 'Check In', 2, '12/19/2022', NULL, '12/21/2022', NULL, '4000', 1500, 2500, 0, '2022-12-05 15:46:26', '2022-12-05 16:46:19', 0, '2022-12-05 15:46:19', '2022-12-05 15:50:50', NULL),
(5, 5, 5, NULL, 0, 0, 'Expired', 1, '12/06/2022', NULL, '12/07/2022', NULL, '2000', 0, 0, 0, NULL, '2022-12-05 16:49:28', 0, '2022-12-05 15:49:28', '2022-12-05 15:49:28', NULL),
(6, 6, 5, NULL, 0, 0, 'Expired', 1, '12/07/2022', NULL, '12/08/2022', NULL, '2000', 0, 0, 0, NULL, '2022-12-07 09:58:51', 0, '2022-12-07 08:58:51', '2022-12-07 08:58:51', NULL),
(7, 7, 5, NULL, 0, 2, 'Expired', 1, '12/10/2022', NULL, '12/11/2022', NULL, '3000', 0, 0, 0, NULL, '2022-12-07 09:59:31', 0, '2022-12-07 08:59:31', '2022-12-07 08:59:31', NULL),
(8, 8, 5, NULL, 0, 0, 'Reserved', 1, '12/08/2022', NULL, '12/09/2022', NULL, '2000', 500, 1500, 0, '2022-12-07 11:27:13', '2022-12-07 12:14:43', 1, '2022-12-07 11:14:43', '2022-12-07 11:27:13', NULL),
(9, 9, 5, NULL, 3, 3, 'Check Out', 1, '12/10/2022', NULL, '12/11/2022', NULL, '4550', 0, 2300, 0, '2022-12-07 11:25:52', '2022-12-07 12:25:36', 1, '2022-12-07 11:25:36', '2022-12-07 11:28:12', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chatbot`
--
ALTER TABLE `chatbot`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `chatbot`
--
ALTER TABLE `chatbot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
