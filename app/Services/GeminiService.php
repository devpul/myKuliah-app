<?php

namespace App\Services;

use GuzzleHttp\Client;

class GeminiService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'headers' => [
                'Content-Type' => 'application/json',
            ]
        ]);
    }

    public function generateContent($prompt)
    {
        $url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=' . env('GEMINI_API_KEY');

        $response = $this->client->post($url, [
            'verify' => false, // ⬅ NON AKTIFKAN SSL
            'json' => [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $prompt]
                        ]
                    ]
                ]
            ]
        ]);

        return json_decode($response->getBody(), true);
    }
}
