-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2022 at 07:32 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notes`
--

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `sn` int(11) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `title` varchar(40) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`sn`, `user_email`, `title`, `description`, `created_date`) VALUES
(5, 'abc@gmail.com', ' destination', 'pokhara,\r\nmanang,\r\nmustang,illam', '2022-04-19 13:15:20'),
(6, 'abc@gmail.com', ' prasanna_email', 'prasanna07@gmail.com', '2022-04-19 13:16:05'),
(7, 'abc@gmail.com', 'Form submission final date', '22/01/2079B.S. thursday', '2022-04-19 13:17:26'),
(9, 'abc@gmail.com', ' Account details', 'Ac name - Aroj chaudhary\r\nAc no. - 001235467800001\r\nBank name - Kumari bank limited', '2022-04-19 13:25:19'),
(10, 'abc@gmail.com', ' prasanna dob', '25/08/2056', '2022-04-19 17:47:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(40) NOT NULL,
  `u_name` varchar(40) NOT NULL,
  `u_email` varchar(40) NOT NULL,
  `u_password` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `u_name`, `u_email`, `u_password`, `date`) VALUES
(1, 'abc', 'abc@gmail.com', 'abc', '2022-04-15 19:54:21'),
(2, 'Anuj katwal', 'anuj@gmail.com', '123456 ', '2022-04-15 21:25:13'),
(3, 'Aroj chaudhary', 'admin@gmail.com', 'qwerty ', '2022-04-15 21:29:38'),
(4, 'Anil bhattarai', 'anil@gmail.com', 'qaz ', '2022-04-15 21:33:20'),
(9, 'Anjeet acharya', 'anjeet@gmail.com', 'asdf ', '2022-04-15 21:58:29'),
(11, 'Amrit acharya', 'amrit@gmail.com', 'zxcv ', '2022-04-15 22:06:09'),
(15, 'manoj pokhrel', 'manoj@gmail.com', 'asdf ', '2022-04-15 23:23:57'),
(17, 'mohit dhamala', 'mohit@gmail.com', '12345 ', '2022-04-18 14:32:27'),
(18, 'Prasanna Chapagain', 'prasanna@gmail.com', '12345 ', '2022-04-18 14:34:25'),
(19, 'kemish bajgain', 'kemish@gmail.com', '12345 ', '2022-04-18 14:47:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_email` (`u_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
