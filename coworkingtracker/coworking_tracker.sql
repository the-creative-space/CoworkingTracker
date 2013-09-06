-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2013 at 02:20 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `coworking_tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE IF NOT EXISTS `activities` (
  `id` int(11) NOT NULL,
  `connection_id` int(11) NOT NULL,
  `type` varchar(15) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `connections`
--

CREATE TABLE IF NOT EXISTS `connections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `device_id` int(11) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `connections`
--

INSERT INTO `connections` (`id`, `device_id`, `ip`, `start_time`, `end_time`) VALUES
(3, 7, '1.555.686.999', '2013-05-22 07:14:06', '2033-05-12 08:19:09'),
(4, 7, '1.555.686.999', '2013-05-23 10:14:07', '2013-05-24 08:13:26'),
(6, 6, '1.222.333.444', '2013-05-24 09:21:10', '2034-10-24 10:23:19'),
(7, 8, '1.456.789.808', '2013-05-24 19:45:24', '2013-05-24 22:15:33'),
(8, 2, '77.0.34.56', '2013-05-28 18:51:52', '2013-05-28 19:32:23'),
(9, 6, '32.56.89.33', '2013-05-28 20:42:36', '2013-05-28 22:44:40'),
(10, 6, '32.56.89.33', '2013-05-29 16:10:41', '2013-05-29 17:00:00'),
(11, 6, '32.56.89.33', '2013-05-29 18:00:00', '2013-05-29 20:00:00'),
(12, 1, '45.65.73.123', '2013-05-29 16:11:31', '2013-05-29 17:00:00'),
(13, 2, '77.0.34.56', '2013-05-29 16:19:45', '2013-05-29 16:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE IF NOT EXISTS `devices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) DEFAULT NULL,
  `type` varchar(15) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `hostname` varchar(15) DEFAULT NULL,
  `mac` varchar(31) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `person_id`, `type`, `contact`, `hostname`, `mac`) VALUES
(1, 6, 'computer', 'Just Test', '', '01-23-45-67-89-ab'),
(2, 2, 'tablet', 'Media contact', '', '01-21-35-45-99-ab'),
(3, 4, 'tablet', 'Overtest', '', '01-97-85-57-09-ab'),
(5, 3, 'computer', 'That dude', '', '05-32-66-45-88-cd'),
(6, 6, 'computer', 'Test contact', '', '06-25-85-37-46-df'),
(7, 7, 'computer', 'Contact info', '', '05-28-24-57-68-gt'),
(8, 3, 'tablet', 'Over there and on the hill', '', '01-53-25-39-02-yo');

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE IF NOT EXISTS `memberships` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(15) NOT NULL,
  `name` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `type`, `name`, `address`) VALUES
(1, 'lite', 'Test inc.', '123 Test st. Barrie ON'),
(2, 'Full Time', 'Bob''s Crew', '777 Media ave.'),
(3, 'Lite', 'Tester Media', '88 Street st.'),
(4, 'full time', 'New media', '3 road.st barrie on');

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE IF NOT EXISTS `people` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `membership_id` int(11) DEFAULT NULL,
  `name` varchar(31) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `membership_id`, `name`) VALUES
(2, 1, 'Mr. Test'),
(3, 2, 'Bob'),
(4, 3, 'Jojo'),
(5, 2, 'Guy'),
(6, 3, 'Roger'),
(7, 4, 'Newman');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
