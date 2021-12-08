-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 06, 2021 at 11:25 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devcusto_opat_live`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

DROP TABLE IF EXISTS `activity_log`;
CREATE TABLE IF NOT EXISTS `activity_log` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `log_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` int(11) DEFAULT NULL,
  `causer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `properties` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activity_log_log_name_index` (`log_name`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_id`, `subject_type`, `causer_id`, `causer_type`, `properties`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2021-08-21 17:59:12', '2021-08-21 17:59:12'),
(2, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2021-08-21 19:03:42', '2021-08-21 19:03:42'),
(3, 'Hist Finance', 'LoggedOut', 127, 'App\\User', 127, 'App\\User', '[]', '2021-08-23 16:11:06', '2021-08-23 16:11:06'),
(4, 'histcaretaker1', 'LoggedOut', 125, 'App\\User', 125, 'App\\User', '[]', '2021-08-23 16:13:02', '2021-08-23 16:13:02'),
(5, 'HistManager1', 'LoggedOut', 124, 'App\\User', 124, 'App\\User', '[]', '2021-08-23 17:14:58', '2021-08-23 17:14:58'),
(6, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2021-08-23 17:28:32', '2021-08-23 17:28:32'),
(7, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2021-08-23 19:41:37', '2021-08-23 19:41:37'),
(8, 'HistManager1', 'LoggedOut', 124, 'App\\User', 124, 'App\\User', '[]', '2021-08-23 19:44:00', '2021-08-23 19:44:00'),
(9, 'HistManager1', 'LoggedOut', 124, 'App\\User', 124, 'App\\User', '[]', '2021-08-23 19:44:37', '2021-08-23 19:44:37'),
(10, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2021-08-23 19:48:59', '2021-08-23 19:48:59'),
(11, 'HistManager1', 'LoggedOut', 124, 'App\\User', 124, 'App\\User', '[]', '2021-08-23 20:45:51', '2021-08-23 20:45:51'),
(12, 'Hist Finance', 'LoggedOut', 127, 'App\\User', 127, 'App\\User', '[]', '2021-08-24 11:46:31', '2021-08-24 11:46:31'),
(13, 'histcaretaker1', 'LoggedOut', 125, 'App\\User', 125, 'App\\User', '[]', '2021-08-24 11:47:36', '2021-08-24 11:47:36'),
(14, 'Hist', 'LoggedOut', 123, 'App\\User', 123, 'App\\User', '[]', '2021-08-24 11:48:04', '2021-08-24 11:48:04'),
(15, 'histcaretaker1', 'LoggedOut', 125, 'App\\User', 125, 'App\\User', '[]', '2021-08-24 11:53:38', '2021-08-24 11:53:38'),
(16, 'HistManager1', 'LoggedIn', 124, 'App\\User', 124, 'App\\User', '[]', '2021-08-24 13:09:51', '2021-08-24 13:09:51'),
(17, 'Hist', 'LoggedOut', 123, 'App\\User', 123, 'App\\User', '[]', '2021-08-24 13:52:48', '2021-08-24 13:52:48'),
(18, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2021-08-24 14:02:13', '2021-08-24 14:02:13'),
(19, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2021-08-24 14:03:11', '2021-08-24 14:03:11'),
(20, 'Hist Finance', 'LoggedOut', 127, 'App\\User', 127, 'App\\User', '[]', '2021-08-24 18:46:03', '2021-08-24 18:46:03'),
(21, 'Hist', 'LoggedOut', 123, 'App\\User', 123, 'App\\User', '[]', '2021-08-24 20:15:55', '2021-08-24 20:15:55'),
(22, 'IMCS', 'LoggedOut', 128, 'App\\User', 128, 'App\\User', '[]', '2021-08-24 20:18:12', '2021-08-24 20:18:12'),
(23, 'Hist', 'LoggedOut', 123, 'App\\User', 123, 'App\\User', '[]', '2021-08-25 12:51:51', '2021-08-25 12:51:51'),
(24, 'Hist Caretaker1', 'LoggedOut', 125, 'App\\User', 125, 'App\\User', '[]', '2021-08-25 14:28:55', '2021-08-25 14:28:55'),
(25, 'Hist Caretaker1', 'LoggedIn', 125, 'App\\User', 125, 'App\\User', '[]', '2021-08-25 14:34:35', '2021-08-25 14:34:35'),
(26, 'Hist Caretaker1', 'LoggedOut', 125, 'App\\User', 125, 'App\\User', '[]', '2021-08-25 16:54:18', '2021-08-25 16:54:18'),
(27, 'HistManager1', 'LoggedOut', 124, 'App\\User', 124, 'App\\User', '[]', '2021-08-25 18:00:46', '2021-08-25 18:00:46'),
(28, 'Hist', 'LoggedIn', 123, 'App\\User', 123, 'App\\User', '[]', '2021-08-25 18:08:22', '2021-08-25 18:08:22'),
(29, 'Hist', 'LoggedOut', 123, 'App\\User', 123, 'App\\User', '[]', '2021-08-25 20:53:42', '2021-08-25 20:53:42'),
(30, 'IMCS', 'LoggedOut', 133, 'App\\User', 133, 'App\\User', '[]', '2021-08-26 11:34:07', '2021-08-26 11:34:07'),
(31, 'HistManager1', 'LoggedOut', 124, 'App\\User', 124, 'App\\User', '[]', '2021-08-31 15:24:32', '2021-08-31 15:24:32'),
(32, 'HistManager1', 'LoggedOut', 124, 'App\\User', 124, 'App\\User', '[]', '2021-08-31 15:25:18', '2021-08-31 15:25:18'),
(33, 'Hist Caretaker1', 'LoggedOut', 125, 'App\\User', 125, 'App\\User', '[]', '2021-08-31 15:28:08', '2021-08-31 15:28:08'),
(34, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2021-09-25 00:49:41', '2021-09-25 00:49:41'),
(35, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2021-09-25 00:56:27', '2021-09-25 00:56:27'),
(36, 'Hist', 'LoggedOut', 123, 'App\\User', 123, 'App\\User', '[]', '2021-09-25 00:58:59', '2021-09-25 00:58:59'),
(37, 'HistManager1', 'LoggedOut', 124, 'App\\User', 124, 'App\\User', '[]', '2021-09-25 00:59:21', '2021-09-25 00:59:21'),
(38, 'Hist Finance', 'LoggedOut', 127, 'App\\User', 127, 'App\\User', '[]', '2021-09-25 01:01:56', '2021-09-25 01:01:56'),
(39, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2021-09-25 01:08:24', '2021-09-25 01:08:24'),
(40, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2021-09-25 05:37:34', '2021-09-25 05:37:34'),
(41, 'Hist', 'LoggedIn', 123, 'App\\User', 123, 'App\\User', '[]', '2021-09-30 10:42:33', '2021-09-30 10:42:33'),
(42, 'HistManager1', 'LoggedIn', 124, 'App\\User', 124, 'App\\User', '[]', '2021-10-01 02:12:53', '2021-10-01 02:12:53'),
(43, 'Hist Caretaker1', 'LoggedIn', 125, 'App\\User', 125, 'App\\User', '[]', '2021-10-04 06:14:24', '2021-10-04 06:14:24'),
(44, 'Hist Caretaker1', 'LoggedOut', 125, 'App\\User', 125, 'App\\User', '[]', '2021-10-04 06:31:00', '2021-10-04 06:31:00'),
(45, 'Guest', 'LoggedOut', 3, 'App\\User', 3, 'App\\User', '[]', '2021-10-04 06:31:51', '2021-10-04 06:31:51'),
(46, 'Guest', 'LoggedOut', 3, 'App\\User', 3, 'App\\User', '[]', '2021-10-04 06:40:41', '2021-10-04 06:40:41'),
(47, 'HistManager1', 'LoggedOut', 124, 'App\\User', 124, 'App\\User', '[]', '2021-10-05 06:48:00', '2021-10-05 06:48:00'),
(48, 'Guest', 'LoggedOut', 3, 'App\\User', 3, 'App\\User', '[]', '2021-10-05 23:38:28', '2021-10-05 23:38:28'),
(49, 'HistManager1', 'LoggedOut', 124, 'App\\User', 124, 'App\\User', '[]', '2021-10-07 00:51:25', '2021-10-07 00:51:25'),
(50, 'HistManager1', 'LoggedIn', 124, 'App\\User', 124, 'App\\User', '[]', '2021-10-07 00:52:39', '2021-10-07 00:52:39'),
(51, 'Hist Finance', 'LoggedOut', 127, 'App\\User', 127, 'App\\User', '[]', '2021-10-07 02:13:40', '2021-10-07 02:13:40'),
(52, 'HistManager1', 'LoggedOut', 124, 'App\\User', 124, 'App\\User', '[]', '2021-10-07 02:28:38', '2021-10-07 02:28:38'),
(53, 'HistManager1', 'LoggedOut', 124, 'App\\User', 124, 'App\\User', '[]', '2021-10-07 03:09:49', '2021-10-07 03:09:49'),
(54, 'Guest', 'LoggedOut', 3, 'App\\User', 3, 'App\\User', '[]', '2021-10-07 03:10:49', '2021-10-07 03:10:49'),
(55, 'HistManager1', 'LoggedOut', 124, 'App\\User', 124, 'App\\User', '[]', '2021-10-07 05:02:47', '2021-10-07 05:02:47'),
(56, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2021-10-07 05:03:26', '2021-10-07 05:03:26'),
(57, 'Guest', 'LoggedOut', 3, 'App\\User', 3, 'App\\User', '[]', '2021-10-07 18:45:36', '2021-10-07 18:45:36'),
(58, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2021-10-08 07:01:21', '2021-10-08 07:01:21'),
(59, 'Hist', 'LoggedOut', 123, 'App\\User', 123, 'App\\User', '[]', '2021-10-08 07:19:16', '2021-10-08 07:19:16'),
(60, 'HistManager1', 'LoggedOut', 124, 'App\\User', 124, 'App\\User', '[]', '2021-10-08 23:33:24', '2021-10-08 23:33:24'),
(61, 'HistManager1', 'LoggedOut', 124, 'App\\User', 124, 'App\\User', '[]', '2021-10-09 00:44:23', '2021-10-09 00:44:23'),
(62, 'Hist', 'LoggedOut', 123, 'App\\User', 123, 'App\\User', '[]', '2021-10-09 00:55:56', '2021-10-09 00:55:56'),
(63, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2021-10-09 02:14:09', '2021-10-09 02:14:09'),
(64, 'Hist Finance', 'LoggedOut', 127, 'App\\User', 127, 'App\\User', '[]', '2021-10-09 02:14:55', '2021-10-09 02:14:55'),
(65, 'Hist', 'LoggedOut', 123, 'App\\User', 123, 'App\\User', '[]', '2021-10-09 07:16:45', '2021-10-09 07:16:45'),
(66, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2021-10-09 07:18:27', '2021-10-09 07:18:27'),
(67, 'Hist', 'LoggedIn', 123, 'App\\User', 123, 'App\\User', '[]', '2021-10-12 00:13:36', '2021-10-12 00:13:36'),
(68, 'Hist', 'LoggedOut', 123, 'App\\User', 123, 'App\\User', '[]', '2021-10-12 00:19:35', '2021-10-12 00:19:35'),
(69, 'HistManager1', 'LoggedOut', 124, 'App\\User', 124, 'App\\User', '[]', '2021-10-12 00:27:19', '2021-10-12 00:27:19'),
(70, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2021-10-12 02:50:19', '2021-10-12 02:50:19'),
(71, 'HistManager1', 'LoggedOut', 124, 'App\\User', 124, 'App\\User', '[]', '2021-10-12 02:58:44', '2021-10-12 02:58:44'),
(72, 'freetrail', 'LoggedOut', 136, 'App\\User', 136, 'App\\User', '[]', '2021-10-12 03:05:28', '2021-10-12 03:05:28'),
(73, 'Paid', 'LoggedOut', 138, 'App\\User', 138, 'App\\User', '[]', '2021-10-12 03:08:17', '2021-10-12 03:08:17'),
(74, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2021-10-12 14:31:48', '2021-10-12 14:31:48'),
(75, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2021-10-12 14:41:21', '2021-10-12 14:41:21'),
(76, 'User', 'LoggedIn', 2, 'App\\User', 2, 'App\\User', '[]', '2021-10-12 14:47:56', '2021-10-12 14:47:56'),
(77, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2021-10-12 15:54:23', '2021-10-12 15:54:23'),
(78, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2021-10-12 15:59:06', '2021-10-12 15:59:06'),
(79, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2021-10-12 16:27:36', '2021-10-12 16:27:36'),
(80, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2021-10-12 16:28:04', '2021-10-12 16:28:04'),
(81, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2021-10-12 16:39:11', '2021-10-12 16:39:11'),
(82, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2021-10-12 16:41:26', '2021-10-12 16:41:26'),
(83, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2021-10-12 16:44:35', '2021-10-12 16:44:35'),
(84, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2021-10-12 16:51:56', '2021-10-12 16:51:56'),
(85, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2021-10-12 16:54:17', '2021-10-12 16:54:17'),
(86, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2021-10-12 17:00:55', '2021-10-12 17:00:55'),
(87, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2021-10-12 17:03:47', '2021-10-12 17:03:47'),
(88, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2021-10-12 17:10:40', '2021-10-12 17:10:40'),
(89, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2021-10-12 17:15:22', '2021-10-12 17:15:22'),
(90, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2021-10-12 17:25:45', '2021-10-12 17:25:45'),
(91, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2021-10-12 17:28:53', '2021-10-12 17:28:53'),
(92, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2021-10-12 17:31:19', '2021-10-12 17:31:19'),
(93, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2021-10-12 17:34:00', '2021-10-12 17:34:00'),
(94, 'Admin', 'LoggedIn', 1, 'App\\User', 1, 'App\\User', '[]', '2021-10-12 17:40:13', '2021-10-12 17:40:13'),
(95, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2021-10-12 17:43:18', '2021-10-12 17:43:18'),
(96, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2021-10-12 17:43:47', '2021-10-12 17:43:47'),
(97, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2021-10-12 17:44:31', '2021-10-12 17:44:31'),
(98, 'HistManager1', 'LoggedOut', 124, 'App\\User', 124, 'App\\User', '[]', '2021-10-14 12:11:14', '2021-10-14 12:11:14'),
(99, 'Hist', 'LoggedOut', 123, 'App\\User', 123, 'App\\User', '[]', '2021-10-18 16:15:31', '2021-10-18 16:15:31'),
(100, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2021-10-18 16:17:36', '2021-10-18 16:17:36'),
(101, 'Admin', 'LoggedOut', 1, 'App\\User', 1, 'App\\User', '[]', '2021-10-20 12:08:46', '2021-10-20 12:08:46'),
(102, 'Hist', 'LoggedOut', 123, 'App\\User', 123, 'App\\User', '[]', '2021-10-20 12:21:07', '2021-10-20 12:21:07'),
(103, 'HistManager1', 'LoggedOut', 124, 'App\\User', 124, 'App\\User', '[]', '2021-10-20 12:50:01', '2021-10-20 12:50:01'),
(104, 'User', 'LoggedOut', 2, 'App\\User', 2, 'App\\User', '[]', '2021-11-12 16:52:52', '2021-11-12 16:52:52');

-- --------------------------------------------------------

--
-- Table structure for table `affordable_cares`
--

DROP TABLE IF EXISTS `affordable_cares`;
CREATE TABLE IF NOT EXISTS `affordable_cares` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `affordable_cares`
--

INSERT INTO `affordable_cares` (`id`, `created_at`, `updated_at`, `deleted_at`, `image`, `title`, `description`) VALUES
(1, '2021-10-12 16:34:14', '2021-10-12 16:35:10', NULL, 'image/nYaeaWkQcD2qYeaLcQNiQj0Z3v1qXdc8vfS725ZG.png', 'QUALIFIED & DEDICATED PROFESSIONALS', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>'),
(2, '2021-10-12 16:35:37', '2021-10-12 16:35:37', NULL, 'image/GciDVn0ocvQIO4Bye36Gm88qIxHhEQiPF1CWXZa5.png', 'CUSTOM CARE SERVICE', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua<br />\r\n&nbsp;</p>'),
(3, '2021-10-12 16:36:02', '2021-10-12 16:36:02', NULL, 'image/doSTX0kiWwlEsnuojxrTBmZQa6JyFYV3QPJNLuIn.png', '24/7 AVAILABLE & AFFPORDABLE PRICES', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>');

-- --------------------------------------------------------

--
-- Table structure for table `ask_a_questions`
--

DROP TABLE IF EXISTS `ask_a_questions`;
CREATE TABLE IF NOT EXISTS `ask_a_questions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ask_a_questions`
--

INSERT INTO `ask_a_questions` (`id`, `created_at`, `updated_at`, `deleted_at`, `name`, `email`, `question`) VALUES
(1, '2021-10-12 17:46:50', '2021-10-12 17:46:50', NULL, 'developer', 'developer@yopmail.com', 'Lorem Ispum dolor sit'),
(2, '2021-10-14 12:11:01', '2021-10-14 12:11:01', NULL, 'ask', 'ask@yopmail.com', 'Lorem Ispum dolor sit');

-- --------------------------------------------------------

--
-- Table structure for table `caretakers`
--

DROP TABLE IF EXISTS `caretakers`;
CREATE TABLE IF NOT EXISTS `caretakers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `facility_id` int(11) DEFAULT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nation_id_card` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `caretakers`
--

INSERT INTO `caretakers` (`id`, `created_at`, `updated_at`, `deleted_at`, `user_id`, `company_id`, `package_id`, `facility_id`, `full_name`, `email`, `password`, `phone`, `nation_id_card`, `dob`, `address`, `country`, `city`, `status`, `postal`) VALUES
(1, '2021-08-21 17:35:43', '2021-08-21 17:35:43', NULL, '125', '13', 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '2021-08-25 11:44:35', '2021-08-25 11:44:35', NULL, '131', '13', 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(3, '2021-08-25 11:50:13', '2021-08-25 11:50:13', NULL, '132', '13', 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cognitive_psycologicals`
--

DROP TABLE IF EXISTS `cognitive_psycologicals`;
CREATE TABLE IF NOT EXISTS `cognitive_psycologicals` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `consumer_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `consumer_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `added_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `memory_problem` text COLLATE utf8mb4_unicode_ci,
  `memory_problem_check` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `memory_care` text COLLATE utf8mb4_unicode_ci,
  `memory_care_check` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ambulatory` text COLLATE utf8mb4_unicode_ci,
  `ambulatory_check` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `perception` text COLLATE utf8mb4_unicode_ci,
  `language` text COLLATE utf8mb4_unicode_ci,
  `critical_thinking` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cognitive_psycologicals`
--

INSERT INTO `cognitive_psycologicals` (`id`, `created_at`, `updated_at`, `deleted_at`, `consumer_id`, `consumer_name`, `added_by`, `memory_problem`, `memory_problem_check`, `memory_care`, `memory_care_check`, `ambulatory`, `ambulatory_check`, `perception`, `language`, `critical_thinking`, `status`) VALUES
(1, '2021-08-23 18:02:04', '2021-08-23 18:02:36', NULL, '1', 'histResident1', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', NULL, NULL, NULL, NULL, NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '1'),
(2, '2021-08-23 18:41:50', '2021-08-23 18:41:50', NULL, '1', 'histResident1', NULL, 'Short Term Memory issue', NULL, NULL, NULL, NULL, NULL, 'Will be get well asap', 'English UK', 'Yes', '1'),
(3, '2021-08-23 18:45:35', '2021-08-23 18:45:35', NULL, '1', 'histResident1', '124', 'Long term memory', NULL, NULL, NULL, NULL, NULL, 'Will do his best', 'Chinese', 'No', '1'),
(4, '2021-09-25 06:03:47', '2021-09-25 06:03:47', NULL, '2', 'Hist Resident2', '123', 'Sufficient at Daily tasks.', NULL, NULL, NULL, NULL, NULL, 'Low', 'ENG', 'Low', '1'),
(5, '2021-10-18 16:15:08', '2021-10-18 16:15:08', NULL, '4', 'Hist Resident4', '123', 'Memory Problem', 'on', 'Memory Care', 'on', 'Ambulatory', 'on', 'Perception', 'Language', 'Critical Thinking', '1');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `package_id` int(10) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `is_custom_package_user` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `column_4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `column_5` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_companies` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `created_at`, `updated_at`, `deleted_at`, `package_id`, `user_id`, `status`, `payment_status`, `is_custom_package_user`, `column_4`, `column_5`) VALUES
(13, '2021-08-21 16:55:44', '2021-08-21 17:08:37', NULL, 2, 123, '1', '1', '0', NULL, NULL),
(14, '2021-08-25 18:09:46', '2021-08-25 18:09:46', NULL, 4, 133, '1', '1', '0', NULL, NULL),
(15, '2021-09-28 00:46:04', '2021-09-28 00:46:04', NULL, 2, 134, '1', '1', '0', NULL, NULL),
(16, '2021-10-12 03:01:31', '2021-10-12 03:01:31', NULL, 1, 136, '1', '0', '0', NULL, NULL),
(17, '2021-10-12 03:04:39', '2021-10-12 03:04:39', NULL, 1, 137, '1', '0', '0', NULL, NULL),
(18, '2021-10-12 03:07:40', '2021-10-12 03:07:40', NULL, 3, 138, '1', '1', '0', NULL, NULL),
(19, '2021-10-12 03:30:52', '2021-10-12 03:30:52', NULL, 8, 139, '0', '0', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `consumers`
--

DROP TABLE IF EXISTS `consumers`;
CREATE TABLE IF NOT EXISTS `consumers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `caretaker_id` int(11) DEFAULT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nation_id_card` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consumers`
--

INSERT INTO `consumers` (`id`, `created_at`, `updated_at`, `deleted_at`, `user_id`, `company_id`, `package_id`, `caretaker_id`, `full_name`, `email`, `password`, `phone`, `nation_id_card`, `dob`, `address`, `country`, `city`, `postal`) VALUES
(1, '2021-08-21 17:53:34', '2021-08-21 17:53:34', NULL, 126, 13, 2, 125, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '2021-08-24 18:01:33', '2021-08-24 18:01:33', NULL, 129, 13, 2, 125, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '2021-08-24 18:22:39', '2021-08-24 18:22:39', NULL, 130, 13, 2, 125, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '2021-10-18 15:43:02', '2021-10-18 15:43:02', NULL, 140, 13, 2, 125, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `consumer_types`
--

DROP TABLE IF EXISTS `consumer_types`;
CREATE TABLE IF NOT EXISTS `consumer_types` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consumer_types`
--

INSERT INTO `consumer_types` (`id`, `created_at`, `updated_at`, `deleted_at`, `name`, `status`) VALUES
(1, NULL, NULL, NULL, 'Assisted Living', '1'),
(2, NULL, NULL, NULL, 'Nursing Home', '1'),
(3, NULL, NULL, NULL, 'Parole ', '1');

-- --------------------------------------------------------

--
-- Table structure for table `contact_uses`
--

DROP TABLE IF EXISTS `contact_uses`;
CREATE TABLE IF NOT EXISTS `contact_uses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_uses`
--

INSERT INTO `contact_uses` (`id`, `created_at`, `updated_at`, `deleted_at`, `full_name`, `phone`, `email`, `message`) VALUES
(1, '2021-10-14 12:10:32', '2021-10-14 12:10:32', NULL, 'enquiry', '934050935', 'enquirry@yopmail.com', 'Lorem Ipsum dolor sit');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `created_at`, `updated_at`, `deleted_at`, `name`, `status`) VALUES
(1, '2021-06-24 01:22:24', '2021-06-24 01:22:24', NULL, 'Sales', '1'),
(2, '2021-06-24 01:22:39', '2021-06-24 01:22:39', NULL, 'backend', '1'),
(3, '2021-06-24 01:22:55', '2021-06-24 01:22:55', NULL, 'frontend', '1'),
(4, '2021-06-24 01:23:14', '2021-06-24 01:23:14', NULL, 'Mobile Application', '1'),
(5, '2021-07-15 07:55:13', '2021-07-15 07:55:13', NULL, 'React', '1'),
(6, '2021-07-15 07:55:24', '2021-07-15 07:55:24', NULL, 'labour', '1');

-- --------------------------------------------------------

--
-- Table structure for table `education_levels`
--

DROP TABLE IF EXISTS `education_levels`;
CREATE TABLE IF NOT EXISTS `education_levels` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education_levels`
--

INSERT INTO `education_levels` (`id`, `created_at`, `updated_at`, `deleted_at`, `name`, `status`) VALUES
(1, '2021-04-28 06:19:05', '2021-04-28 06:19:05', NULL, 'Less than high school', '1'),
(2, '2021-04-28 06:19:30', '2021-04-28 06:19:30', NULL, 'High school diploma or equivalent', '1'),
(3, '2021-04-28 06:19:48', '2021-04-28 06:19:48', NULL, 'Some college, no degree', '1'),
(4, '2021-04-28 06:19:57', '2021-04-28 06:19:57', NULL, 'Postsecondary non-degree award', '1'),
(5, '2021-04-28 06:20:06', '2021-04-28 06:20:06', NULL, 'Associate’s degree', '1'),
(6, '2021-04-28 06:20:16', '2021-04-28 06:20:16', NULL, 'Bachelor’s degree', '1'),
(7, '2021-04-28 06:20:37', '2021-04-28 06:20:37', NULL, 'Master’s degree', '1'),
(8, '2021-04-28 06:20:45', '2021-04-28 06:20:45', NULL, 'Doctoral or professional degree', '1');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

DROP TABLE IF EXISTS `facilities`;
CREATE TABLE IF NOT EXISTS `facilities` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `company_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_beds` int(11) DEFAULT NULL,
  `rent_amount` int(11) DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `created_at`, `updated_at`, `deleted_at`, `company_id`, `name`, `address`, `city`, `state`, `zip_code`, `number_of_beds`, `rent_amount`, `phone`, `fax`, `status`) VALUES
(1, '2021-08-21 17:24:05', '2021-08-21 17:24:22', NULL, '13', 'F-Hist/500', '500 Grand El-vd, North', 'Detriot', 'MI', '75467', 18, NULL, '92323023821', '68778', '1'),
(2, '2021-10-09 07:08:16', '2021-10-09 07:08:40', NULL, '13', 'F-Hist/409', 'Detriot, New City Area', 'New York', 'California', '75467', 57, NULL, '+355 34333767', '68778', '1');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `message_reply` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `created_at`, `updated_at`, `deleted_at`, `company_id`, `message`, `message_reply`, `status`) VALUES
(1, '2021-08-21 18:56:06', '2021-10-08 00:15:14', NULL, 123, 'Lorem ispum Dolor sit', 'Reply to 1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `finances`
--

DROP TABLE IF EXISTS `finances`;
CREATE TABLE IF NOT EXISTS `finances` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `added_by_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `finances`
--

INSERT INTO `finances` (`id`, `created_at`, `updated_at`, `deleted_at`, `name`, `email`, `password`, `phone`, `user_id`, `added_by_id`, `status`) VALUES
(1, '2021-08-23 15:50:11', '2021-08-23 15:50:11', NULL, 'Hist Finance', 'histfinance1@yopmail.com', '123456', '92323023821', '127', '13', '1'),
(2, '2021-08-23 16:09:49', '2021-10-20 12:27:24', NULL, 'Hist Finance2', 'histfinance2@yopmail.com', '123456', '92323023821', '128', '13', '1');

-- --------------------------------------------------------

--
-- Table structure for table `f_a_qs`
--

DROP TABLE IF EXISTS `f_a_qs`;
CREATE TABLE IF NOT EXISTS `f_a_qs` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `f_a_qs`
--

INSERT INTO `f_a_qs` (`id`, `created_at`, `updated_at`, `deleted_at`, `question`, `description`) VALUES
(1, '2021-10-12 17:26:38', '2021-10-12 17:26:38', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do', '<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven&#39;t heard of them accusamus labore sustainable VHS.</p>'),
(2, '2021-10-12 17:27:04', '2021-10-12 17:27:04', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do', '<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven&#39;t heard of them accusamus labore sustainable VHS.</p>'),
(3, '2021-10-12 17:27:20', '2021-10-12 17:27:20', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do', '<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven&#39;t heard of them accusamus labore sustainable VHS.</p>'),
(4, '2021-10-12 17:27:38', '2021-10-12 17:27:38', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do', '<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven&#39;t heard of them accusamus labore sustainable VHS.</p>'),
(5, '2021-10-12 17:27:51', '2021-10-12 17:27:51', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do', '<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven&#39;t heard of them accusamus labore sustainable VHS.</p>'),
(6, '2021-10-12 17:28:30', '2021-10-12 17:28:30', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do', '<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven&#39;t heard of them accusamus labore sustainable VHS.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `get_quote_nows`
--

DROP TABLE IF EXISTS `get_quote_nows`;
CREATE TABLE IF NOT EXISTS `get_quote_nows` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `get_quote_nows`
--

INSERT INTO `get_quote_nows` (`id`, `created_at`, `updated_at`, `deleted_at`, `name`, `number`, `email`) VALUES
(1, '2021-10-12 17:38:31', '2021-10-12 17:38:31', NULL, 'OPAT Resident', '+33939543445', 'resident1@yopmail.com'),
(2, '2021-10-14 12:09:52', '2021-10-14 12:09:52', NULL, 'test', '234534545545', 'zeeshan@yopmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `incident_reports`
--

DROP TABLE IF EXISTS `incident_reports`;
CREATE TABLE IF NOT EXISTS `incident_reports` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `consumer_id` int(11) DEFAULT NULL,
  `nature_of_incident` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `incident_detail` text COLLATE utf8mb4_unicode_ci,
  `additional_notes` text COLLATE utf8mb4_unicode_ci,
  `incident_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report_created_by` int(11) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incident_reports`
--

INSERT INTO `incident_reports` (`id`, `created_at`, `updated_at`, `deleted_at`, `consumer_id`, `nature_of_incident`, `incident_detail`, `additional_notes`, `incident_date`, `report_created_by`, `status`) VALUES
(1, '2021-08-21 19:40:34', '2021-08-21 19:40:34', NULL, 126, 'testing', 'testing....', 'testing....', '2021-08-17', 125, '1'),
(2, '2021-08-25 11:26:26', '2021-08-25 11:26:26', NULL, 129, 'Customer Report', 'Lorem Ipsum dolor sit', 'Lorem Ipsum dolor sit', '2021-08-26', 125, '1'),
(3, '2021-09-25 06:22:07', '2021-09-25 06:22:07', NULL, 130, 'Robbery', 'Stole another resident\'s birthday suit', NULL, '2021-07-06', 13, '1');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `city_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_type_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `user_id`, `created_at`, `updated_at`, `deleted_at`, `title`, `location`, `description`, `city_id`, `department_id`, `job_type_id`, `status`) VALUES
(1, NULL, '2021-06-24 01:21:31', '2021-06-24 06:50:49', NULL, 'PHP', 'New York', 'We new plugin and custom theme developer', '2', '2', '1', '1'),
(2, NULL, '2021-06-24 01:27:02', '2021-06-24 01:27:02', NULL, 'Wordpress', 'New York', 'We new plugin and custom theme developer', '3', '1', '2', '1'),
(3, NULL, '2021-06-24 05:02:01', '2021-07-14 06:56:53', NULL, 'React Developer', 'sydny', 'Lorem Ipsum dolor sit', '1', '1', '1', '1'),
(4, NULL, '2021-06-24 05:08:59', '2021-06-24 05:08:59', NULL, 'Mobile Appplication', 'New York', 'Lorem Ipsum', '2', '2', '2', '1'),
(5, 2, '2021-06-29 01:15:56', '2021-06-29 01:16:35', NULL, 'Sales Manager', 'London', 'Lorem Ipsum dolor sit', '3', '1', '1', '1'),
(6, 70, '2021-07-15 07:58:14', '2021-07-15 07:58:14', NULL, 'Nursing job', 'New York', 'Lorem Ipsum', '2', '6', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `job_requests`
--

DROP TABLE IF EXISTS `job_requests`;
CREATE TABLE IF NOT EXISTS `job_requests` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

DROP TABLE IF EXISTS `job_types`;
CREATE TABLE IF NOT EXISTS `job_types` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_types`
--

INSERT INTO `job_types` (`id`, `created_at`, `updated_at`, `deleted_at`, `name`, `status`) VALUES
(1, '2021-06-24 01:22:01', '2021-06-24 01:22:01', NULL, 'Full Time', '1'),
(2, '2021-06-24 01:23:34', '2021-06-24 01:23:34', NULL, 'Part Time', '1'),
(3, '2021-07-15 07:54:31', '2021-07-15 07:54:31', NULL, 'Day job', '1');

-- --------------------------------------------------------

--
-- Table structure for table `leaderships`
--

DROP TABLE IF EXISTS `leaderships`;
CREATE TABLE IF NOT EXISTS `leaderships` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaderships`
--

INSERT INTO `leaderships` (`id`, `created_at`, `updated_at`, `deleted_at`, `image`, `name`, `designation`, `description`) VALUES
(1, '2021-10-12 17:06:33', '2021-10-12 17:06:33', NULL, 'image/zF9Y7E6QG1mJH6QlGImIhh8hilNM1AfAqo3VtrPC.png', 'James Smith', NULL, '<p>Lorem ipsum dolor sit amet, adipiscing elit, sed do eiusmod tempor incididunt dolor sit amet adipiscing.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `learning_managements`
--

DROP TABLE IF EXISTS `learning_managements`;
CREATE TABLE IF NOT EXISTS `learning_managements` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `lecture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_video` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `learning_managements`
--

INSERT INTO `learning_managements` (`id`, `user_id`, `created_at`, `updated_at`, `deleted_at`, `lecture`, `upload_file`, `upload_video`, `status`) VALUES
(1, '51', '2021-07-08 11:59:47', '2021-07-08 11:59:47', NULL, 'Lecture1', 'file/2iCIJB9b8ATnQRr7Jqyy7kFtvugOxbEVffhEXqxU.pdf', 'video/dVmxwM6qRHxrRYB8PCWTe6NFZflqUJpufJHUbLbK.mp4', '1'),
(2, '70', '2021-07-15 08:05:03', '2021-07-15 08:05:03', NULL, 'lecture2', 'file/ZsCHm1IyC46PaPJiCL0mEhdiYBt7JwKTu4dHPOn7.pdf', 'video/S35UnUifkGTwC4VG09FbBqKVTqItZ9wZM3I9Grfs.mp4', '1');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `created_at`, `updated_at`, `deleted_at`, `name`, `status`) VALUES
(1, '2021-06-24 01:24:02', '2021-06-24 01:24:02', NULL, 'Sydny', '1'),
(2, '2021-06-24 01:24:17', '2021-06-24 01:24:17', NULL, 'New York', '1'),
(3, '2021-06-24 01:24:30', '2021-06-24 01:24:30', NULL, 'London', '1'),
(4, '2021-07-15 07:56:52', '2021-07-15 07:56:52', NULL, 'New York', '1');

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

DROP TABLE IF EXISTS `managers`;
CREATE TABLE IF NOT EXISTS `managers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` int(191) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `user_id`, `created_at`, `updated_at`, `deleted_at`, `status`, `company_id`, `package_id`) VALUES
(1, 124, '2021-08-21 17:13:15', '2021-08-21 17:13:15', NULL, NULL, 13, 2),
(2, 135, '2021-10-09 05:11:28', '2021-10-09 05:11:28', NULL, NULL, 13, 2);

-- --------------------------------------------------------

--
-- Table structure for table `mdoc_agents`
--

DROP TABLE IF EXISTS `mdoc_agents`;
CREATE TABLE IF NOT EXISTS `mdoc_agents` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mdoc_agents`
--

INSERT INTO `mdoc_agents` (`id`, `created_at`, `updated_at`, `deleted_at`, `name`, `status`) VALUES
(1, NULL, NULL, NULL, 'Agent Collins', '1'),
(2, NULL, NULL, NULL, 'Agent Czata', '1'),
(3, NULL, NULL, NULL, 'Agent Dixon', '1'),
(4, NULL, NULL, NULL, 'Agent Forde', '1'),
(5, NULL, NULL, NULL, 'Agent Grisby', '1'),
(6, NULL, NULL, NULL, 'Agent Jenkins', '1'),
(7, NULL, NULL, NULL, 'Agent Strerdivant', '1'),
(8, NULL, NULL, NULL, 'Agent Web', '1');

-- --------------------------------------------------------

--
-- Table structure for table `medications`
--

DROP TABLE IF EXISTS `medications`;
CREATE TABLE IF NOT EXISTS `medications` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `consumer_id` int(11) DEFAULT NULL,
  `medication` text COLLATE utf8mb4_unicode_ci,
  `frequency_taken` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `added_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medications`
--

INSERT INTO `medications` (`id`, `created_at`, `updated_at`, `deleted_at`, `consumer_id`, `medication`, `frequency_taken`, `start_date`, `end_date`, `added_by`) VALUES
(1, '2021-08-21 19:36:16', '2021-10-01 02:55:46', NULL, 126, 'Zoloft \r\nCapresicam\r\nJaysaidian\r\nLoganmafran', '24 Tablets Daily', '2021-08-11', '2021-08-01', '124'),
(2, '2021-10-18 17:51:20', '2021-10-18 17:51:20', NULL, 129, 'medication of Resident 2', '12', '2021-10-28', '2021-11-03', '13');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(13, '2021_03_03_221547_create_managers_table', 6),
(17, '2021_03_09_230306_create_caretakers_table', 7),
(18, '2021_03_09_230730_create_consumers_table', 8),
(19, '2021_03_30_224020_create_feedback_table', 9),
(20, '2021_04_28_000659_create_facilities_table', 10),
(21, '2021_04_28_001031_create_education_levels_table', 11),
(22, '2021_05_06_011938_create_rent_payments_table', 12),
(23, '2021_05_06_012438_create_medications_table', 13),
(24, '2021_05_06_013108_create_incident_reports_table', 14),
(25, '2021_06_02_195041_create_rent_sources_table', 15),
(26, '2021_06_02_195113_create_mdoc_agents_table', 16),
(27, '2021_06_02_195145_create_consumer_types_table', 17),
(28, '2021_06_23_175549_create_job_types_table', 18),
(29, '2021_06_23_175623_create_departments_table', 19),
(30, '2021_06_23_175653_create_locations_table', 20),
(31, '2021_06_23_180034_create_jobs_table', 21),
(32, '2021_06_23_232200_create_job_requests_table', 22),
(33, '2021_06_28_212750_create_quizzes_table', 23),
(34, '2021_07_07_164910_create_learning_managements_table', 24),
(35, '2021_07_07_221619_create_user_assessments_table', 25),
(36, '2021_07_08_210000_create_transport_trackers_table', 26),
(37, '2021_07_09_232147_create_finances_table', 27),
(38, '2021_08_23_222727_create_cognitive_psycologicals_table', 28),
(39, '2021_08_24_190204_create_social_service_eligibilities_table', 29),
(40, '2021_10_12_192307_create_pages_table', 30),
(41, '2021_10_12_205610_create_our_solutions_table', 31),
(42, '2021_10_12_211109_create_affordable_cares_table', 32),
(43, '2021_10_12_214050_create_provides_your_cares_table', 33),
(44, '2021_10_12_215320_create_resources_table', 34),
(45, '2021_10_12_220225_create_leaderships_table', 35),
(46, '2021_10_12_221242_create_news_and_events_table', 36),
(47, '2021_10_12_222202_create_f_a_qs_table', 37),
(48, '2021_10_12_223221_create_get_quote_nows_table', 38),
(49, '2021_10_12_224102_create_ask_a_questions_table', 39);

-- --------------------------------------------------------

--
-- Table structure for table `news_and_events`
--

DROP TABLE IF EXISTS `news_and_events`;
CREATE TABLE IF NOT EXISTS `news_and_events` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_and_events`
--

INSERT INTO `news_and_events` (`id`, `created_at`, `updated_at`, `deleted_at`, `image`, `date`, `event_title`, `title`, `description`) VALUES
(1, '2021-10-12 17:18:32', '2021-10-12 17:18:44', NULL, 'image/GSYzNoOzx4OEM4jU42nC39m7xoaOaWbYOk28N51V.png', 'June 24 - 26, 2020', 'Lorem ipsum dolor sit', 'LOREM IPSUM DOLOR', '<p>Lorem ipsum dolor sit amet, adipiscing elit, sed do eiusmod tempor incididunt dolor sit amet adipiscing.</p>'),
(2, '2021-10-12 17:19:20', '2021-10-12 17:19:20', NULL, 'image/JyD6RpbEncTnomZ2ERx2qjowU5KyYIWkJ8c6VGTv.png', 'June 24 - 26, 2020', 'Lorem ipsum dolor sit', 'LOREM IPSUM DOLOR', '<p>Lorem ipsum dolor sit amet, adipiscing elit, sed do eiusmod tempor incididunt dolor sit amet adipiscing.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `news_letter`
--

DROP TABLE IF EXISTS `news_letter`;
CREATE TABLE IF NOT EXISTS `news_letter` (
  `id` int(191) NOT NULL AUTO_INCREMENT,
  `email` varchar(191) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `our_solutions`
--

DROP TABLE IF EXISTS `our_solutions`;
CREATE TABLE IF NOT EXISTS `our_solutions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `our_solutions`
--

INSERT INTO `our_solutions` (`id`, `created_at`, `updated_at`, `deleted_at`, `image`, `title`, `description`) VALUES
(1, '2021-10-12 16:02:04', '2021-10-12 16:04:11', NULL, 'image/gD5DUTmM1djsbpQRjnPqTvjCNMyDMRL56vTCeNXG.png', 'LIVE-IN CARE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, iusmod tempor incididunt ut labore et dolore magna aliqua.'),
(2, '2021-10-12 16:02:30', '2021-10-12 16:05:09', NULL, 'image/J2xKl3TvxFuDn9ZDBtRTcTo67TfqYN0qXHBX163K.png', 'ASSISTED LIVING', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, iusmod tempor incididunt ut labore et dolore magna aliqua.'),
(3, '2021-10-12 16:02:48', '2021-10-12 16:05:31', NULL, 'image/YCNKsKbnnVphFstqJdnYg6mWFR2Qo1VpXK1SBfFo.png', 'PHYSIOTHERAPY', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
CREATE TABLE IF NOT EXISTS `packages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` float DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beds` int(11) DEFAULT NULL,
  `caretakers` int(11) DEFAULT NULL,
  `managers` int(11) DEFAULT NULL,
  `lms_access` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_custom_package` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `validity_days` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `created_at`, `updated_at`, `deleted_at`, `name`, `description`, `price`, `logo`, `beds`, `caretakers`, `managers`, `lms_access`, `status`, `is_custom_package`, `validity_days`) VALUES
(1, '2021-03-24 02:03:11', '2021-03-24 02:03:11', NULL, 'Free Trial', '<ol>\r\n	<li>\r\n	<p><strong>Limited</strong>&nbsp;number of Beds.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Limited</strong>&nbsp;number of Managers.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Limited</strong>&nbsp;number of Caretakers.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Limited</strong>&nbsp;3 days subscription.</p>\r\n	</li>\r\n</ol>', 0, 'packages/nfnzjgV7Y9PlSgYjkJ8YAox1htYE871BcsZv0Zol.jpeg', 2, 2, 1, NULL, '1', '0', '15'),
(2, '2021-03-24 02:05:34', '2021-03-24 02:05:34', NULL, 'Standard Package', '<ol>\r\n	<li>\r\n	<p><strong>Limited</strong>&nbsp;number of Beds.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Limited</strong>&nbsp;number of Managers.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Limited</strong>&nbsp;number of Caretakers.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Maximum&nbsp;</strong>&nbsp;30 days subscription.</p>\r\n	</li>\r\n</ol>', 120, 'packages/ylxSowwJj6aVZtPyHH6vpzaq4kaoucK3T9QkXywI.png', 3, 3, 1, NULL, '1', '0', '365'),
(3, '2021-03-24 02:06:42', '2021-03-24 02:06:42', NULL, 'Gold Package', '<ol>\r\n	<li>\r\n	<p><strong>Limited</strong>&nbsp;number of Beds.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Unlimited</strong>&nbsp;number of Managers.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Limited</strong>&nbsp;number of Caretakers.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Maximum&nbsp;</strong>&nbsp;90 days subscription.</p>\r\n	</li>\r\n</ol>', 200, 'packages/0hTdZnbpSlzpPQMDxXre9kUJuAeLT1doe34GgQvO.png', 10, 10, 100, NULL, '1', '0', '365'),
(4, '2021-03-24 02:08:04', '2021-03-27 00:06:45', NULL, 'Platinum Package', '<ol>\r\n	<li>\r\n	<p><strong>Unlimited</strong>&nbsp;number of Beds.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Unlimited</strong>&nbsp;number of Managers.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Unlimited</strong>&nbsp;number of Caretakers.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Maximum&nbsp;</strong>&nbsp;365&nbsp;days subscription.</p>\r\n	</li>\r\n</ol>', 550, 'packages/t8dcG1FlZNlaCKSuLQr955qeReWCAKrhCLYC4xrl.png', 500, 500, 1000, NULL, '1', '0', '365'),
(5, '2021-07-27 06:15:33', '2021-07-27 06:15:33', NULL, 'Aftab', '3', 3, 'packages/default.png', 2, 2, 2, '1', '0', '1', NULL),
(6, '2021-08-17 03:37:38', '2021-08-17 03:37:38', NULL, 'aftab', 'testing', 23, 'packages/default.png', 2, 3, 3, '1', '0', '1', NULL),
(7, '2021-10-12 03:13:39', '2021-10-12 03:13:39', NULL, 'Custom Package', 'Nil', 8000, 'packages/default.png', 12, 2, 2, '1', '0', '1', NULL),
(8, '2021-10-12 03:24:32', '2021-10-12 03:24:32', NULL, 'Custom Package', 'NIL', 8000, 'packages/default.png', 3, 2, 2, '1', '0', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `created_at`, `updated_at`, `deleted_at`, `title`, `description`, `slug`) VALUES
(1, '2021-10-12 14:48:25', '2021-10-14 12:15:00', NULL, 'OUR SOLUTIONS', '<p>Test Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', 'OURSOLUTIONS'),
(2, '2021-10-12 14:48:46', '2021-10-14 12:15:14', NULL, 'ONE PERSON AT A TIME', '<p>Test Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut l abore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'ONEPERSONATATIME'),
(3, '2021-10-12 14:49:08', '2021-10-14 12:15:27', NULL, 'WE PROVIDE AFFORDABLE CARE', '<p>Test Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', 'WEPROVIDEAFFORDABLECARE'),
(4, '2021-10-12 14:49:33', '2021-10-14 12:15:42', NULL, 'PACKAGES & PRICES', '<p>Test Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</p>', 'PACKAGES&PRICES'),
(5, '2021-10-12 14:49:58', '2021-10-14 12:15:57', NULL, 'Lorem ipsum dolor', '<p>Test Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</p>', 'Loremipsumdolor'),
(6, '2021-10-12 14:50:29', '2021-10-12 14:50:29', NULL, 'SERVING AS LARGEST HOME CARE SERVICE IN LOCATION.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 'SERVINGASLARGESTHOMECARESERVICEINLOCATION.'),
(7, '2021-10-12 14:50:47', '2021-10-12 14:50:47', NULL, 'ABOUT US', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'ABOUTUS'),
(8, '2021-10-12 14:51:07', '2021-10-12 14:51:07', NULL, 'FOUNDER & CEO', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\r\n\r\nDuis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'FOUNDER&CEO'),
(9, '2021-10-12 14:51:36', '2021-10-12 14:51:36', NULL, 'FOR O.P.A.T', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'FOROPAT'),
(10, '2021-10-12 14:51:56', '2021-10-12 14:51:56', NULL, 'LEADERSHIP', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', 'LEADERSHIP'),
(11, '2021-10-12 15:51:03', '2021-10-12 15:51:03', NULL, 'NEWS & EVENTS', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'NEWS'),
(12, '2021-10-12 15:51:26', '2021-10-12 15:51:26', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Your privacy is very important to us. Accordingly, we have developed this Policy in order for you to understand how we collect, use, communicate and disclose and make use of personal information. The following outlines our privacy policy.\r\n\r\nBefore or at the time of collecting personal information, we will identify the purposes for which information is being collected.\r\nWe will collect and use of personal information solely with the objective of fulfilling those purposes specified by us and for other compatible purposes, unless we obtain the consent of the individual concerned or as required by law.\r\nWe will only retain personal information as long as necessary for the fulfillment of those purposes.\r\nWe will collect personal information by lawful and fair means and, where appropriate, with the knowledge or consent of the individual concerned.\r\nPersonal data should be relevant to the purposes for which it is to be used, and, to the extent necessary for those purposes, should be accurate, complete, and up-to-date.\r\nWe will protect personal information by reasonable security safeguards against loss or theft, as well as unauthorized access, disclosure, copying, use or modification.\r\nWe will make readily available to customers information about our policies and practices relating to the management of personal information.\r\nWe are committed to conducting our business in accordance with these principles in order to ensure that the confidentiality of personal information is protected and maintained.\r\n\r\nWho we are\r\nOur website address is: https://bootstrapmade.com.\r\n\r\nDefinitions\r\n\r\nPersonal Data – any information relating to an identified or identifiable natural person. Processing – any operation or set of operations which is performed on Personal Data or on sets of Personal Data. Data subject - a natural person whose Personal Data is being Processed. Child - a natural person under 16 years of age. We/us (either capitalized or not) - bootstrapmade.com\r\n\r\nWhat personal data we collect and why we collect it\r\n1. Forms\r\n\r\nWhen ordering or registering on our Site you may be asked to enter your name, member name, email address, mailing address, country, billing information or other details to help you with your experience. These information are collected in purpose of providing services described on it, like to verify your identity when you sign in to website, to process your transactions made on site, to respond to support tickets and offer customer services, for administrative and accounting needs that we required to provide to government.\r\nWhen you submit a support question we collect your first name, last name and your email address so that we can correspond with you.\r\n2. Google Analytics\r\n\r\nWe use Google Analytics to track visitors on this site. Google Analytics uses cookies to collect this data. In order to be compliant with the new regulation Google included a data processing amendment. The data we collect will be processed anonymously and “Data sharing” is disabled. We don’t use other Google services in combination with Google Analytics cookies.\r\n\r\nComments\r\nWhen visitors leave comments on the site we collect the data shown in the comments form, and also the visitor’s IP address and browser user agent string to help spam detection.\r\n\r\nAn anonymized string created from your email address (also called a hash) may be provided to the Gravatar service to see if you are using it. The Gravatar service privacy policy is available here: https://automattic.com/privacy/. After approval of your comment, your profile picture is visible to the public in the context of your comment.\r\n\r\nCookie Policy\r\nTo enhance your experience on our sites, many of our web pages use “cookies”. Cookies are small text files that we place in your computer’s browser to store your preferences. Cookies, by themselves, do not tell us your email address or other personal information unless you choose to provide this information to us by, for example, registering at one of our sites. Once you choose to provide a web page with personal information, this information may be linked to the data stored in the cookie. A cookie is like an identification card. It is unique to your computer and can only be read by the server that gave it to you.\r\n\r\nWe use cookies to understand site usage and to improve the content and offerings on our sites. For example, we may use cookies to personalize your experience on our web pages (e.g. to recognize you by name when you return to our site). We also may use cookies to offer you products and services. If you leave a comment on our site you may opt-in to saving your name, email address and website in cookies. These are for your convenience so that you do not have to fill in your details again when you leave another comment. These cookies will last for one year. If you have an account and you log in to this site, we will set a temporary cookie to determine if your browser accepts cookies. This cookie contains no personal data and is discarded when you close your browser. When you log in, we will also set up several cookies to save your login information and your screen display choices. Login cookies last for two days, and screen options cookies last for a year. If you select “Remember Me”, your login will persist for two weeks. If you log out of your account, the login cookies will be removed.\r\n\r\nIf you want to control which cookies you accept. You can configure your browser to accept all cookies or to alert you every time a cookie is offered by a website’s server. Most browsers automatically accept cookies. You can set your browser option so that you will not receive cookies and you can also delete existing cookies from your browser. You may find that some parts of the site will not function properly if you have refused cookies.\r\n\r\nEmbedded content from other websites\r\nArticles on this site may include embedded content (e.g. videos, images, articles, etc.). Embedded content from other websites behaves in the exact same way as if the visitor has visited the other website. These websites may collect data about you, use cookies, embed additional third-party tracking, and monitor your interaction with that embedded content, including tracing your interaction with the embedded content if you have an account and are logged in to that website.\r\n\r\nWho we share your data with\r\nWhen you purchase a product on bootstrapmade.com, your personal data are shared with our online reseller Paddle. You can check Paddle privacy policy at: https://paddle.com/privacy/\r\n\r\nHow long we retain your data\r\nIf you leave a comment, the comment and its metadata are retained indefinitely. This is so we can recognize and approve any follow-up comments automatically instead of holding them in a moderation queue. For users that register on our website (if any), we also store the personal information they provide in their user profile. All users can see, edit, or delete their personal information at any time (except they cannot change their username). Website administrators can also see and edit that information.\r\n\r\nWhat rights you have over your data\r\nIf you have an account on this site, or have left comments, you can request to receive an exported file of the personal data we hold about you, including any data you have provided to us. You can also request that we erase any personal data we hold about you. This does not include any data we are obliged to keep for administrative, legal, or security purposes. You can send your request anytime to: contact@bootstrapmade.com.\r\n\r\nSecurity\r\nTo protect your personal information, we take reasonable precautions and follow industry best practices to make sure it is not inappropriately lost, misused, accessed, disclosed, altered or destroyed. If you provide us with your credit card information, the information is encrypted using secure socket layer technology (SSL) and stored with a AES-256 encryption. Although no method of transmission over the Internet or electronic storage is 100% secure, we follow all PCI-DSS requirements and implement additional generally accepted industry standards.\r\n\r\nChanges to this privacy policy\r\nWe reserve the right to modify this privacy policy at any time, so please review it frequently. Changes and clarifications will take effect immediately upon their posting on the website. If we make material changes to this policy, we will notify you here that it has been updated, so that you are aware of what information we collect, how we use it, and under what circumstances, if any, we use and/or disclose it.\r\n\r\nContact information\r\nIf you have questions, you can contact us at: contact@bootstrapmade.com', 'privacy');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `label`, `created_at`, `updated_at`) VALUES
(1, 'All Permission', NULL, '2021-02-27 01:59:13', '2021-02-27 01:59:13'),
(2, 'add-package', NULL, '2021-03-02 02:49:58', '2021-03-02 02:49:58'),
(3, 'edit-package', NULL, '2021-03-02 02:49:58', '2021-03-02 02:49:58'),
(4, 'view-package', NULL, '2021-03-02 02:49:58', '2021-03-02 02:49:58'),
(5, 'delete-package', NULL, '2021-03-02 02:49:58', '2021-03-02 02:49:58'),
(6, 'add-service', NULL, '2021-03-02 02:57:19', '2021-03-02 02:57:19'),
(7, 'edit-service', NULL, '2021-03-02 02:57:19', '2021-03-02 02:57:19'),
(8, 'view-service', NULL, '2021-03-02 02:57:19', '2021-03-02 02:57:19'),
(9, 'delete-service', NULL, '2021-03-02 02:57:19', '2021-03-02 02:57:19'),
(10, 'add-contactus', NULL, '2021-03-04 02:11:55', '2021-03-04 02:11:55'),
(11, 'edit-contactus', NULL, '2021-03-04 02:11:55', '2021-03-04 02:11:55'),
(12, 'view-contactus', NULL, '2021-03-04 02:11:55', '2021-03-04 02:11:55'),
(13, 'delete-contactus', NULL, '2021-03-04 02:11:55', '2021-03-04 02:11:55'),
(14, 'add-company', NULL, '2021-03-04 04:41:20', '2021-03-04 04:41:20'),
(15, 'edit-company', NULL, '2021-03-04 04:41:20', '2021-03-04 04:41:20'),
(16, 'view-company', NULL, '2021-03-04 04:41:20', '2021-03-04 04:41:20'),
(17, 'delete-company', NULL, '2021-03-04 04:41:20', '2021-03-04 04:41:20'),
(18, 'add-subscription', NULL, '2021-03-04 05:04:46', '2021-03-04 05:04:46'),
(19, 'edit-subscription', NULL, '2021-03-04 05:04:46', '2021-03-04 05:04:46'),
(20, 'view-subscription', NULL, '2021-03-04 05:04:46', '2021-03-04 05:04:46'),
(21, 'delete-subscription', NULL, '2021-03-04 05:04:46', '2021-03-04 05:04:46'),
(22, 'add-manager', NULL, '2021-03-04 05:15:47', '2021-03-04 05:15:47'),
(23, 'edit-manager', NULL, '2021-03-04 05:15:47', '2021-03-04 05:15:47'),
(24, 'view-manager', NULL, '2021-03-04 05:15:47', '2021-03-04 05:15:47'),
(25, 'delete-manager', NULL, '2021-03-04 05:15:47', '2021-03-04 05:15:47'),
(26, 'add-caretaker', NULL, '2021-03-10 05:23:30', '2021-03-10 05:23:30'),
(27, 'edit-caretaker', NULL, '2021-03-10 05:23:30', '2021-03-10 05:23:30'),
(28, 'view-caretaker', NULL, '2021-03-10 05:23:30', '2021-03-10 05:23:30'),
(29, 'delete-caretaker', NULL, '2021-03-10 05:23:30', '2021-03-10 05:23:30'),
(30, 'add-consumer', NULL, '2021-03-10 05:30:14', '2021-03-10 05:30:14'),
(31, 'edit-consumer', NULL, '2021-03-10 05:30:14', '2021-03-10 05:30:14'),
(32, 'view-consumer', NULL, '2021-03-10 05:30:14', '2021-03-10 05:30:14'),
(33, 'delete-consumer', NULL, '2021-03-10 05:30:14', '2021-03-10 05:30:14'),
(34, 'add-facility', NULL, '2021-03-10 05:39:58', '2021-03-10 05:39:58'),
(35, 'edit-facility', NULL, '2021-03-10 05:39:58', '2021-03-10 05:39:58'),
(36, 'view-facility', NULL, '2021-03-10 05:39:58', '2021-03-10 05:39:58'),
(37, 'delete-facility', NULL, '2021-03-10 05:39:58', '2021-03-10 05:39:58'),
(38, 'add-feedback', NULL, '2021-03-31 04:40:21', '2021-03-31 04:40:21'),
(39, 'edit-feedback', NULL, '2021-03-31 04:40:21', '2021-03-31 04:40:21'),
(40, 'view-feedback', NULL, '2021-03-31 04:40:21', '2021-03-31 04:40:21'),
(41, 'delete-feedback', NULL, '2021-03-31 04:40:21', '2021-03-31 04:40:21'),
(42, 'add-educationlevel', NULL, '2021-04-28 06:10:32', '2021-04-28 06:10:32'),
(43, 'edit-educationlevel', NULL, '2021-04-28 06:10:32', '2021-04-28 06:10:32'),
(44, 'view-educationlevel', NULL, '2021-04-28 06:10:32', '2021-04-28 06:10:32'),
(45, 'delete-educationlevel', NULL, '2021-04-28 06:10:32', '2021-04-28 06:10:32'),
(46, 'add-rentpayment', NULL, '2021-05-06 07:19:39', '2021-05-06 07:19:39'),
(47, 'edit-rentpayment', NULL, '2021-05-06 07:19:39', '2021-05-06 07:19:39'),
(48, 'view-rentpayment', NULL, '2021-05-06 07:19:39', '2021-05-06 07:19:39'),
(49, 'delete-rentpayment', NULL, '2021-05-06 07:19:39', '2021-05-06 07:19:39'),
(50, 'add-medication', NULL, '2021-05-06 07:24:39', '2021-05-06 07:24:39'),
(51, 'edit-medication', NULL, '2021-05-06 07:24:39', '2021-05-06 07:24:39'),
(52, 'view-medication', NULL, '2021-05-06 07:24:39', '2021-05-06 07:24:39'),
(53, 'delete-medication', NULL, '2021-05-06 07:24:39', '2021-05-06 07:24:39'),
(54, 'add-incidentreport', NULL, '2021-05-06 07:31:08', '2021-05-06 07:31:08'),
(55, 'edit-incidentreport', NULL, '2021-05-06 07:31:08', '2021-05-06 07:31:08'),
(56, 'view-incidentreport', NULL, '2021-05-06 07:31:08', '2021-05-06 07:31:08'),
(57, 'delete-incidentreport', NULL, '2021-05-06 07:31:08', '2021-05-06 07:31:08'),
(58, 'add-rentsource', NULL, '2021-06-03 01:50:42', '2021-06-03 01:50:42'),
(59, 'edit-rentsource', NULL, '2021-06-03 01:50:42', '2021-06-03 01:50:42'),
(60, 'view-rentsource', NULL, '2021-06-03 01:50:42', '2021-06-03 01:50:42'),
(61, 'delete-rentsource', NULL, '2021-06-03 01:50:42', '2021-06-03 01:50:42'),
(62, 'add-mdocagent', NULL, '2021-06-03 01:51:14', '2021-06-03 01:51:14'),
(63, 'edit-mdocagent', NULL, '2021-06-03 01:51:14', '2021-06-03 01:51:14'),
(64, 'view-mdocagent', NULL, '2021-06-03 01:51:14', '2021-06-03 01:51:14'),
(65, 'delete-mdocagent', NULL, '2021-06-03 01:51:14', '2021-06-03 01:51:14'),
(66, 'add-consumertype', NULL, '2021-06-03 01:51:45', '2021-06-03 01:51:45'),
(67, 'edit-consumertype', NULL, '2021-06-03 01:51:45', '2021-06-03 01:51:45'),
(68, 'view-consumertype', NULL, '2021-06-03 01:51:45', '2021-06-03 01:51:45'),
(69, 'delete-consumertype', NULL, '2021-06-03 01:51:45', '2021-06-03 01:51:45'),
(70, 'add-jobtype', NULL, '2021-06-24 00:55:49', '2021-06-24 00:55:49'),
(71, 'edit-jobtype', NULL, '2021-06-24 00:55:49', '2021-06-24 00:55:49'),
(72, 'view-jobtype', NULL, '2021-06-24 00:55:49', '2021-06-24 00:55:49'),
(73, 'delete-jobtype', NULL, '2021-06-24 00:55:49', '2021-06-24 00:55:49'),
(74, 'add-department', NULL, '2021-06-24 00:56:23', '2021-06-24 00:56:23'),
(75, 'edit-department', NULL, '2021-06-24 00:56:23', '2021-06-24 00:56:23'),
(76, 'view-department', NULL, '2021-06-24 00:56:23', '2021-06-24 00:56:23'),
(77, 'delete-department', NULL, '2021-06-24 00:56:23', '2021-06-24 00:56:23'),
(78, 'add-location', NULL, '2021-06-24 00:56:54', '2021-06-24 00:56:54'),
(79, 'edit-location', NULL, '2021-06-24 00:56:54', '2021-06-24 00:56:54'),
(80, 'view-location', NULL, '2021-06-24 00:56:54', '2021-06-24 00:56:54'),
(81, 'delete-location', NULL, '2021-06-24 00:56:54', '2021-06-24 00:56:54'),
(82, 'add-job', NULL, '2021-06-24 01:00:35', '2021-06-24 01:00:35'),
(83, 'edit-job', NULL, '2021-06-24 01:00:35', '2021-06-24 01:00:35'),
(84, 'view-job', NULL, '2021-06-24 01:00:35', '2021-06-24 01:00:35'),
(85, 'delete-job', NULL, '2021-06-24 01:00:35', '2021-06-24 01:00:35'),
(86, 'add-jobrequest', NULL, '2021-06-24 06:22:01', '2021-06-24 06:22:01'),
(87, 'edit-jobrequest', NULL, '2021-06-24 06:22:01', '2021-06-24 06:22:01'),
(88, 'view-jobrequest', NULL, '2021-06-24 06:22:01', '2021-06-24 06:22:01'),
(89, 'delete-jobrequest', NULL, '2021-06-24 06:22:01', '2021-06-24 06:22:01'),
(90, 'add-quiz', NULL, '2021-06-29 04:27:50', '2021-06-29 04:27:50'),
(91, 'edit-quiz', NULL, '2021-06-29 04:27:50', '2021-06-29 04:27:50'),
(92, 'view-quiz', NULL, '2021-06-29 04:27:50', '2021-06-29 04:27:50'),
(93, 'delete-quiz', NULL, '2021-06-29 04:27:50', '2021-06-29 04:27:50'),
(94, 'add-learningmanagement', NULL, '2021-07-07 11:49:11', '2021-07-07 11:49:11'),
(95, 'edit-learningmanagement', NULL, '2021-07-07 11:49:11', '2021-07-07 11:49:11'),
(96, 'view-learningmanagement', NULL, '2021-07-07 11:49:11', '2021-07-07 11:49:11'),
(97, 'delete-learningmanagement', NULL, '2021-07-07 11:49:11', '2021-07-07 11:49:11'),
(98, 'add-userassessment', NULL, '2021-07-07 17:16:19', '2021-07-07 17:16:19'),
(99, 'edit-userassessment', NULL, '2021-07-07 17:16:19', '2021-07-07 17:16:19'),
(100, 'view-userassessment', NULL, '2021-07-07 17:16:19', '2021-07-07 17:16:19'),
(101, 'delete-userassessment', NULL, '2021-07-07 17:16:19', '2021-07-07 17:16:19'),
(102, 'add-transporttracker', NULL, '2021-07-08 16:00:02', '2021-07-08 16:00:02'),
(103, 'edit-transporttracker', NULL, '2021-07-08 16:00:02', '2021-07-08 16:00:02'),
(104, 'view-transporttracker', NULL, '2021-07-08 16:00:02', '2021-07-08 16:00:02'),
(105, 'delete-transporttracker', NULL, '2021-07-08 16:00:02', '2021-07-08 16:00:02'),
(106, 'add-finance', NULL, '2021-07-09 18:21:47', '2021-07-09 18:21:47'),
(107, 'edit-finance', NULL, '2021-07-09 18:21:47', '2021-07-09 18:21:47'),
(108, 'view-finance', NULL, '2021-07-09 18:21:47', '2021-07-09 18:21:47'),
(109, 'delete-finance', NULL, '2021-07-09 18:21:47', '2021-07-09 18:21:47'),
(110, 'add-cognitivepsycological', NULL, '2021-08-23 17:27:27', '2021-08-23 17:27:27'),
(111, 'edit-cognitivepsycological', NULL, '2021-08-23 17:27:27', '2021-08-23 17:27:27'),
(112, 'view-cognitivepsycological', NULL, '2021-08-23 17:27:27', '2021-08-23 17:27:27'),
(113, 'delete-cognitivepsycological', NULL, '2021-08-23 17:27:27', '2021-08-23 17:27:27'),
(114, 'add-socialserviceeligibility', NULL, '2021-08-24 14:02:05', '2021-08-24 14:02:05'),
(115, 'edit-socialserviceeligibility', NULL, '2021-08-24 14:02:05', '2021-08-24 14:02:05'),
(116, 'view-socialserviceeligibility', NULL, '2021-08-24 14:02:05', '2021-08-24 14:02:05'),
(117, 'delete-socialserviceeligibility', NULL, '2021-08-24 14:02:05', '2021-08-24 14:02:05'),
(118, 'add-page', NULL, '2021-10-12 14:23:07', '2021-10-12 14:23:07'),
(119, 'edit-page', NULL, '2021-10-12 14:23:07', '2021-10-12 14:23:07'),
(120, 'view-page', NULL, '2021-10-12 14:23:07', '2021-10-12 14:23:07'),
(121, 'delete-page', NULL, '2021-10-12 14:23:07', '2021-10-12 14:23:07'),
(122, 'add-oursolution', NULL, '2021-10-12 15:56:10', '2021-10-12 15:56:10'),
(123, 'edit-oursolution', NULL, '2021-10-12 15:56:10', '2021-10-12 15:56:10'),
(124, 'view-oursolution', NULL, '2021-10-12 15:56:10', '2021-10-12 15:56:10'),
(125, 'delete-oursolution', NULL, '2021-10-12 15:56:10', '2021-10-12 15:56:10'),
(126, 'add-affordablecare', NULL, '2021-10-12 16:11:10', '2021-10-12 16:11:10'),
(127, 'edit-affordablecare', NULL, '2021-10-12 16:11:10', '2021-10-12 16:11:10'),
(128, 'view-affordablecare', NULL, '2021-10-12 16:11:10', '2021-10-12 16:11:10'),
(129, 'delete-affordablecare', NULL, '2021-10-12 16:11:10', '2021-10-12 16:11:10'),
(130, 'add-providesyourcare', NULL, '2021-10-12 16:40:51', '2021-10-12 16:40:51'),
(131, 'edit-providesyourcare', NULL, '2021-10-12 16:40:51', '2021-10-12 16:40:51'),
(132, 'view-providesyourcare', NULL, '2021-10-12 16:40:51', '2021-10-12 16:40:51'),
(133, 'delete-providesyourcare', NULL, '2021-10-12 16:40:51', '2021-10-12 16:40:51'),
(134, 'add-resource', NULL, '2021-10-12 16:53:21', '2021-10-12 16:53:21'),
(135, 'edit-resource', NULL, '2021-10-12 16:53:21', '2021-10-12 16:53:21'),
(136, 'view-resource', NULL, '2021-10-12 16:53:21', '2021-10-12 16:53:21'),
(137, 'delete-resource', NULL, '2021-10-12 16:53:21', '2021-10-12 16:53:21'),
(138, 'add-leadership', NULL, '2021-10-12 17:02:25', '2021-10-12 17:02:25'),
(139, 'edit-leadership', NULL, '2021-10-12 17:02:25', '2021-10-12 17:02:25'),
(140, 'view-leadership', NULL, '2021-10-12 17:02:25', '2021-10-12 17:02:25'),
(141, 'delete-leadership', NULL, '2021-10-12 17:02:25', '2021-10-12 17:02:25'),
(142, 'add-newsandevent', NULL, '2021-10-12 17:12:43', '2021-10-12 17:12:43'),
(143, 'edit-newsandevent', NULL, '2021-10-12 17:12:43', '2021-10-12 17:12:43'),
(144, 'view-newsandevent', NULL, '2021-10-12 17:12:43', '2021-10-12 17:12:43'),
(145, 'delete-newsandevent', NULL, '2021-10-12 17:12:43', '2021-10-12 17:12:43'),
(146, 'add-faq', NULL, '2021-10-12 17:22:02', '2021-10-12 17:22:02'),
(147, 'edit-faq', NULL, '2021-10-12 17:22:02', '2021-10-12 17:22:02'),
(148, 'view-faq', NULL, '2021-10-12 17:22:02', '2021-10-12 17:22:02'),
(149, 'delete-faq', NULL, '2021-10-12 17:22:02', '2021-10-12 17:22:02'),
(150, 'add-getquotenow', NULL, '2021-10-12 17:32:21', '2021-10-12 17:32:21'),
(151, 'edit-getquotenow', NULL, '2021-10-12 17:32:21', '2021-10-12 17:32:21'),
(152, 'view-getquotenow', NULL, '2021-10-12 17:32:21', '2021-10-12 17:32:21'),
(153, 'delete-getquotenow', NULL, '2021-10-12 17:32:21', '2021-10-12 17:32:21'),
(154, 'add-askaquestion', NULL, '2021-10-12 17:41:03', '2021-10-12 17:41:03'),
(155, 'edit-askaquestion', NULL, '2021-10-12 17:41:03', '2021-10-12 17:41:03'),
(156, 'view-askaquestion', NULL, '2021-10-12 17:41:03', '2021-10-12 17:41:03'),
(157, 'delete-askaquestion', NULL, '2021-10-12 17:41:03', '2021-10-12 17:41:03');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(2, 1),
(3, 1),
(4, 1),
(5, 1),
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
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(111, 1),
(112, 1),
(113, 1),
(114, 1),
(115, 1),
(116, 1),
(117, 1),
(118, 1),
(119, 1),
(120, 1),
(121, 1),
(122, 1),
(123, 1),
(124, 1),
(125, 1),
(126, 1),
(127, 1),
(128, 1),
(129, 1),
(130, 1),
(131, 1),
(132, 1),
(133, 1),
(134, 1),
(135, 1),
(136, 1),
(137, 1),
(138, 1),
(139, 1),
(140, 1),
(141, 1),
(142, 1),
(143, 1),
(144, 1),
(145, 1),
(146, 1),
(147, 1),
(148, 1),
(149, 1),
(150, 1),
(151, 1),
(152, 1),
(153, 1),
(154, 1),
(155, 1),
(156, 1),
(157, 1),
(2, 2),
(3, 2),
(4, 2),
(16, 2),
(40, 2),
(41, 2),
(42, 2),
(43, 2),
(44, 2),
(119, 2),
(120, 2),
(123, 2),
(124, 2),
(127, 2),
(128, 2),
(131, 2),
(132, 2),
(135, 2),
(136, 2),
(139, 2),
(140, 2),
(142, 2),
(143, 2),
(144, 2),
(146, 2),
(147, 2),
(148, 2),
(151, 2),
(152, 2),
(154, 2),
(155, 2),
(156, 2),
(22, 3),
(24, 3),
(25, 3),
(26, 3),
(27, 3),
(28, 3),
(29, 3),
(30, 3),
(31, 3),
(32, 3),
(34, 3),
(35, 3),
(36, 3),
(37, 3),
(40, 3),
(41, 3),
(46, 3),
(47, 3),
(48, 3),
(49, 3),
(50, 3),
(51, 3),
(52, 3),
(53, 3),
(54, 3),
(55, 3),
(56, 3),
(57, 3),
(106, 3),
(108, 3),
(109, 3),
(110, 3),
(111, 3),
(112, 3),
(113, 3),
(114, 3),
(115, 3),
(116, 3),
(117, 3),
(30, 4),
(31, 4),
(32, 4),
(50, 4),
(51, 4),
(52, 4),
(54, 4),
(55, 4),
(56, 4),
(102, 4),
(103, 4),
(104, 4),
(105, 4),
(110, 4),
(112, 4),
(113, 4),
(114, 4),
(116, 4),
(117, 4),
(92, 5),
(96, 5),
(26, 6),
(27, 6),
(28, 6),
(30, 6),
(31, 6),
(32, 6),
(34, 6),
(35, 6),
(36, 6),
(46, 6),
(47, 6),
(48, 6),
(49, 6),
(50, 6),
(51, 6),
(52, 6),
(53, 6),
(54, 6),
(55, 6),
(56, 6),
(57, 6),
(102, 6),
(104, 6),
(105, 6),
(106, 6),
(107, 6),
(108, 6),
(109, 6),
(110, 6),
(111, 6),
(112, 6),
(113, 6),
(114, 6),
(115, 6),
(116, 6),
(117, 6),
(84, 8),
(46, 9),
(47, 9),
(48, 9),
(49, 9),
(104, 9),
(105, 9),
(94, 10),
(95, 10),
(96, 10),
(97, 10);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nation_id_card` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `facility_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` int(191) DEFAULT NULL,
  `pic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `postal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `caretaker_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_exit_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `effective_leave_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thirty_day_notice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extension_granted` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ninty_day_extension` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_rent_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bed_hold_amount` int(191) DEFAULT NULL,
  `date_of_bedhold_reciept` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rent_source_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mdoc_agent_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `educationl_level_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `consumer_type_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bridge_card_eligible` text COLLATE utf8mb4_unicode_ci,
  `bridge_card_eligible_check` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gov_assistance_eligible` text COLLATE utf8mb4_unicode_ci,
  `gov_assistance_eligible_check` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `injury` text COLLATE utf8mb4_unicode_ci,
  `injury_check` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profiles_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `nation_id_card`, `user_id`, `facility_name`, `bio`, `gender`, `dob`, `age`, `pic`, `country`, `state`, `city`, `address`, `postal`, `company_name`, `phone`, `created_at`, `updated_at`, `caretaker_id`, `project_exit_date`, `effective_leave_date`, `thirty_day_notice`, `extension_granted`, `ninty_day_extension`, `monthly_rent_amount`, `entry_date`, `bed_hold_amount`, `date_of_bedhold_reciept`, `rent_source_id`, `mdoc_agent_id`, `educationl_level_id`, `consumer_type_id`, `bridge_card_eligible`, `bridge_card_eligible_check`, `gov_assistance_eligible`, `gov_assistance_eligible_check`, `injury`, `injury_check`, `notes`, `status`) VALUES
(1, NULL, 1, NULL, NULL, NULL, NULL, NULL, '', 'USA', NULL, 'New York', 'New York City', '75070', NULL, '05454534555', '2021-08-21 16:55:44', '2021-08-21 16:55:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, 2, NULL, NULL, NULL, NULL, NULL, '', 'USA', NULL, 'New York', 'New York City', '75070', NULL, '05454534555', '2021-08-21 16:55:44', '2021-08-21 16:55:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, 3, NULL, NULL, NULL, NULL, NULL, '', 'USA', NULL, 'New York', 'New York City', '75070', NULL, '05454534555', '2021-08-21 16:55:44', '2021-08-21 16:55:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, 123, NULL, NULL, NULL, NULL, NULL, 'profilePicture/dlu7yYUdLoJERwoGR1I1jYSjzlCt06Ccz9NNz7JK.jpeg', 'USA', NULL, 'New York', 'New York City', '75070', 'hist', '05454534555', '2021-08-21 16:55:44', '2021-10-09 04:10:30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '124356656', 124, NULL, NULL, NULL, '2021-08-18', NULL, 'profilePicture/dlu7yYUdLoJERwoGR1I1jYSjzlCt06Ccz9NNz7JK.jpeg', 'USA', NULL, 'New York', 'New York City', '75070', NULL, '92323023821', '2021-08-21 17:13:15', '2021-08-21 17:13:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '321117698054', 125, NULL, NULL, NULL, '2021-08-22', NULL, 'profilePicture/CUNTmiYxCQZRhXIEqfhlxffjjvq8bMW8mFDGnpdq.png', 'USA', NULL, 'New York', 'First Street, North Area', '75070', NULL, '92323023821', '2021-08-21 17:35:42', '2021-08-25 12:04:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '43546547675645', 126, 'F-Hist/500', NULL, NULL, '2021-08-13', NULL, 'profilePicture/mgGQcyqTkXZs8RcYWMG7PwtmNsvYgHdDrtEdViAO.jpeg', 'USA', NULL, 'New York', 'New York City', '323232', NULL, '92323023821', '2021-08-21 17:53:34', '2021-08-21 17:53:34', '125', '2021-08-26', '', '14/06/2021', '1', '2021-08-25', '120', '2021-08-13', 120, '14/06/2021', 'Carelink', 'MDOC', '4', '2', 'on', NULL, NULL, NULL, '', NULL, 'lOREM iPSUM DOLOR SIT', NULL),
(8, NULL, 127, NULL, NULL, 'male', NULL, NULL, 'profilePicture/mgGQcyqTkXZs8RcYWMG7PwtmNsvYgHdDrtEdViAO.jpeg', 'United States', 'Texas', 'Little elm', '2606 Shorpcrest Dr.', '75056', NULL, NULL, '2021-08-23 15:50:11', '2021-09-28 00:57:16', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, NULL, 128, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-23 16:09:49', '2021-08-23 16:09:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '5367862242445', 129, 'F-Hist/500', NULL, NULL, '2021-08-10', NULL, 'profilePicture/wNwEJ9FSgrjI91XPTWWUwMTLrovaAC2sMyHhasWw.png', 'USA', NULL, 'New York', 'New York City', '75070', NULL, '92323023821', '2021-08-24 18:01:33', '2021-08-24 18:01:33', '125', '2021-08-19', '', '14/06/2021', '1', '2021-08-19', '120', '2021-08-25', 120, '14/06/2021', 'Private Pay', 'MDOC', '4', '2', 'on', NULL, NULL, NULL, '', NULL, 'Lorem Ipsum dolor sit', NULL),
(11, '4214235634577', 130, 'F-Hist/500', NULL, NULL, '2021-08-20', NULL, 'profilePicture/lsl6wLjgGs91pAot21v2vBrq9ZgDiEopGSxO8P6n.png', 'USA', NULL, 'New York', 'New York City', '75070', NULL, '92323023821', '2021-08-24 18:22:39', '2021-08-24 18:22:39', '125', '2021-08-27', '', '2021-08-27', '1', '2021-08-20', '155', '2021-08-19', 155, '2021-08-27', 'Carelink', 'MDOC', '4', '3', 'on', NULL, NULL, NULL, '', NULL, 'Lorem Ipsum dolr sit', NULL),
(12, '543451232000', 131, NULL, NULL, NULL, '2021-08-12', NULL, 'profilePicture/dlu7yYUdLoJERwoGR1I1jYSjzlCt06Ccz9NNz7JK.jpeg', 'USA', NULL, 'New York', 'New York City', '75070', NULL, '923230277821', '2021-08-25 11:44:35', '2021-08-25 11:44:35', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '12324543565645654', 132, NULL, NULL, NULL, '2021-08-23', NULL, 'profilePicture/dlu7yYUdLoJERwoGR1I1jYSjzlCt06Ccz9NNz7JK.jpeg', 'USA', NULL, 'New York', 'New York City', '75070', NULL, '92323023821', '2021-08-25 11:50:13', '2021-08-25 11:50:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, NULL, 133, NULL, NULL, NULL, NULL, NULL, 'profilePicture/SRiAIsh6bp8UdJ6xjB7g0xbBUI118HuHlOhZIvVc.jpeg', 'USA', NULL, 'New York', 'New York City', '75070', NULL, '92323023821', '2021-08-25 18:09:46', '2021-08-25 18:09:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, NULL, 134, NULL, NULL, NULL, NULL, NULL, 'profilePicture/1nQ1ND4M2rOwdJnHOpOqRSoq6gvLy5USALIIrMHz.jpeg', 'United States', NULL, 'Little elm', '2605 Shorecrest Dr.', '75068', NULL, '3137337343', '2021-09-28 00:46:04', '2021-09-28 00:46:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, '645-775-434', 135, NULL, NULL, NULL, '2021-10-25', NULL, 'profilePicture/Zv7dUivPKwYRHcsN1032IR8Jsfn2IY5Pid5QkfAa.png', 'USA', NULL, 'New York', 'New York City', '75070', 'Hist', '+355 65646565', '2021-10-09 05:11:28', '2021-10-09 05:11:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, NULL, 136, NULL, NULL, NULL, NULL, NULL, 'profilePicture/S46Jg0UJfLqqXGJpuBsnpdkw95CUB4QPAEjpkT9p.png', 'USA', NULL, 'California City', 'Detriot, New City Area', '03949', 'Free Trail Company', '35945945494', '2021-10-12 03:01:31', '2021-10-12 03:01:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, NULL, 137, NULL, NULL, NULL, NULL, NULL, 'profilePicture/j3KHE2dBldcAAGuO0Fh5lAGZ0H1qhLxTVXCB3q3b.png', 'USA', NULL, 'Calfornia', 'Detriot, New City Area', '39444', 'Free Trail Company', '3454554544', '2021-10-12 03:04:39', '2021-10-12 03:04:39', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, NULL, 138, NULL, NULL, NULL, NULL, NULL, 'profilePicture/epwrWWHW6h4gFtqkPAqOAXfqeHj8qhILjjedwy62.png', 'USA', NULL, 'New York', 'Detriot, New City Area', '75467', 'Paid Company 200', '33843438484', '2021-10-12 03:07:40', '2021-10-12 03:07:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, NULL, 139, NULL, NULL, NULL, NULL, NULL, 'profilePicture/9m6xyAdQvAfQhVFDUwjs9CCphsIBE6yrQ5jVv3tt.jpeg', 'Vacaville, CA', NULL, 'New York', 'Detriot, New City Area', '75467', 'Custom Package Company', '4944545403', '2021-10-12 03:30:52', '2021-10-12 03:30:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, '324-534-456', 140, 'F-Hist/500', NULL, NULL, '2021-10-18', NULL, 'profilePicture/2AyqwydFXpsLY3AiOcYDleFAl1MgisbXrHOs9nQO.png', 'USA', NULL, 'New York', 'Detriot, New City Area', '75467', '', '3453443534453', '2021-10-18 15:43:02', '2021-10-18 15:58:56', '125', '2021-10-06', '', '2021-10-15', 'on', '2021-10-28', '654', '', 564, '2021-11-04', 'SSI', 'MDOC', '4', 'New Resident Type', 'Bridge Notes', '', '', NULL, 'Injury', '', 'NOPtes', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `provides_your_cares`
--

DROP TABLE IF EXISTS `provides_your_cares`;
CREATE TABLE IF NOT EXISTS `provides_your_cares` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provides_your_cares`
--

INSERT INTO `provides_your_cares` (`id`, `created_at`, `updated_at`, `deleted_at`, `image`, `number`, `description`, `heading`) VALUES
(1, '2021-10-12 16:45:28', '2021-10-12 16:45:28', NULL, 'image/2lSSCcyYbsdhlm9nmNqhWvPPDpY2yHgEEUCFnOJG.png', '400+', '<p>HOME CARE AGENCIES</p>', NULL),
(2, '2021-10-12 16:45:53', '2021-10-12 16:45:53', NULL, 'image/so7LPDNOY9qq1u5GYQoN9eKuTkyTaE93BLakuDP8.png', '600+', '<p>CAREGIVERS</p>', NULL),
(3, '2021-10-12 16:46:17', '2021-10-12 16:46:17', NULL, 'image/sgCFL6ClKcyODyK7vyQ7NHwN2eOm4xhbmws7AVuE.png', '300+', '<p>HOURS OF CARE</p>', NULL),
(4, '2021-10-12 16:46:47', '2021-10-12 16:46:47', NULL, 'image/Cl74WFdd7JSeDgaFq3ir5hCTvgs1GdD7PctkGoFm.png', '$6 million', '<p>OF HOME CARE ANNUALLY</p>', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

DROP TABLE IF EXISTS `quizzes`;
CREATE TABLE IF NOT EXISTS `quizzes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lms_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `question_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option` longtext COLLATE utf8mb4_unicode_ci,
  `correct_answer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rent_payments`
--

DROP TABLE IF EXISTS `rent_payments`;
CREATE TABLE IF NOT EXISTS `rent_payments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `consumer_id` int(11) DEFAULT NULL,
  `rent_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bed_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recieved_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `company_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rent_payments`
--

INSERT INTO `rent_payments` (`id`, `created_at`, `updated_at`, `deleted_at`, `consumer_id`, `rent_date`, `bed_amount`, `actual_amount`, `recieved_amount`, `due_amount`, `added_by`, `company_id`, `status`) VALUES
(1, '2021-08-21 19:00:05', '2021-08-21 19:00:05', NULL, 126, '2021-08-06', '120', '120', '112', '8', 123, '13', '1'),
(2, '2021-08-21 19:00:27', '2021-08-21 19:00:27', NULL, 126, '2021-08-20', '23', '23', '1', '22', 123, '13', '1'),
(3, '2021-08-23 16:10:29', '2021-08-23 16:10:29', NULL, 126, '2021-08-20', '12', '12', '2', '10', 127, '13', '1'),
(4, '2021-08-24 18:44:53', '2021-08-24 18:44:53', NULL, 129, '2021-08-19', '109', '109', '23', '86', 124, '1', '1'),
(5, '2021-08-24 19:03:21', '2021-10-01 02:16:13', '2021-10-01 02:16:13', 130, '2021-08-20', '11', '11', '2', '9', 123, '13', '1'),
(6, '2021-08-24 19:11:56', '2021-08-24 19:11:56', NULL, 130, '2021-08-07', '55', '55', '34', '21', 127, '13', '1'),
(7, '2021-08-24 19:45:12', '2021-08-24 19:45:12', NULL, 129, '2021-08-07', '65', '65', '44', '21', 127, '13', '1');

-- --------------------------------------------------------

--
-- Table structure for table `rent_sources`
--

DROP TABLE IF EXISTS `rent_sources`;
CREATE TABLE IF NOT EXISTS `rent_sources` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rent_sources`
--

INSERT INTO `rent_sources` (`id`, `created_at`, `updated_at`, `deleted_at`, `name`, `status`) VALUES
(1, NULL, NULL, NULL, 'Carelink', '1'),
(2, NULL, NULL, NULL, 'MDOC', '1'),
(3, NULL, NULL, NULL, 'PCS', '1'),
(4, NULL, NULL, NULL, 'Private Pay', '1'),
(5, NULL, NULL, NULL, 'SSI', '1');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

DROP TABLE IF EXISTS `resources`;
CREATE TABLE IF NOT EXISTS `resources` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `created_at`, `updated_at`, `deleted_at`, `title`, `description`, `image`) VALUES
(1, '2021-10-12 16:58:51', '2021-10-12 16:58:51', NULL, 'LOREM IPSUM DOLOR', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</p>', 'image/sVG7p3tnmwg3PJDBHasqqxBKFWjonamjTPO9AgkH.png'),
(2, '2021-10-12 16:59:16', '2021-10-12 16:59:16', NULL, 'LOREM IPSUM DOLOR', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</p>', 'image/NM7igCwGGZPIxmWKKfL15B3LXZpqybU9YY8FVxDz.png');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `label`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, '2021-02-27 01:59:13', '2021-02-27 01:59:13'),
(2, 'user', NULL, '2021-02-27 01:59:13', '2021-02-27 01:59:13'),
(3, 'company', NULL, '2021-03-02 03:00:11', '2021-03-02 03:00:11'),
(4, 'caretaker', NULL, '2021-03-02 03:01:19', '2021-03-02 03:01:19'),
(5, 'consumer', NULL, '2021-03-02 03:01:38', '2021-03-02 03:01:38'),
(6, 'manager', NULL, '2021-03-10 05:03:38', '2021-03-10 05:03:38'),
(7, 'guest', NULL, '2021-03-24 23:26:33', '2021-03-24 23:26:33'),
(8, 'lms', NULL, '2021-06-29 03:09:51', '2021-06-29 03:09:51'),
(9, 'finance', NULL, '2021-07-08 19:15:04', '2021-07-08 19:15:04'),
(10, 'career', NULL, '2021-07-14 06:46:06', '2021-07-14 06:46:06');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE IF NOT EXISTS `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`user_id`),
  KEY `role_user_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`) VALUES
(1, 1),
(2, 2),
(7, 3),
(3, 123),
(6, 124),
(4, 125),
(5, 126),
(9, 127),
(9, 128),
(5, 129),
(5, 130),
(4, 131),
(4, 132),
(3, 133),
(3, 134),
(6, 135),
(3, 136),
(3, 137),
(3, 138),
(3, 139),
(5, 140);

-- --------------------------------------------------------

--
-- Table structure for table `social_accounts`
--

DROP TABLE IF EXISTS `social_accounts`;
CREATE TABLE IF NOT EXISTS `social_accounts` (
  `user_id` int(11) NOT NULL,
  `provider_user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_services`
--

DROP TABLE IF EXISTS `social_services`;
CREATE TABLE IF NOT EXISTS `social_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `status` varchar(191) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_services`
--

INSERT INTO `social_services` (`id`, `created_at`, `updated_at`, `deleted_at`, `name`, `status`) VALUES
(1, '2021-08-24 16:26:44', '2021-08-24 16:26:44', NULL, 'Medical Insurance', '1'),
(2, '2021-08-24 16:26:44', '2021-08-24 16:26:44', NULL, 'Mental Health Insurance', '1'),
(3, '2021-08-24 16:30:40', '2021-08-24 16:30:40', NULL, 'Medicare/Medicaid', '1'),
(4, '2021-08-24 16:31:24', '2021-08-24 16:31:24', NULL, 'Social Security Disability', '1'),
(5, '2021-08-24 16:32:09', '2021-08-24 16:32:09', NULL, 'Supplemental Security Income', '1'),
(6, '2021-08-24 16:33:01', '2021-08-24 16:33:01', NULL, 'Vetran\'s Administration', '1');

-- --------------------------------------------------------

--
-- Table structure for table `social_service_eligibilities`
--

DROP TABLE IF EXISTS `social_service_eligibilities`;
CREATE TABLE IF NOT EXISTS `social_service_eligibilities` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `consumer_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eligibility` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_service_eligibilities`
--

INSERT INTO `social_service_eligibilities` (`id`, `created_at`, `updated_at`, `deleted_at`, `consumer_id`, `eligibility`, `status`) VALUES
(1, '2021-08-24 15:53:31', '2021-08-24 15:53:31', NULL, '126', 'Medical Insurance,Mental Health Insurance,Medicare/Medicaid', '1');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `roleId` int(11) DEFAULT NULL,
  `subscription_type_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` text COLLATE utf8mb4_unicode_ci,
  `receipt_url` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `created_at`, `updated_at`, `deleted_at`, `roleId`, `subscription_type_id`, `name`, `duration`, `price`, `date`, `token`, `customer_id`, `receipt_url`, `email`) VALUES
(1, '2021-08-21 16:55:43', '2021-08-21 16:55:43', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'cus_K5CZQJfqpwU17J', 'https://pay.stripe.com/receipts/acct_1IwCsLHvXmO4xH0s/ch_3JR2ACHvXmO4xH0s00Mi29S6/rcpt_K5CZ5j0LSPTbRttsUWTv3GZWU8rkVdm', 'hist@yopmail.com'),
(2, '2021-08-25 18:09:46', '2021-08-25 18:09:46', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'cus_K6ifGb1BEmCtf2', 'https://pay.stripe.com/receipts/acct_1IwCsLHvXmO4xH0s/ch_3JSVE2HvXmO4xH0s17iPg8mq/rcpt_K6iflRAiF5U8B0I0RueSVurZ1MX1Km8', 'imcs@yopmail.com'),
(3, '2021-09-28 00:46:03', '2021-09-28 00:46:03', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'cus_KJ0rEkm0EOgeGq', 'https://pay.stripe.com/receipts/acct_1IwCsLHvXmO4xH0s/ch_3JeOpwHvXmO4xH0s1dPjVdXc/rcpt_KJ0reZ98WIu2HGPm0PqGebW5BiI8mMR', 'opat.jgreen@gmail.com'),
(4, '2021-10-12 03:07:40', '2021-10-12 03:07:40', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'cus_KOIJczLlr3dcOr', 'https://pay.stripe.com/receipts/acct_1IwCsLHvXmO4xH0s/ch_3JjVifHvXmO4xH0s10eL4YQr/rcpt_KOIJDDYYsFc1XIAp0z57ZDOXPfU1BW5', 'paidcompnay@yopmail.com'),
(5, '2021-10-12 03:30:52', '2021-10-12 03:30:52', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'cus_KOIgAq5Oh2mIXH', 'https://pay.stripe.com/receipts/acct_1IwCsLHvXmO4xH0s/ch_3JjW56HvXmO4xH0s0YjUL6Le/rcpt_KOIgBqG9zLCt4QsUwqpPMRRXnVGF8nr', 'custompackage@yopmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `transport_trackers`
--

DROP TABLE IF EXISTS `transport_trackers`;
CREATE TABLE IF NOT EXISTS `transport_trackers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `consumer_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `consumer_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pickup` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drop_off` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `milleage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `distance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `added_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purpose` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transport_trackers`
--

INSERT INTO `transport_trackers` (`id`, `created_at`, `updated_at`, `deleted_at`, `consumer_id`, `consumer_name`, `pickup`, `drop_off`, `amount`, `time`, `milleage`, `notes`, `distance`, `added_by`, `purpose`, `status`) VALUES
(1, '2021-08-23 16:12:27', '2021-08-23 16:12:27', NULL, '1', 'histResident1', 'New York, NY, USA', 'Chicago, IL, USA', '3952.3', '12 hours 10 mins', '790.46742026565', 'Lorem Ipsum dolor sit is a fixed text', NULL, '125', 'Customer Visit', '1'),
(2, '2021-08-24 19:48:46', '2021-08-24 19:48:46', NULL, '3', 'Hist Resident3', 'Seattle, WA, USA', 'San Francisco, CA, USA', '4038.4', '12 hours 30 mins', '807.68375188897', 'Lorem Ipsum dolor sit', NULL, '124', 'Customer Visit', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT '1' COMMENT '1-active,2-banned',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `view_password`, `provider_id`, `provider`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin@developer.com', '$2y$10$YiOBF722/RvZhk1oeHbkguTAIYd4tgu0yipcRNsA5J8A28RULNsqq', NULL, NULL, NULL, 1, NULL, '2021-02-27 01:59:13', '2021-07-09 19:37:25', NULL),
(2, 'User', 'admin@opat.com', '$2y$10$6HBI01T4tdD2mNMYPz1kYOZEs.OGFMSB.guHoD87mjFy.wbKLYoCy', NULL, NULL, NULL, 1, NULL, '2021-02-27 01:59:13', '2021-02-27 01:59:13', NULL),
(3, 'Guest', 'guest@opat.com', '$2y$10$Wq6OlYbVVbiRgUw1nvpdTuqFLb6Lmr4Nu2j8HckwAgANzN1uEoXmO', NULL, NULL, NULL, 1, NULL, '2021-03-31 03:44:27', '2021-03-31 03:44:27', NULL),
(123, 'Hist', 'hist@yopmail.com', '$2y$10$LjQumXZhyzWjq7j9PO3g2.yHcy/LVOB.TKD5QnG8awhoF6drLmrQ.', '123456', NULL, NULL, 1, NULL, '2021-08-21 16:55:44', '2021-08-21 17:08:37', NULL),
(124, 'HistManager1', 'histmanager1@yopmail.com', '$2y$10$b7DBEDMSNSlB0f0hYwIytuNj6QBHZX1XCMsxp4eP48G0g8yH/z8d.', '123456', NULL, NULL, 1, NULL, '2021-08-21 17:13:15', '2021-08-21 17:13:15', NULL),
(125, 'Hist Caretaker1', 'histcaretaker1@yopmail.com', '$2y$10$4esj5X0jGhJLg9RcEKtVe.kWMz/LC/qYMweZU7Yy/iMK3.3luoyjy', '123456', NULL, NULL, 1, NULL, '2021-08-21 17:35:42', '2021-08-25 12:04:19', NULL),
(126, 'histResident1', 'histresident1@yopmail.com', '$2y$10$.wvUCGJpyYcYlCIvPUru4erzKRCXFSUl0jf3rM4pSEbCoNUuY1CKO', '123456', NULL, NULL, 1, NULL, '2021-08-21 17:53:34', '2021-08-21 17:53:34', NULL),
(127, 'Hist Finance', 'histfinance1@yopmail.com', '$2y$10$QfzK0zfqS0j7J7q/JzHNrOS8qs9PqJgLm4VQfgHB0Rm6hSQO5ohlm', NULL, NULL, NULL, 1, NULL, '2021-08-23 15:50:11', '2021-08-23 15:50:11', NULL),
(128, 'IMCS', 'imcs1@yopmail.com', '$2y$10$rNLOhDKvJXaBh3uIkCrGqehukIrWEkWTW6pQ4fmLoDT9MD0GFPkDS', NULL, NULL, NULL, 1, NULL, '2021-08-23 16:09:49', '2021-08-23 16:09:49', NULL),
(129, 'Hist Resident2', 'histresident2@yopmail.com', '$2y$10$/gl36LvXxgPheK1aMIZFl.BHvZw298syn9g9crjKEgPmWSvNrj5dK', '123456', NULL, NULL, 1, NULL, '2021-08-24 18:01:33', '2021-08-24 18:01:33', NULL),
(130, 'Hist Resident3', 'histresident3@yopmail.com', '$2y$10$EzMj595YaOt8duyd.JmJy.3GOROrrNI2WPqXINUg9VVYvwS3Kb1gu', '123456', NULL, NULL, 1, NULL, '2021-08-24 18:22:39', '2021-08-24 18:22:39', NULL),
(131, 'Hist Caretaker2', 'histcaretaker2@yopmail.com', '$2y$10$ioUUPuQ5SbqkG95tXrzSaeqfvcUFIxW7DOaufSDrgESF4E5ld3ObC', '123456', NULL, NULL, 1, NULL, '2021-08-25 11:44:35', '2021-08-25 11:44:35', NULL),
(132, 'Hist Caretaker3', 'histcaretaker3@yopmail.com', '$2y$10$qoPwbai2sF/C/HQ/X0I4EOv30uINpaefIlaX6FceyXz5Xj.aFl5ye', '123456', NULL, NULL, 1, NULL, '2021-08-25 11:50:13', '2021-08-25 11:50:13', NULL),
(133, 'IMCS', 'imcs@yopmail.com', '$2y$10$825bLvqNNn8S3iG2PV.J8u4.1SYe0cHWKnVdySed/TAeAvejO6D9S', '123456', NULL, NULL, 1, NULL, '2021-08-25 18:09:46', '2021-08-25 18:09:46', NULL),
(134, 'v-jagre@microsoft.com', 'opat.jgreen@gmail.com', '$2y$10$UN2OpfnB9BQk58zS7QYQ3uo3veBzh3susL2qHAbdTBsJ/07abrtea', 'logan2015', NULL, NULL, 1, NULL, '2021-09-28 00:46:04', '2021-09-28 00:46:04', NULL),
(135, 'DETRION Manger', 'dm@yopmail.com', '$2y$10$ptz5PYWApzBj.eXuLacRlOPLUgLIpoXfZcYw.jZtM5C/PIiSfudIm', '123456', NULL, NULL, 1, NULL, '2021-10-09 05:11:28', '2021-10-09 05:11:28', NULL),
(136, 'freetrail', 'freetrail@yopmail.com', '$2y$10$9AfLlarz73lHn6BA0e.z6.w0Pv84FuYdarknbyX3iBp/xqJWpOSHe', '123456', NULL, NULL, 1, NULL, '2021-10-12 03:01:31', '2021-10-12 03:01:31', NULL),
(137, 'freetrail', 'freetail@yopmail.com', '$2y$10$DpNuB1G8efqL6YNgOttmieLhnAsDwZeRoU/W4ZSpVAnkUSKu7RAGe', '123456', NULL, NULL, 1, NULL, '2021-10-12 03:04:39', '2021-10-12 03:04:39', NULL),
(138, 'Paid', 'paidcompnay@yopmail.com', '$2y$10$JcvmTrkuhEh3naFYsuUiHuCI80fK0Bx8GurFaTq3ICA1LMxZ.xlru', '123456', NULL, NULL, 1, NULL, '2021-10-12 03:07:40', '2021-10-12 03:07:40', NULL),
(139, 'Custom Package', 'custompackage@yopmail.com', '$2y$10$HNXrTqQAoDaceAjOmTGc1eVsqddz8IJaMPZ.9z1ZKDIw4gPLFkPa6', '123456', NULL, NULL, 0, NULL, '2021-10-12 03:30:52', '2021-10-12 03:30:52', NULL),
(140, 'Hist Resident4', 'histresident4@yopmail.com', '$2y$10$EOA47v3AtRM1TWDQ0Umsv.yUsYIF6gNonqK7ISyx4/TNPGKy/teH6', '123456', NULL, NULL, 1, NULL, '2021-10-18 15:43:02', '2021-10-18 15:58:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_assessments`
--

DROP TABLE IF EXISTS `user_assessments`;
CREATE TABLE IF NOT EXISTS `user_assessments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caretaker_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `yachts`
--

DROP TABLE IF EXISTS `yachts`;
CREATE TABLE IF NOT EXISTS `yachts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) DEFAULT NULL,
  `yacht_type_id` int(11) DEFAULT NULL,
  `charter_type_id` varchar(191) DEFAULT NULL,
  `cabins` varchar(191) DEFAULT NULL,
  `berths` varchar(191) DEFAULT NULL,
  `owner_email` varchar(191) DEFAULT NULL,
  `ship_owner` varchar(191) DEFAULT NULL,
  `company_full_address` text,
  `tax_number` varchar(191) DEFAULT NULL,
  `tax_office` varchar(191) DEFAULT NULL,
  `port_of_registry` varchar(191) DEFAULT NULL,
  `number_of_registry` varchar(191) DEFAULT NULL,
  `license_registry_number` varchar(191) DEFAULT NULL,
  `description` text,
  `background_image` varchar(191) DEFAULT NULL,
  `foreground_image` varchar(191) DEFAULT NULL,
  `search_result_image` varchar(191) DEFAULT NULL,
  `gallery_image` varchar(191) DEFAULT NULL,
  `embed_video_id` varchar(191) DEFAULT NULL,
  `specification_text` text,
  `specification_image` varchar(191) DEFAULT NULL,
  `loa` varchar(191) DEFAULT NULL,
  `beam` varchar(191) DEFAULT NULL,
  `draft` varchar(191) DEFAULT NULL,
  `sail_area` varchar(191) DEFAULT NULL,
  `engine` varchar(191) DEFAULT NULL,
  `fuel_tank` varchar(191) DEFAULT NULL,
  `water_tank` varchar(191) DEFAULT NULL,
  `base` text,
  `base_text` text,
  `people_capicity` varchar(191) DEFAULT NULL,
  `model` varchar(191) DEFAULT NULL,
  `built_year` varchar(191) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `yacht_availabilities`
--

DROP TABLE IF EXISTS `yacht_availabilities`;
CREATE TABLE IF NOT EXISTS `yacht_availabilities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(11) DEFAULT NULL,
  `company_id` varchar(191) DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `subject` varchar(191) DEFAULT NULL,
  `date` varchar(191) DEFAULT NULL,
  `comment` text,
  `notification` varchar(191) DEFAULT '1',
  `status` varchar(191) DEFAULT NULL,
  `is_deleted` varchar(11) DEFAULT 'false',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `yacht_availabilities`
--

INSERT INTO `yacht_availabilities` (`id`, `user_id`, `company_id`, `title`, `subject`, `date`, `comment`, `notification`, `status`, `is_deleted`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '124', '14', 'Rent Payment Collection', 'AFtab ', '2021-08-02', 'Lorem Ispum dolor sit Lorem Ispum dolor sit Lorem Ispum dolor sit', '0', NULL, 'false', '2021-08-31 20:28:01', '2021-08-31 15:28:01', NULL),
(2, '124', '13', 'Medication', 'Medication for Resident', '2021-09-02', 'LOrem Ipsum dolor sit', '0', NULL, 'true', '2021-08-31 20:28:01', '2021-08-31 15:28:01', NULL),
(3, '124', '14', 'Meeting with Resident', 'Meeting at 3pm with Hist resident', '2021-08-13', 'Lorem Ipsum dolor sit is new case', '0', NULL, 'false', '2021-08-31 20:28:01', '2021-08-31 15:28:01', NULL),
(4, '124', '14', 'Rent Payment Collection', 'Finance collect payment from Residents', '2021-08-05', 'Lorem Ipsum dolor sit', '0', NULL, 'false', '2021-08-31 20:28:01', '2021-08-31 15:28:01', NULL),
(5, '124', '14', 'Rent Payment Collection', 'Finance collect payment from Residents', '2021-08-05', 'Lorem Ipsum dolor sit', '0', NULL, 'false', '2021-08-31 20:28:01', '2021-08-31 15:28:01', NULL),
(6, '124', '14', 'Rent Payment Collection', 'Finance collect payment from Residents', '2021-08-05', 'Lorem Ipsum dolor sit', '0', NULL, 'false', '2021-08-31 20:28:01', '2021-08-31 15:28:01', NULL),
(7, '125', '14', 'Rent Payment Collection', 'Finance collect payment from Residents', '2021-08-11', 'Finance collect payment from Residents Finance collect payment from Residents', '0', NULL, 'false', '2021-08-31 20:28:01', '2021-08-31 15:28:01', NULL),
(8, '125', '14', 'Rent Payment Collection', 'Finance collect payment from Residents', '2021-08-05', 'Finance collect payment from Residents Finance collect payment from Residents', '0', NULL, 'false', '2021-08-31 20:28:01', '2021-08-31 15:28:01', NULL),
(9, '123', '14', 'Testing..', 'New Testing', '2021-08-17', 'Lorem Ipsum dolor sit', '0', NULL, 'false', '2021-08-31 20:28:01', '2021-08-31 15:28:01', NULL),
(10, '125', '14', 'abc', 'Lorem Ipsum', '2021-08-08', 'asasas', '0', NULL, 'false', '2021-08-31 20:28:01', '2021-08-31 15:28:01', NULL),
(11, '124', '14', 'Jhon', 'Lorem Ipsum', '2021-08-10', 'aSAFSDF', '0', NULL, 'false', '2021-08-31 20:28:01', '2021-08-31 15:28:01', NULL),
(12, '124', '14', 'Meeting', 'Meeting with company', '2021-08-12', 'Lorem Ipsum dolor sit', '0', NULL, 'false', '2021-08-31 20:28:01', '2021-08-31 15:28:01', NULL),
(13, '125', '14', 'Training', 'Training for caretakers', '2021-08-27', 'Training for caretakers Training for caretakers', '0', NULL, 'false', '2021-08-31 20:28:01', '2021-08-31 15:28:01', NULL),
(14, '124', '14', 'Incident Report', 'Incident Report Presentation for new users', '2021-08-23', 'Incident Report Presentation for new users', '0', NULL, 'false', '2021-08-31 20:28:01', '2021-08-31 15:28:01', NULL),
(15, '124', '14', 'Rent Payment Collection', 'Finance collect payment from Residents', '2021-08-31', 'Finance collect payment from Residents', '0', NULL, 'false', '2021-08-31 20:28:01', '2021-08-31 15:28:01', NULL),
(16, '124', '14', 'sam', 'Finance collect payment from Residents', '2021-09-06', 'Finance collect payment from Residents', '0', NULL, 'false', '2021-08-31 20:28:01', '2021-08-31 15:28:01', NULL),
(17, '124', '14', 'Rent Payment Collection', 'Finance collect payment from Residents', '2021-08-09', 'Finance collect payment from Residents', '0', NULL, 'false', '2021-08-31 20:28:01', '2021-08-31 15:28:01', NULL),
(18, '124', '14', 'Rent Payment Collection', 'Finance collect payment from Residents', '2021-09-04', 'Finance collect payment from Residents', '0', NULL, 'false', '2021-08-31 20:28:01', '2021-08-31 15:28:01', NULL),
(19, '125', '13', 'Rent Payment Collection', 'Lorem Ipsum', '2021-09-01', 'sdsdsd', '0', NULL, 'true', '2021-08-31 20:28:01', '2021-08-31 15:28:01', NULL),
(20, '125', '13', 'Rent Payment Collection', 'Finance collect payment from Residents', '2021-08-31', 'sddfg', '0', NULL, 'true', '2021-08-31 20:28:01', '2021-08-31 15:28:01', NULL),
(21, '125', '13', 'Rent Payment Collection', 'Lorem Ipsum', '2021-08-03', 'deg gfd', '0', NULL, 'true', '2021-08-31 20:28:01', '2021-08-31 15:28:01', NULL),
(22, '125', '13', 'Rent Payment Collection', 'Finance collect payment from Residents', '2021-08-24', 'Finance collect payment from Residents', '0', NULL, 'true', '2021-08-31 20:28:01', '2021-08-31 15:28:01', NULL),
(23, '125', '13', 'Rent Payment Collection', 'Finance collect payment from Residents', '2021-08-02', 'Finance collect payment from Residents', '0', NULL, 'true', '2021-08-31 20:28:01', '2021-08-31 15:28:01', NULL),
(24, '125', '13', 'Rent Payment Collection', 'Finance collect payment from Residents', '2021-08-02', 'Finance collect payment from Residents', '0', NULL, 'true', '2021-08-31 20:28:01', '2021-08-31 15:28:01', NULL),
(25, '123', '13', 'Testing..', 'New Testing', '2021-08-02', 'New Testing', '0', NULL, 'true', '2021-08-31 20:28:01', '2021-08-31 15:28:01', NULL),
(26, '123', '13', 'Testing..', 'New Testing', '2021-08-11', 'New Testing', '0', NULL, 'true', '2021-08-31 20:28:01', '2021-08-31 15:28:01', NULL),
(27, '125', '13', 'Testing..', 'New Testing', '2021-08-10', 'New Testing', '0', NULL, 'false', '2021-08-31 20:28:01', '2021-08-31 15:28:01', NULL),
(28, '124', '13', 'Rent Payment Collection', 'Finance collect payment from Residents', '2021-08-30', 'Finance collect payment from Residents', '0', NULL, 'false', '2021-09-30 05:17:04', '2021-09-30 11:17:04', NULL),
(29, '124', '13', 'Medication', 'Medication for Resident', '2021-09-16', 'Medication for Resident', '0', NULL, 'false', '2021-08-31 20:28:01', '2021-08-31 15:28:01', NULL),
(30, '125', '13', 'Rent Payment', 'Finance collect payment from Residents', '2021-09-14', 'Finance collect payment from Residents', '0', NULL, 'false', '2021-09-30 05:16:54', '2021-09-30 11:16:54', NULL),
(31, '124', '13', 'Rent Payment', 'Finance collect payment from Residents', '2021-10-05', 'Lorem Ipsum dolor sit', '0', NULL, 'false', '2021-10-11 18:14:35', '2021-10-12 00:14:35', NULL),
(32, '124', '13', 'Finance Collection', 'Finance collect payment from Residents', '2021-10-13', 'Lorem Ispum dolor sit Lorem Ispum dolor sit Lorem Ispum dolor sit', '0', NULL, 'false', '2021-10-11 18:13:44', '2021-10-12 00:13:44', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `FK_companies` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
