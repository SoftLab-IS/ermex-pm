<?php

class m140124_132227_fix_foreign_key_for_deliveries_and_orders extends CDbMigration
{
	public function up()
	{
        $this->execute('ALTER TABLE `epm_order` DROP FOREIGN KEY `fk_epm_order_epm_work_accounts1`;
        ALTER TABLE `epm_order` CHANGE COLUMN `woId` `woId` INT(11) NULL DEFAULT NULL ;
        ALTER TABLE `epm_order` ADD CONSTRAINT `fk_epm_order_epm_work_accounts1` FOREIGN KEY (`woId`) REFERENCES `epm_work_accounts` (`woId`) ON DELETE NO ACTION ON UPDATE NO ACTION;');
	}

	public function down()
	{
		echo "m140124_132227_fix_foreign_key_for_deliveries_and_orders does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}