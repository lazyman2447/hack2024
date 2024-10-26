-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 26 2024 г., 16:05
-- Версия сервера: 8.0.30
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test_project`
--

-- --------------------------------------------------------

--
-- Структура таблицы `drills`
--

CREATE TABLE `drills` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `price` int NOT NULL,
  `reviews_number` int NOT NULL,
  `rating` int NOT NULL,
  `shop_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `drills`
--

INSERT INTO `drills` (`id`, `name`, `price`, `reviews_number`, `rating`, `shop_name`) VALUES
(1, 'Makita DF347DWE', 9800, 58, 5, 'LEROY MERLIN'),
(2, 'PROFI 12/2.0Q', 1600, 1337, 4, 'OZON'),
(3, 'Schwarz-SU24L1-PRO-ECO', 2400, 1007, 4, 'Wildberries');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL,
  `trackable_goods` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `password`, `trackable_goods`) VALUES
(1, 'Petya', 'petr11', '12345', '1 2'),
(2, 'Vasya', 'vasya22', '123456', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `drills`
--
ALTER TABLE `drills`
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
-- AUTO_INCREMENT для таблицы `drills`
--
ALTER TABLE `drills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
