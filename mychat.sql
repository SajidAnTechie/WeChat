-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2019 at 09:07 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mychat`
--

-- --------------------------------------------------------

--
-- Table structure for table `blocklist`
--

CREATE TABLE `blocklist` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `group_name` varchar(100) NOT NULL,
  `group_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `profiles` varchar(255) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `country` varchar(25) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `bestfreindname` varchar(255) NOT NULL,
  `users_status` text NOT NULL,
  `Date` datetime NOT NULL,
  `group_name` varchar(25) NOT NULL DEFAULT 'No',
  `group_code` varchar(25) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `profiles`, `password`, `email`, `country`, `gender`, `bestfreindname`, `users_status`, `Date`, `group_name`, `group_code`) VALUES
(17, ' sajid', '11.png', 'sajidansari', 'sajid@gmail.com', 'Nepal', 'Male', '', 'offline', '2019-07-11 17:19:21', 'rock_group', '123rock'),
(18, ' rahul', '4.png', '123456789', 'saj@gmail.com', 'Nepal', 'Male', 'sajid', 'offline', '2019-07-11 17:19:59', 'rock_group', '123rock'),
(20, ' anuj', 'boy2.jpg', 'sajidansari', 'anuj@gmail.com', 'Nepal', ' Male', '', 'offline', '2019-07-11 17:20:56', 'anuj_group', '123anuj'),
(21, ' sagar', 'boy1.png', 'sajidansari', 'sagar@gmail.com', 'Nepal', ' Male', '', 'offline', '2019-07-11 22:40:10', 'anuj_group', '123anuj'),
(22, ' manjali', 'girl1.png', 'sajidansari', 'man@gmail.com', 'Nepal', ' female', '', 'offline', '2019-07-15 23:59:12', 'rock_group', '123rock'),
(23, ' pappu', 'boy1.png', 'sajidansari', 'pappu@gmail.com', 'Nepal', ' Male', '', 'offline', '2019-07-19 18:00:05', 'rock_group', '123rock'),
(24, ' rajan', 'boy2.jpg', 'sajidansari', 'rajan@gmail.com', 'Nepal', ' Male', '', 'offline', '2019-07-19 18:00:30', 'rock_group', '123rock'),
(25, ' sandhya', 'girl2.png', 'sajidansari', 'sady@gmail.com', 'Nepal', ' female', '', 'offline', '2019-07-19 18:00:52', 'rock_group', '123rock'),
(26, ' barsha', 'girl1.png', 'sajidansari', 'barsha@gmail.com', 'Nepal', ' female', '', 'offline', '2019-07-19 18:01:15', 'rock_group', '123rock'),
(27, ' nibisha', 'girl2.png', 'sajidansari', 'nibisha@gmail.com', 'Nepal', ' female', '', 'offline', '2019-07-19 18:02:22', 'rock_group', '123rock');

-- --------------------------------------------------------

--
-- Table structure for table `users_chat`
--

CREATE TABLE `users_chat` (
  `id` int(11) NOT NULL,
  `sender_username` varchar(100) NOT NULL,
  `receiver_username` varchar(100) NOT NULL,
  `msg_content` varchar(100) NOT NULL,
  `msg_status` text NOT NULL,
  `msg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `group_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_chat`
--

INSERT INTO `users_chat` (`id`, `sender_username`, `receiver_username`, `msg_content`, `msg_status`, `msg_date`, `group_name`) VALUES
(91, ' sajid', ' sajid', 'hello sajid', 'read', '2019-08-04 17:03:06', 'rock_group'),
(92, ' sajid', ' sajid', 'how r u', 'read', '2019-08-04 17:03:20', 'rock_group'),
(93, ' sajid', ' rahul', 'hello rahul', 'read', '2019-08-04 17:17:50', 'rock_group'),
(94, ' rahul', ' sajid', 'hello sajid', 'read', '2019-08-04 17:18:26', 'rock_group'),
(95, ' sajid', ' rahul', 'how r uh rahul', 'read', '2019-08-04 17:18:41', 'rock_group'),
(96, ' rahul', ' sajid', 'i am fine sajid...and uhh??', 'read', '2019-08-04 17:19:05', 'rock_group'),
(97, ' sajid', ' rahul', 'i am also fine', 'read', '2019-08-04 17:19:18', 'rock_group'),
(98, ' rahul', ' sajid', 'hello sajid', 'read', '2019-08-05 11:39:46', 'rock_group'),
(99, ' sajid', ' rahul', 'hello rahul', 'read', '2019-08-05 11:40:23', 'rock_group'),
(100, ' rahul', ' sajid', 'how r uh', 'read', '2019-08-05 11:40:32', 'rock_group'),
(101, ' sajid', ' rahul', 'i am fine', 'read', '2019-08-05 11:40:40', 'rock_group'),
(102, ' rahul', ' sajid', 'hello', 'unread', '2019-08-05 11:40:53', 'rock_group');

-- --------------------------------------------------------

--
-- Table structure for table `users_group`
--

CREATE TABLE `users_group` (
  `id` int(11) NOT NULL,
  `group_name` varchar(25) NOT NULL,
  `group_code` varchar(25) NOT NULL,
  `block_code` varchar(25) NOT NULL,
  `group_admin` varchar(25) NOT NULL,
  `admin_email` varchar(25) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_group`
--

INSERT INTO `users_group` (`id`, `group_name`, `group_code`, `block_code`, `group_admin`, `admin_email`, `profile_pic`, `date`) VALUES
(19, 'rock_group', '123rock', '1234567', ' sajid', 'sajid@gmail.com', 'boy1.png', '2019-07-11 17:21:28'),
(20, 'anuj_group', '123anuj', 'sajidcode', ' anuj', 'anuj@gmail.com', 'boy2.jpg', '2019-07-11 17:23:35'),
(26, 'codelovers', 'sajidcode', '123456', ' sajid', 'sajid@gmail.com', '11.png', '2019-08-04 22:57:53'),
(27, 'malalove', 'sajidmalaansari', '1234', ' rahul', 'saj@gmail.com', '4.png', '2019-08-05 17:29:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blocklist`
--
ALTER TABLE `blocklist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_chat`
--
ALTER TABLE `users_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_group`
--
ALTER TABLE `users_group`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blocklist`
--
ALTER TABLE `blocklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users_chat`
--
ALTER TABLE `users_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `users_group`
--
ALTER TABLE `users_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
