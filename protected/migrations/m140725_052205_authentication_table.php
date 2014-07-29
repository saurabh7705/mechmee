<?php

class m140725_052205_authentication_table extends CDbMigration
{
	public function safeUp() {
		$this->createTable(
			'authentication',
			array(
				'id'=>'int(11) UNSIGNED NOT NULL AUTO_INCREMENT',
				'user_id' => 'int(11) NOT NULL',
				'provider' => 'varchar(255)',
				'uid' => 'varchar(255)',
				'email'=>'varchar(255)',
				'created_at' => 'int(11)',
				'updated_at' => 'int(11)',
				'PRIMARY KEY (id)',
			),
			'ENGINE=InnoDB'
		);
	}

	public function safeDown() {
		$this->dropTable('authentication');
	}
}