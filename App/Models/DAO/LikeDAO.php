<?php

namespace App\Models\DAO;

use App\Models\Entidades\Like;
use App\Models\Entidades\Project;
use Exception;

class LikeDAO extends BaseDAO
{

    public function getLikeCountByArticleId($idProject)
    {
        $resultado = $this->select(
            "SELECT COUNT(*) as likeCount FROM Likes WHERE idProject = " . $idProject
        );
    
        $dataSet = $resultado->fetch();
    
        if ($dataSet) {
            return $dataSet['likeCount'];
        }
    
        return 0;
    }
    
    public function createLike($idProject, $idUser)
    {
        try {
            return $this->insert(
                'Likes',
                ":idProject, :idUser",
                [
                    ':idProject' => $idProject,
                    ':idUser' => $idUser
                ]
            );
            
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados." . $e->getMessage(), 500);
        }
    }
    
    public function deleteLike($idProject, $idUser)
    {
        try {
            return $this->delete('Likes', "idProject = $idProject AND idUser = $idUser");
        } catch (\Exception $e) {
            throw new \Exception("Erro ao excluir o like. " . $e->getMessage(), 500);
        }
    }
    
    public function getLikeStatus($idProject, $idUser)
    {
        $resultado = $this->select(
            "SELECT COUNT(*) as likeCount FROM Likes WHERE idProject = $idProject AND idUser = $idUser"
        );
    
        $dataSet = $resultado->fetch();
    
        if ($dataSet && $dataSet['likeCount'] > 0) {
            return true; 
        }
    
        return false; 
    }
    public function getUserMostLikedProjects($idUser)
{
    $resultado = $this->select("SELECT p.idProject, p.title, p.description, p.created_At, COUNT(l.idProject) AS likeCount 
            FROM Projects p
            LEFT JOIN Likes l ON p.idProject = l.idProject
            WHERE p.idUser = $idUser
            GROUP BY p.idProject
            ORDER BY likeCount DESC LIMIT 0, 25");

    $projects = [];
    while ($row = $resultado->fetch()) {
        $project = new Project();
        $project->setIdProject($row['idProject']);
        $project->setTitle($row['title']);
        $project->setDescription($row['description']);
        $project->setCreated_At(new \DateTime($row['created_At']));
        $project->setLikesCount($row['likeCount']);
        $projects[] = $project;
    }

    return $projects;
}

    
    
    
    
    
    
}
