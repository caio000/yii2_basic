<?php
use yii\helpers\Html;
use app\assets\MyAsset;
use app\widgets\MyAlert;
use yii\helpers\Url;

MyAsset::register($this);
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
      <nav class="grey darken-4">
        <div class="nav-wrapper">
          <a href="#!" class="brand-logo"><i class="material-icons">cloud</i>Logo</a>
          <ul class="right hide-on-med-and-down">
            <li><a href="<?= Url::toRoute('usuario/cadastrar') ?>"><i class="material-icons">person_add</i></a></li>
            <li><a href="<?= Url::toRoute('usuario/index') ?>"><i class="material-icons">people</i></a></li>
          </ul>
        </div>
      </nav>
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
