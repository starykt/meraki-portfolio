<?php

namespace App\Models\Entidades;

use DateTime;

class Comment
{
  private int $idComment;
  private string $text;
  private User $user;
  private Project $project;
  private string $dateCreate;

  public function __construct()
  {
    $this->user = new User();
  }

  /**
   * @return 
   */
  public function getText(): string
  {
    return $this->text;
  }

  /**
   * @param  $text 
   * @return self
   */
  public function setText(string $text): self
  {
    $this->text = $text;
    return $this;
  }


  public function getDateCreate()
  {
    return new DateTime($this->dateCreate);
  }

  public function setDateCreate(\DateTime $dateCreate)
  {
      $this->dateCreate = $dateCreate->format('Y-m-d H:i:s');
  }

  /**
   * @return User
   */
  public function getUser()
  {
    return $this->user;
  }

  /**
   * @param User $user 
   * @return self
   */
  public function setUser($user): self
  {
    $this->user = $user;
    return $this;
  }

  /**
   * @return Project
   */
  public function getProject()
  {
    return $this->project;
  }

  /**
   * @param Project $project 
   * @return self
   */
  public function setProject($project): self
  {
    $this->project = $project;
    return $this;
  }

  /**
   * @return 
   */
  public function getIdComment(): int
  {
    return $this->idComment;
  }

  /**
   * @param  $idComment 
   * @return self
   */
  public function setIdComment(int $idComment): self
  {
    $this->idComment = $idComment;
    return $this;
  }
}
