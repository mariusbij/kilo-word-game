<?php

namespace App\Game;

use JetBrains\PhpStorm\Pure;

class State
{
    const MASKED_SYMBOL = '_';

    public function __construct(
        private array $secret,
        private array $maskedWord = []
    )
    {
    }

    #[Pure] public static function fromWord(string $word): State
    {
         $secret = str_split($word);

         return new self(
             $secret,
             array_fill(0, count($secret), self::MASKED_SYMBOL)
         );
    }

    public function getMaskedWord(): array
    {
        return $this->maskedWord;
    }

    private function getSecret(): array
    {
        return $this->secret;
    }

    public function isFinished(): bool
    {
        return $this->getMaskedWord() === $this->getSecret();
    }
}