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
    $projectDAO = new ProjectDAO();
    $projects = $projectDAO->list();

    $imageDAO = new ImageDAO();
    $fileDAO = new FileDAO();
    $hashtagDAO = new HashtagProjectDAO();

    foreach ($projects as $project) {
      $images = $imageDAO->getImagesByProjectId($project->getIdProject());
      $project->setImages($images);

      $files = $fileDAO->getFilesByProjectId($project->getIdProject());
      $project->setFiles($files);

      $hashtags = $hashtagDAO->getByProjectId($project->getIdProject());
      $project->setHashtags($hashtags);
    }

    self::setViewParam('listProject', $projects);
    $this->render('/project/index');
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
  
  

private function deleteInvisibleItems($projectId, $deletedImageIds, $deletedFileIds, $deletedHashtagIds)
{
    $imageDAO = new ImageDAO();
    foreach ($deletedImageIds as $imageId) {
        $imageDAO->delete($imageId);
    }

    $fileDAO = new FileDAO();
    foreach ($deletedFileIds as $fileId) {
        $fileDAO->delete($fileId);
    }

    $hashtagProjectDAO = new HashtagProjectDAO();
    foreach ($deletedHashtagIds as $hashtagId) {
        $hashtagProjectDAO->deleteByProjectAndHashtagId($projectId, $hashtagId);
    }
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

        $projectDAO = new ProjectDAO();
        try {
            $projectDAO->drop($projectId);
            Sessao::gravaMensagem("Projeto removido com sucesso.");
        } catch (\Exception $e) {
            Sessao::gravaMensagem("Erro ao remover o projeto: " . $e->getMessage());
        }
    } else {
        Sessao::gravaMensagem("ID do projeto não definido.");
    }

    $this->redirect('/project');
}



}
