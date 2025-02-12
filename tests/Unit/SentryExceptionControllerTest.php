<?php

namespace Tests\Unit\Kuick\Sentry;

use Kuick\Sentry\SentryExceptionController;
use PHPUnit\Framework\TestCase;
use RuntimeException;

/**
 * @covers \Kuick\Sentry\SentryExceptionController
 */
class SentryExceptionControllerTest extends TestCase
{
    public function testIfControllerThrowsException(): void
    {
        $controller = new SentryExceptionController();
        $this->expectException(RuntimeException::class);
        $controller->__invoke();
    }
}
