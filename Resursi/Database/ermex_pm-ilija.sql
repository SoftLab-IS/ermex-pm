-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2013 at 11:13 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ermex_pm`
--
CREATE DATABASE IF NOT EXISTS `ermex_pm` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ermex_pm`;

-- --------------------------------------------------------

--
-- Table structure for table `epm_config`
--

CREATE TABLE IF NOT EXISTS `epm_config` (
  `coId` int(11) NOT NULL AUTO_INCREMENT,
  `workAccountIncrement` int(11) NOT NULL DEFAULT '0',
  `lastSystemLoginId` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`coId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `epm_config`
--

INSERT INTO `epm_config` (`coId`, `workAccountIncrement`, `lastSystemLoginId`) VALUES
(1, 4, 5);

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
  `peyeeName` varchar(255) DEFAULT NULL,
  `peyeeContactInfo` text,
  `archived` int(1) DEFAULT NULL,
  PRIMARY KEY (`deId`),
  KEY `user_fk_index` (`authorId`),
  KEY `fk_epm_deliveries_epm_users1_idx` (`reconciledId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `epm_deliveries`
--

INSERT INTO `epm_deliveries` (`deId`, `deliverySerial`, `deliveryDate`, `price`, `note`, `payType`, `reconciled`, `invalid`, `authorId`, `reconciledId`, `peyeeName`, `peyeeContactInfo`, `archived`) VALUES
(2, 'OT1-12/13', 1387105353, 0, '', 0, 0, 1, 3, 2, 'Elektrotehnicki fakultet ', 'Vuka Karadzica 30', NULL),
(3, 'OT2-12/13', 1387106625, 6546, 'ovo je neka napomena', 1, 1, 1, 1, 1, 'Kopikomerc', 'Vuka Karadzica 30', NULL),
(4, 'OT3-12/13', 3212, 6545, '', 0, 1, 0, 1, 1, 'Kopikomerc', 'Vuka Karadzica 30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `epm_materials`
--

CREATE TABLE IF NOT EXISTS `epm_materials` (
  `maId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `amount` float NOT NULL,
  `enterDate` bigint(21) NOT NULL,
  `dimensionUnit` varchar(45) NOT NULL,
  PRIMARY KEY (`maId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `epm_materials`
--

INSERT INTO `epm_materials` (`maId`, `name`, `description`, `amount`, `enterDate`, `dimensionUnit`) VALUES
(1, 'Papir A4', 'Papir A4 format, bijeli', 1350, 1234567890, 'komad'),
(2, 'Papir A3', 'Papir A3 format, crni', 965, 1234567890, 'kom'),
(3, 'Crna Tinta', 'Kertridz crna tinta, HP stampac', -59.5, 1234567890, 'l'),
(4, 'Papir A2 / 250g', 'Papir A2 / 250g', 1000, 1387045835, 'komad');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `epm_order`
--

INSERT INTO `epm_order` (`orderId`, `title`, `description`, `price`, `amount`, `woId`, `deId`, `measurementUnit`, `totalePrice`, `pdv`, `done`) VALUES
(5, 'Cestitke', 'Novogodisnja cestitka A5', 5, '100', 1, 2, 'kom', NULL, NULL, 0),
(6, 'Poster A3', 'Svecani prijem', 20, '10', 2, 3, 'kom', NULL, NULL, 0),
(9, 'dfg', 'fdg', 20, '1', 6, NULL, 'kg', NULL, NULL, NULL),
(10, 'Jedna narudzba', 'opis narudzbe', 215, '1', 8, NULL, 'kg', NULL, NULL, NULL),
(11, 'Druga narudjzba', 'dsfda', 20, '1', 8, NULL, 'kg', NULL, NULL, NULL),
(12, 'Druga narudjzba', 'fgd', 215, '1', 9, NULL, 'kg', NULL, NULL, NULL),
(13, 'Narudzba 1', 'dfsadf', 20, '2', 10, NULL, 'kg', NULL, NULL, NULL),
(14, 'Narudzba 2', 'dfsdfsdf', 215, '3', 10, NULL, 'kg', NULL, NULL, NULL),
(15, 'N1', 'sdfadf', 20, '3', 11, NULL, 'kg', NULL, NULL, NULL),
(16, 'N2', 'sdfadf', 215, '2', 11, NULL, 'kg', NULL, NULL, NULL),
(17, 'dfa', 'dfadsfa', 20, '2', 14, NULL, 'kg', NULL, NULL, NULL),
(18, 'sdfa', 'dfasdf', 215, '2', 14, NULL, 'kg', NULL, NULL, NULL),
(19, 'sdfa', 'dsafsdfa', 20, '2', 15, NULL, 'kg', NULL, NULL, NULL),
(20, 'dfg', 'sdfasd', 215, '3', 15, NULL, 'kg', NULL, NULL, NULL),
(21, 'sdfadf', 'gfhdf', 215, '2', 16, NULL, 'kg', NULL, NULL, NULL),
(22, 'Posteri A4', 'Posteri u boji, na papiru 250g', 1.5, '10', 17, NULL, 'komad', NULL, NULL, 1),
(23, 'Flajeri ', 'Flajeri na A4 papiru, u boji', 1.5, '100', 17, NULL, 'komad', NULL, NULL, 1),
(25, 'Novogodišnja čestitka', 'Dvostrana štampa u boji, papir A4 300g', 2, '500', 18, NULL, 'komad', NULL, NULL, NULL),
(26, 'Kalendar A3', 'Kalendar formata A3, svaki mjesec na posebnom listu, slike srecnih i zadovoljnih studenata kako rucaju svoje visokoproteinske obroke u studentskom restoranu, od milja zvanom menza. Presrecne kuvarice se smjeskaju u pozadini i brisu znoj sa cela rukom kojom dodaju komade hljeba. Kalendar treba da ima spiralni uvez i da preovladava crvena boja.', 1.7, '100', 19, NULL, 'komada', NULL, NULL, NULL),
(27, 'Studentske legitimacije', 'Studentska legitimacija 9x4.5mm, slika na desnoj strani', 2, '400', 19, NULL, 'komada', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `epm_payees`
--

CREATE TABLE IF NOT EXISTS `epm_payees` (
  `paId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `contactInfo` text NOT NULL,
  PRIMARY KEY (`paId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `epm_used_materials`
--

INSERT INTO `epm_used_materials` (`amount`, `materialId`, `workAccountId`) VALUES
(3, 2, 11),
(2, 3, 14),
(2, 2, 15),
(10, 2, 8),
(10, 3, 8),
(110, 1, 17),
(15, 3, 17),
(500, 1, 18),
(15, 3, 19),
(40, 1, 19);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `epm_users`
--

INSERT INTO `epm_users` (`usId`, `username`, `password`, `realName`, `realSurname`, `registerDate`, `privilegeLevel`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Marko', 'Markovic', 1234567890, 3),
(2, 'racun', '006949fde41d2e60dfcc4cc01b287eaf', 'Irina', 'Sojic', 1234567890, 2),
(3, 'radnik', 'a64e5d0dc60a5bcd98270c2f96ba3dbd', 'Sevdo', 'Krcina', 1234567890, 1),
(4, 'neaktivni', '0b066ba02f4227ae7ef6f8732e23bc74', 'Marijan', 'Maksimovic', 1234567890, 0),
(5, 'ilija', 'ae850ff42b593327bfcada72ee8ee86f', 'Ilija', 'Tesic', 1386852218, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `epm_work_accounts`
--

INSERT INTO `epm_work_accounts` (`woId`, `workAccountSerial`, `payeeName`, `payeeContactInfo`, `creationDate`, `deadlineDate`, `note`, `additional`, `invalid`, `reconciled`, `authorId`, `reconciledId`, `reviewdId`, `usersList`, `currentUser`) VALUES
(1, 'RN1-12/13', 'Elektrotehnicki fakultet', 'Vuka Karadzica 30', 123456789, 123456789, NULL, NULL, 1, 1, 1, 1, NULL, '1,2,3', 3),
(2, 'RN2-12/13', 'Kopikomerc', 'Vuka Karadzica 30', 16, 16, NULL, NULL, 1, 1, 2, 3, NULL, '2,3,1,4', 4),
(4, 'RN1-12/2013', 'ETF', 'jhfg', 1386341730, 1386341730, '', '', 1, 0, 1, NULL, NULL, '1,2', 2),
(5, 'RN2-12/2013', 'ETF', 'jhg', 1386341855, 1386543600, '', '', 0, 0, 1, 1, NULL, '1,2', 2),
(6, 'RN3-12/2013', 'ETF', 'gfg', 1386341987, 1387580400, 'fgd', 'fdg', 0, 0, 1, 1, NULL, '1,2', 2),
(8, 'RN4-12/2013', 'Neki narucilac', 'dfadsf', 1387047142, 1387407600, 'sdfasdf', 'sdfadsf', 0, 0, 1, NULL, NULL, '3,2', 2),
(9, 'RN5-12/2013', 'ETF', 'gfdfg', 1386506074, 1386630000, '', 'fdg', 0, 0, 1, NULL, NULL, '1,3,4,2,1', 3),
(10, 'RN6-12/2013', 'Novi narucilac', 'dfsdfa', 1386509827, 1387407600, 'dfsdf', 'sdf', 0, 0, 2, 1, NULL, '4,3', 3),
(11, 'RN7-12/2013', 'Neki narucilac', 'fgdfg', 1386510585, 1387234800, 'sdfasdf', '', 0, 0, 2, NULL, NULL, '3,1,3,4', 3),
(14, 'RN8-12/2013', 'Neki narucilac', 'dfa', 1386842826, 1386716400, 'fdfg', '', 0, 0, 1, 1, NULL, '3,2,4', 3),
(15, 'RN9-12/2013', 'ETF', 'sdfadf', 1386856870, 1387234800, 'dfasdf', 'dafsdf', 0, 0, 5, 1, NULL, '5,2', 5),
(16, 'RN10-12/2013', 'fgfg', 'vnbn', 1386857040, 1387407600, '', 'ghfg', 0, 0, 5, 1, NULL, '1', 1),
(17, 'RN11-12/2013', 'SoftLab Istocno Sarajevo', 'Ulica Svetog Save bb', 1387049010, 1388444400, 'Plakate treba i dizajnirati', 'Ovo su neke dodatne informacije', 0, 1, 2, 1, NULL, '2,5,3,4', 4),
(18, 'RN12-12/2013', 'Univerzitet u Istočnom Sarajevu', 'Vuka Karadžića 30\r\n\r\nKontakt osoba: Miloš Marković\r\n065 123 456', 1387107431, 1388444400, 'Potrebno je uraditi i pripremu, nešto pu uzoru na prošlogodišnju čestitku', 'Priožen je primjerak prošlogodišnje čestitke', 0, 1, 1, 1, NULL, '5,3,1,2', 5),
(19, 'RN13-12/2013', 'Studentski centar Lukavica', 'Vuka Karadzica 30\r\nDirektorica Aleksandra Bjelica', 1387650051, 1388271600, 'Sve treba da bude zavrseno u roku i kako treba. Nemoj da bude los kvalitet kao prosle godine, kuvarice su se zalile na intenzitet boja becke snicle u tanjiru.', 'Prilozen primjerak', 0, 0, 1, NULL, NULL, '4,2,5', 4);

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
