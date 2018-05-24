<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
/**
 *
 */
class Artist extends ActiveRecord
{

  public function behaviors()
  {
    return [
      'timestamp' => [
        'class' => TimestampBehavior::className(),
        'createdAtAttribute' => 'create_at',
        'updatedAtAttribute' => 'update_at',
        'value' => new Expression('NOW()'),
      ],
    ];
  }

  public function attributeLabels()
  {
    return [
      'name'=>'Nome do Artista',
      'description'=>'Descrição'
    ];
  }

  public function rules()
  {
    return [
      ['name','required'],
      ['name','string','max'=>100],
      ['description','string']
    ];
  }
}

?>
