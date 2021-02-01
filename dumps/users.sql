-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 27 2021 г., 13:04
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `stage2_project`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `hash` varchar(32) NOT NULL DEFAULT '',
  `ip` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `hash`, `ip`) VALUES
(1, 'admin', 'kaunas16', 'cddghhr35gdh6yjgf', 192),
(2, 'best', 'Dcvjfmg57,f9', 'cddghhr35gdh6yjgfczr43gff978fv', 168),
(24, 'ya.kaunas', '1f32aa4c9a1d2ea010adcf2348166a04', '11d04c594fa9a99bd8cb93ef215847bc', 2130706433),
(25, 'user3', '9c47a0019e1a7db25de579f2f3b62964', 'ea8679214df06c42862e261da163d4ed', 2130706433),
(26, 'user2', 'd079f41b77a39477b1547e6259d70ebd', '2d660678ce063f6d7fbf043a1e9d4d17', 2130706433);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
