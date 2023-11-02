<?php

namespace App\Models\Entidades;

class Report
{
    private $idReport;
    private User $idUser;
    private Project $idProject;
    private $report;
    private $action;


	/**
	 * @return mixed
	 */
	public function getIdReport() {
		return $this->idReport;
	}
	
	/**
	 * @param mixed $idReport 
	 * @return self
	 */
	public function setIdReport($idReport): self {
		$this->idReport = $idReport;
		return $this;
	}
	
	/**
	 * @return User
	 */
	public function getIdUser(): User {
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
	 * @return Project
	 */
	public function getIdProject(): Project {
		return $this->idProject;
	}
	
	/**
	 * @param Project $idProject 
	 * @return self
	 */
	public function setIdProject(Project $idProject): self {
		$this->idProject = $idProject;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getReport() {
		return $this->report;
	}
	
	/**
	 * @param mixed $report 
	 * @return self
	 */
	public function setReport($report): self {
		$this->report = $report;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getAction() {
		return $this->action;
	}
	
	/**
	 * @param mixed $action 
	 * @return self
	 */
	public function setAction($action): self {
		$this->action = $action;
		return $this;
	}
}
