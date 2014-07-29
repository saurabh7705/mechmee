<?php

class m140719_061144_user_table extends CDbMigration
{
	public function safeUp() {
		$this->createTable(
			'user',
			array(
				'id'=>'int(11) UNSIGNED NOT NULL AUTO_INCREMENT',
				'email' => 'varchar(255) NOT NULL',
				'password' => 'varchar(255)',
				'username' => 'varchar(255)',
				'status' => 'TINYINT(1)',
				'superuser' => 'TINYINT(1) DEFAULT 0',
				'access_level' => 'int(11) DEFAULT 1',
				'created_at' => 'int(11)',
				'updated_at' => 'int(11)',
				'PRIMARY KEY (id)',
			),
			'ENGINE=InnoDB'
		);
	}

	public function safeDown() {
		$this->dropTable('user');
	}
}