-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 07 2021 г., 15:33
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `olymp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `kurs`
--

CREATE TABLE IF NOT EXISTS `kurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(56) NOT NULL,
  `description` text NOT NULL,
  `link` varchar(56) NOT NULL,
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_users` (`id_users`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=64 ;

--
-- Дамп данных таблицы `kurs`
--

INSERT INTO `kurs` (`id`, `title`, `description`, `link`, `id_users`) VALUES
(63, 'Математический анализ', 'МАТЕМАТИЧЕСКИЙ АНАЛИЗ, раздел математики, дающий методы количественного исследования разных процессов изменения; занимается изучением скорости изменения (дифференциальное исчисление) и определением длин кривых, площадей и объемов фигур, ограниченных кривыми контурами и поверхностями (интегральное исчисление).', 'img/16230638530_original.jpeg', 85);

-- --------------------------------------------------------

--
-- Структура таблицы `kurs_user`
--

CREATE TABLE IF NOT EXISTS `kurs_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_kurs` int(11) NOT NULL,
  `name-kurs` varchar(56) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_kurs` (`id_kurs`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Дамп данных таблицы `kurs_user`
--

INSERT INTO `kurs_user` (`id`, `id_user`, `id_kurs`, `name-kurs`) VALUES
(45, 86, 63, 'Математический анализ');

-- --------------------------------------------------------

--
-- Структура таблицы `link_work`
--

CREATE TABLE IF NOT EXISTS `link_work` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `more` varchar(255) NOT NULL,
  `id_kurs` int(11) NOT NULL,
  `link_file` varchar(56) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kurs` (`id_kurs`),
  KEY `id_user` (`id_user`),
  KEY `id_kurs_2` (`id_kurs`,`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(56) NOT NULL,
  `text` text NOT NULL,
  `date` date DEFAULT NULL,
  `name_autor` varchar(56) NOT NULL,
  `id_autor` int(11) NOT NULL,
  `kurs` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kurs` (`kurs`),
  KEY `id_autor` (`id_autor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `text`, `date`, `name_autor`, `id_autor`, `kurs`) VALUES
(24, 'Олимпиада по мат.анализу', '15.06.2021 г. пройдёт олимпиада по мат. анализу.\r\nВ данной олимпиаде будут тестироваться знания студентов по теме: "Интегральные исчисления".\r\nЗапись на данный курс уже открыта, все желающие поучаствовать, милости просим!\r\nСтудент набравший максимальное кол-во баллов получает фирменные призы Московского Политеха.', '2021-06-07', 'Учитель', 85, 63);

-- --------------------------------------------------------

--
-- Структура таблицы `otv`
--

CREATE TABLE IF NOT EXISTS `otv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link_otv` varchar(56) NOT NULL,
  `id_std` int(11) NOT NULL,
  `id_kurs` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kurs` (`id_kurs`),
  KEY `id_std` (`id_std`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Структура таблицы `rez_work`
--

CREATE TABLE IF NOT EXISTS `rez_work` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(255) NOT NULL,
  `link_file` varchar(56) NOT NULL,
  `id_kurs` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kurs` (`id_kurs`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

--
-- Дамп данных таблицы `rez_work`
--

INSERT INTO `rez_work` (`id`, `comment`, `link_file`, `id_kurs`, `id_user`) VALUES
(52, 'Работа написана хорошо!', 'rezult/1623064815result.DOCX', 63, 85);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=87 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `status`, `password`) VALUES
(85, 'Учитель', 'Учитель', 'ivankov@ilya.ru', 'sot', '37ba126316db07f752357619e9e72859'),
(86, 'Студент', 'Студент', 'ivankov@ilya.ru', 'std', '37ba126316db07f752357619e9e72859');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`kurs`) REFERENCES `kurs` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
