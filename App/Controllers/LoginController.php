<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\UserDAO;
use App\Models\Entidades\User;

class LoginController extends Controller
{

  public function index()
  {
    $this->render('/login/index');
    Sessao::limpaFormulario();
    Sessao::limpaMensagem();
    Sessao::limpaErro();
  }

  public function register()
  {

    $this->render('/login/register');
    Sessao::limpaFormulario();
    Sessao::limpaMensagem();
    Sessao::limpaErro();
  }

  public function save()
  {

    if (empty($_POST['nickname']) || empty($_POST['email']) || empty($_POST['password'])) {
      Sessao::gravaErro("Por favor, preencha todos os campos obrigatórios.");
      $this->redirect('/login/register');
      return;
    }

    $userDao = new UserDAO();
    $existingUser = $userDao->getByEmail($_POST['email']);

    if ($existingUser) {
      Sessao::gravaErro("O email informado já está em uso.");
      $this->redirect('/login/register');
      return;
    }
    if ($_POST['password'] !== $_POST['password_confirm']) {
      Sessao::gravaErro("As senhas informadas não coincidem.");
      $this->redirect('/login/register');
      return;
    }

    $user = new User();
    $user->setNickname($_POST['nickname']);
    $user->setEmail($_POST['email']);
    $user->setPassword($_POST['password']);
    $user->setCreatedAt(new \DateTime());
    $userDao = new UserDAO();
    $userId = $userDao->save($user);

    $randomImage = $this->setRandomAvatar($userDao, $userId);

    if ($randomImage) {
      $user->setAvatar($randomImage);
    } else {
      Sessao::gravaErro("Nenhuma imagem encontrada para o avatar.");
      $this->redirect('/login/register');
      return;
    }

    Sessao::limpaFormulario();
    Sessao::limpaMensagem();
    Sessao::limpaErro();

    $this->redirect('/login/index');
  }

  public function setRandomAvatar(UserDAO $userDao, $userId)
  {
      $dir = 'public/images/users';
      $allowedImages = [
          'cat.jpg', 'cogumelomario.jpg', 'cuphead.jpg', 'cupeahed2.jpg',
          'enderman.jpg', 'mortalkombat.jpg', 'pacman.jpg', 'pikachu.jpg',
          'psyduck.jpg', 'sonic2.jpg', 'thewitcher.jpg', 'undertale.jpg',
          'zelda.jpg', 'amongus.jpg'
      ];
  
      $randomImage = $allowedImages[array_rand($allowedImages)];
  
      $filePath = $dir . '/' . $randomImage;
  
      if (file_exists($filePath)) {
          $userDao->updateAvatar($userId, $randomImage);
          return $randomImage;
      } else {
          return false;
      }
  }
  

  public function logout()
  {
    Sessao::limpaFormulario();
    Sessao::limpaMensagem();
    Sessao::limpaErro();

    $_SESSION["loggedin"] = false;
    unset($_SESSION['idUser']);

    $this->redirect('/login');
  }

  public function validation()
  {

    $email = $_POST['email'];
    $password = $_POST['password'];
    Sessao::gravaFormulario($_POST);

    if (empty(trim($email)) && empty(trim($password))) {
      Sessao::gravaErro("Faltou digitar usuário e/ou senha!");
      $this->redirect('/login');
      return;
    }

    $userDAO = new UserDAO();

    $idUser = $userDAO->verify($email, $password);

    if ($idUser == 0) {
      Sessao::gravaErro("Usuário ou senha incorretos. Tente novamente!");
      $this->redirect('/login');
      return;
    }

    Sessao::gravaLogin($idUser);

    Sessao::limpaFormulario();
    Sessao::limpaErro();
    Sessao::limpaMensagem();
    $this->redirect('/project/index');
  }
}
