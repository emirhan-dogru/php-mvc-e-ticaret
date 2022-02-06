-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 06 Şub 2022, 13:35:51
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
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
