<?php

declare(strict_types=1);

namespace Kata;

use Exception;

final class Frame
{
    private static function guardKnockedPins(int $knockedPins): void
    {
        if ($knockedPins > 10 || $knockedPins < 0) {
            throw new Exception("You can't score more than 10 points.");
        }
    }

    /**
     * @throws Exception
     */
    public function roll(int $knockedPins): void
    {
        self::guardKnockedPins($knockedPins);
    }
}
