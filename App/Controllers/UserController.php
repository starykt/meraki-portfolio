<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Lib\Upload;
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



  public function profileEdit()
  {
    $this->auth();
    $userDao = new UserDAO();
    $user = $userDao->getById($_SESSION['idUser']);

    if ($user) {
      $this->setViewParam('user', $user);
      $this->render('/user/profileEdit');
    } else {
      Sessao::gravaErro("Usuário não encontrado.");
      $this->redirect('/user/profile');
    }
  }
  public function update()
  {
      $this->auth();
  
      $idUser = $_SESSION['idUser'];
      $userDao = new UserDAO();
      $user = $userDao->getById($idUser);
      if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
          $objUpload = new Upload($_FILES['avatar']);
          $objUpload->setName('avatar-id' . $idUser);
          $dir = 'public/images/users';
          $success = $objUpload->upload($dir);
  
          if ($success) {
              if (!empty($user->getAvatar()) && file_exists($user->getAvatar())) {
                  unlink($user->getAvatar());
              }
              $user->setAvatar($objUpload->getBasename());
              $userDao->updateAvatar($idUser, $user->getAvatar());
              Sessao::gravaMensagem("Avatar atualizado com sucesso.");
          } else {
              Sessao::gravaErro("Erro ao enviar o novo avatar.");
              $this->redirect('/user/profileEdit');
          }
      }
      $user->setNickname($_POST['nickname']);
      $user->setEmail($_POST['email']);
      $user->setResume($_POST['resume']);
      $user->setLocation($_POST['location']);
  
      try {
          $userDao->edit($user);
          Sessao::gravaMensagem("Informações do usuário atualizadas com sucesso.");
          $this->redirect('/user/profile');
      } catch (\Exception $e) {
          Sessao::gravaErro("Erro ao atualizar as informações do usuário. " . $e->getMessage());
          $this->redirect('/user/profileEdit');
      }
  }

}  
