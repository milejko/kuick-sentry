<?php

/**
 * Kuick Sentry (https://github.com/milejko/kuick-sentry)
 *
 * @link       https://github.com/milejko/kuick-sentry
 * @copyright  Copyright (c) 2024 Mariusz Miłejko (mariusz@milejko.pl)
 * @license    https://github.com/milejko/kuick-sentry?tab=MIT-1-ov-file New BSD License
 */

use Kuick\Framework\Config\ListenerConfig;
use Kuick\Framework\Events\ExceptionRaisedEvent;
use Kuick\Sentry\SentryListener;

return [
    new ListenerConfig(
        ExceptionRaisedEvent::class,
        SentryListener::class,
    ),
];