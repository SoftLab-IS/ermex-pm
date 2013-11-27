-- -----------------------------------------------------
-- Table `epm_users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `epm_users` (
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
-- Table `epm_config`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `epm_config` (
  `coId` INT NOT NULL AUTO_INCREMENT,
  `workAccountIncrement` INT NOT NULL DEFAULT 0,
  `lastSystemLoginId` INT NOT NULL DEFAULT 0,
  PRIMARY KEY (`coId`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `epm_payees`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `epm_payees` (
  `paId` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `contactInfo` TEXT NOT NULL,
  PRIMARY KEY (`paId`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `epm_work_accounts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `epm_work_accounts` (
  `woId` INT NOT NULL AUTO_INCREMENT,
  `workAccountSerial` VARCHAR(90) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT NOT NULL,
  `payeeName` VARCHAR(45) NOT NULL,
  `payeeContactPerson` VARCHAR(45) NOT NULL,
  `payeeContactInfo` TEXT NOT NULL,
  `creationDate` BIGINT(21) NOT NULL,
  `deadlineDate` BIGINT(21) NOT NULL,
  `amount` INT NOT NULL,
  `price` FLOAT NULL,
  `note` TEXT NULL,
  `additional` TEXT NULL,
  `invalid` INT(1) NOT NULL,
  `reconciled` INT(1) NOT NULL,
  `payeeId` INT NULL,
  `authorId` INT NOT NULL,
  `reconciledId` INT NULL,
  PRIMARY KEY (`woId`),
  UNIQUE INDEX `workAccountSerial_UNIQUE` (`workAccountSerial` ASC),
  INDEX `payees_id_fk_index` (`payeeId` ASC),
  INDEX `users_id_fk_index` (`authorId` ASC),
  INDEX `users_reconcield_id_fk_index` (`reconciledId` ASC),
  CONSTRAINT `payees_id_fk`
    FOREIGN KEY (`payeeId`)
    REFERENCES `epm_payees` (`paId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `users_id_fk`
    FOREIGN KEY (`authorId`)
    REFERENCES `epm_users` (`usId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `users_reconcield_id_fk`
    FOREIGN KEY (`reconciledId`)
    REFERENCES `epm_users` (`usId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `epm_materials`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `epm_materials` (
  `maId` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT NOT NULL,
  `amount` FLOAT NOT NULL,
  `enterDate` BIGINT(21) NOT NULL,
  `dimensionUnit` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`maId`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `epm_deliveries`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `epm_deliveries` (
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
    REFERENCES `epm_users` (`usId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `deliveries_fk`
    FOREIGN KEY (`workAccountId`)
    REFERENCES `epm_work_accounts` (`woId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `epm_used_materials`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `epm_used_materials` (
  `amount` INT NOT NULL,
  `materialId` INT NOT NULL,
  `workAccountId` INT NOT NULL,
  INDEX `materials_fk_index` (`materialId` ASC),
  INDEX `work_accounts_fk_index` (`workAccountId` ASC),
  CONSTRAINT `materials_fk2`
    FOREIGN KEY (`materialId`)
    REFERENCES `epm_materials` (`maId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `work_accounts_fk2`
    FOREIGN KEY (`workAccountId`)
    REFERENCES `epm_work_accounts` (`woId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `epm_workers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `epm_workers` (
  `woId` INT NOT NULL AUTO_INCREMENT,
  `workAccountId` INT NOT NULL,
  `userId` INT NOT NULL,
  `assignDate` BIGINT(21) NOT NULL,
  `dueDate` BIGINT(21) NULL,
  `role` VARCHAR(255) NOT NULL,
  `done` INT(1) NOT NULL DEFAULT 0,
  `position` INT NOT NULL,
  PRIMARY KEY (`woId`),
  INDEX `work_account_id_fk_index` (`workAccountId` ASC),
  INDEX `users_id_fk_index` (`userId` ASC),
  CONSTRAINT `work_accounts_fk_1`
    FOREIGN KEY (`workAccountId`)
    REFERENCES `epm_work_accounts` (`woId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `users_fk_1`
    FOREIGN KEY (`userId`)
    REFERENCES `epm_users` (`usId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;