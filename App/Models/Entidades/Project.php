<?php

namespace App\Models\Entidades;

use App\Models\DAO\ProjectDAO;

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

	private array $comments;

	private $creatorUser;
	private int $likesCount;
	private $mostLikedProjects;
	private $details;
	private $saveStatus;

	private $user; // Propriedade para armazenar o objeto User associado ao projeto

	// ... Outras propriedades e métodos ...

	public function getUser() {
			return $this->user;
	}

	public function setUser(User $user) {
			$this->user = $user;
	}

	public function setSaveStatus($saveStatus)
	{
		$this->saveStatus = $saveStatus;
	}

	public function getSaveStatus()
	{
		return $this->saveStatus;
	}

	public function setDetails($details)
	{
			$this->details = $details;
	}

	public function getDetails()
	{
			return $this->details;
	}

	public function setMostLikedProjects(array $mostLikedProjects)
	{
			$this->mostLikedProjects = $mostLikedProjects;
	}

	/**
	 * @return int
	 */
	public function getLikesCount(): int
	{
			return $this->likesCount;
	}

	/**
	 * @param int $likesCount
	 * @return self
	 */
	public function setLikesCount(int $likesCount): self
	{
			$this->likesCount = $likesCount;
			return $this;
	}

	public function getComments(): array
	{
			return $this->comments;
	}

	public function setComments(array $comments): void
	{
			$this->comments = $comments;
	}

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
	public function getIdProject(): int
	{
		return $this->idProject;
	}

	/**
	 * @param int $idProject 
	 * @return self
	 */
	public function setIdProject(int $idProject): self
	{
		$this->idProject = $idProject;
		return $this;
	}

	/**
	 * @return User
	 */
	public function getIdUser()
	{
		return $this->idUser;
	}

	/**
	 * @param User $idUser 
	 * @return self
	 */
	public function setIdUser(User $idUser): self
	{
		$this->idUser = $idUser;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getTitle(): string
	{
		return $this->title;
	}

	/**
	 * @param string $title 
	 * @return self
	 */
	public function setTitle(string $title): self
	{
		$this->title = $title;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getDescription(): string
	{
		return $this->description;
	}

	/**
	 * @param string $description 
	 * @return self
	 */
	public function setDescription(string $description): self
	{
		$this->description = $description;
		return $this;
	}

	/**
	 * @return \DateTime
	 */
	public function getCreated_At(): \DateTime
	{
		return $this->created_At;
	}

	/**
	 * @param \DateTime $created_At 
	 * @return self
	 */
	public function setCreated_At(\DateTime $created_At): self
	{
		$this->created_At = $created_At;
		return $this;
	}
}
