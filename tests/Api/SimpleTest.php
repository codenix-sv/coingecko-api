<?php

declare(strict_types=1);

namespace Codenixsv\CoinGeckoApi\Tests\Api;

use Codenixsv\CoinGeckoApi\Api\Simple;
use Codenixsv\CoinGeckoApi\CoinGeckoClient;

class SimpleTest extends ApiTestCase
{
    public function testGetPrice()
    {
        $this->createApi()->getPrice('0x,bitcoin', 'usd,rub');

        $request = $this->getLastRequest();
        $this->assertEquals(
            '/api/v3/simple/price?ids=0x%2Cbitcoin&vs_currencies=usd%2Crub',
            $request->getUri()->__toString()
        );
    }

    public function testGetTokenPrice()
    {
        $api = $this->createApi();
        $api->getTokenPrice('ethereum', '0xE41d2489571d322189246DaFA5ebDe1F4699F498', 'usd,rub');

        $request = $this->getLastRequest();
        $this->assertEquals(
            '/api/v3/simple/token_price/ethereum?contract_addresses'
            . '=0xE41d2489571d322189246DaFA5ebDe1F4699F498&vs_currencies=usd%2Crub',
            $request->getUri()->__toString()
        );
    }

    public function testGetSupportedVsCurrencies()
    {
        $this->createApi()->getSupportedVsCurrencies();

        $request = $this->getLastRequest();
        $this->assertEquals(
            '/api/v3/simple/supported_vs_currencies',
            $request->getUri()->__toString()
        );
    }

    private function createApi(): Simple
    {
        return new Simple(new CoinGeckoClient($this->getMockClient()));
    }
}
