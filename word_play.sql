-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 07, 2020 at 12:53 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `word_play`
--

-- --------------------------------------------------------

--
-- Table structure for table `game_settings`
--

DROP TABLE IF EXISTS `game_settings`;
CREATE TABLE IF NOT EXISTS `game_settings` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `record_percentage` int(50) DEFAULT NULL,
  `max_records` int(50) DEFAULT NULL,
  `created_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`setting_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game_settings`
--

INSERT INTO `game_settings` (`setting_id`, `record_percentage`, `max_records`, `created_on`, `updated_on`) VALUES
(1, 80, 2, '2020-01-29 06:48:55', '2020-02-07 17:18:58');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(50) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `created_on`, `updated_on`) VALUES
(1, 'sagar@mail.com', '2020-02-07 12:19:23', NULL),
(2, 'sagar@mail.com', '2020-02-07 12:22:08', NULL),
(3, 'mehul@mail.com', '2020-02-07 12:22:23', NULL),
(4, 'mehul@mail.com', '2020-02-07 12:28:15', NULL),
(5, 'sagar@mail.com', '2020-02-07 12:30:14', NULL),
(6, 'sagar@mail.com', '2020-02-07 12:36:15', NULL),
(7, 'sagar@mail.com', '2020-02-07 12:37:42', NULL),
(8, 'sagar@mail.com', '2020-02-07 12:38:11', NULL),
(9, 'mehul@mail.com', '2020-02-07 12:40:36', NULL),
(10, 'sagar@mail.com', '2020-02-07 12:40:52', NULL),
(11, 'sagar@mail.com', '2020-02-07 12:41:24', NULL),
(12, 'mehul@mail.com', '2020-02-07 12:41:39', NULL),
(13, 'mehul@mail.com', '2020-02-07 12:42:36', NULL),
(14, 'sagar@mail.com', '2020-02-07 12:49:17', NULL),
(15, 'mehul@mail.com', '2020-02-07 12:51:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_answer`
--

DROP TABLE IF EXISTS `user_answer`;
CREATE TABLE IF NOT EXISTS `user_answer` (
  `answer_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `word_id` int(11) NOT NULL,
  `user_answer` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`answer_id`),
  KEY `user_id` (`user_id`),
  KEY `word_id` (`word_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_answer`
--

INSERT INTO `user_answer` (`answer_id`, `user_id`, `word_id`, `user_answer`, `created_on`, `updated_on`) VALUES
(1, 3, 8, 'Bootstrap', '2020-02-07 12:22:34', NULL),
(2, 3, 3, 'Rugby 7', '2020-02-07 12:22:37', NULL),
(3, 13, 3, 'Rugby 7', '2020-02-07 12:42:39', NULL),
(4, 14, 2, 'Football', '2020-02-07 12:49:25', NULL),
(5, 14, 8, 'Bootstrap', '2020-02-07 12:49:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `words`
--

DROP TABLE IF EXISTS `words`;
CREATE TABLE IF NOT EXISTS `words` (
  `word_id` int(11) NOT NULL AUTO_INCREMENT,
  `words` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`word_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `words`
--

INSERT INTO `words` (`word_id`, `words`, `created_on`, `updated_on`) VALUES
(1, 'Cricket', '2020-01-23 06:10:36', NULL),
(2, 'Volleyball', '2020-01-23 06:11:00', NULL),
(3, 'India', '2020-01-23 06:11:15', NULL),
(4, 'Football', '2020-01-23 06:11:25', NULL),
(5, 'Mercedes', '2020-01-23 06:11:58', NULL),
(6, 'JavaScript', '2020-01-23 06:12:18', NULL),
(7, 'Rugby', '2020-01-23 06:12:35', NULL),
(8, 'Bootstrap', '2020-01-23 06:12:42', NULL),
(9, 'Elephant', '2020-01-23 06:13:14', NULL),
(10, 'Mobile', '2020-01-23 06:13:31', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
