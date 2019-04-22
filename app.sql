-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 21, 2019 at 11:35 PM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.17-1+ubuntu18.04.1+deb.sury.org+3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ash`
--

-- --------------------------------------------------------

--
-- Table structure for table `fuelcalc`
--

CREATE TABLE `fuelcalc` (
  `OrderID` int(11) NOT NULL,
  `num_gallons` varchar(11) DEFAULT NULL,
  `c_month` varchar(11) DEFAULT NULL,
  `c_day` varchar(11) DEFAULT NULL,
  `c_year` varchar(11) DEFAULT NULL,
  `price_per_gallon` varchar(11) DEFAULT NULL,
  `trans_cost` varchar(11) DEFAULT NULL,
  `discount` varchar(11) DEFAULT NULL,
  `competitor_price` varchar(11) DEFAULT NULL,
  `total_price` varchar(11) DEFAULT NULL,
  `cust_user_id` int(11) DEFAULT NULL,
  `order_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cust_username` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fuelcalc`
--

INSERT INTO `fuelcalc` (`OrderID`, `num_gallons`, `c_month`, `c_day`, `c_year`, `price_per_gallon`, `trans_cost`, `discount`, `competitor_price`, `total_price`, `cust_user_id`, `order_date`, `cust_username`) VALUES
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, '2019-04-21 21:12:41', '3'),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, '2019-04-21 21:29:23', '1'),
(6, '', '', '', '', '100', '0.02', '0.01', NULL, '0', NULL, '2019-04-22 04:29:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `full_name` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `address` varchar(30) NOT NULL,
  `city` varchar(15) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`user_id`, `user_name`, `full_name`, `password`, `address`, `city`, `state`, `zip`) VALUES
(15, '3', '3', '3', '3', '3', '3', '3'),
(16, '1', '1', '1', '1', '1', '1', '1');

--
-- Triggers `log`
--
DELIMITER $$
CREATE TRIGGER `add-new-user-to-fuelcalc` AFTER INSERT ON `log` FOR EACH ROW INSERT INTO fuelcalc (cust_username, cust_user_id) VALUES (new.user_name, new.user_id)
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fuelcalc`
--
ALTER TABLE `fuelcalc`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `user_id` (`cust_user_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fuelcalc`
--
ALTER TABLE `fuelcalc`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `fuelcalc`
--
ALTER TABLE `fuelcalc`
  ADD CONSTRAINT `fuelcalc_ibfk_1` FOREIGN KEY (`cust_user_id`) REFERENCES `log` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;