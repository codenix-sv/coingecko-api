<?php

declare(strict_types=1);

namespace Codenixsv\CoinGeckoApi\Api;

use Exception;

class Coins extends Api
{
    /**
     * @return array
     * @throws Exception
     */
    public function getList(): array
    {
        return $this->get('/coins/list');
    }

    /**
     * @param string $vsCurrency
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function getMarkets(string $vsCurrency, array $params = []): array
    {
        $params['vs_currency'] = $vsCurrency;

        return $this->get('/coins/markets', $params);
    }

    /**
     * @param string $id
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function getCoin(string $id, array $params = []): array
    {
        return $this->get('/coins/' . $id, $params);
    }

    /**
     * @param string $id
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function getTickers(string $id, array $params = []): array
    {
        return $this->get('/coins/' . $id . '/tickers', $params);
    }

    /**
     * @param string $id
     * @param string $date
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function getHistory(string $id, string $date, array $params = []): array
    {
        $params['date'] = $date;
        return $this->get('/coins/' . $id . '/history', $params);
    }

    /**
     * @param string $id
     * @param string $vsCurrency
     * @param string $days
     * @return array
     * @throws Exception
     */
    public function getMarketChart(string $id, string $vsCurrency, string $days): array
    {
        $params['vs_currency'] = $vsCurrency;
        $params['days'] = $days;
        return $this->get('/coins/' . $id . '/market_chart', $params);
    }

    /**
     * @param string $id
     * @param string $vsCurrency
     * @param string $from
     * @param string $to
     * @return array
     * @throws Exception
     */
    public function getMarketChartRange(string $id, string $vsCurrency, string $from, string $to): array
    {
        $params['vs_currency'] = $vsCurrency;
        $params['from'] = $from;
        $params['to'] = $to;
        return $this->get('/coins/' . $id . '/market_chart/range', $params);
    }

    /**
     * @param string $id
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function getStatusUpdates(string $id, array $params = []): array
    {
        return $this->get('/coins/' . $id . '/status_updates', $params);
    }
}
