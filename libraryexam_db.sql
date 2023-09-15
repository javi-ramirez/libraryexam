-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-09-2023 a las 03:38:58
-- Versión del servidor: 5.5.21
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `libraryexam_db`
--
CREATE DATABASE IF NOT EXISTS `libraryexam_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `libraryexam_db`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `books`
--

INSERT INTO `books` (`id`, `name`, `author`, `published_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'A Game of Thrones', 'George R R Martin', '1996-08-06', 1, '2023-09-12 22:34:19', '2023-09-12 22:34:19'),
(2, 'A Clash of Kings', 'George R R Martin', '1998-11-01', 1, '2023-09-12 22:34:51', '2023-09-14 08:16:00'),
(3, 'A Storm of Swords', 'George R R Martin', '2000-08-01', 1, '2023-09-12 22:35:24', '2023-09-12 22:35:24'),
(4, 'A Feast for Crows', 'George R R Martin', '2005-10-01', 1, '2023-09-12 22:35:46', '2023-09-12 22:35:46'),
(5, 'A Dance with Dragons', 'George R R Martin', '2011-07-01', 1, '2023-09-12 22:36:22', '2023-09-12 22:36:22'),
(6, 'The Hunger Games', 'Suzanne Collins', '2008-01-01', 1, '2023-09-13 00:26:24', '2023-09-13 00:26:24'),
(7, 'The Maze Runner', 'James Dashner', '2009-10-01', 1, '2023-09-14 00:57:06', '2023-09-14 11:01:07'),
(11, 'Harry Potter and the Philosophers Stone', 'J K Rowling', '1997-06-26', 0, '2023-09-14 02:59:18', '2023-09-14 21:03:45'),
(12, 'Harry Potter and the Chamber of Secrets', 'J K Rowling', '1998-07-02', 1, '2023-09-14 03:59:40', '2023-09-14 10:39:12'),
(13, 'Harry Potter and the Prisoner of Azkaban', 'J K Rowling', '1999-07-08', 0, '2023-09-14 04:24:43', '2023-09-14 21:04:01'),
(14, 'Harry Potter and the Goblet of Fire', 'J K Rowling', '2000-07-08', 1, '2023-09-14 04:32:23', '2023-09-14 10:38:57'),
(15, 'Harry Potter and the Order of the Phoenix', 'J K Rowling', '2003-06-21', 1, '2023-09-14 10:03:55', '2023-09-14 10:03:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Novel', 'Description Novel', 1, '2023-09-12 22:30:47', '2023-09-12 22:30:47'),
(2, 'Fantasy Literature', 'Description Fantasy literature', 1, '2023-09-12 22:31:06', '2023-09-14 09:52:33'),
(3, 'High Fantasy', 'Description High fantasy', 1, '2023-09-12 22:31:32', '2023-09-12 22:31:32'),
(4, 'Political Fiction', 'Description Political fiction', 1, '2023-09-12 22:32:05', '2023-09-12 22:32:05'),
(5, 'Fantasy Genre', 'Description Fantasy genre', 1, '2023-09-12 22:32:25', '2023-09-12 22:32:25'),
(6, 'Non fiction', 'Description Non fiction', 1, '2023-09-13 15:09:17', '2023-09-15 05:50:38'),
(7, 'Biography Autobiography', 'Description Biography Autobiography', 0, '2023-09-13 15:09:17', '2023-09-14 21:01:03'),
(8, 'Drama', 'Description Drama', 1, '2023-09-13 15:09:17', '2023-09-13 15:09:17'),
(9, 'Essay', 'Description Essay', 1, '2023-09-13 16:46:41', '2023-09-13 16:46:41'),
(10, 'Poetry', 'Description Poetry', 1, '2023-09-13 16:46:41', '2023-09-13 16:46:41'),
(11, 'Mistery novel', 'Description Mistery novel', 1, '2023-09-13 16:46:41', '2023-09-13 16:46:41'),
(12, 'Romantic novel', 'Description Romantic novel', 1, '2023-09-13 16:46:41', '2023-09-14 10:11:36'),
(13, 'Textbook', 'Description Textbook', 1, '2023-09-14 09:04:49', '2023-09-14 11:28:46'),
(14, 'Cookery book', 'Description Cookery book', 0, '2023-09-14 10:10:55', '2023-09-14 21:00:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `literary_genres`
--

CREATE TABLE `literary_genres` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `literary_genres`
--

INSERT INTO `literary_genres` (`id`, `book_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-09-12 22:37:44', '2023-09-12 22:37:44'),
(2, 1, 2, '2023-09-12 22:37:44', '2023-09-12 22:37:44'),
(4, 3, 3, '2023-09-12 22:37:44', '2023-09-12 22:37:44'),
(5, 4, 4, '2023-09-12 22:37:44', '2023-09-12 22:37:44'),
(6, 4, 1, '2023-09-12 22:37:44', '2023-09-12 22:37:44'),
(7, 5, 5, '2023-09-12 22:37:44', '2023-09-12 22:37:44'),
(8, 6, 1, '2023-09-12 22:37:44', '2023-09-12 22:37:44'),
(9, 7, 11, '2023-09-14 00:57:06', '2023-09-14 00:57:06'),
(13, 12, 1, '2023-09-14 03:59:40', '2023-09-14 03:59:40'),
(14, 13, 1, '2023-09-14 04:24:43', '2023-09-14 04:24:43'),
(15, 14, 6, '2023-09-14 04:32:23', '2023-09-14 04:32:23'),
(17, 11, 5, '2023-09-14 08:13:48', '2023-09-14 08:13:48'),
(18, 11, 1, '2023-09-14 08:13:48', '2023-09-14 08:13:48'),
(19, 2, 1, '2023-09-14 08:16:00', '2023-09-14 08:16:00'),
(20, 2, 11, '2023-09-14 08:16:00', '2023-09-14 08:16:00'),
(21, 15, 11, '2023-09-14 10:03:55', '2023-09-14 10:03:55'),
(22, 15, 12, '2023-09-14 10:03:55', '2023-09-14 10:03:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `loans`
--

CREATE TABLE `loans` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `loan_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `return_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `loans`
--

INSERT INTO `loans` (`id`, `user_id`, `book_id`, `loan_date`, `status`, `return_date`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2023-09-12 17:45:31', 0, '2023-09-12 20:30:41', '2023-09-12 23:45:31', '2023-09-12 23:45:31'),
(2, 1, 5, '2023-09-12 18:10:19', 0, '2023-09-14 21:24:03', '2023-09-13 00:10:19', '2023-09-15 03:24:03'),
(3, 1, 3, '2023-09-13 09:43:11', 0, '2023-09-14 22:06:38', '2023-09-13 00:15:37', '2023-09-15 04:06:38'),
(5, 1, 2, '2023-09-14 18:20:59', 0, '2023-09-14 21:15:30', '2023-09-15 00:20:59', '2023-09-15 03:15:30'),
(8, 1, 14, '2023-09-14 18:36:36', 0, '2023-09-14 21:44:01', '2023-09-15 00:36:36', '2023-09-15 03:44:01'),
(9, 2, 1, '2023-09-14 19:07:17', 1, NULL, '2023-09-15 01:07:17', '2023-09-15 01:07:17'),
(10, 2, 7, '2023-09-14 19:57:05', 1, NULL, '2023-09-15 01:57:05', '2023-09-15 01:57:05'),
(11, 1, 2, '2023-09-14 22:14:04', 0, '2023-09-14 23:56:01', '2023-09-15 04:14:04', '2023-09-15 05:56:01'),
(12, 1, 6, '2023-09-14 22:14:12', 0, '2023-09-14 23:34:34', '2023-09-15 04:14:12', '2023-09-15 05:34:34'),
(13, 1, 5, '2023-09-14 22:14:22', 0, '2023-09-14 23:52:55', '2023-09-15 04:14:22', '2023-09-15 05:52:55'),
(14, 1, 12, '2023-09-14 23:49:17', 0, '2023-09-14 23:51:32', '2023-09-15 05:49:17', '2023-09-15 05:51:32'),
(15, 1, 6, '2023-09-15 01:10:35', 1, NULL, '2023-09-15 07:10:35', '2023-09-15 07:10:35'),
(16, 1, 4, '2023-09-15 01:10:46', 1, NULL, '2023-09-15 07:10:46', '2023-09-15 07:10:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(12, '2023_09_12_162301_create_categories_table', 1),
(13, '2023_09_12_162311_create_users_table', 1),
(14, '2023_09_12_162321_create_books_table', 1),
(15, '2023_09_12_162331_create_loans_table', 1),
(16, '2023_09_12_171359_create_literary_genres_table', 1),
(17, '2023_09_14_175750_create_notifications_users_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notifications_users`
--

CREATE TABLE `notifications_users` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `notifications_users`
--

INSERT INTO `notifications_users` (`id`, `book_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 0, '2023-09-15 00:53:19', '2023-09-15 03:15:30'),
(2, 5, 2, 0, '2023-09-15 01:06:51', '2023-09-15 03:24:04'),
(3, 3, 2, 0, '2023-09-15 01:16:58', '2023-09-15 04:06:39'),
(4, 6, 2, 0, '2023-09-15 04:14:53', '2023-09-15 05:34:34'),
(5, 6, 3, 0, '2023-09-15 05:25:59', '2023-09-15 05:26:57'),
(6, 1, 1, 1, '2023-09-15 05:48:32', '2023-09-15 05:48:32'),
(7, 5, 3, 0, '2023-09-15 05:52:40', '2023-09-15 05:52:56'),
(8, 2, 2, 0, '2023-09-15 05:55:45', '2023-09-15 05:56:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Javier A Ramirez', 'javier_agustinrm@hotmail.com', '3241085770', 'ebe1bb3a23003c7970cbaffb12b120dd', 1, '2023-09-14 12:04:36', '2023-09-15 07:33:49'),
(2, 'Agustin Martinez', 'javi.guti.rama@gmail.com', '3328027554', 'ebe1bb3a23003c7970cbaffb12b120dd', 1, '2023-09-14 12:04:36', '2023-09-15 07:34:26'),
(3, 'Mariana Perez', 'javi.guti.rama@hotmail.com', '3322163631', 'ebe1bb3a23003c7970cbaffb12b120dd', 1, '2023-09-14 12:04:36', '2023-09-15 07:35:10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `literary_genres`
--
ALTER TABLE `literary_genres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `literary_genres_book_id_foreign` (`book_id`),
  ADD KEY `literary_genres_category_id_foreign` (`category_id`);

--
-- Indices de la tabla `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loans_user_id_foreign` (`user_id`),
  ADD KEY `loans_book_id_foreign` (`book_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notifications_users`
--
ALTER TABLE `notifications_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_users_book_id_foreign` (`book_id`),
  ADD KEY `notifications_users_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`(191),`tokenable_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `literary_genres`
--
ALTER TABLE `literary_genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `notifications_users`
--
ALTER TABLE `notifications_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `literary_genres`
--
ALTER TABLE `literary_genres`
  ADD CONSTRAINT `literary_genres_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `literary_genres_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);

--
-- Filtros para la tabla `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `loans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `notifications_users`
--
ALTER TABLE `notifications_users`
  ADD CONSTRAINT `notifications_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `notifications_users_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
