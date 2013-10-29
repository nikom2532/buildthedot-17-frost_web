-- phpMyAdmin SQL Dump
-- version 3.4.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 29, 2013 at 09:52 PM
-- Server version: 5.1.66
-- PHP Version: 5.3.3-7+squeeze15

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mckansys5`
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
  `NAME` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `CAPITAL` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `LANGUAGE` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `POPULATION` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `RELIGION` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `CURRENCY` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `PARAGRAPH_1` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `PARAGRAPH_2` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `PARAGRAPH_3` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `PHOTO_NAME` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
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
  `NAME` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
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
  `NAME` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `DOWNLOAD_STATISTICS`
--

INSERT INTO `DOWNLOAD_STATISTICS` (`ID`, `USER_ID`, `PDF_ID`, `DOWNLOAD_DATETIME`) VALUES
(1, 1, 21, '2013-10-17 05:37:16'),
(2, 1, 21, '2013-10-17 05:42:15'),
(3, 3, 21, '2013-10-17 05:42:58'),
(4, 3, 21, '2013-10-17 05:43:20'),
(5, 3, 21, '2013-10-17 05:43:23'),
(6, 3, 21, '2013-10-17 05:43:25'),
(7, 3, 21, '2013-10-17 05:43:28'),
(8, 3, 21, '2013-10-17 09:50:34'),
(9, 3, 21, '2013-10-17 09:51:03'),
(10, 3, 21, '2013-10-17 11:10:02'),
(11, 1, 2, '2013-10-17 11:16:49'),
(12, 1, 2, '2013-10-17 11:17:05'),
(13, 1, 2, '2013-10-17 11:23:50'),
(14, 1, 1, '2013-10-17 11:28:03'),
(15, 3, 21, '2013-10-22 07:28:01'),
(16, 3, 21, '2013-10-22 07:29:28'),
(17, 1, 17, '2013-10-29 14:21:54'),
(18, 1, 18, '2013-10-29 14:22:12'),
(19, 1, 17, '2013-10-29 14:22:53'),
(20, 1, 21, '2013-10-29 14:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `GROUP_LV1`
--

CREATE TABLE IF NOT EXISTS `GROUP_LV1` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `DESCRIPTION` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `GROUP_LV1`
--

INSERT INTO `GROUP_LV1` (`ID`, `NAME`, `DESCRIPTION`) VALUES
(1, 'Knowledge', ''),
(2, 'Best Practice', '');

-- --------------------------------------------------------

--
-- Table structure for table `GROUP_LV2`
--

CREATE TABLE IF NOT EXISTS `GROUP_LV2` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `GROUP_LV1_ID` int(11) NOT NULL,
  `DESCRIPTION` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_GROUP_LV2_GROUP_LV11_idx` (`GROUP_LV1_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `GROUP_LV2`
--

INSERT INTO `GROUP_LV2` (`ID`, `NAME`, `GROUP_LV1_ID`, `DESCRIPTION`) VALUES
(1, 'Market', 1, ''),
(2, 'Technology', 1, ''),
(3, 'Strategy', 1, ''),
(4, 'Around Asian', 1, ''),
(5, 'E-Business', 2, ''),
(6, 'Customer Experience Management', 2, ''),
(7, 'Value Innovation', 2, ''),
(8, 'Process Improvement', 2, ''),
(9, 'Go to Market', 2, ''),
(10, 'Competitive Analysis', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `GROUP_LV3`
--

CREATE TABLE IF NOT EXISTS `GROUP_LV3` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `GROUP_LV2_ID` int(11) NOT NULL,
  `DESCRIPTION` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_GROUP_LV3_GROUP_LV21_idx` (`GROUP_LV2_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `GROUP_LV3`
--

INSERT INTO `GROUP_LV3` (`ID`, `NAME`, `GROUP_LV2_ID`, `DESCRIPTION`) VALUES
(3, 'E-Business', 3, ''),
(4, 'Customer Experience Management', 3, ''),
(5, 'Value Innovation', 3, ''),
(6, 'Process Improvement', 3, ''),
(7, 'Go to Market', 3, ''),
(8, 'Competitive Analysis', 3, ''),
(9, 'Update AEC News', 4, ''),
(10, 'Competency Index', 4, ''),
(11, 'Country Profile', 4, ''),
(12, 'Company', 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `GROUP_LV4`
--

CREATE TABLE IF NOT EXISTS `GROUP_LV4` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `GROUP_LV3_ID` int(11) NOT NULL,
  `DESCRIPTION` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_GROUP_LV4_GROUP_LV31_idx` (`GROUP_LV3_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `GROUP_LV4`
--

INSERT INTO `GROUP_LV4` (`ID`, `NAME`, `GROUP_LV3_ID`, `DESCRIPTION`) VALUES
(5, 'World Economic Index', 10, ''),
(6, 'ICT Competency Index', 10, ''),
(7, 'Country', 11, ''),
(8, 'Year', 12, '');

-- --------------------------------------------------------

--
-- Table structure for table `GROUP_LV5`
--

CREATE TABLE IF NOT EXISTS `GROUP_LV5` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `GROUP_LV4_ID` int(11) NOT NULL,
  `DESCRIPTION` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

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
  `NAME` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `INDUSTRY`
--

INSERT INTO `INDUSTRY` (`ID`, `NAME`) VALUES
(1, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `JOB_LEVEL`
--

CREATE TABLE IF NOT EXISTS `JOB_LEVEL` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
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
  `NAME` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `PHOTO_NAME` varchar(100) CHARACTER SET latin1 NOT NULL,
  `DESCRIPTION` text CHARACTER SET utf8 COLLATE utf8_bin,
  `PRICE` decimal(10,0) DEFAULT NULL,
  `UPDATE_DATE` datetime DEFAULT NULL,
  `COMPANY_ID` int(11) DEFAULT NULL,
  `PATH` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `Is_Asian_country` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `PDF`
--

INSERT INTO `PDF` (`ID`, `NAME`, `PHOTO_NAME`, `DESCRIPTION`, `PRICE`, `UPDATE_DATE`, `COMPANY_ID`, `PATH`, `Is_Asian_country`) VALUES
(1, 'test1', 'testPDF.jpg', 0x4c6f72656d20497073756d2069732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c204c6f72656d2031, 100, '2013-09-01 00:00:00', 1, 'TestPdf1.pdf', 0),
(2, 'test2', 'testPDF.jpg', 0x4c6f72656d20497073756d2069732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c204c6f72656d2032, 200, '2013-09-02 00:00:00', 2, 'TestPdf2.pdf', 0),
(3, 'test3', 'testPDF.jpg', 0x4c6f72656d20497073756d2069732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c204c6f72656d2033, 300, '2013-09-03 00:00:00', 3, 'TestPdf3.pdf', 0),
(4, 'test4', 'testPDF.jpg', 0x4c6f72656d20497073756d2069732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c204c6f72656d2034, 400, '2013-09-04 00:00:00', 4, 'TestPdf4.pdf', 0),
(5, 'test5', 'testPDF.jpg', 0x4c6f72656d20497073756d2069732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c204c6f72656d2035, 500, '2013-09-05 00:00:00', 5, 'TestPdf5.pdf', 0),
(7, 'Brunei Darussalam', 'brunei.jpg', 0x61736466, 100, NULL, NULL, 'TestPdf1.pdf', 1),
(8, 'Cambodia', 'cambodia.jpg', 0x4c6f72656d20497073756d2069732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e636520746865203135303073, 100, NULL, NULL, 'TestPdf1.pdf', 1),
(9, 'Indonesia', 'indonesia.jpg', 0x616161, 100, NULL, NULL, 'TestPdf1.pdf', 1),
(10, 'Lao PDR', 'lao.jpg', 0x616161, 100, NULL, NULL, 'TestPdf1.pdf', 1),
(11, 'Malaysia', 'malaysia.jpg', 0x616161, 100, NULL, NULL, 'TestPdf1.pdf', 1),
(12, 'Myanmar', 'myanmar.jpg', 0x616161, 100, NULL, NULL, 'TestPdf1.pdf', 1),
(13, 'Philippines', 'philipine.jpg', 0x616161, 100, NULL, NULL, 'TestPdf1.pdf', 1),
(14, 'Singapore', 'singapore.jpg', 0x616161, 100, NULL, NULL, 'TestPdf1.pdf', 1),
(15, 'Thailand', 'thailand.jpg', 0x616161, 100, NULL, NULL, 'TestPdf1.pdf', 1),
(16, 'Viet Nam', 'vietnam.jpg', 0x616161, 100, NULL, NULL, 'TestPdf1.pdf', 1),
(17, 'Augmenting Mobile 3G Using WiFi', 'testPDF.jpg', 0x576520696e7665737469676174652069662057694669206163636573732063616e206265207573656420746f206175676d656e7420334720636170616369747920696e206d6f62696c6520656e7669726f6e6d656e74732e205765200c72737420636f6e6475637420612064657461696c6564207374756479206f6620334720616e642057694669206163636573732066726f6d206d6f76696e672076656869636c65732c20696e2074687265650d0a64690b6572656e74206369746965732e205765200c6e64207468617420746865206176657261676520334720616e64205769466920617661696c6162696c697479206163726f737320746865206369746965732069732038372520616e64203131252c20726573706563746976656c792e2057694669207468726f756768707574206973206c6f776572207468616e203347207468726f7567687075742c20616e642057694669206c6f737320726174657320617265206869676865722e, NULL, '2013-10-14 14:00:00', NULL, 'Augmenting3G.pdf', 0),
(18, 'Third Generation (3G) Wireless', 'testPDF.jpg', 0x334720697320746865206e6578742067656e65726174696f6e206f6620776972656c657373206e6574776f726b20746563686e6f6c6f677920746861742070726f766964657320686967682073706565640d0a62616e6477696474682028686967682064617461207472616e736665722072617465732920746f2068616e6468656c6420646576696365732e2054686520686967682064617461207472616e736665722072617465732077696c6c20616c6c6f77203347206e6574776f726b7320746f206f66666572206d756c74696d6564696120736572766963657320636f6d62696e696e6720766f69636520616e6420646174612e, NULL, '2013-10-14 14:10:00', NULL, 'brief3G.pdf', 0),
(19, 'THINGS YOU SHOULD KNOW ABOUT… Cloud Computing', 'testPDF.jpg', 0x496e206974732062726f61646573742075736167652c20746865207465726d20636c6f756420636f6d707574696e672072656665727320746f207468652064656c6976657279206f66207363616c61626c65204954207265736f7572636573206f7665722074686520496e7465726e65742c206173206f70706f73656420746f20686f7374696e6720616e64206f7065726174696e672074686f7365207265736f7572636573206c6f63616c6c792c2073756368206173206f6e206120636f6c6c656765206f7220756e6976657273697479206e6574776f726b2e2054686f7365207265736f75726365732063616e20696e636c756465206170706c69636174696f6e7320616e642073657276696365732c2061732077656c6c2061732074686520696e667261737472756374757265206f6e2077686963682074686579206f7065726174652e4279206465706c6f79696e6720495420696e66726173747275637475726520616e64207365727669636573206f76657220746865206e6574776f726b2c20616e206f7267616e697a6174696f6e2063616e207075726368617365207468657365207265736f7572636573206f6e20616e2061732d6e65656465642062617369730d0a616e642061766f696420746865206361706974616c20636f737473206f6620736f66747761726520616e642068617264776172652e205769746820636c6f756420636f6d707574696e672c2049542063617061636974792063616e2062652061646a757374656420717569636b6c7920616e6420656173696c7920746f206163636f6d6d6f64617465206368616e67657320696e2064656d616e642e, NULL, '2013-10-14 14:16:00', NULL, 'CloudComputing.pdf', 0),
(20, 'The Economics of Cloud Computing', '', 0x496e206974732062726f61646573742075736167652c20746865207465726d20636c6f756420636f6d707574696e672072656665727320746f207468652064656c6976657279206f66207363616c61626c65204954207265736f7572636573206f7665722074686520496e7465726e65742c206173206f70706f73656420746f20686f7374696e6720616e64206f7065726174696e672074686f7365207265736f7572636573206c6f63616c6c792c2073756368206173206f6e206120636f6c6c656765206f7220756e6976657273697479206e6574776f726b2e2054686f7365207265736f75726365732063616e20696e636c756465206170706c69636174696f6e7320616e642073657276696365732c2061732077656c6c2061732074686520696e667261737472756374757265206f6e2077686963682074686579206f7065726174652e4279206465706c6f79696e6720495420696e66726173747275637475726520616e64207365727669636573206f76657220746865206e6574776f726b2c20616e206f7267616e697a6174696f6e2063616e207075726368617365207468657365207265736f7572636573206f6e20616e2061732d6e65656465642062617369730d0a616e642061766f696420746865206361706974616c20636f737473206f6620736f66747761726520616e642068617264776172652e205769746820636c6f756420636f6d707574696e672c2049542063617061636974792063616e2062652061646a757374656420717569636b6c7920616e6420656173696c7920746f206163636f6d6d6f64617465206368616e67657320696e2064656d616e642e, NULL, '2013-10-15 15:20:13', NULL, 'Economics-of-Cloud-Computing.pdf', 0),
(21, 'E-Business Model', 'testPDF.jpg', 0x496e206974732062726f61646573742075736167652c20746865207465726d20636c6f756420636f6d707574696e672072656665727320746f207468652064656c6976657279206f66207363616c61626c65204954207265736f7572636573206f7665722074686520496e7465726e65742c206173206f70706f73656420746f20686f7374696e6720616e64206f7065726174696e672074686f7365207265736f7572636573206c6f63616c6c792c2073756368206173206f6e206120636f6c6c656765206f7220756e6976657273697479206e6574776f726b2e2054686f7365207265736f75726365732063616e20696e636c756465206170706c69636174696f6e7320616e642073657276696365732c2061732077656c6c2061732074686520696e667261737472756374757265206f6e2077686963682074686579206f7065726174652e204279206465706c6f79696e6720495420696e66726173747275637475726520616e64207365727669636573206f76657220746865206e6574776f726b2c20616e206f7267616e697a6174696f6e2063616e207075726368617365207468657365207265736f7572636573206f6e20616e2061732d6e65656465642062617369730d0a616e642061766f696420746865206361706974616c20636f737473206f6620736f66747761726520616e642068617264776172652e205769746820636c6f756420636f6d707574696e672c2049542063617061636974792063616e2062652061646a757374656420717569636b6c7920616e6420656173696c7920746f206163636f6d6d6f646174650d0a6368616e67657320696e2064656d616e642e, NULL, '2013-10-16 00:00:00', NULL, 'ModeleEBusiness.pdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `PDF_CATEGORY`
--

CREATE TABLE IF NOT EXISTS `PDF_CATEGORY` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PDF_ID` int(11) NOT NULL,
  `GROUP_LEVEL_NAME` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `GROUP_LEVEL_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `PDF_ID` (`PDF_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `PDF_CATEGORY`
--

INSERT INTO `PDF_CATEGORY` (`ID`, `PDF_ID`, `GROUP_LEVEL_NAME`, `GROUP_LEVEL_ID`) VALUES
(1, 1, '2', 2),
(2, 2, '3', 3),
(3, 7, '3', 11),
(4, 8, '3', 11),
(5, 9, '3', 11),
(6, 10, '3', 11),
(7, 11, '3', 11),
(8, 12, '3', 11),
(9, 13, '3', 11),
(10, 14, '3', 11),
(11, 15, '3', 11),
(12, 16, '3', 11),
(24, 17, '3', 3),
(25, 18, '3', 4),
(26, 19, '3', 9),
(27, 20, '4', 5),
(28, 21, '3', 3);

-- --------------------------------------------------------

--
-- Table structure for table `PERMISSION`
--

CREATE TABLE IF NOT EXISTS `PERMISSION` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_PROFILE_ID` int(11) NOT NULL,
  `GROUP_LV2_ID` int(11) NOT NULL,
  `IS_ACTIVE` char(1) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT 'Y',
  `START_DATE` datetime NOT NULL,
  `END_DATE` datetime NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_USER_PROFILE_has_GROUP_LV2_GROUP_LV21_idx` (`GROUP_LV2_ID`),
  KEY `fk_USER_PROFILE_has_GROUP_LV2_USER_PROFILE1_idx` (`USER_PROFILE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `PERMISSION`
--

INSERT INTO `PERMISSION` (`ID`, `USER_PROFILE_ID`, `GROUP_LV2_ID`, `IS_ACTIVE`, `START_DATE`, `END_DATE`) VALUES
(1, 1, 2, 'Y', '2013-09-01 00:00:00', '2014-09-28 00:00:00'),
(2, 3, 1, 'N', '2013-10-03 00:00:00', '2014-10-17 00:00:00'),
(3, 4, 3, 'Y', '2013-09-01 00:00:00', '2014-09-28 00:00:00'),
(4, 4, 1, 'N', '2013-01-01 00:00:00', '2013-01-01 00:00:00'),
(5, 3, 3, 'N', '2013-10-01 00:00:00', '2013-10-01 00:00:00'),
(6, 1, 3, 'Y', '2013-10-17 00:00:00', '2013-10-31 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `QUESTION`
--

CREATE TABLE IF NOT EXISTS `QUESTION` (
  `ID` int(100) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
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
  `NAME` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `TAG`
--

INSERT INTO `TAG` (`ID`, `NAME`) VALUES
(1, 'tag1'),
(2, 'tag2'),
(3, 'tag3'),
(4, 'tag4'),
(5, 'tag5');

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
(1, 1),
(2, 1),
(1, 2),
(2, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `TECHNOLOGY_ID`
--

CREATE TABLE IF NOT EXISTS `TECHNOLOGY_ID` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `TECHNOLOGY_ID`
--

INSERT INTO `TECHNOLOGY_ID` (`ID`, `NAME`) VALUES
(1, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `USER_PROFILE`
--

CREATE TABLE IF NOT EXISTS `USER_PROFILE` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FIRSTNAME` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `LASTNAME` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `EMAIL` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `COMPANY` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `PASSWORD` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'md5(sha1($password)) ต่อ String กับ sha1(md5($password))',
  `JOB_TITLE` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `ADDRESS` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `CITY` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `ZIP` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `PHONE` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `FAX` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `IS_ACTIVE` varchar(1) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT 'Y',
  `IS_ADMIN` varchar(1) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT 'N',
  `JOB_LEVEL` int(11) DEFAULT NULL,
  `DEPARTMENT_ID` int(11) NOT NULL,
  `INDUSTRY_ID` int(11) NOT NULL,
  `COUNTRY_ID` int(11) NOT NULL,
  `TECHNOLOGY_ID` int(11) DEFAULT NULL,
  `USER_PROFILEcol` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `PHOTO_NAME` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `QUESTION_ID` int(50) NOT NULL,
  `ANSWER` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `EMAIL` (`EMAIL`),
  KEY `fk_USER_PROFILE_JOB_LEVEL1_idx` (`JOB_LEVEL`),
  KEY `fk_USER_PROFILE_DEPARTMENT_ID1_idx` (`DEPARTMENT_ID`),
  KEY `fk_USER_PROFILE_INDUSTRY_ID1_idx` (`INDUSTRY_ID`),
  KEY `fk_USER_PROFILE_COUNTRY_ID1_idx` (`COUNTRY_ID`),
  KEY `fk_USER_PROFILE_TECHNOLOGY_ID1_idx` (`TECHNOLOGY_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `USER_PROFILE`
--

INSERT INTO `USER_PROFILE` (`ID`, `FIRSTNAME`, `LASTNAME`, `EMAIL`, `COMPANY`, `PASSWORD`, `JOB_TITLE`, `ADDRESS`, `CITY`, `ZIP`, `PHONE`, `FAX`, `IS_ACTIVE`, `IS_ADMIN`, `JOB_LEVEL`, `DEPARTMENT_ID`, `INDUSTRY_ID`, `COUNTRY_ID`, `TECHNOLOGY_ID`, `USER_PROFILEcol`, `PHOTO_NAME`, `QUESTION_ID`, `ANSWER`) VALUES
(1, 'A', 'A', 'a@a.com', 'A', '77de54ccf56eb6f7dbf99e4d3be949ab6f9b0a55df8ac28564cb9f63a10be8af6ab3f7c2', '', '', '', '', '', '', 'Y', 'N', 1, 1, 1, 1, 1, NULL, 'testUserProfile.jpg', 1, 'a'),
(3, 'B', 'B', 'b@b.com', 'B', '7014de06693eca5c7a6f258b98fa2048ef7ad6c1faf1e46a706cd0615ada442bbc570b0e', NULL, NULL, NULL, NULL, NULL, NULL, 'Y', 'N', 1, 1, 1, 1, 1, NULL, '', 2, 'b'),
(4, 'Voravan', 'Charn', 'wc.fone@yahoo.com', 'Buildthedot', '7014de06693eca5c7a6f258b98fa2048ef7ad6c1faf1e46a706cd0615ada442bbc570b0e', NULL, NULL, NULL, NULL, NULL, NULL, 'Y', 'N', 1, 1, 1, 1, 1, NULL, '', 3, 'fon');

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
