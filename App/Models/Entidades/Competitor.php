<?php
namespace App\Models\Entidades;

class Competitor
{
    private $idChallenge;
    private $idUser;
    private $position;

  

	/**
	 * @return mixed
	 */
	public function getIdChallenge() {
		return $this->idChallenge;
	}
	
	/**
	 * @param mixed $idChallenge 
	 * @return self
	 */
	public function setIdChallenge($idChallenge): self {
		$this->idChallenge = $idChallenge;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getIdUser() {
		return $this->idUser;
	}
	
	/**
	 * @param mixed $idUser 
	 * @return self
	 */
	public function setIdUser($idUser): self {
		$this->idUser = $idUser;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getPosition() {
		return $this->position;
	}
	
	/**
	 * @param mixed $position 
	 * @return self
	 */
	public function setPosition($position): self {
		$this->position = $position;
		return $this;
	}
}
?>