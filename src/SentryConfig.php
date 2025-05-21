<?php

/**
 * Kuick Sentry (https://github.com/milejko/kuick-sentry)
 *
 * @link       https://github.com/milejko/kuick-sentry
 * @copyright  Copyright (c) 2024 Mariusz Miłejko (mariusz@milejko.pl)
 * @license    https://github.com/milejko/kuick-sentry?tab=MIT-1-ov-file New BSD License
 */

namespace Kuick\Sentry;

use Kuick\Http\HttpException;

/**
 * Sentry configuration class
 */
class SentryConfig
{
    /**
     * Summary of __construct
     * @param string $dsn
     * @param string $enabled
     * @param string $environment
     * @param string $sampleRate
     * @param string $release
     * @param string $ignoreExceptions comma separated list of exception classes to ignore
     */
    public function __construct(
        public readonly string $dsn = '',
        public readonly string $enabled = '0',
        public readonly string $environment = 'LOCAL',
        public readonly string $sampleRate = '1.0',
        public readonly string $release = '',
        public readonly string $ignoreExceptions = HttpException::class,
    ) {
    }
}
