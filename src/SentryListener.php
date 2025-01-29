<?php

/**
 * Kuick Sentry (https://github.com/milejko/kuick-sentry)
 *
 * @link       https://github.com/milejko/kuick-sentry
 * @copyright  Copyright (c) 2024 Mariusz Miłejko (mariusz@milejko.pl)
 * @license    https://github.com/milejko/kuick-sentry?tab=MIT-1-ov-file New BSD License
 */

namespace Kuick\Sentry;

use Kuick\Framework\Events\ExceptionRaisedEvent;
use Psr\Log\LoggerInterface;

use function Sentry\captureException;

/**
 * Sentry exception raised event listener
 */
class SentryListener
{
    private bool $initialized = false;

    public function __construct(SentryInitializer $sentryInitializer, LoggerInterface $logger)
    {
        $this->initialized = $sentryInitializer->isInitialized();
        $this->initialized || $logger->warning('Sentry configured, but is not enabled');
    }

    public function __invoke(ExceptionRaisedEvent $exceptionRaisedEvent): void
    {
        if (!$this->initialized) {
            return;
        }
        captureException($exceptionRaisedEvent->getException());
    }
}
