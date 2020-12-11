-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 11 2020 г., 21:23
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `head_hunter`
--

-- --------------------------------------------------------

--
-- Структура таблицы `resume`
--

CREATE TABLE `resume` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(4) NOT NULL DEFAULT '0',
  `city` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `position` varchar(20) NOT NULL,
  `salary` varchar(20) NOT NULL,
  `employment` text DEFAULT NULL,
  `schedule` text DEFAULT NULL,
  `experience` tinyint(10) DEFAULT 0,
  `jobs` text DEFAULT 'NULL',
  `note` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `resume`
--

INSERT INTO `resume` (`id`, `user_id`, `first_name`, `middle_name`, `last_name`, `birthday`, `gender`, `city`, `email`, `phone`, `position`, `salary`, `employment`, `schedule`, `experience`, `jobs`, `note`, `created_at`, `updated_at`) VALUES
(8, 3, 'Иван', 'Иванович', 'Иванов', '2000-10-05', '0', 'Москва', 'ivan@jjj.ru', '+79995555555', '4', '50000', NULL, NULL, 0, 'NULL', NULL, '2020-12-09 09:01:17', '2020-12-09 09:01:17'),
(9, 5, 'Джессика', 'Дмитриевна', 'Ушьева', '2019-10-12', '0', 'Бабаево', 'jjj@jjj.ru', '59555', '2', '63000', 'a:3:{i:0;s:37:\"Частичная занятость\";i:1;s:50:\"Проектная/Временная работа\";i:2;s:24:\"Волонтёрство\";}', 'a:3:{i:0;s:21:\"Полный день\";i:1;s:27:\"Сменный график\";i:2;s:25:\"Гибкий график\";}', 0, 'NULL', '', '2020-12-09 15:42:48', '2020-12-09 15:42:48'),
(10, 4, 'Дмитрий', 'Сергеевич', 'Калинин', '1983-10-31', '0', 'Вытегра', 'dientr@gmail.com', '+79210552585', '5', '60000', 'a:3:{i:0;s:31:\"Полная занятость\";i:1;s:37:\"Частичная занятость\";i:2;s:50:\"Проектная/Временная работа\";}', 'a:2:{i:0;s:27:\"Сменный график\";i:1;s:25:\"Гибкий график\";}', 0, 'NULL', 'Есть над чем задуматься: диаграммы связей набирают популярность среди определенных слоев населения, а значит, должны быть функционально разнесены на независимые элементы. Есть над чем задуматься: сторонники тоталитаризма в науке функционально разнесены на независимые элементы. Имеется спорная точка зрения, гласящая примерно следующее: тщательные исследования конкурентов объявлены нарушающими общечеловеческие нормы этики и морали.', '2020-12-09 19:41:16', '2020-12-09 19:41:16'),
(11, 2, 'Иван', 'Иванович', 'Иванов', '1990-10-05', '0', 'Ижевск', 'hhh@hhh.ru', '+7954558855', '12', '30000', 'a:1:{i:0;s:50:\"Проектная/Временная работа\";}', 'a:1:{i:0;s:21:\"Полный день\";}', 0, 'NULL', 'Но консультация с широким активом создаёт предпосылки для экспериментов, поражающих по своей масштабности и грандиозности. Таким образом, сложившаяся структура организации предоставляет широкие возможности для экономической целесообразности принимаемых решений.', '2020-12-09 20:23:07', '2020-12-09 20:23:07'),
(13, 10, 'Сергей', 'Иванович', 'Сергеев', '2020-05-01', '0', 'Ростов', 'hhh@jjj.ru', '89625225', '1', '25888', '', '', 0, 'NULL', '', '2020-12-09 21:53:36', '2020-12-09 21:53:36'),
(14, 6, 'Ирина', 'Сергеевна', 'Тищенко', '1998-06-01', '1', 'Тамбов', 'jjj@kkkkl.ru', '855522222', '9', '36000', '', '', 0, 'NULL', '', '2020-12-09 21:56:28', '2020-12-09 21:56:28'),
(15, 8, 'Юлия', 'Александровна', 'Королева', '1983-08-06', '1', 'Москва', 'ghhh@kkk.ru', '89210225566', '11', '30000', NULL, NULL, 0, 'NULL', '', '2020-12-11 12:48:30', '2020-12-11 12:48:30');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `resume`
--
ALTER TABLE `resume`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `resume`
--
ALTER TABLE `resume`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
