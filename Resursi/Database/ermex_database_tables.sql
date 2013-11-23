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
  `isLoggedBy` INT(1) NOT NULL DEFAULT 0,
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
  PRIMARY KEY (`coId`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ermex_pm`.`epm_payees`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ermex_pm`.`epm_payees` (
  `paId` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `address` VARCHAR(45) NOT NULL,
  `contactPerson` VARCHAR(45) NOT NULL,
  `contactInfo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`paId`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ermex_pm`.`epm_work_accounts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ermex_pm`.`epm_work_accounts` (
  `woId` INT NOT NULL AUTO_INCREMENT,
  `workAccountSerial` VARCHAR(90) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT NOT NULL,
  `payeeName` VARCHAR(45) NOT NULL,
  `payeeAddress` VARCHAR(45) NOT NULL,
  `payeeContactPerson` VARCHAR(45) NOT NULL,
  `payeeContactInfo` VARCHAR(45) NOT NULL,
  `creationDate` BIGINT(21) NOT NULL,
  `deadlineDate` BIGINT(21) NOT NULL,
  `amount` INT NOT NULL,
  `price` FLOAT NULL,
  `note` TEXT NULL,
  `invalid` INT(1) NOT NULL,
  `reconciled` INT(1) NOT NULL,
  `payeeId` INT NOT NULL,
  `authorId` INT NOT NULL,
  PRIMARY KEY (`woId`),
  UNIQUE INDEX `workAccountSerial_UNIQUE` (`workAccountSerial` ASC),
  INDEX `payees_id_fk_index` (`payeeId` ASC),
  INDEX `users_id_fk_index` (`authorId` ASC),
  CONSTRAINT `payees_id_fk`
    FOREIGN KEY (`payeeId`)
    REFERENCES `ermex_pm`.`epm_payees` (`paId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `users_id_fk`
    FOREIGN KEY (`authorId`)
    REFERENCES `ermex_pm`.`epm_users` (`usId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ermex_pm`.`epm_work_accounts_extra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ermex_pm`.`epm_work_accounts_extra` (
  `woId` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT NOT NULL,
  `workAccountId` INT NOT NULL,
  PRIMARY KEY (`woId`),
  INDEX `work_accounts_fk_index` (`workAccountId` ASC),
  CONSTRAINT `work_accounts_fk`
    FOREIGN KEY (`workAccountId`)
    REFERENCES `ermex_pm`.`epm_work_accounts` (`woId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ermex_pm`.`epm_materials`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ermex_pm`.`epm_materials` (
  `maId` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `description` VARCHAR(255) NOT NULL,
  `amount` INT NOT NULL,
  `enterDate` BIGINT(21) NOT NULL,
  PRIMARY KEY (`maId`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ermex_pm`.`epm_deliveries`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ermex_pm`.`epm_deliveries` (
  `deId` INT NOT NULL AUTO_INCREMENT,
  `deliveryDate` BIGINT(21) NOT NULL,
  `price` FLOAT NOT NULL,
  `note` TEXT NOT NULL,
  `payType` INT(1) NOT NULL,
  `reconciled` INT(1) NULL,
  `invalid` INT(1) NULL,
  `authorId` INT NOT NULL,
  `workAccountId` INT NOT NULL,
  PRIMARY KEY (`deId`),
  INDEX `user_fk_index` (`authorId` ASC),
  INDEX `work_account_fk_index` (`workAccountId` ASC),
  CONSTRAINT `users_fk`
    FOREIGN KEY (`authorId`)
    REFERENCES `ermex_pm`.`epm_users` (`usId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `deliveries_fk`
    FOREIGN KEY (`workAccountId`)
    REFERENCES `ermex_pm`.`epm_work_accounts` (`woId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ermex_pm`.`epm_used_materials`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ermex_pm`.`epm_used_materials` (
  `amount` INT NOT NULL,
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