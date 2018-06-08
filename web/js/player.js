var playPauseIcons = function () {
  var element = $(".amplitude-play-pause");
  // pega o valor do icone atual
  var icon = element.text();

  // verifica se o icone é de pausar
  // caso seja, o icone será alterado para o icone de play
  // caso contrario será alterado para o icone de pause
  if (icon === 'pause') {
    element.text('play_arrow');
  } else {
    element.text('pause');
  }
}

var initPlayer = function () {
  // pega a url da página
  var url = window.location.href.split('/');
  var album = url[url.length -1];

  $.ajax({
    type:'GET',
    dataType: 'JSON',
    url:'http://localhost:8080/musics/from/album/' + album,
    success: function (data) {
      Amplitude.init({
        'debug': true,
        'songs': data,
      });
    }
  });
}

$(document).ready(function () {
  $('#btnPlayPause').on('click',playPauseIcons);
  initPlayer();
});
