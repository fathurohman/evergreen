-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 30, 2021 at 03:55 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evergreen`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE `bagian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_bagian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`id`, `nama_bagian`, `created_at`, `updated_at`) VALUES
(1, 'Surabaya Office', '2021-08-14 06:28:53', '2021-08-14 19:56:46'),
(2, 'Jakarta Office', '2021-08-14 06:35:45', '2021-08-14 19:56:34');

-- --------------------------------------------------------

--
-- Table structure for table `data_pelamar`
--

CREATE TABLE `data_pelamar` (
  `id_data_pelamar` int(11) NOT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `personal_name` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `current_address` varchar(255) DEFAULT NULL,
  `phone_current_address` varchar(255) DEFAULT NULL,
  `permanent_address` varchar(255) DEFAULT NULL,
  `phone_permanent_address` varchar(255) DEFAULT NULL,
  `place_date_birth` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `ethnic` varchar(255) DEFAULT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `year_married` varchar(255) DEFAULT NULL,
  `name_wife_husband` varchar(255) DEFAULT NULL,
  `sex_wife_husband` varchar(255) DEFAULT NULL,
  `age_wife_husband` varchar(255) DEFAULT NULL,
  `education_wife_husband` varchar(255) DEFAULT NULL,
  `occupation_wife_husband` varchar(255) DEFAULT NULL,
  `name_first_child` varchar(255) DEFAULT NULL,
  `sex_first_child` varchar(255) DEFAULT NULL,
  `age_first_child` varchar(255) DEFAULT NULL,
  `education_first_child` varchar(255) DEFAULT NULL,
  `occupation_first_child` varchar(255) DEFAULT NULL,
  `name_second_child` varchar(255) DEFAULT NULL,
  `sex_second_child` varchar(255) DEFAULT NULL,
  `age_second_child` varchar(255) DEFAULT NULL,
  `education_second_child` varchar(255) DEFAULT NULL,
  `occupation_second_child` varchar(255) DEFAULT NULL,
  `name_third_child` varchar(255) DEFAULT NULL,
  `sex_third_child` varchar(255) DEFAULT NULL,
  `age_third_child` varchar(255) DEFAULT NULL,
  `education_third_child` varchar(255) DEFAULT NULL,
  `occupation_third_child` varchar(255) DEFAULT NULL,
  `name_father` varchar(255) DEFAULT NULL,
  `sex_father` varchar(255) DEFAULT NULL,
  `age_father` varchar(255) DEFAULT NULL,
  `education_father` varchar(255) DEFAULT NULL,
  `occupation_father` varchar(255) DEFAULT NULL,
  `name_mother` varchar(255) DEFAULT NULL,
  `sex_mother` varchar(255) DEFAULT NULL,
  `age_mother` varchar(255) DEFAULT NULL,
  `education_mother` varchar(255) DEFAULT NULL,
  `occupation_mother` varchar(255) DEFAULT NULL,
  `name_your_first_child` varchar(255) DEFAULT NULL,
  `sex_your_first_child` varchar(255) DEFAULT NULL,
  `age_your_first_child` varchar(255) DEFAULT NULL,
  `education_your_first_child` varchar(255) DEFAULT NULL,
  `occupation_your_first_child` varchar(255) DEFAULT NULL,
  `name_your_second_child` varchar(255) DEFAULT NULL,
  `sex_your_second_child` varchar(255) DEFAULT NULL,
  `age_your_second_child` varchar(255) DEFAULT NULL,
  `education_your_second_child` varchar(255) DEFAULT NULL,
  `occupation_your_second_child` varchar(255) DEFAULT NULL,
  `name_your_third_child` varchar(255) DEFAULT NULL,
  `sex_your_third_child` varchar(255) DEFAULT NULL,
  `age_your_third_child` varchar(255) DEFAULT NULL,
  `education_your_third_child` varchar(255) DEFAULT NULL,
  `occupation_your_third_child` varchar(255) DEFAULT NULL,
  `name_your_fourth_child` varchar(255) DEFAULT NULL,
  `sex_your_fourth_child` varchar(255) DEFAULT NULL,
  `age_your_fourth_child` varchar(255) DEFAULT NULL,
  `education_your_fourth_child` varchar(255) DEFAULT NULL,
  `occupation_your_fourth_child` varchar(255) DEFAULT NULL,
  `name_your_fifth_child` varchar(255) DEFAULT NULL,
  `sex_your_fifth_child` varchar(255) DEFAULT NULL,
  `age_your_fifth_child` varchar(255) DEFAULT NULL,
  `education_your_fifth_child` varchar(255) DEFAULT NULL,
  `occupation_your_fifth_child` varchar(255) DEFAULT NULL,
  `name_elementary` varchar(255) DEFAULT NULL,
  `location_elementary` varchar(255) DEFAULT NULL,
  `year_enrolled_elementary` varchar(255) DEFAULT NULL,
  `year_graduated_elementary` varchar(255) DEFAULT NULL,
  `name_junior` varchar(255) DEFAULT NULL,
  `location_junior` varchar(255) DEFAULT NULL,
  `year_enrolled_junior` varchar(255) DEFAULT NULL,
  `year_graduated_junior` varchar(255) DEFAULT NULL,
  `name_senior` varchar(255) DEFAULT NULL,
  `location_senior` varchar(255) DEFAULT NULL,
  `year_enrolled_senior` varchar(255) DEFAULT NULL,
  `year_graduated_senior` varchar(255) DEFAULT NULL,
  `name_university` varchar(255) DEFAULT NULL,
  `location_university` varchar(255) DEFAULT NULL,
  `year_enrolled_university` varchar(255) DEFAULT NULL,
  `year_graduated_university` varchar(255) DEFAULT NULL,
  `name_graduate` varchar(255) DEFAULT NULL,
  `location_graduate` varchar(255) DEFAULT NULL,
  `year_enrolled_graduate` varchar(255) DEFAULT NULL,
  `year_graduated_graduate` varchar(255) DEFAULT NULL,
  `training_1` varchar(255) DEFAULT NULL,
  `year_training_1` varchar(255) DEFAULT NULL,
  `length_training_1` varchar(255) DEFAULT NULL,
  `year_length_1` varchar(255) DEFAULT NULL,
  `financed_1` varchar(255) DEFAULT NULL,
  `training_2` varchar(255) DEFAULT NULL,
  `year_training_2` varchar(255) DEFAULT NULL,
  `length_training_2` varchar(255) DEFAULT NULL,
  `year_length_2` varchar(255) DEFAULT NULL,
  `financed_2` varchar(255) DEFAULT NULL,
  `training_3` varchar(255) DEFAULT NULL,
  `year_training_3` varchar(255) DEFAULT NULL,
  `length_training_3` varchar(255) DEFAULT NULL,
  `year_length_3` varchar(255) DEFAULT NULL,
  `financed_3` varchar(255) DEFAULT NULL,
  `foreign_language_1` varchar(255) DEFAULT NULL,
  `active_1` varchar(255) DEFAULT NULL,
  `foreign_language_2` varchar(255) DEFAULT NULL,
  `active_2` varchar(255) DEFAULT NULL,
  `dialect_1` varchar(255) DEFAULT NULL,
  `active_dialect_1` varchar(255) DEFAULT NULL,
  `dialect_2` varchar(255) DEFAULT NULL,
  `active_dialect_2` varchar(255) DEFAULT NULL,
  `year_from_1` varchar(255) DEFAULT NULL,
  `year_till_1` varchar(255) DEFAULT NULL,
  `name_address_employer_1` varchar(255) DEFAULT NULL,
  `phone_name_address_employer_1` varchar(255) DEFAULT NULL,
  `position_1` varchar(255) DEFAULT NULL,
  `resignation_plans` varchar(255) DEFAULT NULL,
  `explain_reasons` varchar(255) DEFAULT NULL,
  `salary_1` varchar(255) DEFAULT NULL,
  `year_from_2` varchar(255) DEFAULT NULL,
  `year_till_2` varchar(255) DEFAULT NULL,
  `name_address_employer_2` varchar(255) DEFAULT NULL,
  `phone_name_address_employer_2` varchar(255) DEFAULT NULL,
  `position_2` varchar(255) DEFAULT NULL,
  `salary_2` varchar(255) DEFAULT NULL,
  `reason_resigning_1` varchar(255) DEFAULT NULL,
  `year_from_3` varchar(255) DEFAULT NULL,
  `year_till_3` varchar(255) DEFAULT NULL,
  `name_address_employer_3` varchar(255) DEFAULT NULL,
  `phone_name_address_employer_3` varchar(255) DEFAULT NULL,
  `position_3` varchar(255) DEFAULT NULL,
  `salary_3` varchar(255) DEFAULT NULL,
  `reason_resigning_2` varchar(255) DEFAULT NULL,
  `id_bagian` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `expect_salary` varchar(255) DEFAULT NULL,
  `expect_allowance` varchar(255) DEFAULT NULL,
  `hobbies` varchar(255) DEFAULT NULL,
  `organizational_activities` varchar(255) DEFAULT NULL,
  `name_organization_1` varchar(255) DEFAULT NULL,
  `type_organization_1` varchar(255) DEFAULT NULL,
  `year_organization_1` varchar(255) DEFAULT NULL,
  `position_organization_1` varchar(255) DEFAULT NULL,
  `name_organization_2` varchar(255) DEFAULT NULL,
  `type_organization_2` varchar(255) DEFAULT NULL,
  `year_organization_2` varchar(255) DEFAULT NULL,
  `position_organization_2` varchar(255) DEFAULT NULL,
  `name_organization3` varchar(255) DEFAULT NULL,
  `type_organization_3` varchar(255) DEFAULT NULL,
  `year_organization_3` varchar(255) DEFAULT NULL,
  `position_organization_3` varchar(255) DEFAULT NULL,
  `experiences_leader_1` varchar(255) DEFAULT NULL,
  `experiences_leader_2` varchar(255) DEFAULT NULL,
  `height` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `hospitalized` varchar(255) DEFAULT NULL,
  `which_year` varchar(255) DEFAULT NULL,
  `how_long` varchar(255) DEFAULT NULL,
  `diagnosis` varchar(255) DEFAULT NULL,
  `hospitalized_in` varchar(255) DEFAULT NULL,
  `name_working_1` varchar(255) DEFAULT NULL,
  `position_working_1` varchar(255) DEFAULT NULL,
  `office_working_1` varchar(255) DEFAULT NULL,
  `length_working_1` varchar(255) DEFAULT NULL,
  `name_working_2` varchar(255) DEFAULT NULL,
  `position_working_2` varchar(255) DEFAULT NULL,
  `office_working_2` varchar(255) DEFAULT NULL,
  `length_working_2` varchar(255) DEFAULT NULL,
  `name_working_3` varchar(255) DEFAULT NULL,
  `position_working_3` varchar(255) DEFAULT NULL,
  `office_working_3` varchar(255) DEFAULT NULL,
  `length_working_3` varchar(255) DEFAULT NULL,
  `side_jobs` varchar(255) DEFAULT NULL,
  `working_as` varchar(255) DEFAULT NULL,
  `remuneration` varchar(255) DEFAULT NULL,
  `laws` varchar(255) DEFAULT NULL,
  `type_case` varchar(255) DEFAULT NULL,
  `sanction` varchar(255) DEFAULT NULL,
  `when_where` varchar(255) DEFAULT NULL,
  `career_development` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(4, '2021_08_14_060016_create_post_lowongan_table', 2),
(5, '2021_08_14_060418_create_bagian_table', 2),
(6, '2021_08_14_061017_create_data_pelamar_table', 3),
(7, '2021_08_14_115456_create_shared_table', 4);

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
-- Table structure for table `post_lowongan`
--

CREATE TABLE `post_lowongan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_bagian` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `kualifikasi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_lowongan`
--

INSERT INTO `post_lowongan` (`id`, `id_bagian`, `judul`, `image`, `deskripsi`, `kualifikasi`, `tanggal_akhir`, `created_at`, `updated_at`) VALUES
(4, 2, 'test', '1628998439.png', '1. oke\r\n2. iya', 'kaya gini\r\nkaya gitu\r\nokeh hahaha', '2021-08-15', '2021-08-14 20:33:59', '2021-08-14 20:33:59');

-- --------------------------------------------------------

--
-- Table structure for table `timer`
--

CREATE TABLE `timer` (
  `id` int(11) NOT NULL,
  `waktu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timer`
--

INSERT INTO `timer` (`id`, `waktu`) VALUES
(1, 60);

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$j5dK64t7tKpnpp.oHMeEguGrmdly7sGgASMktE72N3hvTQAlPeeiO', NULL, '2021-08-13 22:57:06', '2021-08-14 05:05:17'),
(2, 'Admin2', 'admin2@gmail.com', NULL, '$2y$10$g5L3MLGejfrbEiaxo6DGquk/a7.dNiRyXQVJUdY8rlTKz9WREgVC2', NULL, '2021-08-19 02:49:31', '2021-08-19 02:49:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pelamar`
--
ALTER TABLE `data_pelamar`
  ADD PRIMARY KEY (`id_data_pelamar`);

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
-- Indexes for table `post_lowongan`
--
ALTER TABLE `post_lowongan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timer`
--
ALTER TABLE `timer`
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
-- AUTO_INCREMENT for table `bagian`
--
ALTER TABLE `bagian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_pelamar`
--
ALTER TABLE `data_pelamar`
  MODIFY `id_data_pelamar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `post_lowongan`
--
ALTER TABLE `post_lowongan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `timer`
--
ALTER TABLE `timer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
