<?php
namespace App\Models\Entidades;

class HashtagChallenge
{
    private $idChallenge;
    private $idHashtag;

		private $hashtag;
    private $challenge;


    public function setHashtag(Hashtag $hashtag)
    {
        $this->hashtag = $hashtag;
    }

    public function setChallenge(Challenge $challenge)
    {
        $this->challenge = $challenge;
    }

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
	public function getIdHashtag() {
		return $this->idHashtag;
	}
	
	/**
	 * @param mixed $idHashtag 
	 * @return self
	 */
	public function setIdHashtag($idHashtag): self {
		$this->idHashtag = $idHashtag;
		return $this;
	}
}
?>