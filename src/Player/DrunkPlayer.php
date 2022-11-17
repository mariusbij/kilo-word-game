<?php

namespace App\Player;

use App\Game\State;

class DrunkPlayer implements PlayerInterface
{
    public function __construct(private readonly int $playerId)
    {
    }

    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    public function guessLetter(State $state): string
    {
        return chr(rand(97, 122));
    }
}