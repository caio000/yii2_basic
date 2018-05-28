<?php
  use app\widgets\MyCard;
?>

<div class="row">
  <div class="col s12">
    <h3>Albums</h3>
  </div>
</div>

<div class="row">
    <?php foreach ($albums as $key => $album): ?>
      <?= MyCard::widget([
        'image'=>Yii::getAlias('@web').'\\file\\'.$album->artist->name.'\\'.$album->name.'\\'.$album->cover,
        'title'=> $album->artist->name.' - '.$album->name,
        'description'=>$album->description,
        'options'=>[
          'size'=>'s12 m4',
          'class'=>'grey darken-3 hoverable',
        ],
      ]);?>
    <?php endforeach; ?>
</div>
