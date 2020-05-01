-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 01, 2020 at 09:05 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `b_id` int(11) NOT NULL,
  `b_name` varchar(255) NOT NULL,
  `b_au` varchar(255) NOT NULL,
  `b_cate` int(11) NOT NULL,
  `b_status` varchar(255) NOT NULL,
  `b_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`b_id`, `b_name`, `b_au`, `b_cate`, `b_status`, `b_img`) VALUES
(1, 'computer', 'top', 1, 'a', 'img01.jpg'),
(2, 'math', 'rat', 1, 'a', 'img01.jpg'),
(3, 'cartoon', 'hot', 2, 'b', 'img01.jpg'),
(4, 'gov', 'bug', 1, 'b', 'img01.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `br_id` int(11) NOT NULL,
  `b_id` varchar(255) NOT NULL,
  `stu_id` varchar(255) NOT NULL,
  `t_id` varchar(255) NOT NULL,
  `br_date_bf` date NOT NULL,
  `br_date_send` date NOT NULL,
  `br_date_af` date NOT NULL,
  `br_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`br_id`, `b_id`, `stu_id`, `t_id`, `br_date_bf`, `br_date_send`, `br_date_af`, `br_status`) VALUES
(18, '1', '1', '1', '2020-04-04', '2020-04-09', '2020-04-06', 'a'),
(19, '1', '1', '1', '2020-04-07', '2020-04-12', '2020-04-07', 'a'),
(20, '1', '1', '1', '2020-04-07', '2020-04-12', '2020-04-07', 'a'),
(21, '2', '2', '1', '2020-04-07', '2020-04-12', '2020-04-07', 'a'),
(22, '2', '2', '1', '2020-04-07', '2020-04-12', '2020-04-08', 'a'),
(23, '1', '2', '2', '2020-04-08', '2020-04-13', '2020-04-10', 'a'),
(24, '2', '2', '1', '2020-04-10', '2020-04-15', '2020-05-02', 'a'),
(25, '3', '2', '1', '2020-05-01', '2020-05-06', '0000-00-00', 'b'),
(26, '4', '1', '1', '2020-05-01', '2020-05-06', '0000-00-00', 'b');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `b_cate` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `c_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `b_cate`, `c_name`) VALUES
(1, '1', 'การศึกษา'),
(2, '2', 'การ์ตูน');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stu_id` int(11) NOT NULL,
  `stu_name` varchar(255) NOT NULL,
  `stu_grade` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stu_id`, `stu_name`, `stu_grade`) VALUES
(1, 'top', '10'),
(2, 'nut', '12');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(255) NOT NULL,
  `t_phone` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`t_id`, `t_name`, `t_phone`, `user`, `pass`) VALUES
(1, 'Arm', '014124124', 'arm', '1234'),
(2, 'Oam', '014124124', 'oam', '5678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`br_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `br_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
