-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.12 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for grand_choice
CREATE DATABASE IF NOT EXISTS `grand_choice` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `grand_choice`;


-- Dumping structure for table grand_choice.branch_manager
CREATE TABLE IF NOT EXISTS `branch_manager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `manager_name` varchar(150) NOT NULL,
  `image_url` longtext NOT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `display` varchar(1) NOT NULL DEFAULT 'S',
  `created_by` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK1_branch_manager` (`created_by`),
  CONSTRAINT `FK1_branch_manager` FOREIGN KEY (`created_by`) REFERENCES `users` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table grand_choice.branch_manager: ~5 rows (approximately)
/*!40000 ALTER TABLE `branch_manager` DISABLE KEYS */;
INSERT INTO `branch_manager` (`id`, `manager_name`, `image_url`, `mobile`, `email`, `address`, `display`, `created_by`, `created_at`) VALUES
	(1, 'Mahadi', 'image_7.jpg', '01830889631', 'mahad88888i@yahoo.com', 'awqeqwe', 'H', 'mahadi', '2017-08-11 08:02:47'),
	(2, 'Mahadi', 'image_2.jpg', '01830889631', 'mahad88888i@yahoo.com', 'awqeqwe', 'S', 'mahadi', '2017-08-11 07:50:02'),
	(3, 'Mahadi 2', 'image_71.jpg', '01830889631', 'mahadi@yahoo.com', 'sadad', 'S', 'mahadi', '2017-08-11 07:58:29'),
	(4, 'Mahadi 4', 'image_3.jpg', 'fsdfsd', 'mahad88888i@yahoo.com', 'ewrwrewr', 'S', 'mahadi', '2017-08-12 14:53:52'),
	(5, 'Mahadi 3', 'kid_21.jpg', '01830889631', 'mahadi@yahoo.com', 'wefwer', 'S', 'mahadi', '2017-08-12 14:54:27');
/*!40000 ALTER TABLE `branch_manager` ENABLE KEYS */;


-- Dumping structure for table grand_choice.brand
CREATE TABLE IF NOT EXISTS `brand` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(50) NOT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `display` char(1) NOT NULL DEFAULT 'S' COMMENT 'S=Show,H=Hide',
  `created_by` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UN1_brand_name` (`brand_name`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table grand_choice.brand: ~4 rows (approximately)
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` (`id`, `brand_name`, `logo`, `display`, `created_by`, `created_at`) VALUES
	(9, 'Nike', '1200px-Logo_NIKE.svg_.png', 'S', 'mahadi', '2017-05-28 15:00:50'),
	(10, 'Adidas', 'Adidas_Logo.png', 'S', 'mahadi', '2017-05-28 14:58:03'),
	(11, 'Bran', NULL, 'S', 'mahadi', '2017-05-28 15:22:36'),
	(12, 'Niker', NULL, 'S', 'mahadi', '2017-06-16 04:06:57');
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;


-- Dumping structure for table grand_choice.contact_us
CREATE TABLE IF NOT EXISTS `contact_us` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `person_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `topic_tp` varchar(2) NOT NULL COMMENT 'GE=General,SE=Service,OR=Order',
  `message` varchar(500) NOT NULL,
  `read` char(1) NOT NULL DEFAULT 'U' COMMENT 'U=Unread,R=Read',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table grand_choice.contact_us: ~6 rows (approximately)
/*!40000 ALTER TABLE `contact_us` DISABLE KEYS */;
INSERT INTO `contact_us` (`id`, `person_name`, `email`, `topic_tp`, `message`, `read`, `created_at`) VALUES
	(1, 'Mahadi', 'mahadi@gmail.com', 'GE', 'sfsfdsf', 'U', '2017-06-06 15:00:55'),
	(2, 'Mahadi Hasan', 'mahadi.diu791@gmail.com', 'SE', 'You service is too much slow.', 'U', '2017-06-06 15:02:31'),
	(3, 'sfsfsf', 'mahadi.diu791@gmail.com', 'SE', 'sfafa', 'U', '2017-06-06 15:02:45'),
	(4, 'sfsfsf', 'mahadi@gmail.com', 'SE', 'asfaf', 'U', '2017-06-06 15:03:59'),
	(5, 'Mahadi', 'mahadi@gmail.com', 'OR', 'sfsfsdf', 'U', '2017-06-07 15:09:10'),
	(6, 'Mahadi Hasan', 'mahadi.diu791@gmail.com', 'SE', 'asdadwew', 'U', '2017-06-07 15:25:13');
/*!40000 ALTER TABLE `contact_us` ENABLE KEYS */;


-- Dumping structure for table grand_choice.developer_pm
CREATE TABLE IF NOT EXISTS `developer_pm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pm_date` date NOT NULL,
  `amount` double NOT NULL,
  `notes` longtext NOT NULL,
  `enabled` char(1) NOT NULL DEFAULT 'A',
  `created_by` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK1_developer_pm` (`created_by`),
  CONSTRAINT `FK1_developer_pm` FOREIGN KEY (`created_by`) REFERENCES `users` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='developer payments';

-- Dumping data for table grand_choice.developer_pm: ~4 rows (approximately)
/*!40000 ALTER TABLE `developer_pm` DISABLE KEYS */;
INSERT INTO `developer_pm` (`id`, `pm_date`, `amount`, `notes`, `enabled`, `created_by`, `created_at`) VALUES
	(1, '2017-05-24', 2000, 'Advance Payment out of 50,000', 'A', 'mahadi', '2017-06-07 15:04:59'),
	(2, '2017-05-25', 5000, '3000 for Domain & Hosting, 2000 payment (total payment 4000 out of 50,000)', 'A', 'mahadi', '2017-06-07 15:03:02'),
	(3, '2017-05-25', 5000, 'For Domain and Hosting purpose.', 'B', 'mahadi', '2017-05-24 15:46:59'),
	(4, '2017-06-03', 5000, '9,000 paid out of 50,000', 'A', 'mahadi', '2017-06-07 15:04:39');
/*!40000 ALTER TABLE `developer_pm` ENABLE KEYS */;


-- Dumping structure for table grand_choice.event
CREATE TABLE IF NOT EXISTS `event` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(250) NOT NULL,
  `profile_image` varchar(250) NOT NULL DEFAULT 'uu_up_upcoming.jpg',
  `organize_date` date NOT NULL,
  `description` longtext NOT NULL,
  `display` char(1) NOT NULL COMMENT 'S=Show,H=Hide',
  `created_by` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table grand_choice.event: ~3 rows (approximately)
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` (`id`, `event_name`, `profile_image`, `organize_date`, `description`, `display`, `created_by`, `created_at`) VALUES
	(7, 'Updated', 'uu_up_upcoming.jpg', '2017-05-11', 'szdsadsad', 'S', 'mahadi', '2017-06-16 04:17:20'),
	(8, 'This is a event.', 'uu_up_upcoming.jpg', '2017-05-11', 'This is a description.', 'S', 'mahadi', '2017-06-16 04:33:13'),
	(9, 'Iftar Mahfil', 'upcoming.jpg', '2017-06-16', 'our Iftar party was held on ..........', 'S', 'mahadi', '2017-06-16 04:21:49');
/*!40000 ALTER TABLE `event` ENABLE KEYS */;


-- Dumping structure for table grand_choice.item
CREATE TABLE IF NOT EXISTS `item` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK1_item` (`group_id`),
  KEY `FK2_item` (`created_by`),
  KEY `FK3_item` (`brand_id`),
  CONSTRAINT `FK1_item` FOREIGN KEY (`group_id`) REFERENCES `item_group` (`id`),
  CONSTRAINT `FK2_item` FOREIGN KEY (`created_by`) REFERENCES `users` (`username`),
  CONSTRAINT `FK3_item` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

-- Dumping data for table grand_choice.item: ~38 rows (approximately)
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` (`id`, `item_name`, `item_code`, `group_id`, `brand_id`, `profile_image`, `image`, `size`, `current_stock`, `sales_price`, `discount_price`, `short_desc`, `description`, `display`, `created_by`, `created_at`) VALUES
	(2, 'Panjabi-001', '099999', 6, 12, 'Untitled-2.jpg', '[{"imgName":"Untitled-2.jpg"}]', '[{"size":"XL"},{"size":"XXL"},{"size":"L"}]', 45, 2500, 2500, 'fdsf', 'This is a description.', 'S', 'mukbul', '2017-06-22 17:41:42'),
	(8, 'DX-100022', '34444', 6, 12, 'img299.jpg', '[{"imgName":"img299.jpg"}]', '[{"size":"XL"},{"size":"XXL"},{"size":"L"}]', 44, 2000, 2000, '', 'wdeqweqwe', 'S', 'mukbul', '2017-07-13 22:52:38'),
	(9, 'DX-100034', '100034', 3, NULL, 'image_10.jpg', '[{"imgName":"1498109249-Penguins.jpg"},{"imgName":"1498109249-Jellyfish.jpg"},{"imgName":"1498109250-Lighthouse.jpg"}]', '[{"size":"L"},{"size":"M"},{"size":"S"}]', 33, 5000, 4000, '', 'daeqweqweqwewqe', 'H', 'mukbul', '2017-06-22 17:41:10'),
	(11, 'DX-100876', '33333', 5, 12, 'img292.jpg', '[{"imgName":"img296.jpg"}]', '[{"size":"XXL"},{"size":"L"}]', 333, 1400, 1400, '', 'adaewqewqe', 'S', 'mukbul', '2017-07-13 22:40:08'),
	(13, 'DX-100001', '099999', 5, 12, 'img293.jpg', '[{"imgName":"img296.jpg"}]', '', 333, 1700, 1700, '', 'sdfsdf', 'S', 'mukbul', '2017-07-13 22:40:30'),
	(14, 'DX-100000', '0987654', 5, 12, 'img296.jpg', '[{"imgName":"img296.jpg"}]', '', 56, 1500, 1500, 'This is a short description.', 'This is a description.', 'S', 'mukbul', '2017-07-13 22:34:38'),
	(16, 'DX-100000', '999999999', 5, 12, 'img297.jpg', '[{"imgName":"img297.jpg"}]', '[{"size":"XL"},{"size":"XXL"},{"size":"L"},{"size":"M"},{"size":"S"}]', 333, 1400, 1400, '', 'zdfsdfsdfdsf', 'S', 'mukbul', '2017-07-13 22:36:59'),
	(17, 'DX-100000', '0987654', 5, 12, 'img294.jpg', '[{"imgName":"img294.jpg"}]', '[{"size":"XXL"},{"size":"L"},{"size":"S"}]', 60, 1700, 1700, '', 'fsdfsdf', 'S', 'mukbul', '2017-07-13 22:37:33'),
	(20, 'DX-100000', '099999', 5, 12, 'img290.jpg', '[{"imgName":"img290.jpg"}]', '[{"size":"XL"},{"size":"XXL"},{"size":"M"}]', 33, 1400, 1400, 'This is a short description.', 'sfwrwerwerewr', 'S', 'mukbul', '2017-07-13 22:32:36'),
	(21, 'DX-100000', '431234234', 1, 12, 'kid_1.jpg', '[{"imgName":"kid_1.jpg"},{"imgName":"kid_2.jpg"}]', '[{"size":"L"},{"size":"M"}]', 333, 5000, 2000, 'This is a short description.', 'asfasfwer', 'H', 'mukbul', '2017-07-13 00:06:27'),
	(22, 'Panjabi', '2011', 6, 12, 'IMG_0218.jpg', '[{"imgName":"IMG_0218.jpg"},{"imgName":"IMG_0217.jpg"},{"imgName":"IMG_0220.jpg"}]', '[{"size":"XL"},{"size":"XXL"},{"size":"L"},{"size":"M"},{"size":"S"}]', 123, 1150, 1150, 'bvb', 'vbc', 'S', 'mukbul', '2017-06-22 17:37:57'),
	(23, 'DX-101117', '2011', 6, 12, 'img298.jpg', '[{"imgName":"img298.jpg"}]', '[{"size":"XL"},{"size":"XXL"},{"size":"L"},{"size":"M"},{"size":"S"}]', 123, 2500, 2500, 'bvb', 'gggg', 'S', 'mukbul', '2017-07-13 22:52:19'),
	(24, 'Panjabi', '2011', 6, 12, 'Untitled-3.jpg', '[{"imgName":"Untitled-3.jpg"}]', '[{"size":"XL"},{"size":"XXL"},{"size":"L"},{"size":"M"},{"size":"S"}]', 123, 2500, 2500, 'bvb', 'ghff', 'S', 'mukbul', '2017-06-22 17:40:14'),
	(26, 'Panjabi-002', '2011', 6, 12, 'IMG_20170615_0015.jpg', '[{"imgName":"IMG_20170615_0015.jpg"}]', '[{"size":"XL"},{"size":"XXL"},{"size":"L"}]', 123, 2500, 2500, 'fdsf', 'mcvnc', 'S', 'mukbul', '2017-06-22 17:43:12'),
	(27, 'Panjabi-003', '2011', 6, 12, 'Untitled-1.jpg', '[{"imgName":"Untitled-1.jpg"}]', '[{"size":"XL"},{"size":"XXL"},{"size":"L"}]', 123, 2500, 2500, 'bvb', 'dxcbd', 'S', 'mukbul', '2017-06-22 17:51:12'),
	(28, 'Jeans-001', '099999', 6, 12, 'Untitled-1.jpg', '[{"imgName":"Untitled-1.jpg"}]', '[{"size":"XL"},{"size":"XXL"},{"size":"L"}]', 123, 1500, 1500, 'bvb', 'ghbgfh', 'S', 'mukbul', '2017-07-13 22:53:15'),
	(29, 'Panjabi-005', '2011', 6, 12, 'IMG_20170615_0014.jpg', '[{"imgName":"IMG_20170615_0014.jpg"}]', '[{"size":"XL"},{"size":"XXL"},{"size":"L"}]', 123, 2500, 0, 'bvb', 'fhsdfh', 'S', 'mukbul', '2017-06-22 17:53:16'),
	(33, 'Panjabi', 'P-3500', 6, 12, '1499517272-1498282140-20170624_111815.jpg', '[{"imgName":"1499517272-1498282140-20170624_111815.jpg"}]', '[{"size":"XL"},{"size":"L"},{"size":"M"}]', 15, 1150, 1150, 'Panjabi', 'Panjabi is best of eid', 'S', 'mahadi', '2017-07-09 00:34:32'),
	(34, 'Tea Shirt', '00T5', 3, 12, '1499170865-220px-Tennis-shirt-lacoste.jpg', '[{"imgName":"1499170865-220px-Tennis-shirt-lacoste.jpg"},{"imgName":"1499170865-16407199-yong-indian-male-model-wearing-green-t-shirt-and-jeans-Stock-Photo.jpg"}]', '[{"size":"XL"},{"size":"L"},{"size":"M"}]', 50, 1450, 1450, 'xxxxx', '', 'S', 'mukbul', '2017-07-05 00:21:05'),
	(35, 'T-Shirt', '00T6', 3, 12, '1499170956-I_255997377_00_20170120.jpg', '[{"imgName":"1499170956-I_255997377_00_20170120.jpg"},{"imgName":"1499170956-images (1).jpg"}]', '[{"size":"XL"},{"size":"L"},{"size":"M"}]', 60, 1450, 1450, 'xxx', '', 'S', 'mukbul', '2017-07-05 00:22:36'),
	(38, 'Nokshi Khantha', '00N1', 8, 12, '1499171560-965330_0_original.jpg', '[{"imgName":"1499171560-965330_0_original.jpg"},{"imgName":"1499171560-nakshi-katha-is-traditional-handicraft-in-bangladesh-dnr4p9.jpg"},{"imgName":"1499171560-nokshi_katha_18_20110708_1223699719.jpg"}]', '', 35, 3500, 3500, 'xxxxx', '', 'S', 'mukbul', '2017-07-05 00:32:40'),
	(39, 'NC-00001', 'N-00001', 9, 12, '1499171686-NK057.jpg', '[{"imgName":"1499171686-NK057.jpg"},{"imgName":"1499171686-timthumb.jpg"}]', '', 25, 1850, 1850, 'xxxxx', '', 'S', 'mukbul', '2017-07-13 23:13:01'),
	(40, 'Panjabi-P001', 'P001', 6, 12, '1499171794-1172.jpg', '[{"imgName":"1499171794-1172.jpg"},{"imgName":"1499171794-0040000077823_1.jpg"},{"imgName":"1499171794-aarong-blue-hand-painted-and-batik-printed-cotton-panjabi-15e160301086.jpg"}]', '[{"size":"XL"},{"size":"XXL"},{"size":"L"},{"size":"M"}]', 100, 2000, 2000, '', '', 'S', 'mukbul', '2017-07-05 01:25:05'),
	(41, 'Panjabi-P002', 'P002', 6, 12, '1499171856-churidar-salwar-kurta.jpg', '[{"imgName":"1499171856-churidar-salwar-kurta.jpg"},{"imgName":"1499171856-casual-smart-looking-white-men-s-panjabi.jpg"},{"imgName":"1499171856-Cotton-Panjabi-1-600x724.jpg"}]', '[{"size":"XL"},{"size":"XXL"},{"size":"L"},{"size":"M"}]', 100, 2000, 2000, '', '', 'S', 'mukbul', '2017-07-05 01:22:57'),
	(42, 'Panjabi-P003', 'P003', 6, 12, '1499171921-Fashionable-Mens-Panjabi.jpg', '[{"imgName":"1499171921-Fashionable-Mens-Panjabi.jpg"},{"imgName":"178532-1499944529-panjabi_03.jpg"},{"imgName":"257767-1499944571-images (4).jpg"}]', '[{"size":"XL"},{"size":"XXL"},{"size":"L"},{"size":"M"}]', 100, 2000, 2000, '', '', 'S', 'mukbul', '2017-07-13 23:16:11'),
	(44, 'B001', 'B001', 7, 12, '1499173766-093f4f9b1e8f91e3885a25360bd0c9b2--patchwork-ideas-patchwork-quilt.jpg', '[{"imgName":"1499173766-093f4f9b1e8f91e3885a25360bd0c9b2--patchwork-ideas-patchwork-quilt.jpg"},{"imgName":"1499173766-699.jpg"},{"imgName":"1499173766-736x764_HA493.jpg"}]', '', 100, 1050, 1050, '', '', 'S', 'mukbul', '2017-07-09 19:33:02'),
	(45, 'T-Shirt', '456666', 3, 12, '1499517827-image.jpg', '[{"imgName":"1499517827-image.jpg"}]', '[{"size":"XL"},{"size":"L"},{"size":"M"}]', 50, 1450, 1450, 'T-Shirt', 'T-Shirt', 'S', 'mahadi', '2017-07-09 00:43:47'),
	(46, 'B002', 'B002', 7, 12, '1499585958-smallImage1.jpg', '[{"imgName":"1499585958-smallImage1.jpg"},{"imgName":"1499585958-images (2).jpg"},{"imgName":"1499585958-download.jpg"}]', '', 70, 1050, 1050, 'My product is best ', 'nice', 'S', 'mukbul', '2017-07-09 19:39:18'),
	(47, 'B003', 'B003', 7, 12, '1499863377-1499585958-download.jpg', '[{"imgName":"1499863377-1499585958-download.jpg"}]', '', 73, 1050, 1050, 'my product is best', 'nice', 'S', 'mahadi', '2017-07-13 00:42:57'),
	(48, 'B004', 'B004', 7, 12, '1499863031-1499173766-736x764_HA493.jpg', '[{"imgName":"1499863031-1499173766-736x764_HA493.jpg"}]', '', 30, 1050, 1050, 'Bad Sheet', '', 'S', 'mukbul', '2017-07-13 23:07:51'),
	(49, 'B005', 'B005', 7, 12, '1499586599-292-870x664.jpg', '[{"imgName":"1499586599-292-870x664.jpg"}]', '', 111, 1850, 1850, '', '', 'S', 'mukbul', '2017-07-09 19:49:59'),
	(50, 'BTP-00001', 'TP001', 10, 12, '1499861487-2263_144430636856165dc0c7f37_1frrkrjj02980gn1vj1veqlzkubaiysmgjldijraeca.jpg', '[{"imgName":"1499861487-2263_144430636856165dc0c7f37_1frrkrjj02980gn1vj1veqlzkubaiysmgjldijraeca.jpg"},{"imgName":"1499861487-4480_1445761049562c9019572ee_dvyfmd36t0ptuw-akojhq8yinvmxhhpf66gg2bsf31c.jpg"},{"imgName":"1499861487-images.jpg"}]', '', 100, 1000, 1000, '', '', 'S', 'mukbul', '2017-07-13 22:56:26'),
	(51, 'BTP-00002', 'TP002', 10, 12, '867134-1500039223-b009.jpg', '[{"imgName":"867134-1500039223-b009.jpg"},{"imgName":"365460-1499930924-b008.jpg"},{"imgName":"162510-1499930924-b007.jpg"}]', '', 100, 1000, 1000, '', '', 'S', 'mahadi', '2017-07-15 01:33:43'),
	(52, 'BTP-00003', 'TP003', 10, 12, '143383-1500039168-317106-1499931021-b006.jpg', '[{"imgName":"143383-1500039168-317106-1499931021-b006.jpg"},{"imgName":"807134-1499931021-b005.jpg"},{"imgName":"594897-1499931021-b004.jpg"}]', '', 100, 1000, 1000, '', '', 'S', 'mahadi', '2017-07-15 01:32:48'),
	(55, 'TP-00001', '00001', 5, 12, '391478-1499943661-Butikbd_1456571670.jpg', '[{"imgName":"391478-1499943661-Butikbd_1456571670.jpg"},{"imgName":"792751-1499943661-Butikbd_1456571755.jpg"},{"imgName":"311928-1499943661-Butikbd_1456572022.jpg"}]', '', 35, 1850, 1850, '', '', 'S', 'mukbul', '2017-07-13 23:01:01'),
	(56, 'TP-00002', '00002', 5, 12, '997474-1499943702-IMG_20160306_080549.jpg', '[{"imgName":"997474-1499943702-IMG_20160306_080549.jpg"}]', '', 54, 1850, 1850, '', '', 'S', 'mukbul', '2017-07-13 23:01:42'),
	(57, 'Test Item', '3333333', 2, NULL, '777584-1500113181-abc_1.jpg', '[{"imgName":"777584-1500113181-abc_1.jpg"},{"imgName":"232705-1500113181-nature.jpg"}]', '', 50, 2500, 2500, 'This is a short description.', 'sfsfsdf', 'H', 'mahadi', '2017-07-15 22:06:43'),
	(58, 'qeqwewq', 'qweqweqwe', 3, 10, '577960-1506305786.jpg', '[{"imgName":"577960-1506305786.jpg"},{"imgName":"930703-1506305741.jpg"}]', '[{"size":"L"}]', 333, 5000, 1700, 'my product is best', 'adasd', 'S', 'mahadi', '2017-09-25 14:16:26');
/*!40000 ALTER TABLE `item` ENABLE KEYS */;


-- Dumping structure for table grand_choice.item_group
CREATE TABLE IF NOT EXISTS `item_group` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(100) NOT NULL,
  `group_tp` varchar(2) NOT NULL COMMENT 'MA=Men,WO=Women,KD=Kids,HL=Home & Living',
  `display` char(1) NOT NULL COMMENT 'S=Show,H-Hide',
  `created_by` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UN1_group_name` (`group_name`),
  KEY `FK1_item_group` (`created_by`),
  CONSTRAINT `FK1_item_group` FOREIGN KEY (`created_by`) REFERENCES `users` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table grand_choice.item_group: ~10 rows (approximately)
/*!40000 ALTER TABLE `item_group` DISABLE KEYS */;
INSERT INTO `item_group` (`id`, `group_name`, `group_tp`, `display`, `created_by`, `created_at`) VALUES
	(1, 'Kid\'s Top', 'KD', 'S', 'mahadi', '2017-06-03 14:59:50'),
	(2, 'Kid\'s Dress', 'KD', 'S', 'mahadi', '2017-06-06 15:35:31'),
	(3, 'Men\'s Shirt', 'MA', 'S', 'mahadi', '2017-05-28 12:00:33'),
	(4, 'Women\'s Shari', 'WO', 'S', 'mahadi', '2017-06-02 14:52:27'),
	(5, 'Women\'s Top', 'WO', 'S', 'mahadi', '2017-06-02 14:52:38'),
	(6, 'Panjabi', 'MA', 'S', 'mukbul', '2017-07-13 22:54:26'),
	(7, 'Bed Sheet', 'HL', 'S', 'mukbul', '2017-07-04 23:06:52'),
	(8, 'Nokshi Khantha', 'HL', 'S', 'mukbul', '2017-07-05 00:31:16'),
	(9, 'Nokshi Chador', 'HL', 'S', 'mukbul', '2017-07-05 00:33:37'),
	(10, 'Batik Three Piece', 'WO', 'S', 'mukbul', '2017-07-13 19:19:43');
/*!40000 ALTER TABLE `item_group` ENABLE KEYS */;


-- Dumping structure for table grand_choice.item_sales
CREATE TABLE IF NOT EXISTS `item_sales` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `item_id` bigint(20) NOT NULL,
  `sales_date` date NOT NULL,
  `sold_by` varchar(20) NOT NULL,
  `sold_to` varchar(20) NOT NULL,
  `sold_amount` double NOT NULL,
  `comission` double NOT NULL,
  `bonus` double NOT NULL,
  `client_level` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table grand_choice.item_sales: ~0 rows (approximately)
/*!40000 ALTER TABLE `item_sales` DISABLE KEYS */;
/*!40000 ALTER TABLE `item_sales` ENABLE KEYS */;


-- Dumping structure for table grand_choice.registration
CREATE TABLE IF NOT EXISTS `registration` (
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `level_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table grand_choice.registration: ~0 rows (approximately)
/*!40000 ALTER TABLE `registration` DISABLE KEYS */;
/*!40000 ALTER TABLE `registration` ENABLE KEYS */;


-- Dumping structure for table grand_choice.slider
CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slider_title` varchar(50) NOT NULL,
  `slider_sub_title` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `display` char(1) NOT NULL COMMENT 'S=Show,H=Hide',
  `created_by` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK1_slider` (`created_by`),
  CONSTRAINT `FK1_slider` FOREIGN KEY (`created_by`) REFERENCES `users` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table grand_choice.slider: ~5 rows (approximately)
/*!40000 ALTER TABLE `slider` DISABLE KEYS */;
INSERT INTO `slider` (`id`, `slider_title`, `slider_sub_title`, `image`, `display`, `created_by`, `created_at`) VALUES
	(4, 'Slider Four', '', 'Butikbd_1456571755.jpg', 'S', 'mukbul', '2017-06-11 19:25:34'),
	(5, 'Slider One', 'Slider Sub Title', 'FB_IMG_1497190201969.jpg', 'S', 'mukbul', '2017-06-14 03:52:03'),
	(6, 'Slider Five', 'Slider Sub Title', 'FB_IMG_1497190199169.jpg', 'S', 'mukbul', '2017-06-14 03:53:32'),
	(7, 'Slider Six', 'Slider Sub Title', 'FB_IMG_1497190196591.jpg', 'S', 'mukbul', '2017-06-14 03:53:52'),
	(8, 'Slider Seven', 'Slider Sub Title', 'FB_IMG_1497190186205.jpg', 'S', 'mukbul', '2017-06-14 03:55:18');
/*!40000 ALTER TABLE `slider` ENABLE KEYS */;


-- Dumping structure for table grand_choice.users
CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(80) NOT NULL,
  `full_name` varchar(80) NOT NULL,
  `email` varchar(80) DEFAULT NULL,
  `mobile` varchar(80) DEFAULT NULL,
  `authority` varchar(80) NOT NULL DEFAULT 'ROLE_USER',
  `enabled` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table grand_choice.users: ~4 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`username`, `password`, `full_name`, `email`, `mobile`, `authority`, `enabled`) VALUES
	('mahadi', 'c8e47b6f198b92652c7273eb633acc64', 'Mahadi Hasan', 'mahadi@gmail.com', '01811123896', 'ROLE_DEVELOPER', 'A'),
	('monir', 'e10adc3949ba59abbe56e057f20f883e', 'Monir', '', '', 'ROLE_USER', 'A'),
	('mukbul', 'e10adc3949ba59abbe56e057f20f883e', 'Mukbul', '', '', 'ROLE_ADMIN', 'A'),
	('rakib', 'e10adc3949ba59abbe56e057f20f883e', 'Rakib Hasan', 'rakib@yahoo.com', '0987654', 'ROLE_USER', 'A');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Dumping structure for table grand_choice.user_level
CREATE TABLE IF NOT EXISTS `user_level` (
  `id` int(11) DEFAULT NULL,
  `level_title` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table grand_choice.user_level: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_level` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_level` ENABLE KEYS */;


-- Dumping structure for view grand_choice.vw_branch_manager
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_branch_manager` (
	`id` INT(11) NOT NULL,
	`manager_name` VARCHAR(150) NOT NULL COLLATE 'latin1_swedish_ci',
	`image_url` LONGTEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`mobile` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`email` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`display` VARCHAR(1) NOT NULL COLLATE 'latin1_swedish_ci',
	`displayTp` VARCHAR(4) NOT NULL COLLATE 'utf8mb4_general_ci',
	`address` VARCHAR(250) NULL COLLATE 'latin1_swedish_ci',
	`created_by` VARCHAR(20) NOT NULL COLLATE 'latin1_swedish_ci',
	`created_at` TIMESTAMP NOT NULL
) ENGINE=MyISAM;


-- Dumping structure for view grand_choice.vw_brand
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_brand` (
	`id` TINYINT(4) NOT NULL,
	`brand_name` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`logo` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`display` CHAR(1) NOT NULL COMMENT 'S=Show,H=Hide' COLLATE 'latin1_swedish_ci',
	`displayTp` VARCHAR(4) NULL COLLATE 'utf8mb4_general_ci',
	`created_by` VARCHAR(20) NOT NULL COLLATE 'latin1_swedish_ci',
	`created_at` TIMESTAMP NOT NULL
) ENGINE=MyISAM;


-- Dumping structure for view grand_choice.vw_contact_us
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_contact_us` (
	`id` BIGINT(20) NOT NULL,
	`person_name` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`email` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`topic_tp` VARCHAR(2) NOT NULL COMMENT 'GE=General,SE=Service,OR=Order' COLLATE 'latin1_swedish_ci',
	`topicTp` VARCHAR(7) NULL COLLATE 'utf8mb4_general_ci',
	`message` VARCHAR(500) NOT NULL COLLATE 'latin1_swedish_ci',
	`read` CHAR(1) NOT NULL COMMENT 'U=Unread,R=Read' COLLATE 'latin1_swedish_ci',
	`isRead` VARCHAR(6) NOT NULL COLLATE 'utf8mb4_general_ci',
	`sentDate` VARCHAR(40) NULL COLLATE 'utf8mb4_general_ci',
	`created_at` TIMESTAMP NOT NULL
) ENGINE=MyISAM;


-- Dumping structure for view grand_choice.vw_event
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_event` (
	`id` BIGINT(20) NOT NULL,
	`event_name` VARCHAR(250) NOT NULL COLLATE 'latin1_swedish_ci',
	`profile_image` VARCHAR(250) NOT NULL COLLATE 'latin1_swedish_ci',
	`organize_date` DATE NOT NULL,
	`organizeDate` VARCHAR(72) NULL COLLATE 'utf8mb4_general_ci',
	`description` LONGTEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`display` CHAR(1) NOT NULL COMMENT 'S=Show,H=Hide' COLLATE 'latin1_swedish_ci',
	`displayTp` VARCHAR(4) NULL COLLATE 'utf8mb4_general_ci',
	`created_by` VARCHAR(20) NOT NULL COLLATE 'latin1_swedish_ci',
	`postDate` VARCHAR(72) NULL COLLATE 'utf8mb4_general_ci',
	`created_at` TIMESTAMP NOT NULL
) ENGINE=MyISAM;


-- Dumping structure for view grand_choice.vw_item
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_item` (
	`id` BIGINT(20) NOT NULL,
	`item_code` VARCHAR(20) NULL COLLATE 'latin1_swedish_ci',
	`item_name` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`group_id` TINYINT(4) NOT NULL,
	`group_name` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`group_tp` VARCHAR(2) NOT NULL COMMENT 'MA=Men,WO=Women,KD=Kids,HL=Home & Living' COLLATE 'latin1_swedish_ci',
	`groupTp` VARCHAR(14) NULL COLLATE 'utf8mb4_general_ci',
	`brand_id` VARCHAR(4) NOT NULL COLLATE 'utf8mb4_general_ci',
	`brand_name` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`profile_image` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`image` VARCHAR(1000) NOT NULL COLLATE 'latin1_swedish_ci',
	`size` VARCHAR(500) NULL COLLATE 'latin1_swedish_ci',
	`current_stock` INT(11) NOT NULL,
	`sales_price` DOUBLE NOT NULL,
	`discount_price` DOUBLE NOT NULL,
	`short_desc` MEDIUMTEXT NULL COLLATE 'latin1_swedish_ci',
	`description` LONGTEXT NULL COLLATE 'latin1_swedish_ci',
	`display` CHAR(1) NOT NULL COMMENT 'S=Show,H=Hide' COLLATE 'latin1_swedish_ci',
	`displayTp` VARCHAR(4) NULL COLLATE 'utf8mb4_general_ci',
	`created_by` VARCHAR(20) NOT NULL COLLATE 'latin1_swedish_ci',
	`created_at` TIMESTAMP NOT NULL
) ENGINE=MyISAM;


-- Dumping structure for view grand_choice.vw_item_group
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_item_group` (
	`id` TINYINT(4) NOT NULL,
	`group_name` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`group_tp` VARCHAR(2) NOT NULL COMMENT 'MA=Men,WO=Women,KD=Kids,HL=Home & Living' COLLATE 'latin1_swedish_ci',
	`groupTp` VARCHAR(14) NULL COLLATE 'utf8mb4_general_ci',
	`display` CHAR(1) NOT NULL COMMENT 'S=Show,H-Hide' COLLATE 'latin1_swedish_ci',
	`displayTp` VARCHAR(4) NULL COLLATE 'utf8mb4_general_ci',
	`created_by` VARCHAR(20) NOT NULL COLLATE 'latin1_swedish_ci',
	`created_at` TIMESTAMP NOT NULL
) ENGINE=MyISAM;


-- Dumping structure for view grand_choice.vw_slider
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_slider` (
	`id` INT(11) NOT NULL,
	`slider_title` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`slider_sub_title` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`image` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`display` CHAR(1) NOT NULL COMMENT 'S=Show,H=Hide' COLLATE 'latin1_swedish_ci',
	`displayTp` VARCHAR(4) NULL COLLATE 'utf8mb4_general_ci',
	`created_by` VARCHAR(20) NOT NULL COLLATE 'latin1_swedish_ci',
	`created_at` TIMESTAMP NOT NULL
) ENGINE=MyISAM;


-- Dumping structure for table grand_choice.website_visit
CREATE TABLE IF NOT EXISTS `website_visit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visit_date` date NOT NULL,
  `total_visitor` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table grand_choice.website_visit: ~2 rows (approximately)
/*!40000 ALTER TABLE `website_visit` DISABLE KEYS */;
INSERT INTO `website_visit` (`id`, `visit_date`, `total_visitor`, `created_at`) VALUES
	(2, '2017-08-19', 4, '2017-08-19 15:04:10'),
	(3, '2017-09-25', 4, '2017-09-25 14:21:29');
/*!40000 ALTER TABLE `website_visit` ENABLE KEYS */;


-- Dumping structure for view grand_choice.vw_branch_manager
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_branch_manager`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_branch_manager` AS SELECT bm.id,bm.manager_name,bm.image_url,bm.mobile,bm.email
,bm.display, IF(bm.display='S','Show','Hide') displayTp,bm.address,bm.created_by,bm.created_at
FROM branch_manager bm
ORDER BY bm.id ;


-- Dumping structure for view grand_choice.vw_brand
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_brand`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_brand` AS select `br`.`id` AS `id`,`br`.`brand_name` AS `brand_name`,`br`.`logo` AS `logo`,`br`.`display` AS `display`,(case `br`.`display` when 'S' then 'Show' when 'H' then 'Hide' end) AS `displayTp`,`br`.`created_by` AS `created_by`,`br`.`created_at` AS `created_at` from `brand` `br` ;


-- Dumping structure for view grand_choice.vw_contact_us
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_contact_us`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_contact_us` AS SELECT co.id,co.person_name,co.email,co.topic_tp
, CASE co.topic_tp WHEN 'GE' THEN 'General' WHEN 'SE' THEN 'Service' WHEN 'OR' THEN 'Orders' END AS 'topicTp'
,co.message,co.`read`, IF(co.`read`='U','Unread','Read') isRead, DATE_FORMAT(co.created_at,'%d-%b-%Y') sentDate
,co.created_at
FROM contact_us co
ORDER BY co.id ;


-- Dumping structure for view grand_choice.vw_event
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_event`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_event` AS SELECT id,event_name,profile_image,organize_date,DATE_FORMAT(organize_date,'%d %M %Y') organizeDate ,description
,display, CASE display WHEN 'S' THEN 'Show' WHEN 'H' THEN 'Hide' END AS displayTp
,created_by,DATE_FORMAT(created_at,'%d %M %Y') postDate,created_at
FROM `event`
ORDER BY id ;


-- Dumping structure for view grand_choice.vw_item
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_item`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_item` AS SELECT itm.id,itm.item_code,itm.item_name,itm.group_id,gr.group_name,gr.group_tp,gr.groupTp
, IFNULL(itm.brand_id,'0') brand_id, IFNULL(br.brand_name,'') brand_name
,itm.profile_image,itm.image,itm.size,itm.current_stock,itm.sales_price
,itm.discount_price,itm.short_desc,itm.description,itm.display
, CASE itm.display WHEN 'S' THEN 'Show' WHEN 'H' THEN 'Hide' END displayTp
,itm.created_by,itm.created_at
FROM item itm
JOIN vw_item_group gr ON gr.id=itm.group_id
LEFT JOIN vw_brand br ON br.id=itm.brand_id
ORDER BY itm.id ;


-- Dumping structure for view grand_choice.vw_item_group
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_item_group`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_item_group` AS select `itm`.`id` AS `id`,`itm`.`group_name` AS `group_name`,`itm`.`group_tp` AS `group_tp`
,(case `itm`.`group_tp` when 'MA' then 'Mens Fashion' when 'WO' then 'Womens Fashion' when 'KD' then 'Kids Fashion' when 'HL' then 'Home & Living' end) AS `groupTp`
,`itm`.`display` AS `display`,(case `itm`.`display` when 'S' then 'Show' when 'H' then 'Hide' end) AS `displayTp`,`itm`.`created_by` AS `created_by`,`itm`.`created_at` AS `created_at` from `item_group` `itm` ;


-- Dumping structure for view grand_choice.vw_slider
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_slider`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `vw_slider` AS select `sl`.`id` AS `id`,`sl`.`slider_title` AS `slider_title`,`sl`.`slider_sub_title` AS `slider_sub_title`,`sl`.`image` AS `image`,`sl`.`display` AS `display`,(case `sl`.`display` when 'S' then 'Show' when 'H' then 'Hide' end) AS `displayTp`,`sl`.`created_by` AS `created_by`,`sl`.`created_at` AS `created_at` from `slider` `sl` ;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
