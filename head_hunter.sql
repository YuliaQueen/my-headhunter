-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 12 2020 г., 21:09
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
(2, 'Аналитик Ха'),
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
(17, 10, 'Юлия', 'Александровна', 'Королева', NULL, '1983-08-06', '1', 'Бабаево', 'ss@gg.ru', '88888888', 25, '500000', 'a:2:{i:0;s:31:\"Полная занятость\";i:1;s:37:\"Частичная занятость\";}', 'a:2:{i:0;s:21:\"Полный день\";i:1;s:27:\"Сменный график\";}', 0, 'NULL', 'Для современного мира сложившаяся структура организации, а также свежий взгляд на привычные вещи - безусловно открывает новые горизонты для экономической целесообразности принимаемых решений. С другой стороны, семантический разбор внешних противодействий однозначно определяет каждого участника как способного принимать собственные решения касаемо новых предложений.', '2020-12-12 17:33:29', '2020-12-12 21:06:17', 27),
(18, 3, 'Петр', 'Александрович', 'Иванов', NULL, '1980-12-12', '0', 'Москва', 'petr@mail.com', '+7854662222', 5, '30000', 'a:1:{i:0;s:20:\"Стажировка\";}', 'a:1:{i:0;s:31:\"Удаленная работа\";}', 0, 'NULL', '', '2020-12-12 18:46:48', '2020-12-12 21:08:49', 2),
(19, 3, 'Анна', 'Ивановна', 'Петрова', NULL, '1999-12-12', '1', 'Ростов', 'jjj@llll.ru', '+795554422', 2, '25000', 'a:1:{i:0;s:50:\"Проектная/Временная работа\";}', 'a:1:{i:0;s:31:\"Удаленная работа\";}', 0, 'NULL', '', '2020-12-12 19:53:10', '2020-12-12 21:09:23', 1),
(20, 1, 'Дмитрий', 'Петрович', 'Котов', NULL, '2013-02-19', '0', 'Москва', 'hhh@hhh.ru', '895223333', 1, '25000', 'a:1:{i:0;s:20:\"Стажировка\";}', 'a:3:{i:0;s:21:\"Полный день\";i:1;s:27:\"Сменный график\";i:2;s:25:\"Гибкий график\";}', 0, 'NULL', '', '2020-12-12 20:57:44', '2020-12-12 20:57:44', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
