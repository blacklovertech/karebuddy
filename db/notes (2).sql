-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 18, 2023 at 04:12 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notes`
--

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

CREATE TABLE `dept` (
  `deptid` int NOT NULL,
  `name` varchar(350) NOT NULL,
  `descri` varchar(5000) NOT NULL,
  `imgpath` varchar(5000) NOT NULL,
  `link` varchar(4000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`deptid`, `name`, `descri`, `imgpath`, `link`) VALUES
(1, 'IT', 'Information Tehcnology', 'image1.jpg', ''),
(2, 'MECH', '', 'image2.jpg', ''),
(3, 'CIVIL', '', 'image3.jpg', ''),
(4, 'CSE\r\n', '', 'image4.jpg', ''),
(5, 'BCA', '', 'image5.jpg', ''),
(6, 'EEE', '', 'image6.jpg', ''),
(7, 'BIOTECH', '', 'image2.jpg', ''),
(8, 'FOODTECH', '', 'image1.jpg', ''),
(9, 'AGRI', '', 'image4.jpg', ''),
(10, 'HORTI', '', 'image2.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `extra`
--

CREATE TABLE `extra` (
  `id` int NOT NULL,
  `name` varchar(4000) NOT NULL,
  `descri` varchar(4000) NOT NULL,
  `link` varchar(4000) NOT NULL,
  `imgpath` varchar(4000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `extra`
--

INSERT INTO `extra` (`id`, `name`, `descri`, `link`, `imgpath`) VALUES
(1, 'non-cgpa', 'Need Enough fun, check here man.', '', 'block/block1.png'),
(2, 'latest', 'Got, Some Spicy here, want to know get them up here lol.', '', 'block/block1.png');

-- --------------------------------------------------------

--
-- Table structure for table `otp_expiry`
--

CREATE TABLE `otp_expiry` (
  `id` int NOT NULL,
  `otp` varchar(10) NOT NULL,
  `is_expired` int NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subjectid` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `name` varchar(350) NOT NULL,
  `descri` varchar(5000) NOT NULL,
  `yearid` int NOT NULL,
  `deptid` int NOT NULL,
  `imgpath` varchar(5000) NOT NULL,
  `filepath` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subjectid`, `name`, `descri`, `yearid`, `deptid`, `imgpath`, `filepath`) VALUES
('121212', 'Web Development', 'C#', 3, 4, 'image1.jpg', NULL),
('212CSE2306', 'JAVA', '', 2, 1, 'image2.jpg', ''),
('212INT1306', 'PYTHON', 'python.', 1, 1, 'image2.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `file_id` int NOT NULL,
  `file_name` varchar(225) NOT NULL,
  `file_description` text NOT NULL,
  `file_type` varchar(225) NOT NULL,
  `file_uploader` varchar(225) NOT NULL,
  `file_uploaded_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deptid` varchar(4000) NOT NULL,
  `yearid` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `subjectid` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `file` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL DEFAULT 'not approved yet'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`file_id`, `file_name`, `file_description`, `file_type`, `file_uploader`, `file_uploaded_on`, `deptid`, `yearid`, `subjectid`, `file`, `status`) VALUES
(56, 'Mettulargy', 'demo', 'txt', 'jana', '2023-05-18 11:58:56', '2', '1', '212INT1306', '565834.txt', 'approved'),
(63, 'JAVA', 'programming', 'pdf', 'jana', '2023-05-18 13:10:41', '1', '2', '212INT2306', '32682.pdf', 'approved'),
(62, 'pythoncode', 'programming', 'pdf', 'jana', '2023-05-18 09:07:12', '1', '1', '212INT1306', '592350.pdf', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `about` varchar(300) NOT NULL DEFAULT 'N/A',
  `role` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `token` varchar(225) NOT NULL,
  `gender` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `course` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL DEFAULT 'profile.jpg',
  `joindate` varchar(225) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `about`, `role`, `email`, `token`, `gender`, `password`, `course`, `image`, `joindate`) VALUES
(28, 'jana', 'jana', 'N/A', 'admin', 'jkjanarthanan007@gmail.com', '', 'Male', 'Jana2307./', 'Computer Science', 'profile.jpg', 'May 17, 2023');

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `yearid` int NOT NULL,
  `desci` varchar(5000) NOT NULL,
  `imgpath` varchar(5000) NOT NULL,
  `link` varchar(5000) NOT NULL,
  `name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`yearid`, `desci`, `imgpath`, `link`, `name`) VALUES
(1, '', '', '', '1'),
(2, '', '', '', '2'),
(3, '', '', '', '3'),
(4, '', '', '', '4\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dept`
--
ALTER TABLE `dept`
  ADD PRIMARY KEY (`deptid`);

--
-- Indexes for table `extra`
--
ALTER TABLE `extra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subjectid`),
  ADD KEY `deptid` (`deptid`),
  ADD KEY `yearid` (`yearid`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `year`
--
ALTER TABLE `year`
  ADD UNIQUE KEY `yearid` (`yearid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `file_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`deptid`) REFERENCES `dept` (`deptid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_ibfk_2` FOREIGN KEY (`yearid`) REFERENCES `year` (`yearid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
