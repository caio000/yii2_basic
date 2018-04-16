<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 *
 */
class Usuario extends ActiveRecord
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
