<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use yii\console\ExitCode;

/**
 *
 */
class RbacController extends Controller
{

  public function actionInit()
  {
    echo 'Criando regras de permissão......\n';
    $auth = Yii::$app->authManager;

    // Criado os tipos de usuário
    $administrador = $auth->createRole("administrador");
    $supervisor = $auth->createRole('supervisor');
    $operador = $auth->createRole('operador');

    $auth->add($administrador);
    $auth->add($supervisor);
    $auth->add($operador);


    // criando permissões
    $create = $auth->createPermission('createPost');
    $view = $auth->createPermission('indexPost');
    $update = $auth->createPermission('updatePost');
    $delete = $auth->createPermission('deletePost');

    $auth->add($create);
    $auth->add($view);
    $auth->add($update);
    $auth->add($delete);

    // adiciona as permissões aos usuários
    $auth->addChild($administrador,$view);
    $auth->addChild($administrador,$create);
    $auth->addChild($administrador,$update);
    $auth->addChild($administrador,$delete);

    $auth->addChild($supervisor,$view);
    $auth->addChild($supervisor,$create);
    $auth->addChild($supervisor,$update);

    $auth->addChild($operador,$view);

    $auth->assign($administrador,1);

    echo 'Permissoões criadas!\n';
    return ExitCode::OK;
  }
}

?>
