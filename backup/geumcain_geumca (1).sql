-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 28, 2023 at 04:00 PM
-- Server version: 5.7.23-23
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `geumcain_geumca`
--

-- --------------------------------------------------------

--
-- Table structure for table `academiccalender`
--

CREATE TABLE `academiccalender` (
  `academiccalender_id` int(11) NOT NULL,
  `academiccalender_session` varchar(20) NOT NULL,
  `academiccalender_type` varchar(20) NOT NULL,
  `academiccalender_file` varchar(50) NOT NULL,
  `academiccalender_display` varchar(10) NOT NULL,
  `academiccalender_status` varchar(10) NOT NULL,
  `academiccalender_createdby` varchar(20) NOT NULL,
  `academiccalender_createdtime` varchar(30) NOT NULL,
  `academiccalender_disableby` varchar(20) NOT NULL,
  `academiccalender_disabletime` varchar(30) NOT NULL,
  `academiccalender_disablereason` varchar(200) NOT NULL,
  `academiccalender_displaycloseby` varchar(20) NOT NULL,
  `academiccalender_displayclosetime` varchar(30) NOT NULL,
  `academiccalender_showby` varchar(20) NOT NULL,
  `academiccalender_showdatetime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `academiccalender`
--

INSERT INTO `academiccalender` (`academiccalender_id`, `academiccalender_session`, `academiccalender_type`, `academiccalender_file`, `academiccalender_display`, `academiccalender_status`, `academiccalender_createdby`, `academiccalender_createdtime`, `academiccalender_disableby`, `academiccalender_disabletime`, `academiccalender_disablereason`, `academiccalender_displaycloseby`, `academiccalender_displayclosetime`, `academiccalender_showby`, `academiccalender_showdatetime`) VALUES
(1, '2022-2023', 'Even_Semester', 'academiccalender_150320231678875655.pdf', 'Active', 'Active', '1', '15-03-2023 03:50:55pm', '', '', '', '65', '2023-03-16 02:49:38pm', '65', '2023-03-16 02:49:49pm');

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
(1, 'captcha', 'InActive', 'Active', '1', '24-04-2022 12:48:07pm', '1', '15-03-2023 01:35:31pm', '1', '15-03-2023 01:35:43pm'),
(2, 'Birthday message', 'Active', 'Active', '1', '24-04-2022 02:17:58pm', '1', '09-03-2023 02:02:09pm', '1', '19-01-2023 01:40:57pm'),
(3, 'photo upload', 'Active', 'Active', '1', '03-09-2022 08:04:33pm', '1', '09-03-2023 02:02:05pm', '1', '01-03-2023 04:29:22pm');

-- --------------------------------------------------------

--
-- Table structure for table `campus`
--

CREATE TABLE `campus` (
  `campus_id` int(10) NOT NULL,
  `campus_name` varchar(100) NOT NULL,
  `campus_acroym` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `createdby` varchar(10) NOT NULL,
  `createdtime` varchar(30) NOT NULL,
  `updateby` varchar(10) NOT NULL,
  `updatetime` varchar(30) NOT NULL,
  `disableby` varchar(10) NOT NULL,
  `disabletime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campus`
--

INSERT INTO `campus` (`campus_id`, `campus_name`, `campus_acroym`, `status`, `createdby`, `createdtime`, `updateby`, `updatetime`, `disableby`, `disabletime`) VALUES
(1, 'Graphic Era (Demeed To Be University)', 'GEU', 'Active', '1', '', '', '', '', ''),
(2, 'Graphic Era Hill University-Dehradun', 'GEHU-DDN', 'Active', '', '', '', '', '', ''),
(3, 'Graphic Era Hill University-Bhimtal', 'GEHU-BTL', 'Active', '', '', '', '', '', ''),
(4, 'Graphic Era Hill University-Haldwani', 'GEHU-HLD', 'Active', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `campuspermission`
--

CREATE TABLE `campuspermission` (
  `campusp_id` int(20) NOT NULL,
  `permissioncampus_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `permissionuser_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `campuspermission_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `createdby` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `createdtime` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `campuspermission`
--

INSERT INTO `campuspermission` (`campusp_id`, `permissioncampus_id`, `permissionuser_id`, `campuspermission_status`, `createdby`, `createdtime`) VALUES
(1, '1', '1', 'True', '1', '19-11-2022 05:28:21am'),
(2, '2', '1', 'True', '1', '19-11-2022 05:28:21am'),
(3, '3', '1', 'True', '1', '19-11-2022 05:28:21am'),
(4, '4', '1', 'True', '1', '19-11-2022 05:28:21am');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `carousel_id` int(20) NOT NULL,
  `carousel_session` varchar(20) NOT NULL,
  `carousel_file` varchar(100) NOT NULL,
  `carousel_filealt` varchar(100) NOT NULL,
  `carousel_filelink` varchar(500) NOT NULL,
  `carousel_display` varchar(10) NOT NULL,
  `carousel_status` varchar(10) NOT NULL,
  `carousel_createdby` varchar(20) NOT NULL,
  `carousel_createdtime` varchar(30) NOT NULL,
  `carousel_updatedby` varchar(20) NOT NULL,
  `carousel_updatedtime` varchar(30) NOT NULL,
  `carousel_disableby` varchar(20) NOT NULL,
  `carousel_disabletime` varchar(30) NOT NULL,
  `carousel_disablereason` varchar(100) NOT NULL,
  `carousel_displaycloseby` varchar(20) NOT NULL,
  `carousel_displayclosetime` varchar(30) NOT NULL,
  `carousel_showby` varchar(20) NOT NULL,
  `Carousel_showdatetime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`carousel_id`, `carousel_session`, `carousel_file`, `carousel_filealt`, `carousel_filelink`, `carousel_display`, `carousel_status`, `carousel_createdby`, `carousel_createdtime`, `carousel_updatedby`, `carousel_updatedtime`, `carousel_disableby`, `carousel_disabletime`, `carousel_disablereason`, `carousel_displaycloseby`, `carousel_displayclosetime`, `carousel_showby`, `Carousel_showdatetime`) VALUES
(1, '2023-2024', 'carousel_100320231678467061.jpg', 'industry-collaboration-graphic-era', 'https://www.geu.ac.in/content/geu/en/placements.html', 'Active', 'Active', '', '10-03-2023 10:21:01pm', '', '', '', '', '', '', '', '', ''),
(2, '2023-2024', 'carousel_100320231678467138.jpg', 'series-online-lecture-graphic-era', 'https://www.geu.ac.in/content/geu/en/online-lecture.html', 'Active', 'Active', '', '10-03-2023 10:22:18pm', '', '', '', '', '', '', '', '', ''),
(3, '2023-2024', 'carousel_100320231678467217.jpg', 'NIRF 2022', '', 'Active', 'Active', '', '10-03-2023 10:23:37pm', '', '', '', '', '', '1', '2023-03-14 09:31:38am', '', ''),
(4, '2023-2024', 'carousel_100320231678467614.jpg', 'NAC A+ Photo', '', 'Active', 'Active', '', '10-03-2023 10:30:14pm', '', '', '', '', '', '', '', '', ''),
(5, '2023-2024', 'carousel_100320231678467658.jpg', 'Patent Granted', '', 'Active', 'Active', '', '10-03-2023 10:30:58pm', '', '', '', '', '', '', '', '', ''),
(6, '2023-2024', 'carousel_100320231678467670.jpg', 'vcsir-geu', '', 'Active', 'Active', '', '10-03-2023 10:31:10pm', '', '', '', '', '', '', '', '', ''),
(7, '2023-2024', 'carousel_100320231678467682.jpg', 'Website-Holi-2023', '', 'InActive', 'Active', '', '10-03-2023 10:31:22pm', '', '', '', '', '', '1', '2023-03-14 09:33:06am', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `contactus_id` int(20) NOT NULL,
  `contactus_session` varchar(20) NOT NULL,
  `contactus_name` varchar(100) NOT NULL,
  `contactus_email` varchar(100) NOT NULL,
  `contactus_subject` varchar(1000) NOT NULL,
  `contactus_number` varchar(15) NOT NULL,
  `contactus_message` varchar(1000) NOT NULL,
  `contactus_status` varchar(10) NOT NULL,
  `contactus_createddatetime` varchar(30) NOT NULL,
  `contactus_mailstatus` varchar(10) NOT NULL,
  `contactus_maildate` varchar(30) NOT NULL,
  `contactus_mailtime` varchar(30) NOT NULL,
  `contactus_mailreason` varchar(500) NOT NULL,
  `contactus_mailsenddatetime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course_detail`
--

CREATE TABLE `course_detail` (
  `course_id` int(11) NOT NULL,
  `course_id2` int(11) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `course_duration` varchar(50) NOT NULL,
  `course_acroym` varchar(50) NOT NULL,
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
  `department_id` varchar(10) NOT NULL,
  `course_type2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_detail`
--

INSERT INTO `course_detail` (`course_id`, `course_id2`, `course_name`, `course_duration`, `course_acroym`, `school_id`, `status`, `disablereason`, `activereason`, `createdby`, `createdtime`, `updateby`, `updatetime`, `disableby`, `disabletime`, `activeby`, `activetime`, `course_type`, `department_id`, `course_type2`) VALUES
(1, 185, 'Master of Computer Application', '2', 'MCA', '1', 'Active', '', '', '', '19-05-2022 12:38:15am', '', '', '', '', '', '', 'Yearly', '1', 'PG'),
(2, 189, 'MASTER OF SCIENCE - Information Technology', '2', 'M.sc (IT)', '1', 'Active', '', '', '', '19-05-2022 12:38:15am', '', '', '', '', '', '', 'Yearly', '1', 'PG'),
(3, 245, 'BACHELOR OF COMPUTER APPLICATION\n', '3', 'BCA', '1', 'Active', '', '', '', '19-05-2022 12:38:15am', '', '', '', '', '', '', 'Yearly', '1', 'UG'),
(4, 211, 'B.SC (HONS) Computer Science\r\n', '3', 'B.sc (CS)', '1', 'Active', '', '', '', '16-05-2022 03:54:04pm', '', '16-05-2022 04:24:19pm', '', '', '', '', 'Yearly', '1', 'UG'),
(5, 221, 'B.SC -INFORMATION TECHNOLOGY\n', '3', 'B.sc (IT)', '1', 'Active', '', '', '', '18-05-2022 07:27:16pm', '', '', '', '', '', '', 'Yearly', '1', 'UG');

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
-- Table structure for table `email_config`
--

CREATE TABLE `email_config` (
  `id` int(11) UNSIGNED NOT NULL,
  `email_type` varchar(100) DEFAULT NULL,
  `smtp_server` varchar(100) DEFAULT NULL,
  `smtp_port` varchar(100) DEFAULT NULL,
  `smtp_username` varchar(100) DEFAULT NULL,
  `smtp_password` varchar(100) DEFAULT NULL,
  `ssl_tls` varchar(100) DEFAULT NULL,
  `email_status` varchar(10) NOT NULL,
  `email_createdby` varchar(20) NOT NULL,
  `email_createddatetime` varchar(30) NOT NULL,
  `email_updateby` varchar(20) NOT NULL,
  `email_updatedatetime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `email_config`
--

INSERT INTO `email_config` (`id`, `email_type`, `smtp_server`, `smtp_port`, `smtp_username`, `smtp_password`, `ssl_tls`, `email_status`, `email_createdby`, `email_createddatetime`, `email_updateby`, `email_updatedatetime`) VALUES
(1, 'SMTP', 'mail.geumca.in', '587', 'no-reply@geumca.in', 'GraphicEra@Geu', 'tls', 'Active', '1', '03-02-2023 11:46:43am', '1', '15-02-2023 04:40:27pm');

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE `header` (
  `header_id` int(20) NOT NULL,
  `header_name` varchar(30) NOT NULL,
  `header_url` varchar(70) NOT NULL,
  `header_order` varchar(10) NOT NULL,
  `header_display` varchar(10) NOT NULL,
  `header_status` varchar(10) NOT NULL,
  `header_createdby` varchar(20) NOT NULL,
  `header_createdtime` varchar(30) NOT NULL,
  `header_updateby` varchar(20) NOT NULL,
  `header_updatetime` varchar(30) NOT NULL,
  `header_pagemore` varchar(5) NOT NULL,
  `header_newpagetraget` varchar(5) NOT NULL,
  `header_disableby` varchar(20) NOT NULL,
  `header_disabletime` varchar(30) NOT NULL,
  `header_disablereason` varchar(100) NOT NULL,
  `header_displaycloseby` varchar(20) NOT NULL,
  `header_displayclosetime` varchar(30) NOT NULL,
  `header_showby` varchar(20) NOT NULL,
  `header_showdatetime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`header_id`, `header_name`, `header_url`, `header_order`, `header_display`, `header_status`, `header_createdby`, `header_createdtime`, `header_updateby`, `header_updatetime`, `header_pagemore`, `header_newpagetraget`, `header_disableby`, `header_disabletime`, `header_disablereason`, `header_displaycloseby`, `header_displayclosetime`, `header_showby`, `header_showdatetime`) VALUES
(1, 'Home', 'index.php', '1', 'Active', 'Active', '', '01-03-2023 03:31:20pm', '', '', 'No', 'No', '', '', '', '', '', '', ''),
(2, 'Syllabus', 'syllabus.php', '2', 'Active', 'Active', '', '12-03-2023 11:09:29pm', '', '2023-03-13 11:32:53pm', 'No', 'No', '', '', '', '', '', '', ''),
(3, 'Time Table', 'timeTable.php', '3', 'Active', 'Active', '', '12-03-2023 11:10:08pm', '', '', 'No', 'No', '', '', '', '', '', '', ''),
(4, 'Notices', 'notices.php', '4', 'Active', 'Active', '', '12-03-2023 11:10:24pm', '', '', 'No', 'No', '', '', '', '', '', '', ''),
(5, 'Academic Calender', 'Academic-Calender.php', '5', 'Active', 'Active', '', '15-03-2023 01:41:43pm', '', '', 'No', 'No', '', '', '', '', '', '', ''),
(6, 'Gallery', 'gallery.php', '6', 'InActive', 'Active', '', '12-03-2023 11:10:37pm', '', '2023-03-15 01:59:06pm', 'No', 'No', '', '', '', '', '', '', ''),
(7, 'Feedback', 'feedback.php', '7', 'InActive', 'Active', '', '12-03-2023 11:11:11pm', '', '', 'No', 'No', '', '', '', '', '', '', ''),
(8, 'PO PSO & PEO', 'poPsoPeo.php', '8', 'InActive', 'Active', '', '12-03-2023 11:11:27pm', '', '', 'No', 'No', '', '', '', '65', '2023-03-22 02:57:46pm', '', ''),
(9, 'Contact us', 'contact.php', '9', 'InActive', 'Active', '', '12-03-2023 11:10:56pm', '', '', 'No', 'No', '', '', '', '65', '2023-03-16 05:07:03pm', '', ''),
(10, 'Admission', 'https://www.geu.ac.in/content/geu/en/admission-form.html', '1', 'Active', 'Active', '', '13-03-2023 12:11:45am', '', '2023-03-14 09:57:55am', 'Yes', 'Yes', '', '', '', '', '', '', ''),
(11, 'Student Area', 'https://www.geu.ac.in/content/geu/en/student-area.html', '2', 'Active', 'Active', '', '13-03-2023 10:41:11pm', '', '2023-03-13 10:48:59pm', 'Yes', 'Yes', '', '', '', '', '', '', ''),
(12, 'Alumni Connect', 'https://www.geu.ac.in/content/geu/en/alumni-connect.html', '3', 'Active', 'Active', '', '13-03-2023 10:41:38pm', '', '', 'Yes', 'Yes', '', '', '', '', '', '', ''),
(20, 'Disclaimer', 'disclaimer.php', '7', 'Active', 'Active', '65', '22-03-2023 10:55:10am', '', '', 'No', 'No', '', '', '', '', '', '', '');

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
  `system_name` varchar(500) NOT NULL,
  `login_datetime` varchar(30) NOT NULL,
  `logout_datetime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logindetail`
--

INSERT INTO `logindetail` (`id`, `logintype`, `loginid`, `password`, `loginattempt`, `ipaddress`, `session_key`, `system_name`, `login_datetime`, `logout_datetime`) VALUES
(1, 'admin', 'superuser', 'admin@2000', 'Success', '223.233.69.31', 'e9c7365912da5be46e11f5d7dfac626c', '', '2023-03-16 08:36:33am', '2023-03-16 10:43:06am'),
(2, 'admin', 'superuser', 'admin@2000', 'Success', '223.233.69.31', 'e9c7365912da5be46e11f5d7dfac626c', '', '2023-03-16 10:43:24am', ''),
(3, 'admin', 'superuser', 'admin@2000', 'Success', '223.233.69.31', 'e9c7365912da5be46e11f5d7dfac626c', '', '2023-03-16 11:16:56am', ''),
(4, 'admin', 'superuser', 'admin@2000', 'Success', '14.139.239.130', '52c714f5e030d9d45018662439539dbf', '', '2023-03-16 02:23:10pm', ''),
(5, 'admin', 'adityajoshi', 'adityajoshi', 'Success', '45.116.207.196', '7768b000b3957d7a4106ea6f0419de9f', '', '2023-03-16 02:30:55pm', ''),
(6, 'admin', 'adityajoshi', 'adityajoshi', 'Success', '14.139.239.130', '8ea575b24a311684c45deb3749be63ea', '', '2023-03-16 02:38:45pm', '2023-03-16 02:39:19pm'),
(7, 'admin', 'adityajoshi', 'Joshiji123#', 'Success', '14.139.239.130', '8ea575b24a311684c45deb3749be63ea', '', '2023-03-16 02:39:28pm', ''),
(8, 'admin', 'superuser', 'admin@2000', 'Success', '14.139.239.130', 'e9c7365912da5be46e11f5d7dfac626c', '', '2023-03-16 03:11:53pm', ''),
(9, 'admin', 'adityajoshi', 'Joshiji123#', 'Success', '14.139.239.130', 'a756bed2d4e88b7db78069f458c6c182', '', '2023-03-16 05:06:37pm', '2023-03-16 05:07:40pm'),
(10, 'admin', 'superuser', 'admin@2000', 'Success', '223.233.69.31', '52c714f5e030d9d45018662439539dbf', '', '2023-03-17 08:47:29am', ''),
(11, 'admin', 'adityajoshi', 'Joshiji123#', 'Success', '14.139.239.130', 'aac443d9270cebd4aacfff37d6db1278', '', '2023-03-17 02:46:22pm', ''),
(12, 'admin', 'adityajoshi', 'Joshiji123#', 'Success', '14.139.239.130', 'aac443d9270cebd4aacfff37d6db1278', '', '2023-03-17 02:53:39pm', ''),
(13, 'admin', 'superuser', 'admin@2000', 'Success', '14.139.239.130', '52c714f5e030d9d45018662439539dbf', '', '2023-03-17 04:32:20pm', ''),
(14, 'admin', 'superuser', 'admin@2000', 'Success', '223.233.74.215', '52c714f5e030d9d45018662439539dbf', '', '2023-03-18 09:30:25am', ''),
(15, 'admin', 'superuser', 'admin@2000', 'Success', '223.179.143.129', '52c714f5e030d9d45018662439539dbf', '', '2023-03-20 09:24:38am', ''),
(16, 'admin', 'superuser', 'admin@2000', 'Success', '223.179.143.129', '52c714f5e030d9d45018662439539dbf', '', '2023-03-20 10:50:39am', ''),
(17, 'admin', 'superuser', 'admin@2000', 'Success', '223.179.136.79', '3f11e23e5ed0961d36d7790d353274c6', '', '2023-03-21 09:27:12am', ''),
(18, 'admin', 'superuser', 'admin@2000', 'Success', '14.139.239.130', '3f11e23e5ed0961d36d7790d353274c6', '', '2023-03-21 01:55:45pm', '2023-03-21 01:56:50pm'),
(19, 'admin', 'adityajoshi', 'Joshiji123#', 'Success', '14.139.239.130', 'a7523119aa68bfb57d9f7cf402d3b594', '', '2023-03-22 10:53:06am', '2023-03-22 10:58:32am'),
(20, 'admin', 'adityajoshi', 'Joshiji123#', 'Success', '14.139.239.130', 'a7523119aa68bfb57d9f7cf402d3b594', '', '2023-03-22 11:46:08am', ''),
(21, 'admin', 'adityajoshi', 'Joshiji123#', 'Success', '14.139.239.130', '0adb94a68c11bb41a207a34168f8187e', '', '2023-03-22 02:52:39pm', ''),
(22, 'admin', 'superuser', 'admin@2000', 'Success', '49.43.153.159', '5b107bfe3fca2f18044f2d8ef3f0cc79', '', '2023-03-22 08:29:27pm', ''),
(23, 'admin', 'adityajoshi', 'Joshiji123#', 'Success', '14.139.239.130', 'd78073016d1198c30fbb0fb5d5211947', '', '2023-03-23 11:40:48am', '2023-03-23 11:50:30am'),
(24, 'admin', 'superuser', 'admin@2000', 'Success', '106.211.20.120', 'dbbb35c8f4f3e124e88133b4a59d9fb1', '', '2023-03-23 03:06:44pm', '2023-03-23 03:13:01pm'),
(25, 'admin', 'adityajoshi', 'Joshiji123#', 'Success', '14.139.239.130', '0523dcbab508e61c3d31ab32e1b6bdf4', '', '2023-03-24 01:36:55pm', ''),
(26, 'admin', 'adityajoshi', 'Joshiji123#', 'Success', '49.36.219.245', 'b3329e96c85b4fcb656c45ea55282b5b', '', '2023-03-26 10:56:46am', '');

-- --------------------------------------------------------

--
-- Table structure for table `mailcontent`
--

CREATE TABLE `mailcontent` (
  `mailcontent_id` int(11) NOT NULL,
  `mailcontent_session` varchar(10) NOT NULL,
  `mailcontent_mailidname` varchar(50) NOT NULL,
  `mailcontent_subject` varchar(100) NOT NULL,
  `mailcontent_body` varchar(5000) NOT NULL,
  `mailcontent_status` varchar(10) NOT NULL,
  `mailcontent_createdby` varchar(10) NOT NULL,
  `mailcontent_createddatetime` varchar(30) NOT NULL,
  `mailcontent_updatedby` varchar(10) NOT NULL,
  `mailcontent_updatedatetime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'website Content', 'fas fa-cloud', '1', 'Active', '', '', '', '21-02-2023 02:21:59pm', '', '', '', ''),
(2, 'Course', 'fas fa-columns', '2', 'Active', '', '', '', '14-03-2023 09:13:57am', '', '', '', ''),
(5, 'Setting', 'fas fa-cog', '3', 'Active', '', '', '', '12-08-2022 02:21:04pm', '', '', '', ''),
(6, 'Permission', 'fas fa-users-cog', '4', 'Active', '', '', '', '12-08-2022 02:21:19pm', '', '', '', ''),
(9, 'Mail Setting', 'fas fa-mail-bulk', '5', 'Active', '', '', '', '03-02-2023 03:40:38am', '', '03-02-2023 03:50:40pm', '', '');

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
(1, '1', '64', '1', 'Yes', '', '16-03-2023 08:38:40am'),
(2, '1', '65', '1', 'Yes', '', '16-03-2023 08:38:40am'),
(3, '1', '66', '1', 'Yes', '', '16-03-2023 08:38:40am'),
(4, '1', '67', '1', 'Yes', '', '16-03-2023 08:38:40am'),
(5, '1', '68', '1', 'Yes', '', '16-03-2023 08:38:40am'),
(6, '1', '69', '1', 'Yes', '', '16-03-2023 08:38:40am'),
(7, '1', '74', '1', 'Yes', '', '16-03-2023 08:38:40am'),
(8, '2', '70', '1', 'Yes', '', '16-03-2023 08:38:40am'),
(9, '2', '72', '1', 'Yes', '', '16-03-2023 08:38:40am'),
(10, '2', '71', '1', 'Yes', '', '16-03-2023 08:38:40am'),
(11, '2', '73', '1', 'Yes', '', '16-03-2023 08:38:40am'),
(12, '5', '23', '1', 'Yes', '', '16-03-2023 08:38:40am'),
(13, '5', '24', '1', 'Yes', '', '16-03-2023 08:38:40am'),
(14, '5', '25', '1', 'Yes', '', '16-03-2023 08:38:40am'),
(15, '5', '26', '1', 'Yes', '', '16-03-2023 08:38:40am'),
(16, '5', '27', '1', 'Yes', '', '16-03-2023 08:38:40am'),
(17, '5', '28', '1', 'Yes', '', '16-03-2023 08:38:40am'),
(18, '5', '29', '1', 'Yes', '', '16-03-2023 08:38:40am'),
(19, '6', '30', '1', 'Yes', '', '16-03-2023 08:38:40am'),
(20, '6', '31', '1', 'Yes', '', '16-03-2023 08:38:40am'),
(21, '6', '32', '1', 'Yes', '', '16-03-2023 08:38:40am'),
(22, '6', '33', '1', 'Yes', '', '16-03-2023 08:38:40am'),
(23, '6', '34', '1', 'Yes', '', '16-03-2023 08:38:40am'),
(24, '6', '35', '1', 'Yes', '', '16-03-2023 08:38:40am'),
(25, '6', '36', '1', 'Yes', '', '16-03-2023 08:38:40am'),
(26, '6', '41', '1', 'Yes', '', '16-03-2023 08:38:40am'),
(27, '6', '40', '1', 'Yes', '', '16-03-2023 08:38:40am'),
(28, '6', '37', '1', 'Yes', '', '16-03-2023 08:38:40am'),
(29, '6', '39', '1', 'Yes', '', '16-03-2023 08:38:40am'),
(30, '6', '38', '1', 'Yes', '', '16-03-2023 08:38:40am'),
(31, '9', '63', '1', 'Yes', '', '16-03-2023 08:38:40am'),
(32, '1', '64', '9', 'Yes', '', '16-03-2023 08:38:40am'),
(33, '1', '65', '9', 'Yes', '', '16-03-2023 08:38:40am'),
(34, '1', '66', '9', 'Yes', '', '16-03-2023 08:38:40am'),
(35, '1', '67', '9', 'Yes', '', '16-03-2023 08:38:40am'),
(36, '1', '68', '9', 'Yes', '', '16-03-2023 08:38:40am'),
(37, '1', '69', '9', 'Yes', '', '16-03-2023 08:38:40am'),
(38, '1', '74', '9', 'Yes', '', '16-03-2023 08:38:40am'),
(39, '2', '70', '9', 'Yes', '', '16-03-2023 08:38:40am'),
(40, '2', '72', '9', 'Yes', '', '16-03-2023 08:38:40am'),
(41, '2', '71', '9', 'Yes', '', '16-03-2023 08:38:40am'),
(42, '2', '73', '9', 'Yes', '', '16-03-2023 08:38:40am'),
(43, '5', '23', '9', 'Yes', '', '16-03-2023 08:38:40am'),
(44, '5', '24', '9', 'Yes', '', '16-03-2023 08:38:40am'),
(45, '5', '25', '9', 'Yes', '', '16-03-2023 08:38:40am'),
(46, '5', '26', '9', 'Yes', '', '16-03-2023 08:38:40am'),
(47, '5', '27', '9', 'Yes', '', '16-03-2023 08:38:40am'),
(48, '5', '28', '9', 'Yes', '', '16-03-2023 08:38:40am'),
(49, '5', '29', '9', 'Yes', '', '16-03-2023 08:38:40am'),
(50, '6', '30', '9', 'Yes', '', '16-03-2023 08:38:40am'),
(51, '6', '31', '9', 'Yes', '', '16-03-2023 08:38:40am'),
(52, '6', '32', '9', 'Yes', '', '16-03-2023 08:38:40am'),
(53, '6', '33', '9', 'Yes', '', '16-03-2023 08:38:40am'),
(54, '6', '34', '9', 'Yes', '', '16-03-2023 08:38:40am'),
(55, '6', '35', '9', 'Yes', '', '16-03-2023 08:38:40am'),
(56, '6', '36', '9', 'Yes', '', '16-03-2023 08:38:40am'),
(57, '6', '41', '9', 'Yes', '', '16-03-2023 08:38:40am'),
(58, '6', '40', '9', 'Yes', '', '16-03-2023 08:38:40am'),
(59, '6', '37', '9', 'Yes', '', '16-03-2023 08:38:40am'),
(60, '6', '39', '9', 'Yes', '', '16-03-2023 08:38:40am'),
(61, '6', '38', '9', 'Yes', '', '16-03-2023 08:38:40am'),
(62, '9', '63', '9', 'Yes', '', '16-03-2023 08:38:40am'),
(63, '1', '75', '1', 'Yes', '', ''),
(64, '1', '75', '9', 'Yes', '', ''),
(65, '1', '76', '1', 'Yes', '', ''),
(66, '1', '76', '9', 'Yes', '', ''),
(67, '1', '77', '1', 'Yes', '', ''),
(68, '1', '77', '9', 'Yes', '', ''),
(69, '1', '78', '1', 'Yes', '', ''),
(70, '1', '78', '9', 'Yes', '', ''),
(71, '1', '79', '1', 'Yes', '', ''),
(72, '1', '79', '9', 'Yes', '', ''),
(73, '1', '64', '65', 'Yes', '1', '16-03-2023 02:39:40pm'),
(74, '1', '65', '65', 'Yes', '1', '16-03-2023 02:39:40pm'),
(75, '1', '66', '65', 'Yes', '1', '16-03-2023 02:39:40pm'),
(76, '1', '67', '65', 'Yes', '1', '16-03-2023 02:39:40pm'),
(77, '1', '68', '65', 'Yes', '1', '16-03-2023 02:39:40pm'),
(78, '1', '69', '65', 'Yes', '1', '16-03-2023 02:39:40pm'),
(79, '1', '74', '65', 'Yes', '1', '16-03-2023 02:39:40pm'),
(80, '1', '79', '65', 'Yes', '1', '16-03-2023 02:39:40pm'),
(81, '1', '76', '65', 'Yes', '1', '16-03-2023 02:39:40pm'),
(82, '1', '78', '65', 'Yes', '1', '16-03-2023 02:39:40pm'),
(83, '1', '75', '65', 'Yes', '1', '16-03-2023 02:39:40pm'),
(84, '1', '77', '65', 'Yes', '1', '16-03-2023 02:39:40pm'),
(85, '2', '70', '65', 'Yes', '1', '16-03-2023 02:39:40pm'),
(86, '2', '72', '65', 'Yes', '1', '16-03-2023 02:39:40pm'),
(87, '2', '71', '65', 'Yes', '1', '16-03-2023 02:39:40pm'),
(88, '2', '73', '65', 'Yes', '1', '16-03-2023 02:39:40pm'),
(89, '5', '23', '65', 'Yes', '1', '16-03-2023 02:39:40pm'),
(90, '5', '24', '65', 'Yes', '1', '16-03-2023 02:39:40pm'),
(91, '5', '25', '65', 'Yes', '1', '16-03-2023 02:39:40pm'),
(92, '5', '26', '65', 'Yes', '1', '16-03-2023 02:39:40pm'),
(93, '5', '27', '65', 'Yes', '1', '16-03-2023 02:39:40pm'),
(94, '5', '28', '65', 'Yes', '1', '16-03-2023 02:39:40pm'),
(95, '5', '29', '65', 'Yes', '1', '16-03-2023 02:39:40pm'),
(96, '6', '30', '65', 'Yes', '1', '16-03-2023 02:39:40pm'),
(97, '6', '31', '65', 'Yes', '1', '16-03-2023 02:39:40pm'),
(98, '6', '32', '65', 'Yes', '1', '16-03-2023 02:39:40pm'),
(99, '6', '33', '65', 'Yes', '1', '16-03-2023 02:39:40pm'),
(100, '6', '34', '65', 'Yes', '1', '16-03-2023 02:39:40pm'),
(101, '6', '35', '65', 'Yes', '1', '16-03-2023 02:39:40pm'),
(102, '6', '36', '65', 'Yes', '1', '16-03-2023 02:39:40pm'),
(103, '6', '41', '65', 'Yes', '1', '16-03-2023 02:39:40pm'),
(104, '6', '40', '65', 'Yes', '1', '16-03-2023 02:39:40pm'),
(105, '6', '37', '65', 'Yes', '1', '16-03-2023 02:39:40pm'),
(106, '6', '39', '65', 'Yes', '1', '16-03-2023 02:39:40pm'),
(107, '6', '38', '65', 'Yes', '1', '16-03-2023 02:39:40pm'),
(108, '9', '63', '65', 'Yes', '1', '16-03-2023 02:39:40pm');

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
(1, 185, 0, 1, 'True', '', '16-03-2023 08:39:29am'),
(2, 189, 0, 1, 'True', '', '16-03-2023 08:39:29am'),
(3, 245, 0, 1, 'True', '', '16-03-2023 08:39:29am'),
(4, 211, 0, 1, 'True', '', '16-03-2023 08:39:29am'),
(5, 221, 0, 1, 'True', '', '16-03-2023 08:39:29am'),
(6, 185, 0, 9, 'True', '', '16-03-2023 08:39:29am'),
(7, 189, 0, 9, 'True', '', '16-03-2023 08:39:29am'),
(8, 245, 0, 9, 'True', '', '16-03-2023 08:39:29am'),
(9, 211, 0, 9, 'True', '', '16-03-2023 08:39:29am'),
(10, 221, 0, 9, 'True', '', '16-03-2023 08:39:29am'),
(11, 185, 0, 65, 'True', '1', '16-03-2023 02:39:53pm'),
(12, 189, 0, 65, 'True', '1', '16-03-2023 02:39:53pm'),
(13, 245, 0, 65, 'True', '1', '16-03-2023 02:39:53pm'),
(14, 211, 0, 65, 'True', '1', '16-03-2023 02:39:53pm'),
(15, 221, 0, 65, 'True', '1', '16-03-2023 02:39:53pm');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `circular_id` int(11) NOT NULL,
  `circularno` varchar(20) NOT NULL,
  `noticeyear` varchar(10) NOT NULL,
  `noticemonth` varchar(10) NOT NULL,
  `noticesession` varchar(20) NOT NULL,
  `noticetype` varchar(10) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `file` varchar(100) NOT NULL,
  `message` varchar(5000) NOT NULL,
  `datefrom` varchar(20) NOT NULL,
  `dateto` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `disablereason` varchar(200) NOT NULL,
  `activereason` varchar(300) NOT NULL,
  `createdby` varchar(100) NOT NULL,
  `createdtime` varchar(30) NOT NULL,
  `disableby` varchar(100) NOT NULL,
  `disabletime` varchar(30) NOT NULL,
  `activeby` varchar(100) NOT NULL,
  `activetime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`circular_id`, `circularno`, `noticeyear`, `noticemonth`, `noticesession`, `noticetype`, `subject`, `file`, `message`, `datefrom`, `dateto`, `status`, `disablereason`, `activereason`, `createdby`, `createdtime`, `disableby`, `disabletime`, `activeby`, `activetime`) VALUES
(1, 'GEU/CA/03/01', '2023', '03', '2022-2023', 'Both', 'Mini Project Notice for PG 2nd Semester Students of MCA and M.Sc. IT', 'Notice_220320231679477176.pdf', '<br>', '2023-03-22', '2023-04-30', 'Active', '', '', '65', '22-03-2023 02:56:16pm', '', '', '', ''),
(2, 'GEU/CA/03/02', '2023', '03', '2022-2023', 'Both', 'Supplementary/Debarred Odd Semester End Term Practical Schedule', 'Notice_220320231679477462.pdf', '<br>', '2023-03-22', '2023-04-30', 'InActive', 'PDF is incorrect', '', '65', '22-03-2023 03:01:02pm', '65', '23-03-2023 11:43:14am', '', ''),
(3, 'GEU/CA/03/03', '2023', '03', '2022-2023', 'Both', 'Supplementary/Debarred Odd Semester End Term Practical Schedule', 'Notice_230320231679552008.pdf', '<br>', '2023-03-22', '2023-03-30', 'InActive', 'Date Updated', '', '65', '23-03-2023 11:43:28am', '65', '24-03-2023 01:37:16pm', '', ''),
(4, 'GEU/CA/03/04', '2023', '03', '2022-2023', 'Both', 'Supplementary/Debarred Odd Semester End Term Practical Schedule', 'Notice_240320231679645252.pdf', '<br>', '2023-03-22', '2023-03-31', 'Active', '', '', '65', '24-03-2023 01:37:32pm', '', '', '', ''),
(5, 'GEU/CA/03/05', '2023', '03', '2022-2023', 'Both', 'Project Notice for UG Students of BCA, B.Sc. IT and B.Sc. CS', 'Notice_260320231679808499.pdf', '<br>', '2023-03-26', '2023-04-02', 'Active', '', '', '65', '26-03-2023 10:58:19am', '', '', '', '');

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
(1, 'Graphic Era (Demeed To Be University)', '8767', '', 'GEU', 'geu-logo-1.png', '7302020015', 'graphiceraitquiz@gmail.com', 'CLEMENT TOWN', 'India', 'Uttarakhand', 'Dehradun', 'Dehradun', '248002', 'Active', 'Yes', '1', '19-02-2022 10:52:16pm', '1', '28-11-2022 04:54:30pm', '', '');

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
(2, '2022-2023', '2022', '22', '2023', '23', '2022-01-01', '2023-01-01', 'Active', '1', '08-04-2022 09:10:56pm', '1', '23-01-2023 05:50:39pm'),
(3, '2023-2024', '2023', '23', '2024', '24', '2023-01-01', '2024-01-01', 'InActive', '1', '08-04-2022 09:45:39pm', '1', '27-01-2023 01:19:04am'),
(4, '2024-2025', '2024', '24', '2025', '25', '2024-01-01', '2025-01-01', 'InActive', '1', '23-01-2023 05:50:15pm', '', ''),
(5, '2025-2026', '2025', '25', '2026', '26', '2025-01-01', '2026-01-01', 'InActive', '1', '23-01-2023 05:50:18pm', '', ''),
(6, '2026-2027', '2026', '26', '2027', '27', '2026-01-01', '2027-01-01', 'InActive', '1', '23-01-2023 05:50:20pm', '1', '23-01-2023 05:50:31pm');

-- --------------------------------------------------------

--
-- Table structure for table `student_list`
--

CREATE TABLE `student_list` (
  `id` int(11) NOT NULL,
  `student_id` varchar(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `student_number` varchar(15) NOT NULL,
  `student_telegramnumber` varchar(20) NOT NULL,
  `student_email` varchar(50) NOT NULL,
  `student_gender` varchar(10) NOT NULL,
  `student_college` varchar(50) NOT NULL,
  `student_course` varchar(50) NOT NULL,
  `student_semester` varchar(50) NOT NULL,
  `student_section` varchar(10) NOT NULL,
  `student_dob` varchar(30) NOT NULL,
  `classroll` varchar(20) NOT NULL,
  `hobbies` varchar(1000) NOT NULL,
  `status` varchar(10) NOT NULL,
  `student_status` varchar(10) NOT NULL,
  `volexperience` varchar(10) NOT NULL,
  `helpus` varchar(1000) NOT NULL,
  `createdby` varchar(10) NOT NULL,
  `createdtime` varchar(30) NOT NULL,
  `session` varchar(15) NOT NULL,
  `updateby` varchar(10) NOT NULL,
  `updatetime` varchar(30) NOT NULL,
  `disablereason` varchar(100) NOT NULL,
  `disableby` varchar(10) NOT NULL,
  `disabletime` varchar(30) NOT NULL,
  `statusactivereason` varchar(500) NOT NULL,
  `statusactiveby` varchar(30) NOT NULL,
  `statusactivetime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE `submenu` (
  `submenu_id` int(20) NOT NULL,
  `menu_id` varchar(30) NOT NULL,
  `submenu_name` varchar(30) NOT NULL,
  `submenu_url` varchar(50) NOT NULL,
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
(23, '5', 'Add Session', 'session.php', '1', 'Yes', 'Active', '', '', '', '13-08-2022 06:20:21pm', '', '', '', ''),
(24, '5', 'College Detail', 'school.php', '2', 'Yes', 'Active', '', '', '', '13-08-2022 06:20:59pm', '', '', '', ''),
(25, '5', 'Add User', 'user.php', '3', 'Yes', 'Active', '', '', '', '13-08-2022 06:21:49pm', '', '', '', ''),
(26, '5', 'Update User', 'update_user.php', '4', 'No', 'Active', '', '', '', '13-08-2022 06:22:45pm', '', '', '', ''),
(27, '5', 'User Delete', 'user_delete.php', '5', 'No', 'Active', '', '', '', '13-08-2022 06:23:41pm', '', '', '', ''),
(28, '5', 'Password Reset', 'password_reset.php', '6', 'Yes', 'Active', '', '', '', '13-08-2022 06:25:52pm', '', '', '', ''),
(29, '5', 'Database Backup', 'database.php', '7', 'Yes', 'Active', '', '', '', '13-08-2022 06:26:20pm', '', '', '', ''),
(30, '6', 'Menu', 'menu.php', '1', 'Yes', 'Active', '', '', '', '13-08-2022 06:26:48pm', '', '', '', ''),
(31, '6', 'Menu Update', 'menu_update.php', '2', 'No', 'Active', '', '', '', '13-08-2022 06:27:56pm', '', '', '', ''),
(32, '6', 'Menu Delete', 'menu_delete.php', '3', 'No', 'Active', '', '', '', '13-08-2022 06:28:27pm', '', '', '', ''),
(33, '6', 'Sub Menu', 'submenu.php', '4', 'Yes', 'Active', '', '', '', '13-08-2022 06:29:23pm', '', '', '', ''),
(34, '6', 'SubMenu Update', 'submenu_update.php', '5', 'No', 'Active', '', '', '', '13-08-2022 06:29:52pm', '', '', '', ''),
(35, '6', 'SubMenu Delete', 'submenu_delete.php', '6', 'No', 'Active', '', '', '', '13-08-2022 06:30:31pm', '', '', '', ''),
(36, '6', 'User Permission', 'userpermission.php', '7', 'Yes', 'Active', '', '', '', '13-08-2022 06:31:32pm', '', '', '', ''),
(37, '6', 'Module Permission', 'permission.php', '8', 'No', 'Active', '', '', '', '13-08-2022 06:32:28pm', '', '', '', ''),
(38, '6', 'Course Permission', 'student_permission.php', '9', 'No', 'Active', '', '', '', '13-08-2022 06:33:25pm', '', '', '', ''),
(39, '6', 'Bulk Permission Withdrawal', 'BulkPermissionWithdrawal.php', '9', 'Yes', 'Active', '', '', '', '14-08-2022 11:46:26pm', '', '', '', ''),
(40, '6', 'Bulk Module Permission', 'BulkModulePermission.php', '8', 'Yes', 'Active', '', '', '', '17-08-2022 02:11:30am', '', '', '', ''),
(41, '6', 'Bulk Course Permission', 'BulkCoursePermission.php', '8', 'Yes', 'Active', '', '', '', '17-08-2022 11:29:52am', '', '', '', ''),
(63, '9', 'Email Setting', 'Email_Config.php', '1', 'Yes', 'Active', '', '', '', '03-02-2023 11:00:33am', '', '', '', ''),
(64, '1', 'Header Page', 'headerpage.php', '1', 'Yes', 'Active', '', '', '', '21-02-2023 02:23:16pm', '', '', '', ''),
(65, '1', 'Notice', 'notice.php', '2', 'Yes', 'Active', '', '', '', '21-02-2023 02:56:03pm', '', '', '', ''),
(66, '1', 'TimeTable upload', 'TimeTable_upload.php', '3', 'Yes', 'Active', '', '', '', '08-03-2023 07:02:58pm', '', '', '', ''),
(67, '1', 'Syllabus Upload', 'Syllabus_upload.php', '4', 'Yes', 'Active', '', '', '', '09-03-2023 09:59:43am', '', '', '', ''),
(68, '1', 'Carousel Upload', 'carousel_upload.php', '5', 'Yes', 'Active', '', '', '', '10-03-2023 12:52:24am', '', '', '', ''),
(69, '1', 'Contactus Detail', 'contactus_detail.php', '6', 'Yes', 'Active', '', '', '', '10-03-2023 11:15:41pm', '', '', '', ''),
(70, '2', 'Course', 'course.php', '1', 'Yes', 'Active', '', '', '', '14-03-2023 09:16:21am', '', '', '', ''),
(71, '2', 'Add Course', 'add_course.php', '2', 'Yes', 'Active', '', '', '', '14-03-2023 09:16:59am', '', '', '', ''),
(72, '2', 'Course Delete', 'course_delete.php', '1', 'No', 'Active', '', '', '', '14-03-2023 09:17:50am', '', '', '', ''),
(73, '2', 'Course Update', 'update_course.php', '2', 'No', 'Active', '', '', '', '14-03-2023 09:18:23am', '', '', '', ''),
(74, '1', 'Academic Calender', 'academiccalender_upload.php', '7', 'Yes', 'Active', '', '', '', '15-03-2023 02:53:11pm', '', '', '', ''),
(75, '1', 'TimeTable Delete', 'TimeTable_delete.php', '9', 'No', 'Active', '', '', '', '16-03-2023 08:59:53am', '', '', '', ''),
(76, '1', 'Syllabus Delete', 'Syllabus_delete.php', '9', 'No', 'Active', '', '', '', '16-03-2023 09:03:11am', '', '', '', ''),
(77, '1', 'Carousel Delete', 'carousel_delete.php', '9', 'No', 'Active', '', '', '', '16-03-2023 10:34:02am', '', '', '', ''),
(78, '1', 'Header Delete', 'Header_delete.php', '9', 'No', 'Active', '', '', '', '16-03-2023 11:17:35am', '', '', '', ''),
(79, '1', 'Header Update', 'Header_update.php', '9', 'No', 'Active', '', '', '', '16-03-2023 11:17:59am', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `syllabus`
--

CREATE TABLE `syllabus` (
  `syllabus_id` int(20) NOT NULL,
  `syllabus_session` varchar(20) NOT NULL,
  `syllabus_courseid` varchar(20) NOT NULL,
  `syllabus_semester` varchar(10) NOT NULL,
  `syllabus_fileupload` varchar(50) NOT NULL,
  `syllabus_status` varchar(10) NOT NULL,
  `syllabus_createdby` varchar(20) NOT NULL,
  `syllabus_createdtime` varchar(30) NOT NULL,
  `syllabus_updateby` varchar(20) NOT NULL,
  `syllabus_updatetime` varchar(30) NOT NULL,
  `syllabus_disableby` varchar(20) NOT NULL,
  `syllabus_disabletime` varchar(30) NOT NULL,
  `syllabus_disablereason` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `syllabus`
--

INSERT INTO `syllabus` (`syllabus_id`, `syllabus_session`, `syllabus_courseid`, `syllabus_semester`, `syllabus_fileupload`, `syllabus_status`, `syllabus_createdby`, `syllabus_createdtime`, `syllabus_updateby`, `syllabus_updatetime`, `syllabus_disableby`, `syllabus_disabletime`, `syllabus_disablereason`) VALUES
(1, '2022-2023', '211', '2', 'syllabus_160320231678959939.pdf', 'Active', '', '16-03-2023 03:15:39pm', '', '', '', '', ''),
(2, '2022-2023', '211', '4', 'syllabus_160320231678960284.pdf', 'Active', '', '16-03-2023 03:21:24pm', '', '', '', '', ''),
(3, '2022-2023', '211', '6', 'syllabus_160320231678960668.pdf', 'Active', '', '16-03-2023 03:27:48pm', '', '', '', '', ''),
(4, '2022-2023', '221', '2', 'syllabus_160320231678960806.pdf', 'Active', '', '16-03-2023 03:30:06pm', '', '', '', '', ''),
(5, '2022-2023', '221', '4', 'syllabus_160320231678960994.pdf', 'Active', '', '16-03-2023 03:33:14pm', '', '', '', '', ''),
(6, '2022-2023', '221', '6', 'syllabus_160320231678961239.pdf', 'Active', '', '16-03-2023 03:37:19pm', '', '', '', '', ''),
(7, '2022-2023', '245', '2', 'syllabus_160320231678961377.pdf', 'Active', '', '16-03-2023 03:39:37pm', '', '', '', '', ''),
(8, '2022-2023', '245', '4', 'syllabus_160320231678961576.pdf', 'Active', '', '16-03-2023 03:42:56pm', '', '', '', '', ''),
(9, '2022-2023', '245', '6', 'syllabus_160320231678961701.pdf', 'Active', '', '16-03-2023 03:45:01pm', '', '', '', '', ''),
(10, '2022-2023', '189', '2', 'syllabus_160320231678961807.pdf', 'Active', '', '16-03-2023 03:46:47pm', '', '', '', '', ''),
(11, '2022-2023', '189', '4', 'syllabus_160320231678961947.pdf', 'Active', '', '16-03-2023 03:49:07pm', '', '', '', '', ''),
(12, '2022-2023', '185', '2', 'syllabus_160320231678962113.pdf', 'Active', '', '16-03-2023 03:51:53pm', '', '', '', '', ''),
(13, '2022-2023', '185', '4', 'syllabus_160320231678962215.pdf', 'Active', '', '16-03-2023 03:53:35pm', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `timetable_id` int(20) NOT NULL,
  `timetable_session` varchar(12) NOT NULL,
  `timetable_courseid` varchar(12) NOT NULL,
  `timetable_semester` varchar(12) NOT NULL,
  `timetable_section` varchar(12) NOT NULL,
  `timetable_fileupload` varchar(100) NOT NULL,
  `timetable_status` varchar(10) NOT NULL,
  `timetable_createdby` varchar(20) NOT NULL,
  `timetable_createdtime` varchar(30) NOT NULL,
  `timetable_updateby` varchar(20) NOT NULL,
  `timetable_updatetime` varchar(30) NOT NULL,
  `timetable_disableby` varchar(20) NOT NULL,
  `timetable_disabletime` varchar(30) NOT NULL,
  `timetable_disablereason` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`timetable_id`, `timetable_session`, `timetable_courseid`, `timetable_semester`, `timetable_section`, `timetable_fileupload`, `timetable_status`, `timetable_createdby`, `timetable_createdtime`, `timetable_updateby`, `timetable_updatetime`, `timetable_disableby`, `timetable_disabletime`, `timetable_disablereason`) VALUES
(1, '2022-2023', '245', '2', 'A', 'timetable_160320231678959031.pdf', 'Active', '65', '16-03-2023 03:00:31pm', '', '', '', '', ''),
(2, '2022-2023', '245', '2', 'B', 'timetable_160320231678959066.pdf', 'Active', '65', '16-03-2023 03:01:06pm', '', '', '', '', ''),
(3, '2022-2023', '245', '2', 'C', 'timetable_160320231678959118.pdf', 'Active', '65', '16-03-2023 03:01:58pm', '', '', '', '', ''),
(4, '2022-2023', '245', '2', 'D', 'timetable_160320231678959141.pdf', 'Active', '65', '16-03-2023 03:02:21pm', '', '', '', '', ''),
(5, '2022-2023', '245', '2', 'E', 'timetable_160320231678959191.pdf', 'Active', '65', '16-03-2023 03:03:11pm', '', '', '', '', ''),
(6, '2022-2023', '245', '2', 'F', 'timetable_160320231678959222.pdf', 'Active', '65', '16-03-2023 03:03:42pm', '', '', '', '', ''),
(7, '2022-2023', '245', '2', 'G', 'timetable_160320231678959237.pdf', 'Active', '65', '16-03-2023 03:03:57pm', '', '', '', '', ''),
(8, '2022-2023', '245', '2', 'H', 'timetable_160320231678959308.pdf', 'Active', '65', '16-03-2023 03:05:08pm', '', '', '', '', ''),
(9, '2022-2023', '221', '2', 'A', 'timetable_160320231678959388.pdf', 'Active', '65', '16-03-2023 03:06:28pm', '', '', '', '', ''),
(10, '2022-2023', '211', '2', 'A', 'timetable_160320231678959435.pdf', 'Active', '65', '16-03-2023 03:07:15pm', '', '', '', '', ''),
(11, '2022-2023', '185', '2', 'A', 'timetable_160320231678959544.pdf', 'Active', '65', '16-03-2023 03:09:04pm', '', '', '', '', ''),
(12, '2022-2023', '185', '2', 'B', 'timetable_160320231678959597.pdf', 'Active', '65', '16-03-2023 03:09:57pm', '', '', '', '', ''),
(13, '2022-2023', '189', '2', 'A', 'timetable_160320231678959661.pdf', 'Active', '65', '16-03-2023 03:11:01pm', '', '', '', '', ''),
(14, '2022-2023', '245', '4', 'A', 'timetable_160320231678959777.pdf', 'Active', '65', '16-03-2023 03:12:57pm', '', '', '', '', ''),
(15, '2022-2023', '245', '4', 'B', 'timetable_160320231678959991.pdf', 'Active', '65', '16-03-2023 03:16:31pm', '', '', '', '', ''),
(16, '2022-2023', '245', '4', 'C', 'timetable_160320231678960056.pdf', 'Active', '65', '16-03-2023 03:17:36pm', '', '', '', '', ''),
(17, '2022-2023', '221', '4', 'A', 'timetable_160320231678960170.pdf', 'InActive', '65', '16-03-2023 03:19:30pm', '', '', '65', '16-03-2023 03:22:13pm', 'wrongly uploaded file'),
(18, '2022-2023', '221', '4', 'A', 'timetable_160320231678960399.pdf', 'Active', '65', '16-03-2023 03:23:19pm', '', '', '', '', ''),
(19, '2022-2023', '211', '4', 'A', 'timetable_160320231678960549.pdf', 'Active', '65', '16-03-2023 03:25:49pm', '', '', '', '', ''),
(20, '2022-2023', '245', '6', 'A', 'timetable_160320231678960653.pdf', 'Active', '65', '16-03-2023 03:27:33pm', '', '', '', '', ''),
(21, '2022-2023', '245', '6', 'B', 'timetable_160320231678960753.pdf', 'Active', '65', '16-03-2023 03:29:13pm', '', '', '', '', ''),
(22, '2022-2023', '211', '6', 'A', 'timetable_160320231678961067.pdf', 'Active', '65', '16-03-2023 03:34:27pm', '', '', '', '', ''),
(23, '2022-2023', '221', '6', 'A', 'timetable_160320231678961393.pdf', 'Active', '65', '16-03-2023 03:39:53pm', '', '', '', '', ''),
(24, '2022-2023', '189', '4', 'A', 'timetable_160320231678961575.pdf', 'Active', '65', '16-03-2023 03:42:55pm', '', '', '', '', ''),
(25, '2022-2023', '185', '4', 'A', 'timetable_160320231678961846.pdf', 'Active', '65', '16-03-2023 03:47:26pm', '', '', '', '', ''),
(26, '2022-2023', '185', '2', 'C', 'timetable_160320231678962043.pdf', 'Active', '65', '16-03-2023 03:50:43pm', '', '', '', '', ''),
(27, '2022-2023', '185', '4', 'B', 'timetable_160320231678962392.pdf', 'Active', '65', '16-03-2023 03:56:32pm', '', '', '', '', '');

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
(1, 'superuser', '', '', 'superuser', '', 'e4f87d265bd57f49ceb6470e59f1f20a5d6a25bd', 'e4f87d265bd57f49ceb6470e59f1f20a5d6a25bd', '2000-09-19', '', '', '1_260120231674745778.jpg', 'superuser', 'Active', '', '', '', '', '', '', '', '1', '11-03-2023 12:30:08pm', '', '', '', '', '', '', 0, '09-12-2022', '', '2022-2023', '', '', '', '', '', ''),
(9, 'KAMLESH', 'CHANDRA', 'PUROHIT', 'kamlesh purohit', 'U228767001', '70457a8b9835727a2a0aff2f87af1681acd94447', 'e4f87d265bd57f49ceb6470e59f1f20a5d6a25bd', '1980-12-20', '9412933728', 'kamleshpurohit80@gmail.com', 'E_8296.JPG', 'superuser', 'Active', '', '', 'Chandra@987', 'kamlesh purohit', '2022-2023', '1', '01-06-2022 07:58:51pm', '1', '18-06-2022 01:34:58am', '', '', '1', '02-06-2022 11:03:06am', '', '02-06-2022 03:39:46pm', 0, '13-06-2022', '', '2022-2023', '', '', '', '', '', ''),
(65, 'Aditya', '', 'Joshi', 'adityajoshi', 'U238767001', '5273d07a29d231bcb83ca54c7069cd5d98ceced8', 'e4f87d265bd57f49ceb6470e59f1f20a5d6a25bd', '1986-03-15', '9557004416', 'adi.joshi@geu.ac.in', 'AdityaJoshi.JPG', 'superuser', 'Active', '', '', 'Joshiji123#', 'adityajoshi', '2023-2024', '', '16-03-2023 02:30:16pm', '', '16-03-2023 02:30:30pm', '', '', '', '16-03-2023 02:30:41pm', '', '16-03-2023 02:39:17pm', 0, '', '', '2022-2023', '', '', '', '', '', ''),
(66, 'kouj', 'u9u', '9u9', 'U238767002', 'U238767002', 'd8475a40f926539ecc4434d96d16ff82c35ad673', 'e4f87d265bd57f49ceb6470e59f1f20a5d6a25bd', '2000-01-14', 'uyhiyh', 'mishrarakshit7@gmail.com', '', 'user', 'Cancel', '', '', '', '', '2023-2024', '65', '16-03-2023 02:41:34pm', '', '', '', '', '', '', '', '', 0, '', '', '', 'testing', '65', '16-03-2023 02:47:42pm', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academiccalender`
--
ALTER TABLE `academiccalender`
  ADD PRIMARY KEY (`academiccalender_id`);

--
-- Indexes for table `advancesetting`
--
ALTER TABLE `advancesetting`
  ADD PRIMARY KEY (`popupid`);

--
-- Indexes for table `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY (`campus_id`);

--
-- Indexes for table `campuspermission`
--
ALTER TABLE `campuspermission`
  ADD PRIMARY KEY (`campusp_id`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`carousel_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`contactus_id`);

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
-- Indexes for table `email_config`
--
ALTER TABLE `email_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`header_id`);

--
-- Indexes for table `logindetail`
--
ALTER TABLE `logindetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mailcontent`
--
ALTER TABLE `mailcontent`
  ADD PRIMARY KEY (`mailcontent_id`);

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
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`circular_id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_list`
--
ALTER TABLE `student_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`submenu_id`);

--
-- Indexes for table `syllabus`
--
ALTER TABLE `syllabus`
  ADD PRIMARY KEY (`syllabus_id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`timetable_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academiccalender`
--
ALTER TABLE `academiccalender`
  MODIFY `academiccalender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `advancesetting`
--
ALTER TABLE `advancesetting`
  MODIFY `popupid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `campus`
--
ALTER TABLE `campus`
  MODIFY `campus_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `campuspermission`
--
ALTER TABLE `campuspermission`
  MODIFY `campusp_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `carousel_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `contactus_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_detail`
--
ALTER TABLE `course_detail`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `email_config`
--
ALTER TABLE `email_config`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `header`
--
ALTER TABLE `header`
  MODIFY `header_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `logindetail`
--
ALTER TABLE `logindetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `mailcontent`
--
ALTER TABLE `mailcontent`
  MODIFY `mailcontent_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `modulepermission`
--
ALTER TABLE `modulepermission`
  MODIFY `modulepermission_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `mst_subjectpermission`
--
ALTER TABLE `mst_subjectpermission`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `circular_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_list`
--
ALTER TABLE `student_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `submenu_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `syllabus`
--
ALTER TABLE `syllabus`
  MODIFY `syllabus_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `timetable_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
