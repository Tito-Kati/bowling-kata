<?php

declare(strict_types=1);

namespace KataTests;

use Exception;
use Kata\Frame;
use PHPUnit\Framework\TestCase;

final class FrameTest extends TestCase
{
    public function test_roll_more_than_max_should_throw_an_exception(): void
    {
        $this->expectException(Exception::class);

        $game = new Frame();

        $game->roll(11);
    }

    public function test_roll_less_than_min_should_throw_an_exception(): void
    {
        $this->expectException(Exception::class);

        $game = new Frame();

        $game->roll(-1);
    }
}
