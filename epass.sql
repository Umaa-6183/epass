-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2017 at 01:19 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `epass`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`admin_id`),
  KEY `fk_username1` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`) VALUES
(1, 'ameer');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `passenger_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `valid_from` date NOT NULL,
  `valid_upto` date NOT NULL,
  `pass_type` varchar(255) NOT NULL,
  `payment_status` tinyint(1) NOT NULL,
  KEY `fk_pas_id` (`passenger_id`),
  KEY `fk_route3_id` (`route_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `conductor`
--

CREATE TABLE IF NOT EXISTS `conductor` (
  `conductor_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`conductor_id`),
  KEY `fk_adminId3` (`admin_id`),
  KEY `fk_route_id5` (`route_id`),
  KEY `fk_username2` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `normal`
--

CREATE TABLE IF NOT EXISTS `normal` (
  `passenger_id` int(11) NOT NULL,
  KEY `fk_pas4_id` (`passenger_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE IF NOT EXISTS `passenger` (
  `passenger_id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_id` varchar(255) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`passenger_id`),
  UNIQUE KEY `unique_id` (`unique_id`),
  KEY `fk_username3` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE IF NOT EXISTS `rates` (
  `senior_amt` int(10) NOT NULL,
  `normal_amt` int(10) NOT NULL,
  `student_amt` int(10) NOT NULL,
  `route_id` int(11) NOT NULL,
  KEY `fk_route4_id` (`route_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`senior_amt`, `normal_amt`, `student_amt`, `route_id`) VALUES
(13, 26, 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `rides`
--

CREATE TABLE IF NOT EXISTS `rides` (
  `ride_date` timestamp NOT NULL,
  `passenger_id` int(11) NOT NULL,
  `route_id` int(11) DEFAULT NULL,
  KEY `fk_pas2_id` (`passenger_id`),
  KEY `fk_rid` (`route_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE IF NOT EXISTS `routes` (
  `route_id` int(11) NOT NULL AUTO_INCREMENT,
  `station_1` varchar(255) NOT NULL,
  `station_2` varchar(255) NOT NULL,
  `distance` int(255) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `route_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`route_id`),
  KEY `fk_adminId4` (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`route_id`, `station_1`, `station_2`, `distance`, `admin_id`, `route_status`) VALUES
(2, 'mapusa', 'margao', 33, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `senior`
--

CREATE TABLE IF NOT EXISTS `senior` (
  `senior_id` varchar(255) NOT NULL,
  `passenger_id` int(11) NOT NULL,
  KEY `fk_pas5_id` (`passenger_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `institute_name` varchar(255) NOT NULL,
  `institute_id` varchar(255) NOT NULL,
  `passenger_id` int(11) NOT NULL,
  `account_exp` date DEFAULT NULL,
  KEY `fk_pas3_id` (`passenger_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `sign` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_username1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `fk_route3_id` FOREIGN KEY (`route_id`) REFERENCES `routes` (`route_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pas_id` FOREIGN KEY (`passenger_id`) REFERENCES `passenger` (`passenger_id`) ON UPDATE CASCADE;

--
-- Constraints for table `conductor`
--
ALTER TABLE `conductor`
  ADD CONSTRAINT `fk_username2` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_adminId3` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_route_id5` FOREIGN KEY (`route_id`) REFERENCES `routes` (`route_id`);

--
-- Constraints for table `normal`
--
ALTER TABLE `normal`
  ADD CONSTRAINT `fk_pas4_id` FOREIGN KEY (`passenger_id`) REFERENCES `passenger` (`passenger_id`) ON UPDATE CASCADE;

--
-- Constraints for table `passenger`
--
ALTER TABLE `passenger`
  ADD CONSTRAINT `fk_username3` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `rates`
--
ALTER TABLE `rates`
  ADD CONSTRAINT `fk_route4_id` FOREIGN KEY (`route_id`) REFERENCES `routes` (`route_id`) ON UPDATE CASCADE;

--
-- Constraints for table `rides`
--
ALTER TABLE `rides`
  ADD CONSTRAINT `fk_rid` FOREIGN KEY (`route_id`) REFERENCES `routes` (`route_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pas2_id` FOREIGN KEY (`passenger_id`) REFERENCES `passenger` (`passenger_id`) ON UPDATE CASCADE;

--
-- Constraints for table `routes`
--
ALTER TABLE `routes`
  ADD CONSTRAINT `fk_adminId4` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `senior`
--
ALTER TABLE `senior`
  ADD CONSTRAINT `fk_pas5_id` FOREIGN KEY (`passenger_id`) REFERENCES `passenger` (`passenger_id`) ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_pas3_id` FOREIGN KEY (`passenger_id`) REFERENCES `passenger` (`passenger_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
