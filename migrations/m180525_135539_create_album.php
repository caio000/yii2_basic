<?php

use yii\db\Migration;

/**
 * Class m180525_135539_create_album
 */
class m180525_135539_create_album extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->createTable('Albums',[
        'id'=>$this->primaryKey(),
        'idArtist'=>$this->integer()->notNull(),
        'name'=>$this->string(80)->notNull(),
        'description'=>$this->text(),
        'cover'=>$this->string(255),
        'create_at'=>$this->dateTime()->notNull(),
        'update_at'=>$this->dateTime(),
        'delete_at'=>$this->dateTime(),
      ]);

      $this->addForeignKey('fk_album_artist','Albums','idArtist','Artist','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180525_135539_create_album cannot be reverted.\n";
        $this->dropForeignKey('fk_album_artist','Albums');
        $this->dropTable('Albums');
        return false;
    }

}
