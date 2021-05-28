<?php

declare(strict_types=1);

namespace Kata;

final class Game
{
    private int $score = 0;

    public function score(): int
    {
        return $this->score;
    }

    public function roll(int $knockedPins): void
    {
        $this->score += $knockedPins;
    }
}
