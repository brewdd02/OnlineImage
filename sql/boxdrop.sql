-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 06, 2016 at 10:29 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boxdrop`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fileLoc` varchar(255) NOT NULL,
  `mimeType` varchar(50) DEFAULT NULL,
  `size` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `username`, `fileLoc`, `mimeType`, `size`, `date`) VALUES
(47, 'brett', 'brett/The Colleague - Task 8.docx', 'application/vnd.openxmlformats-officedocument.word', '2145749', '2016-12-06 01:37:31'),
(48, 'brett', 'brett/dashboard.html', 'text/html', '2489', '2016-12-06 01:37:31'),
(49, 'brett', 'brett/Reviews.sql', 'application/octet-stream', '1718', '2016-12-06 01:37:31'),
(50, 'brett', 'brett/HW8.docx', 'application/vnd.openxmlformats-officedocument.word', '19008', '2016-12-06 01:37:31'),
(51, 'brett', 'brett/example_JQuery.zip', 'application/zip', '91993', '2016-12-06 01:37:31'),
(52, 'brett', 'brett/Chapter4 (1).ppt', 'application/vnd.ms-powerpoint', '441344', '2016-12-06 01:38:36'),
(53, 'brett', 'brett/Chapter6 (1).ppt', 'application/vnd.ms-powerpoint', '629248', '2016-12-06 01:38:37'),
(54, 'brett', 'brett/Exam2StudyGuide (1).doc', 'application/msword', '50176', '2016-12-06 01:38:37'),
(55, 'brett', 'brett/CourseEvaluation.sql', 'application/octet-stream', '1390', '2016-12-06 01:38:37'),
(56, 'brett', 'brett/Project2(1).docx', 'application/vnd.openxmlformats-officedocument.word', '30806', '2016-12-06 01:38:37'),
(57, 'brett', 'brett/The Colleague - Task 5.docx', 'application/vnd.openxmlformats-officedocument.word', '1330591', '2016-12-06 01:38:37'),
(58, 'brett', 'brett/English W234 Proposal Assignment.docx', 'application/vnd.openxmlformats-officedocument.word', '21845', '2016-12-06 01:42:45'),
(59, 'brett', 'brett/More on Ch14.ppt', 'application/vnd.ms-powerpoint', '1253376', '2016-12-06 01:42:45'),
(60, 'brett', 'brett/Activity Diagrams.zip', 'application/zip', '144468', '2016-12-06 01:42:45'),
(61, 'brett', 'brett/Brett_Galloway_CS274_HW2.docx', 'application/vnd.openxmlformats-officedocument.word', '21063', '2016-12-06 01:42:45'),
(62, 'brett', 'brett/CS27400Chapter3-2.ppt', 'application/vnd.ms-powerpoint', '7276544', '2016-12-06 01:42:46'),
(63, 'brett', 'brett/CS27400Chapter3-3.ppt', 'application/vnd.ms-powerpoint', '7276544', '2016-12-06 01:42:46'),
(64, 'brett', 'brett/CS27400Chapter3.ppt', 'application/vnd.ms-powerpoint', '7273472', '2016-12-06 01:42:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(4, '123', '$2y$10$GtWxS0Q8MzD/R1v98rs5.uEpY41ekt3nluJUaSZuxKv4aR..qkPEq'),
(5, 'brett', '$2y$10$xhaZ9MaQd6D0ldPRIwGII.XRfyp2O/hdierZ2W99imxnzmpqT8dUO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
