<?php

require __DIR__ . '/../../vendor/autoload.php';
use GuzzleHttp\Client;

class ThesaurusService
{
    private Client $client;
    private string $host = 'wordsapiv1.p.rapidapi.com';
    private string $key;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => "https://{$this->host}/", 'verify' => false]);
        $this->key = getenv('WORDS_API_KEY');
    }

    public function getSynonyms(string $word): array
    {
        if (empty($word))
            return [];
        try {
            $response = $this->client->request(
                'GET',
                "words/$word/synonyms",
                [
                    "headers" => [
                        'X-RapidAPI-Key' => $this->key,
                        'X-RapidAPI-Host' => $this->host,
                    ]
                ],
            );
            $data = json_decode($response->getBody()->getContents(), true);
            return $data['synonyms'] ?? [];
        } catch (\Exception $e) {
            error_log("ThesaurusService error: " . $e->getMessage());
            return [];
        }
    }
}
?>