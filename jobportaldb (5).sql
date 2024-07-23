-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2024 at 04:50 PM
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
-- Database: `jobportaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `name`, `username`, `password`, `role`, `created_at`) VALUES
(24, 'admin', 'admin', '$2y$10$lq/TF7pOutvjmwH9v650COx2WE12fEwlCuaZrBcTDmc1vPNYDcXEy', 1, NULL),
(25, 'employer', 'employer', '$2y$10$oxO5aqabqw.jv3ouV7zxruenP2x3oYE6SdMD5S.iIvyTDYsVdNN7O', 2, NULL),
(26, 'hrmanager', 'hrmanager', '$2y$10$3Pk2F0g5gDIFX6hyu9uY8.wBK9UCRTC.s8c06ZNGVvqLCaWohR76m', 3, NULL),
(27, 'Orchid', 'orchid', '$2y$10$VvzWgcvJL8kkYupr/v5GiOClJbnWBGV5aCASLm80XKg3Gvj77MC0K', 2, NULL),
(28, 'orchid', 'orchid', '$2y$10$RvVIQTNnrxh1fgArubRcneta6p7rtstDeFItCATxXR4aT6t9/Agz2', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `a_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `education` varchar(255) NOT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `status` smallint(10) NOT NULL,
  `message` text DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `vacancy_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`a_id`, `name`, `address`, `education`, `resume`, `status`, `message`, `user_id`, `vacancy_id`) VALUES
(54, 'Julian Decker', 'Dolore qui sed molli', 'Sed vel eum tempora ', 'uploads/Microsyllabus-Data-Structure-_-Algorithms.pdf', 1, 'approved', 16, 18),
(55, 'Darsheel Chudal', 'Lokanthali', 'Masters', 'uploads/Microsyllabus-Data-Structure-_-Algorithms.pdf', 0, NULL, 16, 18),
(56, 'Chadwick Finch', 'Dolore quia non sed ', 'Nihil a dolores ab e', 'uploads/git-cheat-sheet-education (2).pdf', 0, NULL, 16, 16);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Engineering'),
(4, 'Information Technology'),
(8, 'Software Engineering'),
(9, 'Digital Marketing'),
(10, 'Cybersecurity and Ethical Hacking'),
(11, 'Cloud Computing'),
(12, 'Hardware'),
(13, 'Networking'),
(14, 'Artificial Intelligence and Machine Learning'),
(15, 'Data Management and Analytics');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `email`, `location`, `image`) VALUES
(7, 'Amazon', 'amazon@gmail.com', 'USA', 'amazon.jpg'),
(9, 'Google', 'google@gmail.com', 'California, USA', '360_F_284257577_cSLO6IMF6Zcm9EQwdYSONsttvGgRzv8R.jpg'),
(12, 'Space X', 'spacexs@gmail.com', 'USA', 'SPACEX-HEADQUARTERS-HAWTHORNE-CALIFORNIA-scaled.jpg'),
(13, 'Alibaba', 'alibaba@outlook.com', 'China', '105816000-1553654876220gettyimages-476326912.jpeg'),
(14, 'Lockheed Martin', 'lockheed@gmail.com', 'USA', '1000_F_406906850_0vv3dDAggIeT1nZRf5JZaqlPfzQGai8Q.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `registered_users`
--

CREATE TABLE `registered_users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registered_users`
--

INSERT INTO `registered_users` (`id`, `full_name`, `username`, `email`, `password`) VALUES
(16, 'Darsheel Chudal', 'darsheelchudal11', 'darsheelchudal11@gmail.com', '$2y$10$ItNBybHn4.K9VqJSZQ12zeYcMevk/cKXe5Wd.ChieBlBUw3QdK3iW');

-- --------------------------------------------------------

--
-- Table structure for table `vacancies`
--

CREATE TABLE `vacancies` (
  `id` int(255) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_desc` longtext NOT NULL,
  `job_status` tinyint(1) NOT NULL,
  `deadline` date NOT NULL,
  `company_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `salary` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vacancies`
--

INSERT INTO `vacancies` (`id`, `job_title`, `job_desc`, `job_status`, `deadline`, `company_id`, `category_id`, `salary`) VALUES
(16, 'Js developerr', 'Js developer', 0, '2024-06-28', 7, 4, 10000),
(17, 'Exercitationem minim', 'Iure consequatur Es', 0, '2024-07-09', 14, 4, 93),
(18, 'Distinctio Omnis au', 'Aliquid praesentium ', 1, '2024-07-12', 14, 9, 54),
(19, 'Est enim aliqua Ad ', 'Ut sit fugit labor', 0, '2024-07-07', 12, 14, 97),
(20, 'php developer', 'We are sekeking.................', 1, '2024-07-26', 14, 4, 55000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `vacancy_id` (`vacancy_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registered_users`
--
ALTER TABLE `registered_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `vacancies`
--
ALTER TABLE `vacancies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `registered_users`
--
ALTER TABLE `registered_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `vacancies`
--
ALTER TABLE `vacancies`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`vacancy_id`) REFERENCES `vacancies` (`id`);

--
-- Constraints for table `vacancies`
--
ALTER TABLE `vacancies`
  ADD CONSTRAINT `vacancies_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `vacancies_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
