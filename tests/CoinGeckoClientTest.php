<?php

declare(strict_types=1);

namespace Codenixsv\CoinGeckoApi\Tests;

use Codenixsv\CoinGeckoApi\Api\Coins;
use Codenixsv\CoinGeckoApi\Api\Contract;
use Codenixsv\CoinGeckoApi\Api\Derivatives;
use Codenixsv\CoinGeckoApi\Api\Events;
use Codenixsv\CoinGeckoApi\Api\ExchangeRates;
use Codenixsv\CoinGeckoApi\Api\Exchanges;
use Codenixsv\CoinGeckoApi\Api\Finance;
use Codenixsv\CoinGeckoApi\Api\Globals;
use Codenixsv\CoinGeckoApi\Api\Indexes;
use Codenixsv\CoinGeckoApi\Api\Simple;
use Codenixsv\CoinGeckoApi\Api\StatusUpdates;
use Codenixsv\CoinGeckoApi\CoinGeckoClient;
use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

class CoinGeckoClientTest extends TestCase
{
    public function testGetBaseClient()
    {
        $client = new CoinGeckoClient();

        $this->assertInstanceOf(Client::class, $client->getHttpClient());
    }

    public function testPing()
    {
        $client = new CoinGeckoClient();

        $this->assertIsArray($client->ping());
    }

    public function testSimple()
    {
        $client = new CoinGeckoClient();

        $this->assertInstanceOf(Simple::class, $client->simple());
    }

    public function testCoins()
    {
        $client = new CoinGeckoClient();

        $this->assertInstanceOf(Coins::class, $client->coins());
    }

    public function testContract()
    {
        $client = new CoinGeckoClient();

        $this->assertInstanceOf(Contract::class, $client->contract());
    }

    public function testExchanges()
    {
        $client = new CoinGeckoClient();

        $this->assertInstanceOf(Exchanges::class, $client->exchanges());
    }

    public function testFinance()
    {
        $client = new CoinGeckoClient();

        $this->assertInstanceOf(Finance::class, $client->finance());
    }

    public function testIndexes()
    {
        $client = new CoinGeckoClient();

        $this->assertInstanceOf(Indexes::class, $client->indexes());
    }

    public function testDerivatives()
    {
        $client = new CoinGeckoClient();

        $this->assertInstanceOf(Derivatives::class, $client->derivatives());
    }

    public function testStatusUpdates()
    {
        $client = new CoinGeckoClient();

        $this->assertInstanceOf(StatusUpdates::class, $client->statusUpdates());
    }

    public function testEvents()
    {
        $client = new CoinGeckoClient();

        $this->assertInstanceOf(Events::class, $client->events());
    }

    public function testExchangeRates()
    {
        $client = new CoinGeckoClient();

        $this->assertInstanceOf(ExchangeRates::class, $client->exchangeRates());
    }

    public function testGlobals()
    {
        $client = new CoinGeckoClient();

        $this->assertInstanceOf(Globals::class, $client->globals());
    }

    public function testGetLastResponseIsNull()
    {
        $client = new CoinGeckoClient();

        $this->assertNull($client->getLastResponse());
    }

    public function testSetLastResponse()
    {
        $client = new CoinGeckoClient();
        $response = $this->createMock(ResponseInterface::class);
        $client->setLastResponse($response);

        $this->assertInstanceOf(ResponseInterface::class, $client->getLastResponse());
    }
}
