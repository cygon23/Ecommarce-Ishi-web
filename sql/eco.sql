-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 23, 2024 at 08:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eco`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1734695534),
('356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1734695534;', 1734695534),
('902ba3cda1883801594b6e1b452790cc53948fda', 'i:3;', 1729608767),
('902ba3cda1883801594b6e1b452790cc53948fda:timer', 'i:1729608767;', 1729608767),
('92cfceb39d57d914ed8b14d0e37643de0797ae56', 'i:1;', 1734695087),
('92cfceb39d57d914ed8b14d0e37643de0797ae56:timer', 'i:1734695087;', 1734695087),
('ac3478d69a3c81fa62e60f5c3696165a4e5e6ac4', 'i:1;', 1729575400),
('ac3478d69a3c81fa62e60f5c3696165a4e5e6ac4:timer', 'i:1729575399;', 1729575400),
('cewisi@mailinator.com|127.0.0.1', 'i:1;', 1734695676),
('cewisi@mailinator.com|127.0.0.1:timer', 'i:1734695675;', 1734695675),
('da4b9237bacccdf19c0760cab7aec4a8359010b0', 'i:1;', 1729581139),
('da4b9237bacccdf19c0760cab7aec4a8359010b0:timer', 'i:1729581139;', 1729581139),
('deskfree157@gmail.com|127.0.0.1', 'i:1;', 1734695324),
('deskfree157@gmail.com|127.0.0.1:timer', 'i:1734695324;', 1734695324),
('doe@gmail.com|127.0.0.1', 'i:1;', 1734695771),
('doe@gmail.com|127.0.0.1:timer', 'i:1734695771;', 1734695771),
('kyomah@gmail.com|127.0.0.1', 'i:1;', 1734695697),
('kyomah@gmail.com|127.0.0.1:timer', 'i:1734695697;', 1734695697),
('test@example.com|127.0.0.1', 'i:4;', 1734695626),
('test@example.com|127.0.0.1:timer', 'i:1734695626;', 1734695626),
('twohorn@gmail.com|127.0.0.1', 'i:1;', 1729863188),
('twohorn@gmail.com|127.0.0.1:timer', 'i:1729863188;', 1729863188);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `is_delete`, `created_at`, `updated_at`) VALUES
(6, 'chicks', 0, '2024-10-19 09:27:56', '2024-12-19 10:05:48'),
(7, 'Eggs', 0, '2024-10-19 09:28:03', '2024-12-19 10:06:12'),
(8, 'Manure', 0, '2024-10-19 09:28:12', '2024-12-19 10:06:23');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_10_19_112833_create_categories_table', 2),
(5, '2024_10_19_143425_create_products_table', 3),
(6, '2024_10_20_125928_create_carts_table', 4),
(7, '2024_10_20_154244_add_quantity_to_carts_table', 5),
(8, '2024_10_21_041224_create_orders_table', 6),
(9, '2024_10_21_051006_alter_is_delete_orders_table', 7),
(10, '2024_10_21_051930_alter_status_products_table', 8),
(11, '2024_10_22_055725_add_payment_status_to_orders_table', 9),
(12, '2024_10_22_131326_add_twitter_id_to_users_table', 10),
(14, '2024_10_22_131342_add_google_id_to_users_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `rec_address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'progress',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'cash on delivered',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `rec_address`, `phone`, `status`, `user_id`, `product_id`, `payment_status`, `created_at`, `updated_at`, `is_delete`) VALUES
(23, 'admin', 'kinguni a', '989898989', 'progress', 1, 10, 'paid', '2024-12-20 08:58:17', '2024-12-20 08:58:17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('deskfree157@gmail.com', '$2y$12$MrfzF47Nb8kVGnElKt2RxuoDKKfzzAuUwGAwcf5GQB04MeqULneOm', '2024-12-20 08:46:36');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `title`, `description`, `image`, `price`, `quantity`, `is_delete`, `created_at`, `updated_at`, `status`) VALUES
(10, 7, 'Eggs', 'eggs', '1734615960.jpeg', '181', '40', 0, '2024-12-19 10:46:00', '2024-12-19 10:46:49', '0');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Ovf4j4NWgogm0N3Hik7jdfQ83I5RGSYLb2b8rHPd', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64; rv:128.0) Gecko/20100101 Firefox/128.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZFFFRm8wSko2RlRiS1lSVGczTVhJRXBYRlIxUEpCRUtMV0ZqcFhoWiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1734695974);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(50) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `twitter_id` varchar(255) DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `user_type`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `twitter_id`, `google_id`) VALUES
(1, 'admin', 'admin@gmail.com', '989898989', 'kinguni a', 'admin', '2024-10-22 15:51:44', '$2y$12$t2qz0z7ACRcpgCodauxa9edXIYeW8bQKSmz85alO2gJuwKmusu3Iq', 'zHvnTr7SKHR747CoDqqctNX2cBGuHSwMzNGlEupJafTfoRTDhQTW31t8Gxa7', '2024-10-18 08:35:48', '2024-10-18 08:35:48', NULL, NULL),
(2, 'Daquan Haynes', 'userone@gmail.com', '+1 (806) 576-5622', 'Voluptatem aliqua', 'user', NULL, '$2y$12$.AyuBXO4VLnngt.QDYmIMO6wGhn/FpLAHad9bp7q/NwruV76SGvjG', NULL, '2024-10-18 08:37:20', '2024-10-18 08:37:20', NULL, NULL),
(7, 'Godfrey Muganyizi', 'godfreymuganyizi45@gmail.com', NULL, 'Arusha', 'admin', '2024-10-22 11:52:14', '$2y$12$pFx8ZuuVbPe1LV6qk/mqVeOx1NA2dIiYBw1SoW2p8FHbFswu5lKPy', NULL, '2024-10-22 11:11:17', '2024-12-19 09:28:47', NULL, '106487475719291450270'),
(8, 'free desk', 'deskfree157@gmail.com', NULL, 'Arusha', 'user', NULL, '$2y$12$AAybwVe.fDcOZINIKafjB.YD.owRXeruPR87Q.BodGh0DtGj/9796', NULL, '2024-10-22 11:22:37', '2024-10-22 11:22:37', NULL, '105804874564612334228'),
(9, 'Quemby Paul', 'qojuvekev@mailinator.com', '+1 (558) 242-7453', 'Ut aliquam in et aut', 'user', NULL, '$2y$12$GLizRUCmbN8f0BaNyGhOHuQdiQblQ8.vM3NqOTLJd98T9XeWkK3Uy', NULL, '2024-10-22 14:58:08', '2024-10-22 14:58:08', NULL, NULL),
(10, 'Test User', 'test@example.com', NULL, '', 'user', '2024-10-22 15:51:44', '$2y$12$I/qBHsTGeoXKJL1lyRPRaepWDWbygw0z9hbtavi3O7jhc4.AL5pZC', 'SFqlIUE9Px', '2024-10-22 15:51:44', '2024-10-22 15:51:44', NULL, NULL),
(11, 'Valentine Dibbert', 'savanah.okuneva@example.org', NULL, '', 'user', '2024-10-22 15:51:45', '$2y$12$I/qBHsTGeoXKJL1lyRPRaepWDWbygw0z9hbtavi3O7jhc4.AL5pZC', 'Kpu8CuTjpb', '2024-10-22 15:51:45', '2024-10-22 15:51:45', NULL, NULL),
(12, 'Dr. Lacy Breitenberg', 'rcollier@example.org', NULL, '', 'user', '2024-10-22 15:51:45', '$2y$12$I/qBHsTGeoXKJL1lyRPRaepWDWbygw0z9hbtavi3O7jhc4.AL5pZC', 'DVF7V0RTHM', '2024-10-22 15:51:45', '2024-10-22 15:51:45', NULL, NULL),
(13, 'Taurean Cremin', 'bcassin@example.net', NULL, '', 'user', '2024-10-22 15:51:45', '$2y$12$I/qBHsTGeoXKJL1lyRPRaepWDWbygw0z9hbtavi3O7jhc4.AL5pZC', 'eVQI4MZEr5', '2024-10-22 15:51:45', '2024-10-22 15:51:45', NULL, NULL),
(14, 'Raphael Cartwright', 'samara38@example.org', NULL, '', 'user', '2024-10-22 15:51:45', '$2y$12$I/qBHsTGeoXKJL1lyRPRaepWDWbygw0z9hbtavi3O7jhc4.AL5pZC', 'EfiZeKl2cy', '2024-10-22 15:51:45', '2024-10-22 15:51:45', NULL, NULL),
(15, 'Glen Romaguera', 'verona87@example.net', NULL, '', 'user', '2024-10-22 15:51:45', '$2y$12$I/qBHsTGeoXKJL1lyRPRaepWDWbygw0z9hbtavi3O7jhc4.AL5pZC', 'sF883IwEVR', '2024-10-22 15:51:45', '2024-10-22 15:51:45', NULL, NULL),
(16, 'Dariana Wintheiser', 'nmacejkovic@example.org', NULL, '', 'user', '2024-10-22 15:51:45', '$2y$12$I/qBHsTGeoXKJL1lyRPRaepWDWbygw0z9hbtavi3O7jhc4.AL5pZC', 'Jgx3GwpOXO', '2024-10-22 15:51:45', '2024-10-22 15:51:45', NULL, NULL),
(17, 'Liam Rogahn V', 'kenyon.skiles@example.net', NULL, '', 'user', '2024-10-22 15:51:45', '$2y$12$I/qBHsTGeoXKJL1lyRPRaepWDWbygw0z9hbtavi3O7jhc4.AL5pZC', 'qfFqyuYIlL', '2024-10-22 15:51:45', '2024-10-22 15:51:45', NULL, NULL),
(18, 'Celine Jaskolski', 'liza71@example.net', NULL, '', 'user', '2024-10-22 15:51:45', '$2y$12$I/qBHsTGeoXKJL1lyRPRaepWDWbygw0z9hbtavi3O7jhc4.AL5pZC', 'bfe4Y2XNKH', '2024-10-22 15:51:45', '2024-10-22 15:51:45', NULL, NULL),
(19, 'Roger Miller', 'uhyatt@example.com', NULL, '', 'user', '2024-10-22 15:51:45', '$2y$12$I/qBHsTGeoXKJL1lyRPRaepWDWbygw0z9hbtavi3O7jhc4.AL5pZC', 'Ei4gji8K6o', '2024-10-22 15:51:45', '2024-10-22 15:51:45', NULL, NULL),
(20, 'Bailey Donnelly', 'ettie.wuckert@example.com', NULL, '', 'user', '2024-10-22 15:51:45', '$2y$12$I/qBHsTGeoXKJL1lyRPRaepWDWbygw0z9hbtavi3O7jhc4.AL5pZC', 'OQji4Jtcoz', '2024-10-22 15:51:45', '2024-10-22 15:51:45', NULL, NULL),
(21, 'Dr. Sheila Stroman DVM', 'oleta.koch@example.com', NULL, '', 'user', '2024-10-22 15:51:45', '$2y$12$I/qBHsTGeoXKJL1lyRPRaepWDWbygw0z9hbtavi3O7jhc4.AL5pZC', 'Kt7oltv9Da', '2024-10-22 15:51:46', '2024-10-22 15:51:46', NULL, NULL),
(22, 'Janelle Dietrich', 'adams.mabel@example.org', NULL, '', 'user', '2024-10-22 15:51:45', '$2y$12$I/qBHsTGeoXKJL1lyRPRaepWDWbygw0z9hbtavi3O7jhc4.AL5pZC', 'a5VVH9C13X', '2024-10-22 15:51:46', '2024-10-22 15:51:46', NULL, NULL),
(23, 'Prof. Amelie Hyatt', 'emarvin@example.com', NULL, '', 'user', '2024-10-22 15:51:45', '$2y$12$I/qBHsTGeoXKJL1lyRPRaepWDWbygw0z9hbtavi3O7jhc4.AL5pZC', 'HKyI4lMf8M', '2024-10-22 15:51:46', '2024-10-22 15:51:46', NULL, NULL),
(24, 'Pansy Miller', 'maggio.keeley@example.net', NULL, '', 'user', '2024-10-22 15:51:45', '$2y$12$I/qBHsTGeoXKJL1lyRPRaepWDWbygw0z9hbtavi3O7jhc4.AL5pZC', 'UYvoTePRAc', '2024-10-22 15:51:46', '2024-10-22 15:51:46', NULL, NULL),
(25, 'Mya Murphy PhD', 'danika73@example.org', NULL, '', 'user', '2024-10-22 15:51:45', '$2y$12$I/qBHsTGeoXKJL1lyRPRaepWDWbygw0z9hbtavi3O7jhc4.AL5pZC', 'gkEHu7pZPY', '2024-10-22 15:51:46', '2024-10-22 15:51:46', NULL, NULL),
(26, 'Brionna Morar', 'hickle.leonora@example.com', NULL, '', 'user', '2024-10-22 15:51:45', '$2y$12$I/qBHsTGeoXKJL1lyRPRaepWDWbygw0z9hbtavi3O7jhc4.AL5pZC', 'PIbfzK7xj6', '2024-10-22 15:51:46', '2024-10-22 15:51:46', NULL, NULL),
(27, 'Lori Hintz', 'upouros@example.net', NULL, '', 'user', '2024-10-22 15:51:45', '$2y$12$I/qBHsTGeoXKJL1lyRPRaepWDWbygw0z9hbtavi3O7jhc4.AL5pZC', 'AobFuGE5ER', '2024-10-22 15:51:46', '2024-10-22 15:51:46', NULL, NULL),
(28, 'Kacie Feest II', 'rempel.josefa@example.org', NULL, '', 'user', '2024-10-22 15:51:45', '$2y$12$I/qBHsTGeoXKJL1lyRPRaepWDWbygw0z9hbtavi3O7jhc4.AL5pZC', '6YLT5smkq9', '2024-10-22 15:51:46', '2024-10-22 15:51:46', NULL, NULL),
(29, 'Nico Bailey', 'upaucek@example.net', NULL, '', 'user', '2024-10-22 15:51:45', '$2y$12$I/qBHsTGeoXKJL1lyRPRaepWDWbygw0z9hbtavi3O7jhc4.AL5pZC', 'W5gbaBxvsR', '2024-10-22 15:51:46', '2024-10-22 15:51:46', NULL, NULL),
(30, 'Mrs. Christa Hill DDS', 'hahn.spencer@example.com', NULL, '', 'user', '2024-10-22 15:51:45', '$2y$12$I/qBHsTGeoXKJL1lyRPRaepWDWbygw0z9hbtavi3O7jhc4.AL5pZC', 'ww44R89azy', '2024-10-22 15:51:46', '2024-10-22 15:51:46', NULL, NULL),
(31, 'Tito Hayes', 'ali.okon@example.net', NULL, '', 'user', '2024-10-22 15:51:45', '$2y$12$I/qBHsTGeoXKJL1lyRPRaepWDWbygw0z9hbtavi3O7jhc4.AL5pZC', 'U2lUDW8V5i', '2024-10-22 15:51:46', '2024-10-22 15:51:46', NULL, NULL),
(32, 'Dr. Kevin DuBuque', 'oma.will@example.net', NULL, '', 'user', '2024-10-22 15:51:45', '$2y$12$I/qBHsTGeoXKJL1lyRPRaepWDWbygw0z9hbtavi3O7jhc4.AL5pZC', 'BDzf6Mk5zK', '2024-10-22 15:51:46', '2024-10-22 15:51:46', NULL, NULL),
(33, 'Carter Kerluke', 'nlakin@example.com', NULL, '', 'user', '2024-10-22 15:51:45', '$2y$12$I/qBHsTGeoXKJL1lyRPRaepWDWbygw0z9hbtavi3O7jhc4.AL5pZC', 'Gid9XcR18o', '2024-10-22 15:51:46', '2024-10-22 15:51:46', NULL, NULL),
(34, 'Verda Metz', 'fkoss@example.com', NULL, '', 'user', '2024-10-22 15:51:45', '$2y$12$I/qBHsTGeoXKJL1lyRPRaepWDWbygw0z9hbtavi3O7jhc4.AL5pZC', '3uqZY20ng6', '2024-10-22 15:51:46', '2024-10-22 15:51:46', NULL, NULL),
(35, 'Dr. Xavier Dibbert III', 'fstiedemann@example.com', NULL, '', 'user', '2024-10-22 15:51:45', '$2y$12$I/qBHsTGeoXKJL1lyRPRaepWDWbygw0z9hbtavi3O7jhc4.AL5pZC', 'GhWS4CucfN', '2024-10-22 15:51:47', '2024-10-22 15:51:47', NULL, NULL),
(36, 'Prof. Stuart VonRueden PhD', 'qkling@example.net', NULL, '', 'user', '2024-10-22 15:51:45', '$2y$12$I/qBHsTGeoXKJL1lyRPRaepWDWbygw0z9hbtavi3O7jhc4.AL5pZC', 'wgp0HWao4P', '2024-10-22 15:51:47', '2024-10-22 15:51:47', NULL, NULL),
(37, 'Mr. Herbert Casper', 'zhauck@example.net', NULL, '', 'user', '2024-10-22 15:51:45', '$2y$12$I/qBHsTGeoXKJL1lyRPRaepWDWbygw0z9hbtavi3O7jhc4.AL5pZC', 'KJPKBEQbvn', '2024-10-22 15:51:47', '2024-10-22 15:51:47', NULL, NULL),
(38, 'Princess Bartell Sr.', 'dock02@example.com', NULL, '', 'user', '2024-10-22 15:51:45', '$2y$12$I/qBHsTGeoXKJL1lyRPRaepWDWbygw0z9hbtavi3O7jhc4.AL5pZC', 'fxpwOD4V1i', '2024-10-22 15:51:47', '2024-10-22 15:51:47', NULL, NULL),
(39, 'Maybelle Rosenbaum', 'zkuhlman@example.org', NULL, '', 'user', '2024-10-22 15:51:45', '$2y$12$I/qBHsTGeoXKJL1lyRPRaepWDWbygw0z9hbtavi3O7jhc4.AL5pZC', 'H1QARn1eoj', '2024-10-22 15:51:47', '2024-10-22 15:51:47', NULL, NULL),
(40, 'Summer Deckow', 'dayna01@example.org', NULL, '', 'user', '2024-10-22 15:51:45', '$2y$12$I/qBHsTGeoXKJL1lyRPRaepWDWbygw0z9hbtavi3O7jhc4.AL5pZC', 'WAdXBpgqbG', '2024-10-22 15:51:47', '2024-10-22 15:51:47', NULL, NULL),
(41, 'Dora Meyer', 'syfuhybac@mailinator.com', '+1 (665) 499-2291', 'Eos voluptas optio', 'user', NULL, '$2y$12$fipLfdmqvqIcmQ.mh8ZeTOz4OWhNWjIS6ovxp/9s10.xNxXVhXXdW', NULL, '2024-10-25 10:34:11', '2024-10-25 10:34:11', NULL, NULL),
(42, 'rweyemamu', 'rweyemamu088@gmail.com', NULL, 'Arusha', 'user', NULL, '$2y$12$iTqmpylVN3lQ.upsceAow.XeD5mITp7ogmhPF4OVDrFUDcJPTBXk6', NULL, '2024-12-20 08:42:18', '2024-12-20 08:42:18', NULL, '110162407264306150408');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `carts_user_id_product_id_unique` (`user_id`,`product_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
