<?php

namespace App\Models\Entidades;

class Award
{
    private $idAward;
    private $idUser;
    private $idChallenge;
    private $description;
    private $date;
    private $imagePath; 

	/**
	 * @return mixed
	 */
	public function getIdAward() {
		return $this->idAward;
	}
	
	/**
	 * @param mixed $idAward 
	 * @return self
	 */
	public function setIdAward($idAward): self {
		$this->idAward = $idAward;
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
	public function getDescription() {
		return $this->description;
	}
	
	/**
	 * @param mixed $description 
	 * @return self
	 */
	public function setDescription($description): self {
		$this->description = $description;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getDate() {
		return $this->date;
	}
	
	/**
	 * @param mixed $date 
	 * @return self
	 */
	public function setDate($date): self {
		$this->date = $date;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getImagePath() {
		return $this->imagePath;
	}
	
	/**
	 * @param mixed $imagePath 
	 * @return self
	 */
	public function setImagePath($imagePath): self {
		$this->imagePath = $imagePath;
		return $this;
	}
}