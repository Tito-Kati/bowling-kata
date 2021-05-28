<?php

declare(strict_types=1);

namespace KataTests;

use Exception;
use Kata\Game;
use PHPUnit\Framework\TestCase;

final class GameTest extends TestCase
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

    public function test_roll_more_than_max_should_throw_an_exception(): void
    {
        $this->expectException(Exception::class);

        $game = new Game();

        $game->roll(11);
    }

    public function test_roll_less_than_min_should_throw_an_exception(): void
    {
        $this->expectException(Exception::class);

        $game = new Game();

        $game->roll(-1);
    }

    public function test_two_rolls_on_same_frame_cant_knock_more_than_max_pins(): void
    {
        $this->expectException(Exception::class);

        $game = new Game();

        $game->roll(2);
        $game->roll(9);
    }

    public function test_two_rolls_on_different_frames_can_knock_more_than_max_pins(): void
    {
        $game = new Game();

        $game->roll(2);
        $game->roll(7);
        $game->roll(3);

        self::assertTrue(true);
    }
}
