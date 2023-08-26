<?php

namespace App\Models\DAO;

use App\Models\Entidades\Hashtag;
use Exception;

class HashtagDAO extends BaseDAO 
{

    public function getById(int $idHashtag)
    {
        $resultado = $this->select("SELECT * FROM Hashtag WHERE idHashtag = $idHashtag");

        return $resultado->fetchObject(Hashtag::class);
    }


    public function save(Hashtag $hashtag)
    {
        try {
            $hashtag = $hashtag->getHashtag();
    
            $params = [
                ':hashtag' => $hashtag,
            ];
    
            return $this->insert('Hashtags', " :hashtag", $params);
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação dos dados. " . $e->getMessage(), 500);
        }
    }
    

}