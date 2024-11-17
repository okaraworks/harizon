-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2024 at 04:41 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `birongo`
--

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `principal` varchar(100) NOT NULL,
  `interest` varchar(100) NOT NULL,
  `years` varchar(100) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `totalinterest` varchar(100) NOT NULL,
  `balance` int(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `user_id`, `principal`, `interest`, `years`, `payment`, `total`, `totalinterest`, `balance`, `paid`, `status`, `date`) VALUES
(4, 0, '45000', '2', '3', '1288.92', '46400.98', '1400.98', 0, 0, 0, '0000-00-00 00:00:00'),
(5, 3, '45000', '2', '2', '1914.31', '45943.48', '943.48', 0, 0, 0, '0000-00-00 00:00:00'),
(6, 3, '34000', '2', '2', '1446.37', '34712.85', '712.85', 0, 34713, 0, '0000-00-00 00:00:00'),
(7, 3, '36000', '2', '4', '781.02', '37489.17', '1489.17', 0, 37489, 0, '2024-06-29 11:32:00'),
(8, 3, '45000', '2', '2', '1914.31', '45943.48', '943.48', 0, 45943, 0, '2024-06-29 11:32:00'),
(9, 3, '20000', '2', '2', '850.81', '20419.33', '419.33', 10000, 10419, 0, '2024-06-29 11:32:00'),
(10, 3, '34000', '2', '2', '1446.37', '34712.85', '712.85', 34713, 0, 0, '2024-06-29 11:32:00'),
(11, 4, '500', '2', '2', '21.27', '510.48', '10.48', 430, 80, 1, '2024-06-29 11:32:00'),
(12, 4, '500', '2', '2', '21.27', '510.48', '10.48', 510, 0, 0, '2024-06-29 11:32:00'),
(13, 66, '500', '3', '3', '14.54', '523.46', '23.46', 400, 123, 1, '2024-06-29 11:32:00'),
(14, 67, '15', '3', '3', '0.44', '15.7', '0.7', 16, 0, 1, '2024-06-29 11:32:00');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reg` varchar(50) NOT NULL,
  `nid` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `paid` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `married` int(11) NOT NULL,
  `spouse` varchar(50) NOT NULL,
  `snid` int(11) NOT NULL,
  `scode` varchar(11) NOT NULL,
  `sphone` int(11) NOT NULL,
  `children` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `user_id`, `reg`, `nid`, `fname`, `sname`, `lname`, `phone`, `email`, `dob`, `gender`, `paid`, `date`, `married`, `spouse`, `snid`, `scode`, `sphone`, `children`) VALUES
(10015, 66, 'UHIF/2021', 128128, 'Linah', 'Mbiti', 'Monthe', '0744778899', 'lyn@gmail.com', '2024-06-29', 'Female', '', '2024-06-29 11:32:00', 0, '', 0, '', 0, 0),
(10016, 67, 'UHIF/2021', 37284592, 'Brian', 'kibet', 'k', '071234567', 'brian@gmail.com', '2024-06-29', 'Male', '', '2024-06-29 11:32:00', 0, '', 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `monthlycontributions`
--

CREATE TABLE `monthlycontributions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `monthlycontributions`
--

INSERT INTO `monthlycontributions` (`id`, `user_id`, `amount`, `date`, `status`) VALUES
(1, 67, 50, '2024-06-29 11:32:00', 1),
(2, 66, 1000, '2024-06-29 11:32:00', 1),
(3, 66, 1500, '2024-06-29 11:32:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(11) NOT NULL,
  `notices` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `notices`, `date`) VALUES
(1, 'Note that we offer our loans with cheap interest', '2024-06-29'),
(2, 'Note that we offer our loans with cheap interest', '2024-06-29');

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` int(11) NOT NULL,
  `start_amount` varchar(100) NOT NULL,
  `max_amount` varchar(100) NOT NULL,
  `rate` varchar(100) NOT NULL,
  `kuanzia` date NOT NULL,
  `kufikia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `repayments`
--

CREATE TABLE `repayments` (
  `id` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` varchar(40) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `repayments`
--

INSERT INTO `repayments` (`id`, `loan_id`, `user_id`, `amount`, `date`) VALUES
(1, 6, 3, '10713', '2024-06-29 11:32:00'),
(2, 8, 3, '2000', '2024-06-29 11:32:00'),
(3, 8, 3, '2000', '2024-06-29 11:32:00'),
(4, 8, 3, '3500', '2024-06-29 11:32:00'),
(5, 8, 3, '2000', '2024-06-29 11:32:00'),
(6, 8, 3, '4500', '2024-06-29 11:32:00'),
(7, 8, 3, '20000', '2024-06-29 11:32:00'),
(8, 8, 3, '1943', '2024-06-29 11:32:00'),
(9, 8, 3, '10000', '2024-06-29 11:32:00'),
(10, 9, 3, '200', '2024-06-29 11:32:00'),
(11, 9, 3, '2019', '2024-06-29 11:32:00'),
(12, 9, 3, '1820', '2024-06-29 11:32:00'),
(13, 9, 3, '6380', '2024-06-29 11:32:00'),
(14, 11, 4, '10', '2024-06-29 11:32:00'),
(15, 11, 4, '50', '2024-06-29 11:32:00'),
(16, 11, 4, '20', '2024-06-29 11:32:00'),
(17, 13, 66, '23', '2024-06-29 11:32:00'),
(18, 13, 66, '77', '2024-06-29 11:32:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `type` varchar(50) NOT NULL,
  `session_id` int(11) NOT NULL,
  `password` varchar(35) NOT NULL,
  `last_activity` datetime NOT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone`, `type`, `session_id`, `password`, `last_activity`, `date_added`, `date_modified`) VALUES
(2, 'Brian', 'brianjuniorrasugu@gmail.com', '071234567', 'admin', 1, 'f925916e2754e5e03f75dd58a5733251', '2024-07-01 05:56:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 'lyn', 'lyn@gmail.com', '0722334455', 'user', 0, 'a01610228fe998f515a72dd730294d87', '2024-02-23 08:09:00', '2024-06-29 11:32:00', '0000-00-00 00:00:00'),
(67, '37284592', 'brian@gmail.com', '071234567', 'user', 0, 'd7c87f85d6ed0356b07f7d5c9948e242', '2024-06-29 11:32:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthlycontributions`
--
ALTER TABLE `monthlycontributions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repayments`
--
ALTER TABLE `repayments`
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
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10017;

--
-- AUTO_INCREMENT for table `monthlycontributions`
--
ALTER TABLE `monthlycontributions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `repayments`
--
ALTER TABLE `repayments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
