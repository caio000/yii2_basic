<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Usuario;

/**
 *
 */
class UsuarioController extends Controller
{

  public $layout = 'MyLayout';
  public $defaultAction = 'index';

  public function actionIndex()
  {

    $usuario = new Usuario();

    if ($usuario->load(Yii::$app->request->post()) && $usuario->validate()) {
      $usuario->senha = Yii::$app->getSecurity()->generatePasswordHash($usuario->senha);
      $usuario->save();
    }

    return $this->render('teste',compact('usuario'));
  }

}


?>
