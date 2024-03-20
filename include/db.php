<?php
class DB
{
    static $instance;
    public static function getInstance()
    {
        if (self::$instance != null) {
            return self::$instance;
        }
        self::$instance = new PDO("mysql:host=localhost;dbname=biblioteca", "root", "");
        return self::$instance;
    }
}
