<?php

namespace App\Models\Entidades;

class Report
{
    private $idReport;
    private User $idUser;
    private Project $idProject;
    private $report;
    private $action;
		private $files;
		private $images;
		private $hashtags;
		
		public function setHashtags(array $hashtags): self
		{
			$this->hashtags = $hashtags;
			return $this;
		}
		public function hasHashtags(): bool
		{
			return !empty($this->hashtags);
		}
		public function getHashtags(): array
		{
			return $this->hashtags ?? [];
		}
	
		public function setFiles(array $files)
		{
			$this->files = $files;
		}
	
		public function hasFiles(): bool
		{
			return !empty($this->files);
		}
	
		public function getFiles(): array
		{
			return $this->files;
		}
	
		public function setImages(array $images)
		{
			$this->images = $images;
		}
	
		public function hasImages(): bool
		{
			return !empty($this->images);
		}
	
		public function getImages(): array
		{
			return $this->images;
		}
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
