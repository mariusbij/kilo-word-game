<?php

namespace App\Player;

use App\State;

class Player implements PlayerInterface
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