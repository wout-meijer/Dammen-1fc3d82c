<?php

class Bord
{
    private array $squares = [];

    public function __construct()
    {
        for($i = 0; $i < 100; $i++) {
            if ($i % 2 === 0) {
                $this->squares[] = new Vak('black');
            } else {
                $this->squares[] = new Vak('white');
            }
        }
    }

    public function runMove(Zet $zet): void
    {
        $from = false;
        $to = false;

        foreach ($this->squares as $square) {
            if ($square->getPosition() === ucfirst($zet->getFromPosition())) {
                $from = $square;
            } elseif($square->getPosition() === ucfirst($zet->getToPosition())) {
                $to = $square;
            }
        }

        $fromLocation = str_split($from->getPosition(), 1);
        $toLocation = str_split($to->getPosition(), 1);


        if ($this->incrementLetter($fromLocation[0]) !== $toLocation[0]) {
            //going up
            $letter = $this->incrementLetter($fromLocation[0]);
            $number = $toLocation[1];

            if ($fromLocation[0] > $toLocation[0]) {
                //going down
                $letter = $this->decrementLetter($fromLocation[0]);
            }

            foreach ($this->squares as $square) {
                if ($square->getPosition() === ucfirst($letter) . ($number + 1)) {
                    $square->removeStone();
                } else if($square->getPosition() === ucfirst($letter) . ($number - 1)){
                    $square->removeStone();
                }
            }

        }

        if (isset($from, $to)) {
            $color = $from->getColor();
            $from->removeStone();
            $to->setCurrentStone($color);
            $this->printStatus();
        }
    }

    public function printStatus(): void
    {
        $str = 'K';
        $chunks = array_chunk($this->squares, 10, true);

        for($i = 0; $i < 10; $i++) {
            $str = $this->decrementLetter($str);

            print "$str |";

            $irritation = 1;
            foreach ($chunks[$i] as $key => $square) {
                $number = $irritation++;
                $square->setPosition($str . $number);
                $stone = $square->getCurrentStone();
                print " $stone |";
            }
            print PHP_EOL;

            if ($i + 1 === 10) {
                print '    1   2   3   4   5   6   7   8   9   10' . PHP_EOL;
            }
        }
    }

    public function populateInitialBoard(): void
    {
        $chunks = array_chunk($this->squares, 10, true);

        foreach($chunks as $key => $chunk) {
            if(0 <= $key && $key <= 3) {
                $this->setInitialStones($key, $chunk, 'white');
            } elseif (6 <= $key && $key <= 10) {
                $this->setInitialStones($key, $chunk, 'black');
            }
        }
    }

    public function getSquares(): array
    {
        return $this->squares;
    }

    private function setInitialStones(int $key, array $chunk, string $stoneColor): void
    {
        foreach ($chunk as $itemKey => $square) {
            if ($key % 2 === 0 ? $itemKey % 2  !== 0: $itemKey % 2 === 0) {
                $square->setCurrentStone($stoneColor);
            }
        }
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