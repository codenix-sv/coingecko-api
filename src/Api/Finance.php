<?php

declare(strict_types=1);

namespace Lborv\CoinGeckoApi\Api;

use Exception;

class Finance extends Api
{
    /**
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function getPlatforms(array $params = []): array
    {
        return $this->get('/finance_platforms', $params);
    }

    /**
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function getProducts(array $params = []): array
    {
        return $this->get('/finance_products', $params);
    }
}
