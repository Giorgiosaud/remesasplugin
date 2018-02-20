<?php
namespace giorgiosaud\tasaRemesas;
abstract class Singleton{
	protected function __construct() {}
    final protected function __clone() {}

    final public static function getInstance()
    {
        static $instance = null;

        if (null === $instance)
        {
            $instance = new static();
        }

        return $instance;
    }
}