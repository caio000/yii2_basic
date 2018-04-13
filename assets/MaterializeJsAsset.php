<?php

namespace app\assets;
use yii\web\AssetBundle;
/**
 *
 */
class MaterializeJsAsset extends AssetBundle
{

  public $sourcePath = '@bower/materialize/dist';

  public $js = [
    'js/materialize.min.js'
  ];

   public $depends = [
     'yii\web\YiiAsset',
     'macgyer\yii2materializecss\assets\MaterializeAsset',
   ];
}


?>
