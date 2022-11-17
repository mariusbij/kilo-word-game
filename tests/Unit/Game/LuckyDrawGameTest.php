<?php

namespace App\Tests\Unit\Game;

use App\Game\LuckyDrawGame;
use App\Game\State;
use App\Player\DrunkPlayer;
use App\Tests\Unit\FakePlayer;
use PHPUnit\Framework\TestCase;

class LuckyDrawGameTest extends TestCase
{
    public function testLuckyDrawGame()
    {
        $game = new LuckyDrawGame();
        $game->makeTurn();
        $this->assertFalse($game->isFinished());
    }

    public function testLetterGuessSuccessful()
    {
        $game = new LuckyDrawGame(State::fromWord('hi'));
        $game->addPlayer(new FakePlayer());
        $state = $game->makeTurn();
        $this->assertSame(['h', '_'], $state->getMaskedWord());
    }
}