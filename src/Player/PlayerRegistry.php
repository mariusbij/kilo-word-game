<?php

namespace App\Player;

class PlayerRegistry
{
    private array $players;

    public function __construct()
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

    public function addPlayer(PlayerInterface $player): void
    {
        $this->players[] = $player;
    }
}