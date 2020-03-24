<?php

class Vak
{
    private string $color;
    private string $position;
    private object $stone;

    public function __construct($color)
    {
        $this->color = $color;
    }

    public function getCurrentStone(): string
    {
        if (isset($this->stone)) {
           if ($this->stone->getColor() === 'white') {
               return 'o';
           }
           return 'x';
        }
        return ' ';
    }

    public function getColor(): string
    {
        return $this->stone->getColor();
    }

    public function setCurrentStone($color): void
    {
        $this->stone = new Steen($color);
    }

    public function setPosition($position): void
    {
        $this->position = $position;
    }

    public function getPosition(): string
    {
        return $this->position;
    }

    public function removeStone(): void
    {
        unset($this->stone);
    }
}