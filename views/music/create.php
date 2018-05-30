<?php
  use macgyer\yii2materializecss\widgets\form\ActiveForm;
  use macgyer\yii2materializecss\widgets\form\SubmitButton;
?>

<div class="row">
  <div class="col s12">
    <h4>Nova Musica</h4>
  </div>
</div>

<div class="row">
  <?php $form = ActiveForm::begin(['options'=>['class'=>'col s12']]) ?>

  <div class="row">
    <?= $form->field($music,'name',['options'=>['class'=>'input-field col s12 m6']])?>
    <?= $form->field($music,'musicFile',['options'=>['class'=>'input-field col s12 m6'],'inputOptions'=>['accept'=>'.mp3']])->fileInput()?>
  </div>

  <div class="row">
    <?= SubmitButton::widget([
      'label'=>'Salvar',
      'icon'=>[
        'name'=>'save'
      ],
      'options'=>[
        'class'=>'right'
      ]
    ])?>
  </div>

  <?php ActiveForm::end() ?>
</div>
