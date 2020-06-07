<?php

declare(strict_types=1);

namespace Codenixsv\CoinGeckoApi;

use Codenixsv\CoinGeckoApi\Api\Coins;
use Codenixsv\CoinGeckoApi\Api\Contract;
use Codenixsv\CoinGeckoApi\Api\Derivatives;
use Codenixsv\CoinGeckoApi\Api\Events;
use Codenixsv\CoinGeckoApi\Api\ExchangeRates;
use Codenixsv\CoinGeckoApi\Api\Exchanges;
use Codenixsv\CoinGeckoApi\Api\Finance;
use Codenixsv\CoinGeckoApi\Api\Globals;
use Codenixsv\CoinGeckoApi\Api\Indexes;
use Codenixsv\CoinGeckoApi\Api\Ping;
use Codenixsv\CoinGeckoApi\Api\Simple;
use Codenixsv\CoinGeckoApi\Api\StatusUpdates;
use Exception;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

/**
 * Class CoinGeckoClient
 * @package Codenixsv\CoinGeckoApi
 */
class CoinGeckoClient
{
    protected const BASE_URI = 'https://api.coingecko.com';

    /** @var Client */
    private $httpClient;

    /** @var ResponseInterface|null */
    protected $lastResponse;

    public function __construct(?Client $client = null)
    {
        $this->httpClient = $client ?: new Client(['base_uri' => self::BASE_URI]);
    }

    public function getHttpClient(): Client
    {
        return $this->httpClient;
    }

    /**
     * @return array
     * @throws Exception
     */
    public function ping(): array
    {
        return (new Ping($this))->ping();
    }

    public function simple(): Simple
    {
        return new Simple($this);
    }

    public function coins(): Coins
    {
        return new Coins($this);
    }

    public function contract(): Contract
    {
        return new Contract($this);
    }

    public function exchanges(): Exchanges
    {
        return new Exchanges($this);
    }

    public function finance(): Finance
    {
        return new Finance($this);
    }

    public function indexes(): Indexes
    {
        return new Indexes($this);
    }

    public function derivatives(): Derivatives
    {
        return new Derivatives($this);
    }

    public function statusUpdates(): StatusUpdates
    {
        return new StatusUpdates($this);
    }

    public function events(): Events
    {
        return new Events($this);
    }

    public function exchangeRates(): ExchangeRates
    {
        return new ExchangeRates($this);
    }

    public function globals(): Globals
    {
        return new Globals($this);
    }

    public function setLastResponse(ResponseInterface $response)
    {
        return $this->lastResponse = $response;
    }

    public function getLastResponse(): ?ResponseInterface
    {
        return $this->lastResponse;
    }
}
