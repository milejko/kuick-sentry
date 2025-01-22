<?php

use Kuick\Sentry\SentryConfig;
use Kuick\Sentry\SentryInit;

use function DI\autowire;
use function DI\create;
use function DI\env;

return [
    SentryConfig::class => create(SentryConfig::class)
        ->constructor(
            enabled: env('SENTRY_ENABLED', '0'),
            dsn: env('SENTRY_DSN', ''),
            environment: env('SENTRY_ENVIRONMENT', 'LOCAL'),
            sampleRate: env('SENTRY_SAMPLE_RATE', '1.0'),
            ignoredExceptions: env('SENTRY_IGNORED_EXCEPTIONS', ''),
            ignoreCode: env('SENTRY_IGNORE_CODE', ''),
            release: env('SENTRY_RELEASE', ''),
        ),
    SentryInit::class => autowire(),
];
