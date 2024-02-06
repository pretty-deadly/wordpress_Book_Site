<?php

namespace BookPlugin;

abstract class Singleton
{
    // private static attribute to hold the single instance
    protected static $instance;

    // private constructor
    abstract protected function __construct();

    // prevent cloning (PHP specific)
    private function __clone(){}

    // method that will create or return the existing instance
    public static function getInstance(){
        if(static::$instance == null){
            static::$instance = new static();
        }

        return static::$instance;
    }
}
