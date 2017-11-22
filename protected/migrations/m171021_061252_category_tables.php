<?php

class m171021_061252_category_tables extends CDbMigration
{
	public function safeUp() {
		$this->createTable(
			'category',
			array(
				'id'=>'int(11) UNSIGNED NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(255) NOT NULL',
				'status' => 'TINYINT(1)',
				'created_at' => 'int(11)',
				'updated_at' => 'int(11)',
				'PRIMARY KEY (id)',
			),
			'ENGINE=InnoDB'
		);

		$this->createTable(
			'course',
			array(
				'id'=>'int(11) UNSIGNED NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(255) NOT NULL',
				'category_id' => 'int(11) NOT NULL',
				'status' => 'TINYINT(1)',
				'created_at' => 'int(11)',
				'updated_at' => 'int(11)',
				'PRIMARY KEY (id)',
			),
			'ENGINE=InnoDB'
		);

		$this->createTable(
			'sub_course',
			array(
				'id'=>'int(11) UNSIGNED NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(255) NOT NULL',
				'course_id' => 'int(11) NOT NULL',
				'status' => 'TINYINT(1)',
				'created_at' => 'int(11)',
				'updated_at' => 'int(11)',
				'PRIMARY KEY (id)',
			),
			'ENGINE=InnoDB'
		);

		$this->createTable(
			'city',
			array(
				'id'=>'int(11) UNSIGNED NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(255) NOT NULL',
				'created_at' => 'int(11)',
				'updated_at' => 'int(11)',
				'PRIMARY KEY (id)',
			),
			'ENGINE=InnoDB'
		);

		$this->createTable(
			'news',
			array(
				'id'=>'int(11) UNSIGNED NOT NULL AUTO_INCREMENT',
				'title' => 'text',
				'description' => 'text',
				'file_name' => 'varchar(255)',
				'extension' => 'varchar(255)',
				'created_at' => 'int(11)',
				'updated_at' => 'int(11)',
				'PRIMARY KEY (id)',
			),
			'ENGINE=InnoDB'
		);

		$this->createTable(
			'college',
			array(
				'id'=>'int(11) UNSIGNED NOT NULL AUTO_INCREMENT',
				'name' => 'text',
				'description' => 'text',
				"city_id" => "int(11) NOT NULL",
				"sub_course_id" => "int(11) NOT NULL",
				'established_year' => 'int(11)',
				'location' => 'varchar(255)',
				'rating' => "int(11)",
				'file_name' => 'varchar(255)',
				'extension' => 'varchar(255)',
				'created_at' => 'int(11)',
				'updated_at' => 'int(11)',
				'PRIMARY KEY (id)',
			),
			'ENGINE=InnoDB'
		);
	}

	public function safeDown() {
		$this->dropTable('category');
		$this->dropTable('course');
		$this->dropTable('sub_course');
		$this->dropTable('news');
		$this->dropTable('city');
		$this->dropTable('college');
	}
}
