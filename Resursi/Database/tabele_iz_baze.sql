-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2013 at 12:26 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ermex`
--
CREATE DATABASE IF NOT EXISTS `ermex` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ermex`;

-- --------------------------------------------------------

--
-- Table structure for table `epm_config`
--

CREATE TABLE IF NOT EXISTS `epm_config` (
  `coId` int(11) NOT NULL AUTO_INCREMENT,
  `workAccountIncrement` int(11) NOT NULL DEFAULT '0',
  `lastSystemLoginId` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`coId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `epm_config`
--

INSERT INTO `epm_config` (`coId`, `workAccountIncrement`, `lastSystemLoginId`) VALUES
(1, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `epm_deliveries`
--

CREATE TABLE IF NOT EXISTS `epm_deliveries` (
  `deId` int(11) NOT NULL AUTO_INCREMENT,
  `deliverySerial` varchar(90) NOT NULL,
  `deliveryDate` bigint(21) NOT NULL,
  `price` float NOT NULL,
  `note` text NOT NULL,
  `payType` int(1) NOT NULL,
  `reconciled` int(1) DEFAULT NULL,
  `invalid` int(1) DEFAULT NULL,
  `authorId` int(11) NOT NULL,
  `reconciledId` int(11) NOT NULL,
  `peyeeName` varchar(45) DEFAULT NULL,
  `peyeeContactInfo` text,
  PRIMARY KEY (`deId`),
  KEY `user_fk_index` (`authorId`),
  KEY `fk_epm_deliveries_epm_users1_idx` (`reconciledId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `epm_deliveries`
--

INSERT INTO `epm_deliveries` (`deId`, `deliverySerial`, `deliveryDate`, `price`, `note`, `payType`, `reconciled`, `invalid`, `authorId`, `reconciledId`, `peyeeName`, `peyeeContactInfo`) VALUES
(1, 'test', 12156515, 25, 'test', 1, 0, 0, 1, 1, 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `epm_materials`
--

CREATE TABLE IF NOT EXISTS `epm_materials` (
  `maId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `amount` float NOT NULL,
  `enterDate` bigint(21) NOT NULL,
  `dimensionUnit` varchar(45) NOT NULL,
  PRIMARY KEY (`maId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `epm_materials`
--

INSERT INTO `epm_materials` (`maId`, `name`, `description`, `amount`, `enterDate`, `dimensionUnit`) VALUES
(1, 'Papir A4', 'Papir A4 format, bijeli', 1948, 1234567890, 'kom'),
(2, 'Papir A3', 'Papir A3 format, crni', 1000, 1234567890, 'kom'),
(3, 'Crna Tinta', 'Kertridz crna tinta, HP stampac', 2.5, 1234567890, 'l'),
(4, 'Korektor', 'Korektor', 5, 1386500552, 'l'),
(5, 'Papir A2, zuti', 'Papir A2, zuti', 300, 1386500642, 'kom');

-- --------------------------------------------------------

--
-- Table structure for table `epm_order`
--

CREATE TABLE IF NOT EXISTS `epm_order` (
  `orderId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `price` float DEFAULT NULL,
  `amount` varchar(45) DEFAULT NULL,
  `woId` int(11) NOT NULL,
  `deId` int(11) DEFAULT NULL,
  `measurementUnit` varchar(45) DEFAULT NULL,
  `totalePrice` float DEFAULT NULL,
  `pdv` varchar(45) DEFAULT NULL,
  `done` int(11) DEFAULT NULL,
  PRIMARY KEY (`orderId`),
  KEY `fk_epm_order_epm_work_accounts1_idx` (`woId`),
  KEY `fk_epm_order_epm_deliveries1_idx` (`deId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `epm_order`
--

INSERT INTO `epm_order` (`orderId`, `title`, `description`, `price`, `amount`, `woId`, `deId`, `measurementUnit`, `totalePrice`, `pdv`, `done`) VALUES
(18, 'tesr', 'asfasfas', 35, '4', 39, NULL, 'gdg', NULL, NULL, NULL),
(19, 'test', 'test', 25, '2', 45, NULL, 'km', NULL, NULL, NULL),
(20, 'test', 'test', 25, '2', 46, NULL, 'km', NULL, NULL, NULL),
(21, 'test', 'test', 25, '2', 47, NULL, 'km', NULL, NULL, NULL),
(22, 'test', 'test', 25, '2', 48, NULL, 'km', NULL, NULL, NULL),
(23, 'test', 'test', 25, '2', 49, NULL, 'km', NULL, NULL, NULL),
(24, 'najnoviji1', 'test', 25, '2', 52, NULL, 'km', NULL, NULL, NULL),
(25, 'najnoviji', 'test', 38, '4', 52, NULL, 'dg', NULL, NULL, NULL),
(26, 'test', 'test', 25, '2', 54, NULL, 'km', NULL, NULL, NULL),
(27, '', '', NULL, '', 54, NULL, '', NULL, NULL, NULL),
(28, 'test', 'test', 25, '2', 55, NULL, 'km', NULL, NULL, NULL),
(29, '', '', NULL, '', 55, NULL, '', NULL, NULL, NULL),
(30, 'test', 'test', 25, '2', 56, NULL, 'km', NULL, NULL, NULL),
(31, '', '', NULL, '', 56, NULL, '', NULL, NULL, NULL),
(32, 'test', 'test', 25, '2', 57, NULL, 'km', NULL, NULL, NULL),
(33, '', '', NULL, '', 57, NULL, '', NULL, NULL, NULL),
(34, 'test', 'test', 25, '2', 58, NULL, 'km', NULL, NULL, NULL),
(35, 'tesf', 'test', 35, '5', 58, NULL, 'kl', NULL, NULL, NULL),
(36, 'test', 'test', 25, '2', 59, NULL, 'km', NULL, NULL, NULL),
(37, '', '', NULL, '', 59, NULL, '', NULL, NULL, NULL),
(38, 'test', 'test', 25, '2', 60, NULL, 'km', NULL, NULL, NULL),
(39, '', '', NULL, '', 60, NULL, '', NULL, NULL, NULL),
(40, 'test', 'test', 25, '2', 61, NULL, 'km', NULL, NULL, NULL),
(41, '', '', NULL, '', 61, NULL, '', NULL, NULL, NULL),
(42, 'test', 'test', 25, '2', 62, NULL, 'km', NULL, NULL, NULL),
(43, '', '', NULL, '', 62, NULL, '', NULL, NULL, NULL),
(44, 'test', 'test', 25.6, '2.5', 65, NULL, 'km', NULL, NULL, NULL),
(45, '', '', NULL, '', 65, NULL, '', NULL, NULL, NULL),
(46, 'test', 'test', 25, '2', 66, NULL, 'km', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `epm_payees`
--

CREATE TABLE IF NOT EXISTS `epm_payees` (
  `paId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `contactInfo` text NOT NULL,
  PRIMARY KEY (`paId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `epm_payees`
--

INSERT INTO `epm_payees` (`paId`, `name`, `contactInfo`) VALUES
(1, 'Nepoznato', 'Bez Informacija');

-- --------------------------------------------------------

--
-- Table structure for table `epm_used_materials`
--

CREATE TABLE IF NOT EXISTS `epm_used_materials` (
  `amount` float NOT NULL,
  `materialId` int(11) NOT NULL,
  `workAccountId` int(11) NOT NULL,
  KEY `materials_fk_index` (`materialId`),
  KEY `work_accounts_fk_index` (`workAccountId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `epm_used_materials`
--

INSERT INTO `epm_used_materials` (`amount`, `materialId`, `workAccountId`) VALUES
(5, 1, 56),
(3, 2, 56),
(5, 1, 57),
(7, 2, 57),
(5, 1, 58),
(3, 2, 58),
(50, 1, 59),
(50, 1, 60),
(50, 1, 61),
(50, 1, 62),
(2, 1, 66);

-- --------------------------------------------------------

--
-- Table structure for table `epm_users`
--

CREATE TABLE IF NOT EXISTS `epm_users` (
  `usId` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `realName` varchar(45) NOT NULL,
  `realSurname` varchar(45) NOT NULL,
  `registerDate` bigint(21) NOT NULL,
  `privilegeLevel` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`usId`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `epm_users`
--

INSERT INTO `epm_users` (`usId`, `username`, `password`, `realName`, `realSurname`, `registerDate`, `privilegeLevel`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Marko', 'Markovic', 1234567890, 3),
(2, 'racun', '006949fde41d2e60dfcc4cc01b287eaf', 'Irina', 'Sojic', 1234567890, 2),
(3, 'radnik', 'a64e5d0dc60a5bcd98270c2f96ba3dbd', 'Sevdo', 'Krcina', 1234567890, 1),
(4, 'neaktivni', '0b066ba02f4227ae7ef6f8732e23bc74', 'Marijan', 'Maksimovic', 1234567890, 0);

-- --------------------------------------------------------

--
-- Table structure for table `epm_work_accounts`
--

CREATE TABLE IF NOT EXISTS `epm_work_accounts` (
  `woId` int(11) NOT NULL AUTO_INCREMENT,
  `workAccountSerial` varchar(90) NOT NULL,
  `payeeName` varchar(45) NOT NULL,
  `payeeContactInfo` text NOT NULL,
  `creationDate` bigint(21) NOT NULL,
  `deadlineDate` bigint(21) NOT NULL,
  `note` text,
  `additional` text,
  `invalid` int(1) NOT NULL,
  `reconciled` int(1) NOT NULL,
  `authorId` int(11) NOT NULL,
  `reconciledId` int(11) DEFAULT NULL,
  `reviewdId` int(11) DEFAULT NULL,
  `usersList` varchar(90) DEFAULT NULL,
  `currentUser` int(11) NOT NULL,
  PRIMARY KEY (`woId`),
  UNIQUE KEY `workAccountSerial_UNIQUE` (`workAccountSerial`),
  KEY `users_id_fk_index` (`authorId`),
  KEY `users_reconcield_id_fk_index` (`reconciledId`),
  KEY `fk_epm_work_accounts_epm_users1_idx` (`reviewdId`),
  KEY `fk_epm_work_accounts_epm_users2_idx` (`currentUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `epm_work_accounts`
--

INSERT INTO `epm_work_accounts` (`woId`, `workAccountSerial`, `payeeName`, `payeeContactInfo`, `creationDate`, `deadlineDate`, `note`, `additional`, `invalid`, `reconciled`, `authorId`, `reconciledId`, `reviewdId`, `usersList`, `currentUser`) VALUES
(1, 'RN1-12/2013', 'Pani? Aleksandar', 'gtetwt', 1386259497, 1388098800, 'teswtes', 'etestse', 0, 0, 3, NULL, NULL, '2,3', 2),
(2, 'RN2-12/2013', 'Milan Kruni?', 'Lopare, Banja Luka\r\n065/123-555', 1386259863, 1386889200, 'Odma ostampati!', 'Isporuciti na adresu.', 0, 0, 3, NULL, NULL, '3,2,1', 3),
(4, 'RN3-12/2013', 'test', 'test', 1386333022, 1386284400, 'test', 'test', 0, 0, 3, NULL, NULL, '2,3', 2),
(5, 'RN4-12/2013', 'test', 'test', 1386333299, 1386370800, 'test', 'test', 0, 0, 3, NULL, NULL, '2,3', 2),
(6, 'RN5-12/2013', 'tete', 'tete', 1386333385, 1386889200, 'test', 'test', 0, 0, 3, NULL, NULL, '2,3', 2),
(7, 'RN6-12/2013', 'test', 'test', 1386333417, 1386284400, 'test', 'test', 0, 0, 3, NULL, NULL, '2,3', 2),
(8, 'RN7-12/2013', 'test', 'test', 1386333584, 1386284400, 'test', 'test', 0, 0, 3, NULL, NULL, '2,3', 2),
(9, 'RN8-12/2013', 'tet', 'test', 1386333985, 1386284400, 'test', 'test', 0, 0, 3, NULL, NULL, '2,3', 2),
(10, 'RN9-12/2013', 'test', 'test', 1386334207, 1386370800, 'test', 'test', 0, 0, 3, NULL, NULL, '2,3', 2),
(11, 'RN10-12/2013', 'test', 'tet', 1386334266, 1386975600, 'test', 'test', 0, 0, 3, NULL, NULL, '2,3', 2),
(12, 'RN11-12/2013', 'test', 'tet', 1386334355, 1386975600, 'test', 'test', 0, 0, 3, NULL, NULL, '2,3', 2),
(13, 'RN12-12/2013', 'test', 'test', 1386334382, 1387494000, 'test', 'test', 0, 0, 3, NULL, NULL, '2,3', 2),
(14, 'RN13-12/2013', 'test', 'test', 1386335730, 1386889200, 'test', 'test', 0, 0, 3, NULL, NULL, '2,3', 2),
(15, 'RN14-12/2013', 'test', 'test', 1386335783, 1386889200, 'test', 'test', 0, 0, 3, NULL, NULL, '2,3', 2),
(17, 'RN15-12/2013', 'test', 'test', 1386335951, 1386889200, 'tste', 'test', 0, 0, 3, NULL, NULL, '2,3', 2),
(18, 'RN16-12/2013', 'test', 'test', 1386336114, 1387494000, 'test', 'test', 0, 0, 3, NULL, NULL, '2,3', 2),
(19, 'RN17-12/2013', 'test', 'test', 1386336193, 1386975600, 'test', 'test', 0, 0, 3, NULL, NULL, '2,3', 2),
(20, 'RN18-12/2013', 'test', 'test', 1386336949, 1387580400, 'test', 'test', 0, 0, 3, NULL, NULL, '2,3', 2),
(21, 'RN19-12/2013', 'test', 'test', 1386337077, 1387580400, 'test', 'test', 0, 0, 3, NULL, NULL, '2,3', 2),
(22, 'RN20-12/2013', 'test', 'test', 1386337126, 1387580400, 'test', 'test', 0, 0, 3, NULL, NULL, '2,3', 2),
(23, 'RN21-12/2013', 'test', 'test', 1386337273, 1387580400, 'test', 'test', 0, 0, 3, NULL, NULL, '2,3', 2),
(24, 'RN22-12/2013', 'test', 'test', 1386337406, 1387580400, 'test', 'test', 0, 0, 3, NULL, NULL, '2,3', 2),
(25, 'RN23-12/2013', 'test', 'test', 1386337666, 1387580400, 'test', 'test', 0, 0, 3, NULL, NULL, '2,3', 2),
(26, 'RN24-12/2013', 'test', 'test', 1386337886, 1387580400, 'test', 'test', 0, 0, 3, NULL, NULL, '2,3', 2),
(27, 'RN25-12/2013', 'test', 'test', 1386337971, 1387580400, 'test', 'test', 0, 0, 3, NULL, NULL, '2,3', 2),
(28, 'RN26-12/2013', 'test', 'test', 1386338049, 1387580400, 'test', 'test', 0, 0, 3, NULL, NULL, '2,3', 2),
(29, 'RN27-12/2013', 'test', 'test', 1386338111, 1387666800, 'test', 'test', 0, 0, 3, NULL, NULL, '2,3', 2),
(30, 'RN28-12/2013', 'test', 'test', 1386338533, 1387580400, 'test', 'test', 0, 0, 3, NULL, NULL, '2,3', 2),
(31, 'RN29-12/2013', 'test', 'test', 1386338680, 1387580400, 'test', 'test', 0, 0, 3, NULL, NULL, '2,3', 2),
(32, 'RN30-12/2013', 'test', 'test', 1386338734, 1388185200, 'test', 'test', 0, 0, 3, NULL, NULL, '2,3', 2),
(33, 'RN31-12/2013', 'test', 'test', 1386338845, 1387580400, 'test', 'test', 0, 0, 3, NULL, NULL, '2,3', 2),
(34, 'RN32-12/2013', 'test', 'test', 1386338930, 1388185200, 'test', 'test', 0, 0, 3, NULL, NULL, '2,3', 2),
(35, 'RN33-12/2013', 'test', 'test', 1386338985, 1387580400, 'test', 'test', 0, 0, 3, NULL, NULL, '2,3', 2),
(36, 'RN34-12/2013', 'test', 'test', 1386339014, 1388185200, 'test', 'test', 0, 0, 3, NULL, NULL, '2,3', 2),
(37, 'RN35-12/2013', 'test', 'test', 1386339073, 1387666800, 'test', 'test', 0, 0, 3, NULL, NULL, '2,3', 2),
(38, 'RN36-12/2013', 'test', 'test', 1386339298, 1387666800, 'test', 'test', 0, 0, 3, NULL, NULL, '2,3', 2),
(39, 'RN37-12/2013', 'test', 'test', 1386339541, 1387580400, 'test', 'test', 0, 0, 3, NULL, NULL, '2,3', 2),
(45, 'RN38-12/2013', 'test', 'test', 1386354074, 1387494000, 'test', 'test', 0, 0, 1, NULL, NULL, '1,', 1),
(46, 'RN39-12/2013', 'test', 'test', 1386354248, 1387494000, 'test', 'test', 0, 0, 1, NULL, NULL, '1,', 1),
(47, 'RN40-12/2013', 'test', 'test', 1386354352, 1387580400, 'test', 'test', 0, 0, 1, NULL, NULL, '2,', 2),
(48, 'RN41-12/2013', 'test', 'test', 1386354428, 1387494000, 'test', 'test', 0, 0, 1, NULL, NULL, '1,', 1),
(49, 'RN42-12/2013', 'test', 'test', 1386354482, 1387494000, 'test', 'test', 0, 0, 1, NULL, NULL, '1,', 1),
(50, 'RN43-12/2013', 'test', 'test', 1386354511, 1387494000, 'test', 'test', 0, 0, 1, NULL, NULL, '1,', 1),
(51, 'RN44-12/2013', 'test', 'test', 1386354533, 1387494000, 'test', 'test', 0, 0, 1, NULL, NULL, '1,', 1),
(52, 'RN45-12/2013', 'najnoviji', 'test', 1386354791, 1387580400, 'test', 'test', 0, 0, 1, NULL, NULL, '1,', 1),
(54, 'RN46-12/2013', 'test', 'test', 1386354957, 1387494000, 'test', 'test', 0, 0, 1, NULL, NULL, '1,3,2,1,4,', 1),
(55, 'RN47-12/2013', 'test', 'test', 1386354958, 1387494000, 'test', 'test', 0, 0, 1, NULL, NULL, '1,3,2,1,4,', 1),
(56, 'RN48-12/2013', 'test', 'test', 1386357722, 1387580400, 'test', 'test', 0, 0, 1, NULL, NULL, '1', 1),
(57, 'RN49-12/2013', 'test', 'test', 1386357782, 1387580400, 'test', 'test', 0, 0, 1, NULL, NULL, '1', 1),
(58, 'RN50-12/2013', 'test', 'test', 1386494076, 1387580400, 'test', 'test', 0, 0, 1, NULL, NULL, '2,3', 2),
(59, 'RN51-12/2013', 'test', 'test', 1386495261, 1387580400, 'test', 'test', 0, 0, 1, NULL, NULL, '1', 1),
(60, 'RN52-12/2013', 'test', 'test', 1386495499, 1387494000, 'test', 'test', 0, 0, 1, NULL, NULL, '1', 1),
(61, 'RN53-12/2013', 'test', 'test', 1386495674, 1387580400, 'test', 'test', 0, 0, 1, NULL, NULL, '1', 1),
(62, 'RN54-12/2013', 'test', 'test', 1386495736, 1387494000, 'test', 'test', 0, 0, 1, NULL, NULL, '1', 1),
(63, 'RN55-12/2013', 'test', 'test', 1386495977, 1387580400, 'test', 'test', 0, 0, 1, NULL, NULL, '1', 1),
(64, 'RN56-12/2013', 'test', 'test', 1386496094, 1387580400, 'test', 'test', 0, 0, 1, NULL, NULL, '1', 1),
(65, 'RN57-12/2013', 'test', 'test', 1386496168, 1387580400, 'test', 'test', 0, 0, 1, NULL, NULL, '1', 1),
(66, 'RN58-12/2013', 'test', 'test', 1386496346, 1387580400, 'test', 'test', 0, 0, 1, NULL, NULL, '1', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `epm_deliveries`
--
ALTER TABLE `epm_deliveries`
  ADD CONSTRAINT `fk_epm_deliveries_epm_users1` FOREIGN KEY (`reconciledId`) REFERENCES `epm_users` (`usId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `users_fk` FOREIGN KEY (`authorId`) REFERENCES `epm_users` (`usId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `epm_order`
--
ALTER TABLE `epm_order`
  ADD CONSTRAINT `fk_epm_order_epm_deliveries1` FOREIGN KEY (`deId`) REFERENCES `epm_deliveries` (`deId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_epm_order_epm_work_accounts1` FOREIGN KEY (`woId`) REFERENCES `epm_work_accounts` (`woId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `epm_used_materials`
--
ALTER TABLE `epm_used_materials`
  ADD CONSTRAINT `materials_fk2` FOREIGN KEY (`materialId`) REFERENCES `epm_materials` (`maId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `work_accounts_fk2` FOREIGN KEY (`workAccountId`) REFERENCES `epm_work_accounts` (`woId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `epm_work_accounts`
--
ALTER TABLE `epm_work_accounts`
  ADD CONSTRAINT `fk_epm_work_accounts_epm_users1` FOREIGN KEY (`reviewdId`) REFERENCES `epm_users` (`usId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_epm_work_accounts_epm_users2` FOREIGN KEY (`currentUser`) REFERENCES `epm_users` (`usId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `users_id_fk` FOREIGN KEY (`authorId`) REFERENCES `epm_users` (`usId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `users_reconcield_id_fk` FOREIGN KEY (`reconciledId`) REFERENCES `epm_users` (`usId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
