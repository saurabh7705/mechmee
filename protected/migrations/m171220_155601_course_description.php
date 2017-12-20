<?php

class m171220_155601_course_description extends CDbMigration
{
	public function up()
	{
		$this->addColumn('course', 'description', 'text');
		$this->addColumn('course', 'file_name', 'varchar(255)');
		$this->addColumn('course', 'extension', 'varchar(255)');
	}

	public function down()
	{
		echo "m171220_155601_course_description does not support migration down.\n";
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