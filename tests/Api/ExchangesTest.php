<?php

declare(strict_types=1);

namespace Codenixsv\CoinGeckoApi\Tests\Api;

use Codenixsv\CoinGeckoApi\Api\Exchanges;
use Codenixsv\CoinGeckoApi\CoinGeckoClient;

class ExchangesTest extends ApiTestCase
{
    public function testGetExchanges()
    {
        $this->createApi()->getExchanges();

        $request = $this->getLastRequest();
        $this->assertEquals('/api/v3/exchanges', $request->getUri()->__toString());
    }

    public function testGetList()
    {
        $this->createApi()->getList();

        $request = $this->getLastRequest();
        $this->assertEquals('/api/v3/exchanges/list', $request->getUri()->__toString());
    }

    public function testGetExchange()
    {
        $this->createApi()->getExchange('binance');

        $request = $this->getLastRequest();
        $this->assertEquals('/api/v3/exchanges/binance', $request->getUri()->__toString());
    }

    public function testGetTickers()
    {
        $this->createApi()->getTickers('binance', ['coin_ids' => '0x,bitcoin']);

        $request = $this->getLastRequest();
        $this->assertEquals(
            '/api/v3/exchanges/binance/tickers?coin_ids=0x%2Cbitcoin',
            $request->getUri()->__toString()
        );
    }

    public function testGetStatusUpdates()
    {
        $this->createApi()->getStatusUpdates('binance');

        $request = $this->getLastRequest();
        $this->assertEquals('/api/v3/exchanges/binance/status_updates', $request->getUri()->__toString());
    }

    public function testGetVolumeChart()
    {
        $this->createApi()->getVolumeChart('binance', '1');

        $request = $this->getLastRequest();
        $this->assertEquals('/api/v3/exchanges/binance/volume_chart?days=1', $request->getUri()->__toString());
    }

    private function createApi(): Exchanges
    {
        return new Exchanges(new CoinGeckoClient($this->getMockClient()));
    }
}
