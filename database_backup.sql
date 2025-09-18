-- Database Export for droub_db
-- Generated on: 2025-09-18 11:28:17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- Table structure for table `admins`
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verification_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data for table `admins`
INSERT INTO `admins` VALUES ('1','Super Admin','m2@yahoo.com','$2y$10$01kY1JqwC4Sg1lR.rKHzP.mrP30.BYIM/yOtybDh8DJ2T7kplzq5y',NULL,NULL,NULL,NULL,NULL);

-- Table structure for table `areas`
DROP TABLE IF EXISTS `areas`;
CREATE TABLE `areas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `location` json NOT NULL,
  `number_of_projects` int DEFAULT NULL,
  `number_of_beneficiaries` int DEFAULT NULL,
  `number_of_programs` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `blogs`
DROP TABLE IF EXISTS `blogs`;
CREATE TABLE `blogs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` json DEFAULT NULL,
  `text` json DEFAULT NULL,
  `background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tags` json DEFAULT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `clients`
DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `failed_jobs`
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `faqs`
DROP TABLE IF EXISTS `faqs`;
CREATE TABLE `faqs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `question` json DEFAULT NULL,
  `answer` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `migrations`
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data for table `migrations`
INSERT INTO `migrations` VALUES ('1','2014_10_12_000000_create_users_table','1'),('2','2014_10_12_100000_create_password_reset_tokens_table','1'),('3','2018_08_08_100000_create_telescope_entries_table','1'),('4','2019_08_19_000000_create_failed_jobs_table','1'),('5','2019_12_14_000001_create_personal_access_tokens_table','1'),('6','2025_01_20_105844_create_admins_table','1'),('7','2025_01_21_093818_create_services_table','1'),('8','2025_01_21_101235_create_sliders_table','1'),('9','2025_01_21_133701_create_clients_table','1'),('10','2025_01_22_064033_create_teams_table','1'),('11','2025_01_22_080459_CreateTableStatic_pages','1'),('12','2025_01_23_073601_create_settings_table','1'),('13','2025_01_26_072919_create_faqs_table','1'),('14','2025_01_26_074759_add_fields_to_admins_table','1'),('15','2025_01_26_100514_create_reviews_table','1'),('16','2025_01_27_070453_create_newsletters_table','1'),('17','2025_01_27_074710_create_packages_table','1'),('18','2025_01_27_080548_create_package_features_table','1'),('19','2025_02_02_113224_add_email_to_settings_table','1'),('20','2025_03_04_064035_create_trainers_table','1'),('21','2025_03_04_070847_create_areas_table','1'),('22','2025_03_04_081733_create_reports_table','1'),('23','2025_03_06_075434_create_projects_table','1'),('24','2025_03_06_090743_create_project_trainers_table','1'),('25','2025_03_06_094544_create_project_managers_table','1'),('26','2025_03_09_092014_create_testimonials_table','1'),('27','2025_03_13_094930_create_blogs_table','1'),('28','2025_03_25_080710_add_social_url_to_testimonials_table','1'),('29','2025_03_25_100331_add_tags_toprojects_table','1'),('30','2025_03_25_110437_add_tags_to_blogs_table','1'),('31','2025_04_22_091238_add_statistics_settings','1'),('32','2025_05_05_065612_create_navbar_table','1'),('33','2025_05_06_073426_add_name_to_reviews','1'),('34','2025_05_06_080505_add_link_to_clients','1'),('35','2025_05_08_061939_add_link_to_reviews','1'),('36','2025_05_08_084846_add_cv_to_blogs','1'),('37','2025_05_08_091251_add_cv_to_teams','1'),('38','2025_05_13_054656_add_column_to_projects_table','1'),('39','2025_05_14_122758_add_report_to_projects','1'),('40','2025_05_25_112314_create_twitters_table','1'),('41','2025_09_15_084435_add_type_column_to_sliders_table','1'),('42','2025_09_15_105320_create_slider_details_table','1');

-- Table structure for table `navbar`
DROP TABLE IF EXISTS `navbar`;
CREATE TABLE `navbar` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data for table `navbar`
INSERT INTO `navbar` VALUES ('1','home','{\"en\":\"Home\",\"ar\":\"\\u0627\\u0644\\u0631\\u0626\\u064a\\u0633\\u064a\\u0629\"}',NULL,'2025-09-18 11:26:26','2025-09-18 11:26:26'),('2','abut','{\"en\":\"Abut Us\",\"ar\":\"\\u0645\\u0646 \\u0646\\u062d\\u0646\"}',NULL,'2025-09-18 11:26:26','2025-09-18 11:26:26'),('3','media_center','{\"en\":\"Media Center\",\"ar\":\"\\u0627\\u0644\\u0645\\u0631\\u0643\\u0632 \\u0627\\u0644\\u0627\\u0639\\u0644\\u0627\\u0645\\u0649\"}',NULL,'2025-09-18 11:26:26','2025-09-18 11:26:26'),('4','programs_projects','{\"en\":\"Programs and projects\",\"ar\":\"\\u0627\\u0644\\u0628\\u0631\\u0627\\u0645\\u062c \\u0648\\u0627\\u0644\\u0645\\u0634\\u0627\\u0631\\u064a\\u0639\"}',NULL,'2025-09-18 11:26:26','2025-09-18 11:26:26'),('5','partners','{\"en\":\"Partners\",\"ar\":\"\\u0627\\u0644\\u0634\\u0631\\u0643\\u0627\\u0621\"}',NULL,'2025-09-18 11:26:26','2025-09-18 11:26:26'),('6','join_us','{\"en\":\"join us\",\"ar\":\"\\u0627\\u0646\\u0636\\u0645 \\u0627\\u0644\\u064a\\u0646\\u0627\"}',NULL,'2025-09-18 11:26:26','2025-09-18 11:26:26'),('7','vision_mission','{\"en\":\"Vision, Mission, Goals and Values\",\"ar\":\"\\u0627\\u0644\\u0631\\u0624\\u064a\\u0629 \\u0648\\u0627\\u0644\\u0631\\u0633\\u0627\\u0644\\u0629 \\u0648\\u0627\\u0644\\u0627\\u0647\\u062f\\u0627\\u0641 \\u0648\\u0627\\u0644\\u0642\\u064a\\u0645\"}','2','2025-09-18 11:26:26','2025-09-18 11:26:26'),('8','board_of_directors','{\"en\":\"Board of Directors\",\"ar\":\"\\u0645\\u062c\\u0644\\u0633 \\u0627\\u0644\\u0627\\u062f\\u0627\\u0631\\u0629\"}','2','2025-09-18 11:26:26','2025-09-18 11:26:26'),('9','executive_team','{\"en\":\"Executive Team\",\"ar\":\"\\u0641\\u0631\\u064a\\u0642 \\u062a\\u0646\\u0641\\u064a\\u0630\\u064a\"}','2','2025-09-18 11:26:26','2025-09-18 11:26:26'),('10','news','{\"en\":\"News\",\"ar\":\"\\u0627\\u0644\\u0627\\u062e\\u0628\\u0627\\u0631\"}','3','2025-09-18 11:26:26','2025-09-18 11:26:26'),('11','reports','{\"en\":\"Reports\",\"ar\":\"\\u0627\\u0644\\u062a\\u0642\\u0627\\u0631\\u064a\\u0631\"}','3','2025-09-18 11:26:26','2025-09-18 11:26:26'),('12','visual_identity','{\"en\":\"Visual identity\",\"ar\":\"\\u0627\\u0644\\u0647\\u0648\\u064a\\u0629 \\u0627\\u0644\\u0628\\u0635\\u0631\\u064a\\u0629\"}','3','2025-09-18 11:26:26','2025-09-18 11:26:26'),('13','join_us_child','{\"en\":\"join us\",\"ar\":\"\\u0627\\u0646\\u0636\\u0645 \\u0627\\u0644\\u064a\\u0646\\u0627\"}','6','2025-09-18 11:26:26','2025-09-18 11:26:26'),('14','vacancies','{\"en\":\"Vacancies\",\"ar\":\"\\u0627\\u0644\\u0648\\u0638\\u0627\\u0626\\u0641 \\u0627\\u0644\\u0634\\u0627\\u063a\\u0631\\u0629\"}','6','2025-09-18 11:26:26','2025-09-18 11:26:26');

-- Table structure for table `newsletters`
DROP TABLE IF EXISTS `newsletters`;
CREATE TABLE `newsletters` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `newsletters_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `package_features`
DROP TABLE IF EXISTS `package_features`;
CREATE TABLE `package_features` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` json DEFAULT NULL,
  `checked_status` tinyint NOT NULL DEFAULT '1',
  `package_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `package_features_package_id_foreign` (`package_id`),
  CONSTRAINT `package_features_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `packages`
DROP TABLE IF EXISTS `packages`;
CREATE TABLE `packages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` json DEFAULT NULL,
  `price_annual` double DEFAULT NULL,
  `price_monthly` double DEFAULT NULL,
  `discount_annual` double NOT NULL DEFAULT '0',
  `discount_monthly` double NOT NULL DEFAULT '0',
  `active_status` tinyint NOT NULL DEFAULT '1',
  `bordered_status` tinyint NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `password_reset_tokens`
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `personal_access_tokens`
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `project_managers`
DROP TABLE IF EXISTS `project_managers`;
CREATE TABLE `project_managers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `position` json NOT NULL,
  `name` json NOT NULL,
  `arrange` tinyint NOT NULL DEFAULT '0',
  `project_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_managers_project_id_foreign` (`project_id`),
  CONSTRAINT `project_managers_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `project_trainers`
DROP TABLE IF EXISTS `project_trainers`;
CREATE TABLE `project_trainers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `project_id` bigint unsigned NOT NULL,
  `trainer_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_trainers_project_id_foreign` (`project_id`),
  KEY `project_trainers_trainer_id_foreign` (`trainer_id`),
  CONSTRAINT `project_trainers_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `project_trainers_trainer_id_foreign` FOREIGN KEY (`trainer_id`) REFERENCES `trainers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `projects`
DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` json DEFAULT NULL,
  `text` json DEFAULT NULL,
  `number_of_beneficiaries` int DEFAULT NULL,
  `parent_id` bigint unsigned DEFAULT NULL,
  `version` json DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tags` json DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'main',
  `report` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `projects_parent_id_foreign` (`parent_id`),
  CONSTRAINT `projects_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `reports`
DROP TABLE IF EXISTS `reports`;
CREATE TABLE `reports` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `report` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('report','visual') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `reviews`
DROP TABLE IF EXISTS `reviews`;
CREATE TABLE `reviews` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `text` json DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `services`
DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` json DEFAULT NULL,
  `text` json DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `settings`
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` json DEFAULT NULL,
  `address` json DEFAULT NULL,
  `phones` json DEFAULT NULL,
  `social_media` json DEFAULT NULL,
  `long` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statistics` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data for table `settings`
INSERT INTO `settings` VALUES ('1','{\"ar\": \"Mon Site Web\", \"en\": \"My Website\"}','{\"ar\": \"123 Rue Principale\", \"en\": \"123 Main St\"}','[\"+123456789\", \"+987654321\"]','{\"twitter\": \"https://twitter.com\", \"facebook\": \"https://facebook.com\"}','123.456','78.910','2025-09-18 11:26:22','2025-09-18 11:26:22','info@example.com','{\"trips\":150,\"hours\":200,\"programs\":50,\"clients\":950}');

-- Table structure for table `slider_details`
DROP TABLE IF EXISTS `slider_details`;
CREATE TABLE `slider_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `slider_id` bigint unsigned NOT NULL,
  `title` json DEFAULT NULL,
  `description` json DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `slider_details_slider_id_foreign` (`slider_id`),
  CONSTRAINT `slider_details_slider_id_foreign` FOREIGN KEY (`slider_id`) REFERENCES `sliders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `sliders`
DROP TABLE IF EXISTS `sliders`;
CREATE TABLE `sliders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'hero',
  `order` int NOT NULL DEFAULT '0',
  `title` json DEFAULT NULL,
  `text` json DEFAULT NULL,
  `background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_title` json DEFAULT NULL,
  `btn_active` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `static_pages`
DROP TABLE IF EXISTS `static_pages`;
CREATE TABLE `static_pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` json NOT NULL,
  `text` json NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `static_pages_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data for table `static_pages`
INSERT INTO `static_pages` VALUES ('1','about_us','{\"ar\": \"من نحن\", \"en\": \"About Us\"}','{\"ar\": \"محتوى من نحن...\", \"en\": \"About us content...\"}',NULL,'2025-09-18 11:26:22','2025-09-18 11:26:22'),('2','vision','{\"ar\": \"رؤيتنا\", \"en\": \"vision\"}','{\"ar\": \"محتوى رؤيتنا\", \"en\": \"vision content...\"}',NULL,'2025-09-18 11:26:22','2025-09-18 11:26:22'),('3','mission','{\"ar\": \"مهمتنا\", \"en\": \"Mission\"}','{\"ar\": \"محتوى مهمتنا\", \"en\": \"Mission content...\"}',NULL,'2025-09-18 11:26:22','2025-09-18 11:26:22'),('4','terms_and_conditions','{\"ar\": \"الشروط والقواعد\", \"en\": \"Terms and Conditions\"}','{\"ar\": \"محتوى الشروط والقواعد\", \"en\": \"Terms and Conditions content...\"}',NULL,'2025-09-18 11:26:22','2025-09-18 11:26:22');

-- Table structure for table `teams`
DROP TABLE IF EXISTS `teams`;
CREATE TABLE `teams` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` json DEFAULT NULL,
  `position` json DEFAULT NULL,
  `text` json DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `telescope_entries`
DROP TABLE IF EXISTS `telescope_entries`;
CREATE TABLE `telescope_entries` (
  `sequence` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family_hash` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `should_display_on_index` tinyint(1) NOT NULL DEFAULT '1',
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`sequence`),
  UNIQUE KEY `telescope_entries_uuid_unique` (`uuid`),
  KEY `telescope_entries_batch_id_index` (`batch_id`),
  KEY `telescope_entries_family_hash_index` (`family_hash`),
  KEY `telescope_entries_created_at_index` (`created_at`),
  KEY `telescope_entries_type_should_display_on_index_index` (`type`,`should_display_on_index`)
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data for table `telescope_entries`
INSERT INTO `telescope_entries` VALUES ('1','9fe82994-d2e5-48fd-b055-a28aa0e2f210','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.adminmanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('2','9fe82994-d3a4-41ea-b92b-0e9b1023af42','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.appointment.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('3','9fe82994-d3ec-4d1d-b3e2-f78a08e21bd5','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.areamanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('4','9fe82994-d423-4b36-b694-6228f7946ac7','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.blogmanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('5','9fe82994-d457-4ed7-91d8-98a83a71187a','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.clientmanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('6','9fe82994-d48a-4791-a8a8-f94e49e2c239','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.contactus.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('7','9fe82994-d4bb-459f-847e-785ee8a98424','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.faqmanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('8','9fe82994-d4ed-43e3-8725-1e914dae7ed2','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.joinus.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('9','9fe82994-d51d-4645-9d80-9c1072c9a167','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.newsletters.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('10','9fe82994-d550-4213-9a16-1e2938a6ffdd','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.packagemanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('11','9fe82994-d581-4102-b93f-eced42c7ec3e','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.projectmanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('12','9fe82994-d5b3-4581-9060-05e9f9e3f56d','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.reportmanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('13','9fe82994-d5e4-4359-b844-6f34aea18813','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.reviewmanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('14','9fe82994-d615-4711-bc64-722cda1cf1a5','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.servicemanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('15','9fe82994-d647-4fa5-a60c-20dc4faac60c','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.settingmanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('16','9fe82994-d67b-4509-994d-5e0aeb52448a','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.slidermanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('17','9fe82994-d6b1-448e-a935-faf7b9f0eb59','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.staticpages.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('18','9fe82994-d6e5-4d9c-baa9-4c36fcc58fa2','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.teammanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('19','9fe82994-d719-4455-a696-c5ac1b054da9','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.testimonialmanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('20','9fe82994-d74b-44f9-9c06-318647e660f3','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.trainermanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('21','9fe82994-d781-48a7-8134-0120aa67ed6a','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.twitterintefrationmanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('22','9fe82994-e15a-4d3c-89e4-8970e23f2040','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','query','{\"connection\":\"mysql\",\"driver\":\"mysql\",\"bindings\":[],\"sql\":\"select table_name as `name`, (data_length + index_length) as `size`, table_comment as `comment`, engine as `engine`, table_collation as `collation` from information_schema.tables where table_schema = \'droub_db\' and table_type in (\'BASE TABLE\', \'SYSTEM VERSIONED\') order by table_name\",\"time\":\"20.99\",\"slow\":false,\"file\":\"D:\\\\Durub Almustaqbal\\\\app\\\\Providers\\\\AppServiceProvider.php\",\"line\":25,\"hash\":\"364005459d155c9b63611a89ec6fd7e0\",\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('23','9fe82994-e270-49f5-b3a7-81a8f29f5ae8','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','query','{\"connection\":\"mysql\",\"driver\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `settings` limit 1\",\"time\":\"0.40\",\"slow\":false,\"file\":\"D:\\\\Durub Almustaqbal\\\\app\\\\Providers\\\\AppServiceProvider.php\",\"line\":27,\"hash\":\"fa0ff947d644db0afa39e9f3fd6a5cf9\",\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('24','9fe82994-e289-4dcd-9c02-a3a01c32eeac','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','model','{\"action\":\"retrieved\",\"model\":\"Modules\\\\SettingManagement\\\\App\\\\Models\\\\Setting\",\"count\":1,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('25','9fe82995-6944-4648-a709-9be6e258ed62','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.adminmanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('26','9fe82995-6966-4c81-84eb-b6c5e19dcc88','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.appointment.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('27','9fe82995-697d-44ee-a92f-b534b8474090','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.areamanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('28','9fe82995-6992-4ef1-bb58-654c23d756d6','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.blogmanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('29','9fe82995-69a6-4686-96d4-327796a3c474','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.clientmanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('30','9fe82995-69bb-47d5-9651-6d7c280647e2','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.contactus.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('31','9fe82995-69cf-4bce-866e-fb24fb3a5aa1','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.faqmanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('32','9fe82995-69e3-471b-9a45-73e84fdd4799','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.joinus.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('33','9fe82995-69f7-4851-a064-14e6a0e9f5e2','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.newsletters.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('34','9fe82995-6a0d-4600-aa86-29ef1b7b69b3','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.packagemanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('35','9fe82995-6a24-45df-aa2c-cb36e99f198e','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.projectmanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('36','9fe82995-6a3b-4079-bb2c-97008f77b2f1','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.reportmanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('37','9fe82995-6a58-4479-9b5c-64f8c44a764a','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.reviewmanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('38','9fe82995-6a6d-4526-9c72-406dd3041886','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.servicemanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('39','9fe82995-6a82-43c9-a832-ebe5c407dc9a','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.settingmanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('40','9fe82995-6a96-409f-bf16-eeb78b5011f0','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.slidermanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('41','9fe82995-6aaa-4b50-bc6c-4e06cfac59c1','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.staticpages.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('42','9fe82995-6abe-46f7-a163-0f1976079a02','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.teammanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('43','9fe82995-6ad2-4d56-b227-cf496f0bbd99','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.testimonialmanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('44','9fe82995-6ae5-4ea6-899c-ed8274bc078a','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.trainermanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('45','9fe82995-6af9-4b4a-80d6-59bb6bfc2695','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','event','{\"name\":\"modules.twitterintefrationmanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('46','9fe82995-6e9d-42c2-b04a-b02bfa9f7218','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','cache','{\"type\":\"missed\",\"key\":\"a75f3f172bfb296f2e10cbfc6dfc1883\",\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('47','9fe82995-73b1-4d43-acc2-95a1406bb2cd','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','query','{\"connection\":\"mysql\",\"driver\":\"mysql\",\"bindings\":[],\"sql\":\"select * from `sliders` where `type` = \'hero\' and `sliders`.`id` = \'details\' limit 1\",\"time\":\"2.21\",\"slow\":false,\"file\":\"D:\\\\Durub Almustaqbal\\\\Modules\\\\SliderManagement\\\\App\\\\Http\\\\Controllers\\\\Api\\\\Frontend\\\\HeroController.php\",\"line\":28,\"hash\":\"d1df56074aa0eca30e74ce87fc29d243\",\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('48','9fe82995-75a7-4b52-8fd0-fdbe41450ad7','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','cache','{\"type\":\"hit\",\"key\":\"a75f3f172bfb296f2e10cbfc6dfc1883\",\"value\":1,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('49','9fe82995-75f7-40a7-a0fa-a2b9ff556b15','9fe82995-7650-4239-8634-e80848f47276',NULL,'1','request','{\"ip_address\":\"127.0.0.1\",\"uri\":\"\\/api\\/frontend\\/hero\\/details\",\"method\":\"GET\",\"controller_action\":\"Modules\\\\SliderManagement\\\\App\\\\Http\\\\Controllers\\\\Api\\\\Frontend\\\\HeroController@show\",\"middleware\":[\"api\"],\"headers\":{\"connection\":\"Keep-Alive\",\"host\":\"durub-almustaqbal.test\",\"user-agent\":\"Mozilla\\/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell\\/5.1.26100.6584\"},\"payload\":[],\"session\":[],\"response_headers\":{\"cache-control\":\"no-cache, private\",\"date\":\"Thu, 18 Sep 2025 11:26:28 GMT\",\"content-type\":\"application\\/json\",\"x-ratelimit-limit\":\"60\",\"x-ratelimit-remaining\":\"59\",\"access-control-allow-origin\":\"*\"},\"response_status\":404,\"response\":{\"data\":[],\"status\":\"fail\",\"error\":\"Resource not found\",\"code\":404},\"duration\":460,\"memory\":4,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:26:28'),('50','9fe82a05-3eb5-4c67-b7bd-a725c1f11ffe','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df','6e06641de4a881f9441bdfb1effc5aca','1','exception','{\"class\":\"Symfony\\\\Component\\\\Console\\\\Exception\\\\CommandNotFoundException\",\"file\":\"D:\\\\Durub Almustaqbal\\\\vendor\\\\symfony\\\\console\\\\Application.php\",\"line\":737,\"message\":\"Command \\\"db:export\\\" is not defined.\\n\\nDid you mean one of these?\\n    db\\n    db:monitor\\n    db:seed\\n    db:show\\n    db:table\\n    db:wipe\",\"context\":null,\"trace\":[{\"file\":\"D:\\\\Durub Almustaqbal\\\\vendor\\\\symfony\\\\console\\\\Application.php\",\"line\":266},{\"file\":\"D:\\\\Durub Almustaqbal\\\\vendor\\\\symfony\\\\console\\\\Application.php\",\"line\":175},{\"file\":\"D:\\\\Durub Almustaqbal\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Foundation\\\\Console\\\\Kernel.php\",\"line\":201},{\"file\":\"D:\\\\Durub Almustaqbal\\\\artisan\",\"line\":35}],\"line_preview\":{\"728\":\"\",\"729\":\"                if (1 == \\\\count($alternatives)) {\",\"730\":\"                    $message .= \\\"\\\\n\\\\nDid you mean this?\\\\n    \\\";\",\"731\":\"                } else {\",\"732\":\"                    $message .= \\\"\\\\n\\\\nDid you mean one of these?\\\\n    \\\";\",\"733\":\"                }\",\"734\":\"                $message .= implode(\\\"\\\\n    \\\", $alternatives);\",\"735\":\"            }\",\"736\":\"\",\"737\":\"            throw new CommandNotFoundException($message, array_values($alternatives));\",\"738\":\"        }\",\"739\":\"\",\"740\":\"        \\/\\/ filter out aliases for commands which are already on the list\",\"741\":\"        if (\\\\count($commands) > 1) {\",\"742\":\"            $commandList = $this->commandLoader ? array_merge(array_flip($this->commandLoader->getNames()), $this->commands) : $this->commands;\",\"743\":\"            $commands = array_unique(array_filter($commands, function ($nameOrAlias) use (&$commandList, $commands, &$aliases) {\",\"744\":\"                if (!$commandList[$nameOrAlias] instanceof Command) {\",\"745\":\"                    $commandList[$nameOrAlias] = $this->commandLoader->get($nameOrAlias);\",\"746\":\"                }\",\"747\":\"\"},\"hostname\":\"WIN-THTONUKKVRI\",\"occurrences\":1}','2025-09-18 11:27:42'),('51','9fe82a04-3e00-4cf9-bb9e-39919f3007c2','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.adminmanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('52','9fe82a04-418a-4605-bae8-aa6c37431718','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.appointment.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('53','9fe82a04-41f1-4e90-be92-e8d57265fba7','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.areamanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('54','9fe82a04-425a-46bd-af58-989d1d4f4bbb','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.blogmanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('55','9fe82a04-42e2-45ec-9bdd-cc04dd0ea6e7','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.clientmanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('56','9fe82a04-4353-4c29-be10-96a8d0008c66','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.contactus.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('57','9fe82a04-43cd-4cf2-baa7-952e21e202e4','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.faqmanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('58','9fe82a04-44ce-4ad0-ac63-8a1205a8644c','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.joinus.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('59','9fe82a04-4586-4cc1-ba92-d63c99add828','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.newsletters.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('60','9fe82a04-45f9-4fe2-a404-aa4346d5b7b5','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.packagemanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('61','9fe82a04-465f-49f1-9a4d-04ad19a85bdc','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.projectmanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('62','9fe82a04-46c8-4cd9-9929-d3febd2ccc41','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.reportmanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('63','9fe82a04-4731-4888-87d2-b5323356caa4','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.reviewmanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('64','9fe82a04-479a-4f0c-8754-b3c08cead788','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.servicemanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('65','9fe82a04-47fe-406c-9050-a512ede6872f','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.settingmanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('66','9fe82a04-4864-4a95-b669-9b6b7f95bd7a','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.slidermanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('67','9fe82a04-48cb-459a-8829-189cfada8ba3','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.staticpages.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('68','9fe82a04-4933-484d-a5e6-60c158902e34','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.teammanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('69','9fe82a04-499d-466a-854e-df11ae25abcf','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.testimonialmanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('70','9fe82a04-4a04-4dfc-ae13-4006914fd085','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.trainermanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('71','9fe82a04-4a6f-49fe-9296-a3ff95bc963f','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.twitterintefrationmanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('72','9fe82a04-d812-442b-b9fc-efee18263afe','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.adminmanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('73','9fe82a04-d831-42b6-93c8-7b415e099c61','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.appointment.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('74','9fe82a04-d84c-48d2-bb0c-6916a6aa5dff','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.areamanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('75','9fe82a04-d863-42ba-8322-573bb246c8e7','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.blogmanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('76','9fe82a04-d87a-4429-95e3-17a364c7ca47','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.clientmanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('77','9fe82a04-d891-40da-930b-a2f8919a9821','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.contactus.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('78','9fe82a04-d8a6-47c3-919d-29f4aa73e561','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.faqmanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('79','9fe82a04-d8bd-419b-b8e4-65fc4b87a516','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.joinus.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('80','9fe82a04-d8d3-4568-ac36-cdbe71d158e4','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.newsletters.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('81','9fe82a04-d8e8-425f-9e71-6efb2df29c09','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.packagemanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('82','9fe82a04-d8fe-48ab-937f-e13b789025ed','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.projectmanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('83','9fe82a04-d91c-496c-a17c-204c3d4ae9e2','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.reportmanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('84','9fe82a04-d936-4713-b109-5edcb4be4455','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.reviewmanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('85','9fe82a04-d94b-401d-b40d-4d8d846dc506','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.servicemanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('86','9fe82a04-d95f-4663-87c5-1635b63c4fb8','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.settingmanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('87','9fe82a04-d974-4bb2-80e3-5c60d2ce915e','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.slidermanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('88','9fe82a04-d988-41e2-8fc1-f7deee6a1a30','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.staticpages.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('89','9fe82a04-d99d-4713-9cf5-f4794aea4287','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.teammanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('90','9fe82a04-d9b1-4605-a37d-a07e59a2e6ac','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.testimonialmanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('91','9fe82a04-d9c6-4582-a2f6-1f5af500ebea','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.trainermanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('92','9fe82a04-d9da-4fd2-b296-4bef57cbdc53','9fe82a05-5c5f-4b60-ad78-6e5c0ff352df',NULL,'1','event','{\"name\":\"modules.twitterintefrationmanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:27:41'),('93','9fe82a2a-454d-4bf7-8c95-0ee049ececb7','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.adminmanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('94','9fe82a2a-48b6-48c6-b0f3-4bd88dc666f5','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.appointment.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('95','9fe82a2a-491a-4444-ab88-8ef34ebe88bf','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.areamanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('96','9fe82a2a-497d-4ff2-a7f2-8213d2c86a34','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.blogmanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('97','9fe82a2a-49f7-4542-9d5c-419159095cfa','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.clientmanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('98','9fe82a2a-4a5b-4764-af8d-f05a8e43ea2f','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.contactus.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('99','9fe82a2a-4abe-41be-88ff-98afd005ae72','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.faqmanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('100','9fe82a2a-4b27-4647-b1d6-9d5684ff5d37','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.joinus.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('101','9fe82a2a-4b8c-4301-ad56-e348684bf784','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.newsletters.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('102','9fe82a2a-4bf3-49a6-8e64-13688cc2bd25','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.packagemanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('103','9fe82a2a-4c55-403a-9907-f21045aa8f16','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.projectmanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('104','9fe82a2a-4cbc-4fe5-8f04-a8cfd646b47e','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.reportmanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('105','9fe82a2a-4d1e-4263-be55-c036b7b43b73','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.reviewmanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('106','9fe82a2a-4d85-42d3-8820-ad6cbb247748','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.servicemanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('107','9fe82a2a-4dea-45f4-9b46-fdbe3c4ff64f','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.settingmanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('108','9fe82a2a-4e4e-48b2-a4f7-5ab36c352f95','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.slidermanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('109','9fe82a2a-4eb2-4e63-b5d4-ad71186fbdb8','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.staticpages.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('110','9fe82a2a-4f18-4f3d-8143-6e9f67a2c698','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.teammanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('111','9fe82a2a-4f80-4c9a-8532-cc39eca89bfd','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.testimonialmanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('112','9fe82a2a-4fed-4440-bb2d-1b6a14fbbb93','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.trainermanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('113','9fe82a2a-5086-4cb4-81b1-1dc12384105d','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.twitterintefrationmanagement.register\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('114','9fe82a2a-d733-4d38-bf7e-4a13100ade87','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.adminmanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('115','9fe82a2a-d752-4d18-bdbb-dabf6644a64d','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.appointment.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('116','9fe82a2a-d769-4f1c-a48b-e2f629bc6a98','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.areamanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('117','9fe82a2a-d785-4197-b674-55ca6bcd89cc','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.blogmanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('118','9fe82a2a-d79c-40ef-9486-f35029e1b315','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.clientmanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('119','9fe82a2a-d7b2-44ef-bf6b-01172fe411ce','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.contactus.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('120','9fe82a2a-d7c7-4b8a-8ab1-1119f2d6ad91','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.faqmanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('121','9fe82a2a-d7dc-43f2-a359-1f46ab38ef0f','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.joinus.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('122','9fe82a2a-d7f0-4c44-a58b-4773d9ebb965','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.newsletters.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('123','9fe82a2a-d804-4625-857a-2c175a17fabd','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.packagemanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('124','9fe82a2a-d818-426b-89a7-cb60c7f93a61','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.projectmanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('125','9fe82a2a-d82d-4c14-977e-f7e9e40b2aa0','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.reportmanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('126','9fe82a2a-d841-42a7-968e-6eb5f24227df','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.reviewmanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('127','9fe82a2a-d855-42c5-bbf7-b0415f95514f','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.servicemanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('128','9fe82a2a-d86a-4639-aebd-b4a71d9b05e7','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.settingmanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('129','9fe82a2a-d87e-4e47-a753-ef54ef7d0955','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.slidermanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('130','9fe82a2a-d892-432d-b805-9bd780a65b22','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.staticpages.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('131','9fe82a2a-d8a7-4fd1-a03f-d661a6a9dc0d','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.teammanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('132','9fe82a2a-d8bb-4d80-a513-63b616d6f6f3','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.testimonialmanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('133','9fe82a2a-d8cf-4bd0-be2e-e82927143ff7','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.trainermanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('134','9fe82a2a-d8e3-4712-bd9d-0480fc4d5773','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','event','{\"name\":\"modules.twitterintefrationmanagement.boot\",\"payload\":[{\"class\":\"Nwidart\\\\Modules\\\\Laravel\\\\Module\",\"properties\":[]}],\"listeners\":[],\"broadcast\":false,\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:06'),('135','9fe82a30-4cd5-4537-b119-b70a214ddf70','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','query','{\"connection\":\"mysql\",\"driver\":\"mysql\",\"bindings\":[],\"sql\":\"SHOW TABLES\",\"time\":\"27.55\",\"slow\":false,\"file\":\"D:\\\\Durub Almustaqbal\\\\artisan\",\"line\":35,\"hash\":\"9c36cac1372650b703400c60dd29042c\",\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:10'),('136','9fe82a30-4df9-435c-b89d-0a93a00319f4','9fe82a30-4fc7-466f-ad73-e5ff81892b3d',NULL,'1','command','{\"command\":\"tinker\",\"exit_code\":0,\"arguments\":{\"command\":\"tinker\",\"include\":[]},\"options\":{\"execute\":\"echo \'Tables: \'; print_r(DB::select(\'SHOW TABLES\'));\",\"help\":false,\"quiet\":false,\"verbose\":false,\"version\":false,\"ansi\":null,\"no-interaction\":false,\"env\":null},\"hostname\":\"WIN-THTONUKKVRI\"}','2025-09-18 11:28:10');

-- Table structure for table `telescope_entries_tags`
DROP TABLE IF EXISTS `telescope_entries_tags`;
CREATE TABLE `telescope_entries_tags` (
  `entry_uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`entry_uuid`,`tag`),
  KEY `telescope_entries_tags_tag_index` (`tag`),
  CONSTRAINT `telescope_entries_tags_entry_uuid_foreign` FOREIGN KEY (`entry_uuid`) REFERENCES `telescope_entries` (`uuid`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data for table `telescope_entries_tags`
INSERT INTO `telescope_entries_tags` VALUES ('9fe82994-e289-4dcd-9c02-a3a01c32eeac','Modules\\SettingManagement\\App\\Models\\Setting');

-- Table structure for table `telescope_monitoring`
DROP TABLE IF EXISTS `telescope_monitoring`;
CREATE TABLE `telescope_monitoring` (
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`tag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `testimonials`
DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE `testimonials` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` json NOT NULL,
  `position` json NOT NULL,
  `text` json NOT NULL,
  `social_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `social_url` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `trainers`
DROP TABLE IF EXISTS `trainers`;
CREATE TABLE `trainers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trainee_count` int NOT NULL,
  `program_count` int NOT NULL,
  `hours_count` int NOT NULL,
  `hours_yafee_count` int NOT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `x` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `twitters`
DROP TABLE IF EXISTS `twitters`;
CREATE TABLE `twitters` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tweet_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `users`
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

COMMIT;
