<?php
namespace App\Service;

use \GuzzleHttp\Client;

class HttpClient
{
    private const BASE_URL = 'https://jsonplaceholder.typicode.com/';

    public static function get($url): mixed
    {
        $client = new Client();
        $response = $client->get(self::BASE_URL.$url);
        $body = $response->getBody();
        return json_decode($body);
    }
}