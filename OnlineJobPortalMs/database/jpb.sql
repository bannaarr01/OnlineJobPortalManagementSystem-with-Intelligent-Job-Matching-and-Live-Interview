-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 16, 2021 at 12:47 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jpb`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Administration and Management', '2021-09-15 23:12:17', '2021-09-15 23:12:17'),
(2, 'Animals and Environment', '2021-09-15 23:12:17', '2021-09-15 23:12:17'),
(3, 'Computing and ICT', '2021-09-15 23:12:17', '2021-09-15 23:12:17'),
(4, 'Construction and Building', '2021-09-15 23:12:17', '2021-09-15 23:12:17'),
(5, 'Design and Arts', '2021-09-15 23:12:17', '2021-09-15 23:12:17'),
(6, 'Education and Training', '2021-09-15 23:12:17', '2021-09-15 23:12:17'),
(7, 'Engineering', '2021-09-15 23:12:17', '2021-09-15 23:12:17'),
(8, 'Financial Services', '2021-09-15 23:12:17', '2021-09-15 23:12:17'),
(9, 'Facilities and Property Services', '2021-09-15 23:12:17', '2021-09-15 23:12:17'),
(10, 'Healthcare', '2021-09-15 23:12:17', '2021-09-15 23:12:17'),
(11, 'Manufacturing and Production', '2021-09-15 23:12:17', '2021-09-15 23:12:17'),
(12, 'Transport and Logistics', '2021-09-15 23:12:17', '2021-09-15 23:12:17');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `cname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slogan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `user_id`, `cname`, `slug`, `address`, `phone`, `website`, `logo`, `cover_photo`, `slogan`, `description`, `created_at`, `updated_at`) VALUES
(1, 12, 'Zemlak LLC', 'zemlak-llc', '62942 Precinct 5, Putrajaya', '+605-998 1920', 'kuhlman.com', NULL, NULL, 'learn-earn and grow', 'Assumenda voluptas voluptates illum sint. Ea architecto ut totam. Doloribus nisi et architecto necessitatibus vitae. Ratione et nemo eligendi sit rerum. Non praesentium rerum dolores enim at iusto. Magni ut animi officia quos eveniet. Sint minima omnis in', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(2, 21, 'Trantow, Gorczany and Mosciski', 'trantow-gorczany-and-mosciski', '72530 Chembong, Negeri Sembilan', '+609-364 5826', 'satterfield.com', NULL, NULL, 'learn-earn and grow', 'Quis laboriosam repellendus at quis eos a. Assumenda blanditiis suscipit vitae eum et tenetur qui. Magnam cum nesciunt accusamus ab in minima. Labore assumenda repellendus vero excepturi aspernatur adipisci at.', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(3, 25, 'Goldner and Sons', 'goldner-and-sons', '62434 Precinct 1, Putrajaya', '+607-871 3932', 'barton.com', NULL, NULL, 'learn-earn and grow', 'Voluptatem sed aut quisquam omnis sequi libero. Et labore quis minus nostrum eum. Temporibus iusto ducimus quis aut molestiae. Maxime quia veritatis vel sint.', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(4, 15, 'Walter, Little and Homenick', 'walter-little-and-homenick', '87023 Rancha-Rancha, Labuan', '+604-125 0686', 'hansen.org', NULL, NULL, 'learn-earn and grow', 'Vel qui at ut atque. Modi ratione labore et quisquam. Et voluptate dolorem deserunt et officia quisquam. Sint fugiat et ad alias. Repellendus officiis excepturi laborum sint excepturi magnam.', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(5, 20, 'Boyer Group', 'boyer-group', '20159 Kampung Raja, Terengganu', '+609-741 6054', 'dooley.org', NULL, NULL, 'learn-earn and grow', 'A inventore illo pariatur qui numquam autem fuga. In qui ab necessitatibus voluptatem est. Sapiente quia error iste deleniti. Sed est molestias quibusdam eaque. Voluptates cupiditate ea in. Vel explicabo qui ut. Id architecto quae harum perferendis qui. S', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(6, 14, 'O\'Kon Group', 'okon-group', '95535 Oya, Sarawak', '+605-459 2139', 'ferry.com', NULL, NULL, 'learn-earn and grow', 'Debitis ea consectetur velit voluptatem pariatur aperiam maiores. Et vero vero vel dolores et molestiae.', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(7, 26, 'Doyle PLC', 'doyle-plc', '47358 Port Klang, Selangor Darul Ehsan', '+609-584 3733', 'larkin.com', NULL, NULL, 'learn-earn and grow', 'Dolor et est et et libero eum. Eius ea eveniet maxime consequatur commodi. Est eum qui distinctio ut nobis. Impedit aut deleniti et aut. Voluptatibus molestias fuga hic saepe.', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(8, 2, 'Spencer PLC', 'spencer-plc', '87013 Rancha-Rancha, Labuan', '+605-162 0432', 'carroll.net', NULL, NULL, 'learn-earn and grow', 'Ut voluptas nostrum eius distinctio saepe id. Sint omnis voluptatum eum sequi ut similique. Consequatur molestiae aut qui voluptatem. Veritatis hic minima corrupti tempora optio in laudantium nam. Adipisci quae officiis neque corporis.', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(9, 5, 'Pfannerstill LLC', 'pfannerstill-llc', '39004 Kota Shahbandar, Pahang Darul Makmur', '+604-962 7186', 'weimann.com', NULL, NULL, 'learn-earn and grow', 'Et eum animi eveniet adipisci magni autem aliquid. Consequatur eveniet in et ea qui officia aut. Magni esse dicta ab dolores facere in. Consectetur perferendis occaecati doloribus eos soluta. Inventore iste nisi ut nisi ex quo. Debitis voluptatibus volupt', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(10, 15, 'Funk LLC', 'funk-llc', '72017 Mantin, Negeri Sembilan', '+606-919 3885', 'rath.com', NULL, NULL, 'learn-earn and grow', 'Et exercitationem et delectus error culpa voluptatem libero impedit. Tempore qui explicabo magni. Et quaerat minus dolore facilis. Id itaque nostrum voluptas et tenetur optio laborum. Quis fugiat laudantium non voluptatibus est. Aliquid tempora nam exerci', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(11, 12, 'Towne-Torphy', 'towne-torphy', '39014 Kuala Lipis, Pahang Darul Makmur', '+604-899 8338', 'heidenreich.biz', NULL, NULL, 'learn-earn and grow', 'Animi veniam voluptatum necessitatibus et. Vero cum nihil et porro dolore impedit. Quidem porro autem aut libero. Voluptatum similique quos numquam eos rerum qui ipsum. Qui eaque laborum aliquid vel harum. Qui praesentium ullam quasi at occaecati aut sed.', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(12, 27, 'Beier, Roberts and Connelly', 'beier-roberts-and-connelly', '97804 Sibu, Sarawak', '+604-334 9240', 'gislason.org', NULL, NULL, 'learn-earn and grow', 'Quasi in et officiis voluptate possimus. Sapiente id fugit voluptates explicabo odit ex. Voluptas sint nihil cupiditate nam est. Quia nostrum sint ipsa. Itaque ut nihil iure temporibus.', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(13, 20, 'Rosenbaum-Connelly', 'rosenbaum-connelly', '45541 Bandar Sunway, Selangor Darul Ehsan', '+605-486 9386', 'weimann.com', NULL, NULL, 'learn-earn and grow', 'Cumque maxime et nihil doloremque omnis aut beatae sapiente. Non reiciendis harum eaque rem impedit. Totam illum laudantium vitae voluptas qui neque dolores. Inventore consequatur et corrupti fuga unde. Impedit mollitia animi asperiores iusto dignissimos ', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(14, 29, 'Ryan PLC', 'ryan-plc', '23039 Jerteh, Terengganu Darul Iman', '+6084-87 0925', 'considine.com', NULL, NULL, 'learn-earn and grow', 'Magnam omnis ut molestiae qui reprehenderit quia facilis. Autem ipsum dolorem vel aliquid repellat vel repudiandae. Quae nam vel libero et quos dolor. Et est facere quibusdam minima non et. Eius ea officiis nihil rem. Dolorem numquam et qui atque necessit', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(15, 13, 'Haag Inc', 'haag-inc', '07516 Pendang, Kedah Darul Aman', '+605-264 0183', 'bruen.com', NULL, NULL, 'learn-earn and grow', 'Nulla reiciendis sit odio beatae voluptatem ut est. Explicabo facere est et ut. Fuga ut qui aut vel. Quo dolorem et dolores. Itaque provident expedita aut sit impedit. Consectetur sed quo doloribus.', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(16, 24, 'Corkery, Zboncak and Zemlak', 'corkery-zboncak-and-zemlak', '73331 Ampangan, Negeri Sembilan', '+6086-58 5151', 'jaskolski.com', NULL, NULL, 'learn-earn and grow', 'Facilis fuga modi similique optio esse sed quos. Quas voluptatem ut nisi vitae consequatur. Voluptate suscipit ratione quidem autem sed placeat. A est aliquam aut aperiam vero sit aliquid. Officia aliquam perferendis quidem odit quia quo dolorum. Corporis', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(17, 18, 'Frami and Sons', 'frami-and-sons', '12433 Gelugor, Pulau Pinang', '+6085-09 0698', 'heathcote.com', NULL, NULL, 'learn-earn and grow', 'Dolor laboriosam quasi corrupti. Qui occaecati voluptatem maxime nobis. Molestiae quos id quibusdam atque velit. Sunt aut facere quae animi odit eveniet eos excepturi. Odio sequi est sed quae quas ratione quod.', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(18, 19, 'Bartell PLC', 'bartell-plc', '16555 Jeli, Kelantan', '+603-4226 3078', 'frami.com', NULL, NULL, 'learn-earn and grow', 'Esse deserunt ut minima veniam. Asperiores vel nemo libero itaque blanditiis. Nulla nam omnis quia labore et possimus. Sint consequatur quis illo et animi. Aperiam ut porro officiis et voluptas facilis. Nostrum natus dicta est labore placeat. Alias a expe', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(19, 19, 'Stark, D\'Amore and Jast', 'stark-damore-and-jast', '58304 Kampung Kasipillay, WP Kuala Lumpur', '+607-071 1179', 'cronin.com', NULL, NULL, 'learn-earn and grow', 'Laboriosam doloribus nam tempora. Amet est voluptatem modi consequatur et. Nulla est ratione recusandae dolores. Consequatur est ullam sequi ea dolorum.', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(20, 25, 'Rempel, Gerlach and Brown', 'rempel-gerlach-and-brown', '98435 Matu, Sarawak', '+603-4618 9582', 'beer.biz', NULL, NULL, 'learn-earn and grow', 'Cumque consequatur aut enim quae architecto voluptatem quas. In expedita et in est quasi est libero ab. Tenetur quia molestiae ea. Eum quia voluptatem ea minima qui eius.', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(21, 29, 'Jakubowski-Kirlin', 'jakubowski-kirlin', '17064 Dabong, Kelantan Darul Naim', '+607-155 2859', 'grady.com', NULL, NULL, 'learn-earn and grow', 'Laboriosam eos itaque qui voluptatem. Ea nemo dolorem aut tempora in. Consequatur velit dolorem et corporis temporibus. Et illum veniam facilis dolores sed fugit. Molestias necessitatibus aut qui nemo.', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(22, 14, 'VonRueden-Spencer', 'vonrueden-spencer', '71174 Lenggeng, Negeri Sembilan Darul Khusus', '+606-397 5034', 'waters.com', NULL, NULL, 'learn-earn and grow', 'Omnis ratione ipsum suscipit est voluptas. Deleniti et libero dolor non tenetur est consequatur. Sed consectetur qui ipsum ea.', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(23, 7, 'Ledner-Cronin', 'ledner-cronin', '72290 Batang Benar, Negeri Sembilan', '+603-5695 9184', 'lang.com', NULL, NULL, 'learn-earn and grow', 'Esse nisi dolorum sed quo ad veritatis. Earum repudiandae ullam et omnis. Quis placeat omnis ut vero doloremque quos exercitationem.', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(24, 16, 'Langworth-McLaughlin', 'langworth-mclaughlin', '12472 Kepala Batas, Penang', '+605-706 5742', 'powlowski.biz', NULL, NULL, 'learn-earn and grow', 'Maxime eum commodi quia. Quidem ut illo hic natus nostrum voluptate. Necessitatibus numquam ducimus consequuntur nesciunt quidem ipsa. In perspiciatis impedit fugiat. Rem non repellat aut aliquid libero. Accusamus sed voluptatum saepe eius corporis offici', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(25, 5, 'Collins, Bartoletti and Prohaska', 'collins-bartoletti-and-prohaska', '98774 Batu Kawa, Sarawak', '+606-980 6258', 'gutkowski.com', NULL, NULL, 'learn-earn and grow', 'Praesentium in commodi ratione aut. Architecto et quisquam qui enim rerum. Modi blanditiis molestiae quis voluptatem inventore voluptatem eius. Asperiores sit voluptatibus non laboriosam libero. Temporibus autem ullam blanditiis hic soluta aut. Animi vel ', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(26, 24, 'Towne-Stroman', 'towne-stroman', '22080 Wakaf Tapai, Terengganu Darul Iman', '+607-374 6268', 'bartoletti.com', NULL, NULL, 'learn-earn and grow', 'Animi deserunt molestias explicabo sed corporis accusantium inventore. Reiciendis eveniet modi quas accusantium neque provident ea. Quo iure aut dolorum quod et. Maxime non iste et velit inventore iure dolorem. Quos non dolorem rerum quae. Aut facere sit ', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(27, 18, 'Bailey, Nienow and Littel', 'bailey-nienow-and-littel', '57246 Karak, Pahang Darul Makmur', '+6084-13 7134', 'erdman.biz', NULL, NULL, 'learn-earn and grow', 'Sunt nihil ut alias error consequatur atque modi. Modi consequatur enim cupiditate sint earum pariatur ut. Nesciunt tenetur non aut sunt. Unde qui voluptate aperiam expedita magni explicabo.', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(28, 19, 'Parisian Inc', 'parisian-inc', '32035 Kuala Kangsar, Perak', '+604-977 1483', 'ward.com', NULL, NULL, 'learn-earn and grow', 'Architecto est et dolore qui. Et aliquam perspiciatis fugiat. Non alias architecto aperiam blanditiis. Dolorum cum officiis explicabo necessitatibus et. Esse in quae assumenda quae voluptate harum quia. Esse aliquam laborum consequatur officia saepe. Et q', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(29, 3, 'Tillman-O\'Kon', 'tillman-okon', '14074 Bayan Lepas, Pulau Pinang', '+603-2379 8107', 'abernathy.com', NULL, NULL, 'learn-earn and grow', 'Ut dolorem in dolorum est. Expedita non sed veritatis dolores pariatur. Molestias ullam itaque quos cum deserunt ipsa et nesciunt. Optio ea harum exercitationem est. Aut id itaque nam fugiat reprehenderit dolores.', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(30, 18, 'Farrell, Mante and Kuhic', 'farrell-mante-and-kuhic', '62170 Precinct 10, Putrajaya', '+605-775 8944', 'predovic.com', NULL, NULL, 'learn-earn and grow', 'Eaque consequuntur nobis laudantium enim unde. Adipisci est rerum ab aliquam non nam. Eius aspernatur nesciunt qui alias placeat temporibus numquam. Laborum facilis facilis qui minus blanditiis aperiam. Velit voluptate eum eum illo doloremque ut consectet', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(31, 31, 'JobsVizor', 'jobsvizor', 'Jalan Tamah Bandar', '01234567890', 'bing.com', '1628002258.png', '1628045847.png', 'We rise by lifting others', '<p>We provide jobs all across Malaysia</p>', '2021-08-02 23:28:01', '2021-09-12 02:35:30'),
(32, 32, 'Grabyo', 'grabyo', '', '', '', '1628049051.png', NULL, '', '', '2021-08-03 04:35:22', '2021-08-03 19:50:51'),
(33, 33, 'BELIMO', 'belimo', '245 jalan Hijauan', '01234567890', 'belimo.com', '1628002350.png', NULL, 'We cater for the needs of humanity', 'We have been established since 1985 with good advancement over the years', '2021-08-03 05:00:12', '2021-08-03 19:27:17'),
(34, 34, 'myob', 'myob', '', '', '', NULL, NULL, '', '', '2021-08-03 05:04:30', '2021-08-03 05:04:30'),
(35, 39, 'JowiZaza', 'jowizaza', '', '', '', NULL, NULL, '', '', '2021-09-05 04:00:34', '2021-09-05 04:00:34');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`id`, `job_id`, `user_id`, `created_at`, `updated_at`) VALUES
(5, 36, 35, '2021-09-07 16:23:37', '2021-09-07 16:23:37');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(2555) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` int(11) NOT NULL,
  `qualification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_vacancy` int(11) NOT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `last_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `user_id`, `company_id`, `title`, `slug`, `description`, `roles`, `category_id`, `position`, `address`, `state`, `type`, `experience`, `qualification`, `number_of_vacancy`, `salary`, `status`, `last_date`, `created_at`, `updated_at`) VALUES
(1, '11', '11', 'Labore sit debitis autem necessitatibus molestiae aliquid quia. Animi ut nihil neque minus repudiandae quia. Possimus vel et nobis aut sequi corrupti hic quam.', 'labore-sit-debitis-autem-necessitatibus-molestiae-aliquid-quia-animi-ut-nihil-neque-minus-repudiandae-quia-possimus-vel-et-nobis-aut-sequi-corrupti-hic-quam', 'Impedit cum rerum voluptatem eum nisi. Iure ullam ut maiores eius ipsum. Dolorem doloribus ipsam sit odit qui optio quibusdam. Et consectetur eligendi natus. Quidem facere quia autem eligendi. Fugit numquam architecto qui. Eos vero id eius et voluptatem.', 'Quidem sequi quod magnam architecto et. Cum aut ipsa quaerat cupiditate. Nostrum quia dolores nesciunt atque consectetur distinctio. Saepe in cumque aut aperiam mollitia quibusdam aperiam.', 4, 'City Planning Aide', 'Taman Aman', 'Johor', 'fulltime', 12, 'BSC/Masters Degree', 10, '4453', 0, '2021-08-13', '2021-08-02 23:12:17', '2021-09-09 09:28:14'),
(2, '6', '17', 'Laudantium neque iure odit a natus et. Rem unde autem ratione ea aut perspiciatis. Suscipit aut corrupti voluptas non hic eveniet. Sunt suscipit eveniet omnis ut accusamus est tempora sed.', 'laudantium-neque-iure-odit-a-natus-et-rem-unde-autem-ratione-ea-aut-perspiciatis-suscipit-aut-corrupti-voluptas-non-hic-eveniet-sunt-suscipit-eveniet-omnis-ut-accusamus-est-tempora-sed', 'Veritatis officia aperiam nostrum. Quisquam qui recusandae id illo omnis doloribus est. Sit ducimus quaerat sed quia corrupti sit magnam debitis. Aut at odio aut veritatis perspiciatis saepe sapiente est. Velit esse repellendus iusto quasi id aliquid non.', 'Qui eum porro possimus consequatur qui quis officiis beatae. Non eveniet recusandae quia cum. Aut dolorem cumque quas dolorem excepturi quaerat.', 2, 'Brickmason', 'Taman Utama', 'Kedah', 'fulltime', 9, 'BSC/Masters Degree', 4, '12869', 1, '2022-01-05', '2021-08-02 23:12:17', '2021-09-09 09:28:19'),
(3, '10', '13', 'bank manager', 'bank-manager', 'Ipsum laboriosam eos voluptatum tenetur aut animi qui. Enim nobis mollitia vero atque quibusdam velit necessitatibus ut. Quos temporibus nobis velit repellendus aut eaque incidunt et. Qui sequi quae aut totam ipsum magnam. Nihil repudiandae tempora ration', 'Aliquam molestias harum doloribus beatae deleniti. Necessitatibus et sed velit sed. Numquam possimus quae quia. Quae aut ad modi est architecto nostrum. Vero qui iure iure unde rerum.', 4, 'Space Sciences Teacher', 'SS92', 'Johor', 'fulltime', 6, 'BSC/Masters Degree', 10, '11273', 1, '2021-12-01', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(4, '18', '8', 'manager', 'manager', 'Autem aut iure qui. Saepe saepe laudantium doloribus repellat pariatur corporis. Est aperiam placeat omnis. Quo est harum nam aut. Maiores incidunt eos quam consequatur voluptates. Non distinctio est facilis rerum pariatur dicta. Consectetur magni aliquam', 'Voluptas totam natus impedit rerum. Reiciendis tempore qui soluta eum assumenda voluptatem. In quae quia explicabo vel vitae magni nihil. Sequi asperiores corrupti eius.', 4, 'Motion Picture Projectionist', 'Desa Impian', 'Kedah', 'fulltime', 16, 'BSC/Masters Degree', 4, '4295', 1, '2021-11-30', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(5, '20', '16', 'Nihil consequuntur et non nobis quaerat minima. Et quaerat non hic id ut nihil quam laboriosam. Quam et molestiae nisi animi vel amet quasi. Omnis corrupti totam quis amet.', 'nihil-consequuntur-et-non-nobis-quaerat-minima-et-quaerat-non-hic-id-ut-nihil-quam-laboriosam-quam-et-molestiae-nisi-animi-vel-amet-quasi-omnis-corrupti-totam-quis-amet', 'Iure sit omnis voluptates vel dolor assumenda. Animi illum officiis harum assumenda at cumque dolor. Voluptatem dolores eos temporibus.', 'Quod minima quos vitae. Nihil quod cumque aspernatur illo itaque. Ut eos dolor hic officiis omnis esse.', 2, 'Personal Service Worker', 'Bandar Aman', 'Kelantan', 'fulltime', 13, 'BSC/Masters Degree', 9, '3059', 0, '2022-02-01', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(6, '17', '10', 'Repellendus laboriosam nulla sed et dolorem et. Quis nemo ad officiis. Modi velit eos facere. Est velit animi assumenda laboriosam sit quia.', 'repellendus-laboriosam-nulla-sed-et-dolorem-et-quis-nemo-ad-officiis-modi-velit-eos-facere-est-velit-animi-assumenda-laboriosam-sit-quia', 'Praesentium officiis et enim sint numquam non. Aut vero sequi autem sit exercitationem. Provident earum qui voluptatem placeat placeat a. Quis provident excepturi ipsum aperiam rerum. Quia ipsum sequi animi voluptas sint cum. Rerum iusto veniam asperiores', 'Dolore nulla aut hic voluptas. Ut delectus eius a. Soluta cumque amet sit illo dolores. Illum nostrum rerum maxime eaque sit.', 5, 'Flight Attendant', 'Seksyen 55', 'Kelantan', 'fulltime', 3, 'BSC/Masters Degree', 1, '14971', 1, '2021-09-30', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(7, '5', '12', 'Nobis aut velit adipisci consectetur voluptatem. Ipsam qui voluptates suscipit culpa illum. Rerum vero velit nihil. Veniam neque ipsum delectus ullam ut rerum tenetur quibusdam.', 'nobis-aut-velit-adipisci-consectetur-voluptatem-ipsam-qui-voluptates-suscipit-culpa-illum-rerum-vero-velit-nihil-veniam-neque-ipsum-delectus-ullam-ut-rerum-tenetur-quibusdam', 'Odio quaerat optio blanditiis. Dignissimos tenetur aut iure assumenda exercitationem. Accusamus expedita animi est perferendis aut mollitia quibusdam ut. Repudiandae expedita sit cum voluptate. Dolorem incidunt dolor et sed commodi repellat quas. Aut vero', 'Nobis voluptate in quibusdam non voluptatem nulla officia. Eveniet dolor illo non earum. Inventore alias similique id laborum.', 5, 'Annealing Machine Operator', 'Taman Tun Perak', 'Malacca', 'fulltime', 16, 'BSC/Masters Degree', 1, '7777', 0, '2021-11-22', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(8, '15', '16', 'Vitae omnis id commodi praesentium dolores non. Sed sapiente voluptas quibusdam pariatur. Itaque incidunt eligendi et. Dolorum eum ipsum vel voluptatem est consequatur natus.', 'vitae-omnis-id-commodi-praesentium-dolores-non-sed-sapiente-voluptas-quibusdam-pariatur-itaque-incidunt-eligendi-et-dolorum-eum-ipsum-vel-voluptatem-est-consequatur-natus', 'Explicabo et quasi sit dolor rerum doloribus dolor maiores. Inventore officiis dolor veritatis tempora doloremque ut. Tempore dolore sed nam quo qui. Quidem libero sunt fugit omnis. Cum quibusdam sit quia harum consequatur et.', 'Enim rerum sint quo sunt. Harum ut est est aperiam corporis aut. Non illum consectetur et eaque. Sit aspernatur dolorum temporibus est inventore rerum nihil.', 3, 'Credit Analyst', 'Seksyen 11', 'Kelantan', 'fulltime', 10, 'BSC/Masters Degree', 6, '10063', 0, '2021-12-22', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(9, '26', '5', 'Nobis esse rem enim facere ad aperiam consequatur voluptas. Odio ullam nihil officiis atque. Rem quo repellat sunt est rem cum et ab.', 'nobis-esse-rem-enim-facere-ad-aperiam-consequatur-voluptas-odio-ullam-nihil-officiis-atque-rem-quo-repellat-sunt-est-rem-cum-et-ab', 'Placeat mollitia iusto fugiat sed atque qui. Et veritatis omnis dolore. Dolorem vero nostrum quo dignissimos veritatis tempora neque.', 'Sit qui voluptate est quod autem sequi voluptatem. Id temporibus vero atque ad harum eveniet. Sit sunt pariatur perspiciatis reiciendis.', 4, 'Industrial-Organizational Psychologist', 'SS32', 'Negeri Sembilan', 'fulltime', 16, 'BSC/Masters Degree', 8, '3366', 1, '2021-10-01', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(10, '17', '18', 'Qui vel explicabo corrupti ab corrupti sunt nobis. Expedita sit autem voluptatem eveniet quisquam. Laboriosam omnis eum omnis expedita.', 'qui-vel-explicabo-corrupti-ab-corrupti-sunt-nobis-expedita-sit-autem-voluptatem-eveniet-quisquam-laboriosam-omnis-eum-omnis-expedita', 'Consequatur nam sunt velit laboriosam ex a dolores tempore. Aut ut minus maxime id sint itaque ipsam. Molestiae ipsam praesentium sit aut qui et qui dolor. Voluptatem pariatur dolor dolorem et. Veritatis omnis nihil maiores voluptate illo sed alias. Qui n', 'Quia quis odio dolor sint ipsam ullam at. Veritatis quos consequatur dolor et culpa dolores. Ex magni est cupiditate labore voluptas laborum rem. Non et qui qui ad explicabo.', 1, 'Court Clerk', 'Taman Mulia', 'Negeri Sembilan', 'fulltime', 7, 'BSC/Masters Degree', 4, '2879', 1, '2021-09-14', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(11, '27', '23', 'Alias quibusdam iure impedit facere distinctio. Ea est odit qui rerum sed qui sunt hic. Necessitatibus officia repellendus voluptas optio quo sit.', 'alias-quibusdam-iure-impedit-facere-distinctio-ea-est-odit-qui-rerum-sed-qui-sunt-hic-necessitatibus-officia-repellendus-voluptas-optio-quo-sit', 'Quos eos quisquam autem quisquam possimus. Rerum odit doloribus et ratione. Recusandae tenetur eligendi veritatis porro perspiciatis et. Incidunt architecto dolore esse ex. Illum rerum iste cumque tempora sunt.', 'Omnis in commodi sunt voluptates. Est fuga at molestiae beatae. Non excepturi dolores nostrum. Perferendis itaque rerum autem.', 1, 'Prepress Technician', 'Bandar Seri Damai', 'Pahang', 'fulltime', 6, 'BSC/Masters Degree', 4, '5939', 1, '2021-09-25', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(12, '20', '9', 'Fuga magnam autem eos ut quia et provident sequi. Quo error et est ea et quo distinctio. Tempore ratione et est cupiditate maxime quia consequatur.', 'fuga-magnam-autem-eos-ut-quia-et-provident-sequi-quo-error-et-est-ea-et-quo-distinctio-tempore-ratione-et-est-cupiditate-maxime-quia-consequatur', 'Reprehenderit quae possimus atque neque exercitationem ab itaque. Enim accusamus optio aut quas culpa quisquam nam. Velit quibusdam ea eos excepturi aut. Vel et vitae expedita quia aspernatur officiis vitae.', 'Soluta eos hic recusandae itaque sit architecto. Qui quia vel error quisquam. Dolorum rerum odit facilis est asperiores vel excepturi molestiae.', 2, 'Graphic Designer', 'PJU4', 'Pahang', 'fulltime', 3, 'BSC/Masters Degree', 5, '9170', 0, '2021-09-27', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(13, '8', '14', 'Numquam dolores ut cum tempore voluptas. Officia autem labore consequatur non necessitatibus nihil. Aliquid ipsum cupiditate modi libero aut ut.', 'numquam-dolores-ut-cum-tempore-voluptas-officia-autem-labore-consequatur-non-necessitatibus-nihil-aliquid-ipsum-cupiditate-modi-libero-aut-ut', 'Velit veniam dolores facilis tempore consequuntur voluptatem dolore. Veniam reprehenderit repellendus laboriosam quia rerum. Soluta earum ut fugiat laboriosam natus. Voluptatum vel sit delectus sunt officia consequatur. Voluptatum et eaque rem at.', 'Est est et ut ratione sit ut. Deserunt occaecati omnis itaque delectus qui. Harum sed unde qui et. Officiis nemo sed et dolor est. Voluptatum tempora id odio expedita.', 4, 'TSA', 'Damansara Kuchai', 'Penang', 'fulltime', 4, 'BSC/Masters Degree', 4, '9005', 1, '2021-10-06', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(14, '19', '27', 'Iure at aut perspiciatis autem corporis soluta. Tenetur adipisci fugiat minima minus expedita. Impedit incidunt fugiat sit aut omnis voluptas.', 'iure-at-aut-perspiciatis-autem-corporis-soluta-tenetur-adipisci-fugiat-minima-minus-expedita-impedit-incidunt-fugiat-sit-aut-omnis-voluptas', 'Omnis illo rerum sed voluptatibus quasi. Sed blanditiis provident pariatur quia. Sed quia ab libero quia omnis. Corporis cumque non deleniti possimus autem quibusdam. Atque voluptates libero numquam possimus et. Non vel sit eos aperiam. Architecto in debi', 'Fugit quidem ut necessitatibus in consequuntur impedit. Aut architecto veniam ipsum molestiae sequi voluptas odio autem. Illo nihil nobis ut repellat explicabo voluptatem voluptas dolorem.', 5, 'Pharmacy Aide', 'PJS77B', 'Penang', 'fulltime', 11, 'BSC/Masters Degree', 2, '13004', 1, '2021-08-30', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(15, '2', '2', 'Et necessitatibus soluta perspiciatis aut id omnis. Eaque sint aut ut reprehenderit deserunt nesciunt tempora eveniet.', 'et-necessitatibus-soluta-perspiciatis-aut-id-omnis-eaque-sint-aut-ut-reprehenderit-deserunt-nesciunt-tempora-eveniet', 'Et ut odio optio quam. Eum sit nisi perferendis et occaecati et. Aperiam id sint modi voluptas explicabo et. Deleniti est culpa dolorum et deserunt minima itaque perspiciatis. Temporibus expedita omnis doloremque perspiciatis laborum voluptas. Cupiditate ', 'Qui molestias illum praesentium aliquid. Ea aut blanditiis officiis quisquam ut cum sed. Molestias non est dicta fugiat quidem qui nisi. Temporibus animi autem aut dolorum rerum occaecati.', 5, 'Recreational Therapist', 'Seri Menjalara', 'Perak', 'fulltime', 3, 'BSC/Masters Degree', 7, '6362', 0, '2021-08-23', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(16, '17', '7', 'Non harum libero aut in consequatur. Soluta iusto nisi totam cupiditate id quo.', 'non-harum-libero-aut-in-consequatur-soluta-iusto-nisi-totam-cupiditate-id-quo', 'Ipsum nam necessitatibus veritatis amet. Commodi dicta eos id placeat et quis. Sit et in ea exercitationem cumque. Inventore qui ut sapiente iusto vero et odit. Et esse laborum rem odio. Laboriosam laudantium doloribus cumque asperiores dolor. Aliquam eos', 'Vero consequatur quo consequuntur voluptatem fuga. Impedit corporis occaecati est in. Repellat ut quia voluptatem.', 2, 'Plant and System Operator', 'Taman Belakong', 'Perak', 'fulltime', 10, 'BSC/Masters Degree', 4, '8946', 0, '2022-01-18', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(17, '16', '1', 'Aspernatur iure eum veniam temporibus et sint. Et iure aliquid ea doloremque dolor eum. Officia autem et voluptatem consequatur a quo ut. Quas quia temporibus atque magnam unde.', 'aspernatur-iure-eum-veniam-temporibus-et-sint-et-iure-aliquid-ea-doloremque-dolor-eum-officia-autem-et-voluptatem-consequatur-a-quo-ut-quas-quia-temporibus-atque-magnam-unde', 'Id sapiente dolore consequatur sed. Maiores consequuntur cumque tempore voluptatem omnis a. Officia vel iusto error qui reiciendis sunt ea. Libero occaecati at inventore adipisci sed nostrum commodi repellat. Officiis sunt molestiae fugit quibusdam. Nulla', 'Facilis temporibus voluptate et nihil soluta et. Fugiat omnis similique sunt beatae quo rerum est.', 2, 'Trainer', 'Bandar Baru Timur', 'Perlis', 'fulltime', 8, 'BSC/Masters Degree', 5, '3735', 0, '2021-12-10', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(18, '21', '5', 'Aliquid et rem vel ducimus facilis autem cum. Nam eaque nisi tempora magnam officia doloremque quibusdam. Iusto autem et dolor.', 'aliquid-et-rem-vel-ducimus-facilis-autem-cum-nam-eaque-nisi-tempora-magnam-officia-doloremque-quibusdam-iusto-autem-et-dolor', 'Et quo velit aut soluta. Molestias aut fugit voluptates autem hic. Esse quibusdam omnis est assumenda fuga cumque. Nostrum quidem autem eos aut.', 'Nam voluptas nisi totam minus quia adipisci. Eos et est ut debitis. Non cum corrupti ut amet fuga. Ut aut voluptatem odit nesciunt qui.', 2, 'Clinical Psychologist', 'Seksyen 19O', 'Perlis', 'internship', 3, 'BSC/Masters Degree', 1, '13876', 0, '2022-01-01', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(19, '24', '17', 'Dolores reprehenderit dolor explicabo. Totam eaque ea sit sit aspernatur. Similique eius optio est. Dolorum voluptate animi quod.', 'dolores-reprehenderit-dolor-explicabo-totam-eaque-ea-sit-sit-aspernatur-similique-eius-optio-est-dolorum-voluptate-animi-quod', 'Dolorem quia repellat nihil animi voluptatem vel voluptatem. Dolor tempore aliquid libero mollitia dolor consequuntur. Ea vero culpa magni nemo accusantium dolor consequatur.', 'Similique est ut aliquam quisquam dolores. Occaecati ad consequuntur voluptatem aut mollitia iste. Fugiat assumenda quaerat fugit debitis vero quos voluptas.', 1, 'Music Director', 'USJ 80', 'Sabah', 'remote', 11, 'BSC/Masters Degree', 1, '9492', 0, '2021-12-01', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(20, '11', '7', 'Quo facere soluta hic. Non qui est veniam dolore. Qui ea ipsa nemo explicabo maiores et praesentium est.', 'quo-facere-soluta-hic-non-qui-est-veniam-dolore-qui-ea-ipsa-nemo-explicabo-maiores-et-praesentium-est', 'Facilis suscipit amet non sapiente voluptatem inventore. Delectus repellendus sunt consequuntur similique placeat. Consequatur ipsam impedit quo sit voluptatem sit vero. Nemo facilis et optio exercitationem quos sunt dolores.', 'Aut voluptatem laborum dolorem quis voluptas. Quia ex unde aut dolore ratione et. Repellat in illum nam adipisci ex.', 2, 'Compliance Officers', 'Seksyen 4', 'Sabah', 'parttime', 15, 'BSC/Masters Degree', 2, '9078', 0, '2021-11-12', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(21, '6', '8', 'Incidunt voluptas vel possimus suscipit. Impedit nemo sint tempore fugiat deleniti deserunt. Sed quibusdam eius facilis alias labore est.', 'incidunt-voluptas-vel-possimus-suscipit-impedit-nemo-sint-tempore-fugiat-deleniti-deserunt-sed-quibusdam-eius-facilis-alias-labore-est', 'Ipsum voluptas laborum ut nihil. Qui dolores necessitatibus in tempora repellat. Eum et nostrum neque nulla nemo veritatis possimus. Explicabo neque laboriosam aperiam eos eveniet. Neque ea aut illum accusantium voluptas praesentium. Eum id ullam eaque as', 'Totam repellendus sed odio a qui. Totam unde magni quis et veritatis. Sint nam ut architecto fugit ut beatae qui quia. Ut aperiam magni voluptas minus.', 1, 'Physical Therapist', 'Bandar Sri Medan', 'Sarawak', 'parttime', 15, 'BSC/Masters Degree', 2, '9981', 0, '2021-08-18', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(22, '30', '20', 'Mollitia accusantium id nisi illum culpa animi tempore. Nemo sunt aliquam labore aut eaque. Assumenda est eaque nulla corporis hic accusantium tenetur quidem.', 'mollitia-accusantium-id-nisi-illum-culpa-animi-tempore-nemo-sunt-aliquam-labore-aut-eaque-assumenda-est-eaque-nulla-corporis-hic-accusantium-tenetur-quidem', 'Et ea blanditiis omnis tempora et. Earum veritatis quam doloribus velit voluptatibus libero. Nihil fuga dolorum perferendis quam ipsam et.', 'Odit sint minus nihil est ipsa. Voluptas dignissimos perferendis voluptatum facere. Id veritatis ad ut nobis dicta. Esse facilis nulla et.', 1, 'Drywall Installer', 'USJ 4', 'Selangor', 'contract', 19, 'BSC/Masters Degree', 3, '8271', 1, '2021-10-29', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(23, '30', '25', 'Et quia unde reiciendis deserunt. Omnis ab consequuntur debitis. Aut sint molestiae molestias architecto hic.', 'et-quia-unde-reiciendis-deserunt-omnis-ab-consequuntur-debitis-aut-sint-molestiae-molestias-architecto-hic', 'Enim atque at veritatis et quidem vitae voluptates. Vel dolorem nemo voluptas aut aut enim. Voluptatibus facere fuga beatae iure eos. Deleniti eum quasi earum a provident et.', 'Cum culpa iste veritatis at aut. Odio dolorum esse et velit voluptas. Et neque eos ducimus quae ea sed.', 2, 'Director Of Talent Acquisition', 'PJU60', 'Selangor', 'contract', 19, 'BSC/Masters Degree', 10, '5274', 1, '2021-09-02', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(24, '4', '23', 'Aut beatae quis impedit voluptatem quae commodi quia. Ullam aut dolorem et earum. Quis molestiae quo qui iste delectus qui.', 'aut-beatae-quis-impedit-voluptatem-quae-commodi-quia-ullam-aut-dolorem-et-earum-quis-molestiae-quo-qui-iste-delectus-qui', 'Ab assumenda et perspiciatis sed reprehenderit. Omnis nisi et architecto aut qui animi. Ut velit voluptatem quidem nobis vel iure et ipsum.', 'Eveniet quibusdam sapiente quaerat iste consequatur harum. Omnis non voluptatum odio cumque placeat nisi. Et ea excepturi similique eius rerum dolor eveniet. Et nisi eligendi inventore.', 5, 'Account Manager', 'SS42K', 'Kuala Lumpur', 'fulltime', 20, 'BSC/Masters Degree', 6, '5637', 0, '2022-01-12', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(25, '8', '13', 'Sunt sunt non laudantium aut ipsa non id. Aut dolor reprehenderit quis sit a repellat voluptatem. Placeat doloremque magnam est.', 'sunt-sunt-non-laudantium-aut-ipsa-non-id-aut-dolor-reprehenderit-quis-sit-a-repellat-voluptatem-placeat-doloremque-magnam-est', 'Officia neque autem officiis repellendus architecto soluta. Ad maxime consequatur et labore. Ut ut ut quas. Eveniet id repellat sapiente qui omnis expedita qui molestiae. Ad eum aperiam et similique magnam est nemo id. Rerum earum ut enim mollitia. Odit u', 'Maxime aut est sequi qui repudiandae. Et error officiis rerum ea. Minus et sint eius nihil sequi incidunt repellendus. Et odit nesciunt magnam veritatis deleniti libero.', 5, 'Computer Programmer', 'Medan Harmoni', 'Kuala Lumpur', 'partime', 10, 'BSC/Masters Degree', 3, '10208', 1, '2021-10-23', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(28, '22', '25', 'Analysing Software Developer', 'est-totam-sint-cupiditate-doloremque-architecto-quam-eos-perspiciatis-sed-quia-voluptas-sint-blanditiis-veritatis-sit-ratione-necessitatibus-vel-rerum-animi-perspiciatis-autem', 'Iusto molestiae omnis nulla velit iusto. Similique laborum odit expedita quia. Natus id omnis dolorum nulla nisi enim omnis.', 'Qui impedit recusandae similique et. Sapiente inventore sint voluptatibus accusamus. Beatae nemo nostrum excepturi fugit inventore alias. Aliquam adipisci quidem totam voluptas ullam asperiores.', 3, 'Software Analyst', 'Bandar Bendahara', 'Labuan', 'internship', 4, 'BSC/Masters Degree', 10, '12970', 1, '2021-12-10', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(29, '23', '14', 'Et voluptatum et qui nemo voluptates. Esse quia nemo voluptatem aspernatur architecto officiis quidem est. Non et ratione fugit vitae ratione porro.', 'et-voluptatum-et-qui-nemo-voluptates-esse-quia-nemo-voluptatem-aspernatur-architecto-officiis-quidem-est-non-et-ratione-fugit-vitae-ratione-porro', 'Modi omnis suscipit quo aut alias omnis sapiente. Quia omnis eligendi quis eos repellendus incidunt iste qui. Similique ut illum accusantium asperiores accusantium et. Qui culpa pariatur cum et est sed. Quae nihil architecto in amet assumenda delectus. Su', 'Qui esse molestiae a incidunt placeat et vel. Ipsum et adipisci magni velit error enim. Ducimus sunt fuga corrupti cumque.', 4, 'Professional Photographer', 'PJS22G', 'Putrajaya', 'fulltime', 17, 'BSC/Masters Degree', 1, '3260', 1, '2021-09-29', '2021-08-02 23:12:17', '2021-08-02 23:12:17'),
(34, '31', '31', 'Full stack web developer', 'Full-stack-web-developer', '<p><i>responsive design practices, delivered cleanly and consistently across a wide variety of platforms, browsers and devices&nbsp;</i></p>', 'Deliver modern, testable and maintainable code', 3, 'Software Developer or Front-End Developer', 'Aeon Mall, Nilai', 'kuala_lumpur', 'internship', 7, 'BSC/Master', 3, '3000-7000', 1, '2021-12-31', '2021-08-03 00:15:01', '2021-09-12 02:59:32'),
(35, '31', '31', 'Lead Full Stack Web Developer (.JS)', 'lead-full-stack-web-developer-js', 'Front-end Development\r\nBackend API Handling\r\nManaging of AWS Server\r\nManage Project in an effective and efficient way\r\nBuild high quality reusable code and libraries and user facing component library & features\r\nOptimize applications for maximum speed and', 'Ensure the technical feasibility of UI/UX designs', 3, 'Developer', 'Petaling Jaya', 'Kuala Lumpur', 'parttime', 2, 'Any, but minimum diploma', 1, '5500', 1, '2021-12-30', '2021-08-03 04:33:06', '2021-08-03 04:33:06'),
(36, '32', '32', 'Food Dispatcher', 'food-dispatcher', 'Deliver food within the city', 'Ensure you are as fast as possible and be safe', 12, 'Dispatcher', 'Piling Tamah', 'Putrajaya', 'fulltime', 1, 'Any', 1, '2000', 1, '2021-12-29', '2021-08-03 04:37:41', '2021-08-03 04:37:41'),
(37, '33', '33', 'Assistant Mobile App Developer', 'assistant-mobile-app-developer', 'Candidate must possess at least Bachelor\'s Degree/Post Graduate Diploma/Professional Degree in Computer Science/Information Technology or equivalent.\r\nAt least 2 Year(s) of working experience in the related field is required for this position.\r\nRequired S', 'To maintain and fine tuning the existing App.\r\nTo test existing App and suggest improvement for the App.\r\nTroubleshoot and debug to optimize performance\r\nOptimize the functions of the existing App.', 3, 'App Developer', '124 belimo street, kajan', 'Selangor', 'contract', 4, 'Bsc Computer Science', 2, '4500', 1, '2021-12-01', '2021-08-03 05:03:30', '2021-09-09 09:29:10'),
(38, '34', '34', 'Account Executive/Junior Executive', 'account-executivejunior-executive', 'Candidate must possess at least Diploma/Advanced/Higher/Graduate Diploma, Bachelor\'s Degree/Post Graduate Diploma/Professional Degree in accounting\r\nTo handle full set of accounting, ensure timely and accurate preparation of financial report and other rel', 'Required Skill(s): SQL Accounting Software', 1, 'Accountant', 'Tamah Bandar', 'Malacca', 'remote', 6, 'Bsc Accounting at minimum', 3, '3500', 1, '2021-12-30', '2021-08-03 05:07:34', '2021-09-09 09:34:42');

-- --------------------------------------------------------

--
-- Table structure for table `job_interview`
--

CREATE TABLE `job_interview` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `meeting_id` bigint(20) NOT NULL,
  `join_meeting_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meeting_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scheduled_time` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_user`
--

CREATE TABLE `job_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_user`
--

INSERT INTO `job_user` (`id`, `job_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(6, 35, 35, 3, '2021-08-16 19:12:05', '2021-08-16 19:12:05'),
(8, 35, 38, 3, '2021-09-02 02:07:57', '2021-09-02 02:07:57');

-- --------------------------------------------------------

--
-- Table structure for table `job_user_action`
--

CREATE TABLE `job_user_action` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_user_action`
--

INSERT INTO `job_user_action` (`id`, `job_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 34, 35, '2021-09-02 02:07:00', '2021-09-02 02:07:00'),
(2, 35, 38, '2021-09-02 02:07:53', '2021-09-02 02:07:53'),
(3, 34, 37, '2021-09-02 02:08:22', '2021-09-02 02:08:22'),
(4, 35, 37, '2021-09-02 05:41:17', '2021-09-02 05:41:17'),
(5, 36, 35, '2021-09-07 13:11:55', '2021-09-07 13:11:55'),
(6, 37, 35, '2021-09-07 13:15:10', '2021-09-07 13:15:10'),
(7, 35, 35, '2021-09-07 13:35:07', '2021-09-07 13:35:07'),
(8, 38, 35, '2021-09-07 15:14:49', '2021-09-07 15:14:49'),
(9, 38, 37, '2021-09-07 17:14:36', '2021-09-07 17:14:36'),
(10, 36, 38, '2021-09-07 17:38:07', '2021-09-07 17:38:07'),
(11, 37, 37, '2021-09-08 05:09:57', '2021-09-08 05:09:57'),
(12, 29, 35, '2021-09-10 07:49:03', '2021-09-10 07:49:03'),
(13, 22, 35, '2021-09-10 07:50:54', '2021-09-10 07:50:54'),
(14, 3, 35, '2021-09-11 15:10:10', '2021-09-11 15:10:10'),
(15, 4, 35, '2021-09-11 15:11:33', '2021-09-11 15:11:33'),
(16, 2, 35, '2021-09-11 15:11:40', '2021-09-11 15:11:40'),
(17, 10, 35, '2021-09-11 15:11:47', '2021-09-11 15:11:47'),
(18, 17, 35, '2021-09-11 15:12:12', '2021-09-11 15:12:12'),
(19, 12, 35, '2021-09-11 15:12:19', '2021-09-11 15:12:19'),
(20, 21, 35, '2021-09-12 01:31:57', '2021-09-12 01:31:57');

-- --------------------------------------------------------

--
-- Table structure for table `job_user_interraction`
--

CREATE TABLE `job_user_interraction` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `eventType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_user_interraction`
--

INSERT INTO `job_user_interraction` (`id`, `job_id`, `user_id`, `eventType`, `job_title`, `created_at`, `updated_at`) VALUES
(1, 34, 35, 'VIEW', 'Full stack web developer', '2021-09-02 02:07:00', '2021-09-02 02:07:00'),
(2, 34, 35, 'APPLIED', 'Full stack web developer', '2021-09-02 02:07:05', '2021-09-02 02:07:05'),
(3, 35, 38, 'VIEW', 'Lead Full Stack Web Developer (.JS)', '2021-09-02 02:07:53', '2021-09-02 02:07:53'),
(4, 35, 38, 'APPLIED', 'Lead Full Stack Web Developer (.JS)', '2021-09-02 02:07:57', '2021-09-02 02:07:57'),
(5, 34, 37, 'VIEW', 'Full stack web developer', '2021-09-02 02:08:22', '2021-09-02 02:08:22'),
(6, 34, 37, 'APPLIED', 'Full stack web developer', '2021-09-02 02:08:25', '2021-09-02 02:08:25'),
(7, 35, 37, 'VIEW', 'Lead Full Stack Web Developer (.JS)', '2021-09-02 05:41:17', '2021-09-02 05:41:17'),
(8, 35, 37, 'APPLIED', 'Lead Full Stack Web Developer (.JS)', '2021-09-02 05:41:21', '2021-09-02 05:41:21'),
(9, 36, 35, 'VIEW', 'Food Dispatcher', '2021-09-07 13:11:55', '2021-09-07 13:11:55'),
(10, 36, 35, 'FAVOURITED', 'Food Dispatcher', '2021-09-07 13:12:02', '2021-09-07 13:12:02'),
(11, 37, 35, 'VIEW', 'Assistant Mobile App Developer', '2021-09-07 13:15:10', '2021-09-07 13:15:10'),
(12, 37, 35, 'FAVOURITED', 'Assistant Mobile App Developer', '2021-09-07 13:15:13', '2021-09-07 13:15:13'),
(13, 35, 35, 'VIEW', 'Lead Full Stack Web Developer (.JS)', '2021-09-07 13:35:07', '2021-09-07 13:35:07'),
(14, 34, 35, 'FAVOURITED', 'Full stack web developer', '2021-09-07 13:35:21', '2021-09-07 13:35:21'),
(15, 38, 35, 'VIEW', 'Account Executive/Junior Executive', '2021-09-07 15:14:49', '2021-09-07 15:14:49'),
(16, 38, 35, 'APPLIED', 'Account Executive/Junior Executive', '2021-09-07 15:14:53', '2021-09-07 15:14:53'),
(17, 38, 37, 'VIEW', 'Account Executive/Junior Executive', '2021-09-07 17:14:36', '2021-09-07 17:14:36'),
(18, 36, 38, 'VIEW', 'Food Dispatcher', '2021-09-07 17:38:07', '2021-09-07 17:38:07'),
(19, 37, 37, 'VIEW', 'Assistant Mobile App Developer', '2021-09-08 05:09:57', '2021-09-08 05:09:57'),
(20, 29, 35, 'VIEW', 'Et voluptatum et qui nemo voluptates. Esse quia nemo voluptatem aspernatur architecto officiis quidem est. Non et ratione fugit vitae ratione porro.', '2021-09-10 07:49:03', '2021-09-10 07:49:03'),
(21, 22, 35, 'VIEW', 'Mollitia accusantium id nisi illum culpa animi tempore. Nemo sunt aliquam labore aut eaque. Assumenda est eaque nulla corporis hic accusantium tenetur quidem.', '2021-09-10 07:50:54', '2021-09-10 07:50:54'),
(22, 3, 35, 'VIEW', 'bank manager', '2021-09-11 15:10:10', '2021-09-11 15:10:10'),
(23, 4, 35, 'VIEW', 'manager', '2021-09-11 15:11:33', '2021-09-11 15:11:33'),
(24, 2, 35, 'VIEW', 'Laudantium neque iure odit a natus et. Rem unde autem ratione ea aut perspiciatis. Suscipit aut corrupti voluptas non hic eveniet. Sunt suscipit eveniet omnis ut accusamus est tempora sed.', '2021-09-11 15:11:40', '2021-09-11 15:11:40'),
(25, 10, 35, 'VIEW', 'Qui vel explicabo corrupti ab corrupti sunt nobis. Expedita sit autem voluptatem eveniet quisquam. Laboriosam omnis eum omnis expedita.', '2021-09-11 15:11:48', '2021-09-11 15:11:48'),
(26, 17, 35, 'VIEW', 'Aspernatur iure eum veniam temporibus et sint. Et iure aliquid ea doloremque dolor eum. Officia autem et voluptatem consequatur a quo ut. Quas quia temporibus atque magnam unde.', '2021-09-11 15:12:12', '2021-09-11 15:12:12'),
(27, 12, 35, 'VIEW', 'Fuga magnam autem eos ut quia et provident sequi. Quo error et est ea et quo distinctio. Tempore ratione et est cupiditate maxime quia consequatur.', '2021-09-11 15:12:19', '2021-09-11 15:12:19'),
(28, 21, 35, 'VIEW', 'Incidunt voluptas vel possimus suscipit. Impedit nemo sint tempore fugiat deleniti deserunt. Sed quibusdam eius facilis alias labore est.', '2021-09-12 01:31:57', '2021-09-12 01:31:57'),
(29, 21, 35, 'FAVOURITED', 'Incidunt voluptas vel possimus suscipit. Impedit nemo sint tempore fugiat deleniti deserunt. Sed quibusdam eius facilis alias labore est.', '2021-09-12 02:03:06', '2021-09-12 02:03:06');

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
(4, '2021_07_27_045833_create_profiles_table', 1),
(5, '2021_07_27_050141_create_companies_table', 1),
(6, '2021_07_27_050316_create_categories_table', 1),
(7, '2021_07_27_050453_create_jobs_table', 1),
(8, '2021_07_27_054638_create_job_user_table', 1),
(9, '2021_07_27_054830_create_favourites_table', 1),
(10, '2021_07_27_063146_create_company_user_action_table', 1),
(11, '2021_08_15_034729_create_roles_table', 1),
(12, '2021_08_15_035120_create_role_user_table', 1),
(13, '2021_08_15_104452_create_posts_table', 1),
(14, '2021_08_26_040557_create_testimonials_table', 1),
(15, '2021_08_26_042946_create_job_user_interraction_table', 1),
(16, '2021_08_26_044020_create_job_user_action_table', 1),
(17, '2021_08_26_115726_add_fb_id_column_in_users_table', 1),
(18, '2021_08_26_153324_add_google_id_column_in_users_table', 1),
(19, '2021_08_27_025033_create_newsletter_table', 1),
(20, '2021_08_28_123104_create_ratings_table', 1),
(21, '2021_09_03_062331_create_job_interview_table', 2),
(22, '2021_09_03_132334_create_job_interview_table', 3),
(23, '2021_09_04_053236_create_job_interview_table', 4),
(24, '2021_09_08_210016_create_reported_jobs_table', 5),
(25, '2021_09_09_205307_create_queue_table', 6),
(26, '2021_09_10_043413_add_soft_deletes_column_in_users_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `created_at`, `updated_at`) VALUES
(29, 'tony@gmail.com', '2021-09-15 01:59:31', '2021-09-15 01:59:31'),
(30, 'kanayo@gmail.com', '2021-09-15 06:25:17', '2021-09-15 06:25:17'),
(31, 'bbless@gmail.com', '2021-09-15 16:03:00', '2021-09-15 16:03:00'),
(32, 'scavania@gmail.com', '2021-09-15 16:09:01', '2021-09-15 16:09:01'),
(33, 'john@gmail.com', '2021-09-15 04:12:44', '2021-09-15 04:12:44'),
(34, 'toy@gmail.com', '2021-09-15 04:13:13', '2021-09-15 04:13:13');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('djohnson@yahoo.com', '$2y$10$o/MoAgoqF4DhoiVhmKeNneljgxHUD67Xjdc/W91E5xJG5AiptWZ7W', '2021-09-09 15:27:21');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `content`, `image`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'This is a job title12', 'this-is-a-job-title', '<p>Hello World is the content12</p>', 'uploads/blog/x4d5joMHrD99j8pjRnwHI4rSFuVoKTzcgZCvwK97.jpg', 1, NULL, '2021-08-15 03:27:20', '2021-09-08 18:34:32'),
(2, 'Developer blog', 'developer-blog', '<p>This page shares my best articles to read on topics like health, happiness, creativity, productivity and more. The central question that drives my work is, “How can we live better?” To answer that question, I like to write about science-based ways to s', 'uploads/blog/c0ZpFlLJAbxIp77Ymvn4cAfNkmmpY1tpzmYsrdxI.png', 1, NULL, '2021-08-15 03:33:40', '2021-09-09 20:17:02'),
(3, 'Hello Blog', 'hello-blog', '<p>Holla</p>', 'uploads/blog/Ohq7lx7WXP90cjDjWnphG99FfzfR8hfTcBpoF38p.png', 1, NULL, '2021-08-15 05:34:31', '2021-08-16 07:32:59'),
(4, 'Lead Full Stack Web Developer Blog', 'lead-full-stack-web-developer-blog', '<p>Hello</p>', 'uploads/blog/ACPQexJINoePxxeAv1yGUbZnONPdWcoUWiee7P0f.png', 1, '2021-09-10 03:58:47', '2021-08-16 07:51:18', '2021-09-10 03:58:47'),
(6, 'This is a job title yes', 'this-is-a-job-title-yes', '<p>Hello my people</p>', 'uploads/blog/EXFluygNGGLefOr4YbjNi6Rad6n5hInjTYzMcwIn.png', 1, '2021-09-10 03:58:54', '2021-09-10 02:50:26', '2021-09-10 03:58:54'),
(9, 'Recent Jobs', 'table-blog', '<p>IT jobs are over the place but prepare yourself.</p>', 'uploads/blog/GB62JAKMBPEyrNUpfkiQVlilumXWPRXHJPv6rS91.jpg', 1, NULL, '2021-09-10 03:39:59', '2021-09-10 04:00:56'),
(10, 'This is new blog', 'this-is-new-blog', '<p>About IT</p>', 'uploads/blog/oBUWwpqKaZx1DS0FXVU6uBft7ZtmIoqZsNy30qcH.jpg', 1, NULL, '2021-09-10 04:14:12', '2021-09-10 04:14:12');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_letter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resume` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `address`, `phone_number`, `gender`, `dob`, `experience`, `bio`, `cover_letter`, `resume`, `avatar`, `created_at`, `updated_at`) VALUES
(1, '35', 'Aeon Mall, Nilai', '132344244454224', 'female', '1990-08-10', '5years working experience', 'tsfghsvkbfshujbfksnfstsfghsvkbfshujbfksnfstsfghsvkbfshujbfksnfstsfghsvknjbfksnfstsfghsvbfshujbfksnfstsfghsvkbfshujbfksnfstsfghsvkbfshujbfksnfs', 'public/files/B2UY5fjia3zK48gjhxNaY1wPudpypW9AZTeYMNYM.docx', 'public/files/Qgt1ThHCMz722WFdq0KzFvVrvQ4Rs8LBVUBl3I6o.pdf', '1629170192.png', '2021-08-03 17:08:03', '2021-09-07 13:04:45'),
(2, '37', '124 belimo street, kajan', '12223222222', 'male', '', '124 belimo street, kajan124 belimo street, kajan124 belimo street, kajan', '124 belimo street, kajan124 belimo street, kajan124 belimo street, kajan124 belimo street, kajan124 belimo street, kajan', '', '', '', '2021-09-02 01:23:20', '2021-09-07 13:07:30'),
(3, '38', '124 belimo street, kajan', '0122345367', 'male', '', 'dechjvchjcevcjhejdechjvchjcevcjhejdechjvchjcevcjhejdechjvchjcevcjhej', 'dechjvchjcevcjhejdechjvchjcevcjhejdechjvchjcevcjhejdechjvchjcevcjhejdechjvchjcevcjhej', '', '', '', '2021-09-02 01:45:55', '2021-09-07 13:09:05'),
(4, '28', 'Aeon Mall, Nilai', '12223222222', 'male', '', 'hcvdhjdbdjhdbddbdhhdbbdbdjsbsbssssss', 'hcvdhjdbdjhdbddbdhhdbbdbdjsbsbsssssshcvdhjdbdjhdbddbdhhdbbdbdjsbsbssssss', '', '', '', NULL, '2021-09-09 21:07:41');

-- --------------------------------------------------------

--
-- Table structure for table `queue`
--

CREATE TABLE `queue` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `company_id`, `user_id`, `rating`, `created_at`, `updated_at`) VALUES
(1, 31, 35, 4.5, '2021-09-01 23:59:13', '2021-09-01 23:59:13'),
(2, 1, 35, 2.5, '2021-09-02 00:04:16', '2021-09-02 00:04:16'),
(12, 3, 35, 4, '2021-09-02 01:21:53', '2021-09-02 01:21:53'),
(13, 2, 35, 5, '2021-09-02 01:22:06', '2021-09-02 01:22:06'),
(14, 7, 35, 3.5, '2021-09-02 01:23:04', '2021-09-02 01:23:04'),
(15, 3, 37, 1.5, '2021-09-02 01:23:55', '2021-09-02 01:23:55'),
(16, 2, 37, 3.5, '2021-09-02 01:39:45', '2021-09-02 01:39:45'),
(17, 31, 37, 3.5, '2021-09-02 01:45:39', '2021-09-02 01:45:39'),
(18, 31, 38, 5, '2021-09-02 01:46:44', '2021-09-02 01:46:44'),
(19, 4, 35, 3, '2021-09-10 11:10:06', '2021-09-10 11:10:06');

-- --------------------------------------------------------

--
-- Table structure for table `reported_jobs`
--

CREATE TABLE `reported_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `issue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reported_jobs`
--

INSERT INTO `reported_jobs` (`id`, `job_id`, `company_id`, `issue`, `created_at`, `updated_at`) VALUES
(6, 38, 34, 'fake', '2021-09-09 09:09:20', '2021-09-09 09:09:20'),
(7, 38, 34, 'Requesting money', '2021-09-09 09:45:11', '2021-09-09 09:45:11'),
(8, 38, 34, 'Error Posting', '2021-09-12 03:19:31', '2021-09-12 03:19:31'),
(9, 38, 34, 'Fake Job', '2021-09-12 03:19:51', '2021-09-12 03:19:51'),
(10, 38, 34, 'Fake Posting', '2021-09-12 03:20:04', '2021-09-12 03:20:04'),
(11, 37, 33, 'Not clear', '2021-09-12 03:20:53', '2021-09-12 03:20:53'),
(12, 38, 34, 'Not valid', '2021-09-12 04:02:40', '2021-09-12 04:02:40');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2021-08-15 04:35:50', '2021-08-15 04:35:50');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 36, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `profession`, `content`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Brian', 'Software Eng', '<p>Many thanks to Jobsvizor</p>', 'uploads/testimonial/ZfJCJeHJJSdPVPIaWt1f0Zl0qfnR6oHkTPofgYkn.png', '2021-08-25 12:09:14', '2021-08-25 12:09:14'),
(2, 'Jonah', 'Manager', '<p>I\'m happy to use this platform</p>', 'uploads/testimonial/xJLaMWFGm85AizxwDidYsjnX2L6MUUnM1IMwJzCL.png', '2021-08-25 12:09:47', '2021-08-25 12:09:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fb_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_type`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `fb_id`, `google_id`, `deleted_at`) VALUES
(1, 'Zakary Harvey', 'seeker', 'ashtyn.mayert@yahoo.com', '2021-08-02 15:12:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'QOrZ8gf9Mr44EDLYDjxLHNm6wqYxTCo07I4XzthCah56QOS3o0j4GmiBF5Bk', '2021-08-02 15:12:17', '2021-08-02 15:12:17', '', '', NULL),
(2, 'Ellie Stokes', 'seeker', 'rjerde@hotmail.com', '2021-08-02 15:12:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'EaTecayaTe', '2021-08-02 15:12:17', '2021-09-10 06:09:27', '', '', NULL),
(3, 'Corbin Kunde', 'seeker', 'greenfelder.katelin@gmail.com', '2021-08-02 15:12:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ZrBuQsqVJV', '2021-08-02 15:12:17', '2021-09-11 14:22:29', '', '', NULL),
(4, 'Jonathan Reynolds', 'seeker', 'zankunding@hotmail.com', '2021-08-02 15:12:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ull6dS6OH9', '2021-08-02 15:12:17', '2021-08-02 15:12:17', '', '', NULL),
(5, 'Ulices Gislason', 'seeker', 'reyna80@hotmail.com', '2021-08-02 15:12:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'f23wbSZCyg', '2021-08-02 15:12:17', '2021-08-02 15:12:17', '', '', NULL),
(6, 'Madonna Wisozk IV', 'seeker', 'lelia.graham@yahoo.com', '2021-08-02 15:12:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Ot1ucf4Q8N', '2021-08-02 15:12:17', '2021-08-02 15:12:17', '', '', NULL),
(7, 'Jennie Feil', 'seeker', 'jemard@hotmail.com', '2021-08-02 15:12:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'C32zr43WAC', '2021-08-02 15:12:17', '2021-08-02 15:12:17', '', '', NULL),
(8, 'Alicia Zemlak', 'seeker', 'lemke.karlie@yahoo.com', '2021-08-02 15:12:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'YiOKmjqvcP', '2021-08-02 15:12:17', '2021-08-02 15:12:17', '', '', NULL),
(9, 'Meda Boyer', 'seeker', 'harris.shania@hotmail.com', '2021-08-02 15:12:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'on9xTKH36l', '2021-08-02 15:12:17', '2021-08-02 15:12:17', '', '', NULL),
(10, 'Mr. Amir Dooley MD', 'seeker', 'bauch.dereck@hotmail.com', '2021-08-02 15:12:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'fUuiDQ3GDr', '2021-08-02 15:12:17', '2021-08-02 15:12:17', '', '', NULL),
(11, 'Mr. Blaise Blick DVM', 'seeker', 'ddurgan@gmail.com', '2021-08-02 15:12:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'OFh6rnQOFv', '2021-08-02 15:12:17', '2021-08-02 15:12:17', '', '', NULL),
(12, 'Ollie Greenfelder', 'seeker', 'brandyn.ernser@yahoo.com', '2021-08-02 15:12:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'RLChYprbKw', '2021-08-02 15:12:17', '2021-08-02 15:12:17', '', '', NULL),
(13, 'Dr. Nona Hessel III', 'seeker', 'vonrueden.antwan@yahoo.com', '2021-08-02 15:12:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'jU1SSOdhNy', '2021-08-02 15:12:17', '2021-08-02 15:12:17', '', '', NULL),
(14, 'Prof. Antonette DuBuque', 'seeker', 'stehr.madyson@yahoo.com', '2021-08-02 15:12:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'nMGcUTrnbY', '2021-08-02 15:12:17', '2021-08-02 15:12:17', '', '', NULL),
(15, 'Miss Angie Mosciski', 'seeker', 'zbeer@hotmail.com', '2021-08-02 15:12:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ZATurLMClw', '2021-08-02 15:12:17', '2021-08-02 15:12:17', '', '', NULL),
(16, 'Dr. Jaunita Walter', 'seeker', 'spinka.gay@hotmail.com', '2021-08-02 15:12:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pQaCRd8iaY', '2021-08-02 15:12:17', '2021-08-02 15:12:17', '', '', NULL),
(17, 'Meagan Tromp', 'seeker', 'kavon.tremblay@hotmail.com', '2021-08-02 15:12:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'yrqJr8QbzP', '2021-08-02 15:12:17', '2021-08-02 15:12:17', '', '', NULL),
(18, 'Micah West', 'seeker', 'xarmstrong@yahoo.com', '2021-08-02 15:12:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'jvZ09JNcMN', '2021-08-02 15:12:17', '2021-08-02 15:12:17', '', '', NULL),
(19, 'Tatum Little', 'seeker', 'lydia.klocko@yahoo.com', '2021-08-02 15:12:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'sx3J4jbu8R', '2021-08-02 15:12:17', '2021-08-02 15:12:17', '', '', NULL),
(20, 'Jimmie Roberts', 'seeker', 'rrath@gmail.com', '2021-08-02 15:12:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'LmRHm3mmW6', '2021-08-02 15:12:17', '2021-08-02 15:12:17', '', '', NULL),
(21, 'Aidan Spinka', 'seeker', 'krystina.mills@gmail.com', '2021-08-02 15:12:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Ldo7kNO5ka', '2021-08-02 15:12:17', '2021-08-02 15:12:17', '', '', NULL),
(22, 'Madeline Heller', 'seeker', 'vivian.eichmann@hotmail.com', '2021-08-02 15:12:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1wm0HVBtFy', '2021-08-02 15:12:17', '2021-08-02 15:12:17', '', '', NULL),
(23, 'Ole Shields', 'seeker', 'antonio59@yahoo.com', '2021-08-02 15:12:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'EnQ21nzgHs', '2021-08-02 15:12:17', '2021-08-02 15:12:17', '', '', NULL),
(24, 'Simeon Pollich', 'seeker', 'kling.myriam@gmail.com', '2021-08-02 15:12:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'h92nAaKtbq', '2021-08-02 15:12:17', '2021-08-02 15:12:17', '', '', NULL),
(25, 'Ellsworth Klocko', 'seeker', 'ctremblay@yahoo.com', '2021-08-02 15:12:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'VXWQwPuDnj', '2021-08-02 15:12:17', '2021-08-02 15:12:17', '', '', NULL),
(26, 'Cielo Bauch IV', 'seeker', 'shanahan.marina@hotmail.com', '2021-08-02 15:12:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'lx3Fh64OhS', '2021-08-02 15:12:17', '2021-08-02 15:12:17', '', '', NULL),
(27, 'Hettie Schaefer', 'seeker', 'holden.kemmer@yahoo.com', '2021-08-02 15:12:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pKSh8hvaLj', '2021-08-02 15:12:17', '2021-08-02 15:12:17', '', '', NULL),
(28, 'Otho Moen', 'seeker', 'collins.talon@yahoo.com', '2021-08-02 15:12:17', '$2y$10$uAByCyg/2GgPu0Wu.DSVk.bT7j6yJ58sG/hiZD/pMvIKkoN.ibMIa', 'vVSzKAkTp1X1Ev75O2mIyevIjE6FkVmjxcI6GCEvNe9pUMJjhCBKk3N5jB6q', '2021-08-02 15:12:17', '2021-09-09 21:39:10', '', '', NULL),
(29, 'Prof. Rogers Mayert', 'seeker', 'pfannerstill.micheal@yahoo.com', '2021-08-02 15:12:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'SzAcZSEeem', '2021-08-02 15:12:17', '2021-09-09 21:39:06', '', '', NULL),
(30, 'Prof. Talia Gerlach', 'seeker', 'djohnson@yahoo.com', '2021-08-02 15:12:17', '$2y$10$uAByCyg/2GgPu0Wu.DSVk.bT7j6yJ58sG/hiZD/pMvIKkoN.ibMIa', 'muHM8xnLeIG24qRJoAoK74MhwI4uJgBk9Y5eJk0Kmxo5NHsYJAV7HcbTBPDO', '2021-08-02 15:12:17', '2021-09-10 04:11:50', '', '', NULL),
(31, '', 'employer', 'employer@gmail.com', '2021-08-02 15:28:38', '$2y$10$W9WVLrfeV9n1N0dDQERMMuST49aBfi6LvYudv35FbshwZKhOoXCem', NULL, '2021-08-02 15:28:01', '2021-08-02 15:28:38', '', '', NULL),
(32, '', 'employer', 'grabyo@gmail.com', '2021-08-02 20:35:54', '$2y$10$sxgIHrazCrkAU1g.KuVrs.ElfSAAPcv39LGcJmWNtX12/hKXrrl96', NULL, '2021-08-02 20:35:22', '2021-08-02 20:35:54', '', '', NULL),
(33, '', 'employer', 'belimo@gmail.com', '2021-08-02 21:00:52', '$2y$10$RtZHAy/65b1ge/A4Ohj2muoTkUAnCpLxd1yfs./uyFlNIfQhmrU0i', NULL, '2021-08-02 21:00:12', '2021-08-02 21:00:52', '', '', NULL),
(34, '', 'employer', 'myob@gmail.com', '2021-08-02 21:04:55', '$2y$10$do//ntZDN1tZD6DvxYM25OIA1BUfJeBtkUM04lEzYBIt1QASQtsfi', NULL, '2021-08-02 21:04:30', '2021-08-02 21:04:55', '', '', NULL),
(35, 'kate', 'seeker', 'kate@gmail.com', '2021-08-03 09:08:18', '$2y$10$v8qxlOEJYope.C1vrJQcFeIR3ephoqXoD7lUI7LVD4./7HNEAg1Ze', NULL, '2021-08-03 09:08:03', '2021-08-03 09:08:18', '', '', NULL),
(36, 'Admin', 'siteadmin', 'admin@gmail.com', '2021-08-14 20:34:41', '$2y$10$do//ntZDN1tZD6DvxYM25OIA1BUfJeBtkUM04lEzYBIt1QASQtsfi', NULL, '2021-08-14 20:32:56', '2021-08-14 20:32:56', '', '', NULL),
(37, 'Jackson Algbagacfidgi Alisonescu', 'seeker', 'ntappugkjb_1629983307@tfbnw.net', '2021-09-02 13:39:31', '', NULL, '2021-09-02 01:23:20', '2021-09-02 01:23:20', '103115832104129', NULL, NULL),
(38, 'laravelapp testing', 'seeker', 'testinglaravel021@gmail.com', '2021-09-02 09:46:10', '', NULL, '2021-09-02 01:45:55', '2021-09-02 01:45:55', NULL, '103495962612802809139', NULL),
(39, '', 'employer', 'jowi@gmail.com', '2021-09-05 04:01:31', '$2y$10$nVJlXATCWdMiQZJm6/SzhOeDG0gaiQNcim0IgxkD/Q753IvQEWL0i', NULL, '2021-09-05 04:00:34', '2021-09-10 06:09:30', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_interview`
--
ALTER TABLE `job_interview`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_user`
--
ALTER TABLE `job_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_user_action`
--
ALTER TABLE `job_user_action`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_user_interraction`
--
ALTER TABLE `job_user_interraction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queue`
--
ALTER TABLE `queue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `queue_queue_index` (`queue`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reported_jobs`
--
ALTER TABLE `reported_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `job_interview`
--
ALTER TABLE `job_interview`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `job_user`
--
ALTER TABLE `job_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `job_user_action`
--
ALTER TABLE `job_user_action`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `job_user_interraction`
--
ALTER TABLE `job_user_interraction`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `queue`
--
ALTER TABLE `queue`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `reported_jobs`
--
ALTER TABLE `reported_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
