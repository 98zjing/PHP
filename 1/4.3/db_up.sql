-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 年 01 月 28 日 20:03
-- 服务器版本: 5.5.47
-- PHP 版本: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `db_up`
--

-- --------------------------------------------------------

--
-- 表的结构 `tb_game`
--

CREATE TABLE IF NOT EXISTS `tb_game` (
  `gameTime` int(11) NOT NULL,
  `name` text NOT NULL,
  `time` text NOT NULL,
  `userPath` text NOT NULL,
  `moves` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

--
-- 转存表中的数据 `tb_game`
--

INSERT INTO `tb_game` (`gameTime`, `name`, `time`, `userPath`, `moves`) VALUES
(8, '234', 'Jan/Sun/2018', 'uploads/1517097867IHTOU.png', 4),
(5, 'ssss', 'Jan/Sat/2018', 'uploads/1517058641BXLFS.png', 3),
(5, 'ssss', 'Jan/Sat/2018', 'uploads/1517058641BXLFS.png', 3),
(5, 'we', 'Jan/Sun/2018', 'uploads/1517121325ZPxQT.png', 3),
(5, '', 'Jan/Sun/2018', 'uploads/1517121325ZPxQT.png', 3),
(4, '789', 'Jan/Sun/2018', 'uploads/1517121997NQPDI.png', 4),
(5, 'ssss', 'Jan/Sat/2018', 'uploads/1517058641BXLFS.png', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
