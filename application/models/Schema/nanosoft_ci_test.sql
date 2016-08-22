-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 22, 2016 at 06:33 AM
-- Server version: 5.7.13-0ubuntu0.16.04.2
-- PHP Version: 5.6.24-1+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nanosoft_ci_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `status` enum('absent','present') NOT NULL,
  `created` varchar(16) DEFAULT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `employee_id`, `status`, `created`, `modified`) VALUES
(66, 1056, 'present', '2016-08-21', '0000-00-00 00:00:00'),
(67, 1002, 'absent', '2016-08-22', '0000-00-00 00:00:00'),
(68, 1143, 'absent', '2016-08-22', '0000-00-00 00:00:00'),
(69, 1165, 'present', '2016-08-22', '0000-00-00 00:00:00'),
(70, 1076, 'absent', '2016-08-20', '0000-00-00 00:00:00'),
(71, 1166, 'absent', '2016-08-22', '0000-00-00 00:00:00'),
(72, 1188, 'present', '2016-08-22', '0000-00-00 00:00:00'),
(73, 1076, 'present', '2016-08-22', '0000-00-00 00:00:00'),
(74, 1056, 'absent', '2016-08-22', '0000-00-00 00:00:00'),
(75, 1337, 'present', '2016-08-22', '0000-00-00 00:00:00'),
(76, 1102, 'present', '2016-08-20', '0000-00-00 00:00:00'),
(77, 1216, 'present', '2016-08-22', '0000-00-00 00:00:00'),
(78, 1370, 'present', '2016-08-20', '0000-00-00 00:00:00'),
(79, 1286, 'present', '2016-08-22', '0000-00-00 00:00:00'),
(80, 1401, 'absent', '2016-08-21', '0000-00-00 00:00:00'),
(81, 1501, 'present', '2016-08-22', '0000-00-00 00:00:00'),
(82, 1323, 'absent', '2016-08-22', '0000-00-00 00:00:00'),
(83, 1612, 'absent', '2016-08-22', '0000-00-00 00:00:00'),
(84, 1370, 'absent', '2016-08-22', '0000-00-00 00:00:00'),
(85, 1401, 'present', '2016-08-22', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `email` varchar(100) NOT NULL,
  `designation` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `first_name`, `last_name`, `email`, `designation`) VALUES
(1002, 'Dianel', 'Murphy', 'dmurphy@classicmodelcars.com', 'President'),
(1056, 'Mary', 'Patterson', 'mpatterso@classicmodelcars.com', 'VP Sales'),
(1076, 'Jeff', 'Firrelli', 'jfirrelli@classicmodelcars.com', 'VP Marketing'),
(1088, 'William', 'Patterson', 'wpatterson@classicmodelcars.com', 'Sales Manager (APAC)'),
(1102, 'Gerard', 'Bondur', 'gbondur@classicmodelcars.com', 'Sale Manager (EMEA)'),
(1143, 'Anthony', 'Bow', 'abow@classicmodelcars.com', 'Sales Manager (NA)'),
(1165, 'Leslie', 'Jennings', 'ljennings@classicmodelcars.com', 'Sales Rep'),
(1166, 'Leslie', 'Thompson', 'lthompson@classicmodelcars.com', 'Sales Rep'),
(1188, 'Julie', 'Firrelli', 'jfirrelli@classicmodelcars.com', 'Sales Rep'),
(1216, 'Steve', 'Patterson', 'spatterson@classicmodelcars.com', 'Sales Rep'),
(1286, 'Foon Yue', 'Tseng', 'ftseng@classicmodelcars.com', 'Sales Rep'),
(1323, 'George', 'Vanauf', 'gvanauf@classicmodelcars.com', 'Sales Rep'),
(1337, 'Loui', 'Bondur', 'lbondur@classicmodelcars.com', 'Sales Rep'),
(1370, 'Gerard', 'Hernandez', 'ghernande@classicmodelcars.com', 'Sales Rep'),
(1401, 'Pamela', 'Castillo', 'pcastillo@classicmodelcars.com', 'Sales Rep'),
(1501, 'Larry', 'Bott', 'lbott@classicmodelcars.com', 'Sales Rep'),
(1504, 'Barry', 'Jones', 'bjones@classicmodelcars.com', 'Sales Rep'),
(1611, 'Andy', 'Fixter', 'afixter@classicmodelcars.com', 'Sales Rep'),
(1612, 'Peter', 'Marsh', 'pmarsh@classicmodelcars.com', 'Sales Rep'),
(1619, 'Tom', 'King', 'tking@classicmodelcars.com', 'Sales Rep'),
(1621, 'Mami', 'Nishi', 'mnishi@classicmodelcars.com', 'Sales Rep'),
(1625, 'Yoshimi', 'Kato', 'ykato@classicmodelcars.com', 'Sales Rep'),
(1702, 'Martin', 'Gerard', 'mgerard@classicmodelcars.com', 'Sales Rep'),
(1705, 'Mami', 'Nishi', 'mnishi@classicmodelcars.com', 'Sales Rep');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1708;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
