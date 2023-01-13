<?php

declare(strict_types=1);

namespace Codenixsv\CoinGeckoApi\Tests\Api;

use Codenixsv\CoinGeckoApi\Api\Derivatives;
use Codenixsv\CoinGeckoApi\CoinGeckoClient;

class DerivativesTest extends ApiTestCase
{
    public function testGetDerivatives()
    {
        $this->createApi()->getDerivatives();

        $request = $this->getLastRequest();
        $this->assertEquals('/api/v3/derivatives', $request->getUri()->__toString());
    }

    public function testGetExchanges()
    {
        $this->createApi()->getExchanges();

        $request = $this->getLastRequest();
        $this->assertEquals('/api/v3/derivatives/exchanges', $request->getUri()->__toString());
    }

    public function testGetExchange()
    {
        $this->createApi()->getExchange('binance_futures');

        $request = $this->getLastRequest();
        $this->assertEquals('/api/v3/derivatives/exchanges/binance_futures', $request->getUri()->__toString());
    }

    public function testGetExchangeList()
    {
        $this->createApi()->getExchangeList();

        $request = $this->getLastRequest();
        $this->assertEquals('/api/v3/derivatives/exchanges/list', $request->getUri()->__toString());
    }

    private function createApi(): Derivatives
    {
        return new Derivatives(new CoinGeckoClient($this->getMockClient()));
    }
}
