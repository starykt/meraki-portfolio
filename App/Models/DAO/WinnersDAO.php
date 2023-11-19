<?php
namespace App\Models\DAO;

use App\Models\Entidades\Winner;

class WinnersDAO extends BaseDAO
{
    public function save(Winner $winner)
    {
        try {
            $idChallenge = $winner->getIdChallenge();
            $idUser = $winner->getIdUser();

            $params = [
                ':idChallenge' => $idChallenge,
                ':idUser' => $idUser,
            ];

            return $this->insert('Winners', ':idChallenge, :idUser', $params);
        } catch (\Exception $e) {
            throw new \Exception("Error saving winner. " . $e->getMessage(), 500);
        }
    }

    public function getById($id)
    {
        // Implemente a lógica de getById aqui
    }

    public function alter(Winner $winner)
    {
        // Implemente a lógica de update aqui
    }

    public function drop($id)
    {
        // Implemente a lógica de delete aqui
    }

    public function getAll()
    {
        // Implemente a lógica de getAll aqui
    }
}
