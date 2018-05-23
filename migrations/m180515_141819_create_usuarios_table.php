<?php

use yii\db\Migration;

/**
 * Handles the creation of table `usuarios`.
 */
class m180515_141819_create_usuarios_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('usuarios', [
            'id' => $this->primaryKey(),
            'nome' => $this->string(50)->notNull(),
            'sobrenome'=> $this->string(100)->notNull(),
            'email' => $this->string(255)->notNull()->unique(),
            'senha' => $this->string(255)->notNull(),
            'create_at' => $this->dateTime()->notNull(),
            'update_at' => $this->dateTime()->notNull()
        ]);

        $this->insert('usuarios',[
          'nome' => 'caio',
          'sobrenome'=>'de freitas adriano',
          'email'=>'caiof.adriano@hotmail.com',
          'senha' => Yii::$app->getSecurity()->generatePasswordHash('admin123'),
          'create_at' => date('Y-m-d h:i:s')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('usuarios');
    }
}
