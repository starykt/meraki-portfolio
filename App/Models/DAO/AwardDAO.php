<?php

namespace App\Models\DAO;

use App\Models\Entidades\Award;
use Exception;

class AwardDAO extends BaseDAO
{
    public function save(Award $award)
    {
        try {
            $idUser = null;
            $idChallenge = $award->getIdChallenge();
            $description = $award->getDescription();
            $date = $award->getDate();
            $imagePath = $award->getImagePath();

            $params = [
                ':idUser' => $idUser,
                ':idChallenge' => $idChallenge,
                ':description' => $description,
                ':date' => $date,
                ':imagePath' => $imagePath,
            ];

            return $this->insert('Awards', ':idUser, :idChallenge, :description, :date, :imagePath', $params);
        } catch (\Exception $e) {
            throw new \Exception("Error saving award. " . $e->getMessage(), 500);
        }
    }
    public function updateImagePath($idAward, $imagePath)
    {
        try {
            $params = [
                ':idAward' => $idAward,
                ':imagePath' => $imagePath,
            ];

            return $this->update('Awards', "imagePath = :imagePath", $params, "idAward = :idAward");
        } catch (\Exception $e) {
            throw new \Exception("Erro na atualização do caminho da imagem do prêmio. " . $e->getMessage(), 500);
        }
    }
    public function getUserAwards($userId)
    {
        try {
            $sql = "SELECT * FROM Awards WHERE idUser = $userId";

            $result = $this->select($sql);

            $userAwards = [];
            foreach ($result as $data) {
                $award = new Award();
                $award->setIdAward($data['idAward']);
                $award->setDescription($data['description']);
                $award->setImagePath($data['imagePath']);
                $userAwards[] = $award;
            }

            return $userAwards;
        } catch (\Exception $e) {
            throw new \Exception("Erro ao obter prêmios do usuário. " . $e->getMessage(), 500);
        }
    }

    public function getAwardsByChallengeId($challengeId)
    {
        $query = "SELECT A.* FROM Awards A
                JOIN Awards AC ON A.idAward = AC.idAward
                WHERE AC.idChallenge = $challengeId";
        $resultado = $this->select($query);

        $awards = [];
        while ($row = $resultado->fetch()) {
            $award = new Award();
            $award->setIdAward($row['idAward']);
            $award->setDescription($row['description']);
            $award->setImagePath($row['imagePath']);

            $awards[] = $award;
        }

        return $awards;
    }

    public function getByChallengeId($challengeId)
    {
        $query = "SELECT * FROM Awards WHERE idChallenge = $challengeId";
        $result = $this->select($query);

        $awards = [];
        while ($row = $result->fetch()) {
            $award = new Award();
            $award->setIdAward($row['idAward']);
            $award->setIdChallenge($row['idChallenge']);
            $award->setDescription($row['description']);
            $award->setImagePath($row['imagePath']);
            $award->setDate($row['date']);

            $awards[] = $award;
        }

        if (count($awards) == 1) {
            return $awards[0];
        }

        return $awards;
    }


    public function getById($id)
    {
        $result = $this->select("SELECT * FROM Awards WHERE idAward = $id");
        $data = $result->fetch();

        if ($data) {
            $award = new Award();
            $award->setIdAward($data['idAward']);
            $award->setIdUser($data['idUser']);
            $award->setIdChallenge($data['idChallenge']);
            $award->setDescription($data['description']);
            $award->setDate($data['date']);
            $award->setImagePath($data['imagePath']);

            return $award;
        }

        return null;
    }

    public function updateUser(Award $award)
    {
        try {
            $params = [
                ':idChallenge' => $award->getIdChallenge(),
                ':idUser' => $award->getIdUser(),
            ];

            $condition = 'idChallenge = :idChallenge';

            return $this->update('Awards', 'idUser = :idUser', $params, $condition);
        } catch (\Exception $e) {
            throw new \Exception("Erro na atualização do vencedor do desafio. " . $e->getMessage(), 500);
        }
    }
    public function checkAwardUserId($idChallenge)
    {
        $sql = "
        SELECT idUser
        FROM Awards
        WHERE idChallenge = $idChallenge
        LIMIT 1
    ";
        $result = $this->select($sql);
        $data = $result->fetch();

        return ($data) ? $data['idUser'] : null;
    }

    public function alterAward(Award $award)
    {
        try {
            $params = [
                ':idUser' => $award->getIdUser(),
                ':idChallenge' => $award->getIdChallenge(),
                ':description' => $award->getDescription(),
                ':date' => $award->getDate(),
                ':imagePath' => $award->getImagePath(),
                ':idAward' => $award->getIdAward(),
            ];

            $where = 'idAward = :idAward';

            $this->update('Awards', 'idUser = :idUser, idChallenge = :idChallenge, description = :description, date = :date, imagePath = :imagePath', $params, $where);
        } catch (\Exception $e) {
            throw new \Exception("Erro na alteração do prêmio. " . $e->getMessage(), 500);
        }
    }


    public function drop($id)
    {
        try {
            return $this->delete('Awards', "idAward = $id");
        } catch (\Exception $e) {
            throw new \Exception("Error deleting award. " . $e->getMessage(), 500);
        }
    }

    public function getAll()
    {
        $result = $this->select("SELECT * FROM Awards");

        $awards = [];
        while ($data = $result->fetch()) {
            $award = new Award();
            $award->setIdAward($data['idAward']);
            $award->setIdUser($data['idUser']);
            $award->setIdChallenge($data['idChallenge']);
            $award->setDescription($data['description']);
            $award->setDate($data['date']);
            $award->setImagePath($data['imagePath']);

            $awards[] = $award;
        }

        return $awards;
    }
}
