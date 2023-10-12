<?php

namespace App\Models\DAO;

use App\Models\Entidades\HashtagProject;
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
        $result = $this->select("SELECT * FROM Hashtags_Projects WHERE idProject = $idProject");

        $associations = [];
        while ($row = $result->fetch()) {
            $hashtagProject = new HashtagProject();

            $hashtagDAO = new HashtagDAO();
            $hashtag = $hashtagDAO->getById($row['idHashtag']);
            $hashtagProject->setHashtag($hashtag);

            $projectDAO = new ProjectDAO();
            $project = $projectDAO->getById($row['idProject']);
            $hashtagProject->setProject($project);

            $associations[] = $hashtagProject;
        }

        return $associations;
    }
}
