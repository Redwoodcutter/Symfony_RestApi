-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3308
-- Üretim Zamanı: 12 Kas 2020, 20:06:25
-- Sunucu sürümü: 5.7.28
-- PHP Sürümü: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `supply_1`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20201109174609', '2020-11-10 10:59:35', 73),
('DoctrineMigrations\\Version20201110110006', '2020-11-10 11:00:14', 505);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name_id` int(11) NOT NULL,
  `order_code` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E52FFDEE51458601` (`company_name_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `order_post`
--

DROP TABLE IF EXISTS `order_post`;
CREATE TABLE IF NOT EXISTS `order_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_code` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_date` datetime NOT NULL,
  `company_id` int(11) NOT NULL,
  `company_name_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_177B569A51458601` (`company_name_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `order_post`
--

INSERT INTO `order_post` (`id`, `order_code`, `product_id`, `quantity`, `address`, `shipping_date`, `company_id`, `company_name_id`) VALUES
(4, 1, 1, 15, 'Example Street 1', '2020-11-05 21:00:00', 1, 13),
(5, 2, 1, 150, 'Example Street 2', '2020-11-15 21:00:00', 2, 13),
(6, 3, 2, 15, 'Example Street 1', '2020-11-25 21:00:00', 1, 13);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `cname`, `email`) VALUES
(13, 'Oguz', '1234', 'Z company', 'ok@ok.com');

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_E52FFDEE51458601` FOREIGN KEY (`company_name_id`) REFERENCES `user` (`id`);

--
-- Tablo kısıtlamaları `order_post`
--
ALTER TABLE `order_post`
  ADD CONSTRAINT `FK_177B569A51458601` FOREIGN KEY (`company_name_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
