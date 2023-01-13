<?php

declare(strict_types=1);

namespace Codenixsv\CoinGeckoApi\Tests\Api;

use Codenixsv\CoinGeckoApi\Api\Contract;
use Codenixsv\CoinGeckoApi\CoinGeckoClient;

class ContractTest extends ApiTestCase
{
    public function testGetContract()
    {
        $this->createApi()->getContract('ethereum', '0xE41d2489571d322189246DaFA5ebDe1F4699F498');

        $request = $this->getLastRequest();
        $this->assertEquals(
            '/api/v3/coins/ethereum/contract/0xE41d2489571d322189246DaFA5ebDe1F4699F498',
            $request->getUri()->__toString()
        );
    }

    public function testGetMarketChart()
    {
        $this->createApi()->getMarketChart('ethereum', '0xE41d2489571d322189246DaFA5ebDe1F4699F498', 'usd', '1');

        $request = $this->getLastRequest();
        $this->assertEquals(
            '/api/v3/coins/ethereum/contract/0xE41d2489571d322189246DaFA5ebDe1F4699F498/market_chart'
            . '?days=1&vs_currency=usd',
            $request->getUri()->__toString()
        );
    }

    public function testGetMarketChartRange()
    {
        $this->createApi()->getMarketChartRange(
            'ethereum',
            '0xE41d2489571d322189246DaFA5ebDe1F4699F498',
            'usd',
            '11392577232',
            ' 1422577232'
        );

        $request = $this->getLastRequest();
        $this->assertEquals(
            '/api/v3/coins/ethereum/contract/0xE41d2489571d322189246DaFA5ebDe1F4699F498/market_chart/range?'
            . 'vs_currency=usd&from=11392577232&to=%201422577232',
            $request->getUri()->__toString()
        );
    }

    private function createApi(): Contract
    {
        return new Contract(new CoinGeckoClient($this->getMockClient()));
    }
}
