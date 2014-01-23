CREATE DATABASE  IF NOT EXISTS `ermex` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ermex`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: ermex
-- ------------------------------------------------------
-- Server version	5.5.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `epm_config`
--

DROP TABLE IF EXISTS `epm_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `epm_config` (
  `coId` int(11) NOT NULL AUTO_INCREMENT,
  `workAccountIncrement` int(11) NOT NULL DEFAULT '0',
  `lastSystemLoginId` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`coId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `epm_config`
--

LOCK TABLES `epm_config` WRITE;
/*!40000 ALTER TABLE `epm_config` DISABLE KEYS */;
INSERT INTO `epm_config` VALUES (1,4,1);
/*!40000 ALTER TABLE `epm_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `epm_deliveries`
--

DROP TABLE IF EXISTS `epm_deliveries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `epm_deliveries` (
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
  `archived` int(1) DEFAULT NULL,
  `deliveryPlace` int(1) DEFAULT '3',
  PRIMARY KEY (`deId`),
  KEY `user_fk_index` (`authorId`),
  KEY `fk_epm_deliveries_epm_users1_idx` (`reconciledId`),
  CONSTRAINT `fk_epm_deliveries_epm_users1` FOREIGN KEY (`reconciledId`) REFERENCES `epm_users` (`usId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `users_fk` FOREIGN KEY (`authorId`) REFERENCES `epm_users` (`usId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `epm_deliveries`
--

LOCK TABLES `epm_deliveries` WRITE;
/*!40000 ALTER TABLE `epm_deliveries` DISABLE KEYS */;
INSERT INTO `epm_deliveries` VALUES (1,'test',12156515,25,'test',1,0,0,1,1,'test','test',0,3),(2,'OT1-12/13',1387105353,0,'',0,0,1,3,2,'Elektrotehnicki fakultet ','Vuka Karadzica 30',0,3),(3,'OT2-12/13',1387106625,6546,'ovo je neka napomena',1,1,1,1,1,'Kopikomerc','Vuka Karadzica 30',0,3),(4,'OT3-12/13',3212,6545,'',0,1,0,1,1,'Kopikomerc','Vuka Karadzica 30',1,3),(6,'OT1-01/2014',1389294225,214,'lga;lgmas;lgmas;lgmag',0,1,0,1,1,'teatata','adstatast',0,3),(7,'OT2-01/2014',1389294280,214,'lga;lgmas;lgmas;lgmag',0,0,0,1,1,'teatata','adstatast',0,3),(8,'OT3-01/2014',1389294382,214,'lga;lgmas;lgmas;lgmag',0,0,0,1,1,'teatata','adstatast',0,3),(9,'OT4-01/2014',1389294396,214,'lga;lgmas;lgmas;lgmag',0,0,0,1,1,'teatata','adstatast',0,3),(10,'OT5-01/2014',1389294556,3525,'sdlfa;sjfas;gj',0,0,0,1,1,'dfajsklf;j','slfkajsfklaj',0,3),(11,'OT6-01/2014',1389295234,333,'laskg;asgklasg',0,0,0,1,1,'lsfja;gskljsagk','sla;gjas;lgaj;gljs',0,3),(12,'OT7-01/2014',1389295259,333,'laskg;asgklasg',0,0,0,1,1,'lsfja;gskljsagk','sla;gjas;lgaj;gljs',0,3),(13,'OT8-01/2014',1389295344,1251,'sfalfa;  k;ldkva; lk ;lakd',0,0,0,1,1,'asljsagkaslj','jlkajsglakg',0,3),(14,'OT9-01/2014',1389295357,1251,'sfalfa;  k;ldkva; lk ;lakd',0,0,0,1,1,'asljsagkaslj','jlkajsglakg',0,3),(15,'OT10-01/2014',1389295371,1251,'sfalfa;  k;ldkva; lk ;lakd',0,0,0,1,1,'asljsagkaslj','jlkajsglakg',0,3),(16,'OT11-01/2014',1389295587,1251,'sfalfa;  k;ldkva; lk ;lakd',0,0,0,1,1,'asljsagkaslj','jlkajsglakg',0,3),(17,'OT12-01/2014',1389295619,1251,'sfalfa;  k;ldkva; lk ;lakd',0,0,0,1,1,'asljsagkaslj','jlkajsglakg',0,3),(18,'OT13-01/2014',1389295725,1251,'sfalfa;  k;ldkva; lk ;lakd',0,0,0,1,1,'asljsagkaslj','jlkajsglakg',0,3),(19,'OT14-01/2014',1389375322,200,'Nema',0,0,0,1,1,'Mirkosada','miamviamvaoivma',0,3),(20,'OT15-01/2014',1389375652,333,'slafa;lfmasl;f lam fl;amf',0,1,0,1,1,'Hehe Mark','safjasgpjagpoj',0,3),(21,'OT16-01/2014',1389475425,23,'',0,0,0,1,1,'scsca','cxczxczxc',0,3),(22,'OT17-01/2014',1389476913,231231,'sdad',0,0,0,1,1,'sad','vzvzxvzxvzx',0,3),(23,'OT18-01/2014',1389475504,22,'',0,1,0,1,1,'asfasf','asfasfasf',0,3),(24,'OT19-01/2014',1389803401,2000,'Misko nema nista.',0,0,0,1,1,'Jebiga Mile','Oho misko',0,1),(25,'OT20-01/2014',1390066853,200,'Done',0,0,0,1,1,'Test','Test Narucioc',0,3),(26,'OT21-01/2014',1390067021,0,'',0,0,0,1,1,'Test','Glass',0,3),(31,'OT22-01/2014',1390067937,0,'',0,0,0,1,1,'Test RN','tesat',0,3),(32,'OT23-01/2014',1390226566,0,'',0,0,0,1,1,'sla;lj','ljfa;lsjf',0,3),(33,'OT24-01/2014',1390226733,22,'s',0,0,0,1,1,'dgag','daag',0,3),(34,'OT25-01/2014',1390226820,0,'',0,0,0,1,1,'saf','safas',0,3),(36,'OT26-01/2014',1390482576,0,'',0,0,0,1,1,'Konj','Test',0,3),(37,'OT27-01/2014',1390483251,200,'',0,0,0,1,1,'Test Vise narudzbi','Nema',0,3),(38,'OT28-01/2014',1390483439,0,'',0,0,0,1,1,'Te?ašasfa','?sšfa?fšas?f',0,3);
/*!40000 ALTER TABLE `epm_deliveries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `epm_materials`
--

DROP TABLE IF EXISTS `epm_materials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `epm_materials` (
  `maId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `amount` float NOT NULL,
  `enterDate` bigint(21) NOT NULL,
  `dimensionUnit` varchar(45) NOT NULL,
  `invalid` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`maId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `epm_materials`
--

LOCK TABLES `epm_materials` WRITE;
/*!40000 ALTER TABLE `epm_materials` DISABLE KEYS */;
INSERT INTO `epm_materials` VALUES (1,'Papir A4','Papir A4 format, bijeli',1057,1234567890,'kom',1),(2,'Papir A3','Papir A3 format, crni',434,1234567890,'kom',1),(3,'Crna Tinta','Kertridz crna tinta, HP stampac',2000.5,1234567890,'l',0),(4,'Korektor','Korektor',-894,1386500552,'l',0),(5,'Papir A2, zuti','Papir A2, zuti',-165,1386500642,'kom',0);
/*!40000 ALTER TABLE `epm_materials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `epm_order`
--

DROP TABLE IF EXISTS `epm_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `delivered` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`orderId`),
  KEY `fk_epm_order_epm_work_accounts1_idx` (`woId`),
  KEY `fk_epm_order_epm_deliveries1_idx` (`deId`),
  CONSTRAINT `fk_epm_order_epm_deliveries1` FOREIGN KEY (`deId`) REFERENCES `epm_deliveries` (`deId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_epm_order_epm_work_accounts1` FOREIGN KEY (`woId`) REFERENCES `epm_work_accounts` (`woId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `epm_order`
--

LOCK TABLES `epm_order` WRITE;
/*!40000 ALTER TABLE `epm_order` DISABLE KEYS */;
INSERT INTO `epm_order` VALUES (0,'Super','safkslfak',22,'1',72,NULL,'',NULL,NULL,1,0),(5,'Cestitkesad','Novogodisnja cestitka A5',5,'100',1,37,'kom',NULL,NULL,1,0),(6,'lasldds','Svecani prijem',20,'10',2,34,'kom',NULL,NULL,1,0),(9,'dfg','fdg',20,'1',6,NULL,'kg',NULL,NULL,NULL,0),(10,'Jedna narudzba','opis narudzbe',215,'1',8,NULL,'kg',NULL,NULL,NULL,0),(11,'Druga narudjzba','dsfda',20,'1',8,NULL,'kg',NULL,NULL,NULL,0),(12,'Druga narudjzba','fgd',215,'1',9,NULL,'kg',NULL,NULL,NULL,0),(13,'Narudzba 1','dfsadf',20,'2',10,NULL,'kg',NULL,NULL,NULL,0),(14,'Narudzba 2','dfsdfsdf',215,'3',10,NULL,'kg',NULL,NULL,NULL,0),(15,'N1','sdfadf',20,'3',11,NULL,'kg',NULL,NULL,NULL,0),(16,'N2','sdfadf',215,'2',11,NULL,'kg',NULL,NULL,NULL,0),(17,'dfa','dfadsfa',20,'2',14,NULL,'kg',NULL,NULL,NULL,0),(18,'tesr','asfasfas',35,'4',39,NULL,'gdg',NULL,NULL,NULL,0),(19,'test','test',25,'2',45,NULL,'km',NULL,NULL,NULL,0),(20,'test','test',25,'2',46,NULL,'km',NULL,NULL,NULL,0),(21,'test','test',25,'2',47,NULL,'km',NULL,NULL,NULL,0),(22,'test','test',25,'2',48,NULL,'km',NULL,NULL,NULL,0),(23,'test','test',25,'2',49,NULL,'km',NULL,NULL,NULL,0),(24,'najnoviji1','test',25,'2',52,NULL,'km',NULL,NULL,NULL,0),(25,'najnoviji','test',38,'4',52,NULL,'dg',NULL,NULL,NULL,0),(26,'test','test',25,'2',54,NULL,'km',NULL,NULL,NULL,0),(27,'','',NULL,'',54,NULL,'',NULL,NULL,NULL,0),(28,'test','test',25,'2',55,NULL,'km',NULL,NULL,NULL,0),(29,'','',NULL,'',55,NULL,'',NULL,NULL,NULL,0),(30,'test','test',25,'2',56,NULL,'km',NULL,NULL,NULL,0),(31,'','',NULL,'',56,NULL,'',NULL,NULL,NULL,0),(32,'test','test',25,'2',57,NULL,'km',NULL,NULL,NULL,0),(33,'','',NULL,'',57,NULL,'',NULL,NULL,NULL,0),(34,'test','test',25,'2',58,NULL,'km',NULL,NULL,NULL,0),(35,'tesf','test',35,'5',58,NULL,'kl',NULL,NULL,NULL,0),(36,'test','test',25,'2',59,NULL,'km',NULL,NULL,NULL,0),(37,'','',NULL,'',59,NULL,'',NULL,NULL,NULL,0),(38,'test','test',25,'2',60,NULL,'km',NULL,NULL,NULL,0),(39,'','',NULL,'',60,NULL,'',NULL,NULL,NULL,0),(40,'test','test',25,'2',61,NULL,'km',NULL,NULL,1,0),(41,'','',NULL,'',61,NULL,'',NULL,NULL,1,0),(42,'test','test',25,'2',62,NULL,'km',NULL,NULL,NULL,0),(43,'','',NULL,'',62,NULL,'',NULL,NULL,NULL,0),(44,'test','test',25.6,'2.5',65,NULL,'km',NULL,NULL,NULL,0),(45,'','',NULL,'',65,NULL,'',NULL,NULL,NULL,0),(46,'test','test',25,'2',66,NULL,'km',NULL,NULL,NULL,0),(48,'Cestitke','Novogodisnja cestitka A5',5,'100',NULL,18,'kom',NULL,NULL,1,0),(49,'Poster A3','Svecani prijem',20,'10',NULL,18,'kom',NULL,NULL,1,0),(50,'Kliskara3','MIsko',23,'22',NULL,20,'mm',NULL,NULL,1,0),(51,'USB Stik','afasfasf',14,'14',NULL,23,'',NULL,NULL,1,1),(52,'Hello Worldsa','Nema',13,'1',67,NULL,'',NULL,NULL,NULL,0),(53,'UsBICss','BIC zilet',1,'1',67,NULL,'KM',NULL,NULL,NULL,0),(54,'dasda','s;fasf',12,'1',70,NULL,'km',NULL,NULL,1,0),(55,'Nostalgia','Critic',200,'1',71,NULL,'nc',NULL,NULL,1,0),(57,'s;fafkalfsfs','hehe',2,'22',72,37,'km',NULL,NULL,1,0),(58,'sdadsdasd','Mirko',60,'200',72,NULL,'ri',NULL,NULL,1,0),(59,'Skaf','Lol',152,'10',72,NULL,'',NULL,NULL,1,0),(60,'Nema Nistacd','Kisa',100,'22',73,37,'nic',NULL,NULL,1,0),(61,'Hellc','Kis',2,'22',73,24,'kk',NULL,NULL,1,0),(62,'Bells','',10,'232',73,24,'',NULL,NULL,1,0),(63,'Melo','Melo prelo',100,'2',NULL,24,'',NULL,NULL,1,0),(70,'Lol','',NULL,'1',79,37,'M',NULL,NULL,1,0),(71,'Lolcina','Jedan lol',22,'1',80,37,'km',NULL,NULL,1,0),(72,'Super','safkslfak',22,'1',NULL,25,'',NULL,NULL,1,0),(73,'Mamam','Test',NULL,'2',NULL,26,'M',NULL,NULL,1,0),(74,'sfasf','',NULL,'',NULL,31,'',NULL,NULL,1,0),(75,'sfasf','',NULL,'',NULL,31,'',NULL,NULL,1,0),(76,'daaotkea','',NULL,'',NULL,32,'',NULL,NULL,1,0),(77,'kasl','',NULL,'',NULL,33,'',NULL,NULL,1,0),(78,'Bla`','',10,'2',NULL,36,'KM',NULL,NULL,1,0),(79,'Testera','',NULL,'2',NULL,37,'KM',NULL,NULL,1,0),(80,'s?fšas?fšsa?šfas?fšas?f','',NULL,'1',NULL,38,'L',NULL,NULL,1,0);
/*!40000 ALTER TABLE `epm_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `epm_payees`
--

DROP TABLE IF EXISTS `epm_payees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `epm_payees` (
  `paId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `contactInfo` text NOT NULL,
  PRIMARY KEY (`paId`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `epm_payees`
--

LOCK TABLES `epm_payees` WRITE;
/*!40000 ALTER TABLE `epm_payees` DISABLE KEYS */;
INSERT INTO `epm_payees` VALUES (1,'Nepoznato','Bez Informacija'),(2,'Rabin',''),(3,'Milan',''),(4,'Ilija',''),(5,'Soky','Nema'),(6,'Golub',''),(7,'Test RN','tesat'),(8,'Novi Test RN','Nema'),(9,'Test Vise narudzbi','Nema'),(10,'RN Man','Misko'),(11,'Misko','lsjflaksj'),(12,'ldldjgkadjgf','lsfafjl'),(13,'Test','safakf');
/*!40000 ALTER TABLE `epm_payees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `epm_used_materials`
--

DROP TABLE IF EXISTS `epm_used_materials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `epm_used_materials` (
  `amount` float NOT NULL,
  `materialId` int(11) NOT NULL,
  `workAccountId` int(11) NOT NULL,
  KEY `materials_fk_index` (`materialId`),
  KEY `work_accounts_fk_index` (`workAccountId`),
  CONSTRAINT `materials_fk2` FOREIGN KEY (`materialId`) REFERENCES `epm_materials` (`maId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `work_accounts_fk2` FOREIGN KEY (`workAccountId`) REFERENCES `epm_work_accounts` (`woId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `epm_used_materials`
--

LOCK TABLES `epm_used_materials` WRITE;
/*!40000 ALTER TABLE `epm_used_materials` DISABLE KEYS */;
INSERT INTO `epm_used_materials` VALUES (5,1,56),(3,2,56),(5,1,57),(7,2,57),(5,1,58),(3,2,58),(50,1,59),(50,1,60),(50,1,61),(50,1,62),(2,1,66),(100,3,73),(100,4,79),(100,1,79),(100,2,79),(100,3,79),(100,5,79),(333,4,71),(22,2,71),(333,3,71),(22,5,71),(11,5,67),(22,2,67),(33,3,67),(200,1,80),(10,5,80);
/*!40000 ALTER TABLE `epm_used_materials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `epm_users`
--

DROP TABLE IF EXISTS `epm_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `epm_users`
--

LOCK TABLES `epm_users` WRITE;
/*!40000 ALTER TABLE `epm_users` DISABLE KEYS */;
INSERT INTO `epm_users` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3','Marko','Markovic',1234567890,3),(2,'racun','006949fde41d2e60dfcc4cc01b287eaf','Irina','Sojic',1234567890,2),(3,'radnik','a64e5d0dc60a5bcd98270c2f96ba3dbd','Sevdo','Krcina',1234567890,1),(4,'neaktivni','0b066ba02f4227ae7ef6f8732e23bc74','Marijan','Maksimovic',1234567890,0),(5,'marko','c28aa76990994587b0e907683792297c','Marinko','Rokvic',1386856312,2);
/*!40000 ALTER TABLE `epm_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `epm_work_accounts`
--

DROP TABLE IF EXISTS `epm_work_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `epm_work_accounts`
--

LOCK TABLES `epm_work_accounts` WRITE;
/*!40000 ALTER TABLE `epm_work_accounts` DISABLE KEYS */;
INSERT INTO `epm_work_accounts` VALUES (1,'RN1-12/2013','Pani? Aleksandar','gtetwt',1386259497,1388098800,'teswtes','etestse',0,0,3,NULL,NULL,'2,3',2,3),(2,'RN2-12/2013','Milan Kruni?','Lopare, Banja Luka\r\n065/123-555',1386259863,1386889200,'Odma ostampati!','Isporuciti na adresu.',1,1,3,NULL,NULL,'3,2,1',3,3),(4,'RN3-12/2013','test','test',1386333022,1386284400,'test','test',0,0,3,NULL,NULL,'2,3',2,3),(5,'RN4-12/2013','test','test',1386333299,1386370800,'test','test',0,0,3,NULL,NULL,'2,3',2,3),(6,'RN5-12/2013','tete','tete',1386333385,1386889200,'test','test',0,0,3,NULL,NULL,'2,3',2,3),(7,'RN6-12/2013','test','test',1386333417,1386284400,'test','test',0,0,3,NULL,NULL,'2,3',2,3),(8,'RN7-12/2013','test','test',1386333584,1386284400,'test','test',0,0,3,NULL,NULL,'2,3',2,3),(9,'RN8-12/2013','tet','test',1386333985,1386284400,'test','test',0,0,3,NULL,NULL,'2,3',2,3),(10,'RN9-12/2013','test','test',1386334207,1386370800,'test','test',0,0,3,NULL,NULL,'2,3',2,3),(11,'RN10-12/2013','test','tet',1386334266,1386975600,'test','test',0,0,3,NULL,NULL,'2,3',2,3),(12,'RN11-12/2013','test','tet',1386334355,1386975600,'test','test',0,0,3,NULL,NULL,'2,3',2,3),(13,'RN12-12/2013','test','test',1386334382,1387494000,'test','test',0,0,3,NULL,NULL,'2,3',2,3),(14,'RN13-12/2013','test','test',1386335730,1386889200,'test','test',0,0,3,NULL,NULL,'2,3',2,3),(15,'RN14-12/2013','test','test',1386335783,1386889200,'test','test',0,0,3,NULL,NULL,'2,3',2,3),(17,'RN15-12/2013','test','test',1386335951,1386889200,'tste','test',0,0,3,NULL,NULL,'2,3',2,3),(18,'RN16-12/2013','test','test',1386336114,1387494000,'test','test',0,0,3,NULL,NULL,'2,3',2,3),(19,'RN17-12/2013','test','test',1386336193,1386975600,'test','test',0,0,3,NULL,NULL,'2,3',2,3),(20,'RN18-12/2013','test','test',1386336949,1387580400,'test','test',0,0,3,NULL,NULL,'2,3',2,3),(21,'RN19-12/2013','test','test',1386337077,1387580400,'test','test',0,0,3,NULL,NULL,'2,3',2,3),(22,'RN20-12/2013','test','test',1386337126,1387580400,'test','test',0,0,3,NULL,NULL,'2,3',2,3),(23,'RN21-12/2013','test','test',1386337273,1387580400,'test','test',0,0,3,NULL,NULL,'2,3',2,3),(24,'RN22-12/2013','test','test',1386337406,1387580400,'test','test',0,0,3,NULL,NULL,'2,3',2,3),(25,'RN23-12/2013','test','test',1386337666,1387580400,'test','test',0,0,3,NULL,NULL,'2,3',2,3),(26,'RN24-12/2013','test','test',1386337886,1387580400,'test','test',0,0,3,NULL,NULL,'2,3',2,3),(27,'RN25-12/2013','test','test',1386337971,1387580400,'test','test',0,0,3,NULL,NULL,'2,3',2,3),(28,'RN26-12/2013','test','test',1386338049,1387580400,'test','test',0,0,3,NULL,NULL,'2,3',2,3),(29,'RN27-12/2013','test','test',1386338111,1387666800,'test','test',0,0,3,NULL,NULL,'2,3',2,3),(30,'RN28-12/2013','test','test',1386338533,1387580400,'test','test',0,0,3,NULL,NULL,'2,3',2,3),(31,'RN29-12/2013','test','test',1386338680,1387580400,'test','test',0,0,3,NULL,NULL,'2,3',2,3),(32,'RN30-12/2013','test','test',1386338734,1388185200,'test','test',0,0,3,NULL,NULL,'2,3',2,3),(33,'RN31-12/2013','test','test',1386338845,1387580400,'test','test',0,0,3,NULL,NULL,'2,3',2,3),(34,'RN32-12/2013','test','test',1386338930,1388185200,'test','test',0,0,3,NULL,NULL,'2,3',2,3),(35,'RN33-12/2013','test','test',1386338985,1387580400,'test','test',0,0,3,NULL,NULL,'2,3',2,3),(36,'RN34-12/2013','test','test',1386339014,1388185200,'test','test',0,0,3,NULL,NULL,'2,3',2,3),(37,'RN35-12/2013','test','test',1386339073,1387666800,'test','test',0,0,3,NULL,NULL,'2,3',2,3),(38,'RN36-12/2013','test','test',1386339298,1387666800,'test','test',0,0,3,NULL,NULL,'2,3',2,3),(39,'RN37-12/2013','test','test',1386339541,1387580400,'test','test',0,0,3,NULL,NULL,'2,3',2,3),(45,'RN38-12/2013','test','test',1386354074,1387494000,'test','test',0,0,1,NULL,NULL,'1,',1,3),(46,'RN39-12/2013','test','test',1386354248,1387494000,'test','test',0,0,1,NULL,NULL,'1,',1,3),(47,'RN40-12/2013','test','test',1386354352,1387580400,'test','test',0,0,1,NULL,NULL,'2,',2,3),(48,'RN41-12/2013','test','test',1386354428,1387494000,'test','test',0,0,1,NULL,NULL,'1,',1,3),(49,'RN42-12/2013','test','test',1386354482,1387494000,'test','test',0,0,1,NULL,NULL,'1,',1,3),(50,'RN43-12/2013','test','test',1386354511,1387494000,'test','test',0,0,1,NULL,NULL,'1,',1,3),(51,'RN44-12/2013','test','test',1386354533,1387494000,'test','test',0,0,1,NULL,NULL,'1,',1,3),(52,'RN45-12/2013','najnoviji','test',1386354791,1387580400,'test','test',0,0,1,NULL,NULL,'1,',1,3),(54,'RN46-12/2013','test','test',1386354957,1387494000,'test','test',0,0,1,NULL,NULL,'1,3,2,1,4,',1,3),(55,'RN47-12/2013','test','test',1386354958,1387494000,'test','test',0,0,1,NULL,NULL,'1,3,2,1,4,',1,3),(56,'RN48-12/2013','test','test',1386357722,1387580400,'test','test',0,0,1,NULL,NULL,'1',1,3),(57,'RN49-12/2013','test','test',1386357782,1387580400,'test','test',0,0,1,NULL,NULL,'1',1,3),(58,'RN50-12/2013','test','test',1386494076,1387580400,'test','test',0,0,1,NULL,NULL,'2,3',2,3),(59,'RN51-12/2013','test','test',1386495261,1387580400,'test','test',0,0,1,NULL,NULL,'1',1,3),(60,'RN52-12/2013','test','test',1386495499,1387494000,'test','test',0,0,1,NULL,NULL,'1',1,3),(61,'RN53-12/2013','test','test',1386495674,1387580400,'test','test',0,1,1,1,NULL,'1',1,3),(62,'RN54-12/2013','test','test',1386495736,1387494000,'test','test',0,0,1,NULL,NULL,'1',1,3),(63,'RN55-12/2013','test','test',1386495977,1387580400,'test','test',0,0,1,NULL,NULL,'1',1,3),(64,'RN56-12/2013','test','test',1386496094,1387580400,'test','test',0,0,1,NULL,NULL,'1',1,3),(65,'RN57-12/2013','test','test',1386496168,1387580400,'test','test',0,0,1,NULL,NULL,'1',1,3),(66,'RN58-12/2013','test','test',1386496346,1387580400,'test','test',0,0,1,NULL,NULL,'1',1,3),(67,'RN1-01/2014','Sokysa','Nema',1389805766,1389398400,'Nema','Nema',0,0,1,NULL,NULL,'1,2,3,4,5',1,3),(68,'RN2-01/2014','Test RN','tesat',1389797509,1389407400,'','',0,0,1,NULL,NULL,'1,2',1,3),(69,'RN3-01/2014','Test RN','tesat',1389797599,1389407400,'','',0,0,1,NULL,NULL,'1,2',1,3),(70,'RN4-01/2014','Test RN','tesat',1389801654,1389407400,'','',0,0,1,NULL,NULL,'1,2',1,3),(71,'RN5-01/2014','Novi Test RN','Nema',1389805726,1389859200,'Pitat miska.','Nema',0,0,1,NULL,NULL,'1,4,3',1,3),(72,'RN6-01/2014','Test Vise narudzbis','Nemas',1389802760,1389965400,'Gasgas','Lols',0,0,1,NULL,NULL,'2,3,1',1,2),(73,'RN7-01/2014','RN Man Izmjenjen','Misko Kisko',1389803165,1513688400,'Nema nista gospodjo.','Pisko',0,0,1,NULL,NULL,'1,5,3',1,2),(79,'RN8-01/2014','Klisko','lsjflaksj',1389805415,1389832200,'','jklasjfal',0,0,1,NULL,NULL,'1,2',1,3),(80,'RN9-01/2014','Lalalala','Lasko',1389806470,1390068000,'lskfa','Jebse',0,0,1,NULL,NULL,'1,4',4,1),(83,'RN10-01/2014','Test','safakf',1389998229,1389949200,'test','aofaksfoask',0,0,1,NULL,NULL,'1,3',1,3);
/*!40000 ALTER TABLE `epm_work_accounts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-01-23 14:24:38
