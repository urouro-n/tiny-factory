# tiny-factory

A library for preparing test data.
Inspired by [factory_girl](https://github.com/thoughtbot/factory_girl), and [Laravel Factory](https://laravel.com/docs/master/database-testing#writing-factories)

## Usage

```php
// Setting up
Factory::initialize(__DIR__.'/fixtures.php', function ($tableName, $definition) {
    // Database insertion...
});

// Creation a test data
Factory::create('users');
```

Example at [here](example/example.php)

## License

under the [MIT license](LICENSE)
