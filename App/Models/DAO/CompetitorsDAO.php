<?php
namespace App\Models\DAO;

use App\Models\Entidades\Competitor;

class CompetitorsDAO extends BaseDAO
{
    public function save(Competitor $competitor)
    {
        try {
            $idChallenge = $competitor->getIdChallenge();
            $idUser = $competitor->getIdUser();
            $position = $competitor->getPosition();

            $params = [
                ':idChallenge' => $idChallenge,
                ':idUser' => $idUser,
                ':position' => $position,
            ];

            return $this->insert('Competitors', 'idChallenge, idUser, position', $params);
        } catch (\Exception $e) {
            throw new \Exception("Error saving competitor. " . $e->getMessage(), 500);
        }
    }

    public function getById($id)
    {
        // Implemente a lógica de getById aqui
    }

    public function updateCompetitor(Competitor $competitor)
    {
        // Implemente a lógica de update aqui
    }

    public function deleteCompetitor($id)
    {
        // Implemente a lógica de delete aqui
    }

    public function getAll()
    {
        // Implemente a lógica de getAll aqui
    }
}
