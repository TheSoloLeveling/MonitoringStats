<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class LoginController extends Controller
{
    
    public function apiWithoutKey()
    {
        $client = new Client(); //GuzzleHttp\Client
        $url = "http://127.0.0.1:8000/api/weather/searchObject/Temperature/20.95/21";


        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());

        return $responseBody;
    }

    public function apiWithKey()
    {
        $client = new Client();
        $url = "";

        $params = [
            //If you have any Params Pass here
        ];

        $headers = [
            'api-key' => 'k3Hy5qr73QhXrmHLXhpEh6CQ'
        ];

        $response = $client->request('GET', $url, [
            // 'json' => $params,
            'headers' => $headers,
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());

        return view('projects.apiwithkey', compact('responseBody'));
    }
}
