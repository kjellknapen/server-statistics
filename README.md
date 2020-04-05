# Control your server statistics from one single point. [WIP Don't use yet]

[![Latest Version on Packagist](https://img.shields.io/packagist/v/kjellknapen/server-statistics.svg?style=flat-square)](https://packagist.org/packages/kjellknapen/server-statistics)
[![Code coverage](https://scrutinizer-ci.com/g/kjellknapen/server-statistics/badges/coverage.png)](https://scrutinizer-ci.com/g/kjellknapen/server-statistics)
[![StyleCI](https://github.styleci.io/repos/152587206/shield?branch=master)](https://github.styleci.io/repos/152587206)
[![Quality Score](https://img.shields.io/scrutinizer/g/kjellknapen/server-statistics.svg?style=flat-square)](https://scrutinizer-ci.com/g/kjellknapen/server-statistics)
[![Total Downloads](https://img.shields.io/packagist/dt/kjellknapen/server-statistics.svg?style=flat-square)](https://packagist.org/packages/kjellknapen/server-statistics)

## Installation

You can install the package via composer:

```bash
composer require kjellknapen/server-statistics
```

The package will automatically register itself.

### Config

You can run the following command to publish the config file into your `config` folder

```bash
php artisan vendor:publish --provider="KjellKnapen\ServerStatistics\ServerStatisticsServiceProvider"
```

## Server requirements
Your server needs to run on a UNIX os and has to be able to run the following commands:
- top
- egrep
- free
- df
- lsof

## Available statistics

- [`Cpu Usage`](#cpuusage)
- [`Current Traffic`](#currenttraffic)
- [`Disk Usage`](#diskusage)
- [`Load Average`](#loadaverage)
- [`Memory Usage`](#memoryusage)

### `Cpu Usage`

Cpu usage explained

```php

```


### `Current Traffic`

Current traffic explained

```php

```


### `Disk Usage`

Disk usage explained

```php

```

### `Load Average`

Load average explained


```php

```


### `Memory Usage`

Memory usage explained

```php

```


### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email hello@knapen.dev instead of using the issue tracker.

## Credits

- [Kjell Knapen](https://github.com/kjellknapen)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
