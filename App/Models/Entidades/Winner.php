<?php

namespace App\Models\Entidades;

class Winner
{
    private $idChallenge;
    private $idUser;


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
}


?>