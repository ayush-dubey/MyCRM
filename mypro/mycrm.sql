-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2017 at 02:19 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mycrm1`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `email_id` varchar(100) DEFAULT NULL,
  `mobile` varchar(10) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'no status',
  `address` varchar(1000) DEFAULT NULL,
  `profession` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comment_history`
--

CREATE TABLE `comment_history` (
  `client_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lead_assigned_to`
--

CREATE TABLE `lead_assigned_to` (
  `employee_id` int(11) DEFAULT NULL,
  `lead_id` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `employee_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `gender` enum('male, female') NOT NULL,
  `dob` date NOT NULL,
  `doj` date NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `role` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password` varchar(40) DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `last_login` datetime NOT NULL,
  `active` tinyint(1) UNSIGNED NOT NULL,
  `mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`employee_id`, `username`, `password`, `first_name`, `last_name`, `middle_name`, `gender`, `dob`, `doj`, `father_name`, `address`, `role`, `email`, `activation_code`, `forgotten_password`, `remember_code`, `last_login`, `active`, `mobile`) VALUES
(5, 'amit', '123456', 'amit', 'gupta', 'kumar', '', '1997-02-07', '1997-02-07', 'papa', 'aamir k ghar pe', 'CS', 'amitguptajnv7297@gmail.com', NULL, NULL, NULL, '0000-00-00 00:00:00', 0, '8770245897'),
(6, 'gagan', '123456', 'gagan', 'garg', '', '', '1996-09-24', '2014-09-24', 'rajesh garg', '77,vidhya nagar behind sapna sangeeta indore', 'admin', 'garggagan98@gmail.com', NULL, NULL, NULL, '0000-00-00 00:00:00', 0, '7771997372'),
(8, 'ayush', '123456', 'ayush', 'dubey', '', '', '1996-05-10', '2016-02-10', 'Umashanker Dubey', '31791', 'admin', 'nidhinimilegi@sachbaat.com', NULL, NULL, NULL, '0000-00-00 00:00:00', 0, '7509049805'),
(15, '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', NULL, NULL, NULL, '0000-00-00 00:00:00', 0, ''),
(20, 'qeuwqi', '12345678', 'fkocnh', 'kcnsioo', 'odfhciwon', '', '2017-12-31', '2017-12-31', 'asdcd', 'djfpc  fnodsnc  ind  (46545465)  Arunachal Pradesh', 'manager', 'daskjjdqwpi@awjdoewj.com', NULL, NULL, NULL, '0000-00-00 00:00:00', 0, '9638527410'),
(21, 'ayush1', '$2y$12$LyGYZxJTR3LDS42jAeVHueO.n0K0BZmnOiV/x/.cdel.HxXmK8S7e', 'Ayush', 'Dubey', '', '', '1996-05-10', '2016-05-23', 'Umashanker', 'cnskn  dncns  indore  (452001)  Madhya Pradesh', 'manager', 'asmk@asd.com', NULL, NULL, NULL, '0000-00-00 00:00:00', 0, '9644614111'),
(22, 'ayush2', '$2y$12$bE/0gEPgern1CUWDoL16wOUNVXm8TayxvY2ZFafy64mK0kevdyYw2', 'aysh', 'dubey', '', '', '2016-11-02', '2016-10-30', 'ejrewpii`', 'djfpc  fnodsnc  ind  (46545465)  Arunachal Pradesh', 'manager', 'asmk@asd.com', NULL, NULL, NULL, '0000-00-00 00:00:00', 0, '9638527410');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `comment_history`
--
ALTER TABLE `comment_history`
  ADD KEY `connect to client` (`client_id`),
  ADD KEY `fk_user` (`employee_id`);

--
-- Indexes for table `lead_assigned_to`
--
ALTER TABLE `lead_assigned_to`
  ADD PRIMARY KEY (`lead_id`),
  ADD KEY `connect to user` (`employee_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `employee_id_2` (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment_history`
--
ALTER TABLE `comment_history`
  ADD CONSTRAINT `add to client` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `add to users ` FOREIGN KEY (`employee_id`) REFERENCES `users` (`employee_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `lead_assigned_to`
--
ALTER TABLE `lead_assigned_to`
  ADD CONSTRAINT `add_to_client` FOREIGN KEY (`lead_id`) REFERENCES `client` (`client_id`),
  ADD CONSTRAINT `add_to_users` FOREIGN KEY (`employee_id`) REFERENCES `users` (`employee_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
