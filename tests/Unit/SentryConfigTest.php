<?php

namespace Tests\Unit\Kuick\Sentry;

use Kuick\Sentry\SentryConfig;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Kuick\Sentry\SentryConfig
 */
class SentryConfigTest extends TestCase
{
    public function testIfConfigIsProperlyBuilt(): void
    {
        $config = new SentryConfig(
            dsn: 'dsn',
            enabled: '0',
            environment: 'environment',
            sampleRate: '1.0',
            release: 'release',
            ignoreExceptions: 'exception1,exception2',
        );
        $this->assertEquals('dsn', $config->dsn);
        $this->assertFalse((bool) $config->enabled);
        $this->assertEquals('environment', $config->environment);
        $this->assertEquals(1.0, (float) $config->sampleRate);
        $this->assertEquals('release', $config->release);
        $this->assertEquals('exception1,exception2', $config->ignoreExceptions);
    }
}
