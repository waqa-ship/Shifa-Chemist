-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2025 at 10:12 AM
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
(4, 'Xander Horn', 'busyqo@mailinator.com', '+1 (222) 637-7393', 'Ipsam ut exercitatio', NULL, NULL, '2025-09-02 05:15:48', '2025-09-02 05:15:48'),
(5, 'Moana Colon', 'kaky@mailinator.com', '+1 (322) 248-7138', 'Incidunt est mollit', NULL, NULL, '2025-09-02 05:16:07', '2025-09-02 05:16:07'),
(6, 'Nevada Pope', 'bavu@mailinator.com', '+1 (322) 156-4812', 'Eu sit explicabo Co', NULL, NULL, '2025-09-02 05:16:24', '2025-09-02 05:16:24'),
(7, 'Talon Shepherd', 'vejob@mailinator.com', '+1 (658) 141-1848', 'Voluptas sunt esse', NULL, NULL, '2025-09-02 05:16:48', '2025-09-02 05:16:48'),
(8, 'Quinn Gamble', 'naryxyr@mailinator.com', '+1 (531) 712-8437', 'Minus eiusmod aute e', NULL, NULL, '2025-09-02 05:16:57', '2025-09-02 05:16:57'),
(9, 'Alexander Oconnor', 'humabixe@mailinator.com', '+1 (715) 141-2837', 'Quasi dolore beatae', NULL, NULL, '2025-09-02 05:17:33', '2025-09-02 05:17:33'),
(10, 'Colin Watkins', 'lisafytaha@mailinator.com', '+1 (662) 232-3169', 'Minus provident quo', NULL, NULL, '2025-09-02 05:17:39', '2025-09-02 05:17:39'),
(16, 'waqas khan', 'waqas7211@gmail.om', '03325920799', 'Mardan', '2025-09-03', 'stomach issue been dignosed', '2025-09-03 02:18:41', '2025-09-03 02:18:41'),
(17, 'Alma Odonnell', 'maninyvav@mailinator.com', '+1 (738) 475-4854', 'Amet est dolor quo', '1997-09-18', 'Hic deleniti error l', '2025-09-03 02:18:59', '2025-09-03 02:18:59'),
(18, 'Kellie Cross', 'heciboz@mailinator.com', '+1 (698) 187-6761', 'Impedit do perferen', '2019-11-11', 'Et officiis corporis', '2025-09-03 02:19:07', '2025-09-03 02:19:07'),
(19, 'Alam shah', 'Alamshah@mailinator.com', '+1 (159) 199-3482', 'Mardan', '1984-03-03', 'Id eum aliquam volu', '2025-09-03 02:19:15', '2025-09-05 01:46:13');

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
(5, '2025_09_03_074557_create_medicine_categories_table', 2),
(6, '2025_09_04_072559_create_products_table', 3),
(7, '2025_09_04_124945_add_name_and_category_to_products_table', 4),
(8, '2025_09_05_064912_add_medicine_category_id_to_products_table', 5);

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
(17, '', NULL, 'Omnis tenetur esse i', 304.00, 615.00, 12.00, 428, 35, '2003-10-17', '1999-06-07', '2025-09-04', 'Dark Place', 0, 'products/96OQGz9DqTfw22zyr4GHP0xBw0igMPI5gREb6D8p.jpg', 'Laboriosam illo iru', NULL),
(18, 'Hyacinth Fowler', 'Delectus qui est ha', 'Ab illo minima velit', 934.00, 975.00, 13.00, 828, 36, '1987-01-18', '2018-11-10', '2025-09-04', 'Room Temperature', 1, 'products/Kd6zwsvHzkc8R7GjteP4DY97biAHY7OcEvZd7NzD.png', 'Eum quia sint aperia', NULL),
(20, 'Armand Logan', 'Expedita adipisicing', 'Accusamus vel repell', 647.00, 467.00, 73.00, 142, 19, '2021-12-16', '1993-12-27', '2025-09-05', 'Cool & Dry Place', 0, NULL, 'Qui rerum eos sint', NULL),
(21, 'Aimee Hines', 'Est hic natus autem', 'Ut sed ea est commod', 701.00, 836.00, 13.00, 971, 48, '2023-09-17', '1990-06-21', '2025-09-05', 'Custom', 0, NULL, 'Vel qui id voluptas', NULL),
(22, 'Chastity Prince', 'Animi sunt itaque', 'Voluptatem et sit i', 905.00, 242.00, 70.00, 477, 73, '1999-01-15', '1991-08-15', '2025-09-05', 'Dark Place', 1, NULL, 'Sunt voluptas excep', NULL),
(23, 'Jemima Stone', 'Autem soluta eligend', 'Repellendus Sunt q', 437.00, 163.00, 84.00, 213, 71, '1983-02-20', '1982-04-12', '2025-09-05', 'Room Temperature', 0, NULL, 'Voluptatem exceptur', NULL),
(24, 'Denton Park', 'Itaque esse in dolo', 'Non ex delectus exc', 240.00, 672.00, 12.00, 112, 99, '1991-04-24', '1999-11-16', '2025-09-05', 'Custom', 0, NULL, 'Omnis minus officia', NULL),
(25, 'Blossom Langley', 'Magni quis eos eaqu', 'Aut iste dicta adipi', 589.00, 986.00, 28.00, 449, 38, '2012-04-22', '2009-10-15', '2025-09-05', 'Cool & Dry Place', 0, NULL, 'Alias vero dignissim', NULL),
(26, 'Kyle Dale', NULL, 'Voluptatum veritatis', 967.00, 259.00, 84.00, 74, 61, '1984-02-18', '2006-10-07', '2025-09-05', 'Dark Place', 0, NULL, 'Est adipisci laborum', NULL),
(27, 'Risek drip', NULL, 'Nemo reiciendis dese', 239.00, 581.00, 77.00, 517, 42, '2023-02-07', '2022-10-19', '2025-09-05', 'Room Temperature', 1, NULL, 'Tenetur culpa quaer', NULL),
(28, 'bripheen', NULL, 'Fugiat et modi place', 956.00, 631.00, 99.00, 160, 40, '1987-09-24', '1998-12-25', '2025-09-05', 'Dark Place', 1, NULL, 'Velit maiores qui re', NULL);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
