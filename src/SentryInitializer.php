<?php

/**
 * Kuick Sentry (https://github.com/milejko/kuick-sentry)
 *
 * @link       https://github.com/milejko/kuick-sentry
 * @copyright  Copyright (c) 2024 Mariusz Miłejko (mariusz@milejko.pl)
 * @license    https://github.com/milejko/kuick-sentry?tab=MIT-1-ov-file New BSD License
 */

namespace Kuick\Sentry;

use function Sentry\init;

/**
 * Sentry initialization class
 */
class SentryInitializer
{
    private bool $initialized = false;

    public function __construct(SentryConfig $config)
    {
        //sentry disabled
        if (!(bool) $config->enabled) {
            return;
        }
        //sentry initialization
        init([
            'dsn' => $config->dsn,
            'release' => $config->release,
            //prevent quota issues
            'traces_sample_rate' => (float) $config->sampleRate,
            //environment name
            'environment' => $config->environment,
        ]);
        $this->initialized = true;
    }

    public function isInitialized(): bool
    {
        return $this->initialized;
    }
}
