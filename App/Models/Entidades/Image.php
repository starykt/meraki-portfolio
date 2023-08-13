<?php

namespace App\Models\Entidades;

class Image
{
  private int $idImage;
  private Project $idProject;
  private string $image;

	/**
	 * @return int
	 */
	public function getIdImage(): int {
		return $this->idImage;
	}
	
	/**
	 * @param int $idImage 
	 * @return self
	 */
	public function setIdImage(int $idImage): self {
		$this->idImage = $idImage;
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
	public function getImage(): string {
		return $this->image;
	}
	
	/**
	 * @param string $image 
	 * @return self
	 */
	public function setImage(string $image): self {
		$this->image = $image;
		return $this;
	}
}

?>