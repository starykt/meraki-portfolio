<?php

namespace App\Models\DAO;

use App\Models\Entidades\Project;
use App\Models\Entidades\User;
use Exception;

class UserDAO extends BaseDAO
{

    public function getById(int $idUser)
    {
        $resultado = $this->select("SELECT * FROM Users WHERE idUser = $idUser");
        $userData = $resultado->fetch();

        if ($userData) {
            $user = new User();
            $user->setIdUser($userData['idUser']);
            $user->setNickname($userData['nickname']);
            $user->setTag($userData['tag']);
            $user->setEmail($userData['email']);
            $user->setPassword($userData['password']);
            $user->setLevel($userData['level']);
            $user->setXp($userData['xp']);
            $user->setAdmin($userData['admin']);
            $user->setResume($userData['resume']);
            $user->setLocation($userData['location']);
            $user->setAvatar($userData['avatar']);
            $user->setCreatedAt(new \DateTime($userData['createdAt']));
            return $user;
        }

        return null;
    }

    public function list()
    {
        $result = $this->select("SELECT * FROM Users");


        $dataSet = $result->fetchAll();
        $listUser = [];

        if ($dataSet) {
            foreach ($dataSet as $data) {
                $user = new User();
                $user->setIdUser($data['idUser']);
                $user->setNickname($data['nickname']);
                $user->setAvatar($data['avatar']);
                $user->setStatus($data['status']);
                $user->setTag($data['tag']);
                $user->setAdmin($data['admin']);
                $listUser[] = $user;
            }
        }
        return $listUser;
    }

    public function getByEmail(string $email)
    {
        $resultado = $this->select("SELECT idUser, email, password FROM Users WHERE email = '$email'");

        return $resultado->fetch();
    }

    public function save(User $user)
    {
        try {
            $tag = $user->generateRandomTag();
            $nickname = $user->getNickname();
            $email = $user->getEmail();
            $password = password_hash($user->getPassword(), PASSWORD_DEFAULT);
            $level = 1;
            $xp = 0;
            $resume = $user->getResume();
            $admin = 0;
            $createdAt = $user->getCreatedAt()->format('Y-m-d H:i:s');
            $location = $user->getLocation();

            $params = [
                ':tag' => $tag,
                ':nickname' => $nickname,
                ':email' => $email,
                ':password' => $password,
                ':level' => $level,
                ':xp' => $xp,
                ':resume' => $resume,
                ':admin' => $admin,
                ':createdAt' => $createdAt,
                ':location' => $location,
            ];

            return $this->insert('Users', " :tag, :nickname, :email, :password,:level, :xp, :resume, :admin, :createdAt, :location", $params);
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação dos dados. " . $e->getMessage(), 500);
        }
    }

    public function verifyEmail($email)
    {
        try {
            $query = $this->select(
                "SELECT * FROM Users WHERE email = '$email'"
            );
            return $query->fetch();
        } catch (\Exception $e) {
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }

    public function verify(string $identifier, string $password)
    {
        try {
            $isEmail = filter_var($identifier, FILTER_VALIDATE_EMAIL) !== false;
            $condition = $isEmail ? "email" : "CONCAT(nickname, '#', tag)";

            $query = $this->select("SELECT * FROM Users WHERE $condition = '$identifier'");
            $userData = $query->fetch();

            if (!$userData) {
                return 0;
            }

            $user = new User();
            $user->setIdUser($userData['idUser']);
            $user->setTag($userData['tag']);
            $user->setNickname($userData['nickname']);
            $user->setEmail($userData['email']);
            $user->setPassword($userData['password']);
            $user->setAvatar($userData['avatar']);
            $user->setLevel($userData['level']);
            $user->setXp($userData['xp']);
            $user->setResume($userData['resume']);
            $user->setAdmin($userData['admin']);
            $createdAt = \DateTime::createFromFormat('Y-m-d H:i:s', $userData['createdAt']);
            $user->setCreatedAt($createdAt);
            $user->setLocation($userData['location']);
            $user->setStatus($userData['status']);

            if (!password_verify($password, $user->getPassword())) {
                return 0;
            }

            return $user->getIdUser();
        } catch (\Exception $e) {
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }

    public function getUserByEmailOrUsername($emailOrUsername) {
        if (filter_var($emailOrUsername, FILTER_VALIDATE_EMAIL)) {
            return $this->getUserByEmail($emailOrUsername);
        } else {
            return $this->getUserByNicknameAndTag($emailOrUsername);
        }
    }

    private function getUserByEmail($email) {
        try {
            $sql = "SELECT * FROM Users WHERE email = '$email'";
            $query = $this->select($sql);
    
            if ($userData = $query->fetch()) {
                return $this->createUserFromData($userData);
            }
            return null;
        } catch (\Exception $e) {
            throw new \Exception("Erro no acesso aos dados. " . $e->getMessage(), 500);
        }
    }
    public function updatePasswordByToken($token, $newPassword)
    {
        try {
            if (!$this->validateTokenInDatabase($token)) {
                throw new Exception("Token inválido.", 400);
            }
            $idUser = $this->getUserIdByToken($token);
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $params = [
                ':password' => $hashedPassword,
                ':idUser' => $idUser,
            ];
    
            $this->update('Users', 'password = :password', $params, 'idUser = :idUser');
            $this->deleteToken($idUser, $token);
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar a senha. " . $e->getMessage(), 500);
        }
    }
    

    private function getUserIdByToken($token)
    {
        try {
            $sql = "SELECT idUser FROM Tokens WHERE token = '$token'";
            $result = $this->select($sql);
            
            if (!$result) {
                throw new Exception("Token não encontrado.", 404);
            }
    
            $userData = $result->fetch();
            if (!$userData) {
                throw new Exception("Token não encontrado.", 404);
            }
            return $userData['idUser'];
        } catch (Exception $e) {
            throw new Exception("Erro ao obter o ID do usuário pelo token. " . $e->getMessage(), 500);
        }
    }
    
    
    public function validateTokenInDatabase($token)
    {
        $sql = "SELECT * FROM Tokens WHERE token = '$token'";
        $result = $this->select($sql);

        return !empty($result);
    }
    public function createToken($idUser, $token)
    {
        try {
            $params = [
                ':idUser' => $idUser,
                ':token' => $token,
            ];

            return $this->insert('Tokens', ':idUser, :token', $params);
        } catch (\Exception $e) {
            throw new \Exception("Error creating token. " . $e->getMessage(), 500);
        }
    }

    public function verifyToken($idUser, $token)
    {
        try {
            $params = [
                ':idUser' => $idUser,
                ':token' => $token,
            ];

            $result = $this->select("SELECT * FROM Tokens WHERE idUser = :idUser AND token = :token", $params);

            return !empty($result);
        } catch (\Exception $e) {
            throw new \Exception("Error verifying token. " . $e->getMessage(), 500);
        }
    }

    public function deleteToken($idUser, $token)
    {
        try {
            return $this->delete('Tokens', "idUser = '$idUser' AND token = '$token'");
        } catch (\Exception $e) {
            throw new \Exception("Erro ao excluir a token. " . $e->getMessage(), 500);
        }
    }
    
    private function getUserByNicknameAndTag($nicknameAndTag) {
        list($nickname, $tag) = explode('#', $nicknameAndTag);

        $sql = "SELECT * FROM Users WHERE nickname = '$nickname' AND tag = '$tag'";
        $result = $this->select($sql);

        if ($result) {
            $userData = reset($result);
            return $this->createUserFromData($userData);
        }

        return null;
    }

    private function createUserFromData($userData) {
        if (is_array($userData)) {
            $user = new User();
            $user->setIdUser($userData['idUser']);
            $user->setNickname($userData['nickname']);
            $user->setTag($userData['tag']);
            $user->setEmail($userData['email']);
            $user->setPassword($userData['password']);
            return $user;
        }
    
        return null;
    }
    

    public function getUsersByLikes()
    {
        $query = "SELECT u.*, COUNT(l.idLike) AS likeCount
                  FROM Users u
                  LEFT JOIN Projects p ON u.idUser = p.idUser
                  LEFT JOIN Likes l ON p.idProject = l.idProject
                  GROUP BY u.idUser
                  ORDER BY likeCount DESC";

        $result = $this->select($query);

        $users = [];
        while ($row = $result->fetch()) {
            $user = new User();
            $user->setIdUser($row['idUser']);
            $user->setNickname($row['nickname']);
            $user->setTag($row['tag']);
            $user->setAvatar($row['avatar']);
            $user->setLevel($row['level']);
            $user->setLikes($row['likeCount']);
            $user->setStatus($row['status']);
            $users[] = $user;
        }

        return $users;
    }

    public function getUsersByAwards()
    {
        $query = "SELECT u.*, COUNT(a.idAward) AS awardCount
                  FROM Users u
                  LEFT JOIN Awards a ON u.idUser = a.idUser
                  GROUP BY u.idUser
                  ORDER BY awardCount DESC";
        $result = $this->select($query);

        $users = [];
        while ($row = $result->fetch()) {
            $user = new User();
            $user->setIdUser($row['idUser']);
            $user->setNickname($row['nickname']);
            $user->setTag($row['tag']);
            $user->setAvatar($row['avatar']);
            $user->setLevel($row['level']);
            $user->setAwards($row['awardCount']);
            $user->setStatus($row['status']);
            $users[] = $user;
        }
        return $users;
    }

    public function getUsersByLevel()
    {
        $query = "SELECT * FROM Users ORDER BY level DESC";
        $result = $this->select($query);

        $users = [];
        while ($row = $result->fetch()) {
            $user = new User();
            $user->setIdUser($row['idUser']);
            $user->setNickname($row['nickname']);
            $user->setTag($row['tag']);
            $user->setAvatar($row['avatar']);
            $user->setLevel($row['level']);
            $user->setStatus($row['status']);
            $users[] = $user;
        }

        return $users;
    }

    public function edit(User $user)
    {
        try {
            $idUser = $user->getIdUser();
            $resume = $user->getResume();
            $location = $user->getLocation();
            $avatar = $user->getAvatar();

            $params = [
                ':idUser' => $idUser,
                ':resume' => $resume,
                ':location' => $location,
            ];

            return $this->update('Users', "resume = :resume, location = :location", $params, "idUser = :idUser");
        } catch (\Exception $e) {
            throw new \Exception("Erro na atualização dos dados do usuário. " . $e->getMessage(), 500);
        }
    }

    public function getUserByChallengeId($challengeId)
    {
        $query = "SELECT U.* FROM Users U
                  JOIN Challenges C ON U.idUser = C.idUser
                  WHERE C.idChallenge = $challengeId";

        $result = $this->select($query);

        if ($row = $result->fetch()) {
            $user = new User();
            $user->setIdUser($row['idUser']);
            $user->setNickname($row['nickname']);
            $user->setAvatar($row['avatar']);
            $user->setStatus($row['status']);
            return $user;
        }

        return null;
    }

    public function updateAvatar($idUserName, $avatarName)
    {
        try {
            $idUser = $idUserName;
            $avatar = $avatarName;

            $params = [
                ':idUser' => $idUser,
                ':avatar' => $avatar,
            ];
            return $this->update('Users', "avatar = :avatar", $params, "idUser = :idUser");
        } catch (\Exception $e) {
            throw new \Exception("Erro na atualização dos dados. " . $e->getMessage(), 500);
        }
    }

    public function updateUserLevel($idUser, $level, $xp)
    {
        try {
            $params = [
                ':idUser' => $idUser,
                ':level' => $level,
                ':xp' => $xp,
            ];
            return $this->update('Users', 'level = :level, xp = :xp', $params, 'idUser = :idUser');
        } catch (\Exception $e) {
            throw new \Exception("Erro ao atualizar nível do usuário. " . $e->getMessage(), 500);
        }
    }


    public function drop(int $idUser)
    {
        try {
            return $this->delete('Users', "idUser = $idUser");
        } catch (\Exception $e) {
            throw new \Exception("Erro ao excluir o usuario. " . $e->getMessage(), 500);
        }
    }
    public function updateStatus($idUser, $status)
    {
        try {
            $params = [
                ':idUser' => $idUser,
                ':status' => $status,
            ];
            return $this->update('Users', 'status = :status', $params, 'idUser = :idUser');
        } catch (\Exception $e) {
            throw new \Exception("Erro ao atualizar nível do usuário. " . $e->getMessage(), 500);
        }
    }

    public function updateXPAndLevel($userId, $xpGained)
    {
        try {
            $user = $this->getById($userId);

            if (!$user) {
                throw new \Exception("User not found.");
            }

            $currentLevel = $user->getLevel();
            $currentXP = $user->getXP();

            $baseXP = 100;
            $xpPerLevel = 100;

            $xpForNextLevel = $baseXP + $xpPerLevel * $currentLevel;

            $newXP = $currentXP + $xpGained;

            while ($newXP >= $xpForNextLevel) {
                $currentLevel++;
                $newXP -= $xpForNextLevel;
                $xpForNextLevel = $baseXP + $xpPerLevel * $currentLevel;
            }

            $user->setLevel($currentLevel);
            $user->setXP($newXP);

            $this->updateUserLevel2($user);
        } catch (\Exception $e) {
            throw new \Exception("Error updating XP and level. " . $e->getMessage(), 500);
        }
    }

    public function updateUserLevel2(User $user)
    {
        try {
            $params = [
                ':level' => $user->getLevel(),
                ':xp' => $user->getXP(),
                ':userId' => $user->getIdUser(),
            ];

            $condition = 'idUser = :userId';

            $this->update('Users', 'level = :level, xp = :xp', $params, $condition);
        } catch (\Exception $e) {
            throw new \Exception("Error updating user level. " . $e->getMessage(), 500);
        }
    }
    public function searchUsers($term)
    {
        $term = '%' . $term . '%';
        $sql = "SELECT DISTINCT u.*
                FROM Users u
                LEFT JOIN Users_Tools ut ON u.idUser = ut.idUser
                LEFT JOIN Tools t ON ut.idTool = t.idTool
                WHERE CONCAT(u.nickname, ' #', u.tag) LIKE '$term' OR t.caption LIKE '$term'";

        $result = $this->select($sql);

        $users = [];

        foreach ($result as $userData) {
            $user = new User();
            $user->setIdUser($userData['idUser']);
            $user->setNickname($userData['nickname']);
            $user->setTag($userData['tag']);
            $user->setAvatar($userData['avatar']);

            $users[] = $user;
        }

        return $users;
    }
}
