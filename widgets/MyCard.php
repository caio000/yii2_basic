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

  public $action = [];

  public function init()
  {
    parent::init();
    $this->options['size'] = $this->options['size'] ?? 's12';
    $this->options['class'] = $this->options['class'] ?? '';
    $this->action['url'] = $this->action['url'] ?? '#';
    $this->action['text'] = $this->action['text'] ?? '';
  }

  public function run()
  {
    return $this->render('myCard',['card'=>$this]);
  }
}

?>
