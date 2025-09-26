-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2025 at 02:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shifa_chemest`
--

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
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(120) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `dob`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'waqas', 'teky@mailinator.com', '+1 (358) 295-4263', 'Laboriosam sit labo', '1985-12-02', 'Officiis labore eum', '2025-09-22 06:23:02', '2025-09-22 06:23:02'),
(2, 'waqar', 'bovavug@mailinator.com', '+1 (797) 333-7085', 'Amet omnis possimus', '2016-04-20', 'Aspernatur soluta ve', '2025-09-22 06:23:11', '2025-09-22 06:23:11'),
(3, 'Muzamil Shah', 'MuzamilShah@mailinator.com', '+1 (959) 725-9094', 'He is my cousin', '2024-03-14', 'Inventore sunt non a', '2025-09-22 07:51:01', '2025-09-22 07:51:48'),
(4, 'waleed', 'lonokufuf@mailinator.com', '+1 (409) 482-7615', 'Facere aute eu optio', '2013-08-10', 'Non cumque voluptate', '2025-09-24 05:42:16', '2025-09-24 05:42:16');

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
-- Table structure for table `medicine_categories`
--

CREATE TABLE `medicine_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicine_categories`
--

INSERT INTO `medicine_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Tablets', '2025-09-22 06:22:05', '2025-09-22 06:22:05'),
(2, 'syspunsions', '2025-09-22 06:36:29', '2025-09-22 06:36:29'),
(3, 'surgical instruments', '2025-09-22 06:51:11', '2025-09-22 06:51:11'),
(4, 'other', '2025-09-23 03:37:10', '2025-09-23 03:37:10'),
(5, 'some more others', '2025-09-25 03:44:05', '2025-09-25 03:44:05');

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
(4, '2025_09_02_075623_create_customers_table', 1),
(5, '2025_09_03_074557_create_medicine_categories_table', 1),
(6, '2025_09_04_072559_create_products_table', 1),
(7, '2025_09_04_124945_add_name_and_category_to_products_table', 1),
(8, '2025_09_05_064912_add_medicine_category_id_to_products_table', 1),
(9, '2025_09_22_105641_create_sales_table', 2),
(10, '2025_09_22_105840_create_sale_items_table', 2);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `barcode` varchar(255) DEFAULT NULL,
  `purchase_price` decimal(10,2) NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `discount` decimal(5,2) NOT NULL DEFAULT 0.00,
  `quantity_in_stock` int(11) NOT NULL DEFAULT 0,
  `minimum_stock_alert` int(11) NOT NULL DEFAULT 5,
  `manufacture_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `added_date` date NOT NULL DEFAULT curdate(),
  `storage_requirements` varchar(255) DEFAULT NULL,
  `prescription_required` tinyint(1) NOT NULL DEFAULT 0,
  `product_image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `medicine_category_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `barcode`, `purchase_price`, `selling_price`, `discount`, `quantity_in_stock`, `minimum_stock_alert`, `manufacture_date`, `expiry_date`, `added_date`, `storage_requirements`, `prescription_required`, `product_image`, `description`, `medicine_category_id`) VALUES
(1, 'Panadol', '1', 'Dolore velit exceptu', 299.00, 500.00, 60.00, 850, 26, '1978-06-17', '2021-08-16', '2025-09-22', 'Refrigerated (2-8°C)', 0, 'products/eIAlSo8pLv7KXx45Yfc0Ugo6jWS1ly1uh06oAUpW.jpg', 'Omnis necessitatibus', NULL),
(2, 'Syncos', '2', 'Ducimus anim verita', 941.00, 97.00, 26.00, 284, 24, '2017-12-06', '1983-11-02', '2025-09-22', 'Frozen (-20°C)', 1, NULL, 'Ea et non ex molesti', NULL),
(3, 'Blades', '3', 'Nisi qui aut officii', 579.00, 812.00, 32.00, 82, 33, '2011-12-22', '1974-04-19', '2025-09-22', 'Refrigerated (2-8°C)', 0, NULL, 'Voluptates autem dui', NULL),
(4, 'Paracetamol', '1', 'Ab similique harum d', 182.00, 146.00, 52.00, 318, 71, '1987-12-21', '1980-02-06', '2025-09-22', 'Refrigerated (2-8°C)', 0, NULL, 'In cupiditate aut am', NULL),
(6, 'Vibra', '1', 'Eius eiusmod est adi', 71.00, 918.00, 62.00, 391, 0, '2024-04-06', '2018-08-10', '2025-09-22', 'Frozen (-20°C)', 1, NULL, 'Fugiat minima est r', NULL),
(7, 'Surgical Tape', '4', 'Id expedita ut liber', 705.00, 720.00, 43.00, 701, 99, '2019-11-18', '2015-09-23', '2025-09-23', 'Cool & Dry Place', 1, NULL, 'Vel aspernatur esse', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `grand_total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `customer_id`, `customer_name`, `grand_total`, `created_at`, `updated_at`) VALUES
(1, 2, 'waqar (+1 (797) 333-7085)', 500.00, '2025-09-22 06:33:07', '2025-09-22 06:33:07'),
(2, 1, 'waqas (+1 (358) 295-4263)', 597.00, '2025-09-22 06:37:22', '2025-09-22 06:37:22'),
(3, 1, 'waqas (+1 (358) 295-4263)', 597.00, '2025-09-22 06:40:20', '2025-09-22 06:40:20'),
(4, 1, 'waqas (+1 (358) 295-4263)', 597.00, '2025-09-22 06:41:24', '2025-09-22 06:41:24'),
(5, NULL, '-- Select Customer --', 1409.00, '2025-09-22 06:51:50', '2025-09-22 06:51:50'),
(6, 3, 'Muzamil Shah (+1 (959) 725-9094)', 3093.00, '2025-09-22 07:58:40', '2025-09-22 07:58:40'),
(7, 3, 'Muzamil Shah (+1 (959) 725-9094)', 743.00, '2025-09-22 08:56:25', '2025-09-22 08:56:25'),
(8, 3, 'Muzamil Shah (+1 (959) 725-9094)', 450.00, '2025-09-23 05:23:22', '2025-09-23 05:23:22'),
(9, 3, 'Muzamil Shah (+1 (959) 725-9094)', 450.00, '2025-09-23 05:23:24', '2025-09-23 05:23:24'),
(10, 4, 'waleed (+1 (409) 482-7615)', 910.00, '2025-09-24 05:42:48', '2025-09-24 05:42:48'),
(11, 4, 'waleed (+1 (409) 482-7615)', 646.00, '2025-09-25 02:11:45', '2025-09-25 02:11:45'),
(12, 4, 'waleed (+1 (409) 482-7615)', 2284.00, '2025-09-25 03:32:05', '2025-09-25 03:32:05');

-- --------------------------------------------------------

--
-- Table structure for table `sale_items`
--

CREATE TABLE `sale_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `mrp` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `disc` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tax_amt` decimal(10,2) DEFAULT NULL,
  `cgst` decimal(10,2) DEFAULT NULL,
  `sgst` decimal(10,2) DEFAULT NULL,
  `total_amt` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_items`
--

INSERT INTO `sale_items` (`id`, `sale_id`, `name`, `mrp`, `qty`, `rate`, `total`, `disc`, `tax_amt`, `cgst`, `sgst`, `total_amt`, `created_at`, `updated_at`) VALUES
(1, 1, 'Panadol', 500.00, 1, 500.00, 500.00, 0.00, 0.00, 0.00, 0.00, 500.00, '2025-09-22 06:33:07', '2025-09-22 06:33:07'),
(2, 2, 'Syncos', 97.00, 1, 97.00, 97.00, 0.00, 0.00, 0.00, 0.00, 97.00, '2025-09-22 06:37:22', '2025-09-22 06:37:22'),
(3, 2, 'Panadol', 500.00, 1, 500.00, 500.00, 0.00, 0.00, 0.00, 0.00, 500.00, '2025-09-22 06:37:22', '2025-09-22 06:37:22'),
(4, 3, 'Syncos', 97.00, 1, 97.00, 97.00, 0.00, 0.00, 0.00, 0.00, 97.00, '2025-09-22 06:40:20', '2025-09-22 06:40:20'),
(5, 3, 'Panadol', 500.00, 1, 500.00, 500.00, 0.00, 0.00, 0.00, 0.00, 500.00, '2025-09-22 06:40:20', '2025-09-22 06:40:20'),
(6, 4, 'Syncos', 97.00, 1, 97.00, 97.00, 0.00, 0.00, 0.00, 0.00, 97.00, '2025-09-22 06:41:24', '2025-09-22 06:41:24'),
(7, 4, 'Panadol', 500.00, 1, 500.00, 500.00, 0.00, 0.00, 0.00, 0.00, 500.00, '2025-09-22 06:41:24', '2025-09-22 06:41:24'),
(8, 5, 'Blades', 812.00, 1, 812.00, 812.00, 0.00, 0.00, 0.00, 0.00, 812.00, '2025-09-22 06:51:50', '2025-09-22 06:51:50'),
(9, 5, 'Syncos', 97.00, 1, 97.00, 97.00, 0.00, 0.00, 0.00, 0.00, 97.00, '2025-09-22 06:51:50', '2025-09-22 06:51:50'),
(10, 5, 'Panadol', 500.00, 1, 500.00, 500.00, 0.00, 0.00, 0.00, 0.00, 500.00, '2025-09-22 06:51:50', '2025-09-22 06:51:50'),
(11, 6, 'Panadol', 500.00, 2, 500.00, 1000.00, 250.00, 0.00, 0.00, 0.00, 750.00, '2025-09-22 07:58:40', '2025-09-22 07:58:40'),
(12, 6, 'Syncos', 97.00, 1, 97.00, 97.00, 0.00, 0.00, 0.00, 0.00, 97.00, '2025-09-22 07:58:40', '2025-09-22 07:58:40'),
(13, 6, 'Blades', 812.00, 1, 812.00, 812.00, 12.00, 0.00, 0.00, 0.00, 800.00, '2025-09-22 07:58:40', '2025-09-22 07:58:40'),
(14, 6, 'Paracetamol', 146.00, 1, 146.00, 146.00, 0.00, 0.00, 0.00, 0.00, 146.00, '2025-09-22 07:58:40', '2025-09-22 07:58:40'),
(15, 6, 'Amoxl', 410.00, 1, 410.00, 410.00, 10.00, 0.00, 0.00, 0.00, 400.00, '2025-09-22 07:58:40', '2025-09-22 07:58:40'),
(16, 6, 'Vibra', 918.00, 1, 918.00, 918.00, 18.00, 0.00, 0.00, 0.00, 900.00, '2025-09-22 07:58:40', '2025-09-22 07:58:40'),
(17, 7, 'Panadol', 500.00, 1, 500.00, 500.00, 0.00, 0.00, 0.00, 0.00, 500.00, '2025-09-22 08:56:25', '2025-09-22 08:56:25'),
(18, 7, 'Syncos', 97.00, 1, 97.00, 97.00, 0.00, 0.00, 0.00, 0.00, 97.00, '2025-09-22 08:56:25', '2025-09-22 08:56:25'),
(19, 7, 'Paracetamol', 146.00, 1, 146.00, 146.00, 0.00, 0.00, 0.00, 0.00, 146.00, '2025-09-22 08:56:25', '2025-09-22 08:56:25'),
(20, 8, 'Panadol', 500.00, 1, 500.00, 500.00, 250.00, 0.00, 0.00, 0.00, 250.00, '2025-09-23 05:23:23', '2025-09-23 05:23:23'),
(21, 8, 'Paracetamol', 146.00, 2, 146.00, 292.00, 92.00, 0.00, 0.00, 0.00, 200.00, '2025-09-23 05:23:23', '2025-09-23 05:23:23'),
(22, 9, 'Panadol', 500.00, 1, 500.00, 500.00, 250.00, 0.00, 0.00, 0.00, 250.00, '2025-09-23 05:23:24', '2025-09-23 05:23:24'),
(23, 9, 'Paracetamol', 146.00, 2, 146.00, 292.00, 92.00, 0.00, 0.00, 0.00, 200.00, '2025-09-23 05:23:24', '2025-09-23 05:23:24'),
(24, 10, 'Panadol', 500.00, 1, 500.00, 500.00, 0.00, 0.00, 0.00, 0.00, 500.00, '2025-09-24 05:42:48', '2025-09-24 05:42:48'),
(25, 10, 'Amoxl', 410.00, 1, 410.00, 410.00, 0.00, 0.00, 0.00, 0.00, 410.00, '2025-09-24 05:42:48', '2025-09-24 05:42:48'),
(26, 11, 'Panadol', 500.00, 1, 500.00, 500.00, 0.00, 0.00, 0.00, 0.00, 500.00, '2025-09-25 02:11:45', '2025-09-25 02:11:45'),
(27, 11, 'Paracetamol', 146.00, 1, 146.00, 146.00, 0.00, 0.00, 0.00, 0.00, 146.00, '2025-09-25 02:11:45', '2025-09-25 02:11:45'),
(28, 12, 'Panadol', 500.00, 1, 500.00, 500.00, 0.00, 0.00, 0.00, 0.00, 500.00, '2025-09-25 03:32:05', '2025-09-25 03:32:05'),
(29, 12, 'Paracetamol', 146.00, 1, 146.00, 146.00, 0.00, 0.00, 0.00, 0.00, 146.00, '2025-09-25 03:32:05', '2025-09-25 03:32:05'),
(30, 12, 'Vibra', 918.00, 1, 918.00, 918.00, 0.00, 0.00, 0.00, 0.00, 918.00, '2025-09-25 03:32:05', '2025-09-25 03:32:05'),
(31, 12, 'Surgical Tape', 720.00, 1, 720.00, 720.00, 0.00, 0.00, 0.00, 0.00, 720.00, '2025-09-25 03:32:05', '2025-09-25 03:32:05');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

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
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `medicine_categories`
--
ALTER TABLE `medicine_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_barcode_unique` (`barcode`),
  ADD KEY `products_medicine_category_id_foreign` (`medicine_category_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_items`
--
ALTER TABLE `sale_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sale_items_sale_id_foreign` (`sale_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicine_categories`
--
ALTER TABLE `medicine_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sale_items`
--
ALTER TABLE `sale_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_medicine_category_id_foreign` FOREIGN KEY (`medicine_category_id`) REFERENCES `medicine_categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `sale_items`
--
ALTER TABLE `sale_items`
  ADD CONSTRAINT `sale_items_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
