<?php

declare(strict_types=1);

namespace Lborv\CoinGeckoApi\Api;

use Exception;

class Derivatives extends Api
{
    /**
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function getDerivatives(array $params = []): array
    {
        return $this->get('/derivatives', $params);
    }

    /**
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function getExchanges(array $params = []): array
    {
        return $this->get('/derivatives/exchanges', $params);
    }

    /**
     * @param string $id
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function getExchange(string $id, $params = []): array
    {
        return $this->get('/derivatives/exchanges/' . $id, $params);
    }

    /**
     * @return array
     * @throws Exception
     */
    public function getExchangeList(): array
    {
        return $this->get('/derivatives/exchanges/list');
    }
}
