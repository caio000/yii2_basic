<div class="col <?= $card->options['size']?>">
  <div class="card <?= $card->options['class']?>">
    <div class="card-image">
      <img src="<?= $card->image?>">
    </div>
    <div class="card-content">
      <span class="card-title"><?= $card->title?></span>
      <p>
        <?= $card->description?>
      </p>
    </div>
    <div class="card-action">
      <a href="<?= $card->action['url']?>"><?= $card->action['text']?></a>
    </div>
  </div>
</div>
