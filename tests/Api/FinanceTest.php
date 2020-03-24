<?php

declare(strict_types=1);

namespace Codenixsv\CoinGeckoApi\Tests\Api;

use Codenixsv\CoinGeckoApi\Api\Finance;
use Codenixsv\CoinGeckoApi\CoinGeckoClient;

class FinanceTest extends ApiTestCase
{
    public function testGetPlatforms()
    {
        $this->createApi()->getPlatforms();

        $request = $this->getLastRequest();
        $this->assertEquals('/api/v3/finance_platforms', $request->getUri()->__toString());
    }

    public function testGetProducts()
    {
        $this->createApi()->getProducts();

        $request = $this->getLastRequest();
        $this->assertEquals('/api/v3/finance_products', $request->getUri()->__toString());
    }

    private function createApi(): Finance
    {
        return new Finance(new CoinGeckoClient($this->getMockClient()));
    }
}
