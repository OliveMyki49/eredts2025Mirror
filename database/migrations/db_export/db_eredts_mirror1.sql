-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2025 at 01:26 AM
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
-- Database: `db_eredts_mirror1`
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
(1, '4a241309-da1e-11ef-b54a-3c7c3f2bc7d9', 'Administrator', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(2, '4a241ed2-da1e-11ef-b54a-3c7c3f2bc7d9', 'DTS Administrator', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(3, '4a241f3e-da1e-11ef-b54a-3c7c3f2bc7d9', 'Division Chief', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(4, '4a241f81-da1e-11ef-b54a-3c7c3f2bc7d9', 'Receiving Clerk', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 'Receiving and Releasing Clerk', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(6, '4a241ff9-da1e-11ef-b54a-3c7c3f2bc7d9', 'Releasing Clerk', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(7, '4a242032-da1e-11ef-b54a-3c7c3f2bc7d9', 'Regional Director', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(8, '4a24206a-da1e-11ef-b54a-3c7c3f2bc7d9', 'Assistant Regional Director for Technical Services', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 'Validator', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 'Processor', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(11, '4a24212b-da1e-11ef-b54a-3c7c3f2bc7d9', 'Accounting Officer', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(12, '4a242165-da1e-11ef-b54a-3c7c3f2bc7d9', 'Credit Officer', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(13, '4a2421a0-da1e-11ef-b54a-3c7c3f2bc7d9', 'ICT Staff', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(14, '4a2421dd-da1e-11ef-b54a-3c7c3f2bc7d9', 'Validator and Processor', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50');

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
(1, '5d2efb68-d6ff-11ef-b430-3c7c3f2bc7d9', 'administrator', '$2y$10$MzB.nJmYWbsT1oFJBege/Ogm52l/0OqI5d9/CDmKWvAzWRr/3RpQW', 'info.denrro5.gov.ph@gmail.com', 1, '4a241309-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(2, '5d2f0949-d6ff-11ef-b430-3c7c3f2bc7d9', 'redtsadmin', '$2y$10$MzB.nJmYWbsT1oFJBege/Ogm52l/0OqI5d9/CDmKWvAzWRr/3RpQW', 'redtsadmin@gmail.com', 2, '4a241ed2-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 1, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(3, '5d2f09e3-d6ff-11ef-b430-3c7c3f2bc7d9', 'jisales', '$2y$10$MMcz/ZGEAZTiZLdIQxqMfuZCtxi6hhHH6SXCyDLIQ/fc0bcPKAHxC', 'izy05ar@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(4, '5d2f0a64-d6ff-11ef-b430-3c7c3f2bc7d9', 'olivemyki49', '$2y$10$.UrKCgbjHgsipkqfae/LEu6ulG6MfASjtz9G1TOajrO98YlPvUlHW', 'olivemyki49@gmail.com', 1, '4a241309-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 1, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(5, '5d2f0acb-d6ff-11ef-b430-3c7c3f2bc7d9', 'cmbarcellano@forbescollege.org', '$2y$10$jR5opMecMa1zTRDYVY0UZOaacmJ.qBtWBUmX1MEzCrwOnr8w3Ya3G', 'cmbarcellano@forbescollege.org', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(6, '5d2f0b29-d6ff-11ef-b430-3c7c3f2bc7d9', 'gbtn_rec_test', '$2y$10$BT9pFua7Fhho7XbCujI7ze4mgT9R0F70tUDEJO1sPpCB0qDIxgtba', 'user2@admin.com', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(7, '5d2f0c05-d6ff-11ef-b430-3c7c3f2bc7d9', 'gbtn_rps_test', '$2y$10$FAsI93Ilqy2xO2IbApIPOeNP2W//kMuQfubO/eOAuO4he.lXDPuv.', 'user3@admin.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(8, '5d2f0c5e-d6ff-11ef-b430-3c7c3f2bc7d9', 'user4@admin.com', '$2y$10$my8EwflddgLG7pyn/YzVquPN86pEsqCO7Lr1NPmND45bSNtVAzKe6', 'user4@admin.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 0, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(9, '5d2f0cb1-d6ff-11ef-b430-3c7c3f2bc7d9', 'gbtn_cashier', '$2y$10$hDtKP1yr8/jm5JKyRUqdmuEuh/Ont8GQKFsHQhU839sAEs/gmP86O', 'gbtn_cashier@admin.com', 12, '4a242165-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(10, '5d2f0e0e-d6ff-11ef-b430-3c7c3f2bc7d9', 'gbtn_cenro', '$2y$10$cMDQKJUO8m10qDgp3w8c3OFceXgwYWJPwx1j/fpWEMVNjFxkijoru', 'gbtn_cenro@admin.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(11, '5d2f0e71-d6ff-11ef-b430-3c7c3f2bc7d9', 'user1@admin.com', '$2y$10$UkEk3KfFqlBSFnDXIVmlz.Uqcclwu/vxxug8qpQQk54Z5ai.4kMDy', 'user1@admin.com', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(12, '5d2f0ec7-d6ff-11ef-b430-3c7c3f2bc7d9', 'MOBO_REC', '$2y$10$0YAj0t3RbFtE9SoljijpCebW7bF1xyQkBcc9hsstYPpaZAPRoDqi2', 'denr_cenromobo@yahoo.com', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(13, '5d2f0f19-d6ff-11ef-b430-3c7c3f2bc7d9', 'catnes_rec', '$2y$10$RBqzGvvpbue/84ZWcpE7te6.kVCTdv/O9cFXCFR0T6KrFiWCWbgqm', 'Sample231206084410jydIy1@gmail.com', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(14, '5d2f0f78-d6ff-11ef-b430-3c7c3f2bc7d9', 'catnes_penro', '$2y$10$61WZe4uYtpQNjKB4aKJXFujLnDiyUnm3PKGq/iQ8FWlurnqr1ew8S', 'Sample2312060846423Wq8n2@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(15, '5d2f1027-d6ff-11ef-b430-3c7c3f2bc7d9', 'catnes_tsd', '$2y$10$wL4UTF/CqwKLYN9T82Bf1.tkVeDJIKMXcjulhvgPQrxsG6sFM4WFC', 'Sample231206132553x0BvC1@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(16, '5d2f107a-d6ff-11ef-b430-3c7c3f2bc7d9', 'catnes_svems', '$2y$10$5mkKusN5rlew4AWkkX9t.OEptBY3rLcvs4ZrjS2ruPSrJVbGazMPa', 'Sample231206132554UxKW32@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(17, '5d2f10ea-d6ff-11ef-b430-3c7c3f2bc7d9', 'catnes_acc', '$2y$10$1NAB/VSnUTojyD4H/HS0BeHYjZr/yyy7TawVzKz8dOeIQR1n87OIm', 'Sample231206132651NZxou3@gmail.com', 11, '4a24212b-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(18, '5d2f1143-d6ff-11ef-b430-3c7c3f2bc7d9', 'catnes_cashier', '$2y$10$./A8mPSa4pg77tc305KFP.XXX7777FdSNKg250.gt5z3QQ1kHhs1S', 'Sample231206132652g2Tdi4@gmail.com', 12, '4a242165-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(19, '5d2f1199-d6ff-11ef-b430-3c7c3f2bc7d9', 'catnes_fuu', '$2y$10$83F907gbUgPBec72kyJSaOeinaV21AoMNaRFisfGgkk1UK3HBMWLq', 'Sample231206132652TmRvX5@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(20, '5d2f11ea-d6ff-11ef-b430-3c7c3f2bc7d9', 'red_red', '$2y$10$kICe8IzjHUMUJDgBxXfPaeBO0Qhdb34CqwoYV7IO8K40lyMGZjpNW', 'Sample231217004016vUo7m3@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(21, '5d2f123b-d6ff-11ef-b430-3c7c3f2bc7d9', 'alb_rec', '$2y$10$cw5i0DooaFWDXccBDrkGue71qSdAEO5jvqBn8pqyJKTo8Tl9Z328u', 'alb_rec@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, 'Fa3KipBeOIwC7xhBVu6Zx7OtqK7m5XCUS4ARDg6LM13LeN2Bm4LvFDrlved5', 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(22, '5d2f1291-d6ff-11ef-b430-3c7c3f2bc7d9', 'alb_RPS', '$2y$10$uVzCc6301UK.gTh4uxHquO5ZffzBgsIl4p67th4jEVCMmAK9UlmeO', 'alb_rps@gmail.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(23, '5d2f12c8-d6ff-11ef-b430-3c7c3f2bc7d9', 'alb_tsd', '$2y$10$ofiEN.Hc8R58g6Ec1TEwlOpV/47ZftCd5WPPexQKiif/fzc4wvYQi', 'alb_tsd@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(24, '5d2f12fb-d6ff-11ef-b430-3c7c3f2bc7d9', 'alb_penro', '$2y$10$95V3/F0mQz6ogq5LR6G6SOiorZaKb.Pf1/hzzX2eRIWtJC5cXqeHa', 'alb_penro@gmail.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(25, '5d2f1457-d6ff-11ef-b430-3c7c3f2bc7d9', 'lpddadmin', '$2y$10$G3oJRBdnpga24FDhTaqgW.BBiPnSIWQEgB8zyHxdzTza8IpYt2Bma', 'lppadmin@gmail.com', 2, '4a241ed2-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(26, '5d2f148b-d6ff-11ef-b430-3c7c3f2bc7d9', 'sirrenz', '$2y$10$11vX/UaQx62d/m4DbDpovebgb4TVKXpbpjDkcyL5ryYJ4bP6SOuDK', 'rlmanzanades@denr.gov.ph', 1, '4a241309-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(27, '5d2f1641-d6ff-11ef-b430-3c7c3f2bc7d9', 'SOR_REC', '$2y$10$E7sy7JxIXxfwTtwk4IY6RubsHc0pHRYa4PHuEWBSQ0QmWRN1BEPF.', 'sor_rec@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(28, '5d2f1673-d6ff-11ef-b430-3c7c3f2bc7d9', 'wrpsGPuser1', '$2y$10$cOJBz5n9qm2KsJQhf037c.9zjbWrjOzYYXLeoAX4Pl9s763XYHUrO', 'wrpsUser1@gmail.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(29, '5d2f16a6-d6ff-11ef-b430-3c7c3f2bc7d9', 'wrpsUser2', '$2y$10$i994BYk1i7cQoelhVT/i3ut56v3s81.WwX2Ythdcnyf1DF3s81dXu', 'wrpsUser2@gmail.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(30, '5d2f16d8-d6ff-11ef-b430-3c7c3f2bc7d9', 'testuse1', '$2y$10$AQnIZHv3rEir2VWyNZ8UZe66CcPIgBlUaI3Sj9eZkKL86Z/WI..xy', 'Sample240416080315ANWw51@gmail.com', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(31, '5d2f1717-d6ff-11ef-b430-3c7c3f2bc7d9', 'testuse2', '$2y$10$fYUvx6f7t5tE2liMPhgy2OEeNLPOk/KAdKQSW8YQ4s861msvFFWtu', 'Sample240416080320ogocp2@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(32, '5d2f1747-d6ff-11ef-b430-3c7c3f2bc7d9', 'testuse3', '$2y$10$PJ.NgNRigPGw2eCqJQGNbeZ4dfJIOLquTvQtqNkMF0t6CTTRPfBwG', 'Sample240416080405AiBdp3@gmail.com', 14, '4a2421dd-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(33, '5d2f1778-d6ff-11ef-b430-3c7c3f2bc7d9', 'testuse4', '$2y$10$uRok6RdUQEZAS00T/XBkXupKXGzODJRAiR59cMbjDyf7P1sT2iCAC', 'Sample240416080412WABkh4@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(34, '5d2f17b2-d6ff-11ef-b430-3c7c3f2bc7d9', 'testuse5', '$2y$10$7a3bT2W01pyz6DXVFGtwYOx69OuzlldthRvSr43Cqlnwuyy2feqnG', 'Sample240416080426gCwnN5@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(35, '5d2f18b3-d6ff-11ef-b430-3c7c3f2bc7d9', 'testuse6', '$2y$10$PhGm8fvwA8o9UYz2sxLepOteWITAEr4uqafoW9JuRdFB5/Kwc9PRm', 'Sample240416080434OYyr76@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(36, '5d2f1905-d6ff-11ef-b430-3c7c3f2bc7d9', 'testuse7', '$2y$10$zuuQULZuqxOffHVmUfH/7.7P8VYD/dprfXJ.fmNCzYBQEGJmalIrG', 'Sample24041608044186MoL7@gmail.com', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(37, '5d2f193c-d6ff-11ef-b430-3c7c3f2bc7d9', 'alb_EVAL', '$2y$10$cc4g2zQRaDZYhx5RG9a7a.nDPvGkpdEtJIvwlwH7zEkHfzvhPVisS', 'cheguiriba81@gmail.com', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(38, '5d2f1974-d6ff-11ef-b430-3c7c3f2bc7d9', 'alb_PROC', '$2y$10$INUcsP3Qhgy3Ks7G.gEJY.kGpWeFAG1zSWGiiFcKKR9bOxd0dftG2', 'dm_alfonso08@yahoo.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(39, '5d2f19ab-d6ff-11ef-b430-3c7c3f2bc7d9', 'ALB_CRDT', '$2y$10$cRWJ81Lz9.ocXsPV/FeXsu/M0ID1BMQw248Wx4e3EBjQEqzYwfKf2', 'tweety_fatima03@yahoo.com', 12, '4a242165-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(40, '5d2f19e0-d6ff-11ef-b430-3c7c3f2bc7d9', 'ALB_PROC2', '$2y$10$o9L5OLZ24LrL8UDNGbZBkeOZSNtYjuqczd4llimxeocgJDDIBkUIq', 'sherwenfedericoalcantara@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(41, '5d2f1a16-d6ff-11ef-b430-3c7c3f2bc7d9', 'ALB_PROC3', '$2y$10$a8YhTvndN/2PcSbWzSRQQ.b5YIEzadrqQ2jPYp2A1dlYBvUEVxNOu', 'imee.m5254@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(42, '5d2f1b6b-d6ff-11ef-b430-3c7c3f2bc7d9', 'SOR_RPS', '$2y$10$xtgkXINPamO/tmStfKriW.4ySb51pV8nVxgmbPq7JtevwFNaHgwfC', 'dulpinaf@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(43, '5d2f1ba3-d6ff-11ef-b430-3c7c3f2bc7d9', 'SOR_EVAL2', '$2y$10$zoJcgzvrG/W2ysTXrfoKXe4ctdso8LErcUKIAVlz7G5GDtwdvo2U6', 'garcia.rosalie08@gmail.com', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(44, '5d2f1bd5-d6ff-11ef-b430-3c7c3f2bc7d9', 'SOR_PROC2', '$2y$10$StBlqtbnEZPzY3GRX1FCC.SARjah2ihUHZSC8hhQdii6TIqszkwNm', 'baylonivylynn@gmail.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(45, '5d2f1c1c-d6ff-11ef-b430-3c7c3f2bc7d9', 'SOR_CRDT', '$2y$10$Vj6iSSUgATioZOCxLIgtquT/ng1F77y/k8qVbw4LV1xh37d8COKGO', 'adellosa02@gmail.com', 12, '4a242165-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(46, '5d2f1c52-d6ff-11ef-b430-3c7c3f2bc7d9', 'CNORTE_RPS', '$2y$10$ZyUa31B5qEqYmrlLlOvIae.V3I1RxeSB2As1qUd.nv7QIimcYNpfi', 'lpds.camnorte@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(47, '5d2f1c85-d6ff-11ef-b430-3c7c3f2bc7d9', 'CNORTE_CRDT', '$2y$10$gFL5d6dMMu8DgZUa7wDYnObF5f94uWpeA.vDyCGO9L3JPThd.dbLO', 'janetforbes30@yahoo.com', 12, '4a242165-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(48, '5d2f1d65-d6ff-11ef-b430-3c7c3f2bc7d9', 'CDUANES_RPS', '$2y$10$m5o.hhKU12pvsoluDMb1leDq5e/b6Myp0bAjH/hNYIFQTJRt.4.Ji', 'lilianquinones04@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(49, '5d2f1e1e-d6ff-11ef-b430-3c7c3f2bc7d9', 'CDUANES_PROC', '$2y$10$EXNleqxdOyMCJRtqB0Th6.KvnJGElAWXRby0SrcLse6aY1/NI0K7q', 'jeannyllanderal25@gmail.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(50, '5d2f1e64-d6ff-11ef-b430-3c7c3f2bc7d9', 'CDUANES_EVAL', '$2y$10$UcCzSmvOFny220/8IktbROJK.XA5RnhpZC6QXvOQC.QD0p2mAn2Q6', 'resalym@gmail.com', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(51, '5d2f1e96-d6ff-11ef-b430-3c7c3f2bc7d9', 'CDUANES_CRDT', '$2y$10$B1G/eO24u2oCwiZcfTNngOb5IjqV6zr2ZVil6aCHGqDX472igpZFO', 'jessadelbarriosierra2494@gmail.com', 12, '4a242165-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(52, '5d2f1f79-d6ff-11ef-b430-3c7c3f2bc7d9', 'CDUANES_EVAL2', '$2y$10$gILxBJQJNKaNSaCnsQroKe9VRPF9rmpkAJSGA3j539nXLEUYW.f/O', 'dayawonmelanie84@gmail.com', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(53, '5d2f1fad-d6ff-11ef-b430-3c7c3f2bc7d9', 'GNBTN_RPS', '$2y$10$H09a22kG.9r/n8.r8Fs57eh2fc3bP/oNtqsN.0ZnKlazNPLuh/ice', 'ciaramaemape@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(54, '5d2f1fe1-d6ff-11ef-b430-3c7c3f2bc7d9', 'GNBTN_EVAL', '$2y$10$6ycmYSCA0FQUNL5QCIMB6O2EHrg6m/Pkt0VrHxcoZBjC21adBlg4y', 'sethalcantara08@gmail.com', 14, '4a2421dd-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(55, '5d2f20be-d6ff-11ef-b430-3c7c3f2bc7d9', 'GNBTN_PROC', '$2y$10$TtOZNmVVOpNQhF7NZiFRJecHrynL.ApUU07PYJ65m1mslZY5BiO26', 'dmadrazo91@gmail.com', 14, '4a2421dd-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(56, '5d2f20f3-d6ff-11ef-b430-3c7c3f2bc7d9', 'GNBTN_CRDT', '$2y$10$L1DzsZLyFiwjsBBc8avI4eW5U37.gnpF2puxv8K0BhBWRthmJXun6', 'cenroguinobatan@yahoo.com.ph', 12, '4a242165-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(57, '5d2f2125-d6ff-11ef-b430-3c7c3f2bc7d9', 'GOA_RPS', '$2y$10$RCRvYVPcl58Kw1ciLY9fQOqOWu4VV4ZxFBS7rhA0hwFEI05590u2u', 'lmo123cgoa@gmail.com', 14, '4a2421dd-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(58, '5d2f2202-d6ff-11ef-b430-3c7c3f2bc7d9', 'GOA_EVAL', '$2y$10$E7e1jUIk.w50grhayoCmxuMWQxOmKbsIlNgIjXrykp93l3d/YXpSS', '19jomarquides93@gmail.com', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(59, '5d2f2237-d6ff-11ef-b430-3c7c3f2bc7d9', 'GOA_PROC', '$2y$10$PCLO6NgyCmmfXeqVIs/xPOOEmuH.7da/0Vxwzo4ZK2xZopTZRMoh2', 'remoanaliza0829@gmail.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(60, '5d2f2324-d6ff-11ef-b430-3c7c3f2bc7d9', 'GOA_CRDT', '$2y$10$Gz6bfTH1wx1TzhpUhEkIjukmLpjhjCgUM03My7g9.sr5ZTXTv2pe.', 'solosajoan2@gmail.com', 12, '4a242165-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(61, '5d2f235b-d6ff-11ef-b430-3c7c3f2bc7d9', 'GOA_EVAL2', '$2y$10$E9F5feCLJqQ4k/KB.NXpM.lJ.0Nx4/kzxsWqKPn56np0nElqd9Ta6', 'marlon_azul@yahoo.com', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(62, '5d2f3425-d6ff-11ef-b430-3c7c3f2bc7d9', 'GOA_PROC2', '$2y$10$Sv/Dy0yfy2RJhzPMv/.AD.FBrX71H4KAbiiXJu9lQWepsyYxb2o6.', 'jaynieljames17@gmail.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(63, '5d2f349e-d6ff-11ef-b430-3c7c3f2bc7d9', 'SPCOT_RPS', '$2y$10$iOEuULmbEB.ZMmH58fBY/eokpbu96B62dixzk99p/FL/RDlvtjiwi', 'cirujalesorly@yahoo.com', 14, '4a2421dd-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(64, '5d2f35a7-d6ff-11ef-b430-3c7c3f2bc7d9', 'SPCOT_EVAL', '$2y$10$v76HFBfQCSPZncooYWNeou9VaaloDy0DZTXDj1zDJEMNbDkMmYEbm', 'reinz_twinkle_15@yahoo.com', 14, '4a2421dd-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(65, '5d2f36c8-d6ff-11ef-b430-3c7c3f2bc7d9', 'SPCOT_PROC', '$2y$10$Tp6vFkRZ0pdoYNg848AqA.HCkIQDHkDvZ1JrzPzPYIEllRHrIoBpu', 'joelbreguela05@gmail.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(66, '5d2f37c7-d6ff-11ef-b430-3c7c3f2bc7d9', 'SPCOT_CRDT', '$2y$10$VJtEXfDDtqNrUqIdxCds3uwargRR1NS4idPUEqkWEuuw7ucwnA4bK', 'csipocotshamiebotor@gmail.com', 12, '4a242165-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(67, '5d2f38c4-d6ff-11ef-b430-3c7c3f2bc7d9', 'MOBO_RPS', '$2y$10$j9ktIjQb9c8rvxtH8YZgLOAT781nnMsIOfHy3brcDWQZCtns5ar8u', 'josephjuliussancho@gmail.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(68, '5d2f39bf-d6ff-11ef-b430-3c7c3f2bc7d9', 'MOBO_EVAL', '$2y$10$vEbnrOy2vASaAGUcOgWQz.noReSDowiHzl7UVhKWSlYybk2oPMRF6', 'boseflorilynne@gmail.com', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(69, '5d2f3d55-d6ff-11ef-b430-3c7c3f2bc7d9', 'MOBO_PROC', '$2y$10$OTPC55EydZomZ7reOVlNrOi1iD40J6usJKm/HCjnO6nF4iVp6bLaW', 'frugeo122023@yahoo.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(70, '5d2f3da6-d6ff-11ef-b430-3c7c3f2bc7d9', 'MOBO_CRDT', '$2y$10$GTOnb5ebiPsVmH4VsM60vu7Ai79y/XUqYZ1wLVWiR3ewWHRatn5pG', 'marylintuzon@gmail.com', 12, '4a242165-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(71, '5d2f3dec-d6ff-11ef-b430-3c7c3f2bc7d9', 'SJ_RPS', '$2y$10$d2JpgXyHLHIk9Cq00VogkuSmSE5NXKN.ZEFGT6KhoWDHy4iaXOof6', 'emipaglinawanrold@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(72, '5d2f3e44-d6ff-11ef-b430-3c7c3f2bc7d9', 'SJ_EVAL', '$2y$10$Q9SBq9QvA7fwGr7x8tXCHeh.p/Xh8A8qPMjVsE/qBNlDUTYyzEg2G', 'imeldaalmodiel0307@gmail.com', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(73, '5d2f3e7b-d6ff-11ef-b430-3c7c3f2bc7d9', 'SJ_PROC', '$2y$10$4qWj1uhs.6OJL3hcFsqOt.sybgpBnNgElieoDX25YmH3W5E//7DzC', 'cabiles86@gmail.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(74, '5d2f3eb2-d6ff-11ef-b430-3c7c3f2bc7d9', 'SJ_CRDT', '$2y$10$wXD1ygs2MO8xzLAdRyMXb.wF35.mBIXmSqRBnofCzWWhVm/2mZ.qS', 'irishfernandez0516@gmail.com', 12, '4a242165-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(75, '5d2f3eed-d6ff-11ef-b430-3c7c3f2bc7d9', 'GOA_REC', '$2y$10$1FTKA.nxIqW6ibgkMf7phuu5SrdPTt0mLZNJiFvHDbRkyF9IoZu2O', 'valleyforge04@gmail.com', 14, '4a2421dd-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(76, '5d2f3f27-d6ff-11ef-b430-3c7c3f2bc7d9', 'ALB_EVALGP', '$2y$10$IsdS.rElISFz4GiL6d35tefn9qxjfAG6Xsn9cbOFhacM7u8Zdk..K', 'Sample240417113312rlPe91@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(77, '5d2f3f60-d6ff-11ef-b430-3c7c3f2bc7d9', 'SOR_REC2', '$2y$10$DOavE8WZVxvtc1bTXd9sCusJZ4uGyX05M0MkzF3Aae/Qz9RWcSXku', 'Charmaineeve.magbanua.ict@gmail.com', 13, '4a2421a0-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(78, '5d2f3f98-d6ff-11ef-b430-3c7c3f2bc7d9', 'SOR_EVAL', '$2y$10$xd28GA4mQ/EljgwGLpNFWOeRarPh7nsjn8lrXEPdKtITfXpzIFAjS', 'dulpinaf+sor_eval@gmail.com', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(79, '5d2f3fd7-d6ff-11ef-b430-3c7c3f2bc7d9', 'SOR_PROC', '$2y$10$eqLDHDFSbhZJlcR6PA3xsu0.cyHwcgRn7jDhdycMnEf26nw1gesPO', 'garcia.rosalie08+sorproc@gmail.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(80, '5d2f4039-d6ff-11ef-b430-3c7c3f2bc7d9', 'CNORTE_REC', '$2y$10$beVaVcHr9EV9GCIkTb5pXetiWdkemSvhWeyQtbBVs74G6pUUsT0SG', 'jeanelldelossantos@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(81, '5d2f40ab-d6ff-11ef-b430-3c7c3f2bc7d9', 'CNORTE_EVAL', '$2y$10$s0Huo8zp3InrXbhLErmTdOLW5G0qtSXP4rC1V7pg3BtEctcG/R.6K', 'lpds.camnorte+CNORTE_EVALCHS@gmail.com', 14, '4a2421dd-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(82, '5d2f4109-d6ff-11ef-b430-3c7c3f2bc7d9', 'CNORTE_PROC', '$2y$10$srzt8/mpAVHFjIkIeGCB7OX84xBU.VPSVUkPrjhndn6vdCo/wIHZO', 'lpds.camnorte+CNORTE_PROCCHS@gmail.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(83, '5d2f4163-d6ff-11ef-b430-3c7c3f2bc7d9', 'CDUANES_REC', '$2y$10$VewCZXlqfwbLHyFMwGI/z.0EhWOHtu3LjzezgiNCP1iJTRco0Hd6K', 'penrocatanduanes.recordsunit@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(84, '5d2f41cd-d6ff-11ef-b430-3c7c3f2bc7d9', 'MSBT_REC', '$2y$10$2bYlOi11j1ytwXfrkAiP3.DPOkEeiW3qSjZMNQpGlpmXMltM2MlS2', 'cillecos@gmail.com', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, 'gpDSpCN9QkKkH9MuMYwN4HUpLEENTxmnTzo2TNrIB8nsqLcSywlkA211mWWI', 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(85, '5d2f4243-d6ff-11ef-b430-3c7c3f2bc7d9', 'MSBT_RPS', '$2y$10$Tp2mItLCVamxhnqlDsI.5erfSNYecGdcGSrR5qQ7d451z8AeLZlY.', 'glennmarklupango@yahoo.com', 14, '4a2421dd-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(86, '5d2f42a4-d6ff-11ef-b430-3c7c3f2bc7d9', 'MSBT_PROC', '$2y$10$Lw1q1ai2MrwOoclmBlv0qeau4HsmvH1238UbDrT..Mjt8SfJXywqW', 'laurioeduardoiii@gmai.com', 12, '4a242165-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(87, '5d2f42fc-d6ff-11ef-b430-3c7c3f2bc7d9', 'GNBTN_REC', '$2y$10$gCOnOhX9ly3m90TZU7mctOUh0OL7NOE13s1HlIkpCEdPniv7M1V7e', '', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(88, '5d2f4357-d6ff-11ef-b430-3c7c3f2bc7d9', 'GNBTN_PROC2', '$2y$10$gL548BZ861/lmi46n.vY5uNkL.TjEKTH3EuKOFXhN4WZrnlp.UQxO', 'gragedajhoviern_05@gmail.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(89, '5d2f43af-d6ff-11ef-b430-3c7c3f2bc7d9', 'GNBTN_PROC3', '$2y$10$Jh7XtMoYGOlReJ3x1kXNFO2WI/cJ09hgal.tyi1PjT7zwqT2sg3tK', 'arayaroy25@gmail.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(90, '5d2f440a-d6ff-11ef-b430-3c7c3f2bc7d9', 'SPCOT_REC', '$2y$10$W7amIaekOpWC6ahO3WK2NuNmQeIpu1Zt.2Vz4VujIWehN7mUmwj9i', 'chrissy242@gmail.com', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(91, '5d2f446f-d6ff-11ef-b430-3c7c3f2bc7d9', 'SJ_REC', '$2y$10$8toJnaJmCSfs8Ais8xzyeuudSTTno0mVgSGhEHqo/SePVoKMSnQHa', 'loidadelossantos1978@gmail.com', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(92, '5d2f44ca-d6ff-11ef-b430-3c7c3f2bc7d9', 'GNBTN_PROC4', '$2y$10$W4oX2UHgAxfQhpGkyEUfHuq2SbQ9siXMTIMC7PNeqrgf0tBBKpA8.', 'sethalcantara08+gnbtn_proc4@gmail.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(93, '5d2f4523-d6ff-11ef-b430-3c7c3f2bc7d9', 'CSUR_REC', '$2y$10$3YTJIrifYNhuFdZvr6EeL.V5p4vzdFifwp73PYkSJevVm3OS2fSza', 'joycnale2@yahoo.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(94, '5d2f457c-d6ff-11ef-b430-3c7c3f2bc7d9', 'CSUR_RPS', '$2y$10$GXCNn42k1NzLqqXgSnH0N.Ek/To9E9iWYsyyLKfppp3U65baXsx4C', 'r5penrocs.rps@gmail.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(95, '5d2f45e2-d6ff-11ef-b430-3c7c3f2bc7d9', 'CSUR_EVAL', '$2y$10$dzlqmrKEf3DHg4Sb6chxAuT5sidD2xMWJgDvXT.DiLA8WzrEn8Ze.', 'nelchelleanne@gmail.com', 9, '4a2420af-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(96, '5d2f461e-d6ff-11ef-b430-3c7c3f2bc7d9', 'CSUR_PROC', '$2y$10$R490hJ0iF.A6wivuVXxbteHAAzISrZ/zAWvxxsE8hUbx6bMxdgaA2', 'ejpadillatayaban@gmail.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(97, '5d2f4655-d6ff-11ef-b430-3c7c3f2bc7d9', 'CSUR_CRDT', '$2y$10$fs5EP0ktNq4.QPJmeG2fQec2yeIGZHjKUf89rR8/89UoZW3zchD2u', 'gemmarmendoza@yahoo.com', 12, '4a242165-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(98, '5d2f468b-d6ff-11ef-b430-3c7c3f2bc7d9', 'CSUR_ICT', '$2y$10$c91TsR/oGhYpwxgtLUKQAeudypZfeJk/2DAx3uhPfvdM.ek3POTA2', 'jcstacruz@denr.gov.ph', 13, '4a2421a0-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(99, '5d2f46c3-d6ff-11ef-b430-3c7c3f2bc7d9', 'msbt_ict', '$2y$10$vT72Qrko6VuES24zuCWDEOA69VuVr3rTO4wsnUfReiXiThV6tWTG.', 'rpmoncada@denr.gov.ph', 13, '4a2421a0-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(100, '5d2f46fa-d6ff-11ef-b430-3c7c3f2bc7d9', 'IRGA_REC', '$2y$10$2N.cx7BsG4AcUCUzGFXec.BvGHwm66KRgBohJXCWuyaQqPccBgW4a', 'cenroiriga@denr.gov.ph', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(101, '5d2f4732-d6ff-11ef-b430-3c7c3f2bc7d9', 'IRGA_RPS', '$2y$10$jftU8HTRQGuJwnt.XNBMd.3BVvpCAwl11L7ma8OYyXR5huEzNcHbq', 'solimannelson228@gmail.com', 14, '4a2421dd-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(102, '5d2f476a-d6ff-11ef-b430-3c7c3f2bc7d9', 'IRGA_EVAL', '$2y$10$.JsS8aHe5YRyOxyElG4jtewsWs4ZlD9yGB9CfCV0VpKIPapja3A66', 'maritesguevara65@gmail.com', 14, '4a2421dd-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(103, '5d2f47a3-d6ff-11ef-b430-3c7c3f2bc7d9', 'IRGA_PROC', '$2y$10$vutg2Pqz7OmgIpGx9PGi/OCyOi33RPHNbnzEEjHyBCNY4INNJyarS', 'lalainegotis@gmail.com', 14, '4a2421dd-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(104, '5d2f47d9-d6ff-11ef-b430-3c7c3f2bc7d9', 'IRGA_PROC2', '$2y$10$GAjdA.1j4dEKSdrLbJYU8ujz9tWNahMtfb/WqRqnd2wtWuIH7l24a', 'bryanlindomagayes@gmail.com', 14, '4a2421dd-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(105, '5d2f4810-d6ff-11ef-b430-3c7c3f2bc7d9', 'IRGA_CRDT', '$2y$10$IGEqAXWtjluT.sw7cjxtROioNUNb9GT4W1bnYD6/fI2P0A/Vt0HDu', 'jgvsarto30@gmail.com', 12, '4a242165-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(106, '5d2f4849-d6ff-11ef-b430-3c7c3f2bc7d9', 'goa_ict', '$2y$10$Bgik17Jnsf9/ABfBcxzNy.ken1sq7QeEHEC50uO6uNxr8n923fp1.', 'ictcenrogoa@gmail.com', 13, '4a2421a0-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(107, '5d2f4881-d6ff-11ef-b430-3c7c3f2bc7d9', 'goa_ict_staff', '$2y$10$QD1e6kWHd42eUBE6ujsfQ.HgqebYakTUJB1a3BVg5PZmjLYGzPJUa', 'ictcenrogoa+ictStaff1@gmail.com', 13, '4a2421a0-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(108, '5d2f48fd-d6ff-11ef-b430-3c7c3f2bc7d9', 'spcot_ict', '$2y$10$XJ.zDMleE.zxo5me6kX01uA4GaPjj1weXSDuUZP6bd3pIn7upI65O', 'rafflesia_11812@yahoo.com', 13, '4a2421a0-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(109, '5d2f4937-d6ff-11ef-b430-3c7c3f2bc7d9', 'spcot_ict_staff', '$2y$10$5lvqREIs6Ej1SdL9nYqdK.qzGAvjWZTmB8kZ0RmIxIboMx2J7ZYB6', 'maymay636@yahoo.com', 13, '4a2421a0-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(110, '5d2f496d-d6ff-11ef-b430-3c7c3f2bc7d9', 'mobo_ict', '$2y$10$2.342G1VieWGYPeyPbFfauAvfoFgLf/NQTOFCYW3SueZguDUXtFBG', 'jkalaurio16@gmail.com', 12, '4a242165-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(111, '5d2f49a4-d6ff-11ef-b430-3c7c3f2bc7d9', 'mobo_cenro', '$2y$10$uiuSsNNKF.W.6iiSqHymHONch9p4j3ZYwLdPf3bgUELb.BhAEblI.', 'jeanimperial15@gmail.com', 10, '4a2420ef-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(112, '5d2f49dc-d6ff-11ef-b430-3c7c3f2bc7d9', 'sj_ict', '$2y$10$3ZV86JR5h1QdoXhOA.iPG.TjewQVn/qk50YFhfh7H2N1jnV7kuIby', 'lecturajuliusjonlourenz@gmail.com', 13, '4a2421a0-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(113, '5d2f4a14-d6ff-11ef-b430-3c7c3f2bc7d9', 'sj_ict_staff', '$2y$10$88mzecbw4Kumm1sov0OIYeUCbHRF2LvZs8Z./pQGMvylMfcm9MAbW', 'medallaargie@gmail.com', 13, '4a2421a0-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(114, '5d2f4a4c-d6ff-11ef-b430-3c7c3f2bc7d9', 'cenro_goa', '$2y$10$FkZAKjmSci8csfVwSsUczeioRaYOC8cKbGeJoj5FJTCx9cTG6auRa', 'Sample240429153852BwWsg1@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(115, '5d2f4a85-d6ff-11ef-b430-3c7c3f2bc7d9', 'lpdd_fus', '$2y$10$Ux5w/sFc/Y.rfrWxpzRxCOAAY5Pc4LfvGCNjp6Jakpq7gJmYHtdQy', 'Sample240513162921Vgj0i2@gmail.com', 2, '4a241ed2-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(116, '5d2f4abc-d6ff-11ef-b430-3c7c3f2bc7d9', 'oardts_user1', '$2y$10$xbq5hKu0KO.kTDEzbIMXC.nLycP7OMU9gnP2uQWi0RbnJq5OhCXme', 'Sample2405140902596IHw02@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(117, '5d2f4af5-d6ff-11ef-b430-3c7c3f2bc7d9', 'CENRO_SPCOT', '$2y$10$VbCvj6J/UF2Q//JTBwzqtu6nKmckYYRJ7uNnkYe8dp7sQQuM7G//2', 'CENROTEST@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(118, '5d2f4b2d-d6ff-11ef-b430-3c7c3f2bc7d9', 'ELB_IRIGA_PROC', '$2y$10$0toqhwV9q5SCkjH0Y0/lFeoS6X4.bssC56qFSAI.8EYB/UhDI/qf.', 'Sample240904144538rXwy93@gmail.com', 14, '4a2421dd-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(119, '5d2f4b65-d6ff-11ef-b430-3c7c3f2bc7d9', 'CAS_IRIGA_PROC', '$2y$10$pN/iHQuOiLxEwOPr6bOVo.4Q4.CJK0rntRtVJ6cnvlQlXIjr8wLOS', 'Sample2409041445389mrYk4@gmail.com', 14, '4a2421dd-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(120, '5d2f4ba7-d6ff-11ef-b430-3c7c3f2bc7d9', 'HPH_IRIGA_PROC', '$2y$10$5YlvbmJQFUg8NghZREq8t.MZXmdQO4pvcsqjLgN4ru2YFVF15UNlS', 'Sample240904144539ZU1WD5@gmail.com', 14, '4a2421dd-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(121, '5d2f4be0-d6ff-11ef-b430-3c7c3f2bc7d9', 'MVVA_IRIGA_PROC', '$2y$10$eOaonyewWxpcjvhFclran.Pe8B6a.35RbEIC.n6os7Npyph33f/pe', 'Sample240904144745JGRGo6@gmail.com', 14, '4a2421dd-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(122, '5d2f4cad-d6ff-11ef-b430-3c7c3f2bc7d9', 'SPCOT_SVEMS', '$2y$10$Ca6fhxv7vccdSiQDjdTskuAbNzUKwIQvdMdUIGRJKUsMXvb.ZegTy', 'Sample241009161330gjBQu1@gmail.com', 14, '4a2421dd-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(123, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'test', '$2y$10$skl86PDPr1e6i3Vyb6vo6e3avCFirZuICvtBBubkzkLDV26IkNzCa', 'testChange@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, 'SdFrDVaNZuGFBq3p17f4EhzJdDhBp4woVkJNSXFup9Qgmu9b4FIXO3LSzCFd', 0, NULL, '2025-07-01 06:13:49', '2025-10-07 05:28:29'),
(124, '07a1a310-71be-4f49-b471-a1482fa6bd0e', 'Take3', '$2y$10$zwORyfow2/YFAxmXIANU3OgSHg/gzHWFfW6jCVPPXj5FZpNqFs.Ma', 'Sample250421152407NCqbm1@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(125, 'a27d2940-14c4-40ad-8d35-382223a5eed2', 'tester_albay', '$2y$10$TyL9vCf5IAkwJsECKAY05.b9MHHvvOQHT3S3NJLkU4Ye2b4b6URA.', 'Sample250709085513lE2F81@gmail.com', 5, '4a241fbc-da1e-11ef-b54a-3c7c3f2bc7d9', 1, NULL, 0, NULL, '2025-07-09 00:57:33', '2025-07-09 00:57:33');

-- --------------------------------------------------------

--
-- Table structure for table `redts_d_profile`
--

CREATE TABLE `redts_d_profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
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
(1, NULL, '5d2efb68-d6ff-11ef-b430-3c7c3f2bc7d9', 'Administrator', 'A.', 'Admin', NULL, 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(2, NULL, '5d2f0949-d6ff-11ef-b430-3c7c3f2bc7d9', 'DENR', '', 'R5', NULL, 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(3, NULL, '5d2f09e3-d6ff-11ef-b430-3c7c3f2bc7d9', 'John Isaac', 'Sample', 'Sales', '', 'unset', 'assets/img/user_pic/jisales_202311100323.jpg', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(4, NULL, '5d2f0acb-d6ff-11ef-b430-3c7c3f2bc7d9', 'Clive Mark', 'Buelva', 'Barcellano', NULL, 'Computer Operator', 'assets/img/user_pic/cmbarcellano@forbescollege.org_202501151538.jpg', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(5, NULL, '5d2f0a64-d6ff-11ef-b430-3c7c3f2bc7d9', 'Admin', '', 'Chicken', NULL, 'unset', 'assets/img/user_pic/olivemyki49_202501161628.jpg', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(6, NULL, '5d2f0b29-d6ff-11ef-b430-3c7c3f2bc7d9', 'Carlo', 'S.', 'Zabiro', '', 'unset', 'assets/img/user_pic/gbtn_rec_202311280141.jpg', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(7, NULL, '5d2f0c05-d6ff-11ef-b430-3c7c3f2bc7d9', 'Carles', 'Sandro', 'Curpos', '', 'unset', 'assets/img/user_pic/gbtn_rps_202311280142.jpg', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(8, NULL, '5d2f0c5e-d6ff-11ef-b430-3c7c3f2bc7d9', 'Elmner', 'Karol', 'Sumer', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(9, NULL, '5d2f0cb1-d6ff-11ef-b430-3c7c3f2bc7d9', 'Carlo', 'T.', 'Lapus', '', 'Administrative Aide II', 'assets/img/user_pic/gbtn_cashier_202311280142.jpg', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(10, NULL, '5d2f0e0e-d6ff-11ef-b430-3c7c3f2bc7d9', 'Ferdinand', 'L', 'Baltazar', '', 'unset', 'assets/img/user_pic/gbtn_cenro_202311280143.jpg', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(11, NULL, '5d2f0e71-d6ff-11ef-b430-3c7c3f2bc7d9', 'Elmer', 'Sanchez', 'Miller', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(12, NULL, '5d2f0ec7-d6ff-11ef-b430-3c7c3f2bc7d9', 'Gerald', 'D.', 'Lupango', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(13, NULL, '5d2f0f19-d6ff-11ef-b430-3c7c3f2bc7d9', 'Yalonda', 'Kleisle', 'Elvish', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(14, NULL, '5d2f0f78-d6ff-11ef-b430-3c7c3f2bc7d9', 'Baily', 'Charlet', 'Epelett', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(15, NULL, '5d2f0fce-d6ff-11ef-b430-3c7c3f2bc7d9', 'Nefen', 'Grieswood', 'Diffley', NULL, 'Planning Officer III', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(16, NULL, '5d2f1027-d6ff-11ef-b430-3c7c3f2bc7d9', 'Shep', 'Freathy', 'Threadgill', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(17, NULL, '5d2f107a-d6ff-11ef-b430-3c7c3f2bc7d9', 'Michal', 'Gertz', 'Flaherty', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(18, NULL, '5d2f10ea-d6ff-11ef-b430-3c7c3f2bc7d9', 'Barnie', 'Drayton', 'Shrawley', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(19, NULL, '5d2f1143-d6ff-11ef-b430-3c7c3f2bc7d9', 'Josephina', 'Gration', 'Bellee', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(20, NULL, '5d2f1199-d6ff-11ef-b430-3c7c3f2bc7d9', 'Ali', 'Larham', 'Wallege', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(21, NULL, '5d2f11ea-d6ff-11ef-b430-3c7c3f2bc7d9', 'Sample231217004016vUo7m3', 'S.', 'Surname', NULL, 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(22, NULL, '5d2f123b-d6ff-11ef-b430-3c7c3f2bc7d9', 'Laila', 'M.', 'Miraflor', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(23, NULL, '5d2f1291-d6ff-11ef-b430-3c7c3f2bc7d9', 'Joel', 'B.', 'Bueno', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(24, NULL, '5d2f12c8-d6ff-11ef-b430-3c7c3f2bc7d9', 'alb_tsd', 'S.', 'Surname', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(25, NULL, '5d2f12fb-d6ff-11ef-b430-3c7c3f2bc7d9', 'Hodin', 'J.', 'Magsipyo', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(26, NULL, '5d2f132d-d6ff-11ef-b430-3c7c3f2bc7d9', 'alb_msd', 'S.', 'Surname', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(27, NULL, '5d2f1361-d6ff-11ef-b430-3c7c3f2bc7d9', 'alb_es', 'S.', 'Surname', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(28, NULL, '5d2f1392-d6ff-11ef-b430-3c7c3f2bc7d9', 'alb_cds', 'S.', 'Surname', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(29, NULL, '5d2f13c4-d6ff-11ef-b430-3c7c3f2bc7d9', 'alb_fs', 'S.', 'Surname', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(30, NULL, '5d2f13f5-d6ff-11ef-b430-3c7c3f2bc7d9', 'alb_as', 'S.', 'Surname', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(31, NULL, '5d2f1426-d6ff-11ef-b430-3c7c3f2bc7d9', 'alb_pmd', 'S.', 'Surname', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(32, NULL, '5d2f1457-d6ff-11ef-b430-3c7c3f2bc7d9', 'Lpdd', 'User', '1', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(33, NULL, '5d2f148b-d6ff-11ef-b430-3c7c3f2bc7d9', 'Rene', 'L.', 'Manzanades', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(34, NULL, '5d2f14bb-d6ff-11ef-b430-3c7c3f2bc7d9', 'Lorna', 'B.', 'Villaflor', '', 'unset', 'assets/img/user_pic/goa_villaflor_202401181000.PNG', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(35, NULL, '5d2f14ed-d6ff-11ef-b430-3c7c3f2bc7d9', 'Melanie', 'P.', 'Rojas', NULL, 'unset', 'assets/img/user_pic/goa_rojas_202401181002.PNG', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(36, NULL, '5d2f151e-d6ff-11ef-b430-3c7c3f2bc7d9', 'Mary Jane', 'M.', 'Recamara', '', 'unset', 'assets/img/user_pic/goa_recamara_202401181003.PNG', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(37, NULL, '5d2f154f-d6ff-11ef-b430-3c7c3f2bc7d9', 'Jomar', 'D.', 'Quides', '', 'unset', 'assets/img/user_pic/goa_quides_202401181004.PNG', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(38, NULL, '5d2f157f-d6ff-11ef-b430-3c7c3f2bc7d9', 'Jojo', 'C.', 'Collao', NULL, 'unset', 'assets/img/user_pic/goa_collao_202401181007.PNG', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(39, NULL, '5d2f15af-d6ff-11ef-b430-3c7c3f2bc7d9', 'Analiza', 'D.', 'Remo', NULL, 'unset', 'assets/img/user_pic/goa_remo_202401181008.PNG', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(40, NULL, '5d2f15e0-d6ff-11ef-b430-3c7c3f2bc7d9', 'Femy', 'C.', 'Sedeño', NULL, 'unset', 'assets/img/user_pic/goa_sedeño_202401181009.PNG', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(41, NULL, '5d2f1611-d6ff-11ef-b430-3c7c3f2bc7d9', 'Cyrus Job', '', 'Dela Cruz', NULL, 'unset', 'assets/img/user_pic/goa_dela_cruz_202401181016.PNG', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(42, NULL, '5d2f1641-d6ff-11ef-b430-3c7c3f2bc7d9', 'LYNA', 'B.', 'LLAVE', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(43, NULL, '5d2f1673-d6ff-11ef-b430-3c7c3f2bc7d9', 'Lorenz Kurt', 'C.', 'Abrasaldo', NULL, 'EMS II', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(44, NULL, '5d2f16a6-d6ff-11ef-b430-3c7c3f2bc7d9', 'WRPS', 'User', '2', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(45, NULL, '5d2f16d8-d6ff-11ef-b430-3c7c3f2bc7d9', 'Carmen', 'S.', 'Basto', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(46, NULL, '5d2f1717-d6ff-11ef-b430-3c7c3f2bc7d9', 'Sample240416080320ogocp2', 'S.', 'Surname', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(47, NULL, '5d2f1747-d6ff-11ef-b430-3c7c3f2bc7d9', 'Ronna Mae', 'D.', 'Agzapan', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(48, NULL, '5d2f1778-d6ff-11ef-b430-3c7c3f2bc7d9', 'Laemin', ' ', 'Torero', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(49, NULL, '5d2f17b2-d6ff-11ef-b430-3c7c3f2bc7d9', 'Carlo', 'R.', 'Magsipin', 'Jr.', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(50, NULL, '5d2f18b3-d6ff-11ef-b430-3c7c3f2bc7d9', 'Tony Jay', 'B.', 'Barascan', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(51, NULL, '5d2f1905-d6ff-11ef-b430-3c7c3f2bc7d9', 'Luvido', 'C.', 'Semanan', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(52, NULL, '5d2f193c-d6ff-11ef-b430-3c7c3f2bc7d9', 'RICHELYN', 'A', 'GUIRIBA', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(53, NULL, '5d2f1974-d6ff-11ef-b430-3c7c3f2bc7d9', 'DEBBIE', 'A', 'MAPA', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(54, NULL, '5d2f19ab-d6ff-11ef-b430-3c7c3f2bc7d9', 'ANDREA FATIMA', 'SA.', 'BUENAVENTURA', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(55, NULL, '5d2f19e0-d6ff-11ef-b430-3c7c3f2bc7d9', 'SHERWEN', 'F', 'ALCANTARA', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(56, NULL, '5d2f1a16-d6ff-11ef-b430-3c7c3f2bc7d9', 'IMEE', 'I', 'MAMISAO', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(57, NULL, '5d2f1b6b-d6ff-11ef-b430-3c7c3f2bc7d9', 'FREDDIE', 'A', 'DULPINA', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(58, NULL, '5d2f1ba3-d6ff-11ef-b430-3c7c3f2bc7d9', 'ROSALIE', 'L', 'GARCIA', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(59, NULL, '5d2f1bd5-d6ff-11ef-b430-3c7c3f2bc7d9', 'IVY LYNN', 'C', 'BAYLON', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(60, NULL, '5d2f1c1c-d6ff-11ef-b430-3c7c3f2bc7d9', 'ARLENE', 'D', 'DIONEDA', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(61, NULL, '5d2f1c52-d6ff-11ef-b430-3c7c3f2bc7d9', 'Angelito', 'L', 'Rutaquio', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(62, NULL, '5d2f1c85-d6ff-11ef-b430-3c7c3f2bc7d9', 'Janet', 'B', 'Forbes', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(63, NULL, '5d2f1d65-d6ff-11ef-b430-3c7c3f2bc7d9', 'Lilian', 'M', 'Quiñones', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(64, NULL, '5d2f1e1e-d6ff-11ef-b430-3c7c3f2bc7d9', 'Jeanny', 'P', 'Llanderal', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(65, NULL, '5d2f1e64-d6ff-11ef-b430-3c7c3f2bc7d9', 'Resaly', 'M', 'Gualvez', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(66, NULL, '5d2f1e96-d6ff-11ef-b430-3c7c3f2bc7d9', 'Jessa', 'D', 'Sierra', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(67, NULL, '5d2f1f79-d6ff-11ef-b430-3c7c3f2bc7d9', 'Melanie', ' ', 'Dayawon', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(68, NULL, '5d2f1fad-d6ff-11ef-b430-3c7c3f2bc7d9', 'CIARA MAE', 'R', 'MAPE', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(69, NULL, '5d2f1fe1-d6ff-11ef-b430-3c7c3f2bc7d9', 'SETH', 'B', 'ALCANTARA', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(70, NULL, '5d2f20be-d6ff-11ef-b430-3c7c3f2bc7d9', 'DANIEL', 'P', 'MADRAZO', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(71, NULL, '5d2f20f3-d6ff-11ef-b430-3c7c3f2bc7d9', 'LUDIVINA', 'V', 'LLANA', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(72, NULL, '5d2f2125-d6ff-11ef-b430-3c7c3f2bc7d9', 'Lorna', 'B', 'Villaflor', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(73, NULL, '5d2f2202-d6ff-11ef-b430-3c7c3f2bc7d9', 'Jomar', 'D', 'Quides', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(74, NULL, '5d2f2237-d6ff-11ef-b430-3c7c3f2bc7d9', 'Analiza', ' ', 'Remo', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(75, NULL, '5d2f2324-d6ff-11ef-b430-3c7c3f2bc7d9', 'Joan', ' ', 'Solosa', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(76, NULL, '5d2f235b-d6ff-11ef-b430-3c7c3f2bc7d9', 'Marlon', 'C', 'Azul', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(77, NULL, '5d2f3425-d6ff-11ef-b430-3c7c3f2bc7d9', 'Mary Jane', 'M', 'Recamara', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(78, NULL, '5d2f349e-d6ff-11ef-b430-3c7c3f2bc7d9', 'Orly', 'B', 'Cirujales', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(79, NULL, '5d2f35a7-d6ff-11ef-b430-3c7c3f2bc7d9', 'Ina Gracia', 'C', 'Geronimo', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(80, NULL, '5d2f36c8-d6ff-11ef-b430-3c7c3f2bc7d9', 'Joel', 'P', 'Breguela', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(81, NULL, '5d2f37c7-d6ff-11ef-b430-3c7c3f2bc7d9', 'Marie Sharmaine', 'M', 'Botor', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(82, NULL, '5d2f38c4-d6ff-11ef-b430-3c7c3f2bc7d9', 'Joseph', 'L', 'Sancho', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(83, NULL, '5d2f39bf-d6ff-11ef-b430-3c7c3f2bc7d9', 'Florilynne', 'H', 'Bose', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(84, NULL, '5d2f3d55-d6ff-11ef-b430-3c7c3f2bc7d9', 'Irish', 'Si.', 'Pesebre', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(85, NULL, '5d2f3da6-d6ff-11ef-b430-3c7c3f2bc7d9', 'Marylin', 'R', 'Tuzon', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(86, NULL, '5d2f3dec-d6ff-11ef-b430-3c7c3f2bc7d9', 'Emirold', 'M', 'Paglinawan', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(87, NULL, '5d2f3e44-d6ff-11ef-b430-3c7c3f2bc7d9', 'Imelda', 'V', 'Almodiel', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(88, NULL, '5d2f3e7b-d6ff-11ef-b430-3c7c3f2bc7d9', 'Christopher', 'C', 'Cabiles', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(89, NULL, '5d2f3eb2-d6ff-11ef-b430-3c7c3f2bc7d9', 'Irish', 'S', 'Fernandez', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(90, NULL, '5d2f3eed-d6ff-11ef-b430-3c7c3f2bc7d9', 'Peter Aurel', ' ', 'Orata', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(91, NULL, '5d2f3f27-d6ff-11ef-b430-3c7c3f2bc7d9', 'Sample240417113312rlPe91', 'S.', 'Surname', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(92, NULL, '5d2f3f60-d6ff-11ef-b430-3c7c3f2bc7d9', 'CHARMAINE EVE', 'M.', 'CALLEJA', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(93, NULL, '5d2f3f98-d6ff-11ef-b430-3c7c3f2bc7d9', 'FREDDIE', 'A.', 'DULPINA', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(94, NULL, '5d2f3fd7-d6ff-11ef-b430-3c7c3f2bc7d9', 'ROSALIE', 'L.', 'GARCIA', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(95, NULL, '5d2f4039-d6ff-11ef-b430-3c7c3f2bc7d9', 'Jeanel', 'L.', 'Delos Santos', '', 'positionSample', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(96, NULL, '5d2f40ab-d6ff-11ef-b430-3c7c3f2bc7d9', 'Lendy', 'S.', 'Del Pilar', '', 'positionSample', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(97, NULL, '5d2f4109-d6ff-11ef-b430-3c7c3f2bc7d9', 'Jonathan', 'M.', 'Cabildo', '', 'positionSample', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(98, NULL, '5d2f4163-d6ff-11ef-b430-3c7c3f2bc7d9', 'Joy', 'G. ', 'Cambronero', '', 'Records Officer', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(99, NULL, '5d2f41cd-d6ff-11ef-b430-3c7c3f2bc7d9', 'Lucille', 'N.', 'Cos', '', 'Admin. Aide VI', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(100, NULL, '5d2f4243-d6ff-11ef-b430-3c7c3f2bc7d9', 'Glenn Mark', 'D.', 'Lupango', '', 'SvEMS/Chief, RPS', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(101, NULL, '5d2f42a4-d6ff-11ef-b430-3c7c3f2bc7d9', 'Atty. Eduardo', 'B.', 'Laurio', 'III', 'Special Investigator I', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(102, NULL, '5d2f42fc-d6ff-11ef-b430-3c7c3f2bc7d9', 'DOLORES', 'P.', 'PRINCESA', '', 'Admin. Officer I / Records Officer I', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(103, NULL, '5d2f4357-d6ff-11ef-b430-3c7c3f2bc7d9', 'JHOVIERN', 'C.', 'GRAGEDA', '', 'Forest Technician I', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(104, NULL, '5d2f43af-d6ff-11ef-b430-3c7c3f2bc7d9', 'ROY', 'R.', 'ARAYA', '', 'Forest Ranger', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(105, NULL, '5d2f440a-d6ff-11ef-b430-3c7c3f2bc7d9', 'Marichris', 'L.', 'Monreal', '', 'Records Officer I', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(106, NULL, '5d2f446f-d6ff-11ef-b430-3c7c3f2bc7d9', 'Loida', 'B.', 'De Los Santos', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(107, NULL, '5d2f44ca-d6ff-11ef-b430-3c7c3f2bc7d9', 'SETH', 'B.', 'ALCANTARA', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(108, NULL, '5d2f4523-d6ff-11ef-b430-3c7c3f2bc7d9', 'Jocelyn', '', 'Nale', '', 'PO I/Records Officer', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(109, NULL, '5d2f457c-d6ff-11ef-b430-3c7c3f2bc7d9', 'Kathleen', 'C.', 'Abawag', '', 'SvEMS/RPS Chief', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(110, NULL, '5d2f45e2-d6ff-11ef-b430-3c7c3f2bc7d9', 'Nelchelle Anne', ' ', 'De Guzman', '', 'Engineer II', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(111, NULL, '5d2f461e-d6ff-11ef-b430-3c7c3f2bc7d9', 'Eunice', 'Joy P.', 'Tayaban', '', 'Forest Extension Officer', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(112, NULL, '5d2f4655-d6ff-11ef-b430-3c7c3f2bc7d9', 'Gemma', 'R.', 'Mendoza', '', 'Cashier', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(113, NULL, '5d2f468b-d6ff-11ef-b430-3c7c3f2bc7d9', 'Jason', ' ', 'Sta Cruz', '', 'ISA II', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(114, NULL, '5d2f46c3-d6ff-11ef-b430-3c7c3f2bc7d9', 'Rose', 'P.', 'Moncada', '', 'ISA II/OIC, Planning Section', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(115, NULL, '5d2f46fa-d6ff-11ef-b430-3c7c3f2bc7d9', 'RAZEL', 'P.', 'FLORIDA', '', 'Records Officer I', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(116, NULL, '5d2f4732-d6ff-11ef-b430-3c7c3f2bc7d9', 'NELSON', 'D.', 'SOLIMAN', '', 'LMO III/RPS Chief', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(117, NULL, '5d2f476a-d6ff-11ef-b430-3c7c3f2bc7d9', 'MARITES', 'J.', 'GUEVARA', '', 'FII/Head, FUU', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(118, NULL, '5d2f47a3-d6ff-11ef-b430-3c7c3f2bc7d9', 'Lalaine', 'B.', 'Gotis', '', 'FTII/Planning Focal', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(119, NULL, '5d2f47d9-d6ff-11ef-b430-3c7c3f2bc7d9', 'Bryan', 'L.', 'Magayanes', '', 'FTI', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(120, NULL, '5d2f4810-d6ff-11ef-b430-3c7c3f2bc7d9', 'JEMYMA GRACE', 'S.', 'AGNAS', '', 'ADMIN AIDE IV', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(121, NULL, '5d2f4849-d6ff-11ef-b430-3c7c3f2bc7d9', 'Menard', 'M.', 'Azurin', '', 'RLMO I / ICT Focal Person', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(122, NULL, '5d2f4881-d6ff-11ef-b430-3c7c3f2bc7d9', 'Mary Angeline', '', 'Relloso', '', 'RIT Operator', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(123, NULL, '5d2f48fd-d6ff-11ef-b430-3c7c3f2bc7d9', 'Maryann', 'A.', 'Roncesballes', '', 'LMI/ICT Focal Person', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(124, NULL, '5d2f4937-d6ff-11ef-b430-3c7c3f2bc7d9', 'Cherry May', 'N.', 'San Joaquin', '', 'IT Operator', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(125, NULL, '5d2f496d-d6ff-11ef-b430-3c7c3f2bc7d9', 'Jessiecca', 'S.', 'Laurio', '', 'AAVI/ICT Focal', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(126, NULL, '5d2f49a4-d6ff-11ef-b430-3c7c3f2bc7d9', 'Jean', 'V.', 'Imperial', '', 'CENR Officer', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(127, NULL, '5d2f49dc-d6ff-11ef-b430-3c7c3f2bc7d9', 'Julius Jon Lourenz', 'R.', 'Lectura', '', 'Forester I', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(128, NULL, '5d2f4a14-d6ff-11ef-b430-3c7c3f2bc7d9', 'Argie', 'M.', 'Medalla', '', 'IT Operator/ ICT Support Staff', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(129, NULL, '5d2f4a4c-d6ff-11ef-b430-3c7c3f2bc7d9', 'Eduardo', 'C.', 'Ampongan', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(130, NULL, '5d2f4a85-d6ff-11ef-b430-3c7c3f2bc7d9', 'Sample240513162921Vgj0i2', 'S.', 'Surname', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(131, NULL, '5d2f4abc-d6ff-11ef-b430-3c7c3f2bc7d9', 'Sample2405140902596IHw02', 'S.', 'Surname', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(132, NULL, '5d2f4af5-d6ff-11ef-b430-3c7c3f2bc7d9', 'CENRO', 'S.', 'Surname', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(133, NULL, '5d2f4b2d-d6ff-11ef-b430-3c7c3f2bc7d9', 'ELIZABETH', 'L.', 'BERCILLA', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(134, NULL, '5d2f4b65-d6ff-11ef-b430-3c7c3f2bc7d9', 'CHRIS', 'A.', 'SALCEDO', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(135, NULL, '5d2f4ba7-d6ff-11ef-b430-3c7c3f2bc7d9', 'HENRY', 'P.', 'HERNADEZ', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(136, NULL, '5d2f4be0-d6ff-11ef-b430-3c7c3f2bc7d9', 'MARIA VERDA', 'V.', 'ABAWAG', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(137, NULL, '5d2f4cad-d6ff-11ef-b430-3c7c3f2bc7d9', 'Melinda', 'O.', 'Rivero', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(138, NULL, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'Olive', 'Myki', 'Barcelon', NULL, 'Computer Programmer', 'assets/img/user_pic/test_202502061006.jpg', NULL, '2025-07-01 06:13:49', '2025-10-07 05:28:29'),
(139, NULL, '07a1a310-71be-4f49-b471-a1482fa6bd0e', 'Take3', 'S.', 'Surname', '', 'unset', '', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(140, NULL, 'a27d2940-14c4-40ad-8d35-382223a5eed2', 'tester_albay', 'S.', 'Surname', '', 'unset', '', NULL, '2025-07-09 00:57:33', '2025-07-09 00:57:33');

-- --------------------------------------------------------

--
-- Table structure for table `redts_ee_classification`
--

CREATE TABLE `redts_ee_classification` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `description` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `classification_type` varchar(255) DEFAULT NULL COMMENT 'simple, complex, or highly_technical',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redts_ee_classification`
--

INSERT INTO `redts_ee_classification` (`id`, `uuid`, `description`, `slug`, `classification_type`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '73e92167-d88f-11ef-bf83-3c7c3f2bc7d9', 'Administrative Order', 'adm_ord', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(2, '73e92c80-d88f-11ef-bf83-3c7c3f2bc7d9', 'Affidavit', 'affidvt', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(3, '73e92cfa-d88f-11ef-bf83-3c7c3f2bc7d9', 'Annual Procurement Plan', 'ann_proc', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(4, '73e92d81-d88f-11ef-bf83-3c7c3f2bc7d9', 'Application', 'app', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(5, '73e92dcb-d88f-11ef-bf83-3c7c3f2bc7d9', 'Application for Chainsaw Registration', 'app_chainsaw', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(6, '73e92e3b-d88f-11ef-bf83-3c7c3f2bc7d9', 'CAD Orders', 'cad_ord', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(7, '73e92e78-d88f-11ef-bf83-3c7c3f2bc7d9', 'Central Office SO', 'co_so', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(8, '73e92eb5-d88f-11ef-bf83-3c7c3f2bc7d9', 'Contract', 'ctrct', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(9, '73e92eec-d88f-11ef-bf83-3c7c3f2bc7d9', 'Decision', 'dec', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(10, '73e92f4c-d88f-11ef-bf83-3c7c3f2bc7d9', 'Fax Message', 'fax_msg', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(11, '73e92f86-d88f-11ef-bf83-3c7c3f2bc7d9', 'Indorsement', 'indrsmt', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(12, '73e92fbd-d88f-11ef-bf83-3c7c3f2bc7d9', 'Issuance of Certificate of Tree Plantation Ownership', 'cert_tpo', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(13, '73e92ffc-d88f-11ef-bf83-3c7c3f2bc7d9', 'Issuance of Certificate of Verification (COV)', 'cert_cov', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(14, '73e93057-d88f-11ef-bf83-3c7c3f2bc7d9', 'Issuance of Certification of Land Status and/or Certification of Survey Claimant', 'cert_ls', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(15, '73e930ac-d88f-11ef-bf83-3c7c3f2bc7d9', 'Issuance of Certification of No Records/Appeal/Motion for Reconsideration, etc', 'cert_nr', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(16, '73e930e9-d88f-11ef-bf83-3c7c3f2bc7d9', 'Issuance of Private Land Timber Permit (PLTP)', 'pltp', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(17, '73e93122-d88f-11ef-bf83-3c7c3f2bc7d9', 'Issuance of Special Private Land Timber Permit (SPLTP)', 'spltp', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(18, '73e9315d-d88f-11ef-bf83-3c7c3f2bc7d9', 'Issuance of Survey Authority', 'suv_auth', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(19, '73e9320f-d88f-11ef-bf83-3c7c3f2bc7d9', 'Issuance of Tree Cutting Permit for DPWH', 'tcp_dpwh', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(20, '73e9325f-d88f-11ef-bf83-3c7c3f2bc7d9', 'Issuance of Tree Cutting Permit for Planted Trees (TREE1)', 'tcp_tree1', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(21, '73e9329e-d88f-11ef-bf83-3c7c3f2bc7d9', 'Leave', 'lv', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(22, '73e932d9-d88f-11ef-bf83-3c7c3f2bc7d9', 'Letter or Correspondence', 'ltr_corr', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(23, '73e93313-d88f-11ef-bf83-3c7c3f2bc7d9', 'Liquidation', 'liq', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(24, '73e9334e-d88f-11ef-bf83-3c7c3f2bc7d9', 'LRC Orders', 'lrc_ord', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(25, '73e93387-d88f-11ef-bf83-3c7c3f2bc7d9', 'Memorandum', 'memo', 'simple', NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(26, '73e933bf-d88f-11ef-bf83-3c7c3f2bc7d9', 'Miscellaneous', 'misc', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(27, '73e933f7-d88f-11ef-bf83-3c7c3f2bc7d9', 'Motion for Reconsideration', 'mfr', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(28, '73e93431-d88f-11ef-bf83-3c7c3f2bc7d9', 'Notice', 'ntc', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(29, '73e93468-d88f-11ef-bf83-3c7c3f2bc7d9', 'Notice of Appeal', 'ntc_apl', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(30, '73e934bf-d88f-11ef-bf83-3c7c3f2bc7d9', 'Notice of Hearing', 'ntc_hrg', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(31, '73e93514-d88f-11ef-bf83-3c7c3f2bc7d9', 'Order', 'ord', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(32, '73e9354d-d88f-11ef-bf83-3c7c3f2bc7d9', 'Pleadings', 'plead', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(33, '73e93587-d88f-11ef-bf83-3c7c3f2bc7d9', 'Project Procurement Management Plan', 'ppmp', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(34, '73e935e4-d88f-11ef-bf83-3c7c3f2bc7d9', 'Purchase Order Request', 'por', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(35, '73e9361e-d88f-11ef-bf83-3c7c3f2bc7d9', 'Purchase Request', 'pr', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(36, '73e93658-d88f-11ef-bf83-3c7c3f2bc7d9', 'Radio Message', 'rd_msg', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(37, '73e93695-d88f-11ef-bf83-3c7c3f2bc7d9', 'Regional Special Order', 'rso', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(38, '73e936cf-d88f-11ef-bf83-3c7c3f2bc7d9', 'Reimbursement', 'reimb', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(39, '73e93709-d88f-11ef-bf83-3c7c3f2bc7d9', 'Request for Quotation', 'rfq', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(40, '73e93754-d88f-11ef-bf83-3c7c3f2bc7d9', 'Special Order', 'sp_ord', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(41, '73e93795-d88f-11ef-bf83-3c7c3f2bc7d9', 'Travel Order', 'trvl_ord', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(42, '73e937d2-d88f-11ef-bf83-3c7c3f2bc7d9', 'Travel Reimbursement', 'trvl_reimb', NULL, NULL, '2025-07-01 06:14:17', '2025-07-01 06:14:17'),
(43, 'aa49f8f2-0df1-40f7-8a95-ac9a73726db6', 'Group 1', 'GRP1', NULL, NULL, '2025-09-12 02:21:20', '2025-09-12 02:21:20'),
(44, '79fa58eb-7b7f-4224-a8b1-489193729894', 'Group 2', 'grp2', NULL, NULL, '2025-09-12 04:24:14', '2025-09-12 04:24:14');

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

-- --------------------------------------------------------

--
-- Table structure for table `redts_f_offices`
--

CREATE TABLE `redts_f_offices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `region_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'redts_f_offices_region_id_foreign',
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
(1, '0e4f0a5b-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-ORED', 'ORED', 'Office of the Regional Executive Director', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(2, '0e4f14d6-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-SCIS', 'SCIS', 'Strategic Communication Initiative Service', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(3, '0e4f15c5-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDMS', 'OARDMS', 'Office of the Assistant Regional Director for Management Services', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(4, '0e4f165f-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDMS-PMD', 'PMD', 'Planning and Management Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDMS-PMD-ICTS', 'PMD.ICT', 'Information and Communications Technology Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(6, '0e4f1788-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDMS-PMD-MES', 'PMD.ME', 'Monitoring and Evaluation Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(7, '0e4f1807-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDMS-PMD-PPS', 'PMD.PP', 'Planning and Programming Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(8, '0e4f194b-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDMS-LEGAL', 'LEGAL', 'Legal Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(9, '0e4f19d7-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDMS-LEGAL-IS', 'LEGAL.I', 'Investigation Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(10, '0e4f1a59-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDMS-LEGAL-ERLS', 'LEGAL.ERLS', 'Environment, Research Legislation Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(11, '0e4f1ad5-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDMS-LEGAL-LAS', 'LEGAL.LASS', 'Litigation and Adjudication Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(12, '0e4f1b52-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDMS-FINANCE', 'FIN', 'Finance Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(13, '0e4f1bcd-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDMS-FINANCE-BFS', 'FIN.Budget', 'Budget and Fiscal Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(14, '0e4f1c46-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDMS-FINANCE-AS', 'FIN.Accounting', 'Accounting Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(15, '0e4f1cbd-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDMS-ADMIN', 'AD', 'Administrative Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(16, '0e4f1d37-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDMS-ADMIN-PS', 'AD.Personnel', 'Personnel Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(17, '0e4f1dab-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDMS-ADMIN-HRDS', 'AD.HRDS', 'Human Resource Development Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(18, '0e4f1e23-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDMS-ADMIN-GSS', 'AD.GSS', 'General Services Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(19, '0e4f1e98-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDMS-ADMIN-GSS-RU', 'AD.Records', 'Records Unit', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(20, '0e4f1f0e-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDMS-ADMIN-PROC', 'AD.Procurement', 'Procurement Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(21, '0e4f1f83-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDMS-ADMIN-CASHIER', 'AD.Cashier', 'Cashier Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(22, '0e4f200e-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDTS', 'OARDTS', 'Office of the Assistant Regional Director in Technical Services', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(23, '0e4f2086-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDTS-LPDD', 'LPDD', 'Regional Office V (LPDD Receiving Office)', 'Receiving', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(24, '0e4f211a-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDTS-LPDD-WRUS', 'LPDD.Water', 'Water Resource Utilization Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(25, '0e4f2191-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDTS-LPDD-PDS', 'LPDD.PDS', 'Patents and Deeds Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(26, '0e4f2205-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDTS-LPDD-FUS', 'LPDD.FUS', 'Forest Utilizatoin Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(27, '0e4f227c-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDTS-LPDD-WRPS', 'LPDD.WRPS', 'Wildlife Resource Permitting Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(28, '0e4f22f1-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDTS-SMD', 'SMD', 'Surveys and Mapping Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(29, '0e4f2367-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDTS-SMD-SCS', 'SMD.SCS', 'Surveys and Control Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(30, '0e4f23d9-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDTS-SMD-LESS', 'SMD.LESS', 'Land Evaluation Survey Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(31, '0e4f244c-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDTS-SMD-ASCS', 'SMD.Aggregate', 'Aggregates Surveys and Correction Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(32, '0e4f24c3-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDTS-SMD-OOSS', 'SMD.OOSS', 'Original and Other Surveys Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(33, '0e4f253b-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDTS-SMD-LRS', 'SMD.LRS', 'Land Records Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(34, '0e4f25af-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDTS-CDD', 'CDD', 'Conservation and Development Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(35, '0e4f2622-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDTS-CDD-PFMS', 'CDD.PFMS', 'Production Forest Management Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(36, '0e4f2678-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDTS-CDD-CRFMS', 'CDD.Coastal', 'Coastal Resource and Foreshore Mgt Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(37, '0e4f26cd-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDTS-CDD-PAMBCS', 'CDD.PA', 'PA Mgt and Biodiversity Conservation Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(38, '0e4f2723-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDTS-ED', 'ED', 'Enforcement Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(39, '0e4f277a-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDTS-ED-CMIS', 'ED.Compliance', 'Compliance Monitoring and Investigation Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(40, '0e4f27cd-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-OARDTS-ED-SIS', 'ED.Surveillance', 'Surveillance and Intelligence Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(41, '0e4f2821-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-ALBAY', 'P.Albay', 'PENRO Albay', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Legazpi Port District, Legazpi City, Albay', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(42, '0e4f287e-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CSUR', 'P.CSur', 'PENRO Camarines Sur', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Panganiban Drive, Naga City, Camarines Sur', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(43, '0e4f28d6-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CNORTE', 'P.CNorte', 'PENRO Camarines Norte', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Daet, Camarines Norte', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(44, '0e4f292b-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-MASBATE', 'P.Masbate', 'PENRO Masbate', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Zurbito Street, Masbate City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(45, '0e4f297d-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CATNES', 'P.Catnes', 'PENRO Catanduanes', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'San Isidro Village, Virac, Catanduanes', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(46, '0e4f29d1-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-SORSOGON', 'P.Sor', 'PENRO Sorsogon', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'B. Road, Sorsogon City, Sorsogon', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(47, '0e4f2a23-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-GUINOBATAN', 'C.GBTN', 'CENRO Guinobatan', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Morera, Guinobatan, Albay', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(48, '0e4f2aa9-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-IRIGA', 'C.Iriga', 'CENRO Iriga', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Iriga City, Camarines Sur', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(49, '0e4f2b09-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-SIPOCOT', 'C.Sipocot', 'CENRO Sipocot', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Sipocot, Camarines Sur', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(50, '0e4f2b5d-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-GOA', 'C.Goa', 'CENRO Goa', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Catagbacan, Goa, Camarines Sur', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(51, '0e4f2bb0-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-MOBO', 'C.Mobo', 'CENRO Mobo', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Medina St, Mobo, Masbate', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(52, '0e4f2c05-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-SANJACINTO', 'C.SJ', 'CENRO San Jacinto', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'San Jacinto, Masbate', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(53, '0e4f2c58-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-BAC', 'RBAC', 'RBAC', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(54, '0e4f2d6d-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-TWG-INFRA-PROJ', 'TWG.INFRA', 'TWG Infrastructure Projects', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(55, '0e4f2dc4-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-TWG-GOODS-SERV', 'TWG.Goods', 'TWG Goods and Services', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(56, '0e4f2e16-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-TWG-IT-EQ', 'TWG.IT', 'TWG IT Equipments', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(57, '0e4f2e69-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-TWG-CONSERV', 'TWG.Consulting', 'TWG Consulting Services', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(58, '0e4f2ebb-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-TWG-NGP', 'TWG.NGP', 'TWG National Greening Program', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(59, '0e4f2f0e-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-INS-INFRA-PROJ', 'INS.INFRA', 'Inspection Infrastructure Projects', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(60, '0e4f3013-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-INS-GOODS-SERV', 'INS.Goods', 'Inspection Goods and Services', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(61, '0e4f3067-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-INS-IT-EQ', 'INS.IT', 'Inspection IT Equipments', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(62, '0e4f30bb-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-INS-CONSERV', 'INS.Consulting', 'Inspection Consulting Services', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(63, '0e4f310f-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-INS-NGP-T1', 'INS.NGPT1', 'Inspection National Greening Program Team 1', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(64, '0e4f3211-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-INS-NGP-T2', 'INS.NGPT2', 'Inspection National Greening Program Team 2', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(65, '0e4f3265-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-INS-NGP-T3', 'INS.NGPT3', 'Inspection National Greening Program Team 3', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(66, '0e4f32b6-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-INS-VEHICLE', 'INS.Vehicle', 'Inspection Vehicle', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(67, '0e4f33b8-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CANVASSER1-AD', 'Canvass.AD1', 'Admin Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(68, '0e4f4ff3-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CANVASSER2-AD', 'Canvass.AD2', 'Admin Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(69, '0e4f50ea-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CANVASSER-PMD', 'Canvass.PMD', 'Planning and Management Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(70, '0e4f52a1-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CANVASSER-LEGAL', 'Canvass.Legal', 'Legal Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(71, '0e4f532f-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CANVASSER-SCIS', 'Canvass.SCIS', 'Strategic Communication Initiative Service', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(72, '0e4f55ac-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CANVASSER-FD', 'Canvass.FD', 'Finance Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(73, '0e4f588d-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CANVASSER-CDD', 'Canvass.CDD', 'Conservation and Development Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(74, '0e4f5c07-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CANVASSER-LPDD', 'Canvass.LPDD', 'Licenses, Patents and Deeds Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(75, '0e4f5f62-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CANVASSER-ED', 'Canvass.ED', 'Enforcement Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(76, '0e4f640d-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CANVASSER-SMD', 'Canvass.SMD', 'Surveys and Mapping Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(77, '0e4f698b-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Albay-MSD', 'P.Albay.MSD', 'PENRO Albay - Management Services Division', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Legazpi Port District, Legazpi City, Albay', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(78, '0e4f6c45-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Albay-MSD-Admin', 'P.Albay.Admin', 'PENRO Albay - Administrative Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Legazpi Port District, Legazpi City, Albay', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(79, '0e4f6dc9-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Albay-MSD-Finance', 'P.Albay.Finance', 'PENRO Albay - Finance Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Legazpi Port District, Legazpi City, Albay', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(80, '0e4f6fcd-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Albay-Planning', 'P.Albay.PMS', 'PENRO Albay - Planning and Management Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Legazpi Port District, Legazpi City, Albay', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(81, '0e4f70aa-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Albay-TSD', 'P.Albay.TSD', 'PENRO Albay - Technical Services Division', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Legazpi Port District, Legazpi City, Albay', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(82, '0e4f7106-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Albay-TSD-Conservation', 'P.Albay.CDS', 'PENRO Albay - Conservation and Development Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Legazpi Port District, Legazpi City, Albay', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(83, '0e4f716b-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Albay-TSD-RPS', 'P.Albay.RPS', 'PENRO Albay - Regulation and Permitting Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Legazpi Port District, Legazpi City, Albay', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(84, '0e4f71c5-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Albay-TSD-Enforcement', 'P.Albay.Enforcement', 'PENRO Albay - Enforcement Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Legazpi Port District, Legazpi City, Albay', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(85, '0e4f7229-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CNorte-MSD', 'P.Cn.MSD', 'PENRO Cam Norte - Management Services Division', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Daet, Camarines Norte', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(86, '0e4f728d-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CNorte-MSD-Admin', 'P.CN.Admin', 'PENRO Cam Norte - Administrative Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Daet, Camarines Norte', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(87, '0e4f730d-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CNorte-MSD-Finance', 'P.CN.Finance', 'PENRO Cam Norte - Finance Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Daet, Camarines Norte', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(88, '0e4f737c-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CNorte-MSD-Planning', 'P.CN.PMS', 'PENRO Cam Norte - Planning and Management Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Daet, Camarines Norte', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(89, '0e4f7453-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CNorte-TSD', 'P.CN.TSD', 'PENRO Cam Norte - Technical Services Division', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Daet, Camarines Norte', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(90, '0e4f74b3-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CNorte-TSD-Conservation', 'P.CN.CDS', 'PENRO Cam Norte - Conservation and Development Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Daet, Camarines Norte', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(91, '0e4f7518-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CNorte-TSD-RPS', 'P.CN.RPS', 'PENRO Cam Norte - Regulation and Permitting Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Daet, Camarines Norte', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(92, '0e4f757f-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CNorte-TSD-Enforcement', 'P.CN.Enforcement', 'PENRO Cam Norte - Enforcement Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Daet, Camarines Norte', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(93, '0e4f7660-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CSur-MSD', 'P.CSur.MSD', 'PENRO Cam Sur - Management and Services Division', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Panganiban Drive, Naga City, Camarines Sur', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(94, '0e4f76bc-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CSur-MSD-Admin', 'P.Csur.Admin', 'PENRO Cam Sur - Administrative Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Panganiban Drive, Naga City, Camarines Sur', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(95, '0e4f7716-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CSur-MSD-Finance', 'P.CSur.Finance', 'PENRO Cam Sur - Finance Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Panganiban Drive, Naga City, Camarines Sur', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(96, '0e4f7771-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CSur-MSD-Planning', 'P.CSur.PMS', 'PENRO Cam Sur - Planning and Management Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Panganiban Drive, Naga City, Camarines Sur', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(97, '0e4f7824-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CSur-TSD', 'P.CSur.TSD', 'PENRO Cam Sur - Tecnical services Division', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Panganiban Drive, Naga City, Camarines Sur', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(98, '0e4f78b0-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CSur-TSD-Conservation', 'P.CSur.CDS', 'PENRO Cam Sur - Conservation and Development Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Panganiban Drive, Naga City, Camarines Sur', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(99, '0e4f7927-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CSur-TSD-RPS', 'P.CSur.RPS', 'PENRO Cam Sur - Regulation and Permitting Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Panganiban Drive, Naga City, Camarines Sur', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(100, '0e4f7980-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CSur-TSD-Enforment', 'P.CSur.Enforcement', 'PENRO Cam Sur - Enforcement Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Panganiban Drive, Naga City, Camarines Sur', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(101, '0e4f79dc-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Catnes-MSD', 'P.Catnes.MSD', 'PENRO Catanduanes - Management Services Division', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'San Isidro Village, Virac, Catanduanes', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(102, '0e4f7a3e-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Catnes-MSD-Admin', 'P.Catnes.Admin', 'PENRO Catanduanes - Administration Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'San Isidro Village, Virac, Catanduanes', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(103, '0e4f7a9b-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Catnes-MSD-Finance', 'P.Catnes.Finance', 'PENRO Catanduanes - Finance Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'San Isidro Village, Virac, Catanduanes', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(104, '0e4f7af5-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Catnes-MSD-Planning', 'P.Catnes.PMS', 'PENRO Catanduanes - Planning and Management Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'San Isidro Village, Virac, Catanduanes', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(105, '0e4f7c05-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Catnes-TSD-Conservation', 'P.Catnes.CDS', 'PENRO Catanduanes - Conservation and Development Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'San Isidro Village, Virac, Catanduanes', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(106, '0e4f7c60-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Catnes-TSD-RPS', 'P.Catnes.RPS', 'PENRO Catanduanes - Regulation and Permitting Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'San Isidro Village, Virac, Catanduanes', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(107, '0e4f7cba-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Catnes-TSD-Enforcement', 'P.Catnes.Enforment', 'PENRO Catanduanes - Enforcement Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'San Isidro Village, Virac, Catanduanes', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(108, '0e4f7d14-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Masbate-MSD', 'P.Masbate.MSD', 'PENRO Masbate - Management Services Division', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Zurbito Street, Masbate City', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(109, '0e4f7d74-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Masbate-MSD-Admin', 'P.Masbate.Admin', 'PENRO Masbate - Administration Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Zurbito Street, Masbate City', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(110, '0e4f7e83-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Masbate-MSD-Finance', 'P.Masbate.Finance', 'PENRO Masbate - Finance Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Zurbito Street, Masbate City', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(111, '0e4f7ee3-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Masbate-MSD-Planning', 'P.Masbate.PMS', 'PENRO Masbate - Planning and Management Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Zurbito Street, Masbate City', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(112, '0e4f7f9b-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Masbate-TSD', 'P.Masbate.TSD', 'PENRO Masbate - Technical Services Division', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Zurbito Street, Masbate City', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(113, '0e4f7ff6-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Masbate-TSD-Conservation', 'P.Masbate.CDS', 'PENRO Masbate - Conservation and Development Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Zurbito Street, Masbate City', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(114, '0e4f8053-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Masbate-TSD-RPS', 'P.Masbate.RPS', 'PENRO Masbate - Regulation and Permitting Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Zurbito Street, Masbate City', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(115, '0e4f80af-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Masbate-TSD-Enforcement', 'P.Masbate.Enforcement', 'PENRO Masbate - Enforcement Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Zurbito Street, Masbate City', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(116, '0e4f810c-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Sorsogon-MSD', 'P.Sor.MSD', 'PENRO Sorsogon - Management Services Division', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'B. Road, Sorsogon City, Sorsogon', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(117, '0e4f8168-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Sorsogon-MSD-Admin', 'P.Sor.Admin', 'PENRO Sorsogon - Administrator Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'B. Road, Sorsogon City, Sorsogon', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(118, '0e4f81c4-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Sorsogon-MSD-Finance', 'P.Sor.Finance', 'PENRO Sorsogon - Finance Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'B. Road, Sorsogon City, Sorsogon', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(119, '0e4f8231-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Sorsogon-MSD-Planning', 'P.Sor.PMS', 'PENRO Sorsogon - Planning and Management Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'B. Road, Sorsogon City, Sorsogon', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(120, '0e4f82e8-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Sorsogon-TSD', 'P.Sor.TSD', 'PENRO Sorsogon - Technical Services Division', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'B. Road, Sorsogon City, Sorsogon', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(121, '0e4f833e-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Sorsogon-TSD-Conservation', 'P.Sor.CDS', 'PENRO Sorsogon - Conservation and Development Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'B. Road, Sorsogon City, Sorsogon', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(122, '0e4f83c9-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Sorsogon-TSD-RPS', 'P.Sor.RPS', 'PENRO Sorsogon - Regulation and Permitting Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'B. Road, Sorsogon City, Sorsogon', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(123, '0e4f8425-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Sorsogon-TSD-Enforcement', 'P.Sor.Enforcement', 'PENRO Sorsogon - Enforcement Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'B. Road, Sorsogon City, Sorsogon', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(124, '0e4f847f-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Guinobatan-CDS', 'C.Gbtn.CDS', 'CENRO Guinobatan - Conservation and Development Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Morera, Guinobatan, Albay', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(125, '0e4f84db-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Guinobatan-RPS', 'C.Gbtn.RPS', 'CENRO Guinobatan - Regulation and Permitting Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Morera, Guinobatan, Albay', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(126, '0e4f8535-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Guinobatan-Enforcement', 'C.Gbtn.Enforcement', 'CENRO Guinobatan - Enforcement Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Morera, Guinobatan, Albay', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(127, '0e4f85f9-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Iriga-CDS', 'C.Iriga.CDS', 'CENRO Iriga - Conservation and Development Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Iriga City, Camarines Sur', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(128, '0e4f8656-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Iriga-RPS', 'C.Iriga.RPS', 'CENRO Iriga - Regulation and Permitting Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Iriga City, Camarines Sur', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(129, '0e4f86b0-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Iriga-Enforcement', 'C.Iriga.Enforcement', 'CENRO Iriga - Enforcement Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Iriga City, Camarines Sur', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(130, '0e4f8768-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Goa-CDS', 'C.Goa.CDS', 'CENRO Goa - Conservation and Development Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Catagbacan, Goa, Camarines Sur', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(131, '0e4f88cd-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Goa-RPS', 'C.Goa.RPS', 'CENRO Goa - Regulation and Permitting Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Catagbacan, Goa, Camarines Sur', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(132, '0e4f892a-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Goa-Enforcement', 'C.Goa.Enforcement', 'CENRO Goa - Enforcement Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Catagbacan, Goa, Camarines Sur', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(133, '0e4f89e0-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Sipocot-CDS', 'C.Sipocot.CDS', 'CENRO Sipocot - Conservation and Development Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Sipocot, Camarines Sur', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(134, '0e4f8a3b-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Sipocot-RPS', 'C.Sipocot.RPS', 'CENRO Sipocot - Regulation and Permitting Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Sipocot, Camarines Sur', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(135, '0e4f8aa0-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Sipocot-Enforcement', 'C.Sipocot.Enforcement', 'CENRO Sipocot - Enforcement Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Sipocot, Camarines Sur', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(136, '0e4f8b57-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Mobo-CDS', 'C.Mobo.CDS', 'CENRO Mobo - Conservation and Development Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Medina St, Mobo, Masbate', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(137, '0e4f8bb2-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Mobo-RPS', 'C.Mobo.RPS', 'CENRO Mobo - Regulation and Permitting Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Medina St, Mobo, Masbate', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(138, '0e4f8c0f-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Mobo-Enforcement', 'C.Mobo.Enforcement', 'CENRO Mobo - Enforcement Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Medina St, Mobo, Masbate', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(139, '0e4f9795-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-SanJacinto-CDS', 'C.SJ.CDS', 'CENRO San Jacinto - Conservation and Development Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'San Jacinto, Masbate', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(140, '0e4f97fd-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-SanJacinto-RPS', 'C.SJ.RPS', 'CENRO San Jacinto - Regulation and Permitting Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'San Jacinto, Masbate', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(141, '0e4f9974-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-SanJacinto-Enforcement', 'C.SJ.Enforcement', 'CENRO San Jacinto - Enforcement Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'San Jacinto, Masbate', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(142, '0e4f9a73-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-DENREU', 'DENREU', 'DENREU', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(143, '0e4f9ad9-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CANVASSER-ORED', 'Canvass.ORED', 'ORED', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(144, '0e4f9b39-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CANVASSER-OARDMS', 'Canvass.OARDMS', 'OARDMS', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(145, '0e4f9bd9-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CANVASSER-OARDTS', 'Canvass.OARDTS', 'OARDTS', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(146, '0e4f9c38-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-BACSEC', 'BAC', 'Bids and Awards Committee', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(147, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-RecvCheck', 'RV.RS', 'Regional Office V - Records Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(148, '0e4f9cfa-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Albay-Receiving', 'P.Albay.RS', 'PENRO Albay - Records Section', 'Receiving', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Legazpi Port District, Legazpi City, Albay', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(149, '0e4f9d5e-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CNorte-Receiving', 'P.CNorte.RS', 'PENRO Cam Norte - Records Section', 'Receiving', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Daet, Camarines Norte', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(150, '0e4f9dbd-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CSur-Receiving', 'P.CSur.RS', 'PENRO Cam Sur - Records Section', 'Receiving', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Panganiban Drive, Naga City, Camarines Sur', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(151, '0e4f9e19-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Masbate-Receiving', 'P.Masbate.RS', 'PENRO Masbate - Records Section', 'Receiving', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Zurbito Street, Masbate City', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(152, '0e4f9e73-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Catnes-Receiving', 'P.Catnes.RS', 'PENRO Catanduanes - Records Section', 'Receiving', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'San Isidro Village, Virac, Catanduanes', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(153, '0e4f9fd1-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Sorsogon-Receiving', 'P.Sor.RS', 'PENRO Sorsogon - Records Section', 'Receiving', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'B. Road, Sorsogon City, Sorsogon', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(154, '0e4fa032-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Guinobatan-Receiving', 'C.Gbtn.RS', 'CENRO Guinobatan - Records Section', 'Receiving', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Morera, Guinobatan, Albay', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(155, '0e4fa08a-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Iriga-Receiving', 'C.Iriga.RS', 'CENRO Iriga - Records Section', 'Receiving', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Iriga City, Camarines Sur', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(156, '0e4fa0e8-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Sipocot-Receiving', 'C.Sipocot.RS', 'CENRO Sipocot - Records Section', 'Receiving', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Sipocot, Camarines Sur', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(157, '0e4fa144-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Goa-Receiving', 'C.Goa.RS', 'CENRO Goa - Records Section', 'Receiving', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Catagbacan, Goa, Camarines Sur', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(158, '0e4fa1a6-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Mobo-Receiving', 'C.Mobo.RS', 'CENRO Mobo - Records Section', 'Receiving', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Medina St, Mobo, Masbate', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(159, '0e4fa202-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-SanJacinto-Receiving', 'C.SJ.RS', 'CENRO San Jacinto - Records Section', 'Receiving', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'San Jacinto, Masbate', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(160, '0e4fa25f-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Guinobatan-Cashier', 'C.Gbtn.Cashier', 'CENRO Guinobatan - Cashier Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Morera, Guinobatan, Albay', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(161, '0e4fa2bc-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Catnes-TSD', 'P.Catnes.TSD', 'PENRO Catanduanes - Technical Service Division', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'San Isidro Village, Virac, Catanduanes', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(162, '0e4fa3ee-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Catnes-ADFS-AccU', 'P.Catnes.ADFS.AccU', 'PENRO Catanduanes - Accounting Office', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'San Isidro Village, Virac, Catanduanes', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(163, '0e4fa46f-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Catnes-ADFS-Cashier', 'P.Catnes.ADFS.Cashier', 'PENRO Catanduanes - Cashier Office', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'San Isidro Village, Virac, Catanduanes', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(164, '0e4fa4cb-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Catnes-FUU', 'P.Catnes.FUU', 'PENRO Catanduanes - Forest Utilization Unit', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'San Isidro Village, Virac, Catanduanes', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(165, '0e4fa528-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Goa-Cashier', 'R5.CENRO.Goa.Cashier', 'CENRO Goa - Cashier', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Catagbacan, Goa, Camarines Sur', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(166, '0e4fa58c-d705-11ef-b430-3c7c3f2bc7d9', 7, 'P-Albay-Cashier', 'P.Albay.Cashier', 'PENRO Albay - Cashier', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Legazpi Port District, Legazpi City, Albay', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(167, '0e4fa5eb-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-Sorsogon-Cashier', 'P.Sor.Cashier', 'PENRO Sorsogon - Cashier', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'B. Road, Sorsogon City, Sorsogon', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(168, '0e4fa648-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CNorte-Cashier', 'P.CN.Cashier', 'PENRO Cam Norte - Cashier', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Daet, Camarines Norte', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(169, '0e4fa6a9-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Sipocot-Cashier', 'C.Sipocot.Cashier', 'CENRO Sipocot - Cashier', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Sipocot, Camarines Sur', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(170, '0e4fa708-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Mobo-Cashier', 'C.Mobo.Cashier', 'CENRO Mobo - Cashier', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Medina St, Mobo, Masbate', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(171, '0e4fa83d-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-SanJacinto-Cashier', 'C.SJ.Cashier', 'CENRO San Jacinto - Cashier', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'San Jacinto, Masbate', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(172, '0e4fa89d-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CSur-Cashier', 'P.CSur.Cashier', 'PENRO Cam Sur - Cashier', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Panganiban Drive, Naga City, Camarines Sur', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(173, '0e4fa8f8-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-PENRO-CSur-ICT', 'P.CSur.ICT', 'PENRO Cam Sur - ICT', 'Office', NULL, NULL, 'unset', 'unset', 'unset', NULL, NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50'),
(174, '0e4fa966-d705-11ef-b430-3c7c3f2bc7d9', 7, 'R5-CENRO-Iriga-Cashier', 'C.Iriga.Cashier', 'CENRO Iriga - Cashier', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Iriga City, Camarines Sur', NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50');

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

-- --------------------------------------------------------

--
-- Table structure for table `redts_j_user_offices`
--

CREATE TABLE `redts_j_user_offices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_uuid` char(36) DEFAULT NULL COMMENT 'from b_user',
  `offices_id` bigint(20) UNSIGNED DEFAULT NULL,
  `offices_uuid` char(36) DEFAULT NULL COMMENT 'from f_offices',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redts_j_user_offices`
--

INSERT INTO `redts_j_user_offices` (`id`, `user_id`, `user_uuid`, `offices_id`, `offices_uuid`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '5d2efb68-d6ff-11ef-b430-3c7c3f2bc7d9', 161, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(2, 2, '5d2f0949-d6ff-11ef-b430-3c7c3f2bc7d9', 4, '0e4f165f-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(3, 304, '5d2f09e3-d6ff-11ef-b430-3c7c3f2bc7d9', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(4, 315, '5d2f0acb-d6ff-11ef-b430-3c7c3f2bc7d9', 161, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(5, 316, '5d2f0b29-d6ff-11ef-b430-3c7c3f2bc7d9', 168, '0e4fa032-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(6, 321, '5d2f0cb1-d6ff-11ef-b430-3c7c3f2bc7d9', 176, '0e4fa25f-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(7, 322, '5d2f0e0e-d6ff-11ef-b430-3c7c3f2bc7d9', 47, '0e4f2a23-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(8, 324, '5d2f0e71-d6ff-11ef-b430-3c7c3f2bc7d9', 161, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(9, 314, '5d2f0a64-d6ff-11ef-b430-3c7c3f2bc7d9', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(10, 317, '5d2f0c05-d6ff-11ef-b430-3c7c3f2bc7d9', 133, '0e4f84db-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(11, 319, '5d2f0c5e-d6ff-11ef-b430-3c7c3f2bc7d9', 1, '0e4f0a5b-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(12, 340, '5d2f0ec7-d6ff-11ef-b430-3c7c3f2bc7d9', 172, '0e4fa1a6-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(13, 341, '5d2f0f19-d6ff-11ef-b430-3c7c3f2bc7d9', 166, '0e4f9e73-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(14, 342, '5d2f0f78-d6ff-11ef-b430-3c7c3f2bc7d9', 45, '0e4f297d-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(15, 343, '5d2f0fce-d6ff-11ef-b430-3c7c3f2bc7d9', 112, '0e4f7c60-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(16, 344, '5d2f1027-d6ff-11ef-b430-3c7c3f2bc7d9', 181, '0e4fa2bc-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(17, 345, '5d2f107a-d6ff-11ef-b430-3c7c3f2bc7d9', 181, '0e4fa2bc-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(18, 346, '5d2f10ea-d6ff-11ef-b430-3c7c3f2bc7d9', 182, '0e4fa3ee-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(19, 347, '5d2f1143-d6ff-11ef-b430-3c7c3f2bc7d9', 183, '0e4fa46f-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(20, 348, '5d2f1199-d6ff-11ef-b430-3c7c3f2bc7d9', 184, '0e4fa4cb-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(21, 349, '5d2f11ea-d6ff-11ef-b430-3c7c3f2bc7d9', 1, '0e4f0a5b-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(22, 350, '5d2f123b-d6ff-11ef-b430-3c7c3f2bc7d9', 162, '0e4f9cfa-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(23, 351, '5d2f1291-d6ff-11ef-b430-3c7c3f2bc7d9', 84, '0e4f716b-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(24, 352, '5d2f12c8-d6ff-11ef-b430-3c7c3f2bc7d9', 82, '0e4f70aa-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(25, 353, '5d2f12fb-d6ff-11ef-b430-3c7c3f2bc7d9', 41, '0e4f2821-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(26, 354, '5d2f132d-d6ff-11ef-b430-3c7c3f2bc7d9', 77, '0e4f698b-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(27, 355, '5d2f1361-d6ff-11ef-b430-3c7c3f2bc7d9', 85, '0e4f71c5-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(28, 356, '5d2f1392-d6ff-11ef-b430-3c7c3f2bc7d9', 83, '0e4f7106-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(29, 357, '5d2f13c4-d6ff-11ef-b430-3c7c3f2bc7d9', 79, '0e4f6dc9-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(30, 358, '5d2f13f5-d6ff-11ef-b430-3c7c3f2bc7d9', 78, '0e4f6c45-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(31, 359, '5d2f1426-d6ff-11ef-b430-3c7c3f2bc7d9', 80, '0e4f6fcd-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(32, 360, '5d2f1457-d6ff-11ef-b430-3c7c3f2bc7d9', 23, '0e4f2086-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(33, 361, '5d2f148b-d6ff-11ef-b430-3c7c3f2bc7d9', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(34, 362, '5d2f14bb-d6ff-11ef-b430-3c7c3f2bc7d9', 141, '0e4f88cd-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(35, 363, '5d2f14ed-d6ff-11ef-b430-3c7c3f2bc7d9', 50, '0e4f2b5d-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(36, 364, '5d2f151e-d6ff-11ef-b430-3c7c3f2bc7d9', 141, '0e4f88cd-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(37, 365, '5d2f154f-d6ff-11ef-b430-3c7c3f2bc7d9', 141, '0e4f88cd-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(38, 366, '5d2f157f-d6ff-11ef-b430-3c7c3f2bc7d9', 50, '0e4f2b5d-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(39, 367, '5d2f15af-d6ff-11ef-b430-3c7c3f2bc7d9', 50, '0e4f2b5d-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(40, 368, '5d2f15e0-d6ff-11ef-b430-3c7c3f2bc7d9', 50, '0e4f2b5d-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(41, 369, '5d2f1611-d6ff-11ef-b430-3c7c3f2bc7d9', 50, '0e4f2b5d-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(42, 370, '5d2f1641-d6ff-11ef-b430-3c7c3f2bc7d9', 167, '0e4f9fd1-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(43, 371, '5d2f1673-d6ff-11ef-b430-3c7c3f2bc7d9', 27, '0e4f227c-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(44, 372, '5d2f16a6-d6ff-11ef-b430-3c7c3f2bc7d9', 27, '0e4f227c-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(45, 373, '5d2f16d8-d6ff-11ef-b430-3c7c3f2bc7d9', 168, '0e4fa032-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(46, 374, '5d2f1717-d6ff-11ef-b430-3c7c3f2bc7d9', 41, '0e4f2821-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(47, 375, '5d2f1747-d6ff-11ef-b430-3c7c3f2bc7d9', 23, '0e4f2086-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(48, 376, '5d2f1778-d6ff-11ef-b430-3c7c3f2bc7d9', 22, '0e4f200e-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(49, 377, '5d2f17b2-d6ff-11ef-b430-3c7c3f2bc7d9', 1, '0e4f0a5b-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(50, 378, '5d2f18b3-d6ff-11ef-b430-3c7c3f2bc7d9', 161, '0e4f9c94-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(51, 379, '5d2f1905-d6ff-11ef-b430-3c7c3f2bc7d9', 133, '0e4f84db-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(52, 380, '5d2f193c-d6ff-11ef-b430-3c7c3f2bc7d9', 84, '0e4f716b-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(53, 381, '5d2f1974-d6ff-11ef-b430-3c7c3f2bc7d9', 84, '0e4f716b-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(54, 382, '5d2f19ab-d6ff-11ef-b430-3c7c3f2bc7d9', 186, '0e4fa58c-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(55, 383, '5d2f19e0-d6ff-11ef-b430-3c7c3f2bc7d9', 84, '0e4f716b-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(56, 384, '5d2f1a16-d6ff-11ef-b430-3c7c3f2bc7d9', 84, '0e4f716b-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(57, 385, '5d2f1b6b-d6ff-11ef-b430-3c7c3f2bc7d9', 130, '0e4f83c9-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(58, 386, '5d2f1ba3-d6ff-11ef-b430-3c7c3f2bc7d9', 130, '0e4f83c9-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(59, 387, '5d2f1bd5-d6ff-11ef-b430-3c7c3f2bc7d9', 130, '0e4f83c9-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(60, 388, '5d2f1c1c-d6ff-11ef-b430-3c7c3f2bc7d9', 187, '0e4fa5eb-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(61, 389, '5d2f1c52-d6ff-11ef-b430-3c7c3f2bc7d9', 93, '0e4f7518-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(62, 390, '5d2f1c85-d6ff-11ef-b430-3c7c3f2bc7d9', 188, '0e4fa648-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(63, 391, '5d2f1d65-d6ff-11ef-b430-3c7c3f2bc7d9', 112, '0e4f7c60-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(64, 392, '5d2f1e1e-d6ff-11ef-b430-3c7c3f2bc7d9', 112, '0e4f7c60-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(65, 393, '5d2f1e64-d6ff-11ef-b430-3c7c3f2bc7d9', 112, '0e4f7c60-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(66, 394, '5d2f1e96-d6ff-11ef-b430-3c7c3f2bc7d9', 183, '0e4fa46f-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(67, 395, '5d2f1f79-d6ff-11ef-b430-3c7c3f2bc7d9', 112, '0e4f7c60-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(68, 398, '5d2f1fad-d6ff-11ef-b430-3c7c3f2bc7d9', 133, '0e4f84db-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(69, 399, '5d2f1fe1-d6ff-11ef-b430-3c7c3f2bc7d9', 133, '0e4f84db-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(70, 400, '5d2f20be-d6ff-11ef-b430-3c7c3f2bc7d9', 133, '0e4f84db-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(71, 401, '5d2f20f3-d6ff-11ef-b430-3c7c3f2bc7d9', 176, '0e4fa25f-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(72, 402, '5d2f2125-d6ff-11ef-b430-3c7c3f2bc7d9', 141, '0e4f88cd-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(73, 403, '5d2f2202-d6ff-11ef-b430-3c7c3f2bc7d9', 141, '0e4f88cd-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(74, 404, '5d2f2237-d6ff-11ef-b430-3c7c3f2bc7d9', 141, '0e4f88cd-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(75, 405, '5d2f2324-d6ff-11ef-b430-3c7c3f2bc7d9', 185, '0e4fa528-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(76, 406, '5d2f235b-d6ff-11ef-b430-3c7c3f2bc7d9', 141, '0e4f88cd-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(77, 407, '5d2f3425-d6ff-11ef-b430-3c7c3f2bc7d9', 141, '0e4f88cd-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(78, 408, '5d2f349e-d6ff-11ef-b430-3c7c3f2bc7d9', 145, '0e4f8a3b-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(79, 409, '5d2f35a7-d6ff-11ef-b430-3c7c3f2bc7d9', 145, '0e4f8a3b-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(80, 410, '5d2f36c8-d6ff-11ef-b430-3c7c3f2bc7d9', 145, '0e4f8a3b-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(81, 411, '5d2f37c7-d6ff-11ef-b430-3c7c3f2bc7d9', 189, '0e4fa6a9-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(82, 412, '5d2f38c4-d6ff-11ef-b430-3c7c3f2bc7d9', 149, '0e4f8bb2-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(83, 413, '5d2f39bf-d6ff-11ef-b430-3c7c3f2bc7d9', 149, '0e4f8bb2-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(84, 414, '5d2f3d55-d6ff-11ef-b430-3c7c3f2bc7d9', 149, '0e4f8bb2-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(85, 415, '5d2f3da6-d6ff-11ef-b430-3c7c3f2bc7d9', 190, '0e4fa708-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(86, 416, '5d2f3dec-d6ff-11ef-b430-3c7c3f2bc7d9', 153, '0e4f97fd-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(87, 417, '5d2f3e44-d6ff-11ef-b430-3c7c3f2bc7d9', 153, '0e4f97fd-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(88, 418, '5d2f3e7b-d6ff-11ef-b430-3c7c3f2bc7d9', 153, '0e4f97fd-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(89, 419, '5d2f3eb2-d6ff-11ef-b430-3c7c3f2bc7d9', 191, '0e4fa83d-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(90, 420, '5d2f3eed-d6ff-11ef-b430-3c7c3f2bc7d9', 171, '0e4fa144-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(91, 421, '5d2f3f27-d6ff-11ef-b430-3c7c3f2bc7d9', 84, '0e4f716b-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(92, 422, '5d2f3f60-d6ff-11ef-b430-3c7c3f2bc7d9', 167, '0e4f9fd1-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(93, 423, '5d2f3f98-d6ff-11ef-b430-3c7c3f2bc7d9', 130, '0e4f83c9-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(94, 424, '5d2f3fd7-d6ff-11ef-b430-3c7c3f2bc7d9', 130, '0e4f83c9-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(95, 425, '5d2f4039-d6ff-11ef-b430-3c7c3f2bc7d9', 163, '0e4f9d5e-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(96, 428, '5d2f40ab-d6ff-11ef-b430-3c7c3f2bc7d9', 93, '0e4f7518-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(97, 429, '5d2f4109-d6ff-11ef-b430-3c7c3f2bc7d9', 93, '0e4f7518-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(98, 430, '5d2f4163-d6ff-11ef-b430-3c7c3f2bc7d9', 166, '0e4f9e73-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(99, 433, '5d2f41cd-d6ff-11ef-b430-3c7c3f2bc7d9', 165, '0e4f9e19-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(100, 434, '5d2f4243-d6ff-11ef-b430-3c7c3f2bc7d9', 121, '0e4f8053-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(101, 435, '5d2f42a4-d6ff-11ef-b430-3c7c3f2bc7d9', 121, '0e4f8053-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(102, 437, '5d2f42fc-d6ff-11ef-b430-3c7c3f2bc7d9', 168, '0e4fa032-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(103, 440, '5d2f4357-d6ff-11ef-b430-3c7c3f2bc7d9', 133, '0e4f84db-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(104, 441, '5d2f43af-d6ff-11ef-b430-3c7c3f2bc7d9', 133, '0e4f84db-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(105, 442, '5d2f440a-d6ff-11ef-b430-3c7c3f2bc7d9', 170, '0e4fa0e8-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(106, 443, '5d2f446f-d6ff-11ef-b430-3c7c3f2bc7d9', 173, '0e4fa202-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(107, 444, '5d2f44ca-d6ff-11ef-b430-3c7c3f2bc7d9', 133, '0e4f84db-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(108, 445, '5d2f4523-d6ff-11ef-b430-3c7c3f2bc7d9', 165, '0e4f9e19-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(109, 446, '5d2f457c-d6ff-11ef-b430-3c7c3f2bc7d9', 103, '0e4f7927-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(110, 447, '5d2f45e2-d6ff-11ef-b430-3c7c3f2bc7d9', 103, '0e4f7927-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(111, 448, '5d2f461e-d6ff-11ef-b430-3c7c3f2bc7d9', 103, '0e4f7927-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(112, 449, '5d2f4655-d6ff-11ef-b430-3c7c3f2bc7d9', 192, '0e4fa89d-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(113, 450, '5d2f468b-d6ff-11ef-b430-3c7c3f2bc7d9', 164, '0e4f9dbd-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(114, 451, '5d2f46c3-d6ff-11ef-b430-3c7c3f2bc7d9', 165, '0e4f9e19-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(115, 452, '5d2f46fa-d6ff-11ef-b430-3c7c3f2bc7d9', 169, '0e4fa08a-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(116, 453, '5d2f4732-d6ff-11ef-b430-3c7c3f2bc7d9', 137, '0e4f8656-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(117, 454, '5d2f476a-d6ff-11ef-b430-3c7c3f2bc7d9', 137, '0e4f8656-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(118, 455, '5d2f47a3-d6ff-11ef-b430-3c7c3f2bc7d9', 137, '0e4f8656-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(119, 456, '5d2f47d9-d6ff-11ef-b430-3c7c3f2bc7d9', 137, '0e4f8656-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(120, 457, '5d2f4810-d6ff-11ef-b430-3c7c3f2bc7d9', 194, '0e4fa966-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(121, 459, '5d2f4849-d6ff-11ef-b430-3c7c3f2bc7d9', 171, '0e4fa144-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(122, 460, '5d2f4881-d6ff-11ef-b430-3c7c3f2bc7d9', 171, '0e4fa144-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(123, 461, '5d2f48fd-d6ff-11ef-b430-3c7c3f2bc7d9', 170, '0e4fa0e8-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(124, 462, '5d2f4937-d6ff-11ef-b430-3c7c3f2bc7d9', 170, '0e4fa0e8-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(125, 463, '5d2f496d-d6ff-11ef-b430-3c7c3f2bc7d9', 172, '0e4fa1a6-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(126, 464, '5d2f49a4-d6ff-11ef-b430-3c7c3f2bc7d9', 51, '0e4f2bb0-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(127, 465, '5d2f49dc-d6ff-11ef-b430-3c7c3f2bc7d9', 173, '0e4fa202-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(128, 466, '5d2f4a14-d6ff-11ef-b430-3c7c3f2bc7d9', 173, '0e4fa202-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(129, 467, '5d2f4a4c-d6ff-11ef-b430-3c7c3f2bc7d9', 50, '0e4f2b5d-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(130, 468, '5d2f4a85-d6ff-11ef-b430-3c7c3f2bc7d9', 26, '0e4f2205-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(131, 469, '5d2f4abc-d6ff-11ef-b430-3c7c3f2bc7d9', 22, '0e4f200e-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(132, 470, '5d2f4af5-d6ff-11ef-b430-3c7c3f2bc7d9', 49, '0e4f2b09-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(133, 471, '5d2f4b2d-d6ff-11ef-b430-3c7c3f2bc7d9', 48, '0e4f2aa9-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(134, 472, '5d2f4b65-d6ff-11ef-b430-3c7c3f2bc7d9', 48, '0e4f2aa9-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(135, 473, '5d2f4ba7-d6ff-11ef-b430-3c7c3f2bc7d9', 48, '0e4f2aa9-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(136, 474, '5d2f4be0-d6ff-11ef-b430-3c7c3f2bc7d9', 48, '0e4f2aa9-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(137, 475, '5d2f4cad-d6ff-11ef-b430-3c7c3f2bc7d9', 145, '0e4f8a3b-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(138, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(139, 483, '07a1a310-71be-4f49-b471-a1482fa6bd0e', 1, '0e4f0a5b-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-01 06:13:49', '2025-07-01 06:13:49'),
(140, 484, 'a27d2940-14c4-40ad-8d35-382223a5eed2', 41, '0e4f2821-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-07-09 00:57:33', '2025-07-09 00:57:33');

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

-- --------------------------------------------------------

--
-- Table structure for table `redts_na_action_attachments`
--

CREATE TABLE `redts_na_action_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `action_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'referenced to n_action id',
  `action_uuid` char(36) DEFAULT NULL COMMENT 'comment here',
  `doc_no` varchar(255) DEFAULT NULL,
  `doc_uuid` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) NOT NULL DEFAULT 'n/a',
  `file_name` varchar(255) NOT NULL DEFAULT 'n/a',
  `file_link` varchar(255) NOT NULL DEFAULT 'n/a',
  `uploaded` datetime DEFAULT NULL,
  `downloaded` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `public` tinyint(3) UNSIGNED DEFAULT 0 COMMENT 'Allow public views'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redts_na_action_attachments`
--

INSERT INTO `redts_na_action_attachments` (`id`, `action_id`, `action_uuid`, `doc_no`, `doc_uuid`, `remarks`, `file_path`, `file_name`, `file_link`, `uploaded`, `downloaded`, `deleted_at`, `created_at`, `updated_at`, `public`) VALUES
(1, 5, '3fa0236e-b8cb-43a3-9116-b5cdb3bb4e31', 'P.ALBAY.RS-MEMO-2025.10.13-2116.06.45', '2a52546c-498b-4e11-92e0-f8fba1cbd6e0', 'FileName1', 'action_files', 'ad4_FileName1_202510131612.PDF', 'n/a', '2025-10-13 16:12:54', NULL, NULL, '2025-10-13 08:12:18', '2025-10-13 08:12:54', 0);

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
(1, 4, 'e7a72926-83eb-4c65-9e18-8614bc2a14f0', 5, '3fa0236e-b8cb-43a3-9116-b5cdb3bb4e31', NULL, '2025-10-13 08:12:17', '2025-10-13 08:12:17');

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
(1, 4, 'e7a72926-83eb-4c65-9e18-8614bc2a14f0', NULL, '2025-10-13 08:11:08', '2025-10-13 08:11:08'),
(2, 6, '70d108dd-55a8-4ba2-9569-f6acedf87a19', NULL, '2025-10-13 08:37:10', '2025-10-13 08:37:10'),
(3, 7, 'af512b52-d23a-47dd-941f-4d0178920d98', NULL, '2025-10-15 05:26:28', '2025-10-15 05:26:28');

-- --------------------------------------------------------

--
-- Table structure for table `redts_n_actions`
--

CREATE TABLE `redts_n_actions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `subject` longtext DEFAULT NULL,
  `doc_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'from main doc',
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
  `downloaded` datetime DEFAULT NULL COMMENT 'insert or update when needed',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redts_n_actions`
--

INSERT INTO `redts_n_actions` (`id`, `uuid`, `subject`, `doc_id`, `doc_uuid`, `doc_no`, `sender_client_id`, `sender_user_id`, `sender_user_uuid`, `sender_type`, `referred_by_office`, `referred_by_office_uuid`, `action_taken`, `send_to_office`, `send_to_office_uuid`, `validated`, `received_id`, `received_uuid`, `received`, `released`, `final_action`, `rejected`, `verification_date`, `in_transit_remarks`, `document_remarks`, `action_remarks`, `attachment_remarks`, `uploaded_act`, `downloaded`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '3cca4951-98ed-4e60-9395-e7f7015ce658', 'TEST1', 1, '510318b0-2553-4141-911c-29f8f4fb3390', 'PMD.ICT-MEMO-2025.10.07-47615.57.49', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'User', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, 162, '0e4f9cfa-d705-11ef-b430-3c7c3f2bc7d9', '2025-10-07 16:10:10', 350, '5d2f123b-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-10-07 08:03:41', '2025-10-07 08:04:46', NULL, NULL, '2025-10-07 08:10:10', NULL, NULL, 'TESTED ONLY', NULL, NULL, '2025-10-13 16:07:49', NULL, '2025-10-07 08:03:10', '2025-10-07 08:04:46'),
(2, '3ad7d6fb-b2cd-430f-9b68-0fdbf2b95912', 'TEST1', 1, '510318b0-2553-4141-911c-29f8f4fb3390', 'PMD.ICT-MEMO-2025.10.07-47615.57.49', NULL, 350, '5d2f123b-d6ff-11ef-b430-3c7c3f2bc7d9', 'Receiving and Releasing Clerk', 162, '0e4f9cfa-d705-11ef-b430-3c7c3f2bc7d9', 'TESTED ONLY', 166, '0e4f9e73-d705-11ef-b430-3c7c3f2bc7d9', NULL, 341, '5d2f0f19-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-10-07 08:05:35', '2025-10-07 08:06:07', NULL, NULL, NULL, NULL, NULL, 'RETURNED TO ICT', 'SAMPLE', NULL, '2025-10-13 16:07:49', NULL, '2025-10-07 08:04:46', '2025-10-07 08:06:07'),
(3, 'd578330f-57e7-44a4-a23c-fcc666925566', 'TEST1', 1, '510318b0-2553-4141-911c-29f8f4fb3390', 'PMD.ICT-MEMO-2025.10.07-47615.57.49', NULL, 341, '5d2f0f19-d6ff-11ef-b430-3c7c3f2bc7d9', 'Validator', 166, '0e4f9e73-d705-11ef-b430-3c7c3f2bc7d9', 'ENDED ACTION HERE', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, 304, '5d2f09e3-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-10-07 08:06:34', NULL, '2025-10-07 08:07:07', NULL, NULL, NULL, NULL, 'ENDED ACTION HERE', NULL, NULL, '2025-10-13 16:07:49', NULL, '2025-10-07 08:06:07', '2025-10-07 08:07:07'),
(4, 'e7a72926-83eb-4c65-9e18-8614bc2a14f0', 'SAMPLE SUBJECT 1', 8, '2a52546c-498b-4e11-92e0-f8fba1cbd6e0', 'P.ALBAY.RS-MEMO-2025.10.13-2116.06.45', NULL, 21, '5d2f123b-d6ff-11ef-b430-3c7c3f2bc7d9', 'User', 148, '0e4f9cfa-d705-11ef-b430-3c7c3f2bc7d9', NULL, 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', '2025-10-13 16:10:44', 3, '5d2f09e3-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-10-13 08:10:55', '2025-10-13 08:12:17', NULL, NULL, '2025-10-13 08:10:44', NULL, NULL, 'SAMPLE', NULL, '2025-10-13 08:12:53', '2025-10-13 16:12:53', NULL, '2025-10-13 08:07:44', '2025-10-13 08:12:53'),
(5, '3fa0236e-b8cb-43a3-9116-b5cdb3bb4e31', 'SAMPLE SUBJECT 1', 8, '2a52546c-498b-4e11-92e0-f8fba1cbd6e0', 'P.ALBAY.RS-MEMO-2025.10.13-2116.06.45', NULL, NULL, '5d2f09e3-d6ff-11ef-b430-3c7c3f2bc7d9', 'Receiving and Releasing Clerk', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', 'SAMPLE', 151, '0e4f9e19-d705-11ef-b430-3c7c3f2bc7d9', NULL, 433, '5d2f41cd-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-10-13 08:18:07', '2025-10-13 08:18:52', NULL, NULL, NULL, NULL, NULL, 'FILE ATTACHING ONLINE', NULL, '2025-10-13 08:12:53', '2025-10-13 16:19:13', NULL, '2025-10-13 08:12:53', '2025-10-13 08:18:52'),
(6, '70d108dd-55a8-4ba2-9569-f6acedf87a19', 'SAMPLE SUBJECT 1', 8, '2a52546c-498b-4e11-92e0-f8fba1cbd6e0', 'P.ALBAY.RS-MEMO-2025.10.13-2116.06.45', NULL, 433, '5d2f41cd-d6ff-11ef-b430-3c7c3f2bc7d9', 'Validator', 165, '0e4f9e19-d705-11ef-b430-3c7c3f2bc7d9', 'FINAL ACTION', 162, '0e4f9cfa-d705-11ef-b430-3c7c3f2bc7d9', NULL, 21, '5d2f123b-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-10-13 08:37:06', NULL, '2025-10-13 08:47:28', NULL, NULL, NULL, NULL, 'FINAL ACTION', NULL, '2025-10-13 08:47:54', '2025-10-13 16:47:54', NULL, '2025-10-13 00:18:52', '2025-10-13 08:47:54'),
(7, 'af512b52-d23a-47dd-941f-4d0178920d98', 'FROM ONLINE', 3, '87f866ce-e81d-46ca-8b9d-8d0a1b6568c7', 'PMD.ICT-MEMO-2025.10.15-47613.24.47', NULL, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 'User', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', '2025-10-15 13:10:04', 123, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', '2025-10-15 05:25:28', NULL, NULL, NULL, '2025-10-15 05:10:04', NULL, NULL, NULL, NULL, '2025-10-15 05:25:44', '2025-10-15 13:25:44', NULL, '2025-10-14 21:25:04', '2025-10-15 05:25:44');

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
(1, 15725760, NULL, '2025-07-01 06:13:50', '2025-07-01 06:13:50');

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
(1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', 'Government to Government', 'G2G', NULL, '2025-07-01 06:14:18', '2025-07-01 06:14:18'),
(2, '4721520c-d70c-11ef-b430-3c7c3f2bc7d9', 'Government to Business', 'G2B', NULL, '2025-07-01 06:14:18', '2025-07-01 06:14:18'),
(3, '4721527e-d70c-11ef-b430-3c7c3f2bc7d9', 'Government to Citizen', 'G2C', NULL, '2025-07-01 06:14:18', '2025-07-01 06:14:18'),
(4, '472152c4-d70c-11ef-b430-3c7c3f2bc7d9', 'Government to Academe', 'G2A', NULL, '2025-07-01 06:14:18', '2025-07-01 06:14:18');

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
  `class_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'classification id',
  `class_uuid` char(36) NOT NULL COMMENT 'indicates released by',
  `class_slug` varchar(255) NOT NULL,
  `subclass_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subclass_slug` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL COMMENT 'This is initial action subject',
  `validated` tinyint(4) DEFAULT NULL,
  `confidential` tinyint(1) DEFAULT 0,
  `doc_date` datetime DEFAULT NULL,
  `compliance_deadline` datetime DEFAULT NULL,
  `uploaded` datetime DEFAULT NULL COMMENT 'insert or update when needed',
  `downloaded` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redts_zd_client_doc_infos`
--

INSERT INTO `redts_zd_client_doc_infos` (`id`, `uuid`, `doc_no`, `application_type_id`, `application_type_uuid`, `transaction_type_id`, `transaction_type_uuid`, `agency`, `client_id`, `class_id`, `class_uuid`, `class_slug`, `subclass_id`, `subclass_slug`, `remarks`, `validated`, `confidential`, `doc_date`, `compliance_deadline`, `uploaded`, `downloaded`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'fe29411d-522a-4e0a-83e8-8ee2598bf16f', 'PMD.ICT-MEMO-2025.09.11-47617.58.08', 1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', NULL, NULL, 31, '73e93387-d88f-11ef-bf83-3c7c3f2bc7d9', 'memo', NULL, NULL, 'SAMPLE MEMO SYNC FROM ONLINE TO LOCAL', 1, 0, '2025-09-11 00:00:00', NULL, NULL, '2025-10-07 13:52:58', NULL, '2025-09-11 01:58:34', '2025-09-11 01:58:34'),
(2, '1c96fa70-24be-46ff-a735-096ab6b4e4d3', 'PMD.ICT-MEMO-2025.09.11-12318.03.28', 1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', NULL, NULL, 25, '73e93387-d88f-11ef-bf83-3c7c3f2bc7d9', 'memo', NULL, NULL, 'DESTINATION LOCAL', 1, 0, '2025-09-11 00:00:00', NULL, NULL, '2025-10-07 13:52:58', NULL, '2025-09-11 02:04:12', '2025-09-11 02:04:12'),
(3, '33925bb0-7b51-452f-b928-7ccafda7a102', 'PMD.ICT-APP-2025.09.12-12309.08.54', 1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', NULL, NULL, 4, '73e92d81-d88f-11ef-bf83-3c7c3f2bc7d9', 'app', NULL, NULL, 'TEST OFFLINE PROCESS HERE', 1, 0, '2025-09-12 00:00:00', NULL, NULL, '2025-10-07 13:52:58', NULL, '2025-09-11 18:02:15', '2025-09-11 18:02:15'),
(4, '5531875d-1348-40d1-9d8f-e73f6768848e', 'PMD.ICT-AFFIDVT-2025.09.12-47612.33.10', 1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', NULL, NULL, 8, '73e92c80-d88f-11ef-bf83-3c7c3f2bc7d9', 'affidvt', NULL, NULL, 'SAMPLE ONLINE', 1, 0, '2025-09-12 00:00:00', NULL, NULL, '2025-10-07 13:52:58', NULL, '2025-09-11 20:33:23', '2025-09-11 20:33:23'),
(5, '3e3af7b1-bee5-47dc-9e35-19852edc7389', 'PMD.ICT-APP-2025.09.12-12312.33.58', 1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', NULL, NULL, 4, '73e92d81-d88f-11ef-bf83-3c7c3f2bc7d9', 'app', NULL, NULL, 'FROM FIELD', 1, 0, '2025-09-12 00:00:00', NULL, NULL, '2025-10-07 13:52:58', NULL, '2025-09-11 20:35:40', '2025-09-11 20:35:40'),
(6, '7eb50906-da58-4698-90fb-cc7040c7cba3', 'PMD.ICT-AFFIDVT-2025.09.12-12312.34.29', 1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', NULL, NULL, 2, '73e92c80-d88f-11ef-bf83-3c7c3f2bc7d9', 'affidvt', NULL, NULL, 'FROM FIELD', 1, 0, '2025-09-12 00:00:00', NULL, NULL, '2025-10-07 13:52:58', NULL, '2025-09-11 20:35:40', '2025-09-11 20:35:40'),
(7, '510318b0-2553-4141-911c-29f8f4fb3390', 'PMD.ICT-MEMO-2025.10.07-47615.57.49', 1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', NULL, NULL, 31, '73e93387-d88f-11ef-bf83-3c7c3f2bc7d9', 'memo', NULL, NULL, 'TEST1', 1, 0, '2025-10-07 00:00:00', NULL, NULL, '2025-10-13 15:57:47', NULL, '2025-10-07 00:03:10', '2025-10-07 00:03:10'),
(8, '2a52546c-498b-4e11-92e0-f8fba1cbd6e0', 'P.ALBAY.RS-MEMO-2025.10.13-2116.06.45', 1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', NULL, NULL, 25, '73e93387-d88f-11ef-bf83-3c7c3f2bc7d9', 'memo', NULL, NULL, 'SAMPLE SUBJECT 1', 1, 0, '2025-10-13 00:00:00', NULL, '2025-10-13 16:07:48', '2025-10-13 16:07:48', NULL, '2025-10-13 08:07:44', '2025-10-13 08:07:48'),
(9, '87f866ce-e81d-46ca-8b9d-8d0a1b6568c7', 'PMD.ICT-MEMO-2025.10.15-47613.24.47', 1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', 1, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', NULL, NULL, 31, '73e93387-d88f-11ef-bf83-3c7c3f2bc7d9', 'memo', NULL, NULL, 'FROM ONLINE', 1, 0, '2025-10-15 00:00:00', NULL, NULL, '2025-10-15 13:25:13', NULL, '2025-10-14 21:25:04', '2025-10-14 21:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `redts_ze_client_doc_attachments`
--

CREATE TABLE `redts_ze_client_doc_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `doc_info_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doc_info_uuid` char(36) DEFAULT NULL COMMENT 'indicates released by',
  `req_id` bigint(20) UNSIGNED DEFAULT NULL,
  `app_form_no` int(11) NOT NULL,
  `req_slug` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL DEFAULT 'n/a',
  `file_name` varchar(255) NOT NULL DEFAULT 'n/a',
  `file_link` varchar(255) NOT NULL DEFAULT 'n/a',
  `text_input` varchar(255) NOT NULL DEFAULT 'n/a',
  `attachment_type` varchar(255) NOT NULL DEFAULT 'file',
  `uploaded` datetime DEFAULT NULL,
  `downloaded` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redts_ze_client_doc_attachments`
--

INSERT INTO `redts_ze_client_doc_attachments` (`id`, `uuid`, `doc_info_id`, `doc_info_uuid`, `req_id`, `app_form_no`, `req_slug`, `file_path`, `file_name`, `file_link`, `text_input`, `attachment_type`, `uploaded`, `downloaded`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '19143f95-2f8e-4fd2-bddd-8c381bc8e969', 8, '2a52546c-498b-4e11-92e0-f8fba1cbd6e0', NULL, 1, 'Attachment Remarks', 'n/a', 'n/a', 'n/a', 'SAMPLE ONLY', 'text', NULL, NULL, NULL, '2025-10-13 08:07:44', '2025-10-13 08:07:44');

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
  `doc_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'zd_client_doc_infos',
  `doc_uuid` char(36) DEFAULT NULL COMMENT 'indicates released by',
  `origin_office_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'f_offices',
  `origin_office_uuid` char(36) DEFAULT NULL COMMENT 'indicates released by',
  `uploaded` datetime DEFAULT NULL,
  `downloaded` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redts_zi_origin_offices`
--

INSERT INTO `redts_zi_origin_offices` (`id`, `user_id`, `user_uuid`, `doc_id`, `doc_uuid`, `origin_office_id`, `origin_office_uuid`, `uploaded`, `downloaded`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 1, 'fe29411d-522a-4e0a-83e8-8ee2598bf16f', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-10-07 13:52:59', NULL, '2025-10-07 05:52:59', '2025-10-07 05:52:59'),
(2, 123, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 2, '1c96fa70-24be-46ff-a735-096ab6b4e4d3', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-10-07 13:52:59', NULL, '2025-10-07 05:52:59', '2025-10-07 05:52:59'),
(3, 123, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 3, '33925bb0-7b51-452f-b928-7ccafda7a102', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-10-07 13:52:59', NULL, '2025-10-07 05:52:59', '2025-10-07 05:52:59'),
(4, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 4, '5531875d-1348-40d1-9d8f-e73f6768848e', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-10-07 13:52:59', NULL, '2025-10-07 05:52:59', '2025-10-07 05:52:59'),
(5, 123, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 5, '3e3af7b1-bee5-47dc-9e35-19852edc7389', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-10-07 13:52:59', NULL, '2025-10-07 05:52:59', '2025-10-07 05:52:59'),
(6, 123, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 6, '7eb50906-da58-4698-90fb-cc7040c7cba3', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-10-07 13:52:59', NULL, '2025-10-07 05:52:59', '2025-10-07 05:52:59'),
(7, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 1, '510318b0-2553-4141-911c-29f8f4fb3390', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-10-13 15:57:48', NULL, '2025-10-13 07:57:48', '2025-10-13 07:57:48'),
(8, 21, '5d2f123b-d6ff-11ef-b430-3c7c3f2bc7d9', 8, '2a52546c-498b-4e11-92e0-f8fba1cbd6e0', 148, '0e4f9cfa-d705-11ef-b430-3c7c3f2bc7d9', '2025-10-13 16:07:49', '2025-10-13 16:07:49', NULL, '2025-10-13 08:07:44', '2025-10-13 08:07:49'),
(9, 476, '5d2f4cfa-d6ff-11ef-b430-3c7c3f2bc7d9', 3, '87f866ce-e81d-46ca-8b9d-8d0a1b6568c7', 5, '0e4f16e7-d705-11ef-b430-3c7c3f2bc7d9', NULL, '2025-10-15 13:25:14', NULL, '2025-10-15 05:25:14', '2025-10-15 05:25:14');

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
  `transaction_id` bigint(20) UNSIGNED DEFAULT NULL,
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
(1, '07f89fc4-d70c-11ef-b430-3c7c3f2bc7d9', NULL, '47214229-d70c-11ef-b430-3c7c3f2bc7d9', 'Government Agencies', NULL, '2025-07-01 06:14:18', '2025-07-01 06:14:18'),
(2, '07f8ae01-d70c-11ef-b430-3c7c3f2bc7d9', NULL, '4721520c-d70c-11ef-b430-3c7c3f2bc7d9', 'Business', NULL, '2025-07-01 06:14:18', '2025-07-01 06:14:18'),
(3, '07f8ae82-d70c-11ef-b430-3c7c3f2bc7d9', NULL, '4721527e-d70c-11ef-b430-3c7c3f2bc7d9', 'Citizen', NULL, '2025-07-01 06:14:18', '2025-07-01 06:14:18'),
(4, '07f8aeba-d70c-11ef-b430-3c7c3f2bc7d9', NULL, '472152c4-d70c-11ef-b430-3c7c3f2bc7d9', 'Citizen (Academe)', NULL, '2025-07-01 06:14:18', '2025-07-01 06:14:18');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `redts_y_requirements_subclass_id_foreign` (`subclass_id`);

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_a_accesss`
--
ALTER TABLE `redts_a_accesss`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `redts_ba_view_reqs_specs`
--
ALTER TABLE `redts_ba_view_reqs_specs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_b_user`
--
ALTER TABLE `redts_b_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `redts_d_profile`
--
ALTER TABLE `redts_d_profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `redts_ee_classification`
--
ALTER TABLE `redts_ee_classification`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `redts_e_region`
--
ALTER TABLE `redts_e_region`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_f_offices`
--
ALTER TABLE `redts_f_offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `redts_g_carousel_imgs`
--
ALTER TABLE `redts_g_carousel_imgs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_j_user_offices`
--
ALTER TABLE `redts_j_user_offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `redts_la_process_lengths`
--
ALTER TABLE `redts_la_process_lengths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_lc_rstct_sbmsn_of_reqs`
--
ALTER TABLE `redts_lc_rstct_sbmsn_of_reqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_le_subclass_fees`
--
ALTER TABLE `redts_le_subclass_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_l_sub_class`
--
ALTER TABLE `redts_l_sub_class`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_na_action_attachments`
--
ALTER TABLE `redts_na_action_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `redts_nb_releasing_routes`
--
ALTER TABLE `redts_nb_releasing_routes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `redts_nc_act_seens`
--
ALTER TABLE `redts_nc_act_seens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `redts_n_actions`
--
ALTER TABLE `redts_n_actions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `redts_w_upload_size_limit`
--
ALTER TABLE `redts_w_upload_size_limit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `redts_y_requirements`
--
ALTER TABLE `redts_y_requirements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_za_transaction_types`
--
ALTER TABLE `redts_za_transaction_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `redts_zb_agencies`
--
ALTER TABLE `redts_zb_agencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_zc_client_infos`
--
ALTER TABLE `redts_zc_client_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_zd_client_doc_infos`
--
ALTER TABLE `redts_zd_client_doc_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `redts_ze_client_doc_attachments`
--
ALTER TABLE `redts_ze_client_doc_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `redts_zfa_additional_oops`
--
ALTER TABLE `redts_zfa_additional_oops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_zf_order_of_payments`
--
ALTER TABLE `redts_zf_order_of_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_zga_other_pymnt_cost_brkdwns`
--
ALTER TABLE `redts_zga_other_pymnt_cost_brkdwns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_zg_payment_cost_breakdowns`
--
ALTER TABLE `redts_zg_payment_cost_breakdowns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_zh_cert_perm_routes`
--
ALTER TABLE `redts_zh_cert_perm_routes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_zi_origin_offices`
--
ALTER TABLE `redts_zi_origin_offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `redts_zj_user_oop_approvees`
--
ALTER TABLE `redts_zj_user_oop_approvees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_z_applicant_types`
--
ALTER TABLE `redts_z_applicant_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- Constraints for table `redts_zh_cert_perm_routes`
--
ALTER TABLE `redts_zh_cert_perm_routes`
  ADD CONSTRAINT `redts_zh_cert_perm_routes_sub_class_id_foreign` FOREIGN KEY (`sub_class_id`) REFERENCES `redts_l_sub_class` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `redts_zj_user_oop_approvees`
--
ALTER TABLE `redts_zj_user_oop_approvees`
  ADD CONSTRAINT `redts_zj_user_oop_approvees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `redts_b_user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
