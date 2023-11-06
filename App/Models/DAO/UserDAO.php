<?php

namespace App\Models\DAO;

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
            $admin = 1;
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

    public function verify(string $email, string $password)
    {
        try {
            $query = $this->select("SELECT * FROM Users WHERE email = '$email'");
            $userData = $query->fetch();

            if (!$userData) {
                return 0;
            }

            $user = new User();
            $user->setIdUser($userData['idUser']);
            $user->setTag($userData['nickname']);
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

            if (!password_verify($password, $user->getPassword())) {
                return 0;
            }

            return $user->getIdUser();
        } catch (\Exception $e) {
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }

    public function edit(User $user)
    {
        try {
            $idUser = $user->getIdUser();
            $nickname = $user->getNickname();
            $email = $user->getEmail();
            $resume = $user->getResume();
            $location = $user->getLocation();
            $avatar = $user->getAvatar(); 
    
            $params = [
                ':idUser' => $idUser,
                ':nickname' => $nickname,
                ':email' => $email,
                ':resume' => $resume,
                ':location' => $location,
            ];
    
            return $this->update('Users', "nickname = :nickname, email = :email, resume = :resume, location = :location", $params, "idUser = :idUser");
        } catch (\Exception $e) {
            throw new \Exception("Erro na atualização dos dados do usuário. " . $e->getMessage(), 500);
        }
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
    
    public function drop(int $idUser)
    {
        try {
            return $this->delete('Users', "idUser = $idUser");
        } catch (\Exception $e) {
            throw new \Exception("Erro ao excluir o usuario. " . $e->getMessage(), 500);
        }
    }
}
