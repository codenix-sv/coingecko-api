<?php

declare(strict_types=1);

namespace Lborv\CoinGeckoApi\Api;

use Lborv\CoinGeckoApi\CoinGeckoClient;
use Lborv\CoinGeckoApi\Message\ResponseTransformer;
use Exception;

class Api
{
    /** @var CoinGeckoClient */
    protected $client;

    private $version = 'v3';

    /** @var ResponseTransformer */
    protected $transformer;

    public function __construct(CoinGeckoClient $client)
    {
        $this->client = $client;
        $this->transformer = new ResponseTransformer();
    }

    /**
     * @param string $uri
     * @param array $query
     * @return array
     * @throws Exception
     */
    public function get(string $uri, array $query = []): array
    {
        $apiKey = $this->client->getApiKey();
        if(!empty($apiKey)) {
            $query['x_cg_pro_api_key'] = $apiKey;
        }

        $response = $this->client->getHttpClient()->request('GET', '/api/' . $this->version
            . $uri, ['query' => $query]);
        $this->client->setLastResponse($response);

        return $this->transformer->transform($response);
    }
}
