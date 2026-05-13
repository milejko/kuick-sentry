# Kuick Sentry
[![Latest Version](https://img.shields.io/github/release/milejko/kuick-sentry.svg?cacheSeconds=3600)](https://github.com/milejko/kuick-sentry/releases)
[![PHP](https://img.shields.io/badge/PHP-8.2%20|%208.3%20|%208.4%20|%208.5-blue?logo=php&cacheSeconds=3600)](https://www.php.net)
[![Total Downloads](https://img.shields.io/packagist/dt/kuick/sentry.svg?cacheSeconds=3600)](https://packagist.org/packages/kuick/sentry)
[![GitHub Actions CI](https://github.com/milejko/kuick-sentry/actions/workflows/ci.yml/badge.svg)](https://github.com/milejko/kuick-sentry/actions/workflows/ci.yml)
[![codecov](https://codecov.io/gh/milejko/kuick-sentry/graph/badge.svg?token=80QEBDHGPH)](https://codecov.io/gh/milejko/kuick-sentry)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?cacheSeconds=14400)](LICENSE)

# A Sentry bridge for applications based on Kuick Framework

## Requirements

- PHP 8.2 or higher
- [Kuick Framework](https://github.com/milejko/kuick-framework) `^2.3`

## Installation

### 1. Install via Composer

```bash
composer require kuick/sentry
```

### 2. Register the DI definitions

The DI file wires `SentryConfig`, `SentryInitializer`, `SentryListener`, and `SentryExceptionController` and reads all settings from environment variables.

Test out the Sentry exception trigger it with:

```bash
curl -X PUT https://your-app.example.com/api/sentry/exception
```

Check your Sentry project — an event titled *"Test exception for sentry integration"* should appear.

### 3. Configure via environment variables

| Variable | Default | Description |
|---|---|---|
| `SENTRY_ENABLED` | `0` | Set to `1` to enable Sentry reporting |
| `SENTRY_DSN` | _(empty)_ | Your project DSN from the Sentry dashboard |
| `SENTRY_ENVIRONMENT` | `LOCAL` | Environment tag sent with every event (e.g. `production`, `staging`) |
| `SENTRY_SAMPLE_RATE` | `1.0` | Traces sample rate between `0.0` and `1.0` |
| `SENTRY_RELEASE` | _(empty)_ | Release identifier (e.g. `v1.2.3` or a commit SHA) |
| `SENTRY_IGNORE_EXCEPTIONS` | `Kuick\Http\HttpException` | Comma-separated list of exception class names that should **not** be reported |

Example `.env` file:

```dotenv
SENTRY_ENABLED=1
SENTRY_DSN=https://examplePublicKey@o0.ingest.sentry.io/0
SENTRY_ENVIRONMENT=production
SENTRY_SAMPLE_RATE=1.0
SENTRY_RELEASE=v1.0.0
SENTRY_IGNORE_EXCEPTIONS=Kuick\Http\HttpException,App\Exception\ValidationException
```