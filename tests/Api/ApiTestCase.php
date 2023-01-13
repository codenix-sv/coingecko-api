<?php

declare(strict_types=1);

namespace Codenixsv\CoinGeckoApi\Tests\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;

class ApiTestCase extends TestCase
{
    private $transactions = [];
    private $mockClient = null;

    protected function getLastRequest(): ?RequestInterface
    {
        if (($count = count($this->transactions)) === 0) {
            return null;
        }

        return $this->transactions[$count - 1]['request'] ?? null;
    }

    protected function getMockClient()
    {
        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], json_encode(['fo' => 'bar'])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $handlerStack->push(Middleware::history($this->transactions));

        $this->mockClient = new Client(['handler' => $handlerStack]);

        return $this->mockClient;
    }

    protected function tearDown(): void
    {
        $this->mockClient = null;
        $this->transactions = [];
    }
}
