<?php

namespace App\Models\Entidades;

class Project
{
private int $idProject;
private User $idUser;
private string $title;
private string $description;
private \DateTime $created_At;
private array $files;
private array $images;
private array $hashtags;
private $likeCount;

private $likeStatus;
    private $creatorUser;


    public function setLikeStatus($likeStatus)
    {
        $this->likeStatus = $likeStatus;
    }

    public function getLikeStatus()
    {
        return $this->likeStatus;
    }

    public function setCreatorUser(User $creatorUser)
    {
        $this->creatorUser = $creatorUser;
    }

    public function getCreatorUser()
    {
        return $this->creatorUser;
    }

public function setLikeCount($likeCount)
{
		$this->likeCount = $likeCount;
}

public function getLikeCount()
{
		return $this->likeCount;
}

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
	public function getCreated_At(): \DateTime {
		return $this->created_At;
	}
	
	/**
	 * @param \DateTime $created_At 
	 * @return self
	 */
	public function setCreated_At(\DateTime $created_At): self {
		$this->created_At = $created_At;
		return $this;
	}
}
