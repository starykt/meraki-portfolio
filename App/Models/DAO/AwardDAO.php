<?php
namespace App\Models\DAO;

use App\Models\Entidades\Award;
use Exception;

class AwardDAO extends BaseDAO
{
  public function save(Award $award)
  {
      try {
          $idUser = null;
          $idChallenge = $award->getIdChallenge();
          $description = $award->getDescription();
          $date = $award->getDate();
          $imagePath = $award->getImagePath();

          $params = [
              ':idUser' => $idUser,
              ':idChallenge' => $idChallenge,
              ':description' => $description,
              ':date' => $date,
              ':imagePath' => $imagePath,
          ];

          return $this->insert('Awards', ':idUser, :idChallenge, :description, :date, :imagePath', $params);
      } catch (\Exception $e) {
          throw new \Exception("Error saving award. " . $e->getMessage(), 500);
      }
  }
  public function updateImagePath($idAward, $imagePath)
  {
      try {
          $params = [
              ':idAward' => $idAward,
              ':imagePath' => $imagePath,
          ];

          return $this->update('Awards', "imagePath = :imagePath", $params, "idAward = :idAward");
      } catch (\Exception $e) {
          throw new \Exception("Erro na atualização do caminho da imagem do prêmio. " . $e->getMessage(), 500);
      }
  }

  public function getAwardsByChallengeId($challengeId)
  {
      $query = "SELECT A.* FROM Awards A
                JOIN Awards AC ON A.idAward = AC.idAward
                WHERE AC.idChallenge = $challengeId";
      $resultado = $this->select($query);
  
      $awards = [];
      while ($row = $resultado->fetch()) {
          $award = new Award();
          $award->setIdAward($row['idAward']);
          $award->setDescription($row['description']);
          $award->setImagePath($row['imagePath']);
  
          $awards[] = $award;
      }
  
      return $awards;
  }
  
  public function getById($id)
  {
      $result = $this->select("SELECT * FROM Awards WHERE idAward = $id");
      $data = $result->fetch();

      if ($data) {
          $award = new Award();
          $award->setIdAward($data['idAward']);
          $award->setIdUser($data['idUser']);
          $award->setIdChallenge($data['idChallenge']);
          $award->setDescription($data['description']);
          $award->setDate($data['date']);
          $award->setImagePath($data['imagePath']);

          return $award;
      }

      return null;
  }

  public function updateAward(Award $award)
  {
      try {
          $idAward = $award->getIdAward();
          $idUser = $award->getIdUser();
          $idChallenge = $award->getIdChallenge();
          $description = $award->getDescription();
          $date = $award->getDate();
          $imagePath = $award->getImagePath();

          $params = [
              ':idUser' => $idUser,
              ':idChallenge' => $idChallenge,
              ':description' => $description,
              ':date' => $date,
              ':imagePath' => $imagePath,
              ':idAward' => $idAward,
          ];

          return $this->update('Awards', 'idUser = :idUser, idChallenge = :idChallenge, description = :description, date = :date, imagePath = :imagePath', "idAward = :idAward", $params);
      } catch (\Exception $e) {
          throw new \Exception("Error updating award. " . $e->getMessage(), 500);
      }
  }

  public function drop($id)
  {
      try {
          return $this->delete('Awards', "idAward = $id");
      } catch (\Exception $e) {
          throw new \Exception("Error deleting award. " . $e->getMessage(), 500);
      }
  }

  public function getAll()
  {
      $result = $this->select("SELECT * FROM Awards");

      $awards = [];
      while ($data = $result->fetch()) {
          $award = new Award();
          $award->setIdAward($data['idAward']);
          $award->setIdUser($data['idUser']);
          $award->setIdChallenge($data['idChallenge']);
          $award->setDescription($data['description']);
          $award->setDate($data['date']);
          $award->setImagePath($data['imagePath']);

          $awards[] = $award;
      }

      return $awards;
  }
}
?>