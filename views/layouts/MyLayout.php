<?php
use yii\helpers\Html;
use app\assets\MyAsset;
use app\widgets\MyAlert;
use yii\helpers\Url;
use macgyer\yii2materializecss\widgets\navigation\NavBar;
use macgyer\yii2materializecss\widgets\navigation\Nav;

MyAsset::register($this);
$name = '';
if (!Yii::$app->user->isGuest) {
  $name = Yii::$app->user->identity->nome;
  $name.= ' ';
  $name.= Yii::$app->user->identity->sobrenome;
}
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
  <meta charset="<?= Yii::$app->charset ?>"/>
  <?= Html::csrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
</head>
  <body>
    <?php $this->beginBody() ?>

    <header>
      <?php
      NavBar::begin(['brandLabel' => '<i class="material-icons">cloud</i>Logo','options'=>['class'=>'grey darken-4'],'brandOptions'=>['class'=>'left']]);
      echo Nav::widget([
        'renderSideNav'=>false,
        'options'=>[
          'class'=>'right hide-on-med-and-down'
        ],
        'items' => [
          ['label' => '<i class="material-icons">people</i>', 'url' => ['usuario/index'],'options'=>['title'=>'Visualizar Usuários']],
          ['label' => '<i class="material-icons">person_add</i>', 'url' => ['usuario/cadastrar'],'options'=>['title'=>'Cadastrar Usuário']],
          ['label' => ucwords($name),'items'=>[
            ['label'=>'Sair','url'=>['usuario/sair']]
          ],'visible'=> !Yii::$app->user->isGuest],
        ],'encodeLabels'=>false,
      ]);
      NavBar::end();
      ?>
    </header>

    <main>
      <?= MyAlert::widget() ?>
      <?= $content ?>
    </main>

    <footer class="page-footer grey darken-4">
      <div class="container">
        <div class="row">
          <div class="col l6 s12">
            <h5 class="white-text">Footer Content</h5>
            <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
          </div>
          <div class="col l4 offset-l2 s12">
            <h5 class="white-text">Links</h5>
            <ul>
              <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
              <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
              <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
              <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
          © 2014 Copyright Text
          <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
        </div>
      </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
