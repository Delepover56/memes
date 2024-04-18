-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2024 at 01:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `memes`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_display` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_phone` varchar(50) NOT NULL,
  `user_dob` date NOT NULL,
  `user_gender` enum('Male','Female') NOT NULL,
  `user_role` int(11) NOT NULL DEFAULT 1 COMMENT '1 = user, 2 = verified, 3 = admin',
  `user_password` varchar(50) NOT NULL,
  `user_creationTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_display`, `user_email`, `user_phone`, `user_dob`, `user_gender`, `user_role`, `user_password`, `user_creationTime`) VALUES
(1, 'tiesiog_taha', 'Taha', 'taha82426980@gmail.com', '03191327495', '2005-10-11', 'Male', 3, 'Tahakhan53', '2024-03-06 16:09:18'),
(6, 'taha21', 'Taha', 'bhaitaha123456789@gmail.com', '01234567891', '2005-10-11', 'Male', 1, 'Hi', '2024-03-08 08:18:27'),
(7, 'evil_shop', 'Mustafa', 'evilshop@gmail.com', '03233204943', '2010-01-29', 'Male', 1, 'mustafa', '2024-03-08 15:24:58'),
(8, 'kunzete_epic', 'KunzeteEPIC', 'kunzete@gmail.com', '00001111222', '2006-12-01', 'Male', 1, 'mohtashimkhan', '2024-03-08 15:53:44'),
(9, 'mujtaba', 'Mujtaba :)', 'mujtaba@gmail.com', '99911122233', '2013-10-25', 'Male', 1, 'HI', '2024-03-08 16:16:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
