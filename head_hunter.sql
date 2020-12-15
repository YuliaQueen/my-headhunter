-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 15 2020 г., 11:30
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
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1607944074);

-- --------------------------------------------------------

--
-- Структура таблицы `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `position_title` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `position`
--

INSERT INTO `position` (`id`, `position_title`) VALUES
(1, 'Администратор баз данных'),
(2, 'Аналитик'),
(3, 'Арт-директор'),
(4, 'Инженер'),
(5, 'Компьютерная безопасность'),
(6, 'Контент'),
(7, 'Маркетинг'),
(8, 'Мультимедиа'),
(9, 'Оптимизация сайта (SEO)'),
(10, 'Передача данных и доступ в интернет'),
(11, 'Программирование, Разработка'),
(12, 'Продажи'),
(13, 'Продюсер'),
(14, 'Развитие бизнеса'),
(15, 'Системный администратор'),
(16, 'Системы управления предприятием (ERP)'),
(17, 'Сотовые, Беспроводные технологии'),
(18, 'Стартапы'),
(19, 'Телекоммуникации'),
(20, 'Тестирование'),
(21, 'Технический писатель'),
(22, 'Управление проектами'),
(23, 'Электронная коммерция'),
(24, 'CRM системы'),
(25, 'Web инженер'),
(26, 'Web мастер');

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
  `img_path` varchar(250) DEFAULT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(4) NOT NULL DEFAULT '0',
  `city` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `position` int(11) NOT NULL,
  `salary` varchar(100) NOT NULL,
  `employment` text DEFAULT NULL,
  `schedule` text DEFAULT NULL,
  `experience` tinyint(10) DEFAULT 0,
  `jobs` text DEFAULT 'NULL',
  `note` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `resume`
--

INSERT INTO `resume` (`id`, `user_id`, `first_name`, `middle_name`, `last_name`, `img_path`, `birthday`, `gender`, `city`, `email`, `phone`, `position`, `salary`, `employment`, `schedule`, `experience`, `jobs`, `note`, `created_at`, `updated_at`, `view_count`) VALUES
(17, 10, 'Юлия', 'Александровна', 'Королева', NULL, '1983-08-06', '1', 'Бабаево', 'ss@gg.ru', '88888888', 25, '500000', 'a:2:{i:0;s:31:\"Полная занятость\";i:1;s:37:\"Частичная занятость\";}', 'a:2:{i:0;s:21:\"Полный день\";i:1;s:27:\"Сменный график\";}', 0, 'NULL', 'Для современного мира сложившаяся структура организации, а также свежий взгляд на привычные вещи - безусловно открывает новые горизонты для экономической целесообразности принимаемых решений. С другой стороны, семантический разбор внешних противодействий однозначно определяет каждого участника как способного принимать собственные решения касаемо новых предложений.', '2020-12-12 17:33:29', '2020-12-15 11:18:19', 46),
(18, 3, 'Петр', 'Александрович', 'Иванов', NULL, '1980-12-12', '0', 'Москва', 'petr@mail.com', '+7854662222', 5, '30000', 'a:1:{i:0;s:20:\"Стажировка\";}', 'a:1:{i:0;s:31:\"Удаленная работа\";}', 0, 'NULL', '', '2020-12-12 18:46:48', '2020-12-15 10:15:59', 6),
(19, 3, 'Анна', 'Ивановна', 'Петрова', NULL, '1999-12-12', '1', 'Ростов', 'jjj@llll.ru', '+795554422', 2, '25000', 'a:1:{i:0;s:50:\"Проектная/Временная работа\";}', 'a:1:{i:0;s:31:\"Удаленная работа\";}', 0, 'NULL', '', '2020-12-12 19:53:10', '2020-12-13 10:30:50', 2),
(20, 1, 'Дмитрий', 'Петрович', 'Котов', NULL, '2013-02-19', '0', 'Москва', 'hhh@hhh.ru', '895223333', 1, '25000', 'a:1:{i:0;s:20:\"Стажировка\";}', 'a:3:{i:0;s:21:\"Полный день\";i:1;s:27:\"Сменный график\";i:2;s:25:\"Гибкий график\";}', 0, 'NULL', '', '2020-12-12 20:57:44', '2020-12-12 20:57:44', 0),
(21, 5, 'Иван', 'Филиппович', 'Крыжов', NULL, '2020-12-13', '0', 'Москва', 'ivan9553@rambler.ru', '+79919266733', 5, '30000', NULL, NULL, 0, 'NULL', '', '2020-12-13 10:34:29', '2020-12-13 10:34:29', 0),
(22, 5, 'Ирина', 'Евгеньевна', 'Фролова ', NULL, '1990-01-01', '1', 'Коломна', 'hhh@jjj.ru', '+79210556655', 1, '30000', 'a:3:{i:0;s:31:\"Полная занятость\";i:1;s:37:\"Частичная занятость\";i:2;s:50:\"Проектная/Временная работа\";}', 'a:4:{i:0;s:21:\"Полный день\";i:1;s:27:\"Сменный график\";i:2;s:25:\"Гибкий график\";i:3;s:31:\"Удаленная работа\";}', 0, 'NULL', '', '2020-12-13 10:43:46', '2020-12-13 10:43:58', 1),
(23, 10, 'Иван', 'Сергеевич', 'Петров', NULL, '1979-10-10', '0', 'Нью-Йорк', 'jjjj@kkkkk.ru', '+7954586622', 20, '65000', 'a:1:{i:0;s:31:\"Полная занятость\";}', 'a:1:{i:0;s:21:\"Полный день\";}', 0, 'NULL', '', '2020-12-13 15:39:07', '2020-12-13 19:58:00', 4),
(26, 3, 'Иван', 'Иванович', 'Иванов', '243958a6953ff8a7e626d3a544595571.png', '1990-05-01', '0', 'Санкт-Петербург', 'hhh@hhh.ru', '+7954225866', 9, '30000', 'a:3:{i:0;s:31:\"Полная занятость\";i:1;s:37:\"Частичная занятость\";i:2;s:50:\"Проектная/Временная работа\";}', 'a:3:{i:0;s:21:\"Полный день\";i:1;s:27:\"Сменный график\";i:2;s:25:\"Гибкий график\";}', 0, 'NULL', '', '2020-12-15 09:00:52', '2020-12-15 10:18:26', 2),
(27, 9, 'Алла', 'Егоровна', 'Скворцова', 'ccf825528e896437601cd9f15daaf58b.jpg', '1986-08-01', '1', 'Казань', 'kkk@kkkkkk.ru', '+7856221155', 18, '50000', 'a:1:{i:0;s:31:\"Полная занятость\";}', 'a:2:{i:0;s:21:\"Полный день\";i:1;s:27:\"Сменный график\";}', 0, 'NULL', '', '2020-12-15 10:04:22', '2020-12-15 10:16:08', 3);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `position` ADD FULLTEXT KEY `position_title` (`position_title`);

--
-- Индексы таблицы `resume`
--
ALTER TABLE `resume`
  ADD PRIMARY KEY (`id`),
  ADD KEY `position` (`position`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `resume`
--
ALTER TABLE `resume`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `resume`
--
ALTER TABLE `resume`
  ADD CONSTRAINT `resume_ibfk_1` FOREIGN KEY (`position`) REFERENCES `position` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
