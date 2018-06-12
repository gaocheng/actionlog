# action log
Laravel 5 操作日志自动记录


## Installation

The ActionLog Service Provider can be installed via [Composer](http://getcomposer.org) by requiring the
`gaocheng/actionlog` package and setting the `minimum-stability` to `dev` (required for Laravel 5) in your
project's `composer.json`.

```json
{
    "require": {
       
        "gaocheng/actionlog": "~1.0"
    },
   
}
```

or

Require this package with composer:
```
composer require gaocheng/actionlog 
```

Update your packages with ```composer update``` or install with ```composer install```.



## Usage

To use the ActionLog Service Provider, you must register the provider when bootstrapping your Laravel application. There are
essentially two ways to do this.

Find the `providers` key in `config/app.php` and register the ActionLog Service Provider.

```php
    'providers' => [
        // ...
        'gaocheng\ActionLog\ActionLogServiceProvider',
    ]
```
for Laravel 5.1+
```php
    'providers' => [
        // ...
        gaocheng\ActionLog\ActionLogServiceProvider::class,
    ]
```

Find the `aliases` key in `config/app.php`.

```php
    'aliases' => [
        // ...
        'ActionLog' => 'gaocheng\ActionLog\Facades\ActionLogFacade',
    ]
```
for Laravel 5.1+
```php
    'aliases' => [
        // ...
        'ActionLog' => gaocheng\ActionLog\Facades\ActionLogFacade::class,
    ]
```



## Configuration

To use your own settings, publish config.

```$ php artisan vendor:publish```

`config/actionlog.php`

```php
    /*
    |--------------------------------------------------------------------------
    | Package Connection
    |--------------------------------------------------------------------------
    |
    | You can set a different database connection for this package. It will set
    | new connection for models ActionLog. When this option is null,
    | it will connect to the main database, which is set up in database.php
    |
    */

    'connection' => null,

    /*
    |--------------------------------------------------------------------------
    | Package Models
    |--------------------------------------------------------------------------
    |
    | You can set up same models that requires logging. When this option is null,
    | no logging will be done.
    |
    */
    
    'models' => [
        '\App\User',
    ],
```
## Last Step
run:
```$ php artisan migrate```

## Demo
自动记录操作日志，数据库操作需按如下:
```php

update

$users = Users::find(1);
$users->name = "myname";
$users->save();

add

$users = new Users();
$users->name = "myname";
$users->save()

delete

Users:destroy(1);

```

主动记录操作日志

```php

use ActionLog

ActionLog::createActionLog($type,$content);

```

感谢 https://github.com/luoyangpeng/action-log/

