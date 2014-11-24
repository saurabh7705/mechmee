<?php

class m141124_165655_file_in_category extends CDbMigration
{
	public function up()
	{
		$this->addColumn('category', 'file_name', 'varchar(255)');
		$this->addColumn('category', 'extension', 'varchar(255)');
	}

	public function down()
	{
		echo "m141124_165655_file_in_category does not support migration down.\n";
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