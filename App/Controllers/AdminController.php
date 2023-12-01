<?php

namespace App\Controllers;

use App\Models\DAO\UserDAO;
use App\Models\DAO\CategoryDAO;
use App\Lib\Sessao;
use App\Models\DAO\CommentDAO;
use App\Models\DAO\FileDAO;
use App\Models\DAO\HashtagProjectDAO;
use App\Models\DAO\ImageDAO;
use App\Models\DAO\LikeDAO;
use App\Models\DAO\NotificationDAO;
use App\Models\DAO\ProjectDAO;
use App\Models\DAO\ReportDAO;
use App\Models\Entidades\Notification;
use App\Models\Entidades\User;

class AdminController extends Controller
{
  public function index()
  {
    $this->auth();
    $loggedInUser = $_SESSION['idUser'];
    $userDao = new UserDAO();
    $userLoggedin = $userDao->getById($loggedInUser);
    $this->setViewParam('userLoggedin', $userLoggedin);
    $userDao = new UserDAO();
    $user = $userDao->list();
    $this->setViewParam('users', $user);
    $this->render('/admin/index');
    Sessao::limpaMensagem();
    Sessao::limpaErro();
  }

  public function ban($params)
  {
    $loggedInUser = $_SESSION['idUser'];
    $userDao = new UserDAO();
    $userLoggedin = $userDao->getById($loggedInUser);
    $this->setViewParam('userLoggedin', $userLoggedin);
    $userDao = new UserDAO();
    $userId = $params[0];
    $user = $userDao->getById($userId);
    $user->setStatus('banned');
    $userDao->updateStatus($userId, $user->getStatus());
    $this->redirect('/admin/index');
  }

  public function listReports()
  {
    $this->auth();
    $loggedInUser = $_SESSION['idUser'];
    $userDao = new UserDAO();
    $userLoggedin = $userDao->getById($loggedInUser);
    $this->setViewParam('userLoggedin', $userLoggedin);
    $reportDAO = new ReportDAO();
    $reports = $reportDAO->getAllReportsWithProjects();
    $userDAO = new UserDAO();
    $reportsToDisplay = [];

    foreach ($reports as $report) {
      $project = $report->getIdProject();

      $imageDAO = new ImageDAO();
      $images = $imageDAO->getImagesByProjectId($project->getIdProject());
      $project->setImages($images);

      $fileDAO = new FileDAO();
      $files = $fileDAO->getFilesByProjectId($project->getIdProject());
      $project->setFiles($files);

      $hashtagDAO = new HashtagProjectDAO();
      $hashtags = $hashtagDAO->getByProjectId($project->getIdProject());
      $project->setHashtags($hashtags);

      $likeDAO = new LikeDAO();
      $likeCount = $likeDAO->getLikeCountByArticleId($project->getIdProject());
      $project->setLikeCount($likeCount);

      $likeStatus = $likeDAO->getLikeStatus($project->getIdProject(), $_SESSION['idUser']);
      $project->setLikeStatus($likeStatus);

      $commentDAO = new CommentDAO();
      $comments = $commentDAO->getCommentsByProjectId($project->getIdProject());
      $project->setComments($comments);

      $reportsToDisplay[] = [
        'report' => $report,
        'project' => $project,
        'images' => $images,
        'files' => $files,
        'hashtags' => $hashtags,
      ];
    }

    self::setViewParam('reportsWithProjects', $reportsToDisplay);
    self::setViewParam('user', $userDAO->getById($_SESSION['idUser']));

    $this->render('/admin/listReports');

    Sessao::limpaMensagem();
    Sessao::limpaErro();
  }

  public function deleteProject($params)
  {
    $this->auth();
    $projectId = $params[0];
    $userXP = new User();
    $loggedInUser = $_SESSION['idUser'];
    $userDao = new UserDAO();
    $userLoggedin = $userDao->getById($loggedInUser);
    $this->setViewParam('userLoggedin', $userLoggedin);
    $projectDAO = new ProjectDAO();
    $project = $projectDAO->getById($projectId);
    try {

      $notification = new Notification();
      $notification->setNotification('Your project has been deleted as it does not comply with community guidelines.');
      $user = new User();
      $user->setIdUser($project->getUser()->getIdUser());
      $notification->setUser($user);
      $notificationDAO = new NotificationDAO();
      $notificationDAO->save($notification);

      $projectDAO->drop($projectId);
      $userXP->updateXPAndLevel($project->getUser()->getIdUser(), -25);
      Sessao::gravaMensagem("Projeto removido com sucesso.");
    } catch (\Exception $e) {
      Sessao::gravaMensagem("Erro ao remover o projeto: " . $e->getMessage());
    }

    $this->redirect('/admin/listReports');
  }

  public function deleteReport($params)
  {
    $loggedInUser = $_SESSION['idUser'];
    $userDao = new UserDAO();
    $userLoggedin = $userDao->getById($loggedInUser);
    $this->setViewParam('userLoggedin', $userLoggedin);
    $this->auth();
    $reportDAO = new ReportDAO();
    $idReport = $params[0];
    $reportDAO->drop($idReport);

    $this->redirect('/admin/listReports');
  }
}
