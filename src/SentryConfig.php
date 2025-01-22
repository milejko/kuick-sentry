<?php

namespace Kuick\Sentry;

class SentryConfig
{
    public function __construct(
        public readonly string $dsn = '',
        public readonly bool $enabled = false,
        public readonly string $environment = 'LOCAL',
        public readonly float $sampleRate = 1.0,
        public readonly string $ignoredExceptions = '',
        public readonly string $ignoreCode = '',
        public readonly string $release = '',
    )
    {
    }
}