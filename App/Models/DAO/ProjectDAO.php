<?php

namespace App\Models\DAO;

use App\Models\Entidades\Project;
use Exception;

class ProjectDAO extends BaseDAO 
{
  public function getById(int $idProject)
  {
      $resultado = $this->select("SELECT * FROM Projects WHERE idProject = $idProject");
      $projectData = $resultado->fetch();
  
      if ($projectData) {
          $project = new Project();
          $project->setIdProject($projectData['idProject']);
          $project->setCreated_At(new \DateTime($projectData['created_At'])); 
          return $project;
      }
  
      return null;
  }
  
  public function save(Project $project)
  {
      try {
          $idUser = $project->getIdUser()->getIdUser();
          $title = $project->getTitle();
          $description = $project->getDescription();
          $created_At = $project->getCreated_At()->format('Y-m-d H:i:s');

          $params = [
              ':idUser' => $idUser,
              ':title' => $title,
              ':description' => $description,
              ':created_At' => $created_At,
          ];

          return $this->insert('Projects', ':idUser, :title, :description, :created_At', $params);

      } catch (\Exception $e) {
          throw new \Exception("Error saving project data. " . $e->getMessage(), 500);
      }
  }

  public function list()
  {
      // Implement logic to list projects from the database
      // ...
  }

  public function alter(Project $project)
  {
      try {
          $idProject = $project->getIdProject();
          $idUser = $project->getIdUser();
          $title = $project->getTitle();
          $description = $project->getDescription();
          $createdAt = $project->getCreated_At();

          $params = [
              ':idUser' => $idUser,
              ':title' => $title,
              ':description' => $description,
              ':createdAt' => $createdAt,
              ':idProject' => $idProject,
          ];

          return $this->update('Projects', 'idUser = :idUser, title = :title, description = :description, createdAt = :createdAt', $params, 'idProject = :idProject');

      } catch (\Exception $e) {
          throw new \Exception("Error updating project data. " . $e->getMessage(), 500);
      }
  }

  public function drop(int $idProject)
  {
      try {
          return $this->delete('Projects', "idProject = $idProject");
      } catch (\Exception $e) {
          throw new \Exception("Error deleting the project. " . $e->getMessage(), 500);
      }
  }
}
