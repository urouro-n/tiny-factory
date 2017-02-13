<?php

namespace TinyFactory;

class Factory
{
    /**
     * @var Factory
     */
    private static $instance;

    /**
     * @var string
     */
    private $fixturePath;

    /**
     * @var callable
     */
    private $insertionHandler;

    /**
     * @return Factory
     */
    protected static function getInstance()
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    public static function __callStatic($name, $arguments)
    {
        $name = strtolower(str_replace('create', '', $name));

        if (count($arguments) > 0) {
            static::create($name, $arguments[0]);
        } else {
            static::create($name);
        }
    }

    public static function initialize($fixturePath, callable $insertionHandler)
    {
        $instance = static::getInstance();
        $instance->fixturePath = $fixturePath;
        $instance->insertionHandler = $insertionHandler;
    }

    public static function create($tableName, $definition = [])
    {
        $instance = static::getInstance();

        $func = function () use ($instance) {
            return require $instance->fixturePath;
        };

        $baseDefinitions = $func();
        $definition = array_merge($baseDefinitions[$tableName], $definition);
        call_user_func($instance->insertionHandler, $tableName, $definition);
    }
}
