<?php

namespace App\Models\Entidades;

class Like
{
    private int $idLike;
    private User $user;
    private Project $project;

    public function getIdLike(): int
    {
        return $this->idLike;
    }

    public function setIdLike(int $idLike): self
    {
        $this->idLike = $idLike;
        return $this;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function getProject(): Project
    {
        return $this->project;
    }

    public function setProject(Project $project): self
    {
        $this->project = $project;
        return $this;
    }
}
