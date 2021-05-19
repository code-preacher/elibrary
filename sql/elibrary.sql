-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2021 at 12:54 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `college_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `book` varchar(200) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `name`, `college_id`, `department_id`, `book`, `date_created`) VALUES
(2, 'Book of life', 2, 3, 'elibrary-ART-MATHEMATICS-60179cce94342.pdf', '2021-02-01 07:16:46'),
(4, 'Life and Death', 1, 1, 'elibrary-SCIENCE-MATHEMATICS-6017de5e828c0.pdf', '2021-02-01 11:56:30'),
(5, 'Sky Running', 1, 4, 'elibrary--COMPUTER-607815515fcde.pdf', '2021-04-15 11:28:33');

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`id`, `name`, `date_created`) VALUES
(1, 'SCIENCE', '2021-02-01 00:06:46'),
(2, 'ART', '2021-02-01 00:06:54');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(30) NOT NULL,
  `college_id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `college_id`, `name`, `date_created`) VALUES
(1, 1, 'MATHEMATICS', '2021-02-01 00:13:20'),
(3, 2, 'THEATRE ART', '2021-02-01 00:13:20'),
(4, 1, 'COMPUTER', '2021-02-01 00:13:20'),
(5, 1, 'BIOLOGY', '2021-02-01 00:13:20');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` int(2) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `password`, `role`, `date_created`) VALUES
(1, 'Oche', 'a@a.com', '123456', 1, '2021-01-30 14:57:12'),
(2, 'Tobi', 't@t.com', '123456', 2, '2021-01-30 20:57:40'),
(4, 'Sandraly', 's@s.com', '123456', 3, '2021-01-30 21:00:51'),
(5, 'Dave', 'BSU/SC/CMP/15/32204', '123456', 3, '2021-02-01 00:51:29'),
(7, 'Peace', 'BSU/SC/CMP/15/32208', '123456', 3, '2021-02-01 00:58:34'),
(8, 'Friday', 'BSU/SC/CMP/15/32202', '123456', 3, '2021-02-01 08:39:36'),
(10, 'Davi Petty', 'BSU/SC/CMP/15/32209', '123456', 3, '2021-04-15 11:24:26');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(30) NOT NULL,
  `sender_id` varchar(200) NOT NULL,
  `college_id` int(30) NOT NULL,
  `department_id` int(30) NOT NULL,
  `message` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `sender_id`, `college_id`, `department_id`, `message`, `date_created`) VALUES
(1, '1', 1, 1, 'hello,i need materials for chemistry', '2021-02-01 09:26:45'),
(6, '1', 1, 1, 'hello final work', '2021-04-15 11:52:32');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `matno` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `college_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `matno`, `password`, `college_id`, `department_id`, `date_created`) VALUES
(1, 'Dave', 'BSU/SC/CMP/15/32204', '123456', 1, 1, '2021-02-01 00:52:47'),
(2, 'Peace', 'BSU/SC/CMP/15/32208', '123456', 2, 1, '2021-02-01 00:58:34'),
(3, 'Friday', 'BSU/SC/CMP/15/32202', '123456', 1, 1, '2021-02-01 08:39:36'),
(5, 'Davi Petty', 'BSU/SC/CMP/15/32209', '123456', 1, 4, '2021-04-15 11:24:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
