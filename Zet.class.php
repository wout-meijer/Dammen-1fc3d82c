<?php

class Zet
{
    private string $_fromPosition;
    private string $_toPosition;

    public function __construct($from, $to)
    {
        $this->_fromPosition = $from;
        $this->_toPosition = $to;
    }

    public function getFromPosition(): string
    {
        return $this->_fromPosition;
    }

    public function getToPosition(): string
    {
        return $this->_toPosition;
    }
}