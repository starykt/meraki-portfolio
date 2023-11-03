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
        Sessao::limpaMensagem();
        Sessao::limpaErro();

   
    }
    public function delete()
{
    $this->auth();
    $this->render('/user/delete');
    Sessao::limpaMensagem();
    Sessao::limpaErro();
}


    public function deleteConfirm()
{
    $this->auth();
    $password = $_POST['password']; 
    $userDao = new UserDAO();
    $user = $userDao->getById($_SESSION['idUser']);

    if ($user && password_verify($password, $user->getPassword())) {
        $userDao->drop($_SESSION['idUser']);
        Sessao::gravaMensagem("Usuário excluído com sucesso.");
        $this->redirect('/home');
    } else {
        Sessao::gravaErro("Senha incorreta. Usuário não excluído.");
        $this->redirect('/user/profile');
    }
    Sessao::limpaMensagem();
    Sessao::limpaErro();
}


}
