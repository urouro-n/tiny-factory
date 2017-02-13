<?php

require_once __DIR__ . '/../vendor/autoload.php';

use TinyFactory\Factory;

/**
 * Usage
 */

// Setting up
Factory::initialize(__DIR__.'/fixtures.php', function ($tableName, $definition) {
    var_dump($tableName, $definition);
});

// Creation a test data
Factory::create('users', [
    'name' => 'Overridden Name',
]);

// Another creation
Factory::createUsers([
    'name' => 'Overridden Name',
]);
