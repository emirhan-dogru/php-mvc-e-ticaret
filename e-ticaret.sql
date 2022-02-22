-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 22 Şub 2022, 08:57:50
-- Sunucu sürümü: 8.0.17
-- PHP Sürümü: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `e-ticaret`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_surname` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `admins`
--

INSERT INTO `admins` (`id`, `name_surname`, `email`, `password`, `created_at`) VALUES
(1, 'Emirhan DOĞRU', 'emirhan-dogru@hotmail.com', '$2y$13$XHK0xv1rv9I6lTbpBWCTaOXbqU5fdTptkOl.5Bgze8RkAgh7AuGbu', '2022-01-22 21:00:00'),
(2, 'Denemesadsad', 'deneme@gmail.com', '$2y$13$i2tVe4s7AllrcA6bBmO0Me8HnSYhL4KaLfocA4t1gQ6hY4y.K5kpS', '2022-01-30 11:03:10'),
(5, 'Deneme1', 'deneme2@gmail.com', '$2y$13$fTd281eVwi3iW8F9heWkCeK.ykl4UWIW3kVXikjeApqSyNSr9OsAu', '2022-01-30 11:14:17');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin_natifications`
--

CREATE TABLE `admin_natifications` (
  `id` int(11) NOT NULL,
  `type` enum('success','danger','warning','primary') CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `title` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `isRead` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `admin_natifications`
--

INSERT INTO `admin_natifications` (`id`, `type`, `title`, `isRead`, `created_at`) VALUES
(1, 'success', 'Bu bir deneme bildirimidir', 0, '2022-02-12 11:33:50'),
(2, 'success', 'Bu bir deneme bildirimidir', 0, '2022-02-12 11:33:50'),
(3, 'success', 'Bu bir deneme bildirimidir', 0, '2022-02-12 11:33:50'),
(4, 'success', 'Bu bir deneme bildirimidir', 0, '2022-02-12 11:33:50'),
(5, 'success', 'Bu bir deneme bildirimidir', 0, '2022-02-12 11:33:50'),
(6, 'success', 'Bu bir deneme bildirimidir', 0, '2022-02-12 11:33:50'),
(7, 'success', 'Bu bir deneme bildirimidir', 0, '2022-02-12 11:33:50'),
(8, 'success', 'Bu bir deneme bildirimidir', 0, '2022-02-12 11:33:50'),
(9, 'success', 'Bu bir deneme bildirimidir', 0, '2022-02-12 11:33:50'),
(10, 'success', 'Bu bir deneme bildirimidir', 0, '2022-02-12 11:33:50'),
(11, 'success', 'Bu bir deneme bildirimidir', 0, '2022-02-12 11:33:50'),
(12, 'success', 'Bu bir deneme bildirimidir', 0, '2022-02-12 11:33:50');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `slug` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `status`, `created_at`) VALUES
(1, 'Ev ve Yaşam', 'ev-ve-yasam', 1, '2022-02-20 13:28:00'),
(2, 'Giyim', 'giyim', 1, '2022-02-20 13:28:00');

-- --------------------------------------------------------

--
-- Görünüm yapısı durumu `get_products_view`
-- (Asıl görünüm için aşağıya bakın)
--
CREATE TABLE `get_products_view` (
`id` int(11)
,`title` varchar(200)
,`slug` varchar(200)
,`price` decimal(10,2)
,`sale_price` decimal(10,2)
,`stock` int(11)
,`description` text
,`created_at` timestamp
,`updated_at` timestamp
,`small_image` text
,`image_path` text
);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `slug` varchar(200) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `price`, `sale_price`, `stock`, `description`, `created_at`) VALUES
(19, 'Pantolon', 'pantolon', '721.00', '500.00', 718632, 'Velit maxime iusto t', '2022-02-22 08:35:20');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `product_categories`
--

INSERT INTO `product_categories` (`id`, `product_id`, `category_id`, `status`, `created_at`) VALUES
(1, 19, 2, 1, '2022-02-22 08:35:21');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `original_image` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `small_image` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `image_path` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `image_order` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `original_image`, `small_image`, `image_path`, `image_order`, `created_at`) VALUES
(1, 1, '4A9BB0DD-1CEC-4FF5-8A63-32030350501F.png', 'small_4A9BB0DD-1CEC-4FF5-8A63-32030350501F.png', 'uploads/2022/02', 1, '2022-02-13 13:21:35'),
(2, 1, '924FC843-A76B-41E8-BEB2-005575009CB2.png', 'small_924FC843-A76B-41E8-BEB2-005575009CB2.png', 'uploads/2022/02', 1, '2022-02-13 13:21:35'),
(3, 1, '1132B5E3-869F-47E4-AB9C-797085653316.png', 'small_1132B5E3-869F-47E4-AB9C-797085653316.png', 'uploads/2022/02', 1, '2022-02-13 13:21:35'),
(4, 1, '02A85EF8-0652-4DEA-B9A3-DE636849406E.png', 'small_02A85EF8-0652-4DEA-B9A3-DE636849406E.png', 'uploads/2022/02', 1, '2022-02-13 13:21:35'),
(5, 15, '8DA9128E-6DD2-4A90-A161-781A05B5E72D.jpg', 'small_8DA9128E-6DD2-4A90-A161-781A05B5E72D.jpg', 'uploads/2022/02', 1, '2022-02-19 14:02:55'),
(6, 16, 'A8D7BFFA-1FBE-4380-A3AB-1C8F67877DD6.jpg', 'small_A8D7BFFA-1FBE-4380-A3AB-1C8F67877DD6.jpg', 'uploads/2022/02', 1, '2022-02-20 13:06:53'),
(7, 16, '361ECE6A-8B81-4796-B1F8-D26C1157C213.jpg', 'small_361ECE6A-8B81-4796-B1F8-D26C1157C213.jpg', 'uploads/2022/02', 1, '2022-02-20 13:06:53'),
(8, 19, '7ACF2FDE-DE04-4022-AE41-BAA34474A022.jpeg', 'small_7ACF2FDE-DE04-4022-AE41-BAA34474A022.jpeg', 'uploads/2022/02', 1, '2022-02-22 08:35:20'),
(9, 19, 'CF2A8C62-CC0E-4E61-A315-73C420239D1D.jpeg', 'small_CF2A8C62-CC0E-4E61-A315-73C420239D1D.jpeg', 'uploads/2022/02', 1, '2022-02-22 08:35:21');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_variants`
--

CREATE TABLE `product_variants` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variant_name` int(11) NOT NULL,
  `variant_value` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `variant_name`, `variant_value`, `status`, `created_at`) VALUES
(1, 1, 0, 'Sint ab laboriosam ', 1, '2022-02-13 13:21:35'),
(2, 1, 0, 'Nihil commodo culpa', 1, '2022-02-13 13:21:35'),
(3, 1, 0, 'Nihil similique magn', 1, '2022-02-13 13:21:35'),
(4, 1, 0, 'Ut inventore et offi', 1, '2022-02-13 13:21:35'),
(5, 1, 0, 'Proident omnis eos', 1, '2022-02-13 13:21:35'),
(6, 1, 0, 'Ex veniam et accusa', 1, '2022-02-13 13:21:35'),
(7, 1, 0, 'Mollitia temporibus ', 1, '2022-02-13 13:21:35'),
(8, 1, 0, 'Vitae doloremque et ', 1, '2022-02-13 13:21:35'),
(9, 15, 0, 'beyz', 1, '2022-02-19 14:02:54'),
(10, 15, 0, 's', 1, '2022-02-19 14:02:54'),
(11, 16, 0, '37', 1, '2022-02-20 13:06:52'),
(12, 16, 0, '38', 1, '2022-02-20 13:06:52'),
(13, 16, 0, '39', 1, '2022-02-20 13:06:52'),
(14, 16, 0, '46', 1, '2022-02-20 13:06:52'),
(15, 19, 0, 'Beyaz', 1, '2022-02-22 08:35:20'),
(16, 19, 0, 'Sarı', 1, '2022-02-22 08:35:20'),
(17, 19, 0, 'x', 1, '2022-02-22 08:35:20'),
(18, 19, 0, 's', 1, '2022-02-22 08:35:20');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_surname` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `birth_date` date NOT NULL,
  `question_type` int(11) NOT NULL,
  `question_answer` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name_surname`, `email`, `password`, `birth_date`, `question_type`, `question_answer`, `status`, `created_at`) VALUES
(1, 'Emirhan DOĞRU', 'admin@emirhandogru.com', '$2y$13$a2su4BRTjEf2t7o6OGRaNeJMB71i/Hetpp2zbZRx.atAjJVfdjY12', '2002-09-24', 1, '$2y$13$p3MBUmhHqIBvWLhYKwoZR.2ipIhMAOBVSAqcB5Hm01ig8CSgFPyS2', 1, '2022-02-05 11:24:30'),
(2, 'deneme', 'deneme2@gmail.com', '$2y$13$HOV6yl93FoWVlCgFE/6.MewIVsZ47fhvVVnmwfbv74Xo1xz/MCtsO', '0000-00-00', 3, '$2y$13$Bi/WWp4d8LlSpUd/hMNMKeD9hNuaj7HR9SL58ijzhHLZLEFCI83si', 0, '2022-02-06 10:01:35');

-- --------------------------------------------------------

--
-- Görünüm yapısı `get_products_view`
--
DROP TABLE IF EXISTS `get_products_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `get_products_view`  AS  select `products`.`id` AS `id`,`products`.`title` AS `title`,`products`.`slug` AS `slug`,`products`.`price` AS `price`,`products`.`sale_price` AS `sale_price`,`products`.`stock` AS `stock`,`products`.`description` AS `description`,`products`.`created_at` AS `created_at`,`products`.`updated_at` AS `updated_at`,`product_images`.`small_image` AS `small_image`,`product_images`.`image_path` AS `image_path` from (`products` join `product_images` on((`product_images`.`product_id` = `products`.`id`))) group by `products`.`id` ;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_password_unique` (`password`);

--
-- Tablo için indeksler `admin_natifications`
--
ALTER TABLE `admin_natifications`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `admin_natifications`
--
ALTER TABLE `admin_natifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Tablo için AUTO_INCREMENT değeri `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
