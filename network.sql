-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2023 at 06:40 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testnet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_securities`
--

CREATE TABLE `admin_securities` (
  `id` bigint(20) NOT NULL,
  `admin_id` bigint(20) DEFAULT NULL,
  `google2fa_enable` varchar(32) DEFAULT NULL,
  `google2fa_secret` varchar(32) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advertisers`
--

CREATE TABLE `advertisers` (
  `id` bigint(20) NOT NULL,
  `advertiser_name` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `company_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `hereby` varchar(50) DEFAULT NULL,
  `advertiser_image` varchar(255) DEFAULT NULL,
  `param1` varchar(255) DEFAULT NULL,
  `param2` varchar(255) DEFAULT NULL,
  `status` varchar(32) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `advertisers`
--

INSERT INTO `advertisers` (`id`, `advertiser_name`, `password`, `company_name`, `email`, `hereby`, `advertiser_image`, `param1`, `param2`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Advertiser', '$2y$10$l/WX8N1/qdoAYD2eAH0Cverhs.aF/7J/A1XWD24JY13tvBNbu/kXS', NULL, 'advertiser@mail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `affliates`
--

CREATE TABLE `affliates` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `skype` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `payment_description` text DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `power_mode` varchar(50) DEFAULT NULL,
  `balance` double(8,2) DEFAULT NULL,
  `total_earnings` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `affliates`
--

INSERT INTO `affliates` (`id`, `name`, `password`, `email`, `skype`, `status`, `address`, `photo`, `payment_description`, `payment_method`, `power_mode`, `balance`, `total_earnings`, `created_at`, `updated_at`) VALUES
(1, 'Mr. Manager', '$2y$10$tzmARUDJ23X.lmw0UbjkruXYcrGPafd2m6sUY6lI/5UBdHM3.pkaS', 'manager@mail.com', NULL, 'active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `affliate_securities`
--

CREATE TABLE `affliate_securities` (
  `id` bigint(20) NOT NULL,
  `affliate_id` bigint(20) DEFAULT NULL,
  `google2fa_enable` varchar(50) DEFAULT NULL,
  `google2fa_secret` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `affliate_securities`
--

INSERT INTO `affliate_securities` (`id`, `affliate_id`, `google2fa_enable`, `google2fa_secret`, `created_at`, `updated_at`) VALUES
(1, 1, '0', 'S6AJWIOI5MSYJ7OC', '2023-03-27 07:14:08', '2023-03-27 07:14:08');

-- --------------------------------------------------------

--
-- Table structure for table `affliate_transactions`
--

CREATE TABLE `affliate_transactions` (
  `id` bigint(20) NOT NULL,
  `offer_process_id` bigint(20) DEFAULT NULL,
  `affliate_id` bigint(20) DEFAULT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `affliate_withdraw`
--

CREATE TABLE `affliate_withdraw` (
  `id` bigint(20) NOT NULL,
  `affliate_id` bigint(20) DEFAULT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `payterm` varchar(255) DEFAULT NULL,
  `method` varchar(32) DEFAULT NULL,
  `status` varchar(32) DEFAULT NULL,
  `payment_details` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `approval_request`
--

CREATE TABLE `approval_request` (
  `id` bigint(20) NOT NULL,
  `offer_id` bigint(20) DEFAULT NULL,
  `publisher_id` bigint(20) DEFAULT NULL,
  `approval_status` varchar(50) NOT NULL DEFAULT 'Requested',
  `description` text DEFAULT NULL,
  `terms` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ban_ip`
--

CREATE TABLE `ban_ip` (
  `id` bigint(20) NOT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_img` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `popularity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cashout_request`
--

CREATE TABLE `cashout_request` (
  `id` bigint(20) NOT NULL,
  `affliate_id` bigint(20) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `payterm` varchar(50) DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `payment_details` text DEFAULT NULL,
  `method` varchar(50) DEFAULT NULL,
  `status` varchar(32) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) NOT NULL,
  `category_name` varchar(32) DEFAULT NULL,
  `is_deleted` varchar(50) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` tinyint(4) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_active` char(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_name` varchar(100) NOT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name`, `phonecode`) VALUES
(1, 'Afghanistan', 93),
(2, 'Aland Islands', 358),
(3, 'Albania', 355),
(4, 'Algeria', 213),
(5, 'American Samoa', 1684),
(6, 'Andorra', 376),
(7, 'Angola', 244),
(8, 'Anguilla', 1264),
(9, 'Antarctica', 672),
(10, 'Antigua and Barbuda', 1268),
(11, 'Argentina', 54),
(12, 'Armenia', 374),
(13, 'Aruba', 297),
(14, 'Australia', 61),
(15, 'Austria', 43),
(16, 'Azerbaijan', 994),
(17, 'Bahamas', 1242),
(18, 'Bahrain', 973),
(19, 'Bangladesh', 880),
(20, 'Barbados', 1246),
(21, 'Belarus', 375),
(22, 'Belgium', 32),
(23, 'Belize', 501),
(24, 'Benin', 229),
(25, 'Bermuda', 1441),
(26, 'Bhutan', 975),
(27, 'Bolivia', 591),
(28, 'Bonaire, Sint Eustatius and Saba', 599),
(29, 'Bosnia and Herzegovina', 387),
(30, 'Botswana', 267),
(31, 'Bouvet Island', 55),
(32, 'Brazil', 55),
(33, 'British Indian Ocean Territory', 246),
(34, 'Brunei Darussalam', 673),
(35, 'Bulgaria', 359),
(36, 'Burkina Faso', 226),
(37, 'Burundi', 257),
(38, 'Cambodia', 855),
(39, 'Cameroon', 237),
(40, 'Canada', 1),
(41, 'Cape Verde', 238),
(42, 'Cayman Islands', 1345),
(43, 'Central African Republic', 236),
(44, 'Chad', 235),
(45, 'Chile', 56),
(46, 'China', 86),
(47, 'Christmas Island', 61),
(48, 'Cocos (Keeling) Islands', 672),
(49, 'Colombia', 57),
(50, 'Comoros', 269),
(51, 'Congo', 242),
(52, 'Congo, Democratic Republic of the Congo', 242),
(53, 'Cook Islands', 682),
(54, 'Costa Rica', 506),
(55, 'Cote D\'Ivoire', 225),
(56, 'Croatia', 385),
(57, 'Cuba', 53),
(58, 'Curacao', 599),
(59, 'Cyprus', 357),
(60, 'Czech Republic', 420),
(61, 'Denmark', 45),
(62, 'Djibouti', 253),
(63, 'Dominica', 1767),
(64, 'Dominican Republic', 1809),
(65, 'Ecuador', 593),
(66, 'Egypt', 20),
(67, 'El Salvador', 503),
(68, 'Equatorial Guinea', 240),
(69, 'Eritrea', 291),
(70, 'Estonia', 372),
(71, 'Ethiopia', 251),
(72, 'Falkland Islands (Malvinas)', 500),
(73, 'Faroe Islands', 298),
(74, 'Fiji', 679),
(75, 'Finland', 358),
(76, 'France', 33),
(77, 'French Guiana', 594),
(78, 'French Polynesia', 689),
(79, 'French Southern Territories', 262),
(80, 'Gabon', 241),
(81, 'Gambia', 220),
(82, 'Georgia', 995),
(83, 'Germany', 49),
(84, 'Ghana', 233),
(85, 'Gibraltar', 350),
(86, 'Greece', 30),
(87, 'Greenland', 299),
(88, 'Grenada', 1473),
(89, 'Guadeloupe', 590),
(90, 'Guam', 1671),
(91, 'Guatemala', 502),
(92, 'Guernsey', 44),
(93, 'Guinea', 224),
(94, 'Guinea-Bissau', 245),
(95, 'Guyana', 592),
(96, 'Haiti', 509),
(97, 'Heard Island and Mcdonald Islands', 0),
(98, 'Holy See (Vatican City State)', 39),
(99, 'Honduras', 504),
(100, 'Hong Kong', 852),
(101, 'Hungary', 36),
(102, 'Iceland', 354),
(103, 'India', 91),
(104, 'Indonesia', 62),
(105, 'Iran, Islamic Republic of', 98),
(106, 'Iraq', 964),
(107, 'Ireland', 353),
(108, 'Isle of Man', 44),
(109, 'Israel', 972),
(110, 'Italy', 39),
(111, 'Jamaica', 1876),
(112, 'Japan', 81),
(113, 'Jersey', 44),
(114, 'Jordan', 962),
(115, 'Kazakhstan', 7),
(116, 'Kenya', 254),
(117, 'Kiribati', 686),
(118, 'Korea, Democratic People\'s Republic of', 850),
(119, 'Korea, Republic of', 82),
(120, 'Kosovo', 381),
(121, 'Kuwait', 965),
(122, 'Kyrgyzstan', 996),
(123, 'Lao People\'s Democratic Republic', 856),
(124, 'Latvia', 371),
(125, 'Lebanon', 961),
(126, 'Lesotho', 266),
(127, 'Liberia', 231),
(128, 'Libyan Arab Jamahiriya', 218),
(129, 'Liechtenstein', 423),
(130, 'Lithuania', 370),
(131, 'Luxembourg', 352),
(132, 'Macao', 853),
(133, 'Macedonia, the Former Yugoslav Republic of', 389),
(134, 'Madagascar', 261),
(135, 'Malawi', 265),
(136, 'Malaysia', 60),
(137, 'Maldives', 960),
(138, 'Mali', 223),
(139, 'Malta', 356),
(140, 'Marshall Islands', 692),
(141, 'Martinique', 596),
(142, 'Mauritania', 222),
(143, 'Mauritius', 230),
(144, 'Mayotte', 262),
(145, 'Mexico', 52),
(146, 'Micronesia, Federated States of', 691),
(147, 'Moldova, Republic of', 373),
(148, 'Monaco', 377),
(149, 'Mongolia', 976),
(150, 'Montenegro', 382),
(151, 'Montserrat', 1664),
(152, 'Morocco', 212),
(153, 'Mozambique', 258),
(154, 'Myanmar', 95),
(155, 'Namibia', 264),
(156, 'Nauru', 674),
(157, 'Nepal', 977),
(158, 'Netherlands', 31),
(159, 'Netherlands Antilles', 599),
(160, 'New Caledonia', 687),
(161, 'New Zealand', 64),
(162, 'Nicaragua', 505),
(163, 'Niger', 227),
(164, 'Nigeria', 234),
(165, 'Niue', 683),
(166, 'Norfolk Island', 672),
(167, 'Northern Mariana Islands', 1670),
(168, 'Norway', 47),
(169, 'Oman', 968),
(170, 'Pakistan', 92),
(171, 'Palau', 680),
(172, 'Palestinian Territory, Occupied', 970),
(173, 'Panama', 507),
(174, 'Papua New Guinea', 675),
(175, 'Paraguay', 595),
(176, 'Peru', 51),
(177, 'Philippines', 63),
(178, 'Pitcairn', 64),
(179, 'Poland', 48),
(180, 'Portugal', 351),
(181, 'Puerto Rico', 1787),
(182, 'Qatar', 974),
(183, 'Reunion', 262),
(184, 'Romania', 40),
(185, 'Russian Federation', 7),
(186, 'Rwanda', 250),
(187, 'Saint Barthelemy', 590),
(188, 'Saint Helena', 290),
(189, 'Saint Kitts and Nevis', 1869),
(190, 'Saint Lucia', 1758),
(191, 'Saint Martin', 590),
(192, 'Saint Pierre and Miquelon', 508),
(193, 'Saint Vincent and the Grenadines', 1784),
(194, 'Samoa', 684),
(195, 'San Marino', 378),
(196, 'Sao Tome and Principe', 239),
(197, 'Saudi Arabia', 966),
(198, 'Senegal', 221),
(199, 'Serbia', 381),
(200, 'Serbia and Montenegro', 381),
(201, 'Seychelles', 248),
(202, 'Sierra Leone', 232),
(203, 'Singapore', 65),
(204, 'Sint Maarten', 721),
(205, 'Slovakia', 421),
(206, 'Slovenia', 386),
(207, 'Solomon Islands', 677),
(208, 'Somalia', 252),
(209, 'South Africa', 27),
(210, 'South Georgia and the South Sandwich Islands', 500),
(211, 'South Sudan', 211),
(212, 'Spain', 34),
(213, 'Sri Lanka', 94),
(214, 'Sudan', 249),
(215, 'Suriname', 597),
(216, 'Svalbard and Jan Mayen', 47),
(217, 'Swaziland', 268),
(218, 'Sweden', 46),
(219, 'Switzerland', 41),
(220, 'Syrian Arab Republic', 963),
(221, 'Taiwan, Province of China', 886),
(222, 'Tajikistan', 992),
(223, 'Tanzania, United Republic of', 255),
(224, 'Thailand', 66),
(225, 'Timor-Leste', 670),
(226, 'Togo', 228),
(227, 'Tokelau', 690),
(228, 'Tonga', 676),
(229, 'Trinidad and Tobago', 1868),
(230, 'Tunisia', 216),
(231, 'Turkey', 90),
(232, 'Turkmenistan', 7370),
(233, 'Turks and Caicos Islands', 1649),
(234, 'Tuvalu', 688),
(235, 'Uganda', 256),
(236, 'Ukraine', 380),
(237, 'United Arab Emirates', 971),
(238, 'United Kingdom', 44),
(239, 'United States', 1),
(240, 'United States Minor Outlying Islands', 1),
(241, 'Uruguay', 598),
(242, 'Uzbekistan', 998),
(243, 'Vanuatu', 678),
(244, 'Venezuela', 58),
(245, 'Viet Nam', 84),
(246, 'Virgin Islands, British', 1284),
(247, 'Virgin Islands, U.s.', 1340),
(248, 'Wallis and Futuna', 681),
(249, 'Western Sahara', 212),
(250, 'Yemen', 967),
(251, 'Zambia', 260),
(252, 'Zimbabwe', 263);

-- --------------------------------------------------------

--
-- Table structure for table `domain`
--

CREATE TABLE `domain` (
  `id` bigint(20) NOT NULL,
  `domain_name` varchar(255) DEFAULT NULL,
  `is_deleted` char(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `login_history`
--

CREATE TABLE `login_history` (
  `id` bigint(20) NOT NULL,
  `publisher_id` bigint(20) DEFAULT NULL,
  `device` varchar(255) DEFAULT NULL,
  `browser` varchar(100) DEFAULT NULL,
  `ip_address` text DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `result` text DEFAULT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `is_active` varchar(32) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_history`
--

INSERT INTO `login_history` (`id`, `publisher_id`, `device`, `browser`, `ip_address`, `city`, `country`, `result`, `session_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Windows', '::1', NULL, NULL, '1', 'MOYYgLSPt5DafzSTo5IBZ0zdDG85ZIzTx46v3708', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login_securities`
--

CREATE TABLE `login_securities` (
  `id` bigint(20) NOT NULL,
  `publisher_id` bigint(20) DEFAULT NULL,
  `google2fa_enable` varchar(32) DEFAULT NULL,
  `google2fa_secret` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_securities`
--

INSERT INTO `login_securities` (`id`, `publisher_id`, `google2fa_enable`, `google2fa_secret`, `created_at`, `updated_at`) VALUES
(1, 1, '0', '3AAHBW4INAOSTSLI', '2023-07-17 09:44:20', '2023-07-17 09:44:20');

-- --------------------------------------------------------

--
-- Table structure for table `mail_room`
--

CREATE TABLE `mail_room` (
  `id` int(11) NOT NULL,
  `affliate_id` bigint(20) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) NOT NULL,
  `affliate_id` bigint(20) DEFAULT NULL,
  `sender` varchar(50) DEFAULT NULL,
  `receiver` text DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `screenshot` varchar(32) DEFAULT NULL,
  `is_read` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news_and_announcement`
--

CREATE TABLE `news_and_announcement` (
  `id` bigint(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` bigint(20) NOT NULL,
  `news_id` bigint(20) DEFAULT NULL,
  `publisher_id` bigint(20) DEFAULT NULL,
  `is_read` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) NOT NULL,
  `offer_name` varchar(255) DEFAULT NULL,
  `advertiser_id` bigint(20) DEFAULT NULL,
  `offer_type` varchar(50) DEFAULT NULL,
  `advertiser_officer_id` bigint(20) DEFAULT NULL,
  `verticals` varchar(255) DEFAULT NULL,
  `tracking_domain_id` bigint(20) DEFAULT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `requirements` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `preview_url` text DEFAULT NULL,
  `preview_link` text DEFAULT NULL,
  `payout_percentage` int(11) DEFAULT NULL,
  `icon_url` varchar(255) DEFAULT NULL,
  `lead_qty` bigint(20) DEFAULT NULL,
  `payout` double(8,2) DEFAULT NULL,
  `countries` text DEFAULT NULL,
  `ua_target` text DEFAULT NULL,
  `browsers` text DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `conversion` int(11) DEFAULT NULL,
  `featured_offer` tinyint(1) DEFAULT NULL,
  `incentive_allowed` tinyint(1) DEFAULT NULL,
  `smartlink` tinyint(1) DEFAULT NULL,
  `magiclink` tinyint(1) DEFAULT NULL,
  `lockers` tinyint(1) DEFAULT NULL,
  `native` tinyint(1) DEFAULT NULL,
  `payout_type` varchar(50) DEFAULT NULL,
  `leads` bigint(20) DEFAULT 0,
  `clicks` bigint(20) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offers_publisher`
--

CREATE TABLE `offers_publisher` (
  `id` bigint(20) NOT NULL,
  `offer_id` bigint(20) DEFAULT NULL,
  `publisher_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offer_process`
--

CREATE TABLE `offer_process` (
  `id` bigint(20) NOT NULL,
  `offer_id` bigint(20) DEFAULT NULL,
  `advertiser_offer_id` bigint(20) DEFAULT NULL,
  `offer_name` varchar(255) DEFAULT NULL,
  `ua_target` text DEFAULT NULL,
  `browser` text DEFAULT NULL,
  `country` text DEFAULT NULL,
  `ip_address` text DEFAULT NULL,
  `code` text DEFAULT NULL,
  `unique_` varchar(255) DEFAULT NULL,
  `key_` varchar(32) DEFAULT NULL,
  `publisher_id` bigint(20) DEFAULT NULL,
  `payout_type` varchar(50) DEFAULT NULL,
  `payout` double(8,2) DEFAULT NULL,
  `publisher_earned` double(8,2) DEFAULT NULL,
  `affliate_manager_earnings` double(8,2) DEFAULT NULL,
  `source` text DEFAULT NULL,
  `sid` varchar(50) DEFAULT NULL,
  `sid2` varchar(50) DEFAULT NULL,
  `sid3` varchar(50) DEFAULT NULL,
  `sid4` varchar(50) DEFAULT NULL,
  `sid5` varchar(50) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Pending',
  `admin_earned` double(10,2) DEFAULT NULL,
  `advertiser_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `postback`
--

CREATE TABLE `postback` (
  `id` bigint(20) NOT NULL,
  `link` text DEFAULT NULL,
  `publisher_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `postback_recieve`
--

CREATE TABLE `postback_recieve` (
  `id` bigint(20) NOT NULL,
  `publisher_id` bigint(20) DEFAULT NULL,
  `offer_id` bigint(20) DEFAULT NULL,
  `offer_process_id` bigint(20) DEFAULT NULL,
  `url` text DEFAULT NULL,
  `payout` double(8,2) DEFAULT NULL,
  `status` varchar(32) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `postback_sent`
--

CREATE TABLE `postback_sent` (
  `id` bigint(20) NOT NULL,
  `publisher_id` bigint(20) DEFAULT NULL,
  `offer_id` bigint(20) DEFAULT NULL,
  `url` text DEFAULT NULL,
  `payout` double(8,2) DEFAULT NULL,
  `status` varchar(32) DEFAULT 'Approved',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `balance` double(8,2) DEFAULT NULL,
  `total_earnings` double(8,2) DEFAULT NULL,
  `nid` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `account_type` varchar(50) DEFAULT NULL,
  `company_name` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 1,
  `affliate_manager_id` bigint(20) DEFAULT NULL,
  `publisher_image` varchar(255) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `actual_country` varchar(50) DEFAULT NULL,
  `payment_terms` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `region` varchar(50) DEFAULT NULL,
  `postal_code` varchar(50) DEFAULT NULL,
  `skype` varchar(50) DEFAULT NULL,
  `phone` varchar(32) DEFAULT NULL,
  `phone_code` varchar(32) DEFAULT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `monthly_traffic` varchar(255) DEFAULT NULL,
  `additional_information` varchar(255) DEFAULT NULL,
  `tax_file` text DEFAULT NULL,
  `tax_note` text DEFAULT NULL,
  `hereby` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `expert_mode` varchar(50) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Inactive',
  `master_key` bigint(20) DEFAULT NULL,
  `password_show` varchar(255) DEFAULT NULL,
  `vpn_clicks` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`id`, `name`, `balance`, `total_earnings`, `nid`, `email`, `password`, `account_type`, `company_name`, `role`, `verified`, `affliate_manager_id`, `publisher_image`, `country`, `actual_country`, `payment_terms`, `address`, `city`, `region`, `postal_code`, `skype`, `phone`, `phone_code`, `website_url`, `monthly_traffic`, `additional_information`, `tax_file`, `tax_note`, `hereby`, `category`, `expert_mode`, `status`, `master_key`, `password_show`, `vpn_clicks`, `created_at`, `updated_at`) VALUES
(1, '', NULL, NULL, NULL, 'publisher@gmail.com', '$2y$10$tzmARUDJ23X.lmw0UbjkruXYcrGPafd2m6sUY6lI/5UBdHM3.pkaS', 'Individual', NULL, 'publisher', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `publisher_payment_method`
--

CREATE TABLE `publisher_payment_method` (
  `id` bigint(20) NOT NULL,
  `publisher_id` bigint(20) DEFAULT NULL,
  `payment_type` varchar(32) DEFAULT NULL,
  `is_primary` varchar(32) DEFAULT NULL,
  `payment_terms` varchar(32) DEFAULT NULL,
  `payment_details` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `publisher_transactions`
--

CREATE TABLE `publisher_transactions` (
  `id` bigint(20) NOT NULL,
  `publisher_id` bigint(20) DEFAULT NULL,
  `offer_process_id` bigint(20) DEFAULT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ranking`
--

CREATE TABLE `ranking` (
  `id` bigint(20) NOT NULL,
  `publisher_id` bigint(20) DEFAULT NULL,
  `clicks` bigint(20) DEFAULT NULL,
  `earnings` double DEFAULT NULL,
  `lead` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE `site` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `url` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(32) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site_category`
--

CREATE TABLE `site_category` (
  `id` int(11) NOT NULL,
  `site_category_name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) NOT NULL,
  `cdn_url` varchar(255) DEFAULT NULL,
  `auto_signup` varchar(32) DEFAULT NULL,
  `minimum_withdraw_amount` double(8,2) DEFAULT NULL,
  `payout_percentage` int(11) DEFAULT NULL,
  `default_tracking_domain` varchar(255) DEFAULT NULL,
  `default_smartlink_domain` varchar(255) DEFAULT NULL,
  `default_affliate_manager` varchar(255) DEFAULT NULL,
  `affliate_manager_salary_percentage` int(11) DEFAULT NULL,
  `default_payment_terms` text DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `vpn_check` varchar(50) DEFAULT NULL,
  `driver` varchar(32) DEFAULT NULL,
  `host` varchar(255) DEFAULT NULL,
  `smtp_host` varchar(255) DEFAULT NULL,
  `smtp_port` int(11) DEFAULT NULL,
  `smtp_user` varchar(50) DEFAULT NULL,
  `smtp_password` varchar(255) DEFAULT NULL,
  `smtp_enc` varchar(50) DEFAULT NULL,
  `port` int(11) DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `encryption` varchar(32) DEFAULT NULL,
  `from_email` varchar(50) DEFAULT NULL,
  `from_name` varchar(50) DEFAULT NULL,
  `from_security` varchar(255) DEFAULT NULL,
  `zerobounce_api` varchar(255) DEFAULT NULL,
  `zerobounce_check` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `smartlinks`
--

CREATE TABLE `smartlinks` (
  `id` bigint(20) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `publisher_id` bigint(20) DEFAULT NULL,
  `enabled` tinyint(4) DEFAULT NULL,
  `earnings` double(8,2) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `traffic_source` text DEFAULT NULL,
  `key_` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_delete` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `smartlink_domain`
--

CREATE TABLE `smartlink_domain` (
  `id` bigint(20) NOT NULL,
  `publisher_id` bigint(20) DEFAULT NULL,
  `domain` varchar(50) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `system_configurations`
--

CREATE TABLE `system_configurations` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `value` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_configurations`
--

INSERT INTO `system_configurations` (`id`, `type`, `value`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'App', NULL, NULL),
(2, 'site_motto_heading', 'A CPA Network that contains Premium CPC, CPL and CPA Offers', NULL, NULL),
(3, 'site_motto', 'We focus on cloud and AI for faster speed of the network perfermance', NULL, NULL),
(4, 'site_address', 'In ut dolore adipisc', NULL, NULL),
(5, 'site_phone', '+1 (918) 126-5336', NULL, NULL),
(6, 'site_email', 'support@email.net', NULL, NULL),
(7, 'privacy_policy', '', NULL, NULL),
(8, 'system_default_currency', '', NULL, NULL),
(9, 'current_version', '', NULL, NULL),
(10, 'timezone', '', NULL, NULL),
(11, 'copyright_text', '', NULL, NULL),
(12, 'about_heading', 'We create experiences<br>that transform brands<br>and grow businesses.<br>', NULL, NULL),
(13, 'about_para1', 'Lorem ipsum dolor sit amet, pri quodsi deserunt ea, vide omnes eum ad. Ex denique dissentiunt ullamcorper has. His nemore luptatum facilisi ne, at vis docendi aliquando, sea te eius laoreet eleifend. Usu modo quando propriae ea. Quaestio molestiae eos id, prompta luptatum scripserit ad eam, in nec vide imperdiet. Veniam soluta mentitum vel at.', NULL, NULL),
(14, 'about_para2', 'Ut populo accusata qualisque his. Enim debitis forensibus vel ut,\r\n            wisi iuvaret temporibus eu duo. Sonet ullamcorper mel ad, cu apeirian omittantur persequeris vis, ex\r\n            veri definiebas ius. Pericula vituperata disputationi eu cum, et quo movet possim definiebas. Diam\r\n            legendos assueverit at quo, te mea erat dolor qualisque, amet alia consulatu in eum. An modus ipsum\r\n            suavitate mel, ea per simul iracundia. At sea debet voluptua inimicus, quando possim molestiae qui no.\r\n            Ut docendi nominati repudiare usu.', NULL, NULL),
(15, 'pay_per_lead_heading', 'CPL Offers Contains SOI or DOI based leads with high payout rate than others.', NULL, NULL),
(16, 'pay_per_lead_details', 'CPL means Click Per Lead Offers Contains SOI or DOI based leads with high payout rate than others.', NULL, NULL),
(17, 'pay_per_click_heading', 'Buy & sell clicks in a transparent CPC auction. Any vertical. All geos.', NULL, NULL),
(18, 'pay_per_click_details', 'Buy & sell clicks in a transparent CPC auction. Any vertical. All geos.', NULL, NULL),
(19, 'pay_per_install_heading', 'Pay per install is a pricing model in which advertisers pay for every install their ad campaign generates.', NULL, NULL),
(20, 'pay_per_install_details', 'Pay per install is a pricing model in which advertisers pay for every install their ad campaign generates.', NULL, NULL),
(21, 'cost_per_sell_heading', 'Cost per sale, also known as cost per conversion, is the amount an advertiser pays for each sale (conversion) generated by a particular ad.', NULL, NULL),
(22, 'cost_per_sell_details', 'Per Sale generate money, This most needly products and qulity, quentity products and services have efficient price with total guideline.', NULL, NULL),
(23, 'pay_per_view_heading', 'That’s exactly what pay-per-view video streaming is,The types of videos you\'ll watch news content and viral videos.', NULL, NULL),
(24, 'pay_per_view_details', 'That’s exactly what pay-per-view video streaming is,The types of videos you\'ll watch news content and viral videos.', NULL, NULL),
(25, 'play_store_logo', '2931686409611.png', NULL, NULL),
(26, 'apple_store_logo', '5181686409675.png', NULL, NULL),
(27, 'fb_comment_activation_checkbox', '0', NULL, NULL),
(28, 'topten', '1', NULL, NULL),
(29, 'ns1', 'ns1.coder-bd.com', NULL, NULL),
(30, 'ns2', 'ns2.coder-bd.com', NULL, NULL),
(31, 'ns3', 'ns3.coder-bd.com', NULL, NULL),
(32, 'ns4', 'ns4.coder-bd.com', NULL, NULL),
(33, 'service_show', 'yes', NULL, NULL),
(34, 'about_us_show', 'yes', NULL, NULL),
(35, 'our_team_show', 'yes', NULL, NULL),
(36, 'news_blog_show', 'yes', NULL, NULL),
(37, 'contact_show', 'yes', NULL, NULL),
(38, 'play_store_link', 'https://www.youtube.com/watch?v=IuhAnc1ghR0', NULL, NULL),
(39, 'apple_store_link', '#', NULL, NULL),
(40, 'facebook_url', 'https://www.facebook.com', NULL, NULL),
(41, 'instagram_url', '#', NULL, NULL),
(42, 'youtube_url', '#', NULL, NULL),
(43, 'linkedin_url', '#', NULL, NULL),
(44, 'twitter_url', '#', NULL, NULL),
(45, 'pinterest_url', '#', NULL, NULL),
(46, 'contact_address', '1201 N. Orange Street Suite #7223,<br> Wilmington, DE 1980,<br> United States', NULL, NULL),
(47, 'contact_email', 'info@cpamarketing.com', NULL, NULL),
(48, 'contact_phone', '+1 302-205-8262', NULL, NULL),
(49, 'privacy_policy_description', '<h3 style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 1.1; color: rgb(51, 51, 51); margin-bottom: 18px; font-size: 24px; letter-spacing: normal;\">Preview your Terms &amp; Conditions</h3><h1><span style=\"font-size: 14px;\"></span></h1><h2><hr style=\"margin-top: 20px; margin-bottom: 20px; border-color: rgb(204, 204, 204); color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px; letter-spacing: normal;\"></h2><h2 style=\"font-family: inherit; line-height: 1.1; color: inherit; margin-bottom: 18px; font-size: 16px;\"><span style=\"font-weight: 700;\">Terms and Conditions</span></h2><h2><div class=\"preview\" style=\"font-size: 14px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; letter-spacing: normal;\"><p style=\"margin-bottom: 20px;\">Welcome to minetwork!</p><p style=\"margin-bottom: 20px;\">These terms and conditions outline the rules and regulations for the use of minetwork\'s Website, located at minetwork.com.</p><p style=\"margin-bottom: 20px;\">By accessing this website we assume you accept these terms and conditions. Do not continue to use minetwork if you do not agree to take all of the terms and conditions stated on this page.</p><p style=\"margin-bottom: 20px;\">The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: \"Client\", \"You\" and \"Your\" refers to you, the person log on this website and compliant to the Company\'s terms and conditions. \"The Company\", \"Ourselves\", \"We\", \"Our\" and \"Us\", refers to our Company. \"Party\", \"Parties\", or \"Us\", refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client\'s needs in respect of provision of the Company\'s stated services, in accordance with and subject to, prevailing law of cn. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.</p></div></h2><h3 style=\"font-family: inherit; line-height: 1.1; color: inherit; margin-bottom: 18px; font-size: 14px;\"><span style=\"font-weight: 700;\">Cookies</span></h3><h2><div class=\"preview\" style=\"font-size: 14px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; letter-spacing: normal;\"><p style=\"margin-bottom: 20px;\">We employ the use of cookies. By accessing minetwork, you agreed to use cookies in agreement with the minetwork\'s Privacy Policy.</p><p style=\"margin-bottom: 20px;\">Most interactive websites use cookies to let us retrieve the user\'s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.</p></div></h2><h3 style=\"font-family: inherit; line-height: 1.1; color: inherit; margin-bottom: 18px; font-size: 14px;\"><span style=\"font-weight: 700;\">License</span></h3><h2><div class=\"preview\" style=\"font-size: 14px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; letter-spacing: normal;\"><p style=\"margin-bottom: 20px;\">Unless otherwise stated, minetwork and/or its licensors own the intellectual property rights for all material on minetwork. All intellectual property rights are reserved. You may access this from minetwork for your own personal use subjected to restrictions set in these terms and conditions.</p><p style=\"margin-bottom: 20px;\">You must not:</p><ul style=\"margin-bottom: 10px;\"><li>Republish material from minetwork</li><li>Sell, rent or sub-license material from minetwork</li><li>Reproduce, duplicate or copy material from minetwork</li><li>Redistribute content from minetwork</li></ul><p style=\"margin-bottom: 20px;\">This Agreement shall begin on the date hereof. Our Terms and Conditions were created with the help of the&nbsp;<a href=\"https://www.termsandconditionsgenerator.com/\" style=\"color: rgb(102, 102, 102);\">Free Terms and Conditions Generator</a>.</p><p style=\"margin-bottom: 20px;\">Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website. minetwork does not filter, edit, publish or review Comments prior to their presence on the website. Comments do not reflect the views and opinions of minetwork,its agents and/or affiliates. Comments reflect the views and opinions of the person who post their views and opinions. To the extent permitted by applicable laws, minetwork shall not be liable for the Comments or for any liability, damages or expenses caused and/or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website.</p><p style=\"margin-bottom: 20px;\">minetwork reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive or causes breach of these Terms and Conditions.</p><p style=\"margin-bottom: 20px;\">You warrant and represent that:</p><ul style=\"margin-bottom: 10px;\"><li>You are entitled to post the Comments on our website and have all necessary licenses and consents to do so;</li><li>The Comments do not invade any intellectual property right, including without limitation copyright, patent or trademark of any third party;</li><li>The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material which is an invasion of privacy</li><li>The Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity.</li></ul><p style=\"margin-bottom: 20px;\">You hereby grant minetwork a non-exclusive license to use, reproduce, edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats or media.</p></div></h2><h3 style=\"font-family: inherit; line-height: 1.1; color: inherit; margin-bottom: 18px; font-size: 14px;\"><span style=\"font-weight: 700;\">Hyperlinking to our Content</span></h3><h2><div class=\"preview\" style=\"font-size: 14px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; letter-spacing: normal;\"><p style=\"margin-bottom: 20px;\">The following organizations may link to our Website without prior written approval:</p><ul style=\"margin-bottom: 10px;\"><li>Government agencies;</li><li>Search engines;</li><li>News organizations;</li><li>Online directory distributors may link to our Website in the same manner as they hyperlink to the Websites of other listed businesses; and</li><li>System wide Accredited Businesses except soliciting non-profit organizations, charity shopping malls, and charity fundraising groups which may not hyperlink to our Web site.</li></ul><p style=\"margin-bottom: 20px;\">These organizations may link to our home page, to publications or to other Website information so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products and/or services; and (c) fits within the context of the linking party\'s site.</p><p style=\"margin-bottom: 20px;\">We may consider and approve other link requests from the following types of organizations:</p><ul style=\"margin-bottom: 10px;\"><li>commonly-known consumer and/or business information sources;</li><li>dot.com community sites;</li><li>associations or other groups representing charities;</li><li>online directory distributors;</li><li>internet portals;</li><li>accounting, law and consulting firms; and</li><li>educational institutions and trade associations.</li></ul><p style=\"margin-bottom: 20px;\">We will approve link requests from these organizations if we decide that: (a) the link would not make us look unfavorably to ourselves or to our accredited businesses; (b) the organization does not have any negative records with us; (c) the benefit to us from the visibility of the hyperlink compensates the absence of minetwork; and (d) the link is in the context of general resource information.</p><p style=\"margin-bottom: 20px;\">These organizations may link to our home page so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products or services; and (c) fits within the context of the linking party\'s site.</p><p style=\"margin-bottom: 20px;\">If you are one of the organizations listed in paragraph 2 above and are interested in linking to our website, you must inform us by sending an e-mail to minetwork. Please include your name, your organization name, contact information as well as the URL of your site, a list of any URLs from which you intend to link to our Website, and a list of the URLs on our site to which you would like to link. Wait 2-3 weeks for a response.</p><p style=\"margin-bottom: 20px;\">Approved organizations may hyperlink to our Website as follows:</p><ul style=\"margin-bottom: 10px;\"><li>By use of our corporate name; or</li><li>By use of the uniform resource locator being linked to; or</li><li>By use of any other description of our Website being linked to that makes sense within the context and format of content on the linking party\'s site.</li></ul><p style=\"margin-bottom: 20px;\">No use of minetwork\'s logo or other artwork will be allowed for linking absent a trademark license agreement.</p></div></h2><h3 style=\"font-family: inherit; line-height: 1.1; color: inherit; margin-bottom: 18px; font-size: 14px;\"><span style=\"font-weight: 700;\">iFrames</span></h3><h2><div class=\"preview\" style=\"font-size: 14px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; letter-spacing: normal;\"><p style=\"margin-bottom: 20px;\">Without prior approval and written permission, you may not create frames around our Webpages that alter in any way the visual presentation or appearance of our Website.</p></div></h2><h3 style=\"font-family: inherit; line-height: 1.1; color: inherit; margin-bottom: 18px; font-size: 14px;\"><span style=\"font-weight: 700;\">Content Liability</span></h3><h2><div class=\"preview\" style=\"font-size: 14px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; letter-spacing: normal;\"><p style=\"margin-bottom: 20px;\">We shall not be hold responsible for any content that appears on your Website. You agree to protect and defend us against all claims that is rising on your Website. No link(s) should appear on any Website that may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or other violation of, any third party rights.</p></div></h2><h3 style=\"font-family: inherit; line-height: 1.1; color: inherit; margin-bottom: 18px; font-size: 14px;\"><span style=\"font-weight: 700;\">Reservation of Rights</span></h3><h2><div class=\"preview\" style=\"font-size: 14px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; letter-spacing: normal;\"><p style=\"margin-bottom: 20px;\">We reserve the right to request that you remove all links or any particular link to our Website. You approve to immediately remove all links to our Website upon request. We also reserve the right to amen these terms and conditions and it\'s linking policy at any time. By continuously linking to our Website, you agree to be bound to and follow these linking terms and conditions.</p></div></h2><h3 style=\"font-family: inherit; line-height: 1.1; color: inherit; margin-bottom: 18px; font-size: 14px;\"><span style=\"font-weight: 700;\">Removal of links from our website</span></h3><h2><div class=\"preview\" style=\"font-size: 14px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; letter-spacing: normal;\"><p style=\"margin-bottom: 20px;\">If you find any link on our Website that is offensive for any reason, you are free to contact and inform us any moment. We will consider requests to remove links but we are not obligated to or so or to respond to you directly.</p><p style=\"margin-bottom: 20px;\">We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy; nor do we promise to ensure that the website remains available or that the material on the website is kept up to date.</p></div></h2><h3 style=\"font-family: inherit; line-height: 1.1; color: inherit; margin-bottom: 18px; font-size: 14px;\"><span style=\"font-weight: 700;\">Disclaimer</span></h3><h2><div class=\"preview\" style=\"font-size: 14px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; letter-spacing: normal;\"><p style=\"margin-bottom: 20px;\">To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website. Nothing in this disclaimer will:</p><ul style=\"margin-bottom: 10px;\"><li>limit or exclude our or your liability for death or personal injury;</li><li>limit or exclude our or your liability for fraud or fraudulent misrepresentation;</li><li>limit any of our or your liabilities in any way that is not permitted under applicable law; or</li><li>exclude any of our or your liabilities that may not be excluded under applicable law.</li></ul><p style=\"margin-bottom: 20px;\">The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer: (a) are subject to the preceding paragraph; and (b) govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory duty.</p><p style=\"margin-bottom: 20px;\">As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.</p></div></h2>', NULL, NULL),
(50, 'privacy_policy_meta_title', 'privacy_policy_meta_title', NULL, NULL),
(51, 'privacy_policy_meta_description', 'Well organized and easy to understand Web building tutorials with lots of examples of how to use HTML, CSS, JavaScript, SQL, Python, PHP, Bootstrap, Java, XML and more.', NULL, NULL),
(52, 'privacy_policy_meta_keywords', 'privacy_policy_meta_keywords', NULL, NULL),
(53, 'privacy_policy_meta_image', NULL, NULL, NULL),
(54, 'terms_conditions_description', '<h3 style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; line-height: 1.1; color: rgb(51, 51, 51); margin-bottom: 18px; font-size: 24px; letter-spacing: normal;\">Preview your Terms &amp; Conditions</h3><h1><span style=\"font-size: 14px;\"></span></h1><h2><hr style=\"margin-top: 20px; margin-bottom: 20px; border-color: rgb(204, 204, 204); color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px; letter-spacing: normal;\"></h2><h2 style=\"font-family: inherit; line-height: 1.1; color: inherit; margin-bottom: 18px; font-size: 16px;\"><span style=\"font-weight: 700;\">Terms and Conditions</span></h2><h2><div class=\"preview\" style=\"font-size: 14px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; letter-spacing: normal;\"><p style=\"margin-bottom: 20px;\">Welcome to minetwork!</p><p style=\"margin-bottom: 20px;\">These terms and conditions outline the rules and regulations for the use of minetwork\'s Website, located at minetwork.com.</p><p style=\"margin-bottom: 20px;\">By accessing this website we assume you accept these terms and conditions. Do not continue to use minetwork if you do not agree to take all of the terms and conditions stated on this page.</p><p style=\"margin-bottom: 20px;\">The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: \"Client\", \"You\" and \"Your\" refers to you, the person log on this website and compliant to the Company\'s terms and conditions. \"The Company\", \"Ourselves\", \"We\", \"Our\" and \"Us\", refers to our Company. \"Party\", \"Parties\", or \"Us\", refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client\'s needs in respect of provision of the Company\'s stated services, in accordance with and subject to, prevailing law of cn. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.</p></div></h2><h3 style=\"font-family: inherit; line-height: 1.1; color: inherit; margin-bottom: 18px; font-size: 14px;\"><span style=\"font-weight: 700;\">Cookies</span></h3><h2><div class=\"preview\" style=\"font-size: 14px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; letter-spacing: normal;\"><p style=\"margin-bottom: 20px;\">We employ the use of cookies. By accessing minetwork, you agreed to use cookies in agreement with the minetwork\'s Privacy Policy.</p><p style=\"margin-bottom: 20px;\">Most interactive websites use cookies to let us retrieve the user\'s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.</p></div></h2><h3 style=\"font-family: inherit; line-height: 1.1; color: inherit; margin-bottom: 18px; font-size: 14px;\"><span style=\"font-weight: 700;\">License</span></h3><h2><div class=\"preview\" style=\"font-size: 14px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; letter-spacing: normal;\"><p style=\"margin-bottom: 20px;\">Unless otherwise stated, minetwork and/or its licensors own the intellectual property rights for all material on minetwork. All intellectual property rights are reserved. You may access this from minetwork for your own personal use subjected to restrictions set in these terms and conditions.</p><p style=\"margin-bottom: 20px;\">You must not:</p><ul style=\"margin-bottom: 10px;\"><li>Republish material from minetwork</li><li>Sell, rent or sub-license material from minetwork</li><li>Reproduce, duplicate or copy material from minetwork</li><li>Redistribute content from minetwork</li></ul><p style=\"margin-bottom: 20px;\">This Agreement shall begin on the date hereof. Our Terms and Conditions were created with the help of the&nbsp;<a href=\"https://www.termsandconditionsgenerator.com/\" style=\"color: rgb(102, 102, 102);\">Free Terms and Conditions Generator</a>.</p><p style=\"margin-bottom: 20px;\">Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website. minetwork does not filter, edit, publish or review Comments prior to their presence on the website. Comments do not reflect the views and opinions of minetwork,its agents and/or affiliates. Comments reflect the views and opinions of the person who post their views and opinions. To the extent permitted by applicable laws, minetwork shall not be liable for the Comments or for any liability, damages or expenses caused and/or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website.</p><p style=\"margin-bottom: 20px;\">minetwork reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive or causes breach of these Terms and Conditions.</p><p style=\"margin-bottom: 20px;\">You warrant and represent that:</p><ul style=\"margin-bottom: 10px;\"><li>You are entitled to post the Comments on our website and have all necessary licenses and consents to do so;</li><li>The Comments do not invade any intellectual property right, including without limitation copyright, patent or trademark of any third party;</li><li>The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material which is an invasion of privacy</li><li>The Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity.</li></ul><p style=\"margin-bottom: 20px;\">You hereby grant minetwork a non-exclusive license to use, reproduce, edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats or media.</p></div></h2><h3 style=\"font-family: inherit; line-height: 1.1; color: inherit; margin-bottom: 18px; font-size: 14px;\"><span style=\"font-weight: 700;\">Hyperlinking to our Content</span></h3><h2><div class=\"preview\" style=\"font-size: 14px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; letter-spacing: normal;\"><p style=\"margin-bottom: 20px;\">The following organizations may link to our Website without prior written approval:</p><ul style=\"margin-bottom: 10px;\"><li>Government agencies;</li><li>Search engines;</li><li>News organizations;</li><li>Online directory distributors may link to our Website in the same manner as they hyperlink to the Websites of other listed businesses; and</li><li>System wide Accredited Businesses except soliciting non-profit organizations, charity shopping malls, and charity fundraising groups which may not hyperlink to our Web site.</li></ul><p style=\"margin-bottom: 20px;\">These organizations may link to our home page, to publications or to other Website information so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products and/or services; and (c) fits within the context of the linking party\'s site.</p><p style=\"margin-bottom: 20px;\">We may consider and approve other link requests from the following types of organizations:</p><ul style=\"margin-bottom: 10px;\"><li>commonly-known consumer and/or business information sources;</li><li>dot.com community sites;</li><li>associations or other groups representing charities;</li><li>online directory distributors;</li><li>internet portals;</li><li>accounting, law and consulting firms; and</li><li>educational institutions and trade associations.</li></ul><p style=\"margin-bottom: 20px;\">We will approve link requests from these organizations if we decide that: (a) the link would not make us look unfavorably to ourselves or to our accredited businesses; (b) the organization does not have any negative records with us; (c) the benefit to us from the visibility of the hyperlink compensates the absence of minetwork; and (d) the link is in the context of general resource information.</p><p style=\"margin-bottom: 20px;\">These organizations may link to our home page so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products or services; and (c) fits within the context of the linking party\'s site.</p><p style=\"margin-bottom: 20px;\">If you are one of the organizations listed in paragraph 2 above and are interested in linking to our website, you must inform us by sending an e-mail to minetwork. Please include your name, your organization name, contact information as well as the URL of your site, a list of any URLs from which you intend to link to our Website, and a list of the URLs on our site to which you would like to link. Wait 2-3 weeks for a response.</p><p style=\"margin-bottom: 20px;\">Approved organizations may hyperlink to our Website as follows:</p><ul style=\"margin-bottom: 10px;\"><li>By use of our corporate name; or</li><li>By use of the uniform resource locator being linked to; or</li><li>By use of any other description of our Website being linked to that makes sense within the context and format of content on the linking party\'s site.</li></ul><p style=\"margin-bottom: 20px;\">No use of minetwork\'s logo or other artwork will be allowed for linking absent a trademark license agreement.</p></div></h2><h3 style=\"font-family: inherit; line-height: 1.1; color: inherit; margin-bottom: 18px; font-size: 14px;\"><span style=\"font-weight: 700;\">iFrames</span></h3><h2><div class=\"preview\" style=\"font-size: 14px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; letter-spacing: normal;\"><p style=\"margin-bottom: 20px;\">Without prior approval and written permission, you may not create frames around our Webpages that alter in any way the visual presentation or appearance of our Website.</p></div></h2><h3 style=\"font-family: inherit; line-height: 1.1; color: inherit; margin-bottom: 18px; font-size: 14px;\"><span style=\"font-weight: 700;\">Content Liability</span></h3><h2><div class=\"preview\" style=\"font-size: 14px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; letter-spacing: normal;\"><p style=\"margin-bottom: 20px;\">We shall not be hold responsible for any content that appears on your Website. You agree to protect and defend us against all claims that is rising on your Website. No link(s) should appear on any Website that may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or other violation of, any third party rights.</p></div></h2><h3 style=\"font-family: inherit; line-height: 1.1; color: inherit; margin-bottom: 18px; font-size: 14px;\"><span style=\"font-weight: 700;\">Reservation of Rights</span></h3><h2><div class=\"preview\" style=\"font-size: 14px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; letter-spacing: normal;\"><p style=\"margin-bottom: 20px;\">We reserve the right to request that you remove all links or any particular link to our Website. You approve to immediately remove all links to our Website upon request. We also reserve the right to amen these terms and conditions and it\'s linking policy at any time. By continuously linking to our Website, you agree to be bound to and follow these linking terms and conditions.</p></div></h2><h3 style=\"font-family: inherit; line-height: 1.1; color: inherit; margin-bottom: 18px; font-size: 14px;\"><span style=\"font-weight: 700;\">Removal of links from our website</span></h3><h2><div class=\"preview\" style=\"font-size: 14px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; letter-spacing: normal;\"><p style=\"margin-bottom: 20px;\">If you find any link on our Website that is offensive for any reason, you are free to contact and inform us any moment. We will consider requests to remove links but we are not obligated to or so or to respond to you directly.</p><p style=\"margin-bottom: 20px;\">We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy; nor do we promise to ensure that the website remains available or that the material on the website is kept up to date.</p></div></h2><h3 style=\"font-family: inherit; line-height: 1.1; color: inherit; margin-bottom: 18px; font-size: 14px;\"><span style=\"font-weight: 700;\">Disclaimer</span></h3><h2><div class=\"preview\" style=\"font-size: 14px; color: rgb(102, 102, 102); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; letter-spacing: normal;\"><p style=\"margin-bottom: 20px;\">To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website. Nothing in this disclaimer will:</p><ul style=\"margin-bottom: 10px;\"><li>limit or exclude our or your liability for death or personal injury;</li><li>limit or exclude our or your liability for fraud or fraudulent misrepresentation;</li><li>limit any of our or your liabilities in any way that is not permitted under applicable law; or</li><li>exclude any of our or your liabilities that may not be excluded under applicable law.</li></ul><p style=\"margin-bottom: 20px;\">The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer: (a) are subject to the preceding paragraph; and (b) govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory duty.</p><p style=\"margin-bottom: 20px;\">As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.</p></div></h2>', NULL, NULL),
(55, 'terms_conditions_meta_title', 'privacy_policy_meta_title', NULL, NULL),
(56, 'terms_conditions_meta_description', 'privacy_policy_meta_description', NULL, NULL),
(57, 'terms_conditions_meta_keywords', 'privacy_policy_meta_keywords', NULL, NULL),
(58, 'terms_conditions_meta_image', NULL, NULL, NULL);

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
  `status` varchar(32) DEFAULT 'Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Publisher', 'publisher@mail.com', '2023-03-25 11:29:15', '$2y$10$tzmARUDJ23X.lmw0UbjkruXYcrGPafd2m6sUY6lI/5UBdHM3.pkaS', NULL, 'Active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `verify_publishers`
--

CREATE TABLE `verify_publishers` (
  `id` int(11) NOT NULL,
  `publisher_id` bigint(20) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_securities`
--
ALTER TABLE `admin_securities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisers`
--
ALTER TABLE `advertisers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `affliates`
--
ALTER TABLE `affliates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `affliate_securities`
--
ALTER TABLE `affliate_securities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `affliate_transactions`
--
ALTER TABLE `affliate_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `affliate_withdraw`
--
ALTER TABLE `affliate_withdraw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `approval_request`
--
ALTER TABLE `approval_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ban_ip`
--
ALTER TABLE `ban_ip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashout_request`
--
ALTER TABLE `cashout_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `domain`
--
ALTER TABLE `domain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_securities`
--
ALTER TABLE `login_securities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_room`
--
ALTER TABLE `mail_room`
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
-- Indexes for table `news_and_announcement`
--
ALTER TABLE `news_and_announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers_publisher`
--
ALTER TABLE `offers_publisher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_process`
--
ALTER TABLE `offer_process`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `postback`
--
ALTER TABLE `postback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postback_recieve`
--
ALTER TABLE `postback_recieve`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postback_sent`
--
ALTER TABLE `postback_sent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publisher_payment_method`
--
ALTER TABLE `publisher_payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publisher_transactions`
--
ALTER TABLE `publisher_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_category`
--
ALTER TABLE `site_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartlinks`
--
ALTER TABLE `smartlinks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartlink_domain`
--
ALTER TABLE `smartlink_domain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_configurations`
--
ALTER TABLE `system_configurations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `verify_publishers`
--
ALTER TABLE `verify_publishers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_securities`
--
ALTER TABLE `admin_securities`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advertisers`
--
ALTER TABLE `advertisers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `affliates`
--
ALTER TABLE `affliates`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `affliate_securities`
--
ALTER TABLE `affliate_securities`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `affliate_transactions`
--
ALTER TABLE `affliate_transactions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `affliate_withdraw`
--
ALTER TABLE `affliate_withdraw`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `approval_request`
--
ALTER TABLE `approval_request`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ban_ip`
--
ALTER TABLE `ban_ip`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cashout_request`
--
ALTER TABLE `cashout_request`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `domain`
--
ALTER TABLE `domain`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login_securities`
--
ALTER TABLE `login_securities`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mail_room`
--
ALTER TABLE `mail_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `news_and_announcement`
--
ALTER TABLE `news_and_announcement`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offers_publisher`
--
ALTER TABLE `offers_publisher`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offer_process`
--
ALTER TABLE `offer_process`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `postback`
--
ALTER TABLE `postback`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `postback_recieve`
--
ALTER TABLE `postback_recieve`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `postback_sent`
--
ALTER TABLE `postback_sent`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `publisher_payment_method`
--
ALTER TABLE `publisher_payment_method`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publisher_transactions`
--
ALTER TABLE `publisher_transactions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ranking`
--
ALTER TABLE `ranking`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_category`
--
ALTER TABLE `site_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `smartlinks`
--
ALTER TABLE `smartlinks`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `smartlink_domain`
--
ALTER TABLE `smartlink_domain`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `system_configurations`
--
ALTER TABLE `system_configurations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `verify_publishers`
--
ALTER TABLE `verify_publishers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
