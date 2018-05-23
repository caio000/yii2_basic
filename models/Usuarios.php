<?php

namespace app\models;

use Yii;
use yii\db\Expression;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\behaviors\TimestampBehavior;

/**
 *
 */
class Usuarios extends ActiveRecord implements IdentityInterface
{

  public $tipo;

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
      [['nome','sobrenome','email','senha','tipo'],'required'],
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

  public function getTipo()
  {
    $auth = Yii::$app->authManager;
    foreach ($auth->getAssignments($this->id) as $role)
      return $role->roleName;
  }
}


?>
