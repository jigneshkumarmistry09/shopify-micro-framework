<?php

namespace ShopifyMicroFramework;

class Config
{
    public static function loadEnv()
    {
        $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->safeLoad();
    }

    public static function get($key, $default = null)
    {
        return $_ENV[$key] ?? $default;
    }
}