-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2021 at 01:42 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `l6learnmechange`
--

-- --------------------------------------------------------


--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_request_id` bigint(20) UNSIGNED DEFAULT NULL,
  `specialist_id` bigint(20) UNSIGNED DEFAULT NULL,
  `budget` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `perposal` longtext COLLATE utf8mb4_unicode_ci,
  `work_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `payment_status` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `payment_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `review_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summery` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--
-- Table structure for table `blog_post_comments`
--

CREATE TABLE `blog_post_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



--
-- Table structure for table `blog_post_comment_like_dislikes`
--

CREATE TABLE `blog_post_comment_like_dislikes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `react` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



--
-- Table structure for table `blog_post_comment_replies`
--

CREATE TABLE `blog_post_comment_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--
-- Table structure for table `blog_post_comment_reply_like_dislikes`
--

CREATE TABLE `blog_post_comment_reply_like_dislikes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `react` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



--
-- Table structure for table `blog_post_like_dislikes`
--

CREATE TABLE `blog_post_like_dislikes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `react` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Table structure for table `channels`
--

CREATE TABLE `channels` (
  `channel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caller` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `call_to` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `booking_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reciever` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(10) UNSIGNED NOT NULL,
  `sender_id` bigint(20) NOT NULL,
  `reciever_id` bigint(20) NOT NULL,
  `sender_reciever` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'chat',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Table structure for table `client_specialist_disputes`
--

CREATE TABLE `client_specialist_disputes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reciever_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reciever_seen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `admin_seen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `client_response` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialist_response` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_response` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `response_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Table structure for table `dispute_replies`
--

CREATE TABLE `dispute_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dispute_id` bigint(20) UNSIGNED NOT NULL,
  `reply` longtext COLLATE utf8mb4_unicode_ci,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `reciever_id` bigint(20) UNSIGNED NOT NULL,
  `file_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reciever_seen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `client_seen` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `specialist_seen` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `admin_seen` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


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
(1, '2021_05_01_012709_create_tb_user', 1),
(2, '2021_05_01_101932_add_users_columns', 1),
(3, '2021_05_02_003818_create_tb_categories', 1),
(4, '2021_05_03_020222_create_tb_servicecategory', 1),
(5, '2021_05_04_043257_create_tb_availabletime', 1),
(6, '2021_05_04_053947_create_tb_paymentinfo', 1),
(7, '2021_05_04_072349_create_service_requests_table', 1),
(8, '2021_05_04_100158_create_appointments_table', 1),
(9, '2021_05_04_103925_create_bids_table', 1),
(10, '2021_05_05_055446_add_column_to_bid', 1),
(11, '2021_05_05_071456_add_notification_status_appointments', 1),
(12, '2021_05_05_093001_add_payment_status_to_appointment', 1),
(13, '2021_05_06_015850_create_tb_portofolio', 1),
(14, '2021_05_06_055838_create_client_specialist_disputes_table', 1),
(15, '2021_05_06_074442_create_dispute_replies_table', 1),
(16, '2021_05_06_084842_add_response_time_client_specialist_disputes', 1),
(17, '2021_05_06_234231_add_three_columns_dispute_replies', 1),
(18, '2021_05_07_020114_add_response_time_again_client_specialist_disputes', 1),
(19, '2021_05_11_031343_create_tb_booking', 1),
(20, '2021_05_17_021729_add_columns_duratin_rate_servicecategory', 1),
(21, '2021_05_18_235704_create_admins_table', 1),
(22, '2021_05_23_054455_add_column_to_bids', 1),
(23, '2021_05_23_233416_tb_fee', 1),
(24, '2021_05_24_014525_create_reviews_table', 1),
(25, '2021_05_24_020625_add_column_review_status_bids', 1),
(26, '2021_05_24_020656_add_column_review_status_appointments', 1),
(27, '2021_05_25_000606_create_transactions_table', 1),
(28, '2021_05_25_060407_add_specialist_earning_tb_booking', 1),
(29, '2021_04_27_074241_create_channels_table', 2),
(34, '2021_05_10_064409_create_payments_table', 3),
(36, '2021_05_11_024259_create_withdraws_table', 4),
(37, '2021_05_11_011044_add_payment_column_to_user', 5),
(38, '2021_05_12_003443_add_keys_to_users', 5),
(111111111, '2021_05_2_100000_create_password_resets_table', 6),
(111111112, '2021_06_08_024202_add_remember_token_tb_user', 7),
(111111113, '2021_06_09_001330_add_column_public_profile_tb_user', 7),
(111111114, '2021_06_25_052442_add_column_tb_categories', 8),
(111111121, '2021_08_03_050225_create_blog_posts_table', 9),
(111111122, '2021_08_03_051905_create_blog_post_comments_table', 9),
(111111123, '2021_08_03_051938_create_blog_post_comment_replies_table', 9),
(111111124, '2021_08_03_054431_create_blog_post_comment_like_dislikes_table', 9),
(111111125, '2021_08_03_054533_create_blog_post_comment_reply_like_dislikes_table', 9),
(111111126, '2021_08_05_012643_create_blog_post_like_dislikes_table', 10),
(111111127, '2021_08_06_003639_add_user_id_column', 11),
(111111128, '2021_08_06_023231_add_user_id_column_replys_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `specialist_id` bigint(20) UNSIGNED NOT NULL,
  `appointment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bid_id` bigint(20) UNSIGNED DEFAULT NULL,
  `received_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_status` enum('pending','released','specialist_request','paid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `release_status` enum('pending','released') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--
-- Table structure for table `service_requests`
--

CREATE TABLE `service_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `budget` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reg_date` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `stripe_public_key` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `stripe_secret_key` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `picture` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `username`, `password`, `reg_date`, `last_login`, `stripe_public_key`, `stripe_secret_key`, `picture`) VALUES
(2, 'admin', '25d55ad283aa400af464c76d713c07ad', '2021-02-21 11:56:10', '2021-02-21 11:56:10', 'pk_test_51IT0PtHC3FThVtcPyQiQlapXnSW2rLNhD5qbGmBNX31ojKyXm82lAsiYPjLVOKIiWzpdS4ijCOBoiQ8vTlb4kU2p00N9rDSTsp', 'sk_test_51IT0PtHC3FThVtcP6W41HQ1556eg9yEmxMclsw3Zh0R03tCpWU0hEbscD03X3eBUsA8rzMr3wsfcp5KtuEsHmUZj00quvnd6yG', 'https://ewdtech.com/learnme-updated/uploads/user/1622206460.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_availabletime`
--

CREATE TABLE `tb_availabletime` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mon` varchar(50) CHARACTER SET utf8 NOT NULL,
  `tue` varchar(50) CHARACTER SET utf8 NOT NULL,
  `wed` varchar(50) CHARACTER SET utf8 NOT NULL,
  `thr` varchar(50) CHARACTER SET utf8 NOT NULL,
  `fri` varchar(50) CHARACTER SET utf8 NOT NULL,
  `sat` varchar(50) CHARACTER SET utf8 NOT NULL,
  `sun` varchar(50) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- Table structure for table `tb_booking`
--

CREATE TABLE `tb_booking` (
  `id` int(11) NOT NULL,
  `buyer_id` varchar(50) CHARACTER SET utf8 NOT NULL,
  `seller_id` varchar(50) CHARACTER SET utf8 NOT NULL,
  `buyer_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `seller_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `buyer_picture` varchar(150) CHARACTER SET utf8 NOT NULL,
  `seller_picture` varchar(150) CHARACTER SET utf8 NOT NULL,
  `service_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `service_time` varchar(10) CHARACTER SET utf8 NOT NULL,
  `service_date` varchar(20) CHARACTER SET utf8 NOT NULL,
  `service_cost` varchar(10) CHARACTER SET utf8 NOT NULL,
  `description` varchar(512) CHARACTER SET utf8 NOT NULL,
  `state` varchar(5) CHARACTER SET utf8 NOT NULL,
  `reason` varchar(512) CHARACTER SET utf8 NOT NULL,
  `review` varchar(512) CHARACTER SET utf8 NOT NULL,
  `rating` varchar(5) CHARACTER SET utf8 NOT NULL,
  `possible` varchar(10) CHARACTER SET utf8 NOT NULL,
  `paystate` varchar(5) CHARACTER SET utf8 NOT NULL,
  `specialist_earning` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `tb_categories`
--

CREATE TABLE `tb_categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(512) NOT NULL DEFAULT '',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_subcategory` tinyint(1) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL DEFAULT '-1',
  `image` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_categories`
--

INSERT INTO `tb_categories` (`id`, `title`, `date_created`, `is_subcategory`, `category_id`, `image`, `created_at`, `updated_at`) VALUES
(49, 'Mukbang', '2020-08-04 13:45:01', 1, 44, NULL, NULL, NULL),
(64, 'Network Engineer', '2020-08-04 22:05:35', 1, 63, 'http://localhost/laravelprojects/learnme/uploads/categories/1624619638.jpg', NULL, NULL),
(60, 'all', '2020-08-04 18:33:42', 1, 58, NULL, NULL, NULL),
(58, 'all', '2020-08-04 18:09:11', 0, -1, NULL, NULL, NULL),
(56, 'ASSISTANT', '2020-08-04 13:55:18', 0, -1, 'http://localhost/laravelprojects/learnme/uploads/categories/1624619678.jpg', NULL, NULL),
(53, 'FOOD & BEVERAGE', '2020-08-04 13:48:51', 0, -1, NULL, NULL, NULL),
(52, 'Tour Guide', '2020-08-04 13:48:26', 1, 51, NULL, NULL, NULL),
(51, 'TRAVEL', '2020-08-04 13:48:19', 0, -1, 'http://localhost/laravelprojects/learnme/public/uploadfiles/categories/1625563729.jpg', NULL, NULL),
(50, 'Relaxation', '2020-08-04 13:45:23', 1, 44, NULL, NULL, NULL),
(48, 'Eyebrow Specialist', '2020-08-04 13:44:07', 1, 40, 'http://localhost/laravelprojects/learnme/uploads/categories/1624619717.jpg', NULL, NULL),
(40, 'BEAUTY', '2020-08-04 13:19:31', 0, -1, 'http://localhost/laravelprojects/learnme/uploads/categories/1624619745.jpg', NULL, NULL),
(41, 'Barber Specialist', '2020-08-04 13:19:35', 1, 42, NULL, NULL, NULL),
(47, 'Makeup Specialist', '2020-08-04 13:43:55', 1, 40, NULL, NULL, NULL),
(44, 'ASMR', '2020-08-04 13:22:11', 0, -1, NULL, NULL, NULL),
(43, 'Nails Specialist', '2020-08-04 13:22:02', 1, 40, NULL, NULL, NULL),
(147, 'Yoga Instructor', '2020-12-22 20:16:49', 1, 124, NULL, NULL, NULL),
(42, 'HAIR CARE', '2020-08-04 13:19:46', 0, -1, NULL, NULL, NULL),
(63, 'IT & NETWORKING', '2020-08-04 22:05:15', 0, -1, NULL, NULL, NULL),
(65, 'Software Engineer', '2020-08-04 22:06:03', 1, 63, NULL, NULL, NULL),
(66, 'Computer Specialist', '2020-08-04 22:07:11', 1, 63, NULL, NULL, NULL),
(189, 'Sports', '2021-02-02 11:28:14', 1, 176, NULL, NULL, NULL),
(87, 'FASHION', '2020-08-12 05:05:23', 0, -1, NULL, NULL, NULL),
(84, 'Music Instructor', '2020-08-12 05:03:23', 1, 83, NULL, NULL, NULL),
(93, 'Cooking Lessons ', '2020-08-12 18:28:38', 1, 53, NULL, NULL, NULL),
(182, 'Life Coach', '2021-01-17 21:16:58', 1, 176, NULL, NULL, NULL),
(95, 'EDUCATION', '2020-08-12 18:57:01', 0, -1, NULL, NULL, NULL),
(88, 'Fashion Stylist', '2020-08-12 05:05:35', 1, 87, NULL, NULL, NULL),
(83, 'MUSIC & AUDIO', '2020-08-12 05:03:04', 0, -1, NULL, NULL, NULL),
(85, 'DANCE SERVICES', '2020-08-12 05:03:32', 0, -1, NULL, NULL, NULL),
(86, 'Dance Instructor', '2020-08-12 05:03:44', 1, 85, NULL, NULL, NULL),
(201, 'Spiritual Advisor', '2021-04-14 02:04:24', 1, 197, NULL, NULL, NULL),
(193, 'Graphic Design', '2021-02-03 00:56:27', 1, 191, NULL, NULL, NULL),
(181, 'Financial Advisor', '2021-01-13 23:39:03', 1, 180, NULL, NULL, NULL),
(180, 'FINANCES', '2021-01-13 23:38:52', 0, -1, NULL, NULL, NULL),
(110, 'Musical Instruments', '2020-08-12 21:06:40', 1, 83, NULL, NULL, NULL),
(194, 'Entrepreneur', '2021-02-15 01:48:41', 1, 176, NULL, NULL, NULL),
(190, 'Pet Training', '2021-02-02 15:26:39', 1, 172, NULL, NULL, NULL),
(116, 'AUTO SERVICES ', '2020-08-13 02:11:16', 0, -1, NULL, NULL, NULL),
(117, 'Auto Technician', '2020-08-13 02:12:06', 1, 116, NULL, NULL, NULL),
(118, 'Language', '2020-08-13 02:14:43', 1, 95, NULL, NULL, NULL),
(197, 'SPIRITUAL', '2021-04-14 01:44:53', 0, -1, NULL, NULL, NULL),
(196, 'Zumba', '2021-04-07 16:58:43', 1, 124, NULL, NULL, NULL),
(122, 'Virtual Assistant', '2020-08-13 05:21:14', 1, 56, NULL, NULL, NULL),
(124, 'FITNESS', '2020-08-13 05:31:16', 0, -1, NULL, NULL, NULL),
(125, 'Personal Trainer ', '2020-08-13 05:32:13', 1, 124, NULL, NULL, NULL),
(126, 'NUTRITION ', '2020-08-13 05:32:29', 0, -1, NULL, NULL, NULL),
(127, 'Dietitian ', '2020-08-13 05:32:47', 1, 126, NULL, NULL, NULL),
(153, 'YouTube', '2020-12-28 18:32:53', 1, 152, NULL, NULL, NULL),
(138, 'Vocal Coach', '2020-08-23 08:43:24', 1, 83, NULL, NULL, NULL),
(192, 'Interior Design', '2021-02-03 00:55:58', 1, 191, NULL, NULL, NULL),
(186, 'DIY', '2021-01-29 01:08:42', 1, 185, NULL, NULL, NULL),
(185, 'DO IT YOURSELF', '2021-01-29 01:08:25', 0, -1, NULL, NULL, NULL),
(143, 'Hair Coloring ', '2020-08-23 18:11:24', 1, 42, NULL, NULL, NULL),
(144, 'Hair Stylist', '2020-08-23 22:28:52', 1, 42, NULL, NULL, NULL),
(148, 'ARTWORK', '2020-12-22 21:40:43', 0, -1, NULL, NULL, NULL),
(149, 'Painting Session', '2020-12-22 21:41:06', 1, 148, NULL, NULL, NULL),
(195, 'Bartender', '2021-02-24 00:43:03', 1, 53, NULL, NULL, NULL),
(188, 'Sleep Training', '2021-02-02 00:18:00', 1, 164, NULL, NULL, NULL),
(152, 'STARS & ENTERTAINMENT', '2020-12-28 18:29:05', 0, -1, NULL, NULL, NULL),
(158, 'Instagram', '2020-12-28 18:41:24', 1, 152, NULL, NULL, NULL),
(157, 'Twitter', '2020-12-28 18:39:46', 1, 152, NULL, NULL, NULL),
(156, 'TikTok', '2020-12-28 18:33:42', 1, 152, NULL, NULL, NULL),
(159, 'Snapchat', '2020-12-28 19:00:41', 1, 152, NULL, NULL, NULL),
(160, 'Facebook', '2020-12-28 19:00:51', 1, 152, NULL, NULL, NULL),
(191, 'DESIGN', '2021-02-03 00:55:26', 0, -1, NULL, NULL, NULL),
(164, 'BABY & NEW PARENTS', '2020-12-29 20:46:29', 0, -1, NULL, NULL, NULL),
(178, 'Photography', '2021-01-06 23:13:58', 1, 148, NULL, NULL, NULL),
(176, 'COACHING', '2021-01-06 21:19:07', 0, -1, NULL, NULL, NULL),
(177, 'Education', '2021-01-06 21:19:22', 1, 176, NULL, NULL, NULL),
(172, 'PET CARE', '2021-01-02 14:50:22', 0, -1, NULL, NULL, NULL),
(173, 'Pet Groomer', '2021-01-02 14:50:33', 1, 172, NULL, NULL, NULL),
(174, 'Skincare Specialist ', '2021-01-04 21:09:07', 1, 40, NULL, NULL, NULL),
(175, 'Early Childhood Specialist', '2021-01-05 15:09:29', 1, 164, NULL, NULL, NULL),
(179, 'Tutor', '2021-01-06 23:16:42', 1, 95, NULL, NULL, NULL),
(208, 'testt', '2021-06-25 11:10:33', 0, -1, 'http://localhost/laravelprojects/learnme/uploads/categories/1624619433.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_fee`
--

CREATE TABLE `tb_fee` (
  `id` int(11) NOT NULL,
  `fee` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_fee`
--

INSERT INTO `tb_fee` (`id`, `fee`) VALUES
(1, '20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_paymentinfo`
--

CREATE TABLE `tb_paymentinfo` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `account_number` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `routing_number` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `account_type` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `dob` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ssn` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `tb_portofolio`
--

CREATE TABLE `tb_portofolio` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(150) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `tb_review`
--

CREATE TABLE `tb_review` (
  `id` int(11) NOT NULL,
  `buyer_id` varchar(50) CHARACTER SET utf8 NOT NULL,
  `seller_id` varchar(50) CHARACTER SET utf8 NOT NULL,
  `buyer_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `buyer_picture` varchar(150) CHARACTER SET utf8 NOT NULL,
  `service_date` varchar(20) CHARACTER SET utf8 NOT NULL,
  `review` varchar(512) CHARACTER SET utf8 NOT NULL,
  `rating` varchar(5) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `tb_servicecategory`
--

CREATE TABLE `tb_servicecategory` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `t_15` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `t_30` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `t_45` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `t_60` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `tb_transaction`
--

CREATE TABLE `tb_transaction` (
  `id` int(11) NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `booking_id` varchar(20) NOT NULL,
  `buyer_id` varchar(20) NOT NULL,
  `seller_id` varchar(20) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `google_id` varchar(50) CHARACTER SET utf8 NOT NULL,
  `fb_id` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8 NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `public_profile` varchar(191) DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `remember_token` varchar(191) DEFAULT NULL,
  `picture` varchar(150) CHARACTER SET utf8 NOT NULL,
  `dob` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `gender` varchar(8) CHARACTER SET utf8 NOT NULL,
  `ssn` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `type` varchar(10) CHARACTER SET utf8 NOT NULL,
  `profile_complete` varchar(5) CHARACTER SET utf8 NOT NULL,
  `description` varchar(10000) CHARACTER SET utf8 NOT NULL,
  `languages` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `tools` varchar(500) CHARACTER SET utf8 NOT NULL,
  `created_at` datetime NOT NULL,
  `approve` int(11) NOT NULL,
  `token` varchar(200) CHARACTER SET utf8 NOT NULL,
  `state` varchar(10) CHARACTER SET utf8 NOT NULL,
  `rating` varchar(10) CHARACTER SET utf8 NOT NULL,
  `count` int(11) NOT NULL,
  `notification` varchar(5) CHARACTER SET utf8 NOT NULL,
  `timezone` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT 'America/Chicago',
  `account_id` varchar(50) NOT NULL DEFAULT '',
  `payment_type` varchar(50) DEFAULT NULL,
  `country` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `total_balance` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_withdrawl` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deduction` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `withdraw_status` enum('request_made','do_request') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'do_request',
  `stripe_public_key` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `stripe_secret_key` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `withdraws`
--

CREATE TABLE `withdraws` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `specialist_id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('withdraw','paid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'withdraw',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--
-- Indexes for dumped tables
--


--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bids_service_request_id_foreign` (`service_request_id`),
  ADD KEY `bids_specialist_id_foreign` (`specialist_id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_post_comments`
--
ALTER TABLE `blog_post_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_post_comment_like_dislikes`
--
ALTER TABLE `blog_post_comment_like_dislikes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_post_comment_replies`
--
ALTER TABLE `blog_post_comment_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_post_comment_reply_like_dislikes`
--
ALTER TABLE `blog_post_comment_reply_like_dislikes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_post_like_dislikes`
--
ALTER TABLE `blog_post_like_dislikes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `channels`
--
ALTER TABLE `channels`
  ADD UNIQUE KEY `channels_channel_unique` (`channel`);

--
-- Indexes for table `client_specialist_disputes`
--
ALTER TABLE `client_specialist_disputes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dispute_replies`
--
ALTER TABLE `dispute_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dispute_replies_dispute_id_foreign` (`dispute_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_user_id_foreign` (`user_id`),
  ADD KEY `payments_specialist_id_foreign` (`specialist_id`);

--
-- Indexes for table `service_requests`
--
ALTER TABLE `service_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_requests_user_id_foreign` (`user_id`),
  ADD KEY `service_requests_category_id_foreign` (`category_id`);

--
-- Indexes for table `tb_availabletime`
--
ALTER TABLE `tb_availabletime`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_availabletime_user_id_foreign` (`user_id`);

--
-- Indexes for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_booking_buyer_id_foreign` (`buyer_id`),
  ADD KEY `tb_booking_seller_id_foreign` (`seller_id`);

--
-- Indexes for table `tb_categories`
--
ALTER TABLE `tb_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_fee`
--
ALTER TABLE `tb_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_paymentinfo`
--
ALTER TABLE `tb_paymentinfo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_paymentinfo_user_id_foreign` (`user_id`);

--
-- Indexes for table `tb_portofolio`
--
ALTER TABLE `tb_portofolio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_portofolio_user_id_foreign` (`user_id`);

--
-- Indexes for table `tb_review`
--
ALTER TABLE `tb_review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_review_buyer_id_foreign` (`buyer_id`),
  ADD KEY `tb_review_seller_id_foreign` (`seller_id`);

--
-- Indexes for table `tb_servicecategory`
--
ALTER TABLE `tb_servicecategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_servicecategory_user_id_foreign` (`user_id`);

--
-- Indexes for table `tb_transaction`
--
ALTER TABLE `tb_transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_transaction_booking_id_foreign` (`booking_id`),
  ADD KEY `tb_transaction_buyer_id_foreign` (`buyer_id`),
  ADD KEY `tb_transaction_seller_id_foreign` (`seller_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraws`
--
ALTER TABLE `withdraws`
  ADD PRIMARY KEY (`id`),
  ADD KEY `withdraws_specialist_id_foreign` (`specialist_id`),
  ADD KEY `withdraws_payment_id_foreign` (`payment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `blog_post_comments`
--
ALTER TABLE `blog_post_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `blog_post_comment_like_dislikes`
--
ALTER TABLE `blog_post_comment_like_dislikes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `blog_post_comment_replies`
--
ALTER TABLE `blog_post_comment_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `blog_post_comment_reply_like_dislikes`
--
ALTER TABLE `blog_post_comment_reply_like_dislikes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog_post_like_dislikes`
--
ALTER TABLE `blog_post_like_dislikes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_specialist_disputes`
--
ALTER TABLE `client_specialist_disputes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dispute_replies`
--
ALTER TABLE `dispute_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111111129;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `service_requests`
--
ALTER TABLE `service_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_availabletime`
--
ALTER TABLE `tb_availabletime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=868;

--
-- AUTO_INCREMENT for table `tb_booking`
--
ALTER TABLE `tb_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=437;

--
-- AUTO_INCREMENT for table `tb_categories`
--
ALTER TABLE `tb_categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT for table `tb_fee`
--
ALTER TABLE `tb_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_paymentinfo`
--
ALTER TABLE `tb_paymentinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=867;

--
-- AUTO_INCREMENT for table `tb_portofolio`
--
ALTER TABLE `tb_portofolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1635;

--
-- AUTO_INCREMENT for table `tb_review`
--
ALTER TABLE `tb_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `tb_servicecategory`
--
ALTER TABLE `tb_servicecategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1627;

--
-- AUTO_INCREMENT for table `tb_transaction`
--
ALTER TABLE `tb_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1613;

--
-- AUTO_INCREMENT for table `withdraws`
--
ALTER TABLE `withdraws`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dispute_replies`
--
ALTER TABLE `dispute_replies`
  ADD CONSTRAINT `dispute_replies_dispute_id_foreign` FOREIGN KEY (`dispute_id`) REFERENCES `client_specialist_disputes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
