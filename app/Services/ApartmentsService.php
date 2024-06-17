<?php

namespace App\Services;
use GuzzleHttp\Client;

class ApartmentsService
{
public  function ListApartments()
{
$client = new Client();
    $response = $client->request('GET', 'https://api.rentcast.io/v1/properties?address=5500%20Grand%20Lake%20Dr%2C%20San%20Antonio%2C%20TX%2C%2078244', [
        'headers' => [
            'accept' => 'application/json',
        ],
    ]);

    return $response->getBody();
}
}
