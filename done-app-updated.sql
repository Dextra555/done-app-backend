-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 28, 2025 at 11:33 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `done-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@example.com', '2025-06-10 18:47:54', '$2y$10$MpNo8i1yW4rftvPu.G/Rz.p1IQpBHyGTu.UAOfE5p.Jg4ekPFcvRW', NULL, '2025-06-10 18:47:54', '2025-06-10 19:38:36');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_sub_attributes`
--

CREATE TABLE `attribute_sub_attributes` (
  `id` int NOT NULL,
  `attribute_id` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attribute_values`
--

CREATE TABLE `attribute_values` (
  `id` int NOT NULL,
  `attribute_id` int NOT NULL,
  `sub_attribute_id` int DEFAULT NULL,
  `value` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `b2b_users`
--

CREATE TABLE `b2b_users` (
  `id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_otp` int DEFAULT NULL,
  `mobile_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration_id_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_license_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gst_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aadhar_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT '0',
  `login_status` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `b2b_users`
--

INSERT INTO `b2b_users` (`id`, `first_name`, `last_name`, `email`, `email_otp`, `mobile_number`, `password`, `company_name`, `registration_id_file`, `company_license_file`, `gst_file`, `pan_file`, `aadhar_file`, `is_approved`, `login_status`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'John', 'Doe', 'john.doe@example.com', 0, '9876543210', '$2y$12$33b7uFQTnlNvM97fCLnxkuHLig6CyH6SLE7qocku0EXMlDJ/1WqUm', 'ABC Corp', 'b2b/documents/4jnCqMuTcmRGRPWdUhHn_1749618678.pdf', 'b2b/documents/eMIhvhQO6xPcHBIdznz3_1749618678.pdf', 'b2b/documents/cbUV60Ly9UxAWpL22eUK_1749618678.pdf', 'b2b/documents/t2XS1AsJf1hM8kqD5lkL_1749618678.pdf', 'b2b/documents/nR77UVZCZHFEDs4H7hZJ_1749618678.pdf', 1, 0, NULL, NULL, '2025-06-11 12:11:19', '2025-06-11 12:11:19'),
(2, 'Wahid', 'A', 'wahiddextra@gmail.com', 0, '9876543211', '$2y$10$pMYmK.aBGZjx.MQHBMPVrudpjeOzVTqyJHoOz.uSSiho6tZuU.PW2', 'XYZ Corp', 'b2b/documents/r4i9QmCBwyy56Heql4bv_1749619036.pdf', 'b2b/documents/zOfZGBQOf3t5ogFZZOat_1749619036.pdf', 'b2b/documents/d72jqqk210r0P2VE0Gel_1749619036.pdf', 'b2b/documents/9U7GoS9aVFPS4kDjikFG_1749619036.pdf', 'b2b/documents/I3X1FsU5O6pmPZO2sb4U_1749619036.pdf', 0, 0, NULL, NULL, '2025-06-11 12:17:16', '2025-06-21 04:40:19'),
(3, 'Alice', 'Smith', 'alice.smith@example.com', 0, '9876543212', '$2y$10$RgwkLKJUWPx0EVyreUnGYuON/hR36FKhOdYtXyoBlLyqZzlmj4GVS', 'DEF Corp', 'b2b/documents/f8Wce8dljNle2MAcUaln_1749620083.pdf', 'b2b/documents/9k8M6OLndmdDh98LJPMD_1749620083.pdf', 'b2b/documents/jDz2iKAu26Ui6jV4ocuo_1749620083.pdf', 'b2b/documents/vsajoeWUNvgpqgKSwOWs_1749620083.pdf', 'b2b/documents/UJoJV7GYsqiMu3ZN95yO_1749620083.pdf', 0, 0, NULL, NULL, '2025-06-11 12:34:43', '2025-06-11 12:34:43'),
(4, 'Ram', 'C', 'ramkumar14@gmail.com', 0, '9090909094', '$2y$10$f3SYR.IQYffbXhXX8qLCT.hF2X5uTgllY7JdWNTcZD/cMIp/rXjfC', 'Global Tech Ltd', 'b2b/documents/iFoqsny6iMOVkmZB0Qwo_1750062469.jpg', 'b2b/documents/Sc8Ep8fBhwKRJuLkO4bU_1750062469.jpeg', 'b2b/documents/QdyHQmtRA4jkg0OTRDzk_1750062469.jpeg', 'b2b/documents/Oe6NBSaf8XTVnfhFbRaz_1750062469.jpeg', 'b2b/documents/AArW6Mfn2aaSRbbnShAO_1750062469.jpeg', 1, 1, NULL, NULL, '2025-06-16 08:27:49', '2025-06-16 10:30:05'),
(5, 'Pododa', 'Ram', 'pokoda@gmail.com', 0, '5432112345', '$2y$10$kehrACfVAkhrETnBgR2yheBPPD8D/T...FAKMQx8jrdrKvc55ftja', 'pokora & co', 'b2b/documents/L1YfZtk1JFSA5ftDSwL1_1750071026.jpg', 'b2b/documents/bYWsp8av6SLFKGPRgCFK_1750071026.jpg', 'b2b/documents/4TUzNVLxX2VxvhyT76TE_1750071026.jpg', 'b2b/documents/NNr2B2JD31l4pflMGAY0_1750071026.jpg', 'b2b/documents/ndzCRL7WDFzkmy0ZxdWW_1750071026.jpg', 0, 0, NULL, NULL, '2025-06-16 10:50:26', '2025-06-17 13:19:16'),
(6, 'prasanth', 'C', 'prasanthdextra@gmail.com', NULL, '9090909095', '$2y$10$9qjeIzWJHPZZKgK5MYhKBuu5rIYuCHU4uzVyUac6bR.2nN6U2vUgG', 'Global Tech Ltd', 'b2b/documents/pWNNstM9EPXpWYUdYwiF_1750680011.jpg', 'b2b/documents/8c7LzRQpxfliZ2ZKYNuu_1750680011.jpeg', 'b2b/documents/WzxAwLfML7oO8NxM7xHY_1750680011.jpeg', 'b2b/documents/sLbt8UzSEdUFNNbvr6Ho_1750680011.jpeg', 'b2b/documents/4qoVXQeTYHvHDSKNJhFm_1750680011.jpeg', 1, 1, NULL, NULL, '2025-06-23 12:00:11', '2025-06-26 12:34:57'),
(7, 'Maethew', 'M', 'vp578799@gmail.com', NULL, '8976546783', '$2y$10$oke6LDUGE6rH1viBG/HQvuEFt.g2EMMV.dqaWD6HaFy5BgKzxpl4C', 'Global Tech Ltd', 'b2b/documents/nMBRTaUzo54p56Kwpraa_1750940765.jpg', 'b2b/documents/xRgv0inX0xgTtBz5uOab_1750940765.jpeg', 'b2b/documents/k4CpahAoS98UKt0IhtrR_1750940765.jpeg', 'b2b/documents/r2oko8Wh8dEcffzgWKly_1750940765.jpeg', 'b2b/documents/x1SeSlsA54bb6cMVbEHH_1750940765.jpeg', 0, 0, NULL, NULL, '2025-06-26 12:26:05', '2025-06-26 12:26:05');

-- --------------------------------------------------------

--
-- Table structure for table `b2c_users`
--

CREATE TABLE `b2c_users` (
  `id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_login` tinyint(1) NOT NULL DEFAULT '1',
  `email_otp` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `b2c_users`
--

INSERT INTO `b2c_users` (`id`, `first_name`, `last_name`, `phone_number`, `email`, `password`, `is_login`, `email_otp`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'User', '9876543210', 'test@example.com', '$2y$10$9WeLqz29QonHISM/8qBpu.wLaC0gNdTGEPpNe6EvbqHp0SdwDHn2u', 1, NULL, '2025-06-17 01:57:22', '2025-06-17 01:57:22'),
(2, 'Test', 'User', '9876541210', 'test@eaaxample.com', '$2y$10$cOsxmN64yppSjAPUpfkBZur5v06cjWiNw50mliYc8icFN32nmZYPK', 1, NULL, '2025-06-17 02:01:26', '2025-06-17 02:01:26'),
(3, 'ram', 'User', '9o76541210', 'testaaa@eaaxample.com', '$2y$10$XP2Wz0019MEwo7JbDhViV.k8JMRk1INPj6o5EKWUeTGJOw8CeSVv.', 1, NULL, '2025-06-17 10:26:19', '2025-06-17 10:26:19'),
(4, 'Ram', 'kumar', '6958478569', 'rkumar12@gmail.com', '$2y$10$OdUQ1aOqhxXmkwKOrzUEbulZ08xCXm4teCtrEZgfC8UvvrJE.eQUO', 1, NULL, '2025-06-17 10:34:15', '2025-06-17 10:34:15'),
(5, 'ram', 'User', '9o7o541210', 'a@gmail.com', '$2y$10$hpE4eWglYaWghf9Zc/HIX.ZjfGthcevKAvK4xHjJCs7ff5AZ49QZm', 0, NULL, '2025-06-17 11:30:35', '2025-06-17 11:31:57'),
(6, 'ram', 'User', '8o7o541210', 'ab@gmail.com', '$2y$10$UmT6UY3HrmjPdIOi2b1hjetKsNKfnWUcsVjcx6cJXCb0czw6piVd6', 0, NULL, '2025-06-17 11:32:54', '2025-06-17 11:33:14'),
(7, 'ram', 'User', '7o7o541210', 'abc@gmail.com', '$2y$10$Ot9HjEbKlD.DkS7DsJzcEOiv7z.O2h3Ah72oIthf91aH2P0nEC472', 0, NULL, '2025-06-17 11:34:48', '2025-06-17 11:36:41'),
(8, 'ram', 'User', '717o541210', 'abcd@gmail.com', '$2y$10$lBZcRHaPwqP.wa6CkdH7z.Vye9GMfJMemKCKaHX79ekmqyVhRjWWy', 0, NULL, '2025-06-17 11:41:28', '2025-06-17 11:42:18'),
(9, 'prasanth', 'dextra', '8956239685', 'prasanthdextra@gmail.com', '$2y$10$gL1IcfWEaZP5kEPKrfsqwOE8Z4rO4QaDHs/9woG05ToAmN1eODrvm', 0, 3896, '2025-06-18 07:58:32', '2025-06-21 04:36:44'),
(10, 'ram', 'kumar', '8956239856', 'ramkumar@gmail.com', '$2y$10$ov7p8Q4lbiAVrtwfKoZeHuJKYuPGNDN52o7VP60nRmYMeB9Fap2tK', 0, NULL, '2025-06-24 07:55:18', '2025-06-24 07:55:34'),
(11, 'ram', 'User', '9876541211', 'test1@eaaxample.com', '$2y$10$BQz9iKA9SbeH4VF1rhtF5eVFuKAkT5wz.D.BxLJm/MV5NzxVtKI22', 0, NULL, '2025-07-02 07:13:59', '2025-07-02 07:16:11'),
(12, 'Ram', 'KUmar', '9658471236', 'ramkumar12@gmail.com', '$2y$10$rnL5pMzoGj8Lb3ZAl417geu6kJvwb8YJtvqwJx81720Z9z5pF.rvG', 0, NULL, '2025-07-21 05:04:57', '2025-07-21 05:05:34'),
(13, 'vijayan', 'C', '98562346649', 'vijayan@gmail.com', '$2y$10$.0W6SxxJWvUS0e8tO5dtTuB/e/0a8tItVEaeDf1MkiAysT0.VtkA6', 0, NULL, '2025-07-21 09:36:37', '2025-07-21 09:36:47'),
(14, 'Wahid', 'Dextra', '89562398569', 'wahiddextra@gmail.com', '$2y$10$s56NQDilr3A.Gf1rS7WkUOlhBj41hKB.sRM.MDdYDEJhJxVbS0BPa', 0, NULL, '2025-07-21 09:41:22', '2025-07-21 09:42:03'),
(15, 'John', 'Doe', '1234567890', 'john.doe@example.com', '$2y$10$/3yS67PM0Uo6BKkAhEe2H.vOOdHECj2PU8AcmLusv4e9WcbD4QPtW', 0, NULL, '2025-07-22 07:12:41', '2025-07-22 07:13:22'),
(16, 'ram', 'User', '9876542210', 'test@example2.com', '$2y$10$SUpM3VQjfN5/bTHCJqISAObksV.bp8K9PcWEapLUzagpFk2fQJ6kW', 0, NULL, '2025-07-22 07:24:33', '2025-07-22 07:25:53'),
(17, 'ram', 'User', '9875541210', 'test@example23.com', '$2y$10$YnlejZ9Yo7HvzV96IolLg.K7UL3aTsgTbW.QH2jWmC/d6WDCCwn5C', 0, NULL, '2025-07-22 13:44:24', '2025-07-22 13:44:30');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint UNSIGNED NOT NULL,
  `cart_id` bigint UNSIGNED NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_06_10_000000_create_admins_table', 1),
(6, '2025_06_11_045618_create_b2b_users_table', 2),
(7, '2025_07_01_000000_create_carts_table', 3),
(8, '2025_07_01_000001_create_cart_items_table', 4),
(9, '2025_07_01_000002_create_orders_table', 5),
(10, '2025_07_01_000003_create_order_items_table', 6),
(11, '2025_07_25_122921_add_address_lat_lng_to_orders_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `address` varchar(255) DEFAULT NULL,
  `latitude` decimal(10,7) DEFAULT NULL,
  `longitude` decimal(10,7) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\B2BUser', 1, 'b2b-token', '4e4b33bf60cd3dc1c63bd1acc854ba543b7381974536e0eff4e2c308cdd7ed0c', '[\"*\"]', NULL, NULL, '2025-06-11 12:11:19', '2025-06-11 12:11:19'),
(2, 'App\\Models\\B2BUser', 2, 'b2b-token', '52169fb646185f53863dfc674f5459df967b0f35ff03cd1741040e67fcb4ba28', '[\"*\"]', NULL, NULL, '2025-06-11 12:17:16', '2025-06-11 12:17:16'),
(3, 'App\\Models\\B2BUser', 1, 'Windows CMD', 'e1be8ae0dd304d9fc2bddfbc3d0460d0fff43265d6edb8b3d4e63f4bb45c0165', '[\"*\"]', NULL, NULL, '2025-06-11 12:24:40', '2025-06-11 12:24:40'),
(4, 'App\\Models\\B2BUser', 3, 'b2b-token', '4794328dea65e86c924a7af62dfed391421b2e9897d367f7dc25308aeb98260c', '[\"*\"]', NULL, NULL, '2025-06-11 12:34:43', '2025-06-11 12:34:43'),
(5, 'App\\Models\\B2BUser', 1, 'b2b-token', 'ae17b9d6f0b89eb9327255f11fd2eeb7fc562cb3e6aab9692cf41b6abea871cf', '[\"*\"]', NULL, NULL, '2025-06-13 01:35:23', '2025-06-13 01:35:23'),
(6, 'App\\Models\\B2BUser', 1, 'b2b-token', 'f4db4791e4ff25f0107b9fb7347dbf2c1e5526c32e3f38ea73d508fbb56daa8c', '[\"*\"]', NULL, NULL, '2025-06-13 01:38:15', '2025-06-13 01:38:15'),
(7, 'App\\Models\\B2BUser', 1, 'b2b-token', 'deeafe88f3e43534b408521917d246fbda6f991ab58ceb5d288862a4904e9aba', '[\"*\"]', NULL, NULL, '2025-06-13 01:38:43', '2025-06-13 01:38:43'),
(8, 'App\\Models\\B2BUser', 6, 'b2b-token', '912c6270332a8661bf16456ccb1bc62e1197768d0a1c4012f65441b526b70114', '[\"*\"]', NULL, NULL, '2025-06-26 12:34:57', '2025-06-26 12:34:57'),
(9, 'App\\Models\\B2BUser', 4, 'b2b-token', '7b53a6cf0474002d0a3c5bdda7515fc1fa45cf2b7d04bcf810ca493775ae3cd5', '[\"*\"]', NULL, NULL, '2025-06-26 12:36:06', '2025-06-26 12:36:06'),
(10, 'App\\Models\\B2BUser', 6, 'b2b-token', 'd6b92511465940102793b337884100769ac0a1cd7ae9e1ed6c3cc4032471bdd7', '[\"*\"]', NULL, NULL, '2025-07-22 07:23:12', '2025-07-22 07:23:12'),
(11, 'App\\Models\\B2CUser', 16, 'b2c-token', '5f3320e3b31c4528aa26f781b554db6829a28f44a978ab3084eea735add7243d', '[\"*\"]', '2025-07-24 05:51:11', NULL, '2025-07-22 07:25:53', '2025-07-24 05:51:11'),
(12, 'App\\Models\\B2CUser', 17, 'b2c-token', '8000a3bfde6d44b1d18e99e97cf0e0ef41d5ca7b53d5d77132400821c1b61785', '[\"*\"]', '2025-07-22 13:45:44', NULL, '2025-07-22 13:44:30', '2025-07-22 13:45:44'),
(13, 'App\\Models\\B2CUser', 17, 'b2c-token', '923edf1d3e0e9e8c981c7145753a84b131843cbb276154696753e4a135260876', '[\"*\"]', '2025-07-25 07:02:51', NULL, '2025-07-22 13:46:08', '2025-07-25 07:02:51'),
(14, 'App\\Models\\B2CUser', 12, 'b2c-token', '19c914802532d3929ca56a5365ecc5bebe67291fc044f4c5badd7c714baff283', '[\"*\"]', NULL, NULL, '2025-07-23 05:51:26', '2025-07-23 05:51:26'),
(15, 'App\\Models\\B2CUser', 12, 'b2c-token', '66ce7890c8a0cf77255a26a9607da4e04ad9f876fe40e898a3ca0ba8eea022d2', '[\"*\"]', NULL, NULL, '2025-07-23 05:59:49', '2025-07-23 05:59:49'),
(16, 'App\\Models\\B2CUser', 12, 'b2c-token', '6212b555cc5b5f0e2f71bc573c6309bcc788035d33d56453fcedc735616a44a5', '[\"*\"]', NULL, NULL, '2025-07-23 05:59:59', '2025-07-23 05:59:59'),
(17, 'App\\Models\\B2CUser', 12, 'b2c-token', '323ef795a202558f2bc61ce4badff5819b45dab8009e1d3fe599df8700762ce2', '[\"*\"]', NULL, NULL, '2025-07-23 06:00:14', '2025-07-23 06:00:14'),
(18, 'App\\Models\\B2CUser', 12, 'b2c-token', '5b8f8cecda0ba6fb07b3b71e11bbab8292da69d851eea5e18fb3e314adfb664f', '[\"*\"]', NULL, NULL, '2025-07-23 06:00:43', '2025-07-23 06:00:43'),
(19, 'App\\Models\\B2CUser', 12, 'b2c-token', 'cf5939c656ea24e9d1080421dbb7a59c72f4c751b198b47fc7497f9a66dd14a1', '[\"*\"]', NULL, NULL, '2025-07-23 06:01:55', '2025-07-23 06:01:55'),
(20, 'App\\Models\\B2CUser', 17, 'b2c-token', '54e37145ee22f7950bd3542b31fa560adeae988fec6679a705cf6c16ed049140', '[\"*\"]', NULL, NULL, '2025-07-23 06:01:59', '2025-07-23 06:01:59'),
(21, 'App\\Models\\B2CUser', 12, 'b2c-token', '615cd1d78cf2d9f41cbd997dd0ef4a81c48b2f897315b71346eb9f056d986739', '[\"*\"]', '2025-07-23 07:32:01', NULL, '2025-07-23 06:05:25', '2025-07-23 07:32:01'),
(22, 'App\\Models\\B2CUser', 12, 'b2c-token', '8687e301f05e1d302abee87ef953e7f4945c9ca909f9f86fdd1eb15649d1df6b', '[\"*\"]', NULL, NULL, '2025-07-23 06:06:40', '2025-07-23 06:06:40'),
(23, 'App\\Models\\B2CUser', 12, 'b2c-token', '951c7e4767aa5915206b6d27b630d4c86bb6710c1af247a0dd221b75ff479adc', '[\"*\"]', NULL, NULL, '2025-07-23 07:33:19', '2025-07-23 07:33:19'),
(24, 'App\\Models\\B2CUser', 12, 'b2c-token', 'd364c56bff659741b3d872d8b1fc11ad6531f025e4fb8398b408588565c02677', '[\"*\"]', '2025-07-23 10:02:12', NULL, '2025-07-23 07:44:42', '2025-07-23 10:02:12'),
(25, 'App\\Models\\B2CUser', 12, 'b2c-token', 'f76aec10dd7a2e1693ac7677a12433e3e3a8d53c986af584c4b3e4c3ade60bc4', '[\"*\"]', NULL, NULL, '2025-07-23 10:02:46', '2025-07-23 10:02:46'),
(26, 'App\\Models\\B2CUser', 12, 'b2c-token', '5ecbd469e35269e5b7bd8649353767c52f0cadd2c5d4f484e30a438d515c76ef', '[\"*\"]', '2025-07-23 12:34:34', NULL, '2025-07-23 10:02:47', '2025-07-23 12:34:34'),
(27, 'App\\Models\\B2CUser', 12, 'b2c-token', 'cb94c7d134df78686032a17dc64403d9c997d0cebcdecf064dfd56765adf80d0', '[\"*\"]', '2025-07-23 13:13:42', NULL, '2025-07-23 12:35:49', '2025-07-23 13:13:42'),
(28, 'App\\Models\\B2CUser', 12, 'b2c-token', '81817edcf7b44462fb36eac3fa1c3c6fb09a20810321669da923251d2a0747c3', '[\"*\"]', '2025-07-24 07:32:48', NULL, '2025-07-23 13:15:28', '2025-07-24 07:32:48'),
(29, 'App\\Models\\B2CUser', 17, 'b2c-token', 'a1e4b438200cf92d3a7b83ef3b74133e1f8fd283d001cf8f66e61b271c827f4f', '[\"*\"]', '2025-07-25 11:09:34', NULL, '2025-07-23 13:26:31', '2025-07-25 11:09:34'),
(30, 'App\\Models\\B2CUser', 12, 'b2c-token', '4448c2f668fbc4f5bde7f68e6718785e7cc67e860a68b4569abe2c4007f24137', '[\"*\"]', '2025-07-24 07:58:20', NULL, '2025-07-24 07:40:16', '2025-07-24 07:58:20'),
(31, 'App\\Models\\B2CUser', 12, 'b2c-token', 'f3c6702646c76762cb61ffacfd59de017a1343d7e78edb6feecf463cfd8a18b6', '[\"*\"]', NULL, NULL, '2025-07-25 07:51:40', '2025-07-25 07:51:40'),
(32, 'App\\Models\\B2CUser', 12, 'b2c-token', 'c5fe3e3bec08ffca0b0f231b8b8117b30ad94d73e0d2fdd32b624cad51104125', '[\"*\"]', '2025-07-25 12:09:13', NULL, '2025-07-25 07:51:40', '2025-07-25 12:09:13'),
(33, 'App\\Models\\B2CUser', 17, 'b2c-token', 'a4e172cb58ef9c30970407e04a6a46d6582b4fc74e74c37ef67bc37df6bc155b', '[\"*\"]', '2025-07-25 07:03:22', NULL, '2025-07-25 07:03:08', '2025-07-25 07:03:22'),
(34, 'App\\Models\\B2CUser', 17, 'b2c-token', 'b52ca9c84eccee4d6c45802caab4eee1308237bf8178fe12c2769332a4f78b5f', '[\"*\"]', '2025-07-25 07:06:47', NULL, '2025-07-25 07:04:00', '2025-07-25 07:06:47');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `subcategory_id` int DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `key_features` text,
  `cost_price` decimal(10,2) DEFAULT NULL,
  `selling_price` decimal(10,2) DEFAULT NULL,
  `stock` int DEFAULT '0',
  `status` enum('active','inactive') DEFAULT 'active',
  `average_rating` decimal(3,2) DEFAULT '0.00',
  `review_count` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `variant_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `type` enum('review','comment') DEFAULT 'review',
  `rating` tinyint DEFAULT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_tags`
--

CREATE TABLE `product_tags` (
  `product_id` int NOT NULL,
  `tag_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `sku` varchar(100) DEFAULT NULL,
  `stock` int DEFAULT '0',
  `price` decimal(10,2) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_variant_images`
--

CREATE TABLE `product_variant_images` (
  `id` int NOT NULL,
  `variant_id` int NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `type` enum('main','gallery') DEFAULT 'main'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `serviceName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uploadedDate` date DEFAULT NULL,
  `createdDate` date DEFAULT NULL,
  `productID` bigint UNSIGNED DEFAULT NULL,
  `categoryID` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_comments`
--

CREATE TABLE `service_comments` (
  `id` bigint UNSIGNED NOT NULL,
  `service_video_id` bigint UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_videos`
--

CREATE TABLE `service_videos` (
  `id` bigint UNSIGNED NOT NULL,
  `service_id` bigint UNSIGNED NOT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` int UNSIGNED NOT NULL DEFAULT '0',
  `comments_count` int UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `variant_attribute_values`
--

CREATE TABLE `variant_attribute_values` (
  `id` int NOT NULL,
  `variant_id` int NOT NULL,
  `attribute_value_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `attribute_sub_attributes`
--
ALTER TABLE `attribute_sub_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_id` (`attribute_id`);

--
-- Indexes for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_id` (`attribute_id`),
  ADD KEY `sub_attribute_id` (`sub_attribute_id`);

--
-- Indexes for table `b2b_users`
--
ALTER TABLE `b2b_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `b2b_users_email_unique` (`email`),
  ADD UNIQUE KEY `b2b_users_mobile_number_unique` (`mobile_number`);

--
-- Indexes for table `b2c_users`
--
ALTER TABLE `b2c_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `b2c_users_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `b2c_users_email_unique` (`email`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `product_id` (`product_id`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `subcategory_id` (`subcategory_id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `variant_id` (`variant_id`);

--
-- Indexes for table `product_tags`
--
ALTER TABLE `product_tags`
  ADD PRIMARY KEY (`product_id`,`tag_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku` (`sku`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_variant_images`
--
ALTER TABLE `product_variant_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `variant_id` (`variant_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_comments`
--
ALTER TABLE `service_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_video_id` (`service_video_id`);

--
-- Indexes for table `service_videos`
--
ALTER TABLE `service_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `variant_attribute_values`
--
ALTER TABLE `variant_attribute_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `variant_id` (`variant_id`),
  ADD KEY `attribute_value_id` (`attribute_value_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attribute_sub_attributes`
--
ALTER TABLE `attribute_sub_attributes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `b2b_users`
--
ALTER TABLE `b2b_users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `b2c_users`
--
ALTER TABLE `b2c_users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_variant_images`
--
ALTER TABLE `product_variant_images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_comments`
--
ALTER TABLE `service_comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_videos`
--
ALTER TABLE `service_videos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `variant_attribute_values`
--
ALTER TABLE `variant_attribute_values`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_sub_attributes`
--
ALTER TABLE `attribute_sub_attributes`
  ADD CONSTRAINT `attribute_sub_attributes_ibfk_1` FOREIGN KEY (`attribute_id`) REFERENCES `product_attributes` (`id`);

--
-- Constraints for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD CONSTRAINT `attribute_values_ibfk_1` FOREIGN KEY (`attribute_id`) REFERENCES `product_attributes` (`id`),
  ADD CONSTRAINT `attribute_values_ibfk_2` FOREIGN KEY (`sub_attribute_id`) REFERENCES `attribute_sub_attributes` (`id`);

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`);

--
-- Constraints for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `product_reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_reviews_ibfk_2` FOREIGN KEY (`variant_id`) REFERENCES `product_variants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_tags`
--
ALTER TABLE `product_tags`
  ADD CONSTRAINT `product_tags_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `product_variants_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_variant_images`
--
ALTER TABLE `product_variant_images`
  ADD CONSTRAINT `product_variant_images_ibfk_1` FOREIGN KEY (`variant_id`) REFERENCES `product_variants` (`id`);

--
-- Constraints for table `service_comments`
--
ALTER TABLE `service_comments`
  ADD CONSTRAINT `service_comments_ibfk_1` FOREIGN KEY (`service_video_id`) REFERENCES `service_videos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_videos`
--
ALTER TABLE `service_videos`
  ADD CONSTRAINT `service_videos_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `variant_attribute_values`
--
ALTER TABLE `variant_attribute_values`
  ADD CONSTRAINT `variant_attribute_values_ibfk_1` FOREIGN KEY (`variant_id`) REFERENCES `product_variants` (`id`),
  ADD CONSTRAINT `variant_attribute_values_ibfk_2` FOREIGN KEY (`attribute_value_id`) REFERENCES `attribute_values` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
