<?php

namespace App\Controllers;

use App\Lib\FileUpload;
use App\Lib\Sessao;
use App\Lib\Upload;
use App\Models\DAO\CommentDAO;
use App\Models\DAO\FileDAO;
use App\Models\DAO\HashtagDAO;
use App\Models\DAO\HashtagProjectDAO;
use App\Models\DAO\ImageDAO;
use App\Models\DAO\LikeDAO;
use App\Models\DAO\NotificationDAO;
use App\Models\DAO\ProjectDAO;
use App\Models\DAO\ReportDAO;
use App\Models\DAO\SaveProjectDAO;
use App\Models\DAO\ToolDAO;
use App\Models\DAO\UserDAO;
use App\Models\Entidades\Comment;
use App\Models\Entidades\File;
use App\Models\Entidades\HashtagProject;
use App\Models\Entidades\Image;
use App\Models\Entidades\Notification;
use App\Models\Entidades\Project;
use App\Models\Entidades\Report;
use App\Models\Entidades\User;

class ProjectController extends Controller
{
  public function index()
  {
    $this->auth();
    $projectDAO = new ProjectDAO();
    $projects = $projectDAO->list();
    $likeDAO = new LikeDAO();
    $userDAO = new UserDAO();
    $commentDAO = new CommentDAO();

    foreach ($projects as $project) {
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



      $likeCount = $likeDAO->getLikeCountByArticleId($project->getIdProject());
      $project->setLikeCount($likeCount);

      $likeStatus = $likeDAO->getLikeStatus($project->getIdProject(), $_SESSION['idUser']);
      $project->setLikeStatus($likeStatus);

      $comments = $commentDAO->getCommentsByProjectId($project->getIdProject());
      $project->setComments($comments);
    }


    self::setViewParam('listProject', $projects);
    self::setViewParam('user', $userDAO->getById($_SESSION['idUser']));

    $this->render('/project/feed');

    Sessao::limpaMensagem();
    Sessao::limpaErro();
  }


  public function list()
  {
    $this->auth();
    $saveProjectDAO = new ProjectDAO();
    $savedProjects = $saveProjectDAO->list();
    $userDAO = new UserDAO();
    $projectDAO = new ProjectDAO();
    $projectsToDisplay = [];

    foreach ($savedProjects as $savedProject) {
      $idProject = $savedProject->getIdProject();
      $project = $projectDAO->getById($idProject);

      $imageDAO = new ImageDAO();
      $images = $imageDAO->getImagesByProjectId($idProject);
      $project->setImages($images);

      $fileDAO = new FileDAO();
      $files = $fileDAO->getFilesByProjectId($idProject);
      $project->setFiles($files);

      $hashtagDAO = new HashtagProjectDAO();
      $hashtags = $hashtagDAO->getByProjectId($idProject);
      $project->setHashtags($hashtags);

      $likeDAO = new LikeDAO();
      $likeCount = $likeDAO->getLikeCountByArticleId($idProject);
      $project->setLikeCount($likeCount);

      $likeStatus = $likeDAO->getLikeStatus($idProject, $_SESSION['idUser']);
      $project->setLikeStatus($likeStatus);

      $saveDAO = new SaveProjectDAO();
      $saveStatus = $saveDAO->getSaveStatus($idProject, $_SESSION['idUser']);
      $project->setSaveStatus($saveStatus);

      $SaveCount = $saveDAO->getSavedCountByArticleId($idProject);
      $project->setSaveCount($SaveCount);

      $commentDAO = new CommentDAO();
      $comments = $commentDAO->getCommentsByProjectId($idProject);
      $project->setComments($comments);

      $commentCount = $commentDAO->getCommentCountByArticleId($project->getIdProject());
      $project->setCommentCount($commentCount);


      $projectsToDisplay[] = $project;
    }

    self::setViewParam('listProject', $projectsToDisplay);
    self::setViewParam('user', $userDAO->getById($_SESSION['idUser']));

    $this->render('/project/list');

    Sessao::limpaMensagem();
    Sessao::limpaErro();
  }


  public function alter()
  {
    $this->auth();
    $urlParts = explode('/', $_GET['url']);
    $projectId = (int) end($urlParts);

    $projectDAO = new ProjectDAO();
    $project = $projectDAO->getById($projectId);

    $imageDAO = new ImageDAO();
    $fileDAO = new FileDAO();
    $hashtagDAO = new HashtagProjectDAO();
    $hashtagDAO2 = new HashtagDAO();

    $images = $imageDAO->getImagesByProjectId($project->getIdProject());
    $project->setImages($images);

    $files = $fileDAO->getFilesByProjectId($project->getIdProject());
    $project->setFiles($files);

    $hashtags = $hashtagDAO->getByProjectId($project->getIdProject());
    $project->setHashtags($hashtags);

    $allHashtags = $hashtagDAO2->list();

    self::setViewParam('project', $project);
    self::setViewParam('listHashtag', $allHashtags);
    $this->render('/project/alter');

    Sessao::limpaMensagem();
    Sessao::limpaErro();
  }


  public function update()
  {
    $this->auth();

    try {
      Sessao::gravaFormulario($_POST);

      $projectId = $_POST['id'];
      $title = $_POST['title'];
      $description = nl2br($_POST['description']);

      $project = new Project();
      $project->setIdProject($projectId);
      $project->setTitle($title);
      $project->setDescription($description);

      $projectDAO = new ProjectDAO();
      $projectDAO->alter($projectId, $title, $description);

      $this->handleImageUploads($projectId);
      $this->handleFileUploads($projectId);
      $this->saveHashtagProjectAssociations($projectId);

      Sessao::gravaMensagem("Projeto atualizado com sucesso.");
    } catch (\Exception $e) {
      Sessao::gravaMensagem("Erro ao atualizar o projeto: " . $e->getMessage());
    }
    $this->redirect('/project');
  }

  public function register()
  {
    $this->auth();
    $hashtagDAO = new HashtagDAO();
    $hashtag = $hashtagDAO->list();
    self::setViewParam('listHashtag', $hashtag);
    $this->render('/project/register');
    Sessao::limpaMensagem();
    Sessao::limpaErro();
  }

  public function save()
  {
    $this->auth();

    try {
      Sessao::gravaFormulario($_POST);

      $project = $this->createProject();

      $lastProjectId = $this->saveProject($project);
      $userXP = new User();

      $projectDAO = new ProjectDAO();
      $project = $projectDAO->getById($lastProjectId);
      $this->handleImageUploads($lastProjectId);
      $this->handleFileUploads($lastProjectId);
      $this->saveHashtagProjectAssociations($lastProjectId);
      $userXP->updateXPAndLevel($project->getUser()->getIdUser(), 25);
    } catch (\Exception $e) {
      Sessao::gravaMensagem($e->getMessage());
    }

    Sessao::limpaFormulario();
    Sessao::limpaMensagem();
    Sessao::limpaErro();

    $this->redirect('/project');
  }

  private function createProject()
  {
    $userDAO = new UserDAO();
    $idUserLog = $_SESSION['idUser'];
    $user = $userDAO->getById($idUserLog);

    $project = new Project();
    $project->setTitle($_POST['title']);
    $project->setDescription(nl2br($_POST['description']));
    $project->setIdUser($user);
    $project->setCreated_At(new \DateTime());

    return $project;
  }


  private function saveProject(Project $project)
  {
    $projectDAO = new ProjectDAO();
    return $projectDAO->save($project);
  }

  private function handleImageUploads($projectId)
  {
    if (!empty($_FILES['images']['name'][0])) {
      $dir = 'public/images/projects';
      $existingImages = [];
      $imageDAO = new ImageDAO();
      $existingImages = $imageDAO->getImagesByProjectId($projectId);

      $uploadedImages = [];

      foreach ($_FILES['images']['name'] as $key => $value) {
        $file = [
          'name' => $_FILES['images']['name'][$key],
          'type' => $_FILES['images']['type'][$key],
          'tmp_name' => $_FILES['images']['tmp_name'][$key],
          'error' => $_FILES['images']['error'][$key],
          'size' => $_FILES['images']['size'][$key]
        ];

        $objUpload = new Upload($file);
        $timestamp = time();
        $imageName = 'img-id' . $projectId . '-' . $timestamp . '-' . $key;

        while (in_array($imageName, $existingImages)) {
          $timestamp++;
          $imageName = 'img-id' . $projectId . '-' . $timestamp . '-' . $key;
        }

        $objUpload->setName($imageName);

        $success = $objUpload->upload($dir);

        if ($success) {
          $uploadedImages[] = $objUpload->getBasename();
        } else {
          throw new \Exception("Error uploading images.");
        }
      }

      $imageDAO->associateImagesWithProject($projectId, $uploadedImages);
    }
  }


  public function saveHashtagProjectAssociations($projectId)
  {
    $hashtags = isset($_POST['idHashtags']) && is_array($_POST['idHashtags']) ? $_POST['idHashtags'] : [];

    $projectDAO = new ProjectDAO();
    $project = $projectDAO->getById($projectId);

    foreach ($hashtags as $hashtagId) {
      $hashtagProject = new HashtagProject();

      $hashtagDAO = new HashtagDAO();
      $hashtag = $hashtagDAO->getById($hashtagId);

      $hashtagProject->setProject($project);
      $hashtagProject->setHashtag($hashtag);

      $hashtagProjectDAO = new HashtagProjectDAO();
      $hashtagProjectDAO->save($hashtagProject);
    }
  }



  private function handleFileUploads($projectId)
  {
    if (!empty($_FILES['files']['name'][0])) {
      $dir = 'public/files/projects';
      $existingFiles = [];
      $fileDAO = new FileDAO();
      $existingFiles = $fileDAO->getFilesByProjectId($projectId);

      $uploadedFiles = [];

      foreach ($_FILES['files']['name'] as $key => $value) {
        $file = [
          'name' => $_FILES['files']['name'][$key],
          'type' => $_FILES['files']['type'][$key],
          'tmp_name' => $_FILES['files']['tmp_name'][$key],
          'error' => $_FILES['files']['error'][$key],
          'size' => $_FILES['files']['size'][$key]
        ];

        $objUpload = new FileUpload($file);
        $timestamp = time();
        $fileName = 'file-id' . $projectId . '-' . $timestamp . '-' . $key;

        while (in_array($fileName, $existingFiles)) {
          $timestamp++;
          $fileName = 'file-id' . $projectId . '-' . $timestamp . '-' . $key;
        }

        $objUpload->setName($fileName);

        $success = $objUpload->upload($dir);

        if ($success) {
          $uploadedFiles[] = $objUpload->getBasename();
        } else {
          throw new \Exception("Error uploading files.");
        }
      }

      $fileDAO->associateFilesWithProject($projectId, $uploadedFiles);
    }
  }

  public function deleteFile()
  {
    $this->auth();
    if (isset($_GET['idFile'], $_GET['idProject'])) {
      $fileId = (int)$_GET['idFile'];
      $projectId = (int)$_GET['idProject'];

      $fileDAO = new FileDAO();
      $fileDAO->dropFiles($fileId);
      Sessao::gravaMensagem("Arquivo removido com sucesso.");
    } else {
      Sessao::gravaMensagem("ID do arquivo ou do projeto não definidos.");
    }

    $this->redirect('/project/alter/' . $projectId);
  }

  public function deleteHashtag()
  {
    $this->auth();
    if (isset($_GET['idHashtag'], $_GET['idProject'])) {
      $hashtagId = (int)$_GET['idHashtag'];
      $projectId = (int)$_GET['idProject'];

      $hashtagProjectDAO = new HashtagProjectDAO();
      $hashtagProjectDAO->deleteByProjectAndHashtagId($projectId, $hashtagId);
      Sessao::gravaMensagem("Hashtag removida com sucesso.");
    } else {
      Sessao::gravaMensagem("ID da hashtag ou do projeto não definidos.");
    }
    $this->redirect('/project/alter/' . $projectId);
  }

  public function deleteImage()
  {
    $this->auth();

    if (isset($_GET['idImage'], $_GET['idProject'])) {
      $imageId = (int)$_GET['idImage'];
      $projectId = (int)$_GET['idProject'];

      $imageDAO = new ImageDAO();
      $imageDAO->dropImages($imageId);
      Sessao::gravaMensagem("Imagem removida com sucesso.");
    } else {
      Sessao::gravaMensagem("ID da imagem ou do projeto não definidos.");
    }

    $this->redirect('/project/alter/' . $projectId);
  }

  public function delete()
  {
    $this->auth();
    if (isset($_GET['idProject'])) {
      $projectId = (int)$_GET['idProject'];
      $userXP = new User();

      $projectDAO = new ProjectDAO();
      $project = $projectDAO->getById($projectId);
      $projectDAO = new ProjectDAO();
      try {
        $projectDAO->drop($projectId);
        $userXP->updateXPAndLevel($project->getUser()->getIdUser(), -25);
        Sessao::gravaMensagem("Projeto removido com sucesso.");
      } catch (\Exception $e) {
        Sessao::gravaMensagem("Erro ao remover o projeto: " . $e->getMessage());
      }
    } else {
      Sessao::gravaMensagem("ID do projeto não definido.");
    }

    $this->redirect('/project');
  }


  public function report()
  {
    $this->auth();

    $urlParts = explode('/', $_GET['url']);
    $projectId = (int) end($urlParts);

    $projectDAO = new ProjectDAO();
    $project = $projectDAO->getById($projectId);
    self::setViewParam('project', $project);
    $this->render('/project/report');
    Sessao::limpaMensagem();
    Sessao::limpaErro();
  }

  public function saveReport()
  {
    $this->auth();

    $idUser = $_SESSION['idUser'];
    $urlParts = explode('/', $_GET['url']);
    $idProject = (int) end($urlParts);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      try {
        $reportText = $_POST['report'];
        $action = 0;

        $userDAO = new UserDAO();
        $user = $userDAO->getById($idUser);

        $projectDAO = new ProjectDAO();
        $project = $projectDAO->getById($idProject);

        $report = new Report();
        $report->setIdUser($user);
        $report->setIdProject($project);
        $report->setReport($reportText);
        $report->setAction($action);

        $reportDAO = new ReportDAO();
        $reportDAO->saveReport($report);

        Sessao::gravaMensagem("Denúncia enviado com sucesso.");
      } catch (\Exception $e) {
        Sessao::gravaMensagem("Erro ao enviar o denúncia: " . $e->getMessage());
      }
    }

    $this->redirect('/project');
  }

  public function like($params)
  {
    $this->auth();
    $userDAO = new UserDAO();
    $user = $userDAO->getById($_SESSION['idUser']);
    $idProject = $params[0];
    $likeDAO = new LikeDAO();
    $likeStatus = $likeDAO->getLikeStatus($idProject, $user->getIdUser());
    $userXP = new User();
    $userXP2 = new User();
    $projectDAO = new ProjectDAO();
    $project = $projectDAO->getById($idProject);

    if ($likeStatus) {
      $likeDAO->deleteLike($idProject, $user->getIdUser());
      $userXP->updateXPAndLevel($project->getUser()->getIdUser(), -10);
      $userXP2->updateXPAndLevel($_SESSION['idUser'], -5);
    } else {
      $likeDAO->createLike($idProject, $user->getIdUser());
      $userXP->updateXPAndLevel($project->getUser()->getIdUser(), 10);
      $userXP2->updateXPAndLevel($_SESSION['idUser'], 5);
      $notification = new Notification();
      $notification->setNotification('Someone liked your new project!');
      $user = new User();
      $user->setIdUser($project->getUser()->getIdUser());
      $notification->setUser($user);
      $notificationDAO = new NotificationDAO();
      $notificationDAO->save($notification);
    }

    $this->redirect('/project/list');
  }

  public function saveProjectFavorite($params)
  {
    $this->auth();
    $userDAO = new UserDAO();
    $user = $userDAO->getById($_SESSION['idUser']);
    $idProject = $params[0];
    $userXP = new User();
    $projectDAO = new ProjectDAO();
    $project = $projectDAO->getById($idProject);
    $saveProjectDAO = new SaveProjectDAO();
    $saveStatus = $saveProjectDAO->getSaveStatus($idProject, $user->getIdUser());

    if ($saveStatus) {
      $saveProjectDAO->deleteSave($idProject, $user->getIdUser());
      $userXP->updateXPAndLevel($project->getUser()->getIdUser(), -20);
    } else {
      $saveProjectDAO->createSave($idProject, $user->getIdUser());
      $userXP->updateXPAndLevel($project->getUser()->getIdUser(), 20);
      $notification = new Notification();
      $notification->setNotification('It looks like people are saving your project!');
      $user = new User();
      $user->setIdUser($project->getUser()->getIdUser());
      $notification->setUser($user);
      $notificationDAO = new NotificationDAO();
      $notificationDAO->save($notification);
    }

    $this->redirect('/project/list');
  }

  public function comment()
  {
    $this->auth();
    $user = new UserDAO;
    self::setViewParam('user', $user->getById($_SESSION['idUser']));

    $user = new UserDAO();
    $projectDAO = new ProjectDAO();
    $commentDAO = new CommentDAO();

    $user = $user->getById($_SESSION['idUser']);

    $idProject = basename($_SERVER['REQUEST_URI']);
    $idProject = intval($idProject);

    $userXP = new User();
    $userXP2 = new User();
    $projectDAO = new ProjectDAO();
    $project = $projectDAO->getById($idProject);

    $article = $projectDAO->getById($idProject);
    $comment = new Comment();
    $comment->setText(nl2br($_POST['text']));
    $comment->setUser($user);
    $comment->setProject($article);
    $comment->setDateCreate(new \DateTime());
    $commentDAO->save($comment);
    $userXP->updateXPAndLevel($project->getUser()->getIdUser(), 15);
    $userXP2->updateXPAndLevel($_SESSION["idUser"], 10);
    $notification = new Notification();
    $notification->setNotification('People are commenting on your new project!');
    $user = new User();
    $user->setIdUser($project->getUser()->getIdUser());
    $notification->setUser($user);
    $notificationDAO = new NotificationDAO();
    $notificationDAO->save($notification);
    $this->redirect('/project');
  }

  public function deleteComment($params)
  {
    $this->auth();

    $idComentario = $params[0];
    $idProject = $params[1];
    $commentDAO = new CommentDAO();
    $userXP = new User();
    $userXP2 = new User();
    $projectDAO = new ProjectDAO();
    $project = $projectDAO->getById($idProject);
    $userXP->updateXPAndLevel($project->getUser()->getIdUser(), -15);
    $userXP2->updateXPAndLevel($_SESSION["idUser"], -10);
    $commentDAO->drop($idComentario);

    $this->redirect('/project');
  }
  public function listSaves()
  {
    $saveProjectDAO = new SaveProjectDAO();
    $idUser = $_SESSION["idUser"];
    $savedProjects = $saveProjectDAO->getSavedProjectsByUserId($idUser);

    $projectDAO = new ProjectDAO();
    $projectsToDisplay = [];

    foreach ($savedProjects as $savedProject) {
      $idProject = $savedProject->getIdProject();
      $project = $projectDAO->getById($idProject);

      $imageDAO = new ImageDAO();
      $images = $imageDAO->getImagesByProjectId($idProject);
      $project->setImages($images);

      $fileDAO = new FileDAO();
      $files = $fileDAO->getFilesByProjectId($idProject);
      $project->setFiles($files);

      $hashtagDAO = new HashtagProjectDAO();
      $hashtags = $hashtagDAO->getByProjectId($idProject);
      $project->setHashtags($hashtags);

      $likeDAO = new LikeDAO();
      $likeCount = $likeDAO->getLikeCountByArticleId($idProject);
      $project->setLikeCount($likeCount);

      $likeStatus = $likeDAO->getLikeStatus($idProject, $_SESSION['idUser']);
      $project->setLikeStatus($likeStatus);

      $saveDAO = new SaveProjectDAO();
      $saveStatus = $saveDAO->getSaveStatus($idProject, $_SESSION['idUser']);
      $project->setSaveStatus($saveStatus);

      $commentDAO = new CommentDAO();
      $comments = $commentDAO->getCommentsByProjectId($idProject);
      $project->setComments($comments);

      $projectsToDisplay[] = $project;
    }
    self::setViewParam('savedProjects', $projectsToDisplay);
    $this->render('/project/listSaves');
  }
  public function mostRecentSavedProjects()
  {
    $this->auth();

    $saveProjectDAO = new SaveProjectDAO();
    $likeDAO = new LikeDAO();
    $idUser = $_SESSION['idUser'];
    $savedProjects = $saveProjectDAO->getSavedProjectsByUserId($idUser);

    $projectDAO = new ProjectDAO();
    $imageDAO = new ImageDAO();
    $fileDAO = new FileDAO();
    $hashtagDAO = new HashtagProjectDAO();
    $commentDAO = new CommentDAO();

    $projectsToDisplay = [];

    foreach ($savedProjects as $savedProject) {
      $idProject = $savedProject->getIdProject();
      $project = $projectDAO->getById($idProject);

      $imageDAO = new ImageDAO();
      $images = $imageDAO->getImagesByProjectId($idProject);
      $project->setImages($images);

      $fileDAO = new FileDAO();
      $files = $fileDAO->getFilesByProjectId($idProject);
      $project->setFiles($files);

      $hashtagDAO = new HashtagProjectDAO();
      $hashtags = $hashtagDAO->getByProjectId($idProject);
      $project->setHashtags($hashtags);

      $likeDAO = new LikeDAO();
      $likeCount = $likeDAO->getLikeCountByArticleId($idProject);
      $project->setLikeCount($likeCount);

      $likeStatus = $likeDAO->getLikeStatus($idProject, $_SESSION['idUser']);
      $project->setLikeStatus($likeStatus);

      $commentDAO = new CommentDAO();
      $comments = $commentDAO->getCommentsByProjectId($idProject);
      $project->setComments($comments);

      $projectsToDisplay[] = $project;
    }

    usort($projectsToDisplay, function ($a, $b) {
      return $b->getCreated_At() <=> $a->getCreated_At();
    });

    self::setViewParam('savedProjects', $projectsToDisplay);
    $this->render('/project/mostRecentSavedProjects');
  }

  public function listNotifications()
  {
    $notificationsDAO = new NotificationDAO();
    $notifications = $notificationsDAO->getNotificationsByUserId($_SESSION['idUser']);
    self::setViewParam('notifications', $notifications);
    $this->render('/project/listNotifications');
  }

  public function search()
  {
    $term = $_GET['term'] ?? '';
    $type = $_GET['type'] ?? '';
    $results = [];

    if ($type === 'user') {
      $userDAO = new UserDAO();
      $results = $userDAO->searchUsers($term);
    } elseif ($type === 'project') {
      $projectDAO = new ProjectDAO();
      $projects = $projectDAO->searchProjects($term);
      foreach ($projects as $project) {
        $idProject= $project->getIdProject();
        $fullProject = $projectDAO->getFullProjectById($project->getIdProject());
        $results[] = $fullProject;

        $imageDAO = new ImageDAO();
        $images = $imageDAO->getImagesByProjectId($idProject);
        $project->setImages($images);

        $fileDAO = new FileDAO();
        $files = $fileDAO->getFilesByProjectId($idProject);
        $project->setFiles($files);

        $hashtagDAO = new HashtagProjectDAO();
        $hashtags = $hashtagDAO->getByProjectId($idProject);
        $project->setHashtags($hashtags);

        $likeDAO = new LikeDAO();
        $likeCount = $likeDAO->getLikeCountByArticleId($idProject);
        $project->setLikeCount($likeCount);

        $likeStatus = $likeDAO->getLikeStatus($idProject, $_SESSION['idUser']);
        $project->setLikeStatus($likeStatus);

        $commentDAO = new CommentDAO();
        $comments = $commentDAO->getCommentsByProjectId($idProject);
        $project->setComments($comments);
      }
    }

    self::setViewParam('results', $results);
    self::setViewParam('type', $type);
    self::setViewParam('term', $term);

    $this->render('/project/search');
  }
}
