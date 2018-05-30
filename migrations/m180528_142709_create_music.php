<?php

use yii\db\Migration;

/**
 * Class m180528_142709_create_music
 */
class m180528_142709_create_music extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->createTable('Musics',[
        'id'        => $this->primaryKey(),
        'idAlbum'   => $this->integer()->notNull(),
        'name'      => $this->string(100)->notNull(),
        'filename'  => $this->string(200)->notNull(),
        'create_at' => $this->dateTime()->notNull(),
        'update_at' => $this->dateTime(),
        'delete_at' => $this->dateTime(),
      ]);

      $this->addForeignKey('fk_music_album','Musics','idAlbum','Albums','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180528_142709_create_music cannot be reverted.\n";
        $this->dropForeignKey('fk_music_album','Musics');
        $this->dropTable('Musics');
        return false;
    }

}
