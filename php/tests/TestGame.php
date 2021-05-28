<?php declare(strict_types=1);

namespace KataTests;

use Kata\Game;
use PHPUnit\Framework\TestCase;

final class TestGame extends TestCase
{
    public function test_game_starts_without_score(): void
    {
        $game = new Game();

        $result = $game->score();

        self::assertEquals(0, $result);
    }
}
