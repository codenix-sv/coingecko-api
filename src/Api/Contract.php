<?php

declare(strict_types=1);

namespace Codenixsv\CoinGeckoApi\Api;

use Exception;

class Contract extends Api
{
    /**
     * @param string $id
     * @param string $contractAddress
     * @return array
     * @throws Exception
     */
    public function getContract(string $id, string $contractAddress): array
    {
        return $this->get('/coins/' . $id . '/contract/' . $contractAddress);
    }

    /**
     * @param string $id
     * @param string $contractAddress
     * @param string $vsCurrency
     * @param string $days
     * @return array
     * @throws Exception
     */
    public function getMarketChart(string $id, string $contractAddress, string $vsCurrency, string $days): array
    {
        $params = ['days' => $days, 'vs_currency' => $vsCurrency];

        return $this->get('/coins/' . $id . '/contract/' . $contractAddress . '/market_chart', $params);
    }

    /**
     * @param string $id
     * @param string $contractAddress
     * @param string $vsCurrency
     * @param string $from
     * @param string $to
     * @return array
     * @throws Exception
     */
    public function getMarketChartRange(
        string $id,
        string $contractAddress,
        string $vsCurrency,
        string $from,
        string $to
    ): array {
        $params['vs_currency'] = $vsCurrency;
        $params['from'] = $from;
        $params['to'] = $to;
        return $this->get('/coins/' . $id . '/contract/' . $contractAddress . '/market_chart/range', $params);
    }
}
