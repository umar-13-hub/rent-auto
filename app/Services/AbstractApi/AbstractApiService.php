<?php

namespace App\Services\AbstractApi;

use http\Client;

class AbstractApiService
{
    public $client;
    public function __construct()
    {
        $this->client = new Client([
                // Base URL is used with relative request
                'base_uri' => 'http://exchange-rates.abstractapi.com/v1/',
                // You can set any of default request options.
                'timeout' =>  2.0
            ]);
    }

    public function live()
    {
        $this->client->get('live', [
            // http://exchange-rates.abstractapi.com/v1/live?,
            'query' => [
                'api_key' => '',
                'base' => 'USD'
            ]
        ]);
    }
}
