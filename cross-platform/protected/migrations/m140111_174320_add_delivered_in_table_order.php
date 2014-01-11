<?php

class m140111_174320_add_delivered_in_table_order extends CDbMigration
{
    public function up()
    {
        $this->addColumn('epm_order', 'delivered', 'tinyint(1) NOT NULL DEFAULT 0 AFTER done');
    }

    public function down()
    {
        $this->dropColumn('epm_order', 'delivered');
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