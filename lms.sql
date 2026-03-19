-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2026 at 08:09 PM
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
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `class_sessions`
--

CREATE TABLE `class_sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `class_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('Upcoming','Completed','Cancelled') NOT NULL DEFAULT 'Upcoming',
  `class_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_sessions`
--

INSERT INTO `class_sessions` (`id`, `title`, `description`, `class_date`, `start_time`, `end_time`, `teacher_id`, `status`, `class_link`, `created_at`, `updated_at`) VALUES
(1, 'English', NULL, '2026-03-21', '10:00:00', '12:00:00', 4, 'Upcoming', NULL, '2026-02-18 04:36:09', '2026-02-24 03:59:56'),
(2, 'Special Class', NULL, '2026-02-21', '11:00:00', '13:00:00', 1, 'Completed', NULL, '2026-02-18 05:49:26', '2026-02-22 21:38:53');

-- --------------------------------------------------------

--
-- Table structure for table `class_session_student`
--

CREATE TABLE `class_session_student` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_session_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_session_student`
--

INSERT INTO `class_session_student` (`id`, `class_session_id`, `student_id`) VALUES
(3, 2, 1),
(4, 2, 2),
(7, 1, 1);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2026_02_14_012519_create_permission_tables', 2),
(7, '2026_02_14_023141_create_teachers_table', 3),
(8, '2026_02_17_052941_add_status_to_teachers_table', 4),
(9, '2026_02_17_060459_create_students_table', 5),
(10, '2026_02_17_061805_create_students_table', 6),
(11, '2026_02_17_214227_create_class_sessions_table', 7),
(12, '2026_02_17_231336_add_title_description_to_class_sessions_table', 8),
(13, '2026_02_20_205030_add_password_to_teachers_table', 9),
(14, '2026_02_20_205635_add_password_to_students_table', 10),
(15, '2026_02_23_224122_add_qualification_and_experience_to_teachers_table', 11),
(16, '2026_02_23_230619_create_parent_models_table', 12),
(17, '2026_03_03_003443_create_site_settings_table', 13),
(18, '2026_03_03_043533_add_photo_to_parents_table', 13),
(19, '2026_03_03_003443_create_site_settings_hours_table', 14),
(20, '2026_03_19_010131_add_registration_fields_to_students_table', 15),
(21, '2026_03_19_013122_make_password_nullable_in_students_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `relation` varchar(255) NOT NULL,
  `note` text DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`id`, `first_name`, `middle_name`, `last_name`, `email`, `phone`, `student_id`, `relation`, `note`, `password`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'John', NULL, 'Sam', 'sam@test.com', '647555555', 1, 'Father', NULL, '$2y$12$O.qGddUQqucZEToznlP8puUWu7y25pvSkYiK6roKrC.fnfv2zQjV.', 'parents/1/photos/01KJT6F896TSDDPF940ZCN095Z.png', '2026-02-24 04:22:22', '2026-03-03 20:53:36');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'manage courses', 'web', '2026-02-14 07:00:05', '2026-02-14 07:00:05'),
(2, 'manage users', 'web', '2026-02-14 07:00:05', '2026-02-14 07:00:05'),
(3, 'view courses1', 'web', '2026-02-14 07:00:05', '2026-02-16 06:34:49');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2026-02-14 06:40:01', '2026-02-14 07:20:15'),
(2, 'Admin', 'web', '2026-02-14 06:40:01', '2026-02-14 07:20:34'),
(3, 'Teacher', 'web', '2026-02-14 06:40:01', '2026-02-14 07:20:53'),
(4, 'HR', 'web', '2026-02-14 07:00:05', '2026-02-14 07:21:41'),
(5, 'Accountant1', 'web', '2026-02-15 21:48:50', '2026-02-16 06:34:21');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(1, 3),
(2, 2),
(3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `whatsapp_number` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `facebook_url` varchar(255) DEFAULT NULL,
  `instagram_url` varchar(255) DEFAULT NULL,
  `twitter_url` varchar(255) DEFAULT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `youtube_url` varchar(255) DEFAULT NULL,
  `monday_start` time DEFAULT NULL,
  `monday_end` time DEFAULT NULL,
  `tuesday_start` time DEFAULT NULL,
  `tuesday_end` time DEFAULT NULL,
  `wednesday_start` time DEFAULT NULL,
  `wednesday_end` time DEFAULT NULL,
  `thursday_start` time DEFAULT NULL,
  `thursday_end` time DEFAULT NULL,
  `friday_start` time DEFAULT NULL,
  `friday_end` time DEFAULT NULL,
  `saturday_start` time DEFAULT NULL,
  `saturday_end` time DEFAULT NULL,
  `sunday_start` time DEFAULT NULL,
  `sunday_end` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `contact_email`, `phone_number`, `whatsapp_number`, `address`, `facebook_url`, `instagram_url`, `twitter_url`, `linkedin_url`, `youtube_url`, `monday_start`, `monday_end`, `tuesday_start`, `tuesday_end`, `wednesday_start`, `wednesday_end`, `thursday_start`, `thursday_end`, `friday_start`, `friday_end`, `saturday_start`, `saturday_end`, `sunday_start`, `sunday_end`, `created_at`, `updated_at`) VALUES
(1, 'info@tutor123.ca', '647-996-0389', '6476871322', '1-3120 Rutherford Road, Vaughan ON L4K 0B1 (Head Office)', NULL, 'https://www.instagram.com/tutor123.ca', NULL, 'https://www.linkedin.com/company/tutor123/', NULL, '10:00:00', '17:00:00', '10:00:00', '17:00:00', '10:00:00', '17:00:00', '10:00:00', '17:00:00', '10:00:00', '17:00:00', '10:00:00', '17:00:00', '22:00:00', '17:00:00', '2026-03-04 02:34:54', '2026-03-12 21:53:16');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `parent_name` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `medical_condition` varchar(255) DEFAULT NULL,
  `performance` text NOT NULL,
  `schedule` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`schedule`)),
  `terms` tinyint(1) NOT NULL DEFAULT 0,
  `source` enum('admin','website') NOT NULL DEFAULT 'website',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `first_name`, `middle_name`, `last_name`, `parent_name`, `grade`, `address`, `medical_condition`, `performance`, `schedule`, `terms`, `source`, `email`, `password`, `phone`, `dob`, `gender`, `image`, `document`, `status`, `note`, `created_at`, `updated_at`) VALUES
(1, 'S0001', 'Philip', NULL, 'John', '', '', '', NULL, '', NULL, 0, 'admin', 'test3@gmail.com', '', '77777777', '1999-01-01', NULL, NULL, 'students/1/documents/01KJ32D4DCYPHVCYRGYJ9C0BFP.pdf', 0, 'test', '2026-02-17 11:25:29', '2026-02-22 22:01:15'),
(2, 'S0002', 'Thomas', NULL, 'George', '', '', '', NULL, '', NULL, 0, 'admin', 'thomas@gmail.com', '', '647444444', '2000-02-02', 'Male', 'students/2/photos/01KHYDP16PX4D8SRVG8TNZNVRK.png', 'students/2/documents/01KJ32C7NCCM6GN1R7RGRR2J1E.pdf', 1, NULL, '2026-02-18 03:37:31', '2026-02-22 21:19:31'),
(3, 'S0003', 'Helen', NULL, 'Thomas', '', '', '', NULL, '', NULL, 0, 'admin', 'helen@test.com', '$2y$12$63dUym9HEDiSf.5MCpkBSumvQuhqloEtW2kc1q8Gl9iwoShvvKUb.', '647552366', NULL, NULL, NULL, NULL, 1, NULL, '2026-02-24 04:29:26', '2026-02-24 04:29:26'),
(4, 'S0004', 'kjkj', 'jnkn', 'kjn', 'kjnk', '5', 'edfgdfgfdgd', 'tedf', 'dsfdsfds', '{\"Monday\":\"3:00 PM\",\"Tuesday\":\"3:00 PM\",\"Wednesday\":\"4:00 PM\",\"Thursday\":\"5:00 PM\",\"Friday\":\"6:00 PM\",\"Saturday\":\"7:00 PM\"}', 1, 'website', 'fgf@dg.fsdf', NULL, '6475741236', '2005-02-02', 'Male', NULL, NULL, 0, NULL, '2026-03-19 05:38:05', '2026-03-19 05:56:04'),
(5, 'S0005', 'sdfdsf', 'sfsdf', 'sadff', 'sdfdsfds', '5', 'ytghfhg', NULL, 'yhtgyhjgj', '{\"Monday\":\"4:00 PM\",\"Tuesday\":\"5:00 PM\",\"Wednesday\":\"3:00 PM\",\"Thursday\":\"7:00 PM\",\"Friday\":\"6:00 PM\",\"Saturday\":\"5:00 PM\"}', 1, 'website', 'asdfsdf@werewr.err', NULL, '6476475623', '2012-03-07', 'Male', NULL, NULL, 0, NULL, '2026-03-19 06:34:59', '2026-03-19 06:34:59'),
(6, 'S0006', 'kmk', 'mjnkn', 'jn', 'nkjnkn', '4', 'sdfsfdsf', 'dsg', 'sdfd', '{\"Monday\":\"4:00 PM\",\"Tuesday\":\"5:00 PM\",\"Wednesday\":\"6:00 PM\"}', 1, 'website', 'asdsad@adew.efdsf', NULL, '6547563214', '2001-10-10', 'Male', NULL, NULL, 0, NULL, '2026-03-19 08:16:53', '2026-03-19 08:16:53'),
(7, 'S0007', 'kmk', 'knk', 'kjnjkn', 'nkjnk', '4', 'dsfdfgfddsg', 'sdgfv', 'dfgf', '{\"Monday\":\"6:00 PM\",\"Tuesday\":\"3:00 PM\",\"Wednesday\":\"4:00 PM\"}', 1, 'website', 'sam@test.com', NULL, '6547563258', '2001-10-10', 'Female', NULL, NULL, 0, NULL, '2026-03-19 08:42:52', '2026-03-19 08:42:52');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `teacher_id_document` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `years_of_experience` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `teacher_id`, `status`, `first_name`, `middle_name`, `last_name`, `email`, `password`, `phone`, `dob`, `gender`, `image`, `teacher_id_document`, `created_at`, `updated_at`, `qualification`, `years_of_experience`) VALUES
(1, 'T0001', 1, 'Sara', NULL, 'Sam', 'sara@gmail.com', '', '7774111111', '1999-01-01', 'Female', 'teachers/1/photos/01KJN2ZXV8PJ61W3KFA00TS4VA.jpg', 'teachers/1/documents/01KHVQ3T9ZS0MSMWTTT881ZHWT.pdf', '2026-02-17 10:26:26', '2026-03-01 21:16:36', 'Masters', 3),
(4, 'T0002', 1, 'Alex', NULL, 'John', 'alex@test.com', '$2y$12$oTeJuUggxntN.6fgbKVG/.rSi6DaNxLGJx8SEdxKHnTRh43onTnn6', '647772555', '2000-04-03', 'Male', 'teachers/new/photos/01KJ32FPDEZ817ZS617QFHY634.png', 'teachers/new/documents/01KJ32FPDS85VYQVYYHW8GQR7K.pdf', '2026-02-22 21:21:25', '2026-02-24 03:49:24', 'Masters', 3),
(5, 'T0003', 1, 'Mohamed', NULL, 'Ahmed', 'mo@gmail.com', '$2y$12$BWjkB6AKy3wuz3JVAnzfQeGg2ywBMa8vBWx21dKR9pXkV4T358Nde', '6471444444', '2000-05-03', 'Male', 'teachers/new/photos/01KJ6AWZPB8Y178CY7G1C0J9JS.png', NULL, '2026-02-24 03:46:12', '2026-02-24 03:48:11', 'Degree', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'technology@tutor123.ca', NULL, '$2y$12$Wfc9sXGzT1/gDR3mmKmDC.CIy2zZEv/N7bXAzNHgiOkW6OZ8RMxBW', 'edpxeNq4gRZgg6UrrIJMeuXiQM9ofyPpbYf85I0bneXaaf9ZY5h03anT7vCm', '2026-02-13 08:44:31', '2026-02-13 08:44:31'),
(2, 'Oleevia1', 'test@gmail.com', NULL, '$2y$12$d.Wv.7kudCtS980Rz1A1p.LjCKAUzyMh.TmBPW1oZSr8CmITbR8wy', 'e05AG6W95tzfZ2ZL8cKnaFdikOUlSrjPJ7SOMgZ9Gb7XSpUrRmP7OJd4qYFD', '2026-02-14 07:19:32', '2026-02-18 02:35:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class_sessions`
--
ALTER TABLE `class_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_sessions_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `class_session_student`
--
ALTER TABLE `class_session_student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_session_student_class_session_id_foreign` (`class_session_id`),
  ADD KEY `class_session_student_student_id_foreign` (`student_id`);

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
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `parents_email_unique` (`email`),
  ADD KEY `parents_student_id_foreign` (`student_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_student_id_unique` (`student_id`),
  ADD UNIQUE KEY `students_email_unique` (`email`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachers_teacher_id_unique` (`teacher_id`),
  ADD UNIQUE KEY `teachers_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `class_sessions`
--
ALTER TABLE `class_sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `class_session_student`
--
ALTER TABLE `class_session_student`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class_sessions`
--
ALTER TABLE `class_sessions`
  ADD CONSTRAINT `class_sessions_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `class_session_student`
--
ALTER TABLE `class_session_student`
  ADD CONSTRAINT `class_session_student_class_session_id_foreign` FOREIGN KEY (`class_session_id`) REFERENCES `class_sessions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `class_session_student_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `parents`
--
ALTER TABLE `parents`
  ADD CONSTRAINT `parents_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
