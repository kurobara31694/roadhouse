-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 23, 2019 at 05:37 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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

DROP TABLE IF EXISTS `fuelcalc`;
CREATE TABLE IF NOT EXISTS `fuelcalc` (
  `OrderID` int(11) NOT NULL AUTO_INCREMENT,
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
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`OrderID`),
  KEY `user_id` (`cust_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fuelcalc`
--

INSERT INTO `fuelcalc` (`OrderID`, `num_gallons`, `c_month`, `c_day`, `c_year`, `price_per_gallon`, `trans_cost`, `discount`, `seasonalrate`, `GRF`, `total_price`, `cust_user_id`, `order_date`) VALUES
(66, '20', '2', '12', '2019', '100.00', '0.02', '0.01', '0.00', '0.00', '2000.60', 30, '2019-04-23 07:41:49'),
(67, '2000', '4', '13', '2019', '1.77', '0.02', '0.00', '0.00', '0.00', '3540.00', 31, '2019-04-23 09:30:47'),
(68, '2', '3', '23', '2019', '1.77', '0.02', '0.01', '0.00', '0.00', '3.54', 31, '2019-04-23 09:32:49'),
(69, '20', '4', '31', '2019', '1.77', '0.02', '0.01', '0.00', '0.00', '35.40', 30, '2019-04-23 10:15:08'),
(70, '35', '4', '30', '2019', '1.77', '0.02', '0.01', '0.00', '0.00', '61.95', 30, '2019-04-23 10:25:56'),
(71, '40', '5', '31', '2019', '1.77', '0.02', '0.01', '0.00', '0.00', '70.80', 30, '2019-04-23 10:27:28'),
(72, '50', '4', '4', '2019', '1.77', '0.02', '0.01', '0.00', '0.00', '88.50', 30, '2019-04-23 10:29:06'),
(73, '40', '4', '12', '2019', '1.77', '0.02', '0.01', '0.00', '0.00', '70.80', 30, '2019-04-23 10:29:51'),
(74, '30', '8', '18', '2019', '1.77', '0.02', '0.01', '0.00', '0.00', '53.10', 30, '2019-04-23 10:30:19'),
(75, '30', '8', '30', '2019', '1.77', '0.02', '0.01', '0.00', '0.00', '53.10', 30, '2019-04-23 10:32:04'),
(76, '30', '9', '31', '2019', '1.76', '0.02', '0.01', '0.03', '0.03', '52.65', 30, '2019-04-23 10:40:07'),
(77, '40', '11', '10', '2019', '1.76', '0.02', '0.01', '0.03', '0.03', '70.20', 30, '2019-04-23 10:47:37'),
(78, '3', '5', '5', '2019', '1.77', '0.02', '0.01', '0.04', '0.03', '5.31', 30, '2019-04-23 14:00:09'),
(90, '120', '8', '20', '2019', '1.77', '0.02', '0.01', '0.04', '0.03', '212.40', 30, '2019-04-23 16:00:19'),
(91, '10', '8', '1', '2019', '1.77', '0.02', '0.01', '0.04', '0.03', '17.70', 30, '2019-04-23 16:07:10');

-- --------------------------------------------------------

--
-- Stand-in structure for view `fuelhistory`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `fuelhistory`;
CREATE TABLE IF NOT EXISTS `fuelhistory` (
`user_id` int(11)
,`order_date` timestamp
,`address` varchar(30)
,`state` varchar(2)
,`zip` varchar(10)
,`c_month` varchar(11)
,`c_day` varchar(11)
,`c_year` varchar(11)
,`num_gallons` varchar(11)
,`price_per_gallon` decimal(13,2)
,`total_price` decimal(13,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `full_name` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `address` varchar(30) NOT NULL,
  `city` varchar(15) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip` varchar(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`user_id`, `user_name`, `full_name`, `password`, `address`, `city`, `state`, `zip`) VALUES
(30, 'Robin', 'Dick Grayson', 'batmansux', '12345 Batcave', 'Gotham City', 'NY', '77545'),
(31, 'Ailey', 'Ailey James', 'ailey', '1322 Noble Glen Drive', 'Fresno', 'TX', '77545'),
(32, 'beep', 'booty guru', 'been', '1222 banana rama', 'fresno', 'TX', '77545');

-- --------------------------------------------------------

--
-- Structure for view `fuelhistory`
--
DROP TABLE IF EXISTS `fuelhistory`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `fuelhistory`  AS  select `l`.`user_id` AS `user_id`,`f`.`order_date` AS `order_date`,`l`.`address` AS `address`,`l`.`state` AS `state`,`l`.`zip` AS `zip`,`f`.`c_month` AS `c_month`,`f`.`c_day` AS `c_day`,`f`.`c_year` AS `c_year`,`f`.`num_gallons` AS `num_gallons`,`f`.`price_per_gallon` AS `price_per_gallon`,`f`.`total_price` AS `total_price` from (`fuelcalc` `f` left join `log` `l` on((`f`.`cust_user_id` = `l`.`user_id`))) ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fuelcalc`
--
ALTER TABLE `fuelcalc`
  ADD CONSTRAINT `fuelcalc_ibfk_1` FOREIGN KEY (`cust_user_id`) REFERENCES `log` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
