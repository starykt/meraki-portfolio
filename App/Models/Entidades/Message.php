<?php

namespace App\Models\Entidades;

class Message
{
    private ?int $idMessage;
    private Conversation $conversation;
    private User $sender;
    private string $message;
    private string $sent_at;

    public function getIdMessage(): ?int
    {
        return $this->idMessage;
    }

    public function setIdMessage(?int $idMessage): void
    {
        $this->idMessage = $idMessage;
    }

    public function getConversation(): Conversation
    {
        return $this->conversation;
    }

    public function setConversation(Conversation $conversation): void
    {
        $this->conversation = $conversation;
    }

    public function getSender(): User
    {
        return $this->sender;
    }

    public function setSender(User $sender): void
    {
        $this->sender = $sender;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    public function getSentAt(): string
    {
        return $this->sent_at;
    }

    public function setSentAt(string $sent_at): void
    {
        $this->sent_at = $sent_at;
    }
}
