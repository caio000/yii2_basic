<?php

namespace app\controllers;

use Yii;
use app\models\Albums;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * Classe com as funcionalidades disponíveis para o album.
 * @since 25/05/2018
 */
class AlbumController extends Controller
{

  public $layout = 'MyLayout';

  public function actionIndex()
  {
    // TODO: Criar página para mostrar os albums cadastrados
  }

  public function actionCreate($idArtist)
  {
    if (!Yii::$app->user->can('createAlbum')) return $this->goBack();

    $album = new Albums();

    if ($album->load(Yii::$app->request->post())) {
      $album->idArtist = $idArtist;
      $album->imgCover = UploadedFile::getInstance($album,'imgCover');
      $album->cover = $album->imgCover->name;

      $connection = Yii::$app->db;
      $transation = $connection->beginTransaction();
      try {
        $album->save();
        $path = Yii::getAlias('@webroot/file');
        $path.= '/'.$album->artist->name;
        $path.= '/'.$album->name;
        FileHelper::createDirectory($path,777,true);
        $path.= '/'.$album->cover;

        $album->imgCover->saveAs($path);
        $transation->commit();

        Yii::$app->session->setFlash('success','Album Cadastrado com sucesso');
        return $this->goBack();
      } catch (\Exception $e) {
        $transation->rollback();
        Yii::$app->session->setFlash('danger','Ocorreu um erro<br>'.$e->getMessage());
      }
    }

    return $this->render('create',compact('album'));
  }

  public function actionUpdate()
  {
    // TODO: Criar página para editar dados de um album
  }

  public function actionDelete()
  {
    // TODO: Criar página para deletar um album
  }

}

?>
