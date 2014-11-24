<?php

class m141123_122509_user_more_col extends CDbMigration
{
	public function up()
	{
		$this->addColumn('user', 'lat', 'varchar(255)');
		$this->addColumn('user', 'long', 'varchar(255)');
		$this->addColumn('vendor', 'lat', 'varchar(255)');
		$this->addColumn('vendor', 'long', 'varchar(255)');
		$this->addColumn('user', 'is_guest', 'tinyint(1)');
	}

	public function down()
	{
		echo "m141123_122509_user_more_col does not support migration down.\n";
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