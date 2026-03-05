<?php

namespace App\Tests\Controller;

use App\Controller\ForumController;
use PHPUnit\Framework\TestCase;

class ForumControllerTest extends TestCase
{
    public function testParseDateOnlyReturnsDateForValidInput(): void
    {
        $controller = new ForumController();
        $method = new \ReflectionMethod($controller, 'parseDateOnly');
        $method->setAccessible(true);

        $date = $method->invoke($controller, '2026-02-20');

        self::assertNotNull($date);
        self::assertEquals('2026-02-20', $date->format('Y-m-d'));
    }

    public function testParseDateOnlyReturnsNullForInvalidInput(): void
    {
        $controller = new ForumController();
        $method = new \ReflectionMethod($controller, 'parseDateOnly');
        $method->setAccessible(true);

        $date = $method->invoke($controller, 'invalid-date');

        self::assertEquals(null, $date);
    }

    public function testBuildFilterSummaryFormatsRange(): void
    {
        $controller = new ForumController();
        $method = new \ReflectionMethod($controller, 'buildFilterSummary');
        $method->setAccessible(true);

        $from = new \DateTimeImmutable('2026-02-01');
        $to = new \DateTimeImmutable('2026-02-10');
        $summary = $method->invoke($controller, $from, $to, 'desc');

        self::assertTrue(str_contains((string) $summary, 'du 01/02/2026 au 10/02/2026'));
    }
}
