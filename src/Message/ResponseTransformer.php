<?php

declare(strict_types=1);

namespace Lborv\CoinGeckoApi\Message;

use Lborv\CoinGeckoApi\Exceptions\TransformResponseException;
use Psr\Http\Message\ResponseInterface;
use Exception;

/**
 * Class ResponseTransformer
 * @package Lborv\CoinGeckoApi\Message
 */
class ResponseTransformer
{
    /**
     * @param ResponseInterface $response
     * @return array
     * @throws Exception
     */
    public function transform(ResponseInterface $response): array
    {
        $body = (string) $response->getBody();
        if (strpos($response->getHeaderLine('Content-Type'), 'application/json') === 0) {
            $content = json_decode($body, true);
            if (JSON_ERROR_NONE === json_last_error()) {
                return $content;
            }

            throw new TransformResponseException('Error transforming response to array. JSON_ERROR: '
                . json_last_error() . ' --' . $body . '---');
        }

        throw new TransformResponseException('Error transforming response to array. Content-Type 
            is not application/json');
    }
}
