<?php

namespace App\Tests\Unit\Player;

use App\Game\State;
use App\Player\DrunkPlayer;
use PHPUnit\Framework\TestCase;

class TestDrunkPlayer extends TestCase
{
    public function testGuessLetter()
    {
        $secret = ["s", "w", "o", "r", "d"];
        $maskedWord = array_fill(0, count($secret), "_");

        $state = new State($secret, $maskedWord);

        $player = new DrunkPlayer(1);
        $letter = $player->guessLetter($state);

        $this->assertIsString($letter);
    }
}