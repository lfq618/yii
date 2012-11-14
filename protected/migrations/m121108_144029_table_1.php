<?php

class m121108_144029_table_1 extends CDbMigration
{
	public function up()
	{
		  $this->createTable('tbl_table1', array(
                  'id' => 'pk',
                  'title' => 'VARCHAR(200) NOT NULL',
                  'content' => 'text',
            ));
	}

	public function down()
	{
		echo "m121108_144029_table_1 does not support migration down.\n";
		return false;
	}
}