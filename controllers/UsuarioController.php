<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Usuarios;
use app\models\MyFormLogin;
use yii\filters\AccessControl;

/**
 *
 */
class UsuarioController extends Controller
{

  public $layout = 'MyLayout';
  public $defaultAction = 'index';

  ##############################################################################
  public function behaviors()
  {
    return [
      'access' => [
        'class' => AccessControl::className(),
        'only'=> ['login','index','registrate','update','logout'],
        'rules' => [
          [
            'allow' => true,
            'actions'=> ['login'],
            'roles' => ['?']
          ],
          [
            'allow'   => true,
            'actions' => ['index','registrate','update','logout'],
            'roles'   => ['@']
          ]
        ],
      ]
    ];
  }
  ##############################################################################

  public function actionIndex()
  {
    $usuarios = new Usuarios();
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
      $usuario = Usuarios::findOne($id);
      $successMessage = "Dados atualizados com sucesso!";
      $dangerMessage = "Ocorreu um erro ao atualizar os dados<br>Tente novamente mais tarde!";
      $btnLabel = 'Editar';
    } else {
      $usuario = new Usuarios();
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

  public function actionLogin()
  {
    if (!Yii::$app->user->isGuest) return $this->goHome();

    $modal = new MyFormLogin();

    if ($modal->load(Yii::$app->request->post()) && $modal->login()) {
      return $this->goHome();
    } else {
      if (!$modal->isValid) Yii::$app->session->setFlash('danger','Email ou senha incorretos');
      return $this->render('login',compact('modal'));
    }
  }

  public function actionLogout()
  {
    Yii::$app->user->logout();
    $this->goHome();
  }

}


?>
