Laravel-Facebook
================

Facebook facade for Laravel 4.
This package provides facade for Facebook SDK class, which simplifies development of Facebook applications.
Enjoy!

## Usage
Install the package through Composer.

```js
{
    "require": {
        "laravel/framework": "4.0.*",
        "andreyco/laravel-facebook": "dev-master"
    }
}
```

Add service provider into your `app/config/app.php`

```php
'providers' => array(
    // ...
    'Andreyco\LaravelFacebook\LaravelFacebookServiceProvider',
    // ...
),
```

While in `app/config/app.php`, set the Facade name.
```php
'aliases' => array(
    // ...
    'FB'			  => 'Andreyco\LaravelFacebook\Facades\Facebook',
    // ...
),
```

## Now you can do this
```php
$pageId = 123456789;

if (FB::hasLiked($pageId) === false) {
    echo 'We love you, dear fan!';
}
```

## Facebook SDK version
Laravel Facebook package support Facebook SDK in version 3.2.2 and should work with any upcoming versions as well.
