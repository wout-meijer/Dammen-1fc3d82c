<?php

class Vak
{
    private string $_color;
    private string $_position;
    private object $_stone;

    public function __construct($color)
    {
        $this->_color = $color;
    }

    public function getCurrentStone(): string
    {
        if (isset($this->_stone)) {
            if ($this->_stone->getColor() === 'white') {
                return 'o';
            }
            return 'x';
        }
        return ' ';
    }

    public function getColor(): string
    {
        return $this->_stone->getColor();
    }

    public function setCurrentStone($color): void
    {
        $this->_stone = new Steen($color);
    }

    public function setPosition($position): void
    {
        $this->_position = $position;
    }

    public function getPosition(): string
    {
        return $this->_position;
    }

    public function removeStone(): void
    {
        unset($this->_stone);
    }
}