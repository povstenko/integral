-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 29 2019 г., 14:29
-- Версия сервера: 10.3.15-MariaDB
-- Версия PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `integral_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `answers`
--

CREATE TABLE `answers` (
  `id` int(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `parent_question` int(255) NOT NULL,
  `is_correct` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `answers`
--

INSERT INTO `answers` (`id`, `answer`, `parent_question`, `is_correct`) VALUES
(1, 'q1.var1', 1, '1'),
(2, 'q1.var2', 1, '0'),
(3, 'q1.var3', 1, '0'),
(4, 'q2.var1', 2, '0'),
(5, 'q2.var2', 2, '0'),
(6, 'q2.var3', 2, '1'),
(7, 'q3.var1', 3, '0'),
(8, 'q3.var2', 3, '1'),
(9, 'q3.var3', 3, '0'),
(10, 'q4.var1', 4, '1'),
(11, 'q4.var2', 4, '0'),
(12, 'q4.var3', 4, '0');

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE `questions` (
  `id` int(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `additional` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `parent_test` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id`, `question`, `additional`, `picture`, `parent_test`) VALUES
(1, 'Maths test 1 question 1(var1)?', NULL, NULL, 1),
(2, 'Maths test 1 question 2(var3)?', NULL, NULL, 1),
(3, 'Maths test 1 question 3(var2)?', NULL, NULL, 1),
(4, 'Maths test 1 question 4(var1)?', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `tests`
--

CREATE TABLE `tests` (
  `id` int(255) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `author` int(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tests`
--

INSERT INTO `tests` (`id`, `name`, `description`, `type`, `author`, `date`) VALUES
(1, 'Maths Test 1', 'Maths test 1 description', 'maths', 1, '2019-06-25'),
(3, 'Maths test 2', 'Maths test 2 description', 'maths', 1, '2019-06-18'),
(4, 'Physics test 1', 'Physics test 1 description', 'physics', 1, '2019-05-23'),
(5, 'Maths test 3', 'Maths test 3 description', 'maths', 1, '2019-06-01'),
(6, 'Physics test 2', 'Physics test 2 description', 'physics', 1, '2019-05-27');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(255) UNSIGNED NOT NULL,
  `login` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_token` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `name`, `avatar`, `password`, `user_token`) VALUES
(1, 'tester', 'tester@tester', '', NULL, '$2y$10$TbEO2OxRNA363z1KwMWRROkokQt1OX/rYXOSLQoE7uf/lZz0mxICe', 'Kc5B5oAQOsCEqbgTBcjeOlKdnoALxyhbAreleoSxU8PqDAlIQWIXChC1Lc18yoD2SCDogceu6caXiOyk'),
(2, 'admin', 'admin@admin', 'Admin', NULL, '$2y$10$nP60oUv7mIS/.hQObgLKJO77/7cGJUtCtr2OnyY9KlgGkTXVd9ntW', 'sZUCjETCBdIoC66GJPTMhMFxnZu1wBMCcJkVWRmvmRD8pUPVH30n33DVQw1Mjhqt5zYib5TPYCwv9Qhp');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
