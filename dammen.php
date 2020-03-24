<?php

spl_autoload_register(
    static function ($className) {
        include_once $className . '.class' . '.php';
    }
);

class Dammen
{
    public function welcome(): void
    {
        $game = new DamSpel();
        $game->start();
    }
}

$checkers = new Dammen();
$checkers->welcome();