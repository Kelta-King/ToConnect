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

INSERT INTO `quotes` (`quote_id`, `quote_text`) VALUES
(1, 'Be Positive'),
(2, 'Do it better'),
(3, 'The world is waiting for you');

-- --------------------------------------------------------

--
-- Table structure for table `quotes_stu`
--

CREATE TABLE `quotes_stu` (
  `quote_id` int(11) DEFAULT NULL,
  `s_id` int(11) DEFAULT NULL,
  `hit` enum('0','1') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quotes_stu`
--

INSERT INTO `quotes_stu` (`quote_id`, `s_id`, `hit`) VALUES
(2, 27, '1'),
(2, 28, '1'),
(3, 27, '1');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `s_id` int(11) NOT NULL,
  `s_rollNo` int(11) DEFAULT NULL,
  `s_name` varchar(255) DEFAULT NULL,
  `s_password` varchar(255) DEFAULT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `c_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`s_id`, `s_rollNo`, `s_name`, `s_password`, `gender`, `c_id`) VALUES
(27, 2001, 'Trial Student', '$2y$12$jV84Fse12dChZ3LcC3Oy5.hJl7icKWc8VASF.6Qb6EEGNbz//gHaK', 'Male', 10),
(28, 2002, 'Trial student 2', '$2y$12$F1bz5sl4/KigNS1RjJOzNOOBgPW1XIhUMxId1Eh8JnADlGNOTFk86', 'Male', 10);

-- --------------------------------------------------------

--
-- Table structure for table `stu_sub`
--

CREATE TABLE `stu_sub` (
  `s_id` int(11) DEFAULT NULL,
  `sub_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stu_sub`
--

INSERT INTO `stu_sub` (`s_id`, `sub_id`) VALUES
(27, 5),
(28, 5);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `sub_id` int(11) NOT NULL,
  `sub_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`sub_id`, `sub_name`) VALUES
(5, 'Maths'),
(7, 'English'),
(8, 'Sanskrit'),
(9, 'Science');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(255) DEFAULT NULL,
  `t_password` varchar(255) DEFAULT NULL,
  `t_rollNo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`t_id`, `t_name`, `t_password`, `t_rollNo`) VALUES
(16, 'Trial Teacher', '$2y$12$/9de3fBv1Va1DSdUBbRV8uQkQp1tvfjSG/zF.Z3Rb20dHHv542pcq', 1111);

-- --------------------------------------------------------

--
-- Table structure for table `tea_sub_cla`
--

CREATE TABLE `tea_sub_cla` (
  `t_id` int(11) DEFAULT NULL,
  `sub_id` int(11) DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL,
  `t_name` varchar(255) NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  `c_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tea_sub_cla`
--

INSERT INTO `tea_sub_cla` (`t_id`, `sub_id`, `c_id`, `t_name`, `sub_name`, `c_name`) VALUES
(16, 5, 10, 'Trial Teacher', 'Maths', 'Trial Class');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD UNIQUE KEY `admin_id` (`admin_id`);

--
-- Indexes for table `avg_calc_individual`
--
ALTER TABLE `avg_calc_individual`
  ADD UNIQUE KEY `uq_indi` (`s_id`,`c_id`,`sub_id`,`chp_id`),
  ADD KEY `c_avg` (`c_id`),
  ADD KEY `sub_avg` (`sub_id`),
  ADD KEY `chp_avg` (`chp_id`);

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`chp_id`),
  ADD UNIQUE KEY `uq` (`ch_no`,`c_id`,`sub_id`),
  ADD KEY `subfk` (`sub_id`),
  ADD KEY `cla` (`c_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `c_name` (`c_name`);

--
-- Indexes for table `error_data`
--
ALTER TABLE `error_data`
  ADD KEY `se_fk` (`s_id`),
  ADD KEY `ce_fk` (`c_id`),
  ADD KEY `sube_fk` (`sub_id`),
  ADD KEY `qse_fk` (`q_set_id`);

--
-- Indexes for table `indi_marks_que_sets`
--
ALTER TABLE `indi_marks_que_sets`
  ADD UNIQUE KEY `uq_indi` (`s_id`,`q_set_id`,`c_id`,`sub_id`),
  ADD KEY `qset_indi` (`q_set_id`),
  ADD KEY `c_indi` (`c_id`),
  ADD KEY `sub_indi` (`sub_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`q_id`),
  ADD KEY `chp_id` (`chp_id`),
  ADD KEY `q_set_id` (`q_set_id`);

--
-- Indexes for table `question_sets`
--
ALTER TABLE `question_sets`
  ADD PRIMARY KEY (`q_set_id`),
  ADD UNIQUE KEY `q_set_name` (`q_set_name`),
  ADD KEY `c_fk` (`c_id`),
  ADD KEY `sub_fk` (`sub_id`);

--
-- Indexes for table `que_photo`
--
ALTER TABLE `que_photo`
  ADD KEY `q_photo_fk` (`q_id`);

--
-- Indexes for table `que_stu_answer`
--
ALTER TABLE `que_stu_answer`
  ADD UNIQUE KEY `q_s_uq` (`q_id`,`s_id`),
  ADD KEY `q_fk` (`q_id`),
  ADD KEY `stu_fk` (`s_id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`quote_id`);

--
-- Indexes for table `quotes_stu`
--
ALTER TABLE `quotes_stu`
  ADD UNIQUE KEY `qs_uq` (`quote_id`,`s_id`),
  ADD KEY `squot_fk` (`s_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`s_id`),
  ADD UNIQUE KEY `s_rollNo` (`s_rollNo`),
  ADD KEY `stu_class` (`c_id`);

--
-- Indexes for table `stu_sub`
--
ALTER TABLE `stu_sub`
  ADD UNIQUE KEY `uq` (`s_id`,`sub_id`),
  ADD KEY `sub` (`sub_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `t_rollNo` (`t_rollNo`);

--
-- Indexes for table `tea_sub_cla`
--
ALTER TABLE `tea_sub_cla`
  ADD UNIQUE KEY `uq` (`t_id`,`sub_id`,`c_id`),
  ADD KEY `subj` (`sub_id`),
  ADD KEY `cla` (`c_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `chp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `question_sets`
--
ALTER TABLE `question_sets`
  MODIFY `q_set_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `quote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `avg_calc_individual`
--
ALTER TABLE `avg_calc_individual`
  ADD CONSTRAINT `c_avg` FOREIGN KEY (`c_id`) REFERENCES `classes` (`c_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chp_avg` FOREIGN KEY (`chp_id`) REFERENCES `chapters` (`chp_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `s_avg` FOREIGN KEY (`s_id`) REFERENCES `students` (`s_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sub_avg` FOREIGN KEY (`sub_id`) REFERENCES `subjects` (`sub_id`) ON DELETE CASCADE;

--
-- Constraints for table `chapters`
--
ALTER TABLE `chapters`
  ADD CONSTRAINT `cla` FOREIGN KEY (`c_id`) REFERENCES `classes` (`c_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subfk` FOREIGN KEY (`sub_id`) REFERENCES `subjects` (`sub_id`) ON DELETE CASCADE;

--
-- Constraints for table `indi_marks_que_sets`
--
ALTER TABLE `indi_marks_que_sets`
  ADD CONSTRAINT `c_indi` FOREIGN KEY (`c_id`) REFERENCES `classes` (`c_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `qset_indi` FOREIGN KEY (`q_set_id`) REFERENCES `question_sets` (`q_set_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `s_indi` FOREIGN KEY (`s_id`) REFERENCES `students` (`s_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sub_indi` FOREIGN KEY (`sub_id`) REFERENCES `subjects` (`sub_id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`chp_id`) REFERENCES `chapters` (`chp_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`q_set_id`) REFERENCES `question_sets` (`q_set_id`) ON DELETE CASCADE;

--
-- Constraints for table `question_sets`
--
ALTER TABLE `question_sets`
  ADD CONSTRAINT `c_fk` FOREIGN KEY (`c_id`) REFERENCES `classes` (`c_id`),
  ADD CONSTRAINT `sub_fk` FOREIGN KEY (`sub_id`) REFERENCES `subjects` (`sub_id`);

--
-- Constraints for table `que_photo`
--
ALTER TABLE `que_photo`
  ADD CONSTRAINT `q_photo_fk` FOREIGN KEY (`q_id`) REFERENCES `questions` (`q_id`);

--
-- Constraints for table `que_stu_answer`
--
ALTER TABLE `que_stu_answer`
  ADD CONSTRAINT `q_fk` FOREIGN KEY (`q_id`) REFERENCES `questions` (`q_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stu_fk` FOREIGN KEY (`s_id`) REFERENCES `students` (`s_id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `stu_class` FOREIGN KEY (`c_id`) REFERENCES `classes` (`c_id`) ON DELETE CASCADE;

--
-- Constraints for table `stu_sub`
--
ALTER TABLE `stu_sub`
  ADD CONSTRAINT `stu` FOREIGN KEY (`s_id`) REFERENCES `students` (`s_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sub` FOREIGN KEY (`sub_id`) REFERENCES `subjects` (`sub_id`) ON DELETE CASCADE;

--
-- Constraints for table `tea_sub_cla`
--
ALTER TABLE `tea_sub_cla`
  ADD CONSTRAINT `clas` FOREIGN KEY (`c_id`) REFERENCES `classes` (`c_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subj` FOREIGN KEY (`sub_id`) REFERENCES `subjects` (`sub_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tea` FOREIGN KEY (`t_id`) REFERENCES `teachers` (`t_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
