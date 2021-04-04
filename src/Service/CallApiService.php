<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class CallApiService{
    private $client;

    public function __construct(HttpClientInterface $client){
        $this->client = $client;
    }

    public function getNasaData(): array
    {

        $response = $this->client->request(
            'GET',
            'https://api.nasa.gov/neo/rest/v1/feed?api_key=poSM0dBdjBiToqEbxCg2GmoCUoPDhNPqJhQw2mb0'
        );
        return $response->toArray();
    }
}