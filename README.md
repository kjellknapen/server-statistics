# Control your server statistics from one single point.

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

## Available statistics

- [`Cpu Usage`](#cpuusage)
- [`Current Traffic`](#currenttraffic)
- [`Disk Usage`](#diskusage)
- [`Load Average`](#loadaverage)
- [`Memory Usage`](#memoryusage)

### `Cpu Usage`

Determine if the user is authorized to perform an ability on an instance of the given model. The id of the model is the field under validation

Consider the following policy:

```php

```


### `CountryCode`

Determine if the field under validation is a valid ISO3166 country code.

```php

```

If you want to validate a nullable country code field, you can call the `nullable()` method on the `CountryCode` rule. This way `null` and `0` are also passing values:

```php

```

### `Enum`

This rule will validate if the value under validation is part of the given enum class. We assume that the enum class has a static `toArray` method that returns all valid values. If you're looking for a good enum class, take a look at [spatie/enum](https://github.com/spatie/enum) or [myclabs/php-enum](https://github.com/myclabs/php-enum).

Consider the following enum class:

```php

```

### `ModelsExist`

Determine if all of the values in the input array exist as attributes for the given model class.

By default the rule assumes that you want to validate using `id` attribute. In the example below the validation will pass if all `model_ids` exist for the `Model`.


```php

```


### `Delimited`

This rule can validate a string containing delimited values. The constructor accepts a rule that is used to validate all separate values.

Here's an example where we are going to validate a string containing comma separated email addresses.

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
