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
use RuntimeException;

use function Sentry\captureException;

/**
 * Sentry exception raised event listener
 */
class SentryListener
{
    public function __construct(SentryInit $sentryInit)
    {
        $sentryInit->isInitialized() || throw new  RuntimeException('Sentry is not initialized');
    }

    public function __invoke(ExceptionRaisedEvent $exceptionRaisedEvent): void
    {
        captureException($exceptionRaisedEvent->getException());
    }
}
