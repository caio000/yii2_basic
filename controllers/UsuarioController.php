<?php

namespace app\controllers;

use yii\web\Controller;
/**
 *
 */
class UsuarioController extends Controller
{

  public $layout = 'MyLayout';
  public $defaultAction = 'index';

  public function actionIndex()
  {
    return $this->render('teste');
  }

}


?>
