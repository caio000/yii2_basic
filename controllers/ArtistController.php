<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use app\models\Artist;

/**
 *
 */
class ArtistController extends Controller
{
  public $layout = 'MyLayout';

  ##############################################################################
  public function behaviors()
  {
    return [
      'access' => [
        'class' => AccessControl::className(),
        'only'=> ['index','create','update'],
        'rules' => [
          [
            'allow'   => true,
            'actions' => ['index','create','update'],
            'roles'   => ['@']
          ]
        ],
      ]
    ];
  }
  ##############################################################################

  public function actionIndex()
  {
    if (!Yii::$app->user->can('viewArtist')) $this->goBack();

    $artists = Artist::find()->all();

    return $this->render('index',compact('artists'));
  }

  public function actionCreate()
  {
    if (!Yii::$app->user->can('createArtist')) $this->goBack();

    $artist = new Artist();

    if ($artist->load(Yii::$app->request->post()) && $artist->validate()) {
      $connection = Yii::$app->db;
      $transaction = $connection->beginTransaction();

      try {
        $artist->save();
        $transaction->commit();

        Yii::$app->session->setFlash('success','Artista cadastrado com sucesso');
        return $this->goBack();
      } catch (\Exception $e) {
        Yii::$app->session->setFlash('success','Ocorreu um erro<br>'.$e->getMessage());
        $transaction->rollback();
      }

    }

    return $this->render('create',compact('artist'));
  }

  public function actionUpdate()
  {
    // TODO: Criar tela para editar os dados do artista
  }

  public function actionDetele()
  {
    // TODO: criar tela para deletar um artista
  }
}

?>
