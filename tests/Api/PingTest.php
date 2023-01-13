<?php

declare(strict_types=1);

namespace Codenixsv\CoinGeckoApi\Tests\Api;

use Codenixsv\CoinGeckoApi\Api\Ping;
use Codenixsv\CoinGeckoApi\CoinGeckoClient;

class PingTest extends ApiTestCase
{
    public function testPing()
    {
        $api = new Ping(new CoinGeckoClient($this->getMockClient()));
        $api->ping();

        $this->assertEquals('/api/v3/ping', $this->getLastRequest()->getUri()->__toString());
    }
}
