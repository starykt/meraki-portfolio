<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\UserDAO;
use App\Models\Email\EmailSender;
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

  public function recovery()
  {
    Sessao::limpaFormulario();
    Sessao::limpaMensagem();
    Sessao::limpaErro();
    $this->render('/login/recovery');
  }
  
  public function sucess()
  {
    Sessao::limpaFormulario();
    Sessao::limpaMensagem();
    Sessao::limpaErro();
    $this->render('/login/sucess');
  }
  public function error()
  {
    Sessao::limpaFormulario();
    Sessao::limpaMensagem();
    Sessao::limpaErro();
    $this->render('/login/error');
  }
  public function reset()
  {
      try {
          $token = $_GET['token'] ?? null;
          $userDAO= new UserDAO();
          $tokenValido = $userDAO->validateTokenInDatabase($token);

          if (!$tokenValido) {
              throw new \Exception("Token inválido.", 400);
          }

          $this->render('/login/reset');
      } catch (\Exception $e) {
          echo "Erro: " . $e->getMessage();
      }
  }

  public function processResetPassword()
  {
      try {
          $token = $_POST['token'];
          $userDAO = new UserDAO();
          $newPassword = $_POST['newPassword'] ?? null;
          $tokenValido = $userDAO->validateTokenInDatabase($token);
          if (!$tokenValido) {
              throw new \Exception("Token inválido.", 400);
          }
          $userDAO->updatePasswordByToken($token, $newPassword);
          $this->redirect('/login');
      } catch (\Exception $e) {
          echo "Erro: " . $e->getMessage();
      }
    }
  public function processRecovery()
  {
    $usernameOrEmail = $_POST['usernameOrEmail'];

    $userDAO = new UserDAO();
    $user = $userDAO->getUserByEmailOrUsername($usernameOrEmail);

    if ($user) {
      $token = bin2hex(random_bytes(32));
      $userDAO->createToken($user->getIdUser(), $token);
      try {
        require_once __DIR__ . '/../Models/Entidades/EmailSender.php';
        $email = new EmailSender();
        $email->sendRecoveryEmail($user->getEmail(), $token);
        $this->redirect('/login/sucess');
      } catch (\Exception $e) {
        $this->redirect('/login/error');
      }
    } else {
      $this->redirect('/login/error');
    }
  }

  public function validation()
  {
    $identifier = $_POST['email'];
    $password = $_POST['password'];
    Sessao::gravaFormulario($_POST);

    if (empty(trim($identifier)) && empty(trim($password))) {
      Sessao::gravaErro("Faltou digitar usuário e/ou senha!");
      $this->redirect('/login');
      return;
    }

    $userDAO = new UserDAO();

    $idUser = $userDAO->verify($identifier, $password);

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
