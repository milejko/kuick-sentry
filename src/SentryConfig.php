<?php

/**
 * Kuick Sentry (https://github.com/milejko/kuick-sentry)
 *
 * @link       https://github.com/milejko/kuick-sentry
 * @copyright  Copyright (c) 2024 Mariusz Miłejko (mariusz@milejko.pl)
 * @license    https://github.com/milejko/kuick-sentry?tab=MIT-1-ov-file New BSD License
 */

namespace Kuick\Sentry;

/**
 * Sentry configuration class
 */
class SentryConfig
{
    public function __construct(
        public readonly string $dsn = '',
        public readonly string $enabled = '0',
        public readonly string $environment = 'LOCAL',
        public readonly string $sampleRate = '1.0',
        public readonly string $release = '',
    ) {
    }
}
