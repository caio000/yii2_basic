<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 *
 */
class Usuarios extends ActiveRecord implements IdentityInterface
{

  public function rules()
  {
    return [
      [['nome','sobrenome','email','senha'],'required'],
      ['email','email'],
    ];
  }

  public static function findIdentity($id)
  {
    return static::findOne($id);
  }

  public function getAuthKey()
  {
    return $this->auth_key;
  }

  public static function findIdentityByAccessToken($token, $type = null)
  {
    return static::findOne(['access_token' => $token]);
  }

  public function validateAuthKey($authKey)
  {
    return $this->getAuthKey() === $authKey;
  }

  public function getId()
  {
    return $this->getPrimaryKey();
  }
	
  public function findByEmail ($email) {
    return static::findOne(['email'=>$email]);
  }
}


?>
