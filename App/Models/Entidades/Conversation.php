<?php

namespace App\Models\Entidades;

class Conversation
{
    private ?int $idConversation;
    private User $user1;
    private User $user2;
    private string $created_at;

    public function getIdConversation(): ?int
    {
        return $this->idConversation;
    }

    public function setIdConversation(?int $idConversation): void
    {
        $this->idConversation = $idConversation;
    }

    public function getUser1(): User
    {
        return $this->user1;
    }

    public function setUser1(User $user1): void
    {
        $this->user1 = $user1;
    }

    public function getUser2(): User
    {
        return $this->user2;
    }

    public function setUser2(User $user2): void
    {
        $this->user2 = $user2;
    }

    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    public function setCreatedAt(string $created_at): void
    {
        $this->created_at = $created_at;
    }
}
