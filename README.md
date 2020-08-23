# Money Field for Laravel Nova

[![Latest Version on Packagist](https://img.shields.io/packagist/v/sashalenz/nova-money-field.svg?style=flat-square)](https://packagist.org/packages/sashalenz/nova-money-field)
[![Total Downloads](https://img.shields.io/packagist/dt/sashalenz/nova-money-field.svg?style=flat-square)](https://packagist.org/packages/sashalenz/nova-money-field)

## Installation

You can install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require sashalenz/nova-money-field
```

## Usage

In resource:

```php
// ...
use Sashalenz\NovaMoneyField\Money;

public function fields(Request $request)
{
    return [
        // ...
        Money::make('Balance'),
    ];
}
```

You may use `locale` method to define locale for formatting value, by default value will be formatted using browser locale:

```php
Money::make('Balance')->locale('ru-RU'),
```
