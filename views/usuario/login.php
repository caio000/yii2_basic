<?php
  use macgyer\yii2materializecss\widgets\form\ActiveForm;
  use macgyer\yii2materializecss\widgets\form\SubmitButton;
?>

<div class="row">
  <?php $form = ActiveForm::begin(['options'=>['class'=>'col s6 offset-s3']]);  ?>

  <div class="row">
    <?= $form->field($modal,'email',['options'=>['class'=>'input-field col s12']]) ?>
  </div>

  <div class="row">
    <?= $form->field($modal,'senha',['options'=>['class'=>'input-field col s12']])->passwordInput() ?>
  </div>

  <div class="row">
    <?= SubmitButton::widget(['label'=>'Entrar','options'=>['class'=>'red right']]) ?>
  </div>

  <?php ActiveForm::end() ?>
</div>
