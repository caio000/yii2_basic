<?php

use yii\db\Migration;

/**
 * Class m180417_131649_create_produtos
 */
class m180417_131649_create_produtos extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->createTable('produtos',[
        'id' => $this->primaryKey(),
        'categoria_id' => $this->integer()->notNUll(),
        'data_cadastro' => $this->dateTime()->notNull(),
        'nome'=> $this->string(60),
        'descricao' => $this->text(),
        'valor' => $this->decimal(10,2)->notNull(),
        'status' => $this->smallInteger(1)->defaultValue(1),
      ]);

      // criação da chave estrangeira
      $this->addForeignKey('fk_produtos_caregorias','produtos','categoria_id','categorias','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180417_131649_create_produtos cannot be reverted.\n";

        $this->dropForeignKey('fk_produtos_categorias');
        $this->dropTable('produtos');

        return false;
    }
}
