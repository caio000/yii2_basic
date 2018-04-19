<?php

use yii\db\Migration;

/**
 * Class m180417_130318_create_categoria
 */
class m180417_130318_create_categoria extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->createTable('categorias',[
        'id'  => $this->primaryKey(),
        'nome'  => $this->string(60)->notNull(),
        'data_cadastro' => $this->dateTime()->notNull()
      ]);

      $this->insert('categorias',[
        'nome'=>'eletronicos',
      ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180417_130318_create_categoria cannot be reverted.\n";
        $this->dropTable('categorias');
        return false;
    }
}
