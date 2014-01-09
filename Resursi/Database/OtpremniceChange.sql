ALTER TABLE `ermex`.`epm_order` 
DROP FOREIGN KEY `fk_epm_order_epm_work_accounts1`;
ALTER TABLE `ermex`.`epm_order` 
CHANGE COLUMN `woId` `woId` INT(11) NULL DEFAULT NULL ;
ALTER TABLE `ermex`.`epm_order` 
ADD CONSTRAINT `fk_epm_order_epm_work_accounts1`
  FOREIGN KEY (`woId`)
  REFERENCES `ermex`.`epm_work_accounts` (`woId`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;