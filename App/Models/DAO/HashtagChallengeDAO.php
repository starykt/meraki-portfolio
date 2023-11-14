<?php

namespace App\Models\DAO;

use App\Models\Entidades\Hashtag;
use App\Models\Entidades\HashtagChallenge;

class HashtagChallengeDAO extends BaseDAO
{
    public function save(HashtagChallenge $hashtagChallenge)
    {
        try {
            $idChallenge = $hashtagChallenge->getIdChallenge();
            $idHashtag = $hashtagChallenge->getIdHashtag();

            $params = [
                ':idChallenge' => $idChallenge,
                ':idHashtag' => $idHashtag,
            ];

            return $this->insert('Hashtags_Challenges', 'idChallenge, idHashtag', $params);
        } catch (\Exception $e) {
            throw new \Exception("Error saving hashtag challenge. " . $e->getMessage(), 500);
        }
    }

    public function associateHashtagToChallenge($idChallenge, $idHashtag)
    {
        try {
            if (!isset($idHashtag)) {
                throw new \Exception("O idHashtag não está definido.", 400);
            }

            $params = [
                ':idChallenge' => $idChallenge,
                ':idHashtag' => $idHashtag,
            ];

            if (!$this->isAssociationExists($idChallenge, $idHashtag)) {
                return $this->insert('Hashtags_Challenges', ':idChallenge, :idHashtag', $params);
            }

            return true;
        } catch (\Exception $e) {
            throw new \Exception("Error associating hashtag to challenge. " . $e->getMessage(), $e->getCode());
        }
    }

    public function getHashtagByChallengeId($challengeId)
    {
        $query = "SELECT H.* FROM Hashtags H
        JOIN Hashtags_Challenges HC ON H.idHashtag = HC.idHashtag
        WHERE HC.idChallenge = $challengeId";
        $resultado = $this->select($query);
        $hashtagData = $resultado->fetch();
    
        if ($hashtagData) {
            $hashtag = new Hashtag();
            $hashtag->setIdHashtag($hashtagData['idHashtag']);
            $hashtag->setHashtag($hashtagData['hashtag']);
            return $hashtag;
        }
    
        return null;
    }
    
    
    private function isAssociationExists($idChallenge, $idHashtag)
    {
        $result = $this->select(
            "SELECT COUNT(*) as count 
            FROM Hashtags_Challenges 
            WHERE idChallenge = $idChallenge AND idHashtag = $idHashtag"
        );

        $dataSet = $result->fetch();
        return ($dataSet['count'] > 0);
    }
}
