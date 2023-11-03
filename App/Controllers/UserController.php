<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\UserDAO;
use App\Models\Entidades\User;
use Exception;

class UserController extends Controller
{
    public function profile()
    {
        $this->auth();
        $userDao = new UserDAO();
        $user = $userDao->getById($_SESSION['idUser']);

        if ($user) {
            $this->setViewParam('user', $user);
            $this->render('/user/profile');
        } else {
            Sessao::gravaErro("Usuário não encontrado.");
            $this->redirect('/home');
        }
    }

}
