<?php

declare(strict_types=1);

namespace Kata;

use Exception;

final class Game
{
    private int $score = 0;
    /** @var Frame[] */
    private array $frames = [];

    private int $currentFrame = 0;

    public function score(): int
    {
        return $this->score;
    }

    /**
     * @throws Exception
     */
    public function roll(int $knockedPins): void
    {
        self::guardKnockedPins($knockedPins);
        self::guardFramePins($this->score, $knockedPins);

//        $this->storeFrame($knockedPins);

        $this->score += $knockedPins;
    }

    private static function guardFramePins(int $score, int $knockedPins): void
    {
        if (($score + $knockedPins) > 10) {
            throw new Exception("You can't score more than 10 points on a single frame.");
        }
    }

    private static function guardKnockedPins(int $knockedPins): void
    {
        if ($knockedPins > 10 || $knockedPins < 0) {
            throw new Exception("You can't score more than 10 points.");
        }
    }

}
