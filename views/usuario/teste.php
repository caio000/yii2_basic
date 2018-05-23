<?php
  use macgyer\yii2materializecss\widgets\form\ActiveForm;
  use macgyer\yii2materializecss\widgets\form\SubmitButton;
  use macgyer\yii2materializecss\widgets\form\Select;
?>

<div class="row">
  <?php $form = ActiveForm::begin(['options'=>['class'=>'col s12']]);  ?>

  <div class="row">
    <?= $form->field($usuario,'nome',['options'=>['class'=>'input-field col s6']]) ?>
    <?= $form->field($usuario,'sobrenome',['options'=>['class'=>'input-field col s6']]) ?>
  </div>

  <div class="row">
    <?= $form->field($usuario,'email',['options'=>['class'=>'input-field col s12']]) ?>
  </div>

  <div class="row">
    <?= $form->field($usuario,'senha',['options'=>['class'=>'input-field col s12']])->passwordInput() ?>
  </div>

  <div class="row">
    <?= $form->field($usuario,'tipo',['options'=>['class'=>'input-field col s12']])->dropDownList([
      'administrador'=>'Administrador',
      'supervisor'=>'Supervisor',
      'operador' => 'Operador'
    ],['options'=>[$usuario->getTipo() =>['selected'=>'selected']]]) ?>
  </div>

  <div class="row">
    <?= SubmitButton::widget(['label'=>$btnLabel,'options'=>['class'=>'red']]) ?>
  </div>

  <?php ActiveForm::end() ?>
</div>
