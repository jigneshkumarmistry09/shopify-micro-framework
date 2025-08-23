<?php

namespace ShopifyMicroFramework;

use GuzzleHttp\Client;

class ShopifyClient
{
    private $client;
    private $shop;
    private $token;

    public function __construct()
    {
        $this->shop = Config::get('SHOPIFY_SHOP');
        $this->token = Config::get('SHOPIFY_TOKEN');
        $this->client = new Client([
            'base_uri' => "https://{$this->shop}/admin/api/2023-04/"
        ]);
    }

    public function get($endpoint, $params = [])
    {
        return $this->request('GET', $endpoint, ['query' => $params]);
    }

    public function post($endpoint, $data = [])
    {
        return $this->request('POST', $endpoint, ['json' => $data]);
    }

    public function put($endpoint, $data = [])
    {
        return $this->request('PUT', $endpoint, ['json' => $data]);
    }

    public function delete($endpoint, $params = [])
    {
        return $this->request('DELETE', $endpoint, ['query' => $params]);
    }

    private function request($method, $endpoint, $options = [])
    {
        $options['headers']['X-Shopify-Access-Token'] = $this->token;
        $options['headers']['Content-Type'] = 'application/json';

        try {
            $response = $this->client->request($method, ltrim($endpoint, '/'), $options);
            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            http_response_code(500);
            return ['error' => $e->getMessage()];
        }
    }
}