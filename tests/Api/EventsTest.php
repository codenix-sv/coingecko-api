<?php

declare(strict_types=1);

namespace Codenixsv\CoinGeckoApi\Tests\Api;

use Codenixsv\CoinGeckoApi\Api\Events;
use Codenixsv\CoinGeckoApi\CoinGeckoClient;

class EventsTest extends ApiTestCase
{
    public function testGetEvents()
    {
        $this->createApi()->getEvents();

        $request = $this->getLastRequest();
        $this->assertEquals('/api/v3/events', $request->getUri()->__toString());
    }

    public function testGetCountries()
    {
        $this->createApi()->getCountries();

        $request = $this->getLastRequest();
        $this->assertEquals('/api/v3/events/countries', $request->getUri()->__toString());
    }

    public function testGetTypes()
    {
        $this->createApi()->getTypes();

        $request = $this->getLastRequest();
        $this->assertEquals('/api/v3/events/types', $request->getUri()->__toString());
    }

    private function createApi(): Events
    {
        return new Events(new CoinGeckoClient($this->getMockClient()));
    }
}
