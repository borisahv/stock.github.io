-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 11 fév. 2020 à 16:17
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `stock`
--

-- --------------------------------------------------------

--
-- Structure de la table `baskets`
--

CREATE TABLE `baskets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total` double(8,2) NOT NULL,
  `date` datetime NOT NULL,
  `paid` tinyint(1) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Beauté', NULL, '2019-04-09 14:08:03', '2019-04-09 14:08:03'),
(2, 'Cosmétique', '1', '2019-04-09 14:49:31', '2019-04-18 15:04:16'),
(3, 'Electronique', NULL, '2019-04-09 15:10:27', '2019-04-09 15:10:27'),
(4, 'Nourriture', NULL, '2019-04-09 15:12:01', '2019-04-09 15:12:01'),
(5, 'Immobilier', NULL, '2019-04-09 15:12:21', '2019-04-09 15:12:21'),
(6, 'Sport', NULL, '2019-04-11 09:57:37', '2019-04-11 09:57:37'),
(7, 'Vetement', NULL, '2019-06-03 23:55:16', '2019-06-03 23:55:16'),
(8, 'Téléphonie', '3', '2020-02-11 15:12:29', '2020-02-11 15:12:29');

-- --------------------------------------------------------

--
-- Structure de la table `commands`
--

CREATE TABLE `commands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sale_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commands`
--

INSERT INTO `commands` (`id`, `customer_id`, `item_id`, `quantity`, `sale_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 2, '2019-04-15 16:42:51', '2019-04-15 16:42:51'),
(2, 1, 2, 4, 3, '2019-04-15 17:03:50', '2019-04-15 17:03:50'),
(3, 1, 1, 3, 3, '2019-04-15 17:03:50', '2019-04-15 17:03:50'),
(4, 1, 1, 1, 4, '2019-04-15 17:41:19', '2019-04-15 17:41:19'),
(5, 1, 2, 5, 4, '2019-04-15 17:41:19', '2019-04-15 17:41:19'),
(6, 1, 1, 1, 5, '2019-04-15 17:42:07', '2019-04-15 17:42:07'),
(7, 1, 2, 5, 5, '2019-04-15 17:42:07', '2019-04-15 17:42:07'),
(8, 1, 1, 3, 6, '2019-04-15 17:44:46', '2019-04-15 17:44:46'),
(9, 1, 2, 10, 6, '2019-04-15 17:44:46', '2019-04-15 17:44:46'),
(10, 1, 2, 5, 6, '2019-04-15 17:44:46', '2019-04-15 17:44:46'),
(11, 1, 1, 3, 7, '2019-04-15 17:45:47', '2019-04-15 17:45:47'),
(12, 1, 2, 10, 7, '2019-04-15 17:45:47', '2019-04-15 17:45:47'),
(13, 1, 2, 5, 7, '2019-04-15 17:45:47', '2019-04-15 17:45:47'),
(14, 1, 1, 3, 8, '2019-04-15 17:47:42', '2019-04-15 17:47:42'),
(15, 1, 2, 10, 8, '2019-04-15 17:47:43', '2019-04-15 17:47:43'),
(16, 1, 2, 5, 8, '2019-04-15 17:47:43', '2019-04-15 17:47:43'),
(17, 1, 1, 3, 9, '2019-04-15 17:54:53', '2019-04-15 17:54:53'),
(18, 1, 2, 10, 9, '2019-04-15 17:54:53', '2019-04-15 17:54:53'),
(19, 1, 2, 5, 9, '2019-04-15 17:54:53', '2019-04-15 17:54:53'),
(20, 1, 1, 3, 10, '2019-04-15 17:55:17', '2019-04-15 17:55:17'),
(21, 1, 2, 10, 10, '2019-04-15 17:55:17', '2019-04-15 17:55:17'),
(22, 1, 2, 5, 10, '2019-04-15 17:55:17', '2019-04-15 17:55:17'),
(23, 1, 1, 3, 11, '2019-04-15 17:57:15', '2019-04-15 17:57:15'),
(24, 1, 2, 10, 11, '2019-04-15 17:57:15', '2019-04-15 17:57:15'),
(25, 1, 2, 5, 11, '2019-04-15 17:57:15', '2019-04-15 17:57:15'),
(26, 1, 1, 3, 12, '2019-04-15 17:58:35', '2019-04-15 17:58:35'),
(27, 1, 2, 10, 12, '2019-04-15 17:58:35', '2019-04-15 17:58:35'),
(28, 1, 2, 5, 12, '2019-04-15 17:58:35', '2019-04-15 17:58:35'),
(29, 1, 1, 3, 13, '2019-04-15 17:59:16', '2019-04-15 17:59:16'),
(30, 1, 2, 10, 13, '2019-04-15 17:59:16', '2019-04-15 17:59:16'),
(31, 1, 2, 5, 13, '2019-04-15 17:59:16', '2019-04-15 17:59:16'),
(32, 1, 1, 3, 14, '2019-04-15 17:59:46', '2019-04-15 17:59:46'),
(33, 1, 2, 10, 14, '2019-04-15 17:59:46', '2019-04-15 17:59:46'),
(34, 1, 2, 5, 14, '2019-04-15 17:59:46', '2019-04-15 17:59:46'),
(35, 1, 1, 3, 15, '2019-04-15 18:00:27', '2019-04-15 18:00:27'),
(36, 1, 2, 10, 15, '2019-04-15 18:00:27', '2019-04-15 18:00:27'),
(37, 1, 2, 5, 15, '2019-04-15 18:00:27', '2019-04-15 18:00:27'),
(38, 1, 1, 3, 16, '2019-04-15 18:13:22', '2019-04-15 18:13:22'),
(39, 1, 2, 3, 17, '2019-04-15 18:14:00', '2019-04-15 18:14:00'),
(40, 1, 1, 2, 18, '2019-04-15 18:17:36', '2019-04-15 18:17:36'),
(41, 1, 1, 1, 19, '2019-04-15 18:18:03', '2019-04-15 18:18:03'),
(42, 1, 2, 4, 19, '2019-04-15 18:18:03', '2019-04-15 18:18:03'),
(43, 1, 1, 1, 20, '2019-04-16 09:39:26', '2019-04-16 09:39:26'),
(44, 1, 2, 5, 20, '2019-04-16 09:39:26', '2019-04-16 09:39:26'),
(45, 1, 1, 1, 21, '2019-04-16 09:42:26', '2019-04-16 09:42:26'),
(46, 1, 1, 1, 22, '2019-04-16 09:51:02', '2019-04-16 09:51:02'),
(47, 1, 1, 1, 23, '2019-04-16 09:51:29', '2019-04-16 09:51:29'),
(48, 1, 1, 1, 24, '2019-04-16 09:52:10', '2019-04-16 09:52:10'),
(49, 1, 1, 1, 25, '2019-04-16 09:52:55', '2019-04-16 09:52:55'),
(50, 1, 2, 1, 26, '2019-04-16 16:39:04', '2019-04-16 16:39:04'),
(51, 1, 1, 1, 26, '2019-04-16 16:39:04', '2019-04-16 16:39:04'),
(52, 1, 3, 1, 26, '2019-04-16 16:39:04', '2019-04-16 16:39:04'),
(53, 1, 5, 1, 26, '2019-04-16 16:39:04', '2019-04-16 16:39:04'),
(54, 2, 3, 1, 27, '2019-04-25 13:15:47', '2019-04-25 13:15:47'),
(55, 2, 3, 1, 28, '2019-04-25 13:33:25', '2019-04-25 13:33:25'),
(56, 2, 3, 1, 28, '2019-04-25 13:33:25', '2019-04-25 13:33:25'),
(57, 2, 4, 1, 28, '2019-04-25 13:33:26', '2019-04-25 13:33:26'),
(58, 2, 1, 4, 28, '2019-04-25 13:33:26', '2019-04-25 13:33:26'),
(59, 2, 2, 5, 28, '2019-04-25 13:33:26', '2019-04-25 13:33:26'),
(60, 2, 1, 4, 28, '2019-04-25 13:33:26', '2019-04-25 13:33:26'),
(61, 2, 1, 4, 28, '2019-04-25 13:33:26', '2019-04-25 13:33:26'),
(62, 1, 1, 2, 29, '2019-04-25 16:57:58', '2019-04-25 16:57:58'),
(63, 1, 2, 1, 29, '2019-04-25 16:57:58', '2019-04-25 16:57:58'),
(64, 1, 1, 3, 30, '2019-04-25 17:09:33', '2019-04-25 17:09:33'),
(65, 1, 2, 18, 31, '2019-04-25 17:23:44', '2019-04-25 17:23:44'),
(66, 2, 1, 1, 32, '2019-06-03 14:04:28', '2019-06-03 14:04:28'),
(67, 2, 2, 3, 32, '2019-06-03 14:04:29', '2019-06-03 14:04:29'),
(68, 1, 1, 1, 33, '2019-09-03 00:40:20', '2019-09-03 00:40:20'),
(69, 1, 5, 4, 33, '2019-09-03 00:40:20', '2019-09-03 00:40:20'),
(70, 1, 8, 5, 33, '2019-09-03 00:40:20', '2019-09-03 00:40:20'),
(71, 2, 2, 3, 34, '2019-09-03 12:44:11', '2019-09-03 12:44:11'),
(72, 2, 4, 5, 34, '2019-09-03 12:44:11', '2019-09-03 12:44:11'),
(73, 1, 1, 4, 35, '2019-09-03 12:54:39', '2019-09-03 12:54:39'),
(74, 1, 1, 1, 36, '2019-09-03 13:17:31', '2019-09-03 13:17:31');

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`id`, `name`, `address`, `email`, `telephone`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Bibi', 'Adidogomé', 'bibi@gmail.com', '92929292', 'aBGPYk0THcAzpbuN0yDZG46I6oOEceHZzpQVLUuM.png', '2019-04-11 10:23:43', '2019-04-18 15:57:32'),
(2, 'Jon Snow', 'Islande', 'jonsnow@gmail.com', '95959595', 'x3KqbkBhOggOf6LyMzvsZakAbRZqS5fiNK2O8gvR.png', '2019-04-18 11:56:22', '2019-04-18 12:39:50'),
(3, 'Illustre Inconnu', 'Inconnu', 'inc@gmail.com', '94949494', 'M6yGirAxGkuHTV4w2xITT2BvU9sY93ZNFbgEaEvG.jpeg', '2019-04-18 12:12:40', '2019-04-18 12:12:40');

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_price` double(8,2) DEFAULT NULL,
  `wholesale_price` double(8,2) NOT NULL,
  `retail_price` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `big_quantity` int(11) DEFAULT NULL,
  `threshold` int(11) DEFAULT NULL,
  `remaining_quantity` int(11) DEFAULT NULL,
  `entries` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `sales` int(11) DEFAULT NULL,
  `losses` int(11) DEFAULT NULL,
  `finals` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `image`, `currency`, `purchase_price`, `wholesale_price`, `retail_price`, `quantity`, `big_quantity`, `threshold`, `remaining_quantity`, `entries`, `total`, `sales`, `losses`, `finals`, `category_id`, `supplier_id`, `created_at`, `updated_at`) VALUES
(10, 'Petit Beurre', 'Le Petit Beurre, ou Véritable Petit Beurre, connu également sous ses initiales VPB, est une sorte de biscuit sablé nantais dont le plus connu en France est le Petit Beurre de la société LU qui est devenu aujourd\'hui un succès à l\'échelle mondiale.', 'q2LE2iQ1A9cnQs9JEsZzzFTl4e8Z4yy0HHorx19Y.jpeg', NULL, 1500.00, 2000.00, 3000.00, 50, 26, 20, 50, 50, 50, 0, NULL, 50, 4, 2, '2020-02-11 15:11:34', '2020-02-11 15:11:34');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_04_03_114351_create_items_table', 1),
(4, '2019_04_03_114438_create_customers_table', 1),
(5, '2019_04_03_114539_create_categories_table', 1),
(6, '2019_04_03_114904_create_commands_table', 1),
(7, '2019_04_03_115247_create_suppliers_table', 1),
(8, '2019_04_03_130636_create_baskets_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total` double(8,2) NOT NULL,
  `paid` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sales`
--

INSERT INTO `sales` (`id`, `customer_id`, `total`, `paid`, `created_at`, `updated_at`) VALUES
(20, 1, 225350.00, 1, '2019-04-25 16:24:57', '2019-04-25 16:24:57'),
(21, 1, 350.00, 1, '2019-04-25 16:25:15', '2019-04-25 16:25:15'),
(22, 1, 350.00, 1, '2019-04-25 16:25:17', '2019-04-25 16:25:17'),
(23, 1, 350.00, 1, '2019-04-26 18:48:27', '2019-04-26 18:48:27'),
(24, 1, 350.00, 1, '2019-04-26 18:48:30', '2019-04-26 18:48:30'),
(25, 1, 350.00, 1, '2019-05-29 12:38:38', '2019-05-29 12:38:38'),
(26, 1, 86350.00, 0, '2019-04-16 16:39:04', '2019-04-16 16:39:04'),
(27, 2, 0.00, 0, '2019-04-25 13:15:47', '2019-04-25 13:15:47'),
(28, 2, 334200.00, 1, '2019-04-25 16:25:34', '2019-04-25 16:25:34'),
(29, 1, 45700.00, 1, '2019-06-07 14:15:37', '2019-06-07 14:15:37'),
(30, 1, 1050.00, 0, '2019-04-25 17:09:33', '2019-04-25 17:09:33'),
(31, 1, 900000.00, 1, '2019-06-07 14:15:35', '2019-06-07 14:15:35'),
(32, 2, 135350.00, 1, '2019-06-07 14:00:48', '2019-06-07 14:00:48'),
(33, 1, 30350.00, 1, '2019-09-03 00:40:58', '2019-09-03 00:40:58'),
(34, 2, 310000.00, 0, '2019-09-03 12:44:11', '2019-09-03 12:44:11'),
(35, 1, 1400.00, 1, '2019-09-03 12:54:45', '2019-09-03 12:54:45'),
(36, 1, 350.00, 1, '2019-09-03 13:17:38', '2019-09-03 13:17:38');

-- --------------------------------------------------------

--
-- Structure de la table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `address`, `telephone`, `email`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'LG Togo', 'Attiegou, Lomé, Togo', '92929292', 'lgtogo@gmail.com', 'QHhsqNa7ttIeTXLT1McPBZwZuma40FJZBr6ikUrJ.png', '2019-04-09 16:16:31', '2019-04-25 19:07:29'),
(2, 'toto', 'Adidogome', '92929292', 'toto@gmail.com', '1EkDDGQUcP5363Pog72UzKXsl9lWzbnbEL3ekRB0.jpeg', '2019-04-11 09:58:45', '2019-04-18 13:11:40'),
(3, 'Vlisco', 'Assigamé', '94994949', 'vlisco@gmail.com', '27RAPCZreQibV8NBduGTqwkovFf6AWYRBTzRd3Vv.png', '2019-04-18 12:22:13', '2019-04-25 19:08:41');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `photo`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin Spark', 'admin@argon.com', '2019-04-04 10:45:27', '$2y$10$P9UQw0qYf92bwRpOvEEMROGgxq6Yz4e.TmRZhlxwxSyGuXZbZoLl6', 'hnyVNx41WsaC3NCMEGyIWsekopzqRulsEUjFfiNH82Vq72gWy3TtNfaxv4dN', 'Ktx6FNkKlK0PZwzxRHR3q3y0r6PT1i8jtpVyVN0f.png', 'Admin', '2019-04-04 10:45:27', '2019-09-03 14:41:55'),
(2, 'Lil Prod', 'pkossigan@gmail.com', NULL, '$2y$10$9D8TycHc2qLbmZhA5c6OZuQQGO8.UIDMv7raU8XWPNdQsHqmtgaX6', NULL, 'C:\\xampp\\tmp\\phpFA0D.tmp', 'Standard', '2019-04-25 18:47:51', '2019-04-25 18:47:51');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `baskets`
--
ALTER TABLE `baskets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commands`
--
ALTER TABLE `commands`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Index pour la table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suppliers_email_unique` (`email`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `baskets`
--
ALTER TABLE `baskets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `commands`
--
ALTER TABLE `commands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT pour la table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
