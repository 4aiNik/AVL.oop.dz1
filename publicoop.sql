-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Сен 27 2016 г., 13:14
-- Версия сервера: 10.1.10-MariaDB
-- Версия PHP: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `publicoop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `announcement`
--

CREATE TABLE `announcement` (
  `id` int(3) NOT NULL,
  `actuality` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `announcement`
--

INSERT INTO `announcement` (`id`, `actuality`) VALUES
(3, '2016-09-28'),
(4, '2016-09-27'),
(12, '2016-10-06'),
(13, '2016-09-30');

-- --------------------------------------------------------

--
-- Структура таблицы `article`
--

CREATE TABLE `article` (
  `id` int(3) NOT NULL,
  `autors` varchar(300) NOT NULL,
  `rating` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `article`
--

INSERT INTO `article` (`id`, `autors`, `rating`) VALUES
(5, 'frdth', 4.125),
(14, 'fchgvj', 3.75);

-- --------------------------------------------------------

--
-- Структура таблицы `new`
--

CREATE TABLE `new` (
  `id` int(3) NOT NULL,
  `source` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `new`
--

INSERT INTO `new` (`id`, `source`) VALUES
(1, 'esgdfg'),
(2, 'esgdtfh'),
(7, 'zgv'),
(8, 'rztf'),
(11, 'sdgfchg');

-- --------------------------------------------------------

--
-- Структура таблицы `publication`
--

CREATE TABLE `publication` (
  `id` int(3) NOT NULL,
  `type` varchar(300) NOT NULL,
  `title` varchar(300) NOT NULL,
  `text` varchar(3000) NOT NULL,
  `nowDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `publication`
--

INSERT INTO `publication` (`id`, `type`, `title`, `text`, `nowDate`) VALUES
(1, 'new', 'adzdgf', 'esrdfg', '2016-09-24'),
(2, 'new', 'srdtfg', 'srdtfh', '2016-09-24'),
(3, 'announcement', 'df', 'rdtfhg', '2016-09-24'),
(4, 'announcement', 'dxfchg', 'srhdt', '2016-09-24'),
(5, 'article', 'ghdjgfh', 'rhfhg', '2016-09-24'),
(7, 'new', 'fszdx', 'sdxgfh', '2016-09-27'),
(8, 'new', 'wtsr', 'ert', '2016-09-27'),
(11, 'new', 'sdfg', 'esrdxfg', '2016-09-27'),
(12, 'announcement', 'ngccvhb', 'hnbb', '2016-09-27'),
(13, 'announcement', 'asdfg', 'stfg', '2016-09-27'),
(14, 'article', 'gfhv', 'fddgfhg', '2016-09-27');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `new`
--
ALTER TABLE `new`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `publication`
--
ALTER TABLE `publication`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
