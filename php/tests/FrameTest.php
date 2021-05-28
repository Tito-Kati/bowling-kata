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

        $frame = new Frame();

        $frame->roll(11);
    }

    public function test_roll_less_than_min_should_throw_an_exception(): void
    {
        $this->expectException(Exception::class);

        $frame = new Frame();

        $frame->roll(-1);
    }

    public function test_two_rolls_on_same_frame_cant_knock_more_than_max_pins(): void
    {
        $this->expectException(Exception::class);

        $frame = new Frame();

        $frame->roll(2);
        $frame->roll(9);
    }

    public function test_frame_is_completed_when_max_pins_have_been_knocked(): void
    {

        $frame = new Frame();

        $frame->roll(2);
        $frame->roll(8);

        self::assertTrue($frame->isCompleted());
    }
}
