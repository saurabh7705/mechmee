<?php

class m141122_110331_vendor extends CDbMigration
{
	public function up()
	{
		$this->createTable(
			'vendor',
			array(
				'id'=>'int(11) UNSIGNED NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(255) NOT NULL',
				'address_id' => 'int(11)',
				'does_deliver'=>'tinyint(1)',
				'status'=>'tinyint(1)',
				'email'=>'varchar(255)',
				'phone'=>'varchar(255)',
				'created_at' => 'int(11)',
				'updated_at' => 'int(11)',
				'PRIMARY KEY (id)',
			),
			'ENGINE=InnoDB'
		);

		$this->createTable(
			'address',
			array(
				'id'=>'int(11) UNSIGNED NOT NULL AUTO_INCREMENT',
				'street' => 'varchar(255)',
				'locality' => 'varchar(255)',
				'city' => 'varchar(255)',
				'state' => 'varchar(255)',
				'country' => 'varchar(255)',
				'pincode' => 'varchar(255)',
				'created_at' => 'int(11)',
				'updated_at' => 'int(11)',
				'PRIMARY KEY (id)',
			),
			'ENGINE=InnoDB'
		);
	}

	public function down()
	{
		echo "m141122_110331_vendor does not support migration down.\n";
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