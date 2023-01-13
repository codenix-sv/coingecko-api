<?php

declare(strict_types=1);

namespace Lborv\CoinGeckoApi\Tests\Api;

use Lborv\CoinGeckoApi\Api\Ping;
use Lborv\CoinGeckoApi\CoinGeckoClient;

class PingTest extends ApiTestCase
{
    public function testPing()
    {
        $api = new Ping(new CoinGeckoClient($this->getMockClient()));
        $api->ping();

        $this->assertEquals('/api/v3/ping', $this->getLastRequest()->getUri()->__toString());
    }
}
