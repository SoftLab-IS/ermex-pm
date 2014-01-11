<?php

class m140111_185637_change_default_for_delivery_place_and_pay_type extends CDbMigration
{
    public function up()
    {
        $this->alterColumn('epm_deliveries', 'payType', 'tinyint(1) NOT NULL DEFAULT 1');
        $this->alterColumn('epm_deliveries', 'deliveryPlace', 'tinyint(1) DEFAULT 1');
    }

    public function down()
    {
        $this->alterColumn('epm_deliveries', 'payType', 'tinyint(1) NOT NULL DEFAULT 0');
        $this->alterColumn('epm_deliveries', 'deliveryPlace', 'tinyint(1) DEFAULT 3');
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