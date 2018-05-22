<?php

namespace app\models;

use Yii;
use yii\base\Model;

class MyFormLogin extends Model {
  public $email;
  public $senha;
  public $isValid = true;

  private $_usuario;

  /**
   * Definições de regras do formulário de login
   * @author Caio de Freitas Adriano
   * @since 22/05/2018
   * @return void
   */
  public function rules () {
    return [
      [['email','senha'],'required']
    ];
  }

  public function login () {
    if ($this->validate()) {
	  // busca os dados do usuário pelo email
	  $usuario = Usuarios::findByEmail($this->email);

	  // verifica se a senha está correta
	  if (Yii::$app->getSecurity()->validatePassword($this->senha,$usuario->senha)){
      $this->isValid = true;
	    return Yii::$app->user->login($usuario,0);
	  }
	}
    $this->isValid = false;
    return false;
  }

  public function getUsuario () {
	return $this->_usuario;
  }
}
