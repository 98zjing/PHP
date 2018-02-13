-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 年 02 月 09 日 01:12
-- 服务器版本: 5.5.47
-- PHP 版本: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `0126`
--

-- --------------------------------------------------------

--
-- 表的结构 `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `create_time` int(11) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- 转存表中的数据 `news`
--

INSERT INTO `news` (`id`, `title`, `author`, `create_time`, `content`) VALUES
(5, '444', '444', 444, '44'),
(6, '44', '444', 444, '4444'),
(7, '444', '444', 444, '44'),
(8, '44', '444', 444, '4444'),
(9, '444', '444', 444, '44'),
(10, '44', '444', 444, '4444'),
(11, '444', '444', 444, '44'),
(12, '44', '444', 444, '4444'),
(13, '444', '444', 444, '44'),
(14, '44', '444', 444, '4444'),
(15, '444', '444', 444, '44'),
(16, '44', '444', 444, '4444'),
(17, '444', '444', 444, '44'),
(18, '44', '444', 444, '4444'),
(19, '444', '444', 444, '44'),
(20, '44', '444', 444, '4444'),
(21, '444', '444', 444, '44'),
(22, '44', '444', 444, '4444'),
(23, '444', '444', 444, '44'),
(24, '44', '444', 444, '4444'),
(25, '444', '444', 444, '44'),
(26, '44', '444', 444, '4444'),
(27, '444', '444', 444, '44'),
(28, '44', '444', 444, '4444'),
(29, '444', '444', 444, '44'),
(30, '44', '444', 444, '4444'),
(31, '444', '444', 444, '44'),
(32, '44', '444', 444, '4444'),
(33, '444', '444', 444, '44'),
(34, '44', '444', 444, '4444'),
(35, '444', '444', 444, '44'),
(36, '444', '444', 1518099285, '444'),
(37, '444', '444', 1518100906, '444'),
(38, '444', '444', 1518100989, '444'),
(39, '444', '444', 1518101008, '444'),
(40, '45445', '45445', 1518102380, '4544');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
