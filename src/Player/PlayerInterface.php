<?php

namespace App\Player;

use App\Game\State;

interface PlayerInterface
{
    public function guessLetter(State $state): string;
}