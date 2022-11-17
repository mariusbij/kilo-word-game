<?php

namespace App\Game;

use App\Player\PlayerInterface;
use App\Player\PlayerRegistry;
use App\State;

class Game implements GameInterface
{
    private State $state;

    public function __construct()
    {
        $this->state = new State();
    }

    public function addPlayer(PlayerInterface $player): void
    {
    }

    public function makeTurn()
    {
    }

    public function isFinished(): bool
    {
        if (in_array('_', $this->state->getMaskedWord(), true)) {
            return false;
        }
        return true;
    }
}