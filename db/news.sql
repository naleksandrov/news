-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2017 at 10:11 PM
-- Server version: 5.6.17
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language`) VALUES
(1, 'bulgarian'),
(2, 'english'),
(3, 'german');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `source` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `date`, `source`) VALUES
(1, '2017-06-05 22:30:00', 'Някакъв източник'),
(2, '2017-07-01 20:15:00', 'Някакъв източник'),
(3, '2017-08-06 08:09:00', 'Някакъв източник'),
(4, '2017-09-02 16:09:00', 'Някакъв източник'),
(5, '2017-09-07 10:16:00', 'Някакъв източник'),
(6, '2017-09-08 07:45:00', 'Някакъв източник'),
(7, '2017-06-05 22:30:00', 'Някакъв източник'),
(8, '2017-09-08 07:45:00', 'Някакъв източник'),
(9, '2017-09-02 16:09:00', 'Някакъв източник'),
(10, '2017-08-06 08:09:00', 'Някакъв източник'),
(11, '2017-09-08 07:45:00', 'Някакъв източник');

-- --------------------------------------------------------

--
-- Table structure for table `news_translations`
--

CREATE TABLE IF NOT EXISTS `news_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `short_description` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `language_id` int(11) NOT NULL,
  `news_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `news_translations_1_idx` (`news_id`),
  KEY `news_translations_2_idx` (`language_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `news_translations`
--

INSERT INTO `news_translations` (`id`, `title`, `short_description`, `description`, `language_id`, `news_id`) VALUES
(1, 'Първа новина', 'Късо описание', 'Дълго описание', 1, 1),
(2, 'Първа новина EN', 'Късо описание EN', 'Дълго описание EN', 2, 1),
(3, 'Първа новина DE', 'Късо описание DE', 'Дълго описание DE', 3, 1),
(4, 'Втора новина', 'Късо описание', 'Дълго описание', 1, 2),
(5, 'Втора новина EN', 'Късо описание EN', 'Дълго описание EN', 2, 2),
(6, 'Втора новина DE', 'Късо описание DE', 'Дълго описание DE', 3, 2),
(7, 'Трета новина', 'Късо описание', 'Дълго описание', 1, 3),
(8, 'Трета новина EN', 'Късо описание EN', 'Дълго описание EN', 2, 3),
(9, 'Трета новина DE', 'Късо описание DE', 'Дълго описание DE', 3, 3),
(10, 'Четвърта новина', 'Късо описание', 'Дълго описани', 1, 4),
(11, 'Четвърта новина EN', 'Късо описание EN', 'Дълго описание EN', 2, 4),
(12, 'Четвърта новина DE', 'Късо описание DE', 'Дълго описание DE', 3, 4),
(13, 'Пета новина', 'Късо описание', 'Дълго описани', 1, 5),
(14, 'Пета новина EN', 'Късо описание EN', 'Дълго описание EN', 2, 5),
(15, 'Пета новина DE', 'Късо описание DE', 'Дълго описание DE', 3, 5),
(16, 'Шеста новина', 'Късо описание', 'Дълго описани', 1, 6),
(17, 'Шеста новина EN', 'Късо описание EN', 'Дълго описание EN', 2, 6),
(18, 'Шеста новина DE', 'Късо описание DE', 'Дълго описание DE', 3, 6),
(19, 'Седма новина', 'Късо описание', 'Дълго описание', 1, 7),
(20, 'Седма новина EN', 'Късо описание EN', 'Дълго описание EN', 2, 7),
(21, 'Седма новина DE', 'Късо описание DE', 'Дълго описание DE', 3, 7),
(22, 'Осма новина', 'Късо описание', 'Дълго описание', 1, 8),
(23, 'Осма новина EN', 'Късо описание EN', 'Дълго описание EN', 2, 8),
(24, 'Осма новина DE', 'Късо описание DE', 'Дълго описание DE', 3, 8),
(25, 'Девета новина', 'Късо описание', 'Дълго описание', 1, 9),
(26, 'Девета новина EN', 'Късо описание EN', 'Дълго описание EN', 2, 9),
(27, 'Девета новина DE', 'Късо описание DE', 'Дълго описание DE', 3, 9),
(28, 'Десета новина', 'Късо описание', 'Дълго описание', 1, 10),
(29, 'Десета новина EN', 'Късо описание EN', 'Дълго описание EN', 2, 10),
(30, 'Десета новина DE', 'Късо описание DE', 'Дълго описание DE', 3, 10),
(31, 'Единайста новина', 'Късо описание', 'Дълго описание', 1, 11),
(32, 'Единайста новина EN', 'Късо описание EN', 'Дълго описание EN', 2, 11),
(33, 'Единайста новина DE', 'Късо описание DE', 'Дълго описание DE', 3, 11);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news_translations`
--
ALTER TABLE `news_translations`
  ADD CONSTRAINT `news_translations_2` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `news_translations_1` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
