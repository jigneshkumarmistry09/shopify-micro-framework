<?php

namespace App;

use GuzzleHttp\Client;

class Shopify
{
    protected $shop;
    protected $token;
    protected $client;

    public function __construct($shop, $token)
    {
        $this->shop = $shop;
        $this->token = $token;
        $this->client = new Client([
            'base_uri' => "https://{$shop}/admin/api/2023-10/"
        ]);
    }

    public function getShop()
    {
        try {
            $response = $this->client->get('shop.json', [
                'headers' => [
                    'X-Shopify-Access-Token' => $this->token,
                    'Content-Type' => 'application/json'
                ]
            ]);
            return $response->getBody()->getContents();
        } catch (\Exception $e) {
            return json_encode(['error' => $e->getMessage()]);
        }
    }
}