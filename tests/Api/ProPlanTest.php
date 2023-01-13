<?php

declare(strict_types=1);

namespace Lborv\CoinGeckoApi\Tests\Api;

use Lborv\CoinGeckoApi\Api\Coins;
use Lborv\CoinGeckoApi\CoinGeckoClient;

class ProPlanTest extends ApiTestCase
{
    public function testGetApiKey()
    {
        $client = $this->createClient();
        $this->assertEquals($client->getApiKey(), 'test');
    }

    public function testSetApiKey()
    {
        $client = $this->createClient();
        $client->setApiKey('test2');
        
        $this->assertEquals($client->getApiKey(), 'test2');
    }

    public function testGetStatusUpdates()
    {
        $this->createApi()->getStatusUpdates('0x');

        $request = $this->getLastRequest();
        $this->assertEquals(
            '/api/v3/coins/0x/status_updates?x_cg_pro_api_key=test',
            $request->getUri()->__toString()
        );
    }

    private function createApi(): Coins
    {
        return new Coins($this->createClient());
    }

    private function createClient(): CoinGeckoClient
    {
        return new CoinGeckoClient($this->getMockClient(), 'test');
    }
}