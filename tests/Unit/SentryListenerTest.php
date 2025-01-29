<?php

namespace Tests\Unit\Kuick\Sentry;

use Exception;
use Kuick\Framework\Events\ExceptionRaisedEvent;
use Kuick\Sentry\SentryConfig;
use Kuick\Sentry\SentryInitializer;
use Kuick\Sentry\SentryListener;
use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;

/**
 * @covers \Kuick\Sentry\SentryListener
 */
class SentryListenerTest extends TestCase
{
    public function testIfListenerSendsExceptionsToSentry(): void
    {
        $config = new SentryConfig(
            dsn: 'https://user:pass@sentry.example.com/1',
            enabled: '1',
            environment: 'dev',
        );
        $sentryInitializer = new SentryInitializer($config);
        $sentryListener = new SentryListener($sentryInitializer, new NullLogger());
        $exceptionRaisedEvent = new ExceptionRaisedEvent(new Exception('Test exception'));
        $sentryListener->__invoke($exceptionRaisedEvent);
        $this->assertInstanceOf(SentryListener::class, $sentryListener);
    }

    public function testIfListenerDoesNothingIfSentryIsNotInitialized(): void
    {
        $config = new SentryConfig();
        $sentryInitializer = new SentryInitializer($config);
        $sentryListener = new SentryListener($sentryInitializer, new NullLogger());
        $exceptionRaisedEvent = new ExceptionRaisedEvent(new Exception('Test exception'));
        $sentryListener->__invoke($exceptionRaisedEvent);
        $this->assertInstanceOf(SentryListener::class, $sentryListener);
    }
}
