-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 20, 2018 at 02:41 PM
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
-- Table structure for table `host`
--

CREATE TABLE IF NOT EXISTS `host` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `jon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `task_reg`
--

CREATE TABLE IF NOT EXISTS `task_reg` (
  `top_id` int(11) NOT NULL,
  `use_id` int(11) NOT NULL,
  PRIMARY KEY (`top_id`,`use_id`),
  KEY `task_reg_ibfk_2` (`use_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_reg`
--

INSERT INTO `task_reg` (`top_id`, `use_id`) VALUES
(1, 1),
(1, 2),
(2, 3),
(1, 4),
(2, 5);

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
  `psw` varchar(225) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `act` int(1) NOT NULL DEFAULT '0',
  `con` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `psw`, `mail`, `act`, `con`) VALUES
(1, 'sumithran', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'sumithran@gmail.com', 1, '2018-09-20 07:05:49'),
(2, 'pranav', '04f8996da763b7a969b1028ee3007569eaf3a635486ddab211d512c85b9df8fb', 'pranav@gmail.com', 0, '2018-09-20 07:10:12'),
(3, 'kiran', '04f8996da763b7a969b1028ee3007569eaf3a635486ddab211d512c85b9df8fb', 'kiran@gmail.com', 0, '2018-09-20 07:10:12'),
(4, 'sadiq', '04f8996da763b7a969b1028ee3007569eaf3a635486ddab211d512c85b9df8fb', 'sadiq@gmail.com', 0, '2018-09-20 07:11:40'),
(5, 'rahul', '04f8996da763b7a969b1028ee3007569eaf3a635486ddab211d512c85b9df8fb', 'rahul@gmail.com', 0, '2018-09-20 07:11:40'),
(6, 'renjith', '04f8996da763b7a969b1028ee3007569eaf3a635486ddab211d512c85b9df8fb', 'renjith@gmail.com', 0, '2018-09-20 07:11:40'),
(7, 'yedu', '04f8996da763b7a969b1028ee3007569eaf3a635486ddab211d512c85b9df8fb', 'yedu@gmail.com', 0, '2018-09-20 07:11:40'),
(8, 'steeven', '04f8996da763b7a969b1028ee3007569eaf3a635486ddab211d512c85b9df8fb', 'steeven@gmail.com', 0, '2018-09-20 07:11:40'),
(9, 'shamran', '04f8996da763b7a969b1028ee3007569eaf3a635486ddab211d512c85b9df8fb', 'shamran@gmail.com', 0, '2018-09-20 07:11:40'),
(10, 'amal', '04f8996da763b7a969b1028ee3007569eaf3a635486ddab211d512c85b9df8fb', 'amal@gmail.com', 0, '2018-09-20 07:11:40'),
(11, 'anoop', '04f8996da763b7a969b1028ee3007569eaf3a635486ddab211d512c85b9df8fb', 'anoop@gmail.com', 0, '2018-09-20 07:11:40'),
(12, 'ashmin', '04f8996da763b7a969b1028ee3007569eaf3a635486ddab211d512c85b9df8fb', 'ashmin@gmail.com', 0, '2018-09-20 07:11:40'),
(13, 'alan', '04f8996da763b7a969b1028ee3007569eaf3a635486ddab211d512c85b9df8fb', 'alan@gmail.com', 0, '2018-09-20 07:11:40');

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
