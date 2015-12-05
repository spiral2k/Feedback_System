-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Sep 07, 2015 at 11:17 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feedback_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `Id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Family` text NOT NULL,
  `User_name` text NOT NULL,
  `Password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `Id` int(11) NOT NULL,
  `name` text NOT NULL,
  `num_of_students` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`Id`, `name`, `num_of_students`) VALUES
(453, '38?6 ?????', 21),
(738, '38?5 ?????', 23);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `Id` int(11) NOT NULL,
  `name` text NOT NULL,
  `Id_megama` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `final_feedbacks`
--

CREATE TABLE `final_feedbacks` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `year` int(4) NOT NULL,
  `answers` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `final_feedbacks`
--

INSERT INTO `final_feedbacks` (`id`, `class_id`, `year`, `answers`) VALUES
(1, 385, 2019, 'שאלה ניסוי 1#1*1$$שאלה ניסוי 2#2*3$$שאלה נוספת בלה בלה#3*2$$שאלה נוספת 3#4*5$$'),
(2, 385, 2019, '#*1$$#*1$$#*1$$#*1$$'),
(3, 385, 2019, '#*2$$#*2$$#*2$$#*2$$'),
(4, 385, 2019, 'שאלה ניסוי 1#1*3$$שאלה ניסוי 2#2*3$$שאלה נוספת בלה בלה#3*3$$שאלה נוספת 3#4*3$$');

-- --------------------------------------------------------

--
-- Table structure for table `megama`
--

CREATE TABLE `megama` (
  `Id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question` text CHARACTER SET utf8 NOT NULL,
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question`, `id`, `type`) VALUES
('שאלה ניסוי 1', 1, 1),
('שאלה ניסוי 2', 2, 2),
('שאלה נוספת בלה בלה', 3, 1),
('שאלה נוספת 3', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `Id` int(11) NOT NULL,
  `name` text NOT NULL,
  `belong_to` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service_feedback`
--

CREATE TABLE `service_feedback` (
  `Id` int(11) NOT NULL,
  `questions` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `Id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_feedback`
--

CREATE TABLE `teacher_feedback` (
  `Id` int(11) NOT NULL,
  `questions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_final_feedback`
--

CREATE TABLE `teacher_final_feedback` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `question_teacher_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `answers` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_password`
--

CREATE TABLE `temp_password` (
  `password` text NOT NULL,
  `class_id` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_password`
--

INSERT INTO `temp_password` (`password`, `class_id`, `year`, `Status`, `teacher_id`, `course_id`) VALUES
('abc123', 385, 2019, 1, 34, 342);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`num_of_students`);

--
-- Indexes for table `final_feedbacks`
--
ALTER TABLE `final_feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_password`
--
ALTER TABLE `temp_password`
  ADD PRIMARY KEY (`class_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
