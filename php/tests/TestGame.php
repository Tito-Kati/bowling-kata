<?php

declare(strict_types=1);

namespace KataTests;

use Kata\Game;
use PHPUnit\Framework\TestCase;

final class TestGame extends TestCase
{
    public function test_game_starts_without_score(): void
    {
        $game = new Game();

        $result = $game->score();

        self::assertSame(0, $result);
    }

    public function test_knocked_pins_adds_score_on_roll(): void
    {
        $game = new Game();

        $game->roll(2);
        $result = $game->score();

        self::assertSame(2, $result);
    }

    public function test_roll_multiple_times_score_accumulated(): void
    {
        $game = new Game();

        $game->roll(2);
        $game->roll(2);
        $result = $game->score();

        self::assertSame(4, $result);
    }
}
