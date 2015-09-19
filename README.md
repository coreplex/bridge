# Bridge

A php package to share data from your back end code to the front end.

## Installation

This package requires PHP 5.4+, and includes a Laravel 5 Service Provider and Facade.

We recommend installing the package through composer. You can either call `composer require coreplex/notifier` in your 
command line, or add the following to your `composer.json` and then run either `composer install` or `composer update` 
to download the package.

```php
"coreplex/notifier": "~0.1"
```

### Laravel 5 Integration

To use the package with Laravel 5 firstly add the carpenter service provider to the list of service providers in 
`app/config/app.php`.

```php
'providers' => array(

  Coreplex\Notifier\JavascriptServiceProvider::class,

);
```

If you wish to use the facade then add the following to your aliases array in `app/config/app.php`.

```php
'aliases' => array(

  Notifier'  => Coreplex\Bridge\Contracts\Javascript::class,

);
```

## Usage

To get started with the JavaScript component you simply need to create a new instance of the `Javascript` class.

```php
$bridge = new Javascript();
```

Or if you are using laravel then you can access the class via it's facade or you can resolve it from the IOC container 
by its contract.

```php
Javascript::share('foo, 'bar');

public function __construct(Coreplex\Bridge\Contracts\Javascript $bridge)
{
    $this->bridge = $bridge;
}
```

## Sharing Data

To share data to the front end use the `share` method. You can either pass a key and value as arguments or pass an 
array of key value pairs. The share method can also be chained if you prefer.
 
```php
$bridge->share('foo', 'bar')->share('baz', 'qux');
// OR
$bridge->share(['foo' => 'bar', 'baz' => 'qux']);
```

## Rendering Data

To access your shared data on the front end call the `renderSharedData` method. This will then echo out all of the 
necessary scripts.

```php
echo $bridge->renderSharedData();
```