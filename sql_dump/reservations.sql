-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2021 a las 14:57:57
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reservations`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artists`
--

CREATE TABLE `artists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `artists`
--

INSERT INTO `artists` (`id`, `firstname`, `lastname`) VALUES
(1, 'Daniel', 'Marcelin'),
(2, 'Philippe', 'Laurent'),
(3, 'Marius', 'Von Mayenburg'),
(4, 'Olivier', 'Boudon'),
(5, 'Anne Marie', 'Loop'),
(6, 'Pietro', 'Varasso'),
(7, 'Laurent', 'Caron'),
(8, 'Élena', 'Perez'),
(9, 'Guillaume', 'Alexandre'),
(10, 'Claude', 'Semal'),
(11, 'Laurence', 'Warin'),
(12, 'Pierre', 'Wayburn'),
(13, 'Gwendoline', 'Gauthier');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artist_type`
--

CREATE TABLE `artist_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `artist_id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `artist_type`
--

INSERT INTO `artist_type` (`id`, `artist_id`, `type_id`) VALUES
(1, 1, 4),
(2, 2, 4),
(3, 1, 2),
(4, 2, 2),
(5, 1, 3),
(6, 3, 4),
(7, 4, 2),
(8, 5, 3),
(9, 6, 3),
(10, 7, 3),
(11, 8, 3),
(12, 9, 3),
(13, 10, 4),
(14, 11, 2),
(15, 10, 3),
(16, 12, 4),
(17, 13, 4),
(18, 2, 2),
(19, 12, 3),
(20, 13, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artist_type_show`
--

CREATE TABLE `artist_type_show` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `artist_type_id` bigint(20) UNSIGNED NOT NULL,
  `show_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `artist_type_show`
--

INSERT INTO `artist_type_show` (`id`, `artist_type_id`, `show_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 2),
(7, 7, 2),
(8, 8, 2),
(9, 9, 2),
(10, 10, 2),
(11, 11, 2),
(12, 12, 2),
(13, 13, 3),
(14, 14, 3),
(15, 15, 3),
(16, 16, 4),
(17, 17, 4),
(18, 4, 4),
(19, 19, 4),
(20, 20, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `browse` tinyint(1) NOT NULL DEFAULT 1,
  `read` tinyint(1) NOT NULL DEFAULT 1,
  `edit` tinyint(1) NOT NULL DEFAULT 1,
  `add` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 1,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, NULL, 3),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, NULL, 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, NULL, 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, NULL, 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, NULL, 12),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Role', 1, 1, 1, 1, 1, 1, NULL, 9),
(22, 6, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(23, 6, 'firstname', 'text', 'Firstname', 1, 1, 1, 1, 1, 1, '{}', 2),
(24, 6, 'lastname', 'text', 'Lastname', 1, 1, 1, 1, 1, 1, '{}', 3),
(25, 7, 'id', 'number', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(26, 7, 'type', 'text', 'Type', 1, 1, 1, 1, 1, 1, '{}', 2),
(27, 8, 'id', 'number', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(28, 8, 'artist_id', 'number', 'Artist Id', 1, 1, 1, 1, 1, 1, '{}', 2),
(29, 8, 'type_id', 'number', 'Type Id', 1, 1, 1, 1, 1, 1, '{}', 3),
(30, 8, 'artist_type_belongsto_artist_relationship', 'relationship', 'artists', 1, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Artist\",\"table\":\"artists\",\"type\":\"belongsTo\",\"column\":\"artist_id\",\"key\":\"id\",\"label\":\"id\",\"pivot_table\":\"artist_type\",\"pivot\":\"0\",\"taggable\":\"0\"}', 4),
(31, 8, 'artist_type_belongsto_type_relationship', 'relationship', 'types', 1, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Type\",\"table\":\"types\",\"type\":\"belongsTo\",\"column\":\"type_id\",\"key\":\"id\",\"label\":\"type\",\"pivot_table\":\"artist_type\",\"pivot\":\"0\",\"taggable\":\"0\"}', 5),
(32, 8, 'artist_type_belongstomany_show_relationship', 'relationship', 'shows', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Show\",\"table\":\"shows\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"title\",\"pivot_table\":\"artist_type_show\",\"pivot\":\"1\",\"taggable\":\"0\"}', 6),
(33, 9, 'id', 'number', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(34, 9, 'postal_code', 'text', 'Postal Code', 1, 1, 1, 1, 1, 1, '{}', 2),
(35, 9, 'locality', 'text', 'Locality', 1, 1, 1, 1, 1, 1, '{}', 3),
(36, 7, 'type_belongstomany_artist_relationship', 'relationship', 'artists', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Artist\",\"table\":\"artists\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"id\",\"pivot_table\":\"artist_type\",\"pivot\":\"1\",\"taggable\":null}', 3),
(37, 10, 'id', 'number', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(38, 10, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"designation\",\"forceUpdate\":true}}', 3),
(39, 10, 'designation', 'text', 'Designation', 1, 1, 1, 1, 1, 1, '{}', 4),
(40, 10, 'address', 'text', 'Address', 1, 1, 1, 1, 1, 1, '{}', 5),
(41, 10, 'locality_id', 'text', 'Locality Id', 1, 1, 1, 1, 1, 1, '{}', 2),
(42, 10, 'website', 'text', 'Website', 0, 1, 1, 1, 1, 1, '{}', 6),
(43, 10, 'phone', 'text', 'Phone', 0, 1, 1, 1, 1, 1, '{}', 7),
(44, 10, 'location_belongsto_locality_relationship', 'relationship', 'localities', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Locality\",\"table\":\"localities\",\"type\":\"belongsTo\",\"column\":\"locality_id\",\"key\":\"id\",\"label\":\"postal_code\",\"pivot_table\":\"artist_type\",\"pivot\":\"0\",\"taggable\":\"0\"}', 8),
(45, 11, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(46, 11, 'show_id', 'text', 'Show Id', 0, 1, 1, 1, 1, 1, '{}', 2),
(47, 11, 'when', 'timestamp', 'When', 1, 1, 1, 1, 1, 1, '{\"format\":\"%Y-%m-%d %H:%M:%S\"}', 4),
(48, 11, 'location_id', 'text', 'Location Id', 0, 1, 1, 1, 1, 1, '{}', 3),
(49, 11, 'representation_belongsto_show_relationship', 'relationship', 'shows', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Show\",\"table\":\"shows\",\"type\":\"belongsTo\",\"column\":\"show_id\",\"key\":\"id\",\"label\":\"title\",\"pivot_table\":\"artist_type\",\"pivot\":\"0\",\"taggable\":\"0\"}', 5),
(50, 11, 'representation_belongsto_location_relationship', 'relationship', 'locations', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Location\",\"table\":\"locations\",\"type\":\"belongsTo\",\"column\":\"location_id\",\"key\":\"id\",\"label\":\"designation\",\"pivot_table\":\"artist_type\",\"pivot\":\"0\",\"taggable\":\"0\"}', 6),
(51, 11, 'representation_belongstomany_user_relationship', 'relationship', 'users', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\User\",\"table\":\"users\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"representation_user\",\"pivot\":\"1\",\"taggable\":\"0\"}', 7),
(52, 1, 'user_belongstomany_representation_relationship', 'relationship', 'representations', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Representation\",\"table\":\"representations\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"id\",\"pivot_table\":\"representation_user\",\"pivot\":\"1\",\"taggable\":null}', 13),
(53, 16, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(54, 16, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true}}', 3),
(55, 16, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, '{}', 4),
(56, 16, 'description', 'text', 'Description', 1, 1, 1, 1, 1, 1, '{}', 5),
(57, 16, 'poster_url', 'image', 'Poster Url', 1, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":null},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}', 6),
(58, 16, 'location_id', 'number', 'Location Id', 1, 1, 1, 1, 1, 1, '{}', 2),
(59, 16, 'bookable', 'checkbox', 'Bookable', 1, 1, 1, 1, 1, 1, '{\"0\":\"Not bookable\",\"1\":\"Bookable\",\"checked\":true}', 7),
(60, 16, 'price', 'number', 'Price', 1, 1, 1, 1, 1, 1, '{}', 8),
(61, 16, 'show_belongsto_location_relationship', 'relationship', 'locations', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Location\",\"table\":\"locations\",\"type\":\"belongsTo\",\"column\":\"location_id\",\"key\":\"id\",\"label\":\"designation\",\"pivot_table\":\"artist_type\",\"pivot\":\"0\",\"taggable\":\"0\"}', 9),
(62, 16, 'show_hasmany_representation_relationship', 'relationship', 'representations', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Representation\",\"table\":\"representations\",\"type\":\"hasMany\",\"column\":\"show_id\",\"key\":\"id\",\"label\":\"when\",\"pivot_table\":\"artist_type\",\"pivot\":\"0\",\"taggable\":\"0\"}', 10),
(63, 16, 'show_belongstomany_artist_type_relationship', 'relationship', 'artist_type', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\ArtistType\",\"table\":\"artist_type\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"id\",\"pivot_table\":\"artist_type_show\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(64, 18, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(65, 18, 'user_id', 'text', 'User Id', 1, 1, 1, 1, 1, 1, '{}', 2),
(66, 18, 'representation_id', 'text', 'Representation Id', 1, 1, 1, 1, 1, 1, '{}', 3),
(67, 18, 'places', 'text', 'Places', 1, 1, 1, 1, 1, 1, '{}', 4),
(68, 18, 'representation_user_belongsto_user_relationship', 'relationship', 'users', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"artist_type\",\"pivot\":\"0\",\"taggable\":null}', 5),
(69, 18, 'representation_user_belongsto_representation_relationship', 'relationship', 'representations', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Representation\",\"table\":\"representations\",\"type\":\"belongsTo\",\"column\":\"representation_id\",\"key\":\"id\",\"label\":\"when\",\"pivot_table\":\"artist_type\",\"pivot\":\"0\",\"taggable\":null}', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT 0,
  `server_side` tinyint(4) NOT NULL DEFAULT 0,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', '', 1, 0, NULL, '2021-05-31 11:52:01', '2021-05-31 11:52:01'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2021-05-31 11:52:01', '2021-05-31 11:52:01'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController', '', 1, 0, NULL, '2021-05-31 11:52:01', '2021-05-31 11:52:01'),
(6, 'artists', 'artists', 'Artist', 'Artists', NULL, 'App\\Models\\Artist', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2021-05-31 12:02:34', '2021-05-31 12:04:33'),
(7, 'types', 'types', 'Type', 'Types', NULL, 'App\\Models\\Type', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2021-05-31 12:06:07', '2021-05-31 12:06:07'),
(8, 'artist_type', 'artist-type', 'Artist Type', 'Artist Types', NULL, 'App\\Models\\ArtistType', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2021-05-31 12:10:04', '2021-05-31 12:38:17'),
(9, 'localities', 'localities', 'Locality', 'Localities', NULL, 'App\\Models\\Locality', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2021-05-31 12:59:56', '2021-05-31 12:59:56'),
(10, 'locations', 'locations', 'Location', 'Locations', NULL, 'App\\Models\\Location', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2021-05-31 13:19:08', '2021-05-31 13:25:20'),
(11, 'representations', 'representations', 'Representation', 'Representations', NULL, 'App\\Models\\Representation', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2021-05-31 13:40:22', '2021-05-31 13:54:09'),
(16, 'shows', 'shows', 'Show', 'Shows', NULL, 'App\\Models\\Show', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2021-05-31 15:43:40', '2021-06-01 16:49:53'),
(18, 'representation_user', 'representation-user', 'Representation User', 'Representation Users', NULL, 'App\\Models\\RepresentationUser', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2021-05-31 16:09:20', '2021-05-31 16:15:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localities`
--

CREATE TABLE `localities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `postal_code` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locality` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `localities`
--

INSERT INTO `localities` (`id`, `postal_code`, `locality`) VALUES
(1, '1070', 'Belgium, Brussels'),
(2, '1000', 'Belgium, Brussels'),
(3, '1080', 'Belgium, Brussels'),
(4, '1090', 'Belgium, Brussels'),
(5, '1060', 'Belgium, Brussels'),
(6, '1070', 'Belgium, Brussels'),
(7, '1020', 'Belgium, Brussels');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locality_id` bigint(20) UNSIGNED NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `locations`
--

INSERT INTO `locations` (`id`, `slug`, `designation`, `address`, `locality_id`, `website`, `phone`) VALUES
(1, 'espace-delvaux-la-venerie', 'Espace Delvaux / La Vénerie', '3 rue Gratès', 1, 'https://www.lavenerie.be', '+32 (0)2/663.85.50'),
(2, 'dexia-art-center', 'Dexia Art Center', '50 rue de l\'Ecuyer', 2, NULL, NULL),
(3, 'la-samaritaine', 'La Samaritaine', '16 rue de la samaritaine', 2, 'http://www.lasamaritaine.be/', NULL),
(4, 'espace-magh', 'Espace Magh', '17 rue du Poinçon', 2, 'http://www.espacemagh.be', '+32 (0)2/274.05.10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2021-05-31 11:52:02', '2021-05-31 11:52:02'),
(2, 'User', '2021-06-01 15:43:17', '2021-06-01 15:43:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2021-05-31 11:52:02', '2021-05-31 11:52:02', 'voyager.dashboard', NULL),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 5, '2021-05-31 11:52:02', '2021-05-31 11:52:02', 'voyager.media.index', NULL),
(3, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 3, '2021-05-31 11:52:02', '2021-05-31 11:52:02', 'voyager.users.index', NULL),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 2, '2021-05-31 11:52:02', '2021-05-31 11:52:02', 'voyager.roles.index', NULL),
(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 9, '2021-05-31 11:52:02', '2021-05-31 11:52:02', NULL, NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 10, '2021-05-31 11:52:02', '2021-05-31 11:52:02', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 11, '2021-05-31 11:52:02', '2021-05-31 11:52:02', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 12, '2021-05-31 11:52:02', '2021-05-31 11:52:02', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 13, '2021-05-31 11:52:02', '2021-05-31 11:52:02', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 14, '2021-05-31 11:52:02', '2021-05-31 11:52:02', 'voyager.settings.index', NULL),
(11, 1, 'Hooks', '', '_self', 'voyager-hook', NULL, 5, 13, '2021-05-31 11:52:05', '2021-05-31 11:52:05', 'voyager.hooks', NULL),
(12, 1, 'Artists', '', '_self', NULL, NULL, NULL, 15, '2021-05-31 12:02:34', '2021-05-31 12:02:34', 'voyager.artists.index', NULL),
(13, 1, 'Types', '', '_self', NULL, NULL, NULL, 16, '2021-05-31 12:06:08', '2021-05-31 12:06:08', 'voyager.types.index', NULL),
(14, 1, 'Artist Types', '', '_self', NULL, NULL, NULL, 17, '2021-05-31 12:10:05', '2021-05-31 12:10:05', 'voyager.artist-type.index', NULL),
(15, 1, 'Localities', '', '_self', NULL, NULL, NULL, 18, '2021-05-31 12:59:56', '2021-05-31 12:59:56', 'voyager.localities.index', NULL),
(16, 1, 'Locations', '', '_self', NULL, NULL, NULL, 19, '2021-05-31 13:19:09', '2021-05-31 13:19:09', 'voyager.locations.index', NULL),
(17, 1, 'Representations', '', '_self', NULL, NULL, NULL, 20, '2021-05-31 13:40:22', '2021-05-31 13:40:22', 'voyager.representations.index', NULL),
(22, 1, 'Shows', '', '_self', NULL, NULL, NULL, 22, '2021-05-31 15:43:41', '2021-05-31 15:43:41', 'voyager.shows.index', NULL),
(23, 1, 'Representation Users', '', '_self', NULL, NULL, NULL, 23, '2021-05-31 16:09:20', '2021-05-31 16:09:20', 'voyager.representation-user.index', NULL),
(24, 2, 'Modify Profile', 'http://127.0.0.1:8000/admin/users/1/edit', '_blank', NULL, '#000000', NULL, 24, '2021-06-01 15:59:46', '2021-06-01 16:00:32', NULL, '');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_01_01_000000_add_voyager_user_fields', 1),
(4, '2016_01_01_000000_create_data_types_table', 1),
(5, '2016_05_19_173453_create_menu_table', 1),
(6, '2016_10_21_190000_create_roles_table', 1),
(7, '2016_10_21_190000_create_settings_table', 1),
(8, '2016_11_30_135954_create_permission_table', 1),
(9, '2016_11_30_141208_create_permission_role_table', 1),
(10, '2016_12_26_201236_data_types__add__server_side', 1),
(11, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(12, '2017_01_14_005015_create_translations_table', 1),
(13, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(14, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(15, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(16, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(17, '2017_08_05_000000_add_group_to_settings_table', 1),
(18, '2017_11_26_013050_add_user_role_relationship', 1),
(19, '2017_11_26_015000_create_user_roles_table', 1),
(20, '2018_03_11_000000_add_user_settings', 1),
(21, '2018_03_14_000000_add_details_to_data_types_table', 1),
(22, '2018_03_16_000000_make_settings_value_nullable', 1),
(23, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2021_02_06_104734_create_artists_table', 1),
(25, '2021_02_10_150158_create_types_table', 1),
(26, '2021_02_10_203418_create_localities_table', 1),
(27, '2021_02_12_144420_create_locations_table', 1),
(28, '2021_03_18_154201_create_shows_table', 1),
(29, '2021_03_21_145024_create_representations_table', 1),
(30, '2021_03_28_131236_create_artist_type_table', 1),
(31, '2021_03_28_150040_create_artist_type_show_table', 1),
(32, '2021_03_28_173604_create_representation_user_table', 1),
(33, '2021_05_31_183048_update_representation_user_table', 2),
(34, '2021_06_02_134218_update_shows_table', 3),
(35, '2021_06_02_134524_update_shows_table', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2021-05-31 11:52:02', '2021-05-31 11:52:02'),
(2, 'browse_bread', NULL, '2021-05-31 11:52:03', '2021-05-31 11:52:03'),
(3, 'browse_database', NULL, '2021-05-31 11:52:03', '2021-05-31 11:52:03'),
(4, 'browse_media', NULL, '2021-05-31 11:52:03', '2021-05-31 11:52:03'),
(5, 'browse_compass', NULL, '2021-05-31 11:52:03', '2021-05-31 11:52:03'),
(6, 'browse_menus', 'menus', '2021-05-31 11:52:03', '2021-05-31 11:52:03'),
(7, 'read_menus', 'menus', '2021-05-31 11:52:03', '2021-05-31 11:52:03'),
(8, 'edit_menus', 'menus', '2021-05-31 11:52:03', '2021-05-31 11:52:03'),
(9, 'add_menus', 'menus', '2021-05-31 11:52:03', '2021-05-31 11:52:03'),
(10, 'delete_menus', 'menus', '2021-05-31 11:52:03', '2021-05-31 11:52:03'),
(11, 'browse_roles', 'roles', '2021-05-31 11:52:03', '2021-05-31 11:52:03'),
(12, 'read_roles', 'roles', '2021-05-31 11:52:03', '2021-05-31 11:52:03'),
(13, 'edit_roles', 'roles', '2021-05-31 11:52:03', '2021-05-31 11:52:03'),
(14, 'add_roles', 'roles', '2021-05-31 11:52:03', '2021-05-31 11:52:03'),
(15, 'delete_roles', 'roles', '2021-05-31 11:52:03', '2021-05-31 11:52:03'),
(16, 'browse_users', 'users', '2021-05-31 11:52:03', '2021-05-31 11:52:03'),
(17, 'read_users', 'users', '2021-05-31 11:52:03', '2021-05-31 11:52:03'),
(18, 'edit_users', 'users', '2021-05-31 11:52:03', '2021-05-31 11:52:03'),
(19, 'add_users', 'users', '2021-05-31 11:52:03', '2021-05-31 11:52:03'),
(20, 'delete_users', 'users', '2021-05-31 11:52:03', '2021-05-31 11:52:03'),
(21, 'browse_settings', 'settings', '2021-05-31 11:52:03', '2021-05-31 11:52:03'),
(22, 'read_settings', 'settings', '2021-05-31 11:52:03', '2021-05-31 11:52:03'),
(23, 'edit_settings', 'settings', '2021-05-31 11:52:03', '2021-05-31 11:52:03'),
(24, 'add_settings', 'settings', '2021-05-31 11:52:03', '2021-05-31 11:52:03'),
(25, 'delete_settings', 'settings', '2021-05-31 11:52:03', '2021-05-31 11:52:03'),
(26, 'browse_hooks', NULL, '2021-05-31 11:52:05', '2021-05-31 11:52:05'),
(27, 'browse_artists', 'artists', '2021-05-31 12:02:34', '2021-05-31 12:02:34'),
(28, 'read_artists', 'artists', '2021-05-31 12:02:34', '2021-05-31 12:02:34'),
(29, 'edit_artists', 'artists', '2021-05-31 12:02:34', '2021-05-31 12:02:34'),
(30, 'add_artists', 'artists', '2021-05-31 12:02:34', '2021-05-31 12:02:34'),
(31, 'delete_artists', 'artists', '2021-05-31 12:02:34', '2021-05-31 12:02:34'),
(32, 'browse_types', 'types', '2021-05-31 12:06:08', '2021-05-31 12:06:08'),
(33, 'read_types', 'types', '2021-05-31 12:06:08', '2021-05-31 12:06:08'),
(34, 'edit_types', 'types', '2021-05-31 12:06:08', '2021-05-31 12:06:08'),
(35, 'add_types', 'types', '2021-05-31 12:06:08', '2021-05-31 12:06:08'),
(36, 'delete_types', 'types', '2021-05-31 12:06:08', '2021-05-31 12:06:08'),
(37, 'browse_artist_type', 'artist_type', '2021-05-31 12:10:05', '2021-05-31 12:10:05'),
(38, 'read_artist_type', 'artist_type', '2021-05-31 12:10:05', '2021-05-31 12:10:05'),
(39, 'edit_artist_type', 'artist_type', '2021-05-31 12:10:05', '2021-05-31 12:10:05'),
(40, 'add_artist_type', 'artist_type', '2021-05-31 12:10:05', '2021-05-31 12:10:05'),
(41, 'delete_artist_type', 'artist_type', '2021-05-31 12:10:05', '2021-05-31 12:10:05'),
(42, 'browse_localities', 'localities', '2021-05-31 12:59:56', '2021-05-31 12:59:56'),
(43, 'read_localities', 'localities', '2021-05-31 12:59:56', '2021-05-31 12:59:56'),
(44, 'edit_localities', 'localities', '2021-05-31 12:59:56', '2021-05-31 12:59:56'),
(45, 'add_localities', 'localities', '2021-05-31 12:59:56', '2021-05-31 12:59:56'),
(46, 'delete_localities', 'localities', '2021-05-31 12:59:56', '2021-05-31 12:59:56'),
(47, 'browse_locations', 'locations', '2021-05-31 13:19:09', '2021-05-31 13:19:09'),
(48, 'read_locations', 'locations', '2021-05-31 13:19:09', '2021-05-31 13:19:09'),
(49, 'edit_locations', 'locations', '2021-05-31 13:19:09', '2021-05-31 13:19:09'),
(50, 'add_locations', 'locations', '2021-05-31 13:19:09', '2021-05-31 13:19:09'),
(51, 'delete_locations', 'locations', '2021-05-31 13:19:09', '2021-05-31 13:19:09'),
(52, 'browse_representations', 'representations', '2021-05-31 13:40:22', '2021-05-31 13:40:22'),
(53, 'read_representations', 'representations', '2021-05-31 13:40:22', '2021-05-31 13:40:22'),
(54, 'edit_representations', 'representations', '2021-05-31 13:40:22', '2021-05-31 13:40:22'),
(55, 'add_representations', 'representations', '2021-05-31 13:40:22', '2021-05-31 13:40:22'),
(56, 'delete_representations', 'representations', '2021-05-31 13:40:22', '2021-05-31 13:40:22'),
(77, 'browse_shows', 'shows', '2021-05-31 15:43:41', '2021-05-31 15:43:41'),
(78, 'read_shows', 'shows', '2021-05-31 15:43:41', '2021-05-31 15:43:41'),
(79, 'edit_shows', 'shows', '2021-05-31 15:43:41', '2021-05-31 15:43:41'),
(80, 'add_shows', 'shows', '2021-05-31 15:43:41', '2021-05-31 15:43:41'),
(81, 'delete_shows', 'shows', '2021-05-31 15:43:41', '2021-05-31 15:43:41'),
(82, 'browse_representation_user', 'representation_user', '2021-05-31 16:09:20', '2021-05-31 16:09:20'),
(83, 'read_representation_user', 'representation_user', '2021-05-31 16:09:20', '2021-05-31 16:09:20'),
(84, 'edit_representation_user', 'representation_user', '2021-05-31 16:09:20', '2021-05-31 16:09:20'),
(85, 'add_representation_user', 'representation_user', '2021-05-31 16:09:20', '2021-05-31 16:09:20'),
(86, 'delete_representation_user', 'representation_user', '2021-05-31 16:09:20', '2021-05-31 16:09:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representations`
--

CREATE TABLE `representations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `show_id` bigint(20) UNSIGNED DEFAULT NULL,
  `when` datetime NOT NULL,
  `location_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `representations`
--

INSERT INTO `representations` (`id`, `show_id`, `when`, `location_id`) VALUES
(1, 1, '2012-10-12 13:30:00', 1),
(2, 1, '2012-10-12 20:30:00', 2),
(3, 2, '2012-10-02 20:30:00', 3),
(4, 3, '2012-10-16 20:30:00', 3),
(5, 1, '2021-05-11 17:50:00', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representation_user`
--

CREATE TABLE `representation_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `representation_id` bigint(20) UNSIGNED NOT NULL,
  `places` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `representation_user`
--

INSERT INTO `representation_user` (`id`, `user_id`, `representation_id`, `places`) VALUES
(1, 1, 2, 5),
(2, 2, 2, 1),
(3, 2, 3, 4),
(4, 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2021-05-31 11:50:10', '2021-05-31 11:50:10'),
(2, 'user', 'Normal User', '2021-05-31 11:52:02', '2021-05-31 11:52:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'Site Title', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Site Description', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', 'settings\\June2021\\PNsEA8SN0v4sm3cRSNME.png', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', NULL, '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', '', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'Reservations', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Welcome to Voyager. The Missing Admin for Laravel', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', 'settings\\June2021\\SJ5Ks91DlRar1fTn7NSk.png', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', '', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', NULL, '', 'text', 1, 'Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shows`
--

CREATE TABLE `shows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `poster_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `bookable` tinyint(1) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `shows`
--

INSERT INTO `shows` (`id`, `slug`, `title`, `description`, `poster_url`, `location_id`, `bookable`, `price`, `created_at`, `updated_at`) VALUES
(1, 'ayiti', 'Ayiti', 'Un homme est bloqué à l’aéroport. Questionné par les douaniers, il doit alors justifier son identité, et surtout prouver qu\'il est haïtien – qu\'est-ce qu\'être haïtien ?', 'shows\\June2021\\6PEfqMNqkiNd5Kjt10f0.jpg', 4, 1, '8.50', '2021-06-25 13:30:19', NULL),
(2, 'cible-mouvante', 'Cible mouvante', 'Dans ce « thriller d’anticipation », des adultes semblent alimenter et véhiculer une crainte féroce envers les enfants âgés entre 10 et 12 ans.', 'shows\\June2021\\SxApJgvZm2OnwUa9BQaP.jpg', 1, 1, '9.00', '2021-06-25 13:50:18', NULL),
(3, 'ceci-nest-pas-un-chanteur-belge', 'Ceci n\'est pas un chanteur belge', 'Non peut-être ?!Entre Magritte (pour le surréalisme comique) et Maigret (pour le réalisme mélancolique), ce dixième opus semalien propose quatorze nouvelles chansons mêlées à de petits textes humoristiques et à quelques fortes images poétiques.', 'shows\\June2021\\3thnRSLHjBVSPEDHbayi.jpg', 2, 0, '5.50', '2021-06-25 11:30:19', '2021-06-25 11:30:19'),
(4, 'manneke', 'Manneke… !', 'A tour de rôle, Pierre se joue de ses oncles, tantes, grands-parents et surtout de sa mère.', 'shows\\June2021\\ydWidulH3RozmAGxoDwb.jpg', 3, 1, '10.50', '2021-05-26 13:46:44', '2021-05-26 13:46:44'),
(8, 'voici-un-test', 'Voici un test', 'une desc fictio', 'shows\\June2021\\uS6cZ0odbo140g19kcGk.jpg', 2, 1, '14.50', '2021-06-02 11:49:13', '2021-06-02 11:49:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `types`
--

INSERT INTO `types` (`id`, `type`) VALUES
(2, 'scénographe'),
(3, 'comédien'),
(4, 'auteur');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bob', 'bob@sull.com', 'users/default.png', NULL, '$2y$10$O8TR5s3ouefCXXR9lAyetuT0i2cpuG3z0uxSk1e3rAIWnLnJJIVf2', NULL, '{\"locale\":\"en\"}', '2021-06-01 12:09:54', '2021-06-01 17:28:23'),
(2, 2, 'John', 'john@doe.com', 'users/default.png', NULL, '$2y$10$O8TR5s3ouefCXXR9lAyetuT0i2cpuG3z0uxSk1e3rAIWnLnJJIVf2', NULL, NULL, NULL, NULL),
(3, 1, 'Radad', 'epfc@epfc.com', 'users\\May2021\\QoYVbtsVm0fPuwJxTEsC.jpg', NULL, '$2y$10$q83YvKxPe3Txa0P0KN1DpuiPtfl02EgTJsc0sQxJ2EPg7OgHiRCSa', NULL, '{\"locale\":\"en\"}', '2021-05-31 11:50:10', '2021-05-31 11:56:07'),
(7, 2, 'radad', 'rrrr@gmail.com', 'users/default.png', NULL, '$2y$10$pXOaFJtewNclPd5zfuU5xe9aBt4PrBZYkuj1POsTfBMGjrMqjYor2', NULL, '{\"locale\":\"en\"}', '2021-06-01 12:09:54', '2021-06-01 17:28:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `artist_type`
--
ALTER TABLE `artist_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artist_type_artist_id_foreign` (`artist_id`),
  ADD KEY `artist_type_type_id_foreign` (`type_id`);

--
-- Indices de la tabla `artist_type_show`
--
ALTER TABLE `artist_type_show`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artist_type_show_artist_type_id_foreign` (`artist_type_id`),
  ADD KEY `artist_type_show_show_id_foreign` (`show_id`);

--
-- Indices de la tabla `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Indices de la tabla `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `localities`
--
ALTER TABLE `localities`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `locations_slug_unique` (`slug`),
  ADD KEY `locations_locality_id_foreign` (`locality_id`);

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indices de la tabla `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Indices de la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indices de la tabla `representations`
--
ALTER TABLE `representations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `representations_show_id_foreign` (`show_id`),
  ADD KEY `representations_location_id_foreign` (`location_id`);

--
-- Indices de la tabla `representation_user`
--
ALTER TABLE `representation_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `representation_user_representation_id_foreign` (`representation_id`),
  ADD KEY `representation_user_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indices de la tabla `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indices de la tabla `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shows_slug_unique` (`slug`),
  ADD KEY `shows_location_id_foreign` (`location_id`);

--
-- Indices de la tabla `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Indices de la tabla `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `artists`
--
ALTER TABLE `artists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `artist_type`
--
ALTER TABLE `artist_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `artist_type_show`
--
ALTER TABLE `artist_type_show`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `localities`
--
ALTER TABLE `localities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT de la tabla `representations`
--
ALTER TABLE `representations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `representation_user`
--
ALTER TABLE `representation_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `shows`
--
ALTER TABLE `shows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `artist_type`
--
ALTER TABLE `artist_type`
  ADD CONSTRAINT `artist_type_artist_id_foreign` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `artist_type_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `artist_type_show`
--
ALTER TABLE `artist_type_show`
  ADD CONSTRAINT `artist_type_show_artist_type_id_foreign` FOREIGN KEY (`artist_type_id`) REFERENCES `artist_type` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `artist_type_show_show_id_foreign` FOREIGN KEY (`show_id`) REFERENCES `shows` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_locality_id_foreign` FOREIGN KEY (`locality_id`) REFERENCES `localities` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `representations`
--
ALTER TABLE `representations`
  ADD CONSTRAINT `representations_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `representations_show_id_foreign` FOREIGN KEY (`show_id`) REFERENCES `shows` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `representation_user`
--
ALTER TABLE `representation_user`
  ADD CONSTRAINT `representation_user_representation_id_foreign` FOREIGN KEY (`representation_id`) REFERENCES `representations` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `representation_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `shows`
--
ALTER TABLE `shows`
  ADD CONSTRAINT `shows_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Filtros para la tabla `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
