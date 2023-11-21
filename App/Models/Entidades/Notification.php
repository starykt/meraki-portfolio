<?php

namespace App\Models\Entidades;

class Notification
{
    private int $idNotification;
    private User $idUser;
    private string $notification;

    public function getIdNotification(): ?int
    {
        return $this->idNotification;
    }

    public function setIdNotification(?int $idNotification): void
    {
        $this->idNotification = $idNotification;
    }

    public function getUser(): User
    {
        return $this->idUser;
    }

    public function setUser(User $idUser): void
    {
        $this->idUser = $idUser;
    }

    public function getNotification(): string
    {
        return $this->notification;
    }

    public function setNotification(string $notification): void
    {
        $this->notification = $notification;
    }

    public function toArray(): array
    {
        return [
            'idNotification' => $this->idNotification,
            'idUser' => $this->idUser->toArray(),
            'notification' => $this->notification,
        ];
    }
}
