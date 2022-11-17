<?php

namespace App\Game;

use App\Player\PlayerInterface;

class LuckyDrawGame implements GameInterface
{
    private ?State $state;

    private array $players;

    public function __construct(State $state = null)
    {
        $this->state = $state ?? new State();
    }

    public function addPlayer(PlayerInterface $player): void
    {
        $this->players[] = $player;
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