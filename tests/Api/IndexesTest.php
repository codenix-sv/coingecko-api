<?php

declare(strict_types=1);

namespace Lborv\CoinGeckoApi\Tests\Api;

use Lborv\CoinGeckoApi\Api\Indexes;
use Lborv\CoinGeckoApi\CoinGeckoClient;

class IndexesTest extends ApiTestCase
{
    public function testGetIndexes()
    {
        $this->createApi()->getIndexes();

        $request = $this->getLastRequest();
        $this->assertEquals('/api/v3/indexes', $request->getUri()->__toString());
    }

    public function testGetIndex()
    {
        $this->createApi()->getIndex('BAT');

        $request = $this->getLastRequest();
        $this->assertEquals('/api/v3/indexes/BAT', $request->getUri()->__toString());
    }

    public function testGetList()
    {
        $this->createApi()->getList();

        $request = $this->getLastRequest();
        $this->assertEquals('/api/v3/indexes/list', $request->getUri()->__toString());
    }

    private function createApi(): Indexes
    {
        return new Indexes(new CoinGeckoClient($this->getMockClient()));
    }
}
