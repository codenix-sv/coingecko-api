<?php

declare(strict_types=1);

namespace Codenixsv\CoinGeckoApi\Api;

use Exception;

class Simple extends Api
{
    /**
     * @param string $ids
     * @param string $vsCurrencies
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function getPrice(string $ids, string $vsCurrencies, array $params = []): array
    {
        $params['ids'] = $ids;
        $params['vs_currencies'] = $vsCurrencies;

        return $this->get('/simple/price', $params);
    }

    /**
     * @param string $id
     * @param string $contractAddresses
     * @param string $vsCurrencies
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function getTokenPrice(
        string $id,
        string $contractAddresses,
        string $vsCurrencies,
        array $params = []
    ): array {
        $params['contract_addresses'] = $contractAddresses;
        $params['vs_currencies'] = $vsCurrencies;

        return $this->get('/simple/token_price/' . $id, $params);
    }

    /**
     * @return array
     * @throws Exception
     */
    public function getSupportedVsCurrencies()
    {
        return $this->get('/simple/supported_vs_currencies');
    }
}
