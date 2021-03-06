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

  protected $auth;

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

  public function actionRevokeAllRoles(int $userId)
  {
    $auth = Yii::$app->authManager;
    $auth->revokeAll($userId);
    print('__________________________________________________________________');
  }

  public function actionCreatePermission(string $permissionName, array $roles)
  {

    $this->auth = Yii::$app->authManager;

    // Cria a nova permissão
    $permission = $this->auth->createPermission($permissionName);
    $this->auth->add($permission);

    // aplica a permissão para todos os tipos de usuários
    foreach ($roles as $role) {
      $role = $this->auth->getRole($role);
      $this->auth->addChild($role,$permission);
    }

    return ExitCode::OK;
  }
}

?>
