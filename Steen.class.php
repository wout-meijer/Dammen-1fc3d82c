<?php

class Steen
{
    private string $color;
    private bool $dam;

    public function __construct($color)
    {
        $this->color = $color;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setDam($bool): void
    {
        $this->dam = $bool;
    }

    public function getDam(): bool
    {
        return $this->dam;
    }
}