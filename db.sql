-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 15, 2018 at 09:25 PM
-- Server version: 5.5.61-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `xcopy`
--

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `host` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `host`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `host`
--

CREATE TABLE IF NOT EXISTS `host` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `jon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `host`
--

INSERT INTO `host` (`id`, `name`, `jon`) VALUES
(1, 'Sadiq', '2018-10-12 17:05:59'),
(2, 'Renjith', '2018-10-12 17:43:31');

-- --------------------------------------------------------

--
-- Table structure for table `task_reg`
--

CREATE TABLE IF NOT EXISTS `task_reg` (
  `top_id` int(11) NOT NULL,
  `use_id` int(11) NOT NULL,
  `payment` int(1) DEFAULT '0',
  PRIMARY KEY (`top_id`,`use_id`),
  KEY `task_reg_ibfk_2` (`use_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_reg`
--

INSERT INTO `task_reg` (`top_id`, `use_id`, `payment`) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 4, 1),
(2, 3, 1),
(2, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `pirce` float NOT NULL,
  `host` varchar(20) DEFAULT NULL,
  `con` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `pirce`, `host`, `con`) VALUES
(1, 'Bimoedical Mod 3', 23, 'SDQ', '2018-09-20 07:39:27'),
(2, 'DSP Mod 1', 15, 'SDQ', '2018-09-20 07:39:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `psw` varchar(225) DEFAULT NULL,
  `mail` varchar(40) DEFAULT NULL,
  `act` int(1) NOT NULL DEFAULT '0',
  `con` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `psw`, `mail`, `act`, `con`) VALUES
(1, 'sumithran', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'sumithran@india.com', 1, '2018-10-02 06:06:28'),
(2, 'pranav', '04f8996da763b7a969b1028ee3007569eaf3a635486ddab211d512c85b9df8fb', 'pranav@gmail.com', 0, '2018-09-20 07:10:12'),
(3, 'kiran', '04f8996da763b7a969b1028ee3007569eaf3a635486ddab211d512c85b9df8fb', 'kiran@gmail.com', 0, '2018-09-20 07:10:12'),
(4, 'sadiq', '04f8996da763b7a969b1028ee3007569eaf3a635486ddab211d512c85b9df8fb', 'sadiq@gmail.com', 0, '2018-09-20 07:11:40'),
(5, 'rahul', 'f962ae71f4c520fa046db374db6c2dc168e79fdaf32c3d19741eb39f4e021b8f', 'rahul@gmail.com', 0, '2018-09-29 14:38:12'),
(12, 'shelsha', NULL, NULL, 0, '2018-10-11 19:02:35'),
(14, 'surumi', NULL, NULL, 0, '2018-10-11 19:15:54'),
(15, 'varhsa', NULL, NULL, 0, '2018-10-11 19:16:04');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `task_reg`
--
ALTER TABLE `task_reg`
  ADD CONSTRAINT `task_reg_ibfk_1` FOREIGN KEY (`top_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `task_reg_ibfk_2` FOREIGN KEY (`use_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;