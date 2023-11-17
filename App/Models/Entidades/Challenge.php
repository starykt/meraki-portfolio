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
	private $deadline;
	private $idProject;
	private $totalLikes;
	private $userName;
	private $userId;


	public function getUserId()
	{
		return $this->userId;
	}


	public function setUserId($userId)
	{
		$this->userId = $userId;
		return $this;
	}
	public function getIdProject()
	{
		return $this->idProject;
	}


	public function setIdProject($idProject)
	{
		$this->idProject = $idProject;
		return $this;
	}

	public function getTotalLikes()
	{
		return $this->totalLikes;
	}

	public function setTotalLikes($totalLikes)
	{
		$this->totalLikes = $totalLikes;
		return $this;
	}


	public function getUserName()
	{
		return $this->userName;
	}


	public function setUserName($userName)
	{
		$this->userName = $userName;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getDeadline()
	{
		return $this->deadline;
	}
	/**
	 * @param mixed $deadline
	 * @return self
	 */
	public function setDeadline($deadline): self
	{
		$this->deadline = $deadline;
		return $this;
	}
	/**
	 * @return mixed
	 */
	public function getIdChallenge()
	{
		return $this->idChallenge;
	}

	/**
	 * @param mixed $idChallenge 
	 * @return self
	 */
	public function setIdChallenge($idChallenge): self
	{
		$this->idChallenge = $idChallenge;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getIdUser()
	{
		return $this->idUser;
	}

	/**
	 * @param mixed $idUser 
	 * @return self
	 */
	public function setIdUser($idUser): self
	{
		$this->idUser = $idUser;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getGoal()
	{
		return $this->goal;
	}

	/**
	 * @param mixed $goal 
	 * @return self
	 */
	public function setGoal($goal): self
	{
		$this->goal = $goal;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param mixed $name 
	 * @return self
	 */
	public function setName($name): self
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getReward()
	{
		return $this->reward;
	}

	/**
	 * @param mixed $reward 
	 * @return self
	 */
	public function setReward($reward): self
	{
		$this->reward = $reward;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getBanner()
	{
		return $this->banner;
	}

	/**
	 * @param mixed $banner 
	 * @return self
	 */
	public function setBanner($banner): self
	{
		$this->banner = $banner;
		return $this;
	}
}
