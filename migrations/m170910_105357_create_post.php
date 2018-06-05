<?php

use yii\db\Migration;

class m170910_105357_create_post extends Migration
{
    public function safeUp()
    {
        $this->createTable('post', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(),
            'description'=>$this->text(),
            'user_id'=>$this->integer(),
        ]);

    }

    public function safeDown()
    {
        echo "m170910_105357_create_post cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170910_105357_create_post cannot be reverted.\n";

        return false;
    }
    */
}
