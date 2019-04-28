-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 27, 2019 at 11:33 PM
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
  `num_gallons` varchar(11) NOT NULL,
  `c_month` varchar(11) NOT NULL,
  `c_day` varchar(11) NOT NULL,
  `c_year` varchar(11) NOT NULL,
  `price_per_gallon` decimal(13,2) NOT NULL,
  `trans_cost` decimal(13,2) NOT NULL,
  `discount` decimal(13,2) NOT NULL,
  `seasonalrate` decimal(13,2) NOT NULL,
  `GRF` decimal(13,2) NOT NULL,
  `total_price` decimal(13,2) NOT NULL,
  `cust_user_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `FuelHistory`
-- (See below for the actual view)
--
CREATE TABLE `FuelHistory` (
`user_id` int(11)
,`order_date` timestamp
,`address` varchar(30)
,`state` varchar(2)
,`zip` varchar(10)
,`c_month` varchar(11)
,`c_day` varchar(11)
,`c_year` varchar(11)
,`num_gallons` varchar(11)
,`trans_cost` decimal(13,2)
,`discount` decimal(13,2)
,`seasonalrate` decimal(13,2)
,`price_per_gallon` decimal(13,2)
,`total_price` decimal(13,2)
);

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
(34, 'exxon95', 'Exxon Industries', 'exxon@95', '2314 Exxon Drive', 'Manhattan', 'NY', '8935');

-- --------------------------------------------------------

--
-- Structure for view `FuelHistory`
--
DROP TABLE IF EXISTS `FuelHistory`;

CREATE ALGORITHM=UNDEFINED DEFINER=`playerone`@`localhost` SQL SECURITY DEFINER VIEW `FuelHistory`  AS  select `l`.`user_id` AS `user_id`,`f`.`order_date` AS `order_date`,`l`.`address` AS `address`,`l`.`state` AS `state`,`l`.`zip` AS `zip`,`f`.`c_month` AS `c_month`,`f`.`c_day` AS `c_day`,`f`.`c_year` AS `c_year`,`f`.`num_gallons` AS `num_gallons`,`f`.`trans_cost` AS `trans_cost`,`f`.`discount` AS `discount`,`f`.`seasonalrate` AS `seasonalrate`,`f`.`price_per_gallon` AS `price_per_gallon`,`f`.`total_price` AS `total_price` from (`fuelcalc` `f` left join `log` `l` on((`f`.`cust_user_id` = `l`.`user_id`))) ;

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
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
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