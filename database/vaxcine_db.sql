-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2021 at 05:34 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vaxcine_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `template_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `order_id`, `template_id`, `question_id`, `answer`, `created_at`, `updated_at`) VALUES
(4, 1, 1, 1, 'không', '2021-05-19 20:12:53', '2021-05-19 20:12:53'),
(5, 1, 1, 2, 'không', '2021-05-19 20:12:53', '2021-05-19 20:12:53'),
(6, 1, 1, 3, 'không', '2021-05-19 20:12:53', '2021-05-19 20:12:53'),
(7, 5, 1, 1, 'không nhé', '2021-05-30 06:27:10', '2021-05-30 06:27:10'),
(8, 5, 1, 2, 'không nhé', '2021-05-30 06:27:10', '2021-05-30 06:27:10'),
(9, 5, 1, 3, 'không nhé', '2021-05-30 06:27:10', '2021-05-30 06:27:10'),
(10, 2, 1, 1, 'có', '2021-06-03 08:35:14', '2021-06-03 08:35:14'),
(11, 2, 1, 2, 'có', '2021-06-03 08:35:14', '2021-06-03 08:35:14'),
(12, 2, 1, 3, 'có', '2021-06-03 08:35:14', '2021-06-03 08:35:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(20, '2014_10_12_000000_create_users_table', 1),
(21, '2020_06_10_105629_create_posts_table', 1),
(22, '2020_06_10_105641_create_vaccines_table', 1),
(23, '2020_06_10_105658_create_orders_table', 1),
(24, '2020_06_14_013114_add_active_to_vaccines_table', 1),
(25, '2020_06_14_013334_add_image_to_vaccines_table', 1),
(26, '2021_05_11_135316_create_templates_table', 1),
(27, '2021_05_11_141059_create_questions_table', 1),
(28, '2021_05_11_141112_create_answers_table', 1),
(29, '2021_05_11_143020_add_quantity_to_vaccines_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vaccine_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `join_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `join_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `total` double NOT NULL,
  `state` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `vaccine_id`, `user_id`, `customer_name`, `customer_address`, `customer_phone`, `customer_email`, `join_date`, `join_time`, `quantity`, `total`, `state`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Bùi Phương Thanh', 'Hà Nội', '0987654321', 'thanh.bt@gmail.com', NULL, NULL, 1, 270000, 2, '2021-05-19 20:12:03', '2021-07-10 20:18:21'),
(2, 3, 0, 'Thanh Minh', 'Hà Nội', '0987654321', 'thanh.bt@gmail.com', '08-06-2021', '15:00', 1, 270000, 0, '2021-06-03 08:34:48', '2021-06-03 08:34:48');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `id_user`, `title`, `content`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dinh dưỡng đối với người suy dinh dưỡng', '<p>this is content</p>', 'Những người suy dinh dưỡng là .........................................................', '2021-05-23 21:02:21', '2021-05-23 21:02:21');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `template_id` int(11) NOT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `template_id`, `question`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bạn có bị các dấu hiệu bệnh về đường hô hấp như ho, sốt, khó thở ......', '2021-05-19 17:42:21', '2021-05-19 17:42:21'),
(2, 1, 'Bạn có tiếp xúc với người được cho là nghi nhiễm không ?', '2021-05-19 17:42:21', '2021-05-19 17:42:21'),
(3, 1, 'Bạn có đi đâu từ vùng có dịch bệnh không?', '2021-05-19 17:42:21', '2021-05-19 17:42:21');

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `template_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `template_name`, `created_at`, `updated_at`) VALUES
(1, 'Khai báo y tế', '2021-05-19 17:42:21', '2021-05-19 17:42:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `address`, `phone`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '', '0987654321', 'admin@gmail.com', '$2y$10$pUDtiJi0hALzoAkD74ac3eKBEUmPMTAsUVUaRg888tBq5G78jq1fS', 1, NULL, '2021-07-11 02:02:11'),
(2, 'Thanh Tuấn', 'Hà Nội', '0987654321', 'tuan.tt@gmail.com', '$2y$10$n4l8Olz3imNYvMG5JHHGB.sDIwusURSTPaz2ucdE9/3oJLtqGw93a', 0, '2021-05-24 23:55:48', '2021-05-24 23:55:48');

-- --------------------------------------------------------

--
-- Table structure for table `vaccines`
--

CREATE TABLE `vaccines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `allocate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reser_price` double DEFAULT NULL,
  `late_price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vaccines`
--

INSERT INTO `vaccines` (`id`, `name`, `origin`, `allocate`, `reser_price`, `late_price`, `created_at`, `updated_at`, `active`, `image`, `quantity`) VALUES
(1, 'BCG', 'Việt Nam', 'Phòng bệnh lao', 150000, 125000, NULL, '2021-07-11 02:27:38', '1', 'images/vaccine-1625995658.png', 0),
(2, 'ENGERIX B', 'Bỉ', 'Viêm gan B', 250000, 215000, NULL, '2021-07-11 17:12:07', NULL, 'images/vaccine-1626048727.png', 0),
(3, 'HAVAX', 'Việt Nam', 'Viêm gan A', 270000, 230000, NULL, '2021-07-11 17:12:20', '1', 'images/vaccine-1626048740.png', 99),
(4, 'ROTARIX', 'Bỉ', 'Dịch tả ROTA virus', 850000, 805000, NULL, NULL, NULL, NULL, 0),
(5, 'MMR II', 'Mỹ', 'Sởi - Quai bị -Rubella', 290000, 240000, NULL, NULL, NULL, NULL, 0),
(6, 'MVAC', 'Mỹ', 'Sở đơn', 350000, 300000, NULL, NULL, NULL, NULL, 0),
(7, 'PENTAXIM', 'Pháp', 'Bạch hầu - Ho gà - Uốn ván', 850000, 750000, NULL, NULL, NULL, NULL, 0),
(8, 'IMOJEV', 'Thái Lan', 'Viêm não Nhật Bản', 700000, 670000, NULL, NULL, NULL, NULL, 0),
(9, 'VARIVAX', 'Mỹ', 'Thủy đậu', 850000, 820000, NULL, NULL, NULL, NULL, 0),
(10, 'VERORAB', 'Pháp', 'Phòng dại', 320000, 290000, NULL, NULL, NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vaccines`
--
ALTER TABLE `vaccines`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vaccines`
--
ALTER TABLE `vaccines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
