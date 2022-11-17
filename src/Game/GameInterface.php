<?php

namespace App\Game;

use App\Player\PlayerInterface;

interface GameInterface
{
    public function addPlayer(PlayerInterface $player);
    public function makeTurn();
}