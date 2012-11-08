<?php

class m121012_134243_project_user_role extends CDbMigration
{

    public function up()
    {
        $this->createTable('tbl_project_user_role',
                           array(
            'project_id' => 'INTEGER NOT NULL',
            'user_id'    => 'INTEGER NOT NULL',
            'role'       => 'VARCHAR(64) NOT NULL, primary key (project_id,user_id,role),'.
            "foreign key (project_id) references tbl_project (id),".
            "foreign key (user_id) references tbl_user (id),".
            "foreign key (role) references AuthItem (name)"));
    }

    public function down()
    {
        $this->dropTable('tbl_project_user_role');
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