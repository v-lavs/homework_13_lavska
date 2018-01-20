-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 20 2018 г., 12:36
-- Версия сервера: 5.6.37
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `home_work13`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `hobbies` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `birthday` date NOT NULL,
  `card_number` bigint(20) NOT NULL,
  `myself` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `user_name`, `last_name`, `age`, `gender`, `password`, `hobbies`, `nickname`, `birthday`, `card_number`, `myself`, `category`) VALUES
(74, 'qqq', 'www', 21, 'male', 'e00cf25ad42683b3df678c61f42c6bda', 'football', 'admin1', '1999-01-01', 12344555, 'qwwee rtyui uioi uiuoip', 'sport'),
(75, 'eee', 'eet', 34, 'female', '1844156d4166d94387f1a4ad031ca5fa', 'handmade', 'admin2', '1986-12-31', 567898765, 'wertyu tyuio uyiovb jkh', 'dance'),
(76, 'gfds', 'ytr', 12, 'female', 'd5133c970ad3a99c2248fed76970d06c', 'travels', 'admin4', '2000-03-06', 87654365432, 'asdfghjk zxcfvgbhjnm  kjhgfds oiuytre sdcvb', 'dance');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `card_number` (`card_number`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
