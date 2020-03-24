<?php

declare(strict_types=1);

namespace Codenixsv\CoinGeckoApi\Tests\Api;

use Codenixsv\CoinGeckoApi\Api\Coins;
use Codenixsv\CoinGeckoApi\CoinGeckoClient;

class CoinsTest extends ApiTestCase
{
    public function testGetList()
    {
        $this->createApi()->getList();

        $request = $this->getLastRequest();
        $this->assertEquals(
            '/api/v3/coins/list',
            $request->getUri()->__toString()
        );
    }

    public function testGetMarkets()
    {
        $this->createApi()->getMarkets('usd', ['per_page' => 10, 'sparkline' => 'true']);

        $request = $this->getLastRequest();
        $this->assertEquals(
            '/api/v3/coins/markets?per_page=10&sparkline=true&vs_currency=usd',
            $request->getUri()->__toString()
        );
    }

    public function testGetCoin()
    {
        $this->createApi()->getCoin('bitcoin', ['tickers' => 'false', 'market_data' => 'false']);

        $request = $this->getLastRequest();
        $this->assertEquals(
            '/api/v3/coins/bitcoin?tickers=false&market_data=false',
            $request->getUri()->__toString()
        );
    }

    public function testGetTickers()
    {
        $this->createApi()->getTickers('bitcoin');

        $request = $this->getLastRequest();
        $this->assertEquals(
            '/api/v3/coins/bitcoin/tickers',
            $request->getUri()->__toString()
        );
    }

    public function testGetHistory()
    {
        $this->createApi()->getHistory('bitcoin', '30-12-2017');

        $request = $this->getLastRequest();
        $this->assertEquals(
            '/api/v3/coins/bitcoin/history?date=30-12-2017',
            $request->getUri()->__toString()
        );
    }

    public function testGetMarketChart()
    {
        $this->createApi()->getMarketChart('bitcoin', 'usd', 'max');

        $request = $this->getLastRequest();
        $this->assertEquals(
            '/api/v3/coins/bitcoin/market_chart?vs_currency=usd&days=max',
            $request->getUri()->__toString()
        );
    }

    public function testGetMarketChartRange()
    {
        $this->createApi()->getMarketChartRange('bitcoin', 'usd', '1392577232', '1422577232');

        $request = $this->getLastRequest();
        $this->assertEquals(
            '/api/v3/coins/bitcoin/market_chart/range?vs_currency=usd&from=1392577232&to=1422577232',
            $request->getUri()->__toString()
        );
    }

    public function testGetStatusUpdates()
    {
        $this->createApi()->getStatusUpdates('0x');

        $request = $this->getLastRequest();
        $this->assertEquals(
            '/api/v3/coins/0x/status_updates',
            $request->getUri()->__toString()
        );
    }

    private function createApi(): Coins
    {
        return new Coins(new CoinGeckoClient($this->getMockClient()));
    }
}
