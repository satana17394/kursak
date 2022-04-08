-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 08 2022 г., 18:28
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `demo-exam-is-93`
--

-- --------------------------------------------------------

--
-- Структура таблицы `aplications`
--

CREATE TABLE `aplications` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `user_id` int NOT NULL,
  `category_id` int NOT NULL,
  `image_before` varchar(255) NOT NULL,
  `image_after` varchar(255) DEFAULT NULL,
  `cause` varchar(255) DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `aplications`
--

INSERT INTO `aplications` (`id`, `title`, `description`, `user_id`, `category_id`, `image_before`, `image_after`, `cause`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Выполнение курсовой работы', 'test', 1, 1, '/images/before/1647256329.jpg', '/images/after/1647256408.jpg', NULL, 2, '2022-03-14 11:12:09', '2022-03-14 11:13:28'),
(5, '111', '111', 1, 2, '/images/before/1647256555.png', NULL, 'BAN', 3, '2022-03-14 11:15:55', '2022-03-14 11:18:02'),
(6, 'test2', 'test2', 5, 2, '/images/before/1647338830.png', '/images/after/1647338907.png', NULL, 2, '2022-03-15 10:07:10', '2022-03-15 10:08:27'),
(8, 'test3', 'test3', 1, 1, '/images/before/1647339928.png', NULL, NULL, 1, '2022-03-15 10:25:28', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'default'),
(2, 'вторая'),
(3, 'Украденные картины'),
(4, 'Незаконченные картины‎');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `name`, `created`) VALUES
(1, '001_migrations_table.sql', '2021-12-27 08:02:52'),
(2, '002_users_table.sql', '2021-12-27 08:02:52'),
(3, '003_categories_table.sql', '2021-12-27 08:02:52'),
(4, '004_aplications_table.sql', '2021-12-27 08:02:52');

-- --------------------------------------------------------

--
-- Структура таблицы `requests`
--

CREATE TABLE `requests` (
  `id` int NOT NULL,
  `description` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `max_cost` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `category_id` int NOT NULL,
  `user_id` int NOT NULL,
  `final_cost` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status_id` int DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `requests`
--

INSERT INTO `requests` (`id`, `description`, `img`, `max_cost`, `adress`, `category_id`, `user_id`, `final_cost`, `created_at`, `updated_at`, `status_id`) VALUES
(10, ' созданная в промежутке между 1893 и 1910 годами серия картин норвежского художника-экспрессиониста Эдварда Мунка. На них изображена кричащая в отчаянии человеческая фигура на фоне кроваво-красного неба и крайне обобщённого пейзажного фона. В 1895 г. Мунк создал литографию на тот же сюжет.', '1649430385.jpeg', '44', 'aaaaaaaaaaaaaaaaaaaaaa', 3, 1, 0, '2022-04-08 15:06:25', NULL, 1),
(11, 'На полотне небольшого размера изображена женщина средних след, в темной накидке (по мнению историков – признак вдовства), сидящая вполоборота. Как на других портретах Итальянского Возрождения у Моны Лизы отсутствуют брови и выбриты волосы на верхушке лба. Скорее всего, модель позировала на балконе, так как видна линия парапета. Считается, что картина немного обрезана, в оригинальный размер виднеющиеся позади колонны входили полностью.  Считается, что композиция картины – эталон портретного жанра. Она написана по всем законам гармонии и ритма: модель вписана в пропорциональный прямоугольник, волнистая прядь волос созвучна с полупрозрачной вуалью, а сложенные руки придают картине особую композиционную завершенность.', '1649430493.jpeg', '12222222', 'aaaaaaaaaaaaaaaaaaaaaa', 4, 1, 0, '2022-04-08 15:08:13', NULL, 1),
(12, ' созданная в промежутке между 1893 и 1910 годами серия картин норвежского художника-экспрессиониста Эдварда Мунка. На них изображена кричащая в отчаянии человеческая фигура на фоне кроваво-красного неба и крайне обобщённого пейзажного фона. В 1895 г. Мунк создал литографию на тот же сюжет.', '1649430526.jpeg', '12222222', '1111', 2, 1, 0, '2022-04-08 15:08:46', NULL, 1),
(13, 'На полотне небольшого размера изображена женщина средних след, в темной накидке (по мнению историков – признак вдовства), сидящая вполоборота. Как на других портретах Итальянского Возрождения у Моны Лизы отсутствуют брови и выбриты волосы на верхушке лба. Скорее всего, модель позировала на балконе, так как видна линия парапета. Считается, что картина немного обрезана, в оригинальный размер виднеющиеся позади колонны входили полностью.  Считается, что композиция картины – эталон портретного жанра. Она написана по всем законам гармонии и ритма: модель вписана в пропорциональный прямоугольник, волнистая прядь волос созвучна с полупрозрачной вуалью, а сложенные руки придают картине особую композиционную завершенность.', '1649430550.jpeg', '12222222', 'aaaaaaaaaaaaaaaaaaaaaa', 2, 1, 0, '2022-04-08 15:09:10', NULL, 1),
(14, ' созданная в промежутке между 1893 и 1910 годами серия картин норвежского художника-экспрессиониста Эдварда Мунка. На них изображена кричащая в отчаянии человеческая фигура на фоне кроваво-красного неба и крайне обобщённого пейзажного фона. В 1895 г. Мунк создал литографию на тот же сюжет.', '1649430728.jpeg', '12222222', 'aaaaaaaaaaaaaaaaaaaaaa', 3, 7, 0, '2022-04-08 15:12:08', NULL, 1),
(15, 'На полотне небольшого размера изображена женщина средних след, в темной накидке (по мнению историков – признак вдовства), сидящая вполоборота. Как на других портретах Итальянского Возрождения у Моны Лизы отсутствуют брови и выбриты волосы на верхушке лба. Скорее всего, модель позировала на балконе, так как видна линия парапета. Считается, что картина немного обрезана, в оригинальный размер виднеющиеся позади колонны входили полностью.  Считается, что композиция картины – эталон портретного жанра. Она написана по всем законам гармонии и ритма: модель вписана в пропорциональный прямоугольник, волнистая прядь волос созвучна с полупрозрачной вуалью, а сложенные руки придают картине особую композиционную завершенность.', '1649431195.jpeg', '44', 'aaaaaaaaaaaaaaaaaaaaaa', 3, 7, 0, '2022-04-08 15:19:55', NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `FIO` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `FIO`, `login`, `email`, `password`, `status`) VALUES
(1, 'Ivan', 'admin', 'yourDuddy@mail.ru', '12345678', 1),
(2, 'dshgfs', 'Who', 'test@mail.ru', '1234', 0),
(3, 'admin', 'test', 'tes2t@mail.ru', '1234', 0),
(5, 'Иван', 'Ivan', 'test@test.ru', '1234', 0),
(6, 'aa', 'www', 'www@w', 'www', 0),
(7, 'aaa', 'aaa', 'aaa@aa', 'aaaa', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `aplications`
--
ALTER TABLE `aplications`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `requests`
--
ALTER TABLE `requests`
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
-- AUTO_INCREMENT для таблицы `aplications`
--
ALTER TABLE `aplications`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
