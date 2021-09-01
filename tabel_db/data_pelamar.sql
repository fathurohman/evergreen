-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 30, 2021 at 04:55 PM
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
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_pelamar`
--
ALTER TABLE `data_pelamar`
  ADD PRIMARY KEY (`id_data_pelamar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_pelamar`
--
ALTER TABLE `data_pelamar`
  MODIFY `id_data_pelamar` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
