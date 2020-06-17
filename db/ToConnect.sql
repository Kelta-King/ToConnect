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
