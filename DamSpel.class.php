<?php

class DamSpel
{
    private int $currentPlayer;
    private object $bord;
    private object $regelControleur;
    private object $userInterface;

    public function __construct()
    {
        $this->bord = new Bord();
        $this->regelControleur = new RegelControleur();
        $this->userInterface = new UserInterface();
    }
    public function Start(): void
    {
        print 'Welcome to the checkers game!' . PHP_EOL;
        print 'Initializing game...' . PHP_EOL;

        $this->bord->populateInitialBoard();
        $this->bord->printStatus();

        print "Player 1: You're are: x" . PHP_EOL;
        print "Player 2: You're are: o" . PHP_EOL;

        for($i = 1; $i < 100; $i++) {
            $move = $this->getNextMove($i);
            $this->bord->runMove($move);
        }
    }

    private function getNextMove($index): Zet
    {
        sleep(1);

        $color = 'black';
        $player = 1;
        if ($index % 2 === 0) {
            $color = 'white';
            $player = 2;
        }

        $zet = $this->userInterface->askPlayerForMove($player);
        $isValid = $this->regelControleur->isValidMove($zet, $this->bord, $index, $color);

        if (! $isValid) {
            print 'This move is not valid, please try again. ' . PHP_EOL;
            return $this->getNextMove($index);
        }

        return $zet;

    }
}