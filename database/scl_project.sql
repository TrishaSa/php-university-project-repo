-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2023 at 09:08 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scl_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `basic_info`
--

CREATE TABLE `basic_info` (
  `id` int(10) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `email` varchar(20) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `phone` int(15) DEFAULT NULL,
  `district` varchar(20) NOT NULL DEFAULT '0',
  `thana` varchar(20) NOT NULL DEFAULT '0',
  `address` varchar(70) CHARACTER SET utf8 COLLATE utf8_croatian_ci DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_croatian_ci DEFAULT NULL,
  `file_name` varchar(20) NOT NULL,
  `sign` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `accept_status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '1 = active, 0 = inactive',
  `terms` tinyint(2) NOT NULL COMMENT '1 = agree, 0',
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `basic_info`
--

INSERT INTO `basic_info` (`id`, `name`, `email`, `dob`, `phone`, `district`, `thana`, `address`, `gender`, `image`, `file_name`, `sign`, `accept_status`, `terms`, `created_by`, `created_at`, `updated_at`, `updated_by`) VALUES
(37, 'sanab', 'sanab@gmail.com', '2012-05-28', 1521435687, '', '', '', 'Female', 'Untitled.jpg', '', '', 0, 0, NULL, NULL, NULL, NULL),
(59, 'trisha', 'trisha.ossp@gmail.co', '2023-06-10', 1621537456, '1', '1', 'db', 'Female', 'Untitled.jpg', 'df', 'Oprah-Winfrey-Signature-1.png', 0, 1, NULL, NULL, NULL, NULL),
(60, 'tr', 'tr@gmail.com', '2023-06-08', 1621638634, '1', '1', 'drfeds', 'Female', 'bg-2.jpg', 'hhyf', 'Oprah-Winfrey-Signature-1.png', 0, 1, NULL, NULL, NULL, NULL),
(61, 'fdgdg', 'fd@gmail.com', '0000-00-00', 156778899, '', '', '', 'Female', 'file-20191203-66986-im7o5 (1).png', '', 'Screenshot (4).png', 0, 1, NULL, NULL, NULL, NULL),
(62, 'Trisha', 'tri@gmail.com', '2023-06-06', 1621638635, '1', '1', 'wwe', 'Female', 'Untitled.jpg', 'dfg', 'bg-2.jpg', 0, 1, NULL, NULL, NULL, NULL),
(63, 'pizza', 'alialom@gmailcom', '2023-06-08', 1621345678, '0', '0', NULL, 'Female', NULL, 'rtgyr', NULL, 0, 1, NULL, '2023-06-22 05:54:15', '2023-06-22 05:54:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `district_id` int(50) NOT NULL,
  `district_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_id`, `district_name`) VALUES
(1, 'Dhaka'),
(2, 'Chittagong'),
(3, 'Rajshahi'),
(4, 'Sylhet'),
(5, 'Faridpur'),
(6, 'Gazipur'),
(7, 'Gopalganj'),
(8, 'Jamalpur');

-- --------------------------------------------------------

--
-- Table structure for table `education_list`
--

CREATE TABLE `education_list` (
  `id` int(11) NOT NULL,
  `Institute_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_croatian_ci DEFAULT NULL,
  `degree` varchar(20) CHARACTER SET utf8 COLLATE utf8_croatian_ci DEFAULT NULL,
  `passing_year` int(5) DEFAULT NULL,
  `result` varchar(8) DEFAULT NULL,
  `app_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education_list`
--

INSERT INTO `education_list` (`id`, `Institute_name`, `degree`, `passing_year`, `result`, `app_id`) VALUES
(4, 'sff', 'fs', 2424, '43', 0),
(5, 'sff', 'fs', 2424, '43', 0),
(6, 'sff', 'fs', 2424, '43', 0),
(7, 'sff', 'fs', 2424, '43', 0),
(8, 'sff', 'fs', 2424, '43', 0),
(18, 'sff', 'fs', 2424, '43', 0),
(19, 'sff', 'fs', 2424, '43', 0),
(20, 'sff', 'fs', 2424, '43', 0),
(21, 'sff', 'fs', 2424, '43', 0),
(22, 'sff', 'fs', 2424, '43', 0),
(23, 'sff', 'fs', 2424, '43', 0),
(24, 'sff', 'fs', 2424, '43', 0),
(25, 'sff', 'fs', 2424, '43', 0),
(26, 'sff', 'fs', 2424, '43', 0),
(27, 'sff', 'fs', 2424, '43', 0),
(28, 'sff', 'fs', 2424, '43', 0),
(29, 'sff', 'fs', 2424, '43', 0),
(30, 'sff', 'fs', 2424, '43', 0),
(31, 'sff', 'fs', 2424, '43', 0),
(32, 'sff', 'fs', 2424, '43', 0),
(33, 'sff', 'fs', 2424, '43', 0),
(34, 'sff', 'fs', 2424, '43', 0),
(35, 'sff', 'fs', 2424, '43', 0),
(36, 'sff', 'fs', 2424, '43', 0),
(37, 'sff', 'fs', 2424, '43', 0),
(38, 'sff', 'fs', 2424, '43', 0),
(39, 'sff', 'fs', 2424, '43', 0),
(40, 'knhju ', 'ml', 657, '56', 49),
(41, 'abc School', 'SSC', 2014, '5', 50),
(42, 'xyz College', 'HSC', 2016, '5', 50),
(43, 'BAIUST', 'BSc', 2021, '3.80', 50),
(44, '', '', 0, '', 51),
(45, '', '', 0, '', 52),
(46, 'gdg', 'fhfh', 345, '4', 53),
(47, 'sdf', 'dfd', 34, '4', 53),
(48, '', '', 0, '', 54),
(49, 'Institute 1', 'Cse', 2016, '4', 55),
(50, 'Institute 2', 'Cse', 2014, '3', 55),
(51, '', '', 0, '', 56),
(52, 'fg', 'gbf', 0, 'we4', 57),
(53, '', '', 0, '', 58),
(54, 'ffgcbfg', 'fgbfg', 33, '3', 59),
(55, 'fdf', 'hds', 2012, '2014', 60),
(56, 'dhdhf', 'fh', 2016, '2018', 60),
(57, '', '', 0, '', 61),
(58, 'abc School', 'ssc', 2323, '2', 62);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `user_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`user_id`, `name`, `email`, `password`) VALUES
(1, 'trisha', 'trisha@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'trvcvb', 'trisha@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, '', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(4, 'trisha ', 'trisha07@gmail.com', 'f3a3f3ebf727acb1cbb58325bf1fe308'),
(5, 'hj', 'hj1@gmail.com', 'f3a3f3ebf727acb1cbb58325bf1fe308'),
(6, 'tri', 'tri@gmail.com', 'f3a3f3ebf727acb1cbb58325bf1fe308');

-- --------------------------------------------------------

--
-- Table structure for table `thana`
--

CREATE TABLE `thana` (
  `thana_id` int(255) NOT NULL,
  `thana_name` varchar(255) NOT NULL,
  `district_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thana`
--

INSERT INTO `thana` (`thana_id`, `thana_name`, `district_id`) VALUES
(1, 'Badda', 1),
(2, 'Banani', 1),
(3, 'Bangshal', 1),
(4, 'Chandgaon', 2),
(5, 'Chaowkbazar', 2),
(6, 'Baizid', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basic_info`
--
ALTER TABLE `basic_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `education_list`
--
ALTER TABLE `education_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `thana`
--
ALTER TABLE `thana`
  ADD PRIMARY KEY (`thana_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basic_info`
--
ALTER TABLE `basic_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `education_list`
--
ALTER TABLE `education_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
