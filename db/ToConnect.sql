-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 29, 2020 at 11:45 AM
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
-- Database: `keltago4_Chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_clubs`
--

CREATE TABLE `chat_clubs` (
  `club_id` int(11) NOT NULL,
  `club_name` varchar(255) DEFAULT NULL,
  `club_pass` varchar(255) DEFAULT NULL,
  `club_members` int(11) DEFAULT NULL,
  `creation_time` date NOT NULL,
  `time_limit` date NOT NULL,
  `club_activation` enum('1','0') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(255) DEFAULT NULL,
  `real_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `u_password` varchar(255) DEFAULT NULL,
  `vkey` varchar(300) NOT NULL,
  `verified` enum('0','1') NOT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `theme` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_name`, `real_name`, `email`, `u_password`, `vkey`, `verified`, `gender`, `theme`) VALUES
(26, 'manman1', 'manman', 'keltaking999@gmail.com', '$2y$12$sAFf55QCpyU6K6DUUZ.hHeS7mdVy079Qn3rzsoKqOIS8dFLzorbWi', '5260b5874773dcfb3de7e0983477067c', '1', 'Male', 'w3-blue&w3-yellow&w3-red'),
(22, 'gggggg2', 'gggggg', 'ggggggfd@gmail.com', '$2y$12$7McEBjWni5rpfJSMqhJf3O2zdkwbeGjlqXoxIvTAamPgm9hewp09O', '2960d7a3de631a5cccc6709c711cfb30', '0', 'Male', 'w3-blue&w3-yellow&w3-red'),
(25, 'gggggg3', 'gggggg', 'dhrutishah7939@gmail.com', '$2y$12$fpvYDftmkiLH7MXlVdZ3me/JdTJrolUBmVngi.3m/J5bFRU/TaLhK', 'ad34a5d24f4f9c48a0d493b75e8372b9', '1', 'Male', 'pink'),
(30, 'theman1', 'theman', 'jflora028@gmail.com', '$2y$12$Lai2K/nffaXxmpnPEemfjOrGRQqkdzm/bOYyH1f/bTqniEDAdiSlW', '30da9eea65d6d137b81d2427d31f93ef', '1', 'Female', 'blue'),
(29, 'Eshaan1', 'Eshaan', 'eshaany2k@gmail.com', '$2y$12$dJAuZP7HhBz4wmKqhVqe8OZE2qyHpNP58.wmfn1MLJGxJQ3v17Hge', 'f03d85b590b20ceed942d83b44ef4a5c', '1', 'Male', 'w3-blue&w3-yellow&w3-red'),
(31, 'heyman1', 'heyman', 'drjaiminshah@yahoo.co.in', '$2y$12$9UJJNfOPOLI8T0u4JCwV2uTpS.sMhGB1czckwPq0wfCiZHm3dfwIO', 'f96d15e3f7bfc9bb7a16c4d6fb84ac4f', '1', 'Male', 'pink');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_clubs`
--
ALTER TABLE `chat_clubs`
  ADD PRIMARY KEY (`club_id`),
  ADD UNIQUE KEY `club_name` (`club_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `u_name` (`u_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_clubs`
--
ALTER TABLE `chat_clubs`
  MODIFY `club_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
