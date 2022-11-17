<?php

namespace App\Player;

use App\Game\State;

interface PlayerInterface
{
    public function __invoke(State $state): string;
}