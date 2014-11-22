<?php

class m141122_120105_vendor_id extends CDbMigration
{
	public function up()
	{
		$this->addColumn('product_quantity', 'vendor_id', 'int(11)');
	}

	public function down()
	{
		echo "m141122_120105_vendor_id does not support migration down.\n";
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