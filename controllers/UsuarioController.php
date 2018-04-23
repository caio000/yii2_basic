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
    $usuarios = new Usuario();
    $usuarios = $usuarios->find()->all();
    return $this->render('index',compact('usuarios'));
  }

  public function actionUpdate($id)
  {
    echo "teste";
  }

  public function actionCadastrar()
  {

    $usuario = new Usuario();

    if ($usuario->load(Yii::$app->request->post()) && $usuario->validate()) {

      try {
        $usuario->senha = Yii::$app->getSecurity()->generatePasswordHash($usuario->senha);
        $usuario->save();
        Yii::$app->session->setFlash('success','Usuário cadastrado com sucesso!');
      } catch (\Exception $e) {
        Yii::$app->session->setFlash('danger','Ocorreu um erro ao cadastrar o usuário!');
      }
    }

    return $this->render('teste',compact('usuario'));
  }

}


?>
