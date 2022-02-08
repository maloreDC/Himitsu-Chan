-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2021 at 01:39 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `signup_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accs_tbl`
--

CREATE TABLE `accs_tbl` (
  `id` int(11) NOT NULL,
  `emp_fname` varchar(30) DEFAULT NULL,
  `emp_lname` varchar(30) DEFAULT NULL,
  `emp_uName` varchar(30) DEFAULT NULL,
  `emp_password` varchar(250) NOT NULL,
  `emp_gender` char(1) DEFAULT NULL,
  `emp_mPhone` varchar(12) DEFAULT NULL,
  `emp_email` varchar(30) DEFAULT NULL,
  `emp_bDate` date DEFAULT NULL,
  `emp_profile` varchar(250) DEFAULT NULL,
  `emp_bio` varchar(250) DEFAULT NULL,
  `start_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accs_tbl`
--

INSERT INTO `accs_tbl` (`id`, `emp_fname`, `emp_lname`, `emp_uName`, `emp_password`, `emp_gender`, `emp_mPhone`, `emp_email`, `emp_bDate`, `emp_profile`, `emp_bio`, `start_date`) VALUES
(1, 'Malore Anthony', 'Dela Cuesta', 'lorelore', '123', 'M', '12345678900', 'mac.delacuesta@gmail.com', '2019-01-01', 'img/FB_IMG_1501555579523.jpg', 'Hello', '2021-02-15 01:40:48'),
(2, 'Carla Jiane', 'Lee', 'KIalla', '00000', 'F', '11111111111', 'jiane@gmail.com', '2019-09-17', 'img/user.png', 'Hello', '2021-02-14 17:39:56'),
(4, 'Malore Anthony', 'Dela Cuesta', 'yowyow2', '12345678Mm!', 'M', '9052535261', 'maloreanthonydelacuesta.cs@gma', '2021-02-10', 'img/', NULL, '2021-01-21 15:38:39'),
(5, 'test1', 'test2', 'test', 'Malore123!', 'M', '9052535261', 'maloreanthonydelacuesta.cs@gma', '2021-02-18', 'img/', NULL, '2021-02-15 18:31:56'),
(6, 'tisoy', 'pinoy', 'chinoy', 'Malore12345!', 'M', '9052535261', 'maloreanthonydelacuesta.cs@gma', '2021-02-10', 'img/', NULL, '2021-02-15 19:57:24'),
(7, 'tisoy', 'pinoy', 'chinoyu', 'Tisoy12345!', 'M', '9052535261', 'maloreanthonydelacuesta.cs@gma', '2021-02-06', 'img/', NULL, '2021-02-15 19:58:48'),
(8, 'tisoy', 'pinoy', 'tisoyu', 'tisoy12345M!', 'M', '9052535261', 'maloreanthonydelacuesta.cs@gma', '2021-02-04', 'img/', NULL, '2021-02-15 19:59:37'),
(9, 'tisoy', 'chinoy', 'malore123', 'tisoy12345!M', 'M', '9052535261', 'maloreanthonydelacuesta.cs@gma', '2021-02-12', 'img/', NULL, '2021-02-15 20:11:49'),
(10, 'jiane', 'lee', 'jianerslore', 'lee12345678M!', 'M', '9052535261', 'maloreanthonydelacuesta.cs@gma', '2021-02-03', 'img/', NULL, '2021-02-15 20:14:10'),
(11, 'Jiane', 'Lee', 'malove', 'jiane12345678M!', 'M', '9052535261', 'maloreanthonydelacuesta.cs@gma', '2021-02-19', 'img/', NULL, '2021-02-15 20:21:18'),
(12, 'Jiane', 'Lee', 'holoholo', 'jiane12345678M!', 'M', '9052535261', 'maloreanthonydelacuesta.cs@gma', '2021-02-11', 'img/', NULL, '2021-02-15 20:43:54'),
(13, 'Jiane', 'Lee', 'kororo', 'Aachen12345!', 'M', '9052535261', 'maloreanthonydelacuesta.cs@gma', '2021-02-08', 'img/', NULL, '2021-02-16 16:53:00'),
(14, 'Malore Anthony', 'Dela Cuesta', 'testoloko', '$2y$10$lvHcRyacwsZN.cBqCbn/6.K', 'M', '9052535261', 'maloreanthonydelacuesta.cs@gma', '2021-02-11', 'img/', NULL, '2021-02-16 17:42:55'),
(15, 'Malore Anthony', 'Dela Cuesta', 'testusawa', '$2y$10$Hvsc9jVZrZzuskWt/p.c2.O', 'M', '9052535261', 'maloreanthonydelacuesta.cs@gma', '2021-02-03', 'img/', NULL, '2021-02-16 18:27:29'),
(16, 'Malore Anthony', 'Dela Cuesta', 'testosawa', '$2y$10$kRigbW0PD6fBuTJQ0x/t8um', 'M', '9052535261', 'maloreanthonydelacuesta.cs@gma', '2021-02-10', 'img/', NULL, '2021-02-16 18:27:52'),
(17, 'Malore Anthony', 'Dela Cuesta', 'ayokona', '6eed9992aa0f7ac42d8611ff014f1d', 'M', '9052535261', 'maloreanthonydelacuesta.cs@gma', '2021-02-10', 'img/', NULL, '2021-02-16 19:41:28'),
(18, 'Malore Anthony', 'Dela Cuesta', 'lastnato', 'Aa123456789!', 'M', '9052535261', 'maloreanthonydelacuesta.cs@gma', '2021-02-11', 'img/', NULL, '2021-02-16 20:57:07'),
(19, 'Rey', 'Castillo', 'profnamalupet', '6b863ae9e3fa21ae6003bb467faadafb5555d40b', 'M', '9052535261', 'profnamalupet@gmail.com', '2021-02-12', 'img/', NULL, '2021-01-12 21:46:03'),
(20, 'Test Name', 'Test LastName', 'firsttest', '2f7f8dce56fdccbec888bb920342119165d34c17', 'M', '9052535261', 'lmao@gmail.com', '2021-02-18', 'img/149769740_1104641373292677_7560028528132232358_n.png', NULL, '2021-02-16 23:40:35'),
(21, 'Malore Anthony', 'Dela Cuesta', 'pleasework', '128603915adedb0c14497cfc6e9908ed12a2b148', 'M', '9052535261', 'maloreanthonydelacuesta.cs@gma', '2021-02-11', 'img/', NULL, '2021-02-17 03:04:08');

-- --------------------------------------------------------

--
-- Table structure for table `emp_comment`
--

CREATE TABLE `emp_comment` (
  `id` int(11) NOT NULL,
  `emp_uName` varchar(30) DEFAULT NULL,
  `emp_datetime` datetime DEFAULT NULL,
  `emp_comment` varchar(140) DEFAULT NULL,
  `postId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_comment`
--

INSERT INTO `emp_comment` (`id`, `emp_uName`, `emp_datetime`, `emp_comment`, `postId`) VALUES
(34, 'lorelore', '2020-01-04 21:24:03', 'hello', NULL),
(35, 'lorelore', '2020-01-04 21:24:03', 'hello', NULL),
(36, 'lorelore', '2020-01-04 21:24:03', 'hello', NULL),
(37, 'lorelore', '2020-01-04 21:25:07', 'hello', NULL),
(38, 'lorelore', '2020-01-04 21:26:45', 'hello', 0),
(39, 'lorelore', '2020-01-04 21:28:30', 'hello', 0),
(40, 'lorelore', '2020-01-04 21:30:17', 'hello', 0),
(41, 'lorelore', '2020-01-04 21:37:12', 'hello', 0),
(42, 'lorelore', '2020-01-04 21:40:44', 'qwe', 69),
(43, 'lorelore', '2020-01-04 21:41:19', 'we', 69),
(44, 'lorelore', '2020-01-04 21:41:28', 'lol', 69),
(45, 'lorelore', '2020-01-04 21:42:44', 'lol', 68),
(46, 'lorelore', '2020-01-04 21:42:49', 'lol1', 68),
(47, 'lorelore', '2020-01-04 21:45:53', '', 69),
(48, 'lorelore', '2020-01-04 21:48:46', 'leemaw', 70),
(49, 'lorelore', '2020-01-04 21:48:52', 'leemaw2', 70),
(50, 'lorelore', '2020-01-04 21:57:03', 'asd', 66),
(51, 'lorelore', '2020-01-04 21:57:25', 'asd2', 66),
(52, 'lorelore', '2020-01-04 22:03:20', '', 70),
(53, 'lorelore', '2020-01-04 22:03:27', 'lol', 70),
(54, 'lorelore', '2020-01-04 22:04:48', 'lol', 70),
(55, 'lorelore', '2020-01-04 22:05:46', '', 70),
(56, 'lorelore', '2020-01-04 22:05:58', 'asd', 70),
(57, 'lorelore', '2020-01-04 22:07:10', 'asd', 70),
(58, 'lorelore', '2020-01-04 22:07:14', 'asd', 70),
(59, 'lorelore', '2020-01-04 22:15:39', '', 70),
(60, 'lorelore', '2020-01-04 22:16:50', '', 70),
(61, 'lorelore', '2020-01-04 22:16:53', 'asd', 70),
(62, 'lorelore', '2020-01-04 22:16:55', 'asdasdsad', 70),
(63, 'lorelore', '2020-01-04 22:18:22', '', 70),
(64, 'lorelore', '2020-01-04 22:18:23', 'asd', 70),
(65, 'lorelore', '2020-01-04 22:18:24', 'asd', 70),
(66, 'lorelore', '2020-01-04 22:18:26', 'asdasd', 70),
(67, 'lorelore', '2020-01-04 22:20:02', 'asd', 70),
(68, 'lorelore', '2020-01-04 22:20:03', 'asd', 70),
(69, 'lorelore', '2020-01-04 22:20:05', 'asdasd', 70),
(70, 'lorelore', '2020-01-04 22:29:45', 'asd', 70),
(71, 'lorelore', '2020-01-04 22:30:11', '', 70),
(72, 'lorelore', '2020-01-04 22:30:17', 'asd', 70),
(73, 'lorelore', '2020-01-04 22:30:22', 'HELLO', 70),
(74, 'lorelore', '2020-01-04 22:31:57', '', 70),
(75, 'lorelore', '2020-01-04 22:32:00', 'asd', 70),
(76, 'lorelore', '2020-01-04 22:32:23', 'asd', 70),
(77, 'lorelore', '2020-01-04 22:32:27', 'asd', 70),
(78, 'lorelore', '2020-01-04 22:32:30', 'asdasdasd', 70),
(79, 'lorelore', '2020-01-04 22:32:43', 'lol\n', 70),
(80, 'lorelore', '2020-01-04 22:33:22', 'lol\n', 70),
(81, 'lorelore', '2020-01-04 22:33:25', 'lol\n', 70),
(82, 'lorelore', '2020-01-04 22:33:25', 'lol\n', 70),
(83, 'lorelore', '2020-01-04 22:33:25', 'lol\n', 70),
(84, 'lorelore', '2020-01-04 22:33:35', '', 70),
(85, 'lorelore', '2020-01-04 22:33:37', 'asd', 70),
(86, 'lorelore', '2020-01-04 22:33:40', 'asdfdfd', 70),
(87, 'lorelore', '2020-01-04 22:33:43', 'asdfdfdasdas', 70),
(88, 'lorelore', '2020-01-04 22:48:31', 'asd', 63),
(89, 'lorelore', '2020-01-04 22:48:35', 'lol', 63),
(90, 'lorelore', '2020-01-04 22:48:54', 'asd', 63),
(91, 'lorelore', '2020-01-04 22:48:58', 'lol', 63),
(92, 'lorelore', '2020-01-04 22:48:59', 'lol', 63),
(93, 'lorelore', '2020-01-04 22:49:01', 'lolasd', 63),
(94, 'lorelore', '2020-01-04 22:49:01', 'lolasd', 63),
(95, 'lorelore', '2020-01-04 22:49:05', 'lolasd', 63),
(96, 'lorelore', '2020-01-04 23:54:07', 'asd', 70),
(97, 'lorelore', '2020-01-04 23:54:12', 'lol', 70),
(98, 'lorelore', '2020-01-04 23:54:28', 'asd', 71),
(99, 'lorelore', '2020-01-05 00:34:34', 'asdasd', 71),
(100, 'lorelore', '2020-01-05 00:34:36', 'asdasd', 71),
(101, 'lorelore', '2020-01-05 00:35:11', '', 71),
(102, 'lorelore', '2020-01-05 00:35:12', 'asdasd', 71),
(103, 'lorelore', '2020-01-05 00:35:13', 'asdasd', 71),
(104, 'lorelore', '2020-01-05 00:35:13', 'asdasd', 71),
(105, 'lorelore', '2020-01-05 00:35:13', 'asdasd', 71),
(106, 'lorelore', '2020-01-05 00:35:24', 'baliw', 71),
(107, 'lorelore', '2020-01-05 00:35:27', 'baliw', 71),
(108, 'lorelore', '2020-01-05 00:35:28', 'baliwasdasd', 71),
(109, 'lorelore', '2020-01-05 00:36:16', '', 71),
(110, 'lorelore', '2020-01-05 00:36:18', '', 71),
(111, 'lorelore', '2020-01-05 00:36:19', 'asda', 71),
(112, 'lorelore', '2020-01-05 00:36:20', 'asda', 71),
(113, 'lorelore', '2020-01-05 00:36:22', 'asdaqfeq', 71),
(114, 'lorelore', '2020-01-05 00:36:23', 'asdaqfeq', 71),
(115, 'lorelore', '2020-01-05 00:36:27', 'asdaqfeqqfeq', 71),
(116, 'lorelore', '2020-01-05 00:36:30', '1', 71),
(117, 'lorelore', '2020-01-05 00:36:31', '1', 71),
(118, 'lorelore', '2020-01-05 00:36:37', '', 71),
(119, 'lorelore', '2020-01-05 00:36:41', '', 71),
(120, 'lorelore', '2020-01-05 00:36:41', '2', 71),
(121, 'lorelore', '2020-01-05 00:36:45', '2', 71),
(122, 'lorelore', '2020-01-05 00:36:51', '3', 71),
(123, 'lorelore', '2020-01-05 00:36:54', '3', 71),
(124, 'lorelore', '2020-01-05 00:36:56', '5', 71),
(125, 'lorelore', '2020-01-05 00:38:09', 'asd', 71),
(126, 'lorelore', '2020-01-05 00:38:12', '123', 71),
(127, 'lorelore', '2020-01-05 00:38:16', '1561', 71),
(128, 'lorelore', '2020-01-05 00:38:19', '123', 71),
(129, 'lorelore', '2020-01-06 17:56:57', '', 71),
(130, 'lorelore', '2020-01-06 17:56:58', '', 71),
(131, 'lorelore', '2020-01-06 18:01:57', 'hello', 71),
(132, 'lorelore', '2020-01-06 18:01:58', 'hello', 71),
(133, 'lorelore', '2020-01-06 18:01:58', 'hello', 71),
(134, 'lorelore', '2020-01-06 18:02:58', '', 71),
(135, 'lorelore', '2020-01-06 18:03:02', 'malore', 71),
(136, 'lorelore', '2020-01-06 18:04:39', 'hatdog', 71),
(137, 'lorelore', '2020-01-06 18:04:48', 'hatdog', 71),
(138, 'lorelore', '2020-01-06 18:05:17', 'test1', 71),
(139, 'lorelore', '2020-01-06 18:05:21', 'test2', 71),
(140, 'lorelore', '2020-01-06 18:05:24', 'test3', 71),
(141, 'lorelore', '2020-01-06 18:06:36', 'lol', 71),
(142, 'lorelore', '2020-01-06 18:06:42', 'lol2', 71),
(143, 'lorelore', '2020-01-06 18:09:10', 'wow', 72),
(144, 'lorelore', '2020-01-06 18:09:15', 'wooooow', 72),
(145, 'lorelore', '2020-01-06 18:18:25', 'wooooooooow', 72),
(146, 'lorelore', '2020-01-06 18:20:46', 'wooooooooooooooooooow', 72),
(147, 'lorelore', '2020-01-06 18:21:06', 'lol', 72),
(148, 'lorelore', '2020-01-06 18:21:22', 'lol2', 72),
(149, 'lorelore', '2020-01-06 18:24:01', 'lol2', 72),
(150, 'lorelore', '2020-01-06 18:25:49', 'hatdog', 70),
(151, 'lorelore', '2020-01-06 18:30:17', '8797', 70),
(152, 'lorelore', '2020-01-07 18:03:19', 'lol3', 72),
(153, 'lorelore', '2020-01-07 18:03:30', 'sdsdssd', 72),
(154, 'lorelore', '2020-01-07 18:15:34', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 72),
(155, 'lorelore', '2020-01-07 18:30:08', 'qweqweqwe', 72),
(156, 'lorelore', '2020-01-07 18:30:28', '973', 70),
(157, 'lorelore', '2020-01-07 18:54:11', 'adfdfg', 72),
(158, 'lorelore', '2020-01-07 19:57:42', 'I love lol', 72);

-- --------------------------------------------------------

--
-- Table structure for table `emp_like`
--

CREATE TABLE `emp_like` (
  `id` int(11) NOT NULL,
  `emp_uName` varchar(30) DEFAULT NULL,
  `postId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_like`
--

INSERT INTO `emp_like` (`id`, `emp_uName`, `postId`) VALUES
(1, '', 72),
(9, 'lorelore', 72);

-- --------------------------------------------------------

--
-- Table structure for table `emp_post`
--

CREATE TABLE `emp_post` (
  `id` int(11) NOT NULL,
  `emp_dateTime` datetime DEFAULT NULL,
  `emp_write` varchar(140) DEFAULT NULL,
  `emp_pic` varchar(150) DEFAULT NULL,
  `emp_uName` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_post`
--

INSERT INTO `emp_post` (`id`, `emp_dateTime`, `emp_write`, `emp_pic`, `emp_uName`) VALUES
(23, '2019-12-18 13:12:33', 'test', 'img/', 'lorelore'),
(24, '2019-12-18 13:14:13', 'test', 'img/', 'lorelore'),
(25, '2019-12-18 13:17:34', 'test', 'img/', 'lorelore'),
(26, '2019-12-18 13:17:38', 'test', 'img/', 'lorelore'),
(27, '2019-12-18 13:17:43', 'post2', 'img/', 'lorelore'),
(28, '2019-12-18 13:17:48', 'post 3', 'img/', 'lorelore'),
(29, '2019-12-18 13:18:00', 'hello', 'img/', 'Kialla'),
(30, '2019-12-18 15:40:31', 'test', 'img/', 'lorelore'),
(31, '2019-12-18 15:40:34', 'test', 'img/', 'lorelore'),
(32, '2019-12-18 15:41:27', 'test', 'img/', 'lorelore'),
(33, '2019-12-18 15:43:47', 'asd', 'img/', 'lorelore'),
(34, '2019-12-18 15:46:47', 'asd', 'img/', 'lorelore'),
(35, '2019-12-18 15:55:07', 'sa', 'img/', 'lorelore'),
(36, '2019-12-18 15:59:00', 'asd', 'img/profile.png', 'lorelore'),
(37, '2019-12-18 15:59:24', 'asd', 'img/profile.png', 'lorelore'),
(38, '2019-12-18 16:01:27', 'asd', 'img/', 'lorelore'),
(39, '2019-12-18 16:01:35', 'test', 'img/profile.png', 'lorelore'),
(40, '2019-12-18 16:11:14', 'hello', 'img/profile.png', 'Kialla'),
(41, '2019-12-19 23:50:58', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'img/', 'lorelore'),
(42, '2019-12-20 00:02:34', 'asd', 'img/', 'lorelore'),
(43, '2019-12-20 00:02:44', 'asd', 'img/', 'lorelore'),
(44, '2019-12-20 00:13:04', 'ASDA@Wdwqeqdssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssaiushdiuahsdqwdqwiudhiqwudhiqwudhiqwudhiqwudhwiqudhqwuid', 'img/profile.png', 'lorelore'),
(45, '2019-12-20 01:10:46', 'hello', 'img/download.png', 'lorelore'),
(46, '2019-12-20 01:42:23', 'TEst 13mkhpa;kdpq,wl;dlasd', 'img/', 'lorelore'),
(47, '2019-12-20 01:54:51', 'hello', 'img/', 'lorelore'),
(48, '2019-12-20 01:56:27', 'hello', 'img/', 'lorelore'),
(49, '2019-12-20 09:21:38', 'hello', 'img/', 'lorelore'),
(50, '2019-12-20 09:21:42', 'hello', 'img/', 'lorelore'),
(51, '2019-12-20 09:22:02', 'rt', 'img/', 'lorelore'),
(52, '2019-12-20 09:23:17', 'try', 'img/', 'lorelore'),
(53, '2020-01-03 18:08:15', 'hello teest', 'img/', 'lorelore'),
(54, '2020-01-03 18:28:55', 'sadsd', 'img/', 'lorelore'),
(55, '2020-01-03 19:45:48', 'asd', 'img/IMG_20180726_083849.JPG', 'lorelore'),
(56, '2020-01-03 19:47:25', 'asd', 'img/IMG_20181215_155610.JPG', 'lorelore'),
(57, '2020-01-03 19:47:34', 'asd', 'img/', 'lorelore'),
(58, '2020-01-04 11:56:29', 'asd', 'img/', 'lorelore'),
(59, '2020-01-04 11:56:35', 'qwe', 'img/', 'lorelore'),
(60, '2020-01-04 11:56:39', 'qwqgghffdfdf', 'img/', 'lorelore'),
(61, '2020-01-04 11:56:44', 'sdfdsf', 'img/', 'lorelore'),
(62, '2020-01-04 11:56:46', 'sdf', 'img/', 'lorelore'),
(63, '2020-01-04 11:57:04', 'lol', 'img/FB_IMG_1501768319713.jpg', 'lorelore'),
(64, '2020-01-04 11:57:16', 'qwe', 'img/', 'lorelore'),
(65, '2020-01-04 12:42:24', 'asd', 'img/FB_IMG_1501555579523.jpg', 'lorelore'),
(66, '2020-01-04 13:09:07', 'asd', 'img/', 'lorelore'),
(67, '2020-01-04 19:23:26', 'asd', 'img/', 'lorelore'),
(68, '2020-01-04 19:53:06', 'asd', 'img/c-c-angry-react-this-4114648.png', 'lorelore'),
(69, '2020-01-04 20:00:49', 'dfdf', 'img/FB_IMG_1503791003588.jpg', 'lorelore'),
(70, '2020-01-04 21:48:23', 'hello weebs', 'img/FB_IMG_1501860925802.jpg', 'lorelore'),
(71, '2020-01-04 23:08:55', 'lol', 'img/FB_IMG_1503792629770.jpg', 'Kialla'),
(72, '2020-01-06 18:09:03', 'Leemaw', 'img/FB_IMG_1541640516342.jpg', 'lorelore'),
(73, '2021-02-15 14:39:54', 'lmao', 'img/', 'yowyow2'),
(74, '2021-02-15 17:40:26', 'lmao2', 'img/', 'lorelore');

-- --------------------------------------------------------

--
-- Table structure for table `info_tbl`
--

CREATE TABLE `info_tbl` (
  `id` int(11) NOT NULL,
  `emp_fname` varchar(30) DEFAULT NULL,
  `emp_lname` varchar(30) DEFAULT NULL,
  `emp_uname` varchar(30) DEFAULT NULL,
  `emp_password` varchar(30) DEFAULT NULL,
  `emp_gender` char(1) DEFAULT NULL,
  `emp_mPhone` bigint(12) DEFAULT NULL,
  `emp_email` varchar(30) DEFAULT NULL,
  `emp_bDate` date DEFAULT NULL,
  `emp_profile` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `info_tbl`
--

INSERT INTO `info_tbl` (`id`, `emp_fname`, `emp_lname`, `emp_uname`, `emp_password`, `emp_gender`, `emp_mPhone`, `emp_email`, `emp_bDate`, `emp_profile`) VALUES
(2, 'Jiane', 'Lee', 'malorelore', '123', 'n', 11111111111, 'jiane@gmail.com', '2019-09-17', 'img/profile.png'),
(4, 'Malore', 'Dela Cuesta', 'malorelore', 'malore123', 'M', 9052131231, 'mac.delacuesta@gmail.com', '0000-00-00', 'img/profile.png'),
(5, 'Malore', 'Dela Cuesta', 'malorelore', 'malore123', 'M', 9052535261, 'malore.exe@gmail.com', '2019-11-13', 'img/profile.png'),
(6, 'test1', 'test1', 'test1', 'malore123', 'M', 90512312, 'mac.delacuesta@gmail.com', '2019-11-09', 'img/profile.png'),
(7, 'Jiane', 'Lee', 'jiane', '0000', 'F', 12345678900, 'jj@gmail.com', '2019-11-06', 'img/profile.png'),
(9, 'Malore', 'Dela Cuesta', 'malorelore', '123', 'M', 9052535261, 'malore.exe@gmail.com', '2019-11-13', 'img/profile.png'),
(10, 'Malore', 'Dela Cuesta', 'lorelore', '123', 'M', 9052535261, 'mac.delacuesta@gmail.com', '2019-11-12', 'img/profile.png'),
(11, 'Lore', 'Malore', 'hahahah', '123', 'M', 905123123, 'asdasad@sddfsdf', '2019-11-15', 'img/profile.png'),
(12, 'Malore', 'Dela Cuesta', 'hahahah', '123', 'M', 123234567, 'maloew123@gmail.com', '2019-01-31', 'img/profile.png'),
(13, 'Malore', 'Dela Cuesta', 'lol', '123', 'M', 1234567, 'maloew123@gmail.com', '2019-12-31', 'img/profile.png'),
(14, 'test2', 'test2', 'test2', '123', 'M', 12345678910, 'test2@gmail.com', '2000-04-15', 'img/profile.png'),
(15, 'test5', 'test5', 'test5', '123', 'M', 1234567890, 'test5@gmail.com', '2019-11-27', 'img/profile.png'),
(16, 'Malore', 'Dela Cuesta', 'lorelore', '123', 'M', 123213123, 'malore.exe@gmail.com', '0213-03-12', 'img/profile.png'),
(17, 'Lore', 'Dela Cuesta', 'lorelore', '123', 'M', 12345678910, 'mac.delacuesta@gmail.com', '2019-12-23', 'img/profile.png'),
(18, 'asdas', 'DSAD', 'lorelore1', '123', 'M', 12321312312, 'mac.delacuesta@gmail.com', '2019-12-06', 'img/profile.png'),
(19, 'Malore', 'Dela Cuesta', '12312', '123', 'M', 1232131231232132, 'anna@gmail.com', '2019-12-11', 'img/profile.png'),
(20, 'sd', 'lore', 'lorelore', '123', 'M', 123412534242, 'asdasad@sddfsdf', '2019-12-19', 'img/profile.png'),
(21, 'asdas', 'Lee', 'sadsasda', '123', 'M', 123412341234, 'maloew123@gmail.com', '2019-12-24', 'img/profile.png'),
(22, 'Malore', 'Lee', 'lorelore', '123', 'M', 1234567890, 'masda@gmail', '2019-12-13', 'img/profile.png'),
(23, 'jerone', 'alimpia', 'jalimpia', '123', 'M', 123456789, 'jalimpia@gmail.com', '2019-12-13', 'img/profile.png'),
(24, 'Malore', 'Dela Cuesta', 'lorelore', '123', 'M', 12345678900, 'mac.delacuesta@gmail.com', '2019-01-01', 'img/profile.png'),
(25, 'Malore', 'Dela Cuesta', 'lorelore', '123', 'M', 12345678900, 'mac.delacuesta@gmail.com', '2019-01-01', 'img/profile.png');

-- --------------------------------------------------------

--
-- Table structure for table `oldpass_tbl`
--

CREATE TABLE `oldpass_tbl` (
  `id` int(11) NOT NULL,
  `emp_uName` varchar(50) DEFAULT NULL,
  `emp_password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `oldpass_tbl`
--

INSERT INTO `oldpass_tbl` (`id`, `emp_uName`, `emp_password`) VALUES
(1, 'kororo', 'Malore123456!'),
(2, 'kororo', 'Iloveyou123!'),
(3, 'kororo', 'Malore123456!'),
(4, 'kororo', 'Iloveyou123!'),
(5, 'kororo', 'Malore12345!'),
(6, 'kororo', 'Iloveyou123!'),
(7, 'kororo', 'Malore12345!'),
(8, 'kororo', 'Iloveyou123!'),
(9, 'kororo', 'Malore12345!'),
(10, 'kororo', 'Iloveyou123!'),
(11, 'kororo', 'Malore123456!'),
(12, 'kororo', 'Iloveyou123!'),
(13, 'kororo', 'Malore12345!'),
(14, 'kororo', 'Iloveyou123!'),
(15, 'kororo', 'Malore12345!'),
(16, 'kororo', 'Iloveyou123!'),
(17, 'kororo', 'Malore12345!'),
(18, 'kororo', 'Iloveyou123!'),
(19, 'kororo', 'Malore12345!'),
(20, 'kororo', 'Iloveyou123!'),
(21, 'kororo', 'Test12345678!'),
(22, 'kororo', 'Qwerty12345!'),
(23, 'kororo', 'Asdfgh12345!'),
(24, 'kororo', 'Zxcvb12345!'),
(25, 'kororo', 'Password12345!'),
(26, 'kororo', 'Admin12345!'),
(27, 'kororo', 'Aachen12345!'),
(28, 'lastnato', 'Aa123456789!'),
(29, 'profnamalupet', 'ff1e574988f910981b547e04bed3eca88abac7eb'),
(30, 'profnamalupet', '6690547e7278c91730f55e6e7c26c552293f3839'),
(31, 'profnamalupet', '933472468c01f962a4251809d8adba311c2fdee3'),
(32, 'profnamalupet', 'b1b04497828db5ba198bacb982bb48889197547e'),
(33, 'profnamalupet', 'a3603cd39a4d776b8a218a9f0edf57acfdb57f5c'),
(34, 'profnamalupet', '50e8686ca605d5ec29e24db486c6a71d49e18ebf'),
(35, 'profnamalupet', 'dc709913837b29c467a7d98b7b5ad35e8e756bb3'),
(36, 'firsttest', '6ada100264d2f9a119b429313872d560b5092527'),
(37, 'pleasework', '128603915adedb0c14497cfc6e9908ed12a2b148'),
(38, 'pleasework', '258adaba6d52bc5502e7d0eaf000dd613d682f00'),
(39, 'pleasework', '128603915adedb0c14497cfc6e9908ed12a2b148'),
(40, 'pleasework', '258adaba6d52bc5502e7d0eaf000dd613d682f00'),
(41, 'pleasework', 'ea64a7e7ec67d66e84ea81450790b3aa66178693'),
(42, 'pleasework', '7685312021d2fa32e6ba1299b5d816a0e874e83f'),
(43, 'pleasework', '83e8d72b0c34baf8ceb4385775f9a2c869370f40'),
(44, 'pleasework', '7e933d6507b7007d98c9c50e198dc06346f17b85'),
(45, 'pleasework', '0516417551ecac2992ff8c09321011fe8ed9f19b'),
(46, 'pleasework', '128603915adedb0c14497cfc6e9908ed12a2b148');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accs_tbl`
--
ALTER TABLE `accs_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_comment`
--
ALTER TABLE `emp_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_like`
--
ALTER TABLE `emp_like`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_post`
--
ALTER TABLE `emp_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info_tbl`
--
ALTER TABLE `info_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oldpass_tbl`
--
ALTER TABLE `oldpass_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accs_tbl`
--
ALTER TABLE `accs_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `emp_comment`
--
ALTER TABLE `emp_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `emp_like`
--
ALTER TABLE `emp_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `emp_post`
--
ALTER TABLE `emp_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `info_tbl`
--
ALTER TABLE `info_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `oldpass_tbl`
--
ALTER TABLE `oldpass_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
