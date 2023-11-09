<?php
namespace App\Models\Entidades;

class UserTool
{
    private $idUser;
    private $idTool;

    
    public function setUser($idUser)
    {
        $this->idUser = $idUser;
        return $this;
    }

    public function setTool($idTool)
    {
        $this->idTool = $idTool;
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
	public function getIdTool() {
		return $this->idTool;
	}
	
	/**
	 * @param mixed $idTool 
	 * @return self
	 */
	public function setIdTool($idTool): self {
		$this->idTool = $idTool;
		return $this;
	}
}
