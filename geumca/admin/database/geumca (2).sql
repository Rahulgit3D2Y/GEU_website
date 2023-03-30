-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2022 at 10:10 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `geumca`
--

-- --------------------------------------------------------

--
-- Table structure for table `advancesetting`
--

CREATE TABLE `advancesetting` (
  `popupid` int(11) NOT NULL,
  `popupname` varchar(100) NOT NULL,
  `popupstatus` varchar(10) NOT NULL,
  `popup_status` varchar(10) NOT NULL,
  `popupcreated` varchar(10) NOT NULL,
  `popupcreateddatetime` varchar(30) NOT NULL,
  `popupupdateby` varchar(10) NOT NULL,
  `popupupdatedatetime` varchar(30) NOT NULL,
  `popdisableby` varchar(10) NOT NULL,
  `popdisabletime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advancesetting`
--

INSERT INTO `advancesetting` (`popupid`, `popupname`, `popupstatus`, `popup_status`, `popupcreated`, `popupcreateddatetime`, `popupupdateby`, `popupupdatedatetime`, `popdisableby`, `popdisabletime`) VALUES
(1, 'student message', 'InActive', 'InActive', '1', '24-04-2022 12:12:38pm', '1', '22-05-2022 07:01:56pm', '1', '22-05-2022 07:02:00pm'),
(2, 'admin message', 'InActive', 'InActive', '1', '24-04-2022 12:12:38pm', '1', '24-04-2022 03:09:33pm', '1', '24-04-2022 03:12:10pm'),
(3, 'captcha', 'InActive', 'Active', '1', '24-04-2022 12:48:07pm', '1', '10-09-2022 08:41:38pm', '1', '20-09-2022 01:14:39pm'),
(4, 'balance fee reminder', 'InActive', 'InActive', '1', '24-04-2022 02:17:10pm', '1', '15-05-2022 03:28:53pm', '1', '03-06-2022 12:46:58am'),
(5, 'Birthday message', 'Active', 'Active', '1', '24-04-2022 02:17:58pm', '1', '01-05-2022 06:00:28pm', '1', '29-04-2022 10:12:45pm'),
(6, 'student pending document upload', 'InActive', 'InActive', '1', '24-04-2022 02:18:37pm', '1', '18-05-2022 06:48:27pm', '1', '03-06-2022 12:47:08am'),
(7, 'photo upload', 'Active', 'Active', '1', '03-09-2022 08:04:33pm', '1', '03-09-2022 08:04:38pm', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `course_detail`
--

CREATE TABLE `course_detail` (
  `course_id` int(11) NOT NULL,
  `course_id2` int(11) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `course_duration` varchar(50) NOT NULL,
  `school_id` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `disablereason` varchar(100) NOT NULL,
  `activereason` varchar(100) NOT NULL,
  `createdby` varchar(20) NOT NULL,
  `createdtime` varchar(30) NOT NULL,
  `updateby` varchar(30) NOT NULL,
  `updatetime` varchar(30) NOT NULL,
  `disableby` varchar(30) NOT NULL,
  `disabletime` varchar(30) NOT NULL,
  `activeby` varchar(30) NOT NULL,
  `activetime` varchar(30) NOT NULL,
  `course_type` varchar(20) NOT NULL,
  `department_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_detail`
--

INSERT INTO `course_detail` (`course_id`, `course_id2`, `course_name`, `course_duration`, `school_id`, `status`, `disablereason`, `activereason`, `createdby`, `createdtime`, `updateby`, `updatetime`, `disableby`, `disabletime`, `activeby`, `activetime`, `course_type`, `department_id`) VALUES
(1, 211, 'B.SC (HONS.) Computer Science\n', '3', '1', 'Active', '', '', '1', '16-05-2022 03:54:04pm', '1', '16-05-2022 04:24:19pm', '', '', '', '', 'Yearly', '1'),
(2, 221, 'B.SC -INFORMATION TECHNOLOGY\n', '3', '1', 'Active', '', '', '1', '18-05-2022 07:27:16pm', '', '', '', '', '', '', 'Yearly', '1'),
(3, 245, 'BACHELOR OF COMPUTER APPLICATION\n', '3', '1', 'Active', '', '', '1', '19-05-2022 12:38:15am', '', '', '', '', '', '', 'Yearly', '1'),
(4, 185, 'Master of Computer Application', '2', '1', 'Active', '', '', '1', '19-05-2022 12:38:15am', '', '', '', '', '', '', 'Yearly', '1'),
(5, 189, 'MASTER OF SCIENCE - Information Technology', '2', '1', 'Active', '', '', '1', '19-05-2022 12:38:15am', '', '', '', '', '', '', 'Yearly', '1');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(20) NOT NULL,
  `department_name` varchar(50) NOT NULL,
  `school_id` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `disablereason` varchar(100) NOT NULL,
  `activereason` varchar(100) NOT NULL,
  `createdby` varchar(20) NOT NULL,
  `createdtime` varchar(30) NOT NULL,
  `updateby` varchar(20) NOT NULL,
  `updatetime` varchar(30) NOT NULL,
  `disableby` varchar(20) NOT NULL,
  `disabletime` varchar(30) NOT NULL,
  `activeby` varchar(20) NOT NULL,
  `activetime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `school_id`, `status`, `disablereason`, `activereason`, `createdby`, `createdtime`, `updateby`, `updatetime`, `disableby`, `disabletime`, `activeby`, `activetime`) VALUES
(1, 'Department Of Computer Application', '1', 'Active', '', '', '1', '12-08-2022 09:33:02pm', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `logindetail`
--

CREATE TABLE `logindetail` (
  `id` int(11) NOT NULL,
  `logintype` varchar(10) NOT NULL,
  `loginid` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `loginattempt` varchar(10) NOT NULL,
  `ipaddress` varchar(30) NOT NULL,
  `session_key` varchar(50) NOT NULL,
  `login_datetime` varchar(30) NOT NULL,
  `logout_datetime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logindetail`
--

INSERT INTO `logindetail` (`id`, `logintype`, `loginid`, `password`, `loginattempt`, `ipaddress`, `session_key`, `login_datetime`, `logout_datetime`) VALUES
(0, 'admin', 'superuser', 'admin@2000', 'Success', '::1', 's7p6m3penkti9r74ks6rbugs93', '2022-10-22 10:25:43pm', ''),
(1, 'admin', 'superuser', 'admin@2000', 'Success', '::1', 'c4oc18ga0d5r58mhcejkqqovfd', '2022-10-17 09:35:35am', ''),
(2, 'admin', 'dineshdobhal', 'admin@2000', 'Success', '::1', 'bh3220l54tnhp8omf5n7u0ee0k', '2022-10-17 09:48:19am', ''),
(3, 'admin', 'superuser', 'admin@2000', 'Success', '::1', 'pl9tv7hjqgvf1ooh5ffco03drl', '2022-10-18 07:24:27pm', ''),
(4, 'admin', 'superuser', 'admin@2000', 'Success', '::1', '7ate8mehro7gh84fmda3ngvs3c', '2022-10-19 11:51:02am', ''),
(5, 'admin', 'superuser', 'admin@2000', 'Success', '::1', 'vb92v96c18ipe8djvirph62qur', '2022-10-19 01:30:01pm', ''),
(6, 'admin', 'superuser', 'admin@2000', 'Success', '::1', 'b2i87nbupgbit1h9tjrofcd3ve', '2022-10-19 02:21:06pm', ''),
(7, 'admin', 'superuser', 'admin@2000', 'Success', '::1', 'ro1nfnljqvhmjo3iq7j5d49a10', '2022-10-19 08:03:15pm', ''),
(8, 'admin', 'superuser', 'admin@2000', 'Success', '::1', 'n4o283qvvgi9dg9m89aiukqhn8', '2022-10-22 08:04:37pm', ''),
(9, 'admin', 'superuser', 'admin@2000', 'Success', '::1', '1tjm2jkl7s9gclqkjf5pa11lv9', '2022-10-22 09:39:22pm', ''),
(10, 'admin', 'superuser', 'admin@2000', 'Success', '::1', 'aie1l0ibk9qc2g5b93a8sq10cu', '2022-10-23 08:39:15am', ''),
(11, 'admin', 'superuser', 'admin@2000', 'Success', '::1', '2610lhv8osbng7pe5foi8a65kc', '2022-10-27 08:15:26pm', '2022-10-27 08:17:39pm'),
(12, 'admin', 'superuser', 'admin@2000', 'Success', '::1', '2610lhv8osbng7pe5foi8a65kc', '2022-10-27 08:17:41pm', '2022-10-27 08:17:53pm');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(20) NOT NULL,
  `menu_name` varchar(30) NOT NULL,
  `menu_icon` varchar(30) NOT NULL,
  `menu_order` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `disablereason` varchar(100) NOT NULL,
  `activereason` varchar(100) NOT NULL,
  `createdby` varchar(30) NOT NULL,
  `createdtime` varchar(30) NOT NULL,
  `updateby` varchar(30) NOT NULL,
  `updatetime` varchar(30) NOT NULL,
  `disableby` varchar(30) NOT NULL,
  `disabletime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`, `menu_icon`, `menu_order`, `status`, `disablereason`, `activereason`, `createdby`, `createdtime`, `updateby`, `updatetime`, `disableby`, `disabletime`) VALUES
(1, 'Course', 'fas fa-columns', '1', 'Active', '', '', '1', '11-08-2022 08:28:23pm', '', '', '', ''),
(5, 'Setting', 'fas fa-cog', '5', 'Active', '', '', '1', '12-08-2022 02:21:04pm', '', '', '', ''),
(6, 'Permission', 'fas fa-users-cog', '6', 'Active', '', '', '1', '12-08-2022 02:21:19pm', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `modulepermission`
--

CREATE TABLE `modulepermission` (
  `modulepermission_id` int(20) NOT NULL,
  `modulemenu_id` varchar(20) NOT NULL,
  `modulesubmenu_id` varchar(20) NOT NULL,
  `moduleuser_id` varchar(20) NOT NULL,
  `modulepermission` varchar(10) NOT NULL,
  `createdby` varchar(20) NOT NULL,
  `createdtime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modulepermission`
--

INSERT INTO `modulepermission` (`modulepermission_id`, `modulemenu_id`, `modulesubmenu_id`, `moduleuser_id`, `modulepermission`, `createdby`, `createdtime`) VALUES
(1, '1', '1', '1', 'Yes', '', ''),
(2, '1', '1', '9', 'Yes', '', ''),
(3, '1', '2', '1', 'Yes', '', ''),
(4, '1', '2', '9', 'Yes', '', ''),
(5, '1', '3', '1', 'Yes', '', ''),
(6, '1', '3', '9', 'Yes', '', ''),
(7, '1', '4', '1', 'Yes', '', ''),
(8, '1', '4', '9', 'Yes', '', ''),
(9, '1', '5', '1', 'Yes', '', ''),
(10, '1', '5', '9', 'Yes', '', ''),
(11, '1', '6', '1', 'Yes', '', ''),
(12, '1', '6', '9', 'Yes', '', ''),
(13, '1', '7', '1', 'Yes', '', ''),
(14, '1', '7', '9', 'Yes', '', ''),
(15, '2', '8', '1', 'Yes', '', ''),
(16, '2', '8', '9', 'Yes', '', ''),
(17, '2', '9', '1', 'Yes', '', ''),
(18, '2', '9', '9', 'Yes', '', ''),
(19, '3', '10', '1', 'Yes', '', ''),
(20, '3', '10', '9', 'Yes', '', ''),
(21, '3', '11', '1', 'Yes', '', ''),
(22, '3', '11', '9', 'Yes', '', ''),
(23, '3', '12', '1', 'Yes', '', ''),
(24, '3', '12', '9', 'Yes', '', ''),
(25, '3', '13', '1', 'Yes', '', ''),
(26, '3', '13', '9', 'Yes', '', ''),
(27, '3', '14', '1', 'Yes', '', ''),
(28, '3', '14', '9', 'Yes', '', ''),
(29, '3', '15', '1', 'Yes', '', ''),
(30, '3', '15', '9', 'Yes', '', ''),
(31, '3', '16', '1', 'Yes', '', ''),
(32, '3', '16', '9', 'Yes', '', ''),
(33, '4', '17', '1', 'Yes', '', ''),
(34, '4', '17', '9', 'Yes', '', ''),
(35, '4', '18', '1', 'Yes', '', ''),
(36, '4', '18', '9', 'Yes', '', ''),
(37, '4', '19', '1', 'Yes', '', ''),
(38, '4', '19', '9', 'Yes', '', ''),
(39, '4', '20', '1', 'Yes', '', ''),
(40, '4', '20', '9', 'Yes', '', ''),
(41, '4', '21', '1', 'Yes', '', ''),
(42, '4', '21', '9', 'Yes', '', ''),
(43, '4', '22', '1', 'Yes', '', ''),
(44, '4', '22', '9', 'Yes', '', ''),
(45, '5', '23', '1', 'Yes', '', ''),
(46, '5', '23', '9', 'Yes', '', ''),
(47, '5', '24', '1', 'Yes', '', ''),
(48, '5', '24', '9', 'Yes', '', ''),
(49, '5', '25', '1', 'Yes', '', ''),
(50, '5', '25', '9', 'Yes', '', ''),
(51, '5', '26', '1', 'Yes', '', ''),
(52, '5', '26', '9', 'Yes', '', ''),
(53, '5', '27', '1', 'Yes', '', ''),
(54, '5', '27', '9', 'Yes', '', ''),
(55, '5', '28', '1', 'Yes', '', ''),
(56, '5', '28', '9', 'Yes', '', ''),
(57, '5', '29', '1', 'Yes', '', ''),
(58, '5', '29', '9', 'Yes', '', ''),
(59, '6', '30', '1', 'Yes', '', ''),
(60, '6', '30', '9', 'Yes', '', ''),
(61, '6', '31', '1', 'Yes', '', ''),
(62, '6', '31', '9', 'Yes', '', ''),
(63, '6', '32', '1', 'Yes', '', ''),
(64, '6', '32', '9', 'Yes', '', ''),
(65, '6', '33', '1', 'Yes', '', ''),
(66, '6', '33', '9', 'Yes', '', ''),
(67, '6', '34', '1', 'Yes', '', ''),
(68, '6', '34', '9', 'Yes', '', ''),
(69, '6', '35', '1', 'Yes', '', ''),
(70, '6', '35', '9', 'Yes', '', ''),
(71, '6', '36', '1', 'Yes', '', ''),
(72, '6', '36', '9', 'Yes', '', ''),
(73, '6', '37', '1', 'Yes', '', ''),
(74, '6', '37', '9', 'Yes', '', ''),
(75, '6', '38', '1', 'Yes', '', ''),
(76, '6', '38', '9', 'Yes', '', ''),
(77, '6', '39', '1', 'Yes', '', ''),
(78, '6', '39', '9', 'Yes', '', ''),
(79, '6', '40', '1', 'Yes', '', ''),
(80, '6', '40', '9', 'Yes', '', ''),
(108, '6', '41', '1', 'Yes', '', ''),
(109, '6', '41', '9', 'Yes', '', ''),
(112, '2', '42', '1', 'Yes', '', ''),
(113, '2', '42', '9', 'Yes', '', ''),
(260, '3', '15', '36', 'Yes', '1', '18-09-2022 03:48:05pm'),
(261, '4', '17', '36', 'Yes', '1', '18-09-2022 03:48:05pm'),
(262, '4', '18', '36', 'Yes', '1', '18-09-2022 03:48:05pm'),
(263, '3', '15', '37', 'Yes', '1', '18-09-2022 03:48:05pm'),
(264, '4', '17', '37', 'Yes', '1', '18-09-2022 03:48:05pm'),
(265, '4', '18', '37', 'Yes', '1', '18-09-2022 03:48:05pm'),
(266, '3', '15', '38', 'Yes', '1', '18-09-2022 03:48:05pm'),
(267, '4', '17', '38', 'Yes', '1', '18-09-2022 03:48:05pm'),
(268, '4', '18', '38', 'Yes', '1', '18-09-2022 03:48:05pm'),
(269, '3', '15', '39', 'Yes', '1', '18-09-2022 03:48:05pm'),
(270, '4', '17', '39', 'Yes', '1', '18-09-2022 03:48:05pm'),
(271, '4', '18', '39', 'Yes', '1', '18-09-2022 03:48:05pm'),
(272, '3', '15', '40', 'Yes', '1', '18-09-2022 03:48:05pm'),
(273, '4', '17', '40', 'Yes', '1', '18-09-2022 03:48:05pm'),
(274, '4', '18', '40', 'Yes', '1', '18-09-2022 03:48:05pm'),
(275, '3', '15', '41', 'Yes', '1', '18-09-2022 03:48:05pm'),
(276, '4', '17', '41', 'Yes', '1', '18-09-2022 03:48:05pm'),
(277, '4', '18', '41', 'Yes', '1', '18-09-2022 03:48:05pm'),
(278, '3', '15', '43', 'Yes', '1', '18-09-2022 03:48:05pm'),
(279, '4', '17', '43', 'Yes', '1', '18-09-2022 03:48:05pm'),
(280, '4', '18', '43', 'Yes', '1', '18-09-2022 03:48:05pm'),
(281, '3', '15', '44', 'Yes', '1', '18-09-2022 03:48:05pm'),
(282, '4', '17', '44', 'Yes', '1', '18-09-2022 03:48:05pm'),
(283, '4', '18', '44', 'Yes', '1', '18-09-2022 03:48:05pm'),
(284, '3', '15', '45', 'Yes', '1', '18-09-2022 03:48:05pm'),
(285, '4', '17', '45', 'Yes', '1', '18-09-2022 03:48:05pm'),
(286, '4', '18', '45', 'Yes', '1', '18-09-2022 03:48:05pm'),
(287, '3', '43', '1', 'Yes', '', ''),
(288, '3', '43', '9', 'Yes', '', ''),
(293, '3', '44', '1', 'Yes', '', ''),
(294, '3', '44', '9', 'Yes', '', ''),
(295, '3', '43', '46', 'Yes', '1', '29-09-2022 03:35:29pm'),
(296, '3', '15', '46', 'Yes', '1', '29-09-2022 03:35:29pm'),
(297, '4', '17', '46', 'Yes', '1', '29-09-2022 03:35:29pm'),
(298, '4', '18', '46', 'Yes', '1', '29-09-2022 03:35:29pm'),
(299, '3', '45', '1', 'Yes', '', ''),
(300, '3', '45', '9', 'Yes', '', ''),
(301, '1', '1', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(302, '1', '2', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(303, '1', '3', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(304, '1', '4', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(305, '1', '5', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(306, '1', '6', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(307, '1', '7', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(308, '2', '42', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(309, '2', '8', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(310, '2', '9', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(311, '3', '10', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(312, '3', '11', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(313, '3', '12', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(314, '3', '13', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(315, '3', '14', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(316, '3', '15', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(317, '3', '43', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(318, '3', '44', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(319, '3', '16', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(320, '3', '45', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(321, '4', '17', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(322, '4', '18', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(323, '4', '19', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(324, '4', '20', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(325, '4', '21', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(326, '4', '22', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(327, '5', '23', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(328, '5', '24', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(329, '5', '25', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(330, '5', '26', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(331, '5', '27', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(332, '5', '28', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(333, '5', '29', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(334, '6', '30', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(335, '6', '31', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(336, '6', '32', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(337, '6', '33', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(338, '6', '34', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(339, '6', '35', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(340, '6', '36', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(341, '6', '41', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(342, '6', '37', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(343, '6', '40', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(344, '6', '39', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(345, '6', '38', '35', 'Yes', '35', '17-10-2022 09:48:36am'),
(346, '1', '46', '1', 'Yes', '', ''),
(347, '1', '46', '9', 'Yes', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `mst_subjectpermission`
--

CREATE TABLE `mst_subjectpermission` (
  `permission_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `subjectpermission` varchar(100) NOT NULL,
  `addby` varchar(100) NOT NULL,
  `created` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_subjectpermission`
--

INSERT INTO `mst_subjectpermission` (`permission_id`, `c_id`, `sub_id`, `id`, `subjectpermission`, `addby`, `created`) VALUES
(66, 211, 1, 9, 'True', '1', ''),
(67, 221, 1, 9, 'True', '1', ''),
(68, 245, 1, 9, 'True', '1', ''),
(69, 185, 1, 9, 'True', '1', ''),
(70, 189, 1, 9, 'True', '1', ''),
(121, 211, 1, 1, 'True', '1', '07-06-2022 03:26:46pm'),
(122, 221, 1, 1, 'True', '1', '07-06-2022 03:26:46pm'),
(123, 245, 1, 1, 'True', '1', '07-06-2022 03:26:46pm'),
(124, 185, 1, 1, 'True', '1', '07-06-2022 03:26:46pm'),
(125, 189, 1, 1, 'True', '1', '07-06-2022 03:26:46pm'),
(241, 211, 1, 35, 'True', '1', '06-09-2022 01:37:51pm'),
(242, 221, 1, 35, 'True', '1', '06-09-2022 01:37:51pm'),
(243, 245, 1, 35, 'True', '1', '06-09-2022 01:37:51pm'),
(244, 185, 1, 35, 'True', '1', '06-09-2022 01:37:51pm'),
(245, 189, 1, 35, 'True', '1', '06-09-2022 01:37:51pm'),
(246, 185, 1, 36, 'True', '35', '09-09-2022 10:47:58am'),
(247, 245, 1, 37, 'True', '1', '10-09-2022 11:50:04am'),
(248, 245, 1, 38, 'True', '1', '10-09-2022 11:50:04am'),
(249, 245, 1, 39, 'True', '1', '10-09-2022 11:50:04am'),
(250, 245, 1, 40, 'True', '1', '10-09-2022 11:50:04am'),
(253, 211, 1, 44, 'True', '1', '13-09-2022 11:29:02am'),
(254, 221, 1, 44, 'True', '1', '13-09-2022 11:29:02am'),
(255, 245, 1, 45, 'True', '1', '13-09-2022 12:26:28pm'),
(257, 185, 1, 41, 'True', '1', '13-09-2022 08:52:06pm'),
(258, 189, 1, 41, 'True', '1', '13-09-2022 08:52:06pm'),
(265, 211, 0, 43, 'False', '1', '17-09-2022 09:40:29am'),
(266, 221, 0, 43, 'False', '1', '17-09-2022 09:40:29am'),
(267, 245, 0, 43, 'True', '1', '17-09-2022 09:40:29am'),
(268, 185, 0, 43, 'False', '1', '17-09-2022 09:40:29am'),
(269, 189, 0, 43, 'False', '1', '17-09-2022 09:40:29am'),
(270, 211, 1, 46, 'True', '1', '20-09-2022 01:16:38pm'),
(271, 221, 1, 46, 'True', '1', '20-09-2022 01:16:38pm'),
(272, 245, 1, 46, 'True', '1', '20-09-2022 01:16:38pm'),
(273, 185, 1, 46, 'True', '1', '20-09-2022 01:16:38pm'),
(274, 189, 1, 46, 'True', '1', '20-09-2022 01:16:38pm'),
(275, 251, 0, 1, 'True', '', '22-10-2022 09:57:04pm'),
(276, 251, 0, 9, 'True', '', '22-10-2022 09:57:04pm');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `school_id` int(11) NOT NULL,
  `school_name` varchar(200) NOT NULL,
  `school_code` varchar(6) NOT NULL,
  `admission_number_starting` varchar(10) NOT NULL,
  `school_srtname` varchar(50) NOT NULL,
  `school_photo` varchar(100) NOT NULL,
  `school_number` varchar(200) NOT NULL,
  `school_email` varchar(200) NOT NULL,
  `school_address` varchar(200) NOT NULL,
  `school_country` varchar(100) NOT NULL,
  `school_state` varchar(100) NOT NULL,
  `school_district` varchar(100) NOT NULL,
  `school_city` varchar(100) NOT NULL,
  `school_pincode` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `own_filled` varchar(10) NOT NULL,
  `createdby` varchar(100) NOT NULL,
  `createdtime` varchar(100) NOT NULL,
  `updateby` varchar(100) NOT NULL,
  `updatetime` varchar(100) NOT NULL,
  `disableby` varchar(100) NOT NULL,
  `disabletime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`school_id`, `school_name`, `school_code`, `admission_number_starting`, `school_srtname`, `school_photo`, `school_number`, `school_email`, `school_address`, `school_country`, `school_state`, `school_district`, `school_city`, `school_pincode`, `status`, `own_filled`, `createdby`, `createdtime`, `updateby`, `updatetime`, `disableby`, `disabletime`) VALUES
(1, 'Graphic Era (Demeed To Be University)', '8767', '', 'GEU', 'geu-logo-1.png', '7302020015', 'graphicera@gmail.com', 'CLEMENT TOWN', 'India', 'Uttarakhand', 'Dehradun', 'Dehradun', '248002', 'Active', 'Yes', '1', '19-02-2022 10:52:16pm', '1', '18-06-2022 01:19:41am', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `section_detail`
--

CREATE TABLE `section_detail` (
  `section_id` int(11) NOT NULL,
  `section_name` varchar(50) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `school_id` varchar(10) NOT NULL,
  `department_id` varchar(10) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `session` varchar(20) NOT NULL,
  `disablereason` varchar(100) NOT NULL,
  `activerreason` varchar(100) NOT NULL,
  `createdby` varchar(10) NOT NULL,
  `createdtime` varchar(20) NOT NULL,
  `updateby` varchar(30) NOT NULL,
  `updatetime` varchar(30) NOT NULL,
  `disableby` varchar(30) NOT NULL,
  `disabletime` varchar(30) NOT NULL,
  `activeby` varchar(20) NOT NULL,
  `activetime` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section_detail`
--

INSERT INTO `section_detail` (`section_id`, `section_name`, `semester`, `school_id`, `department_id`, `course_id`, `status`, `session`, `disablereason`, `activerreason`, `createdby`, `createdtime`, `updateby`, `updatetime`, `disableby`, `disabletime`, `activeby`, `activetime`) VALUES
(1, 'A', '1', '1', '1', '211', 'Active', '', '', '', '1', '23-10-2022 08:57:43a', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `session_year` varchar(10) NOT NULL,
  `full_year` varchar(10) NOT NULL,
  `fyear` varchar(5) NOT NULL,
  `last_year` varchar(10) NOT NULL,
  `lyear` varchar(5) NOT NULL,
  `f_date` varchar(15) NOT NULL,
  `l_date` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL,
  `createdby` varchar(100) NOT NULL,
  `createdtime` varchar(30) NOT NULL,
  `updateby` varchar(100) NOT NULL,
  `updatetime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `session_year`, `full_year`, `fyear`, `last_year`, `lyear`, `f_date`, `l_date`, `status`, `createdby`, `createdtime`, `updateby`, `updatetime`) VALUES
(2, '2022-2023', '2022', '22', '2023', '23', '2022-01-01', '2023-01-01', 'Active', '1', '08-04-2022 09:10:56pm', '1', '22-08-2022 03:21:02pm'),
(3, '2023-2024', '2023', '23', '2024', '24', '2023-01-01', '2024-01-01', 'InActive', '1', '08-04-2022 09:45:39pm', '1', '19-05-2022 01:20:40am');

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE `submenu` (
  `submenu_id` int(20) NOT NULL,
  `menu_id` varchar(30) NOT NULL,
  `submenu_name` varchar(30) NOT NULL,
  `submenu_url` varchar(30) NOT NULL,
  `submenu_order` varchar(10) NOT NULL,
  `submenu_display` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `disablereason` varchar(100) NOT NULL,
  `activereason` varchar(100) NOT NULL,
  `createdby` varchar(30) NOT NULL,
  `createdtime` varchar(30) NOT NULL,
  `updateby` varchar(30) NOT NULL,
  `updatetime` varchar(30) NOT NULL,
  `disableby` varchar(30) NOT NULL,
  `disabletime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`submenu_id`, `menu_id`, `submenu_name`, `submenu_url`, `submenu_order`, `submenu_display`, `status`, `disablereason`, `activereason`, `createdby`, `createdtime`, `updateby`, `updatetime`, `disableby`, `disabletime`) VALUES
(1, '1', 'Department', 'department.php', '1', 'Yes', 'Active', '', '', '1', '13-08-2022 05:49:18pm', '', '', '', ''),
(2, '1', 'View Course', 'course.php', '2', 'Yes', 'Active', '', '', '1', '13-08-2022 05:49:54pm', '', '', '', ''),
(3, '1', 'Update Course', 'update_course.php', '3', 'No', 'Active', '', '', '1', '13-08-2022 05:53:17pm', '', '', '', ''),
(4, '1', 'Delete Course', 'course_delete.php', '4', 'No', 'Active', '', '', '1', '13-08-2022 05:54:04pm', '', '', '', ''),
(5, '1', 'Add Course', 'add_course.php', '5', 'Yes', 'Active', '', '', '1', '13-08-2022 05:59:27pm', '', '', '', ''),
(23, '5', 'Add Session', 'session.php', '1', 'Yes', 'Active', '', '', '1', '13-08-2022 06:20:21pm', '', '', '', ''),
(24, '5', 'College Detail', 'school.php', '2', 'Yes', 'Active', '', '', '1', '13-08-2022 06:20:59pm', '', '', '', ''),
(25, '5', 'Add User', 'user.php', '3', 'Yes', 'Active', '', '', '1', '13-08-2022 06:21:49pm', '', '', '', ''),
(26, '5', 'Update User', 'update_user.php', '4', 'No', 'Active', '', '', '1', '13-08-2022 06:22:45pm', '', '', '', ''),
(27, '5', 'User Delete', 'user_delete.php', '5', 'No', 'Active', '', '', '1', '13-08-2022 06:23:41pm', '', '', '', ''),
(28, '5', 'Password Reset', 'password_reset.php', '6', 'Yes', 'Active', '', '', '1', '13-08-2022 06:25:52pm', '', '', '', ''),
(29, '5', 'Database Backup', 'database.php', '7', 'Yes', 'Active', '', '', '1', '13-08-2022 06:26:20pm', '', '', '', ''),
(30, '6', 'Menu', 'menu.php', '1', 'Yes', 'Active', '', '', '1', '13-08-2022 06:26:48pm', '', '', '', ''),
(31, '6', 'Menu Update', 'menu_update.php', '2', 'No', 'Active', '', '', '1', '13-08-2022 06:27:56pm', '', '', '', ''),
(32, '6', 'Menu Delete', 'menu_delete.php', '3', 'No', 'Active', '', '', '1', '13-08-2022 06:28:27pm', '', '', '', ''),
(33, '6', 'Sub Menu', 'submenu.php', '4', 'Yes', 'Active', '', '', '1', '13-08-2022 06:29:23pm', '', '', '', ''),
(34, '6', 'SubMenu Update', 'submenu_update.php', '5', 'No', 'Active', '', '', '1', '13-08-2022 06:29:52pm', '', '', '', ''),
(35, '6', 'SubMenu Delete', 'submenu_delete.php', '6', 'No', 'Active', '', '', '1', '13-08-2022 06:30:31pm', '', '', '', ''),
(36, '6', 'User Permission', 'userpermission.php', '7', 'Yes', 'Active', '', '', '1', '13-08-2022 06:31:32pm', '', '', '', ''),
(37, '6', 'Module Permission', 'permission.php', '8', 'No', 'Active', '', '', '1', '13-08-2022 06:32:28pm', '', '', '', ''),
(38, '6', 'Course Permission', 'student_permission.php', '9', 'No', 'Active', '', '', '1', '13-08-2022 06:33:25pm', '', '', '', ''),
(39, '6', 'Bulk Permission Withdrawal', 'BulkPermissionWithdrawal.php', '9', 'Yes', 'Active', '', '', '1', '14-08-2022 11:46:26pm', '', '', '', ''),
(40, '6', 'Bulk Module Permission', 'BulkModulePermission.php', '8', 'Yes', 'Active', '', '', '1', '17-08-2022 02:11:30am', '', '', '', ''),
(41, '6', 'Bulk Course Permission', 'BulkCoursePermission.php', '8', 'Yes', 'Active', '', '', '1', '17-08-2022 11:29:52am', '', '', '', ''),
(46, '1', 'Add Section', 'add_section.php', '6', 'Yes', 'Active', '', '', '1', '22-10-2022 09:45:01pm', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hash_password` varchar(255) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `number` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `disablereason` varchar(300) NOT NULL,
  `activereason` varchar(300) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `oldpass` varchar(100) NOT NULL,
  `session` varchar(20) NOT NULL,
  `createdby` varchar(50) NOT NULL,
  `createdtime` varchar(50) NOT NULL,
  `updateby` varchar(100) NOT NULL,
  `updatetime` varchar(100) NOT NULL,
  `disableby` varchar(50) NOT NULL,
  `disabletime` varchar(50) NOT NULL,
  `password_reset_by` varchar(10) NOT NULL,
  `password_reset_time` varchar(30) NOT NULL,
  `forget_password_time` varchar(100) NOT NULL,
  `change_pass_time` varchar(100) NOT NULL,
  `wrong_pass_count` int(10) NOT NULL,
  `wrong_pass_time` varchar(30) NOT NULL,
  `wrong_pass_reset_type` varchar(20) NOT NULL,
  `current_session` varchar(20) NOT NULL,
  `statusactivereason` varchar(100) NOT NULL,
  `statusactiveby` varchar(20) NOT NULL,
  `statusactivetime` varchar(30) NOT NULL,
  `usercourse_id` varchar(20) NOT NULL,
  `usersection` varchar(20) NOT NULL,
  `usersemester` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `middle_name`, `last_name`, `login`, `user_id`, `password`, `hash_password`, `dob`, `number`, `email`, `photo`, `type`, `status`, `disablereason`, `activereason`, `pass`, `oldpass`, `session`, `createdby`, `createdtime`, `updateby`, `updatetime`, `disableby`, `disabletime`, `password_reset_by`, `password_reset_time`, `forget_password_time`, `change_pass_time`, `wrong_pass_count`, `wrong_pass_time`, `wrong_pass_reset_type`, `current_session`, `statusactivereason`, `statusactiveby`, `statusactivetime`, `usercourse_id`, `usersection`, `usersemester`) VALUES
(1, 'superuser', '', '', 'superuser', '', 'e4f87d265bd57f49ceb6470e59f1f20a5d6a25bd', 'e4f87d265bd57f49ceb6470e59f1f20a5d6a25bd', '2000-09-19', '', '', 'paritosh bisht.jpg', 'superuser', 'Active', '', '', '', '', '', '', '', '1', '03-09-2022 07:11:10pm', '', '', '', '', '', '', 0, '17-08-2022', '', '2022-2023', '', '', '', '', '', ''),
(9, 'KAMLESH', 'CHANDRA', 'PUROHIT', 'kamlesh purohit', 'U228767001', '70457a8b9835727a2a0aff2f87af1681acd94447', 'e4f87d265bd57f49ceb6470e59f1f20a5d6a25bd', '1980-12-20', '9412933728', 'kamleshpurohit80@gmail.com', 'E_8296.JPG', 'superuser', 'Active', '', '', 'Chandra@987', 'kamlesh purohit', '2022-2023', '1', '01-06-2022 07:58:51pm', '1', '18-06-2022 01:34:58am', '', '', '1', '02-06-2022 11:03:06am', '', '02-06-2022 03:39:46pm', 0, '13-06-2022', '', '2022-2023', '', '', '', '', '', ''),
(35, 'Dinesh', 'Chandra', 'Dobhal', 'dineshdobhal', 'U228767002', 'c4f981c9b4a0661ef9bfedb6bf23dc733a134e81', 'e4f87d265bd57f49ceb6470e59f1f20a5d6a25bd', '1979-03-19', '9456744499', 'dineshbobhal@gmail.com', '', 'admin', 'Active', '', '', 'Pkk1din@', 'dineshdobhal', '2022-2023', '1', '06-09-2022 01:32:18pm', '1', '06-09-2022 01:32:41pm', '', '', '1', '06-09-2022 01:32:52pm', '', '06-09-2022 01:36:47pm', 0, '07-10-2022', 'admin', '2022-2023', '', '', '', '', '', ''),
(36, 'Bhavya', '', 'Agarwal', 'U228767003', 'U228767003', '20cde0e231719c29bcb9def5fcf44cfc86cd50a6', 'e4f87d265bd57f49ceb6470e59f1f20a5d6a25bd', '2000-01-19', '7906646224', 'bhavyaagarwal190@gmail.com', '20211109_134007.jpg', 'user', 'Active', '', '', 'b3BDRVal', 'U228767003', '2022-2023', '35', '09-09-2022 10:10:00am', '', '', '', '', '', '', '14-09-2022 05:31:14pm', '10-09-2022 08:27:20pm', 0, '', '', '2022-2023', 'for MCA III contribution collection ', '35', '09-09-2022 10:47:25am', '', '', ''),
(37, 'Simrat ', 'kaur', 'Dua', 'U228767004', 'U228767004', '23773b926052766acb3db16de4d372069895f800', 'e4f87d265bd57f49ceb6470e59f1f20a5d6a25bd', '2003-03-13', '8003443717', 'simratkaurdua@gmail.com', 'SI_20220715_150421.jpg', 'user', 'Active', '', '', 'aJr7YGO$', '', '2022-2023', '1', '09-09-2022 11:25:07am', '', '', '', '', '', '', '11-09-2022 10:52:57am', '', 0, '', '', '2022-2023', 'User Approve As per Order for Ferseher Collection', '1', '10-09-2022 11:49:21am', '', '', ''),
(38, 'Satyam ', '', 'Kumar', 'U228767005', 'U228767005', '41793a2cdb10d292e016e1622aea676532e95f7b', 'e4f87d265bd57f49ceb6470e59f1f20a5d6a25bd', '2001-09-05', '7903993881', 'satyam0102kumar@gmail.com', 'Screenshot_2022-09-09-11-34-43-04_99c04817c0de5652397fc8b56c3b3817.jpg', 'user', 'Active', '', '', 'Satyam@123', 'U228767005', '2022-2023', '1', '09-09-2022 11:36:01am', '', '', '', '', '', '', '', '10-09-2022 08:23:23pm', 0, '', '', '2022-2023', 'User Approve As per Order for Ferseher Collection', '1', '10-09-2022 11:49:21am', '', '', ''),
(39, 'Kanishk', '', 'Singh', 'U228767006', 'U228767006', 'a745d905826086adff383a1bfd95d2b887cb898b', 'e4f87d265bd57f49ceb6470e59f1f20a5d6a25bd', '2003-06-30', '7037849344', 'kanishksingh02918@gmail.com', '', 'user', 'Active', '', '', 'Dehradun2003', 'U228767006', '2022-2023', '1', '09-09-2022 08:40:18pm', '', '', '', '', '', '', '', '10-09-2022 08:06:38pm', 0, '', '', '2022-2023', 'User Approve As per Order for Ferseher Collection', '1', '10-09-2022 11:49:21am', '', '', ''),
(40, 'Vidushi ', '', 'Kaushik ', 'U228767007', 'U228767007', '2d50c3b9d9c5c0dbd72d59d92fc8039fbba148af', 'e4f87d265bd57f49ceb6470e59f1f20a5d6a25bd', '2003-07-24', '9548210997', 'vidusshikaushik007@gmail.com', '', 'user', 'Active', '', '', 'Vidushi@2403', 'U228767007', '2022-2023', '1', '09-09-2022 08:55:54pm', '', '', '', '', '', '', '', '11-09-2022 10:23:44am', 0, '', '', '2022-2023', 'User Approve As per Order for Ferseher Collection', '1', '10-09-2022 11:49:21am', '', '', ''),
(41, 'Harshwardhan ', '', 'Sajwan', 'U228767008', 'U228767008', '582ad7134e3d2dc08dd5d41a80554a8efd37ae56', 'e4f87d265bd57f49ceb6470e59f1f20a5d6a25bd', '2001-07-03', '8859101523', 'somusajwan4a@gmail.com', 'Screenshot_20220910-101944_Gallery.jpg', 'user', 'Active', '', '', 'AyleboGI', '', '2022-2023', '1', '10-09-2022 10:20:08am', '', '', '', '', '', '', '11-09-2022 10:37:13am', '', 0, '23-09-2022', '', '2022-2023', 'User Approve As per Order for Ferseher Collection', '1', '10-09-2022 11:49:21am', '', '', ''),
(42, 'Simrat ', 'Kaur ', 'Dua', 'U228767009', 'U228767009', '117fee7bc1888293b42bb64640cebbba8bef3d18', 'e4f87d265bd57f49ceb6470e59f1f20a5d6a25bd', '2003-03-13', '8003443717', 'simratkaurdua@gmail.com', 'SI_20220715_150439.jpg', 'user', 'Cancel', '', '', '', '', '2022-2023', '1', '11-09-2022 10:47:23am', '', '', '', '', '', '', '', '', 1, '11-09-2022', '', '', 'dual Account entry', '1', '11-09-2022 11:15:21am', '', '', ''),
(43, 'Radhika ', '', 'Rayal', 'U228767010', 'U228767010', '2cd9261dbb191e08ad4c85bed3b669728cc465f2', 'e4f87d265bd57f49ceb6470e59f1f20a5d6a25bd', '2003-11-22', '7830708009', 'rayalradhika03@gmail.com', '', 'user', 'Active', '', '', 'Rrayal03', 'U228767010', '2022-2023', '1', '11-09-2022 11:34:05am', '', '', '', '', '', '', '', '11-09-2022 11:53:17am', 0, '', '', '2022-2023', 'User Approve As per Order for Ferseher Collection', '1', '11-09-2022 11:44:57am', '', '', ''),
(44, 'ANSH', '', 'GUJRAL', 'anshgujral', 'U228767011', 'ea472a27ddfbd0fec6d2c09e31f5167ad37afc40', 'e4f87d265bd57f49ceb6470e59f1f20a5d6a25bd', '2003-09-01', '8979754244', 'ANSHGUJRAL244@GMAIL.COM', '20191219042158_IMG_7931.JPG', 'user', 'Active', '', '', 'Anshgujral@123', 'anshgujral', '2022-2023', '1', '12-09-2022 11:04:51pm', '1', '13-09-2022 12:17:07pm', '', '', '1', '13-09-2022 12:17:21pm', '', '13-09-2022 12:18:45pm', 0, '', '', '2022-2023', 'User Approve As per Order for Ferseher Collection', '1', '13-09-2022 11:28:39am', '', '', ''),
(45, 'Divanshi ', '', 'Rawat ', 'U228767012', 'U228767012', '402d6f27d0c469261bb40aa90e25b859a96b875f', 'e4f87d265bd57f49ceb6470e59f1f20a5d6a25bd', '2003-07-23', '7983693684', 'rawatdivanshi1306@gmail.com', 'Screenshot_20220913-122419_Gallery.jpg', 'user', 'Active', '', '', 'Divanshi23', 'U228767012', '2022-2023', '1', '13-09-2022 12:25:34pm', '', '', '', '', '', '', '', '13-09-2022 12:29:27pm', 0, '', '', '2022-2023', 'User Approve As per Order for Ferseher Collection', '1', '13-09-2022 12:25:48pm', '', '', ''),
(46, 'Prashant', '', 'Rohila', 'prashant', 'U228767013', 'f2780ff8311b9967031bef1a012ea4b2057181f0', 'e4f87d265bd57f49ceb6470e59f1f20a5d6a25bd', '2000-07-01', '8077379286', 'rprashant264@gmail.com', '14113318-4879-41FD-AD8C-291D2C573D84.jpeg', 'admin', 'Active', '', '', '#Prashant264', 'prashant', '2022-2023', '1', '20-09-2022 01:11:06pm', '1', '20-09-2022 01:12:18pm', '', '', '1', '20-09-2022 01:13:10pm', '', '20-09-2022 01:16:04pm', 0, '', '', '2022-2023', 'User Approve As per Order for Ferseher Collection', '1', '20-09-2022 01:11:33pm', '', '', ''),
(47, 'Charlotte', 'Fay Fuentes', 'Massey', 'U228767014', 'U228767014', 'e5efa58622e56aa89688370c0f92f2449263849c', '', '2004-08-23', '165', 'zonares@mailinator.com', '', 'user', 'Pending', '', '', '', '', '2022-2023', '', '07-10-2022 12:00:21pm', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '185', 'G', '2'),
(48, 'test', '', '', 'U228767015', 'U228767015', '481fde87aee7b1517d8189b4fbe0d0cc6f64a6dd', '', '2000-09-19', '0', 'test@gmail.com', '', 'user', 'Pending', '', '', '', '', '2022-2023', '', '07-10-2022 09:43:56pm', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '211', 'A', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advancesetting`
--
ALTER TABLE `advancesetting`
  ADD PRIMARY KEY (`popupid`);

--
-- Indexes for table `course_detail`
--
ALTER TABLE `course_detail`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `logindetail`
--
ALTER TABLE `logindetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `modulepermission`
--
ALTER TABLE `modulepermission`
  ADD PRIMARY KEY (`modulepermission_id`);

--
-- Indexes for table `mst_subjectpermission`
--
ALTER TABLE `mst_subjectpermission`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `section_detail`
--
ALTER TABLE `section_detail`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`submenu_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advancesetting`
--
ALTER TABLE `advancesetting`
  MODIFY `popupid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `course_detail`
--
ALTER TABLE `course_detail`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logindetail`
--
ALTER TABLE `logindetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `modulepermission`
--
ALTER TABLE `modulepermission`
  MODIFY `modulepermission_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=348;

--
-- AUTO_INCREMENT for table `mst_subjectpermission`
--
ALTER TABLE `mst_subjectpermission`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `section_detail`
--
ALTER TABLE `section_detail`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `submenu_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
