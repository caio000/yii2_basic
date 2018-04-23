<?php

use yii\helpers\Url;

?>

<div class="row">
  <div class="col s12">
    <table>
      <thead>
        <th>Nome</th>
        <th>Sobrenome</th>
        <th>E-mail</th>
        <th></th>
      </thead>
      <tbody>
        <?php foreach ($usuarios as $usuario): ?>
          <tr>
            <td><?= ucwords($usuario->nome) ?></td>
            <td><?= ucwords($usuario->sobrenome) ?></td>
            <td><?= $usuario->email ?></td>
            <td><a href="<?= Url::to('usuario/editar',['id'=>$usuario->id]) ?>"><i class="material-icons">edit</i></a></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
