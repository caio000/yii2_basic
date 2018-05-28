<?php

namespace app\widgets;

use yii\base\Widget;

/**
 *
 */
class MyCard extends Widget
{
  public $options = [];

  public $image;

  public $title;

  public $description;

  public function init()
  {
    parent::init();
    $this->options['size'] = $this->options['size'] ?? 's12';
  }

  public function run()
  {
    return $this->render('myCard',['card'=>$this]);
  }
}

?>
