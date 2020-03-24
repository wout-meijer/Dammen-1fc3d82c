<?php

class RegelControleur
{
    public function isValidMove(Zet $move, Bord $bord, $currentPlayer, $color): bool
    {
        $squares = $bord->getSquares();

        foreach ($squares as $square) {
            if ($square->getPosition() === ucfirst($move->getFromPosition())) {
                $from = $square;
            } elseif($square->getPosition() === ucfirst($move->getToPosition())) {
                $to = $square;
            }
        }

        if (!isset($from, $to) || $from->getColor() !== $color) {
            return false;
        }

        $fromLocation = str_split($from->getPosition(), 1);
        $toLocation = str_split($to->getPosition(), 1);

        if ($this->incrementLetter($fromLocation[0]) !== $toLocation[0]) {
            $letter = $this->incrementLetter($fromLocation[0]);
            $number = $toLocation[1];

            if ($fromLocation[0] > $toLocation[0]) {
                $letter = $this->decrementLetter($fromLocation[0]);
            }

            foreach ($squares as $square) {
                if (!$square->getPosition() === ucfirst($letter) . ($number + 1)) {
                    return false;
                }
            }
        }
        return !((($color === 'black') && $fromLocation[0] > $toLocation[0]) || (($color === 'white') && $fromLocation[0] < $toLocation[0]));
    }

    private function decrementLetter(string $letter): string
    {
        return chr(ord($letter) - 1);
    }

    private function incrementLetter(string $letter): string
    {
        return chr(ord($letter) + 1);
    }
}