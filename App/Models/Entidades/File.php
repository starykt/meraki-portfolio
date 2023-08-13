<?php

namespace App\Models\Entidades;

class File
{
  private int $idFile;
  private Project $idProject;
  private string $file;

	/**
	 * @return int
	 */
	public function getIdFile(): int {
		return $this->idFile;
	}
	
	/**
	 * @param int $idFile 
	 * @return self
	 */
	public function setIdFile(int $idFile): self {
		$this->idFile = $idFile;
		return $this;
	}
	
	/**
	 * @return Project
	 */
	public function getIdProject() {
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
	 * @return string
	 */
	public function getFile(): string {
		return $this->file;
	}
	
	/**
	 * @param string $file 
	 * @return self
	 */
	public function setFile(string $file): self {
		$this->file = $file;
		return $this;
	}
}

?>