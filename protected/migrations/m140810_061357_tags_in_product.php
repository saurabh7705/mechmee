<?php

class m140810_061357_tags_in_product extends CDbMigration
{
	public function up()
	{
		$this->addColumn('product', 'tags', 'text');
		Yii::app()->db->createCommand("ALTER TABLE  `category` ADD FULLTEXT (`tags`)")->execute();
	}

	public function down()
	{
		echo "m140810_061357_tags_in_product does not support migration down.\n";
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