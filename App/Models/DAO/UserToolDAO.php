<?php

namespace App\Models\DAO;

use App\Models\Entidades\UserTool;
use Exception;

class UserToolDAO extends BaseDAO
{
    public function save(UserTool $userTool)
    {
        try {
            $idUser = $userTool->getIdUser();
            $idTool = $userTool->getIdTool();

            $params = [
                ':idUser' => $idUser,
                ':idTool' => $idTool,
            ];

            return $this->insert('Users_Tools', ':idUser, :idTool', $params);
        } catch (\Exception $e) {
            throw new \Exception("Error saving user-tool association. " . $e->getMessage(), 500);
        }
    }

    public function getByUserId(int $idUser)
    {
        $result = $this->select("SELECT * FROM Users_Tools WHERE idUser = $idUser");

        $associations = [];
        while ($row = $result->fetch()) {
            $userTool = new UserTool();
            $userTool->setIdUser($row['idUser']);
            $userTool->setIdTool($row['idTool']);
            $associations[] = $userTool;
        }

        return $associations;
    }

    public function deleteByUserId(int $idUser, int $idTool)
    {
        try {
            return $this->delete('Users_Tools', "idUser = $idUser AND idTool = $idTool");
        } catch (\Exception $e) {
            throw new \Exception("Error deleting user-tool association. " . $e->getMessage(), 500);
        }
    }
}
