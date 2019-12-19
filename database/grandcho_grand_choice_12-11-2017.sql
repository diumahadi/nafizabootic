-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 13, 2017 at 12:17 AM
-- Server version: 5.6.26-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grandcho_grand_choice`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch_manager`
--

CREATE TABLE `branch_manager` (
  `id` int(11) NOT NULL,
  `manager_name` varchar(150) NOT NULL,
  `image_url` longtext NOT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `display` varchar(1) NOT NULL DEFAULT 'S',
  `created_by` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch_manager`
--

INSERT INTO `branch_manager` (`id`, `manager_name`, `image_url`, `mobile`, `email`, `address`, `display`, `created_by`, `created_at`) VALUES
(8, 'Mahadi', 'b009.jpg', '01830889631', 'mahadi@yahoo.com', '', 'H', 'mukbul', '2017-08-14 10:29:42'),
(9, '	Minuara Begum', '135minuara.jpg', '01817603736', 'omarfaruk25@gmail.com', 'Durlovpur,Anandapur,Adarsha Sadar,Comilla', 'S', 'mukbul', '2017-08-14 10:29:27');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` tinyint(4) NOT NULL,
  `brand_name` varchar(50) NOT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `display` char(1) NOT NULL DEFAULT 'S' COMMENT 'S=Show,H=Hide',
  `created_by` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand_name`, `logo`, `display`, `created_by`, `created_at`) VALUES
(9, 'Nike', '1200px-Logo_NIKE.svg_.png', 'S', 'mahadi', '2017-05-28 07:00:50'),
(10, 'Adidas', 'Adidas_Logo.png', 'S', 'mahadi', '2017-05-28 06:58:03'),
(11, 'Bran', NULL, 'S', 'mahadi', '2017-05-28 07:22:36'),
(12, 'Grand choice', 'FireShot_Capture_3_-_Admin_Dashboard___GrandChoiceBD_-_http___ac.grandchoicebd_.com_user_login__.png', 'S', 'mukbul', '2017-06-12 08:30:35'),
(13, 'Nokia', NULL, 'S', 'mukbul', '2017-08-29 14:08:43');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) NOT NULL,
  `person_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `topic_tp` varchar(2) NOT NULL COMMENT 'GE=General,SE=Service,OR=Order',
  `message` varchar(500) NOT NULL,
  `read` char(1) NOT NULL DEFAULT 'U' COMMENT 'U=Unread,R=Read',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `person_name`, `email`, `topic_tp`, `message`, `read`, `created_at`) VALUES
(1, 'Mahadi', 'mahadi@gmail.com', 'GE', 'sfsfdsf', 'U', '2017-06-06 07:00:55'),
(2, 'Mahadi Hasan', 'mahadi.diu791@gmail.com', 'SE', 'You service is too much slow.', 'U', '2017-06-06 07:02:31'),
(3, 'sfsfsf', 'mahadi.diu791@gmail.com', 'SE', 'sfafa', 'U', '2017-06-06 07:02:45'),
(4, 'sfsfsf', 'mahadi@gmail.com', 'SE', 'asfaf', 'U', '2017-06-06 07:03:59'),
(5, 'Mahadi', 'mahadi@gmail.com', 'OR', 'sfsfsdf', 'U', '2017-06-07 07:09:10'),
(6, 'Mahadi Hasan', 'mahadi.diu791@gmail.com', 'SE', 'asdadwew', 'U', '2017-06-07 07:25:13'),
(8, '0', '0', '0', '0', 'U', '2017-06-23 14:24:14'),
(9, 'md:mayeenuddin', 'ibnsobahan@gmail.com', 'SE', 'wel come', 'U', '2017-07-24 19:19:27'),
(10, '0', '0', '0', '0', 'U', '2017-09-26 07:59:55'),
(11, 'Diana Williams', 'will.iamsd.diana@gmail.com', 'GE', 'What would a huge increase in relevant traffic mean for your business? If I could greatly increase the amount of customers who are interested in your products and services, wouldn\'t you be interested\n', 'U', '2017-10-17 12:10:44'),
(12, '0', '0', '0', '0', 'U', '2017-10-17 12:10:46');

-- --------------------------------------------------------

--
-- Table structure for table `developer_pm`
--

CREATE TABLE `developer_pm` (
  `id` int(11) NOT NULL,
  `pm_date` date NOT NULL,
  `amount` double NOT NULL,
  `notes` longtext NOT NULL,
  `enabled` char(1) NOT NULL DEFAULT 'A',
  `created_by` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='developer payments';

--
-- Dumping data for table `developer_pm`
--

INSERT INTO `developer_pm` (`id`, `pm_date`, `amount`, `notes`, `enabled`, `created_by`, `created_at`) VALUES
(1, '2017-05-24', 2000, 'Advance Payment ', 'A', 'mahadi', '2017-06-08 07:45:22'),
(2, '2017-05-25', 5000, '3000 for Domain & Hosting, 2000 payment', 'A', 'mahadi', '2017-06-08 07:45:36'),
(3, '2017-05-25', 5000, 'For Domain and Hosting purpose.', 'B', 'mahadi', '2017-05-24 07:46:59'),
(4, '2017-06-03', 5000, 'Schedule Payment', 'A', 'mahadi', '2017-06-08 07:46:00'),
(5, '2017-06-01', 2000, 'Eid-Bonus', 'A', 'mahadi', '2017-08-05 08:47:37'),
(6, '2017-08-08', 3000, 'bKash', 'A', 'mahadi', '2017-08-23 15:32:26'),
(7, '2017-11-06', 3000, 'Developer Payment', 'A', 'mahadi', '2017-11-06 05:58:05');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` bigint(20) NOT NULL,
  `event_name` varchar(250) NOT NULL,
  `profile_image` varchar(250) NOT NULL DEFAULT 'uu_up_upcoming.jpg',
  `organize_date` date NOT NULL,
  `description` longtext NOT NULL,
  `display` char(1) NOT NULL COMMENT 'S=Show,H=Hide',
  `created_by` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `event_name`, `profile_image`, `organize_date`, `description`, `display`, `created_by`, `created_at`) VALUES
(1, 'Test Event', 'grand_logo_1.png', '2017-06-16', 'This event is for test purpose.', 'H', 'mahadi', '2017-06-16 08:44:25'),
(2, 'Sonali Surjo', '20170714_110341.jpg', '2017-07-14', 'Planing & Dealership Training  ', 'S', 'mukbul', '2017-07-15 10:03:15'),
(3, 'Sonali Surjo', '20170714_121109.jpg', '2017-07-14', 'Planing & Dealership Training', 'S', 'mukbul', '2017-07-15 10:06:15'),
(4, 'Sonali Surjo', '20170714_124824.jpg', '2017-07-14', 'Planing & Dealership Training', 'S', 'mukbul', '2017-07-15 10:07:28'),
(5, 'Sonali Surjo', '20170714_105004.jpg', '2017-07-14', 'Planing & Dealership Training', 'S', 'mukbul', '2017-07-15 10:09:06'),
(6, 'Sonali Surjo', '20170714_105029.jpg', '2017-07-14', 'Planing & Dealership Training', 'S', 'mukbul', '2017-07-15 10:10:15'),
(7, 'Sonali Surjo', '20170714_124604.jpg', '2017-07-14', 'Planing & Dealership Training', 'S', 'mukbul', '2017-07-15 10:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` bigint(20) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_code` varchar(20) DEFAULT NULL,
  `group_id` tinyint(4) NOT NULL,
  `brand_id` tinyint(4) DEFAULT NULL,
  `profile_image` varchar(100) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `size` varchar(500) DEFAULT NULL,
  `current_stock` int(11) NOT NULL DEFAULT '0',
  `sales_price` double NOT NULL,
  `discount_price` double NOT NULL DEFAULT '0',
  `short_desc` mediumtext,
  `description` longtext,
  `display` char(1) NOT NULL DEFAULT 'S' COMMENT 'S=Show,H=Hide',
  `created_by` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `item_name`, `item_code`, `group_id`, `brand_id`, `profile_image`, `image`, `size`, `current_stock`, `sales_price`, `discount_price`, `short_desc`, `description`, `display`, `created_by`, `created_at`) VALUES
(2, 'Panjabi-001', '099999', 6, 12, 'Untitled-2.jpg', '[{\"imgName\":\"Untitled-2.jpg\"}]', '[{\"size\":\"XL\"},{\"size\":\"XXL\"},{\"size\":\"L\"}]', 45, 2500, 2500, 'fdsf', 'This is a description.', 'S', 'mukbul', '2017-06-22 05:41:42'),
(8, 'DX-100022', '34444', 6, 12, 'img299.jpg', '[{\"imgName\":\"img299.jpg\"}]', '[{\"size\":\"XL\"},{\"size\":\"XXL\"},{\"size\":\"L\"}]', 44, 2000, 2000, '', 'wdeqweqwe', 'S', 'mukbul', '2017-07-13 10:52:38'),
(9, 'DX-100034', '100034', 3, NULL, 'image_10.jpg', '[{\"imgName\":\"1498109249-Penguins.jpg\"},{\"imgName\":\"1498109249-Jellyfish.jpg\"},{\"imgName\":\"1498109250-Lighthouse.jpg\"}]', '[{\"size\":\"L\"},{\"size\":\"M\"},{\"size\":\"S\"}]', 33, 5000, 4000, '', 'daeqweqweqwewqe', 'H', 'mukbul', '2017-06-22 05:41:10'),
(11, 'DX-100876', '33333', 5, 12, 'img292.jpg', '[{\"imgName\":\"img296.jpg\"}]', '[{\"size\":\"XXL\"},{\"size\":\"L\"}]', 333, 1400, 1400, '', 'adaewqewqe', 'S', 'mukbul', '2017-07-13 10:40:08'),
(13, 'DX-100001', '099999', 5, 12, 'img293.jpg', '[{\"imgName\":\"img296.jpg\"}]', '', 333, 1700, 1700, '', 'sdfsdf', 'S', 'mukbul', '2017-07-13 10:40:30'),
(14, 'DX-100000', '0987654', 5, 12, 'img296.jpg', '[{\"imgName\":\"img296.jpg\"}]', '', 56, 1500, 1500, 'This is a short description.', 'This is a description.', 'S', 'mukbul', '2017-07-13 10:34:38'),
(16, 'DX-100000', '999999999', 5, 12, 'img297.jpg', '[{\"imgName\":\"img297.jpg\"}]', '[{\"size\":\"XL\"},{\"size\":\"XXL\"},{\"size\":\"L\"},{\"size\":\"M\"},{\"size\":\"S\"}]', 333, 1400, 1400, '', 'zdfsdfsdfdsf', 'S', 'mukbul', '2017-07-13 10:36:59'),
(17, 'DX-100000', '0987654', 5, 12, 'img294.jpg', '[{\"imgName\":\"img294.jpg\"}]', '[{\"size\":\"XXL\"},{\"size\":\"L\"},{\"size\":\"S\"}]', 60, 1700, 1700, '', 'fsdfsdf', 'S', 'mukbul', '2017-07-13 10:37:33'),
(20, 'DX-100000', '099999', 5, 12, 'img290.jpg', '[{\"imgName\":\"img290.jpg\"}]', '[{\"size\":\"XL\"},{\"size\":\"XXL\"},{\"size\":\"M\"}]', 33, 1400, 1400, 'This is a short description.', 'sfwrwerwerewr', 'S', 'mukbul', '2017-07-13 10:32:36'),
(21, 'DX-100000', '431234234', 1, 12, 'kid_1.jpg', '[{\"imgName\":\"kid_1.jpg\"},{\"imgName\":\"kid_2.jpg\"}]', '[{\"size\":\"L\"},{\"size\":\"M\"}]', 333, 5000, 2000, 'This is a short description.', 'asfasfwer', 'H', 'mukbul', '2017-07-12 12:06:27'),
(22, 'Panjabi', '2011', 6, 12, 'IMG_0218.jpg', '[{\"imgName\":\"IMG_0218.jpg\"},{\"imgName\":\"IMG_0217.jpg\"},{\"imgName\":\"IMG_0220.jpg\"}]', '[{\"size\":\"XL\"},{\"size\":\"XXL\"},{\"size\":\"L\"},{\"size\":\"M\"},{\"size\":\"S\"}]', 123, 1150, 1150, 'bvb', 'vbc', 'H', 'mukbul', '2017-08-26 05:53:20'),
(23, 'DX-101117', '2011', 6, 12, 'img298.jpg', '[{\"imgName\":\"img298.jpg\"}]', '[{\"size\":\"XL\"},{\"size\":\"XXL\"},{\"size\":\"L\"},{\"size\":\"M\"},{\"size\":\"S\"}]', 123, 2500, 2500, 'bvb', 'gggg', 'S', 'mukbul', '2017-07-13 10:52:19'),
(24, 'Panjabi', '2011', 6, 12, 'Untitled-3.jpg', '[{\"imgName\":\"Untitled-3.jpg\"}]', '[{\"size\":\"XL\"},{\"size\":\"XXL\"},{\"size\":\"L\"},{\"size\":\"M\"},{\"size\":\"S\"}]', 123, 2500, 2500, 'bvb', 'ghff', 'S', 'mukbul', '2017-06-22 05:40:14'),
(26, 'Panjabi-002', '2011', 6, 12, 'IMG_20170615_0015.jpg', '[{\"imgName\":\"IMG_20170615_0015.jpg\"}]', '[{\"size\":\"XL\"},{\"size\":\"XXL\"},{\"size\":\"L\"}]', 123, 2500, 2500, 'fdsf', 'mcvnc', 'S', 'mukbul', '2017-06-22 05:43:12'),
(27, 'Panjabi-003', '2011', 6, 12, 'Untitled-1.jpg', '[{\"imgName\":\"Untitled-1.jpg\"}]', '[{\"size\":\"XL\"},{\"size\":\"XXL\"},{\"size\":\"L\"}]', 123, 2500, 2500, 'bvb', 'dxcbd', 'S', 'mukbul', '2017-06-22 05:51:12'),
(28, 'Jeans-001', '099999', 6, 12, 'Untitled-1.jpg', '[{\"imgName\":\"Untitled-1.jpg\"}]', '[{\"size\":\"XL\"},{\"size\":\"XXL\"},{\"size\":\"L\"}]', 123, 1500, 1500, 'bvb', 'ghbgfh', 'S', 'mukbul', '2017-07-13 10:53:15'),
(29, 'Panjabi-005', '2011', 6, 12, 'IMG_20170615_0014.jpg', '[{\"imgName\":\"IMG_20170615_0014.jpg\"}]', '[{\"size\":\"XL\"},{\"size\":\"XXL\"},{\"size\":\"L\"}]', 123, 2500, 0, 'bvb', 'fhsdfh', 'S', 'mukbul', '2017-06-22 05:53:16'),
(33, 'Panjabi', 'P-3500', 6, 12, '1499517272-1498282140-20170624_111815.jpg', '[{\"imgName\":\"1499517272-1498282140-20170624_111815.jpg\"}]', '[{\"size\":\"XL\"},{\"size\":\"L\"},{\"size\":\"M\"}]', 15, 1150, 1150, 'Panjabi', 'Panjabi is best of eid', 'S', 'mahadi', '2017-07-08 12:34:32'),
(34, 'Tea Shirt', '00T5', 3, 12, '1499170865-220px-Tennis-shirt-lacoste.jpg', '[{\"imgName\":\"1499170865-220px-Tennis-shirt-lacoste.jpg\"},{\"imgName\":\"1499170865-16407199-yong-indian-male-model-wearing-green-t-shirt-and-jeans-Stock-Photo.jpg\"}]', '[{\"size\":\"XL\"},{\"size\":\"L\"},{\"size\":\"M\"}]', 50, 1450, 1450, 'xxxxx', '', 'S', 'mukbul', '2017-07-04 12:21:05'),
(35, 'T-Shirt', '00T6', 3, 12, '1499170956-I_255997377_00_20170120.jpg', '[{\"imgName\":\"1499170956-I_255997377_00_20170120.jpg\"},{\"imgName\":\"1499170956-images (1).jpg\"}]', '[{\"size\":\"XL\"},{\"size\":\"L\"},{\"size\":\"M\"}]', 60, 1450, 1450, 'xxx', '', 'S', 'mukbul', '2017-07-04 12:22:36'),
(38, 'Nokshi Khantha', '00N1', 8, 12, '1499171560-965330_0_original.jpg', '[{\"imgName\":\"1499171560-965330_0_original.jpg\"},{\"imgName\":\"1499171560-nakshi-katha-is-traditional-handicraft-in-bangladesh-dnr4p9.jpg\"},{\"imgName\":\"1499171560-nokshi_katha_18_20110708_1223699719.jpg\"}]', '', 35, 3500, 3500, 'xxxxx', '', 'S', 'mukbul', '2017-07-04 12:32:40'),
(39, 'NC-00001', 'N-00001', 9, 12, '1499171686-NK057.jpg', '[{\"imgName\":\"1499171686-NK057.jpg\"},{\"imgName\":\"1499171686-timthumb.jpg\"}]', '', 25, 1850, 1850, 'xxxxx', '', 'S', 'mukbul', '2017-07-13 11:13:01'),
(40, 'Panjabi-P001', 'P001', 6, 12, '1499171794-1172.jpg', '[{\"imgName\":\"1499171794-1172.jpg\"},{\"imgName\":\"1499171794-0040000077823_1.jpg\"},{\"imgName\":\"1499171794-aarong-blue-hand-painted-and-batik-printed-cotton-panjabi-15e160301086.jpg\"}]', '[{\"size\":\"XL\"},{\"size\":\"XXL\"},{\"size\":\"L\"},{\"size\":\"M\"}]', 100, 2000, 2000, '', '', 'S', 'mukbul', '2017-07-04 13:25:05'),
(41, 'Panjabi-P002', 'P002', 6, 12, '1499171856-churidar-salwar-kurta.jpg', '[{\"imgName\":\"1499171856-churidar-salwar-kurta.jpg\"},{\"imgName\":\"1499171856-casual-smart-looking-white-men-s-panjabi.jpg\"},{\"imgName\":\"1499171856-Cotton-Panjabi-1-600x724.jpg\"}]', '[{\"size\":\"XL\"},{\"size\":\"XXL\"},{\"size\":\"L\"},{\"size\":\"M\"}]', 100, 2000, 2000, '', '', 'S', 'mukbul', '2017-07-04 13:22:57'),
(42, 'Panjabi-P003', 'P003', 6, 12, '1499171921-Fashionable-Mens-Panjabi.jpg', '[{\"imgName\":\"1499171921-Fashionable-Mens-Panjabi.jpg\"},{\"imgName\":\"178532-1499944529-panjabi_03.jpg\"},{\"imgName\":\"257767-1499944571-images (4).jpg\"}]', '[{\"size\":\"XL\"},{\"size\":\"XXL\"},{\"size\":\"L\"},{\"size\":\"M\"}]', 100, 2000, 2000, '', '', 'S', 'mukbul', '2017-07-13 11:16:11'),
(44, 'B001', 'B001', 7, 12, '1499173766-093f4f9b1e8f91e3885a25360bd0c9b2--patchwork-ideas-patchwork-quilt.jpg', '[{\"imgName\":\"1499173766-093f4f9b1e8f91e3885a25360bd0c9b2--patchwork-ideas-patchwork-quilt.jpg\"},{\"imgName\":\"1499173766-699.jpg\"},{\"imgName\":\"1499173766-736x764_HA493.jpg\"}]', '', 100, 1050, 1050, '', '', 'S', 'mukbul', '2017-07-09 07:33:02'),
(45, 'T-Shirt', '456666', 3, 12, '1499517827-image.jpg', '[{\"imgName\":\"1499517827-image.jpg\"}]', '[{\"size\":\"XL\"},{\"size\":\"L\"},{\"size\":\"M\"}]', 50, 1450, 1450, 'T-Shirt', 'T-Shirt', 'S', 'mahadi', '2017-07-08 12:43:47'),
(46, 'B002', 'B002', 7, 12, '1499585958-smallImage1.jpg', '[{\"imgName\":\"1499585958-smallImage1.jpg\"},{\"imgName\":\"1499585958-images (2).jpg\"},{\"imgName\":\"1499585958-download.jpg\"}]', '', 70, 1050, 1050, 'My product is best ', 'nice', 'S', 'mukbul', '2017-07-09 07:39:18'),
(47, 'B003', 'B003', 7, 12, '1499863377-1499585958-download.jpg', '[{\"imgName\":\"1499863377-1499585958-download.jpg\"}]', '', 73, 1050, 1050, 'my product is best', 'nice', 'S', 'mahadi', '2017-07-12 12:42:57'),
(48, 'B004', 'B004', 7, 12, '1499863031-1499173766-736x764_HA493.jpg', '[{\"imgName\":\"1499863031-1499173766-736x764_HA493.jpg\"}]', '', 30, 1050, 1050, 'Bad Sheet', '', 'S', 'mukbul', '2017-07-13 11:07:51'),
(49, 'B005', 'B005', 7, 12, '1499586599-292-870x664.jpg', '[{\"imgName\":\"1499586599-292-870x664.jpg\"}]', '', 111, 1850, 1850, '', '', 'S', 'mukbul', '2017-07-09 07:49:59'),
(50, 'BTP-00001', 'TP001', 10, 12, '592390-1506353094.jpg', '[{\"imgName\":\"592390-1506353094.jpg\"},{\"imgName\":\"1499861487-4480_1445761049562c9019572ee_dvyfmd36t0ptuw-akojhq8yinvmxhhpf66gg2bsf31c.jpg\"},{\"imgName\":\"1499861487-images.jpg\"}]', '', 100, 1000, 1000, '', '', 'S', 'mahadi', '2017-09-25 15:24:54'),
(51, 'BTP-00002', 'TP002', 10, 12, '867134-1500039223-b009.jpg', '[{\"imgName\":\"867134-1500039223-b009.jpg\"},{\"imgName\":\"365460-1499930924-b008.jpg\"},{\"imgName\":\"162510-1499930924-b007.jpg\"}]', '', 100, 1000, 1000, '', '', 'S', 'mahadi', '2017-07-14 13:33:43'),
(52, 'BTP-00003', 'TP003', 10, 12, '143383-1500039168-317106-1499931021-b006.jpg', '[{\"imgName\":\"143383-1500039168-317106-1499931021-b006.jpg\"},{\"imgName\":\"807134-1499931021-b005.jpg\"},{\"imgName\":\"594897-1499931021-b004.jpg\"}]', '', 100, 1000, 1000, '', '', 'S', 'mahadi', '2017-07-14 13:32:48'),
(55, 'TP-00001', '00001', 5, 12, '391478-1499943661-Butikbd_1456571670.jpg', '[{\"imgName\":\"391478-1499943661-Butikbd_1456571670.jpg\"},{\"imgName\":\"792751-1499943661-Butikbd_1456571755.jpg\"},{\"imgName\":\"311928-1499943661-Butikbd_1456572022.jpg\"}]', '', 35, 1850, 1850, '', '', 'S', 'mukbul', '2017-07-13 11:01:01'),
(56, 'TP-00002', '00002', 5, 12, '997474-1499943702-IMG_20160306_080549.jpg', '[{\"imgName\":\"997474-1499943702-IMG_20160306_080549.jpg\"}]', '', 54, 1850, 1850, '', '', 'S', 'mukbul', '2017-07-13 11:01:42'),
(57, 'Test Item', '3333333', 2, NULL, '777584-1500113181-abc_1.jpg', '[{\"imgName\":\"777584-1500113181-abc_1.jpg\"},{\"imgName\":\"232705-1500113181-nature.jpg\"}]', '', 50, 2500, 2500, 'This is a short description.', 'sfsfsdf', 'H', 'mahadi', '2017-07-15 10:06:43'),
(58, 'velvet shaton', '2020', 5, 12, '916885-1506410721.jpg', '[{\"imgName\":\"916885-1506410721.jpg\"}]', '', 100, 1250, 1250, '', '', 'S', 'mukbul', '2017-09-26 07:25:23'),
(59, 'velvet shaton', '2016', 5, 12, '829194-1506410980.jpg', '[{\"imgName\":\"829194-1506410980.jpg\"}]', '', 100, 1250, 1250, '', '', 'S', 'mukbul', '2017-09-26 07:29:42'),
(60, 'Pakistani Lon', '2020', 5, 12, '986108-1506413673.jpg', '[{\"imgName\":\"986108-1506413673.jpg\"}]', '', 100, 1350, 1350, '', '', 'S', 'mukbul', '2017-09-26 08:14:36'),
(61, 'velvet shaton', '2002', 5, 12, '369327-1506411190.jpg', '[{\"imgName\":\"369327-1506411190.jpg\"}]', '', 100, 1250, 1250, '', '', 'S', 'mukbul', '2017-09-26 07:33:10'),
(62, 'velvet shaton', '2017', 5, 12, '302938-1506413453.jpg', '[{\"imgName\":\"302938-1506413453.jpg\"}]', '', 100, 1250, 1250, '', '', 'S', 'mukbul', '2017-09-26 08:10:55'),
(63, 'f gallery', '123', 5, 12, '800977-1506411751.jpg', '[{\"imgName\":\"800977-1506411751.jpg\"}]', '', 100, 1550, 1550, '', '', 'S', 'mukbul', '2017-09-26 07:42:35'),
(64, 'faria gallery', '321', 5, 12, '157234-1506412535.jpg', '[{\"imgName\":\"157234-1506412535.jpg\"}]', '', 100, 1800, 1800, '', '', 'S', 'mukbul', '2017-09-26 07:55:37'),
(65, 'Faria gallery', '2020', 5, 12, '262654-1506413084.jpg', '[{\"imgName\":\"262654-1506413084.jpg\"}]', '', 100, 1700, 1700, '', '', 'S', 'mukbul', '2017-09-26 08:04:48'),
(66, 'f gallery', '003', 5, 12, '875773-1506413287.jpg', '[{\"imgName\":\"875773-1506413287.jpg\"}]', '', 100, 1550, 1550, '', '', 'S', 'mukbul', '2017-09-26 08:08:09'),
(67, 'Zinc', 'T001', 11, 12, '135050-1503726183-20170825_172643.jpg', '[{\"imgName\":\"135050-1503726183-20170825_172643.jpg\"},{\"imgName\":\"738787-1503726187-20170825_172714.jpg\"}]', '[{\"size\":\"XL\"},{\"size\":\"XXL\"},{\"size\":\"L\"},{\"size\":\"M\"}]', 20, 1200, 1200, 'Without pants', '', 'S', 'mukbul', '2017-08-26 05:46:53'),
(68, 'T-Shirt', 'T0001', 11, 12, '187297-1503726349-20170825_172643.jpg', '[{\"imgName\":\"757880-1503726661-20170825_172805.jpg\"},{\"imgName\":\"762434-1503726664-20170825_172905.jpg\"},{\"imgName\":\"684052-1503726668-20170825_173103.jpg\"}]', '[{\"size\":\"XL\"},{\"size\":\"XXL\"},{\"size\":\"L\"},{\"size\":\"M\"}]', 30, 700, 700, 'Without pants/1500 with pants', '', 'S', 'mukbul', '2017-08-27 11:52:53'),
(69, 'Nokia 3310', '3310', 1, 13, '991750-1504015937-3310.jpg', '[{\"imgName\":\"991750-1504015937-3310.jpg\"},{\"imgName\":\"409086-1504015937-3310-2.jpg\"}]', '', 50, 2000, 2000, '', '', 'S', 'mukbul', '2017-08-29 14:40:07'),
(70, 'Tree Shirt', '17901', 3, 12, '925153-1506344370-treeshart.jpg', '[{\"imgName\":\"925153-1506344370-treeshart.jpg\"},{\"imgName\":\"264446-1506344289-IMG_20170915_161050-1_PerfectlyClear_0001.jpg\"}]', '[{\"size\":\"XL\"},{\"size\":\"XXL\"},{\"size\":\"L\"},{\"size\":\"M\"}]', 30, 500, 500, '', 'Price:\nT-Shirt With Jeans: 1300', 'S', 'mukbul', '2017-09-25 13:15:32'),
(71, 'Organdi', '1709251', 5, 12, '573096-1506341135-1250.jpg', '[{\"imgName\":\"573096-1506341135-1250.jpg\"}]', '', 12, 1250, 1250, 'jkhk', 'jm', 'S', 'mukbul', '2017-09-25 12:05:36'),
(72, 'Tree Pice', '1709252', 5, 12, '825997-1506341165-1300.jpg', '[{\"imgName\":\"825997-1506341165-1300.jpg\"}]', '', 4, 1300, 1300, '', '', 'S', 'mukbul', '2017-09-25 12:06:05'),
(73, 'Tree Pice', '1709253', 5, 12, '788586-1506341198-1400.jpg', '[{\"imgName\":\"788586-1506341198-1400.jpg\"}]', '', 4, 1400, 1400, '', '', 'S', 'mukbul', '2017-09-25 12:06:38'),
(74, 'Tree Pice', '1709254', 5, 12, '140548-1506341224-1500.jpg', '[{\"imgName\":\"140548-1506341224-1500.jpg\"}]', '', 4, 1500, 1500, '', '', 'S', 'mukbul', '2017-09-25 12:07:04'),
(75, 'Tree Pice', '1709255', 5, 12, '712239-1506338066-1600-1 copy.jpg', '[{\"imgName\":\"520192-1506341250-1600.jpg\"},{\"imgName\":\"855873-1506341250-1600-1.jpg\"}]', '', 4, 1600, 1600, '', '', 'S', 'mukbul', '2017-09-25 12:07:30'),
(76, 'Tree Pice', '1709256', 5, 12, '302286-1506341276-1650.jpg', '[{\"imgName\":\"302286-1506341276-1650.jpg\"}]', '', 4, 1650, 1650, '', '', 'S', 'mukbul', '2017-09-25 12:07:56'),
(77, 'Tree Pice', '1709257', 5, 12, '225634-1506341305-1850.jpg', '[{\"imgName\":\"225634-1506341305-1850.jpg\"}]', '', 4, 1850, 1850, '', '', 'S', 'mukbul', '2017-09-25 12:08:25'),
(78, 'TreePice', '1709258', 5, 12, '118240-1506341328-2000.jpg', '[{\"imgName\":\"118240-1506341328-2000.jpg\"}]', '', 4, 2000, 2000, '', '', 'S', 'mukbul', '2017-09-25 12:08:48');

-- --------------------------------------------------------

--
-- Table structure for table `item_group`
--

CREATE TABLE `item_group` (
  `id` tinyint(4) NOT NULL,
  `group_name` varchar(100) NOT NULL,
  `group_tp` varchar(2) NOT NULL COMMENT 'MA=Men,WO=Women,KD=Kids,HL=Home & Living',
  `display` char(1) NOT NULL COMMENT 'S=Show,H-Hide',
  `created_by` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_group`
--

INSERT INTO `item_group` (`id`, `group_name`, `group_tp`, `display`, `created_by`, `created_at`) VALUES
(1, 'Kid\'s Top', 'KD', 'S', 'mahadi', '2017-06-03 06:59:50'),
(2, 'Kid\'s Dress', 'KD', 'S', 'mahadi', '2017-06-06 07:35:31'),
(3, 'Jins+T-Shirt', 'MA', 'S', 'mukbul', '2017-07-13 10:54:08'),
(4, 'Women\'s Shari', 'WO', 'S', 'mahadi', '2017-06-02 06:52:27'),
(5, 'Three Piece', 'WO', 'S', 'mukbul', '2017-07-13 07:20:04'),
(6, 'Panjabi', 'MA', 'S', 'mukbul', '2017-07-13 10:54:26'),
(7, 'Bed Sheet', 'HL', 'S', 'mukbul', '2017-07-04 11:06:52'),
(8, 'Nokshi Khantha', 'HL', 'S', 'mukbul', '2017-07-04 12:31:16'),
(9, 'Nokshi Chador', 'HL', 'S', 'mukbul', '2017-07-04 12:33:37'),
(10, 'Batik Three Piece', 'WO', 'S', 'mukbul', '2017-07-13 07:19:43'),
(11, 'T-Shirt', 'MA', 'S', 'mukbul', '2017-08-26 05:44:40');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `slider_title` varchar(50) NOT NULL,
  `slider_sub_title` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `display` char(1) NOT NULL COMMENT 'S=Show,H=Hide',
  `created_by` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `slider_title`, `slider_sub_title`, `image`, `display`, `created_by`, `created_at`) VALUES
(4, 'Slider Four', 'T-Shirt & Jins', 'IMG_20170915_161251_copy.jpg', 'S', 'mukbul', '2017-06-11 07:25:34'),
(5, 'Slider One', 'Slider Sub Title', 'FB_IMG_1497190201969.jpg', 'S', 'mukbul', '2017-06-13 15:52:03'),
(6, 'Slider Five', 'Slider Sub Title', 'FB_IMG_1497190199169.jpg', 'S', 'mukbul', '2017-06-13 15:53:32'),
(7, 'Slider Six', 'Slider Sub Title', 'FB_IMG_1497190196591.jpg', 'S', 'mukbul', '2017-06-13 15:53:52'),
(8, 'Slider Seven', 'Slider Sub Title', 'FB_IMG_1497190186205.jpg', 'S', 'mukbul', '2017-06-13 15:55:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(80) NOT NULL,
  `full_name` varchar(80) NOT NULL,
  `email` varchar(80) DEFAULT NULL,
  `mobile` varchar(80) DEFAULT NULL,
  `authority` varchar(80) NOT NULL DEFAULT 'ROLE_USER',
  `enabled` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `full_name`, `email`, `mobile`, `authority`, `enabled`) VALUES
('mahadi', 'c8e47b6f198b92652c7273eb633acc64', 'Mahadi Hasan', 'mahadi@gmail.com', '01811123896', 'ROLE_DEVELOPER', 'A'),
('monir', 'e10adc3949ba59abbe56e057f20f883e', 'Monir', '', '', 'ROLE_USER', 'A'),
('mukbul', 'e10adc3949ba59abbe56e057f20f883e', 'Mukbul', '', '', 'ROLE_ADMIN', 'A'),
('rakib', 'e10adc3949ba59abbe56e057f20f883e', 'Rakib Hasan', 'rakib@yahoo.com', '0987654', 'ROLE_USER', 'A');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_branch_manager`
-- (See below for the actual view)
--
CREATE TABLE `vw_branch_manager` (
`id` int(11)
,`manager_name` varchar(150)
,`image_url` longtext
,`mobile` varchar(50)
,`email` varchar(50)
,`display` varchar(1)
,`displayTp` varchar(4)
,`address` varchar(250)
,`created_by` varchar(20)
,`created_at` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_brand`
-- (See below for the actual view)
--
CREATE TABLE `vw_brand` (
`id` tinyint(4)
,`brand_name` varchar(50)
,`logo` varchar(100)
,`display` char(1)
,`displayTp` varchar(4)
,`created_by` varchar(20)
,`created_at` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_contact_us`
-- (See below for the actual view)
--
CREATE TABLE `vw_contact_us` (
`id` bigint(20)
,`person_name` varchar(100)
,`email` varchar(100)
,`topic_tp` varchar(2)
,`topicTp` varchar(7)
,`message` varchar(500)
,`read` char(1)
,`isRead` varchar(6)
,`sentDate` varchar(40)
,`created_at` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_event`
-- (See below for the actual view)
--
CREATE TABLE `vw_event` (
`id` bigint(20)
,`event_name` varchar(250)
,`profile_image` varchar(250)
,`organize_date` date
,`organizeDate` varchar(72)
,`description` longtext
,`display` char(1)
,`displayTp` varchar(4)
,`created_by` varchar(20)
,`postDate` varchar(72)
,`created_at` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_item`
-- (See below for the actual view)
--
CREATE TABLE `vw_item` (
`id` bigint(20)
,`item_code` varchar(20)
,`item_name` varchar(100)
,`group_id` tinyint(4)
,`group_name` varchar(100)
,`group_tp` varchar(2)
,`groupTp` varchar(14)
,`brand_id` varchar(4)
,`brand_name` varchar(50)
,`profile_image` varchar(100)
,`image` varchar(1000)
,`size` varchar(500)
,`current_stock` int(11)
,`sales_price` double
,`discount_price` double
,`short_desc` mediumtext
,`description` longtext
,`display` char(1)
,`displayTp` varchar(4)
,`created_by` varchar(20)
,`created_at` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_item_group`
-- (See below for the actual view)
--
CREATE TABLE `vw_item_group` (
`id` tinyint(4)
,`group_name` varchar(100)
,`group_tp` varchar(2)
,`groupTp` varchar(14)
,`display` char(1)
,`displayTp` varchar(4)
,`created_by` varchar(20)
,`created_at` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_slider`
-- (See below for the actual view)
--
CREATE TABLE `vw_slider` (
`id` int(11)
,`slider_title` varchar(50)
,`slider_sub_title` varchar(50)
,`image` varchar(100)
,`display` char(1)
,`displayTp` varchar(4)
,`created_by` varchar(20)
,`created_at` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `website_visit`
--

CREATE TABLE `website_visit` (
  `id` int(11) NOT NULL,
  `visit_date` date NOT NULL,
  `total_visitor` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `website_visit`
--

INSERT INTO `website_visit` (`id`, `visit_date`, `total_visitor`, `created_at`) VALUES
(1, '2017-08-19', 11, '2017-08-20 03:28:23'),
(2, '2017-08-20', 27, '2017-08-21 03:27:11'),
(3, '2017-08-21', 20, '2017-08-21 17:35:13'),
(4, '2017-08-22', 28, '2017-08-22 22:39:07'),
(5, '2017-08-23', 38, '2017-08-23 22:16:28'),
(6, '2017-08-24', 15, '2017-08-25 03:24:46'),
(7, '2017-08-25', 19, '2017-08-26 03:57:07'),
(8, '2017-08-26', 26, '2017-08-27 01:08:01'),
(9, '2017-08-27', 10, '2017-08-28 02:17:35'),
(10, '2017-08-28', 14, '2017-08-29 03:24:24'),
(11, '2017-08-29', 34, '2017-08-30 03:32:04'),
(12, '2017-08-30', 13, '2017-08-31 01:49:14'),
(13, '2017-08-31', 8, '2017-09-01 02:56:09'),
(14, '2017-09-01', 15, '2017-09-02 01:20:32'),
(15, '2017-09-02', 11, '2017-09-02 22:32:07'),
(16, '2017-09-03', 25, '2017-09-04 03:13:02'),
(17, '2017-09-04', 15, '2017-09-05 01:24:02'),
(18, '2017-09-05', 10, '2017-09-06 01:35:13'),
(19, '2017-09-06', 8, '2017-09-06 23:48:34'),
(20, '2017-09-07', 28, '2017-09-08 03:29:41'),
(21, '2017-09-08', 10, '2017-09-09 03:22:28'),
(22, '2017-09-09', 11, '2017-09-10 01:02:28'),
(23, '2017-09-10', 9, '2017-09-11 02:30:14'),
(24, '2017-09-11', 15, '2017-09-11 22:23:33'),
(25, '2017-09-12', 15, '2017-09-12 18:01:10'),
(26, '2017-09-13', 27, '2017-09-14 01:51:43'),
(27, '2017-09-14', 42, '2017-09-15 02:01:32'),
(28, '2017-09-15', 14, '2017-09-16 02:40:19'),
(29, '2017-09-16', 16, '2017-09-17 00:31:26'),
(30, '2017-09-17', 7, '2017-09-18 02:03:42'),
(31, '2017-09-18', 7, '2017-09-18 21:43:30'),
(32, '2017-09-19', 21, '2017-09-20 03:16:32'),
(33, '2017-09-20', 29, '2017-09-21 03:41:17'),
(34, '2017-09-21', 14, '2017-09-22 01:30:31'),
(35, '2017-09-22', 12, '2017-09-23 03:38:07'),
(36, '2017-09-23', 19, '2017-09-23 20:55:00'),
(37, '2017-09-24', 49, '2017-09-25 01:50:14'),
(38, '2017-09-25', 47, '2017-09-26 02:03:36'),
(39, '2017-09-26', 52, '2017-09-27 03:31:21'),
(40, '2017-09-27', 38, '2017-09-28 03:25:31'),
(41, '2017-09-28', 29, '2017-09-29 03:10:51'),
(42, '2017-09-29', 19, '2017-09-30 02:53:50'),
(43, '2017-09-30', 17, '2017-10-01 02:20:32'),
(44, '2017-10-01', 18, '2017-10-02 03:16:20'),
(45, '2017-10-02', 17, '2017-10-03 00:10:38'),
(46, '2017-10-03', 23, '2017-10-04 00:33:49'),
(47, '2017-10-04', 39, '2017-10-05 03:58:25'),
(48, '2017-10-05', 34, '2017-10-06 02:05:05'),
(49, '2017-10-06', 25, '2017-10-07 03:23:20'),
(50, '2017-10-07', 30, '2017-10-08 02:58:11'),
(51, '2017-10-08', 26, '2017-10-09 03:48:07'),
(52, '2017-10-09', 29, '2017-10-09 23:11:06'),
(53, '2017-10-10', 14, '2017-10-11 01:54:28'),
(54, '2017-10-11', 27, '2017-10-11 21:12:59'),
(55, '2017-10-12', 15, '2017-10-12 14:35:55'),
(56, '2017-10-13', 17, '2017-10-14 01:59:24'),
(57, '2017-10-14', 16, '2017-10-14 23:24:35'),
(58, '2017-10-15', 31, '2017-10-16 02:42:23'),
(59, '2017-10-16', 18, '2017-10-16 19:50:08'),
(60, '2017-10-17', 21, '2017-10-18 03:44:20'),
(61, '2017-10-18', 22, '2017-10-19 02:41:46'),
(62, '2017-10-19', 27, '2017-10-20 03:17:49'),
(63, '2017-10-20', 14, '2017-10-20 23:44:19'),
(64, '2017-10-21', 5, '2017-10-22 03:22:35'),
(65, '2017-10-22', 25, '2017-10-23 01:54:36'),
(66, '2017-10-23', 38, '2017-10-23 21:46:03'),
(67, '2017-10-24', 6, '2017-10-24 08:14:31'),
(68, '2017-11-06', 28, '2017-11-07 03:46:35'),
(69, '2017-11-07', 32, '2017-11-08 03:23:45'),
(70, '2017-11-08', 28, '2017-11-09 04:49:29'),
(71, '2017-11-09', 29, '2017-11-10 04:21:21'),
(72, '2017-11-10', 36, '2017-11-11 04:40:07'),
(73, '2017-11-11', 17, '2017-11-11 14:38:24');

-- --------------------------------------------------------

--
-- Structure for view `vw_branch_manager`
--
DROP TABLE IF EXISTS `vw_branch_manager`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_branch_manager`  AS  select `bm`.`id` AS `id`,`bm`.`manager_name` AS `manager_name`,`bm`.`image_url` AS `image_url`,`bm`.`mobile` AS `mobile`,`bm`.`email` AS `email`,`bm`.`display` AS `display`,if((`bm`.`display` = 'S'),'Show','Hide') AS `displayTp`,`bm`.`address` AS `address`,`bm`.`created_by` AS `created_by`,`bm`.`created_at` AS `created_at` from `branch_manager` `bm` order by `bm`.`id` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_brand`
--
DROP TABLE IF EXISTS `vw_brand`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_brand`  AS  select `br`.`id` AS `id`,`br`.`brand_name` AS `brand_name`,`br`.`logo` AS `logo`,`br`.`display` AS `display`,(case `br`.`display` when 'S' then 'Show' when 'H' then 'Hide' end) AS `displayTp`,`br`.`created_by` AS `created_by`,`br`.`created_at` AS `created_at` from `brand` `br` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_contact_us`
--
DROP TABLE IF EXISTS `vw_contact_us`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_contact_us`  AS  select `co`.`id` AS `id`,`co`.`person_name` AS `person_name`,`co`.`email` AS `email`,`co`.`topic_tp` AS `topic_tp`,(case `co`.`topic_tp` when 'GE' then 'General' when 'SE' then 'Service' when 'OR' then 'Orders' end) AS `topicTp`,`co`.`message` AS `message`,`co`.`read` AS `read`,if((`co`.`read` = 'U'),'Unread','Read') AS `isRead`,date_format(`co`.`created_at`,'%d-%b-%Y') AS `sentDate`,`co`.`created_at` AS `created_at` from `contact_us` `co` order by `co`.`id` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_event`
--
DROP TABLE IF EXISTS `vw_event`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_event`  AS  select `event`.`id` AS `id`,`event`.`event_name` AS `event_name`,`event`.`profile_image` AS `profile_image`,`event`.`organize_date` AS `organize_date`,date_format(`event`.`organize_date`,'%d %M %Y') AS `organizeDate`,`event`.`description` AS `description`,`event`.`display` AS `display`,(case `event`.`display` when 'S' then 'Show' when 'H' then 'Hide' end) AS `displayTp`,`event`.`created_by` AS `created_by`,date_format(`event`.`created_at`,'%d %M %Y') AS `postDate`,`event`.`created_at` AS `created_at` from `event` order by `event`.`id` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_item`
--
DROP TABLE IF EXISTS `vw_item`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_item`  AS  select `itm`.`id` AS `id`,`itm`.`item_code` AS `item_code`,`itm`.`item_name` AS `item_name`,`itm`.`group_id` AS `group_id`,`gr`.`group_name` AS `group_name`,`gr`.`group_tp` AS `group_tp`,`gr`.`groupTp` AS `groupTp`,ifnull(`itm`.`brand_id`,'0') AS `brand_id`,ifnull(`br`.`brand_name`,'') AS `brand_name`,`itm`.`profile_image` AS `profile_image`,`itm`.`image` AS `image`,`itm`.`size` AS `size`,`itm`.`current_stock` AS `current_stock`,`itm`.`sales_price` AS `sales_price`,`itm`.`discount_price` AS `discount_price`,`itm`.`short_desc` AS `short_desc`,`itm`.`description` AS `description`,`itm`.`display` AS `display`,(case `itm`.`display` when 'S' then 'Show' when 'H' then 'Hide' end) AS `displayTp`,`itm`.`created_by` AS `created_by`,`itm`.`created_at` AS `created_at` from ((`item` `itm` join `vw_item_group` `gr` on((`gr`.`id` = `itm`.`group_id`))) left join `vw_brand` `br` on((`br`.`id` = `itm`.`brand_id`))) order by `itm`.`id` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_item_group`
--
DROP TABLE IF EXISTS `vw_item_group`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_item_group`  AS  select `itm`.`id` AS `id`,`itm`.`group_name` AS `group_name`,`itm`.`group_tp` AS `group_tp`,(case `itm`.`group_tp` when 'MA' then 'Mens Fashion' when 'WO' then 'Womens Fashion' when 'KD' then 'Kids Fashion' when 'HL' then 'Home & Living' end) AS `groupTp`,`itm`.`display` AS `display`,(case `itm`.`display` when 'S' then 'Show' when 'H' then 'Hide' end) AS `displayTp`,`itm`.`created_by` AS `created_by`,`itm`.`created_at` AS `created_at` from `item_group` `itm` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_slider`
--
DROP TABLE IF EXISTS `vw_slider`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_slider`  AS  select `sl`.`id` AS `id`,`sl`.`slider_title` AS `slider_title`,`sl`.`slider_sub_title` AS `slider_sub_title`,`sl`.`image` AS `image`,`sl`.`display` AS `display`,(case `sl`.`display` when 'S' then 'Show' when 'H' then 'Hide' end) AS `displayTp`,`sl`.`created_by` AS `created_by`,`sl`.`created_at` AS `created_at` from `slider` `sl` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch_manager`
--
ALTER TABLE `branch_manager`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK1_branch_manager` (`created_by`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UN1_brand_name` (`brand_name`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `developer_pm`
--
ALTER TABLE `developer_pm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK1_developer_pm` (`created_by`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK1_item` (`group_id`),
  ADD KEY `FK2_item` (`created_by`),
  ADD KEY `FK3_item` (`brand_id`);

--
-- Indexes for table `item_group`
--
ALTER TABLE `item_group`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UN1_group_name` (`group_name`),
  ADD KEY `FK1_item_group` (`created_by`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK1_slider` (`created_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `website_visit`
--
ALTER TABLE `website_visit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch_manager`
--
ALTER TABLE `branch_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `developer_pm`
--
ALTER TABLE `developer_pm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `item_group`
--
ALTER TABLE `item_group`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `website_visit`
--
ALTER TABLE `website_visit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `branch_manager`
--
ALTER TABLE `branch_manager`
  ADD CONSTRAINT `FK1_branch_manager` FOREIGN KEY (`created_by`) REFERENCES `users` (`username`);

--
-- Constraints for table `developer_pm`
--
ALTER TABLE `developer_pm`
  ADD CONSTRAINT `FK1_developer_pm` FOREIGN KEY (`created_by`) REFERENCES `users` (`username`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `FK1_item` FOREIGN KEY (`group_id`) REFERENCES `item_group` (`id`),
  ADD CONSTRAINT `FK2_item` FOREIGN KEY (`created_by`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `FK3_item` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`);

--
-- Constraints for table `item_group`
--
ALTER TABLE `item_group`
  ADD CONSTRAINT `FK1_item_group` FOREIGN KEY (`created_by`) REFERENCES `users` (`username`);

--
-- Constraints for table `slider`
--
ALTER TABLE `slider`
  ADD CONSTRAINT `FK1_slider` FOREIGN KEY (`created_by`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
