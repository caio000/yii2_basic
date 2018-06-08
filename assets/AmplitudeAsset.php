<?php

namespace app\assets;

use yii\web\AssetBundle;
/**
 *
 */
class AmplitudeAsset extends AssetBundle
{

  public $sourcePath = '@app/node_modules';

  public $js = [

    'amplitudejs/dist/amplitude.js',
  ];

  public $depends = [
    'app\assets\MyAsset',
  ];
}


?>
