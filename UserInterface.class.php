<?php

class UserInterface
{
    public function askPlayerForMove($i): zet
    {
        $input = readline( "Player $i: Its your turn, whats your next move? ");
        $move = explode(' ', $input);
        return new Zet($move[0], $move[1]);
    }
}