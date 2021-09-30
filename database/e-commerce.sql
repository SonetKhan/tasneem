-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2021 at 07:55 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tasneem`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_in_menu` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_in_meu_order` float DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_picture`, `display_in_menu`, `display_in_meu_order`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(6, 'Sea & Fish', NULL, 'No', 12.55, 3, 3, '2021-08-24 11:50:49', '2021-08-29 11:11:48'),
(7, 'Health & Science 2', 'image/category/1708979086248559.jpg', 'Yes', 43.4535, 3, 3, '2021-08-24 11:51:29', '2021-08-24 12:51:02'),
(9, 'Health & Gymnesiam', 'image/category/1709329851980094.png', 'Yes', 12.55, 3, 3, '2021-08-28 09:46:20', '2021-08-28 09:46:20'),
(10, 'Health & Food', 'image/category/1709329883947556.png', 'Yes', 12.5787, 3, 3, '2021-08-28 09:46:48', '2021-08-28 09:46:48'),
(11, 'Social walfare', 'image/category/1709329936192498.jpeg', 'Yes', 12.8987, 3, 3, '2021-08-28 09:47:38', '2021-08-28 09:47:38'),
(12, 'English && Arts', 'image/category/1709329969010341.jpeg', 'Yes', 12.099, 3, 3, '2021-08-28 09:48:10', '2021-08-28 09:48:10');

-- --------------------------------------------------------

--
-- Table structure for table `couriers`
--

CREATE TABLE `couriers` (
  `id` int(11) NOT NULL,
  `courier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `couriers`
--

INSERT INTO `couriers` (`id`, `courier_name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Shundorban courier service', 3, 3, '2021-09-07 12:38:00', '2021-09-12 08:25:46'),
(2, 'Redx', 2, 2, '2021-09-11 15:05:27', '2021-09-11 15:05:27'),
(3, 'Fedx', 3, 3, '2021-09-11 15:05:55', '2021-09-11 15:05:55'),
(4, 'S A Alom courier service', 3, 3, '2021-09-12 10:17:41', '2021-09-12 10:17:41');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alternative_mobile` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_product` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `paid` decimal(10,2) NOT NULL,
  `status` enum('Pending','Processing','Shipped','Completed','Cancelled') COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` enum('Due','Paid') COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courier_id` int(11) DEFAULT NULL,
  `courier_details` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_instruction` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `shipping_address`, `mobile`, `alternative_mobile`, `total_product`, `total_price`, `discount`, `paid`, `status`, `payment_status`, `payment_details`, `courier_id`, `courier_details`, `special_instruction`, `comment`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Al-Amin', 'district:Narsingdi,upzila:Raipura,postal_code:424', '01676469291', '52435423452', 22, '2671328.00', '100000.00', '2571328.00', 'Pending', 'Due', 'Mbl', NULL, NULL, NULL, NULL, 3, '2021-09-11 12:02:45', '2021-09-11 12:02:45'),
(2, 'Rifat khan sonet', 'district:Narsingdi,upzila:Narsingdi sadar,postal_code:12009', '01793477145', '52435423452', 15, '1821361.00', '100000.00', '1721361.00', 'Processing', 'Paid', 'mbl', 1, 'send it to me my following address...', 'Call me my cell number before shipped.', NULL, 3, '2021-09-11 12:05:36', '2021-09-12 07:24:03'),
(3, 'Nurul-Haq', 'district:Kishorganj,upzila:Bhairab,postal_code:1204', '01629213245', '52435423452', 13, '1578512.00', '100000.00', '1478512.00', 'Shipped', 'Paid', 'mbl', 2, 'Send it my postal code address. I will collect from here.', 'nothing', NULL, 3, '2021-09-11 12:07:09', '2021-09-12 05:58:08'),
(4, 'Al-Amin', 'district:dfasddfaf,upzila:gggdf,postal_code:424', '01676469291', '52435423452', 9, '1092816.00', '100000.00', '992816.00', 'Processing', 'Paid', 'mbl', 1, 'Send me it my following address.', 'Call me my cell number before shipped.', NULL, 3, '2021-09-12 07:08:21', '2021-09-12 07:10:28'),
(5, 'Rifat khan sonet', 'District:dfasddfaf,Upzila:gggdf,Postal_code:424', '123254253525', '52435423452', 1, '121424.00', '100000.00', '21424.00', 'Pending', 'Due', 'mbl', NULL, NULL, NULL, NULL, 3, '2021-09-12 09:46:04', '2021-09-12 09:46:04'),
(6, 'Nazmul  Hasan Shimul', 'District:Narsingdi,Upzila:Belabo,Postal_code:1640', '01723085870', '52435423452', 29, '3521297.00', '100000.00', '3421297.00', 'Shipped', 'Paid', 'Mobile banking', 1, 'I will collect it from my nearest shundorban courier service. Before shipped please call..', 'Call me my cell number before shipped.', NULL, 7, '2021-09-13 11:55:26', '2021-09-13 11:57:31'),
(7, 'Admin2', 'District:Narsingdi,Upzila:Raipura,Postal_code:123141', '01676469291', '52435423452', 4, '485696.00', '100000.00', '385696.00', 'Shipped', 'Paid', 'mbl', 3, 'send it through fedx.', 'Call me my cell number before shipped.', NULL, 3, '2021-09-19 10:15:45', '2021-09-20 14:04:40'),
(8, 'Uzzal hossaiin', 'District:KIsherojong,Upzila:BhaIrab,Postal_code:12323', '01308867584', 'k324242335252', 12, '1457088.00', '100000.00', '1357088.00', 'Shipped', 'Due', 'Mobile banking', 1, 'Give it my security guard', 'nothing', 'Nice one.', 6, '2021-09-24 09:02:01', '2021-09-24 09:04:23'),
(9, 'kazi saydur rahman', 'District:Kishergongj,Upzila:bhairab,Postal_code:12133', '01711686924', '2131431224214214', 22, '2671328.00', '100000.00', '2571328.00', 'Processing', 'Due', 'mobile banking', 2, 'kashfkhasfidhaskfdhskjfdshafjkhh', 'nothing', 'good', 6, '2021-09-29 14:09:17', '2021-09-29 14:10:24');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `quantity`, `rate`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 10, '121424.00', '1214240.00', '2021-09-11 12:02:45', '2021-09-11 12:02:45'),
(2, 1, 6, 10, '121424.00', '1214240.00', '2021-09-11 12:02:45', '2021-09-11 12:02:45'),
(3, 1, 7, 2, '121424.00', '242848.00', '2021-09-11 12:02:45', '2021-09-11 12:02:45'),
(4, 2, 6, 2, '121424.00', '242848.00', '2021-09-11 12:05:36', '2021-09-11 12:05:36'),
(5, 2, 7, 3, '121424.00', '364272.00', '2021-09-11 12:05:36', '2021-09-11 12:05:36'),
(6, 2, 1, 5, '121424.00', '607120.00', '2021-09-11 12:05:36', '2021-09-11 12:05:36'),
(7, 2, 8, 5, '121424.25', '607121.25', '2021-09-11 12:05:36', '2021-09-11 12:05:36'),
(8, 3, 4, 3, '121424.00', '364272.00', '2021-09-11 12:07:09', '2021-09-11 12:07:09'),
(9, 3, 7, 3, '121424.00', '364272.00', '2021-09-11 12:07:09', '2021-09-11 12:07:09'),
(10, 3, 1, 7, '121424.00', '849968.00', '2021-09-11 12:07:09', '2021-09-11 12:07:09'),
(11, 4, 4, 3, '121424.00', '364272.00', '2021-09-12 07:08:21', '2021-09-12 07:08:21'),
(12, 4, 7, 6, '121424.00', '728544.00', '2021-09-12 07:08:21', '2021-09-12 07:08:21'),
(13, 5, 4, 1, '121424.00', '121424.00', '2021-09-12 09:46:04', '2021-09-12 09:46:04'),
(14, 6, 7, 3, '121424.00', '364272.00', '2021-09-13 11:55:26', '2021-09-13 11:55:26'),
(15, 6, 8, 5, '121424.25', '607121.25', '2021-09-13 11:55:26', '2021-09-13 11:55:26'),
(16, 6, 4, 6, '121424.00', '728544.00', '2021-09-13 11:55:26', '2021-09-13 11:55:26'),
(17, 6, 6, 9, '121424.00', '1092816.00', '2021-09-13 11:55:26', '2021-09-13 11:55:26'),
(18, 6, 5, 6, '121424.00', '728544.00', '2021-09-13 11:55:26', '2021-09-13 11:55:26'),
(19, 7, 7, 3, '121424.00', '364272.00', '2021-09-19 10:15:45', '2021-09-19 10:15:45'),
(20, 7, 8, -1, '121424.25', '-121424.25', '2021-09-19 10:15:45', '2021-09-19 10:15:45'),
(21, 7, 6, 2, '121424.00', '242848.00', '2021-09-19 10:15:45', '2021-09-19 10:15:45'),
(22, 8, 4, 12, '121424.00', '1457088.00', '2021-09-24 09:02:01', '2021-09-24 09:02:01'),
(23, 9, 4, 10, '121424.00', '1214240.00', '2021-09-29 14:09:17', '2021-09-29 14:09:17'),
(24, 9, 7, 12, '121424.00', '1457088.00', '2021-09-29 14:09:17', '2021-09-29 14:09:17');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_price` decimal(10,2) DEFAULT NULL,
  `special_price_start` datetime DEFAULT NULL,
  `special_price_end` datetime DEFAULT NULL,
  `show_in_home` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_in_home_serial` float DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `product_picture`, `product_price`, `product_details`, `special_price`, `special_price_start`, `special_price_end`, `show_in_home`, `show_in_home_serial`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 6, 'FIsh', 'image/product/1709331724290129.jpeg', '121424.00', 'fdgdsgdsgsdgsdgdsffgsfsdgdtttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttআমার বাংলা নিয়ে প্রথম কাজ করবার সুযোগ তৈরি হয়েছিল অভ্র^ নামক এক যুগান্তকারী বাংলা সফ্‌টওয়্যার হাতে পাবার মধ্য দিয়ে। এর পর একে একে বাংলা উইকিপিডিয়া, ওয়ার্ডপ্রেস বাংলা কোডেক্সসহ বিভিন্ন বাংলা অনলাইন পত্রিকা তৈরির কাজ করতে করতে বাংলার সাথে নিজেকে বেঁধে নিয়েছি আষ্টেপৃষ্ঠে। বিশেষ করে অনলাইন পত্রিকা তৈরি করতে ডিযাইন করার সময়, সেই ডিযাইনকে কোডে রূপান্তর করবার সময় বারবার অনুভব করেছি কিছু নমুনা লেখার। যে লেখাগুলো ফটোশপে বসিয়ে বাংলায় ডিযাইন করা যাবে, আবার সেই লেখাই অনলাইনে ব্যবহার করা যাবে। কিন্তু দুঃখজনক হলেও সত্য যে,', '234242.00', '2021-08-04 00:00:00', '2021-09-10 00:00:00', 'Yes', 2432, 3, 3, '2021-08-25 12:53:17', '2021-08-28 11:54:48'),
(4, 6, 'FIsh 5', NULL, '121424.00', 'efdsdfs', '688.78', '2021-09-21 00:00:00', '2021-09-23 00:00:00', 'Yes', 2432, 3, 3, '2021-08-25 13:13:41', '2021-09-21 10:26:29'),
(5, 6, 'FIsh', 'image/product/1709071236925053.jpg', '121424.00', 'frfredsfdhfd', NULL, NULL, NULL, 'Yes', 2432, 3, 3, '2021-08-25 13:15:44', '2021-08-25 13:15:44'),
(6, 6, 'FIsh1', 'image/product/1709073149209455.jpg', '121424.00', 'common things', '2323.00', '2021-08-01 00:00:00', '2021-08-26 00:00:00', 'Yes', 2432, 3, 3, '2021-08-25 13:21:30', '2021-08-28 08:56:21'),
(7, 12, 'Materials physics', 'image/product/1709340082151775.jpeg', '121424.00', 'jflsflsjfskjdfffffffffffffffffffffsfkjgfffffffffjfsjfsalkkkjflsmvlzx,mvs;osiifijakflkasfoaiosijfeasmflksfjalskmmflkasjmf;lassjflaskmflkasjfals;kfmlajfl;sajfl;awkjflaksksjflkasjflka', '2323.23', '2021-08-18 00:00:00', '2021-09-08 00:00:00', 'Yes', 2432, 3, 3, '2021-08-28 12:28:55', '2021-08-28 12:28:55'),
(8, 10, 'Materials physics 2', 'image/product/1709340379453656.jpeg', '121424.25', 'gsdfgsdgfdvcgsdgdsffterdfgfsdgegdfddffhsdffsadfdafefaftgercfvcxsdvdsgdsgsdgdsgsdgsdthtjrtetwereewtewtetreyjjgjfdsdrfadafda', '55.00', '2021-09-19 00:00:00', '2021-09-21 00:00:00', 'Yes', 2432, 3, 3, '2021-08-28 12:33:38', '2021-09-20 13:15:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mobile` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_type` enum('admin','manager','operator') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_active` tinyint(4) NOT NULL,
  `user_picture` varchar(255) CHARACTER SET utf8 NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `password`, `user_type`, `user_active`, `user_picture`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Nurul-Haq', '01629213245', '$2y$10$GGzZC9lNyGFXv5Oijke4nOWTDB2Q1318R4/nllVGW0iUkGm.VNw76', 'admin', 1, 'image/users/1708962812721324.jpg', NULL, '2021-08-22 11:36:52', '2021-09-13 07:19:16'),
(3, 'Sonet Khan', '01793477145', '$2y$10$.J7.bHNJH/t2Z.Zv2i2.4.u34jYBVXhknWWB49E/Qg0ryzusS7cKy', 'admin', 1, 'image/users/1708954926425389.jpg', NULL, '2021-08-22 12:35:02', '2021-09-22 00:44:14'),
(6, 'Nazmul  Hasan Shimul', '01723085870', '$2y$10$w4H9yHmF7KF/0fBFRDj1KeGVXvzYQ4Sljo6MwcM/ySyVuoQjzoVzi', 'admin', 1, 'image/users/1708963327043759.jpg', NULL, '2021-08-24 07:40:33', '2021-09-13 07:20:42'),
(7, 'Yusuf Liton', '01680322168', '$2y$10$LuOxqlAZ8Z6YqPE/hIJjRO8kqu8O4f8C3q3vGvVaI3ZnKRRqYzSzO', 'admin', 1, 'image/users/1708963443128545.jpg', NULL, '2021-08-24 07:42:23', '2021-09-13 05:48:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `couriers`
--
ALTER TABLE `couriers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `couriers`
--
ALTER TABLE `couriers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `categories_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `couriers`
--
ALTER TABLE `couriers`
  ADD CONSTRAINT `couriers_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `couriers_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
