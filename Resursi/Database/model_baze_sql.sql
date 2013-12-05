SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `ermex_pm` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `ermex_pm` ;

-- -----------------------------------------------------
-- Table `ermex_pm`.`epm_users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ermex_pm`.`epm_users` (
  `usId` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `realName` VARCHAR(45) NOT NULL,
  `realSurname` VARCHAR(45) NOT NULL,
  `registerDate` BIGINT(21) NOT NULL,
  `privilegeLevel` INT(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`usId`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ermex_pm`.`epm_config`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ermex_pm`.`epm_config` (
  `coId` INT NOT NULL AUTO_INCREMENT,
  `workAccountIncrement` INT NOT NULL DEFAULT 0,
  `lastSystemLoginId` INT NOT NULL DEFAULT 0,
  PRIMARY KEY (`coId`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ermex_pm`.`epm_payees`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ermex_pm`.`epm_payees` (
  `paId` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `contactInfo` TEXT NOT NULL,
  PRIMARY KEY (`paId`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ermex_pm`.`epm_work_accounts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ermex_pm`.`epm_work_accounts` (
  `woId` INT NOT NULL AUTO_INCREMENT,
  `workAccountSerial` VARCHAR(90) NOT NULL,
  `payeeName` VARCHAR(45) NOT NULL,
  `payeeContactInfo` TEXT NOT NULL,
  `creationDate` BIGINT(21) NOT NULL,
  `deadlineDate` BIGINT(21) NOT NULL,
  `note` TEXT NULL,
  `additional` TEXT NULL,
  `invalid` INT(1) NOT NULL,
  `reconciled` INT(1) NOT NULL,
  `authorId` INT NOT NULL,
  `reconciledId` INT NULL,
  `reviewdId` INT NULL,
  `usersList` VARCHAR(90) NULL,
  `currentUser` INT NOT NULL,
  PRIMARY KEY (`woId`),
  UNIQUE INDEX `workAccountSerial_UNIQUE` (`workAccountSerial` ASC),
  INDEX `users_id_fk_index` (`authorId` ASC),
  INDEX `users_reconcield_id_fk_index` (`reconciledId` ASC),
  INDEX `fk_epm_work_accounts_epm_users1_idx` (`reviewdId` ASC),
  INDEX `fk_epm_work_accounts_epm_users2_idx` (`currentUser` ASC),
  CONSTRAINT `users_id_fk`
    FOREIGN KEY (`authorId`)
    REFERENCES `ermex_pm`.`epm_users` (`usId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `users_reconcield_id_fk`
    FOREIGN KEY (`reconciledId`)
    REFERENCES `ermex_pm`.`epm_users` (`usId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_epm_work_accounts_epm_users1`
    FOREIGN KEY (`reviewdId`)
    REFERENCES `ermex_pm`.`epm_users` (`usId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_epm_work_accounts_epm_users2`
    FOREIGN KEY (`currentUser`)
    REFERENCES `ermex_pm`.`epm_users` (`usId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ermex_pm`.`epm_materials`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ermex_pm`.`epm_materials` (
  `maId` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT NOT NULL,
  `amount` FLOAT NOT NULL,
  `enterDate` BIGINT(21) NOT NULL,
  `dimensionUnit` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`maId`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ermex_pm`.`epm_deliveries`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ermex_pm`.`epm_deliveries` (
  `deId` INT NOT NULL AUTO_INCREMENT,
  `deliverySerial` VARCHAR(90) NOT NULL,
  `deliveryDate` BIGINT(21) NOT NULL,
  `price` FLOAT NOT NULL,
  `note` TEXT NOT NULL,
  `payType` INT(1) NOT NULL,
  `reconciled` INT(1) NULL,
  `invalid` INT(1) NULL,
  `authorId` INT NOT NULL,
  `reconciledId` INT NOT NULL,
  `peyeeName` VARCHAR(255) NULL,
  `peyeeContactInfo` TEXT NULL,
  PRIMARY KEY (`deId`),
  INDEX `user_fk_index` (`authorId` ASC),
  INDEX `fk_epm_deliveries_epm_users1_idx` (`reconciledId` ASC),
  CONSTRAINT `users_fk`
    FOREIGN KEY (`authorId`)
    REFERENCES `ermex_pm`.`epm_users` (`usId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_epm_deliveries_epm_users1`
    FOREIGN KEY (`reconciledId`)
    REFERENCES `ermex_pm`.`epm_users` (`usId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ermex_pm`.`epm_used_materials`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ermex_pm`.`epm_used_materials` (
  `amount` FLOAT NOT NULL,
  `materialId` INT NOT NULL,
  `workAccountId` INT NOT NULL,
  INDEX `materials_fk_index` (`materialId` ASC),
  INDEX `work_accounts_fk_index` (`workAccountId` ASC),
  CONSTRAINT `materials_fk2`
    FOREIGN KEY (`materialId`)
    REFERENCES `ermex_pm`.`epm_materials` (`maId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `work_accounts_fk2`
    FOREIGN KEY (`workAccountId`)
    REFERENCES `ermex_pm`.`epm_work_accounts` (`woId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ermex_pm`.`epm_order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ermex_pm`.`epm_order` (
  `orderId` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NULL,
  `description` TEXT NULL,
  `price` FLOAT NULL,
  `amount` VARCHAR(45) NULL,
  `woId` INT NOT NULL,
  `deId` INT NOT NULL,
  `measurementUnit` VARCHAR(45) NULL,
  `totalePrice` FLOAT NULL,
  `pdv` VARCHAR(45) NULL,
  `done` INT NULL,
  PRIMARY KEY (`orderId`),
  INDEX `fk_epm_order_epm_work_accounts1_idx` (`woId` ASC),
  INDEX `fk_epm_order_epm_deliveries1_idx` (`deId` ASC),
  CONSTRAINT `fk_epm_order_epm_work_accounts1`
    FOREIGN KEY (`woId`)
    REFERENCES `ermex_pm`.`epm_work_accounts` (`woId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_epm_order_epm_deliveries1`
    FOREIGN KEY (`deId`)
    REFERENCES `ermex_pm`.`epm_deliveries` (`deId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
