<?php

namespace App\Models\Entidades;

class Project
{
private int $idProject;
private User $idUser;
private string $title;
private string $description;
private \DateTime $createdAt;

	/**
	 * @return int
	 */
	public function getIdProject(): int {
		return $this->idProject;
	}
	
	/**
	 * @param int $idProject 
	 * @return self
	 */
	public function setIdProject(int $idProject): self {
		$this->idProject = $idProject;
		return $this;
	}
	
	/**
	 * @return User
	 */
	public function getIdUser(){
		return $this->idUser;
	}
	
	/**
	 * @param User $idUser 
	 * @return self
	 */
	public function setIdUser(User $idUser): self {
		$this->idUser = $idUser;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getTitle(): string {
		return $this->title;
	}
	
	/**
	 * @param string $title 
	 * @return self
	 */
	public function setTitle(string $title): self {
		$this->title = $title;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getDescription(): string {
		return $this->description;
	}
	
	/**
	 * @param string $description 
	 * @return self
	 */
	public function setDescription(string $description): self {
		$this->description = $description;
		return $this;
	}
	
	/**
	 * @return \DateTime
	 */
	public function getCreatedAt(): \DateTime {
		return $this->createdAt;
	}
	
	/**
	 * @param \DateTime $createdAt 
	 * @return self
	 */
	public function setCreatedAt(\DateTime $createdAt): self {
		$this->createdAt = $createdAt;
		return $this;
	}
}

?>