-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 30-10-2015 a las 01:34:42
-- Versión del servidor: 5.5.38
-- Versión de PHP: 5.5.18

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `amsisinvoice`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `candidates`
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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `candidates`
--

INSERT INTO `candidates` (`id`, `website_url`, `description`, `phone`, `job_type`, `category_id`, `available`, `slug`, `gender`, `created_at`, `updated_at`) VALUES
(1, 'http://www.larsonkreiger.com/', 'Quia nulla a mollitia alias voluptate consequuntur praesentium quisquam. Voluptatibus blanditiis in doloremque et non odio quae.', '849.206.5381', 'full', 2, 1, 'clemente-pichardo', 'male', '2015-08-30 00:08:13', '2015-09-20 00:54:33'),
(2, 'http://jakubowski.com/', 'Dolores libero ipsum et. Vitae rerum est nisi animi. Necessitatibus exercitationem iure sit cupiditate quia eos est ea. Libero vel occaecati expedita dolorem.', '', 'full', 1, 1, 'edna-oreilly', 'female', '2015-08-30 00:08:14', '2015-08-30 00:08:14'),
(5, 'http://www.starkmayer.com/', 'Culpa a natus quia distinctio eveniet. Officia laudantium ratione qui eligendi consequatur sit. Molestiae rerum sint aut ut dolore reprehenderit tenetur. Quod deserunt eum sint qui temporibus.', '', 'full', 3, 1, 'ms-ethyl-mclaughlin-v', 'male', '2015-08-30 00:08:15', '2015-08-30 00:08:15'),
(22, '', '', '809.233.4433', 'full', 1, 1, '', 'female', '2015-09-22 19:56:22', '2015-09-22 19:56:22'),
(24, '', '', '849.206.5381', 'full', 1, 1, '', 'male', '2015-09-22 20:13:44', '2015-09-22 20:13:44'),
(25, '', '', '', 'full', 1, 1, '', 'male', '2015-10-27 23:32:56', '2015-10-27 23:32:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Backend developers', 'backend-developers', '2015-08-19 03:21:10', '2015-08-19 03:21:10'),
(2, 'Frontend developers', 'frontend-developers', '2015-08-19 03:21:10', '2015-08-19 03:21:10'),
(3, 'Designers', 'designers', '2015-08-19 03:21:10', '2015-08-19 03:21:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`id`, `type`, `rnc`, `noid`, `name`, `contact_name`, `address`, `phone`, `cellphone`, `email`, `comments`, `created_at`, `updated_at`, `available`) VALUES
(1, 'company', '', '', 'N/A\r\n', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(2, 'company', '112233', '', 'Ferreteria Ochoa', 'Rolfi Sanchez', 'Avda. Sta. Eulalia del Riu 27, Edf. Bahia Z, 2do 3era', '674311249', '674311249', 'fochoa@gmail.com', 'asdasd', '2015-09-24 20:02:53', '2015-09-24 20:02:53', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configurations`
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
-- Volcado de datos para la tabla `configurations`
--

INSERT INTO `configurations` (`id`, `alias`, `name`, `description`, `value`, `type`, `updated_at`, `created_at`) VALUES
(1, 'itbis', 'ITBIS 18 %', 'Impuesto Sobre la Renta', '18.00', 'value', '2015-08-29 04:00:00', '2015-08-29 04:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoices`
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `invoices`
--

INSERT INTO `invoices` (`id`, `order_id`, `total_paid`, `pay_days`, `pay_date`, `ncf_sequency_id`, `rnc`, `created_at`, `updated_at`) VALUES
(1, 8, 0.00, 0, '0000-00-00 00:00:00', 0, '', '2015-10-27 23:43:17', '2015-10-27 23:43:17'),
(2, 9, 0.00, 0, '0000-00-00 00:00:00', 0, '', '2015-10-27 23:43:38', '2015-10-27 23:43:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoices_details`
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
-- Estructura de tabla para la tabla `invoices_payments`
--

CREATE TABLE IF NOT EXISTS `invoices_payments` (
`id` int(10) unsigned NOT NULL,
  `invoice_id` int(10) unsigned NOT NULL,
  `amount` float(10,2) NOT NULL,
  `payment_method` enum('cash','credit_card','check','transfer') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `itbis`
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
-- Volcado de datos para la tabla `itbis`
--

INSERT INTO `itbis` (`id`, `name`, `value`, `available`, `created_at`, `updated_at`) VALUES
(1, 'General', 18.00, 1, '2015-08-30 02:07:12', '2015-08-30 02:07:12'),
(2, 'Excentos', 0.00, 1, '2015-08-30 02:07:12', '2015-08-30 02:07:12'),
(3, 'Subsidiados', 5.00, 1, '2015-08-30 02:07:12', '2015-08-30 02:07:12'),
(4, 'Especial', 10.00, 1, '2015-08-30 02:07:12', '2015-08-30 02:07:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `locations`
--

INSERT INTO `locations` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Caja 1', '', '2015-08-29 23:44:15', '2015-08-29 23:44:15'),
(2, 'Caja 2', '', '2015-08-29 23:44:15', '2015-08-29 23:44:15'),
(3, 'Caja 3', '', '2015-08-29 23:44:15', '2015-08-29 23:44:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
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
('2015_09_20_160546_create_supplyers_table', 22),
('2015_09_20_224720_update_orders_table', 23),
('2015_09_22_153450_update_candidates_table', 24),
('2015_09_24_022619_update_products_table', 25),
('2015_09_24_023234_update_products_table', 26),
('2015_10_04_232833_update_orders_table', 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ncf`
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
-- Volcado de datos para la tabla `ncf`
--

INSERT INTO `ncf` (`id`, `type_id`, `name`, `prefix`, `location_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Factura General 1', 'A0100100101', 1, '2015-09-27 01:59:55', '2015-09-27 01:59:55'),
(2, 8, 'Casos Especiales', 'A0100100114', 2, '2015-09-27 01:59:55', '2015-09-27 01:59:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ncf_sequencies`
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
-- Volcado de datos para la tabla `ncf_sequencies`
--

INSERT INTO `ncf_sequencies` (`id`, `ncf_id`, `sequency`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, '00000001', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(2, 1, '00000002', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(3, 1, '00000003', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(4, 1, '00000004', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(5, 1, '00000005', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(6, 1, '00000006', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(7, 1, '00000007', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(8, 1, '00000008', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(9, 1, '00000009', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(10, 1, '00000010', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(11, 2, '00000001', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(12, 2, '00000002', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(13, 2, '00000003', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(14, 2, '00000004', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(15, 2, '00000005', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(16, 2, '00000006', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(17, 2, '00000007', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(18, 2, '00000008', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(19, 2, '00000009', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(20, 2, '00000010', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(21, 2, '00000011', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(22, 2, '00000012', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(23, 2, '00000013', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(24, 2, '00000014', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(25, 2, '00000015', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(26, 2, '00000016', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(27, 2, '00000017', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(28, 2, '00000018', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(29, 2, '00000019', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(30, 2, '00000020', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(31, 2, '00000021', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(32, 2, '00000022', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(33, 2, '00000023', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(34, 2, '00000024', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(35, 2, '00000025', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(36, 2, '00000026', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(37, 2, '00000027', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(38, 2, '00000028', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(39, 2, '00000029', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(40, 2, '00000030', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(41, 2, '00000031', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(42, 2, '00000032', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(43, 2, '00000033', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(44, 2, '00000034', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(45, 2, '00000035', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(46, 2, '00000036', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(47, 2, '00000037', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(48, 2, '00000038', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(49, 2, '00000039', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(50, 2, '00000040', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(51, 2, '00000041', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(52, 2, '00000042', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(53, 2, '00000043', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(54, 2, '00000044', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(55, 2, '00000045', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(56, 2, '00000046', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(57, 2, '00000047', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(58, 2, '00000048', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(59, 2, '00000049', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(60, 2, '00000050', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(61, 2, '00000051', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(62, 2, '00000052', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(63, 2, '00000053', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(64, 2, '00000054', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(65, 2, '00000055', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(66, 2, '00000056', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(67, 2, '00000057', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(68, 2, '00000058', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(69, 2, '00000059', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(70, 2, '00000060', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(71, 2, '00000061', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(72, 2, '00000062', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(73, 2, '00000063', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(74, 2, '00000064', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(75, 2, '00000065', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(76, 2, '00000066', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(77, 2, '00000067', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(78, 2, '00000068', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(79, 2, '00000069', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(80, 2, '00000070', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(81, 2, '00000071', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(82, 2, '00000072', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(83, 2, '00000073', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(84, 2, '00000074', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(85, 2, '00000075', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(86, 2, '00000076', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(87, 2, '00000077', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(88, 2, '00000078', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(89, 2, '00000079', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(90, 2, '00000080', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(91, 2, '00000081', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(92, 2, '00000082', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(93, 2, '00000083', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(94, 2, '00000084', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(95, 2, '00000085', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(96, 2, '00000086', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(97, 2, '00000087', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(98, 2, '00000088', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(99, 2, '00000089', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(100, 2, '00000090', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(101, 2, '00000091', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(102, 2, '00000092', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(103, 2, '00000093', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(104, 2, '00000094', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(105, 2, '00000095', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(106, 2, '00000096', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(107, 2, '00000097', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(108, 2, '00000098', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(109, 2, '00000099', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available'),
(110, 2, '00000100', '2015-09-27 01:59:55', '2015-09-27 01:59:55', 'available');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ncf_types`
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
-- Volcado de datos para la tabla `ncf_types`
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
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`id` int(10) unsigned NOT NULL,
  `type` enum('sale','buy','quote') COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `supplyer_id` int(10) unsigned NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `type`, `user_id`, `client_id`, `supplyer_id`, `phone`, `address`, `email`, `first_name`, `last_name`, `itbis`, `itbis_amount`, `total`, `sub_total`, `discount`, `discount_percent`, `total_credits`, `percent_credits`, `status`, `available`, `created_at`, `updated_at`) VALUES
(2, 'buy', 1, 1, 1, '', '', '', '', '', 18.00, 18.00, 100.00, 118.00, 0.00, 0.00, 0.00, 0.00, 'completed', 1, '2015-10-05 03:45:56', '2015-10-05 03:45:56'),
(5, 'buy', 1, 1, 2, '', '', '', '', '', 18.00, 18.00, 100.00, 118.00, 0.00, 0.00, 0.00, 0.00, 'completed', 1, '2015-10-05 04:09:39', '2015-10-05 04:09:39'),
(6, 'buy', 1, 1, 2, '', '', '', '', '', 18.00, 18.00, 100.00, 118.00, 0.00, 0.00, 0.00, 0.00, 'completed', 1, '2015-10-05 04:10:25', '2015-10-05 04:10:25'),
(7, 'buy', 1, 1, 2, '', '', '', '', '', 18.00, 18.00, 220.00, 238.00, 0.00, 0.00, 0.00, 0.00, 'completed', 1, '2015-10-05 04:12:48', '2015-10-05 04:12:48'),
(8, 'sale', 1, 1, 1, '', '', '', '', '', 18.00, 47.69, 264.95, 312.64, 0.00, 0.00, 0.00, 0.00, 'status_credit', 1, '2015-10-27 23:43:17', '2015-10-27 23:43:17'),
(9, 'sale', 1, 1, 1, '', '', '', '', '', 18.00, 7208.97, 40272.89, 47481.39, 0.47, 0.00, 0.00, 0.00, 'status_credit', 1, '2015-10-27 23:43:38', '2015-10-27 23:43:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders_credits`
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
-- Estructura de tabla para la tabla `orders_details`
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `orders_details`
--

INSERT INTO `orders_details` (`id`, `order_id`, `product_id`, `qty`, `price`, `created_at`, `updated_at`, `discount`, `itbis`) VALUES
(1, 2, 1, 1, 100.00, '2015-10-05 03:45:56', '2015-10-05 03:45:56', 0.00, 18.00),
(2, 5, 1, 1, 100.00, '2015-10-05 04:09:39', '2015-10-05 04:09:39', 0.00, 18.00),
(3, 6, 1, 1, 100.00, '2015-10-05 04:10:25', '2015-10-05 04:10:25', 0.00, 18.00),
(4, 7, 1, 1, 100.00, '2015-10-05 04:12:48', '2015-10-05 04:12:48', 0.00, 18.00),
(5, 7, 2, 1, 120.00, '2015-10-05 04:12:48', '2015-10-05 04:12:48', 0.00, 0.00),
(6, 8, 1, 1, 312.64, '2015-10-27 23:43:17', '2015-10-27 23:43:17', 0.00, 47.69),
(7, 9, 3, 1, 1183.61, '2015-10-27 23:43:38', '2015-10-27 23:43:38', 0.00, 180.55),
(8, 9, 5, 1, 45939.84, '2015-10-27 23:43:38', '2015-10-27 23:43:38', 0.00, 7007.77),
(9, 9, 22, 1, 128.40, '2015-10-27 23:43:38', '2015-10-27 23:43:38', 0.47, 19.59),
(10, 9, 21, 1, 6.96, '2015-10-27 23:43:38', '2015-10-27 23:43:38', 0.00, 1.06),
(11, 9, 36, 1, 222.58, '2015-10-27 23:43:38', '2015-10-27 23:43:38', 0.00, 0.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders_status`
--

CREATE TABLE IF NOT EXISTS `orders_status` (
`id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reminders`
--

CREATE TABLE IF NOT EXISTS `password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `password_reminders`
--

INSERT INTO `password_reminders` (`email`, `token`, `created_at`) VALUES
('ce.pichardo@gmail.com', '89c835535f7fc5407750354df94e638411386c76', '2015-09-21 01:17:39'),
('ce.pichardo@gmail.com', '3cc45fc5efb8c770498d6efe90b10938e8429815', '2015-09-21 01:20:40'),
('ce.pichardo@gmail.com', '12ff0fdc946cbac5983ec5d08d7c16d7269fea25', '2015-09-21 18:24:47'),
('ce.pichardo@gmail.com', 'e415b9548c027d5c2d5c9bd4ef59857d5d3b5913', '2015-09-21 21:06:56'),
('ce.pichardo@gmail.com', '8baa7ac51660513854a542176b6cd0437ceb747d', '2015-09-21 21:09:25'),
('ce.pichardo@gmail.com', '79a3b809824c4a49f5c3b0a309e3dab2395402eb', '2015-09-21 23:55:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `min_stock` int(11) NOT NULL,
  `price_list` float NOT NULL DEFAULT '0',
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
  `fix_itbis` float(10,2) NOT NULL,
  `itbis_apply` tinyint(1) NOT NULL,
  `itbis_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `slug`, `sku`, `stock`, `min_stock`, `price_list`, `price`, `min_price`, `discount`, `discount_apply`, `user_id`, `date_in`, `date_out`, `category_id`, `available`, `created_at`, `updated_at`, `fix_itbis`, `itbis_apply`, `itbis_id`) VALUES
(1, 'ADAPTADOR CUCHILLA 65-224', '', 'adaptador-cuchilla-65-224', '', 2261, 10, 100, 264.95, 185.47, 0.00, 0, 1, '0000-00-00', '0000-00-00', 8, 0, '0000-00-00 00:00:00', '2015-10-27 23:43:17', 0.00, 0, 1),
(2, 'ADAPTADOR DW SDS MAX->SDS PLUS', '', 'adaptador-dw-sds-max-sds-plus', '', 100, 15, 0, 5637.28, 3946.10, 0.20, 1, 1, '0000-00-00', '0000-00-00', 8, 0, '0000-00-00 00:00:00', '2015-10-05 04:12:48', 0.00, 0, 2),
(3, 'ADAPTADOR DW SDS->MANDRIL 1/2', '', 'adaptador-dw-sds-mandril-12', '', 5461, 36, 0, 1003.06, 702.14, 0.00, 0, 1, '0000-00-00', '0000-00-00', 8, 0, '0000-00-00 00:00:00', '2015-10-27 23:43:38', 0.00, 0, 1),
(4, 'ADAPTADOR P/CUCHILLA MTD 753-0', '', 'adaptador-pcuchilla-mtd-753-0', '', 3453, 33, 0, 1812.09, 1268.46, 0.00, 0, 1, '0000-00-00', '0000-00-00', 8, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 2),
(5, 'BOMBA F.E CENT 2HP 1PH 2FPDB1', '', 'bomba-fe-cent-2hp-1ph-2fpdb1', '', 4651, 47, 0, 38932.07, 27252.45, 0.00, 0, 1, '0000-00-00', '0000-00-00', 8, 0, '0000-00-00 00:00:00', '2015-10-27 23:43:38', 0.00, 0, 1),
(6, 'ARANDEL PRESION G8 5/8`` 3003', '', 'arandel-presion-g8-58-3003', '', 234, 23, 0, 9.00, 6.30, 0.12, 1, 1, '0000-00-00', '0000-00-00', 2, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(7, 'CADENA DE BOLITA #10 NIQUELADA', '', 'cadena-de-bolita-10-niquelada', '', 2435, 35, 0, 34.69, 24.28, 0.00, 0, 1, '0000-00-00', '0000-00-00', 2, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(8, 'ACTUADOR 2MOD BTICINO L4671/1', '', 'actuador-2mod-bticino-l46711', '', 4532, 34, 0, 5568.42, 3897.89, 0.00, 0, 1, '0000-00-00', '0000-00-00', 4, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 3),
(9, 'ACTUADOR DIN 1RELE N4614', '', 'actuador-din-1rele-n4614', '', 2345, 47, 0, 6724.09, 4706.86, 0.00, 0, 1, '0000-00-00', '0000-00-00', 4, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 3),
(10, 'CONECT.BTICIN LIVING RJ45 L427', '', 'conectbticin-living-rj45-l427', '', 2344, 35, 0, 579.38, 405.57, 0.00, 0, 1, '0000-00-00', '0000-00-00', 4, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(11, 'CONECTOR D/ALAMBRE GE 54550/18', '', 'conector-dalambre-ge-5455018', '', 234, 25, 0, 131.31, 91.92, 0.00, 0, 1, '0000-00-00', '0000-00-00', 4, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(12, 'DIMMER 127V BTICINO F414/127', '', 'dimmer-127v-bticino-f414127', '', 4345, 23, 0, 11127.23, 7789.06, 0.00, 0, 1, '0000-00-00', '0000-00-00', 4, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(13, 'ATOMIZADOR BLCO. REDO. 1000CC', '', 'atomizador-blco-redo-1000cc', '', 342, 27, 0, 127.16, 89.01, 0.00, 0, 1, '0000-00-00', '0000-00-00', 7, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(14, 'PALOS P/HELECHO NORMAL', '', 'palos-phelecho-normal', '', 345, 11, 0, 100.30, 70.21, 0.00, 0, 1, '0000-00-00', '0000-00-00', 7, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(15, 'ADAPTADOR Y P/ MANGUERA SURTEK', '', 'adaptador-y-p-manguera-surtek', '', 3452, 10, 0, 165.00, 115.50, 0.00, 0, 1, '0000-00-00', '0000-00-00', 7, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(16, 'CONECTOR P/MANGUERA DE 3/4 TAT', '', 'conector-pmanguera-de-34-tat', '', 456, 25, 0, 119.99, 83.99, 0.00, 0, 1, '0000-00-00', '0000-00-00', 7, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(17, 'CONEXION P/MANGUERA HEMBRA 1/2', '', 'conexion-pmanguera-hembra-12', '', 845, 14, 0, 78.99, 55.29, 0.00, 0, 1, '0000-00-00', '0000-00-00', 7, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(18, 'CONEXION P/MANGUERA MACHO 3/4D', '', 'conexion-pmanguera-macho-34d', '', 174, 34, 0, 47.14, 33.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 7, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(19, 'MANGUERA 20M. AZUL TATAY 99352', '', 'manguera-20m-azul-tatay-99352', '', 129, 36, 0, 1594.99, 1116.49, 0.00, 0, 1, '0000-00-00', '0000-00-00', 7, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(20, 'MANGUERA DE DESCARGUE 2  KELO', '', 'manguera-de-descargue-2-kelo', '', 564, 44, 0, 75.00, 52.50, 0.00, 0, 1, '0000-00-00', '0000-00-00', 7, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 4),
(21, 'ANILLA BRONCE 1/2 60-8 (46)', '', 'anilla-bronce-12-60-8-46', '', 2341, 50, 0, 5.90, 4.13, 0.05, 1, 1, '0000-00-00', '0000-00-00', 5, 0, '0000-00-00 00:00:00', '2015-10-27 23:43:38', 0.00, 0, 1),
(22, 'CODO C/ANILLA 1/4X1/4 136', '', 'codo-canilla-14x14-136', '', 122, 10, 0, 109.28, 76.50, 0.43, 1, 1, '0000-00-00', '0000-00-00', 5, 0, '0000-00-00 00:00:00', '2015-10-27 23:43:38', 0.00, 0, 1),
(23, 'CONECTOR C/ANILLA 3/8 - 1/4 68', '', 'conector-canilla-38-14-68', '', 34, 9, 0, 75.13, 52.59, 0.00, 0, 1, '0000-00-00', '0000-00-00', 5, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(24, 'BOTA D/TRABAJO SUELA POLIURETA', '', 'bota-dtrabajo-suela-poliureta', '', 539, 26, 0, 3940.00, 2758.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 5, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(25, 'BOTA D/TRABAJO SUELA POLIURETA', '', 'bota-dtrabajo-suela-poliureta', '', 312, 30, 0, 3940.00, 2758.00, 0.01, 1, 1, '0000-00-00', '0000-00-00', 5, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(26, 'CARTUCHO C/VAPORES Y GASES 2/1', '', 'cartucho-cvapores-y-gases-21', '', 272, 42, 0, 182.90, 128.03, 0.00, 0, 1, '0000-00-00', '0000-00-00', 5, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(27, 'CARTUCHO P/GASES ACIDOS 9-242', '', 'cartucho-pgases-acidos-9-242', '', 296, 42, 0, 179.36, 125.55, 0.00, 0, 1, '0000-00-00', '0000-00-00', 5, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(28, 'HACHA C/CABO AMES 1188700 /111', '', 'hacha-ccabo-ames-1188700-111', '', 96, 25, 0, 1440.49, 1008.34, 0.00, 0, 1, '0000-00-00', '0000-00-00', 5, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(29, 'HACHA C/MANGO 3.5LBS LE3.5M', '', 'hacha-cmango-35lbs-le35m', '', 361, 3, 0, 672.60, 470.82, 0.00, 0, 1, '0000-00-00', '0000-00-00', 5, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 2),
(30, 'CAJ MULT. C/RUEDA ROJ/NAR11503', '', 'caj-mult-crueda-rojnar11503', '', 696, 16, 0, 1474.00, 1031.80, 0.00, 0, 1, '0000-00-00', '0000-00-00', 5, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 2),
(31, 'ESC.P/ALM.C/RUEDA 4`570-04', '', 'escpalmcrueda-4570-04', '', 32, 5, 0, 12390.00, 8673.00, 0.21, 1, 1, '0000-00-00', '0000-00-00', 5, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 2),
(32, 'RUEDA P/CARRETILLA NEUM TRAMON', '', 'rueda-pcarretilla-neum-tramon', '', 342, 30, 0, 666.02, 466.21, 0.10, 1, 1, '0000-00-00', '0000-00-00', 5, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(33, 'RUEDA T/EG 80 GIRAT 34-090/2 5', '', 'rueda-teg-80-girat-34-0902-5', '', 4234, 1234, 0, 252.15, 176.50, 0.09, 1, 1, '0000-00-00', '0000-00-00', 5, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(34, 'FORMON ST. 1-1/2 6416-118', '', 'formon-st-1-12-6416-118', '', 172, 44, 0, 309.03, 216.32, 0.00, 0, 1, '0000-00-00', '0000-00-00', 5, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 2),
(35, 'FORMON ST. 1/2 6416-107', '', 'formon-st-12-6416-107', '', 322, 33, 0, 228.11, 159.68, 0.00, 0, 1, '0000-00-00', '0000-00-00', 5, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 2),
(36, 'FORMON TACTIX 3/4 225021', '', 'formon-tactix-34-225021', '', 499, 37, 0, 222.58, 155.81, 0.00, 0, 1, '0000-00-00', '0000-00-00', 5, 0, '0000-00-00 00:00:00', '2015-10-27 23:43:38', 0.00, 0, 2),
(37, 'FORMON TACTIX 7/8 225023', '', 'formon-tactix-78-225023', '', 112, 12, 0, 232.50, 162.75, 0.00, 0, 1, '0000-00-00', '0000-00-00', 5, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 2),
(38, 'SET DE FORMON TACTIX 225053', '', 'set-de-formon-tactix-225053', '', 87, 50, 0, 627.47, 439.23, 0.00, 0, 1, '0000-00-00', '0000-00-00', 5, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 4),
(39, 'ALICATE 8.5`` 200113 TACTIX', '', 'alicate-85-200113-tactix', '', 12, 4, 0, 246.62, 172.63, 0.11, 1, 1, '0000-00-00', '0000-00-00', 5, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 4),
(40, 'ALICATE ARTICULADO 10`` 200163', '', 'alicate-articulado-10-200163', '', 34, 10, 0, 246.95, 172.87, 0.13, 1, 1, '0000-00-00', '0000-00-00', 5, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 4),
(41, 'ALICATE ARTICULADO 10`` ST. 84', '', 'alicate-articulado-10-st-84', '', 1312, 500, 0, 414.99, 290.49, 0.17, 1, 1, '0000-00-00', '0000-00-00', 5, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 4),
(42, 'ALICATE ARTICULADO 12`` 200165', '', 'alicate-articulado-12-200165', '', 223, 38, 0, 315.00, 220.50, 0.00, 0, 1, '0000-00-00', '0000-00-00', 5, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(43, 'ALICATE DE ACENDADO (951B) 84-', '', 'alicate-de-acendado-951b-84', '', 94, 41, 0, 519.33, 363.53, 0.00, 0, 1, '0000-00-00', '0000-00-00', 5, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(44, 'ALICATE DE COMBINACION 6`` 207', '', 'alicate-de-combinacion-6-207', '', 3423, 600, 0, 217.12, 151.98, 0.20, 1, 1, '0000-00-00', '0000-00-00', 5, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(45, 'ALICATE DE PRESION 7`` 200553', '', 'alicate-de-presion-7-200553', '', 110, 40, 0, 244.65, 171.25, 0.00, 0, 1, '0000-00-00', '0000-00-00', 5, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(46, 'ALICATE DE PRESION 7`` 200563', '', 'alicate-de-presion-7-200563', '', 123, 30, 0, 234.77, 164.34, 0.14, 1, 1, '0000-00-00', '0000-00-00', 5, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(47, 'ADAPTADOR HEMBRA 1/2X12 BRONCE', '', 'adaptador-hembra-12x12-bronce', '', 4, 1, 0, 86.14, 60.30, 0.14, 1, 1, '0000-00-00', '0000-00-00', 9, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(48, 'ADAPTADOR HEMBRA 1/2`` PRESION', '', 'adaptador-hembra-12-presion', '', 264, 24, 0, 4.53, 3.17, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(49, 'ADAPTADOR HEMBRA 11/2X50MM P/P', '', 'adaptador-hembra-112x50mm-pp', '', 132, 13, 0, 193.69, 135.58, 0.04, 1, 1, '0000-00-00', '0000-00-00', 9, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(50, 'ADAPTADOR HEMBRA 2`` PRESION P', '', 'adaptador-hembra-2-presion-p', '', 123, 12, 0, 23.88, 16.72, 0.05, 1, 1, '0000-00-00', '0000-00-00', 9, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 2),
(51, 'ADAPTADOR HEMBRA 3/4X20 PPR*', '', 'adaptador-hembra-34x20-ppr', '', 586, 19, 0, 411.82, 288.27, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(52, 'ADAPTADOR HEMBRA 3/4X25 PPR', '', 'adaptador-hembra-34x25-ppr', '', 487, 27, 0, 171.10, 119.77, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(53, 'ADAPTADOR HEMBRA 3/4X32 PPR', '', 'adaptador-hembra-34x32-ppr', '', 43, 10, 0, 189.98, 132.99, 0.06, 1, 1, '0000-00-00', '0000-00-00', 9, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(54, 'ADAPTADOR HEMBRA 3/4`` PRESION', '', 'adaptador-hembra-34-presion', '', 31234, 1000, 0, 6.07, 4.25, 0.56, 1, 1, '0000-00-00', '0000-00-00', 9, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 3),
(55, 'ADAPTADOR HEMBRA 3/8 12MM REF.', '', 'adaptador-hembra-38-12mm-ref', '', 89, 49, 0, 95.58, 66.91, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 3),
(56, 'ADAPTADOR HEMBRA 32MM P/POLIET', '', 'adaptador-hembra-32mm-ppoliet', '', 409, 21, 0, 95.91, 67.14, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 4),
(57, 'ADAPTADOR HEMBRA 3`` PRESION P', '', 'adaptador-hembra-3-presion-p', '', 12, 4, 0, 49.90, 34.93, 0.03, 1, 1, '0000-00-00', '0000-00-00', 9, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(58, 'ADAPTADOR HEMBRA 4`` PRESION P', '', 'adaptador-hembra-4-presion-p', '', 662, 19, 0, 76.79, 53.75, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(59, 'ADAPTADOR HEMBRA 8`` PVC', '', 'adaptador-hembra-8-pvc', '', 669, 13, 0, 2607.80, 1825.46, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(60, 'ADAPTADOR HEMBRA CPVC 1', '', 'adaptador-hembra-cpvc-1', '', 154, 40, 0, 42.00, 29.40, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 2),
(61, 'ADAPTADOR HEMBRA CPVC 1/2', '', 'adaptador-hembra-cpvc-12', '', 18, 3, 0, 19.54, 13.68, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(62, 'ARANDELA PVC 4X3 PAVCO', '', 'arandela-pvc-4x3-pavco', '', 659, 31, 0, 48.03, 33.62, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(63, 'ARANDELA 4``X3`` P9005 INCA', '', 'arandela-4x3-p9005-inca', '', 23, 7, 0, 61.36, 42.95, 0.02, 1, 1, '0000-00-00', '0000-00-00', 9, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(64, 'ARANDELA 4``X4`` P9006 INCA', '', 'arandela-4x4-p9006-inca', '', 515, 28, 0, 55.46, 38.82, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(65, 'ARANDELA PVC DRENAJE 4X3', '', 'arandela-pvc-drenaje-4x3', '', 492, 41, 0, 51.92, 36.34, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(66, 'ARANDELA PVC DRENAJE 4X4', '', 'arandela-pvc-drenaje-4x4', '', 201, 15, 0, 48.38, 33.87, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 4),
(67, 'ARANDELA RESBALON 4X3 P/INODOR', '', 'arandela-resbalon-4x3-pinodor', '', 436, 8, 0, 710.36, 497.25, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 4),
(68, 'BAJANTE CENTR OVATION 105X76 ', '', 'bajante-centr-ovation-105x76', '', 241, 10, 0, 1263.78, 884.65, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 4),
(69, 'BAJANTE CENTRO 56X90 28 COBRE', '', 'bajante-centro-56x90-28-cobre', '', 23, 7, 0, 732.78, 512.95, 0.23, 1, 1, '0000-00-00', '0000-00-00', 9, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 4),
(70, 'BAJANTE CENTRO 56X90 NAD289M', '', 'bajante-centro-56x90-nad289m', '', 486, 8, 0, 614.78, 430.35, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 4),
(71, 'BAJANTE CENTRO CREMA UNAD289S', '', 'bajante-centro-crema-unad289s', '', 390, 15, 0, 695.02, 486.51, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 4),
(72, 'BAJANTE CENTRO DILAT. 38 ARENA', '', 'bajante-centro-dilat-38-arena', '', 26, 38, 0, 1261.42, 882.99, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(73, 'BAJANTE CENTRO UNAD289B', '', 'bajante-centro-unad289b', '', 176, 42, 0, 695.02, 486.51, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 2),
(74, 'CODO BAJANTE 28 COBRE 45G 56X9', '', 'codo-bajante-28-cobre-45g-56x9', '', 564, 21, 0, 400.02, 280.01, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 2),
(75, 'CODO BAJANTE 28 COBRE 67` 90X5', '', 'codo-bajante-28-cobre-67-90x5', '', 14234, 2034, 0, 364.62, 255.23, 0.12, 1, 1, '0000-00-00', '0000-00-00', 9, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(76, 'CODO BAJANTE 28 COBRE 87` 56X9', '', 'codo-bajante-28-cobre-87-56x9', '', 495, 41, 0, 477.31, 334.12, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 2),
(77, 'CODO BAJANTE 28 COBRE 90` 56X9', '', 'codo-bajante-28-cobre-90-56x9', '', 288, 2, 0, 447.22, 313.05, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 3),
(78, 'CODO BAJANTE 28 MH 87`30 56X90', '', 'codo-bajante-28-mh-8730-56x90', '', 254, 31, 0, 352.23, 246.56, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 4),
(79, 'CODO BAJANTE 28 MH 90` 56X90 U', '', 'codo-bajante-28-mh-90-56x90-u', '', 34, 8, 0, 468.46, 327.92, 0.34, 1, 1, '0000-00-00', '0000-00-00', 9, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 2),
(80, 'CODO BAJANTE 38 ARENA M/H 15`', '', 'codo-bajante-38-arena-mh-15', '', 321, 45, 0, 482.62, 337.83, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(81, 'CODO BAJANTE 38 ARENA M/H 67`', '', 'codo-bajante-38-arena-mh-67', '', 392, 49, 0, 482.62, 337.83, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(82, 'CODO BAJANTE 38 ARENA M/H 87`', '', 'codo-bajante-38-arena-mh-87', '', 516, 16, 0, 505.04, 353.53, 0.00, 0, 1, '0000-00-00', '0000-00-00', 9, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(83, 'ACONDICIONADOR D/LEATHER ZYMOL', '', 'acondicionador-dleather-zymol', '', 335, 22, 0, 558.90, 391.23, 0.00, 0, 1, '0000-00-00', '0000-00-00', 1, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 2),
(84, 'ACONDICIONADOR P/TRANSM LUBRIS', '', 'acondicionador-ptransm-lubris', '', 155, 42, 0, 191.24, 133.87, 0.00, 0, 1, '0000-00-00', '0000-00-00', 1, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(85, 'BICICLET PROFORM WHIRLWIND 320', '', 'biciclet-proform-whirlwind-320', '', 1234, 230, 0, 26990.00, 18893.00, 0.02, 1, 1, '0000-00-00', '0000-00-00', 3, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(86, 'BICICLET WESL 9766 PERSUIT 2.2', '', 'biciclet-wesl-9766-persuit-22', '', 177, 39, 0, 18290.00, 12803.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 3, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 2),
(87, 'BOLA CUP D/PING PONG BLCO. STI', '', 'bola-cup-dping-pong-blco-sti', '', 408, 33, 0, 125.00, 87.50, 0.00, 0, 1, '0000-00-00', '0000-00-00', 3, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 3),
(88, 'PELOTA D/VOLLEYBALL PLAYA #5', '', 'pelota-dvolleyball-playa-5', '', 599, 46, 0, 1275.00, 892.50, 0.00, 0, 1, '0000-00-00', '0000-00-00', 3, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 4),
(89, 'PELOTA D/BKB CAUCHO #7 ORANGE', '', 'pelota-dbkb-caucho-7-orange', '', 382, 34, 0, 975.00, 682.50, 0.00, 0, 1, '0000-00-00', '0000-00-00', 3, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(90, 'BOMBA D/AIRE 2000012142/200001', '', 'bomba-daire-2000012142200001', '', 39, 6, 0, 875.01, 612.51, 0.00, 0, 1, '0000-00-00', '0000-00-00', 3, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 2),
(91, 'LAMPARA P/CAMP 12L LED DX155-2', '', 'lampara-pcamp-12l-led-dx155-2', '', 41, 10, 0, 325.00, 227.50, 0.22, 1, 1, '0000-00-00', '0000-00-00', 3, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(92, 'BASE ESCURRIDORA BLANCO 1S03 R', '', 'base-escurridora-blanco-1s03-r', '', 562, 8, 0, 360.01, 252.01, 0.00, 0, 1, '0000-00-00', '0000-00-00', 6, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(93, 'BASE ESCURRIDORA CLEAR 1S03 RU', '', 'base-escurridora-clear-1s03-ru', '', 69, 2, 0, 340.01, 238.01, 0.00, 0, 1, '0000-00-00', '0000-00-00', 6, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(94, 'JGO. DTAZONES C/BASE 3PZS. POR', '', 'jgo-dtazones-cbase-3pzs-por', '', 69, 15, 0, 665.00, 465.50, 0.00, 0, 1, '0000-00-00', '0000-00-00', 6, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(95, 'PLATO BASE 30CM JX33A001-4 FAN', '', 'plato-base-30cm-jx33a001-4-fan', '', 676, 45, 0, 635.01, 444.51, 0.00, 0, 1, '0000-00-00', '0000-00-00', 6, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(96, 'PLATO BASE 30X30CM PR S94 9406', '', 'plato-base-30x30cm-pr-s94-9406', '', 475, 33, 0, 1035.00, 724.50, 0.00, 0, 1, '0000-00-00', '0000-00-00', 6, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 2),
(97, 'PLATO BASE 31CM AZ SAPHIR 6.62', '', 'plato-base-31cm-az-saphir-662', '', 451, 5, 0, 395.01, 276.51, 0.00, 0, 1, '0000-00-00', '0000-00-00', 6, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 2),
(98, 'PLATO BASE 31CM AZUL 4.50010-5', '', 'plato-base-31cm-azul-450010-5', '', 34634, 200, 0, 780.00, 546.00, 0.23, 1, 1, '0000-00-00', '0000-00-00', 6, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1),
(99, 'PLATO BASE 31CM PATRA 161081 S', '', 'plato-base-31cm-patra-161081-s', '', 537, 39, 0, 760.00, 532.00, 0.00, 0, 1, '0000-00-00', '0000-00-00', 6, 0, '0000-00-00 00:00:00', '2015-09-28 20:14:31', 0.00, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_categories`
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `products_categories`
--

INSERT INTO `products_categories` (`id`, `name`, `description`, `slug`, `parent_d`, `available`, `created_at`, `updated_at`) VALUES
(1, 'Auto Adornos', 'Molestiae unde nobis qui nulla laudantium dolores. Nihil et vitae necessitatibus debitis incidunt aspernatur. Minus laudantium dignissimos atque iure id debitis. Ut dolor eius fuga.', 'auto-adornos', 0, 1, '2015-09-25 21:32:45', '2015-09-25 21:32:45'),
(2, 'Cerrajería', 'Voluptate recusandae quibusdam qui qui est eos. Unde et iste ad harum. Quibusdam quo beatae quo saepe repudiandae doloribus id sunt. Et accusamus rem qui ipsa sit et asperiores. Aut similique optio esse numquam labore non facere aperiam.', 'cerrajeria', 0, 1, '2015-09-25 21:32:45', '2015-09-25 21:32:45'),
(3, 'Deporte', 'Aperiam repudiandae officiis ab sequi non. Ut dolores illum libero deserunt. Voluptate ab eveniet tenetur et vel aut minima cupiditate. Vel sunt et neque voluptatem. Minima possimus ut tempore est molestiae esse illum.', 'deporte-2', 0, 0, '2015-09-25 21:32:45', '2015-10-05 00:36:24'),
(4, 'Eléctricos', 'Voluptas quis consequatur autem perferendis laboriosam rerum. Et rem officia quasi sit. Ea dolores aperiam voluptate nostrum veniam labore exercitationem.', 'electricos', 0, 1, '2015-09-25 21:32:45', '2015-09-25 21:32:45'),
(5, 'Herramientas', 'Nam non aliquam nihil non. Vel hic in officia aut distinctio tempora. Asperiores sequi harum odit nihil eligendi perferendis voluptatem. Placeat et ab molestias nisi.', 'herramientas', 0, 1, '2015-09-25 21:32:45', '2015-09-25 21:32:45'),
(6, 'Hogar', 'Tenetur accusantium autem cumque magni. Sint unde repudiandae qui velit nesciunt. Aspernatur autem omnis dolorum vel labore quod et. Molestiae ut culpa quia voluptatem magni fuga. Quidem ut doloribus dolorem ut nisi.', 'hogar', 0, 1, '2015-09-25 21:32:45', '2015-09-25 21:32:45'),
(7, 'Jardinería', 'Nesciunt tempora cum saepe. Non quis reiciendis voluptas quidem. Et modi ipsam iusto molestiae voluptatibus non eum. Atque eum et molestias itaque nisi enim eaque.', 'jardineria', 0, 1, '2015-09-25 21:32:45', '2015-09-25 21:32:45'),
(8, 'Maquinarias', 'Provident quibusdam voluptate est occaecati eveniet odit aperiam. Et voluptas ipsa nobis vel illum eaque repudiandae. Dolorem quasi aut debitis pariatur at architecto. Nobis sed vel sint et ad quaerat.', 'maquinarias', 0, 1, '2015-09-25 21:32:45', '2015-09-25 21:32:45'),
(9, 'Plomeria', 'Consequatur cumque et ratione placeat. Sunt facilis quisquam officiis distinctio ut natus possimus. Ut ipsa cumque cum magni illo adipisci iusto. Ab eum beatae distinctio voluptatem non dicta.', 'plomeria', 0, 1, '2015-09-25 21:32:45', '2015-09-25 21:32:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_logs`
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
-- Estructura de tabla para la tabla `supplyers`
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `supplyers`
--

INSERT INTO `supplyers` (`id`, `name`, `contact_name`, `phone`, `description`, `rnc`, `available`, `created_at`, `updated_at`) VALUES
(1, 'Sin Suplidor', '', '', '', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Tricom', 'Juan Rozon', '674311249', 'asdasdasd', '112233', 1, '2015-10-05 03:40:46', '2015-10-05 03:40:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `type`, `remember_token`, `created_at`, `updated_at`, `location_id`) VALUES
(1, 'Admin Awesome', 'admin@awesomemedia.do', '$2y$10$0kU2f3EczMdrN2XpWJJr9OjZOoNU1eD6YLip8X1c6S9B1EzrnLgme', 'superadmin', 'RAYe2lsgwIMLFPsIS6UvEwiL4VuycuBg3bUl47PYyCB3M4rE9S9jMJZ2BtwR', '2015-08-30 00:08:13', '2015-09-22 20:14:14', 1),
(2, 'Lali Morales', 'lalicomplemento@hotmail.com', '$2y$10$cisep031OaxSMGoKMH7.8.R8cdJtZq/l6x/mnvD2ymkgiLbU04pr6', 'admin', 'pE6ORfIDw0UvcFXtWxnwQF6OUsyEVY7vKEZOclSndr0TAKOLby4Jg4mbFzJ2', '2015-08-30 00:08:14', '2015-09-20 19:04:39', 1),
(5, 'Ms. Ethyl McLaughlin V', 'kirstin.bogisich@greenholt.biz', '$2y$10$9S83NttcZ3Gux8kTSmLM1uo.tAinTicJ/3ZY66wW3zeyuxUXm5kni', 'employer', NULL, '2015-08-30 00:08:15', '2015-08-30 00:08:15', 3),
(9, 'Dejuan Dibbert', 'garrick.kuvalis@yahoo.com', '$2y$10$/G19fSbxGikgm09I3KxRyuMFL80ltcnsPJcPflehcbE7RRjnMuJgK', 'employer', NULL, '2015-08-30 00:08:18', '2015-08-30 00:08:18', 3),
(22, 'Romny Cristopher', 'romny@awesomemedia.do', '$2y$10$KYNKkQk7dblRNox2Q1j7L.C8JC3eWzQI7B6kCsxCbUGFFwW5US4jO', 'cashier', NULL, '2015-09-22 19:56:22', '2015-09-22 19:56:22', 3),
(24, 'Edmundo Pichardo', 'ce.pichardo@gmail.com', '$2y$10$3m5tzN.zMK8IUGPwwF40V..SGE/RMWbTD/Atd0tqnZTt5cyz0u3UO', 'admin', NULL, '2015-09-22 20:13:44', '2015-09-22 20:13:45', 2),
(25, 'Juan Rozon', 'jrozon@gmail.com', '$2y$10$DZA0aoMoFW6jUjn4gNNzZeIe.ljHuZnYN1kZkD/vZ3tmpCTvuYO/m', 'admin', NULL, '2015-10-27 23:32:56', '2015-10-27 23:32:56', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `candidates`
--
ALTER TABLE `candidates`
 ADD PRIMARY KEY (`id`), ADD KEY `candidates_category_id_foreign` (`category_id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configurations`
--
ALTER TABLE `configurations`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `configurations_alias_unique` (`alias`);

--
-- Indices de la tabla `invoices`
--
ALTER TABLE `invoices`
 ADD PRIMARY KEY (`id`), ADD KEY `invoices_order_id_foreign` (`order_id`);

--
-- Indices de la tabla `invoices_details`
--
ALTER TABLE `invoices_details`
 ADD PRIMARY KEY (`id`), ADD KEY `invoices_details_invoice_id_foreign` (`invoice_id`), ADD KEY `invoices_details_product_id_foreign` (`product_id`);

--
-- Indices de la tabla `invoices_payments`
--
ALTER TABLE `invoices_payments`
 ADD PRIMARY KEY (`id`), ADD KEY `invoices_payments_invoice_id_foreign` (`invoice_id`);

--
-- Indices de la tabla `itbis`
--
ALTER TABLE `itbis`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `locations`
--
ALTER TABLE `locations`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ncf`
--
ALTER TABLE `ncf`
 ADD PRIMARY KEY (`id`), ADD KEY `ncf_location_id_foreign` (`location_id`);

--
-- Indices de la tabla `ncf_sequencies`
--
ALTER TABLE `ncf_sequencies`
 ADD PRIMARY KEY (`id`), ADD KEY `ncf_sequencies_ncf_id_foreign` (`ncf_id`);

--
-- Indices de la tabla `ncf_types`
--
ALTER TABLE `ncf_types`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`id`), ADD KEY `orders_user_id_foreign` (`user_id`), ADD KEY `orders_client_id_foreign` (`client_id`), ADD KEY `orders_supplyer_id_foreign` (`supplyer_id`);

--
-- Indices de la tabla `orders_credits`
--
ALTER TABLE `orders_credits`
 ADD PRIMARY KEY (`id`), ADD KEY `orders_credits_order_id_foreign` (`order_id`);

--
-- Indices de la tabla `orders_details`
--
ALTER TABLE `orders_details`
 ADD PRIMARY KEY (`id`), ADD KEY `orders_details_order_id_foreign` (`order_id`);

--
-- Indices de la tabla `orders_status`
--
ALTER TABLE `orders_status`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reminders`
--
ALTER TABLE `password_reminders`
 ADD KEY `password_reminders_email_index` (`email`), ADD KEY `password_reminders_token_index` (`token`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`), ADD KEY `products_user_id_foreign` (`user_id`), ADD KEY `products_category_id_foreign` (`category_id`), ADD KEY `products_itbis_id_foreign` (`itbis_id`);

--
-- Indices de la tabla `products_categories`
--
ALTER TABLE `products_categories`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products_logs`
--
ALTER TABLE `products_logs`
 ADD PRIMARY KEY (`id`), ADD KEY `products_logs_user_id_foreign` (`user_id`), ADD KEY `products_logs_product_id_foreign` (`product_id`);

--
-- Indices de la tabla `supplyers`
--
ALTER TABLE `supplyers`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD KEY `users_location_id_foreign` (`location_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `candidates`
--
ALTER TABLE `candidates`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `configurations`
--
ALTER TABLE `configurations`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `invoices`
--
ALTER TABLE `invoices`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `invoices_details`
--
ALTER TABLE `invoices_details`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `invoices_payments`
--
ALTER TABLE `invoices_payments`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `itbis`
--
ALTER TABLE `itbis`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `locations`
--
ALTER TABLE `locations`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `ncf`
--
ALTER TABLE `ncf`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `ncf_sequencies`
--
ALTER TABLE `ncf_sequencies`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT de la tabla `ncf_types`
--
ALTER TABLE `ncf_types`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `orders_credits`
--
ALTER TABLE `orders_credits`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `orders_details`
--
ALTER TABLE `orders_details`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `orders_status`
--
ALTER TABLE `orders_status`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT de la tabla `products_categories`
--
ALTER TABLE `products_categories`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `products_logs`
--
ALTER TABLE `products_logs`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `supplyers`
--
ALTER TABLE `supplyers`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `candidates`
--
ALTER TABLE `candidates`
ADD CONSTRAINT `candidates_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
ADD CONSTRAINT `candidates_id_foreign` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `invoices`
--
ALTER TABLE `invoices`
ADD CONSTRAINT `invoices_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Filtros para la tabla `invoices_details`
--
ALTER TABLE `invoices_details`
ADD CONSTRAINT `invoices_details_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`),
ADD CONSTRAINT `invoices_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Filtros para la tabla `invoices_payments`
--
ALTER TABLE `invoices_payments`
ADD CONSTRAINT `invoices_payments_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`);

--
-- Filtros para la tabla `ncf`
--
ALTER TABLE `ncf`
ADD CONSTRAINT `ncf_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`);

--
-- Filtros para la tabla `ncf_sequencies`
--
ALTER TABLE `ncf_sequencies`
ADD CONSTRAINT `ncf_sequencies_ncf_id_foreign` FOREIGN KEY (`ncf_id`) REFERENCES `ncf` (`id`);

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
ADD CONSTRAINT `orders_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
ADD CONSTRAINT `orders_supplyer_id_foreign` FOREIGN KEY (`supplyer_id`) REFERENCES `supplyers` (`id`),
ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `orders_credits`
--
ALTER TABLE `orders_credits`
ADD CONSTRAINT `orders_credits_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Filtros para la tabla `orders_details`
--
ALTER TABLE `orders_details`
ADD CONSTRAINT `orders_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `products_categories` (`id`),
ADD CONSTRAINT `products_itbis_id_foreign` FOREIGN KEY (`itbis_id`) REFERENCES `itbis` (`id`),
ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `products_logs`
--
ALTER TABLE `products_logs`
ADD CONSTRAINT `products_logs_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
ADD CONSTRAINT `products_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `users_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`);
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
