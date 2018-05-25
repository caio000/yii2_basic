<?php
  use macgyer\yii2materializecss\widgets\form\ActiveForm;
  use macgyer\yii2materializecss\widgets\form\SubmitButton;
?>

<div class="row">
  <?php $form = ActiveForm::begin(['options'=>['class'=>'col s12']]) ?>

  <div class="row">
    <?= $form->field($album,'name',[
      'options'=>[
        'class'=>'input-field col s12 m6'
      ]
    ])?>
    <?= $form->field($album,'imgCover',['options'=>['class'=>'input-field col s12 m6']])->fileInput()?>
  </div>

  <div class="row">
    <?= $form->field($album,'description',[
      'options'=>[
        'class'=>'input-field col s12'
        ]
        ])->textArea()?>
  </div>

  <div class="row">
    <div class="col s12">
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
  </div>

  <?php ActiveForm::end() ?>
</div>
