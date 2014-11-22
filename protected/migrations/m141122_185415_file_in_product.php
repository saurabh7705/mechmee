<?php

class m141122_185415_file_in_product extends CDbMigration
{
	public function up()
	{
		$this->addColumn('product', 'file_name', 'varchar(255)');
		$this->addColumn('product', 'extension', 'varchar(255)');
	}

	public function down()
	{
		echo "m141122_185415_file_in_product does not support migration down.\n";
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