<?php

namespace App;

class State
{
    private array $secret;
    private array $maskedWord;

    public function __construct()
    {
        $this->secret = ["s", "w", "o", "r", "d"];
        $this->maskedWord = array_fill(0, count($this->secret), "_");
    }

    public function getMaskedWord(): array
    {
        return $this->maskedWord;
    }
}