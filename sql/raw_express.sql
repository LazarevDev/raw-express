-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 22 2024 г., 11:07
-- Версия сервера: 8.0.29
-- Версия PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `raw_express`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '4', 1699483733),
('user', '10', 1700304596),
('user', '11', 1700395897),
('user', '12', 1700396419),
('user', '13', 1700396810),
('user', '14', 1700396863),
('user', '15', 1700396888),
('user', '16', 1700396920),
('user', '8', 1699522451),
('user', '9', 1699529810);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, NULL, NULL, NULL, 1699475575, 1699475575),
('user', 1, NULL, NULL, NULL, 1699475575, 1699475575);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `history`
--

CREATE TABLE `history` (
  `id` int NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `raw_type_id` int UNSIGNED NOT NULL,
  `tonnage_id` int UNSIGNED NOT NULL,
  `month_id` int UNSIGNED NOT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `history`
--

INSERT INTO `history` (`id`, `user_id`, `raw_type_id`, `tonnage_id`, `month_id`, `price`) VALUES
(3, 4, 2, 3, 3, '181.00'),
(4, 4, 2, 2, 2, '188.00'),
(5, 4, 2, 2, 7, '162.00'),
(6, 9, 1, 3, 3, '140.00'),
(7, 4, 2, 1, 3, '109.00'),
(8, 4, 2, 2, 2, '188.00'),
(9, 4, 1, 1, 1, '165.00'),
(10, 4, 1, 2, 1, '107.00'),
(11, 4, 1, 2, 1, '107.00'),
(12, 4, 3, 3, 5, '187.00'),
(13, 4, 2, 1, 2, '105.00'),
(14, 4, 1, 89, 2, '0.00'),
(15, 4, 1, 92, 10, '0.00'),
(16, 4, 2, 92, 10, '100.00'),
(17, 4, 1, 91, 3, '12.00'),
(18, 4, 2, 91, 3, '0.00'),
(19, 4, 1, 105, 1, '12.00'),
(20, 10, 2, 105, 4, '0.00'),
(21, 10, 3, 106, 3, '0.00'),
(22, 10, 1, 105, 1, '12.00');

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int NOT NULL,
  `name` varchar(128) NOT NULL,
  `parent` int DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int DEFAULT NULL,
  `data` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `months`
--

CREATE TABLE `months` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `months`
--

INSERT INTO `months` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Январь', '2023-10-18 18:23:59', '2023-10-18 18:23:59'),
(2, 'Февраль', '2023-10-18 18:23:59', '2023-10-18 18:23:59'),
(3, 'Март', '2023-10-18 18:23:59', '2023-10-18 18:23:59'),
(4, 'Апрель', '2023-10-18 18:23:59', '2023-10-18 18:23:59'),
(5, 'Май', '2023-10-18 18:23:59', '2023-10-18 18:23:59'),
(6, 'Июнь', '2023-10-18 18:23:59', '2023-10-18 18:23:59'),
(7, 'Июль', '2023-10-18 18:23:59', '2023-10-18 18:23:59'),
(8, 'Август', '2023-10-18 18:23:59', '2023-10-18 18:23:59'),
(9, 'Сентябрь', '2023-10-18 18:23:59', '2023-10-18 18:23:59'),
(10, 'Октябрь', '2023-10-18 18:23:59', '2023-10-18 18:23:59'),
(11, 'Ноябрь', '2023-10-18 18:23:59', '2023-10-18 18:23:59'),
(12, 'Декабрь', '2023-10-18 18:23:59', '2023-10-18 18:23:59');

-- --------------------------------------------------------

--
-- Структура таблицы `prices`
--

CREATE TABLE `prices` (
  `id` int UNSIGNED NOT NULL,
  `price` tinyint UNSIGNED NOT NULL,
  `month_id` int UNSIGNED NOT NULL,
  `tonnage_id` int UNSIGNED NOT NULL,
  `raw_type_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `prices`
--

INSERT INTO `prices` (`id`, `price`, `month_id`, `tonnage_id`, `raw_type_id`) VALUES
(1176, 0, 3, 105, 1),
(1177, 0, 3, 105, 2),
(1178, 0, 3, 105, 3),
(1185, 0, 6, 105, 1),
(1186, 0, 6, 105, 2),
(1187, 0, 6, 105, 3),
(1188, 0, 7, 105, 1),
(1189, 0, 7, 105, 2),
(1190, 0, 7, 105, 3),
(1191, 0, 8, 105, 1),
(1192, 0, 8, 105, 2),
(1193, 0, 8, 105, 3),
(1194, 0, 9, 105, 1),
(1195, 0, 9, 105, 2),
(1196, 0, 9, 105, 3),
(1197, 0, 10, 105, 1),
(1198, 0, 10, 105, 2),
(1199, 0, 10, 105, 3),
(1200, 0, 11, 105, 1),
(1201, 0, 11, 105, 2),
(1202, 0, 11, 105, 3),
(1203, 0, 12, 105, 1),
(1204, 0, 12, 105, 2),
(1205, 0, 12, 105, 3),
(1212, 0, 3, 106, 1),
(1213, 0, 3, 106, 2),
(1214, 0, 3, 106, 3),
(1221, 0, 6, 106, 1),
(1222, 0, 6, 106, 2),
(1223, 0, 6, 106, 3),
(1224, 0, 7, 106, 1),
(1225, 0, 7, 106, 2),
(1226, 0, 7, 106, 3),
(1227, 0, 8, 106, 1),
(1228, 0, 8, 106, 2),
(1229, 0, 8, 106, 3),
(1230, 0, 9, 106, 1),
(1231, 0, 9, 106, 2),
(1232, 0, 9, 106, 3),
(1233, 0, 10, 106, 1),
(1234, 0, 10, 106, 2),
(1235, 0, 10, 106, 3),
(1236, 0, 11, 106, 1),
(1237, 0, 11, 106, 2),
(1238, 0, 11, 106, 3),
(1239, 0, 12, 106, 1),
(1240, 0, 12, 106, 2),
(1241, 0, 12, 106, 3),
(1338, 0, 5, 105, 1),
(1339, 0, 5, 106, 1),
(1342, 0, 5, 105, 2),
(1343, 0, 5, 106, 2),
(1346, 0, 5, 105, 3),
(1347, 34, 5, 106, 3),
(1350, 0, 4, 105, 1),
(1351, 12, 4, 106, 1),
(1354, 0, 4, 105, 2),
(1355, 0, 4, 106, 2),
(1358, 0, 4, 105, 3),
(1359, 0, 4, 106, 3),
(1398, 12, 2, 105, 1),
(1399, 0, 2, 106, 1),
(1400, 0, 2, 105, 2),
(1401, 0, 2, 106, 2),
(1402, 0, 2, 105, 3),
(1403, 0, 2, 106, 3),
(1476, 12, 1, 105, 1),
(1477, 4, 1, 106, 1),
(1478, 90, 1, 105, 2),
(1479, 5, 1, 106, 2),
(1480, 3, 1, 105, 3),
(1481, 6, 1, 106, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `raw_types`
--

CREATE TABLE `raw_types` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `raw_types`
--

INSERT INTO `raw_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Соя', '2023-10-18 18:24:08', '2023-10-18 18:24:08'),
(2, 'Шрот', '2023-10-18 18:24:08', '2023-10-18 18:24:08'),
(3, 'Жмых', '2023-10-18 18:24:08', '2023-10-18 18:24:08');

-- --------------------------------------------------------

--
-- Структура таблицы `tonnages`
--

CREATE TABLE `tonnages` (
  `id` int UNSIGNED NOT NULL,
  `value` tinyint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tonnages`
--

INSERT INTO `tonnages` (`id`, `value`, `created_at`, `updated_at`) VALUES
(105, 10, '2023-11-16 17:53:15', '2023-11-16 17:53:15'),
(106, 22, '2023-11-16 17:53:18', '2023-11-17 14:46:00');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `success` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`, `success`) VALUES
(4, 'admin', 'admin@mail.ru', '$2y$13$tJSq2zaTogXXnwUJppRRa.bQmAZsZpmv1bCjgRBeDDLXqBiQCcr1C', '2023-11-08 22:48:53', '2023-11-09 09:04:52', 1),
(8, 'new', 'new@mail.ru', '$2y$13$A7/FTM6VlvnDtY3CZ9j1R..K9l3XcrtNQBqPPBSnYOTOZ/vhXMmty', '2023-11-09 09:34:11', '2023-11-09 09:34:11', 1),
(9, 'sergey', 'sergey@mail.ru', '$2y$13$MeSXxcKGEBid/7.qaqKvpOYwPAzFDK4NwmBNhlnidOoKbb/LyUuBa', '2023-11-09 11:36:50', '2023-11-09 11:36:50', 1),
(10, 'serg', 'serg@mail.ru', '$2y$13$BN.UEBCIQ6wj52ChDCgH7uR3mPW/mby/.O8MPTu5.uvgDcFqDwD5.', '2023-11-18 10:49:56', '2023-11-18 12:49:15', 0),
(11, 'Пользователь', 'user@mail.ru', '$2y$13$4DMJa9DTnxyAEYpl4djT9.anOgWVmgFQpnvboXwGQABnGbP0gcAyO', '2023-11-19 12:11:37', '2023-11-19 12:11:37', 1),
(12, 'Пользовательвторой', 'us2er@mail.ru', '$2y$13$OIapYkGHSKTUHIZSkk8AQuFyyROnMRksssRLtLGUBpq.UlYPX0GIW', '2023-11-19 12:20:19', '2023-11-19 12:20:19', 1),
(13, 'new', 'new34@mail.ru', '$2y$13$Uq2kD8Q9mUEuxl0OPFyXn.j.C1uMS7aYZHIIc89VDdZVnETbt2Dh6', '2023-11-19 12:26:50', '2023-11-19 12:26:50', 1),
(14, 'new', 'new23@mail.ru', '$2y$13$Jzqrz49R4pQXsxTnumX7ZuK61WUP.uIDWyyGGU0T8xx7WjqpJbP3W', '2023-11-19 12:27:43', '2023-11-19 12:27:43', 1),
(15, 'new', 'newd23@mail.ru', '$2y$13$6.XP9SSzXWK6tPzqv4kqI.TXX82g3QdEarSy6Iy9fXH2VwW1vlzjW', '2023-11-19 12:28:08', '2023-11-19 12:28:08', 1),
(16, 'new', 'newd2sf3@mail.ru', '$2y$13$wVVkPOg2LsdmhJem1n.73OMG8jlGXEgBZjpPvi.kch3yoMEUWNR1e', '2023-11-19 12:28:40', '2023-11-19 12:28:40', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Индексы таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Индексы таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Индексы таблицы `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `months`
--
ALTER TABLE `months`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `month_id` (`month_id`,`tonnage_id`,`raw_type_id`),
  ADD KEY `tonnage_id` (`tonnage_id`),
  ADD KEY `raw_type_id` (`raw_type_id`);

--
-- Индексы таблицы `raw_types`
--
ALTER TABLE `raw_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `tonnages`
--
ALTER TABLE `tonnages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `value` (`value`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `history`
--
ALTER TABLE `history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `months`
--
ALTER TABLE `months`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `prices`
--
ALTER TABLE `prices`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1486;

--
-- AUTO_INCREMENT для таблицы `raw_types`
--
ALTER TABLE `raw_types`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `tonnages`
--
ALTER TABLE `tonnages`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `prices`
--
ALTER TABLE `prices`
  ADD CONSTRAINT `prices_ibfk_1` FOREIGN KEY (`month_id`) REFERENCES `months` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prices_ibfk_2` FOREIGN KEY (`tonnage_id`) REFERENCES `tonnages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prices_ibfk_3` FOREIGN KEY (`raw_type_id`) REFERENCES `raw_types` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
