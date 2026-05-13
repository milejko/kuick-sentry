<?php

namespace Tests\Unit\Kuick\Sentry;

use Kuick\Sentry\SentryConfig;
use Kuick\Sentry\SentryInitializer;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\RunInSeparateProcess;
use PHPUnit\Framework\TestCase;

#[CoversClass(SentryInitializer::class)]
class SentryInitializerTest extends TestCase
{
    public function testIfEmptyConfig(): void
    {
        $config = new SentryConfig();
        $sentryInitializer = new SentryInitializer($config);
        $this->assertFalse($sentryInitializer->isInitialized());
    }

    #[RunInSeparateProcess]
    public function testIfSentryIsInitialized(): void
    {
        $config = new SentryConfig(
            dsn: 'https://user:pass@sentry.example.com/1',
            enabled: '1',
            environment: 'dev',
        );
        $sentryInitializer = new SentryInitializer($config);
        $this->assertTrue($sentryInitializer->isInitialized());
    }
}
