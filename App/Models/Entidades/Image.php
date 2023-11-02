<?php

namespace App\Models\Entidades;

class Image
{
    private int $idImage;
    private Project $idProject;
    private string $image;
    private array $images;

    public function setImages(array $images): self
    {
        $this->images = $images;
        return $this;
    }

    public function getImages(): array
    {
        return $this->images;
    }

    public function getIdImage(): int {
        return $this->idImage;
    }

    public function setIdImage(int $idImage): self {
        $this->idImage = $idImage;
        return $this;
    }

    public function getIdProject(): Project {
        return $this->idProject;
    }

    public function setIdProject(Project $idProject): self {
        $this->idProject = $idProject;
        return $this;
    }

    public function getImage(): string {
        return $this->image;
    }

    public function setImage(string $image): self {
        $this->image = $image;
        return $this;
    }

    public function getImageUrl(): string {
        return "http://" . APP_HOST . "/public/images/projects/" . $this->getImage();
    }
}
