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
            enabled: 0,
            environment: 'environment',
            sampleRate: 1.0,
            ignoredExceptions: 'ignoredExceptions',
            ignoreCode: 'ignoreCode',
            release: 'release',
        );
        $this->assertEquals('dsn', $config->dsn);
        $this->assertEquals(0, $config->enabled);
        $this->assertEquals('environment', $config->environment);
        $this->assertEquals(1.0, $config->sampleRate);
        $this->assertEquals('ignoredExceptions', $config->ignoredExceptions);
        $this->assertEquals('ignoreCode', $config->ignoreCode);
        $this->assertEquals('release', $config->release);
    }
}
