-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 18, 2020 at 10:22 PM
-- Server version: 5.7.30-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `PESU`
--
CREATE DATABASE IF NOT EXISTS `PESU` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `PESU`;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users`
--

CREATE TABLE `auth_users` (
  `user_id` int(22) NOT NULL,
  `user_srn` varchar(255) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `password` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_profile_id` int(22) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_users`
--

INSERT INTO `auth_users` (`user_id`, `user_srn`, `user_name`, `password`, `created_at`, `user_profile_id`) VALUES
(4, 'PES2201800285', 'Qazi Amaan', '$2y$10$yZIsXco7g3LXDbgLHOpOu.rhJCzt96Jr8WWQO/qw1IrSSzcQRq5J2', '2020-06-18 07:53:01', 2);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(55) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `file_url` text NOT NULL,
  `post_description` text NOT NULL,
  `post_likes` varchar(255) NOT NULL DEFAULT '0',
  `created_by` int(22) NOT NULL,
  `downloads` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `post_semester` varchar(255) NOT NULL,
  `post_subject` varchar(255) NOT NULL,
  `post_branch` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `file_url`, `post_description`, `post_likes`, `created_by`, `downloads`, `created_at`, `updated_at`, `post_semester`, `post_subject`, `post_branch`) VALUES
(2, 'Test', '5eeb9a0e77be2-person_2.jpg', 'asdfbfvcsxa', '0', 4, '0', '2020-06-17 18:30:00', NULL, '2', 'swdfs', 'cse');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `user_profile_id` int(22) NOT NULL,
  `user_srn` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `cycle` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `campus` varchar(255) NOT NULL,
  `profile_image` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`user_profile_id`, `user_srn`, `full_name`, `class`, `section`, `cycle`, `branch`, `campus`, `profile_image`, `created_at`) VALUES
(2, 'PES2201800285', 'Qazi Amaan', '300', 'C', 'NA', 'CSE', 'EC', NULL, '2020-06-18 07:53:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_users`
--
ALTER TABLE `auth_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_profile_fk` (`user_profile_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_post_fk` (`created_by`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`user_profile_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_users`
--
ALTER TABLE `auth_users`
  MODIFY `user_id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `user_profile_id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_users`
--
ALTER TABLE `auth_users`
  ADD CONSTRAINT `user_profile_fk` FOREIGN KEY (`user_profile_id`) REFERENCES `user_profiles` (`user_profile_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `user_post_fk` FOREIGN KEY (`created_by`) REFERENCES `auth_users` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;