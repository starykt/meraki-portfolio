<?php
namespace App\Models\DAO;

use App\Models\Entidades\Award;
use App\Models\Entidades\Challenge;
use App\Models\Entidades\Hashtag;

class ChallengeDAO extends BaseDAO
{
public function save(Challenge $challenge)
{
    try {
        $name = $challenge->getName();
        $goal = $challenge->getGoal();
        $reward = $challenge->getReward();
        $idUser = $challenge->getIdUser();
        $params = [
            ':name' => $name,
            ':goal' => $goal,
            ':reward' => $reward,
            ':idUser' => $idUser,
        ];
        return $this->insert('Challenges', ':name, :goal, :reward, :idUser', $params);
    } catch (\Exception $e) {
        throw new \Exception("Error saving challenge. " . $e->getMessage(), 500);
    }
}


public function updateBanner($idChallenge, $bannerName)
{
    try {
        $params = [
            ':idChallenge' => $idChallenge,
            ':banner' => $bannerName,
        ];

        $condition = 'idChallenge = :idChallenge';

        return $this->update('Challenges', 'banner = :banner', $params, $condition);
    } catch (\Exception $e) {
        throw new \Exception("Erro na atualização dos dados. " . $e->getMessage(), 500);
    }
}

    public function getById($id)
    {
        $result = $this->select("SELECT * FROM Challenges WHERE idChallenge = $id");
        $data = $result->fetch();

        if (!$data) {
            return null;
        }

        $challenge = new Challenge();
        $challenge->setIdChallenge($data['idChallenge']);
        $challenge->setName($data['name']);
        $challenge->setGoal($data['goal']);
        $challenge->setReward($data['reward']);
        $challenge->setBanner($data['banner']);

        return $challenge;
    }

    public function updateChallenge(Challenge $challenge)
    {
        // Implemente a lógica de update aqui
    }

    public function deleteChallenge($id)
    {
        
    }

    public function getAll()
    {
        $result = $this->select("SELECT * FROM Challenges");

        $challenges = [];
        while ($data = $result->fetch()) {
            $challenge = new Challenge();
            $challenge->setIdChallenge($data['idChallenge']);
            $challenge->setName($data['name']);
            $challenge->setGoal($data['goal']);
            $challenge->setReward($data['reward']);
            $challenge->setBanner($data['banner']);
            $challenges[] = $challenge;
        }

        return $challenges;
    }

}
