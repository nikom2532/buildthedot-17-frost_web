-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 04, 2014 at 08:59 AM
-- Server version: 5.5.35-0ubuntu0.13.10.2
-- PHP Version: 5.5.3-1ubuntu2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `buildthedot_17mckansys`
--

-- --------------------------------------------------------

--
-- Table structure for table `ADMIN`
--

CREATE TABLE IF NOT EXISTS `ADMIN` (
  `ID` int(2) NOT NULL DEFAULT '0',
  `NAME` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `PASSWORD` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `DATE` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ADMIN`
--

INSERT INTO `ADMIN` (`ID`, `NAME`, `EMAIL`, `PASSWORD`, `DATE`) VALUES
(1, 'test', 'a@a.com', '77de54ccf56eb6f7dbf99e4d3be949ab6f9b0a55df8ac28564cb9f63a10be8af6ab3f7c2', '2013-10-02 00:00:00'),
(2, 'b', 'b@b.com', '7014de06693eca5c7a6f258b98fa2048ef7ad6c1faf1e46a706cd0615ada442bbc570b0e', '2013-10-02 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ASIAN_COUNTRY`
--

CREATE TABLE IF NOT EXISTS `ASIAN_COUNTRY` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `CAPITAL` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `LANGUAGE` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `POPULATION` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `RELIGION` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `CURRENCY` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `PARAGRAPH_1` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `PARAGRAPH_2` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `PARAGRAPH_3` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `PHOTO_NAME` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `ASIAN_COUNTRY`
--

INSERT INTO `ASIAN_COUNTRY` (`ID`, `NAME`, `CAPITAL`, `LANGUAGE`, `POPULATION`, `RELIGION`, `CURRENCY`, `PARAGRAPH_1`, `PARAGRAPH_2`, `PARAGRAPH_3`, `PHOTO_NAME`) VALUES
(1, 'Brunei Darussalam', 'Bandar Seri Begawan', 'Malay, English', '', '', 'B$ (Brunei Dollar)', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s', 'brunei.jpg'),
(2, 'Cambodia', 'Phnom Penh', 'Khmer', '', '', 'Riel', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s', 'cambodia.jpg'),
(3, 'Indonesia', 'Jakarta', 'Indonesian', '', '', 'Rupiah', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s', 'indonesia.jpg'),
(4, 'Lao PDR', 'Vientiane', 'Lao', '', '', 'Kip', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s', 'lao.jpg'),
(5, 'Malaysia', 'Kuala Lumpur', 'Malay, English, Chinese, Tamil', '', '', 'Ringgit', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s', 'malaysia.jpg'),
(6, 'Myanmar', 'Nay Pyi Taw', 'Myanmar', '', '', 'Kyat', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s', 'myanmar.jpg'),
(7, 'Philippines', 'Manila', 'Filipino, English, Spanish', '', '', 'Peso', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s', 'philipine.jpg'),
(8, 'Singapore', 'Singapore', 'English, Malay, Mandarin, Tamil', '', '', 'S$ (Singapore Dollar)', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s', 'singapore.jpg'),
(9, 'Thailand', 'Bangkok', 'Thai', '', '', 'Baht', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s', 'thailand.jpg'),
(10, 'Viet Nam', 'Ha Noi', 'Vietnamese', '', '', 'Dong', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s', 'vietnam.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `COUNTRY`
--

CREATE TABLE IF NOT EXISTS `COUNTRY` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `COUNTRY`
--

INSERT INTO `COUNTRY` (`ID`, `NAME`) VALUES
(1, 'Afghanistan'),
(2, 'Albania'),
(3, 'Algeria'),
(4, 'American Samoa'),
(5, 'Andorra'),
(6, 'Angola'),
(7, 'Anguilla'),
(8, 'Antarctica'),
(9, 'Antigua and Barbuda'),
(10, 'Argentina'),
(11, 'Armenia'),
(12, 'Armenia'),
(13, 'Aruba'),
(14, 'Australia'),
(15, 'Austria'),
(16, 'Azerbaijan'),
(17, 'Azerbaijan'),
(18, 'Bahamas'),
(19, 'Bahrain'),
(20, 'Bangladesh'),
(21, 'Barbados'),
(22, 'Belarus'),
(23, 'Belgium'),
(24, 'Belize'),
(25, 'Benin'),
(26, 'Bermuda'),
(27, 'Bhutan'),
(28, 'Bolivia'),
(29, 'Bosnia and Herzegovina'),
(30, 'Botswana'),
(31, 'Bouvet Island'),
(32, 'Brazil'),
(33, 'British Indian Ocean Territory'),
(34, 'Brunei Darussalam'),
(35, 'Bulgaria'),
(36, 'Burkina Faso'),
(37, 'Burundi'),
(38, 'Cambodia'),
(39, 'Cameroon'),
(40, 'Canada'),
(41, 'Cape Verde'),
(42, 'Cayman Islands'),
(43, 'Central African Republic'),
(44, 'Chad'),
(45, 'Chile'),
(46, 'China'),
(47, 'Christmas Island'),
(48, 'Cocos (Keeling) Islands'),
(49, 'Colombia'),
(50, 'Comoros'),
(51, 'Congo'),
(52, 'Congo, The Democratic Republic of The'),
(53, 'Cook Islands'),
(54, 'Costa Rica'),
(55, 'Cote D''ivoire'),
(56, 'Croatia'),
(57, 'Cuba'),
(58, 'Cyprus'),
(60, 'Czech Republic'),
(61, 'Denmark'),
(62, 'Djibouti'),
(63, 'Dominica'),
(64, 'Dominican Republic'),
(65, 'Easter Island'),
(66, 'Ecuador'),
(67, 'Egypt'),
(68, 'El Salvador'),
(69, 'Equatorial Guinea'),
(70, 'Eritrea'),
(71, 'Estonia'),
(72, 'Ethiopia'),
(73, 'Falkland Islands (Malvinas)'),
(74, 'Faroe Islands'),
(75, 'Fiji'),
(76, 'Finland'),
(77, 'France'),
(78, 'French Guiana'),
(79, 'French Polynesia'),
(80, 'French Southern Territories'),
(81, 'Gabon'),
(82, 'Gambia'),
(83, 'Georgia'),
(85, 'Germany'),
(86, 'Ghana'),
(87, 'Gibraltar'),
(88, 'Greece'),
(89, 'Greenland'),
(91, 'Grenada'),
(92, 'Guadeloupe'),
(93, 'Guam'),
(94, 'Guatemala'),
(95, 'Guinea'),
(96, 'Guinea-bissau'),
(97, 'Guyana'),
(98, 'Haiti'),
(99, 'Heard Island and Mcdonald Islands'),
(100, 'Honduras'),
(101, 'Hong Kong'),
(102, 'Hungary'),
(103, 'Iceland'),
(104, 'India'),
(105, 'Indonesia'),
(106, 'Indonesia'),
(107, 'Iran'),
(108, 'Iraq'),
(109, 'Ireland'),
(110, 'Israel'),
(111, 'Italy'),
(112, 'Jamaica'),
(113, 'Japan'),
(114, 'Jordan'),
(115, 'Kazakhstan'),
(116, 'Kazakhstan'),
(117, 'Kenya'),
(118, 'Kiribati'),
(119, 'Korea, North'),
(120, 'Korea, South'),
(121, 'Kosovo'),
(122, 'Kuwait'),
(123, 'Kyrgyzstan'),
(124, 'Laos'),
(125, 'Latvia'),
(126, 'Lebanon'),
(127, 'Lesotho'),
(128, 'Liberia'),
(129, 'Libyan Arab Jamahiriya'),
(130, 'Liechtenstein'),
(131, 'Lithuania'),
(132, 'Luxembourg'),
(133, 'Macau'),
(134, 'Macedonia'),
(135, 'Madagascar'),
(136, 'Malawi'),
(137, 'Malaysia'),
(138, 'Maldives'),
(139, 'Mali'),
(140, 'Malta'),
(141, 'Marshall Islands'),
(142, 'Martinique'),
(143, 'Mauritania'),
(144, 'Mauritius'),
(145, 'Mayotte'),
(146, 'Mexico'),
(147, 'Micronesia, Federated States of'),
(148, 'Moldova, Republic of'),
(149, 'Monaco'),
(150, 'Mongolia'),
(151, 'Montenegro'),
(152, 'Montserrat'),
(153, 'Morocco'),
(154, 'Mozambique'),
(155, 'Myanmar'),
(156, 'Namibia'),
(157, 'Nauru'),
(158, 'Nepal'),
(159, 'Netherlands'),
(160, 'Netherlands Antilles'),
(161, 'New Caledonia'),
(162, 'New Zealand'),
(163, 'Nicaragua'),
(164, 'Niger'),
(165, 'Nigeria'),
(166, 'Niue'),
(167, 'Norfolk Island'),
(168, 'Northern Mariana Islands'),
(169, 'Norway'),
(170, 'Oman'),
(171, 'Pakistan'),
(172, 'Palau'),
(173, 'Palestinian Territory'),
(174, 'Panama'),
(175, 'Papua New Guinea'),
(176, 'Paraguay'),
(177, 'Peru'),
(178, 'Philippines'),
(179, 'Pitcairn'),
(180, 'Poland'),
(181, 'Portugal'),
(182, 'Puerto Rico'),
(183, 'Qatar'),
(184, 'Reunion'),
(185, 'Romania'),
(186, 'Russia'),
(187, 'Russia'),
(188, 'Rwanda'),
(189, 'Saint Helena'),
(190, 'Saint Kitts and Nevis'),
(191, 'Saint Lucia'),
(192, 'Saint Pierre and Miquelon'),
(193, 'Saint Vincent and The Grenadines'),
(194, 'Samoa'),
(195, 'San Marino'),
(196, 'Sao Tome and Principe'),
(197, 'Saudi Arabia'),
(198, 'Senegal'),
(199, 'Serbia and Montenegro'),
(200, 'Seychelles'),
(201, 'Sierra Leone'),
(202, 'Singapore'),
(203, 'Slovakia'),
(204, 'Slovenia'),
(205, 'Solomon Islands'),
(206, 'Somalia'),
(207, 'South Africa'),
(208, 'South Georgia and The South Sandwich Islands'),
(209, 'Spain'),
(210, 'Sri Lanka'),
(211, 'Sudan'),
(212, 'Suriname'),
(213, 'Svalbard and Jan Mayen'),
(214, 'Swaziland'),
(215, 'Sweden'),
(216, 'Switzerland'),
(217, 'Syria'),
(218, 'Taiwan'),
(219, 'Tajikistan'),
(220, 'Tanzania, United Republic of'),
(221, 'Thailand'),
(222, 'Timor-leste'),
(223, 'Togo'),
(224, 'Tokelau'),
(225, 'Tonga'),
(226, 'Trinidad and Tobago'),
(227, 'Tunisia'),
(228, 'Turkey'),
(229, 'Turkey'),
(230, 'Turkmenistan'),
(231, 'Turks and Caicos Islands'),
(232, 'Tuvalu'),
(233, 'Uganda'),
(234, 'Ukraine'),
(235, 'United Arab Emirates'),
(236, 'United Kingdom'),
(237, 'United States'),
(238, 'United States Minor Outlying Islands'),
(239, 'Uruguay'),
(240, 'Uzbekistan'),
(241, 'Vanuatu'),
(242, 'Vatican City'),
(243, 'Venezuela'),
(244, 'Vietnam'),
(245, 'Virgin Islands, British'),
(246, 'Virgin Islands, U.S.'),
(247, 'Wallis and Futuna'),
(248, 'Western Sahara'),
(249, 'Yemen'),
(250, 'Yemen'),
(251, 'Zambia'),
(252, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `DEPARTMENT`
--

CREATE TABLE IF NOT EXISTS `DEPARTMENT` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `DEPARTMENT`
--

INSERT INTO `DEPARTMENT` (`ID`, `NAME`) VALUES
(1, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `DOWNLOAD_STATISTICS`
--

CREATE TABLE IF NOT EXISTS `DOWNLOAD_STATISTICS` (
  `ID` int(100) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(100) NOT NULL,
  `PDF_ID` int(100) NOT NULL,
  `DOWNLOAD_DATETIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- Dumping data for table `DOWNLOAD_STATISTICS`
--

INSERT INTO `DOWNLOAD_STATISTICS` (`ID`, `USER_ID`, `PDF_ID`, `DOWNLOAD_DATETIME`) VALUES
(1, 1, 41, '2013-12-30 22:26:28'),
(2, 1, 30, '2014-01-04 14:45:53'),
(3, 1, 42, '2014-01-04 15:24:10'),
(4, 1, 30, '2014-01-04 15:42:08'),
(5, 1, 31, '2014-01-05 00:01:36'),
(6, 1, 32, '2014-01-05 00:01:53'),
(7, 1, 33, '2014-01-05 00:02:03'),
(8, 1, 34, '2014-01-05 00:02:12'),
(9, 1, 36, '2014-01-05 00:02:28'),
(10, 1, 37, '2014-01-05 00:02:39'),
(11, 7, 42, '2014-01-06 03:35:17'),
(12, 14, 23, '2014-01-06 05:00:31'),
(13, 13, 39, '2014-01-06 07:45:27'),
(14, 13, 26, '2014-01-06 07:46:06'),
(15, 10, 29, '2014-01-06 10:12:17'),
(16, 7, 27, '2014-01-06 10:19:37'),
(17, 7, 25, '2014-01-06 10:20:15'),
(18, 7, 38, '2014-01-06 10:21:09'),
(19, 7, 30, '2014-01-06 10:26:11'),
(20, 7, 31, '2014-01-06 10:27:51'),
(21, 13, 23, '2014-01-15 01:19:40'),
(22, 7, 32, '2014-01-22 08:35:47'),
(23, 7, 36, '2014-01-22 09:10:19'),
(24, 1, 32, '2014-01-24 08:11:29'),
(25, 1, 36, '2014-01-24 08:12:47'),
(26, 1, 36, '2014-01-24 08:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `GROUP_LV1`
--

CREATE TABLE IF NOT EXISTS `GROUP_LV1` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DESCRIPTION` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `GROUP_LV1`
--

INSERT INTO `GROUP_LV1` (`ID`, `NAME`, `DESCRIPTION`) VALUES
(1, 'Think Tank', '');

-- --------------------------------------------------------

--
-- Table structure for table `GROUP_LV2`
--

CREATE TABLE IF NOT EXISTS `GROUP_LV2` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GROUP_LV1_ID` int(11) NOT NULL,
  `DESCRIPTION` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_GROUP_LV2_GROUP_LV11_idx` (`GROUP_LV1_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `GROUP_LV2`
--

INSERT INTO `GROUP_LV2` (`ID`, `NAME`, `GROUP_LV1_ID`, `DESCRIPTION`) VALUES
(1, 'Market', 1, 'Thailand Market Outlook'),
(2, 'Knowledge', 1, ''),
(3, 'Strategy', 1, ''),
(4, 'Around ASEAN', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `GROUP_LV3`
--

CREATE TABLE IF NOT EXISTS `GROUP_LV3` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GROUP_LV2_ID` int(11) NOT NULL,
  `DESCRIPTION` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_GROUP_LV3_GROUP_LV21_idx` (`GROUP_LV2_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `GROUP_LV3`
--

INSERT INTO `GROUP_LV3` (`ID`, `NAME`, `GROUP_LV2_ID`, `DESCRIPTION`) VALUES
(11, 'Country Profile', 4, 'รวบรวมข้อมูลพื้นฐาน ตัวเลขเศรษฐกิจ รวมทั้งจุดอ่อนจุดแข็งและการคาดการณ์ถึงอนาคตอันใกล้ของแต่ละประเทศในอาเซียน'),
(15, 'ICT Market', 1, 'อัพเดทเรื่องราวเกี่ยวกับตลาด ICT ในเมืองไทย'),
(16, 'TechTrend Report', 1, 'เทรนด์ของเทคโนโลยีที่น่าจับตามอง');

-- --------------------------------------------------------

--
-- Table structure for table `GROUP_LV4`
--

CREATE TABLE IF NOT EXISTS `GROUP_LV4` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GROUP_LV3_ID` int(11) NOT NULL,
  `DESCRIPTION` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_GROUP_LV4_GROUP_LV31_idx` (`GROUP_LV3_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `GROUP_LV5`
--

CREATE TABLE IF NOT EXISTS `GROUP_LV5` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `GROUP_LV4_ID` int(11) NOT NULL,
  `DESCRIPTION` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `GROUP_LV6`
--

CREATE TABLE IF NOT EXISTS `GROUP_LV6` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` int(11) NOT NULL,
  `GROUP_LV5_ID` int(11) NOT NULL,
  `DESCRIPTION` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `INDUSTRY`
--

CREATE TABLE IF NOT EXISTS `INDUSTRY` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `INDUSTRY`
--

INSERT INTO `INDUSTRY` (`ID`, `NAME`) VALUES
(1, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `INFO`
--

CREATE TABLE IF NOT EXISTS `INFO` (
  `ID` int(2) NOT NULL AUTO_INCREMENT,
  `DESCRIPTION` varchar(800) COLLATE utf8_unicode_ci NOT NULL,
  `DETAIL` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `UPDATE` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `INFO`
--

INSERT INTO `INFO` (`ID`, `DESCRIPTION`, `DETAIL`, `UPDATE`) VALUES
(1, 'welcome to mckansys.. ยินดีต้อนรับสู่ Omni Knowledge Portal ', 'รายละเอียดหน้าแรก', '2013-11-11 00:00:00'),
(2, 'Please <a href="http://portal.mckansys.com/login.php">sign in</a> to download', 'หัวข้อใน download box', '2013-11-18 00:00:00'),
(3, 'or <a href="http://portal.mckansys.com/contact-us.php">contact us</a> to be a membership', 'รายละเอียดใน download box', '2013-11-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `JOB_LEVEL`
--

CREATE TABLE IF NOT EXISTS `JOB_LEVEL` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `JOB_LEVEL`
--

INSERT INTO `JOB_LEVEL` (`ID`, `NAME`) VALUES
(1, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `PDF`
--

CREATE TABLE IF NOT EXISTS `PDF` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `PHOTO_NAME` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `DESCRIPTION` text COLLATE utf8_unicode_ci,
  `BY` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `PRICE` decimal(10,0) DEFAULT NULL,
  `UPDATE_DATE` datetime DEFAULT NULL,
  `COMPANY_ID` int(11) DEFAULT NULL,
  `PATH` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Is_Asian_country` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=49 ;

--
-- Dumping data for table `PDF`
--

INSERT INTO `PDF` (`ID`, `NAME`, `PHOTO_NAME`, `DESCRIPTION`, `BY`, `PRICE`, `UPDATE_DATE`, `COMPANY_ID`, `PATH`, `Is_Asian_country`) VALUES
(23, 'แนวโน้ม Near Field Communication ในประเทศไทย', '1391377563_1_CoverNFC.jpg', 'มัคคานซิสเชื่อว่า ภายในปี 2557  Near Field Communication (NFC) ซึ่งเป็นเทคโนโลยีการสื่อสารระยะสั้น จะเป็นช่วงเวลาแห่งการเติบโตและการใช้งานจริงอย่างแพร่หลายกับตลาดผู้บริโภคในประเทศไทย', 'Mckansys', 100, '2014-02-03 04:46:03', NULL, '1_Tech-NFC-271013_FINAL-Cover2.pdf', 0),
(24, 'ทิศทาง OTT โมเดลในประเทศไทย', '2_CoverOTT.jpg', 'ทิศทางรูปแบบธุรกิจ OTT หรือ Over-The-Top ที่กำลังเกิดขึ้นและได้รับความนิยมในปัจจุบันจากผู้พัฒนาโมบายแอพพลิเคชั่น และส่งผลกระทบโดยตรงต่อผู้ให้บริการสื่อสารข้อมูลไร้สายทั่วโลก', 'Mckansys', NULL, '2013-12-05 00:00:00', NULL, '2_OTT_Complete_Cover.pdf', 0),
(25, 'การบูรณาการองค์กรด้วย Business Intelligence', '1391377295_3_CoverBI.jpg', 'Business Intelligence (BI) คือ เทคโนโลยีในรูปแบบซอฟแวร์ เป็นระบบที่ถูกนำมาใช้เพื่อวิเคราะห์ข้อมูลในการปรับปรุงการบริการและผลิตภัณฑ์ รวมทั้งกลยุทธ์ในการเปิดตลาดใหม่ๆเป็นอันดับต้นๆใน 4-5 ปีมานี้ ', 'Mckansys', 100, '2014-02-03 04:41:35', NULL, '3_BusinessIntelligence-yah-cover.pdf', 0),
(26, 'ภาพรวมการสื่อสารโทรคมนาคม 2556', '1391377445_4_CoverOverall.jpg', 'ภาพรวมของสถานการณ์เศรษฐกิจภายในประเทศตั้งแต่ช่วงต้นปี 2555 เป็นต้นมา อุตสาหกรรมการสื่อสารโทรคมนาคมอยู่ในทิศทางที่ดีขึ้นอย่างต่อเนื่อง ความต้องการใช้บริการทางการสื่อสารมีการเติบโตอย่างชัดเจน   ', 'Mckansys', 100, '2014-02-03 04:44:06', NULL, '4_TelecomOVERALL2013.pdf', 0),
(27, 'ภาพรวมกลุ่มบริการเสียงแบบไร้สาย (Mobile services) 2556 ', '5_CoverMobile.jpg', 'การเติบโตของการใช้งานโทรศัพท์เคลื่อนที่ในประเทศไทยนั้น เริ่มจากการใช้บริการเสียงที่มีโปรโมชั่นแข่งขันกันอย่างหลากหลาย ตั้งแต่ปี 2553 เป็นต้นเริ่มมีกระแสนิยมในการใช้โทรศัพท์เคลื่อนที่แบบสมาร์ทโฟนในประเทศไทยมากขึ้น', 'Mckansys', 100, '2014-01-04 21:22:53', NULL, '5_TelcomVoice2013.pdf', 0),
(28, 'ภาพรวมกลุ่มบริการเสียงพื้นฐาน (Fixed-voice services) 2556 ', '6_CoverFixed.jpg', 'กลุ่มบริการเสียงพื้นฐานเงียบเหงามามากกว่า 5 ปี หลังจากโทรศัพท์เคลื่อนที่ได้เข้ามาแทนที่และได้รับความนิยมอย่างต่อเนื่อง  การลดลงที่เห็นผลกระทบได้ชัดเจนนั้น เพิ่งจะเกิดขึ้นในช่วงปี 2553  เนื่องจากความสามารถของบริการโทรศัพท์เคลื่อนที่และบริการอินเทอร์เน็ตความเร็วสูงเข้ามามีบทบาทและได้รับความนิยมมากขึ้นในประเทศไทย', 'Mckansys', 100, '2014-01-04 21:22:43', NULL, '6_TelecomMobile2013.pdf', 0),
(29, 'ภาพรวมสถานการณ์กลุ่มสื่อสารข้อมูล (Data Services) 2556 ', '7_CoverData.jpg', 'ตลอดช่วงระยะเวลาในปี 2554-2555 ที่ผ่านมา กลุ่มบริการสื่อสารข้อมูลได้ถูกขับเคลื่อนการใช้งานจาก ผู้ให้บริการโทรศัพท์เคลื่อนที่, กลุ่มการเงินธนาคาร และกลุ่มขายปลีก-ส่ง เพราะผู้ใช้บริการกลุ่มนี้ได้มีการขยายพื้นที่การให้บริการและสาขาไปยังตามชุมชนต่างจังหวัดมากขึ้น ', 'Mckansys', 100, '2014-01-04 21:17:44', NULL, '7_TelecomData2013.pdf', 0),
(30, 'Country Profile - Brunei', '1388460638_brunei.jpg', 'ข้อมูลพื้นฐาน ตัวเลขเศรษฐกิจ และ Outlook ประเทศบรูไน', 'Mckansys', 100, '2014-01-07 06:25:50', NULL, '1389050725_CountryProfile-Brunei2013.pdf', 0),
(31, 'Country Profile - Cambodia', '1388838551_cambodia.jpg', 'ข้อมูลพื้นฐาน ตัวเลขเศรษฐกิจ และ Outlook ประเทศกัมพูชา', 'Mckansys', 100, '2014-01-04 22:32:13', NULL, '1388849533_CountryProfile-Cambodia2013.pdf', 0),
(32, 'Country Profile - Indonesia', '1388838542_indonesia.jpg', 'ข้อมูลพื้นฐาน ตัวเลขเศรษฐกิจ และ Outlook ประเทศอินโดนีเซีย', 'Mckansys', 100, '2014-01-24 15:11:15', NULL, '1390551075_CountryProfile-Indonesia2014.pdf', 0),
(33, 'Country Profile - Laos', '1388838534_lao.jpg', 'ข้อมูลพื้นฐาน ตัวเลขเศรษฐกิจ และ Outlook ประเทศลาว', 'Mckansys', 100, '2014-01-04 22:31:03', NULL, '1388849463_CountryProfile-Laos2013.pdf', 0),
(34, 'Country Profile - Malaysia', '1388838524_malaysia.jpg', 'ข้อมูลพื้นฐาน ตัวเลขเศรษฐกิจ และ Outlook ประเทศมาเลเซีย', 'Mckansys', 100, '2014-01-04 22:30:39', NULL, '1388849439_CountryProfile-Malaysia2013.pdf', 0),
(36, 'Country Profile - Myanmar', '1388838507_myanmar.jpg', 'ข้อมูลพื้นฐาน ตัวเลขเศรษฐกิจ และ Outlook ประเทศพม่า', 'Mckansys', 100, '2014-01-24 15:15:37', NULL, '1390551337_CountryProfile-Myanmar2014.pdf', 0),
(37, 'Country Profile - Philippines', '1388838497_philipine.jpg', 'ข้อมูลพื้นฐาน ตัวเลขเศรษฐกิจ และ Outlook ประเทศฟิลิปปินส์', 'Mckansys', 100, '2014-01-04 22:29:30', NULL, '1388849370_CountryProfile-Philippines2013.pdf', 0),
(38, 'Country Profile - Singapore', '1388838485_singapore.jpg', 'ข้อมูลพื้นฐาน ตัวเลขเศรษฐกิจ และ Outlook ประเทศสิงคโปร์', 'Mckansys', 100, '2014-01-07 06:26:19', NULL, '1389050695_CountryProfile-Singapore2013.pdf', 0),
(39, 'Country Profile - Vietnam', '1389216425_vietnam.jpg', 'ข้อมูลพื้นฐาน ตัวเลขเศรษฐกิจ และ Outlook ประเทศเวียดนาม', 'Mckansys', 100, '2014-01-09 04:27:05', NULL, '1388849318_CountryProfile-Vietnam2013.pdf', 0),
(42, 'Country Profile - Thailand', '1389216389_thailand.jpg', 'ข้อมูลพื้นฐาน ตัวเลขเศรษฐกิจ ประเทศไทย', 'Mckansys', 100, '2014-01-09 04:26:29', NULL, '1388849023_CountryProfile-Thailand2013.pdf', 0),
(43, 'ความเคลื่อนไหวของพรบ.คอมพิวเตอร์', '1391375544_18_PRB.jpg', 'จากการสำรวจตลาดของการใช้คอมพิวเตอร์และอุปกรณ์สื่อสารโทรคมนาคมของประเทศไทยเมื่อปี 2550 ของสำนักงานสถิติแห่งชาติ กระทรวงเทคโนโลยีสารสนเทศและการสื่อสาร(ไอซีที) พบว่า มีผู้ใช้งานคอมพิวเตอร์ทุกประเภทประมาณ 16 ล้านคน(ตั้งแต่อายุ 6 ปีขึ้นไป) หรือ ร้อยละ 26.8 ของประชากรทั้งหมด โดยมีการเพิ่มการใช้งานขึ้นร้อยละ 4 เมื่อเทียบกับปี 2549 ', '', 100, '2014-02-03 04:13:09', NULL, '1391375544_18_ComputerCrimesThailand.pdf', 0),
(45, 'แนวโน้มการใช้งาน IaaS ในประเทศไทย', '1391375844_19_IaaS.jpg', 'IaaS หรือ infrastructure as a service เกิดเนื่องมาจากความเป็นจริงที่ว่า การลงทุนใน infrastructure นั้นใช้เงินลงทุนค่อนข้างสูง ทั้งค่าอุปกรณ์และค่าดูแลรักษาระบบ นอกจากนี้ยังพบว่าเจ้าของระบบเองก็ไม่ได้ใช้งานอย่างเต็มประสิทธิภาพเทียบกับเงินที่ลงทุนไป และการขยายการใช้งานก็ต้องใช้เงินลงทุนเพิ่มค่อนข้างสูง จึงเกิดแนวความคิดจากผู้ที่มีระบบอยู่ในมือว่า จะทำอย่างไรให้ใช้ประโยชน์จากสิ่งที่ลงทุนไปแล้วให้ได้ประโยชน์สูงที่สุด? IaaS จึงถือกำเนิดขึ้น โดยการนำระบบส่วนที่ยังไม่ได้ใช้งานไปจัดสรรให้แก่ผู้ที่ไม่มีเงินทุนเพียงพอเช่าใช้', '', 100, '2014-02-03 04:17:24', NULL, '1391375704_19_IaaS_TrendinThailand.pdf', 0),
(46, 'การประเมินมูลค่าทรัพย์สินทางปัญญา', '1391376046_20_IPV.jpg', 'การประเมินทรัพย์สินทางปัญญาเกิดขึ้นเนื่องจากการทำธุรกรรมซื้อ/ขายสินทรัพย์ โดยมีวัตถุประสงค์เพื่อให้ทั้งผู้ซื้อและผู้ขายรู้มูลค่าของสินทรัพย์ที่แท้จริงก่อนจะมีการตกลงซื้อหรือขายกัน', '', 100, '2014-02-03 04:38:45', NULL, '1391375949_20_IntellectualPropertyValuation.pdf', 0),
(47, 'Dynamic Consumption Behavior', '1391376199_21_DCB.jpg', 'Dynamic Consumption Behavior หรือการเปลี่ยนแปลงในแนวโน้มพฤติกรรมกลุ่มผู้บริโภค ถือเป็นการพลิกฟื้นคืนชีพของธุรกิจไอซีทีแบบครบวงจร (ICT Ecosystem) ตั้งแต่ผู้ให้บริการ content, platform, infrastructure ไปจนถึงผู้ผลิตอุปกรณ์และชิ้นส่วน ตลอดจนผู้ให้บริการประเภท system integration และ managed services ', '', 100, '2014-02-03 04:23:37', NULL, '1391376199_21_DynamicConsumptionBehavior.pdf', 0),
(48, 'เทรนด์ธุรกิจยุคดิจิตัล 2557', '1391377050_22_BusinessTrend.jpg', 'จากการสำรวจเทรนด์ในองค์กรยุคดิจิตัล ที่ต้องจับตาในปี 2557 พบว่า มี 4 เรื่องหลักที่เกี่ยวข้องกับการพัฒนาวิสัยทัศน์ขององค์กร ', '', 100, '2014-02-03 04:37:30', NULL, '1391377050_22_TrendBusinessDigitalAge.pdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `PDF_CATEGORY`
--

CREATE TABLE IF NOT EXISTS `PDF_CATEGORY` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PDF_ID` int(11) NOT NULL,
  `GROUP_LEVEL_NAME` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `GROUP_LEVEL_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `PDF_ID` (`PDF_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=63 ;

--
-- Dumping data for table `PDF_CATEGORY`
--

INSERT INTO `PDF_CATEGORY` (`ID`, `PDF_ID`, `GROUP_LEVEL_NAME`, `GROUP_LEVEL_ID`) VALUES
(37, 23, '3', 16),
(38, 24, '3', 16),
(39, 25, '2', 3),
(40, 26, '3', 15),
(41, 27, '3', 15),
(42, 28, '3', 15),
(43, 29, '3', 15),
(44, 30, '3', 11),
(45, 31, '3', 11),
(46, 32, '3', 11),
(47, 33, '3', 11),
(48, 34, '3', 11),
(50, 36, '3', 11),
(51, 37, '3', 11),
(52, 38, '3', 11),
(53, 39, '3', 11),
(56, 42, '3', 11),
(57, 43, '3', 15),
(59, 45, '3', 16),
(60, 46, '2', 2),
(61, 47, '3', 16),
(62, 48, '3', 16);

-- --------------------------------------------------------

--
-- Table structure for table `PERMISSION`
--

CREATE TABLE IF NOT EXISTS `PERMISSION` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_PROFILE_ID` int(11) NOT NULL,
  `GROUP_LV2_ID` int(11) NOT NULL,
  `IS_ACTIVE` char(1) COLLATE utf8_unicode_ci DEFAULT 'Y',
  `START_DATE` datetime NOT NULL,
  `END_DATE` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_USER_PROFILE_has_GROUP_LV2_GROUP_LV21_idx` (`GROUP_LV2_ID`),
  KEY `fk_USER_PROFILE_has_GROUP_LV2_USER_PROFILE1_idx` (`USER_PROFILE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=38 ;

--
-- Dumping data for table `PERMISSION`
--

INSERT INTO `PERMISSION` (`ID`, `USER_PROFILE_ID`, `GROUP_LV2_ID`, `IS_ACTIVE`, `START_DATE`, `END_DATE`) VALUES
(1, 1, 2, 'Y', '2013-09-01 00:00:00', '2014-09-28 00:00:00'),
(2, 3, 1, 'Y', '2013-10-03 00:00:00', '2014-10-17 00:00:00'),
(3, 4, 3, 'Y', '2013-09-01 00:00:00', '2014-09-28 00:00:00'),
(4, 4, 1, 'N', '2013-01-01 00:00:00', '2013-01-01 00:00:00'),
(5, 3, 3, 'N', '2013-10-01 00:00:00', '2013-10-01 00:00:00'),
(6, 1, 3, 'Y', '2013-10-17 00:00:00', '2014-10-31 00:00:00'),
(7, 1, 4, 'Y', '1970-01-01 00:00:00', '2014-12-31 00:00:00'),
(8, 3, 3, 'N', '2013-11-05 00:00:00', '2013-11-30 00:00:00'),
(9, 3, 4, 'N', '2013-11-05 00:00:00', '2013-11-30 00:00:00'),
(10, 7, 1, 'Y', '2014-01-01 00:00:00', '2014-06-30 00:00:00'),
(11, 7, 2, 'Y', '2014-01-01 00:00:00', '2014-06-30 00:00:00'),
(12, 7, 3, 'Y', '2014-01-01 00:00:00', '2014-06-30 00:00:00'),
(13, 7, 4, 'Y', '2014-01-01 00:00:00', '2014-06-30 00:00:00'),
(14, 9, 1, 'Y', '2014-01-01 00:00:00', '2014-06-30 00:00:00'),
(15, 9, 2, 'Y', '2014-01-01 00:00:00', '2014-06-30 00:00:00'),
(16, 9, 3, 'Y', '2014-01-01 00:00:00', '2014-06-30 00:00:00'),
(17, 9, 4, 'Y', '2014-01-01 00:00:00', '2014-06-30 00:00:00'),
(18, 10, 1, 'Y', '2014-01-01 00:00:00', '2014-06-30 00:00:00'),
(19, 10, 2, 'Y', '2014-01-01 00:00:00', '2014-06-30 00:00:00'),
(20, 10, 3, 'Y', '2014-01-01 00:00:00', '2014-06-30 00:00:00'),
(21, 10, 4, 'Y', '2014-01-01 00:00:00', '2014-06-30 00:00:00'),
(22, 11, 1, 'Y', '2014-01-01 00:00:00', '2014-06-30 00:00:00'),
(23, 11, 2, 'Y', '2014-01-01 00:00:00', '2014-06-30 00:00:00'),
(24, 11, 3, 'Y', '2014-01-01 00:00:00', '2014-06-30 00:00:00'),
(25, 11, 4, 'Y', '2014-01-01 00:00:00', '2014-06-30 00:00:00'),
(26, 12, 2, 'Y', '2014-01-01 00:00:00', '2014-06-30 00:00:00'),
(27, 12, 1, 'Y', '2014-01-01 00:00:00', '2014-06-30 00:00:00'),
(28, 12, 3, 'Y', '2014-01-01 00:00:00', '2014-06-30 00:00:00'),
(29, 12, 4, 'Y', '2014-01-01 00:00:00', '2014-06-30 00:00:00'),
(30, 13, 1, 'Y', '2014-01-01 00:00:00', '2014-06-30 00:00:00'),
(31, 13, 2, 'Y', '2014-01-01 00:00:00', '2014-06-30 00:00:00'),
(32, 13, 3, 'Y', '2014-01-01 00:00:00', '2014-06-30 00:00:00'),
(33, 13, 4, 'Y', '2014-01-01 00:00:00', '2014-06-30 00:00:00'),
(34, 14, 1, 'Y', '2014-01-01 00:00:00', '2014-06-30 00:00:00'),
(35, 14, 2, 'Y', '2014-01-01 00:00:00', '2014-06-30 00:00:00'),
(36, 14, 3, 'Y', '2014-01-01 00:00:00', '2014-06-30 00:00:00'),
(37, 14, 4, 'Y', '2014-01-01 00:00:00', '2014-06-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `QUESTION`
--

CREATE TABLE IF NOT EXISTS `QUESTION` (
  `ID` int(100) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `QUESTION`
--

INSERT INTO `QUESTION` (`ID`, `NAME`) VALUES
(1, 'What was your childhood nickname?'),
(2, 'What is the name of your favorite childhood friend? '),
(3, 'What is the middle name of your oldest child?'),
(4, 'What school did you attend for sixth grade?'),
(5, 'What was the name of your first stuffed animal?'),
(6, 'In what city or town did your mother and father meet? '),
(7, 'In what city does your nearest sibling live? '),
(8, 'In what city or town was your first job?'),
(9, 'What is the name of the place your wedding reception was held?'),
(10, 'What was your favorite place to visit as a child?'),
(11, 'What is the street number of the house you grew up in?'),
(12, 'What was your dream job as a child? ');

-- --------------------------------------------------------

--
-- Table structure for table `TAG`
--

CREATE TABLE IF NOT EXISTS `TAG` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `TAG`
--

INSERT INTO `TAG` (`ID`, `NAME`) VALUES
(1, 'tag1'),
(2, 'tag2'),
(3, 'tag3'),
(4, 'tag4'),
(5, 'tag5'),
(6, '');

-- --------------------------------------------------------

--
-- Table structure for table `TAG_RELATIONSHIP`
--

CREATE TABLE IF NOT EXISTS `TAG_RELATIONSHIP` (
  `PDF_ID` int(11) NOT NULL,
  `TAG_ID` int(11) NOT NULL,
  PRIMARY KEY (`PDF_ID`,`TAG_ID`),
  KEY `fk_PDF_has_TAG_TAG1_idx` (`TAG_ID`),
  KEY `fk_PDF_has_TAG_PDF1_idx` (`PDF_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `TAG_RELATIONSHIP`
--

INSERT INTO `TAG_RELATIONSHIP` (`PDF_ID`, `TAG_ID`) VALUES
(23, 6),
(25, 6),
(26, 6),
(27, 6),
(28, 6),
(29, 6),
(30, 6),
(31, 6),
(32, 6),
(33, 6),
(34, 6),
(36, 6),
(37, 6),
(38, 6),
(39, 6),
(42, 6),
(43, 6),
(45, 6),
(46, 6),
(47, 6);

-- --------------------------------------------------------

--
-- Table structure for table `TECHNOLOGY_ID`
--

CREATE TABLE IF NOT EXISTS `TECHNOLOGY_ID` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `TECHNOLOGY_ID`
--

INSERT INTO `TECHNOLOGY_ID` (`ID`, `NAME`) VALUES
(1, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `USER_LIMIT_DOWNLOAD`
--

CREATE TABLE IF NOT EXISTS `USER_LIMIT_DOWNLOAD` (
  `ID` int(100) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(100) NOT NULL,
  `LIMIT_DOWNLOAD` int(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `USER_PROFILE`
--

CREATE TABLE IF NOT EXISTS `USER_PROFILE` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FIRSTNAME` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `LASTNAME` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `COMPANY` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `PASSWORD` varchar(250) COLLATE utf8_unicode_ci NOT NULL COMMENT 'md5(sha1($password)) ต่อ String กับ sha1(md5($password))',
  `JOB_TITLE` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ADDRESS` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CITY` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ZIP` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PHONE` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FAX` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IS_ACTIVE` varchar(1) COLLATE utf8_unicode_ci DEFAULT 'Y',
  `IS_ADMIN` varchar(1) COLLATE utf8_unicode_ci DEFAULT 'N',
  `JOB_LEVEL` int(11) DEFAULT NULL,
  `DEPARTMENT_ID` int(11) NOT NULL,
  `INDUSTRY_ID` int(11) NOT NULL,
  `COUNTRY_ID` int(11) NOT NULL,
  `TECHNOLOGY_ID` int(11) DEFAULT NULL,
  `USER_PROFILEcol` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PHOTO_NAME` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `QUESTION_ID` int(50) NOT NULL,
  `ANSWER` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `EMAIL` (`EMAIL`),
  KEY `fk_USER_PROFILE_JOB_LEVEL1_idx` (`JOB_LEVEL`),
  KEY `fk_USER_PROFILE_DEPARTMENT_ID1_idx` (`DEPARTMENT_ID`),
  KEY `fk_USER_PROFILE_INDUSTRY_ID1_idx` (`INDUSTRY_ID`),
  KEY `fk_USER_PROFILE_COUNTRY_ID1_idx` (`COUNTRY_ID`),
  KEY `fk_USER_PROFILE_TECHNOLOGY_ID1_idx` (`TECHNOLOGY_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `USER_PROFILE`
--

INSERT INTO `USER_PROFILE` (`ID`, `FIRSTNAME`, `LASTNAME`, `EMAIL`, `COMPANY`, `PASSWORD`, `JOB_TITLE`, `ADDRESS`, `CITY`, `ZIP`, `PHONE`, `FAX`, `IS_ACTIVE`, `IS_ADMIN`, `JOB_LEVEL`, `DEPARTMENT_ID`, `INDUSTRY_ID`, `COUNTRY_ID`, `TECHNOLOGY_ID`, `USER_PROFILEcol`, `PHOTO_NAME`, `QUESTION_ID`, `ANSWER`) VALUES
(1, 'sukanya', 'AA', 'a@a.com', 'AA', 'f51fc62cdba8a6e536d604b47e30b49551c560256dac08ccfc8204823a492775d669a57e', 'test', '', '', '', '', '', 'Y', 'N', 1, 1, 1, 221, 1, NULL, 'testUserProfile.jpg', 1, 'a'),
(3, 'B', 'B', 'nikom2532@gmail.com', 'B', '7014de06693eca5c7a6f258b98fa2048ef7ad6c1faf1e46a706cd0615ada442bbc570b0e', '', '', '', '', '', '', 'Y', 'N', 1, 1, 1, 1, 1, NULL, '', 2, 'b'),
(4, 'Voravan', 'Charn', 'wc.fone@yahoo.com', 'Buildthedot', '7014de06693eca5c7a6f258b98fa2048ef7ad6c1faf1e46a706cd0615ada442bbc570b0e', NULL, NULL, NULL, NULL, NULL, NULL, 'Y', 'N', 1, 1, 1, 1, 1, NULL, '', 3, 'fon'),
(7, 'Yuthana', 'Siri', 'yuthana@mckansys.com', 'Mckansys (Thailand) Co., Ltd.', 'f51fc62cdba8a6e536d604b47e30b49551c560256dac08ccfc8204823a492775d669a57e', '', '', '', '', '', '', 'Y', 'N', 1, 1, 1, 221, 1, NULL, 'no-image.png', 0, ''),
(9, 'Warunee', 'P', 'warunee.p@oto.samartcorp.com', 'One to One Contact Center', '48ee13603e6787fcb67f822b3ea35835cbfeef0cf18bfcb92f1fe02755b61c3112c7bbcd', '', '', '', '', '', '', 'Y', 'N', 1, 1, 1, 221, 1, NULL, 'no-image.png', 0, ''),
(10, 'Yugijo', 'D', 'Yugijo.d@aapico.com', 'Aapica', 'fdd6a13634952d950883fd6d4e40274f94836ddcda485e1e19f409322e0da43066fabd13', '', '', '', '', '', '', 'Y', 'N', 1, 1, 1, 221, 1, NULL, 'no-image.png', 0, ''),
(11, 'Siribhorn', '', 'siribhorn@etda.or.th', 'ETDA', '9519950266969f700abfbe7ae55a1bd188736b4a7919bc0543ba54e39a4624d125665f0d', '', '', '', '', '', '', 'Y', 'N', 1, 1, 1, 221, 1, NULL, 'no-image.png', 0, ''),
(12, 'Thaveesak', 'D', 'thaveesak.d@irpc.co.th', 'IRPC', '1210fe92ce4d4ab06b68c9750907dc4fcd08b85bb85beecfec9094b601a7edad8260da27', '', '', '', '', '', '', 'Y', 'N', 1, 1, 1, 221, 1, NULL, 'no-image.png', 0, ''),
(13, 'Panida', 'w', 'panidaw@scg.co.th', 'SCG', '98cd8e68c6d6c00b35d721f1a71bb086ffdac90d66558bc8b9d7566d1f761aa52960ce42', '', '', '', '', '', '', 'Y', 'N', 1, 1, 1, 221, 1, NULL, 'no-image.png', 0, ''),
(14, 'Thanit', 'Sor', 'thanit_sor@truecorp.co.th', 'True Coporation', 'a9d05e92dad95b06c12fca58a0ab921b241c87ee7c2458ccba77fc9f030ea97bb526d911', '', '', '', '', '', '', 'Y', 'N', 1, 1, 1, 221, 1, NULL, 'no-image.png', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `USER_TRANSACTION`
--

CREATE TABLE IF NOT EXISTS `USER_TRANSACTION` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_PROFILE_ID` int(11) NOT NULL,
  `PDF_ID` int(11) NOT NULL,
  `DOWNLOAD_DATE` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`,`USER_PROFILE_ID`,`PDF_ID`),
  KEY `fk_USER_TRANSACTION_PDF1_idx` (`PDF_ID`),
  KEY `fk_USER_TRANSACTION_USER_PROFILE1_idx` (`USER_PROFILE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `GROUP_LV2`
--
ALTER TABLE `GROUP_LV2`
  ADD CONSTRAINT `fk_GROUP_LV2_GROUP_LV11` FOREIGN KEY (`GROUP_LV1_ID`) REFERENCES `GROUP_LV1` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `GROUP_LV3`
--
ALTER TABLE `GROUP_LV3`
  ADD CONSTRAINT `fk_GROUP_LV3_GROUP_LV21` FOREIGN KEY (`GROUP_LV2_ID`) REFERENCES `GROUP_LV2` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `GROUP_LV4`
--
ALTER TABLE `GROUP_LV4`
  ADD CONSTRAINT `fk_GROUP_LV4_GROUP_LV31` FOREIGN KEY (`GROUP_LV3_ID`) REFERENCES `GROUP_LV3` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `PDF_CATEGORY`
--
ALTER TABLE `PDF_CATEGORY`
  ADD CONSTRAINT `PDF_CATEGORY_ibfk_1` FOREIGN KEY (`PDF_ID`) REFERENCES `PDF` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `PERMISSION`
--
ALTER TABLE `PERMISSION`
  ADD CONSTRAINT `fk_USER_PROFILE_has_GROUP_LV2_GROUP_LV21` FOREIGN KEY (`GROUP_LV2_ID`) REFERENCES `GROUP_LV2` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_USER_PROFILE_has_GROUP_LV2_USER_PROFILE1` FOREIGN KEY (`USER_PROFILE_ID`) REFERENCES `USER_PROFILE` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `TAG_RELATIONSHIP`
--
ALTER TABLE `TAG_RELATIONSHIP`
  ADD CONSTRAINT `fk_PDF_has_TAG_PDF1` FOREIGN KEY (`PDF_ID`) REFERENCES `PDF` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PDF_has_TAG_TAG1` FOREIGN KEY (`TAG_ID`) REFERENCES `TAG` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `USER_PROFILE`
--
ALTER TABLE `USER_PROFILE`
  ADD CONSTRAINT `fk_USER_PROFILE_COUNTRY_ID1` FOREIGN KEY (`COUNTRY_ID`) REFERENCES `COUNTRY` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_USER_PROFILE_DEPARTMENT_ID1` FOREIGN KEY (`DEPARTMENT_ID`) REFERENCES `DEPARTMENT` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_USER_PROFILE_INDUSTRY_ID1` FOREIGN KEY (`INDUSTRY_ID`) REFERENCES `INDUSTRY` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_USER_PROFILE_JOB_LEVEL1` FOREIGN KEY (`JOB_LEVEL`) REFERENCES `JOB_LEVEL` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_USER_PROFILE_TECHNOLOGY_ID1` FOREIGN KEY (`TECHNOLOGY_ID`) REFERENCES `TECHNOLOGY_ID` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `USER_TRANSACTION`
--
ALTER TABLE `USER_TRANSACTION`
  ADD CONSTRAINT `fk_USER_TRANSACTION_PDF1` FOREIGN KEY (`PDF_ID`) REFERENCES `PDF` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_USER_TRANSACTION_USER_PROFILE1` FOREIGN KEY (`USER_PROFILE_ID`) REFERENCES `USER_PROFILE` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
