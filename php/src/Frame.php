<?php

declare(strict_types=1);

namespace Kata;

use Exception;

final class Frame
{
    /** @var int[] */
    private array $rolls = [];

    private static function guardKnockedPins(int $knockedPins): void
    {
        if ($knockedPins > 10 || $knockedPins < 0) {
            throw new Exception("You can't score more than 10 points.");
        }
    }

    /** @param int[] $rolls */
    private static function guardTotalKnockedPins(array $rolls, int $knockedPins): void
    {
        if (array_sum([...$rolls, $knockedPins]) > 10) {
            throw new Exception("You can't knock down more than 10 pins on a single frame.");
        }
    }

    /**
     * @throws Exception
     */
    public function roll(int $knockedPins): void
    {
        self::guardKnockedPins($knockedPins);
        self::guardTotalKnockedPins($this->rolls, $knockedPins);

        $this->rolls[] = $knockedPins;
    }

    public function isCompleted(): bool
    {
        return true;
    }
}
