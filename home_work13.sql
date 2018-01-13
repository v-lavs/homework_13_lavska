-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 13 2018 г., 17:28
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
(51, 'name', 'lastname', 0, 'male', '$2y$10$ZqMDxJ6to5yMTydi74j/qeL2pZO0zEGsO71Reg02ePpDEOAL6swPG', 'travels', 'nickname', '2018-01-24', 1232332321312, 'Lorem ipsum dolor sit amet, ius ut etiam movet iisque, vix atqui inciderint et. Sit id putant euismod mnesarchum. Mea te zril incorrupte, eam te meis epicuri copiosae. Enim tempor ea est, te purto invidunt deserunt ius, per an quod vidit prodesset. Delectus adipisci id sed, dicam consul abhorreant pro an. Ei duo adipiscing accommodare delicatissimi, est te tale epicurei periculis.', 'recreation'),
(52, 'Vanda', 'Lavs', 0, 'female', '$2y$10$Za07jAbySi6A0pteaDVXku2ewgw7uueBugnkl2wkW0nG.vTTSKTxe', 'travels', 'v_lavs', '2016-07-01', 9503823023011, 'Eam id meliore phaedrum liberavisse. Atqui electram intellegebat ex vel. Id unum fabellas vim, usu ad quaestio salutandi deterruisset, oratio dissentias vel ei. Sadipscing comprehensam ne mei, mea ferri mazim singulis ne, has consul explicari referrentur te. Quo eu alii primis inimicus, sumo possit aliquip mea te. Agam ferri consulatu et his.', 'art'),
(53, 'alex', 'lalala', 0, 'male', '$2y$10$BKdAcYx6U5GmHC82HLSMeeEAZPxmf4dD4ARcDAvoMothPfw.AZsaO', 'football', 'blablala', '1965-07-13', 34567890976543, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto at ducimus, laborum maxime minima non\r\n        numquam optio quo vitae. Accusamus ad adipisci, atque, consectetur corporis cupiditate dignissimos dolorum ex\r\n        expedita harum illo iure laudantium magnam mollitia nulla officiis possimus quam quis recusandae repudiandae', 'sport');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
