-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2025 at 11:50 PM
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
-- Database: `bdmppa`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `action` varchar(255) NOT NULL,
  `details` text DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `latitude` decimal(10,7) DEFAULT NULL,
  `longitude` decimal(10,7) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `action`, `details`, `icon`, `ip_address`, `user_agent`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(28, 1, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 25.6046570, 88.6474240, '2025-10-03 04:45:29', '2025-10-03 04:45:29'),
(29, 1, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 25.6046570, 88.6474240, '2025-10-03 04:56:47', '2025-10-03 04:56:47'),
(30, 3, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 25.6046570, 88.6474240, '2025-10-03 16:34:07', '2025-10-03 16:34:07'),
(31, 1, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 25.6046570, 88.6474240, '2025-10-03 16:34:30', '2025-10-03 16:34:30'),
(32, 3, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 25.6046570, 88.6474240, '2025-10-03 17:12:23', '2025-10-03 17:12:23'),
(33, 1, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 25.6046570, 88.6474240, '2025-10-03 17:14:31', '2025-10-03 17:14:31'),
(34, 1, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 25.6046570, 88.6474240, '2025-10-03 20:15:48', '2025-10-03 20:15:48'),
(35, 1, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 25.6046570, 88.6474240, '2025-10-04 05:04:54', '2025-10-04 05:04:54'),
(38, 4, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 25.6046570, 88.6474240, '2025-10-04 09:05:57', '2025-10-04 09:05:57'),
(39, 1, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 25.6046570, 88.6474240, '2025-10-04 09:08:32', '2025-10-04 09:08:32'),
(40, 3, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 25.6046570, 88.6474240, '2025-10-04 11:34:43', '2025-10-04 11:34:43'),
(41, 1, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 25.6046570, 88.6474240, '2025-10-04 11:35:09', '2025-10-04 11:35:09'),
(42, 1, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 25.6047251, 88.6474105, '2025-10-04 13:04:53', '2025-10-04 13:04:53'),
(43, 1, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 25.6046985, 88.6474158, '2025-10-04 18:11:12', '2025-10-04 18:11:12'),
(44, 1, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 25.6046570, 88.6474240, '2025-10-05 09:25:02', '2025-10-05 09:25:02'),
(45, 1, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 23.0325403, 91.1833043, '2025-10-05 13:46:02', '2025-10-05 13:46:02'),
(46, 1, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 25.6044656, 88.6492721, '2025-10-05 17:05:31', '2025-10-05 17:05:31'),
(47, 3, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 25.6044646, 88.6492763, '2025-10-05 18:30:08', '2025-10-05 18:30:08'),
(48, 4, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 25.6044646, 88.6492763, '2025-10-05 18:31:10', '2025-10-05 18:31:10'),
(49, 8, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 23.0325403, 91.1833043, '2025-10-05 18:33:22', '2025-10-05 18:33:22'),
(50, 1, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 25.6044609, 88.6492788, '2025-10-05 18:35:16', '2025-10-05 18:35:16'),
(51, 1, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 25.6044658, 88.6492719, '2025-10-06 05:07:13', '2025-10-06 05:07:13'),
(52, 1, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 23.7993984, 90.3610368, '2025-10-06 12:12:29', '2025-10-06 12:12:29'),
(53, 1, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 23.7993984, 90.3610368, '2025-10-06 13:36:57', '2025-10-06 13:36:57'),
(54, 3, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 23.7993984, 90.3610368, '2025-10-06 13:37:55', '2025-10-06 13:37:55'),
(55, 1, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 23.7993984, 90.3610368, '2025-10-06 13:38:26', '2025-10-06 13:38:26'),
(56, 1, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 23.7993984, 90.3610368, '2025-10-06 13:39:11', '2025-10-06 13:39:11'),
(57, 1, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 25.6044512, 88.6477258, '2025-10-06 19:33:06', '2025-10-06 19:33:06'),
(58, 8, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 25.6046570, 88.6474240, '2025-10-06 19:42:34', '2025-10-06 19:42:34'),
(59, 3, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 25.6044512, 88.6477258, '2025-10-06 19:42:51', '2025-10-06 19:42:51'),
(60, 4, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 25.6046570, 88.6474240, '2025-10-06 19:43:10', '2025-10-06 19:43:10'),
(61, 1, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 25.6046570, 88.6474240, '2025-10-06 19:43:19', '2025-10-06 19:43:19'),
(62, 1, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 25.6044430, 88.6477379, '2025-10-06 20:02:20', '2025-10-06 20:02:20'),
(63, 3, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 25.6046570, 88.6474240, '2025-10-06 20:10:19', '2025-10-06 20:10:19'),
(64, 1, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 25.6046570, 88.6474240, '2025-10-06 20:10:32', '2025-10-06 20:10:32'),
(65, 1, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 25.6046570, 88.6474240, '2025-10-06 21:12:23', '2025-10-06 21:12:23'),
(66, 4, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 25.6046570, 88.6474240, '2025-10-06 21:12:51', '2025-10-06 21:12:51'),
(67, 8, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 25.6046570, 88.6474240, '2025-10-06 21:17:06', '2025-10-06 21:17:06'),
(68, 1, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 25.6046570, 88.6474240, '2025-10-06 21:17:25', '2025-10-06 21:17:25'),
(69, 1, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 25.6046570, 88.6474240, '2025-10-06 21:20:50', '2025-10-06 21:20:50'),
(70, 1, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 25.6046570, 88.6474240, '2025-10-06 21:34:06', '2025-10-06 21:34:06'),
(71, 8, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 25.6046570, 88.6474240, '2025-10-06 21:35:05', '2025-10-06 21:35:05'),
(72, 1, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 25.6046570, 88.6474240, '2025-10-06 21:35:25', '2025-10-06 21:35:25'),
(73, 8, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 25.6046570, 88.6474240, '2025-10-06 21:41:21', '2025-10-06 21:41:21'),
(74, 1, 'Login', 'User logged in successfully', 'fas fa-sign-in-alt', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 25.6046570, 88.6474240, '2025-10-06 21:43:39', '2025-10-06 21:43:39');

-- --------------------------------------------------------

--
-- Table structure for table `billhistories`
--

CREATE TABLE `billhistories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `marketing_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `doctor_commision` decimal(10,2) NOT NULL,
  `marketing_commision` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount_type` enum('amount','percentage') NOT NULL DEFAULT 'percentage',
  `doctor_commision_type` enum('amount','percentage') NOT NULL DEFAULT 'percentage',
  `marketing_commision_type` enum('amount','percentage') DEFAULT 'percentage',
  `paid_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `due_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `invoice_number` varchar(255) NOT NULL,
  `entry_by` varchar(255) NOT NULL,
  `payment` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`payment`)),
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billhistories`
--

INSERT INTO `billhistories` (`id`, `bill_id`, `patient_id`, `doctor_id`, `marketing_id`, `total_amount`, `doctor_commision`, `marketing_commision`, `discount`, `discount_type`, `doctor_commision_type`, `marketing_commision_type`, `paid_amount`, `due_amount`, `invoice_number`, `entry_by`, `payment`, `status`, `created_at`, `updated_at`) VALUES
(177, 123, 8, 8, NULL, 2520.00, 126.00, NULL, 10.00, 'percentage', 'percentage', 'percentage', 2200.00, 320.00, 'DVDC25-000001', 'Shariful Islam', '{\"method\":\"cash\"}', 'pending', '2025-10-04 08:55:15', '2025-10-04 08:55:15'),
(178, 123, 8, 8, NULL, 2520.00, 126.00, NULL, 10.00, 'percentage', 'percentage', 'percentage', 300.00, 20.00, 'DVDC25-000001', 'Shariful Islam', '{\"method\":\"cash\"}', 'pending', '2025-10-04 08:55:38', '2025-10-04 08:55:38'),
(179, 123, 8, 8, NULL, 2520.00, 126.00, NULL, 10.00, 'percentage', 'percentage', 'percentage', 20.00, 0.00, 'DVDC25-000001', 'Shariful Islam', '{\"method\":\"cash\"}', 'complete', '2025-10-04 09:11:11', '2025-10-04 09:11:11'),
(180, 124, 8, 6, 1, 26300.00, 1315.00, NULL, 0.00, 'amount', 'percentage', 'percentage', 26300.00, 0.00, 'DVDC25-000002', 'Shariful Islam', '{\"method\":\"cash\"}', 'pending', '2025-10-04 11:32:52', '2025-10-04 11:32:52'),
(181, 125, 5, 8, NULL, 3145.00, 157.00, NULL, 15.00, 'percentage', 'percentage', 'percentage', 3145.00, 0.00, 'DVDC25-000003', 'Shariful Islam', '{\"method\":\"cash\"}', 'pending', '2025-10-04 18:44:02', '2025-10-04 18:44:02'),
(182, 126, 3, 8, NULL, 1560.00, 78.00, NULL, 0.00, 'amount', 'percentage', 'percentage', 1560.00, 0.00, 'DVDC25-000004', 'Shariful Islam', '{\"method\":\"cash\"}', 'pending', '2025-10-04 18:53:54', '2025-10-04 18:53:54'),
(183, 127, 8, 3, NULL, 420.00, 21.00, NULL, 0.00, 'amount', 'percentage', 'percentage', 420.00, 0.00, 'DVDC25-000005', 'Shariful Islam', '{\"method\":\"cash\"}', 'pending', '2025-10-04 18:57:27', '2025-10-04 18:57:27'),
(184, 128, 8, 2, NULL, 2190.00, 110.00, NULL, 10.00, 'amount', 'percentage', 'percentage', 2190.00, 0.00, 'DVDC25-000006', 'Shariful Islam', '{\"method\":\"cash\"}', 'pending', '2025-10-05 14:28:29', '2025-10-05 14:28:29'),
(185, 129, 7, 2, 1, 3330.00, 167.00, NULL, 10.00, 'percentage', 'percentage', 'percentage', 3000.00, 330.00, 'DVDC25-000007', 'Shariful Islam', '{\"method\":\"cash\"}', 'pending', '2025-10-05 18:27:49', '2025-10-05 18:27:49'),
(186, 129, 7, 2, 1, 3330.00, 167.00, NULL, 10.00, 'percentage', 'percentage', 'percentage', 300.00, 30.00, 'DVDC25-000007', 'Shariful Islam', '{\"method\":\"cash\"}', 'pending', '2025-10-05 18:28:32', '2025-10-05 18:28:32'),
(187, 129, 7, 2, 1, 3330.00, 167.00, NULL, 10.00, 'percentage', 'percentage', 'percentage', 30.00, 0.00, 'DVDC25-000007', 'Shariful Islam', '{\"method\":\"cash\"}', 'pending', '2025-10-05 18:28:39', '2025-10-05 18:28:39'),
(188, 130, 2, 8, NULL, 2200.00, 110.00, NULL, 0.00, 'amount', 'percentage', 'percentage', 2200.00, 0.00, 'DVDC25-000008', 'Shariful Islam', '{\"method\":\"cash\"}', 'pending', '2025-10-05 18:43:34', '2025-10-05 18:43:34'),
(189, 131, 5, 2, NULL, 3400.00, 170.00, NULL, 0.00, 'amount', 'percentage', 'percentage', 3400.00, 0.00, 'DVDC25-000009', 'Shariful Islam', '{\"method\":\"cash\"}', 'pending', '2025-10-05 19:08:07', '2025-10-05 19:08:07'),
(190, 132, 10, 6, NULL, 1000.00, 50.00, NULL, 0.00, 'amount', 'percentage', 'percentage', 1000.00, 0.00, 'DVDC25-000010', 'Shariful Islam', '{\"method\":\"cash\"}', 'pending', '2025-10-05 19:37:42', '2025-10-05 19:37:42'),
(191, 133, 8, 3, NULL, 1500.00, 75.00, NULL, 0.00, 'amount', 'percentage', 'percentage', 1500.00, 0.00, 'DVDC25-000011', 'Shariful Islam', '{\"method\":\"cash\"}', 'pending', '2025-10-05 19:41:30', '2025-10-05 19:41:30'),
(192, 134, 8, 7, NULL, 2500.00, 125.00, NULL, 0.00, 'amount', 'percentage', 'percentage', 2500.00, 0.00, 'DVDC25-000012', 'Shariful Islam', '{\"method\":\"cash\"}', 'pending', '2025-10-05 19:45:59', '2025-10-05 19:45:59'),
(193, 135, 4, 8, NULL, 3600.00, 180.00, NULL, 0.00, 'amount', 'percentage', 'percentage', 3600.00, 0.00, 'DVDC25-000013', 'Shariful Islam', '{\"method\":\"cash\"}', 'pending', '2025-10-05 20:12:29', '2025-10-05 20:12:29'),
(194, 136, 4, 2, NULL, 3200.00, 160.00, NULL, 0.00, 'amount', 'percentage', 'percentage', 3200.00, 0.00, 'DVDC25-000014', 'Shariful Islam', '{\"method\":\"cash\"}', 'pending', '2025-10-06 05:50:21', '2025-10-06 05:50:21'),
(195, 137, 7, 2, NULL, 3515.00, 176.00, NULL, 5.00, 'percentage', 'percentage', 'percentage', 3500.00, 15.00, 'DVDC25-000015', 'Shariful Islam', '{\"method\":\"cash\"}', 'pending', '2025-10-06 19:49:42', '2025-10-06 19:49:42'),
(196, 137, 7, 2, NULL, 3515.00, 176.00, NULL, 5.00, 'percentage', 'percentage', 'percentage', 10.00, 5.00, 'DVDC25-000015', 'Shariful Islam', '{\"method\":\"cash\"}', 'complete', '2025-10-06 19:51:23', '2025-10-06 19:51:23'),
(197, 137, 7, 2, NULL, 3515.00, 176.00, NULL, 5.00, 'percentage', 'percentage', 'percentage', 5.00, 0.00, 'DVDC25-000015', 'Shariful Islam', '{\"method\":\"cash\"}', 'complete', '2025-10-06 19:51:37', '2025-10-06 19:51:37'),
(198, 138, 10, 2, NULL, 400.00, 20.00, NULL, 0.00, 'amount', 'percentage', 'percentage', 400.00, 0.00, 'DVDC25-000016', 'Shariful Islam', '{\"method\":\"cash\"}', 'pending', '2025-10-06 19:52:48', '2025-10-06 19:52:48');

-- --------------------------------------------------------

--
-- Table structure for table `billitems`
--

CREATE TABLE `billitems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_id` bigint(20) UNSIGNED NOT NULL,
  `investigation_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billitems`
--

INSERT INTO `billitems` (`id`, `bill_id`, `investigation_id`, `price`, `quantity`, `total`, `created_at`, `updated_at`) VALUES
(364, 123, 245, 400.00, 1, 400.00, '2025-10-04 08:55:15', '2025-10-04 08:55:15'),
(365, 123, 220, 600.00, 1, 600.00, '2025-10-04 08:55:15', '2025-10-04 08:55:15'),
(366, 123, 261, 1800.00, 1, 1800.00, '2025-10-04 08:55:15', '2025-10-04 08:55:15'),
(367, 124, 198, 1200.00, 1, 1200.00, '2025-10-04 11:32:52', '2025-10-04 11:32:52'),
(368, 124, 199, 1200.00, 1, 1200.00, '2025-10-04 11:32:52', '2025-10-04 11:32:52'),
(369, 124, 200, 1200.00, 1, 1200.00, '2025-10-04 11:32:52', '2025-10-04 11:32:52'),
(370, 124, 202, 1600.00, 1, 1600.00, '2025-10-04 11:32:52', '2025-10-04 11:32:52'),
(371, 124, 204, 2000.00, 1, 2000.00, '2025-10-04 11:32:52', '2025-10-04 11:32:52'),
(372, 124, 205, 3000.00, 1, 3000.00, '2025-10-04 11:32:52', '2025-10-04 11:32:52'),
(373, 124, 206, 3000.00, 1, 3000.00, '2025-10-04 11:32:52', '2025-10-04 11:32:52'),
(374, 124, 261, 1800.00, 1, 1800.00, '2025-10-04 11:32:52', '2025-10-04 11:32:52'),
(375, 124, 262, 3000.00, 1, 3000.00, '2025-10-04 11:32:52', '2025-10-04 11:32:52'),
(376, 124, 263, 1200.00, 1, 1200.00, '2025-10-04 11:32:52', '2025-10-04 11:32:52'),
(377, 124, 208, 6000.00, 1, 6000.00, '2025-10-04 11:32:52', '2025-10-04 11:32:52'),
(378, 124, 201, 1100.00, 1, 1100.00, '2025-10-04 11:32:52', '2025-10-04 11:32:52'),
(379, 125, 245, 400.00, 1, 400.00, '2025-10-04 18:44:02', '2025-10-04 18:44:02'),
(380, 125, 16, 400.00, 1, 400.00, '2025-10-04 18:44:02', '2025-10-04 18:44:02'),
(381, 125, 17, 1100.00, 1, 1100.00, '2025-10-04 18:44:02', '2025-10-04 18:44:02'),
(382, 125, 199, 1200.00, 1, 1200.00, '2025-10-04 18:44:02', '2025-10-04 18:44:02'),
(383, 125, 220, 600.00, 1, 600.00, '2025-10-04 18:44:02', '2025-10-04 18:44:02'),
(384, 126, 245, 400.00, 1, 400.00, '2025-10-04 18:53:54', '2025-10-04 18:53:54'),
(385, 126, 17, 1100.00, 1, 1100.00, '2025-10-04 18:53:54', '2025-10-04 18:53:54'),
(386, 126, 258, 20.00, 1, 20.00, '2025-10-04 18:53:54', '2025-10-04 18:53:54'),
(387, 126, 255, 20.00, 2, 40.00, '2025-10-04 18:53:54', '2025-10-04 18:53:54'),
(388, 127, 245, 400.00, 1, 400.00, '2025-10-04 18:57:27', '2025-10-04 18:57:27'),
(389, 127, 258, 20.00, 1, 20.00, '2025-10-04 18:57:27', '2025-10-04 18:57:27'),
(390, 128, 263, 1200.00, 1, 1200.00, '2025-10-05 14:28:29', '2025-10-05 14:28:29'),
(391, 128, 16, 400.00, 1, 400.00, '2025-10-05 14:28:29', '2025-10-05 14:28:29'),
(392, 128, 220, 600.00, 1, 600.00, '2025-10-05 14:28:29', '2025-10-05 14:28:29'),
(393, 129, 245, 400.00, 1, 400.00, '2025-10-05 18:27:49', '2025-10-05 18:27:49'),
(394, 129, 16, 400.00, 1, 400.00, '2025-10-05 18:27:49', '2025-10-05 18:27:49'),
(395, 129, 17, 1100.00, 1, 1100.00, '2025-10-05 18:27:49', '2025-10-05 18:27:49'),
(396, 129, 198, 1200.00, 1, 1200.00, '2025-10-05 18:27:49', '2025-10-05 18:27:49'),
(397, 129, 220, 600.00, 1, 600.00, '2025-10-05 18:27:49', '2025-10-05 18:27:49'),
(398, 130, 245, 400.00, 1, 400.00, '2025-10-05 18:43:34', '2025-10-05 18:43:34'),
(399, 130, 200, 1200.00, 1, 1200.00, '2025-10-05 18:43:34', '2025-10-05 18:43:34'),
(400, 130, 220, 600.00, 1, 600.00, '2025-10-05 18:43:34', '2025-10-05 18:43:34'),
(401, 131, 245, 400.00, 1, 400.00, '2025-10-05 19:08:07', '2025-10-05 19:08:07'),
(402, 131, 15, 1800.00, 1, 1800.00, '2025-10-05 19:08:07', '2025-10-05 19:08:07'),
(403, 131, 200, 1200.00, 1, 1200.00, '2025-10-05 19:08:07', '2025-10-05 19:08:07'),
(404, 132, 245, 400.00, 1, 400.00, '2025-10-05 19:37:42', '2025-10-05 19:37:42'),
(405, 132, 220, 600.00, 1, 600.00, '2025-10-05 19:37:42', '2025-10-05 19:37:42'),
(406, 133, 43, 1500.00, 1, 1500.00, '2025-10-05 19:41:30', '2025-10-05 19:41:30'),
(407, 134, 44, 2500.00, 1, 2500.00, '2025-10-05 19:45:59', '2025-10-05 19:45:59'),
(408, 135, 100, 1200.00, 1, 1200.00, '2025-10-05 20:12:29', '2025-10-05 20:12:29'),
(409, 135, 261, 1800.00, 1, 1800.00, '2025-10-05 20:12:29', '2025-10-05 20:12:29'),
(410, 135, 220, 600.00, 1, 600.00, '2025-10-05 20:12:29', '2025-10-05 20:12:29'),
(411, 136, 245, 400.00, 1, 400.00, '2025-10-06 05:50:21', '2025-10-06 05:50:21'),
(412, 136, 16, 400.00, 1, 400.00, '2025-10-06 05:50:21', '2025-10-06 05:50:21'),
(413, 136, 261, 1800.00, 1, 1800.00, '2025-10-06 05:50:21', '2025-10-06 05:50:21'),
(414, 136, 220, 600.00, 1, 600.00, '2025-10-06 05:50:21', '2025-10-06 05:50:21'),
(415, 137, 245, 400.00, 1, 400.00, '2025-10-06 19:49:42', '2025-10-06 19:49:42'),
(416, 137, 16, 400.00, 1, 400.00, '2025-10-06 19:49:42', '2025-10-06 19:49:42'),
(417, 137, 17, 1100.00, 1, 1100.00, '2025-10-06 19:49:42', '2025-10-06 19:49:42'),
(418, 137, 198, 1200.00, 1, 1200.00, '2025-10-06 19:49:42', '2025-10-06 19:49:42'),
(419, 137, 220, 600.00, 1, 600.00, '2025-10-06 19:49:42', '2025-10-06 19:49:42'),
(420, 138, 68, 400.00, 1, 400.00, '2025-10-06 19:52:48', '2025-10-06 19:52:48');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `marketing_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `doctor_commision` decimal(10,2) NOT NULL,
  `marketing_commision` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount_type` enum('amount','percentage') NOT NULL DEFAULT 'percentage',
  `doctor_commision_type` enum('amount','percentage') NOT NULL DEFAULT 'percentage',
  `marketing_commision_type` enum('amount','percentage') DEFAULT 'percentage',
  `paid_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `due_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `invoice_number` varchar(255) NOT NULL,
  `entry_by` varchar(255) NOT NULL,
  `payment` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`payment`)),
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `patient_id`, `doctor_id`, `marketing_id`, `total_amount`, `doctor_commision`, `marketing_commision`, `discount`, `discount_type`, `doctor_commision_type`, `marketing_commision_type`, `paid_amount`, `due_amount`, `invoice_number`, `entry_by`, `payment`, `status`, `created_at`, `updated_at`) VALUES
(123, 8, 8, NULL, 2520.00, 126.00, NULL, 10.00, 'percentage', 'percentage', 'percentage', 2520.00, 0.00, 'DVDC25-000001', 'Shariful Islam', '{\"method\":\"cash\"}', 'complete', '2025-10-04 08:55:15', '2025-10-05 19:45:03'),
(124, 8, 6, 1, 26300.00, 1315.00, NULL, 0.00, 'amount', 'percentage', 'percentage', 26300.00, 0.00, 'DVDC25-000002', 'Shariful Islam', '{\"method\":\"cash\"}', 'complete', '2025-10-04 11:32:52', '2025-10-05 19:45:04'),
(125, 5, 8, NULL, 3145.00, 157.00, NULL, 15.00, 'percentage', 'percentage', 'percentage', 3145.00, 0.00, 'DVDC25-000003', 'Shariful Islam', '{\"method\":\"cash\"}', 'complete', '2025-10-04 18:44:02', '2025-10-05 19:45:06'),
(126, 3, 8, NULL, 1560.00, 78.00, NULL, 0.00, 'amount', 'percentage', 'percentage', 1560.00, 0.00, 'DVDC25-000004', 'Shariful Islam', '{\"method\":\"cash\"}', 'complete', '2025-10-04 18:53:53', '2025-10-05 19:45:07'),
(127, 8, 3, NULL, 420.00, 21.00, NULL, 0.00, 'amount', 'percentage', 'percentage', 420.00, 0.00, 'DVDC25-000005', 'Shariful Islam', '{\"method\":\"cash\"}', 'complete', '2025-10-04 18:57:27', '2025-10-05 19:45:09'),
(128, 8, 2, NULL, 2190.00, 110.00, NULL, 10.00, 'amount', 'percentage', 'percentage', 2190.00, 0.00, 'DVDC25-000006', 'Shariful Islam', '{\"method\":\"cash\"}', 'complete', '2025-10-05 14:28:28', '2025-10-05 19:45:10'),
(129, 7, 2, 1, 3330.00, 167.00, 233.00, 10.00, 'percentage', 'percentage', 'amount', 3330.00, 0.00, 'DVDC25-000007', 'Shariful Islam', '{\"method\":\"cash\"}', 'complete', '2025-10-05 18:27:49', '2025-10-05 20:06:45'),
(130, 2, 8, NULL, 2200.00, 110.00, NULL, 0.00, 'amount', 'percentage', 'percentage', 2200.00, 0.00, 'DVDC25-000008', 'Shariful Islam', '{\"method\":\"cash\"}', 'complete', '2025-10-05 18:43:34', '2025-10-05 19:45:14'),
(131, 5, 2, NULL, 3400.00, 170.00, NULL, 0.00, 'amount', 'percentage', 'percentage', 3400.00, 0.00, 'DVDC25-000009', 'Shariful Islam', '{\"method\":\"cash\"}', 'complete', '2025-10-05 19:08:07', '2025-10-05 19:45:17'),
(132, 10, 6, NULL, 1000.00, 50.00, NULL, 0.00, 'amount', 'percentage', 'percentage', 1000.00, 0.00, 'DVDC25-000010', 'Shariful Islam', '{\"method\":\"cash\"}', 'complete', '2025-10-05 19:37:42', '2025-10-05 19:45:01'),
(133, 8, 3, NULL, 1500.00, 75.00, NULL, 0.00, 'amount', 'percentage', 'percentage', 1500.00, 0.00, 'DVDC25-000011', 'Shariful Islam', '{\"method\":\"cash\"}', 'complete', '2025-10-05 19:41:30', '2025-10-05 19:45:01'),
(134, 8, 7, NULL, 2500.00, 125.00, NULL, 0.00, 'amount', 'percentage', 'percentage', 2500.00, 0.00, 'DVDC25-000012', 'Shariful Islam', '{\"method\":\"cash\"}', 'complete', '2025-10-05 19:45:59', '2025-10-05 19:46:07'),
(135, 4, 8, NULL, 3600.00, 180.00, NULL, 0.00, 'amount', 'percentage', 'percentage', 3600.00, 0.00, 'DVDC25-000013', 'Shariful Islam', '{\"method\":\"cash\"}', 'complete', '2025-10-05 20:12:29', '2025-10-05 20:12:58'),
(136, 4, 2, NULL, 3200.00, 160.00, NULL, 0.00, 'amount', 'percentage', 'percentage', 3200.00, 0.00, 'DVDC25-000014', 'Shariful Islam', '{\"method\":\"cash\"}', 'complete', '2025-10-06 05:50:21', '2025-10-06 05:51:46'),
(137, 7, 2, NULL, 3515.00, 176.00, NULL, 5.00, 'percentage', 'percentage', 'percentage', 3515.00, 0.00, 'DVDC25-000015', 'Shariful Islam', '{\"method\":\"cash\"}', 'complete', '2025-10-06 19:49:42', '2025-10-06 19:51:37'),
(138, 10, 2, NULL, 400.00, 20.00, NULL, 0.00, 'amount', 'percentage', 'percentage', 400.00, 0.00, 'DVDC25-000016', 'Shariful Islam', '{\"method\":\"cash\"}', 'complete', '2025-10-06 19:52:48', '2025-10-06 19:53:27');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `blog_category_id` varchar(255) DEFAULT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `views` bigint(20) NOT NULL DEFAULT 0,
  `author_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `blog_category_id`, `description`, `image`, `views`, `author_name`, `created_at`, `updated_at`) VALUES
(1, 'The Role of Diploma Pharmacists in Strengthening Bangladesh Healthcare System', 'the-role-diploma-pharmacists-strengthening-bangladesh-healthcare', '3', '<p>Diploma medical pharmacists play a vital role in ensuring safe medication practices and accessible healthcare across Bangladesh. This blog explores how their community outreach, clinical services, and pharmaceutical knowledge help bridge the healthcare gap, especially in rural areas. BDMPPA continues to advocate for improved recognition, training, and integration of diploma pharmacists into national health policy, creating a healthier, more sustainable future for all citizens.</p>', 'blogs/1.png', 1, 'Shariful Islam', '2025-08-27 12:05:40', '2025-09-22 03:58:15'),
(2, 'BDMPPA Launches Nationwide Training for Safe Dispensing Practices', 'bdmppa-launches-nationwide-training-for-safe-dispensing-practices', '4', '<p>To raise awareness and enhance the quality of pharmaceutical services, BDMPPA has initiated a training campaign for diploma pharmacists across districts. The program includes modules on proper drug handling, patient counseling, and legal compliance. Participants gain CPD certification upon completion. This move is part of BDMPPA’s ongoing mission to upgrade healthcare standards and equip pharmacists with tools for ethical and professional growth.</p>', 'blogs/2.png', 5, 'Shariful Islam', '2025-08-27 12:05:40', '2025-09-25 13:08:28'),
(3, 'Why Diploma Pharmacists Are Essential in Rural Health Outreach Programs', 'why-diploma-pharmacists-are-essential-in-rural-health-outreach-programs', '4', '<p>In many underserved rural areas of Bangladesh, diploma pharmacists serve as the first point of contact for patients. This blog highlights their significance in managing chronic diseases, advising on over-the-counter medications, and ensuring rational drug use. BDMPPA continues to support their efforts with resources, policy advocacy, and capacity-building initiatives.</p>', 'blogs/3.png', 0, 'Shariful Islam', '2025-08-27 12:05:40', '2025-09-20 03:26:52'),
(4, 'Highlights from the BDMPPA Annual General Meeting 2025', 'highlights-from-the-bdmppa-annual-general-meeting-2025', '5', '<p>The BDMPPA AGM 2025 brought together hundreds of pharmacists, policymakers, and stakeholders to discuss the future of diploma pharmacists in Bangladesh. Key topics included digital transformation, updated licensing processes, member welfare, and district-level committee elections. The event marked another step forward in unifying voices for better health outcomes nationwide.</p>', 'blogs/4.gif', 1, 'Shariful Islam', '2025-08-27 12:05:40', '2025-09-26 11:35:19'),
(5, 'Digital Health & The Emerging Role of Pharmacists in Bangladesh', 'digital-health-emerging-role-of-pharmacists-in-bangladesh', '2', '<p>As Bangladesh moves towards eHealth solutions, diploma pharmacists are evolving too. From telepharmacy to digital prescriptions, this blog explores the exciting ways pharmacists are integrating into the digital health ecosystem. BDMPPA is working to ensure its members are ready with the necessary tools and training to adapt.</p>', 'blogs/5.png', 1, 'Shariful Islam', '2025-08-27 12:05:40', '2025-09-22 04:07:38'),
(6, 'BDMPPA’s Contribution to COVID-19 Response and Recovery', 'bdmppa-contribution-to-covid-19-response-and-recovery', '7', '<p>During the COVID-19 crisis, BDMPPA pharmacists were on the frontlines—distributing medicines, educating communities, and fighting misinformation. This article looks back at their contributions, challenges faced, and lessons learned. The Association continues to support pandemic recovery through policy engagement and pharmacist mental health awareness.</p>', 'blogs/6.png', 1, 'Shariful Islam', '2025-08-27 12:05:40', '2025-09-22 03:58:45'),
(7, 'Safe Medication Storage: BDMPPA Awareness Campaign in Local Clinics', 'safe-medication-storage-bdmppa-awareness-campaign-in-local-clinics', '8', '<p>Improper medicine storage can reduce effectiveness or cause harm. BDMPPA recently ran awareness drives in clinics and pharmacies to teach best practices in storing, labeling, and handling drugs. The campaign helped raise community trust and enhanced the role of pharmacists in safe healthcare delivery.</p>', 'blogs/7.gif', 0, 'Shariful Islam', '2025-08-27 12:05:40', '2025-09-20 03:27:33'),
(8, 'Becoming a Member of BDMPPA – Benefits & Process', 'becoming-a-member-of-bdmppa-benefits-and-process', '5', '<p>Joining BDMPPA opens the door to professional development, exclusive training, networking, and recognition. This blog outlines the step-by-step registration process, eligibility criteria, and what members gain—such as ID cards, event access, and vote rights in committee elections. BDMPPA stands for unity, strength, and progress.</p>', 'blogs/1.png', 0, 'Shariful Islam', '2025-08-27 12:05:40', '2025-09-20 03:27:38'),
(9, 'Pharmacy Ethics: A Guide for Diploma Pharmacists in Bangladesh', 'pharmacy-ethics-guide-for-diploma-pharmacists-in-bangladesh', '4', '<p>This blog covers key ethical principles pharmacists should follow, including patient confidentiality, rational drug use, and non-commercial prescribing. It includes practical examples and references from Bangladesh Pharmacy Council guidelines. BDMPPA is committed to promoting an ethical culture among all practicing pharmacists.</p>', 'blogs/2.png', 0, 'Shariful Islam', '2025-08-27 12:05:40', '2025-09-20 03:27:44'),
(10, 'Women in Pharmacy: Empowering Female Diploma Pharmacists', 'women-in-pharmacy-empowering-female-diploma-pharmacists', '4', '<p>More women are entering the pharmacy profession in Bangladesh than ever before. BDMPPA celebrates their contributions and encourages equal participation in leadership roles. This article shares inspiring stories and outlines how the Association supports women’s professional growth and safety in the workplace.</p>', 'blogs/3.png', 0, 'Shariful Islam', '2025-08-27 12:05:40', '2025-09-20 03:28:09'),
(11, 'Understanding the Pharmacy Act: What Every Pharmacist Should Know', 'understanding-the-pharmacy-act-what-every-pharmacist-should-know', '3', '<p>Many pharmacists remain unaware of legal responsibilities outlined in the Pharmacy Act of Bangladesh. This blog simplifies key sections related to licensing, registration, and code of conduct, ensuring diploma pharmacists stay informed and compliant. BDMPPA also provides legal aid and seminars to support members.</p>', 'blogs/4.gif', 0, 'Shariful Islam', '2025-08-27 12:05:40', '2025-09-21 15:49:26'),
(12, 'Success Stories: Diploma Pharmacists Making a National Impac', 'success-stories-diploma-pharmacists-making-a-national-impact', '8', '<p>From district hospitals to remote clinics, diploma pharmacists are transforming lives. This blog showcases stories of individual BDMPPA members who’ve gone above and beyond—organizing free medical camps, innovating digital health tools, and training youth. These stories inspire pride and purpose in the profession.</p>', 'blogs/5.png', 0, 'Shariful Islam', '2025-08-27 12:05:40', '2025-09-20 03:28:21'),
(13, 'Advanced Cardiology', 'advanced-cardiology', '1', '<h1 data-start=\"78\" data-end=\"158\">The Ultimate Guide to Fitness: How to Start and Stay Motivated on Your Journey</h1><p data-start=\"160\" data-end=\"501\">In today’s fast-paced world, fitness has become more important than ever. It’s not just about looking good; it’s about feeling strong, energized, and maintaining overall well-being. Whether you’re a beginner or someone looking to revamp your fitness routine, understanding the fundamentals and staying motivated are key to long-term success.</p><h2 data-start=\"503\" data-end=\"525\">Why Fitness Matters</h2><p data-start=\"527\" data-end=\"931\">Fitness is much more than just hitting the gym or running on a treadmill. It’s about improving your cardiovascular health, building muscle strength, enhancing flexibility, and boosting mental health. Regular physical activity helps reduce the risk of chronic diseases such as heart disease, diabetes, and certain cancers. It also aids in weight management, improves sleep quality, and increases lifespan.</p><p data-start=\"933\" data-end=\"1186\">Moreover, fitness has a powerful impact on mental health. Exercise releases endorphins, often called the \"feel-good\" hormones, which help reduce stress, anxiety, and symptoms of depression. It also improves cognitive function and boosts self-confidence.</p><h2 data-start=\"1188\" data-end=\"1231\">Getting Started: Setting Realistic Goals</h2><p data-start=\"1233\" data-end=\"1479\">One of the biggest barriers to starting a fitness journey is not knowing where to begin. The key is to set realistic, measurable, and achievable goals. Instead of aiming to “get fit” without specifics, define what that means for you. It could be:</p><ul data-start=\"1481\" data-end=\"1630\">\n<li data-start=\"1481\" data-end=\"1513\">\n<p data-start=\"1483\" data-end=\"1513\">Losing 10 pounds in 3 months</p>\n</li>\n<li data-start=\"1514\" data-end=\"1535\">\n<p data-start=\"1516\" data-end=\"1535\">Running a 5K race</p>\n</li>\n<li data-start=\"1536\" data-end=\"1585\">\n<p data-start=\"1538\" data-end=\"1585\">Being able to do 20 push-ups without stopping</p>\n</li>\n<li data-start=\"1586\" data-end=\"1630\">\n<p data-start=\"1588\" data-end=\"1630\">Improving flexibility to touch your toes</p>\n</li>\n</ul><p data-start=\"1632\" data-end=\"1735\">Write down your goals and track your progress regularly. This helps keep you accountable and motivated.</p><h2 data-start=\"1737\" data-end=\"1775\">Building a Balanced Fitness Routine</h2><p>\n\n\n\n\n\n\n\n\n\n</p><p data-start=\"1777\" data-end=\"1936\">A well-rounded fitness routine combines different types of exercise to work various parts of the body and improve overall health. Here are the main components:</p>', 'blogs/MlPhRssy1DXdMlfepoaGgnx2WvkNA9iwSsUdG2wI.jpg', 10, 'Shariful Islam', '2025-09-19 13:49:32', '2025-09-27 01:49:44'),
(14, 'Health & Nutrition: Your Guide to a Balanced Life', 'health-nutrition-your-guide-to-a-balanced-life', '9', '<p>Discover practical tips, expert advice, and evidence-based insights on maintaining a healthy lifestyle through proper nutrition, regular exercise, and mindful habits. Empower yourself to make informed choices for better energy, immunity, and overall well-being.</p>', 'blogs/health-nutrition-your-guide-to-a-balanced-life-1758537148.jpg', 5004, 'Shariful Islam', '2025-09-21 10:10:34', '2025-09-25 06:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `bolg_categories`
--

CREATE TABLE `bolg_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bolg_categories`
--

INSERT INTO `bolg_categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Cardiology', 'cardiology', '2025-09-19 13:42:09', '2025-09-19 13:42:09'),
(2, 'Neurology', 'neurology', '2025-09-19 13:44:34', '2025-09-19 13:44:34'),
(3, 'Urology', 'urology', '2025-09-19 13:44:45', '2025-09-19 13:44:45'),
(4, 'Hematology', 'hematology', '2025-09-20 03:12:43', '2025-09-20 03:12:43'),
(5, 'Surgery', 'surgery', '2025-09-20 03:13:00', '2025-09-20 03:13:00'),
(6, 'Gynecology', 'gynecology', '2025-09-20 03:13:12', '2025-09-20 03:13:12'),
(7, 'Respiratory Medicine', 'respiratory-medicine', '2025-09-20 03:13:44', '2025-09-20 03:13:44'),
(8, 'Internal Medicine', 'internal-medicine', '2025-09-20 03:13:56', '2025-09-20 03:13:56'),
(9, 'Health & Nutrition', 'health-nutrition', '2025-09-21 10:09:35', '2025-09-21 10:09:35');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commanders`
--

CREATE TABLE `commanders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commanders`
--

INSERT INTO `commanders` (`id`, `name`, `designation`, `address`, `message`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Shariful Islam', 'President', 'Dhaka, Bangladesh', 'CEO Message Dear Members, Colleagues, and Visitors, It is my great pleasure to welcome you to the official website of the Bangladesh Diploma Medical Practitioner Association (BDMPPA). As an organization representing thousands of dedicated and skilled diploma medical pharmacists across the country, BDMPPA is committed to upholding professional standards, ensuring ethical practices, and strengthening the role of pharmacists in Bangladesh’s healthcare system. In today’s rapidly evolving medical landscape, our responsibilities are greater than ever. From ensuring the safe dispensing of medications to playing an active role in patient care and public health, diploma medical pharmacists are vital pillars of the nation’s health infrastructure. Our mission is to unite, educate, and empower our members through structured training, nationwide networking, awareness campaigns, and professional development opportunities. This digital platform serves as a hub for our initiatives, updates, and member services — promoting transparency, accessibility, and collaboration. I invite all pharmacists, healthcare professionals, and stakeholders to actively engage with BDMPPA, contribute your knowledge, and help us build a more robust and reliable healthcare future. Thank you for your trust, dedication, and continued support. Warm regards, \n                [Your Name]\n                Chief Executive Officer (CEO)\n                BDMPPA', 'commanders/1.jpg', '2025-08-27 12:05:40', '2025-08-27 12:05:40');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `slug`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Safe Dispensing Practices for Community Pharmacists', 'safe-dispensing-practices-for-community-pharmacists', 'courses/1.png', 'This course trains diploma pharmacists on correct medication dispensing procedures, labeling, patient counseling, and error prevention techniques. It includes real-life case studies and practical guidelines to reduce dispensing mistakes. Designed especially for retail and rural pharmacists, this training strengthens safety and accuracy in daily pharmaceutical practice.', '2025-08-27 12:05:40', '2025-08-27 12:05:40'),
(2, 'Pharmacy Law and Ethics in Bangladesh Healthcare System', 'pharmacy-law-and-ethics-in-bangladesh-healthcare-system', 'courses/2.png', 'Learn about the Pharmacy Act, drug policies, and ethical responsibilities in pharmaceutical practice. This course helps pharmacists understand legal boundaries, licensing, and ethical dilemmas they may face. BDMPPA aims to create a legally aware and ethically strong pharmacist community through this program.', '2025-08-27 12:05:40', '2025-08-27 12:05:40'),
(3, 'Antibiotic Stewardship and Rational Drug Use', 'antibiotic-stewardship-and-rational-drug-use', 'courses/3.png', 'A specialized course that promotes the responsible use of antibiotics to prevent resistance. Pharmacists will learn how to counsel patients, verify prescriptions, and work with physicians to ensure rational drug use. Supported by WHO guidelines and BDMPPA recommendations.', '2025-08-27 12:05:40', '2025-08-27 12:05:40'),
(4, 'Essential Pharmacology for Diploma Pharmacists', 'essential-pharmacology-for-diploma-pharmacists', 'courses/4.png', 'This refresher course covers drug classifications, mechanisms of action, and side effects of commonly used medications in Bangladesh. Ideal for practicing pharmacists needing updated knowledge to ensure safe and effective patient care, especially in rural or low-resource settings.', '2025-08-27 12:05:40', '2025-08-27 12:05:40'),
(5, 'Inventory Management & Record Keeping for Pharmacies', 'inventory-management-record-keeping-for-pharmacies', 'courses/5.png', 'Learn how to manage medicine stock efficiently, avoid expiries, and maintain digital or manual pharmacy records. This course is essential for pharmacy owners and operators seeking to streamline operations and improve accountability.', '2025-08-27 12:05:40', '2025-08-27 12:05:40'),
(6, 'First Aid and Emergency Response Training for Pharmacists', 'first-aid-and-emergency-response-training-for-pharmacists', 'courses/6.png', 'Empower yourself with life-saving skills like CPR, wound management, and initial trauma care. This course is designed to help pharmacists provide essential first aid during emergencies when professional help isn’t immediately available, especially in rural or remote areas.', '2025-08-27 12:05:40', '2025-08-27 12:05:40');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `title`, `description`, `icon`, `color`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Laboratory', '<h6 class=\"sr-only\">ChatGPT said:</h6><div class=\"text-base my-auto mx-auto pb-10 [--thread-content-margin:--spacing(4)] thread-sm:[--thread-content-margin:--spacing(6)] thread-lg:[--thread-content-margin:--spacing(16)] px-(--thread-content-margin)\"><div class=\"[--thread-content-max-width:40rem] thread-lg:[--thread-content-max-width:48rem] mx-auto max-w-(--thread-content-max-width) flex-1 group/turn-messages focus-visible:outline-hidden relative flex w-full min-w-0 flex-col agent-turn\" tabindex=\"-1\"><div class=\"flex max-w-full flex-col grow\"><div data-message-author-role=\"assistant\" data-message-id=\"43168f3f-0d27-407a-9920-48b77a2d298d\" dir=\"auto\" class=\"min-h-8 text-message relative flex w-full flex-col items-end gap-2 text-start break-words whitespace-normal [.text-message+&amp;]:mt-5\" data-message-model-slug=\"gpt-4o\"><div class=\"flex w-full flex-col gap-1 empty:hidden first:pt-[3px]\"><div class=\"streaming-animation markdown prose dark:prose-invert w-full break-words light markdown-new-styling\"><p data-start=\"0\" data-end=\"437\">A <strong data-start=\"2\" data-end=\"27\">laboratory department</strong> in a healthcare or medical setting plays a crucial role in diagnosing and monitoring various health conditions. It is responsible for performing tests on patient samples (such as blood, urine, tissues, or other bodily fluids) to provide diagnostic, therapeutic, and preventive information to physicians. Laboratory departments can be found in hospitals, clinics, research institutions, and diagnostic centers.</p></div></div></div></div></div></div>', 'fas fa-vials', '#9b59b6', 'blogs/laboratory-1758487472.jpg', '2025-09-20 08:39:23', '2025-09-21 14:44:32'),
(3, 'Cardiology', '<p>Cardiology, which is the study and treatment of heart-related conditions, frequently relies on ultrasonography for diagnosis and monitoring. Ultrasonography in cardiology, often referred to as <strong data-start=\"193\" data-end=\"213\">echocardiography</strong>, is used to visualize the heart\'s structure and function. It helps in diagnosing a variety of cardiac conditions and provides real-time images of the heart in action.</p>', 'fas fa-heartbeat', '#e74c3c', 'blogs/cardiology-1758487461.webp', '2025-09-20 10:11:03', '2025-09-21 14:44:21'),
(4, 'Ultrasonography', '<p>Ultrasonography, or ultrasound, is a medical imaging technique that uses high-frequency sound waves to create images of the inside of the body. This non-invasive method is widely used for various diagnostic purposes and is a critical tool in many medical fields.</p>', 'fas fa-wave-square', '#27ae60', 'blogs/ultrasonography-1758487450.png', '2025-09-20 10:41:02', '2025-09-21 14:44:10'),
(5, 'Radiology', '<p>The <strong data-start=\"4\" data-end=\"28\">Radiology Department</strong> in a hospital or medical facility is responsible for diagnosing and treating diseases using various imaging techniques. These imaging methods allow doctors to view the inside of the body without performing surgery. Radiology plays a vital role in patient care by providing critical information that aids in the diagnosis, treatment planning, and monitoring of medical conditions.</p>', 'fas fa-x-ray', '#3498db', 'blogs/radiology-1758487433.jpg', '2025-09-20 10:53:35', '2025-09-21 14:43:53');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `specialization` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `note` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `gender`, `date_of_birth`, `image`, `phone`, `specialization`, `qualification`, `designation`, `is_active`, `note`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Yahia', 'male', '1970-01-01', 'doctors/dr-yahia-1758782187.png', '01738153971', 'Cardiology', 'MBBS, FCPS, MD', 'Consultant', 1, '<p data-start=\"83\" data-end=\"543\">❤️ Diagnosis &amp; Management of Heart Diseases<br data-start=\"126\" data-end=\"129\">\n🫀 Coronary Artery Disease (Ischemic Heart Disease, Heart Attack)<br data-start=\"194\" data-end=\"197\">\n💓 Heart Failure &amp; Cardiomyopathy<br data-start=\"230\" data-end=\"233\">\n🩺 Hypertension &amp; Cholesterol Management<br data-start=\"273\" data-end=\"276\">\n🫁 Pulmonary Hypertension &amp; Lung-related Cardiac Disorders<br data-start=\"334\" data-end=\"337\">\n🧪 ECG, Echocardiography &amp; Cardiac Imaging Interpretation<br data-start=\"394\" data-end=\"397\">\n🩹 Post-Operative Cardiac Care &amp; Rehabilitation<br data-start=\"444\" data-end=\"447\">\n⚡ Arrhythmia &amp; Pacemaker/Device Management<br data-start=\"489\" data-end=\"492\">\n🍎 Preventive Cardiology &amp; Lifestyle Modification</p>', '2025-08-27 18:23:09', '2025-09-26 08:38:54'),
(2, 'Dr. Shafiqul', 'male', '1984-01-01', 'doctors/dr-shafiqul-1758782032.png', '01700000000', 'Cardiology', 'MBBS, FCPS, MD', 'Consultant', 1, '<p data-start=\"83\" data-end=\"543\">❤️ Diagnosis &amp; Management of Heart Diseases<br data-start=\"126\" data-end=\"129\">\n🫀 Coronary Artery Disease (Ischemic Heart Disease, Heart Attack)<br data-start=\"194\" data-end=\"197\">\n💓 Heart Failure &amp; Cardiomyopathy<br data-start=\"230\" data-end=\"233\">\n🩺 Hypertension &amp; Cholesterol Management<br data-start=\"273\" data-end=\"276\">\n🫁 Pulmonary Hypertension &amp; Lung-related Cardiac Disorders<br data-start=\"334\" data-end=\"337\">\n🧪 ECG, Echocardiography &amp; Cardiac Imaging Interpretation<br data-start=\"394\" data-end=\"397\">\n🩹 Post-Operative Cardiac Care &amp; Rehabilitation<br data-start=\"444\" data-end=\"447\">\n⚡ Arrhythmia &amp; Pacemaker/Device Management<br data-start=\"489\" data-end=\"492\">\n🍎 Preventive Cardiology &amp; Lifestyle Modification</p>', '2025-08-30 04:48:13', '2025-09-26 08:48:50'),
(3, 'Dr.Jubaida Rumana', 'female', '1963-01-01', 'doctors/drjubaida-rumana-1758781587.png', '01300116409 ', 'Pediatrics', 'MBBS, MCPS(Medicine), MD(Neurology)', 'Professor', 1, '<p>👶 Newborn &amp; Infant Care<br data-start=\"110\" data-end=\"113\">\n🍼 Growth &amp; Development Monitoring<br data-start=\"147\" data-end=\"150\">\n🤒 Common Childhood Illnesses (Fever, Cough, Diarrhoea)<br data-start=\"205\" data-end=\"208\">\n💉 Vaccination &amp; Immunization<br data-start=\"237\" data-end=\"240\">\n🫁 Asthma &amp; Allergic Disorders in Children<br data-start=\"282\" data-end=\"285\">\n🧠 Neurological &amp; Developmental Disorders<br data-start=\"326\" data-end=\"329\">\n🍎 Nutrition &amp; Feeding Guidance<br data-start=\"360\" data-end=\"363\">\n🩺 Management of Chronic Paediatric Diseases<br data-start=\"407\" data-end=\"410\">\n🏥 Neonatal Intensive Care (NICU) &amp; Critical Care</p>', '2025-09-03 08:50:37', '2025-09-26 08:48:49'),
(4, 'Dr. Eshita Biswas', 'female', '1990-01-01', 'doctors/dr-eshita-biswas-1758781357.png', '018xxxxxxxx', 'Internal Medicine', 'MBBS, FCPS(MMedicine)', 'Associate Consultant', 1, '<p>🩺 Diagnosis &amp; Management of adult diseases<br data-start=\"159\" data-end=\"162\">\n💉 Diabetes, Hypertension, Thyroid disorders<br data-start=\"206\" data-end=\"209\">\n❤️‍🩹 Heart &amp; Lung diseases (Asthma, COPD, Ischemic Heart Disease)<br data-start=\"275\" data-end=\"278\">\n🫁 Liver, Kidney &amp; Gastrointestinal diseases<br data-start=\"322\" data-end=\"325\">\n🦠 Infectious Diseases (Dengue, Typhoid, Pneumonia, Tuberculosis, Hepatitis)<br data-start=\"401\" data-end=\"404\">\n🦴 Rheumatology &amp; Autoimmune disorders (Arthritis, SLE)<br data-start=\"459\" data-end=\"462\">\n⚖️ Hormonal &amp; Endocrine disorders<br data-start=\"495\" data-end=\"498\">\n🍎 Preventive Health &amp; Lifestyle Medicine<br data-start=\"539\" data-end=\"542\">\n📋 General Adult Checkup &amp; Long-term Disease Management</p>', '2025-09-25 00:09:24', '2025-09-26 08:48:48'),
(5, 'Dr. Md.Akhter Hossain', 'male', NULL, 'doctors/dr-mdakhter-hossain-1758781855.png', NULL, 'Cardiology', 'MBBS, MCPS(Cardiovascular)', 'Senior Consultant', 1, '<p data-start=\"83\" data-end=\"543\">❤️ Diagnosis &amp; Management of Heart Diseases<br data-start=\"126\" data-end=\"129\">\n🫀 Coronary Artery Disease (Ischemic Heart Disease, Heart Attack)<br data-start=\"194\" data-end=\"197\">\n💓 Heart Failure &amp; Cardiomyopathy<br data-start=\"230\" data-end=\"233\">\n🩺 Hypertension &amp; Cholesterol Management<br data-start=\"273\" data-end=\"276\">\n🫁 Pulmonary Hypertension &amp; Lung-related Cardiac Disorders<br data-start=\"334\" data-end=\"337\">\n🧪 ECG, Echocardiography &amp; Cardiac Imaging Interpretation<br data-start=\"394\" data-end=\"397\">\n🩹 Post-Operative Cardiac Care &amp; Rehabilitation<br data-start=\"444\" data-end=\"447\">\n⚡ Arrhythmia &amp; Pacemaker/Device Management<br data-start=\"489\" data-end=\"492\">\n🍎 Preventive Cardiology &amp; Lifestyle Modification</p>', '2025-09-25 00:11:36', '2025-09-26 08:48:47'),
(6, 'Dr.Fahim Feroz', 'male', '1983-01-01', 'doctors/drfahim-feroz-1758781718.png', '017xxxxxxxx', 'Plastic Surgery', 'MBBS, FCPS, MD(Dermatology),UK', 'Senior Consultant', 1, '<p>🩺 <strong data-start=\"85\" data-end=\"111\">Reconstructive Surgery</strong> – দুর্ঘটনা বা আঘাতের পর ক্ষত মেরামত<br data-start=\"147\" data-end=\"150\">\n✨ <strong data-start=\"152\" data-end=\"172\">Cosmetic Surgery</strong> – সৌন্দর্য বর্ধন (Face, Nose, Lip, Chin ইত্যাদি)<br data-start=\"221\" data-end=\"224\">\n👃 <strong data-start=\"227\" data-end=\"253\">Rhinoplasty (Nose Job)</strong> – নাকের গঠন সংশোধন<br data-start=\"272\" data-end=\"275\">\n👁 <strong data-start=\"278\" data-end=\"313\">Eyelid Surgery (Blepharoplasty)</strong> – চোখের সৌন্দর্য বৃদ্ধি ও ফোলাভাব কমানো<br data-start=\"353\" data-end=\"356\">\n💇 <strong data-start=\"359\" data-end=\"378\">Hair Transplant</strong> – টাক বা চুল কমে যাওয়ার চিকিৎসা<br data-start=\"410\" data-end=\"413\">\n👂 <strong data-start=\"416\" data-end=\"443\">Otoplasty (Ear Surgery)</strong> – কান সংশোধন<br data-start=\"456\" data-end=\"459\">\n🦵 <strong data-start=\"462\" data-end=\"488\">Burn &amp; Scar Management</strong> – পোড়া দাগ বা অস্ত্রোপচারের দাগ দূরীকরণ<br data-start=\"529\" data-end=\"532\">\n🤲 <strong data-start=\"535\" data-end=\"551\">Hand Surgery</strong> – হাতের সমস্যা ও আঘাত মেরামত<br data-start=\"580\" data-end=\"583\">\n🏥 <strong data-start=\"586\" data-end=\"617\">Reconstructive Microsurgery</strong> – জটিল টিস্যু/অঙ্গ প্রতিস্থাপন</p>', '2025-09-25 00:16:25', '2025-09-26 08:48:40'),
(7, 'Dr. Bepasa Nazmin', 'female', '1992-01-01', 'doctors/0nsGNU8yRcjGjqNR0uw9Ft5pB9ICUjQKFQu7q0Ym.png', '017xxxxxxxx', 'Internal Medicine', 'MBBS, FCPS, MD(Medicine)', 'Associate Consultant', 1, '<li data-start=\"98\" data-end=\"146\"><p data-start=\"100\" data-end=\"146\">🩺 Diagnosis &amp; Management of adult diseases<br data-start=\"159\" data-end=\"162\">\n💉 Diabetes, Hypertension, Thyroid disorders<br data-start=\"206\" data-end=\"209\">\n❤️‍🩹 Heart &amp; Lung diseases (Asthma, COPD, Ischemic Heart Disease)<br data-start=\"275\" data-end=\"278\">\n🫁 Liver, Kidney &amp; Gastrointestinal diseases<br data-start=\"322\" data-end=\"325\">\n🦠 Infectious Diseases (Dengue, Typhoid, Pneumonia, Tuberculosis, Hepatitis)<br data-start=\"401\" data-end=\"404\">\n🦴 Rheumatology &amp; Autoimmune disorders (Arthritis, SLE)<br data-start=\"459\" data-end=\"462\">\n⚖️ Hormonal &amp; Endocrine disorders<br data-start=\"495\" data-end=\"498\">\n🍎 Preventive Health &amp; Lifestyle Medicine<br data-start=\"539\" data-end=\"542\">\n📋 General Adult Checkup &amp; Long-term Disease Management</p></li>', '2025-09-25 00:39:57', '2025-09-26 08:48:33'),
(8, 'Dr.Motiul Islam', 'male', '1976-01-01', 'doctors/YyuQVCgTkUwd1MM8liIWuwK6RsstEdbszc2zQ40l.png', '015xxxxxxxx', 'Internal Medicine', 'MBBS, FCPS, MD(Critical Medicine)', 'Consultant', 1, '<li data-start=\"98\" data-end=\"146\"><p data-start=\"100\" data-end=\"146\">🩺 Diagnosis &amp; Management of adult diseases<br data-start=\"159\" data-end=\"162\">\n💉 Diabetes, Hypertension, Thyroid disorders<br data-start=\"206\" data-end=\"209\">\n❤️‍🩹 Heart &amp; Lung diseases (Asthma, COPD, Ischemic Heart Disease)<br data-start=\"275\" data-end=\"278\">\n🫁 Liver, Kidney &amp; Gastrointestinal diseases<br data-start=\"322\" data-end=\"325\">\n🦠 Infectious Diseases (Dengue, Typhoid, Pneumonia, Tuberculosis, Hepatitis)<br data-start=\"401\" data-end=\"404\">\n🦴 Rheumatology &amp; Autoimmune disorders (Arthritis, SLE)<br data-start=\"459\" data-end=\"462\">\n⚖️ Hormonal &amp; Endocrine disorders<br data-start=\"495\" data-end=\"498\">\n🍎 Preventive Health &amp; Lifestyle Medicine<br data-start=\"539\" data-end=\"542\">\n📋 General Adult Checkup &amp; Long-term Disease Management</p></li>', '2025-09-25 00:44:02', '2025-09-26 08:48:16');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `expense_category_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `date` date NOT NULL DEFAULT '2025-08-27',
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `name`, `expense_category_id`, `amount`, `date`, `note`, `created_at`, `updated_at`) VALUES
(26, 'Mobile Recharge', 3, 55.00, '2025-10-05', NULL, '2025-10-04 18:11:45', '2025-10-04 18:11:45'),
(27, 'Breakfast', 3, 150.00, '2025-10-06', NULL, '2025-10-05 18:35:45', '2025-10-05 18:35:45');

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

CREATE TABLE `expense_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_categories`
--

INSERT INTO `expense_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Reagent Fee', '2025-08-28 07:57:34', '2025-08-28 07:57:34'),
(2, 'Transpot Fee', '2025-09-14 02:00:21', '2025-09-14 02:00:21'),
(3, 'Fee', '2025-09-25 06:59:58', '2025-09-25 06:59:58');

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
-- Table structure for table `investigations`
--

CREATE TABLE `investigations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `test_name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `test_category_name` varchar(255) DEFAULT NULL,
  `buy_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `sell_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `test_form` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`test_form`)),
  `xray_form` longtext DEFAULT NULL,
  `usg_form` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `investigations`
--

INSERT INTO `investigations` (`id`, `test_name`, `department`, `test_category_name`, `buy_price`, `sell_price`, `test_form`, `xray_form`, `usg_form`, `created_at`, `updated_at`) VALUES
(15, 'Random Plasma Glucose', 'laboratory', 'BIOCHEMISTRY', 0.00, 1800.00, '[{\"parameter_name\":\"Random Plasma Glucose\",\"result\":\"1\",\"normal_value\":\"< 140\",\"unit\":\"mg\\/dL\"}]', NULL, NULL, '2025-08-28 10:00:21', '2025-08-29 12:38:39'),
(16, 'Creatinine Serum ', 'laboratory', 'BIOCHEMISTRY', 0.00, 400.00, '[{\"parameter_name\":\"Serum Creatinine\",\"result\":\"1\",\"normal_value\":\"0.6\\u2013 1.3\",\"unit\":\"mg\\/dL\"}]', NULL, NULL, '2025-08-28 10:00:39', '2025-09-10 06:33:49'),
(17, 'Electrolytes Serum', 'laboratory', 'BIOCHEMISTRY', 0.00, 1100.00, '[{\"parameter_name\":\"Electrolytes \",\"result\":\" \",\"normal_value\":\" \",\"unit\":\"\"},{\"parameter_name\":\"Serum Sodium (Na\\u207a)\",\"result\":\"1\",\"normal_value\":\"135 \\u2013 148\",\"unit\":\"mmol\\/L\"},{\"parameter_name\":\"Serum Potasium (K\\u207a)\",\"result\":\"1\",\"normal_value\":\"3.5 \\u2013 5.3\",\"unit\":\"mmol\\/L\"},{\"parameter_name\":\"Serum Chloride (Cl\\u207b)\",\"result\":\"1\",\"normal_value\":\"98 \\u2013 107\",\"unit\":\"mmol\\/L\"}]', NULL, NULL, '2025-08-28 10:01:13', '2025-09-11 00:35:45'),
(18, 'CRP', 'laboratory', 'SEROLOGY', 0.00, 600.00, '[{\"parameter_name\":\"CRP\",\"result\":\"1\",\"normal_value\":\"1 - 10\",\"unit\":\"mg\\/L\"}]', NULL, NULL, '2025-08-28 10:02:03', '2025-09-10 21:05:12'),
(19, 'hsCRP', 'laboratory', 'SEROLOGY', 0.00, 800.00, '[{\"parameter_name\":\"hsCRP\",\"result\":\"1\",\"normal_value\":\"0 - 1.0\",\"unit\":\"mg\\/L\"}]', NULL, NULL, '2025-08-28 10:02:14', '2025-09-10 21:05:51'),
(20, 'TSH', 'laboratory', 'IMMUNOASSAY', 0.00, 800.00, '[{\"parameter_name\":\"TSH\",\"result\":\"1\",\"normal_value\":\"0.3 - 4.2\",\"unit\":\" IU\\/ml\"}]', NULL, NULL, '2025-08-28 10:02:50', '2025-09-10 06:44:45'),
(21, 'Vitamin D-3 ', 'laboratory', 'IMMUNOASSAY', 0.00, 3500.00, '[{\"parameter_name\":\"Vitamin D-3 \",\"result\":\"1\",\"normal_value\":\"30 - 100\",\"unit\":\"ng\\/ml\"}]', NULL, NULL, '2025-08-28 10:03:08', '2025-09-10 05:22:25'),
(22, 'HbA1c', 'laboratory', 'BIOCHEMISTRY', 0.00, 1200.00, '[{\"parameter_name\":\"HbA1c\",\"result\":\"1\",\"normal_value\":\"4.40-6.40%\",\"unit\":\"\"}]', NULL, NULL, '2025-08-28 10:04:14', '2025-09-10 06:43:33'),
(25, 'Uric Acid Urine 24hrs', 'laboratory', 'BIOCHEMISTRY', 0.00, 500.00, '[{\"parameter_name\":\"Serum Uric Acid\",\"result\":\"1\",\"normal_value\":\"3.5-7.2\",\"unit\":\"mg\\/dl\"}]', NULL, NULL, '2025-08-28 10:05:39', '2025-09-10 04:31:30'),
(26, 'Lipid Profile Serum (F/R)', 'laboratory', 'BIOCHEMISTRY', 0.00, 1200.00, '[{\"parameter_name\":\"Lipid Profile \",\"result\":\" \",\"normal_value\":\" \",\"unit\":\"\"},{\"parameter_name\":\"Serum Cholesterol\",\"result\":\"1\",\"normal_value\":\"0 - 220\",\"unit\":\"mg\\/dl\"},{\"parameter_name\":\"Serum Triglycerides\",\"result\":\"1\",\"normal_value\":\"40-200\",\"unit\":\"mg\\/dl\"},{\"parameter_name\":\"HDL-Cholesterol\",\"result\":\"1\",\"normal_value\":\">55 \",\"unit\":\"mg\\/dl\"},{\"parameter_name\":\"LDL-Cholesterol\",\"result\":\"1\",\"normal_value\":\"137\",\"unit\":\"mg\\/dl\"}]', NULL, NULL, '2025-08-28 10:06:10', '2025-09-11 08:47:59'),
(27, 'ALT(SGPT) Serum', 'laboratory', 'BIOCHEMISTRY', 0.00, 500.00, '[{\"parameter_name\":\"SGPT (ALT)\",\"result\":\"1\",\"normal_value\":\"Upto 45\",\"unit\":\" U\\/L\"}]', NULL, NULL, '2025-08-28 10:07:30', '2025-09-10 05:34:38'),
(28, 'Ferritin', 'laboratory', 'IMMUNOASSAY', 0.00, 1200.00, '[{\"parameter_name\":\"Ferritin\",\"result\":\"1\",\"normal_value\":\"Male 16.0-220.0, Female 10.0-125.0\",\"unit\":\"ng\\/mL\"}]', NULL, NULL, '2025-08-28 10:08:27', '2025-09-10 21:28:36'),
(30, 'Fasting Lipid Profile', 'laboratory', 'BIOCHEMISTRY', 0.00, 1600.00, '[{\"parameter_name\":\"Fasting Lipid Profile\",\"result\":\" \",\"normal_value\":\" \",\"unit\":\"\"},{\"parameter_name\":\"Serum Cholesterol \",\"result\":\"1\",\"normal_value\":\"0-220\",\"unit\":\"mg\\/dl\"},{\"parameter_name\":\"Serum Triglycerides \",\"result\":\"1\",\"normal_value\":\"40 - 200\",\"unit\":\"mg\\/dl\"},{\"parameter_name\":\"HDL-Cholesterol\",\"result\":\"1\",\"normal_value\":\">55\",\"unit\":\"mg\\/dl\"},{\"parameter_name\":\"LDL-Cholesterol \",\"result\":\"1\",\"normal_value\":\"137\",\"unit\":\"mg\\/dl\"}]', NULL, NULL, '2025-08-28 10:09:45', '2025-08-29 12:22:15'),
(32, 'Widal Test', 'laboratory', 'SEROLOGY', 0.00, 700.00, '[{\"parameter_name\":\"Widal Test\",\"result\":\"TO = 1: 160 TH=1: 160, AH = 1: 160 BH= 1: 160\",\"normal_value\":\"TO = 1: 80 TH = 1:80, AH = 1:80 BH = 1:80\",\"unit\":\"\"}]', NULL, NULL, '2025-08-28 10:13:24', '2025-09-10 07:07:23'),
(33, 'Ra Test', 'laboratory', 'SEROLOGY', 0.00, 1200.00, '[{\"parameter_name\":\"Ra Test\",\"result\":\" \",\"normal_value\":\" \",\"unit\":\"\"},{\"parameter_name\":\"Titre\",\"result\":\"1\",\"normal_value\":\"<8\",\"unit\":\"IU\\/ML\"},{\"parameter_name\":\"Opinion\",\"result\":\"Negative\",\"normal_value\":\"Negative\",\"unit\":\"\"}]', NULL, NULL, '2025-08-28 10:14:07', '2025-08-29 12:30:15'),
(34, 'Urine R/M/E', 'laboratory', 'URINE ROUTINE EXAMINATION', 0.00, 200.00, '[{\"parameter_name\":\"Physical Examination\",\"result\":\" \",\"normal_value\":\" \",\"unit\":\" \"},{\"parameter_name\":\"Colour\",\"result\":\"1\",\"normal_value\":\"Straw\",\"unit\":\" \"},{\"parameter_name\":\"Appearance\",\"result\":\" \",\"normal_value\":\"Clear\",\"unit\":\" \"},{\"parameter_name\":\"Sediment\",\"result\":\"Nill\",\"normal_value\":\"1\",\"unit\":\" \"},{\"parameter_name\":\"Chemical Examination\",\"result\":\" \",\"normal_value\":\" \",\"unit\":\" \"},{\"parameter_name\":\"Reaction\",\"result\":\"Nill\",\"normal_value\":\"Acidic\",\"unit\":\" \"},{\"parameter_name\":\"Albumin\",\"result\":\"Nill\",\"normal_value\":\"Nil\",\"unit\":\" \"},{\"parameter_name\":\"Sugar (Reducing substance)\",\"result\":\"Nill\",\"normal_value\":\"Nil\",\"unit\":\" \"},{\"parameter_name\":\"Excess phosphate\",\"result\":\"1\",\"normal_value\":\"Nil\",\"unit\":\" \"},{\"parameter_name\":\"Microscopic Examination\",\"result\":\" \",\"normal_value\":\" \",\"unit\":\" \"},{\"parameter_name\":\"Epithelical Cells\",\"result\":\"1\",\"normal_value\":\"0.2\\/HRF\",\"unit\":\"\\/HRF\"},{\"parameter_name\":\"Pus Cells\",\"result\":\"1\",\"normal_value\":\"0.2\\/HRF\",\"unit\":\"\\/HRF\"},{\"parameter_name\":\"Red Blood Cells\",\"result\":\"1\",\"normal_value\":\"0.1\\/HRF\",\"unit\":\"\\/HRF\"},{\"parameter_name\":\"Crystals\",\"result\":\"Nill\",\"normal_value\":\"1\",\"unit\":\" \"}]', NULL, NULL, '2025-08-28 10:15:03', '2025-09-11 13:07:09'),
(35, 'PT', 'laboratory', 'HAEMATOLOGY', 0.00, 1000.00, '[{\"parameter_name\":\"Prothrombin Time (PT)\",\"result\":\"1\",\"normal_value\":\"Control : 13 Sec, Patient : 11 Sec, Ratio : 1.0, INR : 1.0\",\"unit\":\"\"}]', NULL, NULL, '2025-08-28 10:19:33', '2025-09-11 11:57:33'),
(36, 'INR', 'laboratory', 'COAGULATION PROFILE', 0.00, 500.00, '[{\"parameter_name\":\"INR\",\"result\":\"1\",\"normal_value\":\"0.9 \\u2013 1.1\",\"unit\":\"\"}]', NULL, NULL, '2025-08-28 10:19:46', '2025-08-29 12:02:25'),
(37, 'APTT', 'laboratory', 'BIOCHEMISTRY', 0.00, 1000.00, '[{\"parameter_name\":\"Patient\",\"result\":\"1\",\"normal_value\":\"28 - 36\",\"unit\":\"Sec\"},{\"parameter_name\":\"Control\",\"result\":\"1\",\"normal_value\":\"28 - 36\",\"unit\":\"Sec\"}]', NULL, NULL, '2025-08-28 10:20:26', '2025-09-10 21:23:26'),
(38, 'BT/CT', 'laboratory', 'HAEMATOLOGY', 0.00, 400.00, '[{\"parameter_name\":\"Bleeding Time (BT)\",\"result\":\"1\",\"normal_value\":\"2 \\u2013 7\",\"unit\":\"min\"},{\"parameter_name\":\"Coagulation Time(CT)\",\"result\":\"1\",\"normal_value\":\"4 \\u2013 11\",\"unit\":\"min\"}]', NULL, NULL, '2025-08-28 10:20:34', '2025-09-11 02:31:20'),
(39, 'Prolactin', 'laboratory', 'IMMUNOASSAY', 0.00, 1200.00, '[{\"parameter_name\":\"Prolactin\",\"result\":\"1\",\"normal_value\":\"Male: 2.10-17.70, Female: Nonpregnant: 2.8-29.2,  Pregnant: 9.7-208.5, Postmenopausal: 1.8-20.3\",\"unit\":\"ng\\/ml\"}]', NULL, NULL, '2025-08-28 10:21:01', '2025-09-11 09:12:01'),
(40, 'Testosterone', 'laboratory', 'IMMUNOASSAY', 0.00, 1200.00, '[{\"parameter_name\":\"Testosterone\",\"result\":\"1\",\"normal_value\":\"Male 2.6-10.45, Female 0.27-0.95 \",\"unit\":\"ng\\/ml\"}]', NULL, NULL, '2025-08-28 10:21:14', '2025-09-11 12:45:26'),
(41, 'T3', 'laboratory', 'IMMUNOASSAY', 0.00, 800.00, '[{\"parameter_name\":\"Tri-iodothyronine (T3)\",\"result\":\"1\",\"normal_value\":\"1.23 - 3.07\",\"unit\":\"nmol\\/L\"}]', NULL, NULL, '2025-08-28 10:21:57', '2025-09-11 12:40:28'),
(42, 'T4', 'laboratory', 'IMMUNOASSAY', 0.00, 800.00, '[{\"parameter_name\":\"FT-4\",\"result\":\"1\",\"normal_value\":\"0.8 \\u2013 2.0\",\"unit\":\"\\u00b5IU\\/ml\"}]', NULL, NULL, '2025-08-28 10:22:05', '2025-09-10 06:44:02'),
(43, 'Dengue NS1 Antigen', 'laboratory', 'SEROLOGY', 0.00, 1500.00, '[{\"parameter_name\":\"Dengue NS1 Antigen\",\"result\":\"1\",\"normal_value\":\"Negative\",\"unit\":\"\"}]', NULL, NULL, '2025-08-28 10:22:32', '2025-08-29 11:59:44'),
(44, 'Dengue IgM / IgG', 'laboratory', 'SEROLOGY', 0.00, 2500.00, '[{\"parameter_name\":\"Dengue IgM\",\"result\":\"1\",\"normal_value\":\"Negative\",\"unit\":\"\"},{\"parameter_name\":\"Dengue IgG\",\"result\":\"1\",\"normal_value\":\"Negative\",\"unit\":\"\"}]', NULL, NULL, '2025-08-28 10:22:47', '2025-09-11 06:50:18'),
(45, 'Total Protein Urine 24hrs', 'laboratory', 'BIOCHEMISTRY', 0.00, 1100.00, '[{\"parameter_name\":\"Total Protein\",\"result\":\"1\",\"normal_value\":\"6.0 \\u2013 8.3\",\"unit\":\"g\\/dl\"}]', NULL, NULL, '2025-08-28 10:23:21', '2025-09-10 04:29:56'),
(46, 'AST(SGOT ) Serum', 'laboratory', 'BIOCHEMISTRY', 0.00, 500.00, '[{\"parameter_name\":\"SGOT (AST)\",\"result\":\"1\",\"normal_value\":\"Male: <40 Female: <32\",\"unit\":\"U\\/L\"}]', NULL, NULL, '2025-08-28 10:23:37', '2025-09-10 05:35:18'),
(47, 'Bilirubin Total/Direct/Indirect Serum', 'laboratory', 'BIOCHEMISTRY', 0.00, 600.00, '[{\"parameter_name\":\"Bilirubin Total\\/Direct\\/Indirect Serum\",\"result\":\" \",\"normal_value\":\" \",\"unit\":\"\"},{\"parameter_name\":\"S. Total Bilirubin\",\"result\":\"1\",\"normal_value\":\"0.2 - 1.2, 0.2 - 13.3(Child)\",\"unit\":\"mg\\/dl\"},{\"parameter_name\":\"S. Bilirubin (Direct)\",\"result\":\"1\",\"normal_value\":\"4.25 = Up to 0.25\",\"unit\":\"mg\\/dl\"}]', NULL, NULL, '2025-08-28 10:24:06', '2025-09-11 02:04:36'),
(48, 'Bilirubin Total Blood', 'laboratory', 'BIOCHEMISTRY', 0.00, 500.00, '[{\"parameter_name\":\"Total Bilirubin\",\"result\":\" 1\",\"normal_value\":\"0.2 - 1.2, 0.2 - 13.3(Child)\",\"unit\":\"mg\\/dl\"}]', NULL, NULL, '2025-08-28 10:24:19', '2025-09-11 01:15:41'),
(49, 'Triglyceride', 'laboratory', 'BIOCHEMISTRY', 0.00, 250.00, '[{\"parameter_name\":\"Triglycerides\",\"result\":\"1\",\"normal_value\":\"40 - 200\",\"unit\":\"mg\\/dl\"}]', NULL, NULL, '2025-08-28 10:24:36', '2025-09-11 12:47:14'),
(50, 'HDL', 'laboratory', 'BIOCHEMISTRY', 0.00, 1030.00, '[{\"parameter_name\":\"HDL Cholesterol\",\"result\":\" 1\",\"normal_value\":\" Male >40, Female >50\",\"unit\":\"mg\\/dl\"}]', NULL, NULL, '2025-08-28 10:24:48', '2025-08-29 11:55:21'),
(51, 'LDL', 'laboratory', 'BIOCHEMISTRY', 0.00, 300.00, '[{\"parameter_name\":\"LDL Cholesterol\",\"result\":\" 1\",\"normal_value\":\" 100\",\"unit\":\"mg\\/dl\"}]', NULL, NULL, '2025-08-28 10:24:57', '2025-08-29 11:54:49'),
(52, 'Total Cholesterol', 'laboratory', 'BIOCHEMISTRY', 0.00, 250.00, '[{\"parameter_name\":\"Total Cholesterol\",\"result\":\" 1\",\"normal_value\":\" 200\",\"unit\":\"mg\\/dl\"}]', NULL, NULL, '2025-08-28 10:25:14', '2025-08-29 11:54:22'),
(53, 'Random Blood Sugar', 'laboratory', 'BIOCHEMISTRY', 0.00, 350.00, '[{\"parameter_name\":\"Random Blood Sugar (RBS)\",\"result\":\"1\",\"normal_value\":\"3.8-7.8\",\"unit\":\"mmol\\/L\"}]', NULL, NULL, '2025-08-28 10:25:30', '2025-08-29 11:53:42'),
(54, 'Glucose Fasting Blood', 'laboratory', 'BIOCHEMISTRY', 0.00, 200.00, '[{\"parameter_name\":\"Fasting Plasma Glucose(FBS)\",\"result\":\"1\",\"normal_value\":\"3.3-6.1\",\"unit\":\"mmol\\/L\"}]', NULL, NULL, '2025-08-28 10:26:07', '2025-09-11 01:49:27'),
(56, 'Anti Mollerian Hormone(AMH)', 'laboratory', 'HORMONE REPORT', 0.00, 5000.00, '[{\"parameter_name\":\"AMH\",\"result\":\"1.58\",\"normal_value\":\"Male: 20 \\u2013 60Yrs = 0.92 - 13.89, Female: 20-29Yrs = 0.88 - 10.35, 30-39Yrs = 0.31 - 7.86, 40-50Yrs = < 5.07\",\"unit\":\" ng\\/ml\"}]', NULL, NULL, '2025-09-09 10:42:44', '2025-09-10 13:44:58'),
(57, 'Phosphate Urine 24hrs', 'laboratory', NULL, 0.00, 500.00, NULL, NULL, NULL, '2025-09-10 04:30:48', '2025-09-10 04:30:48'),
(58, 'Electrolyte 24hrs Urine', 'laboratory', NULL, 0.00, 1200.00, NULL, NULL, NULL, '2025-09-10 04:32:31', '2025-09-10 04:32:31'),
(59, 'Urinary Sodium 24hrs', 'laboratory', NULL, 0.00, 500.00, NULL, NULL, NULL, '2025-09-10 04:33:18', '2025-09-10 04:33:18'),
(60, 'Urinary Albumin 24hrs', 'laboratory', NULL, 0.00, 1000.00, NULL, NULL, NULL, '2025-09-10 04:33:48', '2025-09-10 04:33:48'),
(61, 'HBsAg(ICT)', 'laboratory', 'IMMUNOLOGICAL TEST', 0.00, 600.00, '[{\"parameter_name\":\"HBsAg\",\"result\":\"1\",\"normal_value\":\"Negative\",\"unit\":\"\"}]', NULL, NULL, '2025-09-10 04:35:53', '2025-09-11 09:06:49'),
(62, 'HBsAg(ELISA)', 'laboratory', 'IMMUNOLOGICAL TEST', 0.00, 800.00, '[{\"parameter_name\":\"HBsAg\",\"result\":\"1\",\"normal_value\":\"< 1.0\",\"unit\":\"IU\\/ml\"}]', NULL, NULL, '2025-09-10 04:36:27', '2025-09-11 09:03:54'),
(63, 'Anti-HBs', 'laboratory', NULL, 0.00, 1200.00, NULL, NULL, NULL, '2025-09-10 04:37:04', '2025-09-10 04:37:04'),
(64, 'HBeAg', 'laboratory', NULL, 0.00, 1200.00, NULL, NULL, NULL, '2025-09-10 04:37:46', '2025-09-10 04:37:46'),
(65, 'Anti-HBc IgM', 'laboratory', NULL, 0.00, 1200.00, NULL, NULL, NULL, '2025-09-10 04:39:07', '2025-09-10 04:39:07'),
(66, 'Anti-HBc Total', 'laboratory', NULL, 0.00, 1200.00, NULL, NULL, NULL, '2025-09-10 04:39:27', '2025-09-10 04:39:27'),
(67, 'Anti-HCV', 'laboratory', 'SEROLOGY', 0.00, 1200.00, '[{\"parameter_name\":\"Anti HCV (ICT Method)\",\"result\":\"Negative\",\"normal_value\":\"Negative\",\"unit\":\"\"}]', NULL, NULL, '2025-09-10 04:40:07', '2025-09-11 09:18:05'),
(68, 'CBC Cell Count', 'laboratory', NULL, 0.00, 400.00, NULL, NULL, NULL, '2025-09-10 04:40:49', '2025-09-10 04:40:49'),
(69, 'Blood Film', 'laboratory', NULL, 0.00, 600.00, NULL, NULL, NULL, '2025-09-10 04:41:13', '2025-09-10 04:41:13'),
(70, 'Platelet Count', 'laboratory', NULL, 0.00, 300.00, NULL, NULL, NULL, '2025-09-10 04:41:56', '2025-09-10 04:41:56'),
(71, 'TCE', 'laboratory', 'HAEMATOLOGY', 0.00, 350.00, '[{\"parameter_name\":\"Total Circulating Eosinophils\",\"result\":\"1\",\"normal_value\":\"50 - 450\",\"unit\":\"cumm\"}]', NULL, NULL, '2025-09-10 04:42:24', '2025-09-11 12:44:07'),
(72, 'Malaria Parasite', 'laboratory', 'IMMUNOLOGICAL TEST', 0.00, 300.00, '[{\"parameter_name\":\"Malaria\",\"result\":\"P.f:Negative\",\"normal_value\":\"P.f:Negative\",\"unit\":\"\"}]', NULL, NULL, '2025-09-10 04:42:56', '2025-09-11 11:35:43'),
(73, 'Electrophoresis Hb Blood', 'laboratory', NULL, 0.00, 1600.00, NULL, NULL, NULL, '2025-09-10 04:43:37', '2025-09-10 04:43:37'),
(74, 'ECG', 'cardiology ', NULL, 0.00, 400.00, NULL, NULL, NULL, '2025-09-10 04:49:15', '2025-09-10 04:49:15'),
(75, 'ETT', 'cardiology ', NULL, 0.00, 3000.00, NULL, NULL, NULL, '2025-09-10 04:49:28', '2025-09-10 04:49:28'),
(76, 'Echo-2D', 'cardiology ', NULL, 0.00, 1500.00, NULL, NULL, NULL, '2025-09-10 04:49:46', '2025-09-10 04:49:46'),
(77, 'Echo Color Droppler', 'cardiology ', NULL, 0.00, 2500.00, NULL, NULL, NULL, '2025-09-10 04:50:22', '2025-09-10 04:50:22'),
(78, 'Echo Cardiographe+Color Droppler(Child)', 'cardiology ', NULL, 0.00, 3000.00, NULL, NULL, NULL, '2025-09-10 04:51:46', '2025-09-10 04:51:46'),
(79, 'Holter Monitoring-24hrs', 'cardiology ', NULL, 0.00, 3500.00, NULL, NULL, NULL, '2025-09-10 04:52:28', '2025-09-10 04:52:28'),
(80, 'Pregnancy Test Urine', 'laboratory', 'SEROLOGY', 0.00, 250.00, '[{\"parameter_name\":\"Pregnancy  test  of  urine\",\"result\":\"Negative \",\"normal_value\":\"Negative \",\"unit\":\"\"}]', NULL, NULL, '2025-09-10 04:53:46', '2025-09-11 11:49:13'),
(82, 'Stool R/M/E', 'laboratory', NULL, 0.00, 300.00, NULL, NULL, NULL, '2025-09-10 05:10:50', '2025-09-10 05:10:50'),
(83, 'Ketone Bodies-Urine', 'laboratory', NULL, 0.00, 300.00, NULL, NULL, NULL, '2025-09-10 05:11:25', '2025-09-10 05:11:25'),
(84, 'Semen Analysis', 'laboratory', 'SEMEN ANALYSIS', 0.00, 700.00, '[{\"parameter_name\":\"Physical Examination\",\"result\":\" \",\"normal_value\":\" \",\"unit\":\"\"},{\"parameter_name\":\"Method of Collection\",\"result\":\" \",\"normal_value\":\"Masturbation\",\"unit\":\"\"},{\"parameter_name\":\"Time elapsed after collection\",\"result\":\" \",\"normal_value\":\"30min\",\"unit\":\"\"},{\"parameter_name\":\"Amount\",\"result\":\" \",\"normal_value\":\"2ml\",\"unit\":\"\"},{\"parameter_name\":\"Color\",\"result\":\" \",\"normal_value\":\"Whitish\",\"unit\":\"\"},{\"parameter_name\":\"Consistency\",\"result\":\" \",\"normal_value\":\"Viscid\",\"unit\":\"\"},{\"parameter_name\":\"Odour\",\"result\":\" \",\"normal_value\":\"Fishy\",\"unit\":\"\"},{\"parameter_name\":\"Microscopic Examination\",\"result\":\" \",\"normal_value\":\" \",\"unit\":\"\"},{\"parameter_name\":\"Count of Spermatozoa\",\"result\":\" \",\"normal_value\":\"55million\\/ml\",\"unit\":\"\"},{\"parameter_name\":\"Mortile Spermatozoa(Active Mortile)\",\"result\":\" \",\"normal_value\":\"60%\",\"unit\":\"\"},{\"parameter_name\":\"Weakly mortile\",\"result\":\" \",\"normal_value\":\"30%\",\"unit\":\"\"},{\"parameter_name\":\"Non mortile\",\"result\":\" \",\"normal_value\":\"10 %\",\"unit\":\"\"},{\"parameter_name\":\"Normal Morphology\",\"result\":\" \",\"normal_value\":\"65%\",\"unit\":\"\"},{\"parameter_name\":\"Pus cells\",\"result\":\" \",\"normal_value\":\"2 - 4 \\/HPF\",\"unit\":\"\"},{\"parameter_name\":\"Epithelial cells\",\"result\":\" \",\"normal_value\":\"2 - 3 \\/HPF\",\"unit\":\"\"},{\"parameter_name\":\"RBC\",\"result\":\" \",\"normal_value\":\"Nil  \\/HPF\",\"unit\":\"\"},{\"parameter_name\":\"COMMENT\",\"result\":\" \",\"normal_value\":\" \",\"unit\":\"\"},{\"parameter_name\":\"A Case of Oligospermia\",\"result\":\".\",\"normal_value\":\".\",\"unit\":\"\"}]', NULL, NULL, '2025-09-10 05:11:54', '2025-09-11 12:17:42'),
(85, 'ANF(ELISA)', 'laboratory', NULL, 0.00, 1300.00, NULL, NULL, NULL, '2025-09-10 05:14:27', '2025-09-10 05:14:27'),
(86, 'ANA(ELISA)', 'laboratory', 'IMMUNOASSAY', 0.00, 1300.00, '[{\"parameter_name\":\"Anti-Nuclear Ab (ANA).\",\"result\":\" \",\"normal_value\":\" \",\"unit\":\"\"},{\"parameter_name\":\"Sample Index\",\"result\":\"1\",\"normal_value\":\"0.790\",\"unit\":\"\"},{\"parameter_name\":\"Cut Off Index\",\"result\":\"1\",\"normal_value\":\"1.500\",\"unit\":\"\"},{\"parameter_name\":\"Opinion\",\"result\":\"1\",\"normal_value\":\"Negative\",\"unit\":\"\"}]', NULL, NULL, '2025-09-10 05:14:41', '2025-09-10 21:03:58'),
(87, 'Anti-ds DNA  Antibody(ELISA)', 'laboratory', 'IMMUNOASSAY', 0.00, 1500.00, '[{\"parameter_name\":\"Anti-ds DNA\",\"result\":\"1\",\"normal_value\":\"<30 = Negative, >=30 - 50 = Borderline, > 50 - 300 = Positive, > 300 = Strong Positive\",\"unit\":\" IU\\/mL\"}]', NULL, NULL, '2025-09-10 05:15:51', '2025-09-10 21:18:04'),
(88, 'P-ANCA', 'laboratory', NULL, 0.00, 1400.00, NULL, NULL, NULL, '2025-09-10 05:16:33', '2025-09-10 05:16:33'),
(89, 'C-ANCA', 'laboratory', NULL, 0.00, 1400.00, NULL, NULL, NULL, '2025-09-10 05:16:49', '2025-09-10 05:16:49'),
(90, 'Anti-Thyroid Antibody', 'laboratory', 'IMMUNOASSAY', 0.00, 2200.00, '[{\"parameter_name\":\"Anti-Thyroid Antibody\",\"result\":\"1\",\"normal_value\":\"0.0 \\u2013  0.9 \",\"unit\":\"IU\\/mL\"}]', NULL, NULL, '2025-09-10 05:17:32', '2025-09-10 21:19:24'),
(91, 'Opiate Urine', 'laboratory', NULL, 0.00, 1000.00, NULL, NULL, NULL, '2025-09-10 05:18:47', '2025-09-10 05:18:47'),
(92, 'Cannabinoid Urine', 'laboratory', NULL, 0.00, 1000.00, NULL, NULL, NULL, '2025-09-10 05:19:26', '2025-09-10 05:19:26'),
(93, 'Amphetamines Urine', 'laboratory', NULL, 0.00, 1000.00, NULL, NULL, NULL, '2025-09-10 05:20:28', '2025-09-10 05:20:28'),
(94, 'Benzodiazepines Urine', 'laboratory', NULL, 0.00, 1000.00, NULL, NULL, NULL, '2025-09-10 05:21:17', '2025-09-10 05:21:17'),
(95, 'Vitamin B-12', 'laboratory', 'IMMUNOASSAY', 0.00, 2200.00, '[{\"parameter_name\":\"Vitamin B12\",\"result\":\"1\",\"normal_value\":\"239 - 931\",\"unit\":\"pg\\/ml\"}]', NULL, NULL, '2025-09-10 05:21:38', '2025-09-11 13:08:46'),
(96, 'CPK Serum', 'laboratory', 'BIOCHEMISTRY', 0.00, 1500.00, '[{\"parameter_name\":\"S.CPK\",\"result\":\"1\",\"normal_value\":\"24 - 195\",\"unit\":\"U\\/L\"}]', NULL, NULL, '2025-09-10 05:23:08', '2025-09-11 02:49:55'),
(97, 'CK-MB Serum', 'laboratory', NULL, 0.00, 1200.00, NULL, NULL, NULL, '2025-09-10 05:23:45', '2025-09-10 05:23:45'),
(98, 'LDH Serum', 'laboratory', NULL, 0.00, 1200.00, NULL, NULL, NULL, '2025-09-10 05:24:03', '2025-09-10 05:24:03'),
(99, 'Myoglobin', 'laboratory', NULL, 0.00, 1200.00, NULL, NULL, NULL, '2025-09-10 05:24:33', '2025-09-10 05:24:33'),
(100, 'Troponin-I', 'laboratory', 'IMMUNOLOGICAL TEST', 0.00, 1200.00, '[{\"parameter_name\":\"TROPONIN-I\",\"result\":\"1\",\"normal_value\":\"Positive=>0.5, Negative= <0.5\",\"unit\":\"ng\\/ml\"}]', NULL, NULL, '2025-09-10 05:24:59', '2025-09-11 12:48:54'),
(101, 'Pro BNP', 'laboratory', NULL, 0.00, 3500.00, NULL, NULL, NULL, '2025-09-10 05:25:18', '2025-09-10 05:25:18'),
(102, 'GTT-3 Samples', 'laboratory', NULL, 0.00, 600.00, NULL, NULL, NULL, '2025-09-10 05:26:10', '2025-09-10 05:26:10'),
(103, 'Glucose 2hrs After Breakfast Blood', 'laboratory', 'BIOCHEMISTRY', 0.00, 200.00, '[{\"parameter_name\":\"Plasma Glucose  2hrs after breakfast\",\"result\":\"1\",\"normal_value\":\"15.1\",\"unit\":\"mmol\\/L\"}]', NULL, NULL, '2025-09-10 05:28:39', '2025-09-11 01:57:16'),
(104, 'Glucose Random Blood', 'laboratory', NULL, 0.00, 200.00, NULL, NULL, NULL, '2025-09-10 05:28:57', '2025-09-10 05:28:57'),
(105, 'Glucose Before Lunch Blood', 'laboratory', NULL, 0.00, 200.00, NULL, NULL, NULL, '2025-09-10 05:29:26', '2025-09-10 05:29:26'),
(106, 'Glucose 2hrs After Lunch Plasma', 'laboratory', NULL, 0.00, 200.00, NULL, NULL, NULL, '2025-09-10 05:30:25', '2025-09-10 05:30:25'),
(107, 'Glucose 1hr After Lunch Blood', 'laboratory', NULL, 0.00, 200.00, NULL, NULL, NULL, '2025-09-10 05:31:13', '2025-09-10 05:31:13'),
(108, 'CUS For Sugar', 'laboratory', NULL, 0.00, 20.00, NULL, NULL, NULL, '2025-09-10 05:31:45', '2025-09-10 05:31:45'),
(109, 'Alkaline Phosphatase Serum', 'laboratory', 'BIOCHEMISTRY', 0.00, 600.00, '[{\"parameter_name\":\"S. Alkaline Phosphatase\",\"result\":\"1\",\"normal_value\":\"98 - 240\",\"unit\":\"U\\/L\"}]', NULL, NULL, '2025-09-10 05:36:27', '2025-09-11 01:19:07'),
(110, 'Total Protein Serum', 'laboratory', 'BIOCHEMISTRY', 0.00, 600.00, '[{\"parameter_name\":\"Total Protein\",\"result\":\"1\",\"normal_value\":\"6 - 8\",\"unit\":\"g\\/dl\"}]', NULL, NULL, '2025-09-10 06:31:42', '2025-09-10 13:39:53'),
(111, 'Urea Serum', 'laboratory', 'BIOCHEMISTRY', 0.00, 500.00, '[{\"parameter_name\":\"Serum Blood Urea\",\"result\":\"1\",\"normal_value\":\"10 - 50\",\"unit\":\"mg\\/dl\"}]', NULL, NULL, '2025-09-10 06:33:20', '2025-09-11 01:17:13'),
(112, 'Uric Acid Serum', 'laboratory', 'BIOCHEMISTRY', 0.00, 500.00, '[{\"parameter_name\":\"Serum Uric Acid\",\"result\":\"1\",\"normal_value\":\"M- 3.6 - 7.2, F- 2.5-6.8\",\"unit\":\"mg\\/dl\"}]', NULL, NULL, '2025-09-10 06:34:28', '2025-09-11 01:14:27'),
(113, 'Amylase Serum', 'laboratory', 'BIOCHEMISTRY', 0.00, 1300.00, '[{\"parameter_name\":\"Serum Amylase\",\"result\":\"1\",\"normal_value\":\"Upto 220\",\"unit\":\"U\\/L\"}]', NULL, NULL, '2025-09-10 06:35:18', '2025-09-11 12:07:04'),
(114, 'Lipase Serum', 'laboratory', 'BIOCHEMISTRY', 0.00, 1300.00, '[{\"parameter_name\":\"S.Lipase\",\"result\":\"1\",\"normal_value\":\"23 - 300\",\"unit\":\"U\\/L\"}]', NULL, NULL, '2025-09-10 06:35:52', '2025-09-11 01:41:49'),
(115, 'Calcium Blood', 'laboratory', 'BIOCHEMISTRY', 0.00, 500.00, '[{\"parameter_name\":\"S. Calcium\",\"result\":\"1\",\"normal_value\":\"8.4 - 10.4\",\"unit\":\"mg\\/dl\"}]', NULL, NULL, '2025-09-10 06:36:52', '2025-09-11 01:40:29'),
(116, 'Phosphate Serum', 'laboratory', 'BIOCHEMISTRY', 0.00, 600.00, '[{\"parameter_name\":\"S. Phosphate\",\"result\":\"1\",\"normal_value\":\"3.4 - 4.5\",\"unit\":\"mg\\/dl\"}]', NULL, NULL, '2025-09-10 06:37:22', '2025-09-11 01:46:50'),
(117, 'Iron Serum', 'laboratory', NULL, 0.00, 1200.00, NULL, NULL, NULL, '2025-09-10 06:37:48', '2025-09-10 06:37:48'),
(118, 'Total Iron Binding Capacity(TIBC) Blood', 'laboratory', NULL, 0.00, 1100.00, NULL, NULL, NULL, '2025-09-10 06:38:59', '2025-09-10 06:38:59'),
(119, 'LFT Bilirubin+SGOT+SGPT+Alk Phos+A/GR', 'laboratory', NULL, 0.00, 1000.00, NULL, NULL, NULL, '2025-09-10 06:40:41', '2025-09-10 06:40:41'),
(120, 'T3,T4,TSH', 'laboratory', 'IMMUNOASSAY', 0.00, 2400.00, '[{\"parameter_name\":\"Tri-iodothyronine (T3)\",\"result\":\"1\",\"normal_value\":\"1.23 - 3.07\",\"unit\":\"nmol\\/L\"},{\"parameter_name\":\"Thyroxine (T4)\",\"result\":\"1\",\"normal_value\":\"66 - 181 \",\"unit\":\"nmol\\/L\"},{\"parameter_name\":\"TSH\",\"result\":\"1\",\"normal_value\":\"0.5\\u2013 5 \",\"unit\":\"\\u00b5IU\\/mL\"}]', NULL, NULL, '2025-09-10 06:45:23', '2025-09-11 12:43:02'),
(121, 'Free-T3/F-T3', 'laboratory', NULL, 0.00, 1100.00, NULL, NULL, NULL, '2025-09-10 06:46:21', '2025-09-10 06:46:21'),
(122, 'Free-T4/F-T4', 'laboratory', NULL, 0.00, 1100.00, NULL, NULL, NULL, '2025-09-10 06:46:48', '2025-09-10 06:46:48'),
(123, 'FT3,FT4,TSH', 'laboratory', 'IMMUNOASSAY', 0.00, 3000.00, '[{\"parameter_name\":\"TSH\",\"result\":\"1\",\"normal_value\":\"0.3 \\u2013  4.2\",\"unit\":\"\\u00b5IU\\/mL\"},{\"parameter_name\":\"FT3\",\"result\":\"1\",\"normal_value\":\"3.1 - 6.8\",\"unit\":\"pmol\\/L\"},{\"parameter_name\":\"FT4\",\"result\":\"1\",\"normal_value\":\"12 - 22\",\"unit\":\"pmol\\/L\"}]', NULL, NULL, '2025-09-10 06:48:33', '2025-09-11 08:59:39'),
(124, 'FSH', 'laboratory', 'IMMUNOASSAY', 0.00, 1200.00, '[{\"parameter_name\":\"FSH\",\"result\":\" \",\"normal_value\":\" \",\"unit\":\"\"}]', NULL, NULL, '2025-09-10 06:50:11', '2025-09-11 08:54:53'),
(125, 'LH', 'laboratory', NULL, 0.00, 1200.00, NULL, NULL, NULL, '2025-09-10 06:50:59', '2025-09-10 06:50:59'),
(126, 'Cortisol', 'laboratory', 'IMMUNOASSAY', 0.00, 1200.00, '[{\"parameter_name\":\"Cortisol (Morning)\",\"result\":\"1\",\"normal_value\":\"Morning before 10AM: 4.458-22.689, Evening after 17 PM: 1.674-14.009\",\"unit\":\"ug\\/dl\"},{\"parameter_name\":\"Cortisol (Evening))\",\"result\":\"1\",\"normal_value\":\"Morning before 10AM: 4.458-22.689, Evening after 17 PM: 1.674-14.009\",\"unit\":\"ug\\/dl\"}]', NULL, NULL, '2025-09-10 06:51:33', '2025-09-11 02:48:34'),
(127, 'Estradiol/Oestrogen', 'laboratory', NULL, 0.00, 1200.00, NULL, NULL, NULL, '2025-09-10 06:52:33', '2025-09-10 06:52:33'),
(128, 'Progesterone', 'laboratory', NULL, 0.00, 1200.00, NULL, NULL, NULL, '2025-09-10 06:53:03', '2025-09-10 06:53:03'),
(129, 'Intact Parathyroid Hormone (Intact PTH)', 'laboratory', 'IMMUNOASSAY', 0.00, 1600.00, '[{\"parameter_name\":\"PTH\",\"result\":\"1\",\"normal_value\":\"16.0 \\u2013  59.6\",\"unit\":\"pg\\/ml\"}]', NULL, NULL, '2025-09-10 06:56:44', '2025-09-11 12:00:58'),
(130, 'Blood for C/S', 'laboratory', NULL, 0.00, 2000.00, NULL, NULL, NULL, '2025-09-10 06:57:55', '2025-09-10 06:57:55'),
(131, 'Urine for C/S', 'laboratory', NULL, 0.00, 1000.00, NULL, NULL, NULL, '2025-09-10 06:58:19', '2025-09-10 06:58:19'),
(132, 'Stool for C/S', 'laboratory', 'STOOL EXAMINATION REPORT', 0.00, 1000.00, '[{\"parameter_name\":\"PHYSICAL EXAMINATION\",\"result\":\" \",\"normal_value\":\" \",\"unit\":\"\"},{\"parameter_name\":\"Consistency\",\"result\":\"Semi Solid\",\"normal_value\":\"Semi Solid\",\"unit\":\"\"},{\"parameter_name\":\"Color\",\"result\":\"Brown\",\"normal_value\":\"Brown\",\"unit\":\"\"},{\"parameter_name\":\"Mucus\",\"result\":\"(+)\",\"normal_value\":\"(+)\",\"unit\":\"\"},{\"parameter_name\":\"CHEMICAL EXAMINATION\",\"result\":\" \",\"normal_value\":\" \",\"unit\":\"\"},{\"parameter_name\":\"Reaction\",\"result\":\"Alkaline\",\"normal_value\":\"Alkaline\",\"unit\":\"\"},{\"parameter_name\":\"Occult Blood Test\",\"result\":\"Not Done\",\"normal_value\":\"Not Done\",\"unit\":\"\"},{\"parameter_name\":\"Reducing Substance\",\"result\":\"Not Done\",\"normal_value\":\"Not Done\",\"unit\":\"\"},{\"parameter_name\":\"MICROSCOPIC EXAMINATION\",\"result\":\" \",\"normal_value\":\" \",\"unit\":\"\"},{\"parameter_name\":\"Protozoa\",\"result\":\" \",\"normal_value\":\"Nil \\/HPF\",\"unit\":\"\"},{\"parameter_name\":\"Cysts\",\"result\":\" \",\"normal_value\":\"Nil \\/HPF\",\"unit\":\"\"},{\"parameter_name\":\"Ova\",\"result\":\" \",\"normal_value\":\"Nil \\/HPF\",\"unit\":\"\"},{\"parameter_name\":\"Larva\",\"result\":\" \",\"normal_value\":\"Nil \\/HPF\",\"unit\":\"\"},{\"parameter_name\":\"Pus Cell\",\"result\":\" \",\"normal_value\":\"4 - 6 \\/HPF\",\"unit\":\"\"},{\"parameter_name\":\"RBC\",\"result\":\" \",\"normal_value\":\"Nil \\/HPF\",\"unit\":\"\"},{\"parameter_name\":\"Macrophage\",\"result\":\" \",\"normal_value\":\"Nil \\/HPF\",\"unit\":\"\"},{\"parameter_name\":\"Epithelial Cells\",\"result\":\" \",\"normal_value\":\"1 - 3 \\/HPF\",\"unit\":\"\"},{\"parameter_name\":\"Fat Globules\",\"result\":\" \",\"normal_value\":\"3 - 5 \\/HPF\",\"unit\":\"\"},{\"parameter_name\":\"Vegetable Cells \",\"result\":\" \",\"normal_value\":\"3 - 5  \\/HPF\",\"unit\":\"\"},{\"parameter_name\":\"Candida\",\"result\":\" \",\"normal_value\":\"Nil \\/HPF\",\"unit\":\"\"},{\"parameter_name\":\"Yeasts\",\"result\":\" \",\"normal_value\":\"3 - 5  \\/HPF\",\"unit\":\"\"},{\"parameter_name\":\"Starch Granules\",\"result\":\" \",\"normal_value\":\"2 - 4 \\/HPF\",\"unit\":\"\"}]', NULL, NULL, '2025-09-10 06:58:55', '2025-09-11 12:36:18'),
(133, 'Throat Swab for C/S', 'laboratory', NULL, 0.00, 1000.00, NULL, NULL, NULL, '2025-09-10 06:59:31', '2025-09-10 06:59:31'),
(134, 'Sputum for C/S', 'laboratory', NULL, 0.00, 1000.00, NULL, NULL, NULL, '2025-09-10 07:01:14', '2025-09-10 07:01:14'),
(135, 'Blood Grouping & Rh Factor', 'laboratory', 'SEROLOGY', 0.00, 200.00, '[{\"parameter_name\":\"Blood Grouping & Rh Factor\",\"result\":\" \",\"normal_value\":\" \",\"unit\":\"\"},{\"parameter_name\":\"Group\",\"result\":\"B\",\"normal_value\":\" \",\"unit\":\"\"},{\"parameter_name\":\"Rh factor\",\"result\":\"Positive\",\"normal_value\":\" \",\"unit\":\"\"}]', NULL, NULL, '2025-09-10 07:02:13', '2025-09-11 02:15:51'),
(136, 'Rh-Antibody Titre', 'laboratory', NULL, 0.00, 1200.00, NULL, NULL, NULL, '2025-09-10 07:02:49', '2025-09-10 07:02:49'),
(137, 'Serum IgE', 'laboratory', 'IMMUNOASSAY', 0.00, 1200.00, '[{\"parameter_name\":\"S. IGE\\t\",\"result\":\"1\",\"normal_value\":\"Newborn: 1.5, Under 1 years old: 15, 1 - 5 years old: 60, 6 - 9 years old: 90, 10 - 15 years old: 200, Adult: 100\",\"unit\":\"IU\\/ml\"}]', NULL, NULL, '2025-09-10 07:03:05', '2025-09-11 11:26:18'),
(138, 'Serum IgA Level', 'laboratory', NULL, 0.00, 1200.00, NULL, NULL, NULL, '2025-09-10 07:03:29', '2025-09-10 07:03:29'),
(139, 'C3', 'laboratory', NULL, 0.00, 1200.00, NULL, NULL, NULL, '2025-09-10 07:03:50', '2025-09-10 07:03:50'),
(140, 'C4', 'laboratory', NULL, 0.00, 1200.00, NULL, NULL, NULL, '2025-09-10 07:04:00', '2025-09-10 07:04:00'),
(141, 'VDRL(Q&Q)', 'laboratory', NULL, 0.00, 700.00, NULL, NULL, NULL, '2025-09-10 07:05:13', '2025-09-10 07:05:13'),
(142, 'VDRL', 'laboratory', 'SEROLOGY', 0.00, 500.00, '[{\"parameter_name\":\"VDRL\",\"result\":\"Negative\",\"normal_value\":\"Non-Reactive\",\"unit\":\"\"}]', NULL, NULL, '2025-09-10 07:05:26', '2025-09-11 12:27:21'),
(143, 'TPHA(ICT)', 'laboratory', NULL, 0.00, 700.00, NULL, NULL, NULL, '2025-09-10 07:05:53', '2025-09-10 07:05:53'),
(144, 'ASO Titre', 'laboratory', 'SEROLOGY', 0.00, 700.00, '[{\"parameter_name\":\"ASO Titre\",\"result\":\"1\",\"normal_value\":\"< 200\",\"unit\":\"IU\\/ML\"}]', NULL, NULL, '2025-09-10 07:06:11', '2025-09-10 21:26:07'),
(145, 'RA/RF', 'laboratory', NULL, 0.00, 600.00, NULL, NULL, NULL, '2025-09-10 07:06:27', '2025-09-10 07:06:44'),
(146, 'Anti-H Pylori IgG', 'laboratory', NULL, 0.00, 1500.00, NULL, NULL, NULL, '2025-09-10 07:08:35', '2025-09-10 07:08:35'),
(147, 'Filaria Ag(ICT)', 'laboratory', 'IMMUNOCHROMATOGRAPHIC TEST', 0.00, 1000.00, '[{\"parameter_name\":\"Filariasis IgG\",\"result\":\"Negative\",\"normal_value\":\"Negative\",\"unit\":\"\"},{\"parameter_name\":\"Filariasis IgM\",\"result\":\"Negative\",\"normal_value\":\"Negative\",\"unit\":\"\"}]', NULL, NULL, '2025-09-10 07:09:05', '2025-09-11 09:24:01'),
(148, 'Torch Panel Test', 'laboratory', NULL, 0.00, 9000.00, NULL, NULL, NULL, '2025-09-10 07:09:44', '2025-09-10 07:09:44'),
(149, 'HIV Ab I & II(ICT)', 'laboratory', 'IMMUNOASSAY', 0.00, 1000.00, '[{\"parameter_name\":\"HIV(AIDS)\",\"result\":\"1\",\"normal_value\":\"< 1.0\",\"unit\":\"IU\\/ml\"}]', NULL, NULL, '2025-09-10 07:10:57', '2025-09-11 09:08:11'),
(150, 'Malaria Ag(ICT)', 'laboratory', NULL, 0.00, 1000.00, NULL, NULL, NULL, '2025-09-10 07:11:33', '2025-09-10 07:11:33'),
(151, 'S.PSA', 'laboratory', 'IMMUNOASSAY', 0.00, 1200.00, '[{\"parameter_name\":\"PSA\",\"result\":\"1\",\"normal_value\":\"Less than 4.00\",\"unit\":\"ng\\/ml   \"}]', NULL, NULL, '2025-09-10 07:12:01', '2025-09-11 11:59:17'),
(152, 'CEA', 'laboratory', NULL, 0.00, 1200.00, NULL, NULL, NULL, '2025-09-10 07:12:11', '2025-09-10 07:12:11'),
(153, 'CA-125', 'laboratory', 'IMMUNOASSAY', 0.00, 1200.00, '[{\"parameter_name\":\"CA 125\",\"result\":\"1\",\"normal_value\":\"<=35.00\",\"unit\":\"U\\/ml\"}]', NULL, NULL, '2025-09-10 07:12:28', '2025-09-11 02:35:20'),
(154, 'CA-15.3', 'laboratory', NULL, 0.00, 1200.00, NULL, NULL, NULL, '2025-09-10 07:13:03', '2025-09-10 07:13:03'),
(155, 'CA-19.9', 'laboratory', NULL, 0.00, 1200.00, NULL, NULL, NULL, '2025-09-10 07:13:40', '2025-09-10 07:13:40'),
(156, 'AFP(Alpha-Feto-Protein)', 'laboratory', 'IMMUNOASSAY', 0.00, 1200.00, '[{\"parameter_name\":\"Alpha Feto Protein(AFP)\",\"result\":\"1\",\"normal_value\":\"Up to 15.00\",\"unit\":\"ng\\/ml\"}]', NULL, NULL, '2025-09-10 07:14:36', '2025-09-10 13:43:35'),
(157, 'B-HCG', 'laboratory', 'IMMUNOASSAY', 0.00, 1200.00, '[{\"parameter_name\":\"B-HCG\",\"result\":\" \",\"normal_value\":\" \",\"unit\":\"mIU\\/ml\"}]', NULL, NULL, '2025-09-10 07:15:02', '2025-09-11 09:14:01'),
(158, 'HBV-DNA', 'laboratory', NULL, 0.00, 9000.00, NULL, NULL, NULL, '2025-09-10 07:15:59', '2025-09-10 07:15:59'),
(159, 'HCV-RNA', 'laboratory', NULL, 0.00, 9000.00, NULL, NULL, NULL, '2025-09-10 07:16:17', '2025-09-10 07:16:17'),
(160, 'HLA-B27(Qualitative)', 'laboratory', NULL, 0.00, 3500.00, NULL, NULL, NULL, '2025-09-10 07:17:38', '2025-09-10 07:17:38'),
(161, 'Anti-TB IgA', 'laboratory', NULL, 0.00, 1100.00, NULL, NULL, NULL, '2025-09-10 07:18:03', '2025-09-10 07:18:03'),
(162, 'TB Ab Combined(IgG+IgM)(ICT)', 'laboratory', NULL, 0.00, 1200.00, NULL, NULL, NULL, '2025-09-10 07:19:06', '2025-09-10 07:19:06'),
(163, 'Mantoux', 'laboratory', NULL, 0.00, 500.00, NULL, NULL, NULL, '2025-09-10 07:19:39', '2025-09-10 07:19:39'),
(164, 'Anti-TB IgA,IgG,IgM', 'laboratory', NULL, 0.00, 3000.00, NULL, NULL, NULL, '2025-09-10 07:20:32', '2025-09-10 07:20:32'),
(165, 'Interluekin-6', 'laboratory', NULL, 0.00, 2500.00, NULL, NULL, NULL, '2025-09-10 07:22:49', '2025-09-10 07:22:49'),
(166, 'Insulin', 'laboratory', NULL, 0.00, 2000.00, NULL, NULL, NULL, '2025-09-10 07:23:05', '2025-09-10 07:23:05'),
(167, 'Free Testosterone', 'laboratory', 'IMMUNOASSAY', 0.00, 1800.00, '[{\"parameter_name\":\"Testosterone\",\"result\":\"1\",\"normal_value\":\"Male 2.6-10.45, Female 0.27-0.95 \",\"unit\":\"ng\\/ml\"}]', NULL, NULL, '2025-09-10 07:23:42', '2025-09-11 12:46:04'),
(168, 'Ceruloplasmin', 'laboratory', NULL, 0.00, 2500.00, NULL, NULL, NULL, '2025-09-10 07:24:17', '2025-09-10 07:24:17'),
(169, 'Lupus Anticoagulant by dRWT', 'laboratory', NULL, 0.00, 7000.00, NULL, NULL, NULL, '2025-09-10 07:25:29', '2025-09-10 07:25:29'),
(170, 'Aldosterone', 'laboratory', NULL, 0.00, 3500.00, NULL, NULL, NULL, '2025-09-10 07:25:55', '2025-09-10 07:25:55'),
(171, 'Beta-2-Microglobulin', 'laboratory', NULL, 0.00, 2800.00, NULL, NULL, NULL, '2025-09-10 07:26:29', '2025-09-10 07:26:29'),
(172, 'C-Peptide', 'laboratory', NULL, 0.00, 3000.00, NULL, NULL, NULL, '2025-09-10 07:26:59', '2025-09-10 07:26:59'),
(173, 'TSH receptor antibody', 'laboratory', NULL, 0.00, 5500.00, NULL, NULL, NULL, '2025-09-10 07:27:31', '2025-09-10 07:27:31'),
(174, 'IGF-1', 'laboratory', NULL, 0.00, 4000.00, NULL, NULL, NULL, '2025-09-10 07:27:49', '2025-09-10 07:27:49'),
(175, 'IGFBP-3', 'laboratory', NULL, 0.00, 4000.00, NULL, NULL, NULL, '2025-09-10 07:28:28', '2025-09-10 07:28:28'),
(176, 'DHEA-S', 'laboratory', NULL, 0.00, 2000.00, NULL, NULL, NULL, '2025-09-10 07:29:00', '2025-09-10 07:29:00'),
(177, 'SHBG', 'laboratory', NULL, 0.00, 2000.00, NULL, NULL, NULL, '2025-09-10 07:29:21', '2025-09-10 07:29:21'),
(178, 'Insulin antibody', 'laboratory', NULL, 0.00, 3700.00, NULL, NULL, NULL, '2025-09-10 07:29:57', '2025-09-10 07:29:57'),
(179, 'Islet Cells antibody', 'laboratory', NULL, 0.00, 3500.00, NULL, NULL, NULL, '2025-09-10 07:31:13', '2025-09-10 07:31:13'),
(180, 'GAD-65 antibody', 'laboratory', NULL, 0.00, 6500.00, NULL, NULL, NULL, '2025-09-10 07:31:37', '2025-09-10 07:31:37'),
(181, 'Anti mitochondrial antibody', 'laboratory', NULL, 0.00, 4000.00, NULL, NULL, NULL, '2025-09-10 07:32:37', '2025-09-10 07:32:37'),
(182, 'Estriol Unconjugated(uE3)', 'laboratory', NULL, 0.00, 2000.00, NULL, NULL, NULL, '2025-09-10 07:34:03', '2025-09-10 07:34:03'),
(183, '17-OHP', 'laboratory', NULL, 0.00, 3000.00, NULL, NULL, NULL, '2025-09-10 07:34:19', '2025-09-10 07:34:19'),
(184, 'Direct renin', 'laboratory', NULL, 0.00, 6300.00, NULL, NULL, NULL, '2025-09-10 07:34:41', '2025-09-10 07:34:41'),
(185, 'ACE', 'laboratory', NULL, 0.00, 3500.00, NULL, NULL, NULL, '2025-09-10 07:34:53', '2025-09-10 07:34:53'),
(186, 'ADA', 'laboratory', NULL, 0.00, 2000.00, NULL, NULL, NULL, '2025-09-10 07:35:03', '2025-09-10 07:35:03'),
(187, 'Erythropoietin', 'laboratory', NULL, 0.00, 3500.00, NULL, NULL, NULL, '2025-09-10 07:35:42', '2025-09-10 07:35:42'),
(188, 'Cyclosporine', 'laboratory', NULL, 0.00, 4000.00, NULL, NULL, NULL, '2025-09-10 07:36:15', '2025-09-10 07:36:15'),
(189, 'Tacrolimus', 'laboratory', NULL, 0.00, 6300.00, NULL, NULL, NULL, '2025-09-10 07:36:37', '2025-09-10 07:36:37'),
(190, 'Ammonia', 'laboratory', 'BIOCHEMISTRY', 0.00, 1500.00, '[{\"parameter_name\":\"S. Ammonia\",\"result\":\"1\",\"normal_value\":\"11 - 32\",\"unit\":\"\\u00b5mol\\/L\"}]', NULL, NULL, '2025-09-10 07:36:59', '2025-09-10 13:46:11'),
(191, 'Cystatin-c', 'laboratory', NULL, 0.00, 4200.00, NULL, NULL, NULL, '2025-09-10 07:37:29', '2025-09-10 07:37:29'),
(192, 'Alpha-1-antitrypsin', 'laboratory', NULL, 0.00, 7000.00, NULL, NULL, NULL, '2025-09-10 07:38:30', '2025-09-10 07:38:30'),
(193, 'Pleural Fluid Analysis', 'laboratory', NULL, 0.00, 3000.00, NULL, NULL, NULL, '2025-09-10 07:39:27', '2025-09-10 07:39:27'),
(194, 'Ascitic Fluid Analysis', 'laboratory', NULL, 0.00, 3000.00, NULL, NULL, NULL, '2025-09-10 07:39:58', '2025-09-10 07:39:58'),
(195, 'CSF Analysis', 'laboratory', NULL, 0.00, 3000.00, NULL, NULL, NULL, '2025-09-10 07:40:17', '2025-09-10 07:40:17'),
(196, 'Uroflowmetry', 'laboratory', NULL, 0.00, 1000.00, NULL, NULL, NULL, '2025-09-10 12:54:49', '2025-09-10 12:54:49'),
(198, 'USG of Pregnancy Profile', 'ultrasonography', 'USG of Pregnancy Profile', 0.00, 1200.00, '[{\"parameter_name\":\"\",\"result\":\"\",\"normal_value\":\"\",\"unit\":\"\"}]', '{\"finding\":\"\",\"comment\":\"\"}', '{\"parameters\":[{\"parameter_name\":\"Fetal Anatomy Survey\",\"result\":\"Fetal presentation: ______ (cephalic \\/ breech \\/ transverse)\\nFetal lie & position: ______\\nFetal heart: Present, FHR ______ bpm, normal four-chamber view\\nHead & Brain: Normal shape, midline structures intact\\nFace: Normal orbits, nose, lips, palate intact\\nSpine: Normal alignment and echotexture\\nThorax & Heart: Normal size and position\\nAbdomen: Stomach, liver, spleen, kidneys, bladder normal\\nLimbs: All limbs visualized with normal movements\\nUmbilical cord: 3 vessels, normal insertion\\nPlacenta: Location ______, grade ______, no previa\\nAmniotic fluid: AFI ______ cm \\/ MVP ______ cm (adequate \\/ reduced \\/ increased)\"},{\"parameter_name\":\"Fetal Biometry\",\"result\":\"Biparietal Diameter (BPD)______ mm______ weeks\\nHead Circumference (HC)______ mm______ weeks\\nAbdominal Circumference (AC)______ mm______ weeks\\nFemur Length (FL)______ mm______ weeks\\nEstimated Fetal Weight (EFW)______ g______ weeks\\nOverall gestational age corresponds to ______ weeks ______ days.\"},{\"parameter_name\":\"Doppler Studies (if performed)\",\"result\":\"Uterus: Normal contour\\nCervix: Length ______ mm, normal\\nAdnexa: Normal \"},{\"parameter_name\":\"Maternal Findings\",\"result\":\"Uterus: Normal contour\\nCervix: Length ______ mm, normal\\nAdnexa: Normal \"}],\"impression\":\"1. Single live intrauterine fetus corresponding to ______ weeks ______ days.\\n2. No gross congenital anomaly detected.\\n3. Adequate amniotic fluid, normal placenta and cord.\\n4. Doppler studies within normal limits (if performed).\"}', '2025-09-10 12:57:20', '2025-10-04 07:47:15'),
(199, 'USG of Thyroid Gland', 'ultrasonography', 'USG of Thyroid Gland', 0.00, 1200.00, '[{\"parameter_name\":\"\",\"result\":\"\",\"normal_value\":\"\",\"unit\":\"\"}]', '{\"finding\":\"\",\"comment\":\"\"}', '{\"parameters\":[{\"parameter_name\":\"Thyroid Lobe(Right)\",\"result\":\"Size: __________ \\u00d7 __________ \\u00d7 __________ cm\\nVolume: __________ ml\\nEchotexture: __________________ (homogeneous \\/ heterogeneous \\/ coarse)\\nFocal lesion \\/ nodule: __________________ (absent \\/ present \\u2013 describe below)\"},{\"parameter_name\":\"Thyroid Lobe(Left)\",\"result\":\"Size: __________ \\u00d7 __________ \\u00d7 __________ cm\\nVolume: __________ ml\\nEchotexture: __________________ (homogeneous \\/ heterogeneous \\/ coarse)\\nFocal lesion \\/ nodule: __________________ (absent \\/ present \\u2013 describe below)\"},{\"parameter_name\":\"Isthmus\",\"result\":\"Thickness: __________ mm\\nEchotexture: __________________\\nFocal lesion: __________________\"},{\"parameter_name\":\"Nodule Characteristics (if present)\",\"result\":\"Location: __________________ (Right \\/ Left \\/ Isthmus)\\nSize: __________ \\u00d7 __________ \\u00d7 __________ mm\\nShape: __________________ (round \\/ oval \\/ irregular)\\nMargin: __________________ (smooth \\/ ill-defined \\/ lobulated \\/ spiculated)\\nEchotexture: __________________ (hypoechoic \\/ hyperechoic \\/ mixed \\/ cystic \\/ solid)\\nCalcification: __________________ (absent \\/ micro \\/ macro)\\nVascularity (Doppler): __________________ (present \\/ absent \\/ peripheral \\/ central)\"},{\"parameter_name\":\"Lymph Nodes (Cervical \\/ Level I-V)\",\"result\":\"Size: __________ mm\\nEchogenicity: __________________\\nShape: __________________\\nHilar vascularity: __________________\\nSuspicious features: __________________\"}],\"impression\":\"1. Thyroid gland size and echotexture [normal \\/ abnormal].\\n2. No suspicious nodule \\/ [Describe nodule if present].\\n3. Cervical lymph nodes [normal \\/ suspicious].\\n4. Suggest correlation with thyroid function tests and follow-up as needed.\"}', '2025-09-10 12:57:52', '2025-10-04 07:29:13'),
(200, 'USG of PVR/MCC/KUB', 'ultrasonography', 'USG of PVR/MCC/KUB', 0.00, 1200.00, '[{\"parameter_name\":\"\",\"result\":\"\",\"normal_value\":\"\",\"unit\":\"\"}]', '{\"finding\":\"\",\"comment\":\"\"}', '{\"parameters\":[{\"parameter_name\":\"Right Kidney\",\"result\":\"Size: __________ \\u00d7 __________ \\u00d7 __________ cm\\nCorticomedullary differentiation: __________________\\nParenchymal echotexture: __________________ (normal \\/ echogenic \\/ heterogeneous)\\nFocal lesion \\/ cyst \\/ mass: __________________\\nHydronephrosis \\/ obstruction: __________________\",\"impression\":\"\"},{\"parameter_name\":\"Left Kidney\",\"result\":\"Size: __________ \\u00d7 __________ \\u00d7 __________ cm\\nCorticomedullary differentiation: __________________\\nParenchymal echotexture: __________________\\nFocal lesion \\/ cyst \\/ mass: __________________\\nHydronephrosis \\/ obstruction: __________________\"},{\"parameter_name\":\"Ureters\",\"result\":\"Right: __________________ (visualized \\/ not visualized \\/ dilated)\\nLeft: __________________ (visualized \\/ not visualized \\/ dilated)\"},{\"parameter_name\":\"Urinary Bladder\",\"result\":\"Wall thickness: __________ mm\\nContour: __________________\\nIntraluminal lesion \\/ stone: __________________\\nTrabeculation: __________________\"},{\"parameter_name\":\"Post-Void Residual (PVR)\",\"result\":\"Volume: __________ ml\\nSignificance: __________________ (normal \\/ elevated)\"},{\"parameter_name\":\"Other Findings\",\"result\":\"Free fluid in pelvis \\/ peritoneum: __________________\\nOther incidental findings: __________________\"}],\"impression\":\"1. Kidneys, ureters, and bladder appear normal.\\n2. No obstructive uropathy or calculi detected.\\n3. Post-void residual volume is __________ ml (normal \\/ elevated).\"}', '2025-09-10 12:58:51', '2025-10-04 06:06:31'),
(201, 'USG Breast (Single)', 'ultrasonography', 'USG Breast (Single)', 0.00, 1100.00, '[{\"parameter_name\":\"\",\"result\":\"\",\"normal_value\":\"\",\"unit\":\"\"}]', '{\"finding\":\"\",\"comment\":\"\"}', '{\"parameters\":[{\"parameter_name\":\"Findings ([Right \\/ Left] Breast)\",\"result\":\"Breast parenchyma: __________________ (normal \\/ fibroglandular \\/ fatty replaced).\\nFocal lesion: __________________ (absent \\/ present).\\nIf present:\\nLocation (quadrant\\/clock position): __________________\\nSize: __________ \\u00d7 __________ mm\\nShape: __________________ (oval \\/ irregular \\/ round)\\nMargin: __________________ (smooth \\/ lobulated \\/ spiculated)\\nEchotexture: __________________ (hypoechoic \\/ hyperechoic \\/ cystic \\/ complex)\\nPosterior acoustic features: __________________ (enhancement \\/ shadowing \\/ none)\\nVascularity (on Doppler): __________________ (present \\/ absent, mild \\/ moderate \\/ marked).\\nNipple\\u2013areolar complex: __________________ (normal \\/ retracted \\/ discharge)\\nSkin & subcutaneous tissue: __________________\\nAxillary region: __________________ (normal \\/ enlarged lymph nodes).\",\"impression\":\"\"},{\"parameter_name\":\"BI-RADS Assessment\",\"result\":\"\\u2714\\ufe0fBI-RADS 1 \\u2013 Negative\\n\\u2714\\ufe0fBI-RADS 2 \\u2013 Benign finding\\n\\u2714\\ufe0fBI-RADS 3 \\u2013 Probably benign (short interval follow-up suggested)\\n\\u274cBI-RADS 4 \\u2013 Suspicious abnormality (biopsy recommended)\\n\\u274cBI-RADS 5 \\u2013 Highly suggestive of malignancy\\n\\u274cBI-RADS 6 \\u2013 Known biopsy-proven malignancy\"}],\"impression\":\"Well-defined benign-appearing lesion, likely fibroadenoma\"}', '2025-09-10 12:59:20', '2025-10-04 06:01:29'),
(202, 'USG of Transvaginal/TVS-4D', 'ultrasonography', 'USG of Transvaginal/TVS-4D', 0.00, 1600.00, '[{\"parameter_name\":\"\",\"result\":\"\",\"normal_value\":\"\",\"unit\":\"\"}]', '{\"finding\":\"\",\"comment\":\"\"}', '{\"parameters\":[{\"parameter_name\":\"Uterus\",\"result\":\"Size: __________ \\u00d7 __________ \\u00d7 __________ cm\\nShape & position: __________ (anteverted \\/ retroverted \\/ axial)\\nMyometrium: __________________ (homogeneous \\/ heterogeneous \\/ fibroid seen)\\nEndometrium: Thickness __________ mm, echogenicity: __________________\\nFocal lesions (fibroid \\/ polyp \\/ adenomyosis): __________________\",\"impression\":\"\"},{\"parameter_name\":\"Cervix\",\"result\":\"Normal \\/ bulky \\/ lesion present\\nCervical canal: __________________\"},{\"parameter_name\":\"Right Ovary\",\"result\":\"Size: __________ \\u00d7 __________ \\u00d7 __________ cm\\nFollicles: __________ (number & size)\\nDominant follicle \\/ cyst \\/ mass: __________________\\nVascularity: __________________\"},{\"parameter_name\":\"Left Ovary\",\"result\":\"Size: __________ \\u00d7 __________ \\u00d7 __________ cm\\nFollicles: __________ (number & size)\\nDominant follicle \\/ cyst \\/ mass: __________________\\nVascularity: __________________\"},{\"parameter_name\":\"Adnexa\",\"result\":\"Mass \\/ hydrosalpinx: __________________\\nFree fluid in POD (Pouch of Douglas): __________________\"},{\"parameter_name\":\"If Early Pregnancy Evaluated\",\"result\":\"Gestational sac: Present \\/ absent\\nYolk sac: Present \\/ absent\\nFetal pole: Present \\/ absent\\nCardiac activity: Present (FHR ______ bpm)\\nCRL: __________ mm \\u2192 GA: __________ weeks __________ days\"}],\"impression\":\"Normal uterus and ovaries\"}', '2025-09-10 13:00:35', '2025-10-04 05:58:48');
INSERT INTO `investigations` (`id`, `test_name`, `department`, `test_category_name`, `buy_price`, `sell_price`, `test_form`, `xray_form`, `usg_form`, `created_at`, `updated_at`) VALUES
(204, 'USG of Both Breast-4D', 'ultrasonography', 'USG of Both Breast-4D', 0.00, 2000.00, '[{\"parameter_name\":\"\",\"result\":\"\",\"normal_value\":\"\",\"unit\":\"\"}]', '{\"finding\":\"\",\"comment\":\"\"}', '{\"parameters\":[{\"parameter_name\":\"Right Breast\",\"result\":\"Breast parenchyma: __________________ (normal \\/ fibroglandular \\/ fatty replaced).\\nFocal lesion: __________________ (present \\/ absent).\\nIf present:\\nSite \\/ quadrant: __________________\\nSize: __________ \\u00d7 __________ mm\\nShape & margin: __________________ (regular \\/ irregular \\/ spiculated)\\nEchotexture: __________________ (hypoechoic \\/ complex \\/ cystic \\/ solid)\\nPosterior acoustic features: __________________ (enhancement \\/ shadowing)\\nVascularity (on Doppler): __________________ (present \\/ absent, mild \\/ moderate \\/ marked).\\nNipple\\u2013areolar complex: __________________\\nSkin \\/ subcutaneous tissue: __________________\\nAxillary region: __________________ (normal \\/ enlarged lymph nodes).\",\"impression\":\"\"},{\"parameter_name\":\"Left Breast\",\"result\":\"Breast parenchyma: __________________ (normal \\/ fibroglandular \\/ fatty replaced).\\nFocal lesion: __________________ (present \\/ absent).\\nIf present:\\nSite \\/ quadrant: __________________\\nSize: __________ \\u00d7 __________ mm\\nShape & margin: __________________\\nEchotexture: __________________\\nPosterior acoustic features: __________________\\nVascularity: __________________\\nNipple\\u2013areolar complex: __________________\\nSkin \\/ subcutaneous tissue: __________________\\nAxillary region: __________________\"},{\"parameter_name\":\"BI-RADS Assessment\",\"result\":\"\\u2714\\ufe0fBI-RADS 1 \\u2013 Negative\\n\\u2714\\ufe0fBI-RADS 2 \\u2013 Benign\\n\\u2714\\ufe0fBI-RADS 3 \\u2013 Probably benign (short interval follow-up suggested)\\n\\u2714\\ufe0f BI-RADS 4 \\u2013 Suspicious (biopsy recommended)\\n\\u274cBI-RADS 5 \\u2013 Highly suggestive of malignancy\\n\\u274c BI-RADS 6 \\u2013 Known biopsy-proven malignancy\"}],\"impression\":\"No suspicious lesion detected in either breast.\"}', '2025-09-10 13:02:51', '2025-10-04 05:54:21'),
(205, 'USG of Carotid Droppler-4D', 'ultrasonography', 'USG of Carotid Droppler-4D', 0.00, 3000.00, '[{\"parameter_name\":\"\",\"result\":\"\",\"normal_value\":\"\",\"unit\":\"\"}]', '{\"finding\":\"\",\"comment\":\"\"}', '{\"parameters\":[{\"parameter_name\":\"Right Side\",\"result\":\"CCA (Common Carotid Artery): Diameter __________ mm, PSV __________ cm\\/s, EDV __________ cm\\/s, Intima-media thickness __________ mm.\\nBifurcation & Bulb: __________ (normal \\/ plaque \\/ calcification \\/ irregularity).\\nICA (Internal Carotid Artery): PSV __________ cm\\/s, EDV __________ cm\\/s, stenosis __________%.\\nECA (External Carotid Artery): Flow pattern: __________.\\nVertebral Artery: Flow direction: __________ (antegrade \\/ retrograde \\/ diminished).\",\"impression\":\"\"},{\"parameter_name\":\"Left Side\",\"result\":\"CCA: Diameter __________ mm, PSV __________ cm\\/s, EDV __________ cm\\/s, Intima-media thickness __________ mm.\\nBifurcation & Bulb: __________ (normal \\/ plaque \\/ calcification \\/ irregularity).\\nICA: PSV __________ cm\\/s, EDV __________ cm\\/s, stenosis __________%.\\nECA: Flow pattern: __________.\\nVertebral Artery: Flow direction: __________ (antegrade \\/ retrograde \\/ diminished).\"},{\"parameter_name\":\"Plaque Morphology (if present)\",\"result\":\"Site: __________\\nSurface: __________ (smooth \\/ irregular \\/ ulcerated)\\nEchogenicity: __________ (hypoechoic \\/ hyperechoic \\/ calcified \\/ mixed)\"},{\"parameter_name\":\"Hemodynamics\",\"result\":\"Normal triphasic \\/ biphasic waveforms maintained \\/ altered.\\nPeak systolic velocities correspond to __________% stenosis (according to NASCET criteria).\"}],\"impression\":\"1. No significant hemodynamically relevant stenosis detected in bilateral carotid and vertebral arteries.\\n2. Evidence of __________% stenosis in [Right \\/ Left] ICA.\\n3. Vertebral arteries show antegrade flow bilaterally.\"}', '2025-09-10 13:03:47', '2025-10-04 05:48:52'),
(206, 'USG of Anomaly Scan-4D', 'ultrasonography', 'USG of Anomaly Scan-4D', 0.00, 3000.00, '[{\"parameter_name\":\"\",\"result\":\"\",\"normal_value\":\"\",\"unit\":\"\"}]', '{\"finding\":\"\",\"comment\":\"\"}', '{\"parameters\":[{\"parameter_name\":\"Fetal Viability & Presentation\",\"result\":\"Single live intrauterine fetus seen.\\nCardiac activity present, FHR: __________ bpm.\\nPresentation: __________ (cephalic \\/ breech \\/ transverse).\",\"impression\":\"\"},{\"parameter_name\":\"Placenta & Liquor\",\"result\":\"Placenta: __________ (anterior \\/ posterior \\/ fundal \\/ low-lying).\\nPlacental maturity (Grading): __________.\\nAmniotic fluid: AFI __________ cm \\/ MVP __________ cm (adequate \\/ reduced \\/ increased).\"},{\"parameter_name\":\"Biometry (Fetal Measurements)\",\"result\":\"BPD: __________ mm \\u2192 GA: __________ weeks\\nHC: __________ mm \\u2192 GA: __________ weeks\\nAC: __________ mm \\u2192 GA: __________ weeks\\nFL: __________ mm \\u2192 GA: __________ weeks\\nEFW: __________ g\"},{\"parameter_name\":\"Head & Brain(Fetal Anatomy Survey)\",\"result\":\"Skull shape: Normal\\nMidline structures (falx, cavum septum pellucidum): Seen\\nLateral ventricles: Normal, __________ mm\\nChoroid plexus: Normal\\nCerebellum & cisterna magna: Normal\"},{\"parameter_name\":\"Face\",\"result\":\"Orbits & lenses: Normal\\nNose, lips, palate: Intact\\nProfile: Normal\"},{\"parameter_name\":\"Spine\",\"result\":\"Cervical, thoracic, lumbar & sacral spine intact\\nOverlying skin: Normal\"},{\"parameter_name\":\"Neck & Thorax\",\"result\":\"Neck mass: Absent\\nHeart position & size: Normal\\n4-chamber view: Normal\\nOutflow tracts: Normal\\nCardiac activity: Present\"},{\"parameter_name\":\"Abdomen\",\"result\":\"Stomach bubble: Seen\\nLiver, spleen: Normal\\nKidneys: Both visualized, normal\\nBladder: Seen\\nBowel: Normal echogenicity\"},{\"parameter_name\":\"Limbs\",\"result\":\"All four limbs seen with normal movements\\nLong bones: Normal length & echogenicity\\nHands & feet: Normal\"},{\"parameter_name\":\"Umbilical Cord\",\"result\":\"3 vessels (2 arteries + 1 vein): Present\\nCord insertion: Normal\"},{\"parameter_name\":\"Maternal Findings\",\"result\":\"Uterus: Normal contour\\nCervix length: __________ mm\\nAdnexa: Normal\"}],\"impression\":\"\"}', '2025-09-10 13:04:31', '2025-10-04 05:46:16'),
(208, 'USG duplex study(Both) Lower Limb-4D', 'ultrasonography', 'USG duplex study(Both) Lower Limb-4D', 0.00, 6000.00, '[{\"parameter_name\":\"\",\"result\":\"\",\"normal_value\":\"\",\"unit\":\"\"}]', '{\"finding\":\"\",\"comment\":\"\"}', '{\"parameters\":[{\"parameter_name\":\"Right Lower Limb(Venous System)\",\"result\":\"Deep veins (CFV, FV, PopV, PT, Peroneal, GSV, SSV): __________________\\nCompressibility: __________________\\nColor flow \\/ phasicity: __________________\\nAugmentation: __________________\\nThrombus \\/ echogenic material: __________________\\nReflux: __________________\"},{\"parameter_name\":\"Left Lower Limb\",\"result\":\"Deep veins (CFV, FV, PopV, PT, Peroneal, GSV, SSV): __________________\\nCompressibility: __________________\\nColor flow \\/ phasicity: __________________\\nAugmentation: __________________\\nThrombus \\/ echogenic material: __________________\\nReflux: __________________\"},{\"parameter_name\":\"Right Lower Limb(Arterial System)\",\"result\":\"CFA, SFA, Popliteal, ATA, PTA, Peroneal artery evaluated.\\nFlow: __________________\\nPSV (peak systolic velocity): __________________ cm\\/s\\nSpectral waveform: __________________ (triphasic \\/ biphasic \\/ monophasic)\\nStenosis \\/ occlusion: __________________\\nPlaque \\/ calcification: __________________\"},{\"parameter_name\":\"Left Lower Limb\",\"result\":\"CFA, SFA, Popliteal, ATA, PTA, Peroneal artery evaluated.\\nFlow: __________________\\nPSV (peak systolic velocity): __________________ cm\\/s\\nSpectral waveform: __________________ (triphasic \\/ biphasic \\/ monophasic)\\nStenosis \\/ occlusion: __________________\\nPlaque \\/ calcification: __________________\"},{\"parameter_name\":\"Soft Tissues \\/ Others\",\"result\":\"Subcutaneous edema: __________________\\nLymph nodes \\/ masses: __________________\\nAny vascular malformations \\/ varicosities: __________________\"}],\"impression\":\"\"}', '2025-09-10 13:06:03', '2025-10-04 05:28:20'),
(209, 'Ba Follow Through(BaFT)', 'radiology', 'X-Ray Ba Follow Through(BaFT)', 0.00, 2000.00, '[{\"parameter_name\":\"\",\"result\":\"\",\"normal_value\":\"\",\"unit\":\"\"}]', '{\"finding\":\"\",\"comment\":\"\"}', NULL, '2025-09-10 13:08:07', '2025-09-14 01:19:07'),
(210, 'Ba Swallow Oesophagus', 'radiology', 'X-Ray Ba Swallow Oesophagus', 0.00, 1800.00, '[{\"parameter_name\":\"\",\"result\":\"\",\"normal_value\":\"\",\"unit\":\"\"}]', '{\"finding\":\"\",\"comment\":\"\"}', NULL, '2025-09-10 13:08:48', '2025-09-14 01:18:54'),
(211, 'Ba Enema Plain', 'radiology', 'X-Ray Ba Enema Plain', 0.00, 2200.00, '[{\"parameter_name\":\"\",\"result\":\"\",\"normal_value\":\"\",\"unit\":\"\"}]', '{\"finding\":\"\",\"comment\":\"\"}', NULL, '2025-09-10 13:09:24', '2025-09-14 01:18:33'),
(212, 'X-ray IVU Digital', 'radiology', 'X-ray IVU Digital', 0.00, 2000.00, '[{\"parameter_name\":\"\",\"result\":\"\",\"normal_value\":\"\",\"unit\":\"\"}]', '{\"finding\":\"\",\"comment\":\"\"}', NULL, '2025-09-10 13:11:05', '2025-09-14 01:18:14'),
(213, 'X-Ray SKULL B/V', 'radiology', 'X-Ray SKULL B/V', 0.00, 1000.00, '[{\"parameter_name\":\"\",\"result\":\"\",\"normal_value\":\"\",\"unit\":\"\"}]', '{\"finding\":\"\",\"comment\":\"\"}', NULL, '2025-09-10 13:11:47', '2025-09-14 01:18:04'),
(214, 'X-Ray LT/RT Shoulder B/V', 'radiology', 'X-Ray LT/RT Shoulder B/V', 0.00, 900.00, '[{\"parameter_name\":\"\",\"result\":\"\",\"normal_value\":\"\",\"unit\":\"\"}]', '{\"finding\":\"\",\"comment\":\"\"}', NULL, '2025-09-10 13:12:19', '2025-09-14 01:17:55'),
(215, 'X-Ray Lumbo Sacral Spine B/V', 'radiology', 'X-Ray Lumbo Sacral Spine B/V', 0.00, 900.00, '[{\"parameter_name\":\"\",\"result\":\"\",\"normal_value\":\"\",\"unit\":\"\"}]', '{\"finding\":\"\",\"comment\":\"\"}', NULL, '2025-09-10 13:13:06', '2025-09-14 01:17:46'),
(216, 'X-Ray Cervical Spine B/V', 'radiology', 'X-Ray Cervical Spine B/V', 0.00, 900.00, '[{\"parameter_name\":\"\",\"result\":\"\",\"normal_value\":\"\",\"unit\":\"\"}]', '{\"finding\":\"\",\"comment\":\"\"}', NULL, '2025-09-10 13:13:42', '2025-09-14 01:17:37'),
(217, 'X-Ray Soft Tissue Neck Lat.View', 'radiology', 'X-Ray Soft Tissue Neck Lat.View', 0.00, 600.00, '[{\"parameter_name\":\"\",\"result\":\"\",\"normal_value\":\"\",\"unit\":\"\"}]', '{\"finding\":\"\",\"comment\":\"\"}', NULL, '2025-09-10 13:14:29', '2025-09-14 01:17:24'),
(218, 'X-Ray Abdomen-Erect Posture', 'radiology', 'X-Ray Abdomen-Erect Posture', 0.00, 600.00, '[{\"parameter_name\":\"\",\"result\":\"\",\"normal_value\":\"\",\"unit\":\"\"}]', '{\"finding\":\"\",\"comment\":\"\"}', NULL, '2025-09-10 13:15:26', '2025-09-14 01:17:13'),
(219, 'X-Ray KUB', 'radiology', 'X-Ray KUB', 0.00, 600.00, '[{\"parameter_name\":\"\",\"result\":\"\",\"normal_value\":\"\",\"unit\":\"\"}]', '{\"finding\":\"\",\"comment\":\"\"}', NULL, '2025-09-10 13:15:50', '2025-09-14 01:17:02'),
(220, 'X-Ray Chest PA View Digital', 'radiology', 'X-Ray Chest PA View Digital', 0.00, 600.00, '[{\"parameter_name\":\"\",\"result\":\"\",\"normal_value\":\"\",\"unit\":\"\"}]', '{\"finding\":\"\",\"comment\":\"\"}', NULL, '2025-09-10 13:17:34', '2025-09-14 01:16:51'),
(221, 'X-Ray Both TM Joints B/V', 'radiology', 'X-Ray Both TM Joints B/V', 0.00, 1000.00, '[{\"parameter_name\":\" \",\"result\":\" \",\"normal_value\":\" \",\"unit\":\"\"}]', '{\"finding\":\"\",\"comment\":\"\\n\"}', NULL, '2025-09-10 13:18:28', '2025-09-14 01:16:34'),
(222, 'X-Ray PNS OM View', 'radiology', 'X-Ray PNS OM View', 0.00, 500.00, '[{\"parameter_name\":\"\",\"result\":\"\",\"normal_value\":\"\",\"unit\":\"\"}]', '{\"finding\":\"\",\"comment\":\"\"}', NULL, '2025-09-10 13:18:59', '2025-09-14 01:16:16'),
(223, 'X-Ray Both Wrist Joints B/V', 'radiology', 'X-Ray Both Wrist Joints B/V', 0.00, 1000.00, '[{\"parameter_name\":\"\",\"result\":\"\",\"normal_value\":\"\",\"unit\":\"\"}]', '{\"finding\":\"\",\"comment\":\"\"}', NULL, '2025-09-10 13:19:49', '2025-09-14 01:15:58'),
(224, 'X-Ray Dorso-Lumber Spine B/V', 'radiology', 'X-Ray Dorso-Lumber Spine B/V', 0.00, 1000.00, '[{\"parameter_name\":\"\",\"result\":\"\",\"normal_value\":\"\",\"unit\":\"\"}]', '{\"finding\":\"\",\"comment\":\"\"}', NULL, '2025-09-10 13:20:30', '2025-09-14 01:15:50'),
(225, 'X-Ray OPG', 'radiology', 'X-Ray OPG', 0.00, 500.00, '[{\"parameter_name\":\"\",\"result\":\"\",\"normal_value\":\"\",\"unit\":\"\"}]', '{\"finding\":\"\",\"comment\":\"\"}', NULL, '2025-09-10 13:20:59', '2025-09-14 01:15:39'),
(226, 'CT Scan-Brain/Head', 'radiology', NULL, 0.00, 3500.00, NULL, NULL, NULL, '2025-09-10 13:22:20', '2025-09-10 13:22:20'),
(227, 'CT Scan of Upper Abdomen', 'radiology', NULL, 0.00, 4500.00, NULL, NULL, NULL, '2025-09-10 13:23:04', '2025-09-10 13:23:04'),
(228, 'CT Scan of Lower Abdomen', 'radiology', NULL, 0.00, 4500.00, NULL, NULL, NULL, '2025-09-10 13:23:31', '2025-09-10 13:23:31'),
(229, 'CT Scan of Whole Abdomen', 'radiology', NULL, 0.00, 8000.00, NULL, NULL, NULL, '2025-09-10 13:24:13', '2025-09-10 13:24:13'),
(230, 'CT Scan of KUB', 'radiology', NULL, 0.00, 8000.00, NULL, NULL, NULL, '2025-09-10 13:24:38', '2025-09-10 13:24:38'),
(231, 'CT Scan of PNS', 'radiology', NULL, 0.00, 4000.00, NULL, NULL, NULL, '2025-09-10 13:25:09', '2025-09-10 13:25:09'),
(232, 'CT Scan of Neck', 'radiology', NULL, 0.00, 4000.00, NULL, NULL, NULL, '2025-09-10 13:26:03', '2025-09-10 13:26:03'),
(233, 'CT Scan of Chest', 'radiology', NULL, 0.00, 6000.00, NULL, NULL, NULL, '2025-09-10 13:26:24', '2025-09-10 13:26:24'),
(234, 'HRCT(High Resolution CT Scan)', 'radiology', NULL, 0.00, 4500.00, NULL, NULL, NULL, '2025-09-10 13:27:28', '2025-09-10 13:27:28'),
(235, 'MRI of Brain', 'radiology', NULL, 0.00, 6500.00, NULL, NULL, NULL, '2025-09-10 13:28:04', '2025-09-10 13:28:04'),
(236, 'MRI of Cervical Spine', 'radiology', NULL, 0.00, 6500.00, NULL, NULL, NULL, '2025-09-10 13:28:37', '2025-09-10 13:28:37'),
(237, 'MRI Lumbo Sacral Spine', 'radiology', NULL, 0.00, 6500.00, NULL, NULL, NULL, '2025-09-10 13:29:23', '2025-09-10 13:29:23'),
(238, 'MRI of RT/LT Knee', 'radiology', NULL, 0.00, 6500.00, NULL, NULL, NULL, '2025-09-10 13:29:51', '2025-09-10 13:29:51'),
(239, 'MRI of RT/LT Ankle', 'radiology', NULL, 0.00, 6500.00, NULL, NULL, NULL, '2025-09-10 13:30:24', '2025-09-10 13:30:24'),
(240, 'MRI Screening', 'radiology', 'Whole Abdomen', 0.00, 2500.00, '[{\"parameter_name\":\"\",\"result\":\"\",\"normal_value\":\"\",\"unit\":\"\"}]', '{\"finding\":\"\",\"comment\":\"\"}', NULL, '2025-09-10 13:30:48', '2025-10-03 18:39:05'),
(241, 'EEG', 'cardiology ', NULL, 0.00, 3000.00, NULL, NULL, NULL, '2025-09-10 13:32:58', '2025-09-10 13:32:58'),
(242, 'Endoscopy of UpperGIT(Video)', 'cardiology ', NULL, 0.00, 1500.00, NULL, NULL, NULL, '2025-09-10 13:33:39', '2025-09-10 13:33:39'),
(243, 'Colonoscopy', 'cardiology ', NULL, 0.00, 5000.00, NULL, NULL, NULL, '2025-09-10 13:33:59', '2025-09-10 13:33:59'),
(244, 'Bronchoscopy', 'cardiology ', NULL, 0.00, 5500.00, NULL, NULL, NULL, '2025-09-10 13:34:23', '2025-09-10 13:34:23'),
(245, 'CBC', 'laboratory', 'HAEMATOLOGY', 0.00, 400.00, '[{\"parameter_name\":\"Hemoglobin (Hb%)\",\"result\":\"9.4\",\"normal_value\":\"Male: 12-18, Female: 11-16\",\"unit\":\"gm\\/dl\"},{\"parameter_name\":\"ESR\",\"result\":\"15\",\"normal_value\":\"Male: 0-10, Female: 0-15\",\"unit\":\"mm\"},{\"parameter_name\":\"Total WBC Counts\",\"result\":\"1\",\"normal_value\":\"4000-11000\",\"unit\":\"mm\\u00b3\"},{\"parameter_name\":\"Differential Counts\",\"result\":\" \",\"normal_value\":\" \",\"unit\":\"\"},{\"parameter_name\":\"Neutrophils\",\"result\":\"1\",\"normal_value\":\"40-75%\",\"unit\":\"\"},{\"parameter_name\":\"Lymphocytes\",\"result\":\"1\",\"normal_value\":\"20-50%\",\"unit\":\"\"},{\"parameter_name\":\"Monocytes\",\"result\":\"1\",\"normal_value\":\"2-10%\",\"unit\":\"\"},{\"parameter_name\":\"Eosinophils\",\"result\":\"1\",\"normal_value\":\"1-8%\",\"unit\":\"\"},{\"parameter_name\":\"Basophils\",\"result\":\"1\",\"normal_value\":\"0-1%\",\"unit\":\"\"},{\"parameter_name\":\"Total Cir. Eosinophils\",\"result\":\"1\",\"normal_value\":\"50 - 450\",\"unit\":\"cumm\"},{\"parameter_name\":\"RBC COUNT\",\"result\":\"1\",\"normal_value\":\"M: 4.5 - 6.5, F: 3.8 - 5.8\",\"unit\":\"m\\/ul\"},{\"parameter_name\":\"HCT\\/PCV\",\"result\":\"1\",\"normal_value\":\"M: 40 - 54%, F: 37 - 47%\",\"unit\":\"\"},{\"parameter_name\":\"MCV\",\"result\":\"24fl\",\"normal_value\":\"76-94\",\"unit\":\"fL\"},{\"parameter_name\":\"MCH\",\"result\":\"27pg\",\"normal_value\":\"27-32\",\"unit\":\"pg\"},{\"parameter_name\":\"MCHC\",\"result\":\"29g\\/dl\",\"normal_value\":\"29-34\",\"unit\":\"g\\/dL\"},{\"parameter_name\":\"RDW-CV\",\"result\":\"10%\",\"normal_value\":\"10-16%\",\"unit\":\"\"},{\"parameter_name\":\"RDW-SD\",\"result\":\"35\",\"normal_value\":\"35-56\",\"unit\":\"fl\"},{\"parameter_name\":\"Platelet Count\",\"result\":\"1\",\"normal_value\":\"150000-400000\",\"unit\":\"mm\\u00b3\"},{\"parameter_name\":\"MPV\",\"result\":\"6.0\",\"normal_value\":\"7.0- 11.0\",\"unit\":\" fL\"},{\"parameter_name\":\"PDW\",\"result\":\"11%\",\"normal_value\":\"10- 18%\",\"unit\":\"\"},{\"parameter_name\":\"PCT\",\"result\":\"0.14%\",\"normal_value\":\"0.1-0.2%\",\"unit\":\"\"},{\"parameter_name\":\"P-LCR\",\"result\":\"40%\",\"normal_value\":\"11.0-45.0%\",\"unit\":\"\"},{\"parameter_name\":\"P-LCC\",\"result\":\"30\",\"normal_value\":\"30-90\",\"unit\":\"fL\"}]', '{\"finding\":\"\",\"comment\":\"\"}', NULL, '2025-09-11 02:36:29', '2025-09-29 08:25:28'),
(246, 'D-Dimer', 'laboratory', NULL, 0.00, 1500.00, NULL, NULL, NULL, '2025-09-14 08:27:29', '2025-09-14 08:27:29'),
(247, 'β-HCG', 'laboratory', NULL, 0.00, 1500.00, NULL, NULL, NULL, '2025-09-14 08:28:56', '2025-09-14 08:28:56'),
(248, 'S.Albumin', 'laboratory', NULL, 0.00, 500.00, NULL, NULL, NULL, '2025-09-14 08:29:23', '2025-09-14 08:29:23'),
(249, 'DROP TEST', 'laboratory', NULL, 0.00, 3000.00, NULL, NULL, NULL, '2025-09-14 08:38:01', '2025-09-14 08:38:01'),
(250, 'ESR', 'laboratory', NULL, 0.00, 200.00, NULL, NULL, NULL, '2025-09-14 08:38:41', '2025-09-14 08:38:41'),
(251, 'Febrile Antigens', 'laboratory', NULL, 0.00, 1500.00, NULL, NULL, NULL, '2025-09-14 08:39:06', '2025-09-14 08:39:06'),
(252, 'Malaria', 'laboratory', NULL, 0.00, 300.00, NULL, NULL, NULL, '2025-09-14 08:41:41', '2025-09-14 08:41:41'),
(253, 'MT', 'laboratory', NULL, 0.00, 800.00, NULL, NULL, NULL, '2025-09-14 08:42:22', '2025-09-14 08:42:22'),
(254, 'Rheumatoid Factor   ', 'laboratory', NULL, 0.00, 1000.00, NULL, NULL, NULL, '2025-09-14 08:42:59', '2025-09-14 08:42:59'),
(255, 'Vaccum Needle(N)', 'accessories ', NULL, 0.00, 20.00, NULL, NULL, NULL, '2025-09-23 04:05:51', '2025-09-29 07:44:49'),
(256, 'Gray Tube', 'accessories ', NULL, 0.00, 20.00, NULL, NULL, NULL, '2025-09-23 04:06:09', '2025-09-29 07:43:39'),
(257, 'ESR Tube', 'accessories ', NULL, 0.00, 25.00, NULL, NULL, NULL, '2025-09-23 04:06:23', '2025-09-26 12:05:26'),
(258, 'Red Tube', 'accessories ', NULL, 0.00, 20.00, NULL, NULL, NULL, '2025-09-29 07:43:55', '2025-09-29 07:43:55'),
(259, 'Lavender Tube', 'accessories ', NULL, 0.00, 20.00, NULL, NULL, NULL, '2025-09-29 07:45:23', '2025-09-29 07:45:23'),
(260, 'PT Tube', 'accessories ', NULL, 0.00, 20.00, NULL, NULL, NULL, '2025-09-29 07:57:45', '2025-09-29 07:57:45'),
(261, 'USG of Whole Abdomen 4D', 'ultrasonography', 'USG of Whole Abdomen 4D', 0.00, 1800.00, '[{\"parameter_name\":\"\",\"result\":\"\",\"normal_value\":\"\",\"unit\":\"\"}]', '{\"finding\":\"\",\"comment\":\"\"}', '{\"parameters\":[{\"parameter_name\":\"Liver\",\"result\":\"Size: __________________ cm\\nEchotexture: __________________ (normal \\/ fatty \\/ coarse)\\nSurface: __________________ (smooth \\/ irregular)\\nFocal lesion: __________________ (absent \\/ present \\u2013 describe)\\nIntrahepatic biliary radicals: __________________\\nHepatic vessels & portal vein: __________________\"},{\"parameter_name\":\"Gallbladder & Biliary System\",\"result\":\"Wall thickness: __________ mm\\nStones \\/ sludge \\/ polyps: __________________\\nPericholecystic fluid: __________________\\nCommon bile duct (CBD) diameter: __________ mm\\nIntra \\/ extrahepatic biliary dilatation: __________________\"},{\"parameter_name\":\"Pancreas\",\"result\":\"Size & echotexture: __________________\\nFocal lesion \\/ cyst \\/ calcification: __________________\\nPancreatic duct: __________________\"},{\"parameter_name\":\"Spleen\",\"result\":\"Size: __________ cm\\nEchotexture: __________________\\nFocal lesion: __________________\"},{\"parameter_name\":\"Right Kidney\",\"result\":\"Size: __________ \\u00d7 __________ cm\\nCorticomedullary differentiation: __________________\\nStones \\/ cysts \\/ masses: __________________\\nHydronephrosis: __________________\"},{\"parameter_name\":\"Left Kidney\",\"result\":\"Size: __________ \\u00d7 __________ cm\\nCorticomedullary differentiation: __________________\\nStones \\/ cysts \\/ masses: __________________\\nHydronephrosis: __________________\"},{\"parameter_name\":\"Adrenals\",\"result\":\"Right adrenal: __________________\\nLeft adrenal: __________________\"},{\"parameter_name\":\"Urinary Bladder & Pelvis\",\"result\":\"Wall thickness \\/ contour: __________________\\nLesions \\/ trabeculation: __________________\\nPost-void residual: __________________\"},{\"parameter_name\":\"Vessels & Retroperitoneum\",\"result\":\"Abdominal aorta: Diameter __________ mm, plaques \\/ aneurysm: __________________\\nIVC: __________________\\nPara-aortic lymph nodes: __________________\"},{\"parameter_name\":\"Peritoneum \\/ Others\",\"result\":\"Free fluid \\/ ascites: __________________\\nAny masses: __________________\"}],\"impression\":\"1. Liver, gallbladder, pancreas, spleen, kidneys, and urinary bladder appear normal.\\n2. No focal lesion or abnormal fluid collection seen.\\n3. No evidence of hydronephrosis or biliary obstruction.\"}', '2025-10-03 21:36:55', '2025-10-04 07:23:36'),
(262, 'USG of duplex study(Single) Lower Limb-4D', 'ultrasonography', 'USG of duplex study(Single) Lower Limb-4D', 0.00, 3000.00, NULL, '{\"finding\":\"\",\"comment\":\"\"}', '{\"parameters\":[{\"parameter_name\":\"Venous System ([Right \\/ Left] Lower Limb)\",\"result\":\"Common femoral vein (CFV): __________________\\nFemoral vein (proximal, mid, distal): __________________\\nPopliteal vein: __________________\\nPosterior tibial & peroneal veins: __________________\\nGreat & small saphenous veins: __________________\\nCompressibility: __________________\\nColor flow \\/ phasicity: __________________\\nSpontaneity \\/ augmentation: __________________\\nThrombus: __________________\\nReflux: __________________\",\"impression\":\"\"},{\"parameter_name\":\"Arterial System ([Right \\/ Left] Lower Limb)\",\"result\":\"Common femoral artery (CFA): __________________\\nSuperficial femoral artery (SFA): __________________\\nPopliteal artery: __________________\\nAnterior tibial, posterior tibial & peroneal arteries: __________________\\nPSV (peak systolic velocity): __________________ cm\\/s\\nWaveform: __________________ (triphasic \\/ biphasic \\/ monophasic)\\nStenosis \\/ occlusion: __________________\\nPlaque \\/ calcification: __________________\"},{\"parameter_name\":\"Soft Tissue \\/ Others\",\"result\":\"Subcutaneous edema: __________________\\nLymph nodes \\/ mass lesion: __________________\\nVaricosities \\/ vascular malformations: __________________\\nFree fluid: __________________\"}],\"impression\":\"\"}', '2025-10-03 21:38:15', '2025-10-04 05:31:08'),
(263, 'USG of whole Abdomen 2D', 'ultrasonography', 'USG of Whole Abdomen 2D', 0.00, 1200.00, '[{\"parameter_name\":\"\",\"result\":\"\",\"normal_value\":\"\",\"unit\":\"\"}]', '{\"finding\":\"\",\"comment\":\"\"}', '{\"parameters\":[{\"parameters\":{\"parameters\":{\"parameters\":[{\"parameter_name\":\"Liver\",\"result\":\"Size \\/ dimensions: __________________ cm\\nEchotexture \\/ echogenicity: __________________\\nFocal lesions (if any): __________________\\nIntrahepatic biliary radicals: __________________\\nVascular \\/ portal vein \\/ hepatic veins: __________________\",\"impression\":\"\"}],\"impression\":\"\",\"parameter_name\":\"Liver\",\"result\":\"Size \\/ dimensions: __________________ cm\\nEchotexture \\/ echogenicity: __________________\\nFocal lesions (if any): __________________\\nIntrahepatic biliary radicals: __________________\\nVascular \\/ portal vein \\/ hepatic veins: __________________\"},\"impression\":\"\",\"parameter_name\":\"Sharif\"},\"impression\":\"\",\"parameter_name\":\"Liver\",\"result\":\"Size: __________________ cm\\nEchotexture: __________________ (normal \\/ fatty \\/ coarse)\\nSurface: __________________ (smooth \\/ irregular)\\nFocal lesion: __________________ (absent \\/ present \\u2013 describe)\\nIntrahepatic biliary radicals: __________________\\nHepatic vessels & portal vein: __________________\"},{\"parameter_name\":\"Gallbladder & Biliary System\",\"result\":\"Wall thickness: __________ mm\\nStones \\/ sludge \\/ polyps: __________________\\nPericholecystic fluid: __________________\\nCommon bile duct (CBD) diameter: __________ mm\\nIntra \\/ extrahepatic biliary dilatation: __________________\"},{\"parameter_name\":\"Pancreas\",\"result\":\"Size & echotexture: __________________\\nFocal lesion \\/ cyst \\/ calcification: __________________\\nPancreatic duct: __________________\"},{\"parameter_name\":\"Spleen\",\"result\":\"Size: __________ cm\\nEchotexture: __________________\\nFocal lesion: __________________\"},{\"parameter_name\":\"Right Kidney\",\"result\":\"Size: __________ \\u00d7 __________ cm\\nCorticomedullary differentiation: __________________\\nStones \\/ cysts \\/ masses: __________________\\nHydronephrosis: __________________\"},{\"parameter_name\":\"Left Kidney\",\"result\":\"Size: __________ \\u00d7 __________ cm\\nCorticomedullary differentiation: __________________\\nStones \\/ cysts \\/ masses: __________________\\nHydronephrosis: __________________\"},{\"parameter_name\":\"Adrenals\",\"result\":\"Right adrenal: __________________\\nLeft adrenal: __________________\"},{\"parameter_name\":\"Urinary Bladder & Pelvis\",\"result\":\"Wall thickness \\/ contour: __________________\\nLesions \\/ trabeculation: __________________\\nPost-void residual: __________________\"},{\"parameter_name\":\"Vessels & Retroperitoneum\",\"result\":\"Abdominal aorta: Diameter __________ mm, plaques \\/ aneurysm: __________________\\nIVC: __________________\\nPara-aortic lymph nodes: __________________\"},{\"parameter_name\":\"Peritoneum \\/ Others\",\"result\":\"Free fluid \\/ ascites: __________________\\nAny masses: __________________\"}],\"impression\":\"1. Liver, gallbladder, pancreas, spleen, kidneys, and urinary bladder appear normal.\\n2. No focal lesion or abnormal fluid collection seen.\\n3. No evidence of hydronephrosis or biliary obstruction.\"}', '2025-10-04 06:19:34', '2025-10-04 07:23:32');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `position` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `title`, `link`, `image`, `position`, `created_at`, `updated_at`) VALUES
(1, 'District Committees', 'https://bdmppa.org/', 'links/1.png', 'footer', '2025-08-27 12:05:40', '2025-08-27 12:05:40'),
(2, 'Membership', 'https://bdmppa.org/', 'links/2.png', 'footer', '2025-08-27 12:05:40', '2025-08-27 12:05:40'),
(3, 'CEO’s Message', 'https://bdmppa.org/', 'links/3.png', 'footer', '2025-08-27 12:05:40', '2025-08-27 12:05:40'),
(4, 'Events & Seminars', 'https://bdmppa.org/', 'links/4.png', 'footer', '2025-08-27 12:05:40', '2025-08-27 12:05:40'),
(5, 'Pharmacist Directory', 'https://bdmppa.org/', 'links/5.png', 'right', '2025-08-27 12:05:40', '2025-08-27 12:05:40'),
(6, 'District Committees', 'https://bdmppa.org/', 'links/6.png', 'right', '2025-08-27 12:05:40', '2025-08-27 12:05:40'),
(7, 'Accident & Emergency', 'https://bdmppa.org/', 'links/1.png', 'right', '2025-08-27 12:05:40', '2025-08-27 12:05:40'),
(8, 'Achievement & Success', 'https://bdmppa.org/', 'links/2.png', 'right', '2025-08-27 12:05:40', '2025-08-27 12:05:40'),
(9, 'Membership', 'http://127.0.0.1:8000/course', 'links/3.png', 'footer', '2025-08-27 12:05:40', '2025-08-27 12:05:40'),
(10, 'Courses & Training', 'http://127.0.0.1:8000/gallary', 'links/4.png', 'footer', '2025-08-27 12:05:40', '2025-08-27 12:05:40'),
(11, 'Events & Seminars', '/', 'links/5.png', 'left', '2025-08-27 12:05:40', '2025-08-27 12:05:40'),
(12, 'News & Notices', 'https://bdmppa.org/', 'links/6.png', 'left', '2025-08-27 12:05:40', '2025-08-27 12:05:40'),
(13, 'CEO’s Message', 'https://bdmppa.org/', 'links/1.png', 'left', '2025-08-27 12:05:40', '2025-08-27 12:05:40'),
(14, 'President’s Message', 'https://bdmppa.org/', 'links/2.png', 'left', '2025-08-27 12:05:40', '2025-08-27 12:05:40'),
(15, 'Executive Committee', 'https://bdmppa.org/', 'links/3.png', 'left', '2025-08-27 12:05:40', '2025-08-27 12:05:40');

-- --------------------------------------------------------

--
-- Table structure for table `marketings`
--

CREATE TABLE `marketings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marketings`
--

INSERT INTO `marketings` (`id`, `name`, `gender`, `date_of_birth`, `image`, `phone`, `address`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Diya', 'female', '1995-01-01', NULL, '01800000000', 'Dhaka', 1, '2025-08-27 18:31:12', '2025-09-09 00:56:34');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `phone`, `email`, `message`, `created_at`, `updated_at`) VALUES
(2, 'Arif', '01601153971', 'shariful971@gmail.com', 'For further information about our organization, please contact us via email', '2025-09-22 07:59:25', '2025-09-22 07:59:25'),
(3, 'Razu Islam', '01300116409', 'arifalmus9@gmail.com', 'For further information about our organization, please contact us via emailFor further information about our organization, please contact us via email', '2025-09-23 08:00:08', '2025-09-23 08:00:08'),
(4, 'MD SHARIFUL ISLAM', '01601153971', 'shariful971@gmail.com', 'Skyline Software BD\nSadar Dinajpur\nMob:+8801601153971', '2025-09-26 08:04:41', '2025-09-26 08:04:41');

-- --------------------------------------------------------

--
-- Table structure for table `message_replies`
--

CREATE TABLE `message_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `reply` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `message_replies`
--

INSERT INTO `message_replies` (`id`, `message_id`, `user_id`, `reply`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 'ok', '2025-09-22 07:59:35', '2025-09-22 07:59:35'),
(3, 2, 1, 'ok', '2025-09-22 08:01:28', '2025-09-22 08:01:28'),
(4, 3, 1, 'From Vision Software', '2025-09-23 08:06:01', '2025-09-23 08:06:01');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_07_04_061454_create_pages_table', 1),
(5, '2025_07_04_153751_create_sliders_table', 1),
(6, '2025_07_05_152310_create_blogs_table', 1),
(7, '2025_07_05_182944_create_commanders_table', 1),
(8, '2025_07_05_192622_create_links_table', 1),
(9, '2025_07_06_175740_create_teams_table', 1),
(10, '2025_07_08_164240_create_notices_table', 1),
(11, '2025_07_10_162336_create_videos_table', 1),
(12, '2025_07_11_121101_create_courses_table', 1),
(13, '2025_07_11_135647_create_messages_table', 1),
(14, '2025_07_11_153140_create_settings_table', 1),
(15, '2025_07_14_142112_create_sidebars_table', 1),
(16, '2025_07_17_160338_create_smtps_table', 1),
(17, '2025_07_26_145042_create_permission_tables', 1),
(18, '2025_08_01_131654_create_message_replies_table', 1),
(19, '2025_08_07_182301_create_patients_table', 1),
(20, '2025_08_07_202120_create_investigations_table', 1),
(21, '2025_08_09_122950_create_bills_table', 1),
(22, '2025_08_09_123122_create_reports_table', 1),
(23, '2025_08_09_123309_create_billitems_table', 1),
(24, '2025_08_15_162800_create_doctors_table', 1),
(25, '2025_08_17_184342_create_marketings_table', 1),
(26, '2025_08_18_142450_create_expense_categories_table', 1),
(27, '2025_08_18_142724_create_expenses_table', 1),
(28, '2025_08_22_172938_create_billhistories_table', 1),
(29, '2025_09_19_191131_create_bolg_categories_table', 2),
(30, '2025_09_20_135741_create_departments_table', 3),
(31, '2025_09_30_184635_create_activity_logs_table', 4);

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
(3, 'App\\Models\\User', 2),
(4, 'App\\Models\\User', 3),
(5, 'App\\Models\\User', 4),
(6, 'App\\Models\\User', 8);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `file` varchar(2555) DEFAULT '0',
  `authority` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'notice',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `title`, `description`, `image`, `file`, `authority`, `type`, `created_at`, `updated_at`) VALUES
(1, 'EXECUTIVE HEALTH CHECK-UP Male / Female', '<p class=\"mt-5\" style=\"box-sizing: border-box; margin-top: 3rem !important; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: none; outline: 0px; font-size: 15px; line-height: 26px; color: rgb(102, 102, 102); font-weight: 400;\"><b style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: none; font-weight: 700; outline: 0px; font-size: 15px;\">PREPARATION FOR HEALTH CHECK<b style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: none; font-weight: 700; outline: 0px; font-size: 15px;\"></b></b></p><p class=\"mt-3\" style=\"box-sizing: border-box; margin-top: 1rem !important; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: none; outline: 0px; font-size: 15px; line-height: 26px; color: rgb(102, 102, 102); font-weight: 400;\"><b style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: none; font-weight: 700; outline: 0px; font-size: 15px;\">GENERAL INSTRUCTIONS:<b style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: none; font-weight: 700; outline: 0px; font-size: 15px;\"></b></b></p><p class=\"mt-5\" style=\"box-sizing: border-box; margin-top: 3rem !important; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: none; outline: 0px; font-size: 15px; line-height: 26px; color: rgb(102, 102, 102); font-weight: 400;\"><span style=\"border: none; font-weight: 700; outline: 0px; font-size: 16px; color: rgb(54, 54, 54); font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"border: none; font-weight: 700; outline: 0px;\"></span></span></p><ul class=\"pl-5\" style=\"box-sizing: border-box; margin: 9px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 3rem !important; border: none; list-style: none; outline: 0px; font-size: 16px;\"><li style=\"box-sizing: border-box; margin: 9px 9px 9px 0px; padding: 2px 0px 0px; border: none; outline: 0px; font-size: 14px; font-weight: 600;\">Please fast for 9-12 hours prior to your appointment and do not take any alcohol, cigarettes, tobacco or any other liquid (except plain water) during this time.</li><li style=\"box-sizing: border-box; margin: 9px 9px 9px 0px; padding: 2px 0px 0px; border: none; outline: 0px; font-size: 14px; font-weight: 600;\">Please inform the EHC front desk if you have any history of Diabetes, Heart Diseases, High Blood Pressure, Thyroid Disease, etc.</li><li style=\"box-sizing: border-box; margin: 9px 9px 9px 0px; padding: 2px 0px 0px; border: none; outline: 0px; font-size: 14px; font-weight: 600;\">You are requested to take your regular medication in the night before the EHC package. If you are on any medications, kindly bring it along with you and take it after giving fasting sample.</li><li style=\"box-sizing: border-box; margin: 9px 9px 9px 0px; padding: 2px 0px 0px; border: none; outline: 0px; font-size: 14px; font-weight: 600;\">Please bring all your medical prescriptions and previous medical records with you.</li><li style=\"box-sizing: border-box; margin: 9px 9px 9px 0px; padding: 2px 0px 0px; border: none; outline: 0px; font-size: 14px; font-weight: 600;\">Please wear two pieces of loose, comfortable clothing and sports shoes/sandals if possible, as you need to change clothes for X-Ray, Ultrasonography, ECG, Echo, TMT, BMD and Mammography.</li></ul>', 'notices/WMEsC41U4IkCmp5YtdnBo3fIzuL39XQPL3H0FJTG.png', NULL, 'Sharif', 'notice', '2025-08-27 12:05:40', '2025-09-22 05:58:35'),
(2, 'WHOLE BODY CHECK-UP Male - Age below 45 yrs', '<p class=\"mt-5 font-weight-bold\" style=\"box-sizing: border-box; margin-top: 3rem !important; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: none; outline: 0px; font-size: 15px; line-height: 26px; color: rgb(102, 102, 102); font-weight: 700 !important;\">SPECIAL INSTRUCTIONS FOR WOMEN:</p><p class=\"mt-3\" style=\"box-sizing: border-box; margin-top: 1rem !important; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: none; outline: 0px; font-size: 15px; line-height: 26px; color: rgb(102, 102, 102); font-weight: 400;\">Pregnant women or those expecting to conceive are advised to inform officers at the EHC front desk not to undergo any X-Ray test.</p><p class=\"mt-5 font-weight-bold\" style=\"box-sizing: border-box; margin-top: 3rem !important; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: none; outline: 0px; font-size: 15px; line-height: 26px; color: rgb(102, 102, 102); font-weight: 700 !important;\">SPECIAL INSTRUCTIONS FOR TMT (TREADMILL TEST):</p><p style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: none; outline: 0px; font-size: 15px; line-height: 26px; color: rgb(102, 102, 102); font-weight: 400;\"></p><p class=\"mt-3\" style=\"box-sizing: border-box; margin-top: 1rem !important; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: none; outline: 0px; font-size: 15px; line-height: 26px; color: rgb(102, 102, 102); font-weight: 400;\">If you need to eat before TMT (Treadmill Test), then eat a light snack only. If you are suffering from any chest pain or breathing difficulty, please notify the Technician or physician in advance. Wear or bring sport shoe for the procedure.</p><p class=\"mt-5 font-weight-bold\" style=\"box-sizing: border-box; margin-top: 3rem !important; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: none; outline: 0px; font-size: 15px; line-height: 26px; color: rgb(102, 102, 102); font-weight: 700 !important;\">SPECIAL INSTRUCTIONS FOR ABDOMINAL ULTRASONOGRAPHY:</p><p style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: none; outline: 0px; font-size: 15px; line-height: 26px; color: rgb(102, 102, 102); font-weight: 400;\"></p><p><span style=\"border: none; font-weight: 700; outline: 0px; color: rgb(54, 54, 54); font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"border: none; font-weight: 700; outline: 0px;\"></span></span></p><p class=\"mt-3\" style=\"box-sizing: border-box; margin-top: 1rem !important; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: none; outline: 0px; font-size: 15px; line-height: 26px; color: rgb(102, 102, 102); font-weight: 400;\">Drink plenty of water before Ultrasonography. The test requires a full bladder for best results. Do not void urine prior to Ultrasonography.</p>', 'notices/atAtqicK92eTnPFHbLibh26Db38bi4yJFloV1FJo.png', NULL, 'Sharif', 'notice', '2025-08-27 12:05:40', '2025-09-22 05:32:32'),
(3, 'DIABETIC CHECK-UP Male / Female', '<p style=\"border: none; outline: 0px; font-size: 15px; line-height: 26px; color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"border: none; font-weight: 700; outline: 0px;\">FEW IMPORTANT FACTS<span style=\"border: none; font-weight: 700; outline: 0px;\"></span></span></p><p><span style=\"border: none; font-weight: 700; outline: 0px; color: rgb(54, 54, 54); font-family: &quot;Open Sans&quot;, sans-serif;\"><span style=\"border: none; font-weight: 700; outline: 0px;\"></span></span></p><p style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: none; outline: 0px; font-size: 15px; line-height: 26px; color: rgb(102, 102, 102); font-weight: 400;\">Executive Health Check (EHC) counter is open every day from 8:00 am to 4:00 pm. Reporting to the EHC front desk for availing EHC packages must be completed by 10:00 am. Report will be delivered on the same day after 3:00 pm (only if the EHC process starts by 10:00 am). In case of PapSmear (female), FT4 etc. reports will be delivered on the following day.</p>', 'notices/48v0z5xQMrAgB1e7jotrNn33gc5Bi2CsgpSplJV2.png', NULL, 'Sharif', 'notice', '2025-08-27 12:05:40', '2025-09-22 05:35:13'),
(5, 'Pharmacy Law and Ethics in Bangladesh Healthcare System', '<p>Learn about the Pharmacy Act, drug policies, and ethical responsibilities in pharmaceutical practice. This course helps pharmacists understand legal boundaries, licensing, and ethical dilemmas they may face. BDMPPA aims to create a legally aware and ethically strong pharmacist community through this program.</p>', NULL, 'notices/1.pdf', 'Sura', 'apa', '2025-08-27 12:05:40', '2025-08-27 12:05:40'),
(6, 'Essential Pharmacology for Diploma Pharmacists', '<p>This refresher course covers drug classifications, mechanisms of action, and side effects of commonly used medications in Bangladesh. Ideal for practicing pharmacists needing updated knowledge to ensure safe and effective patient care, especially in rural or low-resource settings.</p>', NULL, 'notices/1.pdf', 'Sura', 'noc', '2025-08-27 12:05:40', '2025-08-27 12:05:40');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'QR Code', 'mission-vision', '<p>মোবাইল দিয়ে QR Code স্ক্যান করে সহজেই Online এ রিপোর্ট দেখতে পারবেন ।</p>', 'pages/qr-code-1759249229.png', '2025-08-27 12:05:40', '2025-09-30 10:20:29'),
(2, 'Auto SMS', 'executive-committee', '<p>রিপোর্ট হয়ে গেলে ফোন এ Automatic SMS চলে যাবে ।&nbsp;</p>', 'pages/auto-sms-1759249623.png', '2025-08-27 12:05:40', '2025-09-30 10:27:03'),
(3, 'About Skyline BD', 'about-bdmppa', '<p>BDMPPA is a non-political, non-profit association committed to the advancement of diploma medical pharmacists across Bangladesh. Our goal is to empower professionals, uphold ethical standards, and strengthen the healthcare system. We believe that pharmacists are a vital part of primary healthcare, and we work to ensure they receive proper recognition, training, and representation in health policy. Through awareness, leadership, and nationwide networking, BDMPPA stands as a united platform for change and development. Every member is encouraged to actively participate and contribute to our mission of building a healthier Bangladesh through competent pharmacy services.</p>', 'pages/about-skyline-bd-1759249740.png', '2025-08-27 12:05:40', '2025-09-30 10:29:00');

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
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `patient_id` varchar(255) DEFAULT NULL,
  `type` enum('patient','employee') NOT NULL DEFAULT 'patient',
  `image` varchar(255) DEFAULT NULL,
  `note` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `gender`, `date_of_birth`, `phone`, `address`, `patient_id`, `type`, `image`, `note`, `created_at`, `updated_at`) VALUES
(1, 'Vision', 'female', '1995-01-01', '01721763115', 'Khodmadhobpur,Sadar,Dinajpur', 'H25-000001', 'patient', 'patients/sanjita-1758363603.jpg', '<p>চিকিৎসক আমার সমস্যাগুলো খুব ভালোভাবে শুনে যথাযথ চিকিৎসা দিয়েছেন। তাদের পেশাদারিত্ব দেখে আমি খুবই খুশি। ধন্যবাদ আপনাদের।&nbsp;চিকিৎসক আমার সমস্যাগুলো খুব ভালোভাবে শুনে যথাযথ চিকিৎসা দিয়েছেন। তাদের পেশাদারিত্ব দেখে আমি খুবই খুশি। ধন্যবাদ আপনাদের।</p>', '2025-08-27 18:07:49', '2025-10-05 19:12:14'),
(2, 'MD SHARIFUL ISLAM', 'male', '1988-01-01', '01601153971', 'Jatrabari Tony Tower', 'H25-000002', 'patient', NULL, '<p>আমি প্রথম থেকেই নিরাপদ ও আরামদায়ক পরিবেশে চিকিৎসা পেয়েছি। এখানে সবাই খুবই বন্ধুভাবাপন্ন এবং সহানুভূতিশীল। আমার অভিজ্ঞতা সত্যিই খুব ভালো।</p><p>আমি প্রথম থেকেই নিরাপদ ও আরামদায়ক পরিবেশে চিকিৎসা পেয়েছি। এখানে সবাই খুবই বন্ধুভাবাপন্ন এবং সহানুভূতিশীল। আমার অভিজ্ঞতা সত্যিই খুব ভালো।</p>', '2025-08-27 18:08:10', '2025-09-20 04:10:41'),
(3, 'Razu Islam', 'male', '1987-01-01', '01300116409 ', '111/1/A Distillery Road Dhaka', 'H25-000003', 'patient', 'patients/razu-islam-1756690854.jpg', '<p>ডাক্তার ও স্টাফদের মনোযোগ ও যত্নের কারণে আমার শারীরিক অবস্থা দ্রুত ভালো হয়েছে। চিকিৎসা প্রক্রিয়া সম্পূর্ণরূপে সন্তোষজনক ছিল।ডাক্তার ও স্টাফদের মনোযোগ ও যত্নের কারণে আমার শারীরিক অবস্থা দ্রুত ভালো হয়েছে। চিকিৎসা প্রক্রিয়া সম্পূর্ণরূপে সন্তোষজনক ছিল।</p>', '2025-08-27 18:08:40', '2025-09-20 04:10:16'),
(4, 'Tarikul Hamid', 'male', '1970-01-01', '0197885662', 'Dhaka', 'H25-000004', 'employee', NULL, NULL, '2025-08-31 08:22:17', '2025-08-31 19:57:19'),
(5, 'Sazu Islam', 'male', '2003-01-01', '01749698933', 'Narinda,Wari,Dhaka-1204', 'H25-000005', 'employee', 'patients/sazu-islam-1756690825.png', NULL, '2025-08-31 19:16:20', '2025-08-31 19:56:46'),
(6, 'Tanjila Tania', 'female', '2000-01-01', '01800000000', 'Patuyakhali,Narail', 'H25-000006', 'patient', 'patients/tanjila-tania-1758472668.png', '<p>চিকিৎসা প্রক্রিয়া খুবই পেশাদারিভাবে সম্পন্ন হয়েছে। রোগ সম্পর্কে পরিষ্কারভাবে জানিয়ে আমাকে আশা দিয়েছেন, যা আমার সুস্থতায় বড় ভূমিকা রেখেছে।</p>', '2025-09-07 07:51:15', '2025-09-21 10:37:48'),
(7, 'Anuja Biswas', 'female', '2003-01-01', '01300000000', 'Faridpur', 'H25-000007', 'patient', 'patients/anuja-biswas-1758363585.jpg', '<p><br></p>', '2025-09-07 08:00:39', '2025-09-20 04:29:12'),
(8, 'Raihan', 'male', '1995-01-01', '01721763115', 'Dinajpur', 'H25-000008', 'patient', NULL, '<p>ডাক্তারের পরামর্শ ও চিকিৎসা পেয়ে আমি অনেক দ্রুত সুস্থ হয়ে উঠেছি। এখানে সেবা পেয়ে খুবই সন্তুষ্ট। সবাইকে আমি এখানকার চিকিৎসা নিতে পরামর্শ দিব।</p>', '2025-09-09 01:20:07', '2025-09-20 04:07:24'),
(9, 'Sazu Islam', 'male', '2004-01-01', '01738153971', 'Khodmadhobpur,Dinajpur', 'H25-000009', 'patient', NULL, NULL, '2025-09-24 07:28:41', '2025-09-24 07:38:10'),
(10, 'Rita Akter', 'female', '2000-01-01', '01902682617', 'Khodmadhobpur,Sadar,Dinajpur', 'H25-000010', 'patient', NULL, NULL, '2025-10-05 19:37:13', '2025-10-05 19:39:55');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'dashboard.view', 'web', 'dashboard', '2025-08-27 12:05:34', '2025-08-27 12:05:34'),
(2, 'doctors.view', 'web', 'doctors', '2025-08-27 12:05:34', '2025-08-27 12:05:34'),
(3, 'doctors.add', 'web', 'doctors', '2025-08-27 12:05:34', '2025-08-27 12:05:34'),
(4, 'doctors.edit', 'web', 'doctors', '2025-08-27 12:05:34', '2025-08-27 12:05:34'),
(5, 'doctors.delete', 'web', 'doctors', '2025-08-27 12:05:35', '2025-08-27 12:05:35'),
(6, 'patients.view', 'web', 'patients', '2025-08-27 12:05:35', '2025-08-27 12:05:35'),
(7, 'patients.add', 'web', 'patients', '2025-08-27 12:05:35', '2025-08-27 12:05:35'),
(8, 'patients.edit', 'web', 'patients', '2025-08-27 12:05:35', '2025-08-27 12:05:35'),
(9, 'patients.delete', 'web', 'patients', '2025-08-27 12:05:35', '2025-08-27 12:05:35'),
(10, 'reports_delivery.view', 'web', 'reports_delivery', '2025-08-27 12:05:35', '2025-08-27 12:05:35'),
(11, 'bill.view', 'web', 'bill', '2025-08-27 12:05:35', '2025-08-27 12:05:35'),
(12, 'bill.add', 'web', 'bill', '2025-08-27 12:05:35', '2025-08-27 12:05:35'),
(13, 'bill_history.view', 'web', 'bill_history', '2025-08-27 12:05:35', '2025-08-27 12:05:35'),
(14, 'bill_history.invoice', 'web', 'bill_history', '2025-08-27 12:05:35', '2025-08-27 12:05:35'),
(15, 'invoice.view', 'web', 'invoice', '2025-08-27 12:05:35', '2025-08-27 12:05:35'),
(16, 'invoice.invoice', 'web', 'invoice', '2025-08-27 12:05:35', '2025-08-27 12:05:35'),
(17, 'invoice.edit', 'web', 'invoice', '2025-08-27 12:05:35', '2025-08-27 12:05:35'),
(18, 'reports.view', 'web', 'reports', '2025-08-27 12:05:35', '2025-08-27 12:05:35'),
(19, 'reports.test', 'web', 'reports', '2025-08-27 12:05:35', '2025-08-27 12:05:35'),
(20, 'investigations.view', 'web', 'investigations', '2025-08-27 12:05:35', '2025-08-27 12:05:35'),
(21, 'investigations.add', 'web', 'investigations', '2025-08-27 12:05:35', '2025-08-27 12:05:35'),
(22, 'investigations.edit', 'web', 'investigations', '2025-08-27 12:05:35', '2025-08-27 12:05:35'),
(23, 'investigations.delete', 'web', 'investigations', '2025-08-27 12:05:35', '2025-08-27 12:05:35'),
(24, 'investigation_form.view', 'web', 'investigation_form', '2025-08-27 12:05:35', '2025-08-27 12:05:35'),
(25, 'investigation_form.edit', 'web', 'investigation_form', '2025-08-27 12:05:35', '2025-08-27 12:05:35'),
(26, 'expenses.view', 'web', 'expenses', '2025-08-27 12:05:35', '2025-08-27 12:05:35'),
(27, 'expenses.add', 'web', 'expenses', '2025-08-27 12:05:35', '2025-08-27 12:05:35'),
(28, 'expenses.edit', 'web', 'expenses', '2025-08-27 12:05:35', '2025-08-27 12:05:35'),
(29, 'expenses.delete', 'web', 'expenses', '2025-08-27 12:05:35', '2025-08-27 12:05:35'),
(30, 'expense_category.view', 'web', 'expense_category', '2025-08-27 12:05:35', '2025-08-27 12:05:35'),
(31, 'expense_category.add', 'web', 'expense_category', '2025-08-27 12:05:35', '2025-08-27 12:05:35'),
(32, 'expense_category.edit', 'web', 'expense_category', '2025-08-27 12:05:35', '2025-08-27 12:05:35'),
(33, 'expense_category.delete', 'web', 'expense_category', '2025-08-27 12:05:35', '2025-08-27 12:05:35'),
(34, 'marketings.view', 'web', 'marketings', '2025-08-27 12:05:35', '2025-08-27 12:05:35'),
(35, 'marketings.add', 'web', 'marketings', '2025-08-27 12:05:35', '2025-08-27 12:05:35'),
(36, 'marketings.edit', 'web', 'marketings', '2025-08-27 12:05:35', '2025-08-27 12:05:35'),
(37, 'marketings.delete', 'web', 'marketings', '2025-08-27 12:05:35', '2025-08-27 12:05:35'),
(38, 'commisions.view', 'web', 'commisions', '2025-08-27 12:05:36', '2025-08-27 12:05:36'),
(39, 'commisions.edit', 'web', 'commisions', '2025-08-27 12:05:36', '2025-08-27 12:05:36'),
(40, 'pages.view', 'web', 'pages', '2025-08-27 12:05:36', '2025-08-27 12:05:36'),
(41, 'pages.add', 'web', 'pages', '2025-08-27 12:05:36', '2025-08-27 12:05:36'),
(42, 'pages.edit', 'web', 'pages', '2025-08-27 12:05:36', '2025-08-27 12:05:36'),
(43, 'pages.delete', 'web', 'pages', '2025-08-27 12:05:36', '2025-08-27 12:05:36'),
(44, 'sliders.view', 'web', 'sliders', '2025-08-27 12:05:36', '2025-08-27 12:05:36'),
(45, 'sliders.add', 'web', 'sliders', '2025-08-27 12:05:36', '2025-08-27 12:05:36'),
(46, 'sliders.edit', 'web', 'sliders', '2025-08-27 12:05:36', '2025-08-27 12:05:36'),
(47, 'sliders.delete', 'web', 'sliders', '2025-08-27 12:05:36', '2025-08-27 12:05:36'),
(48, 'gallery.view', 'web', 'gallery', '2025-08-27 12:05:36', '2025-08-27 12:05:36'),
(49, 'gallery.add', 'web', 'gallery', '2025-08-27 12:05:36', '2025-08-27 12:05:36'),
(50, 'gallery.edit', 'web', 'gallery', '2025-08-27 12:05:36', '2025-08-27 12:05:36'),
(51, 'gallery.delete', 'web', 'gallery', '2025-08-27 12:05:36', '2025-08-27 12:05:36'),
(52, 'blogs.view', 'web', 'blogs', '2025-08-27 12:05:36', '2025-08-27 12:05:36'),
(53, 'blogs.add', 'web', 'blogs', '2025-08-27 12:05:36', '2025-08-27 12:05:36'),
(54, 'blogs.edit', 'web', 'blogs', '2025-08-27 12:05:36', '2025-08-27 12:05:36'),
(55, 'blogs.delete', 'web', 'blogs', '2025-08-27 12:05:36', '2025-08-27 12:05:36'),
(56, 'commanders.view', 'web', 'commanders', '2025-08-27 12:05:36', '2025-08-27 12:05:36'),
(57, 'commanders.add', 'web', 'commanders', '2025-08-27 12:05:36', '2025-08-27 12:05:36'),
(58, 'commanders.edit', 'web', 'commanders', '2025-08-27 12:05:36', '2025-08-27 12:05:36'),
(59, 'commanders.delete', 'web', 'commanders', '2025-08-27 12:05:36', '2025-08-27 12:05:36'),
(60, 'links.view', 'web', 'links', '2025-08-27 12:05:36', '2025-08-27 12:05:36'),
(61, 'links.add', 'web', 'links', '2025-08-27 12:05:36', '2025-08-27 12:05:36'),
(62, 'links.delete', 'web', 'links', '2025-08-27 12:05:36', '2025-08-27 12:05:36'),
(63, 'teams.view', 'web', 'teams', '2025-08-27 12:05:37', '2025-08-27 12:05:37'),
(64, 'teams.add', 'web', 'teams', '2025-08-27 12:05:37', '2025-08-27 12:05:37'),
(65, 'teams.edit', 'web', 'teams', '2025-08-27 12:05:37', '2025-08-27 12:05:37'),
(66, 'teams.delete', 'web', 'teams', '2025-08-27 12:05:37', '2025-08-27 12:05:37'),
(67, 'courses.view', 'web', 'courses', '2025-08-27 12:05:37', '2025-08-27 12:05:37'),
(68, 'courses.add', 'web', 'courses', '2025-08-27 12:05:37', '2025-08-27 12:05:37'),
(69, 'courses.edit', 'web', 'courses', '2025-08-27 12:05:37', '2025-08-27 12:05:37'),
(70, 'courses.delete', 'web', 'courses', '2025-08-27 12:05:37', '2025-08-27 12:05:37'),
(71, 'notice.view', 'web', 'notice', '2025-08-27 12:05:37', '2025-08-27 12:05:37'),
(72, 'notice.add', 'web', 'notice', '2025-08-27 12:05:37', '2025-08-27 12:05:37'),
(73, 'notice.edit', 'web', 'notice', '2025-08-27 12:05:37', '2025-08-27 12:05:37'),
(74, 'notice.delete', 'web', 'notice', '2025-08-27 12:05:37', '2025-08-27 12:05:37'),
(75, 'noc.view', 'web', 'noc', '2025-08-27 12:05:37', '2025-08-27 12:05:37'),
(76, 'noc.add', 'web', 'noc', '2025-08-27 12:05:37', '2025-08-27 12:05:37'),
(77, 'noc.edit', 'web', 'noc', '2025-08-27 12:05:37', '2025-08-27 12:05:37'),
(78, 'noc.delete', 'web', 'noc', '2025-08-27 12:05:37', '2025-08-27 12:05:37'),
(79, 'apa.view', 'web', 'apa', '2025-08-27 12:05:37', '2025-08-27 12:05:37'),
(80, 'apa.add', 'web', 'apa', '2025-08-27 12:05:37', '2025-08-27 12:05:37'),
(81, 'apa.edit', 'web', 'apa', '2025-08-27 12:05:37', '2025-08-27 12:05:37'),
(82, 'apa.delete', 'web', 'apa', '2025-08-27 12:05:37', '2025-08-27 12:05:37'),
(83, 'videos.view', 'web', 'videos', '2025-08-27 12:05:37', '2025-08-27 12:05:37'),
(84, 'videos.add', 'web', 'videos', '2025-08-27 12:05:38', '2025-08-27 12:05:38'),
(85, 'videos.delete', 'web', 'videos', '2025-08-27 12:05:38', '2025-08-27 12:05:38'),
(86, 'statement.view', 'web', 'statement', '2025-08-27 12:05:38', '2025-08-27 12:05:38'),
(87, 'statement.edit', 'web', 'statement', '2025-08-27 12:05:38', '2025-08-27 12:05:38'),
(88, 'messages.view', 'web', 'messages', '2025-08-27 12:05:38', '2025-08-27 12:05:38'),
(89, 'messages.delete', 'web', 'messages', '2025-08-27 12:05:38', '2025-08-27 12:05:38'),
(90, 'users.view', 'web', 'users', '2025-08-27 12:05:38', '2025-08-27 12:05:38'),
(91, 'users.add', 'web', 'users', '2025-08-27 12:05:38', '2025-08-27 12:05:38'),
(92, 'users.edit', 'web', 'users', '2025-08-27 12:05:38', '2025-08-27 12:05:38'),
(93, 'users.delete', 'web', 'users', '2025-08-27 12:05:38', '2025-08-27 12:05:38'),
(94, 'roles.view', 'web', 'roles', '2025-08-27 12:05:38', '2025-08-27 12:05:38'),
(95, 'roles.add', 'web', 'roles', '2025-08-27 12:05:38', '2025-08-27 12:05:38'),
(96, 'roles.edit', 'web', 'roles', '2025-08-27 12:05:38', '2025-08-27 12:05:38'),
(97, 'roles.delete', 'web', 'roles', '2025-08-27 12:05:38', '2025-08-27 12:05:38'),
(98, 'permissions.view', 'web', 'permissions', '2025-08-27 12:05:38', '2025-08-27 12:05:38'),
(99, 'permissions.add', 'web', 'permissions', '2025-08-27 12:05:38', '2025-08-27 12:05:38'),
(100, 'permissions.edit', 'web', 'permissions', '2025-08-27 12:05:38', '2025-08-27 12:05:38'),
(101, 'permissions.delete', 'web', 'permissions', '2025-08-27 12:05:38', '2025-08-27 12:05:38'),
(102, 'application_settings.view', 'web', 'application_settings', '2025-08-27 12:05:38', '2025-08-27 12:05:38'),
(103, 'settings/logo_&_identity.view', 'web', 'settings/logo_&_identity', '2025-08-27 12:05:39', '2025-08-27 12:05:39'),
(104, 'settings/logo_&_identity.edit', 'web', 'settings/logo_&_identity', '2025-08-27 12:05:39', '2025-08-27 12:05:39'),
(105, 'settings/header_setting.view', 'web', 'settings/header_setting', '2025-08-27 12:05:39', '2025-08-27 12:05:39'),
(106, 'settings/header_setting.edit', 'web', 'settings/header_setting', '2025-08-27 12:05:39', '2025-08-27 12:05:39'),
(107, 'settings/footer_setting.view', 'web', 'settings/footer_setting', '2025-08-27 12:05:39', '2025-08-27 12:05:39'),
(108, 'settings/footer_setting.add', 'web', 'settings/footer_setting', '2025-08-27 12:05:39', '2025-08-27 12:05:39'),
(109, 'settings/footer_setting.edit', 'web', 'settings/footer_setting', '2025-08-27 12:05:39', '2025-08-27 12:05:39'),
(110, 'settings/footer_setting.delete', 'web', 'settings/footer_setting', '2025-08-27 12:05:39', '2025-08-27 12:05:39'),
(111, 'settings/sidebar.view', 'web', 'settings/sidebar', '2025-08-27 12:05:39', '2025-08-27 12:05:39'),
(112, 'settings/sidebar.add', 'web', 'settings/sidebar', '2025-08-27 12:05:39', '2025-08-27 12:05:39'),
(113, 'settings/sidebar.delete', 'web', 'settings/sidebar', '2025-08-27 12:05:39', '2025-08-27 12:05:39'),
(114, 'settings/academic_information.view', 'web', 'settings/academic_information', '2025-08-27 12:05:39', '2025-08-27 12:05:39'),
(115, 'settings/academic_information.edit', 'web', 'settings/academic_information', '2025-08-27 12:05:39', '2025-08-27 12:05:39'),
(116, 'settings/contact_setting.view', 'web', 'settings/contact_setting', '2025-08-27 12:05:39', '2025-08-27 12:05:39'),
(117, 'settings/contact_setting.edit', 'web', 'settings/contact_setting', '2025-08-27 12:05:39', '2025-08-27 12:05:39'),
(118, 'settings/smtp.view', 'web', 'settings/smtp', '2025-08-27 12:05:39', '2025-08-27 12:05:39'),
(119, 'settings/smtp.edit', 'web', 'settings/smtp', '2025-08-27 12:05:39', '2025-08-27 12:05:39'),
(120, 'employees.view', 'web', 'employees', '2025-09-09 09:21:12', '2025-09-09 09:21:12'),
(121, 'employees.add', 'web', 'employees', '2025-09-09 09:21:22', '2025-09-09 09:21:22'),
(122, 'employees.edit', 'web', 'employees', '2025-09-09 09:21:30', '2025-09-09 09:21:30'),
(123, 'employees.delete', 'web', 'employees', '2025-09-09 09:21:39', '2025-09-09 09:21:39'),
(124, 'activity.view', 'web', 'activity', '2025-10-03 16:32:25', '2025-10-03 16:32:25'),
(125, 'report_signature.view', 'web', 'report/signature', '2025-10-03 16:38:58', '2025-10-03 16:38:58');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_id` bigint(20) UNSIGNED NOT NULL,
  `investigation_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `test_form` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`test_form`)),
  `xray_form` longtext DEFAULT NULL,
  `usg_form` longtext DEFAULT NULL,
  `test_category_name` varchar(255) DEFAULT NULL,
  `prepared_by` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`prepared_by`)),
  `authorized_by` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`authorized_by`)),
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `delivered` tinyint(1) NOT NULL DEFAULT 0,
  `delivered_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `bill_id`, `investigation_id`, `patient_id`, `test_form`, `xray_form`, `usg_form`, `test_category_name`, `prepared_by`, `authorized_by`, `status`, `delivered`, `delivered_at`, `created_at`, `updated_at`) VALUES
(257, 123, 261, 8, NULL, NULL, '{\"parameters\":[{\"parameter_name\":\"Liver\",\"result\":\"Size: __________________ cm\\nEchotexture: __________________ (normal \\/ fatty \\/ coarse)\\nSurface: __________________ (smooth \\/ irregular)\\nFocal lesion: __________________ (absent \\/ present \\u2013 describe)\\nIntrahepatic biliary radicals: __________________\\nHepatic vessels & portal vein: __________________\"},{\"parameter_name\":\"Gallbladder & Biliary System\",\"result\":\"Wall thickness: __________ mm\\nStones \\/ sludge \\/ polyps: __________________\\nPericholecystic fluid: __________________\\nCommon bile duct (CBD) diameter: __________ mm\\nIntra \\/ extrahepatic biliary dilatation: __________________\"},{\"parameter_name\":\"Pancreas\",\"result\":\"Size & echotexture: __________________\\nFocal lesion \\/ cyst \\/ calcification: __________________\\nPancreatic duct: __________________\"},{\"parameter_name\":\"Spleen\",\"result\":\"Size: __________ cm\\nEchotexture: __________________\\nFocal lesion: __________________\"},{\"parameter_name\":\"Right Kidney\",\"result\":\"Size: __________ \\u00d7 __________ cm\\nCorticomedullary differentiation: __________________\\nStones \\/ cysts \\/ masses: __________________\\nHydronephrosis: __________________\"},{\"parameter_name\":\"Left Kidney\",\"result\":\"Size: __________ \\u00d7 __________ cm\\nCorticomedullary differentiation: __________________\\nStones \\/ cysts \\/ masses: __________________\\nHydronephrosis: __________________\"},{\"parameter_name\":\"Adrenals\",\"result\":\"Right adrenal: __________________\\nLeft adrenal: __________________\"},{\"parameter_name\":\"Urinary Bladder & Pelvis\",\"result\":\"Wall thickness \\/ contour: __________________\\nLesions \\/ trabeculation: __________________\\nPost-void residual: __________________\"},{\"parameter_name\":\"Vessels & Retroperitoneum\",\"result\":\"Abdominal aorta: Diameter __________ mm, plaques \\/ aneurysm: __________________\\nIVC: __________________\\nPara-aortic lymph nodes: __________________\"},{\"parameter_name\":\"Peritoneum \\/ Others\",\"result\":\"Free fluid \\/ ascites: __________________\\nAny masses: __________________\"}],\"impression\":\"1. Liver, gallbladder, pancreas, spleen, kidneys, and urinary bladder appear normal.\\n2. No focal lesion or abnormal fluid collection seen.\\n3. No evidence of hydronephrosis or biliary obstruction.\"}', 'USG of Whole Abdomen 4D', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-04 09:03:41', '2025-10-04 09:03:41'),
(258, 123, 245, 8, '[{\"parameter_name\":\"Hemoglobin (Hb%)\",\"result\":\"9.4\",\"normal_value\":\"Male: 12-18, Female: 11-16\",\"unit\":\"gm\\/dl\"},{\"parameter_name\":\"ESR\",\"result\":\"15\",\"normal_value\":\"Male: 0-10, Female: 0-15\",\"unit\":\"mm\"},{\"parameter_name\":\"Total WBC Counts\",\"result\":\"1\",\"normal_value\":\"4000-11000\",\"unit\":\"mm\\u00b3\"},{\"parameter_name\":\"Differential Counts\",\"result\":\" \",\"normal_value\":\" \",\"unit\":\"\"},{\"parameter_name\":\"Neutrophils\",\"result\":\"1\",\"normal_value\":\"40-75%\",\"unit\":\"\"},{\"parameter_name\":\"Lymphocytes\",\"result\":\"1\",\"normal_value\":\"20-50%\",\"unit\":\"\"},{\"parameter_name\":\"Monocytes\",\"result\":\"1\",\"normal_value\":\"2-10%\",\"unit\":\"\"},{\"parameter_name\":\"Eosinophils\",\"result\":\"1\",\"normal_value\":\"1-8%\",\"unit\":\"\"},{\"parameter_name\":\"Basophils\",\"result\":\"1\",\"normal_value\":\"0-1%\",\"unit\":\"\"},{\"parameter_name\":\"Total Cir. Eosinophils\",\"result\":\"1\",\"normal_value\":\"50 - 450\",\"unit\":\"cumm\"},{\"parameter_name\":\"RBC COUNT\",\"result\":\"1\",\"normal_value\":\"M: 4.5 - 6.5, F: 3.8 - 5.8\",\"unit\":\"m\\/ul\"},{\"parameter_name\":\"HCT\\/PCV\",\"result\":\"1\",\"normal_value\":\"M: 40 - 54%, F: 37 - 47%\",\"unit\":\"\"},{\"parameter_name\":\"MCV\",\"result\":\"24fl\",\"normal_value\":\"76-94\",\"unit\":\"fL\"},{\"parameter_name\":\"MCH\",\"result\":\"27pg\",\"normal_value\":\"27-32\",\"unit\":\"pg\"},{\"parameter_name\":\"MCHC\",\"result\":\"29g\\/dl\",\"normal_value\":\"29-34\",\"unit\":\"g\\/dL\"},{\"parameter_name\":\"RDW-CV\",\"result\":\"10%\",\"normal_value\":\"10-16%\",\"unit\":\"\"},{\"parameter_name\":\"RDW-SD\",\"result\":\"35\",\"normal_value\":\"35-56\",\"unit\":\"fl\"},{\"parameter_name\":\"Platelet Count\",\"result\":\"1\",\"normal_value\":\"150000-400000\",\"unit\":\"mm\\u00b3\"},{\"parameter_name\":\"MPV\",\"result\":\"6.0\",\"normal_value\":\"7.0- 11.0\",\"unit\":\" fL\"},{\"parameter_name\":\"PDW\",\"result\":\"11%\",\"normal_value\":\"10- 18%\",\"unit\":\"\"},{\"parameter_name\":\"PCT\",\"result\":\"0.14%\",\"normal_value\":\"0.1-0.2%\",\"unit\":\"\"},{\"parameter_name\":\"P-LCR\",\"result\":\"40%\",\"normal_value\":\"11.0-45.0%\",\"unit\":\"\"},{\"parameter_name\":\"P-LCC\",\"result\":\"30\",\"normal_value\":\"30-90\",\"unit\":\"fL\"}]', NULL, NULL, 'HAEMATOLOGY', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-04 09:05:28', '2025-10-04 09:05:28'),
(259, 123, 220, 8, NULL, '{\"finding\":\"The heart size and contour are within normal limits.\\nThe lung fields are clear with no evidence of consolidation, infiltration, or mass lesions.\\nThe costophrenic angles are sharp and clear.\\nThe diaphragm is well-defined and in normal position.\\nThe bony thorax is intact with no fractures or deformities.\\nNo pleural effusion or pneumothorax seen.\\nThe mediastinal contours are normal.\\nTrachea is midline.\",\"comment\":\"Normal chest X-ray with no radiographic evidence of active pulmonary or cardiac pathology.\"}', NULL, 'X-Ray Chest PA View Digital', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-04 09:07:02', '2025-10-04 09:07:02'),
(260, 124, 198, 8, NULL, NULL, '{\"parameters\":[{\"parameter_name\":\"Fetal Anatomy Survey\",\"result\":\"Fetal presentation: ______ (cephalic \\/ breech \\/ transverse)\\nFetal lie & position: ______\\nFetal heart: Present, FHR ______ bpm, normal four-chamber view\\nHead & Brain: Normal shape, midline structures intact\\nFace: Normal orbits, nose, lips, palate intact\\nSpine: Normal alignment and echotexture\\nThorax & Heart: Normal size and position\\nAbdomen: Stomach, liver, spleen, kidneys, bladder normal\\nLimbs: All limbs visualized with normal movements\\nUmbilical cord: 3 vessels, normal insertion\\nPlacenta: Location ______, grade ______, no previa\\nAmniotic fluid: AFI ______ cm \\/ MVP ______ cm (adequate \\/ reduced \\/ increased)\"},{\"parameter_name\":\"Fetal Biometry\",\"result\":\"Biparietal Diameter (BPD)______ mm______ weeks\\nHead Circumference (HC)______ mm______ weeks\\nAbdominal Circumference (AC)______ mm______ weeks\\nFemur Length (FL)______ mm______ weeks\\nEstimated Fetal Weight (EFW)______ g______ weeks\\nOverall gestational age corresponds to ______ weeks ______ days.\"},{\"parameter_name\":\"Doppler Studies (if performed)\",\"result\":\"Uterus: Normal contour\\nCervix: Length ______ mm, normal\\nAdnexa: Normal \"},{\"parameter_name\":\"Maternal Findings\",\"result\":\"Uterus: Normal contour\\nCervix: Length ______ mm, normal\\nAdnexa: Normal \"}],\"impression\":\"1. Single live intrauterine fetus corresponding to ______ weeks ______ days.\\n2. No gross congenital anomaly detected.\\n3. Adequate amniotic fluid, normal placenta and cord.\\n4. Doppler studies within normal limits (if performed).\"}', 'USG of Pregnancy Profile', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-04 11:35:57', '2025-10-04 11:35:57'),
(261, 124, 199, 8, NULL, NULL, '{\"parameters\":[{\"parameter_name\":\"Thyroid Lobe(Right)\",\"result\":\"Size: __________ \\u00d7 __________ \\u00d7 __________ cm\\nVolume: __________ ml\\nEchotexture: __________________ (homogeneous \\/ heterogeneous \\/ coarse)\\nFocal lesion \\/ nodule: __________________ (absent \\/ present \\u2013 describe below)\"},{\"parameter_name\":\"Thyroid Lobe(Left)\",\"result\":\"Size: __________ \\u00d7 __________ \\u00d7 __________ cm\\nVolume: __________ ml\\nEchotexture: __________________ (homogeneous \\/ heterogeneous \\/ coarse)\\nFocal lesion \\/ nodule: __________________ (absent \\/ present \\u2013 describe below)\"},{\"parameter_name\":\"Isthmus\",\"result\":\"Thickness: __________ mm\\nEchotexture: __________________\\nFocal lesion: __________________\"},{\"parameter_name\":\"Nodule Characteristics (if present)\",\"result\":\"Location: __________________ (Right \\/ Left \\/ Isthmus)\\nSize: __________ \\u00d7 __________ \\u00d7 __________ mm\\nShape: __________________ (round \\/ oval \\/ irregular)\\nMargin: __________________ (smooth \\/ ill-defined \\/ lobulated \\/ spiculated)\\nEchotexture: __________________ (hypoechoic \\/ hyperechoic \\/ mixed \\/ cystic \\/ solid)\\nCalcification: __________________ (absent \\/ micro \\/ macro)\\nVascularity (Doppler): __________________ (present \\/ absent \\/ peripheral \\/ central)\"},{\"parameter_name\":\"Lymph Nodes (Cervical \\/ Level I-V)\",\"result\":\"Size: __________ mm\\nEchogenicity: __________________\\nShape: __________________\\nHilar vascularity: __________________\\nSuspicious features: __________________\"}],\"impression\":\"1. Thyroid gland size and echotexture [normal \\/ abnormal].\\n2. No suspicious nodule \\/ [Describe nodule if present].\\n3. Cervical lymph nodes [normal \\/ suspicious].\\n4. Suggest correlation with thyroid function tests and follow-up as needed.\"}', 'USG of Thyroid Gland', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-04 11:36:03', '2025-10-04 11:36:03'),
(262, 124, 200, 8, NULL, NULL, '{\"parameters\":[{\"parameter_name\":\"Right Kidney\",\"result\":\"Size: __________ \\u00d7 __________ \\u00d7 __________ cm\\nCorticomedullary differentiation: __________________\\nParenchymal echotexture: __________________ (normal \\/ echogenic \\/ heterogeneous)\\nFocal lesion \\/ cyst \\/ mass: __________________\\nHydronephrosis \\/ obstruction: __________________\",\"impression\":\"\"},{\"parameter_name\":\"Left Kidney\",\"result\":\"Size: __________ \\u00d7 __________ \\u00d7 __________ cm\\nCorticomedullary differentiation: __________________\\nParenchymal echotexture: __________________\\nFocal lesion \\/ cyst \\/ mass: __________________\\nHydronephrosis \\/ obstruction: __________________\"},{\"parameter_name\":\"Ureters\",\"result\":\"Right: __________________ (visualized \\/ not visualized \\/ dilated)\\nLeft: __________________ (visualized \\/ not visualized \\/ dilated)\"},{\"parameter_name\":\"Urinary Bladder\",\"result\":\"Wall thickness: __________ mm\\nContour: __________________\\nIntraluminal lesion \\/ stone: __________________\\nTrabeculation: __________________\"},{\"parameter_name\":\"Post-Void Residual (PVR)\",\"result\":\"Volume: __________ ml\\nSignificance: __________________ (normal \\/ elevated)\"},{\"parameter_name\":\"Other Findings\",\"result\":\"Free fluid in pelvis \\/ peritoneum: __________________\\nOther incidental findings: __________________\"}],\"impression\":\"1. Kidneys, ureters, and bladder appear normal.\\n2. No obstructive uropathy or calculi detected.\\n3. Post-void residual volume is __________ ml (normal \\/ elevated).\"}', 'USG of PVR/MCC/KUB', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-04 11:36:09', '2025-10-04 11:36:09'),
(263, 124, 201, 8, NULL, NULL, '{\"parameters\":[{\"parameter_name\":\"Findings ([Right \\/ Left] Breast)\",\"result\":\"Breast parenchyma: __________________ (normal \\/ fibroglandular \\/ fatty replaced).\\nFocal lesion: __________________ (absent \\/ present).\\nIf present:\\nLocation (quadrant\\/clock position): __________________\\nSize: __________ \\u00d7 __________ mm\\nShape: __________________ (oval \\/ irregular \\/ round)\\nMargin: __________________ (smooth \\/ lobulated \\/ spiculated)\\nEchotexture: __________________ (hypoechoic \\/ hyperechoic \\/ cystic \\/ complex)\\nPosterior acoustic features: __________________ (enhancement \\/ shadowing \\/ none)\\nVascularity (on Doppler): __________________ (present \\/ absent, mild \\/ moderate \\/ marked).\\nNipple\\u2013areolar complex: __________________ (normal \\/ retracted \\/ discharge)\\nSkin & subcutaneous tissue: __________________\\nAxillary region: __________________ (normal \\/ enlarged lymph nodes).\",\"impression\":\"\"},{\"parameter_name\":\"BI-RADS Assessment\",\"result\":\"\\u2714\\ufe0fBI-RADS 1 \\u2013 Negative\\n\\u2714\\ufe0fBI-RADS 2 \\u2013 Benign finding\\n\\u2714\\ufe0fBI-RADS 3 \\u2013 Probably benign (short interval follow-up suggested)\\n\\u274cBI-RADS 4 \\u2013 Suspicious abnormality (biopsy recommended)\\n\\u274cBI-RADS 5 \\u2013 Highly suggestive of malignancy\\n\\u274cBI-RADS 6 \\u2013 Known biopsy-proven malignancy\"}],\"impression\":\"Well-defined benign-appearing lesion, likely fibroadenoma\"}', 'USG Breast (Single)', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-04 11:36:15', '2025-10-04 11:36:15'),
(264, 124, 202, 8, NULL, NULL, '{\"parameters\":[{\"parameter_name\":\"Uterus\",\"result\":\"Size: __________ \\u00d7 __________ \\u00d7 __________ cm\\nShape & position: __________ (anteverted \\/ retroverted \\/ axial)\\nMyometrium: __________________ (homogeneous \\/ heterogeneous \\/ fibroid seen)\\nEndometrium: Thickness __________ mm, echogenicity: __________________\\nFocal lesions (fibroid \\/ polyp \\/ adenomyosis): __________________\",\"impression\":\"\"},{\"parameter_name\":\"Cervix\",\"result\":\"Normal \\/ bulky \\/ lesion present\\nCervical canal: __________________\"},{\"parameter_name\":\"Right Ovary\",\"result\":\"Size: __________ \\u00d7 __________ \\u00d7 __________ cm\\nFollicles: __________ (number & size)\\nDominant follicle \\/ cyst \\/ mass: __________________\\nVascularity: __________________\"},{\"parameter_name\":\"Left Ovary\",\"result\":\"Size: __________ \\u00d7 __________ \\u00d7 __________ cm\\nFollicles: __________ (number & size)\\nDominant follicle \\/ cyst \\/ mass: __________________\\nVascularity: __________________\"},{\"parameter_name\":\"Adnexa\",\"result\":\"Mass \\/ hydrosalpinx: __________________\\nFree fluid in POD (Pouch of Douglas): __________________\"},{\"parameter_name\":\"If Early Pregnancy Evaluated\",\"result\":\"Gestational sac: Present \\/ absent\\nYolk sac: Present \\/ absent\\nFetal pole: Present \\/ absent\\nCardiac activity: Present (FHR ______ bpm)\\nCRL: __________ mm \\u2192 GA: __________ weeks __________ days\"}],\"impression\":\"Normal uterus and ovaries\"}', 'USG of Transvaginal/TVS-4D', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-04 11:36:22', '2025-10-04 11:36:22'),
(265, 124, 204, 8, NULL, NULL, '{\"parameters\":[{\"parameter_name\":\"Right Breast\",\"result\":\"Breast parenchyma: __________________ (normal \\/ fibroglandular \\/ fatty replaced).\\nFocal lesion: __________________ (present \\/ absent).\\nIf present:\\nSite \\/ quadrant: __________________\\nSize: __________ \\u00d7 __________ mm\\nShape & margin: __________________ (regular \\/ irregular \\/ spiculated)\\nEchotexture: __________________ (hypoechoic \\/ complex \\/ cystic \\/ solid)\\nPosterior acoustic features: __________________ (enhancement \\/ shadowing)\\nVascularity (on Doppler): __________________ (present \\/ absent, mild \\/ moderate \\/ marked).\\nNipple\\u2013areolar complex: __________________\\nSkin \\/ subcutaneous tissue: __________________\\nAxillary region: __________________ (normal \\/ enlarged lymph nodes).\",\"impression\":\"\"},{\"parameter_name\":\"Left Breast\",\"result\":\"Breast parenchyma: __________________ (normal \\/ fibroglandular \\/ fatty replaced).\\nFocal lesion: __________________ (present \\/ absent).\\nIf present:\\nSite \\/ quadrant: __________________\\nSize: __________ \\u00d7 __________ mm\\nShape & margin: __________________\\nEchotexture: __________________\\nPosterior acoustic features: __________________\\nVascularity: __________________\\nNipple\\u2013areolar complex: __________________\\nSkin \\/ subcutaneous tissue: __________________\\nAxillary region: __________________\"},{\"parameter_name\":\"BI-RADS Assessment\",\"result\":\"\\u2714\\ufe0fBI-RADS 1 \\u2013 Negative\\n\\u2714\\ufe0fBI-RADS 2 \\u2013 Benign\\n\\u2714\\ufe0fBI-RADS 3 \\u2013 Probably benign (short interval follow-up suggested)\\n\\u2714\\ufe0f BI-RADS 4 \\u2013 Suspicious (biopsy recommended)\\n\\u274cBI-RADS 5 \\u2013 Highly suggestive of malignancy\\n\\u274c BI-RADS 6 \\u2013 Known biopsy-proven malignancy\"}],\"impression\":\"No suspicious lesion detected in either breast.\"}', 'USG of Both Breast-4D', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-04 11:36:28', '2025-10-04 11:36:28'),
(266, 124, 205, 8, NULL, NULL, '{\"parameters\":[{\"parameter_name\":\"Right Side\",\"result\":\"CCA (Common Carotid Artery): Diameter __________ mm, PSV __________ cm\\/s, EDV __________ cm\\/s, Intima-media thickness __________ mm.\\nBifurcation & Bulb: __________ (normal \\/ plaque \\/ calcification \\/ irregularity).\\nICA (Internal Carotid Artery): PSV __________ cm\\/s, EDV __________ cm\\/s, stenosis __________%.\\nECA (External Carotid Artery): Flow pattern: __________.\\nVertebral Artery: Flow direction: __________ (antegrade \\/ retrograde \\/ diminished).\",\"impression\":\"\"},{\"parameter_name\":\"Left Side\",\"result\":\"CCA: Diameter __________ mm, PSV __________ cm\\/s, EDV __________ cm\\/s, Intima-media thickness __________ mm.\\nBifurcation & Bulb: __________ (normal \\/ plaque \\/ calcification \\/ irregularity).\\nICA: PSV __________ cm\\/s, EDV __________ cm\\/s, stenosis __________%.\\nECA: Flow pattern: __________.\\nVertebral Artery: Flow direction: __________ (antegrade \\/ retrograde \\/ diminished).\"},{\"parameter_name\":\"Plaque Morphology (if present)\",\"result\":\"Site: __________\\nSurface: __________ (smooth \\/ irregular \\/ ulcerated)\\nEchogenicity: __________ (hypoechoic \\/ hyperechoic \\/ calcified \\/ mixed)\"},{\"parameter_name\":\"Hemodynamics\",\"result\":\"Normal triphasic \\/ biphasic waveforms maintained \\/ altered.\\nPeak systolic velocities correspond to __________% stenosis (according to NASCET criteria).\"}],\"impression\":\"1. No significant hemodynamically relevant stenosis detected in bilateral carotid and vertebral arteries.\\n2. Evidence of __________% stenosis in [Right \\/ Left] ICA.\\n3. Vertebral arteries show antegrade flow bilaterally.\"}', 'USG of Carotid Droppler-4D', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-04 11:36:33', '2025-10-04 11:36:33'),
(267, 124, 206, 8, NULL, NULL, '{\"parameters\":[{\"parameter_name\":\"Fetal Viability & Presentation\",\"result\":\"Single live intrauterine fetus seen.\\nCardiac activity present, FHR: __________ bpm.\\nPresentation: __________ (cephalic \\/ breech \\/ transverse).\",\"impression\":\"\"},{\"parameter_name\":\"Placenta & Liquor\",\"result\":\"Placenta: __________ (anterior \\/ posterior \\/ fundal \\/ low-lying).\\nPlacental maturity (Grading): __________.\\nAmniotic fluid: AFI __________ cm \\/ MVP __________ cm (adequate \\/ reduced \\/ increased).\"},{\"parameter_name\":\"Biometry (Fetal Measurements)\",\"result\":\"BPD: __________ mm \\u2192 GA: __________ weeks\\nHC: __________ mm \\u2192 GA: __________ weeks\\nAC: __________ mm \\u2192 GA: __________ weeks\\nFL: __________ mm \\u2192 GA: __________ weeks\\nEFW: __________ g\"},{\"parameter_name\":\"Head & Brain(Fetal Anatomy Survey)\",\"result\":\"Skull shape: Normal\\nMidline structures (falx, cavum septum pellucidum): Seen\\nLateral ventricles: Normal, __________ mm\\nChoroid plexus: Normal\\nCerebellum & cisterna magna: Normal\"},{\"parameter_name\":\"Face\",\"result\":\"Orbits & lenses: Normal\\nNose, lips, palate: Intact\\nProfile: Normal\"},{\"parameter_name\":\"Spine\",\"result\":\"Cervical, thoracic, lumbar & sacral spine intact\\nOverlying skin: Normal\"},{\"parameter_name\":\"Neck & Thorax\",\"result\":\"Neck mass: Absent\\nHeart position & size: Normal\\n4-chamber view: Normal\\nOutflow tracts: Normal\\nCardiac activity: Present\"},{\"parameter_name\":\"Abdomen\",\"result\":\"Stomach bubble: Seen\\nLiver, spleen: Normal\\nKidneys: Both visualized, normal\\nBladder: Seen\\nBowel: Normal echogenicity\"},{\"parameter_name\":\"Limbs\",\"result\":\"All four limbs seen with normal movements\\nLong bones: Normal length & echogenicity\\nHands & feet: Normal\"},{\"parameter_name\":\"Umbilical Cord\",\"result\":\"3 vessels (2 arteries + 1 vein): Present\\nCord insertion: Normal\"},{\"parameter_name\":\"Maternal Findings\",\"result\":\"Uterus: Normal contour\\nCervix length: __________ mm\\nAdnexa: Normal\"}],\"impression\":\"Normal\"}', 'USG of Anomaly Scan-4D', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-04 11:36:45', '2025-10-04 11:36:45'),
(268, 124, 208, 8, NULL, NULL, '{\"parameters\":[{\"parameter_name\":\"Right Lower Limb(Venous System)\",\"result\":\"Deep veins (CFV, FV, PopV, PT, Peroneal, GSV, SSV): __________________\\nCompressibility: __________________\\nColor flow \\/ phasicity: __________________\\nAugmentation: __________________\\nThrombus \\/ echogenic material: __________________\\nReflux: __________________\"},{\"parameter_name\":\"Left Lower Limb\",\"result\":\"Deep veins (CFV, FV, PopV, PT, Peroneal, GSV, SSV): __________________\\nCompressibility: __________________\\nColor flow \\/ phasicity: __________________\\nAugmentation: __________________\\nThrombus \\/ echogenic material: __________________\\nReflux: __________________\"},{\"parameter_name\":\"Right Lower Limb(Arterial System)\",\"result\":\"CFA, SFA, Popliteal, ATA, PTA, Peroneal artery evaluated.\\nFlow: __________________\\nPSV (peak systolic velocity): __________________ cm\\/s\\nSpectral waveform: __________________ (triphasic \\/ biphasic \\/ monophasic)\\nStenosis \\/ occlusion: __________________\\nPlaque \\/ calcification: __________________\"},{\"parameter_name\":\"Left Lower Limb\",\"result\":\"CFA, SFA, Popliteal, ATA, PTA, Peroneal artery evaluated.\\nFlow: __________________\\nPSV (peak systolic velocity): __________________ cm\\/s\\nSpectral waveform: __________________ (triphasic \\/ biphasic \\/ monophasic)\\nStenosis \\/ occlusion: __________________\\nPlaque \\/ calcification: __________________\"},{\"parameter_name\":\"Soft Tissues \\/ Others\",\"result\":\"Subcutaneous edema: __________________\\nLymph nodes \\/ masses: __________________\\nAny vascular malformations \\/ varicosities: __________________\"}],\"impression\":\"Normal\"}', 'USG duplex study(Both) Lower Limb-4D', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-04 11:36:58', '2025-10-04 11:36:58'),
(269, 124, 261, 8, NULL, NULL, '{\"parameters\":[{\"parameter_name\":\"Liver\",\"result\":\"Size: __________________ cm\\nEchotexture: __________________ (normal \\/ fatty \\/ coarse)\\nSurface: __________________ (smooth \\/ irregular)\\nFocal lesion: __________________ (absent \\/ present \\u2013 describe)\\nIntrahepatic biliary radicals: __________________\\nHepatic vessels & portal vein: __________________\"},{\"parameter_name\":\"Gallbladder & Biliary System\",\"result\":\"Wall thickness: __________ mm\\nStones \\/ sludge \\/ polyps: __________________\\nPericholecystic fluid: __________________\\nCommon bile duct (CBD) diameter: __________ mm\\nIntra \\/ extrahepatic biliary dilatation: __________________\"},{\"parameter_name\":\"Pancreas\",\"result\":\"Size & echotexture: __________________\\nFocal lesion \\/ cyst \\/ calcification: __________________\\nPancreatic duct: __________________\"},{\"parameter_name\":\"Spleen\",\"result\":\"Size: __________ cm\\nEchotexture: __________________\\nFocal lesion: __________________\"},{\"parameter_name\":\"Right Kidney\",\"result\":\"Size: __________ \\u00d7 __________ cm\\nCorticomedullary differentiation: __________________\\nStones \\/ cysts \\/ masses: __________________\\nHydronephrosis: __________________\"},{\"parameter_name\":\"Left Kidney\",\"result\":\"Size: __________ \\u00d7 __________ cm\\nCorticomedullary differentiation: __________________\\nStones \\/ cysts \\/ masses: __________________\\nHydronephrosis: __________________\"},{\"parameter_name\":\"Adrenals\",\"result\":\"Right adrenal: __________________\\nLeft adrenal: __________________\"},{\"parameter_name\":\"Urinary Bladder & Pelvis\",\"result\":\"Wall thickness \\/ contour: __________________\\nLesions \\/ trabeculation: __________________\\nPost-void residual: __________________\"},{\"parameter_name\":\"Vessels & Retroperitoneum\",\"result\":\"Abdominal aorta: Diameter __________ mm, plaques \\/ aneurysm: __________________\\nIVC: __________________\\nPara-aortic lymph nodes: __________________\"},{\"parameter_name\":\"Peritoneum \\/ Others\",\"result\":\"Free fluid \\/ ascites: __________________\\nAny masses: __________________\"}],\"impression\":\"1. Liver, gallbladder, pancreas, spleen, kidneys, and urinary bladder appear normal.\\n2. No focal lesion or abnormal fluid collection seen.\\n3. No evidence of hydronephrosis or biliary obstruction.\"}', 'USG of Whole Abdomen 4D', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-04 11:37:06', '2025-10-04 11:37:06'),
(270, 124, 262, 8, NULL, NULL, '{\"parameters\":[{\"parameter_name\":\"Venous System ([Right \\/ Left] Lower Limb)\",\"result\":\"Common femoral vein (CFV): __________________\\nFemoral vein (proximal, mid, distal): __________________\\nPopliteal vein: __________________\\nPosterior tibial & peroneal veins: __________________\\nGreat & small saphenous veins: __________________\\nCompressibility: __________________\\nColor flow \\/ phasicity: __________________\\nSpontaneity \\/ augmentation: __________________\\nThrombus: __________________\\nReflux: __________________\",\"impression\":\"\"},{\"parameter_name\":\"Arterial System ([Right \\/ Left] Lower Limb)\",\"result\":\"Common femoral artery (CFA): __________________\\nSuperficial femoral artery (SFA): __________________\\nPopliteal artery: __________________\\nAnterior tibial, posterior tibial & peroneal arteries: __________________\\nPSV (peak systolic velocity): __________________ cm\\/s\\nWaveform: __________________ (triphasic \\/ biphasic \\/ monophasic)\\nStenosis \\/ occlusion: __________________\\nPlaque \\/ calcification: __________________\"},{\"parameter_name\":\"Soft Tissue \\/ Others\",\"result\":\"Subcutaneous edema: __________________\\nLymph nodes \\/ mass lesion: __________________\\nVaricosities \\/ vascular malformations: __________________\\nFree fluid: __________________\"}],\"impression\":\"Normal\"}', 'USG of duplex study(Single) Lower Limb-4D', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-04 11:37:17', '2025-10-04 11:37:17'),
(271, 124, 263, 8, NULL, NULL, '{\"parameters\":[{\"parameters\":{\"parameters\":{\"parameters\":[{\"parameter_name\":\"Liver\",\"result\":\"Size \\/ dimensions: __________________ cm\\nEchotexture \\/ echogenicity: __________________\\nFocal lesions (if any): __________________\\nIntrahepatic biliary radicals: __________________\\nVascular \\/ portal vein \\/ hepatic veins: __________________\",\"impression\":\"\"}],\"impression\":\"\",\"parameter_name\":\"Liver\",\"result\":\"Size \\/ dimensions: __________________ cm\\nEchotexture \\/ echogenicity: __________________\\nFocal lesions (if any): __________________\\nIntrahepatic biliary radicals: __________________\\nVascular \\/ portal vein \\/ hepatic veins: __________________\"},\"impression\":\"\",\"parameter_name\":\"Sharif\"},\"impression\":\"\",\"parameter_name\":\"Liver\",\"result\":\"Size: __________________ cm\\nEchotexture: __________________ (normal \\/ fatty \\/ coarse)\\nSurface: __________________ (smooth \\/ irregular)\\nFocal lesion: __________________ (absent \\/ present \\u2013 describe)\\nIntrahepatic biliary radicals: __________________\\nHepatic vessels & portal vein: __________________\"},{\"parameter_name\":\"Gallbladder & Biliary System\",\"result\":\"Wall thickness: __________ mm\\nStones \\/ sludge \\/ polyps: __________________\\nPericholecystic fluid: __________________\\nCommon bile duct (CBD) diameter: __________ mm\\nIntra \\/ extrahepatic biliary dilatation: __________________\"},{\"parameter_name\":\"Pancreas\",\"result\":\"Size & echotexture: __________________\\nFocal lesion \\/ cyst \\/ calcification: __________________\\nPancreatic duct: __________________\"},{\"parameter_name\":\"Spleen\",\"result\":\"Size: __________ cm\\nEchotexture: __________________\\nFocal lesion: __________________\"},{\"parameter_name\":\"Right Kidney\",\"result\":\"Size: __________ \\u00d7 __________ cm\\nCorticomedullary differentiation: __________________\\nStones \\/ cysts \\/ masses: __________________\\nHydronephrosis: __________________\"},{\"parameter_name\":\"Left Kidney\",\"result\":\"Size: __________ \\u00d7 __________ cm\\nCorticomedullary differentiation: __________________\\nStones \\/ cysts \\/ masses: __________________\\nHydronephrosis: __________________\"},{\"parameter_name\":\"Adrenals\",\"result\":\"Right adrenal: __________________\\nLeft adrenal: __________________\"},{\"parameter_name\":\"Urinary Bladder & Pelvis\",\"result\":\"Wall thickness \\/ contour: __________________\\nLesions \\/ trabeculation: __________________\\nPost-void residual: __________________\"},{\"parameter_name\":\"Vessels & Retroperitoneum\",\"result\":\"Abdominal aorta: Diameter __________ mm, plaques \\/ aneurysm: __________________\\nIVC: __________________\\nPara-aortic lymph nodes: __________________\"},{\"parameter_name\":\"Peritoneum \\/ Others\",\"result\":\"Free fluid \\/ ascites: __________________\\nAny masses: __________________\"}],\"impression\":\"1. Liver, gallbladder, pancreas, spleen, kidneys, and urinary bladder appear normal.\\n2. No focal lesion or abnormal fluid collection seen.\\n3. No evidence of hydronephrosis or biliary obstruction.\"}', 'USG of Whole Abdomen 2D', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-04 11:37:25', '2025-10-04 11:37:25'),
(272, 125, 17, 5, '[{\"parameter_name\":\"Serum Creatinine\",\"result\":\"1\",\"normal_value\":\"0.6\\u2013 1.3\",\"unit\":\"mg\\/dL\"},{\"parameter_name\":\"Electrolytes \",\"result\":\" \",\"normal_value\":\" \",\"unit\":\"\"},{\"parameter_name\":\"Serum Sodium (Na\\u207a)\",\"result\":\"1\",\"normal_value\":\"135 \\u2013 148\",\"unit\":\"mmol\\/L\"},{\"parameter_name\":\"Serum Potasium (K\\u207a)\",\"result\":\"1\",\"normal_value\":\"3.5 \\u2013 5.3\",\"unit\":\"mmol\\/L\"},{\"parameter_name\":\"Serum Chloride (Cl\\u207b)\",\"result\":\"1\",\"normal_value\":\"98 \\u2013 107\",\"unit\":\"mmol\\/L\"}]', NULL, NULL, 'BIOCHEMISTRY', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-04 18:44:26', '2025-10-04 18:44:26'),
(273, 125, 16, 5, '[{\"parameter_name\":\"Serum Creatinine\",\"result\":\"1\",\"normal_value\":\"0.6\\u2013 1.3\",\"unit\":\"mg\\/dL\"}]', NULL, NULL, 'BIOCHEMISTRY', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-04 18:44:35', '2025-10-04 18:44:35'),
(274, 125, 199, 5, NULL, NULL, '{\"parameters\":[{\"parameter_name\":\"Thyroid Lobe(Right)\",\"result\":\"Size: __________ \\u00d7 __________ \\u00d7 __________ cm\\nVolume: __________ ml\\nEchotexture: __________________ (homogeneous \\/ heterogeneous \\/ coarse)\\nFocal lesion \\/ nodule: __________________ (absent \\/ present \\u2013 describe below)\"},{\"parameter_name\":\"Thyroid Lobe(Left)\",\"result\":\"Size: __________ \\u00d7 __________ \\u00d7 __________ cm\\nVolume: __________ ml\\nEchotexture: __________________ (homogeneous \\/ heterogeneous \\/ coarse)\\nFocal lesion \\/ nodule: __________________ (absent \\/ present \\u2013 describe below)\"},{\"parameter_name\":\"Isthmus\",\"result\":\"Thickness: __________ mm\\nEchotexture: __________________\\nFocal lesion: __________________\"},{\"parameter_name\":\"Nodule Characteristics (if present)\",\"result\":\"Location: __________________ (Right \\/ Left \\/ Isthmus)\\nSize: __________ \\u00d7 __________ \\u00d7 __________ mm\\nShape: __________________ (round \\/ oval \\/ irregular)\\nMargin: __________________ (smooth \\/ ill-defined \\/ lobulated \\/ spiculated)\\nEchotexture: __________________ (hypoechoic \\/ hyperechoic \\/ mixed \\/ cystic \\/ solid)\\nCalcification: __________________ (absent \\/ micro \\/ macro)\\nVascularity (Doppler): __________________ (present \\/ absent \\/ peripheral \\/ central)\"},{\"parameter_name\":\"Lymph Nodes (Cervical \\/ Level I-V)\",\"result\":\"Size: __________ mm\\nEchogenicity: __________________\\nShape: __________________\\nHilar vascularity: __________________\\nSuspicious features: __________________\"}],\"impression\":\"1. Thyroid gland size and echotexture [normal \\/ abnormal].\\n2. No suspicious nodule \\/ [Describe nodule if present].\\n3. Cervical lymph nodes [normal \\/ suspicious].\\n4. Suggest correlation with thyroid function tests and follow-up as needed.\"}', 'USG of Thyroid Gland', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-04 18:44:41', '2025-10-04 18:44:41'),
(275, 125, 220, 5, NULL, '{\"finding\":\"Normal\",\"comment\":\"Normal\"}', NULL, 'X-Ray Chest PA View Digital', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-04 18:45:00', '2025-10-04 18:45:00'),
(276, 125, 245, 5, '[{\"parameter_name\":\"Hemoglobin (Hb%)\",\"result\":\"9.4\",\"normal_value\":\"Male: 12-18, Female: 11-16\",\"unit\":\"gm\\/dl\"},{\"parameter_name\":\"ESR\",\"result\":\"15\",\"normal_value\":\"Male: 0-10, Female: 0-15\",\"unit\":\"mm\"},{\"parameter_name\":\"Total WBC Counts\",\"result\":\"1\",\"normal_value\":\"4000-11000\",\"unit\":\"mm\\u00b3\"},{\"parameter_name\":\"Differential Counts\",\"result\":\" \",\"normal_value\":\" \",\"unit\":\"\"},{\"parameter_name\":\"Neutrophils\",\"result\":\"1\",\"normal_value\":\"40-75%\",\"unit\":\"\"},{\"parameter_name\":\"Lymphocytes\",\"result\":\"1\",\"normal_value\":\"20-50%\",\"unit\":\"\"},{\"parameter_name\":\"Monocytes\",\"result\":\"1\",\"normal_value\":\"2-10%\",\"unit\":\"\"},{\"parameter_name\":\"Eosinophils\",\"result\":\"1\",\"normal_value\":\"1-8%\",\"unit\":\"\"},{\"parameter_name\":\"Basophils\",\"result\":\"1\",\"normal_value\":\"0-1%\",\"unit\":\"\"},{\"parameter_name\":\"Total Cir. Eosinophils\",\"result\":\"1\",\"normal_value\":\"50 - 450\",\"unit\":\"cumm\"},{\"parameter_name\":\"RBC COUNT\",\"result\":\"1\",\"normal_value\":\"M: 4.5 - 6.5, F: 3.8 - 5.8\",\"unit\":\"m\\/ul\"},{\"parameter_name\":\"HCT\\/PCV\",\"result\":\"1\",\"normal_value\":\"M: 40 - 54%, F: 37 - 47%\",\"unit\":\"\"},{\"parameter_name\":\"MCV\",\"result\":\"24fl\",\"normal_value\":\"76-94\",\"unit\":\"fL\"},{\"parameter_name\":\"MCH\",\"result\":\"27pg\",\"normal_value\":\"27-32\",\"unit\":\"pg\"},{\"parameter_name\":\"MCHC\",\"result\":\"29g\\/dl\",\"normal_value\":\"29-34\",\"unit\":\"g\\/dL\"},{\"parameter_name\":\"RDW-CV\",\"result\":\"10%\",\"normal_value\":\"10-16%\",\"unit\":\"\"},{\"parameter_name\":\"RDW-SD\",\"result\":\"35\",\"normal_value\":\"35-56\",\"unit\":\"fl\"},{\"parameter_name\":\"Platelet Count\",\"result\":\"1\",\"normal_value\":\"150000-400000\",\"unit\":\"mm\\u00b3\"},{\"parameter_name\":\"MPV\",\"result\":\"6.0\",\"normal_value\":\"7.0- 11.0\",\"unit\":\" fL\"},{\"parameter_name\":\"PDW\",\"result\":\"11%\",\"normal_value\":\"10- 18%\",\"unit\":\"\"},{\"parameter_name\":\"PCT\",\"result\":\"0.14%\",\"normal_value\":\"0.1-0.2%\",\"unit\":\"\"},{\"parameter_name\":\"P-LCR\",\"result\":\"40%\",\"normal_value\":\"11.0-45.0%\",\"unit\":\"\"},{\"parameter_name\":\"P-LCC\",\"result\":\"30\",\"normal_value\":\"30-90\",\"unit\":\"fL\"}]', NULL, NULL, 'HAEMATOLOGY', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-04 18:45:06', '2025-10-04 18:45:06'),
(277, 127, 245, 8, '[{\"parameter_name\":\"Hemoglobin (Hb%)\",\"result\":\"9.4\",\"normal_value\":\"Male: 12-18, Female: 11-16\",\"unit\":\"gm\\/dl\"},{\"parameter_name\":\"ESR\",\"result\":\"15\",\"normal_value\":\"Male: 0-10, Female: 0-15\",\"unit\":\"mm\"},{\"parameter_name\":\"Total WBC Counts\",\"result\":\"1\",\"normal_value\":\"4000-11000\",\"unit\":\"mm\\u00b3\"},{\"parameter_name\":\"Differential Counts\",\"result\":\" \",\"normal_value\":\" \",\"unit\":\"\"},{\"parameter_name\":\"Neutrophils\",\"result\":\"1\",\"normal_value\":\"40-75%\",\"unit\":\"\"},{\"parameter_name\":\"Lymphocytes\",\"result\":\"1\",\"normal_value\":\"20-50%\",\"unit\":\"\"},{\"parameter_name\":\"Monocytes\",\"result\":\"1\",\"normal_value\":\"2-10%\",\"unit\":\"\"},{\"parameter_name\":\"Eosinophils\",\"result\":\"1\",\"normal_value\":\"1-8%\",\"unit\":\"\"},{\"parameter_name\":\"Basophils\",\"result\":\"1\",\"normal_value\":\"0-1%\",\"unit\":\"\"},{\"parameter_name\":\"Total Cir. Eosinophils\",\"result\":\"1\",\"normal_value\":\"50 - 450\",\"unit\":\"cumm\"},{\"parameter_name\":\"RBC COUNT\",\"result\":\"1\",\"normal_value\":\"M: 4.5 - 6.5, F: 3.8 - 5.8\",\"unit\":\"m\\/ul\"},{\"parameter_name\":\"HCT\\/PCV\",\"result\":\"1\",\"normal_value\":\"M: 40 - 54%, F: 37 - 47%\",\"unit\":\"\"},{\"parameter_name\":\"MCV\",\"result\":\"24fl\",\"normal_value\":\"76-94\",\"unit\":\"fL\"},{\"parameter_name\":\"MCH\",\"result\":\"27pg\",\"normal_value\":\"27-32\",\"unit\":\"pg\"},{\"parameter_name\":\"MCHC\",\"result\":\"29g\\/dl\",\"normal_value\":\"29-34\",\"unit\":\"g\\/dL\"},{\"parameter_name\":\"RDW-CV\",\"result\":\"10%\",\"normal_value\":\"10-16%\",\"unit\":\"\"},{\"parameter_name\":\"RDW-SD\",\"result\":\"35\",\"normal_value\":\"35-56\",\"unit\":\"fl\"},{\"parameter_name\":\"Platelet Count\",\"result\":\"1\",\"normal_value\":\"150000-400000\",\"unit\":\"mm\\u00b3\"},{\"parameter_name\":\"MPV\",\"result\":\"6.0\",\"normal_value\":\"7.0- 11.0\",\"unit\":\" fL\"},{\"parameter_name\":\"PDW\",\"result\":\"11%\",\"normal_value\":\"10- 18%\",\"unit\":\"\"},{\"parameter_name\":\"PCT\",\"result\":\"0.14%\",\"normal_value\":\"0.1-0.2%\",\"unit\":\"\"},{\"parameter_name\":\"P-LCR\",\"result\":\"40%\",\"normal_value\":\"11.0-45.0%\",\"unit\":\"\"},{\"parameter_name\":\"P-LCC\",\"result\":\"30\",\"normal_value\":\"30-90\",\"unit\":\"fL\"}]', NULL, NULL, 'HAEMATOLOGY', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-05 09:26:53', '2025-10-05 09:26:53'),
(278, 126, 17, 3, '[{\"parameter_name\":\"Electrolytes \",\"result\":\" \",\"normal_value\":\" \",\"unit\":\"\"},{\"parameter_name\":\"Serum Sodium (Na\\u207a)\",\"result\":\"1\",\"normal_value\":\"135 \\u2013 148\",\"unit\":\"mmol\\/L\"},{\"parameter_name\":\"Serum Potasium (K\\u207a)\",\"result\":\"1\",\"normal_value\":\"3.5 \\u2013 5.3\",\"unit\":\"mmol\\/L\"},{\"parameter_name\":\"Serum Chloride (Cl\\u207b)\",\"result\":\"1\",\"normal_value\":\"98 \\u2013 107\",\"unit\":\"mmol\\/L\"}]', NULL, NULL, 'BIOCHEMISTRY', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-05 09:27:06', '2025-10-05 09:27:06'),
(279, 126, 245, 3, '[{\"parameter_name\":\"Hemoglobin (Hb%)\",\"result\":\"9.4\",\"normal_value\":\"Male: 12-18, Female: 11-16\",\"unit\":\"gm\\/dl\"},{\"parameter_name\":\"ESR\",\"result\":\"15\",\"normal_value\":\"Male: 0-10, Female: 0-15\",\"unit\":\"mm\"},{\"parameter_name\":\"Total WBC Counts\",\"result\":\"1\",\"normal_value\":\"4000-11000\",\"unit\":\"mm\\u00b3\"},{\"parameter_name\":\"Differential Counts\",\"result\":\" \",\"normal_value\":\" \",\"unit\":\"\"},{\"parameter_name\":\"Neutrophils\",\"result\":\"1\",\"normal_value\":\"40-75%\",\"unit\":\"\"},{\"parameter_name\":\"Lymphocytes\",\"result\":\"1\",\"normal_value\":\"20-50%\",\"unit\":\"\"},{\"parameter_name\":\"Monocytes\",\"result\":\"1\",\"normal_value\":\"2-10%\",\"unit\":\"\"},{\"parameter_name\":\"Eosinophils\",\"result\":\"1\",\"normal_value\":\"1-8%\",\"unit\":\"\"},{\"parameter_name\":\"Basophils\",\"result\":\"1\",\"normal_value\":\"0-1%\",\"unit\":\"\"},{\"parameter_name\":\"Total Cir. Eosinophils\",\"result\":\"1\",\"normal_value\":\"50 - 450\",\"unit\":\"cumm\"},{\"parameter_name\":\"RBC COUNT\",\"result\":\"1\",\"normal_value\":\"M: 4.5 - 6.5, F: 3.8 - 5.8\",\"unit\":\"m\\/ul\"},{\"parameter_name\":\"HCT\\/PCV\",\"result\":\"1\",\"normal_value\":\"M: 40 - 54%, F: 37 - 47%\",\"unit\":\"\"},{\"parameter_name\":\"MCV\",\"result\":\"24fl\",\"normal_value\":\"76-94\",\"unit\":\"fL\"},{\"parameter_name\":\"MCH\",\"result\":\"27pg\",\"normal_value\":\"27-32\",\"unit\":\"pg\"},{\"parameter_name\":\"MCHC\",\"result\":\"29g\\/dl\",\"normal_value\":\"29-34\",\"unit\":\"g\\/dL\"},{\"parameter_name\":\"RDW-CV\",\"result\":\"10%\",\"normal_value\":\"10-16%\",\"unit\":\"\"},{\"parameter_name\":\"RDW-SD\",\"result\":\"35\",\"normal_value\":\"35-56\",\"unit\":\"fl\"},{\"parameter_name\":\"Platelet Count\",\"result\":\"1\",\"normal_value\":\"150000-400000\",\"unit\":\"mm\\u00b3\"},{\"parameter_name\":\"MPV\",\"result\":\"6.0\",\"normal_value\":\"7.0- 11.0\",\"unit\":\" fL\"},{\"parameter_name\":\"PDW\",\"result\":\"11%\",\"normal_value\":\"10- 18%\",\"unit\":\"\"},{\"parameter_name\":\"PCT\",\"result\":\"0.14%\",\"normal_value\":\"0.1-0.2%\",\"unit\":\"\"},{\"parameter_name\":\"P-LCR\",\"result\":\"40%\",\"normal_value\":\"11.0-45.0%\",\"unit\":\"\"},{\"parameter_name\":\"P-LCC\",\"result\":\"30\",\"normal_value\":\"30-90\",\"unit\":\"fL\"}]', NULL, NULL, 'HAEMATOLOGY', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-05 09:27:12', '2025-10-05 09:27:12'),
(280, 128, 17, 8, '[{\"parameter_name\":\"Serum Creatinine\",\"result\":\"1\",\"normal_value\":\"0.6\\u2013 1.3\",\"unit\":\"mg\\/dL\"},{\"parameter_name\":\"Electrolytes \",\"result\":\" \",\"normal_value\":\" \",\"unit\":\"\"},{\"parameter_name\":\"Serum Sodium (Na\\u207a)\",\"result\":\"1\",\"normal_value\":\"135 \\u2013 148\",\"unit\":\"mmol\\/L\"},{\"parameter_name\":\"Serum Potasium (K\\u207a)\",\"result\":\"1\",\"normal_value\":\"3.5 \\u2013 5.3\",\"unit\":\"mmol\\/L\"},{\"parameter_name\":\"Serum Chloride (Cl\\u207b)\",\"result\":\"1\",\"normal_value\":\"98 \\u2013 107\",\"unit\":\"mmol\\/L\"}]', NULL, NULL, 'BIOCHEMISTRY', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-05 14:29:14', '2025-10-05 14:29:14'),
(281, 128, 16, 8, '[{\"parameter_name\":\"Serum Creatinine\",\"result\":\"1\",\"normal_value\":\"0.6\\u2013 1.3\",\"unit\":\"mg\\/dL\"}]', NULL, NULL, 'BIOCHEMISTRY', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-05 14:29:19', '2025-10-05 14:29:19'),
(282, 128, 220, 8, NULL, '{\"finding\":\"\",\"comment\":\"\"}', NULL, 'X-Ray Chest PA View Digital', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-05 14:29:24', '2025-10-05 14:29:24');
INSERT INTO `reports` (`id`, `bill_id`, `investigation_id`, `patient_id`, `test_form`, `xray_form`, `usg_form`, `test_category_name`, `prepared_by`, `authorized_by`, `status`, `delivered`, `delivered_at`, `created_at`, `updated_at`) VALUES
(283, 128, 263, 8, NULL, NULL, '{\"parameters\":[{\"parameters\":{\"parameters\":{\"parameters\":[{\"parameter_name\":\"Liver\",\"result\":\"Size \\/ dimensions: __________________ cm\\nEchotexture \\/ echogenicity: __________________\\nFocal lesions (if any): __________________\\nIntrahepatic biliary radicals: __________________\\nVascular \\/ portal vein \\/ hepatic veins: __________________\",\"impression\":\"\"}],\"impression\":\"\",\"parameter_name\":\"Liver\",\"result\":\"Size \\/ dimensions: __________________ cm\\nEchotexture \\/ echogenicity: __________________\\nFocal lesions (if any): __________________\\nIntrahepatic biliary radicals: __________________\\nVascular \\/ portal vein \\/ hepatic veins: __________________\"},\"impression\":\"\",\"parameter_name\":\"Sharif\"},\"impression\":\"\",\"parameter_name\":\"Liver\",\"result\":\"Size: __________________ cm\\nEchotexture: __________________ (normal \\/ fatty \\/ coarse)\\nSurface: __________________ (smooth \\/ irregular)\\nFocal lesion: __________________ (absent \\/ present \\u2013 describe)\\nIntrahepatic biliary radicals: __________________\\nHepatic vessels & portal vein: __________________\"},{\"parameter_name\":\"Gallbladder & Biliary System\",\"result\":\"Wall thickness: __________ mm\\nStones \\/ sludge \\/ polyps: __________________\\nPericholecystic fluid: __________________\\nCommon bile duct (CBD) diameter: __________ mm\\nIntra \\/ extrahepatic biliary dilatation: __________________\"},{\"parameter_name\":\"Pancreas\",\"result\":\"Size & echotexture: __________________\\nFocal lesion \\/ cyst \\/ calcification: __________________\\nPancreatic duct: __________________\"},{\"parameter_name\":\"Spleen\",\"result\":\"Size: __________ cm\\nEchotexture: __________________\\nFocal lesion: __________________\"},{\"parameter_name\":\"Right Kidney\",\"result\":\"Size: __________ \\u00d7 __________ cm\\nCorticomedullary differentiation: __________________\\nStones \\/ cysts \\/ masses: __________________\\nHydronephrosis: __________________\"},{\"parameter_name\":\"Left Kidney\",\"result\":\"Size: __________ \\u00d7 __________ cm\\nCorticomedullary differentiation: __________________\\nStones \\/ cysts \\/ masses: __________________\\nHydronephrosis: __________________\"},{\"parameter_name\":\"Adrenals\",\"result\":\"Right adrenal: __________________\\nLeft adrenal: __________________\"},{\"parameter_name\":\"Urinary Bladder & Pelvis\",\"result\":\"Wall thickness \\/ contour: __________________\\nLesions \\/ trabeculation: __________________\\nPost-void residual: __________________\"},{\"parameter_name\":\"Vessels & Retroperitoneum\",\"result\":\"Abdominal aorta: Diameter __________ mm, plaques \\/ aneurysm: __________________\\nIVC: __________________\\nPara-aortic lymph nodes: __________________\"},{\"parameter_name\":\"Peritoneum \\/ Others\",\"result\":\"Free fluid \\/ ascites: __________________\\nAny masses: __________________\"}],\"impression\":\"1. Liver, gallbladder, pancreas, spleen, kidneys, and urinary bladder appear normal.\\n2. No focal lesion or abnormal fluid collection seen.\\n3. No evidence of hydronephrosis or biliary obstruction.\"}', 'USG of Whole Abdomen 2D', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-05 14:29:30', '2025-10-05 14:29:30'),
(284, 129, 17, 7, '[{\"parameter_name\":\"Serum Creatinine\",\"result\":\"1\",\"normal_value\":\"0.6\\u2013 1.3\",\"unit\":\"mg\\/dL\"},{\"parameter_name\":\"Electrolytes \",\"result\":\" \",\"normal_value\":\" \",\"unit\":\"\"},{\"parameter_name\":\"Serum Sodium (Na\\u207a)\",\"result\":\"1\",\"normal_value\":\"135 \\u2013 148\",\"unit\":\"mmol\\/L\"},{\"parameter_name\":\"Serum Potasium (K\\u207a)\",\"result\":\"1\",\"normal_value\":\"3.5 \\u2013 5.3\",\"unit\":\"mmol\\/L\"},{\"parameter_name\":\"Serum Chloride (Cl\\u207b)\",\"result\":\"1\",\"normal_value\":\"98 \\u2013 107\",\"unit\":\"mmol\\/L\"}]', NULL, NULL, 'BIOCHEMISTRY', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-05 18:30:37', '2025-10-05 18:30:37'),
(285, 129, 16, 7, '[{\"parameter_name\":\"Serum Creatinine\",\"result\":\"1\",\"normal_value\":\"0.6\\u2013 1.3\",\"unit\":\"mg\\/dL\"}]', NULL, NULL, 'BIOCHEMISTRY', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-05 18:30:49', '2025-10-05 18:30:49'),
(286, 129, 245, 7, '[{\"parameter_name\":\"Hemoglobin (Hb%)\",\"result\":\"9.4\",\"normal_value\":\"Male: 12-18, Female: 11-16\",\"unit\":\"gm\\/dl\"},{\"parameter_name\":\"ESR\",\"result\":\"15\",\"normal_value\":\"Male: 0-10, Female: 0-15\",\"unit\":\"mm\"},{\"parameter_name\":\"Total WBC Counts\",\"result\":\"1\",\"normal_value\":\"4000-11000\",\"unit\":\"mm\\u00b3\"},{\"parameter_name\":\"Differential Counts\",\"result\":\" \",\"normal_value\":\" \",\"unit\":\"\"},{\"parameter_name\":\"Neutrophils\",\"result\":\"1\",\"normal_value\":\"40-75%\",\"unit\":\"\"},{\"parameter_name\":\"Lymphocytes\",\"result\":\"1\",\"normal_value\":\"20-50%\",\"unit\":\"\"},{\"parameter_name\":\"Monocytes\",\"result\":\"1\",\"normal_value\":\"2-10%\",\"unit\":\"\"},{\"parameter_name\":\"Eosinophils\",\"result\":\"1\",\"normal_value\":\"1-8%\",\"unit\":\"\"},{\"parameter_name\":\"Basophils\",\"result\":\"1\",\"normal_value\":\"0-1%\",\"unit\":\"\"},{\"parameter_name\":\"Total Cir. Eosinophils\",\"result\":\"1\",\"normal_value\":\"50 - 450\",\"unit\":\"cumm\"},{\"parameter_name\":\"RBC COUNT\",\"result\":\"1\",\"normal_value\":\"M: 4.5 - 6.5, F: 3.8 - 5.8\",\"unit\":\"m\\/ul\"},{\"parameter_name\":\"HCT\\/PCV\",\"result\":\"1\",\"normal_value\":\"M: 40 - 54%, F: 37 - 47%\",\"unit\":\"\"},{\"parameter_name\":\"MCV\",\"result\":\"24fl\",\"normal_value\":\"76-94\",\"unit\":\"fL\"},{\"parameter_name\":\"MCH\",\"result\":\"27pg\",\"normal_value\":\"27-32\",\"unit\":\"pg\"},{\"parameter_name\":\"MCHC\",\"result\":\"29g\\/dl\",\"normal_value\":\"29-34\",\"unit\":\"g\\/dL\"},{\"parameter_name\":\"RDW-CV\",\"result\":\"10%\",\"normal_value\":\"10-16%\",\"unit\":\"\"},{\"parameter_name\":\"RDW-SD\",\"result\":\"35\",\"normal_value\":\"35-56\",\"unit\":\"fl\"},{\"parameter_name\":\"Platelet Count\",\"result\":\"1\",\"normal_value\":\"150000-400000\",\"unit\":\"mm\\u00b3\"},{\"parameter_name\":\"MPV\",\"result\":\"6.0\",\"normal_value\":\"7.0- 11.0\",\"unit\":\" fL\"},{\"parameter_name\":\"PDW\",\"result\":\"11%\",\"normal_value\":\"10- 18%\",\"unit\":\"\"},{\"parameter_name\":\"PCT\",\"result\":\"0.14%\",\"normal_value\":\"0.1-0.2%\",\"unit\":\"\"},{\"parameter_name\":\"P-LCR\",\"result\":\"40%\",\"normal_value\":\"11.0-45.0%\",\"unit\":\"\"},{\"parameter_name\":\"P-LCC\",\"result\":\"30\",\"normal_value\":\"30-90\",\"unit\":\"fL\"}]', NULL, NULL, 'HAEMATOLOGY', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-05 18:30:54', '2025-10-05 18:30:54'),
(287, 129, 220, 7, NULL, '{\"finding\":\"\\u2611\\ufe0f Both lung fields are clear.\\n\\u2611\\ufe0f No infiltration, consolidation, or pleural effusion seen.\\n\\u2611\\ufe0f Both hilar shadows are normal.\\n\\u2611\\ufe0f Cardiac shadow is normal in size and contour.\\n\\u2611\\ufe0f Diaphragm and costophrenic angles are clear.\\n\\u2611\\ufe0f Bony thoracic cage appears intact.\",\"comment\":\"\\u2611\\ufe0f Normal Chest X-Ray (PA View)\"}', NULL, 'X-Ray Chest PA View Digital', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-05 18:33:07', '2025-10-05 18:33:07'),
(288, 129, 198, 7, NULL, NULL, '{\"parameters\":[{\"parameter_name\":\"Fetal Anatomy Survey\",\"result\":\"Fetal presentation: ______ (cephalic \\/ breech \\/ transverse)\\nFetal lie & position: ______\\nFetal heart: Present, FHR ______ bpm, normal four-chamber view\\nHead & Brain: Normal shape, midline structures intact\\nFace: Normal orbits, nose, lips, palate intact\\nSpine: Normal alignment and echotexture\\nThorax & Heart: Normal size and position\\nAbdomen: Stomach, liver, spleen, kidneys, bladder normal\\nLimbs: All limbs visualized with normal movements\\nUmbilical cord: 3 vessels, normal insertion\\nPlacenta: Location ______, grade ______, no previa\\nAmniotic fluid: AFI ______ cm \\/ MVP ______ cm (adequate \\/ reduced \\/ increased)\"},{\"parameter_name\":\"Fetal Biometry\",\"result\":\"Biparietal Diameter (BPD)______ mm______ weeks\\nHead Circumference (HC)______ mm______ weeks\\nAbdominal Circumference (AC)______ mm______ weeks\\nFemur Length (FL)______ mm______ weeks\\nEstimated Fetal Weight (EFW)______ g______ weeks\\nOverall gestational age corresponds to ______ weeks ______ days.\"},{\"parameter_name\":\"Doppler Studies (if performed)\",\"result\":\"Uterus: Normal contour\\nCervix: Length ______ mm, normal\\nAdnexa: Normal \"},{\"parameter_name\":\"Maternal Findings\",\"result\":\"Uterus: Normal contour\\nCervix: Length ______ mm, normal\\nAdnexa: Normal \"}],\"impression\":\"1. Single live intrauterine fetus corresponding to ______ weeks ______ days.\\n2. No gross congenital anomaly detected.\\n3. Adequate amniotic fluid, normal placenta and cord.\\n4. Doppler studies within normal limits (if performed).\"}', 'USG of Pregnancy Profile', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-05 18:34:53', '2025-10-05 18:34:53'),
(289, 129, 220, 7, NULL, '{\"finding\":\"\\u2611\\ufe0f Both lung fields are clear., \\n\\u2611\\ufe0f No infiltration consolidation or pleural effusion seen., \\n\\u2611\\ufe0f Both hilar shadows are normal., \\n\\u2611\\ufe0f Cardiac shadow is normal in size and contour., \\n\\u2611\\ufe0f Diaphragm and costophrenic angles are clear., \\n\\u2611\\ufe0f Bony thoracic cage appears intact., \",\"comment\":\"\\u2611\\ufe0f Normal Chest X-Ray (PA View)\"}', NULL, 'X-Ray Chest PA View Digital', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-05 18:39:50', '2025-10-05 18:39:50'),
(290, 130, 200, 2, NULL, NULL, '{\"parameters\":[{\"parameter_name\":\"Right Kidney\",\"result\":\"Size: __________ \\u00d7 __________ \\u00d7 __________ cm\\nCorticomedullary differentiation: __________________\\nParenchymal echotexture: __________________ (normal \\/ echogenic \\/ heterogeneous)\\nFocal lesion \\/ cyst \\/ mass: __________________\\nHydronephrosis \\/ obstruction: __________________\",\"impression\":\"\"},{\"parameter_name\":\"Left Kidney\",\"result\":\"Size: __________ \\u00d7 __________ \\u00d7 __________ cm\\nCorticomedullary differentiation: __________________\\nParenchymal echotexture: __________________\\nFocal lesion \\/ cyst \\/ mass: __________________\\nHydronephrosis \\/ obstruction: __________________\"},{\"parameter_name\":\"Ureters\",\"result\":\"Right: __________________ (visualized \\/ not visualized \\/ dilated)\\nLeft: __________________ (visualized \\/ not visualized \\/ dilated)\"},{\"parameter_name\":\"Urinary Bladder\",\"result\":\"Wall thickness: __________ mm\\nContour: __________________\\nIntraluminal lesion \\/ stone: __________________\\nTrabeculation: __________________\"},{\"parameter_name\":\"Post-Void Residual (PVR)\",\"result\":\"Volume: __________ ml\\nSignificance: __________________ (normal \\/ elevated)\"},{\"parameter_name\":\"Other Findings\",\"result\":\"Free fluid in pelvis \\/ peritoneum: __________________\\nOther incidental findings: __________________\"}],\"impression\":\"1. Kidneys, ureters, and bladder appear normal.\\n2. No obstructive uropathy or calculi detected.\\n3. Post-void residual volume is __________ ml (normal \\/ elevated).\"}', 'USG of PVR/MCC/KUB', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-05 19:03:07', '2025-10-05 19:03:07'),
(291, 130, 220, 2, NULL, '{\"finding\":\"\",\"comment\":\"\"}', NULL, 'X-Ray Chest PA View Digital', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-05 19:03:15', '2025-10-05 19:03:15'),
(292, 130, 245, 2, '[{\"parameter_name\":\"Hemoglobin (Hb%)\",\"result\":\"9.4\",\"normal_value\":\"Male: 12-18, Female: 11-16\",\"unit\":\"gm\\/dl\"},{\"parameter_name\":\"ESR\",\"result\":\"15\",\"normal_value\":\"Male: 0-10, Female: 0-15\",\"unit\":\"mm\"},{\"parameter_name\":\"Total WBC Counts\",\"result\":\"1\",\"normal_value\":\"4000-11000\",\"unit\":\"mm\\u00b3\"},{\"parameter_name\":\"Differential Counts\",\"result\":\" \",\"normal_value\":\" \",\"unit\":\"\"},{\"parameter_name\":\"Neutrophils\",\"result\":\"1\",\"normal_value\":\"40-75%\",\"unit\":\"\"},{\"parameter_name\":\"Lymphocytes\",\"result\":\"1\",\"normal_value\":\"20-50%\",\"unit\":\"\"},{\"parameter_name\":\"Monocytes\",\"result\":\"1\",\"normal_value\":\"2-10%\",\"unit\":\"\"},{\"parameter_name\":\"Eosinophils\",\"result\":\"1\",\"normal_value\":\"1-8%\",\"unit\":\"\"},{\"parameter_name\":\"Basophils\",\"result\":\"1\",\"normal_value\":\"0-1%\",\"unit\":\"\"},{\"parameter_name\":\"Total Cir. Eosinophils\",\"result\":\"1\",\"normal_value\":\"50 - 450\",\"unit\":\"cumm\"},{\"parameter_name\":\"RBC COUNT\",\"result\":\"1\",\"normal_value\":\"M: 4.5 - 6.5, F: 3.8 - 5.8\",\"unit\":\"m\\/ul\"},{\"parameter_name\":\"HCT\\/PCV\",\"result\":\"1\",\"normal_value\":\"M: 40 - 54%, F: 37 - 47%\",\"unit\":\"\"},{\"parameter_name\":\"MCV\",\"result\":\"24fl\",\"normal_value\":\"76-94\",\"unit\":\"fL\"},{\"parameter_name\":\"MCH\",\"result\":\"27pg\",\"normal_value\":\"27-32\",\"unit\":\"pg\"},{\"parameter_name\":\"MCHC\",\"result\":\"29g\\/dl\",\"normal_value\":\"29-34\",\"unit\":\"g\\/dL\"},{\"parameter_name\":\"RDW-CV\",\"result\":\"10%\",\"normal_value\":\"10-16%\",\"unit\":\"\"},{\"parameter_name\":\"RDW-SD\",\"result\":\"35\",\"normal_value\":\"35-56\",\"unit\":\"fl\"},{\"parameter_name\":\"Platelet Count\",\"result\":\"1\",\"normal_value\":\"150000-400000\",\"unit\":\"mm\\u00b3\"},{\"parameter_name\":\"MPV\",\"result\":\"6.0\",\"normal_value\":\"7.0- 11.0\",\"unit\":\" fL\"},{\"parameter_name\":\"PDW\",\"result\":\"11%\",\"normal_value\":\"10- 18%\",\"unit\":\"\"},{\"parameter_name\":\"PCT\",\"result\":\"0.14%\",\"normal_value\":\"0.1-0.2%\",\"unit\":\"\"},{\"parameter_name\":\"P-LCR\",\"result\":\"40%\",\"normal_value\":\"11.0-45.0%\",\"unit\":\"\"},{\"parameter_name\":\"P-LCC\",\"result\":\"30\",\"normal_value\":\"30-90\",\"unit\":\"fL\"}]', NULL, NULL, 'HAEMATOLOGY', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-05 19:03:21', '2025-10-05 19:03:21'),
(293, 130, 245, 2, '[{\"parameter_name\":\"Hemoglobin (Hb%)\",\"result\":\"9.4\",\"normal_value\":\"Male: 12-18, Female: 11-16\",\"unit\":\"gm\\/dl\"},{\"parameter_name\":\"ESR\",\"result\":\"15\",\"normal_value\":\"Male: 0-10, Female: 0-15\",\"unit\":\"mm\"},{\"parameter_name\":\"Total WBC Counts\",\"result\":\"1\",\"normal_value\":\"4000-11000\",\"unit\":\"mm\\u00b3\"},{\"parameter_name\":\"Differential Counts\",\"result\":\" \",\"normal_value\":\" \",\"unit\":\"\"},{\"parameter_name\":\"Neutrophils\",\"result\":\"1\",\"normal_value\":\"40-75%\",\"unit\":\"\"},{\"parameter_name\":\"Lymphocytes\",\"result\":\"1\",\"normal_value\":\"20-50%\",\"unit\":\"\"},{\"parameter_name\":\"Monocytes\",\"result\":\"1\",\"normal_value\":\"2-10%\",\"unit\":\"\"},{\"parameter_name\":\"Eosinophils\",\"result\":\"1\",\"normal_value\":\"1-8%\",\"unit\":\"\"},{\"parameter_name\":\"Basophils\",\"result\":\"1\",\"normal_value\":\"0-1%\",\"unit\":\"\"},{\"parameter_name\":\"Total Cir. Eosinophils\",\"result\":\"1\",\"normal_value\":\"50 - 450\",\"unit\":\"cumm\"},{\"parameter_name\":\"RBC COUNT\",\"result\":\"1\",\"normal_value\":\"M: 4.5 - 6.5, F: 3.8 - 5.8\",\"unit\":\"m\\/ul\"},{\"parameter_name\":\"HCT\\/PCV\",\"result\":\"1\",\"normal_value\":\"M: 40 - 54%, F: 37 - 47%\",\"unit\":\"\"},{\"parameter_name\":\"MCV\",\"result\":\"24fl\",\"normal_value\":\"76-94\",\"unit\":\"fL\"},{\"parameter_name\":\"MCH\",\"result\":\"27pg\",\"normal_value\":\"27-32\",\"unit\":\"pg\"},{\"parameter_name\":\"MCHC\",\"result\":\"29g\\/dl\",\"normal_value\":\"29-34\",\"unit\":\"g\\/dL\"},{\"parameter_name\":\"RDW-CV\",\"result\":\"10%\",\"normal_value\":\"10-16%\",\"unit\":\"\"},{\"parameter_name\":\"RDW-SD\",\"result\":\"35\",\"normal_value\":\"35-56\",\"unit\":\"fl\"},{\"parameter_name\":\"Platelet Count\",\"result\":\"1\",\"normal_value\":\"150000-400000\",\"unit\":\"mm\\u00b3\"},{\"parameter_name\":\"MPV\",\"result\":\"6.0\",\"normal_value\":\"7.0- 11.0\",\"unit\":\" fL\"},{\"parameter_name\":\"PDW\",\"result\":\"11%\",\"normal_value\":\"10- 18%\",\"unit\":\"\"},{\"parameter_name\":\"PCT\",\"result\":\"0.14%\",\"normal_value\":\"0.1-0.2%\",\"unit\":\"\"},{\"parameter_name\":\"P-LCR\",\"result\":\"40%\",\"normal_value\":\"11.0-45.0%\",\"unit\":\"\"},{\"parameter_name\":\"P-LCC\",\"result\":\"30\",\"normal_value\":\"30-90\",\"unit\":\"fL\"}]', NULL, NULL, 'HAEMATOLOGY', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-05 19:04:55', '2025-10-05 19:04:55'),
(294, 130, 245, 2, '[{\"parameter_name\":\"Hemoglobin (Hb%)\",\"result\":\"9.4\",\"normal_value\":\"Male: 12-18, Female: 11-16\",\"unit\":\"gm\\/dl\"},{\"parameter_name\":\"ESR\",\"result\":\"15\",\"normal_value\":\"Male: 0-10, Female: 0-15\",\"unit\":\"mm\"},{\"parameter_name\":\"Total WBC Counts\",\"result\":\"1\",\"normal_value\":\"4000-11000\",\"unit\":\"mm\\u00b3\"},{\"parameter_name\":\"Differential Counts\",\"result\":\" \",\"normal_value\":\" \",\"unit\":\"\"},{\"parameter_name\":\"Neutrophils\",\"result\":\"1\",\"normal_value\":\"40-75%\",\"unit\":\"\"},{\"parameter_name\":\"Lymphocytes\",\"result\":\"1\",\"normal_value\":\"20-50%\",\"unit\":\"\"},{\"parameter_name\":\"Monocytes\",\"result\":\"1\",\"normal_value\":\"2-10%\",\"unit\":\"\"},{\"parameter_name\":\"Eosinophils\",\"result\":\"1\",\"normal_value\":\"1-8%\",\"unit\":\"\"},{\"parameter_name\":\"Basophils\",\"result\":\"1\",\"normal_value\":\"0-1%\",\"unit\":\"\"},{\"parameter_name\":\"Total Cir. Eosinophils\",\"result\":\"1\",\"normal_value\":\"50 - 450\",\"unit\":\"cumm\"},{\"parameter_name\":\"RBC COUNT\",\"result\":\"1\",\"normal_value\":\"M: 4.5 - 6.5, F: 3.8 - 5.8\",\"unit\":\"m\\/ul\"},{\"parameter_name\":\"HCT\\/PCV\",\"result\":\"1\",\"normal_value\":\"M: 40 - 54%, F: 37 - 47%\",\"unit\":\"\"},{\"parameter_name\":\"MCV\",\"result\":\"24fl\",\"normal_value\":\"76-94\",\"unit\":\"fL\"},{\"parameter_name\":\"MCH\",\"result\":\"27pg\",\"normal_value\":\"27-32\",\"unit\":\"pg\"},{\"parameter_name\":\"MCHC\",\"result\":\"29g\\/dl\",\"normal_value\":\"29-34\",\"unit\":\"g\\/dL\"},{\"parameter_name\":\"RDW-CV\",\"result\":\"10%\",\"normal_value\":\"10-16%\",\"unit\":\"\"},{\"parameter_name\":\"RDW-SD\",\"result\":\"35\",\"normal_value\":\"35-56\",\"unit\":\"fl\"},{\"parameter_name\":\"Platelet Count\",\"result\":\"1\",\"normal_value\":\"150000-400000\",\"unit\":\"mm\\u00b3\"},{\"parameter_name\":\"MPV\",\"result\":\"6.0\",\"normal_value\":\"7.0- 11.0\",\"unit\":\" fL\"},{\"parameter_name\":\"PDW\",\"result\":\"11%\",\"normal_value\":\"10- 18%\",\"unit\":\"\"},{\"parameter_name\":\"PCT\",\"result\":\"0.14%\",\"normal_value\":\"0.1-0.2%\",\"unit\":\"\"},{\"parameter_name\":\"P-LCR\",\"result\":\"40%\",\"normal_value\":\"11.0-45.0%\",\"unit\":\"\"},{\"parameter_name\":\"P-LCC\",\"result\":\"30\",\"normal_value\":\"30-90\",\"unit\":\"fL\"}]', NULL, NULL, 'HAEMATOLOGY', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-05 19:06:26', '2025-10-05 19:06:26'),
(295, 131, 15, 5, '[{\"parameter_name\":\"Random Plasma Glucose\",\"result\":\"1\",\"normal_value\":\"< 140\",\"unit\":\"mg\\/dL\"}]', NULL, NULL, 'BIOCHEMISTRY', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-05 19:08:18', '2025-10-05 19:08:18'),
(296, 131, 200, 5, NULL, NULL, '{\"parameters\":[{\"parameter_name\":\"Right Kidney\",\"result\":\"Size: __________ \\u00d7 __________ \\u00d7 __________ cm\\nCorticomedullary differentiation: __________________\\nParenchymal echotexture: __________________ (normal \\/ echogenic \\/ heterogeneous)\\nFocal lesion \\/ cyst \\/ mass: __________________\\nHydronephrosis \\/ obstruction: __________________\",\"impression\":\"\"},{\"parameter_name\":\"Left Kidney\",\"result\":\"Size: __________ \\u00d7 __________ \\u00d7 __________ cm\\nCorticomedullary differentiation: __________________\\nParenchymal echotexture: __________________\\nFocal lesion \\/ cyst \\/ mass: __________________\\nHydronephrosis \\/ obstruction: __________________\"},{\"parameter_name\":\"Ureters\",\"result\":\"Right: __________________ (visualized \\/ not visualized \\/ dilated)\\nLeft: __________________ (visualized \\/ not visualized \\/ dilated)\"},{\"parameter_name\":\"Urinary Bladder\",\"result\":\"Wall thickness: __________ mm\\nContour: __________________\\nIntraluminal lesion \\/ stone: __________________\\nTrabeculation: __________________\"},{\"parameter_name\":\"Post-Void Residual (PVR)\",\"result\":\"Volume: __________ ml\\nSignificance: __________________ (normal \\/ elevated)\"},{\"parameter_name\":\"Other Findings\",\"result\":\"Free fluid in pelvis \\/ peritoneum: __________________\\nOther incidental findings: __________________\"}],\"impression\":\"1. Kidneys, ureters, and bladder appear normal.\\n2. No obstructive uropathy or calculi detected.\\n3. Post-void residual volume is __________ ml (normal \\/ elevated).\"}', 'USG of PVR/MCC/KUB', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-05 19:08:24', '2025-10-05 19:08:24'),
(297, 131, 245, 5, '[{\"parameter_name\":\"Hemoglobin (Hb%)\",\"result\":\"9.4\",\"normal_value\":\"Male: 12-18, Female: 11-16\",\"unit\":\"gm\\/dl\"},{\"parameter_name\":\"ESR\",\"result\":\"15\",\"normal_value\":\"Male: 0-10, Female: 0-15\",\"unit\":\"mm\"},{\"parameter_name\":\"Total WBC Counts\",\"result\":\"1\",\"normal_value\":\"4000-11000\",\"unit\":\"mm\\u00b3\"},{\"parameter_name\":\"Differential Counts\",\"result\":\" \",\"normal_value\":\" \",\"unit\":\"\"},{\"parameter_name\":\"Neutrophils\",\"result\":\"1\",\"normal_value\":\"40-75%\",\"unit\":\"\"},{\"parameter_name\":\"Lymphocytes\",\"result\":\"1\",\"normal_value\":\"20-50%\",\"unit\":\"\"},{\"parameter_name\":\"Monocytes\",\"result\":\"1\",\"normal_value\":\"2-10%\",\"unit\":\"\"},{\"parameter_name\":\"Eosinophils\",\"result\":\"1\",\"normal_value\":\"1-8%\",\"unit\":\"\"},{\"parameter_name\":\"Basophils\",\"result\":\"1\",\"normal_value\":\"0-1%\",\"unit\":\"\"},{\"parameter_name\":\"Total Cir. Eosinophils\",\"result\":\"1\",\"normal_value\":\"50 - 450\",\"unit\":\"cumm\"},{\"parameter_name\":\"RBC COUNT\",\"result\":\"1\",\"normal_value\":\"M: 4.5 - 6.5, F: 3.8 - 5.8\",\"unit\":\"m\\/ul\"},{\"parameter_name\":\"HCT\\/PCV\",\"result\":\"1\",\"normal_value\":\"M: 40 - 54%, F: 37 - 47%\",\"unit\":\"\"},{\"parameter_name\":\"MCV\",\"result\":\"24fl\",\"normal_value\":\"76-94\",\"unit\":\"fL\"},{\"parameter_name\":\"MCH\",\"result\":\"27pg\",\"normal_value\":\"27-32\",\"unit\":\"pg\"},{\"parameter_name\":\"MCHC\",\"result\":\"29g\\/dl\",\"normal_value\":\"29-34\",\"unit\":\"g\\/dL\"},{\"parameter_name\":\"RDW-CV\",\"result\":\"10%\",\"normal_value\":\"10-16%\",\"unit\":\"\"},{\"parameter_name\":\"RDW-SD\",\"result\":\"35\",\"normal_value\":\"35-56\",\"unit\":\"fl\"},{\"parameter_name\":\"Platelet Count\",\"result\":\"1\",\"normal_value\":\"150000-400000\",\"unit\":\"mm\\u00b3\"},{\"parameter_name\":\"MPV\",\"result\":\"6.0\",\"normal_value\":\"7.0- 11.0\",\"unit\":\" fL\"},{\"parameter_name\":\"PDW\",\"result\":\"11%\",\"normal_value\":\"10- 18%\",\"unit\":\"\"},{\"parameter_name\":\"PCT\",\"result\":\"0.14%\",\"normal_value\":\"0.1-0.2%\",\"unit\":\"\"},{\"parameter_name\":\"P-LCR\",\"result\":\"40%\",\"normal_value\":\"11.0-45.0%\",\"unit\":\"\"},{\"parameter_name\":\"P-LCC\",\"result\":\"30\",\"normal_value\":\"30-90\",\"unit\":\"fL\"}]', NULL, NULL, 'HAEMATOLOGY', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-05 19:08:30', '2025-10-05 19:08:30'),
(298, 131, 200, 5, NULL, NULL, '{\"parameters\":[{\"parameter_name\":\"Right Kidney\",\"result\":\"Size: __________ \\u00d7 __________ \\u00d7 __________ cm\\nCorticomedullary differentiation: __________________\\nParenchymal echotexture: __________________ (normal \\/ echogenic \\/ heterogeneous)\\nFocal lesion \\/ cyst \\/ mass: __________________\\nHydronephrosis \\/ obstruction: __________________\",\"impression\":\"\"},{\"parameter_name\":\"Left Kidney\",\"result\":\"Size: __________ \\u00d7 __________ \\u00d7 __________ cm\\nCorticomedullary differentiation: __________________\\nParenchymal echotexture: __________________\\nFocal lesion \\/ cyst \\/ mass: __________________\\nHydronephrosis \\/ obstruction: __________________\"},{\"parameter_name\":\"Ureters\",\"result\":\"Right: __________________ (visualized \\/ not visualized \\/ dilated)\\nLeft: __________________ (visualized \\/ not visualized \\/ dilated)\"},{\"parameter_name\":\"Urinary Bladder\",\"result\":\"Wall thickness: __________ mm\\nContour: __________________\\nIntraluminal lesion \\/ stone: __________________\\nTrabeculation: __________________\"},{\"parameter_name\":\"Post-Void Residual (PVR)\",\"result\":\"Volume: __________ ml\\nSignificance: __________________ (normal \\/ elevated)\"},{\"parameter_name\":\"Other Findings\",\"result\":\"Free fluid in pelvis \\/ peritoneum: __________________\\nOther incidental findings: __________________\"}],\"impression\":\"1. Kidneys, ureters, and bladder appear normal.\\n2. No obstructive uropathy or calculi detected.\\n3. Post-void residual volume is __________ ml (normal \\/ elevated).\"}', 'USG of PVR/MCC/KUB', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-05 19:26:25', '2025-10-05 19:26:25'),
(299, 132, 220, 10, NULL, '{\"finding\":\"\",\"comment\":\"\"}', NULL, 'X-Ray Chest PA View Digital', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-05 19:38:00', '2025-10-05 19:38:00'),
(300, 132, 245, 10, '[{\"parameter_name\":\"Hemoglobin (Hb%)\",\"result\":\"9.4\",\"normal_value\":\"Male: 12-18, Female: 11-16\",\"unit\":\"gm\\/dl\"},{\"parameter_name\":\"ESR\",\"result\":\"15\",\"normal_value\":\"Male: 0-10, Female: 0-15\",\"unit\":\"mm\"},{\"parameter_name\":\"Total WBC Counts\",\"result\":\"1\",\"normal_value\":\"4000-11000\",\"unit\":\"mm\\u00b3\"},{\"parameter_name\":\"Differential Counts\",\"result\":\" \",\"normal_value\":\" \",\"unit\":\"\"},{\"parameter_name\":\"Neutrophils\",\"result\":\"1\",\"normal_value\":\"40-75%\",\"unit\":\"\"},{\"parameter_name\":\"Lymphocytes\",\"result\":\"1\",\"normal_value\":\"20-50%\",\"unit\":\"\"},{\"parameter_name\":\"Monocytes\",\"result\":\"1\",\"normal_value\":\"2-10%\",\"unit\":\"\"},{\"parameter_name\":\"Eosinophils\",\"result\":\"1\",\"normal_value\":\"1-8%\",\"unit\":\"\"},{\"parameter_name\":\"Basophils\",\"result\":\"1\",\"normal_value\":\"0-1%\",\"unit\":\"\"},{\"parameter_name\":\"Total Cir. Eosinophils\",\"result\":\"1\",\"normal_value\":\"50 - 450\",\"unit\":\"cumm\"},{\"parameter_name\":\"RBC COUNT\",\"result\":\"1\",\"normal_value\":\"M: 4.5 - 6.5, F: 3.8 - 5.8\",\"unit\":\"m\\/ul\"},{\"parameter_name\":\"HCT\\/PCV\",\"result\":\"1\",\"normal_value\":\"M: 40 - 54%, F: 37 - 47%\",\"unit\":\"\"},{\"parameter_name\":\"MCV\",\"result\":\"24fl\",\"normal_value\":\"76-94\",\"unit\":\"fL\"},{\"parameter_name\":\"MCH\",\"result\":\"27pg\",\"normal_value\":\"27-32\",\"unit\":\"pg\"},{\"parameter_name\":\"MCHC\",\"result\":\"29g\\/dl\",\"normal_value\":\"29-34\",\"unit\":\"g\\/dL\"},{\"parameter_name\":\"RDW-CV\",\"result\":\"10%\",\"normal_value\":\"10-16%\",\"unit\":\"\"},{\"parameter_name\":\"RDW-SD\",\"result\":\"35\",\"normal_value\":\"35-56\",\"unit\":\"fl\"},{\"parameter_name\":\"Platelet Count\",\"result\":\"1\",\"normal_value\":\"150000-400000\",\"unit\":\"mm\\u00b3\"},{\"parameter_name\":\"MPV\",\"result\":\"6.0\",\"normal_value\":\"7.0- 11.0\",\"unit\":\" fL\"},{\"parameter_name\":\"PDW\",\"result\":\"11%\",\"normal_value\":\"10- 18%\",\"unit\":\"\"},{\"parameter_name\":\"PCT\",\"result\":\"0.14%\",\"normal_value\":\"0.1-0.2%\",\"unit\":\"\"},{\"parameter_name\":\"P-LCR\",\"result\":\"40%\",\"normal_value\":\"11.0-45.0%\",\"unit\":\"\"},{\"parameter_name\":\"P-LCC\",\"result\":\"30\",\"normal_value\":\"30-90\",\"unit\":\"fL\"}]', NULL, NULL, 'HAEMATOLOGY', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-05 19:38:05', '2025-10-05 19:38:05'),
(301, 133, 43, 8, '[{\"parameter_name\":\"Dengue NS1 Antigen\",\"result\":\"1\",\"normal_value\":\"Negative\",\"unit\":\"\"}]', NULL, NULL, 'SEROLOGY', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-05 19:41:37', '2025-10-05 19:41:37'),
(302, 134, 44, 8, '[{\"parameter_name\":\"Dengue IgM\",\"result\":\"1\",\"normal_value\":\"Negative\",\"unit\":\"\"},{\"parameter_name\":\"Dengue IgG\",\"result\":\"1\",\"normal_value\":\"Negative\",\"unit\":\"\"}]', NULL, NULL, 'SEROLOGY', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-05 19:46:06', '2025-10-05 19:46:06'),
(303, 135, 100, 4, '[{\"parameter_name\":\"TROPONIN-I\",\"result\":\"1\",\"normal_value\":\"Positive=>0.5, Negative= <0.5\",\"unit\":\"ng\\/ml\"}]', NULL, NULL, 'IMMUNOLOGICAL TEST', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-05 20:12:49', '2025-10-05 20:12:49'),
(304, 135, 220, 4, NULL, '{\"finding\":\"\",\"comment\":\"\"}', NULL, 'X-Ray Chest PA View Digital', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-05 20:12:53', '2025-10-05 20:12:53'),
(305, 135, 261, 4, NULL, NULL, '{\"parameters\":[{\"parameter_name\":\"Liver\",\"result\":\"Size: __________________ cm\\nEchotexture: __________________ (normal \\/ fatty \\/ coarse)\\nSurface: __________________ (smooth \\/ irregular)\\nFocal lesion: __________________ (absent \\/ present \\u2013 describe)\\nIntrahepatic biliary radicals: __________________\\nHepatic vessels & portal vein: __________________\"},{\"parameter_name\":\"Gallbladder & Biliary System\",\"result\":\"Wall thickness: __________ mm\\nStones \\/ sludge \\/ polyps: __________________\\nPericholecystic fluid: __________________\\nCommon bile duct (CBD) diameter: __________ mm\\nIntra \\/ extrahepatic biliary dilatation: __________________\"},{\"parameter_name\":\"Pancreas\",\"result\":\"Size & echotexture: __________________\\nFocal lesion \\/ cyst \\/ calcification: __________________\\nPancreatic duct: __________________\"},{\"parameter_name\":\"Spleen\",\"result\":\"Size: __________ cm\\nEchotexture: __________________\\nFocal lesion: __________________\"},{\"parameter_name\":\"Right Kidney\",\"result\":\"Size: __________ \\u00d7 __________ cm\\nCorticomedullary differentiation: __________________\\nStones \\/ cysts \\/ masses: __________________\\nHydronephrosis: __________________\"},{\"parameter_name\":\"Left Kidney\",\"result\":\"Size: __________ \\u00d7 __________ cm\\nCorticomedullary differentiation: __________________\\nStones \\/ cysts \\/ masses: __________________\\nHydronephrosis: __________________\"},{\"parameter_name\":\"Adrenals\",\"result\":\"Right adrenal: __________________\\nLeft adrenal: __________________\"},{\"parameter_name\":\"Urinary Bladder & Pelvis\",\"result\":\"Wall thickness \\/ contour: __________________\\nLesions \\/ trabeculation: __________________\\nPost-void residual: __________________\"},{\"parameter_name\":\"Vessels & Retroperitoneum\",\"result\":\"Abdominal aorta: Diameter __________ mm, plaques \\/ aneurysm: __________________\\nIVC: __________________\\nPara-aortic lymph nodes: __________________\"},{\"parameter_name\":\"Peritoneum \\/ Others\",\"result\":\"Free fluid \\/ ascites: __________________\\nAny masses: __________________\"}],\"impression\":\"1. Liver, gallbladder, pancreas, spleen, kidneys, and urinary bladder appear normal.\\n2. No focal lesion or abnormal fluid collection seen.\\n3. No evidence of hydronephrosis or biliary obstruction.\"}', 'USG of Whole Abdomen 4D', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-05 20:12:58', '2025-10-05 20:12:58'),
(306, 136, 245, 4, '[{\"parameter_name\":\"Hemoglobin (Hb%)\",\"result\":\"9.4\",\"normal_value\":\"Male: 12-18, Female: 11-16\",\"unit\":\"gm\\/dl\"},{\"parameter_name\":\"ESR\",\"result\":\"15\",\"normal_value\":\"Male: 0-10, Female: 0-15\",\"unit\":\"mm\"},{\"parameter_name\":\"Total WBC Counts\",\"result\":\"1\",\"normal_value\":\"4000-11000\",\"unit\":\"mm\\u00b3\"},{\"parameter_name\":\"Differential Counts\",\"result\":\" \",\"normal_value\":\" \",\"unit\":\"\"},{\"parameter_name\":\"Neutrophils\",\"result\":\"1\",\"normal_value\":\"40-75%\",\"unit\":\"\"},{\"parameter_name\":\"Lymphocytes\",\"result\":\"1\",\"normal_value\":\"20-50%\",\"unit\":\"\"},{\"parameter_name\":\"Monocytes\",\"result\":\"1\",\"normal_value\":\"2-10%\",\"unit\":\"\"},{\"parameter_name\":\"Eosinophils\",\"result\":\"1\",\"normal_value\":\"1-8%\",\"unit\":\"\"},{\"parameter_name\":\"Basophils\",\"result\":\"1\",\"normal_value\":\"0-1%\",\"unit\":\"\"},{\"parameter_name\":\"Total Cir. Eosinophils\",\"result\":\"1\",\"normal_value\":\"50 - 450\",\"unit\":\"cumm\"},{\"parameter_name\":\"RBC COUNT\",\"result\":\"1\",\"normal_value\":\"M: 4.5 - 6.5, F: 3.8 - 5.8\",\"unit\":\"m\\/ul\"},{\"parameter_name\":\"HCT\\/PCV\",\"result\":\"1\",\"normal_value\":\"M: 40 - 54%, F: 37 - 47%\",\"unit\":\"\"},{\"parameter_name\":\"MCV\",\"result\":\"24fl\",\"normal_value\":\"76-94\",\"unit\":\"fL\"},{\"parameter_name\":\"MCH\",\"result\":\"27pg\",\"normal_value\":\"27-32\",\"unit\":\"pg\"},{\"parameter_name\":\"MCHC\",\"result\":\"29g\\/dl\",\"normal_value\":\"29-34\",\"unit\":\"g\\/dL\"},{\"parameter_name\":\"RDW-CV\",\"result\":\"10%\",\"normal_value\":\"10-16%\",\"unit\":\"\"},{\"parameter_name\":\"RDW-SD\",\"result\":\"35\",\"normal_value\":\"35-56\",\"unit\":\"fl\"},{\"parameter_name\":\"Platelet Count\",\"result\":\"1\",\"normal_value\":\"150000-400000\",\"unit\":\"mm\\u00b3\"},{\"parameter_name\":\"MPV\",\"result\":\"6.0\",\"normal_value\":\"7.0- 11.0\",\"unit\":\" fL\"},{\"parameter_name\":\"PDW\",\"result\":\"11%\",\"normal_value\":\"10- 18%\",\"unit\":\"\"},{\"parameter_name\":\"PCT\",\"result\":\"0.14%\",\"normal_value\":\"0.1-0.2%\",\"unit\":\"\"},{\"parameter_name\":\"P-LCR\",\"result\":\"40%\",\"normal_value\":\"11.0-45.0%\",\"unit\":\"\"},{\"parameter_name\":\"P-LCC\",\"result\":\"30\",\"normal_value\":\"30-90\",\"unit\":\"fL\"}]', NULL, NULL, 'HAEMATOLOGY', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-06 05:51:27', '2025-10-06 05:51:27'),
(307, 136, 261, 4, NULL, NULL, '{\"parameters\":[{\"parameter_name\":\"Liver\",\"result\":\"Size: __________________ cm\\nEchotexture: __________________ (normal \\/ fatty \\/ coarse)\\nSurface: __________________ (smooth \\/ irregular)\\nFocal lesion: __________________ (absent \\/ present \\u2013 describe)\\nIntrahepatic biliary radicals: __________________\\nHepatic vessels & portal vein: __________________\"},{\"parameter_name\":\"Gallbladder & Biliary System\",\"result\":\"Wall thickness: __________ mm\\nStones \\/ sludge \\/ polyps: __________________\\nPericholecystic fluid: __________________\\nCommon bile duct (CBD) diameter: __________ mm\\nIntra \\/ extrahepatic biliary dilatation: __________________\"},{\"parameter_name\":\"Pancreas\",\"result\":\"Size & echotexture: __________________\\nFocal lesion \\/ cyst \\/ calcification: __________________\\nPancreatic duct: __________________\"},{\"parameter_name\":\"Spleen\",\"result\":\"Size: __________ cm\\nEchotexture: __________________\\nFocal lesion: __________________\"},{\"parameter_name\":\"Right Kidney\",\"result\":\"Size: __________ \\u00d7 __________ cm\\nCorticomedullary differentiation: __________________\\nStones \\/ cysts \\/ masses: __________________\\nHydronephrosis: __________________\"},{\"parameter_name\":\"Left Kidney\",\"result\":\"Size: __________ \\u00d7 __________ cm\\nCorticomedullary differentiation: __________________\\nStones \\/ cysts \\/ masses: __________________\\nHydronephrosis: __________________\"},{\"parameter_name\":\"Adrenals\",\"result\":\"Right adrenal: __________________\\nLeft adrenal: __________________\"},{\"parameter_name\":\"Urinary Bladder & Pelvis\",\"result\":\"Wall thickness \\/ contour: __________________\\nLesions \\/ trabeculation: __________________\\nPost-void residual: __________________\"},{\"parameter_name\":\"Vessels & Retroperitoneum\",\"result\":\"Abdominal aorta: Diameter __________ mm, plaques \\/ aneurysm: __________________\\nIVC: __________________\\nPara-aortic lymph nodes: __________________\"},{\"parameter_name\":\"Peritoneum \\/ Others\",\"result\":\"Free fluid \\/ ascites: __________________\\nAny masses: __________________\"}],\"impression\":\"1. Liver, gallbladder, pancreas, spleen, kidneys, and urinary bladder appear normal.\\n2. No focal lesion or abnormal fluid collection seen.\\n3. No evidence of hydronephrosis or biliary obstruction.\"}', 'USG of Whole Abdomen 4D', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-06 05:51:34', '2025-10-06 05:51:34'),
(308, 136, 16, 4, '[{\"parameter_name\":\"Serum Creatinine\",\"result\":\"1\",\"normal_value\":\"0.6\\u2013 1.3\",\"unit\":\"mg\\/dL\"}]', NULL, NULL, 'BIOCHEMISTRY', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-06 05:51:39', '2025-10-06 05:51:39'),
(309, 136, 220, 4, NULL, '{\"finding\":\"\",\"comment\":\"\"}', NULL, 'X-Ray Chest PA View Digital', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-06 05:51:45', '2025-10-06 05:51:45'),
(310, 137, 16, 7, '[{\"parameter_name\":\"Serum Creatinine\",\"result\":\"1\",\"normal_value\":\"0.6\\u2013 1.3\",\"unit\":\"mg\\/dL\"}]', NULL, NULL, 'BIOCHEMISTRY', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-06 19:50:08', '2025-10-06 19:50:08'),
(311, 137, 17, 7, '[{\"parameter_name\":\"Electrolytes \",\"result\":\" \",\"normal_value\":\" \",\"unit\":\"\"},{\"parameter_name\":\"Serum Sodium (Na\\u207a)\",\"result\":\"1\",\"normal_value\":\"135 \\u2013 148\",\"unit\":\"mmol\\/L\"},{\"parameter_name\":\"Serum Potasium (K\\u207a)\",\"result\":\"1\",\"normal_value\":\"3.5 \\u2013 5.3\",\"unit\":\"mmol\\/L\"},{\"parameter_name\":\"Serum Chloride (Cl\\u207b)\",\"result\":\"1\",\"normal_value\":\"98 \\u2013 107\",\"unit\":\"mmol\\/L\"}]', NULL, NULL, 'BIOCHEMISTRY', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-06 19:50:12', '2025-10-06 19:50:12'),
(312, 137, 198, 7, NULL, NULL, '{\"parameters\":[{\"parameter_name\":\"Fetal Anatomy Survey\",\"result\":\"Fetal presentation: ______ (cephalic \\/ breech \\/ transverse)\\nFetal lie & position: ______\\nFetal heart: Present, FHR ______ bpm, normal four-chamber view\\nHead & Brain: Normal shape, midline structures intact\\nFace: Normal orbits, nose, lips, palate intact\\nSpine: Normal alignment and echotexture\\nThorax & Heart: Normal size and position\\nAbdomen: Stomach, liver, spleen, kidneys, bladder normal\\nLimbs: All limbs visualized with normal movements\\nUmbilical cord: 3 vessels, normal insertion\\nPlacenta: Location ______, grade ______, no previa\\nAmniotic fluid: AFI ______ cm \\/ MVP ______ cm (adequate \\/ reduced \\/ increased)\"},{\"parameter_name\":\"Fetal Biometry\",\"result\":\"Biparietal Diameter (BPD)______ mm______ weeks\\nHead Circumference (HC)______ mm______ weeks\\nAbdominal Circumference (AC)______ mm______ weeks\\nFemur Length (FL)______ mm______ weeks\\nEstimated Fetal Weight (EFW)______ g______ weeks\\nOverall gestational age corresponds to ______ weeks ______ days.\"},{\"parameter_name\":\"Doppler Studies (if performed)\",\"result\":\"Uterus: Normal contour\\nCervix: Length ______ mm, normal\\nAdnexa: Normal \"},{\"parameter_name\":\"Maternal Findings\",\"result\":\"Uterus: Normal contour\\nCervix: Length ______ mm, normal\\nAdnexa: Normal \"}],\"impression\":\"1. Single live intrauterine fetus corresponding to ______ weeks ______ days.\\n2. No gross congenital anomaly detected.\\n3. Adequate amniotic fluid, normal placenta and cord.\\n4. Doppler studies within normal limits (if performed).\"}', 'USG of Pregnancy Profile', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-06 19:50:18', '2025-10-06 19:50:18'),
(313, 137, 220, 7, NULL, '{\"finding\":\"\",\"comment\":\"\"}', NULL, 'X-Ray Chest PA View Digital', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-06 19:50:23', '2025-10-06 19:50:23'),
(314, 137, 245, 7, '[{\"parameter_name\":\"Hemoglobin (Hb%)\",\"result\":\"9.4\",\"normal_value\":\"Male: 12-18, Female: 11-16\",\"unit\":\"gm\\/dl\"},{\"parameter_name\":\"ESR\",\"result\":\"15\",\"normal_value\":\"Male: 0-10, Female: 0-15\",\"unit\":\"mm\"},{\"parameter_name\":\"Total WBC Counts\",\"result\":\"1\",\"normal_value\":\"4000-11000\",\"unit\":\"mm\\u00b3\"},{\"parameter_name\":\"Differential Counts\",\"result\":\" \",\"normal_value\":\" \",\"unit\":\"\"},{\"parameter_name\":\"Neutrophils\",\"result\":\"1\",\"normal_value\":\"40-75%\",\"unit\":\"\"},{\"parameter_name\":\"Lymphocytes\",\"result\":\"1\",\"normal_value\":\"20-50%\",\"unit\":\"\"},{\"parameter_name\":\"Monocytes\",\"result\":\"1\",\"normal_value\":\"2-10%\",\"unit\":\"\"},{\"parameter_name\":\"Eosinophils\",\"result\":\"1\",\"normal_value\":\"1-8%\",\"unit\":\"\"},{\"parameter_name\":\"Basophils\",\"result\":\"1\",\"normal_value\":\"0-1%\",\"unit\":\"\"},{\"parameter_name\":\"Total Cir. Eosinophils\",\"result\":\"1\",\"normal_value\":\"50 - 450\",\"unit\":\"cumm\"},{\"parameter_name\":\"RBC COUNT\",\"result\":\"1\",\"normal_value\":\"M: 4.5 - 6.5, F: 3.8 - 5.8\",\"unit\":\"m\\/ul\"},{\"parameter_name\":\"HCT\\/PCV\",\"result\":\"1\",\"normal_value\":\"M: 40 - 54%, F: 37 - 47%\",\"unit\":\"\"},{\"parameter_name\":\"MCV\",\"result\":\"24fl\",\"normal_value\":\"76-94\",\"unit\":\"fL\"},{\"parameter_name\":\"MCH\",\"result\":\"27pg\",\"normal_value\":\"27-32\",\"unit\":\"pg\"},{\"parameter_name\":\"MCHC\",\"result\":\"29g\\/dl\",\"normal_value\":\"29-34\",\"unit\":\"g\\/dL\"},{\"parameter_name\":\"RDW-CV\",\"result\":\"10%\",\"normal_value\":\"10-16%\",\"unit\":\"\"},{\"parameter_name\":\"RDW-SD\",\"result\":\"35\",\"normal_value\":\"35-56\",\"unit\":\"fl\"},{\"parameter_name\":\"Platelet Count\",\"result\":\"1\",\"normal_value\":\"150000-400000\",\"unit\":\"mm\\u00b3\"},{\"parameter_name\":\"MPV\",\"result\":\"6.0\",\"normal_value\":\"7.0- 11.0\",\"unit\":\" fL\"},{\"parameter_name\":\"PDW\",\"result\":\"11%\",\"normal_value\":\"10- 18%\",\"unit\":\"\"},{\"parameter_name\":\"PCT\",\"result\":\"0.14%\",\"normal_value\":\"0.1-0.2%\",\"unit\":\"\"},{\"parameter_name\":\"P-LCR\",\"result\":\"40%\",\"normal_value\":\"11.0-45.0%\",\"unit\":\"\"},{\"parameter_name\":\"P-LCC\",\"result\":\"30\",\"normal_value\":\"30-90\",\"unit\":\"fL\"}]', NULL, NULL, 'HAEMATOLOGY', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-06 19:50:29', '2025-10-06 19:50:29'),
(315, 138, 68, 10, '[{\"parameter_name\":\"\",\"result\":\"\",\"normal_value\":\"\",\"unit\":\"\"}]', NULL, NULL, NULL, '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'pending', 1, NULL, '2025-10-06 19:53:26', '2025-10-06 19:53:26');

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
(1, 'Master Admin', 'web', '2025-08-27 12:05:34', '2025-08-27 12:05:34'),
(3, 'Receiptsonist', 'web', '2025-08-27 12:19:48', '2025-08-27 12:19:48'),
(4, 'laboratory', 'web', '2025-09-14 05:35:45', '2025-09-14 05:35:45'),
(5, 'radiology', 'web', '2025-09-14 06:02:40', '2025-09-14 06:02:40'),
(6, 'ultrasonography', 'web', '2025-10-04 08:59:24', '2025-10-04 08:59:24');

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
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(6, 3),
(7, 1),
(7, 3),
(8, 1),
(8, 3),
(9, 1),
(10, 1),
(10, 3),
(10, 4),
(11, 1),
(11, 3),
(12, 1),
(12, 3),
(13, 1),
(13, 3),
(14, 1),
(14, 3),
(15, 1),
(15, 3),
(16, 1),
(16, 3),
(17, 1),
(17, 3),
(18, 1),
(18, 4),
(18, 5),
(18, 6),
(19, 1),
(19, 4),
(19, 5),
(19, 6),
(20, 1),
(20, 4),
(21, 1),
(21, 4),
(22, 1),
(22, 4),
(23, 1),
(24, 1),
(24, 4),
(25, 1),
(25, 4),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(111, 1),
(112, 1),
(113, 1),
(114, 1),
(115, 1),
(116, 1),
(117, 1),
(118, 1),
(119, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `years` varchar(255) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `students` varchar(255) DEFAULT NULL,
  `peoples` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `messenger_page_id` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `prepared_by` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`prepared_by`)),
  `authorized_by` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`authorized_by`)),
  `logotext` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `ftr_image` varchar(255) DEFAULT NULL,
  `site_title` varchar(255) DEFAULT NULL,
  `site_url` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `header_color` varchar(255) DEFAULT NULL,
  `header_text_color` varchar(50) DEFAULT NULL,
  `important_link` varchar(255) DEFAULT NULL,
  `menu_color` varchar(255) DEFAULT NULL,
  `menu_text_color` varchar(50) DEFAULT NULL,
  `footer_color` varchar(255) DEFAULT NULL,
  `copyright_text` varchar(255) DEFAULT NULL,
  `copyright_color` varchar(255) DEFAULT NULL,
  `footer_text` varchar(255) DEFAULT NULL,
  `commision` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`commision`)),
  `report_signature` varchar(255) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `lab_header_img` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cphone` varchar(255) DEFAULT NULL,
  `cemail` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `map` text DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `affidavit_one` longtext DEFAULT NULL,
  `affidavit_two` longtext DEFAULT NULL,
  `sr` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `years`, `course`, `students`, `peoples`, `facebook`, `youtube`, `twitter`, `linkedin`, `messenger_page_id`, `logo`, `prepared_by`, `authorized_by`, `logotext`, `favicon`, `ftr_image`, `site_title`, `site_url`, `description`, `keyword`, `header_color`, `header_text_color`, `important_link`, `menu_color`, `menu_text_color`, `footer_color`, `copyright_text`, `copyright_color`, `footer_text`, `commision`, `report_signature`, `banner`, `lab_header_img`, `phone`, `email`, `cphone`, `cemail`, `address`, `map`, `country`, `affidavit_one`, `affidavit_two`, `sr`, `created_at`, `updated_at`) VALUES
(1, '2030', '500', '100', '3000', 'https://facebook.com', 'https://youtube.com', '#', 'https://linkedin.com', NULL, 'settings/0AeoisgHPTtmeauGtKoyTUXifZsYjR1Sh35iWTdW.png', '{\"name\":\"Razu Islam\",\"qualification\":\"Diploma In Laboratory Medicine\",\"designation\":\"Technologist\"}', '{\"name\":\"Dev\",\"qualification\":\"Master\'s In Laboratory Medicine\",\"designation\":\"Lab Scientist\"}', 'Skyline', 'settings/vhlF7IjicXcbG9OhCIZi90L7sHX4R3jOxaOCgOLp.png', 'settings/Wezk6XUJuebn9qPWIrNUSEkoAI0EmnMQKrR97Dxb.png', 'BDMPPA - Bangladesh Diploma Medical Pharmacist Association', 'https://bdmppa.org', 'BDMPPA is the national platform for diploma pharmacists in Bangladesh.', 'BDMPPA, pharmacy, diploma, Bangladesh', '#005faa', '#FFFFFF', 'https://bdmppa.org/important-links', '#00a654', '#FFFFFF', '#2fa9ce', 'All Rights Reserved © Sharif IT Solutions 2025 Powered By Sharif', '#d11b70', 'Vision Diagnostic Centre is a modern, multi-disciplinary diagnostic and healthcare centre', '\"{\\\"commision_amount\\\":\\\"5\\\",\\\"commision_type\\\":\\\"percentage\\\"}\"', 'settings/71gSSZJtSZHm4JuD1zbqb5C9ZHRIqDnMmGD5C6k7.png', 'settings/keoNbkd71QYXomaoLRMnWfPy8WitRtZ9c6kcq24P.jpg', 'settings/8kw18oP5SOc3sK6rI5fjRlAGwX72RZnLR7HTTEzU.png', '017XXXXXXXX', 'shariful971@gmail.com', '+8801738153971', 'shariful971@gmail.com', 'Skyline Software BD,, Sadar Dinajpur,, Mob:+8801601153971', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3597.784153097055!2d88.65299641699136!3d25.612087762869365!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fb52f4fce65981%3A0x7a2f84e5d416a7e0!2sDBBL%20Fast%20Track!5e0!3m2!1sen!2sbd!4v1758474076778!5m2!1sen!2sbd', 'Asia/Dhaka', '<p>BDMPPA is a national platform dedicated to uniting, empowering, and uplifting diploma medical pharmacists across Bangladesh. We believe pharmacists are not just medicine dispensers, but key healthcare providers, especially in rural and underserved communities. Our mission is to ensure professional recognition, skill development, ethical practices, and policy advocacy for all members. Through collaboration, training, and leadership development, we aim to build a health system where every pharmacist plays an active and respected role. BDMPPA is committed to creating opportunities, strengthening healthcare delivery, and protecting the rights and dignity of diploma pharmacists in every corner of the country.</p>', '<p>BDMPPA একটি জাতীয় প্ল্যাটফর্ম, যা বাংলাদেশের সকল ডিপ্লোমা মেডিকেল ফার্মাসিস্টকে ঐক্যবদ্ধ ও ক্ষমতায়িত করতে কাজ করে। আমরা বিশ্বাস করি, একজন ফার্মাসিস্ট শুধুমাত্র ওষুধ সরবরাহকারী নন—তিনি স্বাস্থ্যসেবার গুরুত্বপূর্ণ অংশীদার, বিশেষ করে প্রান্তিক ও গ্রামের জনগণের জন্য। আমাদের লক্ষ্য হল সদস্যদের পেশাগত স্বীকৃতি, দক্ষতা উন্নয়ন, নৈতিক অনুশীলন এবং নীতিগত অধিকার নিশ্চিত করা। প্রশিক্ষণ, নেতৃত্ব উন্নয়ন ও সহযোগিতার মাধ্যমে আমরা এমন একটি স্বাস্থ্যব্যবস্থা গড়ে তুলতে চাই যেখানে ফার্মাসিস্টরা সম্মানজনক ও কার্যকর ভূমিকা পালন করবেন।</p>', 'shariful971@gmail.com', '2025-08-27 12:05:40', '2025-10-05 12:25:55');

-- --------------------------------------------------------

--
-- Table structure for table `sidebars`
--

CREATE TABLE `sidebars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `link` longtext DEFAULT NULL,
  `phone` varchar(255) DEFAULT '0',
  `email` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `bg_one` varchar(255) DEFAULT NULL,
  `bg_two` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sidebars`
--

INSERT INTO `sidebars` (`id`, `title`, `link`, `phone`, `email`, `image`, `bg_one`, `bg_two`, `created_at`, `updated_at`) VALUES
(1, 'Event & Seminar Portal', 'https://demo.bdmppa.org', '017xxxxxxxx', 'event@bdmppa.org', 'settings/1.png', '#004080', '#0073e6', '2025-08-27 12:05:40', '2025-08-27 12:05:40'),
(2, 'Pharmacy Laws & Ethics', 'https://demo.bdmppa.org', '017xxxxxxxx', 'event@bdmppa.org', 'settings/2.png', '#04ae9a', '#bccdc9', '2025-08-27 12:05:40', '2025-08-27 12:05:40'),
(3, 'Notice Board', 'https://demo.bdmppa.org', '+8801300-444555', 'notice@bdmppa.org', 'settings/3.png', '#06ac64', '#b5480d', '2025-08-27 12:05:40', '2025-08-27 12:05:40'),
(4, 'Training & CPD Unit', 'https://demo.bdmppa.org', '+8801300-333444', 'training@bdmppa.org', 'settings/4.png', '#af0e0e', '#2e1919', '2025-08-27 12:05:40', '2025-08-27 12:05:40'),
(5, 'Membership Registration', 'https://demo.bdmppa.org', '+8801300-222333', 'membership@bdmppa.org', 'settings/1.png', '#0007b5', '#0e6fff', '2025-08-27 12:05:40', '2025-08-27 12:05:40'),
(6, 'Central Office', 'https://demo.bdmppa.org', '+8801300-111222', 'info@bdmppa.org', 'settings/2.png', '#0050b3', '#bccdc9', '2025-08-27 12:05:40', '2025-08-27 12:05:40');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'home',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image`, `type`, `created_at`, `updated_at`) VALUES
(1, 'BDMPPA – Building a Stronger Healthcare Future', 'sliders/bdmppa-building-a-stronger-healthcare-future-1758052920.jpg', 'home', '2025-08-27 12:05:40', '2025-09-16 14:02:00'),
(2, 'Bangladesh’s Voice for Diploma Medical Pharmacist', 'sliders/bangladeshs-voice-for-diploma-medical-pharmacist-1758052951.jpg', 'home', '2025-08-27 12:05:40', '2025-09-16 14:02:31'),
(3, 'BDMPPA Photo & Video Gallery', 'sliders/11.png', 'gallery', '2025-08-27 12:05:40', '2025-08-27 12:05:40'),
(4, 'National Pharmacist Day 2024 was celebrated with pride and enthusiasm across all divisions, showcasing the dedication and unity of Diploma Medical Pharmacists in serving the healthcare sector of Bangladesh', 'sliders/12.png', 'gallery', '2025-08-27 12:05:40', '2025-08-27 12:05:40'),
(5, 'Glimpses of the BDMPPA Annual Conference 2025 held in Dhaka, featuring keynote speeches, member awards, and policy discussions aimed at strengthening pharmacist rights and roles nationwide.', 'sliders/glimpses-of-the-bdmppa-annual-conference-2025-held-in-dhaka-featuring-keynote-speeches-member-awards-and-policy-discussions-aimed-at-strengthening-pharmacist-rights-and-roles-nationwide-1758052940.jpg', 'home', '2025-08-27 12:05:40', '2025-09-16 14:02:20'),
(6, 'Training workshop on “Safe Dispensing Practices” conducted by BDMPPA in collaboration with healthcare experts, empowering young pharmacists through practical knowledge and skills development.', 'sliders/training-workshop-on-safe-dispensing-practices-conducted-by-bdmppa-in-collaboration-with-healthcare-experts-empowering-young-pharmacists-through-practical-knowledge-and-skills-development-1758544739.jpg', 'gallery', '2025-08-27 12:05:40', '2025-09-22 06:38:59'),
(7, 'Training workshop on “Safe Dispensing Practices” conducted by BDMPPA in collaboration with healthcare experts, empowering young pharmacists through practical knowledge and skills development.', 'sliders/training-workshop-on-safe-dispensing-practices-conducted-by-bdmppa-in-collaboration-with-healthcare-experts-empowering-young-pharmacists-through-practical-knowledge-and-skills-development-1758544757.jpg', 'gallery', '2025-08-27 12:05:40', '2025-09-22 06:39:17'),
(9, 'Interactive sessions and group activities during the BDMPPA regional retreat and leadership camp, designed to strengthen unity, collaboration, and future vision.', 'sliders/interactive-sessions-and-group-activities-during-the-bdmppa-regional-retreat-and-leadership-camp-designed-to-strengthen-unity-collaboration-and-future-vision-1758544780.jpg', 'gallery', '2025-08-27 12:05:40', '2025-09-22 06:39:40'),
(10, 'Interactive sessions and group activities during the BDMPPA regional retreat and leadership camp, designed to strengthen unity, collaboration, and future vision.', 'sliders/interactive-sessions-and-group-activities-during-the-bdmppa-regional-retreat-and-leadership-camp-designed-to-strengthen-unity-collaboration-and-future-vision-1758544834.png', 'gallery', '2025-08-27 12:05:40', '2025-09-22 06:40:34'),
(11, 'Interactive sessions and group activities during the BDMPPA regional retreat and leadership camp, designed to strengthen unity, collaboration, and future vision.', 'sliders/interactive-sessions-and-group-activities-during-the-bdmppa-regional-retreat-and-leadership-camp-designed-to-strengthen-unity-collaboration-and-future-vision-1758544862.jpeg', 'gallery', '2025-08-27 12:05:40', '2025-09-22 06:41:02'),
(12, 'Interactive sessions and group activities during the BDMPPA regional retreat and leadership camp, designed to strengthen unity, collaboration, and future vision.', 'sliders/interactive-sessions-and-group-activities-during-the-bdmppa-regional-retreat-and-leadership-camp-designed-to-strengthen-unity-collaboration-and-future-vision-1758544923.jpg', 'gallery', '2025-08-27 12:05:40', '2025-09-22 06:42:03');

-- --------------------------------------------------------

--
-- Table structure for table `smtps`
--

CREATE TABLE `smtps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mail_mailer` varchar(255) DEFAULT NULL,
  `mail_host` varchar(255) DEFAULT NULL,
  `mail_port` varchar(255) DEFAULT NULL,
  `mail_username` varchar(255) DEFAULT NULL,
  `mail_password` varchar(255) DEFAULT NULL,
  `mail_encryption` varchar(255) DEFAULT NULL,
  `mail_address` varchar(255) DEFAULT NULL,
  `mail_from_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smtps`
--

INSERT INTO `smtps` (`id`, `mail_mailer`, `mail_host`, `mail_port`, `mail_username`, `mail_password`, `mail_encryption`, `mail_address`, `mail_from_name`, `created_at`, `updated_at`) VALUES
(1, 'smtp', 'smtp.gmail.com', '587', 'khalifameditechinfo@gmail.com', 'opmhwvlotcnxevin', 'tls', 'khalifameditechinfo@gmail.com', 'VISION', '2025-08-27 12:05:40', '2025-09-23 08:05:19');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `reg_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `designation`, `phone`, `email`, `image`, `reg_id`, `created_at`, `updated_at`) VALUES
(1, 'Shariful Islam', 'President', '+8801711-123456', 'shariful.bd@bdmppa.org', 'teams/4.png', 'DMPPA-0001', '2025-08-27 12:05:40', '2025-08-27 12:05:40'),
(2, 'Jahidul Islam', 'Joint Secretary', '+8801913-456789', 'jahidul.treasury@bdmppa.org', 'teams/2.png', 'DMPPA-0001', '2025-08-27 12:05:40', '2025-08-27 12:05:40'),
(3, 'Nazmul Huda', 'General Secretary', '+8801711-123456', 'nazmul.huda@bdmppa.org', 'teams/3.png', 'DMPPA-0001', '2025-08-27 12:05:40', '2025-08-27 12:05:40'),
(4, 'Sultana Parvin', 'Vice President', '+8801711-123456', 'sultana.parvin@bdmppa.org', 'teams/1.jpg', 'DMPPA-0001', '2025-08-27 12:05:40', '2025-08-27 12:05:40');

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
  `image` varchar(255) NOT NULL DEFAULT 'avatar.png',
  `remember_token` varchar(100) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `remember_token`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Shariful Islam', 'shariful971@gmail.com', NULL, '$2y$12$MPOJ/G8XwNXjNghGFKH7K.fSRSs1eUsw/dtbJIvfDkt2JmvlEEd4y', 'settings/GQMZnoGenyk3ygm7Omzscu7Rb8a1ndfeieAlRMvE.jpg', '14eB8QNCOHcIgVvbD2hMNDXjnVhnWyO2A4YxxpxP0EPwt8NTzJs9yzAO6Odp', 1, '2025-08-27 12:05:34', '2025-10-06 21:34:28'),
(2, 'admin', 'admin@gmail.com', NULL, '$2y$12$N1pPLBn/AOBr/JYLUQBj2emBhHFQmEj0RvbLa6Ja1lOvQ6O9lvLXW', 'avatar.png', 'VV2zQYf8FcwhUwDwTMf9PBOntFZ7yd4hvMODotHJymWuGTTX6Opi8vGqV7fX', 1, '2025-08-27 12:05:34', '2025-10-06 21:34:28'),
(3, 'Razu Islam', 'razuislam@gmail.com', NULL, '$2y$12$q0fP2GEcjnOL5rK6/qNx.uxYT9cW4pm.VZuG/hJi7kIpkz4mpgLka', 'avatar.png', NULL, 1, '2025-09-14 05:36:38', '2025-10-06 21:34:28'),
(4, 'Dr. Omor Ali', 'omorali@gmail.com', NULL, '$2y$12$K01kVTTcsxD/c9uP8zKv9.TMA2H6JtjYeTixI2WC4KSN0iOs6A1RK', 'settings/V6Bn4ADReDrJDSboRnqSUsAB8okR3YZTmOHkDaXh.webp', NULL, 1, '2025-09-14 06:05:28', '2025-10-06 21:34:28'),
(8, 'Dr. Sazu Islam', 'sazu@gmail.com', NULL, '$2y$12$k6QHgEL0oHIfLbUnEYVY1.gzRgDYV.nJXj0HtEj/PwUs3fPIYk6nm', 'avatar.png', NULL, 1, '2025-10-04 09:00:30', '2025-10-06 21:34:28');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `link`, `created_at`, `updated_at`) VALUES
(1, 'BDMPPA-1', 'https://www.youtube.com/embed/nFx-MoU0m8A?si=mTicboegvTuubJwR', '2025-08-27 12:05:40', '2025-08-27 12:05:40'),
(2, 'BDMPPA-2', 'https://www.youtube.com/embed/AgZ4d2PrSRE?si=iRnHtE-iuoYH-jR3', '2025-08-27 12:05:40', '2025-08-27 12:05:40'),
(3, 'BDMPPA-3', 'https://www.youtube.com/embed/gYiWI4n5dw8?si=cdK14d6wd17VxiqB', '2025-08-27 12:05:40', '2025-08-27 12:05:40'),
(4, 'BDMPPA-4', 'https://www.youtube.com/embed/bJJQ8BCQoSM?si=477GAX8TkXHssIe-', '2025-08-27 12:05:40', '2025-08-27 12:05:40'),
(5, 'BDMPPA-5', 'https://www.youtube.com/embed/zUlOc_sGBnk?si=3CepeIT_g71jHVtR', '2025-08-27 12:05:40', '2025-08-27 12:05:40'),
(6, 'BDMPPA-6', 'https://www.youtube.com/embed/sEOVKoZM_uw?si=lKgRqqxLoNpi0KK3', '2025-08-27 12:05:40', '2025-08-27 12:05:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `billhistories`
--
ALTER TABLE `billhistories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billitems`
--
ALTER TABLE `billitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `billitems_bill_id_foreign` (`bill_id`),
  ADD KEY `billitems_investigation_id_foreign` (`investigation_id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_patient_id_foreign` (`patient_id`),
  ADD KEY `bills_doctor_id_foreign` (`doctor_id`),
  ADD KEY `bills_marketing_id_foreign` (`marketing_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bolg_categories`
--
ALTER TABLE `bolg_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bolg_categories_slug_unique` (`slug`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `commanders`
--
ALTER TABLE `commanders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_title_unique` (`title`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_expense_category_id_foreign` (`expense_category_id`);

--
-- Indexes for table `expense_categories`
--
ALTER TABLE `expense_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `investigations`
--
ALTER TABLE `investigations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marketings`
--
ALTER TABLE `marketings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_replies`
--
ALTER TABLE `message_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_replies_message_id_foreign` (`message_id`),
  ADD KEY `message_replies_user_id_foreign` (`user_id`);

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
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_bill_id_foreign` (`bill_id`),
  ADD KEY `reports_investigation_id_foreign` (`investigation_id`),
  ADD KEY `reports_patient_id_foreign` (`patient_id`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sidebars`
--
ALTER TABLE `sidebars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smtps`
--
ALTER TABLE `smtps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `billhistories`
--
ALTER TABLE `billhistories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `billitems`
--
ALTER TABLE `billitems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=421;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `bolg_categories`
--
ALTER TABLE `bolg_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `commanders`
--
ALTER TABLE `commanders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `investigations`
--
ALTER TABLE `investigations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `marketings`
--
ALTER TABLE `marketings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `message_replies`
--
ALTER TABLE `message_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=316;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sidebars`
--
ALTER TABLE `sidebars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `smtps`
--
ALTER TABLE `smtps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `billitems`
--
ALTER TABLE `billitems`
  ADD CONSTRAINT `billitems_bill_id_foreign` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `billitems_investigation_id_foreign` FOREIGN KEY (`investigation_id`) REFERENCES `investigations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bills_marketing_id_foreign` FOREIGN KEY (`marketing_id`) REFERENCES `marketings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bills_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_expense_category_id_foreign` FOREIGN KEY (`expense_category_id`) REFERENCES `expense_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `message_replies`
--
ALTER TABLE `message_replies`
  ADD CONSTRAINT `message_replies_message_id_foreign` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `message_replies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_bill_id_foreign` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reports_investigation_id_foreign` FOREIGN KEY (`investigation_id`) REFERENCES `investigations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reports_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

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
