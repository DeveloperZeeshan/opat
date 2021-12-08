-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2021 at 07:49 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opatWorking`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `log_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` int(11) DEFAULT NULL,
  `causer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `properties` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_id`, `subject_type`, `causer_id`, `causer_type`, `properties`, `created_at`, `updated_at`) VALUES
(1, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2021-03-01 14:25:25', '2021-03-01 14:25:25'),
(2, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2021-03-01 14:26:42', '2021-03-01 14:26:42'),
(3, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2021-03-01 14:27:17', '2021-03-01 14:27:17'),
(4, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2021-03-03 12:23:52', '2021-03-03 12:23:52'),
(5, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2021-03-03 13:08:41', '2021-03-03 13:08:41'),
(6, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2021-03-03 13:09:56', '2021-03-03 13:09:56'),
(7, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2021-03-03 13:55:43', '2021-03-03 13:55:43'),
(8, 'owner', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2021-03-03 16:50:54', '2021-03-03 16:50:54'),
(9, 'owner', 'LoggedOut', 3, 'App\\User', 3, 'App\\User', '[]', '2021-03-03 16:51:20', '2021-03-03 16:51:20'),
(10, 'owner', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2021-03-03 16:51:32', '2021-03-03 16:51:32'),
(11, 'owner', 'LoggedOut', 3, 'App\\User', 3, 'App\\User', '[]', '2021-03-03 16:52:31', '2021-03-03 16:52:31'),
(12, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2021-03-03 16:52:45', '2021-03-03 16:52:45'),
(13, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2021-03-03 16:54:51', '2021-03-03 16:54:51'),
(14, 'owner', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2021-03-03 16:55:13', '2021-03-03 16:55:13'),
(15, 'owner', 'LoggedOut', 3, 'App\\User', 3, 'App\\User', '[]', '2021-03-03 16:57:42', '2021-03-03 16:57:42'),
(16, 'owner', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2021-03-03 16:59:20', '2021-03-03 16:59:20'),
(17, 'owner', 'LoggedIn', 3, 'App\\User', 3, 'App\\User', '[]', '2021-03-03 17:01:36', '2021-03-03 17:01:36');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `column_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `column_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `column_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `column_4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `column_5` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `created_at`, `updated_at`, `deleted_at`, `package_id`, `user_id`, `column_1`, `column_2`, `column_3`, `column_4`, `column_5`) VALUES
(1, '2020-11-11 23:56:16', '2020-11-18 23:56:16', NULL, 1, 3, NULL, NULL, NULL, NULL, NULL),
(2, '2020-11-11 23:56:16', '2020-11-18 23:56:16', NULL, 2, 3, NULL, NULL, NULL, NULL, NULL),
(3, '2020-11-18 02:16:05', '2021-01-22 00:42:06', NULL, 3, 3, NULL, NULL, NULL, NULL, NULL),
(4, '2021-03-04 12:20:59', '2021-03-04 12:20:59', NULL, 2, 4, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_uses`
--

CREATE TABLE `contact_uses` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_uses`
--

INSERT INTO `contact_uses` (`id`, `created_at`, `updated_at`, `deleted_at`, `full_name`, `phone`, `email`, `message`) VALUES
(1, '2021-03-03 16:27:05', '2021-03-03 16:27:05', NULL, 'saqlain', '1230898812', 'razasaqlain85@gmail.com', NULL),
(2, '2021-03-03 16:30:42', '2021-03-03 16:30:42', NULL, 'tafsol', '03123243122', 'tafsol@gmail.com', 'qwerty');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cnic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `column_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `column_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `column_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(191) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `created_at`, `updated_at`, `deleted_at`, `full_name`, `phone`, `cnic`, `age`, `column_1`, `column_2`, `column_3`, `image`, `status`, `company_id`, `package_id`) VALUES
(1, '2021-03-03 18:30:03', '2021-03-03 19:30:29', NULL, 'saqlain\'s', '03160898812', '1231231233', '24', 'dummy', 'dummy', 'dummy', 'manager/wVRGGE12O5Yz2nFdvH3WPfY79MvlJRlPs5QOeV7T.png', 1, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_01_01_193651_create_roles_permissions_tables', 1),
(4, '2018_06_15_045804_create_profiles_table', 1),
(5, '2018_06_15_092930_create_social_accounts_table', 1),
(6, '2018_06_16_054705_create_activity_log_table', 1),
(7, '2020_03_20_050141_create_failed_jobs_table', 1),
(8, '2021_03_01_194957_create_packages_table', 2),
(10, '2021_03_03_191154_create_contact_uses_table', 3),
(11, '2021_03_03_214120_create_companies_table', 4),
(12, '2021_03_03_220445_create_subscriptions_table', 5),
(13, '2021_03_03_221547_create_managers_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `news_letter`
--

CREATE TABLE `news_letter` (
  `id` int(191) NOT NULL,
  `email` varchar(191) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` float DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beds` int(11) DEFAULT NULL,
  `caretakers` int(11) DEFAULT NULL,
  `managers` int(11) DEFAULT NULL,
  `lms_access` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `created_at`, `updated_at`, `deleted_at`, `name`, `description`, `price`, `logo`, `beds`, `caretakers`, `managers`, `lms_access`, `status`) VALUES
(1, '2021-03-01 17:03:45', '2021-03-01 17:57:58', NULL, 'Basic Packages', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the <strong>industry&#39;s</strong> standard dummy text ever since the 1500s, when an unknown printer took a gall<em>ey of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem</em> Ipsum.</p>', 121, 'packages/a4FKXylOEAYaGbhALrIEO8uhWFfyGo0eb0iPjWPP.png', 3, 23, 1, NULL, '1'),
(2, '2021-03-03 18:19:57', '2021-03-03 18:19:57', NULL, 'Premier Package', '<p>qwerty</p>', 323, 'packages/raEeI8HV5L0KNnOLpdZB0RynVimM5saePm1HIpEL.png', 10, 12, 2, NULL, '1'),
(3, '2021-03-03 18:20:25', '2021-03-03 18:20:25', NULL, 'Standard Packages', '<p>qwerty</p>', 453, 'packages/PgmxW3KDN6Ij8POA7c5CalC7bBr0nH1v4xvQ0IVm.png', 34, 22, 4, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `label`, `created_at`, `updated_at`) VALUES
(1, 'All Permission', NULL, '2021-02-26 13:59:13', '2021-02-26 13:59:13'),
(2, 'add-package', NULL, '2021-03-01 14:49:58', '2021-03-01 14:49:58'),
(3, 'edit-package', NULL, '2021-03-01 14:49:58', '2021-03-01 14:49:58'),
(4, 'view-package', NULL, '2021-03-01 14:49:58', '2021-03-01 14:49:58'),
(5, 'delete-package', NULL, '2021-03-01 14:49:58', '2021-03-01 14:49:58'),
(6, 'add-service', NULL, '2021-03-01 14:57:19', '2021-03-01 14:57:19'),
(7, 'edit-service', NULL, '2021-03-01 14:57:19', '2021-03-01 14:57:19'),
(8, 'view-service', NULL, '2021-03-01 14:57:19', '2021-03-01 14:57:19'),
(9, 'delete-service', NULL, '2021-03-01 14:57:19', '2021-03-01 14:57:19'),
(10, 'add-contactus', NULL, '2021-03-03 14:11:55', '2021-03-03 14:11:55'),
(11, 'edit-contactus', NULL, '2021-03-03 14:11:55', '2021-03-03 14:11:55'),
(12, 'view-contactus', NULL, '2021-03-03 14:11:55', '2021-03-03 14:11:55'),
(13, 'delete-contactus', NULL, '2021-03-03 14:11:55', '2021-03-03 14:11:55'),
(14, 'add-company', NULL, '2021-03-03 16:41:20', '2021-03-03 16:41:20'),
(15, 'edit-company', NULL, '2021-03-03 16:41:20', '2021-03-03 16:41:20'),
(16, 'view-company', NULL, '2021-03-03 16:41:20', '2021-03-03 16:41:20'),
(17, 'delete-company', NULL, '2021-03-03 16:41:20', '2021-03-03 16:41:20'),
(18, 'add-subscription', NULL, '2021-03-03 17:04:46', '2021-03-03 17:04:46'),
(19, 'edit-subscription', NULL, '2021-03-03 17:04:46', '2021-03-03 17:04:46'),
(20, 'view-subscription', NULL, '2021-03-03 17:04:46', '2021-03-03 17:04:46'),
(21, 'delete-subscription', NULL, '2021-03-03 17:04:46', '2021-03-03 17:04:46'),
(22, 'add-manager', NULL, '2021-03-03 17:15:47', '2021-03-03 17:15:47'),
(23, 'edit-manager', NULL, '2021-03-03 17:15:47', '2021-03-03 17:15:47'),
(24, 'view-manager', NULL, '2021-03-03 17:15:47', '2021-03-03 17:15:47'),
(25, 'delete-manager', NULL, '2021-03-03 17:15:47', '2021-03-03 17:15:47');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(4, 3),
(5, 1),
(5, 2),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(10, 3),
(11, 1),
(11, 3),
(12, 1),
(12, 3),
(13, 1),
(13, 3),
(14, 1),
(15, 1),
(16, 1),
(16, 3),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(20, 3),
(21, 1),
(22, 1),
(22, 3),
(23, 1),
(23, 3),
(24, 1),
(24, 3),
(25, 1),
(25, 3);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `pic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `campany_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `package_id`, `bio`, `gender`, `dob`, `pic`, `country`, `state`, `city`, `address`, `postal`, `campany_name`, `phone`, `logo`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-26 13:59:13', '2021-02-26 13:59:13'),
(2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-26 13:59:13', '2021-02-26 13:59:13'),
(3, 3, NULL, NULL, NULL, NULL, NULL, NULL, 'khi', 'karachi', 'karachi', '05454', 'tafsol', '12345678901', 'companylogo/QXVWw5aoOEKXFqVzZEneZnTW5qFlYfOPiEZ49a9K.png', '2021-03-03 13:40:36', '2021-03-03 13:40:36'),
(4, 4, 2, NULL, NULL, NULL, NULL, NULL, 'new york', 'new york', 'usa new york', '0022', 'IBM', '03123412341', 'companylogo/KoJQ0svN5f6nvv0TxZz9Kh6sIRyb3ScOazrihEx2.png', '2021-03-04 12:20:58', '2021-03-04 12:20:58');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `label`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, '2021-02-26 13:59:13', '2021-02-26 13:59:13'),
(2, 'user', NULL, '2021-02-26 13:59:13', '2021-02-26 13:59:13'),
(3, 'company', NULL, '2021-03-01 15:00:11', '2021-03-01 15:00:11'),
(4, 'caretaker', NULL, '2021-03-01 15:01:19', '2021-03-01 15:01:19'),
(5, 'consumer', NULL, '2021-03-01 15:01:38', '2021-03-01 15:01:38');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `social_accounts`
--

CREATE TABLE `social_accounts` (
  `user_id` int(11) NOT NULL,
  `provider_user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `roleId` int(11) DEFAULT NULL,
  `subscription_type_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 1 COMMENT '1-active,2-banned',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `provider_id`, `provider`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin@developer.com', '$2y$10$6HBI01T4tdD2mNMYPz1kYOZEs.OGFMSB.guHoD87mjFy.wbKLYoCy', NULL, NULL, 1, NULL, '2021-02-26 13:59:13', '2021-02-26 13:59:13', NULL),
(2, 'User', 'admin@opat.com', '$2y$10$6HBI01T4tdD2mNMYPz1kYOZEs.OGFMSB.guHoD87mjFy.wbKLYoCy', NULL, NULL, 1, NULL, '2021-02-26 13:59:13', '2021-02-26 13:59:13', NULL),
(3, 'owner', 'tafsol@gmail.com', '$2y$10$6HBI01T4tdD2mNMYPz1kYOZEs.OGFMSB.guHoD87mjFy.wbKLYoCy', NULL, NULL, 1, NULL, '2021-03-03 13:40:36', '2021-03-03 13:40:36', NULL),
(4, 'Tanmay', 'ibm@gmail.com', '$2y$10$UesKhi59.Vt8vL4yVbik7uRgcry9sFOX8MzfKdp3qZ2MFf.E8dIEm', NULL, NULL, 1, NULL, '2021-03-04 12:20:58', '2021-03-04 12:20:58', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_uses`
--
ALTER TABLE `contact_uses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_letter`
--
ALTER TABLE `news_letter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`role_id`,`user_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_uses`
--
ALTER TABLE `contact_uses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `news_letter`
--
ALTER TABLE `news_letter`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
