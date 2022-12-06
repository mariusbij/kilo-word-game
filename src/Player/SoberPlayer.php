<?php

namespace App\Player;

use App\Game\State;

class SoberPlayer implements PlayerInterface
{


    public function __invoke(State $state): string
    {
        static $previousLetter;

        $guessedLetters = $state->getMaskedWord();

        chr(rand(97, 122));

        do {
            $letter = chr(rand(97, 122));
        } while ($previousLetter === $letter && in_array($letter, $guessedLetters, true));

        $previousLetter = $letter;

        return $letter;
    }
}