<?php

declare(strict_types=1);

namespace Phpico\Clock\Tests;

use DateTimeImmutable;
use Phpico\Clock\Clock;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class ClockTest extends TestCase
{
    #[Test]
    public function get_now(): void
    {
        $this->assertInstanceOf(DateTimeImmutable::class, new Clock()->now(), 'Clock::now() should return a DateTimeImmutable instance');
    }

    #[Test]
    public function get_test_now(): void
    {
        $testNow = new DateTimeImmutable('2025-12-10 06:30:00');

        $this->assertNull(Clock::getTestNow(), 'Clock::getTestNow() should return NULL before testNow is set.');

        Clock::setTestNow($testNow);
        $this->assertSame($testNow, Clock::getTestNow(), 'Clock::getTestNow() should return the $testNow DateTimeImmutable.');
        $this->assertSame($testNow, new Clock()->now(), 'Clock::now() should return the $testNow DateTimeImmutable.');
    }
}
