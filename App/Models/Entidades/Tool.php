<?php

namespace App\Models\Entidades;

class Tool
{
    private ?int $idTool;
    private string $icon;
    private string $caption;
    private string $color; // New variable for color

    /**
     * @return int|null
     */
    public function getIdTool(): ?int
    {
        return $this->idTool;
    }

    /**
     * @param int|null $idTool
     * @return self
     */
    public function setIdTool(?int $idTool): self
    {
        $this->idTool = $idTool;
        return $this;
    }

    public function __construct()
    {
        $this->icon = '';
        $this->color = ''; 
    }

    /**
     * @return string
     */
    public function getCaption(): string
    {
        return $this->caption;
    }

    /**
     * @param string $caption
     * @return self
     */
    public function setCaption(string $caption): self
    {
        $this->caption = $caption;
        return $this;
    }

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }

    /**
     * @param string $icon
     * @return self
     */
    public function setIcon(string $icon): self
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param string $color
     * @return self
     */
    public function setColor(string $color): self
    {
        $this->color = $color;
        return $this;
    }
}
