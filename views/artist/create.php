<?php
  use macgyer\yii2materializecss\widgets\form\ActiveForm;
  use macgyer\yii2materializecss\widgets\form\SubmitButton;
?>

<div class="row">
  <div class="col m12">
    <h4>Cadastrar artista</h4>
  </div>
</div>

<div class="row">
  <?php $form = ActiveForm::begin(['options'=>['class'=>'col m12']]) ?>

  <div class="row">
    <?= $form->field($artist,'name',['options'=>['class'=>'input-field col s12']]) ?>
  </div>

  <div class="row">
    <?= $form->field($artist,'description',['options'=>['class'=>'input-field col s12']])->textarea() ?>
  </div>

  <div class="row">
    <?= SubmitButton::widget(['label'=>'Cadastrar','options'=>['class'=>'right grey darken-1']]) ?>
  </div>

  <?php ActiveForm::end() ?>
</div>
