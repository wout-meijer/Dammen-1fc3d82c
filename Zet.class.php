<?php

class Zet
{
   private string $fromPosition;
   private string $toPosition;

   public function __construct($from, $to)
   {
       $this->fromPosition = $from;
       $this->toPosition = $to;
   }

   public function getFromPosition(): string
   {
       return $this->fromPosition;
   }

    public function getToPosition(): string
    {
        return $this->toPosition;
    }
}