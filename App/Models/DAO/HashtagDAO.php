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

    public function list()
    {
        $result = $this->select("SELECT * FROM Hashtags");
    
        $dataSet = $result->fetchAll();
        $listHashtag = [];
    
        if ($dataSet) {
            foreach ($dataSet as $data) {
                $hashtag = new Hashtag();
                $hashtag->setIdHashtag($data['idHashtag']);
                $hashtag->setHashtag($data['hashtag']);
                $listHashtag[] = $hashtag; 
            }
        }
    
        return $listHashtag;
    }
    public function listar ()
    {
        $result = $this->select("SELECT * FROM Hashtags");

        return $result->fetchAll(\PDO::FETCH_CLASS, Hashtag::class);
    }

    public function alter(Hashtag $hashtag)
    {
        try {
            $idHashtag = $hashtag->getIdHashtag();
            $hashtag = $hashtag->getHashtag();
    
            $params = [
                ':idHashtag' => $idHashtag,
                ':hashtag' => $hashtag
            ];
    
            return $this->update('Hashtags', "hashtag = :Hashtag", $params, "idHashtag = :idHashtag");
        } catch (\Exception $e) {
            throw new \Exception("Erro na atualização dos dados. " . $e->getMessage(), 500);
        }
    }
    

    public function drop(int $idHashtag)
    {
        try {
            return $this->delete('Hashtags', "idHashtag = $idHashtag");
        } catch (\Exception $e) {
            throw new \Exception("Erro ao excluir a categoria. " . $e->getMessage(), 500);
        }
    }
    
    public function isHashtagUsed($idHashtag)
    {
        $query = "SELECT COUNT(*) as count FROM Hashtags WHERE idHashtag = " . $idHashtag;
        $resultado = $this->select($query);
        $dataSet = $resultado->fetch();
    
        if ($dataSet) {
            return $dataSet['count'] > 0;
        }
    
        return false;
    }
    
    
    
}
    