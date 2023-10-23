<?php

namespace App\Models\DAO;

use App\Models\Entidades\Hashtag;
use App\Models\Entidades\HashtagProject;
use App\Models\Entidades\Project;
use Exception;

class HashtagProjectDAO extends BaseDAO
{
    public function save(HashtagProject $hashtagProject)
    {
        try {
            $idHashtag = $hashtagProject->getHashtag()->getIdHashtag();
            $idProject = $hashtagProject->getProject()->getIdProject();

            $params = [
                ':idHashtag' => $idHashtag,
                ':idProject' => $idProject,
            ];

            return $this->insert('Hashtags_Projects', ':idHashtag, :idProject', $params);

        } catch (\Exception $e) {
            throw new \Exception("Error saving hashtag-project association. " . $e->getMessage(), 500);
        }
    }
    public function getByProjectId(int $idProject)
    {
        $result = $this->select("SELECT h.idHashtag, h.hashtag, p.idProject FROM Hashtags_Projects hp
                                 JOIN Hashtags h ON hp.idHashtag = h.idHashtag
                                 JOIN Projects p ON hp.idProject = p.idProject
                                 WHERE p.idProject = $idProject");
    
        $associations = [];
        while ($row = $result->fetch()) {
            // Criar um objeto Hashtag com base na coluna 'hashtag' do banco de dados
            $hashtag = new Hashtag();
            $hashtag->setHashtag($row['hashtag']);
    
            $project = new Project();
            $project->setIdProject($row['idProject']);
    
            $hashtagProject = new HashtagProject();
            $hashtagProject->setHashtag($hashtag);
            $hashtagProject->setProject($project);
    
            $associations[] = $hashtagProject;
        }
    
        return $associations;
    }
    
    
    
}
