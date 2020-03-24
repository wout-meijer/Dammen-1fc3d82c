<?php

class DamSpel
{
    private int $_currentPlayer;
    private object $_bord;
    private object $_regelControleur;
    private object $_userInterface;

    public function __construct()
    {
        $this->_bord = new Bord();
        $this->_regelControleur = new RegelControleur();
        $this->_userInterface = new UserInterface();
    }
    public function start(): void
    {
        print 'Welcome to the checkers game!' . PHP_EOL;
        print 'Initializing game...' . PHP_EOL;

        $this->_bord->populateInitialBoard();
        $this->_bord->printStatus();

        print "Player 1: You're are: x" . PHP_EOL;
        print "Player 2: You're are: o" . PHP_EOL;

        for ($i = 1; $i < 100; $i++) {
            $move = $this->_getNextMove($i);
            $this->_bord->runMove($move);
        }
    }

    private function _getNextMove($index): Zet
    {
        sleep(1);

        $color = 'black';
        $player = 1;
        if ($index % 2 === 0) {
            $color = 'white';
            $player = 2;
        }

        $zet = $this->_userInterface->askPlayerForMove($player);
        $isValid = $this->_regelControleur->isValidMove($zet, $this->_bord, $color);

        if (! $isValid) {
            print 'This move is not valid, please try again. ' . PHP_EOL;
            return $this->getNextMove($index);
        }

        return $zet;

    }
}