<?php

require __DIR__ . '/../../vendor/autoload.php';
use GuzzleHttp\Client;

class JokeService
{
    private Client $client;
    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'https://official-joke-api.appspot.com/']);
    }

    public function getRandomJoke()
    {
        try {
            $response = $this->client->request('GET', 'random_joke');
            $data = json_decode($response->getBody()->getContents(), true);
            return $data ?? [];
        } catch (\Exception $e) {
            return ['setup' => 'Error', 'punchline' => 'Could not fetch joke'];
        }
    }
}
?>