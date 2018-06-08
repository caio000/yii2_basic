<?php
  use app\widgets\MyCard;
  use app\Assets\MusicPlayerAsset;

  MusicPlayerAsset::register($this);
?>


<div class="row">
  <div class="col s12">
    <h4><?= $album->name?></h4>
  </div>
</div>

<div class="row">
  <div class="col s12 m4">
    <div class="card">
      <div class="card-image">
        <img amplitude-song-info="cover_art_url" amplitude-main-song-info="true">
        <span class="card-title" amplitude-song-info="name" amplitude-main-song-info="true"></span>
      </div>
      <div class="card-content">

      </div>
      <div class="card-action">
        <a id="btnPlayPause" class="btn-floating btn-large waves-effect waves-light red"><i class="button amplitude-play-pause material-icons" amplitude-main-play-pause="true">play_arrow</i></a>
        <a id="btnNextMusic" class="btn-floating waves-effect waves-light red"><i class="amplitude-next material-icons">skip_next</i></a>
      </div>
    </div>
  </div>
</div>
