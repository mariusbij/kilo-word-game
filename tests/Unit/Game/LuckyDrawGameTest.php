<?php

namespace App\Tests\Unit\Game;

use App\Game\LuckyDrawGame;
use App\Game\State;
use PHPUnit\Framework\TestCase;

class LuckyDrawGameTest extends TestCase
{
    public function testLuckyDrawGame()
    {
        $game = new LuckyDrawGame();
        $game->makeTurn();
        $this->assertFalse($game->isFinished());
    }
}