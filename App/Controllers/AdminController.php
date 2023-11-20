<?php

namespace App\Controllers;

use App\Models\DAO\UserDAO;
use App\Models\DAO\CategoryDAO;
use App\Lib\Sessao;

class AdminController extends Controller
{
  public function index()
  {
    $this->auth();

    $userDao = new UserDAO();
    $user = $userDao->list();
    $this->setViewParam('users', $user);
    $this->render('/admin/index');
    Sessao::limpaMensagem();
    Sessao::limpaErro();
  }

  public function ban($params)
  {
    $userDao = new UserDAO();
    $userId = $params[0];
    $user = $userDao->getById($userId);
    $user->setStatus('banned');
    $userDao->updateStatus($userId, $user->getStatus());
    $this->redirect('/admin/index');
  }
}
