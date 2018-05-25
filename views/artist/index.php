<?php
use yii\helpers\Url;
use macgyer\yii2materializecss\widgets\Button;
?>

<div class="row">
  <div class="col s12">
    <h4>
      Artistas
      <?= Button::widget([
        'label'=>'Novo',
        'tagName'=>'a',
        'options'=>[
          'href'=>Url::toRoute(['artista/cadastrar']),
          'class'=>'right red',
        ],
        'icon'=>[
          'name'=>'add'
        ]
      ]); ?>
    </h4>
  </div>
</div>

<div class="row">
  <div class="col s12">
    <table class="highlight responsive-table">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Descrição</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($artists as $key => $artist): ?>
          <tr>
            <td><?= $artist->name?></td>
            <td><?= $artist->description?></td>
            <td>
              <?= Button::widget([
                'tagName'=>'a',
                'label'=>null,
                'icon'=>[
                  'name'=>'album'
                ],
                'options'=>[
                  'title'=>'Cadastrar Album',
                  'href'=>Url::toRoute(['album/create','idArtist'=>$artist->id]),
                  'class'=>'black waves-effect waves-teal'
                ],
                'type'=>'floating'
              ])?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
