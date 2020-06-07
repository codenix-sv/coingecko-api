<?php

declare(strict_types=1);

namespace Codenixsv\CoinGeckoApi\Api;

use Codenixsv\CoinGeckoApi\CoinGeckoClient;
use Codenixsv\CoinGeckoApi\Message\ResponseTransformer;
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
        $response = $this->client->getHttpClient()->request('GET', '/api/' . $this->version
            . $uri, ['query' => $query]);
        $this->client->setLastResponse($response);

        return $this->transformer->transform($response);
    }
}
