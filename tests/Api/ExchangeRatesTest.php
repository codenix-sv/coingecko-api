<?php

declare(strict_types=1);

namespace Codenixsv\CoinGeckoApi\Tests\Api;

use Codenixsv\CoinGeckoApi\Api\ExchangeRates;
use Codenixsv\CoinGeckoApi\CoinGeckoClient;

class ExchangeRatesTest extends ApiTestCase
{
    public function testGetExchangeRates()
    {
        $api = new ExchangeRates(new CoinGeckoClient($this->getMockClient()));
        $api->getExchangeRates();

        $this->assertEquals('/api/v3/exchange_rates', $this->getLastRequest()->getUri()->__toString());
    }
}
