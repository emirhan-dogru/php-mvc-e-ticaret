-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 09 Mar 2022, 16:57:37
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
(12, 'success', 'Bu bir deneme bildirimidir', 0, '2022-02-12 11:33:50'),
(13, 'primary', 'Bir kullanıcı sepete ürün ekledi', 0, '2022-02-27 11:33:52'),
(14, 'primary', 'Bir kullanıcı sepete ürün ekledi', 0, '2022-02-27 12:45:44'),
(15, 'primary', 'Bir kullanıcı sepete ürün ekledi', 0, '2022-02-27 12:45:51'),
(16, 'primary', 'Bir kullanıcı sepete ürün ekledi', 0, '2022-02-27 12:45:57'),
(17, 'primary', 'Bir kullanıcı sepete ürün ekledi', 0, '2022-02-27 13:06:06'),
(18, 'primary', 'Bir kullanıcı sepete ürün ekledi', 0, '2022-02-27 13:06:48'),
(19, 'success', 'Yeni bir sipariş var', 0, '2022-03-09 10:29:15'),
(20, 'success', 'Yeni bir sipariş var', 0, '2022-03-09 10:30:53'),
(21, 'success', 'Yeni bir sipariş var', 0, '2022-03-09 10:30:57'),
(22, 'success', 'Yeni bir sipariş var', 0, '2022-03-09 10:31:35'),
(23, 'success', 'Yeni bir sipariş var', 0, '2022-03-09 10:31:50'),
(24, 'success', 'Yeni bir sipariş var', 0, '2022-03-09 10:32:58'),
(25, 'primary', 'Bir kullanıcı sepete ürün ekledi', 0, '2022-03-09 16:28:46'),
(26, 'success', 'Yeni bir sipariş var', 0, '2022-03-09 16:29:06'),
(27, 'success', 'Yeni bir sipariş var', 0, '2022-03-09 16:36:12');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `baskets`
--

CREATE TABLE `baskets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `basket_status` enum('aktif','satin_alindi','silindi') CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `baskets`
--

INSERT INTO `baskets` (`id`, `user_id`, `product_id`, `count`, `basket_status`, `created_at`) VALUES
(1, 1, 1, 1, 'silindi', '2022-02-27 11:18:12'),
(2, 1, 1, 5, 'silindi', '2022-02-27 11:33:52'),
(3, 1, 1, 5, 'silindi', '2022-02-27 12:45:44'),
(4, 1, 1, 4, 'silindi', '2022-02-27 12:45:51'),
(5, 1, 1, 1, 'silindi', '2022-02-27 12:45:57'),
(6, 1, 1, 4, 'satin_alindi', '2022-02-27 13:06:06'),
(7, 1, 1, 1, 'silindi', '2022-02-27 13:06:48'),
(8, 1, 1, 4, 'satin_alindi', '2022-03-09 16:28:46');

-- --------------------------------------------------------

--
-- Görünüm yapısı durumu `basket_products_view`
-- (Asıl görünüm için aşağıya bakın)
--
CREATE TABLE `basket_products_view` (
`id` int(11)
,`count` int(11)
,`basket_status` enum('aktif','satin_alindi','silindi')
,`user_id` int(11)
,`product_id` int(11)
,`title` varchar(200)
,`price` decimal(10,2)
,`sale_price` decimal(10,2)
,`image_path` text
,`small_image` text
);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `basket_variants`
--

CREATE TABLE `basket_variants` (
  `id` int(11) NOT NULL,
  `basket_id` int(11) NOT NULL,
  `variant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `basket_variants`
--

INSERT INTO `basket_variants` (`id`, `basket_id`, `variant_id`) VALUES
(1, 1, 1),
(2, 1, 4),
(3, 2, 2),
(4, 2, 4),
(5, 3, 2),
(6, 3, 4),
(7, 4, 1),
(8, 4, 5),
(9, 5, 3),
(10, 5, 5),
(11, 6, 2),
(12, 6, 5),
(13, 7, 3),
(14, 7, 5),
(15, 8, 3),
(16, 8, 4);

-- --------------------------------------------------------

--
-- Görünüm yapısı durumu `basket_variants_view`
-- (Asıl görünüm için aşağıya bakın)
--
CREATE TABLE `basket_variants_view` (
`basket_id` int(11)
,`variant_name` varchar(150)
,`variant_value` varchar(100)
);

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
-- Görünüm yapısı durumu `get_categories_view`
-- (Asıl görünüm için aşağıya bakın)
--
CREATE TABLE `get_categories_view` (
`id` int(11)
,`title` varchar(250)
,`slug` varchar(250)
,`product_id` int(10) unsigned
,`status` tinyint(1)
);

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
,`category_id` int(11)
,`category_title` varchar(250)
,`category_slug` varchar(250)
);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `last_name` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `company_name` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `country` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `adress1` text COLLATE utf8_turkish_ci NOT NULL,
  `adress2` text COLLATE utf8_turkish_ci NOT NULL,
  `city` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `post_code` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_turkish_ci NOT NULL,
  `payment` enum('kredi_karti','havale') COLLATE utf8_turkish_ci NOT NULL,
  `order_note` text COLLATE utf8_turkish_ci NOT NULL,
  `order_status` enum('Yeni Sipariş','Sipariş Hazırlanıyor','Sipariş Yola Çıktı','Sipariş Teslim Edildi','Sipariş İptal Edildi','Sipariş Teslim Edilmedi','Sipariş İade Edildi') COLLATE utf8_turkish_ci NOT NULL DEFAULT 'Yeni Sipariş',
  `order_general_price` decimal(10,2) NOT NULL,
  `order_sub_price` decimal(10,2) NOT NULL,
  `order_cargo_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `first_name`, `last_name`, `email`, `company_name`, `country`, `adress1`, `adress2`, `city`, `post_code`, `phone`, `payment`, `order_note`, `order_status`, `order_general_price`, `order_sub_price`, `order_cargo_price`, `created_at`) VALUES
(12, 1, 'Caldwell', 'Macias', 'dygasa@mailinator.com', '', 'Obcaecati debitis eu', '', '', 'Suscipit voluptatem ', '10456', '+1 (297) 106-99', 'kredi_karti', 'Labore eligendi vita', 'Sipariş Yola Çıktı', '0.00', '126.00', '15.00', '2022-03-09 16:29:06'),
(13, 1, 'Caldwell', 'Macias', 'dygasa@mailinator.com', '', 'Obcaecati debitis eu', '', '', 'Suscipit voluptatem ', '10456', '+1 (297) 106-99', 'kredi_karti', 'Labore eligendi vita', 'Yeni Sipariş', '0.00', '0.00', '15.00', '2022-03-09 16:36:12');

-- --------------------------------------------------------

--
-- Görünüm yapısı durumu `order_lists_view`
-- (Asıl görünüm için aşağıya bakın)
--
CREATE TABLE `order_lists_view` (
`id` int(11)
,`user_id` int(11)
,`addres` varchar(73)
,`phone` varchar(15)
,`order_status` enum('Yeni Sipariş','Sipariş Hazırlanıyor','Sipariş Yola Çıktı','Sipariş Teslim Edildi','Sipariş İptal Edildi','Sipariş Teslim Edilmedi','Sipariş İade Edildi')
,`created_at` timestamp
,`updated_at` timestamp
,`name_surname` varchar(255)
,`email` varchar(255)
,`order_price` decimal(42,2)
);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `order_products`
--

CREATE TABLE `order_products` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `user_id`, `product_id`, `product_price`, `count`) VALUES
(2, 12, 1, 1, '126.00', 6);

-- --------------------------------------------------------

--
-- Görünüm yapısı durumu `order_products_view`
-- (Asıl görünüm için aşağıya bakın)
--
CREATE TABLE `order_products_view` (
`id` int(11)
,`user_id` int(11)
,`product_id` int(11)
,`product_price` decimal(10,2)
,`count` int(11)
,`order_id` int(11)
,`title` varchar(200)
,`slug` varchar(200)
,`image_path` text
,`small_image` text
);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `order_variants`
--

CREATE TABLE `order_variants` (
  `id` int(11) NOT NULL,
  `order_product_id` int(11) NOT NULL,
  `variant_name` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `variant_value` varchar(100) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `order_variants`
--

INSERT INTO `order_variants` (`id`, `order_product_id`, `variant_name`, `variant_value`) VALUES
(3, 2, 'renk', 'beyaaz'),
(4, 2, 'beden', 'xs');

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
(1, 'Tsihrt', 'tsihrt', '621.00', '126.00', 113250, 'Non minima voluptatu', '2022-02-27 11:15:19');

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
(1, 1, 1, 1, '2022-02-27 11:15:20'),
(2, 1, 2, 1, '2022-02-27 11:15:20');

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
(1, 1, '7D5CC963-7C0E-4D0F-812D-AAAECD8EFDBD.jpg', 'small_7D5CC963-7C0E-4D0F-812D-AAAECD8EFDBD.jpg', 'uploads/2022/02', 1, '2022-02-27 11:15:19'),
(2, 1, '39E09108-3500-43B4-888F-59AD88E75F1D.png', 'small_39E09108-3500-43B4-888F-59AD88E75F1D.png', 'uploads/2022/02', 2, '2022-02-27 11:15:19'),
(3, 1, '60CD9992-C83E-4472-BC8D-C2F3F4E3BA7B.jpg', 'small_60CD9992-C83E-4472-BC8D-C2F3F4E3BA7B.jpg', 'uploads/2022/02', 3, '2022-02-27 11:15:20');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_variants`
--

CREATE TABLE `product_variants` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variant_name` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `variant_value` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `variant_name`, `variant_value`, `status`, `created_at`) VALUES
(1, 1, 'renk', 'mavi', 1, '2022-02-27 11:15:19'),
(2, 1, 'renk', 'lacivert', 1, '2022-02-27 11:15:19'),
(3, 1, 'renk', 'beyaaz', 1, '2022-02-27 11:15:19'),
(4, 1, 'beden', 'xs', 1, '2022-02-27 11:15:19'),
(5, 1, 'beden', 'sm', 1, '2022-02-27 11:15:19');

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
-- Görünüm yapısı `basket_products_view`
--
DROP TABLE IF EXISTS `basket_products_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=current_user SQL SECURITY DEFINER VIEW `basket_products_view`  AS  select `baskets`.`id` AS `id`,`baskets`.`count` AS `count`,`baskets`.`basket_status` AS `basket_status`,`baskets`.`user_id` AS `user_id`,`baskets`.`product_id` AS `product_id`,`products`.`title` AS `title`,`products`.`price` AS `price`,`products`.`sale_price` AS `sale_price`,`product_images`.`image_path` AS `image_path`,`product_images`.`small_image` AS `small_image` from ((`baskets` join `products` on((`products`.`id` = `baskets`.`product_id`))) join `product_images` on((`product_images`.`product_id` = `products`.`id`))) where (`product_images`.`image_order` = 1) ;

-- --------------------------------------------------------

--
-- Görünüm yapısı `basket_variants_view`
--
DROP TABLE IF EXISTS `basket_variants_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=current_user SQL SECURITY DEFINER VIEW `basket_variants_view`  AS  select `basket_variants`.`basket_id` AS `basket_id`,`product_variants`.`variant_name` AS `variant_name`,`product_variants`.`variant_value` AS `variant_value` from (`basket_variants` join `product_variants` on((`product_variants`.`id` = `basket_variants`.`variant_id`))) ;

-- --------------------------------------------------------

--
-- Görünüm yapısı `get_categories_view`
--
DROP TABLE IF EXISTS `get_categories_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=current_user SQL SECURITY DEFINER VIEW `get_categories_view`  AS  select `categories`.`id` AS `id`,`categories`.`title` AS `title`,`categories`.`slug` AS `slug`,`product_categories`.`product_id` AS `product_id`,`categories`.`status` AS `status` from (`product_categories` join `categories` on((`categories`.`id` = `product_categories`.`category_id`))) ;

-- --------------------------------------------------------

--
-- Görünüm yapısı `get_products_view`
--
DROP TABLE IF EXISTS `get_products_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=current_user SQL SECURITY DEFINER VIEW `get_products_view`  AS  select `products`.`id` AS `id`,`products`.`title` AS `title`,`products`.`slug` AS `slug`,`products`.`price` AS `price`,`products`.`sale_price` AS `sale_price`,`products`.`stock` AS `stock`,`products`.`description` AS `description`,`products`.`created_at` AS `created_at`,`products`.`updated_at` AS `updated_at`,`product_images`.`small_image` AS `small_image`,`product_images`.`image_path` AS `image_path`,`categories`.`id` AS `category_id`,`categories`.`title` AS `category_title`,`categories`.`slug` AS `category_slug` from (((`products` join `product_images` on((`product_images`.`product_id` = `products`.`id`))) left join `product_categories` on((`product_categories`.`product_id` = `products`.`id`))) left join `categories` on((`categories`.`id` = `product_categories`.`category_id`))) group by `products`.`id` ;

-- --------------------------------------------------------

--
-- Görünüm yapısı `order_lists_view`
--
DROP TABLE IF EXISTS `order_lists_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=current_user SQL SECURITY DEFINER VIEW `order_lists_view`  AS  select `orders`.`id` AS `id`,`orders`.`user_id` AS `user_id`,concat(`orders`.`country`,' / ',`orders`.`city`) AS `addres`,`orders`.`phone` AS `phone`,`orders`.`order_status` AS `order_status`,`orders`.`created_at` AS `created_at`,`orders`.`updated_at` AS `updated_at`,`users`.`name_surname` AS `name_surname`,`users`.`email` AS `email`,(select sum((`order_products`.`product_price` * `order_products`.`count`)) from `order_products` where (`order_products`.`order_id` = `orders`.`id`)) AS `order_price` from (`orders` join `users` on((`users`.`id` = `orders`.`user_id`))) ;

-- --------------------------------------------------------

--
-- Görünüm yapısı `order_products_view`
--
DROP TABLE IF EXISTS `order_products_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=current_user SQL SECURITY DEFINER VIEW `order_products_view`  AS  select `order_products`.`id` AS `id`,`order_products`.`user_id` AS `user_id`,`order_products`.`product_id` AS `product_id`,`order_products`.`product_price` AS `product_price`,`order_products`.`count` AS `count`,`order_products`.`order_id` AS `order_id`,`products`.`title` AS `title`,`products`.`slug` AS `slug`,`product_images`.`image_path` AS `image_path`,`product_images`.`small_image` AS `small_image` from ((`order_products` join `products` on((`products`.`id` = `order_products`.`product_id`))) join `product_images` on((`product_images`.`product_id` = `products`.`id`))) where (`product_images`.`image_order` = 1) ;

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
-- Tablo için indeksler `baskets`
--
ALTER TABLE `baskets`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `basket_variants`
--
ALTER TABLE `basket_variants`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `order_variants`
--
ALTER TABLE `order_variants`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Tablo için AUTO_INCREMENT değeri `baskets`
--
ALTER TABLE `baskets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `basket_variants`
--
ALTER TABLE `basket_variants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `order_variants`
--
ALTER TABLE `order_variants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
