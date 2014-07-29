<?php

class m140725_053937_api_token_table extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable(
			'api_token',
			array(
				'id'=>'int(11) UNSIGNED NOT NULL AUTO_INCREMENT',			
				'user_id' => 'int(11)',
				'token' => 'varchar(255)',
				'status' => 'tinyint(1)',
				'device_id' => 'varchar(255)',
				'device_type' => 'varchar(255)',
				'created_at' => 'int(11)',
				'updated_at' => 'int(11)',
				'PRIMARY KEY (id)',
			),
			'ENGINE=InnoDB'
		);		
	}

	public function safeDown()
	{
		$this->dropTable('api_token');
	}
}