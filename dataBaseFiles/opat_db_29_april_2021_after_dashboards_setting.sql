/*
SQLyog Ultimate v8.61 
MySQL - 5.5.5-10.4.13-MariaDB : Database - devcusto_opat
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`devcusto_opat` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `devcusto_opat`;

/*Table structure for table `activity_log` */

DROP TABLE IF EXISTS `activity_log`;

CREATE TABLE `activity_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `log_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` int(11) DEFAULT NULL,
  `causer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `properties` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activity_log_log_name_index` (`log_name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `activity_log` */

insert  into `activity_log`(`id`,`log_name`,`description`,`subject_id`,`subject_type`,`causer_id`,`causer_type`,`properties`,`created_at`,`updated_at`) values (1,'User','LoggedOut',2,'App\\User',2,'App\\User','[]','2021-04-29 00:07:21','2021-04-29 00:07:21'),(2,'HIST','LoggedOut',38,'App\\User',38,'App\\User','[]','2021-04-29 00:21:04','2021-04-29 00:21:04'),(3,'Admin','LoggedOut',1,'App\\User',1,'App\\User','[]','2021-04-29 00:21:55','2021-04-29 00:21:55'),(4,'HIST Manager','LoggedOut',39,'App\\User',39,'App\\User','[]','2021-04-29 00:43:27','2021-04-29 00:43:27'),(5,'HIST','LoggedOut',38,'App\\User',38,'App\\User','[]','2021-04-29 00:47:13','2021-04-29 00:47:13'),(6,'HIST Caretaker1','LoggedOut',44,'App\\User',44,'App\\User','[]','2021-04-29 01:18:47','2021-04-29 01:18:47'),(7,'HIST Consumer1','LoggedOut',45,'App\\User',45,'App\\User','[]','2021-04-29 01:22:45','2021-04-29 01:22:45'),(8,'User','LoggedOut',2,'App\\User',2,'App\\User','[]','2021-04-29 01:23:38','2021-04-29 01:23:38');

/*Table structure for table `caretakers` */

DROP TABLE IF EXISTS `caretakers`;

CREATE TABLE `caretakers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `postal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `caretakers` */

insert  into `caretakers`(`id`,`created_at`,`updated_at`,`deleted_at`,`user_id`,`company_id`,`package_id`,`facility_id`,`full_name`,`email`,`password`,`phone`,`nation_id_card`,`dob`,`address`,`country`,`city`,`postal`) values (1,'2021-04-29 00:42:50','2021-04-29 00:42:50',NULL,'44','1',1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'2021-04-29 01:27:33','2021-04-29 01:27:33',NULL,'47','1',1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `companies` */

DROP TABLE IF EXISTS `companies`;

CREATE TABLE `companies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `package_id` int(10) DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `is_custom_package_user` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `column_4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `column_5` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_companies` (`user_id`),
  CONSTRAINT `FK_companies` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `companies` */

insert  into `companies`(`id`,`created_at`,`updated_at`,`deleted_at`,`package_id`,`user_id`,`status`,`payment_status`,`is_custom_package_user`,`column_4`,`column_5`) values (1,'2021-04-29 00:09:47','2021-04-29 00:09:47',NULL,1,38,'1','0','0',NULL,NULL);

/*Table structure for table `consumers` */

DROP TABLE IF EXISTS `consumers`;

CREATE TABLE `consumers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `consumers` */

insert  into `consumers`(`id`,`created_at`,`updated_at`,`deleted_at`,`user_id`,`company_id`,`package_id`,`caretaker_id`,`full_name`,`email`,`password`,`phone`,`nation_id_card`,`dob`,`address`,`country`,`city`,`postal`) values (1,'2021-04-29 01:11:57','2021-04-29 01:11:57',NULL,45,1,1,44,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `contact_uses` */

DROP TABLE IF EXISTS `contact_uses`;

CREATE TABLE `contact_uses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `contact_uses` */

/*Table structure for table `education_levels` */

DROP TABLE IF EXISTS `education_levels`;

CREATE TABLE `education_levels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `education_levels` */

insert  into `education_levels`(`id`,`created_at`,`updated_at`,`deleted_at`,`name`,`status`) values (1,'2021-04-28 00:19:05','2021-04-28 00:19:05',NULL,'Less than high school','1'),(2,'2021-04-28 00:19:30','2021-04-28 00:19:30',NULL,'High school diploma or equivalent','1'),(3,'2021-04-28 00:19:48','2021-04-28 00:19:48',NULL,'Some college, no degree','1'),(4,'2021-04-28 00:19:57','2021-04-28 00:19:57',NULL,'Postsecondary non-degree award','1'),(5,'2021-04-28 00:20:06','2021-04-28 00:20:06',NULL,'Associate’s degree','1'),(6,'2021-04-28 00:20:16','2021-04-28 00:20:16',NULL,'Bachelor’s degree','1'),(7,'2021-04-28 00:20:37','2021-04-28 00:20:37',NULL,'Master’s degree','1'),(8,'2021-04-28 00:20:45','2021-04-28 00:20:45',NULL,'Doctoral or professional degree','1');

/*Table structure for table `facilities` */

DROP TABLE IF EXISTS `facilities`;

CREATE TABLE `facilities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `company_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_beds` int(11) DEFAULT NULL,
  `rent_amount` int(11) DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `facilities` */

insert  into `facilities`(`id`,`created_at`,`updated_at`,`deleted_at`,`company_id`,`name`,`address`,`city`,`state`,`zip_code`,`number_of_beds`,`rent_amount`,`phone`,`fax`,`status`) values (1,'2021-04-29 00:24:20','2021-04-29 00:24:20',NULL,'1','F-500','500 E. Grand Blvd','Detroit','MI','48207',8,250,'13139253201','313-922-8078','1');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `feedback` */

DROP TABLE IF EXISTS `feedback`;

CREATE TABLE `feedback` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `feedback` */

insert  into `feedback`(`id`,`created_at`,`updated_at`,`deleted_at`,`company_id`,`message`,`status`) values (1,'2021-03-31 01:47:20','2021-03-31 01:47:20',NULL,28,'My consumer listing is not working....',NULL),(3,'2021-03-31 17:47:03','2021-03-31 17:47:03',NULL,29,'Hi \r\nAdmin im new how to use system, need help.',NULL);

/*Table structure for table `managers` */

DROP TABLE IF EXISTS `managers`;

CREATE TABLE `managers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` int(191) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `managers` */

insert  into `managers`(`id`,`user_id`,`created_at`,`updated_at`,`deleted_at`,`status`,`company_id`,`package_id`) values (1,39,'2021-04-29 00:20:47','2021-04-29 00:20:47',NULL,NULL,1,1),(2,46,'2021-04-29 01:26:05','2021-04-29 01:26:05',NULL,NULL,1,1);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_01_01_193651_create_roles_permissions_tables',1),(4,'2018_06_15_045804_create_profiles_table',1),(5,'2018_06_15_092930_create_social_accounts_table',1),(6,'2018_06_16_054705_create_activity_log_table',1),(7,'2020_03_20_050141_create_failed_jobs_table',1),(8,'2021_03_01_194957_create_packages_table',2),(10,'2021_03_03_191154_create_contact_uses_table',3),(11,'2021_03_03_214120_create_companies_table',4),(12,'2021_03_03_220445_create_subscriptions_table',5),(13,'2021_03_03_221547_create_managers_table',6),(17,'2021_03_09_230306_create_caretakers_table',7),(18,'2021_03_09_230730_create_consumers_table',8),(19,'2021_03_30_224020_create_feedback_table',9),(20,'2021_04_28_000659_create_facilities_table',10),(21,'2021_04_28_001031_create_education_levels_table',11);

/*Table structure for table `news_letter` */

DROP TABLE IF EXISTS `news_letter`;

CREATE TABLE `news_letter` (
  `id` int(191) NOT NULL AUTO_INCREMENT,
  `email` varchar(191) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `news_letter` */

/*Table structure for table `packages` */

DROP TABLE IF EXISTS `packages`;

CREATE TABLE `packages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_custom_package` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `validity_days` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `packages` */

insert  into `packages`(`id`,`created_at`,`updated_at`,`deleted_at`,`name`,`description`,`price`,`logo`,`beds`,`caretakers`,`managers`,`lms_access`,`status`,`is_custom_package`,`validity_days`) values (1,'2021-03-23 20:03:11','2021-03-23 20:03:11',NULL,'Free Trial','<ol>\r\n	<li>\r\n	<p><strong>Limited</strong>&nbsp;number of Beds.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Limited</strong>&nbsp;number of Managers.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Limited</strong>&nbsp;number of Caretakers.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Limited</strong>&nbsp;3 days subscription.</p>\r\n	</li>\r\n</ol>',0,'packages/nfnzjgV7Y9PlSgYjkJ8YAox1htYE871BcsZv0Zol.jpeg',2,2,1,NULL,'1','0','15'),(2,'2021-03-23 20:05:34','2021-03-23 20:05:34',NULL,'Standard Package','<ol>\r\n	<li>\r\n	<p><strong>Limited</strong>&nbsp;number of Beds.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Limited</strong>&nbsp;number of Managers.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Limited</strong>&nbsp;number of Caretakers.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Maximum&nbsp;</strong>&nbsp;30 days subscription.</p>\r\n	</li>\r\n</ol>',120,'packages/ylxSowwJj6aVZtPyHH6vpzaq4kaoucK3T9QkXywI.png',3,3,1,NULL,'1','0','365'),(3,'2021-03-23 20:06:42','2021-03-23 20:06:42',NULL,'Gold Package','<ol>\r\n	<li>\r\n	<p><strong>Limited</strong>&nbsp;number of Beds.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Unlimited</strong>&nbsp;number of Managers.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Limited</strong>&nbsp;number of Caretakers.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Maximum&nbsp;</strong>&nbsp;90 days subscription.</p>\r\n	</li>\r\n</ol>',200,'packages/0hTdZnbpSlzpPQMDxXre9kUJuAeLT1doe34GgQvO.png',10,10,100,NULL,'1','0','365'),(4,'2021-03-23 20:08:04','2021-03-26 18:06:45',NULL,'Platinum Package','<ol>\r\n	<li>\r\n	<p><strong>Unlimited</strong>&nbsp;number of Beds.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Unlimited</strong>&nbsp;number of Managers.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Unlimited</strong>&nbsp;number of Caretakers.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Maximum&nbsp;</strong>&nbsp;365&nbsp;days subscription.</p>\r\n	</li>\r\n</ol>',550,'packages/t8dcG1FlZNlaCKSuLQr955qeReWCAKrhCLYC4xrl.png',500,500,1000,NULL,'1','0','365');

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `permission_role` */

DROP TABLE IF EXISTS `permission_role`;

CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permission_role` */

insert  into `permission_role`(`permission_id`,`role_id`) values (1,1),(2,1),(2,2),(3,1),(3,2),(4,1),(4,2),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(16,2),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(22,3),(23,1),(24,1),(24,3),(25,1),(26,1),(26,3),(26,6),(27,1),(27,3),(27,6),(28,1),(28,3),(28,6),(29,1),(30,1),(30,3),(30,4),(30,6),(31,1),(31,3),(31,4),(31,6),(32,1),(32,3),(32,4),(32,6),(33,1),(34,1),(34,3),(34,6),(35,1),(35,3),(35,6),(36,1),(36,3),(36,6),(37,1),(38,1),(38,3),(39,1),(40,1),(40,2),(40,3),(41,1),(41,2),(41,3),(42,1),(42,2),(43,1),(43,2),(44,1),(44,2),(45,1);

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`name`,`label`,`created_at`,`updated_at`) values (1,'All Permission',NULL,'2021-02-26 18:59:13','2021-02-26 18:59:13'),(2,'add-package',NULL,'2021-03-01 19:49:58','2021-03-01 19:49:58'),(3,'edit-package',NULL,'2021-03-01 19:49:58','2021-03-01 19:49:58'),(4,'view-package',NULL,'2021-03-01 19:49:58','2021-03-01 19:49:58'),(5,'delete-package',NULL,'2021-03-01 19:49:58','2021-03-01 19:49:58'),(6,'add-service',NULL,'2021-03-01 19:57:19','2021-03-01 19:57:19'),(7,'edit-service',NULL,'2021-03-01 19:57:19','2021-03-01 19:57:19'),(8,'view-service',NULL,'2021-03-01 19:57:19','2021-03-01 19:57:19'),(9,'delete-service',NULL,'2021-03-01 19:57:19','2021-03-01 19:57:19'),(10,'add-contactus',NULL,'2021-03-03 19:11:55','2021-03-03 19:11:55'),(11,'edit-contactus',NULL,'2021-03-03 19:11:55','2021-03-03 19:11:55'),(12,'view-contactus',NULL,'2021-03-03 19:11:55','2021-03-03 19:11:55'),(13,'delete-contactus',NULL,'2021-03-03 19:11:55','2021-03-03 19:11:55'),(14,'add-company',NULL,'2021-03-03 21:41:20','2021-03-03 21:41:20'),(15,'edit-company',NULL,'2021-03-03 21:41:20','2021-03-03 21:41:20'),(16,'view-company',NULL,'2021-03-03 21:41:20','2021-03-03 21:41:20'),(17,'delete-company',NULL,'2021-03-03 21:41:20','2021-03-03 21:41:20'),(18,'add-subscription',NULL,'2021-03-03 22:04:46','2021-03-03 22:04:46'),(19,'edit-subscription',NULL,'2021-03-03 22:04:46','2021-03-03 22:04:46'),(20,'view-subscription',NULL,'2021-03-03 22:04:46','2021-03-03 22:04:46'),(21,'delete-subscription',NULL,'2021-03-03 22:04:46','2021-03-03 22:04:46'),(22,'add-manager',NULL,'2021-03-03 22:15:47','2021-03-03 22:15:47'),(23,'edit-manager',NULL,'2021-03-03 22:15:47','2021-03-03 22:15:47'),(24,'view-manager',NULL,'2021-03-03 22:15:47','2021-03-03 22:15:47'),(25,'delete-manager',NULL,'2021-03-03 22:15:47','2021-03-03 22:15:47'),(26,'add-caretaker',NULL,'2021-03-09 22:23:30','2021-03-09 22:23:30'),(27,'edit-caretaker',NULL,'2021-03-09 22:23:30','2021-03-09 22:23:30'),(28,'view-caretaker',NULL,'2021-03-09 22:23:30','2021-03-09 22:23:30'),(29,'delete-caretaker',NULL,'2021-03-09 22:23:30','2021-03-09 22:23:30'),(30,'add-consumer',NULL,'2021-03-09 22:30:14','2021-03-09 22:30:14'),(31,'edit-consumer',NULL,'2021-03-09 22:30:14','2021-03-09 22:30:14'),(32,'view-consumer',NULL,'2021-03-09 22:30:14','2021-03-09 22:30:14'),(33,'delete-consumer',NULL,'2021-03-09 22:30:14','2021-03-09 22:30:14'),(34,'add-facility',NULL,'2021-03-09 22:39:58','2021-03-09 22:39:58'),(35,'edit-facility',NULL,'2021-03-09 22:39:58','2021-03-09 22:39:58'),(36,'view-facility',NULL,'2021-03-09 22:39:58','2021-03-09 22:39:58'),(37,'delete-facility',NULL,'2021-03-09 22:39:58','2021-03-09 22:39:58'),(38,'add-feedback',NULL,'2021-03-30 22:40:21','2021-03-30 22:40:21'),(39,'edit-feedback',NULL,'2021-03-30 22:40:21','2021-03-30 22:40:21'),(40,'view-feedback',NULL,'2021-03-30 22:40:21','2021-03-30 22:40:21'),(41,'delete-feedback',NULL,'2021-03-30 22:40:21','2021-03-30 22:40:21'),(42,'add-educationlevel',NULL,'2021-04-28 00:10:32','2021-04-28 00:10:32'),(43,'edit-educationlevel',NULL,'2021-04-28 00:10:32','2021-04-28 00:10:32'),(44,'view-educationlevel',NULL,'2021-04-28 00:10:32','2021-04-28 00:10:32'),(45,'delete-educationlevel',NULL,'2021-04-28 00:10:32','2021-04-28 00:10:32');

/*Table structure for table `profiles` */

DROP TABLE IF EXISTS `profiles`;

CREATE TABLE `profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nation_id_card` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` int(191) DEFAULT NULL,
  `pic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profiles_user_id_foreign` (`user_id`),
  CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `profiles` */

insert  into `profiles`(`id`,`nation_id_card`,`user_id`,`bio`,`gender`,`dob`,`age`,`pic`,`country`,`state`,`city`,`address`,`postal`,`company_name`,`phone`,`created_at`,`updated_at`) values (1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-02-26 18:59:13','2021-02-26 18:59:13'),(2,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-02-26 18:59:13','2021-02-26 18:59:13'),(3,NULL,3,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s.','male','2000-03-31',NULL,'profilePicture/jOU8btNM3L.png','United States','GA','ATLANTA','222333 PEACH TREE PLACE','30318',NULL,NULL,'2021-03-30 21:44:27','2021-03-30 21:44:27'),(35,NULL,38,NULL,NULL,NULL,NULL,'profilePicture/aLWErFsAvL9wExyRRdmaTQApZjvvAUSQBILcFyoY.png','United States',NULL,'new york','Tree Place','12345','HIST','03001234567','2021-04-29 00:09:47','2021-04-29 00:09:47'),(36,'12342411111',39,NULL,NULL,'2000-01-02',NULL,'profilePicture/lDkuf58tNwX0zgR228gzRzRVTvnjoXfl7NmSZ5cW.png','United States',NULL,'ATLANTA','Tree Place','30318','HIST','03001234567','2021-04-29 00:20:47','2021-04-29 00:20:47'),(38,'32100000000000',44,NULL,NULL,'1993-12-01',NULL,'profilePicture/lWA0HH6tdDUzyNy4EFpPKU9DN5COwPiMwg32XmcU.jpeg','United States',NULL,'ATLANTA','USA','30318','Not Available','0300123456','2021-04-29 00:42:50','2021-04-29 00:42:50'),(39,'34500000055',45,NULL,NULL,'1991-03-02',NULL,'profilePicture/78JQ7dzpaOFG8uB1Rw61C0LjV4rf23Q5KVfUi14F.jpeg','United States',NULL,'ATLANTA','New York','30318','Not Available','03001234646','2021-04-29 01:11:57','2021-04-29 01:11:57'),(40,'30120000000000',46,NULL,NULL,'2000-01-02',NULL,'profilePicture/T2SXN4GMEXcdS2CZ1ej1IervuiZbtSlAvwNbLzUJ.png','United States',NULL,'ATLANTA','222333 PEACH TREE PLACE','30318','HIST','03001234567','2021-04-29 01:26:05','2021-04-29 01:26:05'),(41,'02475255555',47,NULL,NULL,'1993-01-01',NULL,'profilePicture/M3o2twkyVOfkDGy05udzEY9gSu2USnAqqzjLHtJI.png','United States',NULL,'Detroit','500 E. Grand Blvd','48207','Not Available','0301154545','2021-04-29 01:27:33','2021-04-29 01:27:33');

/*Table structure for table `role_user` */

DROP TABLE IF EXISTS `role_user`;

CREATE TABLE `role_user` (
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`user_id`),
  KEY `role_user_user_id_foreign` (`user_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_user` */

insert  into `role_user`(`role_id`,`user_id`) values (1,1),(2,2),(3,38),(4,44),(4,47),(5,45),(6,39),(6,46),(7,3);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`label`,`created_at`,`updated_at`) values (1,'admin',NULL,'2021-02-26 18:59:13','2021-02-26 18:59:13'),(2,'user',NULL,'2021-02-26 18:59:13','2021-02-26 18:59:13'),(3,'company',NULL,'2021-03-01 20:00:11','2021-03-01 20:00:11'),(4,'caretaker',NULL,'2021-03-01 20:01:19','2021-03-01 20:01:19'),(5,'consumer',NULL,'2021-03-01 20:01:38','2021-03-01 20:01:38'),(6,'manager',NULL,'2021-03-09 22:03:38','2021-03-09 22:03:38'),(7,'guest',NULL,'2021-03-24 17:26:33','2021-03-24 17:26:33');

/*Table structure for table `social_accounts` */

DROP TABLE IF EXISTS `social_accounts`;

CREATE TABLE `social_accounts` (
  `user_id` int(11) NOT NULL,
  `provider_user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `social_accounts` */

/*Table structure for table `subscriptions` */

DROP TABLE IF EXISTS `subscriptions`;

CREATE TABLE `subscriptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `subscriptions` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 1 COMMENT '1-active,2-banned',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`view_password`,`provider_id`,`provider`,`status`,`remember_token`,`created_at`,`updated_at`,`deleted_at`) values (1,'Admin','admin@developer.com','$2y$10$6HBI01T4tdD2mNMYPz1kYOZEs.OGFMSB.guHoD87mjFy.wbKLYoCy',NULL,NULL,NULL,1,NULL,'2021-02-26 18:59:13','2021-02-26 18:59:13',NULL),(2,'User','admin@opat.com','$2y$10$6HBI01T4tdD2mNMYPz1kYOZEs.OGFMSB.guHoD87mjFy.wbKLYoCy',NULL,NULL,NULL,1,NULL,'2021-02-26 18:59:13','2021-02-26 18:59:13',NULL),(3,'Guest','guest@opat.com','$2y$10$Wq6OlYbVVbiRgUw1nvpdTuqFLb6Lmr4Nu2j8HckwAgANzN1uEoXmO',NULL,NULL,NULL,1,NULL,'2021-03-30 21:44:27','2021-03-30 21:44:27',NULL),(38,'HIST','hist@yopmail.com','$2y$10$VqutkfUiZcdT3bFnVLfl7eKHxhc7Zi40sOmG3BvRDoX84CnlxFusK','123456',NULL,NULL,1,NULL,'2021-04-29 00:09:47','2021-04-29 00:09:47',NULL),(39,'HIST Manager1','histmanager1@yopmail.com','$2y$10$KsWmrlYdQUPV4lIReXiXMe3FwKincPEyNh2FSWW8VLj.8ULY3cYH.','123456',NULL,NULL,1,NULL,'2021-04-29 00:20:47','2021-04-29 00:20:47',NULL),(44,'HIST Caretaker1','histcaretaker1@yopmail.com','$2y$10$8Oee7RFPOl9lr4WuqUwHkuGxgni5uwECOxPPTuPMo/t9N.f6Bszim','123456',NULL,NULL,1,NULL,'2021-04-29 00:42:50','2021-04-29 00:42:50',NULL),(45,'HIST Consumer1','histconsumer1@yopmail.com','$2y$10$oRl2tfzUaIofb8zqHRzavuuTtSHpX/R2o1DaRrBQNOizyXIImvTVe','123456',NULL,NULL,1,NULL,'2021-04-29 01:11:57','2021-04-29 01:11:57',NULL),(46,'HIST Manager2','histmanager2@yopmail.com','$2y$10$UNgM/5M9LHMVIhe9TqymG.RQ3YwY.QcF8X1pL2We7XMQZ3d0VTJui','123456',NULL,NULL,1,NULL,'2021-04-29 01:26:05','2021-04-29 01:26:05',NULL),(47,'HIST Caretaker2','histcaretaker2@yopmail.com','$2y$10$QK7p2nQryCCqXaMZxOm6/eHaqAuGAW5TDPRYuer2nj7HT/0UxXK22','12346',NULL,NULL,1,NULL,'2021-04-29 01:27:33','2021-04-29 01:27:33',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
