# mylittlecms

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]


This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what
PSRs you support to avoid any confusion with users and contributors.

## Structure

If any of the following are applicable to your project, then the directory structure should follow industry best practises by being named the following.

```
bin/        
config/
src/
tests/
vendor/
```


## Install

Via Composer

``` bash
$ composer require physio/mylittlecms

$ php artisan vendor:publish --provider="Backpack\Base\BaseServiceProvider" 
#publishes configs, langs, views and AdminLTE files
$ php artisan vendor:publish --provider="Prologue\Alerts\AlertsServiceProvider"# publish config for notifications - prologue/alerts

php artisan elfinder:publish #published elfinder assets
php artisan vendor:publish --provider="Backpack\CRUD\CrudServiceProvider" --tag="public" #publish CRUD assets
php artisan vendor:publish --provider="Backpack\CRUD\CrudServiceProvider" --tag="lang" #publish CRUD lang files 
php artisan vendor:publish --provider="Backpack\CRUD\CrudServiceProvider" --tag="config" #publish CRUD and custom elfinder config files
php artisan vendor:publish --provider="Backpack\CRUD\CrudServiceProvider" --tag="elfinder" #publish custom elFinder views


$ php artisan migrate #generates users table (using Laravel's default migrations)
```
before class name use Backpack\Base\app\Notifications\RsetPasswordNotification as ResetPasswordNotification;

as a method inside the User class:
``` php
  /**
   * Send the password reset notification.
   *
   * @param  string  $token
   * @return void
   */
  public function sendPasswordResetNotification($token)
  {
      $this->notify(new ResetPasswordNotification($token));
  }
```

## Usage

``` php
$skeleton = new physio\mylittlecms();
echo $skeleton->echoPhrase('Hello, League!');
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email ilphysio@gmail.com instead of using the issue tracker.

## Credits

- [physio][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/physio/mylittlecms.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/physio/mylittlecms/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/physio/mylittlecms.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/physio/mylittlecms.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/physio/mylittlecms.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/physio/mylittlecms
[link-travis]: https://travis-ci.org/physio/mylittlecms
[link-scrutinizer]: https://scrutinizer-ci.com/g/physio/mylittlecms/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/physio/mylittlecms
[link-downloads]: https://packagist.org/packages/physio/mylittlecms
[link-author]: https://github.com/physio
[link-contributors]: ../../contributors
