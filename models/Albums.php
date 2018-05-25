<?php

namespace app\models;

use yii\db\Expression;
use app\models\Artist;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * Classe que representa a relação Albums no banco de dados
 * @since 25/05/2018
 */
class Albums extends ActiveRecord
{

  public $imgCover;

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

  public function rules()
  {
    return [
      ['name','required'],
      ['imgCover','file','extensions'=>'jpg, png'],
      ['description','string'],
    ];
  }

  public function attributeLabels()
  {
    return [
      'name'=>'nome',
      'description'=>'descrição',
      'cover'=>'capa',
      'imgCover'=>'Capa do album',
    ];
  }

  public function getArtist()
  {
    return $this->hasOne(Artist::className(),['id'=>'idArtist']);
  }

}

?>
