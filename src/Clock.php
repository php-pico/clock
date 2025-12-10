<?php

declare(strict_types=1);

namespace PhpPico\Clock;

use DateMalformedStringException;
use DateTimeImmutable;
use Override;
use Psr\Clock\ClockInterface;

final class Clock implements ClockInterface
{
    protected static ?DateTimeImmutable $testNow = null;

    /**
     * Set test now.
     *
     * @param string|DateTimeImmutable|null $testNow
     *
     * @return void
     * @throws DateMalformedStringException
     */
    public static function setTestNow(string|DateTimeImmutable|null $testNow): void
    {
        if (is_string($testNow)) {
            $testNow = new DateTimeImmutable(datetime: $testNow);
        }

        self::$testNow = $testNow;
    }

    /**
     * Get test now.
     *
     * @return DateTimeImmutable|null
     */
    public static function getTestNow(): ?DateTimeImmutable
    {
        return self::$testNow;
    }

    /**
     * Get current time. If test now is set, that will be returned.
     *
     * @return DateTimeImmutable
     */
    #[Override]
    public function now(): DateTimeImmutable
    {
        return self::getTestNow() ?? new DateTimeImmutable();
    }
}

