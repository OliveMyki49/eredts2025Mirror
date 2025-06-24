-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2024 at 09:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rfsoats_official`
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
(35, '2024_03_07_151656_create_redts_zga_other_pymnt_cost_brkdwns_table', 31);

-- --------------------------------------------------------

--
-- Table structure for table `redts_a_accesss`
--

CREATE TABLE `redts_a_accesss` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` longtext NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redts_a_accesss`
--

INSERT INTO `redts_a_accesss` (`id`, `type`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', NULL, NULL, NULL),
(2, 'DTS Administrator', NULL, NULL, NULL),
(3, 'Division Chief', NULL, NULL, NULL),
(4, 'Receiving Clerk', NULL, NULL, NULL),
(5, 'Receiving and Releasing Clerk', NULL, NULL, NULL),
(6, 'Releasing Clerk', NULL, NULL, NULL),
(7, 'Regional Director', NULL, NULL, NULL),
(8, 'Assistant Regional Director for Technical Services', NULL, NULL, NULL),
(9, 'Validator', NULL, NULL, NULL),
(10, 'Processor', NULL, NULL, NULL),
(11, 'Accounting Officer', NULL, NULL, NULL),
(12, 'Credit Officer', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `redts_b_user`
--

CREATE TABLE `redts_b_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `access_id` bigint(20) UNSIGNED NOT NULL,
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

INSERT INTO `redts_b_user` (`id`, `username`, `password`, `email`, `access_id`, `status`, `remember_token`, `admin_delete`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'administrator', '$2y$10$MzB.nJmYWbsT1oFJBege/Ogm52l/0OqI5d9/CDmKWvAzWRr/3RpQW', 'info.denrro5.gov.ph@gmail.com', 1, 1, '0', 0, NULL, '0000-00-00 00:00:00', '2023-03-16 02:54:49'),
(2, 'redtsadmin', '$2y$10$MzB.nJmYWbsT1oFJBege/Ogm52l/0OqI5d9/CDmKWvAzWRr/3RpQW', 'redtsadmin@gmail.com', 2, 1, '9', 1, NULL, '0000-00-00 00:00:00', '2023-03-16 02:55:24'),
(304, 'jisales', '$2y$10$MMcz/ZGEAZTiZLdIQxqMfuZCtxi6hhHH6SXCyDLIQ/fc0bcPKAHxC', 'izy05ar@gmail.com', 5, 1, '0', 0, NULL, '2022-02-09 05:15:44', '2023-12-27 05:22:23'),
(314, 'olivemyki49', '$2y$10$.UrKCgbjHgsipkqfae/LEu6ulG6MfASjtz9G1TOajrO98YlPvUlHW', 'olivemyki49@gmail.com', 1, 1, '0', 1, NULL, '2023-09-06 01:09:02', '2024-01-22 03:59:57'),
(315, 'cmbarcellano@forbescollege.org', '$2y$10$jR5opMecMa1zTRDYVY0UZOaacmJ.qBtWBUmX1MEzCrwOnr8w3Ya3G', 'cmbarcellano@forbescollege.org', 9, 1, '0', 0, NULL, '2023-09-18 16:59:43', '2023-12-27 05:22:23'),
(316, 'gbtn_rec', '$2y$10$BT9pFua7Fhho7XbCujI7ze4mgT9R0F70tUDEJO1sPpCB0qDIxgtba', 'user2@admin.com', 9, 1, 'P0gCZdc4PsLbg0U3uN40GatKKpMKKKRVx9LwzHpzUuhlXwBIEOcHwHoUxbcA', 0, NULL, '2023-10-01 22:36:42', '2024-01-30 02:48:58'),
(317, 'gbtn_rps', '$2y$10$FAsI93Ilqy2xO2IbApIPOeNP2W//kMuQfubO/eOAuO4he.lXDPuv.', 'user3@admin.com', 10, 1, '0', 0, NULL, '2023-10-24 21:01:02', '2024-02-29 05:34:29'),
(319, 'user4@admin.com', '$2y$10$my8EwflddgLG7pyn/YzVquPN86pEsqCO7Lr1NPmND45bSNtVAzKe6', 'user4@admin.com', 5, 0, '0', 0, NULL, '2023-10-24 21:01:37', '2023-12-27 05:22:23'),
(321, 'gbtn_cashier', '$2y$10$poJzNatIfp8RHzBhBryRourxfdASazZ1lgrlZe24BGgmvG0MbGsFi', 'gbtn_cashier@admin.com', 10, 1, '0', 0, NULL, '2023-10-24 21:17:10', '2023-12-27 08:31:19'),
(322, 'gbtn_cenro', '$2y$10$ltRZmgb7UaJKftt9z0lnyupDoYfziwDzdtBzgIGrJ3J/CmVucA0om', 'gbtn_cenro@admin.com', 10, 1, 'RMEr5TVH5iOH2fg2SI2v3gzAbJZzq398nHStkkjiPCtxtsFqXgMWCopGFIiv', 0, NULL, '2023-10-24 21:45:58', '2024-01-29 01:59:37'),
(324, 'user1@admin.com', '$2y$10$UkEk3KfFqlBSFnDXIVmlz.Uqcclwu/vxxug8qpQQk54Z5ai.4kMDy', 'user1@admin.com', 9, 1, '0', 0, NULL, '2023-10-27 00:22:17', '2023-12-27 05:22:23'),
(340, 'mb_rec', '$2y$10$VF6x.79tIIYC/CLeR243W.03j5WUXYYXKYul5wqCuYJOIICbsdjpi', 'Sample231129111938264Kn1@gmail.com', 9, 1, '0', 0, NULL, '2023-11-28 19:20:11', '2023-11-28 19:25:04'),
(341, 'catnes_rec', '$2y$10$RBqzGvvpbue/84ZWcpE7te6.kVCTdv/O9cFXCFR0T6KrFiWCWbgqm', 'Sample231206084410jydIy1@gmail.com', 9, 1, '0', 0, NULL, '2023-12-06 00:46:11', '2023-12-20 03:15:00'),
(342, 'catnes_penro', '$2y$10$61WZe4uYtpQNjKB4aKJXFujLnDiyUnm3PKGq/iQ8FWlurnqr1ew8S', 'Sample2312060846423Wq8n2@gmail.com', 5, 1, '0', 0, NULL, '2023-12-06 00:48:58', '2023-12-06 05:28:29'),
(343, 'catnes_rps', '$2y$10$Lc4Mmkl3atfD9giRHZWKf.ZfH9z8fwk24MNK1vVMqPRa9UkFt6kpW', 'Sample231206091917NlJSz1@gmail.com', 10, 1, '0', 0, NULL, '2023-12-06 01:19:27', '2023-12-15 08:51:22'),
(344, 'catnes_tsd', '$2y$10$wL4UTF/CqwKLYN9T82Bf1.tkVeDJIKMXcjulhvgPQrxsG6sFM4WFC', 'Sample231206132553x0BvC1@gmail.com', 5, 1, '0', 0, NULL, '2023-12-06 05:26:18', '2023-12-06 05:26:18'),
(345, 'catnes_svems', '$2y$10$5mkKusN5rlew4AWkkX9t.OEptBY3rLcvs4ZrjS2ruPSrJVbGazMPa', 'Sample231206132554UxKW32@gmail.com', 5, 1, '0', 0, NULL, '2023-12-06 05:26:18', '2023-12-06 05:26:18'),
(346, 'catnes_acc', '$2y$10$1NAB/VSnUTojyD4H/HS0BeHYjZr/yyy7TawVzKz8dOeIQR1n87OIm', 'Sample231206132651NZxou3@gmail.com', 11, 1, '0', 0, NULL, '2023-12-06 05:27:45', '2023-12-20 03:12:23'),
(347, 'catnes_cashier', '$2y$10$./A8mPSa4pg77tc305KFP.XXX7777FdSNKg250.gt5z3QQ1kHhs1S', 'Sample231206132652g2Tdi4@gmail.com', 12, 1, '0', 0, NULL, '2023-12-06 05:27:45', '2023-12-06 05:30:10'),
(348, 'catnes_fuu', '$2y$10$83F907gbUgPBec72kyJSaOeinaV21AoMNaRFisfGgkk1UK3HBMWLq', 'Sample231206132652TmRvX5@gmail.com', 5, 1, '0', 0, NULL, '2023-12-06 05:27:46', '2023-12-06 05:27:46'),
(349, 'red_red', '$2y$10$kICe8IzjHUMUJDgBxXfPaeBO0Qhdb34CqwoYV7IO8K40lyMGZjpNW', 'Sample231217004016vUo7m3@gmail.com', 5, 1, '0', 0, NULL, '2023-12-16 16:37:45', '2023-12-16 16:37:45'),
(350, 'alb_rec', '$2y$10$cw5i0DooaFWDXccBDrkGue71qSdAEO5jvqBn8pqyJKTo8Tl9Z328u', 'alb_rec@gmail.com', 9, 1, '0', 0, NULL, '2023-12-21 00:12:03', '2023-12-21 00:12:03'),
(351, 'alb_rps', '$2y$10$uVzCc6301UK.gTh4uxHquO5ZffzBgsIl4p67th4jEVCMmAK9UlmeO', 'alb_rps@gmail.com', 10, 1, '0', 0, NULL, '2023-12-21 00:13:04', '2024-02-29 01:49:22'),
(352, 'alb_tsd', '$2y$10$ofiEN.Hc8R58g6Ec1TEwlOpV/47ZftCd5WPPexQKiif/fzc4wvYQi', 'alb_tsd@gmail.com', 5, 1, '0', 0, NULL, '2023-12-21 00:14:34', '2023-12-21 00:14:34'),
(353, 'alb_penro', '$2y$10$95V3/F0mQz6ogq5LR6G6SOiorZaKb.Pf1/hzzX2eRIWtJC5cXqeHa', 'alb_penro@gmail.com', 10, 1, '0', 0, NULL, '2023-12-21 00:16:47', '2024-02-29 01:49:45'),
(354, 'alb_msd', '$2y$10$3QLEhLnBTzirYi0UtRWnCuMnWNld2gO33fIy3FuJZs9r/k.SmxqLK', 'alb_msd@gmail.com', 5, 1, '0', 0, NULL, '2023-12-21 00:17:34', '2023-12-21 00:17:34'),
(355, 'alb_es', '$2y$10$8Px1VQxpsi7O6RaNVn./2OF1286.Ph5J48Kj8Ir6bkQSD6Xei9jo6', 'alb_es@gmail.com', 5, 1, '0', 0, NULL, '2023-12-21 00:18:28', '2023-12-21 00:18:28'),
(356, 'alb_cds', '$2y$10$HLVGZj5/1C.TwNzgchepbOdu.nmPJiIGTGpyueEGCK9EQldHWOZxG', 'alb_cds@gmail.com', 5, 1, '0', 0, NULL, '2023-12-21 00:19:19', '2023-12-21 00:19:19'),
(357, 'alb_fs', '$2y$10$yNQFiCWE0dF71KIkXYJVwunHh6MFbm/DQ0X8VPNb/rs1dkq6yq2d.', 'alb_fs@gmail.com', 5, 1, '0', 0, NULL, '2023-12-21 00:19:53', '2023-12-21 00:19:53'),
(358, 'alb_as', '$2y$10$LFjDM8qymNjokUyX1zgkye4JKvtLiDn3uM4SRCHkDcUOQLVnDsLk.', 'alb_as@gmail.com', 5, 1, '0', 0, NULL, '2023-12-21 00:20:28', '2023-12-21 00:20:28'),
(359, 'alb_pmd', '$2y$10$tsctTPPOg7c93ODGsula3Om4bIZAjNoNTAq2/85cgCYwY3XCm0mzK', 'alb_pmd@gmail.com', 5, 1, '0', 0, NULL, '2023-12-21 00:21:18', '2023-12-21 00:21:18'),
(360, 'lpddadmin', '$2y$10$G3oJRBdnpga24FDhTaqgW.BBiPnSIWQEgB8zyHxdzTza8IpYt2Bma', 'lppadmin@gmail.com', 2, 1, '0', 0, NULL, '2023-12-27 05:25:08', '2024-02-08 02:27:58'),
(361, 'sirrenz', '$2y$10$11vX/UaQx62d/m4DbDpovebgb4TVKXpbpjDkcyL5ryYJ4bP6SOuDK', 'rlmanzanades@denr.gov.ph', 1, 1, '0', 0, NULL, '2023-12-27 05:50:01', '2023-12-27 05:50:01'),
(362, 'goa_villaflor', '$2y$10$5YwkYuZXgd.CqhdwwN0TdexIw4f/FqU9JF781PknUcNBValFYcOae', 'goa_villaflor@gmail.com', 5, 1, '0', 0, NULL, '2024-01-18 01:14:24', '2024-01-18 02:00:32'),
(363, 'goa_rojas', '$2y$10$b9c38T6mynBWS4vdC78UaOwNf1eYbUxnmJNp85Ce/NsuUZlzSkPHC', 'goa_rojas@gmail.com', 5, 1, '0', 0, NULL, '2024-01-18 01:14:25', '2024-01-18 02:02:01'),
(364, 'goa_recamara', '$2y$10$0bmjEX4fkUidj9D4T9oyEO2tfHrZoCSCadqQHC02sk1XXSU14cZXm', 'goa_recamara@gmail.com', 5, 1, '0', 0, NULL, '2024-01-18 01:14:27', '2024-01-18 02:03:03'),
(365, 'goa_quides', '$2y$10$FWV9NUimfhD6vrqJz23EgOHKvHYEJf/7KV6enFJF7Bz.gT.7r5SNa', 'goa_quides@gmail.com', 5, 1, '0', 0, NULL, '2024-01-18 01:14:28', '2024-01-18 02:04:07'),
(366, 'goa_collao', '$2y$10$szN4J5knAJnBvS42dFVoru.T5RittXc6Dk.eYnsJOEA3qOFGoWlDa', 'goa_collao@gmail.com', 5, 1, '0', 0, NULL, '2024-01-18 01:14:29', '2024-01-18 02:07:39'),
(367, 'goa_remo', '$2y$10$SvhT8ozx5h1ixncVPjzFV.1Qd3/Dt6XnPr7bAHnvLgWQpYlXMbO0q', 'goa_remo@gmail.com', 5, 1, '0', 0, NULL, '2024-01-18 01:14:30', '2024-01-18 02:08:20'),
(368, 'goa_sedeño', '$2y$10$nFVQpi4qEmeIPQNdRq0a/e5hwKwwwBbnJRuvTGM/Tthca1.PnN6Ya', 'goa_sedeño@gmail.com', 5, 1, '0', 0, NULL, '2024-01-18 01:14:31', '2024-01-18 02:09:11'),
(369, 'goa_dela_cruz', '$2y$10$gJ.pMopOPQ0bQYhlxdr6f.7tCB.t/20xWKthkX7GQCyoUIccfUMUC', 'goa_dela_cruz@gmail.com', 5, 1, '0', 0, NULL, '2024-01-18 01:26:49', '2024-01-18 02:16:37'),
(370, 'sor_rec', '$2y$10$E7sy7JxIXxfwTtwk4IY6RubsHc0pHRYa4PHuEWBSQ0QmWRN1BEPF.', 'sor_rec@gmail.com', 9, 1, '0', 0, NULL, '2024-01-22 03:45:47', '2024-01-22 03:45:47'),
(371, 'wrpsGPuser1', '$2y$10$cOJBz5n9qm2KsJQhf037c.9zjbWrjOzYYXLeoAX4Pl9s763XYHUrO', 'wrpsUser1@gmail.com', 10, 1, '0', 0, NULL, '2024-02-08 02:32:53', '2024-02-08 07:36:08'),
(372, 'wrpsUser2', '$2y$10$i994BYk1i7cQoelhVT/i3ut56v3s81.WwX2Ythdcnyf1DF3s81dXu', 'wrpsUser2@gmail.com', 10, 1, '0', 0, NULL, '2024-02-08 02:32:54', '2024-02-08 02:34:41');

-- --------------------------------------------------------

--
-- Table structure for table `redts_d_profile`
--

CREATE TABLE `redts_d_profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
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

INSERT INTO `redts_d_profile` (`id`, `user_id`, `fname`, `mname`, `sname`, `suffix`, `position`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Administrator', 'A.', 'Admin', NULL, 'unset', '', NULL, NULL, NULL),
(2, 2, 'DENR', '', 'R5', NULL, 'unset', '', NULL, NULL, NULL),
(304, 304, 'John Isaac', 'Sample', 'Sales', '', 'unset', 'assets/img/user_pic/jisales_202311100323.jpg', NULL, NULL, '2023-12-27 05:22:23'),
(314, 315, 'Clive Mark', 'Buelva', 'Barcellano', '', 'Computer Operator', 'assets/img/user_pic/cmbarcellano@forbescollege.org_202311100257.jpg', NULL, NULL, '2023-12-27 05:22:23'),
(315, 314, 'Admin', '', 'Chicken', NULL, 'unset', 'assets/img/user_pic/olivemyki49_202311300307.jpg', NULL, NULL, '2024-01-22 03:59:57'),
(316, 316, 'Carlo', 'S.', 'Zabiro', '', 'unset', 'assets/img/user_pic/gbtn_rec_202311280141.jpg', NULL, NULL, '2024-01-30 02:48:58'),
(317, 317, 'Carles', 'Sandro', 'Curpos', '', 'unset', 'assets/img/user_pic/gbtn_rps_202311280142.jpg', NULL, NULL, '2024-02-29 05:34:29'),
(318, 319, 'Elmner', 'Karol', 'Sumer', '', 'unset', '', NULL, NULL, '2023-12-27 05:22:23'),
(319, 321, 'Carlo', 'T.', 'Lapus', '', 'Administrative Aide II', 'assets/img/user_pic/gbtn_cashier_202311280142.jpg', NULL, NULL, '2023-12-27 08:31:19'),
(320, 322, 'Ferdinand', 'L', 'Baltazar', '', 'unset', 'assets/img/user_pic/gbtn_cenro_202311280143.jpg', NULL, NULL, '2024-01-29 01:59:37'),
(321, 324, 'Elmer', 'Sanchez', 'Miller', '', 'unset', '', NULL, NULL, '2023-12-27 05:22:23'),
(333, 340, 'Filmer', 'Bowering', 'Cratchley', NULL, 'unset', '', NULL, '2023-11-28 19:20:11', '2023-11-28 19:25:04'),
(334, 341, 'Yalonda', 'Kleisle', 'Elvish', '', 'unset', '', NULL, '2023-12-06 00:46:11', '2023-12-20 03:15:00'),
(335, 342, 'Baily', 'Charlet', 'Epelett', '', 'unset', '', NULL, '2023-12-06 00:48:58', '2023-12-06 05:28:29'),
(336, 343, 'Nefen', 'Grieswood', 'Diffley', NULL, 'Planning Officer III', '', NULL, '2023-12-06 01:19:27', '2023-12-15 08:51:22'),
(337, 344, 'Shep', 'Freathy', 'Threadgill', '', 'unset', '', NULL, '2023-12-06 05:26:18', '2023-12-06 05:26:18'),
(338, 345, 'Michal', 'Gertz', 'Flaherty', '', 'unset', '', NULL, '2023-12-06 05:26:18', '2023-12-06 05:26:18'),
(339, 346, 'Barnie', 'Drayton', 'Shrawley', '', 'unset', '', NULL, '2023-12-06 05:27:45', '2023-12-20 03:12:23'),
(340, 347, 'Josephina', 'Gration', 'Bellee', '', 'unset', '', NULL, '2023-12-06 05:27:45', '2023-12-06 05:30:11'),
(341, 348, 'Ali', 'Larham', 'Wallege', '', 'unset', '', NULL, '2023-12-06 05:27:46', '2023-12-06 05:27:46'),
(342, 349, 'Sample231217004016vUo7m3', 'S.', 'Surname', NULL, 'unset', '', NULL, '2023-12-16 16:37:45', '2023-12-21 02:02:06'),
(343, 350, 'alb_rec', 'S.', 'Surname', NULL, 'unset', '', NULL, '2023-12-21 00:12:03', '2023-12-21 00:30:39'),
(344, 351, 'alb_rps', 'S.', 'Surname', '', 'unset', '', NULL, '2023-12-21 00:13:04', '2024-02-29 01:49:23'),
(345, 352, 'alb_tsd', 'S.', 'Surname', '', 'unset', '', NULL, '2023-12-21 00:14:34', '2023-12-21 00:14:34'),
(346, 353, 'alb_penro', 'S.', 'Surname', '', 'unset', '', NULL, '2023-12-21 00:16:47', '2024-02-29 01:49:46'),
(347, 354, 'alb_msd', 'S.', 'Surname', '', 'unset', '', NULL, '2023-12-21 00:17:34', '2023-12-21 00:17:34'),
(348, 355, 'alb_es', 'S.', 'Surname', '', 'unset', '', NULL, '2023-12-21 00:18:28', '2023-12-21 00:18:28'),
(349, 356, 'alb_cds', 'S.', 'Surname', '', 'unset', '', NULL, '2023-12-21 00:19:19', '2023-12-21 00:19:19'),
(350, 357, 'alb_fs', 'S.', 'Surname', '', 'unset', '', NULL, '2023-12-21 00:19:53', '2023-12-21 00:19:53'),
(351, 358, 'alb_as', 'S.', 'Surname', '', 'unset', '', NULL, '2023-12-21 00:20:28', '2023-12-21 00:20:28'),
(352, 359, 'alb_pmd', 'S.', 'Surname', '', 'unset', '', NULL, '2023-12-21 00:21:18', '2023-12-21 00:21:18'),
(353, 360, 'Lpdd', 'User', '1', '', 'unset', '', NULL, '2023-12-27 05:25:08', '2024-02-08 02:27:59'),
(354, 361, 'Rene', 'L.', 'Manzanades', '', 'unset', '', NULL, '2023-12-27 05:50:01', '2023-12-27 05:50:01'),
(355, 362, 'Lorna', 'B.', 'Villaflor', NULL, 'unset', 'assets/img/user_pic/goa_villaflor_202401181000.PNG', NULL, '2024-01-18 01:14:24', '2024-01-18 02:00:35'),
(356, 363, 'Melanie', 'P.', 'Rojas', NULL, 'unset', 'assets/img/user_pic/goa_rojas_202401181002.PNG', NULL, '2024-01-18 01:14:25', '2024-01-18 02:02:04'),
(357, 364, 'Mary Jane', 'M.', 'Recamara', NULL, 'unset', 'assets/img/user_pic/goa_recamara_202401181003.PNG', NULL, '2024-01-18 01:14:27', '2024-01-18 02:03:05'),
(358, 365, 'Jomar', 'D.', 'Quides', NULL, 'unset', 'assets/img/user_pic/goa_quides_202401181004.PNG', NULL, '2024-01-18 01:14:28', '2024-01-18 02:04:10'),
(359, 366, 'Jojo', 'C.', 'Collao', NULL, 'unset', 'assets/img/user_pic/goa_collao_202401181007.PNG', NULL, '2024-01-18 01:14:29', '2024-01-18 02:07:43'),
(360, 367, 'Analiza', 'D.', 'Remo', NULL, 'unset', 'assets/img/user_pic/goa_remo_202401181008.PNG', NULL, '2024-01-18 01:14:30', '2024-01-18 02:08:23'),
(361, 368, 'Femy', 'C.', 'Sedeño', NULL, 'unset', 'assets/img/user_pic/goa_sedeño_202401181009.PNG', NULL, '2024-01-18 01:14:31', '2024-01-18 02:09:15'),
(362, 369, 'Cyrus Job', '', 'Dela Cruz', NULL, 'unset', 'assets/img/user_pic/goa_dela_cruz_202401181016.PNG', NULL, '2024-01-18 01:26:49', '2024-01-18 02:16:40'),
(363, 370, 'sor_rec', 'sor_rec', 'sor_rec', '', 'unset', '', NULL, '2024-01-22 03:45:47', '2024-01-22 03:45:47'),
(364, 371, 'Lorenz Kurt', 'C.', 'Abrasaldo', NULL, 'EMS II', '', NULL, '2024-02-08 02:32:53', '2024-02-08 07:36:08'),
(365, 372, 'WRPS', 'User', '2', '', 'unset', '', NULL, '2024-02-08 02:32:54', '2024-02-08 02:34:42');

-- --------------------------------------------------------

--
-- Table structure for table `redts_ee_classification`
--

CREATE TABLE `redts_ee_classification` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redts_ee_classification`
--

INSERT INTO `redts_ee_classification` (`id`, `description`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Tree Cutting Permit (Private Land)', 'TCPPrL', NULL, '2023-09-07 21:23:14', '2023-09-07 21:23:14'),
(2, 'Tree Cutting Permit (Public Land)', 'TCPPbL', NULL, '2023-09-07 21:23:14', '2023-09-07 21:23:14'),
(3, 'Chainsaw Registration', 'ChnswReg', NULL, '2023-10-02 00:51:17', '2023-10-02 00:51:17'),
(6, 'Gratuitous Permit', 'GP', NULL, '2023-11-02 18:23:47', '2023-11-02 18:35:41');

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
  `region_id` bigint(20) UNSIGNED NOT NULL,
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

INSERT INTO `redts_f_offices` (`id`, `region_id`, `slug`, `office`, `full_office_name`, `office_type`, `mother_unit`, `header_office_title`, `email`, `tel_no`, `cp_no`, `office_address`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 7, 'R5-ORED', 'ORED', 'Office of the Regional Executive Director', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, '2023-12-27 08:32:12'),
(2, 7, 'R5-SCIS', 'SCIS', 'Strategic Communication Initiative Service', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(3, 7, 'R5-OARDMS', 'OARDMS', 'Office of the Assistant Regional Director for Management Services', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(4, 7, 'R5-OARDMS-PMD', 'PMD', 'Planning and Management Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(5, 7, 'R5-OARDMS-PMD-ICTS', 'PMD.ICT', 'Information and Communications Technology Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, '2023-12-22 08:53:41'),
(6, 7, 'R5-OARDMS-PMD-MES', 'PMD.ME', 'Monitoring and Evaluation Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, '2023-12-22 08:53:46'),
(7, 7, 'R5-OARDMS-PMD-PPS', 'PMD.PP', 'Planning and Programming Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, '2023-12-22 08:53:53'),
(8, 7, 'R5-OARDMS-LEGAL', 'LEGAL', 'Legal Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(9, 7, 'R5-OARDMS-LEGAL-IS', 'LEGAL.I', 'Investigation Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, '2023-12-22 08:57:21'),
(10, 7, 'R5-OARDMS-LEGAL-ERLS', 'LEGAL.ERLS', 'Environment, Research Legislation Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, '2023-12-22 08:57:12'),
(11, 7, 'R5-OARDMS-LEGAL-LAS', 'LEGAL.LASS', 'Litigation and Adjudication Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, '2023-12-22 08:57:02'),
(12, 7, 'R5-OARDMS-FINANCE', 'FIN', 'Finance Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(13, 7, 'R5-OARDMS-FINANCE-BFS', 'FIN.Budget', 'Budget and Fiscal Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(14, 7, 'R5-OARDMS-FINANCE-AS', 'FIN.Accounting', 'Accounting Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(15, 7, 'R5-OARDMS-ADMIN', 'AD', 'Administrative Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(16, 7, 'R5-OARDMS-ADMIN-PS', 'AD.Personnel', 'Personnel Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(17, 7, 'R5-OARDMS-ADMIN-HRDS', 'AD.HRDS', 'Human Resource Development Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(18, 7, 'R5-OARDMS-ADMIN-GSS', 'AD.GSS', 'General Services Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(19, 7, 'R5-OARDMS-ADMIN-GSS-RU', 'AD.Records', 'Records Unit', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(20, 7, 'R5-OARDMS-ADMIN-PROC', 'AD.Procurement', 'Procurement Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(21, 7, 'R5-OARDMS-ADMIN-CASHIER', 'AD.Cashier', 'Cashier Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(22, 7, 'R5-OARDTS', 'OARDTS', 'Office of the Assistant Regional Director in Technical Services', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(23, 7, 'R5-OARDTS-LPDD', 'LPDD', 'Regional Office V (LPDD Receiving Office)', 'Receiving', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, '2024-02-08 01:53:55'),
(24, 7, 'R5-OARDTS-LPDD-WRUS', 'LPDD.Water', 'Water Resource Utilization Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, '2023-11-02 23:07:34'),
(25, 7, 'R5-OARDTS-LPDD-PDS', 'LPDD.PDS', 'Patents and Deeds Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(26, 7, 'R5-OARDTS-LPDD-FUS', 'LPDD.FUS', 'Forest Utilizatoin Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(27, 7, 'R5-OARDTS-LPDD-WRPS', 'LPDD.WRPS', 'Wildlife Resource Permitting Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, '2023-11-02 23:07:19'),
(28, 7, 'R5-OARDTS-SMD', 'SMD', 'Surveys and Mapping Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(29, 7, 'R5-OARDTS-SMD-SCS', 'SMD.SCS', 'Surveys and Control Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(30, 7, 'R5-OARDTS-SMD-LESS', 'SMD.LESS', 'Land Evaluation Survey Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(31, 7, 'R5-OARDTS-SMD-ASCS', 'SMD.Aggregate', 'Aggregates Surveys and Correction Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(32, 7, 'R5-OARDTS-SMD-OOSS', 'SMD.OOSS', 'Original and Other Surveys Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(33, 7, 'R5-OARDTS-SMD-LRS', 'SMD.LRS', 'Land Records Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(34, 7, 'R5-OARDTS-CDD', 'CDD', 'Conservation and Development Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(35, 7, 'R5-OARDTS-CDD-PFMS', 'CDD.PFMS', 'Production Forest Management Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(36, 7, 'R5-OARDTS-CDD-CRFMS', 'CDD.Coastal', 'Coastal Resource and Foreshore Mgt Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(37, 7, 'R5-OARDTS-CDD-PAMBCS', 'CDD.PA', 'PA Mgt and Biodiversity Conservation Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(38, 7, 'R5-OARDTS-ED', 'ED', 'Enforcement Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(39, 7, 'R5-OARDTS-ED-CMIS', 'ED.Compliance', 'Compliance Monitoring and Investigation Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(40, 7, 'R5-OARDTS-ED-SIS', 'ED.Surveillance', 'Surveillance and Intelligence Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(41, 7, 'R5-PENRO-ALBAY', 'P.Albay', 'PENRO Albay', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Legazpi Port District, Legazpi City, Albay', NULL, NULL, NULL),
(42, 7, 'R5-PENRO-CSUR', 'P.CSur', 'PENRO Camarines Sur', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', '', NULL, NULL, NULL),
(43, 7, 'R5-PENRO-CNORTE', 'P.CNorte', 'PENRO Camarines Norte', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Dagondan, Daet, Camarines Norte', NULL, NULL, NULL),
(44, 7, 'R5-PENRO-MASBATE', 'P.Masbate', 'PENRO Masbate', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Zurbito Street, Masbate City', NULL, NULL, NULL),
(45, 7, 'R5-PENRO-CATNES', 'P.Catnes', 'PENRO Catanduanes', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'San Isidro Village, Virac, Catanduanes', NULL, NULL, NULL),
(46, 7, 'R5-PENRO-SORSOGON', 'P.Sor', 'PENRO Sorsogon', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'B. Road, Sorsogon City, Sorsogon', NULL, NULL, NULL),
(47, 7, 'R5-CENRO-GUINOBATAN', 'C.GBTN', 'CENRO Guinobatan', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Morera, Guinobatan, Albay', NULL, NULL, NULL),
(48, 7, 'R5-CENRO-IRIGA', 'C.Iriga', 'CENRO Iriga', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', '', NULL, NULL, NULL),
(49, 7, 'R5-CENRO-SIPOCOT', 'C.Sipocot', 'CENRO Sipocot', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', '', NULL, NULL, NULL),
(50, 7, 'R5-CENRO-GOA', 'C.Goa', 'CENRO Goa', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', '', NULL, NULL, NULL),
(51, 7, 'R5-CENRO-MOBO', 'C.Mobo', 'CENRO Mobo', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', '', NULL, NULL, NULL),
(52, 7, 'R5-CENRO-SANJACINTO', 'C.SJ', 'CENRO San Jacinto', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', '', NULL, NULL, NULL),
(53, 7, 'R5-BAC', 'RBAC', 'RBAC', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(54, 7, 'R5-TWG-INFRA-PROJ', 'TWG.INFRA', 'TWG Infrastructure Projects', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(55, 7, 'R5-TWG-GOODS-SERV', 'TWG.Goods', 'TWG Goods and Services', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(56, 7, 'R5-TWG-IT-EQ', 'TWG.IT', 'TWG IT Equipments', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(57, 7, 'R5-TWG-CONSERV', 'TWG.Consulting', 'TWG Consulting Services', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(58, 7, 'R5-TWG-NGP', 'TWG.NGP', 'TWG National Greening Program', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(59, 7, 'R5-INS-INFRA-PROJ', 'INS.INFRA', 'Inspection Infrastructure Projects', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(60, 7, 'R5-INS-GOODS-SERV', 'INS.Goods', 'Inspection Goods and Services', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(61, 7, 'R5-INS-IT-EQ', 'INS.IT', 'Inspection IT Equipments', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(62, 7, 'R5-INS-CONSERV', 'INS.Consulting', 'Inspection Consulting Services', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(63, 7, 'R5-INS-NGP-T1', 'INS.NGPT1', 'Inspection National Greening Program Team 1', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(64, 7, 'R5-INS-NGP-T2', 'INS.NGPT2', 'Inspection National Greening Program Team 2', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(65, 7, 'R5-INS-NGP-T3', 'INS.NGPT3', 'Inspection National Greening Program Team 3', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(66, 7, 'R5-INS-VEHICLE', 'INS.Vehicle', 'Inspection Vehicle', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(67, 7, 'R5-CANVASSER1-AD', 'Canvass.AD1', 'Admin Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(68, 7, 'R5-CANVASSER2-AD', 'Canvass.AD2', 'Admin Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(69, 7, 'R5-CANVASSER-PMD', 'Canvass.PMD', 'Planning and Management Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(70, 7, 'R5-CANVASSER-LEGAL', 'Canvass.Legal', 'Legal Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(71, 7, 'R5-CANVASSER-SCIS', 'Canvass.SCIS', 'Strategic Communication Initiative Service', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(72, 7, 'R5-CANVASSER-FD', 'Canvass.FD', 'Finance Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(73, 7, 'R5-CANVASSER-CDD', 'Canvass.CDD', 'Conservation and Development Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(74, 7, 'R5-CANVASSER-LPDD', 'Canvass.LPDD', 'Licenses, Patents and Deeds Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(75, 7, 'R5-CANVASSER-ED', 'Canvass.ED', 'Enforcement Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(76, 7, 'R5-CANVASSER-SMD', 'Canvass.SMD', 'Surveys and Mapping Division', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(77, 7, 'R5-PENRO-Albay-MSD', 'P.Albay.MSD', 'PENRO Albay - Management Services Division', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Legazpi Port District, Legazpi City, Albay', NULL, NULL, '2023-12-22 08:28:02'),
(78, 7, 'R5-PENRO-Albay-MSD-Admin', 'P.Albay.Admin', 'PENRO Albay - Administrative Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Legazpi Port District, Legazpi City, Albay', NULL, NULL, '2023-12-22 08:28:17'),
(79, 7, 'R5-PENRO-Albay-MSD-Finance', 'P.Albay.Finance', 'PENRO Albay - Finance Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Legazpi Port District, Legazpi City, Albay', NULL, NULL, '2023-12-22 08:28:06'),
(80, 7, 'R5-PENRO-Albay-Planning', 'P.Albay.PMS', 'PENRO Albay - Planning and Management Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Legazpi Port District, Legazpi City, Albay', NULL, NULL, '2023-12-22 08:27:58'),
(81, 7, 'R5-PENRO-Albay-Records', 'P.Albay.Records', 'Records Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Legazpi Port District, Legazpi City, Albay', '2023-12-21 00:26:29', NULL, NULL),
(82, 7, 'R5-PENRO-Albay-TSD', 'P.Albay.TSD', 'PENRO Albay - Technical Services Division', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Legazpi Port District, Legazpi City, Albay', NULL, NULL, '2023-12-22 08:27:50'),
(83, 7, 'R5-PENRO-Albay-TSD-Conservation', 'P.Albay.CDS', 'PENRO Albay - Conservation and Development Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Legazpi Port District, Legazpi City, Albay', NULL, NULL, '2023-12-22 08:28:13'),
(84, 7, 'R5-PENRO-Albay-TSD-RLPDS', 'P.Albay.RPS', 'PENRO Albay - Regulation and Permitting Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Legazpi Port District, Legazpi City, Albay', NULL, NULL, '2023-12-22 08:27:54'),
(85, 7, 'R5-PENRO-Albay-TSD-Enforcement', 'P.Albay.Enforcement', 'PENRO Albay - Enforcement Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Legazpi Port District, Legazpi City, Albay', NULL, NULL, '2023-12-22 08:28:09'),
(86, 7, 'R5-PENRO-CNorte-MSD', 'P.Cn.MSD', 'PENRO Cam Norte - Management Services Division', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', '', NULL, NULL, '2023-12-22 08:24:38'),
(87, 7, 'R5-PENRO-CNorte-MSD-Admin', 'P.CN.Admin', 'PENRO Cam Norte - Administrative Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', '', NULL, NULL, '2023-12-22 08:24:01'),
(88, 7, 'R5-PENRO-CNorte-MSD-Finance', 'P.CN.Finance', 'PENRO Cam Norte - Finance Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', '', NULL, NULL, '2023-12-22 08:24:42'),
(89, 7, 'R5-PENRO-CNorte-MSD-Planning', 'P.CN.PMS', 'PENRO Cam Norte - Planning and Management Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', '', NULL, NULL, '2023-12-22 08:24:33'),
(90, 7, 'R5-PENRO-CNorte-MSD-Records', 'P.CN.Records', 'PENRO Cam Norte - Records Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', '', '2023-12-22 08:12:09', NULL, '2023-12-22 08:29:09'),
(91, 7, 'R5-PENRO-CNorte-TSD', 'P.CN.TSD', 'PENRO Cam Norte - Technical Services Division', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', '', NULL, NULL, '2023-12-22 08:24:19'),
(92, 7, 'R5-PENRO-CNorte-TSD-Conservation', 'P.CN.CDS', 'PENRO Cam Norte - Conservation and Development Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', '', NULL, NULL, '2023-12-22 08:25:14'),
(93, 7, 'R5-PENRO-CNorte-TSD-RLPDS', 'P.CN.RPS', 'PENRO Cam Norte - Regulation and Permitting Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', '', NULL, NULL, '2023-12-22 08:24:24'),
(94, 7, 'R5-PENRO-CNorte-TSD-Enforcement', 'P.CN.Enforcement', 'PENRO Cam Norte - Enforcement Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', '', NULL, NULL, '2023-12-22 08:24:47'),
(95, 7, 'R5-PENRO-CSur', 'P.CSur', 'PENRO Camarines Sur', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', '', '2023-12-22 08:12:33', NULL, '2023-12-22 08:31:33'),
(96, 7, 'R5-PENRO-CSur-MSD', 'P.CSur.MSD', 'PENRO Cam Sur - Management and Services Division', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', '', NULL, NULL, '2023-12-22 08:31:14'),
(97, 7, 'R5-PENRO-CSur-MSD-Admin', 'P.Csur.Admin', 'PENRO Cam Sur - Administrative Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', '', NULL, NULL, '2023-12-22 08:31:58'),
(98, 7, 'R5-PENRO-CSur-MSD-Finance', 'P.CSur.Finance', 'PENRO Cam Sur - Finance Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', '', NULL, NULL, '2023-12-22 08:31:19'),
(99, 7, 'R5-PENRO-CSur-MSD-Planning', 'P.CSur.PMS', 'PENRO Cam Sur - Planning and Management Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', '', NULL, NULL, '2023-12-22 08:30:24'),
(100, 7, 'R5-PENRO-CSur-MSD-Records', 'P.CSur.Records', 'PENRO Cam Sur - Records Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', '', '2023-12-22 08:12:17', NULL, '2023-12-22 08:32:17'),
(101, 7, 'R5-PENRO-CSur-TSD', 'P.CSur.TSD', 'PENRO Cam Sur - Tecnical services Division', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', '', NULL, NULL, '2023-12-22 08:30:15'),
(102, 7, 'R5-PENRO-CSur-TSD-Conservation', 'P.CSur.CDS', 'PENRO Cam Sur - Conservation and Development Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', '', NULL, NULL, '2023-12-22 08:31:54'),
(103, 7, 'R5-PENRO-CSur-TSD-RLPDS', 'P.CSur.RPS', 'PENRO Cam Sur - Regulation and Permitting Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', '', NULL, NULL, '2023-12-22 08:30:35'),
(104, 7, 'R5-PENRO-CSur-TSD-Enforment', 'P.CSur.Enforcement', 'PENRO Cam Sur - Enforcement Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', '', NULL, NULL, '2023-12-22 08:31:23'),
(105, 7, 'R5-PENRO-Catnes-MSD', 'P.Catnes.MSD', 'PENRO Catanduanes - Management Services Division', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', '', NULL, NULL, '2023-12-22 08:34:03'),
(106, 7, 'R5-PENRO-Catnes-MSD-Admin', 'P.Catnes.Admin', 'PENRO Catanduanes - Administration Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', '', NULL, NULL, '2023-12-22 08:34:21'),
(107, 7, 'R5-PENRO-Catnes-MSD-Finance', 'P.Catnes.Finance', 'PENRO Catanduanes - Finance Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', '', NULL, NULL, '2023-12-22 08:34:07'),
(108, 7, 'R5-PENRO-Catnes-MSD-Planning', 'P.Catnes.PMS', 'PENRO Catanduanes - Planning and Management Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', '', NULL, NULL, '2023-12-22 08:33:07'),
(109, 7, 'R5-PENRO-Catnes-MSD-Records', 'P.Catnes.Records', 'PENRO Catanduanes - Records Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', '', '2023-12-22 08:12:04', NULL, '2023-12-22 08:35:04'),
(110, 7, 'R5-PENRO-Catnes-TSD', 'P.Catnes_TSD', 'PENRO Catanduanes - Technical Services Division', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', '', '2023-12-22 08:12:54', NULL, '2023-12-22 08:34:54'),
(111, 7, 'R5-PENRO-Catnes-TSD-Conservation', 'P.Catnes.CDS', 'PENRO Catanduanes - Conservation and Development Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', '', NULL, NULL, '2023-12-22 08:34:16'),
(112, 7, 'R5-PENRO-Catnes-TSD-RPS', 'P.Catnes.RPS', 'PENRO Catanduanes - Regulation and Permitting Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'San Isidro Village, Virac, Catanduanes', NULL, NULL, '2023-12-22 08:33:50'),
(113, 7, 'R5-PENRO-Catnes-TSD-Enforcement', 'P.Catnes.Enforment', 'PENRO Catanduanes - Enforcement Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', '', NULL, NULL, '2023-12-22 08:34:11'),
(114, 7, 'R5-PENRO-Masbate-MSD', 'P.Masbate.MSD', 'PENRO Masbate - Management Services Division', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Zurbito Street, Masbate City', NULL, NULL, '2023-12-22 08:36:09'),
(115, 7, 'R5-PENRO-Masbate-MSD-Admin', 'P.Masbate.Admin', 'PENRO Masbate - Administration Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Zurbito Street, Masbate City', NULL, NULL, '2023-12-22 08:36:23'),
(116, 7, 'R5-PENRO-Masbate-MSD-Finance', 'P.Masbate.Finance', 'PENRO Masbate - Finance Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Zurbito Street, Masbate City', NULL, NULL, '2023-12-22 08:36:13'),
(117, 7, 'R5-PENRO-Masbate-MSD-Planning', 'P.Masbate.PMS', 'PENRO Masbate - Planning and Management Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Zurbito Street, Masbate City', NULL, NULL, '2023-12-22 08:35:47'),
(118, 7, 'R5-PENRO-Masbate-MSD-Records', 'P.Masbate.Records', 'PENRO Masbate - Records Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Zurbito Street, Masbate City', '2023-12-27 08:12:41', NULL, '2023-12-27 08:34:41'),
(119, 7, 'R5-PENRO-Masbate-TSD', 'P.Masbate.TSD', 'PENRO Masbate - Technical Services Division', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Zurbito Street, Masbate City', NULL, NULL, '2023-12-22 08:35:39'),
(120, 7, 'R5-PENRO-Masbate-TSD-Conservation', 'P.Masbate.CDS', 'PENRO Masbate - Conservation and Development Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Zurbito Street, Masbate City', NULL, NULL, '2023-12-22 08:36:19'),
(121, 7, 'R5-PENRO-Masbate-TSD-RLPDS', 'P.Masbate.RPS', 'PENRO Masbate - Regulation and Permitting Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Zurbito Street, Masbate City', NULL, NULL, '2023-12-22 08:35:54'),
(122, 7, 'R5-PENRO-Masbate-TSD-Enforcement', 'P.Masbate.Enforcement', 'PENRO Masbate - Enforcement Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Zurbito Street, Masbate City', NULL, NULL, '2023-12-22 08:36:16'),
(123, 7, 'R5-PENRO-Sorsogon-MSD', 'P.Sor.MSD', 'PENRO Sorsogon - Management Services Division', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'B. Road, Sorsogon City, Sorsogon', NULL, NULL, '2023-12-22 08:38:21'),
(124, 7, 'R5-PENRO-Sorsogon-MSD-Admin', 'P.Sor.Admin', 'PENRO Sorsogon - Administrator Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'B. Road, Sorsogon City, Sorsogon', NULL, NULL, '2023-12-22 08:38:45'),
(125, 7, 'R5-PENRO-Sorsogon-MSD-Finance', 'P.Sor.Finance', 'PENRO Sorsogon - Finance Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'B. Road, Sorsogon City, Sorsogon', NULL, NULL, '2023-12-22 08:38:25'),
(126, 7, 'R5-PENRO-Sorsogon-MSD-Planning', 'P.Sor.PMS', 'PENRO Sorsogon - Planning and Management Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'B. Road, Sorsogon City, Sorsogon', NULL, NULL, '2023-12-22 08:38:07'),
(127, 7, 'R5-PENRO-Sorsogon-MSD-Records', 'P.Sor.Records', 'PENRO Sorsogon - Records Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'B. Road, Sorsogon City, Sorsogon', '2023-12-22 08:12:57', NULL, '2023-12-22 08:38:57'),
(128, 7, 'R5-PENRO-Sorsogon-TSD', 'P.Sor.TSD', 'PENRO Sorsogon - Technical Services Division', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'B. Road, Sorsogon City, Sorsogon', NULL, NULL, '2023-12-22 08:37:56'),
(129, 7, 'R5-PENRO-Sorsogon-TSD-Conservation', 'P.Sor.CDS', 'PENRO Sorsogon - Conservation and Development Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'B. Road, Sorsogon City, Sorsogon', NULL, NULL, '2023-12-22 08:38:33'),
(130, 7, 'R5-PENRO-Sorsogon-TSD-RLPDS', 'P.Sor.RPS', 'PENRO Sorsogon - Regulation and Permitting Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'B. Road, Sorsogon City, Sorsogon', NULL, NULL, '2023-12-22 08:38:12'),
(131, 7, 'R5-PENRO-Sorsogon-TSD-Enforcement', 'P.Sor.Enforcement', 'PENRO Sorsogon - Enforcement Section', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'B. Road, Sorsogon City, Sorsogon', NULL, NULL, '2023-12-22 08:38:29'),
(132, 7, 'R5-CENRO-Guinobatan-CDS', 'C.Gbtn.CDS', 'CENRO Guinobatan - Conservation and Development Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Morera, Guinobatan, Albay', NULL, NULL, '2023-12-22 08:40:51'),
(133, 7, 'R5-CENRO-Guinobatan-RLPDS', 'C.Gbtn.RPS', 'CENRO Guinobatan - Regulation and Permitting Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Morera, Guinobatan, Albay', NULL, NULL, '2023-12-22 08:40:58'),
(134, 7, 'R5-CENRO-Guinobatan-Enforcement', 'C.Gbtn.Enforcement', 'CENRO Guinobatan - Enforcement Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Morera, Guinobatan, Albay', NULL, NULL, '2023-12-22 08:40:47'),
(135, 7, 'R5-CENRO-Guinobatan-Records', 'C.Gbtn.Records', 'CENRO Guinobatan - Records Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Morera, Guinobatan, Albay', '2023-12-22 08:12:11', NULL, '2023-12-22 08:41:11'),
(136, 7, 'R5-CENRO-Iriga-CDS', 'C.Iriga.CDS', 'CENRO Iriga - Conservation and Development Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', '', NULL, NULL, '2023-12-22 08:44:44'),
(137, 7, 'R5-CENRO-Iriga-RLPDS', 'C.Iriga.RPS', 'CENRO Iriga Regulation and Permitting Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', '', NULL, NULL, NULL),
(138, 7, 'R5-CENRO-Iriga-Enforcement', 'C.Iriga.Enforcement', 'CENRO Iriga - Enforcement Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', '', NULL, NULL, '2023-12-22 08:44:39'),
(139, 7, 'R5-CENRO-Iriga-Records', 'C.Iriga.Records', 'CENRO Iriga - Records Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', '', '2023-12-22 08:12:03', NULL, '2023-12-22 08:45:03'),
(140, 7, 'R5-CENRO-Goa-CDS', 'C.Goa.CDS', 'CENRO Goa - Conservation and Development Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', '', NULL, NULL, '2023-12-22 08:43:27'),
(141, 7, 'R5-CENRO-Goa-RLPDS', 'C.Goa.RPS', 'CENRO Goa - Regulation and Permitting Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', '', NULL, NULL, '2023-12-22 08:44:01'),
(142, 7, 'R5-CENRO-Goa-Enforcement', 'C.Goa.Enforcement', 'CENRO Goa - Enforcement Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', '', NULL, NULL, '2023-12-22 08:43:24'),
(143, 7, 'R5-CENRO-Goa-Records', 'C.Goa.Records', 'CENRO Goa - Records Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', '', '2023-12-22 08:12:14', NULL, '2023-12-22 08:45:14'),
(144, 7, 'R5-CENRO-Sipocot-CDS', 'C.Sipocot.CDS', 'CENRO Sipocot - Conservation and Development Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', '', NULL, NULL, '2023-12-22 08:47:14'),
(145, 7, 'R5-CENRO-Sipocot-RLPDS', 'C.Sipocot.RPS', 'CENRO Sipocot - Regulation and Permitting Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', '', NULL, NULL, '2023-12-22 08:47:20'),
(146, 7, 'R5-CENRO-Sipocot-Enforcement', 'C.Sipocot.Enforcement', 'CENRO Sipocot - Enforcement Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', '', NULL, NULL, '2023-12-22 08:47:09'),
(147, 7, 'R5-CENRO-Sipocot-Records', 'C.Sipocot..Records', 'CENRO Sipocot - Records Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', '', '2023-12-27 08:12:46', NULL, '2023-12-27 08:33:46'),
(148, 7, 'R5-CENRO-Mobo-CDS', 'C.Mobo.CDS', 'CENRO Mobo - Conservation and Development Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', '', NULL, NULL, '2023-12-22 08:49:11'),
(149, 7, 'R5-CENRO-Mobo-RLPDS', 'C.Mobo.RPS', 'CENRO Mobo - Regulation and Permitting Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', '', NULL, NULL, '2023-12-22 08:49:17'),
(150, 7, 'R5-CENRO-Mobo-Enforcement', 'C.Mobo.Enforcement', 'CENRO Mobo - Enforcement Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', '', NULL, NULL, '2023-12-22 08:49:07'),
(151, 7, 'R5-CENRO-Mobo-Records', 'C.Mobo.Records', 'CENRO Mobo - Records Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', '', '2023-12-22 08:12:23', NULL, '2023-12-22 08:49:23'),
(152, 7, 'R5-CENRO-SanJacinto-CDS', 'C.SJ.CDS', 'CENRO San Jacinto - Conservation and Development Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', '', NULL, NULL, '2023-12-22 08:50:12'),
(153, 7, 'R5-CENRO-SanJacinto-RLPDS', 'C.SJ.RPS', 'CENRO San Jacinto - Regulation and Permitting Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', '', NULL, NULL, '2023-12-22 08:50:26'),
(154, 7, 'R5-CENRO-SanJacinto-Enforcement', 'C.SJ.Enforcement', 'CENRO San Jacinto - Enforcement Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', '', NULL, NULL, '2023-12-22 08:50:16'),
(155, 7, 'R5-CENRO-SanJacinto-Records', 'C.SJ.Records', 'CENRO San Jacinto - Records Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', '', '2023-12-22 08:12:58', NULL, '2023-12-22 08:50:58'),
(156, 7, 'R5-DENREU', 'DENREU', 'DENREU', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(157, 7, 'R5-CANVASSER-ORED', 'Canvass.ORED', 'ORED', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(158, 7, 'R5-CANVASSER-OARDMS', 'Canvass.OARDMS', 'OARDMS', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(159, 7, 'R5-CANVASSER-OARDTS', 'Canvass.OARDTS', 'OARDTS', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(160, 7, 'R5-BACSEC', 'BAC', 'Bids and Awards Committee', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, NULL, NULL),
(161, 7, 'R5-RecvCheck', 'RV.RS', 'Regional Office V - Records Section', 'Office', NULL, NULL, 'unset', 'unset', 'unset', 'Rawis, Legazpi City', NULL, '2023-09-17 22:10:45', '2024-02-08 01:53:26'),
(162, 7, 'PENROa-RecvCheck', 'P.Albay.RS', 'PENRO Albay - Records Section', 'Receiving', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Legazpi Port District, Legazpi City, Albay', NULL, '2023-09-17 22:10:45', '2023-12-22 08:55:04'),
(163, 7, 'PENROcn-RecvCheck', 'P.CNorte.RS', 'PENRO Cam Norte - Records Section', 'Receiving', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Dagondan, Daet, Camarines Norte', NULL, '2023-09-17 22:10:45', '2023-12-22 08:54:34'),
(164, 7, 'PENROcs-RecvCheck', 'P.CSur.RS', 'PENRO Cam Sur - Records Section', 'Receiving', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', '', NULL, '2023-09-17 22:10:45', '2023-12-22 08:54:30'),
(165, 7, 'PENROm-RecvCheck', 'P.Masbate.RS', 'PENRO Masbate - Records Section', 'Receiving', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'Zurbito Street, Masbate City', NULL, '2023-09-17 22:10:45', '2023-12-22 08:54:24'),
(166, 7, 'PENROc-ADFS-RecvCheck', 'P.Catnes.RS', 'PENRO Catanduanes - Records Section', 'Receiving', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'San Isidro Village, Virac, Catanduanes', NULL, '2023-09-17 22:10:45', '2023-12-22 08:54:48'),
(167, 7, 'PENROs-RecvCheck', 'P.Sor.RS', 'PENRO Sorsogon - Records Section', 'Receiving', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'B. Road, Sorsogon City, Sorsogon', NULL, '2023-09-17 22:10:45', '2023-12-22 08:54:19'),
(168, 7, 'PENROa-RecvCheck-CENROguinobatan', 'C.Gbtn.RS', 'CENRO Guinobatan - Records Section', 'Receiving', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Morera, Guinobatan, Albay', NULL, '2023-09-17 22:10:45', '2023-12-22 08:55:39'),
(169, 7, 'PENROcs-RecvCheck-CENROiriga', 'C.Iriga.RS', 'CENRO Iriga - Records Section', 'Receiving', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', '', NULL, '2023-09-17 22:10:45', '2023-12-22 08:55:30'),
(170, 7, 'PENROcs-RecvCheck-CENROsipocot', 'C.Sipocot.RS', 'CENRO Sipocot - Records Section', 'Receiving', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', '', NULL, '2023-09-17 22:10:45', '2023-12-22 08:55:12'),
(171, 7, 'PENROcs-RecvCheck-CENROgoa', 'C.Goa.RS', 'CENRO Goa - Records Section', 'Receiving', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', '', NULL, '2023-09-17 22:10:45', '2023-12-22 08:55:35'),
(172, 7, 'PENROm-RecvCheck-CENROmb', 'C.Mobo.RS', 'CENRO Mobo - Records Section', 'Receiving', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', '', NULL, '2023-09-17 22:10:45', '2023-12-22 08:55:19'),
(173, 7, 'PENROm-RecvCheck-CENROsanjacinto', 'C.SJ.RS', 'CENRO San Jacinto - Records Section', 'Receiving', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', '', NULL, '2023-09-17 22:10:45', '2023-12-22 08:54:58'),
(176, 7, 'R5-CENRO-Guinobatan-Cashier', 'C.Gbtn.Cashier', 'CENRO Guinobatan - Cashier Section', 'Office', NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'unset', 'unset', 'unset', 'Morera, Guinobatan, Albay', NULL, NULL, '2023-12-22 08:41:04'),
(181, 7, 'R5-PENRO-Catnes-TSD', 'P.Catnes.TSD', 'PENRO Catanduanes - Technical Service Division', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'San Isidro Village, Virac, Catanduanes', NULL, '2023-12-06 02:06:55', '2023-12-22 08:33:18'),
(182, 7, 'R5-PENRO-Catnes-ADFS-AccU', 'P.Catnes.ADFS.AccU', 'PENRO Catanduanes - Accounting Office', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'San Isidro Village, Virac, Catanduanes', NULL, '2023-12-06 02:06:55', '2023-12-22 08:55:58'),
(183, 7, 'R5-PENRO-Catnes-ADFS-Cashier', 'P.Catnes.ADFS.Cashier', 'PENRO Catanduanes - Cashier Office', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'San Isidro Village, Virac, Catanduanes', NULL, '2023-12-06 02:06:55', '2023-12-22 08:56:03'),
(184, 7, 'R5-PENRO-Catnes-FUU', 'P.Catnes.FUU', 'PENRO Catanduanes - Forest Utilization Unit', 'Office', NULL, 'PROVINCIAL ENVIRONMENT AND NATURAL RESOURCES', 'unset', 'unset', 'unset', 'San Isidro Village, Virac, Catanduanes', NULL, '2023-12-06 02:06:55', '2023-12-22 08:33:50');

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
(2, 'assets\\img\\carousel\\', 'Banner_Septembe-as-Philippine-Bamboo-Month2023-web.jpg', NULL, NULL, NULL),
(3, 'assets\\img\\carousel\\', 'Banner_September-as-Coastal-Clean-Up-Month_2023-web.jpg', NULL, NULL, NULL),
(7, 'assets\\img\\carousel\\', 'DENR_STAT_TRIV.png', '2023-11-22 08:11:38', NULL, NULL),
(8, 'assets\\img\\carousel\\', 'Approved_34th_NSM_Streamer.png', '2023-11-22 08:11:38', NULL, NULL),
(9, 'assets\\img\\carousel\\', 'denr_banner.png', NULL, NULL, NULL),
(10, 'assets\\img\\carousel\\', 'DENR_STAT_TRIV_WINNER23-10-2023.png', '2023-11-08 08:33:23', NULL, NULL),
(18, 'assets\\img\\carousel\\', 'Banner_Environmental-Awareness-Month_November2023-web2.jpg.jpg', NULL, '2023-11-08 00:33:52', '2023-11-08 00:33:52'),
(19, 'assets\\img\\carousel\\', 'Black and Brown Realistic Carbohydrates Body Nutrients Classroom Poster.png.png', NULL, '2024-01-29 09:11:24', '2024-01-29 09:11:24'),
(20, 'assets\\img\\carousel\\', 'Banner_Bagong-Pilipinas_01-28-2024-web.jpg.jpg', NULL, '2024-01-29 09:11:41', '2024-01-29 09:11:41'),
(21, 'assets\\img\\carousel\\', 'Banner_January-as-Zero-Waste-Month_2024_updated-web.jpg.jpg', NULL, '2024-01-29 09:11:55', '2024-01-29 09:11:55'),
(22, 'assets\\img\\carousel\\', 'Jan_Banner_Zero_Waste_Month.jpg.jpg', NULL, '2024-01-30 06:31:26', '2024-01-30 06:31:26');

-- --------------------------------------------------------

--
-- Table structure for table `redts_j_user_offices`
--

CREATE TABLE `redts_j_user_offices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `offices_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redts_j_user_offices`
--

INSERT INTO `redts_j_user_offices` (`id`, `user_id`, `offices_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 161, NULL, NULL, NULL),
(2, 2, 4, NULL, NULL, NULL),
(304, 304, 5, NULL, NULL, '2023-12-27 05:22:23'),
(315, 315, 161, NULL, NULL, '2023-12-27 05:22:23'),
(316, 316, 168, NULL, NULL, '2024-01-30 02:48:58'),
(319, 321, 176, NULL, NULL, '2023-12-27 08:31:19'),
(321, 322, 47, NULL, NULL, '2024-01-29 01:59:37'),
(322, 324, 161, NULL, NULL, '2023-12-27 05:22:23'),
(323, 314, 5, NULL, NULL, '2023-11-29 19:08:24'),
(334, 317, 133, NULL, NULL, '2024-02-29 05:34:29'),
(335, 319, 1, NULL, NULL, '2023-12-27 05:22:23'),
(337, 340, 172, NULL, '2023-11-28 19:20:11', '2023-11-28 19:20:11'),
(338, 341, 166, NULL, '2023-12-06 00:46:11', '2023-12-20 03:15:00'),
(339, 342, 45, NULL, '2023-12-06 00:48:58', '2023-12-06 05:28:29'),
(340, 343, 112, NULL, '2023-12-06 01:19:27', '2023-12-06 05:28:16'),
(341, 344, 181, NULL, '2023-12-06 05:26:18', '2023-12-06 05:26:18'),
(342, 345, 181, NULL, '2023-12-06 05:26:18', '2023-12-06 05:26:18'),
(343, 346, 182, NULL, '2023-12-06 05:27:45', '2023-12-20 03:12:23'),
(344, 347, 183, NULL, '2023-12-06 05:27:45', '2023-12-06 05:30:11'),
(345, 348, 184, NULL, '2023-12-06 05:27:46', '2023-12-06 05:27:46'),
(346, 349, 1, NULL, '2023-12-16 16:37:45', '2023-12-16 16:37:45'),
(347, 350, 162, NULL, '2023-12-21 00:12:03', '2023-12-21 00:12:03'),
(348, 351, 84, NULL, '2023-12-21 00:13:04', '2024-02-29 01:49:23'),
(349, 352, 82, NULL, '2023-12-21 00:14:34', '2023-12-21 00:14:34'),
(350, 353, 41, NULL, '2023-12-21 00:16:47', '2024-02-29 01:49:46'),
(351, 354, 77, NULL, '2023-12-21 00:17:34', '2023-12-21 00:17:34'),
(352, 355, 85, NULL, '2023-12-21 00:18:28', '2023-12-21 00:18:28'),
(353, 356, 83, NULL, '2023-12-21 00:19:19', '2023-12-21 00:19:19'),
(354, 357, 79, NULL, '2023-12-21 00:19:53', '2023-12-21 00:19:53'),
(355, 358, 78, NULL, '2023-12-21 00:20:28', '2023-12-21 00:20:28'),
(356, 359, 80, NULL, '2023-12-21 00:21:18', '2023-12-21 00:21:18'),
(357, 360, 23, NULL, '2023-12-27 05:25:08', '2024-02-08 02:27:59'),
(358, 361, 5, NULL, '2023-12-27 05:50:01', '2023-12-27 05:50:01'),
(359, 362, 50, NULL, '2024-01-18 01:14:24', '2024-01-18 01:14:24'),
(360, 363, 50, NULL, '2024-01-18 01:14:25', '2024-01-18 01:14:25'),
(361, 364, 50, NULL, '2024-01-18 01:14:27', '2024-01-18 01:14:27'),
(362, 365, 50, NULL, '2024-01-18 01:14:28', '2024-01-18 01:14:28'),
(363, 366, 50, NULL, '2024-01-18 01:14:29', '2024-01-18 01:14:29'),
(364, 367, 50, NULL, '2024-01-18 01:14:30', '2024-01-18 01:14:30'),
(365, 368, 50, NULL, '2024-01-18 01:14:31', '2024-01-18 01:14:31'),
(366, 369, 50, NULL, '2024-01-18 01:26:49', '2024-01-18 01:26:49'),
(367, 370, 167, NULL, '2024-01-22 03:45:47', '2024-01-22 03:45:47'),
(368, 371, 27, NULL, '2024-02-08 02:32:53', '2024-02-08 03:18:18'),
(369, 372, 27, NULL, '2024-02-08 02:32:54', '2024-02-08 02:34:42');

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

--
-- Dumping data for table `redts_la_process_lengths`
--

INSERT INTO `redts_la_process_lengths` (`id`, `subclass_id`, `remarks`, `process_length_days`, `process_length_hours`, `process_length_minutes`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '33 working days & 50 min. (for relatively non-remote areas)', 33, 0, 50, NULL, '2023-09-24 17:50:21', '2023-09-24 17:50:21'),
(2, 1, '35 working days & 50 min. (for relatively remote areas)', 35, 0, 50, NULL, '2023-09-24 17:50:21', '2023-09-24 17:50:21'),
(3, 2, '33 working days & 50 min. (for relatively non-remote areas)', 33, 0, 50, NULL, '2023-09-24 17:50:21', '2023-09-24 17:50:21'),
(4, 2, '35 working days & 50 min. (for relatively remote areas)', 35, 0, 50, NULL, '2023-09-24 17:50:21', '2023-09-24 17:50:21'),
(5, 3, '16 working days & 6 hours', 16, 6, 0, NULL, '2023-09-24 17:50:21', '2023-09-24 17:50:21'),
(6, 4, '7 working days', 7, 0, 0, NULL, '2023-09-24 17:50:21', '2023-09-24 17:50:21'),
(7, 5, '2 days 4 hours and 30 minutes', 2, 4, 30, NULL, '2023-10-25 06:23:44', '2023-10-25 06:23:44'),
(8, 6, '2 days 4 hours and 30 minutes', 2, 4, 30, NULL, '2023-10-25 06:23:44', '2023-10-25 06:23:44'),
(9, 7, '2 days 4 hours and 30 minutes', 2, 4, 30, NULL, '2023-10-25 06:23:44', '2023-10-25 06:23:44'),
(10, 8, '2 days 4 hours and 30 minutes', 2, 4, 30, NULL, '2023-10-25 06:23:44', '2023-10-25 06:23:44'),
(11, 9, '2 days 4 hours and 30 minutes', 2, 4, 30, NULL, '2023-10-25 06:23:44', '2023-10-25 06:23:44'),
(12, 10, '2 days 4 hours and 30 minutes', 2, 4, 30, NULL, '2023-10-25 06:23:44', '2023-10-25 06:23:44'),
(13, 11, '4 days', 4, 0, 0, NULL, NULL, NULL);

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

--
-- Dumping data for table `redts_lc_rstct_sbmsn_of_reqs`
--

INSERT INTO `redts_lc_rstct_sbmsn_of_reqs` (`id`, `subclass_id`, `rstd_office_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 165, NULL, '2024-02-13 09:00:18', '2024-02-13 09:00:18'),
(2, 1, 164, NULL, '2024-02-13 09:00:19', '2024-02-13 09:00:19'),
(3, 1, 23, NULL, '2024-02-13 09:00:19', '2024-02-13 09:00:19'),
(4, 2, 165, NULL, '2024-02-13 09:00:19', '2024-02-13 09:00:19'),
(5, 2, 164, NULL, '2024-02-13 09:00:19', '2024-02-13 09:00:19'),
(6, 2, 23, NULL, '2024-02-13 09:00:19', '2024-02-13 09:00:19'),
(7, 3, 165, NULL, '2024-02-13 09:00:19', '2024-02-13 09:00:19'),
(8, 3, 164, NULL, '2024-02-13 09:00:19', '2024-02-13 09:00:19'),
(9, 3, 23, NULL, '2024-02-13 09:00:19', '2024-02-13 09:00:19'),
(10, 4, 165, NULL, '2024-02-13 09:00:19', '2024-02-13 09:00:19'),
(11, 4, 164, NULL, '2024-02-13 09:00:19', '2024-02-13 09:00:19'),
(12, 4, 23, NULL, '2024-02-13 09:00:19', '2024-02-13 09:00:19'),
(13, 5, 165, NULL, '2024-02-13 09:00:19', '2024-02-13 09:00:19'),
(14, 5, 164, NULL, '2024-02-13 09:00:19', '2024-02-13 09:00:19'),
(15, 5, 23, NULL, '2024-02-13 09:00:19', '2024-02-13 09:00:19'),
(16, 6, 165, NULL, '2024-02-13 09:00:19', '2024-02-13 09:00:19'),
(17, 6, 164, NULL, '2024-02-13 09:00:19', '2024-02-13 09:00:19'),
(18, 6, 23, NULL, '2024-02-13 09:00:19', '2024-02-13 09:00:19'),
(19, 7, 165, NULL, '2024-02-13 09:00:19', '2024-02-13 09:00:19'),
(20, 7, 164, NULL, '2024-02-13 09:00:19', '2024-02-13 09:00:19'),
(21, 7, 23, NULL, '2024-02-13 09:00:19', '2024-02-13 09:00:19'),
(22, 8, 165, NULL, '2024-02-13 09:00:19', '2024-02-13 09:00:19'),
(23, 8, 164, NULL, '2024-02-13 09:00:19', '2024-02-13 09:00:19'),
(24, 8, 23, NULL, '2024-02-13 09:00:19', '2024-02-13 09:00:19'),
(25, 9, 165, NULL, '2024-02-13 09:00:19', '2024-02-13 09:00:19'),
(26, 9, 164, NULL, '2024-02-13 09:00:19', '2024-02-13 09:00:19'),
(27, 9, 23, NULL, '2024-02-13 09:00:19', '2024-02-13 09:00:19'),
(28, 10, 165, NULL, '2024-02-13 09:00:19', '2024-02-13 09:00:19'),
(29, 10, 164, NULL, '2024-02-13 09:00:19', '2024-02-13 09:00:19'),
(30, 10, 23, NULL, '2024-02-13 09:00:19', '2024-02-13 09:00:19');

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

--
-- Dumping data for table `redts_le_subclass_fees`
--

INSERT INTO `redts_le_subclass_fees` (`id`, `subclass_id`, `item_name`, `fee_amount`, `cost_grouping`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'PENRO / CENRO Sub-Total', 86.00, 'a1', NULL, '2024-02-20 02:37:53', '2024-02-20 02:37:53'),
(2, 1, 'Certification Fee', 50.00, 'a1', NULL, '2024-02-20 02:37:53', '2024-02-20 02:37:53'),
(3, 1, 'Application Oath Fee', 36.00, 'a1', NULL, '2024-02-20 02:37:53', '2024-02-20 02:37:53'),
(4, 1, 'Inventory Fee per ha', 1200.00, 'a1', NULL, '2024-02-20 02:37:53', '2024-02-20 02:37:53'),
(5, 2, 'PENRO / CENRO Sub-Total', 86.00, 'a1', NULL, '2024-02-20 02:37:53', '2024-02-20 02:37:53'),
(6, 2, 'Certification Fee', 50.00, 'a1', NULL, '2024-02-20 02:37:53', '2024-02-20 02:37:53'),
(7, 2, 'Application Oath Fee', 36.00, 'a1', NULL, '2024-02-20 02:37:53', '2024-02-20 02:37:53'),
(8, 2, 'Inventory Fee per ha', 1200.00, 'a1', NULL, '2024-02-20 02:37:53', '2024-02-20 02:37:53'),
(9, 3, 'Certification Fee', 50.00, 'a1', NULL, '2024-02-20 02:37:53', '2024-02-20 02:37:53'),
(10, 3, 'Application Oath Fee', 36.00, 'a1', NULL, '2024-02-20 02:37:53', '2024-02-20 02:37:53'),
(11, 3, 'Inventory Fee per Ha', 1200.00, 'a1', NULL, '2024-02-20 02:37:53', '2024-02-20 02:37:53'),
(12, 4, 'Certification Fee', 50.00, 'a1', NULL, '2024-02-20 02:37:53', '2024-02-20 02:37:53'),
(13, 4, 'Application Oath Fee', 36.00, 'a1', NULL, '2024-02-20 02:37:53', '2024-02-20 02:37:53'),
(14, 5, 'Registration Fee', 500.00, 'a1', NULL, '2024-02-20 02:37:53', '2024-02-20 02:37:53'),
(15, 6, 'Registration Fee', 500.00, 'a1', NULL, '2024-02-20 02:37:53', '2024-02-20 02:37:53'),
(16, 7, 'Registration Fee', 500.00, 'a1', NULL, '2024-02-20 02:37:53', '2024-02-20 02:37:53'),
(17, 8, 'Registration Fee', 500.00, 'a1', NULL, '2024-02-20 02:37:53', '2024-02-20 02:37:53'),
(18, 9, 'Registration Fee', 500.00, 'a1', NULL, '2024-02-20 02:37:53', '2024-02-20 02:37:53'),
(19, 10, 'Registration Fee', 500.00, 'a1', NULL, '2024-02-20 02:37:53', '2024-02-20 02:37:53'),
(20, 11, '1-50 Individuals', 50.00, 'a1', NULL, '2024-02-20 02:37:53', '2024-02-20 02:37:53'),
(21, 11, '50-100 Individuals', 100.00, 'a1', NULL, '2024-02-20 02:37:53', '2024-02-20 02:37:53'),
(22, 11, 'More than 100 Individuals', 500.00, 'a1', NULL, '2024-02-20 02:37:53', '2024-02-20 02:37:53');

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
(1, 1, 'Private Land Timber Permit', 'PLTP serves as the official authority to cut, gather and utilize naturally grown trees within private or titled \r\nlands.', 'PLTP', 'highly_technical', NULL, '2023-09-07 21:30:31', '2023-11-30 00:34:59'),
(2, 1, 'Special Private Land Timber Permit', 'SPLTP serves as the official authority to cut, gather and utilize naturally grown trees within private or titled \r\nlands.', 'SPLTP', 'highly_technical', NULL, '2023-09-07 21:30:31', '2023-11-30 00:35:12'),
(3, 2, 'Tree Cutting Permit for Public Places', 'This Permit serves as proof of authorization for the removal/cutting of trees in public places (Plaza, Public Parks, School \r\nPremises or Political Subdivisions for purposes of public safety).', 'TCPP', 'highly_technical', NULL, '2023-09-07 21:30:31', '2023-11-30 00:36:31'),
(4, 2, 'Tree Cutting and/or Earth Balling Permit', 'This Permit serves as proof of authorization for the removal/cutting and/or relocation of trees affected by projects of \r\nthe National Government Agencies (DPWH, DOTr, DepEd, Da, DOH, CHED, DOE and NIA)', 'TCEBP', 'complex', NULL, '2023-09-07 21:30:31', '2023-11-30 00:36:54'),
(5, 3, 'Chainsaw Registration for Tenure Holders', 'Holder of a Subsisting Tenurial Instrument', 'CsRegHSTI', 'simple', NULL, '2023-10-04 19:10:59', '2023-11-03 00:23:06'),
(6, 3, 'Chainsaw Registration for Orchard/Fruit or Industrial Tree Farmer', 'Orchard/Fruit Tree Farmer or Industrial Tree Farmer', 'CsRegITF', 'simple', NULL, '2023-10-04 19:10:59', '2023-11-05 07:57:16'),
(7, 3, 'Chainsaw Registration for Licensed Processor', 'Licensed Wood Processors', 'CsRegLWP', 'simple', NULL, '2023-10-04 19:10:59', '2023-11-05 07:40:55'),
(8, 3, 'Chainsaw Registration for Govt. and controlled Corporations', 'Government-owned and controlled corporations', 'CsRegG', 'simple', NULL, '2023-10-04 19:10:59', '2023-11-05 16:53:03'),
(9, 3, 'Other Entity Chainsaw Registration', 'Other persons/entities', 'CsRegOE', 'simple', NULL, '2023-10-04 19:10:59', '2023-11-03 00:26:25'),
(10, 3, 'Chainsaw Reg. Renewal', 'Chainsaw Registration Renewal', 'CsRrnwl', 'simple', NULL, '2023-10-04 19:10:59', '2023-11-03 00:26:47'),
(11, 6, 'Wildlife Gratuitous Permit', NULL, 'WGP', 'highly_technical', NULL, '2023-11-02 18:36:38', '2023-11-02 18:36:38');

-- --------------------------------------------------------

--
-- Table structure for table `redts_na_action_attachments`
--

CREATE TABLE `redts_na_action_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `action_id` bigint(20) UNSIGNED NOT NULL,
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

INSERT INTO `redts_na_action_attachments` (`id`, `action_id`, `remarks`, `file_path`, `file_name`, `file_link`, `deleted_at`, `created_at`, `updated_at`, `public`) VALUES
(1, 240, 'certification', 'action_files', 'ad240_certification_202401291030.pdf', 'n/a', NULL, '2024-01-29 02:30:49', '2024-01-29 02:30:49', 0),
(2, 254, 'Certification', 'action_files', 'ad254_Certification_202402081555.pdf', 'n/a', NULL, '2024-02-08 07:55:34', '2024-02-08 07:55:34', 0),
(3, 239, 'CsRegITF JUAN D. DELA CRUZ Certification', 'action_files', 'ad239_CsRegITF JUAN D. DELA CRUZ Certification_202402271159.pdf', 'n/a', NULL, '2024-02-27 03:59:07', '2024-02-27 03:59:07', 1),
(4, 247, 'certification', 'action_files', 'ad247_certification_202402291152.pdf', 'n/a', NULL, '2024-02-29 03:52:04', '2024-02-29 03:52:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `redts_nb_releasing_routes`
--

CREATE TABLE `redts_nb_releasing_routes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `origin_act` bigint(20) UNSIGNED NOT NULL,
  `released_act` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redts_nb_releasing_routes`
--

INSERT INTO `redts_nb_releasing_routes` (`id`, `origin_act`, `released_act`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 246, 257, NULL, '2024-02-29 03:11:57', '2024-02-29 03:11:57'),
(2, 257, 258, NULL, '2024-02-29 03:17:40', '2024-02-29 03:17:40'),
(3, 258, 259, NULL, '2024-02-29 05:35:55', '2024-02-29 05:35:55'),
(4, 259, 260, NULL, '2024-02-29 05:37:44', '2024-02-29 05:37:44');

-- --------------------------------------------------------

--
-- Table structure for table `redts_nc_act_seens`
--

CREATE TABLE `redts_nc_act_seens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `action_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redts_nc_act_seens`
--

INSERT INTO `redts_nc_act_seens` (`id`, `action_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 260, NULL, '2024-03-07 02:28:03', '2024-03-07 02:28:03'),
(2, 245, NULL, '2024-03-07 02:29:09', '2024-03-07 02:29:09'),
(3, 250, NULL, '2024-03-07 02:53:02', '2024-03-07 02:53:02');

-- --------------------------------------------------------

--
-- Table structure for table `redts_n_actions`
--

CREATE TABLE `redts_n_actions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` longtext DEFAULT NULL,
  `doc_id` bigint(20) UNSIGNED NOT NULL,
  `sender_client_id` bigint(20) UNSIGNED NOT NULL,
  `sender_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sender_type` varchar(255) NOT NULL,
  `referred_by_office` bigint(20) UNSIGNED NOT NULL,
  `action_taken` longtext DEFAULT NULL,
  `send_to_office` bigint(20) UNSIGNED NOT NULL,
  `validated` datetime DEFAULT NULL,
  `received_id` bigint(20) UNSIGNED DEFAULT NULL,
  `received` timestamp NULL DEFAULT NULL,
  `released` timestamp NULL DEFAULT NULL,
  `final_action` timestamp NULL DEFAULT NULL,
  `rejected` timestamp NULL DEFAULT NULL,
  `verification_date` timestamp NULL DEFAULT NULL,
  `in_transit_remarks` longtext DEFAULT NULL,
  `document_remarks` longtext DEFAULT NULL,
  `action_remarks` longtext DEFAULT NULL,
  `attachment_remarks` longtext DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redts_n_actions`
--

INSERT INTO `redts_n_actions` (`id`, `subject`, `doc_id`, `sender_client_id`, `sender_user_id`, `sender_type`, `referred_by_office`, `action_taken`, `send_to_office`, `validated`, `received_id`, `received`, `released`, `final_action`, `rejected`, `verification_date`, `in_transit_remarks`, `document_remarks`, `action_remarks`, `attachment_remarks`, `deleted_at`, `created_at`, `updated_at`) VALUES
(224, 'Request for Tree Cutting Permit for Public Places', 137, 38, NULL, 'Client', 166, NULL, 166, NULL, 341, '2023-12-21 05:18:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-20 05:36:50', '2023-12-21 05:18:51'),
(225, 'Request for Chainsaw Reg. Renewal', 138, 41, NULL, 'Client', 167, NULL, 167, NULL, 370, '2024-01-22 03:51:07', '2024-01-22 03:53:02', NULL, NULL, '2024-01-22 03:53:06', NULL, NULL, 'FOR REVIEW AND CHECKING (ADMIN TEST)', NULL, NULL, '2024-01-22 03:18:23', '2024-01-22 03:53:06'),
(226, 'Request for Chainsaw Reg. Renewal', 138, 41, 370, 'Validator', 167, 'FOR REVIEW AND CHECKING (ADMIN TEST)', 4, NULL, 2, '2024-01-22 03:56:09', '2024-01-22 03:56:53', NULL, NULL, NULL, 'WRONG OFFICE', NULL, 'FORWORDING TO ICT OFFICE', 'NO ADDITIONAL ATTACHMENTS', NULL, '2024-01-22 03:53:02', '2024-01-22 03:56:53'),
(227, 'Request for Chainsaw Reg. Renewal', 138, 41, 2, 'DTS Administrator', 4, 'FORWORDING TO ICT OFFICE', 5, NULL, 314, '2024-01-22 03:58:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NO OTHER ATTACHMENT', NULL, '2024-01-22 03:56:53', '2024-01-22 03:58:36'),
(232, 'Request for Private Land Timber Permit', 143, 47, NULL, 'Client', 168, NULL, 168, NULL, 316, '2024-01-29 02:19:22', '2024-01-29 02:28:18', NULL, NULL, '2024-01-29 02:28:20', 'FOR APPROVE', NULL, 'FOR REVIEW', NULL, NULL, '2024-01-29 02:17:17', '2024-01-29 02:28:20'),
(233, 'Request for Tree Cutting Permit for Public Places', 144, 47, NULL, 'Client', 168, NULL, 168, NULL, 316, '2024-01-29 02:25:54', '2024-01-29 02:27:56', NULL, NULL, '2024-01-29 02:27:58', NULL, NULL, 'FOR REVIEW', NULL, NULL, '2024-01-29 02:22:20', '2024-01-29 02:27:58'),
(234, 'Request for Wildlife Gratuitous Permit', 145, 47, NULL, 'Client', 168, NULL, 168, NULL, 316, '2024-01-29 02:25:52', '2024-01-29 02:27:41', NULL, NULL, '2024-01-29 02:27:43', NULL, NULL, 'FOR REVIEW', NULL, NULL, '2024-01-29 02:22:52', '2024-01-29 02:27:43'),
(235, 'Request for Tree Cutting and/or Earth Balling Permit', 146, 47, NULL, 'Client', 168, NULL, 168, NULL, 316, '2024-01-29 02:25:46', '2024-01-29 02:27:26', NULL, NULL, '2024-01-29 02:27:28', NULL, NULL, 'FOR REVIEW', NULL, NULL, '2024-01-29 02:23:38', '2024-01-29 02:27:28'),
(236, 'Request for Chainsaw Registration for Orchard/Fruit or Industrial Tree Farmer', 147, 47, NULL, 'Client', 168, NULL, 168, NULL, 316, '2024-01-29 02:25:45', '2024-01-29 02:27:14', NULL, NULL, '2024-01-29 02:27:15', NULL, NULL, 'FOR REVIEW', NULL, NULL, '2024-01-29 02:24:38', '2024-01-29 02:27:15'),
(237, 'Request for Wildlife Gratuitous Permit', 148, 47, NULL, 'Client', 168, NULL, 168, NULL, 316, '2024-01-29 02:25:50', '2024-01-29 02:26:48', NULL, NULL, '2024-01-29 02:26:49', NULL, NULL, 'FOR REVIEW', NULL, NULL, '2024-01-29 02:25:18', '2024-01-29 02:26:49'),
(238, 'Request for Wildlife Gratuitous Permit', 148, 47, 316, 'Validator', 168, 'FOR REVIEW', 47, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-29 02:26:48', '2024-01-29 02:26:48'),
(239, 'Request for Chainsaw Registration for Orchard/Fruit or Industrial Tree Farmer', 147, 47, 316, 'Validator', 168, 'FOR PUBLISHING', 47, NULL, 322, '2024-01-29 02:28:58', NULL, '2024-02-27 03:59:06', NULL, NULL, NULL, NULL, 'FOR PUBLISHING', NULL, NULL, '2024-01-29 02:27:14', '2024-02-27 03:59:06'),
(240, 'Request for Tree Cutting and/or Earth Balling Permit', 146, 47, 316, 'Validator', 168, 'APPROVED', 47, NULL, 322, '2024-01-29 02:28:53', NULL, '2024-01-29 02:30:49', NULL, NULL, NULL, NULL, 'APPROVED', NULL, NULL, '2024-01-29 02:27:26', '2024-01-29 02:30:49'),
(241, 'Request for Wildlife Gratuitous Permit', 145, 47, 316, 'Validator', 168, 'FOR REVIEW', 47, NULL, 322, '2024-01-29 02:28:50', '2024-01-29 05:55:13', NULL, NULL, NULL, NULL, NULL, 'FOR INSPECTION', NULL, NULL, '2024-01-29 02:27:41', '2024-01-29 05:55:13'),
(242, 'Request for Tree Cutting Permit for Public Places', 144, 47, 316, 'Validator', 168, 'FOR REVIEW', 47, NULL, 322, '2024-01-29 02:28:45', '2024-01-29 02:29:59', NULL, NULL, NULL, NULL, NULL, 'FOR REVIEW', NULL, NULL, '2024-01-29 02:27:56', '2024-01-29 02:29:59'),
(243, 'Request for Private Land Timber Permit', 143, 47, 316, 'Validator', 168, 'INCOMPLETE', 47, NULL, 322, '2024-01-29 02:28:40', NULL, NULL, '2024-01-29 02:29:26', NULL, NULL, NULL, 'INCOMPLETE', NULL, NULL, '2024-01-29 02:28:18', '2024-01-29 02:29:26'),
(244, 'Request for Tree Cutting Permit for Public Places', 144, 47, 322, 'Processor', 47, 'FOR REVIEW', 168, NULL, 316, '2024-01-30 02:50:07', '2024-02-08 02:50:44', NULL, NULL, NULL, NULL, NULL, 'SAMPLE', NULL, NULL, '2024-01-29 02:29:59', '2024-02-08 02:50:44'),
(245, 'Request for Wildlife Gratuitous Permit', 145, 47, 322, 'Processor', 47, 'FOR INSPECTION', 47, NULL, 322, '2024-03-07 02:29:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-29 05:55:13', '2024-03-07 02:29:03'),
(246, 'Request for Chainsaw Reg. Renewal', 149, 47, NULL, 'Client', 168, NULL, 168, NULL, 316, '2024-01-30 02:56:45', '2024-02-29 03:11:57', NULL, NULL, NULL, 'RECEIVE', NULL, 'FOR RELEASE', NULL, NULL, '2024-01-30 02:56:15', '2024-02-29 03:11:57'),
(247, 'Request for Tree Cutting Permit for Public Places', 144, 47, 316, 'Validator', 168, 'APPROVED', 133, NULL, 317, '2024-02-20 02:33:06', NULL, '2024-02-29 03:52:04', NULL, NULL, NULL, NULL, 'APPROVED', NULL, NULL, '2024-02-08 02:50:44', '2024-02-29 03:52:04'),
(248, 'Request for Wildlife Gratuitous Permit', 150, 47, NULL, 'Client', 23, NULL, 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-08 06:24:09', '2024-02-08 06:24:09'),
(249, 'Request for Wildlife Gratuitous Permit', 151, 47, NULL, 'Client', 23, NULL, 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-08 06:24:35', '2024-02-08 06:24:35'),
(250, 'Request for Wildlife Gratuitous Permit', 152, 47, NULL, 'Client', 23, NULL, 23, NULL, 360, '2024-02-23 06:19:01', NULL, NULL, NULL, NULL, 'FOR REVIEW', NULL, NULL, NULL, NULL, '2024-02-08 06:30:01', '2024-02-23 06:19:01'),
(251, 'Request for Wildlife Gratuitous Permit', 153, 47, NULL, 'Client', 23, NULL, 23, NULL, 360, '2024-02-13 06:57:21', '2024-02-13 06:57:43', NULL, NULL, '2024-02-13 06:57:44', NULL, NULL, 'FOR RELEASE', NULL, NULL, '2024-02-08 06:31:20', '2024-02-13 06:57:44'),
(252, 'Request for Wildlife Gratuitous Permit', 154, 47, NULL, 'Client', 23, NULL, 23, NULL, 360, '2024-02-08 07:19:20', '2024-02-08 07:24:00', NULL, NULL, '2024-02-08 07:24:02', 'FOR APPROVAL', NULL, 'APPROVED', NULL, NULL, '2024-02-08 06:31:46', '2024-02-08 07:24:02'),
(253, 'Request for Wildlife Gratuitous Permit', 154, 47, 360, 'DTS Administrator', 23, 'APPROVED', 27, NULL, 371, '2024-02-08 07:29:34', '2024-02-08 07:50:24', NULL, NULL, NULL, NULL, NULL, 'FOR PREPARATION OF CERTIFICATION', NULL, NULL, '2024-02-08 07:24:00', '2024-02-08 07:50:24'),
(254, 'Request for Wildlife Gratuitous Permit', 154, 47, 371, 'Processor', 27, 'FINAL ACTION', 23, NULL, 360, '2024-02-08 07:51:55', NULL, '2024-02-08 07:55:34', NULL, NULL, NULL, NULL, 'FINAL ACTION', NULL, NULL, '2024-02-08 07:50:24', '2024-02-08 07:55:34'),
(255, 'Request for Wildlife Gratuitous Permit', 153, 47, 360, 'DTS Administrator', 23, 'FOR RELEASE', 27, NULL, 371, '2024-02-13 06:58:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-13 06:57:43', '2024-02-13 06:58:08'),
(256, 'Request for Chainsaw Reg. Renewal', 155, 50, NULL, 'Client', 162, NULL, 162, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 07:52:33', '2024-02-28 07:52:33'),
(257, 'Request for Chainsaw Reg. Renewal', 149, 47, 316, 'Validator', 168, 'FOR RELEASE', 168, NULL, 316, '2024-02-29 03:17:04', '2024-02-29 03:17:40', NULL, NULL, NULL, 'SAMPLE FOR ORDER OF PAYMENT', NULL, 'ORDER OF PAYMENT', NULL, NULL, '2024-02-29 03:11:57', '2024-02-29 03:17:40'),
(258, 'Request for Chainsaw Reg. Renewal', 149, 47, 316, 'Validator', 168, 'ORDER OF PAYMENT', 133, NULL, 317, '2024-02-29 03:34:50', '2024-02-29 05:35:55', NULL, NULL, NULL, NULL, NULL, 'PLEASE APPROVE', NULL, NULL, '2024-02-29 03:17:40', '2024-02-29 05:35:55'),
(259, 'Request for Chainsaw Reg. Renewal', 149, 47, 317, 'Processor', 133, 'PLEASE APPROVE', 168, NULL, 316, '2024-02-29 05:37:11', '2024-02-29 05:37:43', NULL, NULL, '2024-02-29 05:37:44', NULL, NULL, 'FOR RELEASE', NULL, NULL, '2024-02-29 05:35:55', '2024-02-29 05:37:44'),
(260, 'Request for Chainsaw Reg. Renewal', 149, 47, 316, 'Validator', 168, 'FOR RELEASE', 133, NULL, 317, '2024-02-29 05:38:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-29 05:37:44', '2024-02-29 05:38:06');

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
(1, 10000000, NULL, NULL, NULL);

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

--
-- Dumping data for table `redts_y_requirements`
--

INSERT INTO `redts_y_requirements` (`id`, `subclass_id`, `title`, `slug`, `description`, `attachment_type`, `requirement_type`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Application Letter', 'AL', 'Application Letter (1 copy)', 'file', 'required', NULL, '2023-09-07 21:59:32', '2023-09-07 21:59:32'),
(2, 1, 'LGU Endorsement or Certification of No Objection', 'LGUECNO', 'LGU Endorsement/Certification of No Objection (1 Copy)', 'file', 'required', NULL, '2023-09-07 21:59:32', '2023-11-02 20:20:54'),
(3, 1, 'Endorsement from concerned LGU', 'EFCLGU', 'Endorsement from concerned LGU interposng no objection to the cutting of trees under the following conditions (1 Copy)', 'file', 'required', '2023-11-02 16:00:00', '2023-09-07 21:59:32', '2023-11-02 20:20:40'),
(4, 1, 'Environmental Compliance Certificate', 'ECC', 'Environmental Compliance Certificate (ECC)/Certificate of Non-Coverage (CNC)', 'file', 'required', NULL, '2023-09-07 21:59:32', '2023-09-07 21:59:32'),
(5, 1, 'Utilization Plan', 'UP', 'Utilization Plan with at least 50% of the area covered with the forest trees (1 Copy)', 'file', 'required', NULL, '2023-09-07 21:59:32', '2023-09-07 21:59:32'),
(6, 1, 'Endorsement by local Agrarian Reform Officer', 'EBLARO', 'Endorsement by local Agrarian Reform Officer interposing No Objection (1 Copy)', 'file', 'required', NULL, '2023-09-07 21:59:32', '2023-11-02 20:21:48'),
(7, 1, 'PTA Resolution', 'PTAR', 'PTA Resolution or Resolution from any organized group of No Objection and Reason for  Cutting for School/Organization (1 copy)', 'file', 'required', NULL, '2023-09-07 21:59:32', '2023-09-07 21:59:32'),
(8, 1, 'CLOA issued the Land Registration Authority', 'CLOA', 'Authenticated copy of land title/CLOA issued the Land Registration Authority or registry of Deeds, whichever is applicable', 'file', 'required', NULL, '2023-09-07 21:59:32', '2023-09-07 21:59:32'),
(9, 2, 'Application Letter', 'AL', 'Application Letter (1 Copy)', 'file', 'required', NULL, '2023-09-07 21:59:32', '2023-09-07 21:59:32'),
(10, 2, 'LGU Endorsement or Certification of No Objection', 'LGUECNO', 'LGU Endorsement/Certification of No Objection (1 Copy)', 'file', 'required', NULL, '2023-09-07 21:59:32', '2023-11-02 20:19:42'),
(11, 2, 'Endorsement from concerned LGU', 'EFCLGU', 'Endorsementfrom concerned LGU interposing no objection (1 Copy)', 'file', 'required', '2023-11-02 16:00:00', '2023-09-07 21:59:32', '2023-11-02 20:19:08'),
(12, 2, 'Environmental Compliance Certificate', 'ECC', 'Environmental Compliance Certificate (ECC)/Certificate of No-Coverage (CNC), if applicable', 'file', 'required', NULL, '2023-09-07 21:59:32', '2023-09-07 21:59:32'),
(13, 2, 'Utilization Plan', 'UP', 'Utilization Plan with at least 50% of of the area covered with forest trees (1 Copy)', 'file', 'required', NULL, '2023-09-07 21:59:32', '2023-09-07 21:59:32'),
(14, 2, 'Endorsement by local agrarian reform officer', 'EBLARO', 'Endorsement by local agrarian reform officer interposing No Objection (1 Copy)', 'file', 'required', NULL, '2023-09-07 21:59:32', '2023-09-07 21:59:32'),
(15, 2, 'PTA Resolution', 'PTAR', 'PTA Resolution or Resolution from any organized group of No Objection and Reason for Cutting  for School/Organization (1 copy)', 'file', 'required', NULL, '2023-09-07 21:59:32', '2023-09-07 21:59:32'),
(16, 2, 'CLOA issued the Land Registration Authority', 'CLOA', 'Authenticated copy of land title/CLOA issued the Land Registration Authority or Registry of Deeds, whichever is applicable', 'file', 'required', NULL, '2023-09-07 21:59:32', '2023-09-07 21:59:32'),
(18, 3, 'Application Letter', 'AL', 'Application Letter (1 original)', 'file', 'required', NULL, '2023-09-07 21:59:32', '2023-09-07 21:59:32'),
(19, 3, 'LGU Endorsement or Certification of No Objection', 'LGUECNO', 'LGU Endorsement/Certification of No Objection (1 original copy)', 'file', 'required', NULL, '2023-09-07 21:59:32', '2023-11-02 19:25:56'),
(20, 3, 'Timber Inventory of Trees to be Cut', 'TIOTTBC', 'Report duly signed by the forest officers who conducted the timber inventory of trees to be cut, to include the result of 100% timber inventory Additional if within Subdivisions', 'file', 'required', NULL, '2023-09-07 21:59:32', '2023-09-07 21:59:32'),
(21, 3, 'Homeowners Resolution', 'HOR', 'Homeowner\'s Resolution (1 original)', 'file', 'required', NULL, '2023-09-07 21:59:32', '2023-09-07 21:59:32'),
(22, 3, 'PTA Resolution', 'PTAR', 'PTA Resolution or Resolution from any organize group of No Objection and Reason for Cutting (1 original)', 'file', 'additional', NULL, '2023-09-07 21:59:32', '2023-09-07 21:59:32'),
(23, 4, 'Application Letter', 'AL', 'Letter of Application (1 original)', 'file', 'required', NULL, '2023-09-07 21:59:32', '2023-09-07 21:59:32'),
(24, 4, 'LGU Endorsement or Certification of No Objection', 'LGUECNO', 'LGU Endorsement Certification of No Objection (1 original)', 'file', 'required', NULL, '2023-09-07 21:59:32', '2023-11-02 19:27:49'),
(25, 4, 'Approved Site Development Plan', 'ASDP', 'Approved Site Development Plan/Infrastructure Plan with tree charting (original)', 'file', 'required', NULL, '2023-09-07 21:59:32', '2023-09-07 21:59:32'),
(26, 4, 'Environmental Compliance Certificate', 'ECC', 'Environmental Compliance Certificate (ECC)/Certificate of Non Coverage CNC), if applicable. The DENR ROIEMB shall determine if the tree cutting activities will require ECC1CNC based on the extent of tree cutting operations. location (e.g. Environmentally Critical Area), among others, if necessary (1 certified copy)', 'file', 'required', NULL, '2023-09-07 21:59:32', '2023-09-07 21:59:32'),
(27, 4, 'Free Prior and Informed Consent', 'FPIC', 'Free, Prior and Informed Consent (FPIC): if applicable', 'file', 'required', NULL, '2023-09-07 21:59:32', '2023-09-07 21:59:32'),
(28, 4, 'Waiver or Consent of own errs', 'WOOE', 'Waiver/Consent of own errs, if titled property (1 original)', 'file', 'required', NULL, '2023-09-07 21:59:32', '2023-09-07 21:59:32'),
(29, 4, 'PAMB Clearance or Resolution', 'PAMBC', 'PAMB Clearance/Resolution, if within Protected Area (1 original)', 'file', 'required', NULL, '2023-09-07 21:59:32', '2023-09-07 21:59:32'),
(30, 4, 'Inventory of trees to be Cut', 'IOTTBC', 'Report duly signed by the forest officers who conducted the inventory of trees to be cut, to include the result of 100% inventory', 'file', 'required', NULL, '2023-09-07 21:59:32', '2023-09-07 21:59:32'),
(31, 4, 'Proposed Development Plan of the Project', 'PDPOTP', 'Copy of the proposed development plan of the project incorporating therein the relative location of the Mangrove species.', 'file', 'additional', NULL, '2023-09-07 21:59:32', '2023-09-07 21:59:32'),
(32, 4, 'In-Depth Review of the Proposed Project', 'IDROTPP', 'In-Depth review of the proposed project, taking into consideration the possible options for re-alignment/adjustment to lessen the number of Mangrove to be affected', 'file', 'additional', NULL, '2023-09-07 21:59:32', '2023-09-07 21:59:32'),
(33, 4, 'Justification that the Mangroves can no longer be avoided', 'JMCA', 'Justification that the Mangroves can no longer be avoided and possible option to minimize/damage to the Mangrove area.', 'file', 'additional', NULL, '2023-09-07 21:59:32', '2023-09-07 21:59:32'),
(34, 5, 'Issued Tenurial instrument', 'ITI', '4.23 Tenurial instruments - are leases, permits, agreements, joint venture or production sharing agreements, and licenses concerning the development, exploration and utilization of the country\'s natural resources. SECTION 5. Creation of an Asset Management Team (AMT). src: https://law.upd.edu.ph/wp-content/uploads/2020/11/DENR-Administrative-Order-No-2020-09.pdf', 'file', 'required', NULL, '2023-10-26 21:45:48', '2023-11-06 02:01:58'),
(35, 5, 'Brand', 'Brand', 'e.g. Stihl, Husqvarna, Makita, Echo, Poulan, etc . . .', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(36, 5, 'Model', 'Model', 'To find the chainsaw model, look for a label or sticker on the body of the chainsaw, or consult the user manual that comes with it.', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(37, 5, 'Engine Capacity', 'EngCap', 'You can typically find the chainsaw\'s capacity in terms of engine power (usually in cubic centimeters or cc) on a label or sticker located on the body of the chainsaw or in the user manual.', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(38, 5, 'Serial Number', 'Ser_Num', 'The serial number for your chainsaw is commonly located on a metal plate or sticker on the body of the chainsaw, often near the engine or handle. Refer to the user manual or manufacturer\'s instructions for specific guidance on where to locate the serial number for your particular chainsaw model', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(39, 5, 'Purpose of Use', 'Prps_of_Use', '', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(40, 5, 'Area or Location the chainsaw will be used', 'Area_used', 'Area or Location the chainsaw will be used', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-11-06 02:03:40'),
(41, 5, 'Name of Owner', 'NOO', 'Input the full name of where the owner of the chainsaw will be registered', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(42, 5, 'Date of Purchase', 'Date_of_Purchase', '', 'date', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(43, 5, 'Name of Dealer', 'Dealer', '', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(44, 5, 'Proof of ownership', 'Proof_own', 'Sales Invoice, Deed of Sale, etc.', 'file', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(45, 6, 'Brand', 'Brand', 'e.g. Stihl, Husqvarna, Makita, Echo, Poulan, etc . . .', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(46, 6, 'Model', 'Model', 'To find the chainsaw model, look for a label or sticker on the body of the chainsaw, or consult the user manual that comes with it.', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(47, 6, 'Engine Capacity', 'EngCap', 'You can typically find the chainsaw\'s capacity in terms of engine power (usually in cubic centimeters or cc) on a label or sticker located on the body of the chainsaw or in the user manual.', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(48, 6, 'Serial Number', 'Ser_Num', 'The serial number for your chainsaw is commonly located on a metal plate or sticker on the body of the chainsaw, often near the engine or handle. Refer to the user manual or manufacturer\'s instructions for specific guidance on where to locate the serial number for your particular chainsaw model', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(49, 6, 'Purpose of Use', 'Prps_of_Use', '', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(50, 6, 'Area or Location the chainsaw will be used', 'Area_used', 'Area or Location the chainsaw will be used', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-11-06 02:03:33'),
(51, 6, 'Name of Owner', 'NOO', 'Input the full name of where the owner of the chainsaw will be registered', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(52, 6, 'Date of Purchase', 'Date_of_Purchase', '', 'date', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(53, 6, 'Name of Dealer', 'Dealer', '', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(54, 6, 'Proof of ownership', 'Proof_own', 'Sales Invoice, Deed of Sale, etc.', 'file', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(55, 6, 'Certificate of Tree Plantation Ownership', 'Plant_Ownership', '', 'file', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(56, 6, 'Certification from the concerned Barangay Captain', 'Cons_Brgy_Capt', 'Certification from the concerned Barangay Captain, that the applicant is an orchard or tree farmer', 'file', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(57, 7, 'Approved Wood Processing Plan Permit', 'WPPP', '', 'file', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(58, 7, 'Brand', 'Brand', 'e.g. Stihl, Husqvarna, Makita, Echo, Poulan, etc . . .', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(59, 7, 'Model', 'Model', 'To find the chainsaw model, look for a label or sticker on the body of the chainsaw, or consult the user manual that comes with it.', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(60, 7, 'Engine Capacity', 'EngCap', 'You can typically find the chainsaw\'s capacity in terms of engine power (usually in cubic centimeters or cc) on a label or sticker located on the body of the chainsaw or in the user manual.', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(61, 7, 'Serial Number', 'Ser_Num', 'The serial number for your chainsaw is commonly located on a metal plate or sticker on the body of the chainsaw, often near the engine or handle. Refer to the user manual or manufacturer\'s instructions for specific guidance on where to locate the serial number for your particular chainsaw model', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(62, 7, 'Purpose of Use', 'Prps_of_Use', '', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(63, 7, 'Area or Location the chainsaw will be used', 'Area_used', 'Area or Location the chainsaw will be used', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-11-06 02:03:46'),
(64, 7, 'Name of Owner', 'NOO', 'Input the full name of where the owner of the chainsaw will be registered', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(65, 7, 'Date of Purchase', 'Date_of_Purchase', '', 'date', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(66, 7, 'Name of Dealer', 'Dealer', '', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(67, 7, 'Proof of ownership', 'Proof_own', 'Sales Invoice, Deed of Sale, etc.', 'file', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(68, 8, 'Certification from the Head of Office', 'CftHoO', 'Certification from the Head of Office or his/her authorized representative, that the chainsaws are owned/possessed by the office and will be used for legal purpose', 'file', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(69, 8, 'Brand', 'Brand', 'e.g. Stihl, Husqvarna, Makita, Echo, Poulan, etc . . .', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(70, 8, 'Model', 'Model', 'To find the chainsaw model, look for a label or sticker on the body of the chainsaw, or consult the user manual that comes with it.', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(71, 8, 'Engine Capacity', 'EngCap', 'You can typically find the chainsaw\'s capacity in terms of engine power (usually in cubic centimeters or cc) on a label or sticker located on the body of the chainsaw or in the user manual.', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(72, 8, 'Serial Number', 'Ser_Num', 'The serial number for your chainsaw is commonly located on a metal plate or sticker on the body of the chainsaw, often near the engine or handle. Refer to the user manual or manufacturer\'s instructions for specific guidance on where to locate the serial number for your particular chainsaw model', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(73, 8, 'Purpose of Use', 'Prps_of_Use', '', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(74, 8, 'Area or Location the chainsaw will be used', 'Area_used', 'Area or Location the chainsaw will be used', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-11-06 02:03:51'),
(75, 8, 'Name of Owner', 'NOO', 'Input the full name of where the owner of the chainsaw will be registered', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(76, 8, 'Date of Purchase', 'Date_of_Purchase', '', 'date', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(77, 8, 'Name of Dealer', 'Dealer', '', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(78, 9, 'Business Permit from the Local Government Unit', 'BPoLG', 'Clear and readable uploaded Business Permit from the Local Government Unit or Affidavit that the chainsaw is needed in the applicant’s work/profession; and will be used for legal purpose', 'file', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(79, 9, 'Brand', 'Brand', 'e.g. Stihl, Husqvarna, Makita, Echo, Poulan, etc . . .', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(80, 9, 'Model', 'Model', 'To find the chainsaw model, look for a label or sticker on the body of the chainsaw, or consult the user manual that comes with it.', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(81, 9, 'Engine Capacity', 'EngCap', 'You can typically find the chainsaw\'s capacity in terms of engine power (usually in cubic centimeters or cc) on a label or sticker located on the body of the chainsaw or in the user manual.', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(82, 9, 'Serial Number', 'Ser_Num', 'The serial number for your chainsaw is commonly located on a metal plate or sticker on the body of the chainsaw, often near the engine or handle. Refer to the user manual or manufacturer\'s instructions for specific guidance on where to locate the serial number for your particular chainsaw model', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(83, 9, 'Purpose of Use', 'Prps_of_Use', '', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(84, 9, 'Area or Location the chainsaw will be used', 'Area_used', 'Area or Location the chainsaw will be used', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-11-06 02:03:27'),
(85, 9, 'Name of Owner', 'NOO', 'Input the full name of where the owner of the chainsaw will be registered', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(86, 9, 'Date of Purchase', 'Date_of_Purchase', '', 'date', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(87, 9, 'Name of Dealer', 'Dealer', '', 'text', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(88, 10, 'Latest Certificate of Chainsaw Registration', 'CoCR', 'Clear and readable uploaded Certificate of Chainsaw Registration', 'file', 'required', NULL, '2023-10-26 21:45:48', '2023-10-26 21:45:48'),
(89, 11, 'Letter of Intent', 'LOI', 'Letter of Intent (1 original copy)', 'file', 'required', NULL, '2023-11-02 18:53:52', '2023-12-03 17:04:51'),
(90, 11, 'Research Proposal', 'RP', 'Research Proposal (1 original copy)', 'file', 'required', NULL, '2023-11-02 19:03:14', '2023-11-02 19:03:14'),
(91, 11, 'Prior Informed Clearance from concerned PAMB or LGU or NCIP', 'CL', 'CL from concerned PMB or LGU or NCIP (1 original copy)', 'file', 'required', NULL, '2023-11-02 19:16:43', '2023-11-06 02:02:51'),
(92, 11, 'Researchers Profile', 'RSP', 'Researcher\'s Profile (1 original copy)', 'file', 'required', NULL, '2023-11-02 19:19:14', '2023-11-02 19:19:14'),
(93, 11, 'Endorsement from the Head of School', 'ENDTHS', 'Endorsement from the Head of School (1 original copy)', 'file', 'required', NULL, '2023-11-02 19:20:56', '2023-11-02 19:20:56'),
(94, 5, 'Clear Photo of Applicant', 'PhotoApp', 'Upload clear half body photo of the applicant', 'file', 'required', NULL, '2023-12-05 01:40:16', '2023-12-05 01:40:16'),
(95, 6, 'Clear Photo of Applicant', 'PhotoApp', 'Upload clear half body photo of the applicant', 'file', 'required', NULL, '2023-12-05 01:48:05', '2023-12-05 01:48:05'),
(96, 7, 'Clear Photo of Applicant', 'PhotoApp', 'Upload clear half body photo of the applicant', 'file', 'required', NULL, '2023-12-05 01:49:06', '2023-12-05 01:49:06'),
(97, 9, 'Clear Photo of Applicant', 'PhotoApp', 'Upload clear half body photo of the applicant', 'file', 'required', NULL, '2023-12-05 01:49:47', '2023-12-05 01:49:47'),
(98, 8, 'Clear Photo of Applicant', 'PhotoApp', 'Upload clear half body photo of the applicant', 'file', 'required', NULL, '2023-12-05 01:51:14', '2023-12-05 01:51:14'),
(99, 10, 'Previous Document Tracking Number', 'PDTN', 'Input the previous tracking number of the chainsaw registration', 'text', 'required', NULL, '2023-12-21 05:35:55', '2023-12-27 01:44:32');

-- --------------------------------------------------------

--
-- Table structure for table `redts_za_transaction_types`
--

CREATE TABLE `redts_za_transaction_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redts_za_transaction_types`
--

INSERT INTO `redts_za_transaction_types` (`id`, `transaction`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Government to Government', 'G2G', NULL, '2023-09-07 17:00:42', '2023-09-07 17:00:42'),
(2, 'Government to Business', 'G2B', NULL, '2023-09-07 17:00:42', '2023-09-07 17:00:42'),
(3, 'Government to Citizen', 'G2C', NULL, '2023-09-07 17:00:42', '2023-09-07 17:00:42');

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

--
-- Dumping data for table `redts_zc_client_infos`
--

INSERT INTO `redts_zc_client_infos` (`id`, `fname`, `mname`, `sname`, `suffix`, `sex`, `email`, `email_verify`, `contact_no`, `access_token`, `address`, `valid_id_front`, `valid_id_back`, `data_privacy_consent`, `terms_of_reference`, `deleted_at`, `created_at`, `updated_at`) VALUES
(38, 'JOHN ISAAC', 'M', 'SALES', '', 'M', 'izy05ar@gmail.com', 1, '0905-257-5754', 'LHJXZ178', 'P2. MORGA ST., INAMAN GRANDE, GUINOBATAN, ALBAY', 'assets/img/client_files/client_3820231220131204_front.jpg', NULL, 1, 0, NULL, '2023-12-20 05:33:15', '2023-12-21 05:45:47'),
(39, 'NELSON', 'T', 'NARIT', '', 'M', 'jessadelbarriosierra2494@gmail.com', 1, '0951-871-9104', 'XOYQA428', 'TUBLI, CARAMORAN, CATANDUANES', NULL, NULL, 0, 0, NULL, '2023-12-20 08:29:21', '2023-12-20 08:30:45'),
(40, 'BBB', 'BBHH', 'GGGV', '', 'M', 'cabiles86@gmail.com', 0, '0910-480-4360', 'RPVFM269', 'AMICAN ST., DISTRICT III, SAN JACINTO, MASBATE', NULL, NULL, 0, 0, NULL, '2023-12-27 03:19:27', '2023-12-27 03:19:27'),
(41, 'EDUARDO', 'D.', 'IMPERIAL', '', 'M', 'roasuncion@denr.gov.ph', 1, '0994-226-2594', 'BTIPY859', 'PENRO SORSOGON', 'assets/img/client_files/client_4120240122110149_front.jpg', NULL, 1, 0, NULL, '2024-01-22 02:31:59', '2024-01-22 03:18:23'),
(46, 'CYRUS JOB', 'PATETICO', 'DELA CRUZ', '', 'M', 'cyrusjob.delacruz@bicol-u.edu.ph', 0, '0915-164-3771', 'ZJFRE364', 'GUINOBATAN, ALBAY', NULL, NULL, 0, 0, NULL, '2024-01-27 13:59:16', '2024-01-27 13:59:16'),
(47, 'JUAN', 'D.', 'DELA CRUZ', '', 'M', 'olivemyki49@gmail.com', 1, '0983-274-8327', 'PHVOD963', 'GUINOBATAN', 'assets/img/client_files/client_4720240129100140_front.png', NULL, 1, 0, NULL, '2024-01-29 02:15:42', '2024-02-08 06:31:46'),
(48, 'JUAN', 'D.', 'DELA CRUZ', '', 'M', 'olivemyki49+sample2@gmail.com', 1, '0932-874-8327', 'VGBAI357', 'GUINOBATAN', NULL, NULL, 0, 0, NULL, '2024-01-29 02:21:06', '2024-01-30 02:55:20'),
(49, 'MARYCIL', 'Q', 'DATING', '', 'F', 'jmad_dating2000@yahoo.com', 0, '0960-285-1505', 'CKDST784', '#308 BARANGAY 1 EM\'S BARRIO LEGAZPI CITY', NULL, NULL, 0, 0, NULL, '2024-02-08 07:15:41', '2024-02-08 07:15:41'),
(50, 'NOEL', 'M', 'LLANTOS', 'N/A', 'M', 'senseipao3@gmail.com', 1, '0956-992-1774', 'TUPBH631', 'MAOPI, DARAGA, ALBAY', 'assets/img/client_files/client_5020240228150243_front.jpg', NULL, 1, 0, NULL, '2024-02-28 07:35:48', '2024-02-28 07:52:33');

-- --------------------------------------------------------

--
-- Table structure for table `redts_zd_client_doc_infos`
--

CREATE TABLE `redts_zd_client_doc_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doc_no` varchar(255) NOT NULL DEFAULT 'unset',
  `application_type_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_type_id` bigint(20) UNSIGNED NOT NULL,
  `agency` varchar(255) DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `class_slug` varchar(255) DEFAULT NULL,
  `subclass_id` bigint(20) UNSIGNED NOT NULL,
  `subclass_slug` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `validated` tinyint(4) DEFAULT NULL,
  `compliance_deadline` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redts_zd_client_doc_infos`
--

INSERT INTO `redts_zd_client_doc_infos` (`id`, `doc_no`, `application_type_id`, `transaction_type_id`, `agency`, `client_id`, `class_id`, `class_slug`, `subclass_id`, `subclass_slug`, `remarks`, `validated`, `compliance_deadline`, `deleted_at`, `created_at`, `updated_at`) VALUES
(137, 'unset', 5, 3, NULL, 38, 2, 'TCPPbL', 3, 'TCPP', NULL, NULL, NULL, NULL, '2023-12-20 05:36:50', '2023-12-21 05:18:51'),
(138, 'P.Sor.RS-CsRrnwl-2024.0.24-138', 5, 3, NULL, 41, 3, 'ChnswReg', 10, 'CsRrnwl', NULL, 1, '2024-01-24 16:21:00', NULL, '2024-01-22 03:18:23', '2024-01-22 03:58:36'),
(143, 'C.Gbtn.RS-PLTP-2024.2.14-143', 5, 3, NULL, 47, 1, 'TCPPrL', 1, 'PLTP', NULL, 1, '2024-03-14 11:18:00', NULL, '2024-01-29 02:17:17', '2024-01-29 02:28:40'),
(144, 'C.Gbtn.RS-TCPP-2024.1.20-144', 5, 3, NULL, 47, 2, 'TCPPbL', 3, 'TCPP', NULL, 1, '2024-02-20 16:27:00', NULL, '2024-01-29 02:22:20', '2024-02-20 02:33:06'),
(145, 'C.Gbtn.RS-WGP-2024.1.2-145', 5, 3, NULL, 47, 6, 'GP', 11, 'WGP', NULL, 1, '2024-02-02 10:27:00', NULL, '2024-01-29 02:22:52', '2024-03-07 02:29:03'),
(146, 'C.Gbtn.RS-TCEBP-2024.0.31-146', 5, 3, NULL, 47, 2, 'TCPPbL', 4, 'TCEBP', NULL, 1, '2024-01-31 14:57:00', NULL, '2024-01-29 02:23:38', '2024-01-29 02:28:53'),
(147, 'C.Gbtn.RS-CsRegITF-2024.0.31-147', 5, 3, NULL, 47, 3, 'ChnswReg', 6, 'CsRegITF', NULL, 1, '2024-01-31 14:57:00', NULL, '2024-01-29 02:24:38', '2024-01-29 02:28:58'),
(148, 'C.Gbtn.RS-WGP-2024.1.2-148', 5, 3, NULL, 47, 6, 'GP', 11, 'WGP', NULL, 1, '2024-02-02 10:26:00', NULL, '2024-01-29 02:25:18', '2024-01-29 02:26:49'),
(149, 'C.Gbtn.RS-CsRrnwl-2024.2.4-149', 5, 3, NULL, 47, 3, 'ChnswReg', 10, 'CsRrnwl', NULL, 1, '2024-03-04 18:07:00', NULL, '2024-01-30 02:56:15', '2024-02-29 05:38:06'),
(150, 'unset', 5, 3, NULL, 47, 6, 'GP', 11, 'WGP', NULL, NULL, NULL, NULL, '2024-02-08 06:24:09', '2024-02-08 06:24:09'),
(151, 'unset', 5, 3, NULL, 47, 6, 'GP', 11, 'WGP', NULL, NULL, NULL, NULL, '2024-02-08 06:24:35', '2024-02-08 06:24:35'),
(152, 'unset', 5, 3, NULL, 47, 6, 'GP', 11, 'WGP', NULL, NULL, NULL, NULL, '2024-02-08 06:30:01', '2024-02-23 06:19:01'),
(153, 'LPDD-WGP-2024.1.19-153', 5, 3, NULL, 47, 6, 'GP', 11, 'WGP', NULL, 1, '2024-02-19 14:57:00', NULL, '2024-02-08 06:31:20', '2024-02-13 06:58:08'),
(154, 'LPDD-WGP-2024.1.14-154', 5, 3, NULL, 47, 6, 'GP', 11, 'WGP', NULL, 1, '2024-02-14 15:22:00', NULL, '2024-02-08 06:31:46', '2024-02-08 07:51:55'),
(155, 'unset', 5, 3, NULL, 50, 3, 'ChnswReg', 10, 'CsRrnwl', NULL, NULL, NULL, NULL, '2024-02-28 07:52:33', '2024-02-28 07:52:33');

-- --------------------------------------------------------

--
-- Table structure for table `redts_ze_client_doc_attachments`
--

CREATE TABLE `redts_ze_client_doc_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doc_info_id` bigint(20) UNSIGNED NOT NULL,
  `req_id` bigint(20) UNSIGNED NOT NULL,
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

INSERT INTO `redts_ze_client_doc_attachments` (`id`, `doc_info_id`, `req_id`, `app_form_no`, `req_slug`, `file_path`, `file_name`, `file_link`, `text_input`, `attachment_type`, `deleted_at`, `created_at`, `updated_at`) VALUES
(711, 137, 18, 1, 'AL', 'doc_req_files', 'cli137-Application Letter-18-1-0-202312201336.pdf', 'n/a', 'n/a', 'file', NULL, '2023-12-20 05:36:51', '2023-12-20 05:36:51'),
(712, 137, 19, 1, 'LGUECNO', 'doc_req_files', 'cli137-LGU Endorsement or Certification of No Objection-19-1-1-202312201336.pdf', 'n/a', 'n/a', 'file', NULL, '2023-12-20 05:36:51', '2023-12-20 05:36:51'),
(713, 137, 20, 1, 'TIOTTBC', 'doc_req_files', 'cli137-Timber Inventory of Trees to be Cut-20-1-2-202312201336.pdf', 'n/a', 'n/a', 'file', NULL, '2023-12-20 05:36:51', '2023-12-20 05:36:51'),
(714, 137, 21, 1, 'HOR', 'doc_req_files', 'cli137-Homeowners Resolution-21-1-3-202312201336.pdf', 'n/a', 'n/a', 'file', NULL, '2023-12-20 05:36:52', '2023-12-20 05:36:52'),
(715, 137, 22, 1, 'PTAR', 'doc_req_files', 'cli137-PTA Resolution-22-1-4-202312201336.pdf', 'n/a', 'n/a', 'file', NULL, '2023-12-20 05:36:52', '2023-12-20 05:36:52'),
(716, 138, 88, 1, 'CoCR', 'doc_req_files', 'cli138-Latest Certificate of Chainsaw Registration-88-1-0-202401221118.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-22 03:18:24', '2024-01-22 03:18:24'),
(717, 138, 99, 1, 'PDTN', 'n/a', 'n/a', 'n/a', 'P.SOR.RECORDS-CHAIN-2024.01.16-123', 'text', NULL, '2024-01-22 03:18:24', '2024-01-22 03:18:24'),
(750, 143, 1, 1, 'AL', 'doc_req_files', 'cli143-Application Letter-1-1-0-202401291017.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-29 02:17:17', '2024-01-29 02:17:17'),
(751, 143, 2, 1, 'LGUECNO', 'doc_req_files', 'cli143-LGU Endorsement or Certification of No Objection-2-1-1-202401291017.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-29 02:17:17', '2024-01-29 02:17:17'),
(752, 143, 3, 1, 'EFCLGU', 'doc_req_files', 'cli143-Endorsement from concerned LGU-3-1-2-202401291017.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-29 02:17:17', '2024-01-29 02:17:17'),
(753, 143, 4, 1, 'ECC', 'doc_req_files', 'cli143-Environmental Compliance Certificate-4-1-3-202401291017.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-29 02:17:17', '2024-01-29 02:17:17'),
(754, 143, 5, 1, 'UP', 'doc_req_files', 'cli143-Utilization Plan-5-1-4-202401291017.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-29 02:17:17', '2024-01-29 02:17:17'),
(755, 143, 6, 1, 'EBLARO', 'doc_req_files', 'cli143-Endorsement by local Agrarian Reform Officer-6-1-5-202401291017.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-29 02:17:17', '2024-01-29 02:17:17'),
(756, 143, 7, 1, 'PTAR', 'doc_req_files', 'cli143-PTA Resolution-7-1-6-202401291017.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-29 02:17:17', '2024-01-29 02:17:17'),
(757, 143, 8, 1, 'CLOA', 'doc_req_files', 'cli143-CLOA issued the Land Registration Authority-8-1-7-202401291017.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-29 02:17:17', '2024-01-29 02:17:17'),
(758, 144, 18, 1, 'AL', 'doc_req_files', 'cli144-Application Letter-18-1-0-202401291022.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-29 02:22:20', '2024-01-29 02:22:20'),
(759, 144, 19, 1, 'LGUECNO', 'doc_req_files', 'cli144-LGU Endorsement or Certification of No Objection-19-1-1-202401291022.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-29 02:22:20', '2024-01-29 02:22:20'),
(760, 144, 20, 1, 'TIOTTBC', 'doc_req_files', 'cli144-Timber Inventory of Trees to be Cut-20-1-2-202401291022.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-29 02:22:20', '2024-01-29 02:22:20'),
(761, 144, 21, 1, 'HOR', 'doc_req_files', 'cli144-Homeowners Resolution-21-1-3-202401291022.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-29 02:22:20', '2024-01-29 02:22:20'),
(762, 144, 22, 1, 'PTAR', 'doc_req_files', 'cli144-PTA Resolution-22-1-4-202401291022.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-29 02:22:20', '2024-01-29 02:22:20'),
(763, 145, 89, 1, 'LOI', 'doc_req_files', 'cli145-Letter of Intent-89-1-0-202401291022.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-29 02:22:52', '2024-01-29 02:22:52'),
(764, 145, 90, 1, 'RP', 'doc_req_files', 'cli145-Research Proposal-90-1-1-202401291022.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-29 02:22:52', '2024-01-29 02:22:52'),
(765, 145, 91, 1, 'CL', 'doc_req_files', 'cli145-Prior Informed Clearance from concerned PAMB or LGU or NCIP-91-1-2-202401291022.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-29 02:22:52', '2024-01-29 02:22:52'),
(766, 145, 92, 1, 'RSP', 'doc_req_files', 'cli145-Researchers Profile-92-1-3-202401291022.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-29 02:22:52', '2024-01-29 02:22:52'),
(767, 145, 93, 1, 'ENDTHS', 'doc_req_files', 'cli145-Endorsement from the Head of School-93-1-4-202401291022.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-29 02:22:52', '2024-01-29 02:22:52'),
(768, 146, 23, 1, 'AL', 'doc_req_files', 'cli146-Application Letter-23-1-0-202401291023.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-29 02:23:39', '2024-01-29 02:23:39'),
(769, 146, 24, 1, 'LGUECNO', 'doc_req_files', 'cli146-LGU Endorsement or Certification of No Objection-24-1-1-202401291023.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-29 02:23:39', '2024-01-29 02:23:39'),
(770, 146, 25, 1, 'ASDP', 'doc_req_files', 'cli146-Approved Site Development Plan-25-1-2-202401291023.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-29 02:23:39', '2024-01-29 02:23:39'),
(771, 146, 26, 1, 'ECC', 'doc_req_files', 'cli146-Environmental Compliance Certificate-26-1-3-202401291023.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-29 02:23:39', '2024-01-29 02:23:39'),
(772, 146, 27, 1, 'FPIC', 'doc_req_files', 'cli146-Free Prior and Informed Consent-27-1-4-202401291023.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-29 02:23:39', '2024-01-29 02:23:39'),
(773, 146, 28, 1, 'WOOE', 'doc_req_files', 'cli146-Waiver or Consent of own errs-28-1-5-202401291023.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-29 02:23:39', '2024-01-29 02:23:39'),
(774, 146, 29, 1, 'PAMBC', 'doc_req_files', 'cli146-PAMB Clearance or Resolution-29-1-6-202401291023.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-29 02:23:39', '2024-01-29 02:23:39'),
(775, 146, 30, 1, 'IOTTBC', 'doc_req_files', 'cli146-Inventory of trees to be Cut-30-1-7-202401291023.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-29 02:23:39', '2024-01-29 02:23:39'),
(776, 146, 31, 1, 'PDPOTP', 'doc_req_files', 'cli146-Proposed Development Plan of the Project-31-1-8-202401291023.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-29 02:23:39', '2024-01-29 02:23:39'),
(777, 146, 32, 1, 'IDROTPP', 'doc_req_files', 'cli146-In-Depth Review of the Proposed Project-32-1-9-202401291023.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-29 02:23:39', '2024-01-29 02:23:39'),
(778, 146, 33, 1, 'JMCA', 'doc_req_files', 'cli146-Justification that the Mangroves can no longer be avoided-33-1-10-202401291023.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-29 02:23:39', '2024-01-29 02:23:39'),
(779, 147, 54, 1, 'Proof_own', 'doc_req_files', 'cli147-Proof of ownership-54-1-0-202401291024.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-29 02:24:38', '2024-01-29 02:24:38'),
(780, 147, 55, 1, 'Plant_Ownership', 'doc_req_files', 'cli147-Certificate of Tree Plantation Ownership-55-1-1-202401291024.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-29 02:24:39', '2024-01-29 02:24:39'),
(781, 147, 56, 1, 'Cons_Brgy_Capt', 'doc_req_files', 'cli147-Certification from the concerned Barangay Captain-56-1-2-202401291024.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-29 02:24:39', '2024-01-29 02:24:39'),
(782, 147, 95, 1, 'PhotoApp', 'doc_req_files', 'cli147-Clear Photo of Applicant-95-1-3-202401291024.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-29 02:24:39', '2024-01-29 02:24:39'),
(783, 147, 45, 1, 'Brand', 'n/a', 'n/a', 'n/a', 'Sample', 'text', NULL, '2024-01-29 02:24:39', '2024-01-29 02:24:39'),
(784, 147, 46, 1, 'Model', 'n/a', 'n/a', 'n/a', 'Sample', 'text', NULL, '2024-01-29 02:24:39', '2024-01-29 02:24:39'),
(785, 147, 47, 1, 'EngCap', 'n/a', 'n/a', 'n/a', 'Sample', 'text', NULL, '2024-01-29 02:24:39', '2024-01-29 02:24:39'),
(786, 147, 48, 1, 'Ser_Num', 'n/a', 'n/a', 'n/a', 'Sample', 'text', NULL, '2024-01-29 02:24:39', '2024-01-29 02:24:39'),
(787, 147, 49, 1, 'Prps_of_Use', 'n/a', 'n/a', 'n/a', 'Sample', 'text', NULL, '2024-01-29 02:24:39', '2024-01-29 02:24:39'),
(788, 147, 50, 1, 'Area_used', 'n/a', 'n/a', 'n/a', 'Sample', 'text', NULL, '2024-01-29 02:24:39', '2024-01-29 02:24:39'),
(789, 147, 51, 1, 'NOO', 'n/a', 'n/a', 'n/a', 'Sample', 'text', NULL, '2024-01-29 02:24:39', '2024-01-29 02:24:39'),
(790, 147, 52, 1, 'Date_of_Purchase', 'n/a', 'n/a', 'n/a', '2023-11-02', 'text', NULL, '2024-01-29 02:24:39', '2024-01-29 02:24:39'),
(791, 147, 53, 1, 'Dealer', 'n/a', 'n/a', 'n/a', 'Sample', 'text', NULL, '2024-01-29 02:24:39', '2024-01-29 02:24:39'),
(792, 148, 89, 1, 'LOI', 'doc_req_files', 'cli148-Letter of Intent-89-1-0-202401291025.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-29 02:25:18', '2024-01-29 02:25:18'),
(793, 148, 90, 1, 'RP', 'doc_req_files', 'cli148-Research Proposal-90-1-1-202401291025.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-29 02:25:18', '2024-01-29 02:25:18'),
(794, 148, 91, 1, 'CL', 'doc_req_files', 'cli148-Prior Informed Clearance from concerned PAMB or LGU or NCIP-91-1-2-202401291025.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-29 02:25:18', '2024-01-29 02:25:18'),
(795, 148, 92, 1, 'RSP', 'doc_req_files', 'cli148-Researchers Profile-92-1-3-202401291025.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-29 02:25:18', '2024-01-29 02:25:18'),
(796, 148, 93, 1, 'ENDTHS', 'doc_req_files', 'cli148-Endorsement from the Head of School-93-1-4-202401291025.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-29 02:25:18', '2024-01-29 02:25:18'),
(797, 149, 88, 1, 'CoCR', 'doc_req_files', 'cli149-Latest Certificate of Chainsaw Registration-88-1-0-202401301056.pdf', 'n/a', 'n/a', 'file', NULL, '2024-01-30 02:56:15', '2024-01-30 02:56:15'),
(798, 149, 99, 1, 'PDTN', 'n/a', 'n/a', 'n/a', 'sdfvsdfsdf9sdf80ds9', 'text', NULL, '2024-01-30 02:56:15', '2024-01-30 02:56:15'),
(799, 150, 89, 1, 'LOI', 'doc_req_files', 'cli150-Letter of Intent-89-1-0-202402081424.pdf', 'n/a', 'n/a', 'file', NULL, '2024-02-08 06:24:10', '2024-02-08 06:24:10'),
(800, 150, 90, 1, 'RP', 'doc_req_files', 'cli150-Research Proposal-90-1-1-202402081424.pdf', 'n/a', 'n/a', 'file', NULL, '2024-02-08 06:24:10', '2024-02-08 06:24:10'),
(801, 150, 91, 1, 'CL', 'doc_req_files', 'cli150-Prior Informed Clearance from concerned PAMB or LGU or NCIP-91-1-2-202402081424.pdf', 'n/a', 'n/a', 'file', NULL, '2024-02-08 06:24:10', '2024-02-08 06:24:10'),
(802, 150, 92, 1, 'RSP', 'doc_req_files', 'cli150-Researchers Profile-92-1-3-202402081424.pdf', 'n/a', 'n/a', 'file', NULL, '2024-02-08 06:24:10', '2024-02-08 06:24:10'),
(803, 150, 93, 1, 'ENDTHS', 'doc_req_files', 'cli150-Endorsement from the Head of School-93-1-4-202402081424.pdf', 'n/a', 'n/a', 'file', NULL, '2024-02-08 06:24:10', '2024-02-08 06:24:10'),
(804, 151, 89, 1, 'LOI', 'doc_req_files', 'cli151-Letter of Intent-89-1-0-202402081424.pdf', 'n/a', 'n/a', 'file', NULL, '2024-02-08 06:24:37', '2024-02-08 06:24:37'),
(805, 151, 90, 1, 'RP', 'doc_req_files', 'cli151-Research Proposal-90-1-1-202402081424.pdf', 'n/a', 'n/a', 'file', NULL, '2024-02-08 06:24:37', '2024-02-08 06:24:37'),
(806, 151, 91, 1, 'CL', 'doc_req_files', 'cli151-Prior Informed Clearance from concerned PAMB or LGU or NCIP-91-1-2-202402081424.pdf', 'n/a', 'n/a', 'file', NULL, '2024-02-08 06:24:37', '2024-02-08 06:24:37'),
(807, 151, 92, 1, 'RSP', 'doc_req_files', 'cli151-Researchers Profile-92-1-3-202402081424.pdf', 'n/a', 'n/a', 'file', NULL, '2024-02-08 06:24:37', '2024-02-08 06:24:37'),
(808, 151, 93, 1, 'ENDTHS', 'doc_req_files', 'cli151-Endorsement from the Head of School-93-1-4-202402081424.pdf', 'n/a', 'n/a', 'file', NULL, '2024-02-08 06:24:37', '2024-02-08 06:24:37'),
(809, 152, 89, 1, 'LOI', 'doc_req_files', 'cli152-Letter of Intent-89-1-0-202402081430.pdf', 'n/a', 'n/a', 'file', NULL, '2024-02-08 06:30:02', '2024-02-08 06:30:02'),
(810, 152, 90, 1, 'RP', 'doc_req_files', 'cli152-Research Proposal-90-1-1-202402081430.pdf', 'n/a', 'n/a', 'file', NULL, '2024-02-08 06:30:02', '2024-02-08 06:30:02'),
(811, 152, 91, 1, 'CL', 'doc_req_files', 'cli152-Prior Informed Clearance from concerned PAMB or LGU or NCIP-91-1-2-202402081430.pdf', 'n/a', 'n/a', 'file', NULL, '2024-02-08 06:30:02', '2024-02-08 06:30:02'),
(812, 152, 92, 1, 'RSP', 'doc_req_files', 'cli152-Researchers Profile-92-1-3-202402081430.pdf', 'n/a', 'n/a', 'file', NULL, '2024-02-08 06:30:02', '2024-02-08 06:30:02'),
(813, 152, 93, 1, 'ENDTHS', 'doc_req_files', 'cli152-Endorsement from the Head of School-93-1-4-202402081430.pdf', 'n/a', 'n/a', 'file', NULL, '2024-02-08 06:30:02', '2024-02-08 06:30:02'),
(814, 153, 89, 1, 'LOI', 'doc_req_files', 'cli153-Letter of Intent-89-1-0-202402081431.pdf', 'n/a', 'n/a', 'file', NULL, '2024-02-08 06:31:21', '2024-02-08 06:31:21'),
(815, 153, 90, 1, 'RP', 'doc_req_files', 'cli153-Research Proposal-90-1-1-202402081431.pdf', 'n/a', 'n/a', 'file', NULL, '2024-02-08 06:31:21', '2024-02-08 06:31:21'),
(816, 153, 91, 1, 'CL', 'doc_req_files', 'cli153-Prior Informed Clearance from concerned PAMB or LGU or NCIP-91-1-2-202402081431.pdf', 'n/a', 'n/a', 'file', NULL, '2024-02-08 06:31:21', '2024-02-08 06:31:21'),
(817, 153, 92, 1, 'RSP', 'doc_req_files', 'cli153-Researchers Profile-92-1-3-202402081431.pdf', 'n/a', 'n/a', 'file', NULL, '2024-02-08 06:31:21', '2024-02-08 06:31:21'),
(818, 153, 93, 1, 'ENDTHS', 'doc_req_files', 'cli153-Endorsement from the Head of School-93-1-4-202402081431.pdf', 'n/a', 'n/a', 'file', NULL, '2024-02-08 06:31:21', '2024-02-08 06:31:21'),
(819, 154, 89, 1, 'LOI', 'doc_req_files', 'cli154-Letter of Intent-89-1-0-202402081431.pdf', 'n/a', 'n/a', 'file', NULL, '2024-02-08 06:31:47', '2024-02-08 06:31:47'),
(820, 154, 90, 1, 'RP', 'doc_req_files', 'cli154-Research Proposal-90-1-1-202402081431.pdf', 'n/a', 'n/a', 'file', NULL, '2024-02-08 06:31:47', '2024-02-08 06:31:47'),
(821, 154, 91, 1, 'CL', 'doc_req_files', 'cli154-Prior Informed Clearance from concerned PAMB or LGU or NCIP-91-1-2-202402081431.pdf', 'n/a', 'n/a', 'file', NULL, '2024-02-08 06:31:47', '2024-02-08 06:31:47'),
(822, 154, 92, 1, 'RSP', 'doc_req_files', 'cli154-Researchers Profile-92-1-3-202402081431.pdf', 'n/a', 'n/a', 'file', NULL, '2024-02-08 06:31:47', '2024-02-08 06:31:47'),
(823, 154, 93, 1, 'ENDTHS', 'doc_req_files', 'cli154-Endorsement from the Head of School-93-1-4-202402081431.pdf', 'n/a', 'n/a', 'file', NULL, '2024-02-08 06:31:47', '2024-02-08 06:31:47'),
(824, 155, 88, 1, 'CoCR', 'doc_req_files', 'cli155-Latest Certificate of Chainsaw Registration-88-1-0-202402281552.pdf', 'n/a', 'n/a', 'file', NULL, '2024-02-28 07:52:33', '2024-02-28 07:52:33'),
(825, 155, 99, 1, 'PDTN', 'n/a', 'n/a', 'n/a', 'n/a', 'text', NULL, '2024-02-28 07:52:34', '2024-02-28 07:52:34');

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
  `verified` tinyint(4) NOT NULL DEFAULT 0,
  `time_verified` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `purpose` varchar(255) DEFAULT NULL COMMENT 'the reason for the request of payment'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redts_zf_order_of_payments`
--

INSERT INTO `redts_zf_order_of_payments` (`id`, `doc_id`, `creator_id`, `order_of_payment`, `payment_receipt`, `payment_receipt_date`, `header_title`, `header_address`, `or_no`, `or_no_dated`, `pay_amount`, `clerk_fullname`, `prepared_by_position`, `approving_remarks`, `approving_fullname`, `approving_position`, `per_bill_no`, `per_bill_no_dated`, `verified`, `time_verified`, `deleted_at`, `created_at`, `updated_at`, `purpose`) VALUES
(1, 145, 322, 'payment_receipt_files/doc145_signed_order_of_payment_202401291350.pdf', 'payment_receipt_files/doc145_payment_receipt_202401291350.pdf', '2024-01-29 05:50:24', 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'Morera, Guinobatan, Albay', '1452457', '2024-01-29', 400.00, 'Ferdinand L Baltazar', 'unset', 'Approved', 'JUAN Dela Cruz', 'unset', '213343335', '2024-01-29', 1, NULL, NULL, '2024-01-29 05:34:17', '2024-01-29 05:52:22', NULL),
(2, 147, 322, 'payment_receipt_files/doc147_signed_order_of_payment_202402081054.pdf', 'payment_receipt_files/doc147_payment_receipt_202402081058.pdf', '2024-02-08 02:58:44', 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'Morera, Guinobatan, Albay', '1472438', '2024-02-08', 100.00, 'Ferdinand L Baltazar', 'unset', 'Approved', 'sample', 'sample', NULL, NULL, 1, NULL, NULL, '2024-02-08 02:53:12', '2024-02-08 02:59:25', NULL),
(3, 154, 371, 'payment_receipt_files/doc154_signed_order_of_payment_202402081539.pdf', 'payment_receipt_files/doc154_payment_receipt_202402081542.pdf', '2024-02-08 07:42:37', NULL, 'Rawis, Legazpi City', '1542424', '2024-02-08', 700.00, 'WRPS User 1', 'unset', 'Approved', 'sample', 'sample', NULL, NULL, 1, NULL, NULL, '2024-02-08 07:34:37', '2024-02-08 07:49:27', NULL),
(4, 153, 371, NULL, NULL, NULL, NULL, 'Rawis, Legazpi City', '1532420', '2024-02-13', 500.00, 'Lorenz Kurt C. Abrasaldo', 'EMS II', 'Approved', 'Denver Erl Nastro Ruko', 'sample', NULL, NULL, 0, NULL, NULL, '2024-02-13 06:59:18', '2024-02-13 06:59:18', NULL),
(5, 144, 317, NULL, NULL, NULL, 'COMMUNITY ENVIRONMENT AND NATURAL RESOUCES', 'Morera, Guinobatan, Albay', '1442421', '2024-02-29', 1286.00, 'Carles Sandro Curpos', 'Data Encoder', 'Approved', 'Sample', 'Sample', NULL, NULL, 0, NULL, NULL, '2024-02-29 03:44:56', '2024-02-29 03:45:17', NULL);

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

--
-- Dumping data for table `redts_zg_payment_cost_breakdowns`
--

INSERT INTO `redts_zg_payment_cost_breakdowns` (`id`, `doc_id`, `ofp_id`, `cost_breakdown_amount`, `cost_breakdown`, `deleted_at`, `created_at`, `updated_at`) VALUES
(13, 145, 1, 50.00, 'TEST', NULL, '2024-01-29 05:49:45', '2024-01-29 05:49:45'),
(14, 145, 1, 100.00, 'TEST', NULL, '2024-01-29 05:49:45', '2024-01-29 05:49:45'),
(15, 145, 1, 250.00, 'TEST', NULL, '2024-01-29 05:49:45', '2024-01-29 05:49:45'),
(20, 154, 3, 300.00, 'Inspection fee', NULL, '2024-02-08 07:39:09', '2024-02-08 07:39:09'),
(21, 154, 3, 400.00, 'other', NULL, '2024-02-08 07:39:09', '2024-02-08 07:39:09');

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

--
-- Dumping data for table `redts_zh_cert_perm_routes`
--

INSERT INTO `redts_zh_cert_perm_routes` (`id`, `sub_class_id`, `route`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 5, 'gen-dash-cert-chainsaw-reg', NULL, '2023-12-20 02:38:07', '2023-12-20 02:38:07'),
(2, 6, 'gen-dash-cert-chainsaw-reg', NULL, '2023-12-20 02:38:07', '2023-12-20 02:38:07'),
(3, 7, 'gen-dash-cert-chainsaw-reg', NULL, '2023-12-20 02:38:07', '2023-12-20 02:38:07'),
(4, 8, 'gen-dash-cert-chainsaw-reg', NULL, '2023-12-20 02:38:07', '2023-12-20 02:38:07'),
(5, 9, 'gen-dash-cert-chainsaw-reg', NULL, '2023-12-20 02:38:07', '2023-12-20 02:38:07'),
(6, 10, 'gen-dash-cert-chainsaw-reg', NULL, '2023-12-20 02:38:07', '2023-12-20 02:38:07');

-- --------------------------------------------------------

--
-- Table structure for table `redts_zi_origin_offices`
--

CREATE TABLE `redts_zi_origin_offices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doc_id` bigint(20) UNSIGNED NOT NULL,
  `origin_office_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redts_zi_origin_offices`
--

INSERT INTO `redts_zi_origin_offices` (`id`, `doc_id`, `origin_office_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 138, 167, NULL, '2024-01-22 03:18:23', '2024-01-22 03:18:23'),
(6, 143, 168, NULL, '2024-01-29 02:17:17', '2024-01-29 02:17:17'),
(7, 144, 168, NULL, '2024-01-29 02:22:20', '2024-01-29 02:22:20'),
(8, 145, 168, NULL, '2024-01-29 02:22:52', '2024-01-29 02:22:52'),
(9, 146, 168, NULL, '2024-01-29 02:23:38', '2024-01-29 02:23:38'),
(10, 147, 168, NULL, '2024-01-29 02:24:38', '2024-01-29 02:24:38'),
(11, 148, 168, NULL, '2024-01-29 02:25:18', '2024-01-29 02:25:18'),
(12, 149, 168, NULL, '2024-01-30 02:56:15', '2024-01-30 02:56:15'),
(13, 150, 23, NULL, '2024-02-08 06:24:09', '2024-02-08 06:24:09'),
(14, 151, 23, NULL, '2024-02-08 06:24:35', '2024-02-08 06:24:35'),
(15, 152, 23, NULL, '2024-02-08 06:30:01', '2024-02-08 06:30:01'),
(16, 153, 23, NULL, '2024-02-08 06:31:20', '2024-02-08 06:31:20'),
(17, 154, 23, NULL, '2024-02-08 06:31:46', '2024-02-08 06:31:46'),
(18, 155, 162, NULL, '2024-02-28 07:52:33', '2024-02-28 07:52:33');

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
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `applicant` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redts_z_applicant_types`
--

INSERT INTO `redts_z_applicant_types` (`id`, `transaction_id`, `applicant`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Government Agencies', NULL, '2023-09-07 17:14:36', '2023-09-07 17:14:36'),
(2, 1, 'Local Government Units', '2023-10-25 06:16:14', '2023-09-07 17:14:36', '2023-09-07 17:14:36'),
(3, 2, 'Business', NULL, '2023-09-07 17:14:36', '2023-09-07 17:14:36'),
(4, 3, 'School', '2023-10-25 06:16:21', '2023-09-07 17:14:36', '2023-09-07 17:14:36'),
(5, 3, 'Citizen', NULL, '2023-09-07 17:14:36', '2023-09-07 17:14:36');

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redts_b_user`
--
ALTER TABLE `redts_b_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `redts_b_user_username_unique` (`username`),
  ADD UNIQUE KEY `redts_b_user_email_unique` (`email`),
  ADD KEY `redts_b_user_access_id_foreign` (`access_id`);

--
-- Indexes for table `redts_d_profile`
--
ALTER TABLE `redts_d_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `redts_d_profile_user_id_foreign` (`user_id`);

--
-- Indexes for table `redts_ee_classification`
--
ALTER TABLE `redts_ee_classification`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `redts_f_offices_region_id_foreign` (`region_id`);

--
-- Indexes for table `redts_g_carousel_imgs`
--
ALTER TABLE `redts_g_carousel_imgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redts_j_user_offices`
--
ALTER TABLE `redts_j_user_offices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `redts_j_user_offices_user_id_unique` (`user_id`),
  ADD KEY `redts_j_user_offices_offices_id_foreign` (`offices_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `redts_na_action_attachments_action_id_foreign` (`action_id`);

--
-- Indexes for table `redts_nb_releasing_routes`
--
ALTER TABLE `redts_nb_releasing_routes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `redts_nb_releasing_routes_origin_act_foreign` (`origin_act`),
  ADD KEY `redts_nb_releasing_routes_released_act_foreign` (`released_act`);

--
-- Indexes for table `redts_nc_act_seens`
--
ALTER TABLE `redts_nc_act_seens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `redts_nc_act_seens_action_id_foreign` (`action_id`);

--
-- Indexes for table `redts_n_actions`
--
ALTER TABLE `redts_n_actions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `redts_n_actions_doc_id_foreign` (`doc_id`),
  ADD KEY `redts_n_actions_sender_client_id_foreign` (`sender_client_id`),
  ADD KEY `redts_n_actions_sender_user_id_foreign` (`sender_user_id`),
  ADD KEY `redts_n_actions_referred_by_office_foreign` (`referred_by_office`),
  ADD KEY `redts_n_actions_send_to_office_foreign` (`send_to_office`),
  ADD KEY `redts_n_actions_received_id_foreign` (`received_id`);

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
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `redts_zd_client_doc_infos_application_type_id_foreign` (`application_type_id`),
  ADD KEY `redts_zd_client_doc_infos_transaction_type_id_foreign` (`transaction_type_id`),
  ADD KEY `redts_zd_client_doc_infos_client_id_foreign` (`client_id`),
  ADD KEY `redts_zd_client_doc_infos_class_id_foreign` (`class_id`),
  ADD KEY `redts_zd_client_doc_infos_subclass_id_foreign` (`subclass_id`);

--
-- Indexes for table `redts_ze_client_doc_attachments`
--
ALTER TABLE `redts_ze_client_doc_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `redts_ze_client_doc_attachments_doc_info_id_foreign` (`doc_info_id`),
  ADD KEY `redts_ze_client_doc_attachments_req_id_foreign` (`req_id`);

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
  ADD UNIQUE KEY `redts_zi_origin_offices_doc_id_unique` (`doc_id`),
  ADD KEY `redts_zi_origin_offices_origin_office_id_foreign` (`origin_office_id`);

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
  ADD KEY `redts_z_applicant_types_transaction_id_foreign` (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `redts_a_accesss`
--
ALTER TABLE `redts_a_accesss`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `redts_b_user`
--
ALTER TABLE `redts_b_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=373;

--
-- AUTO_INCREMENT for table `redts_d_profile`
--
ALTER TABLE `redts_d_profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=366;

--
-- AUTO_INCREMENT for table `redts_ee_classification`
--
ALTER TABLE `redts_ee_classification`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `redts_e_region`
--
ALTER TABLE `redts_e_region`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `redts_f_offices`
--
ALTER TABLE `redts_f_offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `redts_g_carousel_imgs`
--
ALTER TABLE `redts_g_carousel_imgs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `redts_j_user_offices`
--
ALTER TABLE `redts_j_user_offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=370;

--
-- AUTO_INCREMENT for table `redts_la_process_lengths`
--
ALTER TABLE `redts_la_process_lengths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `redts_lc_rstct_sbmsn_of_reqs`
--
ALTER TABLE `redts_lc_rstct_sbmsn_of_reqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `redts_le_subclass_fees`
--
ALTER TABLE `redts_le_subclass_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `redts_l_sub_class`
--
ALTER TABLE `redts_l_sub_class`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `redts_na_action_attachments`
--
ALTER TABLE `redts_na_action_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `redts_nb_releasing_routes`
--
ALTER TABLE `redts_nb_releasing_routes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `redts_nc_act_seens`
--
ALTER TABLE `redts_nc_act_seens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `redts_n_actions`
--
ALTER TABLE `redts_n_actions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;

--
-- AUTO_INCREMENT for table `redts_w_upload_size_limit`
--
ALTER TABLE `redts_w_upload_size_limit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `redts_y_requirements`
--
ALTER TABLE `redts_y_requirements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `redts_za_transaction_types`
--
ALTER TABLE `redts_za_transaction_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `redts_zb_agencies`
--
ALTER TABLE `redts_zb_agencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `redts_zc_client_infos`
--
ALTER TABLE `redts_zc_client_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `redts_zd_client_doc_infos`
--
ALTER TABLE `redts_zd_client_doc_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `redts_ze_client_doc_attachments`
--
ALTER TABLE `redts_ze_client_doc_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=826;

--
-- AUTO_INCREMENT for table `redts_zfa_additional_oops`
--
ALTER TABLE `redts_zfa_additional_oops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_zf_order_of_payments`
--
ALTER TABLE `redts_zf_order_of_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `redts_zga_other_pymnt_cost_brkdwns`
--
ALTER TABLE `redts_zga_other_pymnt_cost_brkdwns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_zg_payment_cost_breakdowns`
--
ALTER TABLE `redts_zg_payment_cost_breakdowns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `redts_zh_cert_perm_routes`
--
ALTER TABLE `redts_zh_cert_perm_routes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `redts_zi_origin_offices`
--
ALTER TABLE `redts_zi_origin_offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `redts_zj_user_oop_approvees`
--
ALTER TABLE `redts_zj_user_oop_approvees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_z_applicant_types`
--
ALTER TABLE `redts_z_applicant_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `redts_b_user`
--
ALTER TABLE `redts_b_user`
  ADD CONSTRAINT `redts_b_user_access_id_foreign` FOREIGN KEY (`access_id`) REFERENCES `redts_a_accesss` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `redts_d_profile`
--
ALTER TABLE `redts_d_profile`
  ADD CONSTRAINT `redts_d_profile_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `redts_b_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `redts_f_offices`
--
ALTER TABLE `redts_f_offices`
  ADD CONSTRAINT `redts_f_offices_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `redts_e_region` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `redts_j_user_offices`
--
ALTER TABLE `redts_j_user_offices`
  ADD CONSTRAINT `redts_j_user_offices_offices_id_foreign` FOREIGN KEY (`offices_id`) REFERENCES `redts_f_offices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `redts_j_user_offices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `redts_b_user` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `redts_na_action_attachments`
--
ALTER TABLE `redts_na_action_attachments`
  ADD CONSTRAINT `redts_na_action_attachments_action_id_foreign` FOREIGN KEY (`action_id`) REFERENCES `redts_n_actions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `redts_nb_releasing_routes`
--
ALTER TABLE `redts_nb_releasing_routes`
  ADD CONSTRAINT `redts_nb_releasing_routes_origin_act_foreign` FOREIGN KEY (`origin_act`) REFERENCES `redts_n_actions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `redts_nb_releasing_routes_released_act_foreign` FOREIGN KEY (`released_act`) REFERENCES `redts_n_actions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `redts_nc_act_seens`
--
ALTER TABLE `redts_nc_act_seens`
  ADD CONSTRAINT `redts_nc_act_seens_action_id_foreign` FOREIGN KEY (`action_id`) REFERENCES `redts_n_actions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `redts_n_actions`
--
ALTER TABLE `redts_n_actions`
  ADD CONSTRAINT `redts_n_actions_doc_id_foreign` FOREIGN KEY (`doc_id`) REFERENCES `redts_zd_client_doc_infos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `redts_n_actions_received_id_foreign` FOREIGN KEY (`received_id`) REFERENCES `redts_b_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `redts_n_actions_referred_by_office_foreign` FOREIGN KEY (`referred_by_office`) REFERENCES `redts_f_offices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `redts_n_actions_send_to_office_foreign` FOREIGN KEY (`send_to_office`) REFERENCES `redts_f_offices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `redts_n_actions_sender_client_id_foreign` FOREIGN KEY (`sender_client_id`) REFERENCES `redts_zc_client_infos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `redts_n_actions_sender_user_id_foreign` FOREIGN KEY (`sender_user_id`) REFERENCES `redts_b_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `redts_y_requirements`
--
ALTER TABLE `redts_y_requirements`
  ADD CONSTRAINT `redts_y_requirements_subclass_id_foreign` FOREIGN KEY (`subclass_id`) REFERENCES `redts_l_sub_class` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `redts_zd_client_doc_infos`
--
ALTER TABLE `redts_zd_client_doc_infos`
  ADD CONSTRAINT `redts_zd_client_doc_infos_application_type_id_foreign` FOREIGN KEY (`application_type_id`) REFERENCES `redts_z_applicant_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `redts_zd_client_doc_infos_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `redts_ee_classification` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `redts_zd_client_doc_infos_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `redts_zc_client_infos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `redts_zd_client_doc_infos_subclass_id_foreign` FOREIGN KEY (`subclass_id`) REFERENCES `redts_l_sub_class` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `redts_zd_client_doc_infos_transaction_type_id_foreign` FOREIGN KEY (`transaction_type_id`) REFERENCES `redts_za_transaction_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `redts_ze_client_doc_attachments`
--
ALTER TABLE `redts_ze_client_doc_attachments`
  ADD CONSTRAINT `redts_ze_client_doc_attachments_doc_info_id_foreign` FOREIGN KEY (`doc_info_id`) REFERENCES `redts_zd_client_doc_infos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `redts_ze_client_doc_attachments_req_id_foreign` FOREIGN KEY (`req_id`) REFERENCES `redts_y_requirements` (`id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `redts_zi_origin_offices_doc_id_foreign` FOREIGN KEY (`doc_id`) REFERENCES `redts_zd_client_doc_infos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `redts_zi_origin_offices_origin_office_id_foreign` FOREIGN KEY (`origin_office_id`) REFERENCES `redts_f_offices` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `redts_zj_user_oop_approvees`
--
ALTER TABLE `redts_zj_user_oop_approvees`
  ADD CONSTRAINT `redts_zj_user_oop_approvees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `redts_b_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `redts_z_applicant_types`
--
ALTER TABLE `redts_z_applicant_types`
  ADD CONSTRAINT `redts_z_applicant_types_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `redts_za_transaction_types` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
