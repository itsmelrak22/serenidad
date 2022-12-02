-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 02, 2022 at 03:07 PM
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
(1, 'b9723b0e-c33e-4cbb-bffe-996a5497fbce', 'Karl', 'Angelo', 'Oriel', NULL, '09511658756', '2022-12-01 15:32:23', '2022-12-01 15:32:23'),
(2, '4d47d7d7-742e-4ca0-8c51-12ea672d849f', 'test', 'test', 'ets', NULL, '232131231', '2022-12-01 16:02:31', '2022-12-01 16:02:31'),
(3, '2df2b317-5e38-4b5b-94ff-1bcbbfa96337', '231', '312', '312', NULL, '3124143', '2022-12-01 16:05:38', '2022-12-01 16:05:38'),
(4, '58919414-4576-4b9c-8947-77f8c028050f', 'wqe', 'qeq', 'ewqe', NULL, '2313123213', '2022-12-01 16:07:45', '2022-12-01 16:07:45'),
(5, '9e8b113d-1a1e-4069-8675-168ce7f6b928', 'qweqeqwe', 'qweqw', 'eqwe', NULL, '12313123123', '2022-12-01 16:08:25', '2022-12-01 16:08:25'),
(6, '2389ef8f-ddc8-457b-8226-7e59bd1b4a28', 'test', 'test', 'test', NULL, '23131312', '2022-12-02 09:37:49', '2022-12-02 09:37:49'),
(7, 'b06c636d-a238-4b2f-8407-fd91a174b83a', 'test', 'test', 'test', NULL, '2321313131', '2022-12-02 11:25:47', '2022-12-02 11:25:47'),
(8, 'ed3f59cb-3726-4dc5-ac64-821bd9f64c30', 'test', 'est', 'ests', NULL, '213131231', '2022-12-02 13:02:05', '2022-12-02 13:02:05'),
(9, '7751773e-19fd-4729-a29e-fe34c6760b20', 'weqe', 'qwewqe', 'wqq', NULL, '2313213', '2022-12-02 13:03:20', '2022-12-02 13:03:20'),
(10, 'a812d3da-fa68-4ac6-9e6a-73f1cc764ae9', 'wqeqw', 'eqwe', 'qwe', NULL, '123123', '2022-12-02 13:28:55', '2022-12-02 13:28:55'),
(11, '804dc985-b4c2-4396-ac9d-3536da3df0ec', 'terst', 'tset', 'estse', NULL, '12312312312', '2022-12-02 13:36:54', '2022-12-02 13:36:54'),
(12, '92b6ef18-c565-4c84-a51b-1aef7099d602', 'Karl', 'Karl', 'Karl', NULL, '12313123', '2022-12-02 14:31:34', '2022-12-02 14:31:34'),
(13, 'b6977c66-06f1-4542-9451-c2c329520019', 'Karl Angelo', 'qwe', 'Oriel', NULL, '09511658756', '2022-12-02 21:43:02', '2022-12-02 21:43:02'),
(14, 'a6401501-a98d-4911-ae57-e08fbde48557', 'asd', 'adasd', 'asdas', NULL, '09511658756', '2022-12-02 22:07:49', '2022-12-02 22:07:49'),
(15, '4cc8463a-7ec4-415b-a384-b6bd44bbbe63', 'Karl', 'Angelo', 'B', NULL, '64654654', '2022-12-02 22:13:30', '2022-12-02 22:13:30'),
(16, '874b4a8d-4223-4788-9eed-85d2f6a321df', 'wqeqwe', 'qeqweq', 'weqwe', NULL, '2131231233', '2022-12-02 22:25:02', '2022-12-02 22:25:02'),
(17, '26ba3b94-b188-4672-8dc0-7448dbf9f782', 'Karl Angelo', 'qwe', 'Oriel', NULL, '09565824654', '2022-12-02 22:32:57', '2022-12-02 22:32:57');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int NOT NULL,
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
  `extra_pax` int DEFAULT NULL,
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

INSERT INTO `transactions` (`id`, `guest_id`, `room_id`, `room_no`, `extra_bed`, `extra_pax`, `status`, `days`, `checkin`, `checkin_time`, `checkout`, `checkout_time`, `bill`, `balance`, `payment`, `is_payment_full`, `payment_at`, `valid_until`, `is_unread`, `created_at`, `updated_at`) VALUES
(1, 1, 6, NULL, 0, NULL, 'Check Out', 3, '12/05/2022', NULL, '12/08/2022', NULL, '7200', 4700, 2500, 0, '2022-12-01 16:00:53', '2022-12-01 16:32:23', 0, '2022-12-01 15:32:23', '2022-12-01 16:01:06'),
(2, 2, 5, NULL, 0, NULL, 'Reserved', 1, '', NULL, '', NULL, '2000', 1000, 1000, 0, '2022-12-01 16:03:26', '2022-12-01 17:02:31', 0, '2022-12-01 16:02:31', '2022-12-01 16:03:26'),
(3, 3, 5, NULL, 0, NULL, 'Reserved', 2, '12/01/2022', NULL, '12/03/2022', NULL, '4000', 2000, 2000, 0, '2022-12-01 16:06:12', '2022-12-01 17:05:38', 0, '2022-12-01 16:05:38', '2022-12-01 16:06:12'),
(5, 5, 6, NULL, 0, NULL, 'Expired', 1, '12/01/2022', NULL, '12/02/2022', NULL, '2400', 0, 0, 0, NULL, '2022-12-01 17:08:25', 0, '2022-12-01 16:08:25', '2022-12-01 16:08:25'),
(7, 7, 5, NULL, 0, NULL, 'Expired', 1, '12/02/2022', NULL, '12/03/2022', NULL, '2000', 0, 0, 0, NULL, '2022-12-02 12:25:47', 0, '2022-12-02 11:25:47', '2022-12-02 11:25:47'),
(8, 8, 5, NULL, 0, NULL, 'Expired', 1, '12/02/2022', NULL, '12/03/2022', NULL, '2000', 0, 0, 0, NULL, '2022-12-02 14:02:05', 0, '2022-12-02 13:02:05', '2022-12-02 13:02:05'),
(9, 9, 5, NULL, 0, NULL, 'Expired', 2, '12/04/2022', NULL, '12/06/2022', NULL, '4000', 0, 0, 0, NULL, '2022-12-02 14:03:20', 0, '2022-12-02 13:03:20', '2022-12-02 13:03:20'),
(10, 10, 5, NULL, 0, NULL, 'Expired', 3, '12/11/2022', NULL, '12/14/2022', NULL, '6000', 0, 0, 0, NULL, '2022-12-02 14:28:55', 0, '2022-12-02 13:28:55', '2022-12-02 13:28:55'),
(11, 11, 5, NULL, 0, NULL, 'Expired', 2, '12/08/2022', NULL, '12/10/2022', NULL, '4000', 0, 0, 0, NULL, '2022-12-02 14:36:54', 0, '2022-12-02 13:36:54', '2022-12-02 13:36:54'),
(12, 12, 5, NULL, 0, NULL, 'Expired', 2, '12/04/2022', NULL, '12/06/2022', NULL, '4000', 0, 0, 0, NULL, '2022-12-02 15:31:34', 0, '2022-12-02 14:31:34', '2022-12-02 14:31:34'),
(13, 13, 5, NULL, 3, 3, 'Reserved', 1, '12/02/2022', NULL, '12/03/2022', NULL, '5000', 2270, 2280, 0, '2022-12-02 22:05:00', '2022-12-02 22:43:02', 0, '2022-12-02 21:43:02', '2022-12-02 22:05:00'),
(14, 14, 6, NULL, 3, 3, 'Reserved', 2, '12/05/2022', NULL, '12/07/2022', NULL, '7800', 3350, 4000, 0, '2022-12-02 22:10:55', '2022-12-02 23:07:49', 0, '2022-12-02 22:07:49', '2022-12-02 22:10:55'),
(15, 15, 5, NULL, 0, 0, 'PENDING', 0, '', NULL, '', NULL, '0', 0, 0, 0, NULL, '2022-12-02 23:13:30', 0, '2022-12-02 22:13:30', '2022-12-02 22:13:30'),
(16, 16, 5, NULL, 3, 4, 'Reserved', 1, '12/05/2022', NULL, '12/06/2022', NULL, '5500', 2400, 2500, 0, '2022-12-02 22:25:27', '2022-12-02 23:25:02', 0, '2022-12-02 22:25:02', '2022-12-02 22:25:27'),
(17, 17, 5, NULL, 3, 4, 'Reserved', 2, '12/08/2022', NULL, '12/10/2022', NULL, '7500', 2900, 4000, 0, '2022-12-02 22:33:32', '2022-12-02 23:32:57', 1, '2022-12-02 22:32:57', '2022-12-02 22:33:32');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
