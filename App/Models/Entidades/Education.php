<?php

namespace App\Models\Entidades;

class Education
{
    private $idEducation;
    private $formation;
    private $idUser;

    public function getIdEducation()
    {
        return $this->idEducation;
    }

    public function setIdEducation($idEducation)
    {
        $this->idEducation = $idEducation;
    }

    public function getFormation()
    {
        return $this->formation;
    }

    public function setFormation($formation)
    {
        $this->formation = $formation;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }

    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }
}
