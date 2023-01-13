<?php

declare(strict_types=1);

namespace Lborv\CoinGeckoApi\Tests\Api;

use Lborv\CoinGeckoApi\Api\ExchangeRates;
use Lborv\CoinGeckoApi\CoinGeckoClient;

class ExchangeRatesTest extends ApiTestCase
{
    public function testGetExchangeRates()
    {
        $api = new ExchangeRates(new CoinGeckoClient($this->getMockClient()));
        $api->getExchangeRates();

        $this->assertEquals('/api/v3/exchange_rates', $this->getLastRequest()->getUri()->__toString());
    }
}
