<?php

/**
 * Kuick Sentry (https://github.com/milejko/kuick-sentry)
 *
 * @link       https://github.com/milejko/kuick-sentry
 * @copyright  Copyright (c) 2024 Mariusz Miłejko (mariusz@milejko.pl)
 * @license    https://github.com/milejko/kuick-sentry?tab=MIT-1-ov-file New BSD License
 */

use Kuick\Framework\Config\RouteConfig;
use Kuick\Http\Message\RequestInterface;
use Kuick\Sentry\SentryExceptionController;

return [
    // sentry integration testing route
    new RouteConfig(
        '/api/sentry/exception',
        SentryExceptionController::class,
        [RequestInterface::METHOD_PUT]
    ),
];