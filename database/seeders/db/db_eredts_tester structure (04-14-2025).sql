-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2025 at 09:58 AM
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
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_uuid` char(36) DEFAULT NULL COMMENT 'from b_user',
  `offices_id` bigint(20) UNSIGNED NOT NULL,
  `offices_uuid` char(36) DEFAULT NULL COMMENT 'from f_offices',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_a_accesss`
--
ALTER TABLE `redts_a_accesss`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_ba_view_reqs_specs`
--
ALTER TABLE `redts_ba_view_reqs_specs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_b_user`
--
ALTER TABLE `redts_b_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_d_profile`
--
ALTER TABLE `redts_d_profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_ee_classification`
--
ALTER TABLE `redts_ee_classification`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_e_region`
--
ALTER TABLE `redts_e_region`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_f_offices`
--
ALTER TABLE `redts_f_offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_g_carousel_imgs`
--
ALTER TABLE `redts_g_carousel_imgs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_j_user_offices`
--
ALTER TABLE `redts_j_user_offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_nb_releasing_routes`
--
ALTER TABLE `redts_nb_releasing_routes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_nc_act_seens`
--
ALTER TABLE `redts_nc_act_seens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_n_actions`
--
ALTER TABLE `redts_n_actions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_w_upload_size_limit`
--
ALTER TABLE `redts_w_upload_size_limit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_y_requirements`
--
ALTER TABLE `redts_y_requirements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_za_transaction_types`
--
ALTER TABLE `redts_za_transaction_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_ze_client_doc_attachments`
--
ALTER TABLE `redts_ze_client_doc_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_zj_user_oop_approvees`
--
ALTER TABLE `redts_zj_user_oop_approvees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redts_z_applicant_types`
--
ALTER TABLE `redts_z_applicant_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
