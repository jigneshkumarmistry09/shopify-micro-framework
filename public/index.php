<?php

require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use App\Shopify;

// Load .env
$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($requestUri === '/' || $requestUri === '/index.php') {
    echo "Shopify Micro Framework is running!";
} elseif ($requestUri === '/shopify/shop') {
    $shopify = new Shopify($_ENV['SHOPIFY_SHOP'], $_ENV['SHOPIFY_TOKEN']);
    header('Content-Type: application/json');
    echo $shopify->getShop();
} else {
    http_response_code(404);
    echo "Not Found";
}