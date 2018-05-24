<?php

use yii\db\Migration;

/**
 * Class m180524_173209_create_artist
 */
class m180524_173209_create_artist extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->createTable('Artist',[
        'id'          => $this->primaryKey(),
        'name'        => $this->string(100)->notNull(),
        'description' => $this->text(),
        'create_at'   => $this->dateTime()->notNull(),
        'update_at'   => $this->dateTime()->notNull(),
      ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180524_173209_create_artist cannot be reverted.\n";

        $this->dropTable('Artist');

        return false;
    }
}
