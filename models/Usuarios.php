<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 *
 */
class Usuarios extends ActiveRecord
{

  public function rules()
  {
    return [
      [['nome','sobrenome','email','senha'],'required'],
      ['email','email'],
    ];
  }

}


?>
