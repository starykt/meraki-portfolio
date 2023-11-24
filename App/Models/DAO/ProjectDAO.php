<?php

namespace App\Models\DAO;

use App\Models\Entidades\Project;
use App\Models\Entidades\User;
use DateTime;
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
            $project->setTitle($projectData['title']);
            $project->setDescription($projectData['description']);
            $project->setCreated_At(new \DateTime($projectData['created_At']));
            $userDAO = new UserDAO();
            $user = $userDAO->getById($projectData['idUser']);
    
            $project->setUser($user);
    
            return $project;
        }
    
        return null;
    }
    

    public function getByLiked(int $idProject)
    {
        $resultado = $this->select("SELECT * FROM Projects WHERE idProject = $idProject ORDER BY created_At DESC");
        $projectData = $resultado->fetch();

        if ($projectData) {
            $project = new Project();
            $project->setIdProject($projectData['idProject']);
            $project->setTitle($projectData['title']);
            $project->setDescription($projectData['description']);
            $project->setCreated_At(new \DateTime($projectData['created_At']));
            $userDAO = new UserDAO();
            $idUser = $userDAO->getById($projectData['idUser']);
            $project->setIdUser($idUser);
            $likeDAO = new LikeDAO();
            $mostLikedProjects = $likeDAO->getUserMostLikedProjects($project->getIdUser()->getIdUser());
            $project->setMostLikedProjects($mostLikedProjects);

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
        try {
            $projects = [];
            $result = $this->select("SELECT * FROM Projects ORDER BY created_At DESC");

            $userDAO = new UserDAO();

            while ($projectData = $result->fetch()) {
                $project = new Project();
                $project->setIdProject($projectData['idProject']);
                $project->setTitle($projectData['title']);
                $project->setDescription($projectData['description']);
                $project->setCreated_At(new \DateTime($projectData['created_At']));


                $projects[] = $project;
            }

            return $projects;
        } catch (\Exception $e) {
            throw new \Exception("Error fetching projects. " . $e->getMessage(), 500);
        }
    }

 


    public function alter(int $projectId, string $title, string $description)
    {
        try {
            $params = [
                ':title' => $title,
                ':description' => $description,
                ':idProject' => $projectId,
            ];

            $where = 'idProject = :idProject';

            return $this->update('Projects', 'title = :title, description = :description, created_At = NOW()', $params, $where);
        } catch (\Exception $e) {
            throw new \Exception("Erro na atualização dos dados. " . $e->getMessage(), 500);
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
    public function getFullProjectById($projectId)
    {
        $sql = "SELECT p.*, u.idUser, u.nickname, u.tag AS userTag, u.avatar AS userAvatar
                FROM Projects p
                INNER JOIN Users u ON p.idUser = u.idUser
                WHERE p.idProject = $projectId";

        $result = $this->select($sql);
    
        foreach ($result as $projectData) {
            $project = new Project();
            $project->setIdProject($projectData['idProject']);
            $project->setTitle($projectData['title']);
            $project->setDescription($projectData['description']);
            $project->setCreated_At(new DateTime($projectData['created_At']));
            $user = new User();
            $user->setIdUser($projectData['idUser']);
            $user->setNickname($projectData['nickname']);
            $user->setTag($projectData['userTag']);
            $user->setAvatar($projectData['userAvatar']);
            $project->setUser($user);
    
            return $project;
        }
    
        return null;
    }
public function searchProjects($term)
{
    $term = '%' . $term . '%';
    
    $sql = "SELECT p.* FROM Projects p
            INNER JOIN Hashtags_Projects ph ON p.idProject = ph.idProject
            INNER JOIN Hashtags h ON ph.idHashtag = h.idHashtag
            WHERE h.hashtag LIKE '$term'";
    

    $result = $this->select($sql);

    $projects = [];

    foreach ($result as $projectData) {
        $project = new Project();
        $project->setIdProject($projectData['idProject']);
        $project->setTitle($projectData['title']);
        $project->setDescription($projectData['description']);
        $projects[] = $project;
    }

    return $projects;
}

}
