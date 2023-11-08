<?php

namespace App\Models\DAO;

use App\Models\Entidades\Project;
use App\Models\Entidades\SaveProject;
use App\Models\Entidades\User;

class SaveProjectDAO extends BaseDAO
{
    public function createSave($idProject, $idUser)
    {
        try {
            return $this->insert(
                'Save_Projects',
                ":idProject, :idUser",
                [
                    ':idProject' => $idProject,
                    ':idUser' => $idUser
                ]
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados." . $e->getMessage(), 500);
        }
    }

    public function getSavedProjectsByUserId($idUser)
    {
        $sql = "SELECT * FROM Save_Projects WHERE idUser = $idUser";
        $resultado = $this->select($sql);
        $savedProjects = [];
        while ($dataSet = $resultado->fetch()) {
            $project = new Project();
            $project->setIdProject($dataSet['idProject']);
            $user = new User();
            $user->setIdUser($dataSet['idUser']);
            $project->setIdUser($user);
            $savedProjects[] = $project;
        }
        
        return $savedProjects;
    }
    

    public function deleteSave($idProject, $idUser)
    {
        try {
            return $this->delete('Save_Projects', "idProject = $idProject AND idUser = $idUser");
        } catch (\Exception $e) {
            throw new \Exception("Erro ao excluir o Save. " . $e->getMessage(), 500);
        }
    }

    public function getSaveStatus($idProject, $idUser)
    {
        $resultado = $this->select(
            "SELECT COUNT(*) as SaveCount FROM Save_Projects WHERE idProject = $idProject AND idUser = $idUser"
        );

        $dataSet = $resultado->fetch();

        if ($dataSet && $dataSet['SaveCount'] > 0) {
            return true;
        }

        return false;
    }
}
