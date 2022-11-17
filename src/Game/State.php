<?php

namespace App\Game;

class State
{
    public function __construct(
        private array $secret,
        private array $maskedWord
    )
    {
    }

    public function getMaskedWord(): array
    {
        return $this->maskedWord;
    }
}