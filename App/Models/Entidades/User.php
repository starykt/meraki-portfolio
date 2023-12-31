<?php

namespace App\Models\Entidades;

use App\Models\DAO\UserDAO;

class User
{
	private int $idUser;
	private string $tag;
	private string $nickname;
	private string $email;
	private string $password;
	private ?string $avatar;
	private int $level;
	private float $xp;
	private ?string $resume = null;
	private int $admin;
	private \DateTime $createdAt;
	private ?string $location = null;
	private $likes;
	private ?string $status = null;
	private int $awards;
	public function setStatus($status)
	{
		$this->status = $status;
	}

	public function getStatus()
	{
		return $this->status;
	}

	/**
	 * @param int $awards
	 */
	public function setAwards(int $awards)
	{
		$this->awards = $awards;
	}

	/**
	 * @return int
	 */
	public function getAwards(): int
	{
		return $this->awards ?? 0;
	}


	function updateXPAndLevel($userId, $xpGained)
	{
		$userDAO = new UserDAO();
		$user = $userDAO->getById($userId);

		$currentLevel = $user->getLevel();
		$currentXP = $user->getXP();

		$baseXP = 100;
		$xpPerLevel = 100;

		$xpForNextLevel = $baseXP + $xpPerLevel * $currentLevel;

		$newXP = $currentXP + $xpGained;
		$user->setXP($newXP);

		while ($newXP >= $xpForNextLevel) {
			$currentLevel++;
			$newXP -= $xpForNextLevel;
			$xpForNextLevel = $baseXP + $xpPerLevel * $currentLevel;
		}

		$user->setLevel($currentLevel);
		$userDAO->updateUserLevel($userId, $currentLevel, $newXP);
	}

	public function getLikes()
	{
		return $this->likes;
	}

	public function setLikes($likes)
	{
		$this->likes = $likes;
	}
	/**
	 * @return int|null
	 */
	public function getIdUser(): ?int
	{
		return $this->idUser;
	}

	/**
	 * @param int|null $idUser 
	 * @return self
	 */
	public function setIdUser(?int $idUser): self
	{
		$this->idUser = $idUser;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getTag(): string
	{
		return $this->tag;
	}

	/**
	 * @param string $tag 
	 * @return self
	 */
	public function setTag(string $tag): self
	{
		$this->tag = $tag;
		return $this;
	}


	/**
	 * 
	 * @return string
	 */
	public function generateRandomTag(): string
	{
		$randomNumber = mt_rand(1000, 9999);
		$tag = (string) $randomNumber;
		return $tag;
	}


	/**
	 * @return string
	 */
	public function getNickname(): string
	{
		return $this->nickname;
	}

	/**
	 * @param string $nickname 
	 * @return self
	 */
	public function setNickname(string $nickname): self
	{
		$this->nickname = $nickname;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getEmail(): string
	{
		return $this->email;
	}

	/**
	 * @param string $email 
	 * @return self
	 */
	public function setEmail(string $email): self
	{
		$this->email = $email;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPassword(): string
	{
		return $this->password;
	}

	/**
	 * @param string $password 
	 * @return self
	 */
	public function setPassword(string $password): self
	{
		$this->password = $password;
		return $this;
	}

	/**
	 * @return 
	 */
	public function getAvatar(): ?string
	{
		return $this->avatar;
	}

	/**
	 * @param  $avatar 
	 * @return self
	 */
	public function setAvatar(?string $avatar): self
	{
		$this->avatar = $avatar;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getLevel(): int
	{
		return $this->level;
	}

	/**
	 * @param int $level 
	 * @return self
	 */
	public function setLevel(int $level): self
	{
		$this->level = $level;
		return $this;
	}

	/**
	 * @return float
	 */
	public function getXp(): float
	{
		return $this->xp;
	}

	/**
	 * @param float $xp 
	 * @return self
	 */
	public function setXp(float $xp): self
	{
		$this->xp = $xp;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getResume(): ?string
	{
		return $this->resume;
	}

	/**
	 * @param string|null $resume 
	 * @return self
	 */
	public function setResume(?string $resume): self
	{
		$this->resume = $resume;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getAdmin(): int
	{
		return $this->admin;
	}

	/**
	 * @param int $admin 
	 * @return self
	 */
	public function setAdmin(int $admin): self
	{
		$this->admin = $admin;
		return $this;
	}
	/**
	 * @return \DateTime
	 */
	public function getCreatedAt(): \DateTime
	{
		return $this->createdAt;
	}

	/**
	 * @param \DateTime $createdAt 
	 * @return self
	 */
	public function setCreatedAt(\DateTime $createdAt): self
	{
		$this->createdAt = $createdAt;
		return $this;
	}

	/**
	 * Retorna a data de criação formatada como string no formato desejado.
	 *
	 * @return string
	 */
	public function getFormattedCreatedAt(): string
	{
		return $this->createdAt->format('Y-m-d H:i:s');
	}



	/**
	 * @return string|null
	 */
	public function getLocation(): ?string
	{
		return $this->location;
	}

	/**
	 * @param string|null $location 
	 * @return self
	 */
	public function setLocation(?string $location): self
	{
		$this->location = $location;
		return $this;
	}
	public function toArray(): array
	{
		return [
			'idUser' => $this->idUser,
			'tag' => $this->tag,
			'nickname' => $this->nickname,
			'email' => $this->email,
			'avatar' => $this->avatar,
		];
	}
}
