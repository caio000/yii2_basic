<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Albums;
/**
 *
 */
class Musics extends ActiveRecord
{

  public $musicFile;

  ##############################################################################

  public function rules()
  {
    return [
      [['name','musicFile'],'required'],
      ['name','string','max'=>100],
      ['musicFile','file','extensions'=>'mp3'],
    ];
  }

  public function attributeLabels()
  {
    return [
      'name'=>'Nome da música',
      'musicFile'=>'Música',
    ];
  }

  public function getAlbum()
  {
    return $this->hasOne(Albums::className(),['id'=>'idAlbum']);
  }

}

?>
