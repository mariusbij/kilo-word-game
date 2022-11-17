<?php

namespace App\Tests\Unit;

use App\Game\State;
use App\Player\PlayerInterface;

class FakePlayer implements PlayerInterface
{
    public function __invoke(State $state): string
    {
        return 'h';
    }
}