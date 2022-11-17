<?php

namespace App\Player;

use App\State;

interface PlayerInterface
{
    public function guessLetter(State $state): string;
}