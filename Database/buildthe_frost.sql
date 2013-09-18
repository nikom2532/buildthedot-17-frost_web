-- phpMyAdmin SQL Dump
-- version 3.5.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 18, 2013 at 05:15 PM
-- Server version: 5.1.67
-- PHP Version: 5.3.24

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `buildthe_frost`
--

-- --------------------------------------------------------

--
-- Table structure for table `COUNTRY`
--

CREATE TABLE IF NOT EXISTS `COUNTRY` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `DEPARTMENT`
--

CREATE TABLE IF NOT EXISTS `DEPARTMENT` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `GROUP_LV1`
--

CREATE TABLE IF NOT EXISTS `GROUP_LV1` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `GROUP_LV1`
--

INSERT INTO `GROUP_LV1` (`ID`, `NAME`) VALUES
(1, 'Knowledge'),
(2, 'Best Practice');

-- --------------------------------------------------------

--
-- Table structure for table `GROUP_LV2`
--

CREATE TABLE IF NOT EXISTS `GROUP_LV2` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `GROUP_LV1_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_GROUP_LV2_GROUP_LV11_idx` (`GROUP_LV1_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `GROUP_LV2`
--

INSERT INTO `GROUP_LV2` (`ID`, `NAME`, `GROUP_LV1_ID`) VALUES
(1, 'Technology', 1),
(2, 'Strategy', 1),
(3, 'Around Asian', 1),
(4, 'E-Business', 2),
(5, 'Customer Experience Management', 2),
(6, 'Value Innovation', 2),
(7, 'Process Improvement', 2),
(8, 'Go to Market', 2),
(9, 'Competitive Analysis', 2);

-- --------------------------------------------------------

--
-- Table structure for table `GROUP_LV3`
--

CREATE TABLE IF NOT EXISTS `GROUP_LV3` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `GROUP_LV2_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_GROUP_LV3_GROUP_LV21_idx` (`GROUP_LV2_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `GROUP_LV3`
--

INSERT INTO `GROUP_LV3` (`ID`, `NAME`, `GROUP_LV2_ID`) VALUES
(1, 'Research Thailand', 1),
(2, 'Global Trend', 1),
(3, 'E-Business', 2),
(4, 'Customer Experience Management', 2),
(5, 'Value Innovation', 2),
(6, 'Process Improvement', 2),
(7, 'Go to Market', 2),
(8, 'Competitive Analysis', 2),
(9, 'Update AEC News', 3),
(10, 'Competency Index', 3),
(11, 'Country Profile', 3),
(12, 'Company', 4);

-- --------------------------------------------------------

--
-- Table structure for table `GROUP_LV4`
--

CREATE TABLE IF NOT EXISTS `GROUP_LV4` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `GROUP_LV3_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_GROUP_LV4_GROUP_LV31_idx` (`GROUP_LV3_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `GROUP_LV4`
--

INSERT INTO `GROUP_LV4` (`ID`, `NAME`, `GROUP_LV3_ID`) VALUES
(1, 'Telecom Market Data', 1),
(2, 'ICT Industry Outlook', 1),
(3, 'ICT Technology', 2),
(4, 'Highlight of the month', 2),
(5, 'World Economic Index', 10),
(6, 'ICT Competency Index', 10),
(7, 'Country', 11),
(8, 'Year', 12);

-- --------------------------------------------------------

--
-- Table structure for table `GROUP_LV5`
--

CREATE TABLE IF NOT EXISTS `GROUP_LV5` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `GROUP_LV4_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `GROUP_LV5`
--

INSERT INTO `GROUP_LV5` (`ID`, `NAME`, `GROUP_LV4_ID`) VALUES
(1, 'Fixed Line -Voice', 1),
(2, 'Fixed Line -Data', 1),
(3, 'Mobile - Voice', 1),
(4, 'Mobile - Data', 1),
(5, 'Application', 2),
(6, 'ICT Service', 2),
(7, 'Infrastructure', 2),
(8, 'Sector Focus', 2),
(9, 'Consumer Market', 2),
(10, 'Application', 3),
(11, 'Infrastructure', 3),
(12, 'ICT Service', 3);

-- --------------------------------------------------------

--
-- Table structure for table `GROUP_LV6`
--

CREATE TABLE IF NOT EXISTS `GROUP_LV6` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` int(11) NOT NULL,
  `GROUP_LV5_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `INDUSTRY`
--

CREATE TABLE IF NOT EXISTS `INDUSTRY` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `JOB_LEVEL`
--

CREATE TABLE IF NOT EXISTS `JOB_LEVEL` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `PDF`
--

CREATE TABLE IF NOT EXISTS `PDF` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `DESCRIPTION` text CHARACTER SET utf8 COLLATE utf8_bin,
  `PRICE` decimal(10,0) DEFAULT NULL,
  `UPDATE_DATE` datetime DEFAULT NULL,
  `COMPANY_ID` int(11) DEFAULT NULL,
  `PATH` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `PDF`
--

INSERT INTO `PDF` (`ID`, `NAME`, `DESCRIPTION`, `PRICE`, `UPDATE_DATE`, `COMPANY_ID`, `PATH`) VALUES
(1, 'test1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, Lorem 1', '100', '2013-09-01 00:00:00', 1, 'TestPdf1.pdf'),
(2, 'test2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, Lorem 2', '200', '2013-09-02 00:00:00', 2, 'TestPdf2.pdf'),
(3, 'test3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, Lorem 3', '300', '2013-09-03 00:00:00', 3, 'TestPdf3.pdf'),
(4, 'test4', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, Lorem 4', '400', '2013-09-04 00:00:00', 4, 'TestPdf4.pdf'),
(5, 'test5', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, Lorem 5', '500', '2013-09-05 00:00:00', 5, 'TestPdf5.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `PDF_CATEGORY`
--

CREATE TABLE IF NOT EXISTS `PDF_CATEGORY` (
  `PDF_ID` int(11) NOT NULL,
  `GROUP_LEVEL_NAME` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `GROUP_LEVEL_ID` int(11) NOT NULL,
  PRIMARY KEY (`PDF_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `PERMISSION`
--

CREATE TABLE IF NOT EXISTS `PERMISSION` (
  `USER_PROFILE_ID` int(11) NOT NULL,
  `GROUP_LV2_ID` int(11) NOT NULL,
  `IS_ACTIVE` char(1) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT 'Y',
  `START_DATE` datetime NOT NULL,
  `END_DATE` datetime NOT NULL,
  PRIMARY KEY (`USER_PROFILE_ID`,`GROUP_LV2_ID`),
  KEY `fk_USER_PROFILE_has_GROUP_LV2_GROUP_LV21_idx` (`GROUP_LV2_ID`),
  KEY `fk_USER_PROFILE_has_GROUP_LV2_USER_PROFILE1_idx` (`USER_PROFILE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `TAG`
--

CREATE TABLE IF NOT EXISTS `TAG` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `ID` int(11) NOT NULL,
  `NAME` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `PASSWORD` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `JOB_TITLE` varchar(3) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `ADDRESS` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `CITY` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `ZIP` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `PHONE` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `FAX` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `IS_ACTIVE` varchar(1) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT 'Y',
  `IS_ADMIN` varchar(1) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT 'N',
  `JOB_LEVEL` int(11) NOT NULL,
  `DEPARTMENT_ID` int(11) NOT NULL,
  `INDUSTRY_ID` int(11) NOT NULL,
  `COUNTRY_ID` int(11) NOT NULL,
  `TECHNOLOGY_ID` int(11) NOT NULL,
  `USER_PROFILEcol` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_USER_PROFILE_JOB_LEVEL1_idx` (`JOB_LEVEL`),
  KEY `fk_USER_PROFILE_DEPARTMENT_ID1_idx` (`DEPARTMENT_ID`),
  KEY `fk_USER_PROFILE_INDUSTRY_ID1_idx` (`INDUSTRY_ID`),
  KEY `fk_USER_PROFILE_COUNTRY_ID1_idx` (`COUNTRY_ID`),
  KEY `fk_USER_PROFILE_TECHNOLOGY_ID1_idx` (`TECHNOLOGY_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  ADD CONSTRAINT `fk_table1_PDF1` FOREIGN KEY (`PDF_ID`) REFERENCES `PDF` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `PERMISSION`
--
ALTER TABLE `PERMISSION`
  ADD CONSTRAINT `fk_USER_PROFILE_has_GROUP_LV2_USER_PROFILE1` FOREIGN KEY (`USER_PROFILE_ID`) REFERENCES `USER_PROFILE` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_USER_PROFILE_has_GROUP_LV2_GROUP_LV21` FOREIGN KEY (`GROUP_LV2_ID`) REFERENCES `GROUP_LV2` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_USER_PROFILE_JOB_LEVEL1` FOREIGN KEY (`JOB_LEVEL`) REFERENCES `JOB_LEVEL` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_USER_PROFILE_DEPARTMENT_ID1` FOREIGN KEY (`DEPARTMENT_ID`) REFERENCES `DEPARTMENT` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_USER_PROFILE_INDUSTRY_ID1` FOREIGN KEY (`INDUSTRY_ID`) REFERENCES `INDUSTRY` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_USER_PROFILE_COUNTRY_ID1` FOREIGN KEY (`COUNTRY_ID`) REFERENCES `COUNTRY` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
