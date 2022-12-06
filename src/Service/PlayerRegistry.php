<?php

namespace App\Service;

use App\Player\DrunkPlayer;
use App\Player\PlayerInterface;
use App\Player\SoberPlayer;

class PlayerRegistry
{
    public function __construct(private array $players = [])
    {
        $this->players = [
            'drunk' => new DrunkPlayer(1),
            'sober' => new SoberPlayer()
        ];
    }

    public function get(string $playerName): ?PlayerInterface
    {
        return $this->players[$playerName];
    }

    public function getAll(): array
    {
        return $this->players;
    }
}