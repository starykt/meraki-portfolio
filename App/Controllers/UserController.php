<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Lib\Upload;
use App\Models\DAO\AwardDAO;
use App\Models\DAO\CommentDAO;
use App\Models\DAO\EducationDAO;
use App\Models\DAO\FileDAO;
use App\Models\DAO\HashtagProjectDAO;
use App\Models\DAO\ImageDAO;
use App\Models\DAO\LikeDAO;
use App\Models\DAO\ProjectDAO;
use App\Models\DAO\SaveProjectDAO;
use App\Models\DAO\ToolDAO;
use App\Models\DAO\UserDAO;
use App\Models\DAO\UserToolDAO;
use App\Models\Entidades\Education;
use App\Models\Entidades\User;
use App\Models\Entidades\UserTool;
use Exception;

class UserController extends Controller
{
  public function profile()
  {
    $this->auth();
    
    $userDao = new UserDAO();
    $user = $userDao->getById($_SESSION['idUser']);
    $this->setViewParam('user', $user);
    $likeDAO = new LikeDAO();
    $projectDao = new ProjectDAO();
    $idUser = $_SESSION['idUser'];
    $projectDao = new ProjectDAO();
    $commentDAO = new CommentDAO();
    $saveProjectDAO = new SaveProjectDAO();
    $commentCount = $commentDAO->getCommentCountByUserId($idUser);
    $like = $likeDAO->getLikeCountByUserId($idUser);
    $saveCount = $saveProjectDAO->getSavedProjectsCountByUserId($idUser);
    $educationDAO = new EducationDAO();
    $education = $educationDAO->getByUserId($_SESSION['idUser']);
    $tools = [];
    $userToolDAO = new UserToolDAO();
    $userTools = $userToolDAO->getByUserId($idUser);
    $toolDAO = new ToolDAO();
    foreach ($userTools as $userTool) {
      $toolId = $userTool->getIdTool();
      $tool = $toolDAO->getById($toolId);
      if ($tool) {
        $tools[] = $tool;
      }
    }
    $toolDAO = new ToolDAO();
    $toolsAll = $toolDAO->list();

    $mostLikedProjects = $likeDAO->getUserMostLikedProjects($idUser);
    foreach ($mostLikedProjects as $project) {
      $project->setDetails($projectDao->getById($project->getIdProject()));

      $imageDAO = new ImageDAO();
      $images = $imageDAO->getImagesByProjectId($project->getIdProject());
      $project->setImages($images);

      $fileDAO = new FileDAO();
      $files = $fileDAO->getFilesByProjectId($project->getIdProject());
      $project->setFiles($files);

      $hashtagDAO = new HashtagProjectDAO();
      $hashtags = $hashtagDAO->getByProjectId($project->getIdProject());
      $project->setHashtags($hashtags);

      $likeCount = $likeDAO->getLikeCountByArticleId($project->getIdProject());
      $project->setLikeCount($likeCount);

      $likeStatus = $likeDAO->getLikeStatus($project->getIdProject(), $_SESSION['idUser']);
      $project->setLikeStatus($likeStatus);

      $saveDAO = new SaveProjectDAO();
      $saveStatus = $saveDAO->getSaveStatus($project->getIdProject(), $_SESSION['idUser']);
      $project->setSaveStatus($saveStatus);
      $SaveCount = $saveDAO->getSavedCountByArticleId($project->getIdProject());
      $project->setSaveCount($SaveCount);

      $commentDAO = new CommentDAO();
      $comments = $commentDAO->getCommentsByProjectId($project->getIdProject());
      $project->setComments($comments);

      $commentCount = $commentDAO->getCommentCountByArticleId($project->getIdProject());
      $project->setCommentCount($commentCount);
    }

    $awardDAO = new AwardDAO();
    $userAwards = $awardDAO->getUserAwards($idUser);
    $loggedInUser = $_SESSION['idUser'];
    $userDao = new UserDAO();
    $userLoggedin = $userDao->getById($loggedInUser);
    $this->setViewParam('userLoggedin', $userLoggedin);
    $this->setViewParam('educations', $education);
    $this->setViewParam('userAwards', $userAwards);
    $this->setViewParam('userTools', $tools);
    $this->setViewParam('commentCount', $commentCount);
    $this->setViewParam('like', $like);
    $this->setViewParam('tools', $toolsAll);
    $this->setViewParam('saveCount', $saveCount);
    $this->setViewParam('projects', $mostLikedProjects);
    $this->render('/user/profile');
    Sessao::limpaMensagem();
    Sessao::limpaErro();
  }

  public function profileUsers($params)
  {
    $this->auth();
    $idUser = $params[0];
    $userDao = new UserDAO();
    $user = $userDao->getById($idUser);
    $this->setViewParam('user', $user);
    $likeDAO = new LikeDAO();
    $projectDao = new ProjectDAO();
    $commentDAO = new CommentDAO();
    $saveProjectDAO = new SaveProjectDAO();
    $commentCount = $commentDAO->getCommentCountByUserId($idUser);
    $like = $likeDAO->getLikeCountByUserId($idUser);
    $saveCount = $saveProjectDAO->getSavedProjectsCountByUserId($idUser);
    $educationDAO = new EducationDAO();
    $education = $educationDAO->getByUserId($idUser);
    $tools = [];
    $userToolDAO = new UserToolDAO();
    $userTools = $userToolDAO->getByUserId($idUser);
    $toolDAO = new ToolDAO();
    foreach ($userTools as $userTool) {
      $toolId = $userTool->getIdTool();
      $tool = $toolDAO->getById($toolId);
      if ($tool) {
        $tools[] = $tool;
      }
    }

    $mostLikedProjects = $likeDAO->getUserMostLikedProjects($idUser);
    foreach ($mostLikedProjects as $project) {
      $project->setDetails($projectDao->getById($project->getIdProject()));

      $imageDAO = new ImageDAO();
      $images = $imageDAO->getImagesByProjectId($project->getIdProject());
      $project->setImages($images);

      $fileDAO = new FileDAO();
      $files = $fileDAO->getFilesByProjectId($project->getIdProject());
      $project->setFiles($files);

      $hashtagDAO = new HashtagProjectDAO();
      $hashtags = $hashtagDAO->getByProjectId($project->getIdProject());
      $project->setHashtags($hashtags);

      $likeCount = $likeDAO->getLikeCountByArticleId($project->getIdProject());
      $project->setLikeCount($likeCount);

      $likeStatus = $likeDAO->getLikeStatus($project->getIdProject(), $_SESSION['idUser']);
      $project->setLikeStatus($likeStatus);

      $saveDAO = new SaveProjectDAO();
      $saveStatus = $saveDAO->getSaveStatus($project->getIdProject(), $_SESSION['idUser']);
      $project->setSaveStatus($saveStatus);
      $SaveCount = $saveDAO->getSavedCountByArticleId($project->getIdProject());
      $project->setSaveCount($SaveCount);

      $commentDAO = new CommentDAO();
      $comments = $commentDAO->getCommentsByProjectId($project->getIdProject());
      $project->setComments($comments);

      $commentCount = $commentDAO->getCommentCountByArticleId($project->getIdProject());
      $project->setCommentCount($commentCount);
    }
    $awardDAO = new AwardDAO();
    $userAwards = $awardDAO->getUserAwards($idUser);
    $loggedInUser = $_SESSION['idUser'];
    $userDao = new UserDAO();
    $userLoggedin = $userDao->getById($loggedInUser);
    $this->setViewParam('userLoggedin', $userLoggedin);
    $this->setViewParam('educations', $education);
    $this->setViewParam('userAwards', $userAwards);
    $this->setViewParam('userTools', $tools);
    $this->setViewParam('commentCount', $commentCount);
    $this->setViewParam('like', $like);
    $this->setViewParam('saveCount', $saveCount);
    $this->setViewParam('projects', $mostLikedProjects);
    $this->render('/user/profileUsers');
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

  public function listUsers()
  {
    $this->auth();
    $userDao = new UserDAO();
    $user = $userDao->list();
    $loggedInUser = $_SESSION['idUser'];
    $userDao = new UserDAO();
    $userLoggedin = $userDao->getById($loggedInUser);
    $this->setViewParam('userLoggedin', $userLoggedin);
    $this->setViewParam('users', $user);
    $this->render('/user/listUsers');
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
      $this->render('/user/profile');
    }
    Sessao::limpaMensagem();
    Sessao::limpaErro();
  }

  public function profileEdit()
  {
    $this->auth();
    $userDao = new UserDAO();
    $user = $userDao->getById($_SESSION['idUser']);
    $toolDAO = new ToolDAO();
    $tools = $toolDAO->list();
    $educationDAO = new EducationDAO();
    $education = $educationDAO->getByUserId($_SESSION['idUser']);
    $tools2 = [];
    $userToolDAO = new UserToolDAO();
    $userTools = $userToolDAO->getByUserId($_SESSION['idUser']);

    foreach ($userTools as $userTool) {
      $toolId = $userTool->getIdTool();
      $tool = $toolDAO->getById($toolId);
      if ($tool) {
        $tools2[] = $tool;
      }
    }

    if ($user) {
      $loggedInUser = $_SESSION['idUser'];
      $userDao = new UserDAO();
      $userLoggedin = $userDao->getById($loggedInUser);
      $this->setViewParam('userLoggedin', $userLoggedin);
      $this->setViewParam('educations', $education);
      $this->setViewParam('user', $user);
      $this->setViewParam('tools', $tools);
      $this->setViewParam('userTools', $tools2);
      $this->render('/user/profile');
    } else {
      Sessao::gravaErro("Usuário não encontrado.");
      $this->render('/user/profile');
    }
  }
  public function saveUserToolAssociations($userId)
  {
    $tools = isset($_POST['tools']) && is_array($_POST['tools']) ? $_POST['tools'] : [];

    $userDAO = new UserDAO();
    $user = $userDAO->getById($userId);

    if ($user) {
      $userToolDAO = new UserToolDAO();

      foreach ($tools as $toolId) {
        $userTool = new UserTool();

        $toolDAO = new ToolDAO();
        $tool = $toolDAO->getById($toolId);

        if ($tool) {
          $userTool->setIdUser($user->getIdUser());
          $userTool->setIdTool($tool->getIdTool());

          $userToolDAO->save($userTool);
        }
      }
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
        $this->redirect('/user/profile');
      }
    }
    $user->setResume($_POST['resume']);
    $user->setLocation($_POST['location']);

    $selectedTools = isset($_POST['tools']) ? $_POST['tools'] : [];

    $this->saveUserToolAssociations($idUser);

    try {
      $userDao->edit($user);
      Sessao::gravaMensagem("Informações do usuário atualizadas com sucesso.");
      $this->redirect('/user/profile');
    } catch (\Exception $e) {
      Sessao::gravaErro("Erro ao atualizar as informações do usuário. " . $e->getMessage());
      $this->redirect('/user/profile');
    }
  }

  public function deleteTool()
  {
    $idUser = $_SESSION["idUser"];
    $idTool = $_GET['idTool'];

    $userToolDAO = new UserToolDAO();

    $userToolDAO->deleteByUserId($idUser, $idTool);
    Sessao::gravaMensagem("Ferramenta excluída com sucesso.");

    $this->redirect('/user/profile');
  }

  public function saveEducation()
  {
    $educationDAO = new EducationDAO();
    $existingEducations = $educationDAO->getByUserId($_SESSION["idUser"]);

    if (count($existingEducations) == 3) {
      echo "Você atingiu o limite máximo de 3 educações.";
      return;
    }

    $education = new Education();
    $education->setFormation($_POST["formation"]);
    $education->setIdUser($_SESSION["idUser"]);

    $educationDAO->save($education);

    $this->redirect('/user/profile');
  }



  public function dropEducation($params)
  {
    $education = $params[0];
    $educationDAO = new EducationDAO();
    $educationDAO->drop($education);
    $this->redirect('/user/profile');
  }
  public function userFight() {
    $userDao = new UserDAO();
    $likeDao = new LikeDAO();
    $awardDao = new AwardDAO();

    $loggedInUser = $_SESSION['idUser'];
    $loggedInUserObject = $userDao->getById($loggedInUser);

    // Relatório por Nível
    $topUsersByLevel = $userDao->getUsersByLevel();
    $positionByLevel = $this->getPositionInTopUsers($topUsersByLevel, $loggedInUser);

    // Relatório por Likes
    $topUsersByLikes = $userDao->getUsersByLikes();
    $positionByLikes = $this->getPositionInTopUsers($topUsersByLikes, $loggedInUser);
    $loggedInUserLikes = $likeDao->getLikeCountByUserId($loggedInUser);

    // Relatório por Prêmios
    $topUsersByAwards = $userDao->getUsersByAwards();
    $positionByAwards = $this->getPositionInTopUsers($topUsersByAwards, $loggedInUser);
    $loggedInUserAwards = $awardDao->getAwardCountByUserId($loggedInUser);

    $this->setViewParam('userLoggedin', $loggedInUserObject);

    // Parâmetros para o relatório por Nível
    $this->setViewParam('topUsersByLevel', $topUsersByLevel);
    $this->setViewParam('userPositionByLevel', $positionByLevel);
    $this->setViewParam('loggedInUserLevel', $loggedInUserObject->getLevel());

    // Parâmetros para o relatório por Likes
    $this->setViewParam('topUsersByLikes', $topUsersByLikes);
    $this->setViewParam('userPositionByLikes', $positionByLikes);
    $this->setViewParam('loggedInUserLikes', $loggedInUserLikes);

    // Parâmetros para o relatório por Prêmios
    $this->setViewParam('topUsersByAwards', $topUsersByAwards);
    $this->setViewParam('userPositionByAwards', $positionByAwards);
    $this->setViewParam('loggedInUserAwards', $loggedInUserAwards);

    // Configurar variáveis de visualização para cada posição e posição do usuário logado
    for ($i = 0; $i < min(count($topUsersByLevel), 3); $i++) {
        $this->setViewParam("positionByLevel_$i", $i + 1);
    }
    
    if (!$positionByLevel || $positionByLevel > 3) {
        $this->setViewParam('userPositionByLevel', $positionByLevel);
    }

    for ($i = 0; $i < min(count($topUsersByLikes), 3); $i++) {
        $this->setViewParam("positionByLikes_$i", $i + 1);
    }
    
    if (!$positionByLikes || $positionByLikes > 3) {
        $this->setViewParam('userPositionByLikes', $positionByLikes);
    }

    for ($i = 0; $i < min(count($topUsersByAwards), 3); $i++) {
        $this->setViewParam("positionByAwards_$i", $i + 1);
    }
    
    if (!$positionByAwards || $positionByAwards > 3) {
        $this->setViewParam('userPositionByAwards', $positionByAwards);
    }

    $this->render('/user/userFight');
}


private function getPositionInTopUsers($topUsers, $loggedInUser)
{
  foreach ($topUsers as $index => $user) {
      if ($user->getIdUser() === $loggedInUser) {
          return $index + 1;
      }
  }
  return null;
}
  
}
