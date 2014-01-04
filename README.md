Laravel-Facebook
================

Facebook facade for Laravel 4.  
This package provides facade for Facebook SDK class, which simplifies development of Facebook applications.  
Enjoy!

## Installation
Install the package through Composer.
```js
{
    "require": {
        // ...
        "andreyco/laravel-facebook": "dev-master"
        // ...
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
Please, do not use `Facebook` which might cause problems.
```php
'aliases' => array(
    // ...
    'FB'			  => 'Andreyco\LaravelFacebook\Facades\Facebook',
    // ...
),
```
**Publish configuration files**  
You should publish configuration files for this package, so that they are not overwritten
after `composer update`.  
Don't worry, Artisan to the rescue!
```
php artisan config:publish andreyco/laravel-facebook
```
Feel free to modify config files as you wish, or even define your custom options.

## Usage
Since we defined `FB` as facede, use `FB` to access SDK methods.
```php
$pageId = 123456789;

if (FB::hasLiked($pageId)) {
    echo 'We love you, dear fan!';
}
```

## Facebook SDK version
Laravel Facebook package support Facebook SDK in version 3.2.2 and should work with any upcoming versions as well.
