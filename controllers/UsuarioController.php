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
    return $this->actionRegistrate($id);
  }

  public function actionRegistrate($id = NULL)
  {

    if ($id) {
      $usuario = Usuario::findOne($id);
      $successMessage = "Dados atualizados com sucesso!";
      $dangerMessage = "Ocorreu um erro ao atualizar os dados<br>Tente novamente mais tarde!";
      $btnLabel = 'Editar';
    } else {
      $usuario = new Usuario();
      $successMessage = "Usuário cadastrado com sucesso!";
      $dangerMessage = "Ocorreu um erro ao cadastrar o usuário<br>Tente novamente mais tarde!";
      $btnLabel = 'Cadastrar';
    }

    if ($usuario->load(Yii::$app->request->post()) && $usuario->validate()) {

      try {
        $usuario->senha = Yii::$app->getSecurity()->generatePasswordHash($usuario->senha);
        $usuario->save();
        Yii::$app->session->setFlash('success',$successMessage);
      } catch (\Exception $e) {
        Yii::$app->session->setFlash('danger',$dangerMessage);
      }
    }

    return $this->render('teste',compact('usuario','btnLabel'));
  }

}


?>
