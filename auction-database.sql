-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2024 at 09:17 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auction-database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` int(11) NOT NULL DEFAULT 1 COMMENT 'admin access level',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `user_id`, `role`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '2024-01-01 12:54:11', '2024-01-01 12:54:11');

-- --------------------------------------------------------

--
-- Table structure for table `auctions`
--

CREATE TABLE `auctions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `current_price` int(11) NOT NULL,
  `current_winner_id` bigint(20) UNSIGNED DEFAULT NULL,
  `no_jumper_limit` int(11) DEFAULT NULL,
  `start_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `timer` timestamp NULL DEFAULT current_timestamp(),
  `min_price` int(11) NOT NULL DEFAULT 0 COMMENT 'minimum price which auction can finish otherwise wait for new order',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=active 0=deactive 3=finished  100=running',
  `final_winner_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auctions`
--

INSERT INTO `auctions` (`id`, `current_price`, `current_winner_id`, `no_jumper_limit`, `start_time`, `timer`, `min_price`, `status`, `final_winner_id`, `product_id`, `created_at`, `updated_at`) VALUES
(212, 266, 2, 70, '2024-02-02 11:45:00', '2024-02-18 10:58:38', 200, 100, NULL, 7, '2024-01-21 08:10:28', '2024-02-18 10:58:28'),
(213, 140, 2, 100000, '2024-02-02 12:15:00', '2024-02-18 11:15:39', 20, 100, NULL, 10, '2024-01-21 05:56:05', '2024-02-18 11:15:29'),
(546, 77, 2, 100, '2024-02-02 11:45:00', '2024-02-18 14:07:20', 200, 100, NULL, 8, '2024-01-27 04:34:51', '2024-02-18 14:07:10'),
(547, 6, 2, 50, '2024-02-14 09:30:00', '2024-02-13 02:59:22', 75, 1, NULL, 24, '2024-02-13 02:38:33', '2024-02-13 02:59:12'),
(548, 3, 2, 45, '2024-02-13 08:30:00', '2024-02-13 03:46:09', 81, 1, NULL, 10, '2024-02-13 02:42:07', '2024-02-13 03:45:59');

-- --------------------------------------------------------

--
-- Table structure for table `bidding_history`
--

CREATE TABLE `bidding_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `auction_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `bid_price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bidding_history`
--

INSERT INTO `bidding_history` (`id`, `user_id`, `auction_id`, `category_id`, `bid_price`, `created_at`) VALUES
(1, 2, 546, 35, 77, '2024-02-18 17:37:10');

-- --------------------------------------------------------

--
-- Table structure for table `bidding_queue`
--

CREATE TABLE `bidding_queue` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bid_buddy_id` bigint(20) UNSIGNED NOT NULL,
  `auction_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL COMMENT ' 1 = pending  0=excuted',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bidding_queue`
--

INSERT INTO `bidding_queue` (`id`, `bid_buddy_id`, `auction_id`, `status`, `created_at`) VALUES
(22, 10, 212, 0, '2024-02-04 08:12:02'),
(23, 10, 212, 0, '2024-02-04 08:18:36'),
(24, 10, 212, 0, '2024-02-03 08:18:43'),
(25, 10, 212, 0, '2024-02-04 08:18:50'),
(26, 10, 212, 0, '2024-02-04 08:19:08'),
(27, 10, 212, 0, '2024-02-04 08:19:16'),
(28, 10, 212, 0, '2024-02-04 08:19:52'),
(29, 10, 212, 0, '2024-02-04 08:19:59'),
(30, 10, 212, 0, '2024-02-04 08:20:11'),
(31, 10, 212, 0, '2024-02-04 08:20:18'),
(32, 10, 212, 0, '2024-02-04 08:20:26'),
(33, 10, 212, 0, '2024-02-04 08:20:34'),
(34, 10, 212, 0, '2024-02-04 08:27:20'),
(35, 10, 212, 0, '2024-02-04 08:27:28'),
(36, 10, 212, 0, '2024-02-04 08:30:35'),
(37, 12, 212, 0, '2024-02-04 08:30:43'),
(38, 10, 212, 0, '2024-02-05 10:34:01'),
(39, 10, 212, 0, '2024-02-05 10:35:53'),
(40, 10, 212, 0, '2024-02-05 10:39:50'),
(41, 10, 212, 0, '2024-02-05 10:43:09'),
(42, 10, 212, 0, '2024-02-05 12:46:01'),
(43, 10, 212, 0, '2024-02-05 12:54:10'),
(44, 10, 212, 0, '2024-02-05 12:54:22'),
(45, 10, 212, 0, '2024-02-05 12:54:33'),
(46, 10, 212, 0, '2024-02-05 12:54:41'),
(47, 10, 212, 0, '2024-02-05 12:54:51'),
(48, 10, 212, 0, '2024-02-05 12:55:03'),
(49, 10, 212, 0, '2024-02-05 12:55:11'),
(50, 10, 212, 0, '2024-02-05 12:55:22'),
(51, 11, 212, 0, '2024-02-05 12:55:31'),
(52, 12, 212, 0, '2024-02-05 13:17:20'),
(53, 10, 212, 0, '2024-02-05 13:17:30'),
(54, 11, 212, 0, '2024-02-05 13:17:42'),
(55, 12, 212, 0, '2024-02-13 06:31:06'),
(56, 10, 212, 0, '2024-02-13 06:31:55'),
(57, 11, 212, 0, '2024-02-13 06:32:02'),
(58, 12, 212, 0, '2024-02-13 06:32:10'),
(59, 10, 212, 0, '2024-02-13 06:32:22'),
(60, 11, 212, 0, '2024-02-13 06:32:29'),
(61, 12, 212, 0, '2024-02-13 06:33:09'),
(62, 10, 212, 0, '2024-02-13 06:33:17'),
(63, 11, 212, 0, '2024-02-13 06:33:25'),
(64, 12, 212, 0, '2024-02-13 06:33:32'),
(65, 10, 212, 0, '2024-02-13 06:33:40'),
(66, 11, 212, 0, '2024-02-13 06:33:50'),
(67, 12, 212, 0, '2024-02-13 06:35:01'),
(68, 10, 212, 0, '2024-02-13 06:35:12'),
(69, 11, 212, 0, '2024-02-13 06:35:29'),
(70, 12, 212, 0, '2024-02-13 06:36:25'),
(71, 10, 212, 0, '2024-02-13 07:28:35'),
(72, 11, 212, 0, '2024-02-13 07:48:08'),
(73, 12, 212, 0, '2024-02-13 07:48:20'),
(74, 10, 212, 0, '2024-02-13 07:48:32'),
(75, 11, 212, 0, '2024-02-13 07:48:45'),
(76, 12, 212, 0, '2024-02-13 07:51:53'),
(77, 10, 212, 0, '2024-02-13 08:47:42'),
(78, 13, 213, 0, '2024-02-17 17:44:06'),
(79, 11, 212, 1, '2024-02-18 14:24:00'),
(80, 12, 212, 1, '2024-02-18 14:26:17'),
(81, 10, 212, 1, '2024-02-18 14:28:25');

-- --------------------------------------------------------

--
-- Table structure for table `bid_buddies`
--

CREATE TABLE `bid_buddies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `auction_id` bigint(20) UNSIGNED NOT NULL,
  `available_bids` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1= running 0=deactive by user 3=runs out of bid 4=auction over',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bid_buddies`
--

INSERT INTO `bid_buddies` (`id`, `user_id`, `auction_id`, `available_bids`, `status`, `created_at`) VALUES
(10, 2, 212, 10, 1, '2024-02-04 08:12:02'),
(11, 3, 212, 1, 1, '2024-02-04 08:12:02'),
(12, 4, 212, 3, 1, '2024-02-04 08:12:02'),
(13, 2, 213, -1, 1, '2024-02-17 17:44:06');

-- --------------------------------------------------------

--
-- Table structure for table `bid_packages`
--

CREATE TABLE `bid_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bid_amount` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL DEFAULT 0 COMMENT ' precentage of discount when admin promot it ',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bid_packages`
--

INSERT INTO `bid_packages` (`id`, `bid_amount`, `price`, `discount`, `created_at`, `updated_at`) VALUES
(2, 50000, 1000, 0, '2024-01-20 04:12:59', '2024-01-21 02:56:50'),
(5, 6546, 84, 3, '2024-01-20 04:13:11', '2024-01-20 04:13:11');

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE `bookmarks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `auction_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookmarks`
--

INSERT INTO `bookmarks` (`id`, `user_id`, `auction_id`, `created_at`, `updated_at`) VALUES
(2, 2, 212, '2024-02-06 13:10:23', '2024-02-06 13:10:23'),
(4, 2, 546, '2024-02-06 13:11:10', '2024-02-06 13:11:10');

-- --------------------------------------------------------

--
-- Table structure for table `buy_it_now_offers`
--

CREATE TABLE `buy_it_now_offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `spent_bids` int(11) NOT NULL DEFAULT 0,
  `time_limit` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Asa Schuster', 'Asperiores quos quos necessitatibus animi et et quo. Eveniet aut facilis non voluptatum officiis accusamus eligendi. Enim porro ea nostrum non neque. Ut earum et nulla natus voluptas.', '2024-01-02 04:18:29', '2024-01-02 04:18:29'),
(3, 'Gia Prohaska', NULL, '2024-01-02 04:18:29', '2024-01-02 04:18:29'),
(4, 'Aurelie Wehner', 'Aliquid ex maiores nobis velit. Et doloribus porro accusamus dolores deserunt qui.', '2024-01-02 04:18:29', '2024-01-02 04:18:29'),
(5, 'Mrs. Neoma Jacobs', 'Et mollitia ullam similique in beatae adipisci quia. Earum ipsam dolore autem ducimus. Voluptatibus cupiditate ratione tempora dignissimos. Et earum qui sit fugit molestias aut.', '2024-01-02 04:18:29', '2024-01-02 04:18:29'),
(6, 'Ashly Reynolds', 'Rerum reiciendis neque eum. Porro eveniet aperiam sapiente consequatur non qui dolore. Temporibus ut accusantium aut aut magnam.', '2024-01-02 04:18:29', '2024-01-02 04:18:29'),
(7, 'Kelsie Cassin', 'Dolorem dolorem accusamus repellat deserunt. Fugit rerum quia quod. Aliquid sed ducimus nobis reiciendis.', '2024-01-02 04:18:29', '2024-01-02 04:18:29'),
(8, 'Ross Strosin', NULL, '2024-01-02 04:18:29', '2024-01-02 04:18:29'),
(9, 'Mr. Demario Harber', NULL, '2024-01-02 04:18:29', '2024-01-02 04:18:29'),
(10, 'Pinkie Herman', 'Voluptas omnis amet aliquam dolores. Fuga accusamus quo ipsam ducimus asperiores. Omnis error illum ratione ratione perferendis.', '2024-01-02 04:18:29', '2024-01-02 04:18:29'),
(11, 'Juwan Jacobi', NULL, '2024-01-02 04:18:29', '2024-01-02 04:18:29'),
(12, 'Myrtle Sauer', 'Minima totam quasi fugit. Nulla unde saepe neque perferendis optio debitis. Dicta voluptates eveniet ut porro quia. Iusto aut nisi cupiditate consequatur fugit nemo.', '2024-01-02 04:18:29', '2024-01-02 04:18:29'),
(13, 'Karley Volkman', NULL, '2024-01-02 04:18:29', '2024-01-02 04:18:29'),
(14, 'Sister Swift', NULL, '2024-01-02 04:18:29', '2024-01-02 04:18:29'),
(15, 'Myra Hermiston', 'Molestias voluptate at ipsum dignissimos quis. Repellat id numquam esse sed hic accusantium quam. Enim ipsum quam repellat explicabo qui odit. Magni placeat dignissimos eum eos.', '2024-01-02 04:18:29', '2024-01-02 04:18:29'),
(16, 'dsds', 'www', '2024-01-02 08:32:22', '2024-01-02 08:32:22'),
(17, 'سلام دنیا', 'توضیحات', '2024-01-02 08:35:17', '2024-01-02 08:35:17'),
(19, 'هاییییییی', 'www', '2024-01-02 10:02:16', '2024-01-02 10:02:16'),
(23, 'Lilian Kuhic V', 'Et sit ut adipisci eveniet. Praesentium quibusdam sed porro voluptates natus id. Ducimus adipisci rerum dolor. Neque ipsam dignissimos expedita. Sint et omnis aut doloremque blanditiis libero quod.', '2024-01-03 09:44:20', '2024-01-03 09:44:20'),
(24, 'Anissa Goyette PhD', NULL, '2024-01-03 09:44:20', '2024-01-03 09:44:20'),
(25, 'Zoey Stokes', NULL, '2024-01-03 09:44:20', '2024-01-03 09:44:20'),
(26, 'Tyra Marquardt', NULL, '2024-01-03 09:44:20', '2024-01-03 09:44:20'),
(27, 'Eriberto Murray', 'Aut sint et commodi eos sit. Molestias incidunt veritatis neque maiores. Vel libero fugit deleniti quisquam.', '2024-01-03 09:44:20', '2024-01-03 09:44:20'),
(28, 'Demond Will', 'Sapiente expedita quos qui placeat blanditiis. Voluptate nulla facere nam maiores. Nulla exercitationem et vero vitae rerum adipisci quae. Sit ea rem expedita perferendis ut.', '2024-01-03 09:44:20', '2024-01-03 09:44:20'),
(29, 'Velma Luettgen', NULL, '2024-01-03 09:44:20', '2024-01-03 09:44:20'),
(30, 'Modesta Beatty', 'Voluptates excepturi aut non corporis aut distinctio esse. Iste magnam sint aut qui unde qui. Quo est ex porro officiis quis tempora numquam ad.', '2024-01-03 09:44:20', '2024-01-03 09:44:20'),
(31, 'Karina Wisozk', NULL, '2024-01-03 09:44:20', '2024-01-03 09:44:20'),
(32, 'Geraldine Jakubowski', NULL, '2024-01-03 09:44:20', '2024-01-03 09:44:20'),
(33, 'Prof. Kelly Breitenberg', NULL, '2024-01-03 09:44:20', '2024-01-03 09:44:20'),
(34, 'Prof. Leatha Kunde', 'Minima quo ex dolorum ea deserunt fugiat rerum. Voluptates qui illo esse est. Laudantium minima provident labore eum.', '2024-01-03 09:44:20', '2024-01-03 09:44:20'),
(35, 'Assunta Medhurst DVM', 'Perferendis voluptate optio quaerat atque numquam. Officia reprehenderit qui labore exercitationem dolorem ratione. Doloribus in est suscipit aut et.', '2024-01-03 09:44:20', '2024-01-03 09:44:20'),
(36, 'Destini Huels MD', NULL, '2024-01-03 09:44:20', '2024-01-03 09:44:20'),
(37, 'Madisyn Parisian', 'Ut quo expedita animi odio et. Dolor aut molestiae voluptate quia provident. Totam voluptas illum recusandae.', '2024-01-03 09:44:20', '2024-01-03 09:44:20'),
(38, 'Jaquan McGlynn', 'In recusandae non fugiat et nam. Sed tempore dolor qui dolore ad. Minus accusamus consectetur doloribus. Fuga corrupti laboriosam temporibus autem ut aperiam ut dolorem.', '2024-01-03 09:44:20', '2024-01-03 09:44:20'),
(41, 'Luciano Runolfsdottir', 'Tenetur blanditiis perferendis adipisci quod ipsum. Magnam natus et praesentium. Maiores consequatur et et. Unde ut iusto vero rerum et ad. Et dignissimos ullam et vel.', '2024-01-03 09:44:21', '2024-01-20 03:30:37'),
(43, 'Kayleigh Rogahn', 'Odit omnis quae fugiat eos. Quo repudiandae excepturi natus alias libero repellendus corrupti. Sit nam aut quo delectus dolor magni.', '2024-01-03 09:44:21', '2024-01-03 09:44:21'),
(44, 'Mrs. Gia Spinka DVM', 'cxcxcxcxc', '2024-01-03 09:44:21', '2024-01-20 05:57:42'),
(45, 'Prof. Dusty Pfannerstill', 'Dolores ducimus amet eveniet cupiditate. Aut molestiae enim velit libero. Pariatur odio ullam ex deserunt aut qui ipsam debitis.', '2024-01-03 09:44:21', '2024-01-03 09:44:21'),
(46, 'Mr. Khalid Breitenberg', 'Vel enim vel delectus qui quos sint impedit. Dolorum vel delectus consequuntur fugit.', '2024-01-03 09:44:21', '2024-01-03 09:44:21'),
(47, 'Dennis Daugherty PhD', 'Alias facere maiores qui ea sint. Corporis architecto neque et ut eum. Illum est doloribus atque ut facilis optio corporis. Nihil voluptas officia in optio quo quo. Aut dolores accusamus corrupti.', '2024-01-03 09:44:21', '2024-01-03 09:44:21');

-- --------------------------------------------------------

--
-- Table structure for table `challenges`
--

CREATE TABLE `challenges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reward_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` int(11) NOT NULL COMMENT 'the type of action that challenge require: 1=bidding  2=win an auction ',
  `time_type` int(11) NOT NULL COMMENT '1= daily 2=weekly 3=mounthly',
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `number_to_win` int(11) NOT NULL COMMENT 'how many times user have to (ex:bid) in specific category to win',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT ' 1=active 0=deactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `challenges`
--

INSERT INTO `challenges` (`id`, `reward_id`, `description`, `type`, `time_type`, `category_id`, `number_to_win`, `status`, `created_at`, `updated_at`) VALUES
(2, 3, 'اسم جدیدwdhw', 2, 2, 4, 74, 0, '2024-01-07 17:14:00', '2024-01-07 18:04:17'),
(3, 3, 'd;fhd', 1, 2, 24, 564, 1, '2024-01-07 17:23:56', '2024-01-07 17:23:56'),
(5, 3, 'dsds', 2, 3, 6, 1, 1, '2024-01-20 03:06:58', '2024-01-20 03:06:58'),
(6, 3, '65656', 1, 1, 35, 1, 1, '2024-01-20 03:08:05', '2024-01-20 03:08:05'),
(7, 3, '56465', 2, 1, 24, 4, 1, '2024-01-20 03:10:42', '2024-01-20 03:10:42');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `state_id`, `name`, `created_at`, `updated_at`) VALUES
(2, 3, 'hegmatane', '2024-01-03 02:47:14', '2024-01-03 02:50:22'),
(4, 3, 'dsdddddd', '2024-01-04 16:44:55', '2024-01-04 16:44:55');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `socre` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `socre`, `title`, `content`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 50000, '50000', '50000', 2, 10, '2024-02-06 14:01:38', '2024-02-06 14:01:38');

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
-- Table structure for table `highest_bidders`
--

CREATE TABLE `highest_bidders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `time_spent` int(11) NOT NULL DEFAULT 0 COMMENT 'the value is in secounds',
  `current_level_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `multiplier` int(11) NOT NULL DEFAULT 1 COMMENT ' the ratio which user time might get multipy on',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `highest_bidders`
--

INSERT INTO `highest_bidders` (`id`, `user_id`, `time_spent`, `current_level_id`, `multiplier`, `created_at`, `updated_at`) VALUES
(2, 2, 3686, 4, 6, '2024-02-18 10:51:58', '2024-02-18 14:07:10');

-- --------------------------------------------------------

--
-- Table structure for table `highest_bidder_levels`
--

CREATE TABLE `highest_bidder_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `time_needed` int(11) NOT NULL COMMENT 'time needed to complete this level in hours',
  `bid_reward` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `highest_bidder_levels`
--

INSERT INTO `highest_bidder_levels` (`id`, `name`, `time_needed`, `bid_reward`, `created_at`, `updated_at`) VALUES
(1, 'base', 1, 120, '2024-02-18 15:35:07', '2024-02-18 15:35:07'),
(2, 'base 2', 74, 120, '2024-02-18 15:35:07', '2024-02-18 15:35:07'),
(3, 'base 3', 3, 120, '2024-02-18 15:35:07', '2024-02-18 15:35:07'),
(4, 'base 4', 2, 120, '2024-02-18 15:35:07', '2024-02-18 15:35:07');

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
(406, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(407, '2019_08_19_000000_create_failed_jobs_table', 1),
(408, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(409, '2023_11_30_143707_create_users_table', 1),
(410, '2023_12_28_143707_create_categories_table', 1),
(411, '2023_12_29_143707_create_products_table', 1),
(412, '2023_12_29_143707_create_rewards_table', 1),
(413, '2023_12_29_143707_create_states_table', 1),
(414, '2023_12_29_143707_create_transactions_table', 1),
(415, '2023_12_30_143707_create_admins_table', 1),
(416, '2023_12_30_143707_create_auctions_table', 1),
(417, '2023_12_30_143707_create_bid_buddies_table', 1),
(418, '2023_12_30_143707_create_bid_packages_table', 1),
(420, '2023_12_30_143707_create_bidding_queue_table', 1),
(421, '2023_12_30_143707_create_bookmarks_table', 1),
(422, '2023_12_30_143707_create_buy_it_now_offers_table', 1),
(423, '2023_12_30_143707_create_challenges_table', 1),
(424, '2023_12_30_143707_create_cities_table', 1),
(425, '2023_12_30_143707_create_comments_table', 1),
(426, '2023_12_30_143707_create_highest_bidder_levels_table', 1),
(428, '2023_12_30_143707_create_product_galleries_table', 1),
(429, '2023_12_30_143707_create_redeem_codes_table', 1),
(430, '2023_12_30_143707_create_special_offers_table', 1),
(431, '2023_12_30_143707_create_tickets_table', 1),
(432, '2023_12_30_143707_create_transaction_histories_table', 1),
(433, '2023_12_30_143707_create_user_auction_wins_table', 1),
(434, '2023_12_30_143707_create_user_challenges_table', 1),
(435, '2023_12_30_143707_create_user_ips_table', 1),
(436, '2023_12_30_143707_create_user_redeem_codes_table', 1),
(437, '2023_12_30_143707_create_user_shiped_products_table', 1),
(440, '2024_01_04_193925_create_tempraries_table', 2),
(441, '2023_12_30_143707_create_winners_table', 3),
(442, '2023_12_30_143707_create_highest_bidders_table', 4),
(445, '2023_12_30_143707_create_bidding_history_table', 5);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `discount` int(11) NOT NULL DEFAULT 0 COMMENT ' precentage of discount when admin promot it ',
  `sales_count` int(11) NOT NULL DEFAULT 0,
  `short_desc` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `product_inventory` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `title`, `discount`, `sales_count`, `short_desc`, `description`, `price`, `product_inventory`, `created_at`, `updated_at`) VALUES
(4, 6, 'Miss', 4890, 6918359, NULL, NULL, NULL, 716435356, '2024-01-03 09:44:21', '2024-01-03 09:44:21'),
(5, 27, 'Mr.', 3920166, 3, 'Maiores odit qui fuga dolorem. Quidem quis consequatur molestias neque. Similique ut ut qui labore eligendi delectus.', NULL, 4106798, 280, '2024-01-03 09:44:21', '2024-01-03 09:44:21'),
(6, 6, 'Dr.', 5, 95697, 'Quis a ut occaecati et dolorem. Impedit voluptate rerum aut adipisci. Repellendus aspernatur perspiciatis ratione itaque consectetur.', 'Quia magni repellendus possimus molestiae ipsum et optio. Non ex doloribus et rerum iste. Illum maiores at fugiat perspiciatis aliquid. Ipsa qui aut aut delectus blanditiis.', NULL, 16737, '2024-01-03 09:44:21', '2024-01-03 09:44:21'),
(7, 30, 'Iphone 15', 675677210, 47535, 'Brand new iphone', '{\"ops\":[{\"insert\":null}]}', 8, 460972, '2024-01-03 09:44:21', '2024-01-27 09:43:08'),
(8, 30, 'playstation 5', 69, 456880452, 'Playstation 5 for y.......', '{\"ops\":[{\"insert\":null}]}', 4995, 4013826, '2024-01-03 09:44:21', '2024-01-27 09:47:40'),
(9, 31, 'Prof.', 743173, 7213, 'Quae est iure molestias tempore. Quo enim veritatis consequuntur fuga dolores aspernatur nemo. Sint molestias perspiciatis recusandae. Dolorum saepe occaecati aut minus consequatur.', NULL, 8, 234256, '2024-01-03 09:44:21', '2024-01-03 09:44:21'),
(10, 6, 'mabook pro', 718197, 505513, 'new maabook for you', '{\"ops\":[{\"insert\":null}]}', 10000, 8321, '2024-01-03 09:44:21', '2024-01-27 09:45:16'),
(11, 33, 'Mrs.', 78765, 66636586, NULL, 'Quo ut non rerum aut tempore. Quasi commodi dolorum quo. Earum voluptatem est rerum aperiam tempore est id.', NULL, 16029701, '2024-01-03 09:44:21', '2024-01-03 09:44:21'),
(12, 34, 'Prof.', 7, 71, NULL, 'Rerum consequuntur voluptas deserunt est eum quis exercitationem. Consequuntur aut cum et et et. Ratione exercitationem magni culpa vitae. Tenetur qui et et beatae.', 72010447, 1, '2024-01-03 09:44:21', '2024-01-03 09:44:21'),
(13, 35, 'Prof.', 303, 922, NULL, 'Rerum velit architecto occaecati quos est perferendis. Corporis eos nobis non ab. In iure vero officiis in aut.', NULL, 5919, '2024-01-03 09:44:21', '2024-01-03 09:44:21'),
(14, 36, 'Mr.', 922101556, 3704179, NULL, 'Eos a amet sit nesciunt error quo. Et et ut velit atque est velit. In ut laboriosam rerum aliquid.', 75, 320, '2024-01-03 09:44:21', '2024-01-03 09:44:21'),
(15, 37, 'Prof.', 750779226, 8025307, NULL, 'Laboriosam earum quia aspernatur consequatur ea reprehenderit. Nihil voluptate atque officiis sed. Eveniet eos aut voluptatem iste similique. Qui quaerat velit asperiores ipsum et deleniti.', 243, 26401197, '2024-01-03 09:44:21', '2024-01-03 09:44:21'),
(16, 38, 'Mr.', 27255963, 1288267, 'Est dicta est perferendis illo. Et quidem sit voluptatum vel nulla placeat quo laboriosam. Et nesciunt dolorem voluptatem nulla reprehenderit quia. Est at quam eum.', NULL, 1, 5732, '2024-01-03 09:44:21', '2024-01-03 09:44:21'),
(19, 41, 'Prof.', 99, 7202463, 'Quod nemo quo repudiandae itaque incidunt. Non amet qui quod molestiae temporibus dolore quibusdam. Deserunt voluptatum dolor ducimus dolorem.', NULL, NULL, 68, '2024-01-03 09:44:21', '2024-01-03 09:44:21'),
(21, 43, 'Prof.', 64186, 209629754, NULL, 'Dolore error debitis non officiis. Beatae consequatur aut excepturi et. Ipsam non sunt dolorem. Illo fugit inventore fuga ullam aut eos repellat.', NULL, 2, '2024-01-03 09:44:21', '2024-01-03 09:44:21'),
(22, 44, 'Mrs.', 8548530, 9839, NULL, 'Modi ut non eum molestiae a. Sed nostrum animi aperiam. Nisi molestias molestias dolorem dolorem iste soluta odio illum. Ex nihil molestiae est consectetur.', NULL, 4810658, '2024-01-03 09:44:21', '2024-01-03 09:44:21'),
(23, 45, 'Prof.', 8, 33, 'Aut repellendus veritatis sed voluptate et. Sed nesciunt qui aliquam explicabo eligendi minus voluptatem. Voluptatem nihil voluptas facilis et veritatis esse quas aliquid.', NULL, NULL, 57617, '2024-01-03 09:44:21', '2024-01-03 09:44:21'),
(24, 46, 'Prof.', 34, 42992141, NULL, 'Natus sed quae expedita accusamus qui sit velit. Atque veritatis unde aut. Temporibus ut ea ipsa inventore.', NULL, 10792, '2024-01-03 09:44:21', '2024-01-03 09:44:21'),
(25, 47, 'Prof.', 273821, 863759, NULL, 'Consequatur nihil et blanditiis incidunt accusamus. Accusamus qui deserunt iusto sunt omnis.', NULL, 8352, '2024-01-03 09:44:21', '2024-01-03 09:44:21'),
(30, 4, 'محصول جدید', 10, 0, 'خیلی خفنه از دستت نره', '{\"ops\":[{\"attributes\":{\"italic\":true,\"bold\":true},\"insert\":\"\\u0628\\u0627 \\u0633\\u0644\\u0627\\u0645\"},{\"attributes\":{\"header\":2},\"insert\":null},{\"attributes\":{\"color\":\"#e60000\",\"background\":\"#bbbbbb\"},\"insert\":\"\\u0627\\u06cc\\u0646 \\u0645\\u062d\\u0635\\u0648\\u0644 \\u0631\\u0648 \\u0627\\u0632 \\u062f\\u0633\\u062a \\u0646\\u062f\\u0647\"},{\"insert\":null}]}', 99999, 44, '2024-01-04 17:10:18', '2024-01-07 06:35:17'),
(31, 28, 'محصول عالی (جدید)', 15, 0, 'از دستش نده پشیمون میشی!', '{\"ops\":[{\"insert\":\"\\u0644\\u0637\\u0641\\u0627 \\u0627\\u0632 \\u0645\\u0627\"},{\"attributes\":{\"color\":\"#e60000\",\"size\":\"large\"},\"insert\":\"\\u062e\\u0631\\u06cc\\u062f\"},{\"insert\":\"\\u06a9\\u0646\\u06cc\\u062f\"},{\"attributes\":{\"background\":\"#000000\",\"color\":\"#ffffff\"},\"insert\":\"\\u0628\\u0627 dddsdsds!\"},{\"insert\":null},{\"attributes\":{\"background\":\"#000000\",\"color\":\"#ffffff\"},\"insert\":\"\\u0644\\u0628\\u0628\\u0644\\u0628\\u0644\\u0628\"},{\"insert\":null},{\"insert\":{\"image\":\"data:image\\/jpeg;base64,\\/9j\\/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP\\/sABFEdWNreQABAAQAAAA8AAD\\/4QMdaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI\\/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjYtYzE0MiA3OS4xNjA5MjQsIDIwMTcvMDcvMTMtMDE6MDY6MzkgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOkJFODg3OTlCRjQzMDExRUFBNUQ1OUU5QkRCMTkwMTk4IiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOkJFODg3OTlBRjQzMDExRUFBNUQ1OUU5QkRCMTkwMTk4IiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDQyAyMDE4IFdpbmRvd3MiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0iRDFFQzNFN0I2QzBBQkQ5OTk0MDM5NUFBOTVEN0U5RTciIHN0UmVmOmRvY3VtZW50SUQ9IkQxRUMzRTdCNkMwQUJEOTk5NDAzOTVBQTk1RDdFOUU3Ii8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+\\/+4ADkFkb2JlAGTAAAAAAf\\/bAIQABgQEBAUEBgUFBgkGBQYJCwgGBggLDAoKCwoKDBAMDAwMDAwQDA4PEA8ODBMTFBQTExwbGxscHx8fHx8fHx8fHwEHBwcNDA0YEBAYGhURFRofHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8f\\/8AAEQgAlgCWAwERAAIRAQMRAf\\/EAJUAAAEEAwEAAAAAAAAAAAAAAAUABAYHAQIIAwEAAwEBAQAAAAAAAAAAAAAAAAIDBAEFEAACAQMCBAQEAgkCBAcAAAABAgMAEQQhBTFBEgZRIhMHYXGBMpEUobHBQlJigiMI0RVyklMW8OGiM0NjVBEAAgICAgMAAgICAwAAAAAAAAERAiEDMUFREgQiMmGBcaFiFAX\\/2gAMAwEAAhEDEQA\\/AL6ropmgDFACoAVAAruburt3tbajuu\\/5qYOF1enGSC8kslr+nDGt2ke3IfWhsEpKL7v\\/AMptyklbF7P2ZceNtE3Dcv7kzfFMeM9Kf1MTSOxRUK13zvX3P3kjO3je8jHUaxqJXx1t\\/JHGVFTbKJAeDvnuDEdlbdczMRtGvPKFYfVib0QHsbx99dxwyetjbrlx9B6oUaeRivwAcsLV1JnG0F8T3m74BCybxlNbW4ksb+PgfrRkMEm2\\/wB\\/+\\/MRFnfM\\/NxLbqSWJZFceBPI\\/hQrs66Itr2297tk7uc4GWqYO7jURL1CORfFQ1yCOYuaet\\/JK1I4LKJpxDF6AFyoA1NAGpoA1I1FAD+gBUAKgBUARzv3vvZOyO333jdLyu7GHb8CMgS5U9rhFvwVeLtyHxtXG4O1UnJPc\\/cvdnuFvTbvvU5aGK6Y2LDcY2LGTf0476X8W5njULWNNaThHmXw9mxRKiKMpyVQAdTnx48fnwqau2UdFVES3TcZ8vJaSVy7H+I9Vh86tWpC1pGZZhYczrTCj3CjMgZiB02Njzuuuh8a4zqGMjXJt+PI104FdinlXI6A\\/R6g6SSLqw5qy86ncrrCu67XPgvHuW3F8YxEFxGxLRMODx+Kfy8aKuQtWC\\/vYv3mXuIp2rv8gj35Fvt+QT5MtAL9Ck\\/vgagc6tVkLLsuWmEFQAqANTQBqeIoAf0AKgDFAGsssEEMmRkyLDjQI0s8z6KkaDqZj8ABQEHG\\/fvd2V7j985W4NI8eyYgOPgRcosUHRV\\/+yY+dzx1tWe1uzVWnSPHIkSOD04UVMSCyR4q2HU\\/IG3x41nblmpJVRG96yX6JJJDeWTyKeduLMByA5U+tZJbXgj8cfms2g0052rQ2Z0hMOt26eXAfLhQDPQSyCKOFTYhvJbkba0HDyUFnOljf7T4866wQW2vHiMiiTrUObdS2Oo1H1H6qlZla1JljeouKVcAywr1KB5xJF\\/KOB6f0r8QKRMrZEV3TDyNv3GLLwJDjzCQZGBkRG3TKvn6Q3JgdR41WtiFqnYXtf31F3v2ZibybLuKXxd3hGnRlxjzG3ISCzj51ZMz2UErrpwVAGpoA1PEUAP6AFQAqAKi\\/wAlO9H2bs+Ht\\/Ek6dw7icxyW+5cOMj1G\\/rby\\/jSbH0U1LMnP+2xflsaPEw7+rNqCbG1z9xH8RFZnlm2qSQSz8dFKrGA0WMvRGo4NI51J\\/ivSWwPXJHt7wCkSo\\/mlB\\/vsbauTcIp+A+6no4J3UgFYR1MOPT5mPgLXFUkmqmcPFLSAMNWYdR8Nda5awUoPcXZpHwZ87h+W1AtxIcUr2w4KV0zVsxjbYspzXAsEZZIjx8rG\\/6q7e8C69UyFNuw1ErK\\/wDaZmEUjXt6bj7JPl4\\/CpO2Syp5JRhYTohjYiOVbtCDwD\\/vrpyPEUyciNQR7uHEVUeJh0QNqRfQPxuvh4r+FOvJOy6Jx\\/jP3Z\\/tfeWV2\\/mS9EG+RBYlJ8py4btEw8C6XWq0cMjsUr\\/B0\\/aqkBUAamgDB4igB9QAqAMqCxAHEmwoA5E94t8PcPuzuju18PaCMKC3ARwDUD4s1yaz3eTXrrCQF29S2QkjG0jC7jmvSNbfO+lIkVswgkkUk\\/qE2Ia0JYaEKNB+yluNQD79AZctYgAAvLgepwOPhpU0+yjr0C9v2w5GUFZbJkTql+XQmrfgBRe8I7TXLCuDsqdEGR6d1yHmYA8emMmkvbBSmv8A2TbsztJc\\/s7uB1S7QY3Wp4nSUte3xA1qTtLbLVpFUvJFu3NpRpMxCB6sa45u2oKet5v+UEVa9pSZDXSG1\\/Ae7z7Ug2bu3MxgLYOYolgYjX05QHUm\\/McPpSVfXge9e\\/I2u0kH5fLuMlB0q40LdOgs3jpa\\/jV6sz2QD3G+aZMOewnjFurkQR5W\\/q\\/XVERZF8bLy9t3DF3CElM3bpknjddL+mwb9lOmTaO6Np3WDd9pwt1xyDDnwJkJ0m4HWtyL\\/A6VoTkyNQx1QBg0Aa8xQA+oAVAHll50O34eTuE56YcKGTJkbwWFC5\\/VQ2CUnEG3CbcM\\/IzcgkPkvJm5pFybzMXVT+IFZGzfVG5y1ikYkEdKlmIOluGp+JNqaBWx\\/smTHPlmYgtj4SLEvVp1Snzsx\\/Gp3U4K63EsfL+UzPVnNnYdTGRrdTSHiR8FGgoaOpjnYtuiJgcIWbodI\\/BpGBJPyW96hddGnXkMf7SseXtGFa8gQGS2vnZWc6fICpXX4lqv8ixfZ\\/Ajlxd621+E0Dx24cXYfqIo1qZ\\/wG20Q\\/DKlxo\\/yu5NCR0GRJMRiOI6jYMfkRTLNRXi5YnuDjJunbWx77YeoYFhm0sBIt+nq+ZVl+tcTzJ21Zq14K83GwgE0PCNBJ4m2gb9HS3zrUkY25RG+4heCPccQkvEb3HJT9yfHxFPVdEr+QLugilXHzYGBiyAevlaRfvXT53FdEZ0Z\\/jP3M+4dnZmwztefY5wYL\\/\\/AJsm7Af0yAira3gz7VmS3qoSMGgDXmKAH1ACoAi\\/ujlPi+3PcMyEBjiNHrwtIwQj8DSbH+LH1KbI5LxZxibXlTMpHU6xLIPubTrbXkBooqCWDY3kjM+a8imRz5Z26n5DpXXh4UxNBBs1sXBgx1axsZpyNLyTHq0+S2FKlLko3Cg3wNxmlVoF8qONVB0WMcbn4KPxNcu4R2illndv4k+HtE26zqVafGEW0hhwZm9Muo+RrH7Sz0VSFAZ7UhmzPdDa9vazEQvLKtuClOlfxVb0PwDcS\\/CJF7bZxw\\/cyfZ3PT+YinVSf+rE58tviormp5\\/0G9Yf9Mhnujsw2HvDLYoy400gyoeYCS6tbxAcG9UoobRPY5qrEj7c3XD3TYZdly3SODdLnb8gnyw5qcYZL\\/Z6hAZDwqPDgtMqUVRu+ZkbfLPiTKRLiSECN9AEc9JRvhe6n51ro5Ri2KLAKDcoo2nxV82LkDqiLakcQpPxH2mqIlYG4upyNtYgBz6uOP4ZE4r\\/AFDSmt5JLwWV\\/jpvX+3e5MOG72g3nHlwyCdDKo9SIf8AMhptbyJtr+J1RVzManhQBrQA+oAVAEE98clIfbTcYy3S+VLBCg5nz9TAf0rUt7\\/Et86\\/M5SzVt2yl26XmkkkC8gXYIL\\/APCBwqaLdABrNlFbD000C+CKbD6tXXwFeTcpNlTaKxUnQDiSR\\/pStpIZVdmSLZNpePKjGXjyflnkT1lAK9Ua6leo\\/DwqN5saNbVGXSe7u1O4c3BwxAdvjgQQRxkXVeIW1vAePzqD1s102ImPbXZS7Z37H3BGfUiKGKOTwQRG2v6KWGrJnbNOjXbPPdez87D7yx+5MEeWLJGSb3t\\/cH9wG3I3NL6tWlDq9bUh+CL+9+94+7vjYWDhvPl41wJkBY9DcEsBrrV8SZ1iseSp9k2juFt1OydX5VcodcYyG9JfLyDeK12zq1ItFZOOgh3V7e79gQz5e4Tplm1p3Ri4IYW678Ty1rlNsOBtmhtTJW0yPGSQSfTPmvxUka3+DDUHxrUoMLns8pMh4p4px9wIbq5kCmiUTbhyH8DLfbN5w94xmMcuHkw5cTryCyK36dRSJj2R3FJIjt6iC0coEiD+Vx1D9BrWYTQnSgDXWgB9QAqAKj\\/yMlkGx7Wi6qGnkF\\/4ioW9vgKzfQ8o2\\/GsWZzfnSBO3ol8GFjyF3Yk1zsOhjhbc8sTyKrdIs0r2uR1aKPwpL3yW1apRYOybj2nsv5KaXG\\/Mz40f9uFQAWlPmaR2Olh8ag9bsz0F6URNsT3l2bcVGLNNjxMyllhx8KTNACgli7r6a+VVuekGqV+byZr\\/VRcZC+xzdubyi7h6GLk47apn48bIVvwMsEgEkd\\/HUUttEdlabVZSiwtjy2gZMGQB4wAYHXgVqLlcjQmFO4ZpceEItyziyj50WF15yQPc5oMOJxF6Ub3ByMuXyxRBtNTxZj+6o1NNTV7FXf1UlL99bosfcMuOcbPOfjTLHAcuVcZ3csFDY8KKW0\\/e6joOPGtn\\/Xr0edb7sgTM727gx5BjZZnghyUuIsizhkP7yOAPwIpX8yK1++QRPhGZC4U9FiCwHFTqR9DqKnPrg7ak5AGTjsqkc0YA24EE6EVoqzHesBjAH5rbCraylZI1HLh+wilsoZ2rwdq9r5LZfa+y5Tkl5sDGZieJPpKD+qtNeEYrcsJ2ropjnQdHlACoAqn\\/IrH9TtXb5v+hkuXt\\/AygGob1MGr5bR7LyjmPdNNoxRa\\/qN1D5a2vSLko\\/1LX9pu3MHIwZZchBIrADpP7xYa8axbbZPU+esVk8u8fZbNyswNtbH8sW6mjP22vewtxqmve0G35q3zIZT28xNwTGhzO3QUgREm6ZOhXeNSquvSY2XRvMpNm51oX0pmO\\/8A5qXFiw8XtibKwcTEXHTb\\/wAkp9DNxwBkxlm6mbruEs3NLFa5bZ7YG16a6szIdGOuPLhwqo6ksAwAF+OthoL1juzTXyP9\\/Jkzsc3HSANPpam2ciaV+INz+1I8rMg3GFyMjEDHFgYI0SO+rTBWB\\/uHh1HgOFqrR+BbWXFlhke7j7U3Tcsl8uXGx5MqSweZlKsSNOqyjiV0JUi9O9zXRNfJpfbI5uPtLk75lRZG8ujCABYY4kEaIq6KABroKlfdZmymvVRQkOd37C2XF2lsWCEB1Gj24aVmbyUmTnvujakwd3kxrFfUUhgOHVfl+utut4PM3VUweHawIxs3q+6OzAfzK3L6VW5CnB2h2iVPaWylTdfyUPSR4dArTXhGO\\/7MLV0Q1PECg6O70AK9AFde+EBm7VmHELA5CjmepbVLai2lwzlXcXYbZGhBZm6lJ8Bra1RXJptwW97U54XasPpOrIOofEaGse9ZPU+RzWC7tsZZY0NgQ3M63pas7srAXjgRFuwAA1NxyqqM9mezoDG2vSgGpArrYtVDADSCXdo1GvRqf2VHs0pYPffZAk8DHQroymmuLqWAht0heNddCND+qmqJsQ7K3B8RyNUkjwM8xelfMLfKpWLa8kM36Y9ErW8p4ioGxLBzv7mQj89DlLxS4c\\/LWturiDzN\\/MgDt4or5h5Ot\\/hZiapZ8EKrk7B7CL\\/9kbF1\\/ccOI\\/S2latf6oxbP2YevqaYQxzoAdUAK9AEI914BP2tu1xf0cB5Vv8AxJIrD9VT2FNXJypnG5YpayPJfTipW50+VZ\\/Jt8Eu9ut2i9WWGLyrEVdFHCzCzW+ovWfYpRt+e0Wgvvt3PD46EtfThUKs23RKsfI61FySdNaqrGW1IH3ShQ3PAE\\/SmZHsiuzPG+5CaY9PqMehiLKdeANTRpsnDCvcUeLLIDAS8g4ooudOelNdKcEtHtGTXtvJ60njbRoWFh8GHP5VyjO7kEppSoLCxP8ACDa\\/xp2ydagnPzAQRfTkanZmmlIIN3DnALKAeIsR+2ppZK2eCiPcJcidBIiM0KsRK4HlHVwBPKtmvk8vaDtpxejZ7ot8nMmXHhXm2vTYfVtKo0Rk7K2vCXA2vCwQLDEgjhseN0UA\\/prXVQjBZy5HNdOGOdBwdUHRXoAjffMYk7f3qPpv6m15AHO5seVJcenKORoF69yaOQr0sSGJ0B6oiD+usvk3JcE07b7LytmxV3JrhGmbFZTxsPNH\\/wCkEUt64kfVf8oLP7dyGUAA+U1jaPVreUTvbnJsL\\/8AgV1CXDJKmFgWI6lKgD4i1UM7WStZO3O6sfecTckcNLiFoo4opn9CeFr+WaFh0qedxqDSSzS71Z7br2lv2\\/ZePnZOXPiRYbAQYUE7QIZRr1zGPVvgOFqZNwLNUyWdtYG4YUeRJuMkb5WQ4a0HV0Kqiw1bUk8TXKqCeyytwEss+XqFgRXWzlERncGkBY8qmzWoghHcDllKWsW0+VNUldkB9wMiDA7DxMQRj81ue4SSyOeJix7KoH1Faq\\/qjzL\\/ALv+EDvZnZ3333B2bDderCwCc7JVuHp446vxaQrVaZZDY4qdYMSSSdSdTWkxGDXQNedADq9B0VAAjunHkk2TNeFeqQYuQnQf3g0TaUtuBq8nGuaVx95sPPGsimxFrhlrH5PQXRe2xRJn+3mT0H1ZsSUZDm5LEaMpt4BSR9KZKaMm367Uxx29MvlHG2nzFYrnq0ZP8AtZTwA\\/VSoZ2CnqqF62PlAuaokRswHnd2Y2JkKVHqkakDUCuTDNWr5fZZcCbu5Hih9DHdzkr1qSVCkA2uDfWmnwjq+WsuWsHpte+4+U5UOBfRVJuaRCbtLoE55iU6SbeHjahqCVWgDuMwsy8Br\\/AOVLJRsgm7yJ+YHUfKt2Y+AWnQjZS3ee8z7hmxM\\/930lMWDjryWSQsb\\/AMzs1aKLBh2PLLz\\/AMcO0G2vt3O7hyhfN3eX0IT\\/AA4+MbNb4NLex\\/lrVqXZg3WzBbvGqkTBNAGvOunBzQdFQAmjjkVopNY5AUcfBhY0Acc+52yPs\\/dmVjsDGY5FQMQbXX\\/23+KnorJZQzdS01ksn2Y3hJUkgfRldoSOq1g460X6gka6Uag+hdhvN26TZ9zPp64M7FoWGnSb\\/aw\\/dPwrNvpDNny7vZQ+UTDZ8tHQebW2vxrOmaLDfu2PcMnFEWJmNiDi3QiuTb\\/iqqsN88J5IXH2htG4SAybpuMEqm0nRksqSX1ZnUC34Uysj0rrC5\\/oex9i7fhSu0Xce5FLdCquRaMC1roCt\\/rTf2idb\\/8AG39sZR7DbIRcDc8yKQEC7FJQbc7EUkortwvBZG3B1wYkyJzlSoPNOyhSdNdF0pXk8e+Hgj+9bgiM6g63uSKmuSnRXPdeVM2DLHDc5WafRhVQSbHlYeNWqpZG9oRAOyNlyt03TK3AJ6n+3sIsdT9rZUt44xz6jGPPWutcGC9jrnadrg2jaMHaMcBYdvgjxkC8P7a2Yj5tc1pShGJuXI7vXRTUmgDW+tADqunTNACoAor3+7TbJ3aPORSY86DUk6CSIjqI\\/mHG3MGobamnRborvsLOn2beIsjKYpjRqIdyYXK+he8ORp+6ObDhUU4ZotWawXt3tEmR2kd3xmvJC0MhYWKSJ1dJa4+Bp9ymskfncXgA9v74r9Nj0kWDoeKn9o8DXmtHrpkwKvkIpJHCuAMJu0Mmd\\/VwZPSyOZP2n5iuqSldzqsPB4zdl93l1ORlY0kR+4Rx+m\\/1POqOTtfpfTHmPsDYCBVA9U\\/cf2X8KnLQlrO2W5NsiV8aBiznqPLhXGzhBe4d2gx4nnnk6UBsObM38KLzNNVC2ZCtv7j2\\/eu4dog2+Uy5Mk\\/TJBjh5ZEjH3ySC3IcAtbteuMnnbtsySb2K2mPFiyhKh9XE3uZcmNzZlKR9Kl1PBqtUz7WXy17mrGcxQcMGgDW+tdAdXrh0V6AM3roArujt3E7i2WbbMkhGb+5izHX0plHlbTlrZvhS2rKGraHJQmZsMWyboYN2hfEaCUxjIjPSYjJ96km6NE33DqHS1z46Zmo5NlbNrBLj29v+L2vuEWDuMWds5haSXHUemYwpDXWIlgL\\/wAjW+FF6v1fgKXq7qcMiEcmfjlZI4rW\\/wDkDgj6g61gZ6aJjsHdR8sOQeluAY6A\\/wClLB0nW3brBcEvYNaxvwPxpkwgKtnxGNiXBtTCQAN03eJL3POpspBBu4e7EAZY\\/wC4w+2MGw\\/qb\\/ShVONlc7xNl50jTZTXLeRVGioraEKPrV6IhsZbvtZ7M7f2Rm5G4fnmz8maIJDeJYVWNtbt0lutz416KWTx7WxA67o7V3PaO5X7z7cxjmJOB\\/3HscR6ZMgILDKxgdDMi\\/cn7w+Ncsu0NSya9WS3Ze49o3rEiyMHID+oLmNgUkU8wyMAyn4U1bpi21uvISvTCGpNBw150APKDoqAFeugK9cAH7zsW2bvF0ZsSu6qUSWwLBTxU30ZfgaV1katmiGZ\\/tz\\/ALdh5zbXlvi4zY0vVjg9cIAQmyo\\/2Xtya1SeuE4L13S1KIBhYuRJip12cso1GnLwNeYz2UeseCyNqOFLIzQWxMnJisoY28OI+lDOofHc8orq5tyrh1A3cJ8iYG5PTXTjAL7dJK5LDQ0yYkDXctrIxZekeboNvmBVEybR0HtOXHm7Nt+ZEQUyMaGQEc7xgH9INeonKPCsobR7kka8CK6cGr7fgvkfmmhX8wfvcC3VbgT8fjXPVHVZxA5vTHDBNBw06heiTo9oAxQAqAFrQAqAAHfsm4J2nuAwImllljKSspUelBxlkPUQT5dAFuantn1ZXSl7KSutlXH9FPML2048LV5L5PdQ8kXDLMCwFvtOuo\\/CkHMIuLf7h+muis2ZcXWz\\/PQ1xjI8JVx+nVxb5GugahMPo8rg\\/Q\\/6V04MNxXF6D5ha2pseFOhGT72sfPPZ8EWTGRjRO\\/+2ZFxaXGdidFv1L0P1DzAXHCvS0z65PF+lL3cEsb41UgaNQBrQAjwoA89KAP\\/2Q==\"}},{\"insert\":null}]}', 1000, 55, '2024-01-06 10:25:06', '2024-01-21 02:49:27'),
(32, 5, 'محصول جدید جدید', 15, 0, 'ییییی dlkfh', '{\"ops\":[{\"attributes\":{\"background\":\"#e60000\",\"color\":\"#ffffff\"},\"insert\":\"\\u0648\\u06cc\\u0631\\u0627\\u06cc\\u0634\\u06af\\u0631 \\u0645\\u062a\\u0646 \\u067e\\u0631\\u0642\\u062f\\u0631\\u062a Quill\"},{\"attributes\":{\"header\":6},\"insert\":null},{\"insert\":{\"image\":\"data:image\\/jpeg;base64,\\/9j\\/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP\\/sABFEdWNreQABAAQAAAA8AAD\\/4QMdaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI\\/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjYtYzE0MiA3OS4xNjA5MjQsIDIwMTcvMDcvMTMtMDE6MDY6MzkgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOkMxNDQ0MTc0RjQyNTExRUE5ODBBQzY2QjJDMzk5MkVDIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOkMxNDQ0MTczRjQyNTExRUE5ODBBQzY2QjJDMzk5MkVDIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDQyAyMDE4IFdpbmRvd3MiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0iRDFFQzNFN0I2QzBBQkQ5OTk0MDM5NUFBOTVEN0U5RTciIHN0UmVmOmRvY3VtZW50SUQ9IkQxRUMzRTdCNkMwQUJEOTk5NDAzOTVBQTk1RDdFOUU3Ii8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+\\/+4ADkFkb2JlAGTAAAAAAf\\/bAIQABgQEBAUEBgUFBgkGBQYJCwgGBggLDAoKCwoKDBAMDAwMDAwQDA4PEA8ODBMTFBQTExwbGxscHx8fHx8fHx8fHwEHBwcNDA0YEBAYGhURFRofHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8f\\/8AAEQgAlgCWAwERAAIRAQMRAf\\/EAJkAAAEEAwEAAAAAAAAAAAAAAAECBAUGAAMHCAEBAAMBAQEAAAAAAAAAAAAAAAECAwQFBhAAAgEDAwIDBgQEBAMJAAAAAQIDABEEIRIFMQZBUSJhcYEyEweRQiMUobHBYlJyMxXR4ZLw8YKyQ1MkFwgRAAMAAgEEAQMDBQEAAAAAAAABAhEDITESEwRBUWEycaEi8IGRQhRS\\/9oADAMBAAIRAxEAPwC8BakoECgCBQCrUBgFAZagFFCqq7WRG+RmIUG3W1+tQ2kSpbHS8dIU3u6xgjchPysPMMDY1HeiexmnLSPGIDAh\\/AHUN7QwFqh2SoAio+gOxrblVujKfFWqFsRL1iWQq1m0PtrTJngFqAy1AAigBagMIoBJFAYRQAtQBAoA2oAgUAbUAaATOUiRjI2xV0Le0+Hs9pqtVgskNJs5cmX0ZErgMEMUi2RlFvShsu1R1sDrWTZqkKwuRlhy5IVICg2kjjJKXHpUge2qOkaTDZNRZc+9xPGHgjba6KPS396D8vgajvLeJip3wtyqqahja\\/ibX\\/pVu5Fexobh8aRkglO5yPTKNdpH5W917VaaKVJqOLJDtR5PqyMT8i6ddOp1+FXVGbk0LMTJ9N42Q3230YX8mt8vxqyoq0bbVYqC2tAZagEkUALUJBahAq2lCTAKECgKANqARPKIIWmYaLb8T0vUN4RKWXggszuHBEg2p9UC6xNOCN9xf9EL8p8jWNPJvM4H2LxufyscRcHEx9CIz85HW5rlvb9Du1ev8stPH8DhxevZqPx\\/76x7jp8aRLftscgELtUadP507gpNT4ELougBuDpUqiHIxy+ChdXjiP0iTdmGlyKurMq1plczY87i3M+QpaAKQXQ3NvL2XrWdpz3oG00bZMW\\/BmSHKjANtl0Ymx2lQRcfG9apnO0OeP5BcsSRyBY8yE7Z4FYNr\\/iXXUH+FbzWTCpwO9tWKmEWoBJFAJtQAtQCrUAQKEirUIMtQkg+48yL9LGMi2a94zexutyT8OgrO2aQhv2pxjvJ+\\/zgDO5vDDb0xL4adL\\/yrh3bfhHp+t6+Fll9x4QEB0APjrXOdpJwmw2jQ\\/mJ1FSmVpG8KW1Jv5af0oV6CXje17AHzFQ0TlGoqCT4+RoQMsqOMxssihkPzX1\\/nTuIclLzuGbDzPrYPyknbGwZtreNvf41vrs5duoTNxLNAkjukOYlpMXIAsn1L32syi4v0rqRxUiWx5vrwLIy7HOkiddrjRgCOo8q6U8nO1gWQaABFCBJFCQW1oBW2gCFoA2oDCm7Tz60BSO52UTxgjfNPN6QfyqNbfw\\/CufdWEdPrzmkWvhA30BdbHS9eW2e3KLZjLYAWsfbqLf4alMhseR+VviPKmSGOEYBemnwvV0yjRhYEaaHqPZUZIwN5fSrOPmXx9lRksvoRGTL+ptOt9evUHyrM0+CP5KO+IHVykv5GBsbj21tBz7CCzZWRI2ylZdwNpkJKuD+Y\\/4XWuyTz6Rv4eSf6jxzuGeVFmTW5Pg3\\/Py6V0a2c2xEpatCgkigE2oQC1CRe2hAoLQGAChJpzpjjYOTkAXMMTOPgOunl1owjlCclJJn4EkxLu+9yPHw23961xb+h3er+R1Pt27Y28\\/KANrH\\/hXn4PWTLTjBZAGcW2+H9anqRjA5JW\\/pFz08qDBthB23NrePiaukVoVcFdPHQ2pgqaZSb26AixFUCK\\/ms12PiNNOvwqjZqjTmsr4gUqWsQwt4+BBrp1HJuKxnKxwwi\\/qxNvjkCddrLdT8NQbeVdM9Djt8mnjeQMeRhSyMuy6JOelncCNyPIN6WNvGttb5MLRbWWxN+orcxEEUALUALa0BtC0BltaAO2gFIilwrruRtGU9CDoR8RQHFuH4p8zuXJxWYCHjJ8gSyjQWDnb\\/wAK497wjt9ZZovk\\/dnEcVj7lmV1QbZF1Av7dP5VyLU3yej50nhEl2733gZ81o3BjYj6eupv+W1Z1Lk2m1RcI8226Yf6YGgPW1SmS54wV3uH7j8ZwkayZDRoGPpXIkWIkDyvqR8KtPPQzuu3qMOH+9Xa+ZMVaZUt+eMSSKAfPap191a+KvoYPfP1J0\\/czsZgRLy0OMeu6cPEh8\\/VIqAVV6afRFVvj6mt+S4jPT6vGZuNmI\\/pVoJkk9RFwo2nqbdOtY7NdLqjfXsmnwzU08sUBIt9VVKmL3\\/9ta20GHsrkrT5DKqPEqqj3Vo9Nu1hY29tvDxt510JnHSIxpIZVeD\\/AE2gmgVVI+Y7ggBHtFaSZ0dAces389a6TmEkUJE7aAFqA22oDLUAQpJtQHMpvut3BynfuR2X2rx2Lj5eHM8WRy\\/KOzxqYW2u0cEe3df8ikkk1GSUiv8AcXBSdu89Dj5ncea78usmdyMuHHDhoGD+oIirIdvvauffwdXr8\\/JX37p4fO5WDi+Al5hnzJGiTkOU5SODGZwDc+qFgL+F6zmG+vajatkzxmmNe8Mfu\\/sHkcfODl5knEeTiTfTezkbkKvDs+pHIvytai1zWZfDHmqUqXKLVzn3O+8LHh+G5HiB2inNTxQ4\\/JxRsZTE5G8K0rSBXs3jY1WdOvDf5YLXv25Sf8U2Tub9usfDSTP4zBMzrcNnZxOXlSSf42MhJZz5Cyj3VzeWjsWmc8fuQGJL94eG7g\\/b8ZJkZEEqo2Owx4pMdGJG8Sn0FQFOhTx9lbzENfc5dl7JrCXBeIfurzv75eH7w4n9nkMfp42SyfVxMm3WwcNYkflbrWVzj7m0znqsHKsr7bZXOd9dx8b2y+NxHF8bMnIiWR5Y1jbJjUxwxIny2YMVIHpHwrr86nWs85OH\\/nzseOMDTJ75+7nYfILxvLZQzoWW0Qy9uTDLGD1iyFs\\/8biohRXKGytk8UdH7N+4vb\\/dNsSWNsHlZrlsJnurk67oH0B93WpcNFe9UvuSRx\\/rc1jBF3OmVDuuSNwGg0PQjqbVaepnXQv7C7H210mAkigARQAtQG\\/bQGbKAwJQHFvur9uct+5MvL7dx3\\/ddxYbZZhhJDvyPGzJkSiM3BVpYCZPT+ZTaqstLI\\/G4P7gd4ZeEvcWMMTkcTFOHkS5AZJ2ibVJXjXrIytrbr1rl9i8cM7PVjPKL5xH267dwxjRjj4nkw7CKU3+ZejkH81cXlbZ6D0TjoQ\\/3BEnLd79o8BmIJZP3Y5LII+cY2MD9MMP8DyGwroVfxbMuxO5n46nRvuF2i\\/c\\/a0vGR2XkomXL4vIb8mZCd8R9gY+lvYaziu1pnRthXLRq7Y5rhe6uDTblpg8pH+jyfGvIkc0OQmkiNGxDD1DypWvD46GMbc\\/qSGPxq8Y28cokA8d7xMt\\/wDxEVRJo3dp9UQvd\\/Ndhz8fJj8xzGHlMeuPjuJ59w6FIMf6jlvKreO3yY+SF8lL7K7B5vIxc3lM2PI46Xl8gzR40xKzx40aiLGWbU2fYu4g9L020spL4I1zw2+tMiO6Ptry0jLD9ZcvCZrtFOL7XH5hVtewnZryhtg\\/a7BOQuVy+SMDjsFRJlS48Y36AkLD\\/dtXRvCtr24OfXp7vgtOP3Jyhmgy8btcY\\/HqytDk5MrPmsielJHPTdt61z+W08pnfPqarXa1\\/c6PE6yxJKvyyKGF+uterLysnz1w5py+qCVqSoCtADbQDnbQGbKAOygIDvzjJM3tPkHxnkh5PjozyPE5ULbJYcvGUsjqwv1XcrDoQbVFdC0dUcy4DuDvnMm\\/frzkWTm5SKzqvFpJJoB12Sxovvrzdtqnlr9z1\\/W1Ulw\\/2LPK33XysZz\\/AL0+ChU3kXFwsYD2hj+5k\\/Csu9L4Ol6X\\/wCv8Ibdidqti9yfvM3Il5Hk50MmTn5bmXImIIC3Y\\/Ki9EUVaqbRXXrU1k7HlxqYEkBsr+m\\/jcVNLgmHzgoHef2w4HneTTm8jDgfkYxZ53jRvqqugEoI9dul+tUy10Zooh\\/kkzVw3ZPbbkrDxXCR5URsyyYCFx7dSRUrZT4yRWmF\\/rwWiDh8\\/jUDYn7HFj8RiYyQEj3oBUUn8siFHRId\\/uYxGtztcfMOv41RkOcFW5XIByJCCLqTYUXUnPBDx8guBLiZWTgzZ\\/G\\/ubZMcIuYhfWRgfyLpcVaq5yNcZWFwXLNigzMyKWNAkMkbsqjpZVvRPLOiFicCsBAuFAACo26KeoBNxXraliF+h857dJ7aa+puK1c5xJWgBbWgHQWgDtoA7aAw44lV4W+WZGjb3OpU\\/zoDjn29ngxsYY8J0hZ4mI63jYrr77V5G5cnv8Ar0u0sXc2ZO\\/E5EyyGOGFTe3Vm8FArOeWdFVwce7Z+7fcfa\\/cSzc4jZXHNeLeo9cak3B9tq63pyuOp563uXz0Onx\\/djke7o14ntAoOQdzvyn9aQR\\/+7t0BPkt6y8b6UdC2rquTdw32453Ez1zM3urks3LlN8ou++MgnVUi+Vff4UuV9EjTXWF1z+pcuT4FshIszimEHK4i7YrkhJkH\\/pOf5N4GsnJdbcPnobeH5s8hiMx3CeM7J4X9LRupsysPCxoqLUsP7CcmWX1t0Jv7NPDWiK0VmaQytI5N7t8bVKRlksvZZg\\/asH27frOZC3QpYArY\\/Nc9anjISbyOMhcSJ4MDGezt9U7QbmONxYX8vHStNMJtJGm\\/c4h3\\/WR3YDQCyjQDyAr1D5owigARQCba0A820Bm2gDtoDZAAJ479Nwv+NSQee+z4sjF7s5PBmFlgly5Qb9RFMw6V5e89j164LL3VzcEPFwo5VVlBAv0N\\/61nEm12UduO7V5GdRm5MRDDWJSPj1rbvaM1qVPlnS+1cHsnt7CSXj98cXUgKPm+GtUexm8+t\\/gskHd\\/bMzkDNQMfmuR1HuqO4l+u\\/gl4c2BlVomBjYaFTcHz1FMplMOeGNpsGMcquZDo2SmzIA\\/Myj0v77aE1nS5NJfGBvm32uo1Vb3v4Gql0VdX\\/QZjp62uPPWrGc9CU7Q7s4aPi5IVzYIpMYytmCRgHV919uvjarNcmsRmcktwMi52KnJr\\/pzhhjaWuhbWQ+17aeyu\\/19Xass8j3\\/Y7n2T+K\\/clLV0HAZagAQKAFhQD3bQB20AdtAELbWgOMc0YeG+6s+NOAkebPI8bdP0s+MSJ+EiMK8\\/2Y5Z6Xq3lIe\\/cPtHi8\\/iY1zWkhjQhgkblVcj3dL1zRbTOuoTRXuzZu2eHT6EPFRi7BQ5jWVncsF1eTd1v1rdqn8kRumFjB07G5niseN2zuNhiZTZ9saEBTfbpawqO3Bp5s9GGGDtjnkZP9sgdRcNeJEN\\/eArVR0zSbYiLsbiePY5HCzScVITuMaSu+M48Q0MhZRfzW1UdEt5J7H9OIr5DfrIDf2m3UfCoTz1MWsPgr\\/L8pjQ40jlvOx8TpfWmC+ShZ\\/O\\/T44Kv+rLdYx4ncf8AnWszyYusIqXK9oyZPcOEuMGf\\/dTGjKNP1Do\\/4AXrfU8s5fYWEejoMSLFx4sWEWix0WKMexAF\\/pXcjzWL20ACtAJ20ANutASOygM2UAQlAZtoDl3377UyszgMfunjFP8AuXAerJCjV8MtuLaeML+r\\/KTWe2co11VhjPge4sHujtVI5mBeRAkt7XRwLda8mpcvB7WulSK1xHFZGPzJiOQInx3BNxfS51HvBrZW0is6FTwzpcHHRS4qyZEn1mG3YCNDtuAWHiQD+OtT3s0\\/54TwiYwOOxcJWaK\\/1HF5Hb5zWJc3maJfW+5rDS9tPdVGy2CC5nkZFQiLp+W5sRUIxrg593FycjRbGPp62vr7j763hGV1wV7jMfM5DJGVMpEKHbjxdNfP4VanjgjXLbydN7A4Qz8vNyeR6v8AboxFjLbQSyi7N8Fro9Wc5Zy+9WMI6Dauw88BFAJIoAWoBNtaAlNlAHZQB2UBmygMSFZGETKHjl\\/TeNhdWV\\/SysPEEGxoDyRg83hdu93cvgYDFeHhzp4IY2O4oiSFVBPiANPdXFt19x6Gjb2vktuTz+MeTmnkZY4plUCd\\/lBTVSLedYTPB2eTnJaeM5+OSBMiTI+qFFvoqW1t43HnUNGvl4Lfx2fHNjBzJcMNL6i386zaLu8jHmOfjjTYzAaCwGt6z7cjvwUrlO4QXOxTJKx0APT2VpMmNWQ6RZGbkE5Hyj1MvS1ugFaZwZ4yy28Vx8EOEuRtBNzs9hPhasaZ1QsF07Dx7cC2QfmysmV7+aqQi\\/8AlNen6qxB43uvOxlgK2roOQTtoAFaATtoAbdaAldlCQ7KEB2UBm2hIQ6Q7p20SFWlc\\/2xgsf4CgPA3LzyNyOTnRk7ciaWVifKSQsL\\/jrXNk6mh3g89lLF9P0zQkWMMuot5X61SkXmiU4fvLkeNtGgP0VP6abjdbdNarSyXm2iw4\\/3T5cAqkPqPiCTr51m9aNZ2s2w9xcpyMm7Kl9pU6aHzqvakW72yw4jwLHu3+srcydfxrNs0SHMAlmyUxYVKtJ8x1uB4k\\/CpJ+S35zph8WxX0hF\\/SHsA6n2msjp6HQe38A4PAcbiMLPFjx7\\/wDM43t\\/Fq9rXOJSPndtd1t\\/cfMlWMxBSgElaATtoAbaAmNtCQhKAzbQHPfup91D2Y+Nx3G4kefzeVH9d0nZlhggvtVnC+pmcg7R5a1SrwTg41L\\/APp\\/vvkcmbif2HHY8eUk2NLsik+pGGQq7Ixf5rdLiq1TwXictHPs\\/jhGvoG6JlGnUjTxrmVHY5KzkRSYkxGv076EeFadTLA6xuSj6SC4\\/wAQqjkuqJHHzsQEMr6+RqjTLpo6N2TxfCdyD6JP0cqMeoKTcg+KmsrbR0RKZfP\\/AK\\/PHx2inLoBe9vH2nxrJtmySHHD8KkMjTSMDM+n9wX2e0+NGyYnkfctifu83j8AaNlZMMTDqAhYbv4Cp1TmkhuvENnU5FBckCy30Hs8K9o+eEFagCSlAJKUAgpQCNmtATO2hIQtAYqFmAAuSbAe2gPKX3b5mHlfuXzmRA2+HGkTCicagrjIIyf+rdWFvLJKbj4GCOUbOKf\\/ACJUWIsLBdTq3+YrpWdt4NtNJPknBxTFDuGg9IPnaufJ6PaMZ+zzksSqXDC+w+B\\/tq6so9RHv9vwHsAUJ\\/K4K\\/GreQr4ST4r7ZHIaxVjbrt9Qqr2BaS69q9hRcbnLJDnNg5CdSVO0j2qelY1WTaIwX\\/KymixhFLlDIkWxDKLL8ayOhDjjgWBKgyt06ajzYjwv4VBZEN3B3Jj8BncdyMsJykwslMjIhQ7XkCabVJ003XFbaOKOf23\\/BnV+I5XjOa4vH5Xi5xk4GUu6KUaEEaMjr+V1OjKelesnk8QdFKECSlCRJWhAkpQCdmtASulCQ6UBCd45fc2NwMw7XwTnczODFAweNBACpLTfqMm9h0RVv6qis44JPHLhjPNcsH3H6m6+7dc33X\\/ADXve\\/jWACA20XOnt\\/rUAtnANO2P9PNUpGAGgmNjf+1gLtfyNq5dmM8Hqes6xikWXj1wN43uNbb9Dp7qy5Ovgn2XgxhE5TRtEB6g4Oo9nj\\/005I4G2Ni8IzA8dmvGpbRSkjWNtLHaG\\/hUMCMjF59csPx+ZHIRpJHIjgH2+pbfxqUVZrSHlGyAeSnVG09MKkn2dBt91VZoi4cdtXAk\\/aAsdPq2uDf+6+t\\/fUfBY5f9yTmGHOMwIkEcYx1NtV+oNxFrj33rbT1Rye3+LLP\\/wDn6fuOPOy0gxnm7cnITkJCyhIMoLujkQMRuJA2yBATa1d+vOTyWdxO2tiok7aASdvnQCDt86ECfT50JP\\/Z\"}},{\"insert\":null},{\"attributes\":{\"bold\":true},\"insert\":\"\\u0633\\u0644\\u0627\\u0645 \\u0628\\u0631 \\u062a\\u0648\"},{\"attributes\":{\"header\":2},\"insert\":null},{\"insert\":null}]}', 545, 1, '2024-01-07 06:03:22', '2024-01-20 02:26:34'),
(34, 24, 'sfjg', 0, 0, 's65d4sd', '{\"ops\":[{\"insert\":\"\\u0648\\u06cc\\u0631\\u0627\\u06cc\\u0634\\u06af\\u0631 cxcxx\\u0645\\u062a\\u0646 \\u067e\\u0631\\u0642\\u062f\\u0631\\u062a Quill\"},{\"attributes\":{\"header\":6},\"insert\":null},{\"insert\":null}]}', 54554, 1, '2024-01-20 05:59:51', '2024-01-20 05:59:51');

-- --------------------------------------------------------

--
-- Table structure for table `product_galleries`
--

CREATE TABLE `product_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` text DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT 2 COMMENT '1= primary 2= secondary'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_galleries`
--

INSERT INTO `product_galleries` (`id`, `product_id`, `image`, `type`) VALUES
(11, 7, 'images/product_images/xPO8Sgt4Dg.png', 2),
(12, 10, 'images/product_images/BK4d3Fhqth.jpg', 2),
(13, 8, 'images/product_images/FEP3YvP04k.webp', 2);

-- --------------------------------------------------------

--
-- Table structure for table `redeem_codes`
--

CREATE TABLE `redeem_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` text DEFAULT NULL,
  `code` varchar(255) NOT NULL,
  `value` int(11) NOT NULL COMMENT 'bid amount of code when redeemed',
  `use_limit_count` int(11) NOT NULL DEFAULT 1,
  `used_count` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1= active code | 2 = used code 3= disabled code',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `redeem_codes`
--

INSERT INTO `redeem_codes` (`id`, `description`, `code`, `value`, `use_limit_count`, `used_count`, `status`, `created_at`) VALUES
(1, 'کد من', 'dsd4582', 5000, 9, 0, 1, '2024-01-21 07:21:38');

-- --------------------------------------------------------

--
-- Table structure for table `rewards`
--

CREATE TABLE `rewards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` int(11) NOT NULL COMMENT ' 1=free bids 2= Hours of Time As Highest Bidder ',
  `amount` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rewards`
--

INSERT INTO `rewards` (`id`, `name`, `type`, `amount`, `created_at`, `updated_at`) VALUES
(3, 'sldg', 1, 12, '2024-01-07 17:03:10', '2024-01-07 17:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `special_offers`
--

CREATE TABLE `special_offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `type` int(11) NOT NULL COMMENT '1 bid discount offer 2 product price discount offer',
  `type_desc` varchar(255) DEFAULT NULL,
  `discount_amount` int(11) NOT NULL DEFAULT 0 COMMENT 'in percentage',
  `item_id` int(11) NOT NULL COMMENT ' can be a bid package or a product',
  `expiration_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1= active 0=deative',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `banner` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `special_offers`
--

INSERT INTO `special_offers` (`id`, `description`, `type`, `type_desc`, `discount_amount`, `item_id`, `expiration_date`, `status`, `created_at`, `updated_at`, `banner`) VALUES
(1, '848848ff8f48', 1, 'پکیج بید 500 تایی', 20, 5, '2024-01-20 15:36:44', 1, '2024-01-20 08:45:09', '2024-01-20 12:06:44', 'images/special_offers_banner/rWV0kUulFP.jpg'),
(2, 'جدیدیددیدی', 2, 'محصول X', 10, 7, '2024-01-20 10:19:39', 0, '2024-01-20 08:45:23', '2024-01-20 06:44:28', NULL),
(3, 'تا یک ماه این پکیج را با 10% تخفیف خریداری کنید', 2, NULL, 10, 30, '2024-01-29 20:30:00', 1, '2024-01-20 11:58:02', '2024-01-20 11:58:02', 'images/special_offers_banner/vbq34U8M6A.jpg'),
(4, '6565656', 2, 'Miss', 5, 8, '2024-01-23 20:30:00', 1, '2024-01-20 12:00:59', '2024-01-20 12:00:59', NULL),
(5, 'ssdsd', 1, '6546', 10, 5, '2024-01-23 20:30:00', 1, '2024-01-20 12:03:32', '2024-01-20 12:03:32', 'images/special_offers_banner/RJrnJfi2vw.jpg'),
(6, 'اسم جدید', 2, 'محصول عالی (جدید)', 15, 31, '2024-01-30 20:30:00', 1, '2024-01-21 02:33:30', '2024-01-21 02:33:30', 'images/special_offers_banner/x6NYrBTyza.png'),
(7, 'اسم جدید', 2, 'محصول عالی (جدید)', 15, 31, '2024-01-30 20:30:00', 1, '2024-01-21 02:47:09', '2024-01-21 02:47:09', 'images/special_offers_banner/JW3uGGnvG1.png'),
(8, 'اسم جدید', 2, 'محصول عالی (جدید)', 15, 31, '2024-01-30 20:30:00', 1, '2024-01-21 02:48:09', '2024-01-21 02:48:09', 'images/special_offers_banner/M2xBmWeKFj.png'),
(9, 'اسم جدید', 2, 'محصول عالی (جدید)', 15, 31, '2024-01-30 20:30:00', 1, '2024-01-21 02:49:26', '2024-01-21 02:49:26', 'images/special_offers_banner/7QD2Bnxh1U.png');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'texsas', '2024-01-03 01:49:29', '2024-01-03 01:49:29'),
(3, 'arizona', '2024-01-03 01:49:43', '2024-01-03 01:49:43'),
(4, 'shiraz', '2024-01-03 01:50:18', '2024-01-03 01:50:34');

-- --------------------------------------------------------

--
-- Table structure for table `tempraries`
--

CREATE TABLE `tempraries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `val` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL COMMENT 'can be image=>2 or text=>1  or=>old_item_discount_amount\r\n',
  `key` int(11) DEFAULT NULL COMMENT 'for multi item ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tempraries`
--

INSERT INTO `tempraries` (`id`, `val`, `type`, `key`, `created_at`, `updated_at`) VALUES
(1, '{\"ops\":[{\"insert\":\"\\u0648\\u06cc\\u0631\\u0627\\u06cc\\u0634\\u06af\\u0631 \\u0645\\u062a\\u0646 \\u067e\\u0631\\u0642\\u062f\\u0631\\u062a Quill\"},{\"attributes\":{\"header\":6},\"insert\":null},{\"insert\":null}]}', NULL, NULL, '2024-01-07 05:25:49', '2024-01-07 05:25:49'),
(2, '{\"ops\":[{\"insert\":\"\\u0648\\u06cc\\u0631\\u0627\\u06cc\\u0634\\u06af\\u0631 \\u0645\\u062a\\u0646 \\u067e\\u0631\\u0642\\u062f\\u0631\\u062a Quill\"},{\"attributes\":{\"header\":6},\"insert\":null},{\"insert\":null}]}', NULL, NULL, '2024-01-07 05:27:01', '2024-01-07 05:27:01'),
(3, '{\"ops\":[{\"insert\":\"\\u0648\\u06cc\\u0631\\u0627\\u06cc\\u0634\\u06af\\u0631 \\u0645\\u062a\\u0646 \\u067e\\u0631\\u0642\\u062f\\u0631\\u062a Quill\"},{\"attributes\":{\"header\":6},\"insert\":null},{\"insert\":null}]}', NULL, NULL, '2024-01-07 05:27:53', '2024-01-07 05:27:53'),
(4, '{\"ops\":[{\"insert\":\"\\u0648\\u06cc\\u0631\\u0627\\u06cc\\u0634\\u06af\\u0631 \\u0645\\u062a\\u0646 \\u067e\\u0631\\u0642\\u062f\\u0631\\u062a Quill\"},{\"attributes\":{\"header\":6},\"insert\":null},{\"insert\":null}]}', NULL, NULL, '2024-01-07 05:28:54', '2024-01-07 05:28:54'),
(5, '{\"ops\":[{\"insert\":\"\\u0648\\u06cc\\u0631\\u0627\\u06cc\\u0634\\u06af\\u0631 \\u0645\\u062a\\u0646 \\u067e\\u0631\\u0642\\u062f\\u0631\\u062a Quill\"},{\"attributes\":{\"header\":6},\"insert\":null},{\"insert\":null}]}', NULL, NULL, '2024-01-07 05:29:19', '2024-01-07 05:29:19'),
(6, '{\"ops\":[{\"insert\":\"\\u0648\\u06cc\\u0631\\u0627\\u06cc\\u0634\\u06af\\u0631 \\u0645\\u062a\\u0646 \\u067e\\u0631\\u0642\\u062f\\u0631\\u062a Quill\"},{\"attributes\":{\"header\":6},\"insert\":null},{\"insert\":null}]}', NULL, NULL, '2024-01-07 05:30:10', '2024-01-07 05:30:10'),
(7, NULL, NULL, NULL, '2024-01-07 05:30:52', '2024-01-07 05:30:52'),
(8, NULL, NULL, NULL, '2024-01-07 05:31:07', '2024-01-07 05:31:07'),
(9, NULL, NULL, NULL, '2024-01-07 05:33:55', '2024-01-07 05:33:55'),
(10, '{\"ops\":[{\"insert\":\"\\u0648\\u06cc\\u0631\\u0627\\u06cc\\u0634\\u06af\\u0631 \\u0645\\u062a\\u0646 \\u067e\\u0631\\u0642\\u062f\\u0631\\u062a Quill\"},{\"attributes\":{\"header\":6},\"insert\":null},{\"insert\":null}]}', NULL, NULL, '2024-01-07 05:42:57', '2024-01-07 05:42:57'),
(11, '{\"ops\":[{\"insert\":\"\\u0648\\u06cc\\u0631\\u0627\\u06cc\\u0634\\u06af\\u0631 \\u0645\\u062a\\u0646 \\u067e\\u0631\\u0642\\u062f\\u0631\\u062a Quill\"},{\"attributes\":{\"header\":6},\"insert\":null},{\"insert\":null}]}', NULL, NULL, '2024-01-07 05:44:27', '2024-01-07 05:44:27'),
(12, '{\"ops\":[{\"insert\":\"\\u0648\\u06cc\\u0631\\u0627\\u06cc\\u0634\\u06af\\u0631 \\u0645\\u062a\\u0646 \\u067e\\u0631\\u0642\\u062f\\u0631\\u062a Quill\"},{\"attributes\":{\"header\":6},\"insert\":null},{\"insert\":null}]}', NULL, NULL, '2024-01-07 05:45:20', '2024-01-07 05:45:20'),
(13, '{\"ops\":[{\"insert\":\"\\u0648\\u06cc\\u0631\\u0627\\u06cc\\u0634\\u06af\\u0631 \\u0645\\u062a\\u0646 \\u067e\\u0631\\u0642\\u062f\\u0631\\u062a Quill\"},{\"attributes\":{\"header\":6},\"insert\":null},{\"insert\":null}]}', NULL, NULL, '2024-01-07 05:48:22', '2024-01-07 05:48:22'),
(14, '{\"ops\":[{\"attributes\":{\"background\":\"#e60000\",\"color\":\"#ffffff\"},\"insert\":\"\\u0648\\u06cc\\u0631\\u0627\\u06cc\\u0634\\u06af\\u0631 \\u0645\\u062a\\u0646 \\u067e\\u0631\\u0642\\u062f\\u0631\\u062a Quill\"},{\"attributes\":{\"header\":6},\"insert\":null},{\"insert\":null}]}', NULL, NULL, '2024-01-07 05:49:26', '2024-01-07 05:49:26'),
(15, '{\"ops\":[{\"attributes\":{\"background\":\"#e60000\",\"color\":\"#ffffff\"},\"insert\":\"\\u0648\\u06cc\\u0631\\u0627\\u06cc\\u0634\\u06af\\u0631 \\u0645\\u062a\\u0646 \\u067e\\u0631\\u0642\\u062f\\u0631\\u062a Quill\"},{\"attributes\":{\"header\":6},\"insert\":null},{\"insert\":null}]}', NULL, NULL, '2024-01-07 05:55:42', '2024-01-07 05:55:42'),
(16, '{\"ops\":[{\"insert\":\"\\u0648\\u06cc\\u0631\\u0627\\u06cc\\u0634\\u06af\\u0631 \\u0645\\u062a\\u0646 \\u067e\\u0631\\u0642\\u062f\\u0631\\u062a Quill\"},{\"attributes\":{\"header\":6},\"insert\":null},{\"insert\":null}]}', NULL, NULL, '2024-01-07 06:04:23', '2024-01-07 06:04:23'),
(17, '{\"ops\":[{\"insert\":\"\\u0648\\u06cc\\u0631\\u0627\\u06cc\\u0634\\u06af\\u0631 cxcxx\\u0645\\u062a\\u0646 \\u067e\\u0631\\u0642\\u062f\\u0631\\u062a Quill\"},{\"attributes\":{\"header\":6},\"insert\":null},{\"insert\":null}]}', NULL, NULL, '2024-01-20 05:59:50', '2024-01-20 05:59:50');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=open 0=closed',
  `reply_to_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_histories`
--

CREATE TABLE `transaction_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=active 0=deactive--- 100=admin',
  `profile_pic` text DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `bid_amount` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'user bid amounts',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `bio`, `email`, `status`, `profile_pic`, `password`, `email_verified_at`, `bid_amount`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '\n\n<h1>ویرایشگر متن پرقدرت Quill</h1>\n\n<p style=\"color:red\"><i>لورم ایپسوم متن ساختگی با تولید سادگی ﻿نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و</i></p>', 'admin@email.com', 100, 'images/user_profiles/PadglGkoA9.jpg', '$2y$12$Z7uYA5q1fZ/oZMDCYe1uQu9Xbe4Q95xArB0tZNLagAT84OWPHh9f2', NULL, 0, 'YV6S4NWwnXrzMwWZYlijGht8iX4Y1FpC7u9HknXfxvrOZLfuQj42AbCY4KdX', '2024-01-01 09:23:07', '2024-01-03 06:45:31'),
(2, 'wvandervort', NULL, 'clangosh@example.net', 1, 'Sit omnis occaecati praesentium reiciendis est hic exercitationem deleniti. Veniam quo sequi sequi enim odit. Tempora itaque excepturi saepe voluptatem.', '$2y$12$t7hb.Lam69NxP9it0l7ZDuHJsj3.QMPQf23EANXBl/aaqUy7XA1mq', NULL, 1000, 'S9TsevR4pV', '2024-01-01 06:28:48', '2024-02-19 03:39:44'),
(3, 'bud52', 'Quia debitis et aliquid sit debitis voluptatem aliquid. Dolores non molestiae laborum illo repellat. Fugiat at ut iusto modi voluptatibus eum iure. Enim eveniet aliquam voluptas et dolor odio.', 'amara.senger@example.net', 0, NULL, '$2y$12$/fV.okLGWaLb31OdeSpMF.OT7Xgs.B7MY3eJFf02TyIq/7UjJMFOS', '1972-10-12 00:20:24', 2279284, 'Ma4at1HHGR', '2024-01-01 06:29:58', '2024-01-01 06:29:58'),
(4, 'llueilwitz', 'Sit ea et quia beatae ipsum atque ea. Aperiam aut enim quia aperiam ipsam dolorem. Qui ab libero et inventore sed fugit. Voluptates aut minus saepe dolorem. Vel ullam aut magni.', 'manuela46@example.com', 0, NULL, '$2y$12$f9gNExX68wtR8cpzFtPqUesX5QsAYgpHnHFF.WaCIvOR6el.H9KAe', '1986-05-16 10:26:12', 37, 'yBsAiiFX1G', '2024-01-01 06:29:58', '2024-01-01 06:29:58'),
(5, 'jwaelchi', NULL, 'gorczany.dedrick@example.net', 1, 'Possimus voluptatem veritatis in laboriosam enim voluptate. Exercitationem eaque excepturi corporis praesentium consequatur aut voluptas ipsam. Molestias neque quia ut eos saepe.', '$2y$12$4lUxv2kqYFY2R.nR9Y5s.uFn3SEMbiRrjHiCmKu3RUAcL3ko7WeCC', '1978-05-20 17:51:24', 263981, 'Bw6orai2xw', '2024-01-01 06:29:58', '2024-01-01 06:29:58'),
(6, 'savion95', NULL, 'sabrina.hansen@example.com', 0, NULL, '$2y$12$qfbWChy9X2OWFPXuE6Mx2e9WuoYOBRnoGzZJ1KldzsSjBPyrlwL1i', NULL, 227, 'grp7kZZVSi', '2024-01-01 06:29:58', '2024-01-01 06:29:58'),
(7, 'vladimir.glover', 'Ea reiciendis porro culpa. Iste non maxime et. Quod et iure sit id est unde.', 'zlabadie@example.org', 0, 'Aliquid iusto qui non. Qui iure sint odio voluptatem et.', '$2y$12$P./S9dpa3xeC7bW1mo/LlOaknOwwn3cyK.EgN8qM6AUfZSsFK9.Om', NULL, 5099857, 'zKXIciHpiX', '2024-01-01 06:29:58', '2024-01-01 06:29:58');

-- --------------------------------------------------------

--
-- Table structure for table `user_auction_wins`
--

CREATE TABLE `user_auction_wins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `auction_id` bigint(20) UNSIGNED NOT NULL,
  `is_paid` int(11) NOT NULL COMMENT 'eaither paid or unpaid',
  `final_price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_challenges`
--

CREATE TABLE `user_challenges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `challenge_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 = active  2=expired 3=won',
  `progress` int(11) NOT NULL DEFAULT 0 COMMENT 'how much user has done in each challenge',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_challenges`
--

INSERT INTO `user_challenges` (`id`, `user_id`, `challenge_id`, `status`, `progress`, `created_at`) VALUES
(1, 2, 6, 3, 0, '2024-02-18 16:15:39'),
(2, 2, 5, 3, 0, '2024-02-18 16:15:39');

-- --------------------------------------------------------

--
-- Table structure for table `user_ips`
--

CREATE TABLE `user_ips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_redeem_codes`
--

CREATE TABLE `user_redeem_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `redeem_code_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_shiped_products`
--

CREATE TABLE `user_shiped_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL COMMENT 'deivered or not',
  `address` text NOT NULL,
  `postal_code` int(11) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `winners`
--

CREATE TABLE `winners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `win_price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `winners`
--

INSERT INTO `winners` (`id`, `user_id`, `product_id`, `win_price`, `created_at`) VALUES
(1, 2, 10, 2, '2024-02-18 17:04:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admins_user_id_foreign` (`user_id`);

--
-- Indexes for table `auctions`
--
ALTER TABLE `auctions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auctions_current_winner_id_foreign` (`current_winner_id`),
  ADD KEY `auctions_final_winner_id_foreign` (`final_winner_id`),
  ADD KEY `auctions_product_id_foreign` (`product_id`);

--
-- Indexes for table `bidding_history`
--
ALTER TABLE `bidding_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bidding_history_user_id_foreign` (`user_id`),
  ADD KEY `bidding_history_auction_id_foreign` (`auction_id`),
  ADD KEY `bidding_history_category_id_foreign` (`category_id`);

--
-- Indexes for table `bidding_queue`
--
ALTER TABLE `bidding_queue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bidding_queue_bid_buddy_id_foreign` (`bid_buddy_id`),
  ADD KEY `bidding_queue_auction_id_foreign` (`auction_id`);

--
-- Indexes for table `bid_buddies`
--
ALTER TABLE `bid_buddies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bid_buddies_user_id_foreign` (`user_id`),
  ADD KEY `bid_buddies_auction_id_foreign` (`auction_id`);

--
-- Indexes for table `bid_packages`
--
ALTER TABLE `bid_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookmarks_user_id_foreign` (`user_id`),
  ADD KEY `bookmarks_auction_id_foreign` (`auction_id`);

--
-- Indexes for table `buy_it_now_offers`
--
ALTER TABLE `buy_it_now_offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buy_it_now_offers_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `challenges`
--
ALTER TABLE `challenges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `challenges_reward_id_foreign` (`reward_id`),
  ADD KEY `challenges_category_id_foreign` (`category_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_state_id_foreign` (`state_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_product_id_foreign` (`product_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `highest_bidders`
--
ALTER TABLE `highest_bidders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `highest_bidders_user_id_foreign` (`user_id`);

--
-- Indexes for table `highest_bidder_levels`
--
ALTER TABLE `highest_bidder_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_galleries_product_id_foreign` (`product_id`);

--
-- Indexes for table `redeem_codes`
--
ALTER TABLE `redeem_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rewards`
--
ALTER TABLE `rewards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `special_offers`
--
ALTER TABLE `special_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempraries`
--
ALTER TABLE `tempraries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_user_id_foreign` (`user_id`),
  ADD KEY `tickets_admin_id_foreign` (`admin_id`),
  ADD KEY `reply_to_id` (`reply_to_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`);

--
-- Indexes for table `transaction_histories`
--
ALTER TABLE `transaction_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_histories_transaction_id_foreign` (`transaction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_auction_wins`
--
ALTER TABLE `user_auction_wins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_auction_wins_user_id_foreign` (`user_id`),
  ADD KEY `user_auction_wins_auction_id_foreign` (`auction_id`);

--
-- Indexes for table `user_challenges`
--
ALTER TABLE `user_challenges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_challenges_user_id_foreign` (`user_id`),
  ADD KEY `user_challenges_challenge_id_foreign` (`challenge_id`);

--
-- Indexes for table `user_ips`
--
ALTER TABLE `user_ips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ips_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_redeem_codes`
--
ALTER TABLE `user_redeem_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_redeem_codes_user_id_foreign` (`user_id`),
  ADD KEY `user_redeem_codes_redeem_code_id_foreign` (`redeem_code_id`);

--
-- Indexes for table `user_shiped_products`
--
ALTER TABLE `user_shiped_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_shiped_products_user_id_foreign` (`user_id`),
  ADD KEY `user_shiped_products_product_id_foreign` (`product_id`),
  ADD KEY `user_shiped_products_state_id_foreign` (`state_id`),
  ADD KEY `user_shiped_products_city_id_foreign` (`city_id`);

--
-- Indexes for table `winners`
--
ALTER TABLE `winners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `winners_user_id_foreign` (`user_id`),
  ADD KEY `winners_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auctions`
--
ALTER TABLE `auctions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=549;

--
-- AUTO_INCREMENT for table `bidding_history`
--
ALTER TABLE `bidding_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bidding_queue`
--
ALTER TABLE `bidding_queue`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `bid_buddies`
--
ALTER TABLE `bid_buddies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `bid_packages`
--
ALTER TABLE `bid_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `buy_it_now_offers`
--
ALTER TABLE `buy_it_now_offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `challenges`
--
ALTER TABLE `challenges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `highest_bidders`
--
ALTER TABLE `highest_bidders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `highest_bidder_levels`
--
ALTER TABLE `highest_bidder_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=446;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `product_galleries`
--
ALTER TABLE `product_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `redeem_codes`
--
ALTER TABLE `redeem_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rewards`
--
ALTER TABLE `rewards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `special_offers`
--
ALTER TABLE `special_offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tempraries`
--
ALTER TABLE `tempraries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction_histories`
--
ALTER TABLE `transaction_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_auction_wins`
--
ALTER TABLE `user_auction_wins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_challenges`
--
ALTER TABLE `user_challenges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_ips`
--
ALTER TABLE `user_ips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_redeem_codes`
--
ALTER TABLE `user_redeem_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_shiped_products`
--
ALTER TABLE `user_shiped_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `winners`
--
ALTER TABLE `winners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `auctions`
--
ALTER TABLE `auctions`
  ADD CONSTRAINT `auctions_current_winner_id_foreign` FOREIGN KEY (`current_winner_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `auctions_final_winner_id_foreign` FOREIGN KEY (`final_winner_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `auctions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `bidding_history`
--
ALTER TABLE `bidding_history`
  ADD CONSTRAINT `bidding_history_auction_id_foreign` FOREIGN KEY (`auction_id`) REFERENCES `auctions` (`id`),
  ADD CONSTRAINT `bidding_history_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `bidding_history_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `bidding_queue`
--
ALTER TABLE `bidding_queue`
  ADD CONSTRAINT `bidding_queue_auction_id_foreign` FOREIGN KEY (`auction_id`) REFERENCES `auctions` (`id`),
  ADD CONSTRAINT `bidding_queue_bid_buddy_id_foreign` FOREIGN KEY (`bid_buddy_id`) REFERENCES `bid_buddies` (`id`);

--
-- Constraints for table `bid_buddies`
--
ALTER TABLE `bid_buddies`
  ADD CONSTRAINT `bid_buddies_auction_id_foreign` FOREIGN KEY (`auction_id`) REFERENCES `auctions` (`id`),
  ADD CONSTRAINT `bid_buddies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD CONSTRAINT `bookmarks_auction_id_foreign` FOREIGN KEY (`auction_id`) REFERENCES `auctions` (`id`),
  ADD CONSTRAINT `bookmarks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `buy_it_now_offers`
--
ALTER TABLE `buy_it_now_offers`
  ADD CONSTRAINT `buy_it_now_offers_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `challenges`
--
ALTER TABLE `challenges`
  ADD CONSTRAINT `challenges_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `challenges_reward_id_foreign` FOREIGN KEY (`reward_id`) REFERENCES `rewards` (`id`);

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `highest_bidders`
--
ALTER TABLE `highest_bidders`
  ADD CONSTRAINT `highest_bidders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD CONSTRAINT `product_galleries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transaction_histories`
--
ALTER TABLE `transaction_histories`
  ADD CONSTRAINT `transaction_histories_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`);

--
-- Constraints for table `user_auction_wins`
--
ALTER TABLE `user_auction_wins`
  ADD CONSTRAINT `user_auction_wins_auction_id_foreign` FOREIGN KEY (`auction_id`) REFERENCES `auctions` (`id`),
  ADD CONSTRAINT `user_auction_wins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_challenges`
--
ALTER TABLE `user_challenges`
  ADD CONSTRAINT `user_challenges_challenge_id_foreign` FOREIGN KEY (`challenge_id`) REFERENCES `challenges` (`id`),
  ADD CONSTRAINT `user_challenges_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_ips`
--
ALTER TABLE `user_ips`
  ADD CONSTRAINT `user_ips_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_redeem_codes`
--
ALTER TABLE `user_redeem_codes`
  ADD CONSTRAINT `user_redeem_codes_redeem_code_id_foreign` FOREIGN KEY (`redeem_code_id`) REFERENCES `redeem_codes` (`id`),
  ADD CONSTRAINT `user_redeem_codes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_shiped_products`
--
ALTER TABLE `user_shiped_products`
  ADD CONSTRAINT `user_shiped_products_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `user_shiped_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `user_shiped_products_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`),
  ADD CONSTRAINT `user_shiped_products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `winners`
--
ALTER TABLE `winners`
  ADD CONSTRAINT `winners_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `winners_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
