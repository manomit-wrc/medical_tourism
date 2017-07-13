-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2017 at 06:12 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical_tourism`
--

-- --------------------------------------------------------

--
-- Table structure for table `accomodations`
--

CREATE TABLE `accomodations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accomodations`
--

INSERT INTO `accomodations` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'private bed', 1, '2017-04-21 04:38:55', '2017-04-21 04:38:55'),
(2, 'semi-private bed', 1, '2017-04-21 04:39:26', '2017-04-21 04:39:26');

-- --------------------------------------------------------

--
-- Table structure for table `accrediations`
--

CREATE TABLE `accrediations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `accrediation_logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accrediations`
--

INSERT INTO `accrediations` (`id`, `name`, `accrediation_logo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'NABH', 'Desert.jpg', 1, '2017-04-21 05:27:33', '2017-04-21 06:40:34'),
(2, 'NABL', 'Tulips.jpg', 1, '2017-04-21 06:36:07', '2017-04-21 06:36:07');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `banner_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `banner_heading` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `banner_sub_heading` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `banner_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cuisines`
--

CREATE TABLE `cuisines` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cuisines`
--

INSERT INTO `cuisines` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'maldivian', 1, '2017-04-21 04:42:58', '2017-04-21 04:42:58'),
(2, 'chinese', 1, '2017-04-21 04:43:24', '2017-04-21 04:43:24');

-- --------------------------------------------------------

--
-- Table structure for table `language_capabilities`
--

CREATE TABLE `language_capabilities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `language_capabilities`
--

INSERT INTO `language_capabilities` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bangla', 1, '2017-04-21 04:34:32', '2017-04-21 04:34:32'),
(2, 'Arabic', 1, '2017-04-21 04:34:55', '2017-04-21 04:34:55'),
(3, 'Chinese', 1, '2017-04-21 04:35:14', '2017-04-21 04:35:14'),
(4, 'English', 1, '2017-04-21 04:35:29', '2017-04-21 04:35:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_04_07_050507_drop_name_to_users_table', 2),
(4, '2017_04_13_054018_create_procedures_table', 3),
(5, '2017_04_13_073110_procedure', 4),
(6, '2017_04_13_074936_add_status_to_procedures_tables', 5),
(7, '2017_04_13_092139_create_treatments_table', 6),
(15, '2017_04_13_094025_create_treatments_table', 7),
(16, '2017_04_13_104412_create_language_capabilities_table', 7),
(17, '2017_04_21_051438_create_accrediations_table', 7),
(18, '2017_04_21_073022_create_accomodations_table', 7),
(19, '2017_04_21_085431_create_cuisines_table', 7),
(20, '2017_04_21_092026_create_specific_service_table', 7),
(21, '2017_04_21_124438_create_banners_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `procedures`
--

CREATE TABLE `procedures` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `procedures`
--

INSERT INTO `procedures` (`id`, `name`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Allergy', '2017-04-17 05:22:07', '2017-04-17 07:37:09', 1),
(3, 'Cardiology', '2017-04-17 05:35:45', '2017-04-17 05:35:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `specific_services`
--

CREATE TABLE `specific_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `specific_services`
--

INSERT INTO `specific_services` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Presence of a hotel / food court within hospital', 1, '2017-04-21 04:44:21', '2017-04-21 04:44:21'),
(3, 'Facility for tele consultations for overseas patients', 1, '2017-04-21 04:44:47', '2017-04-21 04:44:47');

-- --------------------------------------------------------

--
-- Table structure for table `treatments`
--

CREATE TABLE `treatments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `procedure_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `treatments`
--

INSERT INTO `treatments` (`id`, `name`, `status`, `procedure_id`, `created_at`, `updated_at`) VALUES
(1, 'ALLERGIC & CHRONIC RHINITIS', 1, 1, '2017-04-21 04:36:58', '2017-04-21 04:36:58'),
(2, 'ALLERGIC & CHRONIC SINUSITIS', 1, 1, '2017-04-21 04:37:32', '2017-04-21 04:37:32'),
(3, 'AORTIC / PULMONARY / MITRAL BALLOON VALVULOPLASTY', 1, 3, '2017-04-21 04:38:08', '2017-04-21 04:38:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@wrctechnologies.com', '$2y$10$2lFiWWt2rS9UW6j33wJvy.I2vIWUpU8Jx035z1rpJgyN6e0ufrVHO', '3gEO2pihYVIJw4gVkzBeK4kxEwRRDCDDUhgFV4jlQ4bYRWr1DVYvofgV5VbQ', '2017-04-06 23:59:03', '2017-04-12 07:14:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accomodations`
--
ALTER TABLE `accomodations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `accomodations_name_unique` (`name`);

--
-- Indexes for table `accrediations`
--
ALTER TABLE `accrediations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `accrediations_name_unique` (`name`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cuisines`
--
ALTER TABLE `cuisines`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cuisines_name_unique` (`name`);

--
-- Indexes for table `language_capabilities`
--
ALTER TABLE `language_capabilities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `language_capabilities_name_unique` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `procedures`
--
ALTER TABLE `procedures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specific_services`
--
ALTER TABLE `specific_services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `specific_services_name_unique` (`name`);

--
-- Indexes for table `treatments`
--
ALTER TABLE `treatments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `treatments_name_unique` (`name`),
  ADD KEY `treatments_procedure_id_foreign` (`procedure_id`);

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
-- AUTO_INCREMENT for table `accomodations`
--
ALTER TABLE `accomodations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `accrediations`
--
ALTER TABLE `accrediations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cuisines`
--
ALTER TABLE `cuisines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `language_capabilities`
--
ALTER TABLE `language_capabilities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `procedures`
--
ALTER TABLE `procedures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `specific_services`
--
ALTER TABLE `specific_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `treatments`
--
ALTER TABLE `treatments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `treatments`
--
ALTER TABLE `treatments`
  ADD CONSTRAINT `treatments_procedure_id_foreign` FOREIGN KEY (`procedure_id`) REFERENCES `procedures` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
