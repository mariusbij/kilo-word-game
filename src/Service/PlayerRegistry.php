<?php

namespace App\Service;

use App\Player\PlayerInterface;

class PlayerRegistry
{
    public function __construct(private array $players)
    {
        $this->players = [];
    }

    public function get($playerId): ?PlayerInterface
    {
        foreach ($this->players as $player) {
            if ($player->getPlayerId === $playerId) {
                return $player;
            }
        }
        return null;
    }

    public function getAll(): array
    {
        return $this->players;
    }
}