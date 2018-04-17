<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
/**
 *
 */
class MyAlert extends Widget
{

  public $alertTypes = [
      'error'   => 'red',
      'danger'  => 'red',
      'success' => 'green accent-3',
      'info'    => 'light-blue accent-2',
      'warning' => 'yellow darken-1'
  ];


  public function run()
  {

    // pega todos os dados do flash session
    $flash = Yii::$app->session->getAllFlashes();

    foreach ($flash as $key => $value) {
      $color = $this->alertTypes[$key];
      $message = $value;
      return $this->render('myAlert',compact('color','message'));
    }

  }
}


?>
