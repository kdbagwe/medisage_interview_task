-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2022 at 08:31 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `interview_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(9, '2022_11_11_170530_create_students_table', 3),
(11, '2022_11_12_170418_add_profile_picture_to_users_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'user-auth-token', '2d6bd684d02e498989d671af1c7448dd74444cb2fba871c9c20c0ade95099d69', '[\"*\"]', NULL, NULL, '2022-11-11 12:04:21', '2022-11-11 12:04:21'),
(2, 'App\\Models\\User', 1, 'user-auth-token', 'd17636a97dcf3d9284952a7c8acc48310153b6adaa4e375dab65b52e56715678', '[\"*\"]', '2022-11-13 01:59:27', NULL, '2022-11-11 12:04:29', '2022-11-13 01:59:27'),
(3, 'App\\Models\\User', 1, 'user-auth-token', '685951cdfd393cb2be9698e7e3a2c4c39b349f9cf68ac3170ef2145aeb0cc4c9', '[\"*\"]', NULL, NULL, '2022-11-11 12:06:39', '2022-11-11 12:06:39'),
(4, 'App\\Models\\User', 1, 'user-auth-token', '52ba67b4a096168e3f48d7745fe8efc3aa2a6532323b5c98d50b35c9bcd3cc88', '[\"*\"]', NULL, NULL, '2022-11-11 12:52:14', '2022-11-11 12:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `uuid`, `name`, `phone_number`, `email`, `country`, `country_code`, `created_at`, `updated_at`) VALUES
(1, 'c036df1b-6dba-4748-9842-c5e8e8c8393b', 'Kaustubh Bagwe', '9787887222', 'kdbagwe@gmail.com', 'India', 91, '2022-11-11 12:38:59', '2022-11-11 12:38:59'),
(2, 'd8107f58-0f36-4985-ada5-383784d167e5', 'Rahul Singh', '8898986775', 'rahul@gmail.com', 'Peru', 51, '2022-11-11 12:52:10', '2022-11-11 12:52:10'),
(3, 'd10f0204-a6da-49fc-a8e8-842581c20f3e', 'Vinay Thakar', '9876543210', 'vinay@hotmail.com', 'Australia', 61, '2022-11-11 22:27:47', '2022-11-11 22:27:47'),
(4, '627d1700-0879-4869-b299-c106b874e6da', 'Jekin Vora', '9556677890', 'jekin@itechope.com', 'Afghanistan', 93, '2022-11-11 22:28:53', '2022-11-11 22:28:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `profile_picture`) VALUES
(1, 'Kaustubh Bagwe', 'kdbagwe@gmail.com', NULL, '$2y$10$SdP8FI/4o84ny4Bx5gPxz.fVWbRP3JHL1TloEOosS95TaqlrHesVK', NULL, NULL, NULL, '1668272612_author-1.jpg'),
(2, 'Ranjit', 'ranjit@gmail.com', NULL, '$2y$10$FVXGqWCBJugiUVHBjgbPeuMdgCvWnvivAsZGfXh9/ytZtiWa.1D4e', NULL, '2022-11-12 11:33:32', '2022-11-12 11:33:32', '1668272612_author-1.jpg'),
(3, 'Bhakti', 'bhakti@gmail.com', NULL, '$2y$10$mRfK80Bx5mRbduTIPCCBN.SBjxmUk7BmUBdEMgvJ7cmmim0Kehaxq', NULL, '2022-11-12 11:36:54', '2022-11-12 12:44:23', '1668276863_blog-1.jpg'),
(4, 'Jekin', 'jekin@abc.com', NULL, '$2y$10$ELMBJtXAeFudpES4tiOiM.C2UqmdrqOhehJagRaEDUspPanASFE9G', NULL, '2022-11-13 00:23:50', '2022-11-13 00:39:46', '1668319786_page-title-3.jpg'),
(5, 'Shushant', 'shushant@gmail.com', NULL, '$2y$10$gviOG1Xhhn3hSuomKxR7S.1639GzUXbhe9tuFYu253CdIbPNBMpRC', NULL, '2022-11-13 01:42:00', '2022-11-13 01:42:00', '1668323520_author-3.jpg'),
(6, 'Vinay', 'vinay@itechope.com', NULL, '$2y$10$6GrxHK2Q6xYTr9h2NNYrvO/WPySLWCsH6L7wz9l4Vay4R40X.rHii', NULL, '2022-11-13 01:43:11', '2022-11-13 01:43:11', '1668323591_5291450.jpg');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
