-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 15 2015 г., 02:20
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `kolibri`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Зимний трикотаж'),
(2, 'Летний трикотаж'),
(3, 'Новинки');

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `cdate` date NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0',
  `prim` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `orderproduct`
--

CREATE TABLE IF NOT EXISTS `orderproduct` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` tinyint(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `new` enum('0','1') DEFAULT '0',
  `visible` enum('0','1') DEFAULT '1',
  `cdate` datetime NOT NULL,
  `articul` varchar(50) NOT NULL,
  `categoryid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `img`, `price`, `new`, `visible`, `cdate`, `articul`, `categoryid`) VALUES
(3, 'Бандана кулир', 'Описание бандана кулир', '213-800x800.jpg', '15.00', '1', '1', '2015-11-08 12:22:03', 'Бн001', 2),
(4, 'Берет кулир', 'Описание берет кулир', '214-800x800.jpg', '15.00', '1', '1', '2015-11-08 12:22:03', 'Бт000', 2),
(5, 'Берет интерлок', 'Описание берет интерлок', '214-800x800.jpg', '20.00', '1', '1', '2015-11-08 12:24:08', 'Бт001', 2),
(6, 'Бандана кулир 2', 'Описание бандана кулир', '213-800x800.jpg', '15.00', '0', '1', '2015-11-08 12:22:03', 'Бн001', 1),
(7, 'Берет интерлок 2', 'Описание берет интерлок', '214-800x800.jpg', '20.00', '0', '1', '2015-11-08 12:24:08', 'Бт001', 1),
(8, 'Берет интерлок 3', 'Описание берет интерлок', '214-800x800.jpg', '20.00', '0', '1', '2015-11-08 12:24:08', 'Бт001', 1),
(9, 'Бандана кулир', 'Описание бандана кулир', '213-800x800.jpg', '15.00', '1', '1', '2015-11-08 12:22:03', 'Бн001', 2),
(10, 'Бандана кулир', 'Описание бандана кулир', '213-800x800.jpg', '15.00', '1', '1', '2015-11-08 12:22:03', 'Бн001', 2),
(11, 'Бандана кулир', 'Описание бандана кулир', '213-800x800.jpg', '15.00', '1', '1', '2015-11-08 12:22:03', 'Бн001', 2),
(12, 'Бандана кулир', 'Описание бандана кулир', '213-800x800.jpg', '15.00', '1', '1', '2015-11-08 12:22:03', 'Бн001', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `provider` enum('vk','odnoklassniki','mailru','yandex','google','facebook') NOT NULL,
  `social_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `social_page` varchar(255) NOT NULL,
  `sex` enum('male','female') NOT NULL,
  `birthday` date NOT NULL,
  `avatar` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `provider`, `social_id`, `name`, `email`, `social_page`, `sex`, `birthday`, `avatar`) VALUES
(4, 'vk', '8873577', 'Денис Леонов', '', 'http://vk.com/id8873577', 'male', '1990-12-01', 'http://cs5321.vk.me/u8873577/a_421ca594.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
