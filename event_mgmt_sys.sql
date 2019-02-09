-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 09, 2019 at 08:30 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_mgmt_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_of_event` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `type_of_participant` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resource_person_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resource_person_desg` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resource_person_org` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_participants` int(11) DEFAULT NULL,
  `area_of_expertise` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pso1` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pso_desc1` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `outcome` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expenditure` int(11) DEFAULT NULL,
  `revenue` int(11) DEFAULT NULL,
  `funding_agency` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `funds` int(11) DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `association` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rank` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ach_student_staff` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ach_dept` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ach_college` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pso2` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pso_desc2` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pso3` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pso_desc3` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pso4` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pso_desc4` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pso5` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pso_desc5` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `title`, `department`, `level`, `type_of_event`, `date_from`, `date_to`, `type_of_participant`, `resource_person_name`, `resource_person_desg`, `resource_person_org`, `no_of_participants`, `area_of_expertise`, `description`, `pso1`, `pso_desc1`, `outcome`, `expenditure`, `revenue`, `funding_agency`, `funds`, `status`, `username`, `association`, `rank`, `ach_student_staff`, `ach_dept`, `ach_college`, `pso2`, `pso_desc2`, `pso3`, `pso_desc3`, `pso4`, `pso_desc4`, `pso5`, `pso_desc5`) VALUES
('IT2', 'test event', 'IT', 'INTERNATIONAL', 'ADD-ON', '2019-02-07', '2019-02-07', 'staff', '1', '1', '1', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Cancelled', 'user1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('IT3', 'test titile', 'IT', 'INTERNATIONAL', 'ADD-ON', '2019-02-07', '2019-02-07', 'staff', '1', '1', '1', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Cancelled', 'user1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('IT4', 'astasrt', 'IT', 'INTERNATIONAL', 'ADD-ON', '2019-02-07', '2019-02-07', 'staff', '1', '1', '1', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'incomplete', 'user1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('IT5', 'asrtarst', 'IT', 'INTERNATIONAL', 'ADD-ON', '2019-02-07', '2019-02-07', 'staff', '1', '1', '1', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'incomplete', 'user1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('IT6', 'testevenstra', 'IT', 'INTERNATIONAL', 'ADD-ON', '2019-02-07', '2019-02-08', 'staff', '1', '1', '1', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'incomplete', 'user1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('IT7', 'teasntoairstn', 'IT', 'INTERNATIONAL', 'ADD-ON', '2019-02-06', '2019-02-07', 'staff', '1', '1', '1', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'incomplete', 'user1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('IT8', 'hnienh', 'IT', 'INTERNATIONAL', 'ADD-ON', '2019-02-08', '2019-02-09', 'staff', 'nehn', 'nhn', 'hnnh', NULL, 'hnh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'incomplete', 'user1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `username`, `password`, `email`) VALUES
(1, 'user1', 'user1', 'akhilkpdasan@gmail.com'),
(2, 'new', '123', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`(10));

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
