<?php

namespace App\Controllers;

use App\Lib\FileUpload;
use App\Lib\Sessao;
use App\Lib\Upload;
use App\Models\DAO\FileDAO;
use App\Models\DAO\HashtagDAO;
use App\Models\DAO\HashtagProjectDAO;
use App\Models\DAO\ImageDAO;
use App\Models\DAO\ProjectDAO;
use App\Models\DAO\UserDAO;
use App\Models\Entidades\File;
use App\Models\Entidades\HashtagProject;
use App\Models\Entidades\Image;
use App\Models\Entidades\Project;
use App\Models\Entidades\User;

class ProjectController extends Controller
{
  public function index()
  {
    $this->auth();
    $this->render('/project/index');
    Sessao::limpaMensagem();
    Sessao::limpaErro();
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

      $this->handleImageUploads($lastProjectId);
      $this->handleFileUploads($lastProjectId);
      $this->saveHashtagProjectAssociations($lastProjectId);


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
        $objUpload->setName('img-id' . $projectId . '-' . $key);
        $success = $objUpload->upload($dir);

        if ($success) {
          $uploadedImages[] = $objUpload->getBasename();
        } else {
          throw new \Exception("Error uploading images.");
        }
      }

      $imageDAO = new ImageDAO();
      $imageDAO->associateImagesWithProject($projectId, $uploadedImages);
    }
  }
  public function saveHashtagProjectAssociations($projectId)
  {
      $hashtags = isset($_POST['idHashtags']) && is_array($_POST['idHashtags']) ? $_POST['idHashtags'] : [];
  
      foreach ($hashtags as $hashtagId) {
          $hashtagProject = new HashtagProject();
  
          $projectDAO = new ProjectDAO();
          $project = $projectDAO->getById($projectId); 
  
          $hashtagDAO = new HashtagDAO();
          $hashtag = $hashtagDAO->getbyId($hashtagId); 
  
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
        $objUpload->setName('file-id' . $projectId . '-' . $key);
        $success = $objUpload->upload($dir);

        if ($success) {
          $uploadedFiles[] = $objUpload->getBasename();
        } else {
          throw new \Exception("Error uploading files.");
        }
      }

      $fileDAO = new FileDAO();
      $fileDAO->associateFilesWithProject($projectId, $uploadedFiles);
    }
  }
}
