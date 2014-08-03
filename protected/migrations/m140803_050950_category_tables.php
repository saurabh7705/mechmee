<?php

class m140803_050950_category_tables extends CDbMigration
{
	public function safeUp() {
		$this->createTable(
			'category',
			array(
				'id'=>'int(11) UNSIGNED NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(255) NOT NULL',
				'type' => 'varchar(255) NOT NULL',
				'created_at' => 'int(11)',
				'updated_at' => 'int(11)',
				'PRIMARY KEY (id)',
			),
			'ENGINE=InnoDB'
		);

		$this->createTable(
			'sub_category',
			array(
				'id'=>'int(11) UNSIGNED NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(255) NOT NULL',
				'category_id' => 'int(11) NOT NULL',
				'is_hot' => 'tinyint(1)',
				'created_at' => 'int(11)',
				'updated_at' => 'int(11)',
				'PRIMARY KEY (id)',
			),
			'ENGINE=InnoDB'
		);

		$this->createTable(
			'product',
			array(
				'id'=>'int(11) UNSIGNED NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(255) NOT NULL',
				'category_id' => 'int(11) NOT NULL',
				'sub_category_id' => 'int(11) NOT NULL',
				'brand' => 'varchar(255)',
				'in_stock' => 'tinyint(1) DEFAULT 0',
				'status' => 'int(11)',
				'created_at' => 'int(11)',
				'updated_at' => 'int(11)',
				'PRIMARY KEY (id)',
			),
			'ENGINE=InnoDB'
		);

		$this->createTable(
			'product_quantity',
			array(
				'id'=>'int(11) UNSIGNED NOT NULL AUTO_INCREMENT',
				'product_id' => 'int(11) NOT NULL',
				'quantity' => 'varchar(255) NOT NULL',
				'price' => 'varchar(255) NOT NULL',
				'vendor' => 'varchar(255)',
				'stock_left'=>'int(11)',
				'status' => 'int(11)',
				'created_at' => 'int(11)',
				'updated_at' => 'int(11)',
				'PRIMARY KEY (id)',
			),
			'ENGINE=InnoDB'
		);

		$conn = Yii::app()->db;
        $conn->createCommand("ALTER TABLE  `category` ADD INDEX (`name`)")->execute();
        $conn->createCommand("ALTER TABLE  `category` ADD INDEX (`type`)")->execute();
        $conn->createCommand("ALTER TABLE  `sub_category` ADD INDEX (`name`)")->execute();
        $conn->createCommand("ALTER TABLE  `sub_category` ADD INDEX (`category_id`)")->execute();
        $conn->createCommand("ALTER TABLE  `sub_category` ADD INDEX (`is_hot`)")->execute();
        $conn->createCommand("ALTER TABLE  `product` ADD INDEX (`name`)")->execute();
        $conn->createCommand("ALTER TABLE  `product` ADD INDEX (`sub_category_id`)")->execute();
        $conn->createCommand("ALTER TABLE  `product` ADD INDEX (`in_stock`)")->execute();
        $conn->createCommand("ALTER TABLE  `product` ADD INDEX (`status`)")->execute();
        $conn->createCommand("ALTER TABLE  `product` ADD INDEX (`brand`)")->execute();
        $conn->createCommand("ALTER TABLE  `product_quantity` ADD INDEX (`product_id`)")->execute();
        $conn->createCommand("ALTER TABLE  `product_quantity` ADD INDEX (`status`)")->execute();

	}

	public function safeDown() {
		$this->dropTable('category');
		$this->dropTable('sub_category');
		$this->dropTable('product');
		$this->dropTable('product_quantity');
	}
}