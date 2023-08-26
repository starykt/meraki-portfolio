<?php

namespace App\Models\Entidades;

class Hashtag
{
  private int $idHashtag;
  private string $hashtag;


	/**
	 * @return int
	 */
	public function getIdHashtag(): int {
		return $this->idHashtag;
	}
	
	/**
	 * @param int $idHashtag 
	 * @return self
	 */
	public function setIdHashtag(int $idHashtag): self {
		$this->idHashtag = $idHashtag;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getHashtag(): string {
		return $this->hashtag;
	}
	
	/**
	 * @param string $hashtag 
	 * @return self
	 */
	public function setHashtag(string $hashtag): self {
		$this->hashtag = $hashtag;
		return $this;
	}
}