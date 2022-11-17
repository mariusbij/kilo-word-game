<?php

namespace App\Game;

use App\Player\PlayerInterface;
use App\Game\State;
use JetBrains\PhpStorm\Pure;

class LuckyDrawGame implements GameInterface
{
    private ?State $state;
    private array $players = [];
    private ?string $winner = null;

    public function __construct(State $state = null)
    {
        $words = ['dog', 'sword', 'enemy', 'computer'];
        shuffle($words);
        $secret = $words[0];

        $this->state = $state ?? State::fromWord($secret);
    }

    public function addPlayer(PlayerInterface|callable $player, $nick): void
    {
        $this->players[$nick] = $player;
    }

    public function makeTurn(): State
    {
        foreach ($this->players as $nick => $player) {
            $this->state->addLetter($player($this->state));

            if ($this->state->isFinished()) {
                $this->setWinner($nick);
                return $this->state;
            }

        }
        return $this->state;
    }

    #[Pure] public function isFinished(): bool
    {
        return $this->state->isFinished();
    }

    public function getWinner(): ?string
    {
        return $this->winner;
    }

    public function setWinner(?string $winner): void
    {
        $this->winner = $winner;
    }
}