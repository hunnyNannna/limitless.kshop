-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2023 at 07:54 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `limitlesskshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `profile_pic` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `prod_id` int(10) NOT NULL,
  `supp_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `profile_pic`, `fullname`, `email`, `username`, `password`, `prod_id`, `supp_id`) VALUES
(4, 'ryan.jpg', 'Wendy', 'admin@admin.com', 'wendy', 'wendy', 0, 0),
(6, '', 'johnnysuh', 'johnnynct123.yahoo.com', 'joh_to_nny', 'johnny123', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_desc` varchar(255) NOT NULL,
  `pic1` varchar(255) NOT NULL,
  `pic2` varchar(255) NOT NULL,
  `pic3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_id`, `user_id`, `action`, `date`) VALUES
(1, 1, 'added a new product 12 of flmjkrmklm', '2017-11-04 18:25:35'),
(2, 1, 'added a new product 34 of gdrgneknkl', '2017-11-04 18:26:04'),
(3, 1, 'added a new product 78 of bdkj', '2017-11-04 18:26:48'),
(4, 0, 'added a new product 133 of Arduino Meta', '2017-11-05 13:00:22'),
(5, 1, 'added a new product 477 of Sugo Peanuts', '2017-11-05 18:15:15'),
(6, 0, 'added a new product 123 of kmyygk', '2017-11-06 11:21:42'),
(7, 5, 'has logged in the system at ', '2017-11-06 21:53:21'),
(8, 1, '(Administrator) has logged in the system at ', '2017-11-06 21:56:17'),
(9, 5, 'has logged in the system at ', '2017-11-06 22:25:17'),
(10, 1, '(Administrator) has logged in the system at ', '2017-11-06 22:25:38'),
(11, 2, '(Administrator) has logged in the system at ', '2017-11-06 23:22:24'),
(12, 5, 'has logged in the system at ', '2017-11-07 00:08:10'),
(13, 1, '(Administrator) has logged in the system at ', '2017-11-07 10:14:23'),
(14, 1, '(Administrator) has logged in the system at ', '2017-11-07 10:33:43'),
(15, 1, '(Administrator) has logged in the system at ', '2017-11-07 10:36:37'),
(16, 1, '(Administrator) has logged in the system at ', '2017-11-07 10:39:08'),
(17, 1, '(Administrator) has logged in the system at ', '2017-11-07 10:39:41'),
(18, 4, 'has logged in the system at ', '2017-11-07 11:04:22'),
(19, 1, '(Administrator) has logged in the system at ', '2017-11-07 11:04:30'),
(20, 4, 'has logged in the system at ', '2017-11-07 11:44:36'),
(21, 4, 'has logged in the system at ', '2017-11-07 18:32:28'),
(22, 1, '(Administrator) has logged in the system at ', '2017-11-07 18:32:49'),
(23, 4, 'has logged in the system at ', '2017-11-07 18:34:55'),
(24, 1, '(Administrator) has logged in the system at ', '2017-11-07 18:39:23'),
(25, 1, 'added a new product 33 of San Marino Corned Tuna', '2017-11-07 18:40:25'),
(26, 1, 'added a new product 453 of 4535', '2017-11-07 18:43:34'),
(27, 1, '(Administrator) has logged in the system at ', '2017-11-07 19:16:29'),
(28, 1, '(Administrator) has logged in the system at ', '2017-11-07 19:17:07'),
(29, 4, 'has logged in the system at ', '2017-11-07 19:27:49'),
(30, 1, '(Administrator) has logged in the system at ', '2017-11-07 19:28:00'),
(31, 1, 'added 2 of Arduino Metad', '2017-11-07 19:28:43'),
(32, 1, '(Administrator) has logged in the system at ', '2017-11-07 22:40:11'),
(33, 1, 'added a new product 2 of 540 microfarad capacitor', '2017-11-07 22:42:03'),
(34, 1, '(Administrator) has logged in the system at ', '2017-11-07 23:43:49'),
(35, 4, 'has logged in the system at ', '2017-11-08 12:31:38'),
(36, 1, '(Administrator) has logged in the system at ', '2017-11-08 12:45:41'),
(37, 1, '(Administrator) has logged in the system at ', '2017-11-08 13:46:56'),
(38, 4, 'has logged in the system at ', '2017-11-08 13:56:15'),
(39, 4, 'has logged in the system at ', '2017-11-08 14:39:44'),
(40, 1, '(Administrator) has logged in the system at ', '2017-11-08 14:54:05'),
(41, 1, 'added 5 of 540 microfarad capacitor', '2017-11-08 15:04:55'),
(42, 4, 'has logged in the system at ', '2017-11-08 15:21:00'),
(43, 1, '(Administrator) has logged in the system at ', '2017-11-08 15:29:08'),
(44, 1, '(Administrator) has logged in the system at ', '2017-11-08 15:34:28'),
(45, 1, '(Administrator) has logged in the system at ', '2017-11-08 15:38:21'),
(46, 6, 'has logged in the system at ', '2017-11-08 19:29:55'),
(47, 1, '(Administrator) has logged in the system at ', '2017-11-08 19:32:24'),
(48, 6, 'has logged in the system at ', '2017-11-08 20:13:57'),
(49, 6, 'has logged in the system at ', '2017-11-08 20:20:43'),
(50, 1, '(Administrator) has logged in the system at ', '2017-11-08 20:46:23'),
(51, 6, 'has logged in the system at ', '2017-11-08 20:59:18'),
(52, 1, '(Administrator) has logged in the system at ', '2017-11-08 21:32:10'),
(53, 6, 'has logged in the system at ', '2017-11-08 21:34:41'),
(54, 1, '(Administrator) has logged in the system at ', '2017-11-08 21:39:31'),
(55, 1, 'added a new product 34 of Arduino Uno', '2017-11-08 21:40:51'),
(56, 6, 'has logged in the system at ', '2017-11-08 22:18:15'),
(57, 6, 'has logged in the system at ', '2017-11-08 22:19:58'),
(58, 1, '(Administrator) has logged in the system at ', '2017-11-08 22:56:12'),
(59, 6, 'has logged in the system at ', '2017-11-08 22:59:17'),
(60, 6, 'has logged in the system at ', '2017-11-09 15:21:55'),
(61, 6, 'has logged in the system at ', '2017-11-09 15:45:14'),
(62, 6, 'has logged in the system at ', '2017-11-09 15:46:39'),
(63, 6, 'has logged in the system at ', '2017-11-09 15:57:59'),
(64, 6, 'has logged in the system at ', '2017-11-09 16:34:47'),
(65, 6, 'has logged in the system at ', '2017-11-09 17:02:52'),
(66, 6, 'has logged in the system at ', '2017-11-09 19:54:15'),
(67, 6, 'has logged in the system at ', '2017-11-09 21:21:45'),
(68, 1, '(Administrator) has logged in the system at ', '2017-11-10 00:23:49'),
(69, 6, 'has logged in the system at ', '2017-11-10 00:24:25'),
(70, 1, '(Administrator) has logged in the system at ', '2017-11-10 00:54:01'),
(71, 6, 'has logged in the system at ', '2017-11-10 00:54:22'),
(72, 4, 'has logged in the system at ', '2017-11-10 01:38:17'),
(73, 6, 'has logged in the system at ', '2017-11-10 11:00:43'),
(74, 6, 'has logged in the system at ', '2017-11-10 23:53:20'),
(75, 6, 'has logged in the system at ', '2017-11-11 00:00:46'),
(76, 6, 'has logged in the system at ', '2017-11-11 00:10:29'),
(77, 6, 'has logged in the system at ', '2017-11-11 00:26:10'),
(78, 1, '(Administrator) has logged in the system at ', '2017-11-11 01:38:51'),
(79, 6, 'has logged in the system at ', '2017-11-12 01:36:32'),
(80, 6, 'has logged in the system at ', '2017-11-12 21:22:19'),
(81, 1, '(Administrator) has logged in the system at ', '2017-11-12 21:25:48'),
(82, 1, '(Administrator) has logged in the system at ', '2017-11-12 21:26:22'),
(83, 2, '(Administrator) has logged in the system at ', '2017-11-12 21:29:04'),
(84, 6, 'has logged in the system at ', '2017-11-12 21:45:12'),
(85, 2, '(Administrator) has logged in the system at ', '2017-11-12 21:47:14'),
(86, 6, 'has logged in the system at ', '2017-11-12 23:14:12'),
(87, 1, '(Administrator) has logged in the system at ', '2017-11-12 23:19:55'),
(88, 6, 'has logged in the system at ', '2017-11-12 23:22:32'),
(89, 6, 'has logged in the system at ', '2017-11-13 00:17:25'),
(90, 1, '(Administrator) has logged in the system at ', '2017-11-13 00:28:25'),
(91, 1, 'added a new product 150 of Arduino Uno Rec3-1', '2017-11-13 00:31:30'),
(92, 1, 'added a new product 400 of Aruino Mega', '2017-11-13 00:32:19'),
(93, 1, 'added a new product 344 of Arduino Uno 2', '2017-11-13 00:33:17'),
(94, 1, 'added a new product 234 of Raspberry Pi 3', '2017-11-13 00:34:22'),
(95, 1, 'added a new product 456 of Flame Sensor', '2017-11-13 00:35:28'),
(96, 6, 'has logged in the system at ', '2017-11-13 00:38:32'),
(97, 1, '(Administrator) has logged in the system at ', '2017-11-13 08:45:06'),
(98, 6, 'has logged in the system at ', '2017-11-13 08:47:34'),
(99, 1, '(Administrator) has logged in the system at ', '2017-11-13 08:53:46'),
(100, 7, 'has logged in the system at ', '2017-11-13 08:56:45'),
(101, 1, '(Administrator) has logged in the system at ', '2017-11-13 10:40:50'),
(102, 6, 'has logged in the system at ', '2017-11-13 10:42:37'),
(103, 1, '(Administrator) has logged in the system at ', '2017-11-13 10:55:02'),
(104, 6, 'has logged in the system at ', '2017-11-13 10:55:19'),
(105, 1, '(Administrator) has logged in the system at ', '2017-11-13 11:15:27'),
(106, 6, 'has logged in the system at ', '2017-11-13 11:15:38'),
(107, 1, '(Administrator) has logged in the system at ', '2017-11-13 11:31:48'),
(108, 6, 'has logged in the system at ', '2017-11-13 11:55:12'),
(109, 1, '(Administrator) has logged in the system at ', '2017-11-13 11:57:27'),
(110, 6, 'has logged in the system at ', '2017-11-13 11:59:22'),
(111, 1, '(Administrator) has logged in the system at ', '2017-11-13 12:00:16'),
(112, 6, 'has logged in the system at ', '2017-11-13 12:04:41'),
(113, 8, 'has logged in the system at ', '2017-11-13 13:05:00'),
(114, 2, '(Administrator) has logged in the system at ', '2017-11-13 13:16:17'),
(115, 2, 'added a new product 700 of Sensor', '2017-11-13 13:20:38'),
(116, 2, 'added 900 of Arduino Uno 2', '2017-11-13 13:20:57'),
(117, 6, 'has logged in the system at ', '2017-11-13 19:58:52'),
(118, 8, 'has logged in the system at ', '2017-11-13 20:00:59'),
(119, 1, '(Administrator) has logged in the system at ', '2017-11-13 20:01:58'),
(120, 1, '(Administrator) has logged in the system at ', '2017-11-13 21:47:41'),
(121, 6, 'has logged in the system at ', '2017-11-13 21:49:55'),
(122, 1, '(Administrator) has logged in the system at ', '2017-11-13 21:52:28'),
(123, 1, '(Administrator) has logged in the system at ', '2017-11-14 16:01:08'),
(124, 6, 'has logged in the system at ', '2017-11-17 01:43:42'),
(125, 6, 'has logged in the system at ', '2017-11-17 02:15:46'),
(126, 8, 'has logged in the system at ', '2017-11-21 20:19:39'),
(127, 8, 'has logged in the system at ', '2017-11-25 23:31:53'),
(128, 9, 'has logged in the system at ', '2018-10-12 19:52:39'),
(129, 9, 'has logged in the system at ', '2018-10-13 01:18:49'),
(130, 9, 'added a new product 26 of X9 THOR - Gaming Mouse', '2018-10-13 01:32:00'),
(131, 9, 'has logged in the system at ', '2018-10-13 01:50:19'),
(132, 9, 'has logged in the system at ', '2023-01-26 12:17:38'),
(133, 9, 'has logged in the system at ', '2023-02-01 22:18:52'),
(134, 9, 'has logged in the system at ', '2023-02-02 10:51:31'),
(135, 9, 'has logged in the system at ', '2023-02-03 11:42:03'),
(136, 4, 'has logged in the system at ', '0000-00-00 00:00:00'),
(137, 9, 'has logged in the system at ', '2023-02-05 03:51:14'),
(138, 9, 'has logged in the system at ', '2023-02-16 10:52:04'),
(139, 9, 'has logged in the system at ', '2023-02-17 15:11:59'),
(140, 5, 'has logged in the system at ', '0000-00-00 00:00:00'),
(141, 6, 'has logged in the system at ', '0000-00-00 00:00:00'),
(142, 7, 'has logged in the system at ', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `track_num` varchar(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneno` varchar(50) NOT NULL,
  `shipping_add` varchar(500) NOT NULL,
  `order_date` datetime NOT NULL,
  `prod_status` varchar(100) NOT NULL,
  `totalprice` decimal(10,2) NOT NULL,
  `shipprice` decimal(10,2) NOT NULL,
  `paymethod` varchar(50) NOT NULL,
  `or_no` varchar(50) NOT NULL,
  `proof` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `track_num`, `fullname`, `email`, `phoneno`, `shipping_add`, `order_date`, `prod_status`, `totalprice`, `shipprice`, `paymethod`, `or_no`, `proof`) VALUES
(92, 9, '78990', 'Harry', 'harryden@mail.com', '9876543210', '39, Bota, 32600 Perak City', '2023-02-17 16:37:04', 'Order Submitted', '15.00', '22.00', 'Shopee Pay', 'LK1000AB9', ''),
(93, 9, 'LR12345ME12', 'Harry', 'harryden@mail.com', '9876543210', '39, Bota, 32600 Perak City', '2023-02-17 16:40:44', 'Order Submitted', '0.00', '7.00', 'Shopee Pay', 'LK1000AB9', 'backg.jpg'),
(98, 9, '0', 'Harry', 'harryden@mail.com', '9876543210', '39, Bota, 32600 Selangor City', '2023-02-17 17:09:06', 'Order Submitted', '6.00', '13.00', 'TnG E-Wallet', 'LK1000AB9', 'backg.jpg'),
(99, 9, '0', 'Harry', 'harryden@mail.com', '9876543210', '39, Bota, 32600 Selangor City', '2023-02-17 17:10:08', 'Pending', '45.00', '52.00', 'Online Banking', 'LK1000AB9', 'apple-icon.png'),
(100, 9, '0', 'Harry', 'harryden@mail.com', '9876543210', 'd Pulau Pinang City', '2023-02-17 17:12:57', 'Pending', '15.00', '22.00', 'Online Banking', 'LK1000AB9', ''),
(104, 9, '0', 'Harry', 'harryden@mail.com', '9876543210', '39, Bota, 32600 Perak City', '2023-02-18 01:28:34', 'Pending', '15.00', '22.00', 'Online Banking', 'LK1000AB9', ''),
(105, 9, '0', 'Harry', 'harryden@mail.com', '9876543210', '39, Bota, 32600 Perak City', '2023-02-18 01:30:49', 'Pending', '0.00', '7.00', 'Online Banking', 'LK1000AB9', ''),
(106, 9, '0', 'Harry', 'harryden@mail.com', '9876543210', '39, Bota, 32600 Perak City', '2023-02-18 01:31:15', 'Pending', '15.00', '22.00', 'Online Banking', 'LK1000AB9', ''),
(107, 9, '0', 'Harry', 'harryden@mail.com', '9876543210', 'mm Perak City', '2023-02-18 01:35:00', 'Order Submitted', '15.00', '22.00', 'Shopee Pay', 'LK1000AB9', 'backg.jpg'),
(108, 9, '0', 'Harry', 'harryden@mail.com', '9876543210', 'mm Perak City', '2023-02-18 01:36:34', 'Pending', '0.00', '7.00', 'Shopee Pay', 'LK1000AB9', ''),
(109, 9, '0', 'Harry', 'harryden@mail.com', '9876543210', '39, Bota, 32600 Perak City', '2023-02-18 01:37:10', 'Order Submitted', '60.00', '67.00', 'Online Banking', 'LK1000AB9', 'apple-icon.png');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `total_qty` varchar(30) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `prod_id`, `prod_qty`, `total_qty`, `total`, `user_id`, `order_id`) VALUES
(144, 35, 1, '7', '15.00', 9, 100),
(145, 33, 1, '22', '15.00', 9, 101),
(146, 33, 1, '21', '15.00', 9, 102),
(147, 35, 1, '5', '15.00', 9, 103),
(148, 33, 1, '20', '15.00', 9, 104),
(149, 33, 1, '19', '15.00', 9, 106),
(150, 33, 1, '18', '15.00', 9, 107),
(151, 33, 4, '14', '60.00', 9, 109);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `payment` decimal(10,2) NOT NULL,
  `payment_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `due` decimal(10,2) NOT NULL,
  `status` varchar(50) NOT NULL,
  `or_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(20) NOT NULL,
  `prod_name` varchar(95) DEFAULT NULL,
  `prod_desc` varchar(870) DEFAULT NULL,
  `prod_qty` int(2) DEFAULT NULL,
  `prod_cost` int(3) DEFAULT NULL,
  `prod_price` int(3) DEFAULT NULL,
  `category` varchar(16) DEFAULT NULL,
  `supplier` varchar(50) DEFAULT NULL,
  `prod_sku` varchar(16) DEFAULT NULL,
  `prod_pic1` varchar(20) DEFAULT NULL,
  `prod_pic2` varchar(20) DEFAULT NULL,
  `prod_pic3` varchar(20) DEFAULT NULL,
  `prod_pic4` varchar(20) DEFAULT NULL,
  `prod_pic5` varchar(17) DEFAULT NULL,
  `prod_pic6` varchar(17) DEFAULT NULL,
  `supp_id` int(20) NOT NULL,
  `admin_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `prod_desc`, `prod_qty`, `prod_cost`, `prod_price`, `category`, `supplier`, `prod_sku`, `prod_pic1`, `prod_pic2`, `prod_pic3`, `prod_pic4`, `prod_pic5`, `prod_pic6`, `supp_id`, `admin_id`) VALUES
(11, 'Astro - 3rd Full Album Drive to the Starry Road', 'ASTRO\'S 3RD FULL ALBUM - DRIVE TO THE STARRY ROAD <br>\n[ drive ver. / starry ver. / road ver. ]\n<br><br> \n\nFirst press only? <br>\nsuper limited, first come first serve <br>\n- 1 poster (folded)<br><br>\n\nDrive version : <br>\n- 1 cover <br>\n- 1 photo book (88p)<br>\n- 1 cd-r (random 1 out of 6) <br>\n- 1 envelope <br>\n- 1 post card <br>\n- 2 photo card (random 2 out of 24)<br>\n- 1 folding post card <br><br>\n \nStarry version : <br>\n- 1 cover <br>\n- 1 photo book <br>\n', 23, 87, 89, 'Boygroup Album', 'KTown4u', '1122330099', 'boygroup1.jpg', 'boygroup2.jpg', 'boygroup3.png', 'boygroup4.png', '', '', 1, 0),
(12, 'ATEEZ - Zero Fever Part 3.', 'ATEEZ\'S ALBUM - ZERO : FEVER PART.3 <br>\n[ A ver. / DIARY ver. / Z ver. ]<br><br>\n\nFirst press only? <br>\nsuper limited, first come first serve <br>\n- 1 poster (by version) <br>\n- 1 photo card (randomly included in a few limited packages) <br>\n- 1 polaroid (randomly included in a few limted packages) <br><br>\n\nPackage for each version : <br>\n- 1 out box <br>\n- 1 photo booklet (96p) <br>\n- 1 disc <br>\n- 1 sticker <br>\n- 1 postcard set (8ea)<br>\n- 1 photo card (random 1 out of 16)<br>', 0, 87, 89, 'Boygroup Album', 'KTown4u', '341156780', '1boygroup1.jpg', '1boygroup2.jpg', '1boygroup3.jpg', '1boygroup4.jpg', '', '', 1, 0),
(13, 'BTS - Album Proof', 'BTS\' ANTHOLOGY ALBUM - PROOF <br>\n[ standard edition / compact edition ] <br> <br>\n\nContents of standard edition : <br>\n- 1 out sleeve <br>\n- 1 outer box <br>\n- 1 the art of proof (132p) <br>\n- 1 photograph (104p) <br>\n- 1 epilogue (80p) <br>\n- 1 lyrics (44p) <br>\n- 1 cd plate <br>\n- 3 cd <br>\n- 1 photo card a set (7ea) <br>\n- 1 photo card b (random 1 out of 8) <br>\n- 1 postcard (random 1 out of 8) <br>\n- first press only: 1 poster (folded) <br>super limited, first come first serve <br> <br>\n\nContents of compact edition : <br>\n- 1 outer sleeve <br>\n- 1 booklet (80p) <br>\n- 1 cd plate <br>\n- 3 cd <br>\n- 1 photo card (random 1 out of 7) <br>\n- 1 postcard (random 1 out of 8) <br>\n- 1 mini poster (folded, on pack) <br>\n- 1 discography guide <br>', 14, 109, 119, 'Boygroup Album', 'KTown4u', '45422791', '2boygroup1.png', '2boygroup2.jpg', '2boygroup3.jpg', '2boygroup4.jpg', '2boygroup5.jpg', '', 1, 0),
(14, 'Kang Daniel - Retold 1st Full Album Repackage', 'KANG DANIEL - RETOLD 1ST FULL ALBUM REPACKAGE<br>\n[on ver. / off ver.]\n<br><br>\nPre-order onlyㅣsuper limited, first come first serve <br>\n- 1 photocard (on pack, by version) <br>\n<br><br>\nFirst press onlyㅣsuper limited, first come first serve<br>\n- 1 folded poster (by version) \n<br><br>\nContents for each version : <br>\n- 1 box package<br>\n- 1 photobook<br>\n- 1 cd-r<br>\n- 1 lyrics-paper<br>\n- 1 postcard<br>\n- 1 advent calender<br>\n- 2 photo card (random 2 out of 12) <br>\n- 1 seal sticker', 0, 149, 160, 'Solo Album', 'KTown4u', '456523702', 'solo1-1.png', 'solo1-2.jpg', '', '', '', '', 1, 0),
(15, 'Highlight - After Sunset 4th Mini Album', 'HIGHLIGHT - AFTER SUNSET 4TH MINI ALBUM<br>\n[ night ver. / midnight ver. / dawn ver. ] <br><br>\n\nFirst press onlyㅣsuper limited, first come first serve\n- 1 poster (folded, by version) <br><br>\n\nContents for each version : <br>\n- 1 booklet (72p) <br>\n- 1 cd-r<br>\n- 1 folding poster (random 1 out of 4) <br>\n- 1 post card (random 1 out of 4) <br>\n- 1 film photo (random 1 out of 4) <br>\n- 1 photo card (random 1 out of 16) <br>\n- 1 sticker<br>', 40, 87, 89, 'Boygroup Album', 'KTown4u', '890', 'boygroup3-1.png', 'boygroup3-2.jpg', 'boygroup3-3.png', '', '', '', 1, 0),
(16, 'The Boyz - 7th Mini Album Be Aware', 'THE BOYZ\'S 7TH MINI ALBUM - BE AWARE <br>\n[denial ver. / desire ver. / document ver.] <br> <br>\n\n\nFirst press onlyㅣsuper limited, first come first serve <br>\n- 1 poster (on pack, by version, random 1 out of 11*including group photo) <br>\n- 2 digital photo (on pack, by version, random 2 out of 20) <br>\n- 1 film photocard (on pack, random 1 out of 10) <br>\n- 1 selfie photocard (on pack, random 1 out of 20) <br> <br>\nContents for each version : <br>\n- 1 photo book (72p) <br>\n- 1 lyric paper <br>\n- 1 cd-r <br>\n- 1 emotion photocard (random 1 out of 10) <br>\n- 2 selfie photocard (random 2 out of 30) <br>\n', 15, 79, 89, 'Boygroup Album', 'KTown4u', '54689723', 'boygroup4-1.png', 'boygroup4-2.jpg', 'boygroup4-3.jpg', 'boygroup4-4.jpg', '', '', 1, 0),
(17, 'Nct 127 - 4th Full Album 질주 2 Baddies Photobook Ver', 'NCT 127\'S 4TH FULL ALBUM - 질주(2 BADDIES) (PHOTOBOOK VER.) <br>\n[ Faster Ver. / 2 Baddies Ver. ] <br> <br>\n\nFirst Press Onlyㅣsuper Limited, First Come First Serve <br>\n- 1 Poster (Folded) <br> <br>\n\nContents For Each Version : <br>\n- 1 Cover <br>\n- 1 Booklet (96p) <br>\n- 1 Cd-R <br>\n- 1 Postcard (Random 1 Out Of 9) <br>\n- 1 Sticker <br>\n- 1 Folding Poster <br>\n- 1 Photo Card (Random 1 Out Of 9) <br>\n- 1 Photo Card Kr Ver. (Random 1 Out Of 9) ', 5, 87, 89, 'Boygroup Album', 'KTown4u', '890123', 'boygroup5-1.jpg', '', '', '', '', '', 1, 0),
(18, 'NCT 127 The 4th Album ‘2 Baddies’ (Digipack Ver.)', 'NCT 127\'S 4TH FULL ALBUM - 질주(2 BADDIES) (DIGIPACK VER.) <br><br>\n\nCover<br>\n- 1 ea (Random out of 9 member version) <br><br>\n\nPhoto Book<br>\n- 1ea (Matching Cover) <br><br>\n\nFolded Poster<br>\n- 1ea (Matching Cover) <br>\n\nPhoto Card<br>\n- 1ea (Random out of 9) <br><br>\n\nPhoto Card (US Ver,) <br>\n- 1ea (Random out of 9)', 0, 66, 68, 'Boygroup Album', 'KTown4u', '980', '', '', '', '', '', '', 1, 0),
(19, 'Pre-Order - CHEN The 3rd Mini Album ‘사라지고 있어 (Last Scene)\' (Photo Book Ver.) + Special Postcard', 'PRE-ORDER - CHEN THE 3RD MINI ALBUM ‘사라지고 있어 (LAST SCENE)\' (PHOTOBOOK VER.) + SPECIAL POSTCARD <br><br>\n\nCover<br>\n- 1ea (Random out of 2) <br><br>\n\nBooklet (104p) <br>\n- Different for each version\n<br><br>\nPostcard<br>\n- 1ea (1 for each version) <br><br>\n\nPhotocard<br><br>\n- 1ea (Random out of 3 for each version) <br><br>\n\nSGS Special Postcard<br>\n- 1ea\n\nPRE-ORDER - CHEN THE 3RD MINI ALBUM ‘사라지고 있어 (LAST SCENE)\' (PHOTOBOOK VER.) + SPECIAL POSTCARD <br><br>\n\nCover<br>\n- 1ea (Random out of 2) <br><br>\n\nBooklet (104p) <br>\n- Different for each version\n<br><br>\nPostcard<br>\n- 1ea (1 for each version) <br><br>\n\nPhotocard<br><br>\n- 1ea (Random out of 3 for each version) <br><br>\n\nSGS Special Postcard<br>\n- 1ea', 38, 89, 89, 'Solo Album', 'KTown4u', '8.81E+12', 'solo2-1.png', 'solo2-2.jpg', 'solo2-3.jpg', 'solo2-4.jpg', 'solo2-5.jpg', '', 1, 0),
(20, 'Pre-Order - CHEN The 3rd Mini Album ‘사라지고 있어 (Last Scene)\' (Digipack Ver.) + Special Postcard', 'PRE-ORDER - CHEN THE 3RD MINI ALBUM ‘사라지고 있어 (LAST SCENE)\' (DIGIPACK VER.) + SPECIAL POSTCARD <br><br>\n\nCover<br>\n- 1ea (Random out of 2) <br><br>\n\nBooklet (104p) <br>\n- 1 version\n<br><br> \n\nPhotocard<br><br>\n- 1ea (Random out of 3) <br><br>\n\nSGS Special Postcard<br>\n- 1ea', 40, 66, 68, 'Solo Album', 'KTown4u', '8.81E+12', 'solo2-6.png', 'solo2-7.jpg', 'solo2-8.jpg', '', '', '', 1, 0),
(21, 'XIUMIN The 1st Mini Album \'Brand New\' (Photo Book Ver.)', 'XIUMIN THE 1ST MINI ALBUM \'BRAND NEW\' (PHOTOBOOK VER.)<br><br>\n\nCover<br>\n- 1ea (Random out of 2) <br><br>\n\nBooklet (96p) <br>\n- Different for each version<br><br>\n\nPhoto Card<br>\n- 1ea (random out of 3) <br><br>\n\nPostcard<br>\n- 1ea (Random out of 2 for each version) <br><br>\n\nSticker<br>\n- 1ea (Random out of 1 for each version)', 40, 89, 89, 'Solo Album', 'KTown4u', '8.81E+12', 'solo3-5.jpg', '', '', '', '', '', 1, 0),
(22, 'XIUMIN The 1st Mini Album \'Brand New\' (Digipack Ver.)', 'XIUMIN THE 1ST MINI ALBUM \'BRAND NEW\' (DIGIPACK VER.)<br><br>\n\nCover<br>\n- 1ea (1 version) <br><br>\n\nBooklet (28p) <br><br>\n\nPhoto Card<br>\n- 1ea (Random out of 3) <br><br>\n\nFolding Poster<br>\n- 1ea (Random out of 2)', 10, 66, 68, 'Solo Album', 'KTown4u', '6780012', 'solo3-1.avif', 'solo3-2.avif', 'solo3-3.avif', 'solo3-4.avif', '', '', 1, 0),
(23, 'Stray Kids - Maxident 7th Mini Album (Case Ver.)', 'STRAY KIDS - MAXIDENT 7TH MINI ALBUM (CASE VER.) <br>\n[ bang chan ver. / lee know ver. / changbin ver. / hyunjin ver. / han ver. / felix ver. / seungmin ver. / i.n ver. ] <br> <br>\n\nFirst press onlyㅣsuper limited, first come first serve <br>\n- 1 unit mini folded poster (random 1 out of 4) <br> <br>\n\nPre order onlyㅣsuper limited, first come first serve <br>\n- 1 exclusive photocard (random 1 out of 8) <br> <br>\n\nContents for each version : <br>\n- 1 paper case <br>\n- 1 photo book (24p) <br>\n- 1 cd-r <br>\n- 1 lyrics paper <br>\n- 1 photocard (random 1 out of 8)', 10, 54, 56, 'Boygroup Album', 'KTown4u', '1123334509', 'boygroup6-1.jpg', 'boygroup6-2.jpg', 'boygroup6-3.jfif', 'boygroup6-4.jfif', 'boygroup6-5.jfif', '', 1, 0),
(24, 'Stray Kids - Holiday Special Single Christmas Evel (Limited Ver.)', 'STRAY KIDS - HOLIDAY SPECIAL SINGLE CHRISTMAS EVEL (LIMITED VER.) <br><br>\n\nPre-order special giftㅣsuper limited, first come first serve<br>\n- 1 hologram photo card (random 1 out of 8) <br><br>\n \nPre-order onlyㅣsuper limited, first come first serve<br>\n- 1 folded poster (random 1 out of 2) <br>\n- 1 photo card set (8ea) <br><br>\n\nPackage : <br>\n- 1 photo book (60p) <br>\n- 1 cd-r<br>\n- 1 photo card (random 1 out of 16) <br>\n- 1 glitter photo card (random 1 out of 8) <br>\n- 1 sticker<br>\n- 1 christmas sealㅣlimited ver. Only<br>\n- 1 christmas cardㅣlimited ver. Only<br>', 11, 98, 109, 'Boygroup Album', 'KTown4u', '1124334509', 'boygroup7-1.jfif', 'boygroup7-2.jfif', 'boygroup7-3.jpg', '', '', '', 1, 0),
(25, 'Treasure - 2nd Mini Album The Second Step Chapter Two (Photobook Ver.)', 'TREASURE - 2ND MINI ALBUM THE SECOND STEP CHAPTER TWO (PHOTOBOOK VER.) <br> \n[ deep blue ver. / light green ver. ] <br><br>\n\nFirst press onlyㅣsuper limited, first come first serve<br>\n- 1 unit selfie photocard (random 1 out of 5, on pack) <br>\n- 1 rare find treasure card (on pack)ㅣrandomly included in only 20 limited packages<br>\n- 1 unit large postcard (random 1 out of 3) <br>\n- 1 double-sided poster (folded) <br><br>\n\nContents for each version : <br>\n- 1 sleeve<br>\n- 1 photobook (150p) <br>\n- 1 cd<br>\n- 1 photocard (random 1 out of 13) <br>\n- 2 selfie photocard (random 2 out of 20) <br>\n- 1 postcard (random 1 out of 10) <br>\n- 1 sticker', 14, 85, 89, 'Boygroup Album', 'KTown4u', '890045', 'boygroup8-1.jfif', 'boygroup8-2.png', 'boygroup8-3.jfif', 'boygroup8-4.jfif', '', '', 1, 0),
(26, 'Aespa - 2nd Mini Album Girls', 'AESPA - 2ND MINI ALBUM GIRLS <br>\n[ Kwangya ver., real world ver.  ] <br><br>\n\nFirst press onlyㅣsuper limited, first come first serve<br>\n- 1 poster (random 1 out of 2, folded) <br><br>\n\nContents : <br>\n- 1 cover<br>\n- 1 photo book (72p) <br>\n- 1 cd-r<br>\n- 1 sticker<br>\n- 1 folded poster (random 1 out of 4) <br>\n- 1 character card (random 1 out of 4) <br>\n- 1 photo card (random 1 out of 4)', 0, 85, 89, 'Girlgroup Album', 'KTown4u', '345667', 'girlgroup1-1.png', 'girlgroup1-2.png', 'girlgroup1-3.jfif', 'girlgroup1-4.jpeg', '', '', 1, 0),
(27, 'Aespa - 2nd Mini Album Girls (Digipack ver.)', 'AESPA\'S 2ND MINI ALBUM – GIRLS<br>\n[ Digipack ver. ] <br><br>\n\nFirst press onlyㅣsuper limited, first come first serve<br>\n- 1 poster (random 1 out of 2, folded) <br><br>\n\nContents for each version : <br>\n- 1 cover (random 1 out of 5) <br>\n- 1 photo book (24p) <br>\n- 1 cd-r<br>\n- 1 folded poster (random 1 out of 4) <br>\n- 1 photo card (random 1 out of 4)', 0, 66, 68, 'Girlgroup Album', 'KTown4u', ' 8809755509620', 'girlgroup1-5.jpg', 'girlgroup1-6.png', 'girlgroup1-7.png', 'girlgroup1-8.png', 'girlgroup1-9.png', 'girlgroup1-10.png', 1, 0),
(28, 'Blackpink - 2nd Full Album Born Pink Box Set Ver.', 'BLACKPINK - 2ND FULL ALBUM BORN PINK BOX SET VER.<br>\n[ Pink ver. / black ver. / gray ver.] <br><br>\n\nFirst press onlyㅣsuper limited, first come first serve<br>\n- 1 sticker (by version) <br>\n- 1 poster (by version, folded) <br><br>\nContents for each version : <br>\n- 1 package box<br>\n- 1 cd<br>\n- 1 photobook (80p) <br>\n- 1 envelope<br>\n- 1 accordion lyrics paper<br>\n- 1 large photocard (random 1 out of 4) <br>\n- 1 postcard (random 1 out of 4) <br>\n- 2 instant films (random 2 out of 8) <br>\n- 1 selfie photocard (random 1 out of 8)', 1, 94, 98, 'Girlgroup Album', 'KTown4u', 'EXAL024', 'girlgroup2-1.jpg', 'girlgroup2-2.jpg', 'girlgroup2-3.jpg', 'girlgroup2-4.jpg', 'girlgroup2-5.jpg', 'girlgroup2-6.jpg', 1, 0),
(29, 'Itzy - Cheshire Mini Album Standard ', 'ITZY - CHESHIRE MINI ALBUM STANDARD <br>\n[ Version 1 / version 2 / version 3] <br> <br>\n\nPre-order onlyㅣsuper limited, first come first serve <br>\n- 1 clear photocard (random 1 out of 5 *same image with limited ver.) <br>\n- 1 photo cube <br>\n- 1 poster (folded, by version) <br> <br>\n\nContents for version : <br>\n- 1 photobook (64p) <br>\n- 2 photocard (random 2 out of 30) <br>\n- 1 cd-r <br>\n- 1 lyric paper <br>\n- 1 neon photocard (random 1 out of 5) <br>\n- 1 4-cut film (random 1 out of 5)', 50, 85, 89, 'Girlgroup Album', 'KTown4u', 'ITZY5THALLE', 'girlgroup3-1.jpg', 'girlgroup3-2.jpg', '', '', '', '', 1, 0),
(30, 'Blackpink - Official Light Stick Ver.2 Renewal Edition ', 'BLACKPINK - OFFICIAL LIGHT STICK VER.2 RENEWAL EDITION <br> <br>\n\nSpecial pre-order giftㅣsuper limited, first come first serve <br>\n- 2 undisclosed photo card (random 2 out of 8) per light stick <br> <br>\n\nComponents : <br>\n- 1 box package <br>\n163*268*95mm <br>\n- 1 official light stick ver.2 renewal ver. <br> <br>\nAbs, pc, silicone / 155*87*253mm <br>\n- 1 strap <br>\n- 1 quick guide <br>\n** cradle is not included. <br> <br>\n\nBattery is not included <br>\n100% authentic YG md <br>\nLimited stock available', 0, 318, 325, 'Lightstick', 'KTown4u', 'SMAC077', 'lightstick1-1.jpg', 'lightstick1-1.jpg', '', '', '', '', 1, 0),
(31, 'Twice - Official Light Stick [Candybong Z] ', 'TWICE - OFFICIAL LIGHT STICK [CANDYBONG Z] <br> <br>\n\nPackage : <br>\n- 1 out box <br>\n- 1 light stick <br>\n- 1 strap <br>\n- 1 warranty <br> <br>\n\nMaterial: pvc <br>\nSize: 111 x 264 x 52 mm <br>\nBattery is not included', 0, 295, 298, 'Lightstick', 'KTown4u', 'SMAC079', 'lightstick2-1.jpg', 'lightstick2-2.jpg', 'lightstick2-3.jfif', '', '', '', 1, 0),
(32, 'Ateez - Official Light Stick Ver.2 ', 'ATEEZ - OFFICIAL LIGHT STICK VER.2 <br><br>\n\nPackage : <br>\n- 1 out box<br>\n- 1 light stick<br>\n- 1 strap<br>\n- 1 user manual<br><br>\n\nBattery is not included<br>\n\nLimited stock available', 1, 168, 173, 'Lightstick', 'KTown4u', 'SMSTWH026M', 'lightstick3-1.jpg', '', '', '', '', '', 1, 0),
(33, 'Acrylic Keychain ', '[UNOFFICIAL] Acrylic Keychain <br><br>\n\nMaterial: PVC<br>\nSize: about 10cm', 14, 15, 15, 'Non-Official', '', '', 'keychain1.jfif', 'keychain2.jfif', 'keychain3.jfif', 'keychain4.jfif', 'keychain5.jfif', '', 0, 0),
(34, 'HD Photocard', '[UNOFFICIAL] HD Photocard <br><br>\n\nMaterial: high quality glossy pvc card<br>\nSize: 86mm x 54mm<br>\nThickness: 0.76mm<br>\nError range: 0.5cm<br>\nWaterproof PVC card', 27, 6, 6, 'Non-Official', '', '', 'pc.jfif', '', '', '', '', '', 0, 0),
(35, 'Photocard PC Binder ', '[UNOFFICIAL] Photocard PC Binder <br><br>\n\nMaterial: pvc<br>\nSize album: 11.5cm x 8.5cm<br>\nSize pocket: 6 x 9cm<br>\nEach binder can hold 32pcs cards (back to back)', 5, 15, 15, 'Non-Official', '', '', 'binder.jfif', '', '', '', '', '', 0, 0),
(36, 'NCT \'Resonance\' Long Sleeve T-Shirt (Future Ver.)', 'NCT \'Resonance\' Logo printed tie dye long sleeve T-shirt.', 0, 178, 199, 'Sweatshirt', 'SMTown & Store', 'NCLTOR015S', 'sweatshirt1.avif', '', '', '', '', '', 2, 0),
(37, 'Seventeen - In The Soop Official Md Clothes', '', 0, 275, 289, 'Sweatshirt', 'Weverse', 'EXLTBK010S', 'sweatshirt2-1-1.jfif', 'sweatshirt2-1-2.jfif', 'sweatshirt2-1-3.jfif', 'sweatshirt2-1-4.jfif', 'sweatshirt2-1.png', '', 5, 0),
(38, 'Pre-Order - [Wayv] 2023 Season\'s Greetings', 'Pre-Order - [WayV] 2023 SEASON\'S GREETINGS<br>\n\n1. Package: 215 X 311 X 53 mm<br>\n2. Desk Calendar: 170 X 230 mm / 14p<br>\n3. Hard Cover Diary: 174 X 233 mm / 120p<br>\n4. Postcard Set<br>\n-Envelope: 130 X 180 mm / 1pc<br>\n-Postcard: 102 X 160 mm / 13pcs<br>\n5. Folded Poster Set: 287 X 400 mm / 2pcs<br>\n6. Sticker Set (Photo & Handwriting): 200 X 287 mm / 2pcs<br>\n7. A4 Poster Set: 200 X 287 mm / 12pcs<br>\n8. Mini Brochure: 174 X 233 mm / 16p<br>\n9. Photo Card Pack<br>\n-Clear Photo Card (예절 포토카드): 55 X 85 mm / 6pcs<br>\n-Photo Card: 55 X 85 mm / 6pcs<br>\n10. 4 Cut Photo Sticker: 50 X 150 mm / 6pcs<br>\n11. Trading Card SET Fortune Ver. <br>\n-Trading Card: 55 X 85 mm / 12pcs<br>\n-Photo Card: 55 X 85 mm / 12pcs<br>\n12. SGS Special Gift<br>\n- Photocard 1 Set (1pc per member) + Special Photocards 1 Set (1pc per member)', 0, 178, 189, 'Season Greeting', 'SMTown & Store', 'NCLTOR015S', 'sg1-1.jpg', 'sg1-2.jfif', '', '', '', '', 2, 0),
(39, 'Pre-Order - [Nct Dream] 2023 Season\'s Greetings', 'Pre-Order - [NCT DREAM] 2023 SEASON\'S GREETINGS <br><br>\n\n1. Package: 215 X 311 X 53 mm<br>\n2. Desk Calendar: 170 X 230 mm / 14p<br>\n3. Hard Cover Diary: 174 X 233 mm / 120p<br>\n4. Postcard Set<br>\n-Envelope: 130 X 180 mm / 1pc<br>\n-Postcard: 102 X 160 mm / 13pcs<br>\n5. Folded Poster Set: 287 X 400 mm / 2pcs<br>\n6. Sticker Set (Photo & Handwriting): 200 X 287 mm / 2pcs<br>\n7. A4 Poster Set: 200 X 287 mm / 13pcs<br>\n8. Mini Brochure: 174 X 233 mm / 16p<br>\n9. Photo Card Pack<br>\n-Clear Photo Card (예절 포토카드): 55 X 85 mm / 9pcs<br>\n-Photo Card: 55 X 85 mm / 9pcs<br>\n10. 4 Cut Photo Sticker: 50 X 150 mm / 9pcs<br>\n11. NCT 127 Adventure SET<br>\n-NCT 127 World Map: 200 X 286 mm / 1pc<br>\n-Captain License Note: 87 X 125 mm / 1pc<br>\n-Ticket: 55 X 85 mm / 9pcs<br>\n\n12. SGS Special Gift<br>\n- Photocard 1 Set (1pc per member) + Special Photocards 1 Set (1pc per member)', 0, 178, 189, 'Season Greeting', 'SMTown & Store', 'NC120898', 'sg2-1.jfif', 'sg2-2.jpg', '', '', '', '', 2, 0),
(40, 'Pre-Order - [Nct 127] 2023 Season\'s Greetings', 'Pre-Order - [NCT 127] 2023 SEASON\'S GREETINGS<br>\n\n1. Package: 215 X 311 X 53 mm<br>\n2. Desk Calendar: 170 X 230 mm / 14p<br>\n3. Hard Cover Diary: 174 X 233 mm / 120p<br>\n4. Postcard Set<br>\n-Envelope: 130 X 180 mm / 1pc<br>\n-Postcard: 102 X 160 mm / 13pcs<br>\n5. Folded Poster Set: 287 X 400 mm / 2pcs<br>\n6. Sticker Set (Photo & Handwriting): 200 X 287 mm / 2pcs<br>\n7. A4 Poster Set: 200 X 287 mm / 13pcs<br>\n8. Mini Brochure: 174 X 233 mm / 16p<br>\n9. Photo Card Pack<br>\n-Clear Photo Card (예절 포토카드): 55 X 85 mm / 9pcs<br>\n-Photo Card: 55 X 85 mm / 9pcs<br>\n10. 4 Cut Photo Sticker: 50 X 150 mm / 9pcs<br>\n11. NCT 127 Adventure SET<br>\n-NCT 127 World Map: 200 X 286 mm / 1pc<br>\n-Captain License Note: 87 X 125 mm / 1pc<br>\n-Ticket: 55 X 85 mm / 9pcs<br>\n12. SGS Special Gift<br>\n- Photocard 1 Set (1pc per member) + Special Photocards 1 Set (1pc per member)', 0, 178, 189, 'Season Greeting', 'SMTown & Store', 'NCV67008', 'sg3-1.jpg', 'sg3-2.jpg', '', '', '', '', 2, 0),
(41, 'BAEKHYUN \'Bambi\' Dad Hat', 'Material : Cotton', 1, 119, 131, 'Hat', 'SMTown & Store', 'EXH003', 'hat1.png', '', '', '', '', '', 2, 0),
(42, 'NCT DREAM \'Hot Sauce\' Beanie with Patches', 'Material : COTTON, POLYESTER, METAL', 2, 129, 132, 'Hat', 'SMTown & Store', 'NCH004', 'hat2.png', '', '', '', '', '', 2, 0),
(43, 'Treasure Plush Doll ', 'TREASURE PLUSH DOLL <br><br>\n- TREASURE Plush Doll comes with a jacket, a hoodie, pants, and shoes, all of which are detachable. <br>\n- The maximum number of purchase per order is 3 per option. <br>\n- The color may differ slightly from the actual product depending on your monitor resolution.', 0, 169, 180, 'Plushie', 'YG Select', 'TRSR12', 'plush1-1.png', '', '', '', '', '', 4, 0),
(44, '[Pre-Order] Stray Kids SKZOO PLUSH Original ver.', '[PRE-ORDER] STRAY KIDS SKZOO PLUSH ORIGINAL VER.<br>\nTheme:Skzoo <br>\nMaterial:Plush<br>\nFilled:PP Cotton<br>\nColor:Multicolor<br>\nType:Plush Toy<br>\nAge:Over 3 years<br>\nSize:About 20-25cm/7.8-9.8in(See Clearly the size) <br><br>\n\nPackage Included: <br>\n1 * Plush Toy<br>\n(Other accessories are not included)', 1, 212, 230, 'Plushie', 'FatirKshop', 'SKZ08', 'plush2-1.jfif', 'plush2-2.jpg', '', '', '', '', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supp_id` int(11) NOT NULL,
  `supp_name` varchar(100) NOT NULL,
  `supp_address` varchar(200) NOT NULL,
  `supp_contact` varchar(50) NOT NULL,
  `supp_email` varchar(50) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supp_id`, `supp_name`, `supp_address`, `supp_contact`, `supp_email`, `admin_id`) VALUES
(1, 'KTown4u', '221, Jaedurumi-gil, Paju-si, Gyeonggi-do, Republic of Korea', '02-2153-0724', '', 0),
(2, 'SMTown & Store', '83-21, Wangsimni-ro, Seongdong-gu, Seoul, Republic of Korea', '02-6240-9800', 'ad_smcnc@smtown.com', 0),
(3, 'FatirKshop', 'South Korea', '', '', 0),
(4, 'YG Select', '07326 International Finance Center Seoul 19F 10, Gukjegeumyung-ro, Yeongdeungpo-gu, Seoul, Korea', '', 'en@ygselect.com', 0),
(5, 'Weverse', 'South Korea', '', 'account@weverse.io', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `profile_pic` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(300) NOT NULL,
  `phoneno` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `profile_pic`, `fullname`, `email`, `address`, `phoneno`, `username`, `password`) VALUES
(4, '', '0987', '0987', '0987', '0987', '0987', 'a1Bz20ydqelm8m1wql9e1e06ec8e02f0a0074f2fcc6b26303b'),
(7, '', 'Clark', 'none', 'Lucena', '83954390', 'clarkpogi', 'a1Bz20ydqelm8m1wql7c6f5bdc16b3748b481fb5ea98bd4ace'),
(9, 'Screenshot_20221106_040050.png', 'Harry', 'harryden@mail.com', 'espn', '9876543210', 'harry', 'code0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `user_id` (`admin_id`),
  ADD KEY `prod_id` (`prod_id`),
  ADD KEY `profile_pic` (`profile_pic`),
  ADD KEY `user_id_2` (`admin_id`,`profile_pic`,`fullname`,`email`,`username`,`password`,`prod_id`),
  ADD KEY `supp_id` (`supp_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_id` (`order_id`,`user_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `or_no` (`or_no`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`),
  ADD KEY `order_details_id` (`order_details_id`),
  ADD KEY `prod_id` (`prod_id`,`user_id`,`order_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `payment_id` (`payment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `prod_id` (`prod_id`),
  ADD KEY `supp_id` (`supp_id`),
  ADD KEY `prod_name` (`prod_name`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `prod_desc` (`prod_desc`),
  ADD KEY `prod_qty` (`prod_qty`),
  ADD KEY `prod_price` (`prod_price`),
  ADD KEY `prod_sku` (`prod_sku`),
  ADD KEY `prod_pic1` (`prod_pic1`,`prod_pic2`,`prod_pic3`,`prod_pic4`,`prod_pic5`),
  ADD KEY `prod_cost` (`prod_cost`,`category`,`supplier`,`prod_pic6`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supp_id`),
  ADD KEY `supp_id` (`supp_id`),
  ADD KEY `supp_id_2` (`supp_id`,`supp_name`,`supp_address`,`supp_contact`,`supp_email`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `logs` (`log_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `product` (`admin_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
