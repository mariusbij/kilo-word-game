<?php

namespace App\Tests\Unit\Game;

use App\Game\LuckyDrawGame;
use App\Game\State;
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
        $game->addPlayer(new FakePlayer(), 'foo');
        $state = $game->makeTurn();
        $this->assertSame(['h', '_'], $state->getMaskedWord());
    }

    public function testGameIsFinished()
    {
        $game = new LuckyDrawGame(State::fromWord('h'));
        $game->addPlayer(new FakePlayer(), 'foo');
        $state = $game->makeTurn();
        $this->assertTrue($state->isFinished());
    }

    public function testTwoPlayerRounds()
    {
        $game = new LuckyDrawGame(State::fromWord('hi'));
        $game->addPlayer(function () {
            return 'h';
        }, 'foo');

        $game->addPlayer(function () {
            return 'i';
        }, 'boo');

        $state = $game->makeTurn();
        $this->assertTrue($state->isFinished());
    }

    public function testGameEndsAfterSecondRound()
    {
        $game = new LuckyDrawGame(State::fromWord('hi'));
        $game->addPlayer(function () {
            return 'h';
        }, 'first');

        $game->addPlayer(function () {
            return 'i';
        }, 'second');

        $game->addPlayer(function () {
            return 'x';
        }, 'third');

        $game->makeTurn();
        $this->assertSame('second', $game->getWinner());
    }
}