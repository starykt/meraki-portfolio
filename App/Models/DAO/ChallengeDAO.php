<?php

namespace App\Models\DAO;

use App\Models\Entidades\Award;
use App\Models\Entidades\Challenge;
use App\Models\Entidades\Hashtag;
use App\Models\Entidades\Project;
use App\Models\Entidades\User;


class ChallengeDAO extends BaseDAO
{
    public function save(Challenge $challenge)
    {
        try {
            $name = $challenge->getName();
            $goal = $challenge->getGoal();
            $reward = $challenge->getReward();
            $idUser = $challenge->getIdUser();
            $deadline = $challenge->getDeadline();

            $params = [
                ':name' => $name,
                ':goal' => $goal,
                ':reward' => $reward,
                ':idUser' => $idUser,
                ':deadline' => $deadline,
            ];

            return $this->insert('Challenges', ':name, :goal, :reward, :idUser, :deadline', $params);
        } catch (\Exception $e) {
            throw new \Exception("Error saving challenge. " . $e->getMessage(), 500);
        }
    }


    public function alterChallenge(Challenge $challenge)
    {
        try {
            $params = [
                ':goal' => $challenge->getGoal(),
                ':name' => $challenge->getName(),
                ':reward' => $challenge->getReward(),
                ':idChallenge' => $challenge->getIdChallenge(),
                ':deadline' => $challenge->getDeadline(),
            ];

            $where = 'idChallenge = :idChallenge';

            $this->update('Challenges', 'goal = :goal, name = :name, reward = :reward, deadline = :deadline', $params, $where);
        } catch (\Exception $e) {
            throw new \Exception("Error updating challenge. " . $e->getMessage(), 500);
        }
    }

    public function getChallengeWinner($challengeId)
    {
        $result = $this->select("
    SELECT HC.idChallenge, HP.idProject, P.idUser AS userId, COUNT(L.idUser) AS totalLikes, U.nickname AS userName
    FROM Hashtags_Challenges HC
    JOIN Hashtags_Projects HP ON HC.idHashtag = HP.idHashtag
    LEFT JOIN `Likes` L ON HP.idProject = L.idProject
    JOIN `Projects` P ON HP.idProject = P.idProject
    LEFT JOIN `Users` U ON P.idUser = U.idUser
    WHERE HC.idChallenge = $challengeId
    GROUP BY HC.idChallenge, HP.idProject, P.idUser
    ORDER BY totalLikes DESC
    LIMIT 1
");
        $data = $result->fetch();

        if (!$data) {
            return null;
        }
        $challenge = new Challenge();
        $challenge->setIdChallenge($data['idChallenge']);
        $challenge->setIdProject($data['idProject']);
        $challenge->setUserId($data['userId']);
        $challenge->setTotalLikes($data['totalLikes']);
        $challenge->setUserName($data['userName']);

        return $challenge;
    }

    public function awardWinnerIfDeadlinePassed($challengeId)
    {
        $challenge = $this->getById($challengeId);

        if (strtotime($challenge->getDeadline()) < time()) {
            $winner = $this->getChallengeWinner($challengeId);

            if ($winner) {
                $awardsDAO = new AwardDAO();
                $existingAwards = $awardsDAO->getAwardsByChallengeId($challengeId);

                if (!empty($existingAwards)) {
                    $existingAward = $existingAwards[0];
                    $existingAward->setIdUser($winner->getUserId());

                    $xpToAdd = $challenge->getReward();

                    $userDAO = new UserDAO();
                    $userDAO->updateXPAndLevel($winner->getUserId(), $xpToAdd);

                    $awardsDAO->updateUser($existingAward);
                }
            }
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
    public function getHashtagByChallengeId($idChallenge)
    {
        $sql = $this->select("SELECT Hashtags.* FROM Hashtags
                              JOIN Hashtags_Challenges ON Hashtags.idHashtag = Hashtags_Challenges.idHashtag
                              WHERE Hashtags_Challenges.idChallenge = '$idChallenge' LIMIT 1;");

        $hashtagData = $sql->fetch();

        if ($hashtagData) {
            $hashtag = new Hashtag();
            $hashtag->setIdHashtag($hashtagData['idHashtag']);
            $hashtag->setHashtag($hashtagData['hashtag']);

            return $hashtag;
        }

        return null;
    }
    public function getByProject($idChallenge)
    {
        $sql = $this->select("SELECT Projects.* FROM Projects 
                              JOIN Hashtags_Projects ON Projects.idProject = Hashtags_Projects.idProject 
                              JOIN Hashtags_Challenges ON Hashtags_Projects.idHashtag = Hashtags_Challenges.idHashtag 
                              WHERE Hashtags_Challenges.idChallenge = '$idChallenge' LIMIT 0, 25;");

        $projects = [];

        while ($projectData = $sql->fetch()) {
            $project = new Project();
            $project->setIdProject($projectData['idProject']);
            $project->setTitle($projectData['title']);
            $project->setDescription($projectData['description']);
            $project->setCreated_At(new \DateTime($projectData['created_At']));

            $userDAO = new UserDAO();
            $user = $userDAO->getById($projectData['idUser']);
            $project->setUser($user);

            $projects[] = $project;
        }

        return $projects;
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
        $challenge->setDeadline($data['deadline']);
        return $challenge;
    }


    public function getAll()
    {
        $result = $this->select("SELECT * FROM Challenges WHERE deadline >= CURDATE()");

        $challenges = [];
        while ($data = $result->fetch()) {
            $challenge = new Challenge();
            $challenge->setIdChallenge($data['idChallenge']);
            $challenge->setName($data['name']);
            $challenge->setGoal($data['goal']);
            $challenge->setReward($data['reward']);
            $challenge->setBanner($data['banner']);
            $challenge->setDeadline($data['deadline']);
            $challenges[] = $challenge;
        }

        return $challenges;
    }

    public function getChallengesAll()
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
