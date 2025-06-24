-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2025 at 09:57 AM
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
-- Database: `db_eredts_tester`
--

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
(5, '2023_12_21_151926_create_redts_a_accesss_table', 1),
(6, '2023_12_21_161341_create_redts_b_user_table', 2),
(7, '2023_12_21_163045_create_redts_d_profile_table', 3),
(8, '2023_12_22_102159_create_redts_ee_classification_table', 4),
(9, '2023_12_22_081449_create_redts_e_region_table', 5),
(10, '2023_12_22_085857_create_redts_f_offices_table', 6),
(11, '2023_12_22_092240_create_redts_g_carousel_imgs_table', 7),
(12, '2023_12_22_093210_create_redts_j_user_offices_table', 8),
(13, '2023_12_22_095219_create_redts_l_sub_class_table', 9),
(14, '2023_12_22_094538_create_redts_la_process_lengths_table', 10),
(15, '2023_12_22_103510_create_redts_zc_client_infos_table', 11),
(16, '2023_12_22_104533_create_redts_za_transaction_types_table', 12),
(17, '2023_12_22_104509_create_redts_z_applicant_types_table', 13),
(18, '2023_12_22_111322_create_redts_zd_client_doc_infos_table', 14),
(19, '2023_12_22_112027_create_redts_n_actions_table', 15),
(20, '2023_12_22_112457_create_redts_w_upload_size_limit_table', 16),
(21, '2023_12_22_114713_create_redts_y_requirements_table', 17),
(22, '2023_12_22_133128_create_redts_zb_agencies_table', 18),
(23, '2023_12_22_133536_create_redts_ze_client_doc_attachments_table', 19),
(24, '2023_12_22_134155_create_redts_zf_order_of_payments_table', 20),
(25, '2023_12_22_135829_create_redts_zg_payment_cost_breakdowns_table', 21),
(26, '2023_12_22_140552_create_redts_zh_cert_perm_routes_table', 22),
(27, '2023_12_22_141313_create_redts_zi_origin_offices_table', 23),
(28, '2023_12_22_142339_create_redts_na_action_attachments_table', 24),
(29, '2024_02_13_160222_create_redts_lc_rstct_sbmsn_of_reqs_table', 25),
(30, '2024_02_15_143655_create_redts_le_subclass_fees_table', 26),
(31, '2024_02_15_164606_create_redts_zj_user_oop_approvees_table', 27),
(32, '2024_02_27_134710_create_redts_nb_releasing_routes_table', 28),
(33, '2024_03_06_122517_create_redts_nc_act_seens_table', 29),
(34, '2024_03_07_144649_create_redts_zfa_additional_oops_table', 30),
(35, '2024_03_07_151656_create_redts_zga_other_pymnt_cost_brkdwns_table', 31),
(38, '2024_04_17_152946_create_redts_ba_view_reqs_specs_table', 32);

-- --------------------------------------------------------

--
-- Table structure for table `redts_a_accesss`
--

CREATE TABLE `redts_a_accesss` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `type` longtext NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redts_a_accesss`
--

INSERT INTO `redts_a_accesss` (`id`, `uuid`, `type`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '4a241309-da1e-11ef-b54a-3c7c3f2bc7d9', 'Administrator', NULL, NULL, NULL),
(2, '4a241ed2-da1e-11ef-b54a-3c7c3f2bc7d9', 'DTS Administrator', NULL, NULL, NULL),
(3, '4a241f3e-da1e-11ef-b54a-3c7c3f2bc7d9', 'Division Chief', NULL, NULL, NULL),
(4, '4a241f81-da1e-11ef-b54a-3c7c3f2bc7d9', 'Receiving Clerk', NULL, NULL, NULL),
(5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 'Receiving and Releasing Clerk', NULL, NULL, NULL),
(6, '4a241ff9-da1e-11ef-b54a-3c7c3f2bc7d9', 'Releasing Clerk', NULL, NULL, NULL),
(7, '4a242032-da1e-11ef-b54a-3c7c3f2bc7d9', 'Regional Director', NULL, NULL, NULL),
(8, '4a24206a-da1e-11ef-b54a-3c7c3f2bc7d9', 'Assistant Regional Director for Technical Services', NULL, NULL, NULL),
(9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 'Validator', NULL, NULL, NULL),
(10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 'Processor', NULL, NULL, NULL),
(11, '4a24212b-da1e-11ef-b54a-3c7c3f2bc7d9', 'Accounting Officer', NULL, NULL, NULL),
(12, '4a242165-da1e-11ef-b54a-3c7c3f2bc7d9', 'Credit Officer', NULL, NULL, NULL),
(13, '4a2421a0-da1e-11ef-b54a-3c7c3f2bc7d9', 'ICT Staff', NULL, NULL, NULL),
(14, '4a2421dd-da1e-11ef-b54a-3c7c3f2bc7d9', 'Validator and Processor', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `redts_ba_view_reqs_specs`
--

CREATE TABLE `redts_ba_view_reqs_specs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `office_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redts_ba_view_reqs_specs`
--

INSERT INTO `redts_ba_view_reqs_specs` (`id`, `user_id`, `office_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 459, 171, NULL, '2024-04-30 03:07:18', '2024-08-08 00:19:44'),
(2, 460, 171, NULL, NULL, NULL),
(3, 314, 166, NULL, '2024-08-08 00:15:09', '2024-08-12 05:52:28'),
(4, 450, 164, NULL, '2024-08-08 00:19:44', '2024-08-08 00:19:44'),
(5, 451, 165, NULL, '2024-08-08 00:19:44', '2024-08-08 00:19:44'),
(6, 461, 170, NULL, '2024-08-08 00:19:44', '2024-08-08 00:19:44'),
(7, 463, 172, NULL, '2024-08-08 00:19:44', '2024-08-08 00:19:44'),
(8, 465, 173, NULL, '2024-08-08 00:19:44', '2024-08-08 00:19:44'),
(9, 466, 173, NULL, '2024-08-08 00:19:44', '2024-08-08 00:19:44');

-- --------------------------------------------------------

--
-- Table structure for table `redts_b_user`
--

CREATE TABLE `redts_b_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `access_id` bigint(20) UNSIGNED NOT NULL COMMENT 'a_access type here',
  `access_uuid` char(36) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(255) DEFAULT NULL,
  `admin_delete` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redts_b_user`
--

INSERT INTO `redts_b_user` (`id`, `uuid`, `username`, `password`, `email`, `access_id`, `access_uuid`, `status`, `remember_token`, `admin_delete`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '5d2efb68-d6ff-11ef-b430-3c7c3f2bc7d9', 'administrator', '$2y$10$MzB.nJmYWbsT1oFJBege/Ogm52l/0OqI5d9/CDmKWvAzWRr/3RpQW', 'info.denrro5.gov.ph@gmail.com', 1, '4a241309-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '0000-00-00 00:00:00', '2023-03-16 02:54:49'),
(2, '5d2f0949-d6ff-11ef-b430-3c7c3f2bc7d9', 'redtsadmin', '$2y$10$MzB.nJmYWbsT1oFJBege/Ogm52l/0OqI5d9/CDmKWvAzWRr/3RpQW', 'redtsadmin@gmail.com', 2, '4a241ed2-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '9', 1, NULL, '0000-00-00 00:00:00', '2023-03-16 02:55:24'),
(304, '5d2f09e3-d6ff-11ef-b430-3c7c3f2bc7d9', 'jisales', '$2y$10$MMcz/ZGEAZTiZLdIQxqMfuZCtxi6hhHH6SXCyDLIQ/fc0bcPKAHxC', 'izy05ar@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2022-02-09 05:15:44', '2023-12-27 05:22:23'),
(314, '5d2f0a64-d6ff-11ef-b430-3c7c3f2bc7d9', 'olivemyki49', '$2y$10$.UrKCgbjHgsipkqfae/LEu6ulG6MfASjtz9G1TOajrO98YlPvUlHW', 'olivemyki49@gmail.com', 1, '4a241309-da1e-11ef-b54a-3c7c3f2bc7d9', 1, 'heupJyzrMig3AzI5csX87cnQBqLsu6mVJ5MvUpfk3uhEFSraLj1F7RHWviiO', 1, NULL, '2023-09-06 01:09:02', '2025-01-16 08:28:48'),
(315, '5d2f0acb-d6ff-11ef-b430-3c7c3f2bc7d9', 'cmbarcellano@forbescollege.org', '$2y$10$jR5opMecMa1zTRDYVY0UZOaacmJ.qBtWBUmX1MEzCrwOnr8w3Ya3G', 'cmbarcellano@forbescollege.org', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, 'NPQ3iynvLPbQdy8FhJLEfZXnFJwu4ULmJ9NIHToATn8DMHh5jlrmTLXKkDIH', 0, NULL, '2023-09-18 16:59:43', '2025-01-15 07:38:57'),
(316, '5d2f0b29-d6ff-11ef-b430-3c7c3f2bc7d9', 'gbtn_rec_test', '$2y$10$BT9pFua7Fhho7XbCujI7ze4mgT9R0F70tUDEJO1sPpCB0qDIxgtba', 'user2@admin.com', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2023-10-01 22:36:42', '2024-04-17 05:32:46'),
(317, '5d2f0c05-d6ff-11ef-b430-3c7c3f2bc7d9', 'gbtn_rps_test', '$2y$10$FAsI93Ilqy2xO2IbApIPOeNP2W//kMuQfubO/eOAuO4he.lXDPuv.', 'user3@admin.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2023-10-24 21:01:02', '2024-04-17 05:32:51'),
(319, '5d2f0c5e-d6ff-11ef-b430-3c7c3f2bc7d9', 'user4@admin.com', '$2y$10$my8EwflddgLG7pyn/YzVquPN86pEsqCO7Lr1NPmND45bSNtVAzKe6', 'user4@admin.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 0, '0', 0, NULL, '2023-10-24 21:01:37', '2023-12-27 05:22:23'),
(321, '5d2f0cb1-d6ff-11ef-b430-3c7c3f2bc7d9', 'gbtn_cashier', '$2y$10$hDtKP1yr8/jm5JKyRUqdmuEuh/Ont8GQKFsHQhU839sAEs/gmP86O', 'gbtn_cashier@admin.com', 12, '4a242165-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2023-10-24 21:17:10', '2024-04-16 02:51:01'),
(322, '5d2f0e0e-d6ff-11ef-b430-3c7c3f2bc7d9', 'gbtn_cenro', '$2y$10$cMDQKJUO8m10qDgp3w8c3OFceXgwYWJPwx1j/fpWEMVNjFxkijoru', 'gbtn_cenro@admin.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2023-10-24 21:45:58', '2024-04-16 02:56:45'),
(324, '5d2f0e71-d6ff-11ef-b430-3c7c3f2bc7d9', 'user1@admin.com', '$2y$10$UkEk3KfFqlBSFnDXIVmlz.Uqcclwu/vxxug8qpQQk54Z5ai.4kMDy', 'user1@admin.com', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2023-10-27 00:22:17', '2023-12-27 05:22:23'),
(340, '5d2f0ec7-d6ff-11ef-b430-3c7c3f2bc7d9', 'MOBO_REC', '$2y$10$0YAj0t3RbFtE9SoljijpCebW7bF1xyQkBcc9hsstYPpaZAPRoDqi2', 'denr_cenromobo@yahoo.com', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2023-11-28 19:20:11', '2024-09-20 07:22:37'),
(341, '5d2f0f19-d6ff-11ef-b430-3c7c3f2bc7d9', 'catnes_rec', '$2y$10$RBqzGvvpbue/84ZWcpE7te6.kVCTdv/O9cFXCFR0T6KrFiWCWbgqm', 'Sample231206084410jydIy1@gmail.com', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2023-12-06 00:46:11', '2023-12-20 03:15:00'),
(342, '5d2f0f78-d6ff-11ef-b430-3c7c3f2bc7d9', 'catnes_penro', '$2y$10$61WZe4uYtpQNjKB4aKJXFujLnDiyUnm3PKGq/iQ8FWlurnqr1ew8S', 'Sample2312060846423Wq8n2@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2023-12-06 00:48:58', '2023-12-06 05:28:29'),
(343, '5d2f0fce-d6ff-11ef-b430-3c7c3f2bc7d9', 'catnes_rps', '$2y$10$Lc4Mmkl3atfD9giRHZWKf.ZfH9z8fwk24MNK1vVMqPRa9UkFt6kpW', 'Sample231206091917NlJSz1@gmail.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, '2024-04-17 05:04:57', '2023-12-06 01:19:27', '2024-04-17 05:14:57'),
(344, '5d2f1027-d6ff-11ef-b430-3c7c3f2bc7d9', 'catnes_tsd', '$2y$10$wL4UTF/CqwKLYN9T82Bf1.tkVeDJIKMXcjulhvgPQrxsG6sFM4WFC', 'Sample231206132553x0BvC1@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2023-12-06 05:26:18', '2023-12-06 05:26:18'),
(345, '5d2f107a-d6ff-11ef-b430-3c7c3f2bc7d9', 'catnes_svems', '$2y$10$5mkKusN5rlew4AWkkX9t.OEptBY3rLcvs4ZrjS2ruPSrJVbGazMPa', 'Sample231206132554UxKW32@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2023-12-06 05:26:18', '2023-12-06 05:26:18'),
(346, '5d2f10ea-d6ff-11ef-b430-3c7c3f2bc7d9', 'catnes_acc', '$2y$10$1NAB/VSnUTojyD4H/HS0BeHYjZr/yyy7TawVzKz8dOeIQR1n87OIm', 'Sample231206132651NZxou3@gmail.com', 11, '4a24212b-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2023-12-06 05:27:45', '2023-12-20 03:12:23'),
(347, '5d2f1143-d6ff-11ef-b430-3c7c3f2bc7d9', 'catnes_cashier', '$2y$10$./A8mPSa4pg77tc305KFP.XXX7777FdSNKg250.gt5z3QQ1kHhs1S', 'Sample231206132652g2Tdi4@gmail.com', 12, '4a242165-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2023-12-06 05:27:45', '2023-12-06 05:30:10'),
(348, '5d2f1199-d6ff-11ef-b430-3c7c3f2bc7d9', 'catnes_fuu', '$2y$10$83F907gbUgPBec72kyJSaOeinaV21AoMNaRFisfGgkk1UK3HBMWLq', 'Sample231206132652TmRvX5@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2023-12-06 05:27:46', '2023-12-06 05:27:46'),
(349, '5d2f11ea-d6ff-11ef-b430-3c7c3f2bc7d9', 'red_red', '$2y$10$kICe8IzjHUMUJDgBxXfPaeBO0Qhdb34CqwoYV7IO8K40lyMGZjpNW', 'Sample231217004016vUo7m3@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2023-12-16 16:37:45', '2023-12-16 16:37:45'),
(350, '5d2f123b-d6ff-11ef-b430-3c7c3f2bc7d9', 'alb_rec', '$2y$10$cw5i0DooaFWDXccBDrkGue71qSdAEO5jvqBn8pqyJKTo8Tl9Z328u', 'alb_rec@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, 'HJZ08WJe7lo5PNMJdCwb1nQkJvpSDsd7ZVdMgkpLD6Pb21cuZIM4GoXAcVW4', 0, NULL, '2023-12-21 00:12:03', '2024-04-17 02:38:05'),
(351, '5d2f1291-d6ff-11ef-b430-3c7c3f2bc7d9', 'alb_RPS', '$2y$10$uVzCc6301UK.gTh4uxHquO5ZffzBgsIl4p67th4jEVCMmAK9UlmeO', 'alb_rps@gmail.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2023-12-21 00:13:04', '2024-04-17 02:39:05'),
(352, '5d2f12c8-d6ff-11ef-b430-3c7c3f2bc7d9', 'alb_tsd', '$2y$10$ofiEN.Hc8R58g6Ec1TEwlOpV/47ZftCd5WPPexQKiif/fzc4wvYQi', 'alb_tsd@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2023-12-21 00:14:34', '2023-12-21 00:14:34'),
(353, '5d2f12fb-d6ff-11ef-b430-3c7c3f2bc7d9', 'alb_penro', '$2y$10$95V3/F0mQz6ogq5LR6G6SOiorZaKb.Pf1/hzzX2eRIWtJC5cXqeHa', 'alb_penro@gmail.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2023-12-21 00:16:47', '2024-05-07 08:42:40'),
(354, '5d2f132d-d6ff-11ef-b430-3c7c3f2bc7d9', 'alb_msd', '$2y$10$3QLEhLnBTzirYi0UtRWnCuMnWNld2gO33fIy3FuJZs9r/k.SmxqLK', 'alb_msd@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, '2024-04-17 02:04:13', '2023-12-21 00:17:34', '2024-04-17 02:40:13'),
(355, '5d2f1361-d6ff-11ef-b430-3c7c3f2bc7d9', 'alb_es', '$2y$10$8Px1VQxpsi7O6RaNVn./2OF1286.Ph5J48Kj8Ir6bkQSD6Xei9jo6', 'alb_es@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, '2024-04-17 02:04:14', '2023-12-21 00:18:28', '2024-04-17 02:40:14'),
(356, '5d2f1392-d6ff-11ef-b430-3c7c3f2bc7d9', 'alb_cds', '$2y$10$HLVGZj5/1C.TwNzgchepbOdu.nmPJiIGTGpyueEGCK9EQldHWOZxG', 'alb_cds@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, '2024-04-17 02:04:14', '2023-12-21 00:19:19', '2024-04-17 02:40:14'),
(357, '5d2f13c4-d6ff-11ef-b430-3c7c3f2bc7d9', 'alb_fs', '$2y$10$yNQFiCWE0dF71KIkXYJVwunHh6MFbm/DQ0X8VPNb/rs1dkq6yq2d.', 'alb_fs@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, '2024-04-17 02:04:13', '2023-12-21 00:19:53', '2024-04-17 02:40:13'),
(358, '5d2f13f5-d6ff-11ef-b430-3c7c3f2bc7d9', 'alb_as', '$2y$10$LFjDM8qymNjokUyX1zgkye4JKvtLiDn3uM4SRCHkDcUOQLVnDsLk.', 'alb_as@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, '2024-04-17 02:04:15', '2023-12-21 00:20:28', '2024-04-17 02:40:15'),
(359, '5d2f1426-d6ff-11ef-b430-3c7c3f2bc7d9', 'alb_pmd', '$2y$10$tsctTPPOg7c93ODGsula3Om4bIZAjNoNTAq2/85cgCYwY3XCm0mzK', 'alb_pmd@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, '2024-04-17 02:04:12', '2023-12-21 00:21:18', '2024-04-17 02:40:12'),
(360, '5d2f1457-d6ff-11ef-b430-3c7c3f2bc7d9', 'lpddadmin', '$2y$10$G3oJRBdnpga24FDhTaqgW.BBiPnSIWQEgB8zyHxdzTza8IpYt2Bma', 'lppadmin@gmail.com', 2, '4a241ed2-da1e-11ef-b54a-3c7c3f2bc7d9', 1, 'hIBfYfzzmKPVoEmGZ75epe643u0E6Vovz47fkNyXDbxdKcxGCirktAv2Zlmp', 0, NULL, '2023-12-27 05:25:08', '2024-02-08 02:27:58'),
(361, '5d2f148b-d6ff-11ef-b430-3c7c3f2bc7d9', 'sirrenz', '$2y$10$11vX/UaQx62d/m4DbDpovebgb4TVKXpbpjDkcyL5ryYJ4bP6SOuDK', 'rlmanzanades@denr.gov.ph', 1, '4a241309-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2023-12-27 05:50:01', '2023-12-27 05:50:01'),
(362, '5d2f14bb-d6ff-11ef-b430-3c7c3f2bc7d9', 'goa_villaflor', '$2y$10$5YwkYuZXgd.CqhdwwN0TdexIw4f/FqU9JF781PknUcNBValFYcOae', 'goa_villaflor@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, '2024-04-17 02:04:28', '2024-01-18 01:14:24', '2024-04-17 02:27:28'),
(363, '5d2f14ed-d6ff-11ef-b430-3c7c3f2bc7d9', 'goa_rojas', '$2y$10$b9c38T6mynBWS4vdC78UaOwNf1eYbUxnmJNp85Ce/NsuUZlzSkPHC', 'goa_rojas@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, '2024-04-17 02:04:24', '2024-01-18 01:14:25', '2024-04-17 02:27:24'),
(364, '5d2f151e-d6ff-11ef-b430-3c7c3f2bc7d9', 'goa_recamara', '$2y$10$0bmjEX4fkUidj9D4T9oyEO2tfHrZoCSCadqQHC02sk1XXSU14cZXm', 'goa_recamara@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, '2024-04-17 02:04:28', '2024-01-18 01:14:27', '2024-04-17 02:27:28'),
(365, '5d2f154f-d6ff-11ef-b430-3c7c3f2bc7d9', 'goa_quides', '$2y$10$FWV9NUimfhD6vrqJz23EgOHKvHYEJf/7KV6enFJF7Bz.gT.7r5SNa', 'goa_quides@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, '2024-04-17 02:04:29', '2024-01-18 01:14:28', '2024-04-17 02:27:29'),
(366, '5d2f157f-d6ff-11ef-b430-3c7c3f2bc7d9', 'goa_collao', '$2y$10$szN4J5knAJnBvS42dFVoru.T5RittXc6Dk.eYnsJOEA3qOFGoWlDa', 'goa_collao@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, '2024-04-17 02:04:25', '2024-01-18 01:14:29', '2024-04-17 02:27:25'),
(367, '5d2f15af-d6ff-11ef-b430-3c7c3f2bc7d9', 'goa_remo', '$2y$10$SvhT8ozx5h1ixncVPjzFV.1Qd3/Dt6XnPr7bAHnvLgWQpYlXMbO0q', 'goa_remo@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, '2024-04-17 02:04:26', '2024-01-18 01:14:30', '2024-04-17 02:27:26'),
(368, '5d2f15e0-d6ff-11ef-b430-3c7c3f2bc7d9', 'goa_sedeño', '$2y$10$nFVQpi4qEmeIPQNdRq0a/e5hwKwwwBbnJRuvTGM/Tthca1.PnN6Ya', 'goa_sedeño@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, '2024-04-17 02:04:26', '2024-01-18 01:14:31', '2024-04-17 02:27:26'),
(369, '5d2f1611-d6ff-11ef-b430-3c7c3f2bc7d9', 'goa_dela_cruz', '$2y$10$gJ.pMopOPQ0bQYhlxdr6f.7tCB.t/20xWKthkX7GQCyoUIccfUMUC', 'goa_dela_cruz@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, '2024-04-17 02:04:27', '2024-01-18 01:26:49', '2024-04-17 02:27:27'),
(370, '5d2f1641-d6ff-11ef-b430-3c7c3f2bc7d9', 'SOR_REC', '$2y$10$E7sy7JxIXxfwTtwk4IY6RubsHc0pHRYa4PHuEWBSQ0QmWRN1BEPF.', 'sor_rec@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-01-22 03:45:47', '2024-04-17 03:38:28'),
(371, '5d2f1673-d6ff-11ef-b430-3c7c3f2bc7d9', 'wrpsGPuser1', '$2y$10$cOJBz5n9qm2KsJQhf037c.9zjbWrjOzYYXLeoAX4Pl9s763XYHUrO', 'wrpsUser1@gmail.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-02-08 02:32:53', '2024-02-08 07:36:08'),
(372, '5d2f16a6-d6ff-11ef-b430-3c7c3f2bc7d9', 'wrpsUser2', '$2y$10$i994BYk1i7cQoelhVT/i3ut56v3s81.WwX2Ythdcnyf1DF3s81dXu', 'wrpsUser2@gmail.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-02-08 02:32:54', '2024-02-08 02:34:41'),
(373, '5d2f16d8-d6ff-11ef-b430-3c7c3f2bc7d9', 'testuse1', '$2y$10$AQnIZHv3rEir2VWyNZ8UZe66CcPIgBlUaI3Sj9eZkKL86Z/WI..xy', 'Sample240416080315ANWw51@gmail.com', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-16 00:07:02', '2024-05-07 08:41:31'),
(374, '5d2f1717-d6ff-11ef-b430-3c7c3f2bc7d9', 'testuse2', '$2y$10$fYUvx6f7t5tE2liMPhgy2OEeNLPOk/KAdKQSW8YQ4s861msvFFWtu', 'Sample240416080320ogocp2@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, 'cOdkXFzPggeH4hzjqpRB78Lc6K9IBxHFwSTl3JqLVByQXfibEaRViGPfaCnk', 0, NULL, '2024-04-16 00:07:03', '2024-04-16 01:33:28'),
(375, '5d2f1747-d6ff-11ef-b430-3c7c3f2bc7d9', 'testuse3', '$2y$10$PJ.NgNRigPGw2eCqJQGNbeZ4dfJIOLquTvQtqNkMF0t6CTTRPfBwG', 'Sample240416080405AiBdp3@gmail.com', 14, '4a2421dd-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-16 00:07:03', '2024-09-05 02:41:57'),
(376, '5d2f1778-d6ff-11ef-b430-3c7c3f2bc7d9', 'testuse4', '$2y$10$uRok6RdUQEZAS00T/XBkXupKXGzODJRAiR59cMbjDyf7P1sT2iCAC', 'Sample240416080412WABkh4@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-16 00:07:03', '2024-05-07 08:44:27'),
(377, '5d2f17b2-d6ff-11ef-b430-3c7c3f2bc7d9', 'testuse5', '$2y$10$7a3bT2W01pyz6DXVFGtwYOx69OuzlldthRvSr43Cqlnwuyy2feqnG', 'Sample240416080426gCwnN5@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-16 00:07:03', '2024-05-07 08:45:05'),
(378, '5d2f18b3-d6ff-11ef-b430-3c7c3f2bc7d9', 'testuse6', '$2y$10$PhGm8fvwA8o9UYz2sxLepOteWITAEr4uqafoW9JuRdFB5/Kwc9PRm', 'Sample240416080434OYyr76@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-16 00:07:03', '2024-05-07 08:45:41'),
(379, '5d2f1905-d6ff-11ef-b430-3c7c3f2bc7d9', 'testuse7', '$2y$10$zuuQULZuqxOffHVmUfH/7.7P8VYD/dprfXJ.fmNCzYBQEGJmalIrG', 'Sample24041608044186MoL7@gmail.com', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-16 00:07:03', '2024-05-07 08:42:05'),
(380, '5d2f193c-d6ff-11ef-b430-3c7c3f2bc7d9', 'alb_EVAL', '$2y$10$cc4g2zQRaDZYhx5RG9a7a.nDPvGkpdEtJIvwlwH7zEkHfzvhPVisS', 'cheguiriba81@gmail.com', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-16 03:05:36', '2024-04-24 10:35:04'),
(381, '5d2f1974-d6ff-11ef-b430-3c7c3f2bc7d9', 'alb_PROC', '$2y$10$INUcsP3Qhgy3Ks7G.gEJY.kGpWeFAG1zSWGiiFcKKR9bOxd0dftG2', 'dm_alfonso08@yahoo.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-16 03:07:09', '2024-04-24 10:35:17'),
(382, '5d2f19ab-d6ff-11ef-b430-3c7c3f2bc7d9', 'ALB_CRDT', '$2y$10$cRWJ81Lz9.ocXsPV/FeXsu/M0ID1BMQw248Wx4e3EBjQEqzYwfKf2', 'tweety_fatima03@yahoo.com', 12, '4a242165-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-16 03:07:58', '2024-04-17 03:30:35'),
(383, '5d2f19e0-d6ff-11ef-b430-3c7c3f2bc7d9', 'ALB_PROC2', '$2y$10$o9L5OLZ24LrL8UDNGbZBkeOZSNtYjuqczd4llimxeocgJDDIBkUIq', 'sherwenfedericoalcantara@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-16 03:53:16', '2024-04-24 10:35:32'),
(384, '5d2f1a16-d6ff-11ef-b430-3c7c3f2bc7d9', 'ALB_PROC3', '$2y$10$a8YhTvndN/2PcSbWzSRQQ.b5YIEzadrqQ2jPYp2A1dlYBvUEVxNOu', 'imee.m5254@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-16 03:56:02', '2024-04-24 10:35:42'),
(385, '5d2f1b6b-d6ff-11ef-b430-3c7c3f2bc7d9', 'SOR_RPS', '$2y$10$xtgkXINPamO/tmStfKriW.4ySb51pV8nVxgmbPq7JtevwFNaHgwfC', 'dulpinaf@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-16 06:05:58', '2024-04-16 06:05:58'),
(386, '5d2f1ba3-d6ff-11ef-b430-3c7c3f2bc7d9', 'SOR_EVAL2', '$2y$10$zoJcgzvrG/W2ysTXrfoKXe4ctdso8LErcUKIAVlz7G5GDtwdvo2U6', 'garcia.rosalie08@gmail.com', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-16 06:09:31', '2024-04-24 11:18:03'),
(387, '5d2f1bd5-d6ff-11ef-b430-3c7c3f2bc7d9', 'SOR_PROC2', '$2y$10$StBlqtbnEZPzY3GRX1FCC.SARjah2ihUHZSC8hhQdii6TIqszkwNm', 'baylonivylynn@gmail.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-16 06:10:24', '2024-04-24 11:18:13'),
(388, '5d2f1c1c-d6ff-11ef-b430-3c7c3f2bc7d9', 'SOR_CRDT', '$2y$10$Vj6iSSUgATioZOCxLIgtquT/ng1F77y/k8qVbw4LV1xh37d8COKGO', 'adellosa02@gmail.com', 12, '4a242165-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-16 06:12:10', '2024-04-17 04:08:43'),
(389, '5d2f1c52-d6ff-11ef-b430-3c7c3f2bc7d9', 'CNORTE_RPS', '$2y$10$ZyUa31B5qEqYmrlLlOvIae.V3I1RxeSB2As1qUd.nv7QIimcYNpfi', 'lpds.camnorte@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-16 06:15:08', '2024-04-16 06:15:08'),
(390, '5d2f1c85-d6ff-11ef-b430-3c7c3f2bc7d9', 'CNORTE_CRDT', '$2y$10$gFL5d6dMMu8DgZUa7wDYnObF5f94uWpeA.vDyCGO9L3JPThd.dbLO', 'janetforbes30@yahoo.com', 12, '4a242165-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-16 06:17:50', '2024-04-17 05:06:35'),
(391, '5d2f1d65-d6ff-11ef-b430-3c7c3f2bc7d9', 'CDUANES_RPS', '$2y$10$m5o.hhKU12pvsoluDMb1leDq5e/b6Myp0bAjH/hNYIFQTJRt.4.Ji', 'lilianquinones04@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-16 06:22:40', '2024-04-16 06:22:40'),
(392, '5d2f1e1e-d6ff-11ef-b430-3c7c3f2bc7d9', 'CDUANES_PROC', '$2y$10$EXNleqxdOyMCJRtqB0Th6.KvnJGElAWXRby0SrcLse6aY1/NI0K7q', 'jeannyllanderal25@gmail.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '29l45lBcyBYRZ9bTWoJkGcJVdRB3NiOj2Xe4ucSYR2EZNydO4Z5axzDKHTdZ', 0, NULL, '2024-04-16 06:23:42', '2024-04-24 10:17:34'),
(393, '5d2f1e64-d6ff-11ef-b430-3c7c3f2bc7d9', 'CDUANES_EVAL', '$2y$10$UcCzSmvOFny220/8IktbROJK.XA5RnhpZC6QXvOQC.QD0p2mAn2Q6', 'resalym@gmail.com', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-16 06:24:29', '2024-04-24 10:36:47'),
(394, '5d2f1e96-d6ff-11ef-b430-3c7c3f2bc7d9', 'CDUANES_CRDT', '$2y$10$B1G/eO24u2oCwiZcfTNngOb5IjqV6zr2ZVil6aCHGqDX472igpZFO', 'jessadelbarriosierra2494@gmail.com', 12, '4a242165-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-16 06:25:03', '2024-04-17 05:16:39'),
(395, '5d2f1f79-d6ff-11ef-b430-3c7c3f2bc7d9', 'CDUANES_EVAL2', '$2y$10$gILxBJQJNKaNSaCnsQroKe9VRPF9rmpkAJSGA3j539nXLEUYW.f/O', 'dayawonmelanie84@gmail.com', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-16 06:28:32', '2024-04-24 11:00:18'),
(398, '5d2f1fad-d6ff-11ef-b430-3c7c3f2bc7d9', 'GNBTN_RPS', '$2y$10$H09a22kG.9r/n8.r8Fs57eh2fc3bP/oNtqsN.0ZnKlazNPLuh/ice', 'ciaramaemape@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, 'FICob8cuGAl8waXbtPDQa63ubfGlrwcPxiQXFJTXbj4MiSozLCdZ7RPFGJuy', 0, NULL, '2024-04-16 06:35:18', '2024-04-16 06:35:18'),
(399, '5d2f1fe1-d6ff-11ef-b430-3c7c3f2bc7d9', 'GNBTN_EVAL', '$2y$10$6ycmYSCA0FQUNL5QCIMB6O2EHrg6m/Pkt0VrHxcoZBjC21adBlg4y', 'sethalcantara08@gmail.com', 14, '4a2421dd-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '1jIaKyNQp19ssKlp5ljV1BPXCtosaJ13sexeOYsxFyF5Xn6bMY8OY9loxMm7', 0, NULL, '2024-04-16 06:36:01', '2024-05-13 09:09:59'),
(400, '5d2f20be-d6ff-11ef-b430-3c7c3f2bc7d9', 'GNBTN_PROC', '$2y$10$TtOZNmVVOpNQhF7NZiFRJecHrynL.ApUU07PYJ65m1mslZY5BiO26', 'dmadrazo91@gmail.com', 14, '4a2421dd-da1e-11ef-b54a-3c7c3f2bc7d9', 1, 'HQevQxzl0olulMerpAtlczvHV4X98jbyXp9jjpBJQfcC4skVVZPLAvThaChV', 0, NULL, '2024-04-16 06:36:45', '2024-05-15 02:12:00'),
(401, '5d2f20f3-d6ff-11ef-b430-3c7c3f2bc7d9', 'GNBTN_CRDT', '$2y$10$L1DzsZLyFiwjsBBc8avI4eW5U37.gnpF2puxv8K0BhBWRthmJXun6', 'cenroguinobatan@yahoo.com.ph', 12, '4a242165-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '8sx1xnnAMvybbslQppeTEnkeNlurpbhyIRYuCL08TXrU58H6jgab7dDGR8sk', 0, NULL, '2024-04-16 06:39:28', '2024-04-17 05:38:42'),
(402, '5d2f2125-d6ff-11ef-b430-3c7c3f2bc7d9', 'GOA_RPS', '$2y$10$RCRvYVPcl58Kw1ciLY9fQOqOWu4VV4ZxFBS7rhA0hwFEI05590u2u', 'lmo123cgoa@gmail.com', 14, '4a2421dd-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-16 06:42:48', '2024-09-20 07:52:03'),
(403, '5d2f2202-d6ff-11ef-b430-3c7c3f2bc7d9', 'GOA_EVAL', '$2y$10$E7e1jUIk.w50grhayoCmxuMWQxOmKbsIlNgIjXrykp93l3d/YXpSS', '19jomarquides93@gmail.com', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, 'PWEkX3wZnlUZ3pdIHEr1fg2t5hPIlSVMPMB0ynkRz67p5L30ZSADo0XDGJ3h', 0, NULL, '2024-04-16 06:43:28', '2024-04-24 10:29:28'),
(404, '5d2f2237-d6ff-11ef-b430-3c7c3f2bc7d9', 'GOA_PROC', '$2y$10$PCLO6NgyCmmfXeqVIs/xPOOEmuH.7da/0Vxwzo4ZK2xZopTZRMoh2', 'remoanaliza0829@gmail.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-16 06:44:03', '2024-04-24 10:30:26'),
(405, '5d2f2324-d6ff-11ef-b430-3c7c3f2bc7d9', 'GOA_CRDT', '$2y$10$Gz6bfTH1wx1TzhpUhEkIjukmLpjhjCgUM03My7g9.sr5ZTXTv2pe.', 'solosajoan2@gmail.com', 12, '4a242165-da1e-11ef-b54a-3c7c3f2bc7d9', 1, 'AVf3IbuMhHQ9X4h9uxd5J0AwXS6AFJizorcU2HSy3vVUh9oLP1Lch5Nuxz3G', 0, NULL, '2024-04-16 06:49:24', '2024-04-17 05:42:23'),
(406, '5d2f235b-d6ff-11ef-b430-3c7c3f2bc7d9', 'GOA_EVAL2', '$2y$10$E9F5feCLJqQ4k/KB.NXpM.lJ.0Nx4/kzxsWqKPn56np0nElqd9Ta6', 'marlon_azul@yahoo.com', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-16 06:50:46', '2024-04-24 10:29:47'),
(407, '5d2f3425-d6ff-11ef-b430-3c7c3f2bc7d9', 'GOA_PROC2', '$2y$10$Sv/Dy0yfy2RJhzPMv/.AD.FBrX71H4KAbiiXJu9lQWepsyYxb2o6.', 'jaynieljames17@gmail.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, 'Q7Gy73BFoDzm8TfwK9od90YnNOhA5Mnay3F0P8BbKyC0DotEu9yoXYdXb6Oo', 0, NULL, '2024-04-16 06:51:33', '2024-04-24 10:30:26'),
(408, '5d2f349e-d6ff-11ef-b430-3c7c3f2bc7d9', 'SPCOT_RPS', '$2y$10$iOEuULmbEB.ZMmH58fBY/eokpbu96B62dixzk99p/FL/RDlvtjiwi', 'cirujalesorly@yahoo.com', 14, '4a2421dd-da1e-11ef-b54a-3c7c3f2bc7d9', 1, 'C5IH6aikMTzmMxq9GxrgSaJ5onz4PtIg9duGUV111OnNaa6Rydw8GQFnYuPR', 0, NULL, '2024-04-16 07:14:37', '2024-08-28 06:08:33'),
(409, '5d2f35a7-d6ff-11ef-b430-3c7c3f2bc7d9', 'SPCOT_EVAL', '$2y$10$v76HFBfQCSPZncooYWNeou9VaaloDy0DZTXDj1zDJEMNbDkMmYEbm', 'reinz_twinkle_15@yahoo.com', 14, '4a2421dd-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-16 07:15:15', '2024-09-03 08:44:14'),
(410, '5d2f36c8-d6ff-11ef-b430-3c7c3f2bc7d9', 'SPCOT_PROC', '$2y$10$Tp6vFkRZ0pdoYNg848AqA.HCkIQDHkDvZ1JrzPzPYIEllRHrIoBpu', 'joelbreguela05@gmail.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-16 07:16:19', '2024-04-24 10:34:30'),
(411, '5d2f37c7-d6ff-11ef-b430-3c7c3f2bc7d9', 'SPCOT_CRDT', '$2y$10$VJtEXfDDtqNrUqIdxCds3uwargRR1NS4idPUEqkWEuuw7ucwnA4bK', 'csipocotshamiebotor@gmail.com', 12, '4a242165-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-16 07:16:50', '2024-04-17 05:54:42'),
(412, '5d2f38c4-d6ff-11ef-b430-3c7c3f2bc7d9', 'MOBO_RPS', '$2y$10$j9ktIjQb9c8rvxtH8YZgLOAT781nnMsIOfHy3brcDWQZCtns5ar8u', 'josephjuliussancho@gmail.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-16 07:20:54', '2024-09-20 07:25:11'),
(413, '5d2f39bf-d6ff-11ef-b430-3c7c3f2bc7d9', 'MOBO_EVAL', '$2y$10$vEbnrOy2vASaAGUcOgWQz.noReSDowiHzl7UVhKWSlYybk2oPMRF6', 'boseflorilynne@gmail.com', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-16 07:21:38', '2024-09-20 07:25:11'),
(414, '5d2f3d55-d6ff-11ef-b430-3c7c3f2bc7d9', 'MOBO_PROC', '$2y$10$OTPC55EydZomZ7reOVlNrOi1iD40J6usJKm/HCjnO6nF4iVp6bLaW', 'frugeo122023@yahoo.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-16 07:23:08', '2024-09-20 07:25:11'),
(415, '5d2f3da6-d6ff-11ef-b430-3c7c3f2bc7d9', 'MOBO_CRDT', '$2y$10$GTOnb5ebiPsVmH4VsM60vu7Ai79y/XUqYZ1wLVWiR3ewWHRatn5pG', 'marylintuzon@gmail.com', 12, '4a242165-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-16 07:23:50', '2024-09-20 07:25:11'),
(416, '5d2f3dec-d6ff-11ef-b430-3c7c3f2bc7d9', 'SJ_RPS', '$2y$10$d2JpgXyHLHIk9Cq00VogkuSmSE5NXKN.ZEFGT6KhoWDHy4iaXOof6', 'emipaglinawanrold@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, 'The6EdX3jJaZbMBkKbgDsMBimKfT6RywAZFvo7XhbxmUzfnTqcjUP6AjSr2R', 0, NULL, '2024-04-16 07:29:55', '2024-04-16 07:29:55'),
(417, '5d2f3e44-d6ff-11ef-b430-3c7c3f2bc7d9', 'SJ_EVAL', '$2y$10$Q9SBq9QvA7fwGr7x8tXCHeh.p/Xh8A8qPMjVsE/qBNlDUTYyzEg2G', 'imeldaalmodiel0307@gmail.com', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-16 07:30:26', '2024-04-24 10:33:55'),
(418, '5d2f3e7b-d6ff-11ef-b430-3c7c3f2bc7d9', 'SJ_PROC', '$2y$10$4qWj1uhs.6OJL3hcFsqOt.sybgpBnNgElieoDX25YmH3W5E//7DzC', 'cabiles86@gmail.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, 'CrQBJaK3nQQlAUikPdxrbdVNsHl6M236EoN0Mas6Afi1PGuHrOOVGOYmry7f', 0, NULL, '2024-04-16 07:31:02', '2024-04-24 10:34:03'),
(419, '5d2f3eb2-d6ff-11ef-b430-3c7c3f2bc7d9', 'SJ_CRDT', '$2y$10$wXD1ygs2MO8xzLAdRyMXb.wF35.mBIXmSqRBnofCzWWhVm/2mZ.qS', 'irishfernandez0516@gmail.com', 12, '4a242165-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-16 07:31:35', '2024-04-17 06:11:15'),
(420, '5d2f3eed-d6ff-11ef-b430-3c7c3f2bc7d9', 'GOA_REC', '$2y$10$1FTKA.nxIqW6ibgkMf7phuu5SrdPTt0mLZNJiFvHDbRkyF9IoZu2O', 'valleyforge04@gmail.com', 14, '4a2421dd-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '4qevYpyQCi0AmA2sAgtcFFEGOg6k7kvB0crhMSs6vMGT7NlbsWlaikZYfF5j', 0, NULL, '2024-04-17 02:31:55', '2024-09-20 07:51:53'),
(421, '5d2f3f27-d6ff-11ef-b430-3c7c3f2bc7d9', 'ALB_EVALGP', '$2y$10$IsdS.rElISFz4GiL6d35tefn9qxjfAG6Xsn9cbOFhacM7u8Zdk..K', 'Sample240417113312rlPe91@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-17 03:33:17', '2024-05-14 01:04:38'),
(422, '5d2f3f60-d6ff-11ef-b430-3c7c3f2bc7d9', 'SOR_REC2', '$2y$10$DOavE8WZVxvtc1bTXd9sCusJZ4uGyX05M0MkzF3Aae/Qz9RWcSXku', 'Charmaineeve.magbanua.ict@gmail.com', 13, '4a2421a0-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-17 03:40:35', '2024-04-18 06:18:38'),
(423, '5d2f3f98-d6ff-11ef-b430-3c7c3f2bc7d9', 'SOR_EVAL', '$2y$10$xd28GA4mQ/EljgwGLpNFWOeRarPh7nsjn8lrXEPdKtITfXpzIFAjS', 'dulpinaf+sor_eval@gmail.com', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-17 03:49:22', '2024-04-17 03:49:22'),
(424, '5d2f3fd7-d6ff-11ef-b430-3c7c3f2bc7d9', 'SOR_PROC', '$2y$10$eqLDHDFSbhZJlcR6PA3xsu0.cyHwcgRn7jDhdycMnEf26nw1gesPO', 'garcia.rosalie08+sorproc@gmail.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-17 03:51:23', '2024-04-17 03:51:23'),
(425, '5d2f4039-d6ff-11ef-b430-3c7c3f2bc7d9', 'CNORTE_REC', '$2y$10$beVaVcHr9EV9GCIkTb5pXetiWdkemSvhWeyQtbBVs74G6pUUsT0SG', 'jeanelldelossantos@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-17 05:03:18', '2024-04-17 05:04:39'),
(428, '5d2f40ab-d6ff-11ef-b430-3c7c3f2bc7d9', 'CNORTE_EVAL', '$2y$10$s0Huo8zp3InrXbhLErmTdOLW5G0qtSXP4rC1V7pg3BtEctcG/R.6K', 'lpds.camnorte+CNORTE_EVALCHS@gmail.com', 14, '4a2421dd-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-17 05:07:40', '2024-05-20 08:35:52'),
(429, '5d2f4109-d6ff-11ef-b430-3c7c3f2bc7d9', 'CNORTE_PROC', '$2y$10$srzt8/mpAVHFjIkIeGCB7OX84xBU.VPSVUkPrjhndn6vdCo/wIHZO', 'lpds.camnorte+CNORTE_PROCCHS@gmail.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-17 05:07:40', '2024-04-24 10:36:11'),
(430, '5d2f4163-d6ff-11ef-b430-3c7c3f2bc7d9', 'CDUANES_REC', '$2y$10$VewCZXlqfwbLHyFMwGI/z.0EhWOHtu3LjzezgiNCP1iJTRco0Hd6K', 'penrocatanduanes.recordsunit@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, 'ZEfpt8nLWV9FBm85a0CpveaxcwmAdqjQBuEg7CjHqZbbWWLfybLjYRoIbN2G', 0, NULL, '2024-04-17 05:13:30', '2024-04-17 05:13:30'),
(433, '5d2f41cd-d6ff-11ef-b430-3c7c3f2bc7d9', 'MSBT_REC', '$2y$10$2bYlOi11j1ytwXfrkAiP3.DPOkEeiW3qSjZMNQpGlpmXMltM2MlS2', 'cillecos@gmail.com', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-17 05:25:22', '2024-04-17 05:25:22'),
(434, '5d2f4243-d6ff-11ef-b430-3c7c3f2bc7d9', 'MSBT_RPS', '$2y$10$Tp2mItLCVamxhnqlDsI.5erfSNYecGdcGSrR5qQ7d451z8AeLZlY.', 'glennmarklupango@yahoo.com', 14, '4a2421dd-da1e-11ef-b54a-3c7c3f2bc7d9', 1, 'qfTWeYUjmC1pllklsUrg0P9Grx1VBH8oJyXFgAxHwT8UngIsPQfpvNRxrUEl', 0, NULL, '2024-04-17 05:25:22', '2024-04-24 09:11:16'),
(435, '5d2f42a4-d6ff-11ef-b430-3c7c3f2bc7d9', 'MSBT_PROC', '$2y$10$Lw1q1ai2MrwOoclmBlv0qeau4HsmvH1238UbDrT..Mjt8SfJXywqW', 'laurioeduardoiii@gmai.com', 12, '4a242165-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-17 05:25:22', '2024-04-17 05:25:22'),
(437, '5d2f42fc-d6ff-11ef-b430-3c7c3f2bc7d9', 'GNBTN_REC', '$2y$10$gCOnOhX9ly3m90TZU7mctOUh0OL7NOE13s1HlIkpCEdPniv7M1V7e', '', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, 'nKtJzwi9FI2ScB2v2ku0Ly1SAXYdClYG2Hbj6y4bValKKaGFQslGl0xaHVq8', 0, NULL, '2024-04-17 05:34:53', '2024-04-17 05:34:53'),
(440, '5d2f4357-d6ff-11ef-b430-3c7c3f2bc7d9', 'GNBTN_PROC2', '$2y$10$gL548BZ861/lmi46n.vY5uNkL.TjEKTH3EuKOFXhN4WZrnlp.UQxO', 'gragedajhoviern_05@gmail.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-17 05:36:23', '2024-04-24 10:31:44'),
(441, '5d2f43af-d6ff-11ef-b430-3c7c3f2bc7d9', 'GNBTN_PROC3', '$2y$10$Jh7XtMoYGOlReJ3x1kXNFO2WI/cJ09hgal.tyi1PjT7zwqT2sg3tK', 'arayaroy25@gmail.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, 'gY0RaFC1oe9YcyqMYwje7vAXD4vM7rS4nr9IsFJVNYRfOG2cGc1NW5rD789p', 0, NULL, '2024-04-17 05:36:23', '2024-04-24 10:32:00'),
(442, '5d2f440a-d6ff-11ef-b430-3c7c3f2bc7d9', 'SPCOT_REC', '$2y$10$W7amIaekOpWC6ahO3WK2NuNmQeIpu1Zt.2Vz4VujIWehN7mUmwj9i', 'chrissy242@gmail.com', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, 'dMukJKKJiE7nFh19pcIkdw1V435NbMYH0qqqiiVebGbqVHhXfbD7wiJXzO9l', 0, NULL, '2024-04-17 05:56:17', '2024-04-17 05:56:17'),
(443, '5d2f446f-d6ff-11ef-b430-3c7c3f2bc7d9', 'SJ_REC', '$2y$10$8toJnaJmCSfs8Ais8xzyeuudSTTno0mVgSGhEHqo/SePVoKMSnQHa', 'loidadelossantos1978@gmail.com', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, 'K7CEO8qn4msMytoJrC066ei37sOAgaaFzxARn7AwUNv2FqI4lUfB3TMKuPAO', 0, NULL, '2024-04-17 06:08:56', '2024-04-17 06:08:56'),
(444, '5d2f44ca-d6ff-11ef-b430-3c7c3f2bc7d9', 'GNBTN_PROC4', '$2y$10$W4oX2UHgAxfQhpGkyEUfHuq2SbQ9siXMTIMC7PNeqrgf0tBBKpA8.', 'sethalcantara08+gnbtn_proc4@gmail.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-17 06:54:14', '2024-04-24 10:32:16'),
(445, '5d2f4523-d6ff-11ef-b430-3c7c3f2bc7d9', 'CSUR_REC', '$2y$10$3YTJIrifYNhuFdZvr6EeL.V5p4vzdFifwp73PYkSJevVm3OS2fSza', 'joycnale2@yahoo.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-18 05:11:30', '2024-04-18 05:11:30'),
(446, '5d2f457c-d6ff-11ef-b430-3c7c3f2bc7d9', 'CSUR_RPS', '$2y$10$GXCNn42k1NzLqqXgSnH0N.Ek/To9E9iWYsyyLKfppp3U65baXsx4C', 'r5penrocs.rps@gmail.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-18 05:11:30', '2024-04-18 05:11:30'),
(447, '5d2f45e2-d6ff-11ef-b430-3c7c3f2bc7d9', 'CSUR_EVAL', '$2y$10$dzlqmrKEf3DHg4Sb6chxAuT5sidD2xMWJgDvXT.DiLA8WzrEn8Ze.', 'nelchelleanne@gmail.com', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-18 05:11:30', '2024-04-24 10:36:23'),
(448, '5d2f461e-d6ff-11ef-b430-3c7c3f2bc7d9', 'CSUR_PROC', '$2y$10$R490hJ0iF.A6wivuVXxbteHAAzISrZ/zAWvxxsE8hUbx6bMxdgaA2', 'ejpadillatayaban@gmail.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-18 05:11:30', '2024-04-24 10:36:32'),
(449, '5d2f4655-d6ff-11ef-b430-3c7c3f2bc7d9', 'CSUR_CRDT', '$2y$10$fs5EP0ktNq4.QPJmeG2fQec2yeIGZHjKUf89rR8/89UoZW3zchD2u', 'gemmarmendoza@yahoo.com', 12, '4a242165-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-18 05:11:30', '2024-04-18 05:11:30'),
(450, '5d2f468b-d6ff-11ef-b430-3c7c3f2bc7d9', 'CSUR_ICT', '$2y$10$c91TsR/oGhYpwxgtLUKQAeudypZfeJk/2DAx3uhPfvdM.ek3POTA2', 'jcstacruz@denr.gov.ph', 13, '4a2421a0-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-18 05:14:50', '2024-04-18 05:52:35'),
(451, '5d2f46c3-d6ff-11ef-b430-3c7c3f2bc7d9', 'msbt_ict', '$2y$10$vT72Qrko6VuES24zuCWDEOA69VuVr3rTO4wsnUfReiXiThV6tWTG.', 'rpmoncada@denr.gov.ph', 13, '4a2421a0-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-18 05:22:06', '2024-04-18 05:52:40'),
(452, '5d2f46fa-d6ff-11ef-b430-3c7c3f2bc7d9', 'IRGA_REC', '$2y$10$2N.cx7BsG4AcUCUzGFXec.BvGHwm66KRgBohJXCWuyaQqPccBgW4a', 'cenroiriga@denr.gov.ph', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '6QAlul748mi7UZnd2tTNa9CDHYmhSsxwHS7SnzHJylcnL1iVXYkgfpEjCl0x', 0, NULL, '2024-04-18 06:04:04', '2024-04-18 06:04:04'),
(453, '5d2f4732-d6ff-11ef-b430-3c7c3f2bc7d9', 'IRGA_RPS', '$2y$10$jftU8HTRQGuJwnt.XNBMd.3BVvpCAwl11L7ma8OYyXR5huEzNcHbq', 'solimannelson228@gmail.com', 14, '4a2421dd-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '2HUL6IXck0fut4MBb6weQRbyhX1nwDMGWYMUoNN8yVt5s7hLi6uegwyMOL3k', 0, NULL, '2024-04-18 06:04:05', '2024-09-04 07:04:53'),
(454, '5d2f476a-d6ff-11ef-b430-3c7c3f2bc7d9', 'IRGA_EVAL', '$2y$10$.JsS8aHe5YRyOxyElG4jtewsWs4ZlD9yGB9CfCV0VpKIPapja3A66', 'maritesguevara65@gmail.com', 14, '4a2421dd-da1e-11ef-b54a-3c7c3f2bc7d9', 1, 'vKMEwHJTJTtmQzJLk2nul9cgftQgWPmsf1uOAsbht3XE44onrSBfDQkBEu4R', 0, NULL, '2024-04-18 06:04:05', '2024-09-05 01:02:28'),
(455, '5d2f47a3-d6ff-11ef-b430-3c7c3f2bc7d9', 'IRGA_PROC', '$2y$10$vutg2Pqz7OmgIpGx9PGi/OCyOi33RPHNbnzEEjHyBCNY4INNJyarS', 'lalainegotis@gmail.com', 14, '4a2421dd-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-18 06:04:05', '2024-09-04 07:10:39'),
(456, '5d2f47d9-d6ff-11ef-b430-3c7c3f2bc7d9', 'IRGA_PROC2', '$2y$10$GAjdA.1j4dEKSdrLbJYU8ujz9tWNahMtfb/WqRqnd2wtWuIH7l24a', 'bryanlindomagayes@gmail.com', 14, '4a2421dd-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-18 06:04:05', '2024-09-04 07:10:39'),
(457, '5d2f4810-d6ff-11ef-b430-3c7c3f2bc7d9', 'IRGA_CRDT', '$2y$10$IGEqAXWtjluT.sw7cjxtROioNUNb9GT4W1bnYD6/fI2P0A/Vt0HDu', 'jgvsarto30@gmail.com', 12, '4a242165-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-18 06:04:05', '2024-04-18 06:04:05'),
(459, '5d2f4849-d6ff-11ef-b430-3c7c3f2bc7d9', 'goa_ict', '$2y$10$Bgik17Jnsf9/ABfBcxzNy.ken1sq7QeEHEC50uO6uNxr8n923fp1.', 'ictcenrogoa@gmail.com', 13, '4a2421a0-da1e-11ef-b54a-3c7c3f2bc7d9', 1, 'ABPibFsfV9UY2qg5vy4Unm9WDV4nvydnyDMJtb1aAKQarR3aEwudBlK9tBiT', 0, NULL, '2024-04-18 06:11:45', '2024-04-18 06:11:45'),
(460, '5d2f4881-d6ff-11ef-b430-3c7c3f2bc7d9', 'goa_ict_staff', '$2y$10$QD1e6kWHd42eUBE6ujsfQ.HgqebYakTUJB1a3BVg5PZmjLYGzPJUa', 'ictcenrogoa+ictStaff1@gmail.com', 13, '4a2421a0-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '64IK7l6xZ1riSUfR6E8fAfQitQJlMzyJtMGmUU8SrJYaVfSof6qMzxvERpt1', 0, NULL, '2024-04-18 06:11:45', '2024-04-18 06:11:45'),
(461, '5d2f48fd-d6ff-11ef-b430-3c7c3f2bc7d9', 'spcot_ict', '$2y$10$XJ.zDMleE.zxo5me6kX01uA4GaPjj1weXSDuUZP6bd3pIn7upI65O', 'rafflesia_11812@yahoo.com', 13, '4a2421a0-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-18 06:17:52', '2024-04-18 06:17:52'),
(462, '5d2f4937-d6ff-11ef-b430-3c7c3f2bc7d9', 'spcot_ict_staff', '$2y$10$5lvqREIs6Ej1SdL9nYqdK.qzGAvjWZTmB8kZ0RmIxIboMx2J7ZYB6', 'maymay636@yahoo.com', 13, '4a2421a0-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-18 06:17:53', '2024-04-18 06:17:53'),
(463, '5d2f496d-d6ff-11ef-b430-3c7c3f2bc7d9', 'mobo_ict', '$2y$10$2.342G1VieWGYPeyPbFfauAvfoFgLf/NQTOFCYW3SueZguDUXtFBG', 'jkalaurio16@gmail.com', 12, '4a242165-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-18 06:23:36', '2024-09-20 07:25:11'),
(464, '5d2f49a4-d6ff-11ef-b430-3c7c3f2bc7d9', 'mobo_cenro', '$2y$10$uiuSsNNKF.W.6iiSqHymHONch9p4j3ZYwLdPf3bgUELb.BhAEblI.', 'jeanimperial15@gmail.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-18 06:23:37', '2024-09-20 07:25:11'),
(465, '5d2f49dc-d6ff-11ef-b430-3c7c3f2bc7d9', 'sj_ict', '$2y$10$3ZV86JR5h1QdoXhOA.iPG.TjewQVn/qk50YFhfh7H2N1jnV7kuIby', 'lecturajuliusjonlourenz@gmail.com', 13, '4a2421a0-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-18 06:29:55', '2024-04-18 06:29:55'),
(466, '5d2f4a14-d6ff-11ef-b430-3c7c3f2bc7d9', 'sj_ict_staff', '$2y$10$88mzecbw4Kumm1sov0OIYeUCbHRF2LvZs8Z./pQGMvylMfcm9MAbW', 'medallaargie@gmail.com', 13, '4a2421a0-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-04-18 06:29:55', '2024-04-18 06:29:55'),
(467, '5d2f4a4c-d6ff-11ef-b430-3c7c3f2bc7d9', 'cenro_goa', '$2y$10$FkZAKjmSci8csfVwSsUczeioRaYOC8cKbGeJoj5FJTCx9cTG6auRa', 'Sample240429153852BwWsg1@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, 'NVT46tyPGs0sbUj99sGH1n8mZxDC8hul9Vj4hBpgIAnWNUnXb27QabRBsraj', 0, NULL, '2024-04-29 07:43:24', '2024-04-29 07:52:24'),
(468, '5d2f4a85-d6ff-11ef-b430-3c7c3f2bc7d9', 'lpdd_fus', '$2y$10$Ux5w/sFc/Y.rfrWxpzRxCOAAY5Pc4LfvGCNjp6Jakpq7gJmYHtdQy', 'Sample240513162921Vgj0i2@gmail.com', 2, '4a241ed2-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-05-13 08:30:38', '2024-05-14 06:52:49'),
(469, '5d2f4abc-d6ff-11ef-b430-3c7c3f2bc7d9', 'oardts_user1', '$2y$10$xbq5hKu0KO.kTDEzbIMXC.nLycP7OMU9gnP2uQWi0RbnJq5OhCXme', 'Sample2405140902596IHw02@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-05-14 01:03:18', '2024-05-14 01:03:18'),
(470, '5d2f4af5-d6ff-11ef-b430-3c7c3f2bc7d9', 'CENRO_SPCOT', '$2y$10$VbCvj6J/UF2Q//JTBwzqtu6nKmckYYRJ7uNnkYe8dp7sQQuM7G//2', 'CENROTEST@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, 'oaDQFatWiat9F8S8cF7911n2A3hyXzAhq3cZpYOGUscsSz3G9440ExBDztas', 0, NULL, '2024-08-28 06:08:03', '2024-08-28 06:08:03'),
(471, '5d2f4b2d-d6ff-11ef-b430-3c7c3f2bc7d9', 'ELB_IRIGA_PROC', '$2y$10$0toqhwV9q5SCkjH0Y0/lFeoS6X4.bssC56qFSAI.8EYB/UhDI/qf.', 'Sample240904144538rXwy93@gmail.com', 14, '4a2421dd-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-09-04 06:47:20', '2024-09-04 07:10:39'),
(472, '5d2f4b65-d6ff-11ef-b430-3c7c3f2bc7d9', 'CAS_IRIGA_PROC', '$2y$10$pN/iHQuOiLxEwOPr6bOVo.4Q4.CJK0rntRtVJ6cnvlQlXIjr8wLOS', 'Sample2409041445389mrYk4@gmail.com', 14, '4a2421dd-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-09-04 06:47:20', '2024-09-04 07:10:39'),
(473, '5d2f4ba7-d6ff-11ef-b430-3c7c3f2bc7d9', 'HPH_IRIGA_PROC', '$2y$10$5YlvbmJQFUg8NghZREq8t.MZXmdQO4pvcsqjLgN4ru2YFVF15UNlS', 'Sample240904144539ZU1WD5@gmail.com', 14, '4a2421dd-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-09-04 06:47:20', '2024-09-04 07:10:39'),
(474, '5d2f4be0-d6ff-11ef-b430-3c7c3f2bc7d9', 'MVVA_IRIGA_PROC', '$2y$10$eOaonyewWxpcjvhFclran.Pe8B6a.35RbEIC.n6os7Npyph33f/pe', 'Sample240904144745JGRGo6@gmail.com', 14, '4a2421dd-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '8H9L2uaVDAFuzri4xNN7p5IPXMnxTQcumCILJGJJZGQqeFPBxfxjsByLe6CP', 0, NULL, '2024-09-04 06:47:20', '2024-09-04 07:10:39'),
(475, '5d2f4cad-d6ff-11ef-b430-3c7c3f2bc7d9', 'SPCOT_SVEMS', '$2y$10$Ca6fhxv7vccdSiQDjdTskuAbNzUKwIQvdMdUIGRJKUsMXvb.ZegTy', 'Sample241009161330gjBQu1@gmail.com', 14, '4a2421dd-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '0', 0, NULL, '2024-10-09 08:15:35', '2024-10-09 08:15:35'),
(476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'test', '$2y$10$MoenuwfW6LLtohm8ekP2k.ZcPrxlHR0yPSyXDSIq31Q5SzUoap0/O', 'testChange@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, '3DBtDOW01UgTFcwrWcawMBIoKszy8gkY5nJM6KmXEm6cXr5HpEA6dpzlVdCV', 0, NULL, '2025-01-16 08:06:10', '2025-02-06 02:06:04');

-- --------------------------------------------------------

--
-- Table structure for table `redts_d_profile`
--

CREATE TABLE `redts_d_profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_uuid` char(36) DEFAULT NULL COMMENT 'comment here',
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `position` varchar(255) NOT NULL DEFAULT 'unset',
  `image` longtext DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redts_d_profile`
--

INSERT INTO `redts_d_profile` (`id`, `user_id`, `user_uuid`, `fname`, `mname`, `sname`, `suffix`, `position`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '5d2efb68-d6ff-11ef-b430-3c7c3f2bc7d9', 'Administrator', 'A.', 'Admin', NULL, 'unset', '', NULL, NULL, NULL),
(2, 2, '5d2f0949-d6ff-11ef-b430-3c7c3f2bc7d9', 'DENR', '', 'R5', NULL, 'unset', '', NULL, NULL, NULL),
(304, 304, '5d2f09e3-d6ff-11ef-b430-3c7c3f2bc7d9', 'John Isaac', 'Sample', 'Sales', '', 'unset', 'assets/img/user_pic/jisales_202311100323.jpg', NULL, NULL, '2023-12-27 05:22:23'),
(314, 315, '5d2f0acb-d6ff-11ef-b430-3c7c3f2bc7d9', 'Clive Mark', 'Buelva', 'Barcellano', NULL, 'Computer Operator', 'assets/img/user_pic/cmbarcellano@forbescollege.org_202501151538.jpg', NULL, NULL, '2025-01-15 07:38:58'),
(315, 314, '5d2f0a64-d6ff-11ef-b430-3c7c3f2bc7d9', 'Admin', '', 'Chicken', NULL, 'unset', 'assets/img/user_pic/olivemyki49_202501161628.jpg', NULL, NULL, '2025-01-16 08:28:49'),
(316, 316, '5d2f0b29-d6ff-11ef-b430-3c7c3f2bc7d9', 'Carlo', 'S.', 'Zabiro', '', 'unset', 'assets/img/user_pic/gbtn_rec_202311280141.jpg', NULL, NULL, '2024-04-17 05:32:46'),
(317, 317, '5d2f0c05-d6ff-11ef-b430-3c7c3f2bc7d9', 'Carles', 'Sandro', 'Curpos', '', 'unset', 'assets/img/user_pic/gbtn_rps_202311280142.jpg', NULL, NULL, '2024-04-17 05:32:51'),
(318, 319, '5d2f0c5e-d6ff-11ef-b430-3c7c3f2bc7d9', 'Elmner', 'Karol', 'Sumer', '', 'unset', '', NULL, NULL, '2023-12-27 05:22:23'),
(319, 321, '5d2f0cb1-d6ff-11ef-b430-3c7c3f2bc7d9', 'Carlo', 'T.', 'Lapus', '', 'Administrative Aide II', 'assets/img/user_pic/gbtn_cashier_202311280142.jpg', NULL, NULL, '2024-04-16 02:51:01'),
(320, 322, '5d2f0e0e-d6ff-11ef-b430-3c7c3f2bc7d9', 'Ferdinand', 'L', 'Baltazar', '', 'unset', 'assets/img/user_pic/gbtn_cenro_202311280143.jpg', NULL, NULL, '2024-04-16 02:56:45'),
(321, 324, '5d2f0e71-d6ff-11ef-b430-3c7c3f2bc7d9', 'Elmer', 'Sanchez', 'Miller', '', 'unset', '', NULL, NULL, '2023-12-27 05:22:23'),
(333, 340, '5d2f0ec7-d6ff-11ef-b430-3c7c3f2bc7d9', 'Gerald', 'D.', 'Lupango', '', 'unset', '', NULL, '2023-11-28 19:20:11', '2024-09-20 07:22:37'),
(334, 341, '5d2f0f19-d6ff-11ef-b430-3c7c3f2bc7d9', 'Yalonda', 'Kleisle', 'Elvish', '', 'unset', '', NULL, '2023-12-06 00:46:11', '2023-12-20 03:15:00'),
(335, 342, '5d2f0f78-d6ff-11ef-b430-3c7c3f2bc7d9', 'Baily', 'Charlet', 'Epelett', '', 'unset', '', NULL, '2023-12-06 00:48:58', '2023-12-06 05:28:29'),
(336, 343, '5d2f0fce-d6ff-11ef-b430-3c7c3f2bc7d9', 'Nefen', 'Grieswood', 'Diffley', NULL, 'Planning Officer III', '', NULL, '2023-12-06 01:19:27', '2023-12-15 08:51:22'),
(337, 344, '5d2f1027-d6ff-11ef-b430-3c7c3f2bc7d9', 'Shep', 'Freathy', 'Threadgill', '', 'unset', '', NULL, '2023-12-06 05:26:18', '2023-12-06 05:26:18'),
(338, 345, '5d2f107a-d6ff-11ef-b430-3c7c3f2bc7d9', 'Michal', 'Gertz', 'Flaherty', '', 'unset', '', NULL, '2023-12-06 05:26:18', '2023-12-06 05:26:18'),
(339, 346, '5d2f10ea-d6ff-11ef-b430-3c7c3f2bc7d9', 'Barnie', 'Drayton', 'Shrawley', '', 'unset', '', NULL, '2023-12-06 05:27:45', '2023-12-20 03:12:23'),
(340, 347, '5d2f1143-d6ff-11ef-b430-3c7c3f2bc7d9', 'Josephina', 'Gration', 'Bellee', '', 'unset', '', NULL, '2023-12-06 05:27:45', '2023-12-06 05:30:11'),
(341, 348, '5d2f1199-d6ff-11ef-b430-3c7c3f2bc7d9', 'Ali', 'Larham', 'Wallege', '', 'unset', '', NULL, '2023-12-06 05:27:46', '2023-12-06 05:27:46'),
(342, 349, '5d2f11ea-d6ff-11ef-b430-3c7c3f2bc7d9', 'Sample231217004016vUo7m3', 'S.', 'Surname', NULL, 'unset', '', NULL, '2023-12-16 16:37:45', '2023-12-21 02:02:06'),
(343, 350, '5d2f123b-d6ff-11ef-b430-3c7c3f2bc7d9', 'Laila', 'M.', 'Miraflor', '', 'unset', '', NULL, '2023-12-21 00:12:03', '2024-04-17 02:38:05'),
(344, 351, '5d2f1291-d6ff-11ef-b430-3c7c3f2bc7d9', 'Joel', 'B.', 'Bueno', '', 'unset', '', NULL, '2023-12-21 00:13:04', '2024-04-17 02:39:05'),
(345, 352, '5d2f12c8-d6ff-11ef-b430-3c7c3f2bc7d9', 'alb_tsd', 'S.', 'Surname', '', 'unset', '', NULL, '2023-12-21 00:14:34', '2023-12-21 00:14:34'),
(346, 353, '5d2f12fb-d6ff-11ef-b430-3c7c3f2bc7d9', 'Hodin', 'J.', 'Magsipyo', '', 'unset', '', NULL, '2023-12-21 00:16:47', '2024-05-07 08:42:40'),
(347, 354, '5d2f132d-d6ff-11ef-b430-3c7c3f2bc7d9', 'alb_msd', 'S.', 'Surname', '', 'unset', '', NULL, '2023-12-21 00:17:34', '2023-12-21 00:17:34'),
(348, 355, '5d2f1361-d6ff-11ef-b430-3c7c3f2bc7d9', 'alb_es', 'S.', 'Surname', '', 'unset', '', NULL, '2023-12-21 00:18:28', '2023-12-21 00:18:28'),
(349, 356, '5d2f1392-d6ff-11ef-b430-3c7c3f2bc7d9', 'alb_cds', 'S.', 'Surname', '', 'unset', '', NULL, '2023-12-21 00:19:19', '2023-12-21 00:19:19'),
(350, 357, '5d2f13c4-d6ff-11ef-b430-3c7c3f2bc7d9', 'alb_fs', 'S.', 'Surname', '', 'unset', '', NULL, '2023-12-21 00:19:53', '2023-12-21 00:19:53'),
(351, 358, '5d2f13f5-d6ff-11ef-b430-3c7c3f2bc7d9', 'alb_as', 'S.', 'Surname', '', 'unset', '', NULL, '2023-12-21 00:20:28', '2023-12-21 00:20:28'),
(352, 359, '5d2f1426-d6ff-11ef-b430-3c7c3f2bc7d9', 'alb_pmd', 'S.', 'Surname', '', 'unset', '', NULL, '2023-12-21 00:21:18', '2023-12-21 00:21:18'),
(353, 360, '5d2f1457-d6ff-11ef-b430-3c7c3f2bc7d9', 'Lpdd', 'User', '1', '', 'unset', '', NULL, '2023-12-27 05:25:08', '2024-02-08 02:27:59'),
(354, 361, '5d2f148b-d6ff-11ef-b430-3c7c3f2bc7d9', 'Rene', 'L.', 'Manzanades', '', 'unset', '', NULL, '2023-12-27 05:50:01', '2023-12-27 05:50:01'),
(355, 362, '5d2f14bb-d6ff-11ef-b430-3c7c3f2bc7d9', 'Lorna', 'B.', 'Villaflor', '', 'unset', 'assets/img/user_pic/goa_villaflor_202401181000.PNG', NULL, '2024-01-18 01:14:24', '2024-04-17 02:24:53'),
(356, 363, '5d2f14ed-d6ff-11ef-b430-3c7c3f2bc7d9', 'Melanie', 'P.', 'Rojas', NULL, 'unset', 'assets/img/user_pic/goa_rojas_202401181002.PNG', NULL, '2024-01-18 01:14:25', '2024-01-18 02:02:04'),
(357, 364, '5d2f151e-d6ff-11ef-b430-3c7c3f2bc7d9', 'Mary Jane', 'M.', 'Recamara', '', 'unset', 'assets/img/user_pic/goa_recamara_202401181003.PNG', NULL, '2024-01-18 01:14:27', '2024-04-17 02:07:42'),
(358, 365, '5d2f154f-d6ff-11ef-b430-3c7c3f2bc7d9', 'Jomar', 'D.', 'Quides', '', 'unset', 'assets/img/user_pic/goa_quides_202401181004.PNG', NULL, '2024-01-18 01:14:28', '2024-04-17 02:24:53'),
(359, 366, '5d2f157f-d6ff-11ef-b430-3c7c3f2bc7d9', 'Jojo', 'C.', 'Collao', NULL, 'unset', 'assets/img/user_pic/goa_collao_202401181007.PNG', NULL, '2024-01-18 01:14:29', '2024-01-18 02:07:43'),
(360, 367, '5d2f15af-d6ff-11ef-b430-3c7c3f2bc7d9', 'Analiza', 'D.', 'Remo', NULL, 'unset', 'assets/img/user_pic/goa_remo_202401181008.PNG', NULL, '2024-01-18 01:14:30', '2024-01-18 02:08:23'),
(361, 368, '5d2f15e0-d6ff-11ef-b430-3c7c3f2bc7d9', 'Femy', 'C.', 'Sedeño', NULL, 'unset', 'assets/img/user_pic/goa_sedeño_202401181009.PNG', NULL, '2024-01-18 01:14:31', '2024-01-18 02:09:15'),
(362, 369, '5d2f1611-d6ff-11ef-b430-3c7c3f2bc7d9', 'Cyrus Job', '', 'Dela Cruz', NULL, 'unset', 'assets/img/user_pic/goa_dela_cruz_202401181016.PNG', NULL, '2024-01-18 01:26:49', '2024-01-18 02:16:40'),
(363, 370, '5d2f1641-d6ff-11ef-b430-3c7c3f2bc7d9', 'LYNA', 'B.', 'LLAVE', '', 'unset', '', NULL, '2024-01-22 03:45:47', '2024-04-17 03:38:28'),
(364, 371, '5d2f1673-d6ff-11ef-b430-3c7c3f2bc7d9', 'Lorenz Kurt', 'C.', 'Abrasaldo', NULL, 'EMS II', '', NULL, '2024-02-08 02:32:53', '2024-02-08 07:36:08'),
(365, 372, '5d2f16a6-d6ff-11ef-b430-3c7c3f2bc7d9', 'WRPS', 'User', '2', '', 'unset', '', NULL, '2024-02-08 02:32:54', '2024-02-08 02:34:42'),
(366, 373, '5d2f16d8-d6ff-11ef-b430-3c7c3f2bc7d9', 'Carmen', 'S.', 'Basto', '', 'unset', '', NULL, '2024-04-16 00:07:02', '2024-05-07 08:41:31'),
(367, 374, '5d2f1717-d6ff-11ef-b430-3c7c3f2bc7d9', 'Sample240416080320ogocp2', 'S.', 'Surname', '', 'unset', '', NULL, '2024-04-16 00:07:03', '2024-04-16 01:33:28'),
(368, 375, '5d2f1747-d6ff-11ef-b430-3c7c3f2bc7d9', 'Ronna Mae', 'D.', 'Agzapan', '', 'unset', '', NULL, '2024-04-16 00:07:03', '2024-09-05 02:41:57'),
(369, 376, '5d2f1778-d6ff-11ef-b430-3c7c3f2bc7d9', 'Laemin', ' ', 'Torero', '', 'unset', '', NULL, '2024-04-16 00:07:03', '2024-05-07 08:44:27'),
(370, 377, '5d2f17b2-d6ff-11ef-b430-3c7c3f2bc7d9', 'Carlo', 'R.', 'Magsipin', 'Jr.', 'unset', '', NULL, '2024-04-16 00:07:03', '2024-05-07 08:45:05'),
(371, 378, '5d2f18b3-d6ff-11ef-b430-3c7c3f2bc7d9', 'Tony Jay', 'B.', 'Barascan', '', 'unset', '', NULL, '2024-04-16 00:07:03', '2024-05-07 08:45:41'),
(372, 379, '5d2f1905-d6ff-11ef-b430-3c7c3f2bc7d9', 'Luvido', 'C.', 'Semanan', '', 'unset', '', NULL, '2024-04-16 00:07:03', '2024-05-07 08:42:05'),
(373, 380, '5d2f193c-d6ff-11ef-b430-3c7c3f2bc7d9', 'RICHELYN', 'A', 'GUIRIBA', '', 'unset', '', NULL, '2024-04-16 03:05:36', '2024-04-24 10:35:04'),
(374, 381, '5d2f1974-d6ff-11ef-b430-3c7c3f2bc7d9', 'DEBBIE', 'A', 'MAPA', '', 'unset', '', NULL, '2024-04-16 03:07:09', '2024-04-24 10:35:17'),
(375, 382, '5d2f19ab-d6ff-11ef-b430-3c7c3f2bc7d9', 'ANDREA FATIMA', 'SA.', 'BUENAVENTURA', '', 'unset', '', NULL, '2024-04-16 03:07:58', '2024-04-17 03:30:35'),
(376, 383, '5d2f19e0-d6ff-11ef-b430-3c7c3f2bc7d9', 'SHERWEN', 'F', 'ALCANTARA', '', 'unset', '', NULL, '2024-04-16 03:53:16', '2024-04-24 10:35:32'),
(377, 384, '5d2f1a16-d6ff-11ef-b430-3c7c3f2bc7d9', 'IMEE', 'I', 'MAMISAO', '', 'unset', '', NULL, '2024-04-16 03:56:02', '2024-04-24 10:35:42'),
(378, 385, '5d2f1b6b-d6ff-11ef-b430-3c7c3f2bc7d9', 'FREDDIE', 'A', 'DULPINA', '', 'unset', '', NULL, '2024-04-16 06:05:58', '2024-04-16 06:05:58'),
(379, 386, '5d2f1ba3-d6ff-11ef-b430-3c7c3f2bc7d9', 'ROSALIE', 'L', 'GARCIA', '', 'unset', '', NULL, '2024-04-16 06:09:31', '2024-04-24 11:18:03'),
(380, 387, '5d2f1bd5-d6ff-11ef-b430-3c7c3f2bc7d9', 'IVY LYNN', 'C', 'BAYLON', '', 'unset', '', NULL, '2024-04-16 06:10:24', '2024-04-24 11:18:13'),
(381, 388, '5d2f1c1c-d6ff-11ef-b430-3c7c3f2bc7d9', 'ARLENE', 'D', 'DIONEDA', '', 'unset', '', NULL, '2024-04-16 06:12:10', '2024-04-17 04:08:43'),
(382, 389, '5d2f1c52-d6ff-11ef-b430-3c7c3f2bc7d9', 'Angelito', 'L', 'Rutaquio', '', 'unset', '', NULL, '2024-04-16 06:15:08', '2024-04-16 06:15:08'),
(383, 390, '5d2f1c85-d6ff-11ef-b430-3c7c3f2bc7d9', 'Janet', 'B', 'Forbes', '', 'unset', '', NULL, '2024-04-16 06:17:50', '2024-04-17 05:06:36'),
(384, 391, '5d2f1d65-d6ff-11ef-b430-3c7c3f2bc7d9', 'Lilian', 'M', 'Quiñones', '', 'unset', '', NULL, '2024-04-16 06:22:40', '2024-04-16 06:22:40'),
(385, 392, '5d2f1e1e-d6ff-11ef-b430-3c7c3f2bc7d9', 'Jeanny', 'P', 'Llanderal', '', 'unset', '', NULL, '2024-04-16 06:23:42', '2024-04-24 10:17:34'),
(386, 393, '5d2f1e64-d6ff-11ef-b430-3c7c3f2bc7d9', 'Resaly', 'M', 'Gualvez', '', 'unset', '', NULL, '2024-04-16 06:24:29', '2024-04-24 10:36:47'),
(387, 394, '5d2f1e96-d6ff-11ef-b430-3c7c3f2bc7d9', 'Jessa', 'D', 'Sierra', '', 'unset', '', NULL, '2024-04-16 06:25:03', '2024-04-17 05:16:40'),
(388, 395, '5d2f1f79-d6ff-11ef-b430-3c7c3f2bc7d9', 'Melanie', ' ', 'Dayawon', '', 'unset', '', NULL, '2024-04-16 06:28:32', '2024-04-24 11:00:18'),
(391, 398, '5d2f1fad-d6ff-11ef-b430-3c7c3f2bc7d9', 'CIARA MAE', 'R', 'MAPE', '', 'unset', '', NULL, '2024-04-16 06:35:18', '2024-04-16 06:35:18'),
(392, 399, '5d2f1fe1-d6ff-11ef-b430-3c7c3f2bc7d9', 'SETH', 'B', 'ALCANTARA', '', 'unset', '', NULL, '2024-04-16 06:36:01', '2024-05-13 09:10:00'),
(393, 400, '5d2f20be-d6ff-11ef-b430-3c7c3f2bc7d9', 'DANIEL', 'P', 'MADRAZO', '', 'unset', '', NULL, '2024-04-16 06:36:45', '2024-05-15 02:12:00'),
(394, 401, '5d2f20f3-d6ff-11ef-b430-3c7c3f2bc7d9', 'LUDIVINA', 'V', 'LLANA', '', 'unset', '', NULL, '2024-04-16 06:39:28', '2024-04-17 05:38:42'),
(395, 402, '5d2f2125-d6ff-11ef-b430-3c7c3f2bc7d9', 'Lorna', 'B', 'Villaflor', '', 'unset', '', NULL, '2024-04-16 06:42:48', '2024-09-20 07:52:03'),
(396, 403, '5d2f2202-d6ff-11ef-b430-3c7c3f2bc7d9', 'Jomar', 'D', 'Quides', '', 'unset', '', NULL, '2024-04-16 06:43:28', '2024-04-24 10:29:28'),
(397, 404, '5d2f2237-d6ff-11ef-b430-3c7c3f2bc7d9', 'Analiza', ' ', 'Remo', '', 'unset', '', NULL, '2024-04-16 06:44:03', '2024-04-24 10:30:26'),
(398, 405, '5d2f2324-d6ff-11ef-b430-3c7c3f2bc7d9', 'Joan', ' ', 'Solosa', '', 'unset', '', NULL, '2024-04-16 06:49:24', '2024-04-17 05:42:23'),
(399, 406, '5d2f235b-d6ff-11ef-b430-3c7c3f2bc7d9', 'Marlon', 'C', 'Azul', '', 'unset', '', NULL, '2024-04-16 06:50:46', '2024-04-24 10:29:47'),
(400, 407, '5d2f3425-d6ff-11ef-b430-3c7c3f2bc7d9', 'Mary Jane', 'M', 'Recamara', '', 'unset', '', NULL, '2024-04-16 06:51:33', '2024-04-24 10:30:26'),
(401, 408, '5d2f349e-d6ff-11ef-b430-3c7c3f2bc7d9', 'Orly', 'B', 'Cirujales', '', 'unset', '', NULL, '2024-04-16 07:14:37', '2024-08-28 06:08:33'),
(402, 409, '5d2f35a7-d6ff-11ef-b430-3c7c3f2bc7d9', 'Ina Gracia', 'C', 'Geronimo', '', 'unset', '', NULL, '2024-04-16 07:15:15', '2024-09-03 08:44:15'),
(403, 410, '5d2f36c8-d6ff-11ef-b430-3c7c3f2bc7d9', 'Joel', 'P', 'Breguela', '', 'unset', '', NULL, '2024-04-16 07:16:19', '2024-04-24 10:34:30'),
(404, 411, '5d2f37c7-d6ff-11ef-b430-3c7c3f2bc7d9', 'Marie Sharmaine', 'M', 'Botor', '', 'unset', '', NULL, '2024-04-16 07:16:50', '2024-04-17 05:54:42'),
(405, 412, '5d2f38c4-d6ff-11ef-b430-3c7c3f2bc7d9', 'Joseph', 'L', 'Sancho', '', 'unset', '', NULL, '2024-04-16 07:20:54', '2024-09-20 07:25:11'),
(406, 413, '5d2f39bf-d6ff-11ef-b430-3c7c3f2bc7d9', 'Florilynne', 'H', 'Bose', '', 'unset', '', NULL, '2024-04-16 07:21:38', '2024-09-20 07:25:11'),
(407, 414, '5d2f3d55-d6ff-11ef-b430-3c7c3f2bc7d9', 'Irish', 'Si.', 'Pesebre', '', 'unset', '', NULL, '2024-04-16 07:23:08', '2024-09-20 07:25:11'),
(408, 415, '5d2f3da6-d6ff-11ef-b430-3c7c3f2bc7d9', 'Marylin', 'R', 'Tuzon', '', 'unset', '', NULL, '2024-04-16 07:23:50', '2024-09-20 07:25:11'),
(409, 416, '5d2f3dec-d6ff-11ef-b430-3c7c3f2bc7d9', 'Emirold', 'M', 'Paglinawan', '', 'unset', '', NULL, '2024-04-16 07:29:55', '2024-04-16 07:29:55'),
(410, 417, '5d2f3e44-d6ff-11ef-b430-3c7c3f2bc7d9', 'Imelda', 'V', 'Almodiel', '', 'unset', '', NULL, '2024-04-16 07:30:26', '2024-04-24 10:33:55'),
(411, 418, '5d2f3e7b-d6ff-11ef-b430-3c7c3f2bc7d9', 'Christopher', 'C', 'Cabiles', '', 'unset', '', NULL, '2024-04-16 07:31:02', '2024-04-24 10:34:04'),
(412, 419, '5d2f3eb2-d6ff-11ef-b430-3c7c3f2bc7d9', 'Irish', 'S', 'Fernandez', '', 'unset', '', NULL, '2024-04-16 07:31:35', '2024-04-17 06:11:15'),
(413, 420, '5d2f3eed-d6ff-11ef-b430-3c7c3f2bc7d9', 'Peter Aurel', ' ', 'Orata', '', 'unset', '', NULL, '2024-04-17 02:31:55', '2024-09-20 07:51:53'),
(414, 421, '5d2f3f27-d6ff-11ef-b430-3c7c3f2bc7d9', 'Sample240417113312rlPe91', 'S.', 'Surname', '', 'unset', '', NULL, '2024-04-17 03:33:17', '2024-05-14 01:04:38'),
(415, 422, '5d2f3f60-d6ff-11ef-b430-3c7c3f2bc7d9', 'CHARMAINE EVE', 'M.', 'CALLEJA', '', 'unset', '', NULL, '2024-04-17 03:40:35', '2024-04-18 06:18:38'),
(416, 423, '5d2f3f98-d6ff-11ef-b430-3c7c3f2bc7d9', 'FREDDIE', 'A.', 'DULPINA', '', 'unset', '', NULL, '2024-04-17 03:49:23', '2024-04-17 03:49:23'),
(417, 424, '5d2f3fd7-d6ff-11ef-b430-3c7c3f2bc7d9', 'ROSALIE', 'L.', 'GARCIA', '', 'unset', '', NULL, '2024-04-17 03:51:23', '2024-04-17 03:51:23'),
(418, 425, '5d2f4039-d6ff-11ef-b430-3c7c3f2bc7d9', 'Jeanel', 'L.', 'Delos Santos', '', 'positionSample', '', NULL, '2024-04-17 05:03:18', '2024-04-17 05:04:39'),
(419, 428, '5d2f40ab-d6ff-11ef-b430-3c7c3f2bc7d9', 'Lendy', 'S.', 'Del Pilar', '', 'positionSample', '', NULL, '2024-04-17 05:07:40', '2024-05-20 08:35:53'),
(420, 429, '5d2f4109-d6ff-11ef-b430-3c7c3f2bc7d9', 'Jonathan', 'M.', 'Cabildo', '', 'positionSample', '', NULL, '2024-04-17 05:07:40', '2024-04-24 10:36:11'),
(421, 430, '5d2f4163-d6ff-11ef-b430-3c7c3f2bc7d9', 'Joy', 'G. ', 'Cambronero', '', 'Records Officer', '', NULL, '2024-04-17 05:13:30', '2024-04-17 05:13:30'),
(422, 433, '5d2f41cd-d6ff-11ef-b430-3c7c3f2bc7d9', 'Lucille', 'N.', 'Cos', '', 'Admin. Aide VI', '', NULL, '2024-04-17 05:25:22', '2024-04-17 05:25:22'),
(423, 434, '5d2f4243-d6ff-11ef-b430-3c7c3f2bc7d9', 'Glenn Mark', 'D.', 'Lupango', '', 'SvEMS/Chief, RPS', '', NULL, '2024-04-17 05:25:22', '2024-04-24 09:11:16'),
(424, 435, '5d2f42a4-d6ff-11ef-b430-3c7c3f2bc7d9', 'Atty. Eduardo', 'B.', 'Laurio', 'III', 'Special Investigator I', '', NULL, '2024-04-17 05:25:22', '2024-04-17 05:25:22'),
(425, 437, '5d2f42fc-d6ff-11ef-b430-3c7c3f2bc7d9', 'DOLORES', 'P.', 'PRINCESA', '', 'Admin. Officer I / Records Officer I', '', NULL, '2024-04-17 05:34:53', '2024-04-17 05:34:53'),
(426, 440, '5d2f4357-d6ff-11ef-b430-3c7c3f2bc7d9', 'JHOVIERN', 'C.', 'GRAGEDA', '', 'Forest Technician I', '', NULL, '2024-04-17 05:36:23', '2024-04-24 10:31:44'),
(427, 441, '5d2f43af-d6ff-11ef-b430-3c7c3f2bc7d9', 'ROY', 'R.', 'ARAYA', '', 'Forest Ranger', '', NULL, '2024-04-17 05:36:23', '2024-04-24 10:32:00'),
(428, 442, '5d2f440a-d6ff-11ef-b430-3c7c3f2bc7d9', 'Marichris', 'L.', 'Monreal', '', 'Records Officer I', '', NULL, '2024-04-17 05:56:17', '2024-04-17 05:56:17'),
(429, 443, '5d2f446f-d6ff-11ef-b430-3c7c3f2bc7d9', 'Loida', 'B.', 'De Los Santos', '', 'unset', '', NULL, '2024-04-17 06:08:56', '2024-04-17 06:08:56'),
(430, 444, '5d2f44ca-d6ff-11ef-b430-3c7c3f2bc7d9', 'SETH', 'B.', 'ALCANTARA', '', 'unset', '', NULL, '2024-04-17 06:54:14', '2024-04-24 10:32:17'),
(431, 445, '5d2f4523-d6ff-11ef-b430-3c7c3f2bc7d9', 'Jocelyn', '', 'Nale', '', 'PO I/Records Officer', '', NULL, '2024-04-18 05:11:30', '2024-04-18 05:11:30'),
(432, 446, '5d2f457c-d6ff-11ef-b430-3c7c3f2bc7d9', 'Kathleen', 'C.', 'Abawag', '', 'SvEMS/RPS Chief', '', NULL, '2024-04-18 05:11:30', '2024-04-18 05:11:30'),
(433, 447, '5d2f45e2-d6ff-11ef-b430-3c7c3f2bc7d9', 'Nelchelle Anne', ' ', 'De Guzman', '', 'Engineer II', '', NULL, '2024-04-18 05:11:30', '2024-04-24 10:36:23'),
(434, 448, '5d2f461e-d6ff-11ef-b430-3c7c3f2bc7d9', 'Eunice', 'Joy P.', 'Tayaban', '', 'Forest Extension Officer', '', NULL, '2024-04-18 05:11:30', '2024-04-24 10:36:32'),
(435, 449, '5d2f4655-d6ff-11ef-b430-3c7c3f2bc7d9', 'Gemma', 'R.', 'Mendoza', '', 'Cashier', '', NULL, '2024-04-18 05:11:30', '2024-04-18 05:11:30'),
(436, 450, '5d2f468b-d6ff-11ef-b430-3c7c3f2bc7d9', 'Jason', ' ', 'Sta Cruz', '', 'ISA II', '', NULL, '2024-04-18 05:14:50', '2024-04-18 05:52:35'),
(437, 451, '5d2f46c3-d6ff-11ef-b430-3c7c3f2bc7d9', 'Rose', 'P.', 'Moncada', '', 'ISA II/OIC, Planning Section', '', NULL, '2024-04-18 05:22:06', '2024-04-18 05:52:40'),
(438, 452, '5d2f46fa-d6ff-11ef-b430-3c7c3f2bc7d9', 'RAZEL', 'P.', 'FLORIDA', '', 'Records Officer I', '', NULL, '2024-04-18 06:04:04', '2024-04-18 06:04:04'),
(439, 453, '5d2f4732-d6ff-11ef-b430-3c7c3f2bc7d9', 'NELSON', 'D.', 'SOLIMAN', '', 'LMO III/RPS Chief', '', NULL, '2024-04-18 06:04:05', '2024-09-04 07:04:53'),
(440, 454, '5d2f476a-d6ff-11ef-b430-3c7c3f2bc7d9', 'MARITES', 'J.', 'GUEVARA', '', 'FII/Head, FUU', '', NULL, '2024-04-18 06:04:05', '2024-09-05 01:02:28'),
(441, 455, '5d2f47a3-d6ff-11ef-b430-3c7c3f2bc7d9', 'Lalaine', 'B.', 'Gotis', '', 'FTII/Planning Focal', '', NULL, '2024-04-18 06:04:05', '2024-09-04 07:10:39'),
(442, 456, '5d2f47d9-d6ff-11ef-b430-3c7c3f2bc7d9', 'Bryan', 'L.', 'Magayanes', '', 'FTI', '', NULL, '2024-04-18 06:04:05', '2024-09-04 07:10:39'),
(443, 457, '5d2f4810-d6ff-11ef-b430-3c7c3f2bc7d9', 'JEMYMA GRACE', 'S.', 'AGNAS', '', 'ADMIN AIDE IV', '', NULL, '2024-04-18 06:04:05', '2024-04-18 06:04:05'),
(444, 459, '5d2f4849-d6ff-11ef-b430-3c7c3f2bc7d9', 'Menard', 'M.', 'Azurin', '', 'RLMO I / ICT Focal Person', '', NULL, '2024-04-18 06:11:45', '2024-04-18 06:11:45'),
(445, 460, '5d2f4881-d6ff-11ef-b430-3c7c3f2bc7d9', 'Mary Angeline', '', 'Relloso', '', 'RIT Operator', '', NULL, '2024-04-18 06:11:45', '2024-04-18 06:11:45'),
(446, 461, '5d2f48fd-d6ff-11ef-b430-3c7c3f2bc7d9', 'Maryann', 'A.', 'Roncesballes', '', 'LMI/ICT Focal Person', '', NULL, '2024-04-18 06:17:53', '2024-04-18 06:17:53'),
(447, 462, '5d2f4937-d6ff-11ef-b430-3c7c3f2bc7d9', 'Cherry May', 'N.', 'San Joaquin', '', 'IT Operator', '', NULL, '2024-04-18 06:17:53', '2024-04-18 06:17:53'),
(448, 463, '5d2f496d-d6ff-11ef-b430-3c7c3f2bc7d9', 'Jessiecca', 'S.', 'Laurio', '', 'AAVI/ICT Focal', '', NULL, '2024-04-18 06:23:36', '2024-09-20 07:25:11'),
(449, 464, '5d2f49a4-d6ff-11ef-b430-3c7c3f2bc7d9', 'Jean', 'V.', 'Imperial', '', 'CENR Officer', '', NULL, '2024-04-18 06:23:37', '2024-09-20 07:25:11'),
(450, 465, '5d2f49dc-d6ff-11ef-b430-3c7c3f2bc7d9', 'Julius Jon Lourenz', 'R.', 'Lectura', '', 'Forester I', '', NULL, '2024-04-18 06:29:55', '2024-04-18 06:29:55'),
(451, 466, '5d2f4a14-d6ff-11ef-b430-3c7c3f2bc7d9', 'Argie', 'M.', 'Medalla', '', 'IT Operator/ ICT Support Staff', '', NULL, '2024-04-18 06:29:55', '2024-04-18 06:29:55'),
(452, 467, '5d2f4a4c-d6ff-11ef-b430-3c7c3f2bc7d9', 'Eduardo', 'C.', 'Ampongan', '', 'unset', '', NULL, '2024-04-29 07:43:24', '2024-04-29 07:52:24'),
(453, 468, '5d2f4a85-d6ff-11ef-b430-3c7c3f2bc7d9', 'Sample240513162921Vgj0i2', 'S.', 'Surname', '', 'unset', '', NULL, '2024-05-13 08:30:38', '2024-05-14 06:52:49'),
(454, 469, '5d2f4abc-d6ff-11ef-b430-3c7c3f2bc7d9', 'Sample2405140902596IHw02', 'S.', 'Surname', '', 'unset', '', NULL, '2024-05-14 01:03:18', '2024-05-14 01:03:18'),
(455, 470, '5d2f4af5-d6ff-11ef-b430-3c7c3f2bc7d9', 'CENRO', 'S.', 'Surname', '', 'unset', '', NULL, '2024-08-28 06:08:03', '2024-08-28 06:08:03'),
(456, 471, '5d2f4b2d-d6ff-11ef-b430-3c7c3f2bc7d9', 'ELIZABETH', 'L.', 'BERCILLA', '', 'unset', '', NULL, '2024-09-04 06:47:20', '2024-09-04 07:10:39'),
(457, 472, '5d2f4b65-d6ff-11ef-b430-3c7c3f2bc7d9', 'CHRIS', 'A.', 'SALCEDO', '', 'unset', '', NULL, '2024-09-04 06:47:20', '2024-09-04 07:10:39'),
(458, 473, '5d2f4ba7-d6ff-11ef-b430-3c7c3f2bc7d9', 'HENRY', 'P.', 'HERNADEZ', '', 'unset', '', NULL, '2024-09-04 06:47:20', '2024-09-04 07:10:39'),
(459, 474, '5d2f4be0-d6ff-11ef-b430-3c7c3f2bc7d9', 'MARIA VERDA', 'V.', 'ABAWAG', '', 'unset', '', NULL, '2024-09-04 06:47:20', '2024-09-04 07:10:39'),
(460, 475, '5d2f4cad-d6ff-11ef-b430-3c7c3f2bc7d9', 'Melinda', 'O.', 'Rivero', '', 'unset', '', NULL, '2024-10-09 08:15:35', '2024-10-09 08:15:35'),
(461, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'Olive', 'Myki', 'Barcelon', NULL, 'Computer Programmer', 'assets/img/user_pic/test_202502061006.jpg', NULL, '2025-01-16 08:06:10', '2025-02-06 02:06:05');

-- --------------------------------------------------------

--
-- Table structure for table `redts_ee_classification`
--

CREATE TABLE `redts_ee_classification` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `description` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redts_ee_classification`
--

INSERT INTO `redts_ee_classification` (`id`, `uuid`, `description`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(7, '73e92167-d88f-11ef-bf83-3c7c3f2bc7d9', 'Administrative Order', 'adm_ord', NULL, NULL, NULL),
(8, '73e92c80-d88f-11ef-bf83-3c7c3f2bc7d9', 'Affidavit', 'affidvt', NULL, NULL, NULL),
(9, '73e92cfa-d88f-11ef-bf83-3c7c3f2bc7d9', 'Annual Procurement Plan', 'ann_proc', NULL, NULL, NULL),
(10, '73e92d81-d88f-11ef-bf83-3c7c3f2bc7d9', 'Application', 'app', NULL, NULL, NULL),
(11, '73e92dcb-d88f-11ef-bf83-3c7c3f2bc7d9', 'Application for Chainsaw Registration', 'app_chainsaw', NULL, NULL, NULL),
(12, '73e92e3b-d88f-11ef-bf83-3c7c3f2bc7d9', 'CAD Orders', 'cad_ord', NULL, NULL, NULL),
(13, '73e92e78-d88f-11ef-bf83-3c7c3f2bc7d9', 'Central Office SO', 'co_so', NULL, NULL, NULL),
(14, '73e92eb5-d88f-11ef-bf83-3c7c3f2bc7d9', 'Contract', 'ctrct', NULL, NULL, NULL),
(15, '73e92eec-d88f-11ef-bf83-3c7c3f2bc7d9', 'Decision', 'dec', NULL, NULL, NULL),
(16, '73e92f4c-d88f-11ef-bf83-3c7c3f2bc7d9', 'Fax Message', 'fax_msg', NULL, NULL, NULL),
(17, '73e92f86-d88f-11ef-bf83-3c7c3f2bc7d9', 'Indorsement', 'indrsmt', NULL, NULL, NULL),
(18, '73e92fbd-d88f-11ef-bf83-3c7c3f2bc7d9', 'Issuance of Certificate of Tree Plantation Ownership', 'cert_tpo', NULL, NULL, NULL),
(19, '73e92ffc-d88f-11ef-bf83-3c7c3f2bc7d9', 'Issuance of Certificate of Verification (COV)', 'cert_cov', NULL, NULL, NULL),
(20, '73e93057-d88f-11ef-bf83-3c7c3f2bc7d9', 'Issuance of Certification of Land Status and/or Certification of Survey Claimant', 'cert_ls', NULL, NULL, NULL),
(21, '73e930ac-d88f-11ef-bf83-3c7c3f2bc7d9', 'Issuance of Certification of No Records/Appeal/Motion for Reconsideration, etc', 'cert_nr', NULL, NULL, NULL),
(22, '73e930e9-d88f-11ef-bf83-3c7c3f2bc7d9', 'Issuance of Private Land Timber Permit (PLTP)', 'pltp', NULL, NULL, NULL),
(23, '73e93122-d88f-11ef-bf83-3c7c3f2bc7d9', 'Issuance of Special Private Land Timber Permit (SPLTP)', 'spltp', NULL, NULL, NULL),
(24, '73e9315d-d88f-11ef-bf83-3c7c3f2bc7d9', 'Issuance of Survey Authority', 'suv_auth', NULL, NULL, NULL),
(25, '73e9320f-d88f-11ef-bf83-3c7c3f2bc7d9', 'Issuance of Tree Cutting Permit for DPWH', 'tcp_dpwh', NULL, NULL, NULL),
(26, '73e9325f-d88f-11ef-bf83-3c7c3f2bc7d9', 'Issuance of Tree Cutting Permit for Planted Trees (TREE1)', 'tcp_tree1', NULL, NULL, NULL),
(27, '73e9329e-d88f-11ef-bf83-3c7c3f2bc7d9', 'Leave', 'lv', NULL, NULL, NULL),
(28, '73e932d9-d88f-11ef-bf83-3c7c3f2bc7d9', 'Letter or Correspondence', 'ltr_corr', NULL, NULL, NULL),
(29, '73e93313-d88f-11ef-bf83-3c7c3f2bc7d9', 'Liquidation', 'liq', NULL, NULL, NULL),
(30, '73e9334e-d88f-11ef-bf83-3c7c3f2bc7d9', 'LRC Orders', 'lrc_ord', NULL, NULL, NULL),
(31, '73e93387-d88f-11ef-bf83-3c7c3f2bc7d9', 'Memorandum', 'memo', NULL, NULL, NULL),
(32, '73e933bf-d88f-11ef-bf83-3c7c3f2bc7d9', 'Miscellaneous', 'misc', NULL, NULL, NULL),
(33, '73e933f7-d88f-11ef-bf83-3c7c3f2bc7d9', 'Motion for Reconsideration', 'mfr', NULL, NULL, NULL),
(34, '73e93431-d88f-11ef-bf83-3c7c3f2bc7d9', 'Notice', 'ntc', NULL, NULL, NULL),
(35, '73e93468-d88f-11ef-bf83-3c7c3f2bc7d9', 'Notice of Appeal', 'ntc_apl', NULL, NULL, NULL),
(36, '73e934bf-d88f-11ef-bf83-3c7c3f2bc7d9', 'Notice of Hearing', 'ntc_hrg', NULL, NULL, NULL),
(37, '73e93514-d88f-11ef-bf83-3c7c3f2bc7d9', 'Order', 'ord', NULL, NULL, NULL),
(38, '73e9354d-d88f-11ef-bf83-3c7c3f2bc7d9', 'Pleadings', 'plead', NULL, NULL, NULL),
(39, '73e93587-d88f-11ef-bf83-3c7c3f2bc7d9', 'Project Procurement Management Plan', 'ppmp', NULL, NULL, NULL),
(40, '73e935e4-d88f-11ef-bf83-3c7c3f2bc7d9', 'Purchase Order Request', 'por', NULL, NULL, NULL),
(41, '73e9361e-d88f-11ef-bf83-3c7c3f2bc7d9', 'Purchase Request', 'pr', NULL, NULL, NULL),
(42, '73e93658-d88f-11ef-bf83-3c7c3f2bc7d9', 'Radio Message', 'rd_msg', NULL, NULL, NULL),
(43, '73e93695-d88f-11ef-bf83-3c7c3f2bc7d9', 'Regional Special Order', 'rso', NULL, NULL, NULL),
(44, '73e936cf-d88f-11ef-bf83-3c7c3f2bc7d9', 'Reimbursement', 'reimb', NULL, NULL, NULL),
(45, '73e93709-d88f-11ef-bf83-3c7c3f2bc7d9', 'Request for Quotation', 'rfq', NULL, NULL, NULL),
(46, '73e93754-d88f-11ef-bf83-3c7c3f2bc7d9', 'Special Order', 'sp_ord', NULL, NULL, NULL),
(47, '73e93795-d88f-11ef-bf83-3c7c3f2bc7d9', 'Travel Order', 'trvl_ord', NULL, NULL, NULL),
(48, '73e937d2-d88f-11ef-bf83-3c7c3f2bc7d9', 'Travel Reimbursement', 'trvl_reimb', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `redts_e_region`
--

CREATE TABLE `redts_e_region` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `region` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redts_e_region`
--

INSERT INTO `redts_e_region` (`id`, `region`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'National Capital Region', 'NCR', NULL, NULL, NULL),
(2, 'Region I', 'R1', NULL, NULL, NULL),
(3, 'Region II', 'R2', NULL, NULL, NULL),
(4, 'Region III', 'R3', NULL, NULL, NULL),
(5, 'Calabarzon', 'R4A', NULL, NULL, NULL),
(6, 'Mimaropa', 'R4B', NULL, NULL, NULL),
(7, 'Region V', 'R5', NULL, NULL, NULL),
(8, 'Region VI', 'R6', NULL, NULL, NULL),
(9, 'Region VII', 'R7', NULL, NULL, NULL),
(10, 'Region VIII', 'R8', NULL, NULL, NULL),
(11, 'Region IX', 'R9', NULL, NULL, NULL),
(12, 'Region X', 'R10', NULL, NULL, NULL),
(13, 'Region XI', 'R11', NULL, NULL, NULL),
(14, 'Region XII', 'R12', NULL, NULL, NULL),
(15, 'Caraga Administrative Region', 'CAR', NULL, NULL, NULL),
(16, 'Cordillera Administrative Region', 'CAR', NULL, NULL, NULL),
(17, 'Central Office', 'CO', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `redts_f_offices`
--

CREATE TABLE `redts_f_offices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL COMMENT 'redts_f_offices_region_id_foreign',
  `slug` varchar(255) NOT NULL,
  `office` varchar(255) NOT NULL,
  `full_office_name` varchar(255) NOT NULL,
  `office_type` varchar(255) NOT NULL,
  `mother_unit` varchar(255) DEFAULT NULL,
  `header_office_title` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL DEFAULT 'unset',
  `tel_no` varchar(255) NOT NULL DEFAULT 'unset',
  `cp_no` varchar(255) NOT NULL DEFAULT 'unset',
  `office_address` text DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redts_f_offices`
--

INSERT INTO `redts_f_offices` (`id`, `uuid`, `region_id`, `slug`, `office`, `full_office_name`, `office_type`, `mother_unit`, `header_office_title`, `email`, `tel_no`, `cp_no`, `office_address`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '0e4f0a5b-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-ORED', 'ORED', 'Office of the Regional Executive Director', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, '2023-12-27 08:32:12'),
(2, '0e4f14d6-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-SCIS', 'SCIS', 'Strategic Communication Initiative Service', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(3, '0e4f15c5-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDMS', 'OARDMS', 'Office of the Assistant Regional Director for Management Services', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(4, '0e4f165f-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDMS-PMD', 'PMD', 'Planning and Management Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDMS-PMD-ICTS', 'PMD.ICT', 'Information and Communications Technology Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, '2023-12-22 08:53:41'),
(6, '0e4f1788-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDMS-PMD-MES', 'PMD.ME', 'Monitoring and Evaluation Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, '2023-12-22 08:53:46'),
(7, '0e4f1807-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDMS-PMD-PPS', 'PMD.PP', 'Planning and Programming Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, '2023-12-22 08:53:53'),
(8, '0e4f194b-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDMS-LEGAL', 'LEGAL', 'Legal Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(9, '0e4f19d7-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDMS-LEGAL-IS', 'LEGAL.I', 'Investigation Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, '2023-12-22 08:57:21'),
(10, '0e4f1a59-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDMS-LEGAL-ERLS', 'LEGAL.ERLS', 'Environment, Research Legislation Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, '2023-12-22 08:57:12'),
(11, '0e4f1ad5-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDMS-LEGAL-LAS', 'LEGAL.LASS', 'Litigation and Adjudication Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, '2023-12-22 08:57:02'),
(12, '0e4f1b52-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDMS-FINANCE', 'FIN', 'Finance Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(13, '0e4f1bcd-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDMS-FINANCE-BFS', 'FIN.Budget', 'Budget and Fiscal Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(14, '0e4f1c46-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDMS-FINANCE-AS', 'FIN.Accounting', 'Accounting Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(15, '0e4f1cbd-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDMS-ADMIN', 'AD', 'Administrative Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(16, '0e4f1d37-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDMS-ADMIN-PS', 'AD.Personnel', 'Personnel Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(17, '0e4f1dab-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDMS-ADMIN-HRDS', 'AD.HRDS', 'Human Resource Development Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(18, '0e4f1e23-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDMS-ADMIN-GSS', 'AD.GSS', 'General Services Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(19, '0e4f1e98-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDMS-ADMIN-GSS-RU', 'AD.Records', 'Records Unit', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(20, '0e4f1f0e-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDMS-ADMIN-PROC', 'AD.Procurement', 'Procurement Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(21, '0e4f1f83-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDMS-ADMIN-CASHIER', 'AD.Cashier', 'Cashier Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(22, '0e4f200e-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDTS', 'OARDTS', 'Office of the Assistant Regional Director in Technical Services', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(23, '0e4f2086-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDTS-LPDD', 'LPDD', 'Regional Office V (LPDD Receiving Office)', 'Receiving', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, '2024-02-08 01:53:55'),
(24, '0e4f211a-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDTS-LPDD-WRUS', 'LPDD.Water', 'Water Resource Utilization Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, '2023-11-02 23:07:34'),
(25, '0e4f2191-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDTS-LPDD-PDS', 'LPDD.PDS', 'Patents and Deeds Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(26, '0e4f2205-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDTS-LPDD-FUS', 'LPDD.FUS', 'Forest Utilizatoin Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(27, '0e4f227c-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDTS-LPDD-WRPS', 'LPDD.WRPS', 'Wildlife Resource Permitting Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, '2023-11-02 23:07:19'),
(28, '0e4f22f1-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDTS-SMD', 'SMD', 'Surveys and Mapping Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(29, '0e4f2367-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDTS-SMD-SCS', 'SMD.SCS', 'Surveys and Control Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(30, '0e4f23d9-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDTS-SMD-LESS', 'SMD.LESS', 'Land Evaluation Survey Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(31, '0e4f244c-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDTS-SMD-ASCS', 'SMD.Aggregate', 'Aggregates Surveys and Correction Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(32, '0e4f24c3-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDTS-SMD-OOSS', 'SMD.OOSS', 'Original and Other Surveys Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(33, '0e4f253b-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDTS-SMD-LRS', 'SMD.LRS', 'Land Records Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(34, '0e4f25af-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDTS-CDD', 'CDD', 'Conservation and Development Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(35, '0e4f2622-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDTS-CDD-PFMS', 'CDD.PFMS', 'Production Forest Management Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(36, '0e4f2678-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDTS-CDD-CRFMS', 'CDD.Coastal', 'Coastal Resource and Foreshore Mgt Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(37, '0e4f26cd-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDTS-CDD-PAMBCS', 'CDD.PA', 'PA Mgt and Biodiversity Conservation Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(38, '0e4f2723-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDTS-ED', 'ED', 'Enforcement Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(39, '0e4f277a-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDTS-ED-CMIS', 'ED.Compliance', 'Compliance Monitoring and Investigation Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(40, '0e4f27cd-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDTS-ED-SIS', 'ED.Surveillance', 'Surveillance and Intelligence Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(41, '0e4f2821-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-ALBAY', 'P.Albay', 'PENRO Albay', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Legazpi Port District, Legazpi City, Albay', NULL, NULL, NULL),
(42, '0e4f287e-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CSUR', 'P.CSur', 'PENRO Camarines Sur', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Panganiban Drive, Naga City, Camarines Sur', NULL, NULL, NULL),
(43, '0e4f28d6-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CNORTE', 'P.CNorte', 'PENRO Camarines Norte', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Daet, Camarines Norte', NULL, NULL, NULL),
(44, '0e4f292b-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-MASBATE', 'P.Masbate', 'PENRO Masbate', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Zurbito Street, Masbate City', NULL, NULL, NULL),
(45, '0e4f297d-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CATNES', 'P.Catnes', 'PENRO Catanduanes', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'San Isidro Village, Virac, Catanduanes', NULL, NULL, NULL),
(46, '0e4f29d1-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-SORSOGON', 'P.Sor', 'PENRO Sorsogon', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'B. Road, Sorsogon City, Sorsogon', NULL, NULL, NULL),
(47, '0e4f2a23-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-GUINOBATAN', 'C.GBTN', 'CENRO Guinobatan', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Morera, Guinobatan, Albay', NULL, NULL, NULL),
(48, '0e4f2aa9-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-IRIGA', 'C.Iriga', 'CENRO Iriga', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Iriga City, Camarines Sur', NULL, NULL, NULL),
(49, '0e4f2b09-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-SIPOCOT', 'C.Sipocot', 'CENRO Sipocot', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Sipocot, Camarines Sur', NULL, NULL, NULL),
(50, '0e4f2b5d-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-GOA', 'C.Goa', 'CENRO Goa', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Catagbacan, Goa, Camarines Sur', NULL, NULL, NULL),
(51, '0e4f2bb0-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-MOBO', 'C.Mobo', 'CENRO Mobo', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Medina St, Mobo, Masbate', NULL, NULL, NULL),
(52, '0e4f2c05-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-SANJACINTO', 'C.SJ', 'CENRO San Jacinto', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'San Jacinto, Masbate', NULL, NULL, NULL),
(53, '0e4f2c58-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-BAC', 'RBAC', 'RBAC', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(54, '0e4f2d6d-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-TWG-INFRA-PROJ', 'TWG.INFRA', 'TWG Infrastructure Projects', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(55, '0e4f2dc4-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-TWG-GOODS-SERV', 'TWG.Goods', 'TWG Goods and Services', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(56, '0e4f2e16-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-TWG-IT-EQ', 'TWG.IT', 'TWG IT Equipments', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(57, '0e4f2e69-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-TWG-CONSERV', 'TWG.Consulting', 'TWG Consulting Services', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(58, '0e4f2ebb-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-TWG-NGP', 'TWG.NGP', 'TWG National Greening Program', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(59, '0e4f2f0e-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-INS-INFRA-PROJ', 'INS.INFRA', 'Inspection Infrastructure Projects', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(60, '0e4f3013-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-INS-GOODS-SERV', 'INS.Goods', 'Inspection Goods and Services', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(61, '0e4f3067-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-INS-IT-EQ', 'INS.IT', 'Inspection IT Equipments', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(62, '0e4f30bb-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-INS-CONSERV', 'INS.Consulting', 'Inspection Consulting Services', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(63, '0e4f310f-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-INS-NGP-T1', 'INS.NGPT1', 'Inspection National Greening Program Team 1', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(64, '0e4f3211-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-INS-NGP-T2', 'INS.NGPT2', 'Inspection National Greening Program Team 2', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(65, '0e4f3265-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-INS-NGP-T3', 'INS.NGPT3', 'Inspection National Greening Program Team 3', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(66, '0e4f32b6-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-INS-VEHICLE', 'INS.Vehicle', 'Inspection Vehicle', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(67, '0e4f33b8-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CANVASSER1-AD', 'Canvass.AD1', 'Admin Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(68, '0e4f4ff3-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CANVASSER2-AD', 'Canvass.AD2', 'Admin Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(69, '0e4f50ea-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CANVASSER-PMD', 'Canvass.PMD', 'Planning and Management Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(70, '0e4f52a1-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CANVASSER-LEGAL', 'Canvass.Legal', 'Legal Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(71, '0e4f532f-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CANVASSER-SCIS', 'Canvass.SCIS', 'Strategic Communication Initiative Service', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(72, '0e4f55ac-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CANVASSER-FD', 'Canvass.FD', 'Finance Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(73, '0e4f588d-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CANVASSER-CDD', 'Canvass.CDD', 'Conservation and Development Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(74, '0e4f5c07-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CANVASSER-LPDD', 'Canvass.LPDD', 'Licenses, Patents and Deeds Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(75, '0e4f5f62-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CANVASSER-ED', 'Canvass.ED', 'Enforcement Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(76, '0e4f640d-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CANVASSER-SMD', 'Canvass.SMD', 'Surveys and Mapping Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(77, '0e4f698b-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Albay-MSD', 'P.Albay.MSD', 'PENRO Albay - Management Services Division', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Legazpi Port District, Legazpi City, Albay', NULL, NULL, '2023-12-22 08:28:02'),
(78, '0e4f6c45-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Albay-MSD-Admin', 'P.Albay.Admin', 'PENRO Albay - Administrative Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Legazpi Port District, Legazpi City, Albay', NULL, NULL, '2023-12-22 08:28:17'),
(79, '0e4f6dc9-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Albay-MSD-Finance', 'P.Albay.Finance', 'PENRO Albay - Finance Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Legazpi Port District, Legazpi City, Albay', NULL, NULL, '2023-12-22 08:28:06'),
(80, '0e4f6fcd-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Albay-Planning', 'P.Albay.PMS', 'PENRO Albay - Planning and Management Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Legazpi Port District, Legazpi City, Albay', NULL, NULL, '2023-12-22 08:27:58'),
(81, '0e4f7048-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Albay-Records', 'P.Albay.Records', 'Records Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Legazpi Port District, Legazpi City, Albay', '2023-12-21 00:26:29', NULL, NULL),
(82, '0e4f70aa-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Albay-TSD', 'P.Albay.TSD', 'PENRO Albay - Technical Services Division', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Legazpi Port District, Legazpi City, Albay', NULL, NULL, '2023-12-22 08:27:50'),
(83, '0e4f7106-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Albay-TSD-Conservation', 'P.Albay.CDS', 'PENRO Albay - Conservation and Development Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Legazpi Port District, Legazpi City, Albay', NULL, NULL, '2023-12-22 08:28:13'),
(84, '0e4f716b-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Albay-TSD-RPS', 'P.Albay.RPS', 'PENRO Albay - Regulation and Permitting Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Legazpi Port District, Legazpi City, Albay', NULL, NULL, '2024-04-17 02:15:21'),
(85, '0e4f71c5-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Albay-TSD-Enforcement', 'P.Albay.Enforcement', 'PENRO Albay - Enforcement Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Legazpi Port District, Legazpi City, Albay', NULL, NULL, '2023-12-22 08:28:09'),
(86, '0e4f7229-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CNorte-MSD', 'P.Cn.MSD', 'PENRO Cam Norte - Management Services Division', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Daet, Camarines Norte', NULL, NULL, '2023-12-22 08:24:38'),
(87, '0e4f728d-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CNorte-MSD-Admin', 'P.CN.Admin', 'PENRO Cam Norte - Administrative Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Daet, Camarines Norte', NULL, NULL, '2023-12-22 08:24:01'),
(88, '0e4f730d-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CNorte-MSD-Finance', 'P.CN.Finance', 'PENRO Cam Norte - Finance Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Daet, Camarines Norte', NULL, NULL, '2023-12-22 08:24:42'),
(89, '0e4f737c-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CNorte-MSD-Planning', 'P.CN.PMS', 'PENRO Cam Norte - Planning and Management Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Daet, Camarines Norte', NULL, NULL, '2023-12-22 08:24:33'),
(90, '0e4f73f7-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CNorte-MSD-Records', 'P.CN.Records', 'PENRO Cam Norte - Records Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Daet, Camarines Norte', '2023-12-22 08:12:09', NULL, '2023-12-22 08:29:09'),
(91, '0e4f7453-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CNorte-TSD', 'P.CN.TSD', 'PENRO Cam Norte - Technical Services Division', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Daet, Camarines Norte', NULL, NULL, '2023-12-22 08:24:19'),
(92, '0e4f74b3-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CNorte-TSD-Conservation', 'P.CN.CDS', 'PENRO Cam Norte - Conservation and Development Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Daet, Camarines Norte', NULL, NULL, '2023-12-22 08:25:14'),
(93, '0e4f7518-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CNorte-TSD-RPS', 'P.CN.RPS', 'PENRO Cam Norte - Regulation and Permitting Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Daet, Camarines Norte', NULL, NULL, '2024-04-17 02:15:21'),
(94, '0e4f757f-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CNorte-TSD-Enforcement', 'P.CN.Enforcement', 'PENRO Cam Norte - Enforcement Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Daet, Camarines Norte', NULL, NULL, '2023-12-22 08:24:47'),
(95, '0e4f75d9-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CSur', 'P.CSur', 'PENRO Camarines Sur', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Panganiban Drive, Naga City, Camarines Sur', '2023-12-22 08:12:33', NULL, '2023-12-22 08:31:33'),
(96, '0e4f7660-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CSur-MSD', 'P.CSur.MSD', 'PENRO Cam Sur - Management and Services Division', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Panganiban Drive, Naga City, Camarines Sur', NULL, NULL, '2023-12-22 08:31:14'),
(97, '0e4f76bc-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CSur-MSD-Admin', 'P.Csur.Admin', 'PENRO Cam Sur - Administrative Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Panganiban Drive, Naga City, Camarines Sur', NULL, NULL, '2023-12-22 08:31:58'),
(98, '0e4f7716-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CSur-MSD-Finance', 'P.CSur.Finance', 'PENRO Cam Sur - Finance Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Panganiban Drive, Naga City, Camarines Sur', NULL, NULL, '2023-12-22 08:31:19'),
(99, '0e4f7771-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CSur-MSD-Planning', 'P.CSur.PMS', 'PENRO Cam Sur - Planning and Management Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Panganiban Drive, Naga City, Camarines Sur', NULL, NULL, '2023-12-22 08:30:24'),
(100, '0e4f77c9-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CSur-MSD-Records', 'P.CSur.Records', 'PENRO Cam Sur - Records Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Panganiban Drive, Naga City, Camarines Sur', '2023-12-22 08:12:17', NULL, '2023-12-22 08:32:17'),
(101, '0e4f7824-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CSur-TSD', 'P.CSur.TSD', 'PENRO Cam Sur - Tecnical services Division', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Panganiban Drive, Naga City, Camarines Sur', NULL, NULL, '2023-12-22 08:30:15'),
(102, '0e4f78b0-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CSur-TSD-Conservation', 'P.CSur.CDS', 'PENRO Cam Sur - Conservation and Development Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Panganiban Drive, Naga City, Camarines Sur', NULL, NULL, '2023-12-22 08:31:54'),
(103, '0e4f7927-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CSur-TSD-RPS', 'P.CSur.RPS', 'PENRO Cam Sur - Regulation and Permitting Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Panganiban Drive, Naga City, Camarines Sur', NULL, NULL, '2024-04-17 02:15:21'),
(104, '0e4f7980-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CSur-TSD-Enforment', 'P.CSur.Enforcement', 'PENRO Cam Sur - Enforcement Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Panganiban Drive, Naga City, Camarines Sur', NULL, NULL, '2023-12-22 08:31:23'),
(105, '0e4f79dc-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Catnes-MSD', 'P.Catnes.MSD', 'PENRO Catanduanes - Management Services Division', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'San Isidro Village, Virac, Catanduanes', NULL, NULL, '2023-12-22 08:34:03'),
(106, '0e4f7a3e-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Catnes-MSD-Admin', 'P.Catnes.Admin', 'PENRO Catanduanes - Administration Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'San Isidro Village, Virac, Catanduanes', NULL, NULL, '2023-12-22 08:34:21'),
(107, '0e4f7a9b-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Catnes-MSD-Finance', 'P.Catnes.Finance', 'PENRO Catanduanes - Finance Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'San Isidro Village, Virac, Catanduanes', NULL, NULL, '2023-12-22 08:34:07'),
(108, '0e4f7af5-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Catnes-MSD-Planning', 'P.Catnes.PMS', 'PENRO Catanduanes - Planning and Management Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'San Isidro Village, Virac, Catanduanes', NULL, NULL, '2023-12-22 08:33:07'),
(109, '0e4f7b51-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Catnes-MSD-Records', 'P.Catnes.Records', 'PENRO Catanduanes - Records Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'San Isidro Village, Virac, Catanduanes', '2023-12-22 08:12:04', NULL, '2023-12-22 08:35:04'),
(110, '0e4f7bab-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Catnes-TSD', 'P.Catnes_TSD', 'PENRO Catanduanes - Technical Services Division', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'San Isidro Village, Virac, Catanduanes', '2023-12-22 08:12:54', NULL, '2023-12-22 08:34:54'),
(111, '0e4f7c05-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Catnes-TSD-Conservation', 'P.Catnes.CDS', 'PENRO Catanduanes - Conservation and Development Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'San Isidro Village, Virac, Catanduanes', NULL, NULL, '2023-12-22 08:34:16'),
(112, '0e4f7c60-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Catnes-TSD-RPS', 'P.Catnes.RPS', 'PENRO Catanduanes - Regulation and Permitting Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'San Isidro Village, Virac, Catanduanes', NULL, NULL, '2023-12-22 08:33:50'),
(113, '0e4f7cba-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Catnes-TSD-Enforcement', 'P.Catnes.Enforment', 'PENRO Catanduanes - Enforcement Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'San Isidro Village, Virac, Catanduanes', NULL, NULL, '2023-12-22 08:34:11'),
(114, '0e4f7d14-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Masbate-MSD', 'P.Masbate.MSD', 'PENRO Masbate - Management Services Division', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Zurbito Street, Masbate City', NULL, NULL, '2023-12-22 08:36:09'),
(115, '0e4f7d74-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Masbate-MSD-Admin', 'P.Masbate.Admin', 'PENRO Masbate - Administration Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Zurbito Street, Masbate City', NULL, NULL, '2023-12-22 08:36:23'),
(116, '0e4f7e83-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Masbate-MSD-Finance', 'P.Masbate.Finance', 'PENRO Masbate - Finance Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Zurbito Street, Masbate City', NULL, NULL, '2023-12-22 08:36:13'),
(117, '0e4f7ee3-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Masbate-MSD-Planning', 'P.Masbate.PMS', 'PENRO Masbate - Planning and Management Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Zurbito Street, Masbate City', NULL, NULL, '2023-12-22 08:35:47'),
(118, '0e4f7f3d-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Masbate-MSD-Records', 'P.Masbate.Records', 'PENRO Masbate - Records Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Zurbito Street, Masbate City', '2023-12-27 08:12:41', NULL, '2023-12-27 08:34:41'),
(119, '0e4f7f9b-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Masbate-TSD', 'P.Masbate.TSD', 'PENRO Masbate - Technical Services Division', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Zurbito Street, Masbate City', NULL, NULL, '2023-12-22 08:35:39'),
(120, '0e4f7ff6-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Masbate-TSD-Conservation', 'P.Masbate.CDS', 'PENRO Masbate - Conservation and Development Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Zurbito Street, Masbate City', NULL, NULL, '2023-12-22 08:36:19'),
(121, '0e4f8053-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Masbate-TSD-RPS', 'P.Masbate.RPS', 'PENRO Masbate - Regulation and Permitting Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Zurbito Street, Masbate City', NULL, NULL, '2024-04-17 02:15:21'),
(122, '0e4f80af-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Masbate-TSD-Enforcement', 'P.Masbate.Enforcement', 'PENRO Masbate - Enforcement Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Zurbito Street, Masbate City', NULL, NULL, '2023-12-22 08:36:16'),
(123, '0e4f810c-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Sorsogon-MSD', 'P.Sor.MSD', 'PENRO Sorsogon - Management Services Division', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'B. Road, Sorsogon City, Sorsogon', NULL, NULL, '2023-12-22 08:38:21'),
(124, '0e4f8168-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Sorsogon-MSD-Admin', 'P.Sor.Admin', 'PENRO Sorsogon - Administrator Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'B. Road, Sorsogon City, Sorsogon', NULL, NULL, '2023-12-22 08:38:45'),
(125, '0e4f81c4-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Sorsogon-MSD-Finance', 'P.Sor.Finance', 'PENRO Sorsogon - Finance Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'B. Road, Sorsogon City, Sorsogon', NULL, NULL, '2023-12-22 08:38:25'),
(126, '0e4f8231-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Sorsogon-MSD-Planning', 'P.Sor.PMS', 'PENRO Sorsogon - Planning and Management Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'B. Road, Sorsogon City, Sorsogon', NULL, NULL, '2023-12-22 08:38:07'),
(127, '0e4f8291-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Sorsogon-MSD-Records', 'P.Sor.Records', 'PENRO Sorsogon - Records Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'B. Road, Sorsogon City, Sorsogon', '2023-12-22 08:12:57', NULL, '2023-12-22 08:38:57'),
(128, '0e4f82e8-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Sorsogon-TSD', 'P.Sor.TSD', 'PENRO Sorsogon - Technical Services Division', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'B. Road, Sorsogon City, Sorsogon', NULL, NULL, '2023-12-22 08:37:56'),
(129, '0e4f833e-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Sorsogon-TSD-Conservation', 'P.Sor.CDS', 'PENRO Sorsogon - Conservation and Development Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'B. Road, Sorsogon City, Sorsogon', NULL, NULL, '2023-12-22 08:38:33'),
(130, '0e4f83c9-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Sorsogon-TSD-RPS', 'P.Sor.RPS', 'PENRO Sorsogon - Regulation and Permitting Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'B. Road, Sorsogon City, Sorsogon', NULL, NULL, '2024-04-17 02:14:32'),
(131, '0e4f8425-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Sorsogon-TSD-Enforcement', 'P.Sor.Enforcement', 'PENRO Sorsogon - Enforcement Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'B. Road, Sorsogon City, Sorsogon', NULL, NULL, '2023-12-22 08:38:29'),
(132, '0e4f847f-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Guinobatan-CDS', 'C.Gbtn.CDS', 'CENRO Guinobatan - Conservation and Development Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Morera, Guinobatan, Albay', NULL, NULL, '2023-12-22 08:40:51'),
(133, '0e4f84db-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Guinobatan-RPS', 'C.Gbtn.RPS', 'CENRO Guinobatan - Regulation and Permitting Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Morera, Guinobatan, Albay', NULL, NULL, '2024-04-18 03:42:50'),
(134, '0e4f8535-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Guinobatan-Enforcement', 'C.Gbtn.Enforcement', 'CENRO Guinobatan - Enforcement Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Morera, Guinobatan, Albay', NULL, NULL, '2023-12-22 08:40:47'),
(135, '0e4f8599-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Guinobatan-Records', 'C.Gbtn.Records', 'CENRO Guinobatan - Records Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Morera, Guinobatan, Albay', '2023-12-22 08:12:11', NULL, '2023-12-22 08:41:11'),
(136, '0e4f85f9-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Iriga-CDS', 'C.Iriga.CDS', 'CENRO Iriga - Conservation and Development Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Iriga City, Camarines Sur', NULL, NULL, '2023-12-22 08:44:44'),
(137, '0e4f8656-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Iriga-RPS', 'C.Iriga.RPS', 'CENRO Iriga - Regulation and Permitting Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Iriga City, Camarines Sur', NULL, NULL, '2024-04-18 05:58:16'),
(138, '0e4f86b0-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Iriga-Enforcement', 'C.Iriga.Enforcement', 'CENRO Iriga - Enforcement Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Iriga City, Camarines Sur', NULL, NULL, '2023-12-22 08:44:39'),
(139, '0e4f870c-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Iriga-Records', 'C.Iriga.Records', 'CENRO Iriga - Records Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Iriga City, Camarines Sur', '2023-12-22 08:12:03', NULL, '2023-12-22 08:45:03'),
(140, '0e4f8768-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Goa-CDS', 'C.Goa.CDS', 'CENRO Goa - Conservation and Development Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Catagbacan, Goa, Camarines Sur', NULL, NULL, '2023-12-22 08:43:27'),
(141, '0e4f88cd-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Goa-RPS', 'C.Goa.RPS', 'CENRO Goa - Regulation and Permitting Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Catagbacan, Goa, Camarines Sur', NULL, NULL, '2024-04-18 05:58:16'),
(142, '0e4f892a-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Goa-Enforcement', 'C.Goa.Enforcement', 'CENRO Goa - Enforcement Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Catagbacan, Goa, Camarines Sur', NULL, NULL, '2023-12-22 08:43:24'),
(143, '0e4f8983-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Goa-Records', 'C.Goa.Records', 'CENRO Goa - Records Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Catagbacan, Goa, Camarines Sur', '2023-12-22 08:12:14', NULL, '2023-12-22 08:45:14'),
(144, '0e4f89e0-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Sipocot-CDS', 'C.Sipocot.CDS', 'CENRO Sipocot - Conservation and Development Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Sipocot, Camarines Sur', NULL, NULL, '2023-12-22 08:47:14'),
(145, '0e4f8a3b-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Sipocot-RPS', 'C.Sipocot.RPS', 'CENRO Sipocot - Regulation and Permitting Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Sipocot, Camarines Sur', NULL, NULL, '2024-04-17 02:16:00'),
(146, '0e4f8aa0-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Sipocot-Enforcement', 'C.Sipocot.Enforcement', 'CENRO Sipocot - Enforcement Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Sipocot, Camarines Sur', NULL, NULL, '2023-12-22 08:47:09'),
(147, '0e4f8afb-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Sipocot-Records', 'C.Sipocot..Records', 'CENRO Sipocot - Records Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Sipocot, Camarines Sur', '2023-12-27 08:12:46', NULL, '2023-12-27 08:33:46'),
(148, '0e4f8b57-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Mobo-CDS', 'C.Mobo.CDS', 'CENRO Mobo - Conservation and Development Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Medina St, Mobo, Masbate', NULL, NULL, '2023-12-22 08:49:11'),
(149, '0e4f8bb2-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Mobo-RPS', 'C.Mobo.RPS', 'CENRO Mobo - Regulation and Permitting Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Medina St, Mobo, Masbate', NULL, NULL, '2024-04-17 02:16:00'),
(150, '0e4f8c0f-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Mobo-Enforcement', 'C.Mobo.Enforcement', 'CENRO Mobo - Enforcement Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Medina St, Mobo, Masbate', NULL, NULL, '2023-12-22 08:49:07'),
(151, '0e4f96f6-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Mobo-Records', 'C.Mobo.Records', 'CENRO Mobo - Records Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Medina St, Mobo, Masbate', '2023-12-22 08:12:23', NULL, '2023-12-22 08:49:23'),
(152, '0e4f9795-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-SanJacinto-CDS', 'C.SJ.CDS', 'CENRO San Jacinto - Conservation and Development Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'San Jacinto, Masbate', NULL, NULL, '2023-12-22 08:50:12'),
(153, '0e4f97fd-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-SanJacinto-RPS', 'C.SJ.RPS', 'CENRO San Jacinto - Regulation and Permitting Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'San Jacinto, Masbate', NULL, NULL, '2024-04-17 02:16:00'),
(154, '0e4f9974-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-SanJacinto-Enforcement', 'C.SJ.Enforcement', 'CENRO San Jacinto - Enforcement Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'San Jacinto, Masbate', NULL, NULL, '2023-12-22 08:50:16'),
(155, '0e4f9a11-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-SanJacinto-Records', 'C.SJ.Records', 'CENRO San Jacinto - Records Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'San Jacinto, Masbate', '2023-12-22 08:12:58', NULL, '2023-12-22 08:50:58'),
(156, '0e4f9a73-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-DENREU', 'DENREU', 'DENREU', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(157, '0e4f9ad9-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CANVASSER-ORED', 'Canvass.ORED', 'ORED', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(158, '0e4f9b39-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CANVASSER-OARDMS', 'Canvass.OARDMS', 'OARDMS', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(159, '0e4f9bd9-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CANVASSER-OARDTS', 'Canvass.OARDTS', 'OARDTS', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(160, '0e4f9c38-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-BACSEC', 'BAC', 'Bids and Awards Committee', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(161, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-RecvCheck', 'RV.RS', 'Regional Office V - Records Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2023-09-17 22:10:45', '2024-02-08 01:53:26'),
(162, '0e4f9cfa-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Albay-Receiving', 'P.Albay.RS', 'PENRO Albay - Records Section', 'Receiving', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Legazpi Port District, Legazpi City, Albay', NULL, '2023-09-17 22:10:45', '2024-04-18 03:45:45'),
(163, '0e4f9d5e-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CNorte-Receiving', 'P.CNorte.RS', 'PENRO Cam Norte - Records Section', 'Receiving', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Daet, Camarines Norte', NULL, '2023-09-17 22:10:45', '2024-04-18 03:45:18'),
(164, '0e4f9dbd-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CSur-Receiving', 'P.CSur.RS', 'PENRO Cam Sur - Records Section', 'Receiving', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Panganiban Drive, Naga City, Camarines Sur', NULL, '2023-09-17 22:10:45', '2024-04-18 03:44:59'),
(165, '0e4f9e19-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Masbate-Receiving', 'P.Masbate.RS', 'PENRO Masbate - Records Section', 'Receiving', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Zurbito Street, Masbate City', NULL, '2023-09-17 22:10:45', '2024-04-18 03:44:18'),
(166, '0e4f9e73-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Catnes-Receiving', 'P.Catnes.RS', 'PENRO Catanduanes - Records Section', 'Receiving', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'San Isidro Village, Virac, Catanduanes', NULL, '2023-09-17 22:10:45', '2024-04-18 03:44:37'),
(167, '0e4f9fd1-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Sorsogon-Receiving', 'P.Sor.RS', 'PENRO Sorsogon - Records Section', 'Receiving', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'B. Road, Sorsogon City, Sorsogon', NULL, '2023-09-17 22:10:45', '2024-04-18 03:43:41'),
(168, '0e4fa032-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Guinobatan-Receiving', 'C.Gbtn.RS', 'CENRO Guinobatan - Records Section', 'Receiving', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Morera, Guinobatan, Albay', NULL, '2023-09-17 22:10:45', '2024-04-18 03:42:50'),
(169, '0e4fa08a-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Iriga-Receiving', 'C.Iriga.RS', 'CENRO Iriga - Records Section', 'Receiving', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Iriga City, Camarines Sur', NULL, '2023-09-17 22:10:45', '2024-04-18 05:55:31'),
(170, '0e4fa0e8-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Sipocot-Receiving', 'C.Sipocot.RS', 'CENRO Sipocot - Records Section', 'Receiving', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Sipocot, Camarines Sur', NULL, '2023-09-17 22:10:45', '2024-04-18 03:46:10'),
(171, '0e4fa144-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Goa-Receiving', 'C.Goa.RS', 'CENRO Goa - Records Section', 'Receiving', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Catagbacan, Goa, Camarines Sur', NULL, '2023-09-17 22:10:45', '2024-04-18 05:56:10'),
(172, '0e4fa1a6-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Mobo-Receiving', 'C.Mobo.RS', 'CENRO Mobo - Records Section', 'Receiving', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Medina St, Mobo, Masbate', NULL, '2023-09-17 22:10:45', '2024-04-18 03:47:02'),
(173, '0e4fa202-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-SanJacinto-Receiving', 'C.SJ.RS', 'CENRO San Jacinto - Records Section', 'Receiving', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'San Jacinto, Masbate', NULL, '2023-09-17 22:10:45', '2024-04-18 03:46:39'),
(176, '0e4fa25f-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Guinobatan-Cashier', 'C.Gbtn.Cashier', 'CENRO Guinobatan - Cashier Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Morera, Guinobatan, Albay', NULL, NULL, '2023-12-22 08:41:04'),
(181, '0e4fa2bc-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Catnes-TSD', 'P.Catnes.TSD', 'PENRO Catanduanes - Technical Service Division', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'San Isidro Village, Virac, Catanduanes', NULL, '2023-12-06 02:06:55', '2023-12-22 08:33:18'),
(182, '0e4fa3ee-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Catnes-ADFS-AccU', 'P.Catnes.ADFS.AccU', 'PENRO Catanduanes - Accounting Office', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'San Isidro Village, Virac, Catanduanes', NULL, '2023-12-06 02:06:55', '2023-12-22 08:55:58'),
(183, '0e4fa46f-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Catnes-ADFS-Cashier', 'P.Catnes.ADFS.Cashier', 'PENRO Catanduanes - Cashier Office', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'San Isidro Village, Virac, Catanduanes', NULL, '2023-12-06 02:06:55', '2023-12-22 08:56:03'),
(184, '0e4fa4cb-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Catnes-FUU', 'P.Catnes.FUU', 'PENRO Catanduanes - Forest Utilization Unit', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'San Isidro Village, Virac, Catanduanes', NULL, '2023-12-06 02:06:55', '2023-12-22 08:33:50'),
(185, '0e4fa528-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Goa-Cashier', 'R5.CENRO.Goa.Cashier', 'CENRO Goa - Cashier', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Catagbacan, Goa, Camarines Sur', NULL, '2024-04-17 02:12:35', '2024-04-17 02:12:35'),
(186, '0e4fa58c-d705-11ef-b430-3c7c3f2bc7d9', 7, 'P-Albay-Cashier', 'P.Albay.Cashier', 'PENRO Albay - Cashier', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Legazpi Port District, Legazpi City, Albay', NULL, '2024-04-17 02:47:44', '2024-04-17 02:47:44'),
(187, '0e4fa5eb-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Sorsogon-Cashier', 'P.Sor.Cashier', 'PENRO Sorsogon - Cashier', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'B. Road, Sorsogon City, Sorsogon', NULL, '2024-04-17 03:56:07', '2024-04-23 09:12:10'),
(188, '0e4fa648-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CNorte-Cashier', 'P.CN.Cashier', 'PENRO Cam Norte - Cashier', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Daet, Camarines Norte', NULL, '2024-04-17 05:06:03', '2024-04-23 09:09:17'),
(189, '0e4fa6a9-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Sipocot-Cashier', 'C.Sipocot.Cashier', 'CENRO Sipocot - Cashier', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Sipocot, Camarines Sur', NULL, '2024-04-17 05:53:13', '2024-04-23 09:11:23'),
(190, '0e4fa708-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Mobo-Cashier', 'C.Mobo.Cashier', 'CENRO Mobo - Cashier', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Medina St, Mobo, Masbate', NULL, '2024-04-17 06:02:52', '2024-04-23 09:11:54'),
(191, '0e4fa83d-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-SanJacinto-Cashier', 'C.SJ.Cashier', 'CENRO San Jacinto - Cashier', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'San Jacinto, Masbate', NULL, '2024-04-17 06:10:13', '2024-04-23 09:11:40'),
(192, '0e4fa89d-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CSur-Cashier', 'P.CSur.Cashier', 'PENRO Cam Sur - Cashier', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Panganiban Drive, Naga City, Camarines Sur', NULL, '2024-04-18 03:37:16', '2024-04-18 03:38:45'),
(193, '0e4fa8f8-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CSur-ICT', 'P.CSur.ICT', 'PENRO Cam Sur - ICT', 'Office', NULL, NULL, 'unset', 'unset', 'unset', NULL, NULL, '2024-04-18 05:18:13', '2024-04-18 05:18:13'),
(194, '0e4fa966-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Iriga-Cashier', 'C.Iriga.Cashier', 'CENRO Iriga - Cashier', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Iriga City, Camarines Sur', NULL, '2024-04-18 05:58:55', '2024-04-18 05:58:55');

-- --------------------------------------------------------

--
-- Table structure for table `redts_g_carousel_imgs`
--

CREATE TABLE `redts_g_carousel_imgs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_name` text NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redts_g_carousel_imgs`
--

INSERT INTO `redts_g_carousel_imgs` (`id`, `file_path`, `file_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'assets\\img\\carousel\\', 'icc_month.webp', '2023-10-04 09:12:33', NULL, NULL),
(2, 'assets\\img\\carousel\\', 'Banner_Septembe-as-Philippine-Bamboo-Month2023-web.jpg', '2024-05-06 06:05:43', NULL, '2024-05-06 06:40:43'),
(3, 'assets\\img\\carousel\\', 'Banner_September-as-Coastal-Clean-Up-Month_2023-web.jpg', '2024-05-06 06:05:38', NULL, '2024-05-06 06:40:38'),
(7, 'assets\\img\\carousel\\', 'DENR_STAT_TRIV.png', '2023-11-22 08:11:38', NULL, NULL),
(8, 'assets\\img\\carousel\\', 'Approved_34th_NSM_Streamer.png', '2023-11-22 08:11:38', NULL, NULL),
(9, 'assets\\img\\carousel\\', 'denr_banner.png', '2024-05-06 09:05:51', NULL, '2024-05-06 09:28:51'),
(10, 'assets\\img\\carousel\\', 'DENR_STAT_TRIV_WINNER23-10-2023.png', '2023-11-08 08:33:23', NULL, NULL),
(18, 'assets\\img\\carousel\\', 'Banner_Environmental-Awareness-Month_November2023-web2.jpg', '2024-09-17 16:09:11', '2023-11-08 00:33:52', '2024-09-17 16:10:11'),
(19, 'assets\\img\\carousel\\', 'Black and Brown Realistic Carbohydrates Body Nutrients Classroom Poster.png.png', '2024-05-06 09:05:47', '2024-01-29 09:11:24', '2024-05-06 09:28:47'),
(20, 'assets\\img\\carousel\\', 'Banner_Bagong-Pilipinas_01-28-2024-web.jpg', '2024-09-17 16:09:10', '2024-01-29 09:11:41', '2024-09-17 16:10:10'),
(21, 'assets\\img\\carousel\\', 'Banner_January-as-Zero-Waste-Month_2024_updated-web.jpg', '2024-09-17 16:09:10', '2024-01-29 09:11:55', '2024-09-17 16:10:10'),
(22, 'assets\\img\\carousel\\', 'Jan_Banner_Zero_Waste_Month.jpg.jpg', '2024-05-06 09:05:47', '2024-01-30 06:31:26', '2024-05-06 09:28:47'),
(23, 'assets\\img\\carousel\\', 'Banner_Feb-2-as-World-WetlandsDay_2024.jpg', '2024-09-17 16:09:09', '2024-03-15 09:10:20', '2024-09-17 16:10:09'),
(24, 'assets\\img\\carousel\\', 'Banner_World-Environment-DayEnvironment-Month_2023.-web.jpg.jpg', '2024-05-06 06:05:10', '2024-03-15 09:12:39', '2024-05-06 06:40:10'),
(25, 'assets\\img\\carousel\\', '1.png.png', '2024-04-19 08:34:46', '2024-04-19 08:33:02', '2024-04-19 08:33:02'),
(26, 'assets\\img\\carousel\\', '3rd gawad iba copy.png.png', '2024-04-19 08:39:03', '2024-04-19 08:37:57', '2024-04-19 08:37:57'),
(27, 'assets\\img\\carousel\\', '3rd gawad iba copy.png.png', '2024-04-19 10:39:46', '2024-04-19 08:39:16', '2024-04-19 08:39:16'),
(28, 'assets\\img\\carousel\\', '438255273_842030647950697_7942315943621265782_n.png.png', '2024-05-06 09:05:46', '2024-04-20 16:13:41', '2024-05-06 09:28:46'),
(29, 'assets\\img\\carousel\\', 'MOO-web-banner.jpg', '2024-09-17 16:09:34', '2024-05-06 03:44:13', '2024-09-17 16:10:34'),
(30, 'assets\\img\\carousel\\', 'Banner_April-as-Earth-Month2024.jpg', '2024-09-17 16:09:33', '2024-05-06 06:43:44', '2024-09-17 16:10:33'),
(31, 'assets\\img\\carousel\\', 'NLM-2024-LANDSCAPE-POSTER-web.jpg', '2024-09-17 16:09:32', '2024-05-06 06:44:17', '2024-09-17 16:10:32'),
(32, 'assets\\img\\carousel\\', 'Banner-March-01-2024-as-World-Seagrass-Day.jpg', '2024-09-17 16:09:32', '2024-05-06 06:44:40', '2024-09-17 16:10:32'),
(33, 'assets\\img\\carousel\\', 'RFSOATS BANNER VIDEO lower quality (1).png', NULL, '2024-05-08 08:16:58', '2024-05-08 08:16:58'),
(34, 'assets\\img\\carousel\\', 'RFSOATS BANNER VIDEO lower quality (2).png.png', '2024-05-21 01:05:27', '2024-05-08 08:17:14', '2024-05-21 01:49:27'),
(35, 'assets\\img\\carousel\\', 'RFSOATS BANNER VIDEO.png', NULL, '2024-05-21 01:49:33', '2024-05-21 01:49:33'),
(36, 'assets\\img\\carousel\\', 'Citizens Charter 2024 1st Edition.png', NULL, '2024-05-21 03:40:53', '2024-05-21 03:40:53'),
(37, 'assets\\img\\carousel\\', 'Banner_May11-as-World-Migratory-Bird-Day_2024.jpg', '2024-10-04 03:10:34', '2024-06-07 03:28:39', '2024-10-04 03:12:34'),
(38, 'assets\\img\\carousel\\', 'Banner_Environment-Month_2024-web-1.jpg', '2024-09-17 16:09:12', '2024-06-07 03:28:47', '2024-09-17 16:12:12'),
(39, 'assets\\img\\carousel\\', 'Banner_Araw-ng-Kalayaan_2024-web.jpg', '2024-09-17 16:09:13', '2024-06-07 03:28:53', '2024-09-17 16:12:13'),
(40, 'assets\\img\\carousel\\', 'Banner_June-as-National-ICT-Month_2024-web.jpg', '2024-09-17 16:09:56', '2024-06-27 03:48:54', '2024-09-17 16:11:56'),
(41, 'assets\\img\\carousel\\', 'Banner_National-Disaster-Resilience-Month_2024-1024x396.jpg', '2024-09-17 16:09:55', '2024-07-03 05:16:14', '2024-09-17 16:11:55'),
(42, 'assets\\img\\carousel\\', 'Banner_Buwan-ng-Wikang-Pambansa_2024.jpg', '2024-09-17 16:09:55', '2024-08-07 01:44:17', '2024-09-17 16:11:55'),
(43, 'assets\\img\\carousel\\', 'Banner_August-8-as-ASEAN-Day-2024-1024x396.jpg', '2024-09-17 16:09:11', '2024-08-12 01:54:01', '2024-09-17 16:11:11'),
(44, 'assets\\img\\carousel\\', 'Banner_August-9-Intl-Day-of-the-Wor-Indigenous-Peoples-2024-1024x396.jpg', '2024-09-17 16:09:12', '2024-08-12 01:54:08', '2024-09-17 16:11:12'),
(45, 'assets\\img\\carousel\\', 'Banner_Pambansang-Araw-ng-mga-Bayani_2024.jpg', '2024-09-17 16:09:54', '2024-08-28 01:36:04', '2024-09-17 16:11:54'),
(46, 'assets\\img\\carousel\\', 'ManaMoBanner.png', NULL, '2024-09-04 02:13:40', '2024-09-04 02:13:40'),
(47, 'assets\\img\\carousel\\', 'Banner_September-as-World-Ozone-Month.jpg', NULL, '2024-09-17 16:09:21', '2024-09-17 16:09:21'),
(48, 'assets\\img\\carousel\\', 'Banner_September-as-Philippine-Bamboo-Month2024.jpg', NULL, '2024-09-17 16:09:31', '2024-09-17 16:09:31'),
(49, 'assets\\img\\carousel\\', 'Banner_September-2024-as-CSC-124th-Anniversary.jpg', NULL, '2024-09-23 04:35:06', '2024-09-23 04:35:06'),
(50, 'assets\\img\\carousel\\', 'Banner_September_26_2024-as-World-Environmental-Health-Day.jpg', NULL, '2024-09-23 04:35:10', '2024-09-23 04:35:10'),
(51, 'assets\\img\\carousel\\', 'Banner_Sept-21-as-Intl-Coastal-Cleanup-2024.jpg', NULL, '2024-09-23 04:35:19', '2024-09-23 04:35:19'),
(52, 'assets\\img\\carousel\\', 'b783cdd4-f7ee-4099-ae0b-ace96e447cf1.jfif', NULL, '2024-09-26 07:33:57', '2024-09-26 07:33:57'),
(53, 'assets\\img\\carousel\\', 'Banner_October-1-7-Elderly-Filipino-Week.jpg', NULL, '2024-10-04 03:11:04', '2024-10-04 03:11:04'),
(54, 'assets\\img\\carousel\\', 'APMCDRR_Banner-web-1.jpg', NULL, '2024-10-08 00:35:15', '2024-10-08 00:35:15'),
(55, 'assets\\img\\carousel\\', 'tamarawMonth.png', NULL, '2024-10-21 01:18:02', '2024-10-21 01:18:02'),
(56, 'assets\\img\\carousel\\', 'Banner_October-24-as-Intl-Day-of-Climate-Action-2024.jpg', NULL, '2024-10-25 13:34:00', '2024-10-25 13:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `redts_j_user_offices`
--

CREATE TABLE `redts_j_user_offices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_uuid` char(36) DEFAULT NULL COMMENT 'from b_user',
  `offices_id` bigint(20) UNSIGNED NOT NULL,
  `offices_uuid` char(36) DEFAULT NULL COMMENT 'from f_offices',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redts_j_user_offices`
--

INSERT INTO `redts_j_user_offices` (`id`, `user_id`, `user_uuid`, `offices_id`, `offices_uuid`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '5d2efb68-d6ff-11ef-b430-3c7c3f2bc7d9', 161, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, NULL),
(2, 2, '5d2f0949-d6ff-11ef-b430-3c7c3f2bc7d9', 4, '0e4f165f-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, NULL),
(304, 304, '5d2f09e3-d6ff-11ef-b430-3c7c3f2bc7d9', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, '2023-12-27 05:22:23'),
(315, 315, '5d2f0acb-d6ff-11ef-b430-3c7c3f2bc7d9', 161, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, '2023-12-27 05:22:23'),
(316, 316, '5d2f0b29-d6ff-11ef-b430-3c7c3f2bc7d9', 168, '0e4fa032-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, '2024-04-17 05:32:46'),
(319, 321, '5d2f0cb1-d6ff-11ef-b430-3c7c3f2bc7d9', 176, '0e4fa25f-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, '2024-04-16 02:51:01'),
(321, 322, '5d2f0e0e-d6ff-11ef-b430-3c7c3f2bc7d9', 47, '0e4f2a23-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, '2024-04-16 02:56:45'),
(322, 324, '5d2f0e71-d6ff-11ef-b430-3c7c3f2bc7d9', 161, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, '2023-12-27 05:22:23'),
(323, 314, '5d2f0a64-d6ff-11ef-b430-3c7c3f2bc7d9', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, '2024-05-06 09:10:14'),
(334, 317, '5d2f0c05-d6ff-11ef-b430-3c7c3f2bc7d9', 133, '0e4f84db-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, '2024-04-17 05:32:51'),
(335, 319, '5d2f0c5e-d6ff-11ef-b430-3c7c3f2bc7d9', 1, '0e4f0a5b-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, '2023-12-27 05:22:23'),
(337, 340, '5d2f0ec7-d6ff-11ef-b430-3c7c3f2bc7d9', 172, '0e4fa1a6-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2023-11-28 19:20:11', '2024-09-20 07:22:37'),
(338, 341, '5d2f0f19-d6ff-11ef-b430-3c7c3f2bc7d9', 166, '0e4f9e73-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2023-12-06 00:46:11', '2023-12-20 03:15:00'),
(339, 342, '5d2f0f78-d6ff-11ef-b430-3c7c3f2bc7d9', 45, '0e4f297d-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2023-12-06 00:48:58', '2023-12-06 05:28:29'),
(340, 343, '5d2f0fce-d6ff-11ef-b430-3c7c3f2bc7d9', 112, '0e4f7c60-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2023-12-06 01:19:27', '2023-12-06 05:28:16'),
(341, 344, '5d2f1027-d6ff-11ef-b430-3c7c3f2bc7d9', 181, '0e4fa2bc-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2023-12-06 05:26:18', '2023-12-06 05:26:18'),
(342, 345, '5d2f107a-d6ff-11ef-b430-3c7c3f2bc7d9', 181, '0e4fa2bc-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2023-12-06 05:26:18', '2023-12-06 05:26:18'),
(343, 346, '5d2f10ea-d6ff-11ef-b430-3c7c3f2bc7d9', 182, '0e4fa3ee-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2023-12-06 05:27:45', '2023-12-20 03:12:23'),
(344, 347, '5d2f1143-d6ff-11ef-b430-3c7c3f2bc7d9', 183, '0e4fa46f-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2023-12-06 05:27:45', '2023-12-06 05:30:11'),
(345, 348, '5d2f1199-d6ff-11ef-b430-3c7c3f2bc7d9', 184, '0e4fa4cb-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2023-12-06 05:27:46', '2023-12-06 05:27:46'),
(346, 349, '5d2f11ea-d6ff-11ef-b430-3c7c3f2bc7d9', 1, '0e4f0a5b-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2023-12-16 16:37:45', '2023-12-16 16:37:45'),
(347, 350, '5d2f123b-d6ff-11ef-b430-3c7c3f2bc7d9', 162, '0e4f9cfa-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2023-12-21 00:12:03', '2024-04-17 02:38:05'),
(348, 351, '5d2f1291-d6ff-11ef-b430-3c7c3f2bc7d9', 84, '0e4f716b-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2023-12-21 00:13:04', '2024-04-17 02:39:05'),
(349, 352, '5d2f12c8-d6ff-11ef-b430-3c7c3f2bc7d9', 82, '0e4f70aa-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2023-12-21 00:14:34', '2023-12-21 00:14:34'),
(350, 353, '5d2f12fb-d6ff-11ef-b430-3c7c3f2bc7d9', 41, '0e4f2821-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2023-12-21 00:16:47', '2024-05-07 08:42:40'),
(351, 354, '5d2f132d-d6ff-11ef-b430-3c7c3f2bc7d9', 77, '0e4f698b-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2023-12-21 00:17:34', '2023-12-21 00:17:34'),
(352, 355, '5d2f1361-d6ff-11ef-b430-3c7c3f2bc7d9', 85, '0e4f71c5-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2023-12-21 00:18:28', '2023-12-21 00:18:28'),
(353, 356, '5d2f1392-d6ff-11ef-b430-3c7c3f2bc7d9', 83, '0e4f7106-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2023-12-21 00:19:19', '2023-12-21 00:19:19'),
(354, 357, '5d2f13c4-d6ff-11ef-b430-3c7c3f2bc7d9', 79, '0e4f6dc9-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2023-12-21 00:19:53', '2023-12-21 00:19:53'),
(355, 358, '5d2f13f5-d6ff-11ef-b430-3c7c3f2bc7d9', 78, '0e4f6c45-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2023-12-21 00:20:28', '2023-12-21 00:20:28'),
(356, 359, '5d2f1426-d6ff-11ef-b430-3c7c3f2bc7d9', 80, '0e4f6fcd-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2023-12-21 00:21:18', '2023-12-21 00:21:18'),
(357, 360, '5d2f1457-d6ff-11ef-b430-3c7c3f2bc7d9', 23, '0e4f2086-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2023-12-27 05:25:08', '2024-02-08 02:27:59'),
(358, 361, '5d2f148b-d6ff-11ef-b430-3c7c3f2bc7d9', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2023-12-27 05:50:01', '2023-12-27 05:50:01'),
(359, 362, '5d2f14bb-d6ff-11ef-b430-3c7c3f2bc7d9', 141, '0e4f88cd-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-01-18 01:14:24', '2024-04-17 02:24:53'),
(360, 363, '5d2f14ed-d6ff-11ef-b430-3c7c3f2bc7d9', 50, '0e4f2b5d-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-01-18 01:14:25', '2024-01-18 01:14:25'),
(361, 364, '5d2f151e-d6ff-11ef-b430-3c7c3f2bc7d9', 141, '0e4f88cd-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-01-18 01:14:27', '2024-04-17 02:07:42'),
(362, 365, '5d2f154f-d6ff-11ef-b430-3c7c3f2bc7d9', 141, '0e4f88cd-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-01-18 01:14:28', '2024-04-17 02:24:53'),
(363, 366, '5d2f157f-d6ff-11ef-b430-3c7c3f2bc7d9', 50, '0e4f2b5d-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-01-18 01:14:29', '2024-01-18 01:14:29'),
(364, 367, '5d2f15af-d6ff-11ef-b430-3c7c3f2bc7d9', 50, '0e4f2b5d-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-01-18 01:14:30', '2024-01-18 01:14:30'),
(365, 368, '5d2f15e0-d6ff-11ef-b430-3c7c3f2bc7d9', 50, '0e4f2b5d-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-01-18 01:14:31', '2024-01-18 01:14:31'),
(366, 369, '5d2f1611-d6ff-11ef-b430-3c7c3f2bc7d9', 50, '0e4f2b5d-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-01-18 01:26:49', '2024-01-18 01:26:49'),
(367, 370, '5d2f1641-d6ff-11ef-b430-3c7c3f2bc7d9', 167, '0e4f9fd1-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-01-22 03:45:47', '2024-04-17 03:38:28'),
(368, 371, '5d2f1673-d6ff-11ef-b430-3c7c3f2bc7d9', 27, '0e4f227c-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-02-08 02:32:53', '2024-02-08 03:18:18'),
(369, 372, '5d2f16a6-d6ff-11ef-b430-3c7c3f2bc7d9', 27, '0e4f227c-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-02-08 02:32:54', '2024-02-08 02:34:42'),
(370, 373, '5d2f16d8-d6ff-11ef-b430-3c7c3f2bc7d9', 168, '0e4fa032-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 00:07:02', '2024-05-07 08:41:31'),
(371, 374, '5d2f1717-d6ff-11ef-b430-3c7c3f2bc7d9', 41, '0e4f2821-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 00:07:03', '2024-04-16 01:33:28'),
(372, 375, '5d2f1747-d6ff-11ef-b430-3c7c3f2bc7d9', 23, '0e4f2086-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 00:07:03', '2024-09-05 02:41:57'),
(373, 376, '5d2f1778-d6ff-11ef-b430-3c7c3f2bc7d9', 22, '0e4f200e-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 00:07:03', '2024-05-07 08:44:27'),
(374, 377, '5d2f17b2-d6ff-11ef-b430-3c7c3f2bc7d9', 1, '0e4f0a5b-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 00:07:03', '2024-05-07 08:45:05'),
(375, 378, '5d2f18b3-d6ff-11ef-b430-3c7c3f2bc7d9', 161, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 00:07:03', '2024-05-07 08:45:41'),
(376, 379, '5d2f1905-d6ff-11ef-b430-3c7c3f2bc7d9', 133, '0e4f84db-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 00:07:03', '2024-05-07 08:42:05'),
(377, 380, '5d2f193c-d6ff-11ef-b430-3c7c3f2bc7d9', 84, '0e4f716b-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 03:05:36', '2024-04-24 10:35:04'),
(378, 381, '5d2f1974-d6ff-11ef-b430-3c7c3f2bc7d9', 84, '0e4f716b-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 03:07:09', '2024-04-24 10:35:17'),
(379, 382, '5d2f19ab-d6ff-11ef-b430-3c7c3f2bc7d9', 186, '0e4fa58c-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 03:07:58', '2024-04-17 03:30:35'),
(380, 383, '5d2f19e0-d6ff-11ef-b430-3c7c3f2bc7d9', 84, '0e4f716b-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 03:53:16', '2024-04-24 10:35:33'),
(381, 384, '5d2f1a16-d6ff-11ef-b430-3c7c3f2bc7d9', 84, '0e4f716b-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 03:56:02', '2024-04-24 10:35:42'),
(382, 385, '5d2f1b6b-d6ff-11ef-b430-3c7c3f2bc7d9', 130, '0e4f83c9-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 06:05:58', '2024-04-16 06:05:58'),
(383, 386, '5d2f1ba3-d6ff-11ef-b430-3c7c3f2bc7d9', 130, '0e4f83c9-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 06:09:31', '2024-04-24 11:18:03'),
(384, 387, '5d2f1bd5-d6ff-11ef-b430-3c7c3f2bc7d9', 130, '0e4f83c9-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 06:10:24', '2024-04-24 11:18:13'),
(385, 388, '5d2f1c1c-d6ff-11ef-b430-3c7c3f2bc7d9', 187, '0e4fa5eb-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 06:12:10', '2024-04-17 04:08:43'),
(386, 389, '5d2f1c52-d6ff-11ef-b430-3c7c3f2bc7d9', 93, '0e4f7518-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 06:15:08', '2024-04-16 06:15:08'),
(387, 390, '5d2f1c85-d6ff-11ef-b430-3c7c3f2bc7d9', 188, '0e4fa648-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 06:17:50', '2024-04-17 05:06:36'),
(388, 391, '5d2f1d65-d6ff-11ef-b430-3c7c3f2bc7d9', 112, '0e4f7c60-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 06:22:40', '2024-04-16 06:22:40'),
(389, 392, '5d2f1e1e-d6ff-11ef-b430-3c7c3f2bc7d9', 112, '0e4f7c60-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 06:23:42', '2024-04-24 10:17:34'),
(390, 393, '5d2f1e64-d6ff-11ef-b430-3c7c3f2bc7d9', 112, '0e4f7c60-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 06:24:29', '2024-04-24 10:36:47'),
(391, 394, '5d2f1e96-d6ff-11ef-b430-3c7c3f2bc7d9', 183, '0e4fa46f-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 06:25:03', '2024-04-17 05:16:40'),
(392, 395, '5d2f1f79-d6ff-11ef-b430-3c7c3f2bc7d9', 112, '0e4f7c60-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 06:28:32', '2024-04-24 11:00:18'),
(395, 398, '5d2f1fad-d6ff-11ef-b430-3c7c3f2bc7d9', 133, '0e4f84db-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 06:35:18', '2024-04-16 06:35:18'),
(396, 399, '5d2f1fe1-d6ff-11ef-b430-3c7c3f2bc7d9', 133, '0e4f84db-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 06:36:01', '2024-05-13 09:10:00'),
(397, 400, '5d2f20be-d6ff-11ef-b430-3c7c3f2bc7d9', 133, '0e4f84db-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 06:36:45', '2024-05-15 02:12:00'),
(398, 401, '5d2f20f3-d6ff-11ef-b430-3c7c3f2bc7d9', 176, '0e4fa25f-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 06:39:28', '2024-04-17 05:38:42'),
(399, 402, '5d2f2125-d6ff-11ef-b430-3c7c3f2bc7d9', 141, '0e4f88cd-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 06:42:48', '2024-09-20 07:52:03'),
(400, 403, '5d2f2202-d6ff-11ef-b430-3c7c3f2bc7d9', 141, '0e4f88cd-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 06:43:28', '2024-04-24 10:29:28'),
(401, 404, '5d2f2237-d6ff-11ef-b430-3c7c3f2bc7d9', 141, '0e4f88cd-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 06:44:03', '2024-04-24 10:30:26'),
(402, 405, '5d2f2324-d6ff-11ef-b430-3c7c3f2bc7d9', 185, '0e4fa528-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 06:49:24', '2024-04-17 05:42:23'),
(403, 406, '5d2f235b-d6ff-11ef-b430-3c7c3f2bc7d9', 141, '0e4f88cd-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 06:50:46', '2024-04-24 10:29:47'),
(404, 407, '5d2f3425-d6ff-11ef-b430-3c7c3f2bc7d9', 141, '0e4f88cd-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 06:51:33', '2024-04-24 10:30:26'),
(405, 408, '5d2f349e-d6ff-11ef-b430-3c7c3f2bc7d9', 145, '0e4f8a3b-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 07:14:37', '2024-08-28 06:08:33'),
(406, 409, '5d2f35a7-d6ff-11ef-b430-3c7c3f2bc7d9', 145, '0e4f8a3b-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 07:15:15', '2024-09-03 08:44:15'),
(407, 410, '5d2f36c8-d6ff-11ef-b430-3c7c3f2bc7d9', 145, '0e4f8a3b-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 07:16:19', '2024-04-24 10:34:30'),
(408, 411, '5d2f37c7-d6ff-11ef-b430-3c7c3f2bc7d9', 189, '0e4fa6a9-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 07:16:50', '2024-04-17 05:54:42'),
(409, 412, '5d2f38c4-d6ff-11ef-b430-3c7c3f2bc7d9', 149, '0e4f8bb2-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 07:20:54', '2024-09-20 07:25:11'),
(410, 413, '5d2f39bf-d6ff-11ef-b430-3c7c3f2bc7d9', 149, '0e4f8bb2-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 07:21:38', '2024-09-20 07:25:11'),
(411, 414, '5d2f3d55-d6ff-11ef-b430-3c7c3f2bc7d9', 149, '0e4f8bb2-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 07:23:08', '2024-09-20 07:25:11'),
(412, 415, '5d2f3da6-d6ff-11ef-b430-3c7c3f2bc7d9', 190, '0e4fa708-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 07:23:50', '2024-09-20 07:25:11'),
(413, 416, '5d2f3dec-d6ff-11ef-b430-3c7c3f2bc7d9', 153, '0e4f97fd-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 07:29:55', '2024-04-16 07:29:55'),
(414, 417, '5d2f3e44-d6ff-11ef-b430-3c7c3f2bc7d9', 153, '0e4f97fd-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 07:30:26', '2024-04-24 10:33:55'),
(415, 418, '5d2f3e7b-d6ff-11ef-b430-3c7c3f2bc7d9', 153, '0e4f97fd-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 07:31:02', '2024-04-24 10:34:04'),
(416, 419, '5d2f3eb2-d6ff-11ef-b430-3c7c3f2bc7d9', 191, '0e4fa83d-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-16 07:31:35', '2024-04-17 06:11:15'),
(417, 420, '5d2f3eed-d6ff-11ef-b430-3c7c3f2bc7d9', 171, '0e4fa144-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-17 02:31:55', '2024-09-20 07:51:53'),
(418, 421, '5d2f3f27-d6ff-11ef-b430-3c7c3f2bc7d9', 84, '0e4f716b-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-17 03:33:17', '2024-05-14 01:04:38'),
(419, 422, '5d2f3f60-d6ff-11ef-b430-3c7c3f2bc7d9', 167, '0e4f9fd1-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-17 03:40:35', '2024-04-18 06:18:38'),
(420, 423, '5d2f3f98-d6ff-11ef-b430-3c7c3f2bc7d9', 130, '0e4f83c9-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-17 03:49:23', '2024-04-17 03:49:23'),
(421, 424, '5d2f3fd7-d6ff-11ef-b430-3c7c3f2bc7d9', 130, '0e4f83c9-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-17 03:51:23', '2024-04-17 03:51:23'),
(422, 425, '5d2f4039-d6ff-11ef-b430-3c7c3f2bc7d9', 163, '0e4f9d5e-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-17 05:03:18', '2024-04-17 05:04:39'),
(423, 428, '5d2f40ab-d6ff-11ef-b430-3c7c3f2bc7d9', 93, '0e4f7518-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-17 05:07:40', '2024-05-20 08:35:53'),
(424, 429, '5d2f4109-d6ff-11ef-b430-3c7c3f2bc7d9', 93, '0e4f7518-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-17 05:07:40', '2024-04-24 10:36:11'),
(425, 430, '5d2f4163-d6ff-11ef-b430-3c7c3f2bc7d9', 166, '0e4f9e73-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-17 05:13:30', '2024-04-17 05:13:30'),
(426, 433, '5d2f41cd-d6ff-11ef-b430-3c7c3f2bc7d9', 165, '0e4f9e19-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-17 05:25:22', '2024-04-17 05:25:22'),
(427, 434, '5d2f4243-d6ff-11ef-b430-3c7c3f2bc7d9', 121, '0e4f8053-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-17 05:25:22', '2024-04-24 09:11:16'),
(428, 435, '5d2f42a4-d6ff-11ef-b430-3c7c3f2bc7d9', 121, '0e4f8053-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-17 05:25:22', '2024-04-17 05:25:22'),
(429, 437, '5d2f42fc-d6ff-11ef-b430-3c7c3f2bc7d9', 168, '0e4fa032-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-17 05:34:53', '2024-04-17 05:34:53'),
(430, 440, '5d2f4357-d6ff-11ef-b430-3c7c3f2bc7d9', 133, '0e4f84db-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-17 05:36:23', '2024-04-24 10:31:44'),
(431, 441, '5d2f43af-d6ff-11ef-b430-3c7c3f2bc7d9', 133, '0e4f84db-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-17 05:36:23', '2024-04-24 10:32:00'),
(432, 442, '5d2f440a-d6ff-11ef-b430-3c7c3f2bc7d9', 170, '0e4fa0e8-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-17 05:56:17', '2024-04-17 05:56:17'),
(433, 443, '5d2f446f-d6ff-11ef-b430-3c7c3f2bc7d9', 173, '0e4fa202-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-17 06:08:56', '2024-04-17 06:08:56'),
(434, 444, '5d2f44ca-d6ff-11ef-b430-3c7c3f2bc7d9', 133, '0e4f84db-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-17 06:54:14', '2024-04-24 10:32:17'),
(435, 445, '5d2f4523-d6ff-11ef-b430-3c7c3f2bc7d9', 165, '0e4f9e19-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-18 05:11:30', '2024-04-18 05:11:30'),
(436, 446, '5d2f457c-d6ff-11ef-b430-3c7c3f2bc7d9', 103, '0e4f7927-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-18 05:11:30', '2024-04-18 05:11:30'),
(437, 447, '5d2f45e2-d6ff-11ef-b430-3c7c3f2bc7d9', 103, '0e4f7927-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-18 05:11:30', '2024-04-24 10:36:23'),
(438, 448, '5d2f461e-d6ff-11ef-b430-3c7c3f2bc7d9', 103, '0e4f7927-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-18 05:11:30', '2024-04-24 10:36:32'),
(439, 449, '5d2f4655-d6ff-11ef-b430-3c7c3f2bc7d9', 192, '0e4fa89d-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-18 05:11:30', '2024-04-18 05:11:30'),
(440, 450, '5d2f468b-d6ff-11ef-b430-3c7c3f2bc7d9', 164, '0e4f9dbd-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-18 05:14:50', '2024-04-18 05:52:35'),
(441, 451, '5d2f46c3-d6ff-11ef-b430-3c7c3f2bc7d9', 165, '0e4f9e19-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-18 05:22:06', '2024-04-18 05:52:40'),
(442, 452, '5d2f46fa-d6ff-11ef-b430-3c7c3f2bc7d9', 169, '0e4fa08a-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-18 06:04:04', '2024-04-18 06:04:04'),
(443, 453, '5d2f4732-d6ff-11ef-b430-3c7c3f2bc7d9', 137, '0e4f8656-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-18 06:04:05', '2024-09-04 07:04:53'),
(444, 454, '5d2f476a-d6ff-11ef-b430-3c7c3f2bc7d9', 137, '0e4f8656-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-18 06:04:05', '2024-09-05 01:02:28'),
(445, 455, '5d2f47a3-d6ff-11ef-b430-3c7c3f2bc7d9', 137, '0e4f8656-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-18 06:04:05', '2024-09-04 07:10:39'),
(446, 456, '5d2f47d9-d6ff-11ef-b430-3c7c3f2bc7d9', 137, '0e4f8656-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-18 06:04:05', '2024-09-04 07:10:39'),
(447, 457, '5d2f4810-d6ff-11ef-b430-3c7c3f2bc7d9', 194, '0e4fa966-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-18 06:04:05', '2024-04-18 06:04:05'),
(448, 459, '5d2f4849-d6ff-11ef-b430-3c7c3f2bc7d9', 171, '0e4fa144-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-18 06:11:45', '2024-04-18 06:11:45'),
(449, 460, '5d2f4881-d6ff-11ef-b430-3c7c3f2bc7d9', 171, '0e4fa144-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-18 06:11:45', '2024-04-18 06:11:45'),
(450, 461, '5d2f48fd-d6ff-11ef-b430-3c7c3f2bc7d9', 170, '0e4fa0e8-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-18 06:17:53', '2024-04-18 06:17:53'),
(451, 462, '5d2f4937-d6ff-11ef-b430-3c7c3f2bc7d9', 170, '0e4fa0e8-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-18 06:17:53', '2024-04-18 06:17:53'),
(452, 463, '5d2f496d-d6ff-11ef-b430-3c7c3f2bc7d9', 172, '0e4fa1a6-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-18 06:23:37', '2024-09-20 07:25:11'),
(453, 464, '5d2f49a4-d6ff-11ef-b430-3c7c3f2bc7d9', 51, '0e4f2bb0-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-18 06:23:37', '2024-09-20 07:25:11'),
(454, 465, '5d2f49dc-d6ff-11ef-b430-3c7c3f2bc7d9', 173, '0e4fa202-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-18 06:29:55', '2024-04-18 06:29:55'),
(455, 466, '5d2f4a14-d6ff-11ef-b430-3c7c3f2bc7d9', 173, '0e4fa202-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-18 06:29:55', '2024-04-18 06:29:55'),
(456, 467, '5d2f4a4c-d6ff-11ef-b430-3c7c3f2bc7d9', 50, '0e4f2b5d-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-04-29 07:43:24', '2024-04-29 07:52:24'),
(457, 468, '5d2f4a85-d6ff-11ef-b430-3c7c3f2bc7d9', 26, '0e4f2205-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-05-13 08:30:38', '2024-05-14 06:52:49'),
(458, 469, '5d2f4abc-d6ff-11ef-b430-3c7c3f2bc7d9', 22, '0e4f200e-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-05-14 01:03:18', '2024-05-14 01:03:18'),
(459, 470, '5d2f4af5-d6ff-11ef-b430-3c7c3f2bc7d9', 49, '0e4f2b09-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-08-28 06:08:03', '2024-08-28 06:08:03'),
(460, 471, '5d2f4b2d-d6ff-11ef-b430-3c7c3f2bc7d9', 48, '0e4f2aa9-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-09-04 06:47:20', '2024-09-04 07:10:39'),
(461, 472, '5d2f4b65-d6ff-11ef-b430-3c7c3f2bc7d9', 48, '0e4f2aa9-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-09-04 06:47:20', '2024-09-04 07:10:39'),
(462, 473, '5d2f4ba7-d6ff-11ef-b430-3c7c3f2bc7d9', 48, '0e4f2aa9-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-09-04 06:47:20', '2024-09-04 07:10:39'),
(463, 474, '5d2f4be0-d6ff-11ef-b430-3c7c3f2bc7d9', 48, '0e4f2aa9-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-09-04 06:47:20', '2024-09-04 07:10:39'),
(464, 475, '5d2f4cad-d6ff-11ef-b430-3c7c3f2bc7d9', 145, '0e4f8a3b-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2024-10-09 08:15:35', '2024-10-09 08:15:35'),
(465, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-01-16 08:06:10', '2025-01-16 08:06:10');

-- --------------------------------------------------------

--
-- Table structure for table `redts_la_process_lengths`
--

CREATE TABLE `redts_la_process_lengths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subclass_id` bigint(20) UNSIGNED NOT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `process_length_days` int(11) NOT NULL DEFAULT 0,
  `process_length_hours` int(11) NOT NULL DEFAULT 0,
  `process_length_minutes` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `redts_lc_rstct_sbmsn_of_reqs`
--

CREATE TABLE `redts_lc_rstct_sbmsn_of_reqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subclass_id` bigint(20) UNSIGNED NOT NULL,
  `rstd_office_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `redts_le_subclass_fees`
--

CREATE TABLE `redts_le_subclass_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subclass_id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `fee_amount` double(10,2) NOT NULL,
  `cost_grouping` varchar(255) NOT NULL COMMENT 'this will determine the options of fees may be used late for example fee can have 50 20 adn 30 pesos in cost group a1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `redts_l_sub_class`
--

CREATE TABLE `redts_l_sub_class` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `classification_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `full_description` text DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `classification_type` varchar(255) DEFAULT NULL COMMENT 'simple, complex, or highly_technical',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redts_l_sub_class`
--

INSERT INTO `redts_l_sub_class` (`id`, `classification_id`, `description`, `full_description`, `slug`, `classification_type`, `deleted_at`, `created_at`, `updated_at`) VALUES
(12, 31, 'Not Available', NULL, 'NA', NULL, NULL, '2025-01-20 03:57:32', '2025-01-20 03:57:32');

-- --------------------------------------------------------

--
-- Table structure for table `redts_na_action_attachments`
--

CREATE TABLE `redts_na_action_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `action_id` bigint(20) UNSIGNED NOT NULL COMMENT 'referenced to n_action id',
  `action_uuid` char(36) DEFAULT NULL COMMENT 'comment here',
  `remarks` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) NOT NULL DEFAULT 'n/a',
  `file_name` varchar(255) NOT NULL DEFAULT 'n/a',
  `file_link` varchar(255) NOT NULL DEFAULT 'n/a',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `public` tinyint(3) UNSIGNED DEFAULT 0 COMMENT 'Allow public views'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redts_na_action_attachments`
--

INSERT INTO `redts_na_action_attachments` (`id`, `action_id`, `action_uuid`, `remarks`, `file_path`, `file_name`, `file_link`, `deleted_at`, `created_at`, `updated_at`, `public`) VALUES
(1, 11, '2a8b1f92-e6d6-46b2-8c14-7a659b2ca12e', 'FileName2', 'action_files', 'ad10_FileName2_202502031629.pdf', 'n/a', NULL, '2025-02-03 08:29:46', '2025-02-03 08:29:46', 0),
(2, 12, 'a4c3e1ba-f7dd-422b-ba1e-7d8ea0828e27', 'FileName1', 'action_files', 'ad3_FileName1_202502031653.pdf', 'n/a', NULL, '2025-02-03 08:53:36', '2025-02-03 08:53:36', 0),
(3, 12, 'a4c3e1ba-f7dd-422b-ba1e-7d8ea0828e27', 'FileName2', 'action_files', 'ad3_FileName2_202502031653.pdf', 'n/a', NULL, '2025-02-03 08:53:37', '2025-02-03 08:53:37', 0),
(4, 17, '4708da5c-cef4-4499-8e9e-ab7d842d31fe', 'tested', 'action_files', 'ad16_tested_202502041609.pdf', 'n/a', NULL, '2025-02-04 08:09:12', '2025-02-04 08:09:12', 0),
(5, 18, '36998fd7-b1ef-4269-93c9-bec006896986', 'FileName1', 'action_files', 'ad15_FileName1_202502041640.pdf', 'n/a', NULL, '2025-02-04 08:40:06', '2025-02-04 08:40:06', 0),
(6, 12, 'a4c3e1ba-f7dd-422b-ba1e-7d8ea0828e27', 'FileName1', 'action_files', 'ad12_FileName1_202502051121.pdf', 'n/a', NULL, '2025-02-05 03:21:48', '2025-02-05 03:21:48', 0),
(7, 18, '36998fd7-b1ef-4269-93c9-bec006896986', 'FileName1', 'action_files', 'ad18_FileName1_202502051354.pdf', 'n/a', NULL, '2025-02-05 05:54:44', '2025-02-05 05:54:44', 0),
(8, 17, '4708da5c-cef4-4499-8e9e-ab7d842d31fe', 'TestDoc1', 'action_files', 'ad17_TestDoc1_202502051355.pdf', 'n/a', NULL, '2025-02-05 05:55:55', '2025-02-05 05:55:55', 0),
(9, 14, '748813b5-f068-4013-bddb-ce9cdbd7d57e', 'FileName1', 'action_files', 'ad14_FileName1_202502051402.pdf', 'n/a', NULL, '2025-02-05 06:02:58', '2025-02-05 06:02:58', 0),
(10, 13, '7c0ee3b9-5e7d-48b0-b47a-21e353cfad84', 'FileName2', 'action_files', 'ad13_FileName2_202502051403.pdf', 'n/a', NULL, '2025-02-05 06:03:42', '2025-02-05 06:03:42', 0),
(11, 24, '479ded5f-40b0-4df8-9455-de2f886b2252', 'sample1', 'action_files', 'ad11_sample1_202502051549.pdf', 'n/a', NULL, '2025-02-05 07:49:40', '2025-02-05 07:49:40', 0),
(12, 29, '21a38f82-440b-45e6-b4fa-cc79aef1e54f', 'SampleAttach', 'action_files', 'ad28_SampleAttach_202502070912.pdf', 'n/a', NULL, '2025-02-07 01:12:27', '2025-02-07 01:12:27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `redts_nb_releasing_routes`
--

CREATE TABLE `redts_nb_releasing_routes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `origin_act` bigint(20) UNSIGNED NOT NULL COMMENT 'when you release action this is the origin from n_action',
  `origin_act_uuid` char(36) DEFAULT NULL COMMENT 'indicates released by',
  `released_act` bigint(20) UNSIGNED NOT NULL COMMENT 'this is the new action created released to the office it is forwarded or released from n_action',
  `released_act_uuid` char(36) DEFAULT NULL COMMENT 'indicates released by',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redts_nb_releasing_routes`
--

INSERT INTO `redts_nb_releasing_routes` (`id`, `origin_act`, `origin_act_uuid`, `released_act`, `released_act_uuid`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 4, '00e8a838-aaa6-4e4b-8f33-de5755b964a9', 5, 'bcc13fe4-b0b4-4a7e-936b-1ebf7b1dd8d8', NULL, '2025-02-03 06:33:32', '2025-02-03 06:33:32'),
(2, 6, '9c81f165-6748-4eab-8653-ef4cfed6c489', 10, 'cf0e530e-02b9-4194-b290-2903060dd141', NULL, '2025-02-03 08:22:46', '2025-02-03 08:22:46'),
(3, 10, 'cf0e530e-02b9-4194-b290-2903060dd141', 11, '2a8b1f92-e6d6-46b2-8c14-7a659b2ca12e', NULL, '2025-02-03 08:29:45', '2025-02-03 08:29:45'),
(4, 3, 'e3846f2e-9ae8-4071-a1b8-25f931b32678', 12, 'a4c3e1ba-f7dd-422b-ba1e-7d8ea0828e27', NULL, '2025-02-03 08:53:36', '2025-02-03 08:53:36'),
(5, 1, '58a9db72-115f-452c-a6cb-38624045ba50', 16, '651ae837-23e8-409b-be0f-a2e8127a7c6d', NULL, '2025-02-04 08:00:22', '2025-02-04 08:00:22'),
(6, 16, '651ae837-23e8-409b-be0f-a2e8127a7c6d', 17, '4708da5c-cef4-4499-8e9e-ab7d842d31fe', NULL, '2025-02-04 08:09:12', '2025-02-04 08:09:12'),
(7, 15, '45944fc8-54d0-4941-a0c3-5999b70e8588', 18, '36998fd7-b1ef-4269-93c9-bec006896986', NULL, '2025-02-04 08:40:06', '2025-02-04 08:40:06'),
(8, 11, '2a8b1f92-e6d6-46b2-8c14-7a659b2ca12e', 24, '479ded5f-40b0-4df8-9455-de2f886b2252', NULL, '2025-02-05 07:49:40', '2025-02-05 07:49:40'),
(9, 21, 'fb508cf9-cd39-4908-842d-969f8b1c7ae1', 26, 'ab3e4118-0da1-4966-b104-53892700a471', NULL, '2025-02-06 03:22:21', '2025-02-06 03:22:21'),
(10, 20, '040a3b57-b32a-4dd5-8da9-a9aa9f2960f1', 27, '503794cf-cc2e-42a5-ae20-76d709ea0bd9', NULL, '2025-02-06 03:23:56', '2025-02-06 03:23:56'),
(11, 25, '82f80387-f441-4096-8a80-c8c5173d6c28', 28, 'c0684ba1-1b9e-4c43-ba91-8f8cb890f927', NULL, '2025-02-06 05:27:56', '2025-02-06 05:27:56'),
(12, 28, 'c0684ba1-1b9e-4c43-ba91-8f8cb890f927', 29, '21a38f82-440b-45e6-b4fa-cc79aef1e54f', NULL, '2025-02-07 01:12:26', '2025-02-07 01:12:26'),
(13, 74, '411b0c6b-07ea-4524-94e9-b36fd6bffe61', 75, '5bbd769f-6da8-4200-9e47-9cde51e1a98f', NULL, '2025-03-18 08:40:40', '2025-03-18 08:40:40'),
(14, 90, '0b026c98-27f2-414f-ae56-47a958d89aa2', 91, '5fa2e605-534b-46ef-ada8-aba7085ae4a0', NULL, '2025-04-04 03:54:25', '2025-04-04 03:54:25'),
(15, 116, '5d239f44-a89a-4c36-b4e0-b5c329b7c85c', 117, '3f105e90-1593-4e4b-a8ad-3843d176f983', NULL, '2025-04-08 04:01:54', '2025-04-08 04:01:54');

-- --------------------------------------------------------

--
-- Table structure for table `redts_nc_act_seens`
--

CREATE TABLE `redts_nc_act_seens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `action_id` bigint(20) UNSIGNED NOT NULL COMMENT 'from n_action',
  `action_uuid` char(36) DEFAULT NULL COMMENT 'from n_action',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redts_nc_act_seens`
--

INSERT INTO `redts_nc_act_seens` (`id`, `action_id`, `action_uuid`, `deleted_at`, `created_at`, `updated_at`) VALUES
(10, 15, '45944fc8-54d0-4941-a0c3-5999b70e8588', NULL, '2025-02-04 06:35:25', '2025-02-04 06:35:25'),
(11, 12, 'a4c3e1ba-f7dd-422b-ba1e-7d8ea0828e27', NULL, '2025-02-04 06:37:00', '2025-02-04 06:37:00'),
(12, 1, '58a9db72-115f-452c-a6cb-38624045ba50', NULL, '2025-02-04 07:16:10', '2025-02-04 07:16:10'),
(13, 16, '651ae837-23e8-409b-be0f-a2e8127a7c6d', NULL, '2025-02-04 08:06:35', '2025-02-04 08:06:35'),
(14, 18, '36998fd7-b1ef-4269-93c9-bec006896986', NULL, '2025-02-05 05:54:20', '2025-02-05 05:54:20'),
(15, 17, '4708da5c-cef4-4499-8e9e-ab7d842d31fe', NULL, '2025-02-05 05:55:29', '2025-02-05 05:55:29'),
(16, 14, '748813b5-f068-4013-bddb-ce9cdbd7d57e', NULL, '2025-02-05 06:02:40', '2025-02-05 06:02:40'),
(17, 13, '7c0ee3b9-5e7d-48b0-b47a-21e353cfad84', NULL, '2025-02-05 06:03:28', '2025-02-05 06:03:28'),
(18, 20, '040a3b57-b32a-4dd5-8da9-a9aa9f2960f1', NULL, '2025-02-05 06:27:26', '2025-02-05 06:27:26'),
(19, 21, 'fb508cf9-cd39-4908-842d-969f8b1c7ae1', NULL, '2025-02-05 06:31:51', '2025-02-05 06:31:51'),
(20, 22, 'fafe6213-a36a-4d39-b6b0-66d56f53c0d7', NULL, '2025-02-05 06:45:43', '2025-02-05 06:45:43'),
(21, 11, '2a8b1f92-e6d6-46b2-8c14-7a659b2ca12e', NULL, '2025-02-05 06:52:56', '2025-02-05 06:52:56'),
(22, 23, 'fafcd8ed-4ba3-4079-8083-05936f22059d', NULL, '2025-02-05 07:21:35', '2025-02-05 07:21:35'),
(23, 24, '479ded5f-40b0-4df8-9455-de2f886b2252', NULL, '2025-02-06 03:18:34', '2025-02-06 03:18:34'),
(24, 26, 'ab3e4118-0da1-4966-b104-53892700a471', NULL, '2025-02-06 03:34:17', '2025-02-06 03:34:17'),
(25, 27, '503794cf-cc2e-42a5-ae20-76d709ea0bd9', NULL, '2025-02-06 05:14:11', '2025-02-06 05:14:11'),
(26, 25, '82f80387-f441-4096-8a80-c8c5173d6c28', NULL, '2025-02-06 05:15:04', '2025-02-06 05:15:04'),
(27, 28, 'c0684ba1-1b9e-4c43-ba91-8f8cb890f927', NULL, '2025-02-06 05:42:14', '2025-02-06 05:42:14'),
(28, 19, 'e6b6410c-4064-4894-a609-49dc40a79f4c', NULL, '2025-02-06 05:59:31', '2025-02-06 05:59:31'),
(29, 7, '1ad32a50-811f-4116-8be4-08f94538b18e', NULL, '2025-02-07 01:10:38', '2025-02-07 01:10:38'),
(30, 33, 'a004631b-6232-4ee5-a51f-43014e6b8803', NULL, '2025-03-04 09:14:31', '2025-03-04 09:14:31'),
(31, 34, '031d00b6-adbf-4557-acd4-b4c72bd967ad', NULL, '2025-03-04 09:18:40', '2025-03-04 09:18:40'),
(32, 35, 'b56014b8-4b17-4379-9a76-42818043ab85', NULL, '2025-03-04 09:19:31', '2025-03-04 09:19:31'),
(33, 36, 'c3cbf2e4-948d-4496-ae6b-146a6bcaab93', NULL, '2025-03-04 09:21:26', '2025-03-04 09:21:26'),
(34, 39, 'd6157ba6-f271-4922-be2d-9f30ea1ddd22', NULL, '2025-03-04 09:25:54', '2025-03-04 09:25:54'),
(35, 40, '9aa2e711-9c19-4c0a-ac89-9931792592ac', NULL, '2025-03-04 09:26:28', '2025-03-04 09:26:28'),
(36, 41, '9c994c5c-1720-409d-b041-a3db315519f2', NULL, '2025-03-05 03:17:11', '2025-03-05 03:17:11'),
(37, 31, '12b52b41-c6d4-4af6-aa31-404fca3afbc1', NULL, '2025-03-06 04:53:58', '2025-03-06 04:53:58'),
(38, 66, 'ae3959e2-3e1c-4398-9a76-169a8b36f222', NULL, '2025-03-10 06:55:28', '2025-03-10 06:55:28'),
(39, 74, '411b0c6b-07ea-4524-94e9-b36fd6bffe61', NULL, '2025-03-18 08:39:58', '2025-03-18 08:39:58'),
(40, 29, '21a38f82-440b-45e6-b4fa-cc79aef1e54f', NULL, '2025-03-18 08:43:32', '2025-03-18 08:43:32'),
(41, 78, '9b7cb825-f3d0-407c-a25b-5111616cf98c', NULL, '2025-03-25 09:00:10', '2025-03-25 09:00:10'),
(42, 90, '0b026c98-27f2-414f-ae56-47a958d89aa2', NULL, '2025-04-04 03:53:40', '2025-04-04 03:53:40'),
(43, 96, '8c905d7c-c0ae-45bb-b787-aa6d60590003', NULL, '2025-04-08 02:22:00', '2025-04-08 02:22:00'),
(44, 98, '9cf31f84-f28f-44b2-ba63-85f700bcb238', NULL, '2025-04-08 02:53:51', '2025-04-08 02:53:51'),
(45, 106, '49a10d32-c243-4d3d-8e3a-58408ac30388', NULL, '2025-04-08 03:13:23', '2025-04-08 03:13:23'),
(46, 116, '5d239f44-a89a-4c36-b4e0-b5c329b7c85c', NULL, '2025-04-08 04:00:08', '2025-04-08 04:00:08'),
(47, 117, '3f105e90-1593-4e4b-a8ad-3843d176f983', NULL, '2025-04-08 04:02:41', '2025-04-08 04:02:41'),
(48, 121, '2d9c3a43-6e27-47a3-948e-f759390ba1da', NULL, '2025-04-08 05:19:26', '2025-04-08 05:19:26'),
(49, 122, '95276ff1-3435-4249-b8d0-91da5daaa0e7', NULL, '2025-04-08 05:22:55', '2025-04-08 05:22:55');

-- --------------------------------------------------------

--
-- Table structure for table `redts_n_actions`
--

CREATE TABLE `redts_n_actions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `subject` longtext DEFAULT NULL,
  `doc_id` bigint(20) UNSIGNED NOT NULL COMMENT 'from main doc',
  `doc_uuid` char(36) DEFAULT NULL COMMENT 'indicates released by',
  `doc_no` varchar(255) DEFAULT NULL COMMENT 'indicates released by',
  `sender_client_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'non for removal',
  `sender_user_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'user id',
  `sender_user_uuid` char(36) DEFAULT NULL COMMENT 'indicates released by',
  `sender_type` varchar(255) NOT NULL,
  `referred_by_office` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'office',
  `referred_by_office_uuid` char(36) DEFAULT NULL COMMENT 'indicates released by',
  `action_taken` longtext DEFAULT NULL,
  `send_to_office` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'what office to send',
  `send_to_office_uuid` char(36) DEFAULT NULL COMMENT 'indicates released by',
  `validated` datetime DEFAULT NULL,
  `received_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'user id',
  `received_uuid` char(36) DEFAULT NULL COMMENT 'indicates received by',
  `received` timestamp NULL DEFAULT NULL,
  `released` timestamp NULL DEFAULT NULL,
  `final_action` timestamp NULL DEFAULT NULL,
  `rejected` timestamp NULL DEFAULT NULL,
  `verification_date` timestamp NULL DEFAULT NULL,
  `in_transit_remarks` longtext DEFAULT NULL,
  `document_remarks` longtext DEFAULT NULL,
  `action_remarks` longtext DEFAULT NULL,
  `attachment_remarks` longtext DEFAULT NULL,
  `uploaded_act` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redts_n_actions`
--

INSERT INTO `redts_n_actions` (`id`, `uuid`, `subject`, `doc_id`, `doc_uuid`, `doc_no`, `sender_client_id`, `sender_user_id`, `sender_user_uuid`, `sender_type`, `referred_by_office`, `referred_by_office_uuid`, `action_taken`, `send_to_office`, `send_to_office_uuid`, `validated`, `received_id`, `received_uuid`, `received`, `released`, `final_action`, `rejected`, `verification_date`, `in_transit_remarks`, `document_remarks`, `action_remarks`, `attachment_remarks`, `uploaded_act`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '58a9db72-115f-452c-a6cb-38624045ba50', 'TESTING AFFIDAVIT', 1, 'ff891a6d-58e2-4f1d-9446-1cb436c48f6a', 'PMD.ICT-AFFIDVT-2025.02.03-47614.11.52', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'User', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', '2025-02-03 14:02:33', 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-02-04 07:16:00', '2025-02-04 08:00:22', NULL, NULL, '2025-02-03 06:02:33', NULL, NULL, 'TESTING FORWARD', NULL, NULL, NULL, '2025-02-03 06:12:33', '2025-02-04 08:00:22'),
(2, '3468800d-ad2d-4141-8831-ebcbd6a150d3', 'TESTING', 2, '7d01283b-416b-43b3-b562-8652f0d56b79', 'PMD.ICT-MEMO-2025.02.03-47614.12.55', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'User', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', '2025-02-03 14:02:02', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-03 06:02:02', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-03 06:13:02', '2025-02-03 06:13:02'),
(3, 'e3846f2e-9ae8-4071-a1b8-25f931b32678', 'TESTING', 3, '2229f179-cd30-4f8e-9e16-c4102aabc805', 'PMD.ICT-DEC-2025.02.03-47614.13.11', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'User', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', '2025-02-03 14:02:13', 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-02-03 07:02:05', '2025-02-03 08:53:36', NULL, NULL, '2025-02-03 06:02:13', 'WILL PERFORM DOCUMENT UPLOADING USING ACTION RECEIVING TEST 1', NULL, 'SECOND ATTEMPT FOR FILE UPLOAD', NULL, NULL, NULL, '2025-02-03 06:13:13', '2025-02-03 08:53:36'),
(4, '00e8a838-aaa6-4e4b-8f33-de5755b964a9', 'TESTING', 4, '00a0e802-1a1a-46ef-9a13-e652a610a28e', 'PMD.ICT-MFR-2025.02.03-47614.13.20', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'User', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', '2025-02-03 14:02:21', 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-02-03 06:13:34', '2025-02-03 06:33:32', NULL, NULL, '2025-02-03 06:02:21', NULL, NULL, 'RETURNING TO SENDER', NULL, NULL, NULL, '2025-02-03 06:13:21', '2025-02-03 06:33:32'),
(5, 'bcc13fe4-b0b4-4a7e-936b-1ebf7b1dd8d8', 'TESTING', 4, '00a0e802-1a1a-46ef-9a13-e652a610a28e', 'PMD.ICT-MFR-2025.02.03-47614.13.20', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'Receiving and Releasing Clerk', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', 'FOR FINAL ACTION TESTING', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-02-03 06:35:53', NULL, '2025-02-03 06:45:58', NULL, NULL, NULL, NULL, 'FOR FINAL ACTION TESTING', 'FOR FINAL ACTION TESTING', NULL, NULL, '2025-02-03 06:33:32', '2025-02-03 06:45:58'),
(6, '9c81f165-6748-4eab-8653-ef4cfed6c489', 'TESTING', 5, 'cb8f01ff-b757-4ff0-9ba5-00ecb420bc51', 'PMD.ICT-MEMO-2025.02.03-47615.36.55', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'User', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', '2025-02-03 15:02:09', 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-02-03 07:38:12', '2025-02-03 08:22:45', NULL, NULL, '2025-02-03 07:02:09', NULL, NULL, 'TESTING ACTION UPLOAD', NULL, NULL, NULL, '2025-02-03 07:37:09', '2025-02-03 08:22:45'),
(7, '1ad32a50-811f-4116-8be4-08f94538b18e', 'TESTING', 6, '2dc38644-9978-4380-98bf-d90aeb44e595', 'PMD.ICT-MEMO-2025.02.03-47615.36.55', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'User', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', '2025-02-03 15:02:47', 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-02-06 06:00:54', NULL, NULL, NULL, '2025-02-03 07:02:47', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-03 07:41:47', '2025-02-06 06:00:54'),
(8, 'c4fc7ec4-5ed2-4f2d-84da-c4e9094a5c1a', 'TESTING', 6, '2dc38644-9978-4380-98bf-d90aeb44e595', 'PMD.ICT-MEMO-2025.02.03-47615.36.55', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'User', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, 4, '0e4f165f-d705-11ef-b430-3c7c3f2bc7d9', '2025-02-03 15:02:47', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-03 07:02:47', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-03 07:41:47', '2025-02-03 07:41:47'),
(9, '36fc17d7-93a0-4528-96ad-7e7b17470f0e', 'TESTING', 6, '2dc38644-9978-4380-98bf-d90aeb44e595', 'PMD.ICT-MEMO-2025.02.03-47615.36.55', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'User', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, 1, '0e4f0a5b-d705-11ef-b430-3c7c3f2bc7d9', '2025-02-03 15:02:47', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-03 07:02:47', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-03 07:41:47', '2025-02-03 07:41:47'),
(10, 'cf0e530e-02b9-4194-b290-2903060dd141', 'TESTING', 5, 'cb8f01ff-b757-4ff0-9ba5-00ecb420bc51', 'PMD.ICT-MEMO-2025.02.03-47615.36.55', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'Receiving and Releasing Clerk', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', 'TESTING ACTION UPLOAD', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-02-03 08:29:02', '2025-02-03 08:29:45', NULL, NULL, NULL, NULL, NULL, 'TESTING ACTION UPLOAD 2ND ATTEMPT', 'TESSTING', NULL, NULL, '2025-02-03 08:22:46', '2025-02-03 08:29:45'),
(11, '2a8b1f92-e6d6-46b2-8c14-7a659b2ca12e', 'TESTING', 5, 'cb8f01ff-b757-4ff0-9ba5-00ecb420bc51', 'PMD.ICT-MEMO-2025.02.03-47615.36.55', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'Receiving and Releasing Clerk', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', 'TESTING ACTION UPLOAD 2ND ATTEMPT', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-02-05 06:52:51', '2025-02-05 07:49:40', NULL, NULL, NULL, NULL, NULL, 'TESTING NEW FORMAT', 'TESSTING', NULL, NULL, '2025-02-03 08:29:45', '2025-02-05 07:49:40'),
(12, 'a4c3e1ba-f7dd-422b-ba1e-7d8ea0828e27', 'TESTING', 3, '2229f179-cd30-4f8e-9e16-c4102aabc805', 'PMD.ICT-DEC-2025.02.03-47614.13.11', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'Receiving and Releasing Clerk', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', 'FINAL ACTION', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-02-04 00:25:42', NULL, '2025-02-05 03:21:48', NULL, NULL, 'RECEIVING', NULL, 'FINAL ACTION', 'TESTING FINAL APPLICATION', NULL, NULL, '2025-02-03 08:53:36', '2025-02-05 03:21:48'),
(13, '7c0ee3b9-5e7d-48b0-b47a-21e353cfad84', 'TESTING IMAGE', 7, '1a6994f0-19cd-46f2-9abf-22b6e95cedf7', 'PMD.ICT-MEMO-2025.02.03-47616.56.21', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'User', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', 'WQE', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', '2025-02-03 16:02:46', 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-02-05 06:03:23', NULL, '2025-02-05 06:03:42', NULL, '2025-02-03 08:02:46', NULL, NULL, 'WQE', 'WQ', NULL, NULL, '2025-02-03 08:56:46', '2025-02-05 06:03:42'),
(14, '748813b5-f068-4013-bddb-ce9cdbd7d57e', 'TESTING IMAGE', 8, '02fbf931-cd67-4788-9c8c-df88a85f8c36', 'PMD.ICT-MEMO-2025.02.03-47616.56.21', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'User', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', 'TEST', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', '2025-02-03 16:02:06', 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-02-05 06:02:36', NULL, '2025-02-05 06:02:58', NULL, '2025-02-03 08:02:06', NULL, NULL, 'TEST', 'TEST123', NULL, NULL, '2025-02-03 08:57:06', '2025-02-05 06:02:58'),
(15, '45944fc8-54d0-4941-a0c3-5999b70e8588', 'TESTING IMAGE', 9, '921f166e-884b-4aba-87e5-7dd078cef9cf', 'PMD.ICT-MEMO-2025.02.03-47616.56.21', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'User', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', '2025-02-03 16:02:28', 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-02-04 02:24:04', '2025-02-04 08:40:06', NULL, NULL, '2025-02-03 08:02:28', NULL, NULL, 'RELEASE TO SELF', NULL, NULL, NULL, '2025-02-03 08:57:28', '2025-02-04 08:40:06'),
(16, '651ae837-23e8-409b-be0f-a2e8127a7c6d', 'TESTING AFFIDAVIT', 1, 'ff891a6d-58e2-4f1d-9446-1cb436c48f6a', 'PMD.ICT-AFFIDVT-2025.02.03-47614.11.52', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'Receiving and Releasing Clerk', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', 'TESTING FORWARD', 41, '0e4f2821-d705-11ef-b430-3c7c3f2bc7d9', NULL, 374, '5d2f1717-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-02-04 08:06:30', '2025-02-04 08:09:12', NULL, NULL, NULL, NULL, NULL, 'RETURNED TO ICT', NULL, NULL, NULL, '2025-02-04 08:00:22', '2025-02-04 08:09:12'),
(17, '4708da5c-cef4-4499-8e9e-ab7d842d31fe', 'TESTING AFFIDAVIT', 1, 'ff891a6d-58e2-4f1d-9446-1cb436c48f6a', 'PMD.ICT-AFFIDVT-2025.02.03-47614.11.52', NULL, 374, '5d2f1717-d6ff-11ef-b430-3c7c3f2bc7d9', 'Receiving and Releasing Clerk', 41, '0e4f2821-d705-11ef-b430-3c7c3f2bc7d9', 'FINAL ACTION UPLOADING TEST 2', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-02-05 05:55:23', NULL, '2025-02-05 05:55:55', NULL, NULL, NULL, NULL, 'FINAL ACTION UPLOADING TEST 2', 'FINAL ACTION UPLOADING TEST 2', NULL, NULL, '2025-02-04 08:09:12', '2025-02-05 05:55:55'),
(18, '36998fd7-b1ef-4269-93c9-bec006896986', 'TESTING IMAGE', 9, '921f166e-884b-4aba-87e5-7dd078cef9cf', 'PMD.ICT-MEMO-2025.02.03-47616.56.21', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'Receiving and Releasing Clerk', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', 'FINAL ACTION UPLOADING TEST', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-02-05 05:41:02', NULL, '2025-02-05 05:54:44', NULL, NULL, NULL, NULL, 'FINAL ACTION UPLOADING TEST', 'FINAL ACTION UPLOADING TEST', NULL, NULL, '2025-02-04 08:40:06', '2025-02-05 05:54:44'),
(19, 'e6b6410c-4064-4894-a609-49dc40a79f4c', 'FOR TESTING DATA CLEAR AFTER CREATE', 10, '8be22d1c-73f9-4339-8422-2f53df0ed85c', 'PMD.ICT-ANN_PROC-2025.02.05-47614.13.06', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'User', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', '2025-02-05 14:02:30', 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-02-06 05:32:14', NULL, NULL, NULL, '2025-02-05 06:02:30', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-05 06:13:30', '2025-02-06 05:32:14'),
(20, '040a3b57-b32a-4dd5-8da9-a9aa9f2960f1', 'TESTING CLEAR NEW DOCUMENT INPUT', 11, 'faa4ffc6-405b-42ef-83ee-752d3bde760e', 'PMD.ICT-MEMO-2025.02.05-47614.19.08', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'User', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', '2025-02-05 14:02:44', 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-02-05 06:24:09', '2025-02-06 03:23:56', NULL, NULL, '2025-02-05 06:02:44', NULL, NULL, 'INPUT 2', NULL, NULL, NULL, '2025-02-05 06:19:44', '2025-02-06 03:23:56'),
(21, 'fb508cf9-cd39-4908-842d-969f8b1c7ae1', 'THIS IS SUBJECT', 12, '2e2563ee-5349-4942-a197-1b7216db5f66', 'PMD.ICT-MEMO-2025.02.05-47614.28.14', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'User', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', '2025-02-05 14:02:22', 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-02-05 06:31:45', '2025-02-06 03:22:20', NULL, NULL, '2025-02-05 06:02:22', 'THIS IS A IN-TRANSIT REMARKS', NULL, 'SAMPLE TEST', NULL, NULL, NULL, '2025-02-05 06:28:22', '2025-02-06 03:22:20'),
(22, 'fafe6213-a36a-4d39-b6b0-66d56f53c0d7', 'THIS IS SUBJECT', 13, 'cd3e1f9a-f02f-448c-93c5-1bd474e48051', 'PMD.ICT-MEMO-2025.02.05-47614.43.06', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'User', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', 'ERROR IN THE ATTACHMENTS', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', '2025-02-05 14:02:29', 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-02-05 06:45:39', NULL, '2025-02-05 06:46:20', NULL, '2025-02-05 06:02:29', NULL, NULL, 'ERROR IN THE ATTACHMENTS', 'THIS IS AN ATTACHMENT REMARKS FOR ACTION', NULL, NULL, '2025-02-05 06:43:29', '2025-02-05 06:46:20'),
(23, 'fafcd8ed-4ba3-4079-8083-05936f22059d', 'THIS IS SUBJECT: SAMPLE ATTACHMENT REMARKS', 14, '8cf1ad34-9a18-4aa5-a680-3bef863f19d8', 'PMD.ICT-MEMO-2025.02.05-47614.47.00', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'User', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', 'TESTING', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', '2025-02-05 14:02:23', 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-02-05 07:21:26', NULL, '2025-02-05 07:25:00', NULL, '2025-02-05 06:02:23', 'IN TRANSIT REMARKS SAMPLE', NULL, 'TESTING', NULL, NULL, NULL, '2025-02-05 06:47:23', '2025-02-05 07:25:00'),
(24, '479ded5f-40b0-4df8-9455-de2f886b2252', 'TESTING', 5, 'cb8f01ff-b757-4ff0-9ba5-00ecb420bc51', 'PMD.ICT-MEMO-2025.02.03-47615.36.55', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'Receiving and Releasing Clerk', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', 'TESTING ARCHIVING FUNCTION', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-02-06 03:18:27', NULL, '2025-02-06 03:18:55', NULL, NULL, NULL, NULL, 'TESTING ARCHIVING FUNCTION', NULL, NULL, NULL, '2025-02-05 07:49:40', '2025-02-06 03:18:55'),
(25, '82f80387-f441-4096-8a80-c8c5173d6c28', 'TESTING USER ORIGIN INPUT', 15, 'e5b3e845-99c9-457f-9209-5c2a9b75658c', 'PMD.ICT-APP-2025.02.05-47616.05.41', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'User', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', '2025-02-05 16:02:14', 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-02-06 05:14:52', '2025-02-06 05:27:55', NULL, NULL, '2025-02-05 08:02:14', NULL, NULL, 'TESTING', NULL, NULL, NULL, '2025-02-05 08:06:14', '2025-02-06 05:27:55'),
(26, 'ab3e4118-0da1-4966-b104-53892700a471', 'THIS IS SUBJECT', 12, '2e2563ee-5349-4942-a197-1b7216db5f66', 'PMD.ICT-MEMO-2025.02.05-47614.28.14', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'Receiving and Releasing Clerk', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', 'SAMPLE TEST', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-02-06 03:25:26', NULL, NULL, NULL, NULL, 'TEST', NULL, NULL, NULL, NULL, NULL, '2025-02-06 03:22:21', '2025-02-06 03:25:26'),
(27, '503794cf-cc2e-42a5-ae20-76d709ea0bd9', 'TESTING CLEAR NEW DOCUMENT', 11, 'faa4ffc6-405b-42ef-83ee-752d3bde760e', 'PMD.ICT-MEMO-2025.02.05-47614.19.08', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'Receiving and Releasing Clerk', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', 'INPUT 2', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-02-06 03:46:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-06 03:23:56', '2025-02-06 03:46:34'),
(28, 'c0684ba1-1b9e-4c43-ba91-8f8cb890f927', 'TESTING USER ORIGIN INPUT', 15, 'e5b3e845-99c9-457f-9209-5c2a9b75658c', 'PMD.ICT-APP-2025.02.05-47616.05.41', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'Receiving and Releasing Clerk', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', 'TESTING', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-02-06 05:32:19', '2025-02-07 01:12:25', NULL, NULL, NULL, NULL, NULL, 'TEST FORWARD', 'TESTED', NULL, NULL, '2025-02-06 05:27:56', '2025-02-07 01:12:25'),
(29, '21a38f82-440b-45e6-b4fa-cc79aef1e54f', 'TESTING USER ORIGIN INPUT', 15, 'e5b3e845-99c9-457f-9209-5c2a9b75658c', 'PMD.ICT-APP-2025.02.05-47616.05.41', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'Receiving and Releasing Clerk', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', 'TEST FORWARD', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-03-13 03:03:17', NULL, NULL, NULL, NULL, 'TEST RECEIVED', NULL, NULL, 'TEST', NULL, NULL, '2025-02-07 01:12:26', '2025-03-13 03:03:17'),
(30, 'd6fbdbed-3c94-4594-8793-fa2c2ae967e1', 'TESTING DOCUMENT REMARKS', 16, 'e1f58e07-c26a-4e6b-837f-6558afd16ba0', 'PMD.ICT-ANN_PROC-2025.02.07-47609.46.57', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'User', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', '2025-02-07 09:02:17', 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-03-13 02:55:27', NULL, NULL, NULL, '2025-02-07 01:02:17', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-07 01:47:17', '2025-03-13 02:55:27'),
(31, '12b52b41-c6d4-4af6-aa31-404fca3afbc1', 'NOTICE OF MEETING FOR ICT SERVER REHABILITATION AND OFFICE CABLE NETWORKING IN THE DENR REGIONAL OFFICE V', 17, 'bebecbdb-c4af-4edb-bf41-62363fe3ff41', 'RV.RS-NTC-2025.02.07-31514.46.01', NULL, 315, '5d2f0acb-d6ff-11ef-b430-3c7c3f2bc7d9', 'User', 161, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', NULL, 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', '2025-02-07 14:02:03', 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-03-06 04:50:19', NULL, NULL, NULL, '2025-02-07 06:02:03', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-07 06:48:03', '2025-03-06 04:50:19'),
(32, 'b032f09a-cd10-46be-a4b9-cdf5a4e6e05b', 'TEST CREATE', 18, 'fc9c715c-5973-4fa1-a11c-8be41f148a27', 'PMD.ICT-NTC-2025.02.07-47617.01.53', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'User', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, 161, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', '2025-02-07 17:02:15', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-07 09:02:15', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-07 09:02:15', '2025-02-07 09:02:15'),
(65, '6bc3934b-019d-4988-b9e4-5649dc63cb61', 'THIS IS SUBJECT', 12, '2e2563ee-5349-4942-a197-1b7216db5f66', 'PMD.ICT-MEMO-2025.02.05-47614.28.14', NULL, NULL, NULL, 'offline user', NULL, '0e4f0a5b-d705-11ef-b430-3c7c3f2bc7d9', 'Testing uploading', NULL, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-03-04 02:41:00', '2025-03-04 08:29:00', NULL, NULL, NULL, NULL, NULL, '2025-03-04 16:29', NULL, '2025-03-05 07:12:00', NULL, '2025-03-05 07:12:00', '2025-03-05 07:12:00'),
(66, 'ae3959e2-3e1c-4398-9a76-169a8b36f222', 'SUBJECT', 19, '024d2fdc-e245-427b-bfe6-260c4ac182df', 'PMD.ICT-APP-2025.03.06-47610.37.30', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'User', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', '2025-03-06 10:03:18', 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-03-06 04:07:43', NULL, NULL, NULL, '2025-03-06 02:03:18', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-06 02:38:18', '2025-03-06 04:07:43'),
(67, 'c5b321fb-fc9a-4f84-a746-5d9b70a0a807', 'THIS IS SUBJECT', 12, '2e2563ee-5349-4942-a197-1b7216db5f66', 'PMD.ICT-MEMO-2025.02.05-47614.28.14', NULL, NULL, NULL, 'offline user', NULL, '0e4f165f-d705-11ef-b430-3c7c3f2bc7d9', 'Update 1 test edit', NULL, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-02-20 08:49:00', '2025-03-05 07:27:00', NULL, NULL, NULL, NULL, NULL, '2025-03-05 15:27', NULL, '2025-03-10 07:32:44', NULL, '2025-03-10 07:32:44', '2025-03-10 07:32:44'),
(68, '2846490d-7a0f-4d8e-81b3-3d69b05a94c4', 'THIS IS SUBJECT', 12, '2e2563ee-5349-4942-a197-1b7216db5f66', 'PMD.ICT-MEMO-2025.02.05-47614.28.14', NULL, NULL, NULL, 'offline user', NULL, '0e4f1788-d705-11ef-b430-3c7c3f2bc7d9', 'Third Sync test', NULL, '0e4f1788-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-03-10 07:33:00', '2025-03-10 07:56:00', NULL, NULL, NULL, NULL, NULL, '2025-03-10 15:56', NULL, '2025-03-10 07:56:27', NULL, '2025-03-10 07:56:27', '2025-03-10 07:56:27'),
(69, '41ac8cbe-1175-4b46-a390-142efc0e9ddc', 'THIS IS SUBJECT', 12, '2e2563ee-5349-4942-a197-1b7216db5f66', 'PMD.ICT-MEMO-2025.02.05-47614.28.14', NULL, NULL, NULL, 'offline user', NULL, '0e4f1788-d705-11ef-b430-3c7c3f2bc7d9', 'Testing sync 4', NULL, '0e4f194b-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-02-20 02:17:00', '2025-02-24 03:07:00', NULL, NULL, NULL, NULL, NULL, '2025-02-24 11:07', NULL, '2025-03-10 07:59:42', NULL, '2025-03-10 07:59:42', '2025-03-10 07:59:42'),
(70, 'd3e1280b-57df-479e-845c-77879e83a5bc', 'NOTICE OF MEETING FOR ICT SERVER REHABILITATION AND OFFICE CABLE NETWORKING IN THE DENR REGIONAL OFFICE V', 17, 'bebecbdb-c4af-4edb-bf41-62363fe3ff41', 'RV.RS-NTC-2025.02.07-31514.46.01', NULL, NULL, NULL, 'offline user', NULL, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', 'Tested', NULL, '0e4f1788-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-02-19 07:07:00', '2025-02-25 07:42:00', NULL, NULL, NULL, NULL, NULL, '2025-02-25 15:42', NULL, '2025-03-10 08:00:36', NULL, '2025-03-10 08:00:36', '2025-03-10 08:00:36'),
(71, 'cb395848-6900-481b-9bba-bf5188de9ad7', 'TESTING DOCUMENT', 20, '92f8ca9f-96cf-4ae5-a3b7-5dc917d4eb26', 'PMD.ICT-AFFIDVT-2025.03.11-47615.32.08', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'User', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', '2025-03-11 15:03:29', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-11 07:03:29', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-11 07:32:29', '2025-03-11 07:32:29'),
(72, 'be99f69d-dcdb-4156-9e05-21c5fc9247da', 'TEST APPLICATION', 21, '05e36df9-3dcc-49da-ac58-a6db262046f3', 'PMD.ICT-APP-2025.03.13-47611.03.36', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'User', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', 'NExt Action Created', NULL, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', '2025-03-13 11:03:21', NULL, '5d2f0acb-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-03-25 09:06:43', '2025-03-25 08:57:00', NULL, NULL, '2025-03-13 03:03:21', NULL, NULL, 'NExt Action Created', NULL, '2025-03-25 08:59:40', NULL, '2025-03-13 03:05:21', '2025-03-25 09:06:43'),
(73, '8b67ed9f-11f3-4c9c-b296-a94c79059b4c', 'TESTING NEW', 22, '6d4b1bb9-d67f-4bf5-9c6d-cd3b7b78e083', 'PMD.ICT-ANN_PROC-2025.03.17-47613.10.31', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'User', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', 'Testing only', NULL, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', '2025-03-17 13:03:57', NULL, '5d2f0acb-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-03-25 07:05:00', '2025-03-25 07:13:00', NULL, NULL, '2025-03-17 05:03:57', NULL, NULL, 'Testing only', NULL, '2025-03-25 07:29:08', NULL, '2025-03-17 05:10:57', '2025-03-25 07:29:08'),
(74, '411b0c6b-07ea-4524-94e9-b36fd6bffe61', 'TESTER', 23, '1ae78b47-926e-46df-a587-9a4ca07bb1e1', 'PMD.ICT-AFFIDVT-2025.03.17-47613.11.19', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'User', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', 'Test New', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', '2025-03-17 13:03:42', 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-03-18 08:39:53', '2025-04-08 03:11:55', NULL, NULL, '2025-03-17 05:03:42', 'WITH INTRANSIT REMARKS', NULL, 'Test New', NULL, NULL, NULL, '2025-03-17 05:11:42', '2025-04-08 03:11:55'),
(76, '363b1aa5-dc30-43e5-a303-ded665c3bb03', 'THIS IS SUBJECT', 12, '2e2563ee-5349-4942-a197-1b7216db5f66', 'PMD.ICT-MEMO-2025.02.05-47614.28.14', NULL, NULL, NULL, 'offline user', NULL, '0e4f0a5b-d705-11ef-b430-3c7c3f2bc7d9', 'TESTED AGAIN CHECKING ACTION', NULL, '0e4fa8f8-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-02-18 08:27:00', '2025-03-19 02:13:00', NULL, NULL, NULL, NULL, NULL, 'TESTED AGAIN CHECKING ACTION', NULL, '2025-03-19 02:13:59', NULL, '2025-03-19 02:13:59', '2025-03-19 02:13:59'),
(77, '81d6d936-9e96-4c79-b488-89f246d5168d', 'TEST APPLICATION', 21, '05e36df9-3dcc-49da-ac58-a6db262046f3', 'PMD.ICT-APP-2025.03.13-47611.03.36', NULL, NULL, NULL, 'offline user', NULL, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Testing Action Created', NULL, '2025-03-25 08:50:11', '2025-03-25 08:57:49', '2025-03-25 08:50:11', '2025-03-25 08:57:49'),
(78, '9b7cb825-f3d0-407c-a25b-5111616cf98c', 'TEST APPLICATION', 21, '05e36df9-3dcc-49da-ac58-a6db262046f3', 'PMD.ICT-APP-2025.03.13-47611.03.36', NULL, NULL, NULL, 'offline user', NULL, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', NULL, 315, '5d2f0acb-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-03-25 09:00:06', NULL, NULL, NULL, NULL, NULL, NULL, 'NExt Action Created', NULL, '2025-03-25 08:59:40', '2025-03-25 09:06:23', '2025-03-25 08:59:40', '2025-03-25 09:06:23'),
(79, '342350ae-4acb-4460-99a1-87ddfa7c9824', 'TEST APPLICATION', 21, '05e36df9-3dcc-49da-ac58-a6db262046f3', 'PMD.ICT-APP-2025.03.13-47611.03.36', NULL, NULL, NULL, 'offline user', NULL, '0e4f0a5b-d705-11ef-b430-3c7c3f2bc7d9', 'TESTED CREATED', NULL, NULL, NULL, NULL, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-03-25 10:52:15', '2025-03-25 09:06:00', NULL, NULL, NULL, NULL, NULL, 'TESTED CREATED', NULL, '2025-03-25 09:06:43', NULL, '2025-03-25 09:06:43', '2025-03-25 10:52:15'),
(80, '147347eb-3d79-4415-a691-5a776c70651d', 'TEST APPLICATION', 21, '05e36df9-3dcc-49da-ac58-a6db262046f3', 'PMD.ICT-APP-2025.03.13-47611.03.36', NULL, NULL, NULL, 'offline user', NULL, '0e4f0a5b-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TESTED CREATED', NULL, '2025-03-25 09:06:43', '2025-03-25 10:45:51', '2025-03-25 09:06:43', '2025-03-25 10:45:51'),
(87, '4f8df6dc-13c4-4225-9cbf-7ea2cbbe024b', 'TEST APPLICATION', 21, '05e36df9-3dcc-49da-ac58-a6db262046f3', 'PMD.ICT-APP-2025.03.13-47611.03.36', NULL, NULL, NULL, 'offline user', NULL, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', 'TESTED', NULL, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, '5d2f0acb-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-03-25 10:45:00', '2025-03-25 10:45:00', NULL, NULL, NULL, NULL, NULL, 'TESTED', NULL, '2025-03-25 10:52:15', NULL, '2025-03-25 10:52:15', '2025-03-25 10:52:15'),
(88, '7b75783e-85a9-454e-9169-56c54d6120c7', 'TEST APPLICATION', 21, '05e36df9-3dcc-49da-ac58-a6db262046f3', 'PMD.ICT-APP-2025.03.13-47611.03.36', NULL, NULL, NULL, 'offline user', NULL, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TESTED', NULL, '2025-03-25 10:52:15', NULL, '2025-03-25 10:52:15', '2025-03-25 10:52:15'),
(89, 'acf29f4a-338f-4bfe-a4c0-0bc60f717bd2', 'TESTED WITH COMPLIANCE DATE', 24, '7f08e2bb-fd69-4195-bd74-498937cac57d', 'PMD.ICT-MEMO-2025.04.04-47610.39.33', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'User', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', '2025-04-04 10:04:36', NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-04 02:04:36', NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-04 02:40:36', '2025-04-04 02:40:36'),
(105, '026c41a9-1618-423f-9abc-0f78e3522438', 'TESTER', 23, '1ae78b47-926e-46df-a587-9a4ca07bb1e1', 'PMD.ICT-AFFIDVT-2025.03.17-47613.11.19', NULL, NULL, NULL, 'offline user', NULL, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', 'ADD TAKEN', NULL, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, '5d2f0acb-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-04-08 03:11:00', '2025-04-08 03:11:00', NULL, NULL, NULL, NULL, NULL, 'ADD TAKEN', NULL, '2025-04-08 03:11:55', NULL, '2025-04-08 03:11:55', '2025-04-08 03:11:55'),
(108, 'fc214c6c-5156-432f-bc10-7df883ebb488', 'TESTER', 23, '1ae78b47-926e-46df-a587-9a4ca07bb1e1', 'PMD.ICT-AFFIDVT-2025.03.17-47613.11.19', NULL, NULL, NULL, 'offline user', NULL, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', 'The action continues to be performed offline.', NULL, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', NULL, 315, '5d2f0acb-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-04-08 03:18:53', '2025-04-08 03:19:33', NULL, NULL, NULL, NULL, NULL, 'The action continues to be performed offline.', NULL, NULL, NULL, '2025-04-08 03:16:52', '2025-04-08 03:19:33'),
(109, '01f49e48-0877-44d8-a46f-0d5212848b75', 'TESTER', 23, '1ae78b47-926e-46df-a587-9a4ca07bb1e1', 'PMD.ICT-AFFIDVT-2025.03.17-47613.11.19', NULL, NULL, NULL, 'offline user', NULL, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', 'TEsted 2319483209', NULL, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, '5d2f0acb-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-04-08 03:19:00', '2025-04-08 03:19:00', NULL, NULL, NULL, NULL, NULL, 'TEsted 2319483209', NULL, '2025-04-08 03:19:33', NULL, '2025-04-08 03:19:33', '2025-04-08 03:19:33'),
(110, '52e29982-8768-4f45-aafa-a2f07bcd6eb7', 'TESTER', 23, '1ae78b47-926e-46df-a587-9a4ca07bb1e1', 'PMD.ICT-AFFIDVT-2025.03.17-47613.11.19', NULL, NULL, NULL, 'offline user', NULL, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-08 03:19:33', NULL, '2025-04-08 03:19:33', '2025-04-08 03:19:33'),
(111, 'bd957562-dfa7-4727-a361-3be87e8c82a8', 'TESTED NEW FOR TESTING', 25, '1174453b-eb38-4ba9-ad6c-4627767b1b2f', 'RV.RS-MEMO-2025.04.08-31511.22.03', NULL, 315, '5d2f0acb-d6ff-11ef-b430-3c7c3f2bc7d9', 'User', 161, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', 'The action continues to be performed offline.', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', '2025-04-08 11:04:05', 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-04-08 03:37:09', '2025-04-08 03:41:10', NULL, NULL, '2025-04-08 03:04:05', NULL, NULL, 'The action continues to be performed offline.', NULL, NULL, NULL, '2025-04-08 03:22:05', '2025-04-08 03:41:10'),
(112, '487993bb-d674-4c0a-b7f9-a809e7a083d9', 'TESTED NEW FOR TESTING', 25, '1174453b-eb38-4ba9-ad6c-4627767b1b2f', 'RV.RS-MEMO-2025.04.08-31511.22.03', NULL, NULL, NULL, 'offline user', NULL, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', 'new action continued for backed to the records', NULL, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, '5d2f0acb-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-04-08 03:22:00', '2025-04-08 03:23:00', NULL, NULL, NULL, NULL, NULL, 'new action continued for backed to the records', NULL, '2025-04-08 03:41:10', NULL, '2025-04-08 03:41:10', '2025-04-08 03:41:10'),
(113, 'cbde9558-471d-4bdf-b2ec-c2c6fc6bb17f', 'TESTED NEW FOR TESTING', 25, '1174453b-eb38-4ba9-ad6c-4627767b1b2f', 'RV.RS-MEMO-2025.04.08-31511.22.03', NULL, NULL, NULL, 'offline user', NULL, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-08 03:41:10', NULL, '2025-04-08 03:41:10', '2025-04-08 03:41:10'),
(114, '316529e2-4073-45fb-be68-e8fa4ad5ddf4', 'FOR TESTING NEW', 26, 'a79bee10-d763-4d7f-af41-157229fa6c47', 'RV.RS-MEMO-2025.04.08-31511.56.38', NULL, 315, '5d2f0acb-d6ff-11ef-b430-3c7c3f2bc7d9', 'User', 161, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', 'The action continues to be performed offline.', 161, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', '2025-04-08 11:04:02', NULL, NULL, NULL, '2025-04-08 03:58:17', NULL, NULL, '2025-04-08 03:04:02', NULL, NULL, 'The action continues to be performed offline.', NULL, NULL, NULL, '2025-04-08 03:57:02', '2025-04-08 03:58:17'),
(115, '3b03df1a-934f-4af2-9ab5-167694c00fde', 'FOR TESTING NEW', 26, 'a79bee10-d763-4d7f-af41-157229fa6c47', 'RV.RS-MEMO-2025.04.08-31511.56.38', NULL, NULL, NULL, 'offline user', NULL, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', 'tested action offline', NULL, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, '5d2f0acb-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-04-08 03:57:00', '2025-04-08 03:58:00', NULL, NULL, NULL, NULL, NULL, 'tested action offline', NULL, '2025-04-08 03:58:17', NULL, '2025-04-08 03:58:17', '2025-04-08 03:58:17'),
(116, '5d239f44-a89a-4c36-b4e0-b5c329b7c85c', 'FOR TESTING NEW', 26, 'a79bee10-d763-4d7f-af41-157229fa6c47', 'RV.RS-MEMO-2025.04.08-31511.56.38', NULL, NULL, NULL, 'offline user', NULL, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-04-08 03:59:21', '2025-04-08 04:01:54', NULL, NULL, NULL, NULL, NULL, 'TO BE FORWARDED TO DIFFERENCE OFFICE', NULL, NULL, NULL, '2025-04-08 03:58:17', '2025-04-08 04:01:54'),
(117, '3f105e90-1593-4e4b-a8ad-3843d176f983', 'FOR TESTING NEW', 26, 'a79bee10-d763-4d7f-af41-157229fa6c47', 'RV.RS-MEMO-2025.04.08-31511.56.38', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'Receiving and Releasing Clerk', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', 'TO BE FORWARDED TO DIFFERENCE OFFICE', 41, '0e4f2821-d705-11ef-b430-3c7c3f2bc7d9', NULL, 374, '5d2f1717-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-04-08 04:02:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-08 04:01:54', '2025-04-08 04:02:36'),
(118, '4f6671c9-50f8-4d0a-8e26-e1788e69130d', 'SAMPLE DATA TO BE TESTED', 27, '65348809-2de4-4a48-9fba-9a30441f9a76', 'P.ALBAY-LTR_CORR-2025.04.08-37413.10.17', NULL, 374, '5d2f1717-d6ff-11ef-b430-3c7c3f2bc7d9', 'User', 41, '0e4f2821-d705-11ef-b430-3c7c3f2bc7d9', 'DATA IS BEING TESTED FOR OFFLINE ACTION', NULL, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', '2025-04-08 13:04:52', NULL, '5d2f0acb-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-04-08 05:11:00', '2025-04-08 05:12:00', NULL, NULL, '2025-04-08 05:04:52', NULL, NULL, 'DATA IS BEING TESTED FOR OFFLINE ACTION', NULL, '2025-04-08 05:12:32', NULL, '2025-04-08 05:10:52', '2025-04-08 05:12:32'),
(119, 'aa499d09-8b2b-447c-932c-df7d684e74fa', 'SAMPLE DATA TO BE TESTED', 27, '65348809-2de4-4a48-9fba-9a30441f9a76', 'P.ALBAY-LTR_CORR-2025.04.08-37413.10.17', NULL, NULL, NULL, 'offline user', NULL, '0e4f2821-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-08 05:12:32', '2025-04-08 05:16:34', '2025-04-08 05:12:32', '2025-04-08 05:16:34'),
(120, '4decf4e9-5656-44e5-81ea-93340ed12a43', 'SAMPLE DATA TO BE TESTED', 27, '65348809-2de4-4a48-9fba-9a30441f9a76', 'P.ALBAY-LTR_CORR-2025.04.08-37413.10.17', NULL, NULL, NULL, 'offline user', NULL, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', 'RETURNING TO PENRO ALBAY FOR FURTHER CHECKING OF ACTION', NULL, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-04-08 05:15:00', '2025-04-08 05:16:00', NULL, NULL, NULL, NULL, NULL, 'RETURNING TO PENRO ALBAY FOR FURTHER CHECKING OF ACTION', NULL, '2025-04-08 05:16:59', NULL, '2025-04-08 05:16:59', '2025-04-08 05:16:59'),
(121, '2d9c3a43-6e27-47a3-948e-f759390ba1da', 'SAMPLE DATA TO BE TESTED', 27, '65348809-2de4-4a48-9fba-9a30441f9a76', 'P.ALBAY-LTR_CORR-2025.04.08-37413.10.17', NULL, NULL, NULL, 'offline user', NULL, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', 'FORWARDING TO PENRO FOR APPROVAL', NULL, '0e4f9cfa-d705-11ef-b430-3c7c3f2bc7d9', NULL, 350, '5d2f123b-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-04-08 05:19:00', '2025-04-08 05:21:00', NULL, NULL, NULL, NULL, NULL, 'FORWARDING TO PENRO FOR APPROVAL', NULL, '2025-04-08 05:21:21', NULL, '2025-04-08 05:16:59', '2025-04-08 05:21:21'),
(122, '95276ff1-3435-4249-b8d0-91da5daaa0e7', 'SAMPLE DATA TO BE TESTED', 27, '65348809-2de4-4a48-9fba-9a30441f9a76', 'P.ALBAY-LTR_CORR-2025.04.08-37413.10.17', NULL, NULL, NULL, 'offline user', NULL, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, '0e4f2821-d705-11ef-b430-3c7c3f2bc7d9', NULL, 374, '5d2f1717-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-04-08 05:22:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-08 05:21:21', '2025-04-08 05:22:49'),
(123, '9d2248f9-66cf-4ad6-8875-236dc07c3a24', 'MEMORANDUM OF AGREEMENT', 28, '68dae1c6-3d6d-4bdb-88fe-566305ae53fe', 'RV.RS-MEMO-2025.04.08-31514.18.18', NULL, 315, '5d2f0acb-d6ff-11ef-b430-3c7c3f2bc7d9', 'User', 161, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', 'FORWARDED TO PENRO ALBAY', NULL, '0e4f9cfa-d705-11ef-b430-3c7c3f2bc7d9', '2025-04-08 14:04:33', NULL, '5d2f123b-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-04-08 06:18:00', '2025-04-08 06:23:00', NULL, NULL, '2025-04-08 06:04:33', NULL, NULL, 'FORWARDED TO PENRO ALBAY', NULL, '2025-04-08 06:24:05', NULL, '2025-04-08 06:18:33', '2025-04-08 06:24:05'),
(124, '6933109d-f93a-43a2-a9d1-db0ea6f97a29', 'MEMORANDUM OF AGREEMENT', 28, '68dae1c6-3d6d-4bdb-88fe-566305ae53fe', 'RV.RS-MEMO-2025.04.08-31514.18.18', NULL, NULL, NULL, 'offline user', NULL, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, '0e4f2821-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-08 06:24:05', NULL, '2025-04-08 06:24:05', '2025-04-08 06:24:05'),
(125, 'f8853424-45d0-4b3d-8ead-a6e84fa8a470', 'CREATED LETTER FOR ALBAY', 29, 'b13e7724-3e8d-414b-8ef3-e5c11083631c', 'RV.RS-LTR_CORR-2025.04.08-31514.29.20', NULL, 315, '5d2f0acb-d6ff-11ef-b430-3c7c3f2bc7d9', 'User', 161, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', 'The action continues to be performed offline.', 162, '0e4f9cfa-d705-11ef-b430-3c7c3f2bc7d9', '2025-04-08 14:04:43', 350, '5d2f123b-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-04-08 06:31:49', '2025-04-08 06:31:13', NULL, NULL, '2025-04-08 06:04:43', NULL, NULL, 'The action continues to be performed offline.', NULL, NULL, NULL, '2025-04-08 06:29:43', '2025-04-08 06:31:49'),
(126, 'f098e79a-eee9-4f85-8d64-11fcb3e5d1f8', 'CREATED LETTER FOR ALBAY', 29, 'b13e7724-3e8d-414b-8ef3-e5c11083631c', 'RV.RS-LTR_CORR-2025.04.08-31514.29.20', NULL, NULL, NULL, 'offline user', NULL, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', 'FORWARDED TO PENRO ALBAY', NULL, '0e4f9cfa-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, '5d2f123b-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-04-08 06:30:00', '2025-04-08 06:31:00', NULL, NULL, NULL, NULL, NULL, 'FORWARDED TO PENRO ALBAY', NULL, '2025-04-08 06:31:13', NULL, '2025-04-08 06:31:13', '2025-04-08 06:31:13'),
(127, '3e33fb63-5ed4-429f-8ae0-4b682f679cad', 'CREATED LETTER FOR ALBAY', 29, 'b13e7724-3e8d-414b-8ef3-e5c11083631c', 'RV.RS-LTR_CORR-2025.04.08-31514.29.20', NULL, NULL, NULL, 'offline user', NULL, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, '0e4f2821-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-08 06:31:13', NULL, '2025-04-08 06:31:13', '2025-04-08 06:31:13'),
(128, '3079551d-3977-4e50-9047-f0040f66a90d', 'TESTED', 30, '7e8a82ef-8615-494d-8e08-aa6fa8479bdb', 'RV.RS-TRVL_ORD-2025.04.08-31514.33.06', NULL, 315, '5d2f0acb-d6ff-11ef-b430-3c7c3f2bc7d9', 'User', 161, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', 'The action continues to be performed offline.', 162, '0e4f9cfa-d705-11ef-b430-3c7c3f2bc7d9', '2025-04-08 14:04:13', NULL, NULL, '2025-04-08 06:35:19', '2025-04-08 06:35:19', NULL, NULL, '2025-04-08 06:04:13', NULL, NULL, 'The action continues to be performed offline.', NULL, NULL, NULL, '2025-04-08 06:33:13', '2025-04-08 06:35:19'),
(129, 'c46c0e15-2c15-4f1f-bae8-1cd857bb682f', 'TESTED', 30, '7e8a82ef-8615-494d-8e08-aa6fa8479bdb', 'RV.RS-TRVL_ORD-2025.04.08-31514.33.06', NULL, NULL, NULL, 'offline user', NULL, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', 'FORWARD TO REGIONAL ICT SECTION', NULL, '0e4f9cfa-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, '5d2f123b-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-04-08 06:34:00', '2025-04-08 06:34:00', NULL, NULL, NULL, NULL, NULL, 'FORWARD TO REGIONAL ICT SECTION', NULL, '2025-04-08 06:35:19', NULL, '2025-04-08 06:35:19', '2025-04-08 06:35:19'),
(130, '43adf4e9-8b31-4744-b696-6cf632eb457a', 'TESTED', 30, '7e8a82ef-8615-494d-8e08-aa6fa8479bdb', 'RV.RS-TRVL_ORD-2025.04.08-31514.33.06', NULL, NULL, NULL, 'offline user', NULL, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-08 06:35:19', NULL, '2025-04-08 06:35:19', '2025-04-08 06:35:19');

-- --------------------------------------------------------

--
-- Table structure for table `redts_w_upload_size_limit`
--

CREATE TABLE `redts_w_upload_size_limit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size` bigint(20) NOT NULL COMMENT 'File size in Bytes',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redts_w_upload_size_limit`
--

INSERT INTO `redts_w_upload_size_limit` (`id`, `size`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 15725760, NULL, NULL, '2025-01-22 06:39:01');

-- --------------------------------------------------------

--
-- Table structure for table `redts_y_requirements`
--

CREATE TABLE `redts_y_requirements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subclass_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `attachment_type` varchar(255) NOT NULL DEFAULT 'file' COMMENT 'file, text, date',
  `requirement_type` varchar(255) NOT NULL COMMENT 'additional, required',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `redts_za_transaction_types`
--

CREATE TABLE `redts_za_transaction_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `transaction` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redts_za_transaction_types`
--

INSERT INTO `redts_za_transaction_types` (`id`, `uuid`, `transaction`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', 'Government to Government', 'G2G', NULL, '2023-09-07 17:00:42', '2023-09-07 17:00:42'),
(2, '4721520c-d70c-11ef-b430-3c7c3f2bc7d9', 'Government to Business', 'G2B', NULL, '2023-09-07 17:00:42', '2023-09-07 17:00:42'),
(3, '4721527e-d70c-11ef-b430-3c7c3f2bc7d9', 'Government to Citizen', 'G2C', NULL, '2023-09-07 17:00:42', '2023-09-07 17:00:42'),
(4, '472152c4-d70c-11ef-b430-3c7c3f2bc7d9', 'Government to Academe', 'G2A', NULL, '2024-04-23 09:01:45', '2024-04-23 09:01:45');

-- --------------------------------------------------------

--
-- Table structure for table `redts_zb_agencies`
--

CREATE TABLE `redts_zb_agencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agency` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redts_zb_agencies`
--

INSERT INTO `redts_zb_agencies` (`id`, `agency`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Department of Public Works and Highways', 'DPWH', NULL, '2023-09-07 16:49:35', '2023-09-07 16:49:35'),
(2, 'Department of Transportation', 'DOTR', NULL, '2023-09-07 16:49:35', '2023-09-07 16:49:35'),
(3, 'Department of Education', 'DepEd', NULL, '2023-09-07 16:49:35', '2023-09-07 16:49:35'),
(4, 'Department of Agriculture', 'DA', NULL, '2023-09-07 16:49:35', '2023-09-07 16:49:35'),
(5, 'Department of Health', 'DOH', NULL, '2023-09-07 16:49:35', '2023-09-07 16:49:35'),
(6, 'Commission on Higher Education', 'CHED', NULL, '2023-09-07 16:49:35', '2023-09-07 16:49:35'),
(7, 'Department of Energy', 'DOE', NULL, '2023-09-07 16:49:35', '2023-09-07 16:49:35'),
(8, 'National Irrigation Administration', 'NIA', NULL, '2023-09-07 16:49:35', '2023-09-07 16:49:35');

-- --------------------------------------------------------

--
-- Table structure for table `redts_zc_client_infos`
--

CREATE TABLE `redts_zc_client_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `sex` varchar(6) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verify` tinyint(4) NOT NULL DEFAULT 0,
  `contact_no` varchar(255) NOT NULL,
  `access_token` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `valid_id_front` varchar(255) DEFAULT NULL,
  `valid_id_back` varchar(255) DEFAULT NULL,
  `data_privacy_consent` tinyint(4) NOT NULL DEFAULT 0,
  `terms_of_reference` tinyint(4) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `redts_zd_client_doc_infos`
--

CREATE TABLE `redts_zd_client_doc_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `doc_no` varchar(255) NOT NULL DEFAULT 'unset',
  `application_type_id` bigint(20) UNSIGNED NOT NULL COMMENT 'applicant type',
  `application_type_uuid` char(36) NOT NULL COMMENT 'indicates released by',
  `transaction_type_id` bigint(20) UNSIGNED NOT NULL COMMENT 'transaction type',
  `transaction_type_uuid` char(36) NOT NULL COMMENT 'indicates released by',
  `agency` varchar(255) DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL COMMENT 'classification id',
  `class_uuid` char(36) NOT NULL COMMENT 'indicates released by',
  `class_slug` varchar(255) NOT NULL,
  `subclass_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subclass_slug` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL COMMENT 'This is initial action subject',
  `validated` tinyint(4) DEFAULT NULL,
  `confidential` tinyint(1) DEFAULT 0,
  `doc_date` datetime DEFAULT NULL,
  `compliance_deadline` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redts_zd_client_doc_infos`
--

INSERT INTO `redts_zd_client_doc_infos` (`id`, `uuid`, `doc_no`, `application_type_id`, `application_type_uuid`, `transaction_type_id`, `transaction_type_uuid`, `agency`, `client_id`, `class_id`, `class_uuid`, `class_slug`, `subclass_id`, `subclass_slug`, `remarks`, `validated`, `confidential`, `doc_date`, `compliance_deadline`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'ff891a6d-58e2-4f1d-9446-1cb436c48f6a', 'PMD.ICT-AFFIDVT-2025.02.03-47614.11.52', 1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', NULL, NULL, 8, '73e92c80-d88f-11ef-bf83-3c7c3f2bc7d9', 'affidvt', NULL, NULL, 'TESTING AFFIDAVIT', 1, 0, '2025-02-03 00:00:00', NULL, NULL, '2025-02-03 06:12:33', '2025-02-05 05:55:23'),
(2, '7d01283b-416b-43b3-b562-8652f0d56b79', 'PMD.ICT-MEMO-2025.02.03-47614.12.55', 1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', NULL, NULL, 31, '73e93387-d88f-11ef-bf83-3c7c3f2bc7d9', 'memo', NULL, NULL, 'TESTING', 1, 0, '2025-02-03 00:00:00', NULL, NULL, '2025-02-03 06:13:02', '2025-02-04 07:16:00'),
(3, '2229f179-cd30-4f8e-9e16-c4102aabc805', 'PMD.ICT-DEC-2025.02.03-47614.13.11', 1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', NULL, NULL, 15, '73e92eec-d88f-11ef-bf83-3c7c3f2bc7d9', 'dec', NULL, NULL, 'TESTING', 1, 0, '2025-02-03 00:00:00', NULL, NULL, '2025-02-03 06:13:13', '2025-02-04 00:25:42'),
(4, '00a0e802-1a1a-46ef-9a13-e652a610a28e', 'PMD.ICT-MFR-2025.02.03-47614.13.20', 1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', NULL, NULL, 33, '73e933f7-d88f-11ef-bf83-3c7c3f2bc7d9', 'mfr', NULL, NULL, 'TESTING', 1, 0, '2025-02-03 00:00:00', NULL, NULL, '2025-02-03 06:13:21', '2025-02-03 06:35:53'),
(5, 'cb8f01ff-b757-4ff0-9ba5-00ecb420bc51', 'PMD.ICT-MEMO-2025.02.03-47615.36.55', 1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', NULL, NULL, 31, '73e93387-d88f-11ef-bf83-3c7c3f2bc7d9', 'memo', NULL, NULL, NULL, 1, 0, '2025-02-03 00:00:00', NULL, NULL, '2025-02-03 07:37:09', '2025-02-06 03:18:27'),
(6, '2dc38644-9978-4380-98bf-d90aeb44e595', 'PMD.ICT-MEMO-2025.02.03-47615.36.55', 1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', NULL, NULL, 31, '73e93387-d88f-11ef-bf83-3c7c3f2bc7d9', 'memo', NULL, NULL, NULL, 1, 0, '2025-02-03 00:00:00', NULL, NULL, '2025-02-03 07:41:47', '2025-02-06 06:00:54'),
(7, '1a6994f0-19cd-46f2-9abf-22b6e95cedf7', 'PMD.ICT-MEMO-2025.02.03-47616.56.21', 1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', NULL, NULL, 31, '73e93387-d88f-11ef-bf83-3c7c3f2bc7d9', 'memo', NULL, NULL, 'TESTING IMAGE', 1, 0, '2025-02-03 00:00:00', NULL, NULL, '2025-02-03 08:56:46', '2025-02-05 06:03:23'),
(8, '02fbf931-cd67-4788-9c8c-df88a85f8c36', 'PMD.ICT-MEMO-2025.02.03-47616.56.21', 1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', NULL, NULL, 31, '73e93387-d88f-11ef-bf83-3c7c3f2bc7d9', 'memo', NULL, NULL, 'TESTING IMAGE', 1, 0, '2025-02-03 00:00:00', NULL, NULL, '2025-02-03 08:57:06', '2025-02-05 06:02:36'),
(9, '921f166e-884b-4aba-87e5-7dd078cef9cf', 'PMD.ICT-MEMO-2025.02.03-47616.56.21', 1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', NULL, NULL, 31, '73e93387-d88f-11ef-bf83-3c7c3f2bc7d9', 'memo', NULL, NULL, 'TESTING IMAGE', 1, 0, '2025-02-03 00:00:00', NULL, NULL, '2025-02-03 08:57:28', '2025-02-05 05:41:02'),
(10, '8be22d1c-73f9-4339-8422-2f53df0ed85c', 'PMD.ICT-ANN_PROC-2025.02.05-47614.13.06', 1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', NULL, NULL, 9, '73e92cfa-d88f-11ef-bf83-3c7c3f2bc7d9', 'ann_proc', NULL, NULL, NULL, 1, 0, '2025-02-05 00:00:00', NULL, NULL, '2025-02-05 06:13:30', '2025-02-06 05:32:14'),
(11, 'faa4ffc6-405b-42ef-83ee-752d3bde760e', 'PMD.ICT-MEMO-2025.02.05-47614.19.08', 1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', NULL, NULL, 31, '73e93387-d88f-11ef-bf83-3c7c3f2bc7d9', 'memo', NULL, NULL, NULL, 1, 0, '2025-02-05 00:00:00', NULL, NULL, '2025-02-05 06:19:44', '2025-02-06 03:46:34'),
(12, '2e2563ee-5349-4942-a197-1b7216db5f66', 'PMD.ICT-MEMO-2025.02.05-47614.28.14', 1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', NULL, NULL, 31, '73e93387-d88f-11ef-bf83-3c7c3f2bc7d9', 'memo', NULL, NULL, NULL, 1, 0, '2025-02-05 00:00:00', NULL, NULL, '2025-02-05 06:28:22', '2025-02-06 03:25:26'),
(13, 'cd3e1f9a-f02f-448c-93c5-1bd474e48051', 'PMD.ICT-MEMO-2025.02.05-47614.43.06', 1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', NULL, NULL, 31, '73e93387-d88f-11ef-bf83-3c7c3f2bc7d9', 'memo', NULL, NULL, NULL, 1, 0, '2025-02-05 00:00:00', NULL, NULL, '2025-02-05 06:43:29', '2025-02-05 06:45:39'),
(14, '8cf1ad34-9a18-4aa5-a680-3bef863f19d8', 'PMD.ICT-MEMO-2025.02.05-47614.47.00', 1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', NULL, NULL, 31, '73e93387-d88f-11ef-bf83-3c7c3f2bc7d9', 'memo', NULL, NULL, NULL, 1, 0, '2025-02-05 00:00:00', NULL, NULL, '2025-02-05 06:47:23', '2025-02-05 07:21:26'),
(15, 'e5b3e845-99c9-457f-9209-5c2a9b75658c', 'PMD.ICT-APP-2025.02.05-47616.05.41', 1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', NULL, NULL, 10, '73e92d81-d88f-11ef-bf83-3c7c3f2bc7d9', 'app', NULL, NULL, NULL, 1, 0, '2025-02-05 00:00:00', NULL, NULL, '2025-02-05 08:06:14', '2025-03-13 03:03:17'),
(16, 'e1f58e07-c26a-4e6b-837f-6558afd16ba0', 'PMD.ICT-ANN_PROC-2025.02.07-47609.46.57', 1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', NULL, NULL, 9, '73e92cfa-d88f-11ef-bf83-3c7c3f2bc7d9', 'ann_proc', NULL, NULL, NULL, 1, 0, '2025-02-07 00:00:00', '2025-02-27 00:00:00', NULL, '2025-02-07 01:47:17', '2025-03-13 02:55:27'),
(17, 'bebecbdb-c4af-4edb-bf41-62363fe3ff41', 'RV.RS-NTC-2025.02.07-31514.46.01', 1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', NULL, NULL, 34, '73e93431-d88f-11ef-bf83-3c7c3f2bc7d9', 'ntc', NULL, NULL, NULL, 1, 0, '2025-02-07 00:00:00', NULL, NULL, '2025-02-07 06:48:03', '2025-03-06 04:50:18'),
(18, 'fc9c715c-5973-4fa1-a11c-8be41f148a27', 'PMD.ICT-NTC-2025.02.07-47617.01.53', 1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', NULL, NULL, 34, '73e93431-d88f-11ef-bf83-3c7c3f2bc7d9', 'ntc', NULL, NULL, 'TEST CREATE', 1, 0, '2025-02-07 00:00:00', NULL, NULL, '2025-02-07 09:02:15', '2025-02-07 09:02:15'),
(19, '024d2fdc-e245-427b-bfe6-260c4ac182df', 'PMD.ICT-APP-2025.03.06-47610.37.30', 1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', NULL, NULL, 10, '73e92d81-d88f-11ef-bf83-3c7c3f2bc7d9', 'app', NULL, NULL, NULL, 1, 0, '2025-03-06 00:00:00', NULL, NULL, '2025-03-06 02:38:18', '2025-03-06 04:07:43'),
(20, '92f8ca9f-96cf-4ae5-a3b7-5dc917d4eb26', 'PMD.ICT-AFFIDVT-2025.03.11-47615.32.08', 1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', NULL, NULL, 8, '73e92c80-d88f-11ef-bf83-3c7c3f2bc7d9', 'affidvt', NULL, NULL, 'TESTING DOCUMENT', 1, 0, '2025-03-11 00:00:00', NULL, NULL, '2025-03-11 07:32:29', '2025-03-11 07:32:29'),
(21, '05e36df9-3dcc-49da-ac58-a6db262046f3', 'PMD.ICT-APP-2025.03.13-47611.03.36', 1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', NULL, NULL, 10, '73e92d81-d88f-11ef-bf83-3c7c3f2bc7d9', 'app', NULL, NULL, NULL, 1, 0, '2025-03-13 00:00:00', NULL, NULL, '2025-03-13 03:05:21', '2025-03-25 09:00:05'),
(22, '6d4b1bb9-d67f-4bf5-9c6d-cd3b7b78e083', 'PMD.ICT-ANN_PROC-2025.03.17-47613.10.31', 1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', NULL, NULL, 9, '73e92cfa-d88f-11ef-bf83-3c7c3f2bc7d9', 'ann_proc', NULL, NULL, 'TESTING NEW', 1, 0, '2025-03-17 00:00:00', NULL, NULL, '2025-03-17 05:10:57', '2025-03-17 05:10:57'),
(23, '1ae78b47-926e-46df-a587-9a4ca07bb1e1', 'PMD.ICT-AFFIDVT-2025.03.17-47613.11.19', 1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', NULL, NULL, 8, '73e92c80-d88f-11ef-bf83-3c7c3f2bc7d9', 'affidvt', NULL, NULL, NULL, 1, 0, '2025-03-17 00:00:00', NULL, NULL, '2025-03-17 05:11:42', '2025-04-08 03:18:53'),
(24, '7f08e2bb-fd69-4195-bd74-498937cac57d', 'PMD.ICT-MEMO-2025.04.04-47610.39.33', 1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', NULL, NULL, 31, '73e93387-d88f-11ef-bf83-3c7c3f2bc7d9', 'memo', NULL, NULL, 'TESTED WITH COMPLIANCE DATE', 1, 0, '2025-04-04 00:00:00', '2025-04-17 00:00:00', NULL, '2025-04-04 02:40:36', '2025-04-04 02:40:36'),
(25, '1174453b-eb38-4ba9-ad6c-4627767b1b2f', 'RV.RS-MEMO-2025.04.08-31511.22.03', 1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', NULL, NULL, 31, '73e93387-d88f-11ef-bf83-3c7c3f2bc7d9', 'memo', NULL, NULL, NULL, 1, 0, '2025-04-08 00:00:00', NULL, NULL, '2025-04-08 03:22:05', '2025-04-08 03:37:09'),
(26, 'a79bee10-d763-4d7f-af41-157229fa6c47', 'RV.RS-MEMO-2025.04.08-31511.56.38', 1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', NULL, NULL, 31, '73e93387-d88f-11ef-bf83-3c7c3f2bc7d9', 'memo', NULL, NULL, NULL, 1, 0, '2025-04-08 00:00:00', '2025-04-18 00:00:00', NULL, '2025-04-08 03:57:02', '2025-04-08 04:02:36'),
(27, '65348809-2de4-4a48-9fba-9a30441f9a76', 'P.ALBAY-LTR_CORR-2025.04.08-37413.10.17', 1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', NULL, NULL, 28, '73e932d9-d88f-11ef-bf83-3c7c3f2bc7d9', 'ltr_corr', NULL, NULL, NULL, 1, 0, '2025-04-08 00:00:00', NULL, NULL, '2025-04-08 05:10:52', '2025-04-08 05:22:49'),
(28, '68dae1c6-3d6d-4bdb-88fe-566305ae53fe', 'RV.RS-MEMO-2025.04.08-31514.18.18', 1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', NULL, NULL, 31, '73e93387-d88f-11ef-bf83-3c7c3f2bc7d9', 'memo', NULL, NULL, 'MEMORANDUM OF AGREEMENT', 1, 0, '2025-04-08 00:00:00', NULL, NULL, '2025-04-08 06:18:33', '2025-04-08 06:18:33'),
(29, 'b13e7724-3e8d-414b-8ef3-e5c11083631c', 'RV.RS-LTR_CORR-2025.04.08-31514.29.20', 1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', NULL, NULL, 28, '73e932d9-d88f-11ef-bf83-3c7c3f2bc7d9', 'ltr_corr', NULL, NULL, NULL, 1, 0, '2025-04-08 00:00:00', NULL, NULL, '2025-04-08 06:29:43', '2025-04-08 06:31:49'),
(30, '7e8a82ef-8615-494d-8e08-aa6fa8479bdb', 'RV.RS-TRVL_ORD-2025.04.08-31514.33.06', 1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', NULL, NULL, 47, '73e93795-d88f-11ef-bf83-3c7c3f2bc7d9', 'trvl_ord', NULL, NULL, 'TESTED', 1, 0, '2025-04-08 00:00:00', NULL, NULL, '2025-04-08 06:33:13', '2025-04-08 06:33:13');

-- --------------------------------------------------------

--
-- Table structure for table `redts_ze_client_doc_attachments`
--

CREATE TABLE `redts_ze_client_doc_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doc_info_id` bigint(20) UNSIGNED NOT NULL,
  `doc_info_uuid` char(36) DEFAULT NULL COMMENT 'indicates released by',
  `req_id` bigint(20) UNSIGNED DEFAULT NULL,
  `app_form_no` int(11) NOT NULL,
  `req_slug` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL DEFAULT 'n/a',
  `file_name` varchar(255) NOT NULL DEFAULT 'n/a',
  `file_link` varchar(255) NOT NULL DEFAULT 'n/a',
  `text_input` varchar(255) NOT NULL DEFAULT 'n/a',
  `attachment_type` varchar(255) NOT NULL DEFAULT 'file',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redts_ze_client_doc_attachments`
--

INSERT INTO `redts_ze_client_doc_attachments` (`id`, `doc_info_id`, `doc_info_uuid`, `req_id`, `app_form_no`, `req_slug`, `file_path`, `file_name`, `file_link`, `text_input`, `attachment_type`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'ff891a6d-58e2-4f1d-9446-1cb436c48f6a', NULL, 1, 'Attachment', 'doc_req_files', 'test_doc1 - Copy.pdf[202502031412]pdf', 'n/a', 'n/a', 'file', NULL, '2025-02-03 06:12:33', '2025-02-03 06:12:33'),
(2, 2, '7d01283b-416b-43b3-b562-8652f0d56b79', NULL, 1, 'Attachment', 'doc_req_files', 'test_doc1 - Copy.pdf[202502031413]pdf', 'n/a', 'n/a', 'file', NULL, '2025-02-03 06:13:02', '2025-02-03 06:13:02'),
(3, 3, '2229f179-cd30-4f8e-9e16-c4102aabc805', NULL, 1, 'Attachment', 'doc_req_files', 'test_doc1 - Copy.pdf[202502031413]pdf', 'n/a', 'n/a', 'file', NULL, '2025-02-03 06:13:13', '2025-02-03 06:13:13'),
(4, 4, '00a0e802-1a1a-46ef-9a13-e652a610a28e', NULL, 1, 'Attachment', 'doc_req_files', 'test_doc1 - Copy.pdf[202502031413]pdf', 'n/a', 'n/a', 'file', NULL, '2025-02-03 06:13:21', '2025-02-03 06:13:21'),
(5, 7, '1a6994f0-19cd-46f2-9abf-22b6e95cedf7', NULL, 1, 'Attachment', 'doc_req_files', 'gettyimages-1054147940-627235e01fb63b4644bec84204c259f0a343e35b.jpg[202502031656]jpg', 'n/a', 'n/a', 'file', NULL, '2025-02-03 08:56:46', '2025-02-03 08:56:46'),
(6, 8, '02fbf931-cd67-4788-9c8c-df88a85f8c36', NULL, 1, 'Attachment', 'doc_req_files', 'gettyimages-1054147940-627235e01fb63b4644bec84204c259f0a343e35b.jpg[202502031657]jpg', 'n/a', 'n/a', 'file', NULL, '2025-02-03 08:57:06', '2025-02-03 08:57:06'),
(7, 9, '921f166e-884b-4aba-87e5-7dd078cef9cf', NULL, 1, 'Attachment', 'doc_req_files', 'test_doc1.pdf[202502031657]pdf', 'n/a', 'n/a', 'file', NULL, '2025-02-03 08:57:28', '2025-02-03 08:57:28'),
(8, 10, '8be22d1c-73f9-4339-8422-2f53df0ed85c', NULL, 1, 'Attachment', 'doc_req_files', 'RFSOATS - Admin Dashboard users albay.pdf[202502051413]pdf', 'n/a', 'n/a', 'file', NULL, '2025-02-05 06:13:30', '2025-02-05 06:13:30'),
(9, 11, 'faa4ffc6-405b-42ef-83ee-752d3bde760e', NULL, 1, 'Attachment', 'doc_req_files', 'test_doc1.pdf[202502051419]pdf', 'n/a', 'n/a', 'file', NULL, '2025-02-05 06:19:44', '2025-02-05 06:19:44'),
(10, 11, 'faa4ffc6-405b-42ef-83ee-752d3bde760e', NULL, 1, 'Attachment', 'doc_req_files', 'RFSOATS - Admin Dashboard users albay.pdf[202502051419]pdf', 'n/a', 'n/a', 'file', NULL, '2025-02-05 06:19:44', '2025-02-05 06:19:44'),
(11, 13, 'cd3e1f9a-f02f-448c-93c5-1bd474e48051', NULL, 1, 'Attachment Remarks', 'n/a', 'n/a', 'n/a', 'THIS IS ATTACHMENT REMARKS', 'file', NULL, '2025-02-05 06:43:29', '2025-02-05 06:43:29'),
(12, 13, 'cd3e1f9a-f02f-448c-93c5-1bd474e48051', NULL, 1, 'Attachment', 'doc_req_files', 'test_doc1.pdf[202502051443]pdf', 'n/a', 'n/a', 'file', NULL, '2025-02-05 06:43:29', '2025-02-05 06:43:29'),
(13, 14, '8cf1ad34-9a18-4aa5-a680-3bef863f19d8', NULL, 1, 'Attachment Remarks', 'n/a', 'n/a', 'n/a', 'ATTACHMENT REMARKS HERE', 'text', NULL, '2025-02-05 06:47:23', '2025-02-05 06:47:23'),
(14, 15, 'e5b3e845-99c9-457f-9209-5c2a9b75658c', NULL, 1, 'Attachment Remarks', 'n/a', 'n/a', 'n/a', 'TESTING DOCUMENT ATTACHMENT REMARKS', 'text', NULL, '2025-02-05 08:06:14', '2025-02-05 08:06:14'),
(15, 15, 'e5b3e845-99c9-457f-9209-5c2a9b75658c', NULL, 1, 'Attachment', 'doc_req_files', 'test_doc1.pdf[202502051606]pdf', 'n/a', 'n/a', 'file', NULL, '2025-02-05 08:06:14', '2025-02-05 08:06:14'),
(16, 16, 'e1f58e07-c26a-4e6b-837f-6558afd16ba0', NULL, 1, 'Attachment Remarks', 'n/a', 'n/a', 'n/a', 'TEST ATTACHEMENT DETAILS', 'text', NULL, '2025-02-07 01:47:17', '2025-02-07 01:47:17'),
(17, 17, 'bebecbdb-c4af-4edb-bf41-62363fe3ff41', NULL, 1, 'Attachment Remarks', 'n/a', 'n/a', 'n/a', 'NONE', 'text', NULL, '2025-02-07 06:48:03', '2025-02-07 06:48:03'),
(18, 17, 'bebecbdb-c4af-4edb-bf41-62363fe3ff41', NULL, 1, 'Attachment', 'doc_req_files', 'Orange Simple Illustration Climate Change Infographic (8.5 x 13 in).pdf[202502071448]pdf', 'n/a', 'n/a', 'file', NULL, '2025-02-07 06:48:03', '2025-02-07 06:48:03'),
(19, 18, 'fc9c715c-5973-4fa1-a11c-8be41f148a27', NULL, 1, 'Attachment Remarks', 'n/a', 'n/a', 'n/a', 'TEST CREATE', 'text', NULL, '2025-02-07 09:02:15', '2025-02-07 09:02:15'),
(20, 19, '024d2fdc-e245-427b-bfe6-260c4ac182df', NULL, 1, 'Attachment Remarks', 'n/a', 'n/a', 'n/a', 'TEST', 'text', NULL, '2025-03-06 02:38:18', '2025-03-06 02:38:18'),
(21, 19, '024d2fdc-e245-427b-bfe6-260c4ac182df', NULL, 1, 'Attachment', 'doc_req_files', '2023 PBB Results and Isolation.pdf[202503061038]pdf', 'n/a', 'n/a', 'file', NULL, '2025-03-06 02:38:18', '2025-03-06 02:38:18'),
(22, 20, '92f8ca9f-96cf-4ae5-a3b7-5dc917d4eb26', NULL, 1, 'Attachment Remarks', 'n/a', 'n/a', 'n/a', 'TESTED', 'text', NULL, '2025-03-11 07:32:29', '2025-03-11 07:32:29'),
(23, 21, '05e36df9-3dcc-49da-ac58-a6db262046f3', NULL, 1, 'Attachment Remarks', 'n/a', 'n/a', 'n/a', 'TESTING ONLY', 'text', NULL, '2025-03-13 03:05:21', '2025-03-13 03:05:21'),
(24, 22, '6d4b1bb9-d67f-4bf5-9c6d-cd3b7b78e083', NULL, 1, 'Attachment Remarks', 'n/a', 'n/a', 'n/a', 'TESTING ONLY', 'text', NULL, '2025-03-17 05:10:57', '2025-03-17 05:10:57'),
(25, 23, '1ae78b47-926e-46df-a587-9a4ca07bb1e1', NULL, 1, 'Attachment Remarks', 'n/a', 'n/a', 'n/a', 'TEST', 'text', NULL, '2025-03-17 05:11:42', '2025-03-17 05:11:42'),
(26, 24, '7f08e2bb-fd69-4195-bd74-498937cac57d', NULL, 1, 'Attachment Remarks', 'n/a', 'n/a', 'n/a', 'FOP TESTED', 'text', NULL, '2025-04-04 02:40:36', '2025-04-04 02:40:36'),
(27, 24, '7f08e2bb-fd69-4195-bd74-498937cac57d', NULL, 1, 'Attachment', 'doc_req_files', 'Minutes of the Expanded EXECOM Meeting Feb. 12, 2024.PDF[202504041040]PDF', 'n/a', 'n/a', 'file', NULL, '2025-04-04 02:40:36', '2025-04-04 02:40:36'),
(28, 25, '1174453b-eb38-4ba9-ad6c-4627767b1b2f', NULL, 1, 'Attachment Remarks', 'n/a', 'n/a', 'n/a', 'TESTED', 'text', NULL, '2025-04-08 03:22:05', '2025-04-08 03:22:05'),
(29, 26, 'a79bee10-d763-4d7f-af41-157229fa6c47', NULL, 1, 'Attachment Remarks', 'n/a', 'n/a', 'n/a', 'TESTED', 'text', NULL, '2025-04-08 03:57:02', '2025-04-08 03:57:02'),
(30, 27, '65348809-2de4-4a48-9fba-9a30441f9a76', NULL, 1, 'Attachment Remarks', 'n/a', 'n/a', 'n/a', 'SAMPLE ONLY', 'text', NULL, '2025-04-08 05:10:52', '2025-04-08 05:10:52'),
(31, 28, '68dae1c6-3d6d-4bdb-88fe-566305ae53fe', NULL, 1, 'Attachment Remarks', 'n/a', 'n/a', 'n/a', 'FOR TESTING', 'text', NULL, '2025-04-08 06:18:33', '2025-04-08 06:18:33'),
(32, 29, 'b13e7724-3e8d-414b-8ef3-e5c11083631c', NULL, 1, 'Attachment Remarks', 'n/a', 'n/a', 'n/a', 'TESTING', 'text', NULL, '2025-04-08 06:29:43', '2025-04-08 06:29:43'),
(33, 30, '7e8a82ef-8615-494d-8e08-aa6fa8479bdb', NULL, 1, 'Attachment Remarks', 'n/a', 'n/a', 'n/a', 'TESTED', 'text', NULL, '2025-04-08 06:33:13', '2025-04-08 06:33:13');

-- --------------------------------------------------------

--
-- Table structure for table `redts_zfa_additional_oops`
--

CREATE TABLE `redts_zfa_additional_oops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doc_id` bigint(20) UNSIGNED NOT NULL,
  `creator_id` bigint(20) UNSIGNED NOT NULL,
  `header_title` varchar(255) DEFAULT NULL,
  `header_address` varchar(255) DEFAULT NULL,
  `or_no` varchar(255) DEFAULT NULL,
  `or_no_dated` date DEFAULT NULL,
  `pay_amount` double(10,2) DEFAULT NULL,
  `purpose` varchar(255) DEFAULT NULL,
  `clerk_fullname` varchar(255) DEFAULT NULL,
  `prepared_by_position` varchar(255) DEFAULT NULL,
  `approving_remarks` varchar(255) DEFAULT NULL,
  `approving_fullname` varchar(255) DEFAULT NULL,
  `approving_position` varchar(255) DEFAULT NULL,
  `per_bill_no` varchar(255) DEFAULT NULL,
  `per_bill_no_dated` date DEFAULT NULL,
  `bank_no` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `redts_zf_order_of_payments`
--

CREATE TABLE `redts_zf_order_of_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doc_id` bigint(20) UNSIGNED NOT NULL,
  `creator_id` bigint(20) UNSIGNED NOT NULL,
  `order_of_payment` varchar(255) DEFAULT NULL,
  `payment_receipt` varchar(255) DEFAULT NULL,
  `payment_receipt_date` timestamp NULL DEFAULT NULL,
  `header_title` varchar(255) DEFAULT NULL,
  `header_address` varchar(255) DEFAULT NULL,
  `or_no` varchar(255) DEFAULT NULL,
  `or_no_dated` date DEFAULT NULL,
  `pay_amount` double(10,2) DEFAULT NULL,
  `clerk_fullname` varchar(255) DEFAULT NULL,
  `prepared_by_position` varchar(255) DEFAULT NULL,
  `approving_remarks` varchar(255) DEFAULT NULL,
  `approving_fullname` varchar(255) DEFAULT NULL,
  `approving_position` varchar(255) DEFAULT NULL,
  `per_bill_no` varchar(255) DEFAULT NULL,
  `per_bill_no_dated` date DEFAULT NULL,
  `bank_no` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `verified` tinyint(4) NOT NULL DEFAULT 0,
  `time_verified` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `purpose` varchar(255) DEFAULT NULL COMMENT 'the reason for the request of payment'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `redts_zga_other_pymnt_cost_brkdwns`
--

CREATE TABLE `redts_zga_other_pymnt_cost_brkdwns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doc_id` bigint(20) UNSIGNED NOT NULL,
  `ofp_id` bigint(20) UNSIGNED NOT NULL,
  `cost_breakdown_amount` double(10,2) NOT NULL,
  `cost_breakdown` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `redts_zg_payment_cost_breakdowns`
--

CREATE TABLE `redts_zg_payment_cost_breakdowns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doc_id` bigint(20) UNSIGNED NOT NULL,
  `ofp_id` bigint(20) UNSIGNED NOT NULL,
  `cost_breakdown_amount` double(10,2) NOT NULL,
  `cost_breakdown` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `redts_zh_cert_perm_routes`
--

CREATE TABLE `redts_zh_cert_perm_routes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_class_id` bigint(20) UNSIGNED NOT NULL,
  `route` varchar(255) NOT NULL COMMENT 'url of the create template permit or certificate',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `redts_zi_origin_offices`
--

CREATE TABLE `redts_zi_origin_offices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL COMMENT 'user id',
  `user_uuid` char(36) DEFAULT NULL COMMENT 'user uuid',
  `doc_id` bigint(20) UNSIGNED NOT NULL COMMENT 'zd_client_doc_infos',
  `doc_uuid` char(36) DEFAULT NULL COMMENT 'indicates released by',
  `origin_office_id` bigint(20) UNSIGNED NOT NULL COMMENT 'f_offices',
  `origin_office_uuid` char(36) DEFAULT NULL COMMENT 'indicates released by',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redts_zi_origin_offices`
--

INSERT INTO `redts_zi_origin_offices` (`id`, `user_id`, `user_uuid`, `doc_id`, `doc_uuid`, `origin_office_id`, `origin_office_uuid`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 1, 'ff891a6d-58e2-4f1d-9446-1cb436c48f6a', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-02-03 06:12:33', '2025-02-03 06:12:33'),
(2, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 2, '7d01283b-416b-43b3-b562-8652f0d56b79', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-02-03 06:13:02', '2025-02-03 06:13:02'),
(3, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 3, '2229f179-cd30-4f8e-9e16-c4102aabc805', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-02-03 06:13:13', '2025-02-03 06:13:13'),
(4, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 4, '00a0e802-1a1a-46ef-9a13-e652a610a28e', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-02-03 06:13:21', '2025-02-03 06:13:21'),
(5, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 5, 'cb8f01ff-b757-4ff0-9ba5-00ecb420bc51', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-02-03 07:37:09', '2025-02-03 07:37:09'),
(6, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 6, '2dc38644-9978-4380-98bf-d90aeb44e595', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-02-03 07:41:47', '2025-02-03 07:41:47'),
(7, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 6, '2dc38644-9978-4380-98bf-d90aeb44e595', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-02-03 07:41:47', '2025-02-03 07:41:47'),
(8, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 6, '2dc38644-9978-4380-98bf-d90aeb44e595', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-02-03 07:41:47', '2025-02-03 07:41:47'),
(9, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 7, '1a6994f0-19cd-46f2-9abf-22b6e95cedf7', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-02-03 08:56:46', '2025-02-03 08:56:46'),
(10, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 8, '02fbf931-cd67-4788-9c8c-df88a85f8c36', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-02-03 08:57:06', '2025-02-03 08:57:06'),
(11, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 9, '921f166e-884b-4aba-87e5-7dd078cef9cf', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-02-03 08:57:28', '2025-02-03 08:57:28'),
(12, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 10, '8be22d1c-73f9-4339-8422-2f53df0ed85c', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-02-05 06:13:30', '2025-02-05 06:13:30'),
(13, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 11, 'faa4ffc6-405b-42ef-83ee-752d3bde760e', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-02-05 06:19:44', '2025-02-05 06:19:44'),
(14, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 12, '2e2563ee-5349-4942-a197-1b7216db5f66', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-02-05 06:28:22', '2025-02-05 06:28:22'),
(15, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 13, 'cd3e1f9a-f02f-448c-93c5-1bd474e48051', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-02-05 06:43:29', '2025-02-05 06:43:29'),
(16, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 14, '8cf1ad34-9a18-4aa5-a680-3bef863f19d8', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-02-05 06:47:23', '2025-02-05 06:47:23'),
(17, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 15, 'e5b3e845-99c9-457f-9209-5c2a9b75658c', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-02-05 08:06:14', '2025-02-05 08:06:14'),
(18, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 16, 'e1f58e07-c26a-4e6b-837f-6558afd16ba0', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-02-07 01:47:17', '2025-02-07 01:47:17'),
(19, 315, '5d2f0acb-d6ff-11ef-b430-3c7c3f2bc7d9', 17, 'bebecbdb-c4af-4edb-bf41-62363fe3ff41', 161, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-02-07 06:48:03', '2025-02-07 06:48:03'),
(20, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 18, 'fc9c715c-5973-4fa1-a11c-8be41f148a27', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-02-07 09:02:15', '2025-02-07 09:02:15'),
(21, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 19, '024d2fdc-e245-427b-bfe6-260c4ac182df', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-03-06 02:38:18', '2025-03-06 02:38:18'),
(22, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 20, '92f8ca9f-96cf-4ae5-a3b7-5dc917d4eb26', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-03-11 07:32:29', '2025-03-11 07:32:29'),
(23, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 21, '05e36df9-3dcc-49da-ac58-a6db262046f3', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-03-13 03:05:21', '2025-03-13 03:05:21'),
(24, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 22, '6d4b1bb9-d67f-4bf5-9c6d-cd3b7b78e083', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-03-17 05:10:57', '2025-03-17 05:10:57'),
(25, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 23, '1ae78b47-926e-46df-a587-9a4ca07bb1e1', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-03-17 05:11:42', '2025-03-17 05:11:42'),
(26, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 24, '7f08e2bb-fd69-4195-bd74-498937cac57d', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-04-04 02:40:36', '2025-04-04 02:40:36'),
(27, 315, '5d2f0acb-d6ff-11ef-b430-3c7c3f2bc7d9', 25, '1174453b-eb38-4ba9-ad6c-4627767b1b2f', 161, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-04-08 03:22:05', '2025-04-08 03:22:05'),
(28, 315, '5d2f0acb-d6ff-11ef-b430-3c7c3f2bc7d9', 26, 'a79bee10-d763-4d7f-af41-157229fa6c47', 161, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-04-08 03:57:02', '2025-04-08 03:57:02'),
(29, 374, '5d2f1717-d6ff-11ef-b430-3c7c3f2bc7d9', 27, '65348809-2de4-4a48-9fba-9a30441f9a76', 41, '0e4f2821-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-04-08 05:10:52', '2025-04-08 05:10:52'),
(30, 315, '5d2f0acb-d6ff-11ef-b430-3c7c3f2bc7d9', 28, '68dae1c6-3d6d-4bdb-88fe-566305ae53fe', 161, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-04-08 06:18:33', '2025-04-08 06:18:33'),
(31, 315, '5d2f0acb-d6ff-11ef-b430-3c7c3f2bc7d9', 29, 'b13e7724-3e8d-414b-8ef3-e5c11083631c', 161, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-04-08 06:29:43', '2025-04-08 06:29:43'),
(32, 315, '5d2f0acb-d6ff-11ef-b430-3c7c3f2bc7d9', 30, '7e8a82ef-8615-494d-8e08-aa6fa8479bdb', 161, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-04-08 06:33:13', '2025-04-08 06:33:13');

-- --------------------------------------------------------

--
-- Table structure for table `redts_zj_user_oop_approvees`
--

CREATE TABLE `redts_zj_user_oop_approvees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `approvee_fullname` varchar(255) NOT NULL,
  `approvee_position` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `redts_z_applicant_types`
--

CREATE TABLE `redts_z_applicant_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_uuid` char(36) DEFAULT NULL COMMENT 'indicates released by',
  `applicant` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redts_z_applicant_types`
--

INSERT INTO `redts_z_applicant_types` (`id`, `uuid`, `transaction_id`, `transaction_uuid`, `applicant`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', 'Government Agencies', NULL, '2023-09-07 17:14:36', '2023-09-07 17:14:36'),
(2, '07f8ad94-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', 'Local Government Units', '2023-10-25 06:16:14', '2023-09-07 17:14:36', '2023-09-07 17:14:36'),
(3, '07f8ae01-d70c-11ef-b430-3c7c3f2bc7d9', 2, '4721520c-d70c-11ef-b430-3c7c3f2bc7d9', 'Business', NULL, '2023-09-07 17:14:36', '2023-09-07 17:14:36'),
(4, '07f8ae49-d70c-11ef-b430-3c7c3f2bc7d9', 3, '4721527e-d70c-11ef-b430-3c7c3f2bc7d9', 'School', '2023-10-25 06:16:21', '2023-09-07 17:14:36', '2023-09-07 17:14:36'),
(5, '07f8ae82-d70c-11ef-b430-3c7c3f2bc7d9', 3, '4721527e-d70c-11ef-b430-3c7c3f2bc7d9', 'Citizen', NULL, '2023-09-07 17:14:36', '2023-09-07 17:14:36'),
(6, '07f8aeba-d70c-11ef-b430-3c7c3f2bc7d9', 4, '472152c4-d70c-11ef-b430-3c7c3f2bc7d9', 'Citizen (Academe)', NULL, '2024-04-23 09:02:53', '2024-04-23 09:02:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redts_a_accesss`
--
ALTER TABLE `redts_a_accesss`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`);

--
-- Indexes for table `redts_ba_view_reqs_specs`
--
ALTER TABLE `redts_ba_view_reqs_specs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `redts_ba_view_reqs_specs_user_id_foreign` (`user_id`),
  ADD KEY `redts_ba_view_reqs_specs_office_id_foreign` (`office_id`);

--
-- Indexes for table `redts_b_user`
--
ALTER TABLE `redts_b_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `redts_b_user_username_unique` (`username`),
  ADD UNIQUE KEY `uuid` (`uuid`),
  ADD UNIQUE KEY `redts_b_user_email_unique` (`email`);

--
-- Indexes for table `redts_d_profile`
--
ALTER TABLE `redts_d_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redts_ee_classification`
--
ALTER TABLE `redts_ee_classification`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD UNIQUE KEY `uuid` (`uuid`);

--
-- Indexes for table `redts_e_region`
--
ALTER TABLE `redts_e_region`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `redts_e_region_region_unique` (`region`);

--
-- Indexes for table `redts_f_offices`
--
ALTER TABLE `redts_f_offices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`);

--
-- Indexes for table `redts_g_carousel_imgs`
--
ALTER TABLE `redts_g_carousel_imgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redts_j_user_offices`
--
ALTER TABLE `redts_j_user_offices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redts_la_process_lengths`
--
ALTER TABLE `redts_la_process_lengths`
  ADD PRIMARY KEY (`id`),
  ADD KEY `redts_la_process_lengths_subclass_id_foreign` (`subclass_id`);

--
-- Indexes for table `redts_lc_rstct_sbmsn_of_reqs`
--
ALTER TABLE `redts_lc_rstct_sbmsn_of_reqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `redts_lc_rstct_sbmsn_of_reqs_subclass_id_foreign` (`subclass_id`),
  ADD KEY `redts_lc_rstct_sbmsn_of_reqs_rstd_office_id_foreign` (`rstd_office_id`);

--
-- Indexes for table `redts_le_subclass_fees`
--
ALTER TABLE `redts_le_subclass_fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `redts_le_subclass_fees_subclass_id_foreign` (`subclass_id`);

--
-- Indexes for table `redts_l_sub_class`
--
ALTER TABLE `redts_l_sub_class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `redts_l_sub_class_classification_id_foreign` (`classification_id`);

--
-- Indexes for table `redts_na_action_attachments`
--
ALTER TABLE `redts_na_action_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redts_nb_releasing_routes`
--
ALTER TABLE `redts_nb_releasing_routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redts_nc_act_seens`
--
ALTER TABLE `redts_nc_act_seens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redts_n_actions`
--
ALTER TABLE `redts_n_actions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`);

--
-- Indexes for table `redts_w_upload_size_limit`
--
ALTER TABLE `redts_w_upload_size_limit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redts_y_requirements`
--
ALTER TABLE `redts_y_requirements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redts_za_transaction_types`
--
ALTER TABLE `redts_za_transaction_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`);

--
-- Indexes for table `redts_zb_agencies`
--
ALTER TABLE `redts_zb_agencies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `redts_zb_agencies_slug_unique` (`slug`);

--
-- Indexes for table `redts_zc_client_infos`
--
ALTER TABLE `redts_zc_client_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redts_zd_client_doc_infos`
--
ALTER TABLE `redts_zd_client_doc_infos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`);

--
-- Indexes for table `redts_ze_client_doc_attachments`
--
ALTER TABLE `redts_ze_client_doc_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redts_zfa_additional_oops`
--
ALTER TABLE `redts_zfa_additional_oops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `redts_zfa_additional_oops_doc_id_foreign` (`doc_id`),
  ADD KEY `redts_zfa_additional_oops_creator_id_foreign` (`creator_id`);

--
-- Indexes for table `redts_zf_order_of_payments`
--
ALTER TABLE `redts_zf_order_of_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `redts_zf_order_of_payments_doc_id_foreign` (`doc_id`),
  ADD KEY `redts_zf_order_of_payments_creator_id_foreign` (`creator_id`);

--
-- Indexes for table `redts_zga_other_pymnt_cost_brkdwns`
--
ALTER TABLE `redts_zga_other_pymnt_cost_brkdwns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `redts_zga_other_pymnt_cost_brkdwns_doc_id_foreign` (`doc_id`),
  ADD KEY `redts_zga_other_pymnt_cost_brkdwns_ofp_id_foreign` (`ofp_id`);

--
-- Indexes for table `redts_zg_payment_cost_breakdowns`
--
ALTER TABLE `redts_zg_payment_cost_breakdowns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `redts_zg_payment_cost_breakdowns_doc_id_foreign` (`doc_id`),
  ADD KEY `redts_zg_payment_cost_breakdowns_ofp_id_foreign` (`ofp_id`);

--
-- Indexes for table `redts_zh_cert_perm_routes`
--
ALTER TABLE `redts_zh_cert_perm_routes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `redts_zh_cert_perm_routes_sub_class_id_foreign` (`sub_class_id`);

--
-- Indexes for table `redts_zi_origin_offices`
--
ALTER TABLE `redts_zi_origin_offices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_uuid` (`user_uuid`);

--
-- Indexes for table `redts_zj_user_oop_approvees`
--
ALTER TABLE `redts_zj_user_oop_approvees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `redts_zj_user_oop_approvees_user_id_foreign` (`user_id`);

--
-- Indexes for table `redts_z_applicant_types`
--
ALTER TABLE `redts_z_applicant_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`),
  ADD KEY `transaction_uuid_cons` (`transaction_uuid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `redts_a_accesss`
--
ALTER TABLE `redts_a_accesss`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `redts_ba_view_reqs_specs`
--
ALTER TABLE `redts_ba_view_reqs_specs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `redts_b_user`
--
ALTER TABLE `redts_b_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=477;

--
-- AUTO_INCREMENT for table `redts_d_profile`
--
ALTER TABLE `redts_d_profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=462;

--
-- AUTO_INCREMENT for table `redts_ee_classification`
--
ALTER TABLE `redts_ee_classification`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `redts_e_region`
--
ALTER TABLE `redts_e_region`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `redts_f_offices`
--
ALTER TABLE `redts_f_offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `redts_g_carousel_imgs`
--
ALTER TABLE `redts_g_carousel_imgs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `redts_j_user_offices`
--
ALTER TABLE `redts_j_user_offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=466;

--
-- AUTO_INCREMENT for table `redts_la_process_lengths`
--
ALTER TABLE `redts_la_process_lengths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `redts_lc_rstct_sbmsn_of_reqs`
--
ALTER TABLE `redts_lc_rstct_sbmsn_of_reqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `redts_le_subclass_fees`
--
ALTER TABLE `redts_le_subclass_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `redts_l_sub_class`
--
ALTER TABLE `redts_l_sub_class`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `redts_na_action_attachments`
--
ALTER TABLE `redts_na_action_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `redts_nb_releasing_routes`
--
ALTER TABLE `redts_nb_releasing_routes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `redts_nc_act_seens`
--
ALTER TABLE `redts_nc_act_seens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `redts_n_actions`
--
ALTER TABLE `redts_n_actions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `redts_w_upload_size_limit`
--
ALTER TABLE `redts_w_upload_size_limit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `redts_y_requirements`
--
ALTER TABLE `redts_y_requirements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `redts_za_transaction_types`
--
ALTER TABLE `redts_za_transaction_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `redts_zb_agencies`
--
ALTER TABLE `redts_zb_agencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `redts_zc_client_infos`
--
ALTER TABLE `redts_zc_client_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_zd_client_doc_infos`
--
ALTER TABLE `redts_zd_client_doc_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `redts_ze_client_doc_attachments`
--
ALTER TABLE `redts_ze_client_doc_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `redts_zfa_additional_oops`
--
ALTER TABLE `redts_zfa_additional_oops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `redts_zf_order_of_payments`
--
ALTER TABLE `redts_zf_order_of_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `redts_zga_other_pymnt_cost_brkdwns`
--
ALTER TABLE `redts_zga_other_pymnt_cost_brkdwns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_zg_payment_cost_breakdowns`
--
ALTER TABLE `redts_zg_payment_cost_breakdowns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `redts_zh_cert_perm_routes`
--
ALTER TABLE `redts_zh_cert_perm_routes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `redts_zi_origin_offices`
--
ALTER TABLE `redts_zi_origin_offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `redts_zj_user_oop_approvees`
--
ALTER TABLE `redts_zj_user_oop_approvees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_z_applicant_types`
--
ALTER TABLE `redts_z_applicant_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `redts_ba_view_reqs_specs`
--
ALTER TABLE `redts_ba_view_reqs_specs`
  ADD CONSTRAINT `redts_ba_view_reqs_specs_office_id_foreign` FOREIGN KEY (`office_id`) REFERENCES `redts_f_offices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `redts_ba_view_reqs_specs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `redts_b_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `redts_la_process_lengths`
--
ALTER TABLE `redts_la_process_lengths`
  ADD CONSTRAINT `redts_la_process_lengths_subclass_id_foreign` FOREIGN KEY (`subclass_id`) REFERENCES `redts_l_sub_class` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `redts_lc_rstct_sbmsn_of_reqs`
--
ALTER TABLE `redts_lc_rstct_sbmsn_of_reqs`
  ADD CONSTRAINT `redts_lc_rstct_sbmsn_of_reqs_rstd_office_id_foreign` FOREIGN KEY (`rstd_office_id`) REFERENCES `redts_f_offices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `redts_lc_rstct_sbmsn_of_reqs_subclass_id_foreign` FOREIGN KEY (`subclass_id`) REFERENCES `redts_l_sub_class` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `redts_le_subclass_fees`
--
ALTER TABLE `redts_le_subclass_fees`
  ADD CONSTRAINT `redts_le_subclass_fees_subclass_id_foreign` FOREIGN KEY (`subclass_id`) REFERENCES `redts_l_sub_class` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `redts_l_sub_class`
--
ALTER TABLE `redts_l_sub_class`
  ADD CONSTRAINT `redts_l_sub_class_classification_id_foreign` FOREIGN KEY (`classification_id`) REFERENCES `redts_ee_classification` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `redts_y_requirements`
--
ALTER TABLE `redts_y_requirements`
  ADD CONSTRAINT `redts_y_requirements_subclass_id_foreign` FOREIGN KEY (`subclass_id`) REFERENCES `redts_l_sub_class` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `redts_zfa_additional_oops`
--
ALTER TABLE `redts_zfa_additional_oops`
  ADD CONSTRAINT `redts_zfa_additional_oops_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `redts_b_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `redts_zfa_additional_oops_doc_id_foreign` FOREIGN KEY (`doc_id`) REFERENCES `redts_zd_client_doc_infos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `redts_zf_order_of_payments`
--
ALTER TABLE `redts_zf_order_of_payments`
  ADD CONSTRAINT `redts_zf_order_of_payments_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `redts_b_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `redts_zf_order_of_payments_doc_id_foreign` FOREIGN KEY (`doc_id`) REFERENCES `redts_zd_client_doc_infos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `redts_zga_other_pymnt_cost_brkdwns`
--
ALTER TABLE `redts_zga_other_pymnt_cost_brkdwns`
  ADD CONSTRAINT `redts_zga_other_pymnt_cost_brkdwns_doc_id_foreign` FOREIGN KEY (`doc_id`) REFERENCES `redts_zd_client_doc_infos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `redts_zga_other_pymnt_cost_brkdwns_ofp_id_foreign` FOREIGN KEY (`ofp_id`) REFERENCES `redts_zfa_additional_oops` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `redts_zg_payment_cost_breakdowns`
--
ALTER TABLE `redts_zg_payment_cost_breakdowns`
  ADD CONSTRAINT `redts_zg_payment_cost_breakdowns_doc_id_foreign` FOREIGN KEY (`doc_id`) REFERENCES `redts_zd_client_doc_infos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `redts_zg_payment_cost_breakdowns_ofp_id_foreign` FOREIGN KEY (`ofp_id`) REFERENCES `redts_zf_order_of_payments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `redts_zh_cert_perm_routes`
--
ALTER TABLE `redts_zh_cert_perm_routes`
  ADD CONSTRAINT `redts_zh_cert_perm_routes_sub_class_id_foreign` FOREIGN KEY (`sub_class_id`) REFERENCES `redts_l_sub_class` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `redts_zi_origin_offices`
--
ALTER TABLE `redts_zi_origin_offices`
  ADD CONSTRAINT `user_uuid_const` FOREIGN KEY (`user_uuid`) REFERENCES `redts_b_user` (`uuid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `redts_zj_user_oop_approvees`
--
ALTER TABLE `redts_zj_user_oop_approvees`
  ADD CONSTRAINT `redts_zj_user_oop_approvees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `redts_b_user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
