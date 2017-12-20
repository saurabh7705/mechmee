<?php

class m171218_184554_contact_table extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable(
			'contact',
			array(
				'id'=>'int(11) UNSIGNED NOT NULL AUTO_INCREMENT',			
				'name' => 'varchar(255)',
				'email' => 'varchar(255)',
				'mobile' => 'varchar(255)',
				'course_id' => 'int(11)',
				'city_id' => 'int(11)',
				'created_at' => 'int(11)',
				'updated_at' => 'int(11)',
				'PRIMARY KEY (id)',
			),
			'ENGINE=InnoDB'
		);		
	}

	public function safeDown()
	{
		$this->dropTable('contact');
	}
}