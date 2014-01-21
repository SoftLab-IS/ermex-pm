<?php

class m140118_150033_add_columns_invalid_to_epm_materials extends CDbMigration
{
	public function up()
	{
        $this->addColumn('epm_materials', 'invalid', 'INT(1) NOT NULL DEFAULT 0 AFTER dimensionUnit');
	}

	public function down()
	{
		$this->dropColumn('epm_materials', 'invalid');
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