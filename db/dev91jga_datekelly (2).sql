-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 11, 2022 at 12:16 PM
-- Server version: 5.7.23-23
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dev91jga_datekelly`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin_access` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0: Blocked, 1: Active',
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `is_admin_access`, `status`, `site_name`, `site_email`, `logo`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$10$/F5sLtXlciwghsyeJ3okn.vbA3maFC.g0O8E1LMwIwWLRQNzA5Fx6', 1, 1, 'Datekelly', 'support@datekelly.ro', 'images/site_logo.png', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35');

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `no_of_loves` bigint(20) NOT NULL,
  `is_verified` int(11) NOT NULL COMMENT '0: not verified, 1: verified',
  `phn_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT '0',
  `ladies_id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` int(11) NOT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `length` int(11) NOT NULL,
  `cup_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` int(11) NOT NULL COMMENT 'kilogram(kg)',
  `body_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `my_service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extraprice_for_escort` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `title`, `country_id`, `city_id`, `image`, `price`, `rating`, `no_of_loves`, `is_verified`, `phn_no`, `whatsapp`, `about`, `user_type`, `ladies_id`, `club_id`, `message`, `category`, `sex`, `age`, `length`, `cup_size`, `weight`, `body_size`, `descent`, `language`, `address`, `lat`, `lng`, `my_service`, `extraprice_for_escort`, `deleted_at`, `created_at`, `updated_at`) VALUES
(6, 'Sherlyn', 1, 1, 'upload/ladyAdvertisement/61ae1c8c155e721120602220461ae1c8c155f7.jpg', '300', 0, 1, 1, '7278727145', '7278727145', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It ha', 0, 1, 0, '', 0, 'lady', 24, 163, '+DD', 64, 'Slim', '', '1,2,3', 'Eternity Building, 1St Floor, Dn - 1 Eternity Building Kolkata, 1, Street Number 18, Bidhannagar, Kolkata, West Bengal 700091', '', '', 'private_visit', '120', NULL, '2021-11-02 07:00:07', '2022-04-05 14:54:04'),
(16, 'Valentine A.', 2, 2, 'upload/ladyAdvertisement/61ae077161fe721120612520161ae077161ff3.jpg', '12', 0, 0, 0, '3011198312', '3011198312', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 0, 12, 0, '', 0, 'lady', 25, 166, 'C', 57, 'Normal', 'East-European', '1,2,3', 'Kolkata India, Near Science City', '', '', 'private_visit', '10', NULL, '2021-12-03 06:37:46', '2022-01-25 09:38:35'),
(17, 'Carla', 2, 2, 'upload/port_folio_image/image/61b2123d8024121120902270961b2123d8024f.jpg', '250', 0, 2, 0, '1111122222', '1111122222', 'Hello Lovely Man!!! My name is Ella, I am very gentle and well-groomed girl! Mind-blowing sex with me will allow you to easy fulfill all at your fantasies and hidden desires, as I am a magnificent courtesan, dreaming of a passionate and courageous gentlem', 0, 13, 0, '', 0, 'lady', 18, 155, 'C', 52, 'Curvy', 'West-European', '1,2', 'This is dummy address', '', '', 'private_visit', '200', NULL, '2021-12-09 14:00:08', '2022-03-06 17:26:55'),
(19, 'amber', 4, 4, 'upload/port_folio_image/image/61c30274beb4521122210482061c30274beb55.jpeg', '29.99', 0, 3, 1, '9876543210', '9867543210', 'about me details', 0, 0, 5, '', 0, 'lady', 25, 177, 'B', 69, 'Slim', 'Asian', '1', 'HN road', '', '', 'private_visit', '49', '2022-01-16 21:00:23', '2021-12-22 05:18:20', '2022-01-25 09:38:35'),
(26, '', 0, 0, '', '', 0, 1, 0, '', '', '', 2, 0, 5, '', 0, '', 0, 0, '', 0, '', '', '2', '', '', '', 'escort', '0', NULL, '2021-12-30 02:16:50', '2022-01-25 09:38:35'),
(27, '', 0, 0, '', '', 0, 1, 0, '', '', '', 2, 0, 14, '', 0, '', 0, 0, '', 0, '', '', '1,3', '', '', '', '', '22.99', NULL, '2021-12-30 02:45:08', '2022-01-25 09:38:35'),
(28, '', 0, 0, '', '', 0, 1, 0, '', '', '', 2, 0, 16, '', 0, '', 0, 0, '', 0, '', '', '', '', '', '', '', '', NULL, '2022-01-04 06:35:55', '2022-01-25 09:38:35'),
(29, '', 0, 0, '', '', 0, 0, 0, '', '', '', 2, 0, 17, '', 0, '', 0, 0, '', 0, '', '', '', '', '', '', '', '', NULL, '2022-01-05 10:21:46', '2022-01-25 09:38:35'),
(30, '', 0, 0, '', '', 0, 0, 0, '', '', '', 2, 0, 18, '', 0, '', 0, 0, '', 0, '', '', '1,2', '', '', '', 'private_visit', '200', NULL, '2022-01-05 12:11:48', '2022-01-25 09:38:35'),
(31, 'Ziya', 5, 10, 'upload/port_folio_image/image/61d7edaa887f322010707371461d7edaa88802.jpg', '500', 0, 0, 0, '06632202', '', 'Hello my dear,\r\nCome and spend a sweet moment, in a discreet and refined setting, in order to live a sensual experience of which only I hold the secret. Being a distinguished woman, of very high class, cultured, sensual and naughty, I embody the dream of', 0, 0, 18, '', 0, 'lady', 27, 160, 'B', 55, 'Curvy', 'West-European', '1,2,3', 'Street:  Van Lennepweg 29\r\nCity:  Oosterbeek\r\nState/province/area:   Gelderland\r\nZip code  6862 BK', '', '', 'private_visit', '200', NULL, '2022-01-07 07:37:14', '2022-01-25 09:38:35'),
(32, 'Alisa', 5, 8, 'upload/port_folio_image/image/61d7f1930e67922010707535561d7f1930e688.jpg', '300', 0, 0, 0, '064593118', '064593118', 'Hello gentleman,\r\nMy name is Karla. I’m 24 years old, 53 kg, 165 cm.I have natural brown hair, deep-green eyes, a great sense of humor.I am a full-loving and very spontaneous, sensual and full of passion. I’m positive attitude that makes our meeting fun a', 0, 0, 18, '', 0, 'lady', 30, 175, 'B', 58, 'Curvy', 'American', '1,2,3', 'Street:  Vivaldipad 154\r\nCity:  Almere\r\nState/province/area:   Flevoland\r\nZip code  1323 AH', '', '', 'private_visit', '0', NULL, '2022-01-07 07:53:55', '2022-01-25 09:38:35'),
(33, 'Anubis', 5, 11, 'upload/port_folio_image/image/61d7f57009d9222010708102461d7f57009d9f.jpg', '900', 0, 0, 0, '065434771', '065434771', 'Kommen Sie und genießen Sie eine ganz neue Welt voller Spaß, Spaß und Aufregung mit Unterricht. Lass mich dich dorthin bringen. Ich bin eine erstklassige, schöne und edle Escort Lady in Salzburg.Suchen Sie ein schönes, sexy, elitäres und elegantes Escort ', 0, 0, 18, '', 0, 'lady', 32, 170, 'C', 58, 'Curvy', 'American', '1', 'Street:  Dominee Bartelsstraat 74\r\nCity:  Groenlo\r\nState/province/area:   Gelderland\r\nPhone number  06-54347710\r\nZip code  7141 ZW', '', '', 'private_visit', '300', NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(34, 'Chloe', 5, 10, 'upload/port_folio_image/image/61d7fb450785a22010708351761d7fb4507867.jpg', '300', 0, 0, 0, '065434771', '065434771', 'Hallo, Schatz!\r\n\r\nDas ist meine Welt!\r\n\r\nMein Name ist Chloe, ich habe 22 Jahre alt, die wirklich netten und sexy Mädchen nur für dich!\r\nIch bin sehr aufgeschlossen!\r\nIch liebe es, dich in dir zu spüren! Sie brauchen Pornostar? Ich bin da!\r\n\r\nIch bin froh', 0, 0, 18, '', 0, 'lady', 27, 166, 'B', 52, 'Curvy', 'East-European', '1,3', 'Street:  Dominee Bartelsstraat 74\r\nCity:  Groenlo\r\nState/province/area:   Gelderland\r\nZip code  7141 ZW', '', '', 'private_visit', '300', NULL, '2022-01-07 08:35:17', '2022-01-25 09:38:35'),
(36, '', 0, 0, '', '', 0, 0, 0, '', '', '', 2, 0, 19, '', 0, '', 0, 0, '', 0, '', '', '1,2', '', '', '', 'private_visit', '0', NULL, '2022-01-21 10:23:31', '2022-01-25 09:38:35'),
(38, 'Lily', 1, 1, 'upload/port_folio_image/image/61efe895d99c622012512095761efe895d99d0.jpg', '300', 0, 0, 0, '9998887776', '', 'Advertisement Text:Advertisement Text:Advertisement Text:Advertisement Text:', 0, 0, 17, '', 0, 'lady', 26, 150, 'C', 55, 'Curvy', '2,3,4', '1,2,3', 'Saltlake', '', '', 'private_visit', '300', NULL, '2022-01-25 12:09:57', '2022-01-25 12:09:57'),
(39, 'Karen', 1, 1, 'upload/port_folio_image/image/61efead0bcb5622012512192861efead0bcb63.jpg', '200', 0, 1, 0, '9998887776', '', 'Advertisement Text:Advertisement Text:Advertisement Text:Advertisement Text:Advertisement Text:Advertisement Text:', 0, 0, 17, '', 0, 'lady', 29, 0, 'C', 0, 'Curvy', '1', '1,2,3', 'Saltlake', '', '', 'private_visit', '100', NULL, '2022-01-25 12:19:28', '2022-03-06 17:26:32'),
(40, 'Sunny', 1, 1, 'upload/port_folio_image/image/61eff05df047622012512430961eff05df0484.jpg', '300', 0, 0, 0, '9998887776', '06800563', 'Advertisement Text:Advertisement Text:Advertisement Text:Advertisement Text:Advertisement Text:Advertisement Text:Advertisement Text:', 0, 0, 17, '', 0, 'lady', 28, 0, 'C', 0, 'Curvy', '1', '1,2,3', 'Saltlake', '', '', 'private_visit', '300', NULL, '2022-01-25 12:43:09', '2022-01-25 12:43:10'),
(41, 'Zivame', 1, 1, 'upload/port_folio_image/image/61f003c5f417922012502055761f003c5f4186.jpg', '300', 0, 0, 0, '9998887776', '06800563', 'Advertisement Text:Advertisement Text:Advertisement Text:Advertisement Text:Advertisement Text:Advertisement Text:', 0, 0, 17, '', 0, 'lady', 28, 160, 'C', 55, 'Curvy', '4', '1,2,3', 'Saltlake', '', '', 'private_visit', '200', NULL, '2022-01-25 14:05:57', '2022-01-25 14:05:58'),
(42, '', 0, 0, '', '', 0, 0, 0, '', '', '', 2, 0, 22, '', 0, '', 0, 0, '', 0, '', '', '', '', '', '', '', '', NULL, '2022-02-22 00:40:05', '2022-02-22 00:40:05'),
(43, 'Yass', 1, 1, 'upload/port_folio_image/image/62148bb715b8c22022207073562148bb715b99.jpg', '12', 0, 0, 0, '1234567890', '1234567890', '', 0, 21, 0, '', 0, 'lady', 18, 0, 'A', 0, 'Curvy', '2', '1,2,3', 'Kolkata', '', '', 'private_visit', '1', '2022-02-23 23:06:36', '2022-02-22 01:37:35', '2022-02-23 23:06:36');

-- --------------------------------------------------------

--
-- Table structure for table `advertisements_images`
--

CREATE TABLE `advertisements_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advertisement_id` int(11) NOT NULL,
  `img` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1: Image, 2 Video',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisements_images`
--

INSERT INTO `advertisements_images` (`id`, `advertisement_id`, `img`, `type`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'upload/ladyAdvertisement/6180e88a637b82111020728106180e88a637c2.jpg', 'Image', '2021-12-06 14:29:19', '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(2, 1, 'upload/ladyAdvertisement/6180e88a63a042111020728106180e88a63a0a.jpg', 'Image', '2021-12-06 14:29:26', '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(3, 1, 'upload/ladyAdvertisement/6180e88a63b022111020728106180e88a63b05.jpeg', 'Image', '2021-12-06 14:29:24', '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(4, 1, 'upload/ladyAdvertisement/6180e88a63c3d2111020728106180e88a63c42.jpg', 'Image', '2021-12-06 14:29:29', '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(5, 1, 'upload/ladyAdvertisement/6180e88a63df32111020728106180e88a63dfd.jpg', 'Image', '2021-12-06 14:29:32', '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(6, 2, 'upload/ladyAdvertisement/6180e88a63df32111020728106180e88a63dfd.jpg', 'Image', '2021-12-06 14:30:40', '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(7, 2, 'upload/ladyAdvertisement/6180e88a63c3d2111020728106180e88a63c42.jpg', 'Image', '2021-12-06 14:30:45', '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(8, 2, 'upload/ladyAdvertisement/6180e88a63b022111020728106180e88a63b05.jpeg', 'Image', NULL, '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(9, 2, 'upload/ladyAdvertisement/6180e88a63a042111020728106180e88a63a0a.jpg', 'Image', NULL, '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(10, 2, 'upload/ladyAdvertisement/6180e88a637b82111020728106180e88a637c2.jpg', 'Image', '2021-12-06 14:30:48', '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(11, 3, 'upload/ladyAdvertisement/6180e88a637b82111020728106180e88a637c2.jpg', 'Image', NULL, '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(12, 3, 'upload/ladyAdvertisement/6180e88a63a042111020728106180e88a63a0a.jpg', 'Image', NULL, '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(13, 3, 'upload/ladyAdvertisement/6180e88a63b022111020728106180e88a63b05.jpeg', 'Image', NULL, '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(14, 3, 'upload/ladyAdvertisement/6180e88a63c3d2111020728106180e88a63c42.jpg', 'Image', NULL, '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(15, 3, 'upload/ladyAdvertisement/6180e88a63df32111020728106180e88a63dfd.jpg', 'Image', NULL, '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(16, 4, 'upload/ladyAdvertisement/6180e88a63df32111020728106180e88a63dfd.jpg', 'Image', NULL, '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(17, 4, 'upload/ladyAdvertisement/6180e88a63c3d2111020728106180e88a63c42.jpg', 'Image', NULL, '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(18, 4, 'upload/ladyAdvertisement/6180e88a63b022111020728106180e88a63b05.jpeg', 'Image', NULL, '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(19, 4, 'upload/ladyAdvertisement/6180e88a63a042111020728106180e88a63a0a.jpg', 'Image', NULL, '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(20, 4, 'upload/ladyAdvertisement/6180e88a637b82111020728106180e88a637c2.jpg', 'Image', NULL, '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(21, 5, 'upload/ladyAdvertisement/6180e88a637b82111020728106180e88a637c2.jpg', 'Image', '2021-12-06 14:24:44', '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(22, 5, 'upload/ladyAdvertisement/6180e88a63a042111020728106180e88a63a0a.jpg', 'Image', '2021-12-06 14:24:48', '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(23, 5, 'upload/ladyAdvertisement/6180e88a63b022111020728106180e88a63b05.jpeg', 'Image', '2021-12-06 14:24:52', '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(24, 5, 'upload/ladyAdvertisement/6180e88a63c3d2111020728106180e88a63c42.jpg', 'Image', '2021-12-06 14:25:01', '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(25, 5, 'upload/ladyAdvertisement/6180e88a63df32111020728106180e88a63dfd.jpg', 'Image', '2021-12-06 14:25:04', '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(26, 6, 'upload/ladyAdvertisement/61812f4f10f2e21110212300761812f4f10f35.jpg', 'Image', '2021-12-06 13:34:20', '2021-11-02 12:30:07', '2022-01-25 09:38:35'),
(27, 6, 'upload/ladyAdvertisement/61812f4f110bb21110212300761812f4f110bf.jpeg', 'Image', '2021-12-06 13:34:23', '2021-11-02 12:30:07', '2022-01-25 09:38:35'),
(28, 6, 'upload/ladyAdvertisement/61812f4f111af21110212300761812f4f111b2.jpg', 'Image', '2021-12-06 13:34:25', '2021-11-02 12:30:07', '2022-01-25 09:38:35'),
(29, 6, 'upload/ladyAdvertisement/61812f4f112a221110212300761812f4f112a5.jpeg', 'Image', '2021-12-06 13:34:28', '2021-11-02 12:30:07', '2022-01-25 09:38:35'),
(30, 6, 'upload/ladyAdvertisement/61812f4f115e621110212300761812f4f115ee.jpeg', 'Image', '2021-12-06 13:34:41', '2021-11-02 12:30:07', '2022-01-25 09:38:35'),
(31, 6, 'upload/ladyAdvertisement/61812f4f1174821110212300761812f4f1174c.jpg', 'Image', '2021-12-06 13:34:31', '2021-11-02 12:30:07', '2022-01-25 09:38:35'),
(32, 6, 'upload/ladyAdvertisement/61812f4f118a721110212300761812f4f118ae.webp', 'Image', '2021-12-06 13:34:35', '2021-11-02 12:30:07', '2022-01-25 09:38:35'),
(33, 6, 'upload/ladyAdvertisement/61812f4f11aa021110212300761812f4f11aa8.jpg', 'Image', '2021-12-06 13:34:37', '2021-11-02 12:30:07', '2022-01-25 09:38:35'),
(34, 7, 'upload/ladyAdvertisement/6192211da57bd2111150858056192211da57c5.png', 'Image', NULL, '2021-11-15 08:58:05', '2022-01-25 09:38:35'),
(35, 15, 'upload/ladyAdvertisement/61a9b4b94d8d221120306100161a9b4b94d8e4.jpg', 'Image', '2021-12-06 12:32:16', '2021-12-03 06:10:01', '2022-01-25 09:38:35'),
(36, 15, 'upload/ladyAdvertisement/61a9b4b9563dc21120306100161a9b4b956540.JPG', 'Image', '2021-12-06 12:32:50', '2021-12-03 06:10:01', '2022-01-25 09:38:35'),
(37, 15, 'upload/ladyAdvertisement/61a9b4b95b2c121120306100161a9b4b95b3e8.webp', 'Image', '2021-12-06 12:32:19', '2021-12-03 06:10:01', '2022-01-25 09:38:35'),
(38, 15, 'upload/ladyAdvertisement/61a9b4b95d92f21120306100161a9b4b95d940.jpg', 'Image', '2021-12-06 12:32:23', '2021-12-03 06:10:01', '2022-01-25 09:38:35'),
(39, 15, 'upload/ladyAdvertisement/61a9b4b95eba421120306100161a9b4b95ebb4.jpg', 'Image', '2021-12-06 12:32:27', '2021-12-03 06:10:01', '2022-01-25 09:38:35'),
(40, 15, 'upload/ladyAdvertisement/61a9b4b95ed8721120306100161a9b4b95ed91.jpg', 'Image', '2021-12-06 12:32:30', '2021-12-03 06:10:01', '2022-01-25 09:38:35'),
(41, 15, 'upload/ladyAdvertisement/61a9b4b95ef4d21120306100161a9b4b95ef54.jpg', 'Image', '2021-12-06 12:32:33', '2021-12-03 06:10:01', '2022-01-25 09:38:35'),
(42, 15, 'upload/ladyAdvertisement/61a9b4b9615fd21120306100161a9b4b96160c.jpg', 'Image', '2021-12-06 12:32:36', '2021-12-03 06:10:01', '2022-01-25 09:38:35'),
(43, 15, 'upload/ladyAdvertisement/61a9b4b96193c21120306100161a9b4b961947.jpg', 'Image', '2021-12-06 12:32:39', '2021-12-03 06:10:01', '2022-01-25 09:38:35'),
(44, 15, 'upload/ladyAdvertisement/61a9b4b961e6a21120306100161a9b4b961e76.jpg', 'Image', '2021-12-06 12:32:41', '2021-12-03 06:10:01', '2022-01-25 09:38:35'),
(45, 16, 'upload/ladyAdvertisement/61a9bb3ae9a4e21120306374661a9bb3ae9a5a.jpg', 'Image', '2021-12-06 12:51:02', '2021-12-03 06:37:46', '2022-01-25 09:38:35'),
(46, 16, 'upload/ladyAdvertisement/61a9bb3ae9e7721120306374661a9bb3ae9e7f.jpg', 'Image', '2021-12-06 12:51:07', '2021-12-03 06:37:46', '2022-01-25 09:38:35'),
(47, 16, 'upload/ladyAdvertisement/61a9bb3aea10121120306374661a9bb3aea11a.jpg', 'Image', '2021-12-06 12:51:05', '2021-12-03 06:37:46', '2022-01-25 09:38:35'),
(48, 16, 'upload/ladyAdvertisement/61a9bb3aea44321120306374661a9bb3aea449.jpg', 'Image', '2021-12-06 12:51:13', '2021-12-03 06:37:46', '2022-01-25 09:38:35'),
(49, 16, 'upload/ladyAdvertisement/61a9bb3aea60021120306374661a9bb3aea605.jpg', 'Image', '2021-12-06 12:51:18', '2021-12-03 06:37:46', '2022-01-25 09:38:35'),
(50, 16, 'upload/ladyAdvertisement/61a9bb3aea7e621120306374661a9bb3aea7eb.jpg', 'Image', '2021-12-06 12:51:16', '2021-12-03 06:37:46', '2022-01-25 09:38:35'),
(51, 16, 'upload/ladyAdvertisement/61a9bb3aea95921120306374661a9bb3aea95d.jpg', 'Image', '2021-12-06 12:51:24', '2021-12-03 06:37:46', '2022-01-25 09:38:35'),
(52, 16, 'upload/ladyAdvertisement/61a9bb3aeaae721120306374661a9bb3aeaaeb.jpg', 'Image', '2021-12-06 12:51:20', '2021-12-03 06:37:46', '2022-01-25 09:38:35'),
(53, 16, 'upload/ladyAdvertisement/61a9bb3aeacc721120306374661a9bb3aeaccc.jpg', 'Image', '2021-12-06 12:51:30', '2021-12-03 06:37:46', '2022-01-25 09:38:35'),
(54, 16, 'upload/ladyAdvertisement/61a9bb3aeae9621120306374661a9bb3aeae9b.jpg', 'Image', '2021-12-06 12:51:28', '2021-12-03 06:37:46', '2022-01-25 09:38:35'),
(55, 5, 'upload/ladyAdvertisement/61aa0246625fa21120311405461aa024662603.jpg', 'Image', '2021-12-06 14:25:07', '2021-12-03 11:40:54', '2022-01-25 09:38:35'),
(56, 15, 'upload/ladyAdvertisement/61ae0313e1dd021120612332361ae0313e1de1.jpg', 'Image', NULL, '2021-12-06 12:33:23', '2022-01-25 09:38:35'),
(57, 15, 'upload/ladyAdvertisement/61ae0313e232821120612332361ae0313e2336.jpg', 'Image', NULL, '2021-12-06 12:33:23', '2022-01-25 09:38:35'),
(58, 15, 'upload/ladyAdvertisement/61ae0313e274921120612332361ae0313e2753.jpg', 'Image', NULL, '2021-12-06 12:33:23', '2022-01-25 09:38:35'),
(59, 15, 'upload/ladyAdvertisement/61ae0313e2a2e21120612332361ae0313e2a35.jpg', 'Image', NULL, '2021-12-06 12:33:23', '2022-01-25 09:38:35'),
(60, 15, 'upload/ladyAdvertisement/61ae0313e2d7021120612332361ae0313e2d79.jpg', 'Image', NULL, '2021-12-06 12:33:23', '2022-01-25 09:38:35'),
(61, 15, 'upload/ladyAdvertisement/61ae0313e301f21120612332361ae0313e3028.jpg', 'Image', NULL, '2021-12-06 12:33:23', '2022-01-25 09:38:35'),
(62, 15, 'upload/ladyAdvertisement/61ae0313e323521120612332361ae0313e323b.jpg', 'Image', NULL, '2021-12-06 12:33:23', '2022-01-25 09:38:35'),
(63, 16, 'upload/ladyAdvertisement/61ae077161bee21120612520161ae077161bfd.jpg', 'Image', NULL, '2021-12-06 12:52:01', '2022-01-25 09:38:35'),
(64, 16, 'upload/ladyAdvertisement/61ae077161fe721120612520161ae077161ff3.jpg', 'Image', NULL, '2021-12-06 12:52:01', '2022-01-25 09:38:35'),
(65, 16, 'upload/ladyAdvertisement/61ae0771661e521120612520161ae0771661f4.jpg', 'Image', NULL, '2021-12-06 12:52:01', '2022-01-25 09:38:35'),
(66, 16, 'upload/ladyAdvertisement/61ae077167e6e21120612520161ae077167e7d.jpg', 'Image', NULL, '2021-12-06 12:52:01', '2022-01-25 09:38:35'),
(67, 16, 'upload/ladyAdvertisement/61ae0771683c421120612520161ae0771683d0.jpg', 'Image', NULL, '2021-12-06 12:52:01', '2022-01-25 09:38:35'),
(68, 16, 'upload/ladyAdvertisement/61ae0771691dd21120612520161ae0771691ec.jpg', 'Image', NULL, '2021-12-06 12:52:01', '2022-01-25 09:38:35'),
(69, 16, 'upload/ladyAdvertisement/61ae07716985221120612520161ae07716985e.jpg', 'Image', NULL, '2021-12-06 12:52:01', '2022-01-25 09:38:35'),
(70, 16, 'upload/ladyAdvertisement/61ae077169e0f21120612520161ae077169e18.jpg', 'Image', NULL, '2021-12-06 12:52:01', '2022-01-25 09:38:35'),
(71, 6, 'upload/ladyAdvertisement/61ae1c8c106a021120602220461ae1c8c106ae.jpg', 'Image', NULL, '2021-12-06 14:22:04', '2022-01-25 09:38:35'),
(72, 6, 'upload/ladyAdvertisement/61ae1c8c1141821120602220461ae1c8c11428.jpg', 'Image', NULL, '2021-12-06 14:22:04', '2022-01-25 09:38:35'),
(73, 6, 'upload/ladyAdvertisement/61ae1c8c11e4621120602220461ae1c8c11e55.jpg', 'Image', NULL, '2021-12-06 14:22:04', '2022-01-25 09:38:35'),
(74, 6, 'upload/ladyAdvertisement/61ae1c8c1289b21120602220461ae1c8c128aa.jpg', 'Image', NULL, '2021-12-06 14:22:04', '2022-01-25 09:38:35'),
(75, 6, 'upload/ladyAdvertisement/61ae1c8c133ad21120602220461ae1c8c133bc.jpg', 'Image', NULL, '2021-12-06 14:22:04', '2022-01-25 09:38:35'),
(76, 6, 'upload/ladyAdvertisement/61ae1c8c14a8b21120602220461ae1c8c14a9b.jpg', 'Image', NULL, '2021-12-06 14:22:04', '2022-01-25 09:38:35'),
(77, 6, 'upload/ladyAdvertisement/61ae1c8c155e721120602220461ae1c8c155f7.jpg', 'Image', NULL, '2021-12-06 14:22:04', '2022-01-25 09:38:35'),
(78, 5, 'upload/ladyAdvertisement/61ae1d899721521120602261761ae1d8997226.jpg', 'Image', NULL, '2021-12-06 14:26:17', '2022-01-25 09:38:35'),
(79, 5, 'upload/ladyAdvertisement/61ae1d899762521120602261761ae1d8997632.jpg', 'Image', NULL, '2021-12-06 14:26:17', '2022-01-25 09:38:35'),
(80, 5, 'upload/ladyAdvertisement/61ae1d89978e521120602261761ae1d89978ef.jpg', 'Image', NULL, '2021-12-06 14:26:17', '2022-01-25 09:38:35'),
(81, 5, 'upload/ladyAdvertisement/61ae1d8997b4421120602261761ae1d8997b4c.jpg', 'Image', NULL, '2021-12-06 14:26:17', '2022-01-25 09:38:35'),
(82, 5, 'upload/ladyAdvertisement/61ae1d8997db521120602261761ae1d8997dbc.jpg', 'Image', NULL, '2021-12-06 14:26:17', '2022-01-25 09:38:35'),
(83, 5, 'upload/ladyAdvertisement/61ae1d8997fff21120602261761ae1d8998006.jpg', 'Image', NULL, '2021-12-06 14:26:17', '2022-01-25 09:38:35'),
(84, 5, 'upload/ladyAdvertisement/61ae1d899827a21120602261761ae1d8998281.jpg', 'Image', NULL, '2021-12-06 14:26:17', '2022-01-25 09:38:35'),
(85, 5, 'upload/ladyAdvertisement/61ae1d899850121120602261761ae1d8998508.jpg', 'Image', '2021-12-06 14:35:50', '2021-12-06 14:26:17', '2022-01-25 09:38:35'),
(86, 1, 'upload/ladyAdvertisement/61ae1e5f7fb9421120602295161ae1e5f7fb9f.jpg', 'Image', '2021-12-06 14:32:48', '2021-12-06 14:29:51', '2022-01-25 09:38:35'),
(87, 1, 'upload/ladyAdvertisement/61ae1e5f7ffcc21120602295161ae1e5f7ffd4.jpg', 'Image', '2021-12-06 14:32:51', '2021-12-06 14:29:51', '2022-01-25 09:38:35'),
(88, 1, 'upload/ladyAdvertisement/61ae1e5f802dd21120602295161ae1e5f802e4.jpg', 'Image', '2021-12-06 14:32:53', '2021-12-06 14:29:51', '2022-01-25 09:38:35'),
(89, 1, 'upload/ladyAdvertisement/61ae1e5f8058721120602295161ae1e5f8058c.jpg', 'Image', '2021-12-06 14:32:56', '2021-12-06 14:29:51', '2022-01-25 09:38:35'),
(90, 2, 'upload/ladyAdvertisement/61ae1ebe8ebb821120602312661ae1ebe8ebc8.jpg', 'Image', NULL, '2021-12-06 14:31:26', '2022-01-25 09:38:35'),
(91, 2, 'upload/ladyAdvertisement/61ae1ebe8f8e521120602312661ae1ebe8f8f6.jpg', 'Image', NULL, '2021-12-06 14:31:26', '2022-01-25 09:38:35'),
(92, 2, 'upload/ladyAdvertisement/61ae1ebe8fddf21120602312661ae1ebe8fdeb.jpg', 'Image', NULL, '2021-12-06 14:31:26', '2022-01-25 09:38:35'),
(93, 2, 'upload/ladyAdvertisement/61ae1ebe90d1221120602312661ae1ebe90d20.jpg', 'Image', NULL, '2021-12-06 14:31:26', '2022-01-25 09:38:35'),
(94, 1, 'upload/ladyAdvertisement/61ae1f436e78f21120602333961ae1f436e79f.jpg', 'Image', NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35'),
(95, 1, 'upload/ladyAdvertisement/61ae1f436f1e521120602333961ae1f436f1f2.jpg', 'Image', NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35'),
(96, 1, 'upload/ladyAdvertisement/61ae1f436fce621120602333961ae1f436fcf6.jpg', 'Image', NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35'),
(97, 1, 'upload/ladyAdvertisement/61ae1f436ff2f21120602333961ae1f436ff39.jpg', 'Image', NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35'),
(98, 17, 'upload/ladyAdvertisement/61b20be8afc3c21120902000861b20be8afc4f.jpg', 'Image', NULL, '2021-12-09 14:00:08', '2022-01-25 09:38:35'),
(99, 17, 'upload/ladyAdvertisement/61b20be8b012021120902000861b20be8b012f.jpg', 'Image', NULL, '2021-12-09 14:00:08', '2022-01-25 09:38:35'),
(100, 17, 'upload/ladyAdvertisement/61b20be8b053b21120902000861b20be8b0548.jpg', 'Image', NULL, '2021-12-09 14:00:08', '2022-01-25 09:38:35'),
(101, 17, 'upload/ladyAdvertisement/61b20be8b08d421120902000861b20be8b08de.jpg', 'Image', NULL, '2021-12-09 14:00:08', '2022-01-25 09:38:35'),
(102, 17, 'upload/ladyAdvertisement/61b20be8b1b5621120902000861b20be8b1b64.jpg', 'Image', NULL, '2021-12-09 14:00:08', '2022-01-25 09:38:35'),
(103, 17, 'upload/ladyAdvertisement/61b20be8b1f0d21120902000861b20be8b1f18.jpg', 'Image', '2021-12-09 14:09:28', '2021-12-09 14:00:08', '2022-01-25 09:38:35'),
(104, 17, 'upload/ladyAdvertisement/61b20be8b226021120902000861b20be8b2269.jpg', 'Image', '2021-12-09 14:09:17', '2021-12-09 14:00:08', '2022-01-25 09:38:35'),
(105, 17, 'upload/ladyAdvertisement/61b20be8b256821120902000861b20be8b256f.jpg', 'Image', '2021-12-09 14:09:07', '2021-12-09 14:00:08', '2022-01-25 09:38:35'),
(106, 18, 'upload/ladyAdvertisement/61b347136e05021121012245161b347136e059.jpg', 'Image', NULL, '2021-12-10 12:24:51', '2022-01-25 09:38:35'),
(107, 18, 'upload/ladyAdvertisement/61b347136e23921121012245161b347136e23f.jpg', 'Image', NULL, '2021-12-10 12:24:51', '2022-01-25 09:38:35'),
(108, 18, 'upload/ladyAdvertisement/61b347136e38c21121012245161b347136e391.jpg', 'Image', NULL, '2021-12-10 12:24:51', '2022-01-25 09:38:35'),
(109, 18, 'upload/ladyAdvertisement/61b347136e4f021121012245161b347136e4f5.jpg', 'Image', NULL, '2021-12-10 12:24:51', '2022-01-25 09:38:35'),
(110, 19, 'upload/ladyAdvertisement/61c30274bf59721122210482061c30274bf5a7.jpeg', 'Image', NULL, '2021-12-22 10:48:20', '2022-01-25 09:38:35'),
(111, 19, 'upload/ladyAdvertisement/61c30274bf6d821122210482061c30274bf6e1.jpeg', 'Image', NULL, '2021-12-22 10:48:20', '2022-01-25 09:38:35'),
(112, 19, 'upload/ladyAdvertisement/61c99312c581a21122710185861c99312c582c.jpeg', 'Image', NULL, '2021-12-27 10:18:58', '2022-01-25 09:38:35'),
(113, 19, 'upload/ladyAdvertisement/61c99312c598321122710185861c99312c598e.jpeg', 'Image', NULL, '2021-12-27 10:18:58', '2022-01-25 09:38:35'),
(114, 19, 'upload/ladyAdvertisement/61c99312c5a4621122710185861c99312c5a4e.jpg', 'Image', NULL, '2021-12-27 10:18:58', '2022-01-25 09:38:35'),
(115, 19, 'upload/ladyAdvertisement/61c99312c5af121122710185861c99312c5af8.jpg', 'Image', NULL, '2021-12-27 10:18:58', '2022-01-25 09:38:35'),
(116, 20, 'upload/ladyAdvertisement/61caa51d7d60b21122805481361caa51d7d61f.jpeg', 'Image', NULL, '2021-12-28 05:48:13', '2022-01-25 09:38:35'),
(117, 20, 'upload/ladyAdvertisement/61caa51d7d76821122805481361caa51d7d772.jpeg', 'Image', NULL, '2021-12-28 05:48:13', '2022-01-25 09:38:35'),
(118, 20, 'upload/ladyAdvertisement/61caa51d7d81121122805481361caa51d7d818.jpeg', 'Image', NULL, '2021-12-28 05:48:13', '2022-01-25 09:38:35'),
(119, 21, 'upload/ladyAdvertisement/61caa8f441d8521122806043661caa8f441d89.jpeg', 'Image', NULL, '2021-12-28 06:04:36', '2022-01-25 09:38:35'),
(120, 21, 'upload/ladyAdvertisement/61caa8f441de121122806043661caa8f441de3.jpeg', 'Image', NULL, '2021-12-28 06:04:36', '2022-01-25 09:38:35'),
(121, 21, 'upload/ladyAdvertisement/61caa8f441e2421122806043661caa8f441e26.jpeg', 'Image', NULL, '2021-12-28 06:04:36', '2022-01-25 09:38:35'),
(122, 21, 'upload/ladyAdvertisement/61caa8f441e4a21122806043661caa8f441e4b.jpeg', 'Image', NULL, '2021-12-28 06:04:36', '2022-01-25 09:38:35'),
(123, 21, 'upload/ladyAdvertisement/61caa8f441e6e21122806043661caa8f441e6f.jpg', 'Image', NULL, '2021-12-28 06:04:36', '2022-01-25 09:38:35'),
(124, 21, 'upload/ladyAdvertisement/61caa8f441e9321122806043661caa8f441e94.jpg', 'Image', NULL, '2021-12-28 06:04:36', '2022-01-25 09:38:35'),
(125, 22, 'upload/ladyAdvertisement/61cc6fb6351e921122902245461cc6fb6351fa.jpeg', 'Image', '2021-12-30 01:00:14', '2021-12-29 14:24:54', '2022-01-25 09:38:35'),
(126, 22, 'upload/ladyAdvertisement/61cc6fb63534f21122902245461cc6fb635359.jpeg', 'Image', NULL, '2021-12-29 14:24:54', '2022-01-25 09:38:35'),
(127, 22, 'upload/ladyAdvertisement/61cc6fb63541c21122902245461cc6fb635424.jpeg', 'Image', NULL, '2021-12-29 14:24:54', '2022-01-25 09:38:35'),
(128, 22, 'upload/ladyAdvertisement/61cc6fb6355f621122902245461cc6fb635604.jpeg', 'Image', '2021-12-30 01:00:19', '2021-12-29 14:24:54', '2022-01-25 09:38:35'),
(129, 22, 'upload/ladyAdvertisement/61cc6fb6356c721122902245461cc6fb6356cf.jpg', 'Image', NULL, '2021-12-29 14:24:54', '2022-01-25 09:38:35'),
(130, 22, 'upload/ladyAdvertisement/61cc6fb63577721122902245461cc6fb63577e.jpg', 'Image', NULL, '2021-12-29 14:24:54', '2022-01-25 09:38:35'),
(131, 26, 'upload/ladyAdvertisement/61cd64bd408a621123007502161cd64bd408ac.jpeg', 'Image', NULL, '2021-12-30 07:50:21', '2022-01-25 09:38:35'),
(132, 26, 'upload/ladyAdvertisement/61cd64bd4090221123007502161cd64bd40904.jpg', 'Image', NULL, '2021-12-30 07:50:21', '2022-01-25 09:38:35'),
(133, 26, 'upload/ladyAdvertisement/61cd64bd4092621123007502161cd64bd40928.jpg', 'Image', NULL, '2021-12-30 07:50:21', '2022-01-25 09:38:35'),
(134, 26, 'upload/ladyAdvertisement/61cd64d37a1b721123007504361cd64d37a1bd.jpeg', 'Image', NULL, '2021-12-30 07:50:43', '2022-01-25 09:38:35'),
(135, 30, 'upload/ladyAdvertisement/61d58b9ac852e22010512141861d58b9ac853d.jpg', 'Image', '2022-01-05 12:16:27', '2022-01-05 12:14:18', '2022-01-25 09:38:35'),
(136, 30, 'upload/ladyAdvertisement/61d58b9ad76ae22010512141861d58b9ad76be.jpg', 'Image', '2022-01-05 12:16:24', '2022-01-05 12:14:18', '2022-01-25 09:38:35'),
(137, 30, 'upload/ladyAdvertisement/61d58b9ad78a922010512141861d58b9ad78b2.jpg', 'Image', '2022-01-05 12:16:14', '2022-01-05 12:14:18', '2022-01-25 09:38:35'),
(138, 30, 'upload/ladyAdvertisement/61d58b9ad813e22010512141861d58b9ad8146.jpg', 'Image', '2022-01-05 12:16:17', '2022-01-05 12:14:18', '2022-01-25 09:38:35'),
(139, 30, 'upload/ladyAdvertisement/61d58b9ad911922010512141861d58b9ad9127.jpg', 'Image', '2022-01-05 12:16:20', '2022-01-05 12:14:18', '2022-01-25 09:38:35'),
(140, 30, 'upload/ladyAdvertisement/61d58ca17b8f522010512184161d58ca17b902.jpg', 'Image', NULL, '2022-01-05 12:18:41', '2022-01-25 09:38:35'),
(141, 30, 'upload/ladyAdvertisement/61d58ca17bbaf22010512184161d58ca17bbba.jpg', 'Image', NULL, '2022-01-05 12:18:41', '2022-01-25 09:38:35'),
(142, 30, 'upload/ladyAdvertisement/61d58ca17bd4722010512184161d58ca17bd4e.jpg', 'Image', NULL, '2022-01-05 12:18:41', '2022-01-25 09:38:35'),
(143, 30, 'upload/ladyAdvertisement/61d58ca17beef22010512184161d58ca17bef6.jpg', 'Image', NULL, '2022-01-05 12:18:41', '2022-01-25 09:38:35'),
(144, 31, 'upload/ladyAdvertisement/61d7edaa9c5fb22010707371461d7edaa9c60b.jpg', 'Image', NULL, '2022-01-07 07:37:14', '2022-01-25 09:38:35'),
(145, 31, 'upload/ladyAdvertisement/61d7edaa9c93522010707371461d7edaa9c942.jpg', 'Image', NULL, '2022-01-07 07:37:14', '2022-01-25 09:38:35'),
(146, 31, 'upload/ladyAdvertisement/61d7edaaa1ef322010707371461d7edaaa1f02.jpg', 'Image', NULL, '2022-01-07 07:37:14', '2022-01-25 09:38:35'),
(147, 31, 'upload/ladyAdvertisement/61d7edaaa214022010707371461d7edaaa2149.jpg', 'Image', NULL, '2022-01-07 07:37:14', '2022-01-25 09:38:35'),
(148, 31, 'upload/ladyAdvertisement/61d7edaaa231822010707371461d7edaaa231e.jpg', 'Image', NULL, '2022-01-07 07:37:14', '2022-01-25 09:38:35'),
(149, 32, 'upload/ladyAdvertisement/61d7f1931385f22010707535561d7f1931386e.jpg', 'Image', NULL, '2022-01-07 07:53:55', '2022-01-25 09:38:35'),
(150, 32, 'upload/ladyAdvertisement/61d7f1931486422010707535561d7f19314873.jpg', 'Image', NULL, '2022-01-07 07:53:55', '2022-01-25 09:38:35'),
(151, 32, 'upload/ladyAdvertisement/61d7f19314bf922010707535561d7f19314c05.jpg', 'Image', NULL, '2022-01-07 07:53:55', '2022-01-25 09:38:35'),
(152, 32, 'upload/ladyAdvertisement/61d7f19315d6522010707535561d7f19315d72.jpg', 'Image', NULL, '2022-01-07 07:53:55', '2022-01-25 09:38:35'),
(153, 32, 'upload/ladyAdvertisement/61d7f1931638822010707535561d7f19316395.jpg', 'Image', NULL, '2022-01-07 07:53:55', '2022-01-25 09:38:35'),
(154, 32, 'upload/ladyAdvertisement/61d7f193167ac22010707535561d7f193167b8.jpg', 'Image', NULL, '2022-01-07 07:53:55', '2022-01-25 09:38:35'),
(155, 33, 'upload/ladyAdvertisement/61d7f5700b6e222010708102461d7f5700b6f0.jpg', 'Image', NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(156, 33, 'upload/ladyAdvertisement/61d7f5700c0cf22010708102461d7f5700c0de.jpg', 'Image', NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(157, 33, 'upload/ladyAdvertisement/61d7f5700d40a22010708102461d7f5700d419.jpg', 'Image', NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(158, 33, 'upload/ladyAdvertisement/61d7f5700de3e22010708102461d7f5700de4d.jpg', 'Image', NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(159, 33, 'upload/ladyAdvertisement/61d7f5700eadd22010708102461d7f5700eaf7.jpg', 'Image', NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(160, 34, 'upload/ladyAdvertisement/61d7fb450891b22010708351761d7fb4508929.jpg', 'Image', NULL, '2022-01-07 08:35:17', '2022-01-25 09:38:35'),
(161, 34, 'upload/ladyAdvertisement/61d7fb4508d5422010708351761d7fb4508d60.jpg', 'Image', NULL, '2022-01-07 08:35:17', '2022-01-25 09:38:35'),
(162, 34, 'upload/ladyAdvertisement/61d7fb450906422010708351761d7fb450906f.jpg', 'Image', NULL, '2022-01-07 08:35:17', '2022-01-25 09:38:35'),
(163, 34, 'upload/ladyAdvertisement/61d7fb45093b822010708351761d7fb45093c2.jpg', 'Image', NULL, '2022-01-07 08:35:17', '2022-01-25 09:38:35'),
(164, 34, 'upload/ladyAdvertisement/61d7fb450971d22010708351761d7fb4509726.jpg', 'Image', NULL, '2022-01-07 08:35:17', '2022-01-25 09:38:35'),
(165, 35, 'upload/ladyAdvertisement/61e7ddb0f03e822011909452061e7ddb0f03f3.jpeg', 'Image', NULL, '2022-01-19 09:45:20', '2022-01-25 09:38:35'),
(166, 35, 'upload/ladyAdvertisement/61e7ddb0f05c222011909452061e7ddb0f05c9.jpg', 'Image', NULL, '2022-01-19 09:45:20', '2022-01-25 09:38:35'),
(167, 35, 'upload/ladyAdvertisement/61e7ddb0f076122011909452061e7ddb0f0766.jpg', 'Image', NULL, '2022-01-19 09:45:20', '2022-01-25 09:38:35'),
(168, 36, 'upload/ladyAdvertisement/61ea8d107bc7022012110380861ea8d107bc78.jpg', 'Image', NULL, '2022-01-21 10:38:08', '2022-01-25 09:38:35'),
(169, 36, 'upload/ladyAdvertisement/61ea8d107c32e22012110380861ea8d107c336.jpg', 'Image', NULL, '2022-01-21 10:38:08', '2022-01-25 09:38:35'),
(170, 36, 'upload/ladyAdvertisement/61ea8d107c80322012110380861ea8d107c80b.jpg', 'Image', NULL, '2022-01-21 10:38:08', '2022-01-25 09:38:35'),
(171, 37, 'upload/ladyAdvertisement/61ea9193b365422012110572361ea9193b3663.jpg', 'Image', NULL, '2022-01-21 10:57:23', '2022-01-25 09:38:35'),
(172, 37, 'upload/ladyAdvertisement/61ea9193b3ebc22012110572361ea9193b3ecd.jpg', 'Image', NULL, '2022-01-21 10:57:23', '2022-01-25 09:38:35'),
(173, 37, 'upload/ladyAdvertisement/61ea9193b441122012110572361ea9193b441d.jpg', 'Image', NULL, '2022-01-21 10:57:23', '2022-01-25 09:38:35'),
(174, 37, 'upload/ladyAdvertisement/61ea9193b4b7922012110572361ea9193b4b86.jpg', 'Image', NULL, '2022-01-21 10:57:23', '2022-01-25 09:38:35'),
(175, 37, 'upload/ladyAdvertisement/61ea9193b507f22012110572361ea9193b508d.jpg', 'Image', NULL, '2022-01-21 10:57:23', '2022-01-25 09:38:35'),
(176, 38, 'upload/ladyAdvertisement/61efe895db77222012512095761efe895db785.jpg', 'Image', NULL, '2022-01-25 12:09:57', '2022-01-25 12:09:57'),
(177, 38, 'upload/ladyAdvertisement/61efe895dcba622012512095761efe895dcbb5.jpg', 'Image', NULL, '2022-01-25 12:09:57', '2022-01-25 12:09:57'),
(178, 38, 'upload/ladyAdvertisement/61efe895dcec322012512095761efe895dced0.jpg', 'Image', NULL, '2022-01-25 12:09:57', '2022-01-25 12:09:57'),
(179, 38, 'upload/ladyAdvertisement/61efe895dd23922012512095761efe895dd243.jpg', 'Image', NULL, '2022-01-25 12:09:57', '2022-01-25 12:09:57'),
(180, 38, 'upload/ladyAdvertisement/61efe895dd58622012512095761efe895dd58f.jpg', 'Image', NULL, '2022-01-25 12:09:57', '2022-01-25 12:09:57'),
(181, 38, 'upload/ladyAdvertisement/61efe895dd8ad22012512095761efe895dd8b5.jpg', 'Image', NULL, '2022-01-25 12:09:57', '2022-01-25 12:09:57'),
(182, 38, 'upload/ladyAdvertisement/61efe895ddb6922012512095761efe895ddb70.jpg', 'Image', NULL, '2022-01-25 12:09:57', '2022-01-25 12:09:57'),
(183, 39, 'upload/ladyAdvertisement/61efead0be74d22012512192861efead0be758.jpg', 'Image', NULL, '2022-01-25 12:19:28', '2022-01-25 12:19:28'),
(184, 39, 'upload/ladyAdvertisement/61efead0bebfa22012512192861efead0bec03.jpg', 'Image', NULL, '2022-01-25 12:19:28', '2022-01-25 12:19:28'),
(185, 39, 'upload/ladyAdvertisement/61efead0beed922012512192861efead0beee0.jpg', 'Image', NULL, '2022-01-25 12:19:28', '2022-01-25 12:19:28'),
(186, 39, 'upload/ladyAdvertisement/61efead0bf17b22012512192861efead0bf182.jpg', 'Image', NULL, '2022-01-25 12:19:28', '2022-01-25 12:19:28'),
(187, 39, 'upload/ladyAdvertisement/61efead0bf5eb22012512192861efead0bf5f5.jpg', 'Image', NULL, '2022-01-25 12:19:28', '2022-01-25 12:19:28'),
(188, 39, 'upload/ladyAdvertisement/61efead0bf88422012512192861efead0bf88a.jpg', 'Image', NULL, '2022-01-25 12:19:28', '2022-01-25 12:19:28'),
(189, 40, 'upload/ladyAdvertisement/61eff05df150022012512430961eff05df150e.jpg', 'Image', NULL, '2022-01-25 12:43:09', '2022-01-25 12:43:09'),
(190, 40, 'upload/ladyAdvertisement/61eff05df17e622012512430961eff05df17f1.jpg', 'Image', NULL, '2022-01-25 12:43:09', '2022-01-25 12:43:09'),
(191, 40, 'upload/ladyAdvertisement/61eff05df19a222012512430961eff05df19c3.jpg', 'Image', NULL, '2022-01-25 12:43:09', '2022-01-25 12:43:09'),
(192, 40, 'upload/ladyAdvertisement/61eff05df1b7622012512430961eff05df1b7b.jpg', 'Image', NULL, '2022-01-25 12:43:09', '2022-01-25 12:43:09'),
(193, 40, 'upload/ladyAdvertisement/61eff05df1d1522012512430961eff05df1d1c.jpg', 'Image', NULL, '2022-01-25 12:43:09', '2022-01-25 12:43:09'),
(194, 41, 'upload/ladyAdvertisement/61f003c603e3c22012502055861f003c603e4c.jpg', 'Image', NULL, '2022-01-25 14:05:58', '2022-01-25 14:05:58'),
(195, 41, 'upload/ladyAdvertisement/61f003c60428422012502055861f003c604291.jpg', 'Image', NULL, '2022-01-25 14:05:58', '2022-01-25 14:05:58'),
(196, 41, 'upload/ladyAdvertisement/61f003c6045c922012502055861f003c6045d3.jpg', 'Image', NULL, '2022-01-25 14:05:58', '2022-01-25 14:05:58'),
(197, 41, 'upload/ladyAdvertisement/61f003c6048c022012502055861f003c6048c8.jpg', 'Image', NULL, '2022-01-25 14:05:58', '2022-01-25 14:05:58'),
(198, 41, 'upload/ladyAdvertisement/61f003c604afe22012502055861f003c604b06.jpg', 'Image', NULL, '2022-01-25 14:05:58', '2022-01-25 14:05:58'),
(199, 43, 'upload/ladyAdvertisement/62148bb71655722022207073562148bb716561.jpg', 'Image', '2022-02-23 07:12:33', '2022-02-22 07:07:35', '2022-02-23 07:12:33');

-- --------------------------------------------------------

--
-- Table structure for table `advertisement_categories`
--

CREATE TABLE `advertisement_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advertisement_id` bigint(20) NOT NULL,
  `category_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisement_categories`
--

INSERT INTO `advertisement_categories` (`id`, `advertisement_id`, `category_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(36, 15, 1, NULL, '2021-12-06 12:33:23', '2022-01-25 09:38:35'),
(37, 15, 2, NULL, '2021-12-06 12:33:23', '2022-01-25 09:38:35'),
(38, 15, 3, NULL, '2021-12-06 12:33:23', '2022-01-25 09:38:35'),
(39, 15, 4, NULL, '2021-12-06 12:33:23', '2022-01-25 09:38:35'),
(40, 15, 5, NULL, '2021-12-06 12:33:23', '2022-01-25 09:38:35'),
(41, 15, 6, NULL, '2021-12-06 12:33:23', '2022-01-25 09:38:35'),
(42, 15, 7, NULL, '2021-12-06 12:33:23', '2022-01-25 09:38:35'),
(43, 15, 8, NULL, '2021-12-06 12:33:23', '2022-01-25 09:38:35'),
(44, 15, 9, NULL, '2021-12-06 12:33:23', '2022-01-25 09:38:35'),
(45, 15, 10, NULL, '2021-12-06 12:33:23', '2022-01-25 09:38:35'),
(46, 15, 11, NULL, '2021-12-06 12:33:23', '2022-01-25 09:38:35'),
(47, 16, 1, NULL, '2021-12-06 12:52:01', '2022-01-25 09:38:35'),
(48, 16, 2, NULL, '2021-12-06 12:52:01', '2022-01-25 09:38:35'),
(49, 16, 3, NULL, '2021-12-06 12:52:01', '2022-01-25 09:38:35'),
(50, 16, 4, NULL, '2021-12-06 12:52:01', '2022-01-25 09:38:35'),
(51, 16, 5, NULL, '2021-12-06 12:52:01', '2022-01-25 09:38:35'),
(52, 16, 6, NULL, '2021-12-06 12:52:01', '2022-01-25 09:38:35'),
(53, 16, 7, NULL, '2021-12-06 12:52:01', '2022-01-25 09:38:35'),
(54, 16, 8, NULL, '2021-12-06 12:52:01', '2022-01-25 09:38:35'),
(55, 16, 9, NULL, '2021-12-06 12:52:01', '2022-01-25 09:38:35'),
(56, 16, 10, NULL, '2021-12-06 12:52:01', '2022-01-25 09:38:35'),
(57, 16, 11, NULL, '2021-12-06 12:52:01', '2022-01-25 09:38:35'),
(60, 2, 1, NULL, '2021-12-06 14:31:26', '2022-01-25 09:38:35'),
(61, 2, 2, NULL, '2021-12-06 14:31:26', '2022-01-25 09:38:35'),
(62, 2, 3, NULL, '2021-12-06 14:31:26', '2022-01-25 09:38:35'),
(63, 2, 4, NULL, '2021-12-06 14:31:26', '2022-01-25 09:38:35'),
(64, 2, 5, NULL, '2021-12-06 14:31:26', '2022-01-25 09:38:35'),
(65, 2, 6, NULL, '2021-12-06 14:31:26', '2022-01-25 09:38:35'),
(66, 2, 7, NULL, '2021-12-06 14:31:26', '2022-01-25 09:38:35'),
(67, 2, 8, NULL, '2021-12-06 14:31:26', '2022-01-25 09:38:35'),
(68, 2, 9, NULL, '2021-12-06 14:31:26', '2022-01-25 09:38:35'),
(69, 2, 10, NULL, '2021-12-06 14:31:26', '2022-01-25 09:38:35'),
(70, 2, 11, NULL, '2021-12-06 14:31:26', '2022-01-25 09:38:35'),
(71, 1, 9, NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35'),
(72, 1, 10, NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35');

-- --------------------------------------------------------

--
-- Table structure for table `advertisement_reviews`
--

CREATE TABLE `advertisement_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `advertisement_id` int(11) NOT NULL,
  `positive` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `negative` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `likes` int(11) NOT NULL,
  `dislikes` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reply_by` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisement_reviews`
--

INSERT INTO `advertisement_reviews` (`id`, `customer_id`, `advertisement_id`, `positive`, `negative`, `reply`, `likes`, `dislikes`, `rating`, `deleted_at`, `created_at`, `updated_at`, `reply_by`) VALUES
(1, 6, 3, 'She provide very good Service', '', '', 0, 0, 9, NULL, '2021-11-02 11:52:06', '2022-01-25 09:38:35', 0),
(2, 6, 1, 'nice body, friendly lady. wil visit her again.', 'location was not great', '', 0, 0, 4, NULL, '2021-11-21 22:09:31', '2022-01-25 09:38:35', 0),
(3, 6, 3, 'I enjoyed', 'NA', '', 0, 0, 9, NULL, '2021-12-06 13:09:59', '2022-01-25 09:38:35', 0),
(4, 5, 15, 'good', 'bad', '', 0, 0, 2, NULL, '2021-12-27 06:30:44', '2022-01-25 09:38:35', 0),
(5, 1, 19, 'test review', 'nagative review', '', 0, 0, 6, NULL, '2021-12-27 06:38:25', '2022-01-25 09:38:35', 0);

-- --------------------------------------------------------

--
-- Table structure for table `advertisement_services`
--

CREATE TABLE `advertisement_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advertisement_id` int(11) NOT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `include` tinyint(4) NOT NULL COMMENT '0: not included, 1: included',
  `price` double(8,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisement_services`
--

INSERT INTO `advertisement_services` (`id`, `advertisement_id`, `service_name`, `include`, `price`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kissing Massage', 1, 0.00, '2021-11-15 02:25:40', '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(2, 1, 'Striptease', 1, 0.00, '2021-11-15 02:25:40', '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(3, 2, 'Kissing Massage', 1, 0.00, '2021-12-02 13:48:27', '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(4, 2, 'Striptease', 1, 0.00, '2021-12-02 13:48:27', '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(5, 3, 'Kissing Massage', 1, 0.00, NULL, '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(6, 3, 'Striptease', 1, 0.00, NULL, '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(7, 4, 'Kissing Massage', 1, 0.00, '2021-12-09 14:19:49', '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(8, 4, 'Striptease', 1, 0.00, '2021-12-09 14:19:49', '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(9, 5, 'Kissing Massage', 1, 0.00, '2021-12-03 11:40:54', '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(10, 5, 'Striptease', 1, 0.00, '2021-12-03 11:40:54', '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(11, 6, 'Relaxing Massage', 0, 10.00, '2021-12-06 14:17:29', '2021-11-02 12:30:07', '2022-01-25 09:38:35'),
(12, 6, 'Erotic Massage', 0, 13.00, '2021-12-06 14:17:29', '2021-11-02 12:30:07', '2022-01-25 09:38:35'),
(13, 6, 'Anal Massage', 0, 15.00, '2021-12-06 14:17:29', '2021-11-02 12:30:07', '2022-01-25 09:38:35'),
(14, 6, 'Kissing Massage', 1, 0.00, '2021-12-06 14:17:29', '2021-11-02 12:30:07', '2022-01-25 09:38:35'),
(15, 6, 'Kissing with tongue', 0, 12.00, '2021-12-06 14:17:29', '2021-11-02 12:30:07', '2022-01-25 09:38:35'),
(16, 6, 'Girlfriend Experience', 0, 12.00, '2021-12-06 14:17:29', '2021-11-02 12:30:07', '2022-01-25 09:38:35'),
(17, 6, 'Striptease', 1, 0.00, '2021-12-06 14:17:29', '2021-11-02 12:30:07', '2022-01-25 09:38:35'),
(18, 6, 'Fingering', 0, 19.00, '2021-12-06 14:17:29', '2021-11-02 12:30:07', '2022-01-25 09:38:35'),
(19, 6, 'Handjob', 0, 22.00, '2021-12-06 14:17:29', '2021-11-02 12:30:07', '2022-01-25 09:38:35'),
(20, 6, 'Titfuck', 1, 0.00, '2021-12-06 14:17:29', '2021-11-02 12:30:07', '2022-01-25 09:38:35'),
(21, 6, 'Pussy licking', 0, 17.00, '2021-12-06 14:17:29', '2021-11-02 12:30:07', '2022-01-25 09:38:35'),
(22, 6, 'Riming me', 0, 9.00, '2021-12-06 14:17:29', '2021-11-02 12:30:07', '2022-01-25 09:38:35'),
(23, 6, 'Sex with condom', 0, 2.00, '2021-12-06 14:17:29', '2021-11-02 12:30:07', '2022-01-25 09:38:35'),
(24, 6, 'Sex without condom', 0, 14.00, '2021-12-06 14:17:29', '2021-11-02 12:30:07', '2022-01-25 09:38:35'),
(25, 6, 'Outdoor sex', 1, 0.00, '2021-12-06 14:17:29', '2021-11-02 12:30:07', '2022-01-25 09:38:35'),
(26, 1, 'Kissing Massage', 1, 0.00, '2021-11-21 21:31:09', '2021-11-15 07:55:40', '2022-01-25 09:38:35'),
(27, 1, 'Striptease', 1, 0.00, '2021-11-21 21:31:09', '2021-11-15 07:55:40', '2022-01-25 09:38:35'),
(28, 7, 'Sex without condom', 0, 0.00, '2021-11-15 03:28:38', '2021-11-15 08:58:05', '2022-01-25 09:38:35'),
(29, 7, 'Outdoor sex', 0, 0.00, '2021-11-15 03:28:38', '2021-11-15 08:58:05', '2022-01-25 09:38:35'),
(30, 7, 'Sex without condom', 0, 12.00, NULL, '2021-11-15 08:58:38', '2022-01-25 09:38:35'),
(31, 7, 'Outdoor sex', 0, 21.00, NULL, '2021-11-15 08:58:38', '2022-01-25 09:38:35'),
(32, 1, 'Relaxing Massage', 0, 20.00, '2021-11-21 22:19:55', '2021-11-21 21:31:09', '2022-01-25 09:38:35'),
(33, 1, 'Erotic Massage', 0, 10.00, '2021-11-21 22:19:55', '2021-11-21 21:31:09', '2022-01-25 09:38:35'),
(34, 1, 'Kissing', 1, 0.00, '2021-11-21 22:19:55', '2021-11-21 21:31:09', '2022-01-25 09:38:35'),
(35, 1, 'Kissing with tongue', 1, 0.00, '2021-11-21 22:19:55', '2021-11-21 21:31:09', '2022-01-25 09:38:35'),
(36, 1, 'Girlfriend experience', 0, 10.00, '2021-11-21 22:19:55', '2021-11-21 21:31:09', '2022-01-25 09:38:35'),
(37, 1, 'Striptease', 1, 0.00, '2021-11-21 22:19:55', '2021-11-21 21:31:09', '2022-01-25 09:38:35'),
(38, 1, 'Fingering', 1, 0.00, '2021-11-21 22:19:55', '2021-11-21 21:31:09', '2022-01-25 09:38:35'),
(39, 1, 'Handjob', 1, 0.00, '2021-11-21 22:19:55', '2021-11-21 21:31:09', '2022-01-25 09:38:35'),
(40, 1, 'Titfuck', 0, 10.00, '2021-11-21 22:19:55', '2021-11-21 21:31:09', '2022-01-25 09:38:35'),
(41, 1, 'Rimming (client)', 0, 25.00, '2021-11-21 22:19:55', '2021-11-21 21:31:09', '2022-01-25 09:38:35'),
(42, 1, 'Blowjob with condom', 1, 0.00, '2021-11-21 22:19:55', '2021-11-21 21:31:09', '2022-01-25 09:38:35'),
(43, 1, 'Blowjob without condom', 0, 10.00, '2021-11-21 22:19:55', '2021-11-21 21:31:09', '2022-01-25 09:38:35'),
(44, 1, 'Sex with condom', 1, 0.00, '2021-11-21 22:19:55', '2021-11-21 21:31:09', '2022-01-25 09:38:35'),
(45, 1, 'Sex without condom', 0, 50.00, '2021-11-21 22:19:55', '2021-11-21 21:31:09', '2022-01-25 09:38:35'),
(46, 1, 'Anal sex (me)', 0, 25.00, '2021-11-21 22:19:55', '2021-11-21 21:31:09', '2022-01-25 09:38:35'),
(47, 1, 'Anal sex without condom (me)', 0, 100.00, '2021-11-21 22:19:55', '2021-11-21 21:31:09', '2022-01-25 09:38:35'),
(48, 1, 'Anal sex (client)', 1, 0.00, '2021-11-21 22:19:55', '2021-11-21 21:31:09', '2022-01-25 09:38:35'),
(49, 1, 'Cum on body', 1, 0.00, '2021-11-21 22:19:55', '2021-11-21 21:31:09', '2022-01-25 09:38:35'),
(50, 1, 'Cum on face', 1, 0.00, '2021-11-21 22:19:55', '2021-11-21 21:31:09', '2022-01-25 09:38:35'),
(51, 1, 'Cum in mouth', 1, 0.00, '2021-11-21 22:19:55', '2021-11-21 21:31:09', '2022-01-25 09:38:35'),
(52, 1, 'Swallowing', 0, 80.00, '2021-11-21 22:19:55', '2021-11-21 21:31:09', '2022-01-25 09:38:35'),
(53, 1, 'Toys/Dildo (me)', 0, 50.00, '2021-11-21 22:19:55', '2021-11-21 21:31:09', '2022-01-25 09:38:35'),
(54, 1, 'Toys/Dildo (client)', 1, 0.00, '2021-11-21 22:19:55', '2021-11-21 21:31:09', '2022-01-25 09:38:35'),
(55, 1, 'Photos', 0, 30.00, '2021-11-21 22:19:55', '2021-11-21 21:31:09', '2022-01-25 09:38:35'),
(56, 1, 'Videos', 0, 50.00, '2021-11-21 22:19:55', '2021-11-21 21:31:09', '2022-01-25 09:38:35'),
(57, 1, 'Role Play', 1, 0.00, '2021-11-21 22:19:55', '2021-11-21 21:31:09', '2022-01-25 09:38:35'),
(58, 1, 'Relaxing Massage', 0, 20.00, '2021-11-21 22:23:33', '2021-11-21 22:19:55', '2022-01-25 09:38:35'),
(59, 1, 'Erotic Massage', 0, 10.00, '2021-11-21 22:23:33', '2021-11-21 22:19:55', '2022-01-25 09:38:35'),
(60, 1, 'Kissing', 1, 0.00, '2021-11-21 22:23:33', '2021-11-21 22:19:55', '2022-01-25 09:38:35'),
(61, 1, 'Kissing with tongue', 1, 0.00, '2021-11-21 22:23:33', '2021-11-21 22:19:55', '2022-01-25 09:38:35'),
(62, 1, 'Girlfriend experience', 0, 10.00, '2021-11-21 22:23:33', '2021-11-21 22:19:55', '2022-01-25 09:38:35'),
(63, 1, 'Striptease', 1, 0.00, '2021-11-21 22:23:33', '2021-11-21 22:19:55', '2022-01-25 09:38:35'),
(64, 1, 'Fingering', 1, 0.00, '2021-11-21 22:23:33', '2021-11-21 22:19:55', '2022-01-25 09:38:35'),
(65, 1, 'Handjob', 1, 0.00, '2021-11-21 22:23:33', '2021-11-21 22:19:55', '2022-01-25 09:38:35'),
(66, 1, 'Titfuck', 0, 10.00, '2021-11-21 22:23:33', '2021-11-21 22:19:55', '2022-01-25 09:38:35'),
(67, 1, 'Rimming (client)', 0, 25.00, '2021-11-21 22:23:33', '2021-11-21 22:19:55', '2022-01-25 09:38:35'),
(68, 1, 'Blowjob with condom', 1, 0.00, '2021-11-21 22:23:33', '2021-11-21 22:19:55', '2022-01-25 09:38:35'),
(69, 1, 'Blowjob without condom', 0, 10.00, '2021-11-21 22:23:33', '2021-11-21 22:19:55', '2022-01-25 09:38:35'),
(70, 1, 'Sex with condom', 1, 0.00, '2021-11-21 22:23:33', '2021-11-21 22:19:55', '2022-01-25 09:38:35'),
(71, 1, 'Sex without condom', 0, 50.00, '2021-11-21 22:23:33', '2021-11-21 22:19:55', '2022-01-25 09:38:35'),
(72, 1, 'Anal sex (me)', 0, 25.00, '2021-11-21 22:23:33', '2021-11-21 22:19:55', '2022-01-25 09:38:35'),
(73, 1, 'Anal sex without condom (me)', 0, 100.00, '2021-11-21 22:23:33', '2021-11-21 22:19:55', '2022-01-25 09:38:35'),
(74, 1, 'Anal sex (client)', 1, 0.00, '2021-11-21 22:23:33', '2021-11-21 22:19:55', '2022-01-25 09:38:35'),
(75, 1, 'Cum on body', 1, 0.00, '2021-11-21 22:23:33', '2021-11-21 22:19:55', '2022-01-25 09:38:35'),
(76, 1, 'Cum on face', 1, 0.00, '2021-11-21 22:23:33', '2021-11-21 22:19:55', '2022-01-25 09:38:35'),
(77, 1, 'Cum in mouth', 1, 0.00, '2021-11-21 22:23:33', '2021-11-21 22:19:55', '2022-01-25 09:38:35'),
(78, 1, 'Swallowing', 0, 80.00, '2021-11-21 22:23:33', '2021-11-21 22:19:55', '2022-01-25 09:38:35'),
(79, 1, 'Toys/Dildo (me)', 0, 50.00, '2021-11-21 22:23:33', '2021-11-21 22:19:55', '2022-01-25 09:38:35'),
(80, 1, 'Toys/Dildo (client)', 1, 0.00, '2021-11-21 22:23:33', '2021-11-21 22:19:55', '2022-01-25 09:38:35'),
(81, 1, 'Photos', 0, 30.00, '2021-11-21 22:23:33', '2021-11-21 22:19:55', '2022-01-25 09:38:35'),
(82, 1, 'Videos', 0, 50.00, '2021-11-21 22:23:33', '2021-11-21 22:19:55', '2022-01-25 09:38:35'),
(83, 1, 'Role Play', 1, 0.00, '2021-11-21 22:23:33', '2021-11-21 22:19:55', '2022-01-25 09:38:35'),
(84, 1, 'Relaxing Massage', 0, 20.00, '2021-11-21 22:24:49', '2021-11-21 22:23:33', '2022-01-25 09:38:35'),
(85, 1, 'Erotic Massage', 0, 10.00, '2021-11-21 22:24:49', '2021-11-21 22:23:33', '2022-01-25 09:38:35'),
(86, 1, 'Kissing', 1, 0.00, '2021-11-21 22:24:49', '2021-11-21 22:23:33', '2022-01-25 09:38:35'),
(87, 1, 'Kissing with tongue', 1, 0.00, '2021-11-21 22:24:49', '2021-11-21 22:23:33', '2022-01-25 09:38:35'),
(88, 1, 'Girlfriend experience', 0, 10.00, '2021-11-21 22:24:49', '2021-11-21 22:23:33', '2022-01-25 09:38:35'),
(89, 1, 'Striptease', 1, 0.00, '2021-11-21 22:24:49', '2021-11-21 22:23:33', '2022-01-25 09:38:35'),
(90, 1, 'Fingering', 1, 0.00, '2021-11-21 22:24:49', '2021-11-21 22:23:33', '2022-01-25 09:38:35'),
(91, 1, 'Handjob', 1, 0.00, '2021-11-21 22:24:49', '2021-11-21 22:23:33', '2022-01-25 09:38:35'),
(92, 1, 'Titfuck', 0, 10.00, '2021-11-21 22:24:49', '2021-11-21 22:23:33', '2022-01-25 09:38:35'),
(93, 1, 'Rimming (client)', 0, 25.00, '2021-11-21 22:24:49', '2021-11-21 22:23:33', '2022-01-25 09:38:35'),
(94, 1, 'Blowjob with condom', 1, 0.00, '2021-11-21 22:24:49', '2021-11-21 22:23:33', '2022-01-25 09:38:35'),
(95, 1, 'Blowjob without condom', 0, 10.00, '2021-11-21 22:24:49', '2021-11-21 22:23:33', '2022-01-25 09:38:35'),
(96, 1, 'Sex with condom', 1, 0.00, '2021-11-21 22:24:49', '2021-11-21 22:23:33', '2022-01-25 09:38:35'),
(97, 1, 'Sex without condom', 0, 50.00, '2021-11-21 22:24:49', '2021-11-21 22:23:33', '2022-01-25 09:38:35'),
(98, 1, 'Anal sex (me)', 0, 25.00, '2021-11-21 22:24:49', '2021-11-21 22:23:33', '2022-01-25 09:38:35'),
(99, 1, 'Anal sex without condom (me)', 0, 100.00, '2021-11-21 22:24:49', '2021-11-21 22:23:33', '2022-01-25 09:38:35'),
(100, 1, 'Anal sex (client)', 1, 0.00, '2021-11-21 22:24:49', '2021-11-21 22:23:33', '2022-01-25 09:38:35'),
(101, 1, 'Cum on body', 1, 0.00, '2021-11-21 22:24:49', '2021-11-21 22:23:33', '2022-01-25 09:38:35'),
(102, 1, 'Cum on face', 1, 0.00, '2021-11-21 22:24:49', '2021-11-21 22:23:33', '2022-01-25 09:38:35'),
(103, 1, 'Cum in mouth', 1, 0.00, '2021-11-21 22:24:49', '2021-11-21 22:23:33', '2022-01-25 09:38:35'),
(104, 1, 'Swallowing', 0, 80.00, '2021-11-21 22:24:49', '2021-11-21 22:23:33', '2022-01-25 09:38:35'),
(105, 1, 'Toys/Dildo (me)', 0, 50.00, '2021-11-21 22:24:49', '2021-11-21 22:23:33', '2022-01-25 09:38:35'),
(106, 1, 'Toys/Dildo (client)', 1, 0.00, '2021-11-21 22:24:49', '2021-11-21 22:23:33', '2022-01-25 09:38:35'),
(107, 1, 'Photos', 0, 30.00, '2021-11-21 22:24:49', '2021-11-21 22:23:33', '2022-01-25 09:38:35'),
(108, 1, 'Videos', 0, 50.00, '2021-11-21 22:24:49', '2021-11-21 22:23:33', '2022-01-25 09:38:35'),
(109, 1, 'Role Play', 1, 0.00, '2021-11-21 22:24:49', '2021-11-21 22:23:33', '2022-01-25 09:38:35'),
(110, 1, 'Relaxing Massage', 0, 20.00, '2021-11-21 22:26:18', '2021-11-21 22:24:49', '2022-01-25 09:38:35'),
(111, 1, 'Erotic Massage', 0, 10.00, '2021-11-21 22:26:18', '2021-11-21 22:24:49', '2022-01-25 09:38:35'),
(112, 1, 'Kissing', 1, 0.00, '2021-11-21 22:26:18', '2021-11-21 22:24:49', '2022-01-25 09:38:35'),
(113, 1, 'Kissing with tongue', 1, 0.00, '2021-11-21 22:26:18', '2021-11-21 22:24:49', '2022-01-25 09:38:35'),
(114, 1, 'Girlfriend experience', 0, 10.00, '2021-11-21 22:26:18', '2021-11-21 22:24:49', '2022-01-25 09:38:35'),
(115, 1, 'Striptease', 1, 0.00, '2021-11-21 22:26:18', '2021-11-21 22:24:49', '2022-01-25 09:38:35'),
(116, 1, 'Fingering', 1, 0.00, '2021-11-21 22:26:18', '2021-11-21 22:24:49', '2022-01-25 09:38:35'),
(117, 1, 'Handjob', 1, 0.00, '2021-11-21 22:26:18', '2021-11-21 22:24:49', '2022-01-25 09:38:35'),
(118, 1, 'Titfuck', 0, 10.00, '2021-11-21 22:26:18', '2021-11-21 22:24:49', '2022-01-25 09:38:35'),
(119, 1, 'Rimming (client)', 0, 25.00, '2021-11-21 22:26:18', '2021-11-21 22:24:49', '2022-01-25 09:38:35'),
(120, 1, 'Blowjob with condom', 1, 0.00, '2021-11-21 22:26:18', '2021-11-21 22:24:49', '2022-01-25 09:38:35'),
(121, 1, 'Blowjob without condom', 0, 10.00, '2021-11-21 22:26:18', '2021-11-21 22:24:49', '2022-01-25 09:38:35'),
(122, 1, 'Sex with condom', 1, 0.00, '2021-11-21 22:26:18', '2021-11-21 22:24:49', '2022-01-25 09:38:35'),
(123, 1, 'Sex without condom', 0, 50.00, '2021-11-21 22:26:18', '2021-11-21 22:24:49', '2022-01-25 09:38:35'),
(124, 1, 'Anal sex (me)', 0, 25.00, '2021-11-21 22:26:18', '2021-11-21 22:24:49', '2022-01-25 09:38:35'),
(125, 1, 'Anal sex without condom (me)', 0, 100.00, '2021-11-21 22:26:18', '2021-11-21 22:24:49', '2022-01-25 09:38:35'),
(126, 1, 'Anal sex (client)', 1, 0.00, '2021-11-21 22:26:18', '2021-11-21 22:24:49', '2022-01-25 09:38:35'),
(127, 1, 'Cum on body', 1, 0.00, '2021-11-21 22:26:18', '2021-11-21 22:24:49', '2022-01-25 09:38:35'),
(128, 1, 'Cum on face', 1, 0.00, '2021-11-21 22:26:18', '2021-11-21 22:24:49', '2022-01-25 09:38:35'),
(129, 1, 'Cum in mouth', 1, 0.00, '2021-11-21 22:26:18', '2021-11-21 22:24:49', '2022-01-25 09:38:35'),
(130, 1, 'Swallowing', 0, 80.00, '2021-11-21 22:26:18', '2021-11-21 22:24:49', '2022-01-25 09:38:35'),
(131, 1, 'Toys/Dildo (me)', 0, 50.00, '2021-11-21 22:26:18', '2021-11-21 22:24:49', '2022-01-25 09:38:35'),
(132, 1, 'Toys/Dildo (client)', 1, 0.00, '2021-11-21 22:26:18', '2021-11-21 22:24:49', '2022-01-25 09:38:35'),
(133, 1, 'Photos', 0, 30.00, '2021-11-21 22:26:18', '2021-11-21 22:24:49', '2022-01-25 09:38:35'),
(134, 1, 'Videos', 0, 50.00, '2021-11-21 22:26:18', '2021-11-21 22:24:49', '2022-01-25 09:38:35'),
(135, 1, 'Role Play', 1, 0.00, '2021-11-21 22:26:18', '2021-11-21 22:24:49', '2022-01-25 09:38:35'),
(136, 1, 'Relaxing Massage', 0, 20.00, '2021-12-02 13:47:08', '2021-11-21 22:26:18', '2022-01-25 09:38:35'),
(137, 1, 'Erotic Massage', 0, 10.00, '2021-12-02 13:47:08', '2021-11-21 22:26:18', '2022-01-25 09:38:35'),
(138, 1, 'Kissing', 1, 0.00, '2021-12-02 13:47:08', '2021-11-21 22:26:18', '2022-01-25 09:38:35'),
(139, 1, 'Kissing with tongue', 1, 0.00, '2021-12-02 13:47:08', '2021-11-21 22:26:18', '2022-01-25 09:38:35'),
(140, 1, 'Girlfriend experience', 0, 10.00, '2021-12-02 13:47:08', '2021-11-21 22:26:18', '2022-01-25 09:38:35'),
(141, 1, 'Striptease', 1, 0.00, '2021-12-02 13:47:08', '2021-11-21 22:26:18', '2022-01-25 09:38:35'),
(142, 1, 'Fingering', 1, 0.00, '2021-12-02 13:47:08', '2021-11-21 22:26:18', '2022-01-25 09:38:35'),
(143, 1, 'Handjob', 1, 0.00, '2021-12-02 13:47:08', '2021-11-21 22:26:18', '2022-01-25 09:38:35'),
(144, 1, 'Titfuck', 0, 10.00, '2021-12-02 13:47:08', '2021-11-21 22:26:18', '2022-01-25 09:38:35'),
(145, 1, 'Rimming (client)', 0, 25.00, '2021-12-02 13:47:08', '2021-11-21 22:26:18', '2022-01-25 09:38:35'),
(146, 1, 'Blowjob with condom', 1, 0.00, '2021-12-02 13:47:08', '2021-11-21 22:26:18', '2022-01-25 09:38:35'),
(147, 1, 'Blowjob without condom', 0, 10.00, '2021-12-02 13:47:08', '2021-11-21 22:26:18', '2022-01-25 09:38:35'),
(148, 1, 'Sex with condom', 1, 0.00, '2021-12-02 13:47:08', '2021-11-21 22:26:18', '2022-01-25 09:38:35'),
(149, 1, 'Sex without condom', 0, 50.00, '2021-12-02 13:47:08', '2021-11-21 22:26:18', '2022-01-25 09:38:35'),
(150, 1, 'Anal sex (me)', 0, 25.00, '2021-12-02 13:47:08', '2021-11-21 22:26:18', '2022-01-25 09:38:35'),
(151, 1, 'Anal sex without condom (me)', 0, 100.00, '2021-12-02 13:47:08', '2021-11-21 22:26:18', '2022-01-25 09:38:35'),
(152, 1, 'Anal sex (client)', 1, 0.00, '2021-12-02 13:47:08', '2021-11-21 22:26:18', '2022-01-25 09:38:35'),
(153, 1, 'Cum on body', 1, 0.00, '2021-12-02 13:47:08', '2021-11-21 22:26:18', '2022-01-25 09:38:35'),
(154, 1, 'Cum on face', 1, 0.00, '2021-12-02 13:47:08', '2021-11-21 22:26:18', '2022-01-25 09:38:35'),
(155, 1, 'Cum in mouth', 1, 0.00, '2021-12-02 13:47:08', '2021-11-21 22:26:18', '2022-01-25 09:38:35'),
(156, 1, 'Swallowing', 0, 80.00, '2021-12-02 13:47:08', '2021-11-21 22:26:18', '2022-01-25 09:38:35'),
(157, 1, 'Toys/Dildo (me)', 0, 50.00, '2021-12-02 13:47:08', '2021-11-21 22:26:18', '2022-01-25 09:38:35'),
(158, 1, 'Toys/Dildo (client)', 1, 0.00, '2021-12-02 13:47:08', '2021-11-21 22:26:18', '2022-01-25 09:38:35'),
(159, 1, 'Photos', 0, 30.00, '2021-12-02 13:47:08', '2021-11-21 22:26:18', '2022-01-25 09:38:35'),
(160, 1, 'Videos', 0, 50.00, '2021-12-02 13:47:08', '2021-11-21 22:26:18', '2022-01-25 09:38:35'),
(161, 1, 'Role Play', 1, 0.00, '2021-12-02 13:47:08', '2021-11-21 22:26:18', '2022-01-25 09:38:35'),
(162, 1, 'Relaxing Massage', 0, 20.00, '2021-12-06 14:29:51', '2021-12-02 13:47:08', '2022-01-25 09:38:35'),
(163, 1, 'Erotic Massage', 0, 10.00, '2021-12-06 14:29:51', '2021-12-02 13:47:08', '2022-01-25 09:38:35'),
(164, 1, 'Kissing', 1, 0.00, '2021-12-06 14:29:51', '2021-12-02 13:47:08', '2022-01-25 09:38:35'),
(165, 1, 'Kissing with tongue', 1, 0.00, '2021-12-06 14:29:51', '2021-12-02 13:47:08', '2022-01-25 09:38:35'),
(166, 1, 'Girlfriend experience', 0, 10.00, '2021-12-06 14:29:51', '2021-12-02 13:47:08', '2022-01-25 09:38:35'),
(167, 1, 'Striptease', 1, 0.00, '2021-12-06 14:29:51', '2021-12-02 13:47:08', '2022-01-25 09:38:35'),
(168, 1, 'Fingering', 1, 0.00, '2021-12-06 14:29:51', '2021-12-02 13:47:08', '2022-01-25 09:38:35'),
(169, 1, 'Handjob', 1, 0.00, '2021-12-06 14:29:51', '2021-12-02 13:47:08', '2022-01-25 09:38:35'),
(170, 1, 'Titfuck', 0, 10.00, '2021-12-06 14:29:51', '2021-12-02 13:47:08', '2022-01-25 09:38:35'),
(171, 1, 'Rimming (client)', 0, 25.00, '2021-12-06 14:29:51', '2021-12-02 13:47:08', '2022-01-25 09:38:35'),
(172, 1, 'Blowjob with condom', 1, 0.00, '2021-12-06 14:29:51', '2021-12-02 13:47:08', '2022-01-25 09:38:35'),
(173, 1, 'Blowjob without condom', 0, 10.00, '2021-12-06 14:29:51', '2021-12-02 13:47:08', '2022-01-25 09:38:35'),
(174, 1, 'Sex with condom', 1, 0.00, '2021-12-06 14:29:51', '2021-12-02 13:47:08', '2022-01-25 09:38:35'),
(175, 1, 'Sex without condom', 0, 50.00, '2021-12-06 14:29:51', '2021-12-02 13:47:08', '2022-01-25 09:38:35'),
(176, 1, 'Anal sex (me)', 0, 25.00, '2021-12-06 14:29:51', '2021-12-02 13:47:08', '2022-01-25 09:38:35'),
(177, 1, 'Anal sex without condom (me)', 0, 100.00, '2021-12-06 14:29:51', '2021-12-02 13:47:08', '2022-01-25 09:38:35'),
(178, 1, 'Anal sex (client)', 1, 0.00, '2021-12-06 14:29:51', '2021-12-02 13:47:08', '2022-01-25 09:38:35'),
(179, 1, 'Cum on body', 1, 0.00, '2021-12-06 14:29:51', '2021-12-02 13:47:08', '2022-01-25 09:38:35'),
(180, 1, 'Cum on face', 1, 0.00, '2021-12-06 14:29:51', '2021-12-02 13:47:08', '2022-01-25 09:38:35'),
(181, 1, 'Cum in mouth', 1, 0.00, '2021-12-06 14:29:51', '2021-12-02 13:47:08', '2022-01-25 09:38:35'),
(182, 1, 'Swallowing', 0, 80.00, '2021-12-06 14:29:51', '2021-12-02 13:47:08', '2022-01-25 09:38:35'),
(183, 1, 'Toys/Dildo (me)', 0, 50.00, '2021-12-06 14:29:51', '2021-12-02 13:47:08', '2022-01-25 09:38:35'),
(184, 1, 'Toys/Dildo (client)', 1, 0.00, '2021-12-06 14:29:51', '2021-12-02 13:47:08', '2022-01-25 09:38:35'),
(185, 1, 'Photos', 0, 30.00, '2021-12-06 14:29:51', '2021-12-02 13:47:08', '2022-01-25 09:38:35'),
(186, 1, 'Videos', 0, 50.00, '2021-12-06 14:29:51', '2021-12-02 13:47:08', '2022-01-25 09:38:35'),
(187, 1, 'Role Play', 1, 0.00, '2021-12-06 14:29:51', '2021-12-02 13:47:08', '2022-01-25 09:38:35'),
(188, 2, 'Striptease', 1, 0.00, '2021-12-06 14:31:26', '2021-12-02 13:48:27', '2022-01-25 09:38:35'),
(189, 15, 'Relaxing Massage', 1, 0.00, '2021-12-06 12:33:23', '2021-12-03 06:10:01', '2022-01-25 09:38:35'),
(190, 15, 'Erotic Massage', 1, 0.00, '2021-12-06 12:33:23', '2021-12-03 06:10:01', '2022-01-25 09:38:35'),
(191, 15, 'Anal Massage', 1, 0.00, '2021-12-06 12:33:23', '2021-12-03 06:10:01', '2022-01-25 09:38:35'),
(192, 15, 'Kissing', 0, 90.00, '2021-12-06 12:33:23', '2021-12-03 06:10:01', '2022-01-25 09:38:35'),
(193, 15, 'Kissing with tongue', 1, 0.00, '2021-12-06 12:33:23', '2021-12-03 06:10:01', '2022-01-25 09:38:35'),
(194, 15, 'Girlfriend experience', 1, 0.00, '2021-12-06 12:33:23', '2021-12-03 06:10:01', '2022-01-25 09:38:35'),
(195, 15, 'Striptease', 1, 0.00, '2021-12-06 12:33:23', '2021-12-03 06:10:01', '2022-01-25 09:38:35'),
(196, 15, 'Fingering', 0, 10.00, '2021-12-06 12:33:23', '2021-12-03 06:10:01', '2022-01-25 09:38:35'),
(197, 15, 'Blowjob with condom', 0, 17.00, '2021-12-06 12:33:23', '2021-12-03 06:10:01', '2022-01-25 09:38:35'),
(198, 15, 'Deep Throat', 0, 13.00, '2021-12-06 12:33:23', '2021-12-03 06:10:01', '2022-01-25 09:38:35'),
(199, 15, 'Sex with condom', 0, 0.00, '2021-12-06 12:33:23', '2021-12-03 06:10:01', '2022-01-25 09:38:35'),
(200, 15, 'Anal sex (me)', 0, 12.00, '2021-12-06 12:33:23', '2021-12-03 06:10:01', '2022-01-25 09:38:35'),
(201, 15, 'Anal sex without condom (me)', 0, 20.00, '2021-12-06 12:33:23', '2021-12-03 06:10:01', '2022-01-25 09:38:35'),
(202, 15, 'Toys/Dildo (me)', 1, 0.00, '2021-12-06 12:33:23', '2021-12-03 06:10:01', '2022-01-25 09:38:35'),
(203, 15, 'Trio MFF', 0, 0.00, '2021-12-06 12:33:23', '2021-12-03 06:10:01', '2022-01-25 09:38:35'),
(204, 15, 'Lesbian sex', 0, 0.00, '2021-12-06 12:33:23', '2021-12-03 06:10:01', '2022-01-25 09:38:35'),
(205, 15, 'Group sex', 0, 0.00, '2021-12-06 12:33:23', '2021-12-03 06:10:01', '2022-01-25 09:38:35'),
(206, 15, 'Photos', 0, 0.00, '2021-12-06 12:33:23', '2021-12-03 06:10:01', '2022-01-25 09:38:35'),
(207, 16, 'Relaxing Massage', 1, 0.00, '2021-12-06 12:52:01', '2021-12-03 06:37:46', '2022-01-25 09:38:35'),
(208, 16, 'Erotic Massage', 1, 0.00, '2021-12-06 12:52:01', '2021-12-03 06:37:46', '2022-01-25 09:38:35'),
(209, 16, 'Kissing', 0, 30.00, '2021-12-06 12:52:01', '2021-12-03 06:37:46', '2022-01-25 09:38:35'),
(210, 16, 'Kissing with tongue', 0, 1.00, '2021-12-06 12:52:01', '2021-12-03 06:37:46', '2022-01-25 09:38:35'),
(211, 16, 'Girlfriend experience', 1, 0.00, '2021-12-06 12:52:01', '2021-12-03 06:37:46', '2022-01-25 09:38:35'),
(212, 16, 'Photos', 1, 0.00, '2021-12-06 12:52:01', '2021-12-03 06:37:46', '2022-01-25 09:38:35'),
(213, 16, 'Videos', 1, 0.00, '2021-12-06 12:52:01', '2021-12-03 06:37:46', '2022-01-25 09:38:35'),
(214, 5, 'Striptease', 1, 0.00, '2021-12-06 14:26:17', '2021-12-03 11:40:54', '2022-01-25 09:38:35'),
(215, 15, 'Relaxing Massage', 1, 0.00, NULL, '2021-12-06 12:33:23', '2022-01-25 09:38:35'),
(216, 15, 'Erotic Massage', 1, 0.00, NULL, '2021-12-06 12:33:23', '2022-01-25 09:38:35'),
(217, 15, 'Kissing', 0, 90.00, NULL, '2021-12-06 12:33:23', '2022-01-25 09:38:35'),
(218, 15, 'Kissing with tongue', 1, 0.00, NULL, '2021-12-06 12:33:23', '2022-01-25 09:38:35'),
(219, 15, 'Girlfriend experience', 1, 0.00, NULL, '2021-12-06 12:33:23', '2022-01-25 09:38:35'),
(220, 15, 'Striptease', 1, 0.00, NULL, '2021-12-06 12:33:23', '2022-01-25 09:38:35'),
(221, 15, 'Fingering', 0, 10.00, NULL, '2021-12-06 12:33:23', '2022-01-25 09:38:35'),
(222, 15, 'Blowjob with condom', 0, 17.00, NULL, '2021-12-06 12:33:23', '2022-01-25 09:38:35'),
(223, 15, 'Deep Throat', 0, 13.00, NULL, '2021-12-06 12:33:23', '2022-01-25 09:38:35'),
(224, 15, 'Sex with condom', 0, 0.00, NULL, '2021-12-06 12:33:23', '2022-01-25 09:38:35'),
(225, 15, 'Anal sex (me)', 0, 12.00, NULL, '2021-12-06 12:33:23', '2022-01-25 09:38:35'),
(226, 15, 'Anal sex without condom (me)', 0, 20.00, NULL, '2021-12-06 12:33:23', '2022-01-25 09:38:35'),
(227, 15, 'Toys/Dildo (me)', 1, 0.00, NULL, '2021-12-06 12:33:23', '2022-01-25 09:38:35'),
(228, 15, 'Trio MFF', 0, 0.00, NULL, '2021-12-06 12:33:23', '2022-01-25 09:38:35'),
(229, 15, 'Lesbian sex', 0, 0.00, NULL, '2021-12-06 12:33:23', '2022-01-25 09:38:35'),
(230, 15, 'Group sex', 0, 0.00, NULL, '2021-12-06 12:33:23', '2022-01-25 09:38:35'),
(231, 15, 'Photos', 0, 0.00, NULL, '2021-12-06 12:33:23', '2022-01-25 09:38:35'),
(232, 16, 'Relaxing Massage', 1, 0.00, NULL, '2021-12-06 12:52:01', '2022-01-25 09:38:35'),
(233, 16, 'Erotic Massage', 1, 0.00, NULL, '2021-12-06 12:52:01', '2022-01-25 09:38:35'),
(234, 16, 'Kissing', 0, 30.00, NULL, '2021-12-06 12:52:01', '2022-01-25 09:38:35'),
(235, 16, 'Kissing with tongue', 0, 1.00, NULL, '2021-12-06 12:52:01', '2022-01-25 09:38:35'),
(236, 16, 'Girlfriend experience', 1, 0.00, NULL, '2021-12-06 12:52:01', '2022-01-25 09:38:35'),
(237, 16, 'Photos', 1, 0.00, NULL, '2021-12-06 12:52:01', '2022-01-25 09:38:35'),
(238, 16, 'Videos', 1, 0.00, NULL, '2021-12-06 12:52:01', '2022-01-25 09:38:35'),
(239, 6, 'Relaxing Massage', 0, 10.00, '2021-12-06 14:22:04', '2021-12-06 14:17:29', '2022-01-25 09:38:35'),
(240, 6, 'Erotic Massage', 0, 13.00, '2021-12-06 14:22:04', '2021-12-06 14:17:29', '2022-01-25 09:38:35'),
(241, 6, 'Kissing with tongue', 0, 12.00, '2021-12-06 14:22:04', '2021-12-06 14:17:29', '2022-01-25 09:38:35'),
(242, 6, 'Striptease', 1, 0.00, '2021-12-06 14:22:04', '2021-12-06 14:17:29', '2022-01-25 09:38:35'),
(243, 6, 'Fingering', 0, 19.00, '2021-12-06 14:22:04', '2021-12-06 14:17:29', '2022-01-25 09:38:35'),
(244, 6, 'Handjob', 0, 22.00, '2021-12-06 14:22:04', '2021-12-06 14:17:29', '2022-01-25 09:38:35'),
(245, 6, 'Titfuck', 1, 0.00, '2021-12-06 14:22:04', '2021-12-06 14:17:29', '2022-01-25 09:38:35'),
(246, 6, 'Pussy licking', 0, 17.00, '2021-12-06 14:22:04', '2021-12-06 14:17:29', '2022-01-25 09:38:35'),
(247, 6, 'Sex with condom', 0, 2.00, '2021-12-06 14:22:04', '2021-12-06 14:17:29', '2022-01-25 09:38:35'),
(248, 6, 'Sex without condom', 0, 14.00, '2021-12-06 14:22:04', '2021-12-06 14:17:29', '2022-01-25 09:38:35'),
(249, 6, 'Relaxing Massage', 0, 10.00, '2022-01-25 11:22:13', '2021-12-06 14:22:04', '2022-01-25 11:22:13'),
(250, 6, 'Erotic Massage', 0, 13.00, '2022-01-25 11:22:13', '2021-12-06 14:22:04', '2022-01-25 11:22:13'),
(251, 6, 'Kissing with tongue', 0, 12.00, '2022-01-25 11:22:13', '2021-12-06 14:22:04', '2022-01-25 11:22:13'),
(252, 6, 'Striptease', 1, 0.00, '2022-01-25 11:22:13', '2021-12-06 14:22:04', '2022-01-25 11:22:13'),
(253, 6, 'Fingering', 0, 19.00, '2022-01-25 11:22:13', '2021-12-06 14:22:04', '2022-01-25 11:22:13'),
(254, 6, 'Handjob', 0, 22.00, '2022-01-25 11:22:13', '2021-12-06 14:22:04', '2022-01-25 11:22:13'),
(255, 6, 'Titfuck', 1, 0.00, '2022-01-25 11:22:13', '2021-12-06 14:22:04', '2022-01-25 11:22:13'),
(256, 6, 'Pussy licking', 0, 17.00, '2022-01-25 11:22:13', '2021-12-06 14:22:04', '2022-01-25 11:22:13'),
(257, 6, 'Sex with condom', 0, 2.00, '2022-01-25 11:22:13', '2021-12-06 14:22:04', '2022-01-25 11:22:13'),
(258, 6, 'Sex without condom', 0, 14.00, '2022-01-25 11:22:13', '2021-12-06 14:22:04', '2022-01-25 11:22:13'),
(259, 5, 'Striptease', 1, 0.00, '2021-12-06 14:35:57', '2021-12-06 14:26:17', '2022-01-25 09:38:35'),
(260, 1, 'Relaxing Massage', 0, 20.00, '2021-12-06 14:33:39', '2021-12-06 14:29:51', '2022-01-25 09:38:35'),
(261, 1, 'Erotic Massage', 0, 10.00, '2021-12-06 14:33:39', '2021-12-06 14:29:51', '2022-01-25 09:38:35'),
(262, 1, 'Kissing', 1, 0.00, '2021-12-06 14:33:39', '2021-12-06 14:29:51', '2022-01-25 09:38:35'),
(263, 1, 'Kissing with tongue', 1, 0.00, '2021-12-06 14:33:39', '2021-12-06 14:29:51', '2022-01-25 09:38:35'),
(264, 1, 'Girlfriend experience', 0, 10.00, '2021-12-06 14:33:39', '2021-12-06 14:29:51', '2022-01-25 09:38:35'),
(265, 1, 'Striptease', 1, 0.00, '2021-12-06 14:33:39', '2021-12-06 14:29:51', '2022-01-25 09:38:35'),
(266, 1, 'Fingering', 1, 0.00, '2021-12-06 14:33:39', '2021-12-06 14:29:51', '2022-01-25 09:38:35'),
(267, 1, 'Handjob', 1, 0.00, '2021-12-06 14:33:39', '2021-12-06 14:29:51', '2022-01-25 09:38:35'),
(268, 1, 'Titfuck', 0, 10.00, '2021-12-06 14:33:39', '2021-12-06 14:29:51', '2022-01-25 09:38:35'),
(269, 1, 'Rimming (client)', 0, 25.00, '2021-12-06 14:33:39', '2021-12-06 14:29:51', '2022-01-25 09:38:35'),
(270, 1, 'Blowjob with condom', 1, 0.00, '2021-12-06 14:33:39', '2021-12-06 14:29:51', '2022-01-25 09:38:35'),
(271, 1, 'Blowjob without condom', 0, 10.00, '2021-12-06 14:33:39', '2021-12-06 14:29:51', '2022-01-25 09:38:35'),
(272, 1, 'Sex with condom', 1, 0.00, '2021-12-06 14:33:39', '2021-12-06 14:29:51', '2022-01-25 09:38:35'),
(273, 1, 'Sex without condom', 0, 50.00, '2021-12-06 14:33:39', '2021-12-06 14:29:51', '2022-01-25 09:38:35'),
(274, 1, 'Anal sex (me)', 0, 25.00, '2021-12-06 14:33:39', '2021-12-06 14:29:51', '2022-01-25 09:38:35'),
(275, 1, 'Anal sex without condom (me)', 0, 100.00, '2021-12-06 14:33:39', '2021-12-06 14:29:51', '2022-01-25 09:38:35'),
(276, 1, 'Anal sex (client)', 1, 0.00, '2021-12-06 14:33:39', '2021-12-06 14:29:51', '2022-01-25 09:38:35'),
(277, 1, 'Cum on body', 1, 0.00, '2021-12-06 14:33:39', '2021-12-06 14:29:51', '2022-01-25 09:38:35'),
(278, 1, 'Cum on face', 1, 0.00, '2021-12-06 14:33:39', '2021-12-06 14:29:51', '2022-01-25 09:38:35'),
(279, 1, 'Cum in mouth', 1, 0.00, '2021-12-06 14:33:39', '2021-12-06 14:29:51', '2022-01-25 09:38:35'),
(280, 1, 'Swallowing', 0, 80.00, '2021-12-06 14:33:39', '2021-12-06 14:29:51', '2022-01-25 09:38:35'),
(281, 1, 'Toys/Dildo (me)', 0, 50.00, '2021-12-06 14:33:39', '2021-12-06 14:29:51', '2022-01-25 09:38:35'),
(282, 1, 'Toys/Dildo (client)', 1, 0.00, '2021-12-06 14:33:39', '2021-12-06 14:29:51', '2022-01-25 09:38:35'),
(283, 1, 'Photos', 0, 30.00, '2021-12-06 14:33:39', '2021-12-06 14:29:51', '2022-01-25 09:38:35'),
(284, 1, 'Videos', 0, 50.00, '2021-12-06 14:33:39', '2021-12-06 14:29:51', '2022-01-25 09:38:35'),
(285, 1, 'Role Play', 1, 0.00, '2021-12-06 14:33:39', '2021-12-06 14:29:51', '2022-01-25 09:38:35'),
(286, 2, 'Striptease', 1, 0.00, '2021-12-09 14:21:40', '2021-12-06 14:31:26', '2022-01-25 09:38:35'),
(287, 1, 'Relaxing Massage', 0, 20.00, NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35'),
(288, 1, 'Erotic Massage', 0, 10.00, NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35'),
(289, 1, 'Kissing', 1, 0.00, NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35'),
(290, 1, 'Kissing with tongue', 1, 0.00, NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35'),
(291, 1, 'Girlfriend experience', 0, 10.00, NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35'),
(292, 1, 'Striptease', 1, 0.00, NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35'),
(293, 1, 'Fingering', 1, 0.00, NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35'),
(294, 1, 'Handjob', 1, 0.00, NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35'),
(295, 1, 'Titfuck', 0, 10.00, NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35'),
(296, 1, 'Rimming (client)', 0, 25.00, NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35'),
(297, 1, 'Blowjob with condom', 1, 0.00, NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35'),
(298, 1, 'Blowjob without condom', 0, 10.00, NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35'),
(299, 1, 'Sex with condom', 1, 0.00, NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35'),
(300, 1, 'Sex without condom', 0, 50.00, NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35'),
(301, 1, 'Anal sex (me)', 0, 25.00, NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35'),
(302, 1, 'Anal sex without condom (me)', 0, 100.00, NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35'),
(303, 1, 'Anal sex (client)', 1, 0.00, NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35'),
(304, 1, 'Cum on body', 1, 0.00, NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35'),
(305, 1, 'Cum on face', 1, 0.00, NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35'),
(306, 1, 'Cum in mouth', 1, 0.00, NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35'),
(307, 1, 'Swallowing', 0, 80.00, NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35'),
(308, 1, 'Toys/Dildo (me)', 0, 50.00, NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35'),
(309, 1, 'Toys/Dildo (client)', 1, 0.00, NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35'),
(310, 1, 'Photos', 0, 30.00, NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35'),
(311, 1, 'Videos', 0, 50.00, NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35'),
(312, 1, 'Role Play', 1, 0.00, NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35'),
(313, 5, 'Striptease', 1, 0.00, NULL, '2021-12-06 14:35:57', '2022-01-25 09:38:35'),
(314, 17, 'Relaxing Massage', 0, 0.00, '2021-12-09 14:02:56', '2021-12-09 14:00:08', '2022-01-25 09:38:35'),
(315, 17, 'Erotic Massage', 0, 0.00, '2021-12-09 14:02:56', '2021-12-09 14:00:08', '2022-01-25 09:38:35'),
(316, 17, 'Anal Massage', 0, 0.00, '2021-12-09 14:02:56', '2021-12-09 14:00:08', '2022-01-25 09:38:35'),
(317, 17, 'Kissing', 0, 0.00, '2021-12-09 14:02:56', '2021-12-09 14:00:08', '2022-01-25 09:38:35'),
(318, 17, 'Kissing with tongue', 0, 0.00, '2021-12-09 14:02:56', '2021-12-09 14:00:08', '2022-01-25 09:38:35'),
(319, 17, 'Handjob', 0, 0.00, '2021-12-09 14:02:56', '2021-12-09 14:00:08', '2022-01-25 09:38:35'),
(320, 17, 'Relaxing Massage', 1, 0.00, '2021-12-09 14:09:54', '2021-12-09 14:02:56', '2022-01-25 09:38:35'),
(321, 17, 'Erotic Massage', 1, 0.00, '2021-12-09 14:09:54', '2021-12-09 14:02:56', '2022-01-25 09:38:35'),
(322, 17, 'Kissing', 1, 0.00, '2021-12-09 14:09:54', '2021-12-09 14:02:56', '2022-01-25 09:38:35'),
(323, 17, 'Kissing with tongue', 1, 0.00, '2021-12-09 14:09:54', '2021-12-09 14:02:56', '2022-01-25 09:38:35'),
(324, 17, 'Handjob', 1, 0.00, '2021-12-09 14:09:54', '2021-12-09 14:02:56', '2022-01-25 09:38:35'),
(325, 17, 'Blowjob without condom', 0, 100.00, '2021-12-09 14:09:54', '2021-12-09 14:02:56', '2022-01-25 09:38:35'),
(326, 17, 'Relaxing Massage', 1, 0.00, '2021-12-09 14:26:39', '2021-12-09 14:09:54', '2022-01-25 09:38:35'),
(327, 17, 'Erotic Massage', 1, 0.00, '2021-12-09 14:26:39', '2021-12-09 14:09:54', '2022-01-25 09:38:35'),
(328, 17, 'Kissing', 1, 0.00, '2021-12-09 14:26:39', '2021-12-09 14:09:54', '2022-01-25 09:38:35'),
(329, 17, 'Kissing with tongue', 1, 0.00, '2021-12-09 14:26:39', '2021-12-09 14:09:54', '2022-01-25 09:38:35'),
(330, 17, 'Handjob', 1, 0.00, '2021-12-09 14:26:39', '2021-12-09 14:09:54', '2022-01-25 09:38:35'),
(331, 17, 'Blowjob without condom', 0, 100.00, '2021-12-09 14:26:39', '2021-12-09 14:09:54', '2022-01-25 09:38:35'),
(332, 4, 'Striptease', 1, 0.00, NULL, '2021-12-09 14:19:49', '2022-01-25 09:38:35'),
(333, 2, 'Striptease', 1, 0.00, NULL, '2021-12-09 14:21:40', '2022-01-25 09:38:35'),
(334, 17, 'Relaxing Massage', 1, 0.00, '2021-12-09 14:27:09', '2021-12-09 14:26:39', '2022-01-25 09:38:35'),
(335, 17, 'Erotic Massage', 1, 0.00, '2021-12-09 14:27:09', '2021-12-09 14:26:39', '2022-01-25 09:38:35'),
(336, 17, 'Kissing', 1, 0.00, '2021-12-09 14:27:09', '2021-12-09 14:26:39', '2022-01-25 09:38:35'),
(337, 17, 'Kissing with tongue', 1, 0.00, '2021-12-09 14:27:09', '2021-12-09 14:26:39', '2022-01-25 09:38:35'),
(338, 17, 'Handjob', 1, 0.00, '2021-12-09 14:27:09', '2021-12-09 14:26:39', '2022-01-25 09:38:35'),
(339, 17, 'Blowjob without condom', 0, 100.00, '2021-12-09 14:27:09', '2021-12-09 14:26:39', '2022-01-25 09:38:35'),
(340, 17, 'Relaxing Massage', 1, 0.00, '2021-12-09 14:28:58', '2021-12-09 14:27:09', '2022-01-25 09:38:35'),
(341, 17, 'Erotic Massage', 1, 0.00, '2021-12-09 14:28:58', '2021-12-09 14:27:09', '2022-01-25 09:38:35'),
(342, 17, 'Kissing', 1, 0.00, '2021-12-09 14:28:58', '2021-12-09 14:27:09', '2022-01-25 09:38:35'),
(343, 17, 'Kissing with tongue', 1, 0.00, '2021-12-09 14:28:58', '2021-12-09 14:27:09', '2022-01-25 09:38:35'),
(344, 17, 'Handjob', 1, 0.00, '2021-12-09 14:28:58', '2021-12-09 14:27:09', '2022-01-25 09:38:35'),
(345, 17, 'Blowjob without condom', 0, 100.00, '2021-12-09 14:28:58', '2021-12-09 14:27:09', '2022-01-25 09:38:35'),
(346, 17, 'Relaxing Massage', 1, 0.00, NULL, '2021-12-09 14:28:58', '2022-01-25 09:38:35'),
(347, 17, 'Erotic Massage', 1, 0.00, NULL, '2021-12-09 14:28:58', '2022-01-25 09:38:35'),
(348, 17, 'Kissing', 1, 0.00, NULL, '2021-12-09 14:28:58', '2022-01-25 09:38:35'),
(349, 17, 'Kissing with tongue', 1, 0.00, NULL, '2021-12-09 14:28:58', '2022-01-25 09:38:35'),
(350, 17, 'Handjob', 1, 0.00, NULL, '2021-12-09 14:28:58', '2022-01-25 09:38:35'),
(351, 17, 'Blowjob without condom', 0, 100.00, NULL, '2021-12-09 14:28:58', '2022-01-25 09:38:35'),
(352, 18, 'Relaxing Massage', 1, 0.00, NULL, '2021-12-10 12:24:51', '2022-01-25 09:38:35'),
(353, 18, 'Erotic Massage', 1, 0.00, NULL, '2021-12-10 12:24:51', '2022-01-25 09:38:35'),
(354, 18, 'Anal Massage', 1, 0.00, NULL, '2021-12-10 12:24:51', '2022-01-25 09:38:35'),
(355, 18, 'Kissing', 0, 50.00, NULL, '2021-12-10 12:24:51', '2022-01-25 09:38:35'),
(356, 18, 'Kissing with tongue', 0, 100.00, NULL, '2021-12-10 12:24:51', '2022-01-25 09:38:35'),
(357, 18, 'Girlfriend experience', 1, 0.00, NULL, '2021-12-10 12:24:51', '2022-01-25 09:38:35'),
(358, 18, 'Fingering', 0, 100.00, NULL, '2021-12-10 12:24:51', '2022-01-25 09:38:35'),
(359, 18, 'Handjob', 0, 0.00, NULL, '2021-12-10 12:24:51', '2022-01-25 09:38:35'),
(360, 18, 'Rimming (client)', 0, 100.00, NULL, '2021-12-10 12:24:51', '2022-01-25 09:38:35'),
(361, 18, 'Blowjob with condom', 0, 0.00, NULL, '2021-12-10 12:24:51', '2022-01-25 09:38:35'),
(362, 19, 'Photos', 1, 0.00, '2021-12-27 04:48:58', '2021-12-22 10:48:20', '2022-01-25 09:38:35'),
(363, 19, 'Phone sex', 0, 99.00, '2021-12-27 04:48:58', '2021-12-22 10:48:20', '2022-01-25 09:38:35'),
(364, 19, 'Photos', 1, 0.00, NULL, '2021-12-27 10:18:58', '2022-01-25 09:38:35'),
(365, 19, 'Cum on face', 0, 11.00, NULL, '2021-12-27 10:18:58', '2022-01-25 09:38:35'),
(366, 19, 'Cum in mouth', 1, 0.00, NULL, '2021-12-27 10:18:58', '2022-01-25 09:38:35'),
(367, 19, 'Swallowing', 0, 22.00, NULL, '2021-12-27 10:18:58', '2022-01-25 09:38:35'),
(368, 19, 'Toys/Dildo (me)', 1, 0.00, NULL, '2021-12-27 10:18:58', '2022-01-25 09:38:35'),
(369, 19, 'Toys/Dildo (client)', 0, 33.00, NULL, '2021-12-27 10:18:58', '2022-01-25 09:38:35'),
(370, 19, 'Phone sex', 0, 99.00, NULL, '2021-12-27 10:18:58', '2022-01-25 09:38:35'),
(371, 20, 'Photos', 1, 0.00, NULL, '2021-12-28 05:48:13', '2022-01-25 09:38:35'),
(372, 20, 'Cum on face', 1, 0.00, NULL, '2021-12-28 05:48:13', '2022-01-25 09:38:35'),
(373, 20, 'Cum in mouth', 0, 99.00, NULL, '2021-12-28 05:48:13', '2022-01-25 09:38:35'),
(374, 21, 'Photos', 0, 11.00, NULL, '2021-12-28 06:04:36', '2022-01-25 09:38:35'),
(375, 21, 'Cum on face', 0, 22.00, NULL, '2021-12-28 06:04:36', '2022-01-25 09:38:35'),
(376, 21, 'Cum in mouth', 0, 33.00, NULL, '2021-12-28 06:04:36', '2022-01-25 09:38:35'),
(377, 21, 'Swallowing', 0, 44.00, NULL, '2021-12-28 06:04:36', '2022-01-25 09:38:35'),
(378, 21, 'Toys/Dildo (me)', 0, 55.00, NULL, '2021-12-28 06:04:36', '2022-01-25 09:38:35'),
(379, 21, 'Toys/Dildo (client)', 1, 0.00, NULL, '2021-12-28 06:04:36', '2022-01-25 09:38:35'),
(380, 21, 'Trio MFF', 1, 0.00, NULL, '2021-12-28 06:04:36', '2022-01-25 09:38:35'),
(381, 21, 'Trio MMF', 1, 0.00, NULL, '2021-12-28 06:04:36', '2022-01-25 09:38:35'),
(382, 21, 'Lesbian sex', 1, 0.00, NULL, '2021-12-28 06:04:36', '2022-01-25 09:38:35'),
(383, 22, 'Photos', 1, 0.00, NULL, '2021-12-29 14:24:54', '2022-01-25 09:38:35'),
(384, 22, 'Cum on face', 0, 44.00, NULL, '2021-12-29 14:24:54', '2022-01-25 09:38:35'),
(385, 22, 'Cum in mouth', 1, 0.00, NULL, '2021-12-29 14:24:54', '2022-01-25 09:38:35'),
(411, 26, 'Sauna', 0, 11.00, NULL, '2021-12-30 11:32:31', '2022-01-25 09:38:35'),
(412, 26, 'BDSM room', 1, 0.00, NULL, '2021-12-30 11:32:31', '2022-01-25 09:38:35'),
(413, 26, 'Private rooms', 0, 22.00, NULL, '2021-12-30 11:32:31', '2022-01-25 09:38:35'),
(414, 26, 'Erotic massage', 1, 0.00, NULL, '2021-12-30 11:32:31', '2022-01-25 09:38:35'),
(415, 26, 'Sauna', 0, 11.00, NULL, '2021-12-30 11:32:31', '2022-01-25 09:38:35'),
(434, 31, 'Relaxing Massage', 1, 0.00, '2022-01-07 07:40:07', '2022-01-07 07:37:14', '2022-01-25 09:38:35'),
(435, 31, 'Erotic Massage', 1, 0.00, '2022-01-07 07:40:07', '2022-01-07 07:37:14', '2022-01-25 09:38:35'),
(436, 31, 'Anal Massage', 1, 0.00, '2022-01-07 07:40:07', '2022-01-07 07:37:14', '2022-01-25 09:38:35'),
(437, 31, 'Kissing', 1, 0.00, '2022-01-07 07:40:07', '2022-01-07 07:37:14', '2022-01-25 09:38:35'),
(438, 31, 'Kissing with tongue', 1, 0.00, '2022-01-07 07:40:07', '2022-01-07 07:37:14', '2022-01-25 09:38:35'),
(439, 31, 'Girlfriend experience', 1, 0.00, '2022-01-07 07:40:07', '2022-01-07 07:37:14', '2022-01-25 09:38:35'),
(440, 31, 'Striptease', 0, 100.00, '2022-01-07 07:40:07', '2022-01-07 07:37:14', '2022-01-25 09:38:35'),
(441, 31, 'Fingering', 0, 200.00, '2022-01-07 07:40:07', '2022-01-07 07:37:14', '2022-01-25 09:38:35'),
(442, 31, 'Handjob', 1, 0.00, '2022-01-07 07:40:07', '2022-01-07 07:37:14', '2022-01-25 09:38:35'),
(443, 31, 'Titfuck', 0, 300.00, '2022-01-07 07:40:07', '2022-01-07 07:37:14', '2022-01-25 09:38:35'),
(444, 31, 'Pussy licking', 0, 200.00, '2022-01-07 07:40:07', '2022-01-07 07:37:14', '2022-01-25 09:38:35'),
(445, 31, 'Rimming (me)', 0, 200.00, '2022-01-07 07:40:07', '2022-01-07 07:37:14', '2022-01-25 09:38:35'),
(446, 31, 'Rimming (client)', 0, 300.00, '2022-01-07 07:40:07', '2022-01-07 07:37:14', '2022-01-25 09:38:35'),
(447, 31, 'Blowjob with condom', 0, 100.00, '2022-01-07 07:40:07', '2022-01-07 07:37:14', '2022-01-25 09:38:35'),
(448, 31, 'Blowjob without condom', 1, 0.00, '2022-01-07 07:40:07', '2022-01-07 07:37:14', '2022-01-25 09:38:35'),
(449, 31, 'Deep Throat', 0, 100.00, '2022-01-07 07:40:07', '2022-01-07 07:37:14', '2022-01-25 09:38:35'),
(450, 31, 'Sex with condom', 0, 200.00, '2022-01-07 07:40:07', '2022-01-07 07:37:14', '2022-01-25 09:38:35'),
(451, 31, 'Sex without condom', 0, 700.00, '2022-01-07 07:40:07', '2022-01-07 07:37:14', '2022-01-25 09:38:35'),
(452, 31, 'Anal sex (me)', 0, 800.00, '2022-01-07 07:40:07', '2022-01-07 07:37:14', '2022-01-25 09:38:35'),
(453, 31, 'Anal sex without condom (me)', 0, 900.00, '2022-01-07 07:40:07', '2022-01-07 07:37:14', '2022-01-25 09:38:35'),
(454, 31, 'Anal sex (client)', 0, 700.00, '2022-01-07 07:40:07', '2022-01-07 07:37:14', '2022-01-25 09:38:35'),
(455, 31, 'Cum on body', 0, 200.00, '2022-01-07 07:40:07', '2022-01-07 07:37:14', '2022-01-25 09:38:35'),
(456, 31, 'Cum on face', 0, 400.00, '2022-01-07 07:40:07', '2022-01-07 07:37:14', '2022-01-25 09:38:35'),
(457, 31, 'Relaxing Massage', 1, 0.00, NULL, '2022-01-07 07:40:07', '2022-01-25 09:38:35'),
(458, 31, 'Erotic Massage', 1, 0.00, NULL, '2022-01-07 07:40:07', '2022-01-25 09:38:35'),
(459, 31, 'Kissing', 1, 0.00, NULL, '2022-01-07 07:40:07', '2022-01-25 09:38:35'),
(460, 31, 'Kissing with tongue', 1, 0.00, NULL, '2022-01-07 07:40:07', '2022-01-25 09:38:35'),
(461, 31, 'Girlfriend experience', 1, 0.00, NULL, '2022-01-07 07:40:07', '2022-01-25 09:38:35'),
(462, 31, 'Striptease', 0, 100.00, NULL, '2022-01-07 07:40:07', '2022-01-25 09:38:35'),
(463, 31, 'Fingering', 0, 200.00, NULL, '2022-01-07 07:40:07', '2022-01-25 09:38:35'),
(464, 31, 'Handjob', 1, 0.00, NULL, '2022-01-07 07:40:07', '2022-01-25 09:38:35'),
(465, 31, 'Titfuck', 0, 300.00, NULL, '2022-01-07 07:40:07', '2022-01-25 09:38:35'),
(466, 31, 'Pussy licking', 0, 200.00, NULL, '2022-01-07 07:40:07', '2022-01-25 09:38:35'),
(467, 31, 'Rimming (me)', 0, 200.00, NULL, '2022-01-07 07:40:07', '2022-01-25 09:38:35'),
(468, 31, 'Rimming (client)', 0, 300.00, NULL, '2022-01-07 07:40:07', '2022-01-25 09:38:35'),
(469, 31, 'Blowjob with condom', 0, 100.00, NULL, '2022-01-07 07:40:07', '2022-01-25 09:38:35'),
(470, 31, 'Blowjob without condom', 1, 0.00, NULL, '2022-01-07 07:40:07', '2022-01-25 09:38:35'),
(471, 31, 'Deep Throat', 0, 100.00, NULL, '2022-01-07 07:40:07', '2022-01-25 09:38:35'),
(472, 31, 'Sex with condom', 0, 200.00, NULL, '2022-01-07 07:40:07', '2022-01-25 09:38:35'),
(473, 31, 'Sex without condom', 0, 700.00, NULL, '2022-01-07 07:40:07', '2022-01-25 09:38:35'),
(474, 31, 'Anal sex (me)', 0, 800.00, NULL, '2022-01-07 07:40:07', '2022-01-25 09:38:35'),
(475, 31, 'Anal sex without condom (me)', 0, 900.00, NULL, '2022-01-07 07:40:07', '2022-01-25 09:38:35'),
(476, 31, 'Anal sex (client)', 0, 700.00, NULL, '2022-01-07 07:40:07', '2022-01-25 09:38:35'),
(477, 31, 'Cum on body', 0, 200.00, NULL, '2022-01-07 07:40:07', '2022-01-25 09:38:35'),
(478, 31, 'Cum on face', 0, 400.00, NULL, '2022-01-07 07:40:07', '2022-01-25 09:38:35'),
(479, 32, 'Relaxing Massage', 1, 0.00, NULL, '2022-01-07 07:53:55', '2022-01-25 09:38:35'),
(480, 32, 'Erotic Massage', 1, 0.00, NULL, '2022-01-07 07:53:55', '2022-01-25 09:38:35'),
(481, 32, 'Anal Massage', 1, 0.00, NULL, '2022-01-07 07:53:55', '2022-01-25 09:38:35'),
(482, 32, 'Kissing', 1, 0.00, NULL, '2022-01-07 07:53:55', '2022-01-25 09:38:35'),
(483, 32, 'Kissing with tongue', 1, 0.00, NULL, '2022-01-07 07:53:55', '2022-01-25 09:38:35'),
(484, 32, 'Girlfriend experience', 1, 0.00, NULL, '2022-01-07 07:53:55', '2022-01-25 09:38:35'),
(485, 32, 'Striptease', 1, 0.00, NULL, '2022-01-07 07:53:55', '2022-01-25 09:38:35'),
(486, 32, 'Fingering', 1, 0.00, NULL, '2022-01-07 07:53:55', '2022-01-25 09:38:35'),
(487, 32, 'Handjob', 1, 0.00, NULL, '2022-01-07 07:53:55', '2022-01-25 09:38:35'),
(488, 32, 'Titfuck', 0, 200.00, NULL, '2022-01-07 07:53:55', '2022-01-25 09:38:35'),
(489, 32, 'Pussy licking', 1, 0.00, NULL, '2022-01-07 07:53:55', '2022-01-25 09:38:35'),
(490, 32, 'Rimming (me)', 0, 200.00, NULL, '2022-01-07 07:53:55', '2022-01-25 09:38:35'),
(491, 32, 'Rimming (client)', 0, 200.00, NULL, '2022-01-07 07:53:55', '2022-01-25 09:38:35'),
(492, 32, 'Blowjob with condom', 1, 0.00, NULL, '2022-01-07 07:53:55', '2022-01-25 09:38:35'),
(493, 32, 'Blowjob without condom', 0, 200.00, NULL, '2022-01-07 07:53:55', '2022-01-25 09:38:35'),
(494, 32, 'Deep Throat', 1, 0.00, NULL, '2022-01-07 07:53:55', '2022-01-25 09:38:35'),
(495, 32, 'Sex with condom', 1, 0.00, NULL, '2022-01-07 07:53:55', '2022-01-25 09:38:35'),
(496, 32, 'Sex without condom', 0, 500.00, NULL, '2022-01-07 07:53:55', '2022-01-25 09:38:35'),
(497, 32, 'Anal sex (me)', 0, 500.00, NULL, '2022-01-07 07:53:55', '2022-01-25 09:38:35'),
(498, 32, 'Anal sex without condom (me)', 0, 500.00, NULL, '2022-01-07 07:53:55', '2022-01-25 09:38:35'),
(499, 32, 'Anal sex (client)', 0, 300.00, NULL, '2022-01-07 07:53:55', '2022-01-25 09:38:35'),
(500, 32, 'Cum on body', 1, 0.00, NULL, '2022-01-07 07:53:55', '2022-01-25 09:38:35'),
(501, 32, 'Cum on face', 1, 0.00, NULL, '2022-01-07 07:53:55', '2022-01-25 09:38:35'),
(502, 32, 'Cum in mouth', 0, 300.00, NULL, '2022-01-07 07:53:55', '2022-01-25 09:38:35'),
(503, 33, 'Relaxing Massage', 1, 0.00, NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(504, 33, 'Erotic Massage', 1, 0.00, NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(505, 33, 'Anal Massage', 1, 0.00, NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(506, 33, 'Kissing', 1, 0.00, NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(507, 33, 'Kissing with tongue', 1, 0.00, NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(508, 33, 'Girlfriend experience', 1, 0.00, NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(509, 33, 'Striptease', 1, 0.00, NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(510, 33, 'Fingering', 1, 0.00, NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(511, 33, 'Handjob', 1, 0.00, NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(512, 33, 'Titfuck', 0, 300.00, NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(513, 33, 'Pussy licking', 1, 0.00, NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(514, 33, 'Rimming (me)', 1, 0.00, NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(515, 33, 'Rimming (client)', 0, 300.00, NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(516, 33, 'Blowjob with condom', 1, 0.00, NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(517, 33, 'Blowjob without condom', 1, 0.00, NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(518, 33, 'Deep Throat', 1, 0.00, NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(519, 33, 'Sex with condom', 1, 0.00, NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(520, 33, 'Sex without condom', 0, 900.00, NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(521, 33, 'Anal sex (me)', 0, 400.00, NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(522, 33, 'Anal sex without condom (me)', 0, 900.00, NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(523, 33, 'Anal sex (client)', 0, 900.00, NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(524, 33, 'Cum on body', 1, 0.00, NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(525, 33, 'Cum on face', 1, 0.00, NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(526, 33, 'Cum in mouth', 0, 300.00, NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(527, 33, 'Swallowing', 0, 0.00, NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(528, 33, 'Toys/Dildo (me)', 1, 0.00, NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(529, 33, 'Role Play', 1, 0.00, NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(530, 33, 'Golden Shower (me)', 0, 700.00, NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(531, 33, 'Golden Shower (client)', 0, 900.00, NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(532, 34, 'Relaxing Massage', 1, 0.00, NULL, '2022-01-07 08:35:17', '2022-01-25 09:38:35'),
(533, 34, 'Erotic Massage', 1, 0.00, NULL, '2022-01-07 08:35:17', '2022-01-25 09:38:35'),
(534, 34, 'Anal Massage', 1, 0.00, NULL, '2022-01-07 08:35:17', '2022-01-25 09:38:35'),
(535, 34, 'Kissing', 1, 0.00, NULL, '2022-01-07 08:35:17', '2022-01-25 09:38:35'),
(536, 34, 'Kissing with tongue', 1, 0.00, NULL, '2022-01-07 08:35:17', '2022-01-25 09:38:35'),
(537, 34, 'Girlfriend experience', 1, 0.00, NULL, '2022-01-07 08:35:17', '2022-01-25 09:38:35'),
(538, 34, 'Striptease', 1, 0.00, NULL, '2022-01-07 08:35:17', '2022-01-25 09:38:35'),
(539, 34, 'Fingering', 1, 0.00, NULL, '2022-01-07 08:35:17', '2022-01-25 09:38:35'),
(540, 34, 'Handjob', 1, 0.00, NULL, '2022-01-07 08:35:17', '2022-01-25 09:38:35'),
(541, 34, 'Pussy licking', 0, 400.00, NULL, '2022-01-07 08:35:17', '2022-01-25 09:38:35'),
(542, 34, 'Rimming (me)', 0, 200.00, NULL, '2022-01-07 08:35:17', '2022-01-25 09:38:35'),
(543, 34, 'Rimming (client)', 0, 200.00, NULL, '2022-01-07 08:35:17', '2022-01-25 09:38:35'),
(544, 34, 'Blowjob with condom', 1, 0.00, NULL, '2022-01-07 08:35:17', '2022-01-25 09:38:35'),
(545, 34, 'Blowjob without condom', 1, 0.00, NULL, '2022-01-07 08:35:17', '2022-01-25 09:38:35'),
(546, 34, 'Deep Throat', 1, 0.00, NULL, '2022-01-07 08:35:17', '2022-01-25 09:38:35'),
(547, 34, 'Sex with condom', 1, 0.00, NULL, '2022-01-07 08:35:17', '2022-01-25 09:38:35'),
(548, 34, 'Sex without condom', 0, 900.00, NULL, '2022-01-07 08:35:17', '2022-01-25 09:38:35'),
(572, 30, 'Parking', 1, 0.00, NULL, '2022-01-07 08:52:32', '2022-01-25 09:38:35'),
(573, 30, 'Taxi Service', 1, 0.00, NULL, '2022-01-07 08:52:32', '2022-01-25 09:38:35'),
(574, 30, 'Discrete entrance', 0, 100.00, NULL, '2022-01-07 08:52:32', '2022-01-25 09:38:35'),
(575, 30, 'Wifi', 1, 0.00, NULL, '2022-01-07 08:52:32', '2022-01-25 09:38:35'),
(576, 30, 'Smoking area', 1, 0.00, NULL, '2022-01-07 08:52:32', '2022-01-25 09:38:35');
INSERT INTO `advertisement_services` (`id`, `advertisement_id`, `service_name`, `include`, `price`, `deleted_at`, `created_at`, `updated_at`) VALUES
(577, 30, 'Lounge area', 1, 0.00, NULL, '2022-01-07 08:52:32', '2022-01-25 09:38:35'),
(578, 30, 'Bar with alcoholic drinks', 1, 0.00, NULL, '2022-01-07 08:52:32', '2022-01-25 09:38:35'),
(579, 30, 'Bar with non-alcoholic drinks', 1, 0.00, NULL, '2022-01-07 08:52:32', '2022-01-25 09:38:35'),
(580, 30, 'Restaurant with snacks', 1, 0.00, NULL, '2022-01-07 08:52:32', '2022-01-25 09:38:35'),
(581, 30, 'Restaurant with buffet', 1, 0.00, NULL, '2022-01-07 08:52:32', '2022-01-25 09:38:35'),
(582, 30, 'Sex shop', 0, 400.00, NULL, '2022-01-07 08:52:32', '2022-01-25 09:38:35'),
(583, 30, 'Cinema', 0, 900.00, NULL, '2022-01-07 08:52:32', '2022-01-25 09:38:35'),
(584, 30, 'Disco/dancing', 0, 300.00, NULL, '2022-01-07 08:52:32', '2022-01-25 09:38:35'),
(585, 30, 'Swimming pool', 1, 0.00, NULL, '2022-01-07 08:52:32', '2022-01-25 09:38:35'),
(586, 30, 'Dressing room', 1, 0.00, NULL, '2022-01-07 08:52:32', '2022-01-25 09:38:35'),
(587, 30, 'Showers', 1, 0.00, NULL, '2022-01-07 08:52:32', '2022-01-25 09:38:35'),
(588, 30, 'Towels', 1, 0.00, NULL, '2022-01-07 08:52:32', '2022-01-25 09:38:35'),
(589, 30, 'Bathrobe', 1, 0.00, NULL, '2022-01-07 08:52:32', '2022-01-25 09:38:35'),
(590, 30, 'Relaxing massage', 0, 300.00, NULL, '2022-01-07 08:52:32', '2022-01-25 09:38:35'),
(591, 30, 'Erotic massage', 0, 500.00, NULL, '2022-01-07 08:52:32', '2022-01-25 09:38:35'),
(592, 35, 'Relaxing Massage', 0, 11.00, NULL, '2022-01-19 09:45:20', '2022-01-25 09:38:35'),
(593, 35, 'Erotic Massage', 1, 0.00, NULL, '2022-01-19 09:45:20', '2022-01-25 09:38:35'),
(594, 36, 'Parking', 1, 0.00, NULL, '2022-01-21 10:38:08', '2022-01-25 09:38:35'),
(595, 36, 'Taxi Service', 1, 0.00, NULL, '2022-01-21 10:38:08', '2022-01-25 09:38:35'),
(596, 36, 'Discrete entrance', 1, 0.00, NULL, '2022-01-21 10:38:08', '2022-01-25 09:38:35'),
(597, 36, 'Wifi', 1, 0.00, NULL, '2022-01-21 10:38:08', '2022-01-25 09:38:35'),
(598, 36, 'Smoking area', 1, 0.00, NULL, '2022-01-21 10:38:08', '2022-01-25 09:38:35'),
(599, 36, 'Lounge area', 1, 0.00, NULL, '2022-01-21 10:38:08', '2022-01-25 09:38:35'),
(600, 36, 'Bar with alcoholic drinks', 0, 900.00, NULL, '2022-01-21 10:38:08', '2022-01-25 09:38:35'),
(601, 36, 'Bar with non-alcoholic drinks', 0, 500.00, NULL, '2022-01-21 10:38:08', '2022-01-25 09:38:35'),
(602, 36, 'Restaurant with snacks', 0, 200.00, NULL, '2022-01-21 10:38:08', '2022-01-25 09:38:35'),
(603, 36, 'Restaurant with buffet', 0, 400.00, NULL, '2022-01-21 10:38:08', '2022-01-25 09:38:35'),
(604, 36, 'Sex shop', 0, 300.00, NULL, '2022-01-21 10:38:08', '2022-01-25 09:38:35'),
(605, 36, 'Cinema', 0, 500.00, NULL, '2022-01-21 10:38:08', '2022-01-25 09:38:35'),
(606, 36, 'Swimming pool', 0, 300.00, NULL, '2022-01-21 10:38:08', '2022-01-25 09:38:35'),
(607, 36, 'Dressing room', 0, 100.00, NULL, '2022-01-21 10:38:08', '2022-01-25 09:38:35'),
(608, 36, 'Showers', 1, 0.00, NULL, '2022-01-21 10:38:08', '2022-01-25 09:38:35'),
(609, 36, 'Towels', 1, 0.00, NULL, '2022-01-21 10:38:08', '2022-01-25 09:38:35'),
(610, 36, 'Garden/outdoor area', 1, 0.00, NULL, '2022-01-21 10:38:08', '2022-01-25 09:38:35'),
(611, 36, 'Relaxing massage', 0, 100.00, NULL, '2022-01-21 10:38:08', '2022-01-25 09:38:35'),
(612, 36, 'Erotic massage', 0, 200.00, NULL, '2022-01-21 10:38:08', '2022-01-25 09:38:35'),
(613, 36, 'Striptease', 0, 300.00, NULL, '2022-01-21 10:38:08', '2022-01-25 09:38:35'),
(614, 36, 'Lapdance', 1, 0.00, NULL, '2022-01-21 10:38:08', '2022-01-25 09:38:35'),
(615, 36, 'Sex show', 1, 0.00, NULL, '2022-01-21 10:38:08', '2022-01-25 09:38:35'),
(616, 36, 'Private rooms', 1, 0.00, NULL, '2022-01-21 10:38:08', '2022-01-25 09:38:35'),
(617, 36, 'BDSM room', 1, 0.00, NULL, '2022-01-21 10:38:08', '2022-01-25 09:38:35'),
(618, 37, 'Relaxing Massage', 1, 0.00, NULL, '2022-01-21 10:57:23', '2022-01-25 09:38:35'),
(619, 37, 'Erotic Massage', 1, 0.00, NULL, '2022-01-21 10:57:23', '2022-01-25 09:38:35'),
(620, 37, 'Anal Massage', 1, 0.00, NULL, '2022-01-21 10:57:23', '2022-01-25 09:38:35'),
(621, 37, 'Kissing', 1, 0.00, NULL, '2022-01-21 10:57:23', '2022-01-25 09:38:35'),
(622, 37, 'Kissing with tongue', 1, 0.00, NULL, '2022-01-21 10:57:23', '2022-01-25 09:38:35'),
(623, 37, 'Girlfriend experience', 1, 0.00, NULL, '2022-01-21 10:57:23', '2022-01-25 09:38:35'),
(624, 37, 'Striptease', 1, 0.00, NULL, '2022-01-21 10:57:23', '2022-01-25 09:38:35'),
(625, 37, 'Fingering', 0, 100.00, NULL, '2022-01-21 10:57:23', '2022-01-25 09:38:35'),
(626, 37, 'Handjob', 0, 100.00, NULL, '2022-01-21 10:57:23', '2022-01-25 09:38:35'),
(627, 37, 'Titfuck', 0, 100.00, NULL, '2022-01-21 10:57:23', '2022-01-25 09:38:35'),
(628, 37, 'Pussy licking', 0, 100.00, NULL, '2022-01-21 10:57:23', '2022-01-25 09:38:35'),
(629, 37, 'Rimming (me)', 0, 100.00, NULL, '2022-01-21 10:57:23', '2022-01-25 09:38:35'),
(630, 37, 'Rimming (client)', 0, 100.00, NULL, '2022-01-21 10:57:23', '2022-01-25 09:38:35'),
(631, 37, 'Blowjob with condom', 1, 0.00, NULL, '2022-01-21 10:57:23', '2022-01-25 09:38:35'),
(632, 37, 'Blowjob without condom', 1, 0.00, NULL, '2022-01-21 10:57:23', '2022-01-25 09:38:35'),
(633, 37, 'Deep Throat', 1, 0.00, NULL, '2022-01-21 10:57:23', '2022-01-25 09:38:35'),
(634, 37, 'Sex with condom', 0, 100.00, NULL, '2022-01-21 10:57:23', '2022-01-25 09:38:35'),
(635, 37, 'Sex without condom', 0, 200.00, NULL, '2022-01-21 10:57:23', '2022-01-25 09:38:35'),
(636, 37, 'Anal sex (me)', 0, 300.00, NULL, '2022-01-21 10:57:23', '2022-01-25 09:38:35'),
(637, 37, 'Anal sex without condom (me)', 0, 300.00, NULL, '2022-01-21 10:57:23', '2022-01-25 09:38:35'),
(638, 6, 'Relaxing Massage', 0, 10.00, '2022-02-24 11:03:11', '2022-01-25 11:22:13', '2022-02-24 11:03:11'),
(639, 6, 'Erotic Massage', 0, 13.00, '2022-02-24 11:03:11', '2022-01-25 11:22:13', '2022-02-24 11:03:11'),
(640, 6, 'Kissing with tongue', 0, 12.00, '2022-02-24 11:03:11', '2022-01-25 11:22:13', '2022-02-24 11:03:11'),
(641, 6, 'Striptease', 1, 0.00, '2022-02-24 11:03:11', '2022-01-25 11:22:13', '2022-02-24 11:03:11'),
(642, 6, 'Fingering', 0, 19.00, '2022-02-24 11:03:11', '2022-01-25 11:22:13', '2022-02-24 11:03:11'),
(643, 6, 'Handjob', 0, 22.00, '2022-02-24 11:03:11', '2022-01-25 11:22:13', '2022-02-24 11:03:11'),
(644, 6, 'Titfuck', 1, 0.00, '2022-02-24 11:03:11', '2022-01-25 11:22:13', '2022-02-24 11:03:11'),
(645, 6, 'Pussy licking', 0, 17.00, '2022-02-24 11:03:11', '2022-01-25 11:22:13', '2022-02-24 11:03:11'),
(646, 6, 'Sex with condom', 0, 2.00, '2022-02-24 11:03:11', '2022-01-25 11:22:13', '2022-02-24 11:03:11'),
(647, 6, 'Sex without condom', 0, 14.00, '2022-02-24 11:03:11', '2022-01-25 11:22:13', '2022-02-24 11:03:11'),
(648, 38, 'Relaxing Massage', 1, 0.00, NULL, '2022-01-25 12:09:57', '2022-01-25 12:09:57'),
(649, 38, 'Erotic Massage', 1, 0.00, NULL, '2022-01-25 12:09:57', '2022-01-25 12:09:57'),
(650, 38, 'Anal Massage', 1, 0.00, NULL, '2022-01-25 12:09:57', '2022-01-25 12:09:57'),
(651, 38, 'Kissing', 1, 0.00, NULL, '2022-01-25 12:09:57', '2022-01-25 12:09:57'),
(652, 38, 'Kissing with tongue', 1, 0.00, NULL, '2022-01-25 12:09:57', '2022-01-25 12:09:57'),
(653, 38, 'Girlfriend experience', 1, 0.00, NULL, '2022-01-25 12:09:57', '2022-01-25 12:09:57'),
(654, 38, 'Striptease', 1, 0.00, NULL, '2022-01-25 12:09:57', '2022-01-25 12:09:57'),
(655, 38, 'Fingering', 1, 0.00, NULL, '2022-01-25 12:09:57', '2022-01-25 12:09:57'),
(656, 38, 'Handjob', 1, 0.00, NULL, '2022-01-25 12:09:57', '2022-01-25 12:09:57'),
(657, 38, 'Titfuck', 0, 200.00, NULL, '2022-01-25 12:09:57', '2022-01-25 12:09:57'),
(658, 38, 'Pussy licking', 0, 200.00, NULL, '2022-01-25 12:09:57', '2022-01-25 12:09:57'),
(659, 38, 'Sex with condom', 0, 200.00, NULL, '2022-01-25 12:09:57', '2022-01-25 12:09:57'),
(660, 38, 'Cum on body', 1, 0.00, NULL, '2022-01-25 12:09:57', '2022-01-25 12:09:57'),
(661, 38, 'Cum on face', 0, 200.00, NULL, '2022-01-25 12:09:57', '2022-01-25 12:09:57'),
(662, 39, 'Relaxing Massage', 1, 0.00, NULL, '2022-01-25 12:19:28', '2022-01-25 12:19:28'),
(663, 39, 'Erotic Massage', 1, 0.00, NULL, '2022-01-25 12:19:28', '2022-01-25 12:19:28'),
(664, 39, 'Anal Massage', 1, 0.00, NULL, '2022-01-25 12:19:28', '2022-01-25 12:19:28'),
(665, 39, 'Kissing', 1, 0.00, NULL, '2022-01-25 12:19:28', '2022-01-25 12:19:28'),
(666, 39, 'Kissing with tongue', 1, 0.00, NULL, '2022-01-25 12:19:28', '2022-01-25 12:19:28'),
(667, 39, 'Girlfriend experience', 1, 0.00, NULL, '2022-01-25 12:19:28', '2022-01-25 12:19:28'),
(668, 39, 'Striptease', 1, 0.00, NULL, '2022-01-25 12:19:28', '2022-01-25 12:19:28'),
(669, 39, 'Fingering', 1, 0.00, NULL, '2022-01-25 12:19:28', '2022-01-25 12:19:28'),
(670, 39, 'Handjob', 0, 100.00, NULL, '2022-01-25 12:19:28', '2022-01-25 12:19:28'),
(671, 39, 'Titfuck', 0, 150.00, NULL, '2022-01-25 12:19:28', '2022-01-25 12:19:28'),
(672, 39, 'Pussy licking', 0, 100.00, NULL, '2022-01-25 12:19:28', '2022-01-25 12:19:28'),
(673, 39, 'Rimming (me)', 0, 100.00, NULL, '2022-01-25 12:19:28', '2022-01-25 12:19:28'),
(674, 39, 'Rimming (client)', 0, 100.00, NULL, '2022-01-25 12:19:28', '2022-01-25 12:19:28'),
(675, 39, 'Blowjob with condom', 1, 0.00, NULL, '2022-01-25 12:19:28', '2022-01-25 12:19:28'),
(676, 39, 'Blowjob without condom', 0, 100.00, NULL, '2022-01-25 12:19:28', '2022-01-25 12:19:28'),
(677, 39, 'Deep Throat', 0, 100.00, NULL, '2022-01-25 12:19:28', '2022-01-25 12:19:28'),
(678, 39, 'Sex with condom', 0, 200.00, NULL, '2022-01-25 12:19:28', '2022-01-25 12:19:28'),
(679, 39, 'Sex without condom', 0, 800.00, NULL, '2022-01-25 12:19:28', '2022-01-25 12:19:28'),
(680, 39, 'Anal sex (me)', 0, 800.00, NULL, '2022-01-25 12:19:28', '2022-01-25 12:19:28'),
(681, 39, 'Anal sex without condom (me)', 0, 800.00, NULL, '2022-01-25 12:19:28', '2022-01-25 12:19:28'),
(682, 39, 'Anal sex (client)', 0, 900.00, NULL, '2022-01-25 12:19:28', '2022-01-25 12:19:28'),
(683, 39, 'Cum on body', 0, 200.00, NULL, '2022-01-25 12:19:28', '2022-01-25 12:19:28'),
(684, 39, 'Cum on face', 0, 400.00, NULL, '2022-01-25 12:19:28', '2022-01-25 12:19:28'),
(685, 40, 'Relaxing Massage', 1, 0.00, NULL, '2022-01-25 12:43:09', '2022-01-25 12:43:09'),
(686, 40, 'Erotic Massage', 1, 0.00, NULL, '2022-01-25 12:43:09', '2022-01-25 12:43:09'),
(687, 40, 'Anal Massage', 1, 0.00, NULL, '2022-01-25 12:43:09', '2022-01-25 12:43:09'),
(688, 40, 'Kissing', 1, 0.00, NULL, '2022-01-25 12:43:09', '2022-01-25 12:43:09'),
(689, 40, 'Kissing with tongue', 1, 0.00, NULL, '2022-01-25 12:43:09', '2022-01-25 12:43:09'),
(690, 40, 'Girlfriend experience', 0, 100.00, NULL, '2022-01-25 12:43:09', '2022-01-25 12:43:09'),
(691, 40, 'Striptease', 0, 100.00, NULL, '2022-01-25 12:43:09', '2022-01-25 12:43:09'),
(692, 40, 'Fingering', 0, 100.00, NULL, '2022-01-25 12:43:09', '2022-01-25 12:43:09'),
(693, 40, 'Handjob', 0, 100.00, NULL, '2022-01-25 12:43:09', '2022-01-25 12:43:09'),
(694, 40, 'Titfuck', 0, 100.00, NULL, '2022-01-25 12:43:09', '2022-01-25 12:43:09'),
(695, 40, 'Pussy licking', 0, 100.00, NULL, '2022-01-25 12:43:09', '2022-01-25 12:43:09'),
(696, 40, 'Rimming (me)', 0, 100.00, NULL, '2022-01-25 12:43:09', '2022-01-25 12:43:09'),
(697, 40, 'Rimming (client)', 0, 100.00, NULL, '2022-01-25 12:43:09', '2022-01-25 12:43:09'),
(698, 40, 'Blowjob with condom', 0, 100.00, NULL, '2022-01-25 12:43:09', '2022-01-25 12:43:09'),
(699, 40, 'Blowjob without condom', 0, 100.00, NULL, '2022-01-25 12:43:09', '2022-01-25 12:43:09'),
(700, 41, 'Relaxing Massage', 1, 0.00, NULL, '2022-01-25 14:05:58', '2022-01-25 14:05:58'),
(701, 41, 'Erotic Massage', 1, 0.00, NULL, '2022-01-25 14:05:58', '2022-01-25 14:05:58'),
(702, 41, 'Anal Massage', 1, 0.00, NULL, '2022-01-25 14:05:58', '2022-01-25 14:05:58'),
(703, 41, 'Kissing', 1, 0.00, NULL, '2022-01-25 14:05:58', '2022-01-25 14:05:58'),
(704, 41, 'Kissing with tongue', 1, 0.00, NULL, '2022-01-25 14:05:58', '2022-01-25 14:05:58'),
(705, 41, 'Girlfriend experience', 1, 0.00, NULL, '2022-01-25 14:05:58', '2022-01-25 14:05:58'),
(706, 41, 'Striptease', 1, 0.00, NULL, '2022-01-25 14:05:58', '2022-01-25 14:05:58'),
(707, 41, 'Fingering', 1, 0.00, NULL, '2022-01-25 14:05:58', '2022-01-25 14:05:58'),
(708, 41, 'Handjob', 1, 0.00, NULL, '2022-01-25 14:05:58', '2022-01-25 14:05:58'),
(709, 41, 'Titfuck', 1, 0.00, NULL, '2022-01-25 14:05:58', '2022-01-25 14:05:58'),
(710, 41, 'Pussy licking', 1, 0.00, NULL, '2022-01-25 14:05:58', '2022-01-25 14:05:58'),
(711, 41, 'Rimming (me)', 1, 0.00, NULL, '2022-01-25 14:05:58', '2022-01-25 14:05:58'),
(712, 41, 'Rimming (client)', 1, 0.00, NULL, '2022-01-25 14:05:58', '2022-01-25 14:05:58'),
(713, 41, 'Blowjob with condom', 1, 0.00, NULL, '2022-01-25 14:05:58', '2022-01-25 14:05:58'),
(714, 41, 'Blowjob without condom', 0, 200.00, NULL, '2022-01-25 14:05:58', '2022-01-25 14:05:58'),
(715, 41, 'Deep Throat', 0, 200.00, NULL, '2022-01-25 14:05:58', '2022-01-25 14:05:58'),
(716, 41, 'Sex with condom', 0, 300.00, NULL, '2022-01-25 14:05:58', '2022-01-25 14:05:58'),
(717, 41, 'Sex without condom', 0, 800.00, NULL, '2022-01-25 14:05:58', '2022-01-25 14:05:58'),
(718, 41, 'Anal sex (me)', 0, 400.00, NULL, '2022-01-25 14:05:58', '2022-01-25 14:05:58'),
(719, 41, 'Anal sex without condom (me)', 0, 800.00, NULL, '2022-01-25 14:05:58', '2022-01-25 14:05:58'),
(720, 41, 'Cum on body', 0, 300.00, NULL, '2022-01-25 14:05:58', '2022-01-25 14:05:58'),
(721, 41, 'Cum on face', 0, 400.00, NULL, '2022-01-25 14:05:58', '2022-01-25 14:05:58'),
(722, 41, 'Cum in mouth', 0, 700.00, NULL, '2022-01-25 14:05:58', '2022-01-25 14:05:58'),
(723, 6, 'Relaxing Massage', 0, 10.00, NULL, '2022-02-24 11:03:11', '2022-02-24 11:03:11'),
(724, 6, 'Erotic Massage', 0, 13.00, NULL, '2022-02-24 11:03:11', '2022-02-24 11:03:11'),
(725, 6, 'Kissing with tongue', 0, 12.00, NULL, '2022-02-24 11:03:11', '2022-02-24 11:03:11'),
(726, 6, 'Striptease', 1, 0.00, NULL, '2022-02-24 11:03:11', '2022-02-24 11:03:11'),
(727, 6, 'Fingering', 0, 19.00, NULL, '2022-02-24 11:03:11', '2022-02-24 11:03:11'),
(728, 6, 'Handjob', 0, 22.00, NULL, '2022-02-24 11:03:11', '2022-02-24 11:03:11'),
(729, 6, 'Titfuck', 1, 0.00, NULL, '2022-02-24 11:03:11', '2022-02-24 11:03:11'),
(730, 6, 'Pussy licking', 0, 17.00, NULL, '2022-02-24 11:03:11', '2022-02-24 11:03:11'),
(731, 6, 'Sex with condom', 0, 2.00, NULL, '2022-02-24 11:03:11', '2022-02-24 11:03:11'),
(732, 6, 'Sex without condom', 0, 14.00, NULL, '2022-02-24 11:03:11', '2022-02-24 11:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `advertisement_service_durations`
--

CREATE TABLE `advertisement_service_durations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advertisement_id` int(11) NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisement_service_durations`
--

INSERT INTO `advertisement_service_durations` (`id`, `advertisement_id`, `time`, `price`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 6, '4 Hour', 80.00, '2021-12-06 14:17:29', '2021-11-02 12:30:07', '2022-01-25 09:38:35'),
(2, 7, '15 Min', 12.00, '2021-11-15 03:28:38', '2021-11-15 08:58:05', '2022-01-25 09:38:35'),
(3, 7, '15 Min', 12.00, NULL, '2021-11-15 08:58:38', '2022-01-25 09:38:35'),
(4, 1, '15 Min', 50.00, '2021-11-21 22:24:49', '2021-11-21 22:23:33', '2022-01-25 09:38:35'),
(5, 1, '30 Min', 90.00, '2021-11-21 22:24:49', '2021-11-21 22:23:33', '2022-01-25 09:38:35'),
(6, 1, '1 Hour', 140.00, '2021-11-21 22:24:49', '2021-11-21 22:23:33', '2022-01-25 09:38:35'),
(7, 1, '15 Min', 50.00, '2021-11-21 22:26:18', '2021-11-21 22:24:49', '2022-01-25 09:38:35'),
(8, 1, '30 Min', 90.00, '2021-11-21 22:26:18', '2021-11-21 22:24:49', '2022-01-25 09:38:35'),
(9, 1, '1 Hour', 140.00, '2021-11-21 22:26:18', '2021-11-21 22:24:49', '2022-01-25 09:38:35'),
(10, 1, '2 Hour', 280.00, '2021-11-21 22:26:18', '2021-11-21 22:24:49', '2022-01-25 09:38:35'),
(11, 1, '8 Hour', 600.00, '2021-11-21 22:26:18', '2021-11-21 22:24:49', '2022-01-25 09:38:35'),
(12, 1, '15 Min', 50.00, '2021-12-02 13:47:08', '2021-11-21 22:26:18', '2022-01-25 09:38:35'),
(13, 1, '30 Min', 90.00, '2021-12-02 13:47:08', '2021-11-21 22:26:18', '2022-01-25 09:38:35'),
(14, 1, '1 Hour', 140.00, '2021-12-02 13:47:08', '2021-11-21 22:26:18', '2022-01-25 09:38:35'),
(15, 1, '2 Hour', 280.00, '2021-12-02 13:47:08', '2021-11-21 22:26:18', '2022-01-25 09:38:35'),
(16, 1, '8 Hour', 600.00, '2021-12-02 13:47:08', '2021-11-21 22:26:18', '2022-01-25 09:38:35'),
(17, 1, '15 Min', 50.00, '2021-12-02 13:47:08', '2021-11-21 22:26:18', '2022-01-25 09:38:35'),
(18, 1, '15 Min', 50.00, '2021-12-06 14:29:51', '2021-12-02 13:47:08', '2022-01-25 09:38:35'),
(19, 1, '30 Min', 90.00, '2021-12-06 14:29:51', '2021-12-02 13:47:08', '2022-01-25 09:38:35'),
(20, 1, '1 Hour', 140.00, '2021-12-06 14:29:51', '2021-12-02 13:47:08', '2022-01-25 09:38:35'),
(21, 1, '2 Hour', 280.00, '2021-12-06 14:29:51', '2021-12-02 13:47:08', '2022-01-25 09:38:35'),
(22, 1, '8 Hour', 600.00, '2021-12-06 14:29:51', '2021-12-02 13:47:08', '2022-01-25 09:38:35'),
(23, 1, '15 Min', 50.00, '2021-12-06 14:29:51', '2021-12-02 13:47:08', '2022-01-25 09:38:35'),
(24, 2, '15 Min', 12.00, '2021-12-06 14:31:26', '2021-12-02 13:48:27', '2022-01-25 09:38:35'),
(25, 15, '45 Min', 200.00, '2021-12-06 12:33:23', '2021-12-03 06:10:01', '2022-01-25 09:38:35'),
(26, 16, '15 Min', 12.00, '2021-12-06 12:52:01', '2021-12-03 06:37:46', '2022-01-25 09:38:35'),
(27, 15, '45 Min', 200.00, NULL, '2021-12-06 12:33:23', '2022-01-25 09:38:35'),
(28, 16, '15 Min', 12.00, NULL, '2021-12-06 12:52:01', '2022-01-25 09:38:35'),
(29, 6, '4 Hour', 80.00, '2021-12-06 14:22:04', '2021-12-06 14:17:29', '2022-01-25 09:38:35'),
(30, 6, '4 Hour', 80.00, '2022-01-25 11:22:13', '2021-12-06 14:22:04', '2022-01-25 11:22:13'),
(31, 1, '15 Min', 50.00, '2021-12-06 14:33:39', '2021-12-06 14:29:51', '2022-01-25 09:38:35'),
(32, 1, '30 Min', 90.00, '2021-12-06 14:33:39', '2021-12-06 14:29:51', '2022-01-25 09:38:35'),
(33, 1, '1 Hour', 140.00, '2021-12-06 14:33:39', '2021-12-06 14:29:51', '2022-01-25 09:38:35'),
(34, 1, '2 Hour', 280.00, '2021-12-06 14:33:39', '2021-12-06 14:29:51', '2022-01-25 09:38:35'),
(35, 1, '8 Hour', 600.00, '2021-12-06 14:33:39', '2021-12-06 14:29:51', '2022-01-25 09:38:35'),
(36, 1, '15 Min', 50.00, '2021-12-06 14:33:39', '2021-12-06 14:29:51', '2022-01-25 09:38:35'),
(37, 2, '15 Min', 12.00, '2021-12-09 14:21:40', '2021-12-06 14:31:26', '2022-01-25 09:38:35'),
(38, 1, '15 Min', 50.00, NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35'),
(39, 1, '30 Min', 90.00, NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35'),
(40, 1, '1 Hour', 140.00, NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35'),
(41, 1, '2 Hour', 280.00, NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35'),
(42, 1, '8 Hour', 600.00, NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35'),
(43, 1, '15 Min', 50.00, NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35'),
(44, 17, '45 Min', 300.00, '2021-12-09 14:02:56', '2021-12-09 14:00:08', '2022-01-25 09:38:35'),
(45, 17, '45 Min', 300.00, '2021-12-09 14:09:54', '2021-12-09 14:02:56', '2022-01-25 09:38:35'),
(46, 17, '45 Min', 300.00, '2021-12-09 14:26:39', '2021-12-09 14:09:54', '2022-01-25 09:38:35'),
(47, 4, '15 Min', 10.00, NULL, '2021-12-09 14:19:49', '2022-01-25 09:38:35'),
(48, 2, '15 Min', 12.00, NULL, '2021-12-09 14:21:40', '2022-01-25 09:38:35'),
(49, 17, '45 Min', 300.00, '2021-12-09 14:27:09', '2021-12-09 14:26:39', '2022-01-25 09:38:35'),
(50, 17, '45 Min', 300.00, '2021-12-09 14:28:58', '2021-12-09 14:27:09', '2022-01-25 09:38:35'),
(51, 17, '45 Min', 300.00, NULL, '2021-12-09 14:28:58', '2022-01-25 09:38:35'),
(52, 18, '45 Min', 250.00, NULL, '2021-12-10 12:24:51', '2022-01-25 09:38:35'),
(53, 19, '15 Min', 29.00, '2021-12-27 04:48:58', '2021-12-22 10:48:20', '2022-01-25 09:38:35'),
(54, 19, '30 Min', 34.00, '2021-12-27 04:48:58', '2021-12-22 10:48:20', '2022-01-25 09:38:35'),
(55, 19, '15 Min', 29.00, NULL, '2021-12-27 10:18:58', '2022-01-25 09:38:35'),
(56, 19, '30 Min', 34.00, NULL, '2021-12-27 10:18:58', '2022-01-25 09:38:35'),
(57, 20, '15 Min', 11.00, NULL, '2021-12-28 05:48:13', '2022-01-25 09:38:35'),
(58, 20, '30 Min', 22.00, NULL, '2021-12-28 05:48:13', '2022-01-25 09:38:35'),
(59, 21, '15 Min', 11.00, NULL, '2021-12-28 06:04:36', '2022-01-25 09:38:35'),
(60, 21, '30 Min', 22.00, NULL, '2021-12-28 06:04:36', '2022-01-25 09:38:35'),
(61, 21, '45 Min', 33.00, NULL, '2021-12-28 06:04:36', '2022-01-25 09:38:35'),
(62, 21, '1 Hour', 44.00, NULL, '2021-12-28 06:04:36', '2022-01-25 09:38:35'),
(63, 22, '15 Min', 11.00, NULL, '2021-12-29 14:24:54', '2022-01-25 09:38:35'),
(64, 22, '30 Min', 22.00, NULL, '2021-12-29 14:24:54', '2022-01-25 09:38:35'),
(116, 26, '15 Min', 11.00, NULL, '2021-12-30 11:32:31', '2022-01-25 09:38:35'),
(117, 26, '30 Min', 22.00, NULL, '2021-12-30 11:32:31', '2022-01-25 09:38:35'),
(118, 26, '45 Min', 33.00, NULL, '2021-12-30 11:32:31', '2022-01-25 09:38:35'),
(131, 31, '30 Min', 300.00, '2022-01-07 07:40:07', '2022-01-07 07:37:14', '2022-01-25 09:38:35'),
(132, 31, '1 Hour', 500.00, '2022-01-07 07:40:07', '2022-01-07 07:37:14', '2022-01-25 09:38:35'),
(133, 31, '2 Hour', 800.00, '2022-01-07 07:40:07', '2022-01-07 07:37:14', '2022-01-25 09:38:35'),
(134, 31, '30 Min', 300.00, NULL, '2022-01-07 07:40:07', '2022-01-25 09:38:35'),
(135, 31, '1 Hour', 500.00, NULL, '2022-01-07 07:40:07', '2022-01-25 09:38:35'),
(136, 31, '2 Hour', 800.00, NULL, '2022-01-07 07:40:07', '2022-01-25 09:38:35'),
(137, 32, '1 Hour', 500.00, NULL, '2022-01-07 07:53:55', '2022-01-25 09:38:35'),
(138, 32, '2 Hour', 900.00, NULL, '2022-01-07 07:53:55', '2022-01-25 09:38:35'),
(139, 33, '1 Hour', 400.00, NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(140, 33, '2 Hour', 700.00, NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(141, 33, '4 Hour', 900.00, NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(142, 34, '45 Min', 500.00, NULL, '2022-01-07 08:35:17', '2022-01-25 09:38:35'),
(143, 34, '2 Hour', 900.00, NULL, '2022-01-07 08:35:17', '2022-01-25 09:38:35'),
(148, 30, '15 Min', 150.00, NULL, '2022-01-07 08:52:32', '2022-01-25 09:38:35'),
(149, 30, '30 Min', 200.00, NULL, '2022-01-07 08:52:32', '2022-01-25 09:38:35'),
(150, 35, '15 Min', 11.00, NULL, '2022-01-19 09:45:20', '2022-01-25 09:38:35'),
(151, 35, '30 Min', 22.00, NULL, '2022-01-19 09:45:20', '2022-01-25 09:38:35'),
(152, 36, '30 Min', 50.00, NULL, '2022-01-21 10:38:08', '2022-01-25 09:38:35'),
(153, 36, '1 Hour', 100.00, NULL, '2022-01-21 10:38:08', '2022-01-25 09:38:35'),
(154, 36, '2 Hour', 180.00, NULL, '2022-01-21 10:38:08', '2022-01-25 09:38:35'),
(155, 37, '15 Min', 80.00, NULL, '2022-01-21 10:57:23', '2022-01-25 09:38:35'),
(156, 37, '30 Min', 150.00, NULL, '2022-01-21 10:57:23', '2022-01-25 09:38:35'),
(157, 37, '1 Hour', 180.00, NULL, '2022-01-21 10:57:23', '2022-01-25 09:38:35'),
(158, 6, '4 Hour', 80.00, '2022-02-24 11:03:11', '2022-01-25 11:22:13', '2022-02-24 11:03:11'),
(159, 38, '30 Min', 150.00, NULL, '2022-01-25 12:09:57', '2022-01-25 12:09:57'),
(160, 38, '1 Hour', 200.00, NULL, '2022-01-25 12:09:57', '2022-01-25 12:09:57'),
(161, 39, '15 Min', 30.00, NULL, '2022-01-25 12:19:28', '2022-01-25 12:19:28'),
(162, 39, '30 Min', 60.00, NULL, '2022-01-25 12:19:28', '2022-01-25 12:19:28'),
(163, 39, '1 Hour', 100.00, NULL, '2022-01-25 12:19:28', '2022-01-25 12:19:28'),
(164, 40, '30 Min', 100.00, NULL, '2022-01-25 12:43:10', '2022-01-25 12:43:10'),
(165, 40, '1 Hour', 200.00, NULL, '2022-01-25 12:43:10', '2022-01-25 12:43:10'),
(166, 40, '2 Hour', 300.00, NULL, '2022-01-25 12:43:10', '2022-01-25 12:43:10'),
(167, 41, '30 Min', 50.00, NULL, '2022-01-25 14:05:58', '2022-01-25 14:05:58'),
(168, 41, '1 Hour', 100.00, NULL, '2022-01-25 14:05:58', '2022-01-25 14:05:58'),
(169, 41, '2 Hour', 200.00, NULL, '2022-01-25 14:05:58', '2022-01-25 14:05:58'),
(170, 6, '4 Hour', 80.00, NULL, '2022-02-24 11:03:11', '2022-02-24 11:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `advertisement_working_days`
--

CREATE TABLE `advertisement_working_days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advertisement_id` bigint(20) NOT NULL,
  `days` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` time NOT NULL,
  `till` time NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisement_working_days`
--

INSERT INTO `advertisement_working_days` (`id`, `advertisement_id`, `days`, `from`, `till`, `deleted_at`, `created_at`, `updated_at`) VALUES
(0, 6, 'Saturday', '21:00:00', '23:30:00', '2022-02-24 11:03:11', '2022-01-25 11:22:13', '2022-02-24 11:03:11'),
(1, 1, 'Friday', '13:00:00', '16:00:00', '2021-11-15 02:25:40', '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(2, 2, 'Monday', '13:00:00', '16:00:00', '2021-12-02 13:48:27', '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(3, 3, 'Saturday', '13:00:00', '16:00:00', NULL, '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(4, 4, 'Friday', '13:00:00', '16:00:00', '2021-12-09 14:19:49', '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(5, 5, 'Monday', '13:00:00', '16:00:00', '2021-12-03 11:40:54', '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(6, 5, 'Wednesday', '13:00:00', '16:00:00', '2021-12-03 11:40:54', '2021-11-02 07:28:10', '2022-01-25 09:38:35'),
(7, 6, 'Monday', '10:00:00', '16:00:00', '2021-12-06 14:17:29', '2021-11-02 12:30:07', '2022-01-25 09:38:35'),
(8, 6, 'Tuesday', '10:00:00', '18:00:00', '2021-12-06 14:17:29', '2021-11-02 12:30:07', '2022-01-25 09:38:35'),
(9, 6, 'Wednesday', '06:00:00', '19:00:00', '2021-12-06 14:17:29', '2021-11-02 12:30:07', '2022-01-25 09:38:35'),
(10, 6, 'Thursday', '06:00:00', '20:00:00', '2021-12-06 14:17:29', '2021-11-02 12:30:07', '2022-02-23 11:00:36'),
(11, 6, 'Friday', '11:00:00', '20:00:00', '2021-12-06 14:17:29', '2021-11-02 12:30:07', '2022-01-25 09:38:35'),
(12, 6, 'Saturday', '21:00:00', '23:59:00', '2021-12-06 14:17:29', '2021-11-02 12:30:07', '2022-01-25 09:38:35'),
(13, 6, 'Sunday', '20:00:00', '23:00:00', '2021-12-06 14:17:29', '2021-11-02 12:30:07', '2022-01-25 09:38:35'),
(14, 1, 'Friday', '13:00:00', '16:00:00', '2021-11-21 21:31:09', '2021-11-15 07:55:40', '2022-01-25 09:38:35'),
(15, 7, 'Wednesday', '16:29:00', '16:30:00', '2021-11-15 03:28:38', '2021-11-15 08:58:05', '2022-01-25 09:38:35'),
(16, 7, 'Wednesday', '16:00:00', '16:30:00', NULL, '2021-11-15 08:58:38', '2022-02-24 03:40:36'),
(17, 1, 'Monday', '09:00:00', '00:30:00', '2021-11-21 22:19:55', '2021-11-21 21:31:09', '2022-01-25 09:38:35'),
(18, 1, 'Thursday', '08:30:00', '00:31:00', '2021-11-21 22:19:55', '2021-11-21 21:31:09', '2022-02-23 11:00:39'),
(19, 1, 'Friday', '13:00:00', '16:00:00', '2021-11-21 22:19:55', '2021-11-21 21:31:09', '2022-01-25 09:38:35'),
(20, 1, 'Monday', '09:00:00', '00:30:00', '2021-11-21 22:23:33', '2021-11-21 22:19:55', '2022-01-25 09:38:35'),
(21, 1, 'Thursday', '08:30:00', '00:31:00', '2021-11-21 22:23:33', '2021-11-21 22:19:55', '2022-02-23 11:00:43'),
(22, 1, 'Friday', '13:00:00', '16:00:00', '2021-11-21 22:23:33', '2021-11-21 22:19:55', '2022-01-25 09:38:35'),
(23, 1, 'Monday', '09:00:00', '00:30:00', '2021-11-21 22:24:49', '2021-11-21 22:23:33', '2022-01-25 09:38:35'),
(24, 1, 'Thursday', '08:30:00', '00:31:00', '2021-11-21 22:24:49', '2021-11-21 22:23:33', '2022-02-23 11:00:45'),
(25, 1, 'Friday', '13:00:00', '16:00:00', '2021-11-21 22:24:49', '2021-11-21 22:23:33', '2022-01-25 09:38:35'),
(26, 1, 'Monday', '09:00:00', '00:30:00', '2021-11-21 22:26:18', '2021-11-21 22:24:49', '2022-01-25 09:38:35'),
(27, 1, 'Thursday', '08:30:00', '00:31:00', '2021-11-21 22:26:18', '2021-11-21 22:24:49', '2022-02-23 11:00:49'),
(28, 1, 'Friday', '13:00:00', '16:00:00', '2021-11-21 22:26:18', '2021-11-21 22:24:49', '2022-01-25 09:38:35'),
(29, 1, 'Monday', '09:00:00', '00:30:00', '2021-12-02 13:47:08', '2021-11-21 22:26:18', '2022-01-25 09:38:35'),
(30, 1, 'Tuesday', '23:00:00', '00:27:00', '2021-12-02 13:47:08', '2021-11-21 22:26:18', '2022-01-25 09:38:35'),
(31, 1, 'Thursday', '08:30:00', '00:31:00', '2021-12-02 13:47:08', '2021-11-21 22:26:18', '2022-02-23 11:00:51'),
(32, 1, 'Friday', '13:00:00', '16:00:00', '2021-12-02 13:47:08', '2021-11-21 22:26:18', '2022-01-25 09:38:35'),
(33, 1, 'Monday', '09:00:00', '00:30:00', '2021-12-06 14:29:51', '2021-12-02 13:47:08', '2022-01-25 09:38:35'),
(34, 1, 'Tuesday', '23:00:00', '00:27:00', '2021-12-06 14:29:51', '2021-12-02 13:47:08', '2022-01-25 09:38:35'),
(35, 1, 'Thursday', '08:30:00', '00:31:00', '2021-12-06 14:29:51', '2021-12-02 13:47:08', '2022-02-23 11:00:54'),
(36, 1, 'Friday', '13:00:00', '16:00:00', '2021-12-06 14:29:51', '2021-12-02 13:47:08', '2022-01-25 09:38:35'),
(37, 2, 'Monday', '13:00:00', '16:00:00', '2021-12-06 14:31:26', '2021-12-02 13:48:27', '2022-01-25 09:38:35'),
(38, 15, 'Monday', '09:00:00', '23:00:00', '2021-12-06 12:33:23', '2021-12-03 06:10:01', '2022-01-25 09:38:35'),
(39, 15, 'Tuesday', '08:00:00', '22:00:00', '2021-12-06 12:33:23', '2021-12-03 06:10:01', '2022-01-25 09:38:35'),
(40, 15, 'Sunday', '19:00:00', '23:00:00', '2021-12-06 12:33:23', '2021-12-03 06:10:01', '2022-01-25 09:38:35'),
(41, 16, 'Thursday', '06:00:00', '15:10:00', '2021-12-06 12:52:01', '2021-12-03 06:37:46', '2022-02-23 11:00:57'),
(42, 5, 'Monday', '13:00:00', '16:00:00', '2021-12-06 14:26:17', '2021-12-03 11:40:54', '2022-01-25 09:38:35'),
(43, 5, 'Wednesday', '13:00:00', '16:00:00', '2021-12-06 14:26:17', '2021-12-03 11:40:54', '2022-01-25 09:38:35'),
(44, 15, 'Monday', '09:00:00', '23:00:00', NULL, '2021-12-06 12:33:23', '2022-01-25 09:38:35'),
(45, 15, 'Tuesday', '08:00:00', '22:00:00', NULL, '2021-12-06 12:33:23', '2022-01-25 09:38:35'),
(46, 15, 'Sunday', '19:00:00', '23:00:00', NULL, '2021-12-06 12:33:23', '2022-01-25 09:38:35'),
(47, 16, 'Thursday', '06:00:00', '15:30:00', NULL, '2021-12-06 12:52:01', '2022-02-24 03:49:20'),
(48, 6, 'Monday', '10:00:00', '16:00:00', '2021-12-06 14:22:04', '2021-12-06 14:17:29', '2022-01-25 09:38:35'),
(49, 6, 'Tuesday', '10:00:00', '18:00:00', '2021-12-06 14:22:04', '2021-12-06 14:17:29', '2022-01-25 09:38:35'),
(50, 6, 'Wednesday', '06:00:00', '19:00:00', '2021-12-06 14:22:04', '2021-12-06 14:17:29', '2022-01-25 09:38:35'),
(51, 6, 'Thursday', '06:00:00', '20:00:00', '2021-12-06 14:22:04', '2021-12-06 14:17:29', '2022-02-23 11:01:02'),
(52, 6, 'Friday', '11:00:00', '20:00:00', '2021-12-06 14:22:04', '2021-12-06 14:17:29', '2022-01-25 09:38:35'),
(53, 6, 'Saturday', '21:00:00', '23:59:00', '2021-12-06 14:22:04', '2021-12-06 14:17:29', '2022-01-25 09:38:35'),
(54, 6, 'Sunday', '20:00:00', '23:00:00', '2021-12-06 14:22:04', '2021-12-06 14:17:29', '2022-01-25 09:38:35'),
(55, 6, 'Monday', '10:00:00', '16:00:00', '2022-01-25 11:22:13', '2021-12-06 14:22:04', '2022-01-25 11:22:13'),
(56, 6, 'Tuesday', '10:00:00', '18:00:00', '2022-01-25 11:22:13', '2021-12-06 14:22:04', '2022-01-25 11:22:13'),
(57, 6, 'Wednesday', '06:00:00', '19:00:00', '2022-01-25 11:22:13', '2021-12-06 14:22:04', '2022-01-25 11:22:13'),
(58, 6, 'Thursday', '06:00:00', '20:00:00', '2022-01-25 11:22:13', '2021-12-06 14:22:04', '2022-02-23 11:01:08'),
(59, 6, 'Friday', '11:00:00', '20:00:00', '2022-01-25 11:22:13', '2021-12-06 14:22:04', '2022-01-25 11:22:13'),
(60, 6, 'Saturday', '21:00:00', '23:59:00', '2022-01-25 11:22:13', '2021-12-06 14:22:04', '2022-01-25 11:22:13'),
(61, 6, 'Sunday', '20:00:00', '23:00:00', '2022-01-25 11:22:13', '2021-12-06 14:22:04', '2022-01-25 11:22:13'),
(62, 5, 'Monday', '13:00:00', '16:00:00', '2021-12-06 14:35:57', '2021-12-06 14:26:17', '2022-01-25 09:38:35'),
(63, 5, 'Wednesday', '13:00:00', '16:00:00', '2021-12-06 14:35:57', '2021-12-06 14:26:17', '2022-01-25 09:38:35'),
(64, 1, 'Monday', '09:00:00', '00:30:00', '2021-12-06 14:33:39', '2021-12-06 14:29:51', '2022-01-25 09:38:35'),
(65, 1, 'Tuesday', '23:00:00', '00:27:00', '2021-12-06 14:33:39', '2021-12-06 14:29:51', '2022-01-25 09:38:35'),
(66, 1, 'Thursday', '08:30:00', '00:31:00', '2021-12-06 14:33:39', '2021-12-06 14:29:51', '2022-02-23 11:01:10'),
(67, 1, 'Friday', '13:00:00', '16:00:00', '2021-12-06 14:33:39', '2021-12-06 14:29:51', '2022-01-25 09:38:35'),
(68, 2, 'Monday', '13:00:00', '16:00:00', '2021-12-09 14:21:40', '2021-12-06 14:31:26', '2022-01-25 09:38:35'),
(69, 1, 'Monday', '09:00:00', '00:30:00', NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35'),
(70, 1, 'Tuesday', '23:00:00', '12:30:00', NULL, '2021-12-06 14:33:39', '2022-02-24 03:56:43'),
(71, 1, 'Thursday', '08:30:00', '12:30:00', NULL, '2021-12-06 14:33:39', '2022-02-24 03:55:54'),
(72, 1, 'Friday', '13:00:00', '16:00:00', NULL, '2021-12-06 14:33:39', '2022-01-25 09:38:35'),
(73, 5, 'Monday', '13:00:00', '16:00:00', NULL, '2021-12-06 14:35:57', '2022-01-25 09:38:35'),
(74, 5, 'Wednesday', '13:00:00', '16:00:00', NULL, '2021-12-06 14:35:57', '2022-01-25 09:38:35'),
(75, 4, 'Friday', '13:00:00', '16:00:00', NULL, '2021-12-09 14:19:49', '2022-01-25 09:38:35'),
(76, 2, 'Monday', '13:00:00', '16:00:00', NULL, '2021-12-09 14:21:40', '2022-01-25 09:38:35'),
(77, 17, 'Monday', '10:00:00', '20:00:00', NULL, '2021-12-09 14:28:58', '2022-01-25 09:38:35'),
(78, 17, 'Tuesday', '11:00:00', '10:00:00', NULL, '2021-12-09 14:28:58', '2022-01-25 09:38:35'),
(79, 18, 'Monday', '12:00:00', '23:00:00', NULL, '2021-12-10 12:24:51', '2022-01-25 09:38:35'),
(80, 18, 'Tuesday', '10:00:00', '20:00:00', NULL, '2021-12-10 12:24:51', '2022-01-25 09:38:35'),
(81, 18, 'Wednesday', '15:00:00', '20:00:00', NULL, '2021-12-10 12:24:51', '2022-01-25 09:38:35'),
(82, 18, 'Thursday', '10:00:00', '20:00:00', NULL, '2021-12-10 12:24:51', '2022-02-23 11:01:15'),
(83, 18, 'Friday', '10:00:00', '20:00:00', NULL, '2021-12-10 12:24:51', '2022-01-25 09:38:35'),
(84, 18, 'Saturday', '09:00:00', '23:00:00', NULL, '2021-12-10 12:24:51', '2022-01-25 09:38:35'),
(85, 19, 'Monday', '16:17:00', '20:18:00', '2021-12-27 04:48:58', '2021-12-22 10:48:20', '2022-01-25 09:38:35'),
(86, 19, 'Tuesday', '21:18:00', '01:18:00', '2021-12-27 04:48:58', '2021-12-22 10:48:20', '2022-01-25 09:38:35'),
(87, 19, 'Monday', '16:00:00', '20:00:00', NULL, '2021-12-27 10:18:58', '2022-02-24 03:46:42'),
(88, 19, 'Tuesday', '21:00:00', '01:30:00', NULL, '2021-12-27 10:18:58', '2022-02-24 03:46:42'),
(89, 20, 'Monday', '11:00:00', '13:00:00', NULL, '2021-12-28 05:48:13', '2022-02-24 03:46:42'),
(90, 20, 'Tuesday', '15:00:00', '17:30:00', NULL, '2021-12-28 05:48:13', '2022-02-24 03:55:54'),
(91, 21, 'Monday', '11:30:00', '12:30:00', NULL, '2021-12-28 06:04:36', '2022-02-24 03:58:31'),
(92, 21, 'Wednesday', '13:30:00', '14:30:00', NULL, '2021-12-28 06:04:36', '2022-02-24 03:58:31'),
(93, 21, 'Friday', '15:30:00', '16:30:00', NULL, '2021-12-28 06:04:36', '2022-02-24 03:58:31'),
(94, 22, 'Monday', '19:30:00', '20:30:00', NULL, '2021-12-29 14:24:54', '2022-02-24 03:58:31'),
(95, 22, 'Tuesday', '21:30:00', '22:30:00', NULL, '2021-12-29 14:24:54', '2022-02-24 03:58:31'),
(114, 26, 'Monday', '13:30:00', '14:30:00', NULL, '2021-12-30 11:32:31', '2022-02-24 03:58:31'),
(115, 26, 'Tuesday', '15:30:00', '16:30:00', NULL, '2021-12-30 11:32:31', '2022-02-24 03:58:31'),
(128, 31, 'Monday', '09:00:00', '19:00:00', '2022-01-07 07:40:07', '2022-01-07 07:37:14', '2022-01-25 09:38:35'),
(129, 31, 'Tuesday', '10:00:00', '20:20:00', '2022-01-07 07:40:07', '2022-01-07 07:37:14', '2022-01-25 09:38:35'),
(130, 31, 'Wednesday', '08:00:00', '20:00:00', '2022-01-07 07:40:07', '2022-01-07 07:37:14', '2022-01-25 09:38:35'),
(131, 31, 'Thursday', '09:00:00', '20:00:00', '2022-01-07 07:40:07', '2022-01-07 07:37:14', '2022-02-23 11:01:32'),
(132, 31, 'Friday', '10:00:00', '20:00:00', '2022-01-07 07:40:07', '2022-01-07 07:37:14', '2022-01-25 09:38:35'),
(133, 31, 'Monday', '09:00:00', '19:00:00', NULL, '2022-01-07 07:40:07', '2022-01-25 09:38:35'),
(134, 31, 'Tuesday', '10:00:00', '20:00:00', NULL, '2022-01-07 07:40:07', '2022-02-24 03:58:54'),
(135, 31, 'Wednesday', '08:00:00', '20:00:00', NULL, '2022-01-07 07:40:07', '2022-01-25 09:38:35'),
(136, 31, 'Thursday', '09:00:00', '20:00:00', NULL, '2022-01-07 07:40:07', '2022-02-23 11:01:34'),
(137, 31, 'Friday', '10:00:00', '20:00:00', NULL, '2022-01-07 07:40:07', '2022-01-25 09:38:35'),
(138, 32, 'Monday', '10:00:00', '19:30:00', NULL, '2022-01-07 07:53:55', '2022-02-24 03:58:31'),
(139, 32, 'Tuesday', '11:00:00', '21:00:00', NULL, '2022-01-07 07:53:55', '2022-01-25 09:38:35'),
(140, 32, 'Wednesday', '10:00:00', '20:00:00', NULL, '2022-01-07 07:53:55', '2022-01-25 09:38:35'),
(141, 32, 'Thursday', '10:00:00', '20:00:00', NULL, '2022-01-07 07:53:55', '2022-02-23 11:01:37'),
(142, 32, 'Friday', '10:00:00', '20:00:00', NULL, '2022-01-07 07:53:55', '2022-01-25 09:38:35'),
(143, 32, 'Saturday', '08:00:00', '20:00:00', NULL, '2022-01-07 07:53:55', '2022-01-25 09:38:35'),
(144, 32, 'Sunday', '08:00:00', '20:00:00', NULL, '2022-01-07 07:53:55', '2022-01-25 09:38:35'),
(145, 33, 'Monday', '10:00:00', '20:20:00', NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(146, 33, 'Tuesday', '09:00:00', '19:00:00', NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(147, 33, 'Wednesday', '10:00:00', '20:00:00', NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(148, 33, 'Thursday', '11:00:00', '21:00:00', NULL, '2022-01-07 08:10:24', '2022-02-23 11:01:58'),
(149, 33, 'Friday', '12:00:00', '22:00:00', NULL, '2022-01-07 08:10:24', '2022-02-24 03:58:31'),
(150, 33, 'Saturday', '12:00:00', '22:00:00', NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(151, 33, 'Sunday', '14:00:00', '20:00:00', NULL, '2022-01-07 08:10:24', '2022-01-25 09:38:35'),
(152, 34, 'Monday', '10:00:00', '20:00:00', NULL, '2022-01-07 08:35:17', '2022-01-25 09:38:35'),
(153, 34, 'Tuesday', '10:00:00', '20:00:00', NULL, '2022-01-07 08:35:17', '2022-01-25 09:38:35'),
(154, 34, 'Saturday', '10:00:00', '20:00:00', NULL, '2022-01-07 08:35:17', '2022-01-25 09:38:35'),
(155, 34, 'Sunday', '10:00:00', '20:00:00', NULL, '2022-01-07 08:35:17', '2022-01-25 09:38:35'),
(163, 30, 'Monday', '17:00:00', '19:30:00', NULL, '2022-01-07 08:52:32', '2022-02-24 03:53:31'),
(164, 30, 'Tuesday', '20:00:00', '22:30:00', NULL, '2022-01-07 08:52:32', '2022-02-24 03:53:31'),
(165, 30, 'Wednesday', '10:00:00', '20:00:00', NULL, '2022-01-07 08:52:32', '2022-01-25 09:38:35'),
(166, 30, 'Thursday', '10:00:00', '20:00:00', NULL, '2022-01-07 08:52:32', '2022-02-23 11:01:55'),
(167, 30, 'Friday', '10:00:00', '20:00:00', NULL, '2022-01-07 08:52:32', '2022-01-25 09:38:35'),
(168, 35, 'Monday', '15:30:00', '16:30:00', NULL, '2022-01-19 09:45:20', '2022-02-24 03:53:31'),
(169, 36, 'Monday', '10:00:00', '20:00:00', NULL, '2022-01-21 10:38:08', '2022-01-25 09:38:35'),
(170, 36, 'Tuesday', '10:00:00', '20:00:00', NULL, '2022-01-21 10:38:08', '2022-01-25 09:38:35'),
(171, 36, 'Wednesday', '10:00:00', '20:00:00', NULL, '2022-01-21 10:38:08', '2022-01-25 09:38:35'),
(172, 36, 'Thursday', '10:00:00', '20:00:00', NULL, '2022-01-21 10:38:08', '2022-02-23 11:01:52'),
(173, 36, 'Saturday', '09:00:00', '22:00:00', NULL, '2022-01-21 10:38:08', '2022-01-25 09:38:35'),
(174, 36, 'Sunday', '08:00:00', '22:00:00', NULL, '2022-01-21 10:38:08', '2022-01-25 09:38:35'),
(175, 37, 'Monday', '12:00:00', '23:00:00', NULL, '2022-01-21 10:57:23', '2022-01-25 09:38:35'),
(176, 37, 'Tuesday', '11:00:00', '22:00:00', NULL, '2022-01-21 10:57:23', '2022-01-25 09:38:35'),
(177, 37, 'Wednesday', '12:00:00', '23:00:00', NULL, '2022-01-21 10:57:23', '2022-01-25 09:38:35'),
(178, 37, 'Saturday', '08:00:00', '20:00:00', NULL, '2022-01-21 10:57:23', '2022-01-25 09:38:35'),
(179, 37, 'Sunday', '09:00:00', '21:00:00', NULL, '2022-01-21 10:57:23', '2022-01-25 09:38:35'),
(180, 6, 'Monday', '10:00:00', '16:00:00', '2022-02-24 11:03:11', '2022-01-25 11:22:13', '2022-02-24 11:03:11'),
(181, 6, 'Tuesday', '10:00:00', '18:00:00', '2022-02-24 11:03:11', '2022-01-25 11:22:13', '2022-02-24 11:03:11'),
(182, 6, 'Wednesday', '06:00:00', '19:00:00', '2022-02-24 11:03:11', '2022-01-25 11:22:13', '2022-02-24 11:03:11'),
(183, 6, 'Thursday', '06:00:00', '20:00:00', '2022-02-24 11:03:11', '2022-01-25 11:22:13', '2022-02-24 11:03:11'),
(184, 6, 'Friday', '11:00:00', '20:00:00', '2022-02-24 11:03:11', '2022-01-25 11:22:13', '2022-02-24 11:03:11'),
(186, 6, 'Sunday', '20:00:00', '23:00:00', '2022-02-24 11:03:11', '2022-01-25 11:22:13', '2022-02-24 11:03:11'),
(187, 38, 'Monday', '10:00:00', '20:00:00', NULL, '2022-01-25 12:09:57', '2022-01-25 12:09:57'),
(188, 38, 'Tuesday', '10:00:00', '20:00:00', NULL, '2022-01-25 12:09:57', '2022-01-25 12:09:57'),
(189, 38, 'Wednesday', '10:00:00', '20:00:00', NULL, '2022-01-25 12:09:57', '2022-01-25 12:09:57'),
(190, 39, 'Monday', '10:00:00', '21:30:00', NULL, '2022-01-25 12:19:28', '2022-02-24 03:51:28'),
(191, 39, 'Tuesday', '11:00:00', '21:30:00', NULL, '2022-01-25 12:19:28', '2022-02-24 03:51:28'),
(192, 39, 'Wednesday', '09:00:00', '20:00:00', NULL, '2022-01-25 12:19:28', '2022-01-25 12:19:28'),
(193, 39, 'Thursday', '10:00:00', '20:00:00', NULL, '2022-01-25 12:19:28', '2022-02-23 11:01:47'),
(194, 39, 'Friday', '10:00:00', '20:00:00', NULL, '2022-01-25 12:19:28', '2022-01-25 12:19:28'),
(195, 40, 'Monday', '11:30:00', '21:00:00', NULL, '2022-01-25 12:43:10', '2022-02-24 03:51:28'),
(196, 40, 'Tuesday', '11:00:00', '21:30:00', NULL, '2022-01-25 12:43:10', '2022-02-24 03:51:28'),
(197, 40, 'Wednesday', '11:00:00', '21:30:00', NULL, '2022-01-25 12:43:10', '2022-02-24 03:51:28'),
(198, 40, 'Thursday', '11:00:00', '21:30:00', NULL, '2022-01-25 12:43:10', '2022-02-24 03:51:28'),
(199, 40, 'Friday', '11:00:00', '21:30:00', NULL, '2022-01-25 12:43:10', '2022-02-24 03:51:28'),
(200, 41, 'Monday', '11:00:00', '22:30:00', NULL, '2022-01-25 14:05:58', '2022-02-24 03:51:28'),
(201, 41, 'Tuesday', '12:00:00', '23:30:00', NULL, '2022-01-25 14:05:58', '2022-02-24 03:51:28'),
(202, 41, 'Wednesday', '11:00:00', '12:30:00', NULL, '2022-01-25 14:05:58', '2022-02-24 03:51:28'),
(203, 41, 'Thursday', '12:00:00', '12:30:00', NULL, '2022-01-25 14:05:58', '2022-02-24 03:51:28'),
(204, 41, 'Friday', '11:00:00', '12:00:00', NULL, '2022-01-25 14:05:58', '2022-02-24 03:51:28'),
(205, 43, 'Monday', '12:35:00', '12:35:00', '2022-02-22 01:39:09', '2022-02-22 07:07:35', '2022-02-22 01:39:09'),
(206, 43, 'Tuesday', '13:36:00', '13:36:00', '2022-02-22 01:39:09', '2022-02-22 07:07:35', '2022-02-22 01:39:09'),
(207, 43, 'Monday', '12:35:00', '12:35:00', '2022-02-22 01:45:03', '2022-02-22 07:09:09', '2022-02-22 01:45:03'),
(208, 43, 'Tuesday', '13:36:00', '13:36:00', '2022-02-22 01:45:03', '2022-02-22 07:09:09', '2022-02-22 01:45:03'),
(209, 43, 'Monday', '12:00:00', '00:00:00', '2022-02-23 05:27:30', '2022-02-22 07:15:03', '2022-02-24 03:45:06'),
(210, 43, 'Tuesday', '13:00:00', '14:00:00', '2022-02-23 05:27:30', '2022-02-22 07:15:03', '2022-02-23 05:27:30'),
(211, 43, 'Monday', '12:00:00', '13:00:00', '2022-02-23 07:12:15', '2022-02-23 10:57:30', '2022-02-23 07:12:15'),
(212, 43, 'Tuesday', '13:00:00', '14:00:00', '2022-02-23 07:12:15', '2022-02-23 10:57:30', '2022-02-23 07:12:15'),
(213, 43, 'Thursday', '16:00:00', '17:00:00', '2022-02-23 07:12:15', '2022-02-23 10:57:30', '2022-02-24 03:45:06'),
(214, 43, 'Monday', '12:00:00', '13:00:00', '2022-02-23 07:43:47', '2022-02-23 12:42:15', '2022-02-24 03:45:06'),
(215, 43, 'Tuesday', '13:00:00', '14:00:00', '2022-02-23 07:43:47', '2022-02-23 12:42:15', '2022-02-23 07:43:47'),
(216, 43, 'Thursday', '16:00:00', '17:00:00', '2022-02-23 07:43:47', '2022-02-23 12:42:15', '2022-02-24 03:45:06'),
(217, 43, 'Monday', '12:18:00', '13:00:00', '2022-02-23 07:50:13', '2022-02-23 13:13:47', '2022-02-23 07:50:13'),
(218, 43, 'Tuesday', '13:00:00', '14:00:00', '2022-02-23 07:50:13', '2022-02-23 13:13:47', '2022-02-23 07:50:13'),
(219, 43, 'Thursday', '16:30:00', '17:30:00', '2022-02-23 07:50:13', '2022-02-23 13:13:47', '2022-02-24 03:45:06'),
(220, 43, 'Friday', '18:00:00', '19:00:00', '2022-02-23 07:50:13', '2022-02-23 13:13:47', '2022-02-24 03:45:06'),
(221, 43, 'Monday', '12:00:00', '13:00:00', '2022-02-23 07:50:47', '2022-02-23 13:20:13', '2022-02-24 03:45:06'),
(222, 43, 'Tuesday', '13:00:00', '14:00:00', '2022-02-23 07:50:47', '2022-02-23 13:20:13', '2022-02-23 07:50:47'),
(223, 43, 'Thursday', '16:00:00', '17:30:00', '2022-02-23 07:50:47', '2022-02-23 13:20:13', '2022-02-24 03:45:06'),
(224, 43, 'Friday', '18:00:00', '19:30:00', '2022-02-23 07:50:47', '2022-02-23 13:20:13', '2022-02-24 03:45:06'),
(225, 43, 'Monday', '12:00:00', '13:00:00', '2022-02-23 21:47:02', '2022-02-23 13:20:47', '2022-02-24 03:45:06'),
(226, 43, 'Tuesday', '13:00:00', '14:00:00', '2022-02-23 21:47:02', '2022-02-23 13:20:47', '2022-02-23 21:47:02'),
(227, 43, 'Thursday', '16:00:00', '17:30:00', '2022-02-23 21:47:02', '2022-02-23 13:20:47', '2022-02-24 03:45:06'),
(228, 43, 'Friday', '18:00:00', '19:30:00', '2022-02-23 21:47:02', '2022-02-23 13:20:47', '2022-02-24 03:45:06'),
(229, 43, 'Monday', '12:00:00', '13:30:00', NULL, '2022-02-24 03:17:02', '2022-02-24 03:17:02'),
(230, 43, 'Tuesday', '13:30:00', '14:00:00', NULL, '2022-02-24 03:17:02', '2022-02-24 03:17:02'),
(231, 43, 'Thursday', '16:00:00', '17:30:00', NULL, '2022-02-24 03:17:02', '2022-02-24 03:17:02'),
(232, 43, 'Friday', '18:30:00', '19:00:00', NULL, '2022-02-24 03:17:02', '2022-02-24 03:17:02'),
(233, 6, 'Monday', '10:00:00', '16:00:00', NULL, '2022-02-24 11:03:11', '2022-02-24 11:03:11'),
(234, 6, 'Tuesday', '10:00:00', '18:00:00', NULL, '2022-02-24 11:03:11', '2022-02-24 11:03:11'),
(235, 6, 'Wednesday', '06:00:00', '19:00:00', NULL, '2022-02-24 11:03:11', '2022-02-24 11:03:11'),
(236, 6, 'Thursday', '06:00:00', '20:30:00', NULL, '2022-02-24 11:03:11', '2022-02-24 11:03:11'),
(237, 6, 'Friday', '11:00:00', '20:00:00', NULL, '2022-02-24 11:03:11', '2022-02-24 11:03:11'),
(238, 6, 'Saturday', '21:00:00', '23:30:00', NULL, '2022-02-24 11:03:11', '2022-02-24 11:03:11'),
(239, 6, 'Sunday', '20:00:00', '23:00:00', NULL, '2022-02-24 11:03:11', '2022-02-24 11:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `body_sizes`
--

CREATE TABLE `body_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `body_sizes`
--

INSERT INTO `body_sizes` (`id`, `size`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Slim', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35'),
(2, 'Normal', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35'),
(3, 'Curvy', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35'),
(4, 'Chubby', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `advertisement_id` bigint(20) NOT NULL,
  `visit_type` tinyint(4) NOT NULL COMMENT '0: private visit, 1:Escort (Lady will visit you)',
  `customer_address_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extra_info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `duration_id` bigint(20) NOT NULL,
  `service_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `down_payment` int(11) NOT NULL,
  `user_address_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_address_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_extra_info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_confirmed` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0: not confirmed, 1: confirmed',
  `is_visited` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0: not visited, 1: visited',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `customer_id`, `user_id`, `advertisement_id`, `visit_type`, `customer_address_1`, `customer_address_2`, `customer_city`, `customer_telephone`, `extra_info`, `date`, `time`, `duration_id`, `service_id`, `down_payment`, `user_address_1`, `user_address_2`, `user_city`, `user_telephone`, `user_extra_info`, `is_confirmed`, `is_visited`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 6, 0, '440 Green Clarendon Parkway', 'Occaecat ut voluptas', 'Explicabo Mollit al', '2678886756', 'Qui exercitation ess', '1974-12-04', '00:42:00', 1, '11,12,13,17,18,19,21,22,24,25', 120, '', '', '', '', '', 1, 0, NULL, '2021-11-02 07:18:54', '2022-01-25 09:38:35'),
(2, 1, 1, 6, 0, '85 North White Fabien Street', 'Temporibus sit assu', 'Officia culpa exerc', '3778563456', 'Aliquam praesentium', '2021-11-12', '14:30:00', 1, '11,13,15,17,20,25', 120, '', '', '', '', '', 1, 0, NULL, '2021-11-02 07:20:58', '2022-01-25 09:38:35'),
(3, 1, 1, 6, 0, '265 West Hague Court', 'Facere dignissimos v', 'Ullamco accusamus iu', '6778787777', 'Et reprehenderit ul', '1972-09-07', '15:25:00', 1, '11,13,16,17,19,21,22,23,25', 120, '', '', '', '', '', 1, 0, NULL, '2021-11-02 07:32:24', '2022-01-25 09:38:35'),
(4, 6, 1, 6, 0, '38 Fabien Boulevard', 'Totam est velit dol', 'Ut eos alias quia in', '7370046251', 'Duis sed ducimus do', '2021-11-11', '20:46:00', 1, '11,12,13,14,16,17,18,19,21,25', 120, '', '', '', '', '', 0, 0, NULL, '2021-11-02 07:49:06', '2022-01-25 09:38:35'),
(5, 6, 1, 6, 0, '38 Fabien Boulevard', '', 'patna', '', '', '2021-11-03', '09:10:00', 1, '11,12,25', 120, '', '', '', '', '', 0, 0, NULL, '2021-11-02 08:17:26', '2022-01-25 09:38:35'),
(6, 6, 1, 6, 1, '244 Clarendon Avenue', 'Illo nulla quo id m', 'Sed perferendis prae', '8022333232', 'Magna labore iure ei', '2021-11-12', '07:46:00', 1, '13,15,16,17,19,22,24', 100, '', '', '', '', '', 0, 0, NULL, '2021-11-02 08:43:56', '2022-01-25 09:38:35'),
(7, 6, 12, 15, 0, '111/1,B.T.Road,Kolkata- 700108', 'ISI Bus Stop', 'Kolkata', '9732685090', 'na', '2021-12-12', '20:00:00', 27, '215,216,218,219,220,227', 100, '', '', '', '', '', 1, 0, NULL, '2021-12-09 12:25:04', '2022-01-25 09:38:35'),
(8, 6, 12, 15, 1, '47 East Rocky Old Boulevard', 'Quisquam saepe numqu', 'Non nisi fugiat qui', '2083498848', 'Sint dolorem nulla l', '2021-12-17', '06:33:00', 27, '217,218,222,223,226,227,229', 262, '', '', '', '', '', 1, 0, NULL, '2021-12-09 12:56:43', '2022-01-25 09:38:35'),
(9, 6, 12, 15, 0, '436 Cowley Parkway', 'Quam doloremque nisi', 'Reprehenderit ullam', '2598988858', 'Ratione consequatur', '2021-12-31', '23:07:00', 27, '218,220,223,224,228', 262, '', '', '', '', '', 1, 0, NULL, '2021-12-09 13:03:39', '2022-01-25 09:38:35'),
(10, 6, 13, 18, 0, 'Bhangar', 'NA', 'Kolkata', '9547960202', 'NA', '2021-12-12', '20:28:00', 52, '352,353,354,355,356,357', 250, '', '', '', '', '', 1, 0, NULL, '2021-12-10 12:55:26', '2022-01-25 09:38:35');

-- --------------------------------------------------------

--
-- Table structure for table `business_banners`
--

CREATE TABLE `business_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `picture` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_banners`
--

INSERT INTO `business_banners` (`id`, `user_id`, `picture`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 17, 'storage/business-banners/61d575016183322010510375361d575016183e17.jpg', NULL, '2022-01-05 10:37:53', '2022-01-25 09:38:35');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Girlfriend Experience', 'Girlfriend Experience', NULL, '2021-12-02 13:46:10', '2022-01-25 09:38:35'),
(2, 'French Kissing', 'French Kissing', NULL, '2021-12-02 13:46:10', '2022-01-25 09:38:35'),
(3, 'Positive reviews', 'Positive reviews', NULL, '2021-12-02 13:46:10', '2022-01-25 09:38:35'),
(4, 'Transsexuals', 'Transsexuals', NULL, '2021-12-02 13:46:10', '2022-01-25 09:38:35'),
(5, 'Safe sex', 'Safe sex', NULL, '2021-12-02 13:46:10', '2022-01-25 09:38:35'),
(6, 'Escort', 'Escort', NULL, '2021-12-02 13:46:10', '2022-01-25 09:38:35'),
(7, 'Blowjob with condom', 'Blowjob with condom', NULL, '2021-12-02 13:46:10', '2022-01-25 09:38:35'),
(8, 'Anal sex', 'Anal sex', NULL, '2021-12-02 13:46:10', '2022-01-25 09:38:35'),
(9, 'New Ladies', 'New Ladies', NULL, '2021-12-02 13:46:10', '2022-01-25 09:38:35'),
(10, 'S&M', 'S&M', NULL, '2021-12-02 13:46:10', '2022-01-25 09:38:35'),
(11, 'Thai Massage', 'Thai Massage', NULL, '2021-12-02 13:46:10', '2022-01-25 09:38:35');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kolkata', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35'),
(2, 2, 'Sydney', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35'),
(3, 4, 'Paris', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35'),
(4, 4, 'Lyon', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35'),
(5, 2, 'Melbourne', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35'),
(6, 3, 'Bucharest', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35'),
(7, 3, 'Sibiu', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35'),
(8, 5, 'Den Haag', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35'),
(9, 5, 'Rijswijk', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35'),
(10, 5, 'Amsterdam', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35'),
(11, 5, 'Haarlem', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35'),
(12, 5, 'Utrecht', NULL, '2022-02-23 04:02:18', '2022-02-23 09:33:41'),
(13, 5, 'Rotterdam', NULL, '2022-02-23 04:02:18', '2022-02-23 09:33:50'),
(14, 5, 'Eindhoven', NULL, '2022-02-23 04:42:17', '2022-02-23 04:42:17'),
(15, 5, 'Almere', NULL, '2022-02-23 04:42:17', '2022-02-23 04:42:17'),
(16, 5, 'Houten', NULL, '2022-02-24 07:21:27', '2022-02-24 07:21:27'),
(17, 5, 'Ridderkerk', NULL, '2022-02-24 07:29:19', '2022-02-24 07:29:19'),
(18, 5, 'Kerkrade', NULL, '2022-02-24 07:29:19', '2022-02-24 07:29:19');

-- --------------------------------------------------------

--
-- Table structure for table `club_services`
--

CREATE TABLE `club_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `popularity` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1: Shows, 0 Hide',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `club_services`
--

INSERT INTO `club_services` (`id`, `title`, `popularity`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Parking', 0, NULL, '2021-12-30 11:03:32', '2022-01-25 09:38:35'),
(2, 'Taxi Service', 0, NULL, '2021-12-30 11:03:32', '2022-01-25 09:38:35'),
(3, 'Discrete entrance', 0, NULL, '2021-12-30 11:03:32', '2022-01-25 09:38:35'),
(4, 'Wifi', 0, NULL, '2021-12-30 11:03:32', '2022-01-25 09:38:35'),
(5, 'Smoking area', 0, NULL, '2021-12-30 11:03:32', '2022-01-25 09:38:35'),
(6, 'Lounge area', 0, NULL, '2021-12-30 11:03:32', '2022-01-25 09:38:35'),
(7, 'Bar with alcoholic drinks', 0, NULL, '2021-12-30 11:03:32', '2022-01-25 09:38:35'),
(8, 'Bar with non-alcoholic drinks', 0, NULL, '2021-12-30 11:03:32', '2022-01-25 09:38:35'),
(9, 'Restaurant with snacks', 0, NULL, '2021-12-30 11:03:32', '2022-01-25 09:38:35'),
(10, 'Restaurant with buffet', 0, NULL, '2021-12-30 11:03:32', '2022-01-25 09:38:35'),
(11, 'Sex shop', 0, NULL, '2021-12-30 11:03:32', '2022-01-25 09:38:35'),
(12, 'Cinema', 0, NULL, '2021-12-30 11:03:32', '2022-01-25 09:38:35'),
(13, 'Disco/dancing', 0, NULL, '2021-12-30 11:03:32', '2022-01-25 09:38:35'),
(14, 'ATM Machine', 0, NULL, '2021-12-30 11:03:32', '2022-01-25 09:38:35'),
(15, 'Slot machines', 0, NULL, '2021-12-30 11:03:32', '2022-01-25 09:38:35'),
(16, 'Sauna', 0, NULL, '2021-12-30 11:03:32', '2022-01-25 09:38:35'),
(17, 'Jacuzzi', 0, NULL, '2021-12-30 11:03:32', '2022-01-25 09:38:35'),
(18, 'Sauna', 0, NULL, '2021-12-30 11:03:32', '2022-01-25 09:38:35'),
(19, 'Swimming pool', 0, NULL, '2021-12-30 11:03:32', '2022-01-25 09:38:35'),
(20, 'Dressing room', 0, NULL, '2021-12-30 11:03:32', '2022-01-25 09:38:35'),
(21, 'Showers', 0, NULL, '2021-12-30 11:03:32', '2022-01-25 09:38:35'),
(22, 'Towels', 0, NULL, '2021-12-30 11:03:32', '2022-01-25 09:38:35'),
(23, 'Bathrobe', 0, NULL, '2021-12-30 11:03:32', '2022-01-25 09:38:35'),
(24, 'Garden/outdoor area', 0, NULL, '2021-12-30 11:03:32', '2022-01-25 09:38:35'),
(25, 'Relaxing massage', 0, NULL, '2021-12-30 11:03:32', '2022-01-25 09:38:35'),
(26, 'Erotic massage', 0, NULL, '2021-12-30 11:03:32', '2022-01-25 09:38:35'),
(27, 'Striptease', 0, NULL, '2021-12-30 11:03:32', '2022-01-25 09:38:35'),
(28, 'Lapdance', 0, NULL, '2021-12-30 11:03:32', '2022-01-25 09:38:35'),
(29, 'Sex show', 0, NULL, '2021-12-30 11:03:32', '2022-01-25 09:38:35'),
(30, 'Private rooms', 0, NULL, '2021-12-30 11:03:32', '2022-01-25 09:38:35'),
(31, 'BDSM room', 0, NULL, '2021-12-30 11:03:32', '2022-01-25 09:38:35');

-- --------------------------------------------------------

--
-- Table structure for table `coins_details`
--

CREATE TABLE `coins_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `coins` float(8,2) NOT NULL,
  `transaction_id` bigint(20) NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coins_details`
--

INSERT INTO `coins_details` (`id`, `user_id`, `coins`, `transaction_id`, `remarks`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 180.00, 1, 'User 1 purchased 180 coins of $50', NULL, '2021-11-02 07:15:46', '2022-01-25 09:38:35'),
(2, 1, -120.00, 2, 'User 1 booked service from1 using 120 coins', NULL, '2021-11-02 07:18:54', '2022-01-25 09:38:35'),
(3, 1, 380.00, 3, 'User 1 purchased 380 coins of $100', NULL, '2021-11-02 07:19:52', '2022-01-25 09:38:35'),
(4, 1, 380.00, 4, 'User 1 purchased 380 coins of $100', NULL, '2021-11-02 07:20:25', '2022-01-25 09:38:35'),
(5, 1, -120.00, 5, 'User 1 booked service from1 using 120 coins', NULL, '2021-11-02 07:20:58', '2022-01-25 09:38:35'),
(6, 1, -120.00, 6, 'User 1 booked service from1 using 120 coins', NULL, '2021-11-02 07:32:24', '2022-01-25 09:38:35'),
(7, 6, 380.00, 7, 'User 6 purchased 380 coins of $100', NULL, '2021-11-02 07:48:10', '2022-01-25 09:38:35'),
(8, 6, 380.00, 8, 'User 6 purchased 380 coins of $100', NULL, '2021-11-02 07:48:14', '2022-01-25 09:38:35'),
(9, 6, 380.00, 9, 'User 6 purchased 380 coins of $100', NULL, '2021-11-02 07:48:18', '2022-01-25 09:38:35'),
(10, 6, 380.00, 10, 'User 6 purchased 380 coins of $100', NULL, '2021-11-02 07:48:21', '2022-01-25 09:38:35'),
(11, 6, 380.00, 11, 'User 6 purchased 380 coins of $100', NULL, '2021-11-02 07:48:24', '2022-01-25 09:38:35'),
(12, 6, 380.00, 12, 'User 6 purchased 380 coins of $100', NULL, '2021-11-02 07:48:27', '2022-01-25 09:38:35'),
(13, 6, 380.00, 13, 'User 6 purchased 380 coins of $100', NULL, '2021-11-02 07:48:31', '2022-01-25 09:38:35'),
(14, 6, -120.00, 14, 'User 6 booked service from1 using 120 coins', NULL, '2021-11-02 07:49:06', '2022-01-25 09:38:35'),
(15, 6, -120.00, 15, 'User 6 booked service from1 using 120 coins', NULL, '2021-11-02 08:17:26', '2022-01-25 09:38:35'),
(16, 6, -100.00, 16, 'User 6 booked service from 1 using 100 coins', NULL, '2021-11-02 08:43:56', '2022-01-25 09:38:35'),
(17, 6, 380.00, 17, 'User 6 purchased 380 coins of $100', NULL, '2021-12-06 13:06:58', '2022-01-25 09:38:35'),
(18, 6, -2.00, 18, 'You have purchased premium picture', NULL, '2021-12-07 13:08:16', '2022-01-25 09:38:35'),
(19, 1, 2.00, 18, 'Your Premium Picture Purchased by Customer', NULL, '2021-12-07 13:08:16', '2022-01-25 09:38:35'),
(20, 6, -2.00, 19, 'You have purchased premium picture', NULL, '2021-12-07 13:36:40', '2022-01-25 09:38:35'),
(21, 1, 2.00, 19, 'Your Premium Picture Purchased by Customer', NULL, '2021-12-07 13:36:40', '2022-01-25 09:38:35'),
(22, 6, -2.00, 20, 'You have purchased premium picture', NULL, '2021-12-07 13:36:51', '2022-01-25 09:38:35'),
(23, 1, 2.00, 20, 'Your Premium Picture Purchased by Customer', NULL, '2021-12-07 13:36:51', '2022-01-25 09:38:35'),
(24, 6, -2.00, 21, 'You have purchased premium picture', NULL, '2021-12-07 13:36:59', '2022-01-25 09:38:35'),
(25, 1, 2.00, 21, 'Your Premium Picture Purchased by Customer', NULL, '2021-12-07 13:36:59', '2022-01-25 09:38:35'),
(26, 6, -5.00, 22, 'You have purchased premium picture', NULL, '2021-12-07 13:39:35', '2022-01-25 09:38:35'),
(27, 12, 5.00, 22, 'Your Premium Picture Purchased by Customer', NULL, '2021-12-07 13:39:35', '2022-01-25 09:38:35'),
(28, 6, -2.00, 23, 'You have purchased premium picture', NULL, '2021-12-07 13:42:48', '2022-01-25 09:38:35'),
(29, 1, 2.00, 23, 'Your Premium Picture Purchased by Customer', NULL, '2021-12-07 13:42:48', '2022-01-25 09:38:35'),
(30, 6, -100.00, 24, 'User 6 booked service from 12 using 100 coins', NULL, '2021-12-09 12:25:04', '2022-01-25 09:38:35'),
(31, 6, -262.00, 25, 'User 6 booked service from 12 using 262 coins', NULL, '2021-12-09 12:56:43', '2022-01-25 09:38:35'),
(32, 6, -262.00, 26, 'You have Booked a Service for 12 using262 coins', NULL, '2021-12-09 13:03:39', '2022-01-25 09:38:35'),
(33, 12, 262.00, 26, 'Credited points 262 agains the Advertisement Booking', NULL, '2021-12-09 13:03:39', '2022-01-25 09:38:35'),
(34, 12, -2.00, 27, 'You have purchased premium picture', NULL, '2021-12-09 13:18:00', '2022-01-25 09:38:35'),
(35, 1, 2.00, 27, 'Your Premium Picture Purchased by Customer', NULL, '2021-12-09 13:18:00', '2022-01-25 09:38:35'),
(36, 12, -2.00, 28, 'You have purchased premium picture', NULL, '2021-12-09 13:18:17', '2022-01-25 09:38:35'),
(37, 1, 2.00, 28, 'Your Premium Picture Purchased by Customer', NULL, '2021-12-09 13:18:17', '2022-01-25 09:38:35'),
(38, 12, -2.00, 29, 'You have purchased premium picture', NULL, '2021-12-09 13:25:57', '2022-01-25 09:38:35'),
(39, 1, 2.00, 29, 'Your Premium Picture Purchased by Customer', NULL, '2021-12-09 13:25:57', '2022-01-25 09:38:35'),
(40, 6, -1.00, 30, 'You have purchased premium picture', NULL, '2021-12-10 12:49:55', '2022-01-25 09:38:35'),
(41, 13, 1.00, 30, 'Your Premium Picture Purchased by Customer', NULL, '2021-12-10 12:49:55', '2022-01-25 09:38:35'),
(42, 6, 380.00, 31, 'User 6 purchased 380 coins of $100', NULL, '2021-12-10 12:52:11', '2022-01-25 09:38:35'),
(43, 6, -250.00, 32, 'You have Booked a Service for 13 using 250 coins', NULL, '2021-12-10 12:55:26', '2022-01-25 09:38:35'),
(44, 13, 250.00, 32, 'Credited points 250 agains the Advertisement Booking', NULL, '2021-12-10 12:55:26', '2022-01-25 09:38:35'),
(45, 1, -2.00, 33, 'You have purchased premium picture', NULL, '2022-01-25 11:20:37', '2022-01-25 11:20:37'),
(46, 1, 2.00, 33, 'Your Premium Picture Purchased by Customer', NULL, '2022-01-25 11:20:37', '2022-01-25 11:20:37'),
(47, 6, -1.00, 34, 'You have purchased premium picture', NULL, '2022-03-06 17:27:59', '2022-03-06 17:27:59'),
(48, 13, 1.00, 34, 'Your Premium Picture Purchased by Customer', NULL, '2022-03-06 17:27:59', '2022-03-06 17:27:59'),
(49, 6, -1.00, 35, 'You have purchased premium picture', NULL, '2022-03-06 17:28:24', '2022-03-06 17:28:24'),
(50, 13, 1.00, 35, 'Your Premium Picture Purchased by Customer', NULL, '2022-03-06 17:28:24', '2022-03-06 17:28:24'),
(51, 6, -1.00, 36, 'You have purchased premium picture', NULL, '2022-03-06 17:28:43', '2022-03-06 17:28:43'),
(52, 13, 1.00, 36, 'Your Premium Picture Purchased by Customer', NULL, '2022-03-06 17:28:43', '2022-03-06 17:28:43'),
(53, 6, -1.00, 37, 'You have purchased premium picture', NULL, '2022-03-06 17:33:03', '2022-03-06 17:33:03'),
(54, 13, 1.00, 37, 'Your Premium Picture Purchased by Customer', NULL, '2022-03-06 17:33:03', '2022-03-06 17:33:03'),
(55, 6, -5.00, 38, 'You have purchased premium picture', NULL, '2022-03-06 17:42:53', '2022-03-06 17:42:53'),
(56, 12, 5.00, 38, 'Your Premium Picture Purchased by Customer', NULL, '2022-03-06 17:42:53', '2022-03-06 17:42:53'),
(57, 6, -5.00, 39, 'You have purchased premium picture', NULL, '2022-03-06 17:42:59', '2022-03-06 17:42:59'),
(58, 12, 5.00, 39, 'Your Premium Picture Purchased by Customer', NULL, '2022-03-06 17:42:59', '2022-03-06 17:42:59'),
(59, 6, -5.00, 40, 'You have purchased premium picture', NULL, '2022-03-06 17:43:05', '2022-03-06 17:43:05'),
(60, 12, 5.00, 40, 'Your Premium Picture Purchased by Customer', NULL, '2022-03-06 17:43:05', '2022-03-06 17:43:05'),
(61, 6, -5.00, 41, 'You have purchased premium picture', NULL, '2022-03-06 17:43:13', '2022-03-06 17:43:13'),
(62, 12, 5.00, 41, 'Your Premium Picture Purchased by Customer', NULL, '2022-03-06 17:43:13', '2022-03-06 17:43:13'),
(63, 6, -5.00, 42, 'You have purchased premium picture', NULL, '2022-03-06 17:46:52', '2022-03-06 17:46:52'),
(64, 12, 5.00, 42, 'Your Premium Picture Purchased by Customer', NULL, '2022-03-06 17:46:52', '2022-03-06 17:46:52'),
(65, 6, -5.00, 43, 'You have purchased premium picture', NULL, '2022-03-06 17:47:01', '2022-03-06 17:47:01'),
(66, 12, 5.00, 43, 'Your Premium Picture Purchased by Customer', NULL, '2022-03-06 17:47:01', '2022-03-06 17:47:01'),
(67, 6, -2.00, 44, 'You have purchased premium picture', NULL, '2022-03-06 18:28:53', '2022-03-06 18:28:53'),
(68, 1, 2.00, 44, 'Your Premium Picture Purchased by Customer', NULL, '2022-03-06 18:28:53', '2022-03-06 18:28:53'),
(69, 20, 380.00, 45, 'User 20 purchased 380 coins of $100', NULL, '2022-04-05 14:55:20', '2022-04-05 14:55:20'),
(70, 20, -2.00, 46, 'You have purchased premium picture', NULL, '2022-04-05 14:55:34', '2022-04-05 14:55:34'),
(71, 1, 2.00, 46, 'Your Premium Picture Purchased by Customer', NULL, '2022-04-05 14:55:34', '2022-04-05 14:55:34'),
(72, 6, -4.00, 47, 'You have purchased premium picture', NULL, '2022-04-07 13:49:31', '2022-04-07 13:49:31'),
(73, 1, 4.00, 47, 'Your Premium Picture Purchased by Customer', NULL, '2022-04-07 13:49:31', '2022-04-07 13:49:31'),
(74, 20, -10.00, 48, 'You given a tip to the lady', NULL, '2022-04-08 09:23:10', '2022-04-08 09:23:10'),
(75, 1, 10.00, 48, 'You given tip from a customer', NULL, '2022-04-08 09:23:10', '2022-04-08 09:23:10'),
(76, 20, -1.00, 49, 'You have purchased premium picture', NULL, '2022-04-11 03:56:45', '2022-04-11 03:56:45'),
(77, 1, 1.00, 49, 'Your Premium Picture Purchased by Customer', NULL, '2022-04-11 03:56:45', '2022-04-11 03:56:45'),
(78, 20, -1.00, 50, 'You have purchased premium picture', NULL, '2022-04-11 05:42:56', '2022-04-11 05:42:56'),
(79, 1, 1.00, 50, 'Your Premium Picture Purchased by Customer', NULL, '2022-04-11 05:42:56', '2022-04-11 05:42:56');

-- --------------------------------------------------------

--
-- Table structure for table `coins_rates`
--

CREATE TABLE `coins_rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coin` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coins_rates`
--

INSERT INTO `coins_rates` (`id`, `coin`, `price`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 30, 10.00, NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35'),
(2, 80, 25.00, NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35'),
(3, 180, 50.00, NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35'),
(4, 380, 100.00, NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message_from` bigint(20) NOT NULL,
  `message_to` bigint(20) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conversations`
--

INSERT INTO `conversations` (`id`, `message_from`, `message_to`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 6, 1, NULL, '2021-11-11 23:37:49', '2022-01-25 09:38:35'),
(2, 1, 5, NULL, '2021-12-28 00:49:25', '2022-01-25 09:38:35');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `phone_code`, `country_code`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'India', '91', 'IN', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35'),
(2, 'Australia', '334', 'AUS', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35'),
(3, 'Romania', '40', 'RO', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35'),
(4, 'France', '75', 'FRA', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35'),
(5, 'Nederland', '31', 'NL', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35');

-- --------------------------------------------------------

--
-- Table structure for table `cup_sizes`
--

CREATE TABLE `cup_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cup_sizes`
--

INSERT INTO `cup_sizes` (`id`, `size`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'A', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35'),
(2, 'B', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35'),
(3, 'C', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35'),
(4, 'D', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35'),
(5, '+DD', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35');

-- --------------------------------------------------------

--
-- Table structure for table `descents`
--

CREATE TABLE `descents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `descents`
--

INSERT INTO `descents` (`id`, `title`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'West-European', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35'),
(2, 'East-European', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35'),
(3, 'African', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35'),
(4, 'American', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35'),
(5, 'Arab', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35'),
(6, 'Asian', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35'),
(7, 'Latin', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lady_premium_pictures`
--

CREATE TABLE `lady_premium_pictures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `picture` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `no_of_purchase` bigint(20) NOT NULL,
  `theme` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lady_premium_pictures`
--

INSERT INTO `lady_premium_pictures` (`id`, `user_id`, `picture`, `price`, `no_of_purchase`, `theme`, `notes`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'upload/ladyPremiumPicture/618130c9e22bb211102123625618130c9e22c2.jpg', 2.00, 3, 'Sexy', 'Just for test', NULL, '2021-11-02 07:06:25', '2022-04-05 14:55:34'),
(2, 1, 'upload/ladyPremiumPicture/618130c9e304a211102123625618130c9e3053.jpeg', 2.00, 1, 'Sexy', 'Just for test', '2022-04-07 13:43:41', '2021-11-02 07:06:25', '2022-04-07 13:43:41'),
(3, 1, 'upload/ladyPremiumPicture/618130c9e3a8f211102123625618130c9e3a99.jpg', 2.00, 1, 'Sexy', 'Just for test', '2022-04-07 13:43:30', '2021-11-02 07:06:25', '2022-04-07 13:43:30'),
(4, 1, 'upload/ladyPremiumPicture/618130c9e4310211102123625618130c9e4345.jpeg', 2.00, 2, 'Sexy', 'Just for test', NULL, '2021-11-02 07:06:25', '2022-01-25 09:38:35'),
(5, 1, 'upload/ladyPremiumPicture/618130c9e5ba8211102123625618130c9e5bb0.jpeg', 2.00, 2, 'Sexy', 'Just for test', NULL, '2021-11-02 07:06:25', '2022-01-25 09:38:35'),
(6, 1, 'upload/ladyPremiumPicture/618130c9e659e211102123625618130c9e65a4.webp', 2.00, 0, 'Sexy', 'Just for test', NULL, '2021-11-02 07:06:25', '2022-01-25 09:38:35'),
(7, 1, 'upload/ladyPremiumPicture/618130c9e7067211102123625618130c9e706f.jpg', 2.00, 0, 'Sexy', 'Just for test', NULL, '2021-11-02 07:06:25', '2022-01-25 09:38:35'),
(8, 1, 'upload/ladyPremiumPicture/618130c9e7889211102123625618130c9e788f.jpg', 2.00, 1, 'Sexy', 'Just for test', NULL, '2021-11-02 07:06:25', '2022-01-25 09:38:35'),
(9, 12, 'upload/ladyPremiumPicture/61a9b50d4f2c121120306112561a9b50d4f2ce.jpg', 5.00, 1, 'Sexy', 'Just for test', NULL, '2021-12-03 06:11:25', '2022-01-25 09:38:35'),
(10, 12, 'upload/ladyPremiumPicture/61a9b50d5202d21120306112561a9b50d5203a.JPG', 5.00, 1, 'Sexy', 'Just for test', NULL, '2021-12-03 06:11:25', '2022-03-06 17:47:01'),
(11, 12, 'upload/ladyPremiumPicture/61a9b50d532f521120306112561a9b50d53301.webp', 5.00, 1, 'Sexy', 'Just for test', NULL, '2021-12-03 06:11:25', '2022-03-06 17:46:52'),
(12, 12, 'upload/ladyPremiumPicture/61a9b50d54aa721120306112561a9b50d54ab2.jpg', 5.00, 1, 'Sexy', 'Just for test', NULL, '2021-12-03 06:11:25', '2022-03-06 17:42:53'),
(13, 12, 'upload/ladyPremiumPicture/61a9b50d57a5621120306112561a9b50d57a61.jpg', 5.00, 0, 'Sexy', 'Just for test', NULL, '2021-12-03 06:11:25', '2022-01-25 09:38:35'),
(14, 12, 'upload/ladyPremiumPicture/61a9b50d5805521120306112561a9b50d5805f.jpg', 5.00, 1, 'Sexy', 'Just for test', NULL, '2021-12-03 06:11:25', '2022-03-06 17:42:59'),
(15, 12, 'upload/ladyPremiumPicture/61a9b50d58dc021120306112561a9b50d58dc9.jpg', 5.00, 0, 'Sexy', 'Just for test', NULL, '2021-12-03 06:11:25', '2022-01-25 09:38:35'),
(16, 12, 'upload/ladyPremiumPicture/61a9b50d5a56e21120306112561a9b50d5a57b.jpg', 5.00, 1, 'Sexy', 'Just for test', NULL, '2021-12-03 06:11:25', '2022-03-06 17:43:13'),
(17, 12, 'upload/ladyPremiumPicture/61a9b50d5abd021120306112561a9b50d5abd7.jpg', 5.00, 0, 'Sexy', 'Just for test', NULL, '2021-12-03 06:11:25', '2022-01-25 09:38:35'),
(18, 12, 'upload/ladyPremiumPicture/61a9b50d5b15c21120306112561a9b50d5b162.jpg', 5.00, 1, 'Sexy', 'Just for test', NULL, '2021-12-03 06:11:25', '2022-03-06 17:43:05'),
(19, 12, 'upload/ladyPremiumPicture/61ade1826f76321120610101061ade1826f771.jpg', 5.00, 0, 'Romantic', 'Just for test', NULL, '2021-12-06 10:10:10', '2022-01-25 09:38:35'),
(20, 13, 'upload/ladyPremiumPicture/61b20da4330f321120902073261b20da433100.jpg', 1.00, 1, 'Romantic', '', NULL, '2021-12-09 14:07:32', '2022-01-25 09:38:35'),
(21, 13, 'upload/ladyPremiumPicture/61b20da433f5621120902073261b20da433f64.jpg', 1.00, 1, 'Romantic', '', NULL, '2021-12-09 14:07:32', '2022-03-06 17:28:43'),
(22, 13, 'upload/ladyPremiumPicture/61b20da4347af21120902073261b20da4347b9.jpg', 1.00, 1, 'Romantic', '', NULL, '2021-12-09 14:07:32', '2022-03-06 17:33:03'),
(23, 13, 'upload/ladyPremiumPicture/61b20da434fed21120902073261b20da434ff7.jpg', 1.00, 1, 'Romantic', '', NULL, '2021-12-09 14:07:32', '2022-03-06 17:27:59'),
(24, 13, 'upload/ladyPremiumPicture/61b20da43579c21120902073261b20da4357a5.jpg', 1.00, 1, 'Romantic', '', NULL, '2021-12-09 14:07:32', '2022-03-06 17:28:24'),
(25, 1, 'upload/ladyPremiumPicture/6224fc9b20ab92203060625316224fc9b20ac4.PNG', 3.00, 0, 'Romantic', 'it&#39;s me', NULL, '2022-03-06 18:25:31', '2022-03-06 18:25:31'),
(26, 1, 'upload/ladyPremiumPicture/6224fcf0723d12203060626566224fcf0723da.PNG', 2.00, 1, 'Romantic', 'Hi guys, enjoy this photo!', NULL, '2022-03-06 18:26:56', '2022-03-06 18:28:53'),
(27, 21, 'upload/ladyPremiumPicture/623d59a263e24220325055650623d59a263e32.jpg', 1.00, 0, 'Sexy', 'ffghgnjggh', '2022-03-25 05:59:57', '2022-03-25 05:56:50', '2022-03-25 05:59:57'),
(28, 23, 'upload/ladyPremiumPicture/624eccd042e32220407113648624eccd0436a1.jpg', 1.00, 0, 'Sexy', 'Test', '2022-04-07 11:37:08', '2022-04-07 11:36:48', '2022-04-07 11:37:08'),
(29, 23, 'upload/ladyPremiumPicture/624ecec835983220407114512624ecec8359a3.mp4', 1.00, 0, 'Sexy', 'test', '2022-04-07 12:01:06', '2022-04-07 11:45:12', '2022-04-07 12:01:06'),
(30, 1, 'upload/ladyPremiumPicture/624eeae99b7e3220407014513624eeae99b7f9.jpg', 4.00, 0, 'Fun', 'Weekend trip', NULL, '2022-04-07 13:45:13', '2022-04-07 13:45:13'),
(31, 1, 'upload/ladyPremiumPicture/624eeae9a4e08220407014513624eeae9a4e1b.jpg', 4.00, 1, 'Fun', 'Weekend trip', NULL, '2022-04-07 13:45:13', '2022-04-07 13:49:31'),
(32, 1, 'upload/ladyPremiumPicture/6253a41d8a7082204110344296253a41d8a714.mp4', 1.00, 1, 'Sexy', 'Test video', '2022-04-11 04:21:14', '2022-04-11 03:44:29', '2022-04-11 04:21:14'),
(33, 1, 'upload/ladyPremiumPicture/6253bfce3bbef2204110542386253bfce3bc0e.mp4', 1.00, 1, 'Sexy', 'This is for test', '2022-04-11 06:16:36', '2022-04-11 05:42:38', '2022-04-11 06:16:36');

-- --------------------------------------------------------

--
-- Table structure for table `lady_tip_count`
--

CREATE TABLE `lady_tip_count` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `lady_id` bigint(20) NOT NULL,
  `advertisement_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lady_tip_count`
--

INSERT INTO `lady_tip_count` (`id`, `customer_id`, `lady_id`, `advertisement_id`, `created_at`, `updated_at`) VALUES
(1, 20, 1, 6, '2022-04-08 09:23:10', '2022-04-08 09:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'English', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35'),
(2, 'Bulgarian', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35'),
(3, 'Italian', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35'),
(4, 'French', NULL, '2022-02-23 05:00:32', '2022-02-23 05:00:32'),
(5, 'Portuguese', NULL, '2022-02-23 05:00:45', '2022-02-23 05:00:45'),
(6, 'Romanian', NULL, '2022-02-23 05:01:11', '2022-02-23 05:01:11'),
(7, 'Russian', NULL, '2022-02-23 05:01:23', '2022-02-23 05:01:23'),
(8, 'Dutch', NULL, '2022-02-23 05:01:34', '2022-02-23 05:01:34'),
(9, 'Chinese', NULL, '2022-02-23 05:01:47', '2022-02-23 05:01:47'),
(10, 'German', NULL, '2022-02-23 05:01:57', '2022-02-23 05:01:57'),
(11, 'Spanish', NULL, '2022-02-23 05:02:09', '2022-02-23 05:02:09'),
(12, 'Arabic', NULL, '2022-02-23 05:02:24', '2022-02-23 05:02:24');

-- --------------------------------------------------------

--
-- Table structure for table `love_counts`
--

CREATE TABLE `love_counts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` bigint(20) NOT NULL,
  `to` bigint(20) NOT NULL,
  `advertisement_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `love_counts`
--

INSERT INTO `love_counts` (`id`, `from`, `to`, `advertisement_id`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 6, '2021-11-02 07:04:45', '2022-01-25 09:38:35'),
(6, 6, 1, 4, '2021-11-11 23:19:38', '2022-01-25 09:38:35'),
(7, 6, 1, 1, '2021-11-21 22:04:59', '2022-01-25 09:38:35'),
(9, 6, 1, 5, '2021-12-09 11:46:10', '2022-01-25 09:38:35'),
(10, 6, 12, 15, '2021-12-09 11:54:33', '2022-01-25 09:38:35'),
(13, 6, 5, 19, '2021-12-27 04:24:14', '2022-01-25 09:38:35'),
(14, 5, 5, 19, '2021-12-27 04:49:18', '2022-01-25 09:38:35'),
(15, 5, 13, 17, '2021-12-27 06:27:06', '2022-01-25 09:38:35'),
(17, 1, 5, 19, '2021-12-27 06:38:01', '2022-01-25 09:38:35'),
(20, 5, 1, 5, '2021-12-27 08:40:51', '2022-01-25 09:38:35'),
(21, 5, 5, 21, '2021-12-28 00:35:51', '2022-01-25 09:38:35'),
(22, 1, 5, 21, '2021-12-28 01:49:53', '2022-01-25 09:38:35'),
(25, 5, 5, 26, '2021-12-30 05:06:41', '2022-01-25 09:38:35'),
(26, 15, 14, 27, '2021-12-31 05:59:12', '2022-01-25 09:38:35'),
(27, 16, 16, 28, '2022-01-19 10:21:47', '2022-01-25 09:38:35'),
(28, 6, 17, 39, '2022-03-06 17:26:32', '2022-03-06 17:26:32'),
(29, 6, 13, 17, '2022-03-06 17:26:55', '2022-03-06 17:26:55');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `conversation_id` bigint(20) NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_id` bigint(20) NOT NULL,
  `is_seen` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0: Not Viewed, 1: Viewd',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `conversation_id`, `message`, `from_id`, `is_seen`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'hhhh', 6, 0, NULL, '2021-11-11 23:37:49', '2022-01-25 09:38:35'),
(2, 1, 'hi, are you free today?', 6, 0, NULL, '2021-11-21 22:13:05', '2022-01-25 09:38:35'),
(3, 1, 'you ard pretty, can we have a date? what is the price?', 6, 0, NULL, '2021-11-21 22:14:23', '2022-01-25 09:38:35'),
(4, 1, 'hi yes i am free. my price is 50 euro.', 1, 0, NULL, '2021-11-21 22:17:27', '2022-01-25 09:38:35'),
(5, 2, 'test message to angel club from sunny', 1, 0, NULL, '2021-12-28 00:49:25', '2022-01-25 09:38:35'),
(6, 2, 'hello', 5, 0, NULL, '2021-12-28 00:51:14', '2022-01-25 09:38:35'),
(7, 2, 'hello', 5, 0, NULL, '2021-12-28 00:51:18', '2022-01-25 09:38:35'),
(8, 2, 'hi', 1, 0, NULL, '2021-12-28 00:51:33', '2022-01-25 09:38:35');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_05_05_073726_create_admins_table', 1),
(5, '2021_05_05_111344_create_categories_table', 1),
(6, '2021_05_05_111407_create_countries_table', 1),
(7, '2021_05_05_111419_create_cities_table', 1),
(8, '2021_05_05_111438_create_packages_table', 1),
(9, '2021_05_06_062157_create_site_settings_table', 1),
(10, '2021_05_07_050608_update_users_table', 1),
(11, '2021_05_07_050900_update_admin_table', 1),
(12, '2021_05_10_104116_create_contacts_table', 1),
(13, '2021_05_11_075838_create_advertisements_table', 1),
(14, '2021_05_26_113325_create_advertrisement_services_table', 1),
(15, '2021_05_26_122739_create_languages_table', 1),
(16, '2021_05_26_123916_update_advertrisements_table_26052021', 1),
(17, '2021_05_26_130246_create_advertisement_service_durations_table', 1),
(18, '2021_05_26_135622_create_advertisement_reviews_table', 1),
(19, '2021_05_26_143639_create_advertisements_images_table', 1),
(20, '2021_05_28_131637_create_transactions_table', 1),
(21, '2021_07_06_055942_create_lady_premium_pictures_table', 1),
(22, '2021_07_07_045538_create_conversations_table', 1),
(23, '2021_07_07_045551_create_messages_table', 1),
(24, '2021_07_07_123409_create_business_banners_table', 1),
(25, '2021_07_08_045132_create_love_counts_table', 1),
(26, '2021_07_08_074246_create_review_like_dislikes_table', 1),
(27, '2021_07_08_111056_create_premium_picture_purchases_table', 1),
(28, '2021_07_08_124411_update_premium_picture_purchases_table_08072021', 1),
(29, '2021_07_08_124431_update_lady_premium_picture_table_08072021', 1),
(30, '2021_07_09_072443_create_coins_rates_table', 1),
(31, '2021_07_09_072534_create_coins_details_table', 1),
(32, '2021_07_09_120835_update_lady_premium_pictures_table_09072021', 1),
(33, '2021_07_14_123044_create_bookings_table', 1),
(34, '2021_07_16_063553_create_cup_sizes_table', 1),
(35, '2021_07_16_063618_create_body_sizes_table', 1),
(36, '2021_07_16_063659_create_origins_table', 1),
(37, '2021_10_20_104002_create_user_verifications_table', 1),
(38, '2021_11_01_100337_create_descents_table', 1),
(39, '2021_11_01_114942_add_new_columnintoadvertisements_tableon01_nov2021519_p_m', 1),
(40, '2021_11_01_115528_add_new_columnintoadvertisements_image_tableon01_nov2021519_p_m', 1),
(41, '2021_11_01_122936_create_advertisement_working_days_table', 1),
(43, '2021_11_02_084738_add_new_columnto_advertisement_table', 2),
(44, '2021_11_02_141151_table_update_coin_details', 3),
(45, '2021_11_15_112405_add_new_columnin_useron15_nov2021454_p_m', 4),
(46, '2021_11_01_124319_create_services_table', 5),
(47, '2021_11_16_064922_add_new_columnto_user_tableon16_nov20211219_p_m', 6),
(48, '2021_12_02_082619_create_advertisement_categories_table', 6),
(49, '2021_12_07_083925_add_new_column_to_service_tableon7_dec2021209_p_m', 7),
(50, '2021_12_07_104523_check_primium_picture_titleon7_dec2021415_p_m', 7),
(52, '2021_12_29_131825_add_ad_type_column_to_advertisements_table', 8),
(54, '2021_12_30_104344_create_club_services_table', 9),
(55, '2022_01_03_090155_add_reply_by_column_to_advertisement_reviews_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `origins`
--

CREATE TABLE `origins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `origin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `origins`
--

INSERT INTO `origins` (`id`, `origin_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'East-European', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35'),
(2, 'West European', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35'),
(3, 'African', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35'),
(4, 'American', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:35');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `premium_picture_comments`
--

CREATE TABLE `premium_picture_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `picture_id` bigint(20) NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `premium_picture_comments`
--

INSERT INTO `premium_picture_comments` (`id`, `customer_id`, `picture_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 20, 1, 'Beautiful picture', '2022-04-05 08:01:14', '2022-04-05 08:01:14'),
(2, 1, 1, 'hi this is test comment', '2022-04-06 14:16:19', '2022-04-06 14:16:19'),
(3, 1, 1, 'This is test', '2022-04-07 05:54:50', '2022-04-07 05:54:50'),
(4, 6, 4, 'nice picture', '2022-04-07 06:27:14', '2022-04-07 06:27:14'),
(5, 6, 4, 'nice picture', '2022-04-07 06:59:01', '2022-04-07 06:59:01'),
(6, 6, 31, 'Nice Picture', '2022-04-07 13:50:10', '2022-04-07 13:50:10');

-- --------------------------------------------------------

--
-- Table structure for table `premium_picture_purchases`
--

CREATE TABLE `premium_picture_purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_user_id` bigint(20) NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `picture_id` bigint(20) NOT NULL,
  `price` double(8,2) NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `premium_picture_purchases`
--

INSERT INTO `premium_picture_purchases` (`id`, `from_user_id`, `customer_id`, `picture_id`, `price`, `note`, `reply`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 8, 2.00, '', '', NULL, '2021-12-07 13:08:16', '2022-01-25 09:38:35'),
(2, 1, 6, 4, 2.00, '', '', NULL, '2021-12-07 13:36:40', '2022-01-25 09:38:35'),
(3, 1, 6, 2, 2.00, '', '', NULL, '2021-12-07 13:36:51', '2022-01-25 09:38:35'),
(4, 1, 6, 5, 2.00, '', '', NULL, '2021-12-07 13:36:59', '2022-01-25 09:38:35'),
(5, 12, 6, 9, 5.00, '', '', NULL, '2021-12-07 13:39:35', '2022-01-25 09:38:35'),
(6, 1, 6, 1, 2.00, '', '', NULL, '2021-12-07 13:42:48', '2022-01-25 09:38:35'),
(7, 1, 12, 5, 2.00, '', '', NULL, '2021-12-09 13:18:00', '2022-01-25 09:38:35'),
(8, 1, 12, 3, 2.00, '', '', NULL, '2021-12-09 13:18:17', '2022-01-25 09:38:35'),
(9, 1, 12, 4, 2.00, '', '', NULL, '2021-12-09 13:25:57', '2022-01-25 09:38:35'),
(10, 13, 6, 20, 1.00, '', '', NULL, '2021-12-10 12:49:55', '2022-01-25 09:38:35'),
(11, 1, 1, 1, 2.00, '', '', NULL, '2022-01-25 11:20:37', '2022-01-25 11:20:37'),
(12, 13, 6, 23, 1.00, '', '', NULL, '2022-03-06 17:27:59', '2022-03-06 17:27:59'),
(13, 13, 6, 24, 1.00, '', '', NULL, '2022-03-06 17:28:24', '2022-03-06 17:28:24'),
(14, 13, 6, 21, 1.00, '', '', NULL, '2022-03-06 17:28:43', '2022-03-06 17:28:43'),
(15, 13, 6, 22, 1.00, '', '', NULL, '2022-03-06 17:33:03', '2022-03-06 17:33:03'),
(16, 12, 6, 12, 5.00, '', '', NULL, '2022-03-06 17:42:53', '2022-03-06 17:42:53'),
(17, 12, 6, 14, 5.00, '', '', NULL, '2022-03-06 17:42:59', '2022-03-06 17:42:59'),
(18, 12, 6, 18, 5.00, '', '', NULL, '2022-03-06 17:43:05', '2022-03-06 17:43:05'),
(19, 12, 6, 16, 5.00, '', '', NULL, '2022-03-06 17:43:13', '2022-03-06 17:43:13'),
(20, 12, 6, 11, 5.00, '', '', NULL, '2022-03-06 17:46:52', '2022-03-06 17:46:52'),
(21, 12, 6, 10, 5.00, '', '', NULL, '2022-03-06 17:47:01', '2022-03-06 17:47:01'),
(22, 1, 6, 26, 2.00, '', '', NULL, '2022-03-06 18:28:53', '2022-03-06 18:28:53'),
(23, 1, 20, 1, 2.00, '', '', NULL, '2022-04-05 14:55:34', '2022-04-05 14:55:34'),
(24, 1, 6, 31, 4.00, '', '', NULL, '2022-04-07 13:49:31', '2022-04-07 13:49:31'),
(25, 1, 20, 32, 1.00, '', '', NULL, '2022-04-11 03:56:45', '2022-04-11 03:56:45'),
(26, 1, 20, 33, 1.00, '', '', NULL, '2022-04-11 05:42:56', '2022-04-11 05:42:56');

-- --------------------------------------------------------

--
-- Table structure for table `review_like_dislikes`
--

CREATE TABLE `review_like_dislikes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` bigint(20) NOT NULL,
  `to` bigint(20) NOT NULL,
  `advertisement_id` bigint(20) NOT NULL,
  `like` tinyint(4) NOT NULL COMMENT '1: like ,0: dislike',
  `dislike` tinyint(4) NOT NULL COMMENT '1: dislike ,0: like',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `popularity` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1: Shows, 0 Hide',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `popularity`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Relaxing Massage', 0, NULL, '2021-11-15 13:44:35', '2022-01-25 09:38:36'),
(2, 'Erotic Massage', 1, NULL, '2021-11-15 13:44:35', '2022-02-22 00:08:02'),
(3, 'Anal Massage ', 0, NULL, '2021-11-15 13:44:35', '2022-01-25 09:38:36'),
(4, 'Kissing', 0, NULL, '2021-11-15 13:44:35', '2022-01-25 09:38:36'),
(5, 'Kissing with tongue', 0, NULL, '2021-11-15 13:44:35', '2022-01-25 09:38:36'),
(6, 'Girlfriend experience', 1, NULL, '2021-11-15 13:44:35', '2022-01-25 09:38:36'),
(7, 'Striptease', 1, NULL, '2021-11-15 13:44:35', '2022-02-22 00:07:05'),
(8, 'Fingering', 0, NULL, '2021-11-15 13:44:35', '2022-01-25 09:38:36'),
(9, 'Handjob', 1, NULL, '2021-11-15 13:44:35', '2022-02-22 00:08:36'),
(10, 'Titfuck', 0, NULL, '2021-11-15 13:44:35', '2022-01-25 09:38:36'),
(11, 'Pussy licking', 0, NULL, '2021-11-15 13:44:35', '2022-01-25 09:38:36'),
(12, 'Rimming (me)', 0, NULL, '2021-11-15 13:44:35', '2022-01-25 09:38:36'),
(13, 'Rimming (client)', 0, NULL, '2021-11-15 13:44:35', '2022-01-25 09:38:36'),
(14, 'Blowjob with condom', 0, NULL, '2021-11-15 13:44:35', '2022-01-25 09:38:36'),
(15, 'Blowjob without condom', 1, NULL, '2021-11-15 13:44:35', '2022-02-22 00:12:18'),
(16, 'Deep Throat', 1, NULL, '2021-11-15 13:44:35', '2022-01-25 09:38:36'),
(17, 'Sex with condom', 1, NULL, '2021-11-15 13:44:35', '2022-02-22 00:13:22'),
(18, 'Sex without condom', 0, NULL, '2021-11-15 13:44:35', '2022-01-25 09:38:36'),
(19, 'Anal sex (me)', 1, NULL, '2021-11-15 13:44:35', '2022-02-23 06:34:41'),
(20, 'Anal sex without condom (me)', 0, NULL, '2021-11-15 13:44:35', '2022-01-25 09:38:36'),
(21, 'Anal sex (client)', 1, NULL, '2021-11-15 13:44:35', '2022-01-25 09:38:36'),
(22, 'Cum on body', 0, NULL, '2021-11-15 13:44:35', '2022-01-25 09:38:36'),
(23, 'Cum on face', 0, NULL, '2021-11-15 13:44:35', '2022-01-25 09:38:36'),
(24, 'Cum in mouth', 0, NULL, '2021-11-15 13:44:35', '2022-01-25 09:38:36'),
(25, 'Swallowing', 0, NULL, '2021-11-15 13:44:35', '2022-01-25 09:38:36'),
(26, 'Toys/Dildo (me)', 0, NULL, '2021-11-15 13:44:35', '2022-01-25 09:38:36'),
(27, 'Toys/Dildo (client)', 0, NULL, '2021-11-15 13:44:35', '2022-01-25 09:38:36'),
(28, 'Trio MFF', 0, NULL, '2021-11-15 13:44:35', '2022-01-25 09:38:36'),
(29, 'Trio MMF', 0, NULL, '2021-11-15 13:44:35', '2022-01-25 09:38:36'),
(30, 'Lesbian sex', 0, NULL, '2021-11-15 13:44:35', '2022-01-25 09:38:36'),
(31, 'Group sex', 0, NULL, '2021-11-15 13:44:35', '2022-01-25 09:38:36'),
(32, 'Outdoor sex', 0, NULL, '2021-11-15 13:44:35', '2022-02-22 00:19:20'),
(33, 'Photos', 0, NULL, '2021-11-15 13:44:35', '2022-01-25 09:38:36'),
(34, 'Videos', 0, NULL, '2021-11-15 13:44:35', '2022-01-25 09:38:36'),
(35, 'Special clothes requests', 0, NULL, '2021-11-15 13:44:35', '2022-01-25 09:38:36'),
(36, 'Role Play', 0, NULL, '2021-11-15 13:44:35', '2022-01-25 09:38:36'),
(37, 'Soft SM', 1, NULL, '2021-11-15 13:44:35', '2022-02-22 00:08:51'),
(38, 'BDSM', 0, NULL, '2021-11-15 13:44:35', '2022-01-25 09:38:36'),
(39, 'Domina & Slave', 0, NULL, '2021-11-15 13:44:35', '2022-01-25 09:38:36'),
(40, 'Golden Shower (me)', 0, NULL, '2021-11-15 13:44:35', '2022-01-25 09:38:36'),
(41, 'Golden Shower (client)', 0, NULL, '2021-11-15 13:44:35', '2022-01-25 09:38:36'),
(42, 'Phone sex', 0, NULL, '2021-11-15 13:44:35', '2022-01-25 09:38:36'),
(43, 'Webcam sex', 0, NULL, '2021-11-15 13:44:35', '2022-01-25 09:38:36');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `copyright` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phn_no` bigint(20) NOT NULL,
  `site_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_map` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terms_conditons` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cancellation_policy` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `site_name`, `copyright`, `logo`, `phn_no`, `site_email`, `address`, `google_map`, `terms_conditons`, `cancellation_policy`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Datekelly', 'orem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mollis nulla tempus blandit fermentum. Vivamus semper rutrum dolor in tempus. Suspendisse lacinia metus felis, et bibendum nisi posuere pharetra.', 'images/site_logo.png', 1234567890, 'support@datekelly.ro', 'Datekelly', '', 'orem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mollis nulla tempus blandit fermentum. Vivamus semper rutrum dolor in tempus. Suspendisse lacinia metus felis, et bibendum nisi posuere pharetra.', 'orem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mollis nulla tempus blandit fermentum. Vivamus semper rutrum dolor in tempus. Suspendisse lacinia metus felis, et bibendum nisi posuere pharetra.', NULL, '2021-11-02 07:12:02', '2022-01-25 09:38:36');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `amount`, `transaction_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 50.00, 'trans_618132fa3c037211102124546618132fa3c03e', NULL, '2021-11-02 07:15:46', '2022-01-25 09:38:36'),
(2, 1, 30.00, 'trans_618133b6ceacf211102124854618133b6cead7', NULL, '2021-11-02 07:18:54', '2022-01-25 09:38:36'),
(3, 1, 100.00, 'trans_618133f057b8c211102124952618133f057b93', NULL, '2021-11-02 07:19:52', '2022-01-25 09:38:36'),
(4, 1, 100.00, 'trans_618134111b8a9211102125025618134111b8be', NULL, '2021-11-02 07:20:25', '2022-01-25 09:38:36'),
(5, 1, 30.00, 'trans_618134321787a2111021250586181343217880', NULL, '2021-11-02 07:20:58', '2022-01-25 09:38:36'),
(6, 1, 30.00, 'trans_618136e0a3838211102010224618136e0a383e', NULL, '2021-11-02 07:32:24', '2022-01-25 09:38:36'),
(7, 6, 100.00, 'trans_61813a923617d21110201181061813a9236185', NULL, '2021-11-02 07:48:10', '2022-01-25 09:38:36'),
(8, 6, 100.00, 'trans_61813a96870f021110201181461813a96870f5', NULL, '2021-11-02 07:48:14', '2022-01-25 09:38:36'),
(9, 6, 100.00, 'trans_61813a9a3ebf121110201181861813a9a3ebf7', NULL, '2021-11-02 07:48:18', '2022-01-25 09:38:36'),
(10, 6, 100.00, 'trans_61813a9d894e021110201182161813a9d894e6', NULL, '2021-11-02 07:48:21', '2022-01-25 09:38:36'),
(11, 6, 100.00, 'trans_61813aa0e85a521110201182461813aa0e85ab', NULL, '2021-11-02 07:48:24', '2022-01-25 09:38:36'),
(12, 6, 100.00, 'trans_61813aa3ca28121110201182761813aa3ca287', NULL, '2021-11-02 07:48:27', '2022-01-25 09:38:36'),
(13, 6, 100.00, 'trans_61813aa72947d21110201183161813aa729483', NULL, '2021-11-02 07:48:31', '2022-01-25 09:38:36'),
(14, 6, 30.00, 'trans_61813aca48b5821110201190661813aca48b5e', NULL, '2021-11-02 07:49:06', '2022-01-25 09:38:36'),
(15, 6, 30.00, 'trans_6181416e3285a2111020147266181416e32861', NULL, '2021-11-02 08:17:26', '2022-01-25 09:38:36'),
(16, 6, 100.00, 'trans_618147a46fed2211102021356618147a46fed9', NULL, '2021-11-02 08:43:56', '2022-01-25 09:38:36'),
(17, 6, 100.00, 'trans_61ae0af2e8c9721120601065861ae0af2e8ca5', NULL, '2021-12-06 13:06:58', '2022-01-25 09:38:36'),
(18, 6, 2.00, 'trans_61af5cc0cb11321120701081661af5cc0cb11e', NULL, '2021-12-07 13:08:16', '2022-01-25 09:38:36'),
(19, 6, 2.00, 'trans_61af6368cfe2321120701364061af6368cfe2c', NULL, '2021-12-07 13:36:40', '2022-01-25 09:38:36'),
(20, 6, 2.00, 'trans_61af63733794921120701365161af637337952', NULL, '2021-12-07 13:36:51', '2022-01-25 09:38:36'),
(21, 6, 2.00, 'trans_61af637bdd8e321120701365961af637bdd8f1', NULL, '2021-12-07 13:36:59', '2022-01-25 09:38:36'),
(22, 6, 5.00, 'trans_61af64176a6da21120701393561af64176a6e6', NULL, '2021-12-07 13:39:35', '2022-01-25 09:38:36'),
(23, 6, 2.00, 'trans_61af64d80e53821120701424861af64d80e542', NULL, '2021-12-07 13:42:48', '2022-01-25 09:38:36'),
(24, 6, 100.00, 'trans_61b1f5a08a76921120912250461b1f5a08a776', NULL, '2021-12-09 12:25:04', '2022-01-25 09:38:36'),
(25, 6, 262.00, 'trans_61b1fd0bc761d21120912564361b1fd0bc7627', NULL, '2021-12-09 12:56:43', '2022-01-25 09:38:36'),
(26, 6, 262.00, 'trans_61b1feab7063921120901033961b1feab70645', NULL, '2021-12-09 13:03:39', '2022-01-25 09:38:36'),
(27, 12, 2.00, 'trans_61b20208a3ecb21120901180061b20208a3ed8', NULL, '2021-12-09 13:18:00', '2022-01-25 09:38:36'),
(28, 12, 2.00, 'trans_61b20219ac0e221120901181761b20219ac0ef', NULL, '2021-12-09 13:18:17', '2022-01-25 09:38:36'),
(29, 12, 2.00, 'trans_61b203e54387421120901255761b203e543892', NULL, '2021-12-09 13:25:57', '2022-01-25 09:38:36'),
(30, 6, 1.00, 'trans_61b34cf3a3cc121121012495561b34cf3a3ccb', NULL, '2021-12-10 12:49:55', '2022-01-25 09:38:36'),
(31, 6, 100.00, 'trans_61b34d7b6127621121012521161b34d7b61280', NULL, '2021-12-10 12:52:11', '2022-01-25 09:38:36'),
(32, 6, 250.00, 'trans_61b34e3e07fa621121012552661b34e3e07fb3', NULL, '2021-12-10 12:55:26', '2022-01-25 09:38:36'),
(33, 1, 2.00, 'trans_61efdd058653722012511203761efdd0586544', NULL, '2022-01-25 11:20:37', '2022-01-25 11:20:37'),
(34, 6, 1.00, 'trans_6224ef1f0ec242203060527596224ef1f0ec2f', NULL, '2022-03-06 17:27:59', '2022-03-06 17:27:59'),
(35, 6, 1.00, 'trans_6224ef38bd4892203060528246224ef38bd498', NULL, '2022-03-06 17:28:24', '2022-03-06 17:28:24'),
(36, 6, 1.00, 'trans_6224ef4b39eb42203060528436224ef4b39ec1', NULL, '2022-03-06 17:28:43', '2022-03-06 17:28:43'),
(37, 6, 1.00, 'trans_6224f04f2c3e82203060533036224f04f2c3f5', NULL, '2022-03-06 17:33:03', '2022-03-06 17:33:03'),
(38, 6, 5.00, 'trans_6224f29d730202203060542536224f29d7302a', NULL, '2022-03-06 17:42:53', '2022-03-06 17:42:53'),
(39, 6, 5.00, 'trans_6224f2a384d472203060542596224f2a384d51', NULL, '2022-03-06 17:42:59', '2022-03-06 17:42:59'),
(40, 6, 5.00, 'trans_6224f2a9e088f2203060543056224f2a9e089c', NULL, '2022-03-06 17:43:05', '2022-03-06 17:43:05'),
(41, 6, 5.00, 'trans_6224f2b1660bb2203060543136224f2b1660c5', NULL, '2022-03-06 17:43:13', '2022-03-06 17:43:13'),
(42, 6, 5.00, 'trans_6224f38c15bc12203060546526224f38c15bce', NULL, '2022-03-06 17:46:52', '2022-03-06 17:46:52'),
(43, 6, 5.00, 'trans_6224f3957df4e2203060547016224f3957df5a', NULL, '2022-03-06 17:47:01', '2022-03-06 17:47:01'),
(44, 6, 2.00, 'trans_6224fd6566c8d2203060628536224fd6566c98', NULL, '2022-03-06 18:28:53', '2022-03-06 18:28:53'),
(45, 20, 100.00, 'trans_624c5858f1667220405025520624c5858f1674', NULL, '2022-04-05 14:55:20', '2022-04-05 14:55:20'),
(46, 20, 2.00, 'trans_624c586623730220405025534624c58662373e', NULL, '2022-04-05 14:55:34', '2022-04-05 14:55:34'),
(47, 6, 4.00, 'trans_624eebeb223e3220407014931624eebeb223ef', NULL, '2022-04-07 13:49:31', '2022-04-07 13:49:31'),
(48, 20, 10.00, 'trans_624ffefe9927f220408092310624ffefe9928d', NULL, '2022-04-08 09:23:10', '2022-04-08 09:23:10'),
(49, 20, 1.00, 'trans_6253a6fd03b472204110356456253a6fd03b51', NULL, '2022-04-11 03:56:45', '2022-04-11 03:56:45'),
(50, 20, 1.00, 'trans_6253bfe01384e2204110542566253bfe01385b', NULL, '2022-04-11 05:42:56', '2022-04-11 05:42:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` int(11) NOT NULL COMMENT '1: Ladies, 2: Clubs, 3: Mens',
  `assigned_club` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phn_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `address` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_address` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0: Blocked, 1: Active',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `assigned_club`, `name`, `email`, `phn_no`, `whatsapp_no`, `password`, `about`, `age`, `profile_pic`, `country_id`, `city_id`, `address`, `website_address`, `status`, `email_verified_at`, `remember_token`, `deleted_at`, `created_at`, `updated_at`, `dob`) VALUES
(1, 1, 0, 'Sunny Leone', 'sunnyleone@gmail.com', '1234567890', '1234567890', '$2y$10$LjOPJXgKj.fAuvvBH7H01uSRjnACLXEeX3AApm6Qz6yhFnkCPkDJ.', 'I am a indian actress', '26', 'upload/ladies/61ae1dc97bbf021120602272161ae1dc97bbf4.jpg', 1, 1, 'Kolkata', '', 1, '2021-11-17 12:39:08', NULL, NULL, '2021-11-02 01:52:17', '2022-01-25 09:38:36', '1995-03-16'),
(2, 1, 0, 'Katrina Kaif', 'katrinakaif@gmail.com', '1234567890', '1234567890', '$2y$10$V4T5FcKF50NslkXioABSFOH3RkEgZclK6975NIlNZvH.YuGnsosCa', 'I am a indian actress', '21', 'upload/ladies/6180e729bac342111020722176180e729bac3d.jpg', 1, 1, 'Kolkata', '', 1, NULL, NULL, NULL, '2021-11-02 01:52:17', '2022-01-25 09:38:36', '0000-00-00'),
(3, 1, 0, 'Sunny Leone 2', 'sunnyleone2@gmail.com', '1234567890', '1234567890', '$2y$10$V4T5FcKF50NslkXioABSFOH3RkEgZclK6975NIlNZvH.YuGnsosCa', 'I am a indian actress', '21', 'upload/ladies/6180e729bac342111020722176180e729bac3d.jpg', 1, 1, 'Kolkata', '', 1, NULL, NULL, NULL, '2021-11-02 01:52:17', '2022-01-25 09:38:36', '0000-00-00'),
(4, 1, 0, 'Katrina Kaif 2', 'katrinakaif2@gmail.com', '1234567890', '1234567890', '$2y$10$V4T5FcKF50NslkXioABSFOH3RkEgZclK6975NIlNZvH.YuGnsosCa', 'I am a indian actress', '21', 'upload/ladies/6180e729bac342111020722176180e729bac3d.jpg', 1, 1, 'Kolkata', '', 1, NULL, NULL, NULL, '2021-11-02 01:52:17', '2022-01-25 09:38:36', '0000-00-00'),
(5, 2, 0, 'Dark Angels Escort Services', 'club@hotmail.com', '6677634568', '6677634568', '$2y$10$a5/OuP3Vi.kJjRU3a1VVauuJsusMiZMJWJ3df25.rHj9SNxg96knK', 'This is the best club in Kolkata.\r\n\r\nThis is the best club in Kolkata', '31', 'images/defaultClub.jpg', 1, 1, 'Kolkata Salt lake', 'https://datekelly.com', 1, '2021-11-11 12:40:31', NULL, NULL, '2021-11-02 02:20:55', '2022-01-25 09:38:36', '0000-00-00'),
(6, 3, 0, 'Rajeev', 'rajeev@gmail.com', '7370046251', '7370046251', '$2y$10$J5EO9.BAO1TIEwaieZwn2OYXtwJKVPNQOb6xdlXP9.aBWixzSQPL.', 'I am A Software Developer', '19', 'upload/men/624e8c2dc1580220407070101624e8c2dc1587.jpg', 1, 1, 'Kolkata', '', 1, '2021-11-18 12:42:06', NULL, NULL, '2021-11-02 07:47:47', '2022-04-07 07:01:01', '2003-11-04'),
(7, 3, 0, 'Test', 'testmail@gmail.com', '', '', '$2y$10$aNAca3qz2Q/vUxiDX1G7qessSKGtKlEzpwhP/O8gmZvaJRhuDi1hm', '', '25', 'images/default_image.png', 0, 0, '', '', 0, NULL, NULL, NULL, '2021-11-15 06:06:43', '2022-01-25 09:38:36', '1996-02-14'),
(8, 1, 0, 'Ladies', 'ladies@checkmail.com', '3899889880', '', '$2y$10$bPuxEI71m4kD0l51m5svgOEJu8SyBAdsuoXYBQXASbKEQHIXG6Y2W', '', '18', 'images/girlDefault.png', 0, 0, '', '', 1, NULL, NULL, NULL, '2021-11-15 06:24:07', '2022-01-25 09:38:36', '2003-10-28'),
(10, 1, 0, 'Priya Mehta', 'rrpit9@gmail.com', '7370046251', '', '$2y$10$ZH8h52drmbe2pxWjYn/iRe5aX5DOgzrJDasxnGX76DrbpX6YQBQp6', '', '26', 'images/girlDefault.png', 0, 0, '', '', 1, NULL, NULL, NULL, '2021-11-16 07:48:44', '2022-01-25 09:38:36', '1995-06-09'),
(11, 3, 0, 'Md Aasim', 'aasim@onenesstechs.in', '', '', '$2y$10$rusNcn829SeXa8wmvctMKOEqeSheNS/21xxO.9rkaNDOV/1iuqNuu', '', '19', 'images/default_image.png', 0, 0, '', '', 1, '2021-11-16 10:29:59', NULL, NULL, '2021-11-16 10:14:46', '2022-01-25 09:38:36', '2002-04-03'),
(12, 1, 0, 'Priyanka Kothari', 'priyankakothari@gmail.com', '7670852255', '', '$2y$10$RvZn3FDgqVORfSLo/OgkSei1Xw5VbBLdwu6POM0xaHR/CBoeBLb5K', '', '38', 'upload/ladies/61ae09361ad7121120612593461ae09361ad76.jpg', 0, 0, '', '', 1, '2021-12-03 11:20:07', NULL, NULL, '2021-12-03 05:49:06', '2022-01-25 09:38:36', '1983-11-30'),
(13, 1, 0, 'Carla', 'carla@yopmail.com', '9732685090', '', '$2y$10$ASJJ5jpk/.tYGiyyTvqZ.O2f0zmIxzQ/lB2HY6MD4J14WD3pwCMXq', '', '21', 'upload/ladies/61b2140fb076221120902345561b2140fb0766.jpg', 0, 0, '', '', 1, '2021-12-09 13:27:10', NULL, NULL, '2021-12-09 13:24:44', '2022-01-25 09:38:36', '2000-07-09'),
(14, 2, 0, 'Retro Club 1920', 'retro1920@gmail.com', '9876543210', '', '$2y$10$l2NWd0/rKKlQNzV8eL4KPOW.WwTdLZAFx3EoWhIHpa3RZtHwqsiQ2', 'This is the retro club 1920', '', 'upload/club/61efc4eb3788722012509374761efc4eb3788e.jpg', 1, 1, '987 Mitra square', 'https://datekelly.dev91.website/', 1, '2021-12-30 08:14:04', NULL, NULL, '2021-12-30 02:43:14', '2022-01-25 09:38:36', '0000-00-00'),
(16, 2, 0, 'Adam & Eve\'s Club', 'adameve@gmail.com', '9876543210', '', '$2y$10$a5/OuP3Vi.kJjRU3a1VVauuJsusMiZMJWJ3df25.rHj9SNxg96knK', '', '', 'images/defaultClub.jpg', 3, 7, '921 Gowda Forest', 'https://datekelly.dev91.website/', 1, '2022-01-03 15:08:47', NULL, NULL, '2022-01-04 06:35:55', '2022-01-25 09:38:36', '0000-00-00'),
(17, 2, 0, 'Bistroy', 'bistro@yopmail.com', '9998887776', '', '$2y$10$TXmzklDO1.CzwCibLoAfR.VO72154IrUlmk9OaCSRKHkzhAe9n/ti', '', '', 'images/defaultClub.jpg', 1, 1, 'Saltlake', 'https://www.bistro.com', 1, '2022-01-05 10:22:43', NULL, NULL, '2022-01-05 10:21:46', '2022-01-25 09:38:36', '0000-00-00'),
(18, 2, 0, 'Tantra', 'bistroy@yopmail.com', '9998887776', '', '$2y$10$froV9Q7r2DQILAILo9tixOH5zIYVIOWGLjJ2HG35H.w.xUVz9Rkea', 'One of the best night clubs of Dubai has come to Kolkata to rock the night life.', '', 'upload/club/61d7ff5053dc522010708523261d7ff5053dd3.png', 1, 1, 'Saltlake', 'https://www.bistro.com', 1, '2022-01-05 12:12:24', NULL, NULL, '2022-01-05 12:11:48', '2022-01-25 09:38:36', '0000-00-00'),
(19, 2, 0, 'Ladies Club', 'ladiesclub@yopmail.com', '9998887776', '', '$2y$10$WFa9OpLICrx3ibb5Tka7Re9m2WKcb0fzpW.gH.Fx8tuCVaN1JrT7a', 'Hello Everyone,\r\nThis is a little about of our club , please consider this a dummy text for test purpose .', '', 'upload/club/61ea8d1078d0722012110380861ea8d1078d12.jpg', 5, 8, 'Amsterdam', 'https://www.ladiesclub.com', 1, '2022-01-21 10:24:24', NULL, NULL, '2022-01-21 10:23:31', '2022-01-25 09:38:36', '0000-00-00'),
(20, 3, 0, 'Member', 'abcd1200@yopmail.com', '', '', '$2y$10$tae.S7iZeIZkvfRD3O34auDLOU/i7fN6yuV.Keu0IjAoIKVQV/Iia', '', '18', 'images/default_image.png', 0, 0, '', '', 1, '2022-02-22 00:33:14', NULL, NULL, '2022-02-22 00:31:18', '2022-02-22 00:33:14', '2004-02-22'),
(21, 1, 0, 'Transsexuals', 'abcd1201@yopmail.com', '1234567890', '', '$2y$10$S9zbfVgp/fWJkBJNCLP7vunw5mlMwAYw6zax0q.1pBGSdiWtFBlci', '', '18', 'images/girlDefault.png', 0, 0, '', '', 0, '2022-02-22 00:37:29', NULL, '2022-03-25 05:59:57', '2022-02-22 00:36:44', '2022-03-25 05:59:57', '2004-02-22'),
(22, 2, 0, 'Club', 'abcd1203@yopmail.com', '1234567890', '', '$2y$10$X38wZo7PjDx1t6fSVRKqcOwfmsxAjFJ/bvwOUjhcfeNGau.ZB0iUe', '', '', 'images/defaultClub.jpg', 1, 1, 'tst', 'http://127.0.0.1:8000/clubs-register', 1, '2022-02-22 00:41:14', NULL, NULL, '2022-02-22 00:40:05', '2022-02-22 00:41:14', '0000-00-00'),
(23, 1, 0, 'Ladies', 'abcd1202@yopmail.com', '1234567890', '', '$2y$10$Vax51GtS1gQK1YjmUnFFpOE7tIAFe9X5wnDnp0n9QMPUzoFLoY3te', '', '18', 'images/girlDefault.png', 0, 0, '', '', 1, '2022-03-25 06:13:38', NULL, NULL, '2022-03-25 06:12:38', '2022-03-25 06:13:38', '2004-03-25');

-- --------------------------------------------------------

--
-- Table structure for table `user_verifications`
--

CREATE TABLE `user_verifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `id_card` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_card_with_user` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `newspaper_with_user` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_img` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_verifications`
--

INSERT INTO `user_verifications` (`id`, `user_id`, `id_card`, `id_card_with_user`, `newspaper_with_user`, `user_img`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'user/verification/1/163f39baad9ce485a0e23aff0304c255.jpeg', '', '', '', NULL, '2021-11-02 01:52:17', '2022-01-25 09:38:36'),
(2, 5, '', '', '', '', NULL, '2021-11-02 02:20:55', '2022-01-25 09:38:36'),
(3, 6, '', '', '', '', NULL, '2021-11-02 07:47:47', '2022-01-25 09:38:36'),
(4, 7, '', '', '', '', NULL, '2021-11-15 06:06:43', '2022-01-25 09:38:36'),
(5, 8, '', '', '', '', NULL, '2021-11-15 06:24:07', '2022-01-25 09:38:36'),
(6, 9, '', '', '', '', NULL, '2021-11-15 06:38:10', '2022-01-25 09:38:36'),
(7, 10, '', '', '', '', NULL, '2021-11-16 07:48:44', '2022-01-25 09:38:36'),
(8, 11, '', '', '', '', NULL, '2021-11-16 10:14:46', '2022-01-25 09:38:36'),
(9, 12, '', '', '', '', NULL, '2021-12-03 05:49:06', '2022-01-25 09:38:36'),
(10, 13, '', '', '', '', NULL, '2021-12-09 13:24:44', '2022-01-25 09:38:36'),
(11, 14, '', '', '', '', NULL, '2021-12-30 02:43:14', '2022-01-25 09:38:36'),
(12, 15, '', '', '', '', NULL, '2021-12-30 14:22:10', '2022-01-25 09:38:36'),
(13, 16, '', '', '', '', NULL, '2022-01-04 06:35:55', '2022-01-25 09:38:36'),
(14, 17, '', '', '', '', NULL, '2022-01-05 10:21:46', '2022-01-25 09:38:36'),
(15, 18, '', '', '', '', NULL, '2022-01-05 12:11:48', '2022-01-25 09:38:36'),
(16, 19, '', '', '', '', NULL, '2022-01-21 10:23:31', '2022-01-25 09:38:36'),
(17, 20, '', '', '', '', NULL, '2022-02-22 00:31:18', '2022-02-22 00:31:18'),
(18, 21, '', '', '', '', '2022-03-25 05:59:57', '2022-02-22 00:36:44', '2022-03-25 05:59:57'),
(19, 22, '', '', '', '', NULL, '2022-02-22 00:40:05', '2022-02-22 00:40:05'),
(20, 23, '', '', '', '', NULL, '2022-03-25 06:12:38', '2022-03-25 06:12:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisements_images`
--
ALTER TABLE `advertisements_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisement_categories`
--
ALTER TABLE `advertisement_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisement_reviews`
--
ALTER TABLE `advertisement_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisement_services`
--
ALTER TABLE `advertisement_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisement_service_durations`
--
ALTER TABLE `advertisement_service_durations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisement_working_days`
--
ALTER TABLE `advertisement_working_days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `body_sizes`
--
ALTER TABLE `body_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_banners`
--
ALTER TABLE `business_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `club_services`
--
ALTER TABLE `club_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coins_details`
--
ALTER TABLE `coins_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coins_rates`
--
ALTER TABLE `coins_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cup_sizes`
--
ALTER TABLE `cup_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `descents`
--
ALTER TABLE `descents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `lady_premium_pictures`
--
ALTER TABLE `lady_premium_pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lady_tip_count`
--
ALTER TABLE `lady_tip_count`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `love_counts`
--
ALTER TABLE `love_counts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `origins`
--
ALTER TABLE `origins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `premium_picture_comments`
--
ALTER TABLE `premium_picture_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `premium_picture_purchases`
--
ALTER TABLE `premium_picture_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_like_dislikes`
--
ALTER TABLE `review_like_dislikes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_verifications`
--
ALTER TABLE `user_verifications`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `advertisements_images`
--
ALTER TABLE `advertisements_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `advertisement_categories`
--
ALTER TABLE `advertisement_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `advertisement_reviews`
--
ALTER TABLE `advertisement_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `advertisement_services`
--
ALTER TABLE `advertisement_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=733;

--
-- AUTO_INCREMENT for table `advertisement_service_durations`
--
ALTER TABLE `advertisement_service_durations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `advertisement_working_days`
--
ALTER TABLE `advertisement_working_days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `body_sizes`
--
ALTER TABLE `body_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `business_banners`
--
ALTER TABLE `business_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `club_services`
--
ALTER TABLE `club_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `coins_details`
--
ALTER TABLE `coins_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `coins_rates`
--
ALTER TABLE `coins_rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cup_sizes`
--
ALTER TABLE `cup_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `descents`
--
ALTER TABLE `descents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lady_premium_pictures`
--
ALTER TABLE `lady_premium_pictures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `lady_tip_count`
--
ALTER TABLE `lady_tip_count`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `love_counts`
--
ALTER TABLE `love_counts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `origins`
--
ALTER TABLE `origins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `premium_picture_comments`
--
ALTER TABLE `premium_picture_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `premium_picture_purchases`
--
ALTER TABLE `premium_picture_purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `review_like_dislikes`
--
ALTER TABLE `review_like_dislikes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_verifications`
--
ALTER TABLE `user_verifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
