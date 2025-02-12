<?php

/**
 * Kuick Sentry (https://github.com/milejko/kuick-sentry)
 *
 * @link       https://github.com/milejko/kuick-sentry
 * @copyright  Copyright (c) 2024 Mariusz Miłejko (mariusz@milejko.pl)
 * @license    https://github.com/milejko/kuick-sentry?tab=MIT-1-ov-file New BSD License
 */

use Kuick\Sentry\SentryConfig;
use Kuick\Sentry\SentryExceptionController;
use Kuick\Sentry\SentryInitializer;
use Kuick\Sentry\SentryListener;

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
            release: env('SENTRY_RELEASE', ''),
        ),
    // performance optimization for autowiring
    SentryInitializer::class => autowire(),
    SentryListener::class => autowire(),
    SentryExceptionController::class => autowire(),
];
