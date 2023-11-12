<?php

namespace App\Models\Entidades;

class Challenge
{
    private $idChallenge;
    private $idUser;
    private $goal;
    private $name;
    private $reward;
    private $banner;


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
	public function getGoal() {
		return $this->goal;
	}
	
	/**
	 * @param mixed $goal 
	 * @return self
	 */
	public function setGoal($goal): self {
		$this->goal = $goal;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getName() {
		return $this->name;
	}
	
	/**
	 * @param mixed $name 
	 * @return self
	 */
	public function setName($name): self {
		$this->name = $name;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getReward() {
		return $this->reward;
	}
	
	/**
	 * @param mixed $reward 
	 * @return self
	 */
	public function setReward($reward): self {
		$this->reward = $reward;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getBanner() {
		return $this->banner;
	}
	
	/**
	 * @param mixed $banner 
	 * @return self
	 */
	public function setBanner($banner): self {
		$this->banner = $banner;
		return $this;
	}
}


?>