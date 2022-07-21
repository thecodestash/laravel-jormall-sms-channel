
[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/support-ukraine.svg?t=1" />](https://supportukrainenow.org)

# A Laravel implementation of JorMall's SMS gateway, ready to be used directly or as a Notification channel.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/thecodestash/laravel-jormall-sms-channel.svg?style=flat-square)](https://packagist.org/packages/thecodestash/laravel-jormall-sms-channel)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/thecodestash/laravel-jormall-sms-channel/run-tests?label=tests)](https://github.com/thecodestash/laravel-jormall-sms-channel/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/thecodestash/laravel-jormall-sms-channel/Check%20&%20fix%20styling?label=code%20style)](https://github.com/thecodestash/laravel-jormall-sms-channel/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/thecodestash/laravel-jormall-sms-channel.svg?style=flat-square)](https://packagist.org/packages/thecodestash/laravel-jormall-sms-channel)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/laravel-jormall-sms-channel.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/laravel-jormall-sms-channel)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require thecodestash/laravel-jormall-sms-channel
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-jormall-sms-channel-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-jormall-sms-channel-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="laravel-jormall-sms-channel-views"
```

## Usage

```php
$jormallSms = new TheCodeStash\JormallSms();
echo $jormallSms->echoPhrase('Hello, TheCodeStash!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/Yazan-Stash/.github/blob/master/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Yazan Stash](https://github.com/Yazan-Stash)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
