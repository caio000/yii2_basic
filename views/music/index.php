<?php
  use app\widgets\MyCard;
?>


<div class="row">
  <div class="col s12">
    <h4><?= $album->name?></h4>
  </div>
</div>

<div class="row">
  <?php foreach ($album->musics as $key => $music): ?>
    <?= MyCard::widget([
      'title' => ucwords($music->name),
      'image'=> Yii::getAlias('@web').'\\file\\'.$music->album->artist->name.'\\'.$music->album->name.'\\'.$music->album->cover,
      'options'=>[
        'size'=>'s12 m2',
        'class'=>'grey darken-3 hoverable'
      ],
      'action'=>[
        'text'=>'Tocar'
      ]
    ]) ?>
  <?php endforeach; ?>
</div>
