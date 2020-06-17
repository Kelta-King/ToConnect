-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 17, 2020 at 08:04 AM
-- Server version: 5.7.30
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keltago4_projecteducation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) DEFAULT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_password` varchar(255) DEFAULT NULL,
  `admin_type` enum('DIAMOND','STAR','GOLD') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_password`, `admin_type`) VALUES
(2223, 'KeltaKing', '$2y$12$PkwmVcPTzOj8W1.PZ1lb1eNxOKm3qwxvzaiRd5Bh4P7kIQO6Oa9em', 'DIAMOND'),
(1115, 'yoman', '$2y$12$grTfsqFDS5wxO84..H6Ey.FyS9HWl3ZCuZAd/u5JgmNF2bg0ns2FK', 'STAR');

-- --------------------------------------------------------

--
-- Table structure for table `avg_calc_individual`
--

CREATE TABLE `avg_calc_individual` (
  `s_id` int(11) DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL,
  `sub_id` int(11) DEFAULT NULL,
  `chp_id` int(11) DEFAULT NULL,
  `correct_answer` int(11) DEFAULT NULL,
  `total_que_attended` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `avg_calc_individual`
--

INSERT INTO `avg_calc_individual` (`s_id`, `c_id`, `sub_id`, `chp_id`, `correct_answer`, `total_que_attended`) VALUES
(28, 10, 5, 18, 6, 9),
(27, 10, 5, 18, 9, 12);

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `chp_id` int(11) NOT NULL,
  `ch_no` int(11) DEFAULT NULL,
  `ch_name` varchar(255) DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL,
  `sub_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`chp_id`, `ch_no`, `ch_name`, `c_id`, `sub_id`) VALUES
(18, 1, 'Trial', 10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`c_id`, `c_name`) VALUES
(10, 'Trial Class');

-- --------------------------------------------------------

--
-- Table structure for table `error_data`
--

CREATE TABLE `error_data` (
  `s_id` int(11) DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL,
  `sub_id` int(11) DEFAULT NULL,
  `q_set_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `indi_marks_que_sets`
--

CREATE TABLE `indi_marks_que_sets` (
  `s_id` int(11) DEFAULT NULL,
  `q_set_id` int(11) DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL,
  `sub_id` int(11) DEFAULT NULL,
  `visit` enum('0','1') NOT NULL,
  `s_marks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `indi_marks_que_sets`
--

INSERT INTO `indi_marks_que_sets` (`s_id`, `q_set_id`, `c_id`, `sub_id`, `visit`, `s_marks`) VALUES
(28, 100, 10, 5, '1', '1/2'),
(27, 100, 10, 5, '1', '1/2'),
(27, 102, 10, 5, '1', '2/2'),
(27, 103, 10, 5, '1', '2/3'),
(28, 102, 10, 5, '1', '5/5');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `q_id` int(11) NOT NULL,
  `q_data` varchar(1000) DEFAULT NULL,
  `op1` varchar(255) DEFAULT NULL,
  `op2` varchar(255) DEFAULT NULL,
  `op3` varchar(255) DEFAULT NULL,
  `op4` varchar(255) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `Hint` varchar(300) DEFAULT NULL,
  `chp_id` int(11) DEFAULT NULL,
  `q_set_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`q_id`, `q_data`, `op1`, `op2`, `op3`, `op4`, `answer`, `Hint`, `chp_id`, `q_set_id`) VALUES
(22, 'Find for x = 4 , what is the value of following? &lt;br&gt;      $$sum_{i=1}^n i = frac{(n)(n 1)}{2} $$', '4', '6', '8', '11', '8', 'follow this link  &lt;iframe width=&quot;560&quot; height=&quot;315&quot; src=&quot;https://www.youtube.com/embed/fqVUBzQIuko&quot; frameborder=&quot;0&quot; allow=&quot;accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture&quot; allowfullscreen&gt;&lt;/iframe&gt;', 18, 100),
(23, 'When \\(a \\ne 0\\), there are two solutions to \\(ax^2 + bx + c = 0\\) and they are', '$$x = {-b + \\sqrt{b^2-4ac} \\over 2a}.$$', '$$x = {-b - \\sqrt{b^2-4ac} \\over 2a}.$$', '$$x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}.$$', 'none of the above', '$$x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a}.$$', 'Follow this video link for better understanding<br><br><center>\r\n<div class=\"w3-content w3-image\">\r\n<iframe style=\"height:100%;\" src=\"https://www.youtube.com/embed/fqVUBzQIuko\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" class=\"w3-image\" allowfulls', 18, 100),
(24, 'question question question question question question question question question ', 'question ', 'question question ', 'question question ', 'question question ', 'question ', 'question question ', 18, 102),
(25, 'question question question question question question question question question question question question question ', 'question question ', 'question ', 'question ', 'question ', 'question question ', 'question ', 18, 102),
(26, 'question question question question question question question question question ', 'question ', 'question ', 'question ', 'question question ', 'question question ', 'question question question ', 18, 102),
(27, 'question question question question question ', 'question ', 'question ', 'question ', 'question question ', 'question question ', 'question question question question ', 18, 102),
(28, 'question question question question question question question question question question question question question question question ', 'question question ', 'question ', 'question ', 'question ', 'question question ', 'question question ', 18, 102),
(38, 'Trial 3Trial 3Trial 3Trial 3Trial 3Trial 3Trial 3Trial 3', 'Trial 3', 'Trial 3Trial 3', 'Trial 3Trial 3', 'Trial 3Trial 3', 'Trial 3', 'Trial 3Trial 3Trial 3Trial 3', 18, 103),
(39, 'Trial 3Trial 3Trial 3Trial 3Trial 3Trial 3Trial 3Trial 3Trial 3Trial 3Trial 3Trial 3Trial 3Trial 3Trial 3', 'Trial 3Trial 3', 'Trial 3', 'Trial 3', 'Trial 3', 'Trial 3Trial 3', 'Trial 3Trial 3Trial 3Trial 3Trial 3Trial 3Trial 3Trial 3', 18, 103),
(40, 'Trial 3Trial 3Trial 3Trial 3Trial 3Trial 3Trial 3Trial 3Trial 3Trial 3Trial 3Trial 3Trial 3Trial 3Trial 3Trial 3', 'Trial 3Trial 3', 'Trial 3', 'Trial 3', 'Trial 3', 'Trial 3Trial 3', 'Trial 3Trial 3Trial 3Trial 3Trial 3Trial 3Trial 3Trial 3Trial 3Trial 3', 18, 103);

-- --------------------------------------------------------

--
-- Table structure for table `question_sets`
--

CREATE TABLE `question_sets` (
  `q_set_id` int(11) NOT NULL,
  `q_set_name` varchar(255) DEFAULT NULL,
  `q_set_disc` varchar(1000) NOT NULL,
  `q_set_numbers` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `AI` enum('1','0') NOT NULL,
  `making_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_sets`
--

INSERT INTO `question_sets` (`q_set_id`, `q_set_name`, `q_set_disc`, `q_set_numbers`, `c_id`, `sub_id`, `AI`, `making_date`) VALUES
(100, 'trial tesr', 'trial tesrtrial tesrtrial tesrtrial tesrtrial tesrtrial tesrtrial tesrtrial tesr', 2, 10, 5, '1', '2020-05-12'),
(102, 'Trial 1', 'Trial 1Trial 1Trial 1Trial 1Trial 1Trial 1Trial 1Trial 1Trial 1Trial 1', 5, 10, 5, '1', '2020-05-15'),
(103, 'Trial 3', 'Trial 3Trial 3Trial 3Trial 3Trial 3Trial 3Trial 3', 3, 10, 5, '1', '2020-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `que_photo`
--

CREATE TABLE `que_photo` (
  `q_id` int(11) DEFAULT NULL,
  `photo` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `que_stu_answer`
--

CREATE TABLE `que_stu_answer` (
  `q_id` int(11) DEFAULT NULL,
  `s_id` int(11) DEFAULT NULL,
  `s_answer` varchar(255) DEFAULT NULL,
  `outcome` enum('correct','incorrect') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `que_stu_answer`
--

INSERT INTO `que_stu_answer` (`q_id`, `s_id`, `s_answer`, `outcome`) VALUES
(22, 28, '6', 'incorrect'),
(23, 28, '$$x = {-b pm sqrt{b^2-4ac} over 2a}.$$', 'correct'),
(22, 27, '8', 'correct'),
(23, 27, 'none of the above', 'incorrect'),
(24, 27, 'question ', 'correct'),
(25, 27, 'question question ', 'correct'),
(26, 27, 'question ', 'incorrect'),
(27, 27, 'question question ', 'correct'),
(28, 27, 'question question ', 'correct'),
(38, 27, 'Trial 3', 'correct'),
(39, 27, 'Trial 3', 'incorrect'),
(40, 27, 'Trial 3Trial 3', 'correct'),
(24, 28, 'question ', 'correct'),
(25, 28, 'question question ', 'correct'),
(26, 28, 'question question ', 'correct'),
(27, 28, 'question question ', 'correct'),
(28, 28, 'question question ', 'correct');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `quote_id` int(11) NOT NULL,
  `quote_text` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quotes`
--
