-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 20, 2015 at 06:51 PM
-- Server version: 5.5.38
-- PHP Version: 5.5.18

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `amsisinvoice`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE IF NOT EXISTS `candidates` (
`id` int(10) unsigned NOT NULL,
  `website_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job_type` enum('full','partial','freelance') COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `available` tinyint(1) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('male','female') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `website_url`, `description`, `phone`, `job_type`, `category_id`, `available`, `slug`, `gender`, `created_at`, `updated_at`) VALUES
(1, 'http://www.larsonkreiger.com/', 'Quia nulla a mollitia alias voluptate consequuntur praesentium quisquam. Voluptatibus blanditiis in doloremque et non odio quae.', '849.206.5381', 'full', 2, 1, 'clemente-pichardo', 'male', '2015-08-30 00:08:13', '2015-09-20 00:54:33'),
(2, 'http://jakubowski.com/', 'Dolores libero ipsum et. Vitae rerum est nisi animi. Necessitatibus exercitationem iure sit cupiditate quia eos est ea. Libero vel occaecati expedita dolorem.', '', 'full', 1, 1, 'edna-oreilly', 'female', '2015-08-30 00:08:14', '2015-08-30 00:08:14'),
(3, 'http://gerholdprice.org/', 'Nesciunt minima non cum natus repellat. Et sit quasi assumenda omnis corrupti. Nihil ut magni voluptatem facere sed atque. Corrupti sapiente quam ab rem.', '', 'full', 1, 1, 'margot-lockman', 'male', '2015-08-30 00:08:14', '2015-08-30 00:08:14'),
(4, 'http://sporer.com/', 'Libero sed illo ut qui debitis. Quae cupiditate et rerum dignissimos ut. Aperiam nihil quia vel. Eum harum error exercitationem libero harum. Error sit aliquam amet sunt.', '', 'full', 2, 1, 'merl-hickle', 'male', '2015-08-30 00:08:15', '2015-08-30 00:08:15'),
(5, 'http://www.starkmayer.com/', 'Culpa a natus quia distinctio eveniet. Officia laudantium ratione qui eligendi consequatur sit. Molestiae rerum sint aut ut dolore reprehenderit tenetur. Quod deserunt eum sint qui temporibus.', '', 'full', 3, 1, 'ms-ethyl-mclaughlin-v', 'male', '2015-08-30 00:08:15', '2015-08-30 00:08:15'),
(6, 'http://langosh.com/', 'Nemo quos id et impedit culpa quidem. Aut sit dolore culpa neque quos qui. Quasi voluptatibus corrupti saepe vel. Quia inventore dicta cupiditate autem aut rerum et.', '', 'full', 1, 1, 'jillian-wunsch', 'male', '2015-08-30 00:08:16', '2015-08-30 00:08:16'),
(7, 'http://www.dooley.info/', 'Expedita ut error adipisci tempore delectus. Ipsum ratione ex tempora. Sed voluptatem velit porro est.', '', 'full', 3, 1, 'mandy-olson-ii', 'male', '2015-08-30 00:08:17', '2015-08-30 00:08:17'),
(8, 'http://renner.com/', 'Ut molestiae pariatur veniam eum temporibus vel facere. Error ipsam voluptas numquam. Praesentium omnis non tempore quod dolor.', '', 'full', 2, 1, 'gussie-nikolaus', 'male', '2015-08-30 00:08:17', '2015-08-30 00:08:17'),
(9, 'http://trantow.org/', 'Quas ut sunt omnis quidem. Commodi culpa a dolorem fugit alias sequi. Architecto ab possimus nihil inventore.', '', 'full', 1, 1, 'dejuan-dibbert', 'male', '2015-08-30 00:08:18', '2015-08-30 00:08:18');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Backend developers', 'backend-developers', '2015-08-19 03:21:10', '2015-08-19 03:21:10'),
(2, 'Frontend developers', 'frontend-developers', '2015-08-19 03:21:10', '2015-08-19 03:21:10'),
(3, 'Designers', 'designers', '2015-08-19 03:21:10', '2015-08-19 03:21:10');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
`id` int(10) unsigned NOT NULL,
  `type` enum('person','company') COLLATE utf8_unicode_ci NOT NULL,
  `rnc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `noid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cellphone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comments` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `available` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `type`, `rnc`, `noid`, `name`, `contact_name`, `address`, `phone`, `cellphone`, `email`, `comments`, `created_at`, `updated_at`, `available`) VALUES
(1, '', '', '', 'N/A', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(3, 'company', '131080146', '03103188318', 'Awesome Media', 'Clemente Pichardo', 'Lic. Aristides Fiallo Cabral No. 101, Suite 301', '8095658065', '8492065381', 'edmundo@awesomemedia.do', 'Publicitaria Digial', '2015-09-06 04:00:00', '2015-09-06 04:00:00', 1),
(6, 'company', '111222', '', 'Ferreteria Ochoa', '', '', '', '', '', '', '2015-09-19 01:23:06', '2015-09-19 01:23:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `configurations`
--

CREATE TABLE IF NOT EXISTS `configurations` (
`id` int(10) unsigned NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('value','date') COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `configurations`
--

INSERT INTO `configurations` (`id`, `alias`, `name`, `description`, `value`, `type`, `updated_at`, `created_at`) VALUES
(1, 'itbis', 'ITBIS 18 %', 'Impuesto Sobre la Renta', '18.00', 'value', '2015-08-29 04:00:00', '2015-08-29 04:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
`id` int(10) unsigned NOT NULL,
  `order_id` int(10) unsigned NOT NULL,
  `total_paid` float(10,2) NOT NULL DEFAULT '0.00',
  `pay_days` int(6) NOT NULL,
  `pay_date` datetime NOT NULL,
  `ncf_sequency_id` int(11) NOT NULL,
  `rnc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `order_id`, `total_paid`, `pay_days`, `pay_date`, `ncf_sequency_id`, `rnc`, `created_at`, `updated_at`) VALUES
(2, 31, 0.00, 0, '0000-00-00 00:00:00', 0, '', '2015-09-17 00:31:35', '2015-09-17 00:31:35'),
(3, 32, 0.00, 0, '0000-00-00 00:00:00', 0, '', '2015-09-17 00:31:55', '2015-09-17 00:31:55'),
(4, 33, 0.00, 0, '0000-00-00 00:00:00', 0, '', '2015-09-17 00:33:13', '2015-09-17 00:33:13'),
(5, 34, 0.00, 0, '0000-00-00 00:00:00', 0, '', '2015-09-17 00:34:19', '2015-09-17 00:34:19'),
(6, 35, 0.00, 0, '0000-00-00 00:00:00', 0, '', '2015-09-17 00:34:56', '2015-09-17 00:34:56'),
(7, 36, 0.00, 0, '0000-00-00 00:00:00', 0, '', '2015-09-17 00:36:05', '2015-09-17 00:36:05'),
(8, 37, 0.00, 0, '0000-00-00 00:00:00', 0, '', '2015-09-17 00:36:51', '2015-09-17 00:36:51'),
(9, 38, 0.00, 0, '0000-00-00 00:00:00', 0, '', '2015-09-17 00:37:03', '2015-09-17 00:37:03'),
(10, 39, 0.00, 0, '0000-00-00 00:00:00', 0, '', '2015-09-17 00:37:16', '2015-09-17 00:37:16'),
(11, 40, 18000.00, 0, '0000-00-00 00:00:00', 0, '', '2015-09-17 00:37:31', '2015-09-17 00:37:31'),
(12, 41, 18000.00, 0, '0000-00-00 00:00:00', 0, '', '2015-09-17 00:40:03', '2015-09-17 00:40:03'),
(13, 42, 7000.00, 0, '0000-00-00 00:00:00', 0, '', '2015-09-17 00:45:46', '2015-09-17 00:45:46'),
(14, 43, 7000.00, 0, '0000-00-00 00:00:00', 0, '131080145', '2015-09-17 00:46:50', '2015-09-17 00:46:50'),
(15, 44, 7000.00, 0, '0000-00-00 00:00:00', 0, '131080145', '2015-09-17 01:43:47', '2015-09-17 01:43:47'),
(16, 45, 7000.00, 0, '0000-00-00 00:00:00', 0, '131080145', '2015-09-17 01:44:03', '2015-09-17 01:44:03'),
(17, 46, 7000.00, 0, '0000-00-00 00:00:00', 0, '131080145', '2015-09-17 01:44:44', '2015-09-17 01:44:44'),
(18, 47, 7000.00, 0, '0000-00-00 00:00:00', 0, '131080145', '2015-09-17 01:45:48', '2015-09-17 01:45:48'),
(19, 48, 7000.00, 0, '0000-00-00 00:00:00', 0, '131080145', '2015-09-17 01:46:23', '2015-09-17 01:46:23'),
(20, 49, 7000.00, 0, '0000-00-00 00:00:00', 0, '131080145', '2015-09-17 01:46:59', '2015-09-17 01:46:59'),
(21, 50, 7000.00, 0, '0000-00-00 00:00:00', 0, '131080145', '2015-09-17 01:51:23', '2015-09-17 01:51:23'),
(22, 51, 1000.00, 0, '0000-00-00 00:00:00', 0, '', '2015-09-17 19:31:09', '2015-09-17 19:31:09'),
(23, 58, 6000.00, 0, '0000-00-00 00:00:00', 0, '', '2015-09-19 03:38:22', '2015-09-19 03:38:22');

-- --------------------------------------------------------

--
-- Table structure for table `invoices_details`
--

CREATE TABLE IF NOT EXISTS `invoices_details` (
`id` int(10) unsigned NOT NULL,
  `invoice_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float(2,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices_payments`
--

CREATE TABLE IF NOT EXISTS `invoices_payments` (
`id` int(10) unsigned NOT NULL,
  `invoice_id` int(10) unsigned NOT NULL,
  `amount` float(10,2) NOT NULL,
  `payment_method` enum('cash','credit_card','check','transfer') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoices_payments`
--

INSERT INTO `invoices_payments` (`id`, `invoice_id`, `amount`, `payment_method`, `created_at`, `updated_at`) VALUES
(1, 17, 0.99, 'cash', '2015-09-17 01:44:45', '2015-09-17 01:44:45'),
(2, 17, 0.99, 'cash', '2015-09-17 01:44:45', '2015-09-17 01:44:45'),
(3, 18, 0.99, 'cash', '2015-09-17 01:45:48', '2015-09-17 01:45:48'),
(4, 18, 0.99, 'cash', '2015-09-17 01:45:48', '2015-09-17 01:45:48'),
(5, 19, 0.99, 'cash', '2015-09-17 01:46:23', '2015-09-17 01:46:23'),
(6, 19, 0.99, 'cash', '2015-09-17 01:46:23', '2015-09-17 01:46:23'),
(7, 20, 2000.00, 'cash', '2015-09-17 01:46:59', '2015-09-17 01:46:59'),
(8, 20, 5000.00, 'cash', '2015-09-17 01:46:59', '2015-09-17 01:46:59'),
(9, 21, 2000.00, 'cash', '2015-09-17 01:51:23', '2015-09-17 01:51:23'),
(10, 21, 5000.00, 'cash', '2015-09-17 01:51:23', '2015-09-17 01:51:23'),
(11, 22, 1000.00, 'cash', '2015-09-17 19:31:09', '2015-09-17 19:31:09'),
(12, 23, 1000.00, 'cash', '2015-09-19 03:38:22', '2015-09-19 03:38:22'),
(13, 23, 5000.00, 'cash', '2015-09-19 03:38:22', '2015-09-19 03:38:22');

-- --------------------------------------------------------

--
-- Table structure for table `itbis`
--

CREATE TABLE IF NOT EXISTS `itbis` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` float(10,2) NOT NULL,
  `available` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `itbis`
--

INSERT INTO `itbis` (`id`, `name`, `value`, `available`, `created_at`, `updated_at`) VALUES
(1, 'General', 18.00, 1, '2015-08-30 02:07:12', '2015-08-30 02:07:12'),
(2, 'Excentos', 0.00, 1, '2015-08-30 02:07:12', '2015-08-30 02:07:12'),
(3, 'Subsidiados', 5.00, 1, '2015-08-30 02:07:12', '2015-08-30 02:07:12'),
(4, 'Especial', 10.00, 1, '2015-08-30 02:07:12', '2015-08-30 02:07:12');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Caja 1', '', '2015-08-29 23:44:15', '2015-08-29 23:44:15'),
(2, 'Caja 2', '', '2015-08-29 23:44:15', '2015-08-29 23:44:15'),
(3, 'Caja 3', '', '2015-08-29 23:44:15', '2015-08-29 23:44:15');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_07_05_141933_create_users_table', 1),
('2015_07_05_152825_create_categories_table', 1),
('2015_07_05_153123_create_candidates_table', 1),
('2015_07_10_095900_create_products_categories_table', 1),
('2015_07_10_095944_create_products_table', 1),
('2015_07_10_100022_create_configurations_table', 1),
('2015_07_10_100238_create_orders_status_table', 1),
('2015_07_10_100312_create_orders_table', 1),
('2015_07_10_100351_create_orders_details_table', 1),
('2015_07_10_100425_create_orders_credits_table', 1),
('2015_07_10_100501_create_products_logs_table', 1),
('2015_07_11_190834_create_invoices_table', 1),
('2015_07_11_191019_create_invoices_details_table', 1),
('2015_07_11_191055_create_invoices_payments_table', 1),
('2015_08_23_154745_create_itbis_table', 2),
('2015_08_29_193335_create_locations_table', 3),
('2015_08_29_194544_update_users_table', 4),
('2015_08_29_200722_update_users_table', 5),
('2015_08_29_202923_create_ncf_table', 6),
('2015_08_29_202934_create_ncf_sequencies_table', 6),
('2015_08_29_221034_update_configurations_table', 7),
('2015_08_30_154900_update_ncf_sequency_table', 8),
('2015_09_02_154426_update_orders_table', 9),
('2015_09_04_000803_update_invoices_table', 9),
('2015_09_05_195328_update_product_table', 10),
('2015_09_05_221503_update_orders_details_table', 11),
('2015_09_05_221943_update_orders_table', 11),
('2015_09_06_145016_update_orders_table', 12),
('2015_09_06_160518_create_clients_table', 13),
('2015_09_06_161031_update_orders_table', 14),
('2015_09_06_161337_update_orders_table', 15),
('2015_09_06_161923_update_clients_table', 16),
('2015_09_06_180514_create_ncf_types_table', 17),
('2015_09_06_180556_update_ncf_table', 18),
('2015_09_13_220213_update_invoices_table', 19),
('2015_09_16_210705_update_invoices_payments_table', 20),
('2015_09_19_190423_update_candidates_table', 21),
('2015_09_20_141347_create_password_reminders_table', 22),
('2015_09_20_160546_create_supplyers_table', 22);

-- --------------------------------------------------------

--
-- Table structure for table `ncf`
--

CREATE TABLE IF NOT EXISTS `ncf` (
`id` int(10) unsigned NOT NULL,
  `type_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prefix` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `location_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ncf`
--

INSERT INTO `ncf` (`id`, `type_id`, `name`, `prefix`, `location_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Factura General 1', 'A0100100101', 1, '2015-09-06 23:07:17', '2015-09-06 23:07:17'),
(2, 8, 'Casos Especiales', 'A0100100114', 1, '2015-09-06 23:07:17', '2015-09-06 23:07:17');

-- --------------------------------------------------------

--
-- Table structure for table `ncf_sequencies`
--

CREATE TABLE IF NOT EXISTS `ncf_sequencies` (
`id` int(10) unsigned NOT NULL,
  `ncf_id` int(10) unsigned NOT NULL,
  `sequency` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('available','used') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ncf_sequencies`
--

INSERT INTO `ncf_sequencies` (`id`, `ncf_id`, `sequency`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, '00000001', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(2, 1, '00000002', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(3, 1, '00000003', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(4, 1, '00000004', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(5, 1, '00000005', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(6, 1, '00000006', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(7, 1, '00000007', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(8, 1, '00000008', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(9, 1, '00000009', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(10, 1, '00000010', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(11, 2, '00000001', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(12, 2, '00000002', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(13, 2, '00000003', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(14, 2, '00000004', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(15, 2, '00000005', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(16, 2, '00000006', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(17, 2, '00000007', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(18, 2, '00000008', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(19, 2, '00000009', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(20, 2, '00000010', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(21, 2, '00000011', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(22, 2, '00000012', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(23, 2, '00000013', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(24, 2, '00000014', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(25, 2, '00000015', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(26, 2, '00000016', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(27, 2, '00000017', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(28, 2, '00000018', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(29, 2, '00000019', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(30, 2, '00000020', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(31, 2, '00000021', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(32, 2, '00000022', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(33, 2, '00000023', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(34, 2, '00000024', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(35, 2, '00000025', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(36, 2, '00000026', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(37, 2, '00000027', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(38, 2, '00000028', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(39, 2, '00000029', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(40, 2, '00000030', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(41, 2, '00000031', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(42, 2, '00000032', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(43, 2, '00000033', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(44, 2, '00000034', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(45, 2, '00000035', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(46, 2, '00000036', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(47, 2, '00000037', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(48, 2, '00000038', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(49, 2, '00000039', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(50, 2, '00000040', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(51, 2, '00000041', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(52, 2, '00000042', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(53, 2, '00000043', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(54, 2, '00000044', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(55, 2, '00000045', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(56, 2, '00000046', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(57, 2, '00000047', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(58, 2, '00000048', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(59, 2, '00000049', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(60, 2, '00000050', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(61, 2, '00000051', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(62, 2, '00000052', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(63, 2, '00000053', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(64, 2, '00000054', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(65, 2, '00000055', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(66, 2, '00000056', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(67, 2, '00000057', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(68, 2, '00000058', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(69, 2, '00000059', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(70, 2, '00000060', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(71, 2, '00000061', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(72, 2, '00000062', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(73, 2, '00000063', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(74, 2, '00000064', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(75, 2, '00000065', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(76, 2, '00000066', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(77, 2, '00000067', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(78, 2, '00000068', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(79, 2, '00000069', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(80, 2, '00000070', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(81, 2, '00000071', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(82, 2, '00000072', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(83, 2, '00000073', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(84, 2, '00000074', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(85, 2, '00000075', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(86, 2, '00000076', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(87, 2, '00000077', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(88, 2, '00000078', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(89, 2, '00000079', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(90, 2, '00000080', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(91, 2, '00000081', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(92, 2, '00000082', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(93, 2, '00000083', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(94, 2, '00000084', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(95, 2, '00000085', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(96, 2, '00000086', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(97, 2, '00000087', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(98, 2, '00000088', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(99, 2, '00000089', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(100, 2, '00000090', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(101, 2, '00000091', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(102, 2, '00000092', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(103, 2, '00000093', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(104, 2, '00000094', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(105, 2, '00000095', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(106, 2, '00000096', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(107, 2, '00000097', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(108, 2, '00000098', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(109, 2, '00000099', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available'),
(110, 2, '00000100', '2015-09-06 23:07:17', '2015-09-06 23:07:17', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `ncf_types`
--

CREATE TABLE IF NOT EXISTS `ncf_types` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` int(11) NOT NULL,
  `available` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ncf_types`
--

INSERT INTO `ncf_types` (`id`, `name`, `code`, `available`, `created_at`, `updated_at`) VALUES
(1, 'Facturas que generan Crédito y Sustentan Costos y/o Gastos', 1, 0, '2015-09-06 22:29:39', '2015-09-06 22:29:39'),
(2, 'Facturas para Consumidores Finales', 2, 0, '2015-09-06 22:29:39', '2015-09-06 22:29:39'),
(3, 'Nota de Débito', 3, 0, '2015-09-06 22:29:39', '2015-09-06 22:29:39'),
(4, 'Nota de Crédito', 4, 0, '2015-09-06 22:29:39', '2015-09-06 22:29:39'),
(5, 'Proveedores Informales', 11, 0, '2015-09-06 22:29:39', '2015-09-06 22:29:39'),
(6, 'Registro Único de Ingresos', 12, 0, '2015-09-06 22:29:39', '2015-09-06 22:29:39'),
(7, 'Gastos Menores', 13, 0, '2015-09-06 22:29:39', '2015-09-06 22:29:39'),
(8, 'Regímenes Especiales de Tributación', 14, 0, '2015-09-06 22:29:39', '2015-09-06 22:29:39'),
(9, 'Comprobantes Gubernamentales', 15, 0, '2015-09-06 22:29:39', '2015-09-06 22:29:39');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`id` int(10) unsigned NOT NULL,
  `type` enum('sale','buy','quote') COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `itbis` float(10,2) NOT NULL,
  `itbis_amount` float(10,2) NOT NULL,
  `total` float(10,2) NOT NULL,
  `sub_total` float(10,2) NOT NULL,
  `discount` float(10,2) NOT NULL,
  `discount_percent` float(10,2) NOT NULL,
  `total_credits` float(10,2) NOT NULL,
  `percent_credits` float(10,2) NOT NULL,
  `status` enum('pending','pending_payment','status_credit','canceled','returned','modify','completed') COLLATE utf8_unicode_ci NOT NULL,
  `available` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `type`, `user_id`, `client_id`, `phone`, `address`, `email`, `first_name`, `last_name`, `itbis`, `itbis_amount`, `total`, `sub_total`, `discount`, `discount_percent`, `total_credits`, `percent_credits`, `status`, `available`, `created_at`, `updated_at`) VALUES
(9, 'sale', 1, 3, '', '', '', '', '', 18.00, 1067.83, 8428.00, 8566.43, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-14 00:31:20', '2015-09-14 00:31:20'),
(10, 'sale', 1, 3, '', '', '', '', '', 18.00, 1176.48, 6880.00, 7712.48, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-14 00:32:40', '2015-09-14 00:32:40'),
(11, 'sale', 1, 3, '', '', '', '', '', 18.00, 3216.91, 23210.00, 21088.61, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-14 00:33:05', '2015-09-14 00:33:05'),
(12, 'sale', 1, 1, '', '', '', '', '', 18.00, 1238.40, 6880.00, 8118.40, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-14 00:33:37', '2015-09-14 00:33:37'),
(13, 'sale', 1, 1, '', '', '', '', '', 18.00, 495.36, 2752.00, 3247.36, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-14 00:34:06', '2015-09-14 00:34:06'),
(14, 'buy', 1, 3, '', '', '', '', '', 18.00, 1238.40, 6880.00, 8118.40, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-14 02:17:46', '2015-09-14 02:17:46'),
(15, 'buy', 1, 1, '', '', '', '', '', 18.00, 1486.08, 8256.00, 9742.08, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-14 02:20:18', '2015-09-14 02:20:18'),
(16, 'sale', 1, 3, '', '', '', '', '', 18.00, 2773.01, 22008.00, 18178.61, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-14 17:08:31', '2015-09-14 17:08:31'),
(17, 'sale', 1, 3, '', '', '', '', '', 18.00, 5596.44, 91898.00, 61010.44, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-14 17:09:12', '2015-09-14 17:09:12'),
(18, 'buy', 1, 1, '', '', '', '', '', 18.00, 3715.20, 20640.00, 24355.20, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-14 17:09:43', '2015-09-14 17:09:43'),
(19, 'sale', 1, 3, '', '', '', '', '', 18.00, 959.40, 5330.00, 6289.40, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-14 17:24:45', '2015-09-14 17:24:45'),
(20, 'sale', 1, 3, '', '', '', '', '', 18.00, 4560.50, 91210.00, 50165.50, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-14 18:45:55', '2015-09-14 18:45:55'),
(21, 'sale', 1, 3, '', '', '', '', '', 18.00, 2473.26, 13926.00, 16213.58, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-16 23:09:26', '2015-09-16 23:09:26'),
(22, 'sale', 1, 3, '', '', '', '', '', 18.00, 2473.26, 13926.00, 16213.58, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-16 23:09:50', '2015-09-16 23:09:50'),
(23, 'sale', 1, 3, '', '', '', '', '', 18.00, 835.56, 4642.00, 5477.56, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-16 23:10:54', '2015-09-16 23:10:54'),
(24, 'sale', 1, 3, '', '', '', '', '', 18.00, 835.56, 4642.00, 5477.56, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-16 23:20:41', '2015-09-16 23:20:41'),
(25, 'sale', 1, 3, '', '', '', '', '', 18.00, 835.56, 4642.00, 5477.56, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-17 00:15:43', '2015-09-17 00:15:43'),
(26, 'sale', 1, 3, '', '', '', '', '', 18.00, 835.56, 4642.00, 5477.56, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-17 00:16:13', '2015-09-17 00:16:13'),
(27, 'sale', 1, 3, '', '', '', '', '', 18.00, 835.56, 4642.00, 5477.56, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-17 00:17:24', '2015-09-17 00:17:24'),
(28, 'sale', 1, 3, '', '', '', '', '', 18.00, 835.56, 4642.00, 5477.56, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-17 00:25:18', '2015-09-17 00:25:18'),
(29, 'sale', 1, 3, '', '', '', '', '', 18.00, 835.56, 4642.00, 5477.56, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-17 00:27:07', '2015-09-17 00:27:07'),
(30, 'sale', 1, 3, '', '', '', '', '', 18.00, 835.56, 4642.00, 5477.56, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-17 00:30:00', '2015-09-17 00:30:00'),
(31, 'sale', 1, 3, '', '', '', '', '', 18.00, 835.56, 4642.00, 5477.56, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-17 00:31:35', '2015-09-17 00:31:35'),
(32, 'sale', 1, 3, '', '', '', '', '', 18.00, 835.56, 4642.00, 5477.56, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-17 00:31:55', '2015-09-17 00:31:55'),
(33, 'sale', 1, 3, '', '', '', '', '', 18.00, 2256.01, 13926.00, 14789.41, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-17 00:33:13', '2015-09-17 00:33:13'),
(34, 'sale', 1, 3, '', '', '', '', '', 18.00, 3229.34, 27526.00, 28466.94, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-17 00:34:19', '2015-09-17 00:34:19'),
(35, 'sale', 1, 3, '', '', '', '', '', 18.00, 3229.34, 27526.00, 28466.94, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-17 00:34:56', '2015-09-17 00:34:56'),
(36, 'sale', 1, 3, '', '', '', '', '', 18.00, 3229.34, 27526.00, 28466.94, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-17 00:36:05', '2015-09-17 00:36:05'),
(37, 'sale', 1, 3, '', '', '', '', '', 18.00, 3229.34, 27526.00, 28466.94, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-17 00:36:51', '2015-09-17 00:36:51'),
(38, 'sale', 1, 3, '', '', '', '', '', 18.00, 3229.34, 27526.00, 28466.94, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-17 00:37:03', '2015-09-17 00:37:03'),
(39, 'sale', 1, 3, '', '', '', '', '', 18.00, 3229.34, 27526.00, 28466.94, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-17 00:37:16', '2015-09-17 00:37:16'),
(40, 'sale', 1, 3, '', '', '', '', '', 18.00, 3229.34, 27526.00, 28466.94, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-17 00:37:31', '2015-09-17 00:37:31'),
(41, 'sale', 1, 3, '', '', '', '', '', 18.00, 3229.34, 27526.00, 28466.94, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-17 00:40:03', '2015-09-17 00:40:03'),
(42, 'sale', 1, 1, '', '', '', '', '', 18.00, 1651.16, 12382.00, 12949.86, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-17 00:45:46', '2015-09-17 00:45:46'),
(43, 'sale', 1, 1, '', '', '', '', '', 18.00, 1651.16, 12382.00, 12949.86, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-17 00:46:50', '2015-09-17 00:46:50'),
(44, 'sale', 1, 1, '', '', '', '', '', 18.00, 1651.16, 12382.00, 12949.86, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-17 01:43:47', '2015-09-17 01:43:47'),
(45, 'sale', 1, 1, '', '', '', '', '', 18.00, 1651.16, 12382.00, 12949.86, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-17 01:44:03', '2015-09-17 01:44:03'),
(46, 'sale', 1, 1, '', '', '', '', '', 18.00, 1651.16, 12382.00, 12949.86, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-17 01:44:44', '2015-09-17 01:44:44'),
(47, 'sale', 1, 1, '', '', '', '', '', 18.00, 1651.16, 12382.00, 12949.86, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-17 01:45:48', '2015-09-17 01:45:48'),
(48, 'sale', 1, 1, '', '', '', '', '', 18.00, 1651.16, 12382.00, 12949.86, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-17 01:46:23', '2015-09-17 01:46:23'),
(49, 'sale', 1, 1, '', '', '', '', '', 18.00, 1651.16, 12382.00, 12949.86, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-17 01:46:59', '2015-09-17 01:46:59'),
(50, 'sale', 1, 1, '', '', '', '', '', 18.00, 1651.16, 12382.00, 12949.86, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-17 01:51:23', '2015-09-17 01:51:23'),
(51, 'sale', 1, 1, '', '', '', '', '', 18.00, 123.84, 688.00, 811.84, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-17 19:31:09', '2015-09-17 19:31:09'),
(52, 'sale', 1, 6, '', '', '', '', '', 18.00, 2322.70, 37860.00, 30888.70, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-19 03:32:47', '2015-09-19 03:32:47'),
(53, 'sale', 1, 6, '', '', '', '', '', 18.00, 2322.70, 37860.00, 30888.70, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-19 03:33:26', '2015-09-19 03:33:26'),
(54, 'sale', 1, 6, '', '', '', '', '', 18.00, 2322.70, 37860.00, 30888.70, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-19 03:33:31', '2015-09-19 03:33:31'),
(55, 'sale', 1, 6, '', '', '', '', '', 18.00, 2322.70, 37860.00, 30888.70, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-19 03:33:37', '2015-09-19 03:33:37'),
(56, 'sale', 1, 6, '', '', '', '', '', 18.00, 2322.70, 37860.00, 30888.70, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-19 03:33:58', '2015-09-19 03:33:58'),
(57, 'sale', 1, 6, '', '', '', '', '', 18.00, 2322.70, 37860.00, 30888.70, 0.00, 0.00, 0.00, 0.00, 'pending', 1, '2015-09-19 03:34:20', '2015-09-19 03:34:20'),
(58, 'sale', 1, 6, '', '', '', '', '', 18.00, 2322.70, 37860.00, 30888.70, 0.00, 0.00, 0.00, 0.00, 'pending_payment', 1, '2015-09-19 03:38:22', '2015-09-19 03:38:22');

-- --------------------------------------------------------

--
-- Table structure for table `orders_credits`
--

CREATE TABLE IF NOT EXISTS `orders_credits` (
`id` int(10) unsigned NOT NULL,
  `order_id` int(10) unsigned NOT NULL,
  `amount` float(2,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

CREATE TABLE IF NOT EXISTS `orders_details` (
`id` int(10) unsigned NOT NULL,
  `order_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `discount` float(10,2) NOT NULL,
  `itbis` float(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders_details`
--

INSERT INTO `orders_details` (`id`, `order_id`, `product_id`, `qty`, `price`, `created_at`, `updated_at`, `discount`, `itbis`) VALUES
(4, 9, 1, 1, 0.00, '2015-09-14 00:31:20', '2015-09-14 00:31:20', 0.00, 123.84),
(5, 9, 2, 1, 0.00, '2015-09-14 00:31:20', '2015-09-14 00:31:20', 0.00, 835.56),
(6, 9, 3, 1, 30.00, '2015-09-14 00:31:20', '2015-09-14 00:31:20', 929.40, 108.43),
(7, 10, 1, 10, 5.00, '2015-09-14 00:32:40', '2015-09-14 00:32:40', 344.00, 1176.48),
(8, 11, 2, 5, 23.00, '2015-09-14 00:33:05', '2015-09-14 00:33:05', 5338.30, 3216.91),
(9, 12, 1, 10, 0.00, '2015-09-14 00:33:37', '2015-09-14 00:33:37', 0.00, 1238.40),
(10, 13, 1, 4, 0.00, '2015-09-14 00:34:06', '2015-09-14 00:34:06', 0.00, 495.36),
(11, 14, 1, 10, 0.00, '2015-09-14 02:17:46', '2015-09-14 02:17:46', 0.00, 1238.40),
(12, 15, 1, 12, 0.00, '2015-09-14 02:20:18', '2015-09-14 02:20:18', 0.00, 1486.08),
(13, 16, 1, 5, 30.00, '2015-09-14 17:08:31', '2015-09-14 17:08:31', 1032.00, 433.44),
(14, 16, 2, 4, 30.00, '2015-09-14 17:08:31', '2015-09-14 17:08:31', 5570.40, 2339.57),
(15, 17, 4, 10, 40.00, '2015-09-14 17:09:12', '2015-09-14 17:09:12', 36484.00, 5472.60),
(16, 17, 1, 1, 0.00, '2015-09-14 17:09:12', '2015-09-14 17:09:12', 0.00, 123.84),
(17, 18, 1, 30, 0.00, '2015-09-14 17:09:43', '2015-09-14 17:09:43', 0.00, 3715.20),
(18, 19, 1, 1, 0.00, '2015-09-14 17:24:46', '2015-09-14 17:24:46', 0.00, 123.84),
(19, 19, 2, 1, 0.00, '2015-09-14 17:24:46', '2015-09-14 17:24:46', 0.00, 835.56),
(20, 20, 4, 10, 50.00, '2015-09-14 18:45:56', '2015-09-14 18:45:56', 45605.00, 4560.50),
(21, 21, 2, 2, 2.00, '2015-09-16 23:09:26', '2015-09-16 23:09:26', 185.68, 1637.70),
(22, 21, 2, 1, 0.00, '2015-09-16 23:09:26', '2015-09-16 23:09:26', 0.00, 835.56),
(23, 22, 2, 2, 2.00, '2015-09-16 23:09:51', '2015-09-16 23:09:51', 185.68, 1637.70),
(24, 22, 2, 1, 0.00, '2015-09-16 23:09:51', '2015-09-16 23:09:51', 0.00, 835.56),
(25, 23, 2, 1, 0.00, '2015-09-16 23:10:54', '2015-09-16 23:10:54', 0.00, 835.56),
(26, 24, 2, 1, 0.00, '2015-09-16 23:20:41', '2015-09-16 23:20:41', 0.00, 835.56),
(27, 25, 2, 1, 0.00, '2015-09-17 00:15:43', '2015-09-17 00:15:43', 0.00, 835.56),
(28, 26, 2, 1, 0.00, '2015-09-17 00:16:13', '2015-09-17 00:16:13', 0.00, 835.56),
(29, 27, 2, 1, 0.00, '2015-09-17 00:17:24', '2015-09-17 00:17:24', 0.00, 835.56),
(30, 28, 2, 1, 0.00, '2015-09-17 00:25:18', '2015-09-17 00:25:18', 0.00, 835.56),
(31, 29, 2, 1, 0.00, '2015-09-17 00:27:07', '2015-09-17 00:27:07', 0.00, 835.56),
(32, 30, 2, 1, 0.00, '2015-09-17 00:30:00', '2015-09-17 00:30:00', 0.00, 835.56),
(33, 31, 2, 1, 0.00, '2015-09-17 00:31:35', '2015-09-17 00:31:35', 0.00, 835.56),
(34, 32, 2, 1, 0.00, '2015-09-17 00:31:55', '2015-09-17 00:31:55', 0.00, 835.56),
(35, 33, 2, 3, 10.00, '2015-09-17 00:33:13', '2015-09-17 00:33:13', 1392.60, 2256.01),
(36, 34, 4, 2, 10.00, '2015-09-17 00:34:19', '2015-09-17 00:34:19', 1824.20, 1641.78),
(37, 34, 2, 2, 5.00, '2015-09-17 00:34:19', '2015-09-17 00:34:19', 464.20, 1587.56),
(38, 35, 4, 2, 10.00, '2015-09-17 00:34:56', '2015-09-17 00:34:56', 1824.20, 1641.78),
(39, 35, 2, 2, 5.00, '2015-09-17 00:34:56', '2015-09-17 00:34:56', 464.20, 1587.56),
(40, 36, 4, 2, 10.00, '2015-09-17 00:36:05', '2015-09-17 00:36:05', 1824.20, 1641.78),
(41, 36, 2, 2, 5.00, '2015-09-17 00:36:05', '2015-09-17 00:36:05', 464.20, 1587.56),
(42, 37, 4, 2, 10.00, '2015-09-17 00:36:51', '2015-09-17 00:36:51', 1824.20, 1641.78),
(43, 37, 2, 2, 5.00, '2015-09-17 00:36:51', '2015-09-17 00:36:51', 464.20, 1587.56),
(44, 38, 4, 2, 10.00, '2015-09-17 00:37:03', '2015-09-17 00:37:03', 1824.20, 1641.78),
(45, 38, 2, 2, 5.00, '2015-09-17 00:37:03', '2015-09-17 00:37:03', 464.20, 1587.56),
(46, 39, 4, 2, 10.00, '2015-09-17 00:37:16', '2015-09-17 00:37:16', 1824.20, 1641.78),
(47, 39, 2, 2, 5.00, '2015-09-17 00:37:16', '2015-09-17 00:37:16', 464.20, 1587.56),
(48, 40, 4, 2, 10.00, '2015-09-17 00:37:31', '2015-09-17 00:37:31', 1824.20, 1641.78),
(49, 40, 2, 2, 5.00, '2015-09-17 00:37:31', '2015-09-17 00:37:31', 464.20, 1587.56),
(50, 41, 4, 2, 10.00, '2015-09-17 00:40:03', '2015-09-17 00:40:03', 1824.20, 1641.78),
(51, 41, 2, 2, 5.00, '2015-09-17 00:40:03', '2015-09-17 00:40:03', 464.20, 1587.56),
(52, 42, 2, 2, 10.00, '2015-09-17 00:45:46', '2015-09-17 00:45:46', 928.40, 1504.01),
(53, 42, 3, 1, 5.00, '2015-09-17 00:45:46', '2015-09-17 00:45:46', 154.90, 147.16),
(54, 43, 2, 2, 10.00, '2015-09-17 00:46:50', '2015-09-17 00:46:50', 928.40, 1504.01),
(55, 43, 3, 1, 5.00, '2015-09-17 00:46:50', '2015-09-17 00:46:50', 154.90, 147.16),
(56, 44, 2, 2, 10.00, '2015-09-17 01:43:47', '2015-09-17 01:43:47', 928.40, 1504.01),
(57, 44, 3, 1, 5.00, '2015-09-17 01:43:47', '2015-09-17 01:43:47', 154.90, 147.16),
(58, 45, 2, 2, 10.00, '2015-09-17 01:44:03', '2015-09-17 01:44:03', 928.40, 1504.01),
(59, 45, 3, 1, 5.00, '2015-09-17 01:44:03', '2015-09-17 01:44:03', 154.90, 147.16),
(60, 46, 2, 2, 10.00, '2015-09-17 01:44:44', '2015-09-17 01:44:44', 928.40, 1504.01),
(61, 46, 3, 1, 5.00, '2015-09-17 01:44:44', '2015-09-17 01:44:44', 154.90, 147.16),
(62, 47, 2, 2, 10.00, '2015-09-17 01:45:48', '2015-09-17 01:45:48', 928.40, 1504.01),
(63, 47, 3, 1, 5.00, '2015-09-17 01:45:48', '2015-09-17 01:45:48', 154.90, 147.16),
(64, 48, 2, 2, 10.00, '2015-09-17 01:46:23', '2015-09-17 01:46:23', 928.40, 1504.01),
(65, 48, 3, 1, 5.00, '2015-09-17 01:46:23', '2015-09-17 01:46:23', 154.90, 147.16),
(66, 49, 2, 2, 10.00, '2015-09-17 01:46:59', '2015-09-17 01:46:59', 928.40, 1504.01),
(67, 49, 3, 1, 5.00, '2015-09-17 01:46:59', '2015-09-17 01:46:59', 154.90, 147.16),
(68, 50, 2, 2, 10.00, '2015-09-17 01:51:23', '2015-09-17 01:51:23', 928.40, 1504.01),
(69, 50, 3, 1, 5.00, '2015-09-17 01:51:23', '2015-09-17 01:51:23', 154.90, 147.16),
(70, 51, 1, 1, 811.84, '2015-09-17 19:31:09', '2015-09-17 19:31:09', 0.00, 123.84),
(71, 52, 1, 10, 8118.40, '2015-09-19 03:32:47', '2015-09-19 03:32:47', 0.00, 1238.40),
(72, 52, 3, 10, 22770.30, '2015-09-19 03:32:47', '2015-09-19 03:32:47', 9294.00, 1084.30),
(73, 53, 1, 10, 8118.40, '2015-09-19 03:33:26', '2015-09-19 03:33:26', 0.00, 1238.40),
(74, 53, 3, 10, 22770.30, '2015-09-19 03:33:26', '2015-09-19 03:33:26', 9294.00, 1084.30),
(75, 54, 1, 10, 8118.40, '2015-09-19 03:33:31', '2015-09-19 03:33:31', 0.00, 1238.40),
(76, 54, 3, 10, 22770.30, '2015-09-19 03:33:31', '2015-09-19 03:33:31', 9294.00, 1084.30),
(77, 55, 1, 10, 8118.40, '2015-09-19 03:33:37', '2015-09-19 03:33:37', 0.00, 1238.40),
(78, 55, 3, 10, 22770.30, '2015-09-19 03:33:37', '2015-09-19 03:33:37', 9294.00, 1084.30),
(79, 56, 1, 10, 8118.40, '2015-09-19 03:33:58', '2015-09-19 03:33:58', 0.00, 1238.40),
(80, 56, 3, 10, 22770.30, '2015-09-19 03:33:58', '2015-09-19 03:33:58', 9294.00, 1084.30),
(81, 57, 1, 10, 8118.40, '2015-09-19 03:34:20', '2015-09-19 03:34:20', 0.00, 1238.40),
(82, 57, 3, 10, 22770.30, '2015-09-19 03:34:20', '2015-09-19 03:34:20', 9294.00, 1084.30),
(83, 58, 1, 10, 8118.40, '2015-09-19 03:38:22', '2015-09-19 03:38:22', 0.00, 1238.40),
(84, 58, 3, 10, 22770.30, '2015-09-19 03:38:22', '2015-09-19 03:38:22', 9294.00, 1084.30);

-- --------------------------------------------------------

--
-- Table structure for table `orders_status`
--

CREATE TABLE IF NOT EXISTS `orders_status` (
`id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reminders`
--

CREATE TABLE IF NOT EXISTS `password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `min_stock` int(11) NOT NULL,
  `price` float(15,2) NOT NULL,
  `min_price` double(15,2) NOT NULL,
  `discount` double(15,2) NOT NULL,
  `discount_apply` tinyint(1) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `date_in` date NOT NULL,
  `date_out` date NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `available` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `itbis_id` int(10) unsigned NOT NULL,
  `fix_itbis` float(10,2) NOT NULL,
  `itbis_apply` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `slug`, `sku`, `stock`, `min_stock`, `price`, `min_price`, `discount`, `discount_apply`, `user_id`, `date_in`, `date_out`, `category_id`, `available`, `created_at`, `updated_at`, `itbis_id`, `fix_itbis`, `itbis_apply`) VALUES
(1, 'dolorem', 'Veritatis ad et magni quia rem optio at. Aut corrupti fugit est quo. Quia libero laudantium officiis sint.\nNisi et consequatur cupiditate pariatur. Eum alias ut omnis ea dignissimos hic recusandae. Animi et qui et veritatis natus sit.', 'dolorem', 'db531e1807d9e0f4fe65de4a8b344622251d06cd', -26, 9, 688.00, 5.00, 10.00, 0, 1, '0000-00-00', '0000-00-00', 5, 1, '2015-08-23 20:59:33', '2015-09-19 03:38:22', 1, 11.50, 0),
(2, 'cum', 'Aliquam totam sit impedit labore earum. Omnis cum totam et numquam soluta aspernatur officia. Sint sunt adipisci aliquam qui asperiores eum totam.\nDolorem totam et inventore animi at praesentium. Rem corporis pariatur molestiae sunt ut. Enim dolor libero a dolor sapiente corporis et.', 'cum', '14a292611b41e6118a03585167d9fdba6a817763', -4, 7, 4642.00, 5.00, 20.00, 0, 1, '0000-00-00', '0000-00-00', 2, 1, '2015-08-23 20:59:33', '2015-09-17 01:51:23', 1, 0.00, 0),
(3, 'at', 'Voluptatem et commodi totam laudantium harum quasi. Id qui sit maxime voluptas voluptate voluptatem omnis. Voluptatem occaecati sint voluptate velit ea facere. Et et repudiandae ea.', 'at', '9454f6875216bdcc8671e32fc74afd1392aa2829', -5, 6, 3098.00, 6.00, 30.00, 1, 1, '0000-00-00', '0000-00-00', 1, 1, '2015-08-23 20:59:33', '2015-09-19 03:38:22', 3, 0.00, 0),
(4, 'blanditiis', 'Id illo maxime et aliquam quo sit laboriosam suscipit. Eum dolor aut ipsa error impedit. Esse nihil maiores nesciunt. Odit ut nobis aut.', 'blanditiis', '190e6229e0a5e4db798984db0c95f290fe9cc6aa', 49, 8, 9121.00, 10.00, 40.00, 1, 1, '0000-00-00', '0000-00-00', 6, 1, '2015-08-23 20:59:34', '2015-09-17 00:40:03', 4, 0.00, 0),
(5, 'numquam', 'Perferendis et vel eius. Et repellendus quia dignissimos. Excepturi voluptatem minus tenetur et odit qui qui.\nMinima quas esse dolor. Et est quo sunt inventore ducimus ut. Veniam molestiae cumque iure exercitationem iste consectetur. Porro veritatis aperiam modi incidunt est iste molestias.', 'numquam', '8c0f1b9ce7650c1665e546dc1a675507c9e49191', 100, 6, 1678.00, 9.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 2, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 2, 0.00, 0),
(6, 'amet', 'Totam molestiae vero molestiae distinctio eius autem est tempora. At voluptatem deserunt dolorum inventore dolor occaecati aut. Quas ipsa et porro non quia libero sit.', 'amet', 'f34312e9b7a2022aed55a1b40232ceab29f0feb1', 30, 7, 7209.00, 6.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 2, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 2, 0.00, 0),
(7, 'est', 'Nesciunt voluptas quia ullam et nihil explicabo neque aut. Consectetur et deserunt cumque aut necessitatibus sit. Minima at a commodi assumenda sunt doloribus.', 'est', '2ccd52f4605636bf8d1a4adbb647d03c675051b0', 40, 5, 7884.00, 8.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 4, 0.00, 0),
(8, 'error', 'Facilis illum qui eaque et. Sint qui ut itaque architecto. Natus expedita amet omnis sunt doloremque saepe repellat qui. Facere voluptates ut accusamus mollitia velit.', 'error', 'd61929666631d85156902ec854575f78c03cf0a9', 28, 5, 6184.00, 5.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 6, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 2, 0.00, 0),
(9, 'esse', 'Iste aut eius at minus. Voluptatem et voluptas perspiciatis iure ipsam ipsam. Magnam nihil non unde numquam quisquam dolore inventore. Officia dolorem incidunt quo rerum explicabo assumenda velit.', 'esse', '4ec14c9155cfda311ead479b2ab0b0d80d045451', 60, 9, 5671.00, 6.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 2, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 1, 0.00, 0),
(10, 'blanditiis', 'Sunt ratione facere exercitationem consequuntur eligendi. Voluptates deleniti architecto deserunt quod perspiciatis illo reprehenderit. Doloribus recusandae explicabo velit id facere. Ad quia minima aut quo esse exercitationem laborum.', 'blanditiis', 'efb864b4b97350b3efabed333bae152601a396b8', 91, 8, 4068.00, 6.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 1, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 1, 0.00, 0),
(11, 'doloremque', 'Est nobis labore enim occaecati iure est. Inventore maxime quia sint. Occaecati aut quidem architecto et asperiores impedit. Et vel quidem molestiae harum possimus molestiae dolores.', 'doloremque', '68a7444a0b2e8ab10626797b831e4d81cb61ca47', 50, 8, 9232.00, 7.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 4, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 2, 0.00, 0),
(12, 'repellendus', 'Et vel neque nam voluptates temporibus. Ipsa repudiandae nam harum iure deleniti omnis. Quasi possimus ut minus vero eveniet nihil fuga. Deleniti qui accusamus facere ratione necessitatibus.', 'repellendus', '294a426ecfb3385e7c91e24330a0396e9b24d595', 44, 9, 4152.00, 5.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 6, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 4, 0.00, 0),
(13, 'quod', 'Vel rerum id ut. Ut optio dolore et a excepturi dolor. Recusandae distinctio qui incidunt porro.\nItaque consectetur mollitia ea doloremque aliquid consequatur doloremque. Maiores impedit doloremque vitae voluptatem et voluptatum eligendi. Dolor eius nemo saepe earum.', 'quod', 'f4efa49510da977e908ed186462d8bfb50f8659a', 61, 5, 2060.00, 6.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 2, 0.00, 0),
(14, 'officiis', 'A eaque perspiciatis facilis id deleniti qui id. Reprehenderit omnis sint blanditiis ad. Omnis provident in quas.', 'officiis', 'ba83e71b98d0a3173856a0ba5cbf505c5f80a1e0', 15, 6, 7110.00, 10.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 2, 0.00, 0),
(15, 'omnis', 'Sunt ut aliquam qui atque nam. Soluta neque dicta quia aperiam reiciendis voluptatum. Sit similique rerum officia officiis et. Et cupiditate dolor ratione.\nOdit ullam omnis totam quae saepe qui. Dolorem beatae ut voluptate et eligendi maiores. Totam facere qui eum fuga tenetur ea consectetur.', 'omnis', '6f70ed75e8d04a100bfba1699dc557e86c2ab273', 8, 7, 3363.00, 9.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 5, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 1, 0.00, 0),
(16, 'cupiditate', 'Magnam reprehenderit et optio omnis qui est. Modi dolore quibusdam qui et molestias. Aut labore dolore non ipsa id quia eveniet. Eum corporis sit unde aut non cum.\nNulla beatae quae rem ducimus consequatur. Sit optio tenetur nesciunt earum. Id aliquid consectetur dicta.', 'cupiditate', 'bbd685f39d0f41c93b0c19e3cffef14252889e1f', 84, 5, 5503.00, 6.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 6, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 2, 0.00, 0),
(17, 'ad', 'Maxime harum et maiores sit impedit aperiam. Maiores totam voluptatum quod ut dolores pariatur soluta distinctio.\nEa dolor optio et placeat veniam. Et nesciunt odit totam illum consequatur assumenda magni eius. Sapiente nostrum facilis eligendi dolorem.', 'ad', '4ac8ef3a1464803da162be4d3c9287f360a84668', 93, 8, 4809.00, 9.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 3, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 2, 0.00, 0),
(18, 'molestiae', 'Dolorem enim omnis aut ut autem qui culpa. Eius exercitationem facilis aliquid perspiciatis. Error nam cupiditate ipsa eaque aut non architecto.\nTempora ut eveniet voluptas totam. Vel et odio corrupti omnis et occaecati. Dolorem beatae ut provident. Aspernatur pariatur quisquam repellat non quae.', 'molestiae', '57ead1721f77489e0bca8a25ac70ffdd15e232b5', 47, 6, 2608.00, 9.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 2, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 4, 0.00, 0),
(19, 'minus', 'Nihil enim harum distinctio fugiat sunt. Rerum enim nostrum quo ut qui. Quis deleniti consequatur necessitatibus ea odio dolor et qui.\nQui labore facilis velit fugiat veritatis. Numquam enim repellendus amet explicabo voluptatem qui. Explicabo ea perspiciatis eum beatae quod facere.', 'minus', '8d72b56a3ec3e83bebc2aa5ba4efc781013bd561', 91, 5, 8274.00, 9.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 6, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 2, 0.00, 0),
(20, 'sequi', 'Voluptatem soluta maxime et reprehenderit est minima. Mollitia explicabo dolorum consequatur perferendis hic. Vitae alias maiores maiores odit sit quaerat earum ea. Cum laboriosam voluptas ipsum quaerat saepe illo doloremque.', 'sequi', '7aeeed48407d2ff7fc0ed904a1e23e356b556ace', 16, 5, 4411.00, 7.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 7, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 3, 0.00, 0),
(21, 'dolor', 'Nam impedit soluta et omnis nisi neque est nulla. Molestias quo error mollitia ut. Aperiam assumenda debitis vel autem eum.', 'dolor', '002184e61c41456e66d1294128e676a5da52d993', 37, 6, 4809.00, 9.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 1, 0.00, 0),
(22, 'quos', 'Modi tempora eum nulla exercitationem voluptas sunt saepe. Aut facere temporibus hic. Doloribus error quasi exercitationem eum et quidem ad est.', 'quos', '1e2a9909a893cba68ce278521ab024d384d47e8b', 32, 6, 6753.00, 5.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 6, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 2, 0.00, 0),
(23, 'asperiores', 'Delectus magni at ut omnis dignissimos fuga quae. Vitae eum non praesentium consequuntur iusto minus atque ut.\nHarum perspiciatis dicta iste. Quaerat id voluptatem est maiores corporis cupiditate. Accusantium eligendi exercitationem consectetur quo sit.', 'asperiores', '3806f1f997f498e08a61dbbe1b5bc7d37a8665b4', 38, 10, 9231.00, 5.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 5, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 1, 0.00, 0),
(24, 'fugiat', 'Laudantium non velit aut voluptatem. Quod quia sed fugiat et. A et officia vel reprehenderit aut nemo est. Dolore eaque sunt aut nobis ut.', 'fugiat', '043fa2ba50af8827e24580b52604049337d130dc', 66, 7, 7035.00, 8.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 7, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 1, 0.00, 0),
(25, 'aspernatur', 'Et aut quia dolores aut quasi. Praesentium ratione odit reprehenderit quis. Quia sunt recusandae vel cupiditate sint eum.', 'aspernatur', '4e02f6db911b35cc017217f34fd77d046f09fe61', 25, 5, 1923.00, 6.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 7, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 3, 0.00, 0),
(26, 'ullam', 'Ut id aut quia sint quae dicta. Eum ex debitis ea eveniet libero. Rerum odit reiciendis quae ipsum odit consequuntur.\nIste ratione commodi voluptatibus blanditiis aut fugit. Rerum sunt similique quis totam laborum ducimus libero. Et repellendus et sed molestiae minus omnis fugit.', 'ullam', '091e551fd018b0d6967c4ab3af3f7a530118d762', 44, 10, 9597.00, 5.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 5, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 2, 0.00, 0),
(27, 'ipsam', 'Minima et doloribus dolore quae aut quaerat consectetur. Eum error at qui at laborum aut. Modi praesentium commodi praesentium.\nVoluptas dolores eaque et eligendi. Quo sint est et alias natus voluptatibus.', 'ipsam', '07a3ab7ee3c9a334f5f128083603a7e55772df0c', 26, 6, 7737.00, 10.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 3, 0.00, 0),
(28, 'sit', 'Non esse rerum reiciendis veritatis minima optio. Sit iste et eveniet sunt omnis id id voluptates. Tempore consequuntur omnis dolore. Ut illum eius velit impedit dolorum est consectetur alias. Veniam harum autem deleniti doloribus eos enim.', 'sit', 'fd21c81d75df14cfe9a9864d701d54d4f8ceff36', 61, 7, 9657.00, 10.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 3, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 3, 0.00, 0),
(29, 'similique', 'Libero debitis error laborum molestiae veniam id deleniti. Illo eum et hic. Possimus voluptas enim aut autem atque sit.', 'similique', '8c072d26570bf41f62429e2ad8f42158f221c6c6', 83, 7, 4740.00, 6.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 3, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 1, 0.00, 0),
(30, 'dicta', 'Similique esse quia quisquam aut ducimus perferendis. Sint doloremque saepe maiores voluptatum. Inventore ut aut et adipisci. Exercitationem eum qui sed blanditiis inventore nihil.', 'dicta', '36a93fa95a281fc29fee8c906b8cb59015ee97ea', 73, 10, 7215.00, 8.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 7, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 1, 0.00, 0),
(31, 'nemo', 'Debitis sed magni in exercitationem veritatis ullam veniam. Et dolor aut magni cum aut. Dolor fugiat ipsa ut voluptatem eligendi fuga iste aut. Hic autem reiciendis sunt architecto.', 'nemo', '14d153017e214af1a722570fef5e2d8d8f812d78', 62, 7, 194.00, 8.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 6, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 3, 0.00, 0),
(32, 'rerum', 'Maxime odio reiciendis aspernatur libero beatae corporis. Autem non itaque est est. Qui suscipit voluptates quisquam impedit qui soluta quae.', 'rerum', '4ca3623a80052e03b73683ba4786d207a515dcac', 43, 6, 2813.00, 6.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 4, 0.00, 0),
(33, 'et', 'Qui temporibus nisi dolore vel. Inventore minus perspiciatis mollitia dolorum rem provident.\nOmnis fugit eveniet corrupti laboriosam qui voluptatum quis excepturi. Et tempore est itaque sequi perferendis ut in. Reiciendis magni nisi sunt nesciunt sapiente occaecati.', 'et', 'ebdd1903df7b0d3d847dbef131c49a07ef90981d', 72, 7, 3778.00, 7.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 2, 0.00, 0),
(34, 'nisi', 'Quo aperiam est aliquid voluptatum. Dolor aut eum officiis. Quas praesentium id soluta.\nAssumenda dolor aperiam saepe esse dolore similique minima. Qui nemo voluptate occaecati mollitia qui quasi. Neque hic quia rerum odit velit harum.', 'nisi', '6f99d8662c211d17762f13bdc4cf00045148cfa8', 40, 10, 2564.00, 8.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 7, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 2, 0.00, 0),
(35, 'eum', 'Cupiditate et nihil ullam eos. Voluptatem expedita optio quasi libero ut eum.\nAut et nisi eum et itaque. Et laboriosam quaerat quia ipsa necessitatibus sequi. Vero ad qui praesentium nobis.', 'eum', 'badd42e44e41787f2718fb19b17cbe9f64676cff', 80, 7, 9265.00, 6.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 5, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 4, 0.00, 0),
(36, 'et', 'Et et doloremque omnis a dignissimos necessitatibus quidem aut. Natus repellendus facilis quod quo ipsa repellendus esse sapiente.\nCupiditate nihil et nobis hic et ut. Sit omnis sit tenetur nisi quisquam. Iste assumenda rerum est sunt accusamus.', 'et', 'aebdb43259ee65592d3339fbf1912397a9c48721', 75, 6, 8910.00, 6.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 6, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 4, 0.00, 0),
(37, 'sint', 'Sequi similique amet assumenda nobis nisi suscipit qui. Dolorem ipsum qui labore exercitationem beatae. Omnis quam iste qui sint distinctio veniam.', 'sint', '665836f6c6802a25638d96ff6ada2886b6310a7e', 2, 5, 6511.00, 5.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 8, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 3, 0.00, 0),
(38, 'laboriosam', 'Quae dolorum rerum unde dolores harum. Sequi nihil et enim esse sapiente reiciendis. Quos atque repellendus ipsum. Doloremque illo sed ut molestias maiores.', 'laboriosam', '6376cbe65a60ff7845bb898caa2f22005d0f34b8', 2, 7, 9818.00, 9.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 7, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 3, 0.00, 0),
(39, 'vitae', 'Incidunt temporibus odit et quaerat officiis a iure. Dignissimos velit quo quo iusto facere voluptatem. Nulla quaerat possimus accusantium qui temporibus odio recusandae.', 'vitae', '44da0901c6a7d8dc267a4d607264923b2e97fe98', 42, 9, 9952.00, 8.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 8, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 4, 0.00, 0),
(40, 'quis', 'Et quae quis quos sed consectetur. Quia eligendi dolor nihil distinctio ullam. Cum facilis qui porro rerum possimus consequatur. Delectus aut velit doloremque sed et dolore.', 'quis', '4006898a07227112cb91f4b806604695dabdf98d', 58, 8, 5037.00, 8.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 6, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 4, 0.00, 0),
(41, 'odit', 'Distinctio nesciunt unde ab aut deserunt inventore. Minima quasi assumenda ullam distinctio. Soluta quia necessitatibus magni id quia vero.', 'odit', '5930039255a6a8d2509d5709e56b37b2435c121d', 55, 6, 3846.00, 8.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 5, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 1, 0.00, 0),
(42, 'ut', 'Officia velit est officiis accusantium perspiciatis dolor nisi. Est voluptas perferendis sit excepturi tempora. Nisi est consectetur eum expedita libero at.', 'ut', 'b76c358333443dd79f73c461d271ef4d7a0f4221', 66, 5, 1526.00, 8.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 1, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 2, 0.00, 0),
(43, 'dolores', 'Odit molestiae aperiam enim. Nisi in quaerat alias. Rerum dolor quisquam enim nihil odit reprehenderit fugit. Corrupti officia in similique aliquam provident.\nRerum natus sed ut. Sit quisquam officia accusantium dolores nisi. Sed est dolores ut dolores. Minus vel ut dolor optio.', 'dolores', '1a1aeeee76e7aa5b570b491e58b891bbe415d94c', 56, 8, 7327.00, 7.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 4, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 3, 0.00, 0),
(44, 'dolorem', 'Assumenda fuga repudiandae sed placeat quas autem sed architecto. Ducimus quidem ea delectus. Quia in laboriosam maiores quasi dicta mollitia.\nId consequatur vitae quibusdam. Quo facere dolor sit est repellat impedit. Aut aut corrupti praesentium voluptas in.', 'dolorem', '32b0f0b83c1df75c127c21a0d6a874692cdbf0f0', 75, 5, 1771.00, 5.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 2, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 3, 0.00, 0),
(45, 'quo', 'Possimus quia dolorum qui id sit assumenda veritatis. Quia ut reprehenderit dolores. Omnis quod quasi neque sed commodi. Vel qui facere et reiciendis est non vel.\nEt ipsam et praesentium. Rerum odit maiores totam. Itaque ipsa mollitia neque doloremque assumenda blanditiis accusantium.', 'quo', '534b3e46fdf7042762586838b314b51d5633fce3', 71, 9, 9472.00, 7.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 2, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 3, 0.00, 0),
(46, 'quasi', 'Voluptates delectus nam quo exercitationem. Voluptatem ut est omnis. Dolores qui blanditiis excepturi. Itaque et eos harum dicta sit ut.\nVoluptatem id autem amet non illo ut ullam. Facilis consequatur odit magnam voluptas voluptas quia consequatur. Voluptatem recusandae magnam sed dolores repellat.', 'quasi', 'b3e77dc2480fe5a883efde37b6d5c9891f6bce41', 35, 10, 5379.00, 7.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 7, 1, '2015-08-23 20:59:34', '2015-08-23 20:59:34', 4, 0.00, 0),
(47, 'et', 'Iste impedit voluptate possimus sint. Vero corporis labore quas modi ad. Dolores beatae voluptas nesciunt temporibus et deserunt. Quod quisquam consequatur veritatis earum id.', 'et', 'fa1940368202bde95d7a086d0f73cd5c4efbb353', 9, 5, 8616.00, 10.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 7, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 1, 0.00, 0),
(48, 'voluptate', 'Fugiat aut beatae alias perspiciatis distinctio ipsam. Nulla distinctio non ut libero omnis quidem. Iste est pariatur molestias voluptatum.\nCumque id sed ducimus. Consectetur quisquam incidunt cumque velit sint consequuntur in porro.', 'voluptate', 'd2959ae6c05de2a7526c0b90afbcabb793c2f835', 49, 7, 5306.00, 9.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 4, 0.00, 0),
(49, 'rerum', 'Id animi quia et adipisci tempora quis. Pariatur qui qui nemo ea. Beatae omnis adipisci magni modi tenetur rem. Quia excepturi esse architecto consequatur ullam eveniet. Accusantium totam vel ullam voluptates molestiae natus.', 'rerum', 'd87cdf1b46c777735fdb5be5aef70f411a30947d', 62, 5, 6500.00, 10.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 5, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 2, 0.00, 0),
(50, 'incidunt', 'Similique sit consectetur quasi. Et quis quia ut corrupti ad ipsam. Mollitia saepe perspiciatis cumque ut inventore sit vel natus.', 'incidunt', '999facf30ad0f7dd4b2fe30352c18333b1909bf5', 90, 7, 4915.00, 8.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 2, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 1, 0.00, 0),
(51, 'dolorem', 'Earum non aspernatur quibusdam voluptatibus. Et consectetur nihil veritatis quae enim soluta fugiat. Ea eum aut maiores veritatis. Voluptatem eos quam est velit sit et.', 'dolorem', '5446f0f00a09d5a308b7609c15a9f90fa4bf04de', 75, 6, 6008.00, 6.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 6, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 4, 0.00, 0),
(52, 'excepturi', 'Et ut alias sit possimus ut est. Culpa quis culpa quod est. Sed aut ullam eaque quaerat iusto deserunt perspiciatis. Possimus odit ipsa cupiditate pariatur libero id.\nUt et dolores maxime amet. Modi quia qui nemo ea excepturi delectus. At omnis magnam esse aut.', 'excepturi', '430b0921744e3aecbb4164dca581ec00d2a2f46f', 83, 10, 5963.00, 5.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 2, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 3, 0.00, 0),
(53, 'ullam', 'Rerum laudantium neque illo molestiae alias sit enim ratione. Sit qui praesentium consequatur quasi. Officia ea quo aliquam rerum ea eos debitis autem. Dignissimos occaecati numquam et occaecati harum cum quia.', 'ullam', 'd531114912ac05a6703db75fb8d2141a04ff70bb', 80, 10, 4940.00, 9.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 1, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 3, 0.00, 0),
(54, 'et', 'Dignissimos eveniet dolorem quis. Eius nesciunt totam mollitia odit et qui. Ea et dolorum itaque laborum magnam et esse. Ut nisi ut enim excepturi et rem aut.', 'et', '8f58e9643cd01e3855cefe11d92d6340ed33b278', 97, 7, 4373.00, 10.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 2, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 2, 0.00, 0),
(55, 'id', 'Autem aut ducimus architecto sit voluptas distinctio sit. Cum fugiat quidem minus non aperiam ipsum. Voluptatem maxime maiores nihil autem at sunt impedit quos.', 'id', '2402a6763e1856a0fdfaf84af3f167e1bb4053ce', 43, 9, 9620.00, 7.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 6, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 3, 0.00, 0),
(56, 'consequatur', 'Non quidem velit inventore esse in nisi nobis ut. Aut est aspernatur ut mollitia quisquam est. Doloribus neque aut veniam rem. Sint eligendi molestias quod repellat.', 'consequatur', 'b20cf11fff8e45145b9832bd5f01760537a04879', 32, 5, 9997.00, 5.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 4, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 2, 0.00, 0),
(57, 'fugiat', 'Nam quia et dolor alias consequatur necessitatibus voluptates. Sint sit velit similique et. Distinctio dolor odio quasi ut. Corporis illo ut enim quos architecto quaerat dolorum. Et nisi iure voluptatem sit cupiditate autem.', 'fugiat', '5dd6f61a2c494ed17a986e858e69681bc2cc8c25', 10, 9, 328.00, 10.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 6, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 3, 0.00, 0),
(58, 'sed', 'Voluptatem repudiandae vel sint autem repellat molestiae. Et recusandae laborum consequatur iure et consequatur facere. Omnis consequatur qui eum eos labore error atque. Rerum rerum voluptatem dolores delectus consectetur iste est sed.', 'sed', '260b6a86f9d57d6a5be3b44c3ce3037d4f03164c', 9, 5, 4880.00, 8.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 1, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 3, 0.00, 0),
(59, 'nihil', 'Vel nihil ipsam qui aspernatur pariatur quo. Aperiam voluptatem et et est culpa. Laboriosam voluptates magni ut magni. Tempore quia aut libero ducimus et hic.\nSaepe ipsa assumenda impedit magnam distinctio molestiae. Ut nihil maiores odit dolore. Est occaecati exercitationem assumenda id quam.', 'nihil', 'cec3f2e0f62163c230c4e87b859c74b1f290f553', 76, 5, 1168.00, 9.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 3, 0.00, 0),
(60, 'ut', 'Beatae illo id omnis nostrum iure et placeat. Veniam eius quos officiis enim repudiandae vel. Id non quisquam dicta perferendis optio doloremque. Officia laboriosam est tempora.\nEst natus illo assumenda aut veritatis rerum. Autem quis voluptatem vel aut aut.', 'ut', '78caa7991a4c0831f41acfcac4a917fcfa9d2793', 18, 8, 811.00, 10.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 7, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 1, 0.00, 0),
(61, 'doloremque', 'Consequatur sit fuga sit omnis corrupti vitae ratione. Dolorem rem consequuntur dolor nesciunt aperiam aut. Possimus et recusandae beatae exercitationem rerum. Et dolorem saepe quas quo voluptates.\nSequi nesciunt ea eos et ipsum. Omnis et quasi qui enim nam nam. Inventore rerum nesciunt iure.', 'doloremque', '5de82bacde05bdf4758015b79876e702e776c029', 17, 8, 9769.00, 9.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 5, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 2, 0.00, 0),
(62, 'porro', 'Quia debitis cum minima tempora impedit distinctio. Et ipsum qui soluta. Deserunt quidem earum laboriosam. Rerum eaque maiores laborum ad voluptas.\nSed et molestiae eveniet error. Fugit enim non rerum laboriosam quia et voluptatem. Voluptas enim voluptatem quia quasi hic fuga nemo molestias.', 'porro', '89a3952544509b2193492caf52a6a0439306f2a4', 73, 7, 1215.00, 7.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 5, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 4, 0.00, 0),
(63, 'ullam', 'Est officia amet rem non quo et consequuntur. Voluptatibus qui nobis accusantium cumque officia ab sequi. Cum numquam qui consequatur ducimus laboriosam. Nesciunt vel voluptatem temporibus numquam et id ipsam. Vel ratione suscipit perferendis eos qui qui.', 'ullam', 'c2c604343053039369aedc5cf743e103a9c16df5', 71, 10, 5664.00, 9.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 5, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 1, 0.00, 0),
(64, 'reprehenderit', 'Eius rem corrupti est eos est voluptatum sit. Qui pariatur iusto reprehenderit rerum. Suscipit illum ut laborum. Sapiente voluptate ea dolorum.', 'reprehenderit', '1ec5410eefada5f408e736799a540c4f6bec7828', 53, 5, 3582.00, 7.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 7, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 2, 0.00, 0),
(65, 'et', 'Corrupti voluptates ex ipsum et facilis nam eum. Et voluptate reiciendis ex accusantium assumenda eius et. Distinctio quod numquam rerum ab blanditiis aperiam et quia.\nAut aliquid quis et asperiores. Dolorum amet vel quasi necessitatibus eum at autem. Quis illum omnis ut et est sint aut.', 'et', 'b8a177ec0a814e6a88f2f9b690a975a504aa12f6', 85, 9, 4858.00, 9.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 4, 0.00, 0),
(66, 'voluptas', 'Aut totam occaecati voluptatem tempora. Consequatur cumque adipisci et aut incidunt. Quis et quo harum aliquid corrupti.\nNeque ea dolorum id. Occaecati vero dolor voluptatem facilis quasi qui. Et id harum rem occaecati nostrum maxime. Asperiores velit sit distinctio sequi.', 'voluptas', 'e263a19d40f3b50ffa7701074a16b68d6bf28fd5', 66, 8, 5406.00, 9.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 1, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 1, 0.00, 0),
(67, 'qui', 'Molestiae nemo tempore veritatis eius placeat id. Temporibus debitis rerum debitis nisi quia laboriosam ut quo. Quisquam qui debitis labore delectus consequatur amet similique enim.', 'qui', 'e972909b5cc3c81b3de5939f06f5de3713c9ddbd', 6, 7, 9178.00, 7.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 3, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 1, 0.00, 0),
(68, 'ut', 'Similique maiores omnis amet tempora. Voluptas possimus aliquid dicta accusamus nam ab vel. Repellat dignissimos ut dolorem architecto. Iste error dignissimos enim itaque voluptatem ea quia provident. Distinctio nihil qui dicta.', 'ut', '2673c610848cbaa54ed2ae440fc9bf19682238d0', 49, 6, 1351.00, 6.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 1, 0.00, 0),
(69, 'est', 'Voluptatem alias enim et consequatur fugit reiciendis error. Autem in sapiente qui esse dolorem doloremque. Quaerat impedit aliquam a. Sed sit ullam ut quae modi id rem.\nFugit inventore dicta blanditiis a quis harum eos. Architecto non sit modi porro quas cumque.', 'est', '204379fefa1742c3e1edf38c7531366527cb8cad', 48, 5, 5662.00, 7.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 1, 0.00, 0),
(70, 'non', 'Exercitationem voluptas delectus deserunt voluptas perspiciatis. Quis dolores ut iure corrupti beatae ad. Ducimus quia consequuntur quo modi. Beatae aliquam eveniet quia.\nOmnis ducimus reiciendis sed sint quia. Est quis autem corporis rem. Dolorem debitis dolore consequatur ut maxime.', 'non', '056d5936379bd960f08299a4ba7c3bbf4121a6f9', 21, 9, 9384.00, 7.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 1, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 1, 0.00, 0),
(71, 'ut', 'Et dolores omnis non nemo aut quisquam perspiciatis. Eius expedita illum ea. Architecto harum recusandae sequi nulla illum quos aut.\nFacere eos eos vero est et est optio est. Architecto qui dolores reprehenderit quae sunt aperiam non nam. Voluptate quia inventore doloremque placeat.', 'ut', '8fdc2169d558f0f0873c26ea9a675d6f9d40c3df', 97, 7, 8905.00, 9.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 5, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 2, 0.00, 0),
(72, 'cum', 'Error iste harum est aut tempora amet dolore atque. Quibusdam corrupti necessitatibus magnam hic ex. Est quia atque qui repellendus dicta aliquam dolorum. Aut officia vel beatae maxime. Nulla neque ut sit quibusdam voluptatum.', 'cum', 'ca0b89490a89285b94dca0eaf812bf27164f714a', 72, 6, 5134.00, 5.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 6, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 3, 0.00, 0),
(73, 'optio', 'Officia totam sed fugit aliquid maxime voluptatem eum est. Beatae officiis est quis veniam vero culpa omnis. Autem eos quia voluptas commodi.', 'optio', 'bc9c86ac9b1ec0552d3217de8bda61d8bd2fbb81', 22, 9, 1010.00, 9.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 2, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 3, 0.00, 0),
(74, 'sit', 'Delectus sit aut unde ea. Nihil qui architecto nemo aut eos excepturi. Mollitia rerum qui consequatur ea atque eius. Iure odio hic dolorem eos.', 'sit', '10d3d91559c5373850b3f6ede5e41cbc8b4d1e88', 82, 6, 1631.00, 9.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 6, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 1, 0.00, 0),
(75, 'voluptatem', 'Ratione laborum incidunt molestias accusamus quisquam. Molestias officia possimus dicta necessitatibus velit. Ut ut odio dignissimos quia sunt ut.\nMinima quis recusandae voluptatem et. Dolores nihil aut omnis porro expedita perferendis beatae. Culpa alias qui cupiditate laudantium aut officiis aut.', 'voluptatem', '31749cc69a9bbf15d99199f5a6be4da1c6566eb4', 32, 8, 9129.00, 10.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 5, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 3, 0.00, 0),
(76, 'dignissimos', 'Ipsa est praesentium et. Accusamus fugit nesciunt qui odit facilis minima id. Facere vitae et aut accusantium voluptas autem a eligendi. Sit perferendis deleniti ea.', 'dignissimos', '7c950a5ad2a3916d6a70f4c4e8c8ccbe66a47727', 12, 6, 5699.00, 7.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 7, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 1, 0.00, 0),
(77, 'quos', 'Dignissimos distinctio molestiae at quo hic incidunt. Dolorem ducimus quo enim accusamus asperiores. Vitae repellat voluptatum aut a reprehenderit sit natus veritatis.', 'quos', 'd59afa4cce0fa59b00da0d1a6ab2041a022d73d0', 62, 9, 7946.00, 10.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 8, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 4, 0.00, 0),
(78, 'sed', 'Rerum expedita hic doloremque at mollitia tempore quia. Aliquid unde rem veniam voluptas. Molestiae rerum iure qui impedit. Et est quas repellendus.', 'sed', '6ea991fa1397aa7c231f856181a45569c72cbdb1', 7, 9, 8233.00, 7.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 4, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 3, 0.00, 0),
(79, 'distinctio', 'Facilis hic qui ut voluptatum eveniet commodi. Natus et ut nulla a eveniet. Repellendus ut nulla pariatur fugiat vel illo ut.\nEt sequi sed deserunt quibusdam eos iusto libero id. Magnam sint fugiat temporibus numquam cupiditate. Cupiditate et reiciendis minima voluptatibus ea distinctio.', 'distinctio', '5c0b7f648d85d7b9c611fb39138e302740256cca', 50, 7, 6608.00, 10.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 3, 0.00, 0),
(80, 'voluptatem', 'Commodi est facilis aspernatur architecto cum unde recusandae. Et sit modi est et. Quisquam nihil dolores accusamus nihil.', 'voluptatem', '21dcbdec258c555b7aeb598465daf4f14a6cc141', 81, 9, 3998.00, 7.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 4, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 1, 0.00, 0),
(81, 'facere', 'Ullam et quisquam quo ea reprehenderit recusandae. Quos nam expedita sapiente et beatae voluptas. Commodi itaque illo explicabo error ea quod fugiat dolorem.', 'facere', '676b3c0afdebdc6c4223ca64d720dc7548847b37', 91, 6, 3560.00, 7.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 6, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 4, 0.00, 0),
(82, 'consequatur', 'Ipsum ut quaerat earum saepe sed est quibusdam at. Repellat a rem natus ut sunt. Ad dicta corrupti eos assumenda. Aspernatur consequatur eaque ab numquam sit quisquam inventore.', 'consequatur', '64d8fce8e3b39335b87f563b9b8be45af8881bba', 97, 5, 1698.00, 6.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 6, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 3, 0.00, 0),
(83, 'officiis', 'Ut nulla non qui autem odio sint esse. Ipsum deserunt quo est officiis sit perspiciatis quis. Ducimus repellendus maiores odit dignissimos ea. Facere accusamus unde modi sit. Dolores eveniet consectetur nesciunt commodi voluptate.', 'officiis', '2bfc1cc82d84e6303e80abf973b015bc338fe4c5', 70, 10, 1087.00, 8.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 4, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 3, 0.00, 0),
(84, 'dolorum', 'Dolores accusantium fugit sit et explicabo. Quas suscipit architecto nemo ab maiores doloribus. Quia enim maiores ad rerum nemo culpa. Sunt accusamus aut et exercitationem assumenda.', 'dolorum', 'ea6992fbf2fa894d061208513736d52319e3996a', 51, 9, 2001.00, 7.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 5, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 1, 0.00, 0),
(85, 'ipsam', 'Voluptatem quo ipsa facilis ut porro. Quo aliquam atque voluptate libero quam dicta. Vitae sapiente saepe non animi et impedit. Ut dolores voluptatem fuga saepe corporis in rerum. Dolorum quia natus delectus dignissimos eligendi sint.', 'ipsam', '3e944a57c8518bc11bc8380eac275b8e7433cd02', 51, 10, 6343.00, 6.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 1, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 1, 0.00, 0),
(86, 'nihil', 'Delectus minima doloribus ut architecto incidunt ea. Incidunt unde vero at ut aperiam.\nEt voluptatum aut est corrupti voluptatem voluptas numquam. Error quidem eos dolores nemo ex est nesciunt itaque. Qui maxime iusto omnis ullam aut veritatis.', 'nihil', '36ebf98000cad4102b621da17d4b38dab2917301', 76, 6, 1076.00, 5.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 8, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 4, 0.00, 0),
(87, 'occaecati', 'Non pariatur voluptatum ullam repellendus eveniet enim eum. Officia qui asperiores dicta eius sunt sint debitis. Recusandae nemo eveniet et quis culpa est.\nMinus est facere necessitatibus libero ut. Aspernatur libero alias et. Beatae magni non itaque impedit animi.', 'occaecati', '5e03ffd55b98b7a0af54e60e17e6f5178f1676ef', 20, 8, 175.00, 7.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 3, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 1, 0.00, 0),
(88, 'voluptatum', 'Quaerat earum adipisci ab et nemo id. Enim delectus totam earum esse dolorem molestiae odit. Aliquam voluptatem laboriosam sapiente dolores et.\nDeleniti est amet vero omnis. Sit aperiam quidem esse cumque debitis.', 'voluptatum', '0306630cea7f40bb10afbb29ee0479e52d24f793', 16, 10, 4790.00, 9.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 8, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 4, 0.00, 0),
(89, 'deserunt', 'Quia iste reprehenderit et vitae. Quibusdam fugiat voluptatem saepe eos eum. Iure laborum magni voluptas dolor soluta blanditiis distinctio doloremque. Eum ex et et repellat.', 'deserunt', '807060047535ac058b66309b379eeb29d76db252', 42, 6, 9777.00, 5.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 4, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 3, 0.00, 0),
(90, 'sint', 'Enim accusamus mollitia sit ea. Omnis itaque officia magnam dignissimos dolorem accusamus. Distinctio occaecati deleniti qui exercitationem eligendi deleniti. Consequatur nemo perferendis voluptatem dolores voluptas repellendus et.', 'sint', '8dbe4058a7b9c40f40f5a6e140451db8c1fd642d', 1, 6, 4405.00, 5.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 7, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 1, 0.00, 0),
(91, 'eligendi', 'Ipsum quaerat est in praesentium in. Tenetur voluptatibus enim quia rerum cumque in id sed. Beatae voluptas odio labore. Et tempora at magnam nostrum quis molestias accusantium. Quis dolor eaque impedit voluptas neque cumque.', 'eligendi', '3822bf30e872f0416a87797e3c269d59ab65571a', 81, 5, 3906.00, 7.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 5, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 4, 0.00, 0),
(92, 'provident', 'Et fugit suscipit ut. Porro nobis reiciendis inventore accusantium et. Enim aut tempore corporis ex amet dicta. Voluptate consectetur a illo minus consectetur nulla quidem.', 'provident', '917fdfa209f6677ddc20bf73472b2e02ebd9c2a7', 78, 6, 2436.00, 7.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 4, 1, '2015-08-23 20:59:35', '2015-08-23 20:59:35', 2, 0.00, 0),
(93, 'nam', 'Ipsa vero necessitatibus velit veritatis mollitia facilis. Ad odio odit eum nihil in non voluptas. Occaecati ea dolorem magni eos natus et.', 'nam', '6d20e2380a3467e556f610e58f9c24a137b26b57', 95, 10, 6988.00, 8.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 1, 1, '2015-08-23 20:59:36', '2015-08-23 20:59:36', 2, 0.00, 0),
(94, 'omnis', 'Tempore eius placeat perspiciatis qui. Sint fuga eligendi consequatur. Recusandae ipsam facilis maxime in non dolor. Ea pariatur reprehenderit sed sapiente. Veniam doloremque officiis sunt amet sed asperiores sit ea.', 'omnis', '6bd0c7174426bc5e6d7396a7277d1a734f574120', 37, 10, 6130.00, 10.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 3, 1, '2015-08-23 20:59:36', '2015-08-23 20:59:36', 1, 0.00, 0),
(95, 'maxime', 'Accusantium ut animi quidem vel voluptatum dicta. Libero reiciendis distinctio quia dicta in minus voluptatum. Earum explicabo blanditiis dolores. Eaque eius velit laborum consequatur accusamus quibusdam omnis.', 'maxime', 'a4e46299c83c88dc67993d6ea6c5df7f419370df', 13, 8, 3443.00, 10.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 1, '2015-08-23 20:59:36', '2015-08-23 20:59:36', 4, 0.00, 0),
(96, 'temporibus', 'Nam sed minus magni eum et. Aliquam deleniti quae magnam non labore. Reprehenderit saepe accusamus totam assumenda alias.\nLaborum nulla quae est quis magnam alias ut consequatur. Incidunt labore eos ut id. Doloremque deleniti qui numquam beatae itaque ipsam veniam qui.', 'temporibus', '3670ebc12ea9c23b3ec1924f74093b6c849bebe2', 17, 8, 6365.00, 7.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 4, 1, '2015-08-23 20:59:36', '2015-08-23 20:59:36', 1, 0.00, 0),
(97, 'voluptate', 'Qui assumenda ut non iste. Excepturi doloremque minima nam. Et sit quam officiis saepe.\nCorporis non qui et. Ut qui ipsa qui et voluptatem at quisquam.\nQuasi itaque saepe consequatur et repellendus. Quae ut itaque sit neque dolores sunt numquam eos. Ipsum ut consequuntur sunt est.', 'voluptate', '94f062bf5738ef77d47e8e76c9224ca940528b59', 50, 8, 4472.00, 6.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 8, 1, '2015-08-23 20:59:36', '2015-08-23 20:59:36', 2, 0.00, 0),
(98, 'voluptatem', 'Ut libero modi odit natus illum animi et. Sit voluptatem voluptas perspiciatis vel eum. Saepe esse quia quisquam quidem beatae dolore.', 'voluptatem', '5c7dae575fc1c8da60ecab84eaff0576fe11900c', 84, 8, 5760.00, 7.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 5, 1, '2015-08-23 20:59:36', '2015-08-23 20:59:36', 4, 0.00, 0),
(99, 'nisi', 'Voluptates recusandae consequuntur aut molestias totam recusandae qui ducimus. Fugiat enim voluptatem est magnam enim.\nPariatur dolor enim accusamus quisquam magnam corrupti placeat. Dolorem et quia est vel. Modi magni cupiditate sit eius.', 'nisi', '991a0cff79aa98d1435696883f82d00310729602', 81, 8, 2873.00, 9.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 1, 1, '2015-08-23 20:59:36', '2015-08-23 20:59:36', 2, 0.00, 0),
(100, 'ab', 'Animi perferendis nihil veritatis veritatis iusto sunt repellendus. Laudantium est ut in et. Omnis eos dignissimos voluptas est sit. Beatae et eum quisquam odio quidem commodi nihil.', 'ab', '33b35619b95457df0468640de6625d9bb830aefd', 35, 6, 1554.00, 9.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 1, '2015-08-23 20:59:36', '2015-08-23 20:59:36', 4, 0.00, 0),
(101, 'Mesa para 4', 'Esta mesa es super incomoda esto es del edit', 'mesa-para-4', 'MC KGB ', 80, 5, 4500.00, 3900.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 1, 1, '2015-09-13 18:41:21', '2015-09-13 19:31:48', 0, 0.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products_categories`
--

CREATE TABLE IF NOT EXISTS `products_categories` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_d` int(10) unsigned NOT NULL,
  `available` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products_categories`
--

INSERT INTO `products_categories` (`id`, `name`, `description`, `slug`, `parent_d`, `available`, `created_at`, `updated_at`) VALUES
(1, 'Ferretería', 'Et nihil placeat ut blanditiis repellat ad. Blanditiis labore enim impedit. Quis voluptatem recusandae voluptates culpa corporis.\nCupiditate perferendis ut repellat debitis est. Perspiciatis in libero quia explicabo.\nQui quasi qui corporis voluptas in. Recusandae accusantium ut dolores tempora.', 'ferreteria', 0, 1, '2015-08-19 03:21:15', '2015-08-19 03:21:15'),
(2, 'Cocina', 'Occaecati vitae qui ea possimus praesentium sequi. Quisquam neque aut perferendis consequatur. Quidem temporibus quaerat dicta numquam in nobis non.\nDolores quisquam aut veritatis qui. Quis error sed animi sint animi eaque quod accusantium. Dolores aut dignissimos doloribus explicabo nemo qui.', 'cocina', 0, 1, '2015-08-19 03:21:15', '2015-08-19 03:21:15'),
(3, 'Jardinería', 'Sit ut minus eum pariatur. Dolor non autem sequi. Similique laborum iure id facilis sit vero est. Quae velit expedita dolorem placeat ipsa voluptatem.', 'jardineria', 0, 1, '2015-08-19 03:21:15', '2015-08-19 03:21:15'),
(4, 'Oficinas', 'Recusandae deleniti voluptates modi aliquam ullam similique. Itaque quae quibusdam ut amet eos repellat soluta totam. Sed eius pariatur perferendis qui earum iure facere.', 'oficinas', 0, 1, '2015-08-19 03:21:15', '2015-08-19 03:21:15'),
(5, 'Computadoras', 'Quia numquam qui consequatur. Veniam dolore et nihil numquam quisquam provident sit et. Quod quia omnis sed accusamus. Velit non harum deleniti et quod deleniti.\nQui recusandae qui sed quos voluptatem ipsum alias. Rem nihil quia deserunt. Dolores qui omnis soluta voluptatum omnis culpa ut.', 'computadoras', 0, 1, '2015-08-19 03:21:15', '2015-08-19 03:21:15'),
(6, 'Electrodomésticos', 'Et eius possimus quam asperiores. Tempore labore quia error exercitationem molestias omnis voluptatem. Quaerat necessitatibus modi laborum est enim porro quos tempore.\nRepudiandae maiores quo voluptas qui. Expedita non sed aut ab officiis.', 'electrodomesticos', 0, 1, '2015-08-19 03:21:15', '2015-08-19 03:21:15'),
(7, 'Aires Acondicionados', 'Harum vel pariatur quaerat molestias fuga et tempora quidem. Sunt reprehenderit dignissimos distinctio sunt cum qui. Repellat nemo et qui nihil exercitationem et porro. Placeat laborum dolorem totam. Cum sit sed fugit voluptatem eum nemo et.', 'aires-acondicionados', 0, 1, '2015-08-19 03:21:15', '2015-08-19 03:21:15'),
(8, 'Video Juegos', 'Quos maxime accusantium doloremque mollitia earum qui nisi. Ducimus distinctio consectetur dolorum distinctio corrupti qui. Odit et voluptas repellendus omnis autem.', 'video-juegos', 0, 1, '2015-08-19 03:21:15', '2015-08-19 03:21:15'),
(9, 'Hogar', 'Ipsa assumenda libero totam quidem odio optio quasi. Error enim sit consequatur facilis consequatur corrupti ut odio. Tempore iure aliquam voluptatem perspiciatis.\nIn non eos laborum et tempore error itaque aut. Molestiae qui repudiandae eum recusandae aut. Aperiam in reprehenderit molestiae et.', 'hogar', 0, 1, '2015-08-19 03:21:15', '2015-08-19 03:21:15'),
(10, 'Ropa', 'Magni et quam doloribus reiciendis et culpa dicta. Voluptatum dolores facere deserunt veniam cupiditate. Sit sit laboriosam omnis at. Et tempore dignissimos enim laborum.', 'ropa', 0, 1, '2015-08-19 03:21:15', '2015-08-19 03:21:15');

-- --------------------------------------------------------

--
-- Table structure for table `products_logs`
--

CREATE TABLE IF NOT EXISTS `products_logs` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `date_in` date NOT NULL,
  `date_out` date NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplyers`
--

CREATE TABLE IF NOT EXISTS `supplyers` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `rnc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `available` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('admin','cashier','employer','superadmin') COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `location_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `type`, `remember_token`, `created_at`, `updated_at`, `location_id`) VALUES
(1, 'Admin Awesome', 'admin@awesomemedia.do', '$2y$10$0kU2f3EczMdrN2XpWJJr9OjZOoNU1eD6YLip8X1c6S9B1EzrnLgme', 'admin', 'vHZ9TcCSdeeGiGcFhgAsrME3Of43WPfAK9LdRUSZqQi5YPlExNE1oC0loodi', '2015-08-30 00:08:13', '2015-09-20 18:02:36', 1),
(2, 'Lali Morales', 'lalicomplemento@hotmail.com', '$2y$10$cisep031OaxSMGoKMH7.8.R8cdJtZq/l6x/mnvD2ymkgiLbU04pr6', 'admin', 'pE6ORfIDw0UvcFXtWxnwQF6OUsyEVY7vKEZOclSndr0TAKOLby4Jg4mbFzJ2', '2015-08-30 00:08:14', '2015-09-20 19:04:39', 1),
(3, 'Edmundo Pichardo', 'ce.pichardo@gmail.com', '$2y$10$2JZhsKviv5HLU.2fbSzd9.79QHjK.f7eA9LWxEEdnJLsVlHJ5RY/q', 'employer', NULL, '2015-08-30 00:08:14', '2015-09-20 19:09:54', 2),
(4, 'Merl Hickle', 'daugherty.randal@hotmail.com', '$2y$10$xMY35uOK4.dCIX1v7mSfluAcMONXULHuzM2/XgX3up3/n2yfBchxK', 'employer', NULL, '2015-08-30 00:08:15', '2015-08-30 00:08:15', 3),
(5, 'Ms. Ethyl McLaughlin V', 'kirstin.bogisich@greenholt.biz', '$2y$10$9S83NttcZ3Gux8kTSmLM1uo.tAinTicJ/3ZY66wW3zeyuxUXm5kni', 'employer', NULL, '2015-08-30 00:08:15', '2015-08-30 00:08:15', 3),
(6, 'Jillian Wunsch', 'mayra.moore@feil.com', '$2y$10$Hl4metK1H/dZ.u.cofwBDe8cdjnnbG5.xbjq4Zf5J63XG00ZVlxSu', 'employer', NULL, '2015-08-30 00:08:16', '2015-08-30 00:08:16', 3),
(7, 'Mandy Olson II', 'kellie32@gmail.com', '$2y$10$DW/7vR7V2EGCQ8CjtolgYO7yyACfNb8QSQrc.zYgjZ/oCuaEvQpNO', 'employer', NULL, '2015-08-30 00:08:17', '2015-08-30 00:08:17', 2),
(8, 'Gussie Nikolaus', 'wilhelm56@yahoo.com', '$2y$10$.jWnce0yVqDlZKV84WD8IOMeIfsdevielKAIUWOmPWaLjybokmv/2', 'employer', NULL, '2015-08-30 00:08:17', '2015-08-30 00:08:17', 3),
(9, 'Dejuan Dibbert', 'garrick.kuvalis@yahoo.com', '$2y$10$/G19fSbxGikgm09I3KxRyuMFL80ltcnsPJcPflehcbE7RRjnMuJgK', 'employer', NULL, '2015-08-30 00:08:18', '2015-08-30 00:08:18', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
 ADD PRIMARY KEY (`id`), ADD KEY `candidates_category_id_foreign` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configurations`
--
ALTER TABLE `configurations`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `configurations_alias_unique` (`alias`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
 ADD PRIMARY KEY (`id`), ADD KEY `invoices_order_id_foreign` (`order_id`);

--
-- Indexes for table `invoices_details`
--
ALTER TABLE `invoices_details`
 ADD PRIMARY KEY (`id`), ADD KEY `invoices_details_invoice_id_foreign` (`invoice_id`), ADD KEY `invoices_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `invoices_payments`
--
ALTER TABLE `invoices_payments`
 ADD PRIMARY KEY (`id`), ADD KEY `invoices_payments_invoice_id_foreign` (`invoice_id`);

--
-- Indexes for table `itbis`
--
ALTER TABLE `itbis`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ncf`
--
ALTER TABLE `ncf`
 ADD PRIMARY KEY (`id`), ADD KEY `ncf_location_id_foreign` (`location_id`);

--
-- Indexes for table `ncf_sequencies`
--
ALTER TABLE `ncf_sequencies`
 ADD PRIMARY KEY (`id`), ADD KEY `ncf_sequencies_ncf_id_foreign` (`ncf_id`);

--
-- Indexes for table `ncf_types`
--
ALTER TABLE `ncf_types`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`id`), ADD KEY `orders_user_id_foreign` (`user_id`), ADD KEY `orders_client_id_foreign` (`client_id`);

--
-- Indexes for table `orders_credits`
--
ALTER TABLE `orders_credits`
 ADD PRIMARY KEY (`id`), ADD KEY `orders_credits_order_id_foreign` (`order_id`);

--
-- Indexes for table `orders_details`
--
ALTER TABLE `orders_details`
 ADD PRIMARY KEY (`id`), ADD KEY `orders_details_order_id_foreign` (`order_id`), ADD KEY `orders_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `orders_status`
--
ALTER TABLE `orders_status`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reminders`
--
ALTER TABLE `password_reminders`
 ADD KEY `password_reminders_email_index` (`email`), ADD KEY `password_reminders_token_index` (`token`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`), ADD KEY `products_user_id_foreign` (`user_id`), ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `products_categories`
--
ALTER TABLE `products_categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_logs`
--
ALTER TABLE `products_logs`
 ADD PRIMARY KEY (`id`), ADD KEY `products_logs_user_id_foreign` (`user_id`), ADD KEY `products_logs_product_id_foreign` (`product_id`);

--
-- Indexes for table `supplyers`
--
ALTER TABLE `supplyers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD KEY `users_location_id_foreign` (`location_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `configurations`
--
ALTER TABLE `configurations`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `invoices_details`
--
ALTER TABLE `invoices_details`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invoices_payments`
--
ALTER TABLE `invoices_payments`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `itbis`
--
ALTER TABLE `itbis`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ncf`
--
ALTER TABLE `ncf`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ncf_sequencies`
--
ALTER TABLE `ncf_sequencies`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `ncf_types`
--
ALTER TABLE `ncf_types`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `orders_credits`
--
ALTER TABLE `orders_credits`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders_details`
--
ALTER TABLE `orders_details`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `orders_status`
--
ALTER TABLE `orders_status`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `products_categories`
--
ALTER TABLE `products_categories`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `products_logs`
--
ALTER TABLE `products_logs`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplyers`
--
ALTER TABLE `supplyers`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidates`
--
ALTER TABLE `candidates`
ADD CONSTRAINT `candidates_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
ADD CONSTRAINT `invoices_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `invoices_details`
--
ALTER TABLE `invoices_details`
ADD CONSTRAINT `invoices_details_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`),
ADD CONSTRAINT `invoices_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `invoices_payments`
--
ALTER TABLE `invoices_payments`
ADD CONSTRAINT `invoices_payments_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`);

--
-- Constraints for table `ncf`
--
ALTER TABLE `ncf`
ADD CONSTRAINT `ncf_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`);

--
-- Constraints for table `ncf_sequencies`
--
ALTER TABLE `ncf_sequencies`
ADD CONSTRAINT `ncf_sequencies_ncf_id_foreign` FOREIGN KEY (`ncf_id`) REFERENCES `ncf` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
ADD CONSTRAINT `orders_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders_credits`
--
ALTER TABLE `orders_credits`
ADD CONSTRAINT `orders_credits_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `orders_details`
--
ALTER TABLE `orders_details`
ADD CONSTRAINT `orders_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
ADD CONSTRAINT `orders_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `products_categories` (`id`),
ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products_logs`
--
ALTER TABLE `products_logs`
ADD CONSTRAINT `products_logs_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
ADD CONSTRAINT `products_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `users_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`);
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
