<?php

namespace App\Models\Entidades;

class Message
{
    private ?int $idMessage;
    private User $sender;
    private User $receiver;
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

    public function getReceiver(): User
    {
        return $this->receiver;
    }

    public function setReceiver(User $receiver): void
    {
        $this->receiver = $receiver;
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
    public function toArray(): array
    {
        return [
            'idMessage' => $this->idMessage,
            'sender' => $this->sender->toArray(),
            'receiver' => $this->receiver->toArray(),
            'message' => $this->message,
            'sent_at' => $this->sent_at,
        ];
    }
}
