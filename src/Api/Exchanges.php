<?php

declare(strict_types=1);

namespace Codenixsv\CoinGeckoApi\Api;

use Exception;

class Exchanges extends Api
{
    /**
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function getExchanges(array $params = []): array
    {
        return $this->get('/exchanges', $params);
    }

    /**
     * @return array
     * @throws Exception
     */
    public function getList(): array
    {
        return $this->get('/exchanges/list');
    }

    /**
     * @param string $id
     * @return array
     * @throws Exception
     */
    public function getExchange(string $id): array
    {
        return $this->get('/exchanges/' . $id);
    }

    /**
     * @param string $id
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function getTickers(string $id, array $params = []): array
    {
        return $this->get('/exchanges/' . $id . '/tickers', $params);
    }

    /**
     * @param string $id
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function getStatusUpdates(string $id, array $params = []): array
    {
        return $this->get('/exchanges/' . $id . '/status_updates', $params);
    }

    /**
     * @param string $id
     * @param string $days
     * @return array
     * @throws Exception
     */
    public function getVolumeChart(string $id, string $days): array
    {
        return $this->get('/exchanges/' . $id . '/volume_chart', ['days' => $days]);
    }
}
