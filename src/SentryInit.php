<?php

/**
 * Kuick Sentry (https://github.com/milejko/kuick-sentry)
 *
 * @link       https://github.com/milejko/kuick-sentry
 * @copyright  Copyright (c) 2024 Mariusz Miłejko (mariusz@milejko.pl)
 * @license    https://github.com/milejko/kuick-sentry?tab=MIT-1-ov-file New BSD License
 */

namespace Kuick\Sentry;

use Sentry\Event;

use function Sentry\init;

/**
 * Sentry initialization class
 */
class SentryInit
{
    private bool $initialized = false;

    public function __construct(SentryConfig $config)
    {
        //sentry disabled
        if (!(bool) $config->enabled) {
            return;
        }
        //defining ignored
        define('SENTRY_IGNORED_EXCEPTIONS', explode(',', $config->ignoredExceptions));
        define('SENTRY_IGNORED_CODES', explode(',', $config->ignoreCode));
        //sentry initialization
        init([
            'dsn' => $config->dsn,
            'release' => $config->release,
            //prevent quota issues
            'traces_sample_rate' => (float) $config->sampleRate,
            //environment - configured, or guessed by config class name
            'environment' => $config->environment,
            //before send event
            'before_send' => function (Event $event) {
                //iterate exceptions
                foreach ($event->getExceptions() as $exception) {
                    //exception type on an ignored list
                    if (in_array($exception->getType(), SENTRY_IGNORED_EXCEPTIONS)) {
                        return null;
                    }
                    if (
                        isset($exception->getMechanism()->getData()['code']) &&
                        in_array($exception->getMechanism()->getData()['code'], SENTRY_IGNORED_CODES)
                    ) {
                        return null;
                    }
                }
                return $event;
            },
        ]);
        $this->initialized = true;
    }

    public function isInitialized(): bool
    {
        return $this->initialized;
    }
}
