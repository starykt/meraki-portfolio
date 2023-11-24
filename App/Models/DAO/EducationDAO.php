<?php

namespace App\Models\DAO;

use App\Models\Entidades\Education;
use Exception;

class EducationDAO extends BaseDAO
{
  public function save(Education $education)
  {
      try {
          $params = [
              ':idUser' => $education->getIdUser(),
              ':formation' => $education->getFormation(),
          ];
  
          return $this->insert('Educations', ':idUser, :formation', $params);
      } catch (\Exception $e) {
          throw new \Exception("Error saving education. " . $e->getMessage(), 500);
      }
  }
  
    public function getByUserId(int $idUser)
    {
        $result = $this->select("SELECT * FROM Educations WHERE idUser = $idUser");

        $educations = [];
        while ($row = $result->fetch()) {
            $education = new Education();
            $education->setIdUser($row['idUser']);
            $education->setFormation($row['formation']);
            $education->setIdEducation($row['idEducation']);
            $educations[] = $education;
        }

        return $educations;
    }

    public function drop(int $idEducation)
{
    try {
        return $this->delete('Educations', "idEducation = $idEducation");
    } catch (\Exception $e) {
        throw new \Exception("Error dropping education records. " . $e->getMessage(), 500);
    }
}

}
