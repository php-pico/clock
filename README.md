# README

PSR-20 compliant clock package.

## Usage

```php
use PhpPico\Clock\Clock;

new Clock()->now(); // returns a DateTimeImmutable
```

This package is great for testing, since you can set a mock "now" which you can use when testing.

```php
use PhpPico\Clock\Clock;

$testNow = new DateTimeImmutable('2025-01-01 12:00:00'); // 1st January 2025 12:00
Clock::setTestNow($testNow);

new Clock()->now(); // Returns the $testNow DateTimeImmutable
```
