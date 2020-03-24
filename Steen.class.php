<?php

class Steen
{
    private string $_color;
    private bool $_dam;

    public function __construct($color)
    {
        $this->_color = $color;
    }

    public function getColor(): string
    {
        return $this->_color;
    }

    public function setDam($bool): void
    {
        $this->_dam = $bool;
    }

    public function getDam(): bool
    {
        return $this->_dam;
    }
}