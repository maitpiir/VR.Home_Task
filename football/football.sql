-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 03, 2016 at 10:11 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `football`
--

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE IF NOT EXISTS `game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `home_team_id` int(11) NOT NULL,
  `away_team_id` int(11) NOT NULL,
  `homeScore` int(11) NOT NULL,
  `awayScore` int(11) NOT NULL,
  `tournament_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=137 ;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id`, `home_team_id`, `away_team_id`, `homeScore`, `awayScore`, `tournament_id`) VALUES
(69, 1, 9, 9, 5, 21),
(70, 1, 6, 6, 8, 21),
(71, 1, 14, 9, 7, 21),
(72, 9, 1, 8, 5, 21),
(73, 9, 6, 0, 1, 21),
(74, 9, 14, 3, 0, 21),
(75, 6, 1, 6, 3, 21),
(76, 6, 9, 3, 9, 21),
(77, 6, 14, 4, 7, 21),
(78, 14, 1, 7, 1, 21),
(79, 14, 9, 5, 3, 21),
(80, 14, 6, 3, 9, 21),
(81, 4, 3, 4, 4, 22),
(82, 4, 14, 8, 8, 22),
(83, 4, 2, 4, 2, 22),
(84, 4, 9, 3, 0, 22),
(85, 4, 1, 9, 8, 22),
(86, 4, 10, 1, 0, 22),
(87, 4, 6, 6, 4, 22),
(88, 3, 4, 2, 3, 22),
(89, 3, 14, 4, 7, 22),
(90, 3, 2, 8, 3, 22),
(91, 3, 9, 9, 4, 22),
(92, 3, 1, 9, 2, 22),
(93, 3, 10, 7, 9, 22),
(94, 3, 6, 3, 9, 22),
(95, 14, 4, 1, 9, 22),
(96, 14, 3, 9, 6, 22),
(97, 14, 2, 4, 7, 22),
(98, 14, 9, 4, 9, 22),
(99, 14, 1, 9, 7, 22),
(100, 14, 10, 9, 9, 22),
(101, 14, 6, 6, 1, 22),
(102, 2, 4, 9, 2, 22),
(103, 2, 3, 5, 2, 22),
(104, 2, 14, 6, 0, 22),
(105, 2, 9, 9, 4, 22),
(106, 2, 1, 4, 8, 22),
(107, 2, 10, 8, 4, 22),
(108, 2, 6, 1, 6, 22),
(109, 9, 4, 3, 5, 22),
(110, 9, 3, 5, 5, 22),
(111, 9, 14, 5, 4, 22),
(112, 9, 2, 1, 0, 22),
(113, 9, 1, 2, 5, 22),
(114, 9, 10, 9, 2, 22),
(115, 9, 6, 2, 9, 22),
(116, 1, 4, 1, 8, 22),
(117, 1, 3, 0, 0, 22),
(118, 1, 14, 1, 6, 22),
(119, 1, 2, 2, 7, 22),
(120, 1, 9, 7, 2, 22),
(121, 1, 10, 1, 1, 22),
(122, 1, 6, 1, 0, 22),
(123, 10, 4, 5, 3, 22),
(124, 10, 3, 6, 9, 22),
(125, 10, 14, 8, 2, 22),
(126, 10, 2, 4, 4, 22),
(127, 10, 9, 6, 5, 22),
(128, 10, 1, 4, 9, 22),
(129, 10, 6, 1, 3, 22),
(130, 6, 4, 1, 3, 22),
(131, 6, 3, 2, 2, 22),
(132, 6, 14, 2, 3, 22),
(133, 6, 2, 3, 4, 22),
(134, 6, 9, 0, 5, 22),
(135, 6, 1, 2, 7, 22),
(136, 6, 10, 8, 4, 22);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_estonian_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`) VALUES
(1, 'Jääkarud'),
(2, 'Varesed'),
(3, 'Oravad'),
(4, 'Pandad'),
(6, 'Karud'),
(9, 'Hobused'),
(10, 'Kaelkirjakud'),
(14, 'Hamstrid');

-- --------------------------------------------------------

--
-- Table structure for table `team_tournament`
--

CREATE TABLE IF NOT EXISTS `team_tournament` (
  `team_id` int(11) NOT NULL,
  `tournament_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team_tournament`
--

INSERT INTO `team_tournament` (`team_id`, `tournament_id`) VALUES
(1, 21),
(9, 21),
(6, 21),
(14, 21),
(4, 22),
(3, 22),
(14, 22),
(2, 22),
(9, 22),
(1, 22),
(10, 22),
(6, 22);

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

CREATE TABLE IF NOT EXISTS `tournaments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_estonian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_estonian_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tournaments`
--

INSERT INTO `tournaments` (`id`, `name`) VALUES
(21, 'EM'),
(22, 'MM');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
