-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 01, 2021 at 03:59 AM
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
-- Table structure for table `psikotest`
--

CREATE TABLE `psikotest` (
  `id_psikotes` int(11) NOT NULL,
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
  `abstraksi_30` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `psikotest`
--

INSERT INTO `psikotest` (`id_psikotes`, `id_data_pelamar`, `angka_1`, `angka_2`, `angka_3`, `angka_4`, `angka_5`, `angka_6`, `angka_7`, `angka_8`, `angka_9`, `angka_10`, `angka_11`, `angka_12`, `angka_13`, `angka_14`, `angka_15`, `angka_16`, `angka_17`, `angka_18`, `angka_19`, `angka_20`, `angka_21`, `angka_22`, `angka_23`, `angka_24`, `angka_25`, `angka_26`, `angka_27`, `angka_28`, `angka_29`, `angka_30`, `angka_31`, `angka_32`, `angka_33`, `angka_34`, `angka_35`, `angka_36`, `angka_37`, `angka_38`, `angka_39`, `angka_40`, `gabungan_1`, `gabungan_2`, `gabungan_3`, `gabungan_4`, `gabungan_5`, `gabungan_6`, `gabungan_7`, `gabungan_8`, `gabungan_9`, `gabungan_10`, `gabungan_11`, `gabungan_12`, `gabungan_13`, `gabungan_14`, `gabungan_15`, `gabungan_16`, `gabungan_17`, `gabungan_18`, `gabungan_19`, `gabungan_20`, `gabungan_21`, `gabungan_22`, `gabungan_23`, `gabungan_24`, `gabungan_25`, `gabungan_26`, `hubungan_1`, `hubungan_2`, `hubungan_3`, `hubungan_4`, `hubungan_5`, `hubungan_6`, `hubungan_7`, `hubungan_8`, `hubungan_9`, `hubungan_10`, `hubungan_11`, `hubungan_12`, `hubungan_13`, `hubungan_14`, `hubungan_15`, `hubungan_16`, `hubungan_17`, `hubungan_18`, `hubungan_19`, `hubungan_20`, `hubungan_21`, `hubungan_22`, `hubungan_23`, `hubungan_24`, `hubungan_25`, `hubungan_26`, `hubungan_27`, `hubungan_28`, `hubungan_29`, `hubungan_30`, `hubungan_31`, `hubungan_32`, `hubungan_33`, `hubungan_34`, `hubungan_35`, `hubungan_36`, `hubungan_37`, `hubungan_38`, `hubungan_39`, `hubungan_40`, `abstraksi_1`, `abstraksi_2`, `abstraksi_3`, `abstraksi_4`, `abstraksi_5`, `abstraksi_6`, `abstraksi_7`, `abstraksi_8`, `abstraksi_9`, `abstraksi_10`, `abstraksi_11`, `abstraksi_12`, `abstraksi_13`, `abstraksi_14`, `abstraksi_15`, `abstraksi_16`, `abstraksi_17`, `abstraksi_18`, `abstraksi_19`, `abstraksi_20`, `abstraksi_21`, `abstraksi_22`, `abstraksi_23`, `abstraksi_24`, `abstraksi_25`, `abstraksi_26`, `abstraksi_27`, `abstraksi_28`, `abstraksi_29`, `abstraksi_30`) VALUES
(1, 1, 'a', 'b', 'c', 'd', 'a', 'b', 'c', 'd', 'a', 'b', 'c', 'd', 'a', 'b', 'c', 'd', 'a', 'b', 'c', 'd', 'a', 'b', 'c', 'd', 'a', 'b', 'c', 'd', 'a', 'b', 'c', 'd', 'a', 'b', 'c', 'd', 'a', 'b', 'c', 'd', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'a-b', 'c-d', 'e-f', 'a-b', 'c-d', 'e-f', 'a-b', 'c-d', 'e-f', 'a-b', 'c-d', 'e-f', 'a-b', 'c-d', 'e-f', 'a-b', 'c-d', 'e-f', 'a-b', 'c-d', 'e-f', 'a-b', 'c-d', 'e-f', 'a-b', 'c-d', 'e-f', 'a-b', 'c-d', 'e-f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `psikotest`
--
ALTER TABLE `psikotest`
  ADD PRIMARY KEY (`id_psikotes`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `psikotest`
--
ALTER TABLE `psikotest`
  MODIFY `id_psikotes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
