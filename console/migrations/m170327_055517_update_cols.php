<?php

use yii\db\Migration;

class m170327_055517_update_cols extends Migration
{
    public function safeUp()
    {
      $this->addColumn('user', 'firstname', $this->string(70)->after('id'));
      $this->addColumn('user', 'middlename', $this->string(70)->after('firstname'));
      $this->addColumn('user', 'lastname', $this->string(70)->after('middlename'));
    }

    public function safeDown()
    {
        echo "m170327_055517_update_cols cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
