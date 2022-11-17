<?php

namespace App\Game;

use App\Player\PlayerInterface;

interface GameInterface
{
    public function addPlayer(PlayerInterface|callable $player, string $nick);
    public function makeTurn();
}