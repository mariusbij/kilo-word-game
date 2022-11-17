<?php

namespace App\Game;

use App\Player\PlayerInterface;
use App\Game\State;
use JetBrains\PhpStorm\Pure;

class LuckyDrawGame implements GameInterface
{
    private ?State $state;

    private array $players = [];

    public function __construct(State $state = null)
    {
        $words = ['dog', 'sword', 'enemy', 'computer'];
        shuffle($words);
        $secret = $words[0];

        $this->state = $state ?? State::fromWord($secret);
    }

    public function addPlayer(PlayerInterface $player): void
    {
        $this->players[] = $player;
    }

    public function makeTurn(): State
    {
        foreach ($this->players as $player) {
            $this->state->addLetter($player->guessLetter($this->state));
        }
        return $this->state;
    }

    #[Pure] public function isFinished(): bool
    {
        return $this->state->isFinished();
    }
}