-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2016 at 01:38 PM
-- Server version: 5.5.50-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cs372_hw`
--

-- --------------------------------------------------------

--
-- Table structure for table `CourseEvaluation`
--

CREATE TABLE IF NOT EXISTS `CourseEvaluation` (
  `CourseID` int(11) NOT NULL,
  `ProfessorID` int(11) DEFAULT NULL,
  `Evaluation` double DEFAULT NULL,
  PRIMARY KEY (`CourseID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CourseEvaluation`
--

INSERT INTO `CourseEvaluation` (`CourseID`, `ProfessorID`, `Evaluation`) VALUES
(1, 1, 4),
(2, 2, 3.5),
(3, 3, 4),
(4, 4, 3.3),
(5, 5, 3),
(6, 6, 2),
(7, 7, 2.8),
(8, 8, 3.5),
(9, 9, 3.9),
(10, 10, 4),
(11, 10, 3.9),
(12, 10, 3.8),
(13, 11, 4),
(14, 8, 2.1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
