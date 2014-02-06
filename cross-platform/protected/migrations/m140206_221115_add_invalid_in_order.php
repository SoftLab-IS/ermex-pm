<?php

class m140206_221115_add_invalid_in_order extends CDbMigration
{
    public function up()
    {
        $this->addColumn('epm_order', 'invalid', 'INT(1) NOT NULL DEFAULT 0 AFTER delivered');
    }

    public function down()
    {
        $this->dropColumn('epm_order', 'invalid');
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