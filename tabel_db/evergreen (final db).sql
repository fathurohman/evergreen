-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 10, 2021 at 02:59 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.20

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
(1, 'SURABAYA OFFICE', '2021-08-14 06:28:53', '2021-08-16 19:56:54'),
(2, 'JAKARTA OFFICE', '2021-08-14 06:35:45', '2021-08-16 20:52:08');

-- --------------------------------------------------------

--
-- Table structure for table `b_inggris`
--

CREATE TABLE `b_inggris` (
  `id` int(11) NOT NULL,
  `id_data_pelamar` int(11) DEFAULT NULL,
  `jwb_1` varchar(50) DEFAULT NULL,
  `jwb_2` varchar(50) DEFAULT NULL,
  `jwb_3` varchar(50) DEFAULT NULL,
  `jwb_4` varchar(50) DEFAULT NULL,
  `jwb_5` varchar(50) DEFAULT NULL,
  `jwb_6` varchar(50) DEFAULT NULL,
  `jwb_7` varchar(50) DEFAULT NULL,
  `jwb_8` varchar(50) DEFAULT NULL,
  `jwb_9` varchar(50) DEFAULT NULL,
  `jwb_10` varchar(50) DEFAULT NULL,
  `jwb_11` varchar(50) DEFAULT NULL,
  `jwb_12` varchar(50) DEFAULT NULL,
  `jwb_13` varchar(50) DEFAULT NULL,
  `jwb_14` varchar(50) DEFAULT NULL,
  `jwb_15` varchar(50) DEFAULT NULL,
  `jwb_16` varchar(50) DEFAULT NULL,
  `jwb_17` varchar(50) DEFAULT NULL,
  `jwb_18` varchar(50) DEFAULT NULL,
  `jwb_19` varchar(50) DEFAULT NULL,
  `jwb_20` varchar(50) DEFAULT NULL,
  `jwb_21` varchar(50) DEFAULT NULL,
  `jwb_22` varchar(50) DEFAULT NULL,
  `jwb_23` varchar(50) DEFAULT NULL,
  `jwb_24` varchar(50) DEFAULT NULL,
  `jwb_25` varchar(50) DEFAULT NULL,
  `jwb_26` varchar(50) DEFAULT NULL,
  `jwb_27` varchar(50) DEFAULT NULL,
  `jwb_28` varchar(50) DEFAULT NULL,
  `jwb_29` varchar(50) DEFAULT NULL,
  `jwb_30` varchar(50) DEFAULT NULL,
  `jwb_31` varchar(50) DEFAULT NULL,
  `jwb_32` varchar(50) DEFAULT NULL,
  `jwb_33` varchar(50) DEFAULT NULL,
  `jwb_34` varchar(50) DEFAULT NULL,
  `jwb_35` varchar(50) DEFAULT NULL,
  `jwb_36` varchar(50) DEFAULT NULL,
  `jwb_37` varchar(50) DEFAULT NULL,
  `jwb_38` varchar(50) DEFAULT NULL,
  `jwb_39` varchar(50) DEFAULT NULL,
  `jwb_40` varchar(50) DEFAULT NULL,
  `jwb_41` varchar(50) DEFAULT NULL,
  `jwb_42` varchar(50) DEFAULT NULL,
  `jwb_43` varchar(50) DEFAULT NULL,
  `jwb_44` varchar(50) DEFAULT NULL,
  `jwb_45` varchar(50) DEFAULT NULL,
  `jwb_46` varchar(50) DEFAULT NULL,
  `jwb_47` varchar(50) DEFAULT NULL,
  `jwb_48` varchar(50) DEFAULT NULL,
  `jwb_49` varchar(50) DEFAULT NULL,
  `jwb_50` varchar(50) DEFAULT NULL,
  `jwb_51` varchar(50) DEFAULT NULL,
  `jwb_52` varchar(50) DEFAULT NULL,
  `jwb_53` varchar(50) DEFAULT NULL,
  `jwb_54` varchar(50) DEFAULT NULL,
  `jwb_55` varchar(50) DEFAULT NULL,
  `jwb_56` varchar(50) DEFAULT NULL,
  `jwb_57` varchar(50) DEFAULT NULL,
  `jwb_58` varchar(50) DEFAULT NULL,
  `jwb_59` varchar(50) DEFAULT NULL,
  `jwb_60` varchar(50) DEFAULT NULL,
  `jwb_61` varchar(50) DEFAULT NULL,
  `jwb_62` varchar(50) DEFAULT NULL,
  `jwb_63` varchar(50) DEFAULT NULL,
  `jwb_64` varchar(50) DEFAULT NULL,
  `jwb_65` varchar(50) DEFAULT NULL,
  `jwb_66` varchar(50) DEFAULT NULL,
  `jwb_67` varchar(50) DEFAULT NULL,
  `jwb_68` varchar(50) DEFAULT NULL,
  `jwb_69` varchar(50) DEFAULT NULL,
  `jwb_70` varchar(50) DEFAULT NULL,
  `jwb_71` varchar(50) DEFAULT NULL,
  `jwb_72` varchar(50) DEFAULT NULL,
  `jwb_73` varchar(50) DEFAULT NULL,
  `jwb_74` varchar(50) DEFAULT NULL,
  `jwb_75` varchar(50) DEFAULT NULL,
  `jwb_76` varchar(50) DEFAULT NULL,
  `jwb_77` varchar(50) DEFAULT NULL,
  `jwb_78` varchar(50) DEFAULT NULL,
  `jwb_79` varchar(50) DEFAULT NULL,
  `jwb_80` varchar(50) DEFAULT NULL,
  `jwb_81` varchar(50) DEFAULT NULL,
  `jwb_82` varchar(50) DEFAULT NULL,
  `jwb_83` varchar(50) DEFAULT NULL,
  `jwb_84` varchar(50) DEFAULT NULL,
  `jwb_85` varchar(50) DEFAULT NULL,
  `jwb_86` varchar(50) DEFAULT NULL,
  `jwb_87` varchar(50) DEFAULT NULL,
  `jwb_88` varchar(50) DEFAULT NULL,
  `jwb_89` varchar(50) DEFAULT NULL,
  `jwb_90` varchar(50) DEFAULT NULL,
  `jwb_91` varchar(50) DEFAULT NULL,
  `jwb_92` varchar(50) DEFAULT NULL,
  `jwb_93` varchar(50) DEFAULT NULL,
  `jwb_94` varchar(50) DEFAULT NULL,
  `jwb_95` varchar(50) DEFAULT NULL,
  `jwb_96` varchar(50) DEFAULT NULL,
  `jwb_97` varchar(50) DEFAULT NULL,
  `jwb_98` varchar(50) DEFAULT NULL,
  `jwb_99` varchar(50) DEFAULT NULL,
  `jwb_100` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `b_inggris`
--

INSERT INTO `b_inggris` (`id`, `id_data_pelamar`, `jwb_1`, `jwb_2`, `jwb_3`, `jwb_4`, `jwb_5`, `jwb_6`, `jwb_7`, `jwb_8`, `jwb_9`, `jwb_10`, `jwb_11`, `jwb_12`, `jwb_13`, `jwb_14`, `jwb_15`, `jwb_16`, `jwb_17`, `jwb_18`, `jwb_19`, `jwb_20`, `jwb_21`, `jwb_22`, `jwb_23`, `jwb_24`, `jwb_25`, `jwb_26`, `jwb_27`, `jwb_28`, `jwb_29`, `jwb_30`, `jwb_31`, `jwb_32`, `jwb_33`, `jwb_34`, `jwb_35`, `jwb_36`, `jwb_37`, `jwb_38`, `jwb_39`, `jwb_40`, `jwb_41`, `jwb_42`, `jwb_43`, `jwb_44`, `jwb_45`, `jwb_46`, `jwb_47`, `jwb_48`, `jwb_49`, `jwb_50`, `jwb_51`, `jwb_52`, `jwb_53`, `jwb_54`, `jwb_55`, `jwb_56`, `jwb_57`, `jwb_58`, `jwb_59`, `jwb_60`, `jwb_61`, `jwb_62`, `jwb_63`, `jwb_64`, `jwb_65`, `jwb_66`, `jwb_67`, `jwb_68`, `jwb_69`, `jwb_70`, `jwb_71`, `jwb_72`, `jwb_73`, `jwb_74`, `jwb_75`, `jwb_76`, `jwb_77`, `jwb_78`, `jwb_79`, `jwb_80`, `jwb_81`, `jwb_82`, `jwb_83`, `jwb_84`, `jwb_85`, `jwb_86`, `jwb_87`, `jwb_88`, `jwb_89`, `jwb_90`, `jwb_91`, `jwb_92`, `jwb_93`, `jwb_94`, `jwb_95`, `jwb_96`, `jwb_97`, `jwb_98`, `jwb_99`, `jwb_100`, `created_at`, `updated_at`) VALUES
(4, 3, 'c', 'b', 'a', 'b', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_pelamar`
--

CREATE TABLE `data_pelamar` (
  `id` int(11) NOT NULL,
  `id_post_lowongan` int(11) NOT NULL,
  `id_card_number` varchar(255) DEFAULT NULL,
  `personal_name` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `current_address` varchar(255) DEFAULT NULL,
  `phone_current_address` varchar(255) DEFAULT NULL,
  `permanent_address` varchar(255) DEFAULT NULL,
  `phone_permanent_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
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
  `id_department` varchar(255) DEFAULT NULL,
  `id_position` varchar(255) DEFAULT NULL,
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
  `name_organization_3` varchar(255) DEFAULT NULL,
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
  `file_photo` varchar(255) DEFAULT NULL,
  `file_cv` varchar(255) DEFAULT NULL,
  `status_accepted` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pelamar`
--

INSERT INTO `data_pelamar` (`id`, `id_post_lowongan`, `id_card_number`, `personal_name`, `sex`, `current_address`, `phone_current_address`, `permanent_address`, `phone_permanent_address`, `email`, `place_date_birth`, `age`, `religion`, `nationality`, `ethnic`, `marital_status`, `year_married`, `name_wife_husband`, `sex_wife_husband`, `age_wife_husband`, `education_wife_husband`, `occupation_wife_husband`, `name_first_child`, `sex_first_child`, `age_first_child`, `education_first_child`, `occupation_first_child`, `name_second_child`, `sex_second_child`, `age_second_child`, `education_second_child`, `occupation_second_child`, `name_third_child`, `sex_third_child`, `age_third_child`, `education_third_child`, `occupation_third_child`, `name_father`, `sex_father`, `age_father`, `education_father`, `occupation_father`, `name_mother`, `sex_mother`, `age_mother`, `education_mother`, `occupation_mother`, `name_your_first_child`, `sex_your_first_child`, `age_your_first_child`, `education_your_first_child`, `occupation_your_first_child`, `name_your_second_child`, `sex_your_second_child`, `age_your_second_child`, `education_your_second_child`, `occupation_your_second_child`, `name_your_third_child`, `sex_your_third_child`, `age_your_third_child`, `education_your_third_child`, `occupation_your_third_child`, `name_your_fourth_child`, `sex_your_fourth_child`, `age_your_fourth_child`, `education_your_fourth_child`, `occupation_your_fourth_child`, `name_your_fifth_child`, `sex_your_fifth_child`, `age_your_fifth_child`, `education_your_fifth_child`, `occupation_your_fifth_child`, `name_elementary`, `location_elementary`, `year_enrolled_elementary`, `year_graduated_elementary`, `name_junior`, `location_junior`, `year_enrolled_junior`, `year_graduated_junior`, `name_senior`, `location_senior`, `year_enrolled_senior`, `year_graduated_senior`, `name_university`, `location_university`, `year_enrolled_university`, `year_graduated_university`, `name_graduate`, `location_graduate`, `year_enrolled_graduate`, `year_graduated_graduate`, `training_1`, `year_training_1`, `length_training_1`, `year_length_1`, `financed_1`, `training_2`, `year_training_2`, `length_training_2`, `year_length_2`, `financed_2`, `training_3`, `year_training_3`, `length_training_3`, `year_length_3`, `financed_3`, `foreign_language_1`, `active_1`, `foreign_language_2`, `active_2`, `dialect_1`, `active_dialect_1`, `dialect_2`, `active_dialect_2`, `year_from_1`, `year_till_1`, `name_address_employer_1`, `phone_name_address_employer_1`, `position_1`, `resignation_plans`, `explain_reasons`, `salary_1`, `year_from_2`, `year_till_2`, `name_address_employer_2`, `phone_name_address_employer_2`, `position_2`, `salary_2`, `reason_resigning_1`, `year_from_3`, `year_till_3`, `name_address_employer_3`, `phone_name_address_employer_3`, `position_3`, `salary_3`, `reason_resigning_2`, `id_department`, `id_position`, `expect_salary`, `expect_allowance`, `hobbies`, `organizational_activities`, `name_organization_1`, `type_organization_1`, `year_organization_1`, `position_organization_1`, `name_organization_2`, `type_organization_2`, `year_organization_2`, `position_organization_2`, `name_organization_3`, `type_organization_3`, `year_organization_3`, `position_organization_3`, `experiences_leader_1`, `experiences_leader_2`, `height`, `weight`, `hospitalized`, `which_year`, `how_long`, `diagnosis`, `hospitalized_in`, `name_working_1`, `position_working_1`, `office_working_1`, `length_working_1`, `name_working_2`, `position_working_2`, `office_working_2`, `length_working_2`, `name_working_3`, `position_working_3`, `office_working_3`, `length_working_3`, `side_jobs`, `working_as`, `remuneration`, `laws`, `type_case`, `sanction`, `when_where`, `career_development`, `file_photo`, `file_cv`, `status_accepted`, `created_at`, `updated_at`) VALUES
(2, 4, '3271062308950002', 'Fathurohman', 'M', '-', '00', 'bogor', '00', 'fathurdurs@gmail.com', 'Bogor, 23-08-1995', '26', 'Islam', 'Islam', 'Sundanese', 'Married', '2021', 'dess', 'F', '26', 's1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dess', 'F', '26', 's1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdn kebon pedes 3', 'bogor', '2000', '2006', 'smk tridharma 2 bogor', 'bogor', '2010', '2013', 'ibn khaldun bogor', 'bogor', '2013', '2018', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021', '2021', 'kntol', '2021', '2021', 'No', '2021', '2021', '2021', '2021', '2021', '2021', '2021', '2021', '2021', '2021', '2021', '2021', '2021', '2021', '2021', '2021', '2', '5', '2021', '2021', '2021', '2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', '-', '175', '80', 'Never', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Never', NULL, NULL, 'Never', NULL, NULL, NULL, NULL, '__.jpg', '__.pdf', 'acc', '2021-09-01 19:54:09', '2021-09-07 22:44:03'),
(3, 4, '123456', 'paijo', 'M', '979', '98989', 'bogor', '0000', NULL, 'Bogor, 23-08-1995', '27', 'Islam', 'Islam', 'Sundanese', 'Married', '2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '00', '000', '00', '2021', '2021', 'Yes', '00000', '2021', '2021', '2021', '000000', '2021', '2021', '2021', '2021', '2021', '2021', '-', '2021', '2021', '2021', '2021', '2', '5', '2021', '2021', '2021', '2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021', '2021', '175', '80', 'Never', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Never', NULL, NULL, 'Never', NULL, NULL, NULL, NULL, 'paijo_123456.png', 'paijo_123456.pdf', 'acc', '2021-09-01 20:26:32', '2021-09-08 23:18:24');

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
(7, '2021_08_14_115456_create_shared_table', 4),
(8, '2021_08_29_133106_create_position_table', 5);

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
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_post_lowongan` bigint(20) UNSIGNED NOT NULL,
  `nama_posisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `id_post_lowongan`, `nama_posisi`, `created_at`, `updated_at`) VALUES
(3, 4, 'Marketing Digital', '2021-08-29 19:50:15', '2021-08-29 19:50:25'),
(4, 4, 'Designer', '2021-08-29 20:56:31', '2021-08-29 20:56:31'),
(5, 4, 'Programmer', '2021-08-29 21:42:24', '2021-08-29 21:42:24'),
(6, 4, 'System Analys', '2021-08-29 21:42:38', '2021-08-29 21:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `post_lowongan`
--

CREATE TABLE `post_lowongan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_bagian` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kualifikasi` longtext COLLATE utf8mb4_unicode_ci,
  `tanggal_akhir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_lowongan`
--

INSERT INTO `post_lowongan` (`id`, `id_bagian`, `judul`, `image`, `kualifikasi`, `tanggal_akhir`, `created_at`, `updated_at`) VALUES
(4, 2, 'LOWONGAN WOY', '1629169448.jpg', 'ngapain kek\r\npokonya harus s1\r\nskill nomor 1\r\natitude belakangan\r\nhehe', '2021-09-10', '2021-08-14 20:33:59', '2021-09-09 07:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `psikotest`
--

CREATE TABLE `psikotest` (
  `id` int(11) NOT NULL,
  `id_data_pelamar` int(11) DEFAULT NULL,
  `angka_1` varchar(50) DEFAULT NULL,
  `angka_2` varchar(50) DEFAULT NULL,
  `angka_3` varchar(50) DEFAULT NULL,
  `angka_4` varchar(50) DEFAULT NULL,
  `angka_5` varchar(50) DEFAULT NULL,
  `angka_6` varchar(50) DEFAULT NULL,
  `angka_7` varchar(50) DEFAULT NULL,
  `angka_8` varchar(50) DEFAULT NULL,
  `angka_9` varchar(50) DEFAULT NULL,
  `angka_10` varchar(50) DEFAULT NULL,
  `angka_11` varchar(50) DEFAULT NULL,
  `angka_12` varchar(50) DEFAULT NULL,
  `angka_13` varchar(50) DEFAULT NULL,
  `angka_14` varchar(50) DEFAULT NULL,
  `angka_15` varchar(50) DEFAULT NULL,
  `angka_16` varchar(50) DEFAULT NULL,
  `angka_17` varchar(50) DEFAULT NULL,
  `angka_18` varchar(50) DEFAULT NULL,
  `angka_19` varchar(50) DEFAULT NULL,
  `angka_20` varchar(50) DEFAULT NULL,
  `angka_21` varchar(50) DEFAULT NULL,
  `angka_22` varchar(50) DEFAULT NULL,
  `angka_23` varchar(50) DEFAULT NULL,
  `angka_24` varchar(50) DEFAULT NULL,
  `angka_25` varchar(50) DEFAULT NULL,
  `angka_26` varchar(50) DEFAULT NULL,
  `angka_27` varchar(50) DEFAULT NULL,
  `angka_28` varchar(50) DEFAULT NULL,
  `angka_29` varchar(50) DEFAULT NULL,
  `angka_30` varchar(50) DEFAULT NULL,
  `angka_31` varchar(50) DEFAULT NULL,
  `angka_32` varchar(50) DEFAULT NULL,
  `angka_33` varchar(50) DEFAULT NULL,
  `angka_34` varchar(50) DEFAULT NULL,
  `angka_35` varchar(50) DEFAULT NULL,
  `angka_36` varchar(50) DEFAULT NULL,
  `angka_37` varchar(50) DEFAULT NULL,
  `angka_38` varchar(50) DEFAULT NULL,
  `angka_39` varchar(50) DEFAULT NULL,
  `angka_40` varchar(50) DEFAULT NULL,
  `gabungan_1` varchar(50) DEFAULT NULL,
  `gabungan_2` varchar(50) DEFAULT NULL,
  `gabungan_3` varchar(50) DEFAULT NULL,
  `gabungan_4` varchar(50) DEFAULT NULL,
  `gabungan_5` varchar(50) DEFAULT NULL,
  `gabungan_6` varchar(50) DEFAULT NULL,
  `gabungan_7` varchar(50) DEFAULT NULL,
  `gabungan_8` varchar(50) DEFAULT NULL,
  `gabungan_9` varchar(50) DEFAULT NULL,
  `gabungan_10` varchar(50) DEFAULT NULL,
  `gabungan_11` varchar(50) DEFAULT NULL,
  `gabungan_12` varchar(50) DEFAULT NULL,
  `gabungan_13` varchar(50) DEFAULT NULL,
  `gabungan_14` varchar(50) DEFAULT NULL,
  `gabungan_15` varchar(50) DEFAULT NULL,
  `gabungan_16` varchar(50) DEFAULT NULL,
  `gabungan_17` varchar(50) DEFAULT NULL,
  `gabungan_18` varchar(50) DEFAULT NULL,
  `gabungan_19` varchar(50) DEFAULT NULL,
  `gabungan_20` varchar(50) DEFAULT NULL,
  `gabungan_21` varchar(50) DEFAULT NULL,
  `gabungan_22` varchar(50) DEFAULT NULL,
  `gabungan_23` varchar(50) DEFAULT NULL,
  `gabungan_24` varchar(50) DEFAULT NULL,
  `gabungan_25` varchar(50) DEFAULT NULL,
  `gabungan_26` varchar(50) DEFAULT NULL,
  `hubungan_1` varchar(50) DEFAULT NULL,
  `hubungan_2` varchar(50) DEFAULT NULL,
  `hubungan_3` varchar(50) DEFAULT NULL,
  `hubungan_4` varchar(50) DEFAULT NULL,
  `hubungan_5` varchar(50) DEFAULT NULL,
  `hubungan_6` varchar(50) DEFAULT NULL,
  `hubungan_7` varchar(50) DEFAULT NULL,
  `hubungan_8` varchar(50) DEFAULT NULL,
  `hubungan_9` varchar(50) DEFAULT NULL,
  `hubungan_10` varchar(50) DEFAULT NULL,
  `hubungan_11` varchar(50) DEFAULT NULL,
  `hubungan_12` varchar(50) DEFAULT NULL,
  `hubungan_13` varchar(50) DEFAULT NULL,
  `hubungan_14` varchar(50) DEFAULT NULL,
  `hubungan_15` varchar(50) DEFAULT NULL,
  `hubungan_16` varchar(50) DEFAULT NULL,
  `hubungan_17` varchar(50) DEFAULT NULL,
  `hubungan_18` varchar(50) DEFAULT NULL,
  `hubungan_19` varchar(50) DEFAULT NULL,
  `hubungan_20` varchar(50) DEFAULT NULL,
  `hubungan_21` varchar(50) DEFAULT NULL,
  `hubungan_22` varchar(50) DEFAULT NULL,
  `hubungan_23` varchar(50) DEFAULT NULL,
  `hubungan_24` varchar(50) DEFAULT NULL,
  `hubungan_25` varchar(50) DEFAULT NULL,
  `hubungan_26` varchar(50) DEFAULT NULL,
  `hubungan_27` varchar(50) DEFAULT NULL,
  `hubungan_28` varchar(50) DEFAULT NULL,
  `hubungan_29` varchar(50) DEFAULT NULL,
  `hubungan_30` varchar(50) DEFAULT NULL,
  `hubungan_31` varchar(50) DEFAULT NULL,
  `hubungan_32` varchar(50) DEFAULT NULL,
  `hubungan_33` varchar(50) DEFAULT NULL,
  `hubungan_34` varchar(50) DEFAULT NULL,
  `hubungan_35` varchar(50) DEFAULT NULL,
  `hubungan_36` varchar(50) DEFAULT NULL,
  `hubungan_37` varchar(50) DEFAULT NULL,
  `hubungan_38` varchar(50) DEFAULT NULL,
  `hubungan_39` varchar(50) DEFAULT NULL,
  `hubungan_40` varchar(50) DEFAULT NULL,
  `abstraksi_1` varchar(50) DEFAULT NULL,
  `abstraksi_2` varchar(50) DEFAULT NULL,
  `abstraksi_3` varchar(50) DEFAULT NULL,
  `abstraksi_4` varchar(50) DEFAULT NULL,
  `abstraksi_5` varchar(50) DEFAULT NULL,
  `abstraksi_6` varchar(50) DEFAULT NULL,
  `abstraksi_7` varchar(50) DEFAULT NULL,
  `abstraksi_8` varchar(50) DEFAULT NULL,
  `abstraksi_9` varchar(50) DEFAULT NULL,
  `abstraksi_10` varchar(50) DEFAULT NULL,
  `abstraksi_11` varchar(50) DEFAULT NULL,
  `abstraksi_12` varchar(50) DEFAULT NULL,
  `abstraksi_13` varchar(50) DEFAULT NULL,
  `abstraksi_14` varchar(50) DEFAULT NULL,
  `abstraksi_15` varchar(50) DEFAULT NULL,
  `abstraksi_16` varchar(50) DEFAULT NULL,
  `abstraksi_17` varchar(50) DEFAULT NULL,
  `abstraksi_18` varchar(50) DEFAULT NULL,
  `abstraksi_19` varchar(50) DEFAULT NULL,
  `abstraksi_20` varchar(50) DEFAULT NULL,
  `abstraksi_21` varchar(50) DEFAULT NULL,
  `abstraksi_22` varchar(50) DEFAULT NULL,
  `abstraksi_23` varchar(50) DEFAULT NULL,
  `abstraksi_24` varchar(50) DEFAULT NULL,
  `abstraksi_25` varchar(50) DEFAULT NULL,
  `abstraksi_26` varchar(50) DEFAULT NULL,
  `abstraksi_27` varchar(50) DEFAULT NULL,
  `abstraksi_28` varchar(50) DEFAULT NULL,
  `abstraksi_29` varchar(50) DEFAULT NULL,
  `abstraksi_30` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `psikotest`
--

INSERT INTO `psikotest` (`id`, `id_data_pelamar`, `angka_1`, `angka_2`, `angka_3`, `angka_4`, `angka_5`, `angka_6`, `angka_7`, `angka_8`, `angka_9`, `angka_10`, `angka_11`, `angka_12`, `angka_13`, `angka_14`, `angka_15`, `angka_16`, `angka_17`, `angka_18`, `angka_19`, `angka_20`, `angka_21`, `angka_22`, `angka_23`, `angka_24`, `angka_25`, `angka_26`, `angka_27`, `angka_28`, `angka_29`, `angka_30`, `angka_31`, `angka_32`, `angka_33`, `angka_34`, `angka_35`, `angka_36`, `angka_37`, `angka_38`, `angka_39`, `angka_40`, `gabungan_1`, `gabungan_2`, `gabungan_3`, `gabungan_4`, `gabungan_5`, `gabungan_6`, `gabungan_7`, `gabungan_8`, `gabungan_9`, `gabungan_10`, `gabungan_11`, `gabungan_12`, `gabungan_13`, `gabungan_14`, `gabungan_15`, `gabungan_16`, `gabungan_17`, `gabungan_18`, `gabungan_19`, `gabungan_20`, `gabungan_21`, `gabungan_22`, `gabungan_23`, `gabungan_24`, `gabungan_25`, `gabungan_26`, `hubungan_1`, `hubungan_2`, `hubungan_3`, `hubungan_4`, `hubungan_5`, `hubungan_6`, `hubungan_7`, `hubungan_8`, `hubungan_9`, `hubungan_10`, `hubungan_11`, `hubungan_12`, `hubungan_13`, `hubungan_14`, `hubungan_15`, `hubungan_16`, `hubungan_17`, `hubungan_18`, `hubungan_19`, `hubungan_20`, `hubungan_21`, `hubungan_22`, `hubungan_23`, `hubungan_24`, `hubungan_25`, `hubungan_26`, `hubungan_27`, `hubungan_28`, `hubungan_29`, `hubungan_30`, `hubungan_31`, `hubungan_32`, `hubungan_33`, `hubungan_34`, `hubungan_35`, `hubungan_36`, `hubungan_37`, `hubungan_38`, `hubungan_39`, `hubungan_40`, `abstraksi_1`, `abstraksi_2`, `abstraksi_3`, `abstraksi_4`, `abstraksi_5`, `abstraksi_6`, `abstraksi_7`, `abstraksi_8`, `abstraksi_9`, `abstraksi_10`, `abstraksi_11`, `abstraksi_12`, `abstraksi_13`, `abstraksi_14`, `abstraksi_15`, `abstraksi_16`, `abstraksi_17`, `abstraksi_18`, `abstraksi_19`, `abstraksi_20`, `abstraksi_21`, `abstraksi_22`, `abstraksi_23`, `abstraksi_24`, `abstraksi_25`, `abstraksi_26`, `abstraksi_27`, `abstraksi_28`, `abstraksi_29`, `abstraksi_30`, `created_at`, `updated_at`) VALUES
(1, 2, 'a', 'b', 'c', 'd', 'a', 'b', 'c', 'd', 'a', 'b', 'c', 'd', 'a', 'b', 'c', 'd', 'a', 'b', 'c', 'd', 'a', 'b', 'c', 'd', 'a', 'b', 'c', 'd', 'a', 'b', 'c', 'd', 'a', 'b', 'c', 'd', 'a', 'b', 'c', 'd', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'e-f', 'a-b', 'c-d', 'e-f', 'a-b', 'c-d', 'e-f', 'a-b', 'c-d', 'e-f', 'a-b', 'c-d', 'e-f', 'a-b', 'c-d', 'e-f', 'a-b', 'c-d', 'e-f', 'a-b', 'c-d', 'e-f', 'a-b', 'c-d', 'e-f', 'a-b', 'c-d', 'e-f', NULL, NULL);

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
(2, 'evergreen', 'evergreen@admin.com', NULL, '$2y$10$4Ocgz2foxTP16uTS0/JIBuQvJOPmEwvzWadSNpuNyRNGl6bth0K7.', NULL, '2021-09-09 19:36:30', '2021-09-09 19:36:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `b_inggris`
--
ALTER TABLE `b_inggris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pelamar`
--
ALTER TABLE `data_pelamar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_card_number` (`id_card_number`);

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
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_lowongan`
--
ALTER TABLE `post_lowongan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `psikotest`
--
ALTER TABLE `psikotest`
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
-- AUTO_INCREMENT for table `b_inggris`
--
ALTER TABLE `b_inggris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data_pelamar`
--
ALTER TABLE `data_pelamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `post_lowongan`
--
ALTER TABLE `post_lowongan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `psikotest`
--
ALTER TABLE `psikotest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
