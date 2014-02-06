/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50532
Source Host           : localhost:3306
Source Database       : ermex_pm

Target Server Type    : MYSQL
Target Server Version : 50532
File Encoding         : 65001

Date: 2014-02-06 22:45:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for epm_config
-- ----------------------------
DROP TABLE IF EXISTS `epm_config`;
CREATE TABLE `epm_config` (
  `coId` int(11) NOT NULL AUTO_INCREMENT,
  `workAccountIncrement` int(11) NOT NULL DEFAULT '0',
  `lastSystemLoginId` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`coId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of epm_config
-- ----------------------------
INSERT INTO `epm_config` VALUES ('1', '4', '1');

-- ----------------------------
-- Table structure for epm_deliveries
-- ----------------------------
DROP TABLE IF EXISTS `epm_deliveries`;
CREATE TABLE `epm_deliveries` (
  `deId` int(11) NOT NULL AUTO_INCREMENT,
  `deliverySerial` varchar(90) NOT NULL,
  `deliveryDate` bigint(21) NOT NULL,
  `price` float NOT NULL,
  `note` text NOT NULL,
  `payType` tinyint(1) NOT NULL DEFAULT '1',
  `reconciled` int(1) DEFAULT NULL,
  `invalid` int(1) DEFAULT NULL,
  `authorId` int(11) NOT NULL,
  `reconciledId` int(11) NOT NULL,
  `peyeeName` varchar(255) DEFAULT NULL,
  `peyeeContactInfo` text,
  `archived` int(1) DEFAULT NULL,
  `deliveryPlace` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`deId`),
  KEY `user_fk_index` (`authorId`),
  KEY `fk_epm_deliveries_epm_users1_idx` (`reconciledId`),
  CONSTRAINT `fk_epm_deliveries_epm_users1` FOREIGN KEY (`reconciledId`) REFERENCES `epm_users` (`usId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `users_fk` FOREIGN KEY (`authorId`) REFERENCES `epm_users` (`usId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of epm_deliveries
-- ----------------------------
INSERT INTO `epm_deliveries` VALUES ('2', 'OT1-12/13', '1387105353', '0', '', '0', '0', '1', '3', '2', 'Elektrotehnicki fakultet ', 'Vuka Karadzica 30', '1', '3');
INSERT INTO `epm_deliveries` VALUES ('3', 'OT2-12/13', '1387106625', '6546', 'ovo je neka napomena', '1', '1', '1', '1', '1', 'Kopikomerc', 'Vuka Karadzica 30', '1', '3');
INSERT INTO `epm_deliveries` VALUES ('4', 'OT3-12/13', '3212', '6545', '', '0', '1', '0', '1', '1', 'Kopikomerc', 'Vuka Karadzica 30', '1', '3');
INSERT INTO `epm_deliveries` VALUES ('12', 'OT1-01/2014', '1389459385', '0', '', '1', null, null, '5', '5', 'narucilac', 'sdefadfa', null, '3');
INSERT INTO `epm_deliveries` VALUES ('13', 'OT2-01/2014', '1389477998', '0', 'Ovo je neka napomena, pojma nemam da li ce ovo raditi\r\n', '1', '1', null, '1', '1', 'Elektrotehnicki fakultet u Istocnom Sarajevu', 'Vuka Karadzica 30', null, '1');
INSERT INTO `epm_deliveries` VALUES ('14', 'OT3-01/2014', '1389484866', '0', '', '1', null, null, '1', '1', 'tgyfg', 'hfgh', null, '1');
INSERT INTO `epm_deliveries` VALUES ('15', 'OT4-01/2014', '1389739838', '0', '', '1', null, null, '1', '1', 'dsf', 'dsf', null, '1');
INSERT INTO `epm_deliveries` VALUES ('16', 'OT5-01/2014', '1389740115', '0', '', '1', null, null, '1', '1', 'sdf', 'sdfasdf', null, '1');
INSERT INTO `epm_deliveries` VALUES ('17', 'OT6-01/2014', '1389740257', '0', '', '0', '1', null, '1', '1', 'Mesara', 'Ovo je adresa od mesara', null, '2');
INSERT INTO `epm_deliveries` VALUES ('19', 'OT7-01/2014', '1390058635', '0', '', '1', '0', '0', '1', '1', 'Ilija Tesic', 'Kneza Ive bb', '1', '1');
INSERT INTO `epm_deliveries` VALUES ('21', 'OT8-01/2014', '1390225184', '0', 'Ovo je neka napomena', '1', '0', '0', '1', '1', 'Ilija Tesic', 'Kneza Ive bb', '0', '1');
INSERT INTO `epm_deliveries` VALUES ('22', 'OT9-01/2014', '1390060136', '0', '', '1', '1', '0', '1', '3', 'Mlad momak', 'Kontakt mladog momka', '0', '1');
INSERT INTO `epm_deliveries` VALUES ('26', 'OT10-01/2014', '1390227135', '0', '', '1', '0', '0', '1', '1', 'Ilija Tesic', 'Kneza Ive bb', '0', '1');
INSERT INTO `epm_deliveries` VALUES ('27', 'OT11-01/2014', '1390569038', '0', '', '1', '0', '0', '1', '1', 'neko', 'nesto', '0', '1');
INSERT INTO `epm_deliveries` VALUES ('29', 'OT12-01/2014', '1390570048', '0', '', '1', '0', '0', '1', '1', 'Ilija Tesic', 'Kneza Ive bb', '0', '1');
INSERT INTO `epm_deliveries` VALUES ('30', 'OT13-01/2014', '1390579512', '0', '', '1', '0', '0', '1', '1', 'ilija', 'fsd', '0', '1');
INSERT INTO `epm_deliveries` VALUES ('31', 'OT14-01/2014', '1390579525', '0', '', '1', '0', '0', '1', '1', 'dfs', 'dfs', '0', '1');
INSERT INTO `epm_deliveries` VALUES ('32', 'OT15-01/2014', '1390579571', '0', '', '1', '0', '0', '1', '1', 'Ilija Tesic', 'Kneza Ive bb', '0', '1');
INSERT INTO `epm_deliveries` VALUES ('33', 'OT16-01/2014', '1390579623', '0', '', '1', '0', '0', '1', '1', 'Ilija Tesic', 'Kneza Ive bb', '0', '1');

-- ----------------------------
-- Table structure for epm_materials
-- ----------------------------
DROP TABLE IF EXISTS `epm_materials`;
CREATE TABLE `epm_materials` (
  `maId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `amount` float NOT NULL,
  `enterDate` bigint(21) NOT NULL,
  `dimensionUnit` varchar(45) NOT NULL,
  `invalid` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`maId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of epm_materials
-- ----------------------------
INSERT INTO `epm_materials` VALUES ('1', 'Papir A4', 'Papir A4 format, bijeli', '1330', '1234567890', 'komad', '0');
INSERT INTO `epm_materials` VALUES ('2', 'Papir A3', 'Papir A3 format, crni', '892.8', '1234567890', 'kom', '0');
INSERT INTO `epm_materials` VALUES ('3', 'Crna Tinta', 'Kertridz crna tinta, HP stampac', '-89.5', '1234567890', 'l', '1');
INSERT INTO `epm_materials` VALUES ('4', 'Papir A2 / 250g', 'Papir A2 / 250g', '1000', '1387045835', 'komad', '0');

-- ----------------------------
-- Table structure for epm_order
-- ----------------------------
DROP TABLE IF EXISTS `epm_order`;
CREATE TABLE `epm_order` (
  `orderId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `price` float DEFAULT NULL,
  `amount` varchar(45) DEFAULT NULL,
  `woId` int(11) DEFAULT NULL,
  `deId` int(11) DEFAULT NULL,
  `measurementUnit` varchar(45) DEFAULT NULL,
  `totalePrice` float DEFAULT NULL,
  `pdv` varchar(45) DEFAULT NULL,
  `done` int(11) DEFAULT NULL,
  `delivered` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`orderId`),
  KEY `fk_epm_order_epm_work_accounts1_idx` (`woId`),
  KEY `fk_epm_order_epm_deliveries1_idx` (`deId`),
  CONSTRAINT `fk_epm_order_epm_work_accounts1` FOREIGN KEY (`woId`) REFERENCES `epm_work_accounts` (`woId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_epm_order_epm_deliveries1` FOREIGN KEY (`deId`) REFERENCES `epm_deliveries` (`deId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of epm_order
-- ----------------------------
INSERT INTO `epm_order` VALUES ('5', 'Cestitke', 'Novogodisnja cestitka A5', '5', '100', '1', '2', 'kom', null, null, '0', '0');
INSERT INTO `epm_order` VALUES ('6', 'Poster A3', 'Svecani prijem', '20', '10', '2', '3', 'kom', null, null, '0', '0');
INSERT INTO `epm_order` VALUES ('9', 'dfg', 'fdg', '20', '1', '6', null, 'kg', null, null, null, '0');
INSERT INTO `epm_order` VALUES ('10', 'Jedna narudzba', 'opis narudzbe', '215', '1', '8', null, 'kg', null, null, null, '0');
INSERT INTO `epm_order` VALUES ('11', 'Druga narudjzba', 'dsfda', '20', '1', '8', null, 'kg', null, null, null, '0');
INSERT INTO `epm_order` VALUES ('12', 'Druga narudjzba', 'fgd', '215', '1', '9', null, 'kg', null, null, null, '0');
INSERT INTO `epm_order` VALUES ('13', 'Narudzba 1', 'dfsadf', '20', '2', '10', null, 'kg', null, null, null, '0');
INSERT INTO `epm_order` VALUES ('14', 'Narudzba 2', 'dfsdfsdf', '215', '3', '10', null, 'kg', null, null, null, '0');
INSERT INTO `epm_order` VALUES ('15', 'N1', 'sdfadf', '20', '3', '11', null, 'kg', null, null, null, '0');
INSERT INTO `epm_order` VALUES ('16', 'N2', 'sdfadf', '215', '2', '11', null, 'kg', null, null, null, '0');
INSERT INTO `epm_order` VALUES ('17', 'dfa', 'dfadsfa', '20', '2', '14', null, 'kg', null, null, null, '0');
INSERT INTO `epm_order` VALUES ('18', 'sdfa', 'dfasdf', '215', '2', '14', null, 'kg', null, null, null, '0');
INSERT INTO `epm_order` VALUES ('19', 'sdfa', 'dsafsdfa', '20', '2', '15', null, 'kg', null, null, null, '0');
INSERT INTO `epm_order` VALUES ('20', 'dfg', 'sdfasd', '215', '3', '15', null, 'kg', null, null, null, '0');
INSERT INTO `epm_order` VALUES ('21', 'sdfadf', 'gfhdf', '215', '2', '16', null, 'kg', null, null, null, '0');
INSERT INTO `epm_order` VALUES ('22', 'Posteri A4', 'Posteri u boji, na papiru 250g', '1.5', '10', '17', '13', 'komad', null, null, '1', '1');
INSERT INTO `epm_order` VALUES ('23', 'Flajeri ', 'Flajeri na A4 papiru, u boji', '1.5', '100', '17', '13', 'komad', null, null, '1', '1');
INSERT INTO `epm_order` VALUES ('25', 'Novogodišnja čestitka', 'Dvostrana štampa u boji, papir A4 300g', '2', '500', '18', null, 'komad', null, null, null, '0');
INSERT INTO `epm_order` VALUES ('26', 'Kalendar A3', 'Kalendar formata A3, svaki mjesec na posebnom listu, slike srecnih i zadovoljnih studenata kako rucaju svoje visokoproteinske obroke u studentskom restoranu, od milja zvanom menza. Presrecne kuvarice se smjeskaju u pozadini i brisu znoj sa cela rukom kojom dodaju komade hljeba. Kalendar treba da ima spiralni uvez i da preovladava crvena boja.', '1.7', '100', '19', null, 'komada', null, null, null, '0');
INSERT INTO `epm_order` VALUES ('27', 'Studentske legitimacije', 'Studentska legitimacija 9x4.5mm, slika na desnoj strani', '2', '400', '19', null, 'komada', null, null, null, '0');
INSERT INTO `epm_order` VALUES ('28', 'Kesa za meso', 'Papirna kesa sa natpisom 1', null, '10', '20', '30', 'kom', null, null, '1', '0');
INSERT INTO `epm_order` VALUES ('29', 'sfda', 'dfads', null, '21', '22', null, 'df', null, null, null, '0');
INSERT INTO `epm_order` VALUES ('30', 'Razglednice', 'Fine sa slikom macke', '10', '10', '24', '27', 'kom', null, null, '1', '0');
INSERT INTO `epm_order` VALUES ('31', 'Poster', 'Ista slika kao na razglednici', '10', '22', '24', '17', 'kom', null, null, '1', '1');
INSERT INTO `epm_order` VALUES ('33', 'Sveska A5', 'sveska', null, '10', '27', '27', 'kom', null, null, '1', '0');
INSERT INTO `epm_order` VALUES ('34', 'Sveska A4', 'Velika debela sveska od 30 listova', '10', 'integer', '28', null, 'komad', null, null, '1', '0');
INSERT INTO `epm_order` VALUES ('35', 'Proizvod 1', 'Opis', null, '100', '29', '19', 'kom', null, null, '1', '0');
INSERT INTO `epm_order` VALUES ('36', 'Drugi proizvod', '', '25.2', '22.5', '29', '22', 'kom', null, null, '1', '1');
INSERT INTO `epm_order` VALUES ('39', 'konj od papira', 'opis', null, '12', null, '29', 'kom', null, null, '1', '0');
INSERT INTO `epm_order` VALUES ('40', 'kobila od papira', '', null, '10', null, '29', 'kk', null, null, '1', '0');
INSERT INTO `epm_order` VALUES ('41', 'Konj od papira', 'konjo mali', '15', '20', '30', null, 'komada', null, null, '1', '0');

-- ----------------------------
-- Table structure for epm_payees
-- ----------------------------
DROP TABLE IF EXISTS `epm_payees`;
CREATE TABLE `epm_payees` (
  `paId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `contactInfo` text NOT NULL,
  PRIMARY KEY (`paId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of epm_payees
-- ----------------------------
INSERT INTO `epm_payees` VALUES ('1', 'Nepoznato', 'Bez Informacija');
INSERT INTO `epm_payees` VALUES ('2', 'Mesara', 'Ovo je adresa od mesara');
INSERT INTO `epm_payees` VALUES ('3', 'dfs', 'ddsf');
INSERT INTO `epm_payees` VALUES ('4', 'df', 'dfs');
INSERT INTO `epm_payees` VALUES ('5', 'Ilija Tesic', 'Kneza Ive bb');
INSERT INTO `epm_payees` VALUES ('6', 'Mlad momak', 'Kontakt mladog momka');

-- ----------------------------
-- Table structure for epm_used_materials
-- ----------------------------
DROP TABLE IF EXISTS `epm_used_materials`;
CREATE TABLE `epm_used_materials` (
  `amount` float NOT NULL,
  `materialId` int(11) NOT NULL,
  `workAccountId` int(11) NOT NULL,
  KEY `materials_fk_index` (`materialId`),
  KEY `work_accounts_fk_index` (`workAccountId`),
  CONSTRAINT `materials_fk2` FOREIGN KEY (`materialId`) REFERENCES `epm_materials` (`maId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `work_accounts_fk2` FOREIGN KEY (`workAccountId`) REFERENCES `epm_work_accounts` (`woId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of epm_used_materials
-- ----------------------------
INSERT INTO `epm_used_materials` VALUES ('3', '2', '11');
INSERT INTO `epm_used_materials` VALUES ('2', '3', '14');
INSERT INTO `epm_used_materials` VALUES ('2', '2', '15');
INSERT INTO `epm_used_materials` VALUES ('110', '1', '17');
INSERT INTO `epm_used_materials` VALUES ('15', '3', '17');
INSERT INTO `epm_used_materials` VALUES ('500', '1', '18');
INSERT INTO `epm_used_materials` VALUES ('15', '3', '19');
INSERT INTO `epm_used_materials` VALUES ('40', '1', '19');
INSERT INTO `epm_used_materials` VALUES ('10', '2', '8');
INSERT INTO `epm_used_materials` VALUES ('10', '3', '8');
INSERT INTO `epm_used_materials` VALUES ('20', '1', '24');
INSERT INTO `epm_used_materials` VALUES ('27', '2', '24');
INSERT INTO `epm_used_materials` VALUES ('300', '1', '28');
INSERT INTO `epm_used_materials` VALUES ('25.2', '2', '29');
INSERT INTO `epm_used_materials` VALUES ('10', '2', '27');
INSERT INTO `epm_used_materials` VALUES ('20', '3', '30');

-- ----------------------------
-- Table structure for epm_users
-- ----------------------------
DROP TABLE IF EXISTS `epm_users`;
CREATE TABLE `epm_users` (
  `usId` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `realName` varchar(45) NOT NULL,
  `realSurname` varchar(45) NOT NULL,
  `registerDate` bigint(21) NOT NULL,
  `privilegeLevel` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`usId`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of epm_users
-- ----------------------------
INSERT INTO `epm_users` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Marko', 'Markovic', '1234567890', '3');
INSERT INTO `epm_users` VALUES ('2', 'racun', '006949fde41d2e60dfcc4cc01b287eaf', 'Irina', 'Sojic', '1234567890', '2');
INSERT INTO `epm_users` VALUES ('3', 'radnik', 'a64e5d0dc60a5bcd98270c2f96ba3dbd', 'Sevdo', 'Krcina', '1234567890', '1');
INSERT INTO `epm_users` VALUES ('4', 'neaktivni', '0b066ba02f4227ae7ef6f8732e23bc74', 'Marijan', 'Maksimovic', '1234567890', '0');
INSERT INTO `epm_users` VALUES ('5', 'ilija', '8684b37cd1223db6f2247fb874505315', 'Ilija', 'Tešić', '1386852218', '1');
INSERT INTO `epm_users` VALUES ('6', 'Proba', 'd41d8cd98f00b204e9800998ecf8427e', 'Probni', 'Korisnik', '1390942145', '2');
INSERT INTO `epm_users` VALUES ('7', 'momcic', '799ca42178314fa3db66e565f28d9a90', 'Mlad', 'Momak', '1391716467', '2');

-- ----------------------------
-- Table structure for epm_work_accounts
-- ----------------------------
DROP TABLE IF EXISTS `epm_work_accounts`;
CREATE TABLE `epm_work_accounts` (
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
  `deliveryPlace` int(1) DEFAULT '3',
  PRIMARY KEY (`woId`),
  UNIQUE KEY `workAccountSerial_UNIQUE` (`workAccountSerial`),
  KEY `users_id_fk_index` (`authorId`),
  KEY `users_reconcield_id_fk_index` (`reconciledId`),
  KEY `fk_epm_work_accounts_epm_users1_idx` (`reviewdId`),
  KEY `fk_epm_work_accounts_epm_users2_idx` (`currentUser`),
  CONSTRAINT `fk_epm_work_accounts_epm_users1` FOREIGN KEY (`reviewdId`) REFERENCES `epm_users` (`usId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_epm_work_accounts_epm_users2` FOREIGN KEY (`currentUser`) REFERENCES `epm_users` (`usId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `users_id_fk` FOREIGN KEY (`authorId`) REFERENCES `epm_users` (`usId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `users_reconcield_id_fk` FOREIGN KEY (`reconciledId`) REFERENCES `epm_users` (`usId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of epm_work_accounts
-- ----------------------------
INSERT INTO `epm_work_accounts` VALUES ('1', 'RN1-12/13', 'Elektrotehnicki fakultet', 'Vuka Karadzica 30', '123456789', '123456789', null, null, '1', '1', '1', '1', null, '1,2,3', '3', '3');
INSERT INTO `epm_work_accounts` VALUES ('2', 'RN2-12/13', 'Kopikomerc', 'Vuka Karadzica 30', '16', '16', null, null, '1', '1', '2', '3', null, '2,3,1,4', '4', '3');
INSERT INTO `epm_work_accounts` VALUES ('4', 'RN1-12/2013', 'ETF', 'jhfg', '1386341730', '1386341730', '', '', '1', '0', '1', null, null, '1,2', '2', '3');
INSERT INTO `epm_work_accounts` VALUES ('5', 'RN2-12/2013', 'ETF', 'jhg', '1386341855', '1386543600', '', '', '0', '0', '1', '1', null, '1,2', '2', '3');
INSERT INTO `epm_work_accounts` VALUES ('6', 'RN3-12/2013', 'ETF', 'gfg', '1386341987', '1387580400', 'fgd', 'fdg', '0', '0', '1', '1', null, '1,2', '2', '3');
INSERT INTO `epm_work_accounts` VALUES ('8', 'RN4-12/2013', 'Neki narucilac', 'dfadsf', '1387883855', '1387407600', 'sdfasdf', 'sdfadsf', '0', '0', '1', null, null, '3,4,1,2,5', '2', '3');
INSERT INTO `epm_work_accounts` VALUES ('9', 'RN5-12/2013', 'ETF', 'gfdfg', '1386506074', '1386630000', '', 'fdg', '0', '0', '1', null, null, '1,3,4,2,1', '3', '3');
INSERT INTO `epm_work_accounts` VALUES ('10', 'RN6-12/2013', 'Novi narucilac', 'dfsdfa', '1386509827', '1387407600', 'dfsdf', 'sdf', '0', '0', '2', '1', null, '4,3', '3', '3');
INSERT INTO `epm_work_accounts` VALUES ('11', 'RN7-12/2013', 'Neki narucilac', 'fgdfg', '1386510585', '1387234800', 'sdfasdf', '', '0', '0', '2', null, null, '3,1,3,4', '3', '3');
INSERT INTO `epm_work_accounts` VALUES ('14', 'RN8-12/2013', 'Neki narucilac', 'dfa', '1386842826', '1386716400', 'fdfg', '', '0', '0', '1', '1', null, '3,2,4', '3', '3');
INSERT INTO `epm_work_accounts` VALUES ('15', 'RN9-12/2013', 'ETF', 'sdfadf', '1386856870', '1387234800', 'dfasdf', 'dafsdf', '0', '0', '5', '1', null, '5,2', '5', '3');
INSERT INTO `epm_work_accounts` VALUES ('16', 'RN10-12/2013', 'fgfg', 'vnbn', '1386857040', '1387407600', '', 'ghfg', '0', '0', '5', '1', null, '1', '1', '3');
INSERT INTO `epm_work_accounts` VALUES ('17', 'RN11-12/2013', 'SoftLab Istocno Sarajevo', 'Ulica Svetog Save bb', '1387049010', '1388444400', 'Plakate treba i dizajnirati', 'Ovo su neke dodatne informacije', '0', '1', '2', '1', null, '2,5,3,4', '4', '3');
INSERT INTO `epm_work_accounts` VALUES ('18', 'RN12-12/2013', 'Univerzitet u Istočnom Sarajevu', 'Vuka Karadžića 30\r\n\r\nKontakt osoba: Miloš Marković\r\n065 123 456', '1387107431', '1388444400', 'Potrebno je uraditi i pripremu, nešto pu uzoru na prošlogodišnju čestitku', 'Priožen je primjerak prošlogodišnje čestitke', '0', '1', '1', '1', null, '5,3,1,2', '5', '3');
INSERT INTO `epm_work_accounts` VALUES ('19', 'RN13-12/2013', 'Studentski centar Lukavica', 'Vuka Karadzica 30\r\nDirektorica Aleksandra Bjelica', '1387650051', '1388271600', 'Sve treba da bude zavrseno u roku i kako treba. Nemoj da bude los kvalitet kao prosle godine, kuvarice su se zalile na intenzitet boja becke snicle u tanjiru.', 'Prilozen primjerak', '0', '0', '1', null, null, '4,2,5', '4', '3');
INSERT INTO `epm_work_accounts` VALUES ('20', 'RN1-01/2014', 'Mesara', 'Ovo je adresa od mesara', '1389281506', '1391128200', '', '', '0', '0', '5', null, null, '1', '1', '3');
INSERT INTO `epm_work_accounts` VALUES ('21', 'RN2-01/2014', 'dfs', 'ddsf', '1389461572', '1389830400', 'dfa', 'sdfa', '0', '1', '1', '5', null, '5,3,1', '5', '2');
INSERT INTO `epm_work_accounts` VALUES ('22', 'RN3-01/2014', 'df', 'dfs', '1389463178', '1389657600', '', '', '0', '0', '1', null, null, '1', '1', '3');
INSERT INTO `epm_work_accounts` VALUES ('23', 'RN4-01/2014', 'Ilija Tesic', 'Kneza Ive bb', '1389481932', '1390905000', 'Nemoj da bude losa stampa', 'Nema informacija', '0', '0', '1', null, null, '2,3,1', '2', '2');
INSERT INTO `epm_work_accounts` VALUES ('24', 'RN5-01/2014', 'Ilija Tesic', 'Kneza Ive bb', '1389482190', '1390905000', 'Nemoj da bude losa stampa', 'Nema informacija', '0', '1', '1', '1', null, '2,3,1', '2', '2');
INSERT INTO `epm_work_accounts` VALUES ('27', 'RN6-01/2014', 'Ilija Tesic', 'Kneza Ive bb', '1390339182', '1389776400', '', '', '0', '0', '1', null, null, '3,2,1', '3', '3');
INSERT INTO `epm_work_accounts` VALUES ('28', 'RN7-01/2014', 'Ilija Tesic', 'Kneza Ive bb', '1390057775', '1391158800', '', '', '1', '0', '1', null, null, '2,4,3', '2', '2');
INSERT INTO `epm_work_accounts` VALUES ('29', 'RN8-01/2014', 'Mlad momak', 'Kontakt mladog momka', '1390058189', '1390487400', '', '', '0', '1', '1', '1', null, '5,1,3,2', '4', '1');
INSERT INTO `epm_work_accounts` VALUES ('30', 'RN1-02/2014', 'Ilija Tesic', 'Kneza Ive bb', '1391717762', '1393578000', '', '', '0', '0', '1', null, null, '3,6', '3', '3');

-- ----------------------------
-- Table structure for tbl_migration
-- ----------------------------
DROP TABLE IF EXISTS `tbl_migration`;
CREATE TABLE `tbl_migration` (
  `version` varchar(255) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_migration
-- ----------------------------
INSERT INTO `tbl_migration` VALUES ('m000000_000000_base', '1389482178');
INSERT INTO `tbl_migration` VALUES ('m140111_174320_add_delivered_in_table_order', '1389482181');
INSERT INTO `tbl_migration` VALUES ('m140111_185637_change_default_for_delivery_place_and_pay_type', '1389482182');
INSERT INTO `tbl_migration` VALUES ('m140118_150033_add_columns_invalid_to_epm_materials', '1390057412');
INSERT INTO `tbl_migration` VALUES ('m140124_132227_fix_foreign_key_for_deliveries_and_orders', '1391715383');
