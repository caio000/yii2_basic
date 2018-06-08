<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 *
 */
class MusicPlayerAsset extends AssetBundle
{
  public $basePath = '@webroot';
  public $baseUrl = '@web';

  public $js = [
    'js/player.js'
  ];

  public $depends = [
    'app\assets\AmplitudeAsset',
  ];
}


?>
