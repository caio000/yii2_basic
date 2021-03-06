<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Musics;
use app\models\Albums;
use yii\web\UploadedFile;
use yii\helpers\Url;

/**
 *
 */
class MusicController extends Controller
{

  public $layout = 'MyLayout';

  ##############################################################################

  public function actionIndex($idAlbum = null)
  {
    if (!Yii::$app->user->can('viewMusics')) return $this->goBack();

    $album = Albums::findOne($idAlbum);
    $music = Musics::findOne(3);

    return $this->render('index',compact('album','music'));
  }

  public function actionCreate($idAlbum)
  {
    if (!Yii::$app->user->can('createMusic')) return $this->goBack();

    $music = new Musics;

    if ($music->load(Yii::$app->request->post())) {
      $music->musicFile = UploadedFile::getInstance($music, 'musicFile');
      $music->filename = $music->musicFile->name;
      $music->idAlbum = $idAlbum;

      $connection = Yii::$app->db;
      $transaction = $connection->beginTransaction();

      try {
        $music->save();

        $path = Yii::getAlias('@webroot/file');
        $path.= '/'.$music->album->artist->name;
        $path.= '/'.$music->album->name;
        $path.= '/'.$music->filename;

        $music->musicFile->saveAs($path);
        $transaction->commit();
        Yii::$app->session->setFlash('success','Música cadastrada com sucesso');
        return $this->goBack();
      } catch (\Exception $e) {
        $transaction->rollback();
        Yii::$app->session->setFlash('danger','Ocorreu um erro<br>'.$e->getMessage());
      }

    }

    return $this->render('create',compact('music'));

    // TODO: Fazer o upload de uma nova musica
  }

  public function actionMusics_from_album($idAlbum)
  {
    $album = Albums::findOne($idAlbum);
    $musics = [];

    foreach ($album->musics as $key => $music) {
      $temp = [
        'name'    => $music->name,
        'artist'  => $music->album->artist->name,
        'album'   => $music->album->name,
        'url'     => Url::to('@web/file/'.$album->artist->name.'/'.$album->name.'/'.$music->filename),
        'cover_art_url' => Url::to('@web/file/'.$album->artist->name.'/'.$album->name.'/'.$album->cover),
      ];

      array_push($musics, $temp);
    }
    echo json_encode($musics);
  }

}


?>
