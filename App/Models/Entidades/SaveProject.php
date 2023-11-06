<?php
namespace App\Models\Entidades;

class SaveProject
{
    private $idSave;
    private $idProject;


	/**
	 * @return mixed
	 */
	public function getIdSave() {
		return $this->idSave;
	}
	
	/**
	 * @param mixed $idSave 
	 * @return self
	 */
	public function setIdSave($idSave): self {
		$this->idSave = $idSave;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getIdProject() {
		return $this->idProject;
	}
	
	/**
	 * @param mixed $idProject 
	 * @return self
	 */
	public function setIdProject($idProject): self {
		$this->idProject = $idProject;
		return $this;
	}
}
