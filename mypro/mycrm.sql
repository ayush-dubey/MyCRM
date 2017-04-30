-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2017 at 11:23 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mycrm`
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
  `gender` varchar(10) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(10) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'no status',
  `address` varchar(1000) DEFAULT NULL,
  `profession` varchar(100) DEFAULT NULL,
  `follow_up_date` date DEFAULT NULL,
  `active` varchar(10) NOT NULL DEFAULT 'no',
  `assigned` varchar(10) NOT NULL DEFAULT 'no',
  `disposed` varchar(10) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `first_name`, `middle_name`, `last_name`, `gender`, `email`, `mobile`, `status`, `address`, `profession`, `follow_up_date`, `active`, `assigned`, `disposed`) VALUES
(15, 'gagan', '', 'garg', 'male', 'gagangarg601@gmail.com', '7771997372', 'Pending', '77,vidhya nagar indore     indore  (452001)  Madhya Pradesh', NULL, '0000-00-00', 'no', 'yes', 'no'),
(16, 'ayush', '', 'dubey', 'male', 'ayushdb@gmail.com', '9644614111', 'Converted', 'kaju ka ghar    indore  (4520201)  Madhya Pradesh', NULL, '0000-00-00', 'no', 'yes', 'no'),
(17, 'amit ', '', 'gupta', 'male', 'amit@gmail.com', '7771997878', 'No Status', '77,vijay nagar indore    indore  (452001)  Madhya Pradesh', NULL, '2017-04-23', 'yes', 'yes', 'no'),
(18, 'nidhi', '', 'dhanora', 'female', 'nidhi@nipta.com', '9865986566', 'Pending', 'palasia  indore  indore  (452001)  Madhya Pradesh', NULL, '2017-04-29', 'yes', 'yes', 'no');

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

--
-- Dumping data for table `comment_history`
--

INSERT INTO `comment_history` (`client_id`, `employee_id`, `date`, `comment`) VALUES
(16, 23, '2017-04-29', 'wsd ert yg hj yu i jo  wsedz x c vrft gyhui bn m,u i nm ,tg yhd cv be rt df gbh rtyu g hjk yu ioh jk lui o jk lyu  f gh 4 t yfg h5 ty ugh j klu i   x cv bfg h j bkn m, jk   xc vbn gh j kb nm hj k lm ,j kl   xc vb gth j kn m ,k l  xc v bnh j k nm ,j kl   cv bgh jkn m jk  d cfv bgn hj k nml ,  dcf g h  bnj m ,j k  c vbngh mj kn m ,jk  gbhn m,   cfvgh bj n m ,hjk d fgh j nkm ,  f gyhuhjkui'),
(16, 23, '2017-04-29', '\''),
(18, 23, '2017-04-29', '\"'),
(15, 23, '2017-04-29', '$'),
(15, 23, '2017-04-29', '#'),
(15, 23, '2017-04-29', '!'),
(16, 23, '2017-04-29', '%'),
(15, 23, '2017-04-29', '^'),
(18, 23, '2017-04-29', '&'),
(18, 23, '2017-04-29', '(');

-- --------------------------------------------------------

--
-- Table structure for table `lead_assigned_to`
--

CREATE TABLE `lead_assigned_to` (
  `employee_id` int(11) DEFAULT NULL,
  `lead_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `lead_assigned_to`
--

INSERT INTO `lead_assigned_to` (`employee_id`, `lead_id`) VALUES
(21, 15),
(21, 16),
(22, 17),
(22, 18);

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
  `gender` varchar(50) NOT NULL,
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
  `mobile` varchar(20) NOT NULL,
  `manager_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`employee_id`, `username`, `password`, `first_name`, `last_name`, `middle_name`, `gender`, `dob`, `doj`, `father_name`, `address`, `role`, `email`, `activation_code`, `forgotten_password`, `remember_code`, `last_login`, `active`, `mobile`, `manager_id`) VALUES
(21, 'ayush1', '$2y$12$LyGYZxJTR3LDS42jAeVHueO.n0K0BZmnOiV/x/.cdel.HxXmK8S7e', 'Ayush', 'Dubey', '', '', '1996-05-10', '2016-05-23', 'Umashanker', 'cnskn  dncns  indore  (452001)  Madhya Pradesh', 'employee', 'asmk@asd.com', NULL, NULL, NULL, '2017-04-29 09:08:59', 0, '9644614111', 0),
(22, 'ayush2', '$2y$12$bE/0gEPgern1CUWDoL16wOUNVXm8TayxvY2ZFafy64mK0kevdyYw2', 'aysh', 'dubey', '', '', '2016-11-02', '2016-10-30', 'ejrewpii`', 'djfpc  fnodsnc  ind  (46545465)  Arunachal Pradesh', 'employee', 'asmk@asd.com', NULL, NULL, NULL, '2017-04-29 09:02:33', 0, '9638527410', 0),
(23, 'ayush', '$2y$12$18cy5FUyBEIy76ptj3EtXundTVAloi7YGMeWL1O7XviyNsfV.gzai', 'Ayush', 'Dubey', '', 'male', '1996-05-10', '2017-02-24', 'Umashanker', 'Navlakha Indore', 'admin', 'ayushdb@gmail.com', NULL, NULL, NULL, '2017-04-30 02:46:54', 0, '9638527410', 0),
(24, 'amit', '$2y$12$RhRmjp2xH3rTS8aleq5v7uJIfC2qMVM/nN0j.eKo01SFXs/2fKDLa', 'Amit', 'Gupta', '', 'male', '1997-02-07', '2017-12-31', 'wsfqw', 'djfpc  fnodsnc  indore  (452001)  Mizoram', 'manager', 'asmk@asd.com', NULL, NULL, NULL, '2017-04-30 01:56:16', 0, '9638527410', 0);

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
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment_history`
--
ALTER TABLE `comment_history`
  ADD CONSTRAINT `add to client` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `add to users ` FOREIGN KEY (`employee_id`) REFERENCES `users` (`employee_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `lead_assigned_to`
--
ALTER TABLE `lead_assigned_to`
  ADD CONSTRAINT `add_to_client` FOREIGN KEY (`lead_id`) REFERENCES `client` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `add_to_users` FOREIGN KEY (`employee_id`) REFERENCES `users` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
